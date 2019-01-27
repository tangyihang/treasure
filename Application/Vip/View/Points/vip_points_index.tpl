<body>

<div class="mui-content">

    <div class="mui-row">

        <!-- 顶部开始 -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:3rem 2rem;">
            <input type="text" name="money" id="money" placeholder="请输入充值金额，单笔金额不能超过2万元">
            <input type="text" name="pay_account_name" id="pay_account_name" placeholder="请输入付款账号的微信或支付宝昵称">
            <button type="button" class="mui-btn mui-btn-primary sub" data-type="0" style="width:50%;float: left;">
                微信支付
            </button>
            <button type="button" class="mui-btn mui-btn-warning sub" data-type="1" style="width:50%;float: left;">
                支付宝支付
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
    <p style="text-align:center;line-height:3.5rem;">
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:20%;background: #b0b0b3;border-color: #b0b0b3;margin-right: 15px;">
            <a onclick="removeRecharge(1)" style="color: #ffffff;">取消</a>
        </button>
        <button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;">
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
    });
  }
  //pay
  $(".sub").click(function () {
    mui.alert('系统维护中！', "提示", "确定");
    return;

    var money = $("#money").val();
    var pay_account_name = $("#pay_account_name").val();
    var type = $(this).data('type');

    var that = this;
    mui(that).button('loading');
    $.post('/vip/Recharge/submit', {money:money,type:type,pay_account_name:pay_account_name}, function (response) {

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
        $("#tip").hide();
        mui(that).button('reset');
      }
      $("#recharge_id").val(response.recharge_id);
    }, 'json')


  })


</script>

</body>