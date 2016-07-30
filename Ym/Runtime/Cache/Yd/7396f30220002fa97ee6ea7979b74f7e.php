<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登录</title>
<link rel="stylesheet" href="/Uz/Css/bootstrap.css" />
<script type="text/javascript" src="/Uz/Js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="/Uz/Js/bootstrap.min.js"></script>
<style type="text/css">
body{ background:#0066A8 url(/Uz/Img/login_bg.png) no-repeat center 0px;}
.tit{ margin:auto; margin-top:170px; text-align:center; width:350px; padding-bottom:20px;}
.login-wrap{ width:220px; padding:30px 50px 0 230px; height:180px; background:#fff url(/Uz/Img/user_admin.png) no-repeat 30px 40px; margin:auto; overflow: hidden;}
.login_input{ display:block;width:210px;}
.login_user{ background: url(/Uz/Img/input_icon_1.png) no-repeat 200px center; font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif}
.login_password{ background: url(/Uz/Img/input_icon_2.png) no-repeat 200px center; font-family:"Courier New", Courier, monospace}
.btn-login{ background:#40454B; box-shadow:none; text-shadow:none; color:#fff; border:none;height:35px; line-height:26px; font-size:14px; font-family:"microsoft yahei";}
.btn-login:hover{ background:#333; color:#fff;}
.copyright{ margin:auto; margin-top:10px; text-align:center; width:370px; color:#CCC}
@media (max-height: 700px) {.tit{ margin:auto; margin-top:100px; }}
@media (max-height: 500px) {.tit{ margin:auto; margin-top:50px; }}
</style>
</head>

<body>
<div class="tit"><img src="/Uz/Img/tit.png" alt="" /></div>
<div class="login-wrap">
	<form action="" method="post" name="login_main" id="login_main">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="25" valign="bottom">用户名：</td>
    </tr>
    <tr>
      <td><input type="text" class="login_input login_user" id="admin_name" type="text" name="admin_name"  /></td>
    </tr>
    <tr>
      <td height="35" valign="bottom">密  码：</td>
    </tr>
    <tr>
      <td><input type="password"  class="login_input login_password" id="admin_password" type="password" name="admin_password" /></td>
    </tr>
    <tr>
      <td height="60" valign="bottom">
      	<input type="button" value="登录" class="btn btn-block btn-login" /> </td>
    </tr>
  </table>
</div>
</form>
<div class="copyright">建议使用IE8以上版本或360 火狐 谷歌浏览器</div>
<script type='text/javascript'>
$(function(){
  $('.btn-login').click(function(){
    var admin_name=$("#admin_name").val();
    var admin_password=$("#admin_password").val();
    if(admin_password==""||admin_name==""){
        alert('登录名与密码不能为空 ');
        $("#admin_name").focus();
        return false;
    }else{
        var url = "<?php echo U('/yd/login/check');?>";
        $.post(url, { admin_name:admin_name, admin_password:admin_password}, function(msg){
        if(msg.info == 'ok') {
          alert('登录成功，正在转向后台主页！');
          window.location.href = msg.callback;
        } else {
          alert(msg.info);
        }
      }, 'json').error(function(){
        alert("网络连接错误，请稍后再试");
      });

    }
  })

});
</script>
</body>
</html>