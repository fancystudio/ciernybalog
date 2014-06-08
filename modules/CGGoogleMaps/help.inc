<div class="information"><strong>Note: This module is deprecated</strong>.  The CGGoogleMaps2 module has been written with newer technology to improve speed and flexibility over this module.  This module will no longer receive active development.</div>
<h3>What does this do</h3>
  <p>This module provides a quick, convenient, yet flexible and extendable way to place google maps on a page providing a number of built in functions, and providing easy extendability for those familiar with Javascript and the Google Maps API';
<h3>Features:</h3>
<ul>
  <li>Static map creation using a full admin interface for managing maps and markers within a map.</li>
  <li>Flexible marker icon management.</li>
  <li>The ability to categorize markers.  Markers can belong to more than one category.</li>
  <li>Infowindow content can be specified using HTML</li>
  <li>Streetview support</li>
  <li>The ability to display a sidebar of all markers associated with a map.</li>
  <li>The ability to display a category panel, and hide icons by unchecking a category checkbox.</li>
  <li>Directions support (either by displaying the route in the map (and with directions in a seperate panel), or by opening a new window</li>
  <li>Reads sensor information from GPS sensors on mobile devices.</li>
  <li>The ability to group markers that are within a lat/long radius to a single marker with a special icon.</li>
  <li>The ability to dynamically add markers given data from an outside point <em>(see {cggm_add_dynpoint})</em>
  <li>Uses jquery for advanced DOM manipulation.</li>
</ul>
<h3>How Do I Use It?</h3>
<ul>
<li>Install the module via the normal methods</li>
<li>Setup your users and groups with the appropriate permissions:
  <ul>
    <li>The 'Manage Maps' Permission allows administrators to add/edit and delete maps</li>
    <li>The 'Manage Map Locations' permission allows administrators to add/edit/delete points within a map</li>
  </ul>
</li>
<li>Create a map.  Give the map a name, and adjust the paramters of the particular map to meet your liking.  Note that when resetting one of the map templates to defaults, you must still press the &quot;Apply&quot; or &quot;Apply&quot; buttons.</p>
<li>Mark one of your maps as default, by clicking on the red 'X' beside a particular map.  This is useful if you don't specify the 'map' parameter on the tag.</li>
<li>Create one or more points within the map, either by specifying a latitude and longitude, or with an address.</li>
<li>Add the {CGGoogleMaps} tag inside the content block of a page, or inside a page template.  Then you're finished.</li>
</ul>
<br/>
<h3>Adding Points to a Map Dynamically</h3>
<p>You can use smarty to add points to a module dynamically.  You can use this functionality to build a frappr like map with multiple points that are controlled dynamically from another module (like CompanyDirectory or FrontEndUsers).</p>
<h4>The {cggm_add_dynpoint} Smarty Plugin</h4>
<p>This smarty plugin <em>(only available when CGGoogleMaps is installed)</em> allows adding a point dynamically to a specified map.</p>
<h5>Usage:</h5>
<pre><code>{cggm_add_dynpoint map=1 name='New York' address='New York, NY' icon='food'}</code></pre><br/>
<h5>Parameters:</h5>
  <ul> 
<li><strong>required</strong> - map : The ineger ID, or string name of the map to add the point to</li>
<li><strong>required</strong> - name : The name of the point to add</li>
<li><em>optional</em> - keys : A comma separated list of keys for storing the point.  Multiiple keys can be specified and the point will be stored under each key.  This is useful in conjunction with the &quot;key&quot; parameter of the CGGoogleMaps module to indicate which points to display in a particular map.</li> 
<li><em>optional</em> - desc/description : The HTML content to show in the info window</li>
<li><em>optional</em> - address : The address of the location you are adding. (you must specify an address, or lat and long parameters)</li>
<li><em>optional</em> - lat/latitude : The latitude of the location you are adding.</li>
<li><em>optional</em> - long/longitude : The longitude of the location you are adding.</li>
<li><em>optional</em> - category : A comma separated list of categories for this point (there is no need for the categories to already exists)</li>
<li><em>optional</em> - tooltip : A tooltip to display when hovering over a point.</li>
<li><em>optional</em> - icon : The name of an icon to use for this point.</li>
  </ul>
<br/>
<p><strong>Note:</strong> Either the lat and long parameters must be specified, or the address.</p>
<p><strong>Note:</strong> This plugin returns no direct output, and if errors occur, it will silently fail.  Success means that the point will show up on your google map.</p>
</ul>
<h4>The {cggm_set_var} smarty plugin.</h4>
<p>This smarty plugin <em>(only available when CGGoogleMaps is installed)</em> Allows controlling aspects of the map behavior from within a smarty template.</p>
<h5>Usage:</h5>
<pre><code>{cggm_set_var key=value ...}</code></pre>
<h5>Parameters:</h5>
<ul>
  <li>map : The integer id, or string name of the map that we will be controlling.  If not specified the default map is assumed.</li>
  <li>width : Integer width of the map in pixels.</li>
  <li>height : Integer height of the map in pixels.</li>
  <li>zoom_encompass : Integer (either 0 or 1) indicating wether zoom_encompass should be enabled for the map.</li>
  <li>description : Text description for the map.</li>
  <li>default_icon : The name of the icon to be used as the &quot;default&quot;</li>
  <li>type : String.  Possible values are map,satellite,terraint,hybrid.</li>
  <li>nav_controls : boolean, indicating wether navigation controls should be displayed.</li>
  <li>scale_controls : boolean, indicating wether scale controls should be displayed.</li>
  <li>sv_coontrols : boolean, indicating wether streetview controls should be displayed.</li>
  <li>type_controls : string, possible values are: default,dropdown,small,horizontal_bar.</li>
  <li>sidebar : boolean indicating wether the sidebar should be displayed.</li>
  <li>zoom : integer - zoom level between 1 and 17</li>
  <li>sensor : boolean - indicating wether the gps sensor should be used.</li>
  <li>center_lat : Center latitude for the map (ignored if zoom_encompass is on).</li>
  <li>center_lon : Center longitudde for the map (ignored if zoom_encompass is on).</li>
</ul>
<h4>The {cggm_add_kml} smarty plugin.<h4>
<p>This smarty plugin <em>(only available when CGGoogleMaps is installed)</em> allows adding a kml file dynamically to a specified map.</p>
<h5>Usage:</h5>
<pre><code>{cggm_add_kml map=1 href="http://path/to/kmlfile.kml"><code></pre>
<h5>Parameters:</h5>
<ul>
  <li><strong>required</strong> - map : The integer ID, or string name of the map to add the point to</li>
  <li><strong>required</strong> - href : The complete url to the kml file.  This kml file must be addressable by google over the internet.</li>
</ul>
<h3>KML File Support:</h3>
<p>Rudimentary support for kml files has been added via the {cggm_add_kml} plugin.  However this plugin is not intelligent.  It will not consider the latitude and longitude of locations in the kml file(s) when considering the zoom range for zoom_encompass, etc.</p>
<h3>Upgrade Information:</h3>
<p><strong>Note:</strong> For people upgrading from CGGoogleMaps 1.x to the new 2.x series some work may need to be done, particularly if you have changed your map template, or are using custom options.  You may need to revise the styling of your map templates, and then update/save the values in the map settings.</p>
<p>Also: The sidebar_html, and sidebar_class parameters have been removed from the {cggm_add_dynpoint} smarty plugin.  This is due to the category functionality that has been added.</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy\'s
module homepage at <a href="http://calguy1000.com">calguy1000.com</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<h3>Requirements</h3>
<p>This map functionality makes extensive use of <strong>JQuery</strong> it is your responsibility to include jquery in pages that use these maps and ensure that it is loaded before the map is called.  The easiest way to do this is by installing the JQueryTools module and adding {JQueryTools action=incjs} into the head portion of your page template.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&lt;calguy1000@cmsmadesimple.org&gt;</a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin 
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>