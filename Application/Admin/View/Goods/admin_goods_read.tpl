<!--right start-->
<div class="col-lg-10 pd0 pl20 right">
    <!--标题 start-->
    <div class="row pt20 pb20 lh30">
        <div class="col-lg-6">
            <span class="glyphicon glyphicon-picture pr10 f16"></span><span class="f18">夺宝商品管理</span>
        </div>
        <div class="col-lg-6 text-right"> <a href="{{:U('Admin/Goods/add')}}">
      <button type="button" class="btn btn-info btn-sm" >添加商品</button>
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
                    <th>产品ID</th>
                    <th>分类名称</th>
                    <th>图片</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="output['rowGoods']" id="o" mod="2">
                <tr <eq name="mod" value="1">class="warning"</eq> >
                    <td>{{$o.id}}</td>
                    <td>{{$o.name}}</td>
                    <td><img src="{{$o.img_url}}" /></td>
                    <td><a href="{{:U('Goods/edit', array('id'=>$o['id']))}}">编辑</a></td>
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