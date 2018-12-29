<?php
namespace Vip\Controller;
use Think\Controller;
class SnatchController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	/**
	 * 夺宝记录
	 * 未兑换
	 */
	public function index()
	{
				
		$id 	= $this->uid['id'];
		
		//判断是否设置查询密码并且登录
		
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
		
		
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
			$sys = 'ios';
			$this->assign('sys', $sys);
		}
		
		if(session('pwd')=='')
		{
			layout(false);
			$this->display('vip_snatch_login');
			exit;
		}
		
		$page   	= I('request.page');
		
		if(empty($page))
		{
			$page = 1;
		}
		
		$modelOrder = D('order');
		
		$rowOrder = $modelOrder->unGet($this->uid['id'], $page, 6);
				
		//get
		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rowOrder;
			
			$rowAll = $modelOrder->where(array('user_id'=>$id,'result'=>2,'is_get'=>0))->select();
			
			$str = '';
			
			foreach ($rowAll as $v)
			{
				$str = $str . $v['award_code'] . '('. $v['goods_num'] .'单),';
			}
			$output['all']  = substr($str, 0, -1);;
			$modelSet 		= M('set');
			$output['set'] 	= $modelSet->find();
			
			$this->assign('output', $output);
			$this->display('vip_snatch_index');
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
	
	public function all()
	{
	
		$id 	= $this->uid['id'];
	
		//判断是否设置查询密码并且登录
	
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
	
		if(session('pwd')=='')
		{
			layout(false);
			$this->display('vip_snatch_login');
			exit;
		}
	
			$modelOrder = M('order');
				
			$rowAll = $modelOrder->where(array('user_id'=>$id,'result'=>2,'is_get'=>0))->select();
			
			
			$str = '';
				
			foreach ($rowAll as $v)
			{
				$str = $str . $v['award_code'] . '('. $v['goods_num'] .'单),';
			}
			$all  = substr($str, 0, -1);
			$this->assign('all', $all);
			$this->display('vip_snatch_all');
	
			
	
	}
	
	public function login()
	{
		$id 	= $this->uid['id'];
		
		//没有设置过密码
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
			
		if(empty($rowMember['phone']))
		{
			redirect('/user/register');
			exit;
		}
		
		if($rowMember['pwd'] == 0)
		{
			
			
			layout(false);
			$this->assign('phone', $rowMember['phone']);
			$this->display('vip_snatch_setPwd');
			exit;
		}
		
		if(IS_GET)
		{
			layout(false);
			$this->display('vip_snatch_login');
			exit;
			
		}
		
		if(IS_POST)
		{
			$pwd 	= I('post.payPassword_rsainput');
			
			if($rowMember['pwd'] == $pwd)
			{
				session('pwd', 60);
				redirect('/Vip/Snatch/index');
			}
			
			$this->error('密码错误！');
			exit;
		}
		
		
	}
	
	public function setPwd(){
		
		$id 	= $this->uid['id'];
		
		$pwd  = I('post.pwd');
		
		if(empty($pwd))
		{
			$data = array();
			$data['info'] = '参数不能为空！';
				
			echo json_encode($data);
			exit;
		}
		
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
		
		
		
		if(empty($pwd))
		{
			$data = array();
			$data['code'] = 1;
			$data['info'] = '密码不能为空';
				
			echo json_encode($data);
			exit;
		}
		
// 		if(!empty($rowMember['pwd']))
// 		{
// 			$data = array();
// 			$data['code'] = 2;
// 			$data['info'] = '已设置过密码';
			
// 			echo json_encode($data);
// 			exit;
// 		}
		
		//update
		$result = $modelUser->where(array('id'=>$id))->save(array('pwd'=>$pwd));
				
		if($result)
		{
			$data = array();
			$data['code'] = 11;
			$data['info'] = '查询密码设置成功';
				
			echo json_encode($data);
			exit;
		}else{
			$data = array();
			$data['code'] = 3;
			$data['info'] = '查询密码设置失败';
			
			echo json_encode($data);
			exit;
			
		}
		
	}
	
	/**
	 * 夺宝记录
	 * 已兑换
	 */
	public function haveGet()
	{
	
		$id 	= $this->uid['id'];
	
		$page   	= I('request.page');
	
		if(empty($page))
		{
			$page = 1;
		}
	
		$modelOrder = D('order');
	
		$rowOrder = $modelOrder->haveGet($this->uid['id'], $page, 6);
	
		//get
		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rowOrder;
	
			$this->assign('output', $output);
			$this->display('vip_snatch_haveGet');
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
	
	//积分兑换
	public function points()
	{
		$code = I('get.code');
		
		//验证code是否存在
		$where = array();
		$where['user_id'] = $this->uid['id'];
		$where['pay_status']	= 1;
		$where['result']		= 2;
		$where['award_code']	= $code;
		
		$modelOrder = M('order');
		
		$row = $modelOrder->where($where)->find();
		
		
		if(empty($row)){
			$this->error('兑奖记录不存在');
			exit;
		}
		
		$cid = $row['catagory_id'];
		$modelCata = M('catagory');
		$rowCata = $modelCata->where(array('id'=>$cid))->find();
		
		if(empty($rowCata)){
			$this->error('分类信息错误');
			exit;
		}
		
		$sumPrice = $rowCata['return_price'] * $row['goods_num']; //应退换金额
		
		if($row['is_get'] == 1)
		{
			$this->error('已兑奖，请不要重复领取');
			exit;
		}
		
		$modelUser = M('user');
		
		$rowUser = $modelUser->where(array('id'=>$this->uid['id']))->find();
		
		//开始扣费
		$modelUser->startTrans();
		$result1 = $modelUser->where(array('id'=>$this->uid['id']))->setInc('points', $sumPrice);
		
		$result2 = $modelOrder->where(array('id'=>$row['id']))->save(array('get_time'=>date('Y-m-d H:i:s'), 'is_get'=>1));
		
		$modelDetail = M('points_detail');
		$dataDetail = array(
				'before'	=> $rowUser['points'],
				'change'	=> $sumPrice,
				'after'		=> $rowUser['points']+$sumPrice,
				'user_id'		=> $rowUser['id'],
				'create_time' => date('Y-m-d H:i:s'),
				'type'		=> 20
		
		);
		$result3 = $modelDetail->add($dataDetail);
		
		if($result1 && $result2 && $result3)
		{
			$modelUser->commit();
			
			$this->error('兑换成功', '/vip/snatch/haveGet');
			exit;
			 
			 
		}else{
			$modelUser->rollback();
			$this->error('兑换失败');
			exit;
			 
		}
		
		
	}
	
    
    /**
     * 找回密码，设置密码
     */
	public function code()
	{
	
		$id 	= $this->uid['id'];
		//没有设置过密码
		$modelUser = M('user');
		$rowMember = $modelUser->where(array('id'=>$id))->find();
		
		$phone = $rowMember['phone'];

		$VailData = new \Darling\VailData\VailData();
	
		if (!$VailData->is_phone($phone)) {
			$data['code'] = 1;
			$data['info'] = '手机号有误！';
			$this->ajaxReturn($data);
		}
	
		//判断手机号是否存在
		$Member = M('user');
		$row = $Member->field('id')->where('phone=' . $phone)->find();
		if (empty($row)) {
			$data['code'] = 2;
			$data['info'] = '手机号不存在';
			$this->ajaxReturn($data);
		}
		
		//判断验证码与上一次发送时间是否超过2分钟
		$Message = M('message');
		$rowMessage = $Message->field('id, time, send_times, is_used')->where('phone=' . $phone)->find();
	
	
		if (time() - $rowMessage['time'] <= 60) {
			$data['code'] = 3;
			$data['info'] = '验证码已发送，请稍后再试！';
			$this->ajaxReturn($data);
		}
	
	
		//判断验证码大于五次 并且 时间在24小时以内
		if ((time() - $rowMessage['time'] <= 86400) && ($rowMessage['send_times'] >= 10)) {
			$data['code'] = 4;
			$data['info'] = '今日发送次数达到上限！';
			$this->ajaxReturn($data);
		}
	
	
		//判断24小时内 同一 ip是否超过10次
		$IP = realIp();
		$MessageIp = M('message_ip');
		$where['ip'] = $IP;
		$rowIp = $MessageIp->where($where)->find();
	
		//判断验证码大于10次 并且 时间在24小时以内
		if ((time() - $rowIp['time'] <= 86400) && ($rowIp['send_times'] >= 15)) {
			$data['code'] = 5;
			$data['info'] = '今日发送次数达到上限';
			$this->ajaxReturn($data);
		}
	
		$mcode = rand(100000, 999999);
		$result = sendMessage($phone, array($mcode,5), '181600');
	
		//虚拟数据
		$result['code'] = 0;
	
	
		if ($result['code'] == 0) {
			$data['code'] = 11;
			$data['info'] = '验证码发送成功，请注意查收！';
	
			//验证码发送成功后，更新message 表 和 message ip表
			if (empty($rowMessage)) {
				//插入
				$dataMessage['phone'] = $phone;
				$dataMessage['code'] = $mcode;
				$dataMessage['time'] = time();
				$dataMessage['send_times'] = 1;
	
				$Message->data($dataMessage)->add();
	
			} else {
				//更新
				$dataMessage['id'] = $rowMessage['id'];
				$dataMessage['time'] = time();
				$dataMessage['code'] = $mcode;
	
				if ($rowMessage['send_times'] >= 5) {
					//超过5次。重置当天次数
					$dataMessage['send_times'] = 1;
				} else {
					$dataMessage['send_times'] = $rowMessage['send_times'] + 1;
				}
	
	
				$Message->save($dataMessage);
	
			}
	
			//验证码发送成功，更新message ip表
			if (empty($rowIp)) {
	
				$dataIp['ip'] = $IP;
				$dataIp['send_times'] = 1;
				$dataIp['time'] = time();
	
				$MessageIp->data($dataIp)->add();
	
	
			} else {
	
				$dataIp['id'] = $rowIp['id'];
				if ($dataIp['time'] >= 10) {
					$dataIp['send_times'] = 1;
				} else {
					$dataIp['send_times'] = $rowIp['send_times'] + 1;
				}
				$dataIp['time'] = time();
	
				$MessageIp->save($dataIp);
			}
	
			$this->ajaxReturn($data);
		} else {
			$data['code'] = 6;
			$data['info'] = $result['reason'];
			$this->ajaxReturn($data);
		}
	
	
	}
	
	
	public function repwd()
	{
		if(IS_GET)
		{
			$phone = substr_replace($this->uid['phone'], '****', 3,4);
			layout(false);
			$this->assign('phone',$phone);
			$this->display('vip_snatch_repwd');
			exit;
				
		}
		
		
	}
   
    
 
}