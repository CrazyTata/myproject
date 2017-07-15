<?php
header("content-type:text/html;charset=utf-8");
$redis = new Redis();
$redis->connect('192.168.245.128');
$redis->auth('root');
$res = $redis->lpop('name1');
if($res){
	echo '抢购成功!';//实际中是跳转到订单页面,并且修改库存
}else{
	echo '抢购失败!';
}