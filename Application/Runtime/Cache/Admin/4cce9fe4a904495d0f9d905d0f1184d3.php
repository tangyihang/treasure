<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/Public/Css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/Css/Admin/css.css" rel="stylesheet">
<link href="/Public/Css/jNotify.jquery.css" rel="stylesheet">
<link href="/Public/Css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="/Public/Js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="/Public/Js/bootstrap.min.js" type="text/javascript"></script>
<script src="/Public/Js/jNotify.jquery.js" type="text/javascript"></script>
<script src="/Public/Js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script src="/Public/qiniu_ueditor/ueditor.config.js"></script>
<script src="/Public/qiniu_ueditor/ueditor.all.min.js"></script>


<title>管理员后台</title>
</head>

<div class="header">
  <div class="container">
    <div class="row">
        <?php if(($adminid) == "2"): ?><div class="col-lg-2 pd0 logo" style="font-size:24px;color:#fff;text-align:center; font-weight:100;"><a href="/Admin/Order/read" style="color:#FFF;">夺宝<br/>零零柒</a></div><?php endif; ?>
        <?php if(($adminid) != "2"): ?><div class="col-lg-2 pd0 logo" style="font-size:24px;color:#fff;text-align:center; font-weight:100;"><a href="/Admin" style="color:#FFF;">夺宝<br/>零零柒</a></div><?php endif; ?>
      <div class="col-lg-10 pd0 menu"> 
        <!--menu start-->
        
        <div class="row pd0 lh40 mg0 text-center cf">
            <?php if(($adminid) == "2"): ?><div class="col-lg-1 pd0 menu-bk"><a href="/Admin/Order/read">管理员后台</a></div><?php endif; ?>
            <?php if(($adminid) != "2"): ?><div class="col-lg-1 pd0 menu-bk"><a href="/Admin">管理员后台</a></div><?php endif; ?>

        </div>
        <!--menu end--> 
        <!--当前位置 start-->
        <div class="row pl15 lh40 mg0 bg-ff c9"> <span class="glyphicon glyphicon-map-marker pr5"></span>管理员后台<img src="/Public/Images/Admin/icon3.png" align="absmiddle" class="pl5 pr5"> <?php echo ($position); ?></div>
        <!--当前位置 end--> 
      </div>
    </div>
  </div>
</div>
<!--header end--> 
<!--main start -->
<div class="container">
<div class="row">
<div class="col-lg-2 pd0 nav lh40">
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "a"): ?>navcur<?php endif; ?>"><a href="/Admin/Catagory/read"><span class="glyphicon glyphicon-list pr15 pl15"></span>夺宝分类</a></div>
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "b"): ?>navcur<?php endif; ?>"><a href="/Admin/Goods/read"><span class="glyphicon glyphicon-picture pr15 pl15"></span>夺宝产品</a></div>
	<div class="col-lg-12 pd0 nav-bk <?php if(($access) == "c"): ?>navcur<?php endif; ?>"><a href="/Admin/User/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>会员管理</a></div>
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "d"): ?>navcur<?php endif; ?>"><a href="/Admin/Order/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>订单记录</a></div>
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "f"): ?>navcur<?php endif; ?>"><a href="/Admin/reward/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>兑奖订单</a></div>
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "y"): ?>navcur<?php endif; ?>"><a href="/Admin/points/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>充值订单</a></div>
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "z"): ?>navcur<?php endif; ?>"><a href="/Admin/points/getOrder"><span class="glyphicon glyphicon-user pr15 pl15"></span>提现订单</a></div>
    
     <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "p"): ?>navcur<?php endif; ?>"><a href="/Admin/reward/all"><span class="glyphicon glyphicon-user pr15 pl15"></span>批量兑奖</a></div>
    <?php if(($adminid) != "2"): ?><div class="col-lg-12 pd0 nav-bk <?php if(($access) == "e"): ?>navcur<?php endif; ?>"><a href="/Admin/setAward/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>设奖记录</a></div><?php endif; ?>
  	<div class="col-lg-12 pd0 nav-bk <?php if(($access) == "g"): ?>navcur<?php endif; ?>"><a href="/Admin/Set/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>系统设置</a></div>
     <?php if(($adminid) != "2"): ?><div class="col-lg-12 pd0 nav-bk <?php if(($access) == "m"): ?>navcur<?php endif; ?>"><a href="/Admin/Member/pass_edit"><span class="glyphicon glyphicon-edit pr15 pl15"></span>修改密码</a></div><?php endif; ?>
   
    <div class="col-lg-12 pd0 nav-bk <?php if(($access) == "n"): ?>navcur<?php endif; ?>"><a href="/Admin/Member/logout"><span class="glyphicon glyphicon-arrow-left pr15 pl15"></span>退出</a></div>

    
    
</div>

<style>
.input-group-addon{width:120px;text-align:right;}
</style>

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
        
        <p style="margin-top:10px;">下一期 第：<span style="font-weight:800;color:#F00;font-size:18px;"><?php echo ($output["phase"]); ?></span> 期 &nbsp;&nbsp;&nbsp;下期开奖时间：<span style="font-weight:800;color:#F00;font-size:18px;"><?php echo ($output["next"]["nextTime"]); ?></span></p>
       
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


</body>
</html>