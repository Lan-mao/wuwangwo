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

/**
 * ucp_reset_password
 * reset password
 */
class ucp_reset_password
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $auth, $phpbb_root_path, $phpEx, $request;
		global $db, $user, $template, $phpbb_container, $phpbb_log, $phpbb_dispatcher;

		if (!$config['allow_password_reset'])
		{
			trigger_error($user->lang('UCP_PASSWORD_RESET_DISABLED', '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>'));
		}

		$data = array(
			'email_or_tel'       => strtolower($request->variable('email_or_tel', '')),
			'verify_code'      => $request->variable('verify_code', ''),
			'new_password'     => $request->variable('new_password', '', true),
			'password_confirm' => $request->variable('password_confirm', '', true),
		);
		$username = $request->variable('username', '', true);
		$email = strtolower($request->variable('email', ''));
		$submit = (isset($_POST['submit'])) ? true : false;

		add_form_key('ucp_reset_password');

		if ($submit)
		{

			$check_ary = array(
				'new_password'     => array(
					array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
					array('password')),
				'password_confirm' => array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
				'email_or_tel'     => array(
					array('string', false, 6, 60),
					array('user_emailOrTel', true, '')),
				'verify_code'      => array(
					array('string', false, 6, 60),
					array('verify_code', $data['email_or_tel'], '')),
			);

			$error = validate_data($data, $check_ary);

			if ($data['new_password'] && $data['password_confirm'] != $data['new_password'])
			{
				$error[] = ($data['password_confirm']) ? 'NEW_PASSWORD_ERROR' : 'NEW_PASSWORD_CONFIRM_EMPTY';
			}

			if (!check_form_key('ucp_reset_password'))
			{
				trigger_error('FORM_INVALID');
			}
			$error = array_map(array($user, 'lang'), $error);

			if (!count($error))
			{
				if (strpos($data['email_or_tel'], '@') !== false)
				{
					$data['email'] = $data['email_or_tel'];
					$data['user_email_hash'] = phpbb_email_hash($data['email']);
				}
				else if (strlen($data['email_or_tel']) === 11)
				{

					$data['user_tel'] = $data['email_or_tel'];
				}

				// Instantiate passwords manager
				/* @var $manager \phpbb\passwords\manager */
				$passwords_manager = $phpbb_container->get('passwords.manager');
				$sql_ary = array(
					'user_password' => $passwords_manager->hash($data['new_password']),
					'user_passchg'  => time()
				);

				if ($data['new_password'] && !$passwords_manager->check($data['new_password'], $user->data['user_password']))
				{
					$user->reset_login_keys();
					$phpbb_log->add('user', $user->data['user_id'], $user->ip, 'LOG_USER_NEW_PASSWORD', false, array(
						'reportee_id' => $user->data['user_id'],
						$user->data['username'],
					));
				}

				$message =  $user->lang['PASSWORD_RESET'];

				if (count($sql_ary))
				{
					$sql = 'UPDATE ' . USERS_TABLE . '
								SET ' . $db->sql_build_array('UPDATE', $sql_ary) . "
								WHERE user_email_hash = '" . $data['user_email_hash']. "' 
								or user_tel = '" .$data['user_tel'] . "'";
					$db->sql_query($sql);
				}

				/*// Need to update config, forum, topic, posting, messages, etc.
				if ($data['username'] != $user->data['username'] && $auth->acl_get('u_chgname') && $config['allow_namechange'])
				{
					user_update_name($user->data['username'], $data['username']);
				}

				// Now, we can remove the user completely (kill the session) - NOT BEFORE!!!
				if (!empty($sql_ary['user_actkey']))
				{
					meta_refresh(5, append_sid($phpbb_root_path . 'index.' . $phpEx));
					$message = $user->lang[$message] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid($phpbb_root_path . 'index.' . $phpEx) . '">', '</a>');

					// Because the user gets deactivated we log him out too, killing his session
					$user->session_kill();
				}
				else
				{
					meta_refresh(3, $this->u_action);
					$message = $user->lang[$message] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
				}*/

				$message = $message . '<br /><br />';
				trigger_error($message);
			}
		}

		$template->assign_vars(array(
				'ERROR'				=> (count($error)) ? implode('<br />', $error) : '',
				'EMAIL_OR_TEL'				=> $data['email_or_tel'],
				'VERIFY_CODE'				=> $data['verify_code'],
				'PASSWORD_CONFIRM'	=> $data['password_confirm'],
				'NEW_PASSWORD'		=> $data['new_password'],
				'L_PASSWORD_EXPLAIN' => $user->lang($config['pass_complex'] . '_EXPLAIN', $user->lang('CHARACTERS', (int) $config['min_pass_chars']), $user->lang('CHARACTERS', (int) $config['max_pass_chars'])),
				'S_PROFILE_ACTION'   => append_sid($phpbb_root_path . 'ucp.' . $phpEx, 'mode=sendpassword'))
		);

		$this->tpl_name = 'ucp_reset_password';
		$this->page_title = 'UCP_RESET_PASSWORD';
	}
}
