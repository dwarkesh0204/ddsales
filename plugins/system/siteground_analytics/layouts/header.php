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
 *
 */

$trackingCode = $pluginParams->get('tracking_code');

if ($trackingCode)
{
	$displayFeatures = $pluginParams->get('display_features', 1) ? "\n\t\tga('require', 'displayfeatures');" : null;

	JFactory::getDocument()->addScriptDeclaration("

		// Google Analytics: start
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', '" . $trackingCode . "', 'auto');" . $displayFeatures . "
		ga('send', 'pageview');
		// Google Analytics: end
	");
}

