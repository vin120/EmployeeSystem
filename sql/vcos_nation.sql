
-- ----------------------------
-- Table structure for vcos_nation
-- ----------------------------
DROP TABLE IF EXISTS `vcos_nation`;
CREATE TABLE `vcos_nation` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_code` varchar(2) DEFAULT NULL COMMENT '民族code',
  `nation_name` varchar(50) DEFAULT NULL COMMENT '民族名',
  PRIMARY KEY (`nation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COMMENT='民族';

-- ----------------------------
-- Records of vcos_nation
-- ----------------------------
INSERT INTO `vcos_nation` VALUES ('1', '01', '汉族');
INSERT INTO `vcos_nation` VALUES ('3', '02', '蒙古族');
INSERT INTO `vcos_nation` VALUES ('5', '03', '回族');
INSERT INTO `vcos_nation` VALUES ('7', '04', '藏族');
INSERT INTO `vcos_nation` VALUES ('9', '05', '维吾尔族');
INSERT INTO `vcos_nation` VALUES ('11', '06', '苗族');
INSERT INTO `vcos_nation` VALUES ('13', '07', '彝族');
INSERT INTO `vcos_nation` VALUES ('15', '08', '壮族');
INSERT INTO `vcos_nation` VALUES ('17', '09', '布依族');
INSERT INTO `vcos_nation` VALUES ('19', '10', '朝鲜族');
INSERT INTO `vcos_nation` VALUES ('21', '11', '满族');
INSERT INTO `vcos_nation` VALUES ('23', '12', '侗族');
INSERT INTO `vcos_nation` VALUES ('25', '13', '瑶族');
INSERT INTO `vcos_nation` VALUES ('27', '14', '白族');
INSERT INTO `vcos_nation` VALUES ('29', '15', '土家族');
INSERT INTO `vcos_nation` VALUES ('31', '16', '哈尼族');
INSERT INTO `vcos_nation` VALUES ('33', '17', '哈萨克族');
INSERT INTO `vcos_nation` VALUES ('35', '18', '傣族');
INSERT INTO `vcos_nation` VALUES ('37', '19', '黎族');
INSERT INTO `vcos_nation` VALUES ('39', '20', '僳僳族');
INSERT INTO `vcos_nation` VALUES ('41', '21', '佤族');
INSERT INTO `vcos_nation` VALUES ('43', '22', '畲族');
INSERT INTO `vcos_nation` VALUES ('45', '23', '高山族');
INSERT INTO `vcos_nation` VALUES ('47', '24', '拉祜族');
INSERT INTO `vcos_nation` VALUES ('49', '25', '水族');
INSERT INTO `vcos_nation` VALUES ('51', '26', '东乡族');
INSERT INTO `vcos_nation` VALUES ('53', '27', '纳西族');
INSERT INTO `vcos_nation` VALUES ('55', '28', '景颇族');
INSERT INTO `vcos_nation` VALUES ('57', '29', '柯尔克孜族');
INSERT INTO `vcos_nation` VALUES ('59', '30', '土族');
INSERT INTO `vcos_nation` VALUES ('61', '31', '达斡尔族');
INSERT INTO `vcos_nation` VALUES ('63', '32', '仫佬族');
INSERT INTO `vcos_nation` VALUES ('65', '33', '羌族');
INSERT INTO `vcos_nation` VALUES ('67', '34', '布朗族');
INSERT INTO `vcos_nation` VALUES ('69', '35', '撒拉族');
INSERT INTO `vcos_nation` VALUES ('71', '36', '毛难族');
INSERT INTO `vcos_nation` VALUES ('73', '37', '仡佬族');
INSERT INTO `vcos_nation` VALUES ('75', '38', '锡伯族');
INSERT INTO `vcos_nation` VALUES ('77', '39', '阿昌族');
INSERT INTO `vcos_nation` VALUES ('79', '40', '普米族');
INSERT INTO `vcos_nation` VALUES ('81', '41', '塔吉克族');
INSERT INTO `vcos_nation` VALUES ('83', '42', '怒族');
INSERT INTO `vcos_nation` VALUES ('85', '43', '乌孜别克族');
INSERT INTO `vcos_nation` VALUES ('87', '44', '俄罗斯族');
INSERT INTO `vcos_nation` VALUES ('89', '45', '鄂温克族');
INSERT INTO `vcos_nation` VALUES ('91', '46', '崩龙族');
INSERT INTO `vcos_nation` VALUES ('93', '47', '保安族');
INSERT INTO `vcos_nation` VALUES ('95', '48', '裕固族');
INSERT INTO `vcos_nation` VALUES ('97', '49', '京族');
INSERT INTO `vcos_nation` VALUES ('99', '50', '塔塔尔族');
INSERT INTO `vcos_nation` VALUES ('101', '51', '独龙族');
INSERT INTO `vcos_nation` VALUES ('103', '52', '鄂伦春族');
INSERT INTO `vcos_nation` VALUES ('105', '53', '赫哲族');
INSERT INTO `vcos_nation` VALUES ('107', '54', '门巴族');
INSERT INTO `vcos_nation` VALUES ('109', '55', '珞巴族');
INSERT INTO `vcos_nation` VALUES ('111', '56', '基诺');
INSERT INTO `vcos_nation` VALUES ('113', '57', '其他民族');
INSERT INTO `vcos_nation` VALUES ('115', '58', '外籍');
