<style>
    .input-group-addon {
        width: 120px;
        text-align: right;
    }
</style>
<include file="menu"/>
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">添加二维码充值订单</span>
        </div>
    </div>

    <!--button-box start-->
    <div class="line2"></div>
    <div class="line3"></div>

    <form action="" method="post" enctype="multipart/form-data"/>

    <div class="pt20 pb20">

        <div class="row">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">用户手机号：</span>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">用户付款账号：</span>
                    <input type="text" name="pay_account_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">充值金额：</span>
                    <input type="text" name="money" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">到账账户：</span>
                    <select name="code_id" class="form-control">
                        <volist name="rowCodes" id="o">
                            <option value="{{$o.id}}">{{$o.account}}({{$o.name}})</option>
                        </volist>
                    </select>

                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">是否记入充值订单：</span>
                    <span style="float: left; padding:5px 10px;border: 1px solid #ccc;">
                        <input name="is_count_in" type="radio" value="1" checked/> 是
                        <input name="is_count_in" type="radio" value="2"/> 否
                    </span>
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

