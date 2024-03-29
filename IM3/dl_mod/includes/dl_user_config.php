<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_user_config.php 6 2009/06/04 OXPUS
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

if (!$user->data['is_registered'])
{
      redirect(append_sid("{$phpbb_root_path}downloads.$phpEx"));
}

//
// Pull all user config data
//
if ($submit)
{
	/*
	* save general configuration for current user
	*/
	$user_allow_new_download_popup	= request_var('user_allow_new_download_popup', 0);
	$user_allow_fav_download_popup	= request_var('user_allow_fav_download_popup', 0);
	$user_allow_new_download_email	= request_var('user_allow_new_download_email', 0);
	$user_allow_fav_download_email	= request_var('user_allow_fav_download_email', 0);
	$user_dl_note_type				= request_var('user_dl_note_type', 0);
	$user_dl_sort_fix				= request_var('user_dl_sort_fix', 0);
	$user_dl_sort_opt				= request_var('user_dl_sort_opt', 0);
	$user_dl_sort_dir				= request_var('user_dl_sort_dir', 0);
	$user_dl_sub_on_index			= request_var('user_dl_sub_on_index', 0);

	$sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
		'user_allow_new_download_popup'	=> $user_allow_new_download_popup,
		'user_allow_fav_download_popup'	=> $user_allow_fav_download_popup,
		'user_allow_new_download_email'	=> $user_allow_new_download_email,
		'user_allow_fav_download_email'	=> $user_allow_fav_download_email,
		'user_dl_note_type'				=> $user_dl_note_type,
		'user_dl_sort_fix'				=> $user_dl_sort_fix,
		'user_dl_sort_opt'				=> $user_dl_sort_opt,
		'user_dl_sort_dir'				=> $user_dl_sort_dir,
		'user_dl_sub_on_index'			=> $user_dl_sub_on_index)) . ' WHERE user_id = ' . $user->data['user_id'];
	$db->sql_query($sql);

	/*
	* drop all choosen favorites
	*/
	$fav_id = request_var('fav_id', array(0 => ''));

	if (sizeof($fav_id))
	{
		$sql = 'DELETE FROM ' . DL_FAVORITES_TABLE . '
			WHERE ' . $db->sql_in_set('fav_id', $fav_id) . '
				AND fav_user_id = ' . $user->data['user_id'];
		$db->sql_query($sql);
	}

	$message = sprintf($user->lang['DL_USER_CONFIG_SAVED'], '<a href="' . append_sid("{$phpbb_root_path}downloads.$phpEx?view=user_config") . '">', '</a>');

	trigger_error($message);
}

$allow_new_popup_yes	= ($user->data['user_allow_new_download_popup']) ? 'checked="checked"' : '';
$allow_new_popup_no		= (!$user->data['user_allow_new_download_popup']) ? 'checked="checked"' : '';
$allow_fav_popup_yes	= ($user->data['user_allow_fav_download_popup']) ? 'checked="checked"' : '';
$allow_fav_popup_no		= (!$user->data['user_allow_fav_download_popup']) ? 'checked="checked"' : '';
$allow_new_email_yes	= ($user->data['user_allow_new_download_email']) ? 'checked="checked"' : '';
$allow_new_email_no		= (!$user->data['user_allow_new_download_email']) ? 'checked="checked"' : '';
$allow_fav_email_yes	= ($user->data['user_allow_fav_download_email']) ? 'checked="checked"' : '';
$allow_fav_email_no		= (!$user->data['user_allow_fav_download_email']) ? 'checked="checked"' : '';

$user_dl_note_type_popup	= ($user->data['user_dl_note_type']) ? 'checked="checked"' : '';
$user_dl_note_type_message	= (!$user->data['user_dl_note_type']) ? 'checked="checked"' : '';
$user_dl_sort_opt			= ($user->data['user_dl_sort_opt']) ? 'checked="checked"' : '';

$user_dl_sub_on_index_yes	= ($user->data['user_dl_sub_on_index']) ? 'checked="checked"' : '';
$user_dl_sub_on_index_no	= (!$user->data['user_dl_sub_on_index']) ? 'checked="checked"' : '';

$s_user_dl_sort_fix = '<select name="user_dl_sort_fix">';
$s_user_dl_sort_fix .= '<option value="0">'.$user->lang['DL_DEFAULT_SORT'].'</option>';
$s_user_dl_sort_fix .= '<option value="1">'.$user->lang['DL_FILE_DESCRIPTION'].'</option>';
$s_user_dl_sort_fix .= '<option value="2">'.$user->lang['DL_FILE_NAME'].'</option>';
$s_user_dl_sort_fix .= '<option value="3">'.$user->lang['DL_KLICKS'].'</option>';
$s_user_dl_sort_fix .= '<option value="4">'.$user->lang['DL_FREE'].'</option>';
$s_user_dl_sort_fix .= '<option value="5">'.$user->lang['DL_EXTERN'].'</option>';
$s_user_dl_sort_fix .= '<option value="6">'.$user->lang['DL_FILE_SIZE'].'</option>';
$s_user_dl_sort_fix .= '<option value="7">'.$user->lang['LAST_UPDATED'].'</option>';
$s_user_dl_sort_fix .= '<option value="8">'.$user->lang['DL_RATING'].'</option>';
$s_user_dl_sort_fix .= '</select>';
$s_user_dl_sort_fix = str_replace('value="'.$user->data['user_dl_sort_fix'].'">', 'value="'.$user->data['user_dl_sort_fix'].'" selected="selected">', $s_user_dl_sort_fix);

$s_user_dl_sort_dir = '<select name="user_dl_sort_dir">';
$s_user_dl_sort_dir .= '<option value="0">'.$user->lang['ASCENDING'].'</option>';
$s_user_dl_sort_dir .= '<option value="1">'.$user->lang['DESCENDING'].'</option>';
$s_user_dl_sort_dir .= '</select>';
$s_user_dl_sort_dir = str_replace('value="'.$user->data['user_dl_sort_dir'].'">', 'value="'.$user->data['user_dl_sort_dir'].'" selected="selected">', $s_user_dl_sort_dir);

/*
* drop all unaccessable favorites
*/
$access_cat = array();
$access_cat = $dl_mod->full_index(0, 0, 0, 1);

if (sizeof($access_cat))
{
	$sql = 'DELETE FROM ' . DL_FAVORITES_TABLE . '
		WHERE ' . $db->sql_in_set('fav_dl_cat', $access_cat, true) . '
			AND fav_user_id = ' . $user->data['user_id'];
	$db->sql_query($sql);
}	

/*
* fetch all favorite downloads
*/
$sql = 'SELECT f.fav_id, d.description, d.cat, d.id FROM ' . DL_FAVORITES_TABLE . ' f, ' . DOWNLOADS_TABLE . ' d
	WHERE f.fav_dl_id = d.id
		AND f.fav_user_id = ' . $user->data['user_id'];
$result = $db->sql_query($sql);
$total_favorites = $db->sql_affectedrows($result);

if ($total_favorites)
{
	$template->assign_var('S_FAV_BLOCK', true);
		
	while ($row = $db->sql_fetchrow($result))
	{
		$tmp_nav	= $path_dl_array = array();
		$dl_nav		= $dl_mod->dl_nav($row['cat'], 'links', $tmp_nav) . '&nbsp;&raquo;&nbsp;';

		$template->assign_block_vars('favorite_row', array(
			'DL_ID'			=> $row['fav_id'],
			'DL_CAT'		=> $dl_nav,
			'DOWNLOAD'		=> $row['description'],
			'U_DOWNLOAD'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=".$row['id']."&amp;cat_id=".$row['cat']))
		);
	}
}
$db->sql_freeresult($result);

$template->set_filenames(array(
	'body' => 'dl_mod/dl_user_config_body.html')
);

$template->assign_vars(array(
	'L_CONFIGURATION_TITLE'				=> $user->lang['DL_CONFIG'],
	'L_DL_TRAFFIC'						=> $user->lang['TRAFFIC'],
	'L_DOWNLOADS'						=> $user->lang['DOWNLOADS'],
	'L_DL_FAVORITE'						=> $user->lang['DL_FAVORITE'],
	'L_DL_CATS'							=> $user->lang['DL_CAT_TITLE'],

	'L_DOWNLOAD_POPUP'					=> $user->lang['USER_DOWNLOAD_POPUP'],
	'L_DOWNLOAD_EMAIL'					=> $user->lang['USER_DOWNLOAD_EMAIL'],
	'L_DOWNLOAD_NOTIFY_TYPE'			=> $user->lang['USER_DOWNLOAD_NOTIFY_TYPE'],
	'L_DOWNLOAD_NOTIFY_TYPE_POPUP'		=> $user->lang['USER_DOWNLOAD_NOTIFY_TYPE_POPUP'],
	'L_DOWNLOAD_NOTIFY_TYPE_MESSAGE'	=> $user->lang['USER_DOWNLOAD_NOTIFY_TYPE_MESSAGE'],

	'L_ALLOW_NEW_DOWNLOAD_POPUP'		=> $user->lang['USER_ALLOW_NEW_DOWNLOAD_POPUP'],
	'L_ALLOW_FAV_DOWNLOAD_POPUP'		=> $user->lang['USER_ALLOW_FAV_DOWNLOAD_POPUP'],
	'L_ALLOW_NEW_DOWNLOAD_EMAIL'		=> $user->lang['USER_ALLOW_NEW_DOWNLOAD_EMAIL'],
	'L_ALLOW_FAV_DOWNLOAD_EMAIL'		=> $user->lang['USER_ALLOW_FAV_DOWNLOAD_EMAIL'],

	'L_SORT_BY'							=> $user->lang['SORT_BY'],
	'L_DL_SORT_USER_OPT'				=> $user->lang['DL_SORT_USER_OPT'],
	'L_DL_SORT_USER_EXT'				=> $user->lang['DL_SORT_USER_EXT'],

	'L_DL_SUB_ON_INDEX'					=> $user->lang['DL_SUB_ON_INDEX'],

	'L_DELETE'							=> $user->lang['DL_DELETE'],
	'L_MARK_ALL'						=> $user->lang['DL_MARK_ALL'],
	'L_UNMARK_ALL'						=> $user->lang['DL_UNMARK'],

	'ALLOW_NEW_DOWNLOAD_POPUP_YES'		=> $allow_new_popup_yes,
	'ALLOW_NEW_DOWNLOAD_POPUP_NO'		=> $allow_new_popup_no,
	'ALLOW_FAV_DOWNLOAD_POPUP_YES'		=> $allow_fav_popup_yes,
	'ALLOW_FAV_DOWNLOAD_POPUP_NO'		=> $allow_fav_popup_no,

	'ALLOW_NEW_DOWNLOAD_EMAIL_YES'		=> $allow_new_email_yes,
	'ALLOW_NEW_DOWNLOAD_EMAIL_NO'		=> $allow_new_email_no,
	'ALLOW_FAV_DOWNLOAD_EMAIL_YES'		=> $allow_fav_email_yes,
	'ALLOW_FAV_DOWNLOAD_EMAIL_NO'		=> $allow_fav_email_no,

	'USER_DL_NOTE_TYPE_POPUP'			=> $user_dl_note_type_popup,
	'USER_DL_NOTE_TYPE_MESSAGE'			=> $user_dl_note_type_message,

	'USER_DL_SUB_ON_INDEX_YES'			=> $user_dl_sub_on_index_yes,
	'USER_DL_SUB_ON_INDEX_NO'			=> $user_dl_sub_on_index_no,

	'S_DL_SORT_USER_OPT'				=> $s_user_dl_sort_fix,
	'S_DL_SORT_USER_EXT'				=> $user_dl_sort_opt,
	'S_DL_SORT_USER_DIR'				=> $s_user_dl_sort_dir,

	'S_FORM_ACTION'						=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=user_config"))
);

if (!$dl_config['disable_email'])
{
	$template->assign_var('S_NO_DL_EMAIL_NOTIFY', true);
}

if (!$dl_config['disable_popup'])
{
	$template->assign_var('S_NO_DL_POPUP_NOTIFY', true);
}

if (!$dl_config['sort_preform'])
{
	$template->assign_var('S_SORT_CONFIG_OPTIONS', true);
}

$template->assign_var('S_DL_UCP_CONFIG', true);

?>