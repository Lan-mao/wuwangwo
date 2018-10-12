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
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session
$user->session_begin();
$auth->acl($user->data);

// Start initial var setup
$forum_id = $request->variable('f', 0);
$category_num = $request->variable('c', 0);
$start = $request->variable('start', 0);

/* @var $pagination \phpbb\pagination */
$pagination = $phpbb_container->get('pagination');

$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';

if ($category_num == 2)
{
	$category_sql = ' t.topic_category = 2 ';
}
else
{

	$category_sql = ' t.topic_category = 1 ';
}

$sql_from = FORUMS_TABLE . ' f';
$lastread_select = '';

// Grab appropriate forum data
if ($config['load_db_lastread'] && $user->data['is_registered'])
{
	$sql_from .= ' LEFT JOIN ' . FORUMS_TRACK_TABLE . ' ft ON (ft.user_id = ' . $user->data['user_id'] . '
		AND ft.forum_id = f.forum_id)';
	$lastread_select .= ', ft.mark_time';
}

if ($user->data['is_registered'])
{
	$sql_from .= ' LEFT JOIN ' . FORUMS_WATCH_TABLE . ' fw ON (fw.forum_id = f.forum_id AND fw.user_id = ' . $user->data['user_id'] . ')';
	$lastread_select .= ', fw.notify_status';
}


$sql = "SELECT f.* $lastread_select
	FROM $sql_from
	WHERE f.forum_id = $forum_id";
$result = $db->sql_query($sql);
$forum_data = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

if (!$forum_data)
{
	trigger_error('NO_FORUM');
}


// Configure style, language, etc.
$user->setup('viewforum', $forum_data['forum_style']);


$sql_array = array(
	'SELECT'    => 'COUNT(t.topic_id) AS num_guides',
	'FROM'      => array(
		TOPICS_TABLE => 't',
	),
	'LEFT_JOIN' => array(array('FROM' => array(HOT_TOPICS_TABLE => 'ht'), 'ON' => 'ht.topicId = t.topic_id ')),
	'WHERE'     => " $category_sql and t.forum_id = $forum_id and ht.deleted != 1 AND ht.homepage = 0",
);


$rd_sql = $db->sql_build_query('SELECT', $sql_array);
$count_result = $db->sql_query($rd_sql);
$rd_guides_count = (int) $db->sql_fetchfield('num_guides');
$db->sql_freeresult($count_result);


$start = $pagination->validate_start($start, RD_CONSTANTS['guide_page_size'], $rd_guides_count);

$page_title = $forum_data['forum_name'] . ($category_num ? ($category_num == 1 ? '-指南' : '-工具/帮助') : '') . ($start ? ' - ' . $user->lang('PAGE_TITLE_NUMBER', $pagination->get_on_page(RD_CONSTANTS['guide_page_size'], $start)) : '');


page_header($page_title, true, $forum_id);

$template->set_filenames(array(
		'body' => 'viewga_body.html')
);

$template->assign_vars(array(
	'TOTAL_GA' => $rd_guides_count,
));
$base_url = append_sid("{$phpbb_root_path}viewga.$phpEx", "f=$forum_id&amp;c=$category_num" . ((strlen($u_sort_param)) ? "&amp;$u_sort_param" : ''));
$pagination->generate_template_pagination($base_url, 'pagination', 'start', $rd_guides_count, RD_CONSTANTS['guide_page_size'] * 2, $start, false, false);

$sql_array = array(
	'SELECT'    => 't.topic_id, t.topic_title, t.forum_id, t.topic_time, t.topic_poster, t.topic_first_poster_name, t.topic_first_poster_colour, 
	t.topic_category',
	'FROM'      => array(
		TOPICS_TABLE => 't',
	),
	'LEFT_JOIN' => array(array('FROM' => array(HOT_TOPICS_TABLE => 'ht'), 'ON' => 'ht.topicId = t.topic_id ')),
	'WHERE'     => " $category_sql and t.forum_id = $forum_id and ht.deleted != 1 AND ht.homepage = 0",
	'ORDER_BY'  => 'ht.lft ASC , t.topic_time DESC',
);
$sql = $db->sql_build_query('SELECT', $sql_array);
$result = $db->sql_query_limit($sql, RD_CONSTANTS['guide_page_size'] * 2, $start);

while ($guide = $db->sql_fetchrow($result))
{
	// Generate all the URIs ...
	$view_guide_url_params = 'f=' . $guide['forum_id'] . '&amp;t=' . $guide['topic_id'];
	$view_guide_url = $auth->acl_get('f_read', $forum_id) ? append_sid("{$phpbb_root_path}viewtopic.$phpEx", $view_guide_url_params) : false;

	// Send vars to template
	$ga_row = array(
		'TOPIC_AUTHOR_FULL' => get_username_string('full', $guide['topic_poster'], $guide['topic_first_poster_name'], $guide['topic_first_poster_colour']),
		'FIRST_POST_TIME'   => $user->format_date($guide['topic_time']),
		'TOPIC_TITLE'       => censor_text($guide['topic_title']),
		'U_VIEW_TOPIC'      => $view_guide_url,
	);
	$template->assign_block_vars('ga_row', $ga_row);
}
$db->sql_freeresult($result);


page_footer();
