<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 16:12:23
         compiled from "E:\web\php51\blog\App\Back\View\Cate\tianjia.html" */ ?>
<?php /*%%SmartyHeaderCode:1989157dcbee12ef8f0-28231821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f47f30c17107b319b45ab43e62fbc730382baf4b' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Cate\\tianjia.html',
      1 => 1474186254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1989157dcbee12ef8f0-28231821',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57dcbee1346776_26109521',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcbee1346776_26109521')) {function content_57dcbee1346776_26109521($_smarty_tpl) {?>
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
                <span class="crumb-name">分类管理</span>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">添加分类</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/index.php?p=back&c=cate&a=tianjia" method="post" id="myform" >
                    <table class="insert-tab" width="100%">
                        <tbody>
<tr><th><i class="require-red">*</i>分类名称：</th>
    <td><input class="common-text required" id="title" name="cate_name" size="50" value="" type="text"></td>
</tr>
<tr><th>分类描述：</th>
    <td><textarea name="cate_description" class="common-textarea" cols="60" rows="4"></textarea></td>
</tr>
<tr><th>是否显示：</th>
    <td>
    <input type="radio" name="is_show" value="0" checked='checked'>显示
    <input type="radio" name="is_show" value="1">不显示
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
</html><?php }} ?>
