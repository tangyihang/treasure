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
<style>
.fr{float:left;width:20%;background:#f24646;text-align:center;}
.fs{float:left;width:20%;text-align:center;}
.fc{line-height:1.5rem;}
</style>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    
    <div style="color:#FFF;line-height:3rem; font-size:13px;">
    	<div class="fr">会员名</div>
        <div class="fr">今日订单</div>
        <div class="fr">本月订单</div>
        <div class="fr">总订单</div>
        <div class="fr">操作</div>
    </div>
    
	<?php if(is_array($output["rowOrder"])): foreach($output["rowOrder"] as $key=>$v): ?><!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;line-height:3rem;padding:0.5rem 0; font-size:13px;">
   		<div class="fs"><?php echo ($v["nickname"]); ?></div>
        <div class="fs"><?php echo ($v["today"]); ?></div>
        <div class="fs"><?php echo ($v["month"]); ?></div>
        <div class="fs"><?php echo ($v["all"]); ?></div>  	
        <div class="fs"><span data-url="/order/orderList?phone=<?php echo ($v["phone"]); ?>" class="jump" style="color:#f24646;">详情</span> <span data-url="/Vip/Tui/index?phone=<?php echo ($v["phone"]); ?>" class="jump" style=" color:#f24646;"">下级</span></div>  
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    --><?php endforeach; endif; ?>

   </div> 
   </div>
</div>

<div style="position:fixed;right:1rem;bottom:5rem;z-index:9999;">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>


<script>
var page = 2;

function formatData(nickname, today, month, all, phone){
	var str = '';
	str = '<div  style="background:#FFF;border-bottom:1px solid #CCC;line-height:3rem;padding:0.5rem 0;">'+
   		'<div class="fs">'+nickname+'</div>'+
        '<div class="fs">'+today+'</div>'+
        '<div class="fs">'+month+'</div>'+
        '<div class="fs">'+all+'</div>'+ 	
		'<div class="fs"><span data-url="/order/orderList?phone='+phone+'" class="jump">详情</span> <span data-url="/Vip/Tui/index?phone='+phone+'" class="jump">下级</span></div>'+  
        '<div style="clear:both;"></div>'+
    '</div>';

    return str;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] 	= page;
	data['openid']	= "<?php echo ($openid); ?>";
	var that = this;
	//post
	$.post('/Vip/Tui/index', data, function(response){

		page++;
				
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['nickname'], response.data[i]['today'], response.data[i]['month'], response.data[i]['all'], response.data[i]['phone']));
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