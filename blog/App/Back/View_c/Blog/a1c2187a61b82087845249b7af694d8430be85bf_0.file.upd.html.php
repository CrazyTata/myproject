<?php
/* Smarty version 3.1.30, created on 2016-09-20 11:58:23
  from "E:\web\php51\blog\App\Back\View\Blog\upd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e0b3dfaf6f83_72421770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1c2187a61b82087845249b7af694d8430be85bf' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Blog\\upd.html',
      1 => 1474343851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_left.html' => 1,
  ),
),false)) {
function content_57e0b3dfaf6f83_72421770 (Smarty_Internal_Template $_smarty_tpl) {
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
                <span class="crumb-name">修改博文</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/index.php?p=back&c=blog&a=upd" method="post" id="myform" >
                <input type="hidden" name="blog_id" value="<?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['blog_id'];?>
" />
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
'
            <?php if ($_smarty_tpl->tpl_vars['bloginfo']->value['cate_id'] == $_smarty_tpl->tpl_vars['v']->value['cate_id']) {?> selected='selected'<?php }?>
            ><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
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
        <input class="common-text required" name="blog_title" size="50" value="<?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['blog_title'];?>
" type="text">
    </td>
</tr>
<tr>
    <th><i class="require-red">*</i>内容：</th>
    <td>
        <textarea name="blog_content" class="common-textarea" cols="100" rows="20"><?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['blog_content'];?>
</textarea>
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
