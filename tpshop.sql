/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-01-06 21:55:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章主键id',
  `column_id` int(11) DEFAULT NULL COMMENT '栏目id',
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
  PRIMARY KEY (`column_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='栏目表';

-- ----------------------------
-- Records of tp_column
-- ----------------------------
INSERT INTO `tp_column` VALUES ('28', '联系我们', '0', null, '2019-01-06 14:57:28', '1');
INSERT INTO `tp_column` VALUES ('23', '首页', '0', null, '2019-01-06 14:50:48', '1');
INSERT INTO `tp_column` VALUES ('27', '招商加盟', '0', null, '2019-01-06 14:57:18', '1');
INSERT INTO `tp_column` VALUES ('24', '关于我们', '0', null, '2019-01-06 14:56:40', '1');
INSERT INTO `tp_column` VALUES ('26', '案例展示', '0', null, '2019-01-06 14:57:04', '1');
INSERT INTO `tp_column` VALUES ('25', '新闻中心', '0', null, '2019-01-06 14:56:53', '1');

-- ----------------------------
-- Table structure for `tp_column_content`
-- ----------------------------
DROP TABLE IF EXISTS `tp_column_content`;
CREATE TABLE `tp_column_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目内容id',
  `column_id` int(11) DEFAULT NULL COMMENT '栏目表id',
  `content_text` text COMMENT '栏目内容',
  `content_stitle` varchar(50) DEFAULT NULL COMMENT 'seo标题',
  `content_sdesc` varchar(50) DEFAULT NULL COMMENT 'seo描述',
  `content_skeyw` varchar(50) DEFAULT NULL COMMENT 'seo关键字',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='栏目内容表';

-- ----------------------------
-- Records of tp_column_content
-- ----------------------------
INSERT INTO `tp_column_content` VALUES ('1', '22', null, '发', '放大', '发生的');
INSERT INTO `tp_column_content` VALUES ('2', '22', '<p>123456</p>', '发', '发生的', '放大');
INSERT INTO `tp_column_content` VALUES ('3', '17', '<p>13245678913</p>', '12356', '13456', '123456');
INSERT INTO `tp_column_content` VALUES ('4', '28', '<p><img src=\"http://www.tpshop.com/static/images/c4.jpg\" width=\"400\" height=\"225\" id=\"imgs\"/></p><p>&quot;物业&quot;一词译自英语property或estate，由香港传入沿海、内地，其含义为财产、资产、地产、房地产、产业等。该词自20世纪80年代引入国内，现已形成了一个完整的概念，即：物业是指已经建成并投入使用的各类房屋及其与之相配套的设备、设施和场地。物业可大可小，一个单元住宅可以是物业，一座大厦也可以作为一项物业，同一建筑物还可按权属的不同分割为若干物业。物业含有多种业态如，办公楼宇、商业大厦、别墅、工业园区、酒店、厂房仓库等多种物业形式。一般认为，物业管理在我国仅有20年左右的发展历史，首先发端于沿海发达城市，逐步向内陆地区延伸，在国外，物业管理已经有一百多年的历史。外物业管理的起源来看，近代意义的物业管理起源于19世纪60年代的英国。1908年，由美国芝加哥大楼的所有者和管理者乔治·A·霍尔特组织的芝加哥建筑物管理</p><p><br/></p>', '联系我们', '联系我们', '联系我们');
INSERT INTO `tp_column_content` VALUES ('8', '0', '<p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">生成的subQuery结果为：</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">(&nbsp;SELECT&nbsp;`id`,`name`&nbsp;FROM&nbsp;`think_user`&nbsp;WHERE&nbsp;`id`&nbsp;&gt;&nbsp;10&nbsp;)</pre><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">调用buildSql方法后不会进行实际的查询操作，而只是生成该次查询的SQL语句（为了避免混淆，会在SQL两边加上括号），然后我们直接在后续的查询中直接调用。</p><blockquote class=\"info\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin: 14px 0px; line-height: 1.2; padding: 5px 5px 5px 15px; color: rgb(91, 192, 222); border-left: 4px solid rgb(91, 192, 222); background-color: rgb(244, 248, 250);\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">需要注意的是，使用前两种方法需要自行添加‘括号’。</p></blockquote><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">然后使用子查询构造新的查询：</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">Db::table($subQuery.&#39;&nbsp;a&#39;)\r\n&nbsp;&nbsp;&nbsp;&nbsp;-&gt;where(&#39;a.name&#39;,&#39;like&#39;,&#39;thinkphp&#39;)\r\n&nbsp;&nbsp;&nbsp;&nbsp;-&gt;order(&#39;id&#39;,&#39;desc&#39;)\r\n&nbsp;&nbsp;&nbsp;&nbsp;-&gt;select();</pre><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">生成的SQL语句为：</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">SELECT&nbsp;*&nbsp;FROM&nbsp;(&nbsp;SELECT&nbsp;`id`,`name`&nbsp;FROM&nbsp;`think_user`&nbsp;WHERE&nbsp;`id`&nbsp;&gt;&nbsp;10&nbsp;)&nbsp;a&nbsp;WHERE&nbsp;a.name&nbsp;LIKE&nbsp;&#39;thinkphp&#39;&nbsp;ORDER&nbsp;BY&nbsp;`id`&nbsp;desc</pre><h2 style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; padding: 0px 0px 0.3em; font-family: &quot;Helvetica Neue&quot;, NotoSansHans-Regular, AvenirNext-Regular, arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft Yahei&quot;, &quot;WenQuanYi Micro Hei&quot;, Arial, Helvetica, sans-serif; line-height: 1.225; margin: 14px 0px; font-weight: 400; font-size: 24px; border-bottom: 1px solid rgb(238, 238, 238);\"><a style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); position: absolute; margin-top: -66px;\"></a>4、使用闭包构造子查询</h2><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\"><code style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; display: inline-block; border-radius: 4px; padding: 2px 6px; background: rgb(249, 250, 250); word-break: break-all; white-space: pre; line-height: 1.3; margin: 0px 5px; border: 1px solid rgb(222, 217, 217);\">IN/NOT IN</code>和<code style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; display: inline-block; border-radius: 4px; padding: 2px 6px; background: rgb(249, 250, 250); word-break: break-all; white-space: pre; line-height: 1.3; margin: 0px 5px; border: 1px solid rgb(222, 217, 217);\">EXISTS/NOT EXISTS</code>之类的查询可以直接使用闭包作为子查询，例如：</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">Db::table(&#39;think_user&#39;)-&gt;where(&#39;id&#39;,&#39;IN&#39;,function($query){\r\n&nbsp;&nbsp;&nbsp;&nbsp;$query-&gt;table(&#39;think_profile&#39;)-&gt;where(&#39;status&#39;,1)-&gt;field(&#39;id&#39;);})-&gt;select();</pre><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">生成的SQL语句是</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">SELECT&nbsp;*&nbsp;FROM&nbsp;`think_user`&nbsp;WHERE&nbsp;`id`&nbsp;IN&nbsp;(&nbsp;SELECT&nbsp;`id`&nbsp;FROM&nbsp;`think_profile`&nbsp;WHERE&nbsp;`status`&nbsp;=&nbsp;1&nbsp;)</pre><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">Db::table(&#39;think_user&#39;)-&gt;where(function($query){\r\n&nbsp;&nbsp;&nbsp;&nbsp;$query-&gt;table(&#39;think_profile&#39;)-&gt;where(&#39;status&#39;,1);},&#39;exists&#39;)-&gt;find();</pre><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\">生成的SQL语句为</p><pre style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; margin-top: 14px; margin-bottom: 14px; line-height: 1.45; padding: 16px; overflow: auto; background-color: rgb(249, 250, 250); border: 1px solid rgb(222, 217, 217); border-radius: 3px;\">SELECT&nbsp;*&nbsp;FROM&nbsp;`think_user`&nbsp;WHERE&nbsp;EXISTS&nbsp;(&nbsp;SELECT&nbsp;*&nbsp;FROM&nbsp;`think_profile`&nbsp;WHERE&nbsp;`status`&nbsp;=&nbsp;1&nbsp;)</pre><blockquote class=\"default\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin: 8px 0px; line-height: 1.2; padding: 8px 16px; color: rgb(91, 192, 222); border-left: 5px solid rgb(91, 192, 222); background-color: rgb(244, 248, 250);\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\"><code style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; font-size: 1em; display: inline-block; border-radius: 4px; padding: 2px 6px; background: rgb(249, 250, 250); word-break: break-all; white-space: pre; line-height: 1.3; margin: 0px 5px; border: 1px solid rgb(222, 217, 217);\">V5.0.9+</code>版本开始，比较运算也支持使用闭包子查询</p></blockquote><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 2; padding: 0px;\"><a target=\"_blank\" href=\"https://e.topthink.com/api/go/e7f609fecc2788307\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); text-decoration-line: none;\"><img class=\"ui image\" width=\"100%\" src=\"https://e.topthink.com/api/item/462/pic\"/></a></p><p><span class=\"prev\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; float: left; color: rgb(153, 153, 153); padding: 2px 0px;\">上一篇：<a href=\"https://www.kancloud.cn/manual/thinkphp5/156576\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); text-decoration-line: none;\">视图查询</a></span><span class=\"next\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; float: right; color: rgb(153, 153, 153); padding: 2px 0px;\">下一篇：<a href=\"https://www.kancloud.cn/manual/thinkphp5/139061\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); text-decoration-line: none;\">原生查询</a></span></p><h3 class=\"header\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; padding: 0px 0px 10px; line-height: 1.28571em; margin: 10px 0px 16px; font-weight: 400; font-size: 16px; border-bottom: 1px solid rgba(34, 36, 38, 0.15);\">相关评论(32)</h3><p><span class=\"error\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; color: red; line-height: 33px;\">根据国家相关法律的实名制要求，请先<a href=\"https://www.kancloud.cn/setting/mobile\" target=\"_blank\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); text-decoration-line: none;\">绑定手机</a>号码</span>发布 (Ctrl+Enter)</p><p><a class=\"avatar\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); display: block; width: 2.5em; height: auto; float: left; margin: 0.2em 0px 0px;\"><img src=\"https://avatar.kancloud.cn/2a/dba6c157b4c425696665610f31a83d\"/></a></p><p><a class=\"author\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; font-size: 1em; font-weight: 700;\">lindaolan</a></p><p>@lindaolan&nbsp;·<span class=\"date\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased;\">9 天前</span></p><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 1.4285em;\">$query-&gt;table(&#39;table_name_test&#39;)，当表名有两个下划线的时候，报错了！</p><p><a style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgba(0, 0, 0, 0.4); cursor: pointer; display: inline-block; margin: 0px 0.75em 0px 0px;\"><span class=\"icon reply\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; display: inline-block; opacity: 1; margin: 0px 0.25rem 0px 0px; width: 1.18em; height: 1em; font-family: Icons; text-decoration: inherit; text-align: center; speak: none; backface-visibility: hidden; font-size: 1em;\"></span>回复</a></p><p><a class=\"avatar\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; color: rgb(65, 131, 196); display: block; width: 2.5em; height: auto; float: left; margin: 0.2em 0px 0px;\"><img src=\"https://avatar.kancloud.cn/0c/bb4252424724ade919b9ff6e578afb\"/></a></p><p><a class=\"author\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; background-color: transparent; font-size: 1em; font-weight: 700;\">中二病后期</a></p><p>@li_hao&nbsp;·<span class=\"date\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased;\">2 个月前</span></p><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; text-size-adjust: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; line-height: 1.4285em;\">order方法为什么不支持</p><p><br/></p>', '首页', '首页', '首页');

-- ----------------------------
-- Table structure for `tp_link`
-- ----------------------------
DROP TABLE IF EXISTS `tp_link`;
CREATE TABLE `tp_link` (
  `link_id` tinyint(2) NOT NULL AUTO_INCREMENT COMMENT '友情链接主键',
  `link_name` char(50) DEFAULT NULL COMMENT '链接名称',
  `link_url` varchar(100) DEFAULT NULL COMMENT '链接URL',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_link
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
