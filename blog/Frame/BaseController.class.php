<?php

class BaseController{
    //$view成员是protected，使得子类可以直接访问
    protected $view = null; //声明一个view成员，接收smarty对象
    //构造方法
    function __construct(){
        //实例化smarty对象
        $this ->view = new Smarty();
        //设置模板文件的存储目录
        $this ->view->setTemplateDir(PLAT_PATH.'View'.DS.CONTROLLER_NAME.DS);
        //设置混编文件的存储目录
        $this->view->setCompileDir(PLAT_PATH.'View_c'.DS.CONTROLLER_NAME.DS);
    }

    //封装display方法
    function display($tpl_name){
        $this -> view -> display($tpl_name);
    }
    //封装assign方法
    function assign($name,$value){
        $this -> view -> assign($name,$value);
    }
}
