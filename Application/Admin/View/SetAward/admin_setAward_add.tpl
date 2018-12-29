<style>
.input-group-addon{width:120px;text-align:right;}
</style>
<include file="menu" />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">设置开奖结果</span>
        </div>
    </div>

   <!--button-box start-->
        <div class="line2"></div>
        
        <p style="margin-top:10px;">下一期 第：<span style="font-weight:800;color:#F00;font-size:18px;">{{$output.phase}}</span> 期 &nbsp;&nbsp;&nbsp;下期开奖时间：<span style="font-weight:800;color:#F00;font-size:18px;">{{$output.next.nextTime}}</span></p>
       
        <div class="line3"></div>
        
        <form action="" method="post" enctype="multipart/form-data" />
      
        <div class="pt20 pb20">
        
               
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div style="line-height:30px;">
                            <span>100元：</span>
                          
                          	 <label><input type="radio" name="cata_one" value="1" checked="checked" > 小</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;
                             <label><input type="radio" name="cata_one" value="2" > 大</label>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div style="line-height:30px;">
                            <span>50&nbsp;&nbsp;元：</span>
                          
                          	 <label><input type="radio" name="cata_two" value="1" checked="checked" > 小</label>
                             &nbsp;&nbsp;&nbsp;&nbsp;
                             <label><input type="radio" name="cata_two" value="2" > 大</label>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-5">
                        <div style="line-height:30px;">
                            <span>20&nbsp;&nbsp;元：</span>

                            <label><input type="radio" name="cata_three" value="1" checked="checked" > 奇</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="cata_three" value="2" > 偶</label>
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

