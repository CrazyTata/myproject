<?php
//特别字符集
header("content-type:text/html;charset=utf-8");
//()作用
//② 从大的内容里边拆分小的内容出来
$str = "<h1>航天员天宫生活一周多了 他们到底经历了什么？</h1>";

//把h1标签包含的字符串信息给匹配出来
$pat = "!<h1>(.*)</h1>!";
/*Array
(
    [0] => <h1>航天员天宫生活一周多了 他们到底经历了什么？</h1>
    [1] => 航天员天宫生活一周多了 他们到底经历了什么？
)
*/
preg_match($pat,$str,$out);
//print_r($out);
echo $out[1];//航天员天宫生活一周多了 他们到底经历了什么？

