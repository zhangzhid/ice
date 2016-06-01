<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
    <title>会员中心 - <?php echo get_config_value('site_name');?></title>
    <meta name="keywords" content="<?php echo get_config_value('site_keywords');?>"/>
    <meta name="description" content="<?php echo get_config_value('site_keywords');?>"/>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Public/Css/user.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/tong.css"/>
    <link href="/Public/Css/style.css" rel="stylesheet" type="text/css" />
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
            <h2>基本信息:</h2>
            <div>
                <div class="item">
                    <label for="">会员等级：</label>
                    <span><?php if($user["ck"] == 0): ?><img src="/Public/Images/01.gif" width="18px" height="18px"> 普通会员<?php endif; ?>
                        <?php if($user["ck"] == 1): ?><img src="/Public/Images/02.gif" width="18px" height="18px"> 银牌会员<?php endif; ?>
                        <?php if($user["ck"] == 2): ?><img src="/Public/Images/03.gif" width="18px" height="18px"> 金牌会员<?php endif; ?>
                    </span> <a href="/index/user/buy/">【开通】</a>
                </div>
                <div class="item">
                    <label for="">用户名：</label>
                    <span>[<?php echo ($user["username"]); ?>]</span>
                </div>
                <div class="item">
                    <label for="">QQ号码：</label>
                    <span>[<?php echo ($user["qq"]); ?>]</span>
                </div>
                <div class="item">
                    <label for="">手机号码：</label>
                    <span>[<?php echo ($user["tel"]); ?>]</span>
                </div>
                <div class="item">
                    <label for="">邮箱地址：</label>
                    <span>[<?php echo ($user["email"]); ?>]</span>
                </div>
                <div class="item">
                    <label for="">从事行业：</label>
                    <span>[<?php echo ($user["xy"]); ?>]</span>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section_open">修改密码<em>(请牢记登录密码)</em><span></span></h2>
            <div style="display:block; position:relative; overflow:hidden;">
                <form id="editform" action="<?php echo U('mi');?>" method="post">
                    <input type="hidden" name="uid" value="<?php echo ($user["uid"]); ?>"/>
                    <div class="item">
                        <label for="">原始密码：</label>
                        <input type="password" name="old_pwd" class="t1"/>
                    </div>
                    <div class="item">
                        <label for="">新密码：</label>
                        <input type="password" name="new_pwd" class="t1"/>
                    </div>
                    <div class="item">
                        <label for="mobile">确认密码：</label>
                        <input type="password" name="re_pwd" class="t1"/>
                    </div>
            </div>
        </div>
        <div class="section">
            <div class="item">
                <label for="">&nbsp;</label>
                <input type="submit" class="abtn" value="确定修改"/>
            </div>
        </div>

        </form>
        <div class="section">
            <h2>搜索记录:</h2>
            <div>
                <div class="cityListBox">
                    <div class="show_zc">
                        <div class="zc_list" id="price">
                            <table width="925" border="0" cellspacing="0" cellpadding="0" id="cndns" class="tab1">
                                <tr>
                                    <td height="40">搜索时间</td>
                                    <td height="40">搜索关键词</td>
                                    <td height="40">平台</td>
                                    <td height="40">类别</td>
                                    <td height="40">头条价</td>
                                    <td height="40">普通价</td>
                                </tr>
                                <?php if($notes): if(is_array($notes)): foreach($notes as $key=>$vo): ?><tr>
                                            <td height="40"><?php echo tranTime($vo[rtime]);?></td>
                                            <td height="40">
                                                <?php if(empty($vo["r3"])): ?>未填写<?php else: echo ($vo["r3"]); endif; ?>
                                            </td>
                                            <td height="40">
                                                <?php if($vo["r1"] > 0): echo get_title('pt',$vo[r1]);?>平台
                                                    <?php else: ?>
                                                    全部平台<?php endif; ?>
                                            </td>
                                            <td height="40">
                                                <?php if($vo["r2"] > 0): echo get_title('brand',$vo[r2]);?>
                                                    <?php else: ?>
                                                    全部类别<?php endif; ?>
                                            </td>

                                            <td height="40">
                                                <?php if($vo["r4"] > 0): echo ($vo["r4"]); ?> -
                                                    <?php else: ?>
                                                    -<?php endif; ?>
                                                <?php if($vo["r5"] > 0): echo ($vo["r5"]); ?>
                                                    <?php else: ?>
                                                    -<?php endif; ?>
                                            </td>
                                            <td height="40">
                                                <?php if($vo["r6"] > 0): echo ($vo["r6"]); ?> -
                                                    <?php else: ?>
                                                    -<?php endif; ?>
                                                <?php if($vo["r7"] > 0): echo ($vo["r7"]); ?>
                                                    <?php else: ?>
                                                    -<?php endif; ?>
                                            </td>
                                        </tr><?php endforeach; endif; ?>
                            </table>
                                    <?php else: ?>
                                    <table width="925" border="0" cellspacing="0" cellpadding="0" id="cndns">
                                        <tr>
                                            <td height="40" align="center" colspan="7">暂无搜索记录！</td>
                                        </tr>
                                    </table><?php endif; ?>

                            <div class="result">
                                <?php echo ($page); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   </div>
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