<?php 
$redis = new Redis();
$redis->connect('192.168.245.128');
$redis->auth('root');
// $redis->set('age',12);
// $redis->lpush('name1','xiaohei');
// for($i=0;$i<100;$i++){
	$redis->lpush('goods',1);
// }