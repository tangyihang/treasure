<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">

<link href="/Public/Css/Home/base.css" rel="stylesheet"/>
<link href="/Public/Css/Home/order.css" rel="stylesheet"/>
<link href="/Public/Css/Home/product.css" rel="stylesheet"/>
<body style="background:url(__PUBLIC__/Images/Home/bg2.jpg) no-repeat;height:100%; background-size:100% auto;">
<div class="container padding-bottom-5">
  <div class="row" style="height:8rem;">
  </div>
  
  <div class="row">
    <div class="col-xs-12 line-height-5 media1" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0" style="color:#333;">手机号</div>
      <div class="col-xs-9 padding-0">
        <input type="tel" name="member_phone" id="member_phone" placeholder="请输入联系电话" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 media1" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0" style="color:#333;">登录密码</div>
      <div class="col-xs-9 padding-0">
        <input type="password" name="password1" id="password1" placeholder="请输入登录密码" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

    <div class="col-xs-12 line-height-5 media1" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0" style="color:#333;">重复密码</div>
      <div class="col-xs-9 padding-0">
        <input type="password" name="password2" id="password2" placeholder="请重复登录密码" class="form-input lidl" style="font-size:1rem !important;">
      </div>
    </div>

		<div class="col-xs-12 line-height-5 media1" style="line-height:6rem;font-size:1.2rem !important">
      <div class="col-xs-3 padding-0" style="color:#333;">邀请码</div>
      <div class="col-xs-9 padding-0">
        <input type="text" name="tui_phone" id="tui_phone" placeholder="请输入邀请码" class="form-input lidl" style="font-size:1rem !important;" value="{{$output.invite}}">
      </div>
    </div>

    
    <!-- <div class="col-xs-12 line-height-5 media1">
      <div class="col-xs-3 padding-0" style="color:#333;">短信验证码</div>
      <div class="col-xs-5 padding-0">
        <input type="tel" name="member_code" placeholder="输入短信验证码" class="form-input lidl" style="font-size:1rem !important;">
      </div>
      <div class="col-xs-4">
      	<input type="button" class="btn btn-info mediabtn" style="margin-top:1.2rem;" value="获取验证码"  onclick="sendMessage()" id="btnSendCode" />
      </div>
    </div> -->

     <div class="padding-2">
            <div  class="col-xs-12 text-center bg-yellow white margin-top-3" id="reg" style=" line-height: 32px;font-size:13px; letter-spacing:0.5px; background:#f14646;">
                   注&nbsp;&nbsp;册
            </div>
		 <div class="col-xs-12 text-center bg-yellow white margin-top-1" style="font-size:13px; letter-spacing:0.5px; background:#C9C9C9; line-height: 32px;">
			 <a href="/user/login" style="color:#fff;font-size:13px; letter-spacing:0.5px; display:block; line-height: 32px;">登&nbsp;&nbsp;录</a>
		 </div>
        </div>
    
  </div>
</div>
<style>
	.footer { display:none !important;}
</style>
<script>
function change(){
	var rand = Math.random();
	$("#piccode").attr('src','/user/piccode?'+rand);
}

</script>
<script>
function redi()
{
	window.location.href="/";
	}

$("#reg").click(function(){
		
		var member_phone 	= $("input[name='member_phone']").val();
		var member_code 	= $("input[name='member_code']").val();
		var password		= $("input[name='password1']").val();
		var password2		= $("input[name='password2']").val();
		var tui_phone	 = $("input[name='tui_phone']").val();


		if(member_phone == ''){
			mui.alert('手机号不能为空', "提示", "确定");
			return false;	
		}
		
		if(member_code == ''){
			mui.alert('验证码不能为空！', "提示", "确定");
			return false;
		}

		if(password == '')
		{
			mui.alert('密码不能为空！', "提示", "确定");
			return false;	
		}
		
		if(password != password2)
		{
			mui.alert('两次密码不同！', "提示", "确定");
			return false;	
		}

		//ajax
		$.post("/user/register", {member_phone:member_phone,member_code:member_code,password:password,tui_phone:tui_phone},
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
<script>

var InterValObj; //timer变量，控制时间
var count = 120; //间隔函数，1秒执行
var curCount;//当前剩余秒数
var time = new Date().getTime();
var lastSend = getCookie('sendTime');
var leaveTime   = Math.ceil((time - lastSend)/1000);
clearInterval(InterValObj);
curCount = 120 - leaveTime;
	if(curCount > 1){
		$("#btnSendCode").attr("disabled", "true");
		$("#btnSendCode").removeClass('btn_active');
		 InterValObj = window.setInterval(SetRemainTime, 1000);	
	}
	//从cookie中读取	
 
	
  function SetRemainTime() {
            if (curCount == 0) {                
                window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode").removeAttr("disabled");//启用按钮
                $("#btnSendCode").val("重新获取验证码");
				$("#btnSendCode").addClass('btn_active');
            }
            else {
                curCount--;
				$("#btnSendCode").removeClass('btn_active');
                $("#btnSendCode").val(curCount + "秒后重新获取");
            }
        }

	function sendMessage() {
		   //验证手机号码为空
		   var phone = $("#member_phone").val();
			
		   //判断验图形验证码否正确
		   var picCode = $("#pic_code").val();
		   
		   if(picCode == ''){
				mui.alert('图形验证码不能为空！', "提示", "确定");
				return;   
		   }
		   //cookie最新时间
		     $.ajax({
		   type: "POST", //用POST方式传输
		   url: '/User/code', //目标地址
		   data: "phone=" + phone + '&' + "piccode=" + picCode,
		   success: function (msg){
				//正确
				if(msg.code == 11){
					mui.alert(msg.info, "提示", "确定")
					time = new Date().getTime();
		   			document.cookie  = 'sendTime='+ time;
					//设置button效果，开始计时
					curCount = count;
					$("#btnSendCode").attr("disabled", "true");
					$("#btnSendCode").val(curCount + "秒后重新获取");
					InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
					return false;	
				}else{
					if(msg.code == 6){
						$("#piccode").attr('src','/user/piccode');		
					}
					mui.alert(msg.info, "提示", "确定");
				}
				
			    }
		     });
		}
		
		
	
	//获取cookie
	function getCookie(c_name){
　　　　if (document.cookie.length>0){
　　　　　　c_start=document.cookie.indexOf(c_name + "=")　　　
　　　　　　if (c_start!=-1){ 
　　　　　　　　c_start=c_start + c_name.length+1　
　　　　　　　　c_end=document.cookie.indexOf(";",c_start)　　
　　　　　　　　if (c_end==-1) c_end=document.cookie.length　　
　　　　　　　　return unescape(document.cookie.substring(c_start,c_end))
　　　　　　} 
　　　　}
　　　　return ""
　　}
		  

</script>