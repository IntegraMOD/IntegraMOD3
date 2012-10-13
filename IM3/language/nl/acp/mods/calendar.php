<?php
/**
*
* calendar [Nederlands]
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
	'ACP_CALENDAR_SETTINGS'					=> 'Instellingen Kalender ',
	'ACP_CALENDAR_SETTINGS_EXPLAIN'			=> 'Hier kunt u algemene instellingen voor de Kalender definiëren.<br />Sommige opties zijn ook voor de gebruikers beschikbaar, op per gebruiker-basis. Gebruiker\'s instellingen kunnen echter overschreven worden',
	'ACP_CALENDAR_USER_SETTINGS'			=> 'Kalender Gebruiker Instellingen',
	'ACP_CALENDAR_USER_SETTINGS_EXPLAIN'	=> 'Hier kunnen gebruiker\'s instellingen beheerd worden',
	'OVERRIDE_USER'							=> 'Overschrijven Gebruiker\'s Instellingen',
	'OVERRIDE_USER_EXPLAIN'					=> 'Beheer of gebruikers zelf instellingen kunnen aanpassen of dat beheerder\'s instellingen gebruikt moeten worden',
	'ALLOW_INDEX_MINICAL'					=> 'Allow MiniCal on Index',
	'ALLOW_INDEX_MINICAL_EXPLAIN'			=> 'Enable, or disable the minical on the index page',
	'ALLOW_PRIV_EVENTS'						=> 'Priv&#233; Evenementen Toestaan',
	'ALLOW_PRIV_EVENTS_EXPLAIN'				=> 'Priv&#233; Evenementen kunnen alleen bekeken worden door anderen wanneer deze door de evenement poster zijn gespecificeerd',
	'SHOW_WEEK_NUMS'						=> 'Week Nummers Tonen',
	'SHOW_WEEK_NUMS_EXPLAIN'				=> 'ISO-8601 Week nummers kunnen optioneel worden weer gegeven in het hoofd Kalender aanzicht',
	'MONDAY_FIRST'							=> 'Kalender Eerste Weekdag',
	'MONDAY_FIRST_EXPLAIN'					=> 'Geef eerste kalender weekdag weer als Zondag of Maandag',
	'SHOW_EVENTS_LIST'						=> 'Evenementen Lijst Tonen',
	'SHOW_EVENTS_LIST_EXPLAIN'				=> 'Optioneel een lijst met komende evenementen onder hoofd aanzicht van kalender tonen. Het aantal dagen van toekomstige evenementen tonen kan gedefiniëerd worden',
	'SHOW_BIRTHDAYS_LIST'					=> 'Verjaardagen Lijst Tonen',
	'SHOW_BIRTHDAYS_LIST_EXPLAIN'			=> 'Optioneel een lijst met komende verjaardagen onder hoofd aanzicht van kalender tonen. Het aantal dagen van komende verjaardagen tonen kan gedefiniëerd worden',
	'SHOW_BIRTHDAYS_MAIN'					=> 'Verjaardagen in Kalender Tonen',
	'SHOW_BIRTHDAYS_MAIN_EXPLAIN'			=> 'Optioneel verjaardagen in hoofd aanzicht van kalender tonen',
	'MAX_EVENTS_LIST_DAYS'					=> 'Maximaal Aantal Dagen in Evenementen Lijst',
	'MAX_EVENTS_LIST_DAYS_EXPLAIN'			=> 'Specificeer hat maximaal aantal dagen dat een gebruiker kan instellen voor weergave van komende evenementen in de evenementen lijst onder het hoofd aanzicht van kalender',
	'DEFAULT_EVENTS_LIST_DAYS'				=> 'Standaard Aantal Dagen Voor Evenementen Lijst',
	'DEFAULT_EVENTS_LIST_DAYS_EXPLAIN'		=> 'Definieer de standaard instelling voor hoeveel dagen van komende evenementen oder de evenementen lijst in het hoofd aanzicht van kalender getoon wordt',
	'MAX_BDAYS_LIST_DAYS'					=> 'Maximaal Aantal Dagen in Verjaardagen Lijst',
	'MAX_BDAYS_LIST_DAYS_EXPLAIN'			=> 'Specificeer het maximaal aantal dagen dat een gebruiker kan instellen voor weergave van komende verjaardagen in de evenementen lijst onder het hoofd aanzicht van kalender',
	'DEFAULT_BDAYS_LIST_DAYS'				=> 'Standaard Aantal Dagen Voor Verjaardagen Lijst',
	'DEFAULT_BDAYS_LIST_DAYS_EXPLAIN'		=> 'Definieer de standaard instelling voor hoeveel dagen van komende verjaardagen onder de evenementen lijst in het hoofd aanzicht van kalender getoond wordt',
	'CALENDAR_VERSION'						=> 'Kalender Versie',
	'CALENDAR_VERSION_EXPLAIN'				=> 'Huidig geïnstalleerde versie van de Kalender Mod',

	'SUNDAY'								=> 'Zondag',
	'MONDAY'								=> 'Maandag',


));

?>