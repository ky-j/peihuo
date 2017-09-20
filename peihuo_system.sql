/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : peihuo_system

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-09-20 08:32:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ph_category
-- ----------------------------
DROP TABLE IF EXISTS `ph_category`;
CREATE TABLE `ph_category` (
  `category_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_category
-- ----------------------------
INSERT INTO `ph_category` VALUES ('1', '蔬菜', '1504867970', '1');
INSERT INTO `ph_category` VALUES ('2', '肉类', '1504859099', '1');
INSERT INTO `ph_category` VALUES ('3', '水果', '1504868152', '1');
INSERT INTO `ph_category` VALUES ('4', '水产', '1504859162', '1');
INSERT INTO `ph_category` VALUES ('5', '冻食', '1504868013', '1');
INSERT INTO `ph_category` VALUES ('6', '粮油', '1504868070', '1');
INSERT INTO `ph_category` VALUES ('7', '干货', '1504858256', '1');
INSERT INTO `ph_category` VALUES ('8', '酒水', '1504881396', '1');
INSERT INTO `ph_category` VALUES ('9', '银城酒店', '1504868359', '-1');
INSERT INTO `ph_category` VALUES ('10', '尼罗河酒店', '1504868418', '-1');
INSERT INTO `ph_category` VALUES ('11', '广彩城酒店', '1504868494', '-1');

-- ----------------------------
-- Table structure for ph_count
-- ----------------------------
DROP TABLE IF EXISTS `ph_count`;
CREATE TABLE `ph_count` (
  `count_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` smallint(6) unsigned NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `food_id` smallint(6) unsigned NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` decimal(10,2) unsigned DEFAULT NULL,
  `food_unit` varchar(10) DEFAULT '',
  `depart_number_1` decimal(10,1) unsigned NOT NULL,
  `depart_number_2` decimal(10,1) unsigned NOT NULL,
  `depart_number_3` decimal(10,1) unsigned NOT NULL,
  `depart_number_4` decimal(10,1) unsigned NOT NULL,
  `depart_number_5` decimal(10,1) unsigned NOT NULL,
  `order_number` decimal(10,1) unsigned NOT NULL,
  `delivery_number` decimal(10,1) unsigned NOT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_count
-- ----------------------------
INSERT INTO `ph_count` VALUES ('16', '35', '3', '水果', '1', '香蕉', '6.00', '斤', '0.0', '0.0', '14.0', '0.0', '0.0', '14.0', '0.0');
INSERT INTO `ph_count` VALUES ('15', '35', '1', '蔬菜', '8', '生菜', '2.58', '斤', '0.0', '10.0', '0.0', '0.0', '0.0', '10.0', '0.0');
INSERT INTO `ph_count` VALUES ('14', '35', '2', '肉类', '9', '猪肉', '8.56', '斤', '0.0', '52.0', '0.0', '0.0', '0.0', '52.0', '51.0');
INSERT INTO `ph_count` VALUES ('13', '35', '1', '蔬菜', '10', '油麦菜', '3.56', '斤', '10.0', '0.0', '0.0', '0.0', '0.0', '10.0', '9.0');
INSERT INTO `ph_count` VALUES ('17', '35', '2', '肉类', '9', '猪肉', '8.56', '斤', '0.0', '0.0', '23.0', '0.0', '0.0', '23.0', '0.0');
INSERT INTO `ph_count` VALUES ('18', '35', '1', '蔬菜', '8', '生菜', '2.58', '斤', '0.0', '0.0', '50.0', '0.0', '0.0', '50.0', '0.0');
INSERT INTO `ph_count` VALUES ('32', '36', '2', '肉类', '11', '牛肉', '25.40', '斤', '0.0', '0.0', '0.0', '0.0', '44.0', '44.0', '0.0');
INSERT INTO `ph_count` VALUES ('31', '36', '3', '水果', '1', '香蕉', '6.00', '斤', '0.0', '0.0', '0.0', '0.0', '2.0', '2.0', '0.0');
INSERT INTO `ph_count` VALUES ('30', '36', '2', '肉类', '11', '牛肉', '25.40', '斤', '0.0', '0.0', '0.0', '74.0', '0.0', '74.0', '0.0');
INSERT INTO `ph_count` VALUES ('29', '36', '2', '肉类', '11', '牛肉', '25.40', '斤', '0.0', '0.0', '6.0', '0.0', '0.0', '6.0', '0.0');
INSERT INTO `ph_count` VALUES ('28', '36', '1', '蔬菜', '8', '生菜', '2.58', '斤', '0.0', '0.0', '5.0', '0.0', '0.0', '5.0', '0.0');
INSERT INTO `ph_count` VALUES ('27', '36', '1', '蔬菜', '8', '生菜', '2.58', '斤', '0.0', '4.0', '0.0', '0.0', '0.0', '4.0', '0.0');
INSERT INTO `ph_count` VALUES ('26', '36', '3', '水果', '1', '香蕉', '6.00', '斤', '1.0', '0.0', '0.0', '0.0', '0.0', '1.0', '0.0');
INSERT INTO `ph_count` VALUES ('34', '37', '3', '水果', '1', '香蕉', '6.00', '斤', '15.0', '0.0', '0.0', '0.0', '0.0', '15.0', '0.0');
INSERT INTO `ph_count` VALUES ('35', '37', '1', '蔬菜', '8', '生菜', '2.58', '斤', '0.0', '42.0', '0.0', '0.0', '0.0', '42.0', '0.0');
INSERT INTO `ph_count` VALUES ('36', '38', '1', '蔬菜', '8', '生菜', '2.58', '斤', '10.0', '0.0', '0.0', '0.0', '0.0', '10.0', '0.0');
INSERT INTO `ph_count` VALUES ('37', '38', '3', '水果', '1', '香蕉', '6.00', '斤', '0.0', '9.0', '0.0', '0.0', '0.0', '9.0', '0.0');

-- ----------------------------
-- Table structure for ph_detail
-- ----------------------------
DROP TABLE IF EXISTS `ph_detail`;
CREATE TABLE `ph_detail` (
  `detail_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` smallint(6) unsigned NOT NULL,
  `depart_id` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` smallint(6) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `food_id` smallint(6) unsigned NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` decimal(10,2) unsigned DEFAULT NULL,
  `food_unit` varchar(10) DEFAULT '',
  `order_number` decimal(10,1) unsigned NOT NULL,
  `delivery_number` decimal(10,1) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_detail
-- ----------------------------
INSERT INTO `ph_detail` VALUES ('77', '35', '3', '1', '蔬菜', '8', '生菜', '2.58', '斤', '50.0', '0.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('76', '35', '3', '2', '肉类', '9', '猪肉', '8.56', '斤', '23.0', '0.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('75', '35', '3', '3', '水果', '1', '香蕉', '6.00', '斤', '14.0', '0.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('74', '35', '2', '1', '蔬菜', '8', '生菜', '2.58', '斤', '10.0', '0.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('73', '35', '2', '2', '肉类', '9', '猪肉', '8.56', '斤', '52.0', '51.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('72', '35', '1', '1', '蔬菜', '10', '油麦菜', '3.56', '斤', '10.0', '9.0', '1505401509', '1');
INSERT INTO `ph_detail` VALUES ('91', '36', '5', '2', '肉类', '11', '牛肉', '25.40', '斤', '44.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('90', '36', '5', '3', '水果', '1', '香蕉', '6.00', '斤', '2.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('89', '36', '4', '2', '肉类', '11', '牛肉', '25.40', '斤', '74.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('88', '36', '3', '2', '肉类', '11', '牛肉', '25.40', '斤', '6.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('87', '36', '3', '1', '蔬菜', '8', '生菜', '2.58', '斤', '5.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('86', '36', '2', '1', '蔬菜', '8', '生菜', '2.58', '斤', '4.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('85', '36', '1', '3', '水果', '1', '香蕉', '6.00', '斤', '1.0', '0.0', '1505445763', '1');
INSERT INTO `ph_detail` VALUES ('93', '37', '1', '3', '水果', '1', '香蕉', '6.00', '斤', '15.0', '0.0', '1505724647', '1');
INSERT INTO `ph_detail` VALUES ('94', '37', '2', '1', '蔬菜', '8', '生菜', '2.58', '斤', '42.0', '0.0', '1505724647', '1');
INSERT INTO `ph_detail` VALUES ('95', '38', '1', '1', '蔬菜', '8', '生菜', '2.58', '斤', '10.0', '0.0', '1505787109', '1');
INSERT INTO `ph_detail` VALUES ('96', '38', '2', '3', '水果', '1', '香蕉', '6.00', '斤', '9.0', '0.0', '1505787109', '1');

-- ----------------------------
-- Table structure for ph_food
-- ----------------------------
DROP TABLE IF EXISTS `ph_food`;
CREATE TABLE `ph_food` (
  `food_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `food_name` varchar(255) NOT NULL,
  `category_id` smallint(6) NOT NULL DEFAULT '0',
  `food_price` decimal(10,2) unsigned DEFAULT NULL,
  `food_unit` varchar(10) DEFAULT '',
  `update_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_food
-- ----------------------------
INSERT INTO `ph_food` VALUES ('1', '香蕉', '3', '6.00', '斤', '1504882636', '1');
INSERT INTO `ph_food` VALUES ('2', '黄花鱼', '4', '75.70', '斤', '1504882554', '1');
INSERT INTO `ph_food` VALUES ('3', '苹果', '3', '5.00', '斤', '1504882590', '1');
INSERT INTO `ph_food` VALUES ('4', '维他柠檬茶', '8', '66.00', '箱', '1504882878', '1');
INSERT INTO `ph_food` VALUES ('5', '金龙鱼调和油5L装', '6', '45.00', '桶', '1505293041', '1');
INSERT INTO `ph_food` VALUES ('6', '可口可乐330ml装', '8', '65.00', '箱', '1504883006', '1');
INSERT INTO `ph_food` VALUES ('7', '天地一号', '8', '100.00', '箱', '1504882692', '1');
INSERT INTO `ph_food` VALUES ('8', '生菜', '1', '2.58', '斤', '1504878828', '1');
INSERT INTO `ph_food` VALUES ('9', '猪肉', '2', '8.56', '斤', '1504878978', '1');
INSERT INTO `ph_food` VALUES ('10', '油麦菜', '1', '3.56', '斤', '1504879126', '1');
INSERT INTO `ph_food` VALUES ('11', '牛肉', '2', '25.40', '斤', '1504879326', '1');
INSERT INTO `ph_food` VALUES ('12', '陶华碧老干妈 风味豆豉油制辣椒 280g', '7', '7.80', '瓶', '1504884958', '1');
INSERT INTO `ph_food` VALUES ('13', '西红柿', '1', '6.35', '斤', '1504885088', '1');
INSERT INTO `ph_food` VALUES ('14', '康师傅方便面', '7', '3.50', '桶', '1504885126', '1');
INSERT INTO `ph_food` VALUES ('15', '潮汕牛肉丸 500g', '5', '29.00', '袋', '1505055435', '1');
INSERT INTO `ph_food` VALUES ('16', '大闸蟹', '4', '57.60', '斤', '1505201450', '1');
INSERT INTO `ph_food` VALUES ('17', '黑米', '7', '7.00', '斤', '1505201489', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_hotel
-- ----------------------------
INSERT INTO `ph_hotel` VALUES ('1', '明轩酒店', '1001', '1504867970', '1');
INSERT INTO `ph_hotel` VALUES ('2', '南华酒店', '1008', '1504859099', '1');
INSERT INTO `ph_hotel` VALUES ('3', '万达酒店', '1004', '1504868152', '1');
INSERT INTO `ph_hotel` VALUES ('4', '篁胜酒店', '1007', '1504859162', '1');
INSERT INTO `ph_hotel` VALUES ('5', '皇都酒店', '1002', '1504868013', '1');
INSERT INTO `ph_hotel` VALUES ('6', '凯悦酒店', '1003', '1504868070', '1');
INSERT INTO `ph_hotel` VALUES ('7', '会展酒店', '1009', '1504858256', '1');
INSERT INTO `ph_hotel` VALUES ('8', '宏远酒店', '1005', '1504868193', '1');
INSERT INTO `ph_hotel` VALUES ('9', '银城酒店', '1006', '1504868359', '1');
INSERT INTO `ph_hotel` VALUES ('10', '尼罗河酒店', '1010', '1504868418', '1');
INSERT INTO `ph_hotel` VALUES ('11', '广彩城酒店', '1011', '1504868494', '1');

-- ----------------------------
-- Table structure for ph_order
-- ----------------------------
DROP TABLE IF EXISTS `ph_order`;
CREATE TABLE `ph_order` (
  `order_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` smallint(6) unsigned NOT NULL,
  `hotel_number` int(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `order_sn` varchar(20) NOT NULL,
  `order_date` int(10) unsigned NOT NULL DEFAULT '0',
  `delivery_date` int(10) unsigned NOT NULL DEFAULT '0',
  `order_total` decimal(10,1) NOT NULL DEFAULT '0.0',
  `delivery_total` decimal(10,1) NOT NULL DEFAULT '0.0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_order
-- ----------------------------
INSERT INTO `ph_order` VALUES ('35', '3', '1004', '万达酒店', '2017091301441', '1505315921', '1505404800', '0.0', '0.0', '1505401509', '1');
INSERT INTO `ph_order` VALUES ('36', '1', '1001', '明轩酒店', '2017091504594', '1505406641', '1505404800', '0.0', '0.0', '1505445763', '1');
INSERT INTO `ph_order` VALUES ('37', '3', '1004', '万达酒店', '2017091858700', '1505723175', '1505750400', '0.0', '0.0', '1505724647', '1');
INSERT INTO `ph_order` VALUES ('38', '1', '1001', '明轩酒店', '2017091940360', '1505787109', '1505836800', '0.0', '0.0', '1505787109', '1');
