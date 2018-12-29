<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-list pr10 f16"></span><span class="f18">夺宝分类管理</span>
        </div>
      
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
                    <th>分类ID</th>
                    <th>分类名称</th>
                    <th>夺宝价</th>
                    <th>小数</th>
                    <th>大数</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowCata']" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.name}}</td>
                    <td>{{$o.price}}</td>
                    <td>{{$o.small}}</td>
                    <td>{{$o.big}}</td>
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