<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:46
         compiled from "module_file_tpl:MleCMS;templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1890057905538210a21828b4-94258879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7888c24325ce827e850b6bfdaaa7c5236479870' => 
    array (
      0 => 'module_file_tpl:MleCMS;templates.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '1890057905538210a21828b4-94258879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'templatelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a2194ee4_73009025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a2194ee4_73009025')) {function content_538210a2194ee4_73009025($_smarty_tpl) {?><p><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('example');?>
</strong>: {MleCMS action="langs"} or {MleCMS action="langs" template="Dropdown"}</p>
<?php echo $_smarty_tpl->tpl_vars['templatelist']->value;?>
<?php }} ?>
