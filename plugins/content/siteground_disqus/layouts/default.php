<?php
/**
 * @package     Siteground.Plugin
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2014 siteground.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

extract($displayData);

/**
 * Layout variables
 * ------------------
 * @param   Joomla\Registry\Registry  $pluginParams    Plugin parameters
 * @param   stdClass                  $article         Loaded article
 * @param   Joomla\Registry\Registry  $articleParams   Article parameters
 * @param   string                    $disqusLanguage  Disqus interface language
 *
 */

$mixLanguages    = (int) $pluginParams->get('mixLanguages', 0);
$developerMode   = (int) $pluginParams->get('developerMode', 0);
$disqusShortname = $pluginParams->get('disqusShortname');

$disqusIdentifier = 'siteground-disqus-article-' . $article->id;

if (!$mixLanguages)
{
	$disqusIdentifier .= '-' . $disqusLanguage;
}

if ($disqusShortname)
{
	JFactory::getDocument()->addScriptDeclaration("
		var disqus_identifier = '" . $disqusIdentifier . "';
		var disqus_shortname  = '" . $disqusShortname . "';
		var disqus_developer  = " . $developerMode . ";
		var disqus_config     = function () {
			this.language = '" . $disqusLanguage . "';
		};
		(function() {
			var dsq = document.createElement('script');
			dsq.type = 'text/javascript';
			dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	");
}
?>

<?php if ($disqusShortname) : ?>
	<div class="js-siteground-disqus" id="disqus_thread"></div>
<?php else : ?>
	<div class="alert alert-error">
		<?php echo JText::_('PLG_CONTENT_SITEGROUND_DISQUS_ERROR_MISSING_SHORTNAME'); ?>
	</div>
<?php endif;
