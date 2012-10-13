<?php

/** 
*
* @mod package		Download Mod 6
* @file				dl_help.php v 1.0 2008/04/07 OXPUS
* @copyright		(c) 2005 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* connect to phpBB
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

/*
* session management
*/
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/dl_help', $user->data['user_style']);

// Stargate Portal
if(STARGATE)
{
	$user->add_lang('portal/portal');
	include_once($phpbb_root_path . 'includes/sgp_functions.'. $phpEx );
	include_once($phpbb_root_path . 'includes/portal_blocks.' . $phpEx);
}
// Stargate Portal

$help_key = request_var('help_key', '');

//
// Pull all user config data
//
if ($help_key && $user->lang['HELP_'.$help_key])
{
	$help_string = $user->lang['HELP_'.$help_key];
}
else
{
	$help_string = $user->lang['DL_NO_HELP_AVIABLE'];
}

$template->assign_vars(array(
	'L_CLOSE' => $user->lang['CLOSE_WINDOW'],

	'HELP_TITLE' => $user->lang['HELP_TITLE'],
	'HELP_OPTION' => $user->lang[$help_key],
	'HELP_STRING' => $help_string)
);

page_header($user->lang['HELP_TITLE'], false);

$template->set_filenames(array(
	'body' => 'dl_mod/dl_help_body.html')
);

page_footer();

?>