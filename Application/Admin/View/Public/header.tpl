<!DOCTYPE html>
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
    <script src="__PUBLIC__/qiniu_ueditor/ueditor.config.js"></script>
    <script src="__PUBLIC__/qiniu_ueditor/ueditor.all.min.js"></script>


    <title>管理员后台</title>
</head>

<div class="header">
    <div class="container">
        <div class="row">
            <eq name="adminid" value="2">
                <div class="col-lg-2 pd0 logo" style="font-size:24px;color:#fff;text-align:center; font-weight:100;"><a
                            href="/Admin/Order/read" style="color:#FFF;">夺宝<br/>零零柒</a></div>
            </eq>
            <neq name="adminid" value="2">
                <div class="col-lg-2 pd0 logo" style="font-size:24px;color:#fff;text-align:center; font-weight:100;"><a
                            href="/Admin" style="color:#FFF;">夺宝<br/>零零柒</a></div>
            </neq>
            <div class="col-lg-10 pd0 menu">
                <!--menu start-->

                <div class="row pd0 lh40 mg0 text-center cf">
                    <eq name="adminid" value="2">
                        <div class="col-lg-1 pd0 menu-bk"><a href="/Admin/Order/read">管理员后台</a></div>
                    </eq>
                    <neq name="adminid" value="2">
                        <div class="col-lg-1 pd0 menu-bk"><a href="/Admin">管理员后台</a></div>
                    </neq>

                </div>
                <!--menu end-->
                <!--当前位置 start-->
                <div class="row pl15 lh40 mg0 bg-ff c9"><span
                            class="glyphicon glyphicon-map-marker pr5"></span>管理员后台<img
                            src="__PUBLIC__/Images/Admin/icon3.png" align="absmiddle" class="pl5 pr5"> {{$position}}
                </div>
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
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='a'>navcur</eq>"><a
                        href="/Admin/Catagory/read"><span class="glyphicon glyphicon-list pr15 pl15"></span>夺宝分类</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='b'>navcur</eq>">
                <a href="/Admin/Goods/read"><span class="glyphicon glyphicon-picture pr15 pl15"></span>夺宝产品</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='c'>navcur</eq>">
                <a href="/Admin/User/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>会员管理</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='d'>navcur</eq>">
                <a href="/Admin/Order/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>订单记录</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='f'>navcur</eq>">
                <a href="/Admin/reward/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>兑奖订单</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='q'>navcur</eq>">
                <a href="/Admin/Code/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>二维码设置</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='qc'>navcur</eq>">
                <a href="/Admin/recharge/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>二维码充值订单</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='y'>navcur</eq>">
                <a href="/Admin/points/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>充值订单</a>
            </div>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='z'>navcur</eq>">
                <a href="/Admin/points/getOrder"><span class="glyphicon glyphicon-user pr15 pl15"></span>提现订单</a>
            </div>

            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='p'>navcur</eq>">
                <a href="/Admin/reward/all"><span class="glyphicon glyphicon-user pr15 pl15"></span>批量兑奖</a>
            </div>
            <neq name="adminid" value="2">
                <div class="col-lg-12 pd0 nav-bk <eq name='access' value='e'>navcur</eq>">
                    <a href="/Admin/setAward/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>设奖记录</a>
                </div>
            </neq>
            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='g'>navcur</eq>">
                <a href="/Admin/Set/read"><span class="glyphicon glyphicon-user pr15 pl15"></span>系统设置</a>
            </div>
            <neq name="adminid" value="2">
                <div class="col-lg-12 pd0 nav-bk <eq name='access' value='m'>navcur</eq>">
                    <a href="/Admin/Member/pass_edit"><span class="glyphicon glyphicon-edit pr15 pl15"></span>修改密码</a>
                </div>
            </neq>

            <div class="col-lg-12 pd0 nav-bk <eq name='access' value='n'>navcur</eq>">
                <a href="/Admin/Member/logout"><span class="glyphicon glyphicon-arrow-left pr15 pl15"></span>退出</a>
            </div>


        </div>
