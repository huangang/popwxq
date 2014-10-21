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
		//表情比对
		$content = $info[0]['content'];
		if(strstr($content,"/:")){
		      $table_change = array("/::)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/0.gif' width=25px hight=25px />",
			  "/::~"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/1.gif' width=25px hight=25px />",
			  "/::B"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/2.gif' width=25px hight=25px />",
			  "/::|"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/3.gif' width=25px hight=25px />",
			  "/:8-)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/4.gif' width=25px hight=25px />",
			  "/::<"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/5.gif' width=25px hight=25px />",
			  "/::$"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/6.gif' width=25px hight=25px />",
			  "/::X"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/7.gif' width=25px hight=25px />",
			  "/::Z"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/8.gif' width=25px hight=25px />",
			  "/::xb("=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/9.gif' width=25px hight=25px />",
			  "/::-|"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/10.gif' width=25px hight=25px />",
			  "/::@"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/11.gif' width=25px hight=25px />",
			  "/::P"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/12.gif' width=25px hight=25px />",
			  "/::D"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/13.gif' width=25px hight=25px />",
			  "/::O"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/14.gif' width=25px hight=25px />",
			  "/::("=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/15.gif' width=25px hight=25px />",
			  "/::+"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/16.gif' width=25px hight=25px />",
			  "/:--b"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/17.gif' width=25px hight=25px />",
			  "/::Q"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/18.gif' width=25px hight=25px />",
			  "/::T"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/19.gif' width=25px hight=25px />",
			  "/:,@P"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/20.gif' width=25px hight=25px />",
			  "/:,@-D"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/21.gif' width=25px hight=25px />",
			  "/::d"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/22.gif' width=25px hight=25px />",
			  "/:,@o"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/23.gif' width=25px hight=25px />",
			  "/::g"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/24.gif' width=25px hight=25px />",
			  "/:|-)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/25.gif' width=25px hight=25px />",
			  "/::!"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/26.gif' width=25px hight=25px />",
			  "/::L"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/27.gif' width=25px hight=25px />",
			  "/::>"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/28.gif' width=25px hight=25px />",
			  "/::,@"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/29.gif' width=25px hight=25px />",
			  "/:,@f"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/30.gif' width=25px hight=25px />",
			  "/::-S"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/31.gif' width=25px hight=25px />",
			  "/:?"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/32.gif' width=25px hight=25px />",
			  "/:,@x"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/33.gif' width=25px hight=25px />",
			  "/:,@@"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/34.gif' width=25px hight=25px />",
			  "/::8"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/35.gif' width=25px hight=25px />",
			  "/:,@!"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/36.gif' width=25px hight=25px />",
			  "/:!!!"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/37.gif' width=25px hight=25px />",
			  "/:xx"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/38.gif' width=25px hight=25px />",
			  "/:bye"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/39.gif' width=25px hight=25px />",
			  "/:wipe"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/40.gif' width=25px hight=25px />",
			  "/:dig"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/41.gif' width=25px hight=25px />",
			  "/:handclap"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/42.gif' width=25px hight=25px />",
			  "/:&-("=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/43.gif' width=25px hight=25px />",
			  "/:B-)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/44.gif' width=25px hight=25px />",
			  "/:<@"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/45.gif' width=25px hight=25px />",
			  "/:@>"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/46.gif' width=25px hight=25px />",
			  "/::-O"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/47.gif' width=25px hight=25px />",
			  "/:>-|"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/48.gif' width=25px hight=25px />",
			  "/:P-("=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/49.gif' width=25px hight=25px />",
			  "/::xb|"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/50.gif' width=25px hight=25px />",
			  "/:X-)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/51.gif' width=25px hight=25px />",
			  "/::*"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/52.gif' width=25px hight=25px />",
			  "/:@x"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/53.gif' width=25px hight=25px />",
			  "/:8*"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/54.gif' width=25px hight=25px />",
			  "/:pd"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/55.gif' width=25px hight=25px />",
			  //注意此行
			  			"/:"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/56.gif' width=25px hight=25px />",
			  "/:beer"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/57.gif' width=25px hight=25px />",
			  "/:basketb"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/58.gif' width=25px hight=25px />",
			  "/:oo"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/59.gif' width=25px hight=25px />",
			  "/:coffee"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/60.gif' width=25px hight=25px />",
			  "/:eat"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/61.gif' width=25px hight=25px />",
			  "/:pig"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/62.gif' width=25px hight=25px />",
			  "/:rose"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/63.gif' width=25px hight=25px />",
			  "/:fade"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/64.gif' width=25px hight=25px />",
			  "/:showlove"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/65.gif' width=25px hight=25px />",
			  "/:heart"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/66.gif' width=25px hight=25px />",
			  "/:break"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/67.gif' width=25px hight=25px />",
			  "/:cake"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/68.gif' width=25px hight=25px />",
			  "/:li"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/69.gif' width=25px hight=25px />",
			  "/:bome"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/70.gif' width=25px hight=25px />",
			  "/:kn"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/71.gif' width=25px hight=25px />",
			  "/:footb"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/72.gif' width=25px hight=25px />",
			  "/:ladybug"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/73.gif' width=25px hight=25px />",
			  "/:shit"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/74.gif' width=25px hight=25px />",
			  "/:moon"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/75.gif' width=25px hight=25px />",
			  "/:sun"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/76.gif' width=25px hight=25px />",
			  "/:gift"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/77.gif' width=25px hight=25px />",
			  "/:hug"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/78.gif' width=25px hight=25px />",
			  "/:strong"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/79.gif' width=25px hight=25px />",
			  "/:weak"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/80.gif' width=25px hight=25px />",
			  "/:share"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/81.gif' width=25px hight=25px />",
			  "/:v"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/82.gif' width=25px hight=25px />",
			  "/:@)"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/83.gif' width=25px hight=25px />",
			  "/:jj"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/84.gif' width=25px hight=25px />",
			  "/:@@"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/85.gif' width=25px hight=25px />",
			  "/:bad"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/86.gif' width=25px hight=25px />",
			  "/:lvu"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/87.gif' width=25px hight=25px />",
			  "/:no"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/88.gif' width=25px hight=25px />",
			  "/:ok"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/89.gif' width=25px hight=25px />",
			  "/:love"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/90.gif' width=25px hight=25px />",
			  //"/:weak"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/91.gif' width=25px hight=25px />",
			  "/:jump"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/92.gif' width=25px hight=25px />",
			  "/:shake"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/93.gif' width=25px hight=25px />",
			  //"/:weak"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/94.gif' width=25px hight=25px />",
			  "/:circle"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/95.gif' width=25px hight=25px />",
			  "/:kotow"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/96.gif' width=25px hight=25px />",
			  "/:turn"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/97.gif' width=25px hight=25px />",
			  "/:skip"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/98.gif' width=25px hight=25px />",
			  "/:oY"=>"<img src='http://rescdn.qqmail.com/zh_CN/images/mo/DEFAULT2/99.gif' width=25px hight=25px />"
	      );
        $content= strtr($content,$table_change); 
    }
		$data[$lastid]['content'] = $content;
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