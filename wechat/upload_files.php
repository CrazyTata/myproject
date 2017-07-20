<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/19
 * Time: 20:02
 */
//上传多媒体文件
function upload_files(){
    include_once 'wechat.class.php';
    $wechat = new wechat();
    $token = $wechat->get_token();
    $token = $token->access_token;
    $type = 'image';
    $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=$token&type=$type";
    $data['media'] = '@'.__DIR__.'\images\5.png';
//echo __DIR__;die;
    $str = $wechat->url_request($url,$data);
    $json =json_decode($str);
//var_dump($json);die;
    $media_id = $json->media_id;
    return $media_id;
}
echo upload_files();