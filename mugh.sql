-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 09:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mugh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_detail` text NOT NULL,
  `b_link` varchar(200) NOT NULL,
  `b_image` text NOT NULL,
  `b_by` text NOT NULL,
  `b_date` datetime NOT NULL,
  `b_status` enum('1','0','','') NOT NULL,
  `b_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`b_id`, `b_title`, `b_detail`, `b_link`, `b_image`, `b_by`, `b_date`, `b_status`, `b_update`) VALUES
(4, '', 'sdgsdfgsdg', 'gfsdgsdfg', 'banner_116959751320220228_041505.png', 'sdgdfsgsd', '2022-02-28 00:00:00', '1', '2022-02-27 21:15:05'),
(5, 'เหกดเดหก', 'sdfgdfsgsdf', 'dfgsdgsdfg', 'banner_81890425720220228_041750.png', 'dsfgdsfgs', '2022-02-28 00:00:00', '1', '2022-02-27 21:17:50'),
(6, 'gfsdgdf', 'gsdgsdgsdgsfdgsdfgfsd', 'gfsdgsdfg', 'banner_168485131220220228_042008.png', 'gsdfgdfs', '2022-02-28 00:00:00', '0', '2022-02-27 21:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `e_user` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_detail` text CHARACTER SET utf8 NOT NULL,
  `e_address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `e_file` text CHARACTER SET utf8 NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `e_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events_type`
--

CREATE TABLE `tbl_events_type` (
  `et_id` int(11) NOT NULL,
  `et_name` text NOT NULL,
  `et_create` datetime NOT NULL,
  `et_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_events_type`
--

INSERT INTO `tbl_events_type` (`et_id`, `et_name`, `et_create`, `et_update`) VALUES
(1, 'กิจกรรมประชุม', '2022-03-03 20:11:39', '2022-03-03 19:12:15'),
(2, 'กิจกรรมมหาวิทยาลัย', '2022-03-03 20:12:21', '2022-03-03 19:14:56'),
(4, 'กิจกรรมทั่วไป', '2022-03-03 20:12:21', '2022-03-03 19:12:38'),
(5, 'กิจกรรมสัมมนาวิชาการ', '2022-03-03 20:12:41', '2022-03-03 19:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `f_group` text NOT NULL,
  `t_id` varchar(20) NOT NULL,
  `f_detail` text NOT NULL,
  `f_by` text NOT NULL,
  `f_file` text NOT NULL,
  `f_status` enum('1','0','','') NOT NULL,
  `f_date` date NOT NULL,
  `f_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`f_id`, `f_name`, `f_group`, `t_id`, `f_detail`, `f_by`, `f_file`, `f_status`, `f_date`, `f_update`) VALUES
(9, 'งานวิชาการ', '1', '1', '', '', 'doc_77394025720220228_133349.pdf', '1', '2022-02-28', '2022-02-28 06:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_group`
--

CREATE TABLE `tbl_file_group` (
  `g_id` int(11) NOT NULL,
  `g_name` text NOT NULL,
  `g_detail` text NOT NULL,
  `g_address` text NOT NULL,
  `g_status` enum('1','0','','') NOT NULL,
  `g_date` date DEFAULT NULL,
  `g_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file_group`
--

INSERT INTO `tbl_file_group` (`g_id`, `g_name`, `g_detail`, `g_address`, `g_status`, `g_date`, `g_update`) VALUES
(1, 'เอกสารวิชาการ', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '0', '0000-00-00', '2022-02-26 20:10:27'),
(2, 'เอกสารงานประชุม', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:11:48'),
(3, 'เอกสาร MOU', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:12:00'),
(4, 'เอกสารงานวิจัย', 'เอกสารสถานบันวิจัยอาเซียนnbvn', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:11:25'),
(30, 'เอกสารทั่วไป', '', 'เอกสารสถานบันวิจัยอาเซียน', '1', '2022-02-27', '2022-02-27 03:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_type`
--

CREATE TABLE `tbl_file_type` (
  `t_id` int(11) NOT NULL,
  `t_name` text NOT NULL,
  `t_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file_type`
--

INSERT INTO `tbl_file_type` (`t_id`, `t_name`, `t_date`) VALUES
(1, 'PDF(เอกสาร)', '2022-02-27 04:16:38'),
(2, 'DOC (เอกสาร)', '2022-02-27 04:23:43'),
(3, 'อื่นๆ', '2022-02-27 10:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `g_id` int(11) NOT NULL,
  `g_name` text NOT NULL,
  `g_detail` text NOT NULL,
  `g_status` enum('1','0') NOT NULL,
  `g_user` text NOT NULL,
  `g_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`g_id`, `g_name`, `g_detail`, `g_status`, `g_user`, `g_date`) VALUES
(2, 'faaf', '', '0', '', '0000-00-00'),
(3, 'รักนุ้ยมาก', '', '1', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `i_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `i_name` text NOT NULL,
  `i_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`i_id`, `g_id`, `i_name`, `i_create`) VALUES
(1, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy - Copy (2).jpg', '2022-03-10 01:11:34'),
(2, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy - Copy.jpg', '2022-03-10 01:11:34'),
(3, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy (2) - Copy.jpg', '2022-03-10 01:11:34'),
(4, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy (2).jpg', '2022-03-10 01:11:34'),
(5, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy (3) - Copy.jpg', '2022-03-10 01:11:34'),
(6, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy (3).jpg', '2022-03-10 01:11:34'),
(7, 2, '../../uploads/gallery/faaf/photo-1527960669566-f882ba85a4c6 - Copy (4) - Copy.jpg', '2022-03-10 01:11:34'),
(8, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy (4).jpg', '2022-03-10 09:32:40'),
(9, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy - Copy (2).jpg', '2022-03-10 09:32:40'),
(10, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy (5) - Copy.jpg', '2022-03-10 09:32:40'),
(11, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy (6) - Copy.jpg', '2022-03-10 09:32:40'),
(12, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy (7) - Copy.jpg', '2022-03-10 09:32:40'),
(13, 3, '../../uploads/gallery/รักนุ้ยมาก/photo-1527960669566-f882ba85a4c6 - Copy.jpg', '2022-03-10 09:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `n_id` int(11) NOT NULL,
  `n_type` enum('1','2','3') NOT NULL,
  `n_name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `n_detail` text DEFAULT NULL,
  `slug` text NOT NULL,
  `n_image` varchar(400) NOT NULL,
  `n_views` int(11) NOT NULL,
  `n_date` date NOT NULL,
  `n_status` enum('1','0','','') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`n_id`, `n_type`, `n_name`, `url`, `n_detail`, `slug`, `n_image`, `n_views`, `n_date`, `n_status`, `update_at`, `create_at`) VALUES
(58, '1', 'asdasd', 'gfgdh', '                                            ', 'l6-4kr', 'uploads/images/16465078383020.jpg', 0, '2022-03-06', '0', '2022-03-05 19:17:21', '2022-03-06'),
(59, '1', 'asdasd', 'hdfhfgdhfd', '                                            ', 'svsvs', 'uploads/images/16465087896580.jpg', 0, '2022-03-06', '1', '2022-03-05 19:33:19', '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `n_user_id` int(11) NOT NULL,
  `n_title` text NOT NULL,
  `n_detail` text NOT NULL,
  `n_views` text NOT NULL,
  `n_date` text NOT NULL,
  `n_status` enum('1','0') NOT NULL,
  `n_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `n_user_id`, `n_title`, `n_detail`, `n_views`, `n_date`, `n_status`, `n_create`) VALUES
(5, 1, 'hdfghfdhfdg', '<div class=\"content-title-box\" style=\"margin: 0px 0px 5px; padding: 5px 15px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; position: relative; font-weight: bold; background: rgb(0, 66, 102); border-top-left-radius: 5px; border-top-right-radius: 5px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, Thonburi, Tahoma, FreeSans, sans-serif;\"><h2 itemprop=\"name\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 1.2em; vertical-align: baseline;\"><a href=\"https://www.blognone.com/node/127572\" title=\"รัสเซียสร้าง CA เองป้องกันกรณีโดนคว่ำบาตร ธนาคารเริ่มใช้งาน\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 15.6px; vertical-align: baseline; color: rgb(255, 255, 255);\">รัสเซียสร้าง CA เองป้องกันกรณีโดนคว่ำบาตร ธนาคารเริ่มใช้งาน</a></h2></div><div class=\"meta\" style=\"margin: 0px; padding: 5px 15px; border: 0px; outline: 0px; font-size: 0.8em; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Helvetica, Arial, Thonburi, Tahoma, FreeSans, sans-serif;\"><span class=\"submitted\" style=\"margin: 0px 10px 0px 0px; padding: 3px; border: 1px solid rgb(209, 209, 209); outline: 0px; font-size: 10.4px; vertical-align: baseline; background-color: rgb(238, 238, 238); border-radius: 5px;\">By:&nbsp;<span class=\"username\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline;\">lew</span>&nbsp;<div class=\"user_badges\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: top; display: inline;\"><a href=\"https://www.blognone.com/crew\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; color: rgb(29, 95, 179);\"><img class=\"badge badge-2 founder\" src=\"https://www.blognone.com/sites/default/files/badges/badge-founder.png\" alt=\"Founder\" title=\"Founder\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px 1px; padding: 0px; outline: 0px; font-size: 10.4px; vertical-align: top; display: inline; max-width: 640px;\"></a><img class=\"badge badge-13 juscis-writer\" src=\"https://www.blognone.com/sites/default/files/badges/jusci-blue-i.png\" alt=\"Jusci&amp;#039;s Writer\" title=\"Jusci&amp;#039;s Writer\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px 1px; padding: 0px; outline: 0px; font-size: 10.4px; vertical-align: top; display: inline; max-width: 640px;\"><img class=\"badge badge-22 meconomics\" src=\"https://www.blognone.com/sites/default/files/badges/mecon-badge.png\" alt=\"MEconomics\" title=\"MEconomics\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px 1px; padding: 0px; outline: 0px; font-size: 10.4px; vertical-align: top; display: inline; max-width: 640px;\"><a href=\"https://www.blognone.com/news/15370/ask-blognone-are-you-android\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; color: rgb(29, 95, 179);\"><img class=\"badge badge-4 android\" src=\"https://www.blognone.com/sites/default/files/badges/badge-android.png\" alt=\"Android\" title=\"Android\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px 1px; padding: 0px; outline: 0px; font-size: 10.4px; vertical-align: top; display: inline; max-width: 640px;\"></a></div>&nbsp;on 11 March 2022 - 11:22</span>&nbsp;<span class=\"terms-label\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline;\">Tags:<span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline;\"><span class=\"terms\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline;\"><div class=\"field field-name-taxonomy-vocabulary-1 field-type-taxonomy-term-reference field-label-above\" style=\"margin: 0px; padding: 3px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; display: inline;\"><div class=\"field-items\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; float: none; display: inline;\"><div class=\"field-item even\" style=\"margin: 0px 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; float: none; display: inline;\"><a href=\"https://www.blognone.com/topics/russia\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; color: rgb(29, 95, 179);\">Russia</a></div><div class=\"field-item odd\" style=\"margin: 0px 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; float: none; display: inline;\"><a href=\"https://www.blognone.com/topics/digital-certificate\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 10.4px; vertical-align: baseline; color: rgb(29, 95, 179);\">Digital Certificate</a></div></div></div></span></span></span></div><div class=\"content\" style=\"margin: 5px 0px 0px; padding: 5px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; min-height: 120px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, Thonburi, Tahoma, FreeSans, sans-serif;\"><div class=\"node-image\" style=\"margin: 5px 5px 5px 10px; padding: 0px 10px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; float: left; display: inline; width: 100px; height: 100px; line-height: 100px;\"><img alt=\"Node Thumbnail\" src=\"https://www.blognone.com/sites/default/files/styles/thumbnail/public/topics-images/russia.png?itok=SewVN53w\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px; padding: 0px; outline: 0px; max-width: 640px;\"></div><div class=\"node-content\" itemprop=\"description\" style=\"margin: 0px 10px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"field field-name-body field-type-text-with-summary field-label-hidden\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"field-items\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; float: none; display: inline;\"><div class=\"field-item even\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; float: none; display: inline;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0.4em 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: inherit;\">บริการรัฐบาลอิเล็กทรอนิกส์รัสเซีย หรือ Gosuslugi เปิดให้บริการออกใบรับรองดิจิทัล เพียงไม่กี่วันหลังจากรัสเซียบุกยูเครน ป้องกันกรณีที่บริษัทออกใบรับรองหยุดให้บริการในรัสเซียและทำให้บริการสำคัญๆ เข้าผ่านเบราว์เซอร์ไม่ได้</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0.4em 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: inherit;\">ใบรับรอง Russian Trusted Root CA (หมายเลข serial E1:D1:81:E5:CE:5A:5F:04:AA:D2:E9:B6:9D:66:B1:C5:FA:AC:2C:87) เพิ่งสร้างเมื่อวันที่ 1 มีนาคมที่ผ่านมา และตอนนี้เบราว์เซอร์รัสเซีย เช่น Yandex และ Atom (ของค่าย Vk) ก็ยอมรับไว้ในเบราว์เซอร์แล้ว กระบวนการออกใบรับรองยังเป็นการตรวจเอกสารทำให้การออกใบรับรองอาจใช้เวลาถึง 5 วัน หน่วยงานที่ออกใบรับรองไปแล้ว เช่น ธนาคาร Sberbank, ธนาคาร VTB, และธนาคารกลางรัสเซีย ตอนนี้การใช้งานใบรับรองของรัสเซียยังเป็นไปตามสมัครใจ</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0.4em 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: inherit;\">ตอนนี้ยังไม่มีข่าวผู้ให้บริการ CA รายใดประกาศแบนเว็บไซต์รัสเซียอย่างชัดเจน แต่ก่อนหน้านี้บริการจดโดเมนอย่าง&nbsp;<a href=\"https://www.blognone.com/node/127390\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(29, 95, 179);\">Namecheap ก็ประกาศไม่ให้บริการลูกค้ารัสเซียมาแล้ว</a>&nbsp;และรัฐบาลยูเครนก็พยายามกดดันหน่วยงานต่างๆ ให้แบนรัสเซียอย่างต่อเนื่อง เช่น การขอให้ ICANN ตัดโดเมนของรัสเซียออกจากระบบ&nbsp;<a href=\"https://www.icann.org/en/system/files/correspondence/marby-to-fedorov-02mar22-en.pdf\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(29, 95, 179);\">แต่ทาง ICANN ปฎิเสธ</a></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0.4em 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: inherit;\">ที่มา -&nbsp;<a href=\"https://www.bleepingcomputer.com/news/security/russia-creates-its-own-tls-certificate-authority-to-bypass-sanctions/\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(29, 95, 179);\">Bleeping Computer</a></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0.4em 0px; border: 0px; outline: 0px; vertical-align: baseline; line-height: inherit;\"><img src=\"https://www.blognone.com/sites/default/files/externals/86a7cbfdfb8578cb1ca7a111eea2a1e7.jpg\" alt=\"No Description\" style=\"border-width: initial; border-color: initial; border-image: initial; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; max-width: 640px;\"></p></div></div></div></div></div>', '0', '0000-00-00', '1', '2022-03-11'),
(6, 1, 'gjdgdfjdfjgdfjgf', '<p>fdjfgjfgjfgddjdf</p>', '0', '0000-00-00', '1', '2022-03-10'),
(7, 1, 'bzxbzxzxb', '<p>zxbzxbzxzbx</p>', '0', '2022-03-11', '1', '2022-03-11'),
(8, 1, 'vvdv', '<p>vdsvsd</p>', '0', 'vsdsdvddf', '1', '2022-03-11'),
(9, 3, 'sdfsdfsadf', '<p>sadfsadfdsafdsa</p>', '0', 'sfsdsf', '1', '2022-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_counter`
--

CREATE TABLE `tbl_news_counter` (
  `nc_id` int(11) NOT NULL,
  `nc_visiter` text NOT NULL COMMENT 'นับจำนวนผู้เข้าชม',
  `nc_page` text NOT NULL COMMENT 'หน้าที่เข้าชม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_type`
--

CREATE TABLE `tbl_news_type` (
  `n_type_id` int(11) NOT NULL,
  `n_type` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news_type`
--

INSERT INTO `tbl_news_type` (`n_type_id`, `n_type`, `create_at`, `update_at`) VALUES
(1, 'ข่าวประจำเดือน', '2022-01-28 07:10:46', '2022-01-28 07:10:46'),
(2, 'ข่าวกิจกรรม', '2022-01-28 07:10:46', '2022-01-28 07:10:46'),
(3, 'ข่าวประจำสัปดาห์', '2022-02-27 13:25:31', '2022-02-27 13:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `full_name` text CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_password` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `user_image` text NOT NULL,
  `user_role_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `user_status` enum('1','0') CHARACTER SET utf8 NOT NULL,
  `token` text CHARACTER SET utf8 DEFAULT NULL,
  `salt` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `full_name`, `user_email`, `user_password`, `user_name`, `user_image`, `user_role_id`, `user_status`, `token`, `salt`) VALUES
(1, 'ธนพล กัลปพฤกษ์', 'e21bvz@hotmail.com', '8a74f79ac42b1c4361710c814b05ddf4', 'nack', '', '1', '1', '7b8e3b4ee014f30ea53e01bf355ec23b', 'VkztNO8yhW'),
(3, 'เพียงเพ็ญ แป้นจันทร์', 'e21bvz@gmail.com', '752d6214ea1886db6bef647258d8bc1b', 'nui', '', '1', '1', 'a5ea0f2afc90412c8f887902c27d1488', 'tcih02W3DH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_role_id`, `user_role`, `create_at`) VALUES
(1, 'superadmin', '2022-01-20 01:25:09'),
(2, 'admin', '2022-01-20 01:25:09'),
(3, 'editer', '2022-01-20 01:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor_counter`
--

CREATE TABLE `tbl_visitor_counter` (
  `id` int(11) NOT NULL,
  `visitor_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitor_counter`
--

INSERT INTO `tbl_visitor_counter` (`id`, `visitor_counter`) VALUES
(1, 281);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events_type`
--
ALTER TABLE `tbl_events_type`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_file_group`
--
ALTER TABLE `tbl_file_group`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_file_type`
--
ALTER TABLE `tbl_file_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news_counter`
--
ALTER TABLE `tbl_news_counter`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `tbl_news_type`
--
ALTER TABLE `tbl_news_type`
  ADD PRIMARY KEY (`n_type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `tbl_visitor_counter`
--
ALTER TABLE `tbl_visitor_counter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_events_type`
--
ALTER TABLE `tbl_events_type`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_file_group`
--
ALTER TABLE `tbl_file_group`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_file_type`
--
ALTER TABLE `tbl_file_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_news_counter`
--
ALTER TABLE `tbl_news_counter`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news_type`
--
ALTER TABLE `tbl_news_type`
  MODIFY `n_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_visitor_counter`
--
ALTER TABLE `tbl_visitor_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
