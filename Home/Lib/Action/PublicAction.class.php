<?php
	class PublicAction extends Action{
		public function code(){
			$w=isset($_GET['w'])?$_GET['w']:30;
			$h=isset($_GET['h'])?$_GET['h']:30;
			import('ORG.Util.Image');
    		Image::buildImageVerify(4,1,'png',$w,$h,'code');
		}
	}
?>
