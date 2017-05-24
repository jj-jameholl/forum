/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50715
 Source Host           : localhost
 Source Database       : yii2basic

 Target Server Type    : MySQL
 Target Server Version : 50715
 File Encoding         : utf-8

 Date: 10/30/2016 22:45:23 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `User`
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `authKey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `User`
-- ----------------------------
BEGIN;
INSERT INTO `User` VALUES ('1', 'jj-jameholl', '111111', '13067390883', '', 'dasdasdsadas'), ('2', 'yichao', '111111', '13066666666', '12.jpg', 'dasdbgbgfsdfs');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
