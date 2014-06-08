<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:46
         compiled from "module_file_tpl:CGExtensions;listtemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1631739559538210a2148939-39878012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb424aff244dc08d7c24d695ffa2b7ce41249ba3' => 
    array (
      0 => 'module_file_tpl:CGExtensions;listtemplates.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '1631739559538210a2148939-39878012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nameprompt' => 0,
    'defaultprompt' => 0,
    'items' => 0,
    'rowclass' => 0,
    'entry' => 0,
    'newtemplatelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a2179257_71473226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a2179257_71473226')) {function content_538210a2179257_71473226($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/function.cycle.php';
?><div class="pageoverflow">
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
   <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

   <tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
';">
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
