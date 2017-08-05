<?php

class UserController extends HomeController{
    //login登录系统
    function login(){
        if(!empty($_POST)){
            //收集用户名和密码信息
            $user_name = $_POST['user_name'];
            $user_pwd = $_POST['user_pwd'];
            //通过UserModel对比校验 用户名/密码 是否正确
            $user = new UserModel();
            //homecheckNamePwd()校验用户名和密码
            //① 正确：返回用户的 bg_user表 整条的记录信息
            //② 错误：返回null即可
            $userinfo = $user -> homecheckNamePwd($user_name,$user_pwd);
            if($userinfo){
                //会员激活判断
                if($userinfo['email_active']==1){
                    //session持久化用户信息
                    $_SESSION['user_id']   = $userinfo['user_id'];
                    $_SESSION['user_name'] = $userinfo['user_name'];
                    //页面跳转到网站首页面
                    header("location:/index.php");
                }else{
                    echo "该会员还没有激活帐号";
                }
            }else{
                echo "用户名或密码错误";
            }
        }
        $this->display('login.html');
    }  

    //会员退出系统
    function logout(){
        //销毁session
        session_destroy();
        //页面跳转到首页
        header("location:/index.php");
    }  
    
    //注册
    function register(){
        if(!empty($_POST)){
            //整理收集的信息
            $shuju['user_name']     = $_POST['user_name'];
            $shuju['user_pwd']      = $_POST['user_pwd'];
            $shuju['user_email']    = $_POST['user_email'];
            $shuju['user_sex']      = $_POST['user_sex'];
            $shuju['user_tel']      = $_POST['user_tel'];

            //1) 对手机号码进行校验
            $tel_pat = "/^1[358]\d{9}$/";
            $tel_verify = preg_match($tel_pat,$shuju['user_tel']);
            if(!$tel_verify){//校验失败
                //给模版传递错误信息
                $this -> assign('tel_verify_result','手机号码不合法');
            }
            //2) 对邮箱进行校验
            $email_pat = "/^[a-z1-9][a-z0-9\.]{5,}@(\d+|[a-z]+)(\.[a-z]+)+$/i";
            $email_verify = preg_match($email_pat,$shuju['user_email']);
            if(!$email_verify){//校验失败
                //给模版传递错误信息
                $this -> assign('email_verify_result','邮箱不合法');
            }

            //手机号码、邮箱 全部校验通过才进行会员注册/存储数据逻辑
            if($tel_verify && $email_verify){
                //利用UserModel存储数据
                $user = new UserModel();
                $id = $user -> homeinsertData($shuju); //获得新会员主键id值
                if($id){
                    //① 当前会员id
                    //② 邮件激活码(15位)，算法计算即可
                    $code = substr(md5($shuju['user_email'].time().mt_rand(1000,9999)),-15);
                    
                    //把激活码update更新给刚刚添加的记录里边
                    $user -> homesaveEmailCode($id,$code);

                    //组织邮件内容
                    $link = "http://web.blog51.com/index.php?p=home&c=user&a=active&user_id=".$id."&code=".$code;
                    $cont  = "请点击以下链接地址，以便激活会员帐号";
                    $cont .= "<p><a href='$link'>$link</a></p>";

                    //③ 发送激活邮件
                    sendMail($shuju['user_email'],'新会员注册激活帐号',$cont);

                    $this->success_jump('注册成功，请登录邮箱激活帐号后才可以登录系统','/index.php?c=user&a=login',3);
                }else{
                    $this->error_jump('注册失败','/index.php?c=user&a=register',2);
                }
            }else{
                //表单验证失败，把收集的form表单信息再传递给模版显示
                //避免用户重复输入
                $this -> assign('shuju',$shuju);
            }
        }
        $this->display('register.html');
    }

    //激活会员帐号
    function active(){
        //接收get参数
        $user_id = $_GET['user_id'];
        $code = $_GET['code'];

        $user = new UserModel();
        //调用UserModel方法激活会员
        $z = $user -> homeactiveUser($user_id,$code);
        if($z){
            $this->success_jump('帐号激活成功','/index.php?p=home&c=user&a=login',5);
        }else{
            $this->success_jump('帐号激活失败','/index.php?p=home&c=user&a=login',2);
        }
    }
}
