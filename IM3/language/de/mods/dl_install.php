<?PHP

/** 
*
* @mod package		Download Mod 6
* @file				dl_install.php 2 2008/05/28 OXPUS
* @copyright		(c) 2008 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* [ german ] language file for Download MOD 6
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

$lang = array_merge($lang, array(
	'DL_INSTALL_INTRO'			=> '<strong>Download MOD Installation</strong><br /><br />Hiermit kannst Du alle nötigen Datenbankänderungen für den Download MOD automatisch durchführen lassen.<br />Es werden dabei alle benötigten Tabellen angelegt und Standard-Werte eingetragen.<br />Um die Installation zu beginnen, klicke auf den Button "Ja".<br /><br />Bitte stelle vorher sicher, daß keine Tabellen oder Werte des Download MOD bereits in der Datenbank vorhanden sind!',
	'DL_INSTALL_FINISHED'		=> '<strong>Glückwunsch!</strong><br />Die Installation der Download MOD Datenbankeinträge ist hiermit abgeschlossen.<br /><br />Bitte lösche nun noch das Verzeichnis umil/ und die Datei install.php aus Deinem Forum-Hauptverzeichnis.',

	'DL_UPDATE_INTRO'			=> '<strong>Download MOD Update</strong><br /><br />Hiermit kannst Du eine bestehende Download MOD Installation auf den neuesten Stand bringen.<br /><br />Dieses Script aktualisiert alle Tabellen ab der Download MOD Version 5.0.0.<br />Alle hierfür nötigen Arbeiten an den Datenbanktabellen werden dabei automatisch vorgenommen.<br /><br />Klicke für das Update nun auf den Button "Ja", um mit der Aktualisierung zu beginnen.',
	'DL_UPDATE_FINISHED'		=> '<strong>Glückwunsch!</strong><br /><br />Das Update der Download MOD Datenbankeinträge ist hiermit abgeschlossen.<br /><br />Bitte lösche jetzt das Verzeichnis umil/ und die Datei install.php aus Deinem Forum-Hauptverzeichnis.',

	'DL_CONVERT_NO'				=> '<strong>Du hast eine nicht unterstützte Version der MOD installiert.</strong><br /><br />Wenn die MOD älter als Version 5.2.0 ist, dann aktualisiere sie zunächst.<br />Verwendest du bereits Version 6.x, dann aktualiere sie gemäß der MOD Update-Anleitungen.',
	'DL_CONVERT_FINISH'			=> '<strong>Konvertierung erfolgreich abgeschlossen</strong><br /><br />Bitte führe nun die Aktualisierungen der MOD bis zur neuesten Version hin aus und lösche diese Datei aus deinem Forum.',
	'DL_CONVERT_MOD'			=> '<strong>Konvertierung der Download-Daten</strong><br /><br />Dieses Script konvertiert die Daten aus deiner bisherigen Installation für phpBB 2 in das neue Format des phpBB 3. Dabei werden nur die Formatfelder und die Inhalte in den Tabellen geändert.<br />Um die MOD selber auf den neuesten Stand zu bringen, aktualisiere sie danach, wie in den Update-Anleitungen enthalten.<br />Klicke nun auf "Ja", um die Konvertierung zu starten.',
));

?>