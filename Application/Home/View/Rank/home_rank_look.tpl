<body>
<style>
.rrr span{ background:url(/Public/Images/Home/q2.png) no-repeat center; background-size:100%;display:inline-block;width:2rem; height:2rem;line-height:2rem;color:#FFF; border-radius:50%;}
.fnew span {background:#989898;display:inline-block;width:1.5rem; height:1.5rem;line-height:1.5rem; margin-right:3px;color:#FFF; border-radius:50%;}
.fr{float:left;width:20%;background:#eee;text-align:center; font-size:13px; color:#333;}
.fs{float:left;width:20%;text-align:center;}
.fc{line-height:2rem;}
.f5{ background:url(/Public/Images/Home/q1.png) no-repeat center !important;display:inline-block;width:2rem; height:2rem;line-height:2rem;color:#FFF; border-radius:50%;}
.f6{ background:url(/Public/Images/Home/q1.png) no-repeat center !important;display:inline-block;width:2rem; height:2rem;line-height:2rem;color:#FFF; border-radius:50%;}
.ft{color:#DB3752;}
</style>
<!--
    	描述：跑马灯开始
    -->
	<div style="position:fixed;top:0px;left:0px;height:1.8rem;z-index:999;width:100%;background-color:#f24646;color:#333;">
    	<div style="position:absolute;left:0.6rem;top:0.3rem;z-index:999;"><img src="/Public/Images/Home/laba.png" style="width:1.2rem;" /></div>
		<marquee behavior="scroll" style="line-height:1.8rem;margin-left:2rem;color:#FFF; letter-spacing:1px;" scrollamount=2 direction="left">
			{{$output.set.tip_top}}
        </marquee> 
	</div>
	<!--
    	描述：跑马灯结束
    -->
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    
    <div style="color:#FFF;line-height:2.2rem;margin-top:1.8rem;">
    	
        <div class="fr" style="width:40%;">开奖号码</div>
        <div class="fr">(单双)</div>
        <div class="fr">(n%56+1)</div>
        <div class="fr">(n%110+1)</div>
    </div>
    
   <div style="width:100%; height:2.2rem;"></div>
	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div class="rrr"  style="background:#FFF;border-bottom:1px solid #CCC;line-height:2rem;padding:0.5rem 0;">
        <div class="fs ft fnew" style="line-height:1.2rem; width:40%">
        	<p style="color:#333; line-height:2rem;">{{$v.openTime}}</p>
        	<div><span>{{$v.one}}</span><span>{{$v.two}}</span><span>{{$v.three}}</span><span>{{$v.four}}</span><span>{{$v.five}}</span></div>
        </div>
        <div class="fs" style="padding-top:0.9rem;"><span <eq name="v.mochujo" value="0">class="f5" </eq> >{{$v.lastnumjo}}</span></div> 
        <div class="fs" style="padding-top:0.9rem;"><span <eq name="v.mochu56R" value="1"> class="f5" </eq> >{{$v.mochu56}}</span></div>
        <div class="fs" style="padding-top:0.9rem;"><span <eq name="v.mochu110R" value="1">class="f6" </eq> >{{$v.mochu110}}</span></div>	 
        <div style="clear:both;"></div>
    </div>
    <!--
    	描述：订单记录结束
    -->
    </foreach>

   </div> 
   </div>
</div>
 <div  class="countDown" style="position:fixed;bottom:54px;left:0px;background:#f24646;color:#FFF;text-align:center;line-height:2.5rem;width:100%; z-index:999;">

		下期开战时间：<span class="d"></span>
		<span class="h"></span>
		<span class="m"></span>
		<span class="s"></span>
        <span class="hs" style="width:1rem;display:inline-block;"></span>
</div>

<script>
var page = 2;

function formatData(openTime, one, two, three, four, five, mochu56, mochu110,lastnumjo, mochu56R, mochu110R, mochujoR){
	var str = '';
	var mochu56R2 = '';
	var mochu110R2 = '';
	
	if(mochu56R == 1){
		mochu56R2 = 'class="f5"';
	}
	
	if(mochu110R == 1)
	{
		mochu110R2 = 'class="f6"';
	}
	if(mochujoR == 0)
	{
		mochujoR = 'class="f6"';
	}
	str = '<div class="rrr"  style="background:#FFF;border-bottom:1px solid #CCC;line-height:2rem;padding:0.5rem 0;">'+ 
        '<div class="fs ft fnew" style="line-height:1.2rem; width:40%">'+ 
        '<p style="color:#333; line-height:2rem;">'+openTime+'</p>'+ 
        '<div><span>'+one+'</span><span>'+two+'</span><span>'+three+'</span><span>'+four+'</span><span>'+five+'</span></div>'+ 
        '</div>'+ 
		'<div class="fs" style="padding-top:0.9rem;"><span '+mochujoR+'>'+lastnumjo+'</span></div>'+ 
        '<div class="fs" style="padding-top:0.9rem;"><span '+mochu56R2+'>'+mochu56+'</span></div>'+
        '<div class="fs" style="padding-top:0.9rem;"><span '+mochu110R2+'>'+mochu110+'</span></div>'+ 	
		 
        '<div style="clear:both;"></div>'+
    '</div>';
	
    return str;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] = page;
	var that = this;
	//post
	$.post('/Rank/look', data, function(response){

		page++;
		
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['openTime'], response.data[i]['one'], response.data[i]['two'], response.data[i]['three'], response.data[i]['four'], response.data[i]['five'], response.data[i]['mochu56'], response.data[i]['mochu110'], response.data[i]['lastnumjo'], response.data[i]['mochu56R'], response.data[i]['mochu110R'], response.data[i]['mochujo']));
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
$(".countDown").countTime({
	EndTime: "{{$endTime}}", //设置结束时间；
	callback:function(){     //当时间结束时候回调的函数
		var hh = 10;
		$(".countDown").html('揭晓中...倒计时'+hh+'秒');	
		var interval = setInterval(function(){
			hh--;
			$(".countDown").html('揭晓中...倒计时'+hh+'秒');	
			if(hh <=0)
			{
				location.reload();	
				clearInterval(interval);
				return;
			}
			
		},1000);
		
		
	},
})
</script>
</body>