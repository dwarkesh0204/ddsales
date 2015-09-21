<?php
/**
 * @package     Sitegroud.Module
 * @subpackage  Social
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load SiteGround library
JLoader::import('siteground.library');

// Register prefix for autoloading
JLoader::registerPrefix('Siteground', __DIR__);

$moduleInstance = new SitegroundModuleSocial($params);

echo $moduleInstance->render(
	array(
		'module'         => $module,
		'params'         => $params,
		'moduleInstance' => $moduleInstance
	)
);
