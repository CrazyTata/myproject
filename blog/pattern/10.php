<?php

header("content-type:text/html;charset=utf-8");

//模式修正符
//i: 忽略大小写
$str = "HelloBeiJing";
$pat = "/[a-z]+/"; //Array ( [0] => ello ) 
$pat = "/[a-z]+/i";//Array ( [0] => HelloBeiJing ) 

//U: 就近匹配，避免贪婪匹配
$str = "<h1>itcast</h1>";
$pat = "/<.*>/"; //Array([0] => <h1>itcast</h1>) 【贪婪匹配】
$pat = "/<.*>/U"; //Array( [0] => <h1>)  【就近匹配】

$str = "<a>baidu</a><a>sohu</a>";
$pat = "#<a>.*</a>#";//Array(  [0] => <a>baidu</a><a>sohu</a>) 【贪婪匹配】
$pat = "#<a>.*</a>#U";//Array(  [0] => <a>baidu</a>) 【就近匹配】

//多个模式修正符"组合"使用
$str = "<A>baidu</a><A>sohu</a>";
$pat = "#<a>.*</a>#iU";//Array(    [0] => <A>baidu</a>) 【就近匹配】

preg_match($pat,$str,$out);
print_r($out);



