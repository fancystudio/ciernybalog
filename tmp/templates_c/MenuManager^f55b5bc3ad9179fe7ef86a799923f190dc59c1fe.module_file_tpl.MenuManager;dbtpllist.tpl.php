<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:52:55
         compiled from "module_file_tpl:MenuManager;dbtpllist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1019158399538211d7300346-97876902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f55b5bc3ad9179fe7ef86a799923f190dc59c1fe' => 
    array (
      0 => 'module_file_tpl:MenuManager;dbtpllist.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '1019158399538211d7300346-97876902',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'itemcount' => 0,
    'addlink' => 0,
    'templatetext' => 0,
    'usagetext' => 0,
    'defaulttext' => 0,
    'cachabletext' => 0,
    'importtext' => 0,
    'edittext' => 0,
    'deletetext' => 0,
    'items' => 0,
    'rowclass' => 0,
    'entry' => 0,
    'readonlytext' => 0,
    'default_template' => 0,
    'yesimg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538211d73d8314_73101346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538211d73d8314_73101346')) {function content_538211d73d8314_73101346($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/function.cycle.php';
?><?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
<div class="pageoptions">
	<p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p>
</div>

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['templatetext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['usagetext']->value;?>
</th>
			<th align="center" class="pageicon"><?php echo $_smarty_tpl->tpl_vars['defaulttext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['cachabletext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['importtext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['edittext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['deletetext']->value;?>
</th>
		</tr>
	</thead>
	<tbody>
	<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
                <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>"rowclass"),$_smarty_tpl);?>

		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->templatelink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->templatelink;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['entry']->value->templatename;?>
&nbsp;<em>(<?php echo $_smarty_tpl->tpl_vars['readonlytext']->value;?>
)</em><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['entry']->value->templatename==$_smarty_tpl->tpl_vars['default_template']->value) {?>{menu}<?php } else { ?>{menu template="<?php echo $_smarty_tpl->tpl_vars['entry']->value->templatename;?>
"}<?php }?></td>
			<td align="center">
                          <?php if ($_smarty_tpl->tpl_vars['entry']->value->templatename==$_smarty_tpl->tpl_vars['default_template']->value) {?>
			    <?php echo $_smarty_tpl->tpl_vars['yesimg']->value;?>

                          <?php } elseif (isset($_smarty_tpl->tpl_vars['entry']->value->setdefault_link)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['entry']->value->setdefault_link;?>

 			  <?php }?>
                        </td>
            <td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->setcachable_link)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->setcachable_link;?>
<?php }?></td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->importlink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->importlink;?>
<?php }?></td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->editlink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
<?php }?></td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->deletelink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
<?php }?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php }?>
<div class="pageoptions">
	<p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p>


<?php }} ?>
