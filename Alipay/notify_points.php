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

logResult("1");
if($verify_result) {//验证成功
	
	logResult("2");

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no 		= $_POST['trade_no'];

	//交易状态
	$trade_status 	= $_POST['trade_status'];

	$fee  = $_POST['total_fee'];
	
    if($_POST['trade_status'] == 'TRADE_FINISHED') {
	
    	
		
    	
    }
    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
    	
    	logResult("3");
    	
    	$conn		= Mysql::instance();
    	
    	$sql		= "SELECT * FROM sh_points_order WHERE order_id = {$out_trade_no} LIMIT 1";  //select order by id
    	
    	$rs			= $conn->query($sql);
    	$row		= $rs->fetch();  //获取订单
    	
    	//判断订单状态
    	if($row['pay_status'] == 1){
    		echo 'success';
    		exit;
    	}
    	
    	if($row['money'] != $fee)
    	{
//     		echo 'success';
//     		exit;
    	}
    	
    	$sql = "SELECT * FROM sh_user WHERE id = '{$row['user_id']}'";
    	$rs			= $conn->query($sql);
    	$rowUser	= $rs->fetch();  //获取用户
    	
    	if(empty($rowUser))
    	{
    		echo 'success';
    		exit();
    	}
    	$time = date('Y-m-d H:i:s');
    	//更新支付状态
    	$sql = "UPDATE sh_points_order SET pay_status = 1 , pay_time='{$time}' WHERE order_id = '{$out_trade_no}'";
    	$conn->query($sql);
    	
    	//更新数据
    	$sql = "UPDATE sh_user SET points = points + '{$row['money']}' WHERE id = '{$row['user_id']}'";
    	$conn->query($sql);
    	
    	
    	//写入日志
    	$after = $rowUser['points'] + $row['money'];
    	$sql = "INSERT INTO sh_points_detail(`before`, `change`, `after`, `user_id`, `type`, `create_time`) VALUES('{$rowUser['points']}', '{$row['money']}', '{$after}', '{$row['user_id']}', 30, '{$time}')";
    	$conn->query($sql);

    	echo 'success';
    }
        
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>