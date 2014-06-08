<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:24
         compiled from "module_file_tpl:News;adminprefs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8061555525367d6a44c78a5-21074886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5062cc4f0c2069f1735963fd2f0f887683b1874' => 
    array (
      0 => 'module_file_tpl:News;adminprefs.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '8061555525367d6a44c78a5-21074886',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startform' => 0,
    'title_submission_settings' => 0,
    'title_default_category' => 0,
    'input_default_category' => 0,
    'title_allowed_upload_types' => 0,
    'input_allowed_upload_types' => 0,
    'title_hide_summary_field' => 0,
    'input_hide_summary_field' => 0,
    'title_allow_summary_wysiwyg' => 0,
    'input_allow_summary_wysiwyg' => 0,
    'title_expiry_interval' => 0,
    'input_expiry_interval' => 0,
    'title_notification_settings' => 0,
    'title_formsubmit_emailaddress' => 0,
    'input_formsubmit_emailaddress' => 0,
    'title_email_subject' => 0,
    'input_email_subject' => 0,
    'title_email_template' => 0,
    'input_email_template' => 0,
    'title_fesubmit_settings' => 0,
    'title_fesubmit_status' => 0,
    'input_fesubmit_status' => 0,
    'title_fesubmit_redirect' => 0,
    'input_fesubmit_redirect' => 0,
    'title_detail_settings' => 0,
    'title_detail_returnid' => 0,
    'input_detail_returnid' => 0,
    'info_detail_returnid' => 0,
    'title_expired_searchable' => 0,
    'input_expired_searchable' => 0,
    'title_expired_viewable' => 0,
    'actionid' => 0,
    'expired_viewable' => 0,
    'info_expired_viewable' => 0,
    'submit' => 0,
    'endform' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a4543c08_98020742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a4543c08_98020742')) {function content_5367d6a4543c08_98020742($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_submission_settings']->value;?>
</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_default_category']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_default_category']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_allowed_upload_types']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_allowed_upload_types']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_hide_summary_field']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_hide_summary_field']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_allow_summary_wysiwyg']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_allow_summary_wysiwyg']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_expiry_interval']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_expiry_interval']->value;?>
</p>
	</div>
</fieldset>
<br/>
<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_notification_settings']->value;?>
</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_formsubmit_emailaddress']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_formsubmit_emailaddress']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_email_subject']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_email_subject']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_email_template']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_email_template']->value;?>
</p>
	</div>
</fieldset>
<br/>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_settings']->value;?>
</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_status']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_fesubmit_status']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_fesubmit_redirect']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_fesubmit_redirect']->value;?>
</p>
	</div>
</fieldset>
<br/>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_detail_settings']->value;?>
</legend>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_detail_returnid']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_detail_returnid']->value;?>
<br/><?php echo $_smarty_tpl->tpl_vars['info_detail_returnid']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_expired_searchable']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_expired_searchable']->value;?>
</p>
	</div>
        <div class="pageoverflow">
	  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['title_expired_viewable']->value;?>
</p>
	  <p class="pagetext">
            <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
expired_viewable" value="1" <?php if ($_smarty_tpl->tpl_vars['expired_viewable']->value) {?>checked="checked"<?php }?>/>
            <br/>
            <?php echo $_smarty_tpl->tpl_vars['info_expired_viewable']->value;?>

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
