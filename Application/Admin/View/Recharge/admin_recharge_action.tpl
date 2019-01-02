<style>
    .input-group-addon

    {width:120px;text-align:right;}
</style>
<include file="menu"/>
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">到账处理</span>
        </div>
    </div>

    <!--button-box start-->
    <div class="line2"></div>
    <div class="line3"></div>

    <form action="" method="post" enctype="multipart/form-data"/>
    <input type="hidden" name="id" value="{{$output.recharge.id}}"/>
    <div class="pt20 pb20">

        <div class="row">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">用户手机号：</span>
                    <input type="text" name="phone" value="{{$output.recharge.phone}}" readonly class="form-control">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">付款账号名称：</span>
                    <input type="text" name="pay_account_name" value="{{$output.recharge.pay_account_name}}" readonly class="form-control">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">充值金额：</span>
                    <input type="text" name="money" value="{{$output.recharge.money}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">实际到账金额：</span>
                    <input type="text" name="rechargeMoney" value="{{$output.recharge.money}}" class="form-control">
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

    </form>

</div>
<!--button-box end-->

<!--分隔线 end-->
<!--right end-->
</div>
</div>
<!--main end -->

