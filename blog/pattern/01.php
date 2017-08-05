<?php

//正则表达式简单匹配使用

//① 获得一个被匹配的目标字符串内容
$str = "2016beijing-2008beijing";
//② 设计一个正则表达式
$pat = "/beijing/";
//③ 正则表达式去匹配目标内容
//   preg_match(正则，目标内容，匹配结果[，下标信息]);
preg_match($pat,$str,$out);
//打印匹配到的结果
print_r($out);

echo "<hr />";

preg_match($pat,$str,$out1,PREG_OFFSET_CAPTURE);
print_r($out1);