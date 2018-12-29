<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body class="bg-gray">
<div class="container padding-bottom-5">
  <div class="row bg-gray" style="line-height:8rem;text-align: center;font-weight: 600;font-size:2.5rem;color:#f24646;">
   		绑定储蓄卡
  </div>
  <form action="" method="post" id="ff">
  <div class="row">
    
     <div class="col-xs-12 line-height-5 border-bottom" style="line-height:5rem;font-size:1.2rem !important">
      <div class="col-xs-12 padding-0">
        <input type="text" name="username" placeholder="请输入姓名" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 border-bottom" style="line-height:5rem;font-size:1.2rem !important">
      <div class="col-xs-12 padding-0">
        <input type="text" name="bank" placeholder="请输入开户银行" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

     <div class="col-xs-12  line-height-5 border-bottom" style="line-height:5rem;font-size:1.2rem !important">
      <div class="col-xs-12 padding-0">
        <input type="text" name="bank_num" placeholder="请输入银行卡号" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 border-bottom" style="line-height:5rem;font-size:1.2rem !important">
      <div class="col-xs-12 padding-0">
        <input type="text" name="bank_num_2" placeholder="请再次输入银行卡号" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>


     <div style="width:90%;  margin:0 auto;">
            <div  class="col-xs-12 text-center line-height-4 sub white margin-top-3" style="background: #f24646; margin-bottom:2rem" id="reg">
                  提交
            </div>
            <div style="line-height:1.8rem;">
			*支持银行：<br/>招商银行、工商银行、建设银行、农业银行、中国银行、邮政储蓄、中信银行、光大银行、民生银行、平安银行、兴业银行、广发银行、交通银行、华夏银行
			</div>
            

        </div>

    
    
  </div>

  </form>
</div>



<script>
$(".sub").click(function(){

	$("#ff").submit();
})	

</script>



