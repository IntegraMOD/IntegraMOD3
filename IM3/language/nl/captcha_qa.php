<?php
/**
*
* captcha_qa [Nederlands]
*
* @package language
* @version $Id: captcha_qa.php 9966 2009-08-12 15:12:03Z Kellanved $
* @copyright (c) 2009 phpBB Group
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
	'CAPTCHA_QA'				=> 'V&amp;A CAPTCHA',
	'CONFIRM_QUESTION_EXPLAIN'	=> 'Dit is een vraag om te identificeren en geautomatiseerde ingediende items te voorkomen.',
	'CONFIRM_QUESTION_WRONG'	=> 'U hebt een ongeldig antwoord op de bevestigings vraag gegeven.',

	'QUESTION_ANSWERS'			=> 'Antwoorden',
	'ANSWERS_EXPLAIN'			=> 'Voer geldige antwoorden op de vraag in, één per regel.',
	'CONFIRM_QUESTION'			=> 'Vraag',

	'ANSWER'					=> 'Antwoord',
	'EDIT_QUESTION'				=> 'Bewerk Vraag',
	'QUESTIONS'					=> 'Vragen',
	'QUESTIONS_EXPLAIN'			=> 'Tijdens de registratie, wordt gebruikers één van de vragen die u hier opgeeft gevraagd. Gebruik deze plug-in, ten minste één vraag moet worden ingesteld in de standaard taal. Deze vragen moeten gemakkelijk door uw doel publiek kunnen worden beantwoord, maar buiten het vermogen van een bot die Google het antwoord kan laten zoeken. Met behulp van een grote set en regelmatig gewijzigde vragen geeft dit de beste resultaten. Schakel de strikte instelling in als uw vraag afhankelijk is van de lees tekens of hoofd letters en kleine letters.',
	'QUESTION_DELETED'			=> 'Vraag verwijderd',
	'QUESTION_LANG'				=> 'Taal',
	'QUESTION_LANG_EXPLAIN'		=> 'De taal waarin deze vraag en het antwoord zijn geschreven.',
	'QUESTION_STRICT'			=> 'Strenge controle',
	'QUESTION_STRICT_EXPLAIN'	=> 'Wanneer ingeschakeld, worden hoofd letters en kleine letters en witruimte ook afgedwongen.',

	'QUESTION_TEXT'				=> 'Vraag',
	'QUESTION_TEXT_EXPLAIN'		=> 'De vraag die zal worden gesteld bij registratie.',

	'QA_ERROR_MSG'				=> 'Vult u alle velden in en voer ten minste één antwoord in.',
	'QA_LAST_QUESTION'			=> 'U kunt niet alle vragen verwijderen terwijl de plugin nog actief is.',

));

?>