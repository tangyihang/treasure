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
<div class="mui-content">

    <div class="mui-row" style="border-bottom:0.2rem solid #f24646;position: relative; z-index:9999;background: #efeff4;">

        <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center"
             style="line-height:3rem;padding-left:1rem;color:#f24646;">
            头像
        </div>

        <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:3rem;color:#f24646;">
            昵称
        </div>

        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#f24646;">
            100总数
        </div>

        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#f24646;">
            50总数
        </div>
        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:3rem;color:#f24646;">
            20总数
        </div>
    </div>

    <div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="margin-top:3.2rem; padding-top:38px;padding-bottom:4rem;touch-action: none;">
        <div class="mui-scroll">
            <div class="warp">
                <foreach name="output.resultList" item="v">
                    <!--
                    单条记录开始-->
                    <div class="mui-row" style="margin-top:0.5rem;">

                        <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center"
                             style="line-height:2rem;padding-left:1rem;color:#369544; height:2rem; overflow:hidden;">
                            <img src="{{$v.headimgurl}}" style="width:2rem; height:2rem;">
                        </div>

                        <div class="mui-col-sm-3 mui-col-xs-3 mui-text-center mui-ellipsis"
                             style="line-height:2rem;color:#f24646;">
                            {{$v.nickname}}
                        </div>

                        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">
                            {{$v.sum_number_c1}}
                        </div>

                        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">
                            {{$v.sum_number_c2}}
                        </div>
                        <div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">
                            {{$v.sum_number_c3}}
                        </div>
                    </div>
                    <!--
                           单条记录结束
                    -->
                </foreach>

            </div>
        </div>
    </div>
</div>

<div style="height:auto;background:#FFF;position:fixed;left:50%;top:50%;width:90%;margin-left:-45%;margin-top:-45%;z-index:999;display:none;"
     id="tip">

    <div style="line-height:3rem;background:#FC0;color:#FFF;text-align:center;">请长按识别下方二维码</div>

    <div style="position:absolute;right:0.2rem;top:0.2rem;color:#FFF;" id="close">
        <img src="/Public/Images/Home/close.png" style="width:2rem;"/>
    </div>

    <div style="text-align:center;padding-top:2rem;padding-bottom:2rem;">
        <img src="{{$output.set.wechat}}" style="width:35%;"/>
    </div>
</div>


<div style="position:absolute;bottom:54px;z-index:9999999;background:#f24646;color:#FFF;width:100%;line-height:3rem;text-align:center;"
     class="jump" data-url="/vip/tui/order_detail?phone={{$phone}}&time_day={{$time_day}}">
    总订单记录
</div>
</body>
<script>
  var page = 2;

  function formatData(headimgurl, nickname, sum_number_c1, sum_number_c2, sum_number_c3) {

    var data = ' <div class="mui-row" style="margin-top:0.5rem;">' +
      '<div class="mui-col-sm-3 mui-col-xs-3 mui-text-center" style="line-height:2rem;padding-left:1rem;color:#f24646;">' +
      '<img src="' + headimgurl + '" style="width:2rem;" >' +
      '</div>' +
      '<div class="mui-col-sm-3 mui-col-xs-3 mui-text-center mui-ellipsis" style="line-height:2rem;color:#f24646;">' + nickname +
      '</div>' +
      '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">' + sum_number_c1 +
      '</div>' +
      '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">' + sum_number_c2 +
      '</div>' +
      '<div class="mui-col-sm-2 mui-col-xs-2 mui-text-center" style="line-height:2rem;color:#f24646;">' + sum_number_c3 +
      '</div>' +
      '</div>';

    return data;

  }

  function pullupRefresh() {

    var data = {};
    data['page'] = page;
    data['phone'] = "{{$phone}}";
    data['time_day'] = "{{$time_day}}";
    var that = this;
    //post
    $.post('/Vip/Tui/order_day', data, function (response) {

      page++;

      if (response.code == 11) {
        //append
        for (var i = 0; i < response.data.length; i++) {
          $('.warp').append(formatData(response.data[i]['headimgurl'], response.data[i]['nickname'], response.data[i]['sum_number_c1'], response.data[i]['sum_number_c2'], response.data[i]['sum_number_c3']));
        }

        that.endPullupToRefresh(false);
      } else {
        that.endPullupToRefresh(true);
      }


    }, 'json')

  }

  mui.init({
    pullRefresh: {
      container: '#pullrefresh',
      up: {
        contentrefresh: '正在加载...',
        contentnomore:'没有更多数据了',
        callback: pullupRefresh
        }
    }
  });

</script>
<script>

  var mask = mui.createMask();//callback为用户点击蒙版时自动执行的回调；

  $("#close").click(function () {
    $("#tip").hide();
    mask.close();
  })
</script>
<script>
  $(".sp").live('tap', function () {
    $("#tip").show();
    mask.show();
  })
</script>