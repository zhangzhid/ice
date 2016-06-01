/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : weixin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-23 08:57:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `go_config`
-- ----------------------------
DROP TABLE IF EXISTS `go_config`;
CREATE TABLE `go_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL DEFAULT 'string',
  `config_type` varchar(255) NOT NULL DEFAULT 'site',
  `value` varchar(255) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_config
-- ----------------------------

-- ----------------------------
-- Table structure for `yf_ad`
-- ----------------------------
DROP TABLE IF EXISTS `yf_ad`;
CREATE TABLE `yf_ad` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tp` varchar(255) DEFAULT NULL,
  `wz` varchar(255) DEFAULT NULL,
  `dz` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_ad
-- ----------------------------
INSERT INTO `yf_ad` VALUES ('1', 'QQ咨询热线', null, '82926502', 'http://wpa.qq.com/msgrd?v=3&amp;uin=82926502&amp;site=qq&amp;menu=yes');
INSERT INTO `yf_ad` VALUES ('5', '底部002', '/Uploads/2016-05-14/5736f2b328941.jpg', '底部002', 'http://www.baidu.com/');
INSERT INTO `yf_ad` VALUES ('2', '电话服务热线', null, '400-800-8008', '');
INSERT INTO `yf_ad` VALUES ('3', '微信二维码', '/Uploads/2016-03-01/56d546ba2dd98.png', '', '');
INSERT INTO `yf_ad` VALUES ('4', '底部001', '/Uploads/2016-05-14/5736f2458585e.jpg', '底部001', 'http://www.baidu.com/');
INSERT INTO `yf_ad` VALUES ('6', '底部003', '/Uploads/2016-05-14/5736f2c1e9694.jpg', '底部003', 'http://www.baidu.com/');
INSERT INTO `yf_ad` VALUES ('7', '对联右边130x300', '/Uploads/2016-03-04/56d9785fdc437.png', '对联左边130x300', 'http://www.baidu.com/');
INSERT INTO `yf_ad` VALUES ('8', '底部960 X 60广告位002', '/Uploads/2016-04-02/56ff494750702.png', '底部', 'http://www.baidu.com/');

-- ----------------------------
-- Table structure for `yf_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yf_admin`;
CREATE TABLE `yf_admin` (
  `aid` int(255) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL COMMENT '管理员账户',
  `admin_password` varchar(255) NOT NULL COMMENT '密码',
  `dtime` int(10) NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_admin
-- ----------------------------
INSERT INTO `yf_admin` VALUES ('1', 'yf2018', 'e10adc3949ba59abbe56e057f20f883e', '1457082002');
INSERT INTO `yf_admin` VALUES ('3', '精准网络', 'e10adc3949ba59abbe56e057f20f883e', '1459592624');

-- ----------------------------
-- Table structure for `yf_brand`
-- ----------------------------
DROP TABLE IF EXISTS `yf_brand`;
CREATE TABLE `yf_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '品牌名',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of yf_brand
-- ----------------------------
INSERT INTO `yf_brand` VALUES ('1', '新闻|资讯', '2016-02-26 05:17:21');
INSERT INTO `yf_brand` VALUES ('2', 'IT|科技', '2016-02-26 05:17:32');
INSERT INTO `yf_brand` VALUES ('3', '金融|财经', '2016-02-26 05:17:39');
INSERT INTO `yf_brand` VALUES ('4', '电商|创业', '2016-02-26 05:17:48');
INSERT INTO `yf_brand` VALUES ('5', '广告|营销', '2016-02-26 05:17:59');
INSERT INTO `yf_brand` VALUES ('6', '搞笑|娱乐', '2016-02-26 05:18:08');
INSERT INTO `yf_brand` VALUES ('7', '女性|时尚', '2016-02-26 20:13:45');
INSERT INTO `yf_brand` VALUES ('8', '管理|职场', '2016-03-01 07:23:11');

-- ----------------------------
-- Table structure for `yf_config`
-- ----------------------------
DROP TABLE IF EXISTS `yf_config`;
CREATE TABLE `yf_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL COMMENT '属性字段',
  `title` varchar(255) NOT NULL COMMENT '字段标题',
  `value` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of yf_config
-- ----------------------------
INSERT INTO `yf_config` VALUES ('1', 'site_name', '网站名称', '精准网站建设', '1');
INSERT INTO `yf_config` VALUES ('2', 'site_title', '网站标题', '营销数据网', '1');
INSERT INTO `yf_config` VALUES ('3', 'site_keywords', '站点关键字', '精准网络,营销数据,微信,微博', '1');
INSERT INTO `yf_config` VALUES ('4', 'site_descript', '站点描述', '我是一只小小鸟', '1');
INSERT INTO `yf_config` VALUES ('5', 'site_copyright', '版权信息', ' 京ICP证：130126号.京ICP备：09047853号.京公网安备：11010502023471号.商标注册证：13594954号.13594767号', '1');
INSERT INTO `yf_config` VALUES ('6', 'site_logo', '网站logo', '/Uploads/2016-03-01/56d4a6fbde2d6.png', '1');
INSERT INTO `yf_config` VALUES ('7', 'site_url', '网站地址', 'http://1.com', '1');

-- ----------------------------
-- Table structure for `yf_data`
-- ----------------------------
DROP TABLE IF EXISTS `yf_data`;
CREATE TABLE `yf_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w1` int(8) DEFAULT NULL COMMENT '属于类型',
  `title` varchar(255) DEFAULT NULL COMMENT '名称',
  `w2` varchar(255) DEFAULT NULL COMMENT '地址账号等',
  `w3` int(11) DEFAULT NULL COMMENT '粉丝数量',
  `w4` varchar(50) DEFAULT NULL COMMENT '价格',
  `w5` varchar(50) DEFAULT NULL COMMENT '价格1',
  `w6` varchar(255) DEFAULT NULL COMMENT '备注',
  `z1` varchar(255) DEFAULT '/Public/Images/no.png' COMMENT '头像',
  `z2` char(20) DEFAULT '10' COMMENT '曝光率ar阅读数',
  `w7` int(1) NOT NULL COMMENT '1微博2微信',
  `add_time` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_data
-- ----------------------------
INSERT INTO `yf_data` VALUES ('1', '7', '西楚女霸王', 'bw2324', '47', '3.3万 - 3.8万', '2.1万 - 2.9万', null, 'http://2.jhaozhan.com/Public/Images/no.png', '1', '2', '1463963432');
INSERT INTO `yf_data` VALUES ('2', '7', '练恋补习班', 'aiai058', '36', '3.3万 - 3.8万', '2.1万 - 2.9万', null, 'http://2.jhaozhan.com/Public/Images/no.png', '2', '2', '1463963432');
INSERT INTO `yf_data` VALUES ('3', '7', '一只学霸 ', '  bajie203', '11', '3.3万 - 3.8万', '2.1万 - 2.9万', null, 'http://2.jhaozhan.com/Public/Images/no.png', '3', '2', '1463963432');
INSERT INTO `yf_data` VALUES ('4', '7', 'CodeWeb资讯', 'codeapp', '22', '3.3万 - 3.8万', '2.1万 - 2.9万', null, 'http://2.jhaozhan.com/Public/Images/no.png', '4', '2', '1463963432');
INSERT INTO `yf_data` VALUES ('5', '7', '小冬乱谈', 'hf_365', '18', '3.3万 - 3.8万', '2.1万 - 2.9万', null, 'http://2.jhaozhan.com/Public/Images/no.png', '4', '2', '1463963432');

-- ----------------------------
-- Table structure for `yf_em`
-- ----------------------------
DROP TABLE IF EXISTS `yf_em`;
CREATE TABLE `yf_em` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_title` varchar(255) DEFAULT NULL,
  `email_host` varchar(255) DEFAULT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `email_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_em
-- ----------------------------
INSERT INTO `yf_em` VALUES ('1', '永峰', 'smtp.163.com', '18620366341@163.com', '18620366341@163.com', 'a4768602');

-- ----------------------------
-- Table structure for `yf_hd`
-- ----------------------------
DROP TABLE IF EXISTS `yf_hd`;
CREATE TABLE `yf_hd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_hd
-- ----------------------------
INSERT INTO `yf_hd` VALUES ('1', '幻灯01', 'http://www.baidu.com/', '/Uploads/2016-05-14/5736cfe29ae94.png');
INSERT INTO `yf_hd` VALUES ('2', '幻灯02', 'http://www.baidu.com/', '/Uploads/2016-05-22/574158b87c44d.png');
INSERT INTO `yf_hd` VALUES ('3', '幻灯03', 'http://www.360.com/', '/Uploads/2016-05-14/5736cff31a186.png');

-- ----------------------------
-- Table structure for `yf_news`
-- ----------------------------
DROP TABLE IF EXISTS `yf_news`;
CREATE TABLE `yf_news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `com` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_news
-- ----------------------------
INSERT INTO `yf_news` VALUES ('1', '开通会员介绍', '开通会员介绍', '开通会员介绍', '&lt;p&gt;&lt;span style=&quot;color: rgb(192, 0, 0); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Arial, Helvetica, sans-serif, 宋体; font-size: 18px; background-color: rgb(255, 255, 255);&quot;&gt;后台--单页管理--开通会员介&amp;nbsp; 修改编辑以下内容&lt;/span&gt;&lt;/p&gt;');
INSERT INTO `yf_news` VALUES ('2', '邮箱白名单设置', '邮箱白名单设置', '邮箱白名单设置', '&lt;p&gt;邮箱白名单设置&lt;/p&gt;');
INSERT INTO `yf_news` VALUES ('3', '法律/免责声明', '法律/免责声明', '法律/免责声明', '&lt;p&gt;法律/免责声明法律/免责声明法律/免责声明&lt;/p&gt;');
INSERT INTO `yf_news` VALUES ('4', '联系我们', '联系我们', '联系我们', '&lt;p&gt;联系我们联系我们联系我们联系我们&lt;/p&gt;');
INSERT INTO `yf_news` VALUES ('5', '加入我们', '加入我们', '加入我们', '&lt;p&gt;&lt;span style=&quot;font-size: 18px; color: rgb(192, 0, 0);&quot;&gt;后台--单页管理--加入我们 修改编辑以下内容&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 16px; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; color: rgb(127, 127, 127);&quot;&gt;&lt;/span&gt;加入我们&lt;/p&gt;');
INSERT INTO `yf_news` VALUES ('6', '投稿需知', '投稿需知', '投稿需知', '&lt;p&gt;后台==单页管理==投稿需知--修改&lt;/p&gt;');

-- ----------------------------
-- Table structure for `yf_notes`
-- ----------------------------
DROP TABLE IF EXISTS `yf_notes`;
CREATE TABLE `yf_notes` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `r1` int(10) DEFAULT NULL COMMENT '平台',
  `r2` int(2) DEFAULT NULL COMMENT '类别',
  `r3` char(20) DEFAULT NULL COMMENT '名称',
  `r4` int(8) DEFAULT NULL COMMENT '粉丝数量前',
  `r5` int(8) DEFAULT NULL COMMENT '粉丝数量后',
  `r6` int(8) DEFAULT NULL COMMENT '价格前面',
  `r7` int(8) DEFAULT NULL COMMENT '价格后面',
  `uid` int(11) NOT NULL COMMENT '用户UID',
  `rtime` int(10) DEFAULT NULL COMMENT '搜索时间',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_notes
-- ----------------------------
INSERT INTO `yf_notes` VALUES ('5', '-1', '-1', '天天', '0', '0', '0', '0', '8', '1459602968');
INSERT INTO `yf_notes` VALUES ('23', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463220941');
INSERT INTO `yf_notes` VALUES ('24', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463221025');
INSERT INTO `yf_notes` VALUES ('21', '-1', '-1', '杨幂', '0', '0', '0', '0', '9', '1459623455');
INSERT INTO `yf_notes` VALUES ('22', '-1', '-1', '杨幂', '0', '0', '0', '0', '9', '1459623468');
INSERT INTO `yf_notes` VALUES ('25', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463221084');
INSERT INTO `yf_notes` VALUES ('26', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463221141');
INSERT INTO `yf_notes` VALUES ('27', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463221151');
INSERT INTO `yf_notes` VALUES ('28', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222092');
INSERT INTO `yf_notes` VALUES ('29', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222099');
INSERT INTO `yf_notes` VALUES ('30', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222145');
INSERT INTO `yf_notes` VALUES ('31', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222152');
INSERT INTO `yf_notes` VALUES ('32', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222158');
INSERT INTO `yf_notes` VALUES ('33', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222192');
INSERT INTO `yf_notes` VALUES ('34', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222203');
INSERT INTO `yf_notes` VALUES ('35', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222248');
INSERT INTO `yf_notes` VALUES ('36', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222262');
INSERT INTO `yf_notes` VALUES ('37', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222271');
INSERT INTO `yf_notes` VALUES ('38', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222275');
INSERT INTO `yf_notes` VALUES ('39', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222350');
INSERT INTO `yf_notes` VALUES ('40', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222355');
INSERT INTO `yf_notes` VALUES ('41', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222364');
INSERT INTO `yf_notes` VALUES ('42', '-1', '-1', '', '0', '0', '0', '0', '8', '1463222370');
INSERT INTO `yf_notes` VALUES ('43', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222374');
INSERT INTO `yf_notes` VALUES ('44', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222383');
INSERT INTO `yf_notes` VALUES ('45', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222387');
INSERT INTO `yf_notes` VALUES ('46', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222405');
INSERT INTO `yf_notes` VALUES ('47', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463222564');
INSERT INTO `yf_notes` VALUES ('48', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463223708');
INSERT INTO `yf_notes` VALUES ('49', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463223760');
INSERT INTO `yf_notes` VALUES ('50', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463223804');
INSERT INTO `yf_notes` VALUES ('51', '-1', '-1', '', '0', '0', '0', '0', '8', '1463223809');
INSERT INTO `yf_notes` VALUES ('52', '-1', '-1', '', '0', '0', '0', '0', '8', '1463223822');
INSERT INTO `yf_notes` VALUES ('53', '-1', '7', '', '0', '0', '0', '0', '8', '1463223839');
INSERT INTO `yf_notes` VALUES ('54', '-1', '1', '', '0', '0', '0', '0', '8', '1463223850');
INSERT INTO `yf_notes` VALUES ('55', '-1', '1', '', '0', '0', '0', '0', '8', '1463223885');
INSERT INTO `yf_notes` VALUES ('56', '-1', '1', '', '0', '0', '0', '0', '8', '1463223958');
INSERT INTO `yf_notes` VALUES ('57', '-1', '1', '', '0', '0', '0', '0', '8', '1463224009');
INSERT INTO `yf_notes` VALUES ('58', '-1', '1', '', '0', '0', '0', '0', '8', '1463224026');
INSERT INTO `yf_notes` VALUES ('59', '-1', '1', '', '0', '0', '0', '0', '8', '1463224065');
INSERT INTO `yf_notes` VALUES ('60', '-1', '1', '', '0', '0', '0', '0', '8', '1463224086');
INSERT INTO `yf_notes` VALUES ('61', '-1', '1', '', '0', '0', '0', '0', '8', '1463224104');
INSERT INTO `yf_notes` VALUES ('62', '-1', '1', '', '0', '0', '0', '0', '8', '1463224120');
INSERT INTO `yf_notes` VALUES ('63', '-1', '1', '', '0', '0', '0', '0', '8', '1463224131');
INSERT INTO `yf_notes` VALUES ('64', '-1', '1', '', '0', '0', '0', '0', '8', '1463224140');
INSERT INTO `yf_notes` VALUES ('65', '-1', '1', '', '0', '0', '0', '0', '8', '1463224148');
INSERT INTO `yf_notes` VALUES ('66', '-1', '1', '', '0', '0', '0', '0', '8', '1463224159');
INSERT INTO `yf_notes` VALUES ('67', '-1', '1', '', '0', '0', '0', '0', '8', '1463224218');
INSERT INTO `yf_notes` VALUES ('68', '-1', '-1', '', '0', '0', '0', '0', '8', '1463224360');
INSERT INTO `yf_notes` VALUES ('69', '-1', '1', '', '0', '0', '0', '0', '8', '1463224364');
INSERT INTO `yf_notes` VALUES ('70', '-1', '1', '', '0', '0', '0', '0', '8', '1463224389');
INSERT INTO `yf_notes` VALUES ('71', '-1', '1', '', '0', '0', '0', '0', '8', '1463224407');
INSERT INTO `yf_notes` VALUES ('72', '-1', '1', '', '0', '0', '0', '0', '8', '1463224422');
INSERT INTO `yf_notes` VALUES ('73', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463224639');
INSERT INTO `yf_notes` VALUES ('74', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463224652');
INSERT INTO `yf_notes` VALUES ('75', '-1', '5', '', '0', '0', '0', '0', '8', '1463224663');
INSERT INTO `yf_notes` VALUES ('76', '-1', '5', '', '0', '0', '0', '0', '8', '1463227223');
INSERT INTO `yf_notes` VALUES ('77', '-1', '-1', '', '0', '0', '0', '0', '8', '1463227233');
INSERT INTO `yf_notes` VALUES ('78', '-1', '-1', '', '0', '0', '0', '0', '8', '1463227721');
INSERT INTO `yf_notes` VALUES ('79', '-1', '-1', '', '0', '0', '0', '0', '8', '1463227733');
INSERT INTO `yf_notes` VALUES ('80', '-1', '-1', '', '0', '0', '0', '0', '8', '1463227766');
INSERT INTO `yf_notes` VALUES ('81', '-1', '-1', '', '0', '0', '0', '0', '8', '1463227831');
INSERT INTO `yf_notes` VALUES ('82', '-1', '2', '', '0', '0', '0', '0', '8', '1463227838');
INSERT INTO `yf_notes` VALUES ('83', '-1', '3', '', '0', '0', '0', '0', '8', '1463227842');
INSERT INTO `yf_notes` VALUES ('84', '-1', '-1', '', '1', '9', '0', '0', '8', '1463227845');
INSERT INTO `yf_notes` VALUES ('85', '-1', '-1', '', '10', '19', '0', '0', '8', '1463227850');
INSERT INTO `yf_notes` VALUES ('86', '-1', '-1', '', '1', '9', '0', '0', '8', '1463227851');
INSERT INTO `yf_notes` VALUES ('87', '-1', '-1', '', '1', '9', '0', '0', '8', '1463227875');
INSERT INTO `yf_notes` VALUES ('88', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463227877');
INSERT INTO `yf_notes` VALUES ('89', '1', '-1', '', '0', '0', '0', '0', '8', '1463227883');
INSERT INTO `yf_notes` VALUES ('90', '2', '-1', '', '0', '0', '0', '0', '8', '1463227886');
INSERT INTO `yf_notes` VALUES ('91', '2', '-1', '', '0', '0', '0', '0', '8', '1463227893');
INSERT INTO `yf_notes` VALUES ('92', '1', '-1', '', '0', '0', '0', '0', '8', '1463227895');
INSERT INTO `yf_notes` VALUES ('93', '1', '-1', '', '0', '0', '0', '0', '8', '1463227934');
INSERT INTO `yf_notes` VALUES ('94', '1', '-1', '', '0', '0', '0', '0', '8', '1463228121');
INSERT INTO `yf_notes` VALUES ('95', '1', '-1', '', '0', '0', '0', '0', '8', '1463228185');
INSERT INTO `yf_notes` VALUES ('96', '1', '-1', '', '0', '0', '0', '0', '8', '1463228196');
INSERT INTO `yf_notes` VALUES ('97', '1', '-1', '', '0', '0', '0', '0', '8', '1463228259');
INSERT INTO `yf_notes` VALUES ('98', '1', '-1', '', '0', '0', '0', '0', '8', '1463228283');
INSERT INTO `yf_notes` VALUES ('99', '1', '-1', '', '0', '0', '0', '0', '8', '1463228301');
INSERT INTO `yf_notes` VALUES ('100', '-1', '-1', '', '20', '49', '0', '0', '8', '1463228313');
INSERT INTO `yf_notes` VALUES ('101', '-1', '-1', '', '20', '49', '0', '0', '8', '1463228356');
INSERT INTO `yf_notes` VALUES ('102', '-1', '-1', '', '20', '49', '0', '0', '8', '1463228378');
INSERT INTO `yf_notes` VALUES ('103', '-1', '3', '', '0', '0', '0', '0', '8', '1463228392');
INSERT INTO `yf_notes` VALUES ('104', '-1', '3', '', '0', '0', '0', '0', '8', '1463228403');
INSERT INTO `yf_notes` VALUES ('105', '-1', '3', '', '0', '0', '0', '0', '8', '1463228431');
INSERT INTO `yf_notes` VALUES ('106', '-1', '3', '', '0', '0', '0', '0', '8', '1463228442');
INSERT INTO `yf_notes` VALUES ('107', '-1', '3', '', '0', '0', '0', '0', '8', '1463228444');
INSERT INTO `yf_notes` VALUES ('108', '-1', '3', '', '0', '0', '0', '0', '8', '1463228447');
INSERT INTO `yf_notes` VALUES ('109', '-1', '4', '', '0', '0', '0', '0', '8', '1463228456');
INSERT INTO `yf_notes` VALUES ('110', '1', '-1', '', '0', '0', '0', '0', '8', '1463228488');
INSERT INTO `yf_notes` VALUES ('111', '1', '-1', '', '0', '0', '0', '0', '8', '1463228499');
INSERT INTO `yf_notes` VALUES ('112', '1', '-1', '', '0', '0', '0', '0', '8', '1463228615');
INSERT INTO `yf_notes` VALUES ('113', '2', '-1', '', '0', '0', '0', '0', '8', '1463228620');
INSERT INTO `yf_notes` VALUES ('114', '2', '-1', '', '0', '0', '0', '0', '8', '1463228707');
INSERT INTO `yf_notes` VALUES ('115', '2', '-1', '', '0', '0', '0', '0', '8', '1463228972');
INSERT INTO `yf_notes` VALUES ('116', '1', '-1', '', '0', '0', '0', '0', '8', '1463228976');
INSERT INTO `yf_notes` VALUES ('117', '2', '-1', '', '0', '0', '0', '0', '8', '1463228982');
INSERT INTO `yf_notes` VALUES ('118', '2', '-1', '', '0', '0', '0', '0', '8', '1463229040');
INSERT INTO `yf_notes` VALUES ('119', '2', '-1', '', '0', '0', '0', '0', '8', '1463230466');
INSERT INTO `yf_notes` VALUES ('120', '-1', '-1', '杨幂', '0', '0', '0', '0', '8', '1463230552');
INSERT INTO `yf_notes` VALUES ('121', '-1', '-1', '永峰', '0', '0', '0', '0', '8', '1463230566');
INSERT INTO `yf_notes` VALUES ('122', '-1', '-1', '永峰', '0', '0', '0', '0', '8', '1463230587');
INSERT INTO `yf_notes` VALUES ('123', '2', '-1', '', '0', '0', '0', '0', '8', '1463900803');
INSERT INTO `yf_notes` VALUES ('124', '1', '-1', '', '0', '0', '0', '0', '8', '1463900813');
INSERT INTO `yf_notes` VALUES ('125', '2', '-1', '', '0', '0', '0', '0', '8', '1463900816');
INSERT INTO `yf_notes` VALUES ('126', '1', '-1', '', '0', '0', '0', '0', '8', '1463900841');
INSERT INTO `yf_notes` VALUES ('127', '2', '-1', '', '0', '0', '0', '0', '8', '1463900844');
INSERT INTO `yf_notes` VALUES ('128', '1', '-1', '', '0', '0', '0', '0', '8', '1463900849');
INSERT INTO `yf_notes` VALUES ('129', '2', '-1', '', '0', '0', '0', '0', '8', '1463900851');
INSERT INTO `yf_notes` VALUES ('130', '1', '-1', '', '0', '0', '0', '0', '8', '1463900876');
INSERT INTO `yf_notes` VALUES ('131', '-1', '-1', '', '0', '0', '2000', '4999', '8', '1463900918');
INSERT INTO `yf_notes` VALUES ('132', '2', '-1', '', '0', '0', '0', '0', '8', '1463901126');
INSERT INTO `yf_notes` VALUES ('133', '2', '-1', '', '0', '0', '0', '0', '8', '1463901182');
INSERT INTO `yf_notes` VALUES ('134', '1', '-1', '', '0', '0', '0', '0', '8', '1463901185');
INSERT INTO `yf_notes` VALUES ('135', '2', '-1', '', '0', '0', '0', '0', '8', '1463901195');
INSERT INTO `yf_notes` VALUES ('136', '1', '-1', '', '0', '0', '0', '0', '8', '1463901197');
INSERT INTO `yf_notes` VALUES ('137', '2', '-1', '', '0', '0', '0', '0', '8', '1463901200');
INSERT INTO `yf_notes` VALUES ('138', '1', '-1', '', '0', '0', '0', '0', '8', '1463901224');
INSERT INTO `yf_notes` VALUES ('139', '2', '-1', '', '0', '0', '0', '0', '8', '1463901243');
INSERT INTO `yf_notes` VALUES ('140', '1', '-1', '', '0', '0', '0', '0', '8', '1463901245');
INSERT INTO `yf_notes` VALUES ('141', '1', '-1', '', '0', '0', '0', '0', '8', '1463901263');
INSERT INTO `yf_notes` VALUES ('142', '2', '-1', '', '0', '0', '0', '0', '8', '1463901281');
INSERT INTO `yf_notes` VALUES ('143', '2', '-1', '', '0', '0', '0', '0', '8', '1463901300');
INSERT INTO `yf_notes` VALUES ('144', '1', '-1', '', '0', '0', '0', '0', '8', '1463901308');
INSERT INTO `yf_notes` VALUES ('145', '1', '-1', '', '0', '0', '0', '0', '8', '1463901355');
INSERT INTO `yf_notes` VALUES ('146', '2', '-1', '', '0', '0', '0', '0', '8', '1463901358');
INSERT INTO `yf_notes` VALUES ('147', '1', '-1', '', '0', '0', '0', '0', '8', '1463901360');
INSERT INTO `yf_notes` VALUES ('148', '2', '-1', '', '0', '0', '0', '0', '8', '1463901363');
INSERT INTO `yf_notes` VALUES ('149', '2', '-1', '', '0', '0', '0', '0', '8', '1463901392');
INSERT INTO `yf_notes` VALUES ('150', '1', '-1', '', '0', '0', '0', '0', '8', '1463901394');
INSERT INTO `yf_notes` VALUES ('151', '2', '-1', '', '0', '0', '0', '0', '8', '1463901396');
INSERT INTO `yf_notes` VALUES ('152', '2', '-1', '', '0', '0', '0', '0', '8', '1463901431');
INSERT INTO `yf_notes` VALUES ('153', '2', '-1', '', '0', '0', '0', '0', '8', '1463901481');
INSERT INTO `yf_notes` VALUES ('154', '2', '-1', '', '0', '0', '0', '0', '8', '1463901496');
INSERT INTO `yf_notes` VALUES ('155', '1', '-1', '', '0', '0', '0', '0', '8', '1463901500');
INSERT INTO `yf_notes` VALUES ('156', '1', '-1', '', '0', '0', '0', '0', '8', '1463901516');
INSERT INTO `yf_notes` VALUES ('157', '2', '-1', '', '0', '0', '0', '0', '8', '1463901519');
INSERT INTO `yf_notes` VALUES ('158', '1', '-1', '', '0', '0', '0', '0', '8', '1463901522');
INSERT INTO `yf_notes` VALUES ('159', '2', '-1', '', '0', '0', '0', '0', '8', '1463901524');
INSERT INTO `yf_notes` VALUES ('160', '2', '-1', '', '0', '0', '0', '0', '8', '1463901551');
INSERT INTO `yf_notes` VALUES ('161', '1', '-1', '', '0', '0', '0', '0', '8', '1463901554');
INSERT INTO `yf_notes` VALUES ('162', '2', '-1', '', '0', '0', '0', '0', '8', '1463901556');
INSERT INTO `yf_notes` VALUES ('163', '2', '-1', '', '0', '0', '0', '0', '8', '1463901564');
INSERT INTO `yf_notes` VALUES ('164', '1', '-1', '', '0', '0', '0', '0', '8', '1463901567');
INSERT INTO `yf_notes` VALUES ('165', '2', '-1', '', '0', '0', '0', '0', '8', '1463901569');
INSERT INTO `yf_notes` VALUES ('166', '2', '-1', '', '0', '0', '0', '0', '8', '1463901579');
INSERT INTO `yf_notes` VALUES ('167', '2', '-1', '', '0', '0', '0', '0', '8', '1463901588');
INSERT INTO `yf_notes` VALUES ('168', '1', '-1', '', '0', '0', '0', '0', '8', '1463901591');
INSERT INTO `yf_notes` VALUES ('169', '2', '-1', '', '0', '0', '0', '0', '8', '1463901594');
INSERT INTO `yf_notes` VALUES ('170', '2', '-1', '', '0', '0', '0', '0', '8', '1463901655');
INSERT INTO `yf_notes` VALUES ('171', '1', '-1', '', '0', '0', '0', '0', '8', '1463901658');
INSERT INTO `yf_notes` VALUES ('172', '2', '-1', '', '0', '0', '0', '0', '8', '1463901664');
INSERT INTO `yf_notes` VALUES ('173', '2', '-1', '', '0', '0', '0', '0', '8', '1463901736');
INSERT INTO `yf_notes` VALUES ('174', '2', '-1', '', '0', '0', '0', '0', '8', '1463901746');
INSERT INTO `yf_notes` VALUES ('175', '2', '-1', '', '0', '0', '0', '0', '8', '1463901769');
INSERT INTO `yf_notes` VALUES ('176', '1', '-1', '', '0', '0', '0', '0', '8', '1463901773');
INSERT INTO `yf_notes` VALUES ('177', '2', '-1', '', '0', '0', '0', '0', '8', '1463901776');
INSERT INTO `yf_notes` VALUES ('178', '1', '-1', '', '0', '0', '0', '0', '8', '1463901779');
INSERT INTO `yf_notes` VALUES ('179', '2', '-1', '', '0', '0', '0', '0', '8', '1463901783');
INSERT INTO `yf_notes` VALUES ('180', '2', '-1', '', '0', '0', '0', '0', '8', '1463901832');
INSERT INTO `yf_notes` VALUES ('181', '1', '-1', '', '0', '0', '0', '0', '8', '1463901835');
INSERT INTO `yf_notes` VALUES ('182', '2', '-1', '', '0', '0', '0', '0', '8', '1463901838');
INSERT INTO `yf_notes` VALUES ('183', '2', '-1', '', '0', '0', '0', '0', '8', '1463901865');
INSERT INTO `yf_notes` VALUES ('184', '2', '-1', '', '0', '0', '0', '0', '8', '1463901874');
INSERT INTO `yf_notes` VALUES ('185', '2', '-1', '', '0', '0', '0', '0', '8', '1463901887');
INSERT INTO `yf_notes` VALUES ('186', '1', '-1', '', '0', '0', '0', '0', '8', '1463901891');
INSERT INTO `yf_notes` VALUES ('187', '1', '-1', '', '0', '0', '0', '0', '8', '1463901915');
INSERT INTO `yf_notes` VALUES ('188', '1', '-1', '', '0', '0', '0', '0', '8', '1463901954');
INSERT INTO `yf_notes` VALUES ('189', '2', '-1', '', '0', '0', '0', '0', '8', '1463901957');
INSERT INTO `yf_notes` VALUES ('190', '1', '-1', '', '0', '0', '0', '0', '8', '1463901960');
INSERT INTO `yf_notes` VALUES ('191', '2', '-1', '', '0', '0', '0', '0', '8', '1463901963');
INSERT INTO `yf_notes` VALUES ('192', '1', '-1', '', '0', '0', '0', '0', '8', '1463901975');
INSERT INTO `yf_notes` VALUES ('193', '-1', '-1', '', '10', '19', '0', '0', '8', '1463901982');
INSERT INTO `yf_notes` VALUES ('194', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463901985');
INSERT INTO `yf_notes` VALUES ('195', '-1', '-1', '', '-1', '0', '0', '0', '8', '1463901987');
INSERT INTO `yf_notes` VALUES ('196', '2', '-1', '', '0', '0', '0', '0', '8', '1463901995');
INSERT INTO `yf_notes` VALUES ('197', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902025');
INSERT INTO `yf_notes` VALUES ('198', '-1', '-1', '', '80', '0', '0', '0', '8', '1463902028');
INSERT INTO `yf_notes` VALUES ('199', '-1', '-1', '', '50', '79', '0', '0', '8', '1463902030');
INSERT INTO `yf_notes` VALUES ('200', '-1', '-1', '', '20', '49', '0', '0', '8', '1463902032');
INSERT INTO `yf_notes` VALUES ('201', '-1', '-1', '', '10', '19', '0', '0', '8', '1463902034');
INSERT INTO `yf_notes` VALUES ('202', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902035');
INSERT INTO `yf_notes` VALUES ('203', '-1', '-1', '', '10', '19', '0', '0', '8', '1463902074');
INSERT INTO `yf_notes` VALUES ('204', '-1', '-1', '', '80', '0', '0', '0', '8', '1463902076');
INSERT INTO `yf_notes` VALUES ('205', '-1', '-1', '', '50', '79', '0', '0', '8', '1463902081');
INSERT INTO `yf_notes` VALUES ('206', '-1', '-1', '', '80', '0', '0', '0', '8', '1463902084');
INSERT INTO `yf_notes` VALUES ('207', '-1', '-1', '', '50', '79', '0', '0', '8', '1463902097');
INSERT INTO `yf_notes` VALUES ('208', '-1', '-1', '', '0', '0', '10', '1999', '8', '1463902122');
INSERT INTO `yf_notes` VALUES ('209', '-1', '-1', '', '0', '0', '2000', '4999', '8', '1463902124');
INSERT INTO `yf_notes` VALUES ('210', '-1', '-1', '', '0', '0', '50000', '0', '8', '1463902137');
INSERT INTO `yf_notes` VALUES ('211', '-1', '-1', '', '0', '0', '2000', '4999', '8', '1463902139');
INSERT INTO `yf_notes` VALUES ('212', '-1', '-1', '', '0', '0', '-1', '0', '8', '1463902150');
INSERT INTO `yf_notes` VALUES ('213', '-1', '-1', '', '0', '0', '-1', '0', '8', '1463902164');
INSERT INTO `yf_notes` VALUES ('214', '2', '-1', '', '0', '0', '0', '0', '8', '1463902167');
INSERT INTO `yf_notes` VALUES ('215', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902174');
INSERT INTO `yf_notes` VALUES ('216', '-1', '-1', '', '0', '0', '0', '0', '8', '1463902181');
INSERT INTO `yf_notes` VALUES ('217', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902190');
INSERT INTO `yf_notes` VALUES ('218', '-1', '-1', '', '0', '0', '0', '0', '8', '1463902194');
INSERT INTO `yf_notes` VALUES ('219', '2', '-1', '', '0', '0', '0', '0', '8', '1463902239');
INSERT INTO `yf_notes` VALUES ('220', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902261');
INSERT INTO `yf_notes` VALUES ('221', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902309');
INSERT INTO `yf_notes` VALUES ('222', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902343');
INSERT INTO `yf_notes` VALUES ('223', '-1', '-1', '', '-1', '9', '0', '0', '8', '1463902365');
INSERT INTO `yf_notes` VALUES ('224', '-1', '1', '', '0', '0', '0', '0', '8', '1463902389');
INSERT INTO `yf_notes` VALUES ('225', '-1', '2', '', '0', '0', '0', '0', '8', '1463902391');
INSERT INTO `yf_notes` VALUES ('226', '-1', '3', '', '0', '0', '0', '0', '8', '1463902392');
INSERT INTO `yf_notes` VALUES ('227', '-1', '-1', '', '0', '0', '0', '0', '8', '1463902402');
INSERT INTO `yf_notes` VALUES ('228', '2', '-1', '', '0', '0', '0', '0', '8', '1463903372');

-- ----------------------------
-- Table structure for `yf_pt`
-- ----------------------------
DROP TABLE IF EXISTS `yf_pt`;
CREATE TABLE `yf_pt` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '品牌名',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of yf_pt
-- ----------------------------
INSERT INTO `yf_pt` VALUES ('1', '微博', '2016-02-26 05:17:21');
INSERT INTO `yf_pt` VALUES ('2', '微信', '2016-02-26 05:17:32');
INSERT INTO `yf_pt` VALUES ('3', '知乎', '2016-02-26 05:17:39');
INSERT INTO `yf_pt` VALUES ('4', '其他', '2016-02-26 05:17:48');

-- ----------------------------
-- Table structure for `yf_top`
-- ----------------------------
DROP TABLE IF EXISTS `yf_top`;
CREATE TABLE `yf_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_top
-- ----------------------------
INSERT INTO `yf_top` VALUES ('1', '杨幂', '1457082002');
INSERT INTO `yf_top` VALUES ('2', '唐嫣', '1457082002');
INSERT INTO `yf_top` VALUES ('3', '赵丽颖', '1457082002');

-- ----------------------------
-- Table structure for `yf_user`
-- ----------------------------
DROP TABLE IF EXISTS `yf_user`;
CREATE TABLE `yf_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `qq` varchar(50) DEFAULT NULL COMMENT 'QQ',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `tel` varchar(255) DEFAULT NULL COMMENT '电话',
  `xy` varchar(255) DEFAULT NULL COMMENT '从事行业',
  `ck` tinyint(1) DEFAULT '0' COMMENT '0普通会员1银牌会员2金牌会员',
  `zctime` int(10) DEFAULT NULL COMMENT '注册时间',
  `dltime` int(10) DEFAULT NULL COMMENT '登录时间',
  `mdemail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yf_user
-- ----------------------------
INSERT INTO `yf_user` VALUES ('9', 'yf20174', '3dac003163fb33a732377d17ee8fa387', '555520174', 'yf20174@qq.com', '13901390000', '网络营销', '0', '1459622953', null, null);
INSERT INTO `yf_user` VALUES ('8', 'yf25200', '39cb299a573a9e559027507943bda3b7', '51451111', 'yf25200@qq.com', '1390139001', '网络营销', '2', '1456880600', null, null);
