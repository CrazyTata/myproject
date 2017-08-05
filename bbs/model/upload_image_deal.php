<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3, 加载上传函数的文件
include DIR_CORE . 'upload.php';

// 4, 确定upload函数的参数
$file = $_FILES['image'];
$allow = array('image/jpg','image/jpeg','image/gif','image/png');
$path = DIR_ROOT . 'uploads/images';
$maxsize = 1048576;

// 5, 调用上传函数
$result = upload($file,$allow,$error,$path,$maxsize);

// 6, 判断是否上传成功
if(!$result) {
	// 上传失败
	echo $error;
	header("refresh:2;url=./upload_image.php");
	die;
}else {
	// 上传成功，需要把当前的新头像的名字入库
	// 确定当前登录者的用户名
	session_start();
	$user_name = $_SESSION['userInfo']['user_name'];
	// 先根据用户名提取该用户的旧的头像名
	$old_sql = "select user_image from user where user_name='$user_name'";
	$old_result = my_query($old_sql);
	$old_row = mysql_fetch_assoc($old_result);
	$old_name = $old_row['user_image'];
	// 入库,更新
	$sql = "update user set user_image='$result' where user_name='$user_name'";
	$res = mysql_query($sql);
	if($res) {
		// 应该在新头像上传成功后删除旧头像
		unlink($path . '/' . $old_name);
		echo "<script>alert('上传成功!')</script>";
		header("refresh:0;url=./list_father.php");
	}else {
		header("refresh:2;url=./upload_image.php");
		die("发生未知错误，请重新上传！");
	}
}



/**
 * 文件上传
 * @param array $file 上传的文件的信息（是一个数组，有5个元素）
 * @param array $allow 允许的文件上传的类型
 * @param string & $error 引用传递，用来记录错误信息
 * @param string $path 文件上传目录
 * @param int $maxsize = 1024*1024 允许上传的文件的大小
 * @return mixed false|$newname 如果上传失败就返回false，成功就返回文件的新名字
 */