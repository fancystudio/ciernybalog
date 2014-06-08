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
if( !isset($gCms) ) exit();
if( !$this->CheckPermission('Manage Maps') ) return;
$this->SetCurrentTab('maps');

$map = new cggm_map;

if( isset($params['map_id'] ) ) $map = cggm_map_operations::load_by_id($params['map_id']);
if( isset($params['cancel']) ) $this->RedirectToTab($id);

if( isset($params['reset_map_template']) ) {
  cggm_map_operations::update_from_formdata($map,$params);
  $map->set_map_template($params['map_template']);
  $map->set_js_template($params['js_template']);
  $map->set_sidebar_template($params['sidebar_template']);
  $map->set_category_template($params['category_template']);
  $map->set_dirform_template($params['dirform_template']);

  $this->SetCurrentTab('map_template');
  $map->set_map_template($this->GetTemplate(CGGM_PREF_NEWMAP_TEMPLATE));
}
else if( isset($params['reset_js_template']) ) {
  cggm_map_operations::update_from_formdata($map,$params);
  $map->set_map_template($params['map_template']);
  $map->set_js_template($params['js_template']);
  $map->set_sidebar_template($params['sidebar_template']);
  $map->set_category_template($params['category_template']);
  $map->set_dirform_template($params['dirform_template']);

  $this->SetCurrentTab('js_template');
  $map->set_js_template($this->GetTemplate(CGGM_NEWJS_TEMPLATE));
}
else if( isset($params['reset_sidebar_template']) ) {
  cggm_map_operations::update_from_formdata($map,$params);
  $map->set_map_template($params['map_template']);
  $map->set_js_template($params['js_template']);
  $map->set_sidebar_template($params['sidebar_template']);
  $map->set_category_template($params['category_template']);
  $map->set_dirform_template($params['dirform_template']);

  $this->SetCurrentTab('sidebar_template');
  $map->set_sidebar_template($this->GetTemplate(CGGM_NEWSIDEBAR_TEMPLATE));
}
else if( isset($params['reset_category_template']) ) {
  cggm_map_operations::update_from_formdata($map,$params);
  $map->set_map_template($params['map_template']);
  $map->set_js_template($params['js_template']);
  $map->set_sidebar_template($params['sidebar_template']);
  $map->set_category_template($params['category_template']);
  $map->set_dirform_template($params['dirform_template']);

  $this->SetCurrentTab('category_template');
  $map->set_category_template($this->GetTemplate(CGGM_NEWCATEGORY_TEMPLATE));
}
else if( isset($params['reset_dirform_template']) ) {
    cggm_map_operations::update_from_formdata($map,$params);
    $map->set_map_template($params['map_template']);
    $map->set_js_template($params['js_template']);
    $map->set_sidebar_template($params['sidebar_template']);
    $map->set_category_template($params['category_template']);
    $map->set_dirform_template($params['dirform_template']);

    $this->SetCurrentTab('dirform_template');
    $map->set_dirform_template($this->GetTemplate(CGGM_NEWDIRFORM_TEMPLATE));
}
else if( isset($params['reset_baloon_template']) ) {
    cggm_map_operations::update_from_formdata($map,$params);
    $map->set_map_template($params['map_template']);
    $map->set_js_template($params['js_template']);
    $map->set_sidebar_template($params['sidebar_template']);
    $map->set_category_template($params['category_template']);
    $map->set_baloon_template($params['baloon_template']);

    $this->SetCurrentTab('baloon_template');
    $map->set_baloon_template($this->GetTemplate(CGGM_NEWBALOON_TEMPLATE));
 }
else if( isset($params['submit']) || isset($params['apply']) ) {
  cggm_map_operations::update_from_formdata($map,$params);
  $map->set_map_template($params['map_template']);
  $map->set_js_template($params['js_template']);
  $map->set_sidebar_template($params['sidebar_template']);
  $map->set_category_template($params['category_template']);
  $map->set_dirform_template($params['dirform_template']);
  $map->set_baloon_template($params['baloon_template']);

  // make sure that height, width, and name are specified
  if( $map->get_name() == '' || $map->height <= 0 || $map->width <= 0 ) {
    echo $this->ShowErrors($this->Lang('error_invalidparams'));
  }
  else {
    $res = $map->save();
    // todo, check for errors.
  }

  if( isset($params['submit']) ) {
    // redirect
    $this->RedirectToTab($id);
  }
}


//
// display the map form
//
$smarty->assign('map',$map);
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_add_map',$returnid));
if( isset($params['map_id']) )
  {
    $smarty->assign('hidden',$this->CreateInputHidden($id,'map_id',$params['map_id']));
  }
$smarty->assign('formend',$this->CreateFormEnd());

$smarty->assign('prompt_name',$this->Lang('map_name'));
$smarty->assign('input_name',$this->CreateInputText($id,'name',$map->get_name(),40,80));

$smarty->assign('input_description',$this->CreateTextArea(true,$id,$map->description,'description'));

$query = 'SELECT name,url FROM '.cms_db_prefix().'module_cggooglemaps_icons ORDER BY name';
$tmp = $db->GetArray($query);
$all_icons = array();
$iconsbyname = array();
for( $i = 0; $i < count($tmp); $i++ )
  {
    $row = $tmp[$i];
    $all_icons[$row['name']] = $row['url'];
    $iconsbyname[$row['name']] = $row['name'];
  }
$smarty->assign('iconsbyname',$iconsbyname);
$smarty->assign('all_icons',$all_icons);

$fields_main = array();
$fields_directions = array();
$fields_advanced = array();
foreach( $map->get_fields() as $key => $rec )
{
  $rec['value'] = $map->$key;
  if( isset($rec['tab']) && $rec['tab'] == 'advanced' )
    {
      $fields_advanced[$key] = $rec;
    }
  else if( isset($rec['tab']) && $rec['tab'] == 'directions' )
    {
      $fields_directions[$key] = $rec;
    }
  else
    {
      $fields_main[$key] = $rec;
    }
}

$smarty->assign('fields',$fields_main);
$smarty->assign('fields_advanced',$fields_advanced);
$smarty->assign('fields_directions',$fields_directions);

echo $this->ProcessTemplate('add_map.tpl');
// EOF
?>
