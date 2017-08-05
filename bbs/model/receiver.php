<?php

// 1,加载项目初始化文件
include '../init.php';

// 2,连接数据库
/*$link = mysql_connect('127.0.0.1:3306','root','zhouyang888');
mysql_query("set names utf8");
mysql_query("use bbs");*/
include DIR_CORE . 'MySQLDB.php';

// 3,接收数据
$username = trim($_POST['username']);
$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);
$vcode = trim($_POST['vcode']);

// 7, 验证用户填写的验证码是否正确
session_start();
if(strtolower($vcode) != strtolower($_SESSION['captcha'])) {
	// 验证码非法
	// 非法，跳转
	header("refresh:2;url=./register.php");
	die("验证码不正确，请您重新注册！");
}

// 4,判断数据的合法性
// 4.1 判断用户名和密码是否为空
if($username == '' || $password1 == '' || $password2 == '') {
	// 非法，跳转
	header("refresh:2;url=./register.php");
	die("用户名或密码都不能为空，请您重新注册！");
}
// 4.2 判断用户两次输入的密码是否一致
if($password1 !== $password2) {
	// 非法，跳转
	header("refresh:2;url=./register.php");
	die("两次输入的密码不一样，请您重新注册！");
}
// 4.3 判断用户名是否已经存在
$sql = "select * from user where user_name='$username'";
my_query($sql); 
if(mysql_affected_rows() > 0) {
	// 说明用户已经存在
	// 非法，跳转
	header("refresh:2;url=./register.php");
	die("您注册的用户名已经存在，请您重新注册！");
}

// 5,验证结束,把用户的注册信息写入数据库（入库）
$password = md5($password1);
$sql = "insert into user values(null,'$username','$password',default)";
// echo $sql;die;
$result = my_query($sql);

// 6,跳转到首页或者登陆页面
if($result) {
	// 注册成功,跳转到登录页面
	header("refresh:2;url=./login.php");
	die("注册成功,2秒后跳转到登录页面！");
}else {
	// 插入记录失败
	header("refresh:2;url=./register.php");
	die("注册失败,发生未知错误，请您重新注册！");
}