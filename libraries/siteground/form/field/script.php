<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

// Load Library
require_once JPATH_LIBRARIES . '/siteground/library.php';

JFormHelper::loadFieldClass('hidden');

/**
 * Form Field to load a script through field
 *
 * @since  1.0
 */
class SitegroundFormFieldScript extends JFormFieldHidden
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.0
	 */
	public $type = 'Script';

	/**
	 * Method to get the field input markup
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   1.0
	 */
	protected function getInput()
	{
		$loadJquery = isset($this->element['loadJquery']) ? true : false;

		if ($loadJquery)
		{
			JHtml::_('jquery.framework');
		}

		$script = isset($this->element['script']) ? (string) $this->element['script'] : null;

		if ($script)
		{
			SitegroundHelperAsset::load($script);
		}

		return parent::getInput();
	}
}
