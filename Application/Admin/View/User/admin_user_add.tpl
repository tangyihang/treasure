<style>
.input-group-addon{width:120px;text-align:right;}
</style>
<include file="menu" />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">添加用户</span>
        </div>
    </div>

   <!--button-box start-->
        <div class="line2"></div>
        <div class="line3"></div>
        <div class="pt20 pb20">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">昵称：</span>
                            <input type="text" name="member_nickname" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">激活码：</span>
                            <input type="text" name="code" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">登入密码：</span>
                            <input type="password" name="member_pwd_1"  class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">确认登入密码：</span>
                            <input type="password" name="member_pwd_2"  class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">密保问题：</span>
                            <select name="member_secret_question" id="member_secret_question" class="form-control" >
								<option value="" selected="selected">请选择密保问题</option>
								<option value="您父亲的姓名是？">您父亲的姓名是？</option>
								<option value="您母亲的姓名是？">您母亲的姓名是？</option>
								<option value="您对象的生日是？">您对象的生日是？</option>
								<option value="您班主任的姓名是？">您班主任的姓名是？</option>
								<option value="您宠物的名字是？">您宠物的名字是？</option>
							</select>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">密保答案：</span>
                            <input type="text" name="member_secret_answer" class="form-control">
                        </div>
                    </div>
                </div>
                
               	 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">推荐人账号：</span>
                            <input type="text" name="member_parent" class="form-control">
                        </div>
                    </div>
                </div>
                
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                    <div class="input-group input-group-sm">
                     	<span class="input-group-addon">开户行：</span>
                         <input type="text" name="member_bank" class="form-control" id="member_bank">  
                     </div> 
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">银行账号：</span>
                            <input type="text" name="member_bank_no" class="form-control">
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户地址：</span>
                            <input type="text" name="member_bank_address" class="form-control">
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户姓名：</span>
                            <input type="text" name="member_bank_account" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">支付宝帐号：</span>
                            <input type="text" name="member_alipay" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">微信：</span>
                            <input type="text" name="member_wx" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">手机号：</span>
                            <input type="text" name="member_phone" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">备用上级昵称：</span>
                            <input type="text" name="spare_nickname" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">备用上级电话：</span>
                            <input type="text" name="spare_phone" class="form-control">
                        </div>
                    </div>
                </div>
                
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <input type="submit" id="reg" value="提交" class="btn btn-info btn-sm"">
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
    <!--button-box end-->
    
    <!--分隔线 end-->
<!--right end-->
</div>
</div>
<!--main end -->
<script>
	$(document).ready(function() {
		//注册认证
		$("#reg").click(function(){
			var member_name 				= $('input[name="member_name"]').val();
			var code 						= $('input[name="code"]').val();
			var member_nickname				= $('input[name="member_nickname"]').val();
			var member_parent 				= $('input[name="member_parent"]').val();
			var member_pwd_1 				= $('input[name="member_pwd_1"]').val();
			var member_pwd_2 				= $('input[name="member_pwd_2"]').val();
			var member_secret_question		= $("#member_secret_question").val();
			var member_secret_answer		= $('input[name="member_secret_answer"]').val();
			var member_wx 					= $('input[name="member_wx"]').val();
			var member_alipay 				= $('input[name="member_alipay"]').val();
			var member_bank			 		= $('#member_bank').val();
			var member_bank_account 		= $('input[name="member_bank_account"]').val();
			var member_bank_address 		= $('input[name="member_bank_address"]').val();
			var member_bank_no 				= $('input[name="member_bank_no"]').val();
			var member_phone 				= $('input[name="member_phone"]').val();
			var messageCode					= $('input[name="messageCode"]').val();
			var pattern 					= new RegExp("[~'! @#$%^&*()-+=:]"); 
			
			if(member_name == ''){
				jError('用户名不能为空');
				return;		
			}
			if(member_nickname == ''){
				jError('用户昵称不能为空');
				return;		
			}
			if(code == ''){
				jError('激活码不能为空');
				return;		
			}
			

			if(pattern.test(member_name)){
				jError('用户名不能包含非法字符');
				return;		
			}
			if(member_pwd_1 == '' || member_pwd_2 == ''){
				jError('登录密码不能为空');
				return;		
			}
			if(member_pwd_1 != member_pwd_2){
				jError('两次输入的登录密码不一致');
				return;	
			}
			if(member_pwd_1.length < 6 || member_pwd_1.length >16){
				jError('登录密码必须6-16位');
				return;		
			}
			
			if(member_secret_question == ''){
				jError('密保问题不能为空！');
				return;		
			}
			if(member_secret_answer == ''){
				jError('密保答案不能为空！');
				return;		
			}
			
			if(member_wx == '' && member_alipay == '' && member_bank_no == '' ){
				jError('微信、支付宝或银行卡必须填写一项为收款账户！');
				return;			
			}
			if(member_phone == ''){
				jError('手机号码不能为空！');
				return;	
			}

			
	
			//验证通过表单提交
			$.post("/Admin/User/add", { member_name:member_name,code:code,member_nickname:member_nickname,member_parent:member_parent,member_pwd:member_pwd_1,member_secret_question:member_secret_question,member_secret_answer:member_secret_answer,member_wx:member_wx,member_alipay:member_alipay,member_bank:member_bank,member_bank_no:member_bank_no,member_bank_account:member_bank_account,member_bank_address:member_bank_address,member_phone:member_phone},
			  function(data){
				if(data.code == 21){
					jSuccess(data.info);

				}else{
					jError(data.info);	
				}
			});
			
			
			
		
		})
		
		
	});
	
</script>

