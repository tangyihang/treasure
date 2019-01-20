<?php
namespace Home\Controller;
use Think\Controller;
Vendor('Qiniu.autoload');  //七牛入口文件引入
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;


class OrderController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	/**
	 * 某人订单记录
	 */
	public function orderList()
	{
		$btid=3;
		$this->assign('btid', $btid);
		$phone 		= I('request.phone');
		$page   	= I('request.page');
		
		if(empty($page))
		{
			$page = 1;
		}
		
		$modelOrder = D('order');
		
		$userId = getUserIdByPhone($phone);
		
		$rowOrder = $modelOrder->getByUser($userId, $page, 6);

		$modelMember = M('user');
		$this->assign('phone', $phone);
		//foreach
		foreach ($rowOrder as $k=>$v)
		{
			$rowOrder[$k]['user'] = $modelMember->where(array('id'=>$v['user_id']))->find();
			$rowOrder[$k]['timeOpen'] = date('Y-m-d', strtotime($v['time_day'])) . ' ' .$v['time_hour'] . ':' .$v['time_minute'];
		}
				
		//get
		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rowOrder;
			
			//今日总
			$startime		= date('Y-m-d').' 00:00:00';
			$endtime		= date('Y-m-d').' 23:59:59';
			
			$where2 = array();
			$where2['pay_time'] 	= array(array('EGT', $startime), array('ELT', $endtime));
			$where2['pay_status'] 	= 1;
			$where2['user_id'] 		= $userId;

			$rowSum = $modelOrder->where($where2)->select();

			$output['todaySum'] = 0;

			foreach ($rowSum as $v) {
				$output['todaySum'] += $v['goods_num'];
			}

			
			
			$where2['result']	= 1; //输

			$rowSum = $modelOrder->where($where2)->select();

			$output['todayLose'] = 0;

			foreach ($rowSum as $v) {
				$output['todayLose'] += $v['goods_num'];
			}
			
			$where2['result']	= 2; //赢

			$rowSum = $modelOrder->where($where2)->select();

			$output['todayWin'] = 0;

			foreach ($rowSum as $v) {
				$output['todayWin'] += $v['goods_num'];
			}

			
			// $where3 = array();
			// $where3['_string'] = 'pay_time >=  NOW() - interval 7 day';
			// $where3['pay_status'] = 1;
			// $where3['openid'] = $openid;
			
			// $output['weekSum'] = $modelOrder->where($where3)->count();
				
			// $where3['result']	= 1; //输
			// $output['weekLose'] = $modelOrder->where($where3)->count();
				
			// $where3['result']	= 2; //赢
			// $output['weekWin'] = $modelOrder->where($where3)->count();
			
		
			
			// $where4 = array();
			// $where4['_string'] 		= 'pay_time >=  NOW() - interval 30 day';
			// $where4['pay_status'] 	= 1;
			// $where4['openid'] 		= $openid;
			
			// $output['monthSum'] = $modelOrder->where($where4)->count();
			
			// $where4['result']	= 1; //输
			// $output['monthLose'] = $modelOrder->where($where4)->count();
			
			// $where4['result']	= 2; //赢
			// $output['monthWin'] = $modelOrder->where($where4)->count();

			$output['title'] = '全民抢购商城';
			$this->assign('output', $output);
			$this->display('home_order_orderList');
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
	
	/**
	 * 提交订单
	 */
    public function submit()
    {
    	$goods_id 		= I('post.goods_id');
    	$goods_num		= I('post.goods_num');
    	$snatch_type	= I('post.snatch_type');
    	$pay_type		= I('post.pay_type');
    	/**
    	 * 参数不能为空
    	 */
    	if(empty($goods_id) || empty($goods_num) || empty($snatch_type))
    	{
    		$response = array('code'=>1,'info'=>'参数不能为空！');
    		echo json_encode($response);
    		exit;
    	}
    	
    	$modelGoods = D('goods');
    	$modelCata 	= D('catagory');
    	$modelOrder = M('order');
    	$modelAward = D('award');
    	
    	//获取商品
    	$rowGoods 	= $modelGoods->getById($goods_id);
    	
    	//获取分类
    	$rowCata	= $modelCata->getById($rowGoods['cata_id']);
    	
    	if($snatch_type == 1)
    	{
    		$number_through = $rowCata['small'];
    	}
    	
    	if($snatch_type == 2)
    	{
    		$number_through = $rowCata['big'];
    	}
    	
    	$next = getNowDate();
    	
    	$data = array();
    	$data['goods_id']		= $goods_id;
    	$data['goods_name']		= $rowGoods['name'];
    	$data['goods_img']		= $rowGoods['img_url'];
    	$data['catagory_id']	= $rowCata['id'];
    	$data['goods_num']		= $goods_num;
    	$data['goods_price']	= $rowCata['price'];
    	$data['goods_price_sum']= $rowCata['price'] * $goods_num;
    	$data['snatch_type']	= $snatch_type;
    	$data['pay_type']		= $pay_type;
    	$data['create_time']	= date('Y-m-d H:i:s');
    	$data['time_day']		= $next['nextDay'];
    	$data['time_hour']		= $next['nextHour'];
    	$data['time_minute']	= $next['nextMinute'];
    	$data['number_through']	= $number_through;
    	$data['user_id']		= $this->uid['id'];
    	
    
    	
    	$str = uniqid().$this->uid['id'].rand(1000,9999);
    	$data['award_code']		= strtoupper(substr(md5($str),8,16));
    	
    	//下一期
    	$data['phase']			= $modelAward->getByHourAndMinute($next['nextHour'], $next['nextMinute']);
    	
    	$result = $modelOrder->add($data);
    	
    	
    	
    	//写入错误
    	if(empty($result))
    	{
    		$response = array('code'=>2,'info'=>'订单提交错误！');
    		echo json_encode($response);
    		exit;
    	}
    	
    	$order_id = $modelOrder->getLastInsID();
    	
    	
    	if($pay_type == 1)
    	{
    		$fee = $data['goods_price_sum']*100;
    		//微信支付
    		$this->_swiftpass($order_id, $rowGoods['name'], $fee);
    	}
    	
    	if($pay_type == 2){
    		
    		$this->_alipay($order_id,  $rowGoods['name'], $data['goods_price_sum']);
    		
    	}
    	
    	if($pay_type == 3)
    	{
    		//积分支付
    		$modelUser 	= M('user');
    		$rowUser	= $modelUser->where(array('id'=>$this->uid['id']))->find();
    		    		
    		if($data['goods_price_sum'] > $rowUser['points'])	
    		{
    			$response = array();
    			$response['code']		= 1;
    			$response['info']		= "积分不足";
    			echo json_encode($response);
    			exit;
    		}
    		
    		//开始扣费
    		$modelUser->startTrans();
    		$result1 = $modelUser->where(array('id'=>$this->uid['id']))->setDec('points', $data['goods_price_sum']);
    		
    		$result2 = $modelOrder->where(array('id'=>$order_id))->save(array('pay_time'=>date('Y-m-d H:i:s'), 'pay_status'=>1));
    		
    		$modelDetail = M('points_detail');
    		$dataDetail = array(
    			'before'	=> $rowUser['points'],
    			'change'	=> $data['goods_price_sum'],
    			'after'		=> $rowUser['points']-$data['goods_price_sum'],
    			'user_id'	=> $rowUser['id'],
    			'create_time' => date('Y-m-d H:i:s')
    				
    		);	
    		$result3 = $modelDetail->add($dataDetail);
    		
    		if($result1 && $result2 && $result3)
    		{
    			$modelUser->commit();
    			$response = array();
    			$response['code']		= 31;
    			$response['info']		= "购买成功";
    			echo json_encode($response);
    			exit;
    			
    			
    		}else{
    			$modelUser->rollback();
    			$response = array();
    			$response['code']		= 1;
    			$response['info']		= "下单失败";
    			echo json_encode($response);
    			exit;
    			
    		}
    		
    		
    	}
    	
    	

    }
    
    private function _alipay($order_id, $body, $fee)
    {
    	Vendor('phpqrcode.phpqrcode');
    	
    	$id 	= $order_id;
    	$url 	= SERVER_URL.'Alipay/pay.php?id='.$id;
    	
    	$name = getcwd().'/Public/Images/Qr/'.$id.'.png';
    	
    	
    	$object = new \QRcode();
    	$object->png($url, $name, 3, 4, 2);
    	
    	$config = C('UPLOAD_SITEIMG_QINIU');
    	
    	$ak 	= $config['driverConfig']['accessKey'];
    	$sk 	= $config['driverConfig']['secrectKey'];
    	$bucket = $config['driverConfig']['bucket'];
    	//upload
    	$auth = new Auth($ak, $sk);
    	// 要上传的空间
    	// 生成上传 Token
    	$token = $auth->uploadToken($bucket);
    	// 要上传文件的本地路径
    	$filePath = $name;
    	// 上传到七牛后保存的文件名
    	$key = uniqid().'.png';
    	// 初始化 UploadManager 对象并进行文件的上传。
    	$uploadMgr = new UploadManager();
    	
    	// 调用 UploadManager 的 putFile 方法进行文件的上传。
    	$result =  $uploadMgr->putFile($token, $key, $filePath);
    	//upload
    	
    	$response = array();
    	$response['code']		= 21;
    	$response['info']		= 'http://image.wkeid.cn/'.$key;
    	
    	echo json_encode($response);
    	exit;
    }
    
    /**
     * 第三方支付
     */
    private function _swiftpass($order_id,$body,$fee)
    {
    	
    	$url = 'https://pay.swiftpass.cn/pay/gateway';

    	
    	$data = [];
    	
    	$data['service'] 	= 'pay.weixin.native';
    	$data['mch_id']		= 101590081127;
    	$data['out_trade_no']	= $order_id;
    	$data['body']			= $body;
    	$data['total_fee']		= $fee;
    	$data['is_raw']			= 1;
    	$data['mch_create_ip']	= '47.91.201.12';
    	$data['notify_url']		= SERVER_URL.'Notice/SpNotice';
    	$data['nonce_str']		= randStr(20);
    	
    	
    	ksort($data);
    	
    	//生成sign
    	$str 	= urldecode(http_build_query($data)).'&key='.'fadbb3f06dcf5207ecfce7b812d8f32f';
    	$sign 	= strtoupper(md5($str));
    	
    	$data['sign'] = $sign;
    	
    	$xml = arrayToXml($data);
    	
    	$re = curl($url, $xml);
    	
    	libxml_disable_entity_loader(true);
    	$postObj 	= simplexml_load_string($re, 'SimpleXMLElement', LIBXML_NOCDATA);
    	    
    	
    	//下单成功
    	if($postObj->result_code == 0 && $postObj->status== 0)
    	{
    		
    		
    		$response['code']		= 11;
    		$response['info']		= "$postObj->code_img_url";
    		
    	}else{
    		
    		$response = array();
    		$response['code']		= 1;
    		$response['info']		= "$postObj->message";
    	}
    	
    	echo json_encode($response);
    	exit;
    	
    }
    
    
    //统一下单接口
    private function _unifiedorder($order_id,$body,$fee)
    {
    
    	$url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
    
    	$post = array();
    
    	$post['appid']		= APPID;
    	$post['mch_id']		= PAY_COUNT;
    	$post['nonce_str']	= randStr(30);
    	$post['body']		= '积分商城兑换商品'; //商品描述
    	$post['out_trade_no']	= $order_id;
    	$post['total_fee']		= $fee;
    	$post['spbill_create_ip']	= realIp();
    	$post['notify_url']			= SERVER_URL.'Notice/WxNotice';
    	$post['trade_type']			= 'JSAPI';
    	$post['openid']				= $this->uid['openid'];
    
    	//排序
    	ksort($post);
    	//生成sign
    	$str 	= urldecode(http_build_query($post)).'&key='.PAY_KEY;
    	$sign 	= strtoupper(md5($str));
    
    	$post['sign'] = $sign;
    
    	$xml 		= $this->arrayToXml($post);
    	$postStr 	= curl($url, $xml);
    
    	libxml_disable_entity_loader(true);
    	$postObj 	= simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    
    	//下单成功
    	if($postObj->return_code == 'SUCCESS' && $postObj->return_msg == 'OK')
    	{
    		//获取prepay_id
    		$prepay_id = $postObj->prepay_id;
    		$response = array();
    			
    		$response['appId'] 		= APPID;
    		$response['timeStamp']	= "time()";
    		$response['nonceStr']	= randStr(30);
    		$response['package']	= "prepay_id=".$postObj->prepay_id;
    		$response['signType']	= 'MD5';
    			
    		//排序
    		ksort($response);
    		//生成sign
    		$str 	= urldecode(http_build_query($response)).'&key='.PAY_KEY;
    		$sign 	= strtoupper(md5($str));
    
    		$response['paySign']	= $sign;
    			
    		$response['code']		= 11;
    			
    	}else{
    			
    		$response = array();
    		$response['code']		= 1;
    		$response['info']		= "$postObj->return_msg";
    	}
    
    	echo json_encode($response);
    	exit;
    
    }
    
    
    function arrayToXml($arr){
    	$xml = "<xml>";
    	foreach ($arr as $key=>$val){
    		if(is_array($val)){
    			$xml.="<".$key.">".arrayToXml($val)."</".$key.">";
    		}else{
    			$xml.="<".$key.">".$val."</".$key.">";
    		}
    	}
    	$xml.="</xml>";
    	return $xml;
    }
    
  
    
 
}