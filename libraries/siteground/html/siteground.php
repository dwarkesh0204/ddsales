<?php
/**
 * @package     Siteground.Library
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Vendor assets loader
 *
 * @package     Siteground.Library
 * @subpackage  Html
 * @since       1.0
 */
abstract class JHtmlSiteground
{
	/**
	 * Array containing information for loaded files
	 *
	 * @var  array
	 */
	protected static $loaded = array();

	/**
	 * Load fontawesome 4.
	 *
	 * @return  void
	 */
	public static function fontawesome()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		SitegroundHelperAsset::load('siteground/vendor/font-awesome/css/font-awesome.min.css');

		static::$loaded[__METHOD__] = true;
	}
}
