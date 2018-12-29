<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
  
	protected  $uid = null;
	
	public function _initialize(){
		
		$this->uid = $_SESSION['admin'];

		if(empty($this->uid)){
			$this->error('请先登录');
			exit;
		}
		$this->assign('adminid',$this->uid['id']);
		
	}
    

    
    
}