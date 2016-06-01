<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo get_config_value('site_name');?> - 类别管理</title>
		<link rel="stylesheet" href="/Uz/Css/bootstrap.css" />
		<link rel="stylesheet" href="/Uz/Css/css.css" />
		<script type="text/javascript" src="/Uz/Js/jquery1.9.0.min.js"></script>
		<script type="text/javascript" src="/Uz/Js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/Uz/Js/sdmenu.js"></script>
		<script type="text/javascript" src="/Uz/Js/laydate/laydate.js"></script>
		<script type="text/javascript" src="/Uz/Js/Validform_v5.3.2_min.js"></script>

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
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/Yd/Sx/logout/" >确定退出</a>
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
		<div class="right" id="mainFrame">
			<div class="right_cont">
				<ul class="breadcrumb">当前位置： 后台管理
				</ul>

				<div class="title_right"><strong>类别管理</strong></div>
				<div style="width:900px;">
					<table class="table table-bordered">
						<tr>
							<td class="text-center">
							<td class="text-center"><a href="<?php echo U('add');?>"  class="btn btn-success" style="width:80px;" />增加类别</td>
							</td>
							</form>
						</tr>
					</table>
					<table class="table table-bordered">
						<tr>
							<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">ID</td>
							<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">类别名称</td>
							<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">增加时间</td>
							<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">操作</td>
						</tr>
						<?php if($goods_list): if(is_array($goods_list)): foreach($goods_list as $key=>$vo): ?><tr>
									<td align="center"><a href="#"><?php echo ($vo["id"]); ?></a></td>
									<td align="center"><?php echo ($vo["title"]); ?></td>
									<td align="center"><?php echo ($vo["add_time"]); ?></td>
									<td align="center">
										<a title="编辑" class=" btn  btn-info" href="<?php echo U("edit?id=$vo[id]");?>">编辑</a>
										<a title="删除" class=" btn  btn-danger " href="<?php echo U("del?id=$vo[id]");?>">删除</a>
									</td>
								</tr><?php endforeach; endif; ?>
							<?php else: ?>
							<tr>
								<td colspan="13" align="center">暂无数据</td>
							</tr><?php endif; ?>
					</table>
							<?php echo ($page); ?>
					</table>
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