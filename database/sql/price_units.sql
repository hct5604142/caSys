# Host: localhost  (Version: 5.5.53)
# Date: 2018-11-28 21:49:59
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

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
INSERT INTO `price_units` VALUES (1,'元/吨.公里','2018-11-27 23:29:04','2018-11-27 23:29:04'),(2,'元/吨','2018-11-27 23:29:04','2018-11-27 23:29:04'),(3,'元/万支','2018-11-27 23:29:04','2018-11-27 23:29:04');
/*!40000 ALTER TABLE `price_units` ENABLE KEYS */;
