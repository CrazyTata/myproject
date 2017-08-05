<?php

class CateController extends BackController{
    //添加分类
    function tianjia(){
        //两个逻辑：展示表单、收集表单信息
        if(!empty($_POST)){
            //①收集表单信息
            $shuju['cate_name']         = $_POST['cate_name'];
            $shuju['cate_description']  = $_POST['cate_description'];
            $shuju['is_show']           = $_POST['is_show'];

            //利用model进行数据存储
            $cate = new CateModel();
            $z = $cate -> insertData($shuju);
            if($z){
                //添加成功，页面跳转到“分类列表”页面
                //header("location:/index.php?p=back&c=cate&a=showlist");
                $this -> mysuccess('添加成功','/index.php?p=back&c=cate&a=showlist',1);
            }else{
                //添加失败，页面直接原地跳转Cate/tianjia
                //header("location:/index.php?p=back&c=cate&a=tianjia");
                $this -> myerror('添加失败','/index.php?p=back&c=cate&a=tianjia',1);
            }
        }else{
            //②展示表单
            $this -> display('tianjia.html');
        }
    }    
    //分类列表展示
    function showlist(){
        //实例化model对象
        $cate = new CateModel();
        $info = $cate -> getAllData();  //获得全部的分类列表信息

        $this -> assign('info',$info);
        $this -> display('showlist.html');
    }

    //修改分类
    function upd(){
        //展示两个逻辑：展示修改表单、收集表单
        if(!empty($_POST)){
            //收集表单入库存储
            $shuju['cate_id']           = $_POST['cate_id'];
            $shuju['cate_name']         = $_POST['cate_name'];
            $shuju['cate_description']  = $_POST['cate_description'];
            $shuju['is_show']           = $_POST['is_show'];

            //利用CateModel进行数据修改
            $cate = new CateModel();
            $z = $cate -> saveData($shuju);
            if($z){
                $this->mysuccess('修改分类成功','/index.php?p=back&c=cate&a=showlist',3);
            }else{
                $this->myerror('修改分类失败','/index.php?p=back&c=cate&a=upd&cate_id='.$shuju['cate_id'],3);
            }
        }else{
            //展示修改表单
            //接收get方式传递过来的cate_id信息
            $cate_id = $_GET['cate_id'];
            //查询$cate_id对应的记录信息
            $cate = new CateModel();
            //获得当前被修改的分类信息
            $info = $cate -> getInfoById($cate_id);
            $this -> assign('info',$info);

            $this -> display('upd.html');
        }

    }

    //删除分类
    function del(){
        $cate_id = $_GET['cate_id'];
        //利用CateModel删除$cate_id对应记录
        $cate = new CateModel();
        $z = $cate -> deleteData($cate_id);
        if($z){
            $this->mysuccess('删除分类成功','/index.php?p=back&c=cate&a=showlist',3);
        }else{
            $this->myerror('删除分类失败','/index.php?p=back&c=cate&a=showlist',3);
        }
    }
}
