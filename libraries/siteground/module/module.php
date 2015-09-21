<?php
/**
 * @package     Siteground.Library
 * @subpackage  Module
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
abstract class SitegroundModule
{
	/**
	 * Base overridable renderer
	 *
	 * @var  SitegroundLayoutFile
	 */
	protected $defaultBaseRenderer;

	/**
	 * Name of the module folder. Ex: mod_siteground_social
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $folderName;

	/**
	 * @var    JRegistry
	 * @since  1.0
	 */
	protected $params;

	/**
	 * @var  RendererInterface
	 */
	protected $renderer;

	/**
	 * Constructor
	 *
	 * @param   mixed  $params  array or JRegistry witht the module parameters
	 */
	public function __construct($params = array())
	{
		$this->setParams($params);
	}

	/**
	 * Get the layout paths for this view
	 *
	 * @return  array
	 */
	public function getModuleLayoutPaths()
	{
		$template  = JFactory::getApplication()->getTemplate();

		return array(
			JPATH_THEMES . '/' . $template . '/html/' . $this->getFolderName(),
			JPATH_SITE . '/modules/' . $this->getFolderName() . '/tmpl'
		);
	}

	/**
	 * Get the basic renderer
	 *
	 * @return  SitegroundLayoutFile  Renderer instance
	 */
	protected function getDefaultBaseRenderer()
	{
		if (null === $this->defaultBaseRenderer)
		{
			$this->defaultBaseRenderer = new SitegroundLayoutFile('default');
		}

		return $this->defaultBaseRenderer;
	}

	/**
	 * Get the standard renderer and setup paths
	 *
	 * @return  SitegroundLayoutFile    Renderer instance
	 */
	public function getDefaultRenderer()
	{
		$params = $this->getParams();

		$renderer = $this->getDefaultBaseRenderer();

		$autoLayout = $params->get('layout', '_:default', 'string');
		$autoLayout = str_replace('_:', '', $autoLayout);

		$layout = !empty($layout) ? $layout : $autoLayout;
		$renderer->setLayout($layout);

		$debugMode = (bool) $params->get('debug', false);
		$renderer->setDebug($debugMode);

		$renderer->setIncludePaths($this->getModuleLayoutPaths());

		return $renderer;
	}

	/**
	 * Get current instance name
	 *
	 * Example: in class "SitegroundModuleSocial" it will return "social"
	 *
	 * @return  string
	 */
	protected function getInstanceName()
	{
		$class = get_class($this);

		$name = strstr($class, 'Module');
		$name = str_replace('Module', '', $name);

		return strtolower($name);
	}

	/**
	 * Get the module folder name
	 *
	 * @return  string
	 */
	protected function getFolderName()
	{
		if (null === $this->folderName)
		{
			$class = get_class($this);

			$prefix = strstr($class, 'Module', true);

			$this->folderName = 'mod_' . strtolower($prefix) . '_' . $this->getInstanceName();
		}

		return $this->folderName;
	}

	/**
	 * Get the module parameters
	 *
	 * @return  JRegistry
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Retrieves the renderer object
	 *
	 * @return  RendererInterface
	 */
	public function getRenderer()
	{
		if (empty($this->renderer))
		{
			$this->renderer = $this->getDefaultRenderer();
		}

		return $this->renderer;
	}

	/**
	 * Render the module
	 *
	 * @param   array  $data  Data for the layout
	 *
	 * @return  string
	 */
	public function render($data = array())
	{
		return $this->getRenderer()->render($data);
	}

	/**
	 * Get the module parameters
	 *
	 * @param   mixed  $params  array or JRegistry witht the module parameters
	 *
	 * @return  SitegroundModule  Self instance for chaining
	 */
	public function setParams($params)
	{
		if (is_array($params) || is_string($params))
		{
			$this->params = new JRegistry($params);
		}

		if ($params instanceof JRegistry || $params instanceof Joomla\Registry\Registry)
		{
			$this->params = $params;
		}
		else
		{
			$this->params = new JRegistry;
		}

		return $this;
	}
}
