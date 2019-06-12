/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kaoqin

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-12 20:07:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dep_info`
-- ----------------------------
DROP TABLE IF EXISTS `dep_info`;
CREATE TABLE `dep_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(50) NOT NULL,
  `dep_tel` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dep_info
-- ----------------------------
INSERT INTO `dep_info` VALUES ('1', '产品部', '0411-11111111');
INSERT INTO `dep_info` VALUES ('2', '运营部', '0411-22222222');
INSERT INTO `dep_info` VALUES ('3', '技术部', '0411-33333333');

-- ----------------------------
-- Table structure for `job_info`
-- ----------------------------
DROP TABLE IF EXISTS `job_info`;
CREATE TABLE `job_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_info
-- ----------------------------
INSERT INTO `job_info` VALUES ('1', '后台开发工程师');
INSERT INTO `job_info` VALUES ('2', '产品运维师');
INSERT INTO `job_info` VALUES ('3', '前端开发工程师');

-- ----------------------------
-- Table structure for `kaoqin`
-- ----------------------------
DROP TABLE IF EXISTS `kaoqin`;
CREATE TABLE `kaoqin` (
  `work_id` int(18) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `day` int(10) NOT NULL,
  KEY `key2` (`work_id`),
  CONSTRAINT `key2` FOREIGN KEY (`work_id`) REFERENCES `user` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kaoqin
-- ----------------------------
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-29 17:47:48', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-29 17:52:01', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-29 17:52:09', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-29 17:52:30', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-29 17:56:29', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-30 10:23:10', '2019-05-30 10:56:04', '1');
INSERT INTO `kaoqin` VALUES ('2016210686', '2019-05-30 10:24:28', '2019-05-30 10:56:04', '1');

-- ----------------------------
-- Table structure for `status`
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `work_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_work` tinyint(1) NOT NULL COMMENT '0正常；1迟到；2早退'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('2015214177', '2017-12-28 06:59:19', '0');
INSERT INTO `status` VALUES ('2015214123', '2018-01-08 09:59:45', '1');
INSERT INTO `status` VALUES ('2015214145', '2018-01-08 16:00:07', '2');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `work_id` int(18) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(4) NOT NULL COMMENT '性别',
  `dep_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `telphone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`work_id`),
  KEY `kw` (`dep_id`),
  KEY `kj` (`job_id`),
  CONSTRAINT `kj` FOREIGN KEY (`job_id`) REFERENCES `job_info` (`id`),
  CONSTRAINT `kw` FOREIGN KEY (`dep_id`) REFERENCES `dep_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2016210686', '韩伟华', '', '3', '1', '18800462819', '321606825@qq.com', '6347ad83f34870933209015b133cc4a1', '0');
INSERT INTO `user` VALUES ('2016214234', '陈鑫', '', '3', '1', '18846134759', '1293872055@qq.com', 'd9dd1174d1ba1512aeda5dd2982925ce', '0');
INSERT INTO `user` VALUES ('2016214235', '陈智宇', '', '3', '3', '15546609382', '742062262@qq.com', 'c27ca2cacb121489a5d2031b5cc8d1d5', '0');
INSERT INTO `user` VALUES ('2016214238', '董晶雄', '', '3', '1', '15663592980', '1530916212@qq.com', 'dcbdd19ec64d3c7a6d9bd4e5e6ad6396', '0');
INSERT INTO `user` VALUES ('2016214356', '杜雨霖', '', '3', '1', '15663771301', '787999749@qq.com', 'e73e28d98c6bf62cf8a121e0ca350ad1', '0');
INSERT INTO `user` VALUES ('2016214420', '马金良', '', '3', '1', '15546220339', '2528604998@qq.com', '1bcdb9854605554bd8d42c004eb16ff5', '0');
INSERT INTO `user` VALUES ('2016224230', '闻雅', '', '3', '3', '18846447303', '1759768433@qq.com', 'ecff6491806f21b6ed18d8b41a8e6cd1', '0');
INSERT INTO `user` VALUES ('2016224263', '周百舸', '', '1', '2', '18800462837', '512955156@qq.com', '9208d98a6f20257fb55b88c67b8d2cbc', '0');
INSERT INTO `user` VALUES ('2016224414', '赵桐', '', '3', '1', '15663601130', '531784003@qq.com', '67885f51e3f936ab3b66169056ddd56f', '0');
INSERT INTO `user` VALUES ('2016224510', '李小雪', '', '3', '3', '15663612208', '523786175@qq.com', '101123062f84fc189740f128ca0820c9', '0');
INSERT INTO `user` VALUES ('2016224512', '刘珊珊', '', '3', '3', '17382867603', '1274923710@qq.com', '827d6a788a977cdde9775c4865874c9e', '0');
INSERT INTO `user` VALUES ('2017214385', '侯卓良', '', '3', '1', '18504344409', '1340425646@qq.com', 'f1cc2170fcd8373ac17eb0ed47c275a7', '0');
