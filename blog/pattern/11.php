<?php

header("content-type:text/html;charset=utf-8");

//单次匹配
$str = "2016-10-26 16:40:37";
$pat = "/\d/";  //Array ( [0] => 2 )  【单次匹配】
preg_match($pat,$str,$out);
print_r($out);

echo "<br /><br />";

//全局匹配
$str = "2016-10-26 16:40:37";
$pat = "/\d/";  //Array ( [0] => Array ( [0] => 2 [1] => 0 [2] => 1 [3] => 6 [4] => 1 [5] => 0 [6] => 2 [7] => 6 [8] => 1 [9] => 6 [10] => 4 [11] => 0 [12] => 3 [13] => 7 ) ) 
preg_match_all($pat,$str,$out);
print_r($out);


