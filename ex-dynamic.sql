-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 09:40 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex-dynamic`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

CREATE TABLE `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `optimistic_lock` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('27f1d112bfc740fe0bba61c87a731a75', 1, 1, 1692608290),
('741918ad933afdb9da0f7c95bdddb273', 3, 1, 1680165242),
('NCR-2303/?', 3, 1, 1680165242),
('NCR-2308/?', 1, 1, 1692608290);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(200) DEFAULT NULL COMMENT 'หน่วยงาน',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `details`, `color`) VALUES
(1, 'QC', 'ควบคุมคุณภาพ', '#0000ff'),
(2, 'PD', 'ฝ่ายผลิต', '#00ff00'),
(3, 'PC', 'จัดซื้อ', '#990000'),
(4, 'GM', 'ผู้จัดการ', '#9900ff'),
(5, 'SA', 'ฝ่ายขาย', '#ff9900'),
(6, 'WH', 'คลังสินค้า', '#F4D143'),
(7, 'QMR', 'ประกันคุณภาพ', '#4a86e8'),
(8, 'RD', 'วิจัยและพัฒนา', '#a4c2f4'),
(9, 'HR', 'บุคคล', '#d5a6bd'),
(10, 'IT', 'ไอที', '#ea9999'),
(11, 'PN', 'วางแผน', '#a2c4c9'),
(12, 'AC', 'วิศวกรรม', '#a64d79'),
(13, 'AC', 'บัญชี', '#00ffff');

-- --------------------------------------------------------

--
-- Table structure for table `ncr`
--

CREATE TABLE `ncr` (
  `id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL COMMENT 'เลข fk กับ upload ใช้กับ upload ajax',
  `event_name` varchar(255) DEFAULT NULL COMMENT 'เลขที่ NCR',
  `detail` text COMMENT 'รายละเอียด',
  `start_date` datetime DEFAULT NULL COMMENT 'วันที่เริ่ม',
  `end_date` datetime DEFAULT NULL COMMENT 'วันที่เสร็จ',
  `location` varchar(255) DEFAULT NULL COMMENT 'สถานที่',
  `customer_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `customer_mobile_phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทร',
  `province_id` int(11) DEFAULT NULL,
  `from_department` varchar(200) DEFAULT NULL COMMENT 'หน่วยงานที่แจ้ง',
  `to_department` varchar(200) DEFAULT NULL COMMENT 'ถึงหน่วยงาน',
  `problem` varchar(200) DEFAULT NULL COMMENT 'กระบวนการที่พบปัญหา',
  `lot` varchar(100) DEFAULT NULL COMMENT 'ล็อตที่',
  `production_date` varchar(100) DEFAULT NULL COMMENT 'วันที่ผลิต',
  `product_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `notify_by` varchar(200) DEFAULT NULL COMMENT 'ผู้รายงาน',
  `proplem_date` varchar(100) DEFAULT NULL COMMENT 'วันที่พบปัญหา',
  `recheck` text COMMENT 'การดำเนินการเบื้องต้น',
  `created_at` int(11) DEFAULT NULL COMMENT 'วันที่แจ้ง',
  `updated_at` int(11) DEFAULT NULL COMMENT 'ปรับปรุงล่าสุด',
  `status` int(11) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncr`
--

INSERT INTO `ncr` (`id`, `ref`, `event_name`, `detail`, `start_date`, `end_date`, `location`, `customer_name`, `customer_mobile_phone`, `province_id`, `from_department`, `to_department`, `problem`, `lot`, `production_date`, `product_name`, `notify_by`, `proplem_date`, `recheck`, `created_at`, `updated_at`, `status`) VALUES
(1, 'sfNwR407iC-x3izP6rGeWj', 'NCR-2303/01', 'ทดสอบการใช้งาน', NULL, NULL, NULL, 'John Doe', NULL, NULL, '1', '2', '4,5', '071/23', '2023-03-23', 'organic FT soy Sauce 200 ml', 'ประกายวรรณ เทพมณี', '2023-03-30', 'รีเช็ค', 1680160723, 1680165622, 3),
(3, '6Ag-g1NgvPkgHLbsDVvZZ1', 'NCR-2303/03', '', NULL, NULL, NULL, '', NULL, NULL, '3', '2,4', '3', '12522/55', '2023-03-30', 'ทดสอบ', '', '2023-03-30', '', 1680165242, 1680224855, 1),
(4, '4ekSu9HJG_A-x_jVOTCC_J', 'NCR-2308/01', 'ฟกฟหกหฟ', NULL, NULL, NULL, 'ฟหกฟหกฟกห', NULL, NULL, '11', '1', '1,2,3,4,5', 'ฟหกฟหกฟหก', '2023-08-24', 'หกฟหกฟหกฟ', 'ฟหกฟหก', '2023-08-23', 'ฟหกฟหก', 1692608290, 1692609611, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ncr_status`
--

CREATE TABLE `ncr_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(200) DEFAULT NULL COMMENT 'สถานะ',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(20) DEFAULT NULL COMMENT 'สี'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncr_status`
--

INSERT INTO `ncr_status` (`id`, `status_name`, `details`, `color`) VALUES
(1, 'New', 'แจ้ง', '#DF2E38'),
(2, 'In Progress', 'ดำเนินการ', '#E7B10A'),
(3, 'Success', 'เสร็จ', '#367E18'),
(4, 'Cancel', 'ยกเลิก', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `po_no`, `description`) VALUES
(1, 55, '55'),
(2, 222, '2222');

-- --------------------------------------------------------

--
-- Table structure for table `po_item`
--

CREATE TABLE `po_item` (
  `id` int(11) NOT NULL,
  `po_item_no` varchar(10) NOT NULL,
  `quantity` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_item`
--

INSERT INTO `po_item` (`id`, `po_item_no`, `quantity`, `po_id`) VALUES
(1, 'qqq', 1, 1),
(2, '2', 2, 2),
(3, '22', 22, 2),
(4, '222', 222, 2);

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `problem_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'กระบวนการที่พบปัญหา',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(20) DEFAULT NULL COMMENT 'สี'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problem_id`, `name`, `details`, `color`) VALUES
(1, 'สินค้านำเข้า', 'Incoming', NULL),
(2, 'กระบวนการผลิต', 'Inprocess', NULL),
(3, 'สินค้าสำเร็จรูป', 'Finish goods', NULL),
(4, 'เคลม', 'Claim', NULL),
(5, 'สินค้าส่งออก', 'Outgoing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `ref`, `file_name`, `real_filename`, `create_date`, `type`) VALUES
(1, 'sfNwR407iC-x3izP6rGeWj', '200-ml.PCG-003.jpg', '8ec1b819e368e73637dc8682e7c756d9.jpg', '2023-03-30 07:18:43', NULL),
(2, 'sfNwR407iC-x3izP6rGeWj', '29-3-2566 10-52-12.png', '421e9897043fa6c53dcf7af8ee3f3d11.png', '2023-03-30 07:18:57', NULL),
(18, '6Ag-g1NgvPkgHLbsDVvZZ1', '300-ml.PCG-010.jpg', 'c45692b714be96659d11f0a9204f7995.jpg', '2023-03-31 01:00:24', NULL),
(19, '6Ag-g1NgvPkgHLbsDVvZZ1', '700-ml.PCG-005.jpg', 'c2d2f44be18063a1b0fcbb05a4ae7025.jpg', '2023-03-31 01:00:24', NULL),
(20, '6Ag-g1NgvPkgHLbsDVvZZ1', '1000LPCP-002.jpg', '4c15d023a463dce995e9d3e6c4fa9b7d.jpg', '2023-03-31 01:00:24', NULL),
(22, '6Ag-g1NgvPkgHLbsDVvZZ1', 'A0051.jpg', 'ec80eabf138c4d978faf1816997a61d3.jpg', '2023-03-31 01:00:24', NULL),
(23, '6Ag-g1NgvPkgHLbsDVvZZ1', 'A0101.jpg', 'ae871d3b10b8a57c1776c58522c4233d.jpg', '2023-03-31 01:00:24', NULL),
(27, '4ekSu9HJG_A-x_jVOTCC_J', 'test.jpg', '6c604395ab32612e8773235de9d31928.jpg', '2023-08-21 09:06:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_number`
--
ALTER TABLE `auto_number`
  ADD PRIMARY KEY (`group`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `ncr`
--
ALTER TABLE `ncr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref` (`ref`);

--
-- Indexes for table `ncr_status`
--
ALTER TABLE `ncr_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_item`
--
ALTER TABLE `po_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ncr`
--
ALTER TABLE `ncr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ncr_status`
--
ALTER TABLE `ncr_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_item`
--
ALTER TABLE `po_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
