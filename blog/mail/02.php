<?php
//实现“中转”邮件发送
//设置、、
ini_set('SMTP','localhost'); //本地中转服务器地址
ini_set('smtp_port',25);//端口
ini_set('sendmail_from','itcast@192.168.3.32');//发送方

//发送邮件
//mail(接收方,邮件主题,邮件内容);
var_dump(mail('php621@163.com','today we study emaila','我们一共要学习的邮件发送方法有3中，直投，中转，phpmailer'));

var_dump(mail('2226230644@qq.com','today we study emailb','我们一共要学习的邮件发送方法有3中，直投，中转，phpmailer'));

var_dump(mail('phpseven@163.com','today we study emaila','我们一共要学习的邮件发送方法有3中，直投，中转，phpmailer'));