<?php

class BackController extends BaseController{
    //执行动作成功跳转逻辑
    //$msg: 提示信息
    //$url: 跳转地址
    //$time: 倒数时间
    function mysuccess($msg,$url,$time){
        //利用定界符方式输出一大段字符串信息
        echo <<<eof
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <h2>$msg</h2>
    <span style="font-size:100px; font-weight:bold;">:)</span>
    <p>页面在<span id="second">$time</span>秒后会自动跳转，或直接点击<a id="tiao" href="$url">跳转</a></p>
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
    //执行动作失败跳转逻辑
       function myerror($msg,$url,$time){
        //利用定界符方式输出一大段字符串信息
        echo <<<eof
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <h2>$msg</h2>
    <span style="font-size:100px; font-weight:bold;">:(</span>
    <p>页面在<span id="second">$time</span>秒后会自动跳转，或直接点击<a id="tiao" href="$url">跳转</a></p>
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
