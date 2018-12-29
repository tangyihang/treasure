<?php
namespace Home\Controller;
use Think\Controller;
class WxNoticeController extends Controller {
		
	
	public function index(){
	
		// 验证token 开启
	
// 				 $echoStr = $_GET["echostr"];
// 				 //valid signature , option
// 				 if($this->checkSignature()){
// 				 echo $echoStr;
// 				 exit;
// 				 }
		$postStr = file_get_contents("php://input");
	
	
	
		if (!empty($postStr)){
				
			$this->elog($postStr, 'php://input接受数据', 'NOTICE');
				
			libxml_disable_entity_loader(true);
			$postObj 		= simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$fromUsername 	= trim($postObj->FromUserName);
			$toUsername 	= trim($postObj->ToUserName);
			$keyword 		= trim($postObj->Content);
			$time 			= time();
				
				
			$msgType = $postObj->MsgType;
			$event	 = $postObj->Event;
			
			
			$key1 	= $postObj->EventKey;
			$key 	= str_replace('qrscene_','',$key1); //获取key
			
			//关注或者扫描
			if($event == 'subscribe' || $event == 'SCAN'){
			
				$modelUser 	= M('user');
				//判断当前用户是否存在
				$rowUser = $modelUser->where(array('openid'=>$fromUsername))->find();
				
				if(!empty($rowUser))
				{
					echo 'success';
					exit;
				}
				//判断是否为关注或者扫码
				
				$rowParent	= $modelUser->where(array('id'=>$key))->find();
				
				$data = array();
				if(!empty($rowParent))
				{
					$data['parent_id'] = $key; //推广人id
				}

				//获取用户信息
				$access_token = getAccessToken();
				$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$fromUsername.'&lang=zh_CN ';
				$re = curl($url);
								
				$arr = json_decode($re, true); //获取用户信息
				
				$data['openid'] 		= $arr['openid'];
				$data['headimgurl']		= $arr['headimgurl'];
				$data['nickname']		= $arr['nickname'];
				$data['create_time']	= date('Y-m-d H:i:s');
				
				$modelUser->add($data);
				
				echo 'success';
				
				
			}
	
	
				
		}else{
			$this->elog('无请求内容','空请求(可能非微信请求)','WARNING');
			echo 'success';
		}
	
	
		
	
	
	}
	
	
	
	
	
	
		private function checkSignature()
		{
	
			$signature = $_GET["signature"];
			$timestamp = $_GET["timestamp"];
			$nonce 	   = $_GET["nonce"];
	
			$token = 'ovLyHz9aBEQltwmqj7hkdhcy7dcgDCH5';
			$tmpArr = array($token, $timestamp, $nonce);
			// use SORT_STRING rule
			sort($tmpArr, SORT_STRING);
			$tmpStr = implode( $tmpArr );
			$tmpStr = sha1( $tmpStr );
			if( $tmpStr == $signature ){
				return true;
			}else{
				return false;
			}
		}
	
		private function elog($con,$title, $level= 'NOTICE'){
	
	
			//日志按天生成
			$path = dirname(getcwd()).'/log/'.'scanlog_'.date('Ymd').'.log';
	
			file_put_contents($path, $level.'【'.date('Y-m-d H:i:s').'】'.PHP_EOL, FILE_APPEND);
			file_put_contents($path, $title.PHP_EOL, FILE_APPEND);
			file_put_contents($path, $con.PHP_EOL.PHP_EOL, FILE_APPEND);
		}
	

  
    
 
}