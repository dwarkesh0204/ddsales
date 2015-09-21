<?php
/**
 * @package     Siteground.Module
 * @subpackage  Social
 *
 * @copyright   Copyright (C) 2014 siteground.com - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

extract($displayData);

JHtml::_('siteground.fontawesome');

/**
 * Available variables in this layout
 * ------------------
 * @param   object            $module          Module information as it comes from JDocumentRendererModule
 * @param   JRegistry         $params          Module parameters
 * @param   SitegroundModule  $moduleInstance  Main module instance
 */

$cssId = 'mod-' . (empty($module->id) ? uniqid() : $module->id);
?>
<ul class="mod-siteground-social inline" id="<?php echo $cssId; ?>">
	<?php if ($facebookLink = $moduleInstance->getFacebookLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_FACEBOOK_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $facebookLink; ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>>
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_FACEBOOK_TEXT'); ?></span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($linkedinLink = $moduleInstance->getLinkedinLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_LINKEDIN_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $linkedinLink; ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>>
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_LINKEDIN_TEXT'); ?></span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($twitterLink = $moduleInstance->getTwitterLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_TWITTER_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $twitterLink; ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>>
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_TWITTER_TEXT'); ?></span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($emailLink = $moduleInstance->getEmailLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_EMAIL_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $emailLink; ?>">
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_EMAIL_TEXT'); ?></span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($contactLink = $moduleInstance->getContactLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_CONTACT_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $contactLink ?>">
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-send fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_CONTACT_TEXT'); ?></span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($googlePlusLink = $moduleInstance->getGooglePlusLink()) : ?>
		<li>
			<a title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_GPLUS_TITLE'); ?>" class="fa-stack fa-lg" href="<?php echo $googlePlusLink; ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>>
			  <i class="fa fa-square fa-stack-2x"></i>
			  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
			  <span class="hidden"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_GPLUS_TEXT'); ?></span>
			</a>
	<?php endif; ?>
</ul>
