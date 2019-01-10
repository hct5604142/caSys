# Host: localhost  (Version: 5.5.53)
# Date: 2019-01-10 19:46:23
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

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
  `transport_category` tinyint(3) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `check_number` tinyint(1) NOT NULL DEFAULT '0' COMMENT '数量核算',
  `check_price` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格核算',
  `leader_approval` tinyint(1) NOT NULL DEFAULT '0' COMMENT '领导审批',
  `check_add` tinyint(1) NOT NULL DEFAULT '0' COMMENT '增加运单状态',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "waybill_eproducts"
#

/*!40000 ALTER TABLE `waybill_eproducts` DISABLE KEYS */;
INSERT INTO `waybill_eproducts` VALUES (17,'D8200A20181009001','苏C36910','15','2018-12-26','徐州','徐州',48,90.0,15.00,0.86,619.20,1,'托盘烟','2018-12-16 11:30:09','2018-12-24 11:55:17',0,0,0,1,'鑫发货运有限公司'),(18,'D8200A20181009008','苏C36910','15','2018-12-13','徐州','苏州',520,90.0,15.00,0.76,5928.00,0,'托盘烟','2018-12-16 11:31:06','2018-12-24 11:55:17',0,0,0,1,'鑫发货运有限公司');
/*!40000 ALTER TABLE `waybill_eproducts` ENABLE KEYS */;
