<?php
/**
 * 用户管理
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
	
	public function _initialize()
	{
	
		parent::_initialize();
	
		$this->assign('access', 'c');
		$this->assign('position', '会员管理');
	}
	
	/**
	 * 显示所有用户
	 */
	public function read(){
    	
		$pageSize 			= 10;
		$p					= I('get.p');//获取第几页
		
		//筛选条件
		$phone 		= I('get.phone');
		$parent_id 	= I('get.parent_id');
		$startime	= I('get.startime');
		$endtime	= I('get.endtime');
		
		$where = array();
		
		if(!empty($phone))
		{
			$where['phone'] = $phone;
		}
		
		if(!empty($parent_id))
		{
			$where['parent_id'] = $parent_id;
		}
		

		if($startime && $endtime){
			$this->assign('start', $startime);
			$this->assign('end', $endtime);
			
			$where['create_time'] = array(array('EGT', $startime), array('ELT', $endtime));
		}
		
		
	
		$model 			= M('user');
		$memberRows		= $model->where($where)->order('id desc')->page($p, $pageSize)->select();
		
		$memberCount 	= $model->where($where)->count();
		
		$Page       = new \Think\Page($memberCount, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('output', $memberRows);
		$this->assign('where', $where);
		$this->display('admin_user_read');
    }
    
    /**
     * 设置状态
     */
    public function set_type()
    {
    	$type = I('get.type');
    	$id	  = I('get.id');
    	
    	if($type != 0 && $type !=1)
    	{
    		$this->error('代理参数错误');
    		exit;
    	}
    	    	
    	$data = array();
    	$data['tui_type']	= $type;
    	$data['id']			= $id;
    	
    	$modelUser 	= M('user');
    	    	
    	$result = $modelUser->save($data);
    	
    	if($result)
    	{
    		$this->success('设置成功');
    		exit;
    	}
    	
    	$this->error('设置失败');
    	
    }
    
    /**
     * 某个人
     */
    public function user_one()
    {
    	
    	$id = I('get.id');
    	
    	$model = M('user');
    	
    	//下面总人数
    	$sql = "call showUserSon($id,0,1000)";
    	$result = $model->query($sql);
    	
    	$modelOrder = M('order');
    	foreach ($result as $k=>$v)
    	{
    		//累计
    		$result[$k]['sum'] = $modelOrder->field('SUM(case when catagory_id = 1 then goods_num else 0 end) as sum_number_c1,SUM(case when catagory_id = 2 then goods_num else 0 end) as sum_number_c2')
    		->where(array('user_id'=>$v['id'], 'pay_status'=>1))->find();
    		
    	}
    	
    		
    	
    	$this->assign('output', $result);
    	$this->display('admin_user_one');
    }
	public function bank(){
		$id = I('get.id');
		$model=M('user');

		//获取当前用户
		$result=$model->where('id='.$id)->find();

		if(IS_POST){
			$id = I('post.id');
			$data['user_name']=I('post.user_name');
			$data['bank']=I('post.bank');
			$data['bank_num']=I('post.bank_num');
			$row=$model->where('id='.$id)->save($data);
			if($row)
			{
				$this->error('银行卡信息修改成功！');
				exit;
			}

    		$this->error('银行卡信息修改失败！');
    		exit;

		}

		$this->assign('output', $result);
		$this->display('admin_user_bank');
	}
    
}