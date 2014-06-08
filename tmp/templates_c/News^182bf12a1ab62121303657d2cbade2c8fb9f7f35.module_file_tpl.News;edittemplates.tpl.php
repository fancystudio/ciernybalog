<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:24
         compiled from "module_file_tpl:News;edittemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11857781665367d6a41558b6-06202873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '182bf12a1ab62121303657d2cbade2c8fb9f7f35' => 
    array (
      0 => 'module_file_tpl:News;edittemplates.tpl',
      1 => 1399309022,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '11857781665367d6a41558b6-06202873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nameprompt' => 0,
    'defaultprompt' => 0,
    'items' => 0,
    'entry' => 0,
    'newtemplatelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a41825b6_48478761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a41825b6_48478761')) {function content_5367d6a41825b6_48478761($_smarty_tpl) {?><div class="pageoverflow">
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
      <th width="75%"><?php echo $_smarty_tpl->tpl_vars['nameprompt']->value;?>
</th>
      <th><?php echo $_smarty_tpl->tpl_vars['defaultprompt']->value;?>
</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
   <tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->default;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
   </tr>
<?php } ?>
</table>
</div>
<div class="pageoverflow">
  <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['newtemplatelink']->value;?>
</p>
</div>
<?php }} ?>
