<?php

// 1, 加载项目初始化文件
include '../init.php';

// 2, 判断用户是否登录
include DIR_MODEL . 'session_front.php';

// 3, 加载视图文件
include DIR_VIEW . 'upload_image.html';