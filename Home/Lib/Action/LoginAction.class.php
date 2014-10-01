<?php
//登陆管理
class LoginAction extends Action {
    public function index(){
		if($_SESSION['username']!="" || isset($_SESSION['username'])){
			$this->redirect('Index/index');
		}
		$this->display();
    }
	//登陆
	public function login(){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$code=$_POST['code'];
	 	if(md5($code)!=$_SESSION['code']){
			$this->error('验证码不正确');
		}
		
		$user=M('admin');
		$where['Username']=$username;
		$where['Password']=md5($password);
		$arr=$user->field('id')->where($where)->find();
		if($arr){
			$_SESSION['username']=$username;
			$_SESSION['id']=$arr['id'];
			$this->success('用户登录成功',U('Index/index'));
		}else{
			$this->error('该用户不存在');
		}
	}
	//退出
	public function doLogout(){
		$_SESSION=array();
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
		session_destroy();
		$this->redirect('Index/index');
	}
}