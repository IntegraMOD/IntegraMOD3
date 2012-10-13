<?php
/**
*
* @package phpBB Gallery
* @version $Id: phpbb_gallery_version.php 1334 2009-10-29 21:24:59Z nickvergessen $
* @copyright (c) 2007 nickvergessen nickvergessen@gmx.de http://www.flying-bits.org
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package phpbb_gallery
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class phpbb_gallery_version
{
	function version()
	{
		return array(
			'author'	=> 'nickvergessen',
			'title'		=> 'phpBB Gallery',
			'tag'		=> 'phpbb_gallery',
			'version'	=> '1.0.4',
			'file'		=> array('www.flying-bits.org', 'updatecheck', 'phpbb_gallery.xml'),
		);
	}
}

?>