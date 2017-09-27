/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : peihuo_system

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-09-27 14:35:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ph_admin
-- ----------------------------
DROP TABLE IF EXISTS `ph_admin`;
CREATE TABLE `ph_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) unsigned DEFAULT '0',
  `mobile` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `update_time` int(10) DEFAULT '0',
  PRIMARY KEY (`admin_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ph_admin
-- ----------------------------
INSERT INTO `ph_admin` VALUES ('1', 'admin', '02ad1169f0d85fe6983d38d3a5c2e42d', '0', '1506414128', '10086', 'admin', '1', '1506328466');
INSERT INTO `ph_admin` VALUES ('2', 'jwd', '6e07051b24aedfe4a66b1e918f54a735', '0', '1506328603', '13480060425', '阿得', '1', '1506322815');
INSERT INTO `ph_admin` VALUES ('3', 'ky-j', '6e07051b24aedfe4a66b1e918f54a735', '0', '0', '10010', '得哥', '-1', '1506321537');
INSERT INTO `ph_admin` VALUES ('4', 'ky-j', '6e07051b24aedfe4a66b1e918f54a735', '0', '0', '10010', '得哥', '-1', '1506322838');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_category
-- ----------------------------
INSERT INTO `ph_category` VALUES ('1', '蔬菜', '1504867970', '1');
INSERT INTO `ph_category` VALUES ('2', '肉类', '1504859099', '1');
INSERT INTO `ph_category` VALUES ('3', '水果', '1504868152', '1');
INSERT INTO `ph_category` VALUES ('4', '水产', '1504859162', '1');
INSERT INTO `ph_category` VALUES ('5', '冻食', '1504868013', '1');
INSERT INTO `ph_category` VALUES ('6', '粮油', '1504868070', '1');
INSERT INTO `ph_category` VALUES ('7', '干货', '1506237879', '1');
INSERT INTO `ph_category` VALUES ('8', '酒水', '1506240009', '1');
INSERT INTO `ph_category` VALUES ('12', '其他2', '1506326158', '-1');

-- ----------------------------
-- Table structure for ph_count
-- ----------------------------
DROP TABLE IF EXISTS `ph_count`;
CREATE TABLE `ph_count` (
  `count_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` smallint(6) unsigned NOT NULL,
  `hotel_id` smallint(6) unsigned NOT NULL,
  `category_id` smallint(6) unsigned NOT NULL,
  `food_id` smallint(6) unsigned NOT NULL,
  `food_price` varchar(10) NOT NULL DEFAULT '',
  `depart_number_1` decimal(10,1) unsigned NOT NULL,
  `depart_number_2` decimal(10,1) unsigned NOT NULL,
  `depart_number_3` decimal(10,1) unsigned NOT NULL,
  `depart_number_4` decimal(10,1) unsigned NOT NULL,
  `depart_number_5` decimal(10,1) unsigned NOT NULL,
  `order_number` varchar(10) NOT NULL DEFAULT '',
  `delivery_number` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`count_id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_count
-- ----------------------------
INSERT INTO `ph_count` VALUES ('61', '35', '3', '1', '8', '2.58', '0.0', '0.0', '50.0', '0.0', '0.0', '50.0', '0');
INSERT INTO `ph_count` VALUES ('60', '35', '3', '2', '9', '8.56', '0.0', '0.0', '23.0', '0.0', '0.0', '23.0', '0');
INSERT INTO `ph_count` VALUES ('59', '35', '3', '3', '1', '6.00', '0.0', '0.0', '14.0', '0.0', '0.0', '14.0', '0');
INSERT INTO `ph_count` VALUES ('58', '35', '3', '1', '8', '2.58', '0.0', '10.0', '0.0', '0.0', '0.0', '10.0', '0');
INSERT INTO `ph_count` VALUES ('57', '35', '3', '2', '9', '8.56', '0.0', '52.0', '0.0', '0.0', '0.0', '52.0', '51');
INSERT INTO `ph_count` VALUES ('87', '36', '1', '2', '11', '25.40', '0.0', '0.0', '0.0', '74.0', '0.0', '74', '');
INSERT INTO `ph_count` VALUES ('86', '36', '1', '2', '11', '25.40', '0.0', '0.0', '6.0', '0.0', '0.0', '6', '');
INSERT INTO `ph_count` VALUES ('85', '36', '1', '1', '8', '2.58', '0.0', '0.0', '5.0', '0.0', '0.0', '5', '');
INSERT INTO `ph_count` VALUES ('84', '36', '1', '1', '8', '2.58', '0.0', '4.0', '0.0', '0.0', '0.0', '4', '');
INSERT INTO `ph_count` VALUES ('83', '36', '1', '3', '1', '6.00', '1.0', '0.0', '0.0', '0.0', '0.0', '1', '');
INSERT INTO `ph_count` VALUES ('81', '37', '3', '3', '1', '6.00', '15.0', '0.0', '0.0', '0.0', '0.0', '15', '');
INSERT INTO `ph_count` VALUES ('56', '35', '3', '1', '10', '3.56', '10.0', '0.0', '0.0', '0.0', '0.0', '10.0', '14');
INSERT INTO `ph_count` VALUES ('79', '38', '1', '1', '8', '2.58', '10.5', '0.0', '0.0', '0.0', '0.0', '10.5', '10');
INSERT INTO `ph_count` VALUES ('111', '39', '2', '1', '8', '2.58', '10.0', '0.0', '0.0', '0.0', '0.0', '10', '9');
INSERT INTO `ph_count` VALUES ('80', '38', '1', '3', '1', '6.00', '0.0', '9.0', '0.0', '0.0', '0.0', '9', '2');
INSERT INTO `ph_count` VALUES ('82', '37', '3', '1', '8', '2.58', '0.0', '42.0', '0.0', '0.0', '0.0', '42', '');
INSERT INTO `ph_count` VALUES ('88', '36', '1', '3', '1', '6.00', '0.0', '0.0', '0.0', '0.0', '2.0', '2', '');
INSERT INTO `ph_count` VALUES ('89', '36', '1', '2', '11', '25.40', '0.0', '0.0', '0.0', '0.0', '44.0', '44', '');
INSERT INTO `ph_count` VALUES ('95', '40', '12', '3', '1', '6', '3.5', '0.0', '0.0', '0.0', '0.0', '3.5', '4');
INSERT INTO `ph_count` VALUES ('94', '40', '12', '2', '11', '25.4', '15.0', '0.0', '0.0', '0.0', '0.0', '15', '15');
INSERT INTO `ph_count` VALUES ('108', '41', '2', '1', '8', '2.58', '100.0', '0.0', '0.0', '0.0', '0.0', '100', '99');
INSERT INTO `ph_count` VALUES ('126', '42', '1', '1', '8', '2.58', '50.0', '0.0', '0.0', '0.0', '0.0', '50', '51');
INSERT INTO `ph_count` VALUES ('127', '42', '1', '1', '8', '2.58', '0.0', '0.0', '14.5', '0.0', '0.0', '14.5', '14');
INSERT INTO `ph_count` VALUES ('134', '45', '5', '2', '9', '8.56', '0.0', '15.0', '0.0', '0.0', '0.0', '15', '15');
INSERT INTO `ph_count` VALUES ('133', '45', '5', '1', '8', '2.58', '14.0', '0.0', '0.0', '0.0', '0.0', '14', '14');
INSERT INTO `ph_count` VALUES ('135', '45', '5', '6', '5', '45', '0.0', '0.0', '0.0', '14.0', '0.0', '14', '14');

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
  `food_price` varchar(10) NOT NULL DEFAULT '',
  `order_number` varchar(10) NOT NULL DEFAULT '',
  `delivery_number` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_detail
-- ----------------------------
INSERT INTO `ph_detail` VALUES ('120', '35', '3', '3', '1', '8', '2.58', '50.0', '0');
INSERT INTO `ph_detail` VALUES ('119', '35', '3', '3', '2', '9', '8.56', '23.0', '0');
INSERT INTO `ph_detail` VALUES ('118', '35', '3', '3', '3', '1', '6.00', '14.0', '0');
INSERT INTO `ph_detail` VALUES ('117', '35', '3', '2', '1', '8', '2.58', '10.0', '0');
INSERT INTO `ph_detail` VALUES ('116', '35', '3', '2', '2', '9', '8.56', '52.0', '51');
INSERT INTO `ph_detail` VALUES ('115', '35', '3', '1', '1', '10', '3.56', '10.0', '14');
INSERT INTO `ph_detail` VALUES ('147', '36', '1', '5', '3', '1', '6.00', '2', '');
INSERT INTO `ph_detail` VALUES ('146', '36', '1', '4', '2', '11', '25.40', '74', '');
INSERT INTO `ph_detail` VALUES ('145', '36', '1', '3', '2', '11', '25.40', '6', '');
INSERT INTO `ph_detail` VALUES ('144', '36', '1', '3', '1', '8', '2.58', '5', '');
INSERT INTO `ph_detail` VALUES ('143', '36', '1', '2', '1', '8', '2.58', '4', '');
INSERT INTO `ph_detail` VALUES ('142', '36', '1', '1', '3', '1', '6.00', '1', '');
INSERT INTO `ph_detail` VALUES ('141', '37', '3', '2', '1', '8', '2.58', '42', '');
INSERT INTO `ph_detail` VALUES ('140', '37', '3', '1', '3', '1', '6.00', '15', '');
INSERT INTO `ph_detail` VALUES ('139', '38', '1', '2', '3', '1', '6.00', '9', '2');
INSERT INTO `ph_detail` VALUES ('138', '38', '1', '1', '1', '8', '2.58', '10.5', '10');
INSERT INTO `ph_detail` VALUES ('170', '39', '2', '1', '1', '8', '2.58', '10', '9');
INSERT INTO `ph_detail` VALUES ('148', '36', '1', '5', '2', '11', '25.40', '44', '');
INSERT INTO `ph_detail` VALUES ('153', '40', '12', '1', '2', '11', '25.4', '15', '15');
INSERT INTO `ph_detail` VALUES ('154', '40', '12', '1', '3', '1', '6', '3.5', '4');
INSERT INTO `ph_detail` VALUES ('167', '41', '2', '1', '1', '8', '2.58', '100', '99');
INSERT INTO `ph_detail` VALUES ('186', '42', '1', '3', '1', '8', '2.58', '14.5', '14');
INSERT INTO `ph_detail` VALUES ('185', '42', '1', '1', '1', '8', '2.58', '50', '51');
INSERT INTO `ph_detail` VALUES ('193', '45', '5', '2', '2', '9', '8.56', '15', '15');
INSERT INTO `ph_detail` VALUES ('192', '45', '5', '1', '1', '8', '2.58', '14', '14');
INSERT INTO `ph_detail` VALUES ('194', '45', '5', '4', '6', '5', '45', '14', '14');

-- ----------------------------
-- Table structure for ph_food
-- ----------------------------
DROP TABLE IF EXISTS `ph_food`;
CREATE TABLE `ph_food` (
  `food_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `food_name` varchar(255) NOT NULL,
  `category_id` smallint(6) NOT NULL DEFAULT '0',
  `food_price` varchar(10) DEFAULT '',
  `food_unit` varchar(10) DEFAULT '',
  `update_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_food
-- ----------------------------
INSERT INTO `ph_food` VALUES ('1', '香蕉', '3', '6', '斤', '1504882636', '1');
INSERT INTO `ph_food` VALUES ('2', '黄花鱼', '4', '75.7', '斤', '1504882554', '1');
INSERT INTO `ph_food` VALUES ('3', '苹果', '3', '5', '斤', '1504882590', '1');
INSERT INTO `ph_food` VALUES ('4', '维他柠檬茶', '8', '66', '箱', '1504882878', '1');
INSERT INTO `ph_food` VALUES ('5', '金龙鱼调和油5L装', '6', '45', '桶', '1505293041', '1');
INSERT INTO `ph_food` VALUES ('6', '可口可乐330ml装', '8', '65', '箱', '1504883006', '1');
INSERT INTO `ph_food` VALUES ('7', '天地一号', '8', '100', '箱', '1504882692', '1');
INSERT INTO `ph_food` VALUES ('8', '生菜', '1', '2.58', '斤', '1504878828', '1');
INSERT INTO `ph_food` VALUES ('9', '猪肉', '2', '8.56', '斤', '1504878978', '1');
INSERT INTO `ph_food` VALUES ('10', '油麦菜', '1', '3.56', '斤', '1504879126', '1');
INSERT INTO `ph_food` VALUES ('11', '牛肉', '2', '25.4', '斤', '1504879326', '1');
INSERT INTO `ph_food` VALUES ('12', '陶华碧老干妈 风味豆豉油制辣椒 280g', '7', '7.8', '瓶', '1504884958', '1');
INSERT INTO `ph_food` VALUES ('13', '西红柿', '1', '6.35', '斤', '1504885088', '1');
INSERT INTO `ph_food` VALUES ('14', '康师傅方便面', '7', '3.5', '桶', '1504885126', '1');
INSERT INTO `ph_food` VALUES ('15', '潮汕牛肉丸 500g', '5', '29', '袋', '1505055435', '1');
INSERT INTO `ph_food` VALUES ('16', '大闸蟹', '4', '57.6', '斤', '1505201450', '1');
INSERT INTO `ph_food` VALUES ('17', '黑米', '7', '7', '斤', '1506237711', '1');
INSERT INTO `ph_food` VALUES ('18', '黄豆', '7', '', '', '1506237703', '1');
INSERT INTO `ph_food` VALUES ('19', '红豆', '7', '4.5', '袋', '1506327736', '-1');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_hotel
-- ----------------------------
INSERT INTO `ph_hotel` VALUES ('1', '明轩酒店', '10011', '1506242442', '1');
INSERT INTO `ph_hotel` VALUES ('2', '南华酒店', '8', '1506328744', '1');
INSERT INTO `ph_hotel` VALUES ('3', '万达酒店', '1004', '1504868152', '1');
INSERT INTO `ph_hotel` VALUES ('4', '篁胜酒店', '1007', '1504859162', '1');
INSERT INTO `ph_hotel` VALUES ('5', '皇都酒店', '1002', '1504868013', '1');
INSERT INTO `ph_hotel` VALUES ('6', '凯悦酒店', '1003', '1504868070', '1');
INSERT INTO `ph_hotel` VALUES ('7', '会展酒店', '1009', '1504858256', '1');
INSERT INTO `ph_hotel` VALUES ('8', '宏远酒店', '1005', '1504868193', '1');
INSERT INTO `ph_hotel` VALUES ('9', '银城酒店', '6', '1506328634', '1');
INSERT INTO `ph_hotel` VALUES ('10', '尼罗河酒店', '1010', '1504868418', '1');
INSERT INTO `ph_hotel` VALUES ('11', '广彩城酒店', '1011', '1504868494', '1');
INSERT INTO `ph_hotel` VALUES ('12', '铂尔曼酒店', '2001', '1506325590', '1');

-- ----------------------------
-- Table structure for ph_log
-- ----------------------------
DROP TABLE IF EXISTS `ph_log`;
CREATE TABLE `ph_log` (
  `log_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` smallint(6) unsigned NOT NULL,
  `admin_user` varchar(20) NOT NULL,
  `log_time` int(10) NOT NULL,
  `log_info` varchar(255) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_log
-- ----------------------------
INSERT INTO `ph_log` VALUES ('5', '1', 'admin', '1506322815', '修改用户信息：用户ID为2');
INSERT INTO `ph_log` VALUES ('6', '1', 'admin', '1506322838', '新增用户：用户ID为4');
INSERT INTO `ph_log` VALUES ('7', '1', 'admin', '1506322889', '删除用户：用户ID为4');
INSERT INTO `ph_log` VALUES ('8', '1', 'admin', '1506323092', '修改酒店信息：酒店ID为9');
INSERT INTO `ph_log` VALUES ('9', '1', 'admin', '1506325393', '删除酒店：酒店ID为9');
INSERT INTO `ph_log` VALUES ('10', '1', 'admin', '1506325591', '新增酒店：酒店ID为12');
INSERT INTO `ph_log` VALUES ('11', '1', 'admin', '1506326147', '新增菜品分类：菜品分类ID为12');
INSERT INTO `ph_log` VALUES ('12', '1', 'admin', '1506326159', '修改菜品分类信息：菜品分类ID为12');
INSERT INTO `ph_log` VALUES ('13', '1', 'admin', '1506326192', '删除菜品：菜品ID为12');
INSERT INTO `ph_log` VALUES ('14', '1', 'admin', '1506326444', '删除菜品分类：菜品分类ID为12');
INSERT INTO `ph_log` VALUES ('15', '1', 'admin', '1506327727', '新增菜品：菜品ID为19');
INSERT INTO `ph_log` VALUES ('16', '1', 'admin', '1506327737', '修改菜品信息：菜品ID为19');
INSERT INTO `ph_log` VALUES ('17', '1', 'admin', '1506327750', '删除菜品：菜品ID为19');
INSERT INTO `ph_log` VALUES ('18', '1', 'admin', '1506328243', '新增订单：订单ID为40');
INSERT INTO `ph_log` VALUES ('19', '1', 'admin', '1506328255', '修改订单信息：订单ID为40');
INSERT INTO `ph_log` VALUES ('20', '1', 'admin', '1506328278', '修改订单信息：订单ID为40');
INSERT INTO `ph_log` VALUES ('21', '1', 'admin', '1506328286', '标记订单为“已配送”状态：订单ID为40');
INSERT INTO `ph_log` VALUES ('22', '1', 'admin', '1506328308', '标记订单为“已终结”状态：订单ID为40');
INSERT INTO `ph_log` VALUES ('23', '1', 'admin', '1506328319', '删除订单：订单ID为40');
INSERT INTO `ph_log` VALUES ('24', '2', 'jwd', '1506328466', '修改用户信息：用户ID为1');
INSERT INTO `ph_log` VALUES ('25', '1', 'admin', '1506328635', '修改酒店信息：酒店ID为9');
INSERT INTO `ph_log` VALUES ('26', '1', 'admin', '1506328745', '修改酒店信息：酒店ID为2');
INSERT INTO `ph_log` VALUES ('27', '2', 'jwd', '1506331653', '标记订单为“已终结”状态：订单ID为38');
INSERT INTO `ph_log` VALUES ('28', '1', 'admin', '1506414253', '新增订单：订单ID为41');
INSERT INTO `ph_log` VALUES ('29', '1', 'admin', '1506414549', '新增订单：订单ID为42');
INSERT INTO `ph_log` VALUES ('30', '2', 'jwd', '1506475230', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('31', '2', 'jwd', '1506477081', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('32', '2', 'jwd', '1506477085', '标记订单为“已配送”状态：订单ID为42');
INSERT INTO `ph_log` VALUES ('33', '2', 'jwd', '1506477097', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('34', '2', 'jwd', '1506477277', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('35', '2', 'jwd', '1506477284', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('36', '2', 'jwd', '1506482429', '添加配送情况：订单ID为41');
INSERT INTO `ph_log` VALUES ('37', '2', 'jwd', '1506482710', '修改订单信息：订单ID为39');
INSERT INTO `ph_log` VALUES ('38', '2', 'jwd', '1506482779', '修改订单信息：订单ID为39');
INSERT INTO `ph_log` VALUES ('39', '2', 'jwd', '1506482822', '修改订单信息：订单ID为39');
INSERT INTO `ph_log` VALUES ('40', '2', 'jwd', '1506482838', '修改订单信息：订单ID为39');
INSERT INTO `ph_log` VALUES ('41', '2', 'jwd', '1506483250', '新增订单：订单ID为45');
INSERT INTO `ph_log` VALUES ('42', '2', 'jwd', '1506483260', '删除订单：订单ID为43');
INSERT INTO `ph_log` VALUES ('43', '2', 'jwd', '1506483264', '删除订单：订单ID为44');
INSERT INTO `ph_log` VALUES ('44', '2', 'jwd', '1506483329', '添加配送情况：订单ID为45');
INSERT INTO `ph_log` VALUES ('45', '2', 'jwd', '1506483348', '修改订单信息：订单ID为45');
INSERT INTO `ph_log` VALUES ('46', '2', 'jwd', '1506483358', '添加配送情况：订单ID为45');
INSERT INTO `ph_log` VALUES ('47', '2', 'jwd', '1506483366', '修改订单信息：订单ID为45');
INSERT INTO `ph_log` VALUES ('48', '2', 'jwd', '1506483497', '修改订单信息：订单ID为45');
INSERT INTO `ph_log` VALUES ('49', '2', 'jwd', '1506483502', '添加配送情况：订单ID为45');
INSERT INTO `ph_log` VALUES ('50', '2', 'jwd', '1506483747', '修改订单信息：订单ID为42');
INSERT INTO `ph_log` VALUES ('51', '2', 'jwd', '1506483758', '修改订单信息：订单ID为45');
INSERT INTO `ph_log` VALUES ('52', '2', 'jwd', '1506483781', '修改订单信息：订单ID为45');
INSERT INTO `ph_log` VALUES ('53', '2', 'jwd', '1506483796', '修改订单信息：订单ID为45');

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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ph_order
-- ----------------------------
INSERT INTO `ph_order` VALUES ('35', '3', '2017091301441', '1505315921', '1505404800', '1506214039', '3');
INSERT INTO `ph_order` VALUES ('36', '1', '2017091504594', '1505406641', '1505404800', '1506269145', '1');
INSERT INTO `ph_order` VALUES ('37', '3', '2017091858700', '1505723175', '1505750400', '1506269139', '1');
INSERT INTO `ph_order` VALUES ('38', '1', '2017091940360', '1505787109', '1505836800', '1506269134', '3');
INSERT INTO `ph_order` VALUES ('39', '2', '2017092469800', '1506245634', '1506268800', '1506482836', '1');
INSERT INTO `ph_order` VALUES ('40', '12', '2017092534304', '1506328242', '1506355200', '1506328277', '-1');
INSERT INTO `ph_order` VALUES ('41', '2', '2017092691047', '1506414251', '1506441600', '1506482428', '2');
INSERT INTO `ph_order` VALUES ('42', '1', '2017092616517', '1506414548', '1506441600', '1506483746', '2');
INSERT INTO `ph_order` VALUES ('43', '5', '2017092787187', '1506483116', '1506528000', '1506483116', '-1');
INSERT INTO `ph_order` VALUES ('44', '5', '2017092766697', '1506483130', '1506528000', '1506483130', '-1');
INSERT INTO `ph_order` VALUES ('45', '5', '2017092714205', '1506483249', '1506528000', '1506483794', '2');
