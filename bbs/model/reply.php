<?php

// 1,加载项目初始化文件
include '../init.php';

// 6, 判断用户是否登录
include DIR_MODEL . 'session_front.php';
// 2,加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3,接收pub_id
$pub_id = $_GET['pub_id'];

// 4,获取发帖者（楼主）的相关资源结果集
$sql = "select * from publish where pub_id=$pub_id";
$result = my_query($sql);//资源结果集
$row = mysql_fetch_assoc($result); //数组

// 5,加载视图文件
include DIR_VIEW . 'reply.html';
