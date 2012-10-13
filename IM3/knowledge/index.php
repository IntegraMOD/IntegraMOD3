<?php
/** 
*
* @author Tobi Schaefer http://www.tas2580.de/
*
* @package Knowledge_Base
* @version $Id: index.php, v 0.2.12 2009/06/06 20:21:36 tas2580 Exp $
* @copyright (c) 2007 SEO phpBB http://www.phpbb-seo.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/functions_kb.' . $phpEx);
include('kb_common.' . $phpEx);

$mode	= request_var('mode', '');

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/kb');

//delete
if ($mode =='delete' && ($auth->acl_get('u_del_kb') || $auth->acl_get('m_del_kb')))
{
	$id	= request_var('id', 0);
	if(delete_article($id))
	{
		trigger_error($user->lang['ARTICLE_DELETED'] . '<br /><br />' . sprintf($user->lang['BACK_TO_KB'], '<a href="' . append_sid("{$kb_root_path}") . '">', '</a>'));
	}
}

$data = make_categorie_list(0);

$user->lang['TRANSLATION_INFO'] = $user->lang['KB_COPYRIGHT'] . '<br />' . $user->lang['TRANSLATION_INFO'];  

// Assign index specific vars
$template->assign_vars(array(
	'S_LOGIN_ACTION'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'U_ADD_ARTICLE'			=> append_sid("{$kb_root_path}kbposting.$phpEx"),
	'U_ACTION'				=> append_sid("{$kb_root_path}kb-search.$phpEx"),
	'U_MODERATE'			=> append_sid("{$kb_root_path}kb_mcp.$phpEx"),
	'U_NEWEST_ARTICLE'		=> isset($config['kb_newest_title']) ? article_link($config['kb_newest_id'], $config['kb_newest_uri']) : '',
	'S_ACTIVATE_ARTICLE'	=> $auth->acl_get('u_activate_kb'),
	'S_ADD_ARTICLE'			=> $auth->acl_get('u_add_kb'),
	'COUNT_ARTICLE'			=> $config['num_kb_article'],
	'CONT_CATS'				=> $data['count_cats'],
	'NEWEST_ARTICLE'		=> isset($config['kb_newest_title']) ? $config['kb_newest_title'] : '',
	'KB_TITLE'				=> $kb_config['kb_title'],
	'KB_DESCRIPTION'		=> $kb_config['kb_description'],
	'CLASSIC_INDEX'			=> $kb_config['kb_mode'],
	'U_MCP'					=> ($auth->acl_get('m_activate_kb') || $auth->acl_get('m_report_kb') || $auth->acl_get('m_log_kb')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=kb&amp;mode=kb_main') : '',
	'NOFORUMNAV'			=> true,
	)
);

$template->assign_block_vars('navlinks', array(
	'U_VIEW_FORUM'	=> append_sid("{$kb_root_path}"),
	'FORUM_NAME'	=> $user->lang['KBASE'])
);

// Output page
page_header($user->lang['KBASE']);

$template->set_filenames(array(
	'body' => 'kb/kb_index.html')
);

page_footer();

?>
