
-- ----------------------------
-- Table structure for vcos_employee
-- ----------------------------
DROP TABLE IF EXISTS `vcos_employee`;
CREATE TABLE `vcos_employee` (
  `employee_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `employee_card_number` varchar(32) DEFAULT '0' COMMENT '员工卡号',
  `employee_status` tinyint(4) DEFAULT '0' COMMENT '船员状态：0 等待上船，1 已上船，2休假中',
  `cn_name` varchar(100) DEFAULT NULL COMMENT '中文名',
  `first_name` varchar(100) DEFAULT NULL COMMENT '名',
  `last_name` varchar(100) DEFAULT NULL COMMENT '姓',
  `country_code` varchar(16) DEFAULT NULL COMMENT '国籍代号',
  `nation_code` varchar(2) DEFAULT NULL COMMENT '民族',
  `political_status` tinyint(4) DEFAULT '0' COMMENT '政治面貌：0群众，1团员，2党员，3民主党派',
  `sex` enum('2','1') DEFAULT '1' COMMENT '性别:1男,2女',
  `date_of_birth` date DEFAULT NULL COMMENT '出生日期',
  `birth_place` varchar(250) DEFAULT NULL COMMENT '出生地',
  `card_type` tinyint(4) DEFAULT '0' COMMENT '证件类型:0护照，1身份证，2其他证件',
  `resident_id_card` varchar(32) DEFAULT NULL COMMENT '居民身份证',
  `passport_number` varchar(20) DEFAULT NULL COMMENT '护照号',
  `other_card_number` varchar(32) DEFAULT NULL COMMENT '其他证件',
  `marry_status` tinyint(4) DEFAULT '0' COMMENT '婚姻状况：0未婚，1已婚，2离异，3丧偶',
  `health_status` tinyint(4) DEFAULT '0' COMMENT '健康状况：0健康，1一般，2较差',
  `height` varchar(5) DEFAULT NULL COMMENT '身高：（CM）',
  `weight` varchar(5) DEFAULT NULL COMMENT '体重：（KG）',
  `shoe_size` varchar(5) DEFAULT NULL COMMENT '鞋码 ',
  `blood_type` tinyint(4) DEFAULT '0' COMMENT '血型：0 A型，1 B型，2 AB型， 3 O型',
  `working_life` varchar(5) DEFAULT NULL COMMENT '工作年限:(年)',
  `major` varchar(50) DEFAULT NULL COMMENT '所学专业',
  `education` tinyint(4) DEFAULT '0' COMMENT '学历：0 高中以下，1中专，2大专，3本科，4硕士，5博士',
  `foreign_language` varchar(50) DEFAULT NULL COMMENT '外语等级',
  `mailing_address` varchar(250) DEFAULT NULL COMMENT '通信地址',
  `dormitory_num` varchar(50) DEFAULT NULL COMMENT '宿舍号',
  `telephone_num` varchar(20) DEFAULT NULL COMMENT '办公电话',
  `mobile_num` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `emergency_contact` varchar(100) DEFAULT NULL COMMENT '紧急联系人',
  `emergency_contact_phone` varchar(20) DEFAULT NULL COMMENT '紧急联系人手机号码',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='员工基本信息表';



-- ----------------------------
-- Table structure for vcos_employment_profiles
-- ----------------------------
DROP TABLE IF EXISTS `vcos_employment_profiles`;
CREATE TABLE `vcos_employment_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `ship_id` int(10) DEFAULT NULL COMMENT '船舶',
  `department_id` int(10) DEFAULT NULL COMMENT '部门',
  `post_id` int(10) DEFAULT NULL COMMENT '职务',
  `employee_type` tinyint(4) DEFAULT '0' COMMENT '船员类型：0自有船员 1租赁船员 2外聘船员',
  `employee_source` tinyint(4) DEFAULT '0' COMMENT '员工来源：0应届生招聘 1社会招聘 2内部招聘',
  `employee_status` tinyint(4) DEFAULT '0' COMMENT '在职状态：0 实习 1试用 2转正 3离职',
  `bank_name` varchar(50) DEFAULT NULL COMMENT '银行卡（银行名称）',
  `bank_card_number` varchar(30) DEFAULT NULL COMMENT '银行卡账号',
  `date_of_entry` date DEFAULT NULL COMMENT '入职时间',
  `date_of_positive` date DEFAULT NULL COMMENT '转正时间',
  `date_of_departure` date DEFAULT NULL COMMENT '离职时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工在职信息表';


-- ----------------------------
-- Table structure for vcos_certificate_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_certificate_management`;
CREATE TABLE `vcos_certificate_management` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `certificate_id` int(10) DEFAULT NULL COMMENT '证书类型',
  `certificate_number` varchar(30) DEFAULT '0' COMMENT '证书编号',
  `certificate_name` varchar(80) DEFAULT NULL COMMENT '证书名称',
  `training_institutions` varchar(80) DEFAULT NULL COMMENT '培训机构',
  `issue_organization` varchar(80) DEFAULT NULL COMMENT '签发机关',
  `issue_official` varchar(50) DEFAULT NULL COMMENT '签发官员',
  `date_of_issue` date DEFAULT NULL COMMENT '签发日期',
  `date_of_start` date DEFAULT NULL COMMENT '有效期始',
  `date_of_end` date DEFAULT NULL COMMENT '有效期至',
  `date_of_audit` date DEFAULT NULL COMMENT '年审时间',
  `audit_status` tinyint(4) DEFAULT '0' COMMENT '证书状态 (0未年审 1年审)',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工证书管理表';



-- ----------------------------
-- Table structure for vcos_title_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_title_management`;
CREATE TABLE `vcos_title_management` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `title_id` int(10) DEFAULT NULL COMMENT '职称',
  `title_number` varchar(32) DEFAULT '0' COMMENT '管理编码',
  `issue_organization` varchar(80) DEFAULT NULL COMMENT '签发机关',
  `date_of_issue` date DEFAULT NULL COMMENT '签发日期',
  `date_of_start` date DEFAULT NULL COMMENT '生效日期',
  `date_of_audit` date DEFAULT NULL COMMENT '年审时间',
  `audit_status` tinyint(4) DEFAULT '0' COMMENT '证书状态 (0未年审 1年审)',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工职称管理表';



-- ----------------------------
-- Table structure for vcos_contract
-- ----------------------------
DROP TABLE IF EXISTS `vcos_contract`;
CREATE TABLE `vcos_contract` (
  `contract_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contract_type` varchar(80) DEFAULT NULL COMMENT '合同类型（固定期限合同)',
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='合同表';


-- ----------------------------
-- Table structure for vcos_contract_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_contract_management`;
CREATE TABLE `vcos_contract_management` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `contract_id` int(10) DEFAULT NULL COMMENT '合同',
  `contract_number` varchar(32) DEFAULT '0' COMMENT '合同号',
  `date_of_sign` date DEFAULT NULL COMMENT '合同签订时间',
  `date_of_start` date DEFAULT NULL COMMENT '合同开始时间',
  `date_of_end` date DEFAULT NULL COMMENT '合同结束时间',
  `contract_status` tinyint(4) DEFAULT '1' COMMENT '状态 （0未生效，1生效）',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工合同管理表';


-- ----------------------------
-- Table structure for vcos_ship
-- ----------------------------
DROP TABLE IF EXISTS `vcos_ship`;
CREATE TABLE `vcos_ship` (
  `ship_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(80) DEFAULT NULL COMMENT '船舶名称',
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='船舶表';



-- ----------------------------
-- Table structure for vcos_qualification_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_qualification_management`;
CREATE TABLE `vcos_qualification_management` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `date_of_start` date DEFAULT NULL COMMENT '上船时间',
  `date_of_end` date DEFAULT NULL COMMENT '下船时间',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工资历管理表';


-- ----------------------------
-- Table structure for vcos_train_management
-- ----------------------------
DROP TABLE IF EXISTS `vcos_train_management`;
CREATE TABLE `vcos_train_management` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(32) DEFAULT '0' COMMENT '员工编号',
  `train_id` int(10) DEFAULT NULL COMMENT '培训编码',
  `date_of_train` date DEFAULT NULL COMMENT '培训时间',
  `train_organization` varchar(200) DEFAULT NULL COMMENT '培训单位',
  `train_content` varchar(255) DEFAULT NULL COMMENT '培训内容',
  `train_effect` varchar(255) DEFAULT NULL COMMENT '培训效果',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='员工培训表';
