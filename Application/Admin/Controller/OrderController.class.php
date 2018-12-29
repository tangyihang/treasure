<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();

		$this->assign('access', 'd');
		$this->assign('position', '订单管理');
	}
	
	/**
	 * 获取分类
	 */
	public function read()
	{
		
		$pageSize 			= 10;
		$p					= I('get.p');//获取第几页
		
		$modelOrder		= M('order');
		
		//筛选条件
		$phone 			= I('get.phone');
		$parent_phone 	= I('get.parent_phone');
		$startime		= I('get.startime');
		$endtime		= I('get.endtime');
		$catagory_id	= I('get.catagory_id');
		$result			= I('get.result');
		
		$where = array();
		
		if(!empty($phone))
		{
			$where['phone'] = $phone;
		}
		
		if(!empty($parent_phone))
		{
			$this->assign('parent_phone', $parent_phone);
			//代理id
			$modelUser = M('user');
			$rowParent = $modelUser->where(['phone'=>$parent_phone])->find();
			
			if(empty($rowParent))
			{
				$this->error('代理不存在');
				exit;
			}
			
			$sql = "call showUserSon('{$rowParent['id']}',0,100000)";
			
			$rowSon = $modelUser->query($sql);

			if(empty($rowSon)){
				$this->error('代理无推广用户');
				exit;
			}
			
			$userSonId = [];
			
			foreach ($rowSon as $v)
			{
				$userSonId[] = $v['id'];
			}
			
			$where['user_id']  = array('in',$userSonId);
		}
		
		if(!empty($catagory_id))
		{
			$where['catagory_id'] = $catagory_id;		
		}
		
		if(!empty($result))
		{
			$where['result'] = $result;
		}
		
		
		
		
		if($startime && $endtime){
			$this->assign('start', $startime);
			$this->assign('end', $endtime);
				
			$where['pay_time'] = array(array('EGT', $startime), array('ELT', $endtime));
		}
		
		$output['rowsOrder'] = $modelOrder->alias('o')->field('o.*,u.phone,u.nickname')->join('LEFT JOIN __USER__ as u ON u.id = o.user_id')->where($where)->page($p, $pageSize)->order('o.id desc')->select();
		$count 	= $modelOrder->where($where)->count();
		
		$Page       = new \Think\Page($count, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
		
		$this->assign('where',$where);
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('output', $output);
		$this->display('admin_order_read');
	}
	
	
	

    
    
}