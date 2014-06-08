<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:45
         compiled from "module_file_tpl:MleCMS;langs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34877722538210a1b52148-58090946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca88f2daecc940fdef14e5db3711ee0407908e82' => 
    array (
      0 => 'module_file_tpl:MleCMS;langs.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '34877722538210a1b52148-58090946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addlink' => 0,
    'itemcount' => 0,
    'mod' => 0,
    'items' => 0,
    'entry' => 0,
    'rowclass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a1c09d86_61110922',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a1c09d86_61110922')) {function content_538210a1c09d86_61110922($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/function.cycle.php';
?><div style="clear:both" class="pageoptions"><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p></div>
<?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
<table cellspacing="0"  class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('idtext');?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('name');?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('alias');?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('locale');?>
</th>
			<th class="pageicon" style="width:50px;"></th>
			<th class="pageicon" style="width:50px;"></th>
			<th class="pageicon" style="width:30px;"></th>
		</tr>
	</thead>
	<tbody>
<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
	<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

	<?php $_smarty_tpl->_capture_stack[0][] = array('default', "pay_type", null); ob_start(); ?>pay_types<?php echo $_smarty_tpl->tpl_vars['entry']->value->payment_type;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
';">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->title;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->alias;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->locale;?>
</td>
			<td>
                        <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->moveuplink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->moveuplink;?>
<?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->movedownlink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->movedownlink;?>
<?php }?>
                        </td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<div class="pageoptions"><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p></div>
<?php }?>
<?php }} ?>
