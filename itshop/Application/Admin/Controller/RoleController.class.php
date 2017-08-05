<?php
namespace Admin\Controller;
class RoleController extends CommonController{
    function roleList(){
        $role_list = D('Role')->select();
        $this->assign('role_list', $role_list);
        $this->display();
    }
    
    function distribute(){
        if(IS_POST){
            //接收auth_id  (数组)
            $auth_id = I('post.auth_id');
            //将auth_id拼接为一个字符串, 该数据写入到role_auth_ids字段中
            $auth_id = implode(',', $auth_id);
            //拼接role_auth_path字段值
            // 查询Auth表 ,将role_auth_ids作为查询条件
            // select * from sp_auth where auth_id in (1,2,3,7,8)
            $auth_list = D('Auth')->where("auth_id in ($auth_id)")->select();
            // 取出auth_c和auth_a 拼接为字符串  Goods-addGoods,Goods-goodsList,Cate-addCate
            $role_auth_path = 'Main-index,Main-top,Main-left,Main-main,';
            foreach($auth_list as $value){
                //判断当前权限节点是否为一级节点，如果不是一级才进行拼接
                if($value['auth_pid'] != 0){
                    $role_auth_path .= $value['auth_c'].'-'.$value['auth_a'].',';
                }
            }
            $role_auth_path = rtrim($role_auth_path,',');
            //修改role表，根据role_id，修改role_auth_path和role_auth_ids
            $save_arr = array(
                'role_id' => I('post.role_id'),
                'role_auth_ids' => $auth_id,
                'role_auth_path' => $role_auth_path
            );
            
            if(D('Role')->save($save_arr)){
                $this->success('分配权限成功', U('Role/roleList'), 3);
            } else {
                $this->error('分配权限失败');
            }
        } else {
            //接收role_id，根据role_id读取角色名
            $role_id = I('get.role_id');
            $role_info = D('Role')->find($role_id);
            $this->assign('role_info', $role_info);
            
            //读取auth表中的所有数据，分一二级进行读取
            $auth_model = D('Auth');
            $authA = $auth_model->where("auth_pid=0")->select();
            $authB = $auth_model->where("auth_pid!=0")->select();
            $this->assign('authA', $authA);
            $this->assign('authB', $authB);
            
            $this->display();
        }
    }
}















