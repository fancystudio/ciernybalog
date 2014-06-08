<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:46
         compiled from "module_file_tpl:MleCMS;adminprefs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:358540003538210a263c478-21455721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0c467c90e97e7f9a70c8e897146e05e831f1919' => 
    array (
      0 => 'module_file_tpl:MleCMS;adminprefs.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '358540003538210a263c478-21455721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startform' => 0,
    'mod' => 0,
    'actionid' => 0,
    'mle_init' => 0,
    'mle_init_module' => 0,
    'mle_auto_redirect' => 0,
    'mle_hierarchy_switch' => 0,
    'mle_search_restriction' => 0,
    'submit' => 0,
    'endform' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a2679578_22533839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a2679578_22533839')) {function content_538210a2679578_22533839($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/Applications/MAMP/htdocs/ciernybalog/lib/smarty/libs/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

<fieldset>
    <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('options');?>
</legend>
    

    <div class="pageoverflow">
        <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mle_init');?>
:</p>
        <p class="pageinput">
            <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
mle_init">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mle_init']->value,'selected'=>$_smarty_tpl->tpl_vars['mle_init_module']->value),$_smarty_tpl);?>

            </select>
        </p>
    </div>

    <div class="pageoverflow">
        <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mle_auto_redirect');?>
:</p>
        <p class="pageinput">
            <?php echo $_smarty_tpl->tpl_vars['mle_auto_redirect']->value;?>

        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mle_hierarchy_switch');?>
:</p>
        <p class="pageinput">
            <?php echo $_smarty_tpl->tpl_vars['mle_hierarchy_switch']->value;?>

        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mle_search_restriction');?>
:</p>
        <p class="pageinput">
            <?php echo $_smarty_tpl->tpl_vars['mle_search_restriction']->value;?>

        </p>
    </div>

</fieldset>
<div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
</p>
</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;?>

<?php }} ?>
