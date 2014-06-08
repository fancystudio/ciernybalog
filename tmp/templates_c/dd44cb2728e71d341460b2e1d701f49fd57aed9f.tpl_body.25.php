<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:04:58
         compiled from "tpl_body:25" */ ?>
<?php /*%%SmartyHeaderCode:21214918525367c4baa28eb2-86358074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd44cb2728e71d341460b2e1d701f49fd57aed9f' => 
    array (
      0 => 'tpl_body:25',
      1 => 1399298885,
      2 => 'tpl_body',
    ),
  ),
  'nocache_hash' => '21214918525367c4baa28eb2-86358074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_parent' => 0,
    'nadpispodstranky' => 0,
    'spodok' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c4baabcdd3_10207707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c4baabcdd3_10207707')) {function content_5367c4baabcdd3_10207707($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cms_selflink')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.cms_selflink.php';
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
 <div class="main-heading-wrapper">
 <div class="main-heading container">
 <h1><?php echo $_smarty_tpl->tpl_vars['nadpispodstranky']->value;?>
</h1>
 </div><!--main heading-->
 </div><!--main-heading-wrapper-->

<div class="content-wrapper">
<div class="content container">



<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'metadescription', null); ob_start(); ?><?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>"metadescription",'label'=>"META Description",'oneline'=>"true"),$_smarty_tpl); ?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo smarty_function_rezervacie(array(),$_smarty_tpl);?>

 <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
 <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'spodok','label'=>"spodok",'oneline'=>"true",'size'=>"30",'assign'=>'spodok'),$_smarty_tpl); ?>
</div><!--content-->
</div><!--content wrapper-->




<?php echo $_smarty_tpl->tpl_vars['spodok']->value;?>




<?php echo smarty_function_global_content(array('name'=>'footer'),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>
