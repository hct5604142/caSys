# Host: localhost  (Version: 5.5.53)
# Date: 2018-11-20 17:24:08
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

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
INSERT INTO `pa_pxrs` VALUES (1,1,'2018-11-10 14:26:01','2018-11-10 14:26:01');
/*!40000 ALTER TABLE `pa_pxrs` ENABLE KEYS */;

#
# Structure for table "permissions"
#

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "permissions"
#

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'登陆','login',NULL,'2018-11-10 14:23:51','2018-11-10 14:23:51');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'超级管理员',NULL,'2018-11-10 14:15:22','2018-11-10 14:15:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

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
INSERT INTO `ua_uxrs` VALUES ('302841','1','2018-11-10 14:18:28','2018-11-10 14:18:28'),('302842','1','2018-11-10 14:18:28','2018-11-10 14:18:28');
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
INSERT INTO `users` VALUES ('302841','胡长霆','$2y$10$LUAeSBFm7w6mviq43c.4HeN7ZhlBdw9macIg37ipp/Z8.KGUwYcue','2018-11-10 21:24:01','2018-11-19 22:16:48',1),('302842','我我我','$2y$10$JeiUElr9OEKWkv61nmQe7ecUfoQKcqxiuVnBjv.jORfS8FjY1EkNa','2018-11-19 13:41:02','2018-11-19 23:14:43',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
