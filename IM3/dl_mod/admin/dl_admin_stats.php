<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_admin_stats.php 5 2009/06/03 OXPUS
* @copyright		(c) 2005 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* Connect to phpBB
*/
if ( !defined('IN_PHPBB') )
{
	exit;
}

$sorting = (!$sorting) ? 'username' : $sorting;
$sql_order_dir = ($sort_order === '') ? 'ASC' : $sort_order;

if ($delete && (isset($_GET['del_id']) || isset($_POST['del_id'])))
{
	$del_id = (isset($_GET['del_id'])) ? $_GET['del_id'] : $_POST['del_id'];

	if ($del_id == -1)
	{
		$sql = 'DELETE FROM ' . DL_STATS_TABLE . '
			WHERE user_id <= ' . ANONYMOUS;
		$db->sql_query($sql);

		add_log('admin', 'DL_LOG_STATS_ANONYM');
	}
	else
	{
		$dl_id = array();
		for ($i = 0; $i < sizeof($del_id); $i++)
		{
			$dl_id[] = intval($del_id[$i]);
		}

		$sql = 'DELETE FROM ' . DL_STATS_TABLE . '
			WHERE ' . $db->sql_in_set('dl_id', $dl_id);
		$db->sql_query($sql);

		add_log('admin', 'DL_LOG_STATS_SOME');
	}
}

switch($sorting)
{
	case 'cat':
		$sql_order_by = 'cat_name ' . $sql_order_dir . ', time_stamp DESC';
		break;

	case 'id':
		$sql_order_by = 'description ' . $sql_order_dir . ', time_stamp DESC';
		break;

	case 'size':
		$sql_order_by = 'traffic ' . $sql_order_dir . ', time_stamp DESC';
		break;

	case 'ip':
		$sql_order_by = 'user_ip ' . $sql_order_dir . ', time_stamp DESC';
		break;

	case 'agent':
		$sql_order_by = 'browser ' . $sql_order_dir . ', time_stamp DESC';
		break;

	case 'time':
		$sql_order_by = 'time_stamp ' . $sql_order_dir;
		break;

	default:
		$sql_order_by = 'username ' . $sql_order_dir . ', time_stamp DESC';
}

$s_sort_order = '<select name="sorting">';
$s_sort_order .= '<option value="username">' . $user->lang['USERNAME'] . '</option>';
$s_sort_order .= '<option value="id">' . $user->lang['DOWNLOADS'] . '</option>';
$s_sort_order .= '<option value="cat">' . $user->lang['DL_CAT_NAME'] . '</option>';
$s_sort_order .= '<option value="size">' . $user->lang['TRAFFIC'] . '</option>';
$s_sort_order .= '<option value="ip">' . $user->lang['DL_IP'] . '</option>';
$s_sort_order .= '<option value="agent">' . $user->lang['DL_BROWSER'] . '</option>';
$s_sort_order .= '<option value="time">' . $user->lang['TIME'] . '</option>';
$s_sort_order .= '</select>';
$s_sort_order = str_replace('value="'.$sorting.'">', 'value="'.$sorting.'" selected="selected">', $s_sort_order);

$s_sort_dir = '<select name="sort_order">';
$s_sort_dir .= '<option value="ASC">' . $user->lang['ASCENDING'] . '</option>';
$s_sort_dir .= '<option value="DESC">' . $user->lang['DESCENDING'] . '</option>';
$s_sort_dir .= '</select>';
$s_sort_dir = str_replace('value="'.$sort_order.'">', 'value="'.$sort_order.'" selected="selected">', $s_sort_dir);

switch($filtering)
{
	case 'cat':
		$filter_by = 'd.cat_name';
		break;

	case 'id':
		$filter_by = 'd.description';
		break;

	case 'agent':
		$filter_by = 's.browser';
		break;

	case 'username':
		$filter_by = 's.username';
		break;

	default:
		$filter_by = '';
}

$sql_where = '';

if ($filter_by && $filter_string)
{
	$filter_string = ($filter_string) ? str_replace("*", "%", $filter_string) : '%';

	if ($filter_string != '%')
	{
		$sql_where = $filter_by . ' ' . $db->sql_like_expression($filter_string) . ' ';
	}
}

$s_filter = '<select name="filtering">';
$s_filter .= '<option value="-1">' . $user->lang['DL_NO_FILTER'] . '</option>';
$s_filter .= '<option value="username">' . $user->lang['USERNAME'] . '</option>';
$s_filter .= '<option value="id">' . $user->lang['DOWNLOADS'] . '</option>';
$s_filter .= '<option value="cat">' . $user->lang['DL_CAT_NAME'] . '</option>';
$s_filter .= '<option value="agent">' . $user->lang['DL_BROWSER'] . '</option>';
$s_filter .= '</select>';
$s_filter = str_replace('value="' . $filtering . '">', 'value="' . $filtering . '" selected="selected">', $s_filter);

$template->set_filenames(array(
	'stats' => 'dl_mod/dl_stats_admin_body.html')
);

if (!$show_guests)
{
	$sql_where .= (($sql_where != '') ? ' AND ' : '') . 's.user_id > ' . ANONYMOUS;
}

$sql_array = array(
	'SELECT'	=> 's.*, d.description, c.cat_name',

	'FROM'		=> array(DL_STATS_TABLE => 's'));

$sql_array['LEFT_JOIN'] = array();
$sql_array['LEFT_JOIN'][] = array(
	'FROM'		=> array(DL_CAT_TABLE => 'c'),
	'ON'		=> 'c.id = s.cat_id');
$sql_array['LEFT_JOIN'][] = array(
	'FROM'		=> array(DOWNLOADS_TABLE => 'd'),
	'ON'		=> 'd.id = s.id');

$sql_array['WHERE'] = $sql_where;

$sql = $db->sql_build_query('SELECT', $sql_array);

$result = $db->sql_query($sql);
$total_data = $db->sql_affectedrows($result);
$db->sql_freeresult($result);

if ($total_data)
{
	$sql_array['ORDER_BY'] = $sql_order_by;

	if ($start >= $total_data && $start >= $dl_config['dl_links_per_page'])
	{
		$start -= $dl_config['dl_links_per_page'];
	}

	if ($total_data > $dl_config['dl_links_per_page'])
	{
		$pagination = generate_pagination("{$basic_link}&amp;sorting=$sorting&amp;sort_order=$sort_order&amp;show_guests=$show_guests", $total_data, $dl_config['dl_links_per_page'], $start, true);
	}
	else
	{
		$pagination = '';
	}

	$sql = $db->sql_build_query('SELECT', $sql_array);

	$result = $db->sql_query_limit($sql, $dl_config['dl_links_per_page'], $start);

	$i = 0;
	while ($row = $db->sql_fetchrow($result))
	{
		switch ($row['direction'])
		{
			case 1:
				$direction = $user->lang['DL_UPLOAD_FILE'];
			break;

			case 2:
				$direction = $user->lang['DL_STAT_EDIT'];
			break;

			default:
				$direction = $user->lang['DL_DOWNLOAD'];
		}

		$template->assign_block_vars('dl_stat_row', array(
			'CAT_NAME'		=> $row['cat_name'],
			'DESCRIPTION'	=> $row['description'],
			'USERNAME'		=> ($row['user_id'] <= ANONYMOUS) ? $user->lang['GUEST'] : '<a href="'.append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile&amp;u=".$row['user_id']).'">'.$row['username'].'</a>',
			'TRAFFIC'		=> ($row['traffic'] == -1) ? $user->lang['DL_EXTERN'] : $dl_mod->dl_size($row['traffic']),
			'DIRECTION'		=> $direction,
			'USER_IP'		=> $row['user_ip'],
			'BROWSER'		=> $row['browser'],
			'TIME_STAMP'	=> $user->format_date($row['time_stamp']),
			'ID'			=> $row['dl_id'],

			'U_CAT_LINK'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?cat=".$row['cat_id']),
			'U_DL_LINK'		=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=".$row['id']))
		);
		$i++;
	}
	$db->sql_freeresult($result);

	$template->assign_var('S_FILLED_FOOTER', true);
}
else
{
	$template->assign_var('S_NO_DL_STAT_ROW', true);
	$pagination = '';
}

$template->assign_vars(array(
	'L_DL_STATS'		=> $user->lang['DL_STATS'],
	'L_USERNAME'		=> $user->lang['USERNAME'],
	'L_CAT_NAME'		=> $user->lang['DL_CAT_NAME'],
	'L_DL_FILE_NAME'	=> $user->lang['DOWNLOADS'],
	'L_TRAFFIC'			=> $user->lang['TRAFFIC'],
	'L_DL_DIRECTION'	=> $user->lang['DL_DIRECTION'],
	'L_USER_IP'			=> $user->lang['DL_IP'],
	'L_BROWSER'			=> $user->lang['DL_BROWSER'],
	'L_TIME_STAMP'		=> $user->lang['TIME'],
	'L_SORT_BY'			=> $user->lang['SORT_BY'],
	'L_MARK_ALL'		=> $user->lang['MARK_ALL'], 
	'L_UNMARK_ALL'		=> $user->lang['UNMARK_ALL'], 
	'L_DELETE'			=> $user->lang['DELETE'], 
	'L_SORT'			=> $user->lang['DL_ORDER'], 
	'L_SHOW_GUESTS'		=> $user->lang['DL_GUEST_STATS_ADMIN'], 
	'L_GUESTS_DELETE'	=> $user->lang['DL_GUEST_STAT_DELETE'],
	'L_TOTAL_DATA'		=> $user->lang['DL_TOTAL_ENTRIES'],
	'L_FILTER'			=> $user->lang['DL_FILTER'],
	'L_FILTER_STRING'	=> $user->lang['DL_FILTER_STRING'],
	'L_NO_STAT'			=> $user->lang['DL_NO_LAST_TIME'],

	'ICON_DL_DELETE'	=> $phpbb_admin_path . 'images/icon_delete.gif" alt="' . $user->lang['DELETE'] . '" title="' . $user->lang['DELETE'] . '"',

	'PAGINATION'		=> $pagination,
	'TOTAL_DATA'		=> $total_data,
	'FILTER_STRING'		=> $filter_string,

	'S_FILTER'			=> $s_filter,
	'S_SHOW_GUESTS'		=> ($show_guests) ? 'checked="checked"' : '',
	'S_FORM_ACTION'		=> $basic_link,
	'S_SORT_ORDER'		=> $s_sort_order,
	'S_SORT_DIR'		=> $s_sort_dir)
);

$template->assign_var('S_DL_STATS', true);

$template->assign_display('stats');

?>