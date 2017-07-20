<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/19
 * Time: 20:37
 */
//群发消息
include_once 'wechat.class.php';
//include_once 'upload_files.php';
//$media_id = upload_files();
$wechat = new wechat();
$token = $wechat->get_token()->access_token;
$url = "https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=$token";
//发送文本消息
//$data = '{
//   "touser":[
//    "o5PiAxBOSAXD81GaEp6vgBnawLk4",
//    "o5PiAxDMmSSwkLEdF6tbJKGhCkPE"
//   ],
//    "msgtype": "text",
//    "text": { "content": "我是群发的,再不吵你啦"}
//}';
//发送图片消息
$data= '{
   "touser":[
    "o5PiAxBOSAXD81GaEp6vgBnawLk4",
    "o5PiAxDMmSSwkLEdF6tbJKGhCkPE"
   ],
   "image":{
      "media_id":"O3EOToi08LySa27mibiZbhm7gIsqOza8ylaq21mngd25L45U3nKRa0g7WXOR0mKF"
   },
    "msgtype":"image"
}';
$result = $wechat->url_request($url,$data);
var_dump($result);