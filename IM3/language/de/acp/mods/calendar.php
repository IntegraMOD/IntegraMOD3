<?php
/**
*
* acp_calendar [Deutsch — Du]
*
* @package language
* @version $Id: calendar.php 2008-07-27 23:16:00Z livewirestu $
* @copyright (c) 2008 phpbbireland
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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

// Board Settings
$lang = array_merge($lang, array(
	'ACP_CALENDAR_SETTINGS'					=> 'Kalender Einstellungen',
	'ACP_CALENDAR_SETTINGS_EXPLAIN'			=> 'Hier kannst du die Einstellungen für den Kalender definieren.<br />Some of these options will be available to users also, on a per user basis. However, you have the option of overriding user\'s settings',
	'ACP_CALENDAR_USER_SETTINGS'			=> 'Kalender Benutzer-Einstellungen',
	'ACP_CALENDAR_USER_SETTINGS_EXPLAIN'	=> 'Hier kannst du die Benutzer-Einstellungen für den Kalender verwalten.',
	'OVERRIDE_USER'							=> 'Benutzer-Einstellungen überschreiben',
	'OVERRIDE_USER_EXPLAIN'					=> 'Du kannst allen Benutzern die Einstellungen vorgeben oder sie selbst die Einstellungen anpassen lassen',
	'ALLOW_PRIV_EVENTS'						=> 'Private Termine erlauben',
	'ALLOW_PRIV_EVENTS_EXPLAIN'				=> 'Private Termine können von anderen als den vom Ersteller bestimmten Benutzern nicht gesehen werden',
	'SHOW_WEEK_NUMS'						=> 'Zeige Kalenderwoche',
	'SHOW_WEEK_NUMS_EXPLAIN'				=> 'Du kannst die Kalenderwochen gemäß ISO-8601 im Kalender anzeigen lassen',
	'MONDAY_FIRST'							=> 'Wochenbeginn',
	'MONDAY_FIRST_EXPLAIN'					=> 'Die angezeigten Kalenderwochen beginnen Sonntag oder Montag',
	'SHOW_EVENTS_LIST'						=> 'Zeige Terminliste',
	'SHOW_EVENTS_LIST_EXPLAIN'				=> 'Du kannst eine Liste bevorstehender Termine unter dem Kalender anzeigen lassen. Du kannst festlegen, wie viele Tage im voraus Termine angezeigt werden sollen',
	'SHOW_BIRTHDAYS_LIST'					=> 'Zeige Geburtstagsliste',
	'SHOW_BIRTHDAYS_LIST_EXPLAIN'			=> 'Du kannst eine Liste bevorstehender Geburtstage unter dem Kalender anzeigen lassen. Du kannst festlegen, wie viele Tage im voraus Geburtstage angezeigt werden sollen',
	'SHOW_BIRTHDAYS_MAIN'					=> 'Zeige Geburtstage im Kalender',
	'SHOW_BIRTHDAYS_MAIN_EXPLAIN'			=> 'Geburtstage werden in der Hauptsansicht des Kalenders angezeigt',
	'MAX_EVENTS_LIST_DAYS'					=> 'maximale Tage für Terminliste',
	'MAX_EVENTS_LIST_DAYS_EXPLAIN'			=> 'Lege das Maximum an Tagen fest, die ein Benutzer für die Anzeige bevorstehender Termine unter dem Kalender einstellen kann',
	'DEFAULT_EVENTS_LIST_DAYS'				=> 'Tage für Terminliste (standard)',
	'DEFAULT_EVENTS_LIST_DAYS_EXPLAIN'		=> 'Lege die Standardeinstellung fest, wie viele Tage im voraus Termine unter dem Kalender angezeigt werden sollen',
	'MAX_BDAYS_LIST_DAYS'					=> 'maximale Tage für Geburtstagsliste',
	'MAX_BDAYS_LIST_DAYS_EXPLAIN'			=> 'Lege das Maximum an Tagen fest, die ein Benutzer für die Anzeige bevorstehender Geburtstage unter dem Kalender einstellen kann',
	'DEFAULT_BDAYS_LIST_DAYS'				=> 'Tage für Geburtstagsliste (standard)',
	'DEFAULT_BDAYS_LIST_DAYS_EXPLAIN'		=> 'Lege die Standardeinstellung fest, wie viele Tage im voraus Geburtstage unter dem Kalender angezeigt werden sollen',
	'CALENDAR_VERSION'						=> 'Kalender-Version',
	'CALENDAR_VERSION_EXPLAIN'				=> 'Die derzeit installierte Version des Kalender Mod',
	
	'SUNDAY'								=> 'Sonntag',
	'MONDAY'								=> 'Montag',	
	
	
));

?>