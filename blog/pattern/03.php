<?php

//特别字符集
//*  		表示其前面那个单元出现0次或以上 任意次数
$pat = "/go*gle/";
$str = "google"; //Array ( [0] => google ) 
$str = "ggle";  //Array ( [0] => ggle ) 
$str = "goooooooogle";//Array ( [0] => goooooooogle ) 

//+  		表示其前面那个单元出现1次或以上 任意次数
$pat = "/go+gle/";
$str = "google";//Array ( [0] => google ) 
$str = "goooooooogle";//Array ( [0] => goooooooogle ) 
$str = "ggle";//Array ( )   不成

//* 和 + 的不同使用
$str = "today is 20161026";
$pat = "/[0-9]+/";//Array ( [0] => 20161026 ) 
$pat = "/[0-9]*/";//Array ( [0] => )  匹配到today前边位置，具体匹配到0个数字

//?  		表示其前面那个单元出现0次或1次  要么出现、要么不出现
$pat = "/go?gle/";
$str = "gogle";//Array ( [0] => gogle ) 
$str = "ggle";//Array ( [0] => ggle ) 
$str = "gooogle";//Array ( ) 

preg_match($pat,$str,$out);
print_r($out);
