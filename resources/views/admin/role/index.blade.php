@extends('admin.layout.master')

@section('header')
	@parent
@endsection

@section('content')

@endsection
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 角色中心 <span class="c-gray en">&gt;</span> 角色列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c"> 日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
				<input type="text" class="input-text" style="width:250px" placeholder="输入角色名称" id="" name="">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜角色</button>
			</div>
				<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="role_create('添加管理员','/admin/role/create','1000','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a></span> <span class="r">共有数据：<strong></strong> 条</span> </div>
				<div class="cl pd-5 bg-1 bk-gray mt-20">
					<span class="r">
						共有数据：<strong>88</strong> 条
					</span>
				</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="80">ID</th>
							<th width="100">角色名称</th>
							<th width="40">管理员列表</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>

							<tr class="text-c">
								<td></td>
								<td></td>
								<td></td>
								<td class="td-manage">
									<a title="编辑" href="javascript:;" onclick="" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
									<a title="删除" href="javascript:;" onclick="" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
								</td>
							</tr>

					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>
@section('my-js')
<script type="text/javascript">
function role_create(title,url,w,h){
	layer_show(title,url,w,h);
}

</script>
@endsection
