<?php
/**
*
* recaptcha [Nederlands]
*
* @package language
* @version $Id: captcha_recaptcha.php 9933 2009-08-06 09:12:21Z marshalrusty $
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
	'RECAPTCHA_LANG'				=> 'nl',
	'RECAPTCHA_NOT_AVAILABLE'		=> 'Om reCaptcha te kunnen gebruiken, moet je een account hebben bij <a href="http://recaptcha.net">reCaptcha.net</a>.',
	'CAPTCHA_RECAPTCHA'				=> 'reCaptcha',
	'RECAPTCHA_INCORRECT'			=> 'De visuele bevestigings code die u hebt opgegeven is onjuist',

	'RECAPTCHA_PUBLIC'				=> 'Publieke reCaptcha sleutel',
	'RECAPTCHA_PUBLIC_EXPLAIN'		=> 'Jouw publieke reCaptcha sleutel. Sleutels kun je krijgen op <a href="http://recaptcha.net">reCaptcha.net</a>.',
	'RECAPTCHA_PRIVATE'				=> 'Priv&eacute; reCaptcha sleutel',
	'RECAPTCHA_PRIVATE_EXPLAIN'		=> 'Jouw priv&eacute; reCaptcha sleutel. Sleutels kun je krijgen op <a href="http://recaptcha.net">reCaptcha.net</a>.',

	'RECAPTCHA_EXPLAIN'				=> 'In een poging om automatisch geplaatste berichten te voorkomen, moet u beide van de hieronder weer gegeven woorden in het tekstveld hieronder invoeren.',
));

?>