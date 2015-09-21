<?php
/**
 * @package     Siteground.Plugin
 * @subpackage  Content.Siteground_Social
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load library
require_once JPATH_LIBRARIES . '/siteground/library.php';

/**
 * Siteground social plugin for Joomla
 *
 * @package     Siteground.Plugin
 * @subpackage  Content.Siteground_Social
 * @since       1.0
 */
class PlgContentSiteground_Social extends SitegroundPluginComcontent
{
	/**
	 * @var  array
	 */
	protected $allowedContexts = array(
		'com_content.article'
	);

	/**
	 * Get the language tags from the Joomla language
	 *
	 * @return  string
	 */
	protected function getLanguageTags()
	{
		// Format: en-GB
		$langTag = JFactory::getLanguage()->getTag();
		$langParts = explode('-', $langTag);

		// Format: en
		$shortTag = reset($langParts);

		// Format: en_GB
		$underscoreTag = str_replace('-', '_', $langTag);

		return new JRegistry(
			array(
				'facebook' => $underscoreTag,
				'twitter'  => $shortTag,
				'gplus'    => $shortTag
			)
		);
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
		if (!$this->validateContext($context) || !$this->validateArticleCategory($article))
		{
			return true;
		}

		$layoutData = array_merge(
			$this->getLayoutData(),
			array(
				'article'        => $article,
				'articleParams'  => $params,
				'langTags'       => $this->getLanguageTags(),
				'pluginInstance' => $this,
				'sharedUrl'      => JUri::current(),
				'sharedTitle'    => JFactory::getDocument()->getTitle()
			)
		);

		$renderer = $this->getRenderer();

		// Use an overridable layout to load css & js
		$assetsRenderer = clone $renderer;
		$assetsRenderer->setLayout('header')->render($layoutData);

		$pluginParams = $this->getParams();
		$position = $pluginParams->get('position', 1);

		$html = $renderer->render($layoutData);

		if (in_array($position, array(0,2)))
		{
			$article->text = $html . $article->text;
		}

		if (in_array($position, array(1,2)))
		{
			$article->text .= $html;
		}

		return true;
	}

	/**
	 * Check if a social network button is enabled
	 *
	 * @param   string  $networkName  Name of the network:
	 *	                              - twitter
	 * 	                              - facebook
	 * 	                              - gplus
	 * 	                              - linkedin
	 *
	 * @return  boolean
	 */
	public function isEnabledNetwork($networkName)
	{
		$params = $this->getParams();

		return $params->get('show_' . $networkName, true);
	}
}
