<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_upload.php 13 2009/09/17 OXPUS
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

if ($submit)
{	
	$approve			= request_var('approve', 0);
	$description		= utf8_normalize_nfc(request_var('description', '', true));
	$file_traffic		= request_var('file_traffic', 0);
	$file_traffic_range	= request_var('file_traffic_range', 'KB');
	$long_desc			= utf8_normalize_nfc(request_var('long_desc', '', true));
	$file_name_name		= utf8_normalize_nfc(request_var('file_name', '', true));

	$file_free			= request_var('file_free', 0);
	$file_extern		= request_var('file_extern', 0);

	$test				= utf8_normalize_nfc(request_var('test', '', true));
	$require			= utf8_normalize_nfc(request_var('require', '', true));
	$todo				= utf8_normalize_nfc(request_var('todo', '', true));
	$warning			= utf8_normalize_nfc(request_var('warning', '', true));
	$mod_desc			= utf8_normalize_nfc(request_var('mod_desc', '', true));
	$mod_list			= request_var('mod_list', 0);
	$mod_list			= ($mod_list) ? 1 : 0;

	$send_notify			= request_var('send_notify', 0);
	$disable_popup_notify	= request_var('disable_popup_notify', 0);

	$hacklist				= request_var('hacklist', 0);
	$hack_author			= utf8_normalize_nfc(request_var('hack_author', '', true));
	$hack_author_email		= utf8_normalize_nfc(request_var('hack_author_email', '', true));
	$hack_author_website	= utf8_normalize_nfc(request_var('hack_author_website', '', true));
	$hack_version			= utf8_normalize_nfc(request_var('hack_version', '', true));
	$hack_dl_url			= utf8_normalize_nfc(request_var('hack_dl_url', '', true));

	$allow_bbcode		= ($config['allow_bbcode']) ? true : false;
	$allow_urls			= true;
	$allow_smilies		= ($config['allow_smilies']) ? true : false;
	$desc_uid			= '';
	$desc_bitfield		= '';
	$long_desc_uid		= '';
	$long_desc_bitfield	= '';
	$mod_desc_uid		= '';
	$mod_desc_bitfield	= '';
	$warn_uid			= '';
	$warn_bitfield		= '';
	$desc_flags			= 0;
	$long_desc_flags	= 0;
	$mod_desc_flags		= 0;
	$warn_flags			= 0;

	generate_text_for_storage($description, $desc_uid, $desc_bitfield, $desc_flags, $allow_bbcode, $allow_urls, $allow_smilies);
	generate_text_for_storage($long_desc, $long_desc_uid, $long_desc_bitfield, $long_desc_flags, $allow_bbcode, $allow_urls, $allow_smilies);
	generate_text_for_storage($mod_desc, $mod_desc_uid, $mod_desc_bitfield, $mod_desc_flags, $allow_bbcode, $allow_urls, $allow_smilies);
	generate_text_for_storage($warning, $warn_uid, $warn_bitfield, $warn_flags, $allow_bbcode, $allow_urls, $allow_smilies);

	if ($file_traffic_range == "KB")
	{
		$file_traffic = $file_traffic * 1024;
	}
	else if ($file_traffic_range == "MB")
	{
		$file_traffic = $file_traffic * 1048576;
	}
	else if ($file_traffic_range == "GB")
	{
		$file_traffic = $file_traffic * 1073741824;
	}

	$ini_val = ( @phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';

	if ( @$ini_val('open_basedir') != '' )
	{
		if ( @phpversion() < '4.0.3' )
		{
			trigger_error('open_basedir is set and your PHP version does not allow move_uploaded_file<br /><br />Please contact your server admin', E_USER_WARNING);
		}

		$move_file = 'move_uploaded_file';
	}
	else
	{
		$move_file = 'copy';
	}

	if ($dl_config['thumb_fsize'] && $index[$cat_id]['allow_thumbs'])
	{
		$thumb_size = (isset($_FILES['thumb_name']['size'])) ? $_FILES['thumb_name']['size'] : '';
		$thumb_temp = (isset($_FILES['thumb_name']['tmp_name'])) ? $_FILES['thumb_name']['tmp_name'] : '';
		$thumb_name = (isset($_FILES['thumb_name']['name'])) ? $_FILES['thumb_name']['name'] : '';

		if (isset($_FILES['thumb_name']['error']) && $_FILES['thumb_name']['error'] && $thumb_name)
		{
			trigger_error($user->lang['DL_UPLOAD_ERROR'], E_USER_ERROR);
		}

		if ($thumb_name)
		{
			$pic_size = @getimagesize($thumb_temp);
			$pic_width = $pic_size[0];
			$pic_height = $pic_size[1];

			if (!$pic_width || !$pic_height)
			{
				trigger_error($user->lang['DL_UPLOAD_ERROR'], E_USER_ERROR);
			}

			if ($pic_width > $dl_config['thumb_xsize'] || $pic_height > $dl_config['thumb_ysize'] || (sprintf("%u", @filesize($thumb_temp) > $dl_config['thumb_fsize'])))
			{
				trigger_error($user->lang['DL_THUMB_TO_BIG'], E_USER_ERROR);
			}
		}
	}

	if (!$file_extern)
	{
		$file_size = (isset($_FILES['dl_name']['size'])) ? $_FILES['dl_name']['size'] : '';
		$file_temp = (isset($_FILES['dl_name']['tmp_name'])) ? $_FILES['dl_name']['tmp_name'] : '';
		$file_name = (isset($_FILES['dl_name']['name'])) ? $_FILES['dl_name']['name'] : '';

		if (isset($_FILES['dl_name']['error']) && $_FILES['dl_name']['error'])
		{
			trigger_error($user->lang['DL_UPLOAD_ERROR'], E_USER_ERROR);
		}

		if (!$file_name)
		{
			trigger_error($user->lang['DL_NO_FILENAME_ENTERED'], E_USER_ERROR);
		}

		$extention = str_replace('.', '', trim(strrchr(strtolower($file_name), '.')));
		$ext_blacklist = $dl_mod->get_ext_blacklist();

		if (in_array($extention, $ext_blacklist))
		{
			trigger_error($user->lang['DL_FORBIDDEN_EXTENTION'], E_USER_ERROR);
		}

		if ($user->data['is_registered'])
		{
			$remain_traffic = $dl_config['overall_traffic'] - $dl_config['remain_traffic'];
		}
		else
		{
			$remain_traffic = $dl_config['overall_guest_traffic'] - $dl_config['remain_guest_traffic'];
		}

		if($file_size == 0 || ($file_size > $remain_traffic && $dl_config['upload_traffic_count']))
		{
			trigger_error($user->lang['DL_NO_UPLOAD_TRAFFIC'], E_USER_ERROR);
		}

		$dl_path = $index[$cat_id]['cat_path'];

		$real_file = md5($file_name);

		$i = 0;
		while(@file_exists($dl_config['dl_path'] . $dl_path . $real_file))
		{
			$j = ($i == 0) ? '' : $i.'_';
			$real_file = $j . $real_file;
			$i++;
		}
	}
	else
	{
		if (empty($file_name_name))
		{
			trigger_error($user->lang['DL_NO_EXTERNAL_URL'], E_USER_ERROR);
		}

		$file_name = $file_name_name;
		$file_size = 0;
		$real_file = '';
	}

	if($cat_id)
	{
		$current_time = time();
		$current_user = $user->data['user_id'];

		$approve = ($index[$cat_id]['must_approve'] && !$cat_auth['auth_mod'] && !$index[$cat_id]['auth_mod'] && !($auth->acl_get('a_') && $user->data['is_registered'])) ? 0 : $approve;

		unset($sql_array);

		$sql_array = array(
				'file_name'				=> $file_name,
				'real_file'				=> $real_file,
				'cat'					=> $cat_id,
				'description'			=> $description,
				'long_desc'				=> $long_desc,
				'free'					=> $file_free,
				'extern'				=> $file_extern,
				'desc_uid'				=> $desc_uid,
				'desc_bitfield'			=> $desc_bitfield,
				'desc_flags'			=> $desc_flags,
				'long_desc_uid'			=> $long_desc_uid,
				'long_desc_bitfield'	=> $long_desc_bitfield,
				'long_desc_flags'		=> $long_desc_flags,
				'hacklist'				=> $hacklist,
				'hack_author'			=> $hack_author,
				'hack_author_email'		=> $hack_author_email,
				'hack_author_website'	=> $hack_author_website,
				'hack_version'			=> $hack_version,
				'hack_dl_url'			=> $hack_dl_url,
				'todo'					=> $todo,
				'approve'				=> $approve,
				'file_size'				=> $file_size,
				'change_time'			=> $current_time,
				'add_time'				=> $current_time,
				'change_user'			=> $current_user,
				'add_user'				=> $current_user,
				'file_traffic'			=> $file_traffic);

		if (!$cat_auth['auth_mod'] && !$index[$cat_id]['auth_mod'] && !$index[$cat_id]['allow_mod_desc'] && !($auth->acl_get('a_') && $user->data['is_registered']))
		{
			$sql = 'INSERT INTO ' . DOWNLOADS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_array);
		}
		else
		{
			$sql_array = array_merge($sql_array, array(
				'test'					=> $test,
				'req'					=> $require,
				'warning'				=> $warning,
				'mod_desc'				=> $mod_desc,
				'mod_list'				=> $mod_list,
				'mod_desc_uid'			=> $mod_desc_uid,
				'mod_desc_bitfield'		=> $mod_desc_bitfield,
				'mod_desc_flags'		=> $mod_desc_flags,
				'warn_uid'				=> $warn_uid,
				'warn_bitfield'			=> $warn_bitfield,
				'warn_flags'			=> $warn_flags));

			$sql = 'INSERT INTO ' . DOWNLOADS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_array);
		}

		$db->sql_query($sql);

		if (!$file_extern)
		{
			$move_file($file_temp, $dl_config['dl_path'] . $dl_path . $real_file);

			@chmod($dl_config['dl_path'] . $dl_path . $real_file, 0777);
		}

		$next_id = $db->sql_nextid();

		if (isset($thumb_name))
		{
			$move_file($thumb_temp, $phpbb_root_path . 'dl_mod/thumbs/' . $next_id . '_' . $thumb_name);

			@chmod($phpbb_root_path . 'dl_mod/thumbs/' . $next_id . '_' . $thumb_name, 0777);

			$thumb_message = '<br />' . $user->lang['DL_THUMB_UPLOAD'];

			$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'thumbnail' => $next_id . '_' . $thumb_name)) . " WHERE id = $next_id";
			$db->sql_query($sql);
		}
		else
		{
			$thumb_message = '';
		}
	
		if ($index[$cat_id]['statistics'])
		{
			if ($index[$cat_id]['stats_prune'])
			{
				$stat_prune = $dl_mod->dl_prune_stats($cat_id, $index[$cat_id]['stats_prune']);
			}

			$browser = $dl_mod->dl_client();

			$sql = 'INSERT INTO ' . DL_STATS_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'cat_id'		=> $cat_id,
				'id'			=> $next_id,
				'user_id'		=> $user->data['user_id'],
				'username'		=> $user->data['username'],
				'traffic'		=> $file_size,
				'direction'		=> 1,
				'user_ip'		=> $user->data['session_ip'],
				'browser'		=> $browser,
				'time_stamp'	=> time()));
			$db->sql_query($sql);
		}

		if ($approve)
		{
			$processing_user = $dl_mod->dl_auth_users($cat_id, 'auth_dl');
			if ($processing_user == '')
			{
				$processing_user = array(0);
			}

			$email_template = 'downloads_new_notify';

			$sql = 'SELECT user_email, username, user_lang FROM ' . USERS_TABLE . '
				WHERE user_allow_new_download_email = 1
					AND ' . $db->sql_in_set('user_id', explode(',', $processing_user));

			$dl_mod->gen_dl_topic($next_id);
		}
		else
		{
			$processing_user = $dl_mod->dl_auth_users($cat_id, 'auth_mod');
			if ($processing_user == '')
			{
				$processing_user = array(0);
			}

			$email_template = 'downloads_approve_notify';

			$sql = 'SELECT user_email, username, user_lang FROM ' . USERS_TABLE . '
				WHERE user_allow_new_download_email = 1
					AND (' . $db->sql_in_set('user_id', explode(',', $processing_user)) . '
					OR user_type = ' . USER_FOUNDER . ')';
		}

		if (!$dl_config['disable_email'] && !$send_notify)
		{
			$result = $db->sql_query($sql);

			include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
			$messenger = new messenger();

			while ($row = $db->sql_fetchrow($result))
			{
				$messenger->template($email_template, $row['user_lang']);
				
				$messenger->to($row['user_email'], $row['username']);
				
				$messenger->assign_vars(array(
					'SITENAME'		=> $config['sitename'],
					'BOARD_EMAIL'	=> $config['board_email_sig'],
					'USERNAME'		=> htmlspecialchars_decode($row['username']),
					'DOWNLOAD'		=> htmlspecialchars_decode($description),
					'DESCRIPTION'	=> htmlspecialchars_decode($long_desc),
					'CATEGORY'		=> htmlspecialchars_decode(str_replace("&nbsp;&nbsp;|___&nbsp;", '', $index[$cat_id]['cat_name'])),
					'U_APPROVE'		=> generate_board_url() . "/downloads.$phpEx?view=modcp&action=approve",
					'U_CATEGORY'	=> generate_board_url() . "/downloads.$phpEx?cat=$cat_id",
				));
				
				$messenger->send(NOTIFY_EMAIL);
			}

			$db->sql_freeresult($result);
			$messenger->save_queue();	
		}
			
		if (!$dl_config['disable_popup'] && !$disable_popup_notify && !$approve)
		{
			$sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'user_new_download' => 1)) . ' 
					WHERE user_allow_new_download_popup = 1
					AND ' . $db->sql_in_set('user_id', explode(',', $processing_user));
			$db->sql_query($sql);
		}

		if ($dl_config['upload_traffic_count'] && !$file_extern)
		{
			$dl_config['remain_traffic'] += $file_size;

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => $dl_config['remain_traffic'])) . " WHERE config_name = 'remain_traffic'";
			$db->sql_query($sql);
		}
		
		$approve_message = ($approve) ? '' : '<br />' . $user->lang['DL_MUST_BE_APPROVED'];

		$message = $user->lang['DOWNLOAD_ADDED'] . $thumb_message . $approve_message . '<br /><br />' . sprintf($user->lang['CLICK_RETURN_DOWNLOADS'], "<a href=\"" . append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$cat_id") . "\">", "</a>");

		meta_refresh(3, append_sid("downloads.$phpEx?cat=$cat_id"));

		trigger_error($message);
	}
}

$template->set_filenames(array(
	'body' => 'dl_mod/dl_edit_body.html')
);

$bg_row = 0;

if ($cat_auth['auth_mod'] || $index[$cat_id]['auth_mod'] || ($auth->acl_get('a_') && $user->data['is_registered']))
{
	$template->assign_var('S_MODCP', true);
	$bg_row = 1;
}

if (!$dl_config['disable_email'])
{
	$template->assign_var('S_EMAIL_BLOCK', true);
	$bg_row = 1;
}

if (!$dl_config['disable_popup'] && $dl_config['disable_popup_notify'])
{
	$template->assign_var('S_POPUP_NOTIFY', true);
	$bg_row = 1;
}

if ($index[$cat_id]['allow_thumbs'] && $dl_config['thumb_fsize'])
{
	$template->assign_var('S_ALLOW_THUMBS', true);
}

if ($dl_config['use_hacklist'] && $auth->acl_get('a_') && $user->data['is_registered'])
{
	$template->assign_var('S_USE_HACKLIST', true);
	$hacklist_on = ($bg_row) ? true : 0;
	$bg_row = 1 - $bg_row;
}

if ($index[$cat_id]['allow_mod_desc'])
{
	$template->assign_var('S_ALLOW_EDIT_MOD_DESC', true);
	$mod_block_bg = ($bg_row) ? true : 0;
}

if ($dl_config['upload_traffic_count'])
{
	$template->assign_var('S_UPLOAD_TRAFFIC', true);
}

$s_cat_select = '<select name="cat_id">';
$s_cat_select .= $dl_mod->dl_dropdown(0, 0, $cat_id, 'auth_up');
$s_cat_select .= '</select>';

$thumbnail_explain = sprintf($user->lang['DL_THUMB_DIM_SIZE'], $dl_config['thumb_xsize'], $dl_config['thumb_ysize'], $dl_mod->dl_size($dl_config['thumb_fsize']));

$s_hidden_fields = array();

if (!$cat_auth['auth_mod'] && !$index[$cat_id]['auth_mod'] && !($auth->acl_get('a_') && $user->data['is_registered']))
{
	$approve = ($index[$cat_id]['must_approve']) ? 0 : TRUE;
	$s_hidden_fields = array_merge($s_hidden_fields, array('approve' => $approve));
}

if ($dl_config['disable_email'])
{
	$s_hidden_fields = array_merge($s_hidden_fields, array('send_notify' => 0));
}

$ext_blacklist = $dl_mod->get_ext_blacklist();
if (sizeof($ext_blacklist))
{
	$blacklist_explain = '<br />' . sprintf($user->lang['DL_FORBIDDEN_EXT_EXPLAIN'], implode(', ', $ext_blacklist));
}
else
{
	$blacklist_explain = '';
}

$s_check_free = '<select name="file_free">';
$s_check_free .= '<option value="0">' . $user->lang['NO'] . '</option>';
$s_check_free .= '<option value="1">' . $user->lang['YES'] . '</option>';
$s_check_free .= '<option value="2">' . $user->lang['DL_IS_FREE_REG'] . '</option>';
$s_check_free .= '</select>';

$s_traffic_range = '<select name="file_traffic_range">';
$s_traffic_range .= '<option value="KB">' . $user->lang['DL_KB'] . '</option>';
$s_traffic_range .= '<option value="MB">' . $user->lang['DL_MB'] . '</option>';
$s_traffic_range .= '<option value="GB">' . $user->lang['DL_GB'] . '</option>';
$s_traffic_range .= '</select>';

$s_hacklist = '<select name="hacklist">';
$s_hacklist .= '<option value="0">' . $user->lang['NO'] . '</option>';
$s_hacklist .= '<option value="1">' . $user->lang['YES'] . '</option>';
$s_hacklist .= '<option value="2">' . $user->lang['DL_MOD_LIST'] . '</option>';
$s_hacklist .= '</select>';

$template->assign_var('S_CAT_CHOOSE', true);

$template->assign_vars(array(
	'L_DL_FILES_TITLE'			=> $user->lang['DL_UPLOAD'],
	'L_DL_NAME'					=> $user->lang['DL_NAME'],
	'L_DL_CAT_NAME'				=> $user->lang['DL_CAT_NAME'],
	'L_DL_DESCRIPTION'			=> $user->lang['DL_FILE_DESCRIPTION'],
	'L_LINK_URL'				=> $user->lang['DL_FILES_URL'],
	'L_DL_EXTERN'				=> $user->lang['DL_EXTERN'],
	'L_DL_IS_FREE'				=> $user->lang['DL_IS_FREE'],
	'L_DL_TRAFFIC'				=> $user->lang['DL_TRAFFIC'],
	'L_DL_APPROVE'				=> $user->lang['DL_APPROVE'],
	'L_DL_MOD_DESC'				=> $user->lang['DL_MOD_DESC'],
	'L_DL_MOD_LIST'				=> $user->lang['DL_MOD_LIST'],
	'L_DL_MOD_REQUIRE'			=> $user->lang['DL_MOD_REQUIRE'],
	'L_DL_MOD_TEST'				=> $user->lang['DL_MOD_TEST'],
	'L_DL_MOD_TODO'				=> $user->lang['DL_MOD_TODO'],
	'L_DL_MOD_WARNING'			=> $user->lang['DL_MOD_WARNING'],
	'L_DL_UPLOAD_FILE'			=> $user->lang['DL_UPLOAD_FILE'],
	'L_DL_SEND_NOTIFY'			=> $user->lang['DL_DISABLE_EMAIL'],
	'L_DL_THUMBNAIL'			=> $user->lang['DL_THUMB'],
	'L_DL_THUMBNAIL_SECOND'		=> $thumbnail_explain,
	'L_DL_HACK_AUTHOR'			=> $user->lang['DL_HACK_AUTOR'],
	'L_DL_HACK_AUTHOR_EMAIL'	=> $user->lang['DL_HACK_AUTOR_EMAIL'],
	'L_DL_HACK_AUTHOR_WEBSITE'	=> $user->lang['DL_HACK_AUTOR_WEBSITE'],
	'L_DL_HACK_DL_URL'			=> $user->lang['DL_HACK_DL_URL'],
	'L_DL_HACK_VERSION'			=> $user->lang['DL_HACK_VERSION'],
	'L_DL_HACKLIST'				=> $user->lang['DL_HACKLIST'],
	'L_EXT_BLACKLIST'			=> $blacklist_explain,
	'L_DISABLE_POPUP'			=> $user->lang['DL_DISABLE_POPUP'],
	'L_DL_UPLOAD_TRAFFIC_COUNT'	=> $user->lang['DL_UPLOAD_TRAFFIC'],

	'L_DL_NAME_EXPLAIN'					=> 'DL_NAME',
	'L_DL_APPROVE_EXPLAIN'				=> 'DL_APPROVE',
	'L_DL_CAT_NAME_EXPLAIN'				=> 'DL_CHOOSE_CATEGORY',
	'L_DL_DESCRIPTION_EXPLAIN'			=> 'DL_FILE_DESCRIPTION',
	'L_DL_EXTERN_EXPLAIN'				=> 'DL_EXTERN_UP',
	'L_DL_HACK_AUTHOR_EXPLAIN'			=> 'DL_HACK_AUTOR',
	'L_DL_HACK_AUTHOR_EMAIL_EXPLAIN'	=> 'DL_HACK_AUTOR_EMAIL',
	'L_DL_HACK_AUTHOR_WEBSITE_EXPLAIN'	=> 'DL_HACK_AUTOR_WEBSITE',
	'L_DL_HACK_DL_URL_EXPLAIN'			=> 'DL_HACK_DL_URL',
	'L_DL_HACK_VERSION_EXPLAIN'			=> 'DL_HACK_VERSION',
	'L_DL_HACKLIST_EXPLAIN'				=> 'DL_HACKLIST',
	'L_DL_IS_FREE_EXPLAIN'				=> 'DL_IS_FREE',
	'L_DL_MOD_DESC_EXPLAIN'				=> 'DL_MOD_DESC',
	'L_DL_MOD_LIST_EXPLAIN'				=> 'DL_MOD_LIST',
	'L_DL_MOD_REQUIRE_EXPLAIN'			=> 'DL_MOD_REQUIRE',
	'L_DL_MOD_TEST_EXPLAIN'				=> 'DL_MOD_TEST',
	'L_DL_MOD_TODO_EXPLAIN'				=> 'DL_MOD_TODO',
	'L_DL_MOD_WARNING_EXPLAIN'			=> 'DL_MOD_WARNING',
	'L_DL_TRAFFIC_EXPLAIN'				=> 'DL_TRAFFIC',
	'L_DL_UPLOAD_FILE_EXPLAIN'			=> 'DL_UPLOAD_FILE',
	'L_DL_THUMBNAIL_EXPLAIN'			=> 'DL_THUMB',
	'L_CHANGE_TIME_EXPLAIN'				=> 'DL_NO_CHANGE_EDIT_TIME',
	'L_DISABLE_POPUP_EXPLAIN'			=> 'DL_DISABLE_POPUP',
	'L_DL_SEND_NOTIFY_EXPLAIN'			=> 'DL_DISABLE_EMAIL',

	'L_SUBMIT'	=> $user->lang['SUBMIT'],
	'L_RESET'	=> $user->lang['RESET'],
	'L_KB'		=> $user->lang['DL_KB'],
	'L_MB'		=> $user->lang['DL_MB'],
	'L_GB'		=> $user->lang['DL_GB'],

	'DESCRIPTION'			=> '',
	'SELECT_CAT'			=> $s_cat_select,
	'LONG_DESC'				=> '',
	'URL'					=> '',
	'CHECKEXTERN'			=> '',
	'TRAFFIC'				=> 0,
	'APPROVE'				=> 'checked="checked"',
	'MOD_DESC'				=> '',
	'MOD_LIST'				=> '',
	'MOD_REQUIRE'			=> '',
	'MOD_TEST'				=> '',
	'MOD_TODO'				=> '',
	'MOD_WARNING'			=> '',

	'HACKLIST_BG'			=> (isset($hacklist_on) && $hacklist_on) ? ' bg2' : '',
	'MOD_BLOCK_BG'			=> (isset($mod_block_bg) && $mod_block_bg) ? ' bg2' : '',

	'MAX_UPLOAD_SIZE'		=> sprintf($user->lang['DL_UPLOAD_MAX_FILESIZE'], ini_get('upload_max_filesize')),

	'ENCTYPE'	=> 'enctype="multipart/form-data"',

	'S_CHECK_FREE'			=> $s_check_free,
	'S_TRAFFIC_RANGE'		=> $s_traffic_range,
	'S_HACKLIST'			=> $s_hacklist,
	'S_DOWNLOADS_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=upload"),
	'S_HIDDEN_FIELDS'		=> build_hidden_fields($s_hidden_fields))
);

?>