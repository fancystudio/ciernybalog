<?php /* Smarty version Smarty-3.1.16, created on 2014-05-05 20:21:23
         compiled from "module_file_tpl:News;articlelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9648820585367d6a3c99a14-32541750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60befe20a75d407574fe658fe037d1dc98318fd0' => 
    array (
      0 => 'module_file_tpl:News;articlelist.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '9648820585367d6a3c99a14-32541750',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formstart' => 0,
    'filtertext' => 0,
    'prompt_category' => 0,
    'input_category' => 0,
    'prompt_showchildcategories' => 0,
    'input_allcategories' => 0,
    'prompt_sorting' => 0,
    'input_sorting' => 0,
    'prompt_pagelimit' => 0,
    'input_pagelimit' => 0,
    'submitfilter' => 0,
    'hidden' => 0,
    'formend' => 0,
    'itemcount' => 0,
    'addlink' => 0,
    'pagecount' => 0,
    'pagenumber' => 0,
    'firstpage' => 0,
    'prevpage' => 0,
    'oftext' => 0,
    'nextpage' => 0,
    'lastpage' => 0,
    'form2start' => 0,
    'titletext' => 0,
    'postdatetext' => 0,
    'startdatetext' => 0,
    'enddatetext' => 0,
    'categorytext' => 0,
    'statustext' => 0,
    'selecttext' => 0,
    'items' => 0,
    'entry' => 0,
    'reassigntext' => 0,
    'categoryinput' => 0,
    'submit_reassign' => 0,
    'submit_massdelete' => 0,
    'form2end' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5367d6a3e059f4_13490430',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5367d6a3e059f4_13490430')) {function content_5367d6a3e059f4_13490430($_smarty_tpl) {?><?php if (!is_callable('smarty_cms_modifier_cms_date_format')) include '/Applications/MAMP/htdocs/ciernybalog/plugins/modifier.cms_date_format.php';
?>
<script type="text/javascript">
//<![CDATA[
function selectAll()
{
  checkboxes = document.getElementsByTagName("input");
  for (i=0; i<checkboxes.length ; i++)
    {
      if (checkboxes[i].type == "checkbox") checkboxes[i].checked=!checkboxes[i].checked;
    }
}
//]]>
</script>


<?php if (isset($_smarty_tpl->tpl_vars['formstart']->value)) {?>
<fieldset>
  <legend><?php echo $_smarty_tpl->tpl_vars['filtertext']->value;?>
</legend>
  <?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

  <div class="pageoverflow">
    <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_category']->value;?>
:</p>
    <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_category']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prompt_showchildcategories']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['input_allcategories']->value;?>
</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_sorting']->value;?>
:</p>
    <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_sorting']->value;?>
</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_pagelimit']->value;?>
:</p>
    <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_pagelimit']->value;?>
</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submitfilter']->value;?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
  </div>
  <?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

</fieldset>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
<div class="pageoptions">
<?php if (isset($_smarty_tpl->tpl_vars['addlink']->value)) {?><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p><?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['pagecount']->value>1) {?>
  <p>
<?php if ($_smarty_tpl->tpl_vars['pagenumber']->value>1) {?>
<?php echo $_smarty_tpl->tpl_vars['firstpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>
&nbsp;
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['pagenumber']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['oftext']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>

<?php if ($_smarty_tpl->tpl_vars['pagenumber']->value<$_smarty_tpl->tpl_vars['pagecount']->value) {?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['lastpage']->value;?>

<?php }?>
</p>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['form2start']->value;?>

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>#</th>
			<th><?php echo $_smarty_tpl->tpl_vars['titletext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['postdatetext']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['startdatetext']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['enddatetext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['categorytext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['statustext']->value;?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><a href="javascript:selectAll();"><?php echo $_smarty_tpl->tpl_vars['selecttext']->value;?>
</a></th>
		</tr>
	</thead>
	<tbody>
	<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->title;?>
</td>
			<td><?php echo smarty_cms_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_postdate);?>
</td>
                        <td><?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->u_enddate)) {?><?php echo smarty_cms_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_startdate);?>
<?php }?></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['entry']->value->expired==1) {?>
                              <div class="important">
                              <?php echo smarty_cms_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_enddate);?>

	                      </div>
                            <?php } else { ?>
                              <?php echo smarty_cms_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_enddate);?>

                            <?php }?>
                        </td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->category;?>
</td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->approve_link)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->approve_link;?>
<?php }?></td>
			<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['entry']->value->editlink)===null||$tmp==='' ? '' : $tmp);?>
</td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->deletelink)) {?><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
<?php }?></td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->select;?>
</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php }?>

<div style="width: 97%;">
<div class="pageoptions" style="float: left;">
<?php if (isset($_smarty_tpl->tpl_vars['addlink']->value)) {?><p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p><?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['itemcount']->value>0) {?>
  <div class="pageoptions" style="float: right;">
    <?php echo $_smarty_tpl->tpl_vars['reassigntext']->value;?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['categoryinput']->value;?>
<?php echo $_smarty_tpl->tpl_vars['submit_reassign']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['submit_massdelete']->value)) {?><br/><?php echo $_smarty_tpl->tpl_vars['submit_massdelete']->value;?>
<?php }?>
  </div>
<?php }?>
<div class="clearb"></div>
</div>
<?php echo $_smarty_tpl->tpl_vars['form2end']->value;?>

<?php }} ?>
