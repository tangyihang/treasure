<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body class="bg-gray">
<div class="container padding-bottom-5">
  <div class="row bg-gray height-17r">
   
  </div>
  <form action="" method="post" id="ff" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-12 bg-white line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">选择头像</div>
      <div class="col-xs-9 padding-0">
        <input type="file" name="goods_img"  class="form-input lidl" style="margin-top:2rem;">
      </div>
    </div>

    <div class="col-xs-12 bg-white line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">昵称</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="nickname" placeholder="请输入昵称" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>


     <div class="padding-2">
            <div  class="col-xs-12 text-center line-height-4 sub bg-blue white margin-top-3" id="reg">
                  提交
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



