<?php
include "wechat.class.php";
$options = array(
'token'=>'', //填写你设定的key
'appid'=>'', //填写高级调用功能的app id, 请在微信开发模式后台查询
'appsecret'=>'', //填写高级调用功能的密钥
/*     'partnerid'=>'88888888', //财付通商户身份标识，支付权限专用，没有可不填
'partnerkey'=>'', //财付通商户权限密钥Key，支付权限专用
'paysignkey'=>'' //商户签名密钥Key，支付权限专用 */
);
$weObj = new Wechat($options); //创建实例对象
$weObj ->aaas();
/* $accesstoken=$weObj ->checkAuth();
echo $accesstoken; */
$accesstoken=$weObj->getUserInfo("");
var_dump($accesstoken); 

/* $weObj->valid();
$type = $weObj->getRev()->getRevType();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$weObj->text("hello, I'm wechat")->reply();
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			break;
	case Wechat::MSGTYPE_IMAGE:
			break;
	default:
			$weObj->text("help info")->reply();
} */