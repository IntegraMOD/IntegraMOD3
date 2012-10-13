<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_admin_categories.php 12 2009/09/04 OXPUS
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

if ($cancel)
{
	$action = '';
}
else
{
	$action = ($add) ? 'add' : $action;
	$action = ($edit) ? 'edit' : $action;
	$action = ($move) ? 'category_order' : $action;
	$action = ($save_cat) ? 'save_cat' : $action;
}
$index = array();
$index = $dl_mod->full_index();

if (!sizeof($index) && $action != 'save_cat')
{
	$action = 'add';
}

if ($cat_id)
{
	$sql = 'SELECT cat_name FROM ' . DL_CAT_TABLE . "
		WHERE id = $cat_id";
	$result = $db->sql_query($sql);
	$log_cat_name = $db->sql_fetchfield('cat_name');
	$db->sql_freeresult($result);
}

$dl_template_in_use = false;

if($action == 'edit' || $action == 'add')
{
	$s_hidden_fields = array('action' => 'save_cat');

	if($action == 'edit' && $cat_id)
	{
		$cat_name			= $index[$cat_id]['cat_name'];
		$cat_name			= str_replace('&nbsp;&nbsp;|___&nbsp;', '', $cat_name);
		$description		= $index[$cat_id]['description'];
		$rules				= $index[$cat_id]['rules'];
		$cat_path			= $index[$cat_id]['cat_path'];
		$cat_parent			= '<select name="parent">';
		$cat_parent			.= '<option value="0">&nbsp;&raquo;&nbsp;'.$user->lang['DL_CAT_INDEX'].'</option>';
		$cat_parent			.= $dl_mod->dl_dropdown(0, 0, $index[$cat_id]['parent'], 'auth_view', $cat_id);
		$cat_parent			.= '</select>';
		$desc_uid			= $index[$cat_id]['desc_uid'];
		$rules_uid			= $index[$cat_id]['rules_uid'];
		$desc_bitfield		= $index[$cat_id]['desc_bitfield'];
		$rules_bitfield		= $index[$cat_id]['rules_bitfield'];
		$desc_flags			= $index[$cat_id]['desc_flags'];
		$rules_flags		= $index[$cat_id]['rules_flags'];
		$statistics			= $index[$cat_id]['statistics'];
		$stats_prune		= $index[$cat_id]['stats_prune'];
		$comments			= $index[$cat_id]['comments'];
		$must_approve		= $index[$cat_id]['must_approve'];
		$allow_mod_desc		= $index[$cat_id]['allow_mod_desc'];
		$cat_traffic		= $index[$cat_id]['cat_traffic'];
		$cat_remain_traffic	= $index[$cat_id]['cat_traffic'] - $index[$cat_id]['cat_traffic_use'];
		$allow_thumbs		= $index[$cat_id]['allow_thumbs'];
		$approve_comments	= $index[$cat_id]['approve_comments'];
		$bug_tracker		= $index[$cat_id]['bug_tracker'];
		$topic_forum		= $index[$cat_id]['dl_topic_forum'];
		$topic_text			= $index[$cat_id]['dl_topic_text'];
		$cat_icon			= str_replace(generate_board_url() . '/', '', $index[$cat_id]['cat_icon']);
		$perms_copy_from	= '<select name="perms_copy_from">';
		$perms_copy_from	.= '<option value="-1">&nbsp;&raquo;&nbsp;'.$user->lang['DL_NO_PERMS_COPY'].'</option>';
		$perms_copy_from	.= '<option value="0">&nbsp;&raquo;&nbsp;'.$user->lang['DL_CAT_PARENT'].'</option>';
		$perms_copy_from	.= $dl_mod->dl_dropdown(0, 0, $index[$cat_id]['parent'], 'auth_view', $cat_id);
		$perms_copy_from	.= '</select>';

		$text_ary		= generate_text_for_edit($description, $desc_uid, $desc_flags);
		$description	= $text_ary['text'];

		$text_ary		= generate_text_for_edit($rules, $rules_uid, $rules_flags);
		$rules			= $text_ary['text'];

		$s_hidden_fields = array_merge($s_hidden_fields, array('cat_id' => $cat_id));
	}
	else
	{
		$must_approve		= 1;
		$allow_mod_desc		= 0;
		$statistics			= 1;
		$comments			= 1;
		$stats_prune		= 100000;
		$cat_parent			= '<select name="parent">';
		$cat_parent			.= '<option value="0">&nbsp;&raquo;&nbsp;'.$user->lang['DL_CAT_INDEX'].'</option>';
		$cat_parent			.= $dl_mod->dl_dropdown(0, 0, 0, 'auth_view', $cat_id);
		$cat_parent			.= '</select>';
		$cat_traffic		= 0;
		$cat_remain_traffic	= 0;
		$allow_thumbs		= 0;
		$approve_comments	= 0;
		$bug_tracker		= 0;
		$cat_path			= '/';
		$cat_name			= '';
		$description		= '';
		$rules				= '';
		$topic_forum		= 0;
		$topic_text			= '';
		$cat_icon			= '';
		$perms_copy_from	= '<select name="perms_copy_from">';
		$perms_copy_from	.= '<option value="0">&nbsp;&raquo;&nbsp;'.$user->lang['DL_CAT_PARENT'].'</option>';
		$perms_copy_from	.= $dl_mod->dl_dropdown(0, 0, 0, 'auth_view', $cat_id);
		$perms_copy_from	.= '</select>';
	}

	$cat_traffic_out	= 0;
	$cat_remain_traffic	= ($cat_remain_traffic < 0) ? 0 : $cat_remain_traffic;
	$cat_remain_traffic	= $dl_mod->dl_size($cat_remain_traffic);

	$s_select_datasize	= '<option value="KB">' . $user->lang['DL_KB'] . '</option>';
	$s_select_datasize	.= '<option value="MB">' . $user->lang['DL_MB'] . '</option>';
	$s_select_datasize	.= '<option value="GB">' . $user->lang['DL_GB'] . '</option>';
	$s_select_datasize	.= '</select>';

	if ($cat_traffic > 1073741823)
	{
		$cat_traffic_out	= number_format($cat_traffic / 1073741824, 2);
		$data_range_select	= 'GB';
	}
	else if ($cat_traffic > 1048575)
	{
		$cat_traffic_out	= number_format($cat_traffic / 1048576, 2);
		$data_range_select	= 'MB';
	}
	else if ($cat_traffic > 1023)
	{
		$cat_traffic_out	= number_format($cat_traffic / 1024, 2);
		$data_range_select	= 'KB';
	}
	else
	{
		$data_range_select	= 'KB';
	}

	$cat_traffic_range	= str_replace('value="' . $data_range_select . '">', 'value="' . $data_range_select . '" selected="selected">', $s_select_datasize);
	$cat_traffic_range	= '<select name="cat_traffic_range">' . $cat_traffic_range;

	$approve_yes	= ($must_approve) ? 'checked="checked"' : '';
	$approve_no		= (!$must_approve) ? 'checked="checked"' : '';

	$allow_mod_desc_yes	= ($allow_mod_desc) ? 'checked="checked"' : '';
	$allow_mod_desc_no	= (!$allow_mod_desc) ? 'checked="checked"' : '';

	$stats_yes	= ($statistics) ? 'checked="checked"' : '';
	$stats_no	= (!$statistics) ? 'checked="checked"' : '';

	$comments_yes	= ($comments) ? 'checked="checked"' : '';
	$comments_no	= (!$comments) ? 'checked="checked"' : '';

	$allow_thumbs_yes	= ($allow_thumbs) ? 'checked="checked"' : '';
	$allow_thumbs_no	= (!$allow_thumbs) ? 'checked="checked"' : '';

	$approve_comments_yes	= ($approve_comments) ? 'checked="checked"' : '';
	$approve_comments_no	= (!$approve_comments) ? 'checked="checked"' : '';

	$bug_tracker_yes	= ($bug_tracker) ? 'checked="checked"' : '';
	$bug_tracker_no		= (!$bug_tracker) ? 'checked="checked"' : '';

	$template->set_filenames(array(
		'category' => 'dl_mod/dl_cat_edit_body.html')
	);

	if ($dl_config['thumb_fsize'])
	{
		$template->assign_var('S_THUMNAILS', true);
	}

	if ($dl_config['dl_topic_forum'] == -1)
	{
		$template->assign_var('S_ENTER_TOPIC_FORUM', true);

		$forum_select_tmp = get_forum_list('f_list', false);
		$s_forum_select = '';
		
		foreach ($forum_select_tmp as $key => $value)
		{
			switch ($value['forum_type'])
			{
				case FORUM_CAT:
					if ($s_forum_select)
					{
						$s_forum_select .= '</optgroup>';
					}
					$s_forum_select .= '<optgroup label="' . $value['forum_name'] . '">';
				break;
				case FORUM_POST:
					$s_forum_select .= '<option value="' . $value['forum_id'] . '">' . $value['forum_name'] . '</option>';
				break;
			}
		}
	
		$s_forum_select = '<select name="dl_topic_forum"><option value="0">' . $user->lang['DEACTIVATE'] . '</option>' . $s_forum_select . '</select>'; 
		$s_forum_select = str_replace('value="' . $topic_forum . '">', 'value="' . $topic_forum . '" selected="selected">', $s_forum_select);
	}
	else
	{
		$s_forum_select = '';
	}

	$template->assign_vars(array(
		'L_DL_CAT_TITLE'				=> $user->lang['DL_CAT_TITLE'],
		'L_DL_CAT_PATH'					=> $user->lang['DL_CAT_PATH'],
		'L_DL_CAT_PATH_EXPLAIN'			=> 'DL_CAT_PATH',
		'L_DL_CAT_EDIT_TEXT'			=> $user->lang['DL_CAT_EDIT_EXPLAIN'],
		'L_DL_NAME'						=> $user->lang['DL_CAT_NAME'],
		'L_DL_NAME_EXPLAIN'				=> 'DL_CAT_NAME',
		'L_DL_DESCRIPTION'				=> $user->lang['DL_CAT_DESCRIPTION'],
		'L_DL_DESCRIPTION_EXPLAIN'		=> 'DL_CAT_DESCRIPTION',
		'L_DL_RULES'					=> $user->lang['DL_CAT_RULES'],
		'L_DL_RULES_EXPLAIN'			=> 'DL_CAT_RULES',
		'L_DL_PARENT'					=> $user->lang['DL_CAT_PARENT'],
		'L_DL_PARENT_EXPLAIN'			=> 'DL_CAT_PARENT',
		'L_DL_MUST_APPROVE'				=> $user->lang['DL_MUST_APPROVE'],
		'L_DL_MUST_APPROVE_EXPLAIN'		=> 'DL_MUST_APPROVE',
		'L_DL_ALLOW_MOD_DESC'			=> $user->lang['DL_MOD_DESC_ALLOW'],
		'L_DL_ALLOW_MOD_DESC_EXPLAIN'	=> 'DL_MOD_DESC_ALLOW',
		'L_DL_STATISTICS'				=> $user->lang['DL_STATISTICS'],
		'L_DL_STATISTICS_EXPLAIN'		=> 'DL_STATISTICS',
		'L_DL_STATS_PRUNE'				=> $user->lang['DL_STATS_PRUNE'],
		'L_DL_STATS_PRUNE_EXPLAIN'		=> 'DL_STATS_PRUNE',
		'L_DL_COMMENTS'					=> $user->lang['DL_COMMENTS'],
		'L_DL_COMMENTS_EXPLAIN'			=> 'DL_COMMENTS',
		'L_DL_COPY_PERMISSIONS'			=> $user->lang['DL_COPY_PERMISSIONS'],
		'L_DL_COPY_PERMISSIONS_EXPLAIN'	=> 'DL_COPY_PERMISSIONS',
		'L_DL_CAT_MODE'					=> ($action == 'edit') ? $user->lang['EDIT'] : $user->lang['ADD'],
		'L_DL_CAT_TRAFFIC'				=> (isset($index[$cat_id]['cat_traffic']) && isset($cat_remain_traffic)) ? sprintf($user->lang['DL_CAT_TRAFFIC'], $cat_remain_traffic) : $user->lang['DL_CAT_TRAFFIC_OFF'],
		'L_DL_CAT_TRAFFIC_EXPLAIN'		=> 'DL_CAT_TRAFFIC',
		'L_DL_THUMBNAIL'				=> $user->lang['DL_THUMB_CAT'],
		'L_DL_THUMBNAIL_EXPLAIN'		=> 'DL_THUMB_CAT',
		'L_DL_APPROVE'					=> $user->lang['DL_APPROVE_COMMENTS'],
		'L_DL_APPROVE_EXPLAIN'			=> 'DL_APPROVE_COMMENTS',
		'L_DL_BUG_TRACKER'				=> $user->lang['DL_BUG_TRACKER_CAT'],
		'L_DL_BUG_TRACKER_EXPLAIN'		=> 'DL_BUG_TRACKER_CAT',
		'L_DL_TOPIC_FORUM'				=> $user->lang['DL_TOPIC_FORUM_T'],
		'L_DL_TOPIC_FORUM_EXPLAIN'		=> 'DL_TOPIC_FORUM_C',
		'L_DL_TOPIC_TEXT'				=> $user->lang['DL_TOPIC_TEXT'],
		'L_DL_TOPIC_TEXT_EXPLAIN'		=> 'DL_TOPIC_TEXT',
		'L_DL_CAT_ICON'					=> $user->lang['DL_CAT_ICON'],
		'L_DL_CAT_ICON_EXPLAIN'			=> 'DL_CAT_ICON',

		'CATEGORY'				=> (isset($index[$cat_id]['cat_name'])) ? sprintf($user->lang['DL_PERMISSIONS'], $index[$cat_id]['cat_name']) : '',
		'CAT_PATH'				=> $cat_path,
		'MUST_APPROVE_YES'		=> $approve_yes,
		'MUST_APPROVE_NO'		=> $approve_no,
		'ALLOW_MOD_DESC_YES'	=> $allow_mod_desc_yes,
		'ALLOW_MOD_DESC_NO'		=> $allow_mod_desc_no,
		'STATS_YES'				=> $stats_yes,
		'STATS_NO'				=> $stats_no,
		'STATS_PRUNE'			=> $stats_prune,
		'COMMENTS_YES'			=> $comments_yes,
		'COMMENTS_NO'			=> $comments_no,
		'CAT_NAME'				=> $cat_name,
		'DESCRIPTION'			=> $description,
		'RULES'					=> $rules,
		'CAT_PARENT'			=> $cat_parent,
		'CAT_TRAFFIC'			=> $cat_traffic_out,
		'ALLOW_THUMBS_YES'		=> $allow_thumbs_yes,
		'ALLOW_THUMBS_NO'		=> $allow_thumbs_no,
		'APPROVE_COMMENTS_YES'	=> $approve_comments_yes,
		'APPROVE_COMMENTS_NO'	=> $approve_comments_no,
		'BUG_TRACKER_YES'		=> $bug_tracker_yes,
		'BUG_TRACKER_NO'		=> $bug_tracker_no,
		'PERMS_COPY_FROM'		=> $perms_copy_from,
		'TOPIC_TEXT'			=> $topic_text,
		'CAT_ICON'				=> $cat_icon,

		'S_DL_TOPIC_FORUM'		=> $s_forum_select,
		'S_CAT_TRAFFIC_RANGE'	=> $cat_traffic_range,
		'S_CATEGORY_ACTION'		=> $basic_link,
		'S_HIDDEN_FIELDS'		=> build_hidden_fields($s_hidden_fields))
	);

	$template->assign_var('S_DL_CATEGORY_EDIT', true);

	$template->assign_display('category');

	$dl_template_in_use = true;
}
else if($action == 'save_cat')
{
	$cat_parent			= request_var('parent', 0);
	$description		= utf8_normalize_nfc(request_var('description', '', true));
	$rules				= utf8_normalize_nfc(request_var('rules', '', true));
	$cat_name			= utf8_normalize_nfc(request_var('cat_name', '', true));
	$path				= request_var('path', '');
	$must_approve		= request_var('must_approve', 0);
	$allow_mod_desc		= request_var('allow_mod_desc', 0);
	$statistics			= request_var('statistics', 0);
	$stats_prune		= request_var('stats_prune', 0);
	$comments			= request_var('comments', 0);
	$cat_traffic		= request_var('cat_traffic', 0);
	$cat_traffic_range	= request_var('cat_traffic_range', '');
	$allow_thumbs		= request_var('allow_thumbs', 0);
	$approve_comments	= request_var('approve_comments', 0);
	$bug_tracker		= request_var('bug_tracker', 0);
	$perms_copy_from	= request_var('perms_copy_from', 0);
	$topic_forum		= request_var('dl_topic_forum', 0);
	$topic_text			= utf8_normalize_nfc(request_var('dl_topic_text', '', true));
	$cat_icon			= str_replace(generate_board_url() . '/', '', utf8_normalize_nfc(request_var('cat_icon', '', true)));

	if (strpos(strtolower($cat_icon), "http"))
	{
		$cat_icon = '';
	}

	$allow_bbcode	= ($config['allow_bbcode']) ? true : false;
	$allow_urls		= true;
	$allow_smilies	= ($config['allow_smilies']) ? true : false;
	$desc_uid		= $desc_bitfield = $rules_uid = $rules_bitfield = '';
	$desc_flags		= $rules_flags = 0;

	generate_text_for_storage($description, $desc_uid, $desc_bitfield, $desc_flags, $allow_bbcode, true, $allow_smilies);
	generate_text_for_storage($rules, $rules_uid, $rules_bitfield, $rules_flags, $allow_bbcode, true, $allow_smilies);

	if ($cat_traffic_range == 'KB')
	{
		$cat_traffic = $cat_traffic * 1024;
	}
	else if ($cat_traffic_range == 'MB')
	{
		$cat_traffic = $cat_traffic * 1048576;
	}
	else if ($cat_traffic_range == 'GB')
	{
		$cat_traffic = $cat_traffic * 1073741824;
	}

	if (!@file_exists($dl_config['dl_path'] . $path) || substr($path, strlen($path)-1, 1) <> '/')
	{
		$message = sprintf($user->lang['DL_PATH_NOT_EXIST'], $path);
		trigger_error($message, E_USER_WARNING);
	}
	else if($cat_id)
	{
		$sql = 'UPDATE ' . DL_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'description'		=> $description,
			'rules'				=> $rules,
			'parent'			=> $cat_parent,
			'cat_name'			=> $cat_name,
			'path'				=> $path,
			'desc_uid'			=> $desc_uid,
			'desc_bitfield'		=> $desc_bitfield,
			'desc_flags'		=> $desc_flags,
			'rules_uid'			=> $rules_uid,
			'rules_bitfield'	=> $rules_bitfield,
			'rules_flags'		=> $rules_flags,
			'must_approve'		=> $must_approve,
			'allow_mod_desc'	=> $allow_mod_desc,
			'statistics'		=> $statistics,
			'stats_prune'		=> $stats_prune,
			'comments'			=> $comments,
			'cat_traffic'		=> $cat_traffic,
			'allow_thumbs'		=> $allow_thumbs,
			'approve_comments'	=> $approve_comments,
			'dl_topic_forum'	=> $topic_forum,
			'dl_topic_text'		=> $topic_text,
			'approve_comments'	=> $approve_comments,
			'cat_icon'			=> $cat_icon,
			'bug_tracker'		=> $bug_tracker)) . " WHERE id = $cat_id";

		$message = $user->lang['DL_CATEGORY_UPDATED'];

		add_log('admin', 'DL_LOG_CAT_EDIT', $cat_name);
	}
	else
	{
		$sql = 'INSERT INTO ' . DL_CAT_TABLE . ' ' . $db->sql_build_array('INSERT', array(
			'cat_name'			=> $cat_name,
			'parent'			=> $cat_parent,
			'description'		=> $description,
			'rules'				=> $rules,
			'path'				=> $path,
			'desc_uid'			=> $desc_uid,
			'rules_uid'			=> $rules_uid,
			'desc_bitfield'		=> $desc_bitfield,
			'rules_bitfield'	=> $rules_bitfield,
			'desc_flags'		=> $desc_flags,
			'rules_flags'		=> $rules_flags,
			'must_approve'		=> $must_approve,
			'allow_mod_desc'	=> $allow_mod_desc,
			'statistics'		=> $statistics,
			'stats_prune'		=> $stats_prune,
			'comments'			=> $comments,
			'cat_traffic'		=> $cat_traffic,
			'allow_thumbs'		=> $allow_thumbs,
			'approve_comments'	=> $approve_comments,
			'dl_topic_forum'	=> $topic_forum,
			'dl_topic_text'		=> $topic_text,
			'cat_icon'			=> $cat_icon,
			'bug_tracker'		=> $bug_tracker));

		$message = $user->lang['DL_CATEGORY_ADDED'];

		$cat_id = $db->sql_nextid();

		add_log('admin', 'DL_LOG_CAT_ADD', $cat_name);
	}

	$db->sql_query($sql);

	// Copy permissions if needed
	if ($perms_copy_from !== -1)
	{
		$copy_from = ($perms_copy_from === 0) ? $cat_parent : $perms_copy_from;

		if ($copy_from !== 0)
		{
			// At first copy the general permissions for all users
			$sql = 'SELECT cat_name, auth_view, auth_dl, auth_up, auth_mod, auth_cread, auth_cpost FROM ' . DL_CAT_TABLE . "
				WHERE id = $copy_from";
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);

			$auth_view	= $row['auth_view'];
			$auth_dl	= $row['auth_dl'];
			$auth_up	= $row['auth_up'];
			$auth_mod	= $row['auth_mod'];
			$auth_cread	= $row['auth_cread'];
			$auth_cpost	= $row['auth_cpost'];
			$source_cat	= $row['cat_name'];

			$db->sql_freeresult($result);

			$sql = 'SELECT cat_name FROM ' . DL_CAT_TABLE . "
				WHERE id = $cat_id";
			$result = $db->sql_query($sql);
			$dest_cat = $db->sql_fetchfield('cat_name');
			$db->sql_freeresult($result);
			
			$sql = 'UPDATE ' . DL_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'auth_view'		=> $auth_view,
				'auth_dl'		=> $auth_dl,
				'auth_up'		=> $auth_up,
				'auth_mod'		=> $auth_mod,
				'auth_cread'	=> $auth_cread,
				'auth_cpost'	=> $auth_cpost)) . " WHERE id = $cat_id";
			$db->sql_query($sql);

			// And now copy all permissions for usergroups
			$sql = 'SELECT * FROM ' . DL_AUTH_TABLE . "
				WHERE cat_id = $copy_from";
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$group_id	= $row['group_id'];
				$auth_view	= $row['auth_view'];
				$auth_dl	= $row['auth_dl'];
				$auth_up	= $row['auth_up'];
				$auth_mod	= $row['auth_mod'];

				$sql = 'INSERT INTO ' . DL_AUTH_TABLE . ' ' . $db->sql_build_array('INSERT', array(
					'cat_id'	=> $cat_id,
					'group_id'	=> $group_id,
					'auth_view'	=> $auth_view,
					'auth_dl'	=> $auth_dl,
					'auth_up'	=> $auth_up,
					'auth_mod'	=> $auth_mod));
				$db->sql_query($sql);
			}

			$db->sql_freeresult($result);

			add_log('admin', 'DL_LOG_CAT_PERM_COPY', $source_cat, $dest_cat);
		}
	}

	$message .= "<br /><br />" . sprintf($user->lang['CLICK_RETURN_CATEGORYADMIN'], "<a href=\"{$basic_link}\">", "</a>") . adm_back_link($this->u_action);

	trigger_error($message);
}
else if($action == 'delete' && $cat_id && !$dl_mod->get_sublevel_count($cat_id))
{
	if ($confirm)
	{
		if( $new_cat_id == -1 )
		{
			$sql = 'SELECT c.cat_name, c.path, d.real_file FROM ' . DL_CAT_TABLE . ' c, ' . DOWNLOADS_TABLE . " d
				WHERE d.cat = c.id
					AND c.id = $cat_id
					AND d.extern = 0";
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$path = $row['path'];
				$real_file = $row['real_file'];
				@unlink($dl_config['dl_path'] . $path . $real_file);
			}

			$db->sql_freeresult($result);

			$sql = 'DELETE FROM ' . DOWNLOADS_TABLE . "
				WHERE cat = $cat_id";
			$db->sql_query($sql);
		}

		if ($new_cat_id > 0)
		{
			$sql = 'UPDATE ' . DOWNLOADS_TABLE . "
				SET cat = $new_cat_id
				WHERE cat = $cat_id";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_STATS_TABLE . "
				SET cat_id = $new_cat_id
				WHERE cat_id = $cat_id";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_COMMENTS_TABLE . "
				SET cat_id = $new_cat_id
				WHERE cat_id = $cat_id";
			$db->sql_query($sql);
		}
		else
		{
			$sql = 'DELETE FROM ' . DL_STATS_TABLE . "
				WHERE cat_id = $cat_id";
			$db->sql_query($sql);
		}

		$sql = 'DELETE FROM ' . DL_CAT_TABLE . "
			WHERE id = $cat_id";
		$db->sql_query($sql);

		$sql = 'DELETE FROM ' . DL_COMMENTS_TABLE . "
			WHERE cat_id = $cat_id";
		$db->sql_query($sql);

		$sql = 'DELETE FROM ' . DL_AUTH_TABLE . "
			WHERE cat_id = $cat_id";
		$db->sql_query($sql);

		add_log('admin', 'DL_LOG_CAT_DEL', $log_cat_name);

		$message = $user->lang['DL_CATEGORY_REMOVED'] . "<br /><br />" . sprintf($user->lang['CLICK_RETURN_CATEGORYADMIN'], "<a href=\"{$basic_link}\">", "</a>") . adm_back_link($this->u_action);

		trigger_error($message);
	}
	else
	{
		$cat_name = $index[$cat_id]['cat_name'];
		$cat_name = str_replace('&nbsp;&nbsp;|___&nbsp;', '', $cat_name);

		$s_switch_cat = '<select name="new_cat_id">';
		$s_switch_cat .= '<option value="0">'.$user->lang['DL_DELETE_CAT_ONLY'].'</option>';
		$s_switch_cat .= '<option value="-1" SELECTED>'.$user->lang['DL_DELETE_CAT_AND_FILES'].'</option>';
		$s_switch_cat .= '<option value="---">----------------------------------------</option>';
		$s_switch_cat .= $dl_mod->dl_dropdown(0, 0, $cat_id, 'auth_move');
		$s_switch_cat .= '</select>';

		$template->set_filenames(array(
			'confirm_body' => 'dl_mod/dl_confirm_body.html')
		);

		$s_hidden_fields = array(
			'cat_id' => $cat_id,
			'action' => 'delete',
			'confirm' => 1
		);

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $user->lang['INFORMATION'],
			'MESSAGE_TEXT' => sprintf($user->lang['DL_CONFIRM_CAT_DELETE'], $cat_name),

			'L_SWITCH_CAT' => $user->lang['DL_DELETE_CAT_CONFIRM'],
			'S_SWITCH_CAT' => $s_switch_cat,

			'L_YES' => $user->lang['YES'],
			'L_NO' => $user->lang['NO'],

			'S_CONFIRM_ACTION' => $basic_link,
			'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
		);

		$template->assign_var('S_CHOOSE_NEW_CAT', true);

		$template->assign_var('S_DL_CONFIRM', true);

		$template->assign_display('confirm_body');

		$dl_template_in_use = true;
	}
}
else if($action == 'delete_stats')
{
	$dl_confirm_stat_delete = 0;

	if($cat_id == '-1')
	{
		$sql = 'DELETE FROM ' . DL_STATS_TABLE;
		$db->sql_query($sql);

		add_log('admin', 'DL_LOG_DEL_ALL_STATS');
	}
	else
	{
		if(!$confirm)
		{
			$cat_name = $index[$cat_id]['cat_name'];
			$cat_name = str_replace('&nbsp;&nbsp;|___&nbsp;', '', $cat_name);
	
			$template->set_filenames(array(
				'confirm_body' => 'dl_mod/dl_confirm_body.html')
			);
	
			$s_hidden_fields = array(
				'cat_id' => $cat_id,
				'action' => 'delete_stats',
				'confirm' => 1
			);
	
			$template->assign_vars(array(
				'MESSAGE_TITLE' => $user->lang['INFORMATION'],
				'MESSAGE_TEXT' => ($cat_id == 'all') ? $user->lang['DL_CONFIRM_ALL_STATS_DELETE'] : sprintf($user->lang['DL_CONFIRM_CAT_STATS_DELETE'], $cat_name),
	
				'L_YES' => $user->lang['YES'],
				'L_NO' => $user->lang['NO'],
	
				'S_CONFIRM_ACTION' => $basic_link,
				'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
			);
	
			$template->assign_var('S_DL_CONFIRM', true);
	
			$template->assign_display('confirm_body');

			$dl_template_in_use = true;
			$dl_confirm_stat_delete = true;
		}
		else
		{
			if ($cat_id)
			{
				$sql = 'DELETE FROM ' . DL_STATS_TABLE . '
					WHERE cat_id = ' . (int)$cat_id;
				$db->sql_query($sql);
	
				add_log('admin', 'DL_LOG_DEL_CAT_STATS', $log_cat_name);
			}
		}
	}

	if (!$dl_confirm_stat_delete)
	{
		redirect($basic_link);
	}
}
else if($action == 'delete_comments')
{
	$dl_confirm_comm_delete = 0;

	if($cat_id == '-1')
	{
		$sql = 'DELETE FROM ' . DL_COMMENTS_TABLE;
		$db->sql_query($sql);

		add_log('admin', 'DL_LOG_DEL_ALL_COM');
	}
	else if(!$confirm)
	{
		$cat_name = $index[$cat_id]['cat_name'];
		$cat_name = str_replace('&nbsp;&nbsp;|___&nbsp;', '', $cat_name);

		$template->set_filenames(array(
			'confirm_body' => 'dl_mod/dl_confirm_body.html')
		);

		$s_hidden_fields = array(
			'cat_id' => $cat_id,
			'action' => 'delete_comments',
			'confirm' => 1
		);

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $user->lang['INFORMATION'],
			'MESSAGE_TEXT' => ($cat_id == 'all') ? $user->lang['DL_CONFIRM_ALL_COMMENTS_DELETE'] : sprintf($user->lang['DL_CONFIRM_CAT_COMMENTS_DELETE'], $cat_name),

			'L_YES' => $user->lang['YES'],
			'L_NO' => $user->lang['NO'],

			'S_CONFIRM_ACTION' => $basic_link,
			'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
		);

		$template->assign_var('S_DL_CONFIRM', true);

		$template->assign_display('confirm_body');

		$dl_template_in_use = true;
		$dl_confirm_comm_delete = true;
	}
	else
	{
		if ($cat_id)
		{
			$sql = 'DELETE FROM ' . DL_COMMENTS_TABLE . '
				WHERE cat_id = ' . (int)$cat_id;
			$db->sql_query($sql);

			add_log('admin', 'DL_LOG_DEL_CAT_COM', $log_cat_name);
		}
	}

	if (!$dl_confirm_comm_delete)
	{
		redirect($basic_link);
	}
}
else if($action == 'category_order')
{
	$sql = 'SELECT sort FROM ' . DL_CAT_TABLE . "
		WHERE id = $cat_id";
	$result = $db->sql_query($sql);
	$sql_move = $db->sql_fetchfield('sort');
	$db->sql_freeresult($result);

	if ($move)
	{
		$sql_move += 15;
	}
	else
	{
		$sql_move -= 15;
	}

	$sql = 'UPDATE ' . DL_CAT_TABLE . "
		SET sort = $sql_move
		WHERE id = $cat_id";
	$db->sql_query($sql);

	$par_cat = $index[$cat_id]['parent']; 

	$sql = 'SELECT id FROM ' . DL_CAT_TABLE . '
		WHERE parent = ' .(int)$par_cat . '
		ORDER BY sort';
	$result = $db->sql_query($sql);

	$i = 10;

	while($row = $db->sql_fetchrow($result))
	{
		$sql_move = 'UPDATE ' . DL_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'sort' => $i)) . ' WHERE id = ' . $row['id'];
		$db->sql_query($sql_move);

		$i += 10;
	}

	$db->sql_freeresult($result);

	add_log('admin', 'DL_LOG_CAT_MOVE', $log_cat_name);

	redirect($basic_link);
}
else if($action == 'asc_sort')
{
	$sql = 'SELECT id FROM ' . DL_CAT_TABLE . '
		WHERE parent = ' . intval($cat_id) . '
		ORDER BY cat_name ASC';
	$result = $db->sql_query($sql);

	$i = 10;

	while($row = $db->sql_fetchrow($result))
	{
		$sql_move = 'UPDATE ' . DL_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'sort' => $i)) . ' WHERE id = ' . $row['id'];
		$db->sql_query($sql_move);

		$i += 10;
	}

	$db->sql_freeresult($result);

	add_log('admin', 'DL_LOG_CAT_SORT_ASC');

	redirect($basic_link);
}

if (!$dl_template_in_use)
{
	$stats_cats = array();
	$comments_cats = array();
	
	$sql = 'SELECT cat_id, COUNT(dl_id) AS total_stats FROM ' . DL_STATS_TABLE . '
		GROUP BY cat_id';
	$result = $db->sql_query($sql);
	
	while($row = $db->sql_fetchrow($result))
	{
		$stats_cats[$row['cat_id']] = $row['total_stats'];
	}
	
	$db->sql_freeresult($result);
	
	$sql = 'SELECT cat_id, COUNT(dl_id) AS total_comments FROM ' . DL_COMMENTS_TABLE . '
		GROUP BY cat_id';
	$result = $db->sql_query($sql);
	
	while($row = $db->sql_fetchrow($result))
	{
		$comments_cats[$row['cat_id']] = $row['total_comments'];
	}
	
	$db->sql_freeresult($result);
	
	$stats_total = 0;
	$comments_total = 0;
	
	foreach (array_keys($index) as $key)
	{
		$cat_id = $key;
		$cat_name = $index[$cat_id]['cat_name'];
		$cat_icon = $index[$cat_id]['cat_icon'];
	
		$cat_edit = "{$basic_link}&amp;action=edit&amp;cat_id=$cat_id";

		$cat_sub = $dl_mod->get_sublevel_count($cat_id);

		if ($cat_sub)
		{
			$cat_delete = '';
		}
		else
		{
			$cat_delete = "{$basic_link}&amp;action=delete&amp;cat_id=$cat_id";
		}
	
		$dl_move_up = "{$basic_link}&amp;action=category_order&amp;move=0&amp;cat_id=$cat_id";
		$dl_move_down = "{$basic_link}&amp;action=category_order&amp;move=1&amp;cat_id=$cat_id";
	
		if ($dl_mod->count_sublevel($cat_id) > 1)
		{
			$l_sort_asc = $user->lang['DL_SUB_SORT_ASC'];
			$dl_sort_asc = "{$basic_link}&amp;action=asc_sort&amp;cat_id=$cat_id";
		}
		else
		{
			$l_sort_asc = '';
			$dl_sort_asc = '';
		}
	
		$l_delete_stats = '';
		$l_delete_comments = '';
		$u_delete_stats = '';
		$u_delete_comments = '';
	
		if (isset($stats_cats[$cat_id]))
		{
			$l_delete_stats = $user->lang['DL_STATS_DELETE'];
			$u_delete_stats = "{$basic_link}&amp;action=delete_stats&amp;cat_id=$cat_id";
			$stats_total++;
		}
	
		if (isset($comments_cats[$cat_id]))
		{
			$l_delete_comments = $user->lang['DL_COMMENTS_DELETE'];
			$u_delete_comments = "{$basic_link}&amp;action=delete_comments&amp;cat_id=$cat_id";
			$comments_total++;
		}
	
		$sub_cats = $dl_mod->get_sublevel_count($cat_id);

		$template->assign_block_vars('categories', array(
			'L_DELETE_STATS'		=> $l_delete_stats,
			'L_DELETE_COMMENTS'		=> $l_delete_comments,
			'L_SORT_ASC'			=> $l_sort_asc,
	
			'CAT_NAME'				=> $cat_name,
			'CAT_ICON'				=> $cat_icon,
	
			'U_CAT_EDIT'			=> $cat_edit,
			'U_CAT_DELETE'			=> $cat_delete,
			'U_CATEGORY_MOVE_UP'	=> $dl_move_up,
			'U_CATEGORY_MOVE_DOWN'	=> $dl_move_down,
			'U_CATEGORY_ASC_SORT'	=> $dl_sort_asc,
			'U_DELETE_STATS'		=> $u_delete_stats,
			'U_DELETE_COMMENTS'		=> $u_delete_comments)
		);
	}

	if ($stats_total)
	{
		$l_delete_stats_all = $user->lang['DL_STATS_DELETE_ALL'];
		$u_delete_stats_all = "{$basic_link}&amp;action=delete_stats&amp;cat_id=-1";
		$template->assign_var('S_TOTAL_STATS', true);
	}
	else
	{
		$l_delete_stats_all = '';
		$u_delete_stats_all = '';
	}
	
	if ($comments_total)
	{
		$l_delete_comments_all = $user->lang['DL_COMMENTS_DELETE_ALL'];
		$u_delete_comments_all = "{$basic_link}&amp;action=delete_comments&amp;cat_id=-1";
		$template->assign_var('S_TOTAL_COMMENTS', true);
	}
	else
	{
		$l_delete_comments_all = '';
		$u_delete_comments_all = '';
	}
	
	$template->assign_vars(array(
		'L_DELETE_STATS_ALL'	=> $l_delete_stats_all,
		'L_DELETE_COMMENTS_ALL'	=> $l_delete_comments_all,
		'L_DL_CAT_TITLE'		=> $user->lang['DL_CAT_TITLE'],
		'L_DL_CAT_EDIT_TEXT'	=> $user->lang['DL_CAT_EDIT_EXPLAIN'],
		'L_DL_NAME'				=> $user->lang['DL_CAT_NAME'],
		'L_DL_ADD_CAT'			=> $user->lang['DL_ADD_CATEGORY'],
		'L_ACTION'				=> $user->lang['ACTION'],
		'L_SORT_ASC_LEVEL_ZERO'	=> $user->lang['DL_SUB_SORT_ASC_ZERO'],
	
		'CAT_PATH'				=> (isset($cat_path)) ? $cat_path : '/',
		'CAT_NAME'				=> $cat_name,
	
		'S_CATEGORY_ACTION'		=> $basic_link,
	
		'U_SORT_LEVEL_ZERO'		=> "{$basic_link}&amp;action=asc_sort&amp;cat_id=0",
		'U_DELETE_STATS_ALL'	=> $u_delete_stats_all,
		'U_DELETE_COMMENTS_ALL'	=> $u_delete_comments_all)
	);

	/*
	* show the default page
	*/
	$template->set_filenames(array(
		'categories' => 'dl_mod/dl_cat_body.html')
	);
	
	$template->assign_var('S_DL_CATEGORIES', true);
	
	$template->assign_display('categories');
}

?>