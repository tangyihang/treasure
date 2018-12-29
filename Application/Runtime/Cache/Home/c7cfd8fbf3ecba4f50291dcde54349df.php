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
<style>
.red{color:#F00;}
.li{width:33%;float:left;text-align:center;font-size:0.75rem;}
.border{border-right:0.5px solid #B2B2B2;}
</style>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    

	<?php if(is_array($output["rowOrder"])): foreach($output["rowOrder"] as $key=>$v): ?><!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
        <div style="width:35%;float:left;padding:1rem;">
            <div><img src="<?php echo ($v["goods_img"]); ?>" style="width:100%;" /></div>
            <?php if(($v["result"]) == "2"): ?><div style="text-align:center;line-height:1.8rem;background:#f24646;color:#fff;">恭喜获胜</div>
        	<div style="text-align:center;"><a href="javascript:void(0);" class="jump" data-url="/Vip/Snatch/login" style="display:inline-block;padding:0.3rem 0.7rem;border:1px solid #f24646;margin-top:0.5rem;color:#f24646; font-size:13px;">立即领取</a></div><?php endif; ?>
             <?php if(($v["result"]) == "1"): ?><div style="text-align:center;line-height:1.8rem;background:#A0A0A0;color:#FFF;">遗憾落败</div><?php endif; ?>
             <?php if(($v["result"]) == "0"): ?><div style="text-align:center;line-height:1.8rem;background:#CCC;color:#FFF;">等待开奖</div><?php endif; ?>
        </div>
        
        <div style="width:65%;float:left;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.8rem;color:#666;">
            <div><?php echo ($v["goods_name"]); ?></div>
            <div>本期参与：<?php echo ($v["user"]["nickname"]); ?></div>
            <div>参与时间：<?php echo ($v["pay_time"]); ?></div>
            <div style="color:#f24646;">参与号段：<?php echo ($v["number_through"]); ?> X <?php echo ($v["goods_num"]); ?>单</div>
            <?php if(($v["result"]) != "0"): ?><div>开战时间：<?php echo ($v["timeOpen"]); ?></div>
            	<div style="color:#f24646;">获奖号码：<?php echo ($v["number_win"]); ?></div><?php endif; ?>
        </div>
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    --><?php endforeach; endif; ?>

   </div> 
   </div>
</div>
<div style="width: 100%;height:54px;margin-top: 2rem;"></div>
<div style="position:fixed;right:1rem;bottom:6rem;z-index:9999999;display: none">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>

<div style="position:fixed;bottom:54px;left:0px;background:#f24646;color:#FFF;text-align:center;line-height:2.5rem;width:100%; z-index:999;">
<div class="li">今日参与：<?php echo ($output["todaySum"]); ?>单</div>
<div class="li">今日获胜：<?php echo ($output["todayWin"]); ?>单</div>
<div class="li">今日失败：<?php echo ($output["todayLose"]); ?>单</div>
</div>


<script>
var page = 2;

function formatData(goods_img, result, goods_name, nickname, create_time, number_through, timeOpen, number_win, goods_num){
	var str = '';
	var str2 = '';
	if(result == 2)
	{
		str = '<div style="text-align:center;line-height:2rem;background:#F00;color:#FFF;">恭喜获胜</div>'+
        	'<div style="text-align:center;"><a href="/Vip/Snatch" style="display:inline-block;padding:0.5rem 0.7rem;border:1px solid #F00;margin-top:0.5rem;color:#F00;">立即领取</a></div>';	
		str2 = '<div>开战时间：'+timeOpen+'</div>'+
            '<div>获奖号码：'+number_win+'</div>';
	}
	
	if(result == 1)
	{
		str = '<div style="text-align:center;line-height:2rem;background:#A0A0A0;color:#FFF;">遗憾落失</div>';
		str2 = '<div>开战时间：'+timeOpen+'</div>'+
            '<div>获奖号码：'+number_win+'</div>';
	}
	
	if(result == 0)
	{
		str = '<div style="text-align:center;line-height:2rem;background:#CCC;color:#FFF;">等待开奖</div>';
	
	}

	var  data = '<div  style="background:#FFF;border-bottom:1px solid #CCC;">'+
        '<div style="width:35%;float:left;padding:1rem;">'+
            '<div><img src="'+goods_img+'" style="width:100%;" /></div>'+
            str+
       ' </div>'+
        '<div style="width:65%;float:left;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.8rem;color:#666;">'+
            '<div>'+goods_name+'</div>'+
            '<div>本期参与：'+nickname+'</div>'+
            '<div>参与时间：'+create_time+'</div>'+
            '<div class="red">参与号段：'+number_through+ ' X ' + goods_num +'单</div>'+
            str2+
        '</div>'+
        '<div style="clear:both;"></div>'+
   '</div>';

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	data['phone'] = "<?php echo ($phone); ?>";
	var that = this;
	//post
	$.post('/Order/orderList', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['goods_img'], response.data[i]['result'], response.data[i]['goods_name'], response.data[i]['user']['nickname'],response.data[i]['create_time'], response.data[i]['number_through'],response.data[i]['timeOpen'],response.data[i]['number_win'], response.data[i]['goods_num']));
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