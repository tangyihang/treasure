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
        <div style="width:25%;display:inline-block;text-align: center;line-height:2rem;float:left;">金额</div>
        <div style="width:25%;display:inline-block;text-align: center;line-height:2rem;float:left;">状态</div>
        <div style="width:25%;display:inline-block;text-align: center;line-height:2rem;float:left;">时间</div>
        <div style="width:25%;display:inline-block;text-align: center;line-height:2rem;float:left;">支付方式</div>
    </div>
    <div style="clear:both;"></div>

	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
       
       <div style="width:25%;display:inline-block;text-align: center;line-height:2rem;float:left;">{{$v.money}}</div>
       <div style="width:25%;display:inline-block;text-align: center;float:left;line-height:2rem;">
            <eq name="v.state" value="0">充值中</eq>
            <eq name="v.state" value="1">充值成功</eq>
       </div>
       <div style="width:25%;display:inline-block;text-align: center;float:left;line-height:2rem;">{{$v.created}}</div>
        <div style="width:25%;display:inline-block;text-align: center;float:left;line-height:2rem;">
            <eq name="v.pay_type" value="1">支付宝</eq>
            <eq name="v.pay_type" value="0">微信</eq>
        </div>
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    -->
    </foreach>

   </div> 
   </div>
</div>




</body>