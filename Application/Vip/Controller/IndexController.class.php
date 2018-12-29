<?php
namespace Vip\Controller;
use Think\Controller;
class IndexController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	/**
	 * 个人中心
	 */
	public function index()
	{
        $output['title'] 	= '全民抢购商城';
		//累计获胜
		$id  = $this->uid['id'];
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
		
		$model = M('order');
		$count = $model->where(array('user_id'=>$id, 'result'=>2))->sum('goods_num');
		
		//获取总数
		$output['count'] 	= empty($count)?0:$count;
		$output['member'] 	= $rowMember;
		
		
		//获取积分
		$modelMember = M('user');
		$rowMember 	 = $modelMember->where(array('id'=>$id))->find();
		$output['tui_type'] = $rowMember['tui_type'];		
		$output['points'] 	= $rowMember['points'];
		
		
		//获取今日状况
		$startime		= date('Y-m-d').' 00:00:00';
		$endtime		= date('Y-m-d').' 23:59:59';
		
		$where2 = array();
		$where2['pay_time'] 	= array(array('EGT', $startime), array('ELT', $endtime));
		$where2['pay_status'] 	= 1;
		$where2['user_id'] 		= $id;
		$rowSum = $model->where($where2)->select();
		$output['todaySum'] = 0;
		foreach ($rowSum as $v) {
			$output['todaySum'] += $v['goods_num'];
		}
		$where2['result']	= 1; //输

		$rowSum = $model->where($where2)->select();

		$output['todayLose'] = 0;

		foreach ($rowSum as $v) {
			$output['todayLose'] += $v['goods_num'];
		}
		
		$where2['result']	= 2; //赢

		$rowSum = $model->where($where2)->select();

		$output['todayWin'] = 0;

		foreach ($rowSum as $v) {
			$output['todayWin'] += $v['goods_num'];
		}
		
		
		$this->assign('output', $output);
		$this->display('vip_index_index');
	}
	public function logout(){

		session('member',null);
		redirect('/User/login');
	}
    
    
   
    
 
}