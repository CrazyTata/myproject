<?php

// 1,加载项目初始化文件
include '../init.php';

// 2,加载数据库连接文件
include DIR_CORE . 'MySQLDB.php';

// 3,接收pub_id
$pub_id = $_GET['pub_id'];

// 6,每点一次，都要使当前的楼主的pub_hits字段加1
if(!$_GET['action']) {
	$sql = "update publish set pub_hits=pub_hits+1 where pub_id=$pub_id";
	my_query($sql);
}

// 4,提取楼主的资源结果集
$sql = "select * from publish left join user on pub_owner=user_name where pub_id=$pub_id";
$result = my_query($sql);//得到资源结果集
// 提取资源结果集，得到一个数组
$row = mysql_fetch_assoc($result);

# 以下的代码都和分页相关

// (1) 定义当前选中的页码数
$pageNum = isset($_GET['num']) ? $_GET['num'] : 1;

// (2) 定义每一页显示的记录数
$rowsPerPage = 5;

// (3) 查询总记录
$sql = "select count(*) as sum from reply where rep_pub_id=$pub_id";
$result = my_query($sql);
$row_num = mysql_fetch_assoc($result);
$rowCount = $row_num['sum']; // 得到总记录数

// (4) 计算总页数
$pages = ceil($rowCount/$rowsPerPage); // 得到总页数

// (5)拼凑页码字符串
$strPage = '';//页码字符串
// 拼凑出首页
$strPage .= "<a href='./show.php?pub_id=$pub_id&action=reply&num=1'>首页</a>";

// 拼凑出上一页
$preNum = $pageNum == 1 ? 1 : $pageNum - 1;
$strPage .=  "<a href='./show.php?pub_id=$pub_id&action=reply&num=$preNum'><<上一页</a>";

// 拼凑出中间的页码
// 确定显示的初始页$startNum
if($pageNum <= 3) {
	$startNum = 1;
}else {
	$startNum = $pageNum - 2;
}
// 确定显示的初始页$startNum的最大值
if($startNum > $pages - 4) {
	$startNum = $pages - 4;
} 
// 防止页码出现负值
if($startNum <= 1) {
	$startNum = 1;
}

// 确定显示的最后一页$endNum
$endNum = $startNum + 4;

// 防止最后一页越界
if($endNum >= $pages) {
	$endNum = $pages;
}

// 拼凑出中间的页码
for($i=$startNum;$i<=$endNum;$i++) {
	// 如果$i刚好是选中的当前页，标红
	if($i == $pageNum) {
		$strPage .=  "<a href='./show.php?pub_id=$pub_id&action=reply&num=$i'><font color='red'>$i</font></a>";
	}else {
		$strPage .=  "<a href='./show.php?pub_id=$pub_id&action=reply&num=$i'>$i</a>";
	}	
}

// 拼凑出下一页
$nextNum = $pageNum == $pages ? $pages : $pageNum + 1;
$strPage .=  "<a href='./show.php?pub_id=$pub_id&action=reply&num=$nextNum'>下一页>></a>";

// 拼凑出尾页
$strPage .=  "<a href='./show.php?pub_id=$pub_id&action=reply&num=$pages'>尾页</a>";

// 拼凑出总页数
$strPage .= "总页数:$pages";
# 分页到此结束

// 6,提取回帖的相关资源结果集
$offset = $rowsPerPage*($pageNum - 1);
$rep_sql = "select * from reply left join user on rep_user=user_name where rep_pub_id=$pub_id order by rep_time limit {$offset},{$rowsPerPage}";
$rep_result = my_query($rep_sql); // 得到资源结果集
// $rep_num = mysql_affected_rows();  // 得到的永远是5
$num_result = my_query("select * from reply where rep_pub_id=$pub_id");
$rep_num = mysql_num_rows($num_result);

// 5, 加载视图文件
include DIR_VIEW . 'show.html';
