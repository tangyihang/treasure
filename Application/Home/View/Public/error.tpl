<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta charset="utf-8">
<title>系统提示</title>
<link rel="stylesheet" href="/Public/Css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/Css/Home/base.css">
<link rel="stylesheet" href="/Public/Css/Home/product.css">
<link rel="stylesheet" href="/Public/Css/Home/order.css">
<link rel="stylesheet" href="/Public/Css/slick.css">
<script src="/Public/js/jquery-2.1.4.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
</head>

<body style="background:#F0F1F3;padding:0 2rem;">
<div style="background:#FFF;border-top:0.5rem solid #3794FC;height:18rem;margin-top:50%;padding:0 1rem;box-shadow: 10px 10px 5px #888888;">
	<p style="border-bottom:1px solid #D0D0D0;line-height:4rem;margin-bottom:2rem;">提示</p>
    <?php if(isset($message)) {?>
    <p class="success"><?php echo($message); ?></p>
    <?php }else{?>
    <p class="error"><?php echo($error); ?></p>
    <?php }?>
    <p class="detail"></p>
    <p class="jump">
    <b id="wait"><?php echo($waitSecond); ?></b>秒<a id="href" href="<?php echo($jumpUrl); ?>">后自动跳转</a>
    </p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>

</html>




