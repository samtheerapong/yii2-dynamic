-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2023 at 01:08 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

DROP TABLE IF EXISTS `auto_number`;
CREATE TABLE IF NOT EXISTS `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int DEFAULT NULL,
  `optimistic_lock` int DEFAULT NULL,
  `update_time` int DEFAULT NULL,
  PRIMARY KEY (`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('741918ad933afdb9da0f7c95bdddb273', 3, 1, 1680165242),
('NCR-2303/?', 3, 1, 1680165242);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'หน่วยงาน',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

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

DROP TABLE IF EXISTS `ncr`;
CREATE TABLE IF NOT EXISTS `ncr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL COMMENT 'เลข fk กับ upload ใช้กับ upload ajax',
  `event_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'เลขที่ NCR',
  `detail` text COMMENT 'รายละเอียด',
  `start_date` datetime DEFAULT NULL COMMENT 'วันที่เริ่ม',
  `end_date` datetime DEFAULT NULL COMMENT 'วันที่เสร็จ',
  `location` varchar(255) DEFAULT NULL COMMENT 'สถานที่',
  `customer_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `customer_mobile_phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทร',
  `province_id` int DEFAULT NULL,
  `from_department` varchar(200) DEFAULT NULL COMMENT 'หน่วยงานที่แจ้ง',
  `to_department` varchar(200) DEFAULT NULL COMMENT 'ถึงหน่วยงาน',
  `problem` varchar(200) DEFAULT NULL COMMENT 'กระบวนการที่พบปัญหา',
  `lot` varchar(100) DEFAULT NULL COMMENT 'ล็อตที่',
  `production_date` varchar(100) DEFAULT NULL COMMENT 'วันที่ผลิต',
  `product_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `notify_by` varchar(200) DEFAULT NULL COMMENT 'ผู้รายงาน',
  `proplem_date` varchar(100) DEFAULT NULL COMMENT 'วันที่พบปัญหา',
  `recheck` text COMMENT 'การดำเนินการเบื้องต้น',
  `created_at` int DEFAULT NULL COMMENT 'วันที่แจ้ง',
  `updated_at` int DEFAULT NULL COMMENT 'ปรับปรุงล่าสุด',
  `status` int DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ncr`
--

INSERT INTO `ncr` (`id`, `ref`, `event_name`, `detail`, `start_date`, `end_date`, `location`, `customer_name`, `customer_mobile_phone`, `province_id`, `from_department`, `to_department`, `problem`, `lot`, `production_date`, `product_name`, `notify_by`, `proplem_date`, `recheck`, `created_at`, `updated_at`, `status`) VALUES
(1, 'sfNwR407iC-x3izP6rGeWj', 'NCR-2303/01', 'ทดสอบการใช้งาน', NULL, NULL, NULL, 'John Doe', NULL, NULL, '1', '2', '4,5', '071/23', '2023-03-23', 'organic FT soy Sauce 200 ml', 'ประกายวรรณ เทพมณี', '2023-03-30', 'รีเช็ค', 1680160723, 1680165622, 3),
(3, '6Ag-g1NgvPkgHLbsDVvZZ1', 'NCR-2303/03', '', NULL, NULL, NULL, '', NULL, NULL, '3', '2,4', '3', '12522/55', '2023-03-30', 'ทดสอบ', '', '2023-03-30', '', 1680165242, 1680224855, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ncr_status`
--

DROP TABLE IF EXISTS `ncr_status`;
CREATE TABLE IF NOT EXISTS `ncr_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(200) DEFAULT NULL COMMENT 'สถานะ',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(20) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

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
-- Table structure for table `problem`
--

DROP TABLE IF EXISTS `problem`;
CREATE TABLE IF NOT EXISTS `problem` (
  `problem_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'กระบวนการที่พบปัญหา',
  `details` text COMMENT 'รายละเอียด',
  `color` varchar(20) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`problem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

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

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `upload_id` int NOT NULL AUTO_INCREMENT,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(150) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

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
(23, '6Ag-g1NgvPkgHLbsDVvZZ1', 'A0101.jpg', 'ae871d3b10b8a57c1776c58522c4233d.jpg', '2023-03-31 01:00:24', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
