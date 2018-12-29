<?php
namespace Admin\Controller;
use Think\Controller;
class SetAwardController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();
		$this->uid=$_SESSION['admin'];
		if($this->uid['id']==2){
			$this->error('没有管理权限！！！！！');
			exit;
		}

		$this->assign('access', 'e');
		$this->assign('position', '手动设奖记录');
	}
	
	/**
	 * 获取手动设奖
	 */
	public function read()
	{
		
		$pageSize 			= 10;
		$p					= I('get.p');//获取第几页
		
		$model		= M('set_award');
		
		$output['rowsOrder'] = $model->where()->order('id desc')->select();
				
		$count 	= $model->where($where)->count();
		
		$Page       = new \Think\Page($count, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
		
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('output', $output);
		$this->display('admin_setAward_read');
	}
	
	
	/**
	 * 添加
	 */
	public function add()
	{
		
		//前几期
		$next = getNowDate();
		
		$map = array();
		$map['time_hour'] 	= $next['nextHour'];
		$map['time_minute'] = $next['nextMinute'];
			
		$model = M('award');
		$rowAward  = $model->where($map)->find();
				
		//get 方式
		if(IS_GET)
		{
			
			$output['phase'] = $rowAward['phase'];
			$output['next']	 = $next;

			$this->assign('output', $output);
			$this->display('admin_setAward_add');
		}
		
		
		//post 方式
		if(IS_POST)
		{
			$r = array();
			
			$cata_one 	= I('post.cata_one');
			$cata_two	= I('post.cata_two');
			$cata_three	= I('post.cata_three');
			$data = $this->_getNum($cata_one, $cata_two ,$cata_three);
			
			
			$r['time_day']		= date('Ymd');
			$r['time_hour']		= $rowAward['time_hour'];
			$r['time_minute']	= $rowAward['time_minute'];
			$r['time_post']		= date('Y-m-d H:i:s');
			$r['phase']			= $rowAward['phase'];
			$r['one']			= $data['one'];
			$r['two']			= $data['two'];
			$r['three']			= $data['three'];
			$r['four']			= $data['four'];
			$r['five']			= $data['five'];
			
			$modelSetAward = M('set_award');
			$result = $modelSetAward->add($r);
			
			if($result)
			{
				$this->success('添加成功','/Admin/SetAward/read');
				exit;
			}
			
			$this->error('添加失败');
			
		}
		
	}
	
	
	/**
	 * 删除记录
	 */
	public function del(){
		
		$id = I('get.id');
		
		$modelSetAward = M('set_award');
		
		$result = $modelSetAward->where(array('id'=>$id))->delete();
		
		if($result)
		{
			$this->success('删除成功','/Admin/SetAward/read');
			exit;
		}
			
		$this->error('删除失败');
		
	}
	
	//cata_one = 1 小 cata_one = 2 大
	//cata_two = 1 小 cata_two = 2 大
	private function _getNum($cata_one, $cata_two, $cata_three)
	{
	
		while(1){
			
			$one 	= rand(0,9);
			$two 	= rand(0,9);
			$three 	= rand(0,9);
			$four 	= rand(0,9);
			$five 	= rand(0,9);
			
			$num = $one.$two.$three.$four.$five;
			
			$lastNumOne = $num%110+1;
			$lastNumTwo = $num%56+1;
			$lastNumThree = $five%2;
			
			if($cata_one == 1)
			{
				if($lastNumOne >= 56 && $lastNumOne <= 110)
				{
					continue;
				}
			}
			
			if($cata_one == 2)
			{
				if($lastNumOne <= 55 && $lastNumOne >=1)
				{
					continue;
				}
			}

			if($cata_two == 1)
			{
				if($lastNumTwo >= 29 && $lastNumTwo <= 56)
				{
					continue;
				}
			}
			
			if($cata_two == 2)
			{
				if($lastNumTwo <= 28 && $lastNumTwo >=1)
				{
					continue;
				}
			}
			if($cata_three == 1)
			{
				if($lastNumThree==0)
				{
					continue;
				}
			}

			if($cata_three == 2)
			{
				if($lastNumThree!==0)
				{
					continue;
				}
			}
			break;
			
		}
		
		
		$data = array('one'=>$one, 'two'=>$two, 'three'=>$three, 'four'=>$four, 'five'=>$five);
		return $data;
		
	}
	
	

    
    
}