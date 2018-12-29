<?php
namespace Home\Controller;
use Think\Controller;
class SetController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		$time = getNowDate();
			
		$endTime = date('Y-m-d', strtotime($time['nextDay'])) . ' ' .$time['nextTime'];
		$this->assign('endTime', $endTime);
		
	}
	
	//规则
	public function rule()
	{
		$output['set']		= $this->set;

		$this->assign('output', $output);
		$this->display('home_set_rule');
		
	}
	//分享
	public function share()
	{

		$this->display('home_set_share');

	}
    
    
    
    
    
  
    
 
}