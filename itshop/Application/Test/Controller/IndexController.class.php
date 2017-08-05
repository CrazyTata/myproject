<?php
namespace Test\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //echo salt('123');die;
        //1. 使用load函数加载函数文件
        load('@/myfunc');
        //2. 调用myfunc.php文件中的函数
        aaa();
        $this->display();
    }
    
    function xss(){
        if(IS_POST){
            $content = $_POST['content'];
            //调用filterXSS方法来过滤$content中script标签，并且保留img标签
            $content = filterXSS($content);
            echo $content;
        } else {
            $this->display();
        }
    }
    
    function tree(){
        $array = array(
            array('cate_id'=>1, 'cate_name'=>'图像,音像', 'cate_pid'=>0),
            array('cate_id'=>2, 'cate_name'=>'家用电器', 'cate_pid'=>0),
            array('cate_id'=>3, 'cate_name'=>'电子书', 'cate_pid'=>1),
            array('cate_id'=>4, 'cate_name'=>'大电器', 'cate_pid'=>2),
            array('cate_id'=>5, 'cate_name'=>'免费', 'cate_pid'=>3),
            array('cate_id'=>6, 'cate_name'=>'小说', 'cate_pid'=>3),
            array('cate_id'=>7, 'cate_name'=>'电视机', 'cate_pid'=>4),
            array('cate_id'=>8, 'cate_name'=>'电冰箱', 'cate_pid'=>4),
            array('cate_id'=>9, 'cate_name'=>'音像', 'cate_pid'=>1),
            
        );
    
        
        $result = getTree($array);
        
        foreach($result as $value){
            echo str_repeat('&emsp;', $value['level']).$value['cate_name']."<br>";
        }
    }
    
    function include_test(){
        $this->display();
    }
}













