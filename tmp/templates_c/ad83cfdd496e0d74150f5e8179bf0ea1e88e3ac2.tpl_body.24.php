<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:03:05
         compiled from "tpl_body:24" */ ?>
<?php /*%%SmartyHeaderCode:8618042935367c449031b59-24251221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad83cfdd496e0d74150f5e8179bf0ea1e88e3ac2' => 
    array (
      0 => 'tpl_body:24',
      1 => 1399298872,
      2 => 'tpl_body',
    ),
  ),
  'nocache_hash' => '8618042935367c449031b59-24251221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c4490b7367_31602724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c4490b7367_31602724')) {function content_5367c4490b7367_31602724($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cms_selflink')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.cms_selflink.php';
if (!is_callable('smarty_function_rezervacie')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.rezervacie.php';
if (!is_callable('smarty_function_global_content')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.global_content.php';
?>
<body>


        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="container header">
  <a        
        <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  href="<?php echo smarty_function_cms_selflink(array('href'=>'domov'),$_smarty_tpl);?>
" 
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
 href="<?php echo smarty_function_cms_selflink(array('href'=>'home'),$_smarty_tpl);?>
""
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
 href="<?php echo smarty_function_cms_selflink(array('href'=>'startseite'),$_smarty_tpl);?>
""
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
 href="<?php echo smarty_function_cms_selflink(array('href'=>'accueil'),$_smarty_tpl);?>
"
  <?php }?>
   class="pull-left logo"> <img width="283" height="167" src="img/logo.png"/></a>     
        
        
        
  <?php echo MenuManager::function_plugin(array('template'=>"main-nav"),$_smarty_tpl);?>
  
  
        </div> <!-- /container -->  
 
<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'metadescription', null); ob_start(); ?><?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>"metadescription",'label'=>"META Description",'oneline'=>"true"),$_smarty_tpl); ?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo smarty_function_rezervacie(array(),$_smarty_tpl);?>

 <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>

<div class="claim-wrapper">

<?php echo MleCMS::function_plugin(array('name'=>"block_claim"),$_smarty_tpl);?>

</div><!--claim wrapper-->

<?php echo smarty_function_global_content(array('name'=>'indexboxy'),$_smarty_tpl);?>



<?php echo smarty_function_global_content(array('name'=>'footer'),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>
