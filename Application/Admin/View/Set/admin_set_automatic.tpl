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
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">自动下单设置--配置修改下期开战生效</span>
        </div>
    </div>

    <!--button-box start-->
    <div class="line2"></div>
    <div class="line3"></div>

    <form action="" method="post" enctype="multipart/form-data"/>

    <div class="pt20 pb20">

        <div class="row">
            <div class="col-lg-12">
                <div class="input-group input-group-sm" style="width:500px;">
                    <span class="input-group-addon">随机下单用户个数区间：</span>
                    <input type="text" name="user_bottom" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.user_bottom}}"> <span
                            style="float: left; padding:5px 10px;"> - </span>
                    <input type="text" name="user_top" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.user_top}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-top:10px;">
                <div class="input-group input-group-sm" style="width:500px;">
                    <span class="input-group-addon">用户订单个数随机区间：</span>
                    <input type="text" name="order_bottom" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.order_bottom}}"> <span
                            style="float: left; padding:5px 10px;"> - </span>
                    <input type="text" name="order_top" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.order_top}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-top:10px;">
                <div class="input-group input-group-sm" style="width:500px;">
                    <span class="input-group-addon">用户下单间隔时间随机区间：</span>
                    <input type="text" name="time_bottom" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.time_bottom}}"> <span
                            style="float: left; padding:5px 10px;"> - </span>
                    <input type="text" name="time_top" class="form-control" style="width:15%;"
                           value="{{$output.rowSet.time_top}}">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-lg-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">是否启用自动下单：</span>
                    <span style="float: left; padding:5px 10px;border: 1px solid #ccc;">
                        <eq name="output.rowSet.isstart" value="1">
                            <input name="isstart" type="radio" value="1" checked/> 启用
                            <input name="isstart" type="radio" value="2"/> 停用
                        </eq>
                        <eq name="output.rowSet.isstart" value="2">
                            <input name="isstart" type="radio" value="1"/> 启用
                            <input name="isstart" type="radio" value="2" checked/> 停用
                        </eq>
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
<script type="text/javascript">
  UE.getEditor('myEditor', {
    theme: "default", 		//皮肤
    lang: "zh-cn", 			//语言
    initialFrameWidth: 970,  //初始化编辑器宽度,默认800
    initialFrameHeight: 420
  });
</script>

