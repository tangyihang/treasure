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
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">设奖纪录</span>
        </div>
        <div class="col-lg-6 text-right"> <a href="<?php echo U('Admin/setAward/add');?>">
      <button type="button" class="btn btn-info btn-sm" >添加开奖结果</button>
      </a> </div>
      
    </div>

    <!--分隔线 start-->
    <div class="line2"></div>
    <div class="line3"></div>
    <!--分隔线 end-->

    <!--表格 start-->
    <div class="row pt20">
        <div class="col-lg-12">
            <table class="table table-striped bg-ff">
                <thead>
                <tr class="success">
                    <th>ID</th>
                    <th>第几期</th>
                    <th>开奖时间</th>
                    <th>1号</th>
                    <th>2号</th>
                    <th>3号</th>
                    <th>4号</th>
                    <th>5号</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($output['rowsOrder'])): $i = 0; $__LIST__ = $output['rowsOrder'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr <?php if(($mod) == "1"): ?>class="warning"<?php endif; ?> >
                    <td><?php echo ($o["id"]); ?></td>
                    <td><?php echo ($o["phase"]); ?></td>
                    <td><?php echo ($o["time_day"]); ?> <?php echo ($o["time_hour"]); ?>:<?php echo ($o["time_minute"]); ?></td>
                    <td><?php echo ($o["one"]); ?></td>
                    <td><?php echo ($o["two"]); ?></td>
                    <td><?php echo ($o["three"]); ?></td>
                    <td><?php echo ($o["four"]); ?></td>
                    <td><?php echo ($o["five"]); ?></td>
                    <td><?php echo ($o["time_post"]); ?></td>
                    <td><a href="/Admin/setAward/del/id/<?php echo ($o["id"]); ?>">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--表格 end-->
    <!--分页 start-->
    <div class="pages">
        <?php echo ($page); ?>
    </div>
    <!--分页 end-->
</div>
<!--right end-->
</div>
</div>
<!--main end -->
</body>
</html>