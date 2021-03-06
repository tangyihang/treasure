;(function($){
 $.fn.countTime = function(options){
		function Count(elemnt,options){
			
				this.elemnt=elemnt;
				this.init();
				
		}
		Count.prototype ={			
				init:function(){
					this.options = $.extend({},options||{});
					this.arr=this.elemnt.children();
					this.time =null	 		
					this.updateTime(this,this.options.callback);
				},
				getTimes:function(m,callback){
					var NowTime = new Date();
					var EndTime = new Date(m.options.EndTime.replace(/-/g, "/"));
					m.t =EndTime-NowTime  ;	 		
					m.d = Math.floor(m.t/1000/60/60/24);
					m.h = Math.floor(m.t/1000/60/60%24);
					m.m = Math.floor(m.t/1000/60%60);
					m.s = Math.floor(m.t/1000%60);
					m.ms = Math.floor(m.t%1000);
					if(m.h >= 1){
						$(m.arr[1]).show();	
					}else{
						$(m.arr[1]).hide();
					}
                     $(m.arr[1]).text(m.h > 9 ? m.h +" 时":"0" + m.h+" 时");
                     $(m.arr[2]).text(m.m > 9 ? m.m +" 分":"0" + m.m+" 分") 
                     $(m.arr[3]).text(m.s > 9 ? m.s +" 秒":"0" + m.s+" 秒");	
					 $(m.arr[4]).text(m.ms);		
								  
				   if(NowTime >= EndTime){ 
				   	  	clearInterval(m.time)
						$(m.arr[0]).text("0"+"0"+ "天");
						$(m.arr[1]).text("0"+"0"+ "时");
						$(m.arr[2]).text("0"+"0"+ "分")
						$(m.arr[3]).text("0"+"0"+ "秒");
						$(m.arr[3]).text("0"+"0"+ "h秒");
						if(typeof callback =="function"){
							callback();
						};
				  	};					  
				},
				updateTime:function(m,callback){				
					m.time=setInterval(function(){
								m.getTimes(m,callback);
						},1);
				},				
			};
			return this.each(function(){
			  		new Count($(this),options)
			}); 		
		}
	})(Zepto);