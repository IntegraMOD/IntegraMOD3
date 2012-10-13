#
# $Id: schema_data.sql 10187 2009-09-25 09:41:49Z acydburn $
#

# POSTGRES BEGIN #

# -- Config
INSERT INTO phpbb_config (config_name, config_value) VALUES ('active_sessions', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_attachments', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_autologin', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_local', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_remote', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_upload', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_remote_upload', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_bbcode', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_birthdays', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_bookmarks', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_emailreuse', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_forum_notify', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_mass_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_name_chars', 'USERNAME_CHARS_ANY');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_namechange', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_nocensors', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_pm_attach', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_pm_report', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_post_flash', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_post_links', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_privmsg', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_quick_reply', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_bbcode', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_flash', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_img', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_links', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig_smilies', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_smilies', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_topic_notify', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('attachment_quota', '52428800');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('auth_bbcode_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('auth_flash_pm', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('auth_img_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('auth_method', 'db');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('auth_smilies_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_filesize', '6144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_gallery_path', 'images/avatars/gallery');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_height', '90');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_width', '90');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_min_height', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_min_width', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_path', 'images/avatars/upload');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_salt', 'phpbb_avatar');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_contact', 'contact@yourdomain.tld');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_disable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_disable_msg', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_dst', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email', 'address@yourdomain.tld');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_form', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_sig', '{L_CONFIG_BOARD_EMAIL_SIG}');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_hide_emails', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_timezone', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('browser_check', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bump_interval', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bump_type', 'd');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cache_gc', '7200');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_override_user', 0);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_allow_priv_events', 1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_show_week_nums', 1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_monday_first', 0);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_show_events_list', 1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_show_birthdays_list', 1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_show_birthdays_main', 1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_max_events_list_days', 31);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_default_events_list_days', 31);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_max_bdays_list_days', 31);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_default_bdays_list_days', 31);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('calendar_version', '1.0.0b3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_plugin', 'phpbb_captcha_nogd');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_foreground_noise', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_x_grid', '25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_y_grid', '25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_wave', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_3d_noise', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('captcha_gd_fonts', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('confirm_refresh', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('check_attachment_content', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('check_dnsbl', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('chg_passforce', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_domain', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_name', 'phpbb3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_path', '/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_secure', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_enable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_fax', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_mail', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('database_gc', '604800');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('dbms_version', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_dateformat', 'D M d, Y g:i a');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_style', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('display_last_edited', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('display_order', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('edit_time', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('delete_time', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('email_check_mx', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('email_enable', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('email_function_name', 'mail');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('email_package_size', '50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_confirm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_pm_icons', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_post_confirm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_enable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_limit', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_overall_forums', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_overall_forums_limit', '15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_overall_topics', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_overall_topics_limit', '15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_forum', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_topic', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('feed_item_statistics', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flood_interval', '15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('force_server_vars', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('form_token_lifetime', '7200');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('form_token_mintime', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('form_token_sid_guests', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('forward_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('forwarded_for_check', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('full_folder_action', '2');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_mysql_max_word_len', '254');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_mysql_min_word_len', '4');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_native_common_thres', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_native_load_upd', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_native_max_chars', '14');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('fulltext_native_min_chars', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('gzip_compress', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('hot_threshold', '25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('icons_path', 'images/icons');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_create_thumbnail', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_display_inlined', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_imagick', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_link_height', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_link_width', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_max_height', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_max_thumb_width', '400');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_max_width', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('img_min_thumb_filesize', '12000');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ip_check', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_enable', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_host', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_password', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_package_size', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_port', '5222');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_use_ssl', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('jab_username', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_base_dn', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_email', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_password', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_port', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_server', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_uid', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_user', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ldap_user_filter', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('limit_load', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('limit_search_load', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_anon_lastread', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_birthdays', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_cpf_memberlist', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_cpf_viewprofile', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_cpf_viewtopic', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_db_lastread', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_db_track', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_jumpbox', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_moderators', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_online', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_online_guests', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_online_time', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_onlinetrack', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_search', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_tplcompile', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('load_user_activity', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_attachments', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_attachments_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_autologin_time', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_filesize', '262144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_filesize_pm', '262144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_login_attempts', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_name_chars', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_num_search_keywords', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_pass_chars', '100');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_poll_options', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_chars', '60000');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_font_size', '200');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_img_height', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_img_width', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_smilies', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_post_urls', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_quote_depth', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_reg_attempts', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_chars', '255');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_font_size', '200');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_img_height', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_img_width', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_smilies', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_urls', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('min_name_chars', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('min_pass_chars', '6');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('min_post_chars', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('min_search_author_chars', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('mime_triggers', 'body|head|html|img|plaintext|a href|pre|script|table|title');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('new_member_post_limit', '3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('new_member_group_default', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('override_user_style', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('pass_complex', 'PASS_TYPE_ANY');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('pm_edit_time', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('pm_max_boxes', '4');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('pm_max_msgs', '50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('pm_max_recipients', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('posts_per_page', '10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('print_pm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('queue_interval', '600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('ranks_path', 'images/ranks');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('require_activation', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('referer_validation', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('script_path', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_block_size', '250');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_gc', '7200');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_interval', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_anonymous_interval', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_type', 'fulltext_native');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_store_results', '1800');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('secure_allow_deny', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('secure_allow_empty_referer', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('secure_downloads', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_name', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_port', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_protocol', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('session_gc', '3600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('session_length', '3600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('site_desc', '{L_CONFIG_SITE_DESC}');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sitename', '{L_CONFIG_SITENAME}');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smilies_path', 'images/smilies');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smilies_per_page', '50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_auth_method', 'PLAIN');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_delivery', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_host', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_password', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_port', '25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_username', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('topics_per_page', '25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('tpl_allow_php', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('upload_icons_path', 'images/upload_icons');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('upload_path', 'files');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version', '3.0.7-PL1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('warnings_expire_days', '90');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('warnings_gc', '14400');

INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_dig', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_del', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_slashdot', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_rds', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_spurl', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_linkagogo', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_reddit', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_tech', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_google', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_prop', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_netv', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('allow_stumble', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('am_file_perms', '0644', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('am_dir_perms', '0755', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_interval', ' 	3600', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_prune', '336', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_max_posts', '0', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_flood_interval', '15', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_version', '1.1.1', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_ie_nr', '5', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_non_ie_nr', '20', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_on_index', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('as_override_user', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('automod_version', '1.0.0-RC2', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('cache_last_gc', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('calendar_allow_index_minical', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('cron_lock', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('database_last_gc', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_overall', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_http_auth', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_limit_post', '10', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_limit_topic', '15', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_topics_new', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('feed_topics_active', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('gallery_total_images', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('gallery_viewtopic_icon', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('gallery_viewtopic_images', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('gallery_viewtopic_link', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('imod_enabled', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('imod_version', '3.0.7b', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('last_queue_run', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('last_as_run', '0', '1');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('mod_show', '1', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('newest_user_colour', 'AA0000', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('newest_user_id', '2', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('newest_username', '', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('num_files', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('num_images', '0', '0');
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('num_posts', '1', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('num_topics', '1', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('num_users', '1', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('portal_enabled', '1', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('portal_version', '1.0.3', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('preview_changes', '0', 0);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('rand_seed', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('rand_seed_last_update', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('record_online_date', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('record_online_users', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('search_indexing_state', '', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('search_last_gc', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('session_last_gc', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('upload_dir_size', '0', 1);
INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('warnings_last_gc', '0', 1);

# -- Forum related auth options
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_announce', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_attach', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_bbcode', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_bump', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_delete', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_download', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_edit', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_email', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_flash', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_icons', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_ignoreflood', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_img', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_list', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_noapprove', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_poll', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_post', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_postcount', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_print', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_read', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_reply', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_report', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_search', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_sigs', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_smilies', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_sticky', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_subscribe', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_user_lock', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_vote', 1);
INSERT INTO phpbb_acl_options (auth_option, is_local) VALUES ('f_votechg', 1);

# -- Moderator related auth options
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_approve', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_chgposter', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_delete', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_edit', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_info', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_lock', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_merge', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_move', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_report', 1, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_split', 1, 1);

# -- Global moderator auth option (not a local option)
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_ban', 0, 1);
INSERT INTO phpbb_acl_options (auth_option, is_local, is_global) VALUES ('m_warn', 0, 1);

# -- Admin related auth options
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_aauth', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_attach', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_authgroups', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_authusers', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_backup', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_ban', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_bbcode', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_board', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_bots', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_clearlogs', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_email', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_fauth', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_forum', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_forumadd', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_forumdel', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_group', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_groupadd', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_groupdel', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_icons', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_jabber', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_language', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_mauth', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_modules', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_names', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_phpinfo', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_profile', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_prune', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_ranks', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_reasons', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_roles', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_search', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_server', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_styles', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_switchperm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_uauth', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_user', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_userdel', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_viewauth', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_viewlogs', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_words', 1);

# -- User related auth options
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_attach', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chgavatar', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chgcensors', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chgemail', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chggrp', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chgname', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_chgpasswd', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_download', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_hideonline', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_ignoreflood', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_masspm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_masspm_group', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_attach', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_bbcode', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_delete', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_download', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_edit', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_emailpm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_flash', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_forward', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_img', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_printpm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_pm_smilies', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_readpm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_savedrafts', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_search', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_sendemail', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_sendim', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_sendpm', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_sig', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_viewonline', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_viewprofile', 1);

# -- IM3 admin auth options
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_mods', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_k_portal', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_k_web_pages', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_k_tools', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_imod', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_config_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_categorie_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_types_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_overview', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_config', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_traffic', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_categories', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_files', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_permissions', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_stats', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_banlist', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_blacklist', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_dl_toolbox', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_gallery_manage', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_gallery_albums', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_gallery_import', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_gallery_cleanup', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_calendar_manage', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_edit_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_delete_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_publish_rss', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('a_as_manage', 1);

# -- IM3 Global moderator auth options
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_log_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_log_kb_delete', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_report_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_activate_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_edit_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_del_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('m_ch_poster', 1);

# -- IM3 user auth options
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_add_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_edit_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_del_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_print_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_attache_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_report_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_restore_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_rate_kb', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_tech', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_reddit', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_linkagogo', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_spurl', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_rds', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_slashdot', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_del', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_dig', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_google', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_prop', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_netv', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_stumble', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_view_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_new_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_edit_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_delete_event', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_post', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_view', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_info', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_delete', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_edit', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_smilies', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_bbcode', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_mod_edit', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_as_ignore_flood', 1);
INSERT INTO phpbb_acl_options (auth_option, is_global) VALUES ('u_allow_index_minical', 1);

# -- standard auth roles
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_ADMIN_STANDARD', 'ROLE_DESCRIPTION_ADMIN_STANDARD', 'a_', 1);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_ADMIN_FORUM', 'ROLE_DESCRIPTION_ADMIN_FORUM', 'a_', 3);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_ADMIN_USERGROUP', 'ROLE_DESCRIPTION_ADMIN_USERGROUP', 'a_', 4);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_ADMIN_FULL', 'ROLE_DESCRIPTION_ADMIN_FULL', 'a_', 2);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_FULL', 'ROLE_DESCRIPTION_USER_FULL', 'u_', 3);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_STANDARD', 'ROLE_DESCRIPTION_USER_STANDARD', 'u_', 1);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_LIMITED', 'ROLE_DESCRIPTION_USER_LIMITED', 'u_', 2);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_NOPM', 'ROLE_DESCRIPTION_USER_NOPM', 'u_', 4);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_NOAVATAR', 'ROLE_DESCRIPTION_USER_NOAVATAR', 'u_', 5);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_MOD_FULL', 'ROLE_DESCRIPTION_MOD_FULL', 'm_', 3);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_MOD_STANDARD', 'ROLE_DESCRIPTION_MOD_STANDARD', 'm_', 1);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_MOD_SIMPLE', 'ROLE_DESCRIPTION_MOD_SIMPLE', 'm_', 2);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_MOD_QUEUE', 'ROLE_DESCRIPTION_MOD_QUEUE', 'm_', 4);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_FULL', 'ROLE_DESCRIPTION_FORUM_FULL', 'f_', 7);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_STANDARD', 'ROLE_DESCRIPTION_FORUM_STANDARD', 'f_', 5);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_NOACCESS', 'ROLE_DESCRIPTION_FORUM_NOACCESS', 'f_', 1);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_READONLY', 'ROLE_DESCRIPTION_FORUM_READONLY', 'f_', 2);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_LIMITED', 'ROLE_DESCRIPTION_FORUM_LIMITED', 'f_', 3);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_BOT', 'ROLE_DESCRIPTION_FORUM_BOT', 'f_', 9);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_ONQUEUE', 'ROLE_DESCRIPTION_FORUM_ONQUEUE', 'f_', 8);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_POLLS', 'ROLE_DESCRIPTION_FORUM_POLLS', 'f_', 6);
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_LIMITED_POLLS', 'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS', 'f_', 4);

# 23
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_USER_NEW_MEMBER', 'ROLE_DESCRIPTION_USER_NEW_MEMBER', 'u_', 6);

# 24
INSERT INTO phpbb_acl_roles (role_name, role_description, role_type, role_order) VALUES ('ROLE_FORUM_NEW_MEMBER', 'ROLE_DESCRIPTION_FORUM_NEW_MEMBER', 'f_', 10);

# -- phpbb_styles
INSERT INTO phpbb_styles (style_name, style_copyright, style_active, template_id, theme_id, imageset_id) VALUES ('fisubice', '&copy; forumimages', 1, 1, 1, 1);
INSERT INTO phpbb_styles (style_name, style_copyright, style_active, template_id, theme_id, imageset_id) VALUES ('Mobile', '&copy; 2009 fiteam', 1, 2, 2, 2);

# -- phpbb_styles_imageset
INSERT INTO phpbb_styles_imageset (imageset_name, imageset_copyright, imageset_path) VALUES ('fisubice', '&copy; forumimages', 'fisubice');
INSERT INTO phpbb_styles_imageset (imageset_name, imageset_copyright, imageset_path) VALUES ('Mobile', '&copy; 2009 fiteam', 'Mobile');

# -- phpbb_styles_imageset_data
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('del', 'delicious.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('slashdot', 'slashdot.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('rds', 'yahoomyweb.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('spurl', 'spurl.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('linkagogo', 'linkagogo.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('reddit', 'reddit.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('tech', 'tech.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('google', 'google.gif', '', 16, 40, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('prop', 'prop.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('netv', 'netvouz.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('stumble', 'stumble.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_blue', 'dl_blue.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_default', 'dl_default.png', '', 32, 32, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_edit', 'dl_edit.png', '', 32, 32, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_file_edit', 'dl_file_edit.png', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_file_new', 'dl_file_new.png', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_green', 'dl_green.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_grey', 'dl_grey.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_new', 'dl_new.png', '', 32, 32, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_new_edit', 'dl_new_edit.png', '', 32, 32, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_rate_no', 'dl_rate_no.png', '', 12, 12, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_rate_yes', 'dl_rate_yes.png', '', 12, 12, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_red', 'dl_red.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_white', 'dl_white.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dl_yellow', 'dl_yellow.png', '', 22, 22, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_aim', 'icon_contact_aim.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_email', 'icon_contact_email.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_icq', 'icon_contact_icq.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_jabber', 'icon_contact_jabber.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_msnm', 'icon_contact_msnm.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_pm', 'icon_contact_pm.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_yahoo', 'icon_contact_yahoo.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_www', 'icon_contact_www.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_delete', 'icon_post_delete.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_edit', 'icon_post_edit.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_info', 'icon_post_info.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_quote', 'icon_post_quote.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_report', 'icon_post_report.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_online', 'icon_user_online.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_offline', 'icon_user_offline.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_profile', 'icon_user_profile.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_search', 'icon_user_search.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_warn', 'icon_user_warn.gif', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_pm_forward', 'button_pm_forward.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_pm_new', 'button_pm_new.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_pm_reply', 'button_pm_reply.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_locked', 'button_topic_locked.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_new', 'button_topic_new.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_reply', 'button_topic_reply.png', 'en', 0, 0, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('dig', 'digg.gif', '', 16, 16, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_unread_locked', 'news_unread_locked.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_unread_locked_mine', 'news_unread_locked_mine.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_unread_mine', 'news_unread_mine.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_unread', 'news_unread.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_read_locked_mine', 'news_read_locked_mine.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_read_locked', 'news_read_locked.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_read_mine', 'news_read_mine.gif', '', 17, 17, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('news_read', 'news_read.gif', '', 27, 27, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_reported', 'icon_topic_reported.gif', '', 19, 19, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_unapproved', 'icon_topic_unapproved.gif', '', 19, 19, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_newest', 'icon_topic_newest.gif', '', 9, 18, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_latest', 'icon_topic_latest.gif', '', 9, 18, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_attach', 'icon_topic_attach.gif', '', 18, 14, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_target_unread', 'icon_post_target_unread.gif', '', 9, 12, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('pm_unread', 'topic_unread.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_target', 'icon_post_target.gif', '', 9, 12, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('pm_read', 'topic_read.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_locked', 'announce_unread_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_mine', 'announce_unread_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread', 'announce_unread.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_locked_mine', 'announce_read_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_locked', 'announce_read_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_mine', 'announce_read_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read', 'announce_read.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_locked', 'announce_unread_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_mine', 'announce_unread_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread', 'announce_unread.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_locked_mine', 'announce_read_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_locked', 'announce_read_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('site_logo', 'site_logo.png', '', 110, 240, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('upload_bar', 'upload_bar.gif', '', 16, 280, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_left', 'poll_left.gif', '', 12, 4, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_center', 'poll_center.gif', '', 12, 1, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_right', 'poll_right.gif', '', 12, 4, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_link', 'forum_link.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read', 'forum_read.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read_locked', 'forum_read_locked.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read_subforum', 'forum_read_subforum.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread', 'forum_unread.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread_locked', 'forum_unread_locked.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread_subforum', 'forum_unread_subforum.gif', '', 25, 46, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_moved', 'topic_moved.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read', 'topic_read.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_mine', 'topic_read_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_hot', 'topic_read_hot.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_hot_mine', 'topic_read_hot_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_locked', 'topic_read_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_locked_mine', 'topic_read_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread', 'topic_unread.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_mine', 'topic_unread_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_hot', 'topic_unread_hot.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_hot_mine', 'topic_unread_hot_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_locked', 'topic_unread_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_locked_mine', 'topic_unread_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read', 'sticky_read.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_mine', 'sticky_read_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_locked', 'sticky_read_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_locked_mine', 'sticky_read_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread', 'sticky_unread.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_mine', 'sticky_unread_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_locked', 'sticky_unread_locked.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_locked_mine', 'sticky_unread_locked_mine.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read', 'announce_read.gif', '', 25, 25, 1);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_mine', 'announce_read_mine.gif', '', 25, 25, 1);

INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('site_logo', 'site_logo.gif', '', 50, 217, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('upload_bar', 'upload_bar.gif', '', 16, 280, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_left', 'poll_left.gif', '', 12, 4, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_center', 'poll_center.gif', '', 12, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('poll_right', 'poll_right.gif', '', 12, 4, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_link', 'forum_link.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read', 'forum_read.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read_locked', 'forum_read_locked.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_read_subforum', 'forum_read_subforum.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread', 'forum_unread.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread_locked', 'forum_unread_locked.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('forum_unread_subforum', 'forum_unread_subforum.gif', '', 25, 46, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_moved', 'topic_moved.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read', 'topic_read.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_mine', 'topic_read_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_hot', 'topic_read_hot.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_hot_mine', 'topic_read_hot_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_locked', 'topic_read_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_read_locked_mine', 'topic_read_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread', 'topic_unread.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_mine', 'topic_unread_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_hot', 'topic_unread_hot.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_hot_mine', 'topic_unread_hot_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_locked', 'topic_unread_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('topic_unread_locked_mine', 'topic_unread_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read', 'sticky_read.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_mine', 'sticky_read_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_locked', 'sticky_read_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_read_locked_mine', 'sticky_read_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread', 'sticky_unread.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_mine', 'sticky_unread_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_locked', 'sticky_unread_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('sticky_unread_locked_mine', 'sticky_unread_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read', 'announce_read.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_mine', 'announce_read_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_locked', 'announce_read_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_read_locked_mine', 'announce_read_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread', 'announce_unread.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_mine', 'announce_unread_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_locked', 'announce_unread_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('announce_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read', 'announce_read.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_mine', 'announce_read_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_locked', 'announce_read_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_read_locked_mine', 'announce_read_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread', 'announce_unread.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_mine', 'announce_unread_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_locked', 'announce_unread_locked.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('global_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('pm_read', 'topic_read.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('pm_unread', 'topic_unread.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_target', 'icon_post_target.gif', '', 9, 12, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_target_unread', 'icon_post_target_unread.gif', '', 9, 12, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_attach', 'icon_topic_attach.gif', '', 18, 14, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_latest', 'icon_topic_latest.gif', '', 9, 18, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_newest', 'icon_topic_newest.gif', '', 9, 18, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_reported', 'icon_topic_reported.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_topic_unapproved', 'icon_topic_unapproved.gif', '', 18, 19, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_aim', 'icon_contact_aim.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_email', 'icon_contact_email.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_icq', 'icon_contact_icq.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_jabber', 'icon_contact_jabber.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_msnm', 'icon_contact_msnm.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_pm', 'icon_contact_pm.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_yahoo', 'icon_contact_yahoo.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_contact_www', 'icon_contact_www.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_delete', 'icon_post_delete.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_edit', 'icon_post_edit.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_info', 'icon_post_info.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_quote', 'icon_post_quote.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_post_report', 'icon_post_report.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_online', 'icon_user_online.png', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_offline', 'icon_user_offline.png', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_profile', 'icon_user_profile.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_search', 'icon_user_search.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('icon_user_warn', 'icon_user_warn.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_pm_new', 'button_pm_new.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_pm_reply', 'button_pm_reply.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_locked', 'button_topic_locked.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_new', 'button_topic_new.gif', 'en', 0, 0, 2);
INSERT INTO phpbb_styles_imageset_data (image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES ('button_topic_reply', 'button_topic_reply.gif', 'en', 0, 0, 2);

# -- phpbb_styles_template
INSERT INTO phpbb_styles_template (template_name, template_copyright, template_path, bbcode_bitfield, template_storedb) VALUES ('fisubice', '&copy; forumimages', 'fisubice', 'lNg=', 0);
INSERT INTO phpbb_styles_template (template_name, template_copyright, template_path, bbcode_bitfield, template_storedb) VALUES('Mobile', '&copy; 2009 fiteam', 'Mobile', '+Ng=', 0);

# -- phpbb_styles_theme
INSERT INTO phpbb_styles_theme (theme_name, theme_copyright, theme_path, theme_storedb, theme_data) VALUES ('fisubice', '&copy; forumimages', 'fisubice', 1, '');
INSERT INTO phpbb_styles_theme (theme_name, theme_copyright, theme_path, theme_storedb, theme_data) VALUES ('Mobile', '&copy; forumimages', 'Mobile', 1, '');

# -- Forums
INSERT INTO phpbb_forums (forum_name, forum_desc, left_id, right_id, parent_id, forum_type, forum_posts, forum_topics, forum_topics_real, forum_last_post_id, forum_last_poster_id, forum_last_poster_name, forum_last_poster_colour, forum_last_post_time, forum_link, forum_password, forum_image, forum_rules, forum_rules_link, forum_rules_uid, forum_desc_uid, prune_days, prune_viewed, forum_parents) VALUES ('{L_FORUMS_FIRST_CATEGORY}', '', 1, 4, 0, 0, 1, 1, 1, 1, 2, 'Admin', 'AA0000', 972086460, '', '', '', '', '', '', '', 0, 0, '');

INSERT INTO phpbb_forums (forum_name, forum_desc, left_id, right_id, parent_id, forum_type, forum_posts, forum_topics, forum_topics_real, forum_last_post_id, forum_last_poster_id, forum_last_poster_name, forum_last_poster_colour, forum_last_post_subject, forum_last_post_time, forum_link, forum_password, forum_image, forum_rules, forum_rules_link, forum_rules_uid, forum_desc_uid, prune_days, prune_viewed, forum_parents) VALUES ('{L_FORUMS_TEST_FORUM_TITLE}', '{L_FORUMS_TEST_FORUM_DESC}', 2, 3, 1, 1, 1, 1, 1, 1, 2, 'Admin', 'AA0000', '{L_TOPICS_TOPIC_TITLE}', 972086460, '', '', '', '', '', '', '', 0, 0, '');

# -- Users / Anonymous user
INSERT INTO phpbb_users (user_type, group_id, username, username_clean, user_regdate, user_password, user_email, user_lang, user_style, user_rank, user_colour, user_posts, user_permissions, user_ip, user_birthday, user_lastpage, user_last_confirm_key, user_post_sortby_type, user_post_sortby_dir, user_topic_sortby_type, user_topic_sortby_dir, user_avatar, user_sig, user_sig_bbcode_uid, user_from, user_icq, user_aim, user_yim, user_msnm, user_jabber, user_website, user_occ, user_interests, user_actkey, user_newpasswd, user_allow_massemail) VALUES (2, 1, 'Anonymous', 'anonymous', 0, '', '', 'en', 1, 0, '', 0, '', '', '', '', '', 't', 'a', 't', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

# -- username: Admin    password: admin (change this or remove it once everything is working!)
INSERT INTO phpbb_users (user_type, group_id, username, username_clean, user_regdate, user_password, user_email, user_lang, user_style, user_rank, user_colour, user_posts, user_permissions, user_ip, user_birthday, user_lastpage, user_last_confirm_key, user_post_sortby_type, user_post_sortby_dir, user_topic_sortby_type, user_topic_sortby_dir, user_avatar, user_sig, user_sig_bbcode_uid, user_from, user_icq, user_aim, user_yim, user_msnm, user_jabber, user_website, user_occ, user_interests, user_actkey, user_newpasswd) VALUES (3, 5, 'Admin', 'admin', 0, '21232f297a57a5a743894a0e4a801fc3', 'admin@yourdomain.com', 'en', 1, 1, 'AA0000', 1, '', '', '', '', '', 't', 'a', 't', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

# -- Groups
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(1, 3, 0, 0, 'GUESTS', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 5, 0, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(2, 3, 0, 0, 'REGISTERED', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 5, 0, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(3, 3, 0, 0, 'REGISTERED_COPPA', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 5, 0, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(4, 3, 0, 0, 'GLOBAL_MODERATORS', '', '', 7, '', 0, '', 0, 0, 0, 0, '00AA00', 0, 0, 0, 0, 1, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(5, 3, 1, 0, 'ADMINISTRATORS', '', '', 7, '', 0, '', 0, 0, 0, 0, 'AA0000', 0, 0, 0, 0, 1, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(6, 3, 0, 0, 'BOTS', '', '', 7, '', 0, '', 0, 0, 0, 0, '9E8DA7', 0, 0, 0, 5, 0, 0);
INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_skip_auth, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_max_recipients, group_legend, group_dl_auto_traffic) VALUES(7, 3, 0, 0, 'NEWLY_REGISTERED', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 5, 0, 0);

# -- User -> Group
INSERT INTO phpbb_user_group (group_id, user_id, user_pending, group_leader) VALUES (1, 1, 0, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending, group_leader) VALUES (2, 2, 0, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending, group_leader) VALUES (4, 2, 0, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending, group_leader) VALUES (5, 2, 0, 1);

# -- Ranks
INSERT INTO phpbb_ranks (rank_title, rank_min, rank_special, rank_image) VALUES ('{L_RANKS_SITE_ADMIN_TITLE}', 0, 1, '');

# -- Roles data

# Standard Admin (a_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 1, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'a_%' AND auth_option NOT IN ('a_switchperm', 'a_jabber', 'a_phpinfo', 'a_server', 'a_backup', 'a_styles', 'a_clearlogs', 'a_modules', 'a_language', 'a_email', 'a_bots', 'a_search', 'a_aauth', 'a_roles');

# Forum admin (a_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 2, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'a_%' AND auth_option IN ('a_', 'a_authgroups', 'a_authusers', 'a_fauth', 'a_forum', 'a_forumadd', 'a_forumdel', 'a_mauth', 'a_prune', 'a_uauth', 'a_viewauth', 'a_viewlogs');

# User and Groups Admin (a_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 3, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'a_%' AND auth_option IN ('a_', 'a_authgroups', 'a_authusers', 'a_ban', 'a_group', 'a_groupadd', 'a_groupdel', 'a_ranks', 'a_uauth', 'a_user', 'a_viewauth', 'a_viewlogs');

# Full Admin (a_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 4, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'a_%';

# All Features (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 5, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%';

# Standard Features (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 6, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option NOT IN ('u_viewonline', 'u_chggrp', 'u_chgname', 'u_ignoreflood', 'u_pm_flash', 'u_pm_forward');

# Limited Features (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 7, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option NOT IN ('u_attach', 'u_viewonline', 'u_chggrp', 'u_chgname', 'u_ignoreflood', 'u_pm_attach', 'u_pm_emailpm', 'u_pm_flash', 'u_savedrafts', 'u_search', 'u_sendemail', 'u_sendim', 'u_masspm', 'u_masspm_group');

# No Private Messages (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 8, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option IN ('u_', 'u_chgavatar', 'u_chgcensors', 'u_chgemail', 'u_chgpasswd', 'u_download', 'u_hideonline', 'u_sig', 'u_viewprofile');
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 8, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option IN ('u_readpm', 'u_sendpm', 'u_masspm', 'u_masspm_group');

# No Avatar (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 9, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option NOT IN ('u_attach', 'u_chgavatar', 'u_viewonline', 'u_chggrp', 'u_chgname', 'u_ignoreflood', 'u_pm_attach', 'u_pm_emailpm', 'u_pm_flash', 'u_savedrafts', 'u_search', 'u_sendemail', 'u_sendim', 'u_masspm', 'u_masspm_group');
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 9, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option IN ('u_chgavatar', 'u_masspm', 'u_masspm_group');

# Full Moderator (m_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 10, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'm_%';

# Standard Moderator (m_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 11, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'm_%' AND auth_option NOT IN ('m_ban', 'm_chgposter');

# Simple Moderator (m_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 12, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'm_%' AND auth_option IN ('m_', 'm_delete', 'm_edit', 'm_info', 'm_report');

# Queue Moderator (m_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 13, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'm_%' AND auth_option IN ('m_', 'm_approve', 'm_edit');

# Full Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 14, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%';

# Standard Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 15, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option NOT IN ('f_announce', 'f_flash', 'f_ignoreflood', 'f_poll', 'f_sticky', 'f_user_lock');

# No Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 16, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option = 'f_';

# Read Only Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 17, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option IN ('f_', 'f_download', 'f_list', 'f_read', 'f_search', 'f_subscribe', 'f_print');

# Limited Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 18, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option NOT IN ('f_announce', 'f_attach', 'f_bump', 'f_delete', 'f_flash', 'f_icons', 'f_ignoreflood', 'f_poll', 'f_sticky', 'f_user_lock', 'f_votechg');

# Bot Access (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 19, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option IN ('f_', 'f_download', 'f_list', 'f_read', 'f_print');

# On Moderation Queue (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 20, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option NOT IN ('f_announce', 'f_bump', 'f_delete', 'f_flash', 'f_icons', 'f_ignoreflood', 'f_poll', 'f_sticky', 'f_user_lock', 'f_votechg', 'f_noapprove');
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 20, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option IN ('f_noapprove');

# Standard Access + Polls (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 21, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option NOT IN ('f_announce', 'f_flash', 'f_ignoreflood', 'f_sticky', 'f_user_lock');

# Limited Access + Polls (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 22, auth_option_id, 1 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option NOT IN ('f_announce', 'f_attach', 'f_bump', 'f_delete', 'f_flash', 'f_icons', 'f_ignoreflood', 'f_sticky', 'f_user_lock', 'f_votechg');

# New Member (u_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 23, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option LIKE 'u_%' AND auth_option IN ('u_sendpm', 'u_masspm', 'u_masspm_group');

# New Member (f_)
INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) SELECT 24, auth_option_id, 0 FROM phpbb_acl_options WHERE auth_option LIKE 'f_%' AND auth_option IN ('f_noapprove');


# Permissions

# GUESTS - u_download and u_search ability
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) SELECT 1, 0, auth_option_id, 0, 1 FROM phpbb_acl_options WHERE auth_option IN ('u_', 'u_download', 'u_search');

# Admin user - full user features
INSERT INTO phpbb_acl_users (user_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (2, 0, 0, 5, 0);

# ADMINISTRATOR Group - full user features
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (5, 0, 0, 5, 0);

# ADMINISTRATOR Group - standard admin
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (5, 0, 0, 1, 0);

# REGISTERED and REGISTERED_COPPA having standard user features
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (2, 0, 0, 6, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (3, 0, 0, 6, 0);

# GLOBAL_MODERATORS having full user features
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (4, 0, 0, 5, 0);

# GLOBAL_MODERATORS having full global moderator access
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (4, 0, 0, 10, 0);

# Giving all groups read only access to the first category
# since administrators and moderators are already within the registered users group we do not need to set them here
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (1, 1, 0, 17, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (2, 1, 0, 17, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (3, 1, 0, 17, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (6, 1, 0, 17, 0);

# Giving access to the first forum

# guests having read only access
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (1, 2, 0, 17, 0);

# registered and registered_coppa having standard access
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (2, 2, 0, 15, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (3, 2, 0, 15, 0);

# global moderators having standard access + polls
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (4, 2, 0, 21, 0);

# administrators having full forum and full moderator access
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (5, 2, 0, 14, 0);
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (5, 2, 0, 10, 0);

# Bots having bot access
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (6, 2, 0, 19, 0);

# NEW MEMBERS aren't allowed to PM
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (7, 0, 0, 23, 0);

# NEW MEMBERS on the queue
INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (7, 2, 0, 24, 0);


# -- Demo Topic
INSERT INTO phpbb_topics (topic_title, topic_poster, topic_time, topic_views, topic_replies, topic_replies_real, forum_id, topic_status, topic_type, topic_first_post_id, topic_first_poster_name, topic_first_poster_colour, topic_last_post_id, topic_last_poster_id, topic_last_poster_name, topic_last_poster_colour, topic_last_post_subject, topic_last_post_time, topic_last_view_time, poll_title) VALUES ('{L_IM_TOPIC_TITLE}', 2, 972086460, 0, 0, 0, 2, 0, 0, 1, 'Admin', 'AA0000', 1, 2, 'Admin', 'AA0000', '{L_TOPICS_TOPIC_TITLE}', 972086460, 972086460, '');

# -- Demo Post
INSERT INTO phpbb_posts (topic_id, forum_id, poster_id, icon_id, post_time, post_username, poster_ip, post_subject, post_text, post_checksum, bbcode_uid) VALUES (1, 2, 2, 0, 972086460, '', '127.0.0.1', '{L_IM_TOPIC_TITLE}', '{L_DEFAULT_IM_POST}', '5dd683b17f641daf84c040bfefc58ce9', '');

# -- Admin posted to the demo topic
INSERT INTO phpbb_topics_posted (user_id, topic_id, topic_posted) VALUES (2, 1, 1);

# -- Smilies
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':D', 'icon_e_biggrin.gif', '{L_SMILIES_VERY_HAPPY}', 15, 17, 1);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-D', 'icon_e_biggrin.gif', '{L_SMILIES_VERY_HAPPY}', 15, 17, 2);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':grin:', 'icon_e_biggrin.gif', '{L_SMILIES_VERY_HAPPY}', 15, 17, 3);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':)', 'icon_e_smile.gif', '{L_SMILIES_SMILE}', 15, 17, 4);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-)', 'icon_e_smile.gif', '{L_SMILIES_SMILE}', 15, 17, 5);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':smile:', 'icon_e_smile.gif', '{L_SMILIES_SMILE}', 15, 17, 6);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (';)', 'icon_e_wink.gif', '{L_SMILIES_WINK}', 15, 17, 7);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (';-)', 'icon_e_wink.gif', '{L_SMILIES_WINK}', 15, 17, 8);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':wink:', 'icon_e_wink.gif', '{L_SMILIES_WINK}', 15, 17, 9);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':(', 'icon_e_sad.gif', '{L_SMILIES_SAD}', 15, 17, 10);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-(', 'icon_e_sad.gif', '{L_SMILIES_SAD}', 15, 17, 11);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':sad:', 'icon_e_sad.gif', '{L_SMILIES_SAD}', 15, 17, 12);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':o', 'icon_e_surprised.gif', '{L_SMILIES_SURPRISED}', 15, 17, 13);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-o', 'icon_e_surprised.gif', '{L_SMILIES_SURPRISED}', 15, 17, 14);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':eek:', 'icon_e_surprised.gif', '{L_SMILIES_SURPRISED}', 15, 17, 15);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':shock:', 'icon_eek.gif', '{L_SMILIES_SHOCKED}', 15, 17, 16);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':?', 'icon_e_confused.gif', '{L_SMILIES_CONFUSED}', 15, 17, 17);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-?', 'icon_e_confused.gif', '{L_SMILIES_CONFUSED}', 15, 17, 18);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':???:', 'icon_e_confused.gif', '{L_SMILIES_CONFUSED}', 15, 17, 19);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES ('8-)', 'icon_cool.gif', '{L_SMILIES_COOL}', 15, 17, 20);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':cool:', 'icon_cool.gif', '{L_SMILIES_COOL}', 15, 17, 21);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':lol:', 'icon_lol.gif', '{L_SMILIES_LAUGHING}', 15, 17, 22);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':x', 'icon_mad.gif', '{L_SMILIES_MAD}', 15, 17, 23);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-x', 'icon_mad.gif', '{L_SMILIES_MAD}', 15, 17, 24);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':mad:', 'icon_mad.gif', '{L_SMILIES_MAD}', 15, 17, 25);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':P', 'icon_razz.gif', '{L_SMILIES_RAZZ}', 15, 17, 26);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-P', 'icon_razz.gif', '{L_SMILIES_RAZZ}', 15, 17, 27);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':razz:', 'icon_razz.gif', '{L_SMILIES_RAZZ}', 15, 17, 28);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':oops:', 'icon_redface.gif', '{L_SMILIES_EMARRASSED}', 15, 17, 29);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':cry:', 'icon_cry.gif', '{L_SMILIES_CRYING}', 15, 17, 30);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':evil:', 'icon_evil.gif', '{L_SMILIES_EVIL}', 15, 17, 31);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':twisted:', 'icon_twisted.gif', '{L_SMILIES_TWISTED_EVIL}', 15, 17, 32);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':roll:', 'icon_rolleyes.gif', '{L_SMILIES_ROLLING_EYES}', 15, 17, 33);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':!:', 'icon_exclaim.gif', '{L_SMILIES_EXCLAMATION}', 15, 17, 34);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':?:', 'icon_question.gif', '{L_SMILIES_QUESTION}', 15, 17, 35);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':idea:', 'icon_idea.gif', '{L_SMILIES_IDEA}', 15, 17, 36);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':arrow:', 'icon_arrow.gif', '{L_SMILIES_ARROW}', 15, 17, 37);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':|', 'icon_neutral.gif', '{L_SMILIES_NEUTRAL}', 15, 17, 38);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':-|', 'icon_neutral.gif', '{L_SMILIES_NEUTRAL}', 15, 17, 39);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':mrgreen:', 'icon_mrgreen.gif', '{L_SMILIES_MR_GREEN}', 15, 17, 40);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':geek:', 'icon_e_geek.gif', '{L_SMILIES_GEEK}', 17, 17, 41);
INSERT INTO phpbb_smilies (code, smiley_url, emotion, smiley_width, smiley_height, smiley_order) VALUES (':ugeek:', 'icon_e_ugeek.gif', '{L_SMILIES_UBER_GEEK}', 17, 18, 42);

# -- icons
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('misc/fire.gif', 16, 16, 1, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('smile/redface.gif', 16, 16, 9, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('smile/mrgreen.gif', 16, 16, 10, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('misc/heart.gif', 16, 16, 4, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('misc/star.gif', 16, 16, 2, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('misc/radioactive.gif', 16, 16, 3, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('misc/thinking.gif', 16, 16, 5, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('smile/info.gif', 16, 16, 8, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('smile/question.gif', 16, 16, 6, 1);
INSERT INTO phpbb_icons (icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES ('smile/alert.gif', 16, 16, 7, 1);

# -- reasons
INSERT INTO phpbb_reports_reasons (reason_title, reason_description, reason_order) VALUES ('warez', '{L_REPORT_WAREZ}', 1);
INSERT INTO phpbb_reports_reasons (reason_title, reason_description, reason_order) VALUES ('spam', '{L_REPORT_SPAM}', 2);
INSERT INTO phpbb_reports_reasons (reason_title, reason_description, reason_order) VALUES ('off_topic', '{L_REPORT_OFF_TOPIC}', 3);
INSERT INTO phpbb_reports_reasons (reason_title, reason_description, reason_order) VALUES ('other', '{L_REPORT_OTHER}', 4);

# -- extension_groups
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_IMAGES}', 1, 1, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_ARCHIVES}', 0, 1, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_PLAIN_TEXT}', 0, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_DOCUMENTS}', 0, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_REAL_MEDIA}', 3, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_WINDOWS_MEDIA}', 2, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_FLASH_FILES}', 5, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_QUICKTIME_MEDIA}', 6, 0, 1, '', 0, '');
INSERT INTO phpbb_extension_groups (group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums) VALUES ('{L_EXT_GROUP_DOWNLOADABLE_FILES}', 0, 0, 1, '', 0, '');

# -- extensions
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'gif');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'png');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'jpeg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'jpg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'tif');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'tiff');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (1, 'tga');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'gtar');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'gz');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'tar');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'zip');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'rar');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'ace');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'torrent');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'tgz');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, 'bz2');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (2, '7z');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'txt');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'c');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'h');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'cpp');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'hpp');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'diz');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'csv');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'ini');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'log');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'js');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (3, 'xml');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'xls');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'xlsx');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'xlsm');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'xlsb');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'doc');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'docx');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'docm');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'dot');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'dotx');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'dotm');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'pdf');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'ai');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'ps');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'ppt');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'pptx');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'pptm');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'odg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'odp');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'ods');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'odt');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (4, 'rtf');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (5, 'rm');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (5, 'ram');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (6, 'wma');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (6, 'wmv');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (7, 'swf');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, 'mov');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, 'm4v');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, 'm4a');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, 'mp4');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, '3gp');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, '3g2');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (8, 'qt');

INSERT INTO phpbb_extensions (group_id, extension) VALUES (9, 'mpeg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (9, 'mpg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (9, 'mp3');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (9, 'ogg');
INSERT INTO phpbb_extensions (group_id, extension) VALUES (9, 'ogm');

# -- download mod
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_mod_version', '6.2.26');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('delay_auto_traffic', '30');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('delay_post_traffic', '30');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('disable_email', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('disable_popup', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('disable_popup_notify', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_click_reset_time', '1256527601');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_edit_time', '3');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_links_per_page', '10');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_method', '2');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_method_quota', '2097152');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_new_time', '3');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_posts', '25');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_stats_perm', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_topic_forum', '');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('dl_topic_text', '');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('download_dir', 'dl_mod/downloads/');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('download_vc', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('drop_traffic_postdel', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('edit_own_downloads', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('enable_dl_topic', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('enable_post_dl_traffic', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('ext_new_window', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('guest_stats_show', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('hotlink_action', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('icon_free_for_reg', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('latest_comments', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('limit_desc_on_index', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('newtopic_traffic', '524288');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('overall_guest_traffic', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('overall_traffic', '104857600');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('physical_quota', '524288000');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('prevent_hotlink', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('recent_downloads', '10');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('remain_guest_traffic', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('remain_traffic', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('reply_traffic', '262144');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('report_broken', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('report_broken_lock', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('report_broken_message', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('report_broken_vc', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('shorten_extern_links', '10');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('show_footer_legend', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('show_footer_stat', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('show_real_filetime', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('sort_preform', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('stop_uploads', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('thumb_fsize', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('thumb_xsize', '200');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('thumb_ysize', '150');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('traffic_retime', '1256527601');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('upload_traffic_count', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('use_ext_blacklist', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('use_hacklist', '1');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('user_dl_auto_traffic', '0');
INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('user_traffic_once', '0');

INSERT INTO phpbb_dl_config (config_name, config_value) VALUES('user_dl_enable_rule', '0');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('asp');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('cgi');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('dhtm');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('dhtml');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('exe');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('htm');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('html');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('jar');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('js');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('php');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('php3');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('pl');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('sh');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('shtm');
INSERT INTO phpbb_dl_ext_blacklist (extention) VALUES('shtml');

INSERT INTO phpbb_dl_banlist (user_agent) VALUES('n/a');

INSERT INTO phpbb_downloads_cat (id, parent, path, cat_name, sort, description, rules, auth_view, auth_dl, auth_up, auth_mod, must_approve, allow_mod_desc, statistics, stats_prune, comments, cat_traffic, cat_traffic_use, allow_thumbs, auth_cread, auth_cpost, approve_comments, bug_tracker, desc_uid, desc_bitfield, desc_flags, rules_uid, rules_bitfield, rules_flags, dl_topic_forum, dl_topic_text, cat_icon) VALUES(1, 0, '/', 'My Downloads', 0, '', '', 1, 1, 0, 0, 1, 0, 1, 100000, 1, 0, 0, 0, 0, 1, 0, 0, '', '', 7, '', '', 7, 0, '', '');

# -- phpbb Gallery
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('max_file_size', '512000');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('max_width', '800');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('max_height', '600');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rows_per_page', '3');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('cols_per_page', '4');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('thumbnail_quality', '50');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('thumbnail_size', '125');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('thumbnail_cache', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('sort_method', 't');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('sort_order', 'd');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('jpg_allowed', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('png_allowed', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('gif_allowed', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('desc_length', '512');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('hotlink_prevent', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('hotlink_allowed', 'flying-bits.org');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rate', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rate_scale', '10');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('comment', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('gd_version', '2');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('watermark_images', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('watermark_source', 'GALLERY_IMAGE_PATH . watermark.png');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('preview_rsz_height', '768');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('preview_rsz_width', '1024');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('upload_images', '10');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('thumbnail_info_line', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('fake_thumb_size', '70');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('disp_fake_thumb', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('personal_counter', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('exif_data', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('watermark_height', '50');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('watermark_width', '200');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('shorted_imagenames', '25');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('comment_length', '1024');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('description_length', '1024');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('allow_rates', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('allow_comments', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('link_thumbnail', 'highslide');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('link_image_name', 'highslide');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('link_image_icon', 'highslide');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('personal_album_index', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('view_image_url', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('medium_cache', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('link_imagepage', 'image_page');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_mode', '7');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_rows', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_columns', '4');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_comments', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('user_images_profile', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('personal_album_profile', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_profile_mode', '3');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_profile_columns', '4');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_profile_rows', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_crows', '5');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('contests_ended', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_contests', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_display', '173');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_profile_display', '141');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('album_display', '254');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('num_comments', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('disp_login', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('disp_whoisonline', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('disp_birthdays', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('disp_statistic', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_gindex_pgalleries', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('newest_pgallery_user_id', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('newest_pgallery_username', '');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('newest_pgallery_user_colour', '');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('newest_pgallery_album_id', '0');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('pgalleries_per_page', '10');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('images_per_album', '1024');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('watermark_position', '20');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('rrc_profile_pgalleries', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('allow_resize_images', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('allow_rotate_images', '1');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('jpg_quality', '100');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('search_display', '45');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('version_check_version', '1.0.3');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('version_check_time', '1256663749');
INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES('phpbb_gallery_version', '1.0.4');

# -- IMOD
INSERT INTO phpbb_imod_config (id, imod_version, imod_enabled) VALUES(1, '3.0.0', 1);
INSERT INTO phpbb_imod_config_vars (config_name, config_value, is_dynamic) VALUES('imod', '1', 0);

INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('kb_title', '', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('kb_description', '', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('post_subject', '', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('post_message', '', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('index_topics', '3', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('topic_type', '0', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('post_user', '2', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('kb_mode', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('cache_time', '3600', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('activ_types', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('show_post_edit', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('sort_order_dir', 'ASC', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('sort_order', 'hits', 1);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('activ_similar', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('activ_diff', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('activ_post', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('activ_rating', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('update_post', '1', 0);
INSERT INTO phpbb_kb_config (config_name, config_value, config_type) VALUES('num_kb_article', '1', 0);

INSERT INTO phpbb_k_acronyms (acronym_id, acronym, meaning, lang) VALUES(1, ' SGP ', 'Stargate Portal (the original phpBB3 Portal by Michaelo and the Stargate Team)', 'en');
INSERT INTO phpbb_k_acronyms (acronym_id, acronym, meaning, lang) VALUES(2, ' IntegraMod ', 'The best phpBB pre-mod ever.', 'en');
INSERT INTO phpbb_k_acronyms (acronym_id, acronym, meaning, lang) VALUES(3, ' IM3 ', 'A fully integrated phpBB3 forum, incorporating IntegraMod, Stargate Portal and hundreds of mods..', 'en');
INSERT INTO phpbb_k_acronyms (acronym_id, acronym, meaning, lang) VALUES(4, ' phpbb ', 'The best forum software ever...', 'en');
INSERT INTO phpbb_k_acronyms (acronym_id, acronym, meaning, lang) VALUES(5, ' Stargate Portal ', 'The original and best portal for phpBB3', 'en');

INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(1, 1, 'Site Navigator', 'L', 'H', 1, 'block_menus.html', '', 'menu_info.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(2, 2, 'Sub_Menu', 'L', 'H', 1, 'block_sub_menus.html', '', 'menu_info.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(3, 3, 'Style Select', 'L', 'H', 1, 'block_style_select.html', '', 'menu_star.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(4, 4, 'Online Users', 'L', 'H', 1, 'block_online_users.html', '', 'icon_mini_user.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(5, 5, 'Last Online', 'L', 'H', 1, 'block_last_online.html', '', 'menu_user.png', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(6, 6, 'Recent Topics', 'L', 'H', 0, 'block_recent_topics.html', '', 'icon_mini_quick_reply.gif', 1, 0, 1, 200, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(7, 7, 'Bot Tracker', 'L', 'H', 1, 'block_bot_tracker.html', '', 'icon_mini_send.png', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(8, 8, 'Search', 'L', 'H', 1, 'block_search.html', '', 'menu_search.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(9, 9, 'Style Development', 'L', 'H', 1, 'block_styles_status.html', '', 'menu_info.png', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(10, 10, 'Categories', 'L', 'H', 1, 'block_forum_categories.html', '', 'menu_modules.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(11, 11, 'Books', 'L', 'H', 1, 'block_books.html', '', 'menu_book.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(12, 12, '', 'C', 'H', 1, 'block_welcome_message.html', '', 'none.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(13, 13, 'Announcements', 'C', 'H', 1, 'block_announcements.html', '', 'icon_mini_announce.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(14, 14, 'Recent Topics', 'C', 'H', 1, 'block_recent_topics_wide.html', '', 'icon_mini_quick_reply.gif', 1, 0, 0, 200, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(15, 15, 'News Report', 'C', 'H', 1, 'block_news_advanced.html', '', 'icon_mini_exclamation.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(16, 16, 'Unresolved/Bugs', 'C', 'H', 1, 'block_unresolved_errs.html', '', 'icon_mini_caution.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(17, 17, 'RSS', 'C', 'H', 1, 'block_rss_feeds.html', '', 'icon_mini_rss.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(18, 18, 'Quotes', 'C', 'H', 1, 'block_quotes.html', 'none.gif', 'icon_mini_quotes.gif', 1, 0, 1, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(19, 19, 'User Information', 'R', 'H', 1, 'block_user_information.html', '', 'menu_user.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(20, 20, 'Cloud 9', 'R', 'H', 0, 'block_cloud.html', '', 'menu_info.png', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(21, 21, 'The Team', 'R', 'H', 1, 'block_the_team.html', '', 'icon_mini_team.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(22, 22, 'Top Posters', 'R', 'H', 1, 'block_top_posters.html', '', 'icon_mini_star.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(23, 23, 'Top Referrals', 'R', 'H', 1, 'block_top_referrals.html', '', 'icon_mini_star.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(24, 24, 'Most Active Topics', 'R', 'H', 1, 'block_top_topics.html', '', 'icon_mini_star.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(25, 25, 'Site Statistics', 'R', 'H', 1, 'block_statistics.html', '', 'menu_info.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(26, 26, 'Clock', 'R', 'H', 1, 'block_clock.html', '', 'icon_mini_clock.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(27, 27, 'MP3 Player', 'R', 'H', 1, 'block_mp3_player.html', '', 'icon_mini_music_note.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(28, 28, 'Links', 'R', 'H', 1, 'block_links.html', '', 'icon_mini_web.gif', 1, 0, 1, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(29, 29, 'Link to us', 'R', 'H', 1, 'block_link_to_us.html', '', 'icon_mini_phpireland_globe.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(30, 30, 'Site Survey', 'R', 'H', 1, 'block_site_survey.html', '', 'icon_mini_send.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(31, 31, 'Top Downloads', 'R', 'H', 1, 'block_top_downloads.html', '', 'icon_mini_star.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(32, 32, 'Translate', 'R', 'H', 1, 'block_translate.html', '', 'icon_mini_help.gif', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(33, 33, 'Portal Status', 'R', 'H', 1, 'block_portal_status.html', '', 'menu_info.png', 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(34, 34, 'Downloads', 'R', 'H', 0, 'block_downloads.html', '', 'none.gif', 5, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(35, 35, 'IRC Chat', 'R', 'H', 1, 'block_irc.html', '', 'icon_mini_viewonline.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(36, 36, 'Age Ranges', 'R', 'H', 1, 'block_age_ranges.html', '', 'menu_user.png', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(37, 37, 'Poll', 'R', 'H', 1, 'block_poll.html', '', 'icon_mini_rating.gif', 1, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO phpbb_k_blocks (id, ndx, title, position, type, active, html_file_name, var_file_name, img_file_name, view_by, groups, scroll, block_height, has_vars, is_static, minimod_based, mod_block_id) VALUES(38, 38, 'Block development', 'R', 'H', 0, 'block_dev_status.html', '', 'menu_info.png', 1, 0, 0, 0, 1, 0, 0, 0);

INSERT INTO phpbb_k_blocks_config (id, blocks_width, blocks_enabled, use_external_files, update_files, layout_default, portal_version, portal_config) VALUES(1, 180, 1, 0, 0, 2, '1.0.0', 'Site');

INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_acronyms', '1', 1);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_announce', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_bot_display', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_footer_images', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_news', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('allow_rotating_logos', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('announce_type', '0', 1);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('display_blocks_global', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('k_show_smilies', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('link_forum_id', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('link_to_us_image', 'www.integramod.com.gif', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('links_scroll_amount', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('links_scroll_direction', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('max_announce_item_length', '400', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('max_news_item_length', '350', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('max_last_online', '10', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('news_type', '0', 1);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_announce_items_to_display', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_bots_to_display', '10', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_links_to_display', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_news_items_to_display', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_recent_topics_to_display', '25', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_topics_per_forum', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_team_members_to_display', '10', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_top_posters_to_display', '10', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('number_of_top_referrals_to_display', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('poll_forum_id', '2', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('poll_position', 'right', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('poll_post_id', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('poll_topic_id', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('poll_view', 'full', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rand_banner', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rss_feeds_cache_time', '3600', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rss_feeds_items_limit', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rss_feeds_random_limit', '4', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rss_feeds_type', 'fopen', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('show_top_posters', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('use_cookies', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('num_refviews', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('referrals_enabled', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('rand_header', '0', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('opt_irc_channels', '#stargateportal', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('search_days', '7', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('post_types', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('max_top_topics', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('age_range_interval', '15', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('age_range_start', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('age_upper_limit', '101', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('show_lb_ipsmuy', '111111111', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('show_rb_ipsmuy', '001000000', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_max_tags', '30', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_movie', 'tagcloud.swf', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_width', '156', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_height', '156', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_bg_colour', '272829', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_speed', '150', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_mode', 'both', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_search_allow', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_search_cache', '300', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_tcolour', 'FFFFFF', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_tcolour2', '99ccff', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_hicolour', '00ff00', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_distr', '1', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('cloud_wmode', 'transparent', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('mini_mod_block_count', '3', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('mini_mod_style_count', '5', 1);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('mini_mod_mod_count', '5', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('mp3_folder', 'music', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('teamspeak_pw', '', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('teamspeak_connection', '', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('use_style_based_smilies', '1', '0');
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('adm_block', '43', 0);
INSERT INTO phpbb_k_blocks_config_vars (config_name, config_value, is_dynamic) VALUES('block_cache_time', '300', 0);

INSERT INTO phpbb_k_cloud (tag_id, is_active, tag, link, rel, font_size, colour, colour2, hcolour, text) VALUES(1, 1, 1, 'http://www.stargate-portal.com', 'tag', '14', '669933', '333333', 'FF0000', 'Stargate Portal');
INSERT INTO phpbb_k_cloud (tag_id, is_active, tag, link, rel, font_size, colour, colour2, hcolour, text) VALUES(2, 1, 1, 'http://www.phpbb.com', 'tag', '12', '66CC33', 'FFCCFF', '00CC00', 'phpBB');
INSERT INTO phpbb_k_cloud (tag_id, is_active, tag, link, rel, font_size, colour, colour2, hcolour, text) VALUES(3, 1, 1, 'http://www.stargate-portal.com', 'tag', '14', 'FF3300', 'CC3366', '33CC00', 'Dev Site');
INSERT INTO phpbb_k_cloud (tag_id, is_active, tag, link, rel, font_size, colour, colour2, hcolour, text) VALUES(4, 1, 1, 'http://www.integramod.com/forum/portal.php', 'tag', '14', '66CCFF', 'FFCCFF', '99FF66', 'IntegraMOD3');

INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(1, 1, 1, 'Main Menu', '', 'none.gif', 0, 0, 1, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(2, 2, 1, 'Portal', 'portal.php', 'menu_home.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(3, 3, 1, 'Forum', 'index.php', 'menu_home2.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(4, 4, 1, 'Navigator', '', 'none.gif', 0, 0, 1, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(5, 5, 1, 'Album', 'gallery/', 'menu_gallery.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(6, 6, 1, 'Calendar', 'calendar.php', 'menu_calendar.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(7, 7, 1, 'Downloads', 'downloads.php', 'menu_filesave.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(8, 8, 1, 'Knowledge Base', './knowledge/', 'menu_info.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(9, 9, 1, 'Bookmarks', 'ucp.php?i=main&amp;mode=bookmarks', 'menu_bookmark.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(10, 10, 1, 'Members', 'memberlist.php', 'menu_chat.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(11, 11, 1, 'Ratings', 'index.php', 'menu_rating.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(12, 12, 1, 'Rules', 'basic_rules.php', 'menu_tos.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(13, 13, 1, 'Staff', 'memberlist.php?mode=leaders', 'menu_staff.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(14, 14, 1, 'FAQ', 'faq.php', 'menu_help.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(15, 15, 1, 'UCP', 'ucp.php', 'menu_links.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(16, 16, 1, 'Chat', 'chat/index.php" onclick="return chatpopup(''chat/index.php'')"', 'menu_chat.png', 0, 0, 2, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(17, 17, 1, 'Admin Menu', '', 'none.gif', 0, 0, 5, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(18, 18, 1, 'ACP', 'adm/index.php', 'menu_work.png', 1, 0, 5, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(19, 19, 1, 'REFRESH_ALL', 'sgp_refresh.php', 'menu_bin.png', 1, 0, 5, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(20, 1, 2, 'Mini Menu', '', 'none.gif', 0, 0, 1, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(21, 2, 2, 'Main Site Link', 'http://www.stargate-portal.com/forum/portal.php', 'menu_world.png', 1, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(22, 3, 2, 'Old Web Pages', '', 'none.gif', 0, 0, 1, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(23, 4, 2, 'About', 'web_page.php?mode=about', 'menu_bulb2.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(24, 5, 2, 'Web Pages', 'web_page.php?mode=welcome', 'menu_ff.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(25, 6, 2, 'Module Help', 'web_page.php?mode=modules', 'menu_search.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(26, 7, 2, 'Web Pages', '', 'none.gif', 0, 0, 1, 0, 1);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(27, 8, 2, 'About', 'web_page.php?mode=about', 'menu_links.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(28, 9, 3, 'Test Header Item', '', 'menu_umberela.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(29, 10, 2, 'Portal (wrapper)', 'portal_page.php?portal_page=5', 'menu_umberela.png', 0, 0, 1, 0, 0);
INSERT INTO phpbb_k_menus (m_id, ndx, menu_type, name, link_to, menu_icon, append_sid, append_uid, view_by, soft_hr, sub_heading) VALUES(30, 11, 2, 'WebPage (youtube)', 'web_page_utube.php?mode=youtube', 'menu_music.png', 0, 0, 1, 0, 0);

INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(1, 0, 'welcome', 1, 'Welcome', 'Stargate Development Team', 'http://www.integramod.com', 'Michaelo', 'http://www.stargate-portal.com', '&copy; integramod.com 2004-2009', 'featuring.png', 'Mon 25 Aug 2008', 'Welcome back [you]...&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;$your_site&lt;/strong&gt; is powered by &lt;strong&gt;phpBB&lt;/strong&gt; ($phpbb_version)  and &lt;strong&gt; IntegraMOD3 &lt;/strong&gt;($imod_version).', 0, 100, '1.0.0');
INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(2, 0, 'style', 1, 'prosilver', 'phpBB', 'http://www.phpbb.com', 'Michaelo', 'http://www.stargate-portal.com', '&copy; phpBB 2005', '', 'Mon 25 Aug 2008', 'Default phpBB3 style', 0, 100, '3.0.6');
INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(3, 0, 'style', 1, 'subsilver2', 'phpBB', 'http://www.phpbb.com', 'Michaelo', 'http://www.stargate-portal.com', '&copy; phpBB 2005', '', 'Mon 25 Aug 2008', 'Default phpBB3 style', 0, 100, '3.0.6');
INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(4, 0, 'block', 1, 'Demo Block', 'Michaelo', 'http://www.stargate-portal.com', 'None', 'http://www.stargate-portal.com', '&copy; phpbbireland', '', 'Mon 25 Aug 2008', 'Demo Block only', 0, 50, '1.0.0');
INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(5, 0, 'portal_status', 1, 'Stargate Portal', 'Michaelo', 'http://www.stargate-portal.com', 'phpbbireland dev team', '', '&copy; Michael O''Toole 2005-2009', '', 'Mon 25 Aug 2008', 'Stargate Portal (the original phpBB3 portal), is a fully integrated portal system for your phpBB3 board.', 0, 50, '1.0.0');
INSERT INTO phpbb_k_modules (mod_id, mod_link_id, mod_type, mod_origin, mod_name, mod_author, mod_link, mod_author_co, mod_support_link, mod_copyright, mod_thumb, mod_last_update, mod_details, mod_download_count, mod_status, mod_version) VALUES(6, 10, 'style', 0, 'fisubice', 'HelterSkelter', 'http://www.forumimages.co.uk/forum/downloads.php?cat=5', 'HelterSkelter', 'http://www.integramod.com', '&amp;copy; forumimages', '', 'Mon 25 Aug 2008', 'Default IM3 style. \nAlso in Black, Blue, Gray, Green and Orange.', 0, 90, '3.0.6');

INSERT INTO phpbb_k_newsfeeds (feed_id, feed_title, feed_show, feed_url, feed_position, feed_description) VALUES(1, 'phpBB.com', 1, 'http://www.phpbb.com/feeds/rss/', 1, 1);

INSERT INTO phpbb_k_quotes (quote_id, quote, author) VALUES(1, 'You can discover more about a person in an hour of play than in a year of conversation', 'Plato');
INSERT INTO phpbb_k_quotes (quote_id, quote, author) VALUES(2, 'Anyone who lives within their means suffers from a lack of imagination.', 'Oscar Wilde');
INSERT INTO phpbb_k_quotes (quote_id, quote, author) VALUES(3, 'I was working on the proof of one of my poems all the morning, and took out a comma. In the afternoon I put it back again.', 'Oscar Wilde');

INSERT INTO phpbb_k_referrals (id, host, hits, firstvisit, lastvisit, enabled) VALUES(1, 'integramod.com', 1, 1220665580, 1220665604, 1);

INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(1, 1, 'about', 'B', 'Mon 25 Aug 2008', '&lt;body id=&quot;phpBB&quot; class=&quot;about ltr&quot;&gt;&lt;div class=&quot;outside&quot;&gt;&lt;div class=&quot;top-left&quot;&gt;&lt;/div&gt;&lt;div class=&quot;top-center&quot;&gt;&lt;/div&gt;&lt;div class=&quot;top-right&quot;&gt;&lt;/div&gt;&lt;div class=&quot;inside&quot;&gt;&lt;div id=&quot;wrap&quot;&gt;&lt;div class=&quot;header&quot;&gt;&lt;h1&gt;&lt;a href=&quot;/&quot;&gt;phpBB &amp;bull; Creating Communities Worldwide&lt;/a&gt;&lt;/h1&gt;&lt;/div&gt;&lt;a name=&quot;start_here&quot;&gt;&lt;/a&gt;&lt;div id=&quot;page-body&quot; style=&quot;padding-top:5px;&quot;&gt;&lt;ul class=&quot;linklist navlinks&quot;&gt;&lt;li&gt;&lt;a href=&quot;portal.php&quot;&gt;Home&lt;/a&gt;&lt;strong&gt;&amp;#8249;&lt;/strong&gt; &lt;a href=&quot;web_page.php?mode=about&quot;&gt;About&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;div id=&quot;main&quot;&gt;&lt;h2 class=&quot;imgrep about&quot;&gt;About Portal Web Pages&lt;/h2&gt;&lt;p&gt;&lt;strong&gt;Portal Web Pages&lt;/strong&gt; allow you to add additional pages to your site. These page consist of standard HTML code, so you can design a page in your favourite WYSIWYG editor and simply copy the contents into a new web page...&lt;/p&gt;&lt;p&gt;For convenience we divided pages into headers, bodies and footers, this allows reuse of headers and footers are these are often common to other pages...&lt;/p&gt;&lt;p&gt;Thsi page serves as an example...&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;/div&gt;&lt;div id=&quot;extras&quot;&gt;&lt;div class=&quot;mini-panel sections&quot;&gt;&lt;div class=&quot;inner&quot;&gt;&lt;span class=&quot;corners-top&quot;&gt;&lt;span&gt;&lt;/span&gt;&lt;/span&gt;&lt;h3&gt;&lt;a href=&quot;web?mode=about&quot;&gt;About section&lt;/a&gt;&lt;/h3&gt;&lt;ul class=&quot;menu&quot;&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=welcome&quot;&gt;Welcome&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=download&quot;&gt;Download&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=features&quot;&gt;The features&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=history&quot;&gt;The history&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=team&quot;&gt;The team&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;http://www.stargate-portal.com/phpBB3/portal.php&quot;&gt;The Demo Site&lt;/a&gt;&lt;/li&gt;&lt;li class=&quot;last&quot;&gt;&lt;a href=&quot;http://www.stargate-portal.com/forum/portal.php&quot;&gt;The Development Site&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;span class=&quot;corners-bottom&quot;&gt;&lt;span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', 3, 4, '');
INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(2, 1, 'welcome', 'B', 'Mon 25 Aug 2008', '&lt;body id=&quot;phpBB&quot; class=&quot;welcome ltr&quot; &gt;&lt;div class=&quot;outside&quot;&gt;&lt;div class=&quot;top-left&quot;&gt;&lt;/div&gt;&lt;div class=&quot;top-center&quot;&gt;&lt;/div&gt;&lt;div class=&quot;top-right&quot;&gt;&lt;/div&gt;&lt;div class=&quot;inside&quot;&gt;&lt;div id=&quot;wrap&quot;&gt;&lt;div class=&quot;header&quot;&gt;&lt;h1&gt;&lt;a href=&quot;/&quot;&gt;phpBB ??? Creating Communities Worldwide&lt;/a&gt;&lt;/h1&gt;&lt;/div&gt;&lt;a name=&quot;start_here&quot;&gt;&lt;/a&gt;&lt;div id=&quot;page-body&quot; style=&quot;padding-top:5px;&quot;&gt;&lt;ul class=&quot;linklist navlinks&quot;&gt;&lt;li&gt;&lt;a href=&quot;portal.php&quot;&gt;Home&lt;/a&gt;&lt;strong&gt;&amp;#8249;&lt;/strong&gt; &lt;a href=&quot;web_page.php?mode=welcome&quot;&gt;Welcome&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;div id=&quot;main&quot;&gt;&lt;h2 class=&quot;imgrep about&quot;&gt;About IntergaMod&lt;/h2&gt;&lt;p&gt;&lt;strong&gt;IntegraMod Portal&lt;/strong&gt; is the same as the Stargate but with all the mods included... The aim was to build a replacement for the IM Portal for the next generation of IntegraMOD...&lt;/p&gt;&lt;p&gt;In the beginning there were many who questioned the logic of developing a portal for what was a pre-beta product, nevertheless I was not put off as for me it was a learning experience and I needed to learn... Over time the code has changed primarily to keep pace with phpBB update but quite a bit of the original code is still present...&lt;/p&gt;&lt;p&gt;The portal is fully configurable in the ACP, I have includes many of the more useful blocks as well as one or two nice mods... For a full list of features see the &lt;a href=&quot;web_page.php?mode=features&quot;&gt;features...&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;/div&gt;&lt;div id=&quot;extras&quot;&gt;&lt;div class=&quot;mini-panel sections&quot;&gt;&lt;div class=&quot;inner&quot;&gt;&lt;span class=&quot;corners-top&quot;&gt;&lt;span&gt;&lt;/span&gt;&lt;/span&gt;&lt;h3&gt;&lt;a href=&quot;web_page.php?mode=about&quot;&gt;Welcome section&lt;/a&gt;&lt;/h3&gt;&lt;ul class=&quot;menu&quot;&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=about&quot;&gt;About&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=download&quot;&gt;Download&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=features&quot;&gt;The features&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=history&quot;&gt;The history&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;web_page.php?mode=team&quot;&gt;The team&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;http://www.stargate-portal.com/phpBB3/portal.php&quot;&gt;The Demo Site&lt;/a&gt;&lt;/li&gt;&lt;li class=&quot;last&quot;&gt;&lt;a href=&quot;http://www.stargate-portal.com/forum/&quot;&gt;The Maint Site&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;span class=&quot;corners-bottom&quot;&gt;&lt;span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', 3, 4, '');
INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(3, 1, 'test', 'H', 'Mon 25 Aug 2008', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Strict//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd&quot;&gt;&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot; dir=&quot;ltr&quot; lang=&quot;en-gb&quot; xml:lang=&quot;en-gb&quot;&gt;&lt;head&gt;&lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=UTF-8&quot; /&gt;&lt;meta http-equiv=&quot;content-style-type&quot; content=&quot;text/css&quot; /&gt;&lt;meta http-equiv=&quot;content-language&quot; content=&quot;en-gb&quot; /&gt;&lt;meta http-equiv=&quot;imagetoolbar&quot; content=&quot;no&quot; /&gt;&lt;meta name=&quot;resource-type&quot; content=&quot;document&quot; /&gt;&lt;meta name=&quot;distribution&quot; content=&quot;global&quot; /&gt;&lt;meta name=&quot;copyright&quot; content=&quot;2002-2006 phpBB Group&quot; /&gt;&lt;meta name=&quot;keywords&quot; content=&quot;&quot; /&gt;&lt;meta name=&quot;description&quot; content=&quot;&quot; /&gt;&lt;title&gt;stargate-portal.com &amp;bull; Portal&lt;/title&gt;&lt;link rel=&quot;shortcut icon&quot; href=&quot;http:www.phpbbireland/favicon.ico&quot; /&gt;&lt;link rel=&quot;icon&quot; href=&quot;favicon.ico&quot; type=&quot;image/x-icon&quot; /&gt;&lt;link href=&quot;./styles/web/theme/common.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/links.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/content.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/buttons.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/cp.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/forms.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/tweaks.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/colours.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/website.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/headers.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/titles.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/navigation.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/documentation.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/silver.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;link href=&quot;./styles/web/theme/portal_adds.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen, projection&quot; /&gt;&lt;/head&gt;', 0, 0, '');
INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(4, 1, 'test', 'F', 'Mon 25 Aug 2008', '&lt;div id=&quot;page-footer&quot;&gt;&lt;div class=&quot;copyright&quot;&gt;Powered by &lt;a href=&quot;http://www.phpbb.com/&quot;&gt;phpBB&lt;/a&gt;  &amp;copy; 2000, 2002, 2005, 2007 phpBB Group&lt;/div&gt;&lt;div&gt;&lt;a id=&quot;bottom&quot; name=&quot;bottom&quot; accesskey=&quot;z&quot;&gt;&lt;/a&gt;&lt;div class=&quot;bottom-left&quot;&gt;&lt;/div&gt;&lt;div class=&quot;bottom-center&quot;&gt;&lt;/div&gt;&lt;div class=&quot;bottom-right&quot;&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;', 0, 0, '');
INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(5, 1, 'Wrapper', 'P', 'Sat 18 Jul 2009', '&lt;div id=&quot;main&quot;&gt;&lt;object width=&quot;425&quot; height=&quot;344&quot;&gt;&lt;param name=&quot;movie&quot; value=&quot;http://www.youtube.com/v/AhR04kmcSXU&amp;hl=en&amp;fs=1&quot;&gt;&lt;/param&gt;&lt;param name=&quot;allowFullScreen&quot; value=&quot;true&quot;&gt;&lt;/param&gt;&lt;param name=&quot;allowscriptaccess&quot; value=&quot;always&quot;&gt;&lt;/param&gt;&lt;embed src=&quot;http://www.youtube.com/v/AhR04kmcSXU&amp;hl=en&amp;fs=1&quot; type=&quot;application/x-shockwave-flash&quot; allowscriptaccess=&quot;always&quot; allowfullscreen=&quot;true&quot; width=&quot;425&quot; height=&quot;344&quot;&gt;&lt;/embed&gt;&lt;/object&gt;&lt;div&gt;', 0, 0, '');
INSERT INTO phpbb_k_web_pages (id, active, page_name, page_type, last_updated, body, head, foot, external_file) VALUES(6, 1, 'youtube', 'B', 'Sat 18 Jul 2009', '', 3, 4, '');

INSERT INTO phpbb_k_youtube (video_id, video_category, video_who, video_link, video_title, video_rating) VALUES(1, 'Gregorian', 'Gregorian', 'TP71E7QLy9A', 'Moment Of Peace', 5);

INSERT INTO phpbb_bbcodes (bbcode_id, bbcode_tag, bbcode_helpline, display_on_posting, bbcode_match, bbcode_tpl, first_pass_match, first_pass_replace, second_pass_match, second_pass_replace) VALUES(13, 'album', 'GALLERY_HELPLINE_ALBUM', 1, '[album]{NUMBER}[/album]', '<a href="./gallery/image.php?image_id={NUMBER}"><img src="./gallery/image.php?mode=thumbnail&amp;image_id={NUMBER}" alt="{NUMBER}" /></a>', '!\\[album\\]([0-9]+)\\[/album\\]!i', '[album:$uid]${1}[/album:$uid]', '!\\[album:$uid\\]([0-9]+)\\[/album:$uid\\]!s', '<a href="./gallery/image.php?image_id=${1}"><img src="./gallery/image.php?mode=thumbnail&amp;image_id=${1}" alt="${1}" /></a>');
INSERT INTO phpbb_profile_fields (field_id, field_name, field_type, field_ident, field_length, field_minlen, field_maxlen, field_novalue, field_default_value, field_validation, field_required, field_show_on_reg, field_show_profile, field_hide, field_no_view, field_active, field_order) VALUES(2, 'fcol', 3, 'fcol', '5|80', '0', '1000', '', '', '.*', 0, 0, 0, 0, 1, 1, 1);
ALTER TABLE phpbb_topics ADD (
   topic_calendar_time int(11) default NULL,
   topic_calendar_duration int(11) default NULL,
   event_repeat varchar(8) default NULL,
   invite_attendees tinyint(1) unsigned NOT NULL default '0',
   event_attendees mediumtext collate utf8_bin NULL,
   event_non_attendees mediumtext collate utf8_bin NULL
);
