<?php
	class tulingrobotModel extends Model{
		protected $_validate=array(
			array('apikey','require','图灵API必须填写!'),
		);
	}
?>
