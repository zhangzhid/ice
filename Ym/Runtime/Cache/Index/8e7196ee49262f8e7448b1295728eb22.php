<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
		<title>密码找回 - <?php echo get_config_value('site_name');?></title>
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
				<h1 class="h4 text-center text-muted login-title mb30">找回密码 </h1>
				<h1 class="h4 text-center text-muted login-title mb30"><B>邮件发送成功，打开注册时的邮箱根据提示修改新密码。</b></h2>
			</div>
			<div class="text-center login-link">
				<a href="/index/user/reg">新用户注册</a> | <a href="/">返回首页</a>
			</div>
		</div>

	</body>

</html>