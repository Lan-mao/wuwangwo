<?php
/**
*
* This file is part of the phpBB Forum Software package.
* @简体中文语言　David Yin <https://www.g2soft.net/>
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

/**
* DO NOT CHANGE
*/ 
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACTION'				=> '操作',
	'ACTION_NOTE'			=> '操作/提示',
	'ADD_FEEDBACK'			=> '添加反馈',
	'ADD_FEEDBACK_EXPLAIN'	=> '如果您需要添加一个报告请填写下列表格。只可使用纯文本，不允许HTML， BBCode等语法格式.',
	'ADD_WARNING'			=> '发出警告',
	'ADD_WARNING_EXPLAIN'	=> '要对此用户发出一个警告，请首先填写下表。请使用纯文本； HTML， BBCode 等都不可以。',
	'ALL_ENTRIES'			=> '所有条目',
	'ALL_NOTES_DELETED'		=> '成功删除所有用户消息',
	'ALL_REPORTS'			=> '全部举报',
	'ALREADY_REPORTED'		=> '此贴已经被举报过了',
	'ALREADY_REPORTED_PM'	=> '这个短信已经被举报过了.',
	'ALREADY_WARNED'		=> '此贴已经被警告过了',
	'APPROVE'				=> '批准发布',
	'APPROVE_POST'			=> '批准此贴',
	'APPROVE_POST_CONFIRM'	=> '您确定要批准此贴发布吗？',
	'APPROVE_POSTS'			=> '批准这些帖子',
	'APPROVE_POSTS_CONFIRM'	=> '您确定要批准这些帖子发布吗？',
	'APPROVE_TOPIC'			=> '批准主题',
	'APPROVE_TOPIC_CONFIRM'	=> '您确定要批准此主题吗？',
	'APPROVE_TOPICS'		=> '批准主题',
	'APPROVE_TOPICS_CONFIRM'=> '您确定要批准所选主题吗？',

	'CANNOT_MOVE_SAME_FORUM'=> '您不能将主题移动到它当前所在的版面内',
	'CANNOT_WARN_ANONYMOUS'	=> '您不能警告尚未注册的访客',
	'CANNOT_WARN_SELF'		=> '您不能警告您自己',
	'CAN_LEAVE_BLANK'		=> '这里允许空白。',
	'CHANGE_POSTER'			=> '改变作者',
	'CLOSE_PM_REPORT'		=> '关闭举报',
	'CLOSE_PM_REPORT_CONFIRM'	=> '您确定要关闭这个举报吗？',
	'CLOSE_PM_REPORTS'		=> '关闭举报',
	'CLOSE_PM_REPORTS_CONFIRM'	=> '您确定要关闭这些举报吗？',
	'CLOSE_REPORT'			=> '关闭举报',
	'CLOSE_REPORT_CONFIRM'	=> '您确定要关闭这个举报吗？',
	'CLOSE_REPORTS'			=> '关闭举报',
	'CLOSE_REPORTS_CONFIRM'	=> '您确定要关闭这些举报吗？',

	'DELETE_PM_REPORT'			=> '删除举报',
	'DELETE_PM_REPORT_CONFIRM'	=> '您确定要删除这个举报吗？',
	'DELETE_PM_REPORTS'			=> '删除举报',
	'DELETE_PM_REPORTS_CONFIRM'	=> '您确定要删除这些举报吗？',
	'DELETE_POSTS'				=> '删除帖子',
	'DELETE_REPORT'				=> '删除举报',
	'DELETE_REPORT_CONFIRM'		=> '您确定要删除这个举报吗？',
	'DELETE_REPORTS'			=> '删除举报',
	'DELETE_REPORTS_CONFIRM'	=> '您确定要删除这些举报吗？',
	'DELETE_SHADOW_TOPIC'		=> '删除影子主题',
	'DELETE_TOPICS'				=> '删除选定主题',
	'DISAPPROVE'				=> '禁止发布',
	'DISAPPROVE_REASON'			=> '禁止发布的理由',
	'DISAPPROVE_POST'			=> '禁发此贴',
	'DISAPPROVE_POST_CONFIRM'	=> '您确定要禁止此贴发布吗？',
	'DISAPPROVE_POSTS'			=> '禁发这些帖子',
	'DISAPPROVE_POSTS_CONFIRM'	=> '您确定要禁止这些帖子发布吗？',
	'DISPLAY_LOG'				=> '显示记录',
	'DISPLAY_OPTIONS'			=> '显示选项',

	'EMPTY_REPORT'					=> '选择这个理由时您必须手动输入描述',
	'EMPTY_TOPICS_REMOVED_WARNING'	=> '请注意一个或多个主题因为内容为空已经从数据库中删除',

	'FEEDBACK'				=> '反馈',
	'FORK'					=> '复制',
	'FORK_TOPIC'			=> '复制主题',
	'FORK_TOPIC_CONFIRM'	=> '您确认要复制这个主题吗？',
	'FORK_TOPICS'			=> '复制选中的主题',
	'FORK_TOPICS_CONFIRM'	=> '您确认要复制这些主题吗？',
	'FORUM_DESC'			=> '版面简介',
	'FORUM_NAME'			=> '版面名称',
	'FORUM_NOT_EXIST'		=> '您选择的版面不存在',
	'FORUM_NOT_POSTABLE'	=> '您选择的版面不能发帖',
	'FORUM_STATUS'			=> '版面状态',
	'FORUM_STYLE'			=> '版面风格',

	'GLOBAL_ANNOUNCEMENT'	=> '全局公告',

	'IP_INFO'				=> 'IP地址信息',
	'IPS_POSTED_FROM'		=> '这个用户的发帖IP地址',

	'LATEST_LOGS'				=> '最近的5个操作记录',
	'LATEST_REPORTED'			=> '最新的5个举报',
	'LATEST_REPORTED_PMS'		=> '最新的5个站内短信举报',
	'LATEST_UNAPPROVED'			=> '最新5篇等待批准发布的帖子',
	'LATEST_WARNING_TIME'		=> '最近发出的警告',
	'LATEST_WARNINGS'			=> '最近的5个警告记录',
	'LEAVE_SHADOW'				=> '保留影子主题',
	'LIST_REPORTS'				=> array(
		1	=> '%d 报告',
		2	=> '%d 报告',
	),
	'LOCK'						=> '锁定',
	'LOCK_POST_POST'			=> '锁定此贴',
	'LOCK_POST_POST_CONFIRM'	=> '您确定要禁止对此贴的编辑操作吗？',
	'LOCK_POST_POSTS'			=> '锁定这些帖子',
	'LOCK_POST_POSTS_CONFIRM'	=> '您确定要禁止对这些帖子的编辑操作吗？',
	'LOCK_TOPIC_CONFIRM'		=> '您确定要锁定这个主题吗？',
	'LOCK_TOPICS'				=> '锁定这些主题',
	'LOCK_TOPICS_CONFIRM'		=> '您确定要锁定这些主题吗？',
	'LOGS_CURRENT_TOPIC'		=> '正在查看日志：',
	'LOGIN_EXPLAIN_MCP'			=> '您必须登录后才能管理这个版面。',
	'LOGVIEW_VIEWPOST'			=> '查看帖子',
	'LOGVIEW_VIEWTOPIC'			=> '查看主题',
	'LOGVIEW_VIEWLOGS'			=> '查看主题日志',
	'LOGVIEW_VIEWFORUM'			=> '查看版面',
	'LOOKUP_ALL'				=> '检索所有IP地址',
	'LOOKUP_IP'					=> '检索IP地址',

	'MARKED_NOTES_DELETED'		=> '成功删除所有选中的用户消息',

	'MCP_ADD'						=> '发出一个警告',

	'MCP_BAN'					=> '封禁操作',
	'MCP_BAN_EMAILS'			=> '封禁Email地址',
	'MCP_BAN_IPS'				=> '封禁IP地址',
	'MCP_BAN_USERNAMES'			=> '封禁用户名',

	'MCP_LOGS'						=> '版主活动记录',
	'MCP_LOGS_FRONT'				=> '首页',
	'MCP_LOGS_FORUM_VIEW'			=> '版面相关记录',
	'MCP_LOGS_TOPIC_VIEW'			=> '主题相关记录',

	'MCP_MAIN'						=> '主要信息',
	'MCP_MAIN_FORUM_VIEW'			=> '查看版面',
	'MCP_MAIN_FRONT'				=> '首页',
	'MCP_MAIN_POST_DETAILS'			=> '帖子详细内容',
	'MCP_MAIN_TOPIC_VIEW'			=> '查看主题',
	'MCP_MAKE_ANNOUNCEMENT'			=> '改变为 “公告”',
	'MCP_MAKE_ANNOUNCEMENT_CONFIRM'	=> '您确定要将这个主题改变为 “公告”吗？',
	'MCP_MAKE_ANNOUNCEMENTS'		=> '改变为 “公告”',
	'MCP_MAKE_ANNOUNCEMENTS_CONFIRM'=> '您确定要将这些主题改变为 “公告” 吗？',
	'MCP_MAKE_GLOBAL'				=> '改变为 “全局公告”',
	'MCP_MAKE_GLOBAL_CONFIRM'		=> '您确定要将这个主题改变为 “全局公告” 吗？',
	'MCP_MAKE_GLOBALS'				=> '改变为 “全局公告”',
	'MCP_MAKE_GLOBALS_CONFIRM'		=> '您确定要将这些主题改变为 “全局公告” 吗？',
	'MCP_MAKE_STICKY'				=> '改变为 “置顶”',
	'MCP_MAKE_STICKY_CONFIRM'		=> '您确定要将这个主题改变为 “置顶” 吗？',
	'MCP_MAKE_STICKIES'				=> '改变为 “置顶”',
	'MCP_MAKE_STICKIES_CONFIRM'		=> '您确定要将这些主题改变为 “置顶” 吗？',
	'MCP_MAKE_NORMAL'				=> '改变为 “普通主题”',
	'MCP_MAKE_NORMAL_CONFIRM'		=> '您确定要将这个主题改变为 “普通主题” 吗？',
	'MCP_MAKE_NORMALS'				=> '改变为 “普通主题”',
	'MCP_MAKE_NORMALS_CONFIRM'		=> '您确定要将这些主题改变为 “普通主题” 吗？',

	'MCP_NOTES'						=> '用户消息',
	'MCP_NOTES_FRONT'				=> '首页',
	'MCP_NOTES_USER'				=> '用户详细资料',

	'MCP_POST_REPORTS'				=> '有关这个帖子的举报',
	
	'MCP_PM_REPORTS'				=> '短信举报',
	'MCP_PM_REPORT_DETAILS'			=> '举报明细',
	'MCP_PM_REPORTS_CLOSED'			=> '已处理举报',
	'MCP_PM_REPORTS_CLOSED_EXPLAIN'	=> '这是已经处理过的短信举报列表.',
	'MCP_PM_REPORTS_OPEN'			=> '未处理举报',
	'MCP_PM_REPORTS_OPEN_EXPLAIN'	=> '这是等待处理的短信举报列表.',

	'MCP_REPORTS'					=> '查看举报',
	'MCP_REPORT_DETAILS'			=> '举报详细内容',
	'MCP_REPORTS_CLOSED'			=> '已经审查的举报',
	'MCP_REPORTS_CLOSED_EXPLAIN'	=> '这是已经处理过的帖子举报列表',
	'MCP_REPORTS_OPEN'				=> '等待审查的举报',
	'MCP_REPORTS_OPEN_EXPLAIN'		=> '这是等待处理的帖子举报列表',

	'MCP_QUEUE'								=> '审核队列',
	'MCP_QUEUE_APPROVE_DETAILS'				=> '批复说明',
	'MCP_QUEUE_UNAPPROVED_POSTS'			=> '等待批准发布的帖子',
	'MCP_QUEUE_UNAPPROVED_POSTS_EXPLAIN'	=> '这是需要批准后才对用户可见的帖子列表',
	'MCP_QUEUE_UNAPPROVED_TOPICS'			=> '等待批准发布的主题',
	'MCP_QUEUE_UNAPPROVED_TOPICS_EXPLAIN'	=> '这是需要批准后才对用户可见的主题列表',
	'MCP_QUEUE_DELETED_POSTS'				=> '删除的帖子',
	'MCP_QUEUE_DELETED_POSTS_EXPLAIN'		=> '这是一个列有所有已删除帖子的列表，您可以在这里恢复或者永久删除它们。',
	'MCP_QUEUE_DELETED_TOPICS'				=> '删除的主题',
	'MCP_QUEUE_DELETED_TOPICS_EXPLAIN'		=> '这是一个列有所有已删除主题的列表，您可以在这里恢复或者永久删除它们。',

	'MCP_VIEW_USER'			=> '查看特定用户的警告',

	'MCP_WARN'				=> '警告操作',
	'MCP_WARN_FRONT'		=> '首页',
	'MCP_WARN_LIST'			=> '警告列表',
	'MCP_WARN_POST'			=> '警告此贴',
	'MCP_WARN_USER'			=> '警告用户',

	'MERGE_POSTS_CONFIRM'	=> '您确定您想要移动已选中的帖子吗？',
	'MERGE_TOPIC_EXPLAIN'	=> '使用下面的表单您可以将选中的帖子移动到另一个主题中。这些帖子将从这个主题分离然后合并到另一个主题。这些帖子不会被记录，就像用户将其发表在一个新主题中一样。<br />请输入目标主题ID或者点击 "选择主题" 来找一个。',
	'MERGE_TOPIC_ID'		=> '目标主题ID号',
	'MERGE_TOPICS'			=> '合并主题',
	'MERGE_TOPICS_CONFIRM'	=> '您确认要合并选中的主题吗？',
	'MODERATE_FORUM'		=> '管理版面',
	'MODERATE_TOPIC'		=> '管理主题',
	'MODERATE_POST'			=> '管理帖子',
	'MOD_OPTIONS'			=> '版主选项',
	'MORE_INFO'				=> '更多信息',
	'MOST_WARNINGS'			=> '被警告次数最多的用户',
	'MOVE_TOPIC_CONFIRM'	=> '您确认将主题移动到新版面吗？',
	'MOVE_TOPICS'			=> '移动选中的主题',
	'MOVE_TOPICS_CONFIRM'	=> '您确认将这些主题移动到新版面吗？',

	'NOTIFY_POSTER_APPROVAL'		=> '通知作者关于通过批准的信息吗？',
	'NOTIFY_POSTER_DISAPPROVAL'		=> '通知作者关于未通过批准的信息吗？',
	'NOTIFY_USER_WARN'				=> '通知用户关于警告的信息吗？',
	'NOT_MODERATOR'					=> '您不是这个版面的版主',
	'NO_DESTINATION_FORUM'			=> '请选择一个版面作为目标',
	'NO_DESTINATION_FORUM_FOUND'	=> '没有可用的目标版面.',
	'NO_ENTRIES'					=> '没有记录',
	'NO_FEEDBACK'					=> '没有这个用户的反馈',
	'NO_FINAL_TOPIC_SELECTED'		=> '您必须选中一个主题作为合并帖子的目标',
	'NO_MATCHES_FOUND'				=> '没有找到匹配的结果',
	'NO_POST'						=> '您必须选中一个帖子作为警告用户的根据',
	'NO_POST_REPORT'				=> '这个帖子没有被举报.',
	'NO_POST_SELECTED'				=> '您必须选中一个或更多的帖子来完成这项操作',
	'NO_POSTS_DELETED'				=> '没有删除的帖子。',
	'NO_POSTS_QUEUE'				=> '没有等待批准的帖子。',
	'NO_REASON_DISAPPROVAL'			=> '请输入一个合理的陈述作为不予批准的理由',
	'NO_REPORT'						=> '没有找到举报',
	'NO_REPORTS'					=> '没有找到举报',	
	'NO_REPORT_SELECTED'			=> '您必须选择至少一个举报来完成这个操作.',
	'NO_TOPIC_ICON'					=> '空',
	'NO_TOPIC_SELECTED'				=> '您必须选择至少一个主题来完成这个操作',
	'NO_TOPICS_DELETED'				=> '没有删除的主题。',
	'NO_TOPICS_QUEUE'				=> '没有需要批准的主题',

	'ONLY_TOPIC'			=> '只有主题  “%s”',
	'OTHER_USERS'			=> '用户从这个IP地址发表帖子',

	'QUICKMOD_ACTION_NOT_ALLOWED' => "%s 不允许作为快速模式",


	'PM_REPORT_CLOSED_SUCCESS'	=> '举报被成功关闭.',
	'PM_REPORT_DELETED_SUCCESS'	=> '举报被成功删除.',
	'PM_REPORTED_SUCCESS'		=> '站内短信举报发送成功.',
	'PM_REPORTS_CLOSED_SUCCESS'	=> '所选私信报告已成功关闭。',
	'PM_REPORTS_DELETED_SUCCESS'=> '所选私信报告已成功删除。',
	'PM_REPORTS_TOTAL'			=> array(
		0	=> '没有要检查的私信报告。',
		1	=> '总共有<strong>1</strong>个私信报告要检查。',
		2	=> '总共有<strong>%d</strong>个私信报告要检查。',
	),
	'PM_REPORT_DETAILS'			=> '短信举报明细',
	'POSTER'					=> '作者',
	'POSTS_APPROVED_SUCCESS'	=> '成功地批准了这些帖子发布',
	'POSTS_DELETED_SUCCESS'		=> '成功地删除了这些帖子',
	'POSTS_DISAPPROVED_SUCCESS'	=> '成功地禁止了这些帖子发布',
	'POSTS_LOCKED_SUCCESS'		=> '成功地锁定了这些帖子',
	'POSTS_MERGED_SUCCESS'		=> '成功地合并了这些帖子',
	'POSTS_PER_PAGE'			=> '每页文章数',
	'POSTS_PER_PAGE_EXPLAIN'	=> '(设成 0 查看所有帖子)',
	'POSTS_RESTORED_SUCCESS'	=> '所选帖子已成功恢复。',
	'POSTS_UNLOCKED_SUCCESS'	=> '所选帖子已成功解锁。',
	'POST_APPROVED_SUCCESS'		=> '成功批准此贴发布',
	'POST_DELETED_SUCCESS'		=> '成功删除此贴',
	'POST_DISAPPROVED_SUCCESS'	=> '成功禁止此贴发布',
	'POST_LOCKED_SUCCESS'		=> '成功锁定此贴',
	'POST_NOT_EXIST'			=> '您请求的帖子不存在',
	'POST_REPORTED_SUCCESS'		=> '成功举报此贴',
	'POST_RESTORED_SUCCESS'		=> '此贴已成功恢复。',
	'POST_UNLOCKED_SUCCESS'		=> '成功解除此贴锁定',

	'READ_USERNOTES'			=> '用户消息',
	'READ_WARNINGS'				=> '用户警告',
	'REPORTER'					=> '举报人',
	'REPORTED'					=> '举报',
	'REPORTED_BY'				=> '举报自',
	'REPORTED_ON_DATE'			=> '于',
	'REPORTS_CLOSED_SUCCESS'	=> '选中的这些举报已被成功关闭。',
	'REPORTS_DELETED_SUCCESS'	=> '选中的这些举报已被成功删除。',
	'REPORTS_TOTAL'				=> array(
		0	=> '没有报告要检查。',
		1	=> '总共有<strong>1</strong>个报告要检查。',
		2	=> '总共有<strong>%d</strong>个报告要检查。',
	),
	'REPORT_CLOSED'				=> '这个举报已经关闭.',
	'REPORT_CLOSED_SUCCESS'		=> '选中的这条举报已被成功关闭。',
	'REPORT_DELETED_SUCCESS'	=> '选中的这条举报已被成功删除。',
	'REPORT_DETAILS'			=> '举报细节',
	'REPORT_MESSAGE'			=> '举报这些内容',
	'REPORT_MESSAGE_EXPLAIN'	=> '使用这个表单来向论坛管理员举报选中的内容. 举报一般用于违反版面规则的情况. <strong>注意： 举报短信将使内容对于版主和管理员可见</strong>',
	'REPORT_NOTIFY'				=> '通知您',
	'REPORT_NOTIFY_EXPLAIN'		=> '通知您当您的举报有关',
	'REPORT_POST_EXPLAIN'		=> '使用这个表单来向版主和论坛管理员举报选中的帖子. 举报一般用于违反版面规则的情况.',
	'REPORT_REASON'				=> '举报理由',
	'REPORT_TIME'				=> '举报时间',
	'RESTORE'					=> '恢复',
	'RESTORE_POST'				=> '恢复帖子',
	'RESTORE_POST_CONFIRM'		=> '您确定要恢复此贴吗？',
	'RESTORE_POSTS'				=> '恢复帖子',
	'RESTORE_POSTS_CONFIRM'		=> '您确定要恢复所选贴子吗？',
	'RESTORE_TOPIC'				=> '恢复主题',
	'RESTORE_TOPIC_CONFIRM'		=> '您确定要恢复此主题吗？',
	'RESTORE_TOPICS'			=> '恢复主题',
	'RESTORE_TOPICS_CONFIRM'	=> '您确定要恢复所选主题吗？',
	'RESYNC'					=> '重新同步',
	'RETURN_MESSAGE'			=> '%s返回至短消息%s',
	'RETURN_NEW_FORUM'			=> '%s前往新版面%s',
	'RETURN_NEW_TOPIC'			=> '%s前往新帖子%s',
	'RETURN_PM'					=> '%s返回短信%s',
	'RETURN_POST'				=> '%s返回帖子%s',
	'RETURN_QUEUE'				=> '%s返回队列%s',
	'RETURN_REPORTS'			=> '%s返回举报%s',
	'RETURN_TOPIC_SIMPLE'		=> '%s返回主题%s',

	'SEARCH_POSTS_BY_USER'				=> '按作者搜索帖子',
	'SELECT_ACTION'						=> '选择操作',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENT'	=> '请选择您希望显示全局公告的版面.',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENTS'	=> '一个或多个选中的主题是全局公告. 请选择您希望这些公告出现的版面.',
	'SELECT_MERGE'						=> '选择合并',
	'SELECT_TOPICS_FROM'				=> '选择主题来自',
	'SELECT_TOPIC'						=> '选择主题',
	'SELECT_USER'						=> '选择用户',
	'SORT_ACTION'						=> '日志操作',
	'SORT_DATE'							=> '日期',
	'SORT_IP'							=> 'IP 地址',
	'SORT_WARNINGS'						=> '警告',
	'SPLIT_AFTER'						=> '分割未选中的帖子',
	'SPLIT_FORUM'						=> '新主题的版面',
	'SPLIT_POSTS'						=> '分割选中的帖子',
	'SPLIT_SUBJECT'						=> '新主题',
	'SPLIT_TOPIC_ALL'					=> '分割未选中的帖子为新主题',
	'SPLIT_TOPIC_ALL_CONFIRM'			=> '您确认分割这个主题吗？',
	'SPLIT_TOPIC_BEYOND'				=> '分割选中的帖子为新主题',
	'SPLIT_TOPIC_BEYOND_CONFIRM'		=> '您确认要分割这个主题吗？',
	'SPLIT_TOPIC_EXPLAIN'				=> '使用下面的表单您可以将一个主题分割为两个, 可以分割选中帖子也可以分割未选中的帖子',

	'THIS_PM_IP'				=> '这个站內短信的IP地址',
	'THIS_POST_IP'				=> '这篇帖子的IP地址',
	'TOPICS_APPROVED_SUCCESS'	=> '成功地批准了这些主题发布',
	'TOPICS_DELETED_SUCCESS'	=> '成功地删除了这些主题',
	'TOPICS_DISAPPROVED_SUCCESS'=> '成功地禁止了这些主题发布',
	'TOPICS_FORKED_SUCCESS'		=> '成功地复制了这些主题',
	'TOPICS_LOCKED_SUCCESS'		=> '成功地锁定了这些主题',
	'TOPICS_MOVED_SUCCESS'		=> '成功地转移了这些主题',
	'TOPICS_RESTORED_SUCCESS'	=> '所选主题已成功恢复。',
	'TOPICS_RESYNC_SUCCESS'		=> '成功地重新同步了这些主题',
	'TOPICS_TYPE_CHANGED'		=> '成功地改变了主题类型',
	'TOPICS_UNLOCKED_SUCCESS'	=> '成功地解除了这些主题的锁定',
	'TOPIC_APPROVED_SUCCESS'	=> '成功批准此主题发布',
	'TOPIC_DELETED_SUCCESS'		=> '成功删除此主题',
	'TOPIC_DISAPPROVED_SUCCESS'	=> '成功禁止此主题发布',
	'TOPIC_FORKED_SUCCESS'		=> '成功复制此主题',
	'TOPIC_LOCKED_SUCCESS'		=> '成功锁定此主题',
	'TOPIC_MOVED_SUCCESS'		=> '成功转移此主题',
	'TOPIC_NOT_EXIST'			=> '您选择的主题不存在',
	'TOPIC_RESTORED_SUCCESS'	=> '所选主题已被成功恢复。',
	'TOPIC_RESYNC_SUCCESS'		=> '成功重新同步此主题',
	'TOPIC_SPLIT_SUCCESS'		=> '成功分割此主题',
	'TOPIC_TIME'				=> '发表时间',
	'TOPIC_TYPE_CHANGED'		=> '成功改变此主题类型',
	'TOPIC_UNLOCKED_SUCCESS'	=> '成功解除此主题锁定',
	'TOTAL_WARNINGS'			=> '全部警告',

	'UNAPPROVED_POSTS_TOTAL'		=> array(
		0	=> '没有等待批准的帖子。',
		1	=> '总共有<strong>1</strong>个帖子等待批准。',
		2	=> '总共有<strong>%d</strong>个帖子等待批准。',
	),
	'UNLOCK'						=> '解锁',
	'UNLOCK_POST'					=> '解锁帖子',
	'UNLOCK_POST_EXPLAIN'			=> '允许编辑',
	'UNLOCK_POST_POST'				=> '解锁此贴',
	'UNLOCK_POST_POST_CONFIRM'		=> '您确定要允许对此贴的编辑操作吗？',
	'UNLOCK_POST_POSTS'				=> '解锁这些帖子',
	'UNLOCK_POST_POSTS_CONFIRM'		=> '您确定要允许对这些帖子的编辑操作吗？',
	'UNLOCK_TOPIC'					=> '解锁此主题',
	'UNLOCK_TOPIC_CONFIRM'			=> '您确定要解除对这个主题的锁定吗？',
	'UNLOCK_TOPICS'					=> '解锁这些主题',
	'UNLOCK_TOPICS_CONFIRM'			=> '您确定要解除对这些主题的锁定吗？',
	'USER_CANNOT_POST'				=> '您不能在这个版面发贴',
	'USER_CANNOT_REPORT'			=> '您不能在这个版面举报帖子',
	'USER_FEEDBACK_ADDED'			=> '成功添加用户反馈.',
	'USER_WARNING_ADDED'			=> '成功地发出了用户警告。',

	'VIEW_DETAILS'			=> '查看详情',
	'VIEW_PM'				=> '查看短信',
	'VIEW_POST'            => '查看帖子',

	'WARNED_USERS'			=> '被警告的用户',
	'WARNED_USERS_EXPLAIN'	=> '警告未到期的用户列表',
	'WARNING_PM_BODY'		=> '以下是这个论坛的管理员或版主对您的警告[quote]%s[/quote]',
	'WARNING_PM_SUBJECT'	=> '论坛警告标题',
	'WARNING_POST_DEFAULT'	=> '这个警告是由于以下您发表的帖子： %s .',
	'NO_WARNINGS'	=> '没有警告存在。',

	'YOU_SELECTED_TOPIC'	=> '您选择了主题编号 %d: %s',

	'report_reasons'		=> array(
		'TITLE'	=> array(
			'WAREZ'		=> '非法链接',
			'SPAM'		=> '垃圾广告',
			'OFF_TOPIC'	=> '跑题内容',
			'OTHER'		=> '其它'
		),
		'DESCRIPTION' => array(
			'WAREZ'		=> '此贴包含了非法或流氓软件的链接',
			'SPAM'		=> '此贴的唯一目的是为其它网站或软件做广告',
			'OFF_TOPIC'	=> '此帖跑题了',
			'OTHER'		=> '举报原因没有适用的条目，请填写更多信息'
		),
	),
));