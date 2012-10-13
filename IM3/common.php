<?php
/**
*
* @package phpBB3
* @version $Id: common.php 10299 2009-12-06 02:30:24Z naderman $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Minimum Requirement: PHP 4.3.3
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

// Report all errors, except notices and deprecation messages
if (!defined('E_DEPRECATED'))
{
	define('E_DEPRECATED', 8192);
}
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

/*
* Remove variables created by register_globals from the global scope
* Thanks to Matt Kavanagh
*/
function deregister_globals()
{
	$not_unset = array(
		'GLOBALS'	=> true,
		'_GET'		=> true,
		'_POST'		=> true,
		'_COOKIE'	=> true,
		'_REQUEST'	=> true,
		'_SERVER'	=> true,
		'_SESSION'	=> true,
		'_ENV'		=> true,
		'_FILES'	=> true,
		'phpEx'		=> true,
		'phpbb_root_path'	=> true
	);

	// Not only will array_merge and array_keys give a warning if
	// a parameter is not an array, array_merge will actually fail.
	// So we check if _SESSION has been initialised.
	if (!isset($_SESSION) || !is_array($_SESSION))
	{
		$_SESSION = array();
	}

	// Merge all into one extremely huge array; unset this later
	$input = array_merge(
		array_keys($_GET),
		array_keys($_POST),
		array_keys($_COOKIE),
		array_keys($_SERVER),
		array_keys($_SESSION),
		array_keys($_ENV),
		array_keys($_FILES)
	);

	foreach ($input as $varname)
	{
		if (isset($not_unset[$varname]))
		{
			// Hacking attempt. No point in continuing unless it's a COOKIE
			if ($varname !== 'GLOBALS' || isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_SERVER['GLOBALS']) || isset($_SESSION['GLOBALS']) || isset($_ENV['GLOBALS']) || isset($_FILES['GLOBALS']))
			{
				exit;
			}
			else
			{
				$cookie = &$_COOKIE;
				while (isset($cookie['GLOBALS']))
				{
					foreach ($cookie['GLOBALS'] as $registered_var => $value)
					{
						if (!isset($not_unset[$registered_var]))
						{
							unset($GLOBALS[$registered_var]);
						}
					}
					$cookie = &$cookie['GLOBALS'];
				}
			}
		}

		unset($GLOBALS[$varname]);
	}

	unset($input);
}

// If we are on PHP >= 6.0.0 we do not need some code
if (version_compare(PHP_VERSION, '6.0.0-dev', '>='))
{
	/**
	* @ignore
	*/
	define('STRIP', false);
}
else
{
	@set_magic_quotes_runtime(0);

	// Be paranoid with passed vars
	if (@ini_get('register_globals') == '1' || strtolower(@ini_get('register_globals')) == 'on' || !function_exists('ini_get'))
	{
		deregister_globals();
	}

	define('STRIP', (get_magic_quotes_gpc()) ? true : false);
}

if (defined('IN_CRON'))
{
	$phpbb_root_path = dirname(__FILE__) . DIRECTORY_SEPARATOR;
}

if (!file_exists($phpbb_root_path . 'config.' . $phpEx))
{
	die("<p>The config.$phpEx file could not be found.</p><p><a href=\"{$phpbb_root_path}install/index.$phpEx\">Click here to install phpBB</a></p>");
}

require($phpbb_root_path . 'config.' . $phpEx);

if (!defined('PHPBB_INSTALLED'))
{
	// Redirect the user to the installer
	// We have to generate a full HTTP/1.1 header here since we can't guarantee to have any of the information
	// available as used by the redirect function
	$server_name = (!empty($_SERVER['HTTP_HOST'])) ? strtolower($_SERVER['HTTP_HOST']) : ((!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : getenv('SERVER_NAME'));
	$server_port = (!empty($_SERVER['SERVER_PORT'])) ? (int) $_SERVER['SERVER_PORT'] : (int) getenv('SERVER_PORT');
	$secure = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 1 : 0;

	$script_name = (!empty($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : getenv('PHP_SELF');
	if (!$script_name)
	{
		$script_name = (!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
	}

	// Replace any number of consecutive backslashes and/or slashes with a single slash
	// (could happen on some proxy setups and/or Windows servers)
	$script_path = trim(dirname($script_name)) . '/install/index.' . $phpEx;
	$script_path = preg_replace('#[\\\\/]{2,}#', '/', $script_path);

	$url = (($secure) ? 'https://' : 'http://') . $server_name;

	if ($server_port && (($secure && $server_port <> 443) || (!$secure && $server_port <> 80)))
	{
		// HTTP HOST can carry a port number...
		if (strpos($server_name, ':') === false)
		{
			$url .= ':' . $server_port;
		}
	}

	$url .= $script_path;
	header('Location: ' . $url);
	exit;
}

if (defined('DEBUG_EXTRA'))
{
	$base_memory_usage = 0;
	if (function_exists('memory_get_usage'))
	{
		$base_memory_usage = memory_get_usage();
	}
}

// Load Extensions
// dl() is deprecated and disabled by default as of PHP 5.3.
if (!empty($load_extensions) && function_exists('dl'))
{
	$load_extensions = explode(',', $load_extensions);

	foreach ($load_extensions as $extension)
	{
		@dl(trim($extension));
	}
}

// Include files
require($phpbb_root_path . 'includes/acm/acm_' . $acm_type . '.' . $phpEx);
require($phpbb_root_path . 'includes/cache.' . $phpEx);
require($phpbb_root_path . 'includes/template.' . $phpEx);
require($phpbb_root_path . 'includes/session.' . $phpEx);
require($phpbb_root_path . 'includes/auth.' . $phpEx);

require($phpbb_root_path . 'includes/functions.' . $phpEx);
require($phpbb_root_path . 'includes/functions_content.' . $phpEx);

require($phpbb_root_path . 'includes/constants.' . $phpEx);
require($phpbb_root_path . 'includes/db/' . $dbms . '.' . $phpEx);
require($phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx);

// Set PHP error handler to ours
set_error_handler(defined('PHPBB_MSG_HANDLER') ? PHPBB_MSG_HANDLER : 'msg_handler');

// Instantiate some basic classes
$user		= new user();
$auth		= new auth();
$template	= new template();
$cache		= new cache();
$db			= new $sql_db();

// Connect to DB
$db->sql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport, false, defined('PHPBB_DB_NEW_LINK') ? PHPBB_DB_NEW_LINK : false);

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

// Grab global variables, re-cache if necessary
$config = $cache->obtain_config();
@define('STARGATE', ($config['portal_enabled']));
@define('DEBUG_QUERIES', false);
if(STARGATE)
{
	$k_config = $cache->obtain_k_config();		//  1 query
	$k_blocks = $cache->obtain_block_data();	//	1 query
}

// Add own hook handler
require($phpbb_root_path . 'includes/hooks/index.' . $phpEx);
$phpbb_hook = new phpbb_hook(array('exit_handler', 'phpbb_user_session_handler', 'append_sid', array('template', 'display')));

foreach ($cache->obtain_hooks() as $hook)
{
	@include($phpbb_root_path . 'includes/hooks/' . $hook . '.' . $phpEx);
}
/* Stargate functions start... copyright phpbbireland.com 2005-2009 */
/*
**	This function returns a random image preprocessed with html tags and an option link...
**	The link is based on the image name... example www.phpbb.com.png
**	or even: sourceforge.net+project+project_donations.php@group_id=156802.gif
**  A token can be sent to filter images, for example all images containing menu_
*/
function get_random_image($dir_path, $add_link = false, $token = '', $raw = false)
{
	if(defined('IN_ADMIN'))
		return;

	// The $token can be used to filter image types...
	// initialise vars
	//$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';

	$rand_banners = '';
	$imglist = "";

	mt_srand((double)microtime()*1000001);

	$handle = @opendir($dir_path);

	// 01 January 2009 Just return for now as this can cause an error report if uses is Admin as the path will be incorrect //
	// quick report because people forget to add the image directory //

	if (!$handle)
		return;

	if(!$token) $token = '.';

	while (($file = readdir($handle)) !== false)
	{
		if(strpos($file, ".gif") || strpos($file, ".jpg") || strpos($file, ".png") && strpos($file ,$token))
			$imglist .= "$file ";
	}
	closedir($handle);

	$imglist = explode(" ", $imglist);
	$a = sizeof($imglist)-2;
	$random = mt_rand(0, $a);
	$image = $imglist[$random];

	if(strpos($image, 'www') || strpos($image, 'http'))
		$add_link = true;

	if($add_link)
	{
		if(strstr($image, 'gif'))
			$lnk = explode(".gif", $image);
		else
		if(strstr($image, 'png'))
			$lnk = explode(".png", $image);
		else
		if(strstr($image, 'jpg'))
			$lnk = explode(".jpg", $image);

		$lnk[0] = str_replace('+','/', $lnk[0]);
		$lnk[0] = str_replace('@','?', $lnk[0]);

		$rand_banners = "<a href=\"http://$lnk[0]\"><img src=\"$dir_path/$image\" alt=\"$lnk[0]\" /></a>";
	}
	else
	if(!$raw)
		$rand_banners .= "<img src=\"$dir_path/$image\" alt=\"\" />";
	else
		$rand_banners .= "$dir_path/$image";

	$imgs = '';

	return($rand_banners);
}


/**
* Get user avatar Note! To avoid conflict copied and renamed for portal
*
* @param string $avatar Users assigned avatar name
* @param int $avatar_type Type of avatar
* @param string $avatar_width Width of users avatar
* @param string $avatar_height Height of users avatar
* @param string $alt Optional language string for alt tag within image, can be a language key or text
*
* @return string Avatar image
*/
function sgp_get_user_avatar($avatar, $avatar_type, $avatar_width, $avatar_height, $alt = 'USER_AVATAR')
{
	global $user, $config, $phpbb_root_path, $phpEx;

	if (empty($avatar) || !$avatar_type)
	{
		if(!STARGATE)
			return '';

		$poster_avatar = get_random_image($phpbb_root_path . 'images/avatars/no_avitar', false, '');

		// do we wish to resize? //
		if($avatar_width)
         $poster_avatar = str_replace('/>', ' height="' . $avatar_height . '" width="' . $avatar_width . '" />', $poster_avatar);

		return($poster_avatar);
	}

	$avatar_img = '';

	switch ($avatar_type)
	{
		case AVATAR_UPLOAD:
			$avatar_img = $phpbb_root_path . "download/file.$phpEx?avatar=";
		break;

		case AVATAR_GALLERY:
			$avatar_img = $phpbb_root_path . $config['avatar_gallery_path'] . '/';
		break;
	}

	$avatar_img .= $avatar;
	return '<img src="' . (str_replace(' ', '%20', $avatar_img)) . '" width="' . $avatar_width . '" height="' . $avatar_height . '" alt="' . ((!empty($user->lang[$alt])) ? $user->lang[$alt] : $alt) . '" />';
}


function sgp_get_user_country_flag($user_or_poster_id)
{
	global $db;
	
	$sql = "SELECT user_country_flag FROM " . USERS_TABLE . " WHERE user_id = $user_or_poster_id";
	
	if($result = $db->sql_query($sql))
	{
		$row = $db->sql_fetchrow($result);
		return("images/flags/". $row['user_country_flag']);	
	}
	// No result! so we return the a blank flag image
	return("images/flags/--.gif");
}

function sgp_user_country_flag_select($passed)
{
	global $db, $flag_options, $user_id;
	$flag = '';
	$imglist = '';

	if($passed != '')
	{
		$sql = "SELECT user_country_flag FROM " . USERS_TABLE . " WHERE user_id = $passed";
		
		if( $result = $db->sql_query($sql) )
		{
			$flag = $db->sql_fetchrow($result);
			$passed = $flag['user_country_flag'];
		}
	}	

	$imgs = dir('images/flags');
	
	while ($file = $imgs->read()) 
	{
		if (eregi("gif", $file) || eregi("jpg", $file) || eregi("png", $file)) 
		{
			$imglist .= "$file ";
		}
	}
	
	closedir($imgs->handle);
	
	$imglist = explode(" ", $imglist);
	sort($imglist);
	
	for ( $i=0; $i < sizeof($imglist); $i++ ) 
	{	
		if( $imglist[$i]!= "" ) 
		{
			$selected = ($imglist[$i] == $passed) ? ' selected="selected"' : '';
			$flag_options .= '<option value="' . $imglist[$i] . '"' . $selected . '>' . $imglist[$i] . '</option>';
		}
	}
	$flag_options .= '</select>';
	
	return $flag_options;
}
/* Stargate functions ends */

?>