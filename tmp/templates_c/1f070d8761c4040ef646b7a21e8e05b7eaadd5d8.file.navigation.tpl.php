<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:53:00
         compiled from "/Applications/MAMP/htdocs/ciernybalog/admin/themes/OneEleven/templates/navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:702258627538211dc24e450-30557161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f070d8761c4040ef646b7a21e8e05b7eaadd5d8' => 
    array (
      0 => '/Applications/MAMP/htdocs/ciernybalog/admin/themes/OneEleven/templates/navigation.tpl',
      1 => 1399309023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '702258627538211dc24e450-30557161',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'depth' => 0,
    'nav' => 0,
    'navitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538211dc307009_73182513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538211dc307009_73182513')) {function content_538211dc307009_73182513($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['depth']->value)) {?><?php if (isset($_smarty_tpl->tpl_vars['depth'])) {$_smarty_tpl->tpl_vars['depth'] = clone $_smarty_tpl->tpl_vars['depth'];
$_smarty_tpl->tpl_vars['depth']->value = '0'; $_smarty_tpl->tpl_vars['depth']->nocache = null; $_smarty_tpl->tpl_vars['depth']->scope = 0;
} else $_smarty_tpl->tpl_vars['depth'] = new Smarty_variable('0', null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?><nav class="navigation" id="oe_menu" role="navigation"><div class="box-shadow">&nbsp;</div><ul<?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?> id="oe_pagemenu"<?php }?>><?php }?><?php  $_smarty_tpl->tpl_vars['navitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['navitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['navitem']->key => $_smarty_tpl->tpl_vars['navitem']->value) {
$_smarty_tpl->tpl_vars['navitem']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['navitem']->value['name']!="images") {?><?php if ($_smarty_tpl->tpl_vars['navitem']->value['name']!="myprefs") {?><li class="nav<?php if (isset($_smarty_tpl->tpl_vars['navitem']->value['module'])||isset($_smarty_tpl->tpl_vars['navitem']->value['firstmodule'])) {?> module<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['navitem']->value['selected'])||(isset($_GET['section'])&&$_GET['section']==mb_strtolower($_smarty_tpl->tpl_vars['navitem']->value['name'], 'UTF-8'))) {?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['navitem']->value['url'];?>
" class="<?php echo mb_strtolower($_smarty_tpl->tpl_vars['navitem']->value['name'], 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['navitem']->value['children'])) {?> parent<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['navitem']->value['target'])) {?> target="_blank"<?php }?> title="<?php if (!empty($_smarty_tpl->tpl_vars['navitem']->value['description'])) {?><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['navitem']->value['description']);?>
<?php } else { ?><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['navitem']->value['title']);?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['navitem']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?><span class="open-nav" title="<?php echo lang('open');?>
/<?php echo lang('close');?>
 <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['navitem']->value['title']);?>
"><?php echo lang('open');?>
/<?php echo lang('close');?>
 <?php echo $_smarty_tpl->tpl_vars['navitem']->value['title'];?>
</span><?php }?><?php if (isset($_smarty_tpl->tpl_vars['navitem']->value['children'])) {?><?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?><ul><?php }?><?php echo $_smarty_tpl->getSubTemplate (basename($_smarty_tpl->source->filepath), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nav'=>$_smarty_tpl->tpl_vars['navitem']->value['children'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), 0);?>
<?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?></ul><?php }?><?php }?></li><?php }?><?php }?><?php } ?><?php if ($_smarty_tpl->tpl_vars['depth']->value=='0') {?></ul></nav><?php }?><?php }} ?>
