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

$data = $this->GetIconsFull();
$default_icon = $this->GetPreference('default_marker');

foreach( $data as $name => &$row ) {
  if( $row['name'] != $default_icon ) {
    $row['default_url'] = $this->CreateURL($id,'admin_makeicondefault', $returnid, array('icon'=>$row['id']));
  }
  $row['delete_url'] = $this->CreateURL($id,'admin_delete_icon', $returnid, array('icon'=>$row['id']));
  $row['edit_url'] = $this->CreateURL($id,'admin_edit_icon', $returnid, array('icon'=>$row['id']));
}

$smarty->assign('icons',$data);

echo $this->ProcessTemplate('admin_icons_tab.tpl');

// EOF
?>