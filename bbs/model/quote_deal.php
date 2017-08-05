<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 判断用户是否登录
include DIR_MODEL . 'session_front.php';

// 3, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 4 ,接收数据
$num = $rep_num = $_GET['num'];//引用的楼层数
$pub_id = $rep_pub_id = $_GET['pub_id']; // 楼主的id号
$rep_id = $rep_quote_id = $_GET['rep_id']; // 被引用的帖子的id号
$content = $rep_content = addslashes(strip_tags(trim($_POST['content'])));

// 5, 判断数据的合法性
if($rep_content == '') {
	// 数据非法，跳转
	header("refresh:2;url=./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id");
	die("回复的内容不能为空！");
}

// 6, 数据入库
session_start();
$rep_user = $_SESSION['userInfo']['user_name'];
$rep_time = time();
// 准备sql语句
$sql = "insert into reply values(null,$rep_pub_id,'$rep_user','$rep_content',$rep_time,$rep_num,$rep_quote_id)";
// 执行
$result = mysql_query($sql);
if($result) {
	header("location:./show.php?pub_id=$pub_id&action=reply");
}else {
	// 入库失败
	header("refresh:2;url=./quote.php?num=$num&pub_id=$pub_id&rep_id=$rep_id");
	die("回帖失败，发生未知错误！");
}





/*create table reply(
	rep_id int primary key auto_increment comment '主键ID',
	rep_pub_id int unsigned not null comment '楼主的帖子的ID',
	rep_user varchar(20) not null comment '回复者的名字',
	rep_content text not null comment '回复的内容',
	rep_time int unsigned not null comment '回帖的时间戳'
);

alter table reply add rep_num int unsigned not null default 0;

alter table reply add rep_quote_id int unsigned not null default 0;*/