<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">设奖纪录</span>
        </div>
        <div class="col-lg-6 text-right"> <a href="{{:U('Admin/setAward/add')}}">
      <button type="button" class="btn btn-info btn-sm" >添加开奖结果</button>
      </a> </div>
      
    </div>

    <!--分隔线 start-->
    <div class="line2"></div>
    <div class="line3"></div>
    <!--分隔线 end-->

    <!--表格 start-->
    <div class="row pt20">
        <div class="col-lg-12">
            <table class="table table-striped bg-ff">
                <thead>
                <tr class="success">
                    <th>ID</th>
                    <th>第几期</th>
                    <th>开奖时间</th>
                    <th>1号</th>
                    <th>2号</th>
                    <th>3号</th>
                    <th>4号</th>
                    <th>5号</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowsOrder']" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.phase}}</td>
                    <td>{{$o.time_day}} {{$o.time_hour}}:{{$o.time_minute}}</td>
                    <td>{{$o.one}}</td>
                    <td>{{$o.two}}</td>
                    <td>{{$o.three}}</td>
                    <td>{{$o.four}}</td>
                    <td>{{$o.five}}</td>
                    <td>{{$o.time_post}}</td>
                    <td><a href="/Admin/setAward/del/id/{{$o.id}}">删除</a></td>
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