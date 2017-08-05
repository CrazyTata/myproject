<?php

class IndexController extends HomeController{
    //首页面
    function index(){
        //获得博文列表信息
        $blog = new BlogModel();
        $bloginfo = $blog->homegetBlogListInfo();
        $this -> assign('bloginfo',$bloginfo);

        $this -> display('index.html');
    }
}
