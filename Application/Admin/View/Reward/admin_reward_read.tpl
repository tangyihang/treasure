<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">兑奖订单管理</span>
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
                        <span class="input-group-addon">兑换码：</span>
                        <input type="text" name="award_code" value="{{$where.award_code}}" class="form-control">
                    </div>
                </div>
               
                
                
                    <div class="col-lg-3">
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
                    <th>单价</th>
                    <th>购买数量</th>
                    <th>总价</th>
                    <th>大小</th>
                    <th>下单时间</th>
                    <th>开奖时间</th>
                    <th>开奖结果</th>
                    <th>兑奖情况</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowsOrder']" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.goods_name}}</td>
                    <td>{{$o.goods_price}}</td>
                    <td>{{$o.goods_num}}</td>
                    <td>{{$o.goods_price_sum}}</td>
                    <td>
                    	<eq name="o.snatch_type" value="1">小</eq>
                        <eq name="o.snatch_type" value="2">大</eq>
                    </td>
                    <td>{{$o.create_time}}</td>
                    <td>{{$o.open_time}}</td>
                    <td>
                    	<eq name="o.result" value="0">未开</eq>
                        <eq name="o.result" value="1">负</eq>
                        <eq name="o.result" value="2">胜</eq>
                    </td>
                    <td>
                        <eq name="o.is_get" value="0"><a href="/admin/reward/set?id={{$o.id}}">未兑</a></eq>
                        <eq name="o.is_get" value="1">已兑</eq>
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