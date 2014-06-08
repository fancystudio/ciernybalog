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
if( !isset($gCms) ) exit;

echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGGM_PREF_NEWMAP_TEMPLATE,
				   'defaultadmin','default_templates',
				   $this->Lang('info_sysdflt_map_template'),
				   'orig_map_template.tpl',
				   $this->Lang('info_sysdflt_template'));


echo '<div style="text-align: center; border-top: 1px dashed black; margin-bottom: 1em; width: 70%;"></div>';

echo cge_template_admin::get_start_template_form($this,$id,$returnid,
						 CGGM_NEWBALOON_TEMPLATE,
						 'defaultadmin','default_templates',
						 $this->Lang('info_sysdflt_baloon_template'),
						 'orig_baloon_template.tpl',
						 $this->Lang('info_sysdflt_template'));

echo '<div style="text-align: center; border-top: 1px dashed black; margin-bottom: 1em; width: 70%;"></div>';

echo cge_template_admin::get_start_template_form($this,$id,$returnid,
						 CGGM_NEWJS_TEMPLATE,
						 'defaultadmin','default_templates',
						 $this->Lang('info_sysdflt_js_template'),
						 'orig_js_template.tpl',
						 $this->Lang('info_sysdflt_template'));

echo '<div style="text-align: center; border-top: 1px dashed black; margin-bottom: 1em; width: 70%;"></div>';

echo cge_template_admin::get_start_template_form($this,$id,$returnid,
						 CGGM_NEWSIDEBAR_TEMPLATE,
						 'defaultadmin','default_templates',
						 $this->Lang('info_sysdflt_sidebar_template'),
						 'orig_sidebar_template.tpl',
						 $this->Lang('info_sysdflt_template'));

echo '<div style="text-align: center; border-top: 1px dashed black; margin-bottom: 1em; width: 70%;"></div>';

echo cge_template_admin::get_start_template_form($this,$id,$returnid,
						 CGGM_NEWCATEGORY_TEMPLATE,
						 'defaultadmin','default_templates',
						 $this->Lang('info_sysdflt_category_template'),
						 'orig_category_template.tpl',
						 $this->Lang('info_sysdflt_template'));

echo '<div style="text-align: center; border-top: 1px dashed black; margin-bottom: 1em; width: 70%;"></div>';

echo cge_template_admin::get_start_template_form($this,$id,$returnid,
						 CGGM_NEWDIRFORM_TEMPLATE,
						 'defaultadmin','default_templates',
						 $this->Lang('info_sysdflt_dirform_template'),
						 'orig_dirform_template.tpl',
						 $this->Lang('info_sysdflt_template'));

// EOF
?>