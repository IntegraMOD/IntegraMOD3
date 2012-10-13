<?php
/**
*
* common [Deutsch - Du]
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
         0 => 'S',
         1 => 'M',
         2 => 'D',
         3 => 'M',
         4 => 'D',
         5 => 'F',
         6 => 'S',
         ),     
      
   'DAY'=> array(
         0 => 'So',
         1 => 'Mo',
         2 => 'Di',
         3 => 'Mi',
         4 => 'Do',
         5 => 'Fr',
         6 => 'Sa',
         ),
         
   'LONG_DAY'=> array(
         0 => 'Sonntag',
         1 => 'Montag',
         2 => 'Dienstag',
         3 => 'Mittwoch',
         4 => 'Donnerstag',
         5 => 'Freitag',
         6 => 'Samstag',
         ),
         
   'MONTH'=> array(
         1 => 'Jan',
         2 => 'Feb',
         3 => 'Mär',
         4 => 'Apr',
         5 => 'Mai',
         6 => 'Jun',
         7 => 'Jul',
         8 => 'Aug',
         9 => 'Sep',
         10 => 'Okt',
         11 => 'Nov',
         12 => 'Dez',
      ),

   'LONG_MONTH'=> array(
         1 => 'Januar',
         2 => 'Februar',
         3 => 'März',
         4 => 'April',
         5 => 'Mai',
         6 => 'Juni',
         7 => 'Juli',
         8 => 'August',
         9 => 'September',
         10 => 'Oktober',
         11 => 'November',
         12 => 'Dezember',
      ),
   ),

'NEW_EVENT'                 			=> 'Neuer Termin',

'CALENDAR_ADD_EVENT'        			=> 'Termin hinzufügen',
'CALENDAR_EDIT_EVENT'       			=> 'Termin bearbeiten',
'CALENDAR_DELETE_EVENT'     			=> 'Termin löschen',
'CALENDAR_DELETE_WARN'      			=> 'Ein gelöschter Termin kann nicht wiederhergestellt werden. Bist du sicher, dass du diesen Vorgang fortsetzen möchtest?',
'CALENDAR_EVENT_NAME'       			=> 'Name',
'CALENDAR_EVENT_DESC'       			=> 'Beschreibung',
'CALENDAR_EVENT_DESC_EXP'   			=> 'Beschreibe den Termin (maximal 255 Zeichen möglich)',
'CALENDAR_EVENT_END'        			=> 'Ende',
'CALENDAR_EVENT_START'      			=> 'Start',
'CALENDAR_EVENT_REPEAT'					=> 'Termin wiederholen',
'CALENDAR_REPEAT_DATES'					=> 'kalkulierte Wiederholungen',
'CALENDAR_REPEAT_COUNT'					=> 'Anzahl der Wiederholungen',
'CALENDAR_REPEAT_PERIOD'				=> 'Intervall',
'CALENDAR_ASSOC_EVENT'      			=> 'Termin im Kalender hinzufügen',

'CALENDAR_NAME_ERROR'       			=> 'Du musst einen Namen für den Termin angeben.',
'CALENDAR_INPUT_START_TIME_DATE_ERROR'	=> 'Du musst einen gültigen Beginn für den Termin angeben.',
'CALENDAR_INPUT_END_TIME_DATE_ERROR'  	=> 'Du musst ein gültiges Ende für den Termin angeben.',
'CALENDAR_OVERLAP_ERROR'    			=> 'Das Ende muss nach dem Start des Termins liegen.',
'CALENDAR_DESC_ERROR'       			=> 'Du musst den Termin beschreiben.',
'CALENDAR_REPEAT_COUNT_ERROR'			=> 'Die Anzahl der Wiederholungen liegt nicht im vorgegebenen Rahmen.',
'CALENDAR_REPEAT_WHEN_ERROR'			=> 'Die Angaben für die Wiederholung sind nicht gültig.',
'CALENDAR_REPEAT_TIMES_INCONSISTENT'	=> 'Der Anfangstermin stimmt nicht mit den eingestellten Wiederholungsvorgaben überein.',
'CALENDAR_INCONSISTENCY_SPECIFICS'		=> '&rArr; %s ist nicht der %s %s des gewählten Monats',
'CALENDAR_INCONSISTENT_MONTH'			=> '&rArr; %s ist nicht der %s %s im %s',
'CALENDAR_MUST_SELECT_GROUP'			=> 'Du musst mindestens eine Gruppe für Gruppen-Termine auswählen',
'CALENDAR_MUST_SELECT_USER' 			=> 'Du musst mindestens einen Benutzer für private Termine auswählen',
'CALENDAR_INVALID_USERNAME'				=> 'Es existiert kein Benutzer mit dem Namen \'%s\' ',

'PERIOD_DAYS'							=> 'Jeden Tag',
'PERIOD_WEEKS'							=> 'Jede Woche',
'PERIOD_MONTHS'							=> 'Jeden Monat',
'PERIOD_YEARS'							=> 'Jedes Jahr',
'PERIOD_WEEKDAY_MONTH'					=> 'Wochentag eines Monats',
'PERIOD_WEEKDAY_MONTH_YEAR'				=> 'Wochentag eines Monats jedes Jahr',
'PERIOD_SPECIFY_DATES'					=> 'Specify multiple dates',
'PERIOD_N_DAYS'							=> 'Alle n Tage',
'PERIOD_N_WEEKS'						=> 'Alle n Wochen',
'PERIOD_N_MONTHS'						=> 'Alle n Monate',
'PERIOD_N_YEARS'						=> 'Alle n Jahre',

'SINGLE_EVENT'							=> 'Einzeltermin',
'INITIAL_EVENT'							=> 'Anfangstermin',
'REPEAT'								=> 'Wiederholung',
'REPEATED'								=> 'Repeated',

'IS_REPEAT_EVENT'						=> 'Dies ist ein Wiederholungstermin',
'IS_CONTINUED_EVENT'					=> 'Dieser Termin wird vom Vortag fortgeführt',

'FIRST'									=> 'erste',
'SECOND'								=> 'zweite',
'THIRD'									=> 'dritte',
'FOURTH'								=> 'vierte',
'LAST'									=> 'letzte',
'EVERY'									=> 'alle',
'MONTHS'								=> 'Monate',
'OF'									=> 'im',
'EVERY_YEAR'							=> 'jeden Jahres',

'INITIAL_EVENT_SETTINGS_NOTICE'			=> 'Die Zeiten des Anfangstermins werden anhand der eingegebenen Informationen ermittelt',

'NTH_DAY_N_MONTHS_DETAILS'				=> ' am %s %s des Monats, alle %s Monate<br />',
'NTH_DAY_NTH_MONTH_EACH_YEAR_DETAILS'	=> '%s %s im %s jeden Jahres',

'ADD_EVENTS_CONFIRM'					=> 'Bist du sicher dass du folgende(n) Termin(e) hinzufügen möchtest??<br />Wiederholungsintervall: %s<br />%s',
'EDIT_EVENTS_CONFIRM'					=> 'Bist du sicher dass du den Termin auf folgende Einstellungen abändern möchtest?<br />Wiederholungsintervall: %s<br />%s',

'DELETE_SINGLE_EVENT_CONFIRM'			=> 'Einmal gelöscht, kann der Termin nicht wiederhergestellt werden.<br />Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
'DELETE_MULTIPLE_EVENTS_CONFIRM'		=> 'Zu diesem Termin gehören weitere Wiederholungen. Das Löschen dieses Termins betrifft somit auch die Folgetermine.<br />Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
'DELETE_REPEAT_EVENT_INSTANCE_CONFIRM'	=> 'Mit einem Klick auf \'JA\' wird nur dieser Wiederholungstermin gelöscht.<br />Einmal gelöscht, kann der Termin nicht wiederhergestellt werden.<br />Um die komplette Terminserie zu löschen, musst du den Anfangstermin löschen.<br />Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
'DELETE_SINGLE_T_EVENT_CONFIRM'			=> 'Einmal gelöscht, kann der Termin nicht wiederhergestellt werden.<br />Das Löschen dieses Termins betrifft nicht den Beitrag.<br />Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
'DELETE_MULTIPLE_T_EVENTS_CONFIRM'		=> 'Das Löschen dieses Termins betrifft auch alle Folgetermine.<br />Einmal gelöscht, kann der Termin nicht wiederhergestellt werden.<br />Das Löschen dieses Termins betrifft nicht den Beitrag.<br /> Bist du sicher, dass du den Vorgang fortsetzen möchtest?',
'DELETE_REPEAT_EVENT_T_INSTANCE_CONFIRM'=> 'Mit einem Klick auf \'JA\' wird nur dieser Wiederholungstermin gelöscht.<br />Einmal gelöscht, kann der Termin nicht wiederhergestellt werden.<br />Um die komplette Terminserie zu löschen, musst du den Anfangstermin löschen.<br />Das Löschen dieses Termins betrifft nicht den Beitrag.<br />Bist du sicher, dass du den Vorgang fortsetzen möchtest?',

'CALENDAR_EVENT_ADDED'      			=> 'Der Termin wurde erfolgreich hinzugefügt',
'CALENDAR_EVENT_EDITED'     			=> 'Der Termin wurde erfolgreich geändert',
'CALENDAR_EVENT_DELETED'    			=> 'Der Termin wurde erfolgreich gelöscht',
'CALENDAR_EVENTS_DELETED'    			=> 'Die Termine wurden erfolgreich gelöscht',
'CALENDAR_EVENT_INSTANCE_DELETED'		=> 'Der Wiederholungstermin wurde erfolgreich gelöscht',
'CALENDAR_REPEAT_EVENT_ADDED'      		=> 'Die Terminserie wurde erfolgreich hinzugefügt',
'CALENDAR_REPEAT_EVENT_EDITED'     		=> 'Die Terminserie wurde erfolgreich geändert',
'CALENDAR_REPEAT_EVENT_DELETED'    		=> 'Die Terminserie wurde erfolgreich gelöscht',
'ACTION_FAILED'             			=> 'Der Vorgang konnte nicht abgeschlossen werden',


// Special groups
'GROUP_PRIVATE'             			=> 'privat',
'GROUP_PUBLIC'              			=> 'öffentlich',

'EVENTS_OF'								=> 'Termine vom',
'DATE'                     				=> 'Datum',
'DAYS'                     				=> ' Tage, ',
'HOURS'                     			=> ' Stunden, ',
'MINUTES'                  				=> ' Minuten ',
'DAY'                     				=> ' Tag, ',
'HOUR'                     				=> ' Stunde, ',
'MINUTE'                  				=> ' Minute ',
'WEEK_NUM'                  			=> 'KW',
'WEEK_NUM_EXPLAIN'          			=> 'Kalenderwoche nach ISO-8601 berechnet',
'WEEK_NUM_NOTES'            			=> 'Die Kalenderwoche bezieht sich auf die Woche montags beginnend. Falls du dir den Sonntag als Wochenbeginn anzeigen lässt, gehört dieser zur vorangegangenen Kalenderwoche',
'STARTS'                  				=> 'beginnt',
'ENDS'                     				=> 'endet',
'DURATION'                  			=> 'Dauer',

'UNEXPECTED_ERROR'          			=> 'Ein unerwarteter Fehler ist aufgetreten',
'RETURN_CALENDAR'           			=> 'Zurück zum Kalender',
'READ_FULL_TOPIC'           			=> ' ...den ganzen Beitrag lesen',

'CALENDAR_SETTINGS'         			=> 'Kalender Einstellungen',
'CAL_START_DAY'             			=> 'Wochenbeginn',
'SHOW_WEEK_NUMS'						=> 'Zeige Kalenderwochen?',
'SHOW_BIRTHDAYS'						=> 'Zeige Geburtstage im Haupt-Kalender?',
'SHOW_UPCOMING_BIRTHDAYS'				=> 'Zeige Liste bevorstehender Geburtstage?',
'SHOW_UPCOMING_EVENTS'					=> 'Zeige Liste bevorstehender Termine?',
'UPCOMING_EVENTS_DAYS'					=> 'Terminvorschau (Anzahl der Tage - maximal: %s)',
'UPCOMING_BIRTHDAYS_DAYS'				=> 'Geburtstagsvorschau (Anzahl der Tage - maximal: %s)',
'CALENDAR_NOTES'            			=> 'Additional notes about the calendar',
'HAS_ASSOCIATED_EVENT'      			=> 'Dieser Beitrag beinhaltet einen Termin',
'GO_TO_EVENT'               			=> '...in der Kalenderansicht betrachten',
'MORE_EVENTS'               			=> 'weitere Termine...',
'BIRTHDAYS'                 			=> 'Geburtstage...',
'UPCOMING_BIRTHDAYS'        			=> 'bevorstehende Geburtstage',
'UPCOMING_EVENTS'       				=> 'bevorstehende Termine',
'NO_UPCOMING_BIRTHDAYS'     			=> 'keine bevorstehenden Geburtstage',
'NO_UPCOMING_EVENTS'        			=> 'keine bevorstehenden Termine',
'NO_EVENTS_TODAY'						=> 'keine Termine an diesem tag',
'NO_REPEATS_FOUND'						=> 'keine Wiederholungen dieses Termins gefunden',
'ON'                     				=> 'am',
'AT'                     				=> 'um',
'UPCOMING_EVENTS_TIME_FRAME'			=> ' (innerhalb der nächsten %s Tage)',

'CALENDAR_EXPORT'						=> 'Kalender exportieren',
'CALENDAR_EXPORT_ICAL'					=> 'Export zu ICAL',
'CALENDAR_EXPORT_ICAL_EXPLAIN'			=> 'exportiert den Kalendar in das .ical-Format',
'CALENDAR_EXPORT_CSV'					=> 'Export zu CSV',
'CALENDAR_EXPORT_CSV_EXPLAIN'			=> 'exportiert den Kalendar in das .csv-Format',
'CALENDAR_PUBLISH_RSS'					=> 'Veröffentlichung als RSS',
'CALENDAR_PUBLISH_RSS_EXPLAIN'			=> 'veröffentlicht den Kalender im RSS-Format',
'CALENDAR_SUBSCRIBE_PRIV_CAL'			=> 'Abonniere privaten RSS',
'CALENDAR_SUBSCRIBE_PRIV_CAL_EXPLAIN'	=> 'abonniert RSS-Feed für deinen privaten Kalender',
'CALENDAR_SUBSCRIBE_PUBLIC_CAL'			=> 'Abonniere öffentlichen RSS',
'CALENDAR_SUBSCRIBE_PUBLIC_CAL_EXPLAIN'	=> 'abonniert RSS-Feed für öffentlichen Kalender',

'CALENDAR_INVITE_ATTENDEES'				=> 'Teilnehmer einladen?',
'CALENDAR_SIGN_UP_INVITATION'			=> 'Du bist zu diesem Termin eingeladen',
'CALENDAR_SIGN_UP_ACCEPT'				=> 'AKZEPTIEREN',
'CALENDAR_SIGN_UP_DECLINE'				=> 'ABLEHNEN',
'CALENDAR_SIGN_UP_CONFIRM'				=> 'Bist du sicher, dass du dich zu diesem Termin anmelden möchtest?',
'CALENDAR_SIGN_DOWN_CONFIRM'			=> 'Bist du sicher, dass du diese Termin absagen möchtest?',
'CALENDAR_SIGNED_UP'					=> 'Du bist zu diesem Termin angemeldet ',
'CALENDAR_SIGNED_DOWN'					=> 'Du hast angegeben, dass du diesen Termin nicht wahrnehmen möchtest ',
'CALENDAR_SIGN_UP_SUCCESS'				=> 'Du hast deine Entscheidung zu diesem Termin erfolgreich übermittelt',
'CALENDAR_RETRACT_SIGN_UP_SUCCESS'		=> 'Du hast deine Entscheidung zu diesem Termin erfolgreich zurückgezogen',
'CALENDAR_UN_SIGN_UP'					=> 'AUSTRAGEN',
'CALENDAR_UN_SIGN_UP_CONFIRM'			=> 'Bist du sicher, dass du deine Entscheidung zu diesem Termin zurückziehen möchtest?',
'CALENDAR_EVENT_MEMBERS_SIGNED'			=> 'Benutzer, die zugesagt haben',
'CALENDAR_EVENT_MEMBERS_SIGNED_NONE'	=> 'Kein Benutzer hat sich für den Termin eingetragen',
'CALENDAR_EVENT_MEMBERS_NOT_SIGNED'		=> 'Benutzer, die abgesagt haben', 
'CALENDAR_EVENT_MEMBERS_NOT_SIGNED_NONE'=> 'Kein Benutzer hat angegeben, an diesem Termin nicht teilzunehmen',

));

?>