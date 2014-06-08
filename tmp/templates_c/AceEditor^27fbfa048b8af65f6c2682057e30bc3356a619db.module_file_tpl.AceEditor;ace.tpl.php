<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:52:59
         compiled from "module_file_tpl:AceEditor;ace.tpl" */ ?>
<?php /*%%SmartyHeaderCode:340067413538211dbc00288-36627540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27fbfa048b8af65f6c2682057e30bc3356a619db' => 
    array (
      0 => 'module_file_tpl:AceEditor;ace.tpl',
      1 => 1399309022,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '340067413538211dbc00288-36627540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editorid' => 0,
    'textareaid' => 0,
    'ace_id' => 0,
    'AceEditor' => 0,
    'mode' => 0,
    'textareaname' => 0,
    'syntax_content' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538211dbe24806_04193217',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538211dbe24806_04193217')) {function content_538211dbe24806_04193217($_smarty_tpl) {?><div class="ace-wrapper" id="<?php echo $_smarty_tpl->tpl_vars['editorid']->value;?>
_screen"><div class="ace-ui-container"><div class="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_toolbar"><div class="ace-ui-toolbar cf"><div class="ace-toggle-editor ace-left"><input type="radio" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_on" class="ace-toggle ace-radio ace-toggle-left" name="radio_<?php echo $_smarty_tpl->tpl_vars['ace_id']->value;?>
" checked="checked" /><label class="ace-tooltip" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('highlighter_on');?>
" for="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_on"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('on');?>
</label><input type="radio" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_off" class="ace-toggle ace-radio ace-toggle-right" name="radio_<?php echo $_smarty_tpl->tpl_vars['ace_id']->value;?>
" /><label class="ace-tooltip" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('highlighter_off');?>
" for="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_off"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('off');?>
</label></div><div class="ace-info-divider">&nbsp;</div><div class="ace-find-line ace-text-input ace-left"><label class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('go_line');?>
:</label><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_goline" class="ace-input" name="ace_goline" value="" pattern="\d+" placeholder="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('go_line');?>
:" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('go_line');?>
:'" /><i aria-hidden="true" data-icon="&#xe00b;" class="ace-icon ace-line-search-icon"><span class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('go_line');?>
</span></i></div><div class="ace-info-divider">&nbsp;</div><div class="ace-search-string ace-text-input ace-left cf"><label class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_document');?>
:</label><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_search" class="ace-input" name="ace_search" value="" placeholder="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_document');?>
:" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_document');?>
:'" /><div class="ace-info-divider">&nbsp;</div><label class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('replace_with');?>
:</label><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_replace" class="ace-input ace-hidden" name="ace_replace" value="" placeholder="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('replace_with');?>
:" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('replace_with');?>
:'" /><ul class="ace-option-menu"><li><a href="#" aria-hidden="true" data-icon="&#xe00c;" class="ace-icon ace-option-icon ace-tooltip ace-toggle-menu" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_options');?>
"><span class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_options');?>
</span></a><ul id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_options" class="ace-list"><li data-ace-search-option="find" class="ace-selected"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_document');?>
</li><li data-ace-search-option="replace"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('replace_option');?>
</li><li data-ace-search-option="replaceAll"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('replaceall_option');?>
</li></ul></li><li><a href="#" aria-hidden="true" data-icon="&#xe00f;" class="ace-icon ace-option-icon ace-tooltip ace-toggle-menu" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_settings');?>
"><span class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_settings');?>
</span></a><ul id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_search_settings" class="ace-list"><li data-ace-search-option="reset" class="ace-selected"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('search_any');?>
</li><li data-ace-search-option="caseSensitive"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('case_sensitive');?>
</li><li data-ace-search-option="wholeWord"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('whole_word');?>
</li><li data-ace-search-option="regExp"><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('regexp');?>
</li></ul></li></ul></div><div class="ace-info-divider">&nbsp;</div><div class="ace-toggle-editor ace-left"><label class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('keybindings');?>
:</label><input type="radio" class="ace-toggle ace-radio ace-toggle-left" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_ace" name="radio2_<?php echo $_smarty_tpl->tpl_vars['ace_id']->value;?>
" checked="checked" value="null" /><label class="ace-tooltip" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('keybindings');?>
" for="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_ace"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('ace');?>
</label><input type="radio" class="ace-toggle ace-radio ace-toggle-middle" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_vim" name="radio2_<?php echo $_smarty_tpl->tpl_vars['ace_id']->value;?>
" value="vim" /><label class="ace-tooltip" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('keybindings');?>
" for="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_vim"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('vim');?>
</label><input type="radio" class="ace-toggle ace-radio ace-toggle-right" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_emacs" name="radio2_<?php echo $_smarty_tpl->tpl_vars['ace_id']->value;?>
" value="emacs" /><label class="ace-tooltip" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('keybindings');?>
" for="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_emacs"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('emacs');?>
</label></div><div class="ace-info-divider">&nbsp;</div><a href="#" id="<?php echo $_smarty_tpl->tpl_vars['editorid']->value;?>
_ace-fullscreen" class="ace-icon-expand ace-icon ace-fullscreen-button ace-right" title="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('full_screen');?>
"><span class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('full_screen');?>
</span></a></div></div><div class="ace-container">
            <textarea 
                id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
" 
                data-ace-editor-id="<?php echo $_smarty_tpl->tpl_vars['editorid']->value;?>
"
                data-ace-width="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('width','100');?>
"
                data-ace-width-units="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('width_units','%');?>
"
                data-ace-height="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('height','600');?>
"
                data-ace-auto-height="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('auto_height',0);?>
"
                data-ace-height-units="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('height_units','px');?>
"
                data-ace-selected-theme="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('theme','twilight');?>
"
                data-ace-selected-mode="<?php if (isset($_smarty_tpl->tpl_vars['mode']->value)&&!empty($_smarty_tpl->tpl_vars['mode']->value)) {?><?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('mode','html');?>
<?php }?>"
                data-ace-font-size="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('fontsize','13px');?>
"
                data-ace-tab-size="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('tab_size','4');?>
"
                data-ace-soft-wrap="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('soft_wrap','80');?>
"
                data-ace-selection-style="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('full_line',1);?>
"
                data-ace-highlight-line="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('highlight_active',1);?>
"
                data-ace-highlight-word="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('highlight_selected',1);?>
"
                data-ace-show-invisibles="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('show_invisibles',0);?>
"
                data-ace-hscroll-bar="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('persistent_hscroll',0);?>
"
                data-ace-show-gutter="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('show_gutter',1);?>
"
                data-ace-wrap-line="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('wrap_line',1);?>
"
                data-ace-soft-tab="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('soft_tab',1);?>
"
                data-ace-behaviours-enabled="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('enable_behaviors',1);?>
"
                data-ace-print-margin="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetPreference('print_margin',0);?>
"
                class="ace_editor_textarea" 
                name="<?php echo $_smarty_tpl->tpl_vars['textareaname']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['syntax_content']->value;?>
</textarea>
</div><div class="ace-ui-toolbar-bottom cf"><div class="ace-ui-bottom-left ace-left cf"><div class="ace-editor-cursor ace-editor-info-bottom ace-left" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_ace-editor-cursor">&nbsp;</div><div class="ace-info-divider">&nbsp;</div><div class="ace-editor-cursor ace-editor-info-bottom ace-left" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_ace-editor-linenum"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('total_lines');?>
: <span>&nbsp;</span></div><div class="ace-info-divider">&nbsp;</div><div class="ace-editor-token ace-editor-info-bottom ace-left" id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_ace-editor-token"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('current_token');?>
: <span>&nbsp;</span></div></div><div class="ace-ui-bottom-right ace-right cf"><ul class="ace-option-menu"><li><a aria-hidden="true" data-icon="&#xe010;" id="ace-editor-modes" class="ace-tooltip ace-tooltip-top-left ace-icon ace-option-icon ace-toggle-menu" href="#" data-tip="<?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('syntax_mode');?>
 "><span class="visuallyhidden"><?php echo $_smarty_tpl->tpl_vars['AceEditor']->value->Lang('syntax_mode');?>
</span></a><ul id="<?php echo $_smarty_tpl->tpl_vars['textareaid']->value;?>
_modes" class="ace-list cf"><?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AceEditor']->value->AceGetModes(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?><li data-ace-mode="<?php echo $_smarty_tpl->tpl_vars['value']->key;?>
"<?php if (isset($_smarty_tpl->tpl_vars['mode']->value)&&!empty($_smarty_tpl->tpl_vars['mode']->value)&&$_smarty_tpl->tpl_vars['mode']->value==$_smarty_tpl->tpl_vars['value']->key) {?> class="ace-selected"<?php }?>><i class="ace-icon-checkmark-circle"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li><?php } ?></ul></li></ul></div></div></div></div><?php }} ?>
