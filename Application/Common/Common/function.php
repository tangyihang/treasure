<?php

//发送短信  环信
function sendMessage($to, $datas, $tempId) {
	// 主帐号
	$accountSid = '8a48b5515249574b015254f1438216d2';
	// 主帐号Token
	$accountToken = '440835e10dce4c6aa13af40d66fb7057';
	// 应用Id
	$appId = '8a216da862b36cbc0162b8b532b50448';
	// 请求地址，格式如下，不需要写https://
	$serverIP = 'app.cloopen.com';
	// 请求端口
	$serverPort = '8883';
	// REST版本号
	$softVersion = '2013-12-26';
	
	$rest = new \Org\Message\REST ( $serverIP, $serverPort, $softVersion );
	$rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
	
	// 发送模板短信
	$result = $rest->sendTemplateSMS ( $to, $datas, $tempId );
		
	$result = $rest->sendTemplateSMS($to,$datas,$tempId);
		 if ($result == NULL) {
			echo "result error!";
			break;
		}
		if ($result->statusCode != 0) {
			$result['code'] = $result->statusCode;
			$result['reason'] = '发送失败！';
		} else {
			//成功
			$result['code'] = 0;
			$smsmessage = $result->TemplateSMS;
		
		}
		
		
	return $result;
}

/**
 * 获取用户真实ip
 */
function realIp(){
	
	if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif ($_SERVER['HTTP_CLIENT_IP']) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	return $ip;
}

 
 /**
  * 生成唯一不重复id
  * @param $length 生成字符串长度
  */
 function getUid(){
 	
 	$array = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','j','h','l','g','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
 	$str   = '';
 	shuffle($array);
 	
 	for($i=1;$i<=8;$i++){
 		$str = $str . $array[$i];	
 	}
 	
 	
 	return $str;
 	
 }
 
 
 /**
  *  getNowDate
  *  获取当前期
  *  
  *  22点 -24 点 5分钟一场
  *  
  *  0点-2点 5分钟一场
  *  
  *  2点-10点之前 休息
  *  
  *  10点-22点 10分钟一场
  *  
  */
 function getNowDate(){
 	
 	$hour 			= date('H');
 	$minute			= date('i');
	$day			= date('Ymd');
	$nextDay		= $day;
	$returnHour  	= $hour;
 	
 	//$hour = 22;
 	//00:00 ~ 1:59点 5分
 	if($hour >= 0 && $hour < 2)
 	{
 		$formatMinute 	= floor($minute/5)*5;
 		
 		$nextMinute		= ceil(($minute+1)/5)*5;
 		
 		if($nextMinute == 60)
 		{
 			$returnHour++;
 			$nextMinute = '00';
 		}
 		
 	}
 	
 	//2:00 ~ 9:59 停牌
 	if($hour >= 2 && $hour < 10)
 	{
 		$returnHour		= '10';
 		$formatMinute 	= '00';
 		$nextMinute		= '00';
 	}
 	
 	//10:00 ~ 21:59 10分
 	if($hour >=10 && $hour < 22)
 	{
 		//上次开奖时间
 		$formatMinute 	= floor($minute/10)*10;
 		$nextMinute		= ceil(($minute+1)/10)*10;
 		
 		if($nextMinute == 60)
 		{
 			$returnHour++;
 			$nextMinute = '00';
 		}
 		
 	}
 	
 	//22:00 ~ 23:59 5分
 	if($hour >= 22 && $hour < 24)
 	{
 		$formatMinute = floor($minute/5)*5;
 		$nextMinute		= ceil(($minute+1)/5)*5;
 		
 		if($nextMinute == 60)
 		{
 			$returnHour++;
 			
 			//24:00 +1 day
 			if($returnHour == 24)
 			{
 				$nextDay = date('Ymd', strtotime('+1 day'));
 				$returnHour = '00';
 			}
 			$nextMinute = '00';
 		}
 		
 		
 	}

 	if($formatMinute == 0){
 		$formatMinute = '00';
 	}
 	
 	if($formatMinute == 5){
 		$formatMinute = '05';
 	}
 	
 	if($nextMinute == 0){
 		$nextMinute = '00';
 	}
 	
 	if($nextMinute == 5)
 	{
 		$nextMinute = '05';
 	}
 	
 	$response = array();
 	
 	//当前期
 	$response['formatMinute'] = $formatMinute; 
 	$response['hour']		  = $hour;
 	$response['formatTime']	  = $hour . ':' . $formatMinute;
 	$response['day']		  = $day;
 	
 	//下一期
 	$response['nextHour']	  	= $returnHour;
 	$response['nextMinute'] 	= $nextMinute;
 	$response['nextTime']	 	= $returnHour. ':' .$nextMinute;
 	$response['nextDay']		= $nextDay;
 	
 	return  $response;
 	
 }
 
 
 
 /**
  * 获取access_token
  */
 function getAccessToken(){
 
 	$model = M('wx');
 	$row   = $model->find();
 
 	//如果数据库空 或者过期 重新获取
 	if($row['access_token_time'] <= time()){
 
 		$url 			= 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.APPSECRET;
 		$re 			= curl($url);
 		$arr 			= json_decode($re, true);
 
 		$data = array('id'=>1, 'access_token'=>$arr['access_token'], 'access_token_time'=>time()+7000);
 
 		$model->save($data);
 
 		return $arr['access_token'];
 	}else{
 
 		return $row['access_token'];
 	}
 
 
 
 }
 
 /*
  * curl
  */
 function curl($url, $data=''){
 
 	$ch = curl_init ();
 	curl_setopt ( $ch, CURLOPT_URL, $url );
 	curl_setopt ( $ch, CURLOPT_POST, 1 );
 	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
 	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
 	$re = curl_exec ( $ch );
 
 	curl_close ( $ch );
 
 	return $re;
 
 }
 
 
 /**
  * array to xml
  */
 function arrayToXml($arr){
 	$xml = '<xml>';
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
 
 /**
  * 获取随机字符串
  * @int length 字符串长度
  * @return string
  */
 function randStr($length){
 
 	$arr = ['a','b','c','d','e','f','g','h','i','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9'];
 	shuffle($arr);
 	$str = '';
 
 	for($i=1; $i<=$length; $i++){
 		$str .= $arr[$i];
 	}
 
 	return $str;
 }
 
 
 /**
  * 获取带参二维码
  * @return string
  */
 function wxQrCode($id){
 
 	$access_token = getAccessToken();
 	//获取二维码
 	$uri 	= 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token;
 	$data	= '{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "'.$id.'"}}}';
 	
 	//$data 	= '{"expire_seconds": 2592000, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": '.$id.'}}}';
 	$re 	= curl($uri, $data);
 
 	$arr 	= json_decode($re, true);
 
 	return 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$arr['ticket'];
 
 }
 
 
 /**
  * 返回中奖结果
  */
 function getResult($data, $cata_id){
 	
 	$num = $data['one'].$data['two'].$data['three'].$data['four'].$data['five'];
 	
 	if($cata_id == 1)
 	{
 		$lastNum = $num%110;
 		$lastNum++;
 		
 		if($lastNum<=55)
 		{
 			return '1-55';
 		}
 		
 		return '56-100';
 		
 	}
 	
 	if($cata_id == 2)
 	{
 		$lastNum = $num%56;
 		$lastNum++;
 		
 		if($lastNum <= 28)
 		{
 			return '1-28';
 		}
 		
 		return '29-56';
 	}
 	
 	
 }
 
 
 /**
  * 判断是否为推广关系
  * 
  * postId 要判断的用户
  * userId 父类
  */
 function isTui($postId, $userId){
 	
 	$model = D('User');
 	
 	$row   = $model->getById($postId);
 	
 	if($row['parent_id'] == 0){
 		return false;
 	}
 	
 	if($row['parent_id'] == $userId)
 	{
 		return true;
 	}
 	
 	isTui($row['parent_id'], $userId);
 }
 
 
 /**
  * 根据phone 获取手机号
  */
 function getUserIdByPhone($phone){
 	
 	$model = M('user');
 	
 	$row = $model->where(array(['phone'=>$phone]))->find();
 	return $row['id'];
 	
 }

//邀请码生成
function make_coupon_card() {
    $a = rand(0,9);
	$b = rand(0,9);
	$c = rand(0,9);
	$d = rand(0,9);
	$e = rand(0,9);
	$f = rand(0,9);
	$abc = $a.$b.$c.$d.$e.$f;

    return $abc;
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
?>