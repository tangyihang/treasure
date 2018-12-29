<?php
/**
 * 用户管理
 */
namespace Admin\Controller;
use Think\Controller;
class PointsController extends BaseController {
	
	public function _initialize()
	{
	
		parent::_initialize();
	
		$this->assign('access', 'y');
		$this->assign('position', '充值订单');
	}
	
	/**
	 * 显示所有用户
	 */
	public function read(){
    	
		$pageSize 			= 10;
		$p					= I('get.p');//获取第几页
		
		//筛选条件
		$phone 		= I('get.phone');
		$startime	= I('get.startime');
		$endtime	= I('get.endtime');
		$startime2			= date('Y-m-d').' 00:00:00';
		$endtime2			= date('Y-m-d').' 23:59:59';
		$where = array();
		
		if(!empty($phone))
		{
			$where['phone'] = $phone;
		}
		
        $where['pay_status'] = 1;
		

		if($startime && $endtime){
			$this->assign('start', $startime);
			$this->assign('end', $endtime);
			
			$where['pay_time'] = array(array('EGT', $startime), array('ELT', $endtime));
		}
		
		
	
		$model 			= M('points_order');
		$memberRows		= $model->where($where)
                                ->join('LEFT JOIN __USER__ on __USER__.id = __POINTS_ORDER__.user_id')->order('sh_points_order.pay_time desc')
                                ->page($p, $pageSize)->select();
 		
		$memberCount 	= $model->where($where)->count();
		$memberSum   = $model->where($where)
                                ->join('LEFT JOIN __USER__ on __USER__.id = __POINTS_ORDER__.user_id')
								->sum('money');
								
		$where2['type'] = 40;   
		$where2['pay_time'] = array(array('EGT', $startime2), array('ELT', $endtime2));
		$memberSum2   = $model->where($where2)->sum('money');
		
		$Page       = new \Think\Page($memberCount, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('output', $memberRows);
		$this->assign('memberSum', $memberSum);
		$this->assign('memberSum2', $memberSum2);
		$this->assign('where', $where);
		$this->display('admin_points_read');
    }
    
  
  public function getOrder()
  {
        $pageSize           = 10;
        $p                  = I('get.p');//获取第几页
        
        //筛选条件
        $phone      = I('get.phone');
        $startime   = I('get.startime');
        $endtime    = I('get.endtime');
        $startime2			= date('Y-m-d').' 00:00:00';
		$endtime2			= date('Y-m-d').' 23:59:59';
		
        $where = array();
        
        if(!empty($phone))
        {
            $where['phone'] = $phone;
        }
        
        $where['type'] = 40;        

        if($startime && $endtime){
            $this->assign('start', $startime);
            $this->assign('end', $endtime);
            
            $where['sh_points_detail.create_time'] = array(array('EGT', $startime), array('ELT', $endtime));
        }
        
        
    
        $model          = M('points_detail');
        $memberRows     = $model->field('sh_points_detail.*,sh_user.nickname,sh_user.phone,sh_user.bank,sh_user.user_name,sh_user.bank_num')
                                ->where($where)
                                ->join('LEFT JOIN __USER__ on __USER__.id = __POINTS_DETAIL__.user_id')->order('sh_points_detail.create_time desc')
                                ->page($p, $pageSize)->select();
        
        $memberCount    = $model->where($where)->count();
		$memberSum   = $model->field('sh_points_detail.*,sh_user.nickname,sh_user.phone,sh_user.bank,sh_user.user_name,sh_user.bank_num')
                                ->where($where)
                                ->join('LEFT JOIN __USER__ on __USER__.id = __POINTS_DETAIL__.user_id')
								->sum('sh_points_detail.change');
								
		$where2['type'] = 40;   
		$where2['sh_points_detail.create_time'] = array(array('EGT', $startime2), array('ELT', $endtime2));
		$memberSum2   = $model->where($where2)->sum('sh_points_detail.change');
		
		$Page       = new \Think\Page($memberCount, $pageSize);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('header','<span style="line-height:30px;">共 %TOTAL_ROW% 条记录</span>');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('access', 'z');
        $this->assign('output', $memberRows);
		$this->assign('memberSum', $memberSum);
		$this->assign('memberSum2', $memberSum2);
        $this->assign('where', $where);
        $this->display('admin_points_get');


  }

public function set_type()
  {


    $id = I('get.id');

    $model = M('points_detail');
    $result = $model->where(array('id'=>$id))->save(array('is_get'=>1));



    if($result)
    {

        $this->success('处理成功！','/Admin/points/getOrder');
        exit();
    }

    $this->error('处理失败', '/Admin/points/getOrder');
    exit();

  }

  
    
}