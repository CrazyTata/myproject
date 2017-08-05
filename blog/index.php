<?php

//访问：http://web.blog51.com/index.php?p=home&c=user&a=login
//首先接收3个变化的参数,默认为 home平台--Index控制器--index操作方法
$p = isset($_GET['p'])?ucfirst($_GET['p']):'Home';
$c = isset($_GET['c'])?ucfirst($_GET['c']):'Index';
$a = isset($_GET['a'])?$_GET['a']:'index';


//为了系统后期开发比较方便，给定义"常量"
define('DS',DIRECTORY_SEPARATOR);  //目录分隔符定义常量[兼容方案]
define('ROOT',__DIR__);//虚拟主机目录定义常量(E:\web\php51\blog)
//echo __DIR__;//代表当前文件的"绝对路径"
define('APP_PATH',ROOT.DS."App".DS);//E:\web\php51\blog\App\
define('FRAME_PATH',ROOT.DS."Frame".DS);//E:\web\php51\blog\Frame\

//把平台、控制器、操作方法 也定义为常量
define('PLAT_NAME',$p);  //Home
define('CONTROLLER_NAME',$c); //User
define('ACTION_NAME',$a); //login
define('PLAT_PATH',APP_PATH.$p.DS); //E:\web\php51\blog\App\Home[Back]\

//给静态文件的引入路径定义常量
define('CSS_URL','/Public/'.$p.'/css/');
define('JS_URL','/Public/'.$p.'/js/');
define('IMG_URL','/Public/'.$p.'/images/');

//引入框架核心文件
include(FRAME_PATH."smarty".DS.'Smarty.class.php'); //3.1.30的smarty
//include(FRAME_PATH."smarty16".DS.'Smarty.class.php'); //3.1.16的smarty
include(FRAME_PATH."BaseController.class.php");//先引入
include(FRAME_PATH."HomeController.class.php");
include(FRAME_PATH."BackController.class.php");
include(FRAME_PATH."DB.class.php");//数据库操作类
include(FRAME_PATH."BaseModel.class.php");//model父类

//分组一个调试输出函数
//格式化输出调试信息
function mydump($msg){
    echo "<pre style='color:red;'>";
    var_dump($msg);
    echo "</pre>";
}

//读取、接收配置文件信息
//$config变量会接收一个数组的配置信息
$config = include(APP_PATH."Config".DS."config.php");

//自动加载
function __autoload($classname){
    //在控制器中使用model例如new CateModel,此时的$classname的信息就是CateModel
    //后期还有可能使用其他model，例如UserModel、BlogModel等等
    //因此我们做严格设置，只有XXXModel的类才通过该自动加载引入
    $ext = substr($classname,-5);//把类名中"Model"后缀给截取出来

    //判断$ext等于Model才走逻辑
    if($ext=='Model'){
        //引入对应的model文件
        $model_file = APP_PATH."Model".DS.$classname.".class.php";
        if(file_exists($model_file)){
            include($model_file);
        }
    }else if($ext == 'ailer'){
        //引入发送邮件核心类文件
        $email_file = FRAME_PATH."PHPMailer".DS."class.phpmailer.php";
        if(file_exists($email_file)){
            include($email_file);
        }
    }
}
spl_autoload_register('__autoload');


//给发送邮件功能制作一个函数
//发送邮件
/*
$to:邮件接收方
$title:邮件标题
$content:邮件内容
*/
function sendMail($to, $title, $content){
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
    $mail->Port = 25;// 发邮件端口号默认25
    $mail->AddAddress($to);// 收件人
    $mail->Subject=$title;// 邮件标题
    $mail->Body=$content;// 邮件内容
    return($mail->Send());//发送邮件
}

//根据3个参数引入控制器文件
//include('./App/'.$p."/Controller/".$c."Controller.class.php");//相对路径
include(APP_PATH.$p.DS."Controller".DS.$c."Controller.class.php");//绝对路径

//实例化UserController类对象
$controller_name = $c."Controller"; //UserController
$ctl = new $controller_name(); //new UserController
$ctl -> $a();  //$ctl -> login()


