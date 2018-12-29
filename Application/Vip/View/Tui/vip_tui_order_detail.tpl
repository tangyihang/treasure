<body>
<div class="nhead">
    <a class="nback" href="javascript:history.back(-1);"><img src="__PUBLIC__/Images/Tui/nback.png"> </a>
    <a class="nhome" href="/"><img src="__PUBLIC__/Images/Tui/nhome.png"></a>
    <div class="clear"></div>
</div>
<style>
    .nhead { width:100%; height:38px; background:#E86A11;border-bottom:1px #fff solid;}
    .nback {width:36px; float:left;}
    .nback img {  width:30px; padding-top:2px;  margin-left:6px;}
    .nhome {width:36px; float:right;}
    .nhome img {  width:30px; padding-top:2px;  margin-right:6px;}
</style>
<div class="mui-content">

 	<div class="mui-row" style="border-bottom:0.2rem solid #E86A11;position: relative; z-index:9999;">
       
       <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:3rem;padding-left:1rem;color:#E86A11;">
        	时间
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#E86A11;">
             头像
       </div>
       
       <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:3rem;color:#E86A11;">
       		手机号
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#E86A11;">
       		类型
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#E86A11;">
       		单数
       </div>
		
    </div>  
	
     
    <div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="margin-top:3.2rem;padding-top:38px;">
	<div class="mui-scroll">
	<div class="warp">
    

	<foreach name="output.resultList" item="v" >
	   	<!--
       	单条记录开始-->
    <div class="mui-row" style="margin-top:0.5rem;">
       
       <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:2rem;padding-left:1rem;color:#E86A11;">
        	{{$v.pay_time}}
       </div>
       
       <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center mui-ellipsis" style="line-height:2rem;color:#E86A11;">
             <img src="{{$v.headimgurl}}" style="width:2rem; height:2rem" >
       </div>
       
        <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:2rem;color:#E86A11;">
             {{$v.phone}}
       </div>
       
        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#E86A11;">
           {{$v.cata}}
       </div>
       
         <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#E86A11;">
             {{$v.goods_num}}
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


</body>
<script>
var page = 2;

function formatData(pay_time, headimgurl, phone, cata,goods_num){
	
	var data = ' <div class="mui-row" style="margin-top:0.5rem;">'+
       
       '<div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:2rem;padding-left:1rem;color:#369544;">'+pay_time+
       '</div>'+
       '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center mui-ellipsis" style="line-height:2rem;color:#369544;">'+
             '<img src="'+headimgurl+'" style="width:2rem;" >'+
       '</div>'+
        '<div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:2rem;color:#369544;">'+phone+
       '</div>'+
        '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#369544;">'+cata+
      ' </div>'+
         '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#369544;">'+goods_num+
       '</div>'+
    '</div>';
	

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	data['phone'] = "{{$phone}}";
	data['time_day'] = "{{$time_day}}";
	var that = this;
	//post
	$.post('/Vip/Tui/order_detail', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['pay_time'], response.data[i]['headimgurl'],response.data[i]['phone'], response.data[i]['cata'], response.data[i]['goods_num']));
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