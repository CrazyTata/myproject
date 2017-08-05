<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    function _initialize(){
        if(!session('?mg_id')){
            $this->error('您尚未登录，请登录后再访问', U('Index/login'), 3);
        }
        
        $mg_name = session('mg_name');
        if($mg_name != 'super'){
            //获取当前控制器-方法
            $now_path = CONTROLLER_NAME.'-'.ACTION_NAME;
            //获取role表中的role_auth_path
            $mg_roleid = session('mg_roleid');
            $role_info = D('Role')->field("role_auth_path")->find($mg_roleid);
            //将role_auth_path拆解为一个数组
            $path = explode(',', $role_info['role_auth_path']);
            if(!in_array($now_path, $path)){
                $this->error('您无权访问该页面,请重新登录后再访问', U('Index/login'), 3);
            }
        }
       
    }
}