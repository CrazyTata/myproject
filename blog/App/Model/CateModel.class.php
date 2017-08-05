<?php

class CateModel extends BaseModel{
    //定义数据表名称
    private $tablename = "bg_cate";

    //获得全部分类信息
    function getAllData(){
        $sql = "select * from {$this->tablename} order by cate_id desc";
        return $this->db -> fetchAll($sql);
    }  

    //前台获得全部分类信息(显示正常的分类[非删除的])
    function homegetAllData(){
        $sql = "select * from {$this->tablename} where is_show='0' order by cate_id desc";
        return $this->db -> fetchAll($sql);
    }   


    //实现给当前的数据表添加数据
    function insertData($args){
        //使用“简单变量”接收传递过来的参数信息
        $name           = $args['cate_name'];
        $description    = $args['cate_description'];
        $show           = $args['is_show'];
        $sql = "insert into {$this->tablename} (cate_name,cate_description,is_show)values('$name','$description','$show')";
        return $this -> db -> query($sql);
    }

    //实现数据修改
    function saveData($args){
        $id             = $args['cate_id'];
        $name           = $args['cate_name'];
        $description    = $args['cate_description'];
        $show           = $args['is_show'];
        $sql = "update {$this->tablename} set cate_name='$name',cate_description='$description',is_show='$show' where cate_id='$id'";
        return $this->db->query($sql);
    }

    //根据$id参数删除指定的记录信息
    function deleteData($id){
        $sql = "delete from {$this->tablename} where cate_id='$id'";
        return $this->db->query($sql);
    }

    //根据id获得指定的一条记录信息
    function getInfoById($id){
        $sql = "select * from bg_cate where cate_id='$id'";
        return $this->db->fetchRow($sql);
    }

}
