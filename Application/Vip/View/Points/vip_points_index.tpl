<body>

<div class="mui-content">

    <div class="mui-row">

        <!-- 顶部开始 -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:5rem 2rem;">
            <input type="text" name="money" id="money" placeholder="请输入充值金额，单笔金额不能超过900元">
            <input type="text" name="pay_account_name" id="name" placeholder="请输入付款账号名称">
            <button type="button" class="mui-btn mui-btn-primary sub" data-type="0" style="width:50%;float: left;">
                微信支付
            </button>
            <button type="button" class="mui-btn mui-btn-warning sub" data-type="1" style="width:50%;float: left;">
                支付宝支付
            </button>
            <p style="text-align: right;padding-top:2rem; line-height: 40px;"><a href="/vip/points/getlist1">查看充值记录</a>
            </p>
        </div>


    </div>
</div>

<div id="wxshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">

    <div style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close3">
        <img src="/Public/Images/Home/close.png" style="width:2rem;"/>
    </div>
    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">微信付款</p>
    <p style="text-align:center;line-height:3.5rem;">打开微信，扫一扫</p>
    <img src="/Public/Images/loading.gif" id="wxqr" style="width:60%"/>
</div>

<div id="alipayshow" style="display:none;position:fixed;top:35%;left:50%;z-index:9999999999;width:90%;height:60%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
    <div style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close2">
        <img src="/Public/Images/Home/close.png" style="width:2rem;"/>
    </div>

    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#f24646;color:#FFF;">支付宝付款</p>
    <p style="text-align:center;line-height:3.5rem;">打开支付宝，扫一扫</p>
    <img src="/Public/Images/loading.gif" id="alipayqr" style="width:60%"/>
</div>


<script type="text/javascript">

  $("#close3").click(function () {
    $("#wxshow").hide();
    mask.close();
  })

  $("#close2").click(function () {
    $("#alipayshow").hide();
    mask.close();
  })
  //pay
  $(".sub").click(function () {
//	mui.alert('系统维护中！', "提示", "确定");
//    return;

    var money = $("#money").val();
    var pay_account_name = $("#pay_account_name").val();
    var type = $(this).data('type');

    var that = this;
    mui(that).button('loading');
    $.post('/vip/recharge/submit', {money:money,type:type,pay_account_name:pay_account_name}, function (response) {

      if (response.code != 11) {
        mui.alert(response.info, "提示", "确定");

        mui(that).button('reset');
        return;
      }
      if (type == 0) {
        $("#wxqr").attr("src", response.info);

        $("#wxshow").show();
        $("#tip").hide();
        mask.show();//显示遮罩

        mui(that).button('reset');
      }

      if (type == 1) {
        $("#alipayqr").attr("src", response.info);

        $("#alipayshow").show();
        $("#tip").hide();
        mask.show();//显示遮罩

        mui(that).button('reset');
      }


    }, 'json')


  })


</script>

</body>