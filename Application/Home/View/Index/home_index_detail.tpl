<style>
	#slide{position:relative;height:10rem;width:100%;color:#FA8E93;overflow:hidden;}
</style>
<body style="height:100%;">

<div class="mui-content">

	
	<!--
    	描述：轮播开始
    -->
    <div style=" padding:5px;">
   <img src="{{$output['row']['img_url']}}" style=" width:100%;display:block; margin:0 auto;" />
   </div>
	<!--
    	描述：轮播结束
    -->
    
    <!--
    	描述：通知开始
    -->
    <div style="line-height:2.8rem;background:#FFF;">
    	<span style="background:#f24646;color:#FFF;border-radius:0.3rem;padding:0.2rem 0.5rem;margin-left:0.6rem; letter-spacing:1px; font-size:13px;">进行中</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=" letter-spacing:0.5px; font-size:13.5px; color:#333;">{{$output.row.name}}</span>
    </div>
    <!--
    	描述：通知结束
    -->
   
   <!--
    	描述：榜单开始
    -->
    <div style="width:50%;float:left;text-align:center;line-height:2rem;background:#f24646;color:#fff;">战神榜</div>
    <div style="width:50%;float:left;text-align:center;line-height:2rem;background:#f1f1f1;color:#666; "><a href="/set/rule" style="color:#666;">夺宝规则</a></div>

		
		<div id="slide" style="height:auto; margin-bottom:0.5rem;">
			
			<div id="slide1">
				<ul class="mui-table-view" style="background:#fff;">
					 <foreach name="output.newAward" item="v">
                            <li class="mui-table-view-cell mui-media">
                                <a href="/order/orderList?phone={{$v.phone}}">
                                    <img class="mui-media-object mui-pull-left" style="border-radius:3rem;" src="{{$v.headimgurl}}?imageView2/1/w/64/h/64">
                                    <div class="mui-media-body">
                                        <span style="color:#007AFF;display:inline-block;width:30%;" class='mui-ellipsis'>{{$v.nickname}}</span><span class="mui-pull-right" style="color:#666;">{{$v.create_time}}</span>
                                        <p class='mui-ellipsis' style="line-height:1rem;font-size:12px;">刚刚获胜夺得商品<span style="color:#F00;">{{$v.goods_num}}</span>单</p>
                                    </div>
                                </a>
                            </li>
                        </foreach>
				</ul>
			</div>
			

		
		</div>

    <!--
    	描述：榜单结束
    -->
    
    <div style="line-height:2rem;background:#f24646;color:#FFF;padding-left:1rem;font-size:0.7rem;" class="countDown">
    	上期幸运号段：<span style="background:#FFF;color:#FF0000;padding:0rem 0.5rem;font-weight:800;border-radius:0.2rem;">{{$output.lastNum}}</span>
    	&nbsp;&nbsp;&nbsp;&nbsp;
        开战时间：<span class="d" style="font-size:0.7rem;"></span>
		<span class="h" style="font-size:0.7rem;"></span>
		<span class="m" style="font-size:0.7rem;"></span>
		<span class="s" style="font-size:0.7rem;"></span>
        <span class="hs" style="width:1rem;display:inline-block;font-size:0.7rem;"></span>
    </div>
    
    <!--战神开始-->
     <div class="mui-col-sm-12 mui-col-xs-12" style="margin-top:0.5rem;background:#FFF;margin-bottom:0;">
        	<div class="mui-navigate-right" style="line-height:2.5rem;color:#f24646; text-indent:0.5rem;">最新参与记录</div>
     </div>
     <div style="clear:both;"></div>
    <!--战神开始-->
    
    
    <!--排行榜开始-->
    <div>
    	<ul class="mui-table-view">
						 <foreach name="output.newBuy" item="v">
                            <li class="mui-table-view-cell mui-media">
                                <a href="/order/orderList?phone={{$v.phone}}">
                                    <img class="mui-media-object mui-pull-left" style="border-radius:3rem;" src="{{$v.headimgurl}}?imageView2/1/w/64/h/64">
                                    <div class="mui-media-body">
                                        <span style="color:#007AFF;display:inline-block;width:30%;" class='mui-ellipsis'>{{$v.nickname}}</span><span class="mui-pull-right" style="color:#666;">{{$v.create_time}}</span>
                                        <p class='mui-ellipsis' style="line-height:1rem;font-size:12px;">刚刚参与<span style="color:#F00;">{{$v.goods_num}}</span>张 【{{$v.goods_name}}】</p>
                                    </div>
                                </a>
                            </li>
                        </foreach>
					
					</ul>
    </div>
    <!--排行榜结束-->
   
  

</div>


<!--支付方式开始--> 
<div style="height:auto;background:#FFF;position:fixed;bottom:54px;left:0px;width:100%;z-index:999;display:none;" id="tip">

	<div style="line-height:2.8rem;background:#f24646;color:#FFF;text-align:center;">温馨提示：夺宝有风险，参与需谨慎</div>
    
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close">
    	<img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

    <div class="mui-numbox" data-numbox-step='1' data-numbox-min='1' data-numbox-max='200' style="width:90%;margin:1rem 5%;padding:0px;">
      <button class="mui-btn mui-numbox-btn-minus" type="button" style="width:30%;">-</button>
      <input class="mui-numbox-input"  type="text" id="goods_num" value="5" style="width:40%;"/>
      <button class="mui-btn mui-numbox-btn-plus" type="button" style="width:30%;">+</button>
    </div>
    
    <!--数量开始-->
    <div style="width:90%;margin:1rem 5%;">
    	
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="1" style="width:95%;">1</button>
        </div>
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="10" style="width:95%;">10</button>
        </div> 
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="20" style="width:95%;">20</button>
        </div> 
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="30" style="width:95%;">30</button>
        </div>
    </div>
    
    <div style="clear:both;"></div>
    
    <div style="width:90%;margin:1rem 5%;">
    	
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="50" style="width:95%;">50</button>
        </div>
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="60" style="width:95%;">60</button>
        </div> 
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num" data-num="80" style="width:95%;">80</button>
        </div> 
        
        <div style="width:25%;float:left;">
    		<button type="button" class="mui-btn db-num"  data-num="100" style="width:95%;">100</button>
        </div>
       
    </div>
    
    <div style="clear:both;"></div>
    <!--数量结束-->
    
    <!--分割线开始-->
    <div style="height:1px;background:#F00;width:90%;margin:2rem 5% 1rem 5%;"></div>
    <!--分割线结束-->
    
    <!--价格开始-->
    <div style="text-align:center;">
    	总需：<span id="sumPrice"></span>
    </div>
    <!--价格结束-->
    
    <!--pay start-->
    <div style="width:90%;margin:0.2rem 5% 1rem 5%;">
		<div style="width:100%;margin-top:0.5rem;margin-bottom:0.5rem;">
			<button type="button" class="mui-btn mui-btn-warning sub"  data-pay=3 style="width:100%; background: #f24646; border: 1px #f24646 solid;" id="jfzf">积分支付（积分余额:{{$output.member.points}}）</button>
		</div>
    	<!--<div style="width:50%;float:right;text-align:right">
    		<button type="button" class="mui-btn mui-btn-primary sub" data-pay=1 style="width:95%;">微信支付</button>	
        </div>

        <div style="width:100%;float:left;text-align:left">
    		<button type="button" class="mui-btn mui-btn-danger sub"  data-pay=2 style="width:100%;">支付宝支付</button>
        </div>-->
        
        <div style="clear:both;"></div>
         

       
    </div>
    <!--pay end-->
    
    
</div>

<div style="height:3rem;margin-top:54px;"></div>


<div style="position:fixed;bottom:54px;left:0px;color:#FFF;text-align:center;line-height:2.5rem;width:100%;z-index:10;background:#FFF;padding-top:0.5rem;border-top:1px solid #E4E3E6;">
		<div style="width:50%;float:left;">
    		<button type="button" class="mui-btn mui-btn-primary" data-loading-text="提交中" style="width:80%; background: #2f99e3; border: 1px #2f99e3 solid;" id="small">买小 ( {{$output.rowCata.small}} )</button>
        </div>
        <div style="width:50%;float:left;">
    		<button type="button" class="mui-btn mui-btn-danger" data-loading-text="提交中" style="width:80%; background: #f24646; border: 1px #f24646 solid;" id="big">买大 ( {{$output.rowCata.big}} )</button>
        </div>	
</div>

<div id="alipayshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
 	
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close2">
    	<img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

<p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">支付宝付款</p>
	<p style="text-align:center;line-height:3.5rem;">打开支付宝，扫一扫</p>
	<img src="/Public/Images/loading.gif" id="alipayqr" style="width:60%" />
</div>

<div id="wxshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
 	
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close3">
    	<img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>

<p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">微信付款</p>
	<p style="text-align:center;line-height:3.5rem;">打开微信，扫一扫</p>
	<img src="/Public/Images/loading.gif" id="wxqr" style="width:60%" />
</div>

<div style="position:fixed;right:1rem;bottom:5rem;text-align:right;display:none">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/rank/day"><img src="/Public/Images/Home/rank.png" style="width:5rem;" ></a></div>
</div>

</body>


<script>

//计算金额
function sum(){
	
	var num = $("#goods_num").val();

    if(num > 100)
    {
        num = 100;
        $("#goods_num").val(100);
    }

	var sum = num*price;


	$("#sumPrice").html(sum);
	
}

function redi(){
	 url = '/order/orderList?phone={{$output.phone}}';
	 window.location.href=url;
}
</script>
<script>
var mask 		= mui.createMask();//callback为用户点击蒙版时自动执行的回调；
var goods_id 	= {{$output.row.id}};
var price   	= {{$output.rowCata.price}};

var cata_id		= {{$output.rowCata.id}};
var snatch_type = '';

sum();


$("#close").click(function(){
	$("#tip").hide();
	mask.close();
})

$("#close2").click(function(){
	$("#alipayshow").hide();
	mask.close();
})

$("#close3").click(function(){
	$("#wxshow").hide();
	mask.close();
})

$("#small").click(function(){
	snatch_type = 1;
	mask.show();//显示遮罩
	$("#tip").show();
})

$("#big").click(function(){
	snatch_type = 2;
	mask.show();//显示遮罩
	$("#tip").show();
})

$(".db-num").click(function(){
	var num = $(this).data('num');	
	$("#goods_num").val(num);
	sum();
})

//pay
$(".sub").click(function(){
//	mui.alert('系统维护中！', "提示", "确定");
//    return;
	var pay_type = $(this).data('pay');
	var num = $("#goods_num").val();
	var that = this;
	var sumPrice=$("#sumPrice").html();
	if(pay_type==3){
		if(!confirm('是否使用'+ sumPrice +'积分购买')){
			return false;
		}
	}
	mui(that).button('loading');
	$.post('/order/submit', {goods_id:goods_id,goods_num:num,snatch_type:snatch_type,pay_type:pay_type}, function(response){


 		if(response.code == 11)
		{
			$("#wxqr").attr("src", response.info);
            
			$("#wxshow").show();
			$("#tip").hide();
			mask.show();//显示遮罩	
			
				
		}else if(response.code == 21){
		
            $("#alipayqr").attr("src", response.info);
            
			$("#alipayshow").show();
			$("#tip").hide();
			mask.show();//显示遮罩

			
		
		}else if(response.code == 31){
			
			mui.alert('支付成功', "提示", "确定", redi);
			
		
		}else if(response.code == 66){
            window.location.href= response.info;
        } else
		{
			mui.alert(response.info, "提示", "确定");
		}
		mui(that).button('reset');
	},'json')


})


$("#goods_num").change(function(){
	sum();
})

</script>

<script>
var speed=40
    var slide=document.getElementById("slide");
    var slide2=document.getElementById("slide2");
    var slide1=document.getElementById("slide1");
    slide2.innerHTML=slide1.innerHTML
    
    function Marquee(){

	   if(slide2.offsetTop-slide.scrollTop<=0){
            slide.scrollTop-=slide1.offsetHeight;
        }else{
            slide.scrollTop++;
        }
    }
    
    setInterval(Marquee, speed);

</script>


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
		window.location.href='/'+"?"+10000*Math.random();
	},
})
</script>