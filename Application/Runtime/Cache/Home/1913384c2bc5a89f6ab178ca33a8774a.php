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
<body>
	<!--
    	描述：跑马灯开始
    -->
	<div style="position:fixed;top:0px;left:0px;height:1.8rem;z-index:999;width:100%;background-color:#fff;color:#333;">
    	<div style="position:absolute;left:0.6rem;top:0.3rem;z-index:999;"><img src="/Public/Images/Home/laba1.png" style="width:1.2rem;" /></div>
		<marquee behavior="scroll" style="line-height:1.8rem;margin-left:2rem;color:#f24646;" scrollamount=2 direction="left">
			<?php echo ($output["set"]["tip_top"]); ?>
        </marquee> 
	</div>
    <div class="mui-row" style="position:fixed;left:0px;top:1.8rem;width:100%;line-height:2.5rem;text-align:center;">
			<div class="mui-col-sm-4 mui-col-xs-4 jump" data-url="/rank/day" style="background:#f24646;color:#FFF;border-right:1px solid #FFFFFF;">24小时</div>
			<div class="mui-col-sm-4 mui-col-xs-4 jump" data-url="/rank/day7" style="background:#f24646;color:#FFF;border-right:1px solid #FFFFFF;">7日</div>
			<div class="mui-col-sm-4 mui-col-xs-4 jump" data-url="/rank/day30" style="background:#f5f5f5;color:#eb5c4b;">30日</div>
		</div>
	<!--
    
    	描述：跑马灯结束
    -->
	<div class="mui-content"  style="margin-top:4.3rem;" >
	
		<!--
        	描述：1
        -->
        <?php if(is_array($output["row"])): foreach($output["row"] as $k=>$v): if(($k) == "0"): ?><div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone=<?php echo ($v["phone"]); ?>">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/1.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="<?php echo ($v["headimgurl"]); ?>?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis"><?php echo ($v["nickname"]); ?></p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;"><?php echo ($v["num"]); ?></span> 单</p>
                    </div>
                </div><?php endif; ?>
            
            <?php if(($k) == "1"): ?><div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone=<?php echo ($v["phone"]); ?>">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/2.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="<?php echo ($v["headimgurl"]); ?>?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis"><?php echo ($v["nickname"]); ?></p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;"><?php echo ($v["num"]); ?></span> 单</p>
                    </div>
                </div><?php endif; ?>
            
            <?php if(($k) == "2"): ?><div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone=<?php echo ($v["phone"]); ?>">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/3.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="<?php echo ($v["headimgurl"]); ?>?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis"><?php echo ($v["nickname"]); ?></p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;"><?php echo ($v["num"]); ?></span> 单</p>
                    </div>
                </div><?php endif; ?>
            
            <?php if(($k) > "2"): ?><div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone=<?php echo ($v["phone"]); ?>">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center">
                        <span style="line-height:2rem;"><?php echo ($k+1); ?></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="<?php echo ($v["headimgurl"]); ?>?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis"><?php echo ($v["nickname"]); ?></p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;"><?php echo ($v["num"]); ?></span> 单</p>
                    </div>
                </div><?php endif; endforeach; endif; ?>
	    <!--
        	描述：1
        -->

   

		

	</div>
    
    
    <div style="position:fixed;right:1rem;bottom:5rem;z-index:99999;display: none;">
	<div><a href="/index"><img src="/Public/Images/Home/duo.png" style="width:6rem;" ></a></div>
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