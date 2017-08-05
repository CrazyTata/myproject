<?php

class BaseModel{
    protected $db = null;
    //构造方法
    function __construct(){
        global $config;
        //实例化DB类操作对象
        $this -> db = DB::getInstance($config);
    }
}
