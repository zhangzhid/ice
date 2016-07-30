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
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/yd/index/logout/" >确定退出</a>
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
		<a href="/yd/index">系统设置</a>
		<a href="/yd/em">邮箱配置</a>
		<a href="/yd/news/">单页管理</a>
		<a href="/yd/ad/">广告管理</a>
		<a href="/yd/top/">热门搜索</a>
		<a href="/yd/hd/">幻灯管理</a>
	</div>
	<div class="collapsed">
		<span>营销数据管理</span>
		<a href="/yd/wb/">微博数据</a>
		<a href="/yd/wx/">微信数据</a>
		<a href="/yd/sz/">数字营销</a>
		<a href="/yd/wl/">网络公关</a>
		<!--<a href="/yd/qt/">其他数据</a>-->
		<a href="/yd/sx/">类别管理</a>
	</div>
		<div class="collapsed">
		<span>用户会员管理</span>
			<a href="/yd/user/">会员管理</a>
			<a href="/yd/notes/">搜索记录</a>
			<a href="/yd/admin/">管理员</a>
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
</script>N

     <div class="right"  id="mainFrame">
     
<div class="right_cont">
<ul class="breadcrumb">当前位置： 后台管理
</ul>
   
   <div class="title_right"><strong>基本设置</strong></div>
   <div style="width:900px;">
   	<form id="addform" action="<?php echo U('/yd/index/save');?>" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value="" />
   <table class="table table-bordered" >
       <tr>
           <td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">网站地址：</td>
           <td><input type="text" name="site_url" value="<?php echo get_config_value('site_url');?>" datatype="s2-20" nullmsg="请填写网站名称！" errormsg="网站名称至少2个最多20个汉字！" class="span10"  />
               <span class="Validform_checktip"></span></td>
       </tr>
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">网站名称：</td>
   	<td><input type="text" name="site_name" value="<?php echo get_config_value('site_name');?>" datatype="s2-20" nullmsg="请填写网站名称！" errormsg="网站名称至少2个最多20个汉字！" class="span10"  />
   		<span class="Validform_checktip"></span></td>
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">网站标题：</td>
       <td width="38%"><input type="text" name="site_title" value="<?php echo get_config_value('site_title');?>" class="span10" nullmsg="请填写网站标题！" errormsg="网站名称至少2个汉字！"  />
       	<span class="Validform_checktip"></span>
       </td> 
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">关键词：</td>
       <td width="38%"><input type="text" name="site_keywords" value="<?php echo get_config_value('site_keywords');?>" class="span10" nullmsg="请填写网站关键词！" errormsg="网站名称至少2个汉字！" />
       	<span class="Validform_checktip"></span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">网站描述：</td>
       <td ><input type="text" name="site_descript" value="<?php echo get_config_value('site_descript');?>" class="span10" nullmsg="请填写网站描述！" errormsg="网站名称至少2个汉字！" />
       	<span class="Validform_checktip"></span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">底部版权：</td>
 <td colspan="3"><textarea name="site_copyright" class="span10" nullmsg="请填写底部版权！" errormsg="网站名称至少2个汉字！" ><?php echo get_config_value('site_copyright');?></textarea>
       <span class="Validform_checktip"></span></td>
       </tr>
       <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">网站LOGO：</td>
       <td><label>(<font color="red">尺寸200px*33px,建议背景为白色的png格式图片</font>)</label>
          <img src="<?php echo get_config_value('site_logo');?>" width="100px">
          <input  name="site_logo" type="file" value="">        
          <span class="Validform_checktip"></span></td>
          </tr>
   </table>
   <table  class="margin-bottom-20 table  no-border" >
        <tr>
     	<td class="text-center"><input type="submit" value="确定" class="btn btn-info " style="width:80px;" /></td>
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