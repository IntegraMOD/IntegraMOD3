<?php
/** 
*
* @mod package		Download Mod 6
* @file				acp_downloads.php 5 2009/05/28 OXPUS
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

class acp_downloads_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_downloads',
			'title'		=> 'ACP_DOWNLOADS',
			'version'	=> '6.2.3',
			'modes'		=> array(
				'main'			=> array('title' => 'ACP_DOWNLOADS',				'auth' => 'acl_a_dl_overview',		'cat' => array('ACP_IMOD_DOWNLOADS')),
				'config'		=> array('title' => 'DL_ACP_CONFIG_MANAGEMENT',		'auth' => 'acl_a_dl_config',		'cat' => array('ACP_IMOD_DOWNLOADS')),
				'traffic'		=> array('title' => 'DL_ACP_TRAFFIC_MANAGEMENT',	'auth' => 'acl_a_dl_traffic',		'cat' => array('ACP_IMOD_DOWNLOADS')),
				'categories'	=> array('title' => 'DL_ACP_CATEGORIES_MANAGEMENT',	'auth' => 'acl_a_dl_categories',	'cat' => array('ACP_IMOD_DOWNLOADS')),
				'files'			=> array('title' => 'DL_ACP_FILES_MANAGEMENT',		'auth' => 'acl_a_dl_files',			'cat' => array('ACP_IMOD_DOWNLOADS')),
				'permissions'	=> array('title' => 'DL_ACP_PERMISSIONS',			'auth' => 'acl_a_dl_permissions',	'cat' => array('ACP_IMOD_DOWNLOADS')),
				'stats'			=> array('title' => 'DL_ACP_STATS_MANAGEMENT',		'auth' => 'acl_a_dl_stats',			'cat' => array('ACP_IMOD_DOWNLOADS')),
				'banlist'		=> array('title' => 'DL_ACP_BANLIST',				'auth' => 'acl_a_dl_banlist',		'cat' => array('ACP_IMOD_DOWNLOADS')),
				'ext_blacklist'	=> array('title' => 'DL_EXT_BLACKLIST',				'auth' => 'acl_a_dl_blacklist',		'cat' => array('ACP_IMOD_DOWNLOADS')),
				'toolbox'		=> array('title' => 'DL_MANAGE',					'auth' => 'acl_a_dl_toolbox',		'cat' => array('ACP_IMOD_DOWNLOADS')),
			),
		);
	}
}

?>