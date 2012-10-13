<?PHP

/** 
*
* dl_install [Nederlands]
*
* @mod package		Download Mod 6
* @file				dl_install.php v 1.0 2008/04/10 OXPUS
* @copyright		(c) 2008 oxpus (Karsten Ude) <webmaster@oxpus.de> http://www.oxpus.de
* @copyright mod	(c) hotschi / demolition fabi / oxpus
* @license			http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* [ english ] language file for Download MOD 6
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
	'DL_INSTALL_INTRO'			=> '<strong>Download MOD Installation</strong><br /><br />From here you can let to all needed database settings for the Download MOD automatically.<br />The script will create all needed tables and fill them with default values.<br />To start the installation click on the button "Yes".<br /><br />Please be sure, that no tables from this MOD were created before!',
	'DL_INSTALL_FINISHED'		=> '<strong>Congratulation!</strong><br /><br />The installation of the database settings from the Download MOD is finished.<br /><br />Please delete now the folder umil/ and the file install.php from your forum root.',

	'DL_UPDATE_INTRO'			=> '<strong>Download MOD Update</strong><br /><br />From here you can update an existing Download MOD installation to the newest release.<br /><br />This scipt updates all tables at least from Download MOD 5.0.0 to the newest release.<br />All needed steps for this will be done by this script automaticaly.<br /><br />Click for starting the update on the button "Yes".',
	'DL_UPDATE_FINISHED'		=> '<strong>Congratulation!</strong><br /><br />The update of the database settings from the Download MOD is finished.<br /><br />Please delete the folder umil/ and the file install.php from your forum root.',

	'DL_CONVERT_NO'				=> '<strong>You have not installed a featured release of the MOD.</strong><br /><br />If your MOD is older than 5.2.0 then update it first.<br />Otherwise if you uses already a release 6.x then update it like the update manuals from the MOD itself.',
	'DL_CONVERT_FINISH'			=> '<strong>Converting successfull done</strong><br /><br />Please update now your MOD installation as you can find in the update manuals of the MOD itself and delete this script form your forum root.',
	'DL_CONVERT_MOD'			=> '<strong>Converting download data</strong><br /><br />This script will convert the data from your MOD installation from your phpBB 2 into the new phpBB 3 format. There will only be added some formatting fields in the tables and reformattings on the data contents.<br />To update the MOD itself, please follow the update manuals of the MOD.<br />Now click on the "Yes" button to start the converting.',
));

?>