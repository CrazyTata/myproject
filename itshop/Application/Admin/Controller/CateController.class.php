<?php
namespace Admin\Controller;
//use Think\Controller;

class CateController extends CommonController{
    function cateList(){
        $cate_list = D('Cate')->select();
        $cate_list = getTree($cate_list);
        $this->assign('cate_list', $cate_list);
        $this->display();
    }
    
    function addCate(){
        $cate_model = D('Cate');
        if(IS_POST){
            //1. 接收表单数据
            $cate_info = $cate_model->create();
            //dump($cate_info);die;
            //2. 调用add方法写入数据表
            if($cate_model->add($cate_info)){
                $this->success('添加分类成功');
            } else {
                $this->error('添加分类失败');
            }
            
        } else {
            $cate_list = $cate_model -> select();
            //调用getTree函数重构cate_list
            $cate_list = getTree($cate_list);
            $this->assign('cate_list', $cate_list);
            $this->display();
        }
        
    }
    
    function getCate(){
        //1. 接收cate_id
        $cate_id = I('get.cate_id');
        //2. 实例化Cate模型，查询二级分类数据
        //条件： cate_pid=$cate_id
        $cate_list = D('Cate')->where("cate_pid=".$cate_id)->select();
        //3. 返回查询结果
        echo json_encode($cate_list);
    }
}













