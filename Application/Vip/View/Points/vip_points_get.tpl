<body>

<div class="mui-content">
	
    <div class="mui-row">
    	
    	<!--
         	顶部开始
        -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:5rem 2rem;">
          <input type="text" name="money" id="money" placeholder="请输入提现金额">
          <button type="button" class="mui-btn mui-btn-primary sub" style="width:100%;background:#f24646; border:none;">提交</button> 

          <p style="text-align: right;margin-top:1rem;"><a href="/vip/points/getlist">查看提现记录</a></p>
        </div>
        

     </div>
</div>




     
<script type="text/javascript">

$("#close3").click(function(){
  $("#wxshow").hide();
  mask.close();
})
  //pay
$(".sub").click(function(){

  var money = $("#money").val();
  if(money<20){
	mui.alert('提现金额不得少于20元！', "提示", "确定");
     return;
	}
  var that = this;
  mui(that).button('loading');
  $.post('/vip/points/submitget', {money:money}, function(response){


    mui.alert(response.info, "提示", "确定");
    mui(that).button('reset');

  },'json')


})



</script>
   
</body>