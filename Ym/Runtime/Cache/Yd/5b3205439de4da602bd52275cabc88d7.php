<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_config_value('site_name');?> - 增加微信</title>
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
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/Yd/Wx/logout/" >确定退出</a>
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
<ul class="breadcrumb">当前位置： 后台管理
</ul>
   
   <div class="title_right"><strong><?php if($goods_info): ?>编辑<?php else: ?>添加<?php endif; ?>微信数据</strong></div>
   <div style="width:650px;">
   	<form  action="<?php echo U('/Yd/Wx/save');?>" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value="<?php echo ($goods_info["id"]); ?>" />
      <input name="w7" type="hidden" value="2" />
   <table class="table table-bordered" >
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">类别：</td>
   	<td><select name="w1"  class="span2">
                        <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $goods_info[w1]): ?>selected<?php endif; ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
   		<span class="Validform_checktip"></span></td>
     </tr>
       <tr>
           <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">头像地址：</td>
           <td width="68%">
               <input type="text" name="z1" value="<?php echo ($goods_info["z1"]); ?>" datatype="*"  nullmsg="请填写头像地址！" errormsg="不能少于2个字符" />
               <span class="Validform_checktip">格式介绍：真实图片地址</span></td>
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">微信名称：</td>
       <td width="68%"><input type="text" name="title" value="<?php echo ($goods_info["title"]); ?>" datatype="*2-50"  nullmsg="请填写名称！" errormsg="不能少于2个字符大于50个汉字" />
       	<span class="Validform_checktip">格式介绍：中文</span>
       </td>
     </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">微信号：</td>
       <td width="68%"><input type="text" name="w2" value="<?php echo ($goods_info["w2"]); ?>"  datatype="*"  nullmsg="请填写微信号！" />
       	<span class="Validform_checktip">格式介绍：字母数字</span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">粉丝量：</td>
       <td ><input type="text" name="w3" value="<?php echo ($goods_info["w3"]); ?>"  datatype="*"  nullmsg="请填写数量！" />
       	<span class="Validform_checktip">格式介绍：纯数字(不用+万) 1=1万</span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">头条报价：</td>
       <td ><input type="text" name="w4" value="<?php echo ($goods_info["w4"]); ?>"  datatype="*"  nullmsg="请填写数量！" />
       	<span class="Validform_checktip">格式介绍：3.3万 - 3.8万</span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">非头条报价：</td>
       <td ><input type="text" name="w5" value="<?php echo ($goods_info["w5"]); ?>"  datatype="*"  nullmsg="请填写数量！" />
       	<span class="Validform_checktip">格式介绍：2.1万 - 2.9万</span>
       </td> 
       </tr>
     <tr>
       <td align="right" nowrap="nowrap" bgcolor="#f1f1f1">阅读数：</td>
       <td ><input type="text" name="z2" value="<?php echo ($goods_info["z2"]); ?>"  datatype="*"  nullmsg="请填写数量！" />
       	<span class="Validform_checktip">格式介绍：纯数字(不用+万) 1.2=1.2+</span>
       </td> 
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