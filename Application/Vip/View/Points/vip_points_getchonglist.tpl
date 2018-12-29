<body>
<style>
.red{color:#F00;}
.li{width:33%;float:left;text-align:center;font-size:0.75rem;}
.border{border-right:0.5px solid #B2B2B2;}
</style>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    
    <div>
        <div style="width:30%;display:inline-block;text-align: center;line-height:2rem;">金额</div>
        <div style="width:30%;display:inline-block;text-align: center;">状态</div>
        <div style="width:30%;display:inline-block;text-align: center;">时间</div>
    </div>
    <div style="clear:both;"></div>

	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
       
       <div style="width:30%;display:inline-block;text-align: center;line-height:2rem;">{{$v.change}}</div>
       <div style="width:30%;display:inline-block;text-align: center;">
            <eq name="v.is_get" value="0">处理中</eq>
            <eq name="v.is_get" value="1">未处理</eq>
       </div>
       <div style="width:30%;display:inline-block;text-align: center;">{{$v.create_time}}</div>
       
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    -->
    </foreach>

   </div> 
   </div>
</div>

<div style="position:fixed;right:1rem;bottom:6rem;z-index:9999999;">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>



</body>