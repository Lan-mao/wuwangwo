<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

/**
 * @ignore
 */
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/message_parser.' . $phpEx);


// Start session management
$user->session_begin();
$auth->acl($user->data);


// Grab only parameters needed here
$post_id	= $request->variable('p', 0);
$topic_id	= $request->variable('t', 0);
$forum_id	= $request->variable('f', 0);
$draft_id	= $request->variable('d', 0);


$refresh	= (isset($_POST['add_file']) || isset($_POST['delete_file']) || isset($_POST['cancel_unglobalise']) || $save || $load || $preview);
//$submit = $request->is_set_post('post') && !$refresh && !$preview;
$submit = true;
$mode		= $request->variable('mode', '');

$error = $post_data = array();
$current_time = time();

/* @var $phpbb_content_visibility \phpbb\content_visibility */
$phpbb_content_visibility = $phpbb_container->get('content.visibility');


switch ($mode)
{
	case 'first_comment':
		$sql = 'SELECT *
			FROM ' . FORUMS_TABLE . "
			WHERE forum_id = $forum_id";
	break;
}




if (!$sql)
{
	$user->setup('posting');
	trigger_error('NO_POST_MODE');
}

$result = $db->sql_query($sql);
$post_data = $db->sql_fetchrow($result);
$db->sql_freeresult($result);



if (!$post_data)
{
	if (!($mode == 'first_comment' || $mode == 'bump' || $mode == 'reply'))
	{
		$user->setup('posting');
	}
	trigger_error(($mode == 'first_comment' || $mode == 'bump' || $mode == 'reply') ? 'NO_TOPIC' : 'NO_POST');
}



$user->setup(array('posting', 'mcp', 'viewtopic'), $post_data['forum_style']);



switch ($mode)
{
	case 'first_comment':
		$is_authed = true;
	break;
}


// Subject length limiting to 60 characters if first post...
if ($mode == 'first_comment' || ($mode == 'edit' && $post_data['topic_first_post_id'] == $post_data['post_id']))
{
	$template->assign_var('S_NEW_MESSAGE', true);
}


// Determine some vars
if (isset($post_data['poster_id']) && $post_data['poster_id'] == ANONYMOUS)
{
	$post_data['quote_username'] = (!empty($post_data['post_username'])) ? $post_data['post_username'] : $user->lang['GUEST'];
}
else
{
	$post_data['quote_username'] = isset($post_data['username']) ? $post_data['username'] : '';
}


$post_data['post_edit_locked']	= (isset($post_data['post_edit_locked'])) ? (int) $post_data['post_edit_locked'] : 0;
$post_data['post_subject_md5']	= (isset($post_data['post_subject']) && $mode == 'edit') ? md5($post_data['post_subject']) : '';
$post_data['post_subject']		= (in_array($mode, array('quote', 'edit'))) ? $post_data['post_subject'] : ((isset($post_data['topic_title'])) ? $post_data['topic_title'] : '');
$post_data['topic_time_limit']	= (isset($post_data['topic_time_limit'])) ? (($post_data['topic_time_limit']) ? (int) $post_data['topic_time_limit'] / 86400 : (int) $post_data['topic_time_limit']) : 0;
$post_data['poll_length']		= (!empty($post_data['poll_length'])) ? (int) $post_data['poll_length'] / 86400 : 0;
$post_data['poll_start']		= (!empty($post_data['poll_start'])) ? (int) $post_data['poll_start'] : 0;
$post_data['icon_id']			= (!isset($post_data['icon_id']) || in_array($mode, array('quote', 'reply'))) ? 0 : (int) $post_data['icon_id'];
$post_data['poll_options']		= array();


$message_parser = new parse_message();

// Set some default variables
$uninit = array('post_attachment' => 0, 'poster_id' => $user->data['user_id'], 'enable_magic_url' => 0, 'topic_status' => 0, 'topic_type' => POST_NORMAL, 'post_subject' => '', 'topic_title' => '', 'post_time' => 0, 'post_edit_reason' => '', 'notify_set' => 0);

foreach ($uninit as $var_name => $default_value)
{
	if (!isset($post_data[$var_name]))
	{
		$post_data[$var_name] = $default_value;
	}
}
unset($uninit);


if ($post_data['poster_id'] == ANONYMOUS)
{
	$post_data['username'] = ($mode == 'quote' || $mode == 'edit') ? trim($post_data['post_username']) : '';
}
else
{
	$post_data['username'] = ($mode == 'quote' || $mode == 'edit') ? trim($post_data['username']) : '';
}


$post_data['enable_urls'] = $post_data['enable_magic_url'];

if ($mode != 'edit')
{
	$post_data['enable_sig']		= ($config['allow_sig'] && $user->optionget('attachsig')) ? true: false;
	$post_data['enable_smilies']	= ($config['allow_smilies'] && $user->optionget('smilies')) ? true : false;
	$post_data['enable_bbcode']		= ($config['allow_bbcode'] && $user->optionget('bbcode')) ? true : false;
	$post_data['enable_urls']		= true;
}


if ($mode == 'first_comment')
{
	$post_data['topic_status']		= ($request->is_set_post('lock_topic') && $auth->acl_gets('m_lock', 'f_user_lock', $forum_id)) ? ITEM_LOCKED : ITEM_UNLOCKED;
}



$post_data['enable_magic_url'] = $post_data['drafts'] = false;

// User own some drafts?
if ($user->data['is_registered'] && $auth->acl_get('u_savedrafts') && ($mode == 'reply' || $mode == 'first_comment' || $mode == 'quote'))
{
	$sql = 'SELECT draft_id
		FROM ' . DRAFTS_TABLE . '
		WHERE user_id = ' . $user->data['user_id'] .
		(($forum_id) ? ' AND forum_id = ' . (int) $forum_id : '') .
		(($topic_id) ? ' AND topic_id = ' . (int) $topic_id : '') .
		(($draft_id) ? " AND draft_id <> $draft_id" : '');
	$result = $db->sql_query_limit($sql, 1);

	if ($db->sql_fetchrow($result))
	{
		$post_data['drafts'] = true;
	}
	$db->sql_freeresult($result);
}


$check_value = (($post_data['enable_bbcode']+1) << 8) + (($post_data['enable_smilies']+1) << 4) + (($post_data['enable_urls']+1) << 2) + (($post_data['enable_sig']+1) << 1);



// HTML, BBCode, Smilies, Images and Flash status
$bbcode_status	= ($config['allow_bbcode'] && $auth->acl_get('f_bbcode', $forum_id)) ? true : false;
$smilies_status	= ($config['allow_smilies'] && $auth->acl_get('f_smilies', $forum_id)) ? true : false;
$img_status		= ($bbcode_status && $auth->acl_get('f_img', $forum_id)) ? true : false;
$url_status		= ($config['allow_post_links']) ? true : false;
$flash_status	= ($bbcode_status && $auth->acl_get('f_flash', $forum_id) && $config['allow_post_flash']) ? true : false;
$quote_status	= true;



$bbcode_utils = $phpbb_container->get('text_formatter.utils');









if ($submit || $preview || $refresh)
{
	$post_data['topic_cur_post_id']	= $request->variable('topic_cur_post_id', 0);
	$post_data['post_subject']		= $request->variable('subject', '', true);


	$origin = $request->server('HTTP_ORIGIN')?$request->server('HTTP_ORIGIN'):($request->server('HTTP_REFERER')?$request->server('HTTP_REFERER'):$request->server('REMOTE_ADDR'));


	$message_parser->message		= '[url='. $origin .']'.$post_data['post_subject']  .'[/url]';
//	$request->variable('message', '', true);

	$post_data['username']			= $request->variable('username', $post_data['username'], true);
	$post_data['post_edit_reason']	= ($request->variable('edit_reason', false, false, \phpbb\request\request_interface::POST) && $mode == 'edit' && $auth->acl_get('m_edit', $forum_id)) ? $request->variable('edit_reason', '', true) : '';

	$post_data['orig_topic_type']	= $post_data['topic_type'];
	$post_data['topic_type']		= $request->variable('topic_type', (($mode != 'first_comment') ? (int) $post_data['topic_type'] : POST_NORMAL));
	$post_data['topic_time_limit']	= $request->variable('topic_time_limit', (($mode != 'first_comment') ? (int) $post_data['topic_time_limit'] : 0));

	if ($post_data['enable_icons'] && $auth->acl_get('f_icons', $forum_id))
	{
		$post_data['icon_id'] = $request->variable('icon', (int) $post_data['icon_id']);
	}

	$post_data['enable_bbcode']		= (!$bbcode_status || isset($_POST['disable_bbcode'])) ? false : true;
	$post_data['enable_smilies']	= (!$smilies_status || isset($_POST['disable_smilies'])) ? false : true;
	$post_data['enable_urls']		= (isset($_POST['disable_magic_url'])) ? 0 : 1;
	$post_data['enable_sig']		= (!$config['allow_sig'] || !$auth->acl_get('f_sigs', $forum_id) || !$auth->acl_get('u_sig')) ? false : ((isset($_POST['attach_sig']) && $user->data['is_registered']) ? true : false);

	if ($config['allow_topic_notify'] && $user->data['is_registered'])
	{
		$notify = (isset($_POST['notify'])) ? true : false;
	}
	else
	{
		$notify = false;
	}

	$topic_lock			= (isset($_POST['lock_topic'])) ? true : false;
	$post_lock			= (isset($_POST['lock_post'])) ? true : false;
	$poll_delete		= (isset($_POST['poll_delete'])) ? true : false;

	if ($submit)
	{
		$status_switch = (($post_data['enable_bbcode']+1) << 8) + (($post_data['enable_smilies']+1) << 4) + (($post_data['enable_urls']+1) << 2) + (($post_data['enable_sig']+1) << 1);
		$status_switch = ($status_switch != $check_value);
	}
	else
	{
		$status_switch = 1;
	}

	// Delete Poll
	if ($poll_delete && $mode == 'edit' && count($post_data['poll_options']) &&
		((!$post_data['poll_last_vote'] && $post_data['poster_id'] == $user->data['user_id'] && $auth->acl_get('f_delete', $forum_id)) || $auth->acl_get('m_delete', $forum_id)))
	{
		if ($submit && check_form_key('posting'))
		{
			$sql = 'DELETE FROM ' . POLL_OPTIONS_TABLE . "
				WHERE topic_id = $topic_id";
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . POLL_VOTES_TABLE . "
				WHERE topic_id = $topic_id";
			$db->sql_query($sql);

			$topic_sql = array(
				'poll_title'		=> '',
				'poll_start' 		=> 0,
				'poll_length'		=> 0,
				'poll_last_vote'	=> 0,
				'poll_max_options'	=> 0,
				'poll_vote_change'	=> 0
			);

			$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $topic_sql) . "
				WHERE topic_id = $topic_id";
			$db->sql_query($sql);
		}

		$post_data['poll_title'] = $post_data['poll_option_text'] = '';
		$post_data['poll_vote_change'] = $post_data['poll_max_options'] = $post_data['poll_length'] = 0;
	}
	else
	{
		$post_data['poll_title']		= $request->variable('poll_title', '', true);
		$post_data['poll_length']		= $request->variable('poll_length', 0);
		$post_data['poll_option_text']	= $request->variable('poll_option_text', '', true);
		$post_data['poll_max_options']	= $request->variable('poll_max_options', 1);
		$post_data['poll_vote_change']	= ($auth->acl_get('f_votechg', $forum_id) && $auth->acl_get('f_vote', $forum_id) && isset($_POST['poll_vote_change'])) ? 1 : 0;
	}

	// If replying/quoting and last post id has changed
	// give user option to continue submit or return to post
	// notify and show user the post made between his request and the final submit
	if (($mode == 'reply' || $mode == 'quote') && $post_data['topic_cur_post_id'] && $post_data['topic_cur_post_id'] != $post_data['topic_last_post_id'])
	{
		// Only do so if it is allowed forum-wide
		if ($post_data['forum_flags'] & FORUM_FLAG_POST_REVIEW)
		{
			if (topic_review($topic_id, $forum_id, 'post_review', $post_data['topic_cur_post_id']))
			{
				$template->assign_var('S_POST_REVIEW', true);
			}

			$submit = false;
			$refresh = true;
		}
	}

	// Parse Attachments - before checksum is calculated
	$message_parser->parse_attachments('fileupload', $mode, $forum_id, $submit, $preview, $refresh);

	/**
	 * This event allows you to modify message text before parsing
	 *
	 * @event core.posting_modify_message_text
	 * @var	array	post_data	Array with post data
	 * @var	string	mode		What action to take if the form is submitted
	 *				post|reply|quote|edit|delete|bump|smilies|popup
	 * @var	int	post_id		ID of the post
	 * @var	int	topic_id	ID of the topic
	 * @var	int	forum_id	ID of the forum
	 * @var	bool	submit		Whether or not the form has been submitted
	 * @var	bool	preview		Whether or not the post is being previewed
	 * @var	bool	save		Whether or not a draft is being saved
	 * @var	bool	load		Whether or not a draft is being loaded
	 * @var	bool	cancel		Whether or not to cancel the form (returns to
	 *				viewtopic or viewforum depending on if the user
	 *				is posting a new topic or editing a post)
	 * @var	bool	refresh		Whether or not to retain previously submitted data
	 * @var	object	message_parser	The message parser object
	 * @var	array	error		Array of errors
	 * @since 3.1.2-RC1
	 * @changed 3.1.11-RC1 Added error
	 */
	$vars = array(
		'post_data',
		'mode',
		'post_id',
		'topic_id',
		'forum_id',
		'submit',
		'preview',
		'save',
		'load',
		'cancel',
		'refresh',
		'message_parser',
		'error',
	);
	extract($phpbb_dispatcher->trigger_event('core.posting_modify_message_text', compact($vars)));

	// Grab md5 'checksum' of new message
	$message_md5 = md5($message_parser->message);

	// If editing and checksum has changed we know the post was edited while we're editing
	// Notify and show user the changed post
	if ($mode == 'edit' && $post_data['forum_flags'] & FORUM_FLAG_POST_REVIEW)
	{
		$edit_post_message_checksum = $request->variable('edit_post_message_checksum', '');
		$edit_post_subject_checksum = $request->variable('edit_post_subject_checksum', '');

		// $post_data['post_checksum'] is the checksum of the post submitted in the meantime
		// $message_md5 is the checksum of the post we're about to submit
		// $edit_post_message_checksum is the checksum of the post we're editing
		// ...

		// We make sure nobody else made exactly the same change
		// we're about to submit by also checking $message_md5 != $post_data['post_checksum']
		if ($edit_post_message_checksum !== '' &&
			$edit_post_message_checksum != $post_data['post_checksum'] &&
			$message_md5 != $post_data['post_checksum']
			||
			$edit_post_subject_checksum !== '' &&
			$edit_post_subject_checksum != $post_data['post_subject_md5'] &&
			md5($post_data['post_subject']) != $post_data['post_subject_md5'])
		{
			if (topic_review($topic_id, $forum_id, 'post_review_edit', $post_id))
			{
				$template->assign_vars(array(
					'S_POST_REVIEW'			=> true,

					'L_POST_REVIEW'			=> $user->lang['POST_REVIEW_EDIT'],
					'L_POST_REVIEW_EXPLAIN'	=> $user->lang['POST_REVIEW_EDIT_EXPLAIN'],
				));
			}

			$submit = false;
			$refresh = true;
		}
	}

	// Check checksum ... don't re-parse message if the same
	$update_message = ($mode != 'edit' || $message_md5 != $post_data['post_checksum'] || $status_switch || strlen($post_data['bbcode_uid']) < BBCODE_UID_LEN) ? true : false;

	// Also check if subject got updated...
	$update_subject = $mode != 'edit' || ($post_data['post_subject_md5'] && $post_data['post_subject_md5'] != md5($post_data['post_subject']));

	// Parse message
	if ($update_message)
	{
		if (count($message_parser->warn_msg))
		{
			$error[] = implode('<br />', $message_parser->warn_msg);
			$message_parser->warn_msg = array();
		}

		if (!$preview || !empty($message_parser->message))
		{
			$message_parser->parse($post_data['enable_bbcode'], ($config['allow_post_links']) ? $post_data['enable_urls'] : false, $post_data['enable_smilies'], $img_status, $flash_status, $quote_status, $config['allow_post_links']);
		}

		// On a refresh we do not care about message parsing errors
		if (count($message_parser->warn_msg) && $refresh && !$preview)
		{
			$message_parser->warn_msg = array();
		}
	}
	else
	{
		$message_parser->bbcode_bitfield = $post_data['bbcode_bitfield'];
	}

	$ignore_flood = $auth->acl_get('u_ignoreflood') ? true : $auth->acl_get('f_ignoreflood', $forum_id);
	if ($mode != 'edit' && !$preview && !$refresh && $config['flood_interval'] && !$ignore_flood)
	{
		// Flood check
		$last_post_time = 0;

		if ($user->data['is_registered'])
		{
			$last_post_time = $user->data['user_lastpost_time'];
		}
		else
		{
			$sql = 'SELECT post_time AS last_post_time
				FROM ' . POSTS_TABLE . "
				WHERE poster_ip = '" . $user->ip . "'
					AND post_time > " . ($current_time - $config['flood_interval']);
			$result = $db->sql_query_limit($sql, 1);
			if ($row = $db->sql_fetchrow($result))
			{
				$last_post_time = $row['last_post_time'];
			}
			$db->sql_freeresult($result);
		}

		if ($last_post_time && ($current_time - $last_post_time) < intval($config['flood_interval']))
		{
			$error[] = $user->lang['FLOOD_ERROR'];
		}
	}

	// Validate username
	if (($post_data['username'] && !$user->data['is_registered']) || ($mode == 'edit' && $post_data['poster_id'] == ANONYMOUS && $post_data['username'] && $post_data['post_username'] && $post_data['post_username'] != $post_data['username']))
	{
		if (!function_exists('validate_username'))
		{
			include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
		}

		$user->add_lang('ucp');

		if (($result = validate_username($post_data['username'], (!empty($post_data['post_username'])) ? $post_data['post_username'] : '')) !== false)
		{
			$error[] = $user->lang[$result . '_USERNAME'];
		}

		if (($result = validate_string($post_data['username'], false, $config['min_name_chars'], $config['max_name_chars'])) !== false)
		{
			$min_max_amount = ($result == 'TOO_SHORT') ? $config['min_name_chars'] : $config['max_name_chars'];
			$error[] = $user->lang('FIELD_' . $result, $min_max_amount, $user->lang['USERNAME']);
		}
	}

	/*if ($config['enable_post_confirm'] && !$user->data['is_registered'] && in_array($mode, array('quote', 'first_comment', 'reply')))
	{
		$captcha_data = array(
			'message'	=> $request->variable('message', '', true),
			'subject'	=> $request->variable('subject', '', true),
			'username'	=> $request->variable('username', '', true),
		);
		$vc_response = $captcha->validate($captcha_data);
		if ($vc_response)
		{
			$error[] = $vc_response;
		}
	}*/

	// check form
	/*if (($submit || $preview) && !check_form_key('posting'))
	{
		$error[] = $user->lang['FORM_INVALID'];
	}*/

	if ($submit && $mode == 'edit' && $post_data['post_visibility'] == ITEM_DELETED && !isset($_POST['soft_delete']) && $auth->acl_get('m_approve', $forum_id))
	{
		$is_first_post = ($post_id == $post_data['topic_first_post_id'] || !$post_data['topic_posts_approved']);
		$is_last_post = ($post_id == $post_data['topic_last_post_id'] || !$post_data['topic_posts_approved']);
		$updated_post_data = $phpbb_content_visibility->set_post_visibility(ITEM_APPROVED, $post_id, $post_data['topic_id'], $post_data['forum_id'], $user->data['user_id'], time(), '', $is_first_post, $is_last_post);

		if (!empty($updated_post_data))
		{
			// Update the post_data, so we don't need to refetch it.
			$post_data = array_merge($post_data, $updated_post_data);
		}
	}

	// Parse subject
	if (!$preview && !$refresh && utf8_clean_string($post_data['post_subject']) === '' && ($mode == 'first_comment' || ($mode == 'edit' && $post_data['topic_first_post_id'] == $post_id)))
	{
		$error[] = $user->lang['EMPTY_SUBJECT'];
	}

	// Check for out-of-bounds characters that are currently
	// not supported by utf8_bin in MySQL
	if (preg_match_all('/[\x{10000}-\x{10FFFF}]/u', $post_data['post_subject'], $matches))
	{
		$character_list = implode('<br />', $matches[0]);
		$error[] = $user->lang('UNSUPPORTED_CHARACTERS_SUBJECT', $character_list);
	}

	$post_data['poll_last_vote'] = (isset($post_data['poll_last_vote'])) ? $post_data['poll_last_vote'] : 0;

	if ($post_data['poll_option_text'] &&
		($mode == 'first_comment' || ($mode == 'edit' && $post_id == $post_data['topic_first_post_id']/* && (!$post_data['poll_last_vote'] || $auth->acl_get('m_edit', $forum_id))*/))
		&& $auth->acl_get('f_poll', $forum_id))
	{
		$poll = array(
			'poll_title'		=> $post_data['poll_title'],
			'poll_length'		=> $post_data['poll_length'],
			'poll_max_options'	=> $post_data['poll_max_options'],
			'poll_option_text'	=> $post_data['poll_option_text'],
			'poll_start'		=> $post_data['poll_start'],
			'poll_last_vote'	=> $post_data['poll_last_vote'],
			'poll_vote_change'	=> $post_data['poll_vote_change'],
			'enable_bbcode'		=> $post_data['enable_bbcode'],
			'enable_urls'		=> $post_data['enable_urls'],
			'enable_smilies'	=> $post_data['enable_smilies'],
			'img_status'		=> $img_status
		);

		$message_parser->parse_poll($poll);

		$post_data['poll_options'] = (isset($poll['poll_options'])) ? $poll['poll_options'] : array();
		$post_data['poll_title'] = (isset($poll['poll_title'])) ? $poll['poll_title'] : '';

		/* We reset votes, therefore also allow removing options
		if ($post_data['poll_last_vote'] && ($poll['poll_options_size'] < $orig_poll_options_size))
		{
			$message_parser->warn_msg[] = $user->lang['NO_DELETE_POLL_OPTIONS'];
		}*/
	}
	else if ($mode == 'edit' && $post_id == $post_data['topic_first_post_id'] && $auth->acl_get('f_poll', $forum_id))
	{
		// The user removed all poll options, this is equal to deleting the poll.
		$poll = array(
			'poll_title'		=> '',
			'poll_length'		=> 0,
			'poll_max_options'	=> 0,
			'poll_option_text'	=> '',
			'poll_start'		=> 0,
			'poll_last_vote'	=> 0,
			'poll_vote_change'	=> 0,
			'poll_options'		=> array(),
		);

		$post_data['poll_options'] = array();
		$post_data['poll_title'] = '';
		$post_data['poll_start'] = $post_data['poll_length'] = $post_data['poll_max_options'] = $post_data['poll_last_vote'] = $post_data['poll_vote_change'] = 0;
	}
	else if (!$auth->acl_get('f_poll', $forum_id) && ($mode == 'edit') && ($post_id == $post_data['topic_first_post_id']) && !$bbcode_utils->is_empty($original_poll_data['poll_title']))
	{
		// We have a poll but the editing user is not permitted to create/edit it.
		// So we just keep the original poll-data.
		// Decode the poll title and options text fisrt.
		$original_poll_data['poll_title'] = $bbcode_utils->unparse($original_poll_data['poll_title']);
		$original_poll_data['poll_option_text'] = $bbcode_utils->unparse($original_poll_data['poll_option_text']);
		$original_poll_data['poll_options'] = explode("\n", $original_poll_data['poll_option_text']);

		$poll = array_merge($original_poll_data, array(
			'enable_bbcode'		=> $post_data['enable_bbcode'],
			'enable_urls'		=> $post_data['enable_urls'],
			'enable_smilies'	=> $post_data['enable_smilies'],
			'img_status'		=> $img_status,
		));

		$message_parser->parse_poll($poll);

		$post_data['poll_options'] = (isset($poll['poll_options'])) ? $poll['poll_options'] : array();
		$post_data['poll_title'] = (isset($poll['poll_title'])) ? $poll['poll_title'] : '';
	}
	else
	{
		$poll = array();
	}

	// Check topic type
	if ($post_data['topic_type'] != POST_NORMAL && ($mode == 'first_comment' || ($mode == 'edit' && $post_data['topic_first_post_id'] == $post_id)))
	{
		switch ($post_data['topic_type'])
		{
			case POST_GLOBAL:
				$auth_option = 'f_announce_global';
			break;

			case POST_ANNOUNCE:
				$auth_option = 'f_announce';
			break;

			case POST_STICKY:
				$auth_option = 'f_sticky';
			break;

			default:
				$auth_option = '';
			break;
		}

		if ($auth_option != '' && !$auth->acl_get($auth_option, $forum_id))
		{
			// There is a special case where a user edits his post whereby the topic type got changed by an admin/mod.
			// Another case would be a mod not having sticky permissions for example but edit permissions.
			if ($mode == 'edit')
			{
				// To prevent non-authed users messing around with the topic type we reset it to the original one.
				$post_data['topic_type'] = $post_data['orig_topic_type'];
			}
			else
			{
				$error[] = $user->lang['CANNOT_POST_' . str_replace('F_', '', strtoupper($auth_option))];
			}
		}
	}

	if (count($message_parser->warn_msg))
	{
		$error[] = implode('<br />', $message_parser->warn_msg);
	}

	// DNSBL check
	if ($config['check_dnsbl'] && !$refresh)
	{
		if (($dnsbl = $user->check_dnsbl('first_comment')) !== false)
		{
			$error[] = sprintf($user->lang['IP_BLACKLISTED'], $user->ip, $dnsbl[1]);
		}
	}

	/**
	 * This event allows you to define errors before the post action is performed
	 *
	 * @event core.posting_modify_submission_errors
	 * @var	array	post_data	Array with post data
	 * @var	array	poll		Array with poll data from post (must be used instead of the post_data equivalent)
	 * @var	string	mode		What action to take if the form is submitted
	 *				post|reply|quote|edit|delete|bump|smilies|popup
	 * @var	int	post_id		ID of the post
	 * @var	int	topic_id	ID of the topic
	 * @var	int	forum_id	ID of the forum
	 * @var	bool	submit		Whether or not the form has been submitted
	 * @var	array	error		Any error strings; a non-empty array aborts form submission.
	 *				NOTE: Should be actual language strings, NOT language keys.
	 * @since 3.1.0-RC5
	 * @changed 3.1.5-RC1 Added poll array to the event
	 * @changed 3.2.0-a1 Removed undefined page_title
	 */
	$vars = array(
		'post_data',
		'poll',
		'mode',
		'post_id',
		'topic_id',
		'forum_id',
		'submit',
		'error',
	);
	extract($phpbb_dispatcher->trigger_event('core.posting_modify_submission_errors', compact($vars)));

	// Store message, sync counters
	if (!count($error) && $submit)
	{
		if ($submit)
		{
			// Lock/Unlock Topic
			$change_topic_status = $post_data['topic_status'];
			$perm_lock_unlock = ($auth->acl_get('m_lock', $forum_id) || ($auth->acl_get('f_user_lock', $forum_id) && $user->data['is_registered'] && !empty($post_data['topic_poster']) && $user->data['user_id'] == $post_data['topic_poster'] && $post_data['topic_status'] == ITEM_UNLOCKED)) ? true : false;

			if ($post_data['topic_status'] == ITEM_LOCKED && !$topic_lock && $perm_lock_unlock)
			{
				$change_topic_status = ITEM_UNLOCKED;
			}
			else if ($post_data['topic_status'] == ITEM_UNLOCKED && $topic_lock && $perm_lock_unlock)
			{
				$change_topic_status = ITEM_LOCKED;
			}

			if ($change_topic_status != $post_data['topic_status'])
			{
				$sql = 'UPDATE ' . TOPICS_TABLE . "
					SET topic_status = $change_topic_status
					WHERE topic_id = $topic_id
						AND topic_moved_id = 0";
				$db->sql_query($sql);

				$user_lock = ($auth->acl_get('f_user_lock', $forum_id) && $user->data['is_registered'] && $user->data['user_id'] == $post_data['topic_poster']) ? 'USER_' : '';

				$phpbb_log->add('mod', $user->data['user_id'], $user->ip, 'LOG_' . $user_lock . (($change_topic_status == ITEM_LOCKED) ? 'LOCK' : 'UNLOCK'), false, array(
					'forum_id' => $forum_id,
					'topic_id' => $topic_id,
					$post_data['topic_title']
				));
			}

			// Lock/Unlock Post Edit
			if ($mode == 'edit' && $post_data['post_edit_locked'] == ITEM_LOCKED && !$post_lock && $auth->acl_get('m_edit', $forum_id))
			{
				$post_data['post_edit_locked'] = ITEM_UNLOCKED;
			}
			else if ($mode == 'edit' && $post_data['post_edit_locked'] == ITEM_UNLOCKED && $post_lock && $auth->acl_get('m_edit', $forum_id))
			{
				$post_data['post_edit_locked'] = ITEM_LOCKED;
			}

			$data = array(
				'topic_title'			=> (empty($post_data['topic_title'])) ? $post_data['post_subject'] : $post_data['topic_title'],
				'topic_first_post_id'	=> (isset($post_data['topic_first_post_id'])) ? (int) $post_data['topic_first_post_id'] : 0,
				'topic_last_post_id'	=> (isset($post_data['topic_last_post_id'])) ? (int) $post_data['topic_last_post_id'] : 0,
				'topic_time_limit'		=> (int) $post_data['topic_time_limit'],
				'topic_attachment'		=> (isset($post_data['topic_attachment'])) ? (int) $post_data['topic_attachment'] : 0,
				'post_id'				=> (int) $post_id,
				'topic_id'				=> (int) $topic_id,
				'forum_id'				=> (int) $forum_id,
				'icon_id'				=> (int) $post_data['icon_id'],
				'poster_id'				=> (int) $post_data['poster_id'],
				'enable_sig'			=> (bool) $post_data['enable_sig'],
				'enable_bbcode'			=> (bool) $post_data['enable_bbcode'],
				'enable_smilies'		=> (bool) $post_data['enable_smilies'],
				'enable_urls'			=> (bool) $post_data['enable_urls'],
				'enable_indexing'		=> (bool) $post_data['enable_indexing'],
				'message_md5'			=> (string) $message_md5,
				'post_checksum'			=> (isset($post_data['post_checksum'])) ? (string) $post_data['post_checksum'] : '',
				'post_edit_reason'		=> $post_data['post_edit_reason'],
				'post_edit_user'		=> ($mode == 'edit') ? $user->data['user_id'] : ((isset($post_data['post_edit_user'])) ? (int) $post_data['post_edit_user'] : 0),
				'forum_parents'			=> $post_data['forum_parents'],
				'forum_name'			=> $post_data['forum_name'],
				'notify'				=> $notify,
				'notify_set'			=> $post_data['notify_set'],
				'poster_ip'				=> (isset($post_data['poster_ip'])) ? $post_data['poster_ip'] : $user->ip,
				'post_edit_locked'		=> (int) $post_data['post_edit_locked'],
				'bbcode_bitfield'		=> $message_parser->bbcode_bitfield,
				'bbcode_uid'			=> $message_parser->bbcode_uid,
				'message'				=> $message_parser->message,
				'attachment_data'		=> $message_parser->attachment_data,
				'filename_data'			=> $message_parser->filename_data,
				'topic_status'			=> $post_data['topic_status'],

				'topic_visibility'			=> (isset($post_data['topic_visibility'])) ? $post_data['topic_visibility'] : false,
				'post_visibility'			=> (isset($post_data['post_visibility'])) ? $post_data['post_visibility'] : false,
			);

			if ($mode == 'edit')
			{
				$data['topic_posts_approved'] = $post_data['topic_posts_approved'];
				$data['topic_posts_unapproved'] = $post_data['topic_posts_unapproved'];
				$data['topic_posts_softdeleted'] = $post_data['topic_posts_softdeleted'];
			}

			// Only return the username when it is either a guest posting or we are editing a post and
			// the username was supplied; otherwise post_data might hold the data of the post that is
			// being quoted (which could result in the username being returned being that of the quoted
			// post's poster, not the poster of the current post). See: PHPBB3-11769 for more information.
			$post_author_name = ((!$user->data['is_registered'] || $mode == 'edit') && $post_data['username'] !== '') ? $post_data['username'] : '';

			/**
			 * This event allows you to define errors before the post action is performed
			 *
			 * @event core.posting_modify_submit_post_before
			 * @var	array	post_data	Array with post data
			 * @var	array	poll		Array with poll data
			 * @var	array	data		Array with post data going to be stored in the database
			 * @var	string	mode		What action to take if the form is submitted
			 *				post|reply|quote|edit|delete
			 * @var	int	post_id		ID of the post
			 * @var	int	topic_id	ID of the topic
			 * @var	int	forum_id	ID of the forum
			 * @var	string	post_author_name	Author name for guest posts
			 * @var	bool	update_message		Boolean if the post message was changed
			 * @var	bool	update_subject		Boolean if the post subject was changed
			 *				NOTE: Should be actual language strings, NOT language keys.
			 * @since 3.1.0-RC5
			 * @changed 3.1.6-RC1 remove submit and error from event  Submit and Error are checked previously prior to running event
			 * @change 3.2.0-a1 Removed undefined page_title
			 */
			$vars = array(
				'post_data',
				'poll',
				'data',
				'mode',
				'post_id',
				'topic_id',
				'forum_id',
				'post_author_name',
				'update_message',
				'update_subject',
			);
			extract($phpbb_dispatcher->trigger_event('core.posting_modify_submit_post_before', compact($vars)));

			// The last parameter tells submit_post if search indexer has to be run
			$redirect_url = submit_post($mode, $post_data['post_subject'], $post_author_name, $post_data['topic_type'], $poll, $data, $update_message, ($update_message || $update_subject) ? true : false);

			/**
			 * This event allows you to define errors after the post action is performed
			 *
			 * @event core.posting_modify_submit_post_after
			 * @var	array	post_data	Array with post data
			 * @var	array	poll		Array with poll data
			 * @var	array	data		Array with post data going to be stored in the database
			 * @var	string	mode		What action to take if the form is submitted
			 *				post|reply|quote|edit|delete
			 * @var	int	post_id		ID of the post
			 * @var	int	topic_id	ID of the topic
			 * @var	int	forum_id	ID of the forum
			 * @var	string	post_author_name	Author name for guest posts
			 * @var	bool	update_message		Boolean if the post message was changed
			 * @var	bool	update_subject		Boolean if the post subject was changed
			 * @var	string	redirect_url		URL the user is going to be redirected to
			 *				NOTE: Should be actual language strings, NOT language keys.
			 * @since 3.1.0-RC5
			 * @changed 3.1.6-RC1 remove submit and error from event  Submit and Error are checked previously prior to running event
			 * @change 3.2.0-a1 Removed undefined page_title
			 */
			$vars = array(
				'post_data',
				'poll',
				'data',
				'mode',
				'post_id',
				'topic_id',
				'forum_id',
				'post_author_name',
				'update_message',
				'update_subject',
				'redirect_url',
			);
			extract($phpbb_dispatcher->trigger_event('core.posting_modify_submit_post_after', compact($vars)));

			if ($config['enable_post_confirm'] && !$user->data['is_registered'] && (isset($captcha) && $captcha->is_solved() === true) && ($mode == 'first_comment' || $mode == 'reply' || $mode == 'quote'))
			{
				$captcha->reset();
			}

			// Handle delete mode...
			if ($request->is_set_post('delete') || $request->is_set_post('delete_permanent'))
			{
				$delete_reason = $request->variable('delete_reason', '', true);
				phpbb_handle_post_delete($forum_id, $topic_id, $post_id, $post_data, !$request->is_set_post('delete_permanent'), $delete_reason);
				return;
			}

			// Check the permissions for post approval.
			// Moderators must go through post approval like ordinary users.
			if ((!$auth->acl_get('f_noapprove', $data['forum_id']) && empty($data['force_approved_state'])) || (isset($data['force_approved_state']) && !$data['force_approved_state']))
			{
				meta_refresh(10, $redirect_url);
				$message = ($mode == 'edit') ? $user->lang['POST_EDITED_MOD'] : $user->lang['POST_STORED_MOD'];
				$message .= (($user->data['user_id'] == ANONYMOUS) ? '' : ' '. $user->lang['POST_APPROVAL_NOTIFY']);
				$message .= '<br /><br />' . sprintf($user->lang['RETURN_FORUM'], '<a href="' . append_sid("{$phpbb_root_path}viewforum.$phpEx", 'f=' . $data['forum_id']) . '">', '</a>');
				trigger_error($message);
			}

			redirect($redirect_url);
		}
	}
}
