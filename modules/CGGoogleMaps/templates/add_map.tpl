{$formstart}{$hidden|default:''}
<h3>
{$mod->Lang('add_map')}
</h3>

<table>
<tr>
<td valign="top">
<br/>
<input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}" style="width: 6em;"/>
<br/>
{if $map->get_id() != '' }
<input type="submit" name="{$actionid}apply" value="{$mod->Lang('apply')}" style="width: 6em;"/>
<br/>
{/if}
<input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}" style="width: 6em;"/>
</td>
<td valign="top">
{$mod->StartTabHeaders()}
{$mod->SetTabHeader('settings',$mod->Lang('tab_settings'))}
{$mod->SetTabHeader('directions',$mod->Lang('tab_directions'))}
{$mod->SetTabHeader('advanced',$mod->Lang('tab_advanced'))}
{$mod->SetTabHeader('map_template',$mod->Lang('tab_maptemplate'))}
{$mod->SetTabHeader('js_template',$mod->Lang('tab_jstemplate'))}
{$mod->SetTabHeader('sidebar_template',$mod->Lang('sidebar_template'))}
{$mod->SetTabHeader('category_template',$mod->Lang('category_template'))}
{$mod->SetTabHeader('dirform_template',$mod->Lang('dirform_maptemplate'))}
{$mod->SetTabHeader('baloon_template',$mod->Lang('baloon_maptemplate'))}
{$mod->EndTabHeaders()}

{$mod->StartTabContent()}
{$mod->StartTab('settings')}
{$mod->ProcessTemplate('addmap_settings_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('directions')}
{$mod->ProcessTemplate('addmap_directions_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('advanced')}
{$mod->ProcessTemplate('addmap_advanced_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('js_template')}
{$mod->ProcessTemplate('addmap_js_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('map_template')}
{$mod->ProcessTemplate('addmap_map_template_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('sidebar_template')}
{$mod->ProcessTemplate('addmap_sidebar_template_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('category_template')}
{$mod->ProcessTemplate('addmap_category_template_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('dirform_template')}
{$mod->ProcessTemplate('addmap_dirform_template_tab.tpl')}
{$mod->EndTab()}

{$mod->StartTab('baloon_template')}
{$mod->ProcessTemplate('addmap_baloon_template_tab.tpl')}
{$mod->EndTab()}

{$mod->EndTabContent()}
</td>
</tr>
</table>
{$formend}