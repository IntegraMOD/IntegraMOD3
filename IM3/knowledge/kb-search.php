<?php
/** 
*
* @author Tobi Schaefer http://www.tas2580.de/
*
* @package Knowledge_Base
* @version $Id: kb-search.php, v 0.2.12 2009/06/06 20:21:36 tas2580 Exp $
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


// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup(array('search', 'mods/kb'));

$q = $db->sql_escape(request_var('q', '', true));
$submit = (isset($_GET['submit'])) ? true : false;

// Search results page
if ($submit == true)
{
	$start	= request_var('start', 0);
	$terms	= request_var('terms', '');

	//Build the search querry
	$tid = request_var('tid', array(0));
	$find_in_type = '';
	foreach ($tid as $in_type)
	{
		$find_in_type .= (int) $in_type . ',';
	}

	$cid = request_var('cid', array(0));
	$find_in_cat = '';
	foreach ($cid as $in_cat)
	{
		$find_in_cat .= (int) $in_cat . ',';
	}

	$search_where = "activ = '1' AND ";
	$term = $highlight = '';
	$split = explode(' ', $q);
	foreach ($split as $seachword)
	{
		$search_where .= $term . "(titel LIKE '%$seachword%' OR article LIKE '%$seachword%' OR description LIKE '%$seachword%') ";
		$term = ($terms == 'all') ? 'AND ' : 'OR ';
		$highlight .= $seachword . '+';
	}

	if ($find_in_type != '')
	{
		$search_where .= 'AND type_id IN (' . $find_in_type .'0)';
	}
	if ($find_in_cat != '')
	{
		$search_where .= 'AND cat_id IN (' . $find_in_cat .'0)';
	}

	// Categories
	$sql = 'SELECT cat_title, cat_id 
		FROM ' . KB_CATEGORIE_TABLE . '
		ORDER BY cat_title';
	$result = $db->sql_query($sql, $kb_config['cache_time']);
	while ($row = $db->sql_fetchrow($result))
	{
		$cat[$row['cat_id']] =  $row['cat_title'];
	}
	$db->sql_freeresult($result);

	// Search
	$sql = 'SELECT COUNT(article_id) AS total_articles
		FROM ' . KB_ARTICLE_TABLE . "
		WHERE " . $search_where;
	$result = $db->sql_query($sql, $kb_config['cache_time']);
	$total_articles = (int) $db->sql_fetchfield('total_articles');

	$sql = 'SELECT description, titel, article_id, cat_id, page_uri
		FROM ' . KB_ARTICLE_TABLE . "
		WHERE " . $search_where . "
		ORDER BY hits DESC, post_time DESC, titel DESC";
	$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);
	
	while ($row = $db->sql_fetchrow($result))
	{
		$template->assign_block_vars('result', array(
			'U_ARTICLE'		=> article_link($row['article_id'], $row['page_uri']),
			'TITLE'			=> $row['titel'],
			'DESCRIPTION'	=> $row['description'],
			'CAT' 			=> $cat[$row['cat_id']],
			'U_CATEGORIE'	=> (KB_SEO == true) ? append_sid("{$kb_root_path}categorie-" . $row['cat_id'] . '.html') : append_sid("{$kb_root_path}kb_categorie.$phpEx", 'id=' . $row['cat_id'])
			)
		);
		$found_something = true;
	}
	if (!isset($found_something))
	{
		$template->assign_vars(array(
			'RESULT_MESSAGE'	=> $user->lang['NO_SEARCH_RESULTS'],
		));
	}
	$db->sql_freeresult($result);

	$template->assign_vars(array(
		'U_MCP'			=> ($auth->acl_get('m_activate_kb') || $auth->acl_get('m_report_kb') || $auth->acl_get('m_log_kb')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=kb&amp;mode=kb_main') : '',
		'U_ACTION'		=> append_sid("{$kb_root_path}kb-search.$phpEx"),
		'NOFORUMNAV'	=> true,
		'PAGINATION'	=> generate_pagination("kb-search.$phpEx?q=" . $q . '&amp;submit=true', $total_articles, $config['topics_per_page'], $start),
		'PAGE_NUMBER'	=> on_page($total_articles, $config['topics_per_page'], $start),
		'SEARCH_TITLE'	=> sprintf($user->lang['FOUND_SEARCH_MATCHES'], $total_articles),
		'KEYWORD'		=> $q)
	);

	$template->assign_block_vars('navlinks', array(
		'U_VIEW_FORUM'	=> append_sid("{$kb_root_path}"),
		'FORUM_NAME'	=> $user->lang['KBASE'])
	);

	// Output page
	page_header($user->lang['KBASE']);

	$template->set_filenames(array(
		'body' => 'kb/kb_search.html')
	);
}

// Search query page
else
{
	$template->assign_vars(array(
		'U_MCP'				=> ($auth->acl_get('m_activate_kb') || $auth->acl_get('m_report_kb') || $auth->acl_get('m_log_kb')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=kb&amp;mode=kb_main') : '',
		'TYPE_OPTION'		=> make_type_list(),
		'NOFORUMNAV'		=> true,
		'S_ARTICLE_TYPES'	=> ($kb_config['activ_types'] == 1 ) ? true : false,
		'CAT_OPTION'		=> make_cat_select(0, 0))
	);

	$template->assign_block_vars('navlinks', array(
		'U_VIEW_FORUM'	=> append_sid("{$kb_root_path}"),
		'FORUM_NAME'	=> $user->lang['KBASE'])
	);
	// Output page
	page_header($user->lang['KBASE']);

	$template->set_filenames(array(
		'body' => 'kb/kb_searchform.html')
	);

}
page_footer();

?>
