<?php
/**
 * @package     Siteground.Module
 * @subpackage  Map
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

extract($displayData);

/**
 * Available variables in this layout
 * ------------------
 * @param   object     $module  Module information as it comes from JDocumentRendererModule
 * @param   JRegistry  $params  Module parameters
 * @param   string     $mapUrl  Url for the embed map
 * @param   string     $cssId   Specific DOM identifier for this map. Ex: mod-sitegroud-map-21
 */
?>
<div class="mod-siteground-map" id="<?php echo $cssId; ?>">
	<iframe
		frameborder="0"
		scrolling="no"
		marginheight="0"
		marginwidth="0"
		src="<?php echo $mapUrl; ?>"
		>
	</iframe>
</div>
