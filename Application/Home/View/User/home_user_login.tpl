<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body style="background:url(__PUBLIC__/Images/Home/bg1.jpg) no-repeat;height:100%; background-size:100% auto;">
<div class="container">
  <div class="row" style="height: 28rem !important;" id="top_one">
   
  </div>
  
  <div class="row">
    <div class="col-xs-12 line-height-5 media1" style="line-height:5rem;font-size:13px !important;">
      <div class="col-xs-3 padding-0 aleft" style="padding-left:1.5rem; color:#333;font-size:13px !important;">手机号：</div>
      <div class="col-xs-9 padding-0">
        <input type="tel" name="member_phone" id="member_phone" placeholder="请输入联系电话" class="form-input lidl" style="font-size:13px !important; border:none;border-bottom: 1px #ccc solid; -webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0; background:none;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 media1" style="line-height:5rem;font-size:13px !important">
      <div class="col-xs-3 padding-0 aleft" style="padding-left:1.5rem; color:#333;font-size:13px !important;">密码：</div>
      <div class="col-xs-9 padding-0">
        <input type="password" name="password" id="password" placeholder="请输入密码" class="form-input lidl" style="font-size:13px !important; border:none; border-bottom: 1px #ccc solid;-webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0; background:none;">
      </div>
    </div>


     <div class="padding-2">
            <div  class="col-xs-12 text-center bg-yellow white margin-top-1" id="reg" style="font-size:13px; letter-spacing:0.5px; background:#f14646;line-height: 32px;">
                   登&nbsp;&nbsp;录
            </div>

	 		<div class="col-xs-12 text-center bg-yellow white margin-top-1" style="font-size:13px; letter-spacing:0.5px; background:#C9C9C9; line-height: 32px;">
        		<a href="/user/register" style="color:#fff;font-size:13px; display:block;">注&nbsp;&nbsp;册</a>
   			</div>

        </div>

    
    
  </div>
</div>

<style>
	.footer { display:none !important;}
</style>
<script>

</script>
<script>
function redi()
{
	window.location.href="/";
	}

$("#reg").click(function(){
		
		var member_phone 	= $("input[name='member_phone']").val();
		var password 			= $("input[name='password']").val();
		if(member_phone == ''){
			mui.alert('手机号不能为空', "提示", "确定");
			return false;	
		}
		
		if(password == ''){
			mui.alert('密码不能为空！', "提示", "确定");
			return false;
		}

		//ajax
		$.post("/user/login", {member_phone:member_phone,password:password},
			function(data){
				if(data.code == 11){
					mui.alert(data.info, "提示", "确定", redi());
					return;
				}else{
					mui.alert(data.info, "提示", "确定");
					return;
				}
			}
		);
		
	})
</script>
