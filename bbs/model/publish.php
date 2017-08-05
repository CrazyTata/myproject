<?php

// 1, 加载项目初始化文件
include '../init.php';

// 3,判断用户是否登录
include DIR_MODEL . 'session_front.php';
/*session_start();
if(!isset($_SESSION['userInfo'])) {
	// 说明用户没有登录
	// 跳转
	header("refresh:2;url=./login.php");
	die("请您先登录！");
}*/
// 2, 加载视图文件
include DIR_VIEW . 'publish.html';