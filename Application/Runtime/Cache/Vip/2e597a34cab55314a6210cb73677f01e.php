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
<div class="nhead">
    <a class="nback" href="javascript:history.back(-1);"><img src="/Public/Images/Tui/nback.png"> </a>
    <a class="nhome" href="/"><img src="/Public/Images/Tui/nhome.png"></a>
    <div class="clear"></div>
</div>
<style>
    .nhead { width:100%; height:38px; background:#f24646;border-bottom:1px #fff solid;}
    .nback {width:36px; float:left;}
    .nback img {  width:30px; padding-top:2px;  margin-left:6px;}
    .nhome {width:36px; float:right;}
    .nhome img {  width:30px; padding-top:2px;  margin-right:6px;}
</style>
<div class="mui-content">
	
    <div class="mui-row">
    	
    	<!--
         	顶部开始
        -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="height:12rem;background:#f24646;background-size:100% auto;">
          
          	<div class="mui-row" style="margin-top:0.5rem;">
	          <div class="mui-col-sm-12 mui-col-xs-12" style="text-align:center;">
					<p style="color:#FFF;font-size:1.2rem;line-height:2rem;">全民抢购</p>
                    <p style="color:#FFF;font-size:1rem;line-height:2rem;">总订单数</p>
                    <p style="color:#FFF;font-size:2.5rem;line-height:3rem;">
                        <?php if(empty($output['sum'][0]['sum_price'])): ?>0<?php endif; echo ($output['sum'][0]['sum_price']); ?>
                        
                    </p>
                    <p style="color:#FFF;font-size:1rem;">今日订单数</p>
                    <p style="color:#FFF;font-size:1rem;position:relative;"><span class="sp" style="position:absolute;left:0.5rem;color:#fff;"><< 问题受理</span>
                     <?php if(empty($output['sumDay'][0]['sum_price'])): ?>0<?php endif; echo ($output['sumDay'][0]['sum_price']); ?>
                    
                    <span  style="position:absolute;right:0.5rem;"><a style="color:#FFF;" href="/vip/tui/user?phone=<?php echo ($phone); ?>">用户信息 >></a></span></p>
	        	</div>
	        	<div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="margin-top:0.2rem;">
	        		<p style="color:#6400E6;font-weight:800;"><?php echo ($output["member"]["nickname"]); ?></p>
	        	</div>
	        </div>
        </div>
        <!--
         	顶部结束
        -->
     </div>
     
     
    <div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="margin-top:13rem;">
	<div class="mui-scroll">
	<div class="warp">
    

	<?php if(is_array($output["resultList"])): foreach($output["resultList"] as $key=>$v): ?><!--
       	单条记录开始-->
    <div class="mui-row jump" style="background:#FFF;margin-top:0.5rem;" data-url="/vip/tui/order_day?phone=<?php echo ($phone); ?>&time_day=<?php echo ($v['time_day']); ?>">
       

       <div class="mui-col-sm-4 mui-col-xs-4 mui-text-left" style="line-height:2rem;padding-left:1rem;background:#AAAAAA;color:#FFF;">
            	<?php echo ($v['time_day']); ?>
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-left" style="line-height:2rem;background:#AAAAAA;color:#FFF;">
              <?php echo ($v['sum_number_c1'] + $v['sum_number_c2'] + $v['sum_number_c3']); ?>
       </div>
       
       <div class="mui-col-sm-6 mui-col-xs-6 mui-text-left" style="padding-top:0.3rem;">
       </div>
		
    </div>  
    <!--
       	单条记录结束
    --><?php endforeach; endif; ?>

   </div> 
   </div>
</div>
  	

    
    
    
     
   
    
</div>


<div style="height:auto;background:#FFF;position:fixed;left:50%;top:50%;width:90%;margin-left:-45%;margin-top:-45%;z-index:999;display:none;" id="tip">

	<div style="line-height:3rem;background:#FC0;color:#FFF;text-align:center;">请长按识别下方二维码</div>
    
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close">
    	<img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

    <div  style="text-align:center;padding-top:2rem;padding-bottom:2rem;">
    	<img src="<?php echo ($output["set"]["wechat"]); ?>" style="width:35%;" />
    </div>

    
    
</div>


<div style="position:fixed;right:1rem;bottom:5rem;">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>

</body>
<script>
var page = 2;

function formatData(time_day, sum, phone){
	
	var data = '<div class="mui-row jump" style="background:#FFF;margin-top:0.5rem;" data-url="/vip/tui/order_day?phone='+phone+'&time_day='+time_day+'">'+
       '<div class="mui-col-sm-4 mui-col-xs-4 mui-text-left" style="line-height:2rem;padding-left:1rem;background:#AAAAAA;color:#FFF;">'+time_day+
       '</div>'+
       '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-left" style="line-height:2rem;background:#AAAAAA;color:#FFF;">'+sum+
       '</div>'+
       '<div class="mui-col-sm-6 mui-col-xs-6 mui-text-left" style="padding-top:0.3rem;">'+
       '</div>'+
    '</div>';

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	data['phone'] = "<?php echo ($phone); ?>";
	var that = this;
	//post
	$.post('/Vip/Tui/tui_advance', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				var sum = parseInt(response.data[i]['sum_number_c1'])+parseInt(response.data[i]['sum_number_c2']);
				$('.warp').append(formatData(response.data[i]['time_day'], sum, "<?php echo ($phone); ?>"));
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
<script>

var mask = mui.createMask();//callback为用户点击蒙版时自动执行的回调；

$("#close").click(function(){
	$("#tip").hide();
	mask.close();
})
</script>
<script>
$(".sp").live('tap', function(){
	$("#tip").show();
	mask.show();
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