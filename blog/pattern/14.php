<?php

//匹配"邮箱"的正则表达式
/*
邮箱示意：
xiaoming@163.com
xiaoming666@163.com
297398238@qq.com
xiaoming567@sohu.com
XiaoMing137@126.com.cn
XiaoMing.137@126.com.cn.gov
① 邮箱名字长度为6位以上
② 后缀名(.com .cn等) 可以是1个或多个
③ 邮箱中间有@符号
④ 名字的组成内容有 字母、数字、字母数字混合、大小写字母、字母数字.点混合
⑤ 开始的第一个字符要求是 数字、大小写字母(不能是.点)
*/

$pat = "/^[a-z1-9][a-z0-9\.]{5,}@(\d+|[a-z]+)(\.[a-z]+)+$/i";

$str = "abc";//Array ( ) 
$str = "xiaoming@163.com";//Array ( [0] => xiaoming@163.com [1] => 163 [2] => .com ) 
$str = "XiaoMing.137@126.com.cn.gov";//Array ( [0] => XiaoMing.137@126.com.cn.gov [1] => 126 [2] => .gov ) 
$str = "xiaoming567@sohu.com";//Array ( [0] => xiaoming567@sohu.com [1] => sohu [2] => .com ) 
$str = "xi567@sohu.com";//Array ( ) 

preg_match($pat,$str,$out);
print_r($out);
