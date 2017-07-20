<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/7/19
 * Time: 21:43
 */
//根据经纬度查询具体地理位置
header("content-type:text/html;charset=utf-8");
include_once 'wechat.class.php';
$wechat = new wechat();
$keywords = urlencode('银行');
$location_x = '30.454041';
$location_y = '114.426468';
$url = "http://restapi.amap.com/v3/place/around?key=6fe4382f22d104060f2eee17332b22ce&location={$location_y},{$location_x}&keywords={$keywords}&radius=1000&offset=1&page=1&extensions=all";
$result = $wechat->url_request($url);
$result = json_decode($result);
$name = $result->pois[0]->name;
$type = $result->pois[0]->type;
$address = $result->pois[0]->address;
$tel = $result->pois[0]->tel;
$distance = $result->pois[0]->distance;
$contentStr = '离你最近的银行是:'.$name.',类型是:'.$type.',地址是:'.$address.',电话是:'.$tel.',距离是:'.$distance.'m';
echo $contentStr;
