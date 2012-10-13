<?php
/**
*
* @author michaelo phpbbireland@gmail.com - http://www.phpbbireland.com 
*
* @package umil
* @version 1.0.0
* @copyright (c) 2009 integramod team
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);

// correct root for poral as we install using root/portal/index.php //

$phpbb_root_path = './../';

$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

$user->session_begin();
$auth->acl($user->data);
$user->setup();

$mode = request_var('mode', '');

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The name of the mod to be displayed during installation.
$mod_name = 'INTEGRAMOD_3';

$version_config_name = 'imod_version';
$language_file = 'imod_install_umil';
$logo_img = 'imod/imod_install.png';

include('sql_data.' . $phpEx);

$versions = array(

	// Version 1.0.0
	'1.0.0' => array(
		// Add notice use portal removal tool for version prior to 1.0.0
	),
	// Version 2.0.0
	'2.0.0' => array(
		// Add notice use portal removal tool for version prior to 1.0.0
	),

	// Second RC version 3.0.0
	'3.0.0'	=> array(

		'permission_add' => array(
			array('a_imod', 1),
			array('a_config_kb', 1),
			array('a_categorie_kb', 1),
			array('a_types_kb', 1),
			array('u_add_kb', 1),
			array('u_edit_kb', 1),
			array('u_del_kb', 1),
			array('u_print_kb', 1),
			array('u_attache_kb', 1),
			array('u_report_kb', 1),
			array('u_restore_kb', 1),
			array('u_rate_kb', 1),
			array('m_log_kb', 1),
			array('m_log_kb_delete', 1),
			array('m_report_kb', 1),
			array('m_activate_kb', 1),
			array('m_edit_kb', 1),
			array('m_del_kb', 1),
			array('m_ch_poster', 1),
			array('a_dl_overview', 1),
			array('a_dl_config', 1),
			array('a_dl_traffic', 1),
			array('a_dl_categories', 1),
			array('a_dl_files', 1),
			array('a_dl_permissions', 1),
			array('a_dl_stats', 1),
			array('a_dl_banlist', 1),
			array('a_dl_blacklist', 1),
			array('a_dl_toolbox', 1),
			array('a_gallery_manage', 1),
			array('a_gallery_albums', 1),
			array('a_gallery_import', 1),
			array('a_gallery_cleanup', 1),
		),

		'permission_set' => array(
			array('ROLE_ADMIN_FULL', 'a_imod'),
			array('ROLE_ADMIN_FULL', 'a_config_kb'),
			array('ROLE_ADMIN_FULL', 'a_categorie_kb'),
			array('ROLE_ADMIN_FULL', 'a_types_kb'),
			array('ADMINISTRATORS', 'a_dl_overview', 'group'),
			array('ADMINISTRATORS', 'a_dl_config', 'group'),
			array('ADMINISTRATORS', 'a_dl_traffic', 'group'),
			array('ADMINISTRATORS', 'a_dl_categories', 'group'),
			array('ADMINISTRATORS', 'a_dl_files', 'group'),
			array('ADMINISTRATORS', 'a_dl_permissions', 'group'),
			array('ADMINISTRATORS', 'a_dl_stats', 'group'),
			array('ADMINISTRATORS', 'a_dl_banlist', 'group'),
			array('ADMINISTRATORS', 'a_dl_blacklist', 'group'),
			array('ADMINISTRATORS', 'a_dl_toolbox', 'group'),
		),


		'config_add' => array(
			array('imod_enabled', true),
			array('imod_version', '3.0.0'),
			array('num_kb_article', '0'),
			array('num_images', '0'),
			array('gallery_total_images', '1'),
			array('gallery_viewtopic_icon', '1'),
			array('gallery_viewtopic_images', '1'),
			array('gallery_viewtopic_link', '0'),
		),


		'table_add' => array(

			array('phpbb_imod_config', array(
					'COLUMNS'	=> array(
						'id'				=> array('USINT', NULL, 'auto_increment'),
						'imod_version'		=> array('VCHAR:8', '3.0.0'),
						'imod_enabled'		=> array('BOOL', '1'),
					),
				'PRIMARY_KEY'	=> 'id',
				),
			),

			array('phpbb_imod_config_vars', array(
					'COLUMNS'	=> array(
						'config_name'		=> array('VCHAR', ''),
						'config_value'		=> array('VCHAR', ''),
						'is_dynamic'		=> array('BOOL', '0'),
					),
					'PRIMARY_KEY'	=> 'config_name',
					'KEYS'			=> array('is_dynamic'	=> array('INDEX', 'is_dynamic'),
					),
				),
			),

			array('phpbb_kb_article', array(
					'COLUMNS'	=> array(
						'article_id'			=> array('UINT:11', NULL, 'auto_increment'),
						'cat_id'				=> array('UINT:8', '0'),
						'type_id'				=> array('UINT:8', '0'),
						'hits'					=> array('UINT:11', '0'),
						'titel'					=> array('VCHAR_UNI', NULL, ''),
						'description'			=> array('TEXT_UNI', NULL, ''),
						'article'				=> array('TEXT_UNI', NULL, ''),
						'user_id'				=> array('UINT', '0'),
						'last_edit_user'		=> array('UINT', '0'),
						'activ'					=> array('BOOL', '0'),
						'bbcode_uid'			=> array('VCHAR_UNI:8', NULL, ''),
						'bbcode_bitfield'		=> array('VCHAR_UNI', NULL, ''),
						'bbcode_options'		=> array('VCHAR_UNI', NULL, ''),
						//'bbcode_options'		=> array('UINT:4', NULL, ''),
						'enable_magic_url'		=> array('BOOL', '0'),
						'enable_smilies'		=> array('BOOL', '0'),
						'enable_bbcode'			=> array('BOOL', '0'),
						'page_uri'				=> array('VCHAR_UNI', NULL, ''),
						'post_time'				=> array('VCHAR_UNI:14', NULL, ''),
						'last_change'			=> array('VCHAR_UNI:14', NULL, ''),
						'post_id'				=> array('UINT', '0'),
						'has_attachment'		=> array('BOOL', '0'),
						'reported_id'			=> array('UINT', '0'),
						'rating'				=> array('UINT', '0'),
					),
					'PRIMARY_KEY'	=> 'article_id',
					'KEYS'	=> array(
						'activ'	=>	array('INDEX', 'activ'), 
						'titel'	=>	array('FULLTEXT', 'titel'),
					),
				),
			),
			//$sql = "ALTER TABLE phpbb_kb_article DROP INDEX titel, ADD FULLTEXT titel (titel)";


			array('phpbb_kb_article_diff', array(
					'COLUMNS'	=> array(
						'diff_id'			=> array('UINT', NULL, 'auto_increment'),
						'article_id'		=> array('UINT', NULL, '0'),
						'article'			=> array('TEXT_UNI', NULL, ''),
						'bbcode_uid'		=> array('VCHAR_UNI:8', NULL, ''),
						'time'				=> array('VCHAR_UNI:14', NULL, ''),
						'edit_reason'		=> array('TEXT_UNI', NULL, ''),
						'user_id'			=> array('UINT', NULL, '0'),
					),
					'PRIMARY_KEY'	=> 'diff_id',
				),
			),
			array('phpbb_kb_rating', array(
					'COLUMNS'	=> array(
						'article_id'	=> array('UINT', NULL, '0'),
						'user_id'		=> array('UINT', NULL, '0'),
						'points'		=> array('UINT', NULL, '0'),
					),
				),
			),
			array('phpbb_kb_reports', array(
					'COLUMNS'	=> array(
						'report_id'		=> array('UINT', NULL, 'auto_increment'),
						'reason_id'		=> array('USINT', NULL, '0'),
						'article_id'	=> array('UINT', NULL, '0'),
						'user_id'		=> array('UINT', NULL, '0'),
						'user_notify'	=> array('BOOL', NULL, '0'),
						'report_closed'	=> array('BOOL', NULL, '0'),
						'report_time'	=> array('TIMESTAMP', NULL, '0'),
						'report_text'	=> array('MTEXT_UNI', NULL, ''),
					),
					'PRIMARY_KEY'	=> 'report_id',
				),
			),
			array('phpbb_kb_categorie', array(
					'COLUMNS'	=> array(
						'cat_id'		=> array('UINT', NULL, 'auto_increment'),
						'right_id'		=> array('UINT', NULL, '0'),
						'left_id'		=> array('UINT', NULL, '0'),
						'parent_id'		=> array('UINT', NULL, '0'),
						'cat_mode'		=> array('BOOL', NULL, '0'),
						'cat_parents'	=> array('TEXT', NULL, ''),
						'show_edits'	=> array('BOOL', NULL, '0'),
						'post_forum'	=> array('UINT', NULL, '0'),
						'cat_title'		=> array('VCHAR_UNI', NULL, ''),
						'description'	=> array('TEXT_UNI', NULL, ''),
						'bbcode_uid'		=> array('VCHAR_UNI:8', ''),
						'bbcode_bitfield'	=> array('VCHAR_UNI', ''),
						'bbcode_options'	=> array('UINT:4', '0'),
						'image'				=> array('VCHAR_UNI', NULL, ''),
						'display_on_index'	=> array('BOOL', '0'),
						'cat_articles'		=> array('UINT', '0'),
						'last_article_url'	=> array('VCHAR_UNI', NULL, ''),
						'last_article_time'	=> array('VCHAR_UNI:14', NULL, ''),
						'last_article_id'	=> array('UINT', NULL, '0'),
						'last_article_poster_name'	=> array('VCHAR_UNI', NULL, ''),
						'last_article_poster_id'	=> array('UINT', NULL, '0'),
						'last_article_poster_colour'	=> array('VCHAR:6', NULL, '0'),
						'last_article_title'		=> array('VCHAR_UNI', NULL, ''),
						'ads'						=> array('TEXT_UNI', NULL, ''),
					),
					'PRIMARY_KEY'	=> 'cat_id',
				),
			),
			array('phpbb_kb_changelog', array(
					'COLUMNS'	=> array(
						'log_id'		=> array('UINT', NULL, 'auto_increment'),
						'article_id'	=> array('UINT', NULL, '0'),
						'time'			=> array('VCHAR_UNI:14', NULL, ''),
						'user_id'		=> array('UINT', NULL, '0'),
						'reason'		=> array('MTEXT_UNI', NULL, ''),
					),
					'PRIMARY_KEY'	=> 'log_id',
				),
			),
			array('phpbb_kb_article_track', array(
					'COLUMNS'	=> array(
						'user_id'		=> array('UINT', NULL),
						'article_id'	=> array('UINT', NULL),
						'cat_id'		=> array('UINT', NULL),
						'mark_time'		=> array('TIMESTAMP', NULL, '0'),
					),
				),
			),


			array('phpbb_kb_types', array(
					'COLUMNS'	=> array(
						'type_id'	=> array('UINT', NULL, 'auto_increment'),
						'name'		=> array('VCHAR', NULL, '0'),
					),
					'PRIMARY_KEY'	=> 'type_id',
				),
			),
			array('phpbb_kb_config', array(
					'COLUMNS'	=> array(
						'config_name'	=> array('XSTEXT_UNI', NULL, ''),
						'config_value'	=> array('MTEXT_UNI', NULL, ''),
						'config_type'	=> array('BOOL', NULL, '0'),
					),
				),
			),


			array('phpbb_downloads', array(
					'COLUMNS'		=> array(
						'id'		=> array('UINT:11', NULL, 'auto_increment'),
						'description'			=> array('MTEXT_UNI', ''),
						'file_name'				=> array('VCHAR', ''),
						'real_file'				=> array('VCHAR', ''),
						'klicks'				=> array('INT:11', 0),
						'free'					=> array('BOOL', 0),
						'extern'				=> array('BOOL', 0),
						'long_desc'				=> array('MTEXT_UNI', ''),
						'sort'					=> array('INT:11', 0),
						'cat'					=> array('INT:11', 0),
						'hacklist'				=> array('BOOL', 0),
						'hack_author'			=> array('VCHAR', ''),
						'hack_author_email'		=> array('VCHAR', ''),
						'hack_author_website'	=> array('TEXT_UNI', ''),
						'hack_version'			=> array('VCHAR:32', ''),
						'hack_dl_url'			=> array('TEXT_UNI', ''),
						'test'					=> array('VCHAR:50', ''),
						'req'					=> array('MTEXT_UNI', ''),
						'todo'					=> array('MTEXT_UNI', ''),
						'warning'				=> array('MTEXT_UNI', ''),
						'mod_desc'				=> array('MTEXT_UNI', ''),
						'mod_list'				=> array('BOOL', 0),
						'file_size'				=> array('BINT', 0),
						'change_time'			=> array('TIMESTAMP', 0),
						'add_time'				=> array('TIMESTAMP', 0),
						'rating'				=> array('INT:5', 0),
						'file_traffic'			=> array('BINT', 0),
						'overall_klicks'		=> array('INT:11', 0),
						'approve'				=> array('BOOL', 0),
						'add_user'				=> array('UINT', 0),
						'change_user'			=> array('UINT', 0),
						'last_time'				=> array('TIMESTAMP', 0),
						'down_user'				=> array('UINT', 0),
						'thumbnail'				=> array('VCHAR', ''),
						'broken'				=> array('BOOL', 0),
						'mod_desc_uid'			=> array('CHAR:8', ''),
						'mod_desc_bitfield'		=> array('VCHAR', ''),
						'mod_desc_flags'		=> array('UINT:11', 0),
						'long_desc_uid'			=> array('CHAR:8', ''),
						'long_desc_bitfield'	=> array('VCHAR', ''),
						'long_desc_flags'		=> array('UINT:11', 0),
						'desc_uid'				=> array('CHAR:8', ''),
						'desc_bitfield'			=> array('VCHAR', ''),
						'desc_flags'			=> array('UINT:11', 0),
						'warn_uid'				=> array('CHAR:8', ''),
						'warn_bitfield'			=> array('VCHAR', ''),
						'warn_flags'			=> array('UINT:11', 0),
						'dl_topic'				=> array('INT:11', 0),
						),
						'PRIMARY_KEY'	=> 'id',
					),
				),

				array('phpbb_downloads_cat', array(		
					'COLUMNS'		=> array(
						'id'				=> array('UINT:11', NULL, 'auto_increment'),
						'parent'			=> array('INT:11', 0),
						'path'				=> array('VCHAR', ''),
						'cat_name'			=> array('VCHAR', ''),
						'sort'				=> array('INT:11', 0),
						'description'		=> array('MTEXT_UNI', ''),
						'rules'				=> array('MTEXT_UNI', ''),
						'auth_view'			=> array('BOOL', 1),
						'auth_dl'			=> array('BOOL', 1),
						'auth_up'			=> array('BOOL', 0),
						'auth_mod'			=> array('BOOL', 0),
						'must_approve'		=> array('BOOL', 0),
						'allow_mod_desc'	=> array('BOOL', 0),
						'statistics'		=> array('BOOL', 1),
						'stats_prune'		=> array('UINT', 0),
						'comments'			=> array('BOOL', 1),
						'cat_traffic'		=> array('BINT', 0),
						'cat_traffic_use'	=> array('BINT', 0),
						'allow_thumbs'		=> array('BOOL', 0),
						'auth_cread'		=> array('BOOL', 0),
						'auth_cpost'		=> array('BOOL', 1),
						'approve_comments'	=> array('BOOL', 1),
						'bug_tracker'		=> array('BOOL', 0),
						'desc_uid'			=> array('CHAR:8', ''),
						'desc_bitfield'		=> array('VCHAR', ''),
						'desc_flags'		=> array('UINT:11', 0),
						'rules_uid'			=> array('CHAR:8', ''),
						'rules_bitfield'	=> array('VCHAR', ''),
						'rules_flags'		=> array('UINT:11', 0),
						'dl_topic_forum'	=> array('INT:11', 0),
						'dl_topic_text'		=> array('MTEXT_UNI', ''),
						'cat_icon'			=> array('VCHAR', ''),
					),
					'PRIMARY_KEY'	=> 'id',
				),
			),

			array('phpbb_dl_auth', array(		
					'COLUMNS'		=> array(
						'cat_id'	=> array('INT:11', 0),
						'group_id'	=> array('INT:11', 0),
						'auth_view'	=> array('BOOL', 1),
						'auth_dl'	=> array('BOOL', 1),
						'auth_up'	=> array('BOOL', 1),
						'auth_mod'	=> array('BOOL', 0),
					),
				),
			),

			array('phpbb_dl_comments', array(		
					'COLUMNS'	=> array(
						'dl_id'				=> array('BINT', NULL, 'auto_increment'),
						'id'				=> array('INT:11', 0),
						'cat_id'			=> array('INT:11', 0),
						'user_id'			=> array('UINT', 0),
						'username'			=> array('VCHAR:32', ''),
						'comment_time'		=> array('TIMESTAMP', 0),
						'comment_edit_time'	=> array('TIMESTAMP', 0),
						'comment_text'		=> array('MTEXT_UNI', ''),
						'approve'			=> array('BOOL', 0),
						'com_uid'			=> array('CHAR:8', ''),
						'com_bitfield'		=> array('VCHAR', ''),
						'com_flags'			=> array('UINT:11', 0),
					),
					'PRIMARY_KEY'	=> 'dl_id',
				),
			),

			array('phpbb_dl_ratings', array(		
					'COLUMNS'		=> array(
					'dl_id'			=> array('UINT:11', 0),
					'user_id'		=> array('UINT', 0),
					'rate_point'	=> array('CHAR:10', ''), 
					),
				),
			),


			array('phpbb_dl_stats', array(		
					'COLUMNS'		=> array(
						'dl_id'			=> array('BINT', NULL, 'auto_increment'),
						'id'			=> array('INT:11', 0),
						'cat_id'		=> array('INT:11', 0),
						'user_id'		=> array('UINT', 0),
						'username'		=> array('VCHAR:32', ''),
						'traffic'		=> array('BINT', 0),
						'direction'		=> array('BOOL', 0),
						'user_ip'		=> array('VCHAR:40', ''),
						'browser'		=> array('VCHAR:20', ''),
						'time_stamp'	=> array('INT:11', 0),
					),
					'PRIMARY_KEY'	=> 'dl_id',
				),
			),

			array('phpbb_dl_config', array(		
					'COLUMNS'		=> array(
						'config_name'	=> array('VCHAR', ''),
						'config_value'	=> array('VCHAR', ''),
					),
					'PRIMARY_KEY'	=> 'config_name',
				),
			),
			array('phpbb_dl_ext_blacklist', array(		
					'COLUMNS'		=> array(
						'extention'	=> array('CHAR:10', ''),
					),
				),
			),
			array('phpbb_dl_banlist', array(		
					'COLUMNS'		=> array(
						'ban_id'		=> array('UINT:11', NULL, 'auto_increment'),
						'user_id'		=> array('UINT', 0),
						'user_ip'		=> array('VCHAR:40', ''),
						'user_agent'	=> array('VCHAR:50', ''),
						'username'		=> array('VCHAR:25', ''),
						'guests'		=> array('BOOL', 0),
					),
					'PRIMARY_KEY'	=> 'ban_id',
				),
			),
			array('phpbb_dl_favorites', array(		
					'COLUMNS'		=> array(
						'fav_id'		=> array('UINT:11', NULL, 'auto_increment'),
						'fav_dl_id'		=> array('INT:11', 0),
						'fav_dl_cat'	=> array('INT:11', 0),
						'fav_user_id'	=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'fav_id',
				),
			),
			array('phpbb_dl_notraf', array(		
					'COLUMNS'		=> array(
						'user_id'	=> array('UINT', 0),
						'dl_id'		=> array('INT:11', 0),
					),
				),
			),
			array('phpbb_dl_hotlink', array(		
					'COLUMNS'		=> array(
						'user_id'		=> array('UINT', 0),
						'session_id'	=> array('VCHAR:32', ''),
						'hotlink_id'	=> array('VCHAR:32', ''),
						'code'			=> array('CHAR:5', ''),
					),
				),
			),
			array('phpbb_dl_bug_tracker', array(		
					'COLUMNS'		=> array(
						'report_id'				=> array('UINT:11', NULL, 'auto_increment'),
						'df_id'					=> array('INT:11', 0),
						'report_title'			=> array('VCHAR', ''),
						'report_text'			=> array('MTEXT_UNI', ''),
						'report_file_ver'		=> array('VCHAR:50', ''),
						'report_date'			=> array('TIMESTAMP', 0),
						'report_author_id'		=> array('UINT', 0),
						'report_assign_id'		=> array('UINT', 0),
						'report_assign_date'	=> array('TIMESTAMP', 0),
						'report_status'			=> array('BOOL', 0),
						'report_status_date'	=> array('TIMESTAMP', 0),
						'report_php'			=> array('VCHAR:50', ''),
						'report_db'				=> array('VCHAR:50', ''),
						'report_forum'			=> array('VCHAR:50', ''),
						'bug_uid'				=> array('CHAR:8', ''),
						'bug_bitfield'			=> array('VCHAR', ''),
						'bug_flags'				=> array('UINT:11', 0),
					),
					'PRIMARY_KEY'	=> 'report_id',
				),
			),
			array('phpbb_dl_bug_history', array(		
					'COLUMNS'		=> array(
						'report_his_id'		=> array('UINT:11', NULL, 'auto_increment'),
						'df_id'				=> array('INT:11', 0),
						'report_id'			=> array('INT:11', 0),
						'report_his_type'	=> array('CHAR:10', ''),
						'report_his_date'	=> array('TIMESTAMP', 0),
						'report_his_value'	=> array('VCHAR', ''),
					),
					'PRIMARY_KEY'	=> 'report_his_id',
				),
			),


			array('phpbb_gallery_albums', array(		
					'COLUMNS'		=> array(
						'album_id'		=> array('UINT', NULL, 'auto_increment'),
						'parent_id'		=> array('UINT', 0),
						'left_id'		=> array('UINT', 0),
						'right_id'		=> array('UINT', 0),
						'album_parents'	=> array('MTEXT_UNI', NULL, ''),
						'album_type'	=> array('TINT:3', 0),
						'album_status'	=> array('BOOL', 1),
						'album_contest'	=> array('UINT', 0),
						'album_name'	=> array('VCHAR_CI', ''),
						'album_desc'	=> array('MTEXT_UNI', NULL, ''),
						'album_desc_options'	=> array('TINT:3', '7'),
						'album_desc_uid'		=> array('VCHAR:8', ''),
						'album_desc_bitfield'	=> array('VCHAR_CI', ''),
						'album_user_id'				=> array('UINT', 0),
						'album_images'				=> array('UINT', 0),
						'album_images_real'			=> array('UINT', 0),
						'album_last_image_id'		=> array('UINT', 0),
						'album_image'				=> array('VCHAR_UNI', ''),
						'album_last_image_time'		=> array('TIMESTAMP', 0),
						'album_last_image_name'		=> array('VCHAR_UNI', ''),
						'album_last_username'		=> array('VCHAR_UNI', ''),
						'album_last_user_colour'	=> array('CHAR:6', ''),
						'album_last_user_id'		=> array('UINT', 0),
						'display_in_rrc'			=> array('BOOL', 1),
						'display_on_index'			=> array('BOOL', 1),
						'display_subalbum_list'		=> array('BOOL', 1),
					),
					'PRIMARY_KEY'	=> 'album_id',
				),
			),

			array('phpbb_gallery_albums_track', array(		
					'COLUMNS'	=> array(
						'user_id'		=> array('UINT', 0),
						'album_id'		=> array('UINT', 0),
						'mark_time'		=> array('TIMESTAMP', 0),
					),
					'PRIMARY_KEY'	=> array('album_id', 'user_id'),
				),
			),

			array('phpbb_gallery_comments', array(		
					'COLUMNS'	=> array(
						'comment_id'	=> array('UINT', NULL, 'auto_increment'),
						'comment_image_id'		=> array('UINT', 0),
						'comment_user_id'		=> array('UINT', 0),
						'comment_username'		=> array('VCHAR_CI', ''),
						'comment_user_colour'	=> array('VCHAR:6', ''),
						'comment_user_ip'		=> array('VCHAR:40', ''),
						'comment_time'			=> array('TIMESTAMP', 0),
						'comment'				=> array('MTEXT_UNI', ''),
						'comment_uid'			=> array('VCHAR:8', ''),
						'comment_bitfield'		=> array('VCHAR_UNI', ''),
						'comment_edit_time'		=> array('TIMESTAMP', 0),
						'comment_edit_count'	=> array('USINT', 0),
						'comment_edit_user_id'	=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'comment_id',
					'KEYS'			=> array(
						'comment_user_id'	=> array('INDEX', 'comment_user_id'),
						'comment_user_ip'	=> array('INDEX', 'comment_user_ip'),
						'comment_time'		=> array('INDEX', 'comment_time'), 
					),
				),
			),
			array('phpbb_gallery_config', array(		
					'COLUMNS'		=> array(
						'config_name'		=> array('VCHAR_UNI', ''),
						'config_value'		=> array('VCHAR_UNI', ''),
					),
					'PRIMARY_KEY'	=> 'config_name',
				),
			),
			array('phpbb_gallery_contests', array(		
					'COLUMNS'		=> array(
						'contest_id'		=> array('UINT', NULL, 'auto_increment'),
						'contest_album_id'	=> array('UINT', 0),
						'contest_start'		=> array('TIMESTAMP', 0),
						'contest_rating'	=> array('TIMESTAMP', 0),
						'contest_end'		=> array('TIMESTAMP', 0),
						'contest_marked'	=> array('BOOL', 0),
						'contest_first'		=> array('UINT', 0),
						'contest_second'	=> array('UINT', 0),
						'contest_third'		=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'contest_id',
				),
			),
			array('phpbb_gallery_favorites', array(		
					'COLUMNS'	=> array(
						'favorite_id'		=> array('UINT', NULL, 'auto_increment'),
						'user_id'			=> array('UINT', 0),
						'image_id'			=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'favorite_id',
					'KEYS'			=> array(
						'user_id'	=> array('INDEX', 'user_id'),
						'image_id'	=> array('INDEX', 'image_id'), 
					),
				),
			),
			array('phpbb_gallery_images', array(		
					'COLUMNS'		=> array(
						'image_id'				=> array('UINT', NULL, 'auto_increment'),
						'image_filename'		=> array('VCHAR_UNI', ''),
						'image_thumbnail'		=> array('VCHAR_UNI', ''),
						'image_name'			=> array('VCHAR_UNI', ''),
						'image_name_clean'		=> array('VCHAR_UNI', ''),
						'image_desc'			=> array('MTEXT_UNI', ''),
						'image_desc_uid'		=> array('VCHAR:8', ''),
						'image_desc_bitfield'	=> array('VCHAR_UNI', ''),
						'image_user_id'			=> array('UINT', 0),
						'image_username'		=> array('VCHAR_UNI', ''),
						'image_username_clean'	=> array('VCHAR_UNI', ''),
						'image_user_colour'		=> array('VCHAR:6', ''),
						'image_user_ip'			=> array('VCHAR:40', ''),
						'image_time'			=> array('TIMESTAMP', 0),
						'image_album_id'		=> array('UINT', 0),
						'image_view_count'		=> array('UINT:11', 0),
						'image_status'			=> array('UINT:3', 0),
						'image_contest'			=> array('BOOL', 0),
						'image_contest_end'		=> array('TIMESTAMP', 0),
						'image_contest_rank'	=> array('UINT:3', 0),
						'image_filemissing'		=> array('UINT:3', 0),
						'image_has_exif'		=> array('UINT:3', 0),
						'image_exif_data'		=> array('TEXT_UNI', NULL, ''),
						'image_rates'			=> array('UINT', 0),
						'image_rate_points'		=> array('UINT', 0),
						'image_rate_avg'		=> array('UINT', 0),
						'image_comments'		=> array('UINT', 0),
						'image_last_comment'	=> array('UINT', 0),
						'image_favorited'		=> array('UINT', 0),
						'image_reported'		=> array('UINT', 0),
						'filesize_upload'		=> array('UINT:20', 0),
						'filesize_medium'		=> array('UINT:20', 0),
						'filesize_cache'		=> array('UINT:20', 0),
					),
					'PRIMARY_KEY'	=> 'image_id',
						'KEYS'	=> array(
						'image_album_id'	=> array('INDEX', 'image_album_id'),
						'image_user_id'		=> array('INDEX', 'image_user_id'), 
						'image_time'		=> array('INDEX', 'image_time'), 
					),
				),
			),
			array('phpbb_gallery_modscache', array(		
					'COLUMNS'		=> array(
						'album_id'			=> array('UINT', 0),
						'user_id'			=> array('UINT', 0),
						'username'			=> array('VCHAR_UNI', ''),
						'group_id'			=> array('UINT', 0),
						'group_name'		=> array('VCHAR_UNI', ''),
						'display_on_index'	=> array('BOOL', 1),
					),
					'KEYS'	=> array(
						'disp_idx'	=> array('INDEX', 'display_on_index'),
						'album_id'	=> array('INDEX', 'album_id'),
					),
				),
			),
			array('phpbb_gallery_permissions', array(		
					'COLUMNS'	=> array(
						'perm_id'			=> array('UINT', NULL, 'auto_increment'),
						'perm_role_id'		=> array('UINT', 0),
						'perm_album_id'		=> array('UINT', 0),
						'perm_user_id'		=> array('UINT', 0),
						'perm_group_id'		=> array('UINT', 0),
						'perm_system'		=> array('UINT:3', 0),
					),
					'PRIMARY_KEY'	=> 'perm_id',
				),
			),
			array('phpbb_gallery_rates', array(		
					'COLUMNS'	=> array(
						'rate_image_id'		=> array('UINT', NULL, 'auto_increment'),
						'rate_user_id'		=> array('UINT', 0),
						'rate_user_ip'		=> array('VCHAR:40', ''),
						'rate_point'		=> array('UINT:3', 0),
					),
					'PRIMARY_KEY'	=> 'rate_image_id',
					'KEYS'			=> array(
/*						'rate_image_id'		=> array('INDEX', 'rate_image_id'), */
						'rate_user_id'		=> array('INDEX', 'rate_user_id'),
						'rate_user_ip'		=> array('INDEX', 'rate_user_ip'), 
						'rate_point'		=> array('INDEX', 'rate_point'), 
					),
				),
			),
			array('phpbb_gallery_reports', array(		
					'COLUMNS'		=> array(
						'report_id'		=> array('UINT', NULL, 'auto_increment'),
						'report_album_id'		=> array('UINT', 0),
						'report_image_id'		=> array('UINT', 0),
						'reporter_id'			=> array('UINT', 0),
						'report_manager'		=> array('UINT', 0),
						'report_note'			=> array('MTEXT_UNI', ''),
						'report_time'			=> array('TIMESTAMP', 0),
						'report_status'			=> array('UINT:3', 0),
					),
					'PRIMARY_KEY'	=> 'report_id',
				),
			),
			array('phpbb_gallery_roles', array(		
					'COLUMNS'		=> array(
						'role_id'			=> array('UINT', NULL, 'auto_increment'),
						'a_list'			=> array('UINT:3', 0),
						'i_view'			=> array('UINT:3', 0),
						'i_watermark'		=> array('UINT:3', 0),
						'i_upload'			=> array('UINT:3', 0),
						'i_edit'			=> array('UINT:3', 0),
						'i_delete'			=> array('UINT:3', 0),
						'i_rate'			=> array('UINT:3', 0),
						'i_approve'			=> array('UINT:3', 0),
						'i_lock'			=> array('UINT:3', 0),
						'i_report'			=> array('UINT:3', 0),
						'i_count'			=> array('UINT', 0),
						'i_unlimited'		=> array('UINT:3', 0),
						'c_read'			=> array('UINT:3', 0),
						'c_post'			=> array('UINT:3', 0),
						'c_edit'			=> array('UINT:3', 0),
						'c_delete'			=> array('UINT:3', 0),
						'm_comments'		=> array('UINT:3', 0),
						'm_delete'			=> array('UINT:3', 0),
						'm_edit'			=> array('UINT:3', 0),
						'm_move'			=> array('UINT:3', 0),
						'm_report'			=> array('UINT:3', 0),
						'm_status'			=> array('UINT:3', 0),
						'album_count'		=> array('UINT', 0),
						'album_unlimited'	=> array('UINT:3', 0),
					),
					'PRIMARY_KEY'	=> 'role_id',
				),
			),
			array('phpbb_gallery_users', array(		
					'COLUMNS'	=> array(
						'user_id'			=> array('UINT', 0),
						'watch_own'			=> array('UINT:3', 0),
						'watch_favo'		=> array('UINT:3', 0),
						'watch_com'			=> array('UINT:3', 0),
						'user_images'		=> array('UINT', 0),
						'personal_album_id'	=> array('UINT', 0),
						'user_lastmark'		=> array('TIMESTAMP', 0),
					),
					'PRIMARY_KEY'	=> 'user_id',
				),
			),

			array('phpbb_gallery_watch', array(		
					'COLUMNS'		=> array(
						'watch_id'		=> array('UINT', NULL, 'auto_increment'),
						'album_id'		=> array('UINT', 0),
						'image_id'		=> array('UINT', 0),
						'user_id'		=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'watch_id',
					'KEYS'		=> array(
						'user_id'	=> array('INDEX', 'user_id'),
						'image_id'	=> array('INDEX', 'image_id'), 
						'album_id'	=> array('INDEX', 'album_id'), 
					),
				),
			),

		),


		'index_add'	=> array(
			array('phpbb_users', 'pg_palbum_id', array('personal_album_id')),
			array('phpbb_sessions', 'session_aid', array('session_album_id' )),
		),

		'table_column_add' => array(
			array('phpbb_groups', 'group_dl_auto_traffic', array('BINT', 0)),
			array('phpbb_users', 'user_allow_new_download_email', array('BINT', 0)),
			array('phpbb_users', 'user_allow_fav_download_email', array('BINT', 1)),
			array('phpbb_users', 'user_allow_new_download_popup', array('BINT', 1)),
			array('phpbb_users', 'user_allow_fav_download_popup', array('BOOL', 1)),
			array('phpbb_users', 'user_dl_update_time', array('TIMESTAMP', 0)),
			array('phpbb_users', 'user_new_download', array('BOOL', 0)),
			array('phpbb_users', 'user_traffic', array('BINT', 0)),
			array('phpbb_users', 'user_dl_note_type', array('BOOL', 1)),
			array('phpbb_users', 'user_dl_sort_fix', array('BOOL', 0)),
			array('phpbb_users', 'user_dl_sort_opt', array('BOOL', 0)),
			array('phpbb_users', 'user_dl_sort_dir', array('BOOL', 0)),
			array('phpbb_users', 'user_dl_sub_on_index',  array('BOOL', 1)),
			array('phpbb_users', 'album_id',  array('UINT', 0)),
			array('phpbb_users', 'image_id',  array('UINT', 0)),
			array('phpbb_sessions', 'session_album_id',  array('UINT', 0)),
		),

		'module_add' => array(
			array('acp', '0', 'ACP_CAT_IMOD'),
			array('acp', 'ACP_CAT_IMOD', 'ACP_IMOD_CONFIG'),
			array('acp', 'ACP_CAT_IMOD', 'ACP_IMOD_KB'),
			array('acp', 'ACP_CAT_IMOD', 'ACP_IMOD_DOWNLOADS'),
			array('acp', 'ACP_CAT_IMOD', 'ACP_IMOD_PHPBB_GALLERY'),

			array('acp', 'ACP_IMOD_CONFIG',	array(
					'module_basename' => 'imod_config',
				), 
			),
			array('acp', 'ACP_IMOD_KB',	array(
					'module_basename' => 'KB',
				),
			),
			array('acp', 'ACP_IMOD_PHP_GALLERY',	array(
					'module_basename' => 'PHP_GALLERY',
				),
			),

			array('acp', 'ACP_IMOD_DOWNLOADS',	array(
					'module_basename' => 'downloads',
					'module_langname' => 'ACP_USER_OVERVIEW',
					'module_mode' => 'overview',
					'module_auth' => 'acl_a_dl_overview',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
					'module_basename' => 'downloads',
					'module_langname' => 'DL_ACP_CONFIG_MANAGEMENT',
					'module_mode' => 'config',
					'module_auth' => 'acl_a_dl_config',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_ACP_TRAFFIC_MANAGEMENT',
				'module_mode' => 'traffic',
				'module_auth' => 'acl_a_dl_traffic',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname'=> 'DL_ACP_CATEGORIES_MANAGEMENT',
				'module_mode' => 'categories',
				'module_auth' => 'acl_a_dl_categories',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_ACP_FILES_MANAGEMENT',
				'module_mode' => 'files',
				'module_auth' => 'acl_a_dl_files',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_ACP_PERMISSIONS',
				'module_mode' => 'permissions',
				'module_auth' => 'acl_a_dl_permissions',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_ACP_STATS_MANAGEMENT',
				'module_mode' => 'stats',
				'module_auth' => 'acl_a_dl_stats',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_ACP_BANLIST',
				'module_mode' => 'banlist',
				'module_auth' => 'acl_a_dl_banlist',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_EXT_BLACKLIST',
				'module_mode' => 'ext_blacklist',
				'module_auth' => 'acl_a_dl_blacklist',
				),
			),
			array('acp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_MANAGE',
				'module_mode' => 'toolbox',
				'module_auth' => 'acl_a_dl_toolbox',
				),
			),


			array('ucp', '0', 'ACP_IMOD_DOWNLOADS'),
			array('ucp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_CONFIG',
				'module_mode' => 'config',
				),
			),

			array('ucp', 'ACP_IMOD_DOWNLOADS', array(
				'module_basename' => 'downloads',
				'module_langname' => 'DL_FAVORITE',
				'module_mode' => 'favorite',
				),
			),


			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'ACP_GALLERY_OVERVIEW',
				'module_mode' => 'overview',
				'module_auth' => 'acl_a_gallery_manage',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery_config',
				'module_langname' => 'ACP_GALLERY_CONFIGURE_GALLERY',
				'module_mode' => 'main',
				'module_auth' => 'acl_a_gallery_manage',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery_albums',
				'module_langname' => 'ACP_GALLERY_MANAGE_ALBUMS',
				'module_mode' => 'manage',
				'module_auth' => 'acl_a_gallery_albums',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery_permissions',
				'module_langname' => 'ACP_GALLERY_ALBUM_PERMISSIONS',
				'module_mode' => 'manage',
				'module_auth' => 'acl_a_gallery_albums',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery_permissions',
				'module_langname' => 'ACP_GALLERY_ALBUM_PERMISSIONS_COPY',
				'module_mode' => 'copy',
				'module_auth' => 'acl_a_gallery_albums',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'ACP_IMPORT_ALBUMS',
				'module_mode' => 'import_images',
				'module_auth' => 'acl_a_gallery_import',
				),
			),
			array('acp', 'ACP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'ACP_GALLERY_CLEANUP',
				'module_mode' => 'cleanup',
				'module_auth' => 'acl_a_gallery_cleanup',
				),
			),



/*
			array('acp', 'ACP_ADMIN_LOGS', array(
				'module_basename' => 'logs',
				'module_langname' => 'ACP_GALLERY_LOGS',
				'module_mode' => 'gallery',
				'module_auth' => 'acl_a_viewlogs',
				),
			),

*/

			array('ucp', '0', 'UCP_IMOD_PHPBB_GALLERY'),
			array('ucp', 'UCP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'UCP_GALLERY_SETTINGS',
				'module_mode' => 'manage_settings',
				),
			),
			array('ucp', 'UCP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'UCP_GALLERY_PERSONAL_ALBUMS',
				'module_mode' => 'manage_albums',
				),
			),
			array('ucp', 'UCP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'UCP_GALLERY_WATCH',
				'module_mode' => 'manage_subscriptions',
				),
			),
			array('ucp', 'UCP_IMOD_PHPBB_GALLERY', array(
				'module_basename' => 'gallery',
				'module_langname' => 'UCP_GALLERY_FAVORITES',
				'module_mode' => 'manage_favorites',
				),
			),


		), 

		'table_insert' => array(
			array($imod_config_table, $imod_config_array),
			array($imod_config_vars_table, $imod_config_vars_array),
			array($kb_config_table, $kb_config_array),
			array($dl_config_table, $dl_config_array),
			array($gallery_config_table, $gallery_config_array),
		),
	),

);//version


include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>