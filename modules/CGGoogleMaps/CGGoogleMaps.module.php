<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGGoogleMaps - A simple module for creating google maps.
# Version: 1.0, calguy1000 <calguy1000@hotmail.com>
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2004-2012 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/skeleton/
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE

$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) ) {
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);

define('CGGM_PREF_NEWMAP_TEMPLATE','cggm_pref_newmap_template');
define('CGGM_PREF_NEWSIEBAR_TEMPLATE','cggm_pref_newsidebar_template');
define('CGGM_PREF_NEWCATEGORY_TEMPLATE','cggm_pref_newcategory_template');
define('CGGM_PREF_NEWBALOON_TEMPLATE','cggm_pref_newbaloon_template');
define('CGGM_PREF_DFLTMAP_TEMPLATE','cggm_pref_dfltmap_template');
define('CGGM_NEWJS_TEMPLATE','cggm_newjs_template');
define('CGGM_NEWSIDEBAR_TEMPLATE','cggm_newsidebar_template');
define('CGGM_NEWCATEGORY_TEMPLATE','cggm_newcategory_template');
define('CGGM_NEWDIRFORM_TEMPLATE','cggm_newdirform_template');
define('CGGM_NEWBALOON_TEMPLATE','cggm_baloon_template');

/**
 * Add a category to the map.
 *
 * @ignore
 */
function cggm_set_var($params, &$smarty)
{
  $map = '';
  $mod = cms_utils::get_module('CGGoogleMaps');
  if( isset($params['map']) ) {
    $map = $params['map'];
    unset($params['map']);
  }
  else {
    $map = $mod->GetPreference('default_map',0);
  }

  foreach( $params as $key => $value ) {
    $mod->add_attr($map,$key,$value);
  }
}

function cggm_add_category($params, &$smarty)
{
  $map = '';
  if( isset($params['map']) ) {
    $map = $params['map'];
  }
  else {
    $mod = cms_utils::get_module('CGGoogleMaps');
    $map = $mod->GetPreference('default_map',0);
  }

  if( !isset($params['name']) ) return; // name is required
  $name = $params['name'];

  $key = $name;
  if( isset($params['key']) ) $key = trim($params['name']);

  $description = '';
  if( isset($params['desc']) ) $description = $params['desc'];
  if( isset($params['description']) ) $description = $params['description'];

  $icon = '';
  if( isset($params['icon']) ) $icon = $params['icon'];

  $mod = cge_utils::get_module('CGGoogleMaps');
  $obj = new cggm_category($name,$key);
  $obj->set_description($description);
  $obj->set_icon($icon);
  $mod->add_map_category($map,$obj);
}


/*---------------------------------------------------------
 cggm_add_dynpoint()
 ---------------------------------------------------------*/
function cggm_add_dynpoint($params, &$smarty)
{
  $mod = cge_utils::get_module('CGGoogleMaps');
  if( !$mod ) return;

  $keys = '';
  if( isset($params['map']) ) {
    if( !is_numeric($params['map']) ) {
      $mapobj = cggm_map_operations::load_by_name($params['map']);
      if( $mapobj ) $keys = array($mapobj->id);
    }
    else {
      $keys = array($params['map']);
    }
  }

  if( isset($params['keys']) && $params['keys'] != '' ) {
    $keys = explode(',',$params['keys']);
  }
  else if( !is_array($keys) ) {
    $keys = array($mod->GetPreference('default_map',0));
  }

  if( !isset($params['name']) ) return; // name is required
  $name = trim($params['name']);
  if( $name == '' ) return;

  $description = '';
  if( isset($params['desc'])  && $params['desc'] != '' ) {
    $description = $params['desc'];
  }
  else if( isset($params['description']) && $params['description'] != '' ) {
    $description = $params['description'];
  }
  
  $address = '';
  if( isset($params['address']) && $params['address'] != '' ) $address = $params['address'];
  
  $lat = '';
  if( isset($params['lat']) && $params['lat'] != '' ) {
    $lat = $params['lat'];
  }
  else if( isset($params['latitude']) && $params['latitude'] != '' ) {
    $lat = $params['latitude'];
  }
  
  $long = '';
  if( isset($params['long']) && $params['long'] |= '' ) {
    $long = $params['long'];
  }
  else if( isset($params['longitude']) && $params['longitude'] |= '' ) {
    $long = $params['longitude'];
  }

  $icon = '';
  if( isset($params['icon']) && $params['icon'] != '') $icon = $params['icon'];

  try {
    $obj = new cggm_marker($name,$address,$lat,$long,$icon);
    $obj->set_description($description);
    if( isset($params['category']) && $params['category'] != '' ) {
      $tmp = trim($params['category']);
      if( $tmp ) $obj->add_category(trim($tmp));
    }

    foreach( $keys as $onekey ) {
      $mod->add_map_point($onekey,$obj);
    }
  }
  catch( Exception $e ) {
    echo '<!-- ERROR: problem adding map point '.$name.' -->'."\n";
  }
}

function cggm_add_kml($params, &$smarty)
{
  $mod = cge_utils::get_module('CGGoogleMaps');
  if( !$mod ) return;
  $map = '';
  if( isset($params['map']) ) {
    $map = $params['map'];
  }
  else {
    $map = $mod->GetPreference('default_map',0);
  }
  
  if( !is_numeric($map) ) {
    $mapobj = cggm_map_operations::load_by_name($map);
    $map = $mapobj->id;
  }

  if( !isset($params['href']) ) return; // href is required
  $href = trim($params['href']);
  if( $href == '' ) return;

  // todo: see if we can find this href... makeit an absolute URL
  $mod->add_kml($map,$href);
}

/* ---- Begin Class --- */
final class CGGoogleMaps extends CGExtensions
{
  var $_dynamic_points;
  var $_dyn_categories;
  var $_kml_files;
  var $_dyn_attrs;
  static $_icons;

  function __construct()
  {
    parent::__construct();
    $this->AddImageDir('icons');

    $gCms = cmsms();
    $smarty = $gCms->GetSmarty();
    $smarty->register_function('cggm_set_var','cggm_set_var');
    $smarty->register_function('cggm_add_dynpoint','cggm_add_dynpoint');
    $smarty->register_function('cggm_add_kml','cggm_add_kml');
  }

  function GetName() { return 'CGGoogleMaps'; }
  function GetFriendlyName() { return $this->Lang('friendlyname'); }
  function GetVersion() { return '2.4.7'; }
  function GetHelp() { return file_get_contents(__DIR__.'/help.inc'); }
  function GetAuthor() { return 'calguy1000'; }
  function GetAuthorEmail() { return 'calguy1000@cmsmadesimple.org'; }
  function GetChangeLog() { return file_get_contents(__DIR__.'/changelog.inc'); }
  function IsPluginModule() { return true; }
  function HasAdmin() { return true; }
  function GetAdminSection() { return 'extensions'; }
  function GetAdminDescription() { return $this->Lang('moddescription'); }
  function LazyLoadAdmin() { return TRUE; }
  function LazyLoadFrontend() { return FALSE; }
  function MinimumCMSVersion() { return '1.11.7'; }
  function InstallPostMessage() { return $this->Lang('postinstall'); }
  function UninstallPostMessage() { return $this->Lang('postuninstall'); }
  function UninstallPreMessage() { return $this->Lang('really_uninstall'); }	
  function AllowAutoInstall() { return FALSE; }
  function AllowAutoUpgrade() { return FALSE; }
  function GetDependencies() { return array('CGExtensions'=>'1.36','CGSimpleSmarty'=>'1.6.2'); }

  function GetHeaderHTML()
  {
    $obj = $this->GetModuleInstance('JQueryTools','1.2');
    if( is_object($obj) ) {
$tmpl = <<<EOT
  {JQueryTools action='require' lib='cluetip,tablesorter,fancybox'}
 {JQueryTools action='placemarker'}
EOT;
      return $this->ProcessTemplateFromData($tmpl);
    }
  }	

  function VisibleToAdminUser()
  {
    return $this->CheckPermission('Manage Maps') ||
      $this->CheckPermission('Modify Templates') ||
      $this->CheckPermission('Manage Map Locations') ||
      $this->CheckPermission('Modify Site Preferences');
  }

  public function InitializeAdmin()
  {
    $this->CreateParameter('map','',$this->Lang('help_param_map'));
    $this->CreateParameter('key','',$this->Lang('help_param_key'));
    $this->CreateParameter('defer','0',$this->Lang('help_param_defer'));
    $this->CreateParameter('maptemplate','',$this->Lang('help_param_maptemplate'));
    $this->CreateParameter('zoomlevel','',$this->Lang('help_param_zoomlevel'));
    $this->CreateParameter('zoom_encompass','',$this->Lang('help_param_zoomencompass'));
    $this->CreateParameter('width','',$this->Lang('help_param_width'));
    $this->CreateParameter('height','',$this->Lang('help_param_height'));
  }
  
  public function InitializeFrontend()
  {
    $this->RegisterModulePlugin();
    $this->RestrictUnknownParams();
    $this->SetParameterType('map',CLEAN_STRING);
    $this->SetParameterType('key',CLEAN_STRING);
    $this->SetParameterType('defer',CLEAN_INT);
    $this->SetParameterType('maptemplate',CLEAN_STRING);
    $this->SetParameterType('zoomlevel',CLEAN_INT);
    $this->SetParameterType('zoom_encompass',CLEAN_INT);
    $this->SetParameterType('width',CLEAN_INT);
    $this->SetParameterType('height',CLEAN_INT);
    $this->SetParameterType('address',CLEAN_STRING);
  }

  public function HasCapability($capability,$params = array())
  {
    if( strtolower($capability) == 'geolocate' ) return TRUE;
    return FALSE;
  }  

  public function GetIconsFull()
  {
    if( is_array(self::$_icons) ) return self::$_icons;

    $db = cmsms()->GetDb();
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_icons ORDER BY name ASC';
    $data = $db->GetArray($query);
    self::$_icons = array();
    if( is_array($data) && count($data) ) self::$_icons = cge_array::to_hash($data,'name');
    return self::$_icons;
  }

  public function GetIconList()
  {
    $data = $this->GetIconsFull();
    $out = null;
    if( is_array($data) && count($data) ) {
      foreach( $data as $name => $row ) {
	$out[$name] = $name;
      }
    }
    return $out;
  }

  function GetCoordsFromAddress($address)
  {
    $tmp = cggm_address_lookup::lookup($address);
    if( is_array($tmp) ) {
      $data = array();
      $data['lat'] = $tmp[0];
      $data['lon'] = $tmp[1];
      return $data;
    }
    return $tmp;
  }

  // getBoundingBox
  // hacked out by ben brown <ben@xoxco.com>
  // http://xoxco.com/clickable/php-getboundingbox
  // given a latitude and longitude in degrees (40.123123,-72.234234) and a distance in miles
  // calculates a bounding box with corners $distance_in_miles away from the point specified.
  // returns $min_lat,$max_lat,$min_lon,$max_lon 
  function GetBoundingBox($lat_degrees,$lon_degrees,$distance_in_miles) 
  {
    $radius = 3963.1; // of earth in miles

    // bearings	
    $due_north = 0;
    $due_south = 180;
    $due_east = 90;
    $due_west = 270;

    // convert latitude and longitude into radians 
    $lat_r = deg2rad($lat_degrees);
    $lon_r = deg2rad($lon_degrees);

    // find the northmost, southmost, eastmost and westmost corners $distance_in_miles away
    // original formula from
    // http://www.movable-type.co.uk/scripts/latlong.html

    $northmost  = asin(sin($lat_r) * cos($distance_in_miles/$radius) + cos($lat_r) * sin ($distance_in_miles/$radius) * cos($due_north));
    $southmost  = asin(sin($lat_r) * cos($distance_in_miles/$radius) + cos($lat_r) * sin ($distance_in_miles/$radius) * cos($due_south));
    $eastmost = $lon_r + atan2(sin($due_east)*sin($distance_in_miles/$radius)*cos($lat_r),cos($distance_in_miles/$radius)-sin($lat_r)*sin($lat_r));
    $westmost = $lon_r + atan2(sin($due_west)*sin($distance_in_miles/$radius)*cos($lat_r),cos($distance_in_miles/$radius)-sin($lat_r)*sin($lat_r));			
    $northmost = rad2deg($northmost);
    $southmost = rad2deg($southmost);
    $eastmost = rad2deg($eastmost);
    $westmost = rad2deg($westmost);

    // sort the lat and long so that we can use them for a between query		
    if ($northmost > $southmost) { 
      $lat1 = $southmost;
      $lat2 = $northmost;
    } else {
      $lat1 = $northmost;
      $lat2 = $southmost;
    }

    if ($eastmost > $westmost) { 
      $lon1 = $westmost;
      $lon2 = $eastmost;
    } else {
      $lon1 = $eastmost;
      $lon2 = $westmost;
    }

    return array($lat1,$lat2,$lon1,$lon2);
  }

  function AddDynamicPoint($map,$name,$description,$address='',
			   $lat='',$long='',$icon='',
			   $sidebar_class = '',$sidebar_html = '')
  {
    if( empty($map) ) return FALSE;
    if( empty($name) ) return FALSE;
    if( empty($address) && (empty($lat) || empty($long)) ) return FALSE;

    if( !is_array($this->_dynamic_points) ) $this->_dynamic_points = array();
    if( !isset($this->_dynamic_points[$map]) ) $this->_dynamic_points[$map] = array();

    // everything is good to go, build the point object.
    $obj = new cggm_marker($name,$address,$lat,$long,$icon);
    $obj->set_description($description);
    $this->add_map_point($map,$obj);
  }

  public function add_map_point($map,cggm_marker& $obj)
  {
    if( !is_array($this->_dynamic_points) ) $this->_dynamic_points = array();
    if( !isset($this->_dynamic_points[$map]) ) $this->_dynamic_points[$map] = array();

    $this->_dynamic_points[$map][] = $obj;
  }

  public function add_map_category($map,cggm_category& $obj)
  {
    if( $map == '' ) return FALSE;
    if( !is_array($this->_dyn_categories) ) $this->_dyn_categories = array();
    if( !isset($this->_dyn_categories[$map]) ) $this->_dyn_categories[$map] = array();
    $this->_dyn_categories[$map][] = $obj;
  }

  public function add_kml($map,$href)
  {
    $map = (int)$map;
    if( !is_array($this->_kml_files) ) $this->_kml_files = array();
    if( !isset($this->_kml_files[$map]) ) $this->_kml_files[$map] = array();
    $this->_kml_files[$map][] = $href;
  }

  public function add_attr($map,$key,$value)
  {
    $map = (int)$map;
    if( !is_array($this->_dyn_attrs) ) $this->_dyn_attrs = array();
    if( !isset($this->_dyn_attrs[$map]) ) $this->_dyn_attrs[$map] = array();
    if( $value !== '' ) {
      $this->_dyn_attrs[$map][$key] = $value;
    }
    else {
      unset($this->_dyn_attrs[$map][$key]);
    }
  }
} // class

#
# EOF
#
?>
