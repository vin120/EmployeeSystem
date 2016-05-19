
-- ----------------------------
-- Table structure for vcos_department
-- ----------------------------
DROP TABLE IF EXISTS `vcos_department`;
CREATE TABLE `vcos_department` (
	`department_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`department_name` varchar(50) DEFAULT NULL COMMENT '部门名称',
  	`parent_depatment_id` int(10) DEFAULT 0 COMMENT '父级部门',
  	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Table structure for vcos_post
-- ----------------------------
DROP TABLE IF EXISTS `vcos_post`;
CREATE TABLE `vcos_post` (
	`post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`department_id` int(10) DEFAULT NULL COMMENT '所属部门',
	`post_cn_name` varchar(50) DEFAULT NULL COMMENT '职务中文名称',
	`post_en_name` varchar(50) DEFAULT NULL COMMENT '职务英文名称',
	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='职务表';

-- ----------------------------
-- Table structure for vcos_certificate
-- ----------------------------
DROP TABLE IF EXISTS `vcos_certificate`;
CREATE TABLE `vcos_certificate` (
	`certificate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`certificate_code` varchar(32) DEFAULT '0' COMMENT '证书编码',
	`certificate_type` varchar(50) DEFAULT NULL COMMENT '证书类型名称（海员证,船长证）',
	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='证书表';


-- ----------------------------
-- Table structure for vcos_title
-- ----------------------------
DROP TABLE IF EXISTS `vcos_title`;
CREATE TABLE `vcos_title` (
	`title_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`title_code` varchar(32) DEFAULT '0' COMMENT '职称编码',
	`title_name` varchar(50) DEFAULT NULL COMMENT '职称名称（高级船长）',
	`title_level` tinyint(4) DEFAULT '0' COMMENT '职称等级（高级）',
	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='职称表';


-- ----------------------------
-- Table structure for vcos_train
-- ----------------------------
DROP TABLE IF EXISTS `vcos_train`;
CREATE TABLE `vcos_train` (
	`train_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`train_code` varchar(32) DEFAULT '0' COMMENT '培训证书类型编码',
	`train_name` varchar(50) DEFAULT NULL COMMENT '培训证书类型名称',
	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`train_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='培训合格证书表';


-- ----------------------------
-- Table structure for vcos_welfare
-- ----------------------------
DROP TABLE IF EXISTS `vcos_welfare`;
CREATE TABLE `vcos_welfare` (
	`welfare_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`welfare_code` varchar(32) DEFAULT '0' COMMENT '福利类型编码',
	`welfare_name` varchar(50) DEFAULT NULL COMMENT '福利类型名称',
	`welfare_status` tinyint(1) DEFAULT '0' COMMENT '月固定福利（0否，1是）',
	`remark` varchar(255)  DEFAULT NULL COMMENT '备注',
	PRIMARY KEY (`welfare_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='福利类型';


-- ----------------------------
-- Table structure for vcos_log_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_log_management`;
CREATE TABLE `vcos_log_management` (
	`log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`operation_module` varchar(50) DEFAULT NULL COMMENT '操作模块',
	`operation_type` tinyint(4) DEFAULT NULL COMMENT '操作类型（增，删，改）',
	`operation_time` datetime DEFAULT NULL COMMENT '操作时间',
	`operation_content` varchar(255) DEFAULT NULL COMMENT '操作内容',
	PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='日志管理';



-- ----------------------------
-- Table structure for vcos_file_path
-- ----------------------------
DROP TABLE IF EXISTS `vcos_file_path`;
CREATE TABLE `vcos_file_path` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
	`path` varchar(50) DEFAULT NULL COMMENT '路径',
	`filename` varchar(50) DEFAULT NULL COMMENT '上传文件名',
	`filename_save` varchar(50) DEFAULT NULL COMMENT '保存文件名',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文件路径表';