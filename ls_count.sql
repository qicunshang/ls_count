# Host: 118.89.230.252  (Version: 5.5.56-log)
# Date: 2018-01-25 16:45:56
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "ls_per_inv"
#

DROP TABLE IF EXISTS `ls_per_inv`;
CREATE TABLE `ls_per_inv` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `source_page` varchar(255) NOT NULL DEFAULT '' COMMENT '来源页面',
  `inv_count` int(11) NOT NULL DEFAULT '0' COMMENT '访问次数',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单页面访问';

#
# Structure for table "ls_user"
#

DROP TABLE IF EXISTS `ls_user`;
CREATE TABLE `ls_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `appid` varchar(50) NOT NULL DEFAULT '0' COMMENT 'appid',
  `secret_key` varchar(255) NOT NULL DEFAULT '0' COMMENT '秘钥',
  `created_at` bigint(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` bigint(12) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';
