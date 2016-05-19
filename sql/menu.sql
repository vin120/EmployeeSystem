
-- ----------------------------
-- Table structure for vcos_admin
-- ----------------------------
DROP TABLE IF EXISTS `vcos_admin`;
CREATE TABLE `vcos_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL COMMENT '用于登录',
  `admin_real_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_state` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未激活 1激活',
  `is_login` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of vcos_admin
-- ----------------------------
INSERT INTO `vcos_admin` VALUES ('1', 'super_admin', '超级管理员', '888888', '1', '127.0.0.1', '2016-03-08 14:38:51', '123@163.com', '1', '0');

-- ----------------------------
-- Table structure for vcos_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `vcos_admin_role`;
CREATE TABLE `vcos_admin_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role_desc` varchar(255) NOT NULL COMMENT '备注',
  `permission_menu` varchar(1000) NOT NULL COMMENT '允许访问的页面',
  `role_state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未激活 1激活',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- ----------------------------
-- Records of vcos_admin_role
-- ----------------------------
INSERT INTO `vcos_admin_role` VALUES ('1', '超级管理员', '超级管理员', '0', '1');
INSERT INTO `vcos_admin_role` VALUES ('6', '船长', '=。=', '{\"1\":{\"13\":[\"125\",\"21\",\"22\",\"23\",\"24\",\"122\",\"123\",\"124\"],\"14\":[\"28\",\"25\",\"26\",\"27\"],\"15\":[\"36\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\"],\"16\":[\"40\",\"37\",\"38\",\"39\"],\"12\":[\"20\",\"17\",\"18\",\"19\"],\"0\":\"12\"},\"2\":[\"44\",\"41\",\"42\",\"43\"],\"3\":[\"48\",\"45\",\"46\",\"47\"],\"4\":[\"51\",\"49\",\"50\"],\"7\":[\"127\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"126\"],\"8\":[\"75\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\"],\"9\":[\"83\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"],\"10\":[\"96\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\"],\"11\":[\"101\"],\"102\":[\"106\",\"103\",\"104\",\"105\"],\"107\":[\"111\",\"109\",\"110\",\"110\"],\"112\":[\"121\",\"114\",\"115\",\"116\",\"117\",\"118\",\"119\",\"120\"]}', '1');

-- ----------------------------
-- Table structure for vcos_permission_menu
-- ----------------------------
DROP TABLE IF EXISTS `vcos_permission_menu`;
CREATE TABLE `vcos_permission_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `parent_menu_id` varchar(255) NOT NULL COMMENT '父菜单',
  `controller_name` varchar(255) DEFAULT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `list_order` int(10) unsigned NOT NULL DEFAULT '0',
  `permission_state` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `icon` varchar(255) DEFAULT NULL,
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_systemsetting` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='权限列表';

-- ----------------------------
-- Records of vcos_permission_menu
-- ----------------------------
INSERT INTO `vcos_permission_menu` VALUES ('1', '员工信息管理', '0', null, null, '1', '1', 'book', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('2', '员工档案管理', '1', 'Information', 'Profile', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('3', '员工证书管理', '1', 'Information', 'Certificate', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('4', '员工职称管理', '1', 'Information', 'Title', '3', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('5', '员工合同管理', '1', 'Information', 'Contract', '4', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('6', '员工培训管理', '1', 'Information', 'Train', '5', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('7', '员工考核管理', '0', null, null, '2', '1', 'user', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('8', '员工出勤考核', '7', 'Assessment', 'Attendance', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('9', '员工月度考核', '7', 'Assessment', 'Month', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('10', '员工季度考核', '7', 'Assessment', 'Quarter', '3', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('11', '员工调配管理', '0', null, null, '3', '1', 'glass', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('12', '船员调配管理', '11', 'Allocate', 'Allocate', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('13', '在船名单管理', '11', 'Allocate', 'List', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('14', '船员动态管理', '11', 'Allocate', 'Dynamic', '3', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('15', '船员排班管理', '0', null, null, '4', '1', 'info-sign', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('16', '排班设置', '15', 'Schedule', 'Set', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('17', '值班查询', '15', 'Schedule', 'Search', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('18', '员工薪酬管理', '0', null, null, '5', '1', 'shopping-cart', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('19', '工资标准设定', '18', 'Salary', 'Set', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('20', '员工薪资计算', '18', 'Salary', 'Calculate', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('21', '员工薪资发放', '18', 'Salary', 'Grant', '3', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('22', '员工薪资统计', '18', 'Salary', 'Statistics', '4', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('23', '基础数据管理', '0', null, null, '6', '1', 'globe', '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('24', '公司组织结构', '23', 'Data', 'Structure', '1', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('25', '员工职务设置', '23', 'Data', 'Post', '2', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('26', '公共基础资料', '23', 'Data', 'Material', '3', '1', null, '1', '0');
INSERT INTO `vcos_permission_menu` VALUES ('27', '日志管理', '23', 'Data', 'Log', '4', '1', null, '1', '0');

