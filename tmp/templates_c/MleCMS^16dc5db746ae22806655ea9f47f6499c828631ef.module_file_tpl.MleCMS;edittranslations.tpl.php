<?php /* Smarty version Smarty-3.1.16, created on 2014-05-25 17:47:45
         compiled from "module_file_tpl:MleCMS;edittranslations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:942339782538210a1e78036-54668437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16dc5db746ae22806655ea9f47f6499c828631ef' => 
    array (
      0 => 'module_file_tpl:MleCMS;edittranslations.tpl',
      1 => 1399309023,
      2 => 'module_file_tpl',
    ),
  ),
  'nocache_hash' => '942339782538210a1e78036-54668437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'langsArray' => 0,
    'pLang' => 0,
    'keysArray' => 0,
    'key' => 0,
    'locale' => 0,
    'items' => 0,
    'deleteIcon' => 0,
    'ajaxLink' => 0,
    'cms_secure_param_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_538210a1f07e53_17427967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538210a1f07e53_17427967')) {function content_538210a1f07e53_17427967($_smarty_tpl) {?>


    <style type="text/css">
        #trans input { width: 100%; }
        #trans span { display: block; cursor: pointer; }
    </style>


<p><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('example');?>
</strong>: {translate text="my text"} or {"my text"|translate} or {translate}my text{/translate}</p>

<table id="trans" cellspacing="0" class="pagetable">

    <tr id="label">
        <th><span></span></th>
        <?php  $_smarty_tpl->tpl_vars['pLang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pLang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['langsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pLang']->key => $_smarty_tpl->tpl_vars['pLang']->value) {
$_smarty_tpl->tpl_vars['pLang']->_loop = true;
?>
            <th><span><?php echo $_smarty_tpl->tpl_vars['pLang']->value['name'];?>
</span></th>
        <?php } ?>

        <th class="pageicon"></th>
    </tr>




    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keysArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["itemsLoop"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['items']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["itemsLoop"]['index']++;
?>
             <tr id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="keys<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['itemsLoop']['index'])) {?> row2<?php } else { ?> row1<?php }?>">
                 <td>
                     <?php echo $_smarty_tpl->tpl_vars['key']->value;?>

                 </td>
        <?php  $_smarty_tpl->tpl_vars['pLang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pLang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['langsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pLang']->key => $_smarty_tpl->tpl_vars['pLang']->value) {
$_smarty_tpl->tpl_vars['pLang']->_loop = true;
?>
            <?php if (isset($_smarty_tpl->tpl_vars["locale"])) {$_smarty_tpl->tpl_vars["locale"] = clone $_smarty_tpl->tpl_vars["locale"];
$_smarty_tpl->tpl_vars["locale"]->value = $_smarty_tpl->tpl_vars['pLang']->value['locale']; $_smarty_tpl->tpl_vars["locale"]->nocache = null; $_smarty_tpl->tpl_vars["locale"]->scope = 0;
} else $_smarty_tpl->tpl_vars["locale"] = new Smarty_variable($_smarty_tpl->tpl_vars['pLang']->value['locale'], null, 0);?>
                <td data-lang="<?php echo $_smarty_tpl->tpl_vars['pLang']->value['locale'];?>
">
                    <span><?php if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['locale']->value]) {?><?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['locale']->value];?>
<?php } else { ?><?php echo trim($_smarty_tpl->tpl_vars['key']->value);?>
<?php }?></span>
        </td>
        <?php } ?>
    <td><a class='del' href="#"><?php echo $_smarty_tpl->tpl_vars['deleteIcon']->value;?>
</a></td>
</tr>
<?php }
if (!$_smarty_tpl->tpl_vars['items']->_loop) {
?>
    <tr>
        <td>
            <p><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mle_translator_example');?>
</p>
        </td>
    </tr>
<?php } ?>


</table>


    <script type="text/javascript">

    
        var areyousure = "<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('areyousure');?>
";
    

        $(window).load(function(){
           //$('#trans .keys td').css('width', $('#trans').width() / $('#trans th').size());
        });

        $(document).ready(function(){
            $('#trans .keys td span').live('click', function(){
                $(this).hide();
                $(this).parents('td').append('<input type="text" value="" />');
                $(this).siblings('input').val($.trim($(this).text())).focus().select();
            });

            /** remove events */
            $('#trans .del').bind('click', function(event){
                var confirmBox = window.confirm(areyousure);
                if (confirmBox){
                    $.myvars = {};
                    $.myvars.thisObj = $(this);
                    event.preventDefault();
                    var delKey = $(this).parents('tr').attr('id');

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $_smarty_tpl->tpl_vars['ajaxLink']->value;?>
',
                        dataType: 'json',
                        data: ({
                            'delKey': delKey,
                            '<?php echo $_smarty_tpl->tpl_vars['cms_secure_param_name']->value;?>
': '<?php echo $_GET[$_smarty_tpl->tpl_vars['cms_secure_param_name']->value];?>
',
                            'module': '<?php echo $_GET['module'];?>
',
                            'showtemplate': 'false',
                            'aAction': 'remove'
                        }),
                        complete: function(){
                            $.myvars.thisObj.parents('tr').find('td').css('background-color','yellow').parents('tr').fadeOut('slow', function(){
                                $(this).remove();
                                $('#trans tr').removeClass('row2');
                                $('#trans tr:even').addClass('row2');
                            });
                        }
                    });
                }else{
                    return false;
                        } // end confirmBox
            })

            /** update events */
            $('#trans tr td input').live('blur', function(){
                var $this = this;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_smarty_tpl->tpl_vars['ajaxLink']->value;?>
',
                    dataType: 'json',
                    data: ({
                        'editKey': $(this).parents('tr').attr('id'),
                        'editValue': $.trim($(this).val()),
                        'editLang': $(this).parents('td').attr('data-lang'),
                        '<?php echo $_smarty_tpl->tpl_vars['cms_secure_param_name']->value;?>
': '<?php echo $_GET[$_smarty_tpl->tpl_vars['cms_secure_param_name']->value];?>
',
                        'module': '<?php echo $_GET['module'];?>
',
                        'showtemplate': 'false',
                        'aAction': 'update'
                    }),
                    complete: function(){
                        $($this).hide();
                        $($this).siblings('span').text($.trim($($this).val())).show();
                        $($this).remove();
                    }
                });
            });
        })
    </script>


<?php }} ?>
