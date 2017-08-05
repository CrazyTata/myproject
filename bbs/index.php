<?php

// 1,加载项目初始化文件
include './init.php';

session_start();
// 3, 判断用户是否设置了7天免登录
if(isset($_COOKIE['user_id'])) {
	// 此时，应该主动的为用户创建会话数据区
	include DIR_CORE . 'MySQLDB.php';
	$user_id = (int)$_COOKIE['user_id'];
	$sql = "select * from user where user_id=$user_id";
	$result = my_query($sql);
	$row = mysql_fetch_assoc($result);// 提取了用户的信息
	// 将用户的信息存放到会话数据区
	$_SESSION['userInfo'] = $row;
}

// 2,加载视图文件
include DIR_VIEW . 'index.html';