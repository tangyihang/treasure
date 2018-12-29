<body>
<div class="nhead">
    <a class="nback" href="javascript:history.back(-1);"><img src="__PUBLIC__/Images/Tui/nback.png"> </a>
    <a class="nhome" href="/"><img src="__PUBLIC__/Images/Tui/nhome.png"></a>
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
                        <empty name="output['sum'][0]['sum_price']">
                        0
                        </empty>{{$output['sum'][0]['sum_price']}}
                        
                    </p>
                    <p style="color:#FFF;font-size:1rem;">今日订单数</p>
                    <p style="color:#FFF;font-size:1rem;position:relative;"><span class="sp" style="position:absolute;left:0.5rem;color:#fff;"><< 问题受理</span>
                     <empty name="output['sumDay'][0]['sum_price']">
                        0
                      </empty>{{$output['sumDay'][0]['sum_price']}}
                    
                    <span  style="position:absolute;right:0.5rem;"><a style="color:#FFF;" href="/vip/tui/user?phone={{$phone}}">用户信息 >></a></span></p>
	        	</div>
	        	<div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="margin-top:0.2rem;">
	        		<p style="color:#6400E6;font-weight:800;">{{$output.member.nickname}}</p>
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
    

	<foreach name="output.resultList" item="v" >
	   	<!--
       	单条记录开始-->
    <div class="mui-row jump" style="background:#FFF;margin-top:0.5rem;" data-url="/vip/tui/order_day?phone={{$phone}}&time_day={{$v['time_day']}}">
       

       <div class="mui-col-sm-4 mui-col-xs-4 mui-text-left" style="line-height:2rem;padding-left:1rem;background:#AAAAAA;color:#FFF;">
            	{{$v['time_day']}}
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-left" style="line-height:2rem;background:#AAAAAA;color:#FFF;">
              {{$v['sum_number_c1'] + $v['sum_number_c2'] + $v['sum_number_c3']}}
       </div>
       
       <div class="mui-col-sm-6 mui-col-xs-6 mui-text-left" style="padding-top:0.3rem;">
       </div>
		
    </div>  
    <!--
       	单条记录结束
    -->
    
    </foreach>

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
    	<img src="{{$output.set.wechat}}" style="width:35%;" />
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
	data['phone'] = "{{$phone}}";
	var that = this;
	//post
	$.post('/Vip/Tui/tui_advance', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				var sum = parseInt(response.data[i]['sum_number_c1'])+parseInt(response.data[i]['sum_number_c2']);
				$('.warp').append(formatData(response.data[i]['time_day'], sum, "{{$phone}}"));
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