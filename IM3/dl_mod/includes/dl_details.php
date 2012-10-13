<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_details.php 10 2009/06/14 OXPUS
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

$cat_id = $dl_files['cat'];

/*
* Read the ratings for this little download
*/
$sql = 'SELECT dl_id, user_id FROM ' . DL_RATING_TABLE . "
	WHERE dl_id = $df_id";
$result = $db->sql_query($sql);

$ratings = 0;
$rating_access = TRUE;

while ($row = $db->sql_fetchrow($result))
{
	$ratings++;

	if ($user->data['user_id'] == $row['user_id'])
	{
		$rating_access = 0;
	}
}

$db->sql_freeresult($result);

if (!$user->data['is_registered'] || $user->data['user_id'] == ANONYMOUS)
{
	$rating_access = 0;
}

if (!$rating_access)
{
	if ($dlo == 1 && $action)
	{
		redirect(append_sid("{$phpbb_root_path}downloads.php?view=overall"));
	}
	else if (!$dlo && $action)
	{
		redirect(append_sid("{$phpbb_root_path}downloads.php?cat=$cat_id"));
	}

	$action = '';
}

$rating = $s_hidden_fields = '';

/*
* fetch last comment, if exists
*/
if ($index[$cat_id]['comments'] && $dl_mod->cat_auth_comment_read($cat_id))
{
	$s_hidden_fields = array(
		'cat_id'	=> $cat_id,
		'df_id'		=> $df_id,
		'view'		=> 'comment'
	);

	$template->assign_vars(array(
		'S_COMMENT_ACTION'			=> append_sid("{$phpbb_root_path}downloads.$phpEx"),
		'S_HIDDEN_COMMENT_FIELDS'	=> build_hidden_fields($s_hidden_fields))
	);

	$sql = 'SELECT * FROM ' . DL_COMMENTS_TABLE . "
		WHERE cat_id = $cat_id
			AND id = $df_id
			AND approve = " . true;
	$result = $db->sql_query($sql);
	$real_comment_exists = $db->sql_affectedrows($result);
	$db->sql_freeresult($result);

	if ($real_comment_exists)
	{
		$template->assign_var('S_VIEW_COMMENTS', true);
	}

	if ($dl_config['latest_comments'] && $real_comment_exists)
	{
		$template->assign_var('S_COMMENTS_ON', true);

		$sql = 'SELECT * FROM ' . DL_COMMENTS_TABLE . "
			WHERE cat_id = $cat_id
				AND id = $df_id
				AND approve = " . true . "
			ORDER BY comment_time DESC";
		$result = $db->sql_query_limit($sql, $dl_config['latest_comments']);
	
		while ($row = $db->sql_fetchrow($result))
		{
			$poster_id			= $row['user_id'];
			$poster				= $row['username'];

			$message			= $row['comment_text'];
			$com_uid			= $row['com_uid'];
			$com_bitfield		= $row['com_bitfield'];
			$com_flags			= $row['com_flags'];

			$message			= censor_text($message);
			$message			= generate_text_for_display($message, $com_uid, $com_bitfield, $com_flags);

			$comment_time		= $row['comment_time'];
			$comment_edit_time	= $row['comment_edit_time'];

			if($comment_time <> $comment_edit_time)
			{
				$edited_by = '<hr />'.sprintf($user->lang['DL_COMMENT_EDITED'], $user->format_date($comment_edit_time));
			}
			else
			{
				$edited_by = '';
			}

			if ($poster_id == ANONYMOUS)
			{
				$poster_url = '';
			}
			else
			{
				$poster_url	= append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=$poster_id");
				$poster		= '<a href="'.$poster_url.'">'.$poster.'</a>';
			}

			$post_time = $user->format_date($comment_time);

			$template->assign_block_vars('comment_row', array(
				'EDITED_BY'	=> $edited_by,
				'POSTER'	=> $poster,
				'MESSAGE'	=> $message,
				'POST_TIME'	=> $post_time)
			);
		}
	}

	if ($dl_mod->cat_auth_comment_post($cat_id))
	{
		$s_hidden_fields = array(
			'cat_id'	=> $cat_id,
			'df_id'		=> $df_id,
			'view'		=> 'comment'
		);

		$template->assign_var('S_POST_COMMENT', true);

		$template->assign_vars(array(
			'S_COMMENT_POST_ACTION'	=> append_sid("{$phpbb_root_path}downloads.$phpEx"),
			'S_HIDDEN_POST_FIELDS'	=> build_hidden_fields($s_hidden_fields))
		);
	}
	$db->sql_freeresult($result);
}

/*
* generate page
*/
$template->set_filenames(array(
	'body' => 'dl_mod/view_dl_body.html')
);

$user_id = $user->data['user_id'];
$username = $user->data['username'];

/*
* prepare the download for displaying
*/
$description		= $dl_files['description'];
$desc_uid			= $dl_files['desc_uid'];
$desc_bitfield		= $dl_files['desc_bitfield'];
$desc_flags			= $dl_files['desc_flags'];
$description		= generate_text_for_display($description, $desc_uid, $desc_bitfield, $desc_flags);

$mini_icon			= $dl_mod->mini_status_file($cat_id, $df_id);

$hack_version		= '&nbsp;'.$dl_files['hack_version'];

$long_desc			= $dl_files['long_desc'];
$long_desc_uid		= $dl_files['long_desc_uid'];
$long_desc_bitfield	= $dl_files['long_desc_bitfield'];
$long_desc_flags	= $dl_files['long_desc_flags'];
$long_desc			= generate_text_for_display($long_desc, $long_desc_uid, $long_desc_bitfield, $long_desc_flags);

$file_status	= array();
$file_status	= $dl_mod->dl_status($df_id);

$status			= $file_status['status_detail'];
$file_name		= $file_status['file_detail'];
$file_load		= $file_status['auth_dl'];
$real_file		= $dl_files['real_file'];

if ($dl_files['extern'])
{
	$file_size_out = $user->lang['DL_NOT_AVAILIBLE'];

	if ($dl_config['shorten_extern_links'])
	{
		if (strlen($file_name) > $dl_config['shorten_extern_links'] && strlen($file_name) <= $dl_config['shorten_extern_links'] * 2)
		{
			$file_name = substr($file_name, strlen($file_name) - $dl_config['shorten_extern_links']);
		}
		else
		{
			$file_name = substr($file_name, 0, $dl_config['shorten_extern_links']) . '...' . substr($file_name, strlen($file_name) - $dl_config['shorten_extern_links']);
		}
	}
}
else
{
	$file_size_out = $dl_mod->dl_size($dl_files['file_size'], 2);
}

$file_klicks			= $dl_files['klicks'];
$file_overall_klicks	= $dl_files['overall_klicks'];

$cat_name = $index[$cat_id]['cat_name'];
$cat_view = $index[$cat_id]['nav_path'];
$cat_desc = $index[$cat_id]['description'];

$add_user		= $add_time = '';
$change_user	= $change_time = '';

$sql = 'SELECT username, user_id FROM ' . USERS_TABLE . '
	WHERE user_id = ' . $dl_files['add_user'];
$result = $db->sql_query($sql);

$row			= $db->sql_fetchrow($result);
$add_user		= ($row['user_id'] != '' || $row['user_id'] != ANONYMOUS) ? '<a href="'.append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']).'">'.$row['username'].'</a>' : $user->lang['GUEST'];
$add_time		= $user->format_date($dl_files['add_time']);

$db->sql_freeresult($result);

if ($dl_files['add_time'] != $dl_files['change_time'])
{
	$sql = 'SELECT username, user_id FROM ' . USERS_TABLE . '
		WHERE user_id = ' . $dl_files['change_user'];
	$result = $db->sql_query($sql);

	$row			= $db->sql_fetchrow($result);
	$change_user	= ($row['user_id'] != '' || $row['user_id'] != ANONYMOUS) ? '<a href="'.append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile", "u=".$row['user_id']).'">'.$row['username'].'</a>' : $user->lang['GUEST'];
	$change_time	= $user->format_date($dl_files['change_time']);

	$db->sql_freeresult($result);
}

$last_time_string		= ($dl_files['extern']) ? $user->lang['DL_LAST_TIME_EXTERN'] : $user->lang['DL_LAST_TIME'];
$last_time				= ($dl_files['last_time']) ? sprintf($last_time_string, $user->format_date($dl_files['last_time'])) : $user->lang['DL_NO_LAST_TIME'];

$hack_author_email		= $dl_files['hack_author_email'];
$hack_author			= ( $dl_files['hack_author'] != '' ) ? $dl_files['hack_author'] : 'n/a';
$hack_author_website	= $dl_files['hack_author_website'];
$hack_dl_url			= $dl_files['hack_dl_url'];

$test					= $dl_files['test'];
$require				= $dl_files['req'];
$todo					= $dl_files['todo'];
$warning				= $dl_files['warning'];
$warn_uid				= $dl_files['warn_uid'];
$warn_bitfield			= $dl_files['warn_bitfield'];
$warn_flags				= $dl_files['warn_flags'];
$warning				= generate_text_for_display($warning, $warn_uid, $warn_bitfield, $warn_flags);

$mod_list				= $dl_files['mod_list'];

if ($mod_list)
{
	$mod_desc			= $dl_files['mod_desc'];
	$mod_desc_uid		= $dl_files['mod_desc_uid'];
	$mod_desc_bitfield	= $dl_files['mod_desc_bitfield'];
	$mod_desc_flags		= $dl_files['mod_desc_flags'];
	$mod_desc			= generate_text_for_display($mod_desc, $mod_desc_uid, $mod_desc_bitfield, $mod_desc_flags);
}

/*
* Hacklist
*/
if ($dl_files['hacklist'] && $dl_config['use_hacklist'])
{
	$template->assign_block_vars('hacklist', array(
		'HACK_AUTHOR'			=> ( $hack_author_email != '' ) ? '<a href="mailto:'.$hack_author_email.'">'.$hack_author.'</a>' : $hack_author,
		'HACK_AUTHOR_WEBSITE'	=> ( $hack_author_website != '' ) ? '<a href="'.$hack_author_website.'" target="_blank">'.$user->lang['WEBSITE'].'</a>' : 'n/a',
		'HACK_DL_URL'	=> ( $hack_dl_url != '' ) ? '<a href="'.$hack_dl_url.'">'.$user->lang['DL_DOWNLOAD'].'</a>' : 'n/a')
	);
}

/*
* MOD block
*/
if ($mod_list && $index[$cat_id]['allow_mod_desc'])
{
	$template->assign_var('S_MOD_LIST', true);

	if ($test)
	{
		$template->assign_block_vars('modlisttest', array('MOD_TEST' => $test));
	}

	if ($mod_desc)
	{
		$template->assign_block_vars('modlistdesc', array('MOD_DESC' => $mod_desc));
	}

	if ($warning)
	{
		$template->assign_block_vars('modwarning', array('MOD_WARNING' => $warning));
	}

	if ($require)
	{
		$template->assign_block_vars('modrequire', array('MOD_REQUIRE' => $require));
	}

	if ($todo)
	{
		$template->assign_block_vars('modtodo', array('MOD_TODO' => str_replace("\n", "<br />", $todo)));
	}
}

/*
* Check for recurring downloads
*/
if ($dl_config['user_traffic_once'] && !$file_load && !$dl_files['free'] && !$dl_files['extern'] && ($dl_files['file_size'] > $user->data['user_traffic']))
{
	$sql = 'SELECT * FROM ' . DL_NOTRAF_TABLE . '
		WHERE user_id = ' . $user->data['user_id'] . "
			AND dl_id = $df_id";
	$result = $db->sql_query($sql);
	$still_count = $db->sql_affectedrows($result);
	$db->sql_freeresult($result);

	if ($still_count)
	{
		$file_load = true;

		$template->assign_var('S_ALLOW_TRAFFICFREE_DOWNLOAD', true);
	}
}

/*
* Hotlink or not hotlink, that is the question :-P
* And we will check a broken download inclusive the visual confirmation here ...
*/
if ($file_load)
{
	if (!$dl_files['broken'] || ($dl_files['broken'] && !$dl_config['report_broken_lock']))
	{
		if ($dl_config['prevent_hotlink'])
		{
			$hotlink_id = md5($user->data['user_id'] . time() . $df_id . $user->data['session_id']);

			$sql = 'INSERT INTO ' . DL_HOTLINK_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'user_id'		=> $user->data['user_id'],
				'session_id'	=> $user->data['session_id'],
				'hotlink_id'	=> $hotlink_id));
			$db->sql_query($sql);
		}
		else
		{
			$hotlink_id = '';
		}

		if ($dl_config['download_vc'])
		{
			$code = '';
			$code_string = 'ABCDEFGHJKLMNOPQRSTUVWXYZ123456789';

			srand((double)microtime()*1000000);
			mt_srand((double)microtime()*1000000);
			
			for ($i = 0; $i < 5; $i++)
			{
				$code_pos	= mt_rand(1, strlen($code_string)) - 1;
				$code		.= $code_string{$code_pos};
			}
			
			$sql = 'INSERT INTO ' . DL_HOTLINK_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'user_id'		=> $user->data['user_id'],
				'session_id'	=> $user->data['session_id'],
				'hotlink_id'	=> 'dlvc',
				'code'			=> $code));
			$db->sql_query($sql);
		}

		if ($cat_auth['auth_mod'] || ($auth->acl_get('a_') && $user->data['is_registered']))
		{
			$modcp = ($modcp) ? 1 : 0;
		}
		else
		{
			$modcp = 0;
		}

		$template->assign_block_vars('download_button', array(
			'S_HOTLINK_ID'	=> $hotlink_id,
			'S_DL_WINDOW'	=> ($dl_files['extern'] && $dl_config['ext_new_window']) ? 'target="_blank"' : '',
			'U_DOWNLOAD'	=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=load", "df_id=$df_id&amp;modcp=$modcp&amp;cat_id=$cat_id"))
		);

		if ($dl_config['download_vc'])
		{
			$template->assign_block_vars('download_button.vc', array(
				'VC' => append_sid("{$phpbb_root_path}downloads.$phpEx?view=code", "code=d"))
			);
		}
	}
}

/*
* Display the link ro report the download as broken
*/
if ($dl_config['report_broken'] && !$dl_files['broken'])
{
	if ($user->data['is_registered'] || (!$user->data['is_registered'] && $dl_config['report_broken'] == 1))
	{
		$template->assign_block_vars('report_broken_dl', array(
			'L_BROKEN_DOWNLOAD' => $user->lang['DL_BROKEN'],
			'U_BROKEN_DOWNLOAD' => append_sid("{$phpbb_root_path}downloads.$phpEx?view=broken", "df_id=$df_id&amp;cat_id=$cat_id"))
		);
	}
}

/*
* some permissions, please!
*/
$cat_auth = array();
$cat_auth = $dl_mod->dl_cat_auth($cat_id);

/*
* Second part of the report link
*/
if ($dl_files['broken'])
{
	if ($index[$cat_id]['auth_mod'] || $cat_auth['auth_mod'] || ($auth->acl_get('a_') && $user->data['is_registered']))
	{
		$template->assign_block_vars('dl_broken_mod', array(
			'L_REPORT' => $user->lang['DL_BROKEN_MOD'],
			'U_REPORT' => append_sid("{$phpbb_root_path}downloads.$phpEx?view=unbroken", "df_id=$df_id&amp;cat_id=$cat_id"))
		);
	}

	if (!$dl_config['report_broken_message'] || ($dl_config['report_broken_lock'] && $dl_config['report_broken_message']))
	{
		$template->assign_block_vars('dl_broken_cur', array(
			'L_REPORT' => $user->lang['DL_BROKEN_CUR'])
		);
	}
}

/*
* Send the values to the template to be able to read something *g*
*/
$template->assign_block_vars('downloads', array(
	'DESCRIPTION'			=> $description,
	'MINI_IMG'				=> $mini_icon,
	'HACK_VERSION'			=> $hack_version,
	'LONG_DESC'				=> $long_desc,
	'STATUS'				=> $status,
	'FILE_SIZE'				=> $file_size_out,
	'FILE_KLICKS'			=> $file_klicks,
	'FILE_OVERALL_KLICKS'	=> $file_overall_klicks,
	'FILE_NAME'				=> ($dl_files['extern']) ? $user->lang['DL_EXTERN'] : $file_name,
	'LAST_TIME'				=> $last_time,
	'ADD_USER'				=> ($add_user != '') ? sprintf($user->lang['DL_ADD_USER'], $add_time, $add_user) : '',
	'CHANGE_USER'			=> ($change_user != '') ? sprintf($user->lang['DL_CHANGE_USER'], $change_time, $change_user) : '')
);

/*
* Enabled Bug Tracker for this download category?
*/
if ($index[$cat_id]['bug_tracker'])
{
	$template->assign_block_vars('downloads.bug_tracker', array(
		'L_BUG_TRACKER'			=> $user->lang['DL_BUG_TRACKER'],
		'L_BUG_TRACKER_FILE'	=> $user->lang['DL_BUG_TRACKER_FILE'],
		'U_BUG_TRACKER'			=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=bug_tracker", "df_id=$df_id"))
	);
}

/*
* Thumbnails? Okay, getting some thumbs, if they exists...
*/
if ($index[$cat_id]['allow_thumbs'] && $dl_config['thumb_fsize'] && $dl_files['thumbnail'])
{
	if (@file_exists($phpbb_root_path . 'dl_mod/thumbs/' . $dl_files['thumbnail']))
	{
		$template->assign_block_vars('downloads.thumbnail', array(
			'L_THUMBNAIL'	=> $user->lang['DL_THUMB'],
			'THUMBNAIL'		=> $phpbb_root_path . 'dl_mod/thumbs/' . $dl_files['thumbnail'])
		);
	}
}

/*
* Urgh, the real filetime..... Heavy information, very important :D
*/
if ($dl_config['show_real_filetime'] && !$dl_files['extern'])
{
	if (@file_exists($dl_config['dl_path'] . $index[$cat_id]['cat_path'] . $real_file))
	{
		$template->assign_block_vars('downloads.real_filetime', array(
			'L_REAL_FILETIME'	=> $user->lang['DL_REAL_FILETIME'],
			'REAL_FILETIME'		=> $user->format_date(@filemtime($dl_config['dl_path'] . $index[$cat_id]['cat_path'] . $real_file)))
		);
	}
}

/*
* Like to rate? Do it!
*/
$rating_points = $dl_files['rating'];

$u_rating_text = '';

if ((!$rating_points || $rating_access) && $user->data['is_registered'])
{
	$u_rating_text = append_sid("{$phpbb_root_path}downloads.$phpEx?view=detail", "action=rate&amp;df_id=$df_id&amp;dlo=2");
}

if ($ratings)
{
	$rating_count_text = '&nbsp;[ '.$ratings.' ]';
}
else
{
	$rating_count_text = '';
}

$template->assign_vars(array(
	'RATING_IMG'	=> $dl_mod->rating_img($rating_points),
	'RATINGS'		=> $rating_count_text)
);

if ($action == 'rate' && $rating_access)
{
	$rating = '<select name="rate_point">';
	for ( $i = 1; $i <= 10; $i++ )
	{
		$rating .= '<option value="'.$i.'">'.$i.'</option>';
	}
	$rating .= '</select>';

	$s_hidden_fields_rate = array(
		'df_id'		=> $df_id,
		'cat'		=> $cat_id,
		'dlo'		=> $dlo,
		'view'		=> 'detail',
		'action'	=> 'rate',
		'start'		=> $start
	);

	$template->assign_var('S_RATING', true);

	$template->assign_vars(array(
		'RATING'				=> $rating,
		'S_HIDDEN_FIELDS_RATE'	=> build_hidden_fields($s_hidden_fields_rate))
	);
}
else if ($u_rating_text)
{
	$template->assign_block_vars('downloads.rating_view', array(
		'U_RATING' => $u_rating_text)
	);
}

/*
* Some user like to link to each favorite page, download, programm, friend, house friend... ahrrrrrrggggg...
*/
if ($user->data['is_registered'] && !$dl_config['disable_email'])
{
	$sql = 'SELECT fav_id FROM ' . DL_FAVORITES_TABLE . "
		WHERE fav_dl_id = $df_id
			AND fav_user_id = " . $user->data['user_id'];
	$result = $db->sql_query($sql);
	$fav_id = $db->sql_fetchfield('fav_id');
	$db->sql_freeresult($result);

	$template->assign_var('S_FAV_BLOCK', true);

	if ($fav_id)
	{
		$l_favorite = $user->lang['DL_FAVORITE_DROP'];
		$u_favorite = append_sid("{$phpbb_root_path}downloads.$phpEx?view=unfav", "df_id=$df_id&amp;cat_id=$cat_id&amp;fav_id=$fav_id");
	}
	else
	{
		$l_favorite = $user->lang['DL_FAVORITE_ADD'];
		$u_favorite = append_sid("{$phpbb_root_path}downloads.$phpEx?view=fav", "df_id=$df_id&amp;cat_id=$cat_id");
	}
}
else
{
	$l_favorite = '';
	$u_favorite = '';
}

$file_id	= $dl_files['id'];
$cat_id		= $dl_files['cat'];

/*
* Can we edit the download? Yes we can, or not?
*/
if ($dl_mod->user_auth($dl_files['cat'], 'auth_mod') || ($dl_config['edit_own_downloads'] && $dl_files['add_user'] == $user->data['user_id']))
{
	$template->assign_var('S_EDIT_BUTTON', true);
}

/*
* A little bit more values and strings for the template *bfg*
*/
$template->assign_vars(array(
	'L_DESCRIPTION'				=> $user->lang['DL_FILE_DESCRIPTION'],
	'L_DETAILS'					=> $user->lang['DL_DETAIL'],
	'L_DL_HACK_AUTHOR'			=> $user->lang['DL_HACK_AUTOR'],
	'L_DL_HACK_AUTHOR_WEBSITE'	=> $user->lang['DL_HACK_AUTOR_WEBSITE'],
	'L_DL_HACK_DL_URL'			=> $user->lang['DL_HACK_DL_URL'],
	'L_DL_MOD_REQUIRE'			=> $user->lang['DL_MOD_REQUIRE'],
	'L_DL_MOD_TEST'				=> $user->lang['DL_MOD_TEST'],
	'L_DL_MOD_TODO'				=> $user->lang['DL_MOD_TODO'],
	'L_DOWNLOAD'				=> $user->lang['DL_DOWNLOAD'],
	'L_FILE_NAME'				=> $user->lang['DL_FILE_NAME'],
	'L_KLICKS'					=> $user->lang['DL_KLICKS'],
	'L_OVERALL_KLICKS'			=> $user->lang['DL_OVERALL_KLICKS'],
	'L_NAME'					=> $user->lang['DL_DOWNLOAD'],
	'L_SIZE'					=> $user->lang['DL_FILE_SIZE'],
	'L_RATING_TITLE'			=> $user->lang['DL_RATING'],
	'L_DL_MOD_DESC'				=> $user->lang['DL_MOD_DESC'],
	'L_DL_MOD_WARNING'			=> $user->lang['DL_MOD_WARNING'],
	'L_DL_TOP'					=> $user->lang['DL_CAT_TITLE'],
	'L_FAVORITE'				=> $l_favorite,
	'L_SHOW_COMMENTS'			=> $user->lang['DL_COMMENT_SHOW'],
	'L_YOU_CAN_DOWNLOAD'		=> $user->lang['DL_CAN_DOWNLOAD_TRAFFIC'],
	'L_POST_COMMENT'			=> $user->lang['DL_COMMENT_WRITE'],
	'L_LAST_COMMENT'			=> $user->lang['DL_LAST_COMMENT'],
	'L_RATING_TEXT'				=> $user->lang['DL_KLICK_TO_RATE'],
	'L_TOPIC'					=> $user->lang['TOPIC'],
	'L_LINK'					=> $user->lang['VIEW_TOPIC'],

	'EDIT_IMG'					=> $user->lang['DL_EDIT_FILE'],

	'S_DL_ACTION'				=> append_sid("{$phpbb_root_path}downloads.$phpEx"),

	'U_TOPIC'					=> append_sid("{$phpbb_root_path}viewtopic.$phpEx?t=" . $dl_files['dl_topic']),
	'U_EDIT'					=> append_sid("{$phpbb_root_path}downloads.$phpEx?view=modcp", "action=edit&amp;df_id=$file_id&amp;cat_id=$cat_id"),
	'U_FAVORITE'				=> $u_favorite,
	'U_DL_SEARCH'				=> '[ <a href="' . append_sid("{$phpbb_root_path}downloads.$phpEx?view=search") . '">' . $user->lang['DL_SEARCH_DOWNLOAD'] . '</a> ]',
));

if ($dl_files['dl_topic'])
{
	$template->assign_var('S_SHOW_TOPIC_LINK', true);
}

/*
* The end... Yes? Yes!
*/

?>