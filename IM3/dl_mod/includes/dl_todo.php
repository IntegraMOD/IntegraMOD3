<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_toto.php 1 2009/09/17 OXPUS
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

$todo	= utf8_normalize_nfc(request_var('todo', '', true));

// Save or delete a todo
if ($submit && !$cancel)
{
	if ($delete)
	{
		if (!$confirm)
		{
			$s_hidden_fields = array(
				'view'		=> 'todo',
				'action'	=> 'edit',
				'df_id'		=> $df_id,
				'submit'	=> true,
				'delete'	=> true,
			);
	
			$user->add_lang('posting');
	
			$template->set_filenames(array(
				'body' => 'dl_mod/dl_confirm_body.html')
			);
	
			page_header();
	
			$template->assign_vars(array(
				'MESSAGE_TITLE' => $user->lang['DELETE_MESSAGE'],
				'MESSAGE_TEXT' => $user->lang['DELETE_MESSAGE_CONFIRM'],
	
				'L_YES' => $user->lang['YES'],
				'L_NO' => $user->lang['NO'],
	
				'S_CONFIRM_ACTION' => append_sid("{$phpbb_root_path}downloads.$phpEx"),
				'S_HIDDEN_FIELDS' => build_hidden_fields($s_hidden_fields))
			);
	
			page_footer();
		}
		else
		{
			$todo = '';
		}
	}

	if ($df_id)
	{
		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'todo'		=> $todo)) . " WHERE id = $df_id
				AND " . $db->sql_in_set('cat', $todo_access_ids);
		$db->sql_query($sql);

		$meta_url	= append_sid("{$phpbb_root_path}downloads.$phpEx?view=todo", 'action=edit');
		$message	= $user->lang['DOWNLOAD_UPDATED'] . '<br /><br />' . sprintf($user->lang['CLICK_RETURN_TODO_EDIT'], "<a href=\"{$meta_url}\">", "</a>");

		meta_refresh(3, $meta_url);

		trigger_error($message);
	}
}

// Will we edit a todo??
if ($edit && $df_id)
{

	$dl_file = array();
	$dl_file = $dl_mod->all_files(0, '', 'ASC', '', $df_id, 0, 'description, desc_uid, desc_flags, todo');

	$description	= $dl_file['description'];
	$desc_uid		= $dl_file['desc_uid'];
	$desc_flags		= $dl_file['desc_flags'];

	$text_ary	= generate_text_for_edit($description, $desc_uid, $desc_flags);
	$s_downloads	= $text_ary['text'];

	$todo = $dl_file['todo'];

	$s_hidden_fields = array(
		'view'		=> 'todo',
		'action'	=> 'edit',
		'df_id'		=> $df_id,
	);
}
else
{
	$todo = '';

	$s_downloads = '<select name="df_id" class="select autowidth">';

	$sql = 'SELECT c.cat_name, d.id, d.description, d.desc_uid, d.desc_flags FROM ' . DOWNLOADS_TABLE . ' d, ' . DL_CAT_TABLE . ' c
		WHERE d.cat = c.id
			AND ' . $db->sql_in_set('d.cat', $todo_access_ids) . "
			AND (todo = '' OR todo IS NULL)
		ORDER BY c.sort, c.parent, d.description";
 	$result = $db->sql_query($sql);
	
	while ($row = $db->sql_fetchrow($result))
	{
		$description	= $row['description'];
		$desc_uid		= $row['desc_uid'];
		$desc_flags		= $row['desc_flags'];
	
		$text_ary	= generate_text_for_edit($description, $desc_uid, $desc_flags);
		$description	= $text_ary['text'];

		$s_downloads .= '<option value="' . $row['id'] . '">' . $row['cat_name'] . ' &bull; ' . $description . '</option>';
	}

	$db->sql_freeresult($result);

	$s_downloads .= '</select>';

	$s_hidden_fields = array(
		'view'		=> 'todo',
		'action'	=> 'edit',
	);
}

// Initiate todo list management page
$template->set_filenames(array(
	'body' => 'dl_mod/dl_todo_edit_body.html')
);

$template->assign_vars(array(
	'L_DESCRIPTION'		=> $user->lang['DL_FILE_DESCRIPTION'],
	'L_DL_TODO'			=> $user->lang['DL_MOD_TODO'],
	'L_ADD_TODO'		=> ($edit) ? $user->lang['DL_EDIT_FILE'] : $user->lang['NEW_POST'],

	'TODO_TEXT'			=> $todo,

	'S_DOWNLOAD'		=> $s_downloads,
	'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields),
	'S_FORM_ACTION'		=> append_sid("{$phpbb_root_path}downloads.$phpEx"),
));

// Build todo edit list for existing entries
$dl_todo = array();
$dl_todo = $dl_mod->get_todo();

if (isset($dl_todo['file_name'][0]))
{
	for ($i = 0; $i < sizeof($dl_todo['file_name']); $i++)
	{
		$df_id = $dl_todo['df_id'][$i];

		$template->assign_block_vars('todolist_row', array(
			'FILENAME'		=> $dl_todo['file_name'][$i],
			'FILE_LINK'		=> $dl_todo['file_link'][$i],
			'HACK_VERSION'	=> $dl_todo['hack_version'][$i],
			'TODO'			=> $dl_todo['todo'][$i],
	
			'U_TODO_EDIT'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=todo", 'action=edit&amp;edit=true&amp;df_id=' . $df_id),
			'U_TODO_DELETE'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=todo", 'action=edit&amp;delete=true&amp;submit=true&amp;df_id=' . $df_id),
		));
	}
}
else
{
	$template->assign_var('S_NO_TODOLIST', true);
}

page_header();

?>