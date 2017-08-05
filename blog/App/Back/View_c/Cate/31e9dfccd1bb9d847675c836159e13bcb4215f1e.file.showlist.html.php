<?php /* Smarty version Smarty-3.1.16, created on 2016-09-20 15:41:59
         compiled from "E:\web\php51\blog\App\Back\View\Cate\showlist.html" */ ?>
<?php /*%%SmartyHeaderCode:534157ddf0506d70e6-35444868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31e9dfccd1bb9d847675c836159e13bcb4215f1e' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Cate\\showlist.html',
      1 => 1474357315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '534157ddf0506d70e6-35444868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57ddf0507ac731_98379517',
  'variables' => 
  array (
    'info' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddf0507ac731_98379517')) {function content_57ddf0507ac731_98379517($_smarty_tpl) {?>
<!--引入公共的头部-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container clearfix">
    
<!--引入公共的左侧-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!--右侧主操作区-->
    <div class="main-wrap">
        <p><?php echo @constant('FRAME_PATH');?>
</p>
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
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
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
<?php } ?>
                                            </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/右侧主操作区-->
</div>

</body>
</html><?php }} ?>
