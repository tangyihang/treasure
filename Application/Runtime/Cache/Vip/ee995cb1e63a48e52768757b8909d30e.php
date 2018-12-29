<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置密码</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
     <link rel="stylesheet" href="/Public/Css/There/base.css">
      <style>
    .outer{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction:column;
        -webkit-box-orient:vertical;
        box-orient:vertical;
        -webkit-flex-direction:column;
        flex-direction:column;
        font-size: .12rem;
    }
     .header{
        position: relative;
        height: .76rem;
        overflow: hidden;
        /*border-bottom: 1px solid #ccc;
        background-color: #f6f6f6;
        padding-top: .11rem;*/
    } 
    .inner{
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        /*background-color: #fff;*/
        overflow-y: scroll;
        -webkit-overflow-scrolling: touch;
    }
    .dropload-down {
        padding-bottom: 42px;
        width: 100%;
    }
    
    
    /*验证*/
   .clearfix:after {
    clear: both;
}
.clearfix:before, .clearfix:after {
    content: " ";
    display: table;
}
 .alieditContainer{
        position: relative;
    } 
    
.sixDigitPassword {
    position: absolute;
    left: -122px;
    top: 0;   
    width: 1000px;
    height: 26px;  
    color: #fff;
    font-size: 12px;
    -webkit-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-user-select: initial;
    outline: 'none';
    z-index: 999;
    opacity:0;
    filter:alpha(opacity=0);
  }

  .sixDigitPassword-box {
      
        cursor:text;
        background: #fff;
        outline: none;
        position: relative;
        padding: 8px 0;
        height: 15px;
        border: 1px solid #cccccc;
        border-radius: 2px;
  }
  .sixDigitPassword-box i {
        float: left;
        display: block;
        padding: 4px 0;
        height: 7px;
        border-left: 1px solid #cccccc;
    }
   .sixDigitPassword-box .active {
        background: url('/Public/Images/Vip/password-blink.gif') no-repeat center center;        
    }
   .sixDigitPassword-box b {
        display: block;
        margin: 0 auto;
        width: 7px;
        height: 7px;
        overflow: hidden;
        visibility:hidden;
        background: url('/Public/Images/Vip/passeord-dot.png') no-repeat;
    }
  .sixDigitPassword-box span {
        position: absolute;
        display: block;
        left: 0px;
        top: 0px;
        height: 30px;
        border: 1px solid rgba(82, 168, 236, .8);
        border: 1px solid #00ffff\9;
        border-radius: 2px;
        visibility: hidden;
        -webkit-box-shadow: inset 0px 2px 2px rgba(0, 0, 0, 0.75), 0 0 8px rgba(82, 168, 236, 0.6);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    }
    .ui-securitycore  .ui-form-item .ui-form-explain{
		margin-top: 8px; 
	}
  .i-block{
	display:inline-block;
  }
 .six-password{
    position: relative;
    height:33px;
    width:182px;
    overflow: hidden;
    vertical-align: middle;
    
}
    </style>
</head>
<body>
	<div style="background:#fff;width: 100%;height: 100%;text-align: center;position: fixed;top:0px;">
       <div style=" position: absolute; top: 40%;left: 50%;margin-left:-1.41rem;margin-top: -1.55rem; z-index: 30; font-size: .16rem;" class="interval-pop">
        <div style="border-radius:.05rem ; padding-top:.25rem ; width:2.82rem;height:2.51rem;background-color: #fff;" class="interval-pop-box">
        	<p>
	        	<hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
	           	<span style="padding:.05rem;font-size: .16rem;color: #999;">请设置查询密码</span>
	          	<hr style="width: .6rem;margin-right: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
          	</p> 
          		 <span style="color: #f30;display:block;width:100%;height:.04rem;margin-top: .05rem; visibility: hidden;" id="error">错误提醒</span>
          		 
				<div id="payPassword_container" class="alieditContainer clearfix" data-busy="0">
					<div style="display: inline-block;" class="i-block" data-error="i_error">
						<div style="margin-top: .3rem">
							<label style="display: inline-block;" for="i_payPassword" class="i-block"></label>
							<div class="i-block six-password">
								<input style="width:1000px; left:-800px;" class="i-text sixDigitPassword" id="payPassword_rsainput" type="tel" autocomplete="off" required value="" name="payPassword_rsainput" data-role="sixDigitPassword" tabindex="" maxlength="12"  aria-required="true">
								<div tabindex="0" class="sixDigitPassword-box" style="width: 180px;">
									<i style="width: 29px; border-color: transparent;" class=""><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<span style="width: 29px; left: 0px; visibility: hidden;" id="cardwrap" data-role="cardwrap"></span>
								</div>
							</div>
						</div>
						<span style="padding:.05rem; display: block;font-size: .16rem;color: #999;">请在此输入</span>
						<div style="margin-bottom:.1rem;"> 
							<label style="display: inline-block;" for="i_payPassword" class="i-block"></label>
							<div class="i-block six-password">
								<div tabindex="0" class="sixDigitPassword-box" style="width: 180px;">
									<i style="width: 29px; border-color: transparent;" class=""><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<i style="width: 29px;"><b style="visibility: hidden;"></b></i>
									<span style="width: 29px; left: 0px; visibility: hidden;" id="cardwrap" data-role="cardwrap"></span>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<p>
	        	<hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
	           	<span style="padding:.05rem;font-size: .16rem;color: #999;"><?php echo ($phone); ?></span>
	          	<hr style="width: .6rem;margin-right: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
          		</p> 
				
           		<div style="width:100%;height:.4rem;line-height:.4rem;">
					<a style="display: inline-block; border-radius:.05rem; background: #db3652; color: #fff; height:.4rem; font-size:.18rem;border: none;width: 45%;margin: .01rem auto;" href="javascript:;" onclick="register();">重置</a>
					<a style="display: inline-block; border-radius:.05rem; background: #db3652; color: #fff; height:.4rem; font-size:.18rem; border: none;width: 45%;margin: .01rem auto;" href=" javascript:history.go(-1)" >取消</a>
       			</div>
       </div> 
    </div>
    </div>
    <script src="/Public/Js/jquery-1.11.1.min.js"></script>
    <script src="/Public/Js/jquery-validate.js" type="text/javascript"></script> 
    <script>
    
    //提示信息
    $(".daoshou").click(function(){
    		$(".tishixin").show();
    		$(".to").css("margin-bottom",".8rem");
    	});
    //注册	
  function register(){
    var pw=$("#payPassword_rsainput").val();
    var pw1=pw.substring(0,6);
    var pw2=pw.substring(6,12);
    if(pw1==null||pw1.length<6){
      $("#error").html("密码输入错误");
      $("#error").css("visibility","inherit");
      return;
    }
    
    if(pw2==null||pw2.length<6){
      $("#error").html("密码输入错误");
      $("#error").css("visibility","inherit");
       return;
    }
    
    if(pw2!=pw1){
      $("#error").html("两次密码不同");
      $("#error").css("visibility","inherit");
       return;
    }
    
   
     var parms={
      "pwd":pw1
     };
     
     $.ajax({
      	   type: 'post',
           url: '/Vip/Snatch/setPwd',
           data : parms,
           dataType: 'json',
          success: function(data){
              if(data.code==11){
              	//注册成功
              	window.location.href="/vip/Snatch";
              }else{
              	//注册失败
              	 $("#error").html(data.info);
                 $("#error").css("visibility","inherit");
              }
          },
          error: function(xhr, type){
              alert('Ajax error!');
          }
      });
    }
    
   function code(type,smsType){
	    this.type=type;
	    this.smsType=smsType;
	}
	
    function getY(){
    	
	    	var pw=$("#payPassword_rsainput").val();
	        var pw1=pw.substring(0,6);
	        var pw2=pw.substring(6,12);
	        if(pw1==null||pw1.length<6){
	          $("#error").html("密码不能为空");
              $("#error").css("visibility","inherit");
	          return;
	        }
			
			 if(pw1 != pw2){
	          $("#error").html("两次输入密码不同");
              $("#error").css("visibility","inherit");
	          return;
	        }
	        
	        if(pw2==null||pw2.length<6){
	          $("#error").html("密码不能为空");
              $("#error").css("visibility","inherit");
	           return;
	        }
    	
            $('.daoshou').attr('onclick','');
            var timer = null;
            var second = 60;
            // $('.modT-yzm').addClass('modT-yzm-time');
            
            timer = setInterval(function(){
                $('.daoshou').html(''+second+'秒后重发');
                second--;
                if (second < 0) {
                    $('.daoshou').html('获取验证码');
                    clearInterval(timer);
                    timer = null;
                    second = 60;
                    $('.daoshou').attr('onclick','getY()');
                };
            },1000);
            
			$.post('/Vip/Snatch/code', function(data){
				
        		$('.daoshou').html('获取验证码');
                clearInterval(timer);
                timer = null;
                second = 60;
                $('.daoshou').attr('onclick','getY()'); 
                $("#error").html(data.info);
                $("#error").css("visibility","inherit");
				
			
		
			}, 'json')
	
	
	  				
           
        }


	//验证码1
	var payPassword = $("#payPassword_container"),
    _this = payPassword.find('i'),	

	k=0,j=0,
	password = '' ,
	_cardwrap = $('#cardwrap');
	//点击隐藏的input密码框,在6个显示的密码框的第一个框显示光标
	payPassword.on('focus',"input[name='payPassword_rsainput']",function(){
	
		var _this = payPassword.find('i');
		if(payPassword.attr('data-busy') === '0'){ 
		//在第一个密码框中添加光标样式
		   _this.eq(k).addClass("active");
		   _cardwrap.css('visibility','visible');
		   payPassword.attr('data-busy','1');
		}
		
	});	
	
	//change时去除输入框的高亮，用户再次输入密码时需再次点击
	payPassword.on('change',"input[name='payPassword_rsainput']",function(){
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");
		payPassword.attr('data-busy','0');
	}).on('blur',"input[name='payPassword_rsainput']",function(){
		
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");					
		payPassword.attr('data-busy','0');
		
	});
	
	//使用keyup事件，绑定键盘上的数字按键和backspace按键
	payPassword.on('keyup',"input[name='payPassword_rsainput']",function(e){
	
	var  e = (e) ? e : window.event;
	
	//键盘上的数字键按下才可以输入
	if(e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)){
			k = this.value.length;//输入框里面的密码长度
			l = _this.size();//6
			
			for(;l--;){
			
			//输入到第几个密码框，第几个密码框就显示高亮和光标（在输入框内有2个数字密码，第三个密码框要显示高亮和光标，之前的显示黑点后面的显示空白，输入和删除都一样）
				if(l === k){
					_this.eq(l).addClass("active");
					_this.eq(l).find('b').css('visibility','hidden');
					
				}else{
					_this.eq(l).removeClass("active");
					_this.eq(l).find('b').css('visibility', l < k ? 'visible' : 'hidden');
				}				
			
			if(k === 12){
				j = 5;
			}else{
				j = k;
			}
			$('#cardwrap').css('left',j*30+'px');
		
			}
		}else{
		//输入其他字符，直接清空
			var _val = this.value;
			this.value = _val.replace(/\D/g,'');
		}
	});	
	
	
	//验证码2
	var payPassword = $("#payPassword_container"),
    _this = payPassword.find('i'),	
	k=0,j=0,
	password = '' ,
	_cardwrap = $('#cardwrap');
	//点击隐藏的input密码框,在6个显示的密码框的第一个框显示光标
	payPassword.on('focus',"input[name='payPassword_rsainput']",function(){
	
		var _this = payPassword.find('i');
		if(payPassword.attr('data-busy') === '0'){ 
		//在第一个密码框中添加光标样式
		   _this.eq(k).addClass("active");
		   _cardwrap.css('visibility','visible');
		   payPassword.attr('data-busy','1');
		}
		
	});	
	//change时去除输入框的高亮，用户再次输入密码时需再次点击
	payPassword.on('change',"input[name='payPassword_rsainput']",function(){
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");
		payPassword.attr('data-busy','0');
	}).on('blur',"input[name='payPassword_rsainput']",function(){
		
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");					
		payPassword.attr('data-busy','0');
		
	});
	
	//使用keyup事件，绑定键盘上的数字按键和backspace按键
	payPassword.on('keyup',"input[name='payPassword_rsainput']",function(e){
	
	var  e = (e) ? e : window.event;
	
	//键盘上的数字键按下才可以输入
	if(e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)){
			k = this.value.length;//输入框里面的密码长度
			l = _this.size();//6
			
			for(;l--;){
			
			//输入到第几个密码框，第几个密码框就显示高亮和光标（在输入框内有2个数字密码，第三个密码框要显示高亮和光标，之前的显示黑点后面的显示空白，输入和删除都一样）
				if(l === k){
					_this.eq(l).addClass("active");
					_this.eq(l).find('b').css('visibility','hidden');
					
				}else{
					_this.eq(l).removeClass("active");
					_this.eq(l).find('b').css('visibility', l < k ? 'visible' : 'hidden');
				}				
			
			if(k === 12){
				j = 5;
			}else{
				j = k;
			}
			$('#cardwrap').css('left',j*30+'px');
		
			}
		}else{
		//输入其他字符，直接清空
			var _val = this.value;
			this.value = _val.replace(/\D/g,'');
		}
	});	
    </script>
</body>
</html>