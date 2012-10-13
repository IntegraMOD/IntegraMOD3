<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_admin_ext_blacklist.php 4 2009/06/03 OXPUS
* @copyright		(c) 2006 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
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

if($action == 'add')
{
	$extention = request_var('extention', '');

	if ($extention)
	{
		$sql = 'SELECT * FROM ' . DL_EXT_BLACKLIST . "
			WHERE extention = '" . $db->sql_escape($extention) . "'";
		$result = $db->sql_query($sql);
		$ext_exist = $db->sql_affectedrows($result);
		$db->sql_freeresult($result);

		if (!$ext_exist)
		{
			$sql = 'INSERT INTO ' . DL_EXT_BLACKLIST . ' ' . $db->sql_build_array('INSERT', array(
				'extention' => $extention));
			$db->sql_query($sql);

			add_log('admin', 'DL_LOG_EXT_ADD', $extention);
		}
	}

	$action = '';
}

if($action == 'delete')
{
	$extention = (isset($_POST['extention'])) ? $_POST['extention'] : array();

	$confirm_delete = false;

	if (!$confirm)
	{
		$template->set_filenames(array(
			'confirm_body' => 'dl_mod/dl_confirm_body.html')
		);

		$s_hidden_fields = array('action' => 'delete');

		for ($i = 0; $i < sizeof($extention); $i++)
		{
			$s_hidden_fields = array_merge($s_hidden_fields, array('extention[' . $i . ']' => htmlspecialchars($extention[$i])));
		}

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $user->lang['INFORMATION'],
			'MESSAGE_TEXT' => (sizeof($extention) == 1) ? sprintf($user->lang['DL_CONFIRM_DELETE_EXTENTION'], $extention[0]) : sprintf($user->lang['DL_CONFIRM_DELETE_EXTENTIONS'], implode(', ', $extention)),

			'L_DELETE_FILE_TOO' => (sizeof($extention) == 1) ? $user->lang['DL_DELETE_EXTENTION_CONFIRM'] : $user->lang['DL_DELETE_EXTENTIONS_CONFIRM'],

			'L_YES' => $user->lang['YES'],
			'L_NO' => $user->lang['NO'],

			'S_CONFIRM_ACTION' => $basic_link,
			'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
		);

		$template->assign_var('S_DL_CONFIRM', true);

		$template->assign_display('confirm_body');

		$confirm_delete = true;
	}
	else
	{
		$sql_ext_in = array();

		for ($i = 0; $i < sizeof($extention); $i++)
		{
			$sql_ext_in[] = htmlspecialchars($extention[$i]);
		}

		if (sizeof($sql_ext_in))
		{
			$sql = 'DELETE FROM ' . DL_EXT_BLACKLIST . '
				WHERE ' . $db->sql_in_set('extention', $sql_ext_in);
			$db->sql_query($sql);

			add_log('admin', 'DL_LOG_EXT_DEL', implode(', ', $sql_ext_in));

			$message = ((sizeof($extention) == 1) ? $user->lang['EXTENTION_REMOVED'] : $user->lang['EXTENTIONS_REMOVED']) . "<br /><br />" . sprintf($user->lang['CLICK_RETURN_EXTBLACKLISTADMIN'], "<a href=\"{$basic_link}\">", "</a>") . adm_back_link($this->u_action);

			trigger_error($message);
		}

		$action = '';
	}
}

if ($action == '')
{
	$template->set_filenames(array(
		'ext_bl' => 'dl_mod/dl_ext_blacklist_body.html')
	);

	$sql = 'SELECT extention FROM ' . DL_EXT_BLACKLIST . '
		ORDER BY extention';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$template->assign_block_vars('extention_row', array(
			'EXTENTION' => $row['extention'])
		);
	}

	$template->assign_vars(array(
		'L_DL_EXT_BLACKLIST'			=> $user->lang['DL_EXT_BLACKLIST'],
		'L_DL_EXT_BLACKLIST_EXPLAIN'	=> $user->lang['DL_EXT_BLACKLIST_EXPLAIN'],
		'L_DL_EXTENTION'				=> $user->lang['DL_EXTENTION'],
		'L_DL_EXTENTIONS'				=> $user->lang['DL_EXTENTIONS'],
		'L_DL_ADD_EXTENTION'			=> $user->lang['DL_ADD_EXTENTION'],
		'L_DL_DEL_EXTENTIONS'			=> $user->lang['DL_DELETE'],
		'L_MARK_ALL'					=> $user->lang['MARK_ALL'],
		'L_UNMARK_ALL'					=> $user->lang['UNMARK_ALL'],

		'S_DOWNLOADS_ACTION'			=> $basic_link)
	);
}

if (!isset($confirm_delete))
{
	$template->assign_var('S_DL_BLACKLIST', true);

	$template->assign_display('ext_bl');
}

?>