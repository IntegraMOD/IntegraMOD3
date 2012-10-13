<?php
if (!defined('UMIL_AUTO')) // keep mpv happy
{
	exit;
}
if (!defined('IN_PHPBB')) // keep mpv happy
{
	exit;
}

// Now for all the tables and data ... not sure if this is efficient but it works //

$imod_config_table = 'phpbb_imod_config';
$imod_config_array[] = array(
	'imod_enabled'		=> '1',
	'imod_version'	=> '3.0.0',
);

$imod_config_vars_table = 'phpbb_imod_config_vars';
$imod_config_vars_array[] = array(
	'config_name'	=> 'imod',
	'config_value'	=> '1',
	'is_dynamic'	=> '0',
);

//KB MOD

$kb_config_table = 'phpbb_kb_config';
$kb_config_array[] = array(
	'config_name'	=> 'kb_title',
	'config_value'	=> '',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'kb_description',
	'config_value'	=> '',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'post_subject',
	'config_value'	=> '',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'post_message',
	'config_value'	=> '',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'index_topics',
	'config_value'	=> '3',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'topic_type',
	'config_value'	=> '0',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'post_user',
	'config_value'	=> '2',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'kb_mode',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'cache_time',
	'config_value'	=> '3600',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'activ_types',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'show_post_edit',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'sort_order_dir',
	'config_value'	=> 'ASC',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'sort_order',
	'config_value'	=> 'hits',
	'config_type'	=> '1',
);
$kb_config_array[] = array(
	'config_name'	=> 'activ_similar',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'activ_diff',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'activ_post',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'activ_rating',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'update_post',
	'config_value'	=> '1',
	'config_type'	=> '0',
);
$kb_config_array[] = array(
	'config_name'	=> 'num_kb_article',
	'config_value'	=> '1',
	'config_type'	=> '0',
);


// download MOD

$dl_config_table = 'phpbb_dl_config';
$dl_config_array[] = array(
	'config_name'	=> 'dl_mod_version',
	'config_value'	=> '6.2.26',
);
$dl_config_array[] = array(
	'config_name'	=> 'delay_auto_traffic',
	'config_value'	=> '30',
);

$dl_config_array[] = array(
	'config_name'	=> 'delay_post_traffic',
	'config_value'	=> '30',
);

$dl_config_array[] = array(
	'config_name'	=> 'disable_email',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'disable_popup',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'disable_popup_notify',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_click_reset_time',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_edit_time',
	'config_value'	=> '3',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_links_per_page',
	'config_value'	=> '10',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_method',
	'config_value'	=> '2',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_method_quota',
	'config_value'	=> '2097152',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_new_time',
	'config_value'	=> '3',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_posts',
	'config_value'	=> '25',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_stats_perm',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_topic_forum',
	'config_value'	=> '',
);
$dl_config_array[] = array(
	'config_name'	=> 'dl_topic_text',
	'config_value'	=> '',
);
$dl_config_array[] = array(
	'config_name'	=> 'download_dir',
	'config_value'	=> 'dl_mod/downloads/',
);
$dl_config_array[] = array(
	'config_name'	=> 'download_vc',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'drop_traffic_postdel',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'edit_own_downloads',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'enable_dl_topic',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'enable_post_dl_traffic',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'ext_new_window',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'guest_stats_show',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'hotlink_action',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'icon_free_for_reg',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'latest_comments',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'limit_desc_on_index',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'newtopic_traffic',
	'config_value'	=> '524288',
);
$dl_config_array[] = array(
	'config_name'	=> 'overall_guest_traffic',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'overall_traffic',
	'config_value'	=> '104857600',
);
$dl_config_array[] = array(
	'config_name'	=> 'physical_quota',
	'config_value'	=> '524288000',
);
$dl_config_array[] = array(
	'config_name'	=> 'prevent_hotlink',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'recent_downloads',
	'config_value'	=> '10',
);
$dl_config_array[] = array(
	'config_name'	=> 'remain_guest_traffic',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'remain_traffic',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'reply_traffic',
	'config_value'	=> '262144',
);
$dl_config_array[] = array(
	'config_name'	=> 'report_broken',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'report_broken_lock',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'report_broken_message',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'report_broken_vc',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'shorten_extern_links',
	'config_value'	=> '10',
);
$dl_config_array[] = array(
	'config_name'	=> 'show_footer_legend',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'show_footer_stat',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'show_real_filetime',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'sort_preform',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'stop_uploads',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'thumb_fsize',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'thumb_xsize',
	'config_value'	=> '200',
);
$dl_config_array[] = array(
	'config_name'	=> 'thumb_ysize',
	'config_value'	=> '150',
);
$dl_config_array[] = array(
	'config_name'	=> 'traffic_retime',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'upload_traffic_count',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'use_ext_blacklist',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'use_hacklist',
	'config_value'	=> '1',
);
$dl_config_array[] = array(
	'config_name'	=> 'user_dl_auto_traffic',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'user_traffic_once',
	'config_value'	=> '0',
);
$dl_config_array[] = array(
	'config_name'	=> 'user_dl_enable_rule',
	'config_value'	=> '0',
);


$dl_ext_blacklist_table = 'phpbb_dl_ext_blacklist';
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'asp',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'cgi',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'dhtml',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'dhtm',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'exe',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'htm',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'html',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'jar',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'js',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'jar',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'php',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'php3',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'pl',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'php3',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'sh',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'shtm',
);
$dl_ext_blacklist_array[] = array(
	'extension'	=> 'shtml',
);


$dl_banlist_table = 'phpbb_dl_banlist';
$dl_banlist_array[] = array(
	'user_agent'	=> 'n/a',
);




$gallery_config_table = 'phpbb_gallery_config';
$gallery_config_array[] = array(
	'config_name'	=> 'max_file_size',
	'config_value'	=> '512000',
);
$gallery_config_array[] = array(
	'config_name'	=> 'max_width',
	'config_value'	=> '800',
);
$gallery_config_array[] = array(
	'config_name'	=> 'max_height',
	'config_value'	=> '600',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rows_per_page',
	'config_value'	=> '3',
);
$gallery_config_array[] = array(
	'config_name'	=> 'cols_per_page',
	'config_value'	=> '4',
);
$gallery_config_array[] = array(
	'config_name'	=> 'thumbnail_quality',
	'config_value'	=> '50',
);
$gallery_config_array[] = array(
	'config_name'	=> 'thumbnail_size',
	'config_value'	=> '125',
);
$gallery_config_array[] = array(
	'config_name'	=> 'thumbnail_cache',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'sort_method',
	'config_value'	=> 't',
);
$gallery_config_array[] = array(
	'config_name'	=> 'sort_order',
	'config_value'	=> 'd',
);
$gallery_config_array[] = array(
	'config_name'	=> 'jpg_allowed',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'png_allowed',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'gif_allowed',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'desc_length',
	'config_value'	=> '512',
);
$gallery_config_array[] = array(
	'config_name'	=> 'hotlink_prevent',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'hotlink_allowed',
	'config_value'	=> 'flying-bits.org',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rate',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rate_scale',
	'config_value'	=> '10',
);
$gallery_config_array[] = array(
	'config_name'	=> 'comment',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'gd_version',
	'config_value'	=> '2',
);
$gallery_config_array[] = array(
	'config_name'	=> 'watermark_images',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'watermark_source',
	'config_value'	=> 'GALLERY_IMAGE_PATH . watermark.png',
);
$gallery_config_array[] = array(
	'config_name'	=> 'preview_rsz_height',
	'config_value'	=> '768',
);
$gallery_config_array[] = array(
	'config_name'	=> 'preview_rsz_width',
	'config_value'	=> '1024',
);
$gallery_config_array[] = array(
	'config_name'	=> 'upload_images',
	'config_value'	=> '10',
);
$gallery_config_array[] = array(
	'config_name'	=> 'thumbnail_info_line',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'fake_thumb_size',
	'config_value'	=> '70',
);
$gallery_config_array[] = array(
	'config_name'	=> 'disp_fake_thumb',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'personal_counter',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'exif_data',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'watermark_height',
	'config_value'	=> '50',
);
$gallery_config_array[] = array(
	'config_name'	=> 'watermark_width',
	'config_value'	=> '200',
);
$gallery_config_array[] = array(
	'config_name'	=> 'shorted_imagenames',
	'config_value'	=> '25',
);
$gallery_config_array[] = array(
	'config_name'	=> 'comment_length',
	'config_value'	=> '1024',
);
$gallery_config_array[] = array(
	'config_name'	=> 'description_length',
	'config_value'	=> '1024',
);
$gallery_config_array[] = array(
	'config_name'	=> 'allow_rates',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'allow_comments',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'link_thumbnail',
	'config_value'	=> 'image_page',
);
$gallery_config_array[] = array(
	'config_name'	=> 'link_image_name',
	'config_value'	=> 'image_page',
);
$gallery_config_array[] = array(
	'config_name'	=> 'link_image_icon',
	'config_value'	=> 'image_page',
);
$gallery_config_array[] = array(
	'config_name'	=> 'personal_album_index',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'view_image_url',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'medium_cache',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'link_imagepage',
	'config_value'	=> 'image_page',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_mode',
	'config_value'	=> '7',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_rows',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_columns',
	'config_value'	=> '4',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_comments',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'user_images_profile',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'personal_album_profile',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_profile_mode',
	'config_value'	=> '3',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_profile_columns',
	'config_value'	=> '4',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_profile_rows',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_crows',
	'config_value'	=> '5',
);
$gallery_config_array[] = array(
	'config_name'	=> 'contests_ended',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_contests',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_display',
	'config_value'	=> '173',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_profile_display',
	'config_value'	=> '141',
);
$gallery_config_array[] = array(
	'config_name'	=> 'album_display',
	'config_value'	=> '254',
);
$gallery_config_array[] = array(
	'config_name'	=> 'num_comments',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'disp_login',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'disp_whoisonline',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'disp_birthdays',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'disp_statistic',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_gindex_pgalleries',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'newest_pgallery_user_id',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'newest_pgallery_username',
	'config_value'	=> '',
);
$gallery_config_array[] = array(
	'config_name'	=> 'newest_pgallery_user_colour',
	'config_value'	=> '',
);
$gallery_config_array[] = array(
	'config_name'	=> 'newest_pgallery_album_id',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'pgalleries_per_page',
	'config_value'	=> '10',
);
$gallery_config_array[] = array(
	'config_name'	=> 'images_per_album',
	'config_value'	=> '1024',
);
$gallery_config_array[] = array(
	'config_name'	=> 'watermark_position',
	'config_value'	=> '20',
);
$gallery_config_array[] = array(
	'config_name'	=> 'rrc_profile_pgalleries',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'allow_resize_images',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'allow_rotate_images',
	'config_value'	=> '1',
);
$gallery_config_array[] = array(
	'config_name'	=> 'jpg_quality',
	'config_value'	=> '100',
);
$gallery_config_array[] = array(
	'config_name'	=> 'search_display',
	'config_value'	=> '45',
);
$gallery_config_array[] = array(
	'config_name'	=> 'version_check_version',
	'config_value'	=> '0.0.0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'version_check_time',
	'config_value'	=> '0',
);
$gallery_config_array[] = array(
	'config_name'	=> 'phpbb_gallery_version',
	'config_value'	=> '1.0.3',
);


// Finished tables and data ... A schema file is so much easier ;)
?>