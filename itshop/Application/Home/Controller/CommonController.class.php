<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    function _initialize(){
        //获取当前访问的控制器-方法字符串
        $ac = CONTROLLER_NAME.'-'.ACTION_NAME;
        $this->assign('ac', $ac);
        
        //1. 获取cate表中所有数据
        $cate_list = D('Cate')->select();
        //2. 调用getTree重新构造$cate_list,
        //关键是重构后有level字段
        $cate_list = getTree($cate_list);
        //dump($cate_list);
        //3. 根据level字段的值将$cate_list拆分为3个数组
        $cateA = array();
        $cateB = array();
        $cateC = array();
        
        foreach($cate_list as $value){
            if($value['level'] == 0){
                $cateA[] = $value;
            } else if($value['level'] == 1){
                $cateB[] = $value;
            } else {
                $cateC[] = $value;
            }
        }
        
        $this->assign('cateA', $cateA);
        $this->assign('cateB', $cateB);
        $this->assign('cateC', $cateC);
    }
}