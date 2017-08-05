<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:24:37
  from "E:\web\php51\blog\App\Home\View\User\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e243c5ef98a9_32987619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8034cfe8b1d5ded84b44d14d16f8d45df4654431' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\User\\login.html',
      1 => 1474445414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e243c5ef98a9_32987619 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title> ICBlog 博客系统</title>
    <link href="<?php echo @constant('CSS_URL');?>
style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo @constant('CSS_URL');?>
admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body class='bg_test'>
<div class="admin_login_wrap">
    <h1>登录<?php echo '<?php ';?>echo $data1<?php echo '?>';?></h1>
    <div class="adming_login_border">
        <div class="admin_input">
<form action="/index.php?c=user&a=login" method="post">
    <ul class="admin_items">
        <li>
            <label for="user">用户名：</label>
            <input type="text" name="user_name" value="" id="user" size="34" class="admin_input_style" />
        </li>
        <li>
            <label for="pwd">密码：</label>
            <input type="password" name="user_pwd" value="" id="pwd" size="34" class="admin_input_style" />
        </li>
        <li>
            <input type="submit" value="提交" class="btn btn-primary" />
        </li>
    </ul>
</form>
        </div>
    </div>
</div>

    <!--版权信息-->
    <?php echo '<?php ';?>//include VIEW_PATH . 'footer.php'; <?php echo '?>';?>
    
</body>
</html><?php }
}
