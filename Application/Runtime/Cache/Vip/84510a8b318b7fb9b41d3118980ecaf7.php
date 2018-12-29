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
<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body class="bg-gray">
<div class="container padding-bottom-5">
  <div class="row bg-gray" style="line-height:10rem;text-align: center;font-weight: 600;font-size:2.5rem;color:#FF6F02;">
      绑定成功
  </div>
  <form action="" method="post" id="ff">
  <div class="row">
    
     <div class="col-xs-12  line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">姓名</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="username" placeholder="请输入姓名" disabled="disabled" value="<?php echo ($rowUser["user_name"]); ?>" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">银行名称</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="bank" placeholder="请输入开户银行" disabled="disabled" value="<?php echo ($rowUser["bank"]); ?>" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

     <div class="col-xs-12 line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">卡号</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="bank_num" placeholder="请输入银行卡号" disabled="disabled" value="<?php echo ($rowUser["bank_num"]); ?>" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>



     <div class="padding-2">
          

        </div>

    
    
  </div>

  </form>
</div>

<div style="position:fixed;right:1rem;bottom:5rem;">
  <div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
  <div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>



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