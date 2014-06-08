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
if (!isset($gCms)) exit;

$db =& $gCms->GetDb();
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$dict = NewDataDictionary($db);

switch( $oldversion )
  {
  case '1.0':
  case '1.1':
    // Create the icons table
    $flds = "
        id I KEY AUTO,
        name C(20) NOT NULL,
        url  C(255) NOT NULL,
        anchor_x I,
        anchor_y I,
        info_anchor_x I,
        info_anchor_y I
        ";
    $sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cggooglemaps_icons", $flds, $taboptarray);
    $dict->ExecuteSQLArray($sqlarray);

    // Create some original icons
    $query = 'INSERT INTO '.cms_db_prefix().'module_cggooglemaps_icons (name,url, anchor_x, anchor_y) VALUES (?,?,?,?)';
    $path = dirname(__FILE__).'/icons/';
    $urlbase = 'modules/'.$this->GetName().'/icons/';
    $icons = get_matching_files($path,'png');
    foreach( $icons as $one )
      {
	$res = getimagesize($path.'/'.$one);
	if( $res !== FALSE )
	  {
	    $name = substr($one,0,strlen($one)-4);
	    $db->Execute($query,array($name,$urlbase.$one,(int)$res[0]/2,(int)$res[1]/2));
	  }
      }

    $this->SetPreference('default_marker','dd-end');


  case '1.2':
    $fn = cms_join_path(dirname(__FILE__),'templates','orig_map_template.tpl');
    if( file_exists( $fn ) )
      {
	$template = file_get_contents( $fn );
	$this->SetPreference(CGGM_PREF_NEWMAP_TEMPLATE,$template);
	$this->SetTemplate('map_Sample',$template);
	$this->SetPreference(CGGM_PREF_DFLTMAP_TEMPLATE,'Sample');
      }

  case '1.4':
  case '1.4.1':
  case '1.4.2':
  case '1.4.3':
  case '1.4.4':
  case '1.5':
  case '1.5.1':
  case '1.5.2':
    {
      $sqla = $dict->AddColumnSQL(cms_db_prefix().'module_cggooglemaps',
				  'combine_points I1, point_combine_fudge F, combined_icon C(100)');
      $dict->ExecuteSQLArray($sqla);

      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cggooglemaps", 
				      'category_panel I1');
      $dict->ExecuteSQLArray($sqlarray);

      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cggooglemaps_points", 
				      'categories X');
      $dict->ExecuteSQLArray($sqlarray);

      // categories
      $flds = "
        name C(100) KEY NOT NULL,
        desc X,
        icon C(100) NOT NULL
        ";
      $sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cggooglemaps_cats", $flds, $taboptarray);
      $dict->ExecuteSQLArray($sqlarray);
    }

  case '1.5.3':
  case '1.5.4':
  case '1.5.5':
  case '1.5.6':
  case '1.5.7':
  case '1.5.8':
  case '1.5.9':
    {
      // set some default templates.
      $map_template = '';
      $fn = cms_join_path(dirname(__FILE__),'templates','orig_map_template.tpl');
      if( file_exists( $fn ) )
	{
	  $map_template = file_get_contents( $fn );
	  $this->SetTemplate(CGGM_PREF_NEWMAP_TEMPLATE,$map_template);
	}

      $js_template = '';
      $fn = cms_join_path(dirname(__FILE__).'/templates/orig_js_template.tpl');
      if( file_exists( $fn ) )
	{
	  $js_template = file_get_contents($fn);
	  $this->SetTemplate(CGGM_NEWJS_TEMPLATE,$js_template);
	}

      $sidebar_template = '';
      $fn = cms_join_path(dirname(__FILE__).'/templates/orig_sidebar_template.tpl');
      if( file_exists( $fn ) )
	{
	  $sidebar_template = file_get_contents($fn);
	  $this->SetTemplate(CGGM_NEWSIDEBAR_TEMPLATE,$sidebar_template);
	}

      $category_template = '';
      $fn = cms_join_path(dirname(__FILE__).'/templates/orig_category_template.tpl');
      if( file_exists( $fn ) )
	{
	  $category_template = file_get_contents($fn);
	  $this->SetTemplate(CGGM_NEWCATEGORY_TEMPLATE,$category_template);
	}

      $dirform_template = '';
      $fn = cms_join_path(dirname(__FILE__).'/templates/orig_dirform_template.tpl');
      if( file_exists( $fn ) )
	{
	  $dirform_template = file_get_contents($fn);
	  $this->SetTemplate(CGGM_NEWDIRFORM_TEMPLATE,$dirform_template);
	}

      // get all the map rows
      $query = 'SELECT * FROM '.cms_db_prefix().'module_cggooglemaps';
      $rows = $db->GetArray($query);

      // create an array of map objects.
      $all_maps = '';
      if( is_array($rows) && count($rows) > 0 )
	{
	  $all_maps = array();
	  for( $i = 0; $i < count($rows); $i++ )
	    {
	      $row = $rows[$i];
	      $parms = array('id'=>$row['map_id'],
			     'nav_controls'=>$row['controls'],
			     'type_controls'=>$row['controls']);
	      $obj = cggm_map_operations::build_new_map($parms);
	      cggm_map_operations::update_from_formdata($obj,$row);
	      $all_maps[] = $obj;
	    }
	}

      // create the categories table.
      $flds = "
        id   I KEY AUTO,
        name C(100) NOT NULL,
        info X,
        icon C(100) NOT NULL
        ";
      $sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cggooglemaps_cats", $flds, $taboptarray);
      $dict->ExecuteSQLArray($sqlarray);

      // add a field to the map points table.
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix().'module_cggooglemaps_points','categories X');
      $dict->ExecuteSQLArray($sqlarray);

      // gotta drop a bunch of columns from the maps table
      $sqlarray = $dict->DropColumnSQL(cms_db_prefix().'module_cggooglemaps',
				       'description,center_lat,center_lon,type,width,height,controls,controls_size,type_controls,sidebar,'
				       .'directions,zoom,zoom_encompass,bounds_fudge,info_window,info_trigger,'
				       .'combine_points,point_combine_fudge,combined_icon');
      $dict->ExecuteSQLArray($sqlarray);

      // and add one
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix().'module_cggooglemaps','data X');
      $dict->ExecuteSQLArray($sqlarray);

      // and store our maps.
      if( is_array($all_maps) && count($all_maps) > 0 )
	{
	  for( $i = 0; $i < count($all_maps); $i++ )
	    {
	      $all_maps[$i]->save();
	    }
	}
    } // case.
  }

// EOF
?>
