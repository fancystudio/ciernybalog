<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 13:54:17
         compiled from "module_db_tpl:Gallery;Lightbox" */ ?>
<?php /*%%SmartyHeaderCode:396708064536f64e92a85e1-92216355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f4b43aaf42daec8e4579a702a5cf898749d5110' => 
    array (
      0 => 'module_db_tpl:Gallery;Lightbox',
      1 => 1399243914,
      2 => 'module_db_tpl',
    ),
  ),
  'nocache_hash' => '396708064536f64e92a85e1-92216355',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gallerytitle' => 0,
    'gallerycomment' => 0,
    'imagecount' => 0,
    'pages' => 0,
    'prevpage' => 0,
    'nextpage' => 0,
    'hideparentlink' => 0,
    'parentlink' => 0,
    'pagelinks' => 0,
    'images' => 0,
    'image' => 0,
    'galleryid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536f64e934dd16_51525856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536f64e934dd16_51525856')) {function content_536f64e934dd16_51525856($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/modifier.replace.php';
?><div class="galeria col-md-12">
<!--<?php if (!empty($_smarty_tpl->tpl_vars['gallerytitle']->value)) {?><h3><?php echo $_smarty_tpl->tpl_vars['gallerytitle']->value;?>
</h3><?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['gallerycomment']->value)) {?><div class="gallerycomment"><?php echo $_smarty_tpl->tpl_vars['gallerycomment']->value;?>
</div><?php }?>
<p><?php echo $_smarty_tpl->tpl_vars['imagecount']->value;?>
</p>
<div class="pagenavigation">
<?php if ($_smarty_tpl->tpl_vars['pages']->value>1) {?>
<div class="prevpage"><?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>
</div>
<div class="nextpage"><?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
</div>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['hideparentlink']->value&&!empty($_smarty_tpl->tpl_vars['parentlink']->value)) {?><div class="parentlink"><?php echo $_smarty_tpl->tpl_vars['parentlink']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['pages']->value>1) {?><div class="pagelinks"><?php echo $_smarty_tpl->tpl_vars['pagelinks']->value;?>
</div><?php }?>
</div>-->

<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
	<div class="col-md-3 g-image">
	<?php if ($_smarty_tpl->tpl_vars['image']->value->isdir) {?>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['image']->value->file;?>
" title="<?php echo $_smarty_tpl->tpl_vars['image']->value->titlename;?>
"><img src="<?php echo smarty_modifier_replace(rawurlencode($_smarty_tpl->tpl_vars['image']->value->thumb),'%2F','/');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value->titlename;?>
" /></a><br />
		<?php echo $_smarty_tpl->tpl_vars['image']->value->titlename;?>

	<?php } else { ?>
		
		<a class="group" href="<?php echo smarty_modifier_replace(rawurlencode($_smarty_tpl->tpl_vars['image']->value->file),'%2F','/');?>
" title="<?php echo $_smarty_tpl->tpl_vars['image']->value->titlename;?>
<?php if (!empty($_smarty_tpl->tpl_vars['image']->value->comment)) {?> &bull; &lt;em&gt;<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['image']->value->comment), ENT_QUOTES, 'UTF-8', true);?>
&lt;em&gt;<?php }?>" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['galleryid']->value;?>
]"><div class="mask"><img src="img/cross.png"/></div><img src="<?php echo smarty_modifier_replace(rawurlencode($_smarty_tpl->tpl_vars['image']->value->thumb),'%2F','/');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value->titlename;?>
" /></a>
	<?php }?>
	</div>
<?php } ?>
<div class="galleryclear">&nbsp;</div>
</div>

<?php }} ?>
