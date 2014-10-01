<?php
$G_ROOT = dirname(__FILE__);
$G_CONFIG["weiXin"] = array(
	'account' => 'ch-0431',
	'password' => 'miao!@#$',
	'cookiePath' => $G_ROOT. '/cache/cookie', // cookie缓存文件路径
	'webTokenPath' => $G_ROOT. '/cache/webToken', // webToken缓存文件路径
);
require "include/WeiXin.php";
$weiXin = new WeiXin($G_CONFIG['weiXin']);
$lastMsg = $weiXin->getLatestMsgs();
print_r($lastMsg);
/* $file = $lastMsg[0]['fakeid'].'.jpg'; 
if (is_readable($file) == false) {
$weiXin->getPicture($lastMsg[0]['fakeid']);
}
if($lastMsg[0][type] == '1'){
$messageid = $lastMsg[0]['id'];
$fakeid = $lastMsg[0]['fakeid'];
$nicheng = $lastMsg[0]['nick_name'];
$content = $lastMsg[0]['content'];
$nicheng = strip_tags($nicheng);
$content = strip_tags($content);
$content = @str_replace(array('"','\'','゛','&nbsp;'), array('','','',''), $content);
$nicheng = @str_replace(array('"','\'','゛','&nbsp;'), array('','','',''), $nicheng);
$imgurl = Web_ROOT.'/moni/'.$fakeid.'.jpg';
} 
echo $nicheng; */
