<?php

// 注销的本质就是删除所有的会话数据
// 删除cookie数据
setCookie('user_id','',time()-1,'/','bbs.com');

// 删除session数据
session_start();
unset($_SESSION['userInfo']);

// 跳转到首页或其他的页面
header("location:../index.php");