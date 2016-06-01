<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
		<title>会员注册 - <?php echo get_config_value('site_name');?></title>
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
				<h1 class="h4 text-center text-muted login-title mb30">注册新会员</h1>
				<form >

					<div class="form-group">
						<i>*</i>
						<label class="required">用户名</label>
						<input type="text" placeholder="请输入您的用户名" name="username" id="username" class="form-control">
					</div>

					<div class="form-group">
						<i>*</i>
						<label class="required" for="">密码</label>
						<input type="password" placeholder="不少于 6 位" name="password" id="password" class="form-control">
					</div>

					<div class="form-group">
						<label class="required">QQ号</label>
						<input type="text" placeholder="请输入您的QQ号" name="qq" id="qq" class="form-control">
					</div>

					<div class="form-group">
						<i>*</i>
						<label class="required">Email</label>
						<input type="text" placeholder="请输入您的常用邮箱" name="email" id="email" class="form-control">
					</div>

					<div class="form-group">
						<label class="required">电话</label>
						<input type="text" placeholder="请输入您的电话号码" name="tel" id="tel" class="form-control">
					</div>

					<div class="form-group">
						<i>*</i>
						<label class="required">从事行业</label>
						<select name="xy" id="xy" class="form-control">
							<option value="网络营销">网络营销</option>
							<option value="安全防护">安全防护</option>
							<option value="电子器件">电子器件</option>
							<option value="包装印刷">包装印刷</option>
							<option value="汽摩配件">汽摩配件</option>
							<option value="五金工具">五金工具</option>
							<option value="照明工业">照明工业</option>
							<option value="仪器仪表">仪器仪表</option>
							<option value="交通运输">交通运输</option>
							<option value="服饰鞋帽">服饰鞋帽</option>
							<option value="家居用品">家居用品</option>
							<option value="通信通讯">通信通讯</option>
							<option value="食品饮料">食品饮料</option>
							<option value="数码电脑">数码电脑</option>
							<option value="办公文教">办公文教</option>
							<option value="家用电器">家用电器</option>
							<option value="运动休闲">运动休闲</option>
							<option value="传媒广电">传媒广电</option>
							<option value="纺织皮革">纺织皮革</option>
							<option value="建材建筑">建材建筑</option>
							<option value="医药医疗">医药医疗</option>
							<option value="回收二手">回收二手</option>
							<option value="商务服务">商务服务</option>
							<option value="生活服务">生活服务</option>
							<option value="综合及其它">综合及其它</option>
						</select>
					</div>

					<div class="form-group">
						<button  id="submit" class="login_btn btn " type="button">注册</button>
					</div>
				</form>
			</div>
			<div class="text-center login-link">
				<a href="/index/user/login">立即登录</a> | <a href="/">返回首页</a>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$('#submit').click(function(){
					$.post("<?php echo U('user/reg');?>",{
						username:$('#username').val(),
						password:$('#password').val(),
						qq:$('#qq').val(),
						email:$('#email').val(),
						tel:$('#tel').val(),
						xy:$('#xy').val(),
					},function(data){
						if(data.status=='0'){
							layer.alert(data.msg, {icon: 5});
						}else{
							layer.alert(data.msg, {icon: 6});
							setTimeout(function(){
								window.location.href="<?php echo U('user/login');?>";
							},2000)
						}
						console.log(data);
					})
				})
			})
		</script>
	</body>

</html>