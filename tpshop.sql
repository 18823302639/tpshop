/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-13 18:30:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_center` char(50) DEFAULT NULL COMMENT '商品名称',
  `goods_pid` int(11) DEFAULT NULL COMMENT '商品父id',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES ('6', '商品一级栏目', '0');
INSERT INTO `tp_goods` VALUES ('7', '二级栏目', '6');
INSERT INTO `tp_goods` VALUES ('8', '化妆品', '6');
INSERT INTO `tp_goods` VALUES ('9', '美食', '6');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_member
-- ----------------------------
INSERT INTO `tp_member` VALUES ('4', '肖轩', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-13 16:16:38');
