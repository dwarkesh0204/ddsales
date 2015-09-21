Google maps module for Joomla!
=====================

Display a [Google Map](https://www.google.com/maps) in your [Joomla](http://www.joomla.org/) website easily.s

## Requirements

The only requirement is to know the address / coordinates of the map you want to load :)

## Installation

Download and install the ZIP containing the module in your Joomla website from `Extensions > Extension manager`.

## Configuration

In order to display a map go to your site backend `Extensions > Module Manager` and click in `New` to create a new module. In the module selection screen click in `SiteGround - Google Map`. In the module screen adjust the module settings to your requirements.  

### Module settings

#### Basic settings 

* **Map source**: This module accepts three different types of sources. 
    * **Search address/point**: Enter the street, postal code or name of the point of interest that you want to use. Accuracy depends on Google Maps.  
    * **Coordinates**: Enter points based on their map coordinates (latitude/longitude). You can get coordinates directly from the google map address if you search there. In the URL you will see a part like `/@39.4077853,-0.3615113,11z/`. Those are the coordinates (latitude: `39.4077853` | longitude: `-0.3615113`). You can also use an external service like [gps-coordinates.net](http://www.gps-coordinates.net).
    * **Iframe**: This source type is to use the default sharing method of google maps. See [Embed a map](https://support.google.com/maps/answer/3544418?hl=en) for more details.   
* **Search address/point**: This setting will only visible if you select the `Search address/point` source type. Enter here the address or point of intereset that you want to search. Try to enter the most detailed address possible. Recommended format: `street, number, postal code`.
* **Latitude**: This setting will only visible if you select the `Coordinates` map source. Enter here the latitude of your address.
* **Longitude**: This setting will only visible if you select the `Coordinates` map source. Enter here the longitude of your address.  
* ** Iframe code**: This setting will only visible if you select the `Iframe` map source. Enter here the iframe code from google maps.
* **Zoom**: Adjust the zoom of the map. Higher values mean higher zoom.
* **Type**: Select the type of map that you want to show. 
    * **Map**: Default google maps mode. Show a 2D map.
    * **Satellite**: Satellite map mode.
* **Size**: Adjust the size that you want to use to display your map.
    * **Responsive**: This is the default size. The map will automatically fit the parent container.
    * **Fixed**: If the responsive mode does not display the map like you want you can try specify the height or the width of the map manually.
* **Height**: You will only see this setting if you selected the `Fixed` map size. Enter here the desired height of the map including the px or % signs. Example: `300px` or `100%`.
* **Width**: You will only see this setting if you selected the `Fixed` map size. Enter here the desired width of the map including the px or % signs.  Most of the times the default width `100%` should work. Example: `400px` or `100%`.

#### Advanced settings

* **Debug**: Enabling this setting will show information about the layouts used to display the map. Do not use in production sites. 

## License

This module is distributed under the [GNU General Public License, version 2](http://www.gnu.org/licenses/gpl-2.0.html).

## Author & copyright

This module is developed by [Roberto Segura](http://phproberto.com).

Copyright (C) 2014 [SiteGround.com](http://www.siteground.com) - All rights reserved.
