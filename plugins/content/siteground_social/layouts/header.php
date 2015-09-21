<?php
/**
 * @package     Siteground.Plugin
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2014 siteground.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

extract($displayData);

/**
 * Layout variables
 * ------------------
 * @param   Joomla\Registry\Registry  $pluginParams    Plugin parameters
 * @param   stdClass                  $article         Loaded article
 * @param   Joomla\Registry\Registry  $articleParams   Article parameters
 * @param   JRegistry                 $langTags        Language tags to init the different networks
 * @param   string                    $sharedUrl       URL to share
 * @param   string                    $sharedTitle     Title to share
 *
 */

JHtml::_('siteground.fontawesome');
SitegroundHelperAsset::load('plg_content_siteground_social/css/sgsocial.min.css');

JHtml::_('jquery.framework');
SitegroundHelperAsset::load('plg_content_siteground_social/vendor/socialitejs/socialite.min.js');

JFactory::getDocument()->addScriptDeclaration("
	var sgSocial = {
		loadEvent : '" . $pluginParams->get('loadEvent', 'hover') . "'
	};

	sgSocial.socialiteSettings = {
		facebook: {
			lang : '" . $langTags->get('facebook', 'en_GB') . "'
		},
		twitter: {
			lang : '" . $langTags->get('twitter', 'en') . "'
		},
		googleplus: {
			lang : '" . $langTags->get('gplus', 'en-GB') . "'
		}
	};
");
SitegroundHelperAsset::load('plg_content_siteground_social/js/sgsocial.js');
