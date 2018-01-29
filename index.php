<?php
/**
 * Created by PhpStorm.
 * User: 林一
 * Date: 2018/1/24
 * Time: 21:04
 */

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/app/');

require __DIR__ . '/thinkphp/base.php';// 加载框架基础文件
header('Access-Control-Allow-Origin:*');//允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');//允许访问的方式
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');

// 加载框架引导文件
think\App::run()->send();// 执行应用