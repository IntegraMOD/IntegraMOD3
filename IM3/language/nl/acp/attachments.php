<?php
/**
*
* acp_attachments [Nederlands]
*
* @package language
* @version $Id: attachments.php 8946 2008-09-26 18:32:05Z toonarmy $
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
	'ACP_ATTACHMENT_SETTINGS_EXPLAIN'	=> 'Hier kun je de belangrijkste instellingen voor de bijlagen en de bijbehorende categorie&euml;n instellen.',
	'ACP_EXTENSION_GROUPS_EXPLAIN'		=> 'Hier kun je extentiegroepen toevoegen, verwijderen, wijzigen of deactiveren. Verdere instellingen inclusief het toewijzen van speciale categorie&euml;n, wijzigen van het downloadmechanisme en de iconen die worden weergegeven voor de bijlagen die bij een bepaalde groep horen aan te duiden.',
	'ACP_MANAGE_EXTENSIONS_EXPLAIN'		=> 'Hier kun je de toegestane extenties beheren. Om de extenties te activeren, moet je verwijzen naar het extentie groep beheerpaneel. We raden het sterk af scripting-extenties (zoals <code>php</code>, <code>php3</code>, <code>php4</code>, <code>phtml</code>, <code>pl</code>, <code>cgi</code>, <code>py</code>, <code>rb</code>, <code>asp</code>, <code>aspx</code>, enz.) te activeren.',
	'ACP_ORPHAN_ATTACHMENTS_EXPLAIN'	=> 'Hier kun je alle ge&uuml;plode bestanden zien die nog niet aan berichten zijn toegewezen. Dit komt meestal voor doordat een gebruiker een bestand aan een bericht toevoegt, maar het bericht niet verstuurt. Je kunt de bestanden verwijderen of ze aan bestaande berichten koppelen. Voor het aan een bericht koppelen heb je een geldig bericht-ID nodig, deze moet je zelf opzoeken. Hierdoor zal de bijlage aan het opgegeven bericht toegevoegd worden.',
	'ADD_EXTENSION'						=> 'Extentie Toevoegen',
	'ADD_EXTENSION_GROUP'				=> 'Extentie groep Toevoegen',
	'ADMIN_UPLOAD_ERROR'				=> 'Fouten tijdens toevoegen bestand: &quot;%s&quot;',
	'ALLOWED_FORUMS'					=> 'Toegestane forums',
	'ALLOWED_FORUMS_EXPLAIN'			=> 'Toestaan om de toegewezen extenties in de geselecteerde (of alle, indien allemaal geselecteerd) forums te gebruiken.',
	'ALLOWED_IN_PM_POST'				=> 'Toestaan',
	'ALLOW_ATTACHMENTS'					=> 'Bijlagen Toestaan',
	'ALLOW_ALL_FORUMS'					=> 'In alle Forums Toestaan',
	'ALLOW_IN_PM'						=> 'Toegestaan in alle priv&eacute; berichten',
	'ALLOW_PM_ATTACHMENTS'				=> 'Bijlagen in priv&eacute; berichten toestaan',
	'ALLOW_SELECTED_FORUMS'				=> 'Alleen onderstaande geselecteerde forums',
	'ASSIGNED_EXTENSIONS'				=> 'Toegewezen extenties',
	'ASSIGNED_GROUP'					=> 'Toegewezen extentiegroepen',
	'ATTACH_EXTENSIONS_URL'				=> 'Extenties',
	'ATTACH_EXT_GROUPS_URL'				=> 'Extentie groepen',
	'ATTACH_ID'							=> 'ID',
	'ATTACH_MAX_FILESIZE'				=> 'Maximum bestand grootte',
	'ATTACH_MAX_FILESIZE_EXPLAIN'		=> 'Maximum grootte van elk bestand, 0 staat voor ongelimiteerd.',
	'ATTACH_MAX_PM_FILESIZE'			=> 'Maximum bestand grootte berichten',
	'ATTACH_MAX_PM_FILESIZE_EXPLAIN'	=> 'Maximum beschikbare ruimte per gebruiker, voor bijlagen in priv&eacute; berichten, 0 staat voor ongelimiteerd.',
	'ATTACH_ORPHAN_URL'					=> 'Berichtloze bijlagen',
	'ATTACH_POST_ID'					=> 'Bericht ID',
	'ATTACH_QUOTA'						=> 'Totale bijlage limiet',
	'ATTACH_QUOTA_EXPLAIN'				=> 'Maximale ruimte beschikbaar voor bijlagen voor het hele forum, waar 0 ongelimiteerd is.',
	'ATTACH_TO_POST'					=> 'Voeg bestand aan bericht toe',

	'CAT_FLASH_FILES'					=> 'Flash bestanden',
	'CAT_IMAGES'						=> 'Afbeeldingen',
	'CAT_QUICKTIME_FILES'				=> 'Quicktime media bestanden',
	'CAT_RM_FILES'						=> 'RealMedia media bestanden',
	'CAT_WM_FILES'						=> 'Windows Media bestanden',
	'CHECK_CONTENT'						=> 'Check attachment files',
	'CHECK_CONTENT_EXPLAIN'				=> 'Some browsers can be tricked to assume an incorrect mimetype for uploaded files. This option ensures that such files likely to cause this are rejected.',
	'CREATE_GROUP'						=> 'Maak nieuwe groep',
	'CREATE_THUMBNAIL'					=> 'Maak thumbnail',
	'CREATE_THUMBNAIL_EXPLAIN'			=> 'Maak altijd een thumbnail in elke situatie.',

	'DEFINE_ALLOWED_IPS'			=> 'Definieer toegestane IP\'s/hostnamen',
	'DEFINE_DISALLOWED_IPS'			=> 'Definieer verboden IP\'s/hostnamen',
	'DOWNLOAD_ADD_IPS_EXPLAIN'		=> 'Om meerdere IP\'s of hostnamen op te geven, plaats je deze telkens op een nieuwe lijn. Om een IP-bereik op te geven, splits dan de start- en de eind-IP met een streepje (-), het * kun je gebruiken als jokerteken.',
	'DOWNLOAD_REMOVE_IPS_EXPLAIN'	=> 'Het verwijderen (of niet langer uitsluiten) van meerdere IP-adressen in &eacute;&eacute;n keer, gaat door de correcte combinatie van muis en toetsenbord toe te passen. Uitgesloten IP\'s hebben een blauwe achtergrond.',
	'DISPLAY_INLINED'				=> 'Toon afbeeldingen inline',
	'DISPLAY_INLINED_EXPLAIN'		=> 'Als &quot;nee&quot; gekozen is, worden afbeeldingen getoond als link.',
	'DISPLAY_ORDER'					=> 'Bijlage sorteer volgorde',
	'DISPLAY_ORDER_EXPLAIN'			=> 'Toon bijlagen gesorteerd op tijd.',
	
	'EDIT_EXTENSION_GROUP'			=> 'Bewerk extentie groep',
	'EXCLUDE_ENTERED_IP'			=> 'Zet dit aan om de opgegeven IP/hostnaam uit te sluiten.',
	'EXCLUDE_FROM_ALLOWED_IP'		=> 'Sluit IP uit van toegestane IP\'s/hostnamen',
	'EXCLUDE_FROM_DISALLOWED_IP'	=> 'Sluit IP uit van niet-toegestane IP\'s/hostnamen',
	'EXTENSIONS_UPDATED'			=> 'Extenties succesvol bijgewerkt.',
	'EXTENSION_EXIST'				=> 'De extentie %s bestaat reeds.',
	'EXTENSION_GROUP'				=> 'Extentiegroep',
	'EXTENSION_GROUPS'				=> 'Extentiegroepen',
	'EXTENSION_GROUP_DELETED'		=> 'Extentiegroep succesvol verwijderd.',
	'EXTENSION_GROUP_EXIST'			=> 'De extentiegroep %s bestaat reeds.',

	'GO_TO_EXTENSIONS'				=> 'Ga naar extentiebeheer scherm',
	'GROUP_NAME'					=> 'Groep naam',

	'IMAGE_LINK_SIZE'				=> 'Afmeting link afbeelding',
	'IMAGE_LINK_SIZE_EXPLAIN'		=> 'Toon afbeelding bijlage als een link wanneer deze groter is dan de hier op gegeven afmeting. Om dit te deactiveren zet je de waarden op 0px bij 0px.',
	'IMAGICK_PATH'					=> 'Imagemagick path',
	'IMAGICK_PATH_EXPLAIN'			=> 'Volledige path naar ImageMagick conversie applicatie, b.v. <samp>/usr/bin/</samp>.',

	'MAX_ATTACHMENTS'				=> 'Maximum aantal bijlagen per bericht',
	'MAX_ATTACHMENTS_PM'			=> 'Maximum aantal bijlagen per priv&eacute; bericht',
	'MAX_EXTGROUP_FILESIZE'			=> 'Maximale bestand grootte',
	'MAX_IMAGE_SIZE'				=> 'Maximale afmeting afbeelding',
	'MAX_IMAGE_SIZE_EXPLAIN'		=> 'Maximale grootte van de afbeeldingen in de bijlage. Zet beide waardes op 0px bij 0px om de afmetingencontrole te deactiveren.',
	'MAX_THUMB_WIDTH'				=> 'Maximum thumbnail breedte in pixels',
	'MAX_THUMB_WIDTH_EXPLAIN'		=> 'Een gegenereerde thumbnail zal de ingevulde breedte niet overschrijden.',
	'MIN_THUMB_FILESIZE'			=> 'Minimale thumbnail bestand grootte',
	'MIN_THUMB_FILESIZE_EXPLAIN'	=> 'Cre&euml;r geen thumbnail voor afbeeldingen die kleiner zijn dan dit.',
	'MODE_INLINE'					=> 'Inline',
	'MODE_PHYSICAL'					=> 'Fysiek',

	'NOT_ALLOWED_IN_PM'				=> 'Alleen in forumberichten toegestaan',
	'NOT_ALLOWED_IN_PM_POST'		=> 'Niet toegestaan',
	'NOT_ASSIGNED'					=> 'Niet toegewezen',
	'NO_EXT_GROUP'					=> 'Geen',
	'NO_EXT_GROUP_NAME'				=> 'Geen groep naam ingevuld',
	'NO_EXT_GROUP_SPECIFIED'		=> 'Geen extentie groep gespecificeerd.',
	'NO_FILE_CAT'					=> 'Geen',
	'NO_IMAGE'						=> 'Geen afbeelding',
	'NO_THUMBNAIL_SUPPORT'			=> 'Thumbnail ondersteuning is uitgeschakeld. Hiervoor moet ofwel de GD-library of imagemagick ge&iuml;nstalleerd zijn. Beide zijn niet gevonden.',
	'NO_UPLOAD_DIR'					=> 'De opgegeven uploadmap bestaat niet.',
	'NO_WRITE_UPLOAD'				=> 'De opgegeven uploadmap is onbeschrijfbaar. Zet de rechten voor de webserver zo, dat er wel naar geschreven kan worden.',

	'ONLY_ALLOWED_IN_PM'			=> 'Alleen toestaan in priv&eacute; berichten',
	'ORDER_ALLOW_DENY'				=> 'Toestaan',
	'ORDER_DENY_ALLOW'				=> 'Niet Toestaan',

	'REMOVE_ALLOWED_IPS'			=> 'Verwijder of sluit de <em>toegestane</em> IP\'s/hostnamen niet langer uit',
	'REMOVE_DISALLOWED_IPS'			=> 'Verwijder of sluit de <em>niet-toegestane</em> IP\'s/hostnamen niet langer uit',

	'SEARCH_IMAGICK'					=> 'Zoek voor Imagemagick',
	'SECURE_ALLOW_DENY'					=> 'Wel/Niet Toestaan lijst',
	'SECURE_ALLOW_DENY_EXPLAIN'			=> 'Wijzig de standaard keuze, wanneer veilige downloads ingeschakeld zijn, van de toelaten/weigeren lijst naar dat van een <strong>whitelist</strong> (toelaten) of een <strong>blacklist</strong> (weigeren).',
	'SECURE_DOWNLOADS'					=> 'Zet veilige downloads aan',
	'SECURE_DOWNLOADS_EXPLAIN'			=> 'Indien deze optie aan staat zijn downloads gelimiteerd tot de opgegeven IP\'s/hostnamen.',
	'SECURE_DOWNLOAD_NOTICE'			=> 'Veilige downloads is uitgeschakeld. De instellingen worden ingeschakeld zodra veilige downloads worden ingeschakeld.',
	'SECURE_DOWNLOAD_UPDATE_SUCCESS'	=> 'De IP-lijst is succesvol bijgewerkt',
	'SECURE_EMPTY_REFERRER'				=> 'Sta lege referrers toe',
	'SECURE_EMPTY_REFERRER_EXPLAIN'		=> 'Veilige downloads zijn gebaseerd op referrers. Wil je downloads waarvan de referrers ontbreken toestaan?',
	'SETTINGS_CAT_IMAGES'				=> 'Afbeelding categorie instellingen',
	'SPECIAL_CATEGORY'					=> 'Speciale categorie',
	'SPECIAL_CATEGORY_EXPLAIN'			=> 'Speciale categorie&euml;n verschillen door de manier waarop berichten weergegeven worden.',
	'SUCCESSFULLY_UPLOADED'				=> 'Succesvol ge&uuml;pload.',
	'SUCCESS_EXTENSION_GROUP_ADD'		=> 'Extentie groep succesvol toegevoegd.',
	'SUCCESS_EXTENSION_GROUP_EDIT'		=> 'Extentie groep succesvol bijgewerkt.',

	'UPLOADING_FILES'					=> 'Bestanden uploaden',
	'UPLOADING_FILE_TO'					=> 'Bestand &quot;%1$s&quot; uploaden naar bericht ID %2$d...',
	'UPLOAD_DENIED_FORUM'				=> 'Je hebt geen rechten om bestanden te uploaden naar forum &quot;%s&quot;.',
	'UPLOAD_DIR'						=> 'Uploadmap',
	'UPLOAD_DIR_EXPLAIN'				=> 'Uploadmap voor bijlagen. Wanneer je deze map wijzigt nadat er al bestanden ge&uuml;pload zijn, moet je de bestanden handmatig naar de nieuwe map verplaatsen.',
	'UPLOAD_ICON'						=> 'Upload icoon',
	'UPLOAD_NOT_DIR'					=> 'De opgegeven uploadlocatie is niet juist.',
));

?>