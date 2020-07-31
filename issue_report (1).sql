-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 06:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issue_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue_img`
--

CREATE TABLE `issue_img` (
  `img_id` int(11) NOT NULL,
  `is_id` int(11) NOT NULL,
  `file_n` varchar(255) NOT NULL,
  `file_code` varchar(255) NOT NULL,
  `delete_flag` varchar(1) NOT NULL,
  `date_deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_img`
--

INSERT INTO `issue_img` (`img_id`, `is_id`, `file_n`, `file_code`, `delete_flag`, `date_deleted`) VALUES
(61, 24, 'picture2.jpg', '8f203fc8bed1eca1b20f0206ae8b79b1.jpg', '1', '0000-00-00 00:00:00'),
(62, 24, 'picture1.jpg', '8e02972e2dab6c26dc4ff1ab6b7ba125.jpg', '1', '0000-00-00 00:00:00'),
(63, 24, 'madongsok.png', 'aa884a4d4d1f4bbbbdebfa0aa041d3e9.png', '0', '2020-07-31 08:28:31'),
(64, 25, 'picture1.jpg', 'c760dccca50802fb78de33b09586c924.jpg', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_issue`
--

CREATE TABLE `sys_issue` (
  `is_id` int(11) NOT NULL,
  `pj_id` int(11) NOT NULL,
  `plant` varchar(50) NOT NULL,
  `date_identified` datetime NOT NULL,
  `is_des` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `date_er` datetime NOT NULL,
  `esc_req` varchar(20) NOT NULL,
  `imp_sum` varchar(255) NOT NULL,
  `act_step` varchar(255) NOT NULL,
  `is_type` varchar(100) NOT NULL,
  `cur_st` varchar(100) NOT NULL,
  `final_rs` varchar(255) NOT NULL,
  `is_note` varchar(255) NOT NULL,
  `entered_by` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `delete_flag` varchar(1) NOT NULL,
  `date_deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_issue`
--

INSERT INTO `sys_issue` (`is_id`, `pj_id`, `plant`, `date_identified`, `is_des`, `priority`, `owner_id`, `date_er`, `esc_req`, `imp_sum`, `act_step`, `is_type`, `cur_st`, `final_rs`, `is_note`, `entered_by`, `date_created`, `date_updated`, `delete_flag`, `date_deleted`) VALUES
(17, 2, 'Phase 10', '2020-07-08 00:00:00', 'เกิดจากฝนตกหนักต่อเนื่องกันเป็นเวลานาน บางครั้งทำให้เกิดแผ่นดินถล่ม อาจมีสาเหตุจากพายุหมุนเขตร้อนลมมรสุมมีกำลังแรง มีกำลังแรง ร่องความกดอากาศต่ำมีกำลังแรง อากาศแปรปรวน น้ำทะเลหนุนแผ่นดินไหว เขื่อนพัง ทำให้เกิดอุทกภัยได้เสมอ', 'Critical', 2, '2020-07-24 00:00:00', 'No', '1. อันตรายและความเสียหายต่อชีวิต ทรัพย์สิน อาคาร บ้านเรือน โดยตรง เกิดน้ำท่วมในบ้านเมือง โรงงาน คลังพัสดุ โกดังสินค้า บ้านเรือนไม่แข็งแรง อาจถูกกระแสน้ำไหลเชี่ยวพังทลาย หรือคลื่นซัดลงไปทะเลไปได้ ผู้คน สัตว์พาหนะ สัตว์เลี้ยง อาจจมน้ำตาย หรือถูกพัดพาไปกับกร', '1. ติดตามสภาวะอากาศ ฟังคำเตือนจากกรมอุตุนิยมวิทยา\r\n\r\n2. ฝึกซ้อมการป้องกันภัยพิบัติ เตรียมพร้อมรับมือและวางแผนอพยพหากจำเป็น\r\n\r\n3. เตรียมน้ำดื่ม เครื่องอุปโภค บริโภค ไฟฉาย แบตเตอรี่ วิทยุกระเป๋าหิ้วติดตามข่าวสาร\r\n\r\n4. ซ่อมแซมอาคารให้แข็งแรง เตรียมป้องกันภัย', 'Informational', 'Open', 'รอการระบาย', 'นะจ๊ะ', 'Talerngsak', '2019-09-01 15:55:12', '2020-07-21 13:15:09', '1', '0000-00-00 00:00:00'),
(18, 2, 'Phase 10', '2020-07-15 00:00:00', 'หฟกหฟกหฟก', 'Critical', 1, '2020-07-24 00:00:00', 'No', 'หฟดหกดหดกหฟดฟดกหฟด', 'กฟหดฟหดหฟดหกฟดหกฟ', 'Informational', 'Closed', 'ดกดกดก', 'หกดหกดกหดกกหหกกหกหดกหก', 'Talerngsak', '2020-07-04 11:56:15', '2020-07-21 14:09:50', '1', '0000-00-00 00:00:00'),
(19, 1, 'Phase 8', '2020-07-02 00:00:00', 'ฟหกหฟกฟหกฟหก', 'High', 1, '2020-07-22 00:00:00', 'Yes', 'ฟห', 'หกฟหกฟหกฟ', 'System', 'Open', 'หกฟหกฟ', 'หกฟหกฟ', 'Talerngsak', '2020-06-06 14:13:53', '2020-07-21 14:13:53', '1', '0000-00-00 00:00:00'),
(20, 2, 'Phase 8', '2020-07-02 00:00:00', 'ฟหกหฟกฟหกฟหก', 'High', 1, '2020-07-22 00:00:00', 'Yes', 'ฟห', 'หกฟหกฟหกฟ', 'System', 'Open', 'หกฟหกฟ', 'หกฟหกฟ', 'Talerngsak', '2020-06-21 11:46:00', '2020-06-21 14:13:53', '1', '0000-00-00 00:00:00'),
(21, 1, 'Phase 8', '2020-07-02 00:00:00', 'ฟหกหฟกasdaaaaaaaaaaaaaa', 'High', 1, '2020-07-22 00:00:00', 'Yes', 'ฟห', 'หกฟหกฟหกฟ', 'System', 'Work In Progress', 'หกฟหกฟ', 'หกฟหกฟ', 'Talerngsak', '2020-06-21 14:13:53', '2020-07-21 14:13:53', '1', '0000-00-00 00:00:00'),
(22, 1, 'Phase 10', '2020-07-02 00:00:00', 'sassda', 'Critical', 1, '2020-07-08 00:00:00', 'Yes', 'sdasda', 'sdasdasda', 'Procedural', 'Open', 'sdsda', 'sdasdasda', 'Talerngsak', '2020-07-23 09:12:44', '2020-07-23 09:12:44', '1', '0000-00-00 00:00:00'),
(23, 1, 'Phase 10', '2020-07-18 00:00:00', 'TTTTTTTTTTTTTTTTTTTTTTTTTTTTT', 'High', 1, '2020-08-08 00:00:00', 'No', 'asd', 'sadsda', 'Procedural', 'Open', 'sasasa', 'sassdadsada', 'Talerngsak', '2020-06-30 09:14:22', '2020-07-30 09:14:22', '1', '0000-00-00 00:00:00'),
(24, 1, 'Phase 10', '2020-07-10 00:00:00', 'TT', 'Critical', 1, '2020-07-28 00:00:00', 'Yes', 'TT', 'TT', 'Informational', 'Open', 'TT', 'TT', 'Talerngsak', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00'),
(25, 1, 'Phase 10', '2020-07-09 00:00:00', 'asdad', 'High', 2, '2020-07-21 00:00:00', 'No', 'asd', 'asd', 'Procedural', 'Open', 'asd', 'asd', 'Talerngsak', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menus`
--

CREATE TABLE `sys_menus` (
  `m_id` varchar(255) NOT NULL,
  `mg_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `enable` varchar(255) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_menus`
--

INSERT INTO `sys_menus` (`m_id`, `mg_id`, `name`, `method`, `link`, `enable`, `order_no`, `date_created`) VALUES
('1', '3', 'Edit Profile', 'editprofile/manage', 'editprofile/manage', '1', '1', '20/3/2015 00:00:00'),
('15', '2', 'Rule', 'user/manage', 'user/rule', '1', '0', '20/3/2015 00:00:00'),
('2', '3', 'Change Password', 'changepassword/account', 'changepassword/account', '1', '2', '20/3/2015 00:00:00'),
('21', '4', 'Edit_Permission', 'permission/manage', 'permission/edit_permission', '0', '3', NULL),
('22', '12', 'Edit_Permission_Groups', 'permissiongroup/edit_pg', 'permissiongroup/edit_pg', '0', '4', NULL),
('23', '5', 'Rlue_Group', 'usergroup/rule_ug', 'usergroup/rule_ug', '0', '3', NULL),
('24', '5', 'Edit_Group', 'usergroup/edit_ug', 'usergroup/edit_ug', '0', '4', NULL),
('25', '2', 'Edit_User', 'user/edit_u', 'user/edit_u', '0', '4', NULL),
('29', '5', 'Add Usergroup', 'usergroup/add', 'usergroup/add', '1', '1', NULL),
('3', '4', 'Permission', 'permission/manage', 'permission/manage', '1', '2', '20/3/2015 00:00:00'),
('30', '4', 'Add Permission', 'permission/add', 'permission/add', '1', '1', NULL),
('31', '12', 'Add Permission Group', 'permissiongroup/add', 'permissiongroup/add', '1', '1', NULL),
('32', '7', 'Manage Issue', 'issue/manage', 'issue/manage', '1', '1', NULL),
('33', '6', 'Manage Project', 'projects/manage', 'projects/manage', '1', '7', NULL),
('34', '6', 'Add Projects', 'projects/add', 'projects/add', '1', '0', NULL),
('35', '7', 'Add Issue', 'issue/add', 'issue/add', '1', '0', NULL),
('36', '8', 'Manage Report', 'report/manage', 'report/manage', '1', '0', NULL),
('37', '9', 'ISSUE REPORT ', 'report/search', 'report/search', '1', '1', NULL),
('38', '9', 'ISSUE REPORT LIST', 'report/list', 'report/list', '1', '1', NULL),
('39', '6', 'Edit Projects', 'projects/edit', 'projects/edit', '1', '0', NULL),
('4', '12', 'Permission Group', 'permissiongroup/manage', 'permissiongroup/manage', '1', '2', '20/3/2015 00:00:00'),
('40', '7', 'Edit Issue', 'issue/edit', 'issue/edit', '1', '0', NULL),
('401', '7', 'View Issue', 'issue/view', 'issue/view', '1', '0', NULL),
('5', '2', 'Add User', 'user/add', 'user/add', '1', '1', '20/3/2015 00:00:00'),
('6', '2', 'Manage User', 'user/manage', 'user/manage', '1', '2', '20/3/2015 00:00:00'),
('7', '5', 'Manage Usergroup', 'usergroup/manage', 'usergroup/manage', '1', '2', '20/3/2015 00:00:00'),
('8', '1', 'Home', 'manage/index', 'manage/index', '1', '1', '20/3/2015 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_groups`
--

CREATE TABLE `sys_menu_groups` (
  `mg_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `icon_menu` varchar(50) DEFAULT NULL,
  `enable` varchar(1) DEFAULT NULL,
  `order_no` tinyint(4) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_menu_groups`
--

INSERT INTO `sys_menu_groups` (`mg_id`, `name`, `link`, `icon_menu`, `enable`, `order_no`, `date_created`) VALUES
(1, 'Main', '', 'fa-home', '1', 1, '2015-03-03 00:00:00'),
(2, 'Users', 'user/manage', 'fa-user', '1', 3, '2015-03-03 00:00:00'),
(3, 'Settings', '', 'fa-cog', '1', 2, '2015-03-03 00:00:00'),
(4, 'Permissions', 'permission/manage', 'fa-unlock-alt', '1', 5, '2015-03-20 00:00:00'),
(5, 'Groups', 'usergroup/manage', 'fa-group', '1', 4, '2015-03-20 00:00:00'),
(6, 'Projects', 'projects/manage', 'fa fa-check-square-o', '1', 7, NULL),
(7, 'Issue', 'issue/manage', 'fa fa-check-square-o', '1', 8, NULL),
(8, 'Report Graph', 'report/manage', ' fa-wrench\r\n', '1', 10, NULL),
(9, 'Report Issue', 'report/search', ' fa-wrench\r\n', '1', 9, NULL),
(12, 'Permissions Groups', 'permissiongroup/manage', ' fa-wrench\n', '1', 6, '2020-06-22 15:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `sys_owner`
--

CREATE TABLE `sys_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_owner`
--

INSERT INTO `sys_owner` (`owner_id`, `owner_name`) VALUES
(1, 'Tai Inwza'),
(2, 'TaiSoul Inwza');

-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

CREATE TABLE `sys_permissions` (
  `sp_id` int(11) NOT NULL,
  `spg_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `controller` varchar(30) DEFAULT NULL,
  `enable` varchar(1) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_flag` varchar(1) DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_permissions`
--

INSERT INTO `sys_permissions` (`sp_id`, `spg_id`, `name`, `controller`, `enable`, `date_created`, `date_updated`, `delete_flag`, `date_deleted`) VALUES
(1, 1, 'EDIT PROFILE', 'editprofile/manage', '1', '2015-03-03 00:00:00', '2020-04-29 11:10:27', '1', '2020-01-17 16:06:55'),
(2, 1, 'CHANGE PASSWORD PROFILE', 'changepassword/account', '1', '2015-03-03 00:00:00', '2020-04-10 10:31:07', '1', '2020-01-17 16:06:55'),
(3, 2, 'ADD USER', 'user/add', '1', '2015-03-03 00:00:00', '2020-01-17 10:02:34', '1', '2020-01-17 09:28:06'),
(4, 2, 'EDIT USER', 'user/edit_u', '1', '2015-03-03 00:00:00', '2020-04-10 10:31:08', '1', NULL),
(5, 2, 'DELETE USER', 'user/deleteuser', '1', '2015-03-03 00:00:00', '2020-01-17 10:02:34', '1', NULL),
(6, 4, 'ADD PERMISSION', 'permission/add', '1', '2015-03-20 00:00:00', NULL, '1', NULL),
(7, 4, 'EDIT PERMISSION', 'permission/edit_permission', '1', '2015-03-20 00:00:00', '2020-04-29 16:01:10', '1', NULL),
(8, 4, 'DELETE PERMISSION', 'permission/deletepermission', '1', '2015-03-20 00:00:00', NULL, '1', NULL),
(9, 3, 'ADD USER GROUP', 'usergroup/insert', '1', '2015-03-20 00:00:00', '2020-04-10 13:07:06', '1', NULL),
(10, 3, 'EDIT USER GROUP', 'usergroup/edit_ug', '1', '2015-03-20 00:00:00', '2020-06-02 10:39:40', '1', NULL),
(11, 3, 'DELETE USER GROUP', 'usergroup/deletegroup', '1', '2015-03-20 00:00:00', NULL, '1', '2020-05-26 13:22:27'),
(12, 5, 'ADD PERMISSION GROUP', 'permissiongroup/add', '1', '2015-03-20 00:00:00', '2020-06-02 11:51:02', '1', NULL),
(13, 5, 'EDIT PERMISSION GROUP', 'permissiongroup/edit_pg', '1', '2015-03-20 00:00:00', NULL, '1', NULL),
(14, 5, 'DELETE PERMISSION GROUP', 'permissiongroup/delete_pg', '1', '2015-03-20 00:00:00', '2020-04-29 13:17:43', '1', NULL),
(15, 5, 'MANAGE PERMISSION GROUP', 'permissiongroup/manage', '1', '2015-03-20 00:00:00', '2020-06-30 13:04:48', '1', NULL),
(16, 4, 'MANAGE PERMISSION', 'permission/manage', '1', '2015-03-20 00:00:00', '2020-07-03 08:44:14', '1', NULL),
(17, 2, 'MANAGE USER', 'user/manage', '1', '2015-03-25 00:00:00', '2020-01-17 10:02:34', '1', NULL),
(18, 3, 'MANAGE USER GROUP', 'usergroup/manage', '1', '2015-03-25 00:00:00', '2020-04-29 11:11:23', '1', NULL),
(19, 4, 'EDIT USER RULE', 'user/rule', '1', '2015-03-25 00:00:00', '2020-01-17 10:02:34', '1', NULL),
(20, 2, 'ENABLE USER', 'user/enable', '1', '2017-02-01 00:00:00', '2020-01-17 10:02:34', '1', NULL),
(21, 2, 'DISABLE USER', 'user/disable', '1', '2017-02-01 00:00:00', '2020-01-17 10:02:34', '1', NULL),
(22, 5, 'EDIT USERGROUP RULE', 'usergroup/rule_ug', '1', '2020-06-02 11:03:48', NULL, '1', NULL),
(23, 3, 'DISABLE USERGROUP', 'usergroup/disable', '1', '2020-06-02 11:22:59', NULL, '1', NULL),
(24, 3, 'ENABLE USERGROUP', 'usergroup/enable', '1', '2020-06-02 11:23:41', NULL, '1', NULL),
(28, 4, 'DISABLE PERMISSION', 'permission/disable', '1', '2020-06-02 11:36:27', NULL, '1', NULL),
(29, 4, 'ENABLE PERMISSION', 'permission/enable', '1', '2020-06-02 11:36:47', NULL, '1', NULL),
(31, 5, 'DISABLE PERMISSIONGROUP', 'permissiongroup/disable', '1', '2020-06-02 11:46:29', NULL, '1', NULL),
(32, 5, 'ENABLE PERMISSIONGROUP', 'permissiongroup/enable', '1', '2020-06-02 11:47:03', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_permission_groups`
--

CREATE TABLE `sys_permission_groups` (
  `spg_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `enable` varchar(1) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `delete_flag` varchar(1) DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_permission_groups`
--

INSERT INTO `sys_permission_groups` (`spg_id`, `name`, `enable`, `date_created`, `delete_flag`, `date_deleted`, `date_updated`) VALUES
(1, 'MANAGE PROFILE', '1', '2020-01-18 10:25:27', '1', '2020-01-17 16:06:55', '2020-06-02 12:05:14'),
(2, 'MANAGE USERS', '1', '2020-01-17 10:02:34', '1', NULL, NULL),
(3, 'MANAGE USER GROUPS', '1', '2015-03-03 00:00:00', '1', NULL, '2020-07-03 08:27:57'),
(4, 'MANAGE PERMISSION', '1', '2015-03-25 00:00:00', '1', NULL, '2020-05-12 14:35:03'),
(5, 'MANAGE PERMISSION GROUPS', '1', '2015-03-25 00:00:00', '1', NULL, '2020-06-02 12:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `sys_projects`
--

CREATE TABLE `sys_projects` (
  `pj_id` int(11) NOT NULL,
  `pj_name` varchar(200) NOT NULL,
  `pj_des` varchar(300) NOT NULL,
  `enable` varchar(255) NOT NULL,
  `delete_flag` varchar(1) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_projects`
--

INSERT INTO `sys_projects` (`pj_id`, `pj_name`, `pj_des`, `enable`, `delete_flag`, `date_created`, `date_updated`, `date_deleted`) VALUES
(1, 'น้ำท่วม', 'รอการระบาย', '1', '1', '2020-07-21 09:50:31', '2020-07-23 14:43:33', '2020-07-23 14:41:25'),
(2, 'ประชาชนชุมนุม', 'เป็นภัยต่อความมั่นคงระดับชาติ', '1', '1', '2020-07-21 09:51:11', '2020-07-21 09:51:11', '2020-07-23 14:41:29'),
(6, 'Project01', 'รอการระบาย', '1', '1', '2020-07-31 11:32:57', '2020-07-31 11:32:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `su_id` int(11) NOT NULL,
  `sug_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `enable` varchar(1) DEFAULT NULL,
  `last_access` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `delete_flag` varchar(1) DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`su_id`, `sug_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `email`, `enable`, `last_access`, `date_created`, `date_updated`, `delete_flag`, `date_deleted`) VALUES
(1, 1, 'sadmin', 'dGVhbWludw==', 'Talerngsak', 'Klangsatorn', 'male', 'talerngsak@tbkk.co.th', '1', '2019-01-23 09:16:00', '2019-01-23 09:16:00', '2020-07-16 09:07:08', '1', NULL),
(2, 2, 'talerngsak', 'YWExMjM0NTY=', 'Talerngsak', 'Klangsatorn', 'male', 'talerngsak@tbkk.co.th', '1', NULL, '2020-02-05 15:20:48', '2020-04-09 16:52:29', '1', NULL),
(3, 3, 'samart', 'YWExMjM0NTY=', 'Samart', 'Thanomchart', 'male', 'samart@tbkk.co.th', '1', NULL, '2020-02-05 15:21:44', '2020-07-21 08:07:10', '1', '2020-03-03 13:34:16'),
(4, 3, 'ABC', 'YWExMjM0NTY=', 'Aksarapak', 'Daotaisong', 'female', 'aksarapak@tbkk.co.th', '1', NULL, '2020-02-05 15:22:19', '2020-07-15 13:14:11', '1', '2020-06-29 09:44:54'),
(5, 3, 'sawanant', 'YWExMjM0NTY=', 'Sawanant', 'Siritipchintana', 'male', 'sawanant@tbkk.co.th', '1', NULL, '2020-02-05 15:23:29', '2020-07-03 08:27:39', '1', NULL),
(6, 1, 'TEST', 'YWExMjM0NTY=', 'TEST', 'TEST', 'female', 'TEST@tbkk.co.th', '1', NULL, '2020-02-05 15:24:13', '2020-05-27 11:39:30', '1', NULL),
(7, 3, 'theerasak', 'YWExMjM0NTY=', 'Theerasak', 'Samranklang	', 'male', 'theerasak@tbkk.co.th', '1', NULL, '2020-02-05 15:38:42', '2020-06-02 10:39:33', '1', NULL),
(8, 3, 'pachara', 'YWExMjM0NTY=', 'Pachara', 'Manpian', 'male', 'pachara@tbkk.co.th', '1', NULL, '2020-02-05 15:39:50', '2020-02-05 15:39:50', '1', NULL),
(9, 4, 'Pitak12345678910', 'YWExMjM0NTY=', 'Pitak', 'Puanmano', 'male', 'pitak@tbkk.co.th', '1', NULL, '2020-02-05 15:42:44', '2020-06-02 10:27:18', '1', NULL),
(10, 3, 'pittaya', 'YWExMjM0NTY=', 'Pittaya', 'Thammachoto', 'male', 'pittaya@tbkk.co.th', '1', NULL, '2020-02-05 15:43:20', '2020-07-01 11:45:30', '1', NULL),
(11, 3, 'ruangthong', 'YWExMjM0NTY=', 'Ruangthong', 'Thongyu', 'female', 'ruangthong@tbkk.co.th', '1', NULL, '2020-02-05 15:44:18', '2020-02-05 15:44:18', '1', NULL),
(12, 3, 'takashi', 'YWExMjM0NTY=', 'Takashi', 'Kageyama', 'male', 'kageyama@tbkk.co.th', '1', NULL, '2020-02-05 15:45:02', '2020-02-05 15:45:02', '1', '2020-05-12 10:37:54'),
(13, 3, 'okada1', 'YWExMjM0NTY=', 'Okada', 'Masayoshi', 'male', 'okada@tbkk.co.th', '1', NULL, '2020-02-05 15:46:07', '2020-07-15 10:49:42', '1', '2020-07-15 11:51:14'),
(14, 2, 'chanin', 'Y2hhbmlu', 'chanin', 'chaisatain', 'male', 'Surin@gmail.comadmin', '1', NULL, '2020-02-07 14:31:00', '2020-02-07 14:31:00', '1', '2020-06-29 09:47:17'),
(15, 2, 'mikmik', 'bWlrbWlr', 'kookmik', 'Surin', 'male', 'Surin@gmail.com', '1', NULL, '2020-02-07 14:39:40', '2020-02-07 14:39:40', '1', '2020-05-12 10:37:14'),
(16, 2, 'test01', 'dGVzdDAx', 'ronaldo', 'inw', 'male', 'Surin@gmail.com', '1', NULL, '2020-03-03 10:26:09', '2020-04-09 16:52:27', '1', '2020-04-29 10:38:35'),
(18, 2, 'hahaha', 'aGFoYWhhaGFoYQ==', 'hatari', 'adfasdnf', 'male', 'Surssssin@gmail.com', '1', NULL, '2020-03-03 10:28:13', '2020-07-15 13:13:59', '1', '2020-05-12 10:37:23'),
(19, 2, 'sfasdfasdf', 'YXNkZmFzZGY=', 'asdfasdf', 'adfasdf', 'female', 'Surin@gmail.comadmin', '1', NULL, '2020-03-03 10:48:27', '2020-03-03 10:48:27', '1', '2020-06-29 09:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users_groups_permissions`
--

CREATE TABLE `sys_users_groups_permissions` (
  `sugp_id` int(11) NOT NULL,
  `sug_id` int(11) DEFAULT NULL,
  `spg_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_users_groups_permissions`
--

INSERT INTO `sys_users_groups_permissions` (`sugp_id`, `sug_id`, `spg_id`, `date_created`) VALUES
(1071, 6, 1, '2020-05-27 08:49:15'),
(1072, 6, 2, '2020-05-27 08:49:15'),
(1073, 6, 3, '2020-05-27 08:49:15'),
(1074, 6, 4, '2020-05-27 08:49:15'),
(1075, 6, 5, '2020-05-27 08:49:15'),
(1076, 6, 6, '2020-05-27 08:49:15'),
(1082, 0, 1, '2020-06-01 13:23:14'),
(1083, 0, 2, '2020-06-01 13:23:14'),
(1086, 4, 2, '2020-06-01 13:31:34'),
(1185, 1, 1, '2020-07-01 12:03:15'),
(1186, 1, 2, '2020-07-01 12:03:15'),
(1187, 1, 3, '2020-07-01 12:03:15'),
(1188, 1, 4, '2020-07-01 12:03:15'),
(1189, 1, 5, '2020-07-01 12:03:15'),
(1190, 1, 9, '2020-07-01 12:03:15'),
(1191, 1, 10, '2020-07-01 12:03:15'),
(1192, 1, 11, '2020-07-01 12:03:15'),
(1193, 1, 12, '2020-07-01 12:03:15'),
(1210, 2, 1, '2020-07-07 16:37:53'),
(1211, 2, 2, '2020-07-07 16:37:53'),
(1212, 2, 3, '2020-07-07 16:37:53'),
(1213, 2, 4, '2020-07-07 16:37:53'),
(1214, 2, 5, '2020-07-07 16:37:53'),
(1215, 2, 9, '2020-07-07 16:37:53'),
(1216, 2, 10, '2020-07-07 16:37:53'),
(1217, 2, 11, '2020-07-07 16:37:53'),
(1218, 2, 12, '2020-07-07 16:37:53'),
(1224, 3, 1, '2020-07-16 13:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users_permissions`
--

CREATE TABLE `sys_users_permissions` (
  `sup_id` bigint(20) NOT NULL,
  `su_id` int(11) DEFAULT NULL,
  `sp_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_users_permissions`
--

INSERT INTO `sys_users_permissions` (`sup_id`, `su_id`, `sp_id`, `date_created`) VALUES
(95, 14, 1, '2020-04-29 16:10:10'),
(96, 14, 4, '2020-04-29 16:10:10'),
(170, 7, 1, '2020-06-02 09:58:24'),
(1360, 1, 1, '2020-07-07 15:54:01'),
(1361, 1, 2, '2020-07-07 15:54:01'),
(1362, 1, 3, '2020-07-07 15:54:01'),
(1363, 1, 4, '2020-07-07 15:54:01'),
(1364, 1, 5, '2020-07-07 15:54:01'),
(1365, 1, 6, '2020-07-07 15:54:01'),
(1366, 1, 7, '2020-07-07 15:54:01'),
(1367, 1, 8, '2020-07-07 15:54:01'),
(1368, 1, 9, '2020-07-07 15:54:01'),
(1369, 1, 10, '2020-07-07 15:54:01'),
(1370, 1, 11, '2020-07-07 15:54:01'),
(1371, 1, 12, '2020-07-07 15:54:01'),
(1372, 1, 13, '2020-07-07 15:54:01'),
(1373, 1, 14, '2020-07-07 15:54:01'),
(1374, 1, 15, '2020-07-07 15:54:01'),
(1375, 1, 16, '2020-07-07 15:54:01'),
(1376, 1, 17, '2020-07-07 15:54:01'),
(1377, 1, 18, '2020-07-07 15:54:01'),
(1378, 1, 19, '2020-07-07 15:54:01'),
(1379, 1, 20, '2020-07-07 15:54:01'),
(1380, 1, 21, '2020-07-07 15:54:01'),
(1381, 1, 22, '2020-07-07 15:54:01'),
(1382, 1, 23, '2020-07-07 15:54:01'),
(1383, 1, 24, '2020-07-07 15:54:01'),
(1384, 1, 28, '2020-07-07 15:54:01'),
(1385, 1, 29, '2020-07-07 15:54:01'),
(1386, 1, 31, '2020-07-07 15:54:01'),
(1387, 1, 32, '2020-07-07 15:54:01'),
(1388, 1, 33, '2020-07-07 15:54:01'),
(1389, 1, 34, '2020-07-07 15:54:01'),
(1390, 1, 35, '2020-07-07 15:54:01'),
(1391, 1, 36, '2020-07-07 15:54:01'),
(1392, 1, 37, '2020-07-07 15:54:01'),
(1393, 1, 38, '2020-07-07 15:54:01'),
(1394, 1, 39, '2020-07-07 15:54:01'),
(1395, 1, 43, '2020-07-07 15:54:01'),
(1396, 1, 44, '2020-07-07 15:54:01'),
(1397, 1, 45, '2020-07-07 15:54:01'),
(1398, 1, 46, '2020-07-07 15:54:01'),
(1399, 1, 47, '2020-07-07 15:54:01'),
(1400, 1, 48, '2020-07-07 15:54:01'),
(1401, 1, 50, '2020-07-07 15:54:01'),
(1402, 1, 51, '2020-07-07 15:54:01'),
(1403, 1, 52, '2020-07-07 15:54:01'),
(1404, 1, 53, '2020-07-07 15:54:01'),
(1405, 1, 54, '2020-07-07 15:54:01'),
(1406, 1, 55, '2020-07-07 15:54:01'),
(1407, 1, 56, '2020-07-07 15:54:01'),
(1408, 1, 57, '2020-07-07 15:54:01'),
(1409, 1, 58, '2020-07-07 15:54:01'),
(1410, 1, 59, '2020-07-07 15:54:01'),
(1411, 1, 60, '2020-07-07 15:54:01'),
(1412, 1, 61, '2020-07-07 15:54:01'),
(1413, 1, 62, '2020-07-07 15:54:01'),
(1414, 1, 63, '2020-07-07 15:54:01'),
(1415, 1, 64, '2020-07-07 15:54:01'),
(1416, 1, 65, '2020-07-07 15:54:01'),
(1417, 1, 66, '2020-07-07 15:54:01'),
(1418, 1, 67, '2020-07-07 15:54:01'),
(1419, 1, 68, '2020-07-07 15:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_groups`
--

CREATE TABLE `sys_user_groups` (
  `sug_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `enable` varchar(1) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `delete_flag` varchar(1) DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_user_groups`
--

INSERT INTO `sys_user_groups` (`sug_id`, `name`, `enable`, `date_created`, `delete_flag`, `date_deleted`, `date_updated`) VALUES
(1, 'SUPER ADMIN', '1', '2020-01-18 08:34:36', '1', NULL, '2020-06-01 13:17:07'),
(2, 'ADMIN', '1', '2020-01-18 08:42:35', '1', NULL, NULL),
(3, 'MEMBER', '1', '2020-01-17 15:59:56', '1', NULL, '2020-07-03 08:27:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issue_img`
--
ALTER TABLE `issue_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `sys_issue`
--
ALTER TABLE `sys_issue`
  ADD PRIMARY KEY (`is_id`);

--
-- Indexes for table `sys_menus`
--
ALTER TABLE `sys_menus`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `sys_menu_groups`
--
ALTER TABLE `sys_menu_groups`
  ADD PRIMARY KEY (`mg_id`);

--
-- Indexes for table `sys_owner`
--
ALTER TABLE `sys_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `sys_permission_groups`
--
ALTER TABLE `sys_permission_groups`
  ADD PRIMARY KEY (`spg_id`);

--
-- Indexes for table `sys_projects`
--
ALTER TABLE `sys_projects`
  ADD PRIMARY KEY (`pj_id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `sys_users_groups_permissions`
--
ALTER TABLE `sys_users_groups_permissions`
  ADD PRIMARY KEY (`sugp_id`);

--
-- Indexes for table `sys_users_permissions`
--
ALTER TABLE `sys_users_permissions`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `sys_user_groups`
--
ALTER TABLE `sys_user_groups`
  ADD PRIMARY KEY (`sug_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue_img`
--
ALTER TABLE `issue_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sys_issue`
--
ALTER TABLE `sys_issue`
  MODIFY `is_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sys_owner`
--
ALTER TABLE `sys_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sys_permission_groups`
--
ALTER TABLE `sys_permission_groups`
  MODIFY `spg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sys_projects`
--
ALTER TABLE `sys_projects`
  MODIFY `pj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sys_users_groups_permissions`
--
ALTER TABLE `sys_users_groups_permissions`
  MODIFY `sugp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1225;

--
-- AUTO_INCREMENT for table `sys_users_permissions`
--
ALTER TABLE `sys_users_permissions`
  MODIFY `sup_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1426;

--
-- AUTO_INCREMENT for table `sys_user_groups`
--
ALTER TABLE `sys_user_groups`
  MODIFY `sug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
