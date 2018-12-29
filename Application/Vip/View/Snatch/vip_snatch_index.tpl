<style>
.sp{width:10%;padding-top:0.6rem;padding-bottom:0.6rem;line-height:1.2rem;color:#666;float:left;background:#f24646;color:#FFF;height:6rem;margin-top:0.5rem;text-align:center;}
#copy{
-webkit-touch-callout:none;
-webkit-user-select:none;
-khtml-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
user-select:none;
-moz-user-select: none;
-moz-user-select: text;
-moz-user-select: all;
 
-webkit-user-select: none;
-webkit-user-select: text;
-webkit-user-select: all;
 
-ms-user-select: none;
-ms-user-select: text;
-ms-user-select: all;
-ms-user-select: element;
}
</style>
<body>
<div class="mui-row" style="line-height:3rem;text-align:center;">
			<div class="mui-col-sm-6 mui-col-xs-6 "  style="background:#FFF;color:#f24646;border-bottom:5px solid #f24646;color:#f24646;">未兑换</div>
			<div class="mui-col-sm-6 mui-col-xs-6 jump" data-url="/vip/snatch/haveGet" style="background:#FFF;color:#000;">已兑换</div>
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
            <div>幸运号码：<span style="color:#f24646;">{{$v.number_win}}</span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;">{{$v.goods_num}}</span><br/>可换积分：
                <span style="color:#f24646;"><eq name="v.catagory_id" value="1">{{$v[goods_num]*100}}</eq><eq name="v.catagory_id" value="2">{{$v[goods_num]*50}}</eq><eq name="v.catagory_id" value="3">{{$v[goods_num]*20}}</eq></span></div>
            <div>夺宝时间：{{$v.create_time}}</div>
			
        </div>
        <div class="sp" data-award_code="{{$v.award_code}}">
        	点<br/>击<br/>领<br/>取
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

<textarea cols="20" rows="10" id="biao1" style="position:absolute;left:-500px;" readonly  >{{$output.all}}</textarea>
<input type="button" onClick="copyUrl2()" value="点击复制代码" />

<div style="height:auto;background:#FFF;position:fixed;left:50%;top:50%;width:90%;margin-left:-45%;margin-top:-45%;z-index:999;display:none; border:1px #eee solid;" id="tip">

	<div style="line-height:3rem;background:#FC0;color:#FFF;text-align:center;">兑换码</div>
    
    <div  style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close">
    	<img src="/Public/Images/Home/close.png" style="width:2rem;" />
    </div>
	

    <div style="padding-top:1rem;text-align:center;padding-left:1rem;padding-right:1rem;">
        直接兑换为积分
    </div>
    <div style="text-align:center;padding:1rem 0;">
        <button type="button" class="mui-btn jump" style=" background:#f24646; color:#fff; border:none;" id="codejump">立即兑换</button>
    </div>
    
</div>

<div style="position:fixed;right:1rem;bottom:5rem;z-index:9999;">
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
</div>

<div style="position:fixed;right:0.2rem;bottom:2rem;z-index:9999;background:#333333;color:#FFF;border-radius:20px;padding:0.5rem; display:none;">
	<eq name="sys" value="ios">
    	<div class="jump" data-url="/vip/snatch/all">复制全部兑奖码</div>
    <else/>
   	 	<div onClick="copyUrl2()">复制全部兑奖码</div>
    </eq>
</div>



<script>
var page = 2;

function formatData(goods_name, time_day, phase, goods_num, create_time, number_win, award_code){
	
	var data = '<div  style="background:#FFF;border-bottom:1px solid #CCC;">'+
       
        '<div style="width:90%;padding-top:0.6rem;padding-left:1rem;padding-bottom:0.6rem;line-height:1.5rem;color:#666;float:left;">'+
           '<div>'+goods_name+'</div>'+
           '<div>商品期数： <span style="color:#f24646;">'+time_day+phase+'</span></div>'+
            '<div>幸运号码：<span style="color:#f24646;">'+number_win+'</span> &nbsp;&nbsp;&nbsp;&nbsp;获奖单数：<span style="color:#f24646;">'+goods_num+'</span></div>'+
            '<div>夺宝时间：'+create_time+'</div>'+
        '</div>'+
        '<div class="sp" data-award_code="'+award_code+'">点<br/>击<br/>领<br/>取</div>'+
        '<div style="clear:both;"></div>'+
   '</div>';

    return data;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	var that = this;
	//post
	$.post('/vip/Snatch', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['goods_name'], response.data[i]['time_day'], response.data[i]['phase'],response.data[i]['goods_num'],response.data[i]['create_time'],response.data[i]['number_win'], response.data[i]['award_code']));
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

	var award_code = $(this).data('award_code');
	$("#tip").show();
	$("#copy").html(award_code);
    $("#codejump").data('url','/vip/snatch/points?code='+award_code);
	mask.show();
	
})
</script>

<script type="text/javascript">
function copyUrl2()
{
var Url2=document.getElementById("biao1");
Url2.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
mui.toast("复制成功");

}
</script>

