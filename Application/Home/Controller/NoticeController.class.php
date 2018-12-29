<?php
//支付通知
namespace Home\Controller;
use Think\Controller;
class NoticeController extends Controller {
		
	/**
	 * SpNotice
	 */
	public function SpNotice()
	{
		$postStr = file_get_contents("php://input");
		$this->elog($postStr, '记录通知', 'NOTICE');
		
		if (!empty($postStr)){
			
			
			libxml_disable_entity_loader(true);
			$postObj 		= (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		
			
			if($postObj['status'] != 0 || $postObj['result_code'] != 0)
			{
				$this->elog($postStr, '返回状态错误', 'NOTICE');
				echo 'SUCCESS';
				exit;
			}
			
			
			//post
			$r = array();
			
			$r['bank_type'] 	= $postObj['bank_type'];
			$r['charset']		= $postObj['charset'];
			$r['fee_type']		= $postObj['fee_type'];
			$r['is_subscribe']	= $postObj['is_subscribe'];
			$r['mch_id']		= $postObj['mch_id'];
			$r['nonce_str']		= $postObj['nonce_str'];
			$r['openid']		= $postObj['openid'];
			$r['out_trade_no']	= $postObj['out_trade_no'];
			$r['out_transaction_id'] = $postObj['out_transaction_id'];
			$r['pay_result']	= $postObj['pay_result'];
			$r['result_code']	= $postObj['result_code'];
			$r['sign_type']		= $postObj['sign_type'];
			$r['status']		= $postObj['status'];
			$r['time_end']		= $postObj['time_end'];
			$r['total_fee']		= $postObj['total_fee'];
			$r['trade_type']	= $postObj['trade_type'];
			$r['transaction_id']= $postObj['transaction_id'];
			$r['version']		= $postObj['version'];
			
			//ksort
			ksort($r);
			
			//生成sign
			$str 	= urldecode(http_build_query($r)).'&key='.'fadbb3f06dcf5207ecfce7b812d8f32f';
			$sign 	= strtoupper(md5($str));
			
			//签名错误
			if($sign != $postObj['sign'])
			{
				echo 'success';
				$this->elog('签名错误', '返回状态错误', 'NOTICE');
				exit;
			}
			
			
			//获取订单
			//判断订单是否存在
			$model 	= M('order');
			$row 	= $model->where(array('id'=>$r['out_trade_no']))->find();
			
			if(empty($row))
			{
				echo 'SUCCESS';
				$this->elog($postStr, '订单不存在', 'ERROR');
				exit;
			}
			
			if($row['pay_status'] == 1)
			{
				echo 'SUCCESS';
				$this->elog('已支付重复通知', '订单不存在', 'NOTICE');
				exit;
			}
			
			//金额判断
			if($row['goods_price_sum'] != $r['total_fee'])
			{
				//测试暂时关闭，校验金额
				//echo 'SUCCESS';
				$this->elog('支付金额与订单金额不等！', '订单不存在', 'ERROR');
				//exit;
			}
			
			
			$next = getNowDate();
			$modelAward = D('award');
			
			$save = array(
					'pay_status'=>1,
					'pay_time'=>date('Y-m-d H:i:s'),
					'time_day'=>$next['nextDay'],
					'time_hour'=>$next['nextHour'],
					'time_minute'=>$next['nextMinute'],
					'phase'		=>$modelAward->getByHourAndMinute($next['nextHour'], $next['nextMinute'])
			);
			
			
			//更新
			$result = $model->where(array('id'=>$r['out_trade_no']))->save($save);
			
			if($result)
			{
				echo 'SUCCESS';
				exit;
			}else
			{
				echo 'FAIL';
				$this->elog($postStr, '订单更新失败', 'NOTICE');
				exit;
			}
			
			
		}
		
	}
	
	//notice
	public function WxNotice()
	{
		$postStr = file_get_contents("php://input");

		
		if (!empty($postStr)){
				
	
			libxml_disable_entity_loader(true);
			$postObj 		= simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
	
			if($postObj->result_code != 'SUCCESS' || $postObj->return_code != 'SUCCESS')
			{
				$this->elog($postStr, '返回状态错误', 'NOTICE');
				echo 'SUCCESS';
				exit;
			}
			
			
				
				
			$r = array();
				
			$r['appid'] 		= "$postObj->appid";
			$r['bank_type']		= "$postObj->bank_type";
			$r['cash_fee']		= "$postObj->cash_fee";
			$r['fee_type']		= "$postObj->fee_type";
			$r['is_subscribe']	= "$postObj->is_subscribe";
			$r['mch_id']		= "$postObj->mch_id";
			$r['nonce_str']		= "$postObj->nonce_str";
			$r['openid']		= "$postObj->openid";
			$r['out_trade_no']	= "$postObj->out_trade_no";
			$r['result_code']	= "$postObj->result_code";
			$r['return_code']	= "$postObj->return_code";
			$r['time_end']		= "$postObj->time_end";
			$r['total_fee']		= "$postObj->total_fee";
			$r['trade_type']	= "$postObj->trade_type";
			$r['transaction_id']= "$postObj->transaction_id";
				
			ksort($r);
			//生成sign
			$str 	= urldecode(http_build_query($r)).'&key='.PAY_KEY;
			$sign 	= strtoupper(md5($str));
				
			if($sign != $postObj->sign)
			{
				echo 'SUCCESS';
				$this->elog($postStr, '通知签名错误', 'ERROR');
				exit;
			}
			
			//判断订单是否存在
			$model 	= M('order');
			$row 	= $model->where(array('id'=>$r['out_trade_no']))->find();
			
			if(empty($row))
			{
				echo 'SUCCESS';
				$this->elog($postStr, '订单不存在', 'ERROR');
				exit;
			}
				
			if($row['pay_status'] == 1)
			{
				echo 'SUCCESS';
				$this->elog('已支付重复通知', '订单不存在', 'NOTICE');
				exit;
			}
			
			//金额判断
			if($row['goods_price_sum'] != $r['total_fee'])
			{
				//测试暂时关闭，校验金额
				//echo 'SUCCESS';
				$this->elog('支付金额与订单金额不等！', '订单不存在', 'ERROR');
				//exit;
			}
			
			
			$next = getNowDate();
			$modelAward = D('award');
			
			$save = array(
					'pay_status'=>1, 
					'pay_time'=>date('Y-m-d H:i:s'),
					'time_day'=>$next['nextDay'],
					'time_hour'=>$next['nextHour'],
					'time_minute'=>$next['nextMinute'],
					'phase'		=>$modelAward->getByHourAndMinute($next['nextHour'], $next['nextMinute'])
			);

			
			//更新
			$result = $model->where(array('id'=>$r['out_trade_no']))->save($save);
			
			if($result)
			{
				echo 'SUCCESS';
				exit;
			}else
			{
				echo 'FAIL';
				$this->elog($postStr, '订单更新失败', 'NOTICE');
				exit;
			}
			
				
				
				
		}
	
	
	}


	/**
	 * SpNotice
	 */
	public function WxPointNotice()
	{
		$postStr = file_get_contents("php://input");
		$this->elog($postStr, '记录通知', 'NOTICE');
		
		if (!empty($postStr)){
			
			
			libxml_disable_entity_loader(true);
			$postObj 		= (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		
			
			if($postObj['status'] != 0 || $postObj['result_code'] != 0)
			{
				$this->elog($postStr, '返回状态错误', 'NOTICE');
				echo 'SUCCESS';
				exit;
			}
			
			
			//post
			$r = array();
			
			$r['bank_type'] 	= $postObj['bank_type'];
			$r['charset']		= $postObj['charset'];
			$r['fee_type']		= $postObj['fee_type'];
			$r['is_subscribe']	= $postObj['is_subscribe'];
			$r['mch_id']		= $postObj['mch_id'];
			$r['nonce_str']		= $postObj['nonce_str'];
			$r['openid']		= $postObj['openid'];
			$r['out_trade_no']	= $postObj['out_trade_no'];
			$r['out_transaction_id'] = $postObj['out_transaction_id'];
			$r['pay_result']	= $postObj['pay_result'];
			$r['result_code']	= $postObj['result_code'];
			$r['sign_type']		= $postObj['sign_type'];
			$r['status']		= $postObj['status'];
			$r['time_end']		= $postObj['time_end'];
			$r['total_fee']		= $postObj['total_fee'];
			$r['trade_type']	= $postObj['trade_type'];
			$r['transaction_id']= $postObj['transaction_id'];
			$r['version']		= $postObj['version'];
			
			//ksort
			ksort($r);
			
			//生成sign
			$str 	= urldecode(http_build_query($r)).'&key='.'fadbb3f06dcf5207ecfce7b812d8f32f';
			$sign 	= strtoupper(md5($str));
			
			//签名错误
			if($sign != $postObj['sign'])
			{
				echo 'success';
				$this->elog('签名错误', '返回状态错误', 'NOTICE');
				exit;
			}
			
			
			//获取订单
			//判断订单是否存在
			$model 	= M('points_order');
			$row 	= $model->where(array('order_id'=>$r['out_trade_no']))->find();
			
			if(empty($row))
			{
				echo 'SUCCESS';
				$this->elog($postStr, '标题', 'ERROR');
				exit;
			}
			
			if($row['pay_status'] == 1)
			{
				echo 'SUCCESS';
				$this->elog('已支付重复通知', '标题', 'NOTICE');
				exit;
			}
			
			//金额判断
			if($row['money'] != $r['total_fee'])
			{
				//测试暂时关闭，校验金额
				//echo 'SUCCESS';
				$this->elog('支付金额与订单金额不等！', '金额错误', 'ERROR');
				//exit;
			}
			

			$save = array(
					'pay_status'=>1,
					'pay_time'=>date('Y-m-d H:i:s'),
			);
			
			$model->startTrans();
			
			//更新
			$result = $model->where(array('order_id'=>$r['out_trade_no']))->save($save);

			$modelUser = M('user');
			$rowUser = $modelUser->where(array('id'=>$row['user_id']))->find();

			
			$result2 = $modelUser->where(array('id'=>$row['user_id']))->setInc('points', $row['money']);


			$dataUpdate = [];
			$dataUpdate['before'] 	= $rowUser['points'];
			$dataUpdate['change']	= $row['money'];
			$dataUpdate['after']	= $rowUser['points'] + $row['money'];
			$dataUpdate['user_id']	= $row['user_id'];
			$dataUpdate['type']		= 30;
			$dataUpdate['create_time'] = date('Y-m-d H:i:s');

			$modelDetail = M('points_detail');
			$result3 = $modelDetail->add($dataUpdate);


			if($result && $result2 && $result3)
			{
				$model->commit();
				echo 'SUCCESS';
				exit;
			}else
			{
				echo 'FAIL';
				$model->rollback();
				$this->elog($postStr, '订单更新失败', 'NOTICE');
				exit;
			}
			
			
		}
		
	}
	
	
	private function elog($con,$title, $level= 'NOTICE'){
	
	
		//日志按天生成
		$path = dirname(getcwd()).'/log/'.'paylog_'.date('Ymd').'.log';
	
		file_put_contents($path, $level.'【'.date('Y-m-d H:i:s').'】'.PHP_EOL, FILE_APPEND);
		file_put_contents($path, $title.PHP_EOL, FILE_APPEND);
		file_put_contents($path, $con.PHP_EOL.PHP_EOL, FILE_APPEND);
	}
	
	
    
    
  
    
 
}