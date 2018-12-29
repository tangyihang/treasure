// JavaScript Document
  
	$(function(){
		/*导航*/
	    /*index底部滚动*/
		var timer = null;
		var num = 0;
		var fn = function(){
			num-=3;
			if(num < -1110){
				num = 0;	
			}
			$('.an-con4 ul').css('left',''+num+'px');
		}
		timer = window.setInterval(fn,50);
		$('.an-con4 li').mouseover(function(e) {
            clearInterval(timer);
			$(this).siblings().stop().fadeTo(50,0.3);
			$(this).css('border-left','1px solid #999999');
        }).mouseout(function(e) {
			clearInterval(timer);//开启之前先清空<br />
			$(this).siblings().stop().fadeTo(50,1);
			timer = window.setInterval(fn,50);
			$(this).css('border-left','none');
        });
		
		///*精品课程,给你酣畅淋漓的提分体验*/
		$('.section3_01 .section3_01_t ul li').mouseover(function(e) {
            $(this).addClass('current01').siblings().removeClass('current01');
			var dataindex=$(this).attr('data-index');
			$('.section3_l .section3_01 .section3_01_b').css('display','none');
			$('.section3_l .section3_01 .section3_01_b[data-index='+dataindex+']').css('display','block');
			//alert(7);
        });
		
		///*/*section 今日头条 右半部分img*/*/
		var timer = null;
		var thisIndex = 0;//轮播图的灵魂所在，就是要控制这个索引值。
		function changeImg(){
			$('.section01_r ol li,.section3_r_img ol li').eq(thisIndex).addClass('current').siblings().removeClass('current');
			//$('.section3_r_img ol li').eq(thisIndex).addClass('current').siblings().removeClass('current');
			$('.sec_img li,section3_r_img .sec_img li').eq(thisIndex).hide().stop().fadeIn().siblings().hide();
		}
		function fnTimer(){
			thisIndex++;
			if(thisIndex > 2){
				thisIndex = 0;
			}
			changeImg();
		};
		timer = setInterval(fnTimer,2000);//自动轮播
		$('.section01_r ol li').mouseover(function(e) {
            $(this).addClass('current').siblings().removeClass('current');
			thisIndex = $(this).index();
			$('.sec_img li').eq(thisIndex).hide().stop().fadeIn().siblings().hide();
        });
		$('.section3_r_img ol li').mouseover(function(e) {
            $(this).addClass('current').siblings().removeClass('current');
			thisIndex = $(this).index();
			$('.sec_img li').eq(thisIndex).hide().stop().fadeIn().siblings().hide();
        });
		
		$('.section01_r,.section3_r_img').hover(function(){
            clearInterval(timer);
		},function(){
			clearInterval(timer);
			timer = setInterval(fnTimer,2000);
		});
		/*独家资料 名师讲座*/
        /* $('.content_con4 li').hover(function(e) {
            $(this).children().toggle();
        });*/
		$('.content_con4 li .content_con4_t').mouseover(function(e) {
           // $(this).children('.content_con4_b').show().siblings().hide();
		    $(this).hide();
			$(this).siblings().show();
			$(this).parent().siblings().children('.content_con4_t').show();
			$(this).parent().siblings().children('.content_con4_b').hide();
			//$(this).children('.content_con4_b').parent().siblings().children('.content_con4_t').show().siblings().('.content_con4_b').hide();
			//$(this).siblings().children('.content_con4_t').show().children('.content_con4_b').hide();
        }).mouseover(function(e) {
           // $(this).children('.content_con4_b').show().siblings().hide();
			//
			//$(this).siblings().children('.content_con4_b').hide().children('.content_con4_t').show();
        });
		 
		 
			})	
