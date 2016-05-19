
-- ----------------------------
-- Table structure for vcos_leave
-- ----------------------------
DROP TABLE IF EXISTS `vcos_leave`;
CREATE TABLE `vcos_leave` (
	`leave_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`leave_type` varchar(50) DEFAULT NULL COMMENT '请假类型（事假，病假)',
	PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='请假类型表';

-- ----------------------------
-- Table structure for vcos_leave_log
-- ----------------------------
DROP TABLE IF EXISTS `vcos_leave_log`;
CREATE TABLE `vcos_leave_log` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`leave_id` int(10) DEFAULT NULL COMMENT '请假id',
  	`date_of_start` datetime DEFAULT NULL COMMENT '请假开始时间',
  	`date_of_end` datetime DEFAULT NULL COMMENT '请假结束时间',
  	`count_day` int(5) DEFAULT '0' COMMENT '累计天数',
  	`remark` varchar(255) DEFAULT NULL COMMENT '备注',
  	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='请假维护';


-- ----------------------------
-- Table structure for vcos_holiday
-- ----------------------------
DROP TABLE IF EXISTS `vcos_holiday`;
CREATE TABLE `vcos_holiday` (
	`holiday_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`holiday_type` varchar(50) DEFAULT NULL COMMENT '休假类型（年假，婚假)',
	PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='休假类型表';


-- ----------------------------
-- Table structure for vcos_holiday_log
-- ----------------------------
DROP TABLE IF EXISTS `vcos_holiday_log`;
CREATE TABLE `vcos_holiday_log` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`holiday_id` int(10) DEFAULT NULL COMMENT '休假id',
  	`date_of_start` date DEFAULT NULL COMMENT '休假开始时间',
  	`date_of_end` date DEFAULT NULL COMMENT '休假结束时间',
 	`count_day` int(5) DEFAULT '0' COMMENT '累计天数',
   	`remark` varchar(255) DEFAULT NULL COMMENT '备注',
  	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='休假维护';


-- ----------------------------
-- Table structure for vcos_leave_statistic
-- ----------------------------
DROP TABLE IF EXISTS `vcos_leave_statistic`;
CREATE TABLE `vcos_leave_statistic` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`date` date DEFAULT NULL COMMENT '休假开始时间',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='缺勤统计';


-- ----------------------------
-- Table structure for vcos_holiday_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_holiday_management`;
CREATE TABLE `vcos_holiday_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`update_time` date DEFAULT NULL COMMENT '更新时间',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='假期管理';



-- ----------------------------
-- Table structure for vcos_holiday_management_detail
-- ----------------------------
DROP TABLE IF EXISTS `vcos_holiday_management_detail`;
CREATE TABLE `vcos_holiday_management_detail` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`holiday_id` int(10) DEFAULT NULL COMMENT '休假id',
  	`date_of_start` date DEFAULT NULL COMMENT '休假开始时间',
  	`date_of_end` date DEFAULT NULL COMMENT '休假结束时间',
 	`count_day` int(5) DEFAULT '0' COMMENT '累计天数',
   	`content` varchar(255) DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='详细假期管理';




-- ----------------------------
-- Table structure for vcos_month_assessment
-- ----------------------------
DROP TABLE IF EXISTS `vcos_month_assessment`;
CREATE TABLE `vcos_month_assessment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`month_of_assessment` varchar(20) DEFAULT NULL COMMENT '考核月份',
  	`score` int(5) DEFAULT NULL COMMENT '得分',
  	`bonus` int(15) DEFAULT NULL COMMENT '绩效奖金',
  	`remark` varchar(255) DEFAULT NULL COMMENT '备注',
  	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='月度考核';

-- ----------------------------
-- Table structure for vcos_season_assessment
-- ----------------------------
DROP TABLE IF EXISTS `vcos_season_assessment`;
CREATE TABLE `vcos_season_assessment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  	`season_of_assessment` varchar(20) DEFAULT NULL COMMENT '考核季度',
  	`score` int(5) DEFAULT NULL COMMENT '得分',
  	`bonus` int(15) DEFAULT NULL COMMENT '绩效奖金',
  	`remark` varchar(255) DEFAULT NULL COMMENT '备注',
  	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='季度考核';