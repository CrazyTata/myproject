<?php
/* Smarty version 3.1.30, created on 2016-10-26 18:17:34
  from "E:\web\php51\blog\App\Home\View\User\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_581082bede9529_83379582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a3a718a1ce459d950db7fd8c8bcce64d62c4688' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\User\\register.html',
      1 => 1477476700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_581082bede9529_83379582 (Smarty_Internal_Template $_smarty_tpl) {
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
    <h1>注册</h1>
    <div class="adming_login_border">
        <div class="admin_input">
<form action="/index.php?p=home&c=user&a=register" method="post">
    <ul class="admin_items">
        <li>
            <label for="user">用户名：</label>
            <input type="text" name="user_name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shuju']->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" id="user" size="34" class="admin_input_style" />
        </li>
        <li>
            <label for="pwd">密码：</label>
            <input type="password" name="user_pwd" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shuju']->value['user_pwd'])===null||$tmp==='' ? '' : $tmp);?>
"  size="34" class="admin_input_style" />
        </li>        
        <li>
            <label for="pwd">再次输入密码：</label>
            <input type="password" name="user_pwd2" value=""  size="34" class="admin_input_style" />
        </li>        
        <li>
            <label for="pwd">邮箱：</label>
            <input type="text" name="user_email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shuju']->value['user_email'])===null||$tmp==='' ? '' : $tmp);?>
"  size="34" class="admin_input_style" />
            <span style="color:red;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['email_verify_result']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
        </li>        
        <li>
            <label for="pwd">手机号码：</label>
            <input type="text" name="user_tel" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shuju']->value['user_tel'])===null||$tmp==='' ? '' : $tmp);?>
"  size="34" class="admin_input_style" />
            <span style="color:red;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tel_verify_result']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
        </li>        
        <li>
            <label for="pwd">性别：</label>
            <input type="radio" name="user_sex" value="0"   class="admin_input_style" checked='checked'
            <?php if ((isset($_smarty_tpl->tpl_vars['shuju']->value) && $_smarty_tpl->tpl_vars['shuju']->value['user_sex'] == '0') || empty($_smarty_tpl->tpl_vars['shuju']->value)) {?> checked='checked' <?php }?>/>男
            <input type="radio" name="user_sex" value="1"   class="admin_input_style" 
            <?php if (isset($_smarty_tpl->tpl_vars['shuju']->value) && $_smarty_tpl->tpl_vars['shuju']->value['user_sex'] == '1') {?> checked='checked' <?php }?>/>女
            <input type="radio" name="user_sex" value="2"   class="admin_input_style" 
            <?php if (isset($_smarty_tpl->tpl_vars['shuju']->value) && $_smarty_tpl->tpl_vars['shuju']->value['user_sex'] == '2') {?> checked='checked' <?php }?>/>保密
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
