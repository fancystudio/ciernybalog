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

echo $this->StartTabHeaders();
if( $this->CheckPermission('Manage Maps') ||
    $this->CheckPermission('Manage Map Locations') )
  {
    echo $this->SetTabHeader('maps',$this->Lang('maps'));
  }
if( $this->CheckPermission('Modify Templates') )
  {
    echo $this->SetTabHeader('default_templates',$this->Lang('default_templates'));
  }
if( $this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->SetTabHeader('categories',$this->Lang('marker_categories'));
    echo $this->SetTabHeader('icons',$this->Lang('marker_icons'));
    echo $this->SetTabHeader('prefs',$this->Lang('preferences'));
  }
echo $this->EndTabHeaders();

echo $this->StartTabContent();
if( $this->CheckPermission('Manage Maps') ||
    $this->CheckPermission('Manage Map Locations') )
  {
    echo $this->StartTab('maps');
    include(dirname(__FILE__).'/function.admin_maps_tab.php');
    echo $this->EndTab();
  }
if( $this->CheckPermission('Modify Templates') )
  {
    echo $this->StartTab('default_templates');
    include(dirname(__FILE__).'/function.admin_default_templates_tab.php');
    echo $this->EndTab();
  }
if( $this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->StartTab('categories');
    include(dirname(__FILE__).'/function.admin_categories_tab.php');
    echo $this->EndTab();

    echo $this->StartTab('icons');
    include(dirname(__FILE__).'/function.admin_icons_tab.php');
    echo $this->EndTab();

    echo $this->StartTab('prefs');
    include(dirname(__FILE__).'/function.admin_prefs_tab.php');
    echo $this->EndTab();
  }
echo $this->EndTabContent();
// EOF
?>