<?php
/* Smarty version 3.1.30, created on 2016-09-20 10:50:34
  from "E:\web\php51\blog\App\Back\View\Blog\tianjia.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e0a3fa359af9_34906916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08b9f7b0318c82d2be3c8e6ee0a037ea3b3005e7' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Blog\\tianjia.html',
      1 => 1474339731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_left.html' => 1,
  ),
),false)) {
function content_57e0a3fa359af9_34906916 (Smarty_Internal_Template $_smarty_tpl) {
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
                <span class="crumb-name">博文管理</span>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">添加博文</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/index.php?p=back&c=blog&a=tianjia" method="post" id="myform" >
                    <table class="insert-tab" width="100%">
                        <tbody>
<tr>
    <th><i class="require-red">*</i>所属分类：</th>
    <td>
       <select name="cate_id">
           <option value="0">请选择</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cateinfo']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
  
        </select>
    </td>
</tr>
<tr>
    <th><i class="require-red">*</i>标题：</th>
    <td>
        <input class="common-text required" name="blog_title" size="50" value="" type="text">
    </td>
</tr>
<tr>
    <th><i class="require-red">*</i>内容：</th>
    <td>
        <textarea name="blog_content" class="common-textarea" cols="100" rows="20"></textarea>
    </td>
</tr>
<tr>
    <th></th>
    <td>
        <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
        <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
    </td>
</tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>

    </div>
    <!--/右侧主操作区-->
</div>

</body>
</html><?php }
}
