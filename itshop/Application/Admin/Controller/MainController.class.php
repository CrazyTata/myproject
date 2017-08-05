<?php
namespace Admin\Controller;
//use Think\Controller;

class MainController extends CommonController{
    function index(){
        //框架页面
        $this->display();
    }
    
    function top(){
        $this->display();
    }
    function left(){
        $mg_name = session('mg_name');
        if($mg_name == 'super'){
            $authA = D('Auth')->where("auth_pid=0 and auth_show=1")->select();
            $authB = D('Auth')->where("auth_pid!=0 and auth_show=1")->select();
            $this->assign('authA', $authA);
            $this->assign('authB', $authB);
        } else {
            //1. 从session中拿到mg_roleid
            $mg_roleid = session('mg_roleid');
            //2. 实例化Role模型，查询role_auth_ids
            $role_info = D('Role')->field("role_auth_ids")->find($mg_roleid);
            $role_auth_ids = $role_info['role_auth_ids'];
            //3. 根据role_auth_ids从Auth表查询具体的权限,分一二级来获取
            $authA = D('Auth')->where("auth_id in ($role_auth_ids) and auth_pid=0 and auth_show=1")->select();
            $authB = D('Auth')->where("auth_id in ($role_auth_ids) and auth_pid!=0 and auth_show=1")->select();
            $this->assign('authA', $authA);
            $this->assign('authB', $authB);
        }
        
        
        $this->display();
    }
    function main(){
        $this->display();
    }
}





