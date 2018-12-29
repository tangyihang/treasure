<?php 
namespace Vip\Model;
use Think\Model;

class OrderModel extends Model 
{
	
	
	public function unGet($user_id, $page, $pageSize)
	{
		
		$model 		= M('order');
		
		$where 				= array();
		$where['user_id'] 	= $user_id;
		$where['pay_status']= 1;
		$where['result']	= 2;
		$where['is_get']	= 0;
		
		$row 		= $model->where($where)->page($page, $pageSize)->order('id desc')->select();
		
		return $row;
		
	}
	
	public function haveGet($user_id, $page, $pageSize)
	{
	
		$model 		= M('order');
	
		$where 				= array();
		$where['user_id'] 	= $user_id;
		$where['pay_status']= 1;
		$where['result']	= 2;
		$where['is_get']	= 1;
	
		$row 		= $model->where($where)->page($page, $pageSize)->order('id desc')->select();
	
		return $row;
	
	}
	
	
	public function today($user_id)
	{
		$where = array();
		
		//今日汇总
		$start 	= date('Y-m-d').' 00:00:00';
		$end	= date('Y-m-d').' 23:59:59';
		
		$where['pay_time'] = array(array('EGT', $start), array('ELT', $end));
		$where['pay_status']	= 1;
		$where['user_id']		= $user_id;
		
		$model 	= M('order');
		$number = $model->where($where)->sum('goods_num');


		$number = empty($number)?0:$number;
		
		return $number;
	}
	//month
	public function month($user_id)
	{
		$where = array();
	
		//今日汇总
		$start 	= date('Y-m').'-01 00:00:00';
		$end	= date('Y-m').'-31 23:59:59';
	
		$where['pay_time'] = array(array('EGT', $start), array('ELT', $end));
		$where['pay_status']	= 1;
		$where['user_id']		= $user_id;
	
		$model 	= M('order');
		$number = $model->where($where)->sum('goods_num');
	
		$number = empty($number)?0:$number;
	
		return $number;
	}
	//all
	public function all($user_id)
	{
		$where = array();
	
		$where['pay_status']	= 1;
		$where['user_id']		= $user_id;
	
		$model 	= M('order');
		$number = $model->where($where)->sum('goods_num');
	
		$number = empty($number)?0:$number;
	
		return $number;
	}
	
	
	
	

}


?>