<?php
//私密信息配置

$G_ROOT = dirname(__FILE__);
$G_CONFIG["weiXin"] = array(
	'account' => 'ch-0431',
	'password' => 'miao!@#$',
	'cookiePath' => $G_ROOT. '/cache/cookie', // cookie缓存文件路径
	'webTokenPath' => $G_ROOT. '/cache/webToken', // webToken缓存文件路径
);
//require 'config2.php';