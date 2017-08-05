<?php
//利用PHPMailer实现邮件发送

//发送邮件
/*
$to:邮件接收方
$title:邮件标题
$content:邮件内容
*/
function sendMail($to, $title, $content){
    //引入发送邮件的核心类文件
    require_once('./PHPMailer/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送“HTML代码”做为邮件的内容
    $mail->IsHTML(TRUE);
    $mail->CharSet='UTF-8';
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    /*  邮件服务器上发送方账号设置 start*/
    $mail->From="phpseven@163.com"; //发送方邮件地址
    $mail->FromName="php7的主题邮件";  //发送方名称，会显示在邮件的内容中，可以自定义
    $mail->Host="smtp.163.com";  //发送邮件的服务协议地址，中转邮件服务器地址
    $mail->Username="phpseven";  //发送方帐号
    $mail->Password="phpseven777"; //发送方帐号密码
    /*  邮件服务器上发送方账号设置 end*/
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject=$title;
    // 邮件内容
    $mail->Body=$content;
    return($mail->Send());//发送邮件
}
//调用函数实现邮件发送
var_dump(sendMail('2226230644@qq.com','what the weather todayA','it is <a href="http://www.sun.com">sun</a> shine'));
var_dump(sendMail('php621@163.com','what the weather todayB','it is <a href="http://www.sun.com">sun</a> shine'));

