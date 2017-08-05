<?php

class BlogController extends HomeController{
    //详情
    function detail(){
        //接收blog_id,并获得对应的详情博文信息
        $blog_id = $_GET['blog_id'];
        $blog = new BlogModel();
        $bloginfo = $blog -> homegetInfoById($blog_id);
        $this -> assign('bloginfo',$bloginfo);


        $this -> display('detail.html');
    }

    //列表
    function showlist(){
        //接收cate_id的信息，并获得对应的博文列表信息
        $cate_id = $_GET['cate_id'];
        $blog = new BlogModel();
        $bloginfo = $blog->homegetBlogListInfo($cate_id);
        $this -> assign('bloginfo',$bloginfo);
        
        $this -> display('showlist.html');
    }    
}
