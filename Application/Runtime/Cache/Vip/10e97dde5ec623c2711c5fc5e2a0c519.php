<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html style="height:100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo ($output['title']); ?></title>
    <script src="/Public/Js/zepto.min.js"></script>
    <script src="/Public/Js/mui.min.js"></script>
    <link href="/Public/Css/mui.min.css" rel="stylesheet"/>
    <link href="/Public/Css/base.css" rel="stylesheet"/>
</head>
<body>

<div class="mui-content">
	
    <div class="mui-row">
    	
    	<!--
         	顶部开始
        -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:5rem 2rem;">
          <input type="text" name="money" id="money" placeholder="单笔充值金额不能超过900元">
          <button type="button" class="mui-btn mui-btn-primary sub" data-type="0" style="width:50%;float: left;display: none;">微信支付</button>
          <button type="button" class="mui-btn mui-btn-warning sub" data-type="1" style="width:100%;float: left;background:#f24646; border:none;">支付宝支付</button>
          <p style="text-align: right;padding-top:2rem; line-height: 40px;"><a href="/vip/points/getlist1">查看充值记录</a></p>
        </div>


     </div>
</div>

<div id="wxshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
  
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close3">
      <img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

  <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">微信付款</p>
  <p style="text-align:center;line-height:3.5rem;">打开微信，扫一扫</p>
  <img src="/Public/Images/loading.gif" id="wxqr" style="width:60%" />
</div>

<div id="alipayshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
  
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close2">
      <img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

<p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#f24646;color:#FFF;">支付宝付款</p>
  <p style="text-align:center;line-height:3.5rem;">打开支付宝，扫一扫</p>
  <img src="/Public/Images/loading.gif" id="alipayqr" style="width:60%" />
</div>


<script type="text/javascript">

$("#close3").click(function(){
  $("#wxshow").hide();
  mask.close();
})

$("#close2").click(function(){
  $("#alipayshow").hide();
  mask.close();
})
  //pay
$(".sub").click(function(){
//	mui.alert('系统维护中！', "提示", "确定");
//    return;

  var money = $("#money").val();
  var type = $(this).data('type');

  var that = this;
  mui(that).button('loading');
  $.post('/vip/points/submit', {money:money,type:type}, function(response){

    if(response.code != 11)
    {
      mui.alert(response.info, "提示", "确定");

      mui(that).button('reset');
      return;
    }
    if(type == 0)
    {
      $("#wxqr").attr("src", response.info);
            
      $("#wxshow").show();
      $("#tip").hide();
      mask.show();//显示遮罩  

      mui(that).button('reset'); 
    }

    if(type == 1)
    {
       $("#alipayqr").attr("src", response.info);
            
      $("#alipayshow").show();
      $("#tip").hide();
      mask.show();//显示遮罩

       mui(that).button('reset'); 
    }

    

  },'json')


})


</script>
   
</body>
<script>
$(".jump").on('tap',function(){

	var url = $(this).data('url');
	mui.openWindow({
		url: url, 
	});
	
})
</script>
<div class="footer">
	<div class="footer_list clearfix">
			<li <?php if(($btid) == "0"): ?>class="bot_cur"<?php endif; ?>><a href="/index">
					<div class="f_img1"><img src="/Public/Images/Home/bot1_1.png" class="img1"><img src="/Public/Images/Home/bot1_2.png" class="img2"></div>
					<p>首页</p>
				</a></li>
			<li <?php if(($btid) == "1"): ?>class="bot_cur"<?php endif; ?>><a href="/rank/look">
					<div class="f_img1"><img src="/Public/Images/Home/bot2_1.png" class="img1"><img src="/Public/Images/Home/bot2_2.png" class="img2"></div>
					<p>开奖</p>
				</a></li>
			<li <?php if(($btid) == "2"): ?>class="bot_cur"<?php endif; ?>><a href="/rank/day">
					<div class="f_img1"><img src="/Public/Images/Home/bot3_1.png" class="img1"><img src="/Public/Images/Home/bot3_2.png" class="img2"></div>
					<p>排行</p>
				</a></li>
			<li <?php if(($btid) == "4"): ?>class="bot_cur"<?php endif; ?>><a href="/vip">
					<div class="f_img1"><img src="/Public/Images/Home/bot4_1.png" class="img1"><img src="/Public/Images/Home/bot4_2.png" class="img2"></div>
					<p>我的</p>
				</a></li>
			<div class="clear"></div>

	</div>
</div>
<style>
	.footer_list .img1 { display:block;}
	.footer_list .img2 { display:none;}
	.bot_cur .img1 { display:none;}
	.bot_cur .img2 { display:block;}
	.bot_cur p { color:#f24646 !important;}
	/*footer*/
	.footer{width:100%;position:fixed;bottom:0;z-index:999;background:#f7f7f7;left:0; box-shadow: 0 2px 13px #666; padding:2px 0;}	
	.footer_list{margin:0 auto;width:100%; padding:3px 0;}
	.footer_list li{float:left;width:25%;list-style: none;}
	.footer_list li a{display:block;}
	.footer_list li .f_img1{width:20%;margin:0 auto;margin-top:5px;margin-bottom:0px;}
	.footer_list li img{display:block;margin:0 auto;width:100%;}
	.footer_list li p{text-align:center;width:100%;font-size:12px;color:#afafaf;margin-bottom:0px;}
	.clear {
		width:0; height:0; clear:both;}
</style><!--footer-->

</body>
</html>