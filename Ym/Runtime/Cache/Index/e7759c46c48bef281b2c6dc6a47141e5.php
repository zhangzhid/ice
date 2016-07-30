<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo get_config_value('site_title');?> - <?php echo get_config_value('site_name');?></title>
	<meta name="keywords" content="<?php echo get_config_value('site_keywords');?>" />
	<meta name="description" content="<?php echo get_config_value('site_descript');?>" />
	<link href="/Public/Css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Js/layer/layer.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$change_li = $(".wptab li");
			$change_li.each(function(i) {
				if(i>=1){
					$(".wpcont").eq(i).hide();
				}
				$(this).mouseover(function() {
					$(this).addClass("curent").siblings().removeClass("curent");
					$(".wpcont").eq(i).show().siblings().hide();
				})
			});

		});
		$(function() {
			var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
			var len = $("#focus ul li").length; //获取焦点图个数
			var index = 0;
			var picTimer;

			//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
			var btn = "<div class='btnBg'></div><div class='btn'>";
			for (var i = 0; i < len; i++) {
				btn += "<span></span>";
			}
			btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
			$("#focus").append(btn);
			$("#focus .btnBg").css("opacity", 0.5);

			//为小按钮添加鼠标滑入事件，以显示相应的内容
			$("#focus .btn span").css("opacity", 0.4).mouseenter(function() {
				index = $("#focus .btn span").index(this);
				showPics(index);
			}).eq(0).trigger("mouseenter");

			//上一页、下一页按钮透明度处理
			$("#focus .preNext").css("opacity", 0.2).hover(function() {
						$(this).stop(true, false).animate({
									"opacity": "0.5"
								},
								300);
					},
					function() {
						$(this).stop(true, false).animate({
									"opacity": "0.2"
								},
								300);
					});

			//上一页按钮
			$("#focus .pre").click(function() {
				index -= 1;
				if (index == -1) {
					index = len - 1;
				}
				showPics(index);
			});

			//下一页按钮
			$("#focus .next").click(function() {
				index += 1;
				if (index == len) {
					index = 0;
				}
				showPics(index);
			});

			//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
			$("#focus ul").css("width", sWidth * (len));

			//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
			$("#focus").hover(function() {
						clearInterval(picTimer);
					},
					function() {
						picTimer = setInterval(function() {
									showPics(index);
									index++;
									if (index == len) {
										index = 0;
									}
								},
								4000); //此4000代表自动播放的间隔，单位：毫秒
					}).trigger("mouseleave");

			//显示图片函数，根据接收的index值显示相应的内容
			function showPics(index) { //普通切换
				var nowLeft = -index * sWidth; //根据index值计算ul元素的left值
				$("#focus ul").stop(true, false).animate({
							"left": nowLeft
						},
						300); //通过animate()调整ul元素滚动到计算出的position
				//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
				$("#focus .btn span").stop(true, false).animate({
							"opacity": "0.4"
						},
						300).eq(index).stop(true, false).animate({
							"opacity": "1"
						},
						300); //为当前的按钮切换到选中的效果
			}
		});
	</script>
</head>

<body>
<div id="web">
    <div class="topbar">
        <?php if(empty($ckid["uid"])): ?><p>您好：<a href="/index/user/login/" target="_blank">登录</a><span>|</span><a href="/index/user/reg/">注册</a></p>
            <?php else: ?>
            <p>您好：<em><?php echo ($ckid["username"]); ?></em><span>|</span><a href="/index/user/index/" >个人中心</a><span>|</span><a href="/index/user/index/">消息中心(<a class="bcol">0</a>)</a><span>|</span><a href="#" target="_blank">帮助</a><span>|</span><a href="/index/user/buy/" target="_blank">充值</a><span>|</span><a href="/index/user/logout/">退出</a></p><?php endif; ?>
    </div>
    <div class="header">
        <div class="headerbg">
            <div class="logo"><a href="/" title="返回首页"><img src="/Public/Images/logo.png" alt="<?php echo get_config_value('site_name');?>" /></a></div>
            <div class="hottj">
                <p>热门推荐：
                    <?php if(is_array($top)): foreach($top as $key=>$v): ?><span><a href="/index/so/?t_id=-1&type_id=-1&title=<?php echo ($v["title"]); ?>&s_price=&d_price=&t_price=&e_price=" title="查看<?php echo ($v["title"]); ?>介绍"><?php echo ($v["title"]); ?></a></span><?php endforeach; endif; ?>
            </p></div>
        </div>
    </div>

	<div class="banner">
		<div id="focus">
			<ul>
				<?php if(is_array($hd)): foreach($hd as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>" /></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<?php if(empty($ckid["uid"])): ?><div class="lgdiv">
			<div class="lgtxdiv">
				<div class="lgtxbg"></div>
				<div class="lgtximg"><img src="/Public/Images/wx.png" /></div>
			</div>
			<div class="lgform">
				<form>
					<div class="lginput">
						<input type="text" name="username" id="username" class="inp" placeholder="请输入您的用户名" />
					</div>
					<div class="lginput">
						<input type="password" name="password" id="password" class="inp" placeholder="请输入您密码" />
					</div>
					<div class="lginput">
						<input type="button" class="insub" id="submit" value="登录"/>
					</div>
				</form>
			</div>
			<div class="lghref"><a href="/index/pwd/" target="_blank">忘记密码？</a><a href="/index/user/reg/" target="_blank">用户注册</a></div>
		</div>
			<?php else: endif; ?>
	</div>
	<div class="seardiv">
		<div class="seartxt"><div class="searleft"></div><div class="searbg">
			<form action="/index/so/" method="get">
				<input type="hidden" id="w7" name="w7"  value="-1" />
				<input type="text" id="title" name="title" class="searinp" /><input type="submit" value="" class="searbtn" />
			</form></div><div class="searright"></div></div>
	</div>
	<div class="wpbox">
		<ul class="wptab clear-fix">
			<li class="nline rad curent"><?php if(empty($ckid["uid"])): ?><a href="javascript:;" id="t4">微信</a><?php else: ?>
				<a href="/index/so/?title=&t_id=2" title="点击查看更多" target="_blank">微信</a><?php endif; ?></li>
			<li><?php if(empty($ckid["uid"])): ?><a href="javascript:;" id="t5">微博</a><?php else: ?>
				<a href="/index/so/?title=&t_id=1" title="点击查看更多" target="_blank">微博</a><?php endif; ?></li>
			<li><?php if(empty($ckid["uid"])): ?><a href="javascript:;" id="t6">数字营销</a><?php else: ?>
				<a href="/index/sz/" title="点击查看更多" target="_blank">数字营销</a><?php endif; ?></li>
			<li class="rad2"><a href="#" target="_blank">网络公关</a></li>
		</ul>
		<div class="wpdata">
			<div class="wpcont">
				<dl class="title clear-fix">
					<dd class="cw220">账号名称</dd>
					<dd class="cw160">粉丝量</dd>
					<dd class="cw160">头条报价</dd>
					<dd class="cw160">非头条报价</dd>
					<dd class="cw160">阅读数</dd>
					<dd class="cw100">操作</dd>
				</dl>
				<?php if($wx): if(is_array($wx)): foreach($wx as $key=>$vo): ?><dl class="clear-fix">
					<dt>
					<div class="zzcode clear-fix">
						<div class="zzctx">
							<div class="zzctxbg"></div>
							<div class="zzctximg"><img src="<?php echo ($vo["z1"]); ?>" /></div>
						</div>
						<div class="zzctxt">
							<a><?php echo ($vo["title"]); ?></a><br />
							<em>账号：<?php echo ($vo["w2"]); ?></em><br />
							<?php if(($vo["type_v"] == 1)): ?><i>微信认证</i><?php endif; ?>
						</div>
					</div>
					</dt>
					<dd class="cw150"><?php echo ($vo["w3"]); ?>万</dd>
					<dd class="cw170">￥<?php echo ($vo["w4"]); ?></dd>
					<dd class="cw165">￥<?php echo ($vo["w5"]); ?></dd>
					<dd class="cw135"><?php echo ($vo["z2"]); ?>+</dd>
					<?php if(empty($ckid["uid"])): ?><dd><a href="/index/user/login/" title="请先登录">预约</a>&nbsp;|&nbsp;<a href="/index/user/login/" title="请先登录">查看</a></dd>
						<?php else: ?>
						<dd><a href="tencent://message/?uin=286028785&Site=冰蝉&Menu=yes">预约</a>&nbsp;|&nbsp;<a href="tencent://message/?uin=286028785&Site=冰蝉&Menu=yes">查看</a></dd><?php endif; ?>
				</dl><?php endforeach; endif; ?>
				<?php else: endif; ?>
				<?php if(empty($ckid["uid"])): ?><dl class="btrd">
					<div class="pz">
						<a class="wz" href="javascript:;" id="t1">>>点击查看更多数据</a>
					</div>
				</dl>
					<?php else: ?>
					<dl class="btrd">
						<div class="pz">
							<a href="/index/so/?title=&t_id=2" class="wz" title="点击查看">>>点击查看更多数据</a>
						</div>
					</dl><?php endif; ?>
			</div>
			<div class="wpcont">
				<dl class="title clear-fix">
					<dd class="cw220">账号名称</dd>
					<dd class="cw160">粉丝量</dd>
					<dd class="cw160">直发报价</dd>
					<dd class="cw160">转发报价</dd>
					<dd class="cw160">周约次数</dd>
					<dd class="cw100">操作</dd>
				</dl>
				<?php if($wb): if(is_array($wb)): foreach($wb as $key=>$vo): ?><dl class="clear-fix">
							<dt>
							<div class="zzcode clear-fix">
								<div class="zzctx">
									<div class="zzctxbg"></div>
									<div class="zzctximg"><img src="<?php echo ($vo["z1"]); ?>" /></div>
								</div>
								<div class="zzctxt">
									<a><?php echo ($vo["title"]); ?></a><br />
									<em>账号：<?php echo ($vo["w2"]); ?></em><br />
									<?php if(($vo["type_v"] == 1)): ?><i>微博认证</i><?php endif; ?>
								</div>
							</div>
							</dt>
							<dd class="cw150"><?php echo ($vo["w3"]); ?>万</dd>
							<dd class="cw170"><?php echo ($vo["w4"]); ?></dd>
							<dd class="cw165"><?php echo ($vo["w5"]); ?></dd>
							<dd class="cw135"><?php echo ($vo["z2"]); ?></dd>
							<?php if(empty($ckid["uid"])): ?><dd><a href="/index/user/login/" title="请先登录">预约</a>&nbsp;|&nbsp;<a href="/index/user/login/" title="请先登录">查看</a></dd>
								<?php else: ?>
								<dd><a href="tencent://message/?uin=286028785&Site=冰蝉&Menu=yes">预约</a>&nbsp;|&nbsp;<a href="tencent://message/?uin=286028785&Site=冰蝉&Menu=yes">查看</a></dd><?php endif; ?>
						</dl><?php endforeach; endif; ?>
					<?php else: endif; ?>
				<?php if(empty($ckid["uid"])): ?><dl class="btrd">
						<div class="pz">
							<a class="wz" href="javascript:;" id="t2">>>点击查看更多数据</a>
						</div>
					</dl>
					<?php else: ?>
					<dl class="btrd">
						<div class="pz">
							<a href="/index/so/?title=&t_id=1" class="wz" title="点击查看">>>点击查看更多数据</a>
						</div>
					</dl><?php endif; ?>
			</div>
			<div class="wpcont">
				<?php if(is_array($sz)): foreach($sz as $key=>$vo): ?><dl class="clear-fix">
					<div class="suzimg"><img src="<?php echo ($vo["z1"]); ?>" width="960" height="80" /></div>
				</dl><?php endforeach; endif; ?>
				<?php if(empty($ckid["uid"])): ?><dl class="btrd">
						<div class="pz">
							<a class="wz" href="javascript:;" id="t3">>>点击查看更多数据</a>
						</div>
					</dl>
					<?php else: ?>
					<dl class="btrd">
						<div class="pz">
							<a href="#" class="wz" title="点击查看">>>点击查看更多数据</a>
						</div>
					</dl><?php endif; ?>
			</div>
			<div class="wpcont">
				<?php if(is_array($wl)): foreach($wl as $key=>$vo): ?><dl class="clear-fix">
						<div class="suzimg"><img src="<?php echo ($vo["z1"]); ?>" width="960" height="80" /></div>
					</dl><?php endforeach; endif; ?>
				<?php if(empty($ckid["uid"])): ?><dl class="btrd">
						<div class="pz">
							<a class="wz" href="javascript:;" id="t3">>>点击查看更多数据</a>
						</div>
					</dl>
					<?php else: ?>
					<dl class="btrd">
						<div class="pz">
							<a href="#" class="wz" title="点击查看">>>点击查看更多数据</a>
						</div>
					</dl><?php endif; ?>

			</div>
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
<script type="text/javascript" src="/Public/Js/zc.js"></script>
<div class="adrbar clear-fix">
    <div class="adrwz"><a href="<?php echo ($ad4["dz"]); ?>"><img src="<?php echo ($ad4["tp"]); ?>" /></a></div>
    <div class="adrwz"><a href="<?php echo ($ad5["dz"]); ?>"><img src="<?php echo ($ad5["tp"]); ?>" /></a></div>
    <div class="adrwz npad"><a href="<?php echo ($ad6["dz"]); ?>"><img src="<?php echo ($ad6["tp"]); ?>" /></a></div>
</div>
<div class="foot">
    <p><a href="/index/show/5.html" target="_blank">加入我们</a>
        <span>|</span>
        <a href="/index/show/4.html" target="_blank">联系我们</a>
        <span>|</span>
        <a href="/index/show/3.html" target="_blank">法律/免责声明</a>
        <span>|</span>
        <a href="/index/show/2.html" target="_blank">邮箱白名单设置</a>
        <br />
        版权所有 © <?php echo get_config_value('site_name');?> 2012-2016. <br />
        <?php echo get_config_value('site_copyright');?><br />
        <img src="/Public/Images/fba.png" />
    </p>
</div>
</div>
</body>
</html>