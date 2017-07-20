<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/20
 * Time: 19:56
 */
//制作二维码
header("content-type:text/html;charset=utf-8");
include_once 'wechat.class.php';
$wechat = new wechat();
$token = $wechat->get_token()->access_token;
$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$token";
$data = '{"expire_seconds": 2592000, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": 8888}}}';
$result = $wechat->url_request($url,$data);
$result = json_decode($result);
$ticket = $result->ticket;
$ticket = urlencode($ticket);
$url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=$ticket";//TICKET提醒：TICKET记得进行UrlEncode返回说明
$qr = $wechat->url_request($url);
file_put_contents('./images/qr.jpg',$qr);