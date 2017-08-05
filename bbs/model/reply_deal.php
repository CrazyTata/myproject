<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收数据
$pub_id = $rep_pub_id = $_POST['pub_id']; //楼主帖子的id号
$content = $rep_content = trim($_POST['content']);

// 4,判断回复内容的合法性
if($rep_content == '') {
	// 非法，跳转
	header("refresh:2;url=./reply.php?pub_id=$pub_id");
	die('回复的内容不能为空！');
}

// 5,数据入库（写入reply表）
// $rep_user = "游客";//这里应该是登录者的名字
// 提取当前登录者的名字
session_start();
$rep_user = $_SESSION['userInfo']['user_name'];
$rep_time = time();
$sql = "insert into reply values(null,$rep_pub_id,'$rep_user','$rep_content',$rep_time,default,default)";
$result = my_query($sql); // 布尔值

// 6,判断
if($result) {
	// 回复成功，立即跳转
	header("location:./show.php?pub_id=$pub_id&action=reply");
}else {
	// 回复失败
	header("refresh:2;url=./reply.php?pub_id=$pub_id");
	die('回复失败，发生未知错误！');
}



/*create table reply(
	rep_id int primary key auto_increment comment '主键ID',
	rep_pub_id int unsigned not null comment '楼主的帖子的ID',
	rep_user varchar(20) not null comment '回复者的名字',
	rep_content text not null comment '回复的内容',
	rep_time int unsigned not null comment '回帖的时间戳'
);*/