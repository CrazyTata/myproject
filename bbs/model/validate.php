<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 接收表单数据
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// 4, 验证用户和密码的合法性
// 4.1 验证用户名是否存在
$sql = "select * from user where user_name='$username'";
$result = my_query($sql);
if(mysql_affected_rows() == 0) {
	// 用户名不存在
	// 非法，跳转
	header("refresh:2;url=./login.php");
	die("您输入的用户名不存在，请重新登录！");
}

// 4.2 验证密码是否正确
$row = mysql_fetch_assoc($result); // 得到一个数组
$user_password = $row['user_password'];

if($user_password === md5($password)) {
	// 验证成功
	// 判断用户是否选择了7天免登录
	if(isset($_POST['remember'])) {
		// 说明用户选择了
		setCookie('user_id',$row['user_id'],time() + 604800,'/','bbs.com');
	}
	// 为用户建立会话数据区，将用户的信息保存在session之中
	// 开启session
	session_start();
	$_SESSION['userInfo'] = $row;
	// 跳转
	header("refresh:2;url=./publish.php");
	die("登录成功，2秒后自动跳转到发帖页面！");
}else {
	// 验证失败
	// 非法，跳转
	header("refresh:2;url=./login.php");
	die("您输入的密码不正确，请重新登录！");
}
