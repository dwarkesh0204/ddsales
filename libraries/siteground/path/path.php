<?php
/**
 * @package     Siteground.Library
 * @subpackage  Path
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

if (!defined('JPATH_ROOT'))
{
	// Define a string constant for the root directory of the file system in native format
	$pathHelper = new JFilesystemWrapperPath;
	define('JPATH_ROOT', $pathHelper->clean(JPATH_SITE));
}

/**
 * A Path handling class
 *
 * @since  1.0
 */
abstract class SitegroundPath extends JPath
{
	/**
	 * Searches the directory paths for a given file.
	 * This method overrides JPath::find to avoid bug that returns realpath() and break symb links
	 *
	 * @param   mixed   $paths  An path string or array of path strings to search in
	 * @param   string  $file   The file name to look for.
	 *
	 * @return  mixed   The full path and file name for the target file, or boolean false if the file is not found in any of the paths.
	 *
	 * @since   1.0
	 */
	public static function find($paths, $file)
	{
		// Force to array
		if (!is_array($paths) && !($paths instanceof Iterator))
		{
			settype($paths, 'array');
		}

		// Start looping through the path set
		foreach ($paths as $path)
		{
			// Get the path to the file
			$fullname = $path . '/' . $file;
			$calledFile = $fullname;

			// Is the path based on a stream?
			if (strpos($path, '://') === false)
			{
				// Not a stream, so do a realpath() to avoid directory
				// traversal attempts on the local file system.

				// Needed for substr() later
				$path = realpath($path);
				$fullname = realpath($fullname);
			}

			/*
			 * The substr() check added to make sure that the realpath()
			 * results in a directory registered so that
			 * non-registered directories are not accessible via directory
			 * traversal attempts.
			 */
			if (file_exists($fullname) && substr($fullname, 0, strlen($path)) == $path)
			{
				return $calledFile;
			}
		}

		// Could not find the file in the set of paths
		return false;
	}
}
