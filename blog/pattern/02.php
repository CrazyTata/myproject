<?php
$str = "beiJING-2016";

$pat = "#[0-9]#";//Array ( [0] => 2 ) 
$pat = '#[a-z]#'; //Array ( [0] => b ) 
$pat = "/[A-Z]/";//Array ( [0] => J ) 
$pat = "/[a-zA-Z0-9]/"; //Array ( [0] => b ) 
$pat = "/[c-h]/";//Array ( [0] => e ) 
$pat = "/[5-7]/";//Array ( [0] => 6 ) 
$pat = "/[Gyt7]/";//Array ( [0] => G ) 
$pat = "/[7-9-]/";//Array ( [0] => - ) 

$pat = "/[4-1]/"; //有报错

preg_match($pat,$str,$out);
print_r($out);
