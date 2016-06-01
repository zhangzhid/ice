<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
		<title>会员开通页面 - <?php echo get_config_value('site_name');?></title>
		<meta name="keywords" content="<?php echo get_config_value('site_keywords');?>" />
		<meta name="description" content="<?php echo get_config_value('site_keywords');?>" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" type="text/css" href="/Public/Css/user.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Css/tong.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
		<script type="text/javascript" src="/Public/Js/jquery-1.8.3.min.js"></script>
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

		<div id="wp">
<div class="main">

		<div class="section">
            <h2>开通会员介绍:</h2>
        <div>
			<?php echo (htmlspecialchars_decode($buy["com"])); ?>
</div></div>
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