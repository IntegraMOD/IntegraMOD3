<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_stats.php 2 2009/06/04 OXPUS
* @copyright		(c) 2005 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* connect to phpBB
*/
if ( !defined('IN_PHPBB') )
{
	exit;
}

/*
* check permissions and redirect if missing
*/
$stats_view = $dl_mod->stats_perm();
if (!$stats_view)
{
	redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
}

if (sizeof($index))
{
	$access_cats = array();
	$access_cats = $dl_mod->full_index(0, 0, 0, 1);

	if (sizeof($access_cats))
	{
		/*
		* enable/disable guest data on basic statistics
		*/
		$sql_where = ($dl_config['guest_stats_show'] == 1) ? '' : ' AND u.user_id > ' . ANONYMOUS;

		/*
		* latest downloads
		*/
		$sql = 'SELECT d.*, u.username, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c, ' . USERS_TABLE . ' u
			WHERE d.cat = c.id
				AND d.down_user = u.user_id
				AND ' . $db->sql_in_set('c.id', $access_cats) . "
				$sql_where
			ORDER BY d.last_time DESC";
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];

				$dl_time		= $row['last_time'];
				$dl_time		= $user->format_date($dl_time);

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");
				
				$user_link		= ($row['down_user'] <= 1) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['down_user']);
				$user_name		= ($row['down_user'] <= 1) ? $user->lang['GUEST'] : $row['username'];

				$template->assign_block_vars('top_ten_latest', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_TIME'	=> $dl_time)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* lastest uploads
		*/
		$sql = 'SELECT d.*, u.username, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c, ' . USERS_TABLE . ' u
			WHERE d.cat = c.id
				AND d.add_user = u.user_id
				AND approve = ' . true . '
				AND ' . $db->sql_in_set('c.id', $access_cats) . '
			ORDER BY d.add_time DESC';
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];

				$dl_time		= $row['add_time'];
				$dl_time		= $user->format_date($dl_time);

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");

				$user_link		= ($row['add_user'] <= 1) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['add_user']);
				$user_name		= ($row['add_user'] <= 1) ? $user->lang['GUEST'] : $row['username'];

				$template->assign_block_vars('top_ten_uploads', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_TIME'		=> $dl_time)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten downloads this month
		*/
		$sql = 'SELECT d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND ' . $db->sql_in_set('c.id', $access_cats) . '
			ORDER BY d.klicks DESC';
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];
				$dl_klicks		= $row['klicks'];

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");

				$template->assign_block_vars('top_ten_dl_cur_month', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'DL_KLICKS'		=> $dl_klicks)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten downloads overall
		*/
		$sql = 'SELECT d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND ' . $db->sql_in_set('c.id', $access_cats) . '
			ORDER BY d.overall_klicks DESC';
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];
				$dl_klicks		= $row['overall_klicks'];

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");

				$template->assign_block_vars('top_ten_dl_overall', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'DL_KLICKS'		=> $dl_klicks)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten traffic this month
		*/
		$sql = 'SELECT (d.klicks * d.file_size) AS month_traffic, d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND ' . $db->sql_in_set('c.id', $access_cats) . '
			ORDER BY month_traffic DESC';
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];
				$dl_traffic		= $dl_mod->dl_size($row['month_traffic']);

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");

				$template->assign_block_vars('top_ten_traffic_cur_month', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'DL_TRAFFIC'	=> $dl_traffic,)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten traffic overall
		*/
		$sql = 'SELECT (d.overall_klicks * d.file_size) AS overall_traffic, d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND ' . $db->sql_in_set('c.id', $access_cats) . '
			ORDER BY overall_traffic DESC';
		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			while ($row = $db->sql_fetchrow($result))
			{
				$file_id		= $row['id'];
				$cat_id			= $row['cat'];
				$file_name_name	= $row['file_name'];
				$description	= $row['description'];
				$cat_name		= $row['cat_name'];
				$dl_traffic		= $dl_mod->dl_size($row['overall_traffic']);

				$file_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id");

				$template->assign_block_vars('top_ten_traffic_overall', array(
					'POS'			=> $dl_pos,
					'DESCRIPTION'	=> $description,
					'U_FILE_LINK'	=> $file_link,
					'CAT_NAME'		=> $cat_name,
					'DL_TRAFFIC'	=> $dl_traffic)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* enable/disable guest data on extended statistics
		*/
		$sql_where = ($dl_config['guest_stats_show'] == 1) ? '' : ' AND s.user_id > ' . ANONYMOUS;

		/*
		* top ten download counts
		*/
		unset($sql_array);

		$sql_array = array(
			'SELECT'	=> 'COUNT(s.id) AS dl_counts, s.user_id, s.username',
			'FROM'		=> array(DL_STATS_TABLE => 's'),
			'WHERE'		=> 's.direction = 0 AND ' . $db->sql_in_set('s.cat_id', $access_cats) . ' ' . $sql_where,
			'GROUP_BY'	=> 's.user_id, s.username',
			'ORDER_BY'	=> 'dl_counts DESC');

		$sql = $db->sql_build_query('SELECT', $sql_array);

		$result = $db->sql_query_limit($sql, 10);

		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$user_link = ($row['user_id'] <= ANONYMOUS) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']);
				$user_name = ($row['user_id'] <= ANONYMOUS) ? $user->lang['GUEST'] : $row['username'];

				$template->assign_block_vars('top_ten_dl_counts', array(
					'POS'			=> $dl_pos,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_COUNTS'		=> $row['dl_counts'])
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten download traffic
		*/
		unset($sql_array);

		$sql_array = array(
			'SELECT'	=> 'SUM(s.traffic) AS dl_traffic, s.user_id, s.username',
			'FROM'		=> array(DL_STATS_TABLE => 's'),
			'WHERE'		=> 's.direction = 0 AND ' . $db->sql_in_set('s.cat_id', $access_cats) . ' ' . $sql_where,
			'GROUP_BY'	=> 's.user_id, s.username',
			'ORDER_BY'	=> 'dl_traffic DESC');

		$sql = $db->sql_build_query('SELECT', $sql_array);

		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$user_link	= ($row['user_id'] <= ANONYMOUS) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']);
				$user_name	= ($row['user_id'] <= ANONYMOUS) ? $user->lang['GUEST'] : $row['username'];
				$dl_traffic	= $dl_mod->dl_size($row['dl_traffic']);

				$template->assign_block_vars('top_ten_dl_traffic', array(
					'POS'			=> $dl_pos,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_TRAFFIC'	=> $dl_traffic)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten upload counts
		*/
		unset($sql_array);

		$sql_array = array(
			'SELECT'	=> 'COUNT(s.id) AS dl_counts, s.user_id, s.username',
			'FROM'		=> array(DL_STATS_TABLE => 's'),
			'WHERE'		=> 's.direction = 1 AND ' . $db->sql_in_set('s.cat_id', $access_cats) . ' ' . $sql_where,
			'GROUP_BY'	=> 's.user_id, s.username',
			'ORDER_BY'	=> 'dl_counts DESC');

		$sql = $db->sql_build_query('SELECT', $sql_array);

		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$user_link = ($row['user_id'] <= ANONYMOUS) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']);
				$user_name = ($row['user_id'] <= ANONYMOUS) ? $user->lang['GUEST'] : $row['username'];

				$template->assign_block_vars('top_ten_up_counts', array(
					'POS'			=> $dl_pos,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_COUNTS'		=> $row['dl_counts'])
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}

		/*
		* top ten upload traffic
		*/
		unset($sql_array);

		$sql_array = array(
			'SELECT'	=> 'SUM(s.traffic) AS dl_traffic, s.user_id, s.username',
			'FROM'		=> array(DL_STATS_TABLE => 's'),
			'WHERE'		=> 's.direction = 1 AND ' . $db->sql_in_set('s.cat_id', $access_cats) . ' ' . $sql_where,
			'GROUP_BY'	=> 's.user_id, s.username',
			'ORDER_BY'	=> 'dl_traffic DESC');

		$sql = $db->sql_build_query('SELECT', $sql_array);

		$result = $db->sql_query_limit($sql, 10);
		$total_top_ten = $db->sql_affectedrows($result);

		if ($total_top_ten)
		{
			$dl_pos = 1;

			while ($row = $db->sql_fetchrow($result))
			{
				$user_link	= ($row['user_id'] <= ANONYMOUS) ? '' : append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']);
				$user_name	= ($row['user_id'] <= ANONYMOUS) ? $user->lang['GUEST'] : $row['username'];
				$dl_traffic	= $dl_mod->dl_size($row['dl_traffic']);

				$template->assign_block_vars('top_ten_up_traffic', array(
					'POS'			=> $dl_pos,
					'USER_NAME'		=> $user_name,
					'U_USER_LINK'	=> $user_link,
					'DL_TRAFFIC'	=> $dl_traffic)
				);

				$dl_pos++;
			}
			$db->sql_freeresult($result);
		}
	}
	else
	{
		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}
}
else
{
	redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
}

$template->set_filenames(array(
	'body' => 'dl_mod/dl_stat_body.html')
);

$template->assign_vars(array(
	'L_DL_TODO'						=> $user->lang['DL_STATS'],
	'L_LATEST_DOWNLOADS'			=> $user->lang['DL_LATEST_DOWNLOADS'],
	'L_LATEST_UPLOADS'				=> $user->lang['DL_LATEST_UPLOADS'],
	'L_DOWNLOADS_CUR_MONTH'			=> $user->lang['DL_DOWNLOADS_CUR_MONTH'],
	'L_DOWNLOADS_OVERALL'			=> $user->lang['DL_DOWNLOADS_OVERALL'],
	'L_DOWNLOADS_DOWNLOADS_COUNT'	=> $user->lang['DL_DOWNLOADS_COUNT'],
	'L_DOWNLOADS_DOWNLOADS_TRAFFIC'	=> $user->lang['DL_DOWNLOADS_TRAFFIC'],
	'L_DOWNLOADS_UPLOADS_COUNT'		=> $user->lang['DL_UPLOADS_COUNT'],
	'L_DOWNLOADS_UPLOADS_TRAFFIC'	=> $user->lang['DL_UPLOADS_TRAFFIC'],
	'L_TRAFFIC_CUR_MONTH'			=> $user->lang['DL_TRAFFIC_CUR_MONTH'],
	'L_TRAFFIC_OVERALL'				=> $user->lang['DL_TRAFFIC_OVERALL'],
	'L_POSITION'					=> $user->lang['DL_POS'],
	'L_DOWNLOAD'					=> $user->lang['DL_FILE_DESCRIPTION'],
	'L_DL_TOP'						=> $user->lang['DL_CAT_TITLE'],
	'L_TIME'						=> $user->lang['DL_TIME'],
	'L_USERNAME'					=> $user->lang['USERNAME'],
	'L_DL_TRAFFIC'					=> $user->lang['TRAFFIC'],
	'L_DL_COUNTS'					=> $user->lang['DL_DOWNLOADS_COUNT'],
	'L_UP_COUNTS'					=> $user->lang['DL_UPLOADS_COUNT'],
	'L_TIME'						=> $user->lang['DL_TIME'],
	'L_KLICKS'						=> $user->lang['DL_KLICKS'],
	'L_KLICKS_OVERALL'				=> $user->lang['DL_OVERALL_KLICKS'],

	'U_DL_TOP'						=> append_sid("{$phpbb_root_path}downloads.$phpEx"))
);

?>