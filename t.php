<?php
/**
 * Created by PhpStorm.
 * User: 林一
 * Date: 2018/1/24
 * Time: 21:00
 */

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/app/');

// 定义入口为admin
define('ENTRANCE', 'index');

// 加载框架引导文件
require './thinkphp/start.php';