<?php

// 1,加载项目初始化文件
include '../init.php';

session_start();
// 3,判断是否设置了cookie变量user_id
if(isset($_COOKIE['user_id']) && isset($_SESSION['userInfo'])) {
	// 说明用户设置了7天免登录而且还没有到期
	header("location:./publish.php");
}

// 2,加载视图文件
include DIR_VIEW . 'login.html';