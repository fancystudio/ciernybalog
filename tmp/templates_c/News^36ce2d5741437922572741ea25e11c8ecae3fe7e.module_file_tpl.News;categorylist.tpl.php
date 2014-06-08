<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:23
         compiled from "module_file_tpl:News;categorylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14397689765367d6a3e91070-54534878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ce2d5741437922572741ea25e11c8ecae3fe7e' => 
    array (
      0 => 'module_file_tpl:News;categorylist.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '14397689765367d6a3e91070-54534878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'itemcount' => 0,
    'categorytext' => 0,
    'items' => 0,
    'entry' => 0,
    'addlink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a3eba5d8_46398277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a3eba5d8_46398277')) {function content_5367d6a3eba5d8_46398277($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['categorytext']->value;?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<?php }?>

<div class="pageoptions"><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p></div>
<?php }} ?>
