<?php
/** 
*
* acp_mods [Dutch]
*
* @package language
* @version $Id: mods.php 69 2009-06-29 20:06:16Z Raimon $
* @copyright (c) 2008 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
/**
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
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine


$lang = array_merge($lang, array(
	'ADDITIONAL_CHANGES'	=> 'Beschikbare veranderingen',

	'AM_MOD_ALREADY_INSTALLED'	=> 'AutoMOD heeft herkend dat deze MOD al is geïnstalleerd en kan niet verder gaan.',

	'APPLY_THESE_CHANGES'	=> 'Deze wijzigingen toepassen',
	'APPLY_TEMPLATESET'		=> 'aan deze template',
	'AUTHOR_EMAIL'			=> 'Auteurse-mail',
	'AUTHOR_INFORMATION'	=> 'Auteursinformatie',
	'AUTHOR_NAME'			=> 'Auteursnaam',
	'AUTHOR_NOTES'			=> 'Auteursopmerkingen',
	'AUTHOR_URL'			=> 'Auteurswebsite',
	'AUTOMOD'				=> 'AutoMOD',
	'AUTOMOD_CANNOT_INSTALL_OLD_VERSION'	=> 'De versie van AutoMOD die u probeert te installeren is al geïnstalleerd. Verwijder deze install/-directory.',
	'AUTOMOD_UNKNOWN_VERSION'	=>	'AutoMOD kon niet worden geupdate omdat het niet kon bepalen welke versie momenteel geïnstalleerd is. De opgesomde versie voor uw installatie is %s.',

	'CAT_INSTALL_AUTOMOD'	=> 'AutoMOD',
	'CHANGE_DATE'	=> 'Uitgebrachte datum',
	'CHANGE_VERSION'=> 'Versienummer',
	'CHANGES'		=> 'Wijzigingen',
	'CHECK_AGAIN'  => 'Opnieuw controleren',
	'COMMENT'		=> 'Commmentaar',
	'CREATE_TABLE'	=> 'Database veranderingen',
	'CREATE_TABLE_EXPLAIN'	=> 'AutoMOD heeft succesvol database veranderingen aangebracht, inclusief een permissie die is toegewezen aan de “volledige beheerder” rol.',

	'DIR_PERMS'			=> 'Directorypermissies',
	'DIR_PERMS_EXPLAIN'	=> 'Sommige systemen verplichten dat directories bepaalde permissies nodig hebben om correct te werken. Normaal is de standaard waarde 0755 correct. Deze instelling heeft geen impact op Windows-systemen.',
	'DIY_INSTRUCTIONS'	=> 'Doe-het-zelf (“DIY”) instructies',
	'DEPENDENCY_INSTRUCTIONS'	=>	'De MOD die u probeerde te installeren is afhankelijk van een andere MOD. AutoMOD kan niet bepalen of deze MOD al is geïnstalleerd. Bevestig dat u deze heeft geïnstalleerd <strong><a href="%1$s">%2$s</a></strong> voordat u deze MOD installeerd.',
	'DESCRIPTION'	=> 'Beschrijving',
	'DETAILS'		=> 'Details',

	'EDITED_ROOT_CREATE_FAIL'	=> 'AutoMOD kon de directory niet aanmaken waar de gewijzigde bestanden zullen worden opgeslagen.',
	'ERROR'			=> 'Fout',

	'FILE_EDITS'		=> 'Bestandswijzigingen',
	'FILE_EMPTY'		=> 'Bestand is leeg',
	'FILE_MISSING'		=> 'Kon bestand niet vinden',
	'FILE_PERMS'		=> 'Bestandspermissies',
	'FILE_PERMS_EXPLAIN'=> 'Sommige systemen verplichten dat bestanden bepaalde permissies nodig hebben om correct te werken. Normaal is de standaard waarde 0644 correct. Deze instelling heeft geen impact op Windows-systemen.',
	'FILE_TYPE'			=> 'Gecomprimeerde bestandstype',
	'FILE_TYPE_EXPLAIN'	=> 'Dit is alleen geldig met de “gecomprimeerd bestand downloaden” schrijf methode',
	'FILESYSTEM_NOT_WRITABLE'	=> 'AutoMOD heeft bepaald dat het bestandsysteem niet schrijfbaar is, dus de directe schrijfmethode kan niet worden gebruikt.',
	'FIND'				=> 'Zoek',
	'FIND_MISSING'		=> 'De opgegeven zoekactie van de MOD kon niet worden gevonden',
	'FORCE_INSTALL'		=> 'Installatie forceren',
	'FORCE_CONFIRM'		=> 'De installatie forceren functie betekend dat de MOD niet volledig is geïnstalleerd. U moet sommige handmatige oplossingen maken om de installatie te voltooien. Hervatten?',
	'FTP_INFORMATION'	=> 'FTP-informatie',
	'FTP_NOT_USABLE'  => 'De FTP-functie kan niet worden gebruikt omdat het is uitgeschakeld door uw hosting.',
	'FTP_METHOD_ERROR' => 'Er is geen FTP-methode gevonden, controleer onder AutoMOD-configuratie of de FTP-methode correct is ingesteld.',

	'INHERIT_NO_CHANGE'	=> 'Er kunnen geen wijzigingen worden gemaakt aan dit bestand, omdat de template %1$s afhankelijk is van %2$s.',
	'INLINE_FIND_MISSING'=> 'De in-regel zoekactie die is opgegeven door deze MOD kon niet worden gevonden.',
	'INSTALL_AUTOMOD'	=> 'AutoMOD-installatie',
	'INSTALL_TIME'		=> 'Installatietijd',
	'INSTALL_MOD'		=> 'Installeer deze MOD',
	'INSTALL_ERROR'		=> 'Eén of meerdere installatie-acties zijn mislukt. Bekijk hieronder de acties en maak enige aanpassingen en probeer het opnieuw. U mag de installatie hervatten, ook al zijn er sommige acties mislukt. <strong>Dit is niet aan te raden en kan er voor zorgen dat sommige functies op uw forum niet correct werken.</strong>',
	'INSTALL_FORCED'	=> 'U forceerde de installatie van deze MOD, terwijl er fouten waren tijdens het installeren van de MOD. U forum kan nu kapot zijn. Bekijk de acties die mislukt zijn, die hier onder weergegeven zijn en corriceer ze.',
	'INSTALLED'			=> 'MOD geïnstalleerd',
	'INSTALLED_EXPLAIN'	=> 'De MOD is geïnstalleerd! Hier kunt u sommige resultaten bekijken van de installatie. Als u enige fouten opmerkt, of als u ondersteuning zoekt kunt u dat verkrijgen op <a href="http://www.phpbb.com">phpBB.com</a> of <a href="http://www.phpbbservice.nl">phpBBservice.nl</a>.',
	'INSTALLED_MODS'	=> 'Geïnstalleerde MODs',
	'INSTALLATION_SUCCESSFUL'	=> 'AutoMOD is succesvol geïnstalleerd. U kunt nu phpBB MODificaties beheren via de AutoMOD-tab in het beheerderspaneel.',
	'INVALID_MOD_INSTRUCTION'	=> 'Deze MOD heeft een ongeldige instructie, of een in-regel zoekactie is mislukt.',

	'LANGUAGE_NAME'		=> 'Taalnaam',

	'MANUAL_COPY'				=> 'Kopie niet geprobeerd',
	'MOD_CONFIG'				=> 'AutoMOD-configuratie',
	'MOD_CONFIG_UPDATED'        => 'AutoMOD-configuratie is bijgewerkt.',
	'MOD_DETAILS'				=> 'MOD-details',
	'MOD_DETAILS_EXPLAIN'		=> 'Hier kunt u alle informatie bekijken over de MOD die u heeft geselecteerd.',
	'MOD_MANAGER'				=> 'AutoMOD',
	'MOD_NAME'					=> 'MOD-naam',
	'MOD_OPEN_FILE_FAIL'		=> 'AutoMOD kon %s niet openen.',
	'AUTOMOD_INSTALLATION'		=> 'AutoMOD-installatie',
	'AUTOMOD_INSTALLATION_EXPLAIN'	=> 'Welkom bij de AutoMOD-installatie. De FTP-gegevens zijn nodig als AutoMOD heeft bepaald dat het de beste manier is om bestanden te schrijven. De vereisten testresultaten zijn hieronder weergegeven.',

	'MODS_CONFIG_EXPLAIN'		=> 'U kunt hier selecteren hoe AutoMOD de bestanden moet wijzigingen. De meest standaard methode is gecomprimeerd bestand downloaden. De andere vereist extra permissies op de server.',
	'MODS_COPY_FAILURE'			=> 'Het bestand %s kon niet worden gekopiëerd naar de juiste locatie. Controleer uw permissies of gebruik een alternatieve schrijfmethode.',
	'MODS_EXPLAIN'				=> 'Hier kunt u beschikbare MODs beheren op u forum. Met MODs kunt u het forum aanpassen doormiddel van modificaties automatisch te installeren die zijn gemaakt door de phpBB-community. Voor meer informatie over MODs en AutoMOD bezoek de <a href="http://www.phpbb.com/mods/">phpBB website</a>.Om een MOD toe te voegen aan deze lijst, pak het uit en upload het naar de /store/mods/-directory op uw server.',
	'MODS_FTP_FAILURE'			=> 'AutoMOD kon niet via de FTP het bestand %s naar de juiste locatie plaatsen',
	'MODS_FTP_CONNECT_FAILURE'	=> 'AutoMOD kon geen verbinding leggen met uw FTP-server. De fout was %s',
	'MODS_MKDIR_FAILED'			=> 'De directory %s kon niet worden aangemaakt',
	'MODS_SETUP_INCOMPLETE'		=> 'Een probleem was gevonden met uw configuratie, en AutoMOD kan niet werken. Dit gebeurt alleen wanneer instellingen (bijvoorbeeld; FTP-gebruikersnaam) zijn gewijzigd, en kan gecorigeerd worden in de AutoMOD-configuratiepagina.',

	'NAME'			=> 'Naam',
	'NEW_FILES'		=> 'Nieuwe bestanden',
	'NO_ATTEMPT'	=> 'Niet geprobeerd',
	'NO_INSTALLED_MODS'		=> 'Geen geïnstalleerde MODs gevonden',
	'NO_MOD'				=> 'De geselecteerde MODs konden niet worden gevonden.',
	'NO_UNINSTALLED_MODS'	=> 'Geen gedeïnstalleerde MODs gevonden',	

	'ORIGINAL'	=> 'Orgineel',

	'PATH'					=> 'Pad',
	'PREVIEW_CHANGES'		=> 'Voorbeeld wijzigingen',
	'PREVIEW_CHANGES_EXPLAIN'	=> 'Weergeeft de wijzigingen die moeten worden gedaan, voordat ze worden uitgevoerd.',
	'PRE_INSTALL'			=> 'Installatie voorbereiden',
	'PRE_INSTALL_EXPLAIN'	=> 'Hier kunt u alle modificatie-voorbeelden bekijken die worden aangebracht aan uw forum, voordat ze worden uitgevoerd.<strong>WAARSCHUWING!</strong>, wanneer u het accepteert, zullen uw basis phpBB-bestanden worden gewijzigd en enige database aanpassingen zullen worden uitgevoerd. Maar, als de installatie niet succesvol is, we gaan er van uit dat u AutoMOD gewoon kan betreden, dan kunt u op een gegeven moment, naar dit punt herstellen.',
	'PRE_UNINSTALL'			=> 'Deïnstallatie voorbereiden',
	'PRE_UNINSTALL_EXPLAIN'	=> 'Hier kunt u alle modificatie-voorbeelden bekijken die zijn aangebracht aan uw forum, om de MOD te kunnen deïnstalleren. <strong>WAARSCHUWING!</strong>, wanneer het is geaccepteerd, zullen de basis phpBB-bestanden worden gewijzigd en enige database aanpassingen zullen worden uitgevoerd. Ook dit procces gebruikt terugdraaiende technieken die mogelijk niet 100% nauwkeurig kunnen zijn. Maar, als de deïnstallatie niet succesvol is, we gaan er van uit dat u AutoMOD gewoon kan betreden, dan kunt u op een gegeven moment, naar dit punt herstellen.',

	'REMOVING_FILES'	=> 'Bestanden die moeten worden verwijderd',
	'RETRY'				=> 'Opnieuw',
	'RETURN_MODS'		=> 'Terug naar AutoMOD',
	'REVERSE'			=> 'Terugdraaien',
	'ROOT_IS_READABLE'	=> 'De phpBB-hoofddirectory is niet schrijfbaar.',
	'ROOT_NOT_READABLE'	=> 'AutoMOD kon phpBB’s index.php niet openen om te lezen. Dit betekend meestal dat de permissies te streng zijn ingestelt op uw phpBB-hoofddirectory, wat voorkomt dat AutoMOD correct kan werken. Pas de permissies aan en probeer het opnieuw.',


	'SOURCE'		=> 'Bron',
	'SQL_QUERIES'	=> 'SQL-queries',
	'STATUS'		=> 'Status',
	'STORE_IS_WRITABLE'			=> 'De store/-directory is onschrijfbaar.',
	'STORE_NOT_WRITABLE_INST'	=> 'De AutoMOD-installatie heeft bepaald dat de store/-dirtectory niet schrijfbaar is. Dit is verplicht om AutoMOD correct te laten werken. Pas uw permissies aan en probeer het opnieuw.',
	'STORE_NOT_WRITABLE'		=> 'De store/-directory is niet schrijfbaar.',
	'STYLE_NAME'	=> 'Stijlnaam',
	'SUCCESS'		=> 'Success',

	'TARGET'		=> 'Doel',

	'UNKNOWN_MOD_AUTHOR-NOTES'	=> 'Geen auteurnotitities waren er opgegeven.',
	'UNKNOWN_MOD_COMMENT'		=> '',
	'UNKNOWN_MOD_INLINE-COMMENT'=> '',
	'UNKNOWN_QUERY_REVERSE' => 'Onbekende reserve query',

	'UNINSTALL'				=> 'Deïnstallatie',
	'UNINSTALLED'			=> 'MOD gedeïnstalleerd',
	'UNINSTALLED_MODS'		=> 'Gedeïnstalleerde MODs',
	'UNINSTALLED_EXPLAIN'	=> 'De MOD is gedeïnstalleerd! Hier kunt u sommige resultaten bekijken van de deïnstallatie. Als u enige fouten opmerkt, of als u ondersteuning zoekt kunt u dat verkrijgen op <a href="http://www.phpbb.com">phpBB.com</a> of <a href="http://www.phpbbservice.nl">phpBBservice.nl</a>.',
	'UPDATE_AUTOMOD'		=> 'AutoMOD updaten',
	'UPDATE_AUTOMOD_CONFIRM'=> 'Bevestig als u AutoMOD wilt updaten.',

	'VERSION'		=> 'Versie',

	'WRITE_DIRECT_FAIL'		=> 'AutoMOD kon het bestand %s niet kopiëren naar de juiste locatie met het gebruik van de directe methode. Gebruik een andere methode en probeer het opnieuw.',
	'WRITE_DIRECT_TOO_SHORT'=> 'AutoMOD kon het schrijven naar het bestand %s niet voltooien. Dit kan meestal worden opgelost met de opnieuw-knop. Als dit niet werkt, probeer dan een andere schrijfmethode.',
	'WRITE_MANUAL_FAIL'		=> 'AutoMOD kon het bestand %s niet toevoegen aan een gecomprimeerd archief. Probeer een andere schrijfmethode.',
	'WRITE_METHOD'			=> 'Schrijfmethode',
	'WRITE_METHOD_DIRECT'	=> 'Direct',
	'WRITE_METHOD_EXPLAIN'	=> 'U kunt een voorkeuringsmethode instellen om bestanden te schrijven. De meest compitable optie is “gecomprimeerd bestand downloaden”.',
	'WRITE_METHOD_FTP'		=> 'FTP',
	'WRITE_METHOD_MANUAL'	=> 'Gecomprimeerd bestand downloaden',

	// These keys for action names are purposely lower-cased and purposely contain spaces
	'after add'				=> 'Voeg erna toe',
	'before add'			=> 'Voeg ervoor toe',
	'find'					=> 'Zoek',
	'in-line-after-add'		=> 'Voeg in de regel, erna, toe',
	'in-line-before-add'	=> 'Voeg in de regel, ervoor, toe',
	'in-line-edit'			=> 'In-regel zoekactie',
	'in-line-operation'		=> 'In-regel verhogen',
	'in-line-replace'		=> 'In-regel vervang',
	'in-line-replace-with'	=> 'In-regel vervang met',
	'replace'				=> 'Vervang',
	'replace with'			=> 'Vervang met',
	'operation'				=> 'Verhogen',
));

?>