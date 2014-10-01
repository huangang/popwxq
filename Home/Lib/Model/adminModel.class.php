<?php
	class adminModel extends Model{
		protected $_validate=array(
			array('Username','require','用户必须填写!'),
			array('Username','/^\w{6,}$/','用户名必须6个字母以上',0,'regex',1),
			array('Password','require','密码必须填写!'),
			array('repassword','Password','确认密码是否相同',0,'confirm'), 
		);
		protected function checkCode($code){
			if(md5($code)!=$_SESSION['code']){
				return false;
			}else{
				return true;
			}
		}
	}
?>
