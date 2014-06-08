<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:53:00
         compiled from "/Applications/MAMP/htdocs/ciernybalog/admin/themes/OneEleven/templates/notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1768705639538211dc1e7561-92519741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d968309b5c2b5cb5df40dd8d07d9ffe2c434e54' => 
    array (
      0 => '/Applications/MAMP/htdocs/ciernybalog/admin/themes/OneEleven/templates/notifications.tpl',
      1 => 1399309023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1768705639538211dc1e7561-92519741',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'cnt' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538211dc238d55_49538849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538211dc238d55_49538849')) {function content_538211dc238d55_49538849($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['items']->value)) {?>
<div class="notification" role="alert"><div class="box-shadow">&nbsp;</div><a href="#" class="open" title="<?php echo lang('notifications');?>
"><span><?php if (isset($_smarty_tpl->tpl_vars['cnt'])) {$_smarty_tpl->tpl_vars['cnt'] = clone $_smarty_tpl->tpl_vars['cnt'];
$_smarty_tpl->tpl_vars['cnt']->value = count($_smarty_tpl->tpl_vars['items']->value); $_smarty_tpl->tpl_vars['cnt']->nocache = null; $_smarty_tpl->tpl_vars['cnt']->scope = 0;
} else $_smarty_tpl->tpl_vars['cnt'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['items']->value), null, 0);?><?php if (count($_smarty_tpl->tpl_vars['items']->value)>1) {?><?php echo lang('notifications_to_handle',$_smarty_tpl->tpl_vars['cnt']->value);?>
<?php } else { ?><?php echo lang('notification_to_handle',$_smarty_tpl->tpl_vars['cnt']->value);?>
<?php }?></span></a><div class="alert-dialog dialog" role="alertdialog" title="<?php echo lang('notifications');?>
"><ul><?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?><li><?php if (!empty($_smarty_tpl->tpl_vars['one']->value->module)) {?><p class="ui-corner-all <?php if ($_smarty_tpl->tpl_vars['one']->value->priority=='1') {?>ui-state-error red<?php } elseif ($_smarty_tpl->tpl_vars['one']->value->priority=='2') {?>ui-state-highlight orange<?php } else { ?>ui-state-highlightblue<?php }?>"><strong><span class="ui-icon <?php if ($_smarty_tpl->tpl_vars['one']->value->priority<3) {?>ui-icon-alert<?php } else { ?>ui-icon-info<?php }?>"></span><?php echo $_smarty_tpl->tpl_vars['one']->value->module;?>
: </strong></p><?php }?><?php echo $_smarty_tpl->tpl_vars['one']->value->html;?>
</li><?php } ?></ul></div></div>
<?php }?>
<?php }} ?>
