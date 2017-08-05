<?php
/* Smarty version 3.1.30, created on 2016-09-21 08:19:39
  from "E:\web\php51\blog\App\Back\View\Cate\showlist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e1d21ba280e4_20315800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a44ab130926971cec4bf68c6c411081473dcb220' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Cate\\showlist.html',
      1 => 1474357393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_left.html' => 1,
  ),
),false)) {
function content_57e1d21ba280e4_20315800 (Smarty_Internal_Template $_smarty_tpl) {
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
            </div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
<div class="result-list">
    <a href="/index.php?p=back&c=cate&a=tianjia"><i class="icon-font"></i>添加分类</a>
    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
</div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">
                                <input class="allChoose" name="" type="checkbox">
                            </th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>评论</th>
                            <th>操作</th>
                        </tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>                                           
<tr>
    <td class="tc">
        <input name="id[]" value="1" type="checkbox">
    </td>
    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
</td>
    <td ><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_description'];?>
</td>
    <td>
        <a href="/index.php?p=back&c=cate&a=upd&cate_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
" class="link-update">修改</a>
        <a href="javascript:if(confirm('确定要删除该记录么？'))window.location.href='/index.php?p=back&c=cate&a=del&cate_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
'" 
        class="link-del" >删除</a>
    </td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/右侧主操作区-->
</div>

</body>
</html><?php }
}
