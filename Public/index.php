<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', true);
//header("Content-type: text/html; charset=utf-8"); 
//exit('系统升级，请稍后再试！');

// 检测PHP环境
if(APP_DEBUG && version_compare(PHP_VERSION,'5.4.0','<')) die('require PHP > 5.4.0 !');

// 通用设置PATH_INFO，如果保证PHP能正常获取到
if (! isset($_SERVER['PATH_INFO'])) {
    $parse_url = parse_url($_SERVER['REQUEST_URI']);
    $_SERVER['PATH_INFO'] = $parse_url['path'];
}

if(preg_match('/(\/([0-9]){20})$/', $_SERVER['REQUEST_URI'])){
    $getcode = explode("/",$_SERVER['REQUEST_URI']);
    $_SERVER['REQUEST_URI'] = '/h5/plian/'.$getcode[1];
    $_SERVER['PATH_INFO'] = '/h5/plian/'.$getcode[1];
}

if(preg_match('/(\/plian\?code).*$/', $_SERVER['REQUEST_URI'])){
    $_SERVER['REQUEST_URI'] = '/h5/plian/'.$_GET['code'];
    $_SERVER['PATH_INFO'] = '/h5/plian/'.$_GET['code'];
    //exit('系统升级，请稍后再试！123');
}

// 定义应用目录
define('APP_PATH','../Application/');

// 引入ThinkPHP入口文件
require '../ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单