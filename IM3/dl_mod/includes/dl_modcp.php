<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_modcp.php 18 2009/09/17 OXPUS
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
* And now the different work from here
*/  
if ($action == 'save' && $submit)
{	
	$approve			= request_var('approve', 0);
	$description		= utf8_normalize_nfc(request_var('description', '', true));
	$file_traffic		= request_var('file_traffic', 0);
	$file_traffic_range	= request_var('file_traffic_range', 'KB');
	$long_desc			= utf8_normalize_nfc(request_var('long_desc', '', true));
	$file_name			= utf8_normalize_nfc(request_var('file_name', '', true));

	$file_free		= request_var('file_free', 0);
	$file_extern	= request_var('file_extern', 0);

	$test		= utf8_normalize_nfc(request_var('test', '', true));
	$require	= utf8_normalize_nfc(request_var('require', '', true));
	$todo		= utf8_normalize_nfc(request_var('todo', '', true));
	$warning	= utf8_normalize_nfc(request_var('warning', '', true));
	$mod_desc	= utf8_normalize_nfc(request_var('mod_desc', '', true));
	$mod_list	= request_var('mod_list', 0);
	$mod_list	= ($mod_list) ? 1 : 0;

	$send_notify			= request_var('send_notify', 0);
	$disable_popup_notify	= request_var('disable_popup_notify', 0);
	$change_time			= request_var('change_time', 0);
	$del_thumb				= request_var('del_thumb', 0);
	$click_reset			= request_var('click_reset', 0);

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

	$dl_file = array();
	$dl_file = $dl_mod->all_files(0, 0, 'ASC', 0, $df_id, true, '*');

	$real_file_old	= $dl_file['real_file'];
	$file_name_old	= $dl_file['file_name'];
	$file_size_old	= $dl_file['file_size'];
	$file_cat_old	= $dl_file['cat'];

	if ($dl_config['thumb_fsize'] && $index[$cat_id]['allow_thumbs'] && !$del_thumb)
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
			$pic_size 	= @getimagesize($thumb_temp);
			$pic_width	= $pic_size[0];
			$pic_height	= $pic_size[1];

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

		$extention		= str_replace('.', '', trim(strrchr(strtolower($file_name), '.')));
		$ext_blacklist	= $dl_mod->get_ext_blacklist();

		if (in_array($extention, $ext_blacklist))
		{
			trigger_error($user->lang['DL_FORBIDDEN_EXTENTION'], E_USER_ERROR);
		}

		if ($file_name)
		{
			if (isset($_FILES['dl_name']['error']) && $_FILES['dl_name']['error'])
			{
				trigger_error($user->lang['DL_UPLOAD_ERROR'], E_USER_ERROR);
			}

			$remain_traffic = $dl_config['overall_traffic'] - $dl_config['remain_traffic'];
			if(!$file_size || ($file_size > $remain_traffic && $dl_config['upload_traffic_count']))
			{
				trigger_error($user->lang['DL_NO_UPLOAD_TRAFFIC'], E_USER_ERROR);
			}
	
			$dl_path = $index[$cat_id]['cat_path'];
	
			@unlink($dl_config['dl_path'] . $dl_path . $real_file_old);

			$real_file_new = md5($file_name);

			$i = 0;
			while(@file_exists($dl_config['dl_path'] . $dl_path . $real_file_new));
			{
				$j = ($i == 0) ? '' : $i;
				$real_file_new = $j . $real_file_new;
				$i++;
			}
	
			if ($index[$cat_id]['statistics'])
			{
				if ($index[$cat_id]['stats_prune'])
				{
					$stat_prune = $dl_mod->dl_prune_stats($cat_id, $index[$cat_id]['stats_prune']);
				}

				$browser = $dl_mod->dl_client();

				$sql = 'INSERT INTO ' . DL_STATS_TABLE . ' ' . $db->sql_build_array('INSERT', array(
					'cat_id'		=> $new_cat,
					'id'			=> $df_id,
					'user_id'		=> $user->data['user_id'],
					'username'		=> $user->data['username'],
					'traffic'		=> $file_size,
					'direction'		=> 2,
					'user_ip'		=> $user->data['session_ip'],
					'browser'		=> $browser,
					'time_stamp'	=> time()));
				$db->sql_query($sql);
			}
		}
		else
		{
			$real_file_new = $real_file_old;
		}
	}
	else
	{
		$file_size = 0;
		$real_file_new = '';
	}

	if (!$file_name)
	{
		$file_name = $file_name_old;
		$file_size = $file_size_old;
	}

	if($df_id && $new_cat)
	{
		unset($sql_array);

		$sql_array = array(
			'description'			=> $description,
			'file_traffic'			=> $file_traffic,
			'long_desc'				=> $long_desc,
			'file_name'				=> $file_name,
			'real_file'				=> $real_file_new,
			'free'					=> $file_free,
			'extern'				=> $file_extern,
			'cat'					=> $new_cat,
			'desc_uid'				=> $desc_uid,
			'desc_bitfield'			=> $desc_bitfield,
			'desc_flags'			=> $desc_flags,
			'long_desc_uid'			=> $long_desc_uid,
			'long_desc_bitfield'	=> $long_desc_bitfield,
			'long_desc_flags'		=> $long_desc_flags,
			'approve'				=> $approve,
			'hacklist'				=> $hacklist,
			'hack_author'			=> $hack_author,
			'hack_author_email'		=> $hack_author_email,
			'hack_author_website'	=> $hack_author_website,
			'hack_version'			=> $hack_version,
			'hack_dl_url'			=> $hack_dl_url,
			'todo'					=> $todo,
			'file_size'				=> $file_size);

		if (!$change_time)
		{
			$sql_array = array_merge($sql_array, array(
				'change_time'	=> time(),
				'change_user'	=> $user->data['user_id']));
		}

		if ($click_reset)
		{
			$sql_array = array_merge($sql_array, array(
				'klicks' => 0));
		}
		if ($index[$cat_id]['allow_mod_desc'] || ($auth->acl_get('a_') && $user->data['is_registered']))
		{
			$sql_array = array_merge($sql_array, array(
				'test'				=> $test,
				'req'				=> $require,
				'warning'			=> $warning,
				'mod_desc'			=> $mod_desc,
				'mod_list'			=> $mod_list,
				'mod_desc_uid'		=> $mod_desc_uid,
				'mod_desc_bitfield'	=> $mod_desc_bitfield,
				'mod_desc_flags'	=> $mod_desc_flags,
				'warn_uid'			=> $warn_uid,
				'warn_bitfield'		=> $warn_bitfield,
				'warn_flags'		=> $warn_flags));
		}

		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_array) . " WHERE id = $df_id";
		$db->sql_query($sql);

		if ($description <> $dl_file['description'])
		{
			$dl_mod->update_topic($dl_file['dl_topic'], $df_id);
		}
	
		/*
		* Check file handling method
		*/
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

		if (!$file_extern && $file_name)
		{
			@$move_file($file_temp, $dl_config['dl_path'] . $dl_path . $real_file_new);

			@chmod($dl_config['dl_path'] . $dl_path . $real_file_new, 0777);
		}

		if ($approve)
		{
			$processing_user	= $dl_mod->dl_auth_users($cat_id, 'auth_view');
			$email_template		= 'downloads_change_notify';

			$dl_mod->gen_dl_topic($df_id);
		}
		else
		{
			$processing_user	= $dl_mod->dl_auth_users($cat_id, 'auth_mod');
			$email_template		= 'downloads_approve_notify';
		}

		$processing_user = ($processing_user == '') ? 0 : '';

		$sql = 'SELECT fav_user_id FROM ' . DL_FAVORITES_TABLE . '
			WHERE fav_dl_id = ' . (int) $df_id;
		$result = $db->sql_query($sql);

		$fav_user = array();

		while ($row = $db->sql_fetchrow($result))
		{
			$fav_user[] = $row['fav_user_id'];
		}

		$db->sql_freeresult($result);

		$sql_fav_user = (sizeof($fav_user)) ? ' AND ' . $db->sql_in_set('user_id', $fav_user) : '';

		if (!$dl_config['disable_email'] && !$send_notify && $sql_fav_user)
		{
			$sql = 'SELECT user_email, username, user_lang FROM ' . USERS_TABLE . "
				WHERE user_allow_fav_download_email = 1
					$sql_fav_user
					AND (" . $db->sql_in_set('user_id', explode(',', $processing_user)) . '
						OR user_type = ' . USER_FOUNDER . ')';
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

			$messenger->save_queue();
		}

		if (!$dl_config['disable_popup'] && !$disable_popup_notify)
		{
			$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_new_download = 1
				WHERE user_allow_fav_download_popup = 1
					$sql_fav_user
					AND " . $db->sql_in_set('user_id', explode(',', $processing_user));
			$db->sql_query($sql);
		}

		if ($dl_config['upload_traffic_count'] && !$file_extern)
		{
			$dl_config['remain_traffic'] += $file_size;

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => $dl_config['remain_traffic'])) . " WHERE config_name = 'remain_traffic'";
			$db->sql_query($sql);
		}

		if (isset($thumb_name) && $thumb_name != '')
		{
			@unlink($phpbb_root_path . 'dl_mod/thumbs/' . $dl_file['thumbnail']);
			@unlink($phpbb_root_path . 'dl_mod/thumbs/' . $df_id . '_' . $thumb_name);
	
			$move_file($thumb_temp, $phpbb_root_path . 'dl_mod/thumbs/' . $df_id . '_' . $thumb_name);

			@chmod($phpbb_root_path . 'dl_mod/thumbs/' . $df_id . '_' . $thumb_name, 0777);

			$thumb_message = '<br />' . $user->lang['DL_THUMB_UPLOAD'];

			$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'thumbnail' => $df_id . '_' . $thumb_name)) . " WHERE id = $df_id";
			$db->sql_query($sql);
		}
		else if ($del_thumb)
		{
			$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'thumbnail' => '')) . " WHERE id = $df_id";
			$db->sql_query($sql);

			@unlink($phpbb_root_path . 'dl_mod/thumbs/' . $dl_file['thumbnail']);

			$thumb_message = '<br />'.$user->lang['DL_THUMB_DEL'];
		}
		else
		{
			$thumb_message = '';
		}

		if ($file_cat_old <> $new_cat && !$file_extern && !$file_temp)
		{
			$old_path = $index[$file_cat_old]['cat_path'];
			$new_path = $index[$new_cat]['cat_path'];

			if ($new_path != $old_path)
			{
				@copy($dl_config['dl_path'] . $old_path . $real_file_old, $dl_config['dl_path'] . $new_path . $real_file_new);
				@chmod($dl_config['dl_path'] . $new_path . $real_file_new, 0777);
				@unlink($dl_config['dl_path'] . $old_path . $real_file_old);
			}

			$sql = 'UPDATE ' . DL_STATS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'cat_id' => $new_cat)) . " WHERE id = $df_id";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_COMMENTS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'cat_id' => $new_cat)) . " WHERE id = $df_id";
			$db->sql_query($sql);
		}

		if ($own_edit)
		{
			$meta_url	= append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id");
			$message	= $user->lang['DOWNLOAD_UPDATED'] . $thumb_message . '<br /><br />' . sprintf($user->lang['CLICK_RETURN_DOWNLOAD_DETAILS'], "<a href=\"{$meta_url}\">", "</a>");
		}
		else
		{
			$meta_url		= append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=manage&amp;cat_id=$cat_id");
			$return_string	= ($action == 'approve') ? $user->lang['CLICK_RETURN_MODCP_APPROVE'] : $user->lang['CLICK_RETURN_MODCP_MANAGE'];
			$message		= $user->lang['DOWNLOAD_UPDATED'] . $thumb_message . '<br /><br />' . sprintf($return_string, "<a href=\"{$meta_url}\">", "</a>");
		}

		meta_refresh(3, $meta_url);

		trigger_error($message);
	}

	$action = 'manage';
}

if ($action == 'delete' && $cat_id)
{
	if (!empty($dl_id))
	{
		if (!$confirm)
		{
			if (sizeof($dl_id) == 1)
			{
				$dl_file	= array();
				$dl_file	= $dl_mod->all_files($cat_id, '', 'ASC', '', intval($dl_id[0]), true, '*');

				$description			= $dl_file['description'];
				$delete_confirm_text	= $user->lang['DL_CONFIRM_DELETE_SINGLE_FILE'];
			}
			else
			{
				$description			= count($dl_id);
				$delete_confirm_text	= $user->lang['DL_CONFIRM_DELETE_MULTIPLE_FILES'];
			}

			/*
			* output confirmation page
			*/
			page_header($user->lang['DL_DELETE_FILE_CONFIRM']);

			$template->set_filenames(array(
				'body' => 'dl_mod/dl_confirm_body.html')
			);

			$template->assign_var('S_DELETE_FILES_CONFIRM', true);

			$s_hidden_fields = array(
				'view'		=> 'modcp',
				'cat_id'	=> $cat_id,
				'df_id'		=> $df_id,
				'action'	=> 'delete',
				'confirm'	=> 1
			);
			
			foreach($dl_id as $cat_id => $value)
			{
				$s_hidden_fields = array_merge($s_hidden_fields, array('dlo_id[]' => $value));
			}

			$template->assign_vars(array(
				'MESSAGE_TITLE' => $user->lang['INFORMATION'],
				'MESSAGE_TEXT' => sprintf($delete_confirm_text, $description),

				'L_DELETE_FILE_TOO' => $user->lang['DL_DELETE_FILE_CONFIRM'],

				'L_YES' => $user->lang['YES'],
				'L_NO' => $user->lang['NO'],

				'S_CONFIRM_ACTION' => append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp"),
				'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
			);

			page_footer();
		}
		else
		{
			$dl_ids = array();

			for ($i = 0; $i < sizeof($dl_id); $i++)
			{
				$dl_ids[] = intval($dl_id[$i]);
			}

			$sql = 'SELECT c.path, d.real_file, d.thumbnail, d.dl_topic FROM ' . DL_CAT_TABLE . ' c, ' . DOWNLOADS_TABLE . " d
				WHERE c.id = $cat_id
					AND c.id = d.cat
					AND " . $db->sql_in_set('d.id', $dl_ids);
			$result = $db->sql_query($sql);

			$dl_topics = array();

			while ($row = $db->sql_fetchrow($result))
			{
				$path		= $row['path'];
				$real_file	= $row['real_file'];

				@unlink($phpbb_root_path . 'dl_mod/thumbs/' . $row['thumbnail']);

				if ($del_file)
				{
					@unlink($dl_config['dl_path'] . $path . $real_file);
				}

				if ($row['dl_topic'])
				{
					$dl_topics[] = $row['dl_topic'];
				}
			}
			$db->sql_freeresult($result);

			$sql = 'DELETE FROM ' . DOWNLOADS_TABLE . '
				WHERE ' . $db->sql_in_set('id', $dl_ids) . "
					AND cat = $cat_id";
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . DL_STATS_TABLE . '
				WHERE ' . $db->sql_in_set('id', $dl_ids) . "
					AND cat_id = $cat_id";
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . DL_COMMENTS_TABLE . '
				WHERE ' . $db->sql_in_set('id', $dl_ids) . "
					AND cat_id = $cat_id";
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . DL_NOTRAF_TABLE . '
				WHERE ' . $db->sql_in_set('dl_id', $dl_ids);
			$db->sql_query($sql);

			$dl_mod->delete_topic($dl_topics);
		}
	}

	$action = 'manage';
}

if ($action == 'cdelete')
{
	if (!empty($dl_id))
	{
		$dl_ids = array();

		for ($i = 0; $i < sizeof($dl_id); $i++)
		{
			$dl_ids[] = intval($dl_id[$i]);
		}

		$sql = 'DELETE FROM ' . DL_COMMENTS_TABLE . '
			WHERE ' . $db->sql_in_set('dl_id', $dl_ids);
		$db->sql_query($sql);
	}

	$dl_id = array();
	$action = 'capprove';
}

if ($action == 'edit')
{
	$dl_file = array();
	$dl_file = $dl_mod->all_files(0, '', 'ASC', '', $df_id, true, '*');

	$s_hidden_fields = array(
		'view'		=> 'modcp',
		'action'	=> 'save',
		'cat_id'	=> $cat_id,
		'df_id'		=> $df_id
	);

	$description			= $dl_file['description'];
	$file_traffic			= $dl_file['file_traffic'];
	$cat					= $dl_file['cat'];
	$long_desc				= $dl_file['long_desc'];
	$approve				= $dl_file['approve'];
	$hacklist				= $dl_file['hacklist'];
	$hack_author			= $dl_file['hack_author'];
	$hack_author_email		= $dl_file['hack_author_email'];
	$hack_author_website	= $dl_file['hack_author_website'];
	$hack_version			= $dl_file['hack_version'];
	$hack_dl_url			= $dl_file['hack_dl_url'];
	$mod_test				= $dl_file['test'];
	$require				= $dl_file['req'];
	$todo					= $dl_file['todo'];
	$warning				= $dl_file['warning'];
	$mod_desc				= $dl_file['mod_desc'];
	$mod_list				= ( $dl_file['mod_list'] ) ? 'checked="checked"' : '';

	$mod_desc_uid			= $dl_file['mod_desc_uid'];
	$mod_desc_flags			= $dl_file['mod_desc_flags'];
	$long_desc_uid			= $dl_file['long_desc_uid'];
	$long_desc_flags		= $dl_file['long_desc_flags'];
	$desc_uid				= $dl_file['desc_uid'];
	$desc_flags				= $dl_file['desc_flags'];
	$warn_uid				= $dl_file['warn_uid'];
	$warn_flags				= $dl_file['warn_flags'];
	
	$text_ary		= generate_text_for_edit($mod_desc, $mod_desc_uid, $mod_desc_flags);
	$mod_desc		= $text_ary['text'];
	$text_ary		= generate_text_for_edit($long_desc, $long_desc_uid, $long_desc_flags);
	$long_desc		= $text_ary['text'];
	$text_ary		= generate_text_for_edit($description, $desc_uid, $desc_flags);
	$description	= $text_ary['text'];
	$text_ary		= generate_text_for_edit($warning, $warn_uid, $warn_flags);
	$warning		= $text_ary['text'];

	if ($index[$cat_id]['allow_thumbs'] && $dl_config['thumb_fsize'])
	{
		$thumbnail			= $dl_file['thumbnail'];
		$thumbnail_explain	= sprintf($user->lang['DL_THUMB_DIM_SIZE'], $dl_config['thumb_xsize'], $dl_config['thumb_ysize'], $dl_mod->dl_size($dl_config['thumb_fsize']));
		$template->assign_var('S_ALLOW_THUMBS', true);

		if ($thumbnail)
		{
			$template->assign_var('S_THUMBNAIL', true);
			$thumbnail = $phpbb_root_path . 'dl_mod/thumbs/' . $thumbnail;
		}
		else
		{
			$thumbnail = '';
		}
	}
	else
	{
		$thumbnail_explain	= '';
		$thumbnail			= '';
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

	$data_range_select	= 'KB';
	$file_traffic_out	= $file_traffic;

	if ($file_traffic > 1023)
	{
		$file_traffic_out = number_format($file_traffic / 1024, 2);
	}
	if ($file_traffic > 1048575)
	{
		$file_traffic_out = number_format($file_traffic / 1048576, 2);
		$data_range_select = 'MB';
	}
	if ($file_traffic > 1073741823)
	{
		$file_traffic_out = number_format($file_traffic / 1073741824, 2);
		$data_range_select = 'GB';
	}

	$s_traffic_range	= str_replace('value="' . $data_range_select . '">', 'value="' . $data_range_select . '" selected="selected">', $s_traffic_range);
	$s_hacklist			= str_replace('value="' . $hacklist . '">', 'value="' . $hacklist . '" selected="selected">', $s_hacklist);
	$s_check_free		= str_replace('value="' . $dl_file['free'] . '">', 'value="' . $dl_file['free'] . '" selected="selected">', $s_check_free);

	if (!$own_edit)
	{
		$select_code = '<select name="new_cat">';
		$select_code .= $dl_mod->dl_dropdown(0, 0, $cat_id, 'auth_up');
		$select_code .= '</select>';

		$template->assign_var('S_CAT_CHOOSE', true);
	}
	else
	{
		$select_code = '';

		$s_hidden_fields = array_merge($s_hidden_fields, array('new_cat' => $cat_id));
	}

	if ($dl_file['extern'])
	{
		$checkextern = 'checked="checked"';
		$dl_extern_url = $dl_file['file_name'];
	}
	else
	{
		$checkextern = '';
		$dl_extern_url = '';
	}

	page_header($user->lang['DL_MODCP_EDIT']);

	$template->set_filenames(array(
		"body" => "dl_mod/dl_edit_body.html")
	);

	$template->assign_var('S_MODCP', true);

	if (!$dl_config['disable_email'])
	{
		$template->assign_var('S_EMAIL_BLOCK', true);
	}

	if (!$dl_config['disable_popup'])
	{
		$template->assign_var('S_CHANGE_TIME', true);

		if ($dl_config['disable_popup_notify'])
		{
			$template->assign_var('S_POPUP_NOTIFY', true);
		}
	}

	$template->assign_var('S_CLICK_RESET', true);

	$bg_row			= 1;
	$hacklist_on	= 0;
	$mod_block_bg	= 0;

	if ($dl_config['use_hacklist'])
	{
		$template->assign_var('S_USE_HACKLIST', true);
		$hacklist_on = true;
		$bg_row = 1 - $bg_row;
	}

	if ($index[$cat_id]['allow_mod_desc'])
	{
		$template->assign_var('S_ALLOW_EDIT_MOD_DESC', true);
		$mod_block_bg = ($bg_row) ? true : 0;
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

	$template->assign_vars(array(
		'L_DL_FILES_TITLE'					=> $user->lang['DL_FILES_TITLE'],
		'L_DL_NAME'							=> $user->lang['DL_NAME'],
		'L_DL_CAT_NAME'						=> $user->lang['DL_CAT_NAME'],
		'L_DL_DESCRIPTION'					=> $user->lang['DL_FILE_DESCRIPTION'],
		'L_LINK_URL'						=> $user->lang['DL_FILES_URL'],
		'L_DL_EXTERN'						=> $user->lang['DL_EXTERN'],
		'L_DL_IS_FREE'						=> $user->lang['DL_IS_FREE'],
		'L_DL_IS_FREE_REG'					=> $user->lang['DL_IS_FREE_REG'],
		'L_DL_TRAFFIC'						=> $user->lang['DL_TRAFFIC'],
		'L_DL_APPROVE'						=> $user->lang['DL_APPROVE'],
		'L_DL_MOD_DESC'						=> $user->lang['DL_MOD_DESC'],
		'L_DL_MOD_LIST'						=> $user->lang['DL_MOD_LIST'],
		'L_DL_MOD_REQUIRE'					=> $user->lang['DL_MOD_REQUIRE'],
		'L_DL_MOD_TEST'						=> $user->lang['DL_MOD_TEST'],
		'L_DL_MOD_TODO'						=> $user->lang['DL_MOD_TODO'],
		'L_DL_MOD_WARNING'					=> $user->lang['DL_MOD_WARNING'],
		'L_DL_SEND_NOTIFY'					=> $user->lang['DL_DISABLE_EMAIL'],
		'L_DL_UPLOAD_FILE'					=> $user->lang['DL_UPLOAD_FILE'],
		'L_DL_THUMBNAIL'					=> $user->lang['DL_THUMB'],
		'L_DL_THUMBNAIL_SECOND'				=> $thumbnail_explain,
		'L_DL_HACK_AUTHOR'					=> $user->lang['DL_HACK_AUTOR'],
		'L_DL_HACK_AUTHOR_EMAIL'			=> $user->lang['DL_HACK_AUTOR_EMAIL'],
		'L_DL_HACK_AUTHOR_WEBSITE'			=> $user->lang['DL_HACK_AUTOR_WEBSITE'],
		'L_DL_HACK_DL_URL'					=> $user->lang['DL_HACK_DL_URL'],
		'L_DL_HACK_VERSION'					=> $user->lang['DL_HACK_VERSION'],
		'L_DL_HACKLIST'						=> $user->lang['DL_HACKLIST'],
		'L_DISABLE_POPUP'					=> $user->lang['DL_DISABLE_POPUP'],
		'L_CHANGE_TIME'						=> $user->lang['DL_NO_CHANGE_EDIT_TIME'],
		'L_CLICK_RESET'						=> $user->lang['DL_KLICKS_RESET'],
		'L_EXT_BLACKLIST'					=> $blacklist_explain,
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
		'L_CLICK_RESET_EXPLAIN'				=> 'DL_KLICKS_RESET',

		'L_KB' => $user->lang['DL_KB'],
		'L_MB' => $user->lang['DL_MB'],
		'L_GB' => $user->lang['DL_GB'],

		'DESCRIPTION'			=> $description,
		'SELECT_CAT'			=> $select_code,
		'LONG_DESC'				=> $long_desc,
		'TRAFFIC'				=> $file_traffic,
		'APPROVE'				=> ($approve) ? 'checked="checked"' : '',
		'MOD_DESC'				=> $mod_desc,
		'MOD_LIST'				=> $mod_list,
		'MOD_REQUIRE'			=> $require,
		'MOD_TEST'				=> $mod_test,
		'MOD_TODO'				=> $todo,
		'MOD_WARNING'			=> $warning,
		'HACK_AUTHOR'			=> $hack_author,
		'HACK_AUTHOR_EMAIL'		=> $hack_author_email,
		'HACK_AUTHOR_WEBSITE'	=> $hack_author_website,
		'HACK_DL_URL'			=> $hack_dl_url,
		'HACK_VERSION'			=> $hack_version,
		'HACKLIST_EVER'			=> ($hacklist == 2) ? 'checked="checked"' : '',
		'HACKLIST_NO'			=> ($hacklist == 0) ? 'checked="checked"' : '',
		'HACKLIST_YES'			=> ($hacklist == 1) ? 'checked="checked"' : '',
		'THUMBNAIL'				=> $thumbnail,
		'URL'					=> $dl_extern_url,
		'CHECKEXTERN'			=> $checkextern,

		'HACKLIST_BG'	=> ($hacklist_on) ? ' bg2' : '',
		'MOD_BLOCK_BG'	=> ($mod_block_bg) ? ' bg2' : '',

		'MAX_UPLOAD_SIZE' => sprintf($user->lang['DL_UPLOAD_MAX_FILESIZE'], ini_get('upload_max_filesize')),

		'ENCTYPE' => 'enctype="multipart/form-data"',

		'S_CHECK_FREE'			=> $s_check_free,
		'S_TRAFFIC_RANGE'		=> $s_traffic_range,
		'S_HACKLIST'			=> $s_hacklist,
		'S_DOWNLOADS_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp"),
		'S_HIDDEN_FIELDS'		=> build_hidden_fields($s_hidden_fields))
	);
}

if ($action == 'move' && $new_cat && $cat_id)
{
	if (!empty($dl_id))
	{
		$new_path = $index[$new_cat]['cat_path'];

		for ($i = 0; $i < count($dl_id); $i++)
		{
			$sql = 'SELECT c.path, d.real_file FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
				WHERE d.cat = c.id
					AND d.id = ' . intval($dl_id[$i]) . "
					AND c.id = $cat_id
					AND d.extern = 0";
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);

			$old_path = $row['path'];
			$real_file = $row['real_file'];

			$db->sql_freeresult($result);

			if ($new_path != $old_path)
			{
				@copy($dl_config['dl_path'] . $old_path . $real_file, $dl_config['dl_path'] . $new_path . $real_file);
				@unlink($dl_config['dl_path'] . $old_path . $real_file);
			}
		}

		$dl_ids = array();

		for ($i = 0; $i < sizeof($dl_id); $i++)
		{
			$dl_ids[] = intval($dl_id[$i]);
		}

		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'cat' => $new_cat)) . ' WHERE ' . $db->sql_in_set('id', $dl_ids) . " AND cat = $cat_id";
		$db->sql_query($sql);

		$sql = "UPDATE " . DL_STATS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'cat_id' => $new_cat)) . ' WHERE ' . $db->sql_in_set('id', $dl_ids) . " AND cat_id = $cat_id";
		$db->sql_query($sql);

		$sql = "UPDATE " . DL_COMMENTS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'cat_id' => $new_cat)) . ' WHERE ' . $db->sql_in_set('id', $dl_ids) . " AND cat_id = $cat_id";
		$db->sql_query($sql);
	}

	$action = 'manage';
}

if ($action == 'lock')
{
	if (!empty($dl_id))
	{
		$dl_ids = array();

		for ($i = 0; $i < sizeof($dl_id); $i++)
		{
			$dl_ids[] = intval($dl_id[$i]);
		}

		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'approve' => 0)) . ' WHERE ' . $db->sql_in_set('id', $dl_ids);
		$db->sql_query($sql);
	}

	$action = 'manage';
}

if ($action == 'approve')
{
	if (!empty($dl_id))
	{
		$dl_ids = array();

		for ($i = 0; $i < sizeof($dl_id); $i++)
		{
			$dl_ids[] = intval($dl_id[$i]);
		}

		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'approve' => true)) . ' WHERE ' . $db->sql_in_set('id', $dl_ids);
		$db->sql_query($sql);

		if ($dl_mod->dl_config['enable_dl_topic'])
		{
			for ($i = 0; $i < sizeof($dl_id); $i++)
			{
				$dl_mod->gen_dl_topic(intval($dl_id[$i]));
			}
		}

		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}

	$sql_access_cats = ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND ' . $db->sql_in_set('cat', $access_cat);

	$sql = 'SELECT COUNT(id) AS total FROM ' . DOWNLOADS_TABLE . "
		WHERE approve = 0
			$sql_access_cats";
	$result = $db->sql_query($sql);
	$total_approve = $db->sql_fetchfield('total');
	$db->sql_freeresult($result);

	if (!$total_approve)
	{
		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}

	page_header($user->lang['DL_MODCP_APPROVE']);

	$template->set_filenames(array(
		'body' => 'dl_mod/dl_modcp_approve.html')
	);

	$sql = 'SELECT cat, id, description, desc_uid, desc_bitfield, desc_flags FROM ' . DOWNLOADS_TABLE . "
		WHERE approve = 0
			$sql_access_cats
		ORDER BY cat, description";
	$result = $db->sql_query_limit($sql, $dl_config['dl_links_per_page'], $start);

	while ($row = $db->sql_fetchrow($result))
	{
		$cat_id		= $row['cat'];
		$cat_name	= $index[$cat_id]['cat_name'];
		$cat_name	= str_replace('&nbsp;&nbsp;|', '', $cat_name);
		$cat_name	= str_replace('___&nbsp;', '', $cat_name);
		$cat_view	= $index[$cat_id]['nav_path'];

		$description	= $row['description'];
		$desc_uid		= $row['desc_uid'];
		$desc_bitfield	= $row['desc_bitfield'];
		$desc_flags		= $row['desc_flags'];
		$description	= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

		$file_id = $row['id'];

		$template->assign_block_vars('approve_row', array(
			'CAT_NAME'		=> $cat_name,
			'FILE_ID'		=> $file_id,
			'DESCRIPTION'	=> $description,
			'EDIT_IMG'		=> $user->lang['DL_EDIT_FILE'],

			'U_CAT_VIEW'	=> $cat_view,
			'U_EDIT'		=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=edit&amp;df_id=$file_id&amp;cat_id=$cat_id&amp;modcp=1"),
			'U_DOWNLOAD'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id&amp;modcp=1&amp;cat_id=$cat_id"))
		);
	}
	$db->sql_freeresult($result);

	$s_hidden_fields = array(
		'view'		=> 'modcp',
		'action'	=> 'approve',
		'cat_id'	=> $cat_id,
		'start'		=> $start
	);

	if ($total_approve > $dl_config['dl_links_per_page'])
	{
		$pagination = generate_pagination(append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=approve&amp;cat_id=$cat_id"), $total_approve, $dl_config['dl_links_per_page'], $start, true);
	}
	else
	{
		$pagination = '';
	}

	$template->assign_vars(array(
		'L_APPROVE'		=> $user->lang['DL_APPROVE'],
		'L_MARK_ALL'	=> $user->lang['DL_MARK_ALL'],
		'L_UNMARK_ALL'	=> $user->lang['DL_UNMARK'],
		'L_DL_CAT_NAME'	=> $user->lang['DL_CAT_NAME'],
		'L_DOWNLOAD'	=> $user->lang['DL_DOWNLOAD'],
		'L_SET'			=> $user->lang['OPTIONS'],
		'L_DELETE'		=> $user->lang['DL_DELETE'],
		'L_GOTO_PAGE'	=> $user->lang['GOTO_PAGE'],

		'PAGINATION'	=> $pagination,

		'S_DL_MODCP_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp"),
		'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields))
	);
}

if ($action == 'capprove')
{
	if (!empty($dl_id))
	{
		$dl_ids = array();

		for ($i = 0; $i < sizeof($dl_id); $i++)
		{
			$dl_ids[] = intval($dl_id[$i]);
		}

		$sql = 'UPDATE ' . DL_COMMENTS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'approve' => true)) . ' WHERE ' . $db->sql_in_set('dl_id', $dl_ids);
		$db->sql_query($sql);

		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}

	$sql_access_cats = ($auth->acl_get('a_') && $user->data['is_registered']) ? '' : ' AND ' . $db->sql_in_set('c.cat_id', $access_cat);

	$sql = 'SELECT COUNT(c.dl_id) AS total FROM ' . DL_COMMENTS_TABLE . " c
		WHERE c.approve = 0
			$sql_access_cats";
	$result = $db->sql_query($sql);
	$total_approve = $db->sql_fetchfield('total');
	$db->sql_freeresult($result);

	if (!$total_approve)
	{
		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}

	page_header($user->lang['DL_MODCP_CAPPROVE']);

	$template->set_filenames(array(
		'body' => 'dl_mod/dl_modcp_capprove.html')
	);

	$sql = 'SELECT d.cat, d.id, d.description, d.desc_uid, d.desc_bitfield, d.desc_flags, c.comment_text, c.com_uid, c.com_bitfield, c.com_flags, c.user_id, c.username, c.dl_id FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_COMMENTS_TABLE . " c
		WHERE d.id = c.id
			AND c.approve = 0
			$sql_access_cats
		ORDER BY d.cat, d.description";
	$result = $db->sql_query_limit($sql, $dl_config['dl_links_per_page'], $start);

	while ($row = $db->sql_fetchrow($result))
	{
		$cat_id		= $row['cat'];
		$cat_name	= $index[$cat_id]['cat_name'];
		$cat_name	= str_replace('&nbsp;&nbsp;|', '', $cat_name);
		$cat_name	= str_replace('___&nbsp;', '', $cat_name);
		$cat_view	= $index[$cat_id]['nav_path'];

		$description	= $row['description'];
		$desc_uid		= $row['desc_uid'];
		$desc_bitfield	= $row['desc_bitfield'];
		$desc_flags		= $row['desc_flags'];
		$description	= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

		$comment_text	= $row['comment_text'];
		$com_uid		= $row['com_uid'];
		$com_bitfield	= $row['com_bitfield'];
		$com_flags		= $row['com_flags'];
		$comment_text	= generate_text_for_display($comment_text, $com_uid, $com_bitfield, $com_flags);

		$file_id = $row['id'];

		$comment_id = $row['dl_id'];

		$comment_user_id	= $row['user_id'];
		$comment_username	= $row['username'];
		$comment_user_link	= ($comment_user_id <> ANONYMOUS) ? append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=$comment_user_id") : '';

		$template->assign_block_vars('approve_row', array(
			'CAT_NAME'			=> $cat_name,
			'FILE_ID'			=> $file_id,
			'DESCRIPTION'		=> $description,
			'COMMENT_USERNAME'	=> $comment_username,
			'COMMENT_TEXT'		=> $comment_text,
			'COMMENT_ID'		=> $comment_id,
			
			'EDIT_IMG' => $user->lang['DL_EDIT_FILE'],

			'U_CAT_VIEW'	=> $cat_view,
			'U_USER_LINK'	=> $comment_user_link,
			'U_EDIT'		=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=comment", "action=edit&amp;df_id=$file_id&amp;cat_id=$cat_id&amp;dl_id=$comment_id"),
			'U_DOWNLOAD'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id"))
		);
	}
	$db->sql_freeresult($result);

	$s_hidden_fields = array(
		'view'		=> 'modcp',
		'action'	=> 'capprove',
		'cat_id'	=> $cat_id,
		'start'		=> $start
	);

	if ($total_approve > $dl_config['dl_links_per_page'])
	{
		$pagination = generate_pagination(append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=capprove&amp;cat_id=$cat_id"), $total_approve, $dl_config['dl_links_per_page'], $start, true);
	}
	else
	{
		$pagination = '';
	}

	$template->assign_vars(array(
		'L_APPROVE'		=> $user->lang['DL_APPROVE'],
		'L_MARK_ALL'	=> $user->lang['DL_MARK_ALL'],
		'L_UNMARK_ALL'	=> $user->lang['DL_UNMARK'],
		'L_DL_CAT_NAME'	=> $user->lang['DL_CAT_NAME'],
		'L_DOWNLOAD'	=> $user->lang['DL_DOWNLOAD'],
		'L_COMMENT'		=> $user->lang['DL_COMMENT'],
		'L_SET'			=> $user->lang['OPTIONS'],
		'L_DELETE'		=> $user->lang['DL_DELETE'],
		'L_GOTO_PAGE'	=> $user->lang['GOTO_PAGE'],

		'PAGINATION'	=> $pagination,

		'S_DL_MODCP_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp"),
		'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields))
	);
}

if ($action == 'manage' && $cat_id)
{
	$total_downloads = $index[$cat_id]['total'];

	if ($sort && ($auth->acl_get('a_') && $user->data['is_registered']))
	{
		$per_page	= $total_downloads;
		$start		= 0;

		$template->assign_var('S_MODCP_BUTTON', true);
	}
	else
	{
		$per_page = $dl_config['dl_links_per_page'];

		if ($auth->acl_get('a_') && $user->data['is_registered'])
		{
			$template->assign_var('S_ORDER_BUTTON', true);
		}
	}

	if ($auth->acl_get('a_') && $user->data['is_registered'])
	{
		$template->assign_var('S_SORT_ASC', true);
	}

	if (!$total_downloads)
	{
		redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
	}

	page_header($user->lang['DL_MODCP_MANAGE']);

	$template->set_filenames(array(
		'body' => 'dl_mod/dl_modcp_manage.html')
	);

	$sql = 'SELECT id, description, desc_uid, desc_bitfield, desc_flags FROM ' . DOWNLOADS_TABLE . '
		WHERE approve = ' . true . "
			AND cat = $cat_id
		ORDER BY cat, sort";
	$result = $db->sql_query_limit($sql, $per_page, $start);

	while ($row = $db->sql_fetchrow($result))
	{
		$description	= $row['description'];
		$desc_uid		= $row['desc_uid'];
		$desc_bitfield	= $row['desc_bitfield'];
		$desc_flags		= $row['desc_flags'];

		$description	= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

		$file_id		= $row['id'];

		$mini_icon		= $dl_mod->mini_status_file($cat_id, $file_id);

		$template->assign_block_vars('manage_row', array(
			'FILE_ID'		=> $file_id,
			'MINI_ICON'		=> $mini_icon,
			'DESCRIPTION'	=> $description,
			'EDIT_IMG'		=> $user->lang['DL_EDIT_FILE'],

			'U_UP'			=> ($auth->acl_get('a_') && $user->data['is_registered']) ? append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=manage&amp;fmove=-1&amp;sort=1&amp;df_id=$file_id&amp;cat_id=$cat_id") : '',
			'U_DOWN'		=> ($auth->acl_get('a_') && $user->data['is_registered']) ? append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=manage&amp;fmove=1&amp;sort=1&amp;df_id=$file_id&amp;cat_id=$cat_id") : '',
			'U_EDIT'		=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=edit&amp;df_id=$file_id&amp;cat_id=$cat_id"),
			'U_DOWNLOAD'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$file_id"))
		);
	}
	$db->sql_freeresult($result);

	if (!isset($file_id))
	{
		$file_id = '';
	}

	$s_cat_select = '<select name="new_cat">';
	$s_cat_select .= $dl_mod->dl_dropdown(0, 0, $cat_id, 'auth_view');
	$s_cat_select .= '</select>';

	$s_hidden_fields = array(
		'view'		=> 'modcp',
		'action'	=> 'manage',
		'cat_id'	=> $cat_id,
		'start'		=> $start
	);

	$cat_name = $index[$cat_id]['cat_name'];
	$cat_name = str_replace('&nbsp;&nbsp;|', '', $cat_name);
	$cat_name = str_replace('___&nbsp;', '', $cat_name);

	if ($total_downloads > $per_page)
	{
		$pagination = generate_pagination(append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "cat_id=$cat_id"), $total_downloads, $per_page, $start, true);
	}
	else
	{
		$pagination = '';
	}

	$template->assign_vars(array(
		'L_SUBMIT'		=> $user->lang['SUBMIT'],
		'L_RESET'		=> $user->lang['RESET'],
		'L_MARK_ALL'	=> $user->lang['DL_MARK_ALL'],
		'L_UNMARK_ALL'	=> $user->lang['DL_UNMARK'],
		'L_MOVE'		=> $user->lang['DL_MOVE'],
		'L_DELETE'		=> $user->lang['DL_DELETE'],
		'L_LOCK'		=> $user->lang['DL_LOCK'],
		'L_DL_CAT_NAME'	=> $user->lang['DL_CAT_NAME'],
		'L_DOWNLOAD'	=> $user->lang['DL_DOWNLOAD'],
		'L_SET'			=> $user->lang['OPTIONS'],
		'L_DL_UP'		=> ($sort && ($auth->acl_get('a_') && $user->data['is_registered'])) ? $user->lang['DL_UP'] : '',
		'L_DL_DOWN'		=> ($sort && ($auth->acl_get('a_') && $user->data['is_registered'])) ? $user->lang['DL_DOWN'] : '',
		'L_DL_SORT'		=> $user->lang['DL_ORDER'],
		'L_DL_MODCP'	=> $user->lang['DL_MODCP_MANAGE'],
		'L_GOTO_PAGE'	=> $user->lang['GOTO_PAGE'],
		'L_DL_ABC'		=> ($auth->acl_get('a_') && $user->data['is_registered']) ? $user->lang['SORT_BY'].' ASC' : '',

		'PAGINATION'	=> $pagination,
		'SORT'			=> $sort,

		'U_SORT_ASC'		=> ($auth->acl_get('a_') && $user->data['is_registered']) ? append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=manage&amp;fmove=ABC&amp;sort=" . (($sort) ? 1 : '') . "&amp;df_id=$file_id&amp;cat_id=$cat_id") : '',
		'S_CAT_SELECT'		=> $s_cat_select,
		'S_DL_MODCP_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp"),
		'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields))
	);
}

?>