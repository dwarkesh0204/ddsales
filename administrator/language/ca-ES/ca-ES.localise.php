<?php
/**
 * @version		$Id: language.php $
* Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.
* CC Translation 2015 Catalan Translation Team http://www.catmidia.cat. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * en-GB localise class
 *
 * @package		Joomla.Site
 * @since		1.6
 */
abstract class Ca_ESLocalise {
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param	int $count The number of items.
	 * @return	array An array of potential suffixes.
	 * @since	1.6
	 */
	public static function getPluralSuffixes($count) {
		if ($count == 0) 
		{
			$return= array('0');
		}
		elseif($count == 1) 
		{
			$return= array('1');
		}
		else 
		{
			$return=array('MORE');
		}
		return $return;
	}
	/**
	 * Returns the ignored search words
	 *
	 * @return	array An array of ignored search words.
	 * @since	1.6
	 */
	public static function getIgnoredSearchWords() {
		$search_ignore=array();
		$search_ignore[]="i";
		$search_ignore[]="en";
		$search_ignore[]="amb";
		return $search_ignore;
	}
	/**
	 * Returns the lower length limit of search words
	 *
	 * @return	integer The lower length limit of search words.
	 * @since	1.6
	 */
	public static function getLowerLimitSearchWord() {
		return 3;
	}
	/**
	 * Returns the upper length limit of search words
	 *
	 * @return	integer The upper length limit of search words.
	 * @since	1.6
	 */
	public static function getUpperLimitSearchWord() {
		return 20;
	}
	/**
	 * Returns the number of chars to display when searching
	 *
	 * @return	integer The number of chars to display when searching.
	 * @since	1.6
	 */
	public static function getSearchDisplayedCharactersNumber() {
		return 200;
	}
}

