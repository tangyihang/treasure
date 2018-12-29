<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/Public/Css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Css/Admin/css.css" rel="stylesheet">
    <link href="/Public/Css/jNotify.jquery.css" rel="stylesheet">
    <script src="/Public/Js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="/Public/Js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Public/Js/jNotify.jquery.js" type="text/javascript"></script>
    <title>管理员后台</title>
</head>
<body style="background:url(/Public/Images/Admin/bg1.png) repeat">
<div class="login-box">
    <div class="loginboxinner">
        <div class="text-center cor-green f24 line lh50">管理员后台</div>
        <h6 class="cf text-center pb40">登录</h6>

        <form action="" method="post" class="bs-example bs-example-form" role="form">
            <div class="input-group input-group-sm ty">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="member_name" type="text" class="form-control username" placeholder="请输入用户名">
            </div>
            <br>

            <div class="input-group input-group-sm ty">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input name="member_password" type="password" class="form-control" placeholder="请输入密码">
            </div>
            <br>
            
            <div class="input-group input-group-sm ty">
                <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                <input name="piccode" type="text" class="form-control" placeholder="请输入验证码" style="width:121px !important;">
                <img src="/admin/member/piccode" id="piccode"  width="95" onClick="change()" />
            </div>
            <br>

            <div class="ty">
                 <button type="submit" class="btn btn-danger btn-sm btn-block">登录</button>
            </div>

        </form>
    </div>
</div>
<script>
function change(){
	var rand = Math.random();
	$("#piccode").attr('src','/admin/member/piccode?'+rand);
}
</script>
</body>
</html>
