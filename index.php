<?php
	//1.确定应用名称 App
	define('APP_NAME','Home');
	//2.确定应用路径
	define('APP_PATH','./Home/');
	//3.开启调试模式
	define('APP_DEBUG',true);
	//4.应用核心文件
	require './ThinkPHP/ThinkPHP.php';
	//5.安装程序
	if (! is_file ( 'Home/install.lock' )) {
	header ( 'Location: ./install' );
	exit ();
    }
?>