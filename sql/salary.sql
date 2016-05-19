
-- ----------------------------
-- Table structure for vcos_base_salary
-- ----------------------------
DROP TABLE IF EXISTS `vcos_base_salary`;
CREATE TABLE `vcos_base_salary` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门id',
  	`post_id` int(10) DEFAULT NULL COMMENT '职务id',
  	`month_salary` int(15) DEFAULT 0 COMMENT '月工资',
  	`day_salary` int(15) DEFAULT 0 COMMENT '日工资',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='基本工资';

-- ----------------------------
-- Table structure for vcos_skill_allowance
-- ----------------------------
DROP TABLE IF EXISTS `vcos_skill_allowance`;
CREATE TABLE `vcos_skill_allowance` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门id',
  	`post_id` int(10) DEFAULT NULL COMMENT '职务id',
  	`title_id` int(10) DEFAULT NULL COMMENT '职称id',
  	`allowance` int(15) DEFAULT 0 COMMENT '津贴',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='技能工龄津贴';


-- ----------------------------
-- Table structure for vcos_overtime_salary
-- ----------------------------
DROP TABLE IF EXISTS `vcos_overtime_salary`;
CREATE TABLE `vcos_overtime_salary` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门编号',
  	`post_id` int(10) DEFAULT NULL COMMENT '职务编码',
  	`date_of_start` date DEFAULT NULL COMMENT '开始时间',
  	`date_of_end` date DEFAULT NULL COMMENT '结束时间',
  	`day_salary` int(10) DEFAULT 0 COMMENT '日工资',
  	`night_salary` int(10) DEFAULT 0 COMMENT '夜工资',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='加班工资';


-- ----------------------------
-- Table structure for vcos_leave_charge
-- ----------------------------
DROP TABLE IF EXISTS `vcos_leave_charge`;
CREATE TABLE `vcos_leave_charge` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门编号',
  	`post_id` int(10) DEFAULT NULL COMMENT '职务编码',
  	`sick_charge` int(10) DEFAULT 0 COMMENT '病假扣款',
  	`compassionate_charge` int(10) DEFAULT 0 COMMENT '事假扣款',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='请假扣款';


-- ----------------------------
-- Table structure for vcos_housing_fund
-- ----------------------------
DROP TABLE IF EXISTS `vcos_housing_fund`;
CREATE TABLE `vcos_housing_fund` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`fund_base` int(15) DEFAULT 0 COMMENT '公积金基数',
	`fund_person_percent` varchar(5) DEFAULT '0' COMMENT '个人公积金比例(%)',
	`fund_compony_percent` varchar(5) DEFAULT '0' COMMENT '单位公积金比例(%)',
	`security_base` int(15) DEFAULT 0 COMMENT '社保基数',
	`unemployment` varchar(5) DEFAULT '0' COMMENT '失业保险比例(%)',
	`maternity` varchar(5) DEFAULT '0' COMMENT '生育保险比例(%)',
	`endowment_person` varchar(5) DEFAULT '0' COMMENT '个人养老保险比例(%)',
	`endowment_compony` varchar(5) DEFAULT '0' COMMENT '单位养老保险比例(%)',
	`medical_person` varchar(5) DEFAULT '0' COMMENT '个人医疗保险比例(%)',
	`medical_compony` varchar(5) DEFAULT '0' COMMENT '单位医疗保险比例(%)',
	`injury_person` varchar(5) DEFAULT '0' COMMENT '个人工伤保险比例(%)',
	`injury_compony` varchar(5) DEFAULT '0' COMMENT '单位工伤保险比例(%)',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='住房公积金';



-- ----------------------------
-- Table structure for vcos_traffic_allowance
-- ----------------------------
DROP TABLE IF EXISTS `vcos_traffic_allowance`;
CREATE TABLE `vcos_traffic_allowance` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`depatment_id` int(10) DEFAULT NULL COMMENT '部门id',
  	`post_id` int(10) DEFAULT NULL COMMENT '职务id',
  	`allowance_name` varchar(80) DEFAULT NUll COMMENT '补贴名称',
  	`allowance_base` int(15) DEFAULT 0 COMMENT '补贴标准',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='交通通讯补贴';


-- ----------------------------
-- Table structure for vcos_salary_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_salary_management`;
CREATE TABLE `vcos_salary_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`base_salary` int(15) DEFAULT 0 COMMENT '基本工资',
	`remark_base_salary` varchar(255) DEFAULT NUll COMMENT '基本工资备注',
	`skill_allowance` int(15) DEFAULT 0 COMMENT '技能补贴',
	`remark_skill_allowance` varchar(255) DEFAULT NUll COMMENT '技能补贴备注',
	`date` varchar(18) DEFAULT NUll COMMENT '工资月份',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工基本工资';


-- ----------------------------
-- Table structure for vcos_overtime_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_overtime_management`;
CREATE TABLE `vcos_overtime_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`day_times` int(5) DEFAULT 0 COMMENT '日班次数',
	`night_times` int(5) DEFAULT 0 COMMENT '夜班次数',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	`date` varchar(18) DEFAULT NUll COMMENT '工资月份',
	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工加班工资';


-- ----------------------------
-- Table structure for vcos_fund_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_fund_management`;
CREATE TABLE `vcos_fund_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`resident_id_card` varchar(32) DEFAULT NULL COMMENT '居民身份证',
	`social_security_number` varchar(32) DEFAULT NULL COMMENT '社保号',
	`all_total` int(15) DEFAULT 0 COMMENT '应交合计',
	`person_total` int(15) DEFAULT 0 COMMENT '个人合计',
	`compony_total` int(15) DEFAULT 0 COMMENT '单位合计',
	`fund_base` int(15) DEFAULT 0 COMMENT '住房公积金基数',
	`fund_person` int(15) DEFAULT 0 COMMENT '住房公积金(个人)',
	`fund_compony` int(15) DEFAULT 0 COMMENT '住房公积金(单位)',
	`security_base` int(15) DEFAULT 0 COMMENT '社保基数',
	`unemployment` int(15) DEFAULT 0 COMMENT '失业保险',
	`maternity` int(15) DEFAULT 0 COMMENT '生育保险',
	`endowment_person` int(15) DEFAULT 0 COMMENT '养老保险(个人)',
	`endowment_compony` int(15) DEFAULT 0 COMMENT '养老保险(单位)',
	`medical_person` int(15) DEFAULT 0 COMMENT '医疗保险(个人)',
	`medical_compony` int(15) DEFAULT 0 COMMENT '医疗保险(单位)',
	`injury_person` int(15) DEFAULT 0 COMMENT '工伤保险(个人)',
	`injury_compony` int(15) DEFAULT 0 COMMENT '工伤保险(单位)',
	`date` varchar(18) DEFAULT NUll COMMENT '社保月份',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工社保公积金';


-- ----------------------------
-- Table structure for vcos_performance_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_performance_management`;
CREATE TABLE `vcos_performance_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`month_performance` int(15) DEFAULT 0 COMMENT '月度考核绩效',
	`season_performance` int(15) DEFAULT 0 COMMENT '季度考核绩效',
	`sick_times` int(5) DEFAULT 0 COMMENT '病假次数',
	`compassionate_times` int(5) DEFAULT 0 COMMENT '事假次数',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	`date` varchar(18) DEFAULT NUll COMMENT '月份',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工绩效工资';


-- ----------------------------
-- Table structure for vcos_tax_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_tax_management`;
CREATE TABLE `vcos_tax_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`tax_amount` int(15) DEFAULT 0 COMMENT '税收合计',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	`date` varchar(18) DEFAULT NUll COMMENT '月份',
	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工税收';



-- ----------------------------
-- Table structure for vcos_allowance_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_allowance_management`;
CREATE TABLE `vcos_allowance_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`allowance_amount` int(15) DEFAULT 0 COMMENT '交通通讯补贴',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	`date` varchar(18) DEFAULT NUll COMMENT '月份',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工费用补贴';



-- ----------------------------
-- Table structure for vcos_otherallowance_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_otherallowance_management`;
CREATE TABLE `vcos_otherallowance_management` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`total_amount` int(15) DEFAULT 0 COMMENT '福利合计',
	`remark` varchar(255) DEFAULT NUll COMMENT '备注',
	`date` varchar(18) DEFAULT NUll COMMENT '月份',
	`status` tinyint(4) DEFAULT '0' COMMENT '0系统生成的，1文件导入的',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='其他福利';


-- ----------------------------
-- Table structure for vcos_salary_pay
-- ----------------------------
DROP TABLE IF EXISTS `vcos_salary_pay`;
CREATE TABLE `vcos_salary_pay` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`status` tinyint(4) DEFAULT '0' COMMENT '发放状态：0未发放，1已发放',
	`total_amount` int(15) DEFAULT 0 COMMENT '应发金额',
	`date` varchar(18) DEFAULT NUll COMMENT '月份',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='工资发放';