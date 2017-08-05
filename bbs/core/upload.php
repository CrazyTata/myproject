<?php

/**
 * 文件上传
 * @param array $file 上传的文件的信息（是一个数组，有5个元素）
 * @param array $allow 允许的文件上传的类型
 * @param string & $error 引用传递，用来记录错误信息
 * @param string $path 文件上传目录
 * @param int $maxsize = 1024*1024 允许上传的文件的大小
 * @return mixed false|$newname 如果上传失败就返回false，成功就返回文件的新名字
 */
function upload($file,$allow,& $error,$path,$maxsize=1048576) {
	// 1,先验证系统错误
	switch($file['error']) {
		case 1 : $error = '上传错误，超出了文件限制的大小！'; 
				 return false;
		case 2 : $error = '上传错误，超出了浏览器表单允许的大小！';
				 return false;
		case 3 : $error ='上传错误，文件上传不完整！';
			     return false;  
		case 4 : $error = '上传错误，请您先选择要上传的文件！';
				 return false;
		case 6 : 
		case 7 : $error = '对不起，服务器繁忙，请稍后再试！';
				 return false;
	}
	// 2,判断逻辑错误
	// 2.1 验证文件的大小
		if($file['size'] > $maxsize){ 
			// 超出了用户自己规定的文件大小
			$error = "上传错误，超出了文件限制的大小！";
			return false;
		}
	// 2.2判断文件的类型
	if(!in_array($file['type'],$allow)) {
		// 非法的文件类型
		$error = "上传的文件的类型不正确，允许的类型有：" . implode(',',$allow);
		return false;
	}
	// 3, 移动临时文件
	// 指定文件上传后保存的路径
	// 先得到文件的新名字
	$newname = randName($file['name']);
	$target = $path . '/' . $newname;
	$result = move_uploaded_file($file['tmp_name'],$target);
	if($result) {
		// 上传成功
		return $newname;
	}else {
		// 上传失败
		$error = "发生未知错误，上传失败！";
		return false;
	}
}
/**
 * 生成一个随机名字的函数 文件名 = 当前时间 + 随机的几位数字
 * @param string $filename 文件的原始名字
 * @return string $newname 文件的新名字
 */
function randName($filename) {
	// 1, 生成文件名的时间部分
	$newname = date('YmdHis');
	// 2, 加上随机的6位数
	$str = "0123456789";
	for($i=0;$i<6;$i++) {
		$newname .= $str[mt_rand(0,strlen($str)-1)];
	}
	// 3, 加上文件的后缀名
	$newname .= strrchr($filename,'.');
	return $newname;
}