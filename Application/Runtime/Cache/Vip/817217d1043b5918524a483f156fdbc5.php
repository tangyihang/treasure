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
	
    <div class="mui-row" style="background:#fff url(/Public/Images/Home/userbg.jpg) no-repeat center top;background-size:100% 8rem; padding-top:8rem;">
    	
    	<!--
         	顶部开始
        -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style=" margin-top:-3.2rem">
          
          	<div class="mui-row">
	          <div class="mui-col-sm-12 mui-col-xs-12" style="text-align:center;">
	          		<img src="<?php echo ($output["member"]["headimgurl"]); ?>?imageView2/1/w/80/h/80" style="width: 6rem;border-radius:50%;" />
	        	</div>
	        	<div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="margin-top:0.2rem;">
	        		<p style="color:#333;font-weight:800; font-size:16px;"><?php echo ($output["member"]["nickname"]); ?></p>
	        	</div>
	        </div>
            <div class="mui-row" style="width:100%; margin:0.3rem auto 0.8rem;">
            	<div class="mui-col-sm-6 mui-col-xs-6  mui-text-center">
                	<p style="font-size:13.5px;color:#666; text-align:right; padding-right:15px;"> 积分：<?php echo ($output["points"]); ?></p>
					
                </div>
                <div class="mui-col-sm-6 mui-col-xs-6 mui-text-center">
                	<p style="font-size:13.5px;color:#666; text-align:left; padding-left:15px;"> 累计获胜：<?php echo ($output["count"]); ?></p>
					
                </div>
            </div>
            <div class="mui-row" style="width:50%; margin:1.1rem auto;">
        		<div class="mui-col-sm-6 mui-col-xs-6  mui-text-center"><a href="/vip/points/index" style="width:80%; display:block; float:left; height:2rem; line-height:2rem; font-size:13px; color:#fff; text-align:center; opacity:0.6; background:#6ad8d5; border-radius:0.4rem;">充值</a></div>
                <div class="mui-col-sm-6 mui-col-xs-6 mui-text-center"><a href="/vip/points/get" style="width:80%; display:block; float:right;height:2rem; line-height:2rem; font-size:13px; color:#fff; text-align:center; opacity:0.6; background:#fc5d3d; border-radius:0.4rem;">提现</a></div>
        	</div>
        </div>
        
     </div>
     <div class="mui_row" style="background:#f5f5f5; height:2.2rem; ">
     	<div class="li">今日参与：<?php echo ($output["todaySum"]); ?>单</div>
        <div class="li">今日获胜：<?php echo ($output["todayWin"]); ?>单</div>
        <div class="li">今日失败：<?php echo ($output["todayLose"]); ?>单</div>
     </div>
     
   
<style>
.li{width:33%;float:left;text-align:center;font-size:0.75rem; color:#333; opacity:0.8; line-height:2.2rem;}
</style>   	
    
    
    
    <div class="mui-row" style=" padding-bottom:60px;">
    	<!--
           	描述：功能列表
        -->
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/order/orderList?phone=<?php echo ($output["member"]["phone"]); ?>"><div style="  padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db1.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">抢购记录</div></a>
        </div>
       
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/vip/Snatch/login"><div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db2.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">兑换记录</div></a>
        </div>
       
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/rank/day"><div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db3.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">总排行榜</div></a>
        </div>
       
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/Vip/Tui/index?phone=<?php echo ($output["member"]["phone"]); ?>"><div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db4.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">推广展示</div></a>
        </div>
       
       <?php if(($output["tui_type"]) == "1"): ?><div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/Vip/Tui/tui_advance?phone=<?php echo ($output["member"]["phone"]); ?>"><div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db5.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">高级代理</div></a>
        </div><?php endif; ?>
        
            <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
                <a href="/Vip/Tui/invite"><div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db10.png" style="width:1.8rem;height:1.8rem;"></div>
                    <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">邀请码</div></a>
            </div>
        
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        	<a href="/set/rule"><div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db6.png" style="width:1.8rem;height:1.8rem;"></div>
			<div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">玩法介绍</div></a>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
        <a href="/vip/user/bank"> <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db7.png" style="width:1.8rem;height:1.8rem;"></div>
      <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">银行卡管理</div></a>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
            <a href="/set/share"><div style=" padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db8.png" style="width:1.8rem;height:1.8rem;"></div>
            <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">我要分享</div></a>
        </div>
        <div class="mui-col-sm-3 mui-col-xs-4" style="background:#FFF;border-bottom:1px solid #E9E9E9; border-right:1px #eeeeee solid;">
           <a href="/vip/index/logout"> <div style="padding:0.6rem;width:3rem;height:3rem;margin:0.8rem auto 0.1rem; display:block;"><img class="mui-media-object" src="/Public/Images/Home/db9.png" style="width:1.8rem;height:1.8rem;"></div>
            <div style="line-height:2rem; padding-bottom:0.8rem;color:#8F8F94; display:block; text-align:center;">退出登陆</div></a>
        </div>
       <!--
           	描述：功能列表
        -->
        
        
        

        

        
        
        
    
	</div>
    
   
    
</div>



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