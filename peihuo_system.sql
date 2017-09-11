/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : peihuo_system

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-09-12 00:36:25
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
-- Table structure for ph_detail
-- ----------------------------
DROP TABLE IF EXISTS `ph_detail`;
CREATE TABLE `ph_detail` (
  `detail_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` smallint(6) unsigned NOT NULL,
  `hotel_id` smallint(6) unsigned NOT NULL,
  `depart_id` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` smallint(6) NOT NULL,
  `food_id` smallint(6) unsigned NOT NULL,
  `food_price` decimal(10,2) unsigned DEFAULT NULL,
  `food_unit` varchar(10) DEFAULT '',
  `order_number` decimal(10,1) unsigned NOT NULL,
  `delivery_number` decimal(10,1) unsigned NOT NULL,
  `order_date` int(10) unsigned NOT NULL DEFAULT '0',
  `delivery_date` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_detail
-- ----------------------------
INSERT INTO `ph_detail` VALUES ('1', '1', '11', '1', '0', '1', '17.50', '斤', '11.0', '0.0', '0', '0', '0', '1');
INSERT INTO `ph_detail` VALUES ('2', '1', '11', '1', '0', '1', '18.00', '斤', '15.0', '25.0', '1505020805', '1505059200', '1505020805', '1');
INSERT INTO `ph_detail` VALUES ('3', '1', '11', '1', '0', '1', '18.00', '斤', '15.0', '25.0', '1505021237', '1505059200', '1505021237', '1');
INSERT INTO `ph_detail` VALUES ('4', '1', '11', '1', '0', '2', '0.00', '', '17.0', '0.0', '1505021238', '1505059200', '1505021238', '1');
INSERT INTO `ph_detail` VALUES ('5', '1', '10', '1', '3', '1', '89.00', '箱', '77.0', '0.0', '1505022249', '1505059200', '1505022249', '1');
INSERT INTO `ph_detail` VALUES ('6', '1', '10', '2', '10', '2', '69.00', '斤', '88.0', '0.0', '1505022250', '1505059200', '1505022250', '1');
INSERT INTO `ph_detail` VALUES ('7', '5', '11', '1', '1', '1', '65.22', '斤', '14.0', '0.0', '1505023442', '1505059200', '1505023442', '1');
INSERT INTO `ph_detail` VALUES ('8', '6', '11', '1', '1', '1', '65.22', '斤', '14.0', '0.0', '1505023512', '1505059200', '1505023512', '1');
INSERT INTO `ph_detail` VALUES ('9', '6', '11', '2', '10', '2', '25.65', '瓶', '99.0', '0.0', '1505023512', '1505059200', '1505023512', '1');
INSERT INTO `ph_detail` VALUES ('10', '7', '10', '1', '6', '5', '45.00', '瓶', '45.0', '0.0', '1505056675', '1505059200', '1505056675', '1');
INSERT INTO `ph_detail` VALUES ('11', '9', '7', '1', '3', '1', '6.00', '斤', '15.0', '0.0', '1505061343', '1505145600', '1505061343', '1');
INSERT INTO `ph_detail` VALUES ('12', '9', '7', '2', '2', '9', '8.56', '斤', '7.0', '0.0', '1505061343', '1505145600', '1505061343', '1');
INSERT INTO `ph_detail` VALUES ('13', '10', '10', '1', '1', '8', '2.58', '斤', '13.0', '0.0', '1505094895', '1505145600', '1505094895', '1');
INSERT INTO `ph_detail` VALUES ('14', '10', '10', '2', '4', '2', '75.70', '斤', '14.0', '0.0', '1505094895', '1505145600', '1505094895', '1');
INSERT INTO `ph_detail` VALUES ('15', '11', '5', '1', '2', '11', '25.40', '斤', '1.5', '0.0', '1505094926', '1505145600', '1505094926', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_food
-- ----------------------------
INSERT INTO `ph_food` VALUES ('1', '香蕉', '3', '6.00', '斤', '1504882636', '1');
INSERT INTO `ph_food` VALUES ('2', '黄花鱼', '4', '75.70', '斤', '1504882554', '1');
INSERT INTO `ph_food` VALUES ('3', '苹果', '3', '5.00', '斤', '1504882590', '1');
INSERT INTO `ph_food` VALUES ('4', '维他柠檬茶', '8', '66.00', '箱', '1504882878', '1');
INSERT INTO `ph_food` VALUES ('5', '金龙鱼调和油5L装', '6', '45.00', '瓶', '1504882968', '1');
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
  `order_sn` varchar(20) NOT NULL,
  `order_date` int(10) unsigned NOT NULL DEFAULT '0',
  `delivery_date` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_order
-- ----------------------------
INSERT INTO `ph_order` VALUES ('1', '1', '2017090987516', '1504968180', '1504972800', '1504968180', '1');
INSERT INTO `ph_order` VALUES ('2', '4', '2017090949007', '1504969258', '1504972800', '1504969258', '1');
INSERT INTO `ph_order` VALUES ('3', '6', '2017090967507', '1504969774', '1504972800', '1504969774', '1');
INSERT INTO `ph_order` VALUES ('4', '10', '2017090905597', '1504969866', '1504972800', '1504969866', '1');
INSERT INTO `ph_order` VALUES ('5', '11', '2017091099540', '1505023441', '1505059200', '1505023441', '1');
INSERT INTO `ph_order` VALUES ('6', '11', '2017091075983', '1505023511', '1505059200', '1505023511', '1');
INSERT INTO `ph_order` VALUES ('7', '10', '2017091015122', '1505056674', '1505059200', '1505056674', '1');
INSERT INTO `ph_order` VALUES ('8', '5', '2017091163577', '1505061224', '1505145600', '1505061224', '1');
INSERT INTO `ph_order` VALUES ('9', '7', '2017091167278', '1505061342', '1505145600', '1505061342', '1');
INSERT INTO `ph_order` VALUES ('10', '10', '2017091189512', '1505094894', '1505145600', '1505094894', '1');
INSERT INTO `ph_order` VALUES ('11', '5', '2017091171486', '1505094925', '1505145600', '1505094925', '1');
