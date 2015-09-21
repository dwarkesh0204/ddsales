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
 * @param   JRegistry                 $langTags        Language tags to init the different networks
 * @param   SitegroundPlugin          $pluginInstance  Plugin rendering this layout
 * @param   string                    $sharedUrl       URL to share
 * @param   string                    $sharedTitle     Title to share
 *
 */
?>
<div class="sgsocial">
	<ul class="social-buttons cf sgsocial-loader">
		<?php if ($pluginInstance->isEnabledNetwork('twitter')) : ?>
			<li>
				<a href="http://twitter.com/share" class="socialite twitter-share" data-text="<?php echo $sharedTitle; ?>" data-url="<?php echo $sharedUrl; ?>" data-count="vertical" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_TWITTER_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('gplus')) : ?>
			<li>
				<a href="https://plus.google.com/share?url=<?php echo $sharedUrl; ?>" class="socialite googleplus-one" data-size="tall" data-href="<?php echo $sharedUrl; ?>" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_GPLUS_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('facebook')) : ?>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php echo $sharedUrl; ?>&amp;t=<?php echo $sharedTitle; ?>" class="socialite facebook-like" data-href="<?php echo $sharedUrl; ?>" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_FACEBOOK_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('linkedin')) : ?>
			<li>
				<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $sharedUrl; ?>&amp;title=<?php echo $sharedTitle; ?>&amp;t=<?php echo $sharedTitle; ?>" class="socialite linkedin-share" data-url="<?php echo $sharedUrl; ?>" data-counter="top" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_LINKEDIN_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
	</ul>
	<ul class="sgsocial-buttons inline">
		<?php if ($pluginInstance->isEnabledNetwork('twitter')) : ?>
			<li>
				<a href="http://twitter.com/share" class="socialite twitter-share" data-text="<?php echo $sharedTitle; ?>" data-url="<?php echo $sharedUrl; ?>" data-count="vertical" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_TWITTER_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('gplus')) : ?>
			<li>
				<a href="https://plus.google.com/share?url=<?php echo $sharedUrl; ?>" class="socialite googleplus-one" data-size="tall" data-href="<?php echo $sharedUrl; ?>" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_GPLUS_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('facebook')) : ?>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php echo $sharedUrl; ?>&amp;t=<?php echo $sharedTitle; ?>" class="socialite facebook-share" data-href="<?php echo $sharedUrl; ?>" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_FACEBOOK_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
		<?php if ($pluginInstance->isEnabledNetwork('linkedin')) : ?>
			<li>
				<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $sharedUrl; ?>&amp;title=<?php echo $sharedTitle; ?>&amp;t=<?php echo $sharedTitle; ?>" class="socialite linkedin-share" data-url="<?php echo $sharedUrl; ?>" data-counter="top" rel="nofollow" target="_blank"><span class="hidden"><?php echo JText::_('PLG_CONTENT_SITEGROUND_SOCIAL_LABEL_LINKEDIN_SHARE_TEXT'); ?></span></a>
			</li>
		<?php endif; ?>
	</ul>
</div>
