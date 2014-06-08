<?php
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Modify Site Preferences') ) return;

$query = 'SELECT name,url FROM '.cms_db_prefix().'module_cggooglemaps_icons ORDER BY name';
$tmp = $db->GetArray($query);
$smarty->assign('iconsbyname',cge_array::to_hash($tmp,'name'));

$categories = cggm_category_operations::load_all_categories();
if( is_array($categories) ) {
  for( $i = 0; $i < count($categories); $i++ ) {
    $cat =& $categories[$i];
    $cat->edit_url = $this->CreateURL($id,'admin_add_category',$returnid, array('catid'=>$cat->get_id()));
    $cat->edit_link = $this->CreateImageLink($id,'admin_add_category',$returnid,
					     $this->Lang('edit'),'icons/system/edit.gif',
					     array('catid'=>$cat->get_id()));
    $cat->delete_link = $this->CreateImageLink($id,'admin_delete_category',$returnid,
					       $this->Lang('delete'),'icons/system/delete.gif',
					       array('catid'=>$cat->get_id()));
  }
  $smarty->assign('categories',$categories);
}

$smarty->assign('add_link',$this->CreateImageLink($id,'admin_add_category',$returnid,
						  $this->Lang('add_category'),
						  'icons/system/newobject.gif',array(),'','',false));
echo $this->ProcessTemplate('admin_categories_tab.tpl');

?>