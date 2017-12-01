@extends('admin.layout.master')

@section('header')
@endsection

@section('content')
<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-member-edit">
	  {{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
					 <input type="text" class="input-text" value="" placeholder="" name="rolename" >
			</div>
			<div class="col-4"> </div>
		</div>
	  <div class="row cl">
	    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
	    <div class="formControls col-xs-8 col-sm-9">
	    </div>
	    <div class="col-4"> </div>
	  </div>

	  <div class="row cl">
	    <div class="col-9 col-offset-3">
	      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	    </div>
	  </div>
	</form>
</article>
@endsection

@section('my-js')
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
  var ue = UE.getEditor('editor');

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-member-edit").validate({
		rules:{
			nickname:{
				required:true,
				minlength:4,
				maxlength:32
			},
			phone:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
		  $('#form-member-edit').ajaxSubmit({
          type: 'post', // 提交方式 get/post
          url: '/admin/service/member/edit', // 需要提交的 url
          dataType: 'json',
          data: {
            id: "",
            nickname: $('input[name=nickname]').val(),
            phone: $('input[name=phone]').val(),
            email: $('input[name=email]').val(),
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
@endsection
