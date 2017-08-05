<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收数据
$num = $_GET['num'];//引用的楼层数
$pub_id = $_GET['pub_id']; // 楼主的id号
$rep_id = $_GET['rep_id']; // 被引用的帖子的id号

// 4, 提取楼主的帖子的信息
$sql = "select * from publish where pub_id=$pub_id";
$result = my_query($sql);
$row = mysql_fetch_assoc($result);// 楼主的数组信息

// 5, 提取被引用的帖子的信息
$rep_sql = "select * from reply where rep_id=$rep_id";
$rep_result = my_query($rep_sql);
$rep_row = mysql_fetch_assoc($rep_result); // 被引用的帖子的数组信息

// 6, 加载视图文件
include DIR_VIEW . 'quote.html';
