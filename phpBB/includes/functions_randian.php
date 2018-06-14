<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}


function verifyEmailOrTel($data)
{
	global $user;

	$regexOfTel = '/^1[0-9]{10}$/';
	$regexOfEmail = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';

	$emailOrTel = $data['emailOrTel'];
	$existRequirement = $data['existRequirement'];

	if (ctype_space($emailOrTel) || $emailOrTel == null)
	{
		return $user->lang['UCP_EMAIL_TEL_ERROR'];
	}

	if (preg_match($regexOfTel, $emailOrTel) == 1)
	{
		$isExist = isTelExist($emailOrTel);
		if ($existRequirement == RD_CONSTANTS['notExist'] && $isExist)
		{
			return $user->lang['UCP_TEL_EXIST_ERROR'];
		}
		elseif ($existRequirement == RD_CONSTANTS['exist'] && !$isExist)
		{
			return $user->lang['UCP_TEL_NOT_EXIST_ERROR'];
		}
		else
		{
			return RD_CONSTANTS['tel'];
		}
	}

	if (preg_match($regexOfEmail, $emailOrTel) == 1)
	{
		$isExist = isEmailExist($emailOrTel);
		if ($existRequirement == RD_CONSTANTS['notExist'] && $isExist)
		{
			return $user->lang['UCP_EMAIL_EXIST_ERROR'];
		}
		elseif ($existRequirement == RD_CONSTANTS['exist'] && !$isExist)
		{
			return $user->lang['UCP_EMAIL_NOT_EXIST_ERROR'];
		}
		else
		{
			return RD_CONSTANTS['email'];
		}
	}

	return $user->lang['UCP_EMAIL_TEL_ERROR'];

}


function saveOrUpdateVerifyCode($emailOrTel)
{
	global $db, $user;
	$sql = "SELECT 
    id, emailOrTel, code, verifyCodeSendTime, expirationDateTimeUTC, verifyTimes
FROM
    " . VERIFY_CODE_TABLE . "
WHERE
    emailOrTel = '" . $emailOrTel . "'";

	$result = $db->sql_query_limit($sql, 1);
	$row = $db->sql_fetchrow($result);

	if ($row)
	{
		$verifyCodeInDb = array(
			'id'                    => $row['id'],
			'emailOrTel'            => $row['emailOrTel'],
			'code'                  => $row['code'],
			'verifyCodeSendTime'    => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $row['verifyCodeSendTime']),
			'expirationDateTimeUTC' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $row['expirationDateTimeUTC']),
			'verifyTimes'           => $row['verifyTimes'],

		);
		$db->sql_freeresult($result);

		$datetimeUtcNow = new DateTime('now', new DateTimeZone('UTC'));
		if ($verifyCodeInDb['verifyCodeSendTime']->add(DateInterval::createFromDateString('60 seconds')) > $datetimeUtcNow)
		{
			return array(
				'state'   => RD_CONSTANTS['error'],
				'message' => $user->lang['UCP_SEND_VERIFY_CODE_ERROR'],
			);
		}

		if ($verifyCodeInDb['expirationDateTimeUTC']->sub(DateInterval::createFromDateString('3 minutes')) < $datetimeUtcNow ||
			($verifyCodeInDb['verifyTimes'] != null && $verifyCodeInDb['verifyTimes'] > 10))
		{
			$verifyCodeInDb['code'] = rand(100000, 1000000);
			$verifyCode = updateVerifyCodeById($verifyCodeInDb);
		}
		else
		{
			$verifyCode = updateSendTimeById($verifyCodeInDb);
		}
		return array(
			'state'      => RD_CONSTANTS['success'],
			'verifyCode' => $verifyCode,
		);
	}
	else
	{
		$verifyCode = array(
			'emailOrTel' => $emailOrTel,
			'code'       => rand(1000, 10000),
		);
		$verifyCode = addVerifyCode($verifyCode);
		return array(
			'state'      => RD_CONSTANTS['success'],
			'verifyCode' => $verifyCode,
		);
	}
}

function sendTelVerifyCodeOfRegister($verifyCode)
{
	global $config, $user, $phpbb_root_path, $phpEx;

	include_once($phpbb_root_path . 'includes/functions_aliyun_msg.' . $phpEx);

	set_time_limit(0);
	header('Content-Type: text/plain; charset=utf-8');
	$response = SmsDemo::sendSms($verifyCode);
}


function sendEmailVerifyCodeOfRegister($verifyCode)
{
	global $config, $user, $phpbb_root_path, $phpEx;
	include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);

	$messenger = new messenger(false);

	$messenger->template('user_verify_code');

	$messenger->to($verifyCode['emailOrTel']);

	$messenger->anti_abuse_headers($config, $user);

	$messenger->assign_vars(array(
			'VERIFY_CODE' => htmlspecialchars_decode($verifyCode['code']),)
	);

	$messenger->send(NOTIFY_EMAIL);
}


//region database operation
function isTelExist($tel)
{
	global $db;
	$sql = 'SELECT user_id
		FROM ' . USERS_TABLE . "
		WHERE user_tel = '" . $tel . "'";

	$result = $db->sql_query($sql);
	$resultNum = mysqli_num_rows($result);

	$db->sql_freeresult($result);
	return $resultNum > 0;
}

function isEmailExist($email)
{
	global $db;
	$sql = 'SELECT user_id
		FROM ' . USERS_TABLE . "
		WHERE user_email = '" . $email . "'";

	$result = $db->sql_query($sql);
	$resultNum = mysqli_num_rows($result);

	$db->sql_freeresult($result);
	return $resultNum > 0;
}

function updateVerifyCodeById($verifyCode)
{
	global $db;
	$verifyCode = initUpdatedVerifyCodeAndSendTime($verifyCode);

	$sql = "UPDATE " . VERIFY_CODE_TABLE . " 
SET 
    expirationDateTimeUTC = '" . $verifyCode['expirationDateTimeUTC'] . "',
    verifyTimes = " . $verifyCode['verifyTimes'] . ",
    updatedDateTimeUTC = '" . $verifyCode['updatedDateTimeUTC'] . "',
    verifyCodeSendTime = '" . $verifyCode['verifyCodeSendTime'] . "',
    code = '" . $verifyCode['code'] . "'
WHERE
    id = '" . $verifyCode['id'] . "'";
	$db->sql_query($sql);

	return $verifyCode;
}

function updateSendTimeById($verifyCode)
{
	global $db;
	$datetimeUtcNow = new DateTime('now', new DateTimeZone('UTC'));
	$verifyCode['verifyCodeSendTime'] = $datetimeUtcNow->format("Y-m-d H:i:s");

	$sql = "UPDATE " . VERIFY_CODE_TABLE . " 
SET 
    verifyCodeSendTime = '" . $verifyCode['verifyCodeSendTime'] . "'
WHERE
    id = " . $verifyCode['id'] . "";
	$db->sql_query($sql);

	return $verifyCode;
}

function addVerifyCode($verifyCode)
{
	global $db;
	$datetimeUtcNow = new DateTime('now', new DateTimeZone('UTC'));
	$verifyCode['createdDateTimeUTC'] = $datetimeUtcNow->format("Y-m-d H:i:s");
	$verifyCode = initUpdatedVerifyCodeAndSendTime($verifyCode);


	$sql = 'INSERT INTO ' . VERIFY_CODE_TABLE . ' ' . $db->sql_build_array('INSERT', $verifyCode);
	$db->sql_query($sql);
	return $verifyCode;
}

function initUpdatedVerifyCodeAndSendTime($verifyCode)
{
	$datetimeUtcNow = new DateTimeImmutable('now', new DateTimeZone('UTC'));
	$verifyCode['expirationDateTimeUTC'] = $datetimeUtcNow->add(DateInterval::createFromDateString('10 minutes'))
		->format("Y-m-d H:i:s")
	;
	$verifyCode['verifyTimes'] = 1;
	$verifyCode['updatedDateTimeUTC'] = $datetimeUtcNow->format("Y-m-d H:i:s");
	$verifyCode['verifyCodeSendTime'] = $datetimeUtcNow->format("Y-m-d H:i:s");
	return $verifyCode;
}
//endregion



