<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/6/9
 * Time: 19:28
 */
header("content-type:text/html;charset=utf-8");
$sm = simplexml_load_file('ChinaArea.xml');
var_dump($sm);
