<include file="menu"/>
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">管理员充值记录</span>
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

                <div class="col-lg-2">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">是否记入：</span>
                        <select name="is_count_in" class="form-control">
                            <option value="0">全部</option>
                            <option value="1" <eq name="where['is_count_in']" value="1">selected</eq> >记入</option>
                            <option value="2" <eq name="where['is_count_in']" value="2">selected</eq> >不记入</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">开始时间：</span>
                        <input type="text" id="datetimepicker" name="startime" value="{{$start}}" class="form-control">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">结束时间：</span>
                        <input type="text" id="datetimepicker2" name="endtime" value="{{$end}}" class="form-control">
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


                <div class="col-lg-1">
                    <div class="input-group input-group-sm">
                        <input type="submit" value="查询" class="btn btn-info btn-sm">
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
                    <th>手机号</th>
                    <th>用户付款账号</th>
                    <th>充值金额</th>
                    <th>充值方式</th>
                    <th>二维码ID</th>
                    <th>到账账户</th>
                    <th>是否记入</th>
                    <th>时间</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output" id="o" mod="2">
                    <tr
                    <eq name="mod" value="1">class="warning"</eq>
                    >
                    <td>{{$o.phone}}</td>
                    <td>{{$o.pay_account_name}}</td>
                    <td>{{$o.money}}</td>
                    <td>
                        <eq name="o.pay_type" value="0">微信</eq>
                        <eq name="o.pay_type" value="1">支付宝</eq>
                    </td>
                    <td>{{$o.code_id}}</td>
                    <td>{{$o.code_name}}</td>
                    <td>
                        <eq name="o.is_count_in" value="1">记入</eq>
                        <eq name="o.is_count_in" value="2">不记入</eq>
                    </td>
                    <td>{{$o.created}}</td>
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