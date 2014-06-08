<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:24
         compiled from "module_file_tpl:News;editdefaulttemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11282314685367d6a4336141-40307770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a351ca981c1b35ff42406257235e6c9f943d3a5' => 
    array (
      0 => 'module_file_tpl:News;editdefaulttemplate.tpl',
      1 => 1399309022,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '11282314685367d6a4336141-40307770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startform' => 0,
    'defaulttemplateform_title' => 0,
    'info_title' => 0,
    'prompt_template' => 0,
    'input_template' => 0,
    'submit' => 0,
    'reset' => 0,
    'endform' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a43529c9_78726403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a43529c9_78726403')) {function content_5367d6a43529c9_78726403($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

	<h4><?php echo $_smarty_tpl->tpl_vars['defaulttemplateform_title']->value;?>
</h4>
        <em><?php echo $_smarty_tpl->tpl_vars['info_title']->value;?>
</em><br/>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_template']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_template']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
<?php echo $_smarty_tpl->tpl_vars['reset']->value;?>
</p>
	</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;?>

<br/>
<?php }} ?>
