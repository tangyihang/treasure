<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html style="height:100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo ($output['title']); ?></title>
    <script src="/Public/Js/zepto.min.js"></script>
    <script src="/Public/Js/zepto.time.js"></script>
    <script src="/Public/Js/mui.min.js"></script>
    <link href="/Public/Css/mui.min.css" rel="stylesheet"/>
    <link href="/Public/Css/base.css" rel="stylesheet"/>
</head>
<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body style="background:url(/Public/Images/Home/bg1.jpg) no-repeat;height:100%; background-size:100% auto;">
<div class="container">
  <div class="row" style="height: 28rem !important;" id="top_one">
   
  </div>
  
  <div class="row">
    <div class="col-xs-12 line-height-5 media1" style="line-height:5rem;font-size:13px !important;">
      <div class="col-xs-3 padding-0 aleft" style="padding-left:1.5rem; color:#333;font-size:13px !important;">手机号：</div>
      <div class="col-xs-9 padding-0">
        <input type="tel" name="member_phone" id="member_phone" placeholder="请输入联系电话" class="form-input lidl" style="font-size:13px !important; border:none;border-bottom: 1px #ccc solid; -webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0; background:none;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 media1" style="line-height:5rem;font-size:13px !important">
      <div class="col-xs-3 padding-0 aleft" style="padding-left:1.5rem; color:#333;font-size:13px !important;">密码：</div>
      <div class="col-xs-9 padding-0">
        <input type="password" name="password" id="password" placeholder="请输入密码" class="form-input lidl" style="font-size:13px !important; border:none; border-bottom: 1px #ccc solid;-webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0; background:none;">
      </div>
    </div>


     <div class="padding-2">
            <div  class="col-xs-12 text-center bg-yellow white margin-top-1" id="reg" style="font-size:13px; letter-spacing:0.5px; background:#f14646;line-height: 32px;">
                   登&nbsp;&nbsp;录
            </div>

	 		<div class="col-xs-12 text-center bg-yellow white margin-top-1" style="font-size:13px; letter-spacing:0.5px; background:#C9C9C9; line-height: 32px;">
        		<a href="/user/register" style="color:#fff;font-size:13px; display:block;">注&nbsp;&nbsp;册</a>
   			</div>

        </div>

    
    
  </div>
</div>

<style>
	.footer { display:none !important;}
</style>
<script>

</script>
<script>
function redi()
{
	window.location.href="/";
	}

$("#reg").click(function(){
		
		var member_phone 	= $("input[name='member_phone']").val();
		var password 			= $("input[name='password']").val();
		if(member_phone == ''){
			mui.alert('手机号不能为空', "提示", "确定");
			return false;	
		}
		
		if(password == ''){
			mui.alert('密码不能为空！', "提示", "确定");
			return false;
		}

		//ajax
		$.post("/user/login", {member_phone:member_phone,password:password},
			function(data){
				if(data.code == 11){
					mui.alert(data.info, "提示", "确定", redi());
					return;
				}else{
					mui.alert(data.info, "提示", "确定");
					return;
				}
			}
		);
		
	})
</script>

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
					<div class="f_img1"><img src="/Public/Images/Home/bot5_1.png" class="img1"><img src="/Public/Images/Home/bot5_2.png" class="img2"></div>
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