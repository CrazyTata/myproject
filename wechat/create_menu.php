<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/19
 * Time: 18:02
 */
//创建菜单
include_once 'wechat.class.php';
$wechat = new wechat();
$token = $wechat->get_token();
$token = $token->access_token;
//var_dump($token);die;
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$token";
$data = ' {
     "button":[
     {	
      
           "name":"今日歌曲",
           "sub_button":[
           {	
               "type":"click",
               "name":"漂洋过海来看你",
                "key":"lookyou"
            },
            {
               "type":"click",
               "name":"冰雪奇缘",
               "key":"letitgo"
            }]
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"新闻",
               "url":"http://www.sina.com.cn/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
$wechat->url_request($url,$data);