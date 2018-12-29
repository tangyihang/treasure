<include file="menu" />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">充值管理</span>
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
                        <span class="input-group-addon">手机号：</span>
                        <input type="text" name="phone" value="{{$where.phone}}" class="form-control">
                    </div>
                </div>

                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
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
                            <input type="submit" value="查询" class="btn btn-info btn-sm">
                        </div>
                    </div>
            </form>
        </div>
     </div>
     <div class="row pt20">
     	<div class="col-lg-3">
        	<span class="input-group-addon">今日总额：{{$memberSum2}}</span>
        </div>
        <div class="col-lg-3">
        	<span class="input-group-addon">查询总额：{{$memberSum}}</span>
        </div>
     </div>
    <!--表格 start-->
    <div class="row pt20">
        <div class="col-lg-12">
            <table class="table table-striped bg-ff">
                <thead>
                <tr class="success">
                    <th>订单id</th>
                    <th>金额</th>
                    <th>用户昵称</th>
                    <th>手机号</th>   
                    <th>付款时间</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.order_id}}</td>
                    <td>{{$o.money}}</td>
                    <td>{{$o.nickname}}</td>
                    <td>{{$o.phone}}</td>
                    <td>{{$o.pay_time}}</td>
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