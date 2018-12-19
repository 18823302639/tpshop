/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-19 18:50:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章主键id',
  `article_title` char(50) DEFAULT NULL COMMENT '文章标题',
  `article_text` text COMMENT '文章内容',
  `article_author` char(20) DEFAULT NULL COMMENT '文章作者',
  `article_source` char(50) DEFAULT NULL COMMENT '文章来源',
  `article_stitle` varchar(200) DEFAULT NULL COMMENT 'seo标题',
  `article_skeyw` char(30) DEFAULT NULL COMMENT 'seo关键词',
  `article_sdes` varchar(200) DEFAULT NULL COMMENT 'seo描述',
  `article_thum` char(50) DEFAULT NULL COMMENT '文章缩略图地址',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of tp_article
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_center` char(50) DEFAULT NULL COMMENT '商品名称',
  `goods_pid` int(11) DEFAULT NULL COMMENT '商品父id',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES ('10', '这是一个一级栏目', '0');
INSERT INTO `tp_goods` VALUES ('11', '12345', '10');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='系统用户表';

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES ('4', '肖轩', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-13 16:16:38');
