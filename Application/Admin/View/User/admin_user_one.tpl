<include file="menu" />
<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-user pr10 f16"></span><span class="f18">会员管理</span>
        </div>

    </div>

    <!--分隔线 start-->
    <div class="line2"></div>
    <div class="line3"></div>
    <!--分隔线 end-->
    <div class="row pt20">
        <div class="col-lg-12">
        	
        </div>
     </div>
    <!--表格 start-->
    <div class="row pt20">
        <div class="col-lg-12">
            <table class="table table-striped bg-ff">
                <thead>
                <tr class="success">
                    <th>用户ID</th>
                    <th>昵称</th>
                    <th>手机</th>
                    <th>积分</th>   
                    <th>注册时间</th>
                    <th>代理类型</th>
                    <th>100</th>
                    <th>50</th>
                    <th>操作</th>                 
                </tr>
                </thead>
                <tbody>
                <volist name="output" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.nickname}}</td>
                    <td>{{$o.phone}}</td>
                    <td>{{$o.points}}</td>
                    <td>{{$o.create_time}}</td>
                    <td>
                    	<eq name="o.tui_type" value="0">普通代理</eq>
                        <eq name="o.tui_type" value="1">高级代理</eq>
                    </td>
                    <td>
                       
                        <empty name="o.sum.sum_number_c1">
                        0
                        <else /> 
                        {{$o.sum.sum_number_c1}}
                        </empty> 
                    	
                    </td>
                    <td>
                    	<empty name="o.sum.sum_number_c2">
                        0
                        <else /> 
                        {{$o.sum.sum_number_c2}}
                        </empty> 
                    </td>
                    <td>
                        <a href="/Admin/user/user_one?id={{$o.id}}">下级</a>	
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