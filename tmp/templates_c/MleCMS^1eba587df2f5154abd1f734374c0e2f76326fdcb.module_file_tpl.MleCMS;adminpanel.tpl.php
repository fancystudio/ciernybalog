<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:45
         compiled from "module_file_tpl:MleCMS;adminpanel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:634011748538210a1cd93e2-52450206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eba587df2f5154abd1f734374c0e2f76326fdcb' => 
    array (
      0 => 'module_file_tpl:MleCMS;adminpanel.tpl',
      1 => 1399309022,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '634011748538210a1cd93e2-52450206',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title_section' => 0,
    'snippets' => 0,
    'title' => 0,
    'title_tag' => 0,
    'entry' => 0,
    'addSnippetIcon' => 0,
    'addSnippetLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a1d278c0_24831940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a1d278c0_24831940')) {function content_538210a1d278c0_24831940($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['title_section']->value)) {?>}<h3><?php echo $_smarty_tpl->tpl_vars['title_section']->value;?>
</h3><?php }?>

<?php if (count($_smarty_tpl->tpl_vars['snippets']->value)>0) {?>
<table cellspacing="0" class="pagetable">
   <thead>
      <tr>
         <th><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</th>
		 <th><?php echo $_smarty_tpl->tpl_vars['title_tag']->value;?>
</th>
         <th class="pageicon" style="width:20px"> </th>
         <th class="pageicon" style="width:20px"> </th>
      </tr>
   </thead>
   <tbody>
<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['snippets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
';">
		   <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->edit;?>
</td>
		   <td>{MleCMS name="<?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
"}</td>
		   <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
		   <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<?php }?>


<div class="pageoptions">
	<p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addSnippetIcon']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['addSnippetLink']->value;?>
</p>
</div>

<?php }} ?>
