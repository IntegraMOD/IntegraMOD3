<?php
/**
*
* @package phpBB3
* @version $Id: faq.php 9961 2009-08-12 10:30:37Z Kellanved $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();
// Stargate Portal
if(STARGATE)
{
	global $k_config, $k_blocks;

	$user->setup('portal/portal');
	$user->add_lang('portal/portal');

	include_once($phpbb_root_path . 'includes/sgp_functions.'. $phpEx );
	include_once($phpbb_root_path . 'includes/functions_display.'. $phpEx );

	if($k_config['display_blocks_global'])
	{
		include_once($phpbb_root_path . 'includes/portal_blocks.' . $phpEx);
	}
}
// Stargate Portal

$mode = request_var('mode', '');

// Load the appropriate faq file
switch ($mode)
{
	case 'bbcode':
		$l_title = $user->lang['BBCODE_GUIDE'];
		$user->add_lang('bbcode', false, true);
	break;

	default:
		$l_title = $user->lang['FAQ_EXPLAIN'];
		$user->add_lang('faq', false, true);
	break;
}

// Pull the array data from the lang pack
$switch_column = $found_switch = false;
$help_blocks = array();
foreach ($user->help as $help_ary)
{
	if ($help_ary[0] == '--')
	{
		if ($help_ary[1] == '--')
		{
			$switch_column = true;
			$found_switch = true;
			continue;
		}

		$template->assign_block_vars('faq_block', array(
			'BLOCK_TITLE'		=> $help_ary[1],
			'SWITCH_COLUMN'		=> $switch_column,
		));

		if ($switch_column)
		{
			$switch_column = false;
		}
		continue;
	}

	$template->assign_block_vars('faq_block.faq_row', array(
		'FAQ_QUESTION'		=> $help_ary[0],
		'FAQ_ANSWER'		=> $help_ary[1])
	);
}

// Lets build a page ...
$template->assign_vars(array(
	'L_FAQ_TITLE'				=> $l_title,
	'L_BACK_TO_TOP'				=> $user->lang['BACK_TO_TOP'],

	'SWITCH_COLUMN_MANUALLY'	=> (!$found_switch) ? true : false,
));

page_header($l_title, false);

$template->set_filenames(array(
	'body' => 'faq_body.html')
);
make_jumpbox(append_sid("{$phpbb_root_path}viewforum.$phpEx"));

page_footer();

?>