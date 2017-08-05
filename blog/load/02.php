<?php

//把一个类的静态方法设置成“自动加载机制”
class Animal{
    public static function jiazai($name){
        //__DIR__:代表当前的02.php文件的绝对目录信息
        include(__DIR__.'/'.$name.".class.php");
    }
}

//把Animal的jiazai注册为“自动加载机制”
spl_autoload_register(array('Animal','jiazai'));

$wangcai = new Dog();
var_dump($wangcai);
