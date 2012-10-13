<?php
/**
*
* k_quick_posting [Nederlands]
*
* @package language
* @version $Id: k_quick_posting.php 297 2008-12-30 18:40:30Z JohnnyTheOne $
* @copyright (c) 2005 phpbbireland
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'FLASH_IS_OFF'	=> '[flash] is <em>UIT</em>',
	'FLASH_IS_ON'	=> '[flash] is <em>AAN</em>',
	'FLOOD_ERROR'	=> 'Je kunt niet zo snel na elkaar een bericht plaatsen.',
	'FONT_COLOR'	=> 'Lettertyp kleur',
	'FONT_HUGE'		=> 'Extra groot',
	'FONT_LARGE'	=> 'Groot',
	'FONT_NORMAL'	=> 'Normaal',
	'FONT_SIZE'		=> 'Lettergrootte',
	'FONT_SMALL'	=> 'Klein',
	'FONT_TINY'		=> 'Extra klein',
	'MORE_SMILIES'	=> 'Bekijk meer smilies',
	'SMILIES'		=> 'Smilies',
));

?>