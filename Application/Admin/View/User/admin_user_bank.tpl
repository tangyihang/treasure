<style>
.input-group-addon{width:120px;text-align:right;}
</style>
<include file="menu" />
<form action="" method="post" >
<input type="hidden" name="id" value="{{$output.id}}"  />
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

                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">手机号：</span>
                            <input type="text"  disabled="disabled" value="{{$output.phone}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户姓名：</span>
                            <input type="text" name="user_name" value="{{$output.user_name}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">开户银行：</span>
                            <input type="text" name="bank" value="{{$output.bank}}" class="form-control">
                           
                        </div>
                    </div>
                </div>
                
                 <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">银行账号：</span>
                            <input type="text" name="bank_num" value="{{$output.bank_num}}" class="form-control">
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


