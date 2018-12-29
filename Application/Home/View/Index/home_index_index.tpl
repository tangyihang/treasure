<body>
<style>
.mui-active{color:#fff !important;border:none !important; background:#f24646 !important;}
</style>
<div class="mui-content">
	
	<!--
    	描述：跑马灯开始
    -->
	<div style="position:fixed;top:0px;left:0px;height:1.8rem;z-index:999;width:100%;background-color:#f5f5f5;color:#f24646;">
    	<div style="position:absolute;left:0.6rem;top:0.3rem;z-index:999;"><img src="/Public/Images/Home/laba1.png" style="width:1.2rem;" /></div>
		<marquee behavior="scroll" style="line-height:1.8rem;margin-left:2rem; font-size:13px;" scrollamount=2 direction="left">
            {{$output.set.tip_center}}
        </marquee>
	</div>
	<!--
    	描述：跑马灯结束
    -->
	
	<!--
    	描述：轮播开始
    -->
    <div class="mui-row" style="margin-top:1.8rem;">
    	<div class="mui-slider">
		  <div class="mui-slider-group">
		    	<div class="mui-slider-item"><a href="javascript:void(0);"><img src="/Public/Images/Home/banner.png" /></a></div>
		  </div>
		</div>
	</div>
	<!--
    	描述：轮播结束
    -->

	<!--
    	描述：奖品开始
    -->
    <div style="width:100%; margin:8px auto 8px;">
    	<div style="background:#fff;">
            <foreach name="output.rowGoods" item="v">
                <eq name="v.cata_id" value="3">
                <div style="width:100%; padding:10px 15px; position:relative;">
                    <a href="{{:U('index/detail', array('id'=>$v['id']))}}">
                    	<div style="width:40%; float:left">
                        	<img src="{{$v.img_url}}" style="width:100%; display:block; margin:0 auto;" />
                        </div>
                        <div style="width:56%; float:right; padding-top:8px;">
                        	<p style="line-height:24px; font-size:14px; color:#666; letter-spacing:0.5px;">20元移动充值卡</p>
                            <p style=" line-height:24px; color:#999;font-size:13px;">&nbsp;夺宝价 :  <span style="color:#F00;font-size:13px;font-weight: 400;">¥12</span></p>
                            <p style="margin-top:0.1rem; color:#999; font-size:13px;">（选单双）</p>
                            <div style="width:90px; height:28px; line-height:28px; position:absolute; bottom:15px; right:15px; background:#f24646; color:#fff; text-align:center; font-size:13px; border-radius:3px;">点击抢购</div>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>	
                </eq>
            </foreach>
        </div>
        <div style="background:#fff; margin-top:8px;">
            <foreach name="output.rowGoods" item="v">
                <eq name="v.cata_id" value="2">
                <div style="width:100%; padding:10px 15px; position:relative;">
                    <a href="{{:U('index/detail', array('id'=>$v['id']))}}">
                    	<div style="width:40%; float:left">
                        	<img src="{{$v.img_url}}" style="width:100%; display:block; margin:0 auto;" />
                        </div>
                        <div style="width:56%; float:right; padding-top:8px;">
                        	<p style="line-height:24px; font-size:14px; color:#666; letter-spacing:0.5px;">50元移动充值卡</p>
                            <p style=" line-height:24px; color:#999;font-size:13px;">&nbsp;夺宝价 :  <span style="color:#F00;font-size:13px;font-weight: 400;">¥28</span></p>
                            <p style="margin-top:0.1rem; color:#999; font-size:13px;">（选大小）</p>
                            <div style="width:90px; height:28px; line-height:28px; position:absolute; bottom:15px; right:15px; background:#f24646; color:#fff; text-align:center; font-size:13px; border-radius:3px;">点击抢购</div>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>	
                </eq>
            </foreach>
        </div>
        <div style="background:#fff; margin-top:8px;">
            <foreach name="output.rowGoods" item="v">
                <eq name="v.cata_id" value="1">
                <div style="width:100%; padding:10px 15px; position:relative;">
                    <a href="{{:U('index/detail', array('id'=>$v['id']))}}">
                    	<div style="width:40%; float:left">
                        	<img src="{{$v.img_url}}" style="width:100%; display:block; margin:0 auto;" />
                        </div>
                        <div style="width:56%; float:right; padding-top:8px;">
                        	<p style="line-height:24px; font-size:14px; color:#666; letter-spacing:0.5px;">100元石化充值卡</p>
                            <p style=" line-height:24px; color:#999;font-size:13px;">&nbsp;夺宝价 :  <span style="color:#F00;font-size:13px;font-weight: 400;">¥55</span></p>
                            <p style="margin-top:0.1rem; color:#999; font-size:13px;">（选大小）</p>
                            <div style="width:90px; height:28px; line-height:28px; position:absolute; bottom:15px; right:15px; background:#f24646; color:#fff; text-align:center; font-size:13px; border-radius:3px;">点击抢购</div>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>	
                </eq>
            </foreach>
        </div>
        
        
        <div style="width:0; height:0; clear:both"></div>
    </div>

	<!--
    	描述：奖品结束
    -->
    
   
    <!--
    	描述：选项卡开始
    -->
    
			<div style="margin-top:0.5rem; width:100%; margin:0 auto; background:#fff; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; overflow:hidden;">
            
				<div id="segmentedControl" style="background:#FFF;" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-primary" >
					<a class="mui-control-item mui-active" href="#item1">
						最新参与记录
					</a>
					<a class="mui-control-item" href="#item2">
						最新夺宝榜单
					</a>
							
				</div>
			</div>
			<div>
				<div id="item1" class="mui-control-content mui-active">
					<ul class="mui-table-view">
                        
                        
                        <foreach name="output.newBuy" item="v">
                            <li class="mui-table-view-cell mui-media">
                                <a href="/order/orderList?phone={{$v.phone}}">
                                    <img class="mui-media-object mui-pull-left" style="border-radius:3rem;" src="{{$v.headimgurl}}?imageView2/1/w/64/h/64">
                                    <div class="mui-media-body">
                                        <span style="color:#333;display:inline-block;width:30%; font-size:1rem;" class='mui-ellipsis'>{{$v.nickname}}</span><span class="mui-pull-right" style="color:#666; letter-spacing:-0.2px;font-size:0.85rem;">{{$v.create_time}}</span>
                                        <p class='mui-ellipsis' style="line-height:1rem;font-size:12px;">刚刚参与<span style="color:#F00;">{{$v.goods_num}}</span>单 【{{$v.goods_name}}】</p>
                                    </div>
                                </a>
                            </li>
                        </foreach>
                        
                       
                      
                    </ul>
				</div>
				
				<div id="item2" class="mui-control-content">
					<ul class="mui-table-view">
						 <foreach name="output.newAward" item="v">
                            <li class="mui-table-view-cell mui-media">
                                <a href="/order/orderList?phone={{$v.phone}}">
                                    <img class="mui-media-object mui-pull-left" style="border-radius:3rem;" src="{{$v.headimgurl}}?imageView2/1/w/64/h/64">
                                    <div class="mui-media-body">
                                        <span style="color:#333;display:inline-block;width:30%;" class='mui-ellipsis'>{{$v.nickname}}</span><span class="mui-pull-right" style="color:#666; letter-spacing:0;">{{$v.create_time}}</span>
                                        <p class='mui-ellipsis' style="line-height:1rem;font-size:12px;">刚刚赢得<span style="color:#F00;">{{$v.goods_num}}</span>张 【{{$v.goods_name}}】</p>
                                    </div>
                                </a>
                            </li>
                        </foreach>
					
					</ul>
				</div>
				
    <!--
    	描述：选项卡结束
    -->
   
    
</div>

<div style="height:3rem;margin-top:54px;"></div>

<div  class="countDown" style="position:fixed;bottom:54px;left:0px;background:#f24646;color:#FFF;text-align:center;line-height:2.5rem;width:100%;">
下期开战时间：<span class="d"></span>
		<span class="h"></span>
		<span class="m"></span>
		<span class="s"></span>
        <span class="hs" style="width:1rem;display:inline-block;"></span>
</div>

</body>



<script>
	var gallery = mui('.mui-slider');
	
	gallery.slider({
	  interval:5000//自动轮播周期，若为0则不自动播放，默认为0；
	});
	
</script>
<script>
$(".countDown").countTime({
	EndTime: "{{$endTime}}", //设置结束时间；
	callback:function(){     //当时间结束时候回调的函数
		$(".countDown").html('揭晓中');
		window.location.href='/'+"?id="+10000*Math.random();
	},
})
</script>
