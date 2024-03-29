<?php
/**
*
* @package acp Stargate Portal
* @version $Id: acp_k_modules.php 305 2009-01-01 16:03:23Z Michealo $
* @copyright (c) 2007 Michael O'Toole aka michaelo
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/

class acp_k_modules
{
	function main($id, $mode)
	{
				
		global $db, $user, $auth, $template, $cache;
		global $config, $SID, $phpbb_root_path, $phpbb_admin_path, $phpEx;
	
		$message ='';
		$search_message = '';
		$found = 0;
			
		$user->add_lang('acp/k_modules');
		$this->tpl_name = 'acp_k_modules';
		$this->page_title = 'ACP_K_MODULES';

		$form_key = 'acp_k_modules';
		add_form_key($form_key);		
				
		$action = request_var('action', '');
		$mode	= request_var('mode', '');
		$id		= request_var('module', '');

		$submit			= (isset($_POST['submit'])) ? true : false;
		$add			= (isset($_POST['add'])) ? true : false;
		$add_style		= (isset($_POST['add_style'])) ? true : false;
		$update_style	= (isset($_POST['update_style'])) ? true : false;

		if ($submit && !check_form_key($form_key))
		{
			$submit = false;
			trigger_error('Error!'. $user->lang['FORM_INVALID'] . ' see ' . basename(dirname(__FILE__)) . '/' . basename(__FILE__) . ', line ' . __LINE__);
		}

		if($mode == 'edit' || $mode == 'delete' && !$submit)
		{
			$sql = "SELECT * FROM " . K_MODULES_TABLE . " WHERE mod_id =  '" . $id . "'";
		}
		else
		if($mode == 'all')
		{
			$sql = "SELECT * FROM " . K_MODULES_TABLE . " WHERE mod_id > 1 AND mod_type != 'style' AND mod_type != 'mod' AND mod_type != 'block' ORDER BY mod_type ASC";
			//$sql = "SELECT * FROM " . K_MODULES_TABLE . " WHERE mod_id > 1 ORDER BY mod_type ASC";
		}
		else
		if($mode == 'select')
		{
			$sql = "SELECT * FROM " . K_MODULES_TABLE . " WHERE mod_type LIKE '" . $mode . "' AND style_id = '" . $id . "' ORDER BY mod_name ASC";
		}
		else
		{
			$sql = "SELECT * FROM " . K_MODULES_TABLE . " WHERE mod_type LIKE '" . $mode . "'  ORDER BY mod_name ASC";
		}

		if(!$result = $db->sql_query($sql)) 
			trigger_error('Error! Could not update k_modules table: ' . basename(dirname(__FILE__)) . '/' . basename(__FILE__) . ', line ' . __LINE__);

		while ($row = $db->sql_fetchrow($result))
		{

			$mid				= $row['mod_id'];
			$mod_link_id		= $row['mod_link_id'];
			$mod_type			= $row['mod_type'];
			$mod_origin			= $row['mod_origin'];
			$mod_name			= $row['mod_name'];
			$mod_version		= $row['mod_version'];
			$mod_author			= $row['mod_author'];
			$mod_author_co		= $row['mod_author_co'];
			$mod_link			= $row['mod_link'];
			$mod_support_link	= $row['mod_support_link'];
			$mod_copyright		= $row['mod_copyright'];
			$mod_details		= $row['mod_details'];
			$mod_status			= $row['mod_status'];
			$mod_image			= $row['mod_thumb'];
			$mod_last_update	= $row['mod_last_update'];
			$mod_download_count	= $row['mod_download_count'];

			$mod_type = strtolower($mod_type);
	
			if($mod_last_update == '')
				$mod_last_update = $today = date("D d M Y");

			//$mod_details = process_for_vars($mod_details, false);

			switch($mode)
			{
				case 'edit':
				{
					$template->assign_block_vars('edit', array(
						'S_MOD_ID'				=> $mid,
						'S_MOD_LINK_ID'			=> $mod_link_id,
						'S_MOD_DOWNLOAD_COUNT'	=> $mod_download_count,
						'S_MOD_TYPE'			=> $mod_type,
						'S_MOD_ORIGIN'			=> $mod_origin,
						'S_MOD_NAME'			=> $mod_name,
						'S_MOD_VERSION'			=> $mod_version,
						'S_MOD_AUTHOR'			=> $mod_author,
						'S_MOD_AUTHOR_CO'		=> $mod_author_co,
						'S_MOD_LINK'			=> $mod_link,
						'S_MOD_SUPPORT_LINK'	=> $mod_support_link,
						'S_MOD_COPYRIGHT'		=> $mod_copyright,
						'S_MOD_DETAILS'			=> $mod_details,
						'S_MOD_STATUS'			=> $mod_status,
						'S_MOD_IMAGE'			=> $mod_image,
						'S_MOD_LAST_UPDATED'	=> $mod_last_update,
						'TITLE'					=> (isset($user->lang[strtoupper($mod_name)])) ? $user->lang[strtoupper($mod_name)] : $mod_name,
						'TITLE_EXPLAIN'			=> (isset($user->lang[strtoupper($mod_name . '_EXPLAIN')])) ? $user->lang[strtoupper($mod_name . '_EXPLAIN')] : $mod_name,
					));

					$template->assign_vars(array('S_OPTION' => 'edit'));
					break;
				}
				case 'welcome':
				{
					$template->assign_block_vars($mode, array(
						'S_MOD_ID'				=> $mid,
						'S_MOD_LINK_ID'			=> $mod_link_id,
						'S_MOD_DOWNLOAD_COUNT'	=> $mod_download_count,
						'S_MOD_TYPE'			=> $mod_type,
						'S_MOD_ORIGIN'			=> $mod_origin,
						'S_MOD_NAME'			=> $mod_name,
						'S_MOD_VERSION'			=> $mod_version,
						'S_MOD_AUTHOR'			=> $mod_author,
						'S_MOD_AUTHOR_CO'		=> $mod_author_co,
						'S_MOD_LINK'			=> $mod_link,
						'S_MOD_SUPPORT_LINK'	=> $mod_support_link,
						'S_MOD_COPYRIGHT'		=> $mod_copyright,
						'S_MOD_DETAILS'			=> $mod_details,
						'S_MOD_STATUS'			=> $mod_status,
						'S_MOD_IMAGE'			=> $mod_image,
						'S_MOD_LAST_UPDATED'	=> $mod_last_update,
						'TITLE'					=> (isset($user->lang[strtoupper($mod_name)])) ? $user->lang[strtoupper($mod_name)] : $mod_name,
						'TITLE_EXPLAIN'			=> (isset($user->lang[strtoupper($mod_name . '_EXPLAIN')])) ? $user->lang[strtoupper($mod_name . '_EXPLAIN')] : $mod_name,
					));

					$template->assign_vars(array('S_OPTION' => 'edit'));
					break;
				}
				default:
				{
					// return basic information on selected group of mods
					$template->assign_block_vars($mode, array(
						'S_MOD_ID'				=> $mid,
						'S_MOD_TYPE'			=> $mod_type,
						'S_MOD_NAME'			=> $mod_name,
						'S_MOD_DETAILS'			=> $mod_details,
						'TITLE'					=> (isset($user->lang[strtoupper($mod_name)])) ? $user->lang[strtoupper($mod_name)] : $mod_name,
						'TITLE_EXPLAIN'			=> (isset($user->lang[strtoupper($mod_name . '_EXPLAIN')])) ? $user->lang[strtoupper($mod_name . '_EXPLAIN')] : $mod_name,
						'S_MOD_DOWNLOAD_COUNT'	=> $mod_download_count,
					));

					$template->assign_vars(array('S_OPTION' => $mode));
				}
			}
			$found++;
		}
		$db->sql_freeresult($result);

		$template->assign_vars(array(
			'U_EDIT'	=> "{$phpbb_root_path}adm/index.$phpEx$SID&amp;i=k_modules&amp;mode=edit&amp;module=" . $id,
			'U_DELETE'	=> "{$phpbb_root_path}adm/index.$phpEx$SID&amp;i=k_modules&amp;mode=delete&amp;module=" . $id,
			'S_OPTION'	=> $mode,
			'SEARCH_MESSAGE' => '<strong>Found:</strong> ' . $found . ' of type: <strong>(' . $mode . ')</strong>.'
		));	

		if($add_style)
		{
			if($mode="style")
			{
				$mode = 'new';
			}

			$template->assign_vars(array('S_OPTION' => 'add_style'));
		}
		if($mode == 'style' && $submit)
			$mode = 'add';

		switch ($mode)
		{
			case 'edit':
			{
				if($submit)
				{
					$id					= request_var('mod_id', '');
					$mod_link_id		= request_var('mod_link_id', '');
					$mod_download_count	= request_var('mod_download_count', '');
					$mod_origin			= request_var('mod_origin', '');
					$mod_status			= request_var('mod_status', '');
					$mod_name			= utf8_normalize_nfc(request_var('mod_name', '', true));
					$mod_version		= utf8_normalize_nfc(request_var('mod_version', '', true));
					$mod_author			= utf8_normalize_nfc(request_var('mod_author', '', true));
					$mod_author_co		= utf8_normalize_nfc(request_var('mod_author_co', '', true));
					$mod_link			= utf8_normalize_nfc(request_var('mod_link', '', true));
					$mod_support_link	= utf8_normalize_nfc(request_var('mod_support_link', '', true));
					$mod_copyright		= utf8_normalize_nfc(request_var('mod_copyright', '', true));
					$mod_type			= utf8_normalize_nfc(request_var('mod_type', '', true));
					$mod_details		= utf8_normalize_nfc(request_var('mod_details', '', true));
					$mod_image			= utf8_normalize_nfc(request_var('mod_image', '', true));
					$mod_last_update	= utf8_normalize_nfc(request_var('mod_last_updated', '', true));


					$available			= utf8_normalize_nfc(request_var('available', '', true));
					$new_type			= utf8_normalize_nfc(request_var('new_type', '', true));

					if($new_type != $available) $mod_type = $new_type;

					//$mod_details		= process_for_vars($mod_details, true);

					$message = 'Saving data... Please wait...';
			
					if($mod_name == '' || $mod_type == '')
						return;

					if($mod_last_update == '' || $mod_last_update == '0')
						$mod_last_update = $today = date("D d M Y");						
						
					$sql = "UPDATE " . K_MODULES_TABLE . " 
						SET
							mod_link_id			= '" . $db->sql_escape($mod_link_id) . "',
							mod_type			= '" . $db->sql_escape($mod_type) . "',
							mod_origin			= '" . $db->sql_escape($mod_origin) . "',
							mod_name			= '" . $db->sql_escape($mod_name) . "',
							mod_version			= '" . $db->sql_escape($mod_version) . "',
							mod_author			= '" . $db->sql_escape($mod_author) . "',
							mod_author_co		= '" . $db->sql_escape($mod_author_co) . "',
							mod_copyright		= '" . $db->sql_escape($mod_copyright) . "',
							mod_link			= '" . $db->sql_escape($mod_link) . "',
							mod_support_link	= '" . $db->sql_escape($mod_support_link) . "',
							mod_details			= '" . $db->sql_escape($mod_details) . "', 
							mod_thumb			= '" . $db->sql_escape($mod_image) . "',
							mod_status			= '" . $db->sql_escape($mod_status) . "',
							mod_last_update		= '" . $db->sql_escape($mod_last_update) . "',
							mod_download_count	= '" . $db->sql_escape($mod_download_count) . "'
						WHERE mod_id = $id LIMIT 1";
	
					if(!$result = $db->sql_query($sql)) 
						trigger_error('Error! Could not update k_modules table: ' . basename(dirname(__FILE__)) . '/' . basename(__FILE__) . ', line ' . __LINE__);
					
					$template->assign_vars(array(
						'S_OPTION'	=> 'saved',
						'MESSAGE'	=> $message,
						'U_BACK'	=> $this->u_action,
					));
					
					unset($submit);
					if($id == 1)
						$mode = 'welcome';
					else
						$mode = 'all';

					if($mod_type == 'style')
						$mode = 'style';

					meta_refresh(1, "{$phpbb_root_path}adm/index.$phpEx$SID&amp;i=k_modules&amp;mode=" . $mode);
					return;	
				}
				break;
			}
			case 'add':
			case 'new':
			{
				if($submit)
				{
					$mod_link_id		= request_var('mod_link_id', '');
					$mod_type			= utf8_normalize_nfc(request_var('mod_type', '', true));

					if($mod_type == 'style' && $mod_link_id != '')
					{
						get_theme_data(0);
					}
					
					$mod_link_id		= request_var('mod_link_id', '');
					$mod_download_count	= request_var('mod_download_count', '');
					$mod_origin			= request_var('mod_origin', '');
					$mod_status			= request_var('mod_status', '');
					$mod_name			= utf8_normalize_nfc(request_var('mod_name', '', true));
					$mod_version		= utf8_normalize_nfc(request_var('mod_version', '', true));
					$mod_author			= utf8_normalize_nfc(request_var('mod_author', '', true));
					$mod_author_co		= utf8_normalize_nfc(request_var('mod_author_co', '', true));
					$mod_link			= utf8_normalize_nfc(request_var('mod_link', '', true));
					$mod_support_link	= utf8_normalize_nfc(request_var('mod_support_link', '', true));
					$mod_copyright		= utf8_normalize_nfc(request_var('mod_copyright', '', true));
					$mod_details		= utf8_normalize_nfc(request_var('mod_details', '', true));
					$mod_image			= utf8_normalize_nfc(request_var('mod_image', '', true));
					$mod_last_update	= utf8_normalize_nfc(request_var('mod_last_updated', '', true));

					$available			= utf8_normalize_nfc(request_var('available', '', true));
					$new_type			= utf8_normalize_nfc(request_var('new_type', '', true));

					if($new_type != $available) $mod_type = $new_type;

					if($mod_name == '') return;

					$sql_array = array(
						'mod_link_id'			=> ($mod_link_id) ? $mod_link_id : 0,
						'mod_copyright'			=> $mod_copyright,
						'mod_name'				=> $mod_name,
						'mod_version'			=> $mod_version,
						'mod_type'				=> $mod_type,
						'mod_origin'			=> $mod_origin,
						'mod_details'			=> $mod_details,
						'mod_author'			=> $mod_author,
						'mod_link'				=> $mod_link,
						'mod_status'			=> ($mod_status) ? $mod_status : 0,
						'mod_thumb'				=> $mod_image,
						'mod_last_update'		=> $mod_last_update,
						'mod_author_co'			=> $mod_author_co,
						'mod_support_link'		=> $mod_support_link,
						'mod_download_count'	=> ($mod_download_count) ? $mod_download_count : 0,
					);

					$db->sql_query('INSERT INTO ' . K_MODULES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_array));

					
					$template->assign_vars(array(
						'S_OPTION' => $mode,
						'MESSAGE' => 'Modules block added',
					));
					
					if($mod_type == 'style' && $submit)
						$mode = 'style';
					unset($submit);

					$cache->destroy('sql', K_MODULES_TABLE);

					meta_refresh(1, "{$phpbb_root_path}adm/index.$phpEx$SID&amp;i=k_modules&amp;mode=" . $mode);
				}
				else
				{ 
					$list = '';

					$sql = 'SELECT DISTINCT mod_id, mod_name, mod_type FROM ' . K_MODULES_TABLE . ' GROUP BY mod_type';
					$result = $db->sql_query($sql);	

					while ($row = $db->sql_fetchrow($result))
					{
						if($row['mod_id'] != 1) // skip welcome_message
						{
							$list .= "'" . $row['mod_name'] . "'";
							$list .= ",";
						}
					}
					$db->sql_freeresult($result);

					if($add_style)
					{
						get_theme_data($list);
					}
					else
						get_mod_types();

					if(!isset($mod_last_update)) $mod_last_update = $today = date("D d M Y");

					$mod_type = (request_var('mod_type', '', true));

					$template->assign_vars(array(
						'S_MOD_LAST_UPDATED'	=> $mod_last_update,
						'S_NEW_TYPE'	=> $mod_type,
						'S_OPTION'		=> ($add_style) ? 'add_style' : 'new',
						'U_BACK'		=> $this->u_action,
						'MESSAGE'		=> 'Adding modules...',
					));
				}
				break;
			}
			case 'delete':
			{
				if (!$id)
				{
					trigger_error($user->lang['MUST_SELECT_VALID_MODULE_DATA'] . adm_back_link($this->u_action), E_USER_WARNING);
				}
		
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . K_MODULES_TABLE . "
						WHERE mod_id = $id";
					$db->sql_query($sql);

					$template->assign_vars(array(
						'S_OPTION'	=> 'delete',
						'MESSAGE'	=> 'Module Block Deleted!</font><br />',
					));

					$cache->destroy('sql', K_MODULES_TABLE);

					meta_refresh(1, "{$phpbb_root_path}adm/index.$phpEx$SID&amp;i=k_modules&amp;mode=all");
					return;
				}
				else
				{ 
					confirm_box(false, $user->lang['CONFIRM_OPERATION_MODULE'], build_hidden_fields(array(
						'i'			=> 'k_modules',
						'mode'		=> $mode,
						'action'	=> 'delete',
					)));
				}				
				break;
			}
			case 'default': 
			break;
		}
	}				
}


include_once($phpbb_root_path . 'includes/sgp_functions.'. $phpEx);


/***
*
*
***/

function get_theme_data($info)
{
	global $db, $template;
	$other = '';


	if($info == 0)
	{
		$sql = 'SELECT style_id, style_name, style_copyright
			FROM ' . STYLES_TABLE . '
				WHERE style_active';
	}
	else
	{
		$other = ' AND style_id = ' . $info;
		$other = rtrim($info, ",");
		$sql = 'SELECT style_id, style_name, style_copyright
			FROM ' . STYLES_TABLE . '
				WHERE style_active' . $other;
	}

	$result = $db->sql_query($sql);	

	while ($row = $db->sql_fetchrow($result))
	{
		$template->assign_block_vars('active_styles', array(
			'STYLE_ID'			=> $row['style_id'],
			'STYLE_NAME'		=> $row['style_name'],
			'STYLE_COPYRIGHT'	=> $row['style_copyright'],
		));
	}
	$db->sql_freeresult($result);
}


/***
*
*
***/
function get_mod_types()
{
	global $db, $template;

	$sql = 'SELECT DISTINCT mod_id, mod_type FROM ' . K_MODULES_TABLE . ' GROUP BY mod_type';
	$result = $db->sql_query($sql);	
				
	while ($row = $db->sql_fetchrow($result))
	{
		if($row['mod_id'] != 1) // skip welcome_message
		{
			$template->assign_block_vars('available', array(
				'S_AVAILABLE_TYPES'	=> $row['mod_type'],
			));
		}
	}
	$db->sql_freeresult($result);
}
?>