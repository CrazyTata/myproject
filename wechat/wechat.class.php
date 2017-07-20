<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/19
 * Time: 9:50
 */
//
class wechat{
    //获取token方法
    public function get_token (){
        $id = 'wx15a8c5e00db859fe';
        $secret = 'dcddad3f0d7d679b896832432a7da960';
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$id&secret=$secret";
        //开启一个句柄
        $ch = curl_init();
        //设置
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//这两个是在https时候设置,禁止服务器校验ssl证书
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //执行
        $outputs = json_decode(curl_exec($ch));
        curl_close($ch);
        return $outputs;
    }
    //封装curl库
    public function url_request($url,$data=''){
        //开启一个句柄
        $ch = curl_init();
        //设置
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//这两个是在https时候设置,禁止服务器校验ssl证书
        if(!empty($data)){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //执行
        $outputs = curl_exec($ch);
        curl_close($ch);
        return $outputs;
    }
}

