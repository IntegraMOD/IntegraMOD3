<?php

/** 
*
* @mod package		Download Mod 6
* @file				acp_downloads.php v 1.6 2008/12/11 OXPUS
* @copyright		(c) 2005 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
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
class acp_downloads
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $cache;
		global $phpbb_root_path, $phpbb_admin_path, $phpEx, $table_prefix;

		// Set up general vars
		$form_key = 'acp_downloads';
		add_form_key($form_key);

		$auth->acl($user->data);
		if (!$auth->acl_get('a_'))
		{
			trigger_error('DL_NO_PERMISSION', E_USER_WARNING);
		}

		include_once($phpbb_root_path . 'includes/functions_content.' . $phpEx);
		include_once($phpbb_root_path . 'dl_mod/classes/class_dlmod.' . $phpEx);

		$user->data['dl_enable_desc'] = $user->data['dl_enable_rule'] = true;

		$this->tpl_name = 'dl_mod/acp_downloads';

		$dl_mod = new dlmod();
		$dl_config = array();
		$dl_config = $dl_mod->get_config();

		$action			= request_var('action', '');
		$submit			= request_var('submit', '');
		$cancel			= request_var('cancel', '');
		$confirm		= request_var('confirm', '');
		$mode			= request_var('mode', 'main');
		$delete			= request_var('delete', '');
		$sorting		= request_var('sorting', '');
		$sort_order		= request_var('sort_order', '');
		$filtering		= request_var('filtering', '');
		$filter_string	= request_var('filter_string', '');
		$func			= request_var('func', '');
		$username		= request_var('username', '');
		$add			= request_var('add', '');
		$edit			= request_var('edit', '');
		$move			= request_var('move', '');
		$save_cat		= request_var('save_cat', '');
		$path			= request_var('path', '');
		$dircreate		= request_var('dircreate', '');
		$dir_name		= request_var('dir_name', '');
		$new_path		= request_var('new_path', '');
		$new_cat		= request_var('new_cat', '');
		$file_command	= request_var('file_command', '');
		$file_assign	= request_var('file_assign', '');
		$x				= request_var('x', '');
		$y				= request_var('y', '');
		$z				= request_var('z', '');
		
		$df_id			= request_var('df_id', 0);
		$cat_id			= request_var('cat_id', 0);
		$new_cat_id		= request_var('new_cat_id', 0);
		$start			= request_var('start', 0);
		$show_guests	= request_var('show_guests', 0);
		$user_id		= request_var('user_id', 0);
		$user_traffic	= request_var('user_traffic', 0);
		$all_traffic	= request_var('all_traffic', 0);
		$group_id		= request_var('group_id', 0);
		$group_traffic	= request_var('group_traffic', 0);
		$group_id		= request_var('g', 0);
		$auth_view		= request_var('auth_view', 0);
		$auth_dl		= request_var('auth_dl', 0);
		$auth_up		= request_var('auth_up', 0);
		$auth_mod		= request_var('auth_mod', 0);
		$del_file		= request_var('del_file', 0);
		$click_reset	= request_var('click_reset', 0);

		if ($action == 'edit')
		{
			$enable_desc = $enable_rule = TRUE;
		}
	
		$dl_admin_path = $phpbb_root_path . "../includes/acp/";
		$basic_link = append_sid("{$phpbb_root_path}adm/index.$phpEx", "i=downloads&amp;mode=$mode");

		/*
		* initiate the help system
		*/
		$template->assign_vars(array(
			'U_HELP_POPUP' => "{$phpbb_root_path}dl_help.$phpEx")
		);

		if ($cancel)
		{
			$action = '';
		}
		
		/*
		* create overall mini statistics
		*/
		$total_todo = sizeof($dl_mod->all_files(0, '', 'ASC', "AND todo <> '' AND todo IS NOT NULL", 0, true, 'id'));
		$total_size = $dl_mod->get_dl_overall_size();
		$total_dl = $dl_mod->get_sublevel_count();
		$total_extern = sizeof($dl_mod->all_files(0, '', 'ASC', "AND extern = 1", 0, true, 'id'));
		
		$physical_limit = $dl_config['physical_quota'];
		$total_size = ($total_size > $physical_limit) ? $physical_limit : $total_size;
		
		$physical_limit = $dl_mod->dl_size($physical_limit, 2);

		/*
		* include the choosen module
		*/		
		switch($mode)
		{
			case 'main':
			case 'overview':
				$this->page_title = 'ACP_DOWNLOADS';
				
				if ($total_dl && $total_size)
				{
					$total_size = $dl_mod->dl_size($total_size, 2);
				
					$template->assign_block_vars('total_stat', array(
						'TOTAL_STAT' => sprintf($user->lang['DL_TOTAL_STAT'], $total_dl, $total_size, $physical_limit, $total_extern))
					);
				}
				
				if ($dl_config['overall_traffic'] - $dl_config['remain_traffic'] <= 0)
				{
					$overall_traffic = $dl_mod->dl_size($dl_config['overall_traffic']);
				
					$template->assign_block_vars('no_remain_traffic', array(
						'NO_OVERALL_TRAFFIC' => sprintf($user->lang['DL_NO_MORE_REMAIN_TRAFFIC'], $overall_traffic))
					);
				}
				else
				{
					$remain_traffic = $dl_config['overall_traffic'] - $dl_config['remain_traffic'];
				
					$remain_text_out = $user->lang['DL_REMAIN_OVERALL_TRAFFIC'] . '<b>' . $dl_mod->dl_size($remain_traffic, 2) . '</b>';
				
					$template->assign_block_vars('remain_traffic', array(
						'REMAIN_TRAFFIC' => $remain_text_out)
					);
				}

				if ($dl_config['overall_guest_traffic'] - $dl_config['remain_guest_traffic'] <= 0)
				{
					$overall_guest_traffic = $dl_mod->dl_size($dl_config['overall_guest_traffic']);
				
					$template->assign_block_vars('no_remain_guest_traffic', array(
						'NO_OVERALL_GUEST_TRAFFIC' => sprintf($user->lang['DL_NO_MORE_REMAIN_GUEST_TRAFFIC'], $overall_guest_traffic))
					);
				}
				else
				{
					$remain_guest_traffic = $dl_config['overall_guest_traffic'] - $dl_config['remain_guest_traffic'];
				
					$remain_guest_text_out = $user->lang['DL_REMAIN_OVERALL_GUEST_TRAFFIC'] . '<b>' . $dl_mod->dl_size($remain_guest_traffic, 2) . '</b>';
				
					$template->assign_block_vars('remain_guest_traffic', array(
						'REMAIN_GUEST_TRAFFIC' => $remain_guest_text_out)
					);
				}

				$template->assign_vars(array(
					'DL_MANAGEMENT_TITLE'	=> $user->lang['DL_ACP_MANAGEMANT_PAGE'],
					'DL_MANAGEMENT_EXPLAIN'	=> $user->lang['DL_ACP_MANAGEMANT_PAGE_EXPLAIN'],
				));
		
				$template->assign_var('S_DL_OVERVIEW', true);
			break;
			case 'config':
				$this->page_title = 'DL_ACP_CONFIG_MANAGEMENT';

				include_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
				include($phpbb_root_path . "dl_mod/admin/dl_admin_config.$phpEx");
			break;
			case 'traffic':
				$this->page_title = 'DL_ACP_TRAFFIC_MANAGEMENT';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_traffic.$phpEx");
			break;
			case 'categories':
				$this->page_title = 'DL_ACP_CATEGORIES_MANAGEMENT';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_categories.$phpEx");
			break;
			case 'files':
				$this->page_title = 'DL_ACP_FILES_MANAGEMENT';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_files.$phpEx");
			break;
			case 'permissions':
				$this->page_title = 'DL_ACP_PERMISSIONS';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_permissions.$phpEx");
			break;
			case 'toolbox':
				$this->page_title = 'DL_MANAGE';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_toolbox.$phpEx");
			break;
			case 'stats':
				$this->page_title = 'DL_ACP_STATS_MANAGEMENT';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_stats.$phpEx");
			break;
			case 'ext_blacklist':
				$this->page_title = 'DL_EXT_BLACKLIST';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_ext_blacklist.$phpEx");
			break;
			case 'banlist':
				$this->page_title = 'DL_ACP_BANLIST';

				include($phpbb_root_path . "dl_mod/admin/dl_admin_banlist.$phpEx");
			break;
		}
	
		$template->assign_vars(array(
			'DL_MOD_RELEASE' => sprintf($user->lang['DL_MOD_VERSION'], $dl_config['dl_mod_version']),
		));
	}
}

?>