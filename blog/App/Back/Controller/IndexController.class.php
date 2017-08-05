<?php

class IndexController extends BackController{
    //首页面
    function index(){
        $this -> display('index.html');
    }
}