<ul>
<li>1.0 - December, 2007
  <p>Initial Release</p></li>
<li>1.1 - July, 2008
  <p>Added the {cggm_add_dynpoint} smarty plugin to allow adding points to the map dynamically within smarty.</p></ul>
</li>
<li>1.2 - February, 2009
  <p>Add the ability to customize marker icons.</p>
</li>
<li>1.3 - April, 2009
  <p>Add the ability to customize map templates.</p>
</li>
<li>1.3.1 - April, 2009
  <p>Fix problem with default icons.</p>
  <p>Fix problem with invalid addresses.</p>
</li>
<li>1.3.2 - April, 2009
  <p>Fix problem with object reference in the wrong spot.</p>
</li>
<li>1.3.3 - April, 2009
  <p>Now abort showing the map if there are no valid points.</p>
</li>
<li>1.4 - July, 2009
  <p>Add ability to do geolookup functionality using the postcode module.</p>
</li>
<li>1.4.1 - October, 2009
  <p>Adds defer parameter.</p>
  <p>Bumps google map api version number from 2 to 2.118</p>
</li>
<li>1.4.2 - September, 2010
  <p>Now requires CGExtensions 1.19.4
  <p>Fixes problems with javascript.</p>
  <p>Minor optimizations to map points, and icons.</p>
</li>
<li>1.5.6 - September, 2010
  <ul>
    <li>Rework of the javascript stuff for icon handling.</li>
    <li>Adds the ability to combine multiple nearby points into one marker with tabbed info window.</li>
    <li>Enahcnements to sidebar functionality.</li>
    <li>Adds tooltip support.</li>
    <li>Various bug fixes.</li>
</li>
<li>2.0 - November, 2010
  <ul>
    <li>Complete module rewrite.  Module is now written using oop techniques and provides numerous new features.</li>
    <li>Templates are now associated with the map definition</li>
    <li>No longer need a map API key</li>
    <li>Uses (by default) the GoogleMaps V3 API</li> 
    <li>Adds sensor support</li>
    <li>Adds streetview support</li>
    <li>Adds directions panel</li> 
    <li>Adds tooltip support.</li>
    <li>Adds support for marker categories.</li>
    <li>Much, Much more</li>
  </ul>
</li>
<li>2.1 - Jan, 2011
  <ul>
    <li>Begin work on the infowindow template stuff.</li>
    <li>Expands default streetview functionality.</li>
  </ul>
</li>
<li>2.1.3 - Feb, 2011
  <ul>
    <li>Minor bug fixes.</li>
  </ul>
</li>
<li>2.1.3 - March, 2011
  <ul>
    <li>Adds the zoomlevel and zoom_encompass parameters.</li>
  </ul>
</li>
<li>2.1.4 - March, 2011
  <ul>
    <li>Adds parameters for overriding zomm_encompass and zoomlevel directly on the module call.</li>
  </ul>
</li>
<li>2.2 - November, 2011
  <ul>
    <li>Fixes JS and template issues with multiple maps on one page</li>
    <li>Fixes default map template so streetview area has a height.</li>
    <li>Dynamic points are now erased after each call to {CGGoogleMaps}</li>
    <li>Fixes an issue with a map name being passed to{cggm_add_dynpoint}</li>
    <li>Should now fix numeric issues in center lat and center long (locale should not make a difference now)... I think.</li>
    <li>Removes apikey stuff</li>
    <li>Changes to new Google geolocation stuff.</li>
    <li>Adds ability to clear geolocation cache.</li>
  </ul>
</li>
<li>2.2.4 - December, 2011
  <ul>
    <li>Minor fixes to editing and displaying map points in the admin interface.</li>
    <li>Fixes for the stupid lang specific way PHP handles float to string conversion.</li>
  </ul>
</li>
<li>2.2.5 - December, 2011
  <ul>
    <li>Minor fixes.</li>
  </ul>
</li>
<li>2.2.9 - June, 2012
  <ul>
    <li>Minor fixes.</li>
  </ul>
</li>
<li>2.3.1 - June, 2012
  <ul>
    <li>Minor fixes to bad location handling.</li>
    <li>Minor improvements to the default js template.</li>
    <li>Adds the {cggm_add_kml} smarty tag.</li>
    <li>Moves the help out of the lang file.</li>
  </ul>
</li>
<li>2.4 - August, 2012
  <ul>
    <li>Adds width and height parameters.</li>
    <li>Only include the google apis js once.</li>
    <li>Minor fixes to the js template (if you have not modified your js templates you may want to restore to default).</li>
  </ul>
</li>
<li>2.4.6 - July, 2013
  <ul>
    <li>Minor bug fixes.</li>
    <li>Officially deprecate this module.  see the CGGoogleMaps2 module.</li>
  </ul>
</li>
</ul>
