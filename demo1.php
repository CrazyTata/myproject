<?php
header("content-type:text/html;charset=utf-8");
include('sphinxapi.php');
//创建一个对象
$sc = new SphinxClient();
//连接服务器,端口是9312
$sc->setServer('localhost','9312');

//可以设置匹配模式,主要有五种
//SPH_MATCH_ALL ： 匹配所有查询词（默认）
//SPH_MATCH_ANY：匹配查询词中的任意一个。
// SPH_MATCH_PHRASE：将整个查询词看做一个词组，要完全匹配
// SPH_MATCH_BOOLEAN : 将查询看作一个布尔表达式
// SPH_MATCH_EXTENDED : 查询看做一个sphinx的表达式

//设置偏移量:参数是偏移量和步长
$sc->setLimits(0,10);
//查询的两个参数,一个是关键词,一个是使用的索引
$indexname = 'address';
$keywords  = '长沙市浏阳市';
$res = $sc->query($keywords,$indexname);
// var_dump($res['matches']);
//$res里面是一个数组,数组里面有matches这个下标,这个下标对应数组是一个二维数组
//数组里面的键就是数据库存的id值
$id = array_keys($res['matches']);
$id = implode(',',$id); //此时将id拼接成了一个字符串
$link = mysql_connect('localhost','root','root');
mysql_query('set names utf8');
mysql_query('use new_address');
$sql = "select comname,comaddress from address where id in($id)";
$res = mysql_query($sql);
$result = array();
while($row = mysql_fetch_assoc($res)){
	$result[] = $row;
}
// var_dump($result);
// 给关键字高亮显示buildExcerpts,参数有输出的数据,索引名称,关键词,设置样式
// 返回值为索引数组
foreach($result as $v){
	$v = $sc->buildExcerpts($v,$indexname,$keywords,array(
			'before_match'=>'<font style="color:red">',
			'after_match' =>'</font>'
		));
	echo $v[1],'<br/>',$v[2],'<hr>';
}