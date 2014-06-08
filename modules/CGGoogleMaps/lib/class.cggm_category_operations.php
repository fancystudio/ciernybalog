<?php

class cggm_category_operations
{
  static public function load_from_data($data)
  {
    $cat = new cggm_category('');
    $cat->from_array($data);
    return $cat;
  }


  static public function load_all_categories()
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_cats ORDER BY name ASC';
    $data = $db->GetArray($query);

    if( $data && is_array($data) )
      {
	$results = array();
	foreach( $data as $row )
	  {
	    $results[] = self::load_from_data($row);
	  }
	return $results;
      }
  }


  public static function load_by_id($id)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_cats WHERE id = ?';
    $data = $db->GetRow($query,array($id));

    if( $data && is_array($data) )
      {
	$cat = self::load_from_data($data);
	return $cat;
      }
  }


  public static function load_by_name($name)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_cats WHERE name = ?';
    $data = $db->GetRow($query,array($name));

    if( $data && is_array($data) )
      {
	$cat = self::load_from_data($data);
	return $cat;
      }
  }


  public static function insert(cggm_category& $cat)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'INSERT INTO '.cms_db_prefix().'module_cggooglemaps_cats 
               (name, info, icon) VALUES (?,?,?)';
    $dbr = $db->Execute($query,array($cat->get_name(),$cat->get_info(),$cat->get_icon()));
    if( !$dbr ) { debug_display($db->ErrorMsg().'<br/>'.$db->sql); die(); }
    if( !$dbr ) return FALSE;
    $new_id = $db->Insert_ID();
    $cat->set_id($new_id);
    return TRUE;
  }


  public static function update(cggm_category& $cat)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'UPDATE '.cms_db_prefix().'module_cggooglemaps_cats 
                 SET name = ?, info = ?, icon = ?
               WHERE id = ?';
    $dbr = $db->Execute($query,array($cat->get_name(),$cat->get_info(),$cat->get_icon(),
				     $cat->get_id()));
    if( !$dbr ) return FALSE;
    return TRUE;
  }


  public static function delete($id)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $query = 'DELETE FROM '.cms_db_prefix().'module_cggooglemaps_cats
                WHERE id = ?';
    $dbr = $db->Execute($query,array($id));
    if( !$dbr ) return FALSE;
    return TRUE;
  }
} // end of class

?>