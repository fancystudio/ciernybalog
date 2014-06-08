<?php

class cggm_category
{
  private $_id;
  private $_name;
  private $_icon;
  private $_info;

  public function __construct($name = '')
  {
    $this->_name = $name;
    $mod = cge_utils::get_module('CGGoogleMaps');
    $this->_icon = $mod->GetPreference('default_marker');
  }


  public function set_id($id)
  {
    $this->_id = $id;
  }


  public function get_id()
  {
    return $this->_id;
  }

  
  public function set_name($name)
  {
    $this->_name = $name;
  }


  public function get_name()
  {
    return $this->_name;
  }


  public function set_info($info)
  {
    $this->_info = $info;
  }


  public function get_info()
  {
    return $this->_info;
  }


  public function set_icon($icon)
  {
    $this->_icon = $icon;
  }


  public function get_icon()
  {
    return $this->_icon;
  }


  public function from_array($data)
  {
    if( isset($data['catid']) )
      {
	$this->set_id($data['catid']);
      }
    else
      {
	$this->set_id($data['id']);
      }
    $this->set_name($data['name']);
    $this->set_info($data['info']);
    $this->set_icon($data['icon']);
  }


  public function save()
  {
    if( !$this->get_id() )
      {
	return cggm_category_operations::insert($this);
      }
    else
      {
	return cggm_category_operations::update($this);
      }
  }
} // end of class
?>