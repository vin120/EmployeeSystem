
-- ----------------------------
-- Table structure for vcos_schedule
-- ----------------------------
DROP TABLE IF EXISTS `vcos_schedule`;
CREATE TABLE `vcos_schedule` (
	`schedule_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`schedule_name` varchar(50) DEFAULT NULL COMMENT '方案名称',
  	`depatment_id` int(10) DEFAULT NULL COMMENT '所属部门',
  	`schedule_status` tinyint(4) DEFAULT '0' COMMENT '状态：0未默认方案1，默认方案',
	PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='班次方案';


-- ----------------------------
-- Table structure for vcos_schedule_detail
-- ----------------------------
DROP TABLE IF EXISTS `vcos_schedule_detail`;
CREATE TABLE `vcos_schedule_detail` (
	`schedule_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`schedule_id` int(10) DEFAULT NULL COMMENT '所属方案的id',
  	`name` varchar(50) DEFAULT NULL COMMENT '班次名称',
  	`start_time` varchar(18) DEFAULT NULL COMMENT '开始时间',
  	`end_time` varchar(18) DEFAULT NULL COMMENT '结束时间',
	PRIMARY KEY (`schedule_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='班次方案详情';


-- ----------------------------
-- Table structure for vcos_schedule_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_schedule_management`;
CREATE TABLE `vcos_schedule_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门id',
	`schedule_detail_id` int(10) DEFAULT NULL COMMENT '班次编号',
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`date` date DEFAULT NULL COMMENT '当天时间',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='排班设置';