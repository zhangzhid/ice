<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_config_value('site_name');?> - 后台管理首页</title>
<link rel="stylesheet" href="/Uz/Css/bootstrap.css" />
<link rel="stylesheet" href="/Uz/Css/css.css" />
<script type="text/javascript" src="/Uz/Js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="/Uz/Js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Uz/Js/sdmenu.js"></script>
<script type="text/javascript" src="/Uz/Js/laydate/laydate.js"></script>
<script  type="text/javascript"  src="/Uz/Js/Validform_v5.3.2_min.js"></script>

</head>

<body>
<div class="header">
	 <div class="logo"><img  src="<?php echo get_config_value('site_logo');?>" /></div>
     
				<div class="header-right">
              <i class="icon-off icon-white"></i> <a id="modal-973558" href="#modal-container-973558" role="button" data-toggle="modal">退出</a> <i class="icon-user icon-white"></i> <a href="/" target="_blank">网站首页</a>
                <div id="modal-container-973558" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:300px; margin-left:-150px; top:30%">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">
						注销系统
					</h3>
				</div>
				<div class="modal-body">
					<p>
						您确定要注销退出系统吗？
					</p>
				</div>
				<div class="modal-footer">
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/Yd/Em/logout/" >确定退出</a>
				</div>
			</div>
				</div>
</div>
<!-- 顶部 -->     
            
<div id="middle">
     <div class="left">
     
     <script type="text/javascript">
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
</script>

<div id="my_menu" class="sdmenu">
	<div >
		<span>常用管理</span>
		<a href="/Yd/index">系统设置</a>
		<a href="/Yd/em">邮箱配置</a>
		<a href="/Yd/news/">单页管理</a>
		<a href="/Yd/ad/">广告管理</a>
		<a href="/Yd/top/">热门搜索</a>
		<a href="/Yd/hd/">幻灯管理</a>
	</div>
	<div class="collapsed">
		<span>营销数据管理</span>
		<a href="/Yd/wb/">微博数据</a>
		<a href="/Yd/wx/">微信数据</a>
		<a href="/Yd/sz/">数字营销</a>
		<!--<a href="/Yd/qt/">其他数据</a>-->
		<a href="/Yd/sx/">类别管理</a>
	</div>
		<div class="collapsed">
		<span>用户会员管理</span>
			<a href="/Yd/user/">会员管理</a>
			<a href="/Yd/notes/">搜索记录</a>
			<a href="/Yd/admin/">管理员</a>
	</div>

</div>

     </div>
     <div class="Switch"></div>
     <script type="text/javascript">
	$(document).ready(function(e) {
    $(".Switch").click(function(){
	$(".left").toggle();
	 
		});
});
</script>

     <div class="right"  id="mainFrame">
     
<div class="right_cont">
<ul class="breadcrumb">当前位置： 邮箱配置
</ul>
   
   <div class="title_right"><strong>参数设置</strong></div>
   <div style="width:600px;">
   	<form id="addform" action="<?php echo U('/Yd/Em/save');?>" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value="1" />
   <table class="table table-bordered" >
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">邮件显示名：</td>
   	<td><input type="text" name="email_title" value="<?php echo ($em["email_title"]); ?>" datatype="*" nullmsg="请填写内容！" errormsg="请填写内容" class="span4"  />
   		<span class="Validform_checktip">如:百度公司</span></td>
     </tr>
       <tr>
           <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">邮箱服务器地址：</td>
           <td><input type="text" name="email_host" value="<?php echo ($em["email_host"]); ?>" datatype="*" nullmsg="请填写内容！" errormsg="请填写内容" class="span4"  />
               <span class="Validform_checktip">如:smtp.163.com</span></td>
       </tr>
       <tr>
           <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">邮箱地址：</td>
           <td><input type="text" name="email_name" value="<?php echo ($em["email_name"]); ?>" datatype="*" nullmsg="请填写内容！" errormsg="请填写内容" class="span4"  />
               <span class="Validform_checktip">如:baidu@163.com</span></td>
       </tr>
       <tr>
           <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">邮箱账号：</td>
           <td><input type="text" name="email_user" value="<?php echo ($em["email_user"]); ?>" datatype="*" nullmsg="请填写内容！" errormsg="请填写内容" class="span4"  />
               <span class="Validform_checktip">如:baidu@163.com</span></td>
       </tr>
       <tr>
           <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">邮箱密码：</td>
           <td><input type="password" name="email_password" value="<?php echo ($em["email_password"]); ?>" datatype="*" nullmsg="请填写内容！" errormsg="请填写内容" class="span4"  />
               <span class="Validform_checktip">不是登陆密码,是第三方密码</span></td>
       </tr>
   </table>
   <table  class="margin-bottom-20 table  no-border" >
        <tr>
     	<td class="text-center"><input type="submit" value="确定" class="btn btn-info " style="width:80px;" /></td>
     </tr>
 </table>
 </form>
       <form  action="<?php echo U('/Yd/Em/email');?>" method="post" enctype="multipart/form-data">
           <table class="table table-bordered" >
           <tr>
               <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">收件人地址：</td>
               <td><input type="text" name="et" value="yf2019@qq.com" class="span4"  /> </td>
           </tr>
           <tr>
               <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">标题：</td>
               <td><input type="text" name="eb" value="小啊小标题" class="span4"  /> </td>
           </tr>
           <tr>
               <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">内容：</td>
               <td><input type="text" name="en" value="我是一只小小鸟" class="span4"  /> </td>
           </tr>
           </table>
           <table  class="margin-bottom-20 table  no-border" >
               <tr>
                   <td class="text-center"><input type="submit" value="测试邮件是否正常" class="btn btn-info " style="width:160px;" /></td>
               </tr>
           </table>
       </form>


   </div>
     </div>
     </div>
    </div>
<script>
$(function(){
  //提交表单合法性验证
  $("#addform").Validform({
    tiptype:function(msg,o,cssctl){
      if(!o.obj.is("form")){
          var objtip=o.obj.siblings(".Validform_checktip");
          cssctl(objtip,o.type);
          objtip.text(msg);
      }
    },

  });
})
</script>
<div id="footer"><?php echo ($yb["wcoy"]); ?></div>
 
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
laydate.skin('molv');
laydate({elem: '#Calendar2'});
}();
 
</script>

</body>
</html>