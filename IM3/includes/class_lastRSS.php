<?php
/*
 ======================================================================
 lastRSS
 
 Simple yet powerfull PHP class to parse RSS files.
 copyright (c) 2007 Jiri Smika (Smix) http://phpbb3.smika.net
 (c) 2003-2004 original lastRSS by Vojtech Semecky http://lastrss.oslab.net/

 Modified by NeXur 080305
 ----------------------------------------------------------------------
 LICENSE

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 To read the license please visit http://www.gnu.org/copyleft/gpl.html
 ======================================================================
*/

/**
* lastRSS
* Simple yet powerfull PHP class to parse RSS files.
*/

define('IN_PHPBB', true); // mvp?

class lastRSS 
{
	// -------------------------------------------------------------------
	// Public properties
	// -------------------------------------------------------------------
	var $default_cp = 'UTF-8';
	var $CDATA = 'strip';
	var $cp = 'UTF-8';
	var $rsscp = 'UTF-8';
	var $items_limit = 0;
	var $stripHTML = true;
	var $date_format = 'U';

	// -------------------------------------------------------------------
	// Private variables
	// -------------------------------------------------------------------
	var $channeltags = array ('title', 'link', 'description', 'language', 'copyright', 'managingEditor', 'webMaster', 'lastBuildDate', 'rating', 'docs');
	var $itemtags = array('title', 'link', 'author', 'category', 'comments', 'enclosure', 'guid', 'pubDate', 'source');
	var $imagetags = array('title', 'url', 'link', 'width', 'height');
	var $textinputtags = array('title', 'description', 'name', 'link');	
	// -------------------------------------------------------------------
	// Parse RSS file and returns associative array.
	// -------------------------------------------------------------------
	/**
* Get RSS (URL) with curl 
*/
	function curl_get_rss($url)
	{
		// initiate and set options
		$ch = @curl_init($url);
		@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		@curl_setopt( $ch, CURLOPT_HEADER, 0);
		@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		@curl_setopt( $ch, CURLOPT_ENCODING, '');
		@curl_setopt( $ch, CURLOPT_USERAGENT, 'lastRSS'); 
		// initial connection timeout
		@curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5);
		// setting this to higher means longer time for loading the page for user!
		@curl_setopt( $ch, CURLOPT_TIMEOUT, 60);
		@curl_setopt( $ch, CURLOPT_MAXREDIRS, 0);
		// get content
		$content = @curl_exec($ch);
		$err = @curl_errno($ch);
		$errmsg = @curl_error($ch);
		$header = @curl_getinfo($ch);
		@curl_close($ch);
				 
		return $content;
	}
	
	function Get ($rss_url) 
	{
		// If CACHE ENABLED
		if ($this->cache_dir != '') 
		{
			$cache_file = $this->cache_dir . '/rsscache_' . md5($rss_url) . '.dat';
			//chmod ($cache_file, 0666);
			$timedif = @(time() - filemtime($cache_file));
			if ($timedif < $this->cache_time) 
			{
				// cached file is fresh enough, return cached array
				$result = unserialize(join('', file($cache_file)));
				// set 'cached' to 1 only if cached file is correct
				if ($result) $result['cached'] = 1;
			} 
			else 
			{
				// cached file is too old, create new
				$result = $this->Parse($rss_url);
				$serialized = serialize($result);
				if ($f = @fopen($cache_file, 'wb+')) 
				{
					fwrite ($f, $serialized, strlen($serialized));
					fclose($f);
					chmod ($cache_file, 0666);
				}
				if ($result) $result['cached'] = 0;
			}
		}
		// If CACHE DISABLED >> load and parse the file directly
		else 
		{
			$result = $this->Parse($rss_url);
			if ($result) $result['cached'] = 0;
		}
		// return result
		return $result;
	}
	
	// -------------------------------------------------------------------
	// Modification of preg_match(); return trimed field with index 1
	// from 'classic' preg_match() array output
	// -------------------------------------------------------------------	 
	function my_preg_match($pattern, $subject) 
	{
		// start regullar expression
		preg_match($pattern, $subject, $out);
		// if there is some result... process it and return it
		if(isset($out[1])) 
		{
		// cdata
		$out[1] = strtr($out[1], array('<![CDATA['=>'', ']]>'=>''));
		
		if((isset($this->rsscp))&&($this->rsscp != 'UTF-8'))
		{
			// recode with phpBB�s functions
			$out[1] = utf8_recode($out[1],$this->rsscp);
		}

		// Return result
		return trim($out[1]); 	
		} 
		else 
		{
			// if there is NO result, return empty string
		return '';
		}
	}
	// -------------------------------------------------------------------
	// Replace HTML entities &something; by real characters
	// -------------------------------------------------------------------
	function unhtmlentities ($string) 
	{
		// Get HTML entities table
		$trans_tbl = get_html_translation_table (HTML_ENTITIES, ENT_QUOTES);
		// Flip keys<==>values
		$trans_tbl = array_flip ($trans_tbl);
		// Add support for &apos; entity (missing in HTML_ENTITIES)
		$trans_tbl += array('&apos;' => "'");
		// Replace entities by values
		return strtr($string, $trans_tbl);
	}
	
	// -------------------------------------------------------------------
	// Parse() is private method used by Get() to load and parse RSS file.
	// Don't use Parse() in your scripts - use Get($rss_file) instead.
	// -------------------------------------------------------------------
	function parse($rss_url) 
	{
		global $rss;
		
		// open and load RSS file
		// use curl if enabled 
		if(function_exists('curl_init') && $rss->type == 'curl')
		{ 
			$rss_content = $this->curl_get_rss($rss_url);
		} 
		else if (ini_get('allow_url_fopen') == '1' && $rss->type == 'fopen')
		{ 
			// else use fopen if possible
			if($f = @fopen($rss_url, 'r')) 
			{ 
				while (!feof($f)) 
				{
					@$rss_content .= fgets($f, 4096);
				}
				fclose($f);	
			}
		}
		//if download was succesfull
		if(isset($rss_content) && (sizeof($rss_content)>0))
		{	
			// parse document encoding
			$result['encoding'] = $this->my_preg_match("'encoding=[\'\"](.*?)[\'\"]'si", $rss_content);
			// if document encoding is specified, use it
			if (isset($result['encoding']))
			{ 
				$this->rsscp = $result['encoding'];	 
			}
			else
			{ 
				// otherwise use the default encoding
				$this->rsscp = $this->default_cp;		 
			}

			// parse channel info
			preg_match("'<channel.*?>(.*?)</channel>'si", $rss_content, $out_channel);
			foreach($this->channeltags as $channeltag)
			{
				$temp = @$this->my_preg_match("'<$channeltag.*?>(.*?)</$channeltag>'si", $out_channel[1]);
				if (isset($temp))
				{
					$result[$channeltag] = $temp; 
				} 
			}
			// parse textinput info
			// This a little strange regexp means:
			// Look for tag <textinput> with or without any attributes, but skip truncated version <textinput /> (it's not beginning tag)
			preg_match("'<textinput(|[^>]*[^/])>(.*?)</textinput>'si", $rss_content, $out_textinfo);
			if (isset($out_textinfo[2])) 
			{
				foreach($this->textinputtags as $textinputtag) 
				{
					$temp = $this->my_preg_match("'<$textinputtag.*?>(.*?)</$textinputtag>'si", $out_textinfo[2]);
					if (isset($temp)) 
					{
						$result['textinput_'.$textinputtag] = $temp; 
					}
				}
			}
			// parse images
			preg_match("'<image.*?>(.*?)</image>'si", $rss_content, $out_imageinfo);
			if (isset($out_imageinfo[1])) 
			{
				foreach($this->imagetags as $imagetag) 
				{
					$temp = $this->my_preg_match("'<$imagetag.*?>(.*?)</$imagetag>'si", $out_imageinfo[1]);
					if ($temp != '') 
					{
						$result['image_'.$imagetag] = $temp;
					}
				}
			}

			// parse items
			preg_match("'<image.*?>(.*?)</image>'si", $rss_content['content'], $out_imageinfo);
			if (isset($out_imageinfo[1])) 
			{
				foreach($this->imagetags as $imagetag) 
				{
					$temp = $this->my_preg_match("'<$imagetag.*?>(.*?)</$imagetag>'si", $out_imageinfo[1]);
					if ($temp != '') 
					{
						$result['image_'.$imagetag] = $temp;
					}
				}
			}
			
			// parse items
			preg_match_all("'<item(| .*?)>(.*?)</item>'si", $rss_content, $items);
			$rss_items = $items[2];
			// init item counter
			$i = 0;
			foreach($rss_items as $rss_item) 
			{	
				// If number of items is lower then limit: parse one item
				if ($i < $this->items_limit || $this->items_limit == 0) 
				{
					foreach($this->itemtags as $itemtag) 
					{
						$temp = $this->my_preg_match("'<$itemtag.*?>(.*?)</$itemtag>'si", $rss_item);
						if (isset($temp))
						{
							$result['items'][$i][$itemtag] = $temp; 
						} 
					}
					// item title
					if ($this->stripHTML && isset($result['items'][$i]['title']))
					{
					$result['items'][$i]['title'] = strip_tags($this->unhtmlentities(strip_tags($result['items'][$i]['title'])));
					}
					// item description
					if ($this->stripHTML && isset ($result['items'][$i]['description']))
							$result['items'][$i]['description'] = strip_tags($this->unhtmlentities(strip_tags($result['items'][$i]['description'])));
						// If pubDate exists
					if (isset($result['items'][$i]['pubDate'])) 
					{
						// ... and is valid
						if( (($timestamp = strtotime($result['items'][$i]['pubDate'])) !== -1) && (($timestamp = strtotime($result['items'][$i]['pubDate'])) === false) )
						{
						// convert pubDate to specified date format
							$result['items'][$i]['pubDate'] = $timestamp;
						}
					}
					else
					{
						$result['items'][$i]['pubDate'] = time();
					}
					// item counter
					$i++;
				}
			}
			$result['items_count'] = $i;
			return $feed['content'] = $result;
		}
		else 
		{
			// error in getting content return false
			return $feed['error'] = true;
		}
	}
}
?>