<?php

header("content-type:text/html;charset=utf-8");

//单次匹配
$str = "2016-10-26 16:40:37";
$pat = "/\d+/";  //Array ( [0] => 2016 )   【单次匹配】
preg_match($pat,$str,$out);
print_r($out);


echo "<br /><br />";

//全局匹配
$str = "2016-10-26 16:40:37";
$pat = "/\d+/";  //Array ( [0] => Array ( [0] => 2016 [1] => 10 [2] => 26 [3] => 16 [4] => 40 [5] => 37 ) ) 【全局匹配结果】
preg_match_all($pat,$str,$out);
print_r($out);

