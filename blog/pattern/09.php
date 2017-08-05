<?php
//特别字符集
header("content-type:text/html;charset=utf-8");
//()作用
//② 从大的内容里边拆分小的内容出来

$str = "2016-10-26";
$pat = "/^[0-9]+-([0-9]+)-([0-9]+)$/";//Array ( [0] => 2016-10-26 [1] => 10 [2] => 26 ) 

preg_match($pat,$str,$out);
print_r($out);
echo "<p>month:".$out[1]."</p>";
echo "<p>date:".$out[2]."</p>";


