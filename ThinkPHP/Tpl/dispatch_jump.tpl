<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background:url(/Public/Images/xiexian.png) repeat #000; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding:20px; margin:150px auto; width:400px; height:180px; border:solid 1px #ffffff; background:url(/Public/Images/shadow.png) repeat-x scroll 0 0 #f6f6f6;}
.system-message h3{ font-size: 50px; font-weight: normal; line-height: 100px; margin-bottom: 12px;border:1px solid #ccc}
.system-message .jump{ margin-top: 60px; clear:both;}
.system-message .jump a{ color: #fa0001;}
.system-message .success,.system-message .error{ line-height:1.8em; font-size:25px ; text-align: center;}
.error img { float:left; margin-left:100px; margin-top:10px;}
.error span { float:left; line-height:28px; text-shadow:1px 0 1px #FFFFFF; margin-top:10px; color:#333333;}
.success img {float:left; margin-left:100px; margin-top:10px;}
.success span {float:left; line-height:28px; text-shadow:1px 0 1px #FFFFFF; margin-top:10px; color:#333333;}
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
#wait { color:#fa0001;}
</style>
</head>
<body>
<div class="system-message">
	<p style="height:45px;background:url(../../ThinkPHP/logo-system.png) no-repeat scroll 50% 50% #6D9500; padding-left:10px;line-height:45px;color:white"></p>
	<div style="padding:24px;">
		<present name="message">		
		<div class="success"><img style="margin-right: 9px;" src="../../ThinkPHP/success.png"><span><?php echo($message); ?></span></div>
		<else/>		
		<div class="error"><img style="margin-right: 9px; cursor:pointer;" src="../../ThinkPHP/error.png"/><span><?php echo($error); ?></span></div>
		</present>
	
	</div>
<p class="detail"></p>
<div class="jump" style="float:right;padding-right:5px;">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</div>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>