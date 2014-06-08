<?php

class cggm_map_generator
{
  private $_map;
  private $_defer;
  private $_api_ver = '3.s';

  private $_category_info;            // contains info about all defined categories.
  private $_categories;               // contains list of used category names.
  private $_markers = array();        // a list of all displayable marker objects (after combining points)
  private $_icon_names = array();     // a list of all used icons
  private $_icons = array();          // an array of use icon objects
  private $_sidebar_items = array();  // a list of all sidebar items
  private $_meta = array();           // calculated metadata
  private $_errors = array();         // errors
  private static $_instance = 0;      // instance generator.

  public function __construct(cggm_map& $map,$defer = false)
  {
    self::$_instance++;
    $this->_map = $map;
    $this->_defer = $defer;
  }

  public function get_errors()
  {
    if( !count($this->_errors) ) return;
    return $this->_errors;
  }

  private function _calc_coords_meta()
  {
    if( count($this->_markers) ==  0 ) return;
    if( isset($this->_meta['center_lat']) ) return;

    // calculate minimum/maximum lat/long
    $min_lat = 9999999.9;
    $min_lon = 9999999.9;
    $max_lat = -9999999.9;
    $max_lon = -9999999.9;
    foreach( $this->_markers as $marker_name => $marker ) {
      $min_lat = (float)min($marker->get_latitude(),$min_lat);
      $min_lon = (float)min($marker->get_longitude(),$min_lon);
      $max_lat = (float)max($marker->get_latitude(),$max_lat);
      $max_lon = (float)max($marker->get_longitude(),$max_lon);
    }
    // adjust min/max lat/long by bounds fudge
    $diff_lat = $max_lat - $min_lat;
    $diff_lon = $max_lon - $min_lon;
    $min_lat -= $diff_lat * (float)$this->_map->bounds_fudge;
    $min_lon -= $diff_lon * (float)$this->_map->bounds_fudge;
    $max_lat += $diff_lat * (float)$this->_map->bounds_fudge;
    $max_lon += $diff_lon * (float)$this->_map->bounds_fudge;

    // calculate the center.
    $center_lat = $min_lat + ($max_lat - $min_lat) / 2.0;
    $center_lon = $min_lon + ($max_lon - $min_lon) / 2.0;

    $this->_meta['min_lat'] = (float)$min_lat;
    $this->_meta['min_lon'] = (float)$min_lon;
    $this->_meta['max_lat'] = (float)$max_lat;
    $this->_meta['max_lon'] = (float)$max_lon;
    $this->_meta['center_lat'] = (float)$center_lat;
    $this->_meta['center_lon'] = (float)$center_lon;
  }

  private function _get_category_info()
  {
    if( is_null($this->_category_info) ) {
      $this->_category_info = '';

      $db = cmsms()->GetDb();
      $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_cats ORDER BY name';
      $tmp = $db->GetArray($query);
      if( $tmp ) $this->_category_info = cge_array::to_hash($tmp,'name');
    }
  }

  private function _get_category_icon($category)
  {
    $this->_get_category_info();
    if( is_array($this->_category_info) && isset($this->_category_info[$category]) ) {
      return $this->_category_info[$category]['icon'];
    }
  }

  protected function prepare_markers()
  {
    $map = $this->_map;
    $mod = cge_utils::get_module('CGGoogleMaps');
    $this->_markers = array();
    $input_names = $map->get_marker_names();
    if( !$input_names ) return;
    foreach( $input_names as $marker_name ) {
      // get the marker.
      $marker = $map->get_marker_by_name($marker_name);

      // make sure it has an icon
      {
	$cats = $marker->get_categories(true);
	if( is_array($cats) ) {
	  $cat = $cats[0];
	  $icon = $this->_get_category_icon($cat);
	  if( $icon ) $marker->set_icon($icon);
	}
      }
      if( $marker->get_icon() == '' || $marker->get_icon() == -1 ) $marker->set_icon($map->default_icon);

      // grab a lat/long for this marker if necessary.
      if( $marker->get_latitude() == '' || $marker->get_longitude() == '' ) {
	$coords = cggm_address_lookup::lookup($marker->get_address());
	if( !$coords ) {
	  // this point has to be skipped
	  $this->_errors[] = $mod->Lang('marker_skipped',$marker->get_title());
	  continue;
	}
	$marker->set_coords($coords[0],$coords[1]);
      }

      // add item to sidebar
      if( $map->sidebar ) {
	$marker->alias = $marker_name;
	$this->_sidebar_items[$marker_name] = $marker;
      }

      // handle combined points
      if( $map->combine_points && $map->point_combine_fudge > 0.000 ) {
	$merged = false;
	foreach( $this->_markers as $m_name => &$m_info ) {
	  $box_toplat = $m_info->get_latitude() - $map->point_combine_fudge;
	  $box_toplon = $m_info->get_longitude() - $map->point_combine_fudge;
	  $box_botlat = $m_info->get_latitude() + $map->point_combine_fudge;
	  $box_botlon = $m_info->get_longitude() + $map->point_combine_fudge;
	  if( $marker->get_latitude() >= $box_toplat && $marker->get_latitude() <= $box_botlat &&
	      $marker->get_longitude() >= $box_toplon && $marker->get_longitude() <= $box_botlon ) {
	    // gotta combine this marker with an existing one.
	    if( !$m_info instanceof cggm_meta_marker ) {
	      $m_info = new cggm_meta_marker($m_info,$map->combined_icon);
	      $m_info->set_title($mod->Lang('title_combined_marker'));
	    }
	    $m_info->add_marker($marker);
	    // done merging;
	    $merged = true;
	    break;
	  }
	}
	if( $merged ) {
	  // done merging;
	  continue;
	}
      }

      $this->_markers[$marker_name] = $marker;
    }
  }

  protected function prepare_categories()
  {
    if( !count($this->_markers) ) return;
    if( !$this->_map->category_panel ) return;

    $this->_get_category_info();
    $this->_categories = array();
    foreach( $this->_markers as &$marker ) {
      $cats = $marker->get_categories(true);
      if( !is_array($cats) ) continue;
      foreach($cats as $one) {
	if( !in_array($one,$this->_categories) ) $this->_categories[] = $one;
      }
    }
  }

  protected function prepare_icon_names()
  {
    if( !count($this->_markers) ) return;

    foreach( $this->_markers as &$marker ) {
      // first select the marker to use.
      $icon_name = $marker->get_icon();
      if( $this->_map->icon_selection == 'use_category' && $marker->count_categories() > 0 ) {
	$cats = $marker->get_categories(true);
	$category = $cats[0];
	$tmp = $this->_get_category_icon($category);
	if( $tmp ) $icon_name = $tmp;
      }

      // then make sure it's in our list.
      if( !in_array($icon_name,$this->_icon_names) ) $this->_icon_names[] = $icon_name;
    }

    if( count($this->_categories) ) {
      foreach( $this->_categories as $one ) {
	if( isset($this->_category_info[$one]) ) {
	  if( !in_array($one,$this->_icon_names) ) {
	    $this->_icon_names[] = $this->_category_info[$one]['icon'];
	  }
	}
      }
    }
  }

  protected function generate_header()
  {
    static $header_generated;
    if( $header_generated == 0 ) {
      $header_generated = 1;
      $defertxt='';
      if( $this->_defer ) $defertxt = ' defer="defer"';
      $url = 'http://maps.google.com/maps/api/js';

      $args = array();
      $sensor = 'false';
      if( $this->_map->sensor ) $sensor = 'true';
      $args['sensor'] = $sensor;
      $args['libraries'] = 'geometry'; // would be nice to have an option for this.

      $url .= '?' . cge_array::implode_with_key($args);

      $tpl = '<script src="%s" type="text/javascript" charset="utf-8"%s></script>';
      return sprintf($tpl,$url,$defertxt);
    }
  }

  protected function generate_sidebar_html()
  {
    if( !count($this->_sidebar_items) ) return;
    $map = $this->_map;
    $mod = cge_utils::get_module('CGGoogleMaps');

    $template_name = $map->get_sidebar_template_name();
    if( !$template_name ) {
      $this->_errors[] = error_lang('error_sidebar_template_name');
      return;
    }

    $smarty = cmsms()->GetSmarty();
    $smarty->assign('sidebar_items',$this->_sidebar_items);
    $output = $mod->ProcessTemplateFromDatabase($template_name);
    return $output;
  }

  protected function generate_marker_html()
  {
    $map = $this->_map;
    $mod = cge_utils::get_module('CGGoogleMaps');

    $txt = '';
    $txt .= '<div id="cggm_map_data_'.self::$_instance.'" style="display: none;">'."\n";
    $txt .= '<div class="cggm_map_markers" style="display: none;">'."\n";
    foreach( $this->_markers as $marker_name => $marker ) {
      $tmp = '<div class="cggm_marker" id="map_'.self::$_instance.'_marker_'.$marker_name.'">'."\n";
      $tmp .= '<input type="hidden" name="name" value="'.$marker_name.'"/>'."\n";
      $tmp .= '<input type="hidden" name="title" value="'.cms_htmlentities($marker->get_title()).'"/>'."\n";
      $tmp .= '<input type="hidden" name="latitude" value="'.number_format($marker->get_latitude(),6,'.','').'"/>'."\n";
      $tmp .= '<input type="hidden" name="longitude" value="'.number_format($marker->get_longitude(),6,'.','').'"/>'."\n";
      $tmp .= '<input type="hidden" name="icon" value="'.$marker->get_icon().'"/>'."\n";
      $tmp .= '<input type="hidden" name="categories" value="'.$marker->get_categories().'"/>'."\n";

      $description = '';
      if( $marker instanceof cggm_meta_marker ) {
	$tmp .= '<input type="hidden" name="meta" value="1"/>'."\n";
	for( $i = 0; $i < $marker->count_markers(); $i++ ) {
	  $tmpm = $marker->get_marker($i);
	  $description .= '<div class="cggm_infowindow_item">'.$tmpm->get_description();
	  $description .= '<input type="hidden" name="categories" value="'.$tmpm->get_categories().'"/>';
	  $description .= '</div>'."\n";
	}
      }
      else {
	$tmp .= '<input type="hidden" name="meta" value="0"/>'."\n";
	$description .= '<div class="cggm_infowindow_item">'.$marker->get_description().'</div>'."\n";
      }

      $smarty = cmsms()->GetSmarty();
      if( $map->directions ) {
	$smarty->assign('marker_name',$marker_name);
	$smarty->assign('marker',$marker);
	$description .= $mod->ProcessTemplateFromDatabase($this->_map->get_dirform_template_name());
      }

      if( $map->sv_controls ) { }

      $tmp .= '<div class="cggm_infowindow_contents">'."\n";
      $tmp .= '<div class="cggm_infowindow" id="cggm_map_infowindow_'.self::$_instance.'_'.$marker_name.'">'."\n".$description.'</div>'."\n";
      $tmp .= "</div><!-- cggm_infowindow_contents -->\n";
      $tmp .= "</div><!-- cggm_marker -->\n"; // close marker tag.
      $txt .= $tmp;
    }

    $txt .= "</div><!-- cggm_map_markers -->\n"; // close markers tag
    $txt .= "</div><!-- cggm_map_data -->\n"; // close data tag
    $txt .= '<div id="cggm_infowindow_'.self::$_instance.'" style="position: absolute; left: -1000px;"></div>'."\n";
    return $txt;
  }

  protected function generate_category_html()
  {
    if( !count($this->_categories) ) return;
    $map = $this->_map;
    $mod = cge_utils::get_module('CGGoogleMaps');

    $template_name = $map->get_category_template_name();
    if( !$template_name ) {
      $this->_errors[] = error_lang('error_category_template_name');
      return;
    }

    $smarty = cmsms()->GetSmarty();
    $smarty->assign('map_category_names',$this->_categories);
    $smarty->assign('map_categories',$this->_category_info);
    $output = $mod->ProcessTemplateFromDatabase($template_name);
    return $output;
  }

  protected function generate_icons()
  {
    $db = cmsms()->GetDb();
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps_icons';
    $tmp = $db->GetArray($query);
    if( is_array($tmp) ) $tmp = cge_array::to_hash($tmp,'name');
    return $tmp;
  }

  protected function generate_map_data()
  {
    $defertxt = '';
    $mod = cge_utils::get_module('CGGoogleMaps');
    if( $this->_defer ) $defertxt = ' defer="defer"';
    $smarty = cmsms()->GetSmarty();
    $smarty->assign('map_defertxt',$defertxt);
    $smarty->assign('msg_browser_incompatible',$mod->Lang('error_browser_incompatible'));
    $smarty->assign('msg_mapelem_notfound',$mod->Lang('error_mapelem_notfound'));
    $smarty->assign('map_elem','map_'.self::$_instance);
    $kml_files = $this->_map->get_kml_files();
    if( is_array($kml_files) && count($kml_files) ) {
      $smarty->assign('kml_files',$kml_files);
    } else {
      $smarty->assign('kml_files','');
    }

    $template = $this->_map->get_js_template_name();
    if( $template ) {
      $output = $mod->ProcessTemplateFromDatabase($template);
      return $output;
    }
  }

  protected function generate_map()
  {
    $template = $this->_map->get_map_template_name();
    if( $template ) {
      $mod = cge_utils::get_module('CGGoogleMaps');
      $output = $mod->ProcessTemplateFromDatabase($template);
      return $output;
    }
  }

  public function generate()
  {
    $map = $this->_map;
    $smarty = cmsms()->GetSmarty();
    $smarty->assign('map',$this->_map);
    $smarty->assign('mapinstance',self::$_instance);
    $smarty->assign('generator',$this);

    $output = $this->generate_header();
    $smarty->assign('map_header',$output);

    // parse through the markers, cleaning up icons if necessary.
    $this->prepare_markers();

    // generate a list of the used category names.
    $this->prepare_categories();

    $this->prepare_icon_names();
    $mod = cge_utils::get_module('CGGoogleMaps');
    $smarty->assign('icon_base_url',$mod->GetModuleURLPath().'/icons');

    // add icon data to smarty.
    $output = $this->generate_icons();
    if( $output && is_array($output) ) $smarty->assign('icons',$output);

    if( count($this->_markers) ) {
      // add the marker data to the dom.
      $output = $this->generate_marker_html();
      if( $output ) $smarty->assign('map_marker_data',$output);
    }

    if( count($this->_markers) && $map->sidebar ) {
      // generate sidebar html
      $output = $this->generate_sidebar_html();
      if( $output ) $smarty->assign('map_sidebar',$output);
    }

    if( count($this->_markers) && $map->category_panel ) {
      $output = $this->generate_category_html();
      if( $output ) $smarty->assign('map_categories',$output);
    }

    // generate the map data
    $output = $this->generate_map_data();
    if( $output ) $smarty->assign('map_data',$output);

    // and put it all together
    $output = $this->generate_map();
    return $output;
  }

  public function get_marker_count()
  {
    return count($this->_markers);
  }

  public function get_center_lat()
  {
    if( $this->_map->center_lat != '' ) return $this->_map->center_lat;

    $this->_calc_coords_meta();
    $val = 0;
    if( isset($this->_meta['center_lat']) ) $val = $this->_meta['center_lat'];
    return number_format($val,6,'.',',');
  }

  public function get_center_lon()
  {
    if( $this->_map->center_lon != '' ) return $this->_map->center_lon;

    $this->_calc_coords_meta();
    $val = 0;
    if( isset($this->_meta['center_lon']) ) $val = $this->_meta['center_lon'];
    return number_format($val,6,'.',',');
  }

  public function get_min_lat()
  {
    $this->_calc_coords_meta();
    return number_format($this->_meta['min_lat'],6,'.',',');
  }

  public function get_min_lon()
  {
    $this->_calc_coords_meta();
    return number_format($this->_meta['min_lon'],6,'.',',');
  }

  public function get_max_lat()
  {
    $this->_calc_coords_meta();
    return number_format($this->_meta['max_lat'],6,'.',',');
  }

  public function get_max_lon()
  {
    $this->_calc_coords_meta();
    return number_format($this->_meta['max_lon'],6,'.',',');
  }

  public function get_google_maptype()
  {
    switch($this->_map->type) {
    case 'map':
      return 'ROADMAP';
      break;
    case 'satellite':
    case 'terrain':
    case 'hybrid':
      return strtoupper($this->_map->type);
    }
  }
} // end of class
?>