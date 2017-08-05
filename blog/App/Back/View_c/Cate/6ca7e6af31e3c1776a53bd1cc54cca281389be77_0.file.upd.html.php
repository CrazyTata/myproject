<?php
/* Smarty version 3.1.30, created on 2016-09-20 08:45:41
  from "E:\web\php51\blog\App\Back\View\Cate\upd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e086b5aafad1_49211941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ca7e6af31e3c1776a53bd1cc54cca281389be77' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Cate\\upd.html',
      1 => 1474332288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_left.html' => 1,
  ),
),false)) {
function content_57e086b5aafad1_49211941 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!--引入公共的头部-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container clearfix">
    
<!--引入公共的左侧-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
    <!--右侧主操作区-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i>
                <a href="?p=back">首页</a>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">分类管理</span>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">修改分类</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/index.php?p=back&c=cate&a=upd" method="post" id="myform" >
                <input type="hidden" name="cate_id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cate_id'];?>
" />
                    <table class="insert-tab" width="100%">
                        <tbody>
<tr><th><i class="require-red">*</i>分类名称：</th>
    <td><input class="common-text required" id="title" name="cate_name" size="50" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cate_name'];?>
" type="text"></td>
</tr>
<tr><th>分类描述：</th>
    <td><textarea name="cate_description" class="common-textarea" cols="60" rows="4"><?php echo $_smarty_tpl->tpl_vars['info']->value['cate_description'];?>
</textarea></td>
</tr>
<tr><th>是否显示：</th>
    <td>
    <input type="radio" name="is_show" value="0"
    <?php if ($_smarty_tpl->tpl_vars['info']->value['is_show'] == '0') {?> checked='checked'<?php }?>>显示
    <input type="radio" name="is_show" value="1"
    <?php if ($_smarty_tpl->tpl_vars['info']->value['is_show'] == '1') {?> checked='checked'<?php }?>>不显示
    </td>
</tr>
<tr><th></th>
    <td><input class="btn btn-primary btn6 mr10" value="提交" type="submit">
        <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"></td>
</tr>
                        </tbody></table>
                </form>
            </div>

        </div>

    </div>
    <!--/右侧主操作区-->
</div>

</body>
</html><?php }
}
