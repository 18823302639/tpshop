/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-22 18:26:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章主键id',
  `goods_id` int(11) DEFAULT NULL COMMENT '用户表id',
  `article_title` char(50) DEFAULT NULL COMMENT '文章标题',
  `article_text` text COMMENT '文章内容',
  `article_author` char(20) DEFAULT NULL COMMENT '文章作者',
  `article_source` char(50) DEFAULT NULL COMMENT '文章来源',
  `article_stitle` varchar(200) DEFAULT NULL COMMENT 'seo标题',
  `article_skeyw` char(30) DEFAULT NULL COMMENT 'seo关键词',
  `article_sdes` varchar(200) DEFAULT NULL COMMENT 'seo描述',
  `article_thum` char(50) DEFAULT NULL COMMENT '文章缩略图地址',
  `article_type` mediumint(1) DEFAULT NULL COMMENT '文章类型',
  `article_time` datetime DEFAULT NULL COMMENT '写入时间',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('8', null, 'ces', '<p>a</p>', 'a', 'a', '', '', '', '20181220/6aa824425bb7f4c606f98510d58c0de7.png', '0', '2018-12-20 15:34:34');

-- ----------------------------
-- Table structure for `tp_category`
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `category_id` mediumint(2) NOT NULL AUTO_INCREMENT COMMENT '类别id',
  `category_name` char(20) NOT NULL COMMENT '类别名称',
  `category_dec` varchar(200) DEFAULT NULL COMMENT '类别描述',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='类别表';

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES ('1', '单页', '这是一个单页');
INSERT INTO `tp_category` VALUES ('2', '文章模型', '这是一个文章模型');
INSERT INTO `tp_category` VALUES ('3', '图片模型', '这是一个图片模型');

-- ----------------------------
-- Table structure for `tp_column`
-- ----------------------------
DROP TABLE IF EXISTS `tp_column`;
CREATE TABLE `tp_column` (
  `column_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `column_center` char(50) DEFAULT NULL COMMENT '栏目名称',
  `column_pid` int(11) DEFAULT NULL COMMENT '父栏目id',
  `column_dis` mediumint(1) DEFAULT NULL COMMENT '是否在前端显示',
  `column_time` datetime DEFAULT NULL COMMENT '写入时间',
  `category_id` mediumint(2) DEFAULT NULL COMMENT '类别表id',
  `column_text` text COMMENT '内容',
  PRIMARY KEY (`column_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='栏目表';

-- ----------------------------
-- Records of tp_column
-- ----------------------------
INSERT INTO `tp_column` VALUES ('17', '关于我们', '0', null, '2018-12-20 18:33:11', '1', null);
INSERT INTO `tp_column` VALUES ('18', '123', '0', null, '2018-12-22 15:23:31', '1', null);
INSERT INTO `tp_column` VALUES ('19', '123', '17', null, '2018-12-22 15:42:27', '2', null);
INSERT INTO `tp_column` VALUES ('20', '12', '0', null, '2018-12-22 16:34:20', '1', '<p>456789153654<br/></p>');
INSERT INTO `tp_column` VALUES ('21', '123', '19', null, '2018-12-22 18:14:55', '1', '<p>15345</p>');

-- ----------------------------
-- Table structure for `tp_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_center` char(50) DEFAULT NULL COMMENT '商品名称',
  `goods_pid` int(11) DEFAULT NULL COMMENT '商品父id',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES ('12', '123', '7');

-- ----------------------------
-- Table structure for `tp_member`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` char(50) DEFAULT NULL,
  `member_pwd` char(50) DEFAULT NULL,
  `member_time` datetime DEFAULT NULL COMMENT '写入时间',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='系统用户表';

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES ('4', '肖轩', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-13 16:16:38');
INSERT INTO `tp_member` VALUES ('5', 'admin', '63a9f0ea7bb98050796b649e85481845', '2018-12-20 11:29:56');

-- ----------------------------
-- Table structure for `tp_sys`
-- ----------------------------
DROP TABLE IF EXISTS `tp_sys`;
CREATE TABLE `tp_sys` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系统设置表',
  `sys_name` varchar(50) DEFAULT NULL COMMENT '网站名称',
  `sys_login` varchar(100) DEFAULT NULL COMMENT '网站login',
  `sys_record` varchar(50) DEFAULT NULL COMMENT '备案号',
  `sys_copyright` varchar(50) DEFAULT NULL COMMENT '版权',
  `sys_address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `sys_tel` char(20) DEFAULT NULL COMMENT '联系电话',
  `sys_email` char(30) DEFAULT NULL COMMENT '联系邮箱',
  `sys_stitle` varchar(50) DEFAULT NULL COMMENT 'seo标题',
  `sys_sdes` varchar(100) DEFAULT NULL COMMENT 'seo描述',
  `sys_skeyw` varchar(50) DEFAULT NULL COMMENT 'seo关键字',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
-- Records of tp_sys
-- ----------------------------
INSERT INTO `tp_sys` VALUES ('17', '3', null, '3', '3', '', '', '', '', '', '');
