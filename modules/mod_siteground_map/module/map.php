<?php
/**
 * @package     Siteground.Module
 * @subpackage  Map
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
final class SitegroundModuleMap extends SitegroundModule
{
	/**
	 * Get the renderer and setup view paths
	 *
	 * @param   string  $layout   Layout to load.
	 * @param   array   $options  Optional array with layout options
	 *
	 * @return  SitegroundLayoutFile    Renderer instance
	 */
	public function getModuleRenderer($layout = null, $options = array())
	{
		$params = $this->getParams();

		$mode = $params->get('mode', 'iframe', 'string');
		$autoLayout = ($mode == 'iframe') ? $mode : 'default';

		$layout = !empty($layout) ? $layout : $autoLayout;

		if (!isset($options['debug']))
		{
			$options['debug'] = $params->get('debug', false);
		}

		$renderer = $this->getRenderer($layout, $options);

		$renderer->setIncludePaths($this->getModuleLayoutPaths());

		return $renderer;
	}

	/**
	 * Get the map URL
	 *
	 * @return  mixed  String if found. Null otherwise
	 */
	public function getMapUrl()
	{
		$params = $this->getParams();

		$mapMode = $params->get('mode', 'iframe', 'string');

		$methodName = 'get' . ucfirst(strtolower($mapMode)) . 'ModeMapUrl';

		if (method_exists($this, $methodName))
		{
			return $this->{$methodName}();
		}

		return null;
	}

	/**
	 * Get the url for an specified address
	 *
	 * @return  mixed  String if found. Null otherwise
	 */
	protected function getAddressModeMapUrl()
	{
		$params = $this->getParams();

		if ($address = $params->get('address'))
		{
			return $this->getBaseMapUrl() . '&amp;q=' . urlencode($address);
		}

		return null;
	}

	/**
	 * Get common base map URL
	 *
	 * @return  string
	 */
	protected function getBaseMapUrl()
	{
		$zoom = $this->getZoomUrlString();
		$type = $this->getMapTypeUrlString();

		return 'https://maps.google.com/maps?output=embed' . $zoom . $type;
	}

	/**
	 * Get the map url from the coordinates
	 *
	 * @return  mixed  String if found. Null otherwise
	 */
	protected function getCoordinatesModeMapUrl()
	{
		$params = $this->getParams();

		$latitude = urlencode($params->get('latitude'));
		$longitude = urlencode($params->get('longitude'));

		if ($latitude && $longitude)
		{
			return $this->getBaseMapUrl() . '&amp;q=' . $latitude . ',' . $longitude;
		}

		return null;
	}

	/**
	 * Get the map type part for the map url
	 *
	 * @return  string
	 */
	protected function getMapTypeUrlString()
	{
		$params = $this->getParams();

		$type = $params->get('type');

		return $type ? '&amp;t=' . $type : '';
	}

	/**
	 * Get the Zoom part for the map url
	 *
	 * @return  string
	 */
	protected function getZoomUrlString()
	{
		$params = $this->getParams();

		$zoom = $params->get('zoom');

		return $zoom ? '&amp;z=' . $zoom : '';
	}
}
