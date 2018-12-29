<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body class="bg-gray">
<div class="container padding-bottom-5">
  <div class="row bg-gray" style="line-height:10rem;text-align: center;font-weight: 600;font-size:2.5rem;color:#FF6F02;">
      绑定成功
  </div>
  <form action="" method="post" id="ff">
  <div class="row">
    
     <div class="col-xs-12  line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">姓名</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="username" placeholder="请输入姓名" disabled="disabled" value="{{$rowUser.user_name}}" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">银行名称</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="bank" placeholder="请输入开户银行" disabled="disabled" value="{{$rowUser.bank}}" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

     <div class="col-xs-12 line-height-5 border-bottom" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0">卡号</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="bank_num" placeholder="请输入银行卡号" disabled="disabled" value="{{$rowUser.bank_num}}" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>



     <div class="padding-2">
          

        </div>

    
    
  </div>

  </form>
</div>

<div style="position:fixed;right:1rem;bottom:5rem;">
  <div><a href="/rank/look"><img src="/Public/Images/Home/shi.png" style="width:3rem;" ></a></div>
  <div><a href="/vip"><img src="/Public/Images/Home/vip.png" style="width:3rem;" ></a></div>
    <div><a href="/index"><img src="/Public/Images/Home/home.png" style="width:3rem;" ></a></div>
</div>


