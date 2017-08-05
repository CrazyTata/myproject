<?php
//特别字符集
//.点		匹配除换行符 \n之外的任何单字符, 例如 .* 表示匹配任何内容
$str = "sk29383KL#@$%^&(*&*%&^%*<>>";
$pat = "/.*/";//Array ( [0] => sk29383KL#@$%^&(*&*%&^%*<>> )

$str = "sk29383\nKL#@$%^&(*&*%&^%*<>>";
$pat = "/.*/";//Array ( [0] => sk29383 ) 

//\  		这个符号是用来转义的，去除符号的特殊意思，只保留符号的本质意思
$str = "5+4=?";
$pat = "/[0-9]\+[0-9]=\?/";//Array ( [0] => 5+4=? ) 

//|  		指明两项之间只选择一个，或 的意思
$str = "monkey like peach or banana";
$pat = "/pear|banana/";//Array ( [0] => banana ) 
$pat = "/peach|orange|apple/";//Array ( [0] => peach ) 

preg_match($pat,$str,$out);
print_r($out);
