<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_admin_toolbox.php 5 2009/06/03 OXPUS
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

$files = (isset($_POST['files'])) ? $_POST['files'] : array();

if ($files && $file_assign)
{
	$file_names = $file_path = array();

	for ($i = 0; $i < count($files); $i++)
	{
		$temp = strpos($files[$i], '|');
		$files_path[] = substr($files[$i],0,$temp);
		$files_name[] = substr($files[$i],$temp+1);
	}

	if ($file_assign == 'del')
	{
		for ($i = 0; $i < sizeof($files); $i++)
		{
			$dl_dir = ($files_path[$i]) ? substr($dl_config['dl_path'], 0, strlen($dl_config['dl_path'])-1) : $dl_config['dl_path'];

			@unlink($dl_dir . $files_path[$i] . '/' . $files_name[$i]);
		
			$sql = 'DELETE FROM ' . DOWNLOADS_TABLE . "
				WHERE real_file = '" . $files_name[$i] . "'
					AND " . $db->sql_in_set('cat', $index, true);
			$db->sql_query($sql);

			add_log('admin', 'DL_LOG_FILE_DROP', $files_name[$i]);
		}
	}
	else
	{
		$dl_dir = substr($dl_config['dl_path'], 0, strlen($dl_config['dl_path'])-1);

		for ($i = 0; $i < sizeof($files); $i++)
		{
			$sql = 'SELECT path FROM ' . DL_CAT_TABLE . "
				WHERE id = $file_assign";
			$result = $db->sql_query($sql);
			$cat_path = $db->sql_fetchfield('path');
			$db->sql_freeresult($result);

			if ($cat_path != substr($files_path[$i], 1).'/')
			{
				@copy ($dl_dir . $files_path[$i] . '/' . $files_name[$i], $dl_config['dl_path'] . $cat_path . $files_name[$i]);
				@unlink($dl_dir . $files_path[$i] . '/' . $files_name[$i]);
			}

			$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'cat' => $file_assign)) . ' WHERE ' . $db->sql_in_set('cat', $index, true) . " AND real_file = '" . $files_name[$i] . "'";
			$db->sql_query($sql);

			add_log('admin', 'DL_LOG_FILE_ASS', $files_name[$i]);
		}
	}

	$file_action = $file_command = $new_path = '';
}

if (isset($index) && sizeof($index))
{
	$unas_files = $files_temp = array();

	$sql = 'SELECT description, real_file FROM ' . DOWNLOADS_TABLE . '
		WHERE ' . $db->sql_in_set('cat', $index, true);
	$result = $db->sql_query($sql);

	$total_unassigned_files = $db->sql_affectedrows($result);
	
	$i = 0;
	if ($action == 'unassigned')
	{
		while ($row = $db->sql_fetchrow($result))
		{
			$real_file = $row['real_file'];
			$file_desc = $row['description'];
			$unas_files[$i] = $real_file;
			$unas_files[$real_file] = $file_desc;
			$i++;
		}
	}

	$db->sql_freeresult($result);

	if ($action == 'unassigned' && sizeof($unas_files))
	{
		$read_files = $dl_mod->read_dl_files($dl_config['dl_path'], '', $unas_files);
		$read_files = substr($read_files, 0, strlen($read_files) - 1 );

		$files = split('[\|]', $read_files);

		for ($i = 0; $i < count($files); $i++)
		{
			$temp = strripos($files[$i], '/');
			$files_data[] = substr($files[$i],0,$temp).'|'.substr($files[$i],$temp+1);
		}		
	}
}

if ($action == 'check_file_sizes')
{
	$sql = 'SELECT dl.*, c.path FROM ' . DOWNLOADS_TABLE . ' dl, ' . DL_CAT_TABLE . ' c
		WHERE dl.cat = c.id
			AND dl.extern <> 1
		ORDER BY dl.id';
	$result = $db->sql_query($sql);

	$message = '';

	while ( $row = $db->sql_fetchrow($result) )
	{
		$file_size	= $row['file_size'];
		$file_desc	= $row['description'];
		$real_file	= $row['real_file'];
		$file_path	= $row['path'];
		$file_id	= $row['id'];

		$check_file_size = sprintf("%u", @filesize($dl_config['dl_path'] . $file_path . $real_file));
		if ( $check_file_size == 0 || $check_file_size == '' )
		{
			$message .= $file_desc.'<br />';
		}
		else if ($check_file_size <> $file_size)
		{
			$sql_new = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
					'file_size' => $check_file_size)) . " WHERE id = $file_id";
			$result = $db->sql_query($sql_new);
			
			if (!$result)
			{
				$message .= $file_desc.'<br />';
			}
		}
	}
	$action = '';

	if ( $message != '' )
	{
		$check_message = $user->lang['DL_CHECK_FILESIZES_RESULT_ERROR'] . '<br /><br />' . $message;
	}
	else
	{
		$check_message = $user->lang['DL_CHECK_FILESIZES_RESULT'];
	}

	$check_message .= "<br /><br />" . sprintf($user->lang['CLICK_RETURN_FILE_MANAGEMENT'], "<a href=\"{$basic_link}\">", "</a>") . adm_back_link($this->u_action);

	add_log('admin', 'DL_LOG_FILES_CHECK');

	if ($message)
	{
		trigger_error($check_message, E_USER_WARNING);
	}
	else
	{
		trigger_error($check_message);
	}
}

if ($action == 'check_thumbnails')
{
	$thumbs = (isset($_POST['thumb'])) ? $_POST['thumb'] : array();

	if (isset($_POST['del_real_thumbs']))
	{
		for ($i = 0; $i < sizeof($thumbs); $i++)
		{
			@unlink($phpbb_root_path . 'dl_mod/thumbs/' . $thumbs[$i]);
		}

		add_log('admin', 'DL_LOG_THUMBS_DEL');
	}

	$real_thumbnails['file_name'] = array();
	$real_thumbnails['file_size'] = array();

	@$dir = opendir($phpbb_root_path . 'dl_mod/thumbs/');

	while (false !== ($file=@readdir($dir)))
	{
		if ($file{0} != "." && !is_dir($file))
		{
			$real_thumbnails['file_name'][] = $file;
			$real_thumbnails['file_size'][] = sprintf("%u", @filesize($phpbb_root_path . 'dl_mod/thumbs/' . $file));
		}
	}

	@closedir($dir);

	$sql = 'SELECT thumbnail FROM ' . DOWNLOADS_TABLE . "
		WHERE thumbnail <> ''";
	$result = $db->sql_query($sql);

	$dl_thumbs = array();
	while ( $row = $db->sql_fetchrow($result) )
	{
		$dl_thumbs[] = $row['thumbnail'];
	}
	$db->sql_freeresult($result);

	if (sizeof($real_thumbnails['file_name']))
	{
		$template->set_filenames(array(
			'toolbox' => 'dl_mod/dl_thumbs_body.html')
		);

		$template->assign_vars(array(
			'L_DELETE'			=> $user->lang['DELETE'],
			'L_DL_THUMBNAILS'	=> $user->lang['DL_THUMB'],
			'L_MARK_ALL'		=> $user->lang['DL_MARK_ALL'],
			'L_UNMARK_ALL'		=> $user->lang['DL_UNMARK'],

			'S_MANAGE_ACTION'	=> "{$basic_link}&amp;action=check_thumbnails")
		);

		for ($i = 0; $i < sizeof($real_thumbnails['file_name']); $i++)
		{
			$real_file = $real_thumbnails['file_name'][$i];
			if (!in_array($real_file, $dl_thumbs))
			{
				$checkbox = '<input type="checkbox" class="permissions-checkbox" name="thumb[]" value="'.$real_file.'" />';
			}
			else
			{
				$checkbox = '';
			}

			$template->assign_block_vars('thumbnails', array(
				'CHECKBOX'		=> $checkbox,
				'REAL_FILE'		=> $real_file,
				'FILE_SIZE'		=> $dl_mod->dl_size($real_thumbnails['file_size'][$i]),

				'U_REAL_FILE'	=> $phpbb_root_path . 'dl_mod/thumbs/' . $real_file,
			));
		}

		$template->assign_var('S_DL_THUMBS', true);
	}
	else
	{
		$action = 'browse';
	}
}

if ($files && $file_command)
{
	$path_temp = $path;
	$path .= ($path) ? '/' : '';

	if ($file_command == 'del')
	{
		for ($i = 0; $i < count($files); $i++)
		{
			@unlink($dl_config['dl_path'] . $path . $files[$i]);

			add_log('admin', 'DL_LOG_FILE_DROP', $files[$i]);
		}
	}
	else
	{
		for ($i = 0; $i < count($files); $i++)
		{
			@copy ($dl_config['dl_path'] . $path . $files[$i], $file_command . $files[$i]);
			@unlink($dl_config['dl_path'] . $path . $files[$i]);

			add_log('admin', 'DL_LOG_FILE_MOVE', $files[$i]);
		}
	}

	$path = $path_temp;
	$file_action = $file_command = $new_path = '';
}

if ($dir_name && $dircreate)
{
	@mkdir($dl_config['dl_path'] . $path . '/' . $dir_name);
	@chmod($dl_config['dl_path'] . $path . '/' . $dir_name, 0777);

	add_log('admin', 'DL_LOG_FOLDER_CREATE', $path . '/' . $dir_name);
}

if ($action == 'dirdelete')
{
	$file_name = basename($path);

	$content_count = 0;

	$sh = @opendir($dl_config['dl_path'] . $path . '/' . $file);

	while (false !== ($subfile=@readdir($sh)))
	{
		if (substr($subfile,0,1)!=".")
		{
			$content_count++;
		}
	}

	@closedir($sh);
	
	if ($content_count == 0)
	{
		@rmdir($dl_config['dl_path'] . $path);

		add_log('admin', 'DL_LOG_FOLDER_DROP', $path);
	}

	$action = '';

	$path = ($path != $file_name) ? substr($path, 0, strlen($path) - strlen($file_name)-1) : '';
}

if ($action == 'browse' || $action == '' || $action == 'unassigned')
{
	if ($action != 'unassigned')
	{
		$temp_url = '';
		$temp_dir = array();

		$dl_navi = $dl_config['dl_path'];
		$dl_navi = str_replace($phpbb_root_path, '', $dl_navi);
		$dl_navi = "<a href=\"{$basic_link}&amp;action=browse\">".$dl_navi;
		$dl_navi = substr($dl_navi, 0, strlen($dl_navi)-1)."</a>/";

		if ($path)
		{
			$path = ($path{0} == '/') ? substr($path, 1) : $path;
			$temp_dir = split('[/]', $path);
			if (count($temp_dir) > 0)
			{
				for ($i = 0; $i < count($temp_dir); $i++)
				{
					$temp_url .= '/'.$temp_dir[$i];
					$temp_path = preg_replace('#[/]*#', '', $temp_dir[$i]);
					$dl_navi .= "<a href=\"{$basic_link}&amp;action=browse&amp;path={$temp_url}\">{$temp_path}</a>/";
				}
			}
		}

		$dirs = $dirs_delete = $files = $filen = $sizes = $exist = array();

		$existing_files = array();
		$existing_files = $dl_mod->read_exist_files();

		$dh = @opendir($dl_config['dl_path'] . $path);

		while (false !== ($file=@readdir($dh)))
		{
			if (substr($file,0,1)!=".")
			{
				if (is_dir($dl_config['dl_path'] . $path . '/' . $file))
				{
					$slash = ($path) ? '/' : '';
					$dirs[] = "<a href=\"{$basic_link}&amp;action=browse&amp;path={$path}{$slash}{$file}\">{$file}</a>/";

					$sh = @opendir($dl_config['dl_path'] . $path . '/' . $file);

					$content_count = 0;

					while (false !== ($subfile=@readdir($sh)))
					{
						if (substr($subfile,0,1)!=".")
						{
							$content_count++;
						}
					}

					@closedir($sh);

					$dirs_delete[] = ($content_count == 0) ? "<a href=\"{$basic_link}&amp;action=dirdelete&amp;path={$path}{$slash}{$file}\">" . $user->lang['DL_DELETE'] . "</a>" : sprintf($user->lang['DL_MANAGE_CONTENT_COUNT'], $content_count);
				}
				else
				{
					$files[] = '<a href="' . $dl_config['dl_path'] . $path . '/' . $file.'" target="_blank">'.$file.'</a>';
					$filen[] = $file;
					$sizes[] = sprintf("%u", @filesize($dl_config['dl_path'] . $path .'/' . $file));
					$exist[] = (in_array($file, $existing_files)) ? TRUE : 0;
				}
			}
		}

		@closedir($dh);

		$template->assign_var('S_CREATE_DIR_COMMAND', true);
	}
	else
	{
		$dl_navi = $user->lang['DL_UNASSIGNED_FILES'];
	}

	$template->set_filenames(array(
		'toolbox' => 'dl_mod/dl_toolbox_body.html')
	);

	$template->assign_vars(array(
		'L_DL_MANAGE'				=> $user->lang['DL_MANAGE'],
		'L_DL_MANAGE_EXPLAIN'		=> $user->lang['DL_MANAGE_EXPLAIN'],
		'L_DL_MANAGE_CREATE_DIR'	=> $user->lang['DL_MANAGE_CREATE_DIR'],
		'L_DOWNLOADS_CHECK_FILES'	=> $user->lang['DL_CHECK_FILE_SIZES'],
		'L_DOWNLOADS_CHECK_THUMBS'	=> $user->lang['DL_CHECK_THUMBNAILS'],
		'L_NO_CONTENT'				=> $user->lang['DL_MANAGE_EMPTY_FOLDER'],
		'L_UNASSIGNED_FILES'		=> $user->lang['DL_UNASSIGNED_FILES'],
		'L_DL_ALL'					=> $user->lang['DL_ALL'],
		'L_DL_UNASSIGNED_FILES'		=> $user->lang['DL_UNASSIGNED_FILES'],

		'L_GO'						=> $user->lang['DL_GO'],
		'L_MARK_ALL'				=> $user->lang['DL_MARK_ALL'],
		'L_UNMARK_ALL'				=> $user->lang['DL_UNMARK'],

		'DL_NAVI'					=> $dl_navi,

		'S_MANAGE_ACTION'			=> "{$basic_link}&amp;path=$path",

		'U_UNASSIGNED_FILES'		=> "{$basic_link}&amp;action=unassigned",
		'U_DOWNLOADS_CHECK_FILES'	=> "{$basic_link}&amp;action=check_file_sizes",
		'U_DOWNLOADS_CHECK_THUMB'	=> "{$basic_link}&amp;action=check_thumbnails")
	);

	$existing_thumbs = 0;
	@$dir = opendir($phpbb_root_path . 'dl_mod/thumbs/');

	while (false !== ($file = @readdir($dir)))
	{
		if ($file{0} != "." && !is_dir($file))
		{
			$existing_thumbs = true;
			break;
		}
	}

	@closedir($dir);

	if ($existing_thumbs)
	{
		$template->assign_var('S_THUMBNAIL_CHECK', true);
	}

	if (!$dirs && !$files)
	{
		$template->assign_var('S_EMPTY_FOLDER', true);
	}

	if (isset($total_unassigned_files) && $total_unassigned_files && $action != 'unassigned')
	{
		$template->assign_var('S_UNASSIGNED_FILES', true);
	}

	if ($dirs)
	{
		natcasesort($dirs);
		for($i = 0; $i < count($dirs); $i++)
		{
			$template->assign_block_vars('dirs_row', array(
				'DIR_LINK' => '&raquo;&nbsp;' . $dirs[$i],
				'DIR_DELETE_LINK' => $dirs_delete[$i])
			);
		}
	}

	if ($files)
	{
		natcasesort($files);
		$overall_size = 0;
		$missing_count = 0;
		for($i = 0; $i < count($files); $i++)
		{
			$file_size = ($action != 'unassigned') ? $sizes[$i] : sprintf("%u", @filesize($dl_config['dl_path'] . $files[$i]));

			$file_size_tmp = $dl_mod->dl_size($file_size, 2, 'no');
			$file_size_out = $file_size_tmp['size_out'];
			$file_size_range = $file_size_tmp['range'];

			if ($action != 'unassigned')
			{
				$template->assign_block_vars('files_row', array(
					'FILE_NAME' => $files[$i],
					'FILE_SIZE' => $file_size_out,
					'FILE_SIZE_RANGE' => $file_size_range,
					'FILE_EXIST' => (!$exist[$i]) ? '<input type="checkbox" class="permissions-checkbox" name="files[]" value="' . $filen[$i] . '" />' : '<input type="checkbox" class="permissions-checkbox" value="" disabled="disabled" />')
				);
				if (!$exist[$i])
				{
					$missing_count++;
				}
			}
			else
			{
				$template->assign_block_vars('files_row', array(
					'FILE_NAME' => $unas_files[substr($files[$i], strrpos($files[$i], '/') + 1)],
					'FILE_NAME_REAL' => $files[$i],
					'FILE_SIZE' => $file_size_out,
					'FILE_SIZE_RANGE' => $file_size_range,
					'FILE_EXIST' => '<input type="checkbox" class="permissions-checkbox" name="files[]" value="' . $files_data[$i] . '" />')
				);
				$missing_count++;
			}
			$overall_size += $file_size;
		}
		
		$overall_size_tmp = array();
		$overall_size_tmp = $dl_mod->dl_size($overall_size, 2, 'no');
		$overall_size_out = $overall_size_tmp['size_out'];
		$file_size_range = $overall_size_tmp['range'];

		$cur = $path;

		if ($action != 'unassigned')
		{
			$s_file_action = '<select name="file_command">';
			$s_file_action .= '<option value="del">'.$user->lang['DL_DELETE'].'</option>';
			$s_file_action .= '<option value="---">---------------</option>';
			$s_file_action .= $dl_mod->read_dl_dirs($dl_config['dl_path']);
		}
		else
		{
			$s_file_action = '<select name="file_assign">';
			$s_file_action .= '<option value="del">'.$user->lang['DL_DELETE'].'</option>';
			$s_file_action .= '<option value="---">---------------</option>';
			$s_file_action .= $dl_mod->dl_dropdown(0, 0, 0, 'auth_view');
		}
		$s_file_action .= '</select>';

		$template->assign_block_vars('overall_size', array(
			'OVERALL_SIZE' => $overall_size_out,
			'OVERALL_SIZE_RANGE' => $file_size_range)
		);

		if ($missing_count)
		{
			$template->assign_block_vars('file_move_delete', array(
				'S_FILE_ACTION' => $s_file_action)
			);
		}
	}
}

if ($action <> 'check_thumbnails')
{
	$template->assign_var('S_DL_TOOLBOX', true);
}

$template->assign_display('toolbox');

?>