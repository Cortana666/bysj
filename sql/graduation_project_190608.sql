/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : graduation_project

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 08/06/2019 19:54:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gp_admin
-- ----------------------------
DROP TABLE IF EXISTS `gp_admin`;
CREATE TABLE `gp_admin`  (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `realname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `salt` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加盐值',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `type` tinyint(4) NOT NULL COMMENT '角色 1学校 2学院 3专业',
  `type_id` int(11) NOT NULL COMMENT '角色对应单位id',
  `root_id` int(11) NOT NULL COMMENT '角色对应上级id',
  `status` tinyint(4) NOT NULL COMMENT '状态 1启用 2禁用',
  `time` datetime(0) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`adm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_admin
-- ----------------------------
INSERT INTO `gp_admin` VALUES (1, 'bh', '北华大学', 'ff4d028967e6efe917163cabf6fafbe1', '1234', 'bh@bh.com', 1, 1, 0, 1, '2019-06-03 14:54:50');
INSERT INTO `gp_admin` VALUES (2, 'jsj', '计算机学院', '8907f5b95a05efd18c4addba1b0866e2', 'mwi0', 'jsj@bh.com', 2, 1, 0, 1, '2019-06-03 08:23:51');
INSERT INTO `gp_admin` VALUES (6, 'wl', '网络工程', '15af6b186ff98cdbfb3e5dd917a58bf6', 'jubh', 'wl@bh.com', 3, 1, 1, 1, '2019-06-03 10:57:57');

-- ----------------------------
-- Table structure for gp_ask
-- ----------------------------
DROP TABLE IF EXISTS `gp_ask`;
CREATE TABLE `gp_ask`  (
  `ask_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`ask_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gp_college
-- ----------------------------
DROP TABLE IF EXISTS `gp_college`;
CREATE TABLE `gp_college`  (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学院代码',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学院名称',
  `time` datetime(0) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`col_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_college
-- ----------------------------
INSERT INTO `gp_college` VALUES (1, '017', '计算机科学技术学院', '2019-06-03 09:15:10');
INSERT INTO `gp_college` VALUES (2, '016', '机械学院', '2019-06-03 09:16:11');

-- ----------------------------
-- Table structure for gp_log
-- ----------------------------
DROP TABLE IF EXISTS `gp_log`;
CREATE TABLE `gp_log`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `func` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `actor` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_log
-- ----------------------------
INSERT INTO `gp_log` VALUES (1, 'admin/user/login', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 07:13:44');
INSERT INTO `gp_log` VALUES (2, 'admin/admin/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 08:23:51');
INSERT INTO `gp_log` VALUES (3, 'admin/admin/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 08:29:22');
INSERT INTO `gp_log` VALUES (4, 'admin/admin/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 08:31:11');
INSERT INTO `gp_log` VALUES (5, 'admin/admin/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 08:31:34');
INSERT INTO `gp_log` VALUES (6, 'admin/college/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 09:15:10');
INSERT INTO `gp_log` VALUES (7, 'admin/college/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 09:16:11');
INSERT INTO `gp_log` VALUES (8, 'admin/college/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 09:21:08');
INSERT INTO `gp_log` VALUES (9, 'admin/college/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 09:21:11');
INSERT INTO `gp_log` VALUES (10, 'admin/college/add', 1, '用户登录', 1, '127.0.0.1', '2019-06-03 09:21:17');
INSERT INTO `gp_log` VALUES (11, 'admin/special/add', 1, '添加专业[1]网络工程', 1, '127.0.0.1', '2019-06-03 09:59:26');
INSERT INTO `gp_log` VALUES (12, 'admin/special/add', 1, '添加专业[2]软件工程', 1, '127.0.0.1', '2019-06-03 10:00:14');
INSERT INTO `gp_log` VALUES (13, 'admin/special/add', 1, '添加专业[3]机械工程', 1, '127.0.0.1', '2019-06-03 10:00:33');
INSERT INTO `gp_log` VALUES (14, 'admin/special/add', 1, '添加专业[4]123', 1, '127.0.0.1', '2019-06-03 10:04:29');
INSERT INTO `gp_log` VALUES (15, 'admin/special/add', 1, '添加专业[5]123', 1, '127.0.0.1', '2019-06-03 10:04:35');
INSERT INTO `gp_log` VALUES (16, 'admin/special/add', 1, '添加专业[6]123123', 1, '127.0.0.1', '2019-06-03 10:04:43');
INSERT INTO `gp_log` VALUES (17, 'admin/admin/add', 1, '添加管理员账号[6]wl', 1, '127.0.0.1', '2019-06-03 10:57:57');
INSERT INTO `gp_log` VALUES (18, 'admin/user/login', 1, '用户登录操作', 1, '127.0.0.1', '2019-06-03 13:33:24');
INSERT INTO `gp_log` VALUES (19, 'admin/teacher/add', 1, '添加教师账号[1]李红果', 1, '127.0.0.1', '2019-06-03 14:37:06');
INSERT INTO `gp_log` VALUES (20, 'admin/user/login', 1, '用户登录操作', 1, '127.0.0.1', '2019-06-05 03:23:57');
INSERT INTO `gp_log` VALUES (21, 'admin/teacher/import', 1, '导入教师：成功{$success}条,失败{$error}条', 1, '127.0.0.1', '2019-06-05 04:41:37');
INSERT INTO `gp_log` VALUES (22, 'admin/teacher/import', 1, '导入教师：成功{$success}条,失败{$error}条', 1, '127.0.0.1', '2019-06-05 04:41:48');
INSERT INTO `gp_log` VALUES (23, 'admin/teacher/import', 1, '导入教师：成功{$success}条,失败{$error}条', 1, '127.0.0.1', '2019-06-05 04:42:22');
INSERT INTO `gp_log` VALUES (24, 'admin/teacher/import', 1, '导入教师：成功{$success}条,失败{$error}条', 1, '127.0.0.1', '2019-06-05 04:42:31');
INSERT INTO `gp_log` VALUES (25, 'admin/teacher/import', 1, '导入教师：成功0条,失败1条', 1, '127.0.0.1', '2019-06-05 04:43:45');
INSERT INTO `gp_log` VALUES (26, 'admin/teacher/import', 1, '导入教师：成功0条,失败1条', 1, '127.0.0.1', '2019-06-05 04:45:52');
INSERT INTO `gp_log` VALUES (27, 'admin/teacher/import', 1, '导入教师：成功1条,失败0条', 1, '127.0.0.1', '2019-06-05 04:47:25');
INSERT INTO `gp_log` VALUES (28, 'admin/teacher/import', 1, '导入教师：成功1条,失败0条', 1, '127.0.0.1', '2019-06-05 04:48:22');
INSERT INTO `gp_log` VALUES (29, 'admin/student/add', 1, '添加学生账号[1]王状', 1, '127.0.0.1', '2019-06-05 06:29:38');
INSERT INTO `gp_log` VALUES (30, 'admin/student/import', 1, '导入学生：成功2条,失败0条', 1, '127.0.0.1', '2019-06-05 06:43:24');
INSERT INTO `gp_log` VALUES (31, 'admin/user/login', 2, '用户登录操作', 2, '127.0.0.1', '2019-06-05 06:44:31');
INSERT INTO `gp_log` VALUES (32, 'admin/user/login', 6, '用户登录操作', 3, '127.0.0.1', '2019-06-05 07:30:12');
INSERT INTO `gp_log` VALUES (33, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:17:04');
INSERT INTO `gp_log` VALUES (34, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:18:26');
INSERT INTO `gp_log` VALUES (35, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:18:37');
INSERT INTO `gp_log` VALUES (36, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:21:45');
INSERT INTO `gp_log` VALUES (37, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:22:15');
INSERT INTO `gp_log` VALUES (38, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:23:41');
INSERT INTO `gp_log` VALUES (39, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:23:54');
INSERT INTO `gp_log` VALUES (40, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:25:00');
INSERT INTO `gp_log` VALUES (41, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:25:35');
INSERT INTO `gp_log` VALUES (42, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:25:42');
INSERT INTO `gp_log` VALUES (43, 'admin/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:25:58');
INSERT INTO `gp_log` VALUES (44, 'admin/user/login', 1, '用户登录操作', 1, '127.0.0.1', '2019-06-05 09:31:01');
INSERT INTO `gp_log` VALUES (45, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 09:31:21');
INSERT INTO `gp_log` VALUES (46, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 10:44:38');
INSERT INTO `gp_log` VALUES (47, 'admin/user/login', 2, '用户登录操作', 2, '127.0.0.1', '2019-06-05 11:49:10');
INSERT INTO `gp_log` VALUES (48, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-05 11:49:25');
INSERT INTO `gp_log` VALUES (49, 'student/subject/add', 19, '提交课程题目[1]毕业设计管理系统', 5, '127.0.0.1', '2019-06-05 12:14:17');
INSERT INTO `gp_log` VALUES (50, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\phpE32A.tmp', 5, '127.0.0.1', '2019-06-05 13:27:34');
INSERT INTO `gp_log` VALUES (51, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php4271.tmp', 5, '127.0.0.1', '2019-06-05 13:27:59');
INSERT INTO `gp_log` VALUES (52, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php5C8F.tmp', 5, '127.0.0.1', '2019-06-05 13:46:39');
INSERT INTO `gp_log` VALUES (53, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php96A1.tmp', 5, '127.0.0.1', '2019-06-05 13:53:28');
INSERT INTO `gp_log` VALUES (54, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php291E.tmp', 5, '127.0.0.1', '2019-06-05 13:54:05');
INSERT INTO `gp_log` VALUES (55, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\phpC233.tmp', 5, '127.0.0.1', '2019-06-05 13:54:44');
INSERT INTO `gp_log` VALUES (56, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php910.tmp', 5, '127.0.0.1', '2019-06-05 13:55:02');
INSERT INTO `gp_log` VALUES (57, 'student/report/add', 19, '提交开题报告[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php2442.tmp', 5, '127.0.0.1', '2019-06-05 14:31:12');
INSERT INTO `gp_log` VALUES (58, 'student/user/login', 19, '用户登录操作', 5, '127.0.0.1', '2019-06-06 02:53:56');
INSERT INTO `gp_log` VALUES (59, 'student/mission/add', 19, '提交任务书[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\phpF8EC.tmp', 5, '127.0.0.1', '2019-06-06 03:14:31');
INSERT INTO `gp_log` VALUES (60, 'student/translate/add', 19, '提交任务书[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php2E4F.tmp', 5, '127.0.0.1', '2019-06-06 04:38:51');
INSERT INTO `gp_log` VALUES (61, 'student/paper/add', 19, '提交任务书[1]C:\\Users\\yangjian\\AppData\\Local\\Temp\\php4D9.tmp', 5, '127.0.0.1', '2019-06-06 04:44:08');
INSERT INTO `gp_log` VALUES (62, 'teacher/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-06 06:38:32');
INSERT INTO `gp_log` VALUES (63, 'teacher/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-06 06:43:17');
INSERT INTO `gp_log` VALUES (64, 'teacher/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-06 06:44:18');
INSERT INTO `gp_log` VALUES (65, 'teacher/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-06 06:44:28');
INSERT INTO `gp_log` VALUES (66, 'teacher/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-08 05:04:41');
INSERT INTO `gp_log` VALUES (67, 'teacher/subject/add', 1, '提交课程题目[1]asdaws', 4, '127.0.0.1', '2019-06-08 05:18:13');
INSERT INTO `gp_log` VALUES (68, 'teacher/subject/add', 1, '提交课程题目[1]asdaws11', 4, '127.0.0.1', '2019-06-08 05:21:25');
INSERT INTO `gp_log` VALUES (69, 'teacher/subject/add', 1, '提交课程题目[1]123', 4, '127.0.0.1', '2019-06-08 05:29:47');
INSERT INTO `gp_log` VALUES (70, 'teacher/subject/add', 1, '提交课程题目[1]asdfw', 4, '127.0.0.1', '2019-06-08 05:29:55');
INSERT INTO `gp_log` VALUES (71, 'student/user/login', 1, '用户登录操作', 4, '127.0.0.1', '2019-06-08 07:40:26');
INSERT INTO `gp_log` VALUES (72, 'student/subject/add', 1, '提交课程题目[1]', 4, '127.0.0.1', '2019-06-08 07:43:58');
INSERT INTO `gp_log` VALUES (73, 'student/subject/add', 1, '选择课程题目[1]', 4, '127.0.0.1', '2019-06-08 07:45:02');

-- ----------------------------
-- Table structure for gp_mission
-- ----------------------------
DROP TABLE IF EXISTS `gp_mission`;
CREATE TABLE `gp_mission`  (
  `mis_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`mis_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_mission
-- ----------------------------
INSERT INTO `gp_mission` VALUES (1, 19, '毕业设计管理系统 - 副本 (4).docx', '/uploads/2019/student/201517030124/mission_1559791940.docx', 3, 'asdawsd', '2019-06-06 03:14:31');

-- ----------------------------
-- Table structure for gp_notice
-- ----------------------------
DROP TABLE IF EXISTS `gp_notice`;
CREATE TABLE `gp_notice`  (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`not_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gp_paper
-- ----------------------------
DROP TABLE IF EXISTS `gp_paper`;
CREATE TABLE `gp_paper`  (
  `pap_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sec_tea_id` int(11) NOT NULL,
  `sec_status` tinyint(4) NOT NULL,
  `sec_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`pap_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_paper
-- ----------------------------
INSERT INTO `gp_paper` VALUES (1, 19, '毕业设计管理系统.docx', '/uploads/2019/student/201517030124/paper_1559796248.docx', 5, 'awdafsdawd', 1, 6, '124easfaw', '2019-06-06 04:44:08');

-- ----------------------------
-- Table structure for gp_report
-- ----------------------------
DROP TABLE IF EXISTS `gp_report`;
CREATE TABLE `gp_report`  (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`rep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_report
-- ----------------------------
INSERT INTO `gp_report` VALUES (6, 19, '毕业设计管理系统-查重.docx', '/uploads/2019/student/201517030124/report_1559746473.docx', 2, 'hk', '2019-06-05 14:31:12');

-- ----------------------------
-- Table structure for gp_special
-- ----------------------------
DROP TABLE IF EXISTS `gp_special`;
CREATE TABLE `gp_special`  (
  `spe_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) NOT NULL COMMENT '学院id',
  `code` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业代码',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专业姓名',
  `time` datetime(0) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`spe_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_special
-- ----------------------------
INSERT INTO `gp_special` VALUES (1, 1, '017003', '网络工程', '2019-06-03 09:59:26');
INSERT INTO `gp_special` VALUES (2, 1, '017002', '软件工程', '2019-06-03 10:00:14');
INSERT INTO `gp_special` VALUES (3, 2, '016001', '机械工程', '2019-06-03 10:00:33');

-- ----------------------------
-- Table structure for gp_student
-- ----------------------------
DROP TABLE IF EXISTS `gp_student`;
CREATE TABLE `gp_student`  (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL COMMENT '专业id',
  `code` bigint(12) NOT NULL COMMENT '学生编号',
  `year` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `card_id` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '身份证号',
  `age` tinyint(4) NOT NULL COMMENT '年龄',
  `sex` tinyint(4) NOT NULL COMMENT '性别 1男 2女',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `salt` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加盐值',
  `status` tinyint(4) NOT NULL COMMENT '状态',
  `time` datetime(0) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`stu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_student
-- ----------------------------
INSERT INTO `gp_student` VALUES (1, 1, 1, 201517030101, '2015', '王状', '123456789987654321', 23, 1, 'wz@qq.com', 'eddf44ca84604c62d443baad177c03e7', 'oswp', 1, '2019-06-05 06:29:38');
INSERT INTO `gp_student` VALUES (19, 1, 1, 201517030124, '2015', '杨剑', '222406199702112212', 23, 1, '635446559@qq.com', '8085dcee5c038345cd34445f5031ca8e', 'vlh3', 1, '2019-06-05 06:43:24');
INSERT INTO `gp_student` VALUES (20, 2, 3, 201517030126, '2015', '郝帅', '123456654321789987', 23, 1, '123123123@qq.com', 'afd971c3de98f625c88c5dae392dd45f', 'niv4', 1, '2019-06-05 06:43:24');

-- ----------------------------
-- Table structure for gp_subject
-- ----------------------------
DROP TABLE IF EXISTS `gp_subject`;
CREATE TABLE `gp_subject`  (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` tinyint(4) NOT NULL,
  `source` tinyint(4) NOT NULL,
  `need` tinyint(4) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `technology` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `col_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '题目类型 1教师出题 2学生出题',
  `status` tinyint(4) NOT NULL COMMENT '审核',
  `check` tinyint(4) NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`sub_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_subject
-- ----------------------------
INSERT INTO `gp_subject` VALUES (1, 'asdaws', 1, 1, 1, '123', '123', 1, 1, 1, 19, 1, 2, 2, '2019-06-08 05:18:13');

-- ----------------------------
-- Table structure for gp_teacher
-- ----------------------------
DROP TABLE IF EXISTS `gp_teacher`;
CREATE TABLE `gp_teacher`  (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL COMMENT '专业id',
  `code` bigint(12) NOT NULL COMMENT '教室编号',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `card_id` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '性别 1男 2女',
  `age` tinyint(4) NOT NULL COMMENT '年龄',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `salt` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加盐值',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `status` tinyint(4) NOT NULL COMMENT '状态 1启用 2禁用',
  `time` datetime(0) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`tea_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_teacher
-- ----------------------------
INSERT INTO `gp_teacher` VALUES (1, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (2, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (3, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (5, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (6, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (7, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (8, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (9, 1, 1, 2015170301, '李红果', '123456789987654321', 1, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (10, 2, 3, 2015170311, '李红果', '123456789987654322', 2, 40, '23455d147a4b0d69bdd1d12845f67fb9', 'ejc9', 'lhg@bh.com1', 1, '2019-06-03 14:37:06');
INSERT INTO `gp_teacher` VALUES (22, 2, 3, 201617020102, '好像', '123456789009876543', 2, 12, 'f55dd21c496b161b13317f73c73bac9d', 'drui', '123@qq.csa', 1, '2019-06-05 04:47:25');

-- ----------------------------
-- Table structure for gp_translate
-- ----------------------------
DROP TABLE IF EXISTS `gp_translate`;
CREATE TABLE `gp_translate`  (
  `tra_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  PRIMARY KEY (`tra_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gp_translate
-- ----------------------------
INSERT INTO `gp_translate` VALUES (1, 19, '毕业设计管理系统 - 副本 (2).docx', '/uploads/2019/student/201517030124/translate_1559989693.docx', 4, 'awwdawd', '2019-06-06 04:38:51');

SET FOREIGN_KEY_CHECKS = 1;
