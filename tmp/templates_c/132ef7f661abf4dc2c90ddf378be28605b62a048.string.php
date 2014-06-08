<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 19:03:05
         compiled from "132ef7f661abf4dc2c90ddf378be28605b62a048" */ ?>
<?php /*%%SmartyHeaderCode:6839488025367c4497bfaa3-33122688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '132ef7f661abf4dc2c90ddf378be28605b62a048' => 
    array (
      0 => '132ef7f661abf4dc2c90ddf378be28605b62a048',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '6839488025367c4497bfaa3-33122688',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sitename' => 0,
    'title_keywords' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367c4497c9d61_01429451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367c4497c9d61_01429451')) {function content_5367c4497c9d61_01429451($_smarty_tpl) {?><?php if (!is_callable('smarty_function_title')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/function.title.php';
?><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 | <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title_keywords']->value;?>
<?php }} ?>
