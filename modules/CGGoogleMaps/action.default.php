<?php
#-------------------------------------------------------------------------
# Module: CGGoogleMaps - A simple module for creating google maps.
# Version: 1.0, calguy1000 <calguy1000@hotmail.com>
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
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
if( !isset($gCms) ) exit;

//
// initialization
//
$defer = 0;
$mapid = '';
$map = '';
$icons = '';
$key = '';

//
// setup
//
if( isset($params['defer']) && $params['defer'] == 1 ) {
  $defer = 1;
 }

//
// Get the map information
//
$mapid = $key = $this->GetPreference('default_map',0);
if( isset($params['map']) ) {
  if( !is_numeric($params['map']) ) {
    $map = cggm_map_operations::load_by_name($params['map']);
    if( is_object($map) ) $mapid = $key = $map->id;
  }
  else {
    $mapid = $key = (int)$params['map'];
  }
}
if( isset($params['key']) ) {
  $key = trim($params['key']);
}

if( !$mapid ) {
  echo $this->DisplayErrorMessage($this->Lang('error_invalidparams'));
  return;
}
if( !$map ) $map = cggm_map_operations::load_by_id($mapid,true);
if( !$map ) {
  echo $this->DisplayErrorMessage($this->Lang('error_invalidparams'));
  return;
}
$mid = $map->get_id();

// add attributes 
if( is_array($this->_dyn_attrs) && isset($this->_dyn_attrs[$mapid]) &&
    count($this->_dyn_attrs[$mapid]) ) {
  foreach( $this->_dyn_attrs[$mapid] as $akey => $value ) {
    try {
      if( in_array($akey,array('owner_id','id')) ) continue;
      $map->$akey = $value;
    }
    catch( Exception $e ) {
      // do nothing.
    }
  }
}

//
// add dynamic points.
//
if( is_array($this->_dynamic_points) && 
    isset($this->_dynamic_points[$key]) && 
    count($this->_dynamic_points[$key]) ) {
  for( $i = 0; $i < count($this->_dynamic_points[$key]); $i++ ) {
    $map->add_marker($this->_dynamic_points[$key][$i]);
  }
  unset($this->_dynamic_points[$key]);
}

// add kml layers
if( is_array($this->_kml_files) && isset($this->_kml_files[$mid]) && 
    count($this->_kml_files[$mid]) ) {
  for( $i = 0; $i < count($this->_kml_files[$mid]); $i++ ) {
    if( $this->_kml_files[$mid][$i] != '' ) {
      $map->add_kml($this->_kml_files[$mid][$i]);
    }
  }
  unset($this->_kml_files[$mid]);
}

// add more parameters
if( isset($params['zoomlevel']) ) {
  $val = min((int)$params['zoomlevel'],17);
  $val = max(1,$val);
  $map->zoom = $val;
 }

if( isset($params['zoom_encompass']) ) {
  $map->zoom_encompass = ((int)$params['zoom_encompass']);
 }
if( isset($params['width']) ) {
  $map->width = max(10,(int)$params['width']);
}
if( isset($params['height']) ) {
  $map->height = max(10,(int)$params['height']);
}

$generator = new cggm_map_generator($map,$defer);
$output = $generator->generate();
$errors = $generator->get_errors();
if( is_array($errors) ) {
  echo $this->DisplayErrorMessage(implode('<br/>',$errors));
 }
echo $output;

// EOF
?>
