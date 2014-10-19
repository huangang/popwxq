/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50154
Source Host           : 210.51.23.71:3306
Source Database       : weixinqiang

Target Server Type    : MYSQL
Target Server Version : 50154
File Encoding         : 65001

Date: 2014-10-19 13:52:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `pop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `pop_admin`;
CREATE TABLE `pop_admin` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_admin
-- INSERT INTO `pop_admin` VALUES ('1', 'gang', 'b07f614e71f79d6ffe861ec9f614b432');
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_draw`
-- ----------------------------
DROP TABLE IF EXISTS `pop_draw`;
CREATE TABLE `pop_draw` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `function` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_draw
-- ----------------------------
INSERT INTO `pop_draw` VALUES ('1', '', '2', '1');

-- ----------------------------
-- Table structure for `pop_fans`
-- ----------------------------
DROP TABLE IF EXISTS `pop_fans`;
CREATE TABLE `pop_fans` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fromusername` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fake_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(3) NOT NULL,
  `sex` int(3) NOT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_fans
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_fanvote`
-- ----------------------------
DROP TABLE IF EXISTS `pop_fanvote`;
CREATE TABLE `pop_fanvote` (
  `Id` int(11) NOT NULL,
  `fromusername` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_fanvote
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_list`
-- ----------------------------
DROP TABLE IF EXISTS `pop_list`;
CREATE TABLE `pop_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `examine` int(3) NOT NULL DEFAULT '0',
  `type` int(3) NOT NULL,
  `choose` int(3) NOT NULL DEFAULT '0',
  `fromusername` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fake_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newsid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(3) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_list
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_project`
-- ----------------------------
DROP TABLE IF EXISTS `pop_project`;
CREATE TABLE `pop_project` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_project
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_publicnum`
-- ----------------------------
DROP TABLE IF EXISTS `pop_publicnum`;
CREATE TABLE `pop_publicnum` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `pnum` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `original` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(4) NOT NULL,
  `appid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `appsecret` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `accesstoken` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_publicnum
-- ----------------------------
INSERT INTO `pop_publicnum` VALUES ('1', 'POP', '', '', '1', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `pop_state`
-- ----------------------------
DROP TABLE IF EXISTS `pop_state`;
CREATE TABLE `pop_state` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(255) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_state
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_vote`
-- ----------------------------
DROP TABLE IF EXISTS `pop_vote`;
CREATE TABLE `pop_vote` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `function` int(3) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `pop_wall`
-- ----------------------------
DROP TABLE IF EXISTS `pop_wall`;
CREATE TABLE `pop_wall` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preface` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `examine` int(3) NOT NULL,
  `function` int(3) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pop_wall
-- ----------------------------
-- --------------------------------------------------------

--
-- Table structure for table `popwxq_tulingapi`
--

CREATE TABLE `pop_tulingapi` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `tulingapi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
--
-- Records of pop_tulingapi
--
