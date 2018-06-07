<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//查询入口文件
// [ 应用入口文件 ]

// 设置应用开发模式
define('APP_DEBUG',true);
//设置CSS位置
define('CSS_URL','/css/');
//设置CSS位置
define('JS_URL','/js/');
// 定义应用目录
define('APP_PATH', __DIR__ . '/myaccount/');
// 加载框架引导文件
require __DIR__ . '/tp5/thinkphp/start.php';
