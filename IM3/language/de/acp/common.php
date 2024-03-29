<?php
/**
*
* acp_common [Deutsch — Du]
*
* @package language
* @version $Id: common.php 400 2009-09-19 19:58:20Z philippk $
* @copyright (c) 2005 phpBB Group; 2006 phpBB.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* (http://www.phpbb.de/go/3/uebersetzer)
* Frank Doerr, Ingo Köhler, Fabian Koglin, Philipp Kordowich, Ingo Migliarina, Martin Rauscher
* Ehemalige Mitglieder: Dirk Gaffke
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

// Common
$lang = array_merge($lang, array(
	'ACP_ADMINISTRATORS'		=> 'Administratoren',
	'ACP_ADMIN_LOGS'			=> 'Administrations-Protokoll',
	'ACP_ADMIN_ROLES'			=> 'Administrator-Rollen',
	'ACP_ATTACHMENTS'			=> 'Dateianhang-Konfiguration',
	'ACP_ATTACHMENT_SETTINGS'	=> 'Dateianhänge',
	'ACP_AUTH_SETTINGS'			=> 'Authentifizierung',
	'ACP_AUTOMATION'			=> 'Automatisierung',
	'ACP_AVATAR_SETTINGS'		=> 'Avatare',

	'ACP_BACKUP'				=> 'Backup',
	'ACP_BAN'					=> 'Sperren',
	'ACP_BAN_EMAILS'			=> 'E-Mail-Adressen sperren',
	'ACP_BAN_IPS'				=> 'IP-Adressen sperren',
	'ACP_BAN_USERNAMES'			=> 'Benutzernamen sperren',
	'ACP_BBCODES'				=> 'BBCodes',
	'ACP_BOARD_CONFIGURATION'	=> 'Board-Konfiguration',
	'ACP_BOARD_FEATURES'		=> 'Board-Funktionalitäten',
	'ACP_BOARD_MANAGEMENT'		=> 'Board-Verwaltung',
	'ACP_BOARD_SETTINGS'		=> 'Board-Einstellungen',
	'ACP_BOTS'					=> 'Spiders/Robots',

//---BEGIN CALENDAR MOD---
	'ACP_CALENDAR'              => 'Kalender',
    'ACP_CALENDAR_MOD'          => 'Kalender',
    'ACP_CALENDAR_SETTINGS'     => 'Kalender Einstellungen',
    'ACP_CALENDAR_USERS'        => 'Kalender Benutzer-Einstellungen',
//---END CALENDAR MOD---
	'ACP_CAPTCHA'				=> 'CAPTCHA',

	'ACP_CAT_DATABASE'			=> 'Datenbank',
	'ACP_CAT_DOT_MODS'			=> 'Mods',
	'ACP_CAT_FORUMS'			=> 'Foren',
	'ACP_CAT_GENERAL'			=> 'Allgemein',
	'ACP_CAT_MAINTENANCE'		=> 'Wartung',
	'ACP_CAT_PERMISSIONS'		=> 'Berechtigungen',
	'ACP_CAT_POSTING'			=> 'Beiträge',
	'ACP_CAT_STYLES'			=> 'Styles',
	'ACP_CAT_SYSTEM'			=> 'System',
	'ACP_CAT_USERGROUP'			=> 'Benutzer und Gruppen',
	'ACP_CAT_USERS'				=> 'Benutzer',
	'ACP_CLIENT_COMMUNICATION'	=> 'Client-Kommunikation',
	'ACP_COOKIE_SETTINGS'		=> 'Cookies',
	'ACP_CRITICAL_LOGS'			=> 'Fehler-Protokoll',
	'ACP_CUSTOM_PROFILE_FIELDS'	=> 'Benutzerdefinierte Profilfelder',

	'ACP_DATABASE'				=> 'Datenbank-Verwaltung',
	'ACP_DISALLOW'				=> 'Verbieten',
	'ACP_DISALLOW_USERNAMES'	=> 'Benutzernamen verbieten',

	'ACP_EMAIL_SETTINGS'		=> 'Board-E-Mails',
	'ACP_EXTENSION_GROUPS'		=> 'Dateityp-Gruppen verwalten',

	'ACP_FORUM_BASED_PERMISSIONS'	=> 'Forenbasierte Berechtigungen',
	'ACP_FORUM_LOGS'				=> 'Forums-Protokolle',
	'ACP_FORUM_MANAGEMENT'			=> 'Forums-Verwaltung',
	'ACP_FORUM_MODERATORS'			=> 'Foren-Moderatoren',
	'ACP_FORUM_PERMISSIONS'			=> 'Forenrechte',
	'ACP_FORUM_PERMISSIONS_COPY'	=> 'Forenrechte kopieren',
	'ACP_FORUM_ROLES'				=> 'Forums-Rollen',

	'ACP_GENERAL_CONFIGURATION'		=> 'Allgemeine Konfiguration',
	'ACP_GENERAL_TASKS'				=> 'Allgemeine Funktionen',
	'ACP_GLOBAL_MODERATORS'			=> 'Globale Moderatoren',
	'ACP_GLOBAL_PERMISSIONS'		=> 'Allgemeine Berechtigungen',
	'ACP_GROUPS'					=> 'Gruppen',
	'ACP_GROUPS_FORUM_PERMISSIONS'	=> 'Gruppenspezifische Forenrechte',
	'ACP_GROUPS_MANAGE'				=> 'Gruppen verwalten',
	'ACP_GROUPS_MANAGEMENT'			=> 'Gruppen-Verwaltung',
	'ACP_GROUPS_PERMISSIONS'		=> 'Gruppenrechte',

	'ACP_ICONS'					=> 'Beitrags-Symbole',
	'ACP_ICONS_SMILIES'			=> 'Beitrags-Symbole/Smilies',
	'ACP_IMAGESETS'				=> 'Grafiksammlungen',
	'ACP_INACTIVE_USERS'		=> 'Inaktive Benutzer',
	'ACP_INDEX'					=> 'Admin-Übersicht',

	'ACP_JABBER_SETTINGS'		=> 'Jabber-Nachrichten',

	'ACP_LANGUAGE'				=> 'Sprachen-Verwaltung',
	'ACP_LANGUAGE_PACKS'		=> 'Sprachpakete',
	'ACP_LOAD_SETTINGS'			=> 'Serverlast',
	'ACP_LOGGING'				=> 'Protokollierung',

	'ACP_MAIN'					=> 'Admin-Übersicht',
	'ACP_MANAGE_EXTENSIONS'		=> 'Dateitypen verwalten',
	'ACP_MANAGE_FORUMS'			=> 'Foren verwalten',
	'ACP_MANAGE_RANKS'			=> 'Ränge verwalten',
	'ACP_MANAGE_REASONS'		=> 'Meldungs-/Ablehnungs-Gründe verwalten',
	'ACP_MANAGE_USERS'			=> 'Benutzer verwalten',
	'ACP_MASS_EMAIL'			=> 'Massen-E-Mail',
	'ACP_MESSAGES'				=> 'Nachrichten',
	'ACP_MESSAGE_SETTINGS'		=> 'Private Nachrichten',
	'ACP_MODULE_MANAGEMENT'		=> 'Modul-Konfiguration',
	'ACP_MOD_LOGS'				=> 'Moderations-Protokoll',
	'ACP_MOD_ROLES'				=> 'Moderator-Rollen',

	'ACP_NO_ITEMS'				=> 'Es gibt bislang keine Einträge.',

	'ACP_ORPHAN_ATTACHMENTS'	=> 'Verwaiste Dateianhänge',

	'ACP_PERMISSIONS'			=> 'Berechtigungen',
	'ACP_PERMISSION_MASKS'		=> 'Effektive Berechtigungen',
	'ACP_PERMISSION_ROLES'		=> 'Berechtigungs-Rollen',
	'ACP_PERMISSION_TRACE'		=> 'Berechtigungs-Verfolgung',
	'ACP_PHP_INFO'				=> 'PHP-Information',
	'ACP_POST_SETTINGS'			=> 'Beiträge',
	'ACP_PRUNE_FORUMS'			=> 'Automatisches Löschen inaktiver Themen',
	'ACP_PRUNE_USERS'			=> 'Automatisches Löschen inaktiver Benutzer',
	'ACP_PRUNING'				=> 'Automatisches Löschen',

	'ACP_QUICK_ACCESS'			=> 'Schnellzugriff',

	'ACP_RANKS'					=> 'Ränge',
	'ACP_REASONS'				=> 'Meldungs-/Ablehnungs-Gründe',
	'ACP_REGISTER_SETTINGS'		=> 'Registrierung',

	'ACP_RESTORE'				=> 'Wiederherstellen',

	'ACP_FEED'					=> 'Feed-Verwaltung',
	'ACP_FEED_SETTINGS'			=> 'Feed-Einstellungen',

	'ACP_SEARCH'				=> 'Such-Konfiguration',
	'ACP_SEARCH_INDEX'			=> 'Such-Indizes',
	'ACP_SEARCH_SETTINGS'		=> 'Suchfunktion',

	'ACP_SECURITY_SETTINGS'		=> 'Sicherheit',
	'ACP_SEND_STATISTICS'		=> 'Statistische Daten übermitteln',
	'ACP_SERVER_CONFIGURATION'	=> 'Server-Konfiguration',
	'ACP_SERVER_SETTINGS'		=> 'Server und Domain',
	'ACP_SIGNATURE_SETTINGS'	=> 'Signaturen',
	'ACP_SMILIES'				=> 'Smilies',
	'ACP_STYLE_COMPONENTS'		=> 'Style-Komponenten',
	'ACP_STYLE_MANAGEMENT'		=> 'Style-Verwaltung',
	'ACP_STYLES'				=> 'Styles',

	'ACP_SUBMIT_CHANGES'		=> 'Änderungen übermitteln',

	'ACP_TEMPLATES'				=> 'Templates',
	'ACP_THEMES'				=> 'Themes',

	'ACP_UPDATE'					=> 'Aktualisieren',
	'ACP_USERS_FORUM_PERMISSIONS'	=> 'Benutzerspezifische Forenrechte',
	'ACP_USERS_LOGS'				=> 'Benutzer-Protokoll',
	'ACP_USERS_PERMISSIONS'			=> 'Benutzerrechte',
	'ACP_USER_ATTACH'				=> 'Dateianhänge',
	'ACP_USER_AVATAR'				=> 'Avatar',
	'ACP_USER_FEEDBACK'				=> 'Feedback',
	'ACP_USER_GROUPS'				=> 'Gruppen',
	'ACP_USER_MANAGEMENT'			=> 'Benutzer-Verwaltung',
	'ACP_USER_OVERVIEW'				=> 'Übersicht',
	'ACP_USER_PERM'					=> 'Berechtigungen',
	'ACP_USER_PREFS'				=> 'Einstellungen',
	'ACP_USER_PROFILE'				=> 'Profil',
	'ACP_USER_RANK'					=> 'Benutzerrang',
	'ACP_USER_ROLES'				=> 'Benutzer-Rollen',
	'ACP_USER_SECURITY'				=> 'Benutzer-Sicherheit',
	'ACP_USER_SIG'					=> 'Signatur',
	'ACP_USER_WARNINGS'				=> 'Verwarnungen',

	'ACP_VC_SETTINGS'					=> 'CAPTCHA-Modul-Einstellungen',
	'ACP_VC_CAPTCHA_DISPLAY'			=> 'CAPTCHA Bild-Vorschau',
	'ACP_VERSION_CHECK'					=> 'Auf Update prüfen',
	'ACP_VIEW_ADMIN_PERMISSIONS'		=> 'Administrator-Berechtigungen anzeigen',
	'ACP_VIEW_FORUM_MOD_PERMISSIONS'	=> 'Moderator-Berechtigungen anzeigen',
	'ACP_VIEW_FORUM_PERMISSIONS'		=> 'Forums-Berechtigungen anzeigen',
	'ACP_VIEW_GLOBAL_MOD_PERMISSIONS'	=> 'Globale Moderations-Berechtigungen anzeigen',
	'ACP_VIEW_USER_PERMISSIONS'			=> 'Benutzer-Berechtigungen anzeigen',

	'ACP_WORDS'					=> 'Wortzensur',

	'ACTION'				=> 'Vorgang',
	'ACTIONS'				=> 'Vorgänge',
	'ACTIVATE'				=> 'Aktivieren',
	'ADD'					=> 'Hinzufügen',
	'ADMIN'					=> 'Administration',
	'ADMIN_INDEX'			=> 'Admin-Übersicht',
	'ADMIN_PANEL'			=> 'Administrations-Bereich',

	'ADM_LOGOUT'			=> 'Verlassen',
	'ADM_LOGGED_OUT'		=> 'Du wurdest erfolgreich vom Administrations-Bereich abgemeldet.',

	'BACK'					=> 'Zurück',

	'COLOUR_SWATCH'			=> 'Websichere Farbpalette',
	'CONFIG_UPDATED'		=> 'Konfiguration erfolgreich aktualisiert.',

	'DEACTIVATE'				=> 'Deaktivieren',
	'DIRECTORY_DOES_NOT_EXIST'	=> 'Der angegebene Pfad „%s“ existiert nicht.',
	'DIRECTORY_NOT_DIR'			=> 'Der angegebene Pfad „%s“ ist kein Verzeichnis.',
	'DIRECTORY_NOT_WRITABLE'	=> 'Der angegebene Pfad „%s“ ist nicht beschreibbar.',
	'DISABLE'					=> 'Deaktivieren',
	'DOWNLOAD'					=> 'Herunterladen',
	'DOWNLOAD_AS'				=> 'Herunterladen als',
	'DOWNLOAD_STORE'			=> 'Datei herunterladen oder speichern',
	'DOWNLOAD_STORE_EXPLAIN'	=> 'Du kannst die Datei direkt herunterladen oder sie in deinem <samp>store/</samp>-Ordner speichern.',

	'EDIT'					=> 'Ändern',
	'ENABLE'				=> 'Aktivieren',
	'EXPORT_DOWNLOAD'		=> 'Herunterladen',
	'EXPORT_STORE'			=> 'Speichern',

	'GENERAL_OPTIONS'		=> 'Allgemeine Optionen',
	'GENERAL_SETTINGS'		=> 'Allgemeine Einstellungen',
	'GLOBAL_MASK'			=> 'Global effektive Berechtigungen',

	'INSTALL'				=> 'Installieren',
	'IP'					=> 'Benutzer-IP',
	'IP_HOSTNAME'			=> 'IP-Adressen oder Host-Namen',

	'LOGGED_IN_AS'			=> 'Du bist angemeldet als:',
	'LOGIN_ADMIN'			=> 'Um das Board administrieren zu können, musst du ein authentifizierter Benutzer sein.',
	'LOGIN_ADMIN_CONFIRM'	=> 'Um das Board administrieren zu können, musst du deine Anmeldung bestätigen.',
	'LOGIN_ADMIN_SUCCESS'	=> 'Du hast deine Anmeldung erfolgreich bestätigt und wirst nun zum Administrations-Bereich weitergeleitet.',
	'LOOK_UP_FORUM'			=> 'Wähle ein Forum aus',
	'LOOK_UP_FORUMS_EXPLAIN'=> 'Du kannst mehr als ein Forum auswählen.',

	'MANAGE'				=> 'Verwalte',
	'MENU_TOGGLE'			=> 'Seitenmenü aus- oder einblenden',
	'MORE'					=> 'Mehr',			// Not used at the moment
	'MORE_INFORMATION'		=> 'Mehr Informationen »',
	'MOVE_DOWN'				=> 'Nach unten',
	'MOVE_UP'				=> 'Nach oben',

	'NOTIFY'				=> 'Benachrichtigung',
	'NO_ADMIN'				=> 'Du bist nicht berechtigt, dieses Board zu administrieren.',
	'NO_EMAILS_DEFINED'		=> 'Keine gültigen E-Mail-Adressen gefunden.',
	'NO_PASSWORD_SUPPLIED'	=> 'Du musst deine Anmeldung bestätigen, um auf den Administrations-Bereich zugreifen zu können.',

	'OFF'					=> 'Aus',
	'ON'					=> 'An',

	'PARSE_BBCODE'						=> 'BBCode erkennen',
	'PARSE_SMILIES'						=> 'Smilies erkennen',
	'PARSE_URLS'						=> 'Links erkennen',
	'PERMISSIONS_TRANSFERRED'			=> 'Berechtigungen übernommen',
	'PERMISSIONS_TRANSFERRED_EXPLAIN'	=> 'Du hast derzeit die Berechtigungen von %1$s übernommen. Du kannst das Board mit den Rechten dieses Benutzers testen; du kannst jedoch nicht den Administrations-Bereich benutzen, da Administrations-Rechte nicht übernommen werden. Du kannst jederzeit <a href="%2$s"><strong>zu deinen Berechtigungen zurückkehren</strong></a>.',
	'PIXEL'								=> 'px',
	'PROCEED_TO_ACP'					=> '%sZum Administrations-Bereich%s',

	'REMIND'							=> 'Erinnern',
	'RESYNC'							=> 'Synchronisieren',
	'RETURN_TO'							=> 'Zurück zu …',

	'SETTING_TOO_LOW'		=> 'Der für die Einstellung „%1$s“ angegebene Wert ist zu niedrig. Der Wert muss mindestens %2$d betragen.',
	'SETTING_TOO_BIG'		=> 'Der für die Einstellung „%1$s“ angegebene Wert ist zu hoch. Der Wert darf maximal %2$d betragen.',
	'SETTING_TOO_LONG'		=> 'Der für die Einstellung „%1$s“ angegebene Wert ist zu lang. Die maximal zulässige Länge ist %2$d Zeichen.',
	'SETTING_TOO_SHORT'		=> 'Der für die Einstellung „%1$s“ angegebene Wert ist zu kurz. Die minimal erforderliche Länge ist %2$d Zeichen.',

	'SHOW_ALL_OPERATIONS'	=> 'Alle Vorgänge anzeigen',

	'SELECT_ANONYMOUS'		=> 'Gäste-Benutzerkonto auswählen',
	'SELECT_OPTION'			=> 'Option auswählen',

	'UCP'					=> 'Persönlicher Bereich',
	'USERNAMES_EXPLAIN'		=> 'Verwende für jeden Benutzernamen eine neue Zeile.',
	'USER_CONTROL_PANEL'	=> 'Persönlicher Bereich',

	'WARNING'				=> 'Warnung',
));

// PHP info
$lang = array_merge($lang, array(
	'ACP_PHP_INFO_EXPLAIN'	=> 'Auf dieser Seite findest du Informationen zu der auf deinem Server installierten PHP-Version. Sie enthält Details zu den geladenen Modulen, den verfügbaren Variablen und Einstellungen. Diese Informationen können bei der Problemsuche hilfreich sein. Bitte beachte, dass manche Internet-Provider die hier angezeigten Informationen aus Sicherheitsgründen einschränken. Du solltest keine Informationen von dieser Seite veröffentlichen, sofern dich nicht ein offizielles Team-Mitglied des Support-Forums dazu auffordert.',

	'NO_PHPINFO_AVAILABLE'	=> 'Es konnten keine Informationen über deine PHP-Installation ermittelt werden. phpinfo() wurde vermutlich aus Sicherheitsgründen deaktiviert.',
));

// Logs
$lang = array_merge($lang, array(
	'ACP_ADMIN_LOGS_EXPLAIN'	=> 'Diese Liste zeigt alle Vorgänge, die von Board-Administratoren durchgeführt wurden. Du kannst nach Benutzername, Datum, IP-Adresse oder Vorgang sortieren. Sofern du ausreichende Rechte hast, kannst du auch einzelne Einträge oder das ganze Protokoll löschen.',
	'ACP_CRITICAL_LOGS_EXPLAIN'	=> 'Diese Liste zeigt alle Vorgänge, die durch das Board selbst ausgeführt wurden. Dieses Protokoll stellt dir Informationen zur Lösung spezifischer Probleme bereit, wie z.&nbsp;B. die Nicht-Auslieferung von E-Mails. Du kannst nach Benutzername, Datum, IP-Adresse oder Vorgang sortieren. Sofern du ausreichende Rechte hast, kannst du auch einzelne Einträge oder das ganze Protokoll löschen.',
	'ACP_MOD_LOGS_EXPLAIN'		=> 'Diese Liste zeigt alle Vorgänge, die von Moderatoren an Foren, Themen, Beiträgen und Benutzern ausgeführt wurden — inklusive von Sperrungen. Du kannst nach Benutzername, Datum, IP-Adresse oder Vorgang sortieren. Sofern du ausreichende Rechte hast, kannst du auch einzelne Einträge oder das ganze Protokoll löschen.',
	'ACP_USERS_LOGS_EXPLAIN'	=> 'Diese Liste zeigt alle Vorgänge, die von oder an Benutzern ausgeführt wurden (Meldungen, Verwarnungen und Notizen).',
	'ALL_ENTRIES'				=> 'Alle Einträge',

	'DISPLAY_LOG'	=> 'Einträge der letzten Zeit anzeigen',

	'NO_ENTRIES'	=> 'Keine Protokoll-Einträge für diese Zeit.',

	'SORT_IP'		=> 'IP-Adresse',
	'SORT_DATE'		=> 'Datum',
	'SORT_ACTION'	=> 'Vorgang',
));

// Index page
$lang = array_merge($lang, array(
	'ADMIN_INTRO'				=> 'Danke, dass du dich für phpBB als dein Board-System entschieden hast. Diese Übersicht gibt dir einen schnellen Überblick über die verschiedenen Board-Statistiken. Das Menü auf der linken Seite ermöglicht dir, das Verhalten des Boards an deine Wünsche anzupassen. Auf jeder Seite findest du weitere Informationen, wie du die Funktionen nutzen musst.',
	'ADMIN_LOG'					=> 'Protokollierte Administrations-Vorgänge',
	'ADMIN_LOG_INDEX_EXPLAIN'	=> 'Diese Liste gibt dir einen Überblick über die letzten fünf von Administratoren durchgeführten Vorgänge. Eine vollständige Liste erreichst du über den entsprechenden Menüpunkt oder den unten stehenden Link.',
	'AVATAR_DIR_SIZE'			=> 'Größe des Avatar-Verzeichnisses',

	'BOARD_STARTED'		=> 'Board eingerichtet',
	'BOARD_VERSION'		=> 'Version des Boards',

	'DATABASE_SERVER_INFO'	=> 'Datenbank-Server',
	'DATABASE_SIZE'		=> 'Datenbank-Größe',

	'FILES_PER_DAY'		=> 'Dateianhänge pro Tag',
	'FORUM_STATS'		=> 'Board-Statistik',

	'GZIP_COMPRESSION'	=> 'gzip-Komprimierung',

	'NOT_AVAILABLE'		=> 'nicht verfügbar',
	'NUMBER_FILES'		=> 'Anzahl Dateianhänge',
	'NUMBER_POSTS'		=> 'Anzahl Beiträge',
	'NUMBER_TOPICS'		=> 'Anzahl Themen',
	'NUMBER_USERS'		=> 'Anzahl Benutzer',
	'NUMBER_ORPHAN'		=> 'Verwaiste Dateianhänge',

	'POSTS_PER_DAY'		=> 'Beiträge pro Tag',

	'PURGE_CACHE'			=> 'Den Cache leeren',
	'PURGE_CACHE_CONFIRM'	=> 'Bist du sicher, dass du den Cache leeren möchtest?',
	'PURGE_CACHE_EXPLAIN'	=> 'Löscht alle Daten des Caches, darunter alle zwischengespeicherten Template-Dateien und Abfragen.',

	'PURGE_SESSIONS'			=> 'Sitzungsdaten löschen',
	'PURGE_SESSIONS_CONFIRM'	=> 'Sind Sie sicher, dass Sie alle Sitzungsdaten löschen möchten? Dies wird alle Benutzer abmelden.',
	'PURGE_SESSIONS_EXPLAIN'	=> 'Alle Sitzungslaten löschen. Dies wird alle Benutzer abmelden, indem die Sitzungstabelle geleert wird.',

	'RESET_DATE'					=> 'Einrichtungsdatum des Boards zurücksetzen',
	'RESET_DATE_CONFIRM'			=> 'Bist du sicher, dass du das Einrichtungsdatum des Boards zurücksetzen willst?',
	'RESET_ONLINE'					=> 'Besucherrekord zurücksetzen',
	'RESET_ONLINE_CONFIRM'			=> 'Bist du sicher, dass du den Benutzerrekord zurücksetzen willst?',
	'RESYNC_POSTCOUNTS'				=> 'Beitragszähler resynchronisieren',
	'RESYNC_POSTCOUNTS_EXPLAIN'		=> 'Nur existierende Beiträge werden berücksichtigt, nicht jedoch automatisch gelöschte.',
	'RESYNC_POSTCOUNTS_CONFIRM'		=> 'Bist du sicher, dass du die Beitragszähler resynchronisieren willst?',
	'RESYNC_POST_MARKING'			=> 'Markierung eigener Beiträge resynchronisieren',
	'RESYNC_POST_MARKING_CONFIRM'	=> 'Bist du sicher, dass du die Markierung eigener Beiträge resynchronisieren willst?',
	'RESYNC_POST_MARKING_EXPLAIN'	=> 'Entfernt zuerst alle Markierungen und markiert dann alle Themen richtig, die in den letzten sechs Monaten aktiv waren.',
	'RESYNC_STATS'					=> 'Statistiken resynchronisieren',
	'RESYNC_STATS_CONFIRM'			=> 'Bist du sicher, dass du die Statistiken resynchronisieren willst?',
	'RESYNC_STATS_EXPLAIN'			=> 'Berechnet die Anzahl von Beiträgen, Themen, Benutzern und Dateien neu.',
	'RUN'							=> 'Jetzt ausführen',

	'STATISTIC'					=> 'Statistik',
	'STATISTIC_RESYNC_OPTIONS'	=> 'Resynchronisieren oder Statistiken zurücksetzen',

	'TOPICS_PER_DAY'	=> 'Themen pro Tag',

	'UPLOAD_DIR_SIZE'	=> 'Größe der hochgeladenen Dateien',
	'USERS_PER_DAY'		=> 'Benutzer pro Tag',

	'VALUE'						=> 'Wert',
	'VERSIONCHECK_FAIL'			=> 'Die Informationen über die aktuelle Version konnten nicht abgerufen werden.',
	'VERSIONCHECK_FORCE_UPDATE'	=> 'Version erneut prüfen',
	'VIEW_ADMIN_LOG'			=> 'Administrations-Protokoll anzeigen',
	'VIEW_INACTIVE_USERS'		=> 'Inaktive Benutzer anzeigen',

	'WELCOME_PHPBB'			=> 'Willkommen bei phpBB',
	'WRITABLE_CONFIG'		=> 'Deine Konfigurations-Datei (config.php) ist derzeit von jedermann beschreibbar. Es wird dringend empfohlen, die Berechtigungen auf 640 oder zumindest auf 644 (z. B.: <a href="http://de.wikipedia.org/wiki/Chmod" rel="external">chmod</a> 640 config.php) zu setzen.',
));

// Inactive Users
$lang = array_merge($lang, array(
	'INACTIVE_DATE'					=> 'Inaktiv seit',
	'INACTIVE_REASON'				=> 'Grund',
	'INACTIVE_REASON_MANUAL'		=> 'Konto durch Administrator deaktiviert',
	'INACTIVE_REASON_PROFILE'		=> 'Profil-Details geändert',
	'INACTIVE_REASON_REGISTER'		=> 'Neu registriertes Konto',
	'INACTIVE_REASON_REMIND'		=> 'Reaktivierung erzwungen',
	'INACTIVE_REASON_UNKNOWN'		=> 'Unbekannt',
	'INACTIVE_USERS'				=> 'Inaktive Benutzer',
	'INACTIVE_USERS_EXPLAIN'		=> 'Dies ist eine Liste der Benutzer, deren Konto inaktiv ist. Du kannst diese Benutzer aktivieren, löschen oder erinnern (per E-Mail).',
	'INACTIVE_USERS_EXPLAIN_INDEX'	=> 'Dies ist eine Liste der 10 zuletzt registrierten Benutzer, deren Konto inaktiv ist. Eine vollständige Liste ist über den entsprechenden Menüeintrag oder den unten stehenden Link zugänglich, von der aus du diese Benutzer aktivieren, löschen oder erinnern (per E-Mail) kannst.',

	'NO_INACTIVE_USERS'	=> 'Keine inaktiven Benutzer',

	'SORT_INACTIVE'		=> 'Inaktiv seit',
	'SORT_LAST_VISIT'	=> 'Letzter Besuch',
	'SORT_REASON'		=> 'Grund',
	'SORT_REG_DATE'		=> 'Registrierungsdatum',
	'SORT_LAST_REMINDER'=> 'Zuletzt erinnert',
	'SORT_REMINDER'		=> 'Anzahl Erinnerungen',

	'USER_IS_INACTIVE'		=> 'Benutzer ist inaktiv',
));

// Send statistics page
$lang = array_merge($lang, array(
	'EXPLAIN_SEND_STATISTICS'	=> 'Bitte übermittel Informationen über deinen Server und deine Board-Konfiguration für statistische Analysen an phpBB.com. Alle Daten, die dich selbst oder deine Website identifizieren könnten, wurden entfernt — die Daten sind vollkommen <strong>anonym</strong>. Entscheidungen über zukünftige phpBB-Versionen werden auf Basis dieser Daten getroffen. Die statistischen Daten werden öffentlich zur Verfügung gestellt. Die Daten werden auch mit dem PHP-Projekt ausgetauscht, der Programmiersprache, in der phpBB realisiert ist.',
	'EXPLAIN_SHOW_STATISTICS'	=> 'Mit der folgenden Schaltfläche kannst du alle Informationen anzeigen, die übermittelt werden.',
	'DONT_SEND_STATISTICS'		=> 'Kehre zum Administrations-Bereich zurück, wenn du keine statistischen Daten an phpBB.com senden möchtest.',
	'GO_ACP_MAIN'				=> 'Zur Startseite des Administrations-Bereichs gehen',
	'HIDE_STATISTICS'			=> 'Details verbergen',
	'SEND_STATISTICS'			=> 'Statistische Informationen senden',
	'SHOW_STATISTICS'			=> 'Details anzeigen',
	'THANKS_SEND_STATISTICS'	=> 'Vielen Dank für die Übermittlung deiner Informationen.',
));

// Log Entries
$lang = array_merge($lang, array(
	'LOG_ACL_ADD_USER_GLOBAL_U_'		=> '<strong>Benutzerrechte eines Benutzers hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_GROUP_GLOBAL_U_'		=> '<strong>Benutzerrechte einer Gruppe hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_USER_GLOBAL_M_'		=> '<strong>Globale Moderationsrechte eines Benutzers hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_GROUP_GLOBAL_M_'		=> '<strong>Globale Moderationsrechte einer Gruppe hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_USER_GLOBAL_A_'		=> '<strong>Administrationsrechte eines Benutzers hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_GROUP_GLOBAL_A_'		=> '<strong>Administrationsrechte einer Gruppe hinzugefügt oder geändert</strong><br />» %s',

	'LOG_ACL_ADD_ADMIN_GLOBAL_A_'		=> '<strong>Administratoren hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ACL_ADD_MOD_GLOBAL_M_'			=> '<strong>Globale Moderatoren hinzugefügt oder geändert</strong><br />» %s',

	'LOG_ACL_ADD_USER_LOCAL_F_'			=> '<strong>Forenrechte eines Benutzers hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',
	'LOG_ACL_ADD_USER_LOCAL_M_'			=> '<strong>Moderationsrechte eines Benutzer für ein Forum hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',
	'LOG_ACL_ADD_GROUP_LOCAL_F_'		=> '<strong>Forenrechte einer Gruppe hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',
	'LOG_ACL_ADD_GROUP_LOCAL_M_'		=> '<strong>Moderationsrechte einer Gruppe für ein Forum hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',

	'LOG_ACL_ADD_MOD_LOCAL_M_'			=> '<strong>Moderatoren hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',
	'LOG_ACL_ADD_FORUM_LOCAL_F_'		=> '<strong>Forenrechte hinzugefügt oder geändert</strong> von %1$s<br />» %2$s',

	'LOG_ACL_DEL_ADMIN_GLOBAL_A_'		=> '<strong>Administratoren entfernt</strong><br />» %s',
	'LOG_ACL_DEL_MOD_GLOBAL_M_'			=> '<strong>Globale Moderatoren entfernt</strong><br />» %s',
	'LOG_ACL_DEL_MOD_LOCAL_M_'			=> '<strong>Moderatoren entfernt</strong> von %1$s<br />» %2$s',
	'LOG_ACL_DEL_FORUM_LOCAL_F_'		=> '<strong>Forums-Berechtigung von Benutzer/Gruppe entfernt</strong> von %1$s<br />» %2$s',

	'LOG_ACL_TRANSFER_PERMISSIONS'		=> '<strong>Berechtigungen übernommen</strong><br />» %s',
	'LOG_ACL_RESTORE_PERMISSIONS'		=> '<strong>Eigene Berechtigungen wiederhergestellt nach Übernahme von</strong><br />» %s',

	'LOG_ADMIN_AUTH_FAIL'		=> '<strong>Gescheiterte administrative Anmeldung</strong>',
	'LOG_ADMIN_AUTH_SUCCESS'	=> '<strong>Erfolgreiche administrative Anmeldung</strong>',

	'LOG_ATTACHMENTS_DELETED'	=> '<strong>Dateianhänge eines Benutzers entfernt</strong><br />» %s',

	'LOG_ATTACH_EXT_ADD'		=> '<strong>Dateityp hinzugefügt oder geändert</strong><br />» %s',
	'LOG_ATTACH_EXT_DEL'		=> '<strong>Dateityp entfernt</strong><br />» %s',
	'LOG_ATTACH_EXT_UPDATE'		=> '<strong>Dateityp aktualisiert</strong><br />» %s',
	'LOG_ATTACH_EXTGROUP_ADD'	=> '<strong>Dateityp-Gruppe hinzugefügt</strong><br />» %s',
	'LOG_ATTACH_EXTGROUP_EDIT'	=> '<strong>Dateityp-Gruppe geändert</strong><br />» %s',
	'LOG_ATTACH_EXTGROUP_DEL'	=> '<strong>Dateityp-Gruppe entfernt</strong><br />» %s',
	'LOG_ATTACH_FILEUPLOAD'		=> '<strong>Verwaiste Datei an Beitrag angehangen</strong><br />» ID %1$d — %2$s',
	'LOG_ATTACH_ORPHAN_DEL'		=> '<strong>Verwaiste Dateianhänge gelöscht</strong><br />» %s',

	'LOG_BAN_EXCLUDE_USER'	=> '<strong>Benutzer von Sperre ausgenommen</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_BAN_EXCLUDE_IP'	=> '<strong>IP von Sperre ausgenommen</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_BAN_EXCLUDE_EMAIL' => '<strong>E-Mail von Sperre ausgenommen</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_BAN_USER'			=> '<strong>Benutzer gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_BAN_IP'			=> '<strong>IP gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_BAN_EMAIL'			=> '<strong>E-Mail gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_UNBAN_USER'		=> '<strong>Benutzer entsperrt</strong><br />» %s',
	'LOG_UNBAN_IP'			=> '<strong>IP entsperrt</strong><br />» %s',
	'LOG_UNBAN_EMAIL'		=> '<strong>E-Mail entsperrt</strong><br />» %s',

	'LOG_BBCODE_ADD'		=> '<strong>Neuen BBCode hinzugefügt</strong><br />» %s',
	'LOG_BBCODE_EDIT'		=> '<strong>BBCode geändert</strong><br />» %s',
	'LOG_BBCODE_DELETE'		=> '<strong>BBCode entfernt</strong><br />» %s',

	'LOG_BOT_ADDED'		=> '<strong>Neuen Bot hinzugefügt</strong><br />» %s',
	'LOG_BOT_DELETE'	=> '<strong>Bot entfernt</strong><br />» %s',
	'LOG_BOT_UPDATED'	=> '<strong>Bot aktualisiert</strong><br />» %s',

	'LOG_CLEAR_ADMIN'		=> '<strong>Administrations-Protokoll gelöscht</strong>',
	'LOG_CLEAR_CRITICAL'	=> '<strong>Fehler-Protokoll gelöscht</strong>',
	'LOG_CLEAR_MOD'			=> '<strong>Moderations-Protokoll gelöscht</strong>',
	'LOG_CLEAR_USER'		=> '<strong>Benutzer-Protokoll gelöscht</strong><br />» %s',
	'LOG_CLEAR_USERS'		=> '<strong>Benutzer-Protokoll gelöscht</strong>',

	'LOG_CONFIG_ATTACH'			=> '<strong>Dateianhang-Einstellungen geändert</strong>',
	'LOG_CONFIG_AUTH'			=> '<strong>Authentifizierungs-Einstellungen geändert</strong>',
	'LOG_CONFIG_AVATAR'			=> '<strong>Avatar-Einstellungen geändert</strong>',
	'LOG_CONFIG_COOKIE'			=> '<strong>Cookie-Einstellungen geändert</strong>',
	'LOG_CONFIG_EMAIL'			=> '<strong>E-Mail-Einstellungen geändert</strong>',
	'LOG_CONFIG_FEATURES'		=> '<strong>Board-Funktionalitäten geändert</strong>',
	'LOG_CONFIG_LOAD'			=> '<strong>Last-Einstellungen geändert</strong>',
	'LOG_CONFIG_MESSAGE'		=> '<strong>Private Nachrichten-Einstellungen geändert</strong>',
	'LOG_CONFIG_POST'			=> '<strong>Beitrags-Einstellungen geändert</strong>',
	'LOG_CONFIG_FEED'			=> '<strong>Feed-Einstellungen geändert</strong>',
	'LOG_CONFIG_REGISTRATION'	=> '<strong>Registrierungs-Einstellungen geändert</strong>',
	'LOG_CONFIG_SEARCH'			=> '<strong>Such-Einstellungen geändert</strong>',
	'LOG_CONFIG_SECURITY'		=> '<strong>Sicherheits-Einstellungen geändert</strong>',
	'LOG_CONFIG_SERVER'			=> '<strong>Server-Einstellungen geändert</strong>',
	'LOG_CONFIG_SETTINGS'		=> '<strong>Board-Einstellungen geändert</strong>',
	'LOG_CONFIG_SIGNATURE'		=> '<strong>Signatur-Einstellungen geändert</strong>',
	'LOG_CONFIG_VISUAL'			=> '<strong>Anti-Bot-Einstellungen geändert</strong>',

	'LOG_APPROVE_TOPIC'			=> '<strong>Thema freigegeben</strong><br />» %s',
	'LOG_BUMP_TOPIC'			=> '<strong>Thema als neu markiert</strong><br />» %s',
	'LOG_DELETE_POST'			=> '<strong>Beitrag „%1$s“ gelöscht - geschrieben von</strong><br />» %2$s',
	'LOG_DELETE_SHADOW_TOPIC'	=> '<strong>Link zum verschobenem Thema gelöscht</strong><br />» %s',
	'LOG_DELETE_TOPIC'			=> '<strong>Thema „%1$s“ gelöscht - geschrieben von</strong><br />» %2$s',
	'LOG_FORK'					=> '<strong>Thema dupliziert</strong><br />» von %s',
	'LOG_LOCK'					=> '<strong>Thema gesperrt</strong><br />» %s',
	'LOG_LOCK_POST'				=> '<strong>Beitrag gesperrt</strong><br />» %s',
	'LOG_MERGE'					=> '<strong>Beiträge zusammengeführt</strong> in Thema<br />» %s',
	'LOG_MOVE'					=> '<strong>Thema verschoben</strong><br />» von %1$s nach %2$s',
	'LOG_PM_REPORT_CLOSED'		=> '<strong>Meldung zu Privater Nachricht geschlossen</strong><br />» %s',
	'LOG_PM_REPORT_DELETED'		=> '<strong>Meldung zu Privater Nachricht gelöscht</strong><br />» %s',
	'LOG_POST_APPROVED'			=> '<strong>Beitrag freigegeben</strong><br />» %s',
	'LOG_POST_DISAPPROVED'		=> '<strong>Freigabe von Beitrag „%1$s“ verweigert aus folgendem Grund</strong><br />» %2$s',
	'LOG_POST_EDITED'			=> '<strong>Beitrag „%1$s“ geändert, erstellt von</strong><br />» %2$s',
	'LOG_REPORT_CLOSED'			=> '<strong>Meldung geschlossen</strong><br />» %s',
	'LOG_REPORT_DELETED'		=> '<strong>Meldung gelöscht</strong><br />» %s',
	'LOG_SPLIT_DESTINATION'		=> '<strong>Abgetrennte Beiträge verschoben</strong><br />» nach %s',
	'LOG_SPLIT_SOURCE'			=> '<strong>Beiträge abgetrennt</strong><br />» von %s',

	'LOG_TOPIC_APPROVED'		=> '<strong>Thema freigegeben</strong><br />» %s',
	'LOG_TOPIC_DISAPPROVED'		=> '<strong>Freigabe von Thema „%1$s“ verweigert aus folgendem Grund</strong><br />» %2$s',
	'LOG_TOPIC_RESYNC'			=> '<strong>Thema resynchronisiert</strong><br />» %s',
	'LOG_TOPIC_TYPE_CHANGED'	=> '<strong>Themen-Art geändert</strong><br />» %s',
	'LOG_UNLOCK'				=> '<strong>Thema entsperrt</strong><br />» %s',
	'LOG_UNLOCK_POST'			=> '<strong>Beitrag entsperrt</strong><br />» %s',

	'LOG_DISALLOW_ADD'		=> '<strong>Verbotenen Benutzernamen hinzugefügt</strong><br />» %s',
	'LOG_DISALLOW_DELETE'	=> '<strong>Verbotenen Benutzernamen entfernt</strong>',

	'LOG_DB_BACKUP'			=> '<strong>Datenbank-Backup</strong>',
	'LOG_DB_DELETE'			=> '<strong>Datenbank-Backup gelöscht</strong>',
	'LOG_DB_RESTORE'		=> '<strong>Datenbank-Backup wiederhergestellt</strong>',

	'LOG_DOWNLOAD_EXCLUDE_IP'	=> '<strong>IP/Hostname als Ausnahme in Download-Liste hinzugefügt</strong><br />» %s',
	'LOG_DOWNLOAD_IP'			=> '<strong>IP/Hostname zur Download-Liste hinzugefügt</strong><br />» %s',
	'LOG_DOWNLOAD_REMOVE_IP'	=> '<strong>IP/Hostname aus Download-Liste entfernt</strong><br />» %s',

	'LOG_ERROR_JABBER'		=> '<strong>Jabber-Fehler</strong><br />» %s',
	'LOG_ERROR_EMAIL'		=> '<strong>E-Mail-Fehler</strong><br />» %s',

	'LOG_FORUM_ADD'							=> '<strong>Forum erstellt</strong><br />» %s',
	'LOG_FORUM_COPIED_PERMISSIONS'			=> '<strong>Foren-Berechtigungen kopiert</strong> von %1$s<br />» %2$s',
	'LOG_FORUM_DEL_FORUM'					=> '<strong>Forum gelöscht</strong><br />» %s',
	'LOG_FORUM_DEL_FORUMS'					=> '<strong>Forum mit Unterforen gelöscht</strong><br />» %s',
	'LOG_FORUM_DEL_MOVE_FORUMS'				=> '<strong>Forum gelöscht und Unterforen verschoben</strong> nach %1$s<br />» %2$s',
	'LOG_FORUM_DEL_MOVE_POSTS'				=> '<strong>Forum gelöscht und Beiträge verschoben</strong> nach %1$s<br />» %2$s',
	'LOG_FORUM_DEL_MOVE_POSTS_FORUMS'		=> '<strong>Forum mit Unterforen gelöscht und Beiträge verschoben</strong> nach %1$s<br />» %2$s',
	'LOG_FORUM_DEL_MOVE_POSTS_MOVE_FORUMS'	=> '<strong>Forum gelöscht, Beiträge verschoben</strong> nach %1$s <strong>und Unterforen</strong> nach %s<br />» %2$s',
	'LOG_FORUM_DEL_POSTS'					=> '<strong>Forum mit Beiträgen gelöscht</strong><br />» %s',
	'LOG_FORUM_DEL_POSTS_FORUMS'			=> '<strong>Forum mit Beiträgen und Unterforen gelöscht</strong><br />» %s',
	'LOG_FORUM_DEL_POSTS_MOVE_FORUMS'		=> '<strong>Forum mit Beiträgen gelöscht, Unterforen verschoben</strong> nach %1$s<br />» %2$s',
	'LOG_FORUM_EDIT'						=> '<strong>Foren-Details geändert</strong><br />» %s',
	'LOG_FORUM_MOVE_DOWN'					=> '<strong>Forum verschoben</strong> %1$s <strong>unter</strong> %2$s',
	'LOG_FORUM_MOVE_UP'						=> '<strong>Forum verschoben</strong> %1$s <strong>über</strong> %2$s',
	'LOG_FORUM_SYNC'						=> '<strong>Forum resynchronisiert</strong><br />» %s',

	'LOG_GENERAL_ERROR'	=> '<strong>Ein allgemeiner Fehler ist aufgetreten</strong>: %1$s <br />» %2$s',

	'LOG_GROUP_CREATED'		=> '<strong>Benutzergruppe erstellt</strong><br />» %s',
	'LOG_GROUP_DEFAULTS'	=> '<strong>Gruppe „%1$s“ als Standardgruppe für Mitglieder gesetzt</strong><br />» %2$s',
	'LOG_GROUP_DELETE'		=> '<strong>Benutzergruppe gelöscht</strong><br />» %s',
	'LOG_GROUP_DEMOTED'		=> '<strong>Gruppenleiter heruntergestuft in Gruppe</strong> %1$s<br />» %2$s',
	'LOG_GROUP_PROMOTED'	=> '<strong>Mitglieder zu Gruppenleiter heraufgestuft in Gruppe</strong> %1$s<br />» %2$s',
	'LOG_GROUP_REMOVE'		=> '<strong>Mitglieder aus Benutzergruppe entfernt</strong> %1$s<br />» %2$s',
	'LOG_GROUP_UPDATED'		=> '<strong>Benutzergruppen-Details geändert</strong><br />» %s',
	'LOG_MODS_ADDED'		=> '<strong>Neue Gruppenleiter hinzugefügt zu Gruppe</strong> %1$s<br />» %2$s',
	'LOG_USERS_ADDED'		=> '<strong>Neue Mitglieder zur Benutzergruppe hinzugefügt</strong> %1$s<br />» %2$s',
	'LOG_USERS_APPROVED'	=> '<strong>Mitgliedschaft in Benutzergruppe bestätigt</strong> %1$s<br />» %2$s',
	'LOG_USERS_PENDING'		=> '<strong>Mitgliedschaft der Benutzer in Gruppe „%1$s“ beantragt und muss bestätigt werden</strong><br />» %2$s',

	'LOG_IMAGE_GENERATION_ERROR'	=> '<strong>Fehler bei der Bilderstellung</strong><br />» Fehler in %1$s in Zeile %2$s: %3$s',

	'LOG_IMAGESET_ADD_DB'			=> '<strong>Neue Grafiksammlung in Datenbank hinzugefügt</strong><br />» %s',
	'LOG_IMAGESET_ADD_FS'			=> '<strong>Neue Grafiksammlung im Dateisystem hinzugefügt</strong><br />» %s',
	'LOG_IMAGESET_DELETE'			=> '<strong>Grafiksammlung entfernt</strong><br />» %s',
	'LOG_IMAGESET_EDIT_DETAILS'		=> '<strong>Details einer Grafiksammlung geändert</strong><br />» %s',
	'LOG_IMAGESET_EDIT'				=> '<strong>Grafiksammlung geändert</strong><br />» %s',
	'LOG_IMAGESET_EXPORT'			=> '<strong>Grafiksammlung exportiert</strong><br />» %s',
	'LOG_IMAGESET_LANG_MISSING'		=> '<strong>Grafiksammlung findet „<em>%2$s</em>“-Übersetzung nicht</strong><br />» %1$s',
	'LOG_IMAGESET_LANG_REFRESHED'	=> '<strong>„%2$s“-Lokalisierung von Grafiksammlung aktualisiert</strong><br />» %1$s',
	'LOG_IMAGESET_REFRESHED'		=> '<strong>Grafiksammlung aktualisiert</strong><br />» %s',

	'LOG_INACTIVE_ACTIVATE'	=> '<strong>Inaktive Benutzer aktiviert</strong><br />» %s',
	'LOG_INACTIVE_DELETE'		=> '<strong>Inaktive Benutzer gelöscht</strong><br />» %s',
	'LOG_INACTIVE_REMIND'		=> '<strong>Erinnerungs-E-Mail an inaktive Benutzer verschickt</strong><br />» %s',
	'LOG_INSTALL_CONVERTED'	=> '<strong>Konvertiert von %1$s zu phpBB %2$s</strong>',
	'LOG_INSTALL_INSTALLED'	=> '<strong>phpBB %s installiert</strong>',

	'LOG_IP_BROWSER_FORWARDED_CHECK'	=> '<strong>IP-Adressen-/Browser-/X_FORWARDED_FOR-Überprüfung gescheitert</strong><br />»Benutzer-IP „<em>%1$s</em>“ geprüft gegen Sitzungs-IP „<em>%2$s</em>“, Benutzer-Browser „<em>%3$s</em>“ gegen Sitzungs-Browser „<em>%4$s</em>“ und X_FORWARDED_FOR-Angabe des Benutzers „<em>%5$s</em>“ gegen X_FORWARDED_FOR-Angabe der Sitzung „<em>%6$s</em>“.',

	'LOG_JAB_CHANGED'			=> '<strong>Jabber-Konto geändert</strong>',
	'LOG_JAB_PASSCHG'			=> '<strong>Jabber-Passwort geändert</strong>',
	'LOG_JAB_REGISTER'			=> '<strong>Jabber-Konto erstellt</strong>',
	'LOG_JAB_SETTINGS_CHANGED'	=> '<strong>Jabber-Einstellungen geändert</strong>',

	'LOG_LANGUAGE_PACK_DELETED'		=> '<strong>Sprachpaket entfernt</strong><br />» %s',
	'LOG_LANGUAGE_PACK_INSTALLED'	=> '<strong>Sprachpaket installiert</strong><br />» %s',
	'LOG_LANGUAGE_PACK_UPDATED'		=> '<strong>Sprachpaket-Details aktualisiert</strong><br />» %s',
	'LOG_LANGUAGE_FILE_REPLACED'	=> '<strong>Sprachdatei ersetzt</strong><br />» %s',
	'LOG_LANGUAGE_FILE_SUBMITTED'	=> '<strong>Sprachdatei gesendet und im store-Ordner abgelegt</strong><br />» %s',

	'LOG_MASS_EMAIL'		=> '<strong>Massen-E-Mail verschickt</strong><br />» %s',

	'LOG_MCP_CHANGE_POSTER'	=> '<strong>Autor in Thema „%1$s“ geändert</strong><br />» von %2$s nach %3$s',

	'LOG_MODULE_DISABLE'	=> '<strong>Modul deaktiviert</strong><br />» %s',
	'LOG_MODULE_ENABLE'		=> '<strong>Modul aktiviert</strong><br />» %s',
	'LOG_MODULE_MOVE_DOWN'	=> '<strong>Modul nach unten verschoben</strong><br />» %1$s unter %2$s',
	'LOG_MODULE_MOVE_UP'	=> '<strong>Modul nach oben verschoben</strong><br />» %1$s über %2$s',
	'LOG_MODULE_REMOVED'	=> '<strong>Modul entfernt</strong><br />» %s',
	'LOG_MODULE_ADD'		=> '<strong>Modul hinzugefügt</strong><br />» %s',
	'LOG_MODULE_EDIT'		=> '<strong>Modul geändert</strong><br />» %s',

	'LOG_A_ROLE_ADD'		=> '<strong>Administrator-Rolle hinzugefügt</strong><br />» %s',
	'LOG_A_ROLE_EDIT'		=> '<strong>Administrator-Rolle geändert</strong><br />» %s',
	'LOG_A_ROLE_REMOVED'	=> '<strong>Administrator-Rolle entfernt</strong><br />» %s',
	'LOG_F_ROLE_ADD'		=> '<strong>Forums-Rolle hinzugefügt</strong><br />» %s',
	'LOG_F_ROLE_EDIT'		=> '<strong>Forums-Rolle geändert</strong><br />» %s',
	'LOG_F_ROLE_REMOVED'	=> '<strong>Forums-Rolle entfernt</strong><br />» %s',
	'LOG_M_ROLE_ADD'		=> '<strong>Moderator-Rolle hinzugefügt</strong><br />» %s',
	'LOG_M_ROLE_EDIT'		=> '<strong>Moderator-Rolle geändert</strong><br />» %s',
	'LOG_M_ROLE_REMOVED'	=> '<strong>Moderator-Rolle entfernt</strong><br />» %s',
	'LOG_U_ROLE_ADD'		=> '<strong>Benutzer-Rolle hinzugefügt</strong><br />» %s',
	'LOG_U_ROLE_EDIT'		=> '<strong>Benutzer-Rolle geändert</strong><br />» %s',
	'LOG_U_ROLE_REMOVED'	=> '<strong>Benutzer-Rolle entfernt</strong><br />» %s',

	'LOG_PROFILE_FIELD_ACTIVATE'	=> '<strong>Profilfeld aktiviert</strong><br />» %s',
	'LOG_PROFILE_FIELD_CREATE'		=> '<strong>Profilfeld hinzugefügt</strong><br />» %s',
	'LOG_PROFILE_FIELD_DEACTIVATE'	=> '<strong>Profilfeld deaktiviert</strong><br />» %s',
	'LOG_PROFILE_FIELD_EDIT'		=> '<strong>Profilfeld geändert</strong><br />» %s',
	'LOG_PROFILE_FIELD_REMOVED'		=> '<strong>Profilfeld entfernt</strong><br />» %s',

	'LOG_PRUNE'					=> '<strong>Inaktive Themen gelöscht</strong><br />» %s',
	'LOG_AUTO_PRUNE'			=> '<strong>Inaktive Themen automatisch gelöscht</strong><br />» %s',
	'LOG_PRUNE_USER_DEAC'		=> '<strong>Benutzer deaktiviert</strong><br />» %s',
	'LOG_PRUNE_USER_DEL_DEL'	=> '<strong>Inaktive Benutzer mit Beiträgen gelöscht</strong><br />» %s',
	'LOG_PRUNE_USER_DEL_ANON'	=> '<strong>Inaktive Benutzer gelöscht, Beiträge beibehalten</strong><br />» %s',

	'LOG_PURGE_CACHE'			=> '<strong>Cache geleert</strong>',
	'LOG_PURGE_SESSIONS'		=> '<strong>Sitzungsdaten gelöscht</strong>',


	'LOG_RANK_ADDED'		=> '<strong>Neuen Rang hinzugefügt</strong><br />» %s',
	'LOG_RANK_REMOVED'		=> '<strong>Rang entfernt</strong><br />» %s',
	'LOG_RANK_UPDATED'		=> '<strong>Rang geändert</strong><br />» %s',

	'LOG_REASON_ADDED'		=> '<strong>Meldungs-/Ablehnungs-Grund hinzugefügt</strong><br />» %s',
	'LOG_REASON_REMOVED'	=> '<strong>Meldungs-/Ablehnungs-Grund entfernt</strong><br />» %s',
	'LOG_REASON_UPDATED'	=> '<strong>Meldungs-/Ablehnungs-Grund geändert</strong><br />» %s',

	'LOG_REFERER_INVALID'		=> '<strong>Überprüfung des Referrers gescheitert</strong><br />»Referrer war „<em>%1$s</em>“. Anfrage wurde abgewiesen und Sitzung beendet.',
	'LOG_RESET_DATE'			=> '<strong>Einrichtungsdatum zurückgesetzt</strong>',
	'LOG_RESET_ONLINE'			=> '<strong>Besucherrekord zurückgesetzt</strong>',
	'LOG_RESYNC_POSTCOUNTS'		=> '<strong>Beitragszähler resynchronisiert</strong>',
	'LOG_RESYNC_POST_MARKING'	=> '<strong>Eigene Beiträge resynchronisiert</strong>',
	'LOG_RESYNC_STATS'			=> '<strong>Beitrags-, Themen- und Benutzerstatistik resynchronisiert</strong>',

	'LOG_SEARCH_INDEX_CREATED'	=> '<strong>Suchindex erstellt für</strong><br />» %s',
	'LOG_SEARCH_INDEX_REMOVED'	=> '<strong>Suchindex entfernt für</strong><br />» %s',
	'LOG_STYLE_ADD'				=> '<strong>Neuen Style hinzugefügt</strong><br />» %s',
	'LOG_STYLE_DELETE'			=> '<strong>Style gelöscht</strong><br />» %s',
	'LOG_STYLE_EDIT_DETAILS'	=> '<strong>Style geändert</strong><br />» %s',
	'LOG_STYLE_EXPORT'			=> '<strong>Style exportiert</strong><br />» %s',

	'LOG_TEMPLATE_ADD_DB'			=> '<strong>Neue Template-Sammlung zur Datenbank hinzugefügt</strong><br />» %s',
	'LOG_TEMPLATE_ADD_FS'			=> '<strong>Neue Template-Sammlung zum Dateisystem hinzugefügt</strong><br />» %s',
	'LOG_TEMPLATE_CACHE_CLEARED'	=> '<strong>Gecachte Versionen von Templates der Template-Sammlung <em>%1$s</em> gelöscht</strong><br />» %2$s',
	'LOG_TEMPLATE_DELETE'			=> '<strong>Template-Sammlung gelöscht</strong><br />» %s',
	'LOG_TEMPLATE_EDIT'				=> '<strong>Template-Sammlung geändert <em>%1$s</em></strong><br />» %2$s',
	'LOG_TEMPLATE_EDIT_DETAILS'		=> '<strong>Template-Details geändert</strong><br />» %s',
	'LOG_TEMPLATE_EXPORT'			=> '<strong>Template-Sammlung exportiert</strong><br />» %s',
	'LOG_TEMPLATE_REFRESHED'		=> '<strong>Template-Sammlung aktualisiert</strong><br />» %s',

	'LOG_THEME_ADD_DB'			=> '<strong>Neues Theme zur Datenbank hinzugefügt</strong><br />» %s',
	'LOG_THEME_ADD_FS'			=> '<strong>Neues Theme im Dateisystem hinzugefügt</strong><br />» %s',
	'LOG_THEME_DELETE'			=> '<strong>Theme gelöscht</strong><br />» %s',
	'LOG_THEME_EDIT_DETAILS'	=> '<strong>Details eines Themes geändert</strong><br />» %s',
	'LOG_THEME_EDIT'			=> '<strong>Theme <em>%1$s</em> geändert</strong>',
	'LOG_THEME_EDIT_FILE'		=> '<strong>Theme <em>%1$s</em> geändert</strong><br />» Datei <em>%2$s</em> geändert',
	'LOG_THEME_EXPORT'			=> '<strong>Theme exportiert</strong><br />» %s',
	'LOG_THEME_REFRESHED'		=> '<strong>Theme aktualisiert</strong><br />» %s',

	'LOG_UPDATE_DATABASE'	=> '<strong>Datenbank von Version %1$s auf Version %2$s aktualisiert</strong>',
	'LOG_UPDATE_PHPBB'		=> '<strong>phpBB von Version %1$s auf Version %2$s aktualisiert</strong>',

	'LOG_USER_ACTIVE'		=> '<strong>Benutzer aktiviert</strong><br />» %s',
	'LOG_USER_BAN_USER'		=> '<strong>Benutzer über Benutzer-Verwaltung gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_USER_BAN_IP'		=> '<strong>IP über Benutzer-Verwaltung gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_USER_BAN_EMAIL'	=> '<strong>E-Mail über Benutzer-Verwaltung gesperrt</strong> auf Grund „<em>%1$s</em>“<br />» %2$s',
	'LOG_USER_DELETED'		=> '<strong>Benutzer gelöscht</strong><br />» %s',
	'LOG_USER_DEL_ATTACH'	=> '<strong>Alle von einem Benutzer erstellte Dateianhänge gelöscht</strong><br />» %s',
	'LOG_USER_DEL_AVATAR'	=> '<strong>Avatar eines Benutzers entfernt</strong><br />» %s',
	'LOG_USER_DEL_OUTBOX'	=> '<strong>Postausgang des Benutzers geleert</strong><br />» %s',
	'LOG_USER_DEL_POSTS'	=> '<strong>Alle von einem Benutzer erstellten Beiträge entfernt</strong><br />» %s',
	'LOG_USER_DEL_SIG'		=> '<strong>Benutzer-Signatur entfernt</strong><br />» %s',
	'LOG_USER_INACTIVE'		=> '<strong>Benutzer deaktiviert</strong><br />» %s',
	'LOG_USER_MOVE_POSTS'	=> '<strong>Alle Beiträge eines Benutzers verschoben</strong><br />» Beiträge von „%1$s“ nach Forum „%2$s“',
	'LOG_USER_NEW_PASSWORD'	=> '<strong>Benutzer-Passwort geändert</strong><br />» %s',
	'LOG_USER_REACTIVATE'	=> '<strong>Erneute Aktivierung des Benutzerkontos erzwungen</strong><br />» %s',
	'LOG_USER_REMOVED_NR'	=> '<strong>Kürzlich registriert-Flag von Benutzer entfernt</strong><br />» %s',

	'LOG_USER_UPDATE_EMAIL'	=> '<strong>E-Mail-Adresse von Benutzer „%1$s“ geändert</strong><br />» von „%2$s“ nach „%3$s“',
	'LOG_USER_UPDATE_NAME'	=> '<strong>Benutzernamen geändert</strong><br />» von „%1$s“ in „%2$s“',
	'LOG_USER_USER_UPDATE'	=> '<strong>Details eines Benutzers geändert</strong><br />» %s',

	'LOG_USER_ACTIVE_USER'		=> '<strong>Benutzerkonto aktiviert</strong>',
	'LOG_USER_DEL_AVATAR_USER'	=> '<strong>Avatar entfernt</strong>',
	'LOG_USER_DEL_SIG_USER'		=> '<strong>Signatur entfernt</strong>',
	'LOG_USER_FEEDBACK'			=> '<strong>Benutzer-Notizen hinzugefügt</strong><br />» %s',
	'LOG_USER_GENERAL'			=> '<strong>Eintrag hinzugefügt</strong><br />» %s',
	'LOG_USER_INACTIVE_USER'	=> '<strong>Benutzerkonto deaktiviert</strong>',
	'LOG_USER_LOCK'				=> '<strong>Eigenes Thema durch Benutzer gesperrt</strong><br />» %s',
	'LOG_USER_MOVE_POSTS_USER'	=> '<strong>Alle Beiträge verschoben in Forum</strong>» %s',
	'LOG_USER_REACTIVATE_USER'	=> '<strong>Erneute Aktivierung erzwungen</strong>',
	'LOG_USER_UNLOCK'			=> '<strong>Eigenes Thema durch Benutzer entsperrt</strong><br />» %s',
	'LOG_USER_WARNING'			=> '<strong>Verwarnung erteilt</strong><br />» %s',
	'LOG_USER_WARNING_BODY'		=> '<strong>Die folgende Verwarnung wurde dem Benutzer erteilt</strong><br />» %s',

	'LOG_USER_GROUP_CHANGE'			=> '<strong>Hauptgruppe durch Benutzer geändert</strong><br />» %s',
	'LOG_USER_GROUP_DEMOTE'			=> '<strong>Gruppenführung niedergelegt</strong><br />» %s',
	'LOG_USER_GROUP_JOIN'			=> '<strong>Gruppe beigetreten</strong><br />» %s',
	'LOG_USER_GROUP_JOIN_PENDING'	=> '<strong>Gruppenmitgliedschaft beantragt, Freigabe erforderlich</strong><br />» %s',
	'LOG_USER_GROUP_RESIGN'			=> '<strong>Aus Gruppe ausgetreten</strong><br />» %s',

	'LOG_WARNING_DELETED'		=> '<strong>Verwarnung eines Benutzer gelöscht</strong><br />» %s',
	'LOG_WARNINGS_DELETED'		=> '<strong>Verwarnungen von %2$s Benutzern gelöscht</strong><br />» %1$s', // Example: '<strong>Deleted 2 user warnings</strong><br />» username'
	'LOG_WARNINGS_DELETED_ALL'	=> '<strong>Verwarnungen aller Benutzer gelöscht</strong><br />» %s',

	'LOG_WORD_ADD'			=> '<strong>Zensiertes Wort hinzugefügt</strong><br />» %s',
	'LOG_WORD_DELETE'		=> '<strong>Zensiertes Wort entfernt</strong><br />» %s',
	'LOG_WORD_EDIT'			=> '<strong>Zensiertes Wort geändert</strong><br />» %s',
));
 
// phpbbportal profile fields
$lang = array_merge($lang, array(

	'ACP_CAT_PORTAL'				=> 'Portal',
	'ACP_CAT_PORTAL_TOOLS'			=> 'Portal Tools',
	'ACP_CAT_CLOUD'					=> 'Cloud Tags',

// Common
	'ACP_K_UP'						=> 'Move Up',
	'ACP_K_DOWN'					=> 'Move Down',

// Blocks
	'ACP_K_BLOCKS'					=> 'Blocks',
	'ACP_K_BLOCKS_ADD'				=> 'Add a New Block',
	'ACP_K_BLOCKS_EDIT'				=> 'Edit Block',
	'ACP_K_BLOCKS_DELETE'			=> 'Delete Blocks',
	'ACP_K_BLOCKS_MANAGE'			=> 'Manage All Blocks',
	'ACP_K_PAGE_LEFT_BLOCKS'		=> 'Manage Left Blocks',
	'ACP_K_PAGE_CERTRE_BLOCKS'		=> 'Manage Centre Blocks',
	'ACP_K_PAGE_RIGHT_BLOCKS'		=> 'Manage Right Blocks',

// Menus
	'ACP_K_MENUS'					=> 'Menus',
	'ACP_K_MENU_HEADER'				=> 'Header Menus',
	'ACP_K_MENU_MAIN'				=> 'Main (navigation) Menu',
	'ACP_K_MENU_SUB'				=> 'Sub (secondary) Menus',
	'ACP_K_MENU_MANAGE'				=> 'Manage Menus',
	'ACP_K_MENU_CREATE'				=> 'Create a new Menu Item',
	'ACP_K_MENU_EDIT'				=> 'Edit Menu Item',
	'ACP_K_MENU_DELETE'				=> 'Delete a Menu Item',
	'ACP_K_MENU_ICONS'				=> 'Manage Menu Icons',
	'ACP_K_MENU_ALL'				=> 'View all Menu Items',
	'ACP_K_MENU_UNALLOCATED'		=> 'View unallocated items',

// Modules
	'ACP_K_MODS_ADD'				=> 'Add a New Module',
	'ACP_K_MODS_BLOCKS'				=> 'Block Modules',
	'ACP_K_MODS_BUGS'				=> 'Bugs Modules',
	'ACP_K_MODS_MODULES'			=> 'Mods Modules',
	'ACP_K_MODS_STYLES'				=> 'Styles Modules',
	'ACP_K_MODS_STATUS'				=> 'Status Modules',
	'ACP_K_MODS_MISC'				=> 'Miscellaneous Modules',
	'ACP_K_MODS_MODS'				=> 'Mod Modules',
	'ACP_K_MODS_ALL'				=> 'All Modules',
	'ACP_K_MODS_EDIT'				=> 'Edit Module',
	'ACP_K_MODS_DELETE'				=> 'Delete Module',
	'ACP_K_CONFIG_WELCOME'			=> 'Manage Welcome Message',
	'ACP_K_CONFIG_STYLES'			=> 'Manage Styles Mods',

// Modules Web Pages
	'ACP_K_WEB_PAGES_ADD'			=> 'Add a New Web Page',
	'ACP_K_WEB_PAGES_ALL'			=> 'View all pages',
	'ACP_K_WEB_PAGES_EDIT'			=> 'Edit Web Page',
	'ACP_K_WEB_PAGES_DELETE'		=> 'Delete this web page',
	'ACP_K_WEB_PAGES_BODY'			=> 'Page Bodies',
	'ACP_K_WEB_PAGES_HEAD'			=> 'Page Headers',
	'ACP_K_WEB_PAGES_FOOT'			=> 'Page Footers',
	'ACP_K_WEB_PAGES_PORTAL'		=> 'Manage Portal pages',

// Modules Variables
	'ACP_K_VARS'				=> 'Portal Variables',
	'ACP_K_CONFIG'				=> 'Main Config',
	'ACP_K_PORTAL_CONFIG'		=> 'Portal Config',
	'ACP_K_MODULES'				=> 'Mini Modules ',
	'ACP_K_VARS_CONFIG'			=> 'Configure Variables',
	'ACP_K_VARS_CONFIG2'		=> 'Block Module Variables',
	'ACP_K_POLL'				=> 'Poll Variables',
	'ACP_K_NEWSFEEDS'			=> 'Newsfeeds Variables',
	'ACP_K_ACRONYMS'			=> 'Acronyms',
	'ACP_K_WEB_PAGES'			=> 'Web Pages',
	'ACP_K_REFERRALS'			=> 'HTTP Referrals',
	'ACP_K_TOOLS'				=> 'Additional Mods and Tools',
	'ACP_MOD_VERSION_CHECK'		=> 'Mod Version Check',
// Cloud
	'ACP_K_CLOUD'				=> 'Cloud',
	'ACP_K_CLOUD_EXPLAIN'		=> 'Here you can add, edit and delete tags',
	'ACP_K_CLOUD_TAG'			=> 'Tag',
	'ACP_K_CLOUD_TAG_EXPLAIN'	=> 'Here you can add, edit and delete tags',
	'ACP_K_CLOUD_ADD'			=> 'Add a tag',
	'ACP_K_CLOUD_DELETE'		=> 'Delete tag',
	'ACP_K_CLOUD_EDIT'			=> 'Edit tag',
	'ACP_K_CLOUD_BROWSE'		=> 'Browse tags',
// youtube
	'ACP_K_YOUTUBE'				=> 'SGP youtubes Mod',
	'ACP_K_YOUTUBE_EXPLAIN'		=> 'Here you can manage your yourtube videos.',
	'ACP_K_YOUTUBE_MANAGE'		=> 'Manage youtube videos',
	'ACP_K_YOUTUBE_ADD'			=> 'Add a youtube video',
	'ACP_K_YOUTUBE_BROWSE'		=> 'Browse youtube videos',
));

// Stargate aka Kiss Plugins module
$lang = array_merge($lang, array(

	'ACP_CAT_K_BLOCKS_MANAGE'		=> 'Portal Blocks',
	'ACP_CAT_K_MENUS_MANAGE'		=> 'Portal Menus',

	'ACP_CAT_K_MODULES_MANAGE'		=> 'Portal Mini Modules',
	'ACP_CAT_K_TOOLS_MANAGE'		=> 'Portal Tools & other Mods',

	'ACP_CAT_K_WEB_PAGES_MANAGE'	=> 'Portal Web Pages',

	'ACP_CAT_PLUGINS'			=> 'Plugins',
	'ACP_CAT_PLUGINS_EXPLAIN'	=> 'Stargate Portal Plug-ins Mod Manager',

	'ACP_PLUGINS'				=> 'Plugins',
	'ACP_PLUGIN_VARIABLES'		=> 'Configure Defaults',
	'ACP_PLUGIN_CONFIG'			=> 'Configure Plugin Defaults',

	'ACP_PLUGIN_MANAGE'			=> 'Manage Plugin',
	'ACP_PLUGIN_ADD'			=> 'Add New Plugin',
	'ACP_PLUGIN_EDIT'			=> 'Edit Plugin',
	'ACP_PLUGIN_DELETE'			=> 'Delete Plugin',
	'ACP_PLUGIN_UPDATE'			=> 'Update plugin',
	'ACP_PLUGIN_UP'				=> 'Move Up',
	'ACP_PLUGIN_DOWN'			=> 'Move Down',
	'AVAILABLE_FORUM_IMAGE'		=> 'Available Images',
	'AVAILABLE_FORUM_IMAGE_EXPLAIN'		=> 'Display a list of available forum images (images/forum_icons/). Hover over an image to see the path/name...',
	'SHOW_FORUM_IMAGES'					=> 'Show available forum images.',
	'ENABLE_PORTAL'				=> 'Enable Portal',
));
// phpbbportal profile fields


// Mike
$lang = array_merge($lang, array(
	'MOD_IMAGES'	=> 'The image mod allows the admin to select images for editing where images are stored in the Admins current style.',
	'MOD_ICONS'		=> 'The image mod allows the admin to select icons for editing where icons are stored in the Admins current style.',
	'VARS_FOUND'	=> 'Editing config for',
));

// Mike
$lang = array_merge($lang, array(
	'MOD_IMAGES'	=> 'The image mod allows the admin to select images for editing where images are stored in the Admins current style.',
	'MOD_ICONS'		=> 'The image mod allows the admin to select icons for editing where icons are stored in the Admins current style.',
	'VARS_FOUND'	=> 'Editing config for',
));

// IntegraMod
$lang = array_merge($lang, array(
	'ACP_CAT_IMOD'			=> 'Integramod',
	'ACP_IMOD_CONFIG'		=> 'Integramod Config',
	'ENABLE_IMOD'			=> 'Enable IntegraMod',
	'ACP_IMOD_KB'			=> 'Knowledge Base',
	'ACP_IMOD_DOWNLOADS'	=> 'Downloads Mod',
	'ACP_IMOD_ALBUM'		=> 'phpBB Gallery','CONNECT_SOCKET_ERROR_INTEGRA'   => 'Error connecting to IntegraMod News Feed',
	'CONNECT_SOCKET_ERROR_INTEGRA'   => 'Error connecting to IntegraMod News Feed',
	'SOCKET_FUNCTIONS_DISABLED'      => 'Socket Disabled.',	
));

    //---BEGIN CALENDAR MOD---
    $lang = array_merge($lang, array(
        'LOG_DELETED_CALENDAR_EVENT'            => '<strong>Kalender-Termin gelöscht</strong><br />» %s',
        'LOG_DELETED_TOPIC_EVENT'               => '<strong>Beitrags-Termin gelöscht</strong><br />» %s',
        'LOG_DELETED_CALENDAR_EVENTS'           => '<strong>Kalender-Terminserie gelöscht</strong><br />» %s',
        'LOG_DELETED_TOPIC_EVENTS'              => '<strong>Beitrags-Terminserie gelöscht</strong><br />» %s',
        'LOG_DELETED_CALENDAR_EVENT_INSTANCE'   => '<strong>Wiederholung einer Terminserie gelöscht</strong><br />» %s',
        'LOG_DELETED_TOPIC_EVENT_INSTANCE'      => '<strong>Deleted Repeated Instance Of Calendar Events</strong><br />» %s',
        'LOG_EDITED_CALENDAR_EVENT'             => '<strong>Kalender-Termin geändert</strong><br />» %s',
        'LOG_EDITED_CALENDAR_EVENTS'            => '<strong>Kalender-Terminserie geändert</strong><br />» %s',
        'LOG_EDITED_CALENDAR_EVENT_INSTANCE'    => '<strong>Wiederholung einer Terminserie geändert</strong><br />» %s',
    ));
    //---END CALENDAR MOD---

?>