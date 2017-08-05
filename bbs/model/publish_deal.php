<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收表单数据
$title = trim($_POST['title']);
$content =  addslashes(trim($_POST['content']));

// 4, 判断提交数据的合法性
if($title == '' || $content == '') {
	// 非法的数据，跳转
	header("refresh:2;url=./publish.php");
	die("发帖失败！标题和内容都不能为空！");
}

// 5, 数据入库
// $pub_owner = "游客"; // 这里应该的登录者的名字，暂时全部用游客
// 提取当前登录者的名字
session_start();
$pub_owner = $_SESSION['userInfo']['user_name'];
$pub_time = time();
$sql = "insert into publish values(null,'$title','$content','$pub_owner',$pub_time,default)";
// 执行
$result = my_query($sql);

// 6,判断执行结果
if($result) {
	// 发帖成功
	header("location:./list_father.php");// 直接跳转
}else {
	// 发帖失败
	header("refresh:2;url=./publish.php");
	die("发帖失败！发生未知错误！");
}






/*create table publish(
	pub_id int primary key auto_increment comment '主键ID',
	pub_title varchar(50) not null comment '帖子的标题',
	pub_content text not null comment '帖子的内容',
	pub_owner varchar(20) not null comment '发帖者(楼主)',
	pub_time int unsigned not null comment '发帖的时间戳',
	pub_hits int unsigned not null default 0 comment '浏览次数'
);
*/