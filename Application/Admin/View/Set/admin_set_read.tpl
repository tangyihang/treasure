<style>
.input-group-addon{width:120px;text-align:right;}
</style>
<include file="menu" />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">系统设置</span>
        </div>
    </div>

   <!--button-box start-->
        <div class="line2"></div>
        <div class="line3"></div>
        
        <form action="" method="post" enctype="multipart/form-data" />
      
        <div class="pt20 pb20">
        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group input-group-sm" style="width:500px;">
                            <span class="input-group-addon">顶部滚动：</span>
                            <input type="text" name="tip_top" class="form-control" style="width:100%;" value="{{$output.rowSet.tip_top}}">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12"  style="margin-top:10px;">
                        <div class="input-group input-group-sm" style="width:500px;">
                            <span class="input-group-addon">中部滚动：</span>
                            <input type="text" name="tip_center" class="form-control" style="width:100%;" value="{{$output.rowSet.tip_center}}">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">微信客服名片：</span>
                            <input type="file" name="goods_img" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">夺宝规则：</span>
                            <script id="myEditor" name="rule" type="text/plain">{{$output.rowSet.rule}}</script>
                            
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
        theme:"default", 		//皮肤
        lang:"zh-cn", 			//语言
        initialFrameWidth:970,  //初始化编辑器宽度,默认800
        initialFrameHeight:420
    });
</script>

