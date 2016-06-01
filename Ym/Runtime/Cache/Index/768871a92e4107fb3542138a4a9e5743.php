<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>搜索 - <?php echo get_config_value('site_name');?></title>
	<meta name="keywords" content="<?php echo get_config_value('site_keywords');?>" />
	<meta name="description" content="<?php echo get_config_value('site_descript');?>" />
	<link href="/Public/Css/style.css" rel="stylesheet" type="text/css" />
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

	<div class="seardiv">
		<div class="seartxt"><div class="searleft"></div>
			<div class="searbg">
				<form>
					<input type="text" name="title" class="searinp" /><input type="submit" value="" class="searbtn" />

			</div>
			<div class="searright"></div></div>
	</div>
	<div class="wpbox">
		<div class="wptype">
			<div class="wpthd">
				<h3>所有账号</h3>
				<!--<div class="wpthdmore"><a href="#">更多</a></div>-->
			</div>
			<div class="wpthbd">
				<dl class="clear-fix">
					<dd>分类：</dd>
					<dt><span class="curent"><a href="/index/so/?title=&type_id=-1" <?php if(I('get.type_id', -1) == -1) echo 'class="dqq"'; ?>>不限</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=1" <?php if(I('get.type_id', -1) == 1) echo 'class="dq"'; ?>>新闻|资讯</a> </span></dt>
					<dt><span><a href="/index/so/?title=&type_id=2" <?php if(I('get.type_id', -1) == 2) echo 'class="dq"'; ?>>IT|科技</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=3" <?php if(I('get.type_id', -1) == 3) echo 'class="dq"'; ?>>金融|财经</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=4" <?php if(I('get.type_id', -1) == 4) echo 'class="dq"'; ?>>电商|创业</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=5" <?php if(I('get.type_id', -1) == 5) echo 'class="dq"'; ?>>广告|营销</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=6" <?php if(I('get.type_id', -1) == 6) echo 'class="dq"'; ?>>搞笑|娱乐</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=7" <?php if(I('get.type_id', -1) == 7) echo 'class="dq"'; ?>>女性|时尚</a></span></dt>
					<dt><span><a href="/index/so/?title=&type_id=8" <?php if(I('get.type_id', -1) == 8) echo 'class="dq"'; ?>>管理|职场</a></span></dt>
				</dl>
				<dl class="clear-fix">
					<dd>价格：</dd>
					<dt><span class="curent"><a href="/index/so/?title=&t_price=-1" <?php if(I('get.t_price', -1) == -1) echo 'class="dqq"'; ?>>不限</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_price=10&e_price=1999" <?php if(I('get.t_price', -1) == 10) echo 'class="dq"'; ?>>2000以下</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_price=2000&e_price=4999" <?php if(I('get.t_price', -1) == 2000) echo 'class="dq"'; ?>>2000-5000</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_price=5000&e_price=7999" <?php if(I('get.t_price', -1) == 5000) echo 'class="dq"'; ?>>5000-8000</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_price=8000&e_price=14999" <?php if(I('get.t_price', -1) == 8000) echo 'class="dq"'; ?>>8000-15000</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_price=50000&e_price=" <?php if(I('get.t_price', -1) == 50000) echo 'class="dq"'; ?>>15000以上</a></span></dt>
				</dl>
				<dl class="clear-fix">
					<dd>阅读数：</dd>
					<dt><span><a href="/index/so/?title=&tz2=-1&ez2=" <?php if(I('get.tz2', -1) == -1) echo 'class="dqq"'; ?>>不限</a></span></dt>
					<dt><span><a href="/index/so/?title=&tz2=10&ez2=9999" <?php if(I('get.tz2', -1) == 10) echo 'class="dq"'; ?>>1万以下</a></span></dt>
					<dt><span><a href="/index/so/?title=&tz2=10000&ez2=39999" <?php if(I('get.tz2', -1) == 10000) echo 'class="dq"'; ?>>1万-3万</a></span></dt>
					<dt><span><a href="/index/so/?title=&tz2=30000&ez2=49999" <?php if(I('get.tz2', -1) == 30000) echo 'class="dq"'; ?>>3万-5万</a></span></dt>
					<dt><span><a href="/index/so/?title=&tz2=50000&ez2=100000" <?php if(I('get.tz2', -1) == 50000) echo 'class="dq"'; ?>>5万-10万</a></span></dt>
					<dt><span class="curent"><a href="/index/so/?title=&tz2=100000&ez2=10000000" <?php if(I('get.tz2', -1) == 50000) echo 'class="dq"'; ?>>10万+</a></span></dt>
				</dl>
				<dl class="clear-fix">
					<dd>粉丝数：</dd>
					<dt><span class="curent"><a href="/index/so/?title=&s_price=-1&d_price=" <?php if(I('get.s_price', -1) == -1) echo 'class="dqq"'; ?>>不限</a></span></dt>
					<dt><span><a href="/index/so/?title=&s_price=-1&d_price=9" <?php if(I('get.s_price', -1) == -1) echo 'class="dq"'; ?>>10万以下</a></span></dt>
					<dt><span><a href="/index/so/?title=&s_price=10&d_price=19" <?php if(I('get.s_price', -1) == 10) echo 'class="dq"'; ?>>10万-20万</a></span></dt>
					<dt><span><a href="/index/so/?title=&s_price=20&d_price=49" <?php if(I('get.s_price', -1) == 20) echo 'class="dq"'; ?>>20万-50万</a></span></dt>
					<dt><span><a href="/index/so/?title=&s_price=50&d_price=79" <?php if(I('get.s_price', -1) == 50) echo 'class="dq"'; ?>>50万-80万</a></span></dt>
					<dt><span><a href="/index/so/?title=&s_price=80&d_price=" <?php if(I('get.s_price', -1) == 80) echo 'class="dq"'; ?>>80万+</a></span></dt>
				</dl>
				<dl class="clear-fix">
					<dd>其他：</dd>
					<dt><span><a href="/index/so/?title=&t_id=2" <?php if(I('get.t_id', -1) == 2) echo 'class="dq"'; ?>>微信全部账号</a></span></dt>
					<dt><span><a href="/index/so/?title=&t_id=1" <?php if(I('get.t_id', -1) == 1) echo 'class="dq"'; ?>>微博全部账号</a></span></dt>
				</dl>
				<div class="tpbtn"><span>收起&nbsp;&and;</span></div>
			</div>
		</div></form>
		<div class="wpcont">
			<?php if($data): ?><dl class="title clear-fix">
				<dd class="cw200">账号名称</dd>
				<dd class="cw148">粉丝量</dd>
				<?php if(I('get.t_id', -1) == 2) echo '<dd class="cw148">头条报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == 1) echo '<dd class="cw148">软广报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == 2) echo '<dd class="cw148">非头条报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == 1) echo '<dd class="cw148">硬广报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == 2) echo '<dd class="cw148">阅读量</dd>'; ?>
				<?php if(I('get.t_id', -1) == 1) echo '<dd class="cw148">曝光率</dd>'; ?>
				<?php if(I('get.t_id', -1) == -1) echo '<dd class="cw148">头条报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == -1) echo '<dd class="cw148">非头条报价</dd>'; ?>
				<?php if(I('get.t_id', -1) == -1) echo '<dd class="cw148">曝光率/阅读量</dd>'; ?>
				<dd class="cw148">操作</dd>
			</dl>
				<?php foreach ($data as $k => $vo): ?>
			<dl class="wh110 clear-fix">
				<dt class="cw200">
				<div class="zzcode clear-fix">
					<div class="zzctx">
						<div class="zzctxbg"></div>
						<div class="zzctximg"><img src="<?php echo ($vo["z1"]); ?>" /></div>
					</div>
					<div class="zzctxt">
						<a><?php echo ($vo["title"]); ?></a><br />
						<?php if($vo["w7"] == 1): ?><em>微博ID:<?php echo ($vo["w2"]); ?></em><?php endif; ?>
						<?php if($vo["w7"] == 2): ?><em>微信ID:<?php echo ($vo["w2"]); ?></em><?php endif; ?>
						<?php if($vo["w7"] == 1): ?><i>微博认证</i><?php endif; ?>
						<?php if($vo["w7"] == 2): ?><i>微信认证</i><?php endif; ?>
					</div>
				</div>
				</dt>
				<dd class="cw148"><div class="zzctrt3"><?php echo ($vo["w3"]); ?>万<br />
				</div></dd>
				<?php if($vo["w7"] == 1): ?><dd class="cw148"><div class="zzctrt2"><?php echo ($vo["w4"]); ?><br /><em>直发 :暂无报价</em><br /><em>转发 :暂无报价</em></div></dd><?php endif; ?>
				<?php if($vo["w7"] == 1): ?><dd class="cw148"><div class="zzctrt2"><?php echo ($vo["w5"]); ?><br /><em>直发 :暂无报价</em><br /><em>转发 :暂无报价</em></div></dd><?php endif; ?>
				<?php if($vo["w7"] == 2): ?><dd class="cw148"><div class="zzctrt3"><?php echo ($vo["w4"]); ?></div></dd><?php endif; ?>
				<?php if($vo["w7"] == 2): ?><dd class="cw148"><div class="zzctrt3"><?php echo ($vo["w5"]); ?></div></dd><?php endif; ?>
				<dd class="cw148"><div class="zzctrt3"><?php echo ($vo["z2"]); ?>+</div></dd>
				<dd class="cw148 wl110"><a href="#">预约</a>&nbsp;|&nbsp;<a href="#">查看</a></dd>
			</dl>
				<?php endforeach; ?>
			<dl class="btrd wh110">
				<div class="page">
					<?php echo ($page); ?>
				</div>
			</dl>
				<?php else: ?>
				<dl class="title clear-fix">
					搜索暂无数据,有疑问请联系客服.....
				</dl>
		</div><?php endif; ?>
	</div>
	</div>
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