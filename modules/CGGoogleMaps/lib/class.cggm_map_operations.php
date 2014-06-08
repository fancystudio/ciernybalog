<?php

final class cggm_map_operations
{
  static private $_dflt_icon;
  static private $_map_tpl;
  static private $_js_tpl;
  static private $_cat_tpl;
  static private $_sidebar_tpl;
  static private $_dirform_tpl;
  static private $_baloonform_tpl;
  static private $_maps;
  static private $_map_name_map;

  private function __construct() {}

  public static function update_from_formdata(cggm_map& $map,$formdata)
  {
    if( !is_array($formdata) ) return;

    foreach( $formdata as $key => $value ) {
      try {
	$map->$key = $value;
      }
      catch( Exception $e ) {
	// nothing to do.
      }
    }
  }

  private static function map_to_row(cggm_map& $map)
  {
    $data = array();
    $data[] = $map->get_name();
    $data[] = $map->get_owner_id();
    $data[] = $map->get_data();
    return $data;
  }


  private static function row_to_map($row)
  {
    $obj = new cggm_map;

    $obj->set_id($row['map_id']);
    $obj->set_name($row['name']);
    $obj->set_owner_id($row['owner_id']);
    $obj->set_data($row['data']);

    return $obj;
  }


  private static function _init_data()
  {
    if( self::$_map_tpl != '' ) return;

    $mod = cge_utils::get_module('CGGoogleMaps');
    self::$_dflt_icon = $mod->GetPreference('default_marker','dd-end');
    self::$_map_tpl = $mod->GetTemplate(CGGM_PREF_NEWMAP_TEMPLATE);
    self::$_js_tpl = $mod->GetTemplate(CGGM_NEWJS_TEMPLATE);
    self::$_sidebar_tpl = $mod->GetTemplate(CGGM_NEWSIDEBAR_TEMPLATE);
    self::$_cat_tpl = $mod->GetTemplate(CGGM_NEWCATEGORY_TEMPLATE);
    self::$_dirform_tpl = $mod->GetTemplate(CGGM_NEWDIRFORM_TEMPLATE);
    self::$_baloonform_tpl = $mod->GetTemplate(CGGM_NEWBALOON_TEMPLATE);
  }

  public static function build_new_map($params)
  {
    self::_init_data();

    $obj = new cggm_map;
    $obj->default_icon = self::$_dflt_icon;
    foreach( $params as $key => $value ) {
      $obj->$key = $value;
    }
    $obj->set_map_template(self::$_map_tpl);
    $obj->set_js_template(self::$_js_tpl);
    $obj->set_sidebar_template(self::$_sidebar_tpl);
    $obj->set_category_template(self::$_cat_tpl);
    $obj->set_dirform_template(self::$_dirform_tpl);
    $obj->set_baloon_template(self::$_baloonform_tpl);
    return $obj;
  }

  public static function load_by_id($map_id,$deep = false)
  {
    if( !isset(self::$_maps[$map_id]) ) {
      $db = cmsms()->GetDb();
      $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps WHERE map_id = ?';
      $row = $db->GetRow($query,array($map_id));
      if( !$row ) return FALSE;

      $obj = self::row_to_map($row);
      if( !is_array(self::$_maps) ) self::$_maps = array();
      self::$_maps[$map_id] = $obj;
    }

    if( $deep && !self::$_maps[$map_id]->count_markers() ) cggm_marker_operations::load_markers_for_map(self::$_maps[$map_id]);
    return self::$_maps[$map_id];
  }


  public static function load_by_name($map_name,$deep = false)
  {
    if( (int)$map_name > 0 ) return self::load_by_id($map_name,$deep);

    $db = cmsms()->GetDb();
    if( !is_array(self::$_map_name_map) ) {
      $query = 'SELECT map_id,name FROM '.cms_db_prefix().'module_cggooglemaps';
      $tmp = $db->GetArray($query);
      if( !is_array($tmp) || count($tmp) == 0 ) return;
      self::$_map_name_map = cge_array::to_hash($tmp,'name');
    }

    if( !isset(self::$_map_name_map[$map_name]) ) return;
    $id = self::$_map_name_map[$map_name]['map_id'];
    return self::load_by_id($id,$deep);
  }


  public static function delete(cggm_map& $map)
  {
    $db = cmsms()->GetDb();
    $map_id = $map->get_id();

    $query = 'DELETE FROM '.cms_db_prefix().'module_cggooglemaps_points WHERE map_id = ?';
    $db->Execute($query,array($map_id));
    if( !$row ) return FALSE;

    $query = 'DELETE FROM '.cms_db_prefix().'module_cggooglemaps WHERE map_id = ?';
    $db->Execute($query,array($map_id));
    if( !$row ) return FALSE;

    $this->DeleteTemplate('maptemplate_'.$map_id);
    $this->DeleteTemplate('mapsidebar_'.$map_id);
    $this->DeleteTemplate('mapcategory_'.$map_id);
    $this->DeleteTemplate('mapdirform_'.$map_id);
    $this->DeleteTemplate('mapbaloon_'.$map_id);
    self::$_maps = null;
    self::$_map_name_map = null;
    return TRUE;
  }


  public static function insert(cggm_map& $map,$deep = true)
  {
    $query = 'INSERT '.cms_db_prefix().'module_cggooglemaps (name,owner_id,data) VALUES (?,?,?)';

    $db = cmsms()->GetDb();
    $dbr = $db->Execute($query,self::map_to_row($map));
    if( !$dbr ) die($db->sql.'<br/>'.$db->ErrorMsg());
    if( !$dbr ) return FALSE;
    $map_id = $db->Insert_Id();
    $map->set_id($map_id);
    if( $deep ) {
      for( $i = 0; $i < $map->count_markers(); $i++ ) {
	$marker = $map->get_marker_by_idx($i);
	$marker->set_map_id($map_id);
	cggm_marker_operations::insert($marker);
      }
    }

    $mod = cge_utils::get_module('CGGoogleMaps');
    $tmp = $map->get_map_template(true);
    if( $tmp ) $mod->SetTemplate('maptemplate_'.$map->get_id(),$tmp);
    $tmp = $map->get_js_template(true);
    if( $tmp ) $mod->SetTemplate('mapjs_'.$map->get_id(),$tmp);
    $tmp = $map->get_sidebar_template(true);
    if( $tmp ) $mod->SetTemplate('mapsidebar_'.$map->get_id(),$tmp);
    $tmp = $map->get_category_template(true);
    if( $tmp ) $mod->SetTemplate('mapcategory_'.$map->get_id(),$tmp);
    $tmp = $map->get_dirform_template(true);
    if( $tmp ) $mod->SetTemplate('mapdirform_'.$map->get_id(),$tmp);

    $tmp = $map->get_baloon_template(true);
    if( $tmp ) $mod->SetTemplate('mapbaloon_'.$map->get_id(),$tmp);
    self::$_maps = null;
    self::$_map_name_map = null;
    return TRUE;
  }


  public static function update(cggm_map& $map,$deep = true)
  {
    $query = 'UPDATE '.cms_db_prefix().'module_cggooglemaps
              SET name = ?, owner_id = ?, data = ?
              WHERE map_id = ?';
    $db = cmsms()->GetDb();
    $tmp = self::map_to_row($map);
    $tmp[] = $map->get_id();
    $dbr = $db->Execute($query,$tmp);
    if( !$dbr ) return FALSE;
    if( $deep ) {
      for( $i = 0; $i < $map->count_markers(); $i++ ) {
	$marker = $map->get_marker_by_idx($i);
	$marker->set_map_id($map_id);
	cggm_marker_operations::update($marker);
      }
    }

    $mod = cge_utils::get_module('CGGoogleMaps');
    $tmp = $map->get_map_template(true);
    if( $tmp ) $mod->SetTemplate('maptemplate_'.$map->get_id(),$tmp);
    $tmp = $map->get_js_template(true);
    if( $tmp ) $mod->SetTemplate('mapjs_'.$map->get_id(),$tmp);
    $tmp = $map->get_sidebar_template(true);
    if( $tmp ) $mod->SetTemplate('mapsidebar_'.$map->get_id(),$tmp);
    $tmp = $map->get_category_template(true);
    if( $tmp ) $mod->SetTemplate('mapcategory_'.$map->get_id(),$tmp);
    $tmp = $map->get_dirform_template(true);
    if( $tmp ) $mod->SetTemplate('mapdirform_'.$map->get_id(),$tmp);
    $tmp = $map->get_baloon_template(true);
    if( $tmp ) $mod->SetTemplate('mapbaloon_'.$map->get_id(),$tmp);
    self::$_maps = null;
    self::$_map_name_map = null;
    return TRUE;
  }

} // end of class

?>