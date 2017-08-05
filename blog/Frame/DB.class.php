<?php

class DB{
    private $host;
    private $port;
    private $user;
    private $pass;
    private $charset;
    private $dbname;

    private $link;
    private static $instance;

    private function __construct($params = array()){
        $this->host = isset($params['host'])?$params['host']:'127.0.0.1';
        $this->port = isset($params['port'])?$params['port']:'3306';
        $this->user = isset($params['user'])?$params['user']:'root';
        $this->pass = isset($params['pass'])?$params['pass']:'123456';
        $this->charset = isset($params['charset'])?$params['charset']:'utf8';
        $this->dbname = isset($params['dbname'])?$params['dbname']:'';
    
        $this->connect();
        $this->setCharset();
        $this->selectDB();
    }

    private function connect(){
        if(!$link = mysql_connect("$this->host:$this->port",$this->user,$this->pass)){
            //失败执行代码
            echo '连接失败,请检查mysql服务器与用户信息';
            die;
        }else{
            //成功执行代码
            $this->link = $link;
        }
    }
    //执行sql语句：具体有 添加、修改、删除
    public function query($sql){
        if(!$result = mysql_query($sql,$this->link)){
            //执行失败
            echo 'SQL执行失败<br />';
            echo '错误语句:',$sql,'<br />';
            echo '错误代码:',mysql_errno($this->link),'<br />';
            echo '错误信息:',mysql_error($this->link),'<br />';
            die;
        }else{
            //执行成功
            return $result;
        }
    }

    //执行insert语句，返回新记录的主键id值
    public function addData($sql){
        if(!$result = mysql_query($sql,$this->link)){
            //执行失败
            echo 'SQL执行失败<br />';
            echo '错误语句:',$sql,'<br />';
            echo '错误代码:',mysql_errno($this->link),'<br />';
            echo '错误信息:',mysql_error($this->link),'<br />';
            die;
        }else{
            //执行成功
            $newid = mysql_insert_id(); //获得新记录的主键id值
            return $newid;
        }
    }


    private function setCharset(){
        $sql = "set names $this->charset";
        return mysql_query($sql);
    }

    private function selectDB(){
        if($this->dbname === ''){
            return;
        }
        $sql = "use `$this->dbname`";
        return $this->query($sql);
    }

    //单例模式
    public static function getInstance($params=array()){
        if(!(self::$instance instanceof self)){
            self::$instance = new self($params);
        }
        return self::$instance;
    }
    private function __clone(){}

    //取得二维数组
    public function fetchAll($sql){
        if($result = $this->query($sql)){
            $rows = array();
            while($row = mysql_fetch_assoc($result)){
                $rows[] = $row;
            }
            mysql_free_result($result);
            return $rows;
        }else{
            return false;
        }
    }

    //取得一条数据
    public function fetchRow($sql){
        if($result = $this->query($sql)){
            $row = array();
            $row = mysql_fetch_assoc($result);
            mysql_free_result($result);
            return $row;
        }else{
            return false;
        }
    }

    //取得第一条记录第一个字段的值
    public function fetchColumn($sql){
        if($result = $this->query($sql)){
            $row = array();
            $row = mysql_fetch_row($result);
            mysql_free_result($result);
            return $row[0];
        }else{
            return false;
        }
    }
        
}