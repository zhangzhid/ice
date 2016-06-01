<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_config_value('site_name');?> - 单页管理</title>
<link rel="stylesheet" href="/Uz/Css/bootstrap.css" />
<link rel="stylesheet" href="/Uz/Css/css.css" />
<script type="text/javascript" src="/Uz/Js/jquery1.9.0.min.js"></script>
<script type="text/javascript" src="/Uz/Js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Uz/Js/sdmenu.js"></script>
<script type="text/javascript" src="/Uz/Js/laydate/laydate.js"></script>
<script  type="text/javascript"  src="/Uz/Js/Validform_v5.3.2_min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Uz/um/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Uz/um/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Uz/um/lang/zh-cn/zh-cn.js"></script>
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
					 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button> <a class="btn btn-primary" style="line-height:20px;" href="/Yd/News/logout/" >确定退出</a>
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
   
   <div class="title_right"><strong>单页修改</strong></div>
   <div style="width:900px;">
   	<form id="addform" action="<?php echo U('/Yd/News/save');?>" method="post" enctype="multipart/form-data">
      <input name="id" type="hidden" value="<?php echo ($info["id"]); ?>" />
   <table class="table table-bordered" >
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">标题：</td>
   	<td width="38%"><input type="text" name="title" value="<?php echo ($info["title"]); ?>" datatype="*" nullmsg="未填写!"  class="span10"  />
   		<span class="Validform_checktip"></span></td>
     </tr>
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">关键词：</td>
   	<td width="38%"><input type="text" name="key" value="<?php echo ($info["key"]); ?>" datatype="*" nullmsg="未填写!"  class="span10"  />
   		<span class="Validform_checktip"></span></td>
     </tr>
   <tr>
   	<td   align="right" nowrap="nowrap" bgcolor="#f1f1f1">描述：</td>
   	<td width="38%"><input type="text" name="des" value="<?php echo ($info["des"]); ?>" datatype="*" nullmsg="未填写!"  class="span10"  />
   		<span class="Validform_checktip"></span></td>
     </tr>
     <tr>
   <td  colspan="2"><textarea name="com" class="span10" id="editor" style=" width: 900px; height: 500px;" ><?php echo ($info["com"]); ?></textarea></td>
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
<script type="text/javascript">
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
            beforeSubmit:function(curform){
                $(".tag-sure").trigger("click");
            },
			label:"label",
		    ajaxPost:true,
		    callback:function(data){
		      if(data.status=="ok"){
		          alert(data.info);
		          window.location.href = "<?php echo U('index');?>";
		      }else{
		        alert(data.info);
		      }
		    }
            
        });

        //双向选择
        var leftSel = $("#selectL");
        var rightSel = $("#selectR");
        $("#toright").bind("click",function(){      
            leftSel.find("option:selected").each(function(){
                $(this).remove().appendTo(rightSel);
            });
        });
        $("#toleft").bind("click",function(){       
            rightSel.find("option:selected").each(function(){
                $(this).remove().appendTo(leftSel);
            });
        });
        leftSel.dblclick(function(){
            $(this).find("option:selected").each(function(){
                $(this).remove().appendTo(rightSel);
            });
        });
        rightSel.dblclick(function(){
            $(this).find("option:selected").each(function(){
                $(this).remove().appendTo(leftSel);
            });
        });
        $(".tag-sure").click(function(){
            var selVal = [];
            rightSel.find("option").each(function(){
                selVal.push(this.value);
            });
            selVals = selVal.join(",");
            if(selVals==""){
                //alert("没有选择任何项！");
            }else{
                $("#type_ids").val(selVals);
            }
        });

    });
</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

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