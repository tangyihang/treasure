<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
	

	public function _initialize(){
		
		parent::_initialize();
		$this->assign('position', '系统首页');
	
	}
	
    //index
	public function index(){
    	
		$output['rowSum'] 	= $this->_getSum();
		
		$model 				= M('catagory');
		$output['rowCata'] 	= $model->select();
		$output['next']		= getNowDate();
		
		$model 	= M('award');
		$output['award'] 	= $model->where(array('time_hour'=>$output['next']['nextHour'], 'time_minute'=>$output['next']['nextMinute']))->find();
		
		//获取统计结果
		$type 			= I('get.type');
		$startime		= I('get.startime');
		$endtime		= I('get.endtime');
		
		$this->assign('type', $type);
		$this->assign('start', $startime);
		$this->assign('end', $endtime);
		
		$whereUser 	= array();
		$whereOrder = array();
		
		$modelUser 	= M('user');
		$modelOrder = M('order');
		
		//时间段
		if($type == 0)
		{
			$whereUser['create_time'] 	= array(array('EGT', $startime), array('ELT', $endtime));
			$whereOrder['pay_time']		= array(array('EGT', $startime), array('ELT', $endtime));
		}
		
		
		//今日
		if($type == 1)
		{
			$startime			= date('Y-m-d').' 00:00:00';
			$endtime			= date('Y-m-d').' 23:59:59';
			$whereUser['create_time'] 	= array(array('EGT', $startime), array('ELT', $endtime));
			$whereOrder['pay_time'] 	= array(array('EGT', $startime), array('ELT', $endtime));
		}
		
		//昨日
		if($type == 2)
		{
			$whereUser['_string'] 	= 'create_time >=  NOW() - interval 1 day';
			$whereOrder['_string'] 	= 'pay_time >=  NOW() - interval 1 day';
		}
		
		//7日
		if($type == 3)
		{
			$whereUser['_string'] 	= 'create_time >=  NOW() - interval 7 day';
			$whereOrder['_string'] 	= 'pay_time >=  NOW() - interval 7 day';
		}
		
		//30日
		if($type == 4)
		{
			$whereUser['_string'] 	= 'create_time >=  NOW() - interval 30 day';
			$whereOrder['_string'] 	= 'pay_time >=  NOW() - interval 30 day';
		}
		
		$whereBase = $whereOrder;
		$whereOrder['pay_status'] = 1;
		//注册人数
		$output['zhuce'] 	= $modelUser->where($whereUser)->count();
		//投注人数
		$output['touzhu'] 	= count($modelOrder->field('id')->where($whereOrder)->group('user_id')->select());
		//总购买额
		
		$output['goumaie']  = $modelOrder->where($whereOrder)->sum('goods_price_sum');
		
		//总购买量
		$output['goumail']	= $modelOrder->where($whereOrder)->sum('goods_num');
		
		//总成功额
		$whereOrder['result'] = 2;
		$output['suce'] = $modelOrder->where($whereOrder)->sum('goods_price_sum');
		
		//总成功量
		$output['sucl'] = $modelOrder->where($whereOrder)->sum('goods_num');
		
		//总失败额
		$whereOrder['result'] = 1;
		$output['faile'] = $modelOrder->where($whereOrder)->sum('goods_price_sum');
		
		//总失败量
		$output['faill'] = $modelOrder->where($whereOrder)->sum('goods_num');
		
		//100购买额
		$whereBase['pay_status'] = 1;
		$whereBase['catagory_id'] = 1;
		
		$output['goumaie100'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
		
		$output['goumail100'] = $modelOrder->where($whereBase)->sum('goods_num');
		
		//100成功额
		$whereBase['result'] = 2;
		$output['suce100'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
		$output['sucl100'] = $modelOrder->where($whereBase)->sum('goods_num');
		
		//100失败额
		$whereBase['result'] = 1;
		$output['faile100'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
		$output['faill100'] = $modelOrder->where($whereBase)->sum('goods_num');
		
		
		//50购买额
		$whereBase['pay_status'] = 1;
		$whereBase['catagory_id'] = 2;
		
		$output['goumaie50'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
	
		$output['goumail50'] = $modelOrder->where($whereBase)->sum('goods_num');
		
		//100成功额
		$whereBase['result'] = 2;
		$output['suce50'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
		$output['sucl50'] = $modelOrder->where($whereBase)->sum('goods_num');
		
		//100失败额
		$whereBase['result'] = 1;
		$output['faile50'] = $modelOrder->where($whereBase)->sum('goods_price_sum');
		$output['faill50'] = $modelOrder->where($whereBase)->sum('goods_num');
				
		$this->assign('output', $output);
		$this->display('admin_index_index');
    
    }
    
    //ajax更新
    public function ajax()
    {
    	$rowSum = $this->_getSum();
    	echo json_encode($rowSum);
    }
    
    private function _getSum()
    {
    	//汇总当前记录
    	$next = getNowDate();
    	 	
    	
    	$where = array();
    	
    	$where['time_day'] 		= $next['nextDay'];
    	$where['time_hour'] 	= $next['nextHour'];
    	$where['time_minute']	= $next['nextMinute'];
    	$where['pay_status']	= 1;
        $where['_string'] 	= 'pay_type != 4';

    	$model 	= M('order');
    	
    	$where['catagory_id']	= 1;
    	$where['snatch_type']	= 1; //买小
    	$row['CataOneSmall'] 	= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类1 小
    	    	
    	if(empty($row['CataOneSmall'])){
    		$row['CataOneSmall'] = 0;
    	}
    	
    	$where['snatch_type']	= 2;
    	$row['CataOneBig']		= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类1 大
    	
    	if(empty($row['CataOneBig'])){
    		$row['CataOneBig'] = 0;
    	}
    	
    	$where['catagory_id']	= 2;
    	$where['snatch_type']	= 1; //买小
    	$row['CataTwoSmall'] 	= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类2 小
    	
    	if(empty($row['CataTwoSmall'])){
    		$row['CataTwoSmall'] = 0;
    	}
    	
    	$where['snatch_type']	= 2;
    	$row['CataTwoBig']		= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类2 大
   
    	if(empty($row['CataTwoBig'])){
    		$row['CataTwoBig'] = 0;
    	}
    	
		$where['catagory_id']	= 3;
    	$where['snatch_type']	= 1; //买小
    	$row['CataThreeSmall'] 	= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类2 小
    	
    	if(empty($row['CataThreeSmall'])){
    		$row['CataThreeSmall'] = 0;
    	}
    	
    	$where['snatch_type']	= 2;
    	$row['CataThreeBig']		= $model->field('sum(goods_price_sum) as sum')->where($where)->find()['sum']; //分类2 大
   
    	if(empty($row['CataThreeBig'])){
    		$row['CataThreeBig'] = 0;
    	}
		
    	return $row;
    }
    
    
    
}