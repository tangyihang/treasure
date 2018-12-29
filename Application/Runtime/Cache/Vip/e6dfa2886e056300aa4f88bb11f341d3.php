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
<style>
.sp{width:10%;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.2rem;color:#666;float:left;background:#f24646;color:#FFF;height:6rem;margin-top:0.5rem;text-align:center;}
</style>
<body>
<div class="mui-row" style="line-height:3rem;text-align:center;">
			<div class="mui-col-sm-6 mui-col-xs-6 jump" data-url="/vip/snatch" style="background:#FFF;">未兑换</div>
			<div class="mui-col-sm-6 mui-col-xs-6 "  style="background:#FFF;color:#f24646;border-bottom:5px solid #f24646;color:#f24646;">已兑换</div>
</div>

<div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="top:3.1rem;">
	<div class="mui-scroll">
	<div class="warp">
	<?php if(is_array($output["rowOrder"])): foreach($output["rowOrder"] as $key=>$v): ?><!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
       
        <div style="width:90%;padding-top:0.6rem;padding-left:1rem;padding-bottom:0.6rem;line-height:1.5rem;color:#666;float:left;">
            <div><?php echo ($v["goods_name"]); ?></div>
            <div>商品期数： <span style="color:#f24646;"> <?php echo ($v["time_day"]); echo ($v["phase"]); ?></span></div>
            <div>幸运号码：<span style="color:#f24646;"><?php echo ($v["number_win"]); ?></span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;"><?php echo ($v["goods_num"]); ?></span></div>
            <div>夺宝时间：<?php echo ($v["create_time"]); ?></div>
			
        </div>
        
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    --><?php endforeach; endif; ?>

   </div> 
   </div>
</div>
<div style="position:fixed;right:1rem;bottom:5rem;z-index:9999;">
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
</div>
<script>
var page = 2;

function formatData(goods_name, time_day, phase, goods_num, create_time, number_win){
	
	var data = '<div  style="background:#FFF;border-bottom:1px solid #CCC;">'+
       
        '<div style="width:90%;padding-top:0.6rem;padding-left:1rem;padding-bottom:0.6rem;line-height:1.5rem;color:#666;float:left;">'+
           '<div>'+goods_name+'</div>'+
           '<div>商品期数： <span style="color:#f24646;">'+time_day+phase+'</span></div>'+
            '<div>幸运号码：<span style="color:#f24646;">'+number_win+'</span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;">'+goods_num+'</span></div>'+
            '<div>夺宝时间：'+create_time+'</div>'+
        '</div>'+
        '<div style="clear:both;"></div>'+
   '</div>';

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	var that = this;
	//post
	$.post('/vip/Snatch/haveGet', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['goods_name'], response.data[i]['time_day'], response.data[i]['phase'],response.data[i]['goods_num'],response.data[i]['create_time'],response.data[i]['number_win']));
			}
			
			that.endPullupToRefresh(false);
		}else{
			that.endPullupToRefresh(true);			
		}
			
		
	}, 'json')
	
}

mui.init({
    pullRefresh: {
        container: '#pullrefresh',
        
        up: {//上拉加载
            //auto:true,//可选,默认false.自动上拉加载一次
            contentrefresh: '正在加载...',
            contentnomore:'没有更多数据了',//可选，请求完毕若没有更多数据时显示的提醒内容；
            callback: pullupRefresh
        }
    }
});

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