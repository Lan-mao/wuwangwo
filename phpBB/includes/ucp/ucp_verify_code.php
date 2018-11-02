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


include_once($phpbb_root_path . 'includes/functions_randian.' . $phpEx);


class ucp_verify_code
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $phpbb_root_path, $phpEx;
		global $db, $user, $auth, $template, $request;

		if ($request->is_ajax())
		{

			$data = array(
				'emailOrTel'       => $request->variable('emailOrTel', '', true),
				'existRequirement' => $request->variable('existRequirement', '', true),
			);

			$message = validate_user_emailOrTel($data['emailOrTel'], $data['existRequirement'] == RD_CONSTANTS['exist']);
			if ($message)
			{
				$responseData = array(
					'state'   => RD_CONSTANTS['error'],
					'message' => (empty($user->lang[$message . '_' . strtoupper('emailOrTel')])) ?
						$user->lang[$message] :
						$user->lang[$message . '_' . strtoupper('emailOrTel')],
				);

				$json_response = new \phpbb\json_response();
				$json_response->send($responseData);
			}

			$verifyCodeData = saveOrUpdateVerifyCode($data['emailOrTel']);
			if (RD_CONSTANTS['error'] == $verifyCodeData['state'])
			{
				$json_response = new \phpbb\json_response();
				$json_response->send($verifyCodeData);
			}

			if (strpos($data['emailOrTel'], '@') === false)
			{
				sendTelVerifyCodeOfRegister($verifyCodeData['verifyCode']);
			}
			else if (strpos($data['emailOrTel'], '@') !== false)
			{
				sendEmailVerifyCodeOfRegister($verifyCodeData['verifyCode']);
			}

			$responseData = array(
				'state'   => RD_CONSTANTS['success'],
				'message' => $message,
			);
			$json_response = new \phpbb\json_response();
			$json_response->send($responseData);
		}

	}
}
