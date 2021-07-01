-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 05:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `researchs`
--

CREATE TABLE `researchs` (
  `research_No` int(64) NOT NULL,
  `research_NameThai` varchar(64) NOT NULL,
  `research_NameEnglish` varchar(64) NOT NULL,
  `research_Image` varchar(255) DEFAULT NULL,
  `research_Type` varchar(64) NOT NULL,
  `research_ProjectLeaderName` varchar(64) NOT NULL,
  `research_ProjectLeaderEmail` varchar(64) NOT NULL,
  `research_AdvisorName` varchar(64) NOT NULL,
  `research_YearCompletion` int(4) NOT NULL,
  `research_StudentClass` varchar(64) NOT NULL,
  `research_Member` int(64) NOT NULL,
  `research_Text` text DEFAULT NULL,
  `research_FileWord` varchar(255) DEFAULT NULL,
  `research_FilePDF` varchar(255) DEFAULT NULL,
  `research_TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `researchs`
--

INSERT INTO `researchs` (`research_No`, `research_NameThai`, `research_NameEnglish`, `research_Image`, `research_Type`, `research_ProjectLeaderName`, `research_ProjectLeaderEmail`, `research_AdvisorName`, `research_YearCompletion`, `research_StudentClass`, `research_Member`, `research_Text`, `research_FileWord`, `research_FilePDF`, `research_TimeStamp`) VALUES
(1, 'การพัฒนาเว็บไซด์เพื่อการศึกษา', 'Website development', '7d2c3808d68f6bd7ae3ff7d4b4e98522icon1.jpg', 'WebSite', 'นาย ก', 'abc@email.com', 'อาจารย์ ก', 2563, 'ปวช.1', 2, NULL, NULL, '', '2020-10-27 18:08:22'),
(2, 'การพัฒนาเว็บไซด์การเรียนการสอน', 'Teaching and learning website development', NULL, 'WebSite', 'นาย ข', 'ข@email.com', 'อาจารย์ ข', 2563, 'ปวส.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(3, 'การสร้างหุ่นยนต์', '\r\nRobot building', NULL, 'Hardware', 'นาย ค', 'ค@email.com', 'อาจารย์ ค', 2563, 'ปวส.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(4, 'การสร้างหุ่นยนต์ทันสมัย', 'Modern robot building', NULL, 'Hardware', 'นาย ง', 'ง@email.com', 'อาจารย์ ค', 2563, 'ปวส.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(5, 'การสร้างหุ่นยนต์ด้วย Arduino', 'Robot building With Arduino', NULL, 'Hardware', 'นาย จ', 'ง@email.com', 'อาจารย์ ก', 2562, 'ปวช.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(10, 'การสร้างหุ่นยนต์ด้วย Arduino', 'Robot building With Arduino', '', 'WebSite', 'นาย จกกกก', 'gaa@email.com', 'อาจารย์ กข', 2562, 'ปวช.1', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(18, 'ลงภาพ 3', 'Testing', 'test.jpg', 'Database', 'นวดล', 'test@test.com', 'อาจารย์ นวดล', 2563, 'ปวส.1', 3, NULL, NULL, '', '2020-10-18 19:00:46'),
(20, 'หุ่นยนต์', 'robot', '', 'Database', 'นวดล', 'sdafsadf@dfsdfsddfgd', 'อาจารย์ การนา', 2562, 'ปวส.1', 3, NULL, NULL, NULL, '2020-10-23 12:50:55'),
(24, 'สร้างเว็บขายของ', 'shopping', 'test03.jpg', 'Application', 'จูเนียร์', 'ju@com', 'อาจารย์ ค', 2560, 'ปวส.2', 3, NULL, NULL, NULL, '2020-10-23 13:12:38'),
(25, 'การสร้างหุ่นยนต์ด้วย Arduino', 'Robot building With Arduino', NULL, 'Hardware', 'นาย จ', 'ง@email.com', 'อาจารย์ ก', 2562, 'ปวช.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(26, 'ลงภาพ 3', 'Testing', '', 'WebSite', 'นวดล', 'test@test.com', 'อาจารย์ นวดล', 2563, 'ปวช.1', 2, NULL, NULL, '', '2020-10-23 15:43:33'),
(27, 'หุ่นยนต์', 'robot', '', 'Database', 'นวดล', 'sdafsadf@dfsdfsddfgd', 'อาจารย์ การนา', 2562, 'ปวส.1', 3, NULL, NULL, NULL, '2020-10-23 12:50:55'),
(29, 'การสร้างหุ่นยนต์ด้วย Arduino', 'Robot building With Arduino', NULL, 'Hardware', 'นาย จ', 'ง@email.com', 'อาจารย์ ก', 2562, 'ปวช.2', 2, NULL, NULL, '', '2020-10-18 19:00:46'),
(30, 'การทดลองระบบการจัดการ', 'doing', 'test02.png', 'Animation', 'นวดล', 'dfgdfg@dsfsd', 'อาจารย์ นวดล', 2544, 'ปวช.2', 4, 'fffffffffffffffffffffffffffffffffffffffffffffffff', '229f916c606a25cbc43f9ba399609a93ไฟล์ทดสอบ.docx', '229f916c606a25cbc43f9ba399609a93ไฟล์ทดสอบ.pdf', '2020-10-27 18:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `userphotoicon` varchar(255) DEFAULT NULL,
  `phonenumber` int(64) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `birthday`, `userphotoicon`, `phonenumber`, `timestamp`) VALUES
(1, 'nawadonkung', 'nawadon@mail', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0000-00-00', '0', 123456, '2020-09-17 12:13:30'),
(2, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '', '', '0000-00-00', '0', 123456, '2020-10-13 15:51:55'),
(3, 'testagain', 'testagain@test.com', '68e37a5f0d265ce101f95f6e24df7540', '', '', '0000-00-00', NULL, 626264455, '2020-10-23 12:21:38'),
(4, 'dadadada', 'login@login.com', '6d2cf3fdab44bdfc1990230f21e4c25d', 'ggg', 'fff', '2534-02-14', '', 2147483647, '2020-10-23 12:26:22'),
(5, 'admin', 'ggg@gmf.com', '93279e3308bdbbeed946fc965017f67a', 'o;dd', 'asdasd', '2457-04-02', '', 2147483647, '2020-10-23 12:28:13'),
(6, 'admin', '56@dfdf', 'f73070b50a314dbeb183fc4b4127ecac', 'dsf', 'sdf', '4745-05-24', '', 2424242, '2020-10-23 12:33:03'),
(7, 'sfdsaf', 'sdafsadf@dfsdfsd', '4931872f14c91cd8997766c581bd3761', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 12:38:32'),
(8, 'sfdsaf', 'sdafsadf@dfsdfsddfgd', 'd41d8cd98f00b204e9800998ecf8427e', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 12:41:01'),
(9, 'sfdsaf', 'werwerweerweradf@dfsdfsddfgd', '191438459f2867fe9d6647d9a8bd2c9d', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 12:41:16'),
(10, 'sfdsaf', 'werwerfgweerweradf@dfsdfsddfgd', 'd41d8cd98f00b204e9800998ecf8427e', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 12:41:52'),
(11, 'sfdsaf', 'r@dfsdfsddfgdfghjd', 'd41d8cd98f00b204e9800998ecf8427e', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 12:44:13'),
(12, 'admin', 'dfdffdf@dsfsdf.com', '59432a4fc2379b3497a798993b27332f', 'ดไำพ', 'ไำพไำพ', '3021-09-24', '', 454645345, '2020-10-23 13:00:28'),
(13, 'admin', 'dfdffdf@dsfsdf.comed', 'd41d8cd98f00b204e9800998ecf8427e', 'ดไำพ', 'ไำพไำพ', '3021-09-24', '', 454645345, '2020-10-23 13:02:15'),
(14, 'admin', 'sdfsdf@sfdsfs', 'd58e3582afa99040e27b92b13c8f2280', 'sdfsdf', 'sdfsdf', '3435-02-05', '', 4545, '2020-10-23 13:02:49'),
(15, 'dfgdsg', 'sdfgsdfg@sfsdf', 'b96922f83e46df9c1e8eac3740320a7d', 'gsdfgsdfg', 'sdfgsdfg', '0057-08-07', '', 0, '2020-10-23 13:04:18'),
(16, '785785', '786786@dsfsdfsdf', 'd58e3582afa99040e27b92b13c8f2280', 'sdfsdf', 'sdfsdf', '0000-00-00', '', 4545, '2020-10-23 13:04:41'),
(17, 'adminก', 'dsdsdsdsd@dsdsd', 'd44c786956dd19cc38e6ff048c74ab94', 'asdasd', 'asdsadas', '1111-05-14', '', 1515151, '2020-10-23 13:16:32'),
(18, 'rtyert', 'erterter@dsfdf', '51d6f200be0424bb5139e5d5227ee0f1', 'rtertert', 'erterter', '0545-05-04', '', 2147483647, '2020-10-23 13:20:38'),
(19, 'rtyert', 'ertertersdfsf@dsfdf', 'd41d8cd98f00b204e9800998ecf8427e', 'rtertert', 'erterter', '0545-05-04', '', 2147483647, '2020-10-23 13:21:01'),
(20, 'rtyert', 'ertertersdfsf@dsfdfee', 'd41d8cd98f00b204e9800998ecf8427e', 'rtertert', 'erterter', '0545-05-04', '', 2147483647, '2020-10-23 13:23:06'),
(21, 'ำพะำ', 'dfdfd@ssdsdsd', '718b6dd54c8d1d3ad19eb99cb12f13e2', 'dsdsdsdd', 'sdsdsds', '0084-05-04', '', 55555, '2020-10-23 13:25:58'),
(22, 'ำพะำ', 'dfdfd@ssdsdsd', '718b6dd54c8d1d3ad19eb99cb12f13e2', 'dsdsdsdd', 'sdsdsds', '0084-05-04', '', 55555, '2020-10-23 13:27:44'),
(23, 'sss', 'sdfsd@dsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '2721-04-15', '', 4454, '2020-10-23 13:33:58'),
(24, 'sss', 'sdfsd@dsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '2721-04-15', '', 4454, '2020-10-23 13:35:52'),
(25, 'sss', 'sdfsd@dsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '2721-04-15', '', 4454, '2020-10-23 13:36:03'),
(26, 'sss', 'sdfsd@dsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '2721-04-15', '', 4454, '2020-10-23 13:36:05'),
(27, 'sffds', 'sdfsdfsd@ds', 'd58e3582afa99040e27b92b13c8f2280', 'sdfsdf', 'sdfsdf', '0066-05-04', '', 4545, '2020-10-23 13:37:22'),
(28, 'qwqweqw', 'sdfsdfsdf@saewqeq', 'efe6398127928f1b2e9ef3207fb82663', 'qweqwe', 'qweqw', '6721-05-04', '', 5767686, '2020-10-23 13:41:19'),
(29, 'sdfsdfs', 'qwe3erw@dsfsdf', 'd58e3582afa99040e27b92b13c8f2280', 'sdfsdf', 'sdfsdf', '0045-06-12', '', 78676, '2020-10-23 13:42:57'),
(30, 'sdfsdfs', 'qwe3erw@dsfssdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '0045-06-12', 't', 78676, '2020-10-23 13:44:12'),
(31, 'sdfsdfs', 'qwe3erw@dsfssdfsdfsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsdf', 'sdfsdf', '0045-06-12', '', 78676, '2020-10-23 13:47:42'),
(32, 'testt', 'testt@test.com', '147538da338b770b61e592afc92b1ee6', 'testt', 'testt', '1234-03-12', '', 123456789, '2020-10-23 14:35:51'),
(33, 'admin', 'testt@test.xn--com-gkla', '5d1cd5f7b5e05f5e0f95e21e3c9ee5e9', 'testt', 'testt', '0007-05-14', '', 123456789, '2020-10-23 14:39:33'),
(34, 'admin', 'testt@test.xn--com-gklad', 'd41d8cd98f00b204e9800998ecf8427e', 'testt', 'testt', '0007-05-14', '', 123456789, '2020-10-23 14:40:17'),
(35, 'admin', 'testt@test.xn--com-gklads', 'd41d8cd98f00b204e9800998ecf8427e', 'testt', 'testt', '0007-05-14', '', 123456789, '2020-10-23 14:40:57'),
(36, 'หกดหกดหกดห', 'r@dfsdfsddfgdfghjqweqwe', '69676d17456924ef6078455862d7dc0a', '752752', 'sgerg', '0000-00-00', '', 7856786, '2020-10-23 14:44:28'),
(37, 'admin', 'test@test.comasd', 'a8f5f167f44f4964e6c998dee827110c', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:02:18'),
(38, 'admin', 'test@test.comasdsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:02:57'),
(39, 'admin', 'test@test.comasdsdfs', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:03:07'),
(40, 'admin', 'test@test.comasdsdfsd', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:05:00'),
(41, 'aaaaaaaaaaaaaaaaaaaaaa', 'test@test.comasdsdfsdewrwerwerwerwerwer', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:05:48'),
(42, 'aaaaaaaaaaaaaaaaaaaaaa', 'test@test.comasdsdfsdewrwerwerwerwerwww', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:08:11'),
(43, 'aaaaaaaaaaaaaaaaaaaaaa', 'testsss@test.comasdsdfsdewrwerwerwerwerwww', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:10:54'),
(44, 'aaaaaaaaaaaaaaaaaaaaaa', 'tedddstsss@test.comasdsdfsdewrwerwerwerwerwwwdd', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:11:34'),
(45, 'aaaaaaaaaaaaaaaaaaaaaa', 'ddsddfs@fdfsdfsdf', 'd41d8cd98f00b204e9800998ecf8427e', 'fdsgdfg', 'dfgdfg', '8723-04-15', '', 123456, '2020-10-23 15:11:46'),
(46, 'admin', 'sdfsdfsdf@dfdf', 'd58e3582afa99040e27b92b13c8f2280', 'sdfsdf', 'sdfsdf', '2424-04-12', 'test03.jpg', 2525, '2020-10-23 15:12:28'),
(47, 'number', 'number@com', 'b1bc248a7ff2b2e95569f56de68615df', 'number', 'number', '1234-12-12', 'a6932152ad11b2084e35c7654550aa17test02.png', 123456789, '2020-10-27 18:10:22'),
(48, 'admin', 'number@comm', 'a8f5f167f44f4964e6c998dee827110c', 'number', 'number', '7587-05-14', 'test03.jpg', 123456789, '2020-10-23 15:51:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researchs`
--
ALTER TABLE `researchs`
  ADD PRIMARY KEY (`research_No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `researchs`
--
ALTER TABLE `researchs`
  MODIFY `research_No` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
