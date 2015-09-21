<?php
/**
* @package		Joomla.Cli
*
* @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* 
* Joomla 3.2 example CLI script
* Written by: Nikolay Todorov, nikolay.t [at] siteground.com
* 05-feb-2014
* Put this script in the /cli folder in the root of your Joomla 3.2 website
*/

// Set flag that this is a parent file.
const _JEXEC = 1;

error_reporting(E_ALL | E_NOTICE);
ini_set('display_errors', 1);

// Load system defines
if (file_exists(dirname(__DIR__) . '/defines.php'))
{
	require_once dirname(__DIR__) . '/defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__));
	require_once JPATH_BASE . '/includes/defines.php';
}

require_once JPATH_LIBRARIES . '/import.legacy.php';
require_once JPATH_LIBRARIES . '/cms.php';

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

/**
* @package  Joomla.CLI
* @since    3.0
*/
class JUpdate extends JApplicationCli
{
	/**
	* Entry point for CLI script
	*
	* @return  void
	*
	* @since   3.0
	*/
	public function doExecute()
	{
		
		// Database connector
		$db = JFactory::getDBO();
		
		// Attempt to update the table #__schema.
		$pathPart = JPATH_ADMINISTRATOR . '/components/com_admin/sql/updates/mysql/';
		
		//$this->out("$pathPart");
		
		$files = JFolder::files($pathPart, '\.sql$');
		
		$version = '';
		
		foreach ($files as $file)
		{
			if (version_compare($version, JFile::stripExt($file)) < 0)
			{
				$version = JFile::stripExt($file);
			}
		}
		
		// $this->out("Version: $version");
		
		// Delete old row
		$query = $db->getQuery(true)
		    ->delete($db->quoteName('#__schemas'))
		    ->where($db->quoteName('extension_id') . ' = 700');
		$db->setQuery($query);
		$db->execute();
		
		// Add new row
		$query->clear()
		    ->insert($db->quoteName('#__schemas'))
		    ->set($db->quoteName('extension_id') . '= 700')
		    ->set($db->quoteName('version_id') . '= ' . $db->quote($version));
		$db->setQuery($query);
		$db->execute();
		/*
		if ($db->execute())
		{
		    $result = $schema;
		}
		*/
		// Attempt to refresh manifest caches for Joomla CMS! extension		
		$installer = JInstaller::getInstance();
		$installer->refreshManifestCache('700');
	}
}

JApplicationCli::getInstance('JUpdate')->execute();

