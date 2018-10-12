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
$category_sql = ' 1=1 ';

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


// Configure style, language, etc.
$user->setup('viewforum');

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

$page_title = '宠物狗在线互动教程';


page_header($page_title, true, $forum_id);

$template->set_filenames(array(
		'body' => 'viewtutorial_body.html')
);

$template->assign_vars(array(
	'TOTAL_GA' => $rd_guides_count,
));
$base_url = append_sid("{$phpbb_root_path}viewga.$phpEx", "f=$forum_id&amp;c=$category_num" . ((strlen($u_sort_param)) ? "&amp;$u_sort_param" : ''));
$pagination->generate_template_pagination($base_url, 'pagination', 'start', $rd_guides_count, RD_CONSTANTS['guide_page_size'] * 2, $start, false, false);


$first_content_arr = array(array('id' => 3, 'display_name' => '领养'),
						   array('id' => 4, 'display_name' => '饮食与健康'),
						   array('id' => 5, 'display_name' => '运动与娱乐'),
						   array('id' => 6, 'display_name' => '生活与护理'),
						   array('id' => 7, 'display_name' => '宠物训练'),);

for ($i = 0, $end = count($first_content_arr); $i < $end; ++$i)
{


	$sql_array = array(
		'SELECT'    => 't.topic_id, t.topic_title, t.forum_id, t.topic_time, t.topic_poster, t.topic_first_poster_name, t.topic_first_poster_colour, 
	t.topic_category',
		'FROM'      => array(
			TOPICS_TABLE => 't',
		),
		'LEFT_JOIN' => array(array('FROM' => array(HOT_TOPICS_TABLE => 'ht'), 'ON' => 'ht.topicId = t.topic_id ')),
		'WHERE'     => " $category_sql and t.forum_id = ". $first_content_arr[$i]['id']. " and ht.deleted != 1 AND ht.homepage = 0",
		'ORDER_BY'  => 't.topic_category ASC, ht.lft ASC , t.topic_time DESC',
	);
	$sql = $db->sql_build_query('SELECT', $sql_array);
	$result = $db->sql_query_limit($sql, RD_CONSTANTS['guide_page_size'] * 2, $start);
	$content_guide_articles = array();
	$content_assist_articles = array();
	while ($content_topic = $db->sql_fetchrow($result))
	{
		// Generate all the URIs ...
		$view_article_url_params = 'f=' . $content_topic['forum_id'] . '&amp;t=' . $content_topic['topic_id'];
		$view_article_url = append_sid("{$phpbb_root_path}viewtopic.$phpEx", $view_article_url_params);

		// Send vars to template
		$article_row = array(
			'TOPIC_AUTHOR_FULL' => get_username_string('full', $content_topic['topic_poster'], $content_topic['topic_first_poster_name'], $content_topic['topic_first_poster_colour']),
			'FIRST_POST_TIME'   => $user->format_date($content_topic['topic_time']),
			'TOPIC_TITLE'       => censor_text($content_topic['topic_title']),
			'U_VIEW_TOPIC'      => $view_article_url,
		);
		if ($content_topic['topic_category'] == 1)
		{

			$content_guide_articles[] = $article_row;
		}
		else if ($content_topic['topic_category'] == 2)
		{

			$content_assist_articles[] = $article_row;
		}
	}
	$db->sql_freeresult($result);

	$view_content_url_params = 'f=' . $first_content_arr[$i]['id'];
	$view_content_url = append_sid("{$phpbb_root_path}viewforum.$phpEx", $view_content_url_params);

	$content_row = array(
		'CONTENT_ID'           => $first_content_arr[$i]['id'],
		'CONTENT_DISPLAY_NAME' => $first_content_arr[$i]['display_name'],
		'GUIDE_ARTICLE_ARR'          => $content_guide_articles,
		'ASSIST_ARTICLE_ARR'          => $content_assist_articles,
		'U_VIEW_CONTENT'          => $view_content_url,
	);
	$template->assign_block_vars('content_rows', $content_row);
}


page_footer();
