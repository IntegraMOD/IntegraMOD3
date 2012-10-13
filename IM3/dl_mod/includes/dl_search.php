<?php
/** 
*
* @mod package		Download Mod 6
* @file				dl_search.php 4 2009/06/04 OXPUS
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

$user->add_lang('search');

/*
* define initial search vars
*/
$search_keywords	= request_var('search_keywords', '');
$search_cat			= request_var('search_cat', -1);
$sort_dir			= request_var('sort_dir', 'ASC');
$search_in_fields	= request_var('search_fields', 'all');
$search_author		= request_var('search_author', '');

$search_fnames		= array($user->lang['DL_ALL'], $user->lang['DL_FILE_NAME'], $user->lang['DL_FILE_DESCRIPTION'], $user->lang['DL_DETAIL']);
$search_fields		= array('all', 'file_name', 'description', 'long_desc');

/*
* search for keywords if entered
*/
if ($search_keywords != '' && !$search_author)
{
	$template->set_filenames(array(
		'body' => 'dl_mod/dl_search_results.html')
	);

	$search_keywords = strtolower($search_keywords);
	$search_keywords = str_replace('sql', '', trim($search_keywords));
	$search_keywords = str_replace('union', '', $search_keywords);
	$search_keywords = str_replace('  ', ' ', $search_keywords);
	$search_keywords = str_replace(array(' ', '*', '?', '%'), $db->any_char, $search_keywords);

	$access_cats		= array();
	$access_cats		= $dl_mod->full_index(0, 0, 0, 1);
	$sql_access_cats	= ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND cat IN ('.implode(',', $access_cats).') ';
	$sql_access_dls		= ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND d.cat IN ('.implode(',', $access_cats).') ';

	$sql_cat			= ($search_cat == -1) ? '' : ' AND cat = ' . $search_cat;
	$sql_cat_count		= ($search_cat == -1) ? '' : ' AND cat = ' . $search_cat;

	switch($search_in_fields)
	{
		case 'all':
			$sql_where = ' AND (lower(d.file_name) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . '
					OR lower(d.description) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . '
					OR lower(d.long_desc) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . ')';
			$sql_where_count = ' AND (lower(file_name) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . '
					OR lower(description) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . '
					OR lower(long_desc) ' . $db->sql_like_expression($db->any_char . $search_keywords . $db->any_char) . ')';
			break;
		case 'file_name':
		case 'description':
		case 'long_desc':
			$sql_where = " AND lower(d.$search_in_fields) " . $db->sql_like_expression($db->any_char.$search_keywords . $db->any_char);
			$sql_where_count = " AND lower($search_in_fields) " . $db->sql_like_expression($db->any_char.$search_keywords . $db->any_char);
			break;
		default:
			trigger_error($user->lang['DL_NO_PERMISSION']);
	}

	$sql = 'SELECT id FROM ' . DOWNLOADS_TABLE . '
		WHERE approve = ' . true . "
		$sql_access_cats
		$sql_cat_count
		$sql_where_count";
	$result = $db->sql_query($sql);
	$total_found_dl = $db->sql_affectedrows($result);
	$db->sql_freeresult($result);

	if ($total_found_dl > $config['topics_per_page'])
	{
		$pagination = generate_pagination(append_sid("{$phpbb_root_path}downloads.$phpEx?view=search", "search_keywords=$search_keywords&amp;search_cat=$search_cat&amp;sort_dir=$sort_dir"), $total_found_dl, $config['topics_per_page'], $start, true);
	}
	else
	{
		$pagination = '';
	}

	$template->assign_vars(array(
		'L_SEARCH_TITLE'	=> $user->lang['DOWNLOADS'].' '.$user->lang['SEARCH'],
		'L_STATUS'			=> $user->lang['DL_INFO'],
		'L_CATEGORY'		=> $user->lang['DL_CAT_NAME'],
		'L_DESCRIPTION'		=> $user->lang['DL_FILE_DESCRIPTION'],
		'L_FILENAME'		=> $user->lang['DL_FILE_NAME'],
		'L_LONG_DESC'		=> $user->lang['DL_DETAIL'],
		'L_NO_RESULTS'		=> $user->lang['NO_SEARCH_RESULTS'],
		'L_GOTO_PAGE'		=> $user->lang['GOTO_PAGE'],
		'L_NAV1'			=> $user->lang['DL_CAT_TITLE'],
		'L_NAV2'			=> $user->lang['SEARCH'],

		'PAGINATION'		=> $pagination,

		'U_NAV1'			=> append_sid("{$phpbb_root_path}downloads.$phpEx"),
		'U_NAV2'			=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=search"))
	);

	if (!$total_found_dl)
	{
		$template->assign_var('S_NO_RESULTS', true);
	}
	else
	{
		$sql = 'SELECT d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND d.approve = ' . true . "
				$sql_access_dls
				$sql_cat
				$sql_where
			ORDER BY sort $sort_dir";
		$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);

		while ( $row = $db->sql_fetchrow($result) )
		{
			$cat_id			= $row['cat'];
			$file_id		= $row['id'];
			$u_file_link	= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=" . $file_id);

			$dl_status		= array();
			$dl_status		= $dl_mod->dl_status($file_id);

			$status			= $dl_status['status'];
			$file_name		= $dl_status['file_name'];

			if (isset($index[$cat_id]['parent']))
			{
				$mini_icon = $dl_mod->mini_status_file($index[$cat_id]['parent'], $file_id);
			}
			else
			{
				$mini_icon = '';
			}

			$cat_name			= $row['cat_name'];
			$u_cat_link			= append_sid("{$phpbb_root_path}downloads.$phpEx?cat=" . $cat_id);

			$description		= $row['description'];
			$desc_uid			= $row['desc_uid'];
			$desc_bitfield		= $row['desc_bitfield'];
			$desc_flags			= $row['desc_flags'];
			$description		= censor_text($description);
			$description		= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

			$long_desc			= $row['long_desc'];
			$long_desc_uid		= $row['long_desc_uid'];
			$long_desc_bitfield	= $row['long_desc_bitfield'];
			$long_desc_flags	= $row['long_desc_flags'];
			$long_desc			= censor_text($long_desc);
			$long_desc			= generate_text_for_display($long_desc, $long_desc_uid, $long_desc_bitfield, $long_desc_flags);

			$template->assign_block_vars('searchresults', array(
				'STATUS'		=> $status,
				'CAT_NAME'		=> $cat_name,
				'DESCRIPTION'	=> $description,
				'MINI_ICON'		=> $mini_icon,
				'FILE_NAME'		=> $file_name,
				'LONG_DESC'		=> $long_desc,

				'U_CAT_LINK'	=> $u_cat_link,
				'U_FILE_LINK'	=> $u_file_link)
			);
		}
	}
}
else if ($search_author)
{
	$template->set_filenames(array(
		'body' => 'dl_mod/dl_search_results.html')
	);

	$search_author = str_replace('sql', '', $search_author);
	$search_author = str_replace('union', '', $search_author);
	$search_author = str_replace('*', '%', trim($search_author));

	$sql_cat		= ($search_cat == -1) ? '' : ' AND cat = ' . $search_cat;
	$sql_cat_count	= ($search_cat == -1) ? '' : ' AND cat = ' . $search_cat;

	$sql = 'SELECT user_id FROM ' . USERS_TABLE . '
		WHERE username ' . $db->sql_like_expression($db->any_char . $search_author . $db->any_char);
	$result = $db->sql_query($sql);
	$total_users = $db->sql_affectedrows($result);

	if ($total_users)
	{
		$matching_userids = array(0);

		while ($row = $db->sql_fetchrow($result))
		{
			$matching_userids[] = $row['user_id'];
		}

		$db->sql_freeresult($result);
	}
	else
	{
		$db->sql_freeresult($result);
		trigger_error($user->lang['NO_SEARCH_MATCH'], E_USER_ERROR);
	}

	$access_cats		= array();
	$access_cats		= $dl_mod->full_index(0, 0, 0, 1);

	$sql_access_cats	= ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND ' . $db->sql_in_set('cat', $access_cats);
	$sql_access_dls		= ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND ' . $db->sql_in_set('d.cat', $access_cats);

	$sql = 'SELECT id FROM ' . DOWNLOADS_TABLE . '
		WHERE approve = ' . true . '
			AND (' . $db->sql_in_set('add_user', $matching_userids) . ' OR ' . $db->sql_in_set('change_user', $matching_userids) . ")
			$sql_access_cats
			$sql_cat_count";
	$result = $db->sql_query($sql);
	$total_found_dl = $db->sql_affectedrows($result);
	$db->sql_freeresult($result);

	if ($total_found_dl > $config['topics_per_page'])
	{
		$pagination = generate_pagination(append_sid("{$phpbb_root_path}downloads.$phpEx?view=search", "search_author=$search_author&amp;search_cat=$search_cat&amp;sort_dir=$sort_dir"), $total_found_dl, $config['topics_per_page'], $start, true);
	}
	else
	{
		$pagination = '';
	}

	$template->assign_vars(array(
		'L_SEARCH_TITLE'	=> $user->lang['DOWNLOADS'].' '.$user->lang['SEARCH'],
		'L_STATUS'			=> $user->lang['DL_INFO'],
		'L_CATEGORY'		=> $user->lang['DL_CAT_NAME'],
		'L_DESCRIPTION'		=> $user->lang['DL_FILE_DESCRIPTION'],
		'L_FILENAME'		=> $user->lang['DL_FILE_NAME'],
		'L_LONG_DESC'		=> $user->lang['DL_DETAIL'],
		'L_NO_RESULTS'		=> $user->lang['NO_SEARCH_RESULTS'],
		'L_GOTO_PAGE'		=> $user->lang['GOTO_PAGE'],
		'L_NAV1'			=> $user->lang['DL_CAT_TITLE'],
		'L_NAV2'			=> $user->lang['SEARCH'],

		'PAGINATION'		=> $pagination,

		'U_NAV1'			=> append_sid("{$phpbb_root_path}downloads.$phpEx"),
		'U_NAV2'			=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=search"))
	);

	if ($total_found_dl == 0)
	{
		$template->assign_var('S_NO_RESULTS', true);
	}
	else
	{
		$sql = 'SELECT d.*, c.cat_name FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
			WHERE d.cat = c.id
				AND d.approve = ' . true . '
				AND (' . $db->sql_in_set('d.add_user', $matching_userids) . ' OR ' . $db->sql_in_set('d.change_user', $matching_userids) . "
				$sql_access_dls
				$sql_cat
			ORDER BY c.cat_name, d.sort $sort_dir";
		$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);

		while ( $row = $db->sql_fetchrow($result) )
		{
			$cat_id			= $row['cat'];
			$file_id		= $row['id'];
			$u_file_link	= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=" . $file_id);

			$dl_status		= array();
			$dl_status		= $dl_mod->dl_status($file_id);

			$status			= $dl_status['status'];
			$file_name		= $dl_status['file_name'];

			$mini_icon		= (isset($index[$cat_id]['parent'])) ? $dl_mod->mini_status_file($index[$cat_id]['parent'], $file_id) : '';

			$cat_name		= $row['cat_name'];
			$u_cat_link		= append_sid("{$phpbb_root_path}downloads.$phpEx?cat=" . $cat_id);

			$description	= $row['description'];
			$desc_uid		= $row['desc_uid'];
			$desc_bitfield	= $row['desc_bitfield'];
			$desc_flags		= $row['desc_flags'];
			$description	= censor_text($description);
			$description	= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

			$long_desc			= $row['long_desc'];
			$long_desc_uid		= $row['long_desc_uid'];
			$long_desc_bitfield	= $row['long_desc_bitfield'];
			$long_desc_flags	= $row['long_desc_flags'];
			$long_desc			= censor_text($long_desc);
			$long_desc			= generate_text_for_display($long_desc, $long_desc_uid, $long_desc_bitfield, $long_desc_flags);

			$template->assign_block_vars('searchresults', array(
				'STATUS'		=> $status,
				'CAT_NAME'		=> $cat_name,
				'DESCRIPTION'	=> $description,
				'MINI_ICON'		=> $mini_icon,
				'FILE_NAME'		=> $file_name,
				'LONG_DESC'		=> $long_desc,

				'U_CAT_LINK'	=> $u_cat_link,
				'U_FILE_LINK'	=> $u_file_link)
			);
		}
	}
}
else
{
	/*
	* default entry point of download searching
	*/
	$select_categories = '<select name="search_cat"><option value="-1">'.$user->lang['DL_ALL'].'</option>';
	$select_categories .= $dl_mod->dl_dropdown(0, 0, 0, 'auth_view');
	$select_categories .= '</select>';

	$s_sort_dir = '<select name="sort_dir">';
	if($sort_dir == 'ASC')
	{
		$s_sort_dir .= '<option value="ASC" selected="selected">' . $user->lang['ASCENDING'] . '</option><option value="DESC">' . $user->lang['DESCENDING'] . '</option>';
	}
	else
	{
		$s_sort_dir .= '<option value="ASC">' . $user->lang['ASCENDING'] . '</option><option value="DESC" selected="selected">' . $user->lang['DESCENDING'] . '</option>';
	}
	$s_sort_dir .= '</select>';

	$s_search_fields = '<select name="search_fields">';
	for ($i = 0; $i < count($search_fields); $i++)
	{
		$s_search_fields .= '<option value="'.$search_fields[$i].'">'.$search_fnames[$i].'</option>';
	}
	$s_search_fields .= '</select>';

	$template->set_filenames(array(
		'body' => 'dl_mod/dl_search_body.html')
	);

	$template->assign_vars(array(
		'L_SEARCH_QUERY'		=> $user->lang['SEARCH'].' '.$user->lang['DOWNLOADS'],
		'L_SEARCH_OPTIONS'		=> $user->lang['SEARCH_FOR'],
		'L_SEARCH_KEYWORDS'		=> $user->lang['SEARCH_KEYWORDS'],
		'L_CATEGORY'			=> $user->lang['DL_CAT_NAME'],
		'L_OPTIONS'				=> $user->lang['SEARCH_OPTIONS'],
		'L_SORT_BY'				=> $user->lang['SEARCH_WITHIN'],
		'L_SORT_DIR'			=> $user->lang['DL_ORDER'],
		'L_SEARCH'				=> $user->lang['SEARCH'],
		'L_SEARCH_AUTHOR'		=> $user->lang['DL_SEARCH_AUTHOR'],

		'S_DL_SEARCH_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=search"),
		'S_DL_CATEGORY_OPTIONS'	=> $select_categories,
		'S_DL_SORT_ORDER'		=> $s_sort_dir,
		'S_DL_SORT_OPTIONS'		=> $s_search_fields)
	);
}

?>