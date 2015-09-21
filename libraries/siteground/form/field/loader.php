<?php
/**
 * @package     Siteground.Library
 * @subpackage  Field
 *
 * @copyright   Copyright (C) 2014 siteground.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Load Library
require_once JPATH_LIBRARIES . '/siteground/library.php';

JFormHelper::loadFieldClass('hidden');

/**
 * Dummy field to load the siteground library
 *
 * @since  1.0
 */
class SitegroundFormFieldLoader extends JFormFieldHidden
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $type = 'Loader';
}
