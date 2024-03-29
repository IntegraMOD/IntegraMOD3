<?php
/**
*
* @package phpBB Gallery
* @version $Id: acp_gallery.php 1122 2009-04-17 15:27:21Z nickvergessen $
* @copyright (c) 2007 nickvergessen nickvergessen@gmx.de http://www.flying-bits.org
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package module_install
*/
class acp_gallery_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_gallery',
			'title'		=> 'PHPBB_GALLERY',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'overview'			=> array('title' => 'ACP_GALLERY_OVERVIEW',				'auth' => 'acl_a_gallery_manage',	'cat' => array('ACP_IMOD_ALBUM')),
				'import_images'		=> array('title' => 'ACP_IMPORT_ALBUMS',				'auth' => 'acl_a_gallery_import',	'cat' => array('ACP_IMOD_ALBUM')),
				'cleanup'			=> array('title' => 'ACP_GALLERY_CLEANUP',				'auth' => 'acl_a_gallery_cleanup',	'cat' => array('ACP_IMOD_ALBUM')),
				),
			);
	}
}
?>