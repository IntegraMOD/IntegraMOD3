<?php
/**
*
* @package phpBB Gallery
* @version $Id: root_path.php 1248 2009-07-20 23:03:27Z nickvergessen $
* @copyright (c) 2007 nickvergessen nickvergessen@gmx.de http://www.flying-bits.org
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

// Give admins the easy opertunity to move the gallery beside the forum (root-path example: "photos/../forum/")
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';

?>