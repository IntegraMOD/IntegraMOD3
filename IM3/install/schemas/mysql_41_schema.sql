#
# $Id: mysql_41_schema.sql 10107 10-28-2009 10:21:13Z helter $
#

# Table: 'ajax_chat_bans'
CREATE TABLE ajax_chat_bans (
  userID int(11) NOT NULL default '0',
  userName varchar(64) collate utf8_bin NOT NULL default '',
  `dateTime` datetime NOT NULL default '0000-00-00 00:00:00',
  ip varbinary(16) NOT NULL default ''
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'ajax_chat_invitations'
CREATE TABLE ajax_chat_invitations (
  userID int(11) NOT NULL default '0',
  channel int(11) NOT NULL default '0',
  `dateTime` datetime NOT NULL default '0000-00-00 00:00:00'
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'ajax_chat_messages'
CREATE TABLE ajax_chat_messages (
  id int(11) NOT NULL auto_increment,
  userID int(11) NOT NULL default '0',
  userName varchar(64) collate utf8_bin NOT NULL default '',
  userRole int(1) NOT NULL default '0',
  channel int(11) NOT NULL default '0',
  `dateTime` datetime NOT NULL default '0000-00-00 00:00:00',
  ip varbinary(16) NOT NULL default '',
  `text` text collate utf8_bin,
  PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'ajax_chat_online'
CREATE TABLE ajax_chat_online (
  userID int(11) NOT NULL default '0',
  userName varchar(64) collate utf8_bin NOT NULL default '',
  userRole int(1) NOT NULL default '0',
  channel int(11) NOT NULL default '0',
  `dateTime` datetime NOT NULL default '0000-00-00 00:00:00',
  ip varbinary(16) NOT NULL default ''
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_attachments'
CREATE TABLE phpbb_attachments (
	attach_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	post_msg_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	in_message tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	is_orphan tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	physical_filename varchar(255) DEFAULT '' NOT NULL,
	real_filename varchar(255) DEFAULT '' NOT NULL,
	download_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	attach_comment text NOT NULL,
	extension varchar(100) DEFAULT '' NOT NULL,
	mimetype varchar(100) DEFAULT '' NOT NULL,
	filesize int(20) UNSIGNED DEFAULT '0' NOT NULL,
	filetime int(11) UNSIGNED DEFAULT '0' NOT NULL,
	thumbnail tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (attach_id),
	KEY filetime (filetime),
	KEY post_msg_id (post_msg_id),
	KEY topic_id (topic_id),
	KEY poster_id (poster_id),
	KEY is_orphan (is_orphan)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_acl_groups'
CREATE TABLE phpbb_acl_groups (
	group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_option_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_role_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_setting tinyint(2) DEFAULT '0' NOT NULL,
	KEY group_id (group_id),
	KEY auth_opt_id (auth_option_id),
	KEY auth_role_id (auth_role_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_acl_options'
CREATE TABLE phpbb_acl_options (
	auth_option_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	auth_option varchar(50) DEFAULT '' NOT NULL,
	is_global tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	is_local tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	founder_only tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (auth_option_id),
	UNIQUE auth_option (auth_option)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_acl_roles'
CREATE TABLE phpbb_acl_roles (
	role_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	role_name varchar(255) DEFAULT '' NOT NULL,
	role_description text NOT NULL,
	role_type varchar(10) DEFAULT '' NOT NULL,
	role_order smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (role_id),
	KEY role_type (role_type),
	KEY role_order (role_order)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_acl_roles_data'
CREATE TABLE phpbb_acl_roles_data (
	role_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_option_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_setting tinyint(2) DEFAULT '0' NOT NULL,
	PRIMARY KEY (role_id, auth_option_id),
	KEY ath_op_id (auth_option_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_acl_users'
CREATE TABLE phpbb_acl_users (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_option_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_role_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	auth_setting tinyint(2) DEFAULT '0' NOT NULL,
	KEY user_id (user_id),
	KEY auth_option_id (auth_option_id),
	KEY auth_role_id (auth_role_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_banlist'
CREATE TABLE phpbb_banlist (
	ban_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	ban_userid mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	ban_ip varchar(40) DEFAULT '' NOT NULL,
	ban_email varchar(100) DEFAULT '' NOT NULL,
	ban_start int(11) UNSIGNED DEFAULT '0' NOT NULL,
	ban_end int(11) UNSIGNED DEFAULT '0' NOT NULL,
	ban_exclude tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	ban_reason varchar(255) DEFAULT '' NOT NULL,
	ban_give_reason varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (ban_id),
	KEY ban_end (ban_end),
	KEY ban_user (ban_userid, ban_exclude),
	KEY ban_email (ban_email, ban_exclude),
	KEY ban_ip (ban_ip, ban_exclude)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_bbcodes'
CREATE TABLE phpbb_bbcodes (
	bbcode_id tinyint(3) DEFAULT '0' NOT NULL,
	bbcode_tag varchar(16) DEFAULT '' NOT NULL,
	bbcode_helpline varchar(255) DEFAULT '' NOT NULL,
	display_on_posting tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	bbcode_match text NOT NULL,
	bbcode_tpl mediumtext NOT NULL,
	first_pass_match mediumtext NOT NULL,
	first_pass_replace mediumtext NOT NULL,
	second_pass_match mediumtext NOT NULL,
	second_pass_replace mediumtext NOT NULL,
	PRIMARY KEY (bbcode_id),
	KEY display_on_post (display_on_posting)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_bookmarks'
CREATE TABLE phpbb_bookmarks (
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (topic_id, user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_bots'
CREATE TABLE phpbb_bots (
	bot_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	bot_active tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	bot_name varchar(255) DEFAULT '' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	bot_agent varchar(255) DEFAULT '' NOT NULL,
	bot_ip varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (bot_id),
	KEY bot_active (bot_active)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_calendar'
CREATE TABLE phpbb_calendar (         
   event_id mediumint(8) unsigned NOT NULL auto_increment,
   user_id mediumint(8) unsigned NOT NULL default '0',
   event_name varchar(255) collate utf8_bin NOT NULL default '',
   event_desc mediumtext collate utf8_bin NOT NULL,
   event_groups varchar(255) collate utf8_bin NOT NULL default '',
   group_cats smallint(4) unsigned collate utf8_bin default NULL,
   priv_users mediumtext collate utf8_bin NOT NULL,
   enable_bbcode tinyint(1) unsigned NOT NULL default '1',
   enable_html tinyint(1) unsigned NOT NULL default '1',
   enable_smilies tinyint(1) unsigned NOT NULL default '1',
   enable_magic_url tinyint(1) unsigned NOT NULL default '1',
   bbcode_bitfield varchar(255) collate utf8_bin NOT NULL default '',
   bbcode_uid varchar(8) collate utf8_bin NOT NULL default '',
   event_start int(11) collate utf8_bin default NULL,
   event_end int(11) collate utf8_bin default NULL,
   event_repeat varchar(8) default NULL,
   invite_attendees tinyint(1) unsigned NOT NULL default '0',
   event_attendees mediumtext collate utf8_bin NULL,
   event_non_attendees mediumtext collate utf8_bin NULL,
   PRIMARY KEY (event_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_calendar_repeat_events'
CREATE TABLE phpbb_calendar_repeat_events (
   repeat_id varchar(8) default NULL,
   event_start_time int(11) collate utf8_bin default NULL,
   event_end_time int(11) collate utf8_bin default NULL
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_cash'
CREATE TABLE phpbb_cash (
  cash_id mediumint(8) unsigned NOT NULL auto_increment,
  cash_name varchar(255) collate utf8_bin NOT NULL default '',
  cash_value int(11) unsigned NOT NULL default '1',
  cash_trade tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (cash_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_cash_amt'
CREATE TABLE phpbb_cash_amt (
  user_id mediumint(8) unsigned NOT NULL default '0',
  cash_id mediumint(8) unsigned NOT NULL default '1',
  cash_amt int(15) unsigned NOT NULL default '0',
  KEY cash_user (user_id,cash_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_config'
CREATE TABLE phpbb_config (
	config_name varchar(255) DEFAULT '' NOT NULL,
	config_value varchar(255) DEFAULT '' NOT NULL,
	is_dynamic tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (config_name),
	KEY is_dynamic (is_dynamic)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_confirm'
CREATE TABLE phpbb_confirm (
	confirm_id char(32) DEFAULT '' NOT NULL,
	session_id char(32) DEFAULT '' NOT NULL,
	confirm_type tinyint(3) DEFAULT '0' NOT NULL,
	code varchar(8) DEFAULT '' NOT NULL,
	seed int(10) UNSIGNED DEFAULT '0' NOT NULL,
	attempts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (session_id, confirm_id),
	KEY confirm_type (confirm_type)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_disallow'
CREATE TABLE phpbb_disallow (
	disallow_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	disallow_username varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (disallow_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_auth'
CREATE TABLE phpbb_dl_auth (
  	cat_id int(11) NOT NULL default '0',
  	group_id int(11) NOT NULL default '0',
  	auth_view tinyint(1) unsigned NOT NULL default '1',
  	auth_dl tinyint(1) unsigned NOT NULL default '1',
  	auth_up tinyint(1) unsigned NOT NULL default '1',
  	auth_mod tinyint(1) unsigned NOT NULL default '0'
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_banlist'
CREATE TABLE phpbb_dl_banlist (
  	ban_id int(11) unsigned NOT NULL auto_increment,
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	user_ip varchar(40) collate utf8_bin NOT NULL default '',
  	user_agent varchar(50) collate utf8_bin NOT NULL default '',
  	username varchar(25) collate utf8_bin NOT NULL default '',
  	guests tinyint(1) unsigned NOT NULL default '0',
  	PRIMARY KEY  (ban_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_bug_history'
CREATE TABLE phpbb_dl_bug_history (
  	report_his_id int(11) unsigned NOT NULL auto_increment,
  	df_id int(11) NOT NULL default '0',
  	report_id int(11) NOT NULL default '0',
  	report_his_type char(10) collate utf8_bin NOT NULL default '',
  	report_his_date int(11) unsigned NOT NULL default '0',
  	report_his_value varchar(255) collate utf8_bin NOT NULL default '',
  	PRIMARY KEY  (report_his_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_bug_tracker'
CREATE TABLE phpbb_dl_bug_tracker (
  	report_id int(11) unsigned NOT NULL auto_increment,
  	df_id int(11) NOT NULL default '0',
  	report_title varchar(255) collate utf8_bin NOT NULL default '',
  	report_text mediumtext collate utf8_bin NOT NULL,
  	report_file_ver varchar(50) collate utf8_bin NOT NULL default '',
  	report_date int(11) unsigned NOT NULL default '0',
  	report_author_id mediumint(8) unsigned NOT NULL default '0',
  	report_assign_id mediumint(8) unsigned NOT NULL default '0',
  	report_assign_date int(11) unsigned NOT NULL default '0',
  	report_status tinyint(1) unsigned NOT NULL default '0',
  	report_status_date int(11) unsigned NOT NULL default '0',
  	report_php varchar(50) collate utf8_bin NOT NULL default '',
  	report_db varchar(50) collate utf8_bin NOT NULL default '',
  	report_forum varchar(50) collate utf8_bin NOT NULL default '',
  	bug_uid char(8) collate utf8_bin NOT NULL default '',
  	bug_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	bug_flags int(11) unsigned NOT NULL default '0',
  	PRIMARY KEY  (report_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_comments'
CREATE TABLE phpbb_dl_comments (
  	dl_id bigint(20) NOT NULL auto_increment,
  	id int(11) NOT NULL default '0',
  	cat_id int(11) NOT NULL default '0',
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	username varchar(32) collate utf8_bin NOT NULL default '',
  	comment_time int(11) unsigned NOT NULL default '0',
  	comment_edit_time int(11) unsigned NOT NULL default '0',
  	comment_text mediumtext collate utf8_bin NOT NULL,
  	approve tinyint(1) unsigned NOT NULL default '0',
  	com_uid char(8) collate utf8_bin NOT NULL default '',
  	com_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	com_flags int(11) unsigned NOT NULL default '0',
  	PRIMARY KEY  (dl_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_config'
CREATE TABLE phpbb_dl_config (
  	config_name varchar(255) collate utf8_bin NOT NULL default '',
  	config_value varchar(255) collate utf8_bin NOT NULL default '',
  	PRIMARY KEY  (config_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_ext_blacklist'
CREATE TABLE phpbb_dl_ext_blacklist (
  	extention char(10) collate utf8_bin NOT NULL default ''
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_favorites'
CREATE TABLE phpbb_dl_favorites (
  	fav_id int(11) unsigned NOT NULL auto_increment,
  	fav_dl_id int(11) NOT NULL default '0',
  	fav_dl_cat int(11) NOT NULL default '0',
  	fav_user_id mediumint(8) unsigned NOT NULL default '0',
  	PRIMARY KEY  (fav_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_hotlink'
CREATE TABLE phpbb_dl_hotlink (
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	session_id varchar(32) collate utf8_bin NOT NULL default '',
  	hotlink_id varchar(32) collate utf8_bin NOT NULL default '',
  	code varchar(5) collate utf8_bin NOT NULL default ''
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_notraf'
CREATE TABLE phpbb_dl_notraf (
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	dl_id int(11) NOT NULL default '0'
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_ratings'
CREATE TABLE phpbb_dl_ratings (
  	dl_id int(11) unsigned NOT NULL default '0',
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	rate_point char(10) collate utf8_bin NOT NULL default ''
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_dl_stats'
CREATE TABLE phpbb_dl_stats (
  	dl_id bigint(20) NOT NULL auto_increment,
  	id int(11) NOT NULL default '0',
  	cat_id int(11) NOT NULL default '0',
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	username varchar(32) collate utf8_bin NOT NULL default '',
  	traffic bigint(20) NOT NULL default '0',
  	direction tinyint(1) unsigned NOT NULL default '0',
  	user_ip varchar(40) collate utf8_bin NOT NULL default '',
  	browser varchar(20) collate utf8_bin NOT NULL default '',
  	time_stamp int(11) NOT NULL default '0',
  	PRIMARY KEY  (dl_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_downloads'
CREATE TABLE phpbb_downloads (
  	id int(11) unsigned NOT NULL auto_increment,
  	description mediumtext collate utf8_bin NOT NULL,
  	file_name varchar(255) collate utf8_bin NOT NULL default '',
  	real_file varchar(255) collate utf8_bin NOT NULL default '',
  	klicks int(11) NOT NULL default '0',
  	free tinyint(1) unsigned NOT NULL default '0',
  	extern tinyint(1) unsigned NOT NULL default '0',
  	long_desc mediumtext collate utf8_bin NOT NULL,
  	sort int(11) NOT NULL default '0',
  	cat int(11) NOT NULL default '0',
  	hacklist tinyint(1) unsigned NOT NULL default '0',
  	hack_author varchar(255) collate utf8_bin NOT NULL default '',
  	hack_author_email varchar(255) collate utf8_bin NOT NULL default '',
  	hack_author_website text collate utf8_bin NOT NULL,
  	hack_version varchar(32) collate utf8_bin NOT NULL default '',
  	hack_dl_url text collate utf8_bin NOT NULL,
  	test varchar(50) collate utf8_bin NOT NULL default '',
  	req mediumtext collate utf8_bin NOT NULL,
  	todo mediumtext collate utf8_bin NOT NULL,
  	warning mediumtext collate utf8_bin NOT NULL,
  	mod_desc mediumtext collate utf8_bin NOT NULL,
  	mod_list tinyint(1) unsigned NOT NULL default '0',
  	file_size bigint(20) NOT NULL default '0',
  	change_time int(11) unsigned NOT NULL default '0',
  	add_time int(11) unsigned NOT NULL default '0',
  	rating int(5) NOT NULL default '0',
  	file_traffic bigint(20) NOT NULL default '0',
  	overall_klicks int(11) NOT NULL default '0',
  	approve tinyint(1) unsigned NOT NULL default '0',
  	add_user mediumint(8) unsigned NOT NULL default '0',
  	change_user mediumint(8) unsigned NOT NULL default '0',
  	last_time int(11) unsigned NOT NULL default '0',
  	down_user mediumint(8) unsigned NOT NULL default '0',
  	thumbnail varchar(255) collate utf8_bin NOT NULL default '',
  	broken tinyint(1) unsigned NOT NULL default '0',
  	mod_desc_uid char(8) collate utf8_bin NOT NULL default '',
  	mod_desc_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	mod_desc_flags int(11) unsigned NOT NULL default '0',
  	long_desc_uid char(8) collate utf8_bin NOT NULL default '',
  	long_desc_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	long_desc_flags int(11) unsigned NOT NULL default '0',
  	desc_uid char(8) collate utf8_bin NOT NULL default '',
  	desc_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	desc_flags int(11) unsigned NOT NULL default '0',
  	warn_uid char(8) collate utf8_bin NOT NULL default '',
  	warn_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	warn_flags int(11) unsigned NOT NULL default '0',
  	dl_topic int(11) NOT NULL default '0',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_downloads_cat'
CREATE TABLE phpbb_downloads_cat (
  	id int(11) unsigned NOT NULL auto_increment,
  	parent int(11) NOT NULL default '0',
  	path varchar(255) collate utf8_bin NOT NULL default '',
  	cat_name varchar(255) collate utf8_bin NOT NULL default '',
  	sort int(11) NOT NULL default '0',
  	description mediumtext collate utf8_bin NOT NULL,
  	rules mediumtext collate utf8_bin NOT NULL,
  	auth_view tinyint(1) unsigned NOT NULL default '1',
  	auth_dl tinyint(1) unsigned NOT NULL default '1',
  	auth_up tinyint(1) unsigned NOT NULL default '0',
  	auth_mod tinyint(1) unsigned NOT NULL default '0',
  	must_approve tinyint(1) unsigned NOT NULL default '0',
  	allow_mod_desc tinyint(1) unsigned NOT NULL default '0',
  	statistics tinyint(1) unsigned NOT NULL default '1',
  	stats_prune mediumint(8) unsigned NOT NULL default '0',
  	comments tinyint(1) unsigned NOT NULL default '1',
  	cat_traffic bigint(20) NOT NULL default '0',
  	cat_traffic_use bigint(20) NOT NULL default '0',
  	allow_thumbs tinyint(1) unsigned NOT NULL default '0',
  	auth_cread tinyint(1) unsigned NOT NULL default '0',
  	auth_cpost tinyint(1) unsigned NOT NULL default '1',
  	approve_comments tinyint(1) unsigned NOT NULL default '1',
  	bug_tracker tinyint(1) unsigned NOT NULL default '0',
  	desc_uid char(8) collate utf8_bin NOT NULL default '',
  	desc_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	desc_flags int(11) unsigned NOT NULL default '0',
  	rules_uid char(8) collate utf8_bin NOT NULL default '',
  	rules_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	rules_flags int(11) unsigned NOT NULL default '0',
  	dl_topic_forum int(11) NOT NULL default '0',
  	dl_topic_text mediumtext collate utf8_bin NOT NULL,
  	cat_icon varchar(255) collate utf8_bin NOT NULL default '',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_drafts'
CREATE TABLE phpbb_drafts (
	draft_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	save_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	draft_subject varchar(255) DEFAULT '' NOT NULL,
	draft_message mediumtext NOT NULL,
	PRIMARY KEY (draft_id),
	KEY save_time (save_time)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_extensions'
CREATE TABLE phpbb_extensions (
	extension_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	extension varchar(100) DEFAULT '' NOT NULL,
	PRIMARY KEY (extension_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_extension_groups'
CREATE TABLE phpbb_extension_groups (
	group_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	group_name varchar(255) DEFAULT '' NOT NULL,
	cat_id tinyint(2) DEFAULT '0' NOT NULL,
	allow_group tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	download_mode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	upload_icon varchar(255) DEFAULT '' NOT NULL,
	max_filesize int(20) UNSIGNED DEFAULT '0' NOT NULL,
	allowed_forums text NOT NULL,
	allow_in_pm tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (group_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_forums'
CREATE TABLE phpbb_forums (
	forum_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	parent_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	left_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	right_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_parents mediumtext NOT NULL,
	forum_name varchar(255) DEFAULT '' NOT NULL,
	forum_desc text NOT NULL,
	forum_desc_bitfield varchar(255) DEFAULT '' NOT NULL,
	forum_desc_options int(11) UNSIGNED DEFAULT '7' NOT NULL,
	forum_desc_uid varchar(8) DEFAULT '' NOT NULL,
	forum_link varchar(255) DEFAULT '' NOT NULL,
	forum_password varchar(40) DEFAULT '' NOT NULL,
	forum_style mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_image varchar(255) DEFAULT '' NOT NULL,
	forum_rules text NOT NULL,
	forum_rules_link varchar(255) DEFAULT '' NOT NULL,
	forum_rules_bitfield varchar(255) DEFAULT '' NOT NULL,
	forum_rules_options int(11) UNSIGNED DEFAULT '7' NOT NULL,
	forum_rules_uid varchar(8) DEFAULT '' NOT NULL,
	forum_topics_per_page tinyint(4) DEFAULT '0' NOT NULL,
	forum_type tinyint(4) DEFAULT '0' NOT NULL,
	forum_status tinyint(4) DEFAULT '0' NOT NULL,
	forum_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_topics mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_topics_real mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_last_poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_last_post_subject varchar(255) DEFAULT '' NOT NULL,
	forum_last_post_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	forum_last_poster_name varchar(255) DEFAULT '' NOT NULL,
	forum_last_poster_colour varchar(6) DEFAULT '' NOT NULL,
	forum_flags tinyint(4) DEFAULT '32' NOT NULL,
	forum_options int(20) UNSIGNED DEFAULT '0' NOT NULL,
	display_subforum_list tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	display_on_index tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_indexing tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_icons tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_prune tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	prune_next int(11) UNSIGNED DEFAULT '0' NOT NULL,
	prune_days mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	prune_viewed mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	prune_freq mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (forum_id),
	KEY left_right_id (left_id, right_id),
	KEY forum_lastpost_id (forum_last_post_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_forums_access'
CREATE TABLE phpbb_forums_access (
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	session_id char(32) DEFAULT '' NOT NULL,
	PRIMARY KEY (forum_id, user_id, session_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_forums_track'
CREATE TABLE phpbb_forums_track (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	mark_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id, forum_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_forums_watch'
CREATE TABLE phpbb_forums_watch (
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	notify_status tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	KEY forum_id (forum_id),
	KEY user_id (user_id),
	KEY notify_stat (notify_status)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_albums'
CREATE TABLE phpbb_gallery_albums (
	album_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	parent_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	left_id mediumint(8) UNSIGNED DEFAULT '1' NOT NULL,
	right_id mediumint(8) UNSIGNED DEFAULT '2' NOT NULL,
	album_parents mediumtext NOT NULL,
	album_type int(3) UNSIGNED DEFAULT '1' NOT NULL,
	album_status int(1) UNSIGNED DEFAULT '1' NOT NULL,
	album_contest mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_name varchar(255) DEFAULT '' NOT NULL,
	album_desc mediumtext NOT NULL,
	album_desc_options int(3) UNSIGNED DEFAULT '7' NOT NULL,
	album_desc_uid varchar(8) DEFAULT '' NOT NULL,
	album_desc_bitfield varchar(255) DEFAULT '' NOT NULL,
	album_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_images mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_images_real mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_last_image_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_image varchar(255) DEFAULT '' NOT NULL,
	album_last_image_time int(11) DEFAULT '0' NOT NULL,
	album_last_image_name varchar(255) DEFAULT '' NOT NULL,
	album_last_username varchar(255) DEFAULT '' NOT NULL,
	album_last_user_colour varchar(6) DEFAULT '' NOT NULL,
	album_last_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	display_in_rrc int(1) UNSIGNED DEFAULT '1' NOT NULL,
	display_on_index int(1) UNSIGNED DEFAULT '1' NOT NULL,
	display_subalbum_list int(1) UNSIGNED DEFAULT '1' NOT NULL,
	PRIMARY KEY (album_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;

# Table: 'phpbb_gallery_albums_track'
CREATE TABLE phpbb_gallery_albums_track (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	mark_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id, album_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_comments'
CREATE TABLE phpbb_gallery_comments (
	comment_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	comment_image_id mediumint(8) UNSIGNED NOT NULL,
	comment_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	comment_username varchar(255) DEFAULT '' NOT NULL,
	comment_user_colour varchar(6) DEFAULT '' NOT NULL,
	comment_user_ip varchar(40) DEFAULT '' NOT NULL,
	comment_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	comment mediumtext NOT NULL,
	comment_uid varchar(8) DEFAULT '' NOT NULL,
	comment_bitfield varchar(255) DEFAULT '' NOT NULL,
	comment_edit_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	comment_edit_count smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	comment_edit_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (comment_id),
	KEY comment_image_id (comment_image_id),
	KEY comment_user_id (comment_user_id),
	KEY comment_user_ip (comment_user_ip),
	KEY comment_time (comment_time)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_config'
CREATE TABLE phpbb_gallery_config (
	config_name varchar(255) DEFAULT '' NOT NULL,
	config_value varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (config_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;

# Table: 'phpbb_gallery_contests'
CREATE TABLE phpbb_gallery_contests (
	contest_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	contest_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	contest_start int(11) UNSIGNED DEFAULT '0' NOT NULL,
	contest_rating int(11) UNSIGNED DEFAULT '0' NOT NULL,
	contest_end int(11) UNSIGNED DEFAULT '0' NOT NULL,
	contest_marked tinyint(1) DEFAULT '0' NOT NULL,
	contest_first mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	contest_second mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	contest_third mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (contest_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;

# Table: 'phpbb_gallery_copyts_albums'
CREATE TABLE phpbb_gallery_copyts_albums (
	album_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	parent_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	left_id mediumint(8) UNSIGNED DEFAULT '1' NOT NULL,
	right_id mediumint(8) UNSIGNED DEFAULT '2' NOT NULL,
	album_name varchar(255) DEFAULT '' NOT NULL,
	album_desc mediumtext NOT NULL,
	album_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (album_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;

# Table: 'phpbb_gallery_copyts_users'
CREATE TABLE phpbb_gallery_copyts_users (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	personal_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;

# Table: 'phpbb_gallery_favorites'
CREATE TABLE phpbb_gallery_favorites (
	favorite_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (favorite_id),
	KEY user_id (user_id),
	KEY image_id (image_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_images'
CREATE TABLE phpbb_gallery_images (
	image_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	image_filename varchar(255) DEFAULT '' NOT NULL,
	image_thumbnail varchar(255) DEFAULT '' NOT NULL,
	image_name varchar(255) DEFAULT '' NOT NULL,
	image_name_clean varchar(255) DEFAULT '' NOT NULL,
	image_desc mediumtext NOT NULL,
	image_desc_uid varchar(8) DEFAULT '' NOT NULL,
	image_desc_bitfield varchar(255) DEFAULT '' NOT NULL,
	image_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_username varchar(255) DEFAULT '' NOT NULL,
	image_username_clean varchar(255) DEFAULT '' NOT NULL,
	image_user_colour varchar(6) DEFAULT '' NOT NULL,
	image_user_ip varchar(40) DEFAULT '' NOT NULL,
	image_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	image_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_view_count int(11) UNSIGNED DEFAULT '0' NOT NULL,
	image_status int(3) UNSIGNED DEFAULT '0' NOT NULL,
	image_contest int(1) UNSIGNED DEFAULT '0' NOT NULL,
	image_contest_end int(11) UNSIGNED DEFAULT '0' NOT NULL,
	image_contest_rank int(3) UNSIGNED DEFAULT '0' NOT NULL,
	image_filemissing int(3) UNSIGNED DEFAULT '0' NOT NULL,
	image_has_exif int(3) UNSIGNED DEFAULT '2' NOT NULL,
	image_exif_data text NOT NULL,
	image_rates mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_rate_points mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_rate_avg mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_comments mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_last_comment mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_favorited mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_reported mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	filesize_upload int(20) UNSIGNED DEFAULT '0' NOT NULL,
	filesize_medium int(20) UNSIGNED DEFAULT '0' NOT NULL,
	filesize_cache int(20) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (image_id),
	KEY image_album_id (image_album_id),
	KEY image_user_id (image_user_id),
	KEY image_time (image_time)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_modscache'
CREATE TABLE phpbb_gallery_modscache (
	album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	username varchar(255) DEFAULT '' NOT NULL,
	group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	group_name varchar(255) DEFAULT '' NOT NULL,
	display_on_index tinyint(1) DEFAULT '1' NOT NULL,
	KEY disp_idx (display_on_index),
	KEY album_id (album_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_permissions'
CREATE TABLE phpbb_gallery_permissions (
	perm_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	perm_role_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	perm_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	perm_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	perm_group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	perm_system int(3) DEFAULT '0' NOT NULL,
	PRIMARY KEY (perm_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_rates'
CREATE TABLE phpbb_gallery_rates (
	rate_image_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	rate_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rate_user_ip varchar(40) DEFAULT '' NOT NULL,
	rate_point int(3) UNSIGNED DEFAULT '0' NOT NULL,
	KEY rate_image_id (rate_image_id),
	KEY rate_user_id (rate_user_id),
	KEY rate_user_ip (rate_user_ip),
	KEY rate_point (rate_point)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_reports'
CREATE TABLE phpbb_gallery_reports (
	report_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	report_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	report_image_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	reporter_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	report_manager mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	report_note mediumtext NOT NULL,
	report_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	report_status int(3) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (report_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_roles'
CREATE TABLE phpbb_gallery_roles (
	role_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	a_list int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_view int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_watermark int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_upload int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_edit int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_delete int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_rate int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_approve int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_lock int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_report int(3) UNSIGNED DEFAULT '0' NOT NULL,
	i_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	i_unlimited int(3) UNSIGNED DEFAULT '0' NOT NULL,
	c_read int(3) UNSIGNED DEFAULT '0' NOT NULL,
	c_post int(3) UNSIGNED DEFAULT '0' NOT NULL,
	c_edit int(3) UNSIGNED DEFAULT '0' NOT NULL,
	c_delete int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_comments int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_delete int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_edit int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_move int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_report int(3) UNSIGNED DEFAULT '0' NOT NULL,
	m_status int(3) UNSIGNED DEFAULT '0' NOT NULL,
	album_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	album_unlimited int(3) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (role_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_users'
CREATE TABLE phpbb_gallery_users (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	watch_own int(3) UNSIGNED DEFAULT '0' NOT NULL,
	watch_favo int(3) UNSIGNED DEFAULT '0' NOT NULL,
	watch_com int(3) UNSIGNED DEFAULT '0' NOT NULL,
	user_images mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	personal_album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_lastmark int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_gallery_watch'
CREATE TABLE phpbb_gallery_watch (
	watch_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (watch_id),
	KEY user_id (user_id),
	KEY image_id (image_id),
	KEY album_id (album_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_groups'
CREATE TABLE phpbb_groups (
  	group_id mediumint(8) unsigned NOT NULL auto_increment,
      group_type tinyint(4) NOT NULL default '1',
  	group_founder_manage tinyint(1) unsigned NOT NULL default '0',
  	group_skip_auth tinyint(1) unsigned NOT NULL default '0',
  	group_name varchar(255) collate utf8_bin NOT NULL default '',
  	group_desc text collate utf8_bin NOT NULL,
  	group_desc_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	group_desc_options int(11) unsigned NOT NULL default '7',
  	group_desc_uid varchar(8) collate utf8_bin NOT NULL default '',
  	group_display tinyint(1) unsigned NOT NULL default '0',
  	group_avatar varchar(255) collate utf8_bin NOT NULL default '',
  	group_avatar_type tinyint(2) NOT NULL default '0',
  	group_avatar_width smallint(4) unsigned NOT NULL default '0',
  	group_avatar_height smallint(4) unsigned NOT NULL default '0',
  	group_rank mediumint(8) unsigned NOT NULL default '0',
  	group_colour varchar(6) collate utf8_bin NOT NULL default '',
  	group_sig_chars mediumint(8) unsigned NOT NULL default '0',
  	group_receive_pm tinyint(1) unsigned NOT NULL default '0',
  	group_message_limit mediumint(8) unsigned NOT NULL default '0',
  	group_max_recipients mediumint(8) unsigned NOT NULL default '0',
  	group_legend tinyint(1) unsigned NOT NULL default '1',
  	group_dl_auto_traffic bigint(20) NOT NULL default '0',
	PRIMARY KEY (group_id),
	KEY group_legend_name (group_legend, group_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_icons'
CREATE TABLE phpbb_icons (
	icons_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	icons_url varchar(255) DEFAULT '' NOT NULL,
	icons_width tinyint(4) DEFAULT '0' NOT NULL,
	icons_height tinyint(4) DEFAULT '0' NOT NULL,
	icons_order mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	display_on_posting tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	PRIMARY KEY (icons_id),
	KEY display_on_posting (display_on_posting)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_imod_config'
CREATE TABLE phpbb_imod_config (
  	id smallint(4) unsigned NOT NULL auto_increment,
  	imod_version varchar(8) collate utf8_bin NOT NULL default '3.0.0',
  	imod_enabled tinyint(1) unsigned NOT NULL default '1',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_imod_config_vars'
CREATE TABLE phpbb_imod_config_vars (
  	config_name varchar(255) collate utf8_bin NOT NULL default '',
  	config_value varchar(255) collate utf8_bin NOT NULL default '',
  	is_dynamic tinyint(1) unsigned NOT NULL default '0',
  	PRIMARY KEY  (config_name),
  	KEY is_dynamic (is_dynamic)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_article'
CREATE TABLE phpbb_kb_article (
  	article_id int(11) unsigned NOT NULL auto_increment,
  	cat_id int(8) unsigned NOT NULL default '0',
  	type_id int(8) unsigned NOT NULL default '0',
  	hits int(11) unsigned NOT NULL default '0',
  	titel varchar(255) collate utf8_bin NOT NULL,
  	description text collate utf8_bin NOT NULL,
  	article text collate utf8_bin NOT NULL,
  	user_id mediumint(8) unsigned NOT NULL default '0',
  	last_edit_user mediumint(8) unsigned NOT NULL default '0',
  	activ tinyint(1) unsigned NOT NULL default '0',
  	bbcode_uid varchar(8) collate utf8_bin NOT NULL,
  	bbcode_bitfield varchar(255) collate utf8_bin NOT NULL,
  	bbcode_options varchar(255) collate utf8_bin NOT NULL,
  	enable_magic_url tinyint(1) unsigned NOT NULL default '0',
  	enable_smilies tinyint(1) unsigned NOT NULL default '0',
  	enable_bbcode tinyint(1) unsigned NOT NULL default '0',
  	page_uri varchar(255) collate utf8_bin NOT NULL,
  	post_time varchar(14) collate utf8_bin NOT NULL,
  	last_change varchar(14) collate utf8_bin NOT NULL,
  	post_id mediumint(8) unsigned NOT NULL default '0',
  	has_attachment tinyint(1) unsigned NOT NULL default '0',
  	reported_id mediumint(8) unsigned NOT NULL default '0',
  	rating mediumint(8) unsigned NOT NULL default '0',
  	PRIMARY KEY  (article_id),
  	KEY activ (activ),
  	KEY titel (titel)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_article_diff'
CREATE TABLE phpbb_kb_article_diff (
  	diff_id mediumint(8) unsigned NOT NULL auto_increment,
  	article_id mediumint(8) unsigned NOT NULL,
  	article text collate utf8_bin NOT NULL,
  	bbcode_uid varchar(8) collate utf8_bin NOT NULL,
  	time varchar(14) collate utf8_bin NOT NULL,
  	edit_reason text collate utf8_bin NOT NULL,
  	user_id mediumint(8) unsigned NOT NULL,
 	PRIMARY KEY  (diff_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_article_track'
CREATE TABLE phpbb_kb_article_track (
  	user_id mediumint(8) unsigned NOT NULL,
  	article_id mediumint(8) unsigned NOT NULL,
  	cat_id mediumint(8) unsigned NOT NULL,
  	mark_time int(11) unsigned NOT NULL
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_categorie'
CREATE TABLE phpbb_kb_categorie (
  	cat_id mediumint(8) unsigned NOT NULL auto_increment,
  	right_id mediumint(8) unsigned NOT NULL,
  	left_id mediumint(8) unsigned NOT NULL,
  	parent_id mediumint(8) unsigned NOT NULL,
  	cat_mode tinyint(1) unsigned NOT NULL,
  	cat_parents text collate utf8_bin NOT NULL,
  	show_edits tinyint(1) unsigned NOT NULL,
  	post_forum mediumint(8) unsigned NOT NULL,
  	cat_title varchar(255) collate utf8_bin NOT NULL,
  	description text collate utf8_bin NOT NULL,
  	bbcode_uid varchar(8) collate utf8_bin NOT NULL default '',
  	bbcode_bitfield varchar(255) collate utf8_bin NOT NULL default '',
  	bbcode_options int(4) unsigned NOT NULL default '0',
  	image varchar(255) collate utf8_bin NOT NULL,
  	display_on_index tinyint(1) unsigned NOT NULL default '0',
  	cat_articles mediumint(8) unsigned NOT NULL default '0',
  	last_article_url varchar(255) collate utf8_bin NOT NULL,
  	last_article_time varchar(14) collate utf8_bin NOT NULL,
  	last_article_id mediumint(8) unsigned NOT NULL,
  	last_article_poster_name varchar(255) collate utf8_bin NOT NULL,
  	last_article_poster_id mediumint(8) unsigned NOT NULL,
  	last_article_poster_colour varchar(6) collate utf8_bin NOT NULL,
  	last_article_title varchar(255) collate utf8_bin NOT NULL,
  	ads text collate utf8_bin NOT NULL,
  	PRIMARY KEY  (cat_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_changelog'
CREATE TABLE phpbb_kb_changelog (
  	log_id mediumint(8) unsigned NOT NULL auto_increment,
  	article_id mediumint(8) unsigned NOT NULL,
  	time varchar(14) collate utf8_bin NOT NULL,
  	user_id mediumint(8) unsigned NOT NULL,
  	reason mediumtext collate utf8_bin NOT NULL,
  	PRIMARY KEY  (log_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_config'
CREATE TABLE phpbb_kb_config (
  	config_name varchar(100) collate utf8_bin NOT NULL,
  	config_value mediumtext collate utf8_bin NOT NULL,
  	config_type tinyint(1) unsigned NOT NULL
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_rating'
CREATE TABLE phpbb_kb_rating (
  	article_id mediumint(8) unsigned NOT NULL,
  	user_id mediumint(8) unsigned NOT NULL,
  	points mediumint(8) unsigned NOT NULL
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_reports'
CREATE TABLE phpbb_kb_reports (
  	report_id mediumint(8) unsigned NOT NULL auto_increment,
  	reason_id smallint(4) unsigned NOT NULL,
  	article_id mediumint(8) unsigned NOT NULL,
  	user_id mediumint(8) unsigned NOT NULL,
  	user_notify tinyint(1) unsigned NOT NULL,
  	report_closed tinyint(1) unsigned NOT NULL,
  	report_time int(11) unsigned NOT NULL,
  	report_text mediumtext collate utf8_bin NOT NULL,
  	PRIMARY KEY  (report_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_kb_types'
CREATE TABLE phpbb_kb_types (
  	type_id mediumint(8) unsigned NOT NULL auto_increment,
  	name varchar(255) collate utf8_bin NOT NULL,
  	PRIMARY KEY  (type_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_acronyms'
CREATE TABLE phpbb_k_acronyms (
  	acronym_id mediumint(8) unsigned NOT NULL auto_increment,
  	acronym varchar(80) collate utf8_bin NOT NULL default '',
  	meaning varchar(255) collate utf8_bin NOT NULL default '',
  	lang varchar(10) collate utf8_bin NOT NULL default 'en',
  	PRIMARY KEY  (acronym_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_blocks'
CREATE TABLE phpbb_k_blocks (
  	id mediumint(8) unsigned NOT NULL auto_increment,
  	ndx mediumint(8) unsigned NOT NULL default '0',
  	title varchar(50) collate utf8_bin NOT NULL default '',
  	position char(1) collate utf8_bin NOT NULL default 'L',
  	type char(1) collate utf8_bin NOT NULL default 'H',
  	active tinyint(1) unsigned NOT NULL default '1',
 	html_file_name varchar(255) collate utf8_bin NOT NULL default '',
 	var_file_name varchar(255) collate utf8_bin NOT NULL default '',
  	img_file_name varchar(255) collate utf8_bin NOT NULL default 'none.gif',
  	view_by mediumint(8) unsigned NOT NULL default '0',
  	groups mediumint(8) unsigned NOT NULL default '0',
  	scroll tinyint(1) unsigned NOT NULL default '0',
  	block_height smallint(4) unsigned NOT NULL default '0',
  	has_vars tinyint(1) unsigned NOT NULL default '0',
  	is_static tinyint(1) unsigned NOT NULL default '0',
  	minimod_based tinyint(1) unsigned NOT NULL default '0',
  	mod_block_id mediumint(8) unsigned NOT NULL default '0',
  	view_groups varchar(100) collate utf8_bin NOT NULL default '',
  	view_all tinyint(1) unsigned NOT NULL default '1',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_blocks_config'
CREATE TABLE phpbb_k_blocks_config (
  	id smallint(4) unsigned NOT NULL auto_increment,
  	blocks_width smallint(4) unsigned NOT NULL default '180',
  	blocks_enabled tinyint(1) unsigned NOT NULL default '1',
  	use_external_files tinyint(1) unsigned NOT NULL default '0',
  	update_files tinyint(1) unsigned NOT NULL default '0',
  	layout_default tinyint(1) unsigned NOT NULL default '2',
  	portal_version varchar(8) collate utf8_bin NOT NULL default '1.0.0',
  	portal_config varchar(10) collate utf8_bin NOT NULL default 'Site',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_blocks_config_vars'
CREATE TABLE phpbb_k_blocks_config_vars (
  	config_name varchar(255) collate utf8_bin NOT NULL default '',
  	config_value varchar(255) collate utf8_bin NOT NULL default '',
  	is_dynamic tinyint(1) unsigned NOT NULL default '0',
  	PRIMARY KEY  (config_name),
  	KEY is_dynamic (is_dynamic)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_cloud'
CREATE TABLE phpbb_k_cloud (
  	tag_id mediumint(8) unsigned NOT NULL auto_increment,
  	is_active tinyint(1) unsigned NOT NULL default '1',
  	tag smallint(4) unsigned NOT NULL default '1',
  	link varchar(255) collate utf8_bin NOT NULL default 'portal.php',
  	rel varchar(20) collate utf8_bin NOT NULL default 'extern',
  	font_size varchar(10) collate utf8_bin NOT NULL default '9',
  	colour varchar(10) collate utf8_bin NOT NULL default '000000',
  	colour2 varchar(10) collate utf8_bin NOT NULL default '333333',
  	hcolour varchar(10) collate utf8_bin NOT NULL default '00ff00',
  	text varchar(50) collate utf8_bin NOT NULL default 'empty',
  	PRIMARY KEY  (tag_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_menus'
CREATE TABLE phpbb_k_menus (
  	m_id mediumint(8) unsigned NOT NULL auto_increment,
  	ndx mediumint(8) unsigned NOT NULL default '0',
  	menu_type smallint(4) unsigned NOT NULL default '0',
  	name varchar(50) collate utf8_bin NOT NULL default '',
  	link_to varchar(255) collate utf8_bin NOT NULL default '',
  	menu_icon varchar(30) collate utf8_bin NOT NULL default 'none.gif',
  	append_sid tinyint(1) unsigned NOT NULL default '1',
  	append_uid tinyint(1) unsigned NOT NULL default '0',
  	view_by mediumint(8) unsigned NOT NULL default '0',
  	soft_hr tinyint(1) unsigned NOT NULL default '0',
  	sub_heading tinyint(1) unsigned NOT NULL default '0',
  	PRIMARY KEY  (m_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_modules'
CREATE TABLE phpbb_k_modules (
  	mod_id mediumint(8) unsigned NOT NULL auto_increment,
  	mod_link_id mediumint(8) unsigned NOT NULL default '0',
  	mod_type varchar(50) collate utf8_bin NOT NULL default '',
  	mod_origin tinyint(1) unsigned NOT NULL default '0',
  	mod_name varchar(255) collate utf8_bin NOT NULL default '',
  	mod_author varchar(100) collate utf8_bin NOT NULL default '',
  	mod_link varchar(255) collate utf8_bin NOT NULL,
  	mod_author_co varchar(255) collate utf8_bin NOT NULL,
  	mod_support_link varchar(255) collate utf8_bin NOT NULL,
  	mod_copyright varchar(100) collate utf8_bin NOT NULL,
  	mod_thumb varchar(255) collate utf8_bin NOT NULL,
  	mod_last_update varchar(15) collate utf8_bin NOT NULL,
  	mod_details mediumtext collate utf8_bin NOT NULL,
  	mod_download_count int(8) unsigned NOT NULL default '0',
  	mod_status smallint(4) unsigned NOT NULL default '0',
  	mod_version varchar(10) collate utf8_bin NOT NULL,
  	PRIMARY KEY  (mod_id),
  	KEY mod_name (mod_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_newsfeeds'
CREATE TABLE phpbb_k_newsfeeds (
  	feed_id mediumint(8) unsigned NOT NULL auto_increment,
  	feed_title varchar(255) collate utf8_bin NOT NULL default '',
  	feed_show tinyint(1) unsigned NOT NULL default '1',
  	feed_url varchar(255) collate utf8_bin NOT NULL default '',
  	feed_position int(1) unsigned NOT NULL default '1',
  	feed_description int(1) unsigned NOT NULL default '1',
  	PRIMARY KEY  (feed_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_quotes'
CREATE TABLE phpbb_k_quotes (
  	quote_id mediumint(8) unsigned NOT NULL auto_increment,
  	quote text collate utf8_bin NOT NULL,
  	author varchar(100) collate utf8_bin NOT NULL default 'unknown',
  	PRIMARY KEY  (quote_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_referrals'
CREATE TABLE phpbb_k_referrals (
  	id mediumint(8) unsigned NOT NULL auto_increment,
  	host varchar(255) collate utf8_bin NOT NULL default '',
  	hits mediumint(8) unsigned NOT NULL default '0',
  	firstvisit int(11) unsigned NOT NULL,
  	lastvisit int(11) unsigned NOT NULL,
  	enabled tinyint(1) unsigned NOT NULL default '1',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_web_pages'
CREATE TABLE phpbb_k_web_pages (
  	id mediumint(8) unsigned NOT NULL auto_increment,
  	active tinyint(1) unsigned NOT NULL default '1',
  	page_name varchar(100) collate utf8_bin NOT NULL default '',
  	page_type char(1) collate utf8_bin NOT NULL default 'B',
  	last_updated varchar(15) collate utf8_bin NOT NULL,
  	body mediumtext collate utf8_bin NOT NULL,
  	head mediumint(8) unsigned NOT NULL default '0',
  	foot mediumint(8) unsigned NOT NULL default '0',
  	external_file varchar(255) collate utf8_bin NOT NULL default '',
  	PRIMARY KEY  (id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_k_youtube'
CREATE TABLE phpbb_k_youtube (
  	video_id mediumint(8) unsigned NOT NULL auto_increment,
  	video_category varchar(100) collate utf8_bin NOT NULL default '',
  	video_who varchar(100) collate utf8_bin NOT NULL default '',
  	video_link varchar(255) collate utf8_bin NOT NULL default '12',
  	video_title varchar(100) collate utf8_bin NOT NULL default '0',
  	video_rating smallint(4) unsigned NOT NULL default '4',
  	PRIMARY KEY  (video_id),
  	KEY video_category (video_category)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_lang'
CREATE TABLE phpbb_lang (
	lang_id tinyint(4) NOT NULL auto_increment,
	lang_iso varchar(30) DEFAULT '' NOT NULL,
	lang_dir varchar(30) DEFAULT '' NOT NULL,
	lang_english_name varchar(100) DEFAULT '' NOT NULL,
	lang_local_name varchar(255) DEFAULT '' NOT NULL,
	lang_author varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (lang_id),
	KEY lang_iso (lang_iso)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_log'
CREATE TABLE phpbb_log (
	log_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	log_type tinyint(4) DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	reportee_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	log_ip varchar(40) DEFAULT '' NOT NULL,
	log_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	log_operation text NOT NULL,
	log_data mediumtext NOT NULL,
	album_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	image_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (log_id),
	KEY log_type (log_type),
	KEY forum_id (forum_id),
	KEY topic_id (topic_id),
	KEY reportee_id (reportee_id),
	KEY user_id (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_moderator_cache'
CREATE TABLE phpbb_moderator_cache (
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	username varchar(255) DEFAULT '' NOT NULL,
	group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	group_name varchar(255) DEFAULT '' NOT NULL,
	display_on_index tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	KEY disp_idx (display_on_index),
	KEY forum_id (forum_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_mods'
CREATE TABLE phpbb_mods (
  	mod_id mediumint(8) unsigned NOT NULL auto_increment,
  	mod_active tinyint(1) unsigned NOT NULL default '0',
  	mod_time int(11) unsigned NOT NULL default '0',
  	mod_dependencies mediumtext collate utf8_bin NOT NULL,
  	mod_name varchar(100) collate utf8_bin NOT NULL default '',
  	mod_description text collate utf8_bin NOT NULL,
  	mod_version varchar(25) collate utf8_bin NOT NULL default '',
  	mod_author_notes text collate utf8_bin NOT NULL,
  	mod_author_name varchar(100) collate utf8_bin NOT NULL default '',
  	mod_author_email varchar(100) collate utf8_bin NOT NULL default '',
  	mod_author_url varchar(100) collate utf8_bin NOT NULL default '',
  	mod_actions mediumtext collate utf8_bin NOT NULL,
  	mod_languages varchar(255) collate utf8_bin NOT NULL default '',
  	mod_template varchar(255) collate utf8_bin NOT NULL default '',
  	mod_path varchar(255) collate utf8_bin NOT NULL default '',
  	PRIMARY KEY  (mod_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_modules'
CREATE TABLE phpbb_modules (
	module_id mediumint(8) unsigned NOT NULL auto_increment,
	module_enabled tinyint(1) unsigned default '1' NOT NULL,
	module_display tinyint(1) unsigned default '1' NOT NULL,
	module_basename varchar(255) default '' NOT NULL,
	module_class varchar(10) default '' NOT NULL,
	parent_id mediumint(8) unsigned default '0' NOT NULL,
	left_id mediumint(8) unsigned default '0' NOT NULL,
	right_id mediumint(8) unsigned default '0' NOT NULL,
	module_langname varchar(255) default '' NOT NULL,
	module_mode varchar(255) default '' NOT NULL,
	module_auth varchar(255) default '' NOT NULL,
	PRIMARY KEY (module_id),
	KEY left_right_id (left_id, right_id),
	KEY module_enabled (module_enabled),
	KEY class_left_id (module_class, left_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_poll_options'
CREATE TABLE phpbb_poll_options (
	poll_option_id tinyint(4) DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	poll_option_text text NOT NULL,
	poll_option_total mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	KEY poll_opt_id (poll_option_id),
	KEY topic_id (topic_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_poll_votes'
CREATE TABLE phpbb_poll_votes (
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	poll_option_id tinyint(4) DEFAULT '0' NOT NULL,
	vote_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	vote_user_ip varchar(40) DEFAULT '' NOT NULL,
	KEY topic_id (topic_id),
	KEY vote_user_id (vote_user_id),
	KEY vote_user_ip (vote_user_ip)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_posts'
CREATE TABLE phpbb_posts (
	post_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	icon_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	poster_ip varchar(40) DEFAULT '' NOT NULL,
	post_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	post_approved tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	post_reported tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	enable_bbcode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_smilies tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_magic_url tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_sig tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	post_username varchar(255) DEFAULT '' NOT NULL,
	post_subject varchar(255) DEFAULT '' NOT NULL COLLATE utf8_unicode_ci,
	post_text mediumtext NOT NULL,
	post_checksum varchar(32) DEFAULT '' NOT NULL,
	post_attachment tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	bbcode_bitfield varchar(255) DEFAULT '' NOT NULL,
	bbcode_uid varchar(8) DEFAULT '' NOT NULL,
	post_postcount tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	post_edit_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	post_edit_reason varchar(255) DEFAULT '' NOT NULL,
	post_edit_user mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	post_edit_count smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	post_edit_locked tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (post_id),
	KEY forum_id (forum_id),
	KEY topic_id (topic_id),
	KEY poster_ip (poster_ip),
	KEY poster_id (poster_id),
	KEY post_approved (post_approved),
	KEY post_username (post_username),
	KEY tid_post_time (topic_id, post_time)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_privmsgs'
CREATE TABLE phpbb_privmsgs (
	msg_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	root_level mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	author_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	icon_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	author_ip varchar(40) DEFAULT '' NOT NULL,
	message_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	enable_bbcode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_smilies tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_magic_url tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	enable_sig tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	message_subject varchar(255) DEFAULT '' NOT NULL,
	message_text mediumtext NOT NULL,
	message_edit_reason varchar(255) DEFAULT '' NOT NULL,
	message_edit_user mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	message_attachment tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	bbcode_bitfield varchar(255) DEFAULT '' NOT NULL,
	bbcode_uid varchar(8) DEFAULT '' NOT NULL,
	message_edit_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	message_edit_count smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	to_address text NOT NULL,
	bcc_address text NOT NULL,
	message_reported tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (msg_id),
	KEY author_ip (author_ip),
	KEY message_time (message_time),
	KEY author_id (author_id),
	KEY root_level (root_level)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_privmsgs_folder'
CREATE TABLE phpbb_privmsgs_folder (
	folder_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	folder_name varchar(255) DEFAULT '' NOT NULL,
	pm_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (folder_id),
	KEY user_id (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_privmsgs_rules'
CREATE TABLE phpbb_privmsgs_rules (
	rule_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_check mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_connection mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_string varchar(255) DEFAULT '' NOT NULL,
	rule_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_action mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rule_folder_id int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (rule_id),
	KEY user_id (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_privmsgs_to'
CREATE TABLE phpbb_privmsgs_to (
	msg_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	author_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	pm_deleted tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	pm_new tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	pm_unread tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	pm_replied tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	pm_marked tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	pm_forwarded tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	folder_id int(11) DEFAULT '0' NOT NULL,
	KEY msg_id (msg_id),
	KEY author_id (author_id),
	KEY usr_flder_id (user_id, folder_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_profile_fields'
CREATE TABLE phpbb_profile_fields (
	field_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	field_name varchar(255) DEFAULT '' NOT NULL,
	field_type tinyint(4) DEFAULT '0' NOT NULL,
	field_ident varchar(20) DEFAULT '' NOT NULL,
	field_length varchar(20) DEFAULT '' NOT NULL,
	field_minlen varchar(255) DEFAULT '' NOT NULL,
	field_maxlen varchar(255) DEFAULT '' NOT NULL,
	field_novalue varchar(255) DEFAULT '' NOT NULL,
	field_default_value varchar(255) DEFAULT '' NOT NULL,
	field_validation varchar(20) DEFAULT '' NOT NULL,
	field_required tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_show_on_reg tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_show_on_vt tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_show_profile tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_hide tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_no_view tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_active tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	field_order mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (field_id),
	KEY fld_type (field_type),
	KEY fld_ordr (field_order)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_profile_fields_data'
CREATE TABLE phpbb_profile_fields_data (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_profile_fields_lang'
CREATE TABLE phpbb_profile_fields_lang (
	field_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	lang_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	option_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	field_type tinyint(4) DEFAULT '0' NOT NULL,
	lang_value varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (field_id, lang_id, option_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_profile_lang'
CREATE TABLE phpbb_profile_lang (
	field_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	lang_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	lang_name varchar(255) DEFAULT '' NOT NULL,
	lang_explain text NOT NULL,
	lang_default_value varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (field_id, lang_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_ranks'
CREATE TABLE phpbb_ranks (
	rank_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	rank_title varchar(255) DEFAULT '' NOT NULL,
	rank_min mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	rank_special tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	rank_image varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (rank_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_reports'
CREATE TABLE phpbb_reports (
	report_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	reason_id smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	pm_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_notify tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	report_closed tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	report_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	report_text mediumtext NOT NULL,
	PRIMARY KEY (report_id),
	KEY post_id (post_id),
	KEY pm_id (pm_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_reports_reasons'
CREATE TABLE phpbb_reports_reasons (
	reason_id smallint(4) UNSIGNED NOT NULL auto_increment,
	reason_title varchar(255) DEFAULT '' NOT NULL,
	reason_description mediumtext NOT NULL,
	reason_order smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (reason_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_search_results'
CREATE TABLE phpbb_search_results (
	search_key varchar(32) DEFAULT '' NOT NULL,
	search_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	search_keywords mediumtext NOT NULL,
	search_authors mediumtext NOT NULL,
	PRIMARY KEY (search_key)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_search_wordlist'
CREATE TABLE phpbb_search_wordlist (
	word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	word_text varchar(255) DEFAULT '' NOT NULL,
	word_common tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	word_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (word_id),
	UNIQUE wrd_txt (word_text),
	KEY wrd_cnt (word_count)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_search_wordmatch'
CREATE TABLE phpbb_search_wordmatch (
	post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	word_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	title_match tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	UNIQUE unq_mtch (word_id, post_id, title_match),
	KEY word_id (word_id),
	KEY post_id (post_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_sessions'
CREATE TABLE phpbb_sessions (
	session_id char(32) DEFAULT '' NOT NULL,
	session_user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	session_forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	session_last_visit int(11) UNSIGNED DEFAULT '0' NOT NULL,
	session_start int(11) UNSIGNED DEFAULT '0' NOT NULL,
	session_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	session_ip varchar(40) DEFAULT '' NOT NULL,
	session_browser varchar(150) DEFAULT '' NOT NULL,
	session_forwarded_for varchar(255) DEFAULT '' NOT NULL,
	session_page varchar(255) DEFAULT '' NOT NULL,
	session_viewonline tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	session_autologin tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	session_admin tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
 	session_album_id mediumint(8) unsigned NOT NULL default '0',
	PRIMARY KEY (session_id),
	KEY session_time (session_time),
	KEY session_user_id (session_user_id),
	KEY session_fid (session_forum_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_sessions_keys'
CREATE TABLE phpbb_sessions_keys (
	key_id char(32) DEFAULT '' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	last_ip varchar(40) DEFAULT '' NOT NULL,
	last_login int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (key_id, user_id),
	KEY last_login (last_login)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_shoutbox'
CREATE TABLE phpbb_shoutbox (
  shout_id int(11) unsigned NOT NULL auto_increment,
  shout_user_id mediumint(8) NOT NULL default '0',
  shout_time int(11) NOT NULL default '0',
  shout_ip varchar(32) character set utf8 NOT NULL default '',
  shout_text text collate utf8_bin NOT NULL,
  shout_bbcode_bitfield varchar(255) character set utf8 NOT NULL default '',
  shout_bbcode_uid varchar(8) character set utf8 NOT NULL default '',
  shout_bbcode_flags int(11) unsigned NOT NULL default '7',
  PRIMARY KEY  (shout_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_sitelist'
CREATE TABLE phpbb_sitelist (
	site_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	site_ip varchar(40) DEFAULT '' NOT NULL,
	site_hostname varchar(255) DEFAULT '' NOT NULL,
	ip_exclude tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (site_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_smilies'
CREATE TABLE phpbb_smilies (
	smiley_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	code varchar(50) DEFAULT '' NOT NULL,
	emotion varchar(50) DEFAULT '' NOT NULL,
	smiley_url varchar(50) DEFAULT '' NOT NULL,
	smiley_width smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	smiley_height smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	smiley_order mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	display_on_posting tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	PRIMARY KEY (smiley_id),
	KEY display_on_post (display_on_posting)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles'
CREATE TABLE phpbb_styles (
	style_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	style_name varchar(255) DEFAULT '' NOT NULL,
	style_copyright varchar(255) DEFAULT '' NOT NULL,
	style_active tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	template_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	theme_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	imageset_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (style_id),
	UNIQUE style_name (style_name),
	KEY template_id (template_id),
	KEY theme_id (theme_id),
	KEY imageset_id (imageset_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles_template'
CREATE TABLE phpbb_styles_template (
	template_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	template_name varchar(255) DEFAULT '' NOT NULL,
	template_copyright varchar(255) DEFAULT '' NOT NULL,
	template_path varchar(100) DEFAULT '' NOT NULL,
	bbcode_bitfield varchar(255) DEFAULT 'kNg=' NOT NULL,
	template_storedb tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	template_inherits_id int(4) UNSIGNED DEFAULT '0' NOT NULL,
	template_inherit_path varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (template_id),
	UNIQUE tmplte_nm (template_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles_template_data'
CREATE TABLE phpbb_styles_template_data (
	template_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	template_filename varchar(100) DEFAULT '' NOT NULL,
	template_included text NOT NULL,
	template_mtime int(11) UNSIGNED DEFAULT '0' NOT NULL,
	template_data mediumtext NOT NULL,
	KEY tid (template_id),
	KEY tfn (template_filename)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles_theme'
CREATE TABLE phpbb_styles_theme (
	theme_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	theme_name varchar(255) DEFAULT '' NOT NULL,
	theme_copyright varchar(255) DEFAULT '' NOT NULL,
	theme_path varchar(100) DEFAULT '' NOT NULL,
	theme_storedb tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	theme_mtime int(11) UNSIGNED DEFAULT '0' NOT NULL,
	theme_data mediumtext NOT NULL,
	PRIMARY KEY (theme_id),
	UNIQUE theme_name (theme_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles_imageset'
CREATE TABLE phpbb_styles_imageset (
	imageset_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	imageset_name varchar(255) DEFAULT '' NOT NULL,
	imageset_copyright varchar(255) DEFAULT '' NOT NULL,
	imageset_path varchar(100) DEFAULT '' NOT NULL,
	PRIMARY KEY (imageset_id),
	UNIQUE imgset_nm (imageset_name)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_styles_imageset_data'
CREATE TABLE phpbb_styles_imageset_data (
	image_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	image_name varchar(200) DEFAULT '' NOT NULL,
	image_filename varchar(200) DEFAULT '' NOT NULL,
	image_lang varchar(30) DEFAULT '' NOT NULL,
	image_height smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	image_width smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	imageset_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (image_id),
	KEY i_d (imageset_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_topics'
CREATE TABLE phpbb_topics (
	topic_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	icon_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_attachment tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	topic_approved tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	topic_reported tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	topic_title varchar(255) DEFAULT '' NOT NULL COLLATE utf8_unicode_ci,
	topic_poster mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	topic_time_limit int(11) UNSIGNED DEFAULT '0' NOT NULL,
	topic_views mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_replies mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_replies_real mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_status tinyint(3) DEFAULT '0' NOT NULL,
	topic_type tinyint(3) DEFAULT '0' NOT NULL,
	topic_first_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_first_poster_name varchar(255) DEFAULT '' NOT NULL,
	topic_first_poster_colour varchar(6) DEFAULT '' NOT NULL,
	topic_last_post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_last_poster_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_last_poster_name varchar(255) DEFAULT '' NOT NULL,
	topic_last_poster_colour varchar(6) DEFAULT '' NOT NULL,
	topic_last_post_subject varchar(255) DEFAULT '' NOT NULL,
	topic_last_post_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	topic_last_view_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	topic_moved_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_bumped tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	topic_bumper mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	poll_title varchar(255) DEFAULT '' NOT NULL,
	poll_start int(11) UNSIGNED DEFAULT '0' NOT NULL,
	poll_length int(11) UNSIGNED DEFAULT '0' NOT NULL,
	poll_max_options tinyint(4) DEFAULT '1' NOT NULL,
	poll_last_vote int(11) UNSIGNED DEFAULT '0' NOT NULL,
	poll_vote_change tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (topic_id),
	KEY forum_id (forum_id),
	KEY forum_id_type (forum_id, topic_type),
	KEY last_post_time (topic_last_post_time),
	KEY topic_approved (topic_approved),
	KEY forum_appr_last (forum_id, topic_approved, topic_last_post_id),
	KEY fid_time_moved (forum_id, topic_last_post_time, topic_moved_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_topics_track'
CREATE TABLE phpbb_topics_track (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	forum_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	mark_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id, topic_id),
	KEY forum_id (forum_id),
  	KEY topic_id (topic_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_topics_posted'
CREATE TABLE phpbb_topics_posted (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	topic_posted tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id, topic_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_topics_watch'
CREATE TABLE phpbb_topics_watch (
	topic_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	notify_status tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	KEY topic_id (topic_id),
	KEY user_id (user_id),
	KEY notify_stat (notify_status)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_user_group'
CREATE TABLE phpbb_user_group (
	group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	group_leader tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	user_pending tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	KEY group_id (group_id),
	KEY user_id (user_id),
	KEY group_leader (group_leader)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_users'
CREATE TABLE phpbb_users (
	user_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_type tinyint(2) DEFAULT '0' NOT NULL,
	group_id mediumint(8) UNSIGNED DEFAULT '3' NOT NULL,
	user_permissions mediumtext NOT NULL,
	user_perm_from mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_ip varchar(40) DEFAULT '' NOT NULL,
	user_regdate int(11) UNSIGNED DEFAULT '0' NOT NULL,
	username varchar(255) DEFAULT '' NOT NULL,
	username_clean varchar(255) DEFAULT '' NOT NULL,
	user_password varchar(40) DEFAULT '' NOT NULL,
	user_passchg int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_pass_convert tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	user_email varchar(100) DEFAULT '' NOT NULL,
	user_email_hash bigint(20) DEFAULT '0' NOT NULL,
	user_birthday varchar(10) DEFAULT '' NOT NULL,
	user_lastvisit int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_lastrefresh INT( 11 ) UNSIGNED DEFAULT '0' NOT NULL,
	user_lastmark int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_lastpost_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_lastpage varchar(200) DEFAULT '' NOT NULL,
	user_last_confirm_key varchar(10) DEFAULT '' NOT NULL,
	user_last_search int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_warnings tinyint(4) DEFAULT '0' NOT NULL,
	user_last_warning int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_login_attempts tinyint(4) DEFAULT '0' NOT NULL,
	user_inactive_reason tinyint(2) DEFAULT '0' NOT NULL,
	user_inactive_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_posts mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_lang varchar(30) DEFAULT '' NOT NULL,
	user_timezone decimal(5,2) DEFAULT '0' NOT NULL,
	user_dst tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	user_dateformat varchar(30) DEFAULT 'd M Y H:i' NOT NULL,
	user_style mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_rank mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	user_colour varchar(6) DEFAULT '' NOT NULL,
	user_new_privmsg int(4) DEFAULT '0' NOT NULL,
	user_unread_privmsg int(4) DEFAULT '0' NOT NULL,
	user_last_privmsg int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_message_rules tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	user_full_folder int(11) DEFAULT '-3' NOT NULL,
	user_emailtime int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_topic_show_days smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	user_topic_sortby_type varchar(1) DEFAULT 't' NOT NULL,
	user_topic_sortby_dir varchar(1) DEFAULT 'd' NOT NULL,
	user_post_show_days smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	user_post_sortby_type varchar(1) DEFAULT 't' NOT NULL,
	user_post_sortby_dir varchar(1) DEFAULT 'a' NOT NULL,
	user_notify tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	user_notify_pm tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_notify_type tinyint(4) DEFAULT '0' NOT NULL,
	user_allow_pm tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_allow_viewonline tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_allow_viewemail tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_allow_massemail tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_options int(11) UNSIGNED DEFAULT '230271' NOT NULL,
	user_avatar varchar(255) DEFAULT '' NOT NULL,
	user_avatar_type tinyint(2) DEFAULT '0' NOT NULL,
	user_avatar_width smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	user_avatar_height smallint(4) UNSIGNED DEFAULT '0' NOT NULL,
	user_sig mediumtext NOT NULL,
	user_sig_bbcode_uid varchar(8) DEFAULT '' NOT NULL,
	user_sig_bbcode_bitfield varchar(255) DEFAULT '' NOT NULL,
	user_from varchar(100) DEFAULT '' NOT NULL,
	user_icq varchar(15) DEFAULT '' NOT NULL,
	user_aim varchar(255) DEFAULT '' NOT NULL,
	user_yim varchar(255) DEFAULT '' NOT NULL,
	user_msnm varchar(255) DEFAULT '' NOT NULL,
	user_jabber varchar(255) DEFAULT '' NOT NULL,
	user_website varchar(200) DEFAULT '' NOT NULL,
	user_occ text NOT NULL,
	user_interests text NOT NULL,
	user_actkey varchar(32) DEFAULT '' NOT NULL,
	user_newpasswd varchar(40) DEFAULT '' NOT NULL,
	user_form_salt varchar(32) DEFAULT '' NOT NULL,
	user_new tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
	user_reminded tinyint(4) DEFAULT '0' NOT NULL,
	user_reminded_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	user_country_flag varchar(7) DEFAULT 'us.gif' NOT NULL,
    user_allow_new_download_email bigint(20) DEFAULT '0' NOT NULL,
    user_allow_fav_download_email bigint(20) DEFAULT '1' NOT NULL,
    user_allow_new_download_popup bigint(20) DEFAULT '1' NOT NULL,
    user_allow_fav_download_popup tinyint(1) unsigned DEFAULT '1' NOT NULL,
    user_dl_update_time int(11) unsigned DEFAULT '0' NOT NULL,
    user_new_download tinyint(1) unsigned DEFAULT '0' NOT NULL,
    user_traffic bigint(20) DEFAULT '0' NOT NULL,
    user_dl_note_type tinyint(1) unsigned DEFAULT '1' NOT NULL,
    user_dl_sort_fix tinyint(1) unsigned DEFAULT '0' NOT NULL,
    user_dl_sort_opt tinyint(1) unsigned DEFAULT '0' NOT NULL,
    user_dl_sort_dir tinyint(1) unsigned DEFAULT '0' NOT NULL,
    user_dl_sub_on_index tinyint(1) unsigned DEFAULT '1' NOT NULL,
    album_id mediumint(8) unsigned DEFAULT '0' NOT NULL,
    image_id mediumint(8) unsigned DEFAULT '0' NOT NULL,
	user_im3_config int(10) unsigned default '1743781891',
	PRIMARY KEY (user_id),
	KEY user_birthday (user_birthday),
	KEY user_email_hash (user_email_hash),
	KEY user_type (user_type),
	UNIQUE username_clean (username_clean)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_warnings'
CREATE TABLE phpbb_warnings (
	warning_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	log_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	warning_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (warning_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_words'
CREATE TABLE phpbb_words (
	word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	word varchar(255) DEFAULT '' NOT NULL,
	replacement varchar(255) DEFAULT '' NOT NULL,
	PRIMARY KEY (word_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


# Table: 'phpbb_zebra'
CREATE TABLE phpbb_zebra (
	user_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	zebra_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
	friend tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	foe tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
	PRIMARY KEY (user_id, zebra_id)
) CHARACTER SET `utf8` COLLATE `utf8_bin`;


