<script>
  // 播放声音
  function playVoice(src, domId) {
    var $dom = $('#' + domId)
    // IE以外的其它浏览器用HTML5处理声音
    if ($dom.length) {
      $dom[0].play();
    } else {
      $('<audio>', {src: src, id: domId}).appendTo('body')[0].play();
    }
  }

  // 忽略充值请求
  function ignoreCloseModal(id) {
    $.get('/admin/Recharge/ignore', {id:id});
  }

  // 前往充值订单
  function goToDealWithRecharge() {
    window.location.href="/Admin/recharge/read";
    $(this).dialog('destroy');
  }

  // 忽略提现请求
  function ignoreCloseWithdraw(id) {
    $.get('/admin/Points/ignore', {id:id});
  }

  // 前往提现请求
  function goToWithdraw() {
    window.location.href="/Admin/Points/getOrder";
    $(this).dialog('destroy');
  }

  $(function() {
    // 定时查看充值请求
    setInterval(function () {
      $.get('/admin/Recharge/getRecharge', function (tip) {
        if (tip.flag) {
          // 只处理正确返回的数据
          playVoice('/Public/Flash/tishi.wav', 'container');
          if (!tip.flag) return;

          $('<div>').append(tip.message).dialog({
            position: { my: "right top", at: "right bottom" },
            minHeight: 40,
            title: '系统充值提示',
            buttons: [
              {
                text: "前往处理",
                click: window.goToDealWithRecharge
              },
              {
                text: "忽略",
                click: function() {
                  ignoreCloseModal(tip.data_id);
                  $(this).dialog('destroy');
                }
              }
            ]
          });
        }
      })
    }, 20000);

    // 定时查看提现请求
    setInterval(function () {
      $.get('/admin/Points/getWithdraw', function (tip) {
        if (tip.flag) {
          // 只处理正确返回的数据
          playVoice('/Public/Flash/tishi.wav', 'container');
          if (!tip.flag) return;

          $('<div>').append(tip.message).dialog({
            position: { my: "right top", at: "right bottom" },
            minHeight: 40,
            title: '系统提现提示',
            buttons: [
              {
                text: "前往处理",
                click: window.goToWithdraw
              },
              {
                text: "忽略",
                click: function() {
                  ignoreCloseWithdraw(tip.data_id);
                  $(this).dialog('destroy');
                }
              }
            ]
          });
        }
      })
    }, 30000);
  });
</script>
</body>
</html>