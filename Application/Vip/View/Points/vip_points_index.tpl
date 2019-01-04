<body>

<div class="mui-content">

    <div class="mui-row">

        <!-- 顶部开始 -->
        <div class="mui-col-sm-12 mui-col-xs-12 mui-text-center" style="padding:3rem 2rem;">
            <input type="text" name="money" id="money" placeholder="请输入充值金额，单笔金额不能超过900元">
            <input type="text" name="pay_account_name" id="pay_account_name" placeholder="请输入付款账号名称">
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

<div id="wxshow" style="display:none;position:fixed;top:30%;left:50%;z-index:9999999999;width:90%;height:70%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">

    <div style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close3">
        <img src="/Public/Images/Home/close.png" style="width:2rem;"/>
    </div>
    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#FF0000;color:#FFF;">微信付款</p>
    <p style="text-align:center;line-height:2.5rem;">长按保存二维码图片，进行扫描支付</p>
    <p style="text-align:center;">支付成功后请耐心等待管理员审核</p>
    <img src="/Public/Images/loading.gif" id="wxqr" style="width:60%"/>
    <p style="text-align:center;line-height:3.5rem;"><button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;">
            <a href="/vip" style="color: #ffffff;">支付成功</a>
    </button></p>
</div>

<div id="alipayshow" style="display:none;position:fixed;top:30%;left:50%;z-index:9999999999;width:90%;height:73%;background:#FFF;margin-left:-45%;margin-top:-30%;text-align:center;box-shadow: 0px 0px 10px #888888;">
    <div style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close2">
        <img src="/Public/Images/Home/close.png" style="width:2rem;"/>
    </div>

    <p id="zhifubao" style="line-height:3rem;text-align:center;border-bottom:1px solid #CCC;background:#f24646;color:#FFF;">支付宝付款</p>
    <p style="text-align:center;line-height:2.5rem;">长按保存二维码图片，进行扫描支付</p>
    <p style="text-align:center;">支付成功后请耐心等待管理员审核</p>
    <img src="/Public/Images/loading.gif" id="alipayqr" style="width:60%"/>
    <p style="text-align:center;line-height:3.5rem;"><button type="button" class="mui-btn mui-btn-warning" data-type="1" style="width:40%;">
            <a href="/vip" style="color: #ffffff;">支付成功</a>
        </button></p>
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
//        mask.show();//显示遮罩

        mui(that).button('reset');
      }

      if (type == 1) {
        $("#alipayqr").attr("src", response.info);

        $("#alipayshow").show();
        $("#tip").hide();
//        mask.show();//显示遮罩

        mui(that).button('reset');
      }


    }, 'json')


  })


</script>

</body>