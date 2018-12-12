# Host: localhost  (Version: 5.5.53)
# Date: 2018-12-12 20:07:46
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "base_prices"
#

DROP TABLE IF EXISTS `base_prices`;
CREATE TABLE `base_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_main` varchar(255) NOT NULL DEFAULT '' COMMENT '运输项目主类别',
  `class_sub` varchar(255) DEFAULT NULL COMMENT '运输项目子类别',
  `base_price` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '基准运价',
  `unit_id` int(11) NOT NULL,
  `distance` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否和距离相关',
  `linkage` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否执行油价联动',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "base_prices"
#

/*!40000 ALTER TABLE `base_prices` DISABLE KEYS */;
INSERT INTO `base_prices` VALUES (1,'15吨以上','300公里以内',0.67,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(2,'15吨以上','301-1000公里',0.62,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(3,'15吨以上','1001-2500公里',0.57,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(4,'15吨以上','2501公里以上',0.54,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(5,'15吨以下','300公里以内',0.73,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(6,'15吨以下','301-2500公里',0.72,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(7,'15吨以下','2501公里以上',0.68,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(8,'成品烟移库',NULL,20.05,2,0,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(9,'烟叶、膨丝、材料移库',NULL,20.05,2,0,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(10,'烟梗移库',NULL,26.89,2,0,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(11,'南通托盘',NULL,0.62,1,1,1,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(12,'纸箱回收',NULL,0.25,1,1,0,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(13,'托盘回收',NULL,0.25,1,1,0,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04'),(14,'南通咀棒',NULL,3.62,3,0,0,NULL,'2018-11-27 23:29:04','2018-11-27 23:29:04');
/*!40000 ALTER TABLE `base_prices` ENABLE KEYS */;

#
# Structure for table "car_no_types"
#

DROP TABLE IF EXISTS `car_no_types`;
CREATE TABLE `car_no_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no` (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "car_no_types"
#

/*!40000 ALTER TABLE `car_no_types` DISABLE KEYS */;
INSERT INTO `car_no_types` VALUES (1,'苏C36910',15,'2018-11-28 00:43:18','2018-12-09 15:14:21'),(2,'苏C36903',15,'2018-11-28 00:43:18','2018-11-28 00:43:18'),(3,'苏C21581',30,'2018-11-28 00:43:18','2018-11-28 00:43:18'),(4,'苏C27205',30,'2018-11-28 00:43:18','2018-11-28 00:43:18'),(5,'苏C35285',30,'2018-11-28 00:43:18','2018-11-28 00:43:18'),(6,'苏C60881',25,'2018-11-28 00:43:18','2018-11-28 00:43:18');
/*!40000 ALTER TABLE `car_no_types` ENABLE KEYS */;

#
# Structure for table "crumbs"
#

DROP TABLE IF EXISTS `crumbs`;
CREATE TABLE `crumbs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `uri` varchar(255) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "crumbs"
#

/*!40000 ALTER TABLE `crumbs` DISABLE KEYS */;
INSERT INTO `crumbs` VALUES (1,'首页','/dashboard',NULL),(2,'账户管理','/auth/user_manage',1),(3,'角色管理','/auth/roles',1),(4,'权限管理','/auth/permissions',1),(5,'添加用户','/auth/add_user',1);
/*!40000 ALTER TABLE `crumbs` ENABLE KEYS */;

#
# Structure for table "oil_price_chgs"
#

DROP TABLE IF EXISTS `oil_price_chgs`;
CREATE TABLE `oil_price_chgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lsp` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '上季度油价',
  `ip` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '初始油价',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "oil_price_chgs"
#

/*!40000 ALTER TABLE `oil_price_chgs` DISABLE KEYS */;
INSERT INTO `oil_price_chgs` VALUES (2,7.46,6.10,'2018-11-27 23:29:04','2018-12-11 22:04:08');
/*!40000 ALTER TABLE `oil_price_chgs` ENABLE KEYS */;

#
# Structure for table "pa_pxrs"
#

DROP TABLE IF EXISTS `pa_pxrs`;
CREATE TABLE `pa_pxrs` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "pa_pxrs"
#

/*!40000 ALTER TABLE `pa_pxrs` DISABLE KEYS */;
INSERT INTO `pa_pxrs` VALUES (1,1,'2018-11-10 14:26:01','2018-11-10 14:26:01'),(1,2,'2018-11-10 14:26:01','2018-11-10 14:26:01'),(1,3,'2018-11-10 14:26:01','2018-11-10 14:26:01'),(2,1,'2018-11-27 18:31:33','2018-11-27 18:31:33');
/*!40000 ALTER TABLE `pa_pxrs` ENABLE KEYS */;

#
# Structure for table "permissions"
#

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `method` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "permissions"
#

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'仪表盘查看',NULL,'2018-11-10 14:23:51','2018-11-10 14:23:51','GET'),(2,'用户查看',NULL,'2018-11-10 14:23:51','2018-11-10 14:23:51','GET'),(3,'角色管理查看',NULL,'2018-11-10 14:23:51','2018-11-10 14:23:51','GET');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

#
# Structure for table "price_units"
#

DROP TABLE IF EXISTS `price_units`;
CREATE TABLE `price_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "price_units"
#

/*!40000 ALTER TABLE `price_units` DISABLE KEYS */;
INSERT INTO `price_units` VALUES (1,'元/吨.公里','2018-11-27 23:29:04','2018-12-03 19:37:11'),(2,'元/吨','2018-11-27 23:29:04','2018-11-27 23:29:04'),(3,'元/万支','2018-11-27 23:29:04','2018-11-27 23:29:04');
/*!40000 ALTER TABLE `price_units` ENABLE KEYS */;

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'超级管理员',NULL,'2018-11-10 14:15:22','2018-11-10 14:15:22'),(2,'金额核算员',NULL,'2018-11-10 14:15:22','2018-11-10 14:15:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

#
# Structure for table "startend_mailages"
#

DROP TABLE IF EXISTS `startend_mailages`;
CREATE TABLE `startend_mailages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` varchar(255) NOT NULL DEFAULT '',
  `end` varchar(255) NOT NULL DEFAULT '',
  `mileage` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "startend_mailages"
#

/*!40000 ALTER TABLE `startend_mailages` DISABLE KEYS */;
INSERT INTO `startend_mailages` VALUES (2,'徐州','徐州',48,'2018-12-09 21:18:31','2018-12-09 21:18:31'),(3,'徐州','苏州',520,'2018-12-09 21:18:40','2018-12-09 21:18:40'),(4,'徐州','南通',492,'2018-12-09 21:18:54','2018-12-09 21:18:54'),(5,'徐州','南京',372,'2018-12-09 21:19:09','2018-12-09 21:19:09'),(6,'徐州','无锡',496,'2018-12-09 21:19:39','2018-12-09 21:19:39'),(7,'徐州','扬州',361,'2018-12-09 21:20:14','2018-12-09 21:20:14'),(8,'徐州','泰州',400,'2018-12-09 21:20:36','2018-12-09 21:20:36'),(9,'徐州','连云港',215,'2018-12-09 21:21:08','2018-12-09 21:21:08'),(10,'徐州','淮安',195,'2018-12-09 21:21:20','2018-12-09 21:21:20'),(11,'徐州','常州',462,'2018-12-09 21:22:32','2018-12-09 21:22:32'),(12,'徐州','盐城',319,'2018-12-09 21:22:51','2018-12-09 21:22:51'),(13,'徐州','宿迁',119,'2018-12-09 21:24:15','2018-12-09 21:24:15'),(14,'徐州','镇江',395,'2018-12-09 21:25:32','2018-12-09 21:25:32');
/*!40000 ALTER TABLE `startend_mailages` ENABLE KEYS */;

#
# Structure for table "ua_uxrs"
#

DROP TABLE IF EXISTS `ua_uxrs`;
CREATE TABLE `ua_uxrs` (
  `uid` varchar(255) NOT NULL,
  `rid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "ua_uxrs"
#

/*!40000 ALTER TABLE `ua_uxrs` DISABLE KEYS */;
INSERT INTO `ua_uxrs` VALUES ('302841','1','2018-11-10 14:18:28','2018-11-10 14:18:28'),('302842','1','2018-11-10 14:18:28','2018-11-10 14:18:28'),('302841','2','0000-00-00 00:00:00','0000-00-00 00:00:00'),('302846','1','2018-11-25 12:46:34','2018-11-25 12:46:34');
/*!40000 ALTER TABLE `ua_uxrs` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '判断是否启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('302841','胡长6','$2y$10$LUAeSBFm7w6mviq43c.4HeN7ZhlBdw9macIg37ipp/Z8.KGUwYcue','2018-11-10 21:24:01','2018-11-20 23:37:30',1),('302842','胡长3','$2y$10$JeiUElr9OEKWkv61nmQe7ecUfoQKcqxiuVnBjv.jORfS8FjY1EkNa','2018-11-19 13:41:02','2018-11-26 20:18:28',1),('302846','hct','$2y$10$Nj/qqm52qzrd9UdjWX6YtusBDYm35ltIh2byip64P/f1/nrvzGqNC','2018-11-22 00:17:22','2018-11-26 20:18:22',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

#
# Structure for table "waybill_eproducts"
#

DROP TABLE IF EXISTS `waybill_eproducts`;
CREATE TABLE `waybill_eproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL DEFAULT '',
  `car_no` varchar(255) NOT NULL DEFAULT '' COMMENT '车号',
  `car_type` varchar(255) NOT NULL DEFAULT '' COMMENT '车型',
  `exec_date` date NOT NULL DEFAULT '0000-00-00',
  `start` varchar(255) NOT NULL DEFAULT '',
  `end` varchar(255) NOT NULL DEFAULT '',
  `mileage` int(11) DEFAULT '0',
  `boxes_no` decimal(10,1) NOT NULL DEFAULT '0.0',
  `tonnage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `freight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `check_number` tinyint(1) NOT NULL DEFAULT '0' COMMENT '数量核算',
  `check_price` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格核算',
  `leader_approval` tinyint(1) NOT NULL DEFAULT '0' COMMENT '领导审批',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "waybill_eproducts"
#

/*!40000 ALTER TABLE `waybill_eproducts` DISABLE KEYS */;
INSERT INTO `waybill_eproducts` VALUES (1,'D8200A20181009001','苏C36910','15','2018-10-09','徐州','徐州',48,90.0,15.00,0.00,0.00,NULL,'2018-12-11 19:37:46','2018-12-11 19:37:46',0,0,0);
/*!40000 ALTER TABLE `waybill_eproducts` ENABLE KEYS */;
