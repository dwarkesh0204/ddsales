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

/**
 * Available variables in this layout
 * ------------------
 * @param   object            $module          Module information as it comes from JDocumentRendererModule
 * @param   JRegistry         $params          Module parameters
 * @param   SitegroundModule  $moduleInstance  Main module instance
 */

$cssId = 'mod-' . (empty($module->id) ? uniqid() : $module->id);
?>
<ul class="mod-siteground-social" id="<?php echo $cssId; ?>">
	<?php if ($facebookLink = $moduleInstance->getFacebookLink()) : ?>
		<li>
			<a href="<?php echo $facebookLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_FACEBOOK_TITLE'); ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_FACEBOOK_TEXT'); ?></a>
		</li>
	<?php endif; ?>
	<?php if ($linkedinLink = $moduleInstance->getLinkedinLink()) : ?>
		<li>
			<a href="<?php echo $linkedinLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_LINKEDIN_TITLE'); ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_LINKEDIN_TEXT'); ?></a>
		</li>
	<?php endif; ?>
	<?php if ($twitterLink = $moduleInstance->getTwitterLink()) : ?>
		<li>
			<a href="<?php echo $twitterLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_TWITTER_TITLE'); ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_TWITTER_TEXT'); ?></a>
		</li>
	<?php endif; ?>
	<?php if ($emailLink = $moduleInstance->getEmailLink()) : ?>
		<li>
			<a href="<?php echo $emailLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_EMAIL_TITLE'); ?>"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_EMAIL_TEXT'); ?></a>
		</li>
	<?php endif; ?>
	<?php if ($contactLink = $moduleInstance->getContactLink()) : ?>
		<li>
			<a href="<?php echo $contactLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_CONTACT_TITLE'); ?>"><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_CONTACT_TEXT'); ?></a>
		</li>
	<?php endif; ?>
	<?php if ($googlePlusLink = $moduleInstance->getGooglePlusLink()) : ?>
		<li>
			<a href="<?php echo $googlePlusLink; ?>" title="<?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_GPLUS_TITLE'); ?>" <?php echo $moduleInstance->getTargetAttribute(); ?>><?php echo JText::_('MOD_SITEGROUND_SOCIAL_LINK_GPLUS_TEXT'); ?></a>
		</li>
	<?php endif; ?>
</ul>
