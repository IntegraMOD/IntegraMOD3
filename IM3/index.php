<?php
/**
*
* @package phpBB3
* @version $Id: index.php 9614 2009-06-18 11:04:54Z nickvergessen $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');
$user->setup('mods/calendar');

//shoutbox
if (!function_exists('as_display'))
{
	include($phpbb_root_path . 'includes/functions_shoutbox.' . $phpEx);
}
as_display();

// minicalendar
// Note this file is included after user->setup(), to ensure that some globals in functions_calendar.php can
// find the $user->lang array
include_once($phpbb_root_path . 'includes/functions_calendar.' . $phpEx);
events_bdays_panel();
// Lets start outputting the calendar table. Note that we don't put any information in the tables yet,
// this will be done using ajax, thus avoiding page refreshes when changing the calendar month on the block
// First, build the header, where the day initials will go.
$calendar_table = '<tr class="cal_block_header">';
for($y = 0 ; $y < 7 ; $y++)
{
    $calendar_table .= '<td id="cal_dname_' . $y . '" class="xrow1" align="center" width="14%"></td>';
}
$calendar_table .= '</tr>';

// Now build the grid of calendar days (7 x 6)
for($y = 1 ; $y <= 6 ; $y++)
{
    $calendar_table .= '<tr id="r' . $y . '">';
/*
    for($x = 1 ; $x <= 7 ; $x++)
    {
        $calendar_table .= '<td class="row1" align="center"><table class="calendar" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td id="cal_' . (($y * 7) -7 + $x) . '" height="15" class="row2"></td></tr></table></td>';
    }
    $calendar_table .= '</tr>';
    */

    for($x = 1 ; $x <= 7 ; $x++)
    {
        $calendar_table .= '<td class="calendar" align="center" id="cal_' . (($y * 7) -7 + $x) . '" height="15"></td>';
    }
    $calendar_table .= '</tr>';

}

$template->assign_vars(array(
    'CALENDAR_TABLE'            => $calendar_table,
	'U_CALENDAR_MAIN'           => append_sid($phpbb_root_path . 'calendar.' . $phpEx . "?mode=main"),
    'HIDDEN_MONTH'              => gmdate('n', time() + $user->timezone + $user->dst),
    'HIDDEN_YEAR'               => gmdate('Y', time() + $user->timezone + $user->dst),
    'S_SGP_AJAX'                => true,
    'S_SHOW_SHOUTBOX'			=> $user->data['user_id'] != ANONYMOUS && (($config['as_on_index'] && $config['as_override_user']) || (!$config['as_override_user'] && $user->data['im_show_shout_index'])) ? true : false,
    'S_SHOW_MINICAL'			=> $user->data['user_id'] != ANONYMOUS && $auth->acl_get('u_allow_index_minical') && (($config['calendar_allow_index_minical'] && $config['calendar_override_user']) || (!$config['calendar_override_user'] && $user->data['im_show_cal_index'])) ? true : false,
));

display_forums('', $config['load_moderators']);

// Stargate Portal
if(STARGATE)
{
	$user->add_lang('portal/portal');
	include_once($phpbb_root_path . 'includes/sgp_functions.'. $phpEx );
	include_once($phpbb_root_path . 'includes/portal_blocks.' . $phpEx);
}
// Stargate Portal

// Set some stats, get posts count from forums data if we... hum... retrieve all forums data
$total_posts	= $config['num_posts'];
$total_topics	= $config['num_topics'];
$total_users	= $config['num_users'];
$total_images	= $config['num_images'];
$user->add_lang('mods/info_acp_gallery');
$l_total_image_s = ($total_images == 0) ? 'TOTAL_IMAGES_ZERO' : 'TOTAL_IMAGES_OTHER';

$l_total_user_s = ($total_users == 0) ? 'TOTAL_USERS_ZERO' : 'TOTAL_USERS_OTHER';
$l_total_post_s = ($total_posts == 0) ? 'TOTAL_POSTS_ZERO' : 'TOTAL_POSTS_OTHER';
$l_total_topic_s = ($total_topics == 0) ? 'TOTAL_TOPICS_ZERO' : 'TOTAL_TOPICS_OTHER';

// Grab group details for legend display
if ($auth->acl_gets('a_group', 'a_groupadd', 'a_groupdel'))
{
	$sql = 'SELECT group_id, group_name, group_colour, group_type
		FROM ' . GROUPS_TABLE . '
		WHERE group_legend = 1
		ORDER BY group_name ASC';
}
else
{
	$sql = 'SELECT g.group_id, g.group_name, g.group_colour, g.group_type
		FROM ' . GROUPS_TABLE . ' g
		LEFT JOIN ' . USER_GROUP_TABLE . ' ug
			ON (
				g.group_id = ug.group_id
				AND ug.user_id = ' . $user->data['user_id'] . '
				AND ug.user_pending = 0
			)
		WHERE g.group_legend = 1
			AND (g.group_type <> ' . GROUP_HIDDEN . ' OR ug.user_id = ' . $user->data['user_id'] . ')
		ORDER BY g.group_name ASC';
}
$result = $db->sql_query($sql);

$legend = array();
while ($row = $db->sql_fetchrow($result))
{
	$colour_text = ($row['group_colour']) ? ' style="color:#' . $row['group_colour'] . '"' : '';
	$group_name = ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name'];

	if ($row['group_name'] == 'BOTS' || ($user->data['user_id'] != ANONYMOUS && !$auth->acl_get('u_viewprofile')))
	{
		$legend[] = '<span' . $colour_text . '>' . $group_name . '</span>';
	}
	else
	{
		$legend[] = '<a' . $colour_text . ' href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=group&amp;g=' . $row['group_id']) . '">' . $group_name . '</a>';
	}
}
$db->sql_freeresult($result);

$legend = implode(', ', $legend);

// Generate birthday list if required ...
$birthday_list = '';
if ($config['load_birthdays'] && $config['allow_birthdays'])
{
	$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
	$sql = 'SELECT u.user_id, u.username, u.user_colour, u.user_birthday
		FROM ' . USERS_TABLE . ' u
		LEFT JOIN ' . BANLIST_TABLE . " b ON (u.user_id = b.ban_userid)
		WHERE (b.ban_id IS NULL
			OR b.ban_exclude = 1)
			AND u.user_birthday LIKE '" . $db->sql_escape(sprintf('%2d-%2d-', $now['mday'], $now['mon'])) . "%'
			AND u.user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$birthday_list .= (($birthday_list != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']);

		if ($age = (int) substr($row['user_birthday'], -4))
		{
			$birthday_list .= ' (' . ($now['year'] - $age) . ')';
		}
	}
	$db->sql_freeresult($result);
}

// Assign index specific vars
//
// Users of the day MOD
//

require($phpbb_root_path . 'includes/uod.' . $phpEx);

//
// End of MOD
//
$template->assign_vars(array(
	'TOTAL_POSTS'	=> sprintf($user->lang[$l_total_post_s], $total_posts),
	'TOTAL_TOPICS'	=> sprintf($user->lang[$l_total_topic_s], $total_topics),
	'TOTAL_USERS'	=> sprintf($user->lang[$l_total_user_s], $total_users),
	'TOTAL_IMAGES'	=> ($config['gallery_total_images']) ? sprintf($user->lang[$l_total_image_s], $total_images) : '',
	'NEWEST_USER'	=> sprintf($user->lang['NEWEST_USER'], get_username_string('full', $config['newest_user_id'], $config['newest_username'], $config['newest_user_colour'])),
	'USERS_OF_THE_DAY_LIST' => $day_userlist,

	'LEGEND'		=> $legend,
	'BIRTHDAY_LIST'	=> $birthday_list,

	'FORUM_IMG'				=> $user->img('forum_read', 'NO_NEW_POSTS'),
	'FORUM_NEW_IMG'			=> $user->img('forum_unread', 'NEW_POSTS'),
	'FORUM_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NO_NEW_POSTS_LOCKED'),
	'FORUM_NEW_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'NO_NEW_POSTS_LOCKED'),

	'S_LOGIN_ACTION'			=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'S_DISPLAY_BIRTHDAY_LIST'	=> ($config['load_birthdays']) ? true : false,

	'U_MARK_FORUMS'		=> ($user->data['is_registered'] || $config['load_anon_lastread']) ? append_sid("{$phpbb_root_path}index.$phpEx", 'hash=' . generate_link_hash('global') . '&amp;mark=forums') : '',
	'U_MCP'				=> ($auth->acl_get('m_') || $auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=main&amp;mode=front', true, $user->session_id) : '')
);


// Output page
page_header($user->lang['INDEX']);

$template->set_filenames(array(
	'body' => 'index_body.html')
);

page_footer();

?>