<style>
.input-group-addon{width:120px;text-align:right;}
</style>
<include file="menu" />
<form action="" method="post" >
<input type="hidden" name="member_id" value="{{$output.member_id}}"  />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">编辑用户</span>
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
                            <input type="text" name="member_nickname" value="{{$output['member_nickname']}}" class="form-control">
                        </div>
                    </div>
                </div>
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">手机号：</span>
                            <input type="text"  disabled="disabled" value="{{$output.member_phone}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">密保问题：</span>
                            <select name="member_secret_question" id="member_secret_question" class="form-control" >
								<option <eq name="output.member_secret_question" value="您父亲的姓名是？">selected</eq> value="您父亲的姓名是？">您父亲的姓名是？</option>
								<option <eq name="output.member_secret_question" value="您母亲的姓名是？">selected</eq> value="您母亲的姓名是？">您母亲的姓名是？</option>
								<option <eq name="output.member_secret_question" value="您对象的生日是？">selected</eq> value="您对象的生日是？">您对象的生日是？</option>
								<option <eq name="output.member_secret_question" value="您班主任的姓名是？">selected</eq> value="您班主任的姓名是？">您班主任的姓名是？</option>
								<option <eq name="output.member_secret_question" value="您宠物的名字是？">selected</eq> value="您宠物的名字是？">您宠物的名字是？</option>
							</select>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">密保答案：</span>
                            <input type="text" name="member_secret_answer" value="{{$output.member_secret_answer}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                
               	 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">推荐人账号：</span>
                            <input type="text" name="member_parent" value="{{$output.member_parent_name}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户银行：</span>
                            <input type="text" name="member_bank" value="{{$output.member_bank}}" class="form-control">
                           
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">银行账号：</span>
                            <input type="text" name="member_bank_no" value="{{$output.member_bank_no}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户地址：</span>
                            <input type="text" name="member_bank_address" value="{{$output.member_bank_address}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户姓名：</span>
                            <input type="text" name="member_bank_account" value="{{$output.member_bank_account}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">支付宝帐号：</span>
                            <input type="text" name="member_alipay" value="{{$output.member_alipay}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">微信：</span>
                            <input type="text" name="member_wx" value="{{$output.member_wx}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">会员级别：</span>
                            <select name="member_type" class="form-control" >
								<option <eq name="output.member_type" value="10">selected</eq> value="10">普通会员</option>
                                <option <eq name="output.member_type" value="50">selected</eq> value="50">白金会员</option>
                                <option <eq name="output.member_type" value="60">selected</eq> value="60">黄金会员</option>
								<option <eq name="output.member_type" value="20">selected</eq> value="20">副主管</option>
								<option <eq name="output.member_type" value="30">selected</eq> value="30">主管</option>
                                <option <eq name="output.member_type" value="40">selected</eq> value="40">经理</option>
							</select>
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">备用上级昵称：</span>
                            <input type="text" name="spare_nickname" value="{{$output.spare_nickname}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">备用上级电话：</span>
                            <input type="text" name="spare_phone" value="{{$output.spare_phone}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">备注：</span>
                            <input type="text" name="mark" value="{{$output.mark}}" class="form-control">
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">会员状态：</span>
                            <select name="member_status" class="form-control" >
								<option <eq name="output.member_status" value="10">selected</eq> value="10">正常</option>
								<option <eq name="output.member_status" value="20">selected</eq> value="20">停止</option>
								<option <eq name="output.member_status" value="30">selected</eq> value="30">封禁</option>
						
							</select>
                        </div>
                    </div>
                </div>
                
                
                
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <input type="submit" id="reg" value="修改" class="btn btn-info btn-sm"">
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
    <!--button-box end-->
</form>  
    <!--分隔线 end-->
<!--right end-->
</div>
</div>
<!--main end -->


