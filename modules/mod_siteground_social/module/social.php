<?php
/**
 * @package     Siteground.Module
 * @subpackage  Social
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Module class
 *
 * @since  1.0
 */
final class SitegroundModuleSocial extends SitegroundModule
{
	/**
	 * Get the link to the contact menu
	 *
	 * @return  mixed  String if contact menu id is set. Null otherwise
	 */
	public function getContactLink()
	{
		$params = $this->getParams();

		if ($itemId = $params->get('contact_menu'))
		{
			return JRoute::_('index.php?Itemid=' . $itemId, false);
		}

		return null;
	}

	/**
	 * Get the link to the mailto link
	 *
	 * @return  mixed  String if email address is set. Null otherwise
	 */
	public function getEmailLink()
	{
		$params = $this->getParams();

		if ($email = $params->get('email'))
		{
			return 'mailto:' . $email;
		}

		return null;
	}

	/**
	 * Get the target attribute for social links
	 *
	 * @return  string
	 */
	public function getTargetAttribute()
	{
		$params = $this->getParams();

		$target = $params->get('target', 'self');

		if ($target == 'blank')
		{
			return 'target="_blank"';
		}

		return '';
	}

	/**
	 * Get the link to the facebook profile
	 *
	 * @return  mixed  String if profile id is set. Null otherwise
	 */
	public function getFacebookLink()
	{
		$params = $this->getParams();

		if ($profileId = $params->get('facebook_id'))
		{
			return 'https://facebook.com/' . $profileId;
		}

		return null;
	}

	/**
	 * Get the link to the Google+ profile
	 *
	 * @return  mixed  String if profile id is set. Null otherwise
	 */
	public function getGooglePlusLink()
	{
		$params = $this->getParams();

		if ($profileId = $params->get('gplus_id'))
		{
			return 'https://plus.google.com/' . $profileId;
		}

		return null;
	}

	/**
	 * Get the link to the Google+ profile
	 *
	 * @return  mixed  String if profile id is set. Null otherwise
	 */
	public function getLinkedinLink()
	{
		$params = $this->getParams();

		if ($profileId = $params->get('linkedin_id'))
		{
			return 'https://www.linkedin.com/profile/view?id=/' . $profileId;
		}

		return null;
	}

	/**
	 * Get the link to the twitter profile
	 *
	 * @return  mixed  String if profile id is set. Null otherwise
	 */
	public function getTwitterLink()
	{
		$params = $this->getParams();

		if ($profileId = $params->get('twitter_id'))
		{
			return 'https://twitter.com/' . $profileId;
		}

		return null;
	}
}
