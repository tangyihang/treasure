<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码验证</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/Public/Css/There/base.css">
</head>
<body>
<div class="nhead">
    <a class="nback" href="javascript:history.back(-1);"><img src="__PUBLIC__/Images/Tui/nback.png"> </a>
    <a class="nhome" href="/"><img src="__PUBLIC__/Images/Tui/nhome.png"></a>
    <div class="clear"></div>
</div>
<style>
    .nhead {
        width: 100%;
        height: 38px;
        background: #f24646;
        border-bottom: 1px #fff solid;
        position: relative;
        z-index: 99999;
    }

    .nback {width:36px; float:left;} .nback img {
        width: 30px;
        padding-top: 2px;
        margin-left: 6px;
    }

    .nhome {width:36px; float:right;} .nhome img {
        width: 30px;
        padding-top: 2px;
        margin-right: 6px;
    }
</style>
<div style="background: #fff;width: 100%;height: 100%;text-align: center;position: fixed;top:0px;">
    <div style=" position: absolute; top: 40%;left: 50%;margin-left:-1.41rem;margin-top: -1.55rem; z-index: 30; font-size: .16rem;"
         class="interval-pop">
        <div style="border-radius:.05rem ; padding-top:.25rem; width:2.82rem;height:2.51rem;background-color: #fff;"
             class="interval-pop-box">
            <p>
            <hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            <span style="padding:.05rem;font-size: .16rem;color: #999;">请输入查询密码</span>
            <hr style="width: .6rem;margin-right: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            </p>
            <span style="color: #f30;display:block;width:100%;height:.04rem;margin-top: .1rem; visibility: inherit;"
                  id="error"></span>
            <form style="text-align: center;margin-top:-.2rem;" method="post" action="/Vip/Snatch/login"
                  name="payPassword" id="form_paypsw">
                <input style="border: 1px #ccc solid;margin-top: .5rem;margin-bottom:.3rem;padding: 10px;"
                       id="payPassword_rsainput" type="password" autocomplete="off" required
                       value="" name="payPassword_rsainput" maxlength="6" minlength="6" aria-required="true"
                       placeholder="请输入六位密码">
                <div style="width: 100%;position: relative;height: .4rem;line-height: .4rem;">
                    <a href="/Vip/Snatch/repwd" style="display:inline-block;color:#999;position: absolute;right: 0rem;">
                        忘记密码！</a>
                </div>
                <a style="display:block;border-radius:.05rem; background: #f24646; color: #fff; height:.4rem;line-height:.4rem;font-size:.15rem;border: none;width: 90%;margin: .2rem auto;"
                   href="javascript:;" onclick="login();">确认</a>
            </form>
        </div>
    </div>
</div>

<script src="/Public/Js/jquery-1.11.1.min.js"></script>
<script src="/Public/Js/jquery-validate.js" type="text/javascript"></script>
<script>

  function login() {

    var pwd = $("#payPassword_rsainput").val();
    if (pwd == null || pwd.length < 6) {
      $("#error").html("密码位数错误");
      $("#error").show();
      return;
    }
    $("#form_paypsw").submit();

  }
</script>
</body>
</html>