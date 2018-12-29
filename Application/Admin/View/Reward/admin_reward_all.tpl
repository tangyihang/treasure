<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">批量兑奖订单</span>
        </div>
   </div>


    <!--分隔线 start-->
    <div class="line2"></div>
    <div class="line3"></div>
    <!--分隔线 end-->
    <div class="row pt20">
     
     </div>

    <!--表格 start-->
    <div class="row pt20">
    
    
        <div class="col-lg-12">
       		<textarea class="form-control" id="all" placeholder="请粘贴兑奖码"></textarea>   
        </div>
        
        <div class="col-lg-12 text-center" style="margin-top:20px;">
       		<button type="button" id="jisuan" class="btn btn-primary">计算总额</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="shenhe" class="btn btn-success">批量兑换</button>
        </div>
        
    </div>
    <!--表格 end-->
  
</div>
<!--right end-->
</div>
</div>
<!--main end -->

<script>

$("#jisuan").click(function(){
	
	var all = $("#all").val();
	
	$.post('/Admin/Reward/jisuan',{all:all},function(data){
		alert(data);	
	});
	
})

$("#shenhe").click(function(){
	
	var all = $("#all").val();
	
	$.post('/Admin/Reward/shenhe',{all:all},function(data){
		alert(data);	
	});
	
})

</script>
