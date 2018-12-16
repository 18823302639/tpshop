/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-16 22:03:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `php_goods`
-- ----------------------------
DROP TABLE IF EXISTS `php_goods`;
CREATE TABLE `php_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(30) DEFAULT NULL COMMENT '商品名称',
  `goods_sn` char(16) DEFAULT NULL COMMENT '商品编号',
  `original` varchar(100) DEFAULT NULL COMMENT '商品原图',
  `sm_thumb` varchar(100) DEFAULT NULL COMMENT '小缩略图',
  `mid_thumb` varchar(100) DEFAULT NULL COMMENT '中缩略图',
  `max_thumb` varchar(100) DEFAULT NULL COMMENT '大缩略图',
  `markey_price` decimal(10,0) DEFAULT NULL COMMENT '市场价格',
  `shop_price` decimal(10,0) DEFAULT NULL COMMENT '本店价格',
  `onsale` enum('1','0') DEFAULT NULL COMMENT '是否上架（0，1）',
  `cate_id` mediumint(9) DEFAULT NULL COMMENT '所属栏目',
  `brand_id` mediumint(9) DEFAULT NULL COMMENT '所属品牌',
  `type_id` mediumint(10) DEFAULT NULL COMMENT '所属商品类型',
  `goods_desc` varchar(500) DEFAULT NULL COMMENT '详情描述',
  `goods_weight` char(20) DEFAULT NULL COMMENT '商品重量',
  `weight_unit` mediumint(5) DEFAULT NULL COMMENT '重量单位',
  `addtime` datetime DEFAULT NULL COMMENT '上架时间',
  `updatetime` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of php_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `php_member`
-- ----------------------------
DROP TABLE IF EXISTS `php_member`;
CREATE TABLE `php_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员主键ID',
  `usermane` char(50) DEFAULT NULL COMMENT '用户名称',
  `password` char(32) DEFAULT NULL COMMENT '用户密码',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `check_mail` tinyint(4) DEFAULT NULL COMMENT '是否验证（0：未验证，1：已验证）',
  `mail_str` varchar(32) DEFAULT NULL COMMENT '邮箱验证字符串',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别（0：保密，1：男，2：女）',
  `points` mediumint(8) DEFAULT NULL COMMENT '积分',
  `money` decimal(10,0) DEFAULT NULL COMMENT '余额',
  `regtime` int(10) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of php_member
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_type`
-- ----------------------------
DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE `shop_type` (
  `type_id` int(11) DEFAULT NULL,
  `type_name` char(50) DEFAULT NULL COMMENT '类型名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='类型表';

-- ----------------------------
-- Records of shop_type
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_attr`
-- ----------------------------
DROP TABLE IF EXISTS `tp_attr`;
CREATE TABLE `tp_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `attr_name` varchar(20) DEFAULT NULL COMMENT '属性名称',
  `attr_type` enum('1','0') DEFAULT NULL COMMENT '属性类型（0：唯一属性，1：单选属性）',
  `attr_values` text COMMENT '属性值',
  `type_id` mediumint(9) DEFAULT NULL COMMENT '类型id',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of tp_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_brand`
-- ----------------------------
DROP TABLE IF EXISTS `tp_brand`;
CREATE TABLE `tp_brand` (
  `brand_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `brand_name` varchar(30) DEFAULT NULL COMMENT '品牌名称',
  `brand_logo` varchar(100) DEFAULT NULL COMMENT '品牌LOGO',
  `brand_url` varchar(100) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of tp_brand
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
-- Table structure for `tp_goods_pic`
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods_pic`;
CREATE TABLE `tp_goods_pic` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品图片id',
  `goods_id` int(11) DEFAULT NULL,
  `original` varchar(100) DEFAULT NULL COMMENT '商品原图',
  `max_thumb` varchar(100) DEFAULT NULL COMMENT '大缩略图',
  `sm_thumb` varchar(100) DEFAULT NULL COMMENT '小缩略图',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品图片表';

-- ----------------------------
-- Records of tp_goods_pic
-- ----------------------------

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

-- ----------------------------
-- Table structure for `tp_member_level`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_level`;
CREATE TABLE `tp_member_level` (
  `lever_id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '等级名称',
  `lever_name` char(20) DEFAULT NULL,
  `points_min` int(10) DEFAULT NULL COMMENT '积分下限',
  `points_max` int(10) DEFAULT NULL COMMENT '积分上限',
  `rate` tinyint(3) DEFAULT NULL COMMENT '折扣率',
  PRIMARY KEY (`lever_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员等级表';

-- ----------------------------
-- Records of tp_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_price_level`
-- ----------------------------
DROP TABLE IF EXISTS `tp_price_level`;
CREATE TABLE `tp_price_level` (
  `price_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,0) DEFAULT NULL COMMENT '会员等级价格',
  `level_id` mediumint(9) DEFAULT NULL COMMENT '等级id',
  `goods_id` mediumint(9) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员价格表';

-- ----------------------------
-- Records of tp_price_level
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_product`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product`;
CREATE TABLE `tp_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(10) DEFAULT NULL COMMENT '商品id',
  `goods_number` int(11) DEFAULT NULL COMMENT '库存量',
  `goods_attr` varchar(150) DEFAULT NULL COMMENT '库存属性',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='库存表';

-- ----------------------------
-- Records of tp_product
-- ----------------------------
