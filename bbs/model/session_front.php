<?php

// 判断用户是否登录
session_start();
if(!isset($_SESSION['userInfo'])) {
	// 说明用户没有登录
	// 跳转
	header("refresh:2;url=./login.php");
	die("请您先登录！");
}