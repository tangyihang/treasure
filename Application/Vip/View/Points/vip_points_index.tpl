<body>

<div class="mui-content">

    <div class="mui-row">

        <!-- 顶部开始 -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:3rem 2rem;">
            <input type="text" name="money" id="money" placeholder="请输入充值金额，单笔金额不能超过2万元">
            <input type="text" name="pay_account_name" id="pay_account_name" placeholder="请输入付款账号的微信或支付宝昵称">
            <button type="button" class="mui-btn mui-btn-primary sub" data-type="0" style="width:100%;float: left;margin-bottom: 10px;">
                微信支付
            </button>
            <button type="button" class="mui-btn mui-btn-warning sub" data-type="1" style="width:100%;float: left;margin-bottom: 10px;">
                支付宝支付
            </button>
            <button type="button" class="mui-btn mui-btn-negative sub" data-type="2" style="width:100%;float: left;margin-bottom: 10px;">
                银行卡支付
            </button>
            <p style="text-align: right;padding-top:2rem; line-height: 40px;"><a href="/vip/Recharge/getlist">查看充值记录</a>
            </p>
        </div>
    </div>
</div>

<div id="wxshow" style="display:none;position:fixed;top:30%;left:50%;z-index:9999999999;width:90%;height:65%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">微信付款</p>
    <p style="text-align:center;line-height:2.5rem;color: red;">长按保存二维码图片，进行扫描支付</p>
    <p style="text-align:center;color: red;">支付成功后请点击已支付按钮</p>
    <img src="/Public/Images/loading.gif" id="wxqr" style="width:60%"/>
    <p style="text-align:center;line-height:2.5rem;color: red;">二维码60秒内支付有效</p>
    <p style="text-align:center;line-height:2.5rem;color: red;">填写金额和支付金额要一致，不然会影响到账</p>
    <p style="text-align:center;line-height:3.5rem;">
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:20%;background: #b0b0b3;border-color: #b0b0b3;margin-right: 15px;">
            <a onclick="removeRecharge(0)" style="color: #ffffff;">取消</a>
        </button>
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;">
            <a href="/vip" style="color: #ffffff;">已支付</a>
        </button>
    </p>
</div>

<div id="alipayshow" style="display:none;position:fixed;top:30%;left:50%;z-index:9999999999;width:90%;height:65%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#f24646;color:#FFF;">支付宝付款</p>
    <p style="text-align:center;line-height:2.5rem;color: red;">长按保存二维码图片，进行扫描支付</p>
    <p style="text-align:center;color: red;">支付成功后请点击已支付按钮</p>
    <img src="/Public/Images/loading.gif" id="alipayqr" style="width:60%"/>
    <p style="text-align:center;line-height:2.5rem;color: red;">二维码60秒内支付有效</p>
    <p style="text-align:center;line-height:2.5rem;color: red;" id="alipay_tishi">填写金额和支付金额要一致，不然会影响到账</p>
    <p style="text-align:center;line-height:3.5rem;">
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:20%;background: #b0b0b3;border-color: #b0b0b3;margin-right: 15px;">
            <a onclick="removeRecharge(1)" style="color: #ffffff;">取消</a>
        </button>
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;">
            <a href="/vip" style="color: #ffffff;">已支付</a>
        </button>
    </p>
</div>

<div id="bankshow" style="display:none;position:fixed;top:30%;left:50%;z-index:9999999999;width:90%;height:65%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">银行卡付款</p>
    <p style="text-align:center;color: red;margin-top: 10px;">请转账到以下账户中</p>
    <p style="text-align:center;line-height:2.5rem;color: red;">支付成功后点击已支付按钮</p>
    <p style="text-align:center;color: red;">填写金额和支付金额要一致，不然会影响到账</p>
    <p style="text-align:center;margin-top: 10px;">
        <span style="width: 40%;text-align: right;float: left;">收款人名称：</span>
        <span id="name" style="color: red;text-align: left;width: 60%;float: left;"></span>
    </p>
    <p style="text-align:center;">
        <span style="width: 40%;text-align: right;float: left;">账号：</span>
        <span id="account" style="color: red;text-align: left;width: 60%;float: left;"></span>
    </p>
    <p style="text-align:center;">
        <span style="width: 40%;text-align: right;float: left;">银行：</span>
        <span id="opening_bank" style="color: red;text-align: left;width: 60%;float: left;"></span>
    </p>
    <p style="text-align:center;">
        <span style="width: 40%;text-align: right;float: left;">开户行网点：</span>
        <span id="opening_bank_branch" style="color: red;text-align: left;width: 60%;float: left;"></span>
    </p>
    <p style="text-align:center;line-height:3.5rem;">
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:20%;background: #b0b0b3;border-color: #b0b0b3;margin-right: 15px;text-align: center;float: left;margin-top: 20px;margin-left: 20%;">
            <a onclick="removeRecharge(2)" style="color: #ffffff;">取消</a>
        </button>
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;float: left;margin-top: 20px;">
            <a href="/vip" style="color: #ffffff;">已支付</a>
        </button>
    </p>
</div>
<input type="hidden" name="recharge_id" id="recharge_id" value="">

<script type="text/javascript">

  $("#close3").click(function () {
    $("#wxshow").hide();
  })

  $("#close2").click(function () {
    $("#alipayshow").hide();
  })

  function removeRecharge(type) {
    var id = $("#recharge_id").val();
    $.post('/vip/Recharge/remove', {id:id}, function (response) {
      if (!response.flag) {
        mui.alert(response.info, "提示", "确定");
      }
      if (type == 1) $("#alipayshow").hide();
      if (type == 0) $("#wxshow").hide();
      if (type == 2) $("#bankshow").hide();
    });
  }
  //pay
  $(".sub").click(function () {
//    mui.alert('请提现，系统即日开始升级！', "提示", "确定");
//    return;

    var money = $("#money").val();
    var pay_account_name = $("#pay_account_name").val();
    var type = $(this).data('type');

    var that = this;
    mui(that).button('loading');

    var url = '';
//    if (money < 900 && type == 1) {
//      url = '/vip/Points/submit';
//    } else {
      url = '/vip/Recharge/submit';
//    }
    var message = '';
    var title = '';
    if (type == 1) {
      message = '请确认在付款账号中您输入的是您付款的支付宝昵称？如不是可能会影响充值。';
      title = '支付宝昵称';
    } else if (type == 2) {
      message = '请确认在付款账号中您输入的是您付款人的真实姓名？如不是可能会影响充值。';
      title = '付款人真实姓名';
    } else {
      message = '请确认在付款账号中您输入的是您付款的微信昵称？如不是可能会影响充值。';
      title = '微信昵称';
    }
    mui.confirm(message, title, ['否', '是'],function(e) {
      if (e.index == 1) {
        $.post(url, {money:money,type:type,pay_account_name:pay_account_name}, function (response) {

          if (response.code != 11) {
            mui.alert(response.info, "提示", "确定");
            mui(that).button('reset');
            return;
          }
          if (type == 0) {
            $("#wxqr").attr("src", response.info);

            $("#wxshow").show();
            $("#tip").hide();
            mui(that).button('reset');
          }
          if (type == 1) {
            $("#alipayqr").attr("src", response.info);

            $("#alipayshow").show();
            if (money < 900) {
              $("#alipay_tishi").hide();
            } else {
              $("#alipay_tishi").show();
            }
            $("#tip").hide();
            mui(that).button('reset');
          }
          if (type == 2) {
            $("#name").html(response.info.name);
            $("#account").html(response.info.account);
            $("#opening_bank").html(response.info.opening_bank);
            $("#opening_bank_branch").html(response.info.opening_bank_branch);
            $("#bankshow").show();
            mui(that).button('reset');
          }
          $("#recharge_id").val(response.recharge_id);
        }, 'json')
      } else {
        mui(that).button('reset');
      }
    });
  })


</script>

</body>