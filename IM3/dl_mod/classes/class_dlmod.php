<?php

/** 
*
* @mod package		Download Mod 6
* @file				class_dlmod.php 25 2009/09/16 OXPUS
* @copyright		(c) 2005 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* class dlmod
*
* This class contains the following functions:
* --------------------------------------------
* $dl_mod->dl_cat_auth($cat_id); * Return the group_permissions for the given category
* $dl_mod->get_config(); * Read the basic configuration
* $dl_mod->get_ext_blacklist(); * Returns the extention blacklist, if exists
* $dl_mod->user_auth($cat_id, $perm); * Check a single auth value for the current user
* $dl_mod->files($cat_id, $sql_sort_by, $sql_order, $start, $limit); * Return the download data for each file in the given category
* $dl_mod->all_files($cat_id, $sql_sort_by, $sql_order, $extra_where, $df_id); * Return the download data for all files e.g. for the overview
* $dl_mod->mini_status_cat($parent); * Returns the mini icon for new/edited files in the given category
* $dl_mod->mini_status_file($parent, $file_id); * Returns the mini icon for one given file
* $dl_mod->index(); * Create the viewable index for all or one category
* $dl_mod->full_index($only_cat, $parent, $level, $auth_level); * Create the complete index, e.g. for admin view or downloading an unviewable file
* $dl_mod->get_todo(); * Return all data for the todo list
* $dl_mod->get_dl_overall_size(); * Return the overall file size
* $dl_mod->count_dl_approve(); * Return the number for not approved downloads filtered by user permissions
* $dl_mod->count_comment_approve(); * Return the number for not approved comments filtered by user permissions
* $dl_mod->find_latest_dl($last_data, $parent); * Return the time from the last added or edited download for the given category
* $dl_mod->get_sublevel($cat_id); * Read the sublevel for the given category
* $dl_mod->count_sublevel($cat_id); * Count the existing sub categories of a given category
* $dl_mod->get_sublevel_count($cat_id); * Read the downloads for the given sublevel and each cat in this. Will also be used by $dlmod->get_sublevel($cat_id)!
* $dl_mod->dl_nav($cat_id, $disp_art); * Create the navigation path for the given cat
* $dl_mod->dl_dropdown($cur, $parent, $level, $select_cat, $perm, $rem_cat); * Create the download dropdown for jumpbox or cat select while upload
* $dl_mod->rating_img($rating_points); * Choose the rating image for the given rating points
* $dl_mod->dl_client($client); * Returns the client from the current user
* $dl_mod->dl_size($input_value, $rnd, $out_type); * Format the size fromthe given download filesize
* $dl_mod->dl_prune_stats($cat_id, $stats_prune); * Delete all old stats data
* $dl_mod->stats_perm($cats = array()); * Manage the access permissions for statistics
* $dl_mod->cat_auth_comment_read($cat_id); * Manage the access permissions for reading comments
* $dl_mod->cat_auth_comment_post($cat_id); * Manage the access permissions for posting comments
* $dl_mod->read_exist_files(); * Read all files from the database
* $dl_mod->read_dl_dirs($download_dir, $path); * Read all existing download folders from the server
* $dl_mod->read_dl_files($download_dir, $path); * Read all existing download files from the server
* $dl_mod->read_dl_sizes($download_dir, $path); * Read all existing download filesizes from the server
* $dl_mod->readfile_chunked($filename, $retbytes); * Read the file chunked for download
* $dl_mod->dl_status($df_id); * Get the download status for the given file id
* $dl_mod->dl_auth_users($cat_id, $perm); * Read all user ids for the given download permission
* $dl_mod->bug_tracker(); * Check if the bug tracker will be enabled for at least one category
* $dl_mod->gen_dl_topic($dl_id); * Generate a new topic for the given download
* $dl_mod->delete_topic($topic_id); * Delete created topic for download if download will be deleted before
* $dl_mod->update_topic($topic_id, $dl_id); * Update topic title with new download description, if it was changed 
* $dl_mod->dl_cat_select($parent, $level, $select_cat); * Creates a selectable categories list
*/

class dlmod
{
	/*
	* init basic variables
	*/
	var $dl_auth = array();
	var $dl_config = array();
	var $dl_file = array();
	var $dl_file_icon = array();
	var $dl_index = array();
	var $path_dl_array = array();
	var $ext_blacklist = array();
	var $user_client = 'n/a';
	var $user_dl_update_time = 0;
	var $user_id = ANONYMOUS;
	var $user_admin = 0;
	var $user_logged_in = 0;
	var $user_posts = 0;
	var $user_regdate = 0;
	var $user_traffic = 0;
	var $user_banned = 0;

	/*
	* run the class constructor
	*/
	function dlmod()
	{
		global $db, $auth, $user, $config, $_SERVER, $enable_desc, $enable_rule;

		/*
		* define the current user
		*/
		$this->user_id = $user->data['user_id'];
		$this->user_regdate = $user->data['user_regdate'];
		$this->user_dl_update_time = $user->data['user_dl_update_time'];
		$this->user_traffic = $user->data['user_traffic'];
		$this->user_logged_in = $user->data['is_registered'];
		$this->user_posts = $user->data['user_posts'];
		$this->user_client = strtolower($_SERVER['HTTP_USER_AGENT']);
		$this->username = $user->data['username'];
		$this->user_ip = $user->data['session_ip'];
		$this->user_admin = ($auth->acl_get('a_') && $user->data['is_registered']) ? true : false;
		$this->enable_desc = $user->data['dl_enable_desc'];
		$this->enable_rule = $user->data['dl_enable_rule'];

		/*
		* read the basic configuration
		*/
		$sql = 'SELECT * FROM ' . DL_CONFIG_TABLE;
		$result = $db->sql_query($sql);

		while ( $row = $db->sql_fetchrow($result) )
		{
			$this->dl_config[$row['config_name']] = $row['config_value'];
		}
		$db->sql_freeresult($result);

		/*
		* read the extention blacklist if enabled
		*/
		if ($this->dl_config['use_ext_blacklist'])
		{
			$sql = 'SELECT extention FROM ' . DL_EXT_BLACKLIST . '
				ORDER BY extention';
			$result = $db->sql_query($sql);

			while ( $row = $db->sql_fetchrow($result) )
			{
				$this->ext_blacklist[] = $row['extention'];
			}
			$db->sql_freeresult($result);
		}

		/*
		* disable the extention blacklist if it will be empty
		*/
		if (sizeof($this->ext_blacklist))
		{
			$this->dl_config['enable_blacklist'] = TRUE;
		}
		else
		{
			$this->dl_config['enable_blacklist'] = 0;
		}	

		/*
		* set the overall traffic and categories traffic if needed (each first day of a month)
		*/
		$auto_overall_traffic_month = $user->format_date($this->dl_config['traffic_retime'], 'Ym');
		$current_traffic_month = $user->format_date(time(), 'Ym');

		if ($auto_overall_traffic_month < $current_traffic_month)
		{
			$this->dl_config['traffic_retime'] = time();
			$this->dl_config['remain_traffic'] = 0;
			$this->dl_config['remain_guest_traffic'] = 0;

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => '0')) . "	WHERE config_name = 'remain_traffic'";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => '0')) . "	WHERE config_name = 'remain_guest_traffic'";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => $this->dl_config['traffic_retime'])) . "	WHERE config_name = 'traffic_retime'";
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'cat_traffic_use' => 0));
			$db->sql_query($sql);
		}

		/*
		* reset download clicks (each first day of a month)
		*/
		$auto_click_reset_month = $user->format_date($this->dl_config['dl_click_reset_time'], 'Ym');
		$current_traffic_month = $user->format_date(time(), 'Ym');

		if ($auto_click_reset_month < $current_traffic_month)
		{
			$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'klicks' => 0));
			$db->sql_query($sql);

			$sql = 'UPDATE ' . DL_CONFIG_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
				'config_value' => time())) . " WHERE config_name = 'dl_click_reset_time'";
			$db->sql_query($sql);
		}

		/*
		* set the user traffic if needed (each first day of the month)
		*/
		if ($this->user_id > ANONYMOUS && (intval($this->dl_config['delay_auto_traffic']) == 0 || (time() - $this->user_regdate) / 84600 > $this->dl_config['delay_auto_traffic']))
		{
			$user_auto_traffic_month = $user->format_date($user->data['user_dl_update_time'], 'Ym');
			$current_traffic_month = $user->format_date(time(), 'Ym');

			if ($user_auto_traffic_month < $current_traffic_month)
			{
				$sql = 'SELECT max(g.group_dl_auto_traffic) AS max_traffic FROM ' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug
					WHERE g.group_id = ug.group_id
						AND ug.user_id = ' . $this->user_id . '
						AND ug.user_pending <> ' . true;
				$result = $db->sql_query($sql);
				$max_group_row = $db->sql_fetchfield('max_traffic');
				$db->sql_freeresult($result);

				$user_traffic = (intval($max_group_row) != 0) ? $max_group_row : $this->dl_config['user_dl_auto_traffic'];

				if ($user_traffic > $this->user_traffic)
				{
					$sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
						'user_traffic'			=> $user_traffic,
						'user_dl_update_time'	=> time())) . ' WHERE user_id = ' . $this->user_id;
					$db->sql_query($sql);

					$this->user_traffic = $user_traffic;
				}
			}
		}

		/*
		* read the index
		*/
		$cat_fields = 'id, parent, path, cat_name, sort, auth_view, auth_dl, auth_up, auth_mod, must_approve, allow_mod_desc, statistics, stats_prune, comments, cat_traffic, cat_traffic_use, allow_thumbs, auth_cread, auth_cpost, approve_comments, bug_tracker, dl_topic_forum, dl_topic_text, cat_icon';

		if ($this->enable_desc)
		{
			$cat_fields .= ', description, desc_uid, desc_bitfield, desc_flags';
		}

		if ($this->enable_rule)
		{
			$cat_fields .= ', rules, rules_uid, rules_bitfield, rules_flags';
		}

		$sql = "SELECT $cat_fields FROM " . DL_CAT_TABLE . '
			ORDER BY parent, sort';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$this->dl_index[$row['id']] = $row;

			$this->dl_index[$row['id']]['auth_view_real'] = $this->dl_index[$row['id']]['auth_view'];
			$this->dl_index[$row['id']]['auth_dl_real'] = $this->dl_index[$row['id']]['auth_dl'];
			$this->dl_index[$row['id']]['auth_up_real'] = $this->dl_index[$row['id']]['auth_up'];
			$this->dl_index[$row['id']]['auth_mod_real'] = $this->dl_index[$row['id']]['auth_mod'];

			// check the default cat permissions
			if ($this->dl_index[$row['id']]['auth_view'] == 1 || ($this->dl_index[$row['id']]['auth_view'] == 2 && $this->user_logged_in))
			{
				$this->dl_index[$row['id']]['auth_view'] = true;
			}
			else
			{
				$this->dl_index[$row['id']]['auth_view'] = false;
			}
	
			if ($this->dl_index[$row['id']]['auth_dl'] == 1 || ($this->dl_index[$row['id']]['auth_dl'] == 2 && $this->user_logged_in))
			{
				$this->dl_index[$row['id']]['auth_dl'] = true;
			}
			else
			{
				$this->dl_index[$row['id']]['auth_dl'] = false;
			}
	
			if ($this->dl_index[$row['id']]['auth_up'] == 1 || ($this->dl_index[$row['id']]['auth_up'] == 2 && $this->user_logged_in))
			{
				$this->dl_index[$row['id']]['auth_up'] = true;
			}
			else
			{
				$this->dl_index[$row['id']]['auth_up'] = false;
			}
	
			if ($this->dl_index[$row['id']]['auth_mod'] == 1 || ($this->dl_index[$row['id']]['auth_mod'] == 2 && $this->user_logged_in))
			{
				$this->dl_index[$row['id']]['auth_mod'] = true;
			}
			else
			{
				$this->dl_index[$row['id']]['auth_mod'] = false;
			}
		}

		$db->sql_freeresult($result);

		/*
		* count all files per category
		*/
		$sql = 'SELECT COUNT(id) AS total, cat FROM ' . DOWNLOADS_TABLE . '
			GROUP BY cat';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$this->dl_index[$row['cat']]['total'] = $row['total'];
		}
		$db->sql_freeresult($result);

		/*
		* get the user permissions
		*/
		$auth_perm = $auth_cat = $cat_auth_array = $group_ids = $group_perm_ids = array();

		$sql = 'SELECT * FROM ' . DL_AUTH_TABLE;
		$result = $db->sql_query($sql);

		$total_perms = $db->sql_affectedrows($result);

		if ($total_perms)
		{
			while ($row = $db->sql_fetchrow($result))
			{
				$cat_id = $row['cat_id'];
				$group_id = $row['group_id'];

				$auth_cat[] = $cat_id;
				$group_perm_ids[] = $group_id;

				$auth_perm[$cat_id][$group_id]['auth_view'] = $row['auth_view'];
				$auth_perm[$cat_id][$group_id]['auth_dl'] = $row['auth_dl'];
				$auth_perm[$cat_id][$group_id]['auth_up'] = $row['auth_up'];
				$auth_perm[$cat_id][$group_id]['auth_mod'] = $row['auth_mod'];
			}
			$db->sql_freeresult($result);

			if ($total_perms > 1)
			{
				$auth_cat = array_unique($auth_cat);
				sort($auth_cat);
			}

			$sql = 'SELECT group_id FROM ' . USER_GROUP_TABLE . '
				WHERE ' . $db->sql_in_set('group_id', $group_perm_ids) . '
					AND user_id = ' . $this->user_id . '
					AND user_pending <> ' . true;
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$group_ids[] = $row['group_id'];
			}
			$db->sql_freeresult($result);

			for ($i = 0; $i < count($auth_cat); $i++)
			{
				$auth_view = $auth_dl = $auth_up = $auth_mod = 0;
				$cat = $auth_cat[$i];

				for ($j = 0; $j < count($group_ids); $j++)
				{
					$user_group = $group_ids[$j];

					if (isset($auth_perm[$cat][$user_group]['auth_view']) && $auth_perm[$cat][$user_group]['auth_view'] == TRUE)
					{
						$auth_view = TRUE;
					}
					if (isset($auth_perm[$cat][$user_group]['auth_dl']) && $auth_perm[$cat][$user_group]['auth_dl'] == TRUE)
					{
						$auth_dl = TRUE;
					}
					if (isset($auth_perm[$cat][$user_group]['auth_up']) && $auth_perm[$cat][$user_group]['auth_up'] == TRUE)
					{
						$auth_up = TRUE;
					}
					if (isset($auth_perm[$cat][$user_group]['auth_mod']) && $auth_perm[$cat][$user_group]['auth_mod'] == TRUE)
					{
						$auth_mod = TRUE;
					}
				}

				$cat_auth_array[$cat]['auth_view'] = $auth_view;
				$cat_auth_array[$cat]['auth_dl'] = $auth_dl;
				$cat_auth_array[$cat]['auth_up'] = $auth_up;
				$cat_auth_array[$cat]['auth_mod'] = $auth_mod;
			}
		}
		else
		{
			$db->sql_freeresult($result);
		}

		$this->dl_auth = $cat_auth_array;

		/*
		* preset all files
		*/
		$sql = 'SELECT change_time, add_time, id, cat, file_name, real_file, file_size, extern, free, file_traffic, klicks FROM ' . DOWNLOADS_TABLE . '
				WHERE approve = ' . true;
		$result = $db->sql_query($sql);

		$this->dl_file_icon['new'] = array();
		$this->dl_file_icon['new_sum'] = array();
		$this->dl_file_icon['edit'] = array();
		$this->dl_file_icon['edit_sum'] = array();
		$this->dl_file_icon['id'] = array();

		while ($row = $db->sql_fetchrow($result))
		{
			$cat_id = $row['cat'];
			$dl_id = $row['id'];
			$change_time = $row['change_time'];
			$add_time = $row['add_time'];

			if (!isset($this->dl_file_icon['new'][$cat_id]))
			{
				$this->dl_file_icon['new'][$cat_id][$dl_id] = 0;
			}
			if (!isset($this->dl_file_icon['new_sum'][$cat_id]))
			{
				$this->dl_file_icon['new_sum'][$cat_id] = 0;
			}
			if (!isset($this->dl_file_icon['edit'][$cat_id]))
			{
				$this->dl_file_icon['edit'][$cat_id][$dl_id] = 0;
			}
			if (!isset($this->dl_file_icon['edit_sum'][$cat_id]))
			{
				$this->dl_file_icon['edit_sum'][$cat_id] = 0;
			}

			$count_new = ($change_time == $add_time && ((time() - $change_time)) / 86400 <= $this->dl_config['dl_new_time'] && $this->dl_config['dl_new_time'] > 0) ? 1 : 0;
			$count_edit = ($change_time != $add_time && ((time() - $change_time) / 86400) <= $this->dl_config['dl_edit_time'] && $this->dl_config['dl_edit_time'] > 0) ? 1 : 0;

			$this->dl_file_icon['new'][$cat_id][$dl_id] = $count_new;
			$this->dl_file_icon['new_sum'][$cat_id] += $count_new;
			$this->dl_file_icon['edit'][$cat_id][$dl_id] = $count_edit;
			$this->dl_file_icon['edit_sum'][$cat_id] += $count_edit;
			$this->dl_file[$dl_id] = $row;
		}
		$db->sql_freeresult($result);

		/*
		* get ban status for current user
		*/
		$sql_guests = (!$this->user_logged_in) ? " OR guests = 1 " : '';

		$sql = 'SELECT ban_id FROM ' . DL_BANLIST_TABLE . '
			WHERE user_id = ' . $this->user_id . "
				OR user_ip = '" . $this->user_ip . "'
				OR user_agent " . $db->sql_like_expression($this->dl_client()) . "
				OR username = '" . $this->username . "'
				$sql_guests";
		$result = $db->sql_query($sql);

		$total_ban_ids = $db->sql_affectedrows($result);
		$db->sql_freeresult($result);

		if ($total_ban_ids)
		{
			$this->user_banned = true;
		}

		return;
	}

	function dl_cat_auth($cat_id)
	{
		$cat_perm = array();

		$cat_perm['auth_view'] = (isset($this->dl_auth[$cat_id]['auth_view'])) ? intval($this->dl_auth[$cat_id]['auth_view']) : 0;
		$cat_perm['auth_dl'] = (isset($this->dl_auth[$cat_id]['auth_dl'])) ? intval($this->dl_auth[$cat_id]['auth_dl']) : 0;
		$cat_perm['auth_mod'] = (isset($this->dl_auth[$cat_id]['auth_mod'])) ? intval($this->dl_auth[$cat_id]['auth_mod']) : 0;
		$cat_perm['auth_up'] = (isset($this->dl_auth[$cat_id]['auth_up'])) ? intval($this->dl_auth[$cat_id]['auth_up']) : 0;
		$cat_perm['auth_cread'] = (isset($this->dl_auth[$cat_id]['auth_cread'])) ? intval($this->dl_auth[$cat_id]['auth_cread']) : 0;
		$cat_perm['auth_cpost'] = (isset($this->dl_auth[$cat_id]['auth_cpost'])) ? intval($this->dl_auth[$cat_id]['auth_cpost']) : 0;

		return $cat_perm;
	}

	function get_config()
	{
		global $phpbb_root_path;

		$this->dl_config['dl_path'] = $phpbb_root_path . $this->dl_config['download_dir'];

		return $this->dl_config;
	}

	function get_ext_blacklist()
	{
		return $this->ext_blacklist;
	}

	function user_auth($cat_id, $perm)
	{
		if ((isset($this->dl_auth[$cat_id][$perm]) && $this->dl_auth[$cat_id][$perm]) || (isset($this->dl_index[$cat_id][$perm]) && $this->dl_index[$cat_id][$perm]) || $this->user_admin)
		{
			return true;
		}

		return false;
	}

	function files($cat_id, $sql_sort_by, $sql_order, $start, $limit, $sql_fields = '*')
	{
		global $db;

		$dl_files = array();

		$sql = "SELECT $sql_fields FROM " . DOWNLOADS_TABLE . "
			WHERE cat = $cat_id
				AND approve = " . true . "
			ORDER BY $sql_sort_by $sql_order";
		if ($limit)
		{
			$result = $db->sql_query_limit($sql, $limit, $start);
		}
		else
		{
			$result = $db->sql_query($sql);
		}

		while ($row = $db->sql_fetchrow($result))
		{
			$dl_files[] = $row;
		}
		$db->sql_freeresult($result);

		return $dl_files;
	}

	function all_files($cat_id, $sql_sort_by, $sql_order, $extra_where, $df_id, $modcp, $sql_fields)
	{
		global $db;

		$dl_files = array();

		$sql = "SELECT $sql_fields FROM " . DOWNLOADS_TABLE;
		$sql .= ($modcp) ? ' WHERE ' . $db->sql_in_set('approve', array(0, 1)) : ' WHERE approve = 1';
		$sql .= ($cat_id) ? " AND cat = $cat_id " : '';
		$sql .= ($df_id) ? " AND id = $df_id " : '';
		$sql .= ($extra_where) ? " $extra_where " : '';
		$sql .= ($sql_sort_by) ? " ORDER BY $sql_sort_by $sql_order" : '';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$dl_files[] = $row;
		}
		$db->sql_freeresult($result);

		return ($df_id) ? ((isset($dl_files[0])) ? $dl_files[0] : array()) : $dl_files;
	}

	function mini_status_cat($cur, $parent, $flag = 0)
	{
		$mini_status_icon[$cur]['new'] = 0;
		$mini_status_icon[$cur]['edit'] = 0;

		foreach($this->dl_index as $cat_id => $value)
		{
			if ($cat_id == $parent && !$flag)
			{
				if ((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view'])))
				{
					if (isset($this->dl_index[$cat_id]['total']))
					{
						$new_sum = (isset($this->dl_file_icon['new_sum'][$cat_id])) ? intval($this->dl_file_icon['new_sum'][$cat_id]) : 0;
						$edit_sum = (isset($this->dl_file_icon['edit_sum'][$cat_id])) ? intval($this->dl_file_icon['edit_sum'][$cat_id]) : 0;

						$mini_status_icon[$cur]['new'] += $new_sum;
						$mini_status_icon[$cur]['edit'] += $edit_sum;
					}
				}

				$mini_icon = $this->mini_status_cat($cur, $cat_id, 1);
				$mini_status_icon[$cur]['new'] += $mini_icon[$cur]['new'];
				$mini_status_icon[$cur]['edit'] += $mini_icon[$cur]['edit'];
			}

			if ((isset($this->dl_index[$cat_id]['parent']) && $this->dl_index[$cat_id]['parent'] == $parent) && $flag)
			{
				if ((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view'])))
				{
					if (isset($this->dl_index[$cat_id]['total']))
					{
						$new_sum = (isset($this->dl_file_icon['new_sum'][$cat_id])) ? intval($this->dl_file_icon['new_sum'][$cat_id]) : 0;
						$edit_sum = (isset($this->dl_file_icon['edit_sum'][$cat_id])) ? intval($this->dl_file_icon['edit_sum'][$cat_id]) : 0;

						$mini_status_icon[$cur]['new'] += $new_sum;
						$mini_status_icon[$cur]['edit'] += $edit_sum;
					}
				}

				$mini_icon = $this->mini_status_cat($cur, $cat_id, 1);
				$mini_status_icon[$cur]['new'] += $mini_icon[$cur]['new'];
				$mini_status_icon[$cur]['edit'] += $mini_icon[$cur]['edit'];
			}
		}

		return $mini_status_icon;
	}

	function mini_status_file($parent, $file_id)
	{
		global $user;

		if (isset($this->dl_file_icon['new'][$parent][$file_id]) && $this->dl_file_icon['new'][$parent][$file_id] == true)
		{
			$mini_icon_img = $user->img('dl_file_new');
		}
		else if (isset($this->dl_file_icon['edit'][$parent][$file_id]) && $this->dl_file_icon['edit'][$parent][$file_id] == true)
		{
			$mini_icon_img = $user->img('dl_file_edit');
		}
		else
		{
			$mini_icon_img = '';
		}

		return $mini_icon_img;
	}

	function index($parent = 0)
	{
		global $phpEx, $phpbb_root_path;

		$tree_dl = array();

		foreach($this->dl_index as $cat_id => $value)
		{
			if (((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view']) && $this->dl_auth[$cat_id]['auth_view']) || $this->user_admin) && (isset($this->dl_index[$cat_id]['parent']) && $this->dl_index[$cat_id]['parent'] == $parent))
			{
				$tree_dl[$cat_id]['description'] = (isset($this->dl_index[$cat_id]['description'])) ? $this->dl_index[$cat_id]['description'] : '';
				$tree_dl[$cat_id]['rules'] = (isset($this->dl_index[$cat_id]['rules'])) ? $this->dl_index[$cat_id]['rules'] : '';

				$tree_dl[$cat_id]['desc_uid'] = (isset($this->dl_index[$cat_id]['desc_uid'])) ? $this->dl_index[$cat_id]['desc_uid'] : '';
				$tree_dl[$cat_id]['desc_bitfield'] = (isset($this->dl_index[$cat_id]['desc_bitfield'])) ? $this->dl_index[$cat_id]['desc_bitfield'] : '';
				$tree_dl[$cat_id]['desc_flags'] = (isset($this->dl_index[$cat_id]['desc_flags'])) ? $this->dl_index[$cat_id]['desc_flags'] : '';

				$tree_dl[$cat_id]['rules_uid'] = (isset($this->dl_index[$cat_id]['rules_uid'])) ? $this->dl_index[$cat_id]['rules_uid'] : '';
				$tree_dl[$cat_id]['rules_bitfield'] = (isset($this->dl_index[$cat_id]['rules_bitfield'])) ? $this->dl_index[$cat_id]['rules_bitfield'] : '';
				$tree_dl[$cat_id]['rules_flags'] = (isset($this->dl_index[$cat_id]['rules_flags'])) ? $this->dl_index[$cat_id]['rules_flags'] : '';

				$tree_dl[$cat_id]['cat_name'] = $this->dl_index[$cat_id]['cat_name'];
				$tree_dl[$cat_id]['cat_icon'] = (isset($this->dl_index[$cat_id]['cat_icon']) && $this->dl_index[$cat_id]['cat_icon'] != '') ? generate_board_url() . '/' . $this->dl_index[$cat_id]['cat_icon'] : generate_board_url() . '/images/spacer.gif';
				$tree_dl[$cat_id]['nav_path'] = append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$cat_id");
				$tree_dl[$cat_id]['cat_path'] = $this->dl_index[$cat_id]['path'];
				$tree_dl[$cat_id]['total'] = (isset($this->dl_index[$cat_id]['total'])) ? $this->dl_index[$cat_id]['total'] : 0;

				$tree_dl[$cat_id]['auth_view_real'] = $this->dl_index[$cat_id]['auth_view_real'];
				$tree_dl[$cat_id]['auth_dl_real'] = $this->dl_index[$cat_id]['auth_dl_real'];
				$tree_dl[$cat_id]['auth_up_real'] = $this->dl_index[$cat_id]['auth_up_real'];
				$tree_dl[$cat_id]['auth_mod_real'] = $this->dl_index[$cat_id]['auth_mod_real'];
				$tree_dl[$cat_id]['auth_view'] = $this->dl_index[$cat_id]['auth_view'];
				$tree_dl[$cat_id]['auth_dl'] = $this->dl_index[$cat_id]['auth_dl'];
				$tree_dl[$cat_id]['auth_up'] = $this->dl_index[$cat_id]['auth_up'];
				$tree_dl[$cat_id]['auth_mod'] = $this->dl_index[$cat_id]['auth_mod'];
				$tree_dl[$cat_id]['auth_cread'] = $this->dl_index[$cat_id]['auth_cread'];
				$tree_dl[$cat_id]['auth_cpost'] = $this->dl_index[$cat_id]['auth_cpost'];

				$tree_dl[$cat_id]['allow_mod_desc'] = $this->dl_index[$cat_id]['allow_mod_desc'];
				$tree_dl[$cat_id]['must_approve'] = $this->dl_index[$cat_id]['must_approve'];

				$tree_dl[$cat_id]['comments'] = $this->dl_index[$cat_id]['comments'];
				$tree_dl[$cat_id]['statistics'] = $this->dl_index[$cat_id]['statistics'];
				$tree_dl[$cat_id]['stats_prune'] = $this->dl_index[$cat_id]['stats_prune'];

				$tree_dl[$cat_id]['cat_traffic'] = $this->dl_index[$cat_id]['cat_traffic'];
				$tree_dl[$cat_id]['cat_traffic_use'] = $this->dl_index[$cat_id]['cat_traffic_use'];

				$tree_dl[$cat_id]['allow_thumbs'] = $this->dl_index[$cat_id]['allow_thumbs'];
				$tree_dl[$cat_id]['approve_comments'] = $this->dl_index[$cat_id]['approve_comments'];

				$tree_dl[$cat_id]['bug_tracker'] = $this->dl_index[$cat_id]['bug_tracker'];

				$tree_dl[$cat_id]['dl_topic_forum'] = (isset($this->dl_index[$cat_id]['dl_topic_forum'])) ? $this->dl_index[$cat_id]['dl_topic_forum'] : 0;
				$tree_dl[$cat_id]['dl_topic_text'] = (isset($this->dl_index[$cat_id]['dl_topic_text'])) ? $this->dl_index[$cat_id]['dl_topic_text'] : '';

				$tree_dl[$cat_id]['sublevel'] = $this->get_sublevel($cat_id);
			}
		}
		return $tree_dl;
	}

	function full_index($only_cat = 0, $parent = 0, $level = 0, $auth_level = 0)
	{
		global $phpEx, $tree_dl, $phpbb_root_path, $access_ids;

		if ($only_cat)
		{
			$tree_dl[$only_cat]['description'] = (isset($this->dl_index[$only_cat]['description'])) ? $this->dl_index[$only_cat]['description'] : '';
	 		$tree_dl[$only_cat]['rules'] = (isset($this->dl_index[$only_cat]['rules'])) ? $this->dl_index[$only_cat]['rules'] : '';
			$tree_dl[$only_cat]['cat_name'] = $this->dl_index[$only_cat]['cat_name'];
			$tree_dl[$only_cat]['cat_icon'] = (isset($this->dl_index[$only_cat]['cat_icon']) && $this->dl_index[$only_cat]['cat_icon'] != '') ? generate_board_url() . '/' . $this->dl_index[$only_cat]['cat_icon'] : generate_board_url() . '/images/spacer.gif';

			$tree_dl[$only_cat]['desc_uid'] = (isset($this->dl_index[$only_cat]['desc_uid'])) ? $this->dl_index[$only_cat]['desc_uid'] : '';
			$tree_dl[$only_cat]['desc_bitfield'] = (isset($this->dl_index[$only_cat]['desc_bitfield'])) ? $this->dl_index[$only_cat]['desc_bitfield'] : '';
			$tree_dl[$only_cat]['desc_flags'] = (isset($this->dl_index[$only_cat]['desc_flags'])) ? $this->dl_index[$only_cat]['desc_flags'] : '';

			$tree_dl[$only_cat]['rules_uid'] = (isset($this->dl_index[$only_cat]['rules_uid'])) ? $this->dl_index[$only_cat]['rules_uid'] : '';
			$tree_dl[$only_cat]['rules_bitfield'] = (isset($this->dl_index[$only_cat]['rules_bitfield'])) ? $this->dl_index[$only_cat]['rules_bitfield'] : '';
			$tree_dl[$only_cat]['rules_flags'] = (isset($this->dl_index[$only_cat]['rules_flags'])) ? $this->dl_index[$only_cat]['rules_flags'] : '';

			$tree_dl[$only_cat]['nav_path'] = append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$only_cat");
			$tree_dl[$only_cat]['cat_path'] = $this->dl_index[$only_cat]['path'];
			$tree_dl[$only_cat]['total'] = (isset($this->dl_index[$only_cat]['total'])) ? $this->dl_index[$only_cat]['total'] : 0;

			$tree_dl[$only_cat]['auth_view_real'] = $this->dl_index[$only_cat]['auth_view_real'];
			$tree_dl[$only_cat]['auth_dl_real'] = $this->dl_index[$only_cat]['auth_dl_real'];
			$tree_dl[$only_cat]['auth_up_real'] = $this->dl_index[$only_cat]['auth_up_real'];
			$tree_dl[$only_cat]['auth_mod_real'] = $this->dl_index[$only_cat]['auth_mod_real'];
			$tree_dl[$only_cat]['auth_view'] = $this->dl_index[$only_cat]['auth_view'];
			$tree_dl[$only_cat]['auth_dl'] = $this->dl_index[$only_cat]['auth_dl'];
			$tree_dl[$only_cat]['auth_up'] = $this->dl_index[$only_cat]['auth_up'];
			$tree_dl[$only_cat]['auth_mod'] = $this->dl_index[$only_cat]['auth_mod'];
			$tree_dl[$only_cat]['auth_cread'] = $this->dl_index[$only_cat]['auth_cread'];
			$tree_dl[$only_cat]['auth_cpost'] = $this->dl_index[$only_cat]['auth_cpost'];

			$tree_dl[$only_cat]['allow_mod_desc'] = $this->dl_index[$only_cat]['allow_mod_desc'];
			$tree_dl[$only_cat]['must_approve'] = $this->dl_index[$only_cat]['must_approve'];

			$tree_dl[$only_cat]['comments'] = $this->dl_index[$only_cat]['comments'];
			$tree_dl[$only_cat]['statistics'] = $this->dl_index[$only_cat]['statistics'];
			$tree_dl[$only_cat]['stats_prune'] = $this->dl_index[$only_cat]['stats_prune'];

			$tree_dl[$only_cat]['cat_traffic'] = $this->dl_index[$only_cat]['cat_traffic'];
			$tree_dl[$only_cat]['cat_traffic_use'] = $this->dl_index[$only_cat]['cat_traffic_use'];

			$tree_dl[$only_cat]['allow_thumbs'] = $this->dl_index[$only_cat]['allow_thumbs'];
			$tree_dl[$only_cat]['approve_comments'] = $this->dl_index[$only_cat]['approve_comments'];

			$tree_dl[$only_cat]['dl_topic_forum'] = (isset($this->dl_index[$only_cat]['dl_topic_forum'])) ? $this->dl_index[$only_cat]['dl_topic_forum'] : 0;
			$tree_dl[$only_cat]['dl_topic_text'] = (isset($this->dl_index[$only_cat]['dl_topic_text'])) ? $this->dl_index[$only_cat]['dl_topic_text'] : '';

			$tree_dl[$only_cat]['bug_tracker'] = $this->dl_index[$only_cat]['bug_tracker'];
		}
		else
		{
			foreach($this->dl_index as $cat_id => $value)
			{
				if (isset($this->dl_index[$cat_id]['auth_view']) || isset($this->dl_auth[$cat_id]['auth_view']) || $this->user_admin)
				{
					/*
					* $auth level will return the following data
					* 0 = Default values for each category
					* 1 = IDs from all viewable categories
					* 2 = IDs from moderated categories
					* 3 = IDs from upload categories
					*/

					if ($auth_level == 1 && $this->dl_index[$cat_id]['id'])
					{
						$access_ids[] = $cat_id;
					}
					else if ($auth_level == 2 && isset($this->dl_index[$cat_id]['id']) && (isset($this->dl_index[$cat_id]['auth_mod']) || isset($this->dl_auth[$cat_id]['auth_mod']) || $this->user_admin))
					{
						$access_ids[] = $cat_id;
					}
					else if ($auth_level == 3 && isset($this->dl_index[$cat_id]['id']) && (isset($this->dl_index[$cat_id]['auth_up']) || isset($this->dl_auth[$cat_id]['auth_up']) || $this->user_admin))
					{
						$access_ids[] = $cat_id;
					}
					else if ($this->dl_index[$cat_id]['parent'] == $parent)
					{
						$seperator = '';
						for ($i = 0; $i < $level; $i++)
						{
							$seperator .= ($this->dl_index[$cat_id]['parent'] != 0) ? '&nbsp;&nbsp;|___&nbsp;' : '';
						}

						$tree_dl[$cat_id]['description'] = (isset($this->dl_index[$cat_id]['description'])) ? $this->dl_index[$cat_id]['description'] : '';
						$tree_dl[$cat_id]['rules'] = (isset($this->dl_index[$cat_id]['rules'])) ? $this->dl_index[$cat_id]['rules'] : '';
						$tree_dl[$cat_id]['cat_name'] = $seperator.$this->dl_index[$cat_id]['cat_name'];
						$tree_dl[$cat_id]['cat_icon'] = (isset($this->dl_index[$cat_id]['cat_icon']) && $this->dl_index[$cat_id]['cat_icon'] != '') ? generate_board_url() . '/' . $this->dl_index[$cat_id]['cat_icon'] : generate_board_url() . '/images/spacer.gif';

						$tree_dl[$cat_id]['desc_uid'] = (isset($this->dl_index[$cat_id]['desc_uid'])) ? $this->dl_index[$cat_id]['desc_uid'] : '';
						$tree_dl[$cat_id]['desc_bitfield'] = (isset($this->dl_index[$cat_id]['desc_bitfield'])) ? $this->dl_index[$cat_id]['desc_bitfield'] : '';
						$tree_dl[$cat_id]['desc_flags'] = (isset($this->dl_index[$cat_id]['desc_flags'])) ? $this->dl_index[$cat_id]['desc_flags'] : '';
				
						$tree_dl[$cat_id]['rules_uid'] = (isset($this->dl_index[$cat_id]['rules_uid'])) ? $this->dl_index[$cat_id]['rules_uid'] : '';
						$tree_dl[$cat_id]['rules_bitfield'] = (isset($this->dl_index[$cat_id]['rules_bitfield'])) ? $this->dl_index[$cat_id]['rules_bitfield'] : '';
						$tree_dl[$cat_id]['rules_flags'] = (isset($this->dl_index[$cat_id]['rules_flags'])) ? $this->dl_index[$cat_id]['rules_flags'] : '';
				
						$tree_dl[$cat_id]['nav_path'] = append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$cat_id");
						$tree_dl[$cat_id]['cat_path'] = $this->dl_index[$cat_id]['path'];
						$tree_dl[$cat_id]['total'] = (isset($this->dl_index[$cat_id]['total'])) ? $this->dl_index[$cat_id]['total'] : 0;
						$tree_dl[$cat_id]['parent'] = intval($this->dl_index[$cat_id]['parent']);

						$tree_dl[$cat_id]['auth_view_real'] = $this->dl_index[$cat_id]['auth_view_real'];
						$tree_dl[$cat_id]['auth_dl_real'] = $this->dl_index[$cat_id]['auth_dl_real'];
						$tree_dl[$cat_id]['auth_up_real'] = $this->dl_index[$cat_id]['auth_up_real'];
						$tree_dl[$cat_id]['auth_mod_real'] = $this->dl_index[$cat_id]['auth_mod_real'];
						$tree_dl[$cat_id]['auth_view'] = $this->dl_index[$cat_id]['auth_view'];
						$tree_dl[$cat_id]['auth_dl'] = $this->dl_index[$cat_id]['auth_dl'];
						$tree_dl[$cat_id]['auth_up'] = $this->dl_index[$cat_id]['auth_up'];
						$tree_dl[$cat_id]['auth_mod'] = $this->dl_index[$cat_id]['auth_mod'];
						$tree_dl[$cat_id]['auth_cread'] = $this->dl_index[$cat_id]['auth_cread'];
						$tree_dl[$cat_id]['auth_cpost'] = $this->dl_index[$cat_id]['auth_cpost'];

						$tree_dl[$cat_id]['allow_mod_desc'] = $this->dl_index[$cat_id]['allow_mod_desc'];
						$tree_dl[$cat_id]['must_approve'] = $this->dl_index[$cat_id]['must_approve'];

						$tree_dl[$cat_id]['comments'] = $this->dl_index[$cat_id]['comments'];
						$tree_dl[$cat_id]['statistics'] = $this->dl_index[$cat_id]['statistics'];
						$tree_dl[$cat_id]['stats_prune'] = $this->dl_index[$cat_id]['stats_prune'];

						$tree_dl[$cat_id]['cat_traffic'] = $this->dl_index[$cat_id]['cat_traffic'];
						$tree_dl[$cat_id]['cat_traffic_use'] = $this->dl_index[$cat_id]['cat_traffic_use'];

						$tree_dl[$cat_id]['allow_thumbs'] = $this->dl_index[$cat_id]['allow_thumbs'];
						$tree_dl[$cat_id]['approve_comments'] = $this->dl_index[$cat_id]['approve_comments'];

						$tree_dl[$cat_id]['dl_topic_forum'] = (isset($this->dl_index[$cat_id]['dl_topic_forum'])) ? $this->dl_index[$cat_id]['dl_topic_forum'] : 0;
						$tree_dl[$cat_id]['dl_topic_text'] = (isset($this->dl_index[$cat_id]['dl_topic_text'])) ? $this->dl_index[$cat_id]['dl_topic_text'] : '';

						$tree_dl[$cat_id]['bug_tracker'] = $this->dl_index[$cat_id]['bug_tracker'];

						$level++;
						$this->full_index(0, $cat_id, $level, 0);
						$level--;
					}
				}
			}
		}

		return (isset($auth_level) && $auth_level <> 0) ? $access_ids : $tree_dl;
	}

	function get_todo()
	{
		global $phpEx, $phpbb_root_path;

		$todo = array();

		$dl_files = $this->all_files(0, '', 'ASC', "AND todo <> '' AND todo IS NOT NULL", 0, 0, 'cat, id, description, hack_version, todo');
		$dl_cats = $this->full_index(0, 0, 0, 1);

		for ($i = 0; $i < sizeof($dl_files); $i++)
		{
			$cat_id = $dl_files[$i]['cat'];
			if (in_array($cat_id, $dl_cats))
			{
				$file_link = append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=" . $dl_files[$i]['id']);
				$file_name = $dl_files[$i]['description'];
				$hack_version = ($dl_files[$i]['hack_version'] != '') ? ' ' . $dl_files[$i]['hack_version'] : '';

				$todo_text = $dl_files[$i]['todo'];
				$todo_text = str_replace("\n", "\n<br />\n", $todo_text);

				$todo['file_link'][] = $file_link;
				$todo['file_name'][] = $file_name;
				$todo['hack_version'][] = $hack_version;
				$todo['todo'][] = $todo_text;
				$todo['df_id'][] = $dl_files[$i]['id'];
			}
		}

		return $todo;
	}

	function get_dl_overall_size()
	{
		global $phpEx;

		$overall_size = 0;

		$dl_files = array();
		$dl_files = $this->all_files(0, '', '', '', 0, true, 'cat, file_size');
		$dl_cats = array();
		$dl_cats = $this->full_index(0, 0, 0, 1);

		if (sizeof($dl_cats))
		{
			for ($i = 0; $i < sizeof($dl_files); $i++)
			{
				$cat_id = $dl_files[$i]['cat'];
				if (in_array($cat_id, $dl_cats))
				{
					if ($dl_files[$i]['file_size'] >= 0)
					{
						$overall_size += $dl_files[$i]['file_size'];
					}
				}
			}
		}

		return $overall_size;
	}

	function count_dl_approve()
	{
		global $db;

		if (!$this->user_logged_in)
		{
			return 0;
		}

		$access_cats = array();
		$access_cats = $this->full_index(0, 0, 0, 2);
		if (!$access_cats && !$this->user_admin)
		{
			return 0;
		}
			
		$sql_access_cats = ($this->user_admin) ? '' : ' AND ' . $db->sql_in_set('cat', $access_cats);

		$sql = 'SELECT COUNT(id) AS total FROM ' . DOWNLOADS_TABLE . "
			WHERE approve = 0
				$sql_access_cats";
		$result = $db->sql_query($sql);
		$total = $db->sql_fetchfield('total');
		$db->sql_freeresult($result);

		return $total;
	}

	function count_comments_approve()
	{
		global $db;

		if (!$this->user_logged_in)
		{
			return 0;
		}

		$access_cats = array();
		$access_cats = $this->full_index(0, 0, 0, 2);
		if (!$access_cats && !$this->user_admin)
		{
			return 0;
		}

		$sql_access_cats = ($this->user_admin) ? '' : ' AND ' . $db->sql_in_set('cat_id', $access_cats);

		$sql = 'SELECT COUNT(dl_id) AS total FROM ' . DL_COMMENTS_TABLE . "
			WHERE approve = 0
				$sql_access_cats";
		$result = $db->sql_query($sql);
		$total = $db->sql_fetchfield('total');
		$db->sql_freeresult($result);

		return $total;
	}

	function find_latest_dl($last_data, $parent, $main_cat, $last_dl_time)
	{
		foreach($last_data as $cat_id => $value)
		{
			if ($last_data[$cat_id]['parent'] == $parent || $main_cat == $cat_id)
			{
				$last_cat_time = (isset($last_data[$cat_id]['change_time'])) ? $last_data[$cat_id]['change_time'] : 0;
				$last_dl_times = (isset($last_dl_time['change_time'])) ? $last_dl_time['change_time'] : 0;

				if ($last_cat_time > $last_dl_times && ((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view']) && $this->dl_auth[$cat_id]['auth_view']) || $this->user_admin))
				{
					$last_dl_time['change_time'] = $last_cat_time;
					$last_dl_time['cat_id'] = $cat_id;
				}

				$last_temp = $this->find_latest_dl($last_data, $cat_id, -1, $last_dl_time);
				$last_temp_time = (isset($last_temp['change_time'])) ? $last_temp['change_time'] : 0;
				$last_dl_times = (isset($last_dl_time['change_time'])) ? $last_dl_time['change_time'] : 0;

				if ($last_temp_time > $last_dl_times)
				{
					$last_dl_time['change_time'] = $last_temp['change_time'];
					$last_dl_time['cat_id'] = $last_temp['cat_id'];
				}
			}
		}

		return $last_dl_time;
	}

	function get_sublevel($parent)
	{
		global $phpEx, $phpbb_root_path;

		$sublevel = array();
		$i = 0;

		foreach($this->dl_index as $cat_id => $value)
		{
			if (((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view']) && $this->dl_auth[$cat_id]['auth_view']) || $this->user_admin) && (isset($this->dl_index[$cat_id]['parent']) && $this->dl_index[$cat_id]['parent'] == $parent))
			{
				$sublevel['cat_name'][$i] = $this->dl_index[$cat_id]['cat_name'];
				$sublevel['cat_icon'][$i] = (isset($this->dl_index[$cat_id]['cat_icon']) && $this->dl_index[$cat_id]['cat_icon'] != '') ? generate_board_url() . '/' . $this->dl_index[$cat_id]['cat_icon'] : generate_board_url() . '/images/spacer.gif';
				$sublevel['total'][$i] = (isset($this->dl_index[$cat_id]['total'])) ? $this->dl_index[$cat_id]['total'] : 0;
				$sublevel['cat_id'][$i] = $this->dl_index[$cat_id]['id'];
				$sublevel['cat_path'][$i] = append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$cat_id");
				$sublevel['cat_sub'][$i] = $cat_id;

				$sublevel['description'][$i] = (isset($this->dl_index[$cat_id]['description'])) ? $this->dl_index[$cat_id]['description'] : '';
				$sublevel['desc_uid'][$i] = (isset($this->dl_index[$cat_id]['desc_uid'])) ? $this->dl_index[$cat_id]['desc_uid'] : '';
				$sublevel['desc_bitfield'][$i] = (isset($this->dl_index[$cat_id]['desc_bitfield'])) ? $this->dl_index[$cat_id]['desc_bitfield'] : '';
				$sublevel['desc_flags'][$i] = (isset($this->dl_index[$cat_id]['desc_flags'])) ? $this->dl_index[$cat_id]['desc_flags'] : '';
				$i++;
			}
		}

		return $sublevel;
	}

	function count_sublevel($parent)
	{
		$sublevel = 0;

		foreach($this->dl_index as $cat_id => $value)
		{
			if ((isset($this->dl_index[$cat_id]['auth_view']) || isset($this->dl_auth[$cat_id]['auth_view']) || $this->user_admin) && $this->dl_index[$cat_id]['parent'] == $parent)
			{
				$sublevel++;
			}
		}

		return $sublevel;
	}

	function get_sublevel_count($parent = 0)
	{
		$sublevel_count = 0;

		foreach($this->dl_index as $cat_id => $value)
		{
			if ($this->dl_index[$cat_id]['parent'] == $parent && (isset($this->dl_index[$cat_id]['auth_view']) || isset($this->dl_auth[$cat_id]['auth_view']) || $this->user_admin))
			{
				$sublevel_count += (isset($this->dl_index[$cat_id]['total'])) ? $this->dl_index[$cat_id]['total'] : 0;
				$sublevel_count += $this->get_sublevel_count($cat_id);
			}
		}

		return $sublevel_count;
	}

	function dl_nav($parent, $disp_art, &$tmp_nav)
	{
		global $phpEx, $config, $path_dl_array, $phpbb_root_path;

		$cat_id = $this->dl_index[$parent]['id'];
		$temp_url = append_sid("{$phpbb_root_path}downloads.$phpEx?cat=$cat_id");
		$temp_title = $this->dl_index[$parent]['cat_name'];
		$temp_title = str_replace('&nbsp;&nbsp;|', '', $temp_title);
		$temp_title = str_replace('___&nbsp;', '', $temp_title);

		if (((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view']) && $this->dl_auth[$cat_id]['auth_view']) || $this->user_admin) && $disp_art == 'url')
		{
			$tmp_nav['link'][] = $temp_url;
			$tmp_nav['name'][] = $temp_title;
		}
		if (((isset($this->dl_index[$cat_id]['auth_view']) && $this->dl_index[$cat_id]['auth_view']) || (isset($this->dl_auth[$cat_id]['auth_view']) && $this->dl_auth[$cat_id]['auth_view']) || $this->user_admin) && $disp_art == 'links')
		{
			$path_dl_array[] = '&nbsp;&raquo;&nbsp;<a href="' . $temp_url . '">' . $temp_title . '</a>';
		}
		else
		{
			$path_dl_array[] = '&nbsp;<strong>&#8249;</strong>&nbsp;' . $temp_title;
		}

		if (isset($this->dl_index[$parent]['parent']) && $this->dl_index[$parent]['parent'] != 0)
		{
			$this->dl_nav($this->dl_index[$parent]['parent'], $disp_art, $tmp_nav);
		}

		$path_dl = '';

		if ($disp_art != 'url')
		{
			for ($i = sizeof($path_dl_array); $i >= 0 ; $i--)
			{
				$path_dl .= (isset($path_dl_array[$i])) ? $path_dl_array[$i] : '';
			}
		}

		return ($disp_art == 'url') ? $tmp_nav : $path_dl;
	}

	function dl_dropdown($parent = 0, $level = 0, $select_cat = 0, $perm, $rem_cat = 0)
	{
		if (!isset($catlist))
		{
			$catlist = '';
		}

		foreach($this->dl_index as $cat_id => $value)
		{
			if ($this->dl_index[$cat_id]['parent'] == $parent)
			{
				if (isset($this->dl_index[$cat_id][$perm]) && $this->dl_index[$cat_id][$perm] || isset($this->dl_auth[$cat_id][$perm]) && $this->dl_auth[$cat_id][$perm] || $this->user_admin)
				{
					$cat_name = $this->dl_index[$cat_id]['cat_name'];

					$seperator = '';

					if ($this->dl_index[$cat_id]['parent'] != 0)
					{
						for($i = 0; $i < $level; $i++)
						{
							$seperator .= '&nbsp;&nbsp;|';
						}
						$seperator .= '___&nbsp;';
					}

					if ($perm == 'auth_up' || $rem_cat)
					{
						$status = ($select_cat == $cat_id) ? 'selected="selected"' : '';
					}
					else
					{
						$status = '';
					}

					if ($rem_cat != $cat_id)
					{
						$catlist .= '<option value="' . $cat_id . '" ' . $status . '>' . $seperator . $cat_name . '</option>';
					}
				}

				$level++;
				$catlist .= $this->dl_dropdown($cat_id, $level, $select_cat, $perm, $rem_cat);
				$level--;
			}
		}

		return $catlist;
	}

	function rating_img($rating_points)
	{
		global $user;

		$rate_points = ceil($rating_points);
		$rate_image = '';

		for ($i = 0; $i < 10; $i++)
		{
			$j = $i + 1;
			$rate_image .= ($j <= $rate_points ) ? $user->img('dl_rate_yes') : $user->img('dl_rate_no');
		}

		return $rate_image;
	}

	function dl_client()
	{
		$client = $this->user_client;

		if (strstr($client, "gecko"))
		{
			if (strstr($client, "safari"))
			{
				$browser_name = "Safari";
			}
			else if (strstr($client, "camino"))
			{
				$browser_name = "Camino";
			}
			else if (strstr($client, "epiphany"))
			{
				$browser_name = "Epiphany";
			}
			else if (strstr($client, "firefo"))
			{
				$browser_name = "Firefox";
			}
			else if (strstr($client, "konqueror"))
			{
				$browser_name = "Konqueror";
			}
			else if (strstr($client, "netscape"))
			{
				$browser_name = "Netscape";
			}
			else if (strstr($client, "seamonk"))
			{
				$browser_name = "SeaMonkey";
			}
			else if (strstr($client, "cback"))
			{
				$browser_name = "CBACK";
			}
			else
			{
				$browser_name = "Mozilla";
			}
		}
		else if (strstr($client, "opera"))
		{
			$browser_name = "Opera";
		}
		else if (strstr($client, "abolimba"))
		{
			$browser_name = "Abolimba";
		}
		else if (strstr($client, "msie"))
		{
			if (strstr($client, "maxthon"))
			{
				$browser_name = "Maxthon";
			}
			else
			{
				$browser_name = "Internet Explorer";
			}
		}
		else if (strstr($client,"voyager"))
		{
			$browser_name = "Voyager";        
		}
		else if (strstr($client,"lynx"))
		{
			$browser_name = "Lynx";
		}
		else
		{
			$browser_name = "n/a";
		}

		return $browser_name;
	}

	function dl_size($input_value, $rnd = 2, $out_type = 'combine')
	{
		global $user;

		if ($input_value < 1024)
		{
			$output_value = $input_value;
			$output_desc = '&nbsp;&nbsp;'.$user->lang['DL_BYTES'];
		}
		else if ($input_value < 1048576)
		{
			$output_value = $input_value / 1024;
			$output_desc = '&nbsp;'.$user->lang['DL_KB'];
		}
		else if ($input_value < 1073741824)
		{
			$output_value = $input_value / 1048576;
			$output_desc = '&nbsp;'.$user->lang['DL_MB'];
		}
		else
		{
			$output_value = $input_value / 1073741824;
			$output_desc = '&nbsp;'.$user->lang['DL_GB'];
		}

		$output_value = round($output_value, $rnd);

		$data_out = ($out_type == 'combine') ? $output_value . $output_desc : array('size_out' => $output_value, 'range' => $output_desc);

		return $data_out;
	}

	function dl_prune_stats($cat_id, $stats_prune)
	{
		global $db;

		$stats_prune--;

		if ($stats_prune)
		{
			$sql = 'SELECT time_stamp FROM ' . DL_STATS_TABLE . "
				WHERE cat_id = $cat_id
				ORDER BY time_stamp DESC";
			$result = $db->sql_query_limit($sql, 1, $stats_prune);
			$first_time_stamp = $db->sql_fetchfield('time_stamp');
			$db->sql_freeresult($result);

			if ($first_time_stamp)
			{
				$sql = 'DELETE FROM ' . DL_STATS_TABLE . "
					WHERE time_stamp <= $first_time_stamp
						AND cat_id = $cat_id";
				$db->sql_query($sql);
			}
		}

		return true;
	}

	function stats_perm()
	{
		global $cat_id;

		$stats_view = 0;

		switch($this->dl_config['dl_stats_perm'])
		{
			case 0:
				$stats_view = TRUE;
				break;

			case 1:
				if ($this->user_logged_in)
				{
					$stats_view = TRUE;
				}
				break;

			case 2:
				if ($this->user_auth($cat_id, 'auth_mod'))
				{
					$stats_view = TRUE;
				}
				break;

			case 3:
				if ($this->user_admin)
				{
					$stats_view = TRUE;
				}
				break;

			default:
				$stats_view = 0;
		}

		return $stats_view;
	}

	function cat_auth_comment_read($cat_id)
	{
		$auth_cread = 0;

		switch($this->dl_index[$cat_id]['auth_cread'])
		{
			case 0:
				$auth_cread = TRUE;
				break;

			case 1:
				if ($this->user_logged_in)
				{
					$auth_cread = TRUE;
				}
				break;

			case 2:
				if ($this->user_auth($cat_id, 'auth_mod'))
				{
					$auth_cread = TRUE;
				}
				break;

			case 3:
				if ($this->user_admin)
				{
					$auth_cread = TRUE;
				}
				break;

			default:
				$auth_cread = 0;
		}

		return $auth_cread;
	}

	function cat_auth_comment_post($cat_id)
	{
		$auth_cpost = 0;

		switch($this->dl_index[$cat_id]['auth_cpost'])
		{
			case 0:
				$auth_cpost = TRUE;
				break;

			case 1:
				if ($this->user_logged_in)
				{
					$auth_cpost = TRUE;
				}
				break;

			case 2:
				if ($this->user_auth($cat_id, 'auth_mod'))
				{
					$auth_cpost = TRUE;
				}
				break;

			case 3:
				if ($this->user_admin)
				{
					$auth_cpost = TRUE;
				}
				break;

			default:
				$auth_cpost = 0;
		}

		return $auth_cpost;
	}

	function read_exist_files()
	{
		$dl_files = $this->all_files(0, '', '', '', 0, 1, 'real_file');

		$exist_files = array();

		for ($i = 0; $i < sizeof($dl_files); $i++)
		{
			$exist_files[] = $dl_files[$i]['real_file'];
		}

		return $exist_files;
	}

	function read_dl_dirs($download_dir, $path = '')
	{
		global $user, $cur, $unas_files, $phpbb_root_path;

		$folders = '';

		$dl_dir = substr($download_dir, 0, strlen($download_dir)-1);

		@$dir = opendir($download_dir . $path);

		while (false !== ($file=@readdir($dir)))
		{
			if ($file{0} != ".")
			{
				if(is_dir($download_dir . $path . '/' . $file))
				{
					$temp_dir = $dl_dir . $path . '/' . $file;
					$temp_dir = str_replace($phpbb_root_path, '', $temp_dir);
					$folders .= ('/'.$cur != $path . '/' . $file) ? '<option value="' . $dl_dir . $path . '/' . $file . '/">'.$user->lang['DL_MOVE'].' &raquo; ' . $temp_dir . '/</option>' : '';
					$folders .= $this->read_dl_dirs($download_dir, $path . '/' . $file);
				}
			}
		}

		closedir($dir);

		return $folders;
	}

	function read_dl_files($download_dir, $path = '', $unas_files = array())
	{
		$files = '';

		$dl_dir = ($path) ? $download_dir : substr($download_dir, 0, strlen($download_dir)-1);

		@$dir = opendir($dl_dir . $path);

		while (false !== ($file=@readdir($dir)))
		{
			if ($file{0} != ".")
			{
				$files .= (in_array($file, $unas_files)) ? $path . '/' . $file . '|' : '';
				$files .= $this->read_dl_files($download_dir, $path . '/' . $file, $unas_files);
			}
		}

		@closedir($dir);

		return $files;
	}

	function read_dl_sizes($download_dir, $path = '')
	{
		$file_size = 0;
		$dl_dir = substr($download_dir, 0, strlen($download_dir)-1);

		@$dir = opendir($dl_dir . $path);

		while (false !== ($file=@readdir($dir)))
		{
			if ($file[0] != ".")
			{
				// apears to scrw up so exit if file is empty string... Why wasen't this checked? (Mike @ 11 October 2009) //
				// also the code used $file{0} ? not sure if this is correct so I used $file[0] Mike //

				if($file == '') break;

				$file_size += sprintf("%u", @filesize($dl_dir . $path . '/' . $file));
				$file_size += $this->read_dl_sizes($download_dir, $path . '/' . $file);
			}
		}

		@closedir($dir);

		return $file_size;
	}

	// Added by suggestion from Neverbirth. Thx to him!!!
	function readfile_chunked($filename, $retbytes = true)
	{
		$chunksize = 1048576;
		$buffer = '';
		$cnt =0;
		$handle = fopen($filename, 'rb');

		if ($handle === false)
		{
			return false;
		}

		while (!feof($handle))
		{
			$buffer = fread($handle, $chunksize);
			echo $buffer;
			if ($retbytes)
			{
				$cnt += strlen($buffer);
			}
		}

		$status = fclose($handle);

		if ($retbytes && $status)
		{
			return $cnt;
		}

		return $status;
	}

	function dl_status($df_id)
	{
		global $user, $phpEx, $phpbb_root_path;

		$user->lang['DL_RED_EXPLAIN_ALT'] = sprintf($user->lang['DL_RED_EXPLAIN_ALT'], $this->dl_config['dl_posts']);

		if (!isset($this->dl_file[$df_id]['cat']))
		{
			return array('status' => '', 'file_name' => '', 'auth_dl' => 0, 'file_detail' => '', 'status_detail' => $user->img('dl_red', $user->lang['DL_RED_EXPLAIN_ALT']));
		}

		$cat_id = $this->dl_file[$df_id]['cat'];
		$cat_auth = array();
		$cat_auth = $this->dl_cat_auth($cat_id);
		$index = array();
		$index = $this->full_index($cat_id);
		$status = '';
		$file_name = '';
		$auth_dl = 0;


		$file_name = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$this->dl_file[$df_id]['file_name'].'</a>';
		$file_detail = $this->dl_file[$df_id]['file_name'];

		if ($this->user_banned)
		{
			$status_detail = $user->img('dl_banlist', $user->lang['DL_BANNED']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
			return array('status' => $status, 'file_name' => $file_detail, 'auth_dl' => $auth_dl, 'file_detail' => $file_detail, 'status_detail' => $status_detail);
		}

		if ($this->user_logged_in && intval($this->user_traffic) > $this->dl_file[$df_id]['file_size'] && !$this->dl_file[$df_id]['extern'])
		{
			$status_detail = $user->img('dl_yellow', $user->lang['DL_YELLOW_EXPLAIN']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = TRUE;
		}
		else
		{
			$status_detail = $user->img('dl_red', $user->lang['DL_RED_EXPLAIN_ALT']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
		}

		if ($this->user_posts < $this->dl_config['dl_posts'] && !$this->dl_file[$df_id]['extern'] && !$this->dl_file[$df_id]['free'])
		{
			$status_detail = $user->img('dl_red', $user->lang['DL_RED_EXPLAIN_ALT']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
		}

		if ($this->dl_file[$df_id]['free'] == 1)
		{
			$status_detail = $user->img('dl_green', $user->lang['DL_GREEN_EXPLAIN']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = TRUE;
		}

		if ($this->dl_file[$df_id]['free'] == 2)
		{
			if ($this->dl_config['icon_free_for_reg'] || (!$this->dl_config['icon_free_for_reg'] && $this->user_logged_in))
			{
				$status_detail = $user->img('dl_white', $user->lang['DL_WHITE_EXPLAIN']);
				$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			}

			if ($this->user_logged_in)
			{
				$auth_dl = TRUE;
			}
			else
			{
				$auth_dl = 0;
			}
		}

		if (!$cat_auth['auth_dl'] && !$index[$cat_id]['auth_dl'] && !$this->user_admin)
		{
			$status_detail = $user->img('dl_red', $user->lang['DL_RED_EXPLAIN_PERM']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
		}

		if ($this->dl_file[$df_id]['file_traffic'] && $this->dl_file[$df_id]['klicks'] * $this->dl_file[$df_id]['file_size'] >= $this->dl_file[$df_id]['file_traffic'])
		{
			$status_detail = $user->img('dl_blue', $user->lang['DL_BLUE_EXPLAIN_FILE']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
		}

		if (($this->dl_config['overall_traffic'] - $this->dl_config['remain_traffic'] <= 0) || ($index[$cat_id]['cat_traffic'] && ($index[$cat_id]['cat_traffic'] - $index[$cat_id]['cat_traffic_use'] <= 0)))
		{
			$status_detail = $user->img('dl_blue', $user->lang['DL_BLUE_EXPLAIN']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$auth_dl = 0;
		}

		if ($this->dl_file[$df_id]['extern'])
		{
			$status_detail = $user->img('dl_grey', $user->lang['DL_GREY_EXPLAIN']);
			$status = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$status_detail.'</a>';
			$file_name = '<a href="'.append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "df_id=$df_id").'">'.$user->lang['DL_EXTERN'].'</a>';
			$auth_dl = TRUE;
		}

		return array('status' => $status, 'file_name' => $file_name, 'auth_dl' => $auth_dl, 'file_detail' => $file_detail, 'status_detail' => $status_detail);
	}

	function dl_auth_users($cat_id, $perm)
	{
		global $db;

		$user_ids = '';

		if ($this->dl_index[$cat_id][$perm])
		{
			$sql = 'SELECT user_id FROM ' . USERS_TABLE . '
				WHERE user_id > ' . ANONYMOUS . '
					AND user_id <> ' . $this->user_id;
			$result = $db->sql_query($sql);
		}
		else
		{
			$sql = 'SELECT group_id FROM ' . DL_AUTH_TABLE . "
				WHERE cat_id = $cat_id
					AND $perm = " . true . '
				GROUP BY group_id';
			$result = $db->sql_query($sql);
			$total_group_perms = $db->sql_affectedrows($result);

			if (!$total_group_perms)
			{
				$db->sql_freeresult($result);
				return '';
			}

			$group_ids = array();

			while ($row = $db->sql_fetchrow($result))
			{
				$group_ids[] = $row['group_id'];
			}

			$db->sql_freeresult($result);

			$sql = 'SELECT user_id FROM ' . USER_GROUP_TABLE . '
				WHERE user_id <> ' . $this->user_id . '
					AND ' . $db->sql_in_set('group_id', $group_ids) . '
					AND user_pending <> ' . true;
			$result = $db->sql_query($sql);

		}

		while ($row = $db->sql_fetchrow($result))
		{
			$user_ids .= ($user_ids == '') ? $row['user_id'] : ', ' . $row['user_id'];
		}
		$db->sql_freeresult($result);

		return $user_ids;
	}

	function bug_tracker()
	{
		$bug_tracker = false;

		foreach($this->dl_index as $cat_id => $value)
		{
			if ($this->dl_index[$cat_id]['bug_tracker'])
			{
				$bug_tracker = true;
				break;
			}
		}

		return $bug_tracker;
	}

	function gen_dl_topic($dl_id)
	{
		if (!$this->dl_config['enable_dl_topic'])
		{
			return;
		}

		global $db, $user, $phpbb_root_path, $phpEx;

		$sql = 'SELECT id, description, dl_topic, cat FROM ' . DOWNLOADS_TABLE . "
			WHERE id = $dl_id";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);		

		if ($row['dl_topic'])
		{
			return;
		}

		$cat_id		= $row['cat'];
		$dl_title	= '"' . $row['description'] . '"';

		if ($this->dl_config['dl_topic_forum'] == -1)
		{
			$topic_forum	= $this->dl_index[$cat_id]['dl_topic_forum'];
			$topic_text		= $this->dl_index[$cat_id]['dl_topic_text'];
		}
		else
		{
			$topic_forum	= $this->dl_config['dl_topic_forum'];
			$topic_text		= $this->dl_config['dl_topic_text'];
		}

		if (!$topic_forum)
		{
			return;
		}

		$topic_title = sprintf($user->lang['DL_TOPIC_SUBJECT'], $dl_title);
		$topic_text .= "\n\n" . '&bull;&raquo;&nbsp;<a href="' . generate_board_url() . '/downloads.' . $phpEx . '?view=detail&amp;df_id=' . $dl_id . '">' . $dl_title . '</a>';

		$username		= $user->data['username'];
		$poll			= array();
		$update_message	= false;
	
		$sql = 'SELECT forum_parents, forum_name FROM ' . FORUMS_TABLE . "
			WHERE forum_id = $topic_forum";
		$result = $db->sql_query($sql);
		$post_data = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	
		$message = $topic_text;
	
		$data = array(
			'topic_title'			=> $topic_title,
			'topic_first_post_id'	=> 0,
			'topic_last_post_id'	=> 0,
			'topic_time_limit'		=> 0,
			'topic_attachment'		=> 0,
			'post_id'				=> 0,
			'topic_id'				=> 0,
			'forum_id'				=> $topic_forum,
			'icon_id'				=> 0,
			'poster_id'				=> $user->data['user_id'],
			'enable_sig'			=> 0,
			'enable_bbcode'			=> 0,
			'enable_smilies'		=> 0,
			'enable_urls'			=> true,
			'enable_indexing'		=> 0,
			'message_md5'			=> md5($topic_text),
			'post_time'				=> time(),
			'post_checksum'			=> '',
			'post_edit_reason'		=> '',
			'post_edit_user'		=> 0,
			'forum_parents'			=> $post_data['forum_parents'],
			'forum_name'			=> $post_data['forum_name'],
			'notify'				=> false,
			'notify_set'			=> 0,
			'poster_ip'				=> $user->ip,
			'post_edit_locked'		=> 0,
			'bbcode_bitfield'		=> '',
			'bbcode_uid'			=> '',
			'message'				=> $topic_text,
		);
	
		include_once($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
		submit_post('post', $topic_title, $username, POST_NORMAL, $poll, $data, $update_message);

		$dl_topic_id = (int) $data['topic_id'];

		$sql = 'UPDATE ' . DOWNLOADS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'dl_topic' => $dl_topic_id)) . " WHERE id = $dl_id";
		$db->sql_query($sql);
		
		return;	
	}

	function delete_topic($topic_ids)
	{
		if (!$topic_ids)
		{
			return;
		}

		global $phpbb_root_path, $phpEx;

		include_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);

		$return = delete_topics('topic_id', $topic_ids);
	}

	function update_topic($topic_id, $dl_id)
	{
		if (!$topic_id || !$dl_id)
		{
			return;
		}

		global $db, $user;

		$sql = 'SELECT description FROM ' . DOWNLOADS_TABLE . "
			WHERE id = $dl_id";
		$result = $db->sql_query($sql);
		$dl_title = '"' . $db->sql_fetchfield('description') . '"';
		$db->sql_freeresult($result);

		$sql = 'UPDATE ' . TOPICS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', array(
			'topic_title' => sprintf($user->lang['DL_TOPIC_SUBJECT'], $dl_title))) . " WHERE topic_id = $topic_id";
		$db->sql_query($sql); 
	}

	function dl_cat_select($parent = 0, $level = 0, $select_cat = array())
	{
		if (!isset($catlist))
		{
			$catlist = '';
		}

		foreach($this->dl_index as $cat_id => $value)
		{
			if ($this->dl_index[$cat_id]['parent'] == $parent)
			{
				$cat_name = $this->dl_index[$cat_id]['cat_name'];

				$seperator = '';

				if ($this->dl_index[$cat_id]['parent'] != 0)
				{
					for($i = 0; $i < $level; $i++)
					{
						$seperator .= '&nbsp;&nbsp;|';
					}
					$seperator .= '___&nbsp;';
				}

				$status = (in_array($cat_id, $select_cat)) ? 'selected="selected"' : '';

				$catlist .= '<option value="' . $cat_id . '" ' . $status . '>' . $seperator . $cat_name . '</option>';

				$level++;
				$catlist .= $this->dl_cat_select($cat_id, $level, $select_cat);
				$level--;
			}
		}

		return $catlist;
	}
}

?>