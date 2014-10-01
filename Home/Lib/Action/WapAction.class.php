<?php
class WapAction extends Action {
	public function wall(){
		$wall=M('wall')->find();
		$functionw=$wall['function'];
		if($functionw==1){
			$wall=M('wall')->find();
			$publicnum=M('publicnum')->find();
			$this->assign('wall',$wall);
			$this->assign('publicnum',$publicnum);
			$this->display();
		}else{
			header("Content-type: text/html; charset=utf-8");
			echo"微信墙功能以关闭";
		}
		
	}
	public function wallmessage(){
	
		$wall=M('wall')->find();
		if($wall[examine]=='1'){
			$where['examine']="1";	
		}
		else{
			;
		}
		
		$start=$_GET['lastid'];
		$lastid=$_GET['lastid']+1;
		
		$info=M('list')->where($where)->order('id Asc')->limit($start.',1')->select();
		$data[$lastid]['id'] = $info[0]['Id'];
		$data[$lastid]['fakeid'] = $info[0]['fake_id'];
		$data[$lastid]['num'] = $lastid;
		$data[$lastid]['content'] = $info[0]['content'];
		$data[$lastid]['nickname'] = $info[0]['nickname'];
		$data[$lastid]['avatar'] = $info[0]['img'];
		if(count($info)==0){
			$data2=array('data'=>$data,'ret'=>0);
			$this->ajaxReturn($data2,'JSON');
		}
		else{
			$data2=array('data'=>$data,'ret'=>1);
			$this->ajaxReturn($data2,'JSON');
		}
	}
	
	public function prize(){
		$draw=M('draw')->find();
		$functiond=$draw['function'];
		if($functiond==1){
			$draw=M('draw')->find();
			$publicnum=M('publicnum')->find();
			$this->assign('draw',$draw);
			$this->assign('publicnum',$publicnum);
			$this->display();
		}else{
			header("Content-type: text/html; charset=utf-8");
			echo"抽奖功能以关闭";
		}
	}
	public function prizedata(){

		//////////////////////////////标记选中//////////////////////////////////////////
		$action=$_GET['action'];
		$mid=$_REQUEST['id'];
		if(!empty($mid)){
			$info=M('list')->find($mid);
			$where['fromusername']=$info['fromusername'];
			$data_zjid['choose']="1";
			$zjzid=M('list')->where($where)->save($data_zjid);
		}
		//////////////////////////////标记选中//////////////////////////////////////////
		$wall=M('wall');
		$setwall=$wall->find();
		if($setwall['examine']==1){
			$where['examine']=1;
		}else{
			;
		}
		$where['choose']=0;
		$draw=M('draw')->find();
		if($draw['type']=='1'){
		$info=M('list')->where($where)->order('id ASC')->select();
		}
		else{
		$info=M('list')->where($where)->group('nickname')->order('id ASC')->select();
		}
	
		if ($action=='ok'){
		echo"1";
		}
		else{
			if(count($info)==0){
			echo"null";
			}
			else{
				$this->ajaxReturn($info,'JSON');
			}
		} 
	}
	public function prizereset(){
		$data['choose']="0";
		$where['choose']="1";
		$reset=M('list')->where($where)->save($data);
		if($reset){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	}
	public function vote(){
		$vote=M('vote')->find();
		$functionv=$vote['function'];
		if($functionv==1){
			$vote=M('vote')->find();
			$publicnum=M('publicnum')->find();
			$this->assign('vote',$vote);
			$this->assign('publicnum',$publicnum);
			$this->display();
		}else{
			header("Content-type: text/html; charset=utf-8");
			echo"投票墙功能以关闭";
		}
	}

	public function votedata(){
		$project=M('project')->select();
		$count_tp=count($project);
		for($s=0;$s<$count_tp;$s++){
			$counts[]=$project[$s]['num'];
		}
		$counts1=array_sum($counts);
		$color_num=1;
		for($i=0;$i<$count_tp;$i++){
			if($color_num>4)$color_num=1;
			$project[$i]['float_tp']=$project[$i]['num']/$counts1*100;
			$project[$i]['bfs_tp']=round($project[$i]['float_tp']*100);
			$project[$i]['color_tp']=$color_num;
			$color_num++;
		}
		$data['status'] = 1;
		$data['info'] = '投票';
		$data['counts1'] = counts1;
		$data['data'] = $project;
		$this->ajaxReturn($data,'JSON');
	}
	public function shake(){
		$db=M('shake');
		$where['function']='1';
		$info=$db->where($where)->find();
		$this->assign('info',$info);
		$this->display();
	}

	public function startgame(){
		$where['phone']=$_SESSION['phone'];
		$result=M('shake')->where($where)->save(array('isact'=>'1'));
	}
	public function sentpoint(){
		$db=M('Shake');
		$where['function']='1';
		$info=$db->where($where)->find();
		$result=M('Toshake')->field('phone,point')->order('point desc')->limit('0,'.$info['shownum'])->select();
		$json_string=json_encode($result);
		echo $json_string;	
	}
	public function getman(){
		$result=M('Toshake')->count();
		echo $result;
	}
	public function shakeuser(){
		$db=M('shake');
		$where['function']='1';
		$info=$db->where($where)->find();
		if(isset($_SESSION['phone']) && $_SESSION['phone']!=''){
			if($info['isact']==1){
				$where['phone']=$_SESSION['phone'];
				$shake=M('toshake')->where($where)->find();
				if($shake['point']==""){
				$shakenow=0;
				}else{
				$shakenow=$shake['point'];
				}
				$this->assign('shake',$shakenow);
				$this->assign('info',$info);
				$this->display('shakeuser');
			}else{
				$this->assign('info',$info);
				$this->display('ready');
			}
		}else{
			if(IS_POST){
				$where['phone']=$_POST['phone'];
				$shake=M('toshake')->where($where)->find();
				if($shake==false){
					$info=D('toshake');
					if($info->create()){
						$infonum=$info->add();
						if($infonum){
							$_SESSION['phone']=$_POST['phone'];
							$this->success('链接成功！');
						}else{
							$this->error('操作失败！');
						}
					}else{
						$this->error($info->getError());
					}
				}else{
					if($info['isact']==1){
						$_SESSION['phone']=$_POST['phone'];
						if($shake['point']==""){
						$shakenow=0;
						}else{
						$shakenow=$shake['point'];
						}
						$this->assign('shake',$shakenow);
						$this->assign('info',$info);
						$this->display('shakeuser');
					}else{
						$this->assign('info',$info);
						$this->display('ready');
					}
				}
			}else{
				$this->display('userphone');
			}
		}
	}
	public function growth(){
		$where['function']='1';
		$result=M('shake')->where($where)->find();
		$where['phone']=$_SESSION['phone'];
		if($result['isact']==1){
			$data['point']=$_GET['point'];
			M('Toshake')->where($where)->save($data);
		}else{
			$data['status'] = 1;
			$data['data'] = '活动还没开始那亲！';
			$this->ajaxReturn($data,'JSON');
		}
	}
	public function ready(){
		$db=M('shake');
		$where['function']='1';
		$info=$db->where($where)->find();
		if($info['isact']==1){
			$data['status'] = 1;
			//$data['data'] = $info['clientime'];
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status'] = 0;
			//$data['data'] = $info['clientime'];
			$this->ajaxReturn($data,'JSON');
		}
	}
	public function ceremony(){
		$db=M('ceremony');
		$where['function']='1';
		$info=$db->where($where)->find();
		if(isset($_SESSION['password']) && $_SESSION['password']!=''){
			$this->assign('info',$info);
			$this->display('ceremony');
		}else{
			if(IS_POST){
				$where['password']=$_POST['password'];
				$where['function']='1';
				$ceremony=M('ceremony')->where($where)->find();
				if($ceremony){
					$_SESSION['password']=$_POST['password'];
					$this->redirect('Wap/ceremony');
				}else{
					$this->error('秘钥错误！');
				}
			}else{
				$this->display('userkey');
			}
		}
	}
	public function ceremonym(){
		$db=M('ceremony');
		$where['function']='1';
		$info=$db->where($where)->find();
		$this->assign('info',$info);
		$this->display();
	}
	public function autoadd(){
		if($_GET['action']=='add'){
			if(isset($_SESSION['password']) && $_SESSION['password']!=''){
				$db=M('ceremony');
				$where['function']='1';
				$info=$db->where($where)->setInc('isact');
			}
		}
	}
	public function beginstate(){
		$db=M('ceremony');
		$where['function']='1';
		$info=$db->where($where)->find();
		if($info[isact]>=$info[mannum]){
			$data['status'] = 1;
			$data['data'] = "";
			$this->ajaxReturn($data,'JSON');
		}else{
			$data['status'] = 0;
			$data['data'] = "";
			$this->ajaxReturn($data,'JSON');
		}
		
	}
}