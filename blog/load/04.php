<?php
//设置“多个”加载机制
//"自定义函数"设置为自动加载机制
function myjiazai($name){
    echo "myjiazai:".$name."<br />";
    $filename = __DIR__."/".$name.".class.php";
    //文件存在才引入
    if(file_exists($filename)){
        include $filename;
    }
}
//把myjiazai注册成为“自动加载机制”
spl_autoload_register('myjiazai');

function yourjiazai($name){
    echo "yourjiazai:".$name."<br />";
    $filename = __DIR__.'/libs/'.$name.".class.php";
    if(file_exists($filename)){
        include $filename;
    }
}
spl_autoload_register('yourjiazai');

class Animal{
    public static function jiazai($name){
        echo "function:".$name."<br />";
        $filename = __DIR__.'/com/'.$name.".class.php";
        if(file_exists($filename)){
            include $filename;
        }
    }
}
//把Animal的jiazai注册为“自动加载机制”
spl_autoload_register(array('Animal','jiazai'),false,true);

function __autoload($name){
    echo "__autoload:".$name."<br />";
    $filename = __DIR__.'/abc/'.$name.".class.php";
    if(file_exists($filename)){
        include $filename;
    }
}
spl_autoload_register('__autoload',false,true);
$xiaohei = new Pig();

