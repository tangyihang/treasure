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

  function defaultCloseModal() {
    $(this).dialog('destroy');
  }

  function goToDealWithRecharge() {
    window.location.href="/Admin/recharge/read";
    $(this).dialog('destroy');
  }
  $(function() {
    setInterval(function () {
      $.get('/admin/Recharge/getRecharge', function (tip) {
        if (tip.flag) {
          // 只处理正确返回的数据
          playVoice('/Public/Flash/tishi.wav', 'container');
          if (!tip.flag) return;

          var buttons = [];
          tip.buttons.split('|').forEach(function (button) {
            button = button.split(':');
            buttons.push({text:button[0], click:window[button[1]]});
          });

          console.log(buttons);
          $('<div>').append(tip.message).dialog({
            position: { my: "right top", at: "right bottom" },
            minHeight: 40,
            title: '系统提示',
            buttons: buttons
          });
        }
      })
    }, 10000);
  });
</script>
</body>
</html>