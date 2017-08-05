<?php
namespace Admin\Controller;
//use Think\Controller;

class AttributeController extends CommonController{
    function attrList(){
        $attr_model = D('Attribute');
        $attr_list = $attr_model->alias('a')
            ->field("a.attr_id,a.attr_name,c.cate_name,a.attr_type,a.attr_value")
            ->join("left join sp_cate c on a.attr_cateid=c.cate_id")
            ->select();
        $this->assign('attr_list', $attr_list);
        $this->display();
    }
    
    function addAttr(){
        if(IS_POST){
            //1. 实例化Attribute模型
            $attr_model = D('Attribute');
            //2. 调用create方法，收集表单数据
            $attr_info = $attr_model->create();
            //将多值当中的中文逗号转为英文逗号
            $attr_info['attr_value'] = str_replace('，', ',', $attr_info['attr_value']);
            //3. 将属性写入数据表
            if($attr_model->add($attr_info)){
                $this->success('添加属性成功');
            } else {
                $this->error('添加属性失败');
            }
        } else {
            $cate_model = D('Cate');
            //获取一级分类
            $cate_list = $cate_model->where("cate_pid=0")->select();
            $this->assign('cate_list', $cate_list);
            $this->display();
        }
        
    }
    
    function getAttr(){
        //1. 接收cate_id
        $cate_id = I('post.cate_id');
        //2. 实例化Attribute模型，查询属性信息
        $attr_list = D('Attribute')->where("attr_cateid=".$cate_id)->select();
        //3. 输出返回给前台
        echo json_encode($attr_list);
    }
}














