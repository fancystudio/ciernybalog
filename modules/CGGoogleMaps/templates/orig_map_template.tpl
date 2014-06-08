{* map template *}
<div id="cggm_map_defn_{$mapinstance}">
{$map_header|default:''}{$map_marker_data|default:''}

{assign var='cols' value=1}
<table class="pagetable">
 <tr>
   {* optional sidebar on the left *}
   {if isset($map_sidebar)}
   {assign var='cols' value=$cols+1}
   <td width="20" valign="top">
     {$map_sidebar}
   </td>
   {/if}

   {* map in the center *}
   <td>
   <div id="cggm_map_display_{$mapinstance}" style="width: {$map->width}px; height: {$map->height}px;">{* the map will go here *}</div>
   {if $map->sv_controls}
   <div id="cggm_sv_display_{$mapinstance}" style="width: {$map->width}px; height: {$map->height}px; display: none;">{* the streetview will go here *}</div>
   {/if}
   </td>

   {if $map->directions_dest == 'PANEL'}
   {* directions on the right *}
   {assign var='cols' value=$cols+1}
   <td>
     <div id="map_directions_{$mapinstance}" style="display: none;">
       <input type="button" name="hide_directions" value="{$mod->Lang('hide_directions')}"/><br/>
     </div>
   </td>
   {/if}
 </tr>

 {* optional categories *}
 {if isset($map_categories)}
 <tr>
   <td colspan="{$cols}">
     {$map_categories}
   </td>
 </tr>
 {/if}
</table>

{$map_data}
</div>
