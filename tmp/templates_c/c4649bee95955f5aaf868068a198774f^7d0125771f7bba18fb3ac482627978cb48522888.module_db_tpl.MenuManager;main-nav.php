<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:04:51
         compiled from "module_db_tpl:MenuManager;main-nav" */ ?>
<?php /*%%SmartyHeaderCode:8661143575367c4b3472c45-24754140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d0125771f7bba18fb3ac482627978cb48522888' => 
    array (
      0 => 'module_db_tpl:MenuManager;main-nav',
      1 => 1399306044,
      2 => 'module_db_tpl',
    ),
  ),
  'nocache_hash' => '8661143575367c4b3472c45-24754140',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c4b356aed6_19492660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c4b356aed6_19492660')) {function content_5367c4b356aed6_19492660($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cms_selflink')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.cms_selflink.php';
?><div class="navbar navbar-default pull-right" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav nav-pills">
  <!--<li class="active"><a href="<?php echo smarty_function_cms_selflink(array('href'=>'domov'),$_smarty_tpl);?>
"><?php echo mle_smarty::translator(array('text'=>"Domov"),$_smarty_tpl);?>
</a></li>-->
  <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'ubytovanie'),$_smarty_tpl);?>
">Ubytovanie</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'layout-services'),$_smarty_tpl);?>
">Layout - Services</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'vermietung'),$_smarty_tpl);?>
">Vermietung</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'location'),$_smarty_tpl);?>
">Location</a></li>
  <?php }?>
  
  
  
  
  <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivity'),$_smarty_tpl);?>
">Aktivity</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'activities'),$_smarty_tpl);?>
">Activities</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'aktivitaten'),$_smarty_tpl);?>
">Aktivitäten</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'activites'),$_smarty_tpl);?>
">Activités</a></li>
  <?php }?>
  
  
  <li><a href="#" class="cennik" data-toggle="modal" data-target=".bs-example-modal-sm"><?php echo mle_smarty::translator(array('text'=>"Cenník"),$_smarty_tpl);?>
</a></li>
  
  
  <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'galeria'),$_smarty_tpl);?>
">Galéria</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'photo-gallery'),$_smarty_tpl);?>
">Photo Gallery</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'galerie'),$_smarty_tpl);?>
">Galerie</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'galerie-photo'),$_smarty_tpl);?>
">Galerie photo</a></li>
  <?php }?>
  
  
  <?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'kontakt'),$_smarty_tpl);?>
">Kontakt</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'contact'),$_smarty_tpl);?>
">Contact</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'kontakt-de'),$_smarty_tpl);?>
">Kontakt</a></li>
  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <li><a href="<?php echo smarty_function_cms_selflink(array('href'=>'contact-fr'),$_smarty_tpl);?>
">Contact</a></li>
  <?php }?>
  
  <li><a href="#" class="rezervacia" data-toggle="modal" data-target="#myModal"><?php echo mle_smarty::translator(array('text'=>"Rezervácia"),$_smarty_tpl);?>
</a></li>
  <li class="hidden-xs"><?php echo MleCMS::function_plugin(array('action'=>"langs"),$_smarty_tpl);?>
 </li>
</ul> 
 <div style="clear:both"></div>
</div><!-- /.navbar-collapse -->
</div>
<ul class="visible-xs pull-right m-lang">
  <li class="visible-xs"> <?php echo MleCMS::function_plugin(array('action'=>"langs"),$_smarty_tpl);?>
</li>
</ul> 
<div style="clear:both"></div>

<?php if ($_smarty_tpl->tpl_vars['lang_parent']->value=='SK') {?> 
  <?php echo cms_user_tag_cennik(array(),$_smarty_tpl);?>

  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='EN') {?>
  <?php echo cms_user_tag_cenniken(array(),$_smarty_tpl);?>

  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='DE') {?>
  <?php echo cms_user_tag_cennikde(array(),$_smarty_tpl);?>

  <?php } elseif ($_smarty_tpl->tpl_vars['lang_parent']->value=='FR') {?>
  <?php echo cms_user_tag_cennikfr(array(),$_smarty_tpl);?>

  <?php }?>

<?php }} ?>
