<?php

class BlogController extends BackController{
    //添加博文
    function tianjia(){
        //两个逻辑：展示、收集
        if(!empty($_POST)){
            //收集信息
            $shuju['cate_id']       = $_POST['cate_id'];
            $shuju['blog_title']    = $_POST['blog_title'];
            $shuju['blog_content']  = $_POST['blog_content'];

            //通过BlogModel实现数据存储
            $blog = new BlogModel();
            $z = $blog -> insertData($shuju);
            if($z){
                $this -> mysuccess('添加成功','/index.php?p=back&c=blog&a=showlist',1);
            }else{
                $this -> myerror('添加失败','/index.php?p=back&c=blog&a=tianjia',1);
            }
        }else{
            //获得并传递"分类"信息
            $cate = new CateModel();
            $cateinfo = $cate -> getAllData();
            $this -> assign('cateinfo',$cateinfo);

            $this -> display('tianjia.html');
        }
    }   

    //博文列表展示 
    function showlist(){
        //获得博文列表信息(利用BlogModel模型)
        $blog = new BlogModel();
        $info = $blog->getAllData();
        $this -> assign('info',$info);

        $this -> display('showlist.html');
    }

    //修改博文
    function upd(){
        if(!empty($_POST)){
            //整理收集的信息
            $shuju['blog_id']       = $_POST['blog_id'];
            $shuju['cate_id']       = $_POST['cate_id'];
            $shuju['blog_title']    = $_POST['blog_title'];
            $shuju['blog_content']  = $_POST['blog_content'];

            //通过BlogModel把数据存储给数据库
            $blog = new BlogModel();
            $z = $blog -> saveData($shuju);
            if($z){
                $this -> mysuccess('修改成功','/index.php?p=back&c=blog&a=showlist',1);
            }else{
                $this -> myerror('修改失败','/index.php?p=back&c=blog&a=upd&blog_id='.$shuju['blog_id'],1);
            }
        }else{
            //通过BlogModel模型把被修改博文的信息获得出来
            $blog_id = $_GET['blog_id'];
            $blog = new BlogModel();
            $bloginfo = $blog -> getInfoById($blog_id);
            //把博文信息传递给模板
            $this -> assign('bloginfo',$bloginfo);

            //获得并传递"分类"信息
            $cate = new CateModel();
            $cateinfo = $cate -> getAllData();
            $this -> assign('cateinfo',$cateinfo);

            $this -> display('upd.html');
        }

    }

    //删除博文
    function del(){
        $blog_id = $_GET['blog_id'];
        //通过CateModel删除$blog_id的记录信息
        $blog = new BlogModel();
        $z = $blog->deleteData($blog_id);
        if($z){
            $this -> mysuccess('删除成功','/index.php?p=back&c=blog&a=showlist',1);
        }else{
            $this -> myerror('删除失败','/index.php?p=back&c=blog&a=showlist',1);
        }
    }
}
