<?php
/**
 * @package     Sitegroud.Module
 * @subpackage  Map
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load SiteGround library
JLoader::import('siteground.library');

// Register prefix for autoloading
JLoader::registerPrefix('Siteground', __DIR__);

$moduleInstace = new SitegroundModuleMap($params);

// DOM identifier for this map
$cssId = 'mod-siteground-map-' . (empty($module->id) ? uniqid() : $module->id);

$layoutData = array(
	'module' => $module,
	'params' => $params,
	'mapUrl' => $moduleInstace->getMapUrl(),
	'cssId'  => $cssId
);

$renderer = $moduleInstace->getRenderer();
$cssRenderer = clone $renderer;

// Load CSS from layout to allow to override it
echo $cssRenderer->setLayout('css')->render($layoutData);

// Render the module
echo $renderer->render($layoutData);
