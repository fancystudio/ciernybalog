<?php
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Modify Site Preferences') ) return;

$this->SetCurrentTab('categories');
if( isset($params['catid']) )
  {
    $res = cggm_category_operations::delete($params['catid']);
    if( !$res )
      {
	$this->SetError($this->Lang('error_deletecategory'));
      }
    else
      {
	$this->SetMessage($this->Lang('msg_categorydeleted'));
      }
  }

$this->RedirectToTab();
?>