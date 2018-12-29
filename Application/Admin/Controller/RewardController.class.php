<?php
namespace Admin\Controller;
use Think\Controller;
class RewardController extends BaseController 
{
  
	public function _initialize()
	{
	
		parent::_initialize();

		$this->assign('access', 'f');
		$this->assign('position', '兑奖订单');
	}
	
	/**
	 * 获取分类
	 */
	public function read()
	{
		
		$pageSize 			= 10;
		$p					= I('get.p');//获取第几页
		
		$modelOrder		= M('order');
		
		$award_code		= I('get.award_code');
		
		$where = array();
		$where['pay_status'] = 1;
		$where['result']	 = 2;
		
		//不为空
		if(!empty($award_code))
		{
			$where['award_code'] = $award_code;	
		}
		
		
		$output['rowsOrder'] = $modelOrder->where($where)->page($p, $pageSize)->order('is_get asc, id asc')->select();
		
		$count 	= $modelOrder->where($where)->count();
		
		$Page       = new \Think\Page($count, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
		
		$this->assign('where', $where);
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('output', $output);
		$this->display('admin_reward_read');
	}
	
	
	/**
	 * 兑奖方法
	 */
	public function set()
	{
		$id = I('get.id');
		
		$model = M('order');
		
		$where = array('id'=>$id);
		
		$row 	= $model->where($where)->find();
		
		if(empty($row))
		{
			$this->error('兑奖记录不存在！');
			exit;
		}
		
		
		if($row['is_get'] == 1)
		{
			$this->error('已兑奖，不能重复兑换！');
			exit;
		}
		
		//设置为已兑换
		
		$result = $model->where($where)->save(array('is_get'=>1));
		
		if($result)
		{
			$this->error('兑奖成功', '/Admin/reward/read');
			exit;
		}
		
		$this->error('兑奖失败，请联系管理员！！！');
		
		
	}
	
	
	/**
	 * all
	 */
	public function all()
	{
		$this->assign('access', 'p');
		$this->display('admin_reward_all');
	}
	
	
	/**
	 * 计算
	 */
	public function jisuan()
	{
		$all = I('post.all');

		$str = $this->_parse($all);
		
		$map = array();
		$map['award_code']  = array('in', $str);
		$map['result']		= 2;
		$map['is_get']		= 0;
		
		$model 	= M('order');
		$rows 	= $model->where($map)->select();
		
		if(empty($rows))
		{
			echo '订单不存在或已兑换';
			exit;
		}
		
		$sum = 0;
		
		foreach($rows as $v)
		{
			
			if($v['catagory_id'] == 1)
			{
				$price = $v['goods_num']*100; 
			}
			
			if($v['catagory_id'] == 2)
			{
				$price = $v['goods_num']*50;
			}
			
			
			$sum += $price;
		}
		
		echo  '订单总额：'.$sum;
	}
	
	/**
	 * 批量审核 
	 */
	public function shenhe()
	{
		$all = I('post.all');
	
		$str = $this->_parse($all);
	
		$map = array();
		$map['award_code']  = array('in', $str);
		$map['result']		= 2;
		$map['is_get']		= 0;
	
		$model 	= M('order');
		$rows 	= $model->where($map)->save(['is_get'=>1]);
	
		if($rows)
		{
			exit('批量审核成功');
		}
		
		exit('批量审核失败');
	}
	
	
	/**
	 * 
	 * @param $str
	 * 3A03BFD14FC2D992(1单),72E597D926B9106D(2单),65B24E2F6B391E73(1单)
	 * 
	 * 匹配掉括号内
	 */
	private function _parse($str)
	{
		$out = preg_replace('/\(.*?\)/', '',$str);	
		return $out;
	}

    
    
}