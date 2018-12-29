<style>
.sp{width:10%;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.2rem;color:#666;float:left;background:#f24646;color:#FFF;height:6rem;margin-top:0.5rem;text-align:center;}
</style>
<body>
<div class="mui-row" style="line-height:3rem;text-align:center;">
			<div class="mui-col-sm-6 mui-col-xs-6 jump" data-url="/vip/snatch" style="background:#FFF;">未兑换</div>
			<div class="mui-col-sm-6 mui-col-xs-6 "  style="background:#FFF;color:#f24646;border-bottom:5px solid #f24646;color:#f24646;">已兑换</div>
</div>

<div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="top:3.1rem;">
	<div class="mui-scroll">
	<div class="warp">
	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;">
       
        <div style="width:90%;padding-top:0.6rem;padding-left:1rem;padding-bottom:0.6rem;line-height:1.5rem;color:#666;float:left;">
            <div>{{$v.goods_name}}</div>
            <div>商品期数： <span style="color:#f24646;"> {{$v.time_day}}{{$v.phase}}</span></div>
            <div>幸运号码：<span style="color:#f24646;">{{$v.number_win}}</span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;">{{$v.goods_num}}</span></div>
            <div>夺宝时间：{{$v.create_time}}</div>
			
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
<div style="position:fixed;right:1rem;bottom:5rem;z-index:9999;">
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
</div>
<script>
var page = 2;

function formatData(goods_name, time_day, phase, goods_num, create_time, number_win){
	
	var data = '<div  style="background:#FFF;border-bottom:1px solid #CCC;">'+
       
        '<div style="width:90%;padding-top:0.6rem;padding-left:1rem;padding-bottom:0.6rem;line-height:1.5rem;color:#666;float:left;">'+
           '<div>'+goods_name+'</div>'+
           '<div>商品期数： <span style="color:#f24646;">'+time_day+phase+'</span></div>'+
            '<div>幸运号码：<span style="color:#f24646;">'+number_win+'</span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;">'+goods_num+'</span></div>'+
            '<div>夺宝时间：'+create_time+'</div>'+
        '</div>'+
        '<div style="clear:both;"></div>'+
   '</div>';

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	var that = this;
	//post
	$.post('/vip/Snatch/haveGet', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['goods_name'], response.data[i]['time_day'], response.data[i]['phase'],response.data[i]['goods_num'],response.data[i]['create_time'],response.data[i]['number_win']));
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
