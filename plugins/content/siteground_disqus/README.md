Disqus plugin for Joomla! content
=====================

This plugin integrates [Disqus](https://disqus.com) comments with [Joomla](http://www.joomla.org/) CMS com_content articles.  

Disqus allows anyone to comment on your site using their existing  [Twitter](https://twitter.com), [Facebook](https://www.facebook.com/) or Disqus account.

## Requirements

In order to use the plugin you have to create a free account on [Disqus](https://disqus.com/). 

## Installation

Download and install the ZIP containing the plugin in your Joomla website from `Extensions > Extension manager`.

## Configuration

To start using the plugin you have to:

* **Get your disqus shortname**. Login into disqus and go to the `Settings` section of your disqus admin panel. Once there search for your `Shortname` in the `Site identity` section. That's the site identifier you will need to link your site comments with your Disqus account. 
* **Enable and configure the plugin**. Go to `Extensions > Plugin Manager` and search for a plugin called `Siteground - Disqus comments`. Click on it to configure it. In settings you need to set the `Status` to enabled and enter your shortname. You also have to set the categories where you want to display comments.

### Plugin parameters

#### Basic settings 

* **Disqus shortname**:  The shortname that appears in your Disqus admin panel.
* **Mode**: Mode of managing categories. This will decide if you enable by default comments for all your categories or if you have to specifically assign categories that will use comments (like a blog).
* **Excluded categories**: You will only see this setting if you decided to enable comment by default in all categories except in the categories selected. Select the categories you want to exclude.
* **Included categories**: You will only see this setting if you decided to enable comments only for the specified categories. Select the categories where you want to enable comments.

#### Advanced settings

* **Mix languages**: if you have a multilanguage site the plugin will by default do not mix comments entered in different languages. That way your english users will only see what english users comments. If you want to mix all the languages comments enable this setting. **WARNING** if you change this setting once the system has started to store comments you will lose them.
* **Developer mode**: This setting is intended to allow developers to test the plugin locally. 
* **Debug**: Enabling this setting will show information about the layouts used to display the comments. Do not use in production sites. 

## License

This plugin is distributed under the [GNU General Public License, version 2](http://www.gnu.org/licenses/gpl-2.0.html).

## Author & copyright

This plugin is developed by [Roberto Segura](http://phproberto.com).

Copyright (C) 2014 [SiteGround.com](http://www.siteground.com) - All rights reserved.