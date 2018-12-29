<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">夺宝订单管理</span>
        </div>
   </div>

    <!--分隔线 start-->
    <div class="line2"></div>
    <div class="line3"></div>
    <!--分隔线 end-->
    
      <div class="row pt20">
        <div class="col-lg-12">
        	<form action="" method="get">
            	
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">下单手机号：</span>
                        <input type="text" name="phone" value="{{$where.phone}}" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">代理手机号：</span>
                        <input type="text" name="parent_phone" value="{{$parent_phone}}" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">分类：</span>
                        <select name="catagory_id" class="form-control">
                        	<option value="0">全部</option>
                        	<option value="1" <eq name="where['catagory_id']" value="1">selected</eq> >100元</option>
                            <option value="2" <eq name="where['catagory_id']" value="2">selected</eq> >50元</option>
                            <option value="3" <eq name="where['catagory_id']" value="2">selected</eq> >20元</option>
                        </select>
                    </div>
                </div>
                
                 <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">中奖状态：</span>
                        <select name="result" class="form-control">
                        	<option value="0">全部</option>
                        	<option value="2" <eq name="where['result']" value="2">selected</eq> >已中奖</option>
                            <option value="1" <eq name="where['result']" value="1">selected</eq> >未中奖</option>
                        </select>
                    </div>
                </div>
                
                
                  <div class="col-lg-3">
                	<div class="input-group input-group-sm" style="margin-top:10px;">
                        <span class="input-group-addon">开始时间：</span>
                        <input type="text"  id="datetimepicker" name="startime" value="{{$start}}" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm" style="margin-top:10px;">
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
                
                
                    <div class="col-lg-3" style="margin-top:10px;">
                        <div class="input-group input-group-sm">
                            <input type="submit" value="查询" class="btn btn-info btn-sm"">
                        </div>
                    </div>
            </form>
        </div>
     </div>

    <!--表格 start-->
    <div class="row pt20">
        <div class="col-lg-12">
            <table class="table table-striped bg-ff">
                <thead>
                <tr class="success">
                    <th>ID</th>
                    <th>商品名称</th>
                    <th>商品分类</th>
                    <th>单价</th>
                    <th>购买数量</th>
                    <th>总价</th>
                    <th>大小</th>
                    <th>购买人</th>
                    <th>支付时间</th>
                    <th>开奖时间</th>
                    <th>开奖结果</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowsOrder']" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.goods_name}}</td>
                    <td>
                    	<eq name="o.catagory_id" value="1">100元</eq>
                    	<eq name="o.catagory_id" value="2">50元</eq>    
                    </td>
                    <td>{{$o.goods_price}}</td>
                    <td>{{$o.goods_num}}</td>
                    <td>{{$o.goods_price_sum}}</td>
                    <td>
                    	<eq name="o.snatch_type" value="1">小</eq>
                        <eq name="o.snatch_type" value="2">大</eq>
                    </td>
                    <td>
                    	{{$o.nickname}}
                    </td>
                    <td>{{$o.pay_time}}</td>
                    <td>{{$o.open_time}}</td>
                    <td>
                    	<eq name="o.result" value="0">未开</eq>
                        <eq name="o.result" value="1">负</eq>
                        <eq name="o.result" value="2">胜</eq>
                    </td>
                    
                </tr>
                </volist>
                </tbody>
            </table>
        </div>
    </div>
    <!--表格 end-->
    <!--分页 start-->
    <div class="pages">
        {{$page}}
    </div>
    <!--分页 end-->
</div>
<!--right end-->
</div>
</div>
<!--main end -->