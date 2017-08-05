<?php

//"自定义函数"设置为自动加载机制
function myjiazai($name){
    include __DIR__."/".$name.".class.php";
}

//把myjiazai注册成为“自动加载机制”
spl_autoload_register('myjiazai');

$kitty = new Cat();
var_dump($kitty);

