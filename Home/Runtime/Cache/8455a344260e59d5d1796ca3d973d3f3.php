<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POP-微信墙</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
</head> 
<link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__PUBLIC__/kindeditor/plugins/code/prettify.css" />
<script src="__PUBLIC__/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="__PUBLIC__/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="__PUBLIC__/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<body>
<script>
KindEditor.ready(function(K) {
	var editor = K.editor({
		
	});
	K('#img1').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog222({
				imageUrl : K('#img').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#img').val(url);
					editor.hideDialog();
				}
			});
		});
	});
	
});
</script> 
	<div id="header">
<div class="menu_btn"></div><img src="__PUBLIC__/Images/logo-system.png"/>
<ul>
	<li><a href="__APP__/Index/index">公共账号</a></li>
	<li><a href="__APP__/Index/password">修改密码</a></li>
	<li><a href="__APP__/Index/wall">微 信 墙</a></li>
	<li><a href="__APP__/Index/prize">微 抽 奖</a></li>
	<li><a href="__APP__/Index/vote">微 投 票</a></li>
	<li class="menu06"><a href="javascript:void(0)">待 开 发</a></li>
	<li class="menu07"><a href="javascript:void(0)">待 开 发</a></li>
</ul>
<div id="info">
管理员：<?php echo (session('username')); ?>
<a href="__APP__/Login/doLogout">退出</a>
</div>
</div>

	<table id="main" cellpadding="0" cellspacing="0" border="0">
		<tr>
        <td width="229" valign="top">
        <div id="left">
	<ul>
		<li class="menu01"><a href="__APP__/Index/index">公共账号</a></li>
		<li class="menu02"><a href="__APP__/Index/password">修改密码</a></li>
		<li class="menu03"><a href="__APP__/Index/wall">微 信 墙</a></li>
		<li class="menu04"><a href="__APP__/Index/prize">微 抽 奖</a></li>
		<li class="menu05"><a href="__APP__/Index/vote">微 投 票</a></li>
		<li class="menu06"><a href="javascript:void(0)">待 开 发</a></li>
		<li class="menu07"><a href="javascript:void(0)">待 开 发</a></li>
	</ul>
</div>
        </td>
		<td valign="top" id="right">
			<?php if($update != '' ): ?><div id="update">
	<div id="message">
	<MARQUEE class="gonggao" scrollAmount="2" onMouseOut="this.start()" onMouseOver="this.stop()"  direction="left"></MARQUEE>
	</div>
	</div><?php endif; ?>
            <div class="smallnav" >
				<a class="active" href="__URL__/wall" style="color:#ffffff;">微信墙配置</a> 
				<a href="__URL__/participants">参与人员</a> 
				<a href="__URL__/message">查看留言</a>
				<a href="__APP__/Wap/wall" target="_blank">活动地址</a>
			</div>
			<div id="column">
				<form name="paccout" action="" method="post" >
					<table border="0" cellpadding="0" cellspacing="0" class="gzzh">
                    <tr class="dark_blue">
                    <td width="18"><span class="red">*</span></td><td colspan="2">公共账号头像　　：
                    <input class="inpu" name="img" id="img" type="text" value="<?php echo ($wall['img']); ?>" style="width:300px;"/><a href="#"  class="btnGrayS" style="margin-left:10px;" id="img1">上传</a></td>
					</tr>
                    <tr class="blue">
                    <td><span class="red">*</span></td><td class="area_tit">公共账序言　　　：</td><td class="pl_0">
                    <textarea class="area" name="preface" style="width:300px;" rows="3" ><?php echo ($wall['preface']); ?></textarea><br/>
									    <input name="Id" type="hidden" value="<?php echo ($wall['Id']); ?>" /></td>
                    </tr>
                    <tr class="dark_blue">                    
					<td><span class="red">*</span></td>
					<td colspan="2">是否审核　　　　：<?php if($wall['examine'] == '0' || $wall['examine'] == ''): ?><input type="radio" name="examine" checked = "checked" value="1" />是
					<input type="radio" name="examine" value="2" />否<br/>
					<?php else: ?>
					<input type="radio" name="examine" value="1" <?php if($wall['examine'] == '1' ): ?>checked = "checked"<?php endif; ?>/>是
					<input type="radio" name="examine" value="2" <?php if($wall['examine'] == '2' ): ?>checked = "checked"<?php endif; ?>/>否<br/><?php endif; ?></td>
                    </tr>
                    <tr class="blue">
					<td><span class="red">*</span></td>
					<td colspan="2">是否开启　　　　：<?php if($wall['function'] == '0' || $wall['function'] == ''): ?><input type="radio" name="function" checked = "checked" value="1" />是
					<input type="radio" name="function" value="2" />否<br/>
					<?php else: ?>
					<input type="radio" name="function" value="1" <?php if($wall['function'] == '1' ): ?>checked = "checked"<?php endif; ?>/>是
					<input type="radio" name="function" value="2" <?php if($wall['function'] == '2' ): ?>checked = "checked"<?php endif; ?>/>否<br/><?php endif; ?></td>
                    </tr>
					<tr>
                    <td colspan="3"><input class="submit" type="submit" name="submit" value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input class="reset" type="reset" name="reset" value="重置" /><br/></td>
                    </tr>
                    </table>
				</form>	
			</div>
		</td>
        </tr>	
	</table>
	<div id="bottom">
	<div class="gray"></div>
</div>
</body>
</html>