<?php

//自动加载
//关键字__autload()函数自动加载
function __autoload($name){
    include $name.".class.php";
}

//只要有需求，该__autoload()也可以注册
spl_autoload_register('__autoload');

$kitty = new Cat();
var_dump($kitty);

