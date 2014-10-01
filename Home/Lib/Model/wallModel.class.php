<?php
	class wallModel extends Model{
		protected $_validate=array(
			array('preface','require','序言必须填写!'),
		);
	}
?>
