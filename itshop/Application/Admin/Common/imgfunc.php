<?php

function upload_imgs(){
    //1. 设置文件上传配置项
    $config = C('UPLOAD_IMG');
    //2. 实例化文件上传类
    $uploader = new \Think\Upload($config);
    //3. 调用upload方法上传文件
    $upload_result = $uploader->upload();
    //4. 返回上传结果
    if(!$upload_result){
        return $uploader->getError();
    } else {
        return $upload_result;
    }
}

function thumb_img($pic_arr){
    //1. 实例化Image类
    $img = new \Think\Image();
    //2. 载入要操作的图片
    $pic_path = C('UPLOAD_IMG')['rootPath'].$pic_arr['savepath'].$pic_arr['savename'];
    $img->open($pic_path);
    //3. 调用缩略图方法
    $img->thumb(200, 200);
    //4. 保存缩略图
    $small_path = C('UPLOAD_IMG')['rootPath'].$pic_arr['savepath'].'thumb_'.$pic_arr['savename'];
    $img->save($small_path);
    //返回小图路径
    return $small_path;
}














