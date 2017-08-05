<?php
//4-8位随机长度的字母数字组合
function makeSalt(){
    $salt = '';
    //随机产生盐的长度
    $length = rand(4,8);
    for($i = 0; $i < $length; $i++){
        //随机产生字符的类型：1 数字  2小写字母  3大写字母
        $tmp = rand(1,3);
        switch ($tmp){
            case 1:
                $salt .= sprintf('%c', rand(48,57));
                break;
            case 2:
                $salt .= sprintf('%c', rand(97,122));
                break;
            case 3:
                $salt .= sprintf('%c', rand(65,90));
                break;
        }
    }
    return $salt;
}