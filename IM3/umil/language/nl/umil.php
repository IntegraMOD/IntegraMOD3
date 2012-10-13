<?php
/**
 * umil [Nederlands]
 *
 * @author Nathan Guse (EXreaction) http://lithiumstudios.org
 * @author David Lewis (Highway of Life) highwayoflife@gmail.com
 * @package umil
 * @version $Id: umil.php 157 2009-07-03 18:43:48Z exreaction $
 * @copyright (c) 2008 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * vertaald door integramod.nl
 */

/**
 * @ignore
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACTION'						=> 'Actie',
	'ADVANCED'						=> 'Geavanceerd',
	'AUTH_CACHE_PURGE'				=> 'Auth cache legen',

	'CACHE_PURGE'					=> 'Forum cache legen',
	'CONFIGURE'						=> 'Configureren',
	'CONFIG_ADD'					=> 'Nieuwe config variabel : %s' toevoegen,
	'CONFIG_ALREADY_EXISTS'			=> 'FOUT: Config variabele %s bestaat al.',
	'CONFIG_NOT_EXIST'				=> 'FOUT: Config variabele %s bestaat niet.',
	'CONFIG_REMOVE'					=> 'Verwijder config variabele: %s',
	'CONFIG_UPDATE'					=> 'Bijwerken config variabele: %s',

	'DISPLAY_RESULTS'				=> 'Toon volledige resultaten',
	'DISPLAY_RESULTS_EXPLAIN'		=> 'Selecteer ja om alle acties en resultaten te tonen tijdens de aangevraagde actie.',

	'ERROR_NOTICE'					=> '&Eacute;&eacute;n of meer fouten zijn er opgetreden tijdens de aangevraagde actie. Download <a href="%1$s">dit bestand</a> met daarin alle fouten die er worden weergegeven en vraag de MOD auteur om hulp.<br /><br />Als je problemen hebt met het downloaden van dat bestand, dan kun je het direct met een FTP-client downloaden vanaf de volgende locatie: %2$s',
	'ERROR_NOTICE_NO_FILE'			=> '&Eacute;&eacute;n of meer fouten zijn er opgetreden tijdens de aangevraagde actie. Maak een volledig verslag van alle fouten en vraag de MOD auteur voor hulp.',

	'FAIL'							=> 'Mislukt',
	'FILE_COULD_NOT_READ'			=> 'FOUT: Kon het bestand %s niet openen om te lezen.',
	'FOUNDERS_ONLY'					=> 'Je moet oprichters rechten hebben om deze pagina te kunnen openen.',

	'GROUP_NOT_EXIST'				=> 'Groep bestaat niet',

	'IGNORE'						=> 'Negeren',
	'IMAGESET_CACHE_PURGE'			=> 'De afbeeldingenset %s wordt vernieuwd',
	'INSTALL'						=> 'Installeren',
	'INSTALL_MOD'					=> 'Installeren %s',
	'INSTALL_MOD_CONFIRM'			=> 'Ben je klaar om %s te installeren?',

	'MODULE_ADD'					=> 'Toevoegen %1$s module: %2$s',
	'MODULE_ALREADY_EXIST'			=> 'FOUT: Module bestaat al.',
	'MODULE_NOT_EXIST'				=> 'FOUT: Module bestaat niet.',
	'MODULE_REMOVE'					=> 'Verwijderen %1$s module: %2$s',

	'NONE'							=> 'Geen',
	'NO_TABLE_DATA'					=> 'FOUT: Er is geen tabel data opgegeven',

	'PARENT_NOT_EXIST'				=> 'FOUT: De opgegeven hoofdcategorie voor deze module bestaat niet.',
	'PERMISSIONS_WARNING'			=> 'Nieuwe rechten instellingen zijn toegevoegd. Kijk de rechten instellingen na en bekijk of ze zijn zoals jij ze wilt hebben.',
	'PERMISSION_ADD'				=> 'Toeveoegen nieuwe rechten optie: %s',
	'PERMISSION_ALREADY_EXISTS'		=> 'FOUT: Rechten optie %s bestaat al.',
	'PERMISSION_NOT_EXIST'			=> 'FOUT: Rechten optie %s bestaat niet.',
	'PERMISSION_REMOVE'				=> 'Verwijderen van rechten optie: %s',
	'PERMISSION_SET_GROUP'			=> 'Instellen van rechten voor de %s groep.',
	'PERMISSION_SET_ROLE'			=> 'Instellen van rechten voor de %s rol.',
	'PERMISSION_UNSET_GROUP'		=> 'Rechten instellingen ongedaan maken van de %s groep.',
	'PERMISSION_UNSET_ROLE'			=> 'Rechten instellingen ongedaan maken van de %s rol.',

	'ROLE_NOT_EXIST'				=> 'Rol bestaat niet',

	'SUCCESS'						=> 'Succes',

	'TABLE_ADD'						=> 'Toevoegen van een nieuwe database tabel: %s',
	'TABLE_ALREADY_EXISTS'			=> 'FOUT: Database tabel %s bestaat al.',
	'TABLE_COLUMN_ADD'				=> 'Toevoegen van een nieuwe kolom %2$s aan tabel %1$s',
	'TABLE_COLUMN_ALREADY_EXISTS'	=> 'FOUT: De kolom %2$s bestaat al in tabel %1$s.',
	'TABLE_COLUMN_NOT_EXIST'		=> 'FOUT: De kolom %2$s bestaat niet in tabel %1$s.',
	'TABLE_COLUMN_REMOVE'			=> 'Verwijderen van de kolom genaamd %2$s van tabel %1$s',
	'TABLE_COLUMN_UPDATE'			=> 'Bijwerken van een kolom genaamd %2$s van tabel %1$s',
	'TABLE_KEY_ADD'					=> 'Toevoegen van een sleutel genaamd %2$s aan tabel %1$s',
	'TABLE_KEY_ALREADY_EXIST'		=> 'FOUT: Index %2$s bestaat al in tabel %1$s.',
	'TABLE_KEY_NOT_EXIST'			=> 'FOUT: Index %2$s bestaat niet in tabel %1$s.',
	'TABLE_KEY_REMOVE'				=> 'Verwijderen van de sleutel %2$s van tabel %1$s',
	'TABLE_NOT_EXIST'				=> 'FOUT: Database tabel %s bestaat niet.',
	'TABLE_REMOVE'					=> 'Verwijderen van database tabel: %s',
	'TABLE_ROW_INSERT_DATA'			=> 'Data toevoegen in de %s database tabel.',
	'TABLE_ROW_REMOVE_DATA'			=> 'Verwijderen van een rij van de %s database tabel',
	'TABLE_ROW_UPDATE_DATA'			=> 'Bijwerken van een rij in de %s database tabel.',
	'TEMPLATE_CACHE_PURGE'			=> 'Vernieuwen van de %s template',
	'THEME_CACHE_PURGE'				=> 'Vernieuwen van het %s thema',

	'UNINSTALL'						=> 'De-installeren',
	'UNINSTALL_MOD'					=> '%s' de-installeren,
	'UNINSTALL_MOD_CONFIRM'			=> 'Ben je klaar om %s te de-installeren? Alle instellingen en gegevens opgeslagen door deze MOD zullen worden verwijderd!',
	'UNKNOWN'						=> 'Onbekend',
	'UPDATE_MOD'					=> 'Bijwerken %s',
	'UPDATE_MOD_CONFIRM'			=> 'Ben je klaar om %s bij te werken?',
	'UPDATE_UMIL'					=> 'Deze versie van UMIL is verouderd.<br /><br />Download alstublieft de laatste UMIL (Unified MOD Install Library) van: <a href="%1$s">%1$s</a>',

	'VERSIONS'						=> 'MOD versie: <strong>%1$s</strong><br />Op dit moment ge&iuml;nstalleerd: <strong>%2$s</strong>',
	'VERSION_SELECT'				=> 'Versie selecteren',
	'VERSION_SELECT_EXPLAIN'		=> 'Verander niet “negeren” tenzij je weet wat je aan het doen bent, of als het je verteld werd om dit te doen.',
));

?>