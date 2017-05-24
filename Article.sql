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

 Date: 11/05/2016 22:27:22 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `Article`
-- ----------------------------
DROP TABLE IF EXISTS `Article`;
CREATE TABLE `Article` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `article` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `created` int(255) NOT NULL,
  `last_edit` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `loves` int(255) DEFAULT '0',
  `word-num` int(255) DEFAULT NULL,
  `click` int(255) DEFAULT '0',
  `up` int(255) DEFAULT '0',
  `down` int(255) DEFAULT '0',
  `comments` int(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `Article`
-- ----------------------------
BEGIN;
INSERT INTO `Article` VALUES ('1', '写给我的小超仔', '<p>爱你么么哒！！！</p>', 'jj-jameholl', '1', '爱情  真心话', '1478326597', '1478326597', '1', '888', null, null, null, null, '20'), ('2', '写给我的小超仔', '<p>爱你么么哒！！！</p>', 'jj-jameholl', '1', '爱情  真心话', '1478326861', '1478326861', '1', '345', null, null, null, null, '16'), ('3', '试一下', '<p>     《菜根谭》是明代还初道人洪应明收集编著的一部论述修养、人生、处世、出世的语录世集。具有三教真理的结晶，和万古不易的教人传世之道，为旷古稀世的奇珍宝训。对于人的正心修身，养性育德，有不可思议的潜移默化的力量。其文字简炼明隽，兼采雅俗。似语录，而有语录所没有的趣味；似随笔，而有随笔所不易及的整饬；似训诫，而有训诫所缺乏的亲切醒豁；且有雨余山色，夜静钟声，点染其间，其所言清霏有味，风月无边。</p><p>       青年是人一生中最宝贵的时光，人在年轻时精力充沛，思维活跃，更具有冒险和探险精神。应该好好珍惜和利用年轻时的大好年华，努力学习和工作，不要留有遗憾。“少壮不努力，老大徒伤悲”，多少人垂暮之年回首往昔，都会感到悔恨遗憾。如果你在年轻的时候游手好闲，无所事事，当你老的时候，你也许会一无所有。没奋斗过，没努力过，就不该期许能有什么收获。</p><p><img src=\"/basic/web/uploads/1/0b98b31227-23.jpg\" style=\"width: 103px; height: 180px;\" width=\"103\" height=\"180\"></p><br>', 'jj-jameholl', '1', '哲学 道理', '1478350670', '1478350670', '1', '10', null, null, null, null, '10');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
