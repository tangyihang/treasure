<?php
namespace Home\Controller;
use Think\Controller;
class RankajaxController extends Controller {
		
	
	public function _initialize(){
			
		$time = getNowDate();
		
	}
	
		
    
     //夺宝看盘
    public function ajaxlook()
    {
    	$page  = I('page');

    	
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
    	
    	echo $_GET['jsoncallback'] . "(".json_encode($rowOrder).")";  
	}
    
    
      //夺宝看盘
    public function ajaxlook1()
    {

    	$btime = I('btime');
		$etime = I('etime');
		$btime=str_replace("%20"," ",$btime);
		$etime=str_replace("%20"," ",$etime);
		
    	$model 		= M('award_log');
    	
    	$where 		= array();
    	$where['time_post'] 	= array(array('EGT', $btime ), array('ELT', $etime));
    	$rowOrder 		= $model->where($where)->order('id desc')->select();

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
    	
    	echo $_GET['jsoncallback'] . "(".json_encode($rowOrder).")";  
	}
    
  
    
 
}