<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置密码</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/Public/Css/There/base.css">
</head>
<body>
<div style="background:#fff;width: 100%;height: 100%;text-align: center;position: fixed;top:0px;">
    <div style=" position: absolute; top: 40%;left: 50%;margin-left:-1.41rem;margin-top: -1.55rem; z-index: 30; font-size: .16rem;"
         class="interval-pop">
        <div style="border-radius:.05rem ; padding-top:.25rem ; width:2.82rem;height:2.51rem;background-color: #fff;"
             class="interval-pop-box">
            <p>
            <hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            <span style="padding:.05rem;font-size: .16rem;color: #999;">请设置查询密码</span>
            <hr style="width: .6rem;margin-right: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            </p>
            <span style="color: #f30;display:block;width:100%;height:.04rem;margin-top: .05rem; visibility: hidden;"
                  id="error">错误提醒</span>
            <input style="border: 1px #ccc solid;margin-top: .4rem;margin-bottom:.1rem;padding: 10px;"
                   id="payPassword_rsainput" type="password" autocomplete="off" required
                   value="" name="payPassword_rsainput" maxlength="6" minlength="6" aria-required="true"
                   placeholder="请输入六位密码">
            <input style="border: 1px #ccc solid;margin-bottom:.3rem;padding: 10px;"
                   id="payPassword_rsainput2" type="password" autocomplete="off" required
                   value="" name="payPassword_rsainput" maxlength="6" minlength="6" aria-required="true"
                   placeholder="请再次输入六位密码">
            <p>
            <hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            <span style="padding:.05rem;font-size: .16rem;color: #999;">{{$phone}}</span>
            <hr style="width: .6rem;margin-right: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            </p>

            <div style="width:100%;height:.4rem;line-height:.4rem;">
                <a style="display: inline-block; border-radius:.05rem; background: #db3652; color: #fff; height:.4rem; font-size:.18rem;border: none;width: 45%;margin: .01rem auto;"
                   href="javascript:;" onclick="register();">重置</a>
                <a style="display: inline-block; border-radius:.05rem; background: #db3652; color: #fff; height:.4rem; font-size:.18rem; border: none;width: 45%;margin: .01rem auto;"
                   href=" javascript:history.go(-1)">取消</a>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Js/jquery-2.1.4.min.js"></script>
<script src="/Public/Js/jquery-validate.js" type="text/javascript"></script>
<script>

  //提示信息
  $(".daoshou").click(function () {
    $(".tishixin").show();
    $(".to").css("margin-bottom", ".8rem");
  });
  //注册
  function register() {
    var pw1 = $("#payPassword_rsainput").val();
    var pw2 = $("#payPassword_rsainput2").val();
    if (pw1 == null || pw1.length < 6) {
      $("#error").html("密码输入错误");
      $("#error").css("visibility", "inherit");
      return;
    }

    if (pw2 == null || pw2.length < 6) {
      $("#error").html("密码输入错误");
      $("#error").css("visibility", "inherit");
      return;
    }

    if (pw2 != pw1) {
      $("#error").html("两次密码不同");
      $("#error").css("visibility", "inherit");
      return;
    }


    var parms = {
      "pwd": pw1
    };

    $.ajax({
      type: 'post',
      url: '/Vip/Snatch/setPwd',
      data: parms,
      dataType: 'json',
      success: function (data) {
        if (data.code == 11) {
          //注册成功
          window.location.href = "/vip/Snatch";
        } else {
          //注册失败
          $("#error").html(data.info);
          $("#error").css("visibility", "inherit");
        }
      },
      error: function (xhr, type) {
        alert('Ajax error!');
      }
    });
  }
</script>
</body>
</html>