<?php
//入口文件
define("__PUBLIC__",'/fastphp/public');
// echo __PUBLIC__;die;
//应用目录为当前目录
define('APP_PATH', __DIR__.'/');

//开启调式模式
define('APP_DEBUG', true);

//加载配置文件
require './config/config.php';

//加载框架入口文件
require './fastphp/fastphp.php';

//启动框架
$fastobj = new Fastphp($arr);
$fastobj -> run();