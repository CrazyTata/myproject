<?php

class HomeController extends BaseController{
    //构造方法
    function __construct(){
        //为了避免父类的构造方法被覆盖(重写)，需要先调用父类的构造方法
        parent::__construct();

        //获得分类信息
        $cate = new CateModel();
        $cateinfo = $cate -> homegetAllData();
        $this -> assign('cateinfo',$cateinfo);

        //开启session
        session_start();
    }

    //操作成功的处理逻辑
    function success_jump($msg,$url,$time){
        echo <<<eof
<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <title> ICBlog 博客系统</title>
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/admin_login.css" rel="stylesheet" type="text/css">
</head>
<body class="bg_test">
<div class="admin_login_wrap">
    <h1>操作结果提示：</h1>
    <div class="adming_login_border">
        <div class="admin_input" style="margin:100px 20px;text-align:center;">
            <span style='font-size:60px;font-weight:bold;'>:)$msg</span>            
            <p><br>页面经过<span id="second">$time</span>秒后就<a href="$url" id="tiao">跳转</a>走</p>
        </div>
    </div>
</div>
<div id="footer"><p class="copyright">  © 2016 Powered by <a href="http://www.itcast.cn" target="_blank">传智播客</a></p></div>
</body></html>
<script type="text/javascript">
    var url = document.getElementById('tiao').href;
    function daoshu(){
        var scd = document.getElementById('second');
        var time = --scd.innerHTML;
        if(time<=0){
            window.location.href = url;
            clearInterval(mytime);
        }
    }
    var mytime = setInterval("daoshu()",1000);
</script>
eof;
    }
    //操作失败的处理逻辑
    function error_jump(){
    echo <<<eof
<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <title> ICBlog 博客系统</title>
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/admin_login.css" rel="stylesheet" type="text/css">
</head>
<body class="bg_test">
<div class="admin_login_wrap">
    <h1>操作结果提示：</h1>
    <div class="adming_login_border">
        <div class="admin_input" style="margin:100px 20px;text-align:center;">
            <span style='font-size:60px;font-weight:bold;'>:($msg</span>            
            <p><br>页面经过<span id="second">$time</span>秒后就<a href="$url" id="tiao">跳转</a>走</p>
        </div>
    </div>
</div>
<div id="footer"><p class="copyright">  © 2016 Powered by <a href="http://www.itcast.cn" target="_blank">传智播客</a></p></div>
</body></html>
<script type="text/javascript">
    var url = document.getElementById('tiao').href;
    function daoshu(){
        var scd = document.getElementById('second');
        var time = --scd.innerHTML;
        if(time<=0){
            window.location.href = url;
            clearInterval(mytime);
        }
    }
    var mytime = setInterval("daoshu()",1000);
</script>
eof;
    }
}
