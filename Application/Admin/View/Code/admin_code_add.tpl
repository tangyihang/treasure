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
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">添加充值转账二维码</span>
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
                    <span class="input-group-addon">名称：</span>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">收款账号：</span>
                    <input type="text" name="account" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">开户行：</span>
                    <input type="text" name="opening_bank" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">开户行网点：</span>
                    <input type="text" name="opening_bank_branch" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">二维码图片：</span>
                    <input type="file" name="code_img" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">所属分类：</span>
                    <select name="type" class="form-control">
                        <option value="0">微信</option>
                        <option value="1">支付宝</option>
                        <option value="2">银行卡</option>
                    </select>

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

