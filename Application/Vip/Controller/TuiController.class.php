<?php
namespace Vip\Controller;
use Think\Controller;
class TuiController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	/**
	 * 个人中心 普通代理
	 */
	public function index()
	{
		//累计获胜
		$id  = $this->uid['id'];
		
		$phone 	= I('request.phone');
		
		$this->assign('phone', $phone);
		//根据openid获取 id
		$modelUser 		= D('User');
		$row 			= $modelUser->getByPhone($phone);
		
		//判断是否为推广关系
		$result = isTui($row['id'], $id);		
		$page   	= I('request.page');
		
		if(empty($page))
		{
			$page = 1;
		}
		
		if($result == false && $id != $row['id'])
		{
			$response = array();
			$response['code'] = 1;
			$response['info'] = '权限不足';
			
			//echo json_encode($response);
			//exit;
		}
		
		//获取所有用户
		$rows = $modelUser->getByParentId($row['id'], $page, 20);


		$modelOrder = D('Order');
		//获取用户统计
		foreach ($rows as $k=>$v)
		{
			$rows[$k]['today'] 	= 	$modelOrder->today($v['id']);
			$rows[$k]['month']	 = 	$modelOrder->month($v['id']);
			$rows[$k]['all'] 	= 	$modelOrder->all($v['id']);
		}
		
		//get
		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rows;
				
			$this->assign('output', $output);
			$this->display('vip_tui_index');
		}
		
		//post
		if(IS_POST)
		{
			if(empty($rows))
			{
				$response = [];
				$response['code'] = 1;
		
			}else{
		
				$response = [];
				$response['code'] = 11;
				$response['data'] = $rows;
		
			}
		
			echo json_encode($response);
		}
		
		
		
		//$this->display('vip_tui_index');
	}
	
    
	
	//高级代理
	public function tui_advance()
	{
		
		$phone 		= I('request.phone');
		$page   	= I('request.page');
		$pageSize 	= 10;
		
		if(empty($page))
		{
			$page = 1;
		}
		
		
		$pageStart = ($page-1)*$pageSize;
		
		if(empty($phone)){
			$this->error('手机号错误');
			exit;
		}
		
		//判断用户是否为高级代理
		$modelUser = M('user');
		
		$rowUser = $modelUser->where(array('phone'=>$phone))->find();
		
		if($rowUser['tui_type'] == 0)
		{
			$this->error('非高级会员');
			exit;
		}
		
		$userId = getUserIdByPhone($phone);
		//判断是否为高级用户
		$model = M('order');
		
		//收益记录首页
		$sql = "call showUserSonOrderByTime($userId,$pageStart, $pageSize)";
		$resultList = $model->query($sql);
		
		foreach($resultList as $k=>$v)
		{
			$resultList[$k]['time_day'] = date('Y-m-d',strtotime($v['time_day']));
		}
		
		//get
		if(IS_GET)
		{
			if(empty($userId))
			{
				$this->error('用户不存在');
				exit;
			}
			
			$output = [];
			
			//总订单金额
			$sqlSum	 	= "call showUserSonOrderSum($userId)";
			$resultSum 	= $model->query($sqlSum);
			
			//今日订单总额
			$day = date('Ymd');
			$sqlToday = "call showUserSonOrderSumToday($userId, $day)";
			$resultSumToday 	= $model->query($sqlToday);
			
			
			
			$output['sum'] 			= $resultSum;
			$output['sumDay'] 		= $resultSumToday;
			$output['resultList'] 	= $resultList;

			$modelSet 		= M('set');
			$output['set'] 	= $modelSet->find();
			$this->assign('phone', $phone);
			$this->assign('output', $output);
			$this->display('vip_tui_advance');
		}
		
		
		//post
		if(IS_POST)
		{
			if(empty($resultList))
			{
				$response = [];
				$response['code'] = 1;
		
			}else{
		
				$response = [];
				$response['code'] = 11;
				$response['data'] = $resultList;
		
			}
		
			echo json_encode($response);
		}
		
		
		
		
	}
	
	
	/**
	 * 所有用户信息
	 * 
	 */
	public function user()
	{
		$phone 		= I('request.phone');
		$page   	= I('request.page');
		$pageSize 	= 10;
		
		if(empty($page))
		{
			$page = 1;
		}
		
		$pageStart = ($page-1)*$pageSize;
		
		if(empty($phone)){
			$this->error('手机号错误');
			exit;
		}
		
		$userId = getUserIdByPhone($phone);
		//判断是否为高级用户
		$model = M('order');
		
		//收益记录首页
		$sql = "call showUserSon($userId,$pageStart, $pageSize)";
		$resultList = $model->query($sql);
		
		//get
		if(IS_GET)
		{
			if(empty($userId))
			{
				$this->error('用户不存在');
				exit;
			}
				
			$output = [];

			$output['resultList'] 	= $resultList;
					
			$modelSet 		= M('set');
			$output['set'] 	= $modelSet->find();
			$this->assign('phone', $phone);
			$this->assign('output', $output);
			$this->display('vip_tui_user');
		}
		
		
		//post
		if(IS_POST)
		{
			if(empty($resultList))
			{
				$response = [];
				$response['code'] = 1;
		
			}else{
		
				$response = [];
				$response['code'] = 11;
				$response['data'] = $resultList;
		
			}
		
			echo json_encode($response);
		}
		
	}
	
	/**
	 * 每日订单详情
	 * showUserSonOrderByOneDay
	 */
	public function order_day()
	{
		
		$phone 		= I('request.phone');
		$page   	= I('request.page');
		$time_day   = I('request.time_day');
		$this->assign('time_day', $time_day);
		$time_day 	= date('Ymd', strtotime($time_day));
		$pageSize 	= 10;
		
		if(empty($page))
		{
			$page = 1;
		}
		
		$pageStart = ($page-1)*$pageSize;
		
		if(empty($phone)){
			$this->error('手机号错误');
			exit;
		}
		
		$userId = getUserIdByPhone($phone);
		//判断是否为高级用户
		$model = M('order');
		
		//收益记录首页
		$sql = "call showUserSonOrderByOneDay($userId,$time_day, $pageStart, $pageSize)";
		$resultList = $model->query($sql);
				
		
		//get
		if(IS_GET)
		{
			if(empty($userId))
			{
				$this->error('用户不存在');
				exit;
			}
				
			$output = [];
		
			$output['resultList'] 	= $resultList;
				
			$modelSet 		= M('set');
			$output['set'] 	= $modelSet->find();
			$this->assign('phone', $phone);
			$this->assign('output', $output);
			$this->display('vip_tui_order_day');
		}
		
		
		//post
		if(IS_POST)
		{
			if(empty($resultList))
			{
				$response = [];
				$response['code'] = 1;
		
			}else{
		
				$response = [];
				$response['code'] = 11;
				$response['data'] = $resultList;
		
			}
		
			echo json_encode($response);
		}
		
	}
    
	
	/**
	 * 总订单详情
	 * showUserSonOrderByOneDay
	 */
	public function order_detail()
	{
	
		$phone 		= I('request.phone');
		$page   	= I('request.page');
		$time_day   = I('request.time_day');
		$this->assign('time_day', $time_day);
		$time_day 	= date('Ymd', strtotime($time_day));
		$pageSize 	= 10;
	
		if(empty($page))
		{
			$page = 1;
		}
	
		$pageStart = ($page-1)*$pageSize;
	
		if(empty($phone)){
			$this->error('手机号错误');
			exit;
		}
	
		$userId = getUserIdByPhone($phone);
		//判断是否为高级用户
		$model = M('order');
	
		//收益记录首页
		$sql = "call showUserSonOrderByOneDayList($userId,$time_day, $pageStart, $pageSize)";
		$resultList = $model->query($sql);
		
		foreach ($resultList as $k=>$v)
		{
			$resultList[$k]['pay_time'] = date('H:i:s', strtotime($v['pay_time']));
			if($v['catagory_id'] == 1)
			{
				$resultList[$k]['cata'] = 100;
			}
			if($v['catagory_id'] == 2)
			{
				$resultList[$k]['cata'] = 50;
			}
			if($v['catagory_id'] == 3)
			{
				$resultList[$k]['cata'] = 20;
			}
		}
	
		//get
		if(IS_GET)
		{
			if(empty($userId))
			{
				$this->error('用户不存在');
				exit;
			}
	
			$output = [];
	
			$output['resultList'] 	= $resultList;
	
			$modelSet 		= M('set');
			$output['set'] 	= $modelSet->find();
			$this->assign('phone', $phone);
			$this->assign('output', $output);
			$this->display('vip_tui_order_detail');
		}
	
	
		//post
		if(IS_POST)
		{
			if(empty($resultList))
			{
				$response = [];
				$response['code'] = 1;
	
			}else{
	
				$response = [];
				$response['code'] = 11;
				$response['data'] = $resultList;
	
			}
	
			echo json_encode($response);
		}
	
	}
    /**
     * 个人中心
     */
    public function invite()
    {

        //累计获胜
        $id  = $this->uid['id'];
        $modelUser = M('user');
        $rowMember = $modelUser->where(array('id'=>$id))->find();

        $output['member'] 	= $rowMember;
        $this->assign('output', $output);
        $this->display('vip_tui_invite');
    }
	public function shareqr(){
		$id  = $this->uid['id'];
		$modelUser = M('user');
        $rowMember = $modelUser->where(array('id'=>$id))->find();
        $url="http://www.882345678.com/user/register/invite/".$rowMember['invite'];
        $level=3;  
        $size=4;  
        Vendor('phpqrcode.phpqrcode');  
        $errorCorrectionLevel =intval($level) ;//容错级别  
        $matrixPointSize = intval($size);//生成图片大小  
        //生成二维码图片  
        $object = new \QRcode();  
        $qr = $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2); 
		$imageString = base64_encode(ob_get_contents());
		ob_end_clean();
		$this->assign('qrcode',$imageString);
		$this->display('vip_tui_share_qr');
		
	}
   
    
 
}