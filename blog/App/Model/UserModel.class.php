<?php

class UserModel extends BaseModel{
    //定义数据表名称
    private $tablename = "bg_user";

    //用户注册存储数据
    function homeinsertData($args){
        //使用简单变量拆分$args
        $user_name  = $args['user_name'];
        $user_pwd   = md5($args['user_pwd']);
        $user_email = $args['user_email'];
        $user_sex   = $args['user_sex'];
        $user_tel   = $args['user_tel'];
        //填充必须的字段
        $add_time = time();
        $login_time = time();

        $sql = "insert into {$this->tablename} (user_name,user_pwd,user_email,user_sex,user_tel,add_time,login_time) values ('$user_name','$user_pwd','$user_email','$user_sex','$user_tel','$add_time','$login_time')";
        return $this->db->addData($sql);
    }
    //把邮件激活码更新给当前的会员记录
    function homesaveEmailCode($id,$code){
        $sql = "update {$this->tablename} set email_code='$code' where user_id='$id'";
        return $this->db->query($sql);
    }

    //新会员帐号激活
    function homeactiveUser($user_id,$code){
        //避免已经激活的会员重复激活
        //1) 根据$user_id查看对应的记录信息
        $sql = "select email_code from {$this->tablename} where user_id='$user_id'";
        $email_code = $this->db->fetchColumn($sql);
        //2) 再者把 记录的code 与 $code 做对比激活
        if($code == $email_code){
            //激活动作: email_active=1 和 email_code=''
            $sql = "update {$this->tablename} set email_active='1',email_code='' where user_id='$user_id'";
            return $this->db->query($sql);
        }else{
            return false;
        }
    }

    //前台用户登录系统，用户名和密码真实校验
    function homecheckNamePwd($name,$pwd){
        //两个步骤实现校验
        //①： 根据$name查询是否存在一条记录信息
        $sql = "select * from {$this->tablename} where user_name='$name'";
        $rst = $this->db->fetchRow($sql);
        //②： ①成立条件下，①记录的密码  和 $pwd 做比较是否相等
        if($rst){
            if($rst['user_pwd'] === md5($pwd)){
                return $rst;
            }
        }
        return null;
    }
}
