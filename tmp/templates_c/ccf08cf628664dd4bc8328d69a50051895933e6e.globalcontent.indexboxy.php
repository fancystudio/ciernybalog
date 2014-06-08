<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:03:05
         compiled from "globalcontent:indexboxy" */ ?>
<?php /*%%SmartyHeaderCode:14814920785367c4496786e4-27793651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccf08cf628664dd4bc8328d69a50051895933e6e' => 
    array (
      0 => 'globalcontent:indexboxy',
      1 => 1399297451,
      2 => 'globalcontent',
    ),
  ),
  'nocache_hash' => '14814920785367c4496786e4-27793651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c449708f75_07403709',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c449708f75_07403709')) {function content_5367c449708f75_07403709($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cms_selflink')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.cms_selflink.php';
?><div class="content-boxes-wrapper">
	<div class="container">
		<div class="col-md-4 cb">
		<h2>
  <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'ubytovanie'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'layout-services'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'vermietung'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'location'),$_smarty_tpl);?>
">
  <?php }?>
		
		
		<?php echo mle_smarty::translator(array('text'=>"UBYTOVANIE"),$_smarty_tpl);?>
</a></h2>
		<img class="separator" src="img/separator.png"/><br>
		
		<?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'ubytovanie'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'layout-services'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'vermietung'),$_smarty_tpl);?>
">
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <a href="<?php echo smarty_function_cms_selflink(array('href'=>'location'),$_smarty_tpl);?>
">
  <?php }?>
		
		<img class="cb-img" src="img/ubytovanie.png"/></a>
		</div>
		
		<div class="col-md-4 cb">
		<h2>
		<?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
		<a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivity'),$_smarty_tpl);?>
">
		 <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'activities'),$_smarty_tpl);?>
">
        <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivitaten'),$_smarty_tpl);?>
">
        <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'activites'),$_smarty_tpl);?>
">
  <?php }?>
		
		<?php echo mle_smarty::translator(array('text'=>"AKTIVITY"),$_smarty_tpl);?>
</a></h2>
		<img class="separator" src="img/separator.png"/><br>
		<?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
		<a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivity'),$_smarty_tpl);?>
">
		 <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'activities'),$_smarty_tpl);?>
">
        <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivitaten'),$_smarty_tpl);?>
">
        <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
        <a href="<?php echo smarty_function_cms_selflink(array('href'=>'activites'),$_smarty_tpl);?>
">
  <?php }?>
		
		<img class="cb-img" src="img/aktivity.png"/></a>
		</div>
		
		<div class="col-md-4 cb">
		<h2><a href="#" class="cennik" data-toggle="modal" data-target=".bs-example-modal-sm"><?php echo mle_smarty::translator(array('text'=>"CENNÍK"),$_smarty_tpl);?>
</a></h2>
		<img class="separator" src="img/separator.png"/><br>
		<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><img class="cb-img" src="img/cennik.png"/></a>
	</div>
	
	</div>
</div><!--content-boxes-wrapper--><?php }} ?>
