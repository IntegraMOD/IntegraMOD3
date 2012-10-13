<?php
/**
*
* calendar [English]
*
* @package language
* @version $Id: calendar.php,v ALPHA 3.5 2007/10/02 12:00:00 jcc264 Exp $
* @copyright (c) 2007 M and J Media
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
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
// â€™ Â» â€œ â€ â€¦
//

$lang = array_merge($lang, array(

	'CALENDAR'=> array(
		'DAY_INITIAL'=> array(
			0 => 'Z',
			1 => 'M',
			2 => 'D',
			3 => 'W',
			4 => 'D',
			5 => 'V',
			6 => 'Z',
		),

		'DAY'=> array(
			0 => 'Zo',
			1 => 'Ma',
			2 => 'Di',
			3 => 'Wo',
			4 => 'Do',
			5 => 'Vr',
			6 => 'Za',
		),

		'LONG_DAY'=> array(
			0 => 'Zondag',
			1 => 'Maandag',
			2 => 'Dinsdag',
			3 => 'Woensdag',
			4 => 'Donderdag',
			5 => 'Vrijdag',
			6 => 'Zaterdag',
		),

		'MONTH'=> array(
			1 => 'Jan',
			2 => 'Feb',
			3 => 'Mrt',
			4 => 'Apr',
			5 => 'Mei',
			6 => 'Jun',
			7 => 'Jul',
			8 => 'Aug',
			9 => 'Sep',
			10 => 'Okt',
			11 => 'Nov',
			12 => 'Dec',
		),

		'LONG_MONTH'=> array(
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maart',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Augustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'December',
		),
	),

	'NEW_EVENT'						=> 'Nieuw Evenement',

	'CALENDAR_ADD_EVENT'					=> 'Evenement Toevoegen',
	'CALENDAR_EDIT_EVENT'					=> 'Evenement Bewerken',
	'CALENDAR_DELETE_EVENT'					=> 'Evenement Verwijderen',
	'CALENDAR_DELETE_WARN'					=> 'Verwijderde evenementen kunnen niet hersteld worden. <br /> Toch doorgaan?',
	'CALENDAR_EVENT_NAME'					=> 'Evenement Naam',
	'CALENDAR_EVENT_DESC'					=> 'Evenement Beschrijving',
	'CALENDAR_EVENT_DESC_EXP'				=> 'Hier kunt u een Evenement Beschrijving van maximaal 255 tekens invoeren',
	'CALENDAR_EVENT_END'					=> 'Evenement Einde',
	'CALENDAR_EVENT_START'					=> 'Evenement Begin',
	'CALENDAR_EVENT_REPEAT'					=> 'Evenement Herhalen',
	'CALENDAR_REPEAT_DATES'					=> 'Berekende Herhaal datums',
	'CALENDAR_REPEAT_COUNT'					=> 'Aantal Herhalingen',
	'CALENDAR_REPEAT_PERIOD'				=> 'Herhaal Periode',
	'CALENDAR_ASSOC_EVENT'					=> 'Geassocieerde Evenementen',

	'CALENDAR_NAME_ERROR'					=> 'U moet een Evenement Naam specificeren.',
	'CALENDAR_INPUT_START_TIME_DATE_ERROR'	=> 'U moet een geldige begin tijd en datum voor het evenement specificeren.',
	'CALENDAR_INPUT_END_TIME_DATE_ERROR'	=> 'U moet een geldige eind tijd en datum voor het evenement specificeren.',
	'CALENDAR_OVERLAP_ERROR'				=> 'Het einde van het evenement moet na het begin van het evenement zijn.',
	'CALENDAR_DESC_ERROR'					=> 'U moet een evenement beschrijving invoeren.',
	'CALENDAR_REPEAT_COUNT_ERROR'			=> 'Aantal herhalingen is niet binnen bereik',
	'CALENDAR_REPEAT_WHEN_ERROR'			=> 'Evenement herhaling-parameters zijn ongeldig',
	'CALENDAR_REPEAT_TIMES_INCONSISTENT'	=> 'De evenement specificaties zijn niet in overeenstemming met de herhaal-parameters die u heeft opgegeven',
	'CALENDAR_INCONSISTENCY_SPECIFICS'		=> '&rArr; %s is niet de %s %s van de gespecificeerde maand',
	'CALENDAR_INCONSISTENT_MONTH'			=> '&rArr; %s is niet de s %s van %s',
	'CALENDAR_MUST_SELECT_GROUP'			=> 'U moet minimaal &#233;&#233;n groep selecteren voor groep evenementen',
	'CALENDAR_MUST_SELECT_USER'				=> 'U moet minimaal &#233;&#233;n lid selecteren voor priv&#233; evenementen',
	'CALENDAR_INVALID_USERNAME'				=> 'De gebruiker \'%s\' is ongeldig, of de gebruiker bestaat niet',

	'PERIOD_DAYS'							=> 'Iedere dag',
	'PERIOD_WEEKS'							=> 'Iedere week',
	'PERIOD_MONTHS'							=> 'Iedere maand',
	'PERIOD_YEARS'							=> 'Ieder jaar',
	'PERIOD_WEEKDAY_MONTH'					=> 'nde weekdag, iedere nde maand',
	'PERIOD_WEEKDAY_MONTH_YEAR'				=> 'nde weekdag, iedere nde maand van\'t jaar',
	'PERIOD_SPECIFY_DATES'					=> 'Specificeer meerdere datums',
	'PERIOD_N_DAYS'							=> 'Iedere n dagen',
	'PERIOD_N_WEEKS'						=> 'Iedere n weken',
	'PERIOD_N_MONTHS'						=> 'Iedere n maanden',
	'PERIOD_N_YEARS'						=> 'Iedere n jaren',

	'SINGLE_EVENT'							=> 'Enkel Evenement',
	'INITIAL_EVENT'							=> 'Oorspronkelijk event',
	'REPEAT'								=> 'Herhaal',
	'REPEATED'								=> 'Herhaling',

	'IS_REPEAT_EVENT'						=> 'Dit is een herhaald evenement',
	'IS_CONTINUED_EVENT'					=> 'Dit evenement is een vervolg van de afgelopen dag',

	'FIRST'									=> 'Eerste',
	'SECOND'								=> 'Tweede',
	'THIRD'									=> 'Derde',
	'FOURTH'								=> 'Vierde',
	'LAST'									=> 'Laatste',
	'EVERY'									=> 'Iedere',
	'MONTHS'								=> 'Maanden',
	'OF'									=> 'van',
	'EVERY_YEAR'							=> 'Ieder Jaar',

	'INITIAL_EVENT_SETTINGS_NOTICE'			=> 'De tijden van het eerste evenement zal worden bepaald door de informatie die hierboven is ingevoerd',

	'NTH_DAY_N_MONTHS_DETAILS'				=> ' op de %s %s van de maand, om de %s maanden<br />',
	'NTH_DAY_NTH_MONTH_EACH_YEAR_DETAILS'	=> '%s %s van %s ieder jaar',

	'ADD_EVENTS_CONFIRM'					=> 'Weet u zeker dat u het/de volgende evenement(en) wilt toevoegen ?<br />Herhaling\'s patroon: %s<br />%s',
	'EDIT_EVENTS_CONFIRM'					=> 'Weet u zeker dat u het evenement met de volgende parameters wilt vervangen ?<br />Herhaling\'s patroon: %s<br />%s',

	'DELETE_SINGLE_EVENT_CONFIRM'				=> 'Verwijderde evenementen kunnen niet hersteld worden. <br />Toch doorgaan?',
	'DELETE_MULTIPLE_EVENTS_CONFIRM'			=> 'Er zijn herhalingen geassocieerd met dit evenement. Verwijderen van dit evenement zal ook de herhalingen verwijderen. <br />Toch doorgaan?',
	'DELETE_REPEAT_EVENT_INSTANCE_CONFIRM'		=> 'Door \'JA\' te klikken verwijdert U all&#233;&#233;n dit herhaal evenement.<br />Verwijderdde evenementen kunnen niet hersteld worden.<br />Om alle herhalingen te verwijderen, moet u het hoofd evenement verwijderen.<br />Toch doorgaan?',
	'DELETE_SINGLE_T_EVENT_CONFIRM'				=> 'Verwijderdde evenementen kunnen niet hersteld worden.<br />Verwijderen van dit evenement zal het bericht niet verwijderen.<br />Toch doorgaan?',
	'DELETE_MULTIPLE_T_EVENTS_CONFIRM'			=> 'Verwijderen van dit evenement zal ook de herhalingen verwijderen.<br />Verwijderdde evenementen kunnen niet hersteld worden.<br />Verwijderen van deze evenementen zal het bericht niet verwijderen.<br /> Toch doorgaan?',
	'DELETE_REPEAT_EVENT_T_INSTANCE_CONFIRM'	=> 'Door \'JA\' te klikken verwijdert U all&#233;&#233;n dit herhaal evenement.<br />Verwijderdde evenementen kunnen niet hersteld worden.<br />Om alle herhalingen te verwijderen, moet u het hoofd evenement verwijderen.<br />Verwijderen van deze evenementen zal het bericht niet verwijderen.<br />Toch doorgaan?',

	'CALENDAR_EVENT_ADDED'					=> 'Het evenement is succesvol toegevoegd',
	'CALENDAR_EVENT_EDITED'					=> 'Het evenement is succesvol bewerkt',
	'CALENDAR_EVENT_DELETED'				=> 'Het evenement is succesvol verwijdert',
	'CALENDAR_EVENTS_DELETED'				=> 'De evenementen zijn succesvol verwijdert',
	'CALENDAR_EVENT_INSTANCE_DELETED'		=> 'Het herhaal evenement was succesvol verwijdert',
	'CALENDAR_REPEAT_EVENT_ADDED'			=> 'Herhaal evenement(en) succesvol toegevoegd',
	'CALENDAR_REPEAT_EVENT_EDITED'			=> 'Herhaal evenement(en) succesvol bewerkt',
	'CALENDAR_REPEAT_EVENT_DELETED'			=> 'Herhaal evenement(en) succesvol verwijdert',
	'ACTION_FAILED'							=> 'De actie kon niet worden voltooid',


	// Special groups
	'GROUP_PRIVATE'					=> 'Priv&#233;',
	'GROUP_PUBLIC'					=> 'Publiek',

	'EVENTS_OF'						=> 'Evenementen van',
	'DATE'							=> 'Datum',
	'DAYS'							=> ' Dagen, ',
	'HOURS'							=> ' Uren, ',
	'MINUTES'						=> ' Minuten ',
	'DAY'							=> ' Dag, ',
	'HOUR'							=> ' Uur, ',
	'MINUTE'						=> ' Minuut ',
	'WEEK_NUM'						=> 'Wk',
	'WEEK_NUM_EXPLAIN'				=> 'Week nummer berekend volgens ISO-8601',
	'WEEK_NUM_NOTES'				=> 'Week nummers hebben betrekking op de week met maandag als eerste dag van de week. Aangezien U Zondag als eerste dag van de week heeft ingesteld, hebben de Zondagen betrekking op de voorafgaande week\'s nummer.',
	'STARTS'						=> 'Begint',
	'ENDS'							=> 'Eindigt',
	'DURATION'						=> 'Duur',

	'UNEXPECTED_ERROR'				=> 'Een onverwachte fout is opgetreden',
	'RETURN_CALENDAR'				=> 'Terug naar Kalender',
	'RETURN_EVENT_TOPIC'			=> 'Terug naar Onderwerp',
	'READ_FULL_TOPIC'				=> ' ...Volledige bericht lezen',

	'CALENDAR_SETTINGS'				=> 'Instellingen Kalender',
	'CAL_START_DAY'					=> 'Start van de Week',
	'SHOW_WEEK_NUMS'				=> 'Week nummer weergeven?',
	'SHOW_BIRTHDAYS'				=> 'Verjaardagen in hoofd kalender aanzicht weergeven?',
	'SHOW_UPCOMING_BIRTHDAYS'		=> 'Komende verjaardagen lijst weergeven?',
	'SHOW_UPCOMING_EVENTS'			=> 'Komende evenementen lijst weergeven?',
	'UPCOMING_EVENTS_DAYS'			=> 'Komende Evenementen (Aantal dagen weer te geven - Max: %s)',
	'UPCOMING_BIRTHDAYS_DAYS'		=> 'Komende verjaardagen (Aantal dagen weer te geven - Max: %s)',
	'CALENDAR_NOTES'				=> 'Aanvullende opmerkingen over de kalender',
	'HAS_ASSOCIATED_EVENT'			=> 'Dit bericht heeft een geassociëerd evenement',
	'GO_TO_EVENT'					=> '...Kijk in de agenda context',
	'MORE_EVENTS'					=> 'Meer evenementen...',
	'BIRTHDAYS'						=> 'Verjaardagen...',
	'UPCOMING_BIRTHDAYS'			=> 'Komende Verjaardagen',
	'UPCOMING_EVENTS'				=> 'Komende Evenementen',
	'NO_UPCOMING_BIRTHDAYS'			=> 'Er zijn g&#233;&#233;n komende verjaardagen',
	'NO_UPCOMING_EVENTS'			=> 'Er zijn g&#233;&#233;n komende evenementen',
	'NO_EVENTS_TODAY'				=> 'Vandaag zijn g&#233;&#233;n evenementen',
	'NO_REPEATS_FOUND'				=> 'G&#233;&#233;n herhalingen gevonden voor dit evenement',
	'ON'							=> 'op',
	'AT'							=> 'om',
	'UPCOMING_EVENTS_TIME_FRAME'	=> ' (Binnen de komende %s dagen)',

	'CALENDAR_EXPORT'						=> 'Kalender exporteren',
	'CALENDAR_EXPORT_ICAL'					=> 'Exporteren als ICAL',
	'CALENDAR_EXPORT_ICAL_EXPLAIN'			=> 'Kalender exporteren in .ical formaat',
	'CALENDAR_EXPORT_CSV'					=> 'Exporteren als CSV',
	'CALENDAR_EXPORT_CSV_EXPLAIN'			=> 'Kalender exporteren in .csv formaat',
	'CALENDAR_PUBLISH_RSS'					=> 'Publiceren als RSS',
	'CALENDAR_PUBLISH_RSS_EXPLAIN'			=> 'Kalender publiceren in RSS formaat',
	'CALENDAR_SUBSCRIBE_PRIV_CAL'			=> 'Abonneren op Priv&#233; RSS',
	'CALENDAR_SUBSCRIBE_PRIV_CAL_EXPLAIN'	=> 'Abonneren op uw priv&#233; kalender RSS feed',
	'CALENDAR_SUBSCRIBE_PUBLIC_CAL'			=> 'Abonneren op Publiek RSS',
	'CALENDAR_SUBSCRIBE_PUBLIC_CAL_EXPLAIN'	=> 'Abonneren op publiek kalender RSS feed',

	'CALENDAR_INVITE_ATTENDEES'				=> 'Deelnemers Uitnodigen?',
	'CALENDAR_SIGN_UP_INVITATION'			=> 'U bent uitgenodigt om bij te wonen of deel te nemen aan dit evenement aan dit evenement',
	'CALENDAR_SIGN_UP_ACCEPT'				=> 'ACCEPTEREN',
	'CALENDAR_SIGN_UP_DECLINE'				=> 'AFWIJZEN',
	'CALENDAR_SIGN_UP_CONFIRM'				=> 'Weet u zeker dat u zich voor dit evenement wilt aanmelden?',
	'CALENDAR_SIGN_DOWN_CONFIRM'			=> 'Weet u zeker dat u de aanmelding voor dit evenement wilt afwijzen?',
	'CALENDAR_SIGNED_UP'					=> 'U bent aangemeld voor dit evenement ',
	'CALENDAR_SIGNED_DOWN'					=> 'U heeft aangegeven dat u niet zult deelnemen aan dit evenement ',
	'CALENDAR_SIGN_UP_SUCCESS'				=> 'U heeft w aanwezigheid status voor dit evenement ingediend',
	'CALENDAR_RETRACT_SIGN_UP_SUCCESS'		=> 'U heeft w aanwezigheid status voor dit evenement terug getrokken',
	'CALENDAR_UN_SIGN_UP'					=> 'AFMELDEN',
	'CALENDAR_UN_SIGN_UP_CONFIRM'			=> 'Weet U zeker dat U zich wilt afmelden voor dit evenement?',
	'CALENDAR_EVENT_MEMBERS_SIGNED'			=> 'Aangemeldde leden voor dit evenement',
	'CALENDAR_EVENT_MEMBERS_SIGNED_NONE'	=> 'Er zijn g&#233;&#233;n leden aangemeld voor dit evenement',
	'CALENDAR_EVENT_MEMBERS_NOT_SIGNED'		=> 'Leden die zich hebben afgemeld voor dit evenement',
	'CALENDAR_EVENT_MEMBERS_NOT_SIGNED_NONE'	=> 'Geen leden hebben aangegeven dat zij niet zullen deelnemen aan dit evenement',

));

?>