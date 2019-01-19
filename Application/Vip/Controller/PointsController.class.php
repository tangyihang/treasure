<?php
namespace Vip\Controller;
use Think\Controller;
Vendor('Qiniu.autoload');  //七牛入口文件引入
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
class PointsController extends BaseController {
		
	
	public function _initialize(){
		
		parent::_initialize();	
		
	}
	
	
	public function index()
	{

		$this->display('vip_points_index');	
	}

	public function get()
	{
		$this->display('vip_points_get');	
	}

	public function getlist()
	{

		$page   	= I('request.page');

		if(empty($page))
		{
			$page = 1;
		}

		$modelDetail = M('points_detail');

		$where = array();
		$where['user_id'] 	= $this->uid['id'];
		$where['type']		= 40;

		$rows = $modelDetail->where($where)->page($page, 1000)->order('id desc')->select();

		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rows;

			$this->assign('output', $output);
			$this->display('vip_points_getlist');
		}



	}
	public function getlist1()
	{

		$page   	= I('request.page');

		if(empty($page))
		{
			$page = 1;
		}

		$modelDetail = M('points_order');

		$where = array();
		$where['user_id'] 	= $this->uid['id'];

		$rows = $modelDetail->where($where)->page($page, 1000)->order('id desc')->select();

		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rows;

			$this->assign('output', $output);
			$this->display('vip_points_getlist1');
		}
	}
	
	public function getchonglist()
	{
		
		$page   	= I('request.page');
		
		if(empty($page))
		{
			$page = 1;
		}
		
		$modelDetail = M('points_detail');
		
		$where = array();
		$where['user_id'] 	= $this->uid['id'];
		$where['type']		= 30;
		
		$rows = $modelDetail->where($where)->page($page, 1000)->order('id desc')->select();
		
		if(IS_GET)
		{
			$output = [];
			$output['rowOrder'] = $rows;
			
			$this->assign('output', $output);
			$this->display('vip_points_getchonglist');
		}
		
		
		
	}

	public function submitget()
	{
		$money 		= I('post.money');
        $response = array();
		if($money < 20)
		{
			$response['code'] = 1;
			$response['info'] = '提现金额不能小于20元';

			echo json_encode($response);
			exit;
		}

		$modelUser = M('user');

		$rowUser = $modelUser->where(array('id'=>$this->uid['id']))->find();
		if($rowUser['points'] < $money)
		{
			$response['code'] = 1;
			$response['info'] = '提现金额不能大于积分余额';
			echo json_encode($response);
			exit;
		}
		if ($rowUser['withdraw_num'] <= 0) {
            $response['code'] = 1;
            $response['info'] = '今日剩余提现次数为0，请明日再提交提现申请';
            echo json_encode($response);
            exit;
        }
		if(empty($rowUser['bank_num']))
		{
			$response['code'] = 1;
			$response['info'] = '请绑定提现银行卡号';
			echo json_encode($response);
			exit;
		}
		$modelUser->startTrans();

		//更新
		$result2 = $modelUser->where(array('id'=>$rowUser['id']))->setDec('points', $money);
        $result4 = $modelUser->where(array('id'=>$rowUser['id']))->setDec('withdraw_num', 1);

		$dataUpdate = [];
		$dataUpdate['before'] 	= $rowUser['points'];
		$dataUpdate['change']	= $money;
		$dataUpdate['after']	= $rowUser['points'] - $money;
		$dataUpdate['user_id']	= $rowUser['id'];
		$dataUpdate['type']		= 40;
		$dataUpdate['create_time'] = date('Y-m-d H:i:s');

		$modelDetail = M('points_detail');
		$result3 = $modelDetail->add($dataUpdate);


		if($result2 && $result3 && $result4)
		{
			$modelUser->commit();

			$response['code'] = 1;
			$response['info'] = '提现成功，等待客服审核';

			echo json_encode($response);
			exit;

		}else{

			echo 'FAIL';
			$modelUser->rollback();
			
			exit;
		}




	}

	public function submit()
	{
		$money 		= I('post.money');
		$type		= I('post.type');

		if($money < 1)
		{
			$response = array();
			$response['code'] = 1;
			$response['info'] = '充值金额不能小于1元';

			echo json_encode($response);
			exit;
		} else if ($money > 900) {
            $response = array();
            $response['code'] = 1;
            $response['info'] = '单笔充值金额不能超过900元';

            echo json_encode($response);
            exit;
        }

		$data = array();


		$data['order_id']	= date('ymdHis').mt_rand(10000,99999);
		$data['user_id']	= $this->uid['id'];
		$data['created']	= date('Y-m-d H:i:s');
		$data['money']		= $money;
		$data['pay_type']	= $type; 

		$model 	= M('points_order');
		$result = $model->add($data);

		if(empty($result))
		{
			$response = array();
			$response['code'] = 2;
			$response['info'] = '订单写入错误！';

			echo json_encode($response);
			exit;
		}

		
		if($type == 0){
			
			//$this->_swiftpass($data['order_id'], '积分充值', $money*100);
			$this->_swiftpass($data['order_id'], '积分充值', 1);
			
		}else{
			
			$this->_alipay($data['order_id'], '积分充值', 1);
		}
		
		


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
    	$data['notify_url']		= SERVER_URL.'Notice/WxPointNotice';
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
    
    //支付宝
    private function _alipay($order_id, $body, $fee)
    {
    	Vendor('phpqrcode.phpqrcode');
    	
    	$id 	= $order_id;
    	$url 	= SERVER_URL.'Alipay/payPoints.php?id='.$id;
    	
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
    	$response['code']		= 11;
    	$response['info']		= 'http://pk9qxycsb.bkt.clouddn.com/'.$key;
    	
    	echo json_encode($response);
    	exit;
    }
   
    
 
}