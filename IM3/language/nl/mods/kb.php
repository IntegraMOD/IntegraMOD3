<?php
/**
*
* kb [Nederlands]
* @author Tobi Schaefer http://www.tas2580.de/
*
* english translation by RedTrinity
*
* @package language
* @version $Id: kb.php, v 0.2.11 2009/06/05 16:44:36 tas2580 Exp $
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
	'USER'					=> 'Gebruiker',
	'ACTIVATE_RATING'		=> 'Allow rating',
	'ACTIVATE_RATING_DESC'	=> 'Allow users to rate articles',
	'YOU_RATED'				=> 'Own rating',
	'ALREADY_RATED'			=> 'ERROR!!! You have already rated',
	'ARTICLE_RATED'			=> 'You have rated this article',
	'RATING'				=> 'Rating',
	'RATINGS'				=> 'Ratings',
	'RATE_GOOD'				=> 'very good',
	'RATE_ACCEPTABLE'		=> 'acceptable',
	'RATE_BAD'				=> 'bad',
	'RATE_ARTICLE'			=> 'Rate article',
	'RATE'					=> 'Rate',
	'ACTIVATE_POST'			=> 'Write posting',
	'ACTIVATE_POST_DESC'	=> 'Write a post to forum when adding an article',
	'ACTIVATE_DIFF'			=> 'Activate history',
	'ACTIVATE_DIFF_DESC'	=> 'When editing an article the old version will be saved',
	'ACTION'				=> 'Action',
	'ACTIVATE_SIMILAR'		=> 'Activate similar articles',
	'ACTIVATE_SIMILAR_DESC'	=> '',
	'DIFFERENCE'			=> 'Diverence between version: %s and curent article',
	'DIFF_DEL'				=> 'Delete the old version?',
	'DIFF_RESTORE'			=> 'Restore the old version',
	'ARTICLE_RESTORED'		=> 'The article has been restored',
	'SIMILAR_ARTICLES'		=> 'Similar articles',
	'OLD_VERSIONS'			=> 'Old versions',
	'RESTORE'				=> 'Restore',
	'ARTICLE_DETAIL'		=> 'Artikel details',
	'ARTICLE_REPORTED'		=> 'Dit artikel is gerapporteerd',
	'DISPLAY_ON_INDEX'		=> 'Tonen in hoofd categorie',
	'DISPLAY_ON_INDEX_DESC'	=> '',
	'DELETED'				=> 'De vermelding is verwijderd',
	'MCP_REPORT_TITLE'		=> 'Gerapporteerde artikelen',
	'MCP_REPORT_EXPLAIN'	=> '',
	'REALY_DELETE'			=> 'Moet de vermelding echt verwijderd worden?',
	'VIEW_REPORTS_OLD'		=> 'Gesloten rapporten weergeven',
	'VIEW_REPORTS_NEW'		=> 'Bekijk open rapporten',
	'SHOW_ARTICLE'			=> 'Toon artikel',
	'SORT_ORDER'			=> 'Sorteer volgorde',
	'SORT_ORDER_DESC'		=> 'Artikelen sorteren in Categorie&euml;n',
	'SUB_CATGEGORIES'		=> 'SubCategorie&euml;n',
	'SEARCH_CATEGORIE'		=> 'Zoek categorie',
	'ACP_TYPES'				=> 'Artikel types',
	'ACP_TYPES_DESC'		=> 'Here you can add and edit article types',
	'ACP_CATEGORIE'			=> 'Categorie',
	'ACP_CATEGORIE_DESC'	=> 'Hier kun je Categorie&euml;n voor de Kennis Bank bewerken.',
	'ACP_CONFIG'			=> 'Configuratie',
	'ACP_CONFIG_DESC'		=> 'Here you can edit the configuration of the Knowledge Base.',
	'ARTICLE_ACTIVATED'		=> 'The article has been released!',
	'ARTICLE_DELETED'		=> 'The article has been deleted!',
	'ARTICLE_ADDED'			=> 'The article has been submitted and will be released to the Knowledge Base after being reviewed.',
	'ARTICLE_HISTORY'		=> 'Artikele Log',
	'ARTICLE_ADD'			=> 'Een artikel toevoegen',
	'ARTICLE_TITLE'			=> 'Titel',
	'ARTICLE_DESCRIPTION'	=> 'Omschrijving',
	'ARTICLE'				=> 'Artikel',
	'ARTICLE_TYPES'			=> 'Artikel types',
	'ARTICLE_TYPES_DESC'	=> 'In which article types you whant to search? Use the &lt;strg&gt; key to choose more that one type, to search in all types choose no type.',
	'ARTICLE_CONT'			=> 'Artikel in de database',
	'ARTICLE_DEL'			=> 'Should the article really be deleted?',
	'ARTICLE_EDIT'			=> 'Bewerk artikel',
	'ARTICLE_EDITED'		=> 'Het artikel is gewijzigd!',
	'ARTICLE_DEACTIVATED'	=> 'Gesloten artikel',
	'ARTICLE_POSTET'		=> 'Artikel geplaatst',
	'AKTIVATE'				=> 'Activeren',

	'BACK_ARTICLE'			=> 'Terug naar artikel',
	'BACK_KB'				=> 'Terug naar de Kennis Bank',
	'BACK_TO_ARTICLE'		=> 'Klik %shier%s om artikel te bekijken.',
	'BACK_TO_POSTING'		=> 'Klik %shier%s om terug te gaan.',
	'BACK_TO_KB'			=> 'Klik %shier%s om terug naar de Kennis Bank te gaan.',
	'BACK_TO_LOG'			=> 'Klik %shier%s om terug naar artikel log te gaan.',



	'CATEGORIE'				=> 'Categorie',
	'CHANGED_AT'			=> 'Veranderd om',
	'CONT_CAT'				=> 'Categorieën',
	'CATEGORIES'			=> 'categorieën',
	'CATEGORIES_DESC'		=> 'In welke Categorie&euml;n wil je zoeken? Gebruik de &lt;strg&gt; toets om meer dan een categorie te kiezen, om in alle categorieën te zoeken kies je geen type.',
	'CAT_NOT_EMPTY'			=> 'De categorie is niet leeg!',
	'CAT_NAME'				=> 'Categorie naam',
	'CAT_NAME_DESC'			=> 'Naam voor de categorie',
	'CAT_IMAGE'				=> 'Categorie plaatje',
	'CAT_IMAGE_DESC'		=> 'Enter the URL to a image for the category here.',
	'CAT_DECRIPTION_DESC'		=> 'Give a description for the category',
	'CAT_MAIN'				=> 'Main categorie',
	'CAT_SELECT_MAIN'		=> 'Choose a main categorie',
	'CAT_ADDED'				=> 'De categorie is toegevoegd',
	'CAT_DELETED'			=> 'De categorie is verwijderd.',
	'CAT_UPDATED'			=> 'De categorie is ge-update.',
	'CAT_REALY_DELETE'		=> 'Should the category really be deleted?',
	'CAT_CREATE_NEW'		=> 'Nieuwe categorie',
	'DESCRIPTION'			=> 'Omschrijving',


	'FIENAME'				=> 'Bestandnaam',
	'FOUND_IN'				=> 'Gevonden in',
	'INDEX_POSTS'			=> 'Articles within the index page',
	'INDEX_POSTS_DESC'		=> 'How many articles should be shown in the index page?',
	'KB_NAME'				=> 'Kennis Bank',
	'KB_NAME_DESC'			=> 'The name of the Knowledge Base',
	'KB_DECRIPTION_DESC'	=> 'Enter a description for the Knowledge Base.',
	'KBASE'					=> 'Kennis Bank',
	'KB_DESCRIPTION'		=> 'If you have written an article, you can preview it at the end of the page and submit it for review. If approved, the article will be published to the Knowledge Base. ',

	'LOG_TITEL'				=> 'Artikel log',
	'LOG_DESCRIPTION'		=> 'Here you can see the time the article was edited and from which user.',
	'LOG_DELETED'			=> 'The article log has been deleted.',

	'MAINCAT_DESC'			=> 'Here you can create main categories, in which you then in turn in sub-categories for the articles.',

	'MODE'					=> 'Modus',
	'MODE_DESC'				=> 'Which mode do you want to use for the Index page?',
	'MODE_MODERN'			=> 'Modern',
	'MODE_CLASSIC'			=> 'Klasiek',
	'NO_ARTICLE'			=> 'The desired article does not exist!',
	'NEED_INPUT'			=> 'Enter a title and text for the article!',
	'ARTICLE_NEW'			=> 'Niet vrijgegeven artikelen',
	'ARTICLE_NEW_DESC'		=> 'The following items are not yet released or have been locked',
	'NAME'					=> 'Categorie naam',
	'NEED_NAME'				=> 'Geef een naam voor de categorie',
	'ARTICLE_NEWEST'		=> 'Het nieuwste artikel is',
	'NO_TYPE'				=> 'Geen Type',
	'POST_FORUM'			=> 'Forum voor de verwijzing naar het artikel',
	'POST_TEMPLATE'			=> 'Bericht template',
	'POST_MESSAGE'			=> 'Bericht tekst',
	'POST_USER'				=> 'Gebruiker ID',
	'POST_NORMAL'			=> 'Normaal',
	'POST_TOPIC_GLOBAL'		=> 'Algemene mededelingen',
	'POST_TOPIC_AS'			=> 'Plaats onderwerp als',
	'POST_TOPIC_AS_DESC'	=> 'Wat voor soort onderwerp zal worden gemaakt.?',
	'POST_USER_DESC'		=> 'De ID van de gebruiker die de berichten plaatste',
	'POST_SUBJECT'			=> 'Onderwerp Titel',
	'POST_SUBJECT_DESC'		=> 'De titel van het onderwerp dat wordt gemaakt',
	'POST_FORUM_DESC'		=> 'Geven de forum-ID van het forum waar een verwijzing van het artikel naar wordt gemaakt,op geen enkel symptoom van nieuwe artikelen te geven een "0"',
	'POST_MESSAGE_DESC'		=> '{TITLE} = Artikel titel <br />{DESCRIPTION} = Artikel omschrijving<br />{POST_TIME} = Tijdstip van schrijven<br />{TYPE} = Artikel type<br />{SUB_CAT} = Categorie<br />{URL} = URL to artikel<br />{AUTHOR} = Auteur van het artikel<br />{AUTHOR_ID} = Gebruiker-ID van de auteur.',
	'RELASED'				=> 'Uitgebracht op',
	'READ_MORE'				=> 'Toon alle %s artikelen',


	'SEARCH_KEYWORDS_DESC'	=> 'Hier kunt u zoeken in de Kennis Bank.',
	'SHOW_EDITS'			=> 'Toon bewerkingen',
	'SHOW_EDITS_DESC'		=> 'Moeten bewerkingen getoond worden in het artikel?',
	'TYPE'					=> 'Artikel type',
	'TYPE_DESC'				=> 'Geef een naam voor het artikel type',
	'TYPE_ADDED'			=> 'Het type is toegevoegd',
	'TYPE_UPDATED'			=> 'Het type is verwijderd',

	'NO_SUBCAT_IN_MAINCAT'	=> 'Je kunt geen sub-categorie in the index maken!',
	'CAT_TYPE'				=> 'Categorie type',
	'CAT_TYPE_DESC'			=> 'Kies een categorie type',
	'IN_INDEX'				=> 'In Index',
	'CAT_SUB'				=> 'Sub categorie',

	'CACHE_TIME'			=> 'Cache tijd',
	'CACHE_TIME_DESC'		=> 'Gedurende deze tijd worden deze types en categorieën in cache opgeslagen ',
	'SECONDS'				=> 'Seconden',
	'ACTIVATE_TYPES'		=> 'Gebruik artikel types?',
	'ACTIVATE_TYPES_DESC'	=> 'Kun je een type geven van een artikel?',
	'UPDATE_POST'			=> 'Bericht vernieuwen ',
	'UPDATE_POST_DESC'		=> 'Moet het bericht van het artikel ge-update worden wanneer het artikel is ge-update?',
	'POST_UPDATE_MESSAGE'	=> 'Artikel ge-update',
	'POST_ID'				=> 'ID van forum bericht',
	'ARTICLE_ADDED_AKTIV'	=> 'Het artikel is toegevoegd aan de database en geactiveerd',
	'SHOW_POST_EDIT'		=> 'Toon updates',
	'SHOW_POST_EDIT_DESC'	=> 'Moet een update in het bericht getoond worden?',

	'PRINT_TOPIC'			=> 'Print artikel',
	'SEARCH_CATEGORIE'		=> 'Search in categorie...',

	'ADS'					=> 'Advertising',
	'KB_COPYRIGHT'			=> 'Knowledge Base by <a href="http://www.gameserveradmin.de/">Gameserveradmin.de</a>',
	'ADS_DESC'				=> 'Here you can insert code for your Advertising.',
	'URI_IN_USE'			=> 'The URL is already in use',
	'USER_CHANGED'			=> 'The user has been changed',

));

?>