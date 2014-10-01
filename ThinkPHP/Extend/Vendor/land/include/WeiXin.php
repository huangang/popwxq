<?php
require("LeaWeiXinClient.php");
class WeiXin
{
	private $token; // 公共平台申请时填写的token
	private $account;
	private $password;
	private $cookiePath; // 保存cookie的文件路径
	private $webTokenPath; // 保存webToken的文路径

	// 缓存的值
	private $webToken; // 登录后每个链接后都要加token
	private $cookie;

	private $lea;

	// 构造函数
	public function __construct($config) {
		if(!$config) {
			exit("error");
		}

		// 配置初始化
		$this->account = $config['account'];
		$this->password = $config['password'];
		$this->cookiePath = $config['cookiePath'];
		$this->webTokenPath = $config['webTokenPath'];

		$this->lea = new LeaWeiXinClient();

		// 读取cookie, webToken
		$this->getCookieAndWebToken();
	}

	// 登录, 并获取cookie, webToken

	/**
	 * 模拟登录获取cookie和webToken
	 */
	public function login() {
		$url = "http://mp.weixin.qq.com/cgi-bin/login?lang=zh_CN";
		$post["username"] = $this->account;
		$post["pwd"] = md5($this->password);
		$post["f"] = "json";
		$re = $this->lea->submit($url, $post);

		// 保存cookie
		$this->cookie = $re['cookie'];
		file_put_contents($this->cookiePath, $this->cookie);

		// 得到token
		$this->getWebToken($re['body']);

		return true;
	}

	/**
	 * 登录后从结果中解析出webToken
	 * @param  [String] $logonRet
	 * @return [Boolen]
	 */
	private function getWebToken($logonRet) {
		$logonRet = json_decode($logonRet, true);
		$msg = $logonRet["ErrMsg"]; // /cgi-bin/indexpage?t=wxm-index&lang=zh_CN&token=1455899896
		$msgArr = explode("&token=", $msg);
		if(count($msgArr) != 2) {
			return false;
		} else {
			$this->webToken = $msgArr[1];
			file_put_contents($this->webTokenPath, $this->webToken);
			return true;
		}
	}

	/**
	 * 从缓存中得到cookie和webToken
	 * @return [type]
	 */
	public function getCookieAndWebToken() {
		$this->cookie = file_get_contents($this->cookiePath);
		$this->webToken = file_get_contents($this->webTokenPath);

		// 如果有缓存信息, 则验证下有没有过时, 此时只需要访问一个api即可判断
		if($this->cookie && $this->webToken) {
			$re = $this->getUserInfo(1);
			if(is_array($re)) {
				return true;
			}
		} else {
			return $this->login();
		}
	}


	/**
	 * 获取用户的信息
	 * @param  string $fakeId 用户的fakeId
	 * @return [type]     [description]
	 */
	public function getUserInfo($fakeId)
	{
		$url = "http://mp.weixin.qq.com/cgi-bin/getcontactinfo?t=ajax-getcontactinfo&lang=zh_CN&token={$this->webToken}&fakeid=$fakeId";
		$re = $this->lea->submit($url, array(), $this->cookie);
		$result = json_decode($re['body'], 1);
		if(!$result) {
			$this->login();
		}
		return $result;
	}

	/*
	 得到最近发来的信息
    [0] => Array
        (
            [id] => 189
            [type] => 1
            [fileId] => 0
            [hasReply] => 0
            [fakeId] => 1477341521
            [nickName] => lealife
            [remarkName] => 
            [dateTime] => 1374253963
        )
        [ok]
	 */
	public function getLatestMsgs($page = 0) {
		// frommsgid是最新一条的msgid
		$frommsgid = 100000;
		$offset = 50 * $page;
		$url = "http://mp.weixin.qq.com/cgi-bin/message?t=message/list&count=999999&day=7&offset={$offset}&token={$this->webToken}&lang=zh_CN";
		$re = $this->lea->get($url, $this->cookie);
		// print_r($re['body']);

		// 解析得到数据
		// list : ({"msg_item":[{"id":}, {}]})
		$match = array();
		preg_match('/["\' ]msg_item["\' ]:\[{(.+?)}\]/', $re['body'], $match);
		if(count($match) != 2) {
			return "";
		}

		$match[1] = "[{". $match[1]. "}]";

		return json_decode($match[1], 1);
	}
	
	public function getLatestMsgByCreateTimeAndContent($createTime, $content) {
		$lMsgs = $this->getLatestMsgs(0);

		// 最先的数据在前面

		$contentMatchedMsg = array();
		foreach($lMsgs as $msg) {
			// 仅仅时间符合
			if($msg['dateTime'] == $createTime) {
				// 内容+时间都符合
				if($msg['content'] == $content) { 
					return $msg;
				}

			// 仅仅是内容符合
			} else if($msg['content'] == $content) {
				$contentMatchedMsg[] = $msg;
			}
		}
		if($contentMatchedMsg) {
			return $contentMatchedMsg[0];
		}

		return false;
	}
		//获取用户头像
	public function getPicture($fakeId){
		$dir = "/";
		$url = "http://mp.weixin.qq.com/cgi-bin/getheadimg?token={$this->webToken}&fakeid={$fakeId}";
		$re = $this->lea->get($url, $this->cookie);
		file_put_contents('upload/'.$fakeId.'.jpg', $re['body']);
		return true;
	}
	
	///////////////////////////////
	public function getMsg($page = 0,$count=1) {
		// frommsgid是最新一条的msgid
		$frommsgid = 100000;
		$offset = 50 * $page;
		$url = "http://mp.weixin.qq.com/cgi-bin/message?t=message/list&count={$count}&day=7&offset={$offset}&token={$this->webToken}&lang=zh_CN";
		$re = $this->lea->get($url, $this->cookie);
		// print_r($re['body']);

		// 解析得到数据
		// list : ({"msg_item":[{"id":}, {}]})
		$match = array();
		preg_match('/["\' ]msg_item["\' ]:\[{(.+?)}\]/', $re['body'], $match);
		if(count($match) != 2) {
			return "";
		}

		$match[1] = "[{". $match[1]. "}]";

		return json_decode($match[1], 1);
	}
	public function getNewMsgNum($lastid=0){
		$url = "https://mp.weixin.qq.com/cgi-bin/getnewmsgnum?t=ajax-getmsgnum&token={$this->webToken}&lang=zh_CN&lastmsgid=".$lastid;
		$re = $this->lea->get($url, $this->cookie);
		$result = json_decode($re['body'], 1);
		return $result['newTotalMsgCount'];
	}
}
