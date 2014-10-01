<?php

class ButtonAction extends Action
{
    private $appid;
    private $appsecret;
    //获得凭证接口
	//返回数组，accesstoken 和  time 有效期 
	public function access_token(){
		Vendor('weixin.Wechat#class');
		$publicnum=M('publicnum')->find();
		$this->appid=$publicnum['appid'];
		$this->appsecret=$publicnum['appsecret'];
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->appsecret}";
		$cont = file_get_contents($url);
		return json_decode($cont, 1);
	}

   //创建自定义菜单
	function menu() {
        $data = ' {
		     "button":[
		     {	
		         "name":"程序员",
		         "sub_button":[
		            {
		               "type":"view",
		               "name":"杂谈",
		               "url":"http://www.huangang.net/programmer-technology/by-talk"
		            },
		            {
		               "type":"view",
		               "name":"后端开发",
		               "url":"http://www.huangang.net/programmer-technology/back-end"
		            },
		            {
		               "type":"view",
		               "name":"前端开发",
		               "url":"http://www.huangang.net/programmer-technology/front-end"
		            },
		            {
		               "type":"click",
		               "name":"上墙",
		               "key":"wall"
		            }]
		      },
		      {
		           "type":"view",
	               "name":"杂文随笔",
	               "url":"http://www.huangang.net/essay"
		      },
		      {
		      	"type":"view",
		      	"name":"PPT",
		      	"url":"http://ppt.huangang.net/"
		       }
		   ]}';

		$access_token = $this -> access_token();
		$ch = curl_init('https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $access_token['access_token']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
		$data = curl_exec($ch);
		print_r($data);//创建成功返回：{"errcode":0,"errmsg":"ok"}
	}


}