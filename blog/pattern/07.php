<?php
//特别字符集

//()作用
//① 提高子表达式优先级
$pat = "/(go)+gle/";
$str = "gogle";//Array ( [0] => gogle [1] => go ) 
$str = "gogogogogogle";//Array ( [0] => gogogogogogle [1] => go ) 

preg_match($pat,$str,$out);
print_r($out);

echo "<br /><br />";

$pat = "/(go)+(gl)(e)/";
$str = "gogogle";//Array ( [0] => gogogle [1] => go [2] => gl [3] => e ) 
preg_match($pat,$str,$out);
print_r($out);
