<body>
<style>
.fr{float:left;width:20%;background:#f24646;text-align:center;}
.fs{float:left;width:20%;text-align:center;}
.fc{line-height:1.5rem;}
</style>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
	<div class="warp">
    
    <div style="color:#FFF;line-height:3rem; font-size:13px;">
    	<div class="fr">会员名</div>
        <div class="fr">今日订单</div>
        <div class="fr">本月订单</div>
        <div class="fr">总订单</div>
        <div class="fr">操作</div>
    </div>
    
	<foreach name="output.rowOrder" item="v" >
	<!--
    	描述：订单记录开始
    -->
	<div  style="background:#FFF;border-bottom:1px solid #CCC;line-height:3rem;padding:0.5rem 0; font-size:13px;">
   		<div class="fs">{{$v.nickname}}</div>
        <div class="fs">{{$v.today}}</div>
        <div class="fs">{{$v.month}}</div>
        <div class="fs">{{$v.all}}</div>  	
        <div class="fs"><span data-url="/order/orderList?phone={{$v.phone}}" class="jump" style="color:#f24646;">详情</span> <span data-url="/Vip/Tui/index?phone={{$v.phone}}" class="jump" style=" color:#f24646;"">下级</span></div>  
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
	<div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
	<div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>


<script>
var page = 2;

function formatData(nickname, today, month, all, phone){
	var str = '';
	str = '<div  style="background:#FFF;border-bottom:1px solid #CCC;line-height:3rem;padding:0.5rem 0;">'+
   		'<div class="fs">'+nickname+'</div>'+
        '<div class="fs">'+today+'</div>'+
        '<div class="fs">'+month+'</div>'+
        '<div class="fs">'+all+'</div>'+ 	
		'<div class="fs"><span data-url="/order/orderList?phone='+phone+'" class="jump">详情</span> <span data-url="/Vip/Tui/index?phone='+phone+'" class="jump">下级</span></div>'+  
        '<div style="clear:both;"></div>'+
    '</div>';

    return str;
	
}

function pullupRefresh(){
	
	var data = {};
	data['page'] 	= page;
	data['openid']	= "{{$openid}}";
	var that = this;
	//post
	$.post('/Vip/Tui/index', data, function(response){

		page++;
				
		if(response.code == 11){
			//append
			for(var i=0;i<response.data.length;i++)
			{
				$('.warp').append(formatData(response.data[i]['nickname'], response.data[i]['today'], response.data[i]['month'], response.data[i]['all'], response.data[i]['phone']));
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