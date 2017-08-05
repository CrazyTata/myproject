<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    function register(){
        if(IS_POST){
            //1. 接收表单数据
            $name = I('post.username');
            $pass = I('post.password');
            $nick = I('post.nickname');
            //2. 生成自定义盐
            load('@/myfunc');
            $salt = makeSalt();
            //3. 实例化member模型，调用add方法将用户写入数据表
            $arr = array(
                'mem_name' => $name,
                'mem_passwd' => salt($pass, $salt),
                'mem_nickname' => $nick,
                'mem_salt' => $salt
            );
            $add_result = D('Member')->add($arr);
            if($add_result){
                //注册成功后，将会员信息保存到session中
                session('mem_id', $add_result);
                session('mem_name', $name);
                
                $this->success('注册会员成功', U('Index/index'), 3);
            } else {
                $this->error('注册会员失败');
            }
        } else {
            $this->display();
        }
    }
    
    function login(){
        if(IS_POST){
            $name = I('post.username');
            $pass = I('post.password');
            
            //实例化Member模型,根据用户名取出用户数据
            $mem_info = D('Member')->where("mem_name='$name'")->find();
            if(empty($mem_info)){
                $this->error('用户名或密码错误');
            }
            
            if(salt($pass, $mem_info['mem_salt']) == $mem_info['mem_passwd']){
                session('mem_id', $mem_info['mem_id']);
                session('mem_name', $mem_info['mem_name']);
                session('mem_nick', $mem_info['mem_nickname']);
                
                //登录成功后，将cookie中的购物车，写入MySQL
                $cart = new \Think\Cart();
                $cart->cookieToMysql(session('mem_id'));
                
                //接收要跳转的控制器和方法名
                $c = I('get.tc');
                $a = I('get.ta');
                //如果没有指定跳转的控制器和方法，默认跳转到Index/index
                if(empty($c) && empty($a)){
                    $c = 'Index';
                    $a = 'index';
                }
                //修改U方法，实现根据参数进行跳转
                $this->success('登录成功', U($c.'/'.$a), 3);
            } else {
                $this->error('用户名或密码错误');
            }
        } else {
            $this->display();
        }
        
    }
    
    function logout(){
        session(null);
        $this->success('退出成功', U('Index/index'), 3);
    }
}
















