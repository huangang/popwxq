<?php
	class drawModel extends Model{
		protected $_validate=array(
			array('title','require','标题必须填写!'),
		);
	}
?>
