@extends('admin.layout.master')

@section('header')
@endsection

@section('content')
<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级权限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" name="roleid" size="1">
					<option value="">请选择</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="pername">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>模块名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="pername">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>控制器名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="pername">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>操作方法名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="pername">
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@endsection


@section('my-js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-category-add").validate({
		rules:{
			name:{
				required:true,
				minlength:4,
				maxlength:16
			},
			category_no:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			 $('#form-category-add').ajaxSubmit({
            type: 'post', // 提交方式 get/post
            url: '/admin/service/category/add', // 需要提交的 url
            dataType: 'json',
            data: {
              name: $('input[name=name]').val(),
              category_no: $('input[name=category_no]').val(),
              parent_id: $('select[name=parent_id] option:selected').val(),
              preview: ($('#preview_id').attr('src')!='/admin/images/icon-add.png'?$('#preview_id').attr('src'):''),
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
    					parent.location.reload();
            },
            error: function(xhr, status, error) {
              console.log(xhr);
              console.log(status);
              console.log(error);
              layer.msg('ajax error', {icon:2, time:2000});
            },
            beforeSend: function(xhr){
              layer.load(0, {shade: false});
            },

          });

          return false;
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
@endsection
