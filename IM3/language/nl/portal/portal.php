<?php
/**
*
* portal [Nederlands]
*
* @package language
* @version $Id: portal.php,v 1.151 29 March 2007
* @copyright (c) 2005 phpbbireland
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
//
// Some characters you may want to copy&paste:
// ’ » “ ”
//

//- stargate aka kiss portal lang definitions -//
$lang = array_merge($lang, array(
	'ACP_MINI'				=> 'Beheerder',
	'ACP_SMALL'				=> 'ACP',
	'ADVANCED_SEARCH'		=> 'Geavanceerd zoeken',
	'AUTO_LOGIN'			=> 'Auto Login',
	'BOOKMARKS'				=> 'Bladwijzers',
	'CHAT_LINK'				=> 'Online Chat',
	'COMMENTS'				=> 'Commentaar',
	'COPY_RIGHT_BOTTOM'		=> 'Ondersteuning site & partners',
	'CURRENT_STYLE'			=> 'Huidige Stijl Informatie',
	'FORUM_PORTAL'			=> 'Portaal',
	'HOME'					=> 'Home',
	'INDEX_OF_FORUMS'		=> 'Forum Index',
	'ICON_ANNOUNCEMENT'		=> 'Aankondiging',
	'ICONS_EXPLAIN'			=> 'Iconen uitgelegd',
	'FORUM_IMAGES_EXPLAIN'	=> 'Forum Iconen',
	'POST_IMAGES_EXPLAIN'	=> 'Bericht Iconen',
	'LOG_ME_IN_SHORT'		=> 'Login Onthouden',

	'MERITS'				=> 'Verdiensten',
	'MEMBER_INFO'			=> 'Leden Info',
	'MEMBERS'				=> 'Leden',

	'NO_NEWS'				=> 'Geen Nieuws Vandaag',
	'NO_MODS'				=> 'Geen mods toegewezen.',
	'NO_ADMINS'				=> 'Geen admins toegewezen.',
	'ONLINE_USERS'			=> 'Online Leden',
	'ONLINE_USERS_SHOW'		=> '[ Bekijk Online Lijst ]',
	'PORTAL'				=> 'Portaal',
	'PICTURES'				=> 'Afbeeldingen',
	'POSTED_BY'				=> 'Geplaatst door',
	'POST_COMMENTS'			=> 'Bericht commentaren',
	'PORTAL_DEVELOPMENT'	=> 'Portaal Ontwikkeling',
	'PHP_SUPPORT_SITES'		=> 'php Support Sites',
	'POSTER'				=> 'Plaatser',
	'POST_IMG'				=> 'Bericht',
	'POST_NEW_IMG'			=> 'Nieuw Bericht',
	'POST_NEW_HOT_IMG'		=> 'Nieuw Hot Bericht',
	'POST_LOCKED_IMG'		=> 'Bericht gesloten',
	'POST_REPLY' 			=> 'Plaats een antwoord',
	'PRINT_IT'				=> 'Print het',
	'PROFILE_SMALL'			=> 'UCP',
	'POST_ANNOUNCEMENT_NEW'	=> 'Nieuwe Aankondiging',
	'POST_ANNOUNCEMENT'		=> 'Aankondiging',
	'READ_ARTICLE'			=> 'Lees hele Artikel',
	'RECENT_TOPICS'			=> 'Recente onderwerpen',
	'SEARCH_OPTION'			=> 'Zoek Optie',
	'SITE_SURVEY'			=> 'Site Survey',
	'SITE_NAME'				=> 'GRAAG ZOU IK WILLEN WETEN WAAR DEZE STAAT!! phpbbireland',
	'SUBMITTED_BY'			=> 'Geplaatst door',
	'QUICK_STATISTICS'		=> 'Site Statistieken',

	'STYLE_SELECT_ALLOW' 	=> 'Stijl wijzigen toestaan',

	'SUBMIT_LINK'			=> 'Koppeling verzenden',
	'THEME_NEWS_UPDATES'	=> 'Thema Nieuws & Updates',
	'TIME'					=> 'Tijd',
	'THE_COLLECTIVE'		=> 'De collectieve',

	'TO_DAY'				=> 'Datum: %s',
	'TOPIC_MOVED'			=> 'Bericht verplaatst',
	'TIME'					=> 'Tijd %s',

	'USER_COUNTRY_FLAG'				=> 'Land Flag',
	'USER_COUNTRY_FLAG_EXPLAIN'		=> 'Volledige mod vereist <b>Locatie</b> data boven (Google Map).',
	'USER_REAL_NAME' 				=> 'Echte Naam',
	'USER_REAL_NAME_EXPLAIN'		=> 'Voornaam gebruiker',

	'VIEW_COMMENTS'				=> 'Bekijk Commentaar',
	'VIEW_FULL_ARTICLE'			=> 'Lees hele artikel',
	'UPDATING'					=> 'Verwerking...',
	'UCP_SMALL'					=> 'UCP',
	'VIEW_PREVIOUS_MONTH'		=> 'Bekijk vorige maand',
	'VIEW_NEXT_MONTH'			=> 'Bekijk volgende maand',

	'SITE_LINK_TXT_EXPLAIN'		=> 'De volgende HTML-code bevat alle benodigde gegevens voor een link naar <b>%s</b>, voeg deze gerust toe aan uw site.<br /><br />',
	'SITE_LINK_TXT_EXPLAIN2'	=> 'Deze code produceert:',
	'GOTO_TOP_IMG'				=> 'Ga naar Boven',
	'GOTO_BOTTOM_IMG' 			=> 'Ga naar Onder',
	'BOOKMARK_ON'				=> 'Bericht bladwijzer',
	'BOOKMARK_OFF'				=> 'Verwijder bladwijzer',

	'L_CLOCK'					=> 'Lokale Tijd',
	'BASIC_RULES'				=> 'Basis Regels',

	'POLL_BLOCK'				=> 'Poll Block',

	'SELECT_STYLE_EXPLAINED'	=> '<span class="green"><b>Groen</b></span> = Vrij gegeven<br /><span class="orange"><b>Oranje</b></span> = Beta Thema<br /><span class="gray"><b>Grijs</b></span> = Pre-beta Thema<br /><span class="red"><b>Rood</b></span> = Nieuw Pre-beta Team<br />',
	'SMILIES'					=> 'Smilies',
	'MESSAGE_BODY_EXPLAIN'		=> 'Type hier je bericht...',

	'BBCODE_A_HELP'				=> 'In line ge�ploade bijlage: [attachment=]bestandnaam.ext[/attachment]',
	'BBCODE_B_HELP'				=> 'Vette tekst: [b]tekst[/b]',
	'BBCODE_C_HELP'				=> 'Code tonen: [code]code[/code]',
	'BBCODE_E_HELP'				=> 'Lijst: Toevoegen lijst element',
	'BBCODE_F_HELP'				=> 'Lettertype grootte: [size=x-small]kleine tekst[/size]',
	'BBCODE_IS_OFF'				=> '%sBBCode%s is <em>UIT</em>',
	'BBCODE_IS_ON'				=> '%sBBCode%s is <em>AAN</em>',
	'BBCODE_I_HELP'				=> 'Schuine tekst: [i]tekst[/i]',
	'BBCODE_L_HELP'				=> 'Lijst: [list]tekst[/list]',
	'BBCODE_LISTITEM_HELP'		=> 'Lijst item: [*]tekst[/*]',
	'BBCODE_O_HELP'				=> 'Geordende lijst: [list=]tekst[/list]',
	'BBCODE_P_HELP'				=> 'Plaatje invoegen: [img]http://image_url[/img]',
	'BBCODE_Q_HELP'				=> 'Quote text: [quote]tekst[/quote]',
	'BBCODE_S_HELP'				=> 'Lettertype kleur: [color=red]tekst[/color]  Tip: je kunt ook color=#FF0000 gebruiken',
	'BBCODE_U_HELP'				=> 'Onderstreep tekst: [u]tekst[/u]',
	'BBCODE_W_HELP'				=> 'URL Invoegen: [url]http://url[/url] or [url=http://url]URL tekst[/url]',
	'BBCODE_D_HELP'				=> 'Flash: [flash=width,height]http://url[/flash]',

	'FLASH_IS_OFF'				=> '[flash] is <em>UIT</em>',
	'FLASH_IS_ON'				=> '[flash] is <em>AAN</em>',
	'FLOOD_ERROR'				=> 'Je kunt een nieuw bericht zo kort na de vorige niet maken.',
	'FONT_COLOR'				=> 'Lettertype kleur',
	'FONT_HUGE'					=> 'Extra groot',
	'FONT_LARGE'				=> 'Groot',
	'FONT_NORMAL'				=> 'Normaal',
	'FONT_SIZE'					=> 'Lettertype grootte',
	'FONT_SMALL'				=> 'Klein',
	'FONT_TINY'					=> 'Extra Klein',
	'LOG_ME_IN_SHORT'			=> 'Gebruik Automatische Login ',
	'HIDE_ME_SHORT'				=> 'Verberg mij deze sessie.',

	'COLOR_DARK_RED'	=> 'Donker Rood',
	'COLOR_RED'			=> 'Rood',
	'COLOR_ORANGE'		=> 'Oranje',
	'COLOR_BROWN'		=> 'Bruin',
	'COLOR_YELLOW'		=> 'Geel',
	'COLOR_GREEN'		=> 'Groen',
	'COLOR_OLIVE'		=> 'Olijf',
	'COLOR_CYAN'		=> 'Cyaan',
	'COLOR_BLUE'		=> 'Blauw',
	'COLOR_DARK_BLUE'	=> 'Donker Blauw',
	'COLOR_INDIGO'		=> 'Indigo',
	'COLOR_VIOLET'		=> 'Violet',
	'COLOR_WHITE'		=> 'Wit',
	'COLOR_BLACK'		=> 'Zwart',

	'URL' 			=> 'URL',
	'RETURN_INDEX'	=> '%sTerug naar de portaal pagina%s',
	'RETURN_PORTAL'	=> '%sTerug naar de portaal pagina%s',

	'UPLOAD_LINK'	=> 'Post Link',
	'FM_RADIO'		=> 'Popup FM Radio',
	'MP3_POPUP'		=> 'Popup speler',
	'NO_SEARCH'		=> 'Sorry je maar je hebt geen toestemming om het zoek systeem te gebruiken.',
	'FORUM_RULES'	=> 'Forum Regels',
	'ON'			=> 'aan',
	'ARRANGE_ON'	=> 'Blocks rangschikken',
	'ARRANGE_OFF'	=> 'Wijzigingen opslaan',
	'SGP_TOOLS'		=> 'Stargate hulpprogramma\'s',
	'WIDE2'			=> 'Stijl breedte (100%)',
	'NARROW2'		=> 'Stijl breedte (~70%)',


	'TOOLS_ON'		=> 'Portaal-hulpprogramma\s',
	'TOOLS_OFF'		=> 'Veranderingen opslaan',


	'UPDATED'			=> 'Bijgewerkt ',
	'NO_RECENT_TOPICS'	=> ' Er kunnen geen recente onderwerpen getoond worden',

	// NEW NEWS
	'NEWS_FLASH_LOCAL'			=> 'Lokale nieuwsflits... ',
	'NEWS_FLASH_GLOBAL'			=> 'Globale nieuwsflits... ',
	'NEWS_BREAKING'				=> 'Breaking News... ',

	'SCROLLING_BLOCKS_DISABLED' => 'Scrolling blocks  zijn uitgeschakeld bij het rangschikken van blokken',

	'NAME'				=> 'Naam',
	'AUTHOR'			=> 'Auteur',
	'INFO'				=> 'Info',
	'LINK'				=> '<img scr="./images/bbcode/link.png">',
	'TOTAL_STYLES'		=> 'Totaal beschikbare stijlen',
	'STYLE_USERS'			=> 'Stijl gebruikt door %d gebruikers%s',
	'USED_BY'			=> '%d gebruiker%s, gebruikt%s deze stijl',
	'USERS_STYLE'		=> 'Huidige Stijl',
	'PORTED_BY'			=> 'Deze stijl is geconverteerd door',
	'PORTED_BY'			=> 'Geconverteerd door',
	'MAKE_PERMANENT'	=> 'Permanent maken?',
	'STYLEREG'			=> 'Je moet ingelogt zijn om de Stijlen wisselaar te kunnen gebruiken',
	'DESIGNED_BY'		=> 'Ontworpen door',
	'EDITED'			=> 'Bewerkt*',

	'HTTP_HOST'				=> 'Host',
	'HITS'					=> 'Hits',
	'STATUS'				=> 'Voortgang',
	'STATUS_2'				=> 'voortgang balk',
	'STYLE_SELECT_DISABLED' => 'Stijl wisselaar is uitgeschakeld',
	'NO_VIEW_USERS_R'		=> 'U bent niet gemachtigd om de lijst met on line gebruikers in te zien.',
	'NO_VIEW_USERS_A'		=> 'Om de online lijst te kunnen zien moet u geregistreerd zijn en ingelogged.',

	'PORTAL_DEBUG_QUERIES'	=> 'Query\'s: %d (in cache: %d)',
	'INPROGRESS'			=> 'Wordt aan gewerkt',
	'BOARD_DEFAULT_STYLE'	=> 'Standaard Stijl',
	'STYLE'					=> 'Stijl',

	'UNDER_CONSTRUCTION'	=> "<b>The page you requested is currently under construction...</b><br /><br />Please use the 'Back' button to return to previous page.",
	'BASIC_RULES_HEADER'	=> 'Site rules.',
	'BASIC_RULES'			=>	"While the administrators and moderators of this forum will attempt to remove or edit any generally objectionable material as quickly as possible, it is impossible to review every message. Therefore you acknowledge that all posts made to these forums express the views and opinions of the author and not the administrators, moderators or webmaster (except for posts by these people) and hence will not be held liable.<br /><br />
	You agree not to post any abusive, obscene, vulgar, slanderous, hateful, threatening, sexually-oriented or any other material that may violate any applicable laws. Doing so may lead to you being immediately and permanently banned (and your service provider being informed). The IP address of all posts is recorded to aid in enforcing these conditions. You agree that the webmaster, administrator and moderators of this forum have the right to remove, edit, move or close any topic at any time should they see fit. As a user you agree to any information you have entered above being stored in a database. While this information will not be disclosed to any third party without your consent, the webmaster, administrator and moderators cannot be held responsible for any hacking attempt that may lead to the data being compromised.<br /><br />
	This forum system uses cookies to store information on your local computer. These cookies do not contain any of the information you have entered above; they serve only to improve your viewing pleasure. The e-mail address is used for confirming your registration details and password or details of new passwords should you forget your current one. Your email address may also be used to send notification of post updates should you require notification.<br /><br />
	The Rules may change from time to time. Please check back often. Administration",

	'IN_PROGRESS'			=> 'This page is under construction',
	'LINKS_FORUM'			=> 'Submit A Link',
	'LINKS_FORUM_REQU'		=> 'Post your request here... approval required',

	'NO_ANNOUNCEMENTS'		=> 'No Announcements...',
	'NO_NEWS'				=> 'No news to report...',
	'NO_UNRESOLVED'			=> 'No bugs to report...',

	//Keep bots happy
	'BLOCK_BOT_TRACKER'		=> 'Stargate Portal Bot Tracker',
	'BLOCK_CALENDAR'		=> 'Stargate Portal Calendar',
	'BLOCK_CATEGORIES'		=> 'Stargate Portal Categories',
	'BLOCK_CLOCK'			=> 'Stargate Portal Clock',
	'BLOCK_CLOUD'			=> 'Stargate Portal Cloud 9',
	'BLOCK_DEV_STATUS'		=> 'Stargate Portal Development Status',
	'BLOCK_IRC'				=> 'Stargate Portal IRC',
	'BLOCK_MP3'				=> 'Stargate Portal MP3',
	'BLOCK_PORTAL_STATUS'	=> 'Stargate Portal Status',
	'BLOCK_RECENT_TOPICS'	=> 'Stargate Portal Recent Topics',
	'BLOCK_RSS_FEED'		=> 'Stargate Portal Rss Feeds',
	'BLOCK_STATS'			=> 'Stargate Portal Statistics',
	'BLOCK_TOP_POSTERS'		=> 'Stargate Portal Top Posters',
	'BLOCK_TOP_TOPICS'		=> 'Stargate Portal Top Topics',
	'BLOCK_WEB_PAGES'		=> 'Stargate Portal Web Pages',
	'BLOCK_WEB_TEAM'		=> 'Stargate Portal Web Team',

));
//- stargate aka kiss portal lang definitions -//
?>