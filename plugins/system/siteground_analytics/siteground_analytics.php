<?php
/**
 * @package     Siteground.Plugin
 * @subpackage  System.Siteground_Analytics
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load library
require_once JPATH_LIBRARIES . '/siteground/library.php';

/**
 * Basica analytics integration for Joomla
 *
 * @package     Siteground.Plugin
 * @subpackage  System.Siteground_Analytics
 * @since       1.0
 */
class PlgSystemSiteground_Analytics extends SitegroundPlugin
{
	/**
	 * This event is triggered immediately before the framework has rendered the application.
	 *
	 * @return  void
	 */
	public function onBeforeRender()
	{
		if (JFactory::getApplication()->isAdmin())
		{
			return;
		}

		$layoutData = $this->getLayoutData();

		// Use an overridable layout to load script
		$this->getRenderer()->setLayout('header')->render($layoutData);
	}
}
