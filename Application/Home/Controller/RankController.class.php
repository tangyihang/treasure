<?php
namespace Home\Controller;
use Think\Controller;
class RankController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		$time = getNowDate();
		$btid=2;
		$this->assign('btid', $btid);
		$endTime = date('Y-m-d', strtotime($time['nextDay'])) . ' ' .$time['nextTime'];
		$this->assign('endTime', $endTime);
		
	}
	
	//24小时排行榜
    public function day()
    {
    	
    	//总排行榜
    	$order = D('order');
    	
    	$row	= $order->getRankDay();
    	
    	$output['row'] = $row;
    	$output['title'] = '夺宝排行榜 | 全民抢购商城';
    	$output['set'] = $this->set;

    	$this->assign('output', $output);
    	$this->display('home_rank_day');
    }
    
    
    //7天
    public function day7()
    {
    	 
    	//总排行榜
    	$order = D('order');
    	 
    	$row	= $order->getRank7Day();
    	 
    	$output['row'] = $row;
    	$output['title'] = '夺宝排行榜 | 全民抢购商城';
    	$output['set'] = $this->set;
    
    	$this->assign('output', $output);
    	$this->display('home_rank_day7');
    }
    
    //7天
    public function day30()
    {
    
    	//总排行榜
    	$order = D('order');
    
    	$row	= $order->getRank30Day();
    
    	$output['row'] = $row;
    	$output['title'] = '夺宝排行榜 | 全民抢购商城';
    	
    	$output['set'] = $this->set;
    
    	$this->assign('output', $output);
    	$this->display('home_rank_day30');
    }
    
    
    //夺宝看盘
    public function look()
    {
		$btid=1;
		$this->assign('btid', $btid);
    	$page   	= I('request.page');
    	
    	if(empty($page))
    	{
    		$page = 1;
    	}
    	
    	$model 		= M('award_log');
    	
    	$where 		= array();
    	
    	$rowOrder 		= $model->where($where)->page($page, 15)->order('id desc')->select();
    	
    	$modelOrderMy		= M('order');
    	
    	foreach($rowOrder as $k=>$v)
    	{
    		$rowOrder[$k]['openTime'] = date('Y-m-d', strtotime($v['time_day'])) .' '. $v['time_hour'] . ':'. $v['time_minute'];
    		$rowOrder[$k]['openNum']	= $v['one'] . ' ' . $v['two']. ' '  . $v['three'] . ' ' . $v['four']. ' ' . $v['five'];
    		$num = $v['one'].$v['two'].$v['three'].$v['four'].$v['five'];
    		$rowOrder[$k]['mochu56']	= $num%56+1;
    		$rowOrder[$k]['mochu110']	= $num%110+1;
			$rowOrder[$k]['lastnumjo'] = $v['five'];
			$rowOrder[$k]['mochujo']	= $v['five']%2;
    		$rowOrder[$k]['one'] = $v['one'];
			$rowOrder[$k]['two'] = $v['two'];
			$rowOrder[$k]['three'] = $v['three'];
			$rowOrder[$k]['four'] = $v['four'];
			$rowOrder[$k]['five'] = $v['five'];
    		if($rowOrder[$k]['mochu56'] <= 28)
    		{
    			$rowOrder[$k]['mochu56R'] = 0;
    			
    		}else{
    			
    			$rowOrder[$k]['mochu56R'] = 1;
    		}
    		
    		if($rowOrder[$k]['mochu110'] <= 55)
    		{
    			$rowOrder[$k]['mochu110R'] = 0;
    			 
    		}else{
    			 
    			$rowOrder[$k]['mochu110R'] = 1;
    		}
			
    	
    		
    	}
    	
    	//get
    	if(IS_GET)
    	{
    		$output = [];
    		$output['rowOrder'] = $rowOrder;
    		$output['set'] = $this->set;
    			
    		$output['title'] = '夺宝看盘 | 全民抢购商城';
    		$this->assign('output', $output);
    		$this->display('home_rank_look');
    	}
    	
    	//post
    	if(IS_POST)
    	{
    		if(empty($rowOrder))
    		{
    			$response = [];
    			$response['code'] = 1;
    	
    		}else{
    	
    			$response = [];
    			$response['code'] = 11;
    			$response['data'] = $rowOrder;
    	
    		}
    	
    		echo json_encode($response);
    	}
    	
    }
    
    
    
    
    
    
  
    
 
}