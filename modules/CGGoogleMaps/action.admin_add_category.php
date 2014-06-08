<?php
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Modify Site Preferences') ) return;

//
// initialize
//
$this->SetCurrentTab('categories');
$category = new cggm_category();
$error = '';
$message = '';
$catid = '';

//
// get data
//
if( isset($params['catid']) && $params['catid'] != '' )
  {
    $category = cggm_category_operations::load_by_id((int)$params['catid']);
  }


//
// handle form data
//
if( isset($params['cancel']) )
  {
    $this->RedirectToTab($id);
  }
else if( isset($params['submit']) )
  {
    $category->from_array($params);
    $tmp = cggm_category_operations::load_by_name($category->get_name());
    if( is_object($tmp) && $tmp->get_id() != $category->get_id() )
      {
	$error = $this->Lang('error_nameexists');
      }

    if( !$error )
      {
	$category->save();
	if( isset($params['catid']) )
	  {
	    $this->SetMessage($this->Lang('msg_categoryupdated'));
	  }
	else
	  {
	    $this->SetMessage($this->Lang('msg_categoryadded'));
	  }
	$this->RedirectToTab($id);
      }
  }

// 
// give everything to smarty
//
if( $error )
  {
    echo $this->ShowErrors($error);
  }

$query = 'SELECT name,url FROM '.cms_db_prefix().'module_cggooglemaps_icons ORDER BY name';
$tmp = $db->GetArray($query);
$iconsbyname = array();
foreach( $tmp as $row )
{
  $icons[$row['name']] = $row['name'];
  $iconsbyname[$row['name']] = $row['url'];
}
$smarty->assign('icons',$icons);
$smarty->assign('iconsbyname',$iconsbyname);
$smarty->assign('input_info',
		$this->CreateTextArea(true,$id,$category->get_info(),'info'));

$smarty->assign('category',$category);
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_add_category','',$params));
$smarty->assign('formend',$this->CreateFormEnd());

echo $this->ProcessTemplate('admin_add_category.tpl');

?>