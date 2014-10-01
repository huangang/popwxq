<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POP-微信墙</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
</head> 
<script src="__PUBLIC__/Js/jquery.js"></script>
<script>
$(function(){
	$('#mySelect').change(function(){ 
		//alert($(this).children('option:selected').val()); 
		var selectvalue=$(this).children('option:selected').val();
		if(selectvalue==1){
		var str='<table cellspacing="0" cellpadding="0" border="0"  width="100%"><tr class="blue"><td width="18"></td><td>用户名　　　　 　：<input class="inpu" name="username" type="text" value="<?php echo ($public['username']); ?>"/><br/></td></tr><tr class="blue"><td></td><td>密码　　　　 　　：<input class="inpu" name="password" type="text" value="<?php echo ($public['password']); ?>"/><br/><input class="inpu" name="Id" type="hidden" value="<?php echo ($public['Id']); ?>" /></td></tr></table>';
		}
		if(selectvalue==2){
		var str='<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr class="blue"><td width="18"></td><td>AppId　　　　 　：<input class="inpu" name="appid" type="text" value="<?php echo ($public['appid']); ?>"/><br/></td></tr><tr class="dark_blue"><td></td><td>AppSecret　　 　：<input class="inpu" name="appsecret" type="text" value="<?php echo ($public['appsecret']); ?>"/><br/><input class="inpu" name="Id" type="hidden" value="<?php echo ($public['Id']); ?>" /></td></tr></table>';
		}
		$('#did').html(str);
	}) 
}) 
</script>
<body>
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

	<table border="0" cellpadding="0" cellspacing="0" id="main">
		<tr>
        <td valign="top" width="229">
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
            <?php if($token != '' ): ?><div class="smallnav" >
				<span>URL : </span><?php echo ($url); ?><br/>
				<span>TOKEN : </span><?php echo ($token); ?>
			</div><?php endif; ?>
			<div id="column">
				<form name="paccout" action="" method="post" >
					<table cellpadding="0" cellspacing="0" border="0" class="gzzh">
                    	<tr class="dark_blue">
                    	<td width="18"><span class="red">*</span></td>
                    	<td>公共账号名称　　：<input class="inpu" name="pnum" type="text" value="<?php echo ($public['pnum']); ?>" /><br/></td>
						</tr>
                    	<tr class="blue">
                    	<td><span class="red">*</span></td>
                        <td>公共账号原始ID　：<input class="inpu" name="original" type="text" value="<?php echo ($public['original']); ?>"  />
                         <!--填写后不可修改！！--><br/>
						<!--*微信号　　　　　：<input name="signal" type="text" value="<?php echo ($public['signal']); ?>"/><br/>--></td>
                    	</tr>
                    	<tr class="dark_blue">
                    	<td><span class="red">*</span></td>
                        <td>是否拥有微信高级接口　　：<select class="sel" name="type" id="mySelect">                                       
										<?php if(empty($$public['type'])): ?><option value="1" <?php if($public['type'] == '1' ): ?>selected = "selected"<?php endif; ?> >没有高级接口</option>
										<option value="2"  <?php if($public['type'] == 2 ): ?>selected = "selected"<?php endif; ?> >有高级接口</option>
										<?php else: ?>
											<option value="1">没有高级接口</option>
											<option value="2">有高级接口</option><?php endif; ?>
										</select><br/>
						</td>
                    	</tr class="dark_blue">
						<tr>
						<td colspan="2">
						<div id="did">
							<?php if($public['type'] == '1' ): ?><table cellspacing="0" cellpadding="0" border="0"  width="100%"><tr class="blue"><td width="18"><span class="red">*</span></td><td>用户名　　　　 　：<input class="inpu" name="username" type="text" value="<?php echo ($public['username']); ?>"/><br/></td></tr>
							<tr class="blue"><td><span class="red">*</span></td><td>密码　　　　 　　：<input class="inpu" name="password" type="text" value="<?php echo ($public['password']); ?>"/><br/><input class="inpu" name="Id" type="hidden" value="<?php echo ($public['Id']); ?>" /></td></tr></table><?php endif; ?>
							<?php if($public['type'] == '2' ): ?><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr class="blue"><td width="18"><span class="red">*</span></td><td>AppId　　　　 　：<input class="inpu" name="appid" type="text" value="<?php echo ($public['appid']); ?>"/><br/></td></tr><tr class="dark_blue"><td><span class="red">*</span></td><td>AppSecret　　 　：<input class="inpu" name="appsecret" type="text" value="<?php echo ($public['appsecret']); ?>"/><br/><input class="inpu" name="Id" type="hidden" value="<?php echo ($public['Id']); ?>" /></td></tr></table><?php endif; ?>
						</div>	
						<td>
						</tr>
                    	<tr>
                        <td colspan="2"><input class="submit" type="submit" name="submit" value="提交"/>　<input class="reset" type="reset" name="reset" value="重置" /><br/></td>
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