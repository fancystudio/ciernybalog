<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:52:59
         compiled from "module_file_tpl:MenuManager;edittemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273718719538211dbe5a0b8-28258676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6329d39a20692efd3b3fce861052c3ac785448f' => 
    array (
      0 => 'module_file_tpl:MenuManager;edittemplate.tpl',
      1 => 1399309022,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '273718719538211dbe5a0b8-28258676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errormsg' => 0,
    'startform' => 0,
    'hidden' => 0,
    'submit' => 0,
    'cancel' => 0,
    'apply' => 0,
    'newtemplate' => 0,
    'inputname' => 0,
    'content' => 0,
    'inputcontent' => 0,
    'endform' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538211dbe99847_89671897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538211dbe99847_89671897')) {function content_538211dbe99847_89671897($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['errormsg']->value)&&$_smarty_tpl->tpl_vars['errormsg']->value!='') {?>
	<div class="pageerror"><?php echo $_smarty_tpl->tpl_vars['errormsg']->value;?>
</div>
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
<?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
<?php echo $_smarty_tpl->tpl_vars['cancel']->value;?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['apply']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $_smarty_tpl->tpl_vars['newtemplate']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['inputname']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['inputcontent']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
<?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
<?php echo $_smarty_tpl->tpl_vars['cancel']->value;?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['apply']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
	</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;?>

<?php }} ?>
