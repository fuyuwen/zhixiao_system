<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2017-03-24 14:23:22, compiled from ./web/template/admingroup/addinfo.htm */ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>销售管理系统</title>
	<base href="<?php echo InitPHP::getConfig('url');?>"/>
    <link rel="stylesheet" href="/static/css/base.css">
    <link rel="stylesheet" href="/static/css/css.css">
    <script src="/static/js/jquery.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加角色</strong></div>
  <div class="body-content">
	<form id="form" class="form-x" >
      <div class="form-group">
        <div class="label">
          <label>角色名称：</label>
        </div>
        <div class="field">
		  <input name="name" type="text" class="input w50" id="name" value="<?php echo $info['name'];?>" />       
          <div class="tips"></div>
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label>角色权限：</label>
        </div>
        <div class="field" id="power">
			<fieldset class="source">
				<legend>业绩管理</legend>
					<input name="model_power[]" type="checkbox" value="1012" > 我的业绩 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1013" > 我的客户 &nbsp;&nbsp;
			</fieldset>
			<fieldset class="source">
				<legend>客户管理</legend>
					<input name="model_power[]" type="checkbox" value="1014" > 客户分配 &nbsp;&nbsp;
					<br />
			</fieldset>
			<fieldset class="source">
				<legend>系统管理</legend>
					<input name="model_power[]" type="checkbox" value="1017" > 部门用户管理 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1018" > 部门用户管理-添加部门 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1019" > 部门用户管理-删除部门 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1020" > 部门用户管理-修改部门显示 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1021" > 部门用户管理-修改部门&nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1022" > 角色管理-添加角色 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1023" > 角色管理-修改显示角色 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1024" > 角色管理-修改角色 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1025" > 角色管理-删除 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1026" > 用户管理 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1027" > 用户管理-添加 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1028" > 用户管理-修改显示 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1029" > 用户管理-修改 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1030" > 用户管理-删除 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1031" > 用户分配 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1032" > 用户分配-重新分配显示 &nbsp;&nbsp;
					<br />
					<input name="model_power[]" type="checkbox" value="1033" > 用户分配-重新分配 &nbsp;&nbsp;
					<br />
			</fieldset>
			<div class="tipss"></div>
        </div>
      </div>

     <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
			<input name="grade" id="grade" type="hidden" value="1" />
            <button  class="button bg-main icon-check-square-o" type="button" onclick="sub(this)"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
function sub(obj){

	var name  =  $("#name").val();
	var id    =  $("#id").val();
	var grade =  $("#grade").val();

	if(name == ""){
		$(".tipss").html("<font color=\"red\">用户名不能为空</font>").show();
		return;
	}
	
	var power = null;
	$("#power fieldset input[type=checkbox]").each(function(){
		if(this.checked){
			power = $(this).val();
		}
	});  

	if(power == null){
		$(".tipss").html("<font color=\"red\">角色权限不能为空</font>").show();
		return;
	}
	
	$.ajax({
		url: '/admingroup/<?php echo $action;?>_save',
		type: 'post',
		dataType:'json',
		data: $('#form').serialize(),
		success: function(data) {
			if(data.status==1){
				window.location.href="/admingroup/run";
			}else{
				alert(data.message);
				$("#tipss").html("<font color=\"red\">"+data.message+"</font>");
				setTimeout(function() {
					$("#tipss").html('');
				}, 3000);
				return false;
			}
		}
	});

};
</script>
</body>
</html>
