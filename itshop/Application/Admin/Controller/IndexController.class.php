<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function login(){
        if(IS_POST){
            //1. 接收用户名和密码
            $username = I('post.username');
            $password = I('post.password');
            //2. 实例化manager模型
            $Manager_model = D('Manager');
            //调用验证方法
            $check_result = $Manager_model->checkLogin($username, $password);
            if($check_result){
                $this->success('登录成功', U('Main/index'), 3);
            } else {
                $this->error('登录失败', U('login'), 3);
            }
        } else {
            $this->display();
        }
    }
}