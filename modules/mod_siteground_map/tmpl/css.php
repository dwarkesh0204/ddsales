<?php
/**
 * @package     Siteground.Module
 * @subpackage  Map
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

extract($displayData);

/**
 * Available variables in this layout
 * ------------------
 * @param   object     $module  Module information as it comes from JDocumentRendererModule
 * @param   JRegistry  $params  Module parameters
 * @param   string     $mapUrl  Url for the embed map
 * @param   string     $cssId   Specific DOM identifier for this map. Ex: mod-sitegroud-map-21
 */

$size = $params->get('size', 'responsive');

$responsive = ($size == 'responsive');

if ($responsive)
{
	SitegroundHelperAsset::load('mod_siteground_map/css/mod-siteground-map.min.css');
}
else
{
	$height = $params->get('height', '100%');
	$width  = $params->get('width', '100%');

	JFactory::getDocument()->addStyleDeclaration("
		#" . $cssId . ",
		#" . $cssId . " iframe {
			height: " . $height . ";
			width: " . $width . ";
		}
	");
}
