<?php
/**
*
* @name center_shout.php
* @package phpBB3 Portal XL 5.0
* @version $Id: center_shout.php,v 1.4 2008/01/25 16:54:34 damysterious Exp $
*
* @copyright (c) 2007, 2008  Portal XL Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
*/
if (!function_exists('as_display'))
{
	include($phpbb_root_path . 'includes/functions_shoutbox.' . $phpEx);
}

/*
* Start session management
*/
$user->setup('mods/shout');

/*
* Begin block script here
*/
as_display();

// Set the filename of the template you want to use for this file.
$template->set_filenames(array(
    'body' => 'portal/block/center_shout.html',
	));

?>