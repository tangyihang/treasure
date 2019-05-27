<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">充值转账二维码管理</span>
        </div>
        <div class="col-lg-6 text-right">
            <a href="{{:U('Admin/Code/add')}}">
                <button type="button" class="btn btn-info btn-sm">添加二维码</button>
            </a>
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
                    <th>二维码ID</th>
                    <th>类型</th>
                    <th>名称</th>
                    <th>收款账号</th>
                    <th>开户行</th>
                    <th>开户行网点</th>
                    <th>二维码图片</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowCodes']" id="o" mod="2">
                    <tr
                    <eq name="mod" value="1">class="warning"</eq>
                    >
                    <td>{{$o.id}}</td>
                    <td>
                        <eq name="o.type" value="0">微信</eq>
                        <eq name="o.type" value="1">支付宝</eq>
                        <eq name="o.type" value="2">银行卡</eq>
                    </td>
                    <td>{{$o.name}}</td>
                    <td>{{$o.account}}</td>
                    <td>{{$o.opening_bank}}</td>
                    <td>{{$o.opening_bank_branch}}</td>
                    <td>
                        <a target="_blank" href="{{$o.code_img}}">
                            <img width="30" height="30" src="{{$o.code_img}}"/>
                        </a>
                    </td>
                    <td>
                        <a href="{{:U('Code/edit', array('id'=>$o['id']))}}">修改</a> |
                        <a href="{{:U('Code/del', array('id'=>$o['id'], 'status' => '2'))}}">删除</a> |
                        <eq name="o.status" value="1">
                            <a href="{{:U('Code/isstop', array('id'=>$o['id'], 'status' => '0'))}}">
                                停用
                            </a>
                        </eq>
                        <eq name="o.status" value="0">
                            <a href="{{:U('Code/isstop', array('id'=>$o['id'], 'status' => '1'))}}">
                                启用
                            </a>
                        </eq>
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