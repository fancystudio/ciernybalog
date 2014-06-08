<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:03:05
         compiled from "module_db_tpl:MleCMS;mle_templateDropdown" */ ?>
<?php /*%%SmartyHeaderCode:9694261435367c4494fd648-29319482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26a8cf86f9a5443fcf9421762ecc81d089b1b717' => 
    array (
      0 => 'module_db_tpl:MleCMS;mle_templateDropdown',
      1 => 1399300922,
      2 => 'module_db_tpl',
    ),
  ),
  'nocache_hash' => '9694261435367c4494fd648-29319482',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'langs_count' => 0,
    'langs' => 0,
    'l' => 0,
    'lang_href' => 0,
    'page_alias' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c449552859_64276211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c449552859_64276211')) {function content_5367c449552859_64276211($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cms_selflink')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.cms_selflink.php';
?><?php if ($_smarty_tpl->tpl_vars['langs_count']->value) {?>
    <select class="form-control lang selectpicker" onchange="location.href=options[selectedIndex].value;">
        <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['langs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
        <?php $_smarty_tpl->_capture_stack[0][] = array('default', "lang_href", null); ob_start(); ?><?php echo smarty_function_cms_selflink(array('href'=>$_smarty_tpl->tpl_vars['l']->value['alias']),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php if ($_smarty_tpl->tpl_vars['lang_href']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['page_alias']->value==$_smarty_tpl->tpl_vars['l']->value['alias']) {?>
                <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['lang_href']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l']->value['name'];?>
</option>
            <?php } else { ?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['lang_href']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l']->value['name'];?>
</option>
            <?php }?>
        <?php }?>
    <?php } ?>
</select>
<?php }?><?php }} ?>
