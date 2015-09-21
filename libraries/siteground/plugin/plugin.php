<?php
/**
 * @package     Siteground.Library
 * @subpackage  Plugin
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Base plugin.
 *
 * @package     Siteground.Library
 * @subpackage  Plugin
 * @since       1.0
 */
class SitegroundPlugin extends JPlugin
{
	/**
	 * Database connection
	 *
	 * @var  JDatabaseDriver
	 */
	protected $dbo;

	/**
	 * Base overridable renderer
	 *
	 * @var  SitegroundLayoutFile
	 */
	protected $defaultBaseRenderer;

	/**
	 * The extension/plugin id in the #__extensions table
	 *
	 * @var  integer
	 */
	protected $extensionId = null;

	/**
	 * Plugin parameters
	 *
	 * @var  JRegistry
	 */
	public $params = null;

	/**
	 * @var  string
	 */
	protected $pluginName;

	/**
	 * @var  RendererInterface
	 */
	protected $renderer;

	/**
	 * Constructor
	 *
	 * @param   string  &$subject  Subject
	 * @param   array   $config    Configuration
	 *
	 * @throws  UnexpectedValueException
	 */
	public function __construct(&$subject, $config = array())
	{
		parent::__construct($subject, $config);

		// Load plugin language
		$this->loadLanguage();

		// Ensure that we have plugin type & name
		if (empty($this->_type) || empty($this->_name))
		{
			throw new UnexpectedValueException(sprintf('Missing data to initialize %s plugin | id: %s', $this->_type, $this->_name));
		}

		// Renderer present
		if (isset($config['renderer']))
		{
			$this->setRenderer($config['renderer']);
		}
	}

	/**
	 * Get current plugin id in the #__extensions table
	 *
	 * @return  integer  The plugin / extension id
	 */
	protected function getExtensionId()
	{
		if (null === $this->extensionId)
		{
			$db = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select($db->qn('extension_id'))
				->from($db->qn('#__extensions'))
				->where($db->qn('folder') . ' = ' . $db->q($this->_type))
				->where($db->qn('element') . ' = ' . $db->q($this->_name));

			$db->setQuery($query);

			$this->extensionId = $db->loadResult();
		}

		return $this->extensionId;
	}

	/**
	 * Get the data that layout requires
	 *
	 * @return  array
	 */
	protected function getLayoutData()
	{
		return array(
			'pluginParams' => $this->getParams()
		);
	}

	/**
	 * Overridable method to allow to use external connections
	 *
	 * @return  JDatabaseDriver
	 */
	protected function getDbo()
	{
		if (null === $this->dbo)
		{
			$this->dbo = JFactory::getDbo();
		}

		return $this->dbo;
	}

	/**
	 * Get the renderer and setup view paths
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
	 * Get the renderer and setup view paths
	 *
	 * @return  SitegroundLayoutFile    Renderer instance
	 */
	protected function getDefaultRenderer()
	{
		$app = JFactory::getApplication();
		$params = $this->getParams();

		$renderer = $this->getDefaultBaseRenderer();

		$debug = $params->get('debug', false);
		$renderer->setDebug($debug);

		$template  = JFactory::getApplication()->getTemplate();

		$renderer->setIncludePaths(
			array(
				JPATH_THEMES . "/" . $template . '/html/layouts/plugins/' . $this->_type . '/' . $this->_name,
				JPATH_SITE . '/plugins/' . $this->_type . '/' . $this->_name . '/layouts',
				JPATH_SITE . '/layouts/plugins/' . $this->_type . '/' . $this->_name
			)
		);

		return $renderer;
	}

	/**
	 * function to get the plugin parameters
	 *
	 * @return  JRegistry  The plugin parameters object
	 */
	protected function getParams()
	{
		if (is_null($this->params))
		{
			$plugin = JPluginHelper::getPlugin($this->_type, $this->_name);
			$this->params = new JRegistry($plugin->params);
		}

		return $this->params;
	}

	/**
	 * Function to get the name of the plugin
	 *
	 * @return  string
	 */
	protected function getPluginName()
	{
		if (null === $this->pluginName)
		{
			$langString = strtoupper('PLG_' . $this->_type . '_' . $this->_name);
			$this->pluginName = JText::_($langString);
		}

		return $this->pluginName;
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
	 * Check if this plugin has been required
	 *
	 * @param   array  $calledIds  A list of plugin extension ids
	 *
	 * @return  boolean
	 */
	protected function isCalled($calledIds = array())
	{
		$calledIds = (array) $calledIds;

		if (!empty($calledIds) && !in_array($this->getExtensionId(), $calledIds))
		{
			return false;
		}

		return true;
	}

	/**
	 * Triggered to get the list of available plugins
	 *
	 * @param   string  $context  Context from where the plugin is triggered
	 * @param   mixed   $types    Single plugin type name or array of types
	 *
	 * @return  mixed
	 */
	public function onGetAvailablePlugins($context, $types = array())
	{
		$types = (array) $types;

		if (!empty($types) && !in_array($this->_type, $types))
		{
			return;
		}

		return (object) array(
			'id'   => $this->getExtensionId(),
			'type' => $this->_type,
			'name' => $this->getPluginName()
		);
	}

	/**
	 * Sets the renderer object
	 *
	 * @param   SitegroundLayoutFile  $renderer  The renderer object.
	 *
	 * @return  $this  Method allows chaining
	 */
	protected function setRenderer($renderer)
	{
		$this->renderer = $renderer;

		return $this;
	}
}
