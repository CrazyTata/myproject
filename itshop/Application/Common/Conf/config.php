<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'             =>  2,
	//设置自动载入的文件名
	'LOAD_EXT_FILE' => 'dir,img',
    
	//设置图片上传的配置项
    'UPLOAD_IMG' => array(
        'rootPath' => './Uploads/',
        'maxSize'  => 3000000,
        'exts'     => array('jpg', 'png', 'gif'),
    ),
    
	//设置I方法使用过滤函数
    'DEFAULT_FILTER'  => 'filterXSS',
    
	// 'TMPL_PARSE_STRING' => array(
	//    '__ADMIN__' => '/Public/Admin',
	//    '__HOME__'  => '/Public/Home',
	//    '__COMMON__' => '/Public/Common'
	// ),
    
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'itshop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sp_',    // 数据库表前缀
);














