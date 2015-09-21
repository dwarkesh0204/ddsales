<?php
/**
 * @package     Siteground
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

define('SITEGROUND_LIB_PATH', __DIR__);

// Global libraries autoloader
JLoader::registerPrefix('Siteground', SITEGROUND_LIB_PATH);

// Make available the fields
JFormHelper::addFieldPath(SITEGROUND_LIB_PATH . '/form/field');

// Make available the booking form rules
JFormHelper::addRulePath(SITEGROUND_LIB_PATH . '/form/rule');

// Common HTML helpers
JHtml::addIncludePath(SITEGROUND_LIB_PATH . '/html');

// Load library language
$lang = JFactory::getLanguage();
$lang->load('lib_siteground', SITEGROUND_LIB_PATH);
