<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 08:46:46
         compiled from "E:\web\php51\blog\App\Home\View\User\login.html" */ ?>
<?php /*%%SmartyHeaderCode:945357dcbdfc1b6cf8-90587971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddd18a4b11f1707fff429abea3b3fbfd9faf833c' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\User\\login.html',
      1 => 1474159559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '945357dcbdfc1b6cf8-90587971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57dcbdfc21e194_43472845',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dcbdfc21e194_43472845')) {function content_57dcbdfc21e194_43472845($_smarty_tpl) {?><!doctype html>
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
    <h1>登录<<?php ?>?php echo $data1?<?php ?>></h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="login_check.php" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="user_name" value="" id="user" size="34" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="user_pass" value="" id="pwd" size="34" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" value="提交" class="btn btn-primary" />
                    </li>
                    <!--li>
                        还没有注册？<a href="?c=User&a=Register">现在去注册</a>
                    </li-->
                </ul>
            </form>
        </div>
    </div>
</div>

    <!--版权信息-->
    <<?php ?>?php //include VIEW_PATH . 'footer.php'; ?<?php ?>>
    
</body>
</html><?php }} ?>
