<?php
class EmptyAction extends Action {
	public function index(){
		$this->redirect('Index/index');
	}
	public function _empty($name){
		$this->redirect('Index/index');
	}
}