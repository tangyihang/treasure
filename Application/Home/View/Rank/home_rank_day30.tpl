<body>
	<!--
    	描述：跑马灯开始
    -->
	<div style="position:fixed;top:0px;left:0px;height:1.8rem;z-index:999;width:100%;background-color:#fff;color:#333;">
    	<div style="position:absolute;left:0.6rem;top:0.3rem;z-index:999;"><img src="/Public/Images/Home/laba1.png" style="width:1.2rem;" /></div>
		<marquee behavior="scroll" style="line-height:1.8rem;margin-left:2rem;color:#f24646;" scrollamount=2 direction="left">
			{{$output.set.tip_top}}
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
        <foreach name="output.row" key="k" item="v">
        
        	<eq name="k" value="0">
                <div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone={{$v.phone}}">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/1.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="{{$v.headimgurl}}?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis">{{$v.nickname}}</p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;">{{$v.num}}</span> 单</p>
                    </div>
                </div>
            </eq>
            
            <eq name="k" value="1">
                <div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone={{$v.phone}}">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/2.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="{{$v.headimgurl}}?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis">{{$v.nickname}}</p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;">{{$v.num}}</span> 单</p>
                    </div>
                </div>
            </eq>
            
            <eq name="k" value="2">
                <div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone={{$v.phone}}">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style=" height:2rem">
                        <span><img src="/Public/Images/Home/3.png" style=" height:2rem" /></span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="{{$v.headimgurl}}?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis">{{$v.nickname}}</p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;">{{$v.num}}</span> 单</p>
                    </div>
                </div>
            </eq>
            
            <gt name="k" value="2">
            	  <div class="mui-row jump" style="background:#FFF;border-bottom:1px solid #EFEFF4;padding:0.5rem 0rem;" data-url="/order/orderList?phone={{$v.phone}}">
    
                    <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center">
                        <span style="line-height:2rem;">{{$k+1}}</span>
                    </div>
                    <div class="mui-col-sm-2 mui-col-xs-2" style=" height:2rem">
                        <img src="{{$v.headimgurl}}?imageView2/1/w/80/h/80" style="height:2rem;border-radius:0.5rem; margin-left:1rem" >
                    </div>
                    <div class="mui-col-sm-3 mui-col-xs-3">
                        <p style="line-height:2rem;font-size:1.1rem; color:#333;" class="mui-ellipsis">{{$v.nickname}}</p>
                    </div>
                    <div class="mui-col-sm-5 mui-col-xs-5">
                     <p style="line-height:2rem;color:#666; font-size:1rem">已中奖： <span style="color:#F00;">{{$v.num}}</span> 单</p>
                    </div>
                </div>
            
            </gt>
            
        </foreach>
	    <!--
        	描述：1
        -->

   

		

	</div>
    
    
    <div style="position:fixed;right:1rem;bottom:5rem;z-index:99999;display: none;">
	<div><a href="/index"><img src="/Public/Images/Home/duo.png" style="width:6rem;" ></a></div>
</div>

</body>