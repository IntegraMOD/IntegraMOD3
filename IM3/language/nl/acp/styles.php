<?php
/**
*
* acp_styles [Nederlands]
*
* @package language
* @version $Id: styles.php 397 2009-09-14 17:01:41Z philippk $
* @copyright (c) 2005 phpBB Group; 2006 phpBB.de
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
	'ACP_IMAGESETS_EXPLAIN'		=> 'Afbeeldingsets bevatten alle niet stijlgebonden afbeeldingen die op het forum gebruikt worden. Hier kan je bestaande sets bewerken, exporteren en verwijderen, en nieuwe sets invoeren en activeren.',
	'ACP_STYLES_EXPLAIN'		=> 'Hier kan je alle beschikbare stijlen beheren. Een stijl bestaat uit een template, thema en afbeeldingset. Je kan bestaande stijlen vervangen, verwijderen, deactiveren, heractiveren, alsook nieuwe stijlen invoeren. Je kan ook een stijl alvast bekijken om te zien hoe een stijl er zal uitzien wanneer je hem gebruikt. De huidige standaardstijl staat met een (*) aangegeven. Er staat ook weergegeven hoeveel gebruikers welke stijl gebruiken. Gedwongen stijlen worden hierin niet meegeteld.',
	'ACP_TEMPLATES_EXPLAIN'		=> 'Een templateset bevat alle codering om het uitzicht van je forum te genereren. Hier kan je bestaande templatesets verwijderen, exporteren, en nieuwe sets importeren en alvast bekijken. Je kan ook de template-code gebruikt voor BBCode te genereren, bewerken.',
	'ACP_THEMES_EXPLAIN'		=> 'Hier kan je thema\'s maken, installeren, bewerken, verwijderen en exporteren. Een thema is de combinatie van kleuren en afbeeldingen die worden gebruik in je templates om de basisuitstraling van je forum vast te stellen. Het aantal opties dat voor jou beschikbaar is hangt af van de serverinstellingen, en het type phpBB-installatie. Voor verdere details raadpleeg je best de gebruikersgids. Bij het aanmaken van nieuwe thema\'s is het gebruiken van een ander thema als basis slechts optioneel.',
	'ADD_IMAGESET'				=> 'Maak een afbeeldingset',
	'ADD_IMAGESET_EXPLAIN'		=> 'Hier kan je een nieuwe afbeeldingset aanmaken. Afhankelijk van je serverinstellingen en de bestands rechten kan je hier extra opties hebben.',
	'ADD_STYLE'					=> 'Maak een stijl',
	'ADD_STYLE_EXPLAIN'			=> 'Hier kan je een nieuwe stijl aanmaken. Afhankelijk van je serverinstellingen en de bestands rechten kan je hier extra opties hebben.',
	'ADD_TEMPLATE'				=> 'Maak een template',
	'ADD_TEMPLATE_EXPLAIN'		=> 'Hier kan je een nieuwe template aanmaken. Afhankelijk van je serverinstellingen en de bestands rechten kan je hier extra opties hebben.',
	'ADD_THEME'					=> 'Maak een thema',
	'ADD_THEME_EXPLAIN'			=> 'Hier kan je een nieuw thema aanmaken. Afhankelijk van je serverinstellingen en de bestands rechten kan je hier extra opties hebben.',
	'ARCHIVE_FORMAT'			=> 'Archief bestandstype',
	'AUTOMATIC_EXPLAIN'			=> 'Laat dit leeg om het automatisch te detecteren.',

	'BACKGROUND'				=> 'Achtergrond',
	'BACKGROUND_COLOUR'			=> 'Achtergrondkleur',
	'BACKGROUND_IMAGE'			=> 'Achtergrondafbeelding',
	'BACKGROUND_REPEAT'			=> 'Herhaal achtergrond',
	'BOLD'						=> 'Vet',

	'CACHE'							=> 'Buffer',
	'CACHE_CACHED'					=> 'In buffergeheugen',
	'CACHE_FILENAME'				=> 'Template-bestand',
	'CACHE_FILESIZE'				=> 'Bestandsgrootte',
	'CACHE_MODIFIED'				=> 'Aangepast',
	'CONFIRM_IMAGESET_REFRESH'		=> 'Ben je zeker dat je alle afbeeldingsetgegevens wil vernieuwen? De instellingen van de afbeeldingset zullen alle aanpassingen overschrijven die reeds met de afbeeldingsetbewerker plaatsvonden.',
	'CONFIRM_TEMPLATE_CLEAR_CACHE'	=> 'Ben je zeker dat je de gehele buffer van de templatebestanden wilt leeghalen?',
	'CONFIRM_TEMPLATE_REFRESH'		=> 'Ben je zeker dat je alle template-gegevens wilt hernieuwen in de database met de inhoud van de template-bestanden van het bestandssysteem? Dit zal alle aanpassingen die reeds verricht zijn met de template-bewerker, en in de database gestockeerd, overschrijven.',
	'CONFIRM_THEME_REFRESH'			=> 'Ben je zeker dat je alle themagegevens wilt hernieuwen in de database met de inhoud van de themabestanden van het bestandssysteem? Dit zal alle aanpassingen die reeds verricht zijn met de themabewerker, en in de database gestockeerd, overschrijven.',
	'COPYRIGHT'						=> 'Auteursrecht',
	'CREATE_IMAGESET'				=> 'Maak nieuwe afbeeldingenset',
	'CREATE_STYLE'					=> 'Maak nieuwe stijl',
	'CREATE_TEMPLATE'				=> 'Maak nieuwe templateset',
	'CREATE_THEME'					=> 'Maak nieuw thema',
	'CURRENT_IMAGE'					=> 'Huidige afbeelding',

	'DEACTIVATE_DEFAULT'		=> 'Je kan de standaardstijl niet deactiveren.',
	'DELETE_FROM_FS'			=> 'Verwijder uit het bestandsysteem',
	'DELETE_IMAGESET'			=> 'Verwijder afbeeldingenset',
	'DELETE_IMAGESET_EXPLAIN'	=> 'Hier kan je de geselecteerde afbeeldingset uit de database verwijderen. Daarbovenop kan je met de juiste rechten een stemming aanmaken om de set van het bestandsysteem te verwijderen. Hiervoor is echter <b>geen mogelijkheid om de actie ongedaan te maken</b>. Het is dan ook ten sterkste aan te raden om eerst de set te exporteren om nadien eventueel te hergebruiken.',
	'DELETE_STYLE'				=> 'Verwijder stijl',
	'DELETE_STYLE_EXPLAIN'		=> 'Hier kan je de geselecteerde stijl verwijderen. Je kan niet alle stijlelementen van hier verwijderen. Deze moeten apart via hun formulieren verwijderd worden. Hou er rekening mee dat deze acties niet ongedaan kunnen gemaakt worden.',
	'DELETE_TEMPLATE'			=> 'Verwijder template',
	'DELETE_TEMPLATE_EXPLAIN'	=> 'Hier kan je de geselecteerde templateset van de database verwijderen. Daarbovenop kan je met de juiste rechten een stemming aanmaken om de template van het bestandsysteem te verwijderen. Hiervoor is echter <b>geen mogelijkheid om de actie ongedaan te maken</b>. Het is dan ook ten sterkste aan te raden om eerst de template te exporteren om nadien eventueel te hergebruiken.',
	'DELETE_THEME'				=> 'Verwijder thema',
	'DELETE_THEME_EXPLAIN'		=> 'Hier kan je het geselecteerde thema van de database verwijderen. Daarbovenop kan je met de juiste rechten een stemming aanmaken om het thema van het bestandsysteem te verwijderen. Hiervoor is echter <b>geen mogelijkheid om de actie ongedaan te maken</b>. Het is dan ook ten sterkste aan te raden om eerst het thema te exporteren om nadien eventueel te hergebruiken.',
	'DETAILS'					=> 'Details',
	'DIMENSIONS_EXPLAIN'		=> 'Door &quot;ja&quot; te selecteren zullen de breedte/hoogte parameters worden inbegrepen.',


	'EDIT_DETAILS_IMAGESET'				=> 'Bewerk afbeeldingset details',
	'EDIT_DETAILS_IMAGESET_EXPLAIN'		=> 'Hier kan je zekere afbeeldingset details bewerken.',
	'EDIT_DETAILS_STYLE'				=> 'Bewerk stijl',
	'EDIT_DETAILS_STYLE_EXPLAIN'		=> 'Gebruikmaken van het onderstaand formulier kan je deze bestaande stijl aanpassen. Je kan de combinatie van template/thema en imageset vervangen door datgene wat je zelf wenst. Je kan deze stijl ook de standaard maken.',
	'EDIT_DETAILS_TEMPLATE'				=> 'Bewerk template-details',
	'EDIT_DETAILS_TEMPLATE_EXPLAIN'		=> 'Hier kan je zekere template-details bewerken zoals de naam. Je kan ook kiezen of je het stijlblad wilt opslaan in de database of in het bestandsysteem, en hiertussen transfereren. Deze mogelijkheden hangen af van je PHP-instellingen en de schrijftoelatingen van je webserver.',
	'EDIT_DETAILS_THEME'				=> 'Bewerk themadetails',
	'EDIT_DETAILS_THEME_EXPLAIN'		=> 'Hier kan je zekere themadetails bewerken zoals de naam. Je kan ook kiezen of je het stijlblad wilt opslaan in de database of in het bestandsysteem, en hiertussen transfereren. Deze mogelijkheden hangen af van je PHP-instellingen en de schrijftoelatingen van je webserver.',
	'EDIT_IMAGESET'						=> 'Bewerk afbeeldingset',
	'EDIT_IMAGESET_EXPLAIN'				=> 'Hier kan je alle afbeeldingen bewerken die door de afbeeldingset werden vooropgesteld. Je kan ook de afmetingen voor de afbeelding opgeven.',
	'EDIT_TEMPLATE'						=> 'Bewerk template',
	'EDIT_TEMPLATE_EXPLAIN'				=> 'Hier kan je direct de templateset bewerken. Gelieve te onthouden dat deze bewerkingen permanent zijn en niet ongedaan gemaakt kunnen worden. Als PHP direct naar de bestanden kan schrijven in je /styles/-map zal deze dat doen. Als PHP niet naar die bestanden kan schrijven zal er voor een omleiding via de database gezorgd worden. Gelieve altijd met zorg de templates te bewerken.',
	'EDIT_TEMPLATE_STORED_DB'			=> 'Het templatebestand is onschrijfbaar dus is de templateset nu in de database gestockeerd met het nieuwe - bewerkte -  bestand.',
	'EDIT_THEME'						=> 'Bewerk thema',
	'EDIT_THEME_EXPLAIN'				=> 'Hier kan je het geselecteerde thema bewerken, kleuren wijzigen, afbeeldingen enz.',
	'EDIT_THEME_STORED_DB'				=> 'Het stijlblad bestand kon niet door de server geschreven worden dus is het nu in je database opgeslagen.',
	'EDIT_THEME_STORE_PARSED'			=> 'Het thema eist dat de stylesheet wordt geparsed. Dit is enkel mogelijk als het in de database wordt ingevoerd.',
	'EDITOR_DISABLED'					=> 'De sjabloon-editor is uitgeschakeld.',
	'EXPORT'							=> 'Exporteer',

	'FOREGROUND'				=> 'Voorgrond',
	'FONT_COLOUR'				=> 'Letterkleur',
	'FONT_FACE'					=> 'Lettertype',
	'FONT_FACE_EXPLAIN'			=> 'Je kan meerdere lettertypes aanduiden, door middel van komma\'s te scheiden. Als een gebruiker niet het eerst gespecificeerde ter beschikking heeft zal het eerstvolgende in lijn gekozen worden.',
	'FONT_SIZE'					=> 'Lettergrootte',

	'GLOBAL_IMAGES'				=> 'Globaal',

	'HIDE_CSS'					=> 'Verberg ruwe CSS',

	'IMAGE_WIDTH'				=> 'Afbeeldingbreedte',
	'IMAGE_HEIGHT'				=> 'Afbeeldinghoogte',
	'IMAGE'						=> 'Afbeelding',
	'IMAGE_NAME'				=> 'Afbeeldingnaam',
	'IMAGE_PARAMETER'			=> 'Parameter',
	'IMAGE_VALUE'				=> 'Waarde',
	'IMAGESET_ADDED'			=> 'Nieuwe afbeeldingset aan het bestandsysteem toegevoegd.',
	'IMAGESET_ADDED_DB'			=> 'Nieuwe afbeeldingset aan de database toegevoegd.',
	'IMAGESET_DELETED'			=> 'Afbeeldingset succesvol verwijderd.',
	'IMAGESET_DELETED_FS'		=> 'Afbeeldingset uit de database verwijderd, maar sommige bestanden zouden nog in het bestandssysteem kunnen zijn.',
	'IMAGESET_DETAILS_UPDATED'	=> 'Afbeeldingset details zijn succesvol bijgewerkt.',
	'IMAGESET_ERR_ARCHIVE'		=> 'Gelieve een archiveringsmethode te kiezen.',
	'IMAGESET_ERR_COPY_LONG'	=> 'De copyright mag niet langer dan 60 tekens zijn.',
	'IMAGESET_ERR_NAME_CHARS'	=> 'De afbeeldingsetnaam mag enkel letters, cijfers, -, +, _ en spaties bevatten.',
	'IMAGESET_ERR_NAME_EXIST'	=> 'Een afbeeldingset met deze naam bestaat reeds.',
	'IMAGESET_ERR_NAME_LONG'	=> 'De afbeeldingset naam mag niet langer dan 30 tekens zijn.',
	'IMAGESET_ERR_NOT_IMAGESET'	=> 'Het archief dat je vooropstelde bevat geen geldige afbeeldingset.',
	'IMAGESET_ERR_STYLE_NAME'	=> 'Je dient een naam aan deze afbeeldingset toe te kennen.',
	'IMAGESET_EXPORT'			=> 'Exporteer afbeeldingset',
	'IMAGESET_EXPORT_EXPLAIN'	=> 'Hier kan je een afbeeldingset exporteren in de vorm van een archief. Dit archief zal alle benodigde data bevatten om de afbeeldingset op een ander forum te installeren. Om het bestand te verkrijgen kan je kiezen tussen een directe download, stockeren in je stockerings-map voor een download op een later moment, of via de FTP.',
	'IMAGESET_EXPORTED'			=> 'Afbeeldingset succesvol ge&euml;xporteerd en in %s gestockeerd.',
	'IMAGESET_NAME'				=> 'Afbeeldingset naam',
	'IMAGESET_REFRESHED'		=> 'Afbeeldingset succesvol vernieuwd.',
	'IMAGESET_UPDATED'			=> 'Afbeeldingset succesvol bijgewerkt.',
	'ITALIC'					=> 'Schuin',

	'IMG_CAT_BUTTONS'			=> 'Gelokaliseerde knoppen',
	'IMG_CAT_CUSTOM'			=> 'Aangepaste afbeeldingen',
	'IMG_CAT_FOLDERS'			=> 'Onderwerp iconen',
	'IMG_CAT_FORUMS'			=> 'Forum iconen',
	'IMG_CAT_ICONS'				=> 'Algemene iconen',
	'IMG_CAT_LOGOS'				=> 'Logo\'s',
	'IMG_CAT_POLLS'				=> 'Stemming afbeeldingen',
	'IMG_CAT_UI'				=> 'Algemene gebruikersinterface elementen',
	'IMG_CAT_USER'				=> 'Optionele afbeeldingen',

	'IMG_SITE_LOGO'				=> 'Hoofdlogo',
	'IMG_UPLOAD_BAR'			=> 'Laad voortgangsbalk op',
	'IMG_POLL_LEFT'				=> 'Stemming linkereinde',
	'IMG_POLL_CENTER'			=> 'Stemming midden',
	'IMG_POLL_RIGHT'			=> 'Stemming rechtereinde',
	'IMG_ICON_FRIEND'			=> 'Voeg toe als vriend',
	'IMG_ICON_FOE'				=> 'Voeg toe als vijand',

	'IMG_FORUM_LINK'			=> 'Forum link',
	'IMG_FORUM_READ'			=> 'Forum',
	'IMG_FORUM_READ_LOCKED'		=> 'Forum gesloten',
	'IMG_FORUM_READ_SUBFORUM'	=> 'Subforum',
	'IMG_FORUM_UNREAD'			=> 'Forum nieuwe berichten',
	'IMG_FORUM_UNREAD_LOCKED'	=> 'Forum nieuwe gesloten berichten',
	'IMG_FORUM_UNREAD_SUBFORUM'	=> 'Subforum nieuwe berichten',
	'IMG_SUBFORUM_READ'			=> 'Legende subforum',
	'IMG_SUBFORUM_UNREAD'		=> 'Legende nieuwe berichten subforum',

	'IMG_TOPIC_MOVED'			=> 'Onderwerp verplaatst',

	'IMG_TOPIC_READ'				=> 'Onderwerp',
	'IMG_TOPIC_READ_MINE'			=> 'Onderwerp geplaatst naar',
	'IMG_TOPIC_READ_HOT'			=> 'Onderwerp populair',
	'IMG_TOPIC_READ_HOT_MINE'		=> 'Onderwerp populair geplaatst naar',
	'IMG_TOPIC_READ_LOCKED'			=> 'Onderwerp gesloten',
	'IMG_TOPIC_READ_LOCKED_MINE'	=> 'Onderwerp gesloten geplaatst naar',

	'IMG_TOPIC_UNREAD'				=> 'Nieuw onderwerp',
	'IMG_TOPIC_UNREAD_MINE'			=> 'Nieuw onderwerp geplaatst naar',
	'IMG_TOPIC_UNREAD_HOT'			=> 'Nieuw onderwerp populair',
	'IMG_TOPIC_UNREAD_HOT_MINE'		=> 'Nieuw onderwerp populair geplaatst naar',
	'IMG_TOPIC_UNREAD_LOCKED'		=> 'Nieuw onderwerp gesloten',
	'IMG_TOPIC_UNREAD_LOCKED_MINE'	=> 'Nieuw onderwerp gesloten geplaatst naar',

	'IMG_STICKY_READ'				=> 'Sticky Onderwerp',
	'IMG_STICKY_READ_MINE'			=> 'Sticky geplaatst naar',
	'IMG_STICKY_READ_LOCKED'		=> 'Sticky gesloten',
	'IMG_STICKY_READ_LOCKED_MINE'	=> 'Sticky gesloten geplaatst naar',
	'IMG_STICKY_UNREAD'				=> 'Sticky nieuw bericht',
	'IMG_STICKY_UNREAD_MINE'		=> 'Sticky geplaatst naar nieuw',
	'IMG_STICKY_UNREAD_LOCKED'		=> 'Sticky gesloten nieuwe berichten',
	'IMG_STICKY_UNREAD_LOCKED_MINE'	=> 'Sticky gesloten berichten naar nieuw',

	'IMG_ANNOUNCE_READ'					=> 'Mededeling',
	'IMG_ANNOUNCE_READ_MINE'			=> 'Mededeling geplaatst naar',
	'IMG_ANNOUNCE_READ_LOCKED'			=> 'Mededeling gesloten',
	'IMG_ANNOUNCE_READ_LOCKED_MINE'		=> 'Mededeling gesloten geplaatst naar',
	'IMG_ANNOUNCE_UNREAD'				=> 'Mededeling nieuw bericht',
	'IMG_ANNOUNCE_UNREAD_MINE'			=> 'Mededeling geplaatst naar nieuw',
	'IMG_ANNOUNCE_UNREAD_LOCKED'		=> 'Mededeling gesloten nieuwe berichten',
	'IMG_ANNOUNCE_UNREAD_LOCKED_MINE'	=> 'Mededeling gesloten berichten naar nieuw',

	'IMG_GLOBAL_READ'					=> 'Globaal',
	'IMG_GLOBAL_READ_MINE'				=> 'Globaal bericht geplaatst naar',
	'IMG_GLOBAL_READ_LOCKED'			=> 'Globaal bericht gesloten',
	'IMG_GLOBAL_READ_LOCKED_MINE'		=> 'Globaal bericht gesloten geplaatst naar',
	'IMG_GLOBAL_UNREAD'					=> 'Nieuw globaal bericht',
	'IMG_GLOBAL_UNREAD_MINE'			=> 'Globaal bericht geplaatst naar nieuw',
	'IMG_GLOBAL_UNREAD_LOCKED'			=> 'Gesloten globale nieuwe berichten',
	'IMG_GLOBAL_UNREAD_LOCKED_MINE'		=> 'Gesloten globale berichten naar nieuw',
	'IMG_NEWS_READ'						=> 'Nieuws',
	'IMG_NEWS_READ_MINE'				=> 'Nieuws geplaatst naar',
	'IMG_NEWS_READ_LOCKED'				=> 'Nieuws gesloten',
	'IMG_NEWS_READ_LOCKED_MINE'			=> 'Nieuws gesloten geplaatst naar',
	'IMG_NEWS_UNREAD'					=> 'Nieuws nieuwe berichten',
	'IMG_NEWS_UNREAD_MINE'				=> 'Nieuws geplaatst naar nieuw',
	'IMG_NEWS_UNREAD_LOCKED'			=> 'Nieuws gesloten nieuwe berichten',
	'IMG_NEWS_UNREAD_LOCKED_MINE'		=> 'Nieuws gesloten geplaatst naar nieuw',

	'IMG_PM_READ'						=> 'Gelezen priv&eacute; bericht',
	'IMG_PM_UNREAD'						=> 'Ongelezen priv&eacute; bericht',

	'IMG_ICON_BACK_TOP'					=> 'Boven',

	'IMG_ICON_CONTACT_AIM'				=> 'AIM',
	'IMG_ICON_CONTACT_EMAIL'			=> 'Stuur E-mail',
	'IMG_ICON_CONTACT_ICQ'				=> 'ICQ',
	'IMG_ICON_CONTACT_JABBER'			=> 'Jabber',
	'IMG_ICON_CONTACT_MSNM'				=> 'MSNM',
	'IMG_ICON_CONTACT_PM'				=> 'Stuur PB',
	'IMG_ICON_CONTACT_YAHOO'			=> 'YIM',
	'IMG_ICON_CONTACT_WWW'				=> 'Website',

	'IMG_ICON_POST_DELETE'				=> 'Verwijder bericht',
	'IMG_ICON_POST_EDIT'				=> 'Bewerk bericht',
	'IMG_ICON_POST_INFO'				=> 'Geef berichtdetails weer',
	'IMG_ICON_POST_QUOTE'				=> 'Citeer bericht',
	'IMG_ICON_POST_REPORT'				=> 'Meld bericht',
	'IMG_ICON_POST_TARGET'				=> 'Minibericht',
	'IMG_ICON_POST_TARGET_UNREAD'		=> 'Nieuw minibericht',


	'IMG_ICON_TOPIC_ATTACH'				=> 'Bijlage',
	'IMG_ICON_TOPIC_LATEST'				=> 'Laaste bericht',
	'IMG_ICON_TOPIC_NEWEST'				=> 'Laatste ongelezen bericht',
	'IMG_ICON_TOPIC_REPORTED'			=> 'Bericht gemeld',
	'IMG_ICON_TOPIC_UNAPPROVED'			=> 'Bericht niet toegelaten',
	
	'IMG_ICON_AJAX_CHECKING'			=> 'AJAX het controleren',
	'IMG_ICON_AJAX_TRUE'				=> 'AJAX waar',
	'IMG_ICON_AJAX_FALSE'				=> 'AJAX vals',
	'IMG_ICON_AJAX_PASSWORD_STRENGTH_1'	=> 'AJAX wachtwoord sterkte - Zeer zwak',
	'IMG_ICON_AJAX_PASSWORD_STRENGTH_2'	=> 'AJAX wachtwoord sterkte - Zwak',
	'IMG_ICON_AJAX_PASSWORD_STRENGTH_3'	=> 'AJAX wachtwoord sterkte - Aanvaardbaar',
	'IMG_ICON_AJAX_PASSWORD_STRENGTH_4'	=> 'AJAX wachtwoord sterkte - Sterk',	

	'IMG_ICON_USER_ONLINE'			=> 'Gebruiker online',
	'IMG_ICON_USER_OFFLINE'			=> 'Gebruiker offline',
	'IMG_ICON_USER_PROFILE'			=> 'Geen profiel weer',
	'IMG_ICON_USER_SEARCH'			=> 'Zoek berichten',
	'IMG_ICON_USER_WARN'			=> 'Waarschuw gebruiker',

	'IMG_BUTTON_PM_FORWARD'			=> 'Stuur priv&eacute; bericht door',
	'IMG_BUTTON_PM_NEW'				=> 'Nieuw priv&eacute; bericht',
	'IMG_BUTTON_PM_REPLY'			=> 'Beantwoord priv&eacute; bericht',
	'IMG_BUTTON_TOPIC_LOCKED'		=> 'Onderwerp gesloten',
	'IMG_BUTTON_TOPIC_NEW'			=> 'Nieuw onderwerp',
	'IMG_BUTTON_TOPIC_REPLY'		=> 'Beantwoord onderwerp',
	'IMG_BUTTON_TOPIC_QREPLY'		=> 'Snel antwoord',
	'IMG_BUTTON_TOPIC_QREPLY_NO'	=> 'Verberg Snel antwoord',
	
	'IMG_USER_ICON1'			=> 'Vooropgestelde afbeelding 1',
	'IMG_USER_ICON2'			=> 'Vooropgestelde afbeelding 2',
	'IMG_USER_ICON3'			=> 'Vooropgestelde afbeelding 3',
	'IMG_USER_ICON4'			=> 'Vooropgestelde afbeelding 4',
	'IMG_USER_ICON5'			=> 'Vooropgestelde afbeelding 5',
	'IMG_USER_ICON6'			=> 'Vooropgestelde afbeelding 6',
	'IMG_USER_ICON7'			=> 'Vooropgestelde afbeelding 7',
	'IMG_USER_ICON8'			=> 'Vooropgestelde afbeelding 8',
	'IMG_USER_ICON9'			=> 'Vooropgestelde afbeelding 9',
	'IMG_USER_ICON10'			=> 'Vooropgestelde afbeelding 10',

	'INCLUDE_DIMENSIONS'			=> 'Gebruik afmetingen',
	'INCLUDE_IMAGESET'				=> 'Gebruik afbeeldingset',
	'INCLUDE_TEMPLATE'				=> 'Gebruik template',
	'INCLUDE_THEME'					=> 'Gebruik thema',
	'INHERITING_FROM'				=> 'Inherits from',
	'INSTALL_IMAGESET'				=> 'Installeer afbeeldingset',
	'INSTALL_IMAGESET_EXPLAIN'		=> 'Hier kan je een nieuwe afbeeldingset installeren',
	'INSTALL_STYLE'					=> 'Installeer stijl',
	'INSTALL_STYLE_EXPLAIN'			=> 'Hier kan je een nieuwe stijl installeren.',
	'INSTALL_TEMPLATE'				=> 'Installeer template',
	'INSTALL_TEMPLATE_EXPLAIN'		=> 'Hier kan je een nieuwe templateset installeren.',
	'INSTALL_THEME'					=> 'Installeer thema',
	'INSTALL_THEME_EXPLAIN'			=> 'Hier kan je jouw geselecteerde thema installeren.',
	'INSTALLED_IMAGESET'			=> 'Ge&iuml;nstalleerde afbeeldingsets',
	'INSTALLED_STYLE'				=> 'Ge&iuml;nstalleerde stijlen',
	'INSTALLED_TEMPLATE'			=> 'Ge&iuml;nstalleerde templates',
	'INSTALLED_THEME'				=> 'Ge&iuml;nstalleerde thema\'s',

	'LINE_SPACING'					=> 'Lijn spatie',
	'LOCALISED_IMAGES'				=> 'Gelokaliseerd',
	'LOCATION_DISABLED_EXPLAIN'		=> 'This setting is inherited and cannot be changed.',


	'NO_CLASS'					=> 'Kan de klasse niet vinden in het stijlblad.',
	'NO_IMAGESET'				=> 'Kan afbeeldingset niet op vinden op het bestandsysteem.',
	'NO_IMAGE'					=> 'Geen afbeelding',
	'NO_IMAGE_ERROR'			=> 'Kan de afbeelding niet op het systeem vinden.',
	'NO_STYLE'					=> 'Kan stijl niet op vinden op het bestandsysteem.',
	'NO_TEMPLATE'				=> 'Kan template niet op vinden op het bestandsysteem.',
	'NO_THEME'					=> 'Kan thema niet op vinden op het bestandsysteem.',
	'NO_UNINSTALLED_IMAGESET'	=> 'Geen gede&iuml;nstalleerde afbeeldingsets gevonden.',
	'NO_UNINSTALLED_STYLE'		=> 'Geen gede&iuml;nstalleerde stijlen gevonden.',
	'NO_UNINSTALLED_TEMPLATE'	=> 'Geen gede&iuml;nstalleerde templates gevonden.',
	'NO_UNINSTALLED_THEME'		=> 'Geen gede&iuml;nstalleerde thema\'s gevonden.',
	'NO_UNIT'					=> 'Geen',

	'ONLY_IMAGESET'				=> 'Dit is de enige overblijvende afbeeldingset, je kan deze niet verwijderen.',
	'ONLY_STYLE'				=> 'Dit is de enige overblijvende stijl, je kan deze niet verwijderen.',
	'ONLY_TEMPLATE'				=> 'Dit is de enige overblijvende template, je kan deze niet verwijderen.',
	'ONLY_THEME'				=> 'Dit is het enige overblijvende thema, je kan deze niet verwijderen.',
	'OPTIONAL_BASIS'			=> 'Optionele basis',

	'REFRESH'					=> 'Vernieuw',
	'REPEAT_NO'					=> 'Geen',
	'REPEAT_X'					=> 'Enkel horizontaal',
	'REPEAT_Y'					=> 'Enkel verticaal',
	'REPEAT_ALL'				=> 'Beide mappen',
	'REPLACE_IMAGESET'			=> 'Vervang afbeeldingset met',
	'REPLACE_IMAGESET_EXPLAIN'	=> 'Dit thema zal de verwijderde afbeeldingset vervangen in alle stijlen die het gebruiken.',
	'REPLACE_STYLE'				=> 'Vervang stijl met',
	'REPLACE_STYLE_EXPLAIN'		=> 'Deze stijl zal de gedeletete stijl vervangen voor de leden die hem gebruiken.',
	'REPLACE_TEMPLATE'			=> 'Vervang template met',
	'REPLACE_TEMPLATE_EXPLAIN'	=> 'Dit thema zal de verwijderde template vervangen in alle stijlen die het gebruiken.',
	'REPLACE_THEME'				=> 'Vervang thema met',
	'REPLACE_THEME_EXPLAIN'		=> 'Dit thema zal het verwijderde thema vervangen in alle stijlen die het gebruiken.',
	'REQUIRES_IMAGESET'			=> 'Deze stijl vereist dat de afbeeldingset %s ge&iuml;nstalleerd is.',
	'REQUIRES_TEMPLATE'			=> 'Deze stijl vereist dat de template %s ge&iuml;nstalleerd is.',
	'REQUIRES_THEME'			=> 'Deze stijl vereist dat het thema %s ge&iuml;nstalleerd is.',

	'SELECT_IMAGE'				=> 'Selecteer afbeelding',
	'SELECT_TEMPLATE'			=> 'Selecteer template bestand',
	'SELECT_THEME'				=> 'Selecteer thema bestand',
	'SELECTED_IMAGE'			=> 'Geselecteerde afbeelding',
	'SELECTED_IMAGESET'			=> 'Geselecteerde afbeeldingset',
	'SELECTED_TEMPLATE'			=> 'Geselecteerde template',
	'SELECTED_TEMPLATE_FILE'	=> 'Geselecteerde template bestand',
	'SELECTED_THEME'			=> 'Geselecteerde thema',
	'SELECTED_THEME_FILE'		=> 'Geselecteerde thema bestand',
	'STORE_DATABASE'			=> 'Database',
	'STORE_FILESYSTEM'			=> 'Bestandsysteem',
	'STYLE_ACTIVATE'			=> 'Activeer',
	'STYLE_ACTIVE'				=> 'Actief',
	'STYLE_ADDED'				=> 'Stijl succesvol toegevoegd.',
	'STYLE_DEACTIVATE'			=> 'Deactiveer',
	'STYLE_DEFAULT'				=> 'Maak standaardstijl',
	'STYLE_DELETED'				=> 'Stijl succesvol verwijderd.',
	'STYLE_DETAILS_UPDATED'		=> 'Stijl succesvol bewerkt.',
	'STYLE_ERR_ARCHIVE'			=> 'Gelieve een archiveringsmethode te selecteren.',
	'STYLE_ERR_COPY_LONG'		=> 'De copyright mag niet langer dan 60 tekens zijn.',
	'STYLE_ERR_MORE_ELEMENTS'	=> 'Je dient minstens &eacute;&eacute;n stijlelement te selecteren.',
	'STYLE_ERR_NAME_CHARS'		=> 'De stijlnaam mag enkel letters, cijfers, -, +, _ en spaties bevatten.',
	'STYLE_ERR_NAME_EXIST'		=> 'Er bestaat reeds een stijl met deze naam.',
	'STYLE_ERR_NAME_LONG'		=> 'De stijlnaam mag niet langer dan 30 tekens zijn.',
	'STYLE_ERR_NO_IDS'			=> 'Je moet een template, thema en afbeeldingset voor deze stijl selecteren.',
	'STYLE_ERR_NOT_STYLE'		=> 'Het bestand bevat geen geldig stijlarchief.',
	'STYLE_ERR_STYLE_NAME'		=> 'Je moet een naam aan deze stijl toekennen.',
	'STYLE_EXPORT'				=> 'Exporteer stijl',
	'STYLE_EXPORT_EXPLAIN'		=> 'Hier kan je een stijl exporteren in de vorm van een archief. Dit archief zal alle benodigde data bevatten om de stijl op een ander forum te installeren. Om het bestand te verkrijgen kan je kiezen tussen een directe download, stockeren in je stockerings-map voor een download op een later moment, of via de FTP.',
	'STYLE_EXPORTED'			=> 'Stijl succesvol ge&euml;xporteerd en in %s opgeslagen.',
	'STYLE_IMAGESET'			=> 'Afbeeldingset',
	'STYLE_NAME'				=> 'Stijlnaam',
	'STYLE_TEMPLATE'			=> 'Template',
	'STYLE_THEME'				=> 'Thema',
	'STYLE_USED_BY'				=> 'Gebruikt door (inclusief bots)',

	'TEMPLATE_ADDED'						=> 'Templateset toegevoegd en in het bestandsysteem opgeslagen.',
	'TEMPLATE_ADDED_DB'						=> 'Templateset toegevoegd en in de database opgeslagen.',
	'TEMPLATE_CACHE'						=> 'Template buffer',
	'TEMPLATE_CACHE_EXPLAIN'				=> 'phpBB buffert standaard een gecompileerde versie van de templates. Dit verkleint de serverbelasting iedere keer dat een pagina bekeken wordt, zo kan de generatietijd dus verminderen.',
	'TEMPLATE_CACHE_CLEARED'				=> 'Template buffer succesvol geleegd.',
	'TEMPLATE_CACHE_EMPTY'					=> 'Er zijn geen gebufferde templates.',
	'TEMPLATE_DELETED'						=> 'Templateset succesvol verwijderd.',
	'TEMPLATE_DELETE_DEPENDENT'				=> 'The template set cannot be deleted as there are one or more other template sets inheriting from it:',
	'TEMPLATE_DELETED_FS'					=> 'Templateset uit de database verwijderd, maar sommige bestanden kunnen nog op het bestandsysteem zitten.',
	'TEMPLATE_DETAILS_UPDATED'				=> 'Template-details succesvol bijgewerkt.',
	'TEMPLATE_EDITOR'						=> 'Ruwe HTML-templatebewerker',
	'TEMPLATE_EDITOR_HEIGHT'				=> 'Hoogte templatebewerker',
	'TEMPLATE_ERR_ARCHIVE'					=> 'Gelieve een archiveringsmethode te selecteren.',
	'TEMPLATE_ERR_CACHE_READ'				=> 'De buffermap gebruikt om de gebufferde template bestanden te stockeren kon niet geopend worden.',
	'TEMPLATE_ERR_COPY_LONG'				=> 'De copyright mag niet langer dan 60 tekens zijn.',
	'TEMPLATE_ERR_NAME_CHARS'				=> 'De templatenaam mag enkel letters, cijfers, -, +, _ en spaties bevatten.',
	'TEMPLATE_ERR_NAME_EXIST'				=> 'De naam voor deze templateset bestaat al.',
	'TEMPLATE_ERR_NAME_LONG'				=> 'De templatenaam mag niet langer dan 30 tekens zijn',
	'TEMPLATE_ERR_NOT_TEMPLATE'				=> 'Het archief dat je vooropstelde bevat geen geldige templateset.',
	'TEMPLATE_ERR_REQUIRED_OR_INCOMPLETE' 	=> 'The new template set requires the template %s to be installed and not inheriting itself.',
	'TEMPLATE_ERR_STYLE_NAME'				=> 'Je dient een naam voor deze templates op te geven.',
	'TEMPLATE_EXPORT'						=> 'Exporteer templates',
	'TEMPLATE_EXPORT_EXPLAIN'				=> 'Hier kan je een templateset exporteren in de vorm van een archief. Dit archief zal alle benodigde data bevatten om de template op een ander forum te installeren. Om het bestand te verkrijgen kan je kiezen tussen een directe download, stockeren in je stockerings-map voor een download op een later moment, of via de FTP.',
	'TEMPLATE_EXPORTED'						=> 'Templates zijn succesvol ge&euml;xporteerd en in %s gestockeerd.',
	'TEMPLATE_FILE'							=> 'Template-bestand',
	'TEMPLATE_FILE_UPDATED'					=> 'Template-bestand succesvol bijgewerkt.',
	'TEMPLATE_INHERITS'						=> 'This template sets inherits from %s and thus cannot have a different storage setting than its super template.',
	'TEMPLATE_LOCATION'						=> 'Stockeer templates in',
	'TEMPLATE_LOCATION_EXPLAIN'				=> 'Afbeeldingen zijn altijd in het bestandsysteem gestockeerd.',
	'TEMPLATE_NAME'							=> 'Templatenaam',
	'TEMPLATE_FILE_NOT_WRITABLE'			=> 'Sjabloon bestand % s kan niet opgeslagen worden. Controleer de machtigingen voor bestanden en de map.',
	'TEMPLATE_REFRESHED'					=> 'Template succesvol vernieuwd.',

	'THEME_ADDED'				=> 'Nieuw thema aan het bestandsysteem toegevoegd.',
	'THEME_ADDED_DB'			=> 'Nieuw thema aan de database toegevoegd.',
	'THEME_CLASS_ADDED'			=> 'Eigen klasse succesvol toegevoegd.',
	'THEME_DELETED'				=> 'Thema is succesvol verwijderd.',
	'THEME_DELETED_FS'			=> 'Thema is succesvol uit de database verwijderd, maar de bestanden blijven op het bestandsysteem.',
	'THEME_DETAILS_UPDATED'		=> 'Themadetails zijn succesvol bijgewerkt.',
	'THEME_EDITOR'				=> 'Themabewerker',
	'THEME_EDITOR_HEIGHT'		=> 'Hoogte themabewerker',
	'THEME_ERR_ARCHIVE'			=> 'Gelieve een archiveringsmethode te selecteren.',
	'THEME_ERR_CLASS_CHARS'		=> 'Enkel letters, cijfers, ., :, -, _ en # mogen in klassenamen gebruikt worden.',
	'THEME_ERR_COPY_LONG'		=> 'De copyright mag niet langer dan 60 tekens zijn.',
	'THEME_ERR_NAME_CHARS'		=> 'De themanaam mag enkel letters, cijfers, -, +, _ en spaties bevatten.',
	'THEME_ERR_NAME_EXIST'		=> 'Er bestaat reeds een thema met deze naam.',
	'THEME_ERR_NAME_LONG'		=> 'De themanaam mag niet langer daar 30 tekens zijn.',
	'THEME_ERR_NOT_THEME'		=> 'Het archief dat je voorstelde bevat geen geldig thema.',
	'THEME_ERR_REFRESH_FS'		=> 'Dit thema is gestockeerd op het bestandsysteem dus is het niet nodig deze te vernieuwen.',
	'THEME_ERR_STYLE_NAME'		=> 'Je dient een naam aan dit thema toe te kennen.',
	'THEME_FILE'				=> 'Themabestand',
	'THEME_EXPORT'				=> 'Exporteer thema',
	'THEME_EXPORT_EXPLAIN'		=> 'Hier kan je een thema exporteren in de vorm van een archief. Dit archief zal alle benodigde data bevatten om het thema op een ander forum te installeren. Om het bestand te verkrijgen kan je kiezen tussen een directe download, stockeren in je stockerings-map voor een download op een later moment, of via de FTP.',
	'THEME_EXPORTED'			=> 'Thema succesvol ge&euml;xporteerd en gestockeerd in %s.',
	'THEME_LOCATION'			=> 'Stockeer het stijlblad in',
	'THEME_LOCATION_EXPLAIN'	=> 'Afbeeldingen staan steeds gestockeerd op het bestandsysteem.',
	'THEME_NAME'				=> 'Themanaam',
	'THEME_REFRESHED'			=> 'Themavernieuwing succesvol uitgevoerd.',
	'THEME_UPDATED'				=> 'Thema succesvol bijgewerkt.',

	'UNDERLINE'					=> 'Onderstreept',
	'UNINSTALLED_IMAGESET'		=> 'Onge&iuml;nstalleerde afbeeldingsets',
	'UNINSTALLED_STYLE'			=> 'Onge&iuml;nstalleerde stijlen',
	'UNINSTALLED_TEMPLATE'		=> 'Onge&iuml;nstalleerde templates',
	'UNINSTALLED_THEME'			=> 'Onge&iuml;nstalleerde thema\'s',
	'UNSET'						=> 'Niet gedefinieerd',

));

?>