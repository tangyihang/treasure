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
<div style="background:#fff;width: 100%;height: 100%;text-align: center;position: fixed;top:0px;">
    <div style=" position: absolute; top: 40%;left: 50%;margin-left:-1.41rem;margin-top: -1.55rem; z-index: 30; font-size: .16rem;"
         class="interval-pop">
        <div style="border-radius:.05rem ; padding-top:.25rem ; width:2.82rem;height:2.51rem;background-color: #fff;"
             class="interval-pop-box">
            <p>
            <hr style="width: .6rem;margin-left: .1rem;display: inline-block;height: .01rem;border: none;border-bottom:1px solid #eee;"/>
            <span style="padding:.05rem;font-size: .15rem;color: #999;">请设置查询密码</span>
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
                <a style="display: inline-block; border-radius:.05rem; background: #f24646; color: #fff; height:.4rem; font-size:.15rem;border: none;width: 45%;margin: .01rem auto;"
                   href="javascript:;" onclick="register();">确认</a>
                <a style="display: inline-block; border-radius:.05rem; background: #f24646; color: #fff; height:.4rem; font-size:.15rem; border: none;width: 45%;margin: .01rem auto;"
                   href="">重置</a>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Js/jquery-1.11.1.min.js"></script>
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

  function code(type, smsType) {
    this.type = type;
    this.smsType = smsType;
  }

  function getY() {

    var pw = $("#payPassword_rsainput").val();
    var pw1 = pw.substring(0, 6);
    var pw2 = pw.substring(6, 12);
    if (pw1 == null || pw1.length < 6) {
      $("#error").html("密码不能为空");
      $("#error").css("visibility", "inherit");
      return;
    }

    if (pw1 != pw2) {
      $("#error").html("两次输入密码不同");
      $("#error").css("visibility", "inherit");
      return;
    }

    if (pw2 == null || pw2.length < 6) {
      $("#error").html("密码不能为空");
      $("#error").css("visibility", "inherit");
      return;
    }

  }


  //验证码1
  var payPassword = $("#payPassword_container"),
    _this = payPassword.find('i'),
    k = 0, j = 0,
    password = '',
    _cardwrap = $('#cardwrap');
  //点击隐藏的input密码框,在6个显示的密码框的第一个框显示光标
  payPassword.on('focus', "input[name='payPassword_rsainput']", function () {

    var _this = payPassword.find('i');
    if (payPassword.attr('data-busy') === '0') {
      //在第一个密码框中添加光标样式
      _this.eq(k).addClass("active");
      _cardwrap.css('visibility', 'visible');
      payPassword.attr('data-busy', '1');
    }

  });

  //change时去除输入框的高亮，用户再次输入密码时需再次点击
  payPassword.on('change', "input[name='payPassword_rsainput']", function () {
    _cardwrap.css('visibility', 'hidden');
    _this.eq(k).removeClass("active");
    payPassword.attr('data-busy', '0');
  }).on('blur', "input[name='payPassword_rsainput']", function () {

    _cardwrap.css('visibility', 'hidden');
    _this.eq(k).removeClass("active");
    payPassword.attr('data-busy', '0');

  });

  //使用keyup事件，绑定键盘上的数字按键和backspace按键
  payPassword.on('keyup', "input[name='payPassword_rsainput']", function (e) {

    var e = (e) ? e : window.event;

    //键盘上的数字键按下才可以输入
    if (e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
      k = this.value.length;//输入框里面的密码长度
      l = _this.size();//6

      for (; l--;) {

        //输入到第几个密码框，第几个密码框就显示高亮和光标（在输入框内有2个数字密码，第三个密码框要显示高亮和光标，之前的显示黑点后面的显示空白，输入和删除都一样）
        if (l === k) {
          _this.eq(l).addClass("active");
          _this.eq(l).find('b').css('visibility', 'hidden');

        } else {
          _this.eq(l).removeClass("active");
          _this.eq(l).find('b').css('visibility', l < k ? 'visible' : 'hidden');
        }

        if (k === 12) {
          j = 5;
        } else {
          j = k;
        }
        $('#cardwrap').css('left', j * 30 + 'px');

      }
    } else {
      //输入其他字符，直接清空
      var _val = this.value;
      this.value = _val.replace(/\D/g, '');
    }
  });


  //验证码2
  var payPassword = $("#payPassword_container"),
    _this = payPassword.find('i'),
    k = 0, j = 0,
    password = '',
    _cardwrap = $('#cardwrap');
  //点击隐藏的input密码框,在6个显示的密码框的第一个框显示光标
  payPassword.on('focus', "input[name='payPassword_rsainput']", function () {

    var _this = payPassword.find('i');
    if (payPassword.attr('data-busy') === '0') {
      //在第一个密码框中添加光标样式
      _this.eq(k).addClass("active");
      _cardwrap.css('visibility', 'visible');
      payPassword.attr('data-busy', '1');
    }

  });
  //change时去除输入框的高亮，用户再次输入密码时需再次点击
  payPassword.on('change', "input[name='payPassword_rsainput']", function () {
    _cardwrap.css('visibility', 'hidden');
    _this.eq(k).removeClass("active");
    payPassword.attr('data-busy', '0');
  }).on('blur', "input[name='payPassword_rsainput']", function () {

    _cardwrap.css('visibility', 'hidden');
    _this.eq(k).removeClass("active");
    payPassword.attr('data-busy', '0');

  });

  //使用keyup事件，绑定键盘上的数字按键和backspace按键
  payPassword.on('keyup', "input[name='payPassword_rsainput']", function (e) {

    var e = (e) ? e : window.event;

    //键盘上的数字键按下才可以输入
    if (e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
      k = this.value.length;//输入框里面的密码长度
      l = _this.size();//6

      for (; l--;) {

        //输入到第几个密码框，第几个密码框就显示高亮和光标（在输入框内有2个数字密码，第三个密码框要显示高亮和光标，之前的显示黑点后面的显示空白，输入和删除都一样）
        if (l === k) {
          _this.eq(l).addClass("active");
          _this.eq(l).find('b').css('visibility', 'hidden');

        } else {
          _this.eq(l).removeClass("active");
          _this.eq(l).find('b').css('visibility', l < k ? 'visible' : 'hidden');
        }

        if (k === 12) {
          j = 5;
        } else {
          j = k;
        }
        $('#cardwrap').css('left', j * 30 + 'px');

      }
    } else {
      //输入其他字符，直接清空
      var _val = this.value;
      this.value = _val.replace(/\D/g, '');
    }
  });
</script>
</body>
</html>