<?php

class cggm_marker_operations
{
  public static function load_marker_from_data($data)
  {
    $marker = new cggm_marker('junk','junk');
    $marker->from_array($data);
    return $marker;
  }


  public static function load_markers_for_map(cggm_map& $map)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_points WHERE map_id = ? ORDER BY marker_id';
    $tmp = $db->GetArray($query,array($map->get_id()));
    if( !is_array($tmp) ) return FALSE;

    foreach( $tmp as $row )
      {
	$marker = self::load_marker_from_data($row);
	$map->add_marker($marker);
      }
    return TRUE;
  }


  public static function insert(cggm_marker& $marker)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'INSERT INTO '.cms_db_prefix().'module_cggooglemaps_points
               (map_id,name,info,address,lat,lon,icon,categories)
              VALUES (?,?,?,?,?,?,?,?)';
    $dbr = $db->Execute($query,
			array($marker->get_map_id(),
			      $marker->get_title(),
			      $marker->get_description(),
			      $marker->get_address(),
			      $marker->get_latitude(),
			      $marker->get_longitude(),
			      $marker->get_icon(),
			      $marker->get_categories()));

    if( !$dbr ) return FALSE;
    $marker_id = $db->Insert_Id();
    $marker->set_marker_id($marker_id);
    return TRUE;
  }


  public static function update(cggm_marker& $marker)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'UPDATE '.cms_db_prefix().'module_cggooglemaps_points
               SET name = ?, info = ?, address = ?, lat = ?, lon = ?, icon = ?, 
               categories = ? 
              WHERE marker_id = ? AND map_id = ?';
    $dbr = $db->Execute($query,
			array($marker->get_title(),
			      $marker->get_description(),
			      $marker->get_address(),
			      $marker->get_latitude(),
			      $marker->get_longitude(),
			      $marker->get_icon(),
			      $marker->get_categories(),
			      $marker->get_marker_id(),
			      $marker->get_map_id()));

    if( $dbr ) return TRUE;
    return FALSE;
  }
} // end of class

?>