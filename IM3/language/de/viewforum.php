<?php
/**
*
* viewforum [Deutsch — Du]
*
* @package language
* @version $Id: viewforum.php 191 2007-05-17 15:04:21Z philipp $
* @copyright (c) 2005 phpBB Group; 2006 phpBB.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* (http://www.phpbb.de/go/3/uebersetzer)
* Frank Doerr, Ingo Köhler, Fabian Koglin, Philipp Kordowich, Ingo Migliarina, Martin Rauscher
* Ehemalige Mitglieder: Dirk Gaffke
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

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
	'ACTIVE_TOPICS'			=> 'Aktive Themen',
	'ANNOUNCEMENTS'			=> 'Bekanntmachungen',

	'FORUM_PERMISSIONS'		=> 'Berechtigungen in diesem Forum',

	'ICON_ANNOUNCEMENT'		=> 'Bekanntmachung',
	'ICON_STICKY'			=> 'Wichtig',

	'LOGIN_NOTIFY_FORUM'	=> 'Du wurdest über ein neues Thema in diesem Forum informiert. Bitte melde dich an, um es anzusehen.',

	'MARK_TOPICS_READ'		=> 'Themen als gelesen markieren',

	'NEW_POSTS_HOT'			=> 'Neue Beiträge [ beliebt ]',
	'NEW_POSTS_LOCKED'		=> 'Neue Beiträge [ gesperrt ]',
	'NO_NEW_POSTS_HOT'		=> 'Keine neuen Beiträge [ beliebt ]',
	'NO_NEW_POSTS_LOCKED'	=> 'Keine neuen Beiträge [ gesperrt ]',
	'NO_READ_ACCESS'		=> 'Du hast keine ausreichenden Rechte, um Themen in diesem Forum zu lesen.',

	'POST_FORUM_LOCKED'		=> 'Das Forum ist gesperrt',

	'TOPICS_MARKED'			=> 'Die Themen in diesem Forum wurden als gelesen markiert.',

	'VIEW_FORUM'			=> 'Forum anzeigen',
	'VIEW_FORUM_TOPIC'		=> '1 Thema',
	'VIEW_FORUM_TOPICS'		=> '%d Themen',
));

?>