<?php
/** 
*
* @package install
* @version $Id: install_main.php,v 1.12 2006/08/06 17:25:29 naderman Exp $
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
*/

if ( !defined('IN_INSTALL') )
{
	// Someone has tried to access the file direct. This is not a good idea, so exit
	exit;
}

if (!empty($setmodules))
{
	$module[] = array(
		'module_type'		=> 'install',
		'module_title'		=> 'INTEGRAMOD3',
		'module_filename'	=> substr(basename(__FILE__), 0, -strlen($phpEx)-1),
		'module_order'		=> -1,
		'module_subs'		=> array('WELCOME'),
		'module_stages'		=> '',
		'module_reqs'		=> ''
	);
}

/**
* Main Tab - Installation
* @package install
*/
class install_integramod3 extends module {
	function install_integramod3(&$p_master) {
		$this->p_master = &$p_master;
	}
	function main($mode, $sub) {
		global $lang, $template, $language;

		switch ($sub)
		{
			case 'welcome' :
				$title = $lang['IM_TITLE'];
				$body = $lang['IM_OVERVIEW_BODY'];
			break;

		}

		$this->tpl_name = 'install_integramod3';
		$this->page_title = $title;
		$template->assign_vars(array(
			'TITLE'		=> $title,
			'BODY'		=> $body,

			'S_LANG_SELECT'	=> '<select id="language" name="language">' . $this->p_master->inst_language_select($language) . '</select>',
		));
	}
}

?>