<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
		
	public function login()
	{
		
		/**
		 * Get
		 * 
		 */

		if(IS_GET)
		{
			$output['title'] 	= '全民抢购商城';
			$this->assign('output', $output);
			$this->display('home_user_login');
		}
		
		/**
		 * Post
		 * 
		 */
		if(IS_POST)
		{
			
			$phone 		= I('post.member_phone');
			$password 	= I('post.password');
			
			if(empty($phone) || empty($password))
			{
				$this->ajaxReturn(array('code'=>1, 'info'=>'手机号或密码不能为空！' ));
				exit;
			}
			
			$Member = M('user');
			$row	= $Member->where(array('phone'=>$phone))->find();
			
			if(empty($row))
			{
				$this->ajaxReturn(array('code'=>1, 'info'=>'用户名或密码错误！' ));
				exit;
			}
			
			//
			if($row['password'] != $password)
			{
				$this->ajaxReturn(array('code'=>1, 'info'=>'用户名或密码错误！' ));
				exit;
			}

			if (in_array($phone, array('18287709916', '15808772905'))) {
                $this->ajaxReturn(array('code'=>1, 'info'=>'系统升级，春节后上线。' ));
                exit;
            }
			
			session('member', $row);
			
			
			$this->ajaxReturn(array('code'=>11, 'info'=>'登录成功！' ));
		}
		
		
		
		
	}
	
	/*
	 * register
	 */
	public function register(){
		
		
		
		if(IS_GET){
			$output['title'] 	= '全民抢购商城';
			$output['invite'] = $_GET['invite']?$_GET['invite']:'';
			
			$this->assign('output', $output);
			$this->display('home_user_register');
		}
		
		if(IS_POST){



			$code = I('post.member_code');
						
			$where['phone'] = I('post.member_phone');

            $VailData = new \Darling\VailData\VailData();
            if (!$VailData->is_phone($where['phone'])) {
                $data['code'] = 1;
                $data['info'] = '手机号有误！';
                $this->ajaxReturn($data);
            }
			//获取手机号 和 对应的验证码信息
//			$Message 	= M('message');
//			$rowMessage = $Message->where($where)->find();
//
//			//如果手机验证错误次数超过10锁定
//			if ($rowMessage['time_error'] >= 10) {
//				$this->ajaxReturn(array('code'=>1, 'info'=>'手机号已锁定,请联系官方客服！' ));
//			}
//			//如果为空错误
//			if ($rowMessage['code'] != $code) {
//				//验证码输入错误，更新手机错误次数
//				$Message->where('phone=' . $where['phone'])->setInc('time_error');
//				$this->ajaxReturn(array('code'=>2, 'info'=>'短信验证码错误,请重试！' ));
//			}
//
//			//判断验证码是否已经使用
//			if ($rowMessage['is_used'] == 1) {
//				$this->ajaxReturn(array('code'=>3, 'info'=>'短信验已使用，请重新获取！' ));
//			}
//
//			//判断验证码是否过期
//			if (time() - $rowMessage['time'] >= 300) {
//				$this->ajaxReturn(array('code'=>3, 'info'=>'验证码已过期，请重新获取！' ));
//			}
			
			
			$Member = M('user');
			
			$rowMemberFind = $Member->where($where)->find();
			
			if(!empty($rowMemberFind)){
				$this->ajaxReturn(array('code'=>3, 'info'=>'手机号已注册！' ));
			}
			
			$tui_phone 	= I('post.tui_phone');
			
			$parent = $Member->where(array('invite'=>$tui_phone))->find();
			
			// 实例化
			$data = array();
			
			if(empty($parent))
			{
				$this->ajaxReturn(array('code'=>3, 'info'=>'推荐人不存在！' ));
			}
            // 8位随机字符串
            while(true){
                $invite = make_coupon_card();
                $inv = $Member->where(array('invite'=>$invite))->find();
                if(empty($inv))
                    break;
            }



            $data['parent_id'] 		= $parent['id'];
			$data['phone']			= I('post.member_phone');
			$data['create_time']	= date('Y-m-d H:i:s');
			$data['password']		= I('post.password');
			$data['invite'] = $invite;
			$result = $Member->add($data);
			
			
			if ($result) {		
				//注册成功，更新验证码状态为已使用
//				$dataM['id'] 		= $rowMessage['id'];
//				$dataM['is_used'] 	= 1;
//				$Message->save($dataM);
				
				$this->ajaxReturn(array('code'=>11, 'info'=>'认证成功！' ));
				
			} else {
				$this->ajaxReturn(array('code'=>5, 'info'=>'认证失败！' ));
			}
			
		}
		
		
	}
	
	
	public function code()
	{
	
		$piccode = I('post.piccode');
		//判断验证码是否正确
		$verify = new \Think\Verify();
		$result = $verify->check($piccode);
	
		if (!$result) {
// 			$data['code'] = 6;
// 			$data['info'] = '图形验证码错误！';
// 			$this->ajaxReturn($data);
		}
	
		$phone = I('post.phone');
	
		$VailData = new \Darling\VailData\VailData();
	
		if (!$VailData->is_phone($phone)) {
			$data['code'] = 1;
			$data['info'] = '手机号有误！';
			$this->ajaxReturn($data);
		}
	
		//判断是否已经注册过
		$Member = M('user');
		$row = $Member->field('id')->where('phone=' . $phone)->find();
		if (!empty($row)) {
			$data['code'] = 2;
			$data['info'] = '手机号已经注册';
			$this->ajaxReturn($data);
		}
		//判断验证码与上一次发送时间是否超过2分钟
		$Message = M('message');
		$rowMessage = $Message->field('id, time, send_times, is_used')->where('phone=' . $phone)->find();
	
	
		if (time() - $rowMessage['time'] <= 120) {
			$data['code'] = 3;
			$data['info'] = '验证码已发送，请稍后再试！';
			$this->ajaxReturn($data);
		}
	
	
		//判断验证码大于五次 并且 时间在24小时以内
		if ((time() - $rowMessage['time'] <= 86400) && ($rowMessage['send_times'] >= 5)) {
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
		if ((time() - $rowIp['time'] <= 86400) && ($rowIp['send_times'] >= 10)) {
			$data['code'] = 5;
			$data['info'] = '今日发送次数达到上限';
			$this->ajaxReturn($data);
		}
	
		$mcode = rand(100000, 999999);
		$result = sendMessage($phone, array($mcode,5), '243254');

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
	
	
	
	
	public function piccode(){
	
		$Verify = new \Think\Verify();
		$Verify->length = 4;
		$Verify->imageH = 100;
		$Verify->useNoise = false;
		$Verify->entry();
	}
	
    
  
    
 
}