<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/6/4
 * Time: 19:29
 */
//print_r($_FILES);
if($_FILES['pic']['error'] > 0){
    die("文件上传错误!");
}else{
    $picture_name = $_FILES['pic']['name'];
    $ext = substr($picture_name,strrpos($picture_name,'.'));
    $path = "./Uploads/";
    $name_ = date('YmdHis').'_'.mt_rand(1000,9000).$ext;
    $new_name = $path.$name_;
//    var_dump($new_name);
    $res = move_uploaded_file($_FILES['pic']['tmp_name'],$new_name);
    if($res){
        echo 'success';
    }else{
        echo 'error';
    }

}