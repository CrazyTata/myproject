<?php
//特别字符集
//$  		匹配目标字符串的”结尾”位置
$str = "monkey like peach or banana";
$pat = "/banana$/"; //在目标字符串结尾位置有出现bananan
                    //Array ( [0] => banana ) 
$pat = "/monkey$/";//Array ( ) 
$pat = "/peach$/";//Array ( ) 

//^  		(托字符)匹配目标字符串的”开始”位置
$pat = "/^monkey/"; //在目标字符串开始位置有出现，monkey
                    //Array ( [0] => monkey ) 
$pat = "/^banana/";//Array ( ) 

preg_match($pat,$str,$out);
print_r($out);

