<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>夺宝支付</title>
</head>
<?php
/* *
 * 功能：手机网站支付接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 *1、开发文档中心（https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1）
 *2、商户帮助中心（https://cshall.alipay.com/enterprise/help_detail.htm?help_id=473888）
 *3、支持中心（https://support.open.alipay.com/alipay/support/index.htm）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");
require_once('mysql.php');

$id 	= addslashes(htmlspecialchars(trim($_GET['id'])));

$conn		= Mysql::instance();

$sql		= "SELECT * FROM sh_points_order WHERE order_id = '{$id}' LIMIT 1";  //select order by id

$rs			= $conn->query($sql);
$row		= $rs->fetch();  //获取订单

if(empty($row))
{
	echo '订单不存在';
	exit;
}

// if(time() > strtotime($row['time_day'].$row['time_hour'].$row['time_minute']))
// {
// 	echo '已超过开奖时间，不能支付';
// 	exit;
// }

if($row['pay_type'] != 1)
{
	echo '支付方式错误！';
	exit;
}

if($row['pay_status'] == 1)
{
	echo '已支付成功！';
	exit;
}
/**************************请求参数**************************/

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $id;

        //订单名称，必填
        $subject = $row['order_id'];

        //付款金额，必填
		
        
		$total_fee = $row['money'];
        //收银台页面上，商品展示的超链接，必填
        $show_url = '积分充值';

        //商品描述，可空
        $body = '积分充值';



/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> 'http://hebeissc.com/Alipay/notify_points.php',
		"return_url"	=>  $alipay_config['return_url'],
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"show_url"	=> $show_url,
		//"app_pay"	=> "Y",//启用此参数能唤起钱包APP支付宝
		"body"	=> $body,
		//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1
        //如"参数名"	=> "参数值"   注：上一个参数末尾需要“,”逗号。
		
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;

?>
</body>
</html>