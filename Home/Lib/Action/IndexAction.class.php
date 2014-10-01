<?php
class IndexAction extends CommonAction {
	//_____公共账号____
    public function index(){
		$public=M('publicnum')->find();
		
		if(IS_POST){
			if($public==false){				
				$info=D('publicnum');
				if($info->create()){
					$infonum=$info->add();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}else{
				$info=D('publicnum');
				if($info->create()){
					$infonum=$info->save();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}
		}else{
			if($public['original']){
				$token=md5($public['original']);
			}else{
				$token="";
			}
			$url="http://".$_SERVER['HTTP_HOST']."/index.php/pop/".$token;
			$this->assign('token',$token);
			$this->assign('url',$url);
			$this->assign('public',$public);
			$this->display();
		}
    }
	//_____修改密码____
	public function password(){
		if(IS_POST){ 
			$admin=D('admin');
			if($admin->create()){
				$_POST['Password']=md5($_POST['Password']);
				$result=$admin->save($_POST);
				if($result){
					$this->success('操作成功！');
				}else{
					$this->error('操作失败！');
				}
			}
			else{
				$this->error($admin->getError());
			}	
		}else{
			$this->display();
		}
	}
	//_____微信墙____
	public function wall(){
		$wall=M('wall')->find();
		if(IS_POST){
			if($wall==false){				
				$info=D('wall');
				if($info->create()){
					$infonum=$info->add();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}else{
				$info=D('wall');
				if($info->create()){
					$infonum=$info->save();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}
		}else{
			$this->assign('wall',$wall);
			$this->display();
		}
    }
	//_____微信墙-参与人员____	
	public function participants(){
		$fans=M('fans');
		import('ORG.Util.Page');
		$count		=$fans->count();
		$Page		=new Page($count,10);
		$show		=$Page->show();
		
		$participants		=$fans->order('Id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('count',$count);
		$this->assign('participants',$participants);
		$this->display();
	}
	//_____微信墙-留言____
	public function message(){
		$list=M('list');
		import('ORG.Util.Page');
		$count		=$list->count();
		$Page		=new Page($count,10);
		$show		=$Page->show();
		
		$message		=$list->order('Id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('message',$message);
		$this->display();
	}
	//_____微信抽奖____
	public function prize(){
		$draw=M('draw')->find();
		if(IS_POST){
			if($draw==false){				
				$info=D('draw');
				if($info->create()){
					$infonum=$info->add();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}else{
				$info=D('draw');
				if($info->create()){
					$infonum=$info->save();
					if($infonum){
						$this->success('操作成功！');
					}else{
						$this->error('操作失败！');
					}
				}else{
					$this->error($info->getError());
				}
			}
		}else{
			$this->assign('draw',$draw);
			$this->display();
		}
    }
	//_____微投票____
	public function vote(){
		$vote=M('vote')->find();
		$projectnum=M('project')->select();
		if(IS_POST){
			if($vote==false){
				
				$wxq_project=$_REQUEST['project'];
				$wxq_num=$_REQUEST['num'];
				M('project')->where(array('token'=>$wxq_token))->delete();
				$project = M("project");
				for ($i=0;$i<count($wxq_project);$i++){
				$wxq_xm[$i]['xm']=$wxq_project[$i];
				$wxq_xm[$i]['num']=$wxq_num[$i];
				$wxq_xm[$i]['order']=$i;
				$projectnum[]=$project->add($wxq_xm[$i]);				
				}

				$info=D('vote');
				if($info->create()){
					$infonum=$info->add();
				}else{
					$this->error($info->getError());
				} 
				
				if($infonum>0 || count($projectnum) >0){
					$this->success('操作成功！');
				}else{
					$this->error('操作失败！');
				}
				
			}else{
				$wxq_project=$_REQUEST['project'];
				$wxq_num=$_REQUEST['num'];			
				M('project')->where(array('token'=>$wxq_token))->delete();
				$project = M("project");		
				for ($i=0;$i<count($wxq_project);$i++){
				$wxq_xm[$i]['project']=$wxq_project[$i];
				$wxq_xm[$i]['num']=$wxq_num[$i];	
				$wxq_xm[$i]['order']=$i;
				$projectnum[]=$project->add($wxq_xm[$i]);
				}
			
				$info=D('vote');
				if($info->create()){
					$infonum=$info->save();
				}else{
					$this->error($info->getError());
				} 
				
				if($infonum>0 || count($projectnum) >0){
					$this->success('操作成功！');
				}else{
					$this->error('操作失败！');
				}
			}
		}else{
			if($projectnum==false){
				$tp='0';
			}
			else{
				$tp='1';
			}
			$this->assign('num',0);
			$this->assign('tp',$tp);
			$this->assign('projectnum',$projectnum);
			$this->assign('vote',$vote);
			$this->display();
		}
		
    }
	public function votereset(){
		$fanvote=M('fanvote')->where('Id >= 0')->delete();
		$data['num']=0;
		$fanvote=M('project')->where('Id >= 0')->save($data);
		if($fanvote){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	}
	public function examine(){
		$data['Id']=$_GET['Id'];
		$data['examine']=$_GET['examine'];
		$examine=M('list');
		$examinenum=$examine->save($data);
		if($examinenum){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	}
	public function delb(){
		$allsh=$_REQUEST['allsh'];
		$submit=$_REQUEST['submit'];
		$go=$_REQUEST['go'];
		$stop=$_REQUEST['stop'];
		if(isset($allsh) && count($allsh) != ''){
		
			if($submit != "" &&  isset($submit)){
				for($i=0;$i<count($allsh);$i++){
					$fanslist[$i]['id']=$allsh[$i];
					$count[]=M('list')->delete($fanslist[$i]['id']);	
				}
				if(count($count)>0){
					$this->success('操作成功！');
				}
				else{
					$this->error('操作失败！');
				}
			} 
			
			if($go != "" &&  isset($go)){
				for($i=0;$i<count($allsh);$i++){
					$fanslist[$i]['Id']=$allsh[$i];
					$fanslist[$i]['examine']=1;
					$count[]=M('list')->save($fanslist[$i]);	
				}
				if(count($count)>0){
					$this->success('操作成功！2');
				}
				else{
					$this->error('操作失败！');
				}
			}
			
			if($stop != "" &&  isset($stop)){
				for($i=0;$i<count($allsh);$i++){
					$fanslist[$i]['Id']=$allsh[$i];
					$fanslist[$i]['examine']=0;
					$count[]=M('list')->save($fanslist[$i]);	
				}
				if(count($count)>0){
					$this->success('操作成功！');
				}
				else{
					$this->error('操作失败！');
				}
			}
			
		}else{
			echo'<script language="javascript">history.go(-1);</script>';
		}
    }
	public function del(){
		$id=$_GET['id'];
		$data=$_GET['data'];
		if(isset($id)){
			$delete=M($data);
			$num=$delete->delete($id);
			if($num){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
		}else{
			$allsh=$_REQUEST['allsh'];
			if(isset($allsh) && count($allsh) != ''){
				for($i=0;$i<count($allsh);$i++){
					$fanslist[$i]['id']=$allsh[$i];
					$urlimg[$i]=M($data)->find($fanslist[$i]['id']);
					$imgurl[$i]=explode("http://". $_SERVER['HTTP_HOST']."/",$urlimg[$i]['img']);
					if (is_readable($imgurl[$i][1])) {
							unlink($imgurl[$i][1]); 
						}
					$count[]=M($data)->delete($fanslist[$i]['id']);	
				}
				if(count($count)>0){
					$this->success('操作成功！');
				}
				else{
					$this->error('操作失败！');
				}
			}else{
				echo'<script language="javascript">history.go(-1);</script>';
			}	
		}
    }
	public function delimg(){
		$id=$_GET['id'];
		$data=$_GET['data'];
		$delete=M($data);
		$numimg=$delete->find($id);
		$imgurl=explode("http://". $_SERVER['HTTP_HOST']."/",$numimg['img']);
		if (is_readable($imgurl[1])) {
			unlink($imgurl[1]);
		}
		$num=$delete->delete($id);
		if($num){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	}
	public function shake(){
		$this->display();
	}
	public function ceremony(){
		$this->display();
	}
	
}