<?php
/**
*
* Knowledge Base [Deutsch Du]
* @author Tobi Schäfer http://www.tas2580.de/
*
* @package language
* @version $Id: kb.php, v 0.2.12 2009/06/06 20:21:36 tas2580 Exp $
* @copyright (c) 2007 SEO phpBB http://www.phpbb-seo.de
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
	'USER'					=> 'Benutzer',
	'ACTIVATE_RATING'		=> 'Bewertungen erlauben',
	'ACTIVATE_RATING_DESC'	=> 'Sollen Benutzer die Artikel bewerten dürfen?',
	'YOU_RATED'				=> 'Deine Bewertung',
	'ALREADY_RATED'			=> 'FEHLER!!! Du hast den Artikel schon bewertet und kannst ihn nicht nochmal bewerten.',
	'ARTICLE_RATED'			=> 'Du hast den Artikel erfolgreich bewertet',
	'RATING'				=> 'Bewertung',
	'RATINGS'				=> 'Bewertungen',
	'RATE_GOOD'				=> 'sehr gut',
	'RATE_ACCEPTABLE'		=> 'befriedigend',
	'RATE_BAD'				=> 'schlecht',
	'RATE_ARTICLE'			=> 'Artikel bewerten',
	'RATE'					=> 'Bewerten',
	'ACTIVATE_POST'			=> 'Beiträge erstellen?',
	'ACTIVATE_POST_DESC'	=> 'Sollen im Forum Beiträge erstellt werden wenn ein Artikel eingetragen wurde?',
	'ACTIVATE_DIFF'			=> 'Artikelhistorie aktivieren',
	'ACTIVATE_DIFF_DESC'	=> 'Soll beim ändern eines Artikels die alte Version des Artikels gespeichert werden?', 
	'ACTION'				=> 'Aktion',
	'ACTIVATE_SIMILAR'		=> 'Ähnliche Artikel aktivieren',
	'ACTIVATE_SIMILAR_DESC'	=> 'Zeigt unter den Artikeln Links zu ähnlichen Artikeln',
	'ACP_CATEGORIE'			=> 'Kategorien',
	'ACP_CATEGORIE_DESC'	=> 'Hier kannst du Kategorien für die Knowledge Base anlegen und bearbeiten.',
	'ACP_CONFIG'			=> 'Konfiguration',
	'ACP_CONFIG_DESC'		=> 'Hier kannst du die Konfiguration der Knowledge Base bearbeiten!',
	'ACP_TYPES'				=> 'Artikeltypen',
	'ACP_TYPES_DESC'		=> 'Hier kannst du Typen anlegen, jedem Artikel kannst du dann einen Artikeltyp zuordnen.',
	'ARTICLE_TYPES'			=> 'Artikeltypen',
	'ARTICLE_TYPES_DESC'	=> 'Wähle, welche Artikeltypen du durchsuchen möchtest. Benutze die &lt;strg&gt; Taste, um mehrere Typen auszuwählen, wähle nichts aus, um in allen Typen zu suchen.',
	'ARTICLE_ACTIVATED'		=> 'Der Artikel wurde freigeschaltet!',
	'ARTICLE_DELETED'		=> 'Der Artikel wurde gelöscht!',
	'ARTICLE_DEL'			=> 'Soll der Artikel wirklich gelöscht werden?',
	'ARTICLE_DETAIL'		=> 'Artikel Details',
	'ARTICLE_ADDED'			=> 'Der Artikel wurde eingetragen und wird nach einer Prüfung freigeschaltet!',
	'ARTICLE_ADD'			=> 'Einen Artikel hinzufügen',
	'ARTICLE_TITLE'			=> 'Themen Titel',
	'ARTICLE_DESCRIPTION'	=> 'Themen Beschreibung',
	'ARTICLE_HISTORY'		=> 'Artikel Log',
	'ARTICLE_EDIT'			=> 'Artikel bearbeiten',
	'ARTICLE_EDITED'		=> 'Der Artikel wurde bearbeitet!',
	'ARTICLE'				=> 'Artikel',
	'ARTICLE_CONT'			=> 'Artikel in der Datenbank',
	'ARTICLE_NEWEST'		=> 'Der neueste Artikel ist',
	'ARTICLE_POSTET'		=> 'Artikel eingereicht',
	'ARTICLE_NEW'			=> 'Nicht freigeschaltete Artikel',
	'ARTICLE_NEW_DESC'		=> 'Folgende Artikel sind noch nicht freigeschaltet oder wurden gesperrt',
	'ARTICLE_DEACTIVATED'	=> 'Artikel gesperrt',
	'ARTICLE_REPORTED'		=> 'Der Artikel wurde gemeldet.',
	'AKTIVATE'				=> 'freischalten',
	'BACK_TO_ARTICLE'		=> 'Klicke %shier%s, um den Artikel anzuzeigen.',
	'BACK_TO_POSTING'		=> 'Klicke %shier%s, um zurück zu kommen.',
	'BACK_TO_KB'			=> 'Klicke %shier%s, um zur Knowledge Base zurück zu kommen.',
	'BACK_TO_LOG'			=> 'Klicke %shier%s, um zum Artikel Log zurück zu kommen.',
	'BACK_KB'				=> 'Zurück zur Knowledge Base',
	'BACK_ARTICLE'			=> 'Zurück zum Artikel',
	'CHANGED_AT'			=> 'Geändert am',
	'CATEGORIE'				=> 'Kategorie',
	'CATEGORIES'			=> 'Kategorien',
	'CATEGORIES_DESC'		=> 'Wähle, in welchen Kategorien du suchen möchtest. Benutze die &lt;strg&gt; Taste, um mehrere Kategorien auszuwählen, wähle nichts aus, um in alle Kategorien zu suchen.',
	'CAT_NAME'				=> 'Kategoriename',
	'CAT_NAME_DESC'			=> 'Gib einen Namen für die Kategorie ein.',
	'CAT_IMAGE'				=> 'Kategoriebild',
	'CAT_IMAGE_DESC'		=> 'Hier kannst du ein Bild für die Kategorie eintragen, gib dazu die URL zu dem Bild ein.',
	'CAT_NOT_EMPTY'			=> 'Die Kategorie ist nicht leer!',
	'CAT_MAIN'				=> 'Hauptkategorie',
	'CAT_SELECT_MAIN'		=> 'Wähle eine Hauptkategorie, in der sich die Unterkategorie befinden soll.',
	'CAT_ADDED'				=> 'Die Kategorie wurde angelegt',
	'CAT_UPDATED'			=> 'Die Kategorie wurde aktualisiert',
	'CAT_REALY_DELETE'		=> 'Soll die Kategorie wirklich gelöscht werden?',
	'CAT_DECRIPTION_DESC'	=> 'Gib eine Beschreibung für die Kategorie ein',	
	'CAT_CREATE_NEW'		=> 'Neue Kategorie',
	'CAT_DELETED'			=> 'Die Kategorie wurde gelöscht',
	'DESCRIPTION'			=> 'Beschreibung',

	'DIFFERENCE'			=> 'Unterschied zwischen der Version: %s zur aktuellen Version',

	'DIFF_DEL'				=> 'Bist du sicher das du die alte Version löschen möchtest?',
	'DISPLAY_ON_INDEX'		=> 'In Übergeordneter Kategorie anzeigen',
	'DISPLAY_ON_INDEX_DESC'	=> 'Soll die Kategorie in der Übergeordneten Kategorie angezeigt werden?',
	'DIFF_RESTORE'			=> 'Soll die alte Vesion wiederhergestelt werden?',
	'ARTICLE_RESTORED'		=> 'Der Artikel wurde wiederhergestellt',
	'DELETED'				=> 'Der Eintrag wurde gelöscht',
	'FIENAME'				=> 'Dateiname',
	'FOUND_IN'				=> 'Gefunden in',
	'INDEX_POSTS'			=> 'Artikel im Index',
	'INDEX_POSTS_DESC'		=> 'Wie viele Artikel sollen im Index für eine Kategorie angezeigt werden?',
	'KBASE'					=> 'Knowledge Base',
	'KB_DECRIPTION_DESC'	=> 'Gib eine Beschreibung für die Knowledge Base ein.',
	'KB_NAME'				=> 'Name',
	'KB_NAME_DESC'			=> 'Der Name der Knowledge Base',
	'LOG_DELETED'			=> 'Die Einträge wurden gelöscht!',
	'LOG_TITEL'				=> 'Artikel log',
	'LOG_DESCRIPTION'		=> 'Hier siehst du, wann der Artikel von wem bearbeitet wurde.',
	'MODE'					=> 'Modus',
	'MODE_DESC'				=> 'In welchem Modus soll der Index der Knowledge Base angezeigt werden?',
	'MODE_MODERN'			=> 'Modern',
	'MODE_CLASSIC'			=> 'Klassisch',

	'MCP_REPORT_TITLE'		=> 'Gemeldete Artikel',
	'MCP_REPORT_EXPLAIN'	=> 'Dies ist eine Liste aller Meldungen zu Artikeln, die noch bearbeitet werden müssen.',

	'NO_ARTICLE'			=> 'Der gewünschte Artikel existiert nicht!',
	'NO_TYPE'				=> 'Kein Typ',
	'NEED_NAME'				=> 'Gib einen Namen für die Kategorie ein.',
	'NEED_INPUT'			=> 'Gib einen Titel und einen Text für den Artikel ein!',
	'POST_FORUM'			=> 'Forum für Hinweis auf den Artikel',
	'POST_FORUM_DESC'		=> 'Gib die Foren-ID des Forums an, in dem ein Hinweis auf den Artikel erstellt werden soll, um keinen Hinweis auf neue Artikel zu erstellen, gib eine "0" ein.',
	'POST_TEMPLATE'			=> 'Beitrags Template',
	'POST_MESSAGE'			=> 'Beitrags Text',
	'POST_MESSAGE_DESC'		=> 'Hier kannst du das Template für Hinweise auf neue Beiträge bearbeiten, du kannst BB-Code benutzen..<br /><br />{TITLE} = Titel des Artikels <br />{DESCRIPTION} = Artikel Beschreibung<br />{POST_TIME} = Zeit, wann Artikel geschrieben wurde<br />{TYPE} = Artikeltyp<br />{SUB_CAT} = Kategorie<br />{URL} = URL zum Artikel<br />{AUTHOR} = Autor des Artikels<br />{AUTHOR_ID} = User-ID des Autors.',
	'POST_USER'				=> 'Benutzer ID',
	'POST_USER_DESC'		=> 'Die ID des Benutzers, der die Beiträge erstellt',
	'POST_SUBJECT'			=> 'Thementitel',
	'POST_SUBJECT_DESC'		=> 'Der Titel des Themas, das erstellt wird',
	'POST_NORMAL'			=> 'Normal',
	'POST_TOPIC_GLOBAL'		=> 'Globale Bekanntmachung',
	'POST_TOPIC_AS'			=> 'Thema schreiben als',
	'POST_TOPIC_AS_DESC'	=> 'Welche Art Thema soll erstellt werden?',

	'REALY_DELETE'			=> 'Möchtest du den Eintrag wirklich löschen?',
	'READ_MORE'				=> '%s Artikel in der Kategorie',
	'VIEW_REPORTS_OLD'		=> 'Zeige geschlossene Meldungen',
	'VIEW_REPORTS_NEW'		=> 'Zeige offene Meldungen',

	'RELASED'				=> 'Veröffentlicht am',
	'SEARCH_KEYWORDS_DESC'	=> 'Hier kannst du in der Knowledge Base suchen.',
	'SHOW_ARTICLE'			=> 'Artikel anzeigen',
	'SHOW_EDITS'			=> 'Bearbeiten anzeigen',
	'SHOW_EDITS_DESC'		=> 'Soll bei Artikeln in der Kategorie angezeigt werden, wann sie das letzte mal bearbeitet wurden?',
	'SORT_ORDER'			=> 'Artikel Reihenfolge',
	'SORT_ORDER_DESC'		=> 'In welcher Reihenfolge sollen die Artikel sortiert werden?',
	'SUB_CATGEGORIES'		=> 'Unterkategorien',
	'SIMILAR_ARTICLES'		=> 'Ähnliche Artikel',
	'TYPE'					=> 'Artikeltyp',
	'TYPE_DESC'				=> 'Gib einen Namen für den Artikeltyp ein.',
	'TYPE_ADDED'			=> 'Der Artikeltyp wurde hinzugefügt',
	'TYPE_UPDATED'			=> 'Der Artikeltyp wurde geändert',

	'NO_SUBCAT_IN_MAINCAT'	=> 'Du kannst keine Unterkategorien im Index anlegen!',
	'CAT_TYPE'				=> 'Kategorieart',
	'CAT_TYPE_DESC'			=> 'Wähle eine Kategorieart aus',
	'IN_INDEX'				=> 'Im Index',
	'CAT_SUB'				=> 'Unterkategorie',

	'OLD_VERSIONS'			=> 'Alte Versionen',
	'RESTORE'				=> 'Wiederherstellen',
	'CACHE_TIME'			=> 'Cache Zeit',
	'CACHE_TIME_DESC'		=> 'Wie Lange sollen Datenbankabfragen gecached werden?',
	'SECONDS'				=> 'Sekunden',
	'ACTIVATE_TYPES'		=> 'Artikel Typen benutzen?',
	'ACTIVATE_TYPES_DESC'	=> 'Sollen Typen für die Artikel angegeben werden?',
	'UPDATE_POST'			=> 'Beitrag aktualisieren',
	'UPDATE_POST_DESC'		=> 'Soll der Foren-Beitrag aktualisiert werden wenn der Artikel geändert wird?',
	'POST_UPDATE_MESSAGE'	=> 'Artikel in der Knowledge Base geändert',
	'POST_ID'				=> 'ID des Forenbeitrags',
	'ARTICLE_ADDED_AKTIV'	=> 'Der Artikel wurde in die Datenbank eingetragen und aktiviert',
	'SHOW_POST_EDIT'		=> 'Bearbeiten anzeigen',
	'SHOW_POST_EDIT_DESC'	=> 'Soll in dem Beitrag angezeigt werden wenn er aktualisiert wird?',

	'PRINT_TOPIC'			=> 'Artikel ausdrucken',
	'SEARCH_CATEGORIE'		=> 'Kategorie durchsuchen...',
	'ADS'					=> 'Werbung',
	'KB_COPYRIGHT'			=> 'Knowledge Base by <a href="http://www.gameserveradmin.de/">Gameserveradmin.de</a>',
	'ADS_DESC'				=> 'Hier kannst du Code für Werbung eintragen, die Werbung wird in jedem Artikel der Kategorie angezeigt.',
	'URI_IN_USE'			=> 'Die eigegebene URL wird bereits verwendet',
	'USER_CHANGED'			=> 'Der Benutzer wurde geändert',
));

?>
