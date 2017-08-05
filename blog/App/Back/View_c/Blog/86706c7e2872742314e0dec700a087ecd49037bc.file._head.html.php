<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 10:02:19
         compiled from "E:\web\php51\blog\App\Back\View\Pub\_head.html" */ ?>
<?php /*%%SmartyHeaderCode:3198957ddf5ab44c780-02219218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86706c7e2872742314e0dec700a087ecd49037bc' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Pub\\_head.html',
      1 => 1474163663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3198957ddf5ab44c780-02219218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57ddf5ab48b6f5_44603249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddf5ab48b6f5_44603249')) {function content_57ddf5ab48b6f5_44603249($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('CSS_URL');?>
common.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('CSS_URL');?>
main.css"/>
    <script type="text/javascript" src="<?php echo @constant('JS_URL');?>
libs/modernizr.min.js"></script>
    <script type="text/javascript" src="<?php echo @constant('JS_URL');?>
jquery1.42.min.js"></script>
    
    <script >
        $(function(){
            $("#nowtime").css({color:'red'});
            window.setInterval('ShowTime()',1000);
        });
        function ShowTime(){
            var t = new Date();
            var str = t.getFullYear() + '年';
            str += t.getMonth() + '月';
            str += t.getDate() + '日 ';
            str += t.getHours() + ':';
            str += t.getMinutes() + ':';
            str += t.getSeconds() + '';
            $("#nowtime").html(str);
        }
    </script>
    
</head>
<body>


<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="http://www.jscss.me">修改密码</a></li>
                <li><a href="http://www.jscss.me">退出</a></li>
            </ul>
        </div>
    </div>
</div><?php }} ?>
