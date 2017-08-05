<?php
namespace Admin\Model;
use Think\Model;
class ManagerModel extends Model{
    function checkLogin($username, $password){
        //1. 根据用户名从Manager中获取数据
        $mg_info = $this->where("mg_name='{$username}'")->find();
        if(empty($mg_info)){
            return false;
        }
        
        //2. 判断数据表取出的密码和用户输入的密码是否一致
        if($mg_info['mg_passwd'] == salt($password)){
            //记录session
            session('mg_id', $mg_info['mg_id']);
            session('mg_name', $mg_info['mg_name']);
            session('mg_roleid', $mg_info['mg_roleid']);
            
            return true;
        } else {
            return false;
        }
    }
}