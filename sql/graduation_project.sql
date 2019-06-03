-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-06-03 12:29:04
-- 服务器版本： 5.7.25
-- PHP 版本： 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `graduation_project`
--

-- --------------------------------------------------------

--
-- 表的结构 `gp_admin`
--

CREATE TABLE `gp_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `realname` varchar(32) NOT NULL COMMENT '姓名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `salt` char(4) NOT NULL COMMENT '加盐值',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `type` tinyint(4) NOT NULL COMMENT '角色 1学校 2学院 3专业',
  `type_id` int(11) NOT NULL COMMENT '角色对应单位id',
  `status` tinyint(4) NOT NULL COMMENT '状态 1启用 2禁用',
  `time` datetime NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_ask`
--

CREATE TABLE `gp_ask` (
  `ask_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_college`
--

CREATE TABLE `gp_college` (
  `col_id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL COMMENT '学院代码',
  `name` varchar(30) NOT NULL COMMENT '学院名称',
  `time` datetime NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_log`
--

CREATE TABLE `gp_log` (
  `log_id` int(11) NOT NULL,
  `func` varchar(50) NOT NULL,
  `actor` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_mission`
--

CREATE TABLE `gp_mission` (
  `mis_id` int(11) NOT NULL,
  `stuid` int(11) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_notice`
--

CREATE TABLE `gp_notice` (
  `not_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `type_id` int(11) NOT NULL,
  `rec_type` tinyint(4) NOT NULL COMMENT '通知接收对象',
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_paper`
--

CREATE TABLE `gp_paper` (
  `pap_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `sec_tea_id` int(11) NOT NULL,
  `sec_status` tinyint(4) NOT NULL,
  `sec_remark` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_report`
--

CREATE TABLE `gp_report` (
  `rep_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_special`
--

CREATE TABLE `gp_special` (
  `spe_id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL COMMENT '学院id',
  `code` varchar(6) NOT NULL COMMENT '专业代码',
  `name` varchar(30) NOT NULL COMMENT '专业姓名',
  `time` datetime NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_student`
--

CREATE TABLE `gp_student` (
  `stu_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL COMMENT '专业id',
  `code` bigint(12) NOT NULL COMMENT '学生编号',
  `year` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT '姓名',
  `card_id` varchar(18) NOT NULL COMMENT '身份证号',
  `age` tinyint(4) NOT NULL COMMENT '年龄',
  `sex` tinyint(4) NOT NULL COMMENT '性别 1男 2女',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `salt` char(4) NOT NULL COMMENT '加盐值',
  `status` tinyint(4) NOT NULL COMMENT '状态',
  `time` datetime NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_subject`
--

CREATE TABLE `gp_subject` (
  `sub_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '题目类型 1教师出题 2学生出题',
  `status` tinyint(4) NOT NULL COMMENT '审核',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_teacher`
--

CREATE TABLE `gp_teacher` (
  `tea_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL COMMENT '专业id',
  `code` bigint(12) NOT NULL COMMENT '教室编号',
  `name` varchar(30) NOT NULL COMMENT '姓名',
  `card_id` varchar(18) NOT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '性别 1男 2女',
  `age` tinyint(4) NOT NULL COMMENT '年龄',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `salt` char(4) NOT NULL COMMENT '加盐值',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `status` tinyint(4) NOT NULL COMMENT '状态 1启用 2禁用',
  `time` datetime NOT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gp_translate`
--

CREATE TABLE `gp_translate` (
  `tra_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `gp_admin`
--
ALTER TABLE `gp_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `gp_ask`
--
ALTER TABLE `gp_ask`
  ADD PRIMARY KEY (`ask_id`);

--
-- 表的索引 `gp_college`
--
ALTER TABLE `gp_college`
  ADD PRIMARY KEY (`col_id`);

--
-- 表的索引 `gp_log`
--
ALTER TABLE `gp_log`
  ADD PRIMARY KEY (`log_id`);

--
-- 表的索引 `gp_mission`
--
ALTER TABLE `gp_mission`
  ADD PRIMARY KEY (`mis_id`);

--
-- 表的索引 `gp_notice`
--
ALTER TABLE `gp_notice`
  ADD PRIMARY KEY (`not_id`);

--
-- 表的索引 `gp_paper`
--
ALTER TABLE `gp_paper`
  ADD PRIMARY KEY (`pap_id`);

--
-- 表的索引 `gp_special`
--
ALTER TABLE `gp_special`
  ADD PRIMARY KEY (`spe_id`);

--
-- 表的索引 `gp_student`
--
ALTER TABLE `gp_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- 表的索引 `gp_subject`
--
ALTER TABLE `gp_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- 表的索引 `gp_teacher`
--
ALTER TABLE `gp_teacher`
  ADD PRIMARY KEY (`tea_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `gp_admin`
--
ALTER TABLE `gp_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_ask`
--
ALTER TABLE `gp_ask`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_college`
--
ALTER TABLE `gp_college`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_log`
--
ALTER TABLE `gp_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_mission`
--
ALTER TABLE `gp_mission`
  MODIFY `mis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_notice`
--
ALTER TABLE `gp_notice`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_paper`
--
ALTER TABLE `gp_paper`
  MODIFY `pap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_special`
--
ALTER TABLE `gp_special`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_student`
--
ALTER TABLE `gp_student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_subject`
--
ALTER TABLE `gp_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `gp_teacher`
--
ALTER TABLE `gp_teacher`
  MODIFY `tea_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
