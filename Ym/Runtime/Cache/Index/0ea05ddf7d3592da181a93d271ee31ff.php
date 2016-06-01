<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
		<title>会员登录 - <?php echo get_config_value('site_name');?></title>
		<meta name="keywords" content="<?php echo get_config_value('site_keywords');?>" />
		<meta name="description" content="<?php echo get_config_value('site_descript');?>" />
		<link rel="stylesheet" type="text/css" href="/Public/Css/reg.css" />
		<script type="text/javascript" src="/Public/Js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="/Public/Js/layer/layer.js"></script>
	</head>

	<body>
		<div class="wrapper">
			<div class="lheader text-center">
				<h1>
         <a href="/"><img src="<?php echo get_config_value('site_logo');?>"></a>
    </h1>
				<p class="text-muted">欢迎加入最专业的数据查询网</p>
			</div>
			<div class="login-wrap">
				<h1 class="h4 text-center text-muted login-title mb30">登录中心</h1>
				<form>
					<div class="form-group">
						<label class="required">用户名</label>
						<input type="text" placeholder="请输入您的用户名" name="username" id="username" class="form-control">
					</div>

					<div class="form-group">
						<label class="required" for="">密码</label>
						<input type="password" placeholder="请输入您的密码" name="password" id="password" class="form-control">
					</div>


					<div class="form-group">
						<button class="login_btn btn" type="button" id="submit">登录</button>
					</div>
				</form>
			</div>
			<div class="text-center login-link">
				<a href="/index/user/reg">新用户注册</a> | <a href="/">返回首页</a>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$('#submit').click(function(){
					$.post("<?php echo U('user/login');?>",{
						username:$('#username').val(),
						password:$('#password').val()
					},function(data){
						if(data.status=='0'){
							layer.alert(data.msg, {icon: 5});
						}else{
							layer.alert(data.msg, {icon: 6});
							setTimeout(function(){
								window.location.href="<?php echo U('user/index');?>";
							},2000)
						}
						console.log(data);
					})
				})
			})
		</script>
	</body>

</html>