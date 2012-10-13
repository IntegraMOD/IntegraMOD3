<?php
/**
*
* memberlist [Nederlands]
*
* @package language
* @version $Id: memberlist.php 9933 2009-08-06 09:12:21Z marshalrusty $
* @copyright (c) 2005 phpBB Group
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

$lang = array_merge($lang, array(
	'ABOUT_USER'			=> 'Profiel',
	'ACTIVE_IN_FORUM'		=> 'Meest actieve forum',
	'ACTIVE_IN_TOPIC'		=> 'Meest actieve onderwerp',
	'ADD_FOE'				=> 'Vijand Toevoegen',
	'ADD_FRIEND'			=> 'Vriend Toevoegen',
	'AFTER'					=> 'Na',

	'ALL'					=> 'Alles',

	'BEFORE'				=> 'Voor',

	'CC_EMAIL'				=> 'Stuur een kopie van deze e-mail naar jezelf.',
	'CONTACT_USER'			=> 'Contact',

	'DEST_LANG'				=> 'Taal',
	'DEST_LANG_EXPLAIN'		=> 'Selecteer een geschikte taal (indien beschikbaar) voor de ontvanger van dit bericht.',

	'EMAIL_BODY_EXPLAIN'	=> 'Dit bericht wordt verstuurd in platte tekst, gebruik dan ook geen enkele HTML of BBCode. Het terugstuur adres voor dit bericht wordt opgeslagen als je e-mailadres.',
	'EMAIL_DISABLED'		=> 'Sorry, maar alle e-mail gerelateerde functies zijn uitgeschakeld.',
	'EMAIL_SENT'			=> 'De e-mail is verzonden.',
	'EMAIL_TOPIC_EXPLAIN'	=> 'Dit bericht wordt verstuurd in platte tekst, gebruik dan ook geen enkele HTML of BBCode. Houd in de gaten dat de onderwerpinformatie al is toegevoegd aan het bericht. Het terugstuur adres voor dit bericht wordt opgeslagen als je e-mailadres.',
	'EMPTY_ADDRESS_EMAIL'	=> 'Je moet een geldig ontvanger e-mailadres invoeren.',
	'EMPTY_MESSAGE_EMAIL'	=> 'Je moet een bericht invoeren om het te kunnen versturen.',
	'EMPTY_MESSAGE_IM'		=> 'Je moet een bericht invoeren om het te kunnen versturen.',
	'EMPTY_NAME_EMAIL'		=> 'Je moet de echte naam van de ontvanger invoeren.',
	'EMPTY_SUBJECT_EMAIL'	=> 'Je moet een e-mail onderwerp specificeren.',
	'EQUAL_TO'				=> 'Gelijk aan',

	'FIND_USERNAME_EXPLAIN'	=> 'Gebruik dit formulier om een specifieke gebruiker te zoeken. Je hoeft niet alle velden in te vullen. Gebruik de * als een joker voor ontbrekende tekens of voor tekens die je niet weet. Als je een datum wilt invullen gebruik dan het formaat jjjj-mm-dd, b.v. 2007-11-25. Gebruik de checkboxen om een of meerdere gebruikersnamen te selecteren (aantal gebruikers worden geaccepteerd door het formulier zelf) en klik op de selecteer gemarkeerde button om terug te keren naar het vorige formulier.',
	'FLOOD_EMAIL_LIMIT'		=> 'Je kunt op dit moment niet nog een e-mail versturen. Probeer het later nog eens.',

	'GROUP_LEADER'			=> 'Groep leider',

	'HIDE_MEMBER_SEARCH'	=> 'Verberg gebruiker zoekopdarcht',

	'IM_ADD_CONTACT'		=> 'Contact toevoegen',
	'IM_AIM'				=> 'Houd rekening mee dat je AOL Instant Messenger ge&iuml;nstalleerd moet hebben om ervan gebruik te maken',
	'IM_AIM_EXPRESS'		=> 'AIM Express',
	'IM_DOWNLOAD_APP'		=> 'Download applicatie',
	'IM_ICQ'				=> 'Houd rekening met gebruikers die je geselecteerd hebt dat ze geen ongevraagde chatberichten kunnen ontvangen.',
	'IM_JABBER'				=> 'Houd rekening met gebruikers die je geselecteerd hebt dat ze geen ongevraagde chatberichten kunnen ontvangen.',
	'IM_JABBER_SUBJECT'		=> 'Dit is een automatisch bericht, reageer er niet op! Bericht van gebruiker %1$s om %2$s',
	'IM_MESSAGE'			=> 'Jouw bericht',
	'IM_MSNM'				=> 'Houd rekening mee dat je MSN Messenger ge&iuml;nstalleerd moet hebben om deze functie te gebruiken.',
	'IM_MSNM_BROWSER'		=> 'Je browser ondersteunt dit niet.',
	'IM_MSNM_CONNECT'		=> 'Je bent niet aangemeld op MSN.\nJe moet je eerst aanmelden om verder te gaan.',
	'IM_NAME'				=> 'Jouw naam',
	'IM_NO_DATA'			=> 'Er is geen passende contactinformatie voor deze gebruiker.',
	'IM_NO_JABBER'			=> 'Sorry, direct berichten naar Jabber-gebruikers is niet ondersteunt op deze server. Je moet een Jabber-cli&euml;nt ge&iuml;nstalleerd hebben op je systeem om contact te leggen met de ontvanger hierboven.',
	'IM_RECIPIENT'			=> 'Ontvanger',
	'IM_SEND'				=> 'Verstuur bericht',
	'IM_SEND_MESSAGE'		=> 'Verstuur bericht',
	'IM_SENT_JABBER'		=> 'Je bericht naar %1$s is succesvol verstuurd.',
	'IM_USER'				=> 'Verstuur een chatbericht',

	'LAST_ACTIVE'				=> 'Laatst actief',
	'LESS_THAN'					=> 'Minder dan',
	'LIST_USER'					=> '1 gebruiker',
	'LIST_USERS'				=> '%d gebruikers',
	'LOGIN_EXPLAIN_LEADERS'		=> 'Het forum vereist dat je geregistreerd en ingelogd bent om de teamlijst te kunnen zien.',
	'LOGIN_EXPLAIN_MEMBERLIST'	=> 'Het forum vereist dat je geregistreerd en ingelogd bent om toegang te krijgen tot de gebruikerslijst.',
	'LOGIN_EXPLAIN_SEARCHUSER'	=> 'Het forum vereist dat je geregistreerd en ingelogd bent om naar gebruikers te zoeken.',
	'LOGIN_EXPLAIN_VIEWPROFILE'	=> 'Het forum vereist dat je geregistreerd en ingelogd bent om profielen te bekijken.',

	'MORE_THAN'				=> 'Meer dan',

	'NO_EMAIL'				=> 'Je bent niet bevoegd om een e-mail te versturen naar deze gebruiker.',
	'NO_VIEW_USERS'			=> 'Je bent niet bevoegd om de gebruikerslijst of profielen te bekijken.',

	'ORDER'					=> 'Volgorde',
	'OTHER'					=> 'Andere',

	'POST_IP'				=> 'Geplaatst van IP/domein',

	'RANK'					=> 'Rang',
	'REAL_NAME'				=> 'Naam ontvanger',
	'RECIPIENT'				=> 'Ontvanger',
	'REMOVE_FOE'			=> 'Verwijder vijand',
	'REMOVE_FRIEND'			=> 'Verwijder vriend',

	'SEARCH_USER_POSTS'		=> 'Zoek berichten gebruiker',
	'SELECT_MARKED'			=> 'Selecteer gemarkeerde',
	'SELECT_SORT_METHOD'	=> 'Selecteer sorteer methode',
	'SEND_AIM_MESSAGE'		=> 'Stuur AIM bericht',
	'SEND_ICQ_MESSAGE'		=> 'Stuur ICQ bericht',
	'SEND_IM'				=> 'Chatberichten',
	'SEND_JABBER_MESSAGE'	=> 'Stuur Jabber bericht',
	'SEND_MESSAGE'			=> 'Stuur bericht',
	'SEND_MSNM_MESSAGE'		=> 'Stuur MSN bericht',
	'SEND_YIM_MESSAGE'		=> 'Stuur YIM bericht',
	'SORT_EMAIL'			=> 'E-mail',
	'SORT_LAST_ACTIVE'		=> 'Laatst actief',
	'SORT_POST_COUNT'		=> 'Aantal Berichten',

	'USERNAME_BEGINS_WITH'	=> 'Gebruiker naam begint met',
	'USER_ADMIN'			=> 'Gebruiker Beheer',
	'USER_BAN'				=> 'Verbannen',
	'USER_FORUM'			=> 'Gebruiker Statistieken',
	'USER_LAST_REMINDED'	=> array(
		0		=> 'Er is op dit moment geen herinnering verstuurd',
		1		=> '%1$d herinneringen verstuurd<br />» %2$s',
	),
	'USER_ONLINE'			=> 'Online',
	'USER_PRESENCE'			=> 'Forum aanwezigheid',

	'VIEWING_PROFILE'		=> 'Bekijkt profiel - %s',
	'VISITED'				=> 'Laatst bezocht',

	'WWW'					=> 'Website',
));

?>