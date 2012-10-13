<?php
/**
*
* @package acp
* @version $Id: download_mod_version.php 2 2009-05-28 OXPUS $
* @copyright (c) 2008 OXPUS.net
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
* @package download_mod
*/
class download_mod_version
{
	function version()
	{
		global $db;

		$sql = "SELECT config_value FROM " . DL_CONFIG_TABLE . "
			WHERE config_name = 'dl_mod_version'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		return array(
			'author'	=> 'OXPUS',
			'title'		=> 'Download MOD',
			'tag'		=> 'download_mod',
			'version'	=> $row['config_value'],
			'file'		=> array('www.oxpus.net', 'mods_check', 'oxpus_mods.xml'),
		);
	}
}

?>