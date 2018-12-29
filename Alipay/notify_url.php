<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。


 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 该页面调试工具请使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyNotify
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
require_once('mysql.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Application/Common/Common/function.php';

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no 		= $_POST['trade_no'];

	//交易状态
	$trade_status 	= $_POST['trade_status'];

	$fee  = $_POST['total_fee'];
	
    if($_POST['trade_status'] == 'TRADE_FINISHED') {
	
    	
		
    	
    }
    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
    	
    	$conn		= Mysql::instance();
    	
    	$sql		= "SELECT * FROM sh_order WHERE id = {$out_trade_no} LIMIT 1";  //select order by id
    	
    	$rs			= $conn->query($sql);
    	$row		= $rs->fetch();  //获取订单
    	
    	//判断订单状态
    	if($row['pay_status'] == 1){
    		echo 'success';
    		exit;
    	}
    	
    	if($row['goods_price_sum'] != $fee)
    	{
//     		echo 'success';
//     		exit;
    	}
    	//获取下一期信息
    	$next = getNowDate();
    	
    	//获取第几期
    	$sql		= "SELECT * FROM sh_award WHERE time_hour = '{$next['nextHour']}' AND time_minute = '{$next['nextMinute']}' LIMIT 1";  //select order by id
    	$rs			= $conn->query($sql);
    	$rowAward	= $rs->fetch();  //获取订单
    	
        $now = date('Y-m-d H:i:s');

    	$sql = "UPDATE sh_order SET time_day = '{$next['nextDay']}',time_hour='{$next['nextHour']}',time_minute='{$next['nextMinute']}',phase='{$rowAward['phase']}',pay_status = 1,pay_time='{$now}' WHERE id = '{$out_trade_no}'";
    	$result = $conn->query($sql);
    	
    	if($result)
    	{
    		echo 'success';
    	}
    }
        
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>