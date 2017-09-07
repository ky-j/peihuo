/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : peihuo_system

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-09-07 17:24:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ph_hotel
-- ----------------------------
DROP TABLE IF EXISTS `ph_hotel`;
CREATE TABLE `ph_hotel` (
  `hotel_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_number` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_hotel
-- ----------------------------
INSERT INTO `ph_hotel` VALUES ('1', '东莞明轩酒店', '10001', '0', '1');
