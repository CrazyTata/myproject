<?php

class BlogModel extends BaseModel{
    //定义数据表名称
    private $tablename = "bg_blog";

    //获得全部的博文列表信息
    function getAllData(){
        //① 联表获得cate分类的名称信息
        //② 使用from_unixtime()把时间戳变为“格式化”时间并设置别名为blogtime
        $sql = "select a.*,b.cate_name,from_unixtime(a.add_time) blogtime from {$this->tablename} a join bg_cate b on a.cate_id=b.cate_id where a.is_del='0' order by blog_id desc";
        return $this->db->fetchAll($sql);
    }

    //前台获得博文列表信息
    //① 获得"全部分类"的博文,条件是$cate_id=0
    //② 获得"指定分类"的博文,条件是$cate_id!=0
    function homegetBlogListInfo($cate_id=0){
        //需要bg_blog和gb_cate连表查询
        $s = "";
        if($cate_id!=0){
            $s = " and c.cate_id='$cate_id'";
        }
        $sql = "select b.*,c.cate_name,from_unixtime(b.add_time) blogtime from bg_blog b join bg_cate c on b.cate_id=c.cate_id where c.is_show='0' and b.is_show='0' and b.is_del='0' ";
        $sql .= $s;
        $sql .= " order by c.cate_id,b.blog_id";
        return $this ->db->fetchAll($sql);
    }

    //添加博文
    function insertData($args){
        //使用简单变量拆分$args
        $cate_id        = $args['cate_id'];
        $blog_title     = $args['blog_title'];
        $blog_content   = $args['blog_content'];
        //分析数据表中有一些字段(只有not null没有default)必须要求填充
        $add_time = time();
        $upd_time = time();

        $sql = "insert into {$this->tablename} (cate_id,blog_title,blog_content,add_time,upd_time) values ('$cate_id','$blog_title','$blog_content','$add_time','$upd_time')";
        return $this->db->query($sql);
    }

    //修改博文，数据入库处理
    function saveData($args){
        //简单变量接收$args数据
        $blog_id        = $args['blog_id'];
        $cate_id        = $args['cate_id'];
        $blog_title     = $args['blog_title'];
        $blog_content   = $args['blog_content'];
        //对upd_time修改时间进行更新
        $upd_time = time();
        $sql = "update {$this->tablename} set cate_id='$cate_id',blog_title='$blog_title',blog_content='$blog_content',upd_time='$upd_time' where blog_id='$blog_id'";
        return $this->db->query($sql);
    }

    //删除博文记录，逻辑删除
    //形参$blog_id：被删除记录的id值
    function deleteData($blog_id){
        $sql = "update {$this->tablename} set is_del='1' where blog_id=$blog_id";
        return $this->db->query($sql);
    }

    //根据$blod_id获得指定的博文记录信息
    function getInfoById($blog_id){
        $sql = "select * from {$this->tablename} where blog_id='$blog_id'";
        return $this->db->fetchRow($sql);
    }    
    //前台 根据$blod_id获得指定的博文记录信息
    function homegetInfoById($blog_id){
        //需要连表获得分类名称
        $sql = "select b.*,c.cate_name from {$this->tablename} b join bg_cate c on b.cate_id=c.cate_id where b.blog_id='$blog_id'";
        return $this->db->fetchRow($sql);
    }
}
