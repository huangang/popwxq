<?php
	class publicnumModel extends Model{
		protected $_validate=array(
			array('pnum','require','公共账号名称必须填写!'),
			array('original','require','公共账号原始ID必须填写!'),
		);
	}
?>
