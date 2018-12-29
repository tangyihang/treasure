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
        	<form action="" method="get">
            	
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">手机号：</span>
                        <input type="text" name="phone" value="{{$where.phone}}" class="form-control">
                    </div>
                </div>
                
                <div class="col-lg-3">
                	<div class="input-group input-group-sm">
                        <span class="input-group-addon">推广人：</span>
                        <input type="text" name="parent_id" value="{{$where.parent_id}}" class="form-control">
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
                    <th>用户ID</th>
                    <th>昵称</th>
                    <th>手机</th>
                    <th>积分</th>   
                    <th>注册时间</th>
                    <th>代理类型</th>
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
                    	<eq name="o.tui_type" value="0"><a href="/Admin/user/set_type?id={{$o.id}}&type=1">设为高级代理</a></eq>
                        <eq name="o.tui_type" value="1"><a href="/Admin/user/set_type?id={{$o.id}}&type=0">设为普通代理</a></eq>
                        
                        |
                        
                        <a href="/Admin/user/user_one?id={{$o.id}}">下级</a>

                        |

                        <a href="/Admin/user/bank?id={{$o.id}}">修改银行卡</a>
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