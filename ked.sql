/*
Navicat MySQL Data Transfer

Source Server         : ht_mysql
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : ked

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-01-16 17:05:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jw_admin
-- ----------------------------
DROP TABLE IF EXISTS `jw_admin`;
CREATE TABLE `jw_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `groupid` tinyint(2) NOT NULL,
  `taxis` tinyint(4) NOT NULL,
  `islock` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_admin
-- ----------------------------
INSERT INTO `jw_admin` VALUES ('1', 'webmaster', 'b400ff6500cc44c33994eda6e2e91d2f', '1', '1', '1');
INSERT INTO `jw_admin` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2', '1', '1');
INSERT INTO `jw_admin` VALUES ('3', 'ht', '21232f297a57a5a743894a0e4a801fc3', '1', '1', '1');

-- ----------------------------
-- Table structure for jw_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `jw_admin_group`;
CREATE TABLE `jw_admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `catearr` text,
  `taxis` tinyint(4) NOT NULL,
  `pagelevel` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_admin_group
-- ----------------------------
INSERT INTO `jw_admin_group` VALUES ('1', '系统管理员', '1,2,3,4,5', '0', '', '系统管理员');
INSERT INTO `jw_admin_group` VALUES ('2', '超级管理员', '1,2,3,4,5,6,7,9,10,11,12,15,13,14,8,16,17,18,19,20,21,22,23,24,25,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100', '1', '5,6,11,12,37,16,26,27,43,44,45,46,34,35,17,18,19,40,41,42', '网站超级管理员');

-- ----------------------------
-- Table structure for jw_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `jw_admin_menu`;
CREATE TABLE `jw_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `issys` int(11) DEFAULT '0' COMMENT '系统规则',
  `isc` int(11) DEFAULT '0' COMMENT '内容',
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `model` tinyint(1) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `taxis` tinyint(4) DEFAULT NULL,
  `islock` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_admin_menu
-- ----------------------------
INSERT INTO `jw_admin_menu` VALUES ('5', '0', '系统配置', '1', '0', 'Role', '0', '0', 'fa-cogs', '10', '0');
INSERT INTO `jw_admin_menu` VALUES ('6', '5', '网站设置', '1', '0', 'Role/siteconfig', '1', '0', '', '9', '0');
INSERT INTO `jw_admin_menu` VALUES ('15', '5', '系统设置', '1', '0', 'Role/sysconfig', '1', '0', '', '10', '1');
INSERT INTO `jw_admin_menu` VALUES ('11', '5', '用户管理', '1', '0', 'Role/user', '1', '0', '', '8', '0');
INSERT INTO `jw_admin_menu` VALUES ('12', '5', '用户组管理', '1', '0', 'Role/usergroup', '1', '0', '', '7', '0');
INSERT INTO `jw_admin_menu` VALUES ('13', '5', '规则设置', '1', '0', 'Role/Index', '1', '0', '', '11', '1');
INSERT INTO `jw_admin_menu` VALUES ('17', '0', '幻灯管理', '0', '0', 'Carousel', '0', '0', 'fa-photo', '3', '0');
INSERT INTO `jw_admin_menu` VALUES ('18', '17', '幻灯位置', '0', '0', 'Carousel/group', '1', '0', '', '0', '0');
INSERT INTO `jw_admin_menu` VALUES ('19', '17', '幻灯管理', '0', '0', 'Carousel/index', '1', '0', '', '0', '0');
INSERT INTO `jw_admin_menu` VALUES ('34', '0', '粉丝管理', '0', '0', 'User', '0', '0', 'fa-user-plus', '4', '0');
INSERT INTO `jw_admin_menu` VALUES ('35', '34', '粉丝列表', '0', '0', 'User/index', '1', '0', '', '0', '0');
INSERT INTO `jw_admin_menu` VALUES ('16', '0', '内容管理', '1', '1', 'Content', '0', '0', 'fa-tv', '8', '0');
INSERT INTO `jw_admin_menu` VALUES ('37', '0', '栏目管理', '1', '0', 'Category', '0', null, 'fa-reorder', '9', '0');
INSERT INTO `jw_admin_menu` VALUES ('40', '0', '微信配置', '0', '0', 'Wechat', '0', null, 'fa-wechat', '0', '0');
INSERT INTO `jw_admin_menu` VALUES ('41', '40', '基础配置', '0', '0', 'Wechat/config', '1', null, '', '0', '0');
INSERT INTO `jw_admin_menu` VALUES ('42', '40', '自定义菜单', '0', '0', 'Wechat/menu', '1', null, '', '0', '0');

-- ----------------------------
-- Table structure for jw_carousel
-- ----------------------------
DROP TABLE IF EXISTS `jw_carousel`;
CREATE TABLE `jw_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `links` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `taxis` tinyint(1) DEFAULT '0',
  `groupid` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_carousel
-- ----------------------------
INSERT INTO `jw_carousel` VALUES ('10', '首页banner1', '', '', '/UpLoadFile/image/2017-01-13/58787901cf9e0.jpg', '1', '3');

-- ----------------------------
-- Table structure for jw_carousel_group
-- ----------------------------
DROP TABLE IF EXISTS `jw_carousel_group`;
CREATE TABLE `jw_carousel_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_carousel_group
-- ----------------------------
INSERT INTO `jw_carousel_group` VALUES ('3', '首页', '首页banner');

-- ----------------------------
-- Table structure for jw_category
-- ----------------------------
DROP TABLE IF EXISTS `jw_category`;
CREATE TABLE `jw_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) NOT NULL,
  `EnglishName` varchar(255) DEFAULT NULL COMMENT '英文简介',
  `pid` tinyint(4) NOT NULL,
  `isnav` tinyint(2) NOT NULL,
  `model` tinyint(2) NOT NULL,
  `shortcontent` text NOT NULL,
  `content` text NOT NULL,
  `defaultpic` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `docsrc` varchar(255) DEFAULT NULL,
  `sty` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `links` varchar(255) NOT NULL,
  `taxis` tinyint(4) NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `listtemp` varchar(255) DEFAULT NULL,
  `contenttemp` varchar(255) DEFAULT NULL,
  `pagesize` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_category
-- ----------------------------
INSERT INTO `jw_category` VALUES ('43', '小区介绍', '', '0', '1', '0', '', '', '', '/UpLoadFile/image/2017-01-12/5876ee5ca1158.jpg', null, null, '', 'http://', '1', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('44', '物业服务', 'REALTY SERVICE', '0', '1', '0', '', '', '', '/UpLoadFile/image/2017-01-12/5876f10489670.jpg', null, null, '', 'http://', '2', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('45', '业委会动态', '', '0', '1', '1', '', '', '', '/UpLoadFile/image/2017-01-12/5876f28004d58.jpg', null, null, '', 'http://', '3', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('46', '物业简介', '', '0', '1', '0', '', '', '', '/UpLoadFile/image/2017-01-12/5876f3f4baf68.jpg', null, null, '', 'http://', '4', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('47', '便民信息', '', '0', '1', '1', '', '', '', '/UpLoadFile/image/2017-01-12/5876f726041a0.jpg', null, null, '', 'http://', '5', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('48', '新闻动态', '', '0', '1', '1', '', '', '', '/UpLoadFile/image/2017-01-12/5876f8b9af000.jpg', null, null, '', 'http://', '6', null, '', '', '20');
INSERT INTO `jw_category` VALUES ('49', '小区简介', '', '43', '1', '0', '', '<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"> <span style=\"box-sizing:border-box;line-height:2;\"> 为了大幅改善教职员工住宿条件，稳定人才队伍并吸引更多海内外杰出人才加盟科大，为人才解除居住方面的后顾之忧，我校在省市政府大力支持下，于2004年始投资在南区校园属地上规划建造教职工专属高尚住宅小区 “科大花园”，可容纳约1600户教职 员工居住。</span> \r\n	</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"> <span style=\"box-sizing:border-box;line-height:2;\"> “科大花园“项目总建筑面积为29.36万平方米，以桐城南路为界分为西区”闻青苑”和东区“闻欣苑“两个区域。项目在总体规划方面，设计理念体现以人为本，规划立意寓意深刻，布局科学合理。园区建设规划的指导思想明确、功能完善、结构合理。公寓楼房全部为高层，包含多种户型，面积由105平米起至约200平米。在单体户型设计方面，空间组织合理，功能配套齐全，结构布置灵活可变。目前，引进人才可享受学校财政补贴，以优惠价格购买相应户型的公寓住房。</span> \r\n</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"> <span style=\"box-sizing:border-box;line-height:2;\"></span><span style=\"box-sizing:border-box;line-height:2;\"> 目前，学校正在已建成的“科大花园一期”基础上筹划建造“科大花园二期”，为未来的引进人才提供充足房源。</span> \r\n	</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"> <span style=\"box-sizing:border-box;line-height:2;\"> “科大花园“地处合肥市黄金地段，周边公共设施齐备、生活交通便捷；且与学校的其它三个校区均有校园班车连通，教师上下班非常方便。</span> \r\n</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"><span style=\"box-sizing:border-box;line-height:2;\"><img src=\"/UpLoadFile/image/20170113/20170113092454_58872.jpg\" alt=\"\" width=\"933\" height=\"506\" title=\"\" align=\"\" /><br />\r\n</span>\r\n	</p>', '/UpLoadFile/image/2017-01-12/5876ee792f508.jpg', '', null, null, '', 'http://', '1', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('50', '周边配套', '', '43', '1', '1', '', '', '', '', null, null, '', 'http://', '2', '1', 'a2.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('51', '秩序维护', '', '44', '1', '0', '', '', '', '', null, null, '', 'http://', '1', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('52', '环境保洁', '', '44', '1', '0', '', '', '', '', null, null, '', 'http://', '2', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('53', '绿化服务', '', '44', '1', '0', '', '', '', '', null, null, '', 'http://', '3', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('54', '工程维修', '', '44', '1', '0', '', '', '', '', null, null, '', 'http://', '4', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('55', '家政服务', '', '44', '1', '0', '', '', '', '', null, null, '', 'http://', '5', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('56', '业委会动态', '', '45', '1', '1', '', '', '', '', null, null, '', 'http://', '1', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('57', '组织结构', '', '45', '1', '0', '', '', '', '', null, null, '', 'http://', '2', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('58', '业委会职责', '', '45', '1', '0', '', '', '', '', null, null, '', 'http://', '3', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('59', '业主公约', '', '45', '1', '0', '', '', '', '', null, null, '', 'http://', '4', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('60', '物业简介', '', '46', '1', '0', '', '<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"><span style=\"box-sizing:border-box;color:#666666;line-height:2;\">公司于2014年12月2日正式成立，注册资本金1000万元人民币，目前拥有员工350余人，承接物业管理建筑面积50余万平方米，涉及公寓住宅、高校、商业广场、科研机构等多种物业业态。业务范围涵盖安全保卫服务，环境保洁服务，楼宇电梯、空调、供配电、给排水等工程设备维修维护服务、绿化养护服务、教学科研辅助服务、会议接待服务、体育场所运行管理服务、健身俱乐部运营服务、咖啡吧运营服务、家政服务等多方面内容。</span> \r\n	</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"><br />\r\n</p>\r\n<p style=\"box-sizing:border-box;margin-top:0px;margin-bottom:10px;color:#333333;font-family:\" font-size:14px;white-space:normal;background-color:#ffffff;\"=\"\"> <span style=\"box-sizing:border-box;color:#666666;font-size:16px;line-height:2;\"><span style=\"box-sizing:border-box;font-weight:700;\">服务承诺</span></span><br style=\"box-sizing:border-box;\" />\r\n<br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 科大花园二期人才楼物业项目部受托为本小区提供前期物业服务,对本物业依法实施秩序维护、清洁、绿化、共用设施设备维护、公共事务等全方位的物业管理工作。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 物业项目部本着“业主至上”的工作原则，“想业主之所想，急业主之所急”，力求将管理服务工作的每一个细节做的尽善尽美。在工作中，物业项目部将严格推行“服务工作时效制、回访制和服务承诺制”，通过全体员工的辛勤工作使您的生活无忧无虑，开心每一天。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\">特别服务承诺与服务纪律：</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 一、本小区物业服务内容及标准参照《合肥市住宅小区服务规范及等级指导性标准》（甲级）执行。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 二、欢迎您对我们的物业管理服务工作提出批评和建议，我们保证认真倾听您的意见，认真解决每一个合理的建议问题。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 三、对您的任何一项服务工作我们都将实行时效工作制，使您的困难在最短的时间内得到解决。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 四、物业项目部禁止员工对业主进行私人间的服务交易，禁止员工接受业主的经济赏赐和其他利益。</span><br style=\"box-sizing:border-box;\" />\r\n<span style=\"box-sizing:border-box;color:#666666;line-height:2;\"> 五、欢迎您拨打我们的热线服务电话：0551- 63471616 。</span> \r\n	</p>', '', '', null, null, '', 'http://', '1', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('61', '机构介绍', '', '46', '1', '0', '', '', '/UpLoadFile/image/2017-01-12/5876f4c6bea00.jpg', '', null, null, '', 'http://', '2', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('62', '人才招聘', '', '46', '1', '0', '', '', '', '', null, null, '', 'http://', '3', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('63', '员工风采', 'STAFF PRESENCE', '46', '1', '1', '', '', '', '', null, null, '', 'http://', '4', '1', 'a2.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('64', '网上报修', '', '46', '1', '0', '', '', '', '', null, null, '', 'http://', '5', '1', 'fix.html', '', '20');
INSERT INTO `jw_category` VALUES ('65', '业主信箱', '', '46', '1', '0', '', '', '', '', null, null, '', 'http://', '6', '1', 'discuss.html', '', '20');
INSERT INTO `jw_category` VALUES ('66', '联系我们', '', '46', '1', '0', '', '', '', '', null, null, '', 'http://', '7', '1', 'page.html', '', '20');
INSERT INTO `jw_category` VALUES ('67', '生活妙招', '', '47', '1', '1', '', '', '', '', null, null, '', 'http://', '1', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('68', '房源租售', '', '47', '1', '1', '', '', '', '', null, null, '', 'http://', '2', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('69', '办事指南', '', '47', '1', '1', '', '', '', '', null, null, '', 'http://', '3', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('70', '通知公告', '', '48', '1', '1', '', '', '', '', null, null, '', 'http://', '1', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('71', '工作简讯', '', '48', '1', '1', '', '', '', '', null, null, '', 'http://', '2', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('72', '物业知识', '', '48', '1', '1', '', '', '', '', null, null, '', 'http://', '3', '1', 'article.html', 'show.html', '20');
INSERT INTO `jw_category` VALUES ('73', '行内资讯', '', '48', '1', '1', '', '', '', '', null, null, '', 'http://', '4', '1', 'article.html', 'show.html', '20');

-- ----------------------------
-- Table structure for jw_comment
-- ----------------------------
DROP TABLE IF EXISTS `jw_comment`;
CREATE TABLE `jw_comment` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uname` varchar(255) NOT NULL,
  `addtime` datetime NOT NULL,
  `content` text NOT NULL,
  `pid` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_comment
-- ----------------------------
INSERT INTO `jw_comment` VALUES ('13', '那我也来测试看看', '2017-01-16 14:26:39', '测试啊测试测试测试', '6');

-- ----------------------------
-- Table structure for jw_content
-- ----------------------------
DROP TABLE IF EXISTS `jw_content`;
CREATE TABLE `jw_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `catename` varchar(255) NOT NULL,
  `cateid` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `comefrom` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `defaultpic` varchar(255) NOT NULL,
  `docsrc` varchar(255) DEFAULT NULL,
  `picarr` text,
  `picarrcm` text,
  `links` varchar(255) NOT NULL,
  `shortcontent` text,
  `content` longtext NOT NULL,
  `thepla` varchar(255) DEFAULT NULL,
  `thebeg` date DEFAULT NULL,
  `theed` date DEFAULT NULL,
  `isgood` tinyint(4) NOT NULL DEFAULT '0',
  `isfocus` tinyint(2) NOT NULL DEFAULT '0',
  `taxis` int(11) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=528 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_content
-- ----------------------------
INSERT INTO `jw_content` VALUES ('527', '111111', '', '工作简讯', '71', '', '', '0', '0', '', '', '', null, '', '11111111', '11111111', null, null, null, '0', '0', '4', '2017-01-13 15:41:02');
INSERT INTO `jw_content` VALUES ('510', '周边公交', '', '周边配套', '50', '', '', '0', '3', '/UpLoadFile/image/2017-01-12/5876f5ab8a9f8.jpg', '', '', null, '', '科大花园二期附近共有两处公交站点，分别位于水阳江路的卫塘站和徽州大道的卫塘站，周边有14条公交线路. 水阳江路上的卫唐站公交车有：108路（合肥南站——植物园站）运营时段6：00-22：00； 41路（柳树塘站——和平广场站）运营时段6：00-19：30。 徽州大道上的卫唐站公交车有： 4路（荣城花园站—', '科大花园二期附近共有两处公交站点，分别位于水阳江路的卫塘站和徽州大道的卫塘站，周边有14条公交线路.<br />\r\n&nbsp; &nbsp; &nbsp;水阳江路上的卫唐站公交车有：108路（合肥南站——植物园站）运营时段6：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 41路（柳树塘站——和平广场站）运营时段6：00-19：30。<br />\r\n&nbsp; &nbsp; &nbsp;徽州大道上的卫唐站公交车有： &nbsp; 4路（荣城花园站——合肥南站站）运营时段6：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 11路（合肥南站站——中绿广场站）运营时段6:00-21:30;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;116路（同和民康小区站——望龙学校站）运营时段6：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;703路（合肥南站站——市府广场站）运营时段21：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 14路（淝河镇站——建材一厂站)运营时段6：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; T12路（省政务中心站——安居苑站）运营时段17：00-18：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 235路（滁州路站——临湖社区站）运营时段6：00-21：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;51路（省电气学校站——合肥南站站）运营时段6：30-19：30；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;60路（佳源巴黎都市站——东陈岗站）运营时段6：00-21：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;K1路（市府广场——滨湖时代广场）运营时段6：00-22：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;702路（淝河停保场站——淝河停保场站）运营时段19：00-23：00；<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;135路（十五里河站——郎溪路枢纽站）运营时段6：00-22：00。<br />', null, null, null, '0', '0', '1', '2017-01-12 11:18:41');
INSERT INTO `jw_content` VALUES ('506', '[细学]5级物业服务标准细则', '', '业委会动态', '56', '', '', '0', '0', '/UpLoadFile/image/2017-01-13/5878487e3be98.jpg', '', '', null, '', '用心做事和用身体做事是有很大区别，准时上班，从不偷懒，但是就是缺乏感召力，久而久之，空而泛泛！用心做事和用身体做事是有很大区别，准时上班，从不偷懒，但是就是缺乏感召力，久而久之，空而泛泛！用心做事和用身体做事是有很大区别，准时上班，从不偷懒，但是就是缺乏感召力，久而久之，空而泛泛！用心做事和用身体做事是有很大区别，准时上班，从不偷懒，但是就是缺乏感召力，久而久之，空而泛泛！用心做事和用身体做事是有很大区别，准时上班，从不偷懒，但是就是缺乏感召力，久而久之，空而泛泛！用心做事和用身体做事是有很大区别。 用心做事和用身体做事是有很大…', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:08:33');
INSERT INTO `jw_content` VALUES ('507', '将业委会一举一动“晒”在阳光下', '', '业委会动态', '56', '', '', '0', '0', '', '', '', null, '', '近年来，小区业委会与物管公司相互勾结侵害业主利益的案例屡见报端，这让不少业主对业委会究竟为谁代言产生怀疑。罗湖今年重磅推出物业管理改革，其中一大亮点就是建立业主监事会试点，罗湖希望通过监事会制度规范业委会在阳光下运行，从而进一步强化实现业主自我管理和监督。…', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:09:53');
INSERT INTO `jw_content` VALUES ('508', '合肥业委会人手少经费紧是“通病” 大多业主不知业委会是何物', '', '业委会动态', '56', '', '', '0', '0', '', '', '', null, '', '根据安徽省住房保障和房产管理局下发的《合肥市业主大会和业主委员会规程》解释，合肥市业主大会和业主委员会规程业主大会代表物业管理区域内全体业主行使在物业管理活动中的合法权利，督促业主履行物业管理中的相应义务', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '3', '2017-01-12 11:10:29');
INSERT INTO `jw_content` VALUES ('511', '合肥南站', '', '周边配套', '50', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876f5ee34328.jpg', '', '', null, '', '<span style=\"color:#333333;font-family:songti;font-size:16px;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:20:00');
INSERT INTO `jw_content` VALUES ('512', '111', '', '员工风采', '63', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876f63166fa8.jpg', '', '', null, '', '<span style=\"color:#333333;font-family:songti;font-size:16px;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:21:05');
INSERT INTO `jw_content` VALUES ('513', '222', '', '员工风采', '63', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876f6547e2c0.jpg', '', '', null, '', '<span style=\"color:#333333;font-family:songti;font-size:16px;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:21:42');
INSERT INTO `jw_content` VALUES ('514', '日常家居废物利用妙招小集锦', '', '生活妙招', '67', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876f7790d610.jpg', '', '', null, '', '1、卷纸芯和保鲜袋芯的妙用 2、不用的线可以这样做，用时很方便易找 3、用过的洗衣液瓶，扔掉多可惜！沿着画线部分剪下来！ 装些小零部件，随你所需 4、这样香蕉就不会黑了', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:26:34');
INSERT INTO `jw_content` VALUES ('515', '防台风的应急指引', '', '生活妙招', '67', '', '', '0', '0', '', '', '', null, '', '防台风的应急指引', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:27:39');
INSERT INTO `jw_content` VALUES ('516', '自救常识', '', '生活妙招', '67', '', '', '0', '0', '', '', '', null, '', '自救常识', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '3', '2017-01-12 11:28:18');
INSERT INTO `jw_content` VALUES ('517', '常用网址一览表', '', '办事指南', '69', '', '', '0', '0', '', '', '', null, '', '常用网址一览表', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:30:44');
INSERT INTO `jw_content` VALUES ('518', '常用电话号码一览表', '', '办事指南', '69', '', '', '0', '0', '', '', '', null, '', '常用电话号码一览表', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:31:02');
INSERT INTO `jw_content` VALUES ('519', '2016年供暖通知', '', '通知公告', '70', '', '', '0', '4', '/UpLoadFile/image/2017-01-12/5876fc2524540.jpg', '', '', null, '', '尊敬的各位业主： 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。 供暖收费时间定于2016年11月10日(下周二)一天时间，在小区内设置流动银行，请各位业主接到通知后相互转告。 物业项目部 2016年11月6日', '<p style=\"white-space:normal;color:#333333;font-family:songti;font-size:16px;background-color:#FFFFFF;\">\r\n	<span style=\"line-height:2;\">尊敬的各位业主：</span><br />\r\n<span style=\"line-height:2;\"> &nbsp; &nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span><br />\r\n<span style=\"line-height:2;\"> &nbsp; &nbsp; 供暖收费时间定于2016年11月10日(下周二)一天时间，在小区内设置流动银行，请各位业主接到通知后相互转告。</span><br />\r\n<span style=\"line-height:2;\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;物业项目部</span><br />\r\n<span style=\"color:#333333;font-family:songti;font-size:16px;line-height:2;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"line-height:2;\">2016年11月6日</span> \r\n</p>\r\n<p align=\"right\" style=\"white-space:normal;color:#333333;font-family:songti;font-size:16px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>', null, null, null, '0', '0', '1', '2017-01-12 11:46:22');
INSERT INTO `jw_content` VALUES ('520', '小区关于停电的通知', '', '通知公告', '70', '', '', '0', '0', '', '', '', null, '', '接供电公司通知，因高压线路需要检修，定于20XX年12月10日(星期四)早上 06：00时至晚上08:00时整个小区将会停电。请广大业主/住户互相告知，并做好相应的停电准备。对您的生活造成不便之处，敬请见谅！…', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:47:03');
INSERT INTO `jw_content` VALUES ('521', '关于建立物业管理微信群的通知', '', '通知公告', '70', '', '', '0', '2', '/UpLoadFile/image/2017-01-12/5876fc6336650.jpg', '', '', null, '', '各街镇、物业服务企业： 为进一步提高工作效率，促进行业管理内部交流和沟通，建立问题处理的快速反应机制，经研究，决定建立街镇、企业物业管理微信群，充分发挥网络办公的便捷作用。具体内容通知如下： 一、微信群的建立 1、街镇物业管理微信群。由各街镇组织建立，街镇内部相关物业管理的部门参与，邀请行政执法等派驻机构、社区居委会及辖区物业服务企业参加。 2、物业服务企业微信群。由各物业服务企业按管理项目组织建立，邀请社区居委会、网格员、片警及小区全体业主参与。 二、微信群的管理 1、微信群作用。微信群主要用于日常沟通、问题反映与处置，与日常工作无关的内…', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '3', '2017-01-12 11:47:36');
INSERT INTO `jw_content` VALUES ('522', '关于加紧做好科大花园二期物业管理服务第三次碰头会议', '', '工作简讯', '71', '', '', '0', '0', '', '', '', null, '', '根据计划安排，2016年10月14日下午，公司组织科大花园二期物业筹备组相关人员召开第三次工作进度碰头会，马千里、张久兵、梁波、胡其兆、马男、朱晓敏参加，会议由马千里副总经理主持。 图为参加科大花园二期物业管理服务工作会议 会议首先由物业部 经理 张久兵详细汇报了科花二期自10月7日一…', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:48:13');
INSERT INTO `jw_content` VALUES ('523', '日常多演练 防患于未然', '', '工作简讯', '71', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876fc9ddf958.jpg', '', '', null, '', '为了进一步加强物业服务区域内的安全管理，提高物业服务人员的应急能力，2016年9月28日16点整，物业项目部开展了突发事件应急演练。 本次演练主要分成两大部分，第一部分就怎样扑灭火源进行了讲解，现场演示了灭火器及消防栓的使用方法。第二部分对电梯运行突发情况进行了说明，演示了乘客被困时正确的自我保护姿势、应急处理方式，现场秩序维护员和客服人员的应对方法等。 通过此次演习，服务人员掌握了应急知识，增强了安全意识，对有效开展应急事件奠定了基础。', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:48:36');
INSERT INTO `jw_content` VALUES ('524', '公司组织开展第三季度绩效考核', '', '工作简讯', '71', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876fcc31c840.jpg', '', '', null, '', '2016年11月2日至4日，为期三天的第三季度绩效考核圆满结束。 11月2日上午9点，在公司马总的带领下，由品质部及各项目参与组成的绩效考核小组，首先对软件园进行考核。考核分为两组，一组检查档案资料；一组查看现场，根据《季度绩效考核表》从品质、工程、环境、安保四个方便着手重点查看项目在园区的服务状况，并针对检查的问题提出相应的建议。在“公平、公正”的原则下，考核小组逐一对公司所属项目进行考查。 通过此次考核，强化了公司服务的标准，提高员工服务意识，为公司服务品质的提升打下了基础。', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '3', '2017-01-12 11:49:12');
INSERT INTO `jw_content` VALUES ('525', '双十一快递物业代签代收 出了问题谁担责？', '', '行内资讯', '73', '', '', '0', '0', '/UpLoadFile/image/2017-01-12/5876fcfb56dd8.jpg', '', '', null, '', '“双十一”之后，海量的快件陆续进入投递模式。由于周一开始已进入正常工作日，因此快递公司往往将寄往“收件人”家中的快件集中摆放在小区物业门卫。然而，个别小区还是因为快件量远远超出了物业的接收能力、以及无专人看管等因素，造成了“收件人”取件时，部分快递出现了破损、甚至丢失的情况。那么，物业如此“被迫”代收快递，出了问题究竟该由谁来担责呢？ 快件出现质量问题 有业主“问责”物业 “取快递时，看到小区物业把居民的快递随意的堆在地上，这个很容易造成一些商品的破损。作为小区物业应该为小区居民着想，起码应该摆放的整齐一点。”昨天，家住“常熟老街”…\r\n2016-11-16', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '1', '2017-01-12 11:49:56');
INSERT INTO `jw_content` VALUES ('526', '暖气不热该找谁？ 先找物业公司 再联系供热单位', '', '行内资讯', '73', '', '', '0', '0', '', '', '', null, '', '每年集中供热中，市民都可能遇到各种各样的问题。无论是没有暖气，还是温度不达标，都让人伤脑筋。记者经过多年采访总结，并结合市热力监管中心的建议得出结论：市民如遇用热问题，最快捷的流程应该是先找物业公司，再联系供热单位，最后联系热力监管中心。', '<span style=\"color:#333333;font-family:songti;font-size:16px;white-space:normal;background-color:#FFFFFF;\">&nbsp; 2016年冬季供暖期临近，科大花园二期为第一年供暖，供暖设施在法定一年质保期内，为了保证正常供暖，确保质保期内各位业主的供暖设施能及时得到保修，要求新接收房屋的业主尽量全部供暖，如因业主不供暖造成室内水暖设施冻坏、地面砖冻裂，或达不到供暖户数，影响整个小区供暖温度，物业公司不负任何责任。暖气费执行物价局统一标准22元/平方米。</span>', null, null, null, '0', '0', '2', '2017-01-12 11:50:32');

-- ----------------------------
-- Table structure for jw_coupon
-- ----------------------------
DROP TABLE IF EXISTS `jw_coupon`;
CREATE TABLE `jw_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '优惠券名',
  `num` int(11) DEFAULT NULL COMMENT '数量',
  `hasnum` int(11) DEFAULT NULL COMMENT '剩余张数',
  `btime` datetime DEFAULT NULL COMMENT '开始时间',
  `etime` datetime DEFAULT NULL COMMENT '截止时间',
  `faceval` float(9,2) DEFAULT NULL COMMENT '面值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for jw_discuss
-- ----------------------------
DROP TABLE IF EXISTS `jw_discuss`;
CREATE TABLE `jw_discuss` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text NOT NULL,
  `pname` varchar(255) NOT NULL,
  `dnum` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  `uip` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_discuss
-- ----------------------------
INSERT INTO `jw_discuss` VALUES ('6', '文字啊文字文字文字文字', 'ht', '1', '2017-01-16 14:26:01', '::1', '这只是一个简单的测试啊');

-- ----------------------------
-- Table structure for jw_fav
-- ----------------------------
DROP TABLE IF EXISTS `jw_fav`;
CREATE TABLE `jw_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `ordtype` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_fav
-- ----------------------------

-- ----------------------------
-- Table structure for jw_fix
-- ----------------------------
DROP TABLE IF EXISTS `jw_fix`;
CREATE TABLE `jw_fix` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(32) NOT NULL COMMENT '报修门类',
  `tel` varchar(100) NOT NULL,
  `address` text,
  `problem` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_fix
-- ----------------------------
INSERT INTO `jw_fix` VALUES ('1', '管道维修', '111111111', '2121212121', '123121321');
INSERT INTO `jw_fix` VALUES ('2', '电器维修', '2343432434', '324324342', '32423432434');

-- ----------------------------
-- Table structure for jw_goods
-- ----------------------------
DROP TABLE IF EXISTS `jw_goods`;
CREATE TABLE `jw_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(11) NOT NULL COMMENT '分类ID',
  `catename` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `picarr` varchar(255) DEFAULT NULL,
  `picarrcm` text,
  `price` float(9,2) NOT NULL COMMENT '价格',
  `rpri` float(9,2) DEFAULT NULL,
  `ypri` float(9,2) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `content` text,
  `sellnum` int(11) DEFAULT NULL,
  `acttime` datetime DEFAULT NULL,
  `ishot` tinyint(2) DEFAULT '0',
  `ismin` tinyint(4) DEFAULT '0',
  `ordtype` int(11) DEFAULT '0' COMMENT '商品类型',
  `score` int(11) DEFAULT '0' COMMENT '兑换商品',
  `stock` int(11) DEFAULT NULL COMMENT '库存',
  `taxis` tinyint(2) DEFAULT NULL,
  `sta` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_goods
-- ----------------------------

-- ----------------------------
-- Table structure for jw_goods_cate
-- ----------------------------
DROP TABLE IF EXISTS `jw_goods_cate`;
CREATE TABLE `jw_goods_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `catename` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `content` text,
  `level` int(11) DEFAULT '0',
  `taxis` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_goods_cate
-- ----------------------------

-- ----------------------------
-- Table structure for jw_meet_ord
-- ----------------------------
DROP TABLE IF EXISTS `jw_meet_ord`;
CREATE TABLE `jw_meet_ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hymc` varchar(255) DEFAULT NULL,
  `hyrq` varchar(255) DEFAULT NULL,
  `bzrq` varchar(255) DEFAULT NULL,
  `cdmj` varchar(255) DEFAULT NULL,
  `gsmc` varchar(255) DEFAULT NULL,
  `gsdz` varchar(255) DEFAULT NULL,
  `lxr` varchar(255) DEFAULT NULL,
  `dh` varchar(255) DEFAULT NULL,
  `sj` varchar(255) DEFAULT NULL,
  `cz` varchar(255) DEFAULT NULL,
  `yx` varchar(255) DEFAULT NULL,
  `hylb` varchar(255) DEFAULT NULL,
  `mak` text,
  `ispass` tinyint(2) DEFAULT '0',
  `ord_type` tinyint(2) DEFAULT '0' COMMENT '0-展厅预定,1-会议预定,2-租赁',
  `sid` int(11) DEFAULT '0' COMMENT '关联文章ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_meet_ord
-- ----------------------------
INSERT INTO `jw_meet_ord` VALUES ('22', '滨湖国际会展中心', '2016-12-03', '2012-12-06', '1000', '安徽九五信息科技有限公司', '合肥市高新区黄山路624号桑夏精英时代广场205室', '朱长江', '0551-65397195', '13739274952', '0551-65397195', '137612284@qq.com', '专业类', '数据测试测试....', '0', '1', '0');

-- ----------------------------
-- Table structure for jw_order
-- ----------------------------
DROP TABLE IF EXISTS `jw_order`;
CREATE TABLE `jw_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(255) NOT NULL COMMENT '订单编号',
  `price` float(9,2) NOT NULL COMMENT '订单金额',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `addtime` datetime DEFAULT NULL COMMENT '订单日期',
  `trade_no` varchar(255) DEFAULT NULL COMMENT '支付流水号',
  `lasttime` datetime DEFAULT NULL COMMENT '状态变更日期',
  `ishot` tinyint(4) DEFAULT '0' COMMENT '爆款订单',
  `ismin` tinyint(4) DEFAULT '0' COMMENT '秒杀订单',
  `ishg` int(11) DEFAULT '0',
  `ordtype` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_order
-- ----------------------------

-- ----------------------------
-- Table structure for jw_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `jw_order_goods`;
CREATE TABLE `jw_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `goods_title` varchar(255) NOT NULL COMMENT '商品标题',
  `goods_price` float(9,2) NOT NULL COMMENT '商品价格',
  `goods_img` varchar(255) NOT NULL COMMENT '商品图片',
  `goods_num` int(11) DEFAULT NULL COMMENT '商品数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for jw_order_pay
-- ----------------------------
DROP TABLE IF EXISTS `jw_order_pay`;
CREATE TABLE `jw_order_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(255) DEFAULT NULL COMMENT '订单标识',
  `result_code` varchar(255) DEFAULT NULL COMMENT '支付状态',
  `err_code` varchar(255) DEFAULT NULL COMMENT '错误码',
  `err_code_des` varchar(255) DEFAULT NULL COMMENT '错误描述',
  `bank_type` varchar(255) DEFAULT NULL COMMENT '付款银行',
  `total_fee` int(11) DEFAULT NULL COMMENT '订单金额',
  `transaction_id` varchar(255) DEFAULT NULL COMMENT '微信支付订单号',
  `time_end` varchar(255) DEFAULT NULL COMMENT '支付完成时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_order_pay
-- ----------------------------

-- ----------------------------
-- Table structure for jw_place_ord
-- ----------------------------
DROP TABLE IF EXISTS `jw_place_ord`;
CREATE TABLE `jw_place_ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhfw` varchar(255) DEFAULT NULL,
  `gsmc` varchar(255) DEFAULT NULL,
  `zhrq` varchar(255) DEFAULT NULL,
  `sbrq` varchar(255) DEFAULT NULL,
  `cgmc` varchar(255) DEFAULT NULL,
  `ztbh` varchar(255) DEFAULT NULL,
  `yjmj` varchar(255) DEFAULT NULL,
  `zsfw` varchar(255) DEFAULT NULL,
  `docsrc` varchar(255) DEFAULT NULL,
  `ispass` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_place_ord
-- ----------------------------
INSERT INTO `jw_place_ord` VALUES ('4', '布艺工艺展览会', '安徽九五信息科技有限公司', '2016-10-15', '2016-10-17', '滨湖会展中心A馆', 'A-54216', '200平米', '布艺生厂商、加工商、开发商、渠道商、经销商', '/UpLoadFile/image/2016-12-01/583f8f7607a12.jpg', '0');

-- ----------------------------
-- Table structure for jw_score
-- ----------------------------
DROP TABLE IF EXISTS `jw_score`;
CREATE TABLE `jw_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '0' COMMENT '操作类型',
  `numb` int(11) DEFAULT NULL COMMENT '操作数量',
  `addtime` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT '操作时间',
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `oid` int(11) DEFAULT NULL COMMENT '订单ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_score
-- ----------------------------

-- ----------------------------
-- Table structure for jw_user
-- ----------------------------
DROP TABLE IF EXISTS `jw_user`;
CREATE TABLE `jw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '微信OPENID',
  `face` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '头像',
  `sex` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '性别',
  `nickname` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `telno` varchar(255) DEFAULT NULL COMMENT '手机号码',
  `addtime` datetime DEFAULT NULL COMMENT '关注日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jw_user
-- ----------------------------

-- ----------------------------
-- Table structure for jw_wechat_menu
-- ----------------------------
DROP TABLE IF EXISTS `jw_wechat_menu`;
CREATE TABLE `jw_wechat_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_wechat_menu
-- ----------------------------

-- ----------------------------
-- Table structure for jw_yhq_lis
-- ----------------------------
DROP TABLE IF EXISTS `jw_yhq_lis`;
CREATE TABLE `jw_yhq_lis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) DEFAULT NULL COMMENT '优惠券ID',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `tknum` varchar(255) DEFAULT NULL COMMENT '优惠券编号',
  `addtime` datetime DEFAULT NULL COMMENT '领券日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jw_yhq_lis
-- ----------------------------
