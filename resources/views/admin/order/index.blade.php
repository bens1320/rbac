@extends('admin.layout.master')

@section('header')
	@parent
@endsection

@section('content')
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单中心 <span class="c-gray en">&gt;</span> 订单列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c"> 日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
				<input type="text" class="input-text" style="width:250px" placeholder="输入订单名称" id="" name="">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜订单</button>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="order_create('添加订单','/admin/order/create','1000','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加订单</a></span> <span class="r">共有数据：<strong></strong> 条</span> </div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25">ID</th>
							<th width="100">订单编号</th>
							<th width="100">订单地址</th>
							<th width="100">订单状态</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>

						<tr class="text-c">
						<td>1</td>
						<td>ddh201712051035362369</td>
						<td>四川省成都市</td>
						<td class="td-status"><span class="label label-success radius">已付款</span></td>
						<td class="td-manage">
								<a title="编辑" href="javascript:;" onclick="order_edit('修改订单', '/admin/order/edit/1', '1000', '510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
								<a title="删除" href="javascript:;" onclick='order_del("订单编号：ddh201712051035362369", "1")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>


					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>
@endsection

@section('my-js')
<script type="text/javascript">
function order_create(title,url,w,h){
	layer_show(title,url,w,h);
}

function order_edit(title,url,w,h){
	layer_show(title,url,w,h);
}




function order_del(name, id) {
	layer.confirm('确认要删除【' + name +'】吗？',function(index){
		$.ajax({
    type: 'get', // 提交方式 get/post
    url: '/admin/order/delete/'+id, // 需要提交的 url
    dataType: 'json',
    data: {
      _token: "{{csrf_token()}}"
    },
    success: function(data) {
      if(data == null) {
        layer.msg('服务端错误', {icon:2, time:2000});
        return;
      }
      if(data.status != 0) {
        layer.msg(data.message, {icon:2, time:2000});
        return;
      }

      layer.msg(data.message, {icon:1, time:2000});
      location.replace(location.href);
    },
    error: function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
			if(status == 'parsererror'){
				layer.msg('没有权限', {icon:2, time:2000});
				location.replace(location.href);
			}else{
				layer.msg('ajax error', {icon:2, time:2000});
			}
    },
    beforeSend: function(xhr){
      layer.load(0, {shade: false});
    }
		});
	});
}
</script>
@endsection
