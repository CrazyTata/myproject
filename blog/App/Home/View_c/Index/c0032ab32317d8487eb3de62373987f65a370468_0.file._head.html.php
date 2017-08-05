<?php
/* Smarty version 3.1.30, created on 2016-09-21 16:53:10
  from "E:\web\php51\blog\App\Home\View\Pub\_head.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e24a767c56c6_63331512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0032ab32317d8487eb3de62373987f65a370468' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\Pub\\_head.html',
      1 => 1474447979,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e24a767c56c6_63331512 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="<?php echo @constant('CSS_URL');?>
style.css"/>
<link rel="stylesheet" href="<?php echo @constant('CSS_URL');?>
index.css"/>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_URL');?>
jquery1.42.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_URL');?>
jquery.SuperSlide.2.1.1.js"><?php echo '</script'; ?>
>
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS_URL');?>
html5.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
    <!--页头信息-->
        <!--header start-->
    
    <style type="text/css">
    #header h1{float:left;}
    #header #login_register{float:right;color:rgb(80,111,112);}
    #header .blog_sub_title{clear:both;}
    </style>
    
    <div id="header">
      <h1>个人博客</h1>

      <?php if (!empty($_SESSION['user_name'])) {?>
      <p id="login_register">
        <span>欢迎您 <?php echo $_SESSION['user_name'];?>
</span>
        &nbsp;&nbsp;
        <span><a href="/index.php?p=home&c=user&a=logout">退出</a></span>
      </p>
      <?php } else { ?>
      <p id="login_register">
        <span><a href="/index.php?p=home&c=user&a=login">登录</a></span>
        &nbsp;&nbsp;
        <span><a href="/index.php?p=home&c=user&a=register">注册</a></span>
      </p>
      <?php }?>


      <p class="blog_sub_title"><img src='<?php echo @constant('IMG_URL');?>
itcast_shiming_2.gif' /></p> 
    </div>
    
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <table width="100%">
          <tr>
            <th><a
              <?php if (CONTROLLER_NAME == 'Index' && ACTION_NAME == 'index') {?> id='nava' <?php }?>
             href="/index.php" style="color:red;">首页</a></th>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cateinfo']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <th><a 
                <?php if (CONTROLLER_NAME == 'Blog' && ACTION_NAME == 'showlist' && $_GET['cate_id'] == $_smarty_tpl->tpl_vars['v']->value['cate_id']) {?> id='nava' <?php }?>
                href="/index.php?p=home&c=blog&a=showlist&cate_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</a></th>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </tr>
        </table>
      </div>
       <!--nav end--><?php }
}
