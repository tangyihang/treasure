<script>
  // 播放声音
  function playVoice(src, domId) {
    var $dom = $('#' + domId)
    if ($.browser.msie) {
      // IE用bgsound标签处理声音

      if ($dom.length) {
        $dom[0].src = src;
      } else {
        $('<bgsound>', {src: src, id: domId}).appendTo('body');
      }
    } else {
      // IE以外的其它浏览器用HTML5处理声音
      if ($dom.length) {
        $dom[0].play();
      } else {
        $('<audio>', {src: src, id: domId}).appendTo('body')[0].play();
      }
    }
  }
  $(function() {
    setInterval(function () {
      $.getJSON('/vip/Recharge/submit', function (tip) {
        if (tip) {
          // 只处理正确返回的数据
          playVoice('/skin/sound/backcash.wav', 'cash-voice');
          if (!tip.flag) return;

          var buttons = [];
          tip.buttons.split('|').forEach(function (button) {
            button = button.split(':');
            buttons.push({text:button[0], click:window[button[1]]});
          });

          $('<div>').append(tip.message).dialog({
            position: ['right', 'bottom'],
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