<?php
/**
 * @package     Siteground.Library
 * @subpackage  Plugin
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Base com_content plugin
 *
 * @package     Siteground.Library
 * @subpackage  Plugin
 * @since       1.0
 */
class SitegroundPluginComcontent extends SitegroundPlugin
{
	/**
	 * @var  array
	 */
	protected $allowedContexts = array();

	/**
	 * Validate that current context is enabled
	 *
	 * @param   string  $context  The context of the content being passed to the plugin.
	 *
	 * @return  boolean
	 */
	protected function validateContext($context)
	{
		$app = JFactory::getApplication();

		if ($app->isAdmin())
		{
			return false;
		}

		// Check that we are on an article view
		if (!in_array($context, $this->allowedContexts))
		{
			return false;
		}

		return true;
	}

	/**
	 * Validate that the article category is enabled to display comments
	 *
	 * @param   stcClass  $article  Loaded article
	 *
	 * @return  boolean
	 */
	protected function validateArticleCategory($article)
	{
		$params = $this->getParams();

		$mode = $params->get('mode', 'include');

		if ($mode == 'exclude')
		{
			$excludedCategories = $params->get('excludedCategories', array());

			if (in_array($article->catid, $excludedCategories))
			{
				return false;
			}

			return true;
		}

		$includedCategories = $params->get('includedCategories', array());

		if (in_array($article->catid, $includedCategories))
		{
			return true;
		}

		return false;
	}
}
