<?php
/**
 * @package     Siteground.Plugin
 * @subpackage  Content.Siteground_Disqus
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load library
require_once JPATH_LIBRARIES . '/siteground/library.php';

/**
 * Siteground disqus plugin for Joomla
 *
 * @package     Siteground.Plugin
 * @subpackage  Content.Siteground_Disqus
 * @since       1.0
 */
class PlgContentSiteground_Disqus extends SitegroundPlugin
{
	/**
	 * Get the disqus active language from the Joomla language
	 *
	 * @return  string
	 */
	protected function getDisqusLanguage()
	{
		$langTag = JFactory::getLanguage()->getTag();
		$langParts = explode('-', $langTag);

		return reset($langParts);
	}

	/**
	 * Triggered when preparing content for output
	 *
	 * @param   string   $context   The context of the content being passed to the plugin.
	 * @param   mixed    &$article  An object with a "text" property or the string to be cloaked.
	 * @param   mixed    &$params   Additional parameters.
	 * @param   integer  $page      Optional page number. Unused. Defaults to zero.
	 *
	 * @return boolean True on success.
	 */
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		if (!$this->validateView($context) || !$this->validateCategory($article))
		{
			return true;
		}

		$layoutData = array_merge(
			$this->getLayoutData(),
			array(
				'article'        => $article,
				'articleParams'  => $params,
				'disqusLanguage' => $this->getDisqusLanguage()
			)
		);

		$article->text .= $this->getRenderer()->render($layoutData);

		return true;
	}

	/**
	 * Validate that current view has to load disqus
	 *
	 * @param   string  $context  The context of the content being passed to the plugin.
	 *
	 * @return  boolean
	 */
	protected function validateView($context)
	{
		$app = JFactory::getApplication();

		if ($app->isAdmin())
		{
			return false;
		}

		$allowedContexts = array(
			'com_content.article'
		);

		// Check that we are on an article view
		if (!in_array($context, $allowedContexts))
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
	protected function validateCategory($article)
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
