<!--right start-->
<div class="col-lg-10 pd0 pl20 right">

<div style="width:960px;line-height:50px;background:#090;color:#FFF;margin-top:50px;text-align:center;font-size:16px;">下一期：{{$output.award.phase}} 期 &nbsp;&nbsp;&nbsp;&nbsp;开奖时间：{{$output.next.nextDay}} {{$output.next.nextTime}}</div>
   
<div style="float:left;">  
   <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">{{$output['rowCata'][0]['name']}}</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买{{$output['rowCata'][0]['small']}} 共 {{$output['rowSum']['CataOneSmall']}} 元</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买{{$output['rowCata'][0]['big']}} 共 {{$output['rowSum']['CataOneBig']}} 元</div>
</div>

<div style="float:left;margin-left:30px;">
   <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">{{$output['rowCata'][1]['name']}}</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买{{$output['rowCata'][1]['small']}} 共 {{$output['rowSum']['CataTwoSmall']}} 元</div>
   <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买{{$output['rowCata'][1]['big']}} 共 {{$output['rowSum']['CataTwoBig']}} 元</div>
</div>
    <div style="float:left;margin-left:30px;">
        <div style="width:300px;line-height:100px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">{{$output['rowCata'][2]['name']}}</div>
        <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;border-bottom:1px solid #FFF;">买{{$output['rowCata'][2]['small']}} 共 {{$output['rowSum']['CataThreeSmall']}} 元</div>
        <div style="width:300px;line-height:50px;background:#06F;font-size:16px;color:#FFF;text-align:center;">买{{$output['rowCata'][2]['big']}} 共 {{$output['rowSum']['CataThreeBig']}} 元</div>
    </div>
<div style="clear:both"></div>
<!--统计开始-->
<div style="margin-top:20px;margin-left:-14px;">
<form action="" method="get">
            	
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">日期：</span>
                        <select name="type" class="form-control">
                        	<option value="0" <eq name="type" value="0">selected</eq> >起止时间</option>
                        	<option value="1" <eq name="type" value="1">selected</eq> >今日</option>
                            <option value="2" <eq name="type" value="2">selected</eq> >昨日</option>
                            <option value="3" <eq name="type" value="3">selected</eq> >7日</option>
                            <option value="4" <eq name="type" value="4">selected</eq> >30日</option>
                        </select>
                    </div>
                </div>
                
                
                  <div class="col-lg-3">
                	<div class="input-group input-group-sm" >
                        <span class="input-group-addon">开始时间：</span>
                        <input type="text"  id="datetimepicker" name="startime" value="{{$start}}" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">结束时间：</span>
                        <input type="text"  id="datetimepicker2" name="endtime" value="{{$end}}" class="form-control">
                    </div>
                </div>
                
                 <script>
					$('#datetimepicker').datetimepicker({
						format: 'yyyy-mm-dd hh:ii',
						language: 'zh-CN',
					});
					$('#datetimepicker2').datetimepicker({
						format: 'yyyy-mm-dd hh:ii',
						language: 'zh-CN',
					});
					
					
				</script>
                
                
                    <div class="col-lg-3">
                        <div class="input-group input-group-sm">
                            <input type="submit" value="查询" class="btn btn-info btn-sm"">
                        </div>
                    </div>
            </form>
<!--统计结束-->
 </div>
 <p style="height:40px;"></p>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">注册量：{{$output.zhuce}}人</div>
 <div style="display:inline-block;line-height:30px;background:#713EF0;color:#FFF;padding:10px 20px;">投注人数：{{$output.touzhu}}人</div><br/> <br/>
 
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">总购买额：{{$output.goumaie}}元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">总购买量：{{$output.goumail}}单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">总成功额：{{$output.suce}}元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">总成功量：{{$output.sucl}}单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">总失败额：{{$output.faile}}元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">总失败量：{{$output.faill}}单</div>
  <br/>
 <br/>
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">100元卡总购买额：{{$output.goumaie100}}元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">100元总购买量：{{$output.goumail100}}单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">100元总成功额：{{$output.suce100}}元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">100元总成功量：{{$output.sucl100}}单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">100元总失败额：{{$output.faile100}}元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">100元总失败量：{{$output.faill100}}单</div><br/>
 
 <br/>
 
 <div style="display:inline-block;line-height:30px;background:#938924;color:#FFF;padding:10px 20px;margin-top:10px;">50元卡总购买额：{{$output.goumaie50}}元</div>
 <div style="display:inline-block;line-height:30px;background:#363608;color:#FFF;padding:10px 20px;">50元总购买量：{{$output.goumail50}}单</div><br/>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;margin-top:10px;">50元总成功额：{{$output.suce50}}元</div>
 <div style="display:inline-block;line-height:30px;background:#0066FF;color:#FFF;padding:10px 20px;">50元总成功量：{{$output.sucl50}}单</div>
  <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">50元总失败额：{{$output.faile50}}元</div>
 <div style="display:inline-block;line-height:30px;background:#FF0505;color:#FFF;padding:10px 20px;">50元总失败量：{{$output.faill50}}单</div><br/>
 
</div>
<!--right end-->





</div>





</div>
<!--main end -->