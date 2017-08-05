<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 10:02:23
         compiled from "E:\web\php51\blog\App\Back\View\Blog\tianjia.html" */ ?>
<?php /*%%SmartyHeaderCode:592357ddf1170960e8-55985769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff68239f8260196623d1d317a43dd19c988f34e5' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Blog\\tianjia.html',
      1 => 1474164112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '592357ddf1170960e8-55985769',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57ddf11712c606_78555727',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddf11712c606_78555727')) {function content_57ddf11712c606_78555727($_smarty_tpl) {?>
<!--引入公共的头部-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container clearfix">
    
<!--引入公共的左侧-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
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
                <form action="?p=back&c=Blog&a=Insert" method="post" id="myform" >
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>所属分类：</th>
                                <td>
                                   <select name="category_id">
                                       <option value="">请选择</option>
                                       <option value='1'>基础知识</option><option value='2'>MVC框架技术</option><option value='3'>生活感悟</option><option value='4'>技术前沿</option><option value='6'>新闻资讯</option>                                   </select>
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
</html><?php }} ?>
