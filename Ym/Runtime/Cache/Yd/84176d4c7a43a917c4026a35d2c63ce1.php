<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo get_config_value('site_name');?> - 微博数据管理</title>
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
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/yd/wb/logout/" >确定退出</a>
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
<div class="right" id="mainFrame">
	<div class="right_cont">
		<ul class="breadcrumb">当前位置： 后台管理
		</ul>

		<div class="title_right"><strong>微博数据查看</strong></div>
		<div style="width:900px;">
			<form id="searchForm" name="searchform" class="well form-search" action="" method="post"  onSubmit="check();">
				<table class="table table-bordered">
					<tr>
						<td width="10%" align="right" bgcolor="#f1f1f1">微博名称：</td>
						<td width="13%">
							<input type="text" name="search[title]" value="<?php echo ($search['title']); ?>" placeholder="支持模糊查询" class="span1-1" />
						</td>
						<td align="right" bgcolor="#f1f1f1">类别：</td>
						<td width="15%">
							<select name="search[w1]" class=" span1-1">
								<option value ='0' selected>全部</option>
								<?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $search[w1]): ?>selected<?php endif; ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td class="text-center">
							<input type="submit" value="查询" class="btn btn-info " style="width:80px;" onclick="checkaction(1);" />
						</td>
			</form>
			<td class="text-center"><a href="<?php echo U('add');?>"  class="btn btn-success" style="width:80px;" />增加微博数据</td>
			<td class="text-center"><a href="<?php echo U('import');?>" class="btn btn-primary" style="width:110px;" />Excel导入导出数据</td>
			</tr>
			</table>
			<table class="table table-bordered">
				<tr>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">ID</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">头像</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">类别</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">账号名称</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">微博ID</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">粉丝量</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">软广报价</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">硬广报价</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">周约次数</td>
					<td align="center" nowrap="nowrap" bgcolor="#f1f1f1">操作</td>
				</tr>
				<?php if($goods_list): if(is_array($goods_list)): foreach($goods_list as $key=>$vo): ?><tr>
							<td align="center"><?php echo ($vo["id"]); ?></td>
							<td align="center"><img src="<?php echo ($vo["z1"]); ?>" width="48px" height="48px"/></td>
							<td align="center"><?php echo get_title('brand',$vo[w1]);?></td>
							<td align="center"><?php echo ($vo["title"]); ?></td>
							<td align="center"><?php echo ($vo["w2"]); ?></td>
							<td align="center"><?php echo ($vo["w3"]); ?>万</td>
							<td align="center"><?php echo ($vo["w4"]); ?></td>
							<td align="center"><?php echo ($vo["w5"]); ?></td>
							<td align="center"><?php echo ($vo["z2"]); ?>万</td>
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
<script>
	function checkaction(v){
		if(v==0){
			document.searchform.action="<?php echo U('export');?>";
		}else{
			document.searchform.action="<?php echo U('index');?>";
		}
		searchform.submit();
	}

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