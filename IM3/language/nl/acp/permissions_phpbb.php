<?php
/**
* acp_permissions_phpbb (phpBB Permission Set) [Nederlands]
*
* @package language
* @version $Id: permissions_phpbb.php 9686 2009-06-26 11:52:54Z rxu $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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

/**
*	MODDERS PLEASE NOTE
*
*	You are able to put your permission sets into a separate file too by
*	prefixing the new file with permissions_ and putting it into the acp
*	language folder.
*
*	An example of how the file could look like:
*
*	<code>
*
*	if (empty($lang) || !is_array($lang))
*	{
*		$lang = array();
*	}
*
*	// Adding new category
*	$lang['permission_cat']['bugs'] = 'Bugs';
*
*	// Adding new permission set
*	$lang['permission_type']['bug_'] = 'Bug Permissions';
*
*	// Adding the permissions
*	$lang = array_merge($lang, array(
*		'acl_bug_view'		=> array('lang' => 'Can view bug reports', 'cat' => 'bugs'),
*		'acl_bug_post'		=> array('lang' => 'Can post bugs', 'cat' => 'post'), // Using a phpBB category here
*	));
*
*	</code>
*/

// Define categories and permission types
$lang = array_merge($lang, array(
	'permission_cat'	=> array(
		'actions'		=> 'Acties',
		'content'		=> 'Inhoud',
		'forums'		=> 'Forums',
		'misc'			=> 'Andere',
		'permissions'	=> 'Rechten',
		'pm'			=> 'Priv&eacute; berichten',
		'portal'		=> 'Portaal',
		'polls'			=> 'Polls',
		'post'			=> 'Bericht',
		'post_actions'	=> 'Bericht acties',
		'posting'		=> 'Plaatsen',
		'profile'		=> 'Profiel',
		'settings'		=> 'Instellingen',
		'topic_actions'	=> 'Onderwerp acties',
		'user_group'	=> 'Gebruikers &amp; groepen',
		'downloads'		=> 'Download Panel',
	),

	// With defining 'global' here we are able to specify what is printed out if the permission is within the global scope.
	'permission_type'	=> array(
		'u_'			=> 'Gebruiker rechten',
		'a_'			=> 'Beheerder rechten',
		'm_'			=> 'Moderator rechten',
		'f_'			=> 'Forum rechten',
		'global'		=> array(
		'm_'			=> 'Globale moderator rechten',
		),
	),
));

// User Permissions
$lang = array_merge($lang, array(
	'acl_u_viewprofile'	=> array('lang'	=> 'Kan profielen bekijken, ledenlijst en wie is er online lijst', 'cat' => 'profile'),
	'acl_u_chgname'		=> array('lang'	=> 'Kan gebruikersnaam wijzigen', 'cat'				=> 'profile'),
	'acl_u_chgpasswd'	=> array('lang'	=> 'Kan wachtwoord wijzigen', 'cat'					=> 'profile'),
	'acl_u_chgemail'	=> array('lang'	=> 'Kan e-mailadres wijzigen', 'cat'				=> 'profile'),
	'acl_u_chgavatar'	=> array('lang'	=> 'Kan avatar wijzigen', 'cat'						=> 'profile'),
	'acl_u_chggrp'		=> array('lang' => 'Kan standaard gebruikersgroep wijzigen', 'cat'	=> 'profile'),

	'acl_u_attach'		=> array('lang'	=> 'Kan bijlagen toevoegen', 'cat'		=> 'post'),
	'acl_u_download'	=> array('lang'	=> 'Kan bestanden downloaden', 'cat'	=> 'post'),
	'acl_u_savedrafts'	=> array('lang'	=> 'Kan concepten opslaan', 'cat'		=> 'post'),
	'acl_u_chgcensors'	=> array('lang'	=> 'Kan censuur uitschakelen', 'cat'	=> 'post'),
	'acl_u_sig'			=> array('lang'	=> 'Kan onderschrift gebruiken', 'cat'	=> 'post'),
	'acl_u_stumble'		=> array('lang'	=> 'Can submit article to Stumbleupon', 'cat' => 'post'),
	'acl_u_netv'		=> array('lang'	=> 'Can submit article to Netvouz', 'cat' => 'post'),
	'acl_u_prop'		=> array('lang' => 'Can submit article to Propeller', 'cat' => 'post'),
	'acl_u_google'		=> array('lang' => 'Can submit article to Google', 'cat' => 'post'),
	'acl_u_tech'		=> array('lang' => 'Can submit article to Technorati', 'cat' => 'post'),
	'acl_u_reddit'		=> array('lang' => 'Can submit article to Redd It', 'cat' => 'post'),
	'acl_u_linkagogo'	=> array('lang' => 'Can submit article to Link a GoGo', 'cat' => 'post'),
	'acl_u_spurl'		=> array('lang' => 'Can submit article to Spurl', 'cat' => 'post'),
	'acl_u_rds'			=> array('lang' => 'Can submit article to Yahoo My Web', 'cat' => 'post'),
	'acl_u_slashdot'	=> array('lang' => 'Can submit article to Slash Dot', 'cat' => 'post'),
	'acl_u_del'			=> array('lang' => 'Can submit article to Delicious!', 'cat' => 'post'),
	'acl_u_dig'			=> array('lang' => 'Can submit article to Digg It', 'cat' => 'post'),

	'acl_u_sendpm'		=> array('lang'	=> 'Kan priv&eacute; berichten sturen', 'cat'			=> 'pm'),
	'acl_u_masspm'		=> array('lang'	=> 'Kan priv&eacute; berichten naar meerdere gebruikers en groepen sturen', 'cat'	=> 'pm'),
	'acl_u_masspm_group'=> array('lang' => 'Can send messages to groups', 'cat' => 'pm'),
	'acl_u_readpm'		=> array('lang'	=> 'Kan priv&eacute; berichten lezen', 'cat'			=> 'pm'),
	'acl_u_pm_edit'		=> array('lang'	=> 'Kan eigen priv&eacute; berichten wijzigen', 'cat'	=> 'pm'),
	'acl_u_pm_delete'	=> array('lang'	=> 'Kan priv&eacute; berichten uit eigen map verwijderen', 'cat'	=> 'pm'),
	'acl_u_pm_forward'	=> array('lang'	=> 'Kan priv&eacute; berichten doorsturen', 'cat'	=> 'pm'),
	'acl_u_pm_emailpm'	=> array('lang'	=> 'Kan priv&eacute; berichten e-mailen', 'cat'	=> 'pm'),
	'acl_u_pm_printpm'	=> array('lang'	=> 'Kan priv&eacute; berichten afdrukken', 'cat'	=> 'pm'),
	'acl_u_pm_attach'	=> array('lang'	=> 'Kan bijlagen aan priv&eacute; berichten toevoegen', 'cat'	=> 'pm'),
	'acl_u_pm_download'	=> array('lang'	=> 'Kan bestanden uit priv&eacute; berichten downloaden', 'cat'	=> 'pm'),
	'acl_u_pm_bbcode'	=> array('lang'	=> 'Kan BBCode in priv&eacute; berichten gebruiken', 'cat'	=> 'pm'),
	'acl_u_pm_smilies'	=> array('lang'	=> 'Kan smilies in priv&eacute; berichten gebruiken', 'cat'	=> 'pm'),
	'acl_u_pm_img'		=> array('lang'	=> 'Kan afbeeldingen in priv&eacute; berichten gebruiken', 'cat'	=> 'pm'),
	'acl_u_pm_flash'	=> array('lang'	=> 'Kan flash in priv&eacute; berichten gebruiken', 'cat'	=> 'pm'),

	'acl_u_sendemail'		=> array('lang'	=> 'Kan e-mails versturen', 'cat' => 'misc'),
	'acl_u_sendim'			=> array('lang'	=> 'Kan chatberichten versturen', 'cat' => 'misc'),
	'acl_u_ignoreflood'		=> array('lang'	=> 'Kan minimum tijdsinterval overschrijden', 'cat'	=> 'misc'),
	'acl_u_hideonline'		=> array('lang'	=> 'Kan online status verbergen', 'cat' => 'misc'),
	'acl_u_viewonline'		=> array('lang'	=> 'Kan onzichtbare online gebruikers zien', 'cat'	=> 'misc'),
	'acl_u_search'			=> array('lang'	=> 'Kan het forum doorzoeken', 'cat' => 'misc'),
));

// Forum Permissions
$lang = array_merge($lang, array(
	'acl_f_list'		=> array('lang'	=> 'Kan forum zien', 'cat'	=> 'post'),
	'acl_f_read'		=> array('lang'	=> 'Kan forum lezen', 'cat'	=> 'post'),
	'acl_f_post'		=> array('lang'	=> 'Kan nieuwe onderwerpen openen', 'cat'	=> 'post'),
	'acl_f_reply'		=> array('lang'	=> 'Kan antwoorden op onderwerpen', 'cat'	=> 'post'),
	'acl_f_icons'		=> array('lang'	=> 'Kan bericht/onderwerp iconen gebruiken', 'cat'	=> 'post'),
	'acl_f_announce'	=> array('lang'	=> 'Kan mededelingen plaatsen', 'cat'	=> 'post'),
	'acl_f_sticky'		=> array('lang'	=> 'Kan sticky berichten plaatsen', 'cat'	=> 'post'),

	'acl_f_poll'		=> array('lang'	=> 'Kan polls starten', 'cat'	=> 'polls'),
	'acl_f_vote'		=> array('lang'	=> 'Kan stemmen op polls', 'cat'	=> 'polls'),
	'acl_f_votechg'		=> array('lang'	=> 'Kan zijn huidige stem wijzigen', 'cat'	=> 'polls'),

	'acl_f_attach'		=> array('lang'	=> 'Kan bestanden toevoegen', 'cat'	=> 'content'),
	'acl_f_download'	=> array('lang'	=> 'Kan bestanden downloaden', 'cat'	=> 'content'),
	'acl_f_sigs'		=> array('lang'	=> 'Kan onderschrift gebruiken', 'cat'	=> 'content'),
	'acl_f_bbcode'		=> array('lang'	=> 'Kan BBCode gebruiken', 'cat'	=> 'content'),
	'acl_f_smilies'		=> array('lang'	=> 'Kan smilies gebruiken', 'cat'	=> 'content'),
	'acl_f_img'			=> array('lang'	=> 'Kan afbeeldingen gebruiken', 'cat'	=> 'content'),
	'acl_f_flash'		=> array('lang'	=> 'Kan flash gebruiken', 'cat'	=> 'content'),

	'acl_f_edit'		=> array('lang'	=> 'Kan eigen berichten wijzigen', 'cat'	=> 'actions'),
	'acl_f_delete'		=> array('lang'	=> 'Kan eigen berichten verwijderen', 'cat'	=> 'actions'),
	'acl_f_user_lock'	=> array('lang'	=> 'Kan eigen onderwerpen sluiten', 'cat'	=> 'actions'),
	'acl_f_bump'		=> array('lang'	=> 'Kan onderwerpen bumpen', 'cat'	=> 'actions'),
	'acl_f_report'		=> array('lang'	=> 'Kan berichten melden', 'cat'	=> 'actions'),
	'acl_f_subscribe'	=> array('lang'	=> 'Kan abonneren op forum', 'cat'	=> 'actions'),
	'acl_f_print'		=> array('lang'	=> 'Kan onderwerpen afdrukken', 'cat'	=> 'actions'),
	'acl_f_email'		=> array('lang'	=> 'Kan onderwerpen e-mailen', 'cat'	=> 'actions'),

	'acl_f_search'		=> array('lang'	=> 'Kan forum doorzoeken', 'cat'	=> 'misc'),
	'acl_f_ignoreflood'	=> array('lang'	=> 'Kan minimum tijdsinterval overschrijden', 'cat'	=> 'misc'),
	'acl_f_postcount'	=> array('lang'	=> 'Verhoog berichtenteller<br /><em>Houd er rekening mee dat deze instelling alleen effect heeft op nieuwe berichten.</em>', 'cat'	=> 'misc'),
	'acl_f_noapprove'	=> array('lang'	=> 'Kan berichten plaatsen zonder goedkeuring', 'cat'	=> 'misc'),
));

// Moderator Permissions
$lang = array_merge($lang, array(
	'acl_m_edit'		=> array('lang'	=> 'Kan berichten wijzigen', 'cat'	=> 'post_actions'),
	'acl_m_delete'		=> array('lang'	=> 'Kan berichten verwijderen', 'cat'	=> 'post_actions'),
	'acl_m_approve'		=> array('lang'	=> 'Kan berichten goedkeuren', 'cat'	=> 'post_actions'),
	'acl_m_report'		=> array('lang'	=> 'Kan meldingen sluiten en verwijderen', 'cat'	=> 'post_actions'),
	'acl_m_chgposter'	=> array('lang'	=> 'Kan auteur bericht wijzigen', 'cat'	=> 'post_actions'),

	'acl_m_move'		=> array('lang'	=> 'Kan onderwerpen verplaatsen', 'cat'	=> 'topic_actions'),
	'acl_m_lock'		=> array('lang'	=> 'Kan onderwerpen sluiten', 'cat'	=> 'topic_actions'),
	'acl_m_split'		=> array('lang'	=> 'Kan onderwerpen splitsen', 'cat'	=> 'topic_actions'),
	'acl_m_merge'		=> array('lang'	=> 'Kan onderwerpen samenvoegen', 'cat'	=> 'topic_actions'),

	'acl_m_info'		=> array('lang'	=> 'Kan berichtdetail bekijken', 'cat'	=> 'misc'),
	'acl_m_warn'		=> array('lang'	=> 'Kan waarschuwingen versturen<br /><em>Deze optie is enkel global in te stellen. Het is niet gebaseerd per forum.</em>', 'cat' => 'misc'), // This moderator setting is only global (and not local)
	'acl_m_ban'			=> array('lang'	=> 'Kan bans beheren<br /><em>Deze optie is enkel global in te stellen. Het is niet gebaseerd per forum.</em>', 'cat' => 'misc'), // This moderator setting is only global (and not local)
));

// Admin Permissions
$lang = array_merge($lang, array(
	'acl_a_board'		=> array('lang'	=> 'Kan foruminstellingen wijzigen/controleren voor updates', 'cat' => 'settings'),
	'acl_a_server'		=> array('lang'	=> 'Kan server/communicatie instellingen wijzigen', 'cat' => 'settings'),
	'acl_a_jabber'		=> array('lang'	=> 'Kan Jabber-instellingen wijzigen', 'cat' => 'settings'),
	'acl_a_phpinfo'		=> array('lang'	=> 'Kan PHP-instellingen bekijken', 'cat' => 'settings'),

	'acl_a_forum'		=> array('lang'	=> 'Kan forums beheren', 'cat' => 'forums'),
	'acl_a_forumadd'	=> array('lang'	=> 'Kan nieuwe forums toevoegen', 'cat' => 'forums'),
	'acl_a_forumdel'	=> array('lang'	=> 'Kan forums verwijderen', 'cat' => 'forums'),
	'acl_a_prune'		=> array('lang'	=> 'Kan forums opruimen', 'cat' => 'forums'),

	'acl_a_icons'		=> array('lang'	=> 'Kan bericht/onderwerp iconen en smilies wijzigen', 'cat' => 'posting'),
	'acl_a_words'		=> array('lang'	=> 'Kan censuur wijzigen', 'cat' => 'posting'),
	'acl_a_bbcode'		=> array('lang'	=> 'Kan BBCode tags defini&euml;ren', 'cat' => 'posting'),
	'acl_a_attach'		=> array('lang'	=> 'Kan bijlage gerelateerde instellingen wijzigen', 'cat' => 'posting'),

	'acl_a_user'		=> array('lang'	=> 'Kan gebruikers beheren<br /><em>Dit voegt ook de mogelijkheid toe om de gebruikers browser agent te zien in de wie is er online lijst.</em>', 'cat' => 'user_group'),
	'acl_a_userdel'		=> array('lang'	=> 'Kan gebruikers verwijderen/opruimen', 'cat' => 'user_group'),
	'acl_a_group'		=> array('lang'	=> 'Kan groepen beheren', 'cat' => 'user_group'),
	'acl_a_groupadd'	=> array('lang'	=> 'Kan nieuwe groepen toevoegen', 'cat' => 'user_group'),
	'acl_a_groupdel'	=> array('lang'	=> 'Kan groepen verwijderen', 'cat' => 'user_group'),
	'acl_a_ranks'		=> array('lang'	=> 'Kan rangen beheren', 'cat' => 'user_group'),
	'acl_a_profile'		=> array('lang'	=> 'Kan aangepaste profielvelden beheren', 'cat' => 'user_group'),
	'acl_a_names'		=> array('lang'	=> 'Kan geweigerde gebruikersnamen beheren', 'cat' => 'user_group'),
	'acl_a_ban'			=> array('lang'	=> 'Kan bans beheren', 'cat' => 'user_group'),

	'acl_a_viewauth'	=> array('lang'	=> 'Kan permissie rollen bekijken', 'cat' => 'permissions'),
	'acl_a_authgroups'	=> array('lang'	=> 'Kan de rechten van individuele groepen wijzigen', 'cat' => 'rechten'),
	'acl_a_authusers'	=> array('lang'	=> 'Kan de rechten van individuele gebruikers wijzigen', 'cat' => 'rechten'),
	'acl_a_fauth'		=> array('lang'	=> 'Kan forum permissie klasse wijzigen', 'cat' => 'permissions'),
	'acl_a_mauth'		=> array('lang'	=> 'Kan moderator rechten klasse wijzigen', 'cat' => 'rechten'),
	'acl_a_aauth'		=> array('lang'	=> 'Kan beheerder rechten klasse wijzigen', 'cat' => 'rechten'),
	'acl_a_uauth'		=> array('lang'	=> 'Kan gebruiker rechten klasse wijzigen', 'cat' => 'rechten'),
	'acl_a_roles'		=> array('lang'	=> 'Kan rollen beheren', 'cat' => 'permissions'),
	'acl_a_switchperm'	=> array('lang'	=> 'Kan rechten van anderen gebruiken', 'cat' => 'rechten'),

	'acl_a_styles'		=> array('lang' => 'Kan stijlen beheren', 'cat' => 'misc'),
	'acl_a_viewlogs'	=> array('lang' => 'Kan logs bekijken', 'cat' => 'misc'),
	'acl_a_clearlogs'	=> array('lang' => 'Kan logs legen', 'cat' => 'misc'),
	'acl_a_modules'		=> array('lang' => 'Kan modules beheren', 'cat' => 'misc'),
	'acl_a_language'	=> array('lang' => 'Kan taalpakketten beheren', 'cat' => 'misc'),
	'acl_a_email'		=> array('lang' => 'Kan massa e-mails sturen', 'cat' => 'misc'),
	'acl_a_bots'		=> array('lang' => 'Kan bots beheren', 'cat' => 'misc'),
	'acl_a_reasons'		=> array('lang' => 'Kan melding/afkeurredenen beheren', 'cat' => 'misc'),
	'acl_a_backup'		=> array('lang' => 'Kan database back-uppen/terugzetten', 'cat' => 'misc'),
	'acl_a_search'		=> array('lang' => 'Kan de zoekmethodes en -instellingen beheren', 'cat' => 'misc'),
	'acl_a_k_portal'	=> array('lang' => 'Kan portaal instellingen bekijken', 'cat' => 'portal'),
	'acl_a_k_web_pages'	=> array('lang' => 'Can manage portal web pages', 'cat' => 'portal'),
	'acl_a_k_tools'		=> array('lang' => 'Can manage portal tools', 'cat' => 'portal'),

));
// Download MOD Permissions
$lang = array_merge($lang, array(
	'acl_a_dl_overview'		=> array('lang' => 'Can see the start page', 'cat' => 'downloads'),
	'acl_a_dl_config'		=> array('lang' => 'Can manage the general settings', 'cat' => 'downloads'),
	'acl_a_dl_traffic'		=> array('lang' => 'Can manage the traffic', 'cat' => 'downloads'),
	'acl_a_dl_categories'	=> array('lang' => 'Can manage the categories', 'cat' => 'downloads'),
	'acl_a_dl_files'		=> array('lang' => 'Can manage the downloads', 'cat' => 'downloads'),
	'acl_a_dl_permissions'	=> array('lang' => 'Can manage the permissions', 'cat' => 'downloads'),
	'acl_a_dl_stats'		=> array('lang' => 'Can view and manage the statistics', 'cat' => 'downloads'),
	'acl_a_dl_banlist'		=> array('lang' => 'Can manage the banlist', 'cat' => 'downloads'),
	'acl_a_dl_blacklist'	=> array('lang' => 'Can manage the file extention blacklist', 'cat' => 'downloads'),
	'acl_a_dl_toolbox'		=> array('lang' => 'Can use the toolbox', 'cat' => 'downloads'),
));

?>