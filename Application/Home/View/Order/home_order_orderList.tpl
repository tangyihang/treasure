<body>
<style>
.red{color:#F00;}
.li{width:33%;float:left;text-align:center;font-size:0.75rem;}
.border{border-right:0.5px solid #B2B2B2;}
</style>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    

	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
        <div style="width:35%;float:left;padding:1rem;">
            <div><img src="{{$v.goods_img}}" style="width:100%;" /></div>
            <eq name="v.result" value="2">
            <div style="text-align:center;line-height:1.8rem;background:#f24646;color:#fff;">恭喜获胜</div>
        	<div style="text-align:center;"><a href="javascript:void(0);" class="jump" data-url="/Vip/Snatch/login" style="display:inline-block;padding:0.3rem 0.7rem;border:1px solid #f24646;margin-top:0.5rem;color:#f24646; font-size:13px;">立即领取</a></div>
            </eq>
             <eq name="v.result" value="1">
            <div style="text-align:center;line-height:1.8rem;background:#A0A0A0;color:#FFF;">遗憾落败</div>
            </eq>
             <eq name="v.result" value="0">
            <div style="text-align:center;line-height:1.8rem;background:#CCC;color:#FFF;">等待开奖</div>
            </eq>
        </div>
        
        <div style="width:65%;float:left;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.8rem;color:#666;">
            <div>{{$v.goods_name}}</div>
            <div>本期参与：{{$v.user.nickname}}</div>
            <div>参与时间：{{$v.pay_time}}</div>
            <div style="color:#f24646;">参与号段：{{$v.number_through}} X {{$v.goods_num}}单</div>
            <neq name="v.result" value="0">
           	 	<div>开战时间：{{$v.timeOpen}}</div>
            	<div style="color:#f24646;">获奖号码：{{$v.number_win}}</div>
            </neq>
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
<div style="width: 100%;height:54px;margin-top: 2rem;"></div>
<div style="position:fixed;right:1rem;bottom:6rem;z-index:9999999;display: none">
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>

<div style="position:fixed;bottom:54px;left:0px;background:#f24646;color:#FFF;text-align:center;line-height:2.5rem;width:100%; z-index:999;">
<div class="li">今日参与：{{$output.todaySum}}单</div>
<div class="li">今日获胜：{{$output.todayWin}}单</div>
<div class="li">今日失败：{{$output.todayLose}}单</div>
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
	data['phone'] = "{{$phone}}";
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