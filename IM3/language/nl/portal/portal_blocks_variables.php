<?php
/**
*
* portal_blocks_variables [Nederlands]
*
* @package language
* @version $Id: portal_blocks_variables.php 297 2008-12-30 18:40:30Z JohnnyTheOne $
* @updated 12 November 2008
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
//
// Some characters you may want to copy&paste:
// ’ » “ ”
//


// Portal Menu Names + add you menu language variables here! //
$lang = array_merge($lang, array(
	'ACP'					=> 'Beheer CP',
	'ALBUM'					=> 'Album',
	'BOOKMARKS'				=> 'Bladwijzers',
	'CATEGORIES'			=> 'Categorie&euml;n',
	'SGP_Blog'				=> 'SGP Geintegreerde Blog',
	'DOWNLOADS'				=> 'Downloads',
	'FORUM'					=> 'Forum',
	'KB'					=> 'Kennis Bank',
	'LINKS'					=> 'Links',
	'MEMBERS'				=> 'Leden',
	'PORTAL'				=> 'Portaal',
	'HOME'					=> 'Home',
	'RATINGS'				=> 'Meest recente beoordelingen',
	'REFRESH_ALL'			=> 'Alles vernieuwen',
	'RULES'					=> 'Portaal Regels',
	'SITE_NAVIGATOR'		=> 'Navigatie',
	'STATISTICS'			=> 'Statistieken',
	'SITE_RULES'			=> 'Site Regels',
	'SITE_STATISTICS'		=> 'Site Statistieken',
	'STAFF'					=> 'Team',
	'STYLES_DEMO'			=> 'Stijl Demo',
	'STYLE_SELECT'			=> 'Selecteer Stijl',
	'UCP'					=> 'Gebruiker CP',
	'UNRESOLVED/BUGS'		=> 'Onopgeloste/Bugs',
	'UPLOAD'				=> 'Upload Plaatjes',
	'USER_INFORMATION'		=> 'Gebruiker Informatie',
	'WELCOME'				=> 'Welkom',
));

// Portal Block Names + add your block name language variables here! //
$lang = array_merge($lang, array(
	'ACP_SMALL'				=> 'Beheer CP',
	'ANNOUNCEMENTS'			=> 'Aankondigingen',
	'BIRTHDAY'				=> 'Verjaardag',
	'BLOG'					=> 'SGP Geintegreerde Blog',
	'BOARD_MINI_NAV'		=> 'Sub Menu',
	'BOARD_STYLE'			=> 'Board Stijl',
	'BOARD_NAV'				=> 'Board Navigatie',
	'BOT_TRACKER'			=> 'Bot Tracering',
	'BOT_TRACKER_SMALL'		=> 'Bot Tracering',
	'BOOKS' 				=> 'Boeken',
	'CALENDAR'				=> 'Kalender',
	'CHAT'					=> 'Chat',
	'CLOCK'					=> 'Klok',
	'DOWNLOADS'				=> 'Downloads',
	'FM_RADIO'				=> 'FM Radio',
	'FORUM_CATEGORIES'		=> 'Forum Categorie&euml;n',
	'GALLERY'				=> 'Gallerij',
	'LINKS'					=> 'Links',
	'MAIN_MENU'				=> 'Board Navigatie',
	'MEMBERS'				=> 'Leden',
	'MP3_PLAYER'			=> 'Mp3 speler',
	'NEWS'					=> 'Nieuws',
	'NEWS_REPORT'			=> 'Site Nieuws Rapport',
	'PORTAL'				=> 'Portaal',
	'PORTAL_STATUS'			=> 'Portaal Status',
	'RECENT_TOPICS'			=> 'Recente onderwerpen',
	'SELECT_STYLE'			=> 'Selecteer een nieuwe stijl',
	'SITE_LINK_TXT'			=> 'Link naar ons',
	'STAFF'					=> 'Team',
	'STATISTICS'			=> 'Statistieken',
	'STATS'		 			=> 'Statistieken',
	'STYLE_STATUS'			=> 'Stijlen Status',
	'SUB_MENU'				=> 'Sub Menu',
	'TOP_10_PICS'			=> 'Top 10 afbeeldingen',
	'TOP_DOWNLOADS'			=> 'Top Downloads',
	'TOP_POSTERS'			=> 'Top Plaatsers',
	'UNRESOLVED'			=> 'Onopgelost',
	'UCP'					=> 'Gebruiker CP',
	'USER_INFO'				=> 'Gebruiker Informatie',
	'WELCOME_SITE'			=> 'Welkom bij %s',
	'YOUR_PROFILE'			=> 'Gebruiker profiel',
	'CLOUD9_LINKS'		=> 'Cloud9 Links',
	'CLOUD9_SEARCHES'	=> 'Cloud9 Searches',

	'NO_BLOCKD_IN_DEVEOPMENT' => 'Geen blocken in ontwikkeling!',
));

// Block Names
$lang = array_merge($lang, array(
	'ADMIN_OPTIONS'				=> 'Admin Opties',
	'BUG_TRACKER'				=> 'Bug Tracker',
	'TRANSLATE'					=> 'Vertaal',
	'TRANSLATE_SITE'			=> '<strong>Vertaal site naar...</strong>',
	'TRANSLATE_RESET'			=> '<strong>Terug naar oorspronkelijke taal</strong>',
	'ANNOUNCEMENTS_AND_NEWS' 	=> 'Aankondigingen en Nieuws',
));

// Acronyms
$lang = array_merge($lang, array(
	'ACRONYMS'					=> 'Acroniemen',
	'ALLOW_ACRONYMS'			=> 'Verwerk acroniemen in berichten',
	'ALLOW_ACRONYMS_EXPLAIN' 	=> 'Acroniemen in berichten toestaan',
));

// IRC Channel(s)
$lang = array_merge($lang, array(
	'IRC'				=> 'IRC',
	'IRC_POPUP'			=> 'Popup IRC Kanaal',
	'SIGNED_OFF'		=> 'Afgemeld',
	'NO_JAVA_SUP'		=> 'Geen java ondersteuning',
	'NO_JAVA_VER'		=> 'Jammer, maar u moet een browser met ingeschakelde Java 1.4.x gebruiken voor PJIRC',	
));

// Age ranges
$lang = array_merge($lang, array(
	'AGE_RANGE'					=> 'Leeftijds groep',
	'AVERAGE_AGE'				=> 'Gemiddelde leeftijd',
	'COUNT'						=> 'Teller',
	'NONE'						=> 'Niet gevonden.',
	'PERCENT'					=> 'Procent',
	'TOTAL_AGE'					=> 'Totale leeftijd',
	'TOTAL_AGE_COUNTS'			=> 'Totale leeftijd',
	'YEARS'						=> 'jaren.',
));

// RSS Newsfeeds
$lang = array_merge($lang, array(
	'NO_CURL'					=> 'curl niet ge�nstalleerd. Gebruik in plaats daarvan fopen (wijzigen in ACP)',
	'NO_FOPEN'					=> 'fopen niet ge�nstalleerd. Gebruik in plaats daarvan curl (wijzigen in ACP)',
	'RSS_CACHE_ERROR'			=> 'Sorry, geen RSS objecten gevonden in het cachebestand.',
	'RSS_FEED_ERROR'			=> 'Of er is iets mis met RSS-kanaal.',
	'RSS_LIST_ERROR'			=> 'Kan de RSS-lijst niet opvragen.',
	'RSS_ERROR'					=> 'RSS Fout - Feed koppeling controleren (boven) om te bevestigen.',
));

// HTTP Referers
$lang = array_merge($lang, array(
	'TOT_REF'					=> 'Totaal Referers',
	'LIMITS'					=> 'Grenzen',
	'SHOWN'						=> 'getoond.',
));

// Mini Mods
$lang = array_merge($lang, array(
	'VERSION'			=> 'Versie',
	'CHECK_VERSION'		=> 'Controleren voor updates',
));
?>