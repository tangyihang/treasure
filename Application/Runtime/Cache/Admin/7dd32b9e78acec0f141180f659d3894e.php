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

<!--right start-->
<div class="col-lg-10 pd0 pl20 right">

<div style="width:960px;line-height:50px;background:#090;color:#FFF;margin-top:50px;text-align:center;font-size:16px;">下一期：<?php echo ($output["award"]["phase"]); ?> 期 &nbsp;&nbsp;&nbsp;&nbsp;开奖时间：<?php echo ($output["next"]["nextDay"]); ?> <?php echo ($output["next"]["nextTime"]); ?></div>
   
<div style="float:left;">  
   <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;"><?php echo ($output['rowCata'][0]['name']); ?></div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买<?php echo ($output['rowCata'][0]['small']); ?> 共 <?php echo ($output['rowSum']['CataOneSmall']); ?> 元</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买<?php echo ($output['rowCata'][0]['big']); ?> 共 <?php echo ($output['rowSum']['CataOneBig']); ?> 元</div>
</div>

<div style="float:left;margin-left:30px;">
   <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;"><?php echo ($output['rowCata'][1]['name']); ?></div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买<?php echo ($output['rowCata'][1]['small']); ?> 共 <?php echo ($output['rowSum']['CataTwoSmall']); ?> 元</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买<?php echo ($output['rowCata'][1]['big']); ?> 共 <?php echo ($output['rowSum']['CataTwoBig']); ?> 元</div>
</div>
    <div style="float:left;margin-left:30px;">
        <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;"><?php echo ($output['rowCata'][2]['name']); ?></div>
        <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买<?php echo ($output['rowCata'][2]['small']); ?> 共 <?php echo ($output['rowSum']['CataThreeSmall']); ?> 元</div>
        <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买<?php echo ($output['rowCata'][2]['big']); ?> 共 <?php echo ($output['rowSum']['CataThreeBig']); ?> 元</div>
    </div>
<div style="clear:both"></div>
<!--统计开始-->
<div style="margin-top:20px;margin-left:-14px;">
<form action="" method="get">
            	
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">日期：</span>
                        <select name="type" class="form-control">
                        	<option value="0" <?php if(($type) == "0"): ?>selected<?php endif; ?> >起止时间</option>
                        	<option value="1" <?php if(($type) == "1"): ?>selected<?php endif; ?> >今日</option>
                            <option value="2" <?php if(($type) == "2"): ?>selected<?php endif; ?> >昨日</option>
                            <option value="3" <?php if(($type) == "3"): ?>selected<?php endif; ?> >7日</option>
                            <option value="4" <?php if(($type) == "4"): ?>selected<?php endif; ?> >30日</option>
                        </select>
                    </div>
                </div>
                
                
                  <div class="col-lg-3">
                	<div class="input-group input-group-sm" >
                        <span class="input-group-addon">开始时间：</span>
                        <input type="text"  id="datetimepicker" name="startime" value="<?php echo ($start); ?>" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">结束时间：</span>
                        <input type="text"  id="datetimepicker2" name="endtime" value="<?php echo ($end); ?>" class="form-control">
                    </div>
                </div>
                
                 <script>
					$('#datetimepicker').datetimepicker({
						format: 'yyyy-mm-dd hh:ii',
						language: 'zh-CN',
					});
					$('#datetimepicker2').datetimepicker({
						format: 'yyyy-mm-dd hh:ii',
						language: 'zh-CN',
					});
					
					
				</script>
                
                
                    <div class="col-lg-3">
                        <div class="input-group input-group-sm">
                            <input type="submit" value="查询" class="btn btn-info btn-sm"">
                        </div>
                    </div>
            </form>
<!--统计结束-->
 </div>
 <p style="height:40px;"></p>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">注册量：<?php echo ($output["zhuce"]); ?>人</div>
 <div style="display:inline-block;line-height:30px;background:#713EF0;color:#FFF;padding:10px 20px;">投注人数：<?php echo ($output["touzhu"]); ?>人</div><br/> <br/>
 
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">总购买额：<?php echo ($output["goumaie"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">总购买量：<?php echo ($output["goumail"]); ?>单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">总成功额：<?php echo ($output["suce"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">总成功量：<?php echo ($output["sucl"]); ?>单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">总失败额：<?php echo ($output["faile"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">总失败量：<?php echo ($output["faill"]); ?>单</div>
  <br/>
 <br/>
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">100元卡总购买额：<?php echo ($output["goumaie100"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">100元总购买量：<?php echo ($output["goumail100"]); ?>单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">100元总成功额：<?php echo ($output["suce100"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">100元总成功量：<?php echo ($output["sucl100"]); ?>单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">100元总失败额：<?php echo ($output["faile100"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">100元总失败量：<?php echo ($output["faill100"]); ?>单</div><br/>
 
 <br/>
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">50元卡总购买额：<?php echo ($output["goumaie50"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">50元总购买量：<?php echo ($output["goumail50"]); ?>单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">50元总成功额：<?php echo ($output["suce50"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">50元总成功量：<?php echo ($output["sucl50"]); ?>单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">50元总失败额：<?php echo ($output["faile50"]); ?>元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">50元总失败量：<?php echo ($output["faill50"]); ?>单</div><br/>
 
</div>
<!--right end-->





</div>





</div>
<!--main end -->
</body>
</html>