<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:24
         compiled from "module_file_tpl:News;customfieldstab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6812482935367d6a4053dd3-54557834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7dbe5564f99f7cd80695ccb8d1fd5581e2292d1' => 
    array (
      0 => 'module_file_tpl:News;customfieldstab.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '6812482935367d6a4053dd3-54557834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'itemcount' => 0,
    'fielddeftext' => 0,
    'typetext' => 0,
    'items' => 0,
    'rowclass' => 0,
    'entry' => 0,
    'addlink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a40a3fe8_81486681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a40a3fe8_81486681')) {function content_5367d6a40a3fe8_81486681($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/function.cycle.php';
?>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['fielddeftext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['typetext']->value;?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
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
	<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->type;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->uplink;?>
</td>
	                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->downlink;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
			<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['entry']->value->deletelink)===null||$tmp==='' ? '' : $tmp);?>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<?php }?>

<div class="pageoptions"><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p></div>
<?php }} ?>
