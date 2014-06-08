<?php

class cggm_address_lookup
{
  static private $_lookup_service;
  static private $_lookup_policy;

  static private function initialize()
  {
    if( self::$_lookup_service == '' ) {
      $mod = cge_utils::get_module('CGGoogleMaps');
      if( $mod ) {
	self::$_lookup_service = $mod->GetPreference('lookup_service','GOOGLE');
	self::$_lookup_policy  = $mod->GetPreference('lookup_policy','CACHE');
      }
    }
  }

  static private function cache_lookup($address)
  {
    if( empty($address) ) return FALSE;

    $db = cmsms()->GetDb();
    $query = 'SELECT lon,lat FROM '.cms_db_prefix().'module_cggooglemaps_cache WHERE address = ?';
    $tmp = $db->GetRow($query,array($address));
    if( !$tmp || !is_array($tmp) ) return FALSE;

    return array($tmp['lat'],$tmp['lon']);
  }

  static private function cache_address($address,$coords)
  {
    if( !$address || !is_array($coords) || count($coords) != 2 ) return FALSE;

    $db = cmsms()->GetDb();
    $query = 'INSERT INTO '.cms_db_prefix().'module_cggooglemaps_cache (address,lat,lon) VALUES (?,?,?)';
    $dbr = $db->Execute($query,array($address,$coords[0],$coords[1]));
    if( !$dbr ) {
      debug_display($db->sql); debug_display($db->ErrorMsg()); die();
      return FALSE;
    }
    return TRUE;
  }


  static public function geo_lookup($address)
  {
    switch( self::$_lookup_service ) {
    case 'GOOGLE':
    default:
	$address = str_replace('%20','+',rawurlencode($address));
	//$address = str_replace(' ','+',$address);
	$url = sprintf('http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=%s',$address);
	$res = cge_http::get($url,'',FALSE);
	if( $res ) {
	  $tmp = json_decode($res);
	  if( !isset($tmp->status) || $tmp->status != 'OK' ) {
	    audit('','cggm_address_lookup','Address lookup of '.$address.' returned '.$tmp->status);
	    return FALSE;
	  }
	  if( !isset($tmp->results[0]->geometry->location) ) return FALSE;
	  return array((float)$tmp->results[0]->geometry->location->lat,(float)$tmp->results[0]->geometry->location->lng);
	}
	break;
    }

    return FALSE;
  }


  static public function lookup($address)
  {
    if( empty($address) ) return FALSE;

    self::initialize();
    $address = trim($address);
    $coords = FALSE;

    switch( self::$_lookup_policy ) {
    case 'NOCACHE':
      $coords = self::geo_lookup($address);
      break;

    case 'CACHEONLY':
      $coords = self::cache_lookup($address);
      break;

    case 'CACHEFIRST':
    default:
      $coords = self::cache_lookup($address);
      if( !$coords ) {
	$coords = self::geo_lookup($address);
	if( !$coords ) return FALSE;

	self::cache_address($address,$coords);
      }
      break;
    }

    return $coords;
  }

} // end of class

?>
