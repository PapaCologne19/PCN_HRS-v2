-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 10:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcnhrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `201files`
--

CREATE TABLE `201files` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `requirements_files` varchar(600) NOT NULL,
  `requirements_files_uploaded` varchar(255) NOT NULL,
  `waiver_filename` varchar(255) NOT NULL,
  `waiver_date_submitted` date NOT NULL,
  `resume_filename` varchar(255) NOT NULL,
  `resume_date_submitted` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `201files`
--

INSERT INTO `201files` (`id`, `applicant_id`, `project_id`, `employee_id`, `requirements_files`, `requirements_files_uploaded`, `waiver_filename`, `waiver_date_submitted`, `resume_filename`, `resume_date_submitted`) VALUES
(10, 2, 1, 0, 'adasd (2).pdf', '2023-11-18', '', '0000-00-00', '', ''),
(9, 2, 1, 0, 'adasd (1).pdf', '2023-11-18', '', '0000-00-00', '', ''),
(8, 2, 1, 0, '16021479 (1).docx', '2023-11-18', '', '0000-00-00', '', ''),
(11, 2, 1, 0, 'download (1).jpg', '2023-11-18', '', '0000-00-00', '', ''),
(13, 19, 1, 0, 'EXCEL.xlsx', '2023-11-18', '', '0000-00-00', '', ''),
(14, 0, 0, 0, '', '', '', '2023-11-18', '', ''),
(15, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(16, 19, 1, 0, '16021479.docx', '2023-11-18', '', '0000-00-00', '', ''),
(17, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(18, 19, 1, 0, '16021479.docx', '2023-11-18', '', '0000-00-00', '', ''),
(19, 19, 1, 0, 'connect.php', '2023-11-18', '', '0000-00-00', '', ''),
(20, 19, 1, 0, 'EXCEL.xlsx', '2023-11-18', '', '0000-00-00', '', ''),
(21, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(22, 19, 1, 0, 'hrisservice.txt', '2023-11-18', '', '0000-00-00', '', ''),
(23, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(24, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(25, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(26, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(27, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(28, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(29, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(30, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(31, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(32, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(33, 19, 1, 0, '16021479.docx', '2023-11-18', '', '0000-00-00', '', ''),
(34, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(35, 19, 1, 0, 'connect.php', '2023-11-18', '', '0000-00-00', '', ''),
(36, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(37, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(38, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(39, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(40, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(41, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(42, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', ''),
(43, 19, 1, 0, 'adasd.pdf', '2023-11-18', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `extension_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `applicant_status` varchar(25) NOT NULL DEFAULT 'ACTIVE',
  `resume_attachment` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `source`, `username`, `password`, `firstname`, `middlename`, `lastname`, `extension_name`, `gender`, `civil_status`, `age`, `mobile_number`, `email_address`, `birthday`, `present_address`, `city`, `region`, `applicant_status`, `resume_attachment`, `image`, `date_created`) VALUES
(1, 'REFERRAL', 'jpgomera19', '$2y$10$JLOkt8AxFVUnU3QrFBJgyuHzkyiDva3UXxyQZ6VJyU.9oSubczxJ.', 'James Philip', 'Amante', 'Gomera', '', 'Male', 'Single', 22, 2147483647, 'jpgomera19@gmail.com', '2001-06-19', 'Bansalangin st. Payatas B', 'QUEZON CITY', '13', 'ACTIVE', '', '', '2023-11-17 03:49:16'),
(2, 'NON REFERRAL', 'jerryboy123', '$2y$10$HPZwTA9tSxcW8YzXI5/fYedGLuFKbY38nxjMUnH1418zUNAQ7W4oe', 'Jerryboy', 'Malatek', 'Malandutay', '', 'Male', 'Single', 23, 2147483647, 'jerryboy123@gmail.com', '05/18/2000', 'Bansalangin st. Payatas B', 'QUEZON CITY', '13', 'ACTIVE', '', 'download (1).jpg', '2023-11-17 04:23:16'),
(3, 'NON REFERRAL', 'levi123', '$2y$10$uPxEMk25aGBpYw7GR/nunuXW5aKWlxRj/Rrm6LL9aNravB74D/Lr6', 'Levi', 'Mabangis ', 'Malandutay', '', 'Female', 'Single', 0, 2147483647, 'levimabangis@gmail.com', '11/08/2023', 'Bansalangin st. Payatas B', 'AGUINALDO', '14', 'ACTIVE', '', '', '2023-11-17 05:58:15'),
(10, 'REFERRAL', '', '', 'Test', 'Test', 'Test', 'Test', 'Male', 'Single', 23, 2147483647, 'test123@gmail.com', '11/16/2000', 'Bansalangin st. Payatas B', 'PORT AREA', '13', 'ACTIVE', '', '', '2023-11-17 08:21:20'),
(11, 'REFERRAL', 'john123', '$2y$10$2b9WtMk/10qMxSDPV9ccZeGGo5.1bO01vXhgibPpE3G2kDjZKt0J2', 'John', 'Doe', 'Smith', '', 'Male', 'Single', 29, 2147483647, 'johndoe123@test.com', '11/11/1994', '#27 BANSALANGIN ST PAYATAS B', 'QUEZON CITY', '13', 'ACTIVE', '', '404.png', '2023-11-18 00:16:31'),
(19, 'REFERRAL', 'employer@gmail.com', '$2y$10$95eAH6PKInbr79F1MAsvW.Y8MxXXjS6VHarVYBV8fimudJoVuQMQS', 'JAMES PHILIP', 'AMANTE', 'GOMERA', 'asdasd', 'Male', 'Single', 0, 2147483647, 'jpgomera19@gmail.com', '11/08/2023', '#27 BANSALANGIN ST PAYATAS B', 'QUEZON CITY', '13', 'ACTIVE', '', '', '2023-11-18 00:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_notifications`
--

CREATE TABLE `applicant_notifications` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `notification` varchar(3000) NOT NULL,
  `clicked` int(11) NOT NULL DEFAULT '0' COMMENT '0=notclicked; 1=clicked',
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_notifications`
--

INSERT INTO `applicant_notifications` (`id`, `applicant_id`, `project_id`, `notification`, `clicked`, `view`) VALUES
(5, 1, 2, 'Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).', 1, 0),
(6, 11, 1, 'Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).', 1, 0),
(9, 1, 2, 'HAHAHAHAHHA\r\nasdada', 1, 0),
(10, 3, 2, 'Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).', 1, 0),
(11, 2, 1, 'Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).', 0, 0),
(12, 19, 1, 'Congratulations! You have passed. Please submit the mandatory documents (SSS, PhilHealth, Pag-IBIG, TIN).', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_resume`
--

CREATE TABLE `applicant_resume` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `resume_file` varchar(255) NOT NULL,
  `resume_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'FOR SCREENING',
  `project_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `date_applied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant_resume`
--

INSERT INTO `applicant_resume` (`id`, `applicant_id`, `project_id`, `resume_file`, `resume_path`, `status`, `project_status`, `date_applied`, `is_deleted`) VALUES
(41, 3, 2, 'adasd.pdf', '../201 Files/Levi Mabangis  Malandutay /Requirements', 'QUALIFIED', 'FOR DEPLOYMENT', '2023-11-18 13:33:32', 0),
(27, 1, 2, 'Vecteezy-License-Information.pdf', '0', 'QUALIFIED', 'FOR DEPLOYMENT', '2023-11-17 14:27:29', 0),
(28, 1, 1, 'Vecteezy-License-Information.pdf', '0', 'QUALIFIED', 'ALREADY PASSED', '2023-11-17 14:27:43', 1),
(39, 11, 2, 'adasd.pdf', '', 'QUALIFIED', 'ALREADY PASSED', '2023-11-18 08:56:02', 1),
(40, 11, 1, '16021479.docx', '', 'QUALIFIED', 'FOR DEPLOYMENT', '2023-11-18 09:11:25', 0),
(42, 2, 1, '16021479.docx', '../201 Files/Jerryboy Malatek Malandutay /Requirements', 'QUALIFIED', 'FOR DEPLOYMENT', '2023-11-18 13:43:12', 0),
(43, 19, 2, 'adasd.pdf', '../201 Files/JAMES PHILIP AMANTE GOMERA asdasd/Requirements', 'QUALIFIED', 'ALREADY PASSED', '2023-11-18 16:09:23', 1),
(44, 19, 1, '16021479.docx', '../201 Files/JAMES PHILIP AMANTE GOMERA asdasd/Requirements', 'QUALIFIED', 'FOR DEPLOYMENT', '2023-11-18 16:09:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attrition`
--

CREATE TABLE `attrition` (
  `id` int(11) NOT NULL,
  `emp_no` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `effectivity_date` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_history`
--

CREATE TABLE `blacklist_history` (
  `id` int(11) NOT NULL,
  `tracking` varchar(255) NOT NULL,
  `photopath` varchar(255) NOT NULL,
  `dapplied` varchar(255) NOT NULL,
  `appno` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `lastnameko` varchar(255) NOT NULL,
  `firstnameko` varchar(255) NOT NULL,
  `mnko` varchar(255) NOT NULL,
  `extnname` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `cityn` varchar(255) NOT NULL,
  `regionn` varchar(255) NOT NULL,
  `peraddress` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gendern` varchar(255) NOT NULL,
  `civiln` varchar(255) NOT NULL,
  `cpnum` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `despo` varchar(255) NOT NULL,
  `classn` varchar(255) NOT NULL,
  `idenn` varchar(255) NOT NULL,
  `sssnum` varchar(255) NOT NULL,
  `pagibignum` varchar(255) NOT NULL,
  `phnum` varchar(255) NOT NULL,
  `tinnum` varchar(255) NOT NULL,
  `policed` varchar(255) NOT NULL,
  `brgyd` varchar(255) NOT NULL,
  `nbid` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `actionpoint` varchar(255) NOT NULL,
  `reasonofaction` varchar(255) NOT NULL,
  `dateofaction` varchar(255) NOT NULL,
  `ewbdeploy` varchar(255) NOT NULL,
  `ewbdate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`, `is_deleted`) VALUES
(1, 'ACTIVATION', 0),
(2, 'MERCHANDISING', 0),
(3, 'NA', 0),
(4, 'TEST', 1),
(5, 'qweweqweqweqeqw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `description`, `is_deleted`) VALUES
(1, 'Department Store', 0),
(2, 'General Trade', 0),
(4, 'Supermarket', 0),
(5, 'Sari Sari Store Activation', 0),
(6, 'N/A', 0),
(7, 'Convenience', 0),
(8, 'Drug Store', 0),
(9, 'Appliance Center', 0),
(12, 'Book Store', 0),
(13, 'Channel 22', 1),
(14, 'Channel 22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(255) NOT NULL,
  `psgcCode` varchar(255) DEFAULT NULL,
  `citymunDesc` text,
  `regDesc` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `psgcCode`, `citymunDesc`, `regDesc`, `provCode`, `citymunCode`) VALUES
(1, '012801000', 'ADAMS', '01', '0128', '012801'),
(2, '012802000', 'BACARRA', '01', '0128', '012802'),
(3, '012803000', 'BADOC', '01', '0128', '012803'),
(4, '012804000', 'BANGUI', '01', '0128', '012804'),
(5, '012805000', 'CITY OF BATAC', '01', '0128', '012805'),
(6, '012806000', 'BURGOS R1', '01', '0128', '012806'),
(7, '012807000', 'CARASI', '01', '0128', '012807'),
(8, '012808000', 'CURRIMAO', '01', '0128', '012808'),
(9, '012809000', 'DINGRAS', '01', '0128', '012809'),
(10, '012810000', 'DUMALNEG', '01', '0128', '012810'),
(11, '012811000', 'BANNA (ESPIRITU)', '01', '0128', '012811'),
(12, '012812000', 'LAOAG CITY (Capital) R1', '01', '0128', '012812'),
(13, '012813000', 'MARCOS', '01', '0128', '012813'),
(14, '012814000', 'NUEVA ERA', '01', '0128', '012814'),
(15, '012815000', 'PAGUDPUD', '01', '0128', '012815'),
(16, '012816000', 'PAOAY', '01', '0128', '012816'),
(17, '012817000', 'PASUQUIN', '01', '0128', '012817'),
(18, '012818000', 'PIDDIG', '01', '0128', '012818'),
(19, '012819000', 'PINILI', '01', '0128', '012819'),
(20, '012820000', 'SAN NICOLAS', '01', '0128', '012820'),
(21, '012821000', 'SARRAT', '01', '0128', '012821'),
(22, '012822000', 'SOLSONA', '01', '0128', '012822'),
(23, '012823000', 'VINTAR', '01', '0128', '012823'),
(24, '012901000', 'ALILEM', '01', '0129', '012901'),
(25, '012902000', 'BANAYOYO', '01', '0129', '012902'),
(26, '012903000', 'BANTAY', '01', '0129', '012903'),
(28, '012905000', 'CABUGAO', '01', '0129', '012905'),
(29, '012906000', 'CITY OF CANDON', '01', '0129', '012906'),
(30, '012907000', 'CAOAYAN', '01', '0129', '012907'),
(31, '012908000', 'CERVANTES', '01', '0129', '012908'),
(32, '012909000', 'GALIMUYOD', '01', '0129', '012909'),
(33, '012910000', 'GREGORIO DEL PILAR (CONCEPCION)', '01', '0129', '012910'),
(34, '012911000', 'LIDLIDDA', '01', '0129', '012911'),
(35, '012912000', 'MAGSINGAL', '01', '0129', '012912'),
(36, '012913000', 'NAGBUKEL', '01', '0129', '012913'),
(37, '012914000', 'NARVACAN', '01', '0129', '012914'),
(38, '012915000', 'QUIRINO (ANGKAKI)', '01', '0129', '012915'),
(39, '012916000', 'SALCEDO (BAUGEN)', '01', '0129', '012916'),
(40, '012917000', 'SAN EMILIO', '01', '0129', '012917'),
(41, '012918000', 'SAN ESTEBAN', '01', '0129', '012918'),
(42, '012919000', 'SAN ILDEFONSO', '01', '0129', '012919'),
(43, '012920000', 'SAN JUAN (LAPOG)', '01', '0129', '012920'),
(44, '012921000', 'SAN VICENTE', '01', '0129', '012921'),
(45, '012922000', 'SANTA', '01', '0129', '012922'),
(46, '012923000', 'SANTA CATALINA', '01', '0129', '012923'),
(47, '012924000', 'SANTA CRUZ', '01', '0129', '012924'),
(48, '012925000', 'SANTA LUCIA', '01', '0129', '012925'),
(49, '012926000', 'SANTA MARIA', '01', '0129', '012926'),
(50, '012927000', 'SANTIAGO', '01', '0129', '012927'),
(51, '012928000', 'SANTO DOMINGO', '01', '0129', '012928'),
(52, '012929000', 'SIGAY', '01', '0129', '012929'),
(53, '012930000', 'SINAIT', '01', '0129', '012930'),
(54, '012931000', 'SUGPON', '01', '0129', '012931'),
(55, '012932000', 'SUYO', '01', '0129', '012932'),
(56, '012933000', 'TAGUDIN', '01', '0129', '012933'),
(57, '012934000', 'CITY OF VIGAN (Capital)', '01', '0129', '012934'),
(58, '013301000', 'AGOO', '01', '0133', '013301'),
(59, '013302000', 'ARINGAY', '01', '0133', '013302'),
(60, '013303000', 'BACNOTAN', '01', '0133', '013303'),
(61, '013304000', 'BAGULIN', '01', '0133', '013304'),
(62, '013305000', 'BALAOAN', '01', '0133', '013305'),
(63, '013306000', 'BANGAR', '01', '0133', '013306'),
(64, '013307000', 'BAUANG', '01', '0133', '013307'),
(66, '013309000', 'CABA', '01', '0133', '013309'),
(67, '013310000', 'LUNA R1', '01', '0133', '013310'),
(68, '013311000', 'NAGUILIAN', '01', '0133', '013311'),
(69, '013312000', 'PUGO', '01', '0133', '013312'),
(70, '013313000', 'ROSARIO', '01', '0133', '013313'),
(71, '013314000', 'CITY OF SAN FERNANDO (Capital)', '01', '0133', '013314'),
(72, '013315000', 'SAN GABRIEL', '01', '0133', '013315'),
(73, '013316000', 'SAN JUAN', '01', '0133', '013316'),
(74, '013317000', 'SANTO TOMAS', '01', '0133', '013317'),
(75, '013318000', 'SANTOL', '01', '0133', '013318'),
(76, '013319000', 'SUDIPEN', '01', '0133', '013319'),
(77, '013320000', 'TUBAO', '01', '0133', '013320'),
(78, '015501000', 'AGNO', '01', '0155', '015501'),
(79, '015502000', 'AGUILAR', '01', '0155', '015502'),
(80, '015503000', 'CITY OF ALAMINOS', '01', '0155', '015503'),
(81, '015504000', 'ALCALA', '01', '0155', '015504'),
(82, '015505000', 'ANDA R1', '01', '0155', '015505'),
(83, '015506000', 'ASINGAN', '01', '0155', '015506'),
(84, '015507000', 'BALUNGAO', '01', '0155', '015507'),
(85, '015508000', 'BANI', '01', '0155', '015508'),
(86, '015509000', 'BASISTA', '01', '0155', '015509'),
(87, '015510000', 'BAUTISTA', '01', '0155', '015510'),
(88, '015511000', 'BAYAMBANG', '01', '0155', '015511'),
(89, '015512000', 'BINALONAN', '01', '0155', '015512'),
(90, '015513000', 'BINMALEY', '01', '0155', '015513'),
(91, '015514000', 'BOLINAO', '01', '0155', '015514'),
(92, '015515000', 'BUGALLON', '01', '0155', '015515'),
(94, '015517000', 'CALASIAO', '01', '0155', '015517'),
(95, '015518000', 'DAGUPAN CITY', '01', '0155', '015518'),
(96, '015519000', 'DASOL', '01', '0155', '015519'),
(97, '015520000', 'INFANTA R1', '01', '0155', '015520'),
(98, '015521000', 'LABRADOR', '01', '0155', '015521'),
(99, '015522000', 'LINGAYEN (Capital)', '01', '0155', '015522'),
(100, '015523000', 'MABINI R1', '01', '0155', '015523'),
(101, '015524000', 'MALASIQUI', '01', '0155', '015524'),
(102, '015525000', 'MANAOAG', '01', '0155', '015525'),
(103, '015526000', 'MANGALDAN', '01', '0155', '015526'),
(104, '015527000', 'MANGATAREM', '01', '0155', '015527'),
(105, '015528000', 'MAPANDAN', '01', '0155', '015528'),
(106, '015529000', 'NATIVIDAD', '01', '0155', '015529'),
(107, '015530000', 'POZORRUBIO', '01', '0155', '015530'),
(108, '015531000', 'ROSALES', '01', '0155', '015531'),
(109, '015532000', 'SAN CARLOS CITY', '01', '0155', '015532'),
(110, '015533000', 'SAN FABIAN', '01', '0155', '015533'),
(111, '015534000', 'SAN JACINTO', '01', '0155', '015534'),
(112, '015535000', 'SAN MANUEL', '01', '0155', '015535'),
(113, '015536000', 'SAN NICOLAS', '01', '0155', '015536'),
(114, '015537000', 'SAN QUINTIN', '01', '0155', '015537'),
(115, '015538000', 'SANTA BARBARA', '01', '0155', '015538'),
(116, '015539000', 'SANTA MARIA', '01', '0155', '015539'),
(117, '015540000', 'SANTO TOMAS', '01', '0155', '015540'),
(118, '015541000', 'SISON', '01', '0155', '015541'),
(119, '015542000', 'SUAL', '01', '0155', '015542'),
(120, '015543000', 'TAYUG', '01', '0155', '015543'),
(121, '015544000', 'UMINGAN', '01', '0155', '015544'),
(122, '015545000', 'URBIZTONDO', '01', '0155', '015545'),
(123, '015546000', 'CITY OF URDANETA', '01', '0155', '015546'),
(124, '015547000', 'VILLASIS', '01', '0155', '015547'),
(125, '015548000', 'LAOAC', '01', '0155', '015548'),
(126, '020901000', 'BASCO (Capital)', '02', '0209', '020901'),
(127, '020902000', 'ITBAYAT', '02', '0209', '020902'),
(128, '020903000', 'IVANA', '02', '0209', '020903'),
(129, '020904000', 'MAHATAO', '02', '0209', '020904'),
(130, '020905000', 'SABTANG', '02', '0209', '020905'),
(131, '020906000', 'UYUGAN', '02', '0209', '020906'),
(132, '021501000', 'ABULUG', '02', '0215', '021501'),
(133, '021502000', 'ALCALA', '02', '0215', '021502'),
(134, '021503000', 'ALLACAPAN', '02', '0215', '021503'),
(135, '021504000', 'AMULUNG', '02', '0215', '021504'),
(136, '021505000', 'APARRI', '02', '0215', '021505'),
(137, '021506000', 'BAGGAO', '02', '0215', '021506'),
(138, '021507000', 'BALLESTEROS', '02', '0215', '021507'),
(139, '021508000', 'BUGUEY', '02', '0215', '021508'),
(140, '021509000', 'CALAYAN', '02', '0215', '021509'),
(141, '021510000', 'CAMALANIUGAN', '02', '0215', '021510'),
(142, '021511000', 'CLAVERIA R2', '02', '0215', '021511'),
(143, '021512000', 'ENRILE', '02', '0215', '021512'),
(144, '021513000', 'GATTARAN', '02', '0215', '021513'),
(145, '021514000', 'GONZAGA', '02', '0215', '021514'),
(146, '021515000', 'IGUIG', '02', '0215', '021515'),
(147, '021516000', 'LAL-LO', '02', '0215', '021516'),
(148, '021517000', 'LASAM', '02', '0215', '021517'),
(149, '021518000', 'PAMPLONA', '02', '0215', '021518'),
(150, '021519000', 'PEÃ‘ABLANCA', '02', '0215', '021519'),
(151, '021520000', 'PIAT', '02', '0215', '021520'),
(152, '021521000', 'RIZAL', '02', '0215', '021521'),
(153, '021522000', 'SANCHEZ-MIRA', '02', '0215', '021522'),
(154, '021523000', 'SANTA ANA', '02', '0215', '021523'),
(155, '021524000', 'SANTA PRAXEDES', '02', '0215', '021524'),
(156, '021525000', 'SANTA TERESITA', '02', '0215', '021525'),
(157, '021526000', 'SANTO NIÃ‘O (FAIRE)', '02', '0215', '021526'),
(158, '021527000', 'SOLANA', '02', '0215', '021527'),
(159, '021528000', 'TUAO', '02', '0215', '021528'),
(160, '021529000', 'TUGUEGARAO CITY (Capital)', '02', '0215', '021529'),
(161, '023101000', 'ALICIA R2', '02', '0231', '023101'),
(162, '023102000', 'ANGADANAN', '02', '0231', '023102'),
(163, '023103000', 'AURORA R2', '02', '0231', '023103'),
(164, '023104000', 'BENITO SOLIVEN', '02', '0231', '023104'),
(165, '023105000', 'BURGOS R2', '02', '0231', '023105'),
(166, '023106000', 'CABAGAN', '02', '0231', '023106'),
(167, '023107000', 'CABATUAN', '02', '0231', '023107'),
(168, '023108000', 'CITY OF CAUAYAN', '02', '0231', '023108'),
(169, '023109000', 'CORDON', '02', '0231', '023109'),
(170, '023110000', 'DINAPIGUE', '02', '0231', '023110'),
(171, '023111000', 'DIVILACAN', '02', '0231', '023111'),
(172, '023112000', 'ECHAGUE', '02', '0231', '023112'),
(173, '023113000', 'GAMU', '02', '0231', '023113'),
(174, '023114000', 'ILAGAN CITY (Capital)', '02', '0231', '023114'),
(175, '023115000', 'JONES', '02', '0231', '023115'),
(176, '023116000', 'LUNA R2', '02', '0231', '023116'),
(177, '023117000', 'MACONACON', '02', '0231', '023117'),
(178, '023118000', 'DELFIN ALBANO (MAGSAYSAY)', '02', '0231', '023118'),
(179, '023119000', 'MALLIG', '02', '0231', '023119'),
(180, '023120000', 'NAGUILIAN', '02', '0231', '023120'),
(181, '023121000', 'PALANAN', '02', '0231', '023121'),
(182, '023122000', 'QUEZON', '02', '0231', '023122'),
(183, '023123000', 'QUIRINO', '02', '0231', '023123'),
(184, '023124000', 'RAMON', '02', '0231', '023124'),
(185, '023125000', 'REINA MERCEDES', '02', '0231', '023125'),
(186, '023126000', 'ROXAS', '02', '0231', '023126'),
(187, '023127000', 'SAN AGUSTIN', '02', '0231', '023127'),
(188, '023128000', 'SAN GUILLERMO', '02', '0231', '023128'),
(189, '023129000', 'SAN ISIDRO', '02', '0231', '023129'),
(190, '023130000', 'SAN MANUEL', '02', '0231', '023130'),
(191, '023131000', 'SAN MARIANO', '02', '0231', '023131'),
(192, '023132000', 'SAN MATEO', '02', '0231', '023132'),
(193, '023133000', 'SAN PABLO', '02', '0231', '023133'),
(194, '023134000', 'SANTA MARIA', '02', '0231', '023134'),
(195, '023135000', 'CITY OF SANTIAGO', '02', '0231', '023135'),
(196, '023136000', 'SANTO TOMAS', '02', '0231', '023136'),
(197, '023137000', 'TUMAUINI', '02', '0231', '023137'),
(198, '025001000', 'AMBAGUIO', '02', '0250', '025001'),
(199, '025002000', 'ARITAO', '02', '0250', '025002'),
(200, '025003000', 'BAGABAG', '02', '0250', '025003'),
(201, '025004000', 'BAMBANG', '02', '0250', '025004'),
(202, '025005000', 'BAYOMBONG (Capital)', '02', '0250', '025005'),
(203, '025006000', 'DIADI', '02', '0250', '025006'),
(204, '025007000', 'DUPAX DEL NORTE', '02', '0250', '025007'),
(205, '025008000', 'DUPAX DEL SUR', '02', '0250', '025008'),
(206, '025009000', 'KASIBU', '02', '0250', '025009'),
(207, '025010000', 'KAYAPA', '02', '0250', '025010'),
(208, '025011000', 'QUEZON', '02', '0250', '025011'),
(209, '025012000', 'SANTA FE', '02', '0250', '025012'),
(210, '025013000', 'SOLANO', '02', '0250', '025013'),
(211, '025014000', 'VILLAVERDE', '02', '0250', '025014'),
(212, '025015000', 'ALFONSO CASTANEDA', '02', '0250', '025015'),
(213, '025701000', 'AGLIPAY', '02', '0257', '025701'),
(214, '025702000', 'CABARROGUIS (Capital)', '02', '0257', '025702'),
(215, '025703000', 'DIFFUN', '02', '0257', '025703'),
(216, '025704000', 'MADDELA', '02', '0257', '025704'),
(217, '025705000', 'SAGUDAY', '02', '0257', '025705'),
(218, '025706000', 'NAGTIPUNAN', '02', '0257', '025706'),
(219, '030801000', 'ABUCAY', '03', '0308', '030801'),
(220, '030802000', 'BAGAC', '03', '0308', '030802'),
(221, '030803000', 'CITY OF BALANGA (Capital)', '03', '0308', '030803'),
(222, '030804000', 'DINALUPIHAN', '03', '0308', '030804'),
(223, '030805000', 'HERMOSA', '03', '0308', '030805'),
(224, '030806000', 'LIMAY', '03', '0308', '030806'),
(225, '030807000', 'MARIVELES', '03', '0308', '030807'),
(226, '030808000', 'MORONG R3', '03', '0308', '030808'),
(227, '030809000', 'ORANI', '03', '0308', '030809'),
(228, '030810000', 'ORION', '03', '0308', '030810'),
(229, '030811000', 'PILAR', '03', '0308', '030811'),
(230, '030812000', 'SAMAL', '03', '0308', '030812'),
(231, '031401000', 'ANGAT', '03', '0314', '031401'),
(232, '031402000', 'BALAGTAS (BIGAA)', '03', '0314', '031402'),
(233, '031403000', 'BALIUAG', '03', '0314', '031403'),
(234, '031404000', 'BOCAUE', '03', '0314', '031404'),
(235, '031405000', 'BULACAN', '03', '0314', '031405'),
(236, '031406000', 'BUSTOS', '03', '0314', '031406'),
(237, '031407000', 'CALUMPIT', '03', '0314', '031407'),
(238, '031408000', 'GUIGUINTO', '03', '0314', '031408'),
(239, '031409000', 'HAGONOY R3', '03', '0314', '031409'),
(240, '031410000', 'CITY OF MALOLOS (Capital)', '03', '0314', '031410'),
(241, '031411000', 'MARILAO', '03', '0314', '031411'),
(242, '031412000', 'CITY OF MEYCAUAYAN', '03', '0314', '031412'),
(243, '031413000', 'NORZAGARAY', '03', '0314', '031413'),
(244, '031414000', 'OBANDO', '03', '0314', '031414'),
(245, '031415000', 'PANDI', '03', '0314', '031415'),
(246, '031416000', 'PAOMBONG', '03', '0314', '031416'),
(247, '031417000', 'PLARIDEL', '03', '0314', '031417'),
(248, '031418000', 'PULILAN', '03', '0314', '031418'),
(249, '031419000', 'SAN ILDEFONSO', '03', '0314', '031419'),
(250, '031420000', 'CITY OF SAN JOSE DEL MONTE', '03', '0314', '031420'),
(251, '031421000', 'SAN MIGUEL', '03', '0314', '031421'),
(252, '031422000', 'SAN RAFAEL', '03', '0314', '031422'),
(253, '031423000', 'SANTA MARIA', '03', '0314', '031423'),
(254, '031424000', 'DOÃ‘A REMEDIOS TRINIDAD', '03', '0314', '031424'),
(255, '034901000', 'ALIAGA', '03', '0349', '034901'),
(256, '034902000', 'BONGABON', '03', '0349', '034902'),
(257, '034903000', 'CABANATUAN CITY', '03', '0349', '034903'),
(258, '034904000', 'CABIAO', '03', '0349', '034904'),
(259, '034905000', 'CARRANGLAN', '03', '0349', '034905'),
(260, '034906000', 'CUYAPO', '03', '0349', '034906'),
(261, '034907000', 'GABALDON (BITULOK & SABANI)', '03', '0349', '034907'),
(262, '034908000', 'CITY OF GAPAN', '03', '0349', '034908'),
(263, '034909000', 'GENERAL MAMERTO NATIVIDAD', '03', '0349', '034909'),
(264, '034910000', 'GENERAL TINIO (PAPAYA)', '03', '0349', '034910'),
(265, '034911000', 'GUIMBA', '03', '0349', '034911'),
(266, '034912000', 'JAEN', '03', '0349', '034912'),
(267, '034913000', 'LAUR', '03', '0349', '034913'),
(268, '034914000', 'LICAB', '03', '0349', '034914'),
(269, '034915000', 'LLANERA', '03', '0349', '034915'),
(270, '034916000', 'LUPAO', '03', '0349', '034916'),
(271, '034917000', 'SCIENCE CITY OF MUÃ‘OZ', '03', '0349', '034917'),
(272, '034918000', 'NAMPICUAN', '03', '0349', '034918'),
(273, '034919000', 'PALAYAN CITY (Capital)', '03', '0349', '034919'),
(274, '034920000', 'PANTABANGAN', '03', '0349', '034920'),
(275, '034921000', 'PEÃ‘ARANDA', '03', '0349', '034921'),
(276, '034922000', 'QUEZON', '03', '0349', '034922'),
(277, '034923000', 'RIZAL', '03', '0349', '034923'),
(278, '034924000', 'SAN ANTONIO', '03', '0349', '034924'),
(279, '034925000', 'SAN ISIDRO', '03', '0349', '034925'),
(280, '034926000', 'SAN JOSE CITY', '03', '0349', '034926'),
(281, '034927000', 'SAN LEONARDO', '03', '0349', '034927'),
(282, '034928000', 'SANTA ROSA', '03', '0349', '034928'),
(283, '034929000', 'SANTO DOMINGO', '03', '0349', '034929'),
(284, '034930000', 'TALAVERA', '03', '0349', '034930'),
(285, '034931000', 'TALUGTUG', '03', '0349', '034931'),
(286, '034932000', 'ZARAGOZA', '03', '0349', '034932'),
(287, '035401000', 'ANGELES CITY', '03', '0354', '035401'),
(288, '035402000', 'APALIT', '03', '0354', '035402'),
(289, '035403000', 'ARAYAT', '03', '0354', '035403'),
(290, '035404000', 'BACOLOR', '03', '0354', '035404'),
(291, '035405000', 'CANDABA', '03', '0354', '035405'),
(292, '035406000', 'FLORIDABLANCA', '03', '0354', '035406'),
(293, '035407000', 'GUAGUA', '03', '0354', '035407'),
(294, '035408000', 'LUBAO', '03', '0354', '035408'),
(295, '035409000', 'MABALACAT CITY', '03', '0354', '035409'),
(296, '035410000', 'MACABEBE', '03', '0354', '035410'),
(297, '035411000', 'MAGALANG', '03', '0354', '035411'),
(298, '035412000', 'MASANTOL', '03', '0354', '035412'),
(299, '035413000', 'MEXICO', '03', '0354', '035413'),
(300, '035414000', 'MINALIN', '03', '0354', '035414'),
(301, '035415000', 'PORAC', '03', '0354', '035415'),
(302, '035416000', 'CITY OF SAN FERNANDO (Capital)', '03', '0354', '035416'),
(303, '035417000', 'SAN LUIS', '03', '0354', '035417'),
(304, '035418000', 'SAN SIMON', '03', '0354', '035418'),
(305, '035419000', 'SANTA ANA', '03', '0354', '035419'),
(306, '035420000', 'SANTA RITA', '03', '0354', '035420'),
(307, '035421000', 'SANTO TOMAS', '03', '0354', '035421'),
(308, '035422000', 'SASMUAN (Sexmoan)', '03', '0354', '035422'),
(309, '036901000', 'ANAO', '03', '0369', '036901'),
(310, '036902000', 'BAMBAN', '03', '0369', '036902'),
(311, '036903000', 'CAMILING', '03', '0369', '036903'),
(312, '036904000', 'CAPAS', '03', '0369', '036904'),
(313, '036905000', 'CONCEPCION R3', '03', '0369', '036905'),
(314, '036906000', 'GERONA', '03', '0369', '036906'),
(315, '036907000', 'LA PAZ R3', '03', '0369', '036907'),
(316, '036908000', 'MAYANTOC', '03', '0369', '036908'),
(317, '036909000', 'MONCADA', '03', '0369', '036909'),
(318, '036910000', 'PANIQUI', '03', '0369', '036910'),
(319, '036911000', 'PURA', '03', '0369', '036911'),
(320, '036912000', 'RAMOS', '03', '0369', '036912'),
(321, '036913000', 'SAN CLEMENTE', '03', '0369', '036913'),
(322, '036914000', 'SAN MANUEL', '03', '0369', '036914'),
(323, '036915000', 'SANTA IGNACIA', '03', '0369', '036915'),
(324, '036916000', 'CITY OF TARLAC (Capital)', '03', '0369', '036916'),
(325, '036917000', 'VICTORIA', '03', '0369', '036917'),
(326, '036918000', 'SAN JOSE', '03', '0369', '036918'),
(327, '037101000', 'BOTOLAN', '03', '0371', '037101'),
(328, '037102000', 'CABANGAN', '03', '0371', '037102'),
(329, '037103000', 'CANDELARIA R3', '03', '0371', '037103'),
(330, '037104000', 'CASTILLEJOS', '03', '0371', '037104'),
(331, '037105000', 'IBA (Capital)', '03', '0371', '037105'),
(332, '037106000', 'MASINLOC', '03', '0371', '037106'),
(333, '037107000', 'OLONGAPO CITY', '03', '0371', '037107'),
(334, '037108000', 'PALAUIG', '03', '0371', '037108'),
(335, '037109000', 'SAN ANTONIO', '03', '0371', '037109'),
(336, '037110000', 'SAN FELIPE', '03', '0371', '037110'),
(337, '037111000', 'SAN MARCELINO', '03', '0371', '037111'),
(338, '037112000', 'SAN NARCISO', '03', '0371', '037112'),
(339, '037113000', 'SANTA CRUZ', '03', '0371', '037113'),
(340, '037114000', 'SUBIC', '03', '0371', '037114'),
(341, '037701000', 'BALER (Capital)', '03', '0377', '037701'),
(342, '037702000', 'CASIGURAN', '03', '0377', '037702'),
(343, '037703000', 'DILASAG', '03', '0377', '037703'),
(344, '037704000', 'DINALUNGAN', '03', '0377', '037704'),
(345, '037705000', 'DINGALAN', '03', '0377', '037705'),
(346, '037706000', 'DIPACULAO', '03', '0377', '037706'),
(347, '037707000', 'MARIA AURORA', '03', '0377', '037707'),
(348, '037708000', 'SAN LUIS', '03', '0377', '037708'),
(349, '041001000', 'AGONCILLO', '04', '0410', '041001'),
(350, '041002000', 'ALITAGTAG', '04', '0410', '041002'),
(351, '041003000', 'BALAYAN', '04', '0410', '041003'),
(352, '041004000', 'BALETE R4', '04', '0410', '041004'),
(353, '041005000', 'BATANGAS CITY (Capital)', '04', '0410', '041005'),
(354, '041006000', 'BAUAN', '04', '0410', '041006'),
(355, '041007000', 'CALACA', '04', '0410', '041007'),
(356, '041008000', 'CALATAGAN', '04', '0410', '041008'),
(357, '041009000', 'CUENCA', '04', '0410', '041009'),
(358, '041010000', 'IBAAN', '04', '0410', '041010'),
(359, '041011000', 'LAUREL', '04', '0410', '041011'),
(360, '041012000', 'LEMERY R4', '04', '0410', '041012'),
(361, '041013000', 'LIAN', '04', '0410', '041013'),
(362, '041014000', 'LIPA CITY', '04', '0410', '041014'),
(363, '041015000', 'LOBO', '04', '0410', '041015'),
(364, '041016000', 'MABINI R4', '04', '0410', '041016'),
(365, '041017000', 'MALVAR', '04', '0410', '041017'),
(366, '041018000', 'MATAASNAKAHOY', '04', '0410', '041018'),
(367, '041019000', 'NASUGBU', '04', '0410', '041019'),
(368, '041020000', 'PADRE GARCIA', '04', '0410', '041020'),
(369, '041021000', 'ROSARIO', '04', '0410', '041021'),
(370, '041022000', 'SAN JOSE', '04', '0410', '041022'),
(371, '041023000', 'SAN JUAN', '04', '0410', '041023'),
(372, '041024000', 'SAN LUIS', '04', '0410', '041024'),
(373, '041025000', 'SAN NICOLAS', '04', '0410', '041025'),
(374, '041026000', 'SAN PASCUAL', '04', '0410', '041026'),
(375, '041027000', 'SANTA TERESITA', '04', '0410', '041027'),
(376, '041028000', 'SANTO TOMAS', '04', '0410', '041028'),
(377, '041029000', 'TAAL', '04', '0410', '041029'),
(378, '041030000', 'TALISAY', '04', '0410', '041030'),
(379, '041031000', 'CITY OF TANAUAN', '04', '0410', '041031'),
(380, '041032000', 'TAYSAN', '04', '0410', '041032'),
(381, '041033000', 'TINGLOY', '04', '0410', '041033'),
(382, '041034000', 'TUY', '04', '0410', '041034'),
(383, '042101000', 'ALFONSO', '04', '0421', '042101'),
(384, '042102000', 'AMADEO', '04', '0421', '042102'),
(385, '042103000', 'BACOOR CITY', '04', '0421', '042103'),
(386, '042104000', 'CARMONA', '04', '0421', '042104'),
(387, '042105000', 'CAVITE CITY', '04', '0421', '042105'),
(388, '042106000', 'CITY OF DASMARIÃ‘AS', '04', '0421', '042106'),
(389, '042107000', 'GENERAL EMILIO AGUINALDO', '04', '0421', '042107'),
(390, '042108000', 'GENERAL TRIAS', '04', '0421', '042108'),
(391, '042109000', 'IMUS CITY', '04', '0421', '042109'),
(392, '042110000', 'INDANG', '04', '0421', '042110'),
(393, '042111000', 'KAWIT', '04', '0421', '042111'),
(394, '042112000', 'MAGALLANES R4', '04', '0421', '042112'),
(395, '042113000', 'MARAGONDON', '04', '0421', '042113'),
(396, '042114000', 'MENDEZ (MENDEZ-NUÃ‘EZ)', '04', '0421', '042114'),
(397, '042115000', 'NAIC', '04', '0421', '042115'),
(398, '042116000', 'NOVELETA', '04', '0421', '042116'),
(399, '042117000', 'ROSARIO', '04', '0421', '042117'),
(400, '042118000', 'SILANG', '04', '0421', '042118'),
(401, '042119000', 'TAGAYTAY CITY', '04', '0421', '042119'),
(402, '042120000', 'TANZA', '04', '0421', '042120'),
(403, '042121000', 'TERNATE', '04', '0421', '042121'),
(404, '042122000', 'TRECE MARTIRES CITY (Capital)', '04', '0421', '042122'),
(405, '042123000', 'GEN. MARIANO ALVAREZ', '04', '0421', '042123'),
(406, '043401000', 'ALAMINOS', '04', '0434', '043401'),
(407, '043402000', 'BAY', '04', '0434', '043402'),
(408, '043403000', 'CITY OF BIÃ‘AN', '04', '0434', '043403'),
(409, '043404000', 'CABUYAO CITY', '04', '0434', '043404'),
(410, '043405000', 'CITY OF CALAMBA', '04', '0434', '043405'),
(411, '043406000', 'CALAUAN', '04', '0434', '043406'),
(412, '043407000', 'CAVINTI', '04', '0434', '043407'),
(413, '043408000', 'FAMY', '04', '0434', '043408'),
(414, '043409000', 'KALAYAAN R4', '04', '0434', '043409'),
(415, '043410000', 'LILIW', '04', '0434', '043410'),
(416, '043411000', 'LOS BAÃ‘OS', '04', '0434', '043411'),
(417, '043412000', 'LUISIANA', '04', '0434', '043412'),
(418, '043413000', 'LUMBAN', '04', '0434', '043413'),
(419, '043414000', 'MABITAC', '04', '0434', '043414'),
(420, '043415000', 'MAGDALENA', '04', '0434', '043415'),
(421, '043416000', 'MAJAYJAY', '04', '0434', '043416'),
(422, '043417000', 'NAGCARLAN', '04', '0434', '043417'),
(423, '043418000', 'PAETE', '04', '0434', '043418'),
(424, '043419000', 'PAGSANJAN', '04', '0434', '043419'),
(425, '043420000', 'PAKIL', '04', '0434', '043420'),
(426, '043421000', 'PANGIL', '04', '0434', '043421'),
(427, '043422000', 'PILA', '04', '0434', '043422'),
(428, '043423000', 'RIZAL', '04', '0434', '043423'),
(429, '043424000', 'SAN PABLO CITY', '04', '0434', '043424'),
(430, '043425000', 'CITY OF SAN PEDRO', '04', '0434', '043425'),
(431, '043426000', 'SANTA CRUZ (Capital)', '04', '0434', '043426'),
(432, '043427000', 'SANTA MARIA', '04', '0434', '043427'),
(433, '043428000', 'CITY OF SANTA ROSA', '04', '0434', '043428'),
(434, '043429000', 'SINILOAN', '04', '0434', '043429'),
(435, '043430000', 'VICTORIA', '04', '0434', '043430'),
(436, '045601000', 'AGDANGAN', '04', '0456', '045601'),
(437, '045602000', 'ALABAT', '04', '0456', '045602'),
(438, '045603000', 'ATIMONAN', '04', '0456', '045603'),
(439, '045605000', 'BUENAVISTA R4', '04', '0456', '045605'),
(440, '045606000', 'BURDEOS', '04', '0456', '045606'),
(441, '045607000', 'CALAUAG', '04', '0456', '045607'),
(442, '045608000', 'CANDELARIA R4', '04', '0456', '045608'),
(443, '045610000', 'CATANAUAN', '04', '0456', '045610'),
(444, '045615000', 'DOLORES R4', '04', '0456', '045615'),
(445, '045616000', 'GENERAL LUNA R4A', '04', '0456', '045616'),
(446, '045617000', 'GENERAL NAKAR', '04', '0456', '045617'),
(447, '045618000', 'GUINAYANGAN', '04', '0456', '045618'),
(448, '045619000', 'GUMACA', '04', '0456', '045619'),
(449, '045620000', 'INFANTA R4', '04', '0456', '045620'),
(450, '045621000', 'JOMALIG', '04', '0456', '045621'),
(451, '045622000', 'LOPEZ', '04', '0456', '045622'),
(452, '045623000', 'LUCBAN', '04', '0456', '045623'),
(453, '045624000', 'LUCENA CITY (Capital)', '04', '0456', '045624'),
(454, '045625000', 'MACALELON', '04', '0456', '045625'),
(455, '045627000', 'MAUBAN', '04', '0456', '045627'),
(456, '045628000', 'MULANAY', '04', '0456', '045628'),
(457, '045629000', 'PADRE BURGOS', '04', '0456', '045629'),
(458, '045630000', 'PAGBILAO', '04', '0456', '045630'),
(459, '045631000', 'PANUKULAN', '04', '0456', '045631'),
(460, '045632000', 'PATNANUNGAN', '04', '0456', '045632'),
(461, '045633000', 'PEREZ', '04', '0456', '045633'),
(462, '045634000', 'PITOGO', '04', '0456', '045634'),
(463, '045635000', 'PLARIDEL', '04', '0456', '045635'),
(464, '045636000', 'POLILLO', '04', '0456', '045636'),
(465, '045637000', 'QUEZON', '04', '0456', '045637'),
(466, '045638000', 'REAL', '04', '0456', '045638'),
(467, '045639000', 'SAMPALOC', '04', '0456', '045639'),
(468, '045640000', 'SAN ANDRES', '04', '0456', '045640'),
(469, '045641000', 'SAN ANTONIO', '04', '0456', '045641'),
(470, '045642000', 'SAN FRANCISCO (AURORA)', '04', '0456', '045642'),
(471, '045644000', 'SAN NARCISO', '04', '0456', '045644'),
(472, '045645000', 'SARIAYA', '04', '0456', '045645'),
(473, '045646000', 'TAGKAWAYAN', '04', '0456', '045646'),
(474, '045647000', 'CITY OF TAYABAS', '04', '0456', '045647'),
(475, '045648000', 'TIAONG', '04', '0456', '045648'),
(476, '045649000', 'UNISAN', '04', '0456', '045649'),
(477, '045801000', 'ANGONO', '04', '0458', '045801'),
(478, '045802000', 'CITY OF ANTIPOLO', '04', '0458', '045802'),
(479, '045803000', 'BARAS R4', '04', '0458', '045803'),
(480, '045804000', 'BINANGONAN', '04', '0458', '045804'),
(481, '045805000', 'CAINTA', '04', '0458', '045805'),
(482, '045806000', 'CARDONA', '04', '0458', '045806'),
(483, '045807000', 'JALA-JALA', '04', '0458', '045807'),
(484, '045808000', 'RODRIGUEZ (MONTALBAN)', '04', '0458', '045808'),
(485, '045809000', 'MORONG R4', '04', '0458', '045809'),
(486, '045810000', 'PILILLA', '04', '0458', '045810'),
(487, '045811000', 'SAN MATEO', '04', '0458', '045811'),
(488, '045812000', 'TANAY', '04', '0458', '045812'),
(489, '045813000', 'TAYTAY', '04', '0458', '045813'),
(490, '045814000', 'TERESA', '04', '0458', '045814'),
(491, '174001000', 'BOAC (Capital)', '17a', '1740', '174001'),
(492, '174002000', 'BUENAVISTA R4B', '17a', '1740', '174002'),
(493, '174003000', 'GASAN', '17a', '1740', '174003'),
(494, '174004000', 'MOGPOG', '17a', '1740', '174004'),
(495, '174005000', 'SANTA CRUZ', '17a', '1740', '174005'),
(496, '174006000', 'TORRIJOS', '17a', '1740', '174006'),
(497, '175101000', 'ABRA DE ILOG', '17a', '1751', '175101'),
(498, '175102000', 'CALINTAAN', '17a', '1751', '175102'),
(499, '175103000', 'LOOC', '17a', '1751', '175103'),
(500, '175104000', 'LUBANG', '17a', '1751', '175104'),
(501, '175105000', 'MAGSAYSAY R4B', '17a', '1751', '175105'),
(502, '175106000', 'MAMBURAO (Capital)', '17a', '1751', '175106'),
(503, '175107000', 'PALUAN', '17a', '1751', '175107'),
(504, '175108000', 'RIZAL', '17a', '1751', '175108'),
(505, '175109000', 'SABLAYAN', '17a', '1751', '175109'),
(506, '175110000', 'SAN JOSE', '17a', '1751', '175110'),
(507, '175111000', 'SANTA CRUZ', '17a', '1751', '175111'),
(508, '175201000', 'BACO', '17a', '1752', '175201'),
(509, '175202000', 'BANSUD', '17a', '1752', '175202'),
(510, '175203000', 'BONGABONG', '17a', '1752', '175203'),
(511, '175204000', 'BULALACAO (SAN PEDRO)', '17a', '1752', '175204'),
(512, '175205000', 'CITY OF CALAPAN (Capital)', '17a', '1752', '175205'),
(513, '175206000', 'GLORIA', '17a', '1752', '175206'),
(514, '175207000', 'MANSALAY', '17a', '1752', '175207'),
(515, '175208000', 'NAUJAN', '17a', '1752', '175208'),
(516, '175209000', 'PINAMALAYAN', '17a', '1752', '175209'),
(517, '175210000', 'POLA', '17a', '1752', '175210'),
(518, '175211000', 'PUERTO GALERA', '17a', '1752', '175211'),
(519, '175212000', 'ROXAS', '17a', '1752', '175212'),
(520, '175213000', 'SAN TEODORO', '17a', '1752', '175213'),
(521, '175214000', 'SOCORRO', '17a', '1752', '175214'),
(522, '175215000', 'VICTORIA', '17a', '1752', '175215'),
(523, '175301000', 'ABORLAN', '17a', '1753', '175301'),
(524, '175302000', 'AGUTAYA', '17a', '1753', '175302'),
(525, '175303000', 'ARACELI', '17a', '1753', '175303'),
(526, '175304000', 'BALABAC', '17a', '1753', '175304'),
(527, '175305000', 'BATARAZA', '17a', '1753', '175305'),
(528, '175306000', 'BROOKE\'S POINT', '17a', '1753', '175306'),
(529, '175307000', 'BUSUANGA', '17a', '1753', '175307'),
(530, '175308000', 'CAGAYANCILLO', '17a', '1753', '175308'),
(531, '175309000', 'CORON', '17a', '1753', '175309'),
(532, '175310000', 'CUYO', '17a', '1753', '175310'),
(533, '175311000', 'DUMARAN', '17a', '1753', '175311'),
(534, '175312000', 'EL NIDO (BACUIT)', '17a', '1753', '175312'),
(535, '175313000', 'LINAPACAN', '17a', '1753', '175313'),
(537, '175315000', 'NARRA', '17a', '1753', '175315'),
(538, '175316000', 'PUERTO PRINCESA CITY (Capital)', '17a', '1753', '175316'),
(539, '175317000', 'QUEZON', '17a', '1753', '175317'),
(540, '175318000', 'ROXAS', '17a', '1753', '175318'),
(541, '175319000', 'SAN VICENTE', '17a', '1753', '175319'),
(542, '175320000', 'TAYTAY', '17a', '1753', '175320'),
(543, '175321000', 'KALAYAAN R4B', '17a', '1753', '175321'),
(544, '175322000', 'CULION', '17a', '1753', '175322'),
(545, '175323000', 'RIZAL (MARCOS)', '17a', '1753', '175323'),
(546, '175324000', 'SOFRONIO ESPANOLA', '17a', '1753', '175324'),
(547, '175901000', 'ALCANTARA R4B', '17a', '1759', '175901'),
(548, '175902000', 'BANTON', '17a', '1759', '175902'),
(549, '175903000', 'CAJIDIOCAN', '17a', '1759', '175903'),
(550, '175904000', 'CALATRAVA R4B', '17a', '1759', '175904'),
(551, '175905000', 'CONCEPCION R4B', '17a', '1759', '175905'),
(552, '175906000', 'CORCUERA', '17a', '1759', '175906'),
(554, '175908000', 'MAGDIWANG', '17a', '1759', '175908'),
(555, '175909000', 'ODIONGAN', '17a', '1759', '175909'),
(556, '175910000', 'ROMBLON (Capital)', '17a', '1759', '175910'),
(557, '175911000', 'SAN AGUSTIN', '17a', '1759', '175911'),
(558, '175912000', 'SAN ANDRES', '17a', '1759', '175912'),
(559, '175913000', 'SAN FERNANDO', '17a', '1759', '175913'),
(560, '175914000', 'SAN JOSE', '17a', '1759', '175914'),
(561, '175915000', 'SANTA FE', '17a', '1759', '175915'),
(562, '175916000', 'FERROL', '17a', '1759', '175916'),
(563, '175917000', 'SANTA MARIA (IMELDA)', '17a', '1759', '175917'),
(564, '050501000', 'BACACAY', '05', '0505', '050501'),
(565, '050502000', 'CAMALIG', '05', '0505', '050502'),
(566, '050503000', 'DARAGA (LOCSIN)', '05', '0505', '050503'),
(567, '050504000', 'GUINOBATAN', '05', '0505', '050504'),
(568, '050505000', 'JOVELLAR', '05', '0505', '050505'),
(569, '050506000', 'LEGAZPI CITY (Capital)', '05', '0505', '050506'),
(570, '050507000', 'LIBON', '05', '0505', '050507'),
(571, '050508000', 'CITY OF LIGAO', '05', '0505', '050508'),
(572, '050509000', 'MALILIPOT', '05', '0505', '050509'),
(573, '050510000', 'MALINAO R5', '05', '0505', '050510'),
(574, '050511000', 'MANITO', '05', '0505', '050511'),
(575, '050512000', 'OAS', '05', '0505', '050512'),
(576, '050513000', 'PIO DURAN', '05', '0505', '050513'),
(577, '050514000', 'POLANGUI', '05', '0505', '050514'),
(578, '050515000', 'RAPU-RAPU', '05', '0505', '050515'),
(579, '050516000', 'SANTO DOMINGO (LIBOG)', '05', '0505', '050516'),
(580, '050517000', 'CITY OF TABACO', '05', '0505', '050517'),
(581, '050518000', 'TIWI', '05', '0505', '050518'),
(582, '051601000', 'BASUD', '05', '0516', '051601'),
(583, '051602000', 'CAPALONGA', '05', '0516', '051602'),
(584, '051603000', 'DAET (Capital)', '05', '0516', '051603'),
(585, '051604000', 'SAN LORENZO RUIZ (IMELDA)', '05', '0516', '051604'),
(586, '051605000', 'JOSE PANGANIBAN', '05', '0516', '051605'),
(587, '051606000', 'LABO', '05', '0516', '051606'),
(588, '051607000', 'MERCEDES R5', '05', '0516', '051607'),
(589, '051608000', 'PARACALE', '05', '0516', '051608'),
(590, '051609000', 'SAN VICENTE', '05', '0516', '051609'),
(591, '051610000', 'SANTA ELENA', '05', '0516', '051610'),
(592, '051611000', 'TALISAY', '05', '0516', '051611'),
(593, '051612000', 'VINZONS', '05', '0516', '051612'),
(594, '051701000', 'BAAO', '05', '0517', '051701'),
(595, '051702000', 'BALATAN', '05', '0517', '051702'),
(596, '051703000', 'BATO R5', '05', '0517', '051703'),
(597, '051704000', 'BOMBON', '05', '0517', '051704'),
(598, '051705000', 'BUHI', '05', '0517', '051705'),
(599, '051706000', 'BULA', '05', '0517', '051706'),
(600, '051707000', 'CABUSAO', '05', '0517', '051707'),
(601, '051708000', 'CALABANGA', '05', '0517', '051708'),
(602, '051709000', 'CAMALIGAN', '05', '0517', '051709'),
(603, '051710000', 'CANAMAN', '05', '0517', '051710'),
(604, '051711000', 'CARAMOAN', '05', '0517', '051711'),
(605, '051712000', 'DEL GALLEGO', '05', '0517', '051712'),
(606, '051713000', 'GAINZA', '05', '0517', '051713'),
(607, '051714000', 'GARCHITORENA', '05', '0517', '051714'),
(608, '051715000', 'GOA', '05', '0517', '051715'),
(609, '051716000', 'IRIGA CITY', '05', '0517', '051716'),
(610, '051717000', 'LAGONOY', '05', '0517', '051717'),
(611, '051718000', 'LIBMANAN', '05', '0517', '051718'),
(612, '051719000', 'LUPI', '05', '0517', '051719'),
(613, '051720000', 'MAGARAO', '05', '0517', '051720'),
(614, '051721000', 'MILAOR', '05', '0517', '051721'),
(615, '051722000', 'MINALABAC', '05', '0517', '051722'),
(616, '051723000', 'NABUA', '05', '0517', '051723'),
(617, '051724000', 'NAGA CITY R5', '05', '0517', '051724'),
(618, '051725000', 'OCAMPO', '05', '0517', '051725'),
(619, '051726000', 'PAMPLONA', '05', '0517', '051726'),
(620, '051727000', 'PASACAO', '05', '0517', '051727'),
(621, '051728000', 'PILI (Capital)', '05', '0517', '051728'),
(622, '051729000', 'PRESENTACION (PARUBCAN)', '05', '0517', '051729'),
(623, '051730000', 'RAGAY', '05', '0517', '051730'),
(624, '051731000', 'SAGÃ‘AY', '05', '0517', '051731'),
(625, '051732000', 'SAN FERNANDO', '05', '0517', '051732'),
(626, '051733000', 'SAN JOSE', '05', '0517', '051733'),
(627, '051734000', 'SIPOCOT', '05', '0517', '051734'),
(628, '051735000', 'SIRUMA', '05', '0517', '051735'),
(629, '051736000', 'TIGAON', '05', '0517', '051736'),
(630, '051737000', 'TINAMBAC', '05', '0517', '051737'),
(631, '052001000', 'BAGAMANOC', '05', '0520', '052001'),
(632, '052002000', 'BARAS R5', '05', '0520', '052002'),
(634, '052004000', 'CARAMORAN', '05', '0520', '052004'),
(635, '052005000', 'GIGMOTO', '05', '0520', '052005'),
(636, '052006000', 'PANDAN', '05', '0520', '052006'),
(637, '052007000', 'PANGANIBAN (PAYO)', '05', '0520', '052007'),
(638, '052008000', 'SAN ANDRES (CALOLBON)', '05', '0520', '052008'),
(639, '052009000', 'SAN MIGUEL', '05', '0520', '052009'),
(640, '052010000', 'VIGA', '05', '0520', '052010'),
(641, '052011000', 'VIRAC (Capital)', '05', '0520', '052011'),
(642, '054101000', 'AROROY', '05', '0541', '054101'),
(643, '054102000', 'BALENO', '05', '0541', '054102'),
(644, '054103000', 'BALUD', '05', '0541', '054103'),
(645, '054104000', 'BATUAN R5', '05', '0541', '054104'),
(646, '054105000', 'CATAINGAN', '05', '0541', '054105'),
(647, '054106000', 'CAWAYAN', '05', '0541', '054106'),
(648, '054107000', 'CLAVERIA R5', '05', '0541', '054107'),
(649, '054108000', 'DIMASALANG', '05', '0541', '054108'),
(650, '054109000', 'ESPERANZA R5', '05', '0541', '054109'),
(651, '054110000', 'MANDAON', '05', '0541', '054110'),
(652, '054111000', 'CITY OF MASBATE (Capital)', '05', '0541', '054111'),
(653, '054112000', 'MILAGROS', '05', '0541', '054112'),
(654, '054113000', 'MOBO', '05', '0541', '054113'),
(655, '054114000', 'MONREAL', '05', '0541', '054114'),
(656, '054115000', 'PALANAS', '05', '0541', '054115'),
(657, '054116000', 'PIO V. CORPUZ (LIMBUHAN)', '05', '0541', '054116'),
(658, '054117000', 'PLACER', '05', '0541', '054117'),
(659, '054118000', 'SAN FERNANDO', '05', '0541', '054118'),
(660, '054119000', 'SAN JACINTO', '05', '0541', '054119'),
(661, '054120000', 'SAN PASCUAL', '05', '0541', '054120'),
(662, '054121000', 'USON', '05', '0541', '054121'),
(663, '056202000', 'BARCELONA', '05', '0562', '056202'),
(664, '056203000', 'BULAN', '05', '0562', '056203'),
(665, '056204000', 'BULUSAN', '05', '0562', '056204'),
(666, '056205000', 'CASIGURAN', '05', '0562', '056205'),
(667, '056206000', 'CASTILLA', '05', '0562', '056206'),
(668, '056207000', 'DONSOL', '05', '0562', '056207'),
(669, '056208000', 'GUBAT', '05', '0562', '056208'),
(670, '056209000', 'IROSIN', '05', '0562', '056209'),
(671, '056210000', 'JUBAN', '05', '0562', '056210'),
(672, '056211000', 'MAGALLANES R5', '05', '0562', '056211'),
(673, '056212000', 'MATNOG', '05', '0562', '056212'),
(674, '056213000', 'PILAR', '05', '0562', '056213'),
(675, '056214000', 'PRIETO DIAZ', '05', '0562', '056214'),
(676, '056215000', 'SANTA MAGDALENA', '05', '0562', '056215'),
(677, '056216000', 'CITY OF SORSOGON (Capital)', '05', '0562', '056216'),
(678, '060401000', 'ALTAVAS', '06', '0604', '060401'),
(679, '060402000', 'BALETE R6', '06', '0604', '060402'),
(680, '060403000', 'BANGA R6', '06', '0604', '060403'),
(681, '060404000', 'BATAN', '06', '0604', '060404'),
(682, '060405000', 'BURUANGA', '06', '0604', '060405'),
(683, '060406000', 'IBAJAY', '06', '0604', '060406'),
(684, '060407000', 'KALIBO (Capital)', '06', '0604', '060407'),
(685, '060408000', 'LEZO', '06', '0604', '060408'),
(686, '060409000', 'LIBACAO', '06', '0604', '060409'),
(687, '060410000', 'MADALAG', '06', '0604', '060410'),
(688, '060411000', 'MAKATO', '06', '0604', '060411'),
(689, '060412000', 'MALAY', '06', '0604', '060412'),
(690, '060413000', 'MALINAO R5', '06', '0604', '060413'),
(691, '060414000', 'NABAS', '06', '0604', '060414'),
(692, '060415000', 'NEW WASHINGTON', '06', '0604', '060415'),
(693, '060416000', 'NUMANCIA', '06', '0604', '060416'),
(694, '060417000', 'TANGALAN', '06', '0604', '060417'),
(695, '060601000', 'ANINI-Y', '06', '0606', '060601'),
(696, '060602000', 'BARBAZA', '06', '0606', '060602'),
(697, '060603000', 'BELISON', '06', '0606', '060603'),
(698, '060604000', 'BUGASONG', '06', '0606', '060604'),
(699, '060605000', 'CALUYA', '06', '0606', '060605'),
(700, '060606000', 'CULASI', '06', '0606', '060606'),
(701, '060607000', 'TOBIAS FORNIER (DAO)', '06', '0606', '060607'),
(702, '060608000', 'HAMTIC', '06', '0606', '060608'),
(703, '060609000', 'LAUA-AN', '06', '0606', '060609'),
(704, '060610000', 'LIBERTAD R6', '06', '0606', '060610'),
(705, '060611000', 'PANDAN', '06', '0606', '060611'),
(706, '060612000', 'PATNONGON', '06', '0606', '060612'),
(707, '060613000', 'SAN JOSE (Capital)', '06', '0606', '060613'),
(708, '060614000', 'SAN REMIGIO', '06', '0606', '060614'),
(709, '060615000', 'SEBASTE', '06', '0606', '060615'),
(710, '060616000', 'SIBALOM', '06', '0606', '060616'),
(711, '060617000', 'TIBIAO', '06', '0606', '060617'),
(712, '060618000', 'VALDERRAMA', '06', '0606', '060618'),
(713, '061901000', 'CUARTERO', '06', '0619', '061901'),
(714, '061902000', 'DAO', '06', '0619', '061902'),
(715, '061903000', 'DUMALAG', '06', '0619', '061903'),
(716, '061904000', 'DUMARAO', '06', '0619', '061904'),
(717, '061905000', 'IVISAN', '06', '0619', '061905'),
(718, '061906000', 'JAMINDAN', '06', '0619', '061906'),
(719, '061907000', 'MA-AYON', '06', '0619', '061907'),
(720, '061908000', 'MAMBUSAO', '06', '0619', '061908'),
(721, '061909000', 'PANAY', '06', '0619', '061909'),
(722, '061910000', 'PANITAN', '06', '0619', '061910'),
(723, '061911000', 'PILAR', '06', '0619', '061911'),
(724, '061912000', 'PONTEVEDRA', '06', '0619', '061912'),
(725, '061913000', 'PRESIDENT ROXAS', '06', '0619', '061913'),
(726, '061914000', 'ROXAS CITY (Capital)', '06', '0619', '061914'),
(727, '061915000', 'SAPI-AN', '06', '0619', '061915'),
(728, '061916000', 'SIGMA', '06', '0619', '061916'),
(729, '061917000', 'TAPAZ', '06', '0619', '061917'),
(730, '063001000', 'AJUY', '06', '0630', '063001'),
(731, '063002000', 'ALIMODIAN', '06', '0630', '063002'),
(732, '063003000', 'ANILAO', '06', '0630', '063003'),
(733, '063004000', 'BADIANGAN', '06', '0630', '063004'),
(734, '063005000', 'BALASAN', '06', '0630', '063005'),
(735, '063006000', 'BANATE', '06', '0630', '063006'),
(736, '063007000', 'BAROTAC NUEVO', '06', '0630', '063007'),
(737, '063008000', 'BAROTAC VIEJO', '06', '0630', '063008'),
(738, '063009000', 'BATAD', '06', '0630', '063009'),
(739, '063010000', 'BINGAWAN', '06', '0630', '063010'),
(740, '063012000', 'CABATUAN', '06', '0630', '063012'),
(741, '063013000', 'CALINOG', '06', '0630', '063013'),
(742, '063014000', 'CARLES', '06', '0630', '063014'),
(743, '063015000', 'CONCEPCION R6', '06', '0630', '063015'),
(744, '063016000', 'DINGLE', '06', '0630', '063016'),
(745, '063017000', 'DUEÃ‘AS', '06', '0630', '063017'),
(746, '063018000', 'DUMANGAS', '06', '0630', '063018'),
(747, '063019000', 'ESTANCIA', '06', '0630', '063019'),
(748, '063020000', 'GUIMBAL', '06', '0630', '063020'),
(749, '063021000', 'IGBARAS', '06', '0630', '063021'),
(750, '063022000', 'ILOILO CITY (Capital)', '06', '0630', '063022'),
(751, '063023000', 'JANIUAY', '06', '0630', '063023'),
(752, '063025000', 'LAMBUNAO', '06', '0630', '063025'),
(753, '063026000', 'LEGANES', '06', '0630', '063026'),
(754, '063027000', 'LEMERY R6', '06', '0630', '063027'),
(755, '063028000', 'LEON', '06', '0630', '063028'),
(756, '063029000', 'MAASIN R6', '06', '0630', '063029'),
(757, '063030000', 'MIAGAO', '06', '0630', '063030'),
(758, '063031000', 'MINA', '06', '0630', '063031'),
(759, '063032000', 'NEW LUCENA', '06', '0630', '063032'),
(760, '063034000', 'OTON', '06', '0630', '063034'),
(761, '063035000', 'CITY OF PASSI', '06', '0630', '063035'),
(762, '063036000', 'PAVIA', '06', '0630', '063036'),
(763, '063037000', 'POTOTAN', '06', '0630', '063037'),
(764, '063038000', 'SAN DIONISIO', '06', '0630', '063038'),
(765, '063039000', 'SAN ENRIQUE', '06', '0630', '063039'),
(766, '063040000', 'SAN JOAQUIN', '06', '0630', '063040'),
(767, '063041000', 'SAN MIGUEL', '06', '0630', '063041'),
(768, '063042000', 'SAN RAFAEL', '06', '0630', '063042'),
(769, '063043000', 'SANTA BARBARA', '06', '0630', '063043'),
(770, '063044000', 'SARA', '06', '0630', '063044'),
(771, '063045000', 'TIGBAUAN', '06', '0630', '063045'),
(772, '063046000', 'TUBUNGAN', '06', '0630', '063046'),
(773, '063047000', 'ZARRAGA', '06', '0630', '063047'),
(774, '064501000', 'BACOLOD CITY (Capital) R6', '06', '0645', '064501'),
(775, '064502000', 'BAGO CITY', '06', '0645', '064502'),
(776, '064503000', 'BINALBAGAN', '06', '0645', '064503'),
(777, '064504000', 'CADIZ CITY', '06', '0645', '064504'),
(778, '064505000', 'CALATRAVA R6', '06', '0645', '064505'),
(779, '064506000', 'CANDONI', '06', '0645', '064506'),
(780, '064507000', 'CAUAYAN', '06', '0645', '064507'),
(781, '064508000', 'ENRIQUE B. MAGALONA (SARAVIA)', '06', '0645', '064508'),
(782, '064509000', 'CITY OF ESCALANTE', '06', '0645', '064509'),
(783, '064510000', 'CITY OF HIMAMAYLAN', '06', '0645', '064510'),
(784, '064511000', 'HINIGARAN', '06', '0645', '064511'),
(785, '064512000', 'HINOBA-AN (ASIA)', '06', '0645', '064512'),
(786, '064513000', 'ILOG', '06', '0645', '064513'),
(787, '064514000', 'ISABELA', '06', '0645', '064514'),
(788, '064515000', 'CITY OF KABANKALAN', '06', '0645', '064515'),
(789, '064516000', 'LA CARLOTA CITY', '06', '0645', '064516'),
(790, '064517000', 'LA CASTELLANA', '06', '0645', '064517'),
(791, '064518000', 'MANAPLA', '06', '0645', '064518'),
(792, '064519000', 'MOISES PADILLA (MAGALLON)', '06', '0645', '064519'),
(793, '064520000', 'MURCIA', '06', '0645', '064520'),
(794, '064521000', 'PONTEVEDRA', '06', '0645', '064521'),
(795, '064522000', 'PULUPANDAN', '06', '0645', '064522'),
(796, '064523000', 'SAGAY CITY', '06', '0645', '064523'),
(797, '064524000', 'SAN CARLOS CITY', '06', '0645', '064524'),
(798, '064525000', 'SAN ENRIQUE', '06', '0645', '064525'),
(799, '064526000', 'SILAY CITY', '06', '0645', '064526'),
(800, '064527000', 'CITY OF SIPALAY', '06', '0645', '064527'),
(801, '064528000', 'CITY OF TALISAY', '06', '0645', '064528'),
(802, '064529000', 'TOBOSO', '06', '0645', '064529'),
(803, '064530000', 'VALLADOLID', '06', '0645', '064530'),
(804, '064531000', 'CITY OF VICTORIAS', '06', '0645', '064531'),
(805, '064532000', 'SALVADOR BENEDICTO', '06', '0645', '064532'),
(806, '067901000', 'BUENAVISTA R6', '06', '0679', '067901'),
(807, '067902000', 'JORDAN (Capital)', '06', '0679', '067902'),
(808, '067903000', 'NUEVA VALENCIA', '06', '0679', '067903'),
(809, '067904000', 'SAN LORENZO', '06', '0679', '067904'),
(810, '067905000', 'SIBUNAG', '06', '0679', '067905'),
(811, '071201000', 'ALBURQUERQUE', '07', '0712', '071201'),
(812, '071202000', 'ALICIA R7', '07', '0712', '071202'),
(813, '071203000', 'ANDA R7', '07', '0712', '071203'),
(814, '071204000', 'ANTEQUERA', '07', '0712', '071204'),
(815, '071205000', 'BACLAYON', '07', '0712', '071205'),
(816, '071206000', 'BALILIHAN', '07', '0712', '071206'),
(817, '071207000', 'BATUAN R7', '07', '0712', '071207'),
(818, '071208000', 'BILAR', '07', '0712', '071208'),
(819, '071209000', 'BUENAVISTA R7', '07', '0712', '071209'),
(820, '071210000', 'CALAPE', '07', '0712', '071210'),
(821, '071211000', 'CANDIJAY', '07', '0712', '071211'),
(822, '071212000', 'CARMEN R7', '07', '0712', '071212'),
(823, '071213000', 'CATIGBIAN', '07', '0712', '071213'),
(824, '071214000', 'CLARIN R7', '07', '0712', '071214'),
(825, '071215000', 'CORELLA', '07', '0712', '071215'),
(826, '071216000', 'CORTES R7', '07', '0712', '071216'),
(827, '071217000', 'DAGOHOY', '07', '0712', '071217'),
(828, '071218000', 'DANAO', '07', '0712', '071218'),
(829, '071219000', 'DAUIS', '07', '0712', '071219'),
(830, '071220000', 'DIMIAO', '07', '0712', '071220'),
(831, '071221000', 'DUERO', '07', '0712', '071221'),
(832, '071222000', 'GARCIA HERNANDEZ', '07', '0712', '071222'),
(833, '071223000', 'GUINDULMAN', '07', '0712', '071223'),
(834, '071224000', 'INABANGA', '07', '0712', '071224'),
(835, '071225000', 'JAGNA', '07', '0712', '071225'),
(836, '071226000', 'JETAFE', '07', '0712', '071226'),
(837, '071227000', 'LILA', '07', '0712', '071227'),
(838, '071228000', 'LOAY', '07', '0712', '071228'),
(839, '071229000', 'LOBOC', '07', '0712', '071229'),
(840, '071230000', 'LOON', '07', '0712', '071230'),
(841, '071231000', 'MABINI R7', '07', '0712', '071231'),
(842, '071232000', 'MARIBOJOC', '07', '0712', '071232'),
(843, '071233000', 'PANGLAO', '07', '0712', '071233'),
(844, '071234000', 'PILAR', '07', '0712', '071234'),
(845, '071235000', 'PRES. CARLOS P. GARCIA (PITOGO)', '07', '0712', '071235'),
(846, '071236000', 'SAGBAYAN (BORJA)', '07', '0712', '071236'),
(847, '071237000', 'SAN ISIDRO', '07', '0712', '071237'),
(848, '071238000', 'SAN MIGUEL', '07', '0712', '071238'),
(849, '071239000', 'SEVILLA', '07', '0712', '071239'),
(850, '071240000', 'SIERRA BULLONES', '07', '0712', '071240'),
(851, '071241000', 'SIKATUNA', '07', '0712', '071241'),
(852, '071242000', 'TAGBILARAN CITY (Capital)', '07', '0712', '071242'),
(853, '071243000', 'TALIBON', '07', '0712', '071243'),
(854, '071244000', 'TRINIDAD', '07', '0712', '071244'),
(855, '071245000', 'TUBIGON', '07', '0712', '071245'),
(856, '071246000', 'UBAY', '07', '0712', '071246'),
(857, '071247000', 'VALENCIA', '07', '0712', '071247'),
(858, '071248000', 'BIEN UNIDO', '07', '0712', '071248'),
(859, '072201000', 'ALCANTARA R7', '07', '0722', '072201'),
(860, '072202000', 'ALCOY', '07', '0722', '072202'),
(861, '072203000', 'ALEGRIA R7', '07', '0722', '072203'),
(862, '072204000', 'ALOGUINSAN', '07', '0722', '072204'),
(863, '072205000', 'ARGAO', '07', '0722', '072205'),
(864, '072206000', 'ASTURIAS', '07', '0722', '072206'),
(865, '072207000', 'BADIAN', '07', '0722', '072207'),
(866, '072208000', 'BALAMBAN', '07', '0722', '072208'),
(867, '072209000', 'BANTAYAN', '07', '0722', '072209'),
(868, '072210000', 'BARILI', '07', '0722', '072210'),
(869, '072211000', 'CITY OF BOGO', '07', '0722', '072211'),
(870, '072212000', 'BOLJOON', '07', '0722', '072212'),
(871, '072213000', 'BORBON', '07', '0722', '072213'),
(872, '072214000', 'CITY OF CARCAR', '07', '0722', '072214'),
(874, '072216000', 'CATMON', '07', '0722', '072216'),
(875, '072217000', 'CEBU CITY (Capital)', '07', '0722', '072217'),
(876, '072218000', 'COMPOSTELA R7', '07', '0722', '072218'),
(877, '072219000', 'CONSOLACION', '07', '0722', '072219'),
(878, '072220000', 'CORDOVA', '07', '0722', '072220'),
(879, '072221000', 'DAANBANTAYAN', '07', '0722', '072221'),
(880, '072222000', 'DALAGUETE', '07', '0722', '072222'),
(881, '072223000', 'DANAO CITY', '07', '0722', '072223'),
(882, '072224000', 'DUMANJUG', '07', '0722', '072224'),
(883, '072225000', 'GINATILAN', '07', '0722', '072225'),
(884, '072226000', 'LAPU-LAPU CITY (OPON)', '07', '0722', '072226'),
(885, '072227000', 'LILOAN R7', '07', '0722', '072227'),
(886, '072228000', 'MADRIDEJOS', '07', '0722', '072228'),
(887, '072229000', 'MALABUYOC', '07', '0722', '072229'),
(888, '072230000', 'MANDAUE CITY', '07', '0722', '072230'),
(889, '072231000', 'MEDELLIN', '07', '0722', '072231'),
(890, '072232000', 'MINGLANILLA', '07', '0722', '072232'),
(891, '072233000', 'MOALBOAL', '07', '0722', '072233'),
(892, '072234000', 'CITY OF NAGA', '07', '0722', '072234'),
(893, '072235000', 'OSLOB', '07', '0722', '072235'),
(894, '072236000', 'PILAR', '07', '0722', '072236'),
(895, '072237000', 'PINAMUNGAHAN', '07', '0722', '072237'),
(896, '072238000', 'PORO', '07', '0722', '072238'),
(897, '072239000', 'RONDA', '07', '0722', '072239'),
(898, '072240000', 'SAMBOAN', '07', '0722', '072240'),
(899, '072241000', 'SAN FERNANDO', '07', '0722', '072241'),
(900, '072242000', 'SAN FRANCISCO', '07', '0722', '072242'),
(901, '072243000', 'SAN REMIGIO', '07', '0722', '072243'),
(902, '072244000', 'SANTA FE', '07', '0722', '072244'),
(903, '072245000', 'SANTANDER', '07', '0722', '072245'),
(904, '072246000', 'SIBONGA', '07', '0722', '072246'),
(905, '072247000', 'SOGOD', '07', '0722', '072247'),
(906, '072248000', 'TABOGON', '07', '0722', '072248'),
(907, '072249000', 'TABUELAN', '07', '0722', '072249'),
(908, '072250000', 'CITY OF TALISAY', '07', '0722', '072250');
INSERT INTO `city` (`id`, `psgcCode`, `citymunDesc`, `regDesc`, `provCode`, `citymunCode`) VALUES
(909, '072251000', 'TOLEDO CITY', '07', '0722', '072251'),
(910, '072252000', 'TUBURAN', '07', '0722', '072252'),
(911, '072253000', 'TUDELA', '07', '0722', '072253'),
(912, '074601000', 'AMLAN (AYUQUITAN)', '07', '0746', '074601'),
(913, '074602000', 'AYUNGON', '07', '0746', '074602'),
(914, '074603000', 'BACONG', '07', '0746', '074603'),
(915, '074604000', 'BAIS CITY', '07', '0746', '074604'),
(916, '074605000', 'BASAY', '07', '0746', '074605'),
(917, '074606000', 'CITY OF BAYAWAN (TULONG)', '07', '0746', '074606'),
(918, '074607000', 'BINDOY (PAYABON)', '07', '0746', '074607'),
(919, '074608000', 'CANLAON CITY', '07', '0746', '074608'),
(920, '074609000', 'DAUIN', '07', '0746', '074609'),
(921, '074610000', 'DUMAGUETE CITY (Capital)', '07', '0746', '074610'),
(922, '074611000', 'CITY OF GUIHULNGAN', '07', '0746', '074611'),
(923, '074612000', 'JIMALALUD', '07', '0746', '074612'),
(924, '074613000', 'LA LIBERTAD R7', '07', '0746', '074613'),
(925, '074614000', 'MABINAY', '07', '0746', '074614'),
(926, '074615000', 'MANJUYOD', '07', '0746', '074615'),
(927, '074616000', 'PAMPLONA', '07', '0746', '074616'),
(928, '074617000', 'SAN JOSE', '07', '0746', '074617'),
(929, '074618000', 'SANTA CATALINA', '07', '0746', '074618'),
(930, '074619000', 'SIATON', '07', '0746', '074619'),
(931, '074620000', 'SIBULAN', '07', '0746', '074620'),
(932, '074621000', 'CITY OF TANJAY', '07', '0746', '074621'),
(933, '074622000', 'TAYASAN', '07', '0746', '074622'),
(934, '074623000', 'VALENCIA (LUZURRIAGA)', '07', '0746', '074623'),
(935, '074624000', 'VALLEHERMOSO', '07', '0746', '074624'),
(936, '074625000', 'ZAMBOANGUITA', '07', '0746', '074625'),
(937, '076101000', 'ENRIQUE VILLANUEVA', '07', '0761', '076101'),
(938, '076102000', 'LARENA', '07', '0761', '076102'),
(939, '076103000', 'LAZI', '07', '0761', '076103'),
(940, '076104000', 'MARIA', '07', '0761', '076104'),
(941, '076105000', 'SAN JUAN', '07', '0761', '076105'),
(942, '076106000', 'SIQUIJOR (Capital)', '07', '0761', '076106'),
(943, '082601000', 'ARTECHE', '08', '0826', '082601'),
(944, '082602000', 'BALANGIGA', '08', '0826', '082602'),
(945, '082603000', 'BALANGKAYAN', '08', '0826', '082603'),
(946, '082604000', 'CITY OF BORONGAN (Capital)', '08', '0826', '082604'),
(947, '082605000', 'CAN-AVID', '08', '0826', '082605'),
(948, '082606000', 'DOLORES R8', '08', '0826', '082606'),
(949, '082607000', 'GENERAL MACARTHUR', '08', '0826', '082607'),
(950, '082608000', 'GIPORLOS', '08', '0826', '082608'),
(951, '082609000', 'GUIUAN', '08', '0826', '082609'),
(952, '082610000', 'HERNANI', '08', '0826', '082610'),
(953, '082611000', 'JIPAPAD', '08', '0826', '082611'),
(954, '082612000', 'LAWAAN', '08', '0826', '082612'),
(955, '082613000', 'LLORENTE', '08', '0826', '082613'),
(956, '082614000', 'MASLOG', '08', '0826', '082614'),
(957, '082615000', 'MAYDOLONG', '08', '0826', '082615'),
(958, '082616000', 'MERCEDES R8', '08', '0826', '082616'),
(959, '082617000', 'ORAS', '08', '0826', '082617'),
(960, '082618000', 'QUINAPONDAN', '08', '0826', '082618'),
(961, '082619000', 'SALCEDO', '08', '0826', '082619'),
(962, '082620000', 'SAN JULIAN', '08', '0826', '082620'),
(963, '082621000', 'SAN POLICARPO', '08', '0826', '082621'),
(964, '082622000', 'SULAT', '08', '0826', '082622'),
(965, '082623000', 'TAFT', '08', '0826', '082623'),
(966, '083701000', 'ABUYOG', '08', '0837', '083701'),
(967, '083702000', 'ALANGALANG', '08', '0837', '083702'),
(968, '083703000', 'ALBUERA', '08', '0837', '083703'),
(969, '083705000', 'BABATNGON', '08', '0837', '083705'),
(970, '083706000', 'BARUGO', '08', '0837', '083706'),
(971, '083707000', 'BATO R8', '08', '0837', '083707'),
(972, '083708000', 'CITY OF BAYBAY', '08', '0837', '083708'),
(973, '083710000', 'BURAUEN', '08', '0837', '083710'),
(974, '083713000', 'CALUBIAN', '08', '0837', '083713'),
(975, '083714000', 'CAPOOCAN', '08', '0837', '083714'),
(976, '083715000', 'CARIGARA', '08', '0837', '083715'),
(977, '083717000', 'DAGAMI', '08', '0837', '083717'),
(978, '083718000', 'DULAG', '08', '0837', '083718'),
(979, '083719000', 'HILONGOS', '08', '0837', '083719'),
(980, '083720000', 'HINDANG', '08', '0837', '083720'),
(981, '083721000', 'INOPACAN', '08', '0837', '083721'),
(982, '083722000', 'ISABEL', '08', '0837', '083722'),
(983, '083723000', 'JARO', '08', '0837', '083723'),
(984, '083724000', 'JAVIER (BUGHO)', '08', '0837', '083724'),
(985, '083725000', 'JULITA', '08', '0837', '083725'),
(986, '083726000', 'KANANGA', '08', '0837', '083726'),
(987, '083728000', 'LA PAZ R8', '08', '0837', '083728'),
(988, '083729000', 'LEYTE', '08', '0837', '083729'),
(989, '083730000', 'MACARTHUR', '08', '0837', '083730'),
(990, '083731000', 'MAHAPLAG', '08', '0837', '083731'),
(991, '083733000', 'MATAG-OB', '08', '0837', '083733'),
(992, '083734000', 'MATALOM', '08', '0837', '083734'),
(993, '083735000', 'MAYORGA', '08', '0837', '083735'),
(994, '083736000', 'MERIDA', '08', '0837', '083736'),
(995, '083738000', 'ORMOC CITY', '08', '0837', '083738'),
(996, '083739000', 'PALO', '08', '0837', '083739'),
(997, '083740000', 'PALOMPON', '08', '0837', '083740'),
(998, '083741000', 'PASTRANA', '08', '0837', '083741'),
(999, '083742000', 'SAN ISIDRO', '08', '0837', '083742'),
(1000, '083743000', 'SAN MIGUEL', '08', '0837', '083743'),
(1001, '083744000', 'SANTA FE', '08', '0837', '083744'),
(1002, '083745000', 'TABANGO', '08', '0837', '083745'),
(1003, '083746000', 'TABONTABON', '08', '0837', '083746'),
(1004, '083747000', 'TACLOBAN CITY (Capital)', '08', '0837', '083747'),
(1005, '083748000', 'TANAUAN', '08', '0837', '083748'),
(1006, '083749000', 'TOLOSA', '08', '0837', '083749'),
(1007, '083750000', 'TUNGA', '08', '0837', '083750'),
(1008, '083751000', 'VILLABA', '08', '0837', '083751'),
(1009, '084801000', 'ALLEN', '08', '0848', '084801'),
(1010, '084802000', 'BIRI', '08', '0848', '084802'),
(1011, '084803000', 'BOBON', '08', '0848', '084803'),
(1012, '084804000', 'CAPUL', '08', '0848', '084804'),
(1013, '084805000', 'CATARMAN (Capital) R8', '08', '0848', '084805'),
(1014, '084806000', 'CATUBIG', '08', '0848', '084806'),
(1015, '084807000', 'GAMAY', '08', '0848', '084807'),
(1016, '084808000', 'LAOANG R8', '08', '0848', '084808'),
(1017, '084809000', 'LAPINIG', '08', '0848', '084809'),
(1018, '084810000', 'LAS NAVAS', '08', '0848', '084810'),
(1019, '084811000', 'LAVEZARES', '08', '0848', '084811'),
(1020, '084812000', 'MAPANAS', '08', '0848', '084812'),
(1021, '084813000', 'MONDRAGON', '08', '0848', '084813'),
(1022, '084814000', 'PALAPAG', '08', '0848', '084814'),
(1023, '084815000', 'PAMBUJAN', '08', '0848', '084815'),
(1024, '084816000', 'ROSARIO', '08', '0848', '084816'),
(1025, '084817000', 'SAN ANTONIO', '08', '0848', '084817'),
(1026, '084818000', 'SAN ISIDRO', '08', '0848', '084818'),
(1027, '084819000', 'SAN JOSE', '08', '0848', '084819'),
(1028, '084820000', 'SAN ROQUE', '08', '0848', '084820'),
(1029, '084821000', 'SAN VICENTE', '08', '0848', '084821'),
(1030, '084822000', 'SILVINO LOBOS', '08', '0848', '084822'),
(1031, '084823000', 'VICTORIA', '08', '0848', '084823'),
(1032, '084824000', 'LOPE DE VEGA', '08', '0848', '084824'),
(1033, '086001000', 'ALMAGRO', '08', '0860', '086001'),
(1034, '086002000', 'BASEY', '08', '0860', '086002'),
(1035, '086003000', 'CALBAYOG CITY', '08', '0860', '086003'),
(1036, '086004000', 'CALBIGA', '08', '0860', '086004'),
(1037, '086005000', 'CITY OF CATBALOGAN (Capital)', '08', '0860', '086005'),
(1038, '086006000', 'DARAM', '08', '0860', '086006'),
(1039, '086007000', 'GANDARA', '08', '0860', '086007'),
(1040, '086008000', 'HINABANGAN', '08', '0860', '086008'),
(1041, '086009000', 'JIABONG', '08', '0860', '086009'),
(1042, '086010000', 'MARABUT', '08', '0860', '086010'),
(1043, '086011000', 'MATUGUINAO', '08', '0860', '086011'),
(1044, '086012000', 'MOTIONG', '08', '0860', '086012'),
(1045, '086013000', 'PINABACDAO', '08', '0860', '086013'),
(1046, '086014000', 'SAN JOSE DE BUAN', '08', '0860', '086014'),
(1047, '086015000', 'SAN SEBASTIAN', '08', '0860', '086015'),
(1048, '086016000', 'SANTA MARGARITA', '08', '0860', '086016'),
(1049, '086017000', 'SANTA RITA', '08', '0860', '086017'),
(1050, '086018000', 'SANTO NIÃ‘O', '08', '0860', '086018'),
(1051, '086019000', 'TALALORA', '08', '0860', '086019'),
(1052, '086020000', 'TARANGNAN', '08', '0860', '086020'),
(1053, '086021000', 'VILLAREAL', '08', '0860', '086021'),
(1054, '086022000', 'PARANAS (WRIGHT)', '08', '0860', '086022'),
(1055, '086023000', 'ZUMARRAGA', '08', '0860', '086023'),
(1056, '086024000', 'TAGAPUL-AN', '08', '0860', '086024'),
(1057, '086025000', 'SAN JORGE', '08', '0860', '086025'),
(1058, '086026000', 'PAGSANGHAN', '08', '0860', '086026'),
(1059, '086401000', 'ANAHAWAN', '08', '0864', '086401'),
(1060, '086402000', 'BONTOC R8', '08', '0864', '086402'),
(1061, '086403000', 'HINUNANGAN', '08', '0864', '086403'),
(1063, '086405000', 'LIBAGON', '08', '0864', '086405'),
(1064, '086406000', 'LILOAN R8', '08', '0864', '086406'),
(1065, '086407000', 'CITY OF MAASIN (Capital)', '08', '0864', '086407'),
(1066, '086408000', 'MACROHON', '08', '0864', '086408'),
(1067, '086409000', 'MALITBOG R8', '08', '0864', '086409'),
(1068, '086410000', 'PADRE BURGOS', '08', '0864', '086410'),
(1069, '086411000', 'PINTUYAN', '08', '0864', '086411'),
(1070, '086412000', 'SAINT BERNARD', '08', '0864', '086412'),
(1071, '086413000', 'SAN FRANCISCO', '08', '0864', '086413'),
(1072, '086414000', 'SAN JUAN (CABALIAN)', '08', '0864', '086414'),
(1073, '086415000', 'SAN RICARDO', '08', '0864', '086415'),
(1074, '086416000', 'SILAGO', '08', '0864', '086416'),
(1075, '086417000', 'SOGOD', '08', '0864', '086417'),
(1076, '086418000', 'TOMAS OPPUS', '08', '0864', '086418'),
(1077, '086419000', 'LIMASAWA', '08', '0864', '086419'),
(1078, '087801000', 'ALMERIA', '08', '0878', '087801'),
(1079, '087802000', 'BILIRAN', '08', '0878', '087802'),
(1080, '087803000', 'CABUCGAYAN', '08', '0878', '087803'),
(1081, '087804000', 'CAIBIRAN', '08', '0878', '087804'),
(1082, '087805000', 'CULABA', '08', '0878', '087805'),
(1083, '087806000', 'KAWAYAN', '08', '0878', '087806'),
(1084, '087807000', 'MARIPIPI', '08', '0878', '087807'),
(1085, '087808000', 'NAVAL (Capital)', '08', '0878', '087808'),
(1086, '097201000', 'DAPITAN CITY', '09', '0972', '097201'),
(1087, '097202000', 'DIPOLOG CITY (Capital)', '09', '0972', '097202'),
(1088, '097203000', 'KATIPUNAN', '09', '0972', '097203'),
(1089, '097204000', 'LA LIBERTAD R9', '09', '0972', '097204'),
(1090, '097205000', 'LABASON', '09', '0972', '097205'),
(1091, '097206000', 'LILOY', '09', '0972', '097206'),
(1092, '097207000', 'MANUKAN', '09', '0972', '097207'),
(1093, '097208000', 'MUTIA', '09', '0972', '097208'),
(1094, '097209000', 'PIÃ‘AN (NEW PIÃ‘AN)', '09', '0972', '097209'),
(1095, '097210000', 'POLANCO', '09', '0972', '097210'),
(1096, '097211000', 'PRES. MANUEL A. ROXAS', '09', '0972', '097211'),
(1097, '097212000', 'RIZAL', '09', '0972', '097212'),
(1098, '097213000', 'SALUG', '09', '0972', '097213'),
(1099, '097214000', 'SERGIO OSMEÃ‘A SR.', '09', '0972', '097214'),
(1100, '097215000', 'SIAYAN', '09', '0972', '097215'),
(1101, '097216000', 'SIBUCO', '09', '0972', '097216'),
(1102, '097217000', 'SIBUTAD', '09', '0972', '097217'),
(1103, '097218000', 'SINDANGAN', '09', '0972', '097218'),
(1104, '097219000', 'SIOCON', '09', '0972', '097219'),
(1105, '097220000', 'SIRAWAI', '09', '0972', '097220'),
(1106, '097221000', 'TAMPILISAN', '09', '0972', '097221'),
(1107, '097222000', 'JOSE DALMAN (PONOT)', '09', '0972', '097222'),
(1108, '097223000', 'GUTALAC', '09', '0972', '097223'),
(1109, '097224000', 'BALIGUIAN', '09', '0972', '097224'),
(1110, '097225000', 'GODOD', '09', '0972', '097225'),
(1111, '097226000', 'BACUNGAN (Leon T. Postigo)', '09', '0972', '097226'),
(1112, '097227000', 'KALAWIT', '09', '0972', '097227'),
(1113, '097302000', 'AURORA R9', '09', '0973', '097302'),
(1114, '097303000', 'BAYOG', '09', '0973', '097303'),
(1115, '097305000', 'DIMATALING', '09', '0973', '097305'),
(1116, '097306000', 'DINAS', '09', '0973', '097306'),
(1117, '097307000', 'DUMALINAO', '09', '0973', '097307'),
(1118, '097308000', 'DUMINGAG', '09', '0973', '097308'),
(1119, '097311000', 'KUMALARANG', '09', '0973', '097311'),
(1120, '097312000', 'LABANGAN', '09', '0973', '097312'),
(1121, '097313000', 'LAPUYAN', '09', '0973', '097313'),
(1122, '097315000', 'MAHAYAG', '09', '0973', '097315'),
(1123, '097317000', 'MARGOSATUBIG', '09', '0973', '097317'),
(1124, '097318000', 'MIDSALIP', '09', '0973', '097318'),
(1125, '097319000', 'MOLAVE', '09', '0973', '097319'),
(1126, '097322000', 'PAGADIAN CITY (Capital)', '09', '0973', '097322'),
(1127, '097323000', 'RAMON MAGSAYSAY (LIARGO)', '09', '0973', '097323'),
(1128, '097324000', 'SAN MIGUEL', '09', '0973', '097324'),
(1129, '097325000', 'SAN PABLO', '09', '0973', '097325'),
(1130, '097327000', 'TABINA', '09', '0973', '097327'),
(1131, '097328000', 'TAMBULIG', '09', '0973', '097328'),
(1132, '097330000', 'TUKURAN', '09', '0973', '097330'),
(1133, '097332000', 'ZAMBOANGA CITY', '09', '0973', '097332'),
(1134, '097333000', 'LAKEWOOD', '09', '0973', '097333'),
(1135, '097337000', 'JOSEFINA', '09', '0973', '097337'),
(1136, '097338000', 'PITOGO', '09', '0973', '097338'),
(1137, '097340000', 'SOMINOT (DON MARIANO MARCOS)', '09', '0973', '097340'),
(1138, '097341000', 'VINCENZO A. SAGUN', '09', '0973', '097341'),
(1139, '097343000', 'GUIPOS', '09', '0973', '097343'),
(1140, '097344000', 'TIGBAO', '09', '0973', '097344'),
(1141, '098301000', 'ALICIA R9', '09', '0983', '098301'),
(1142, '098302000', 'BUUG', '09', '0983', '098302'),
(1143, '098303000', 'DIPLAHAN', '09', '0983', '098303'),
(1144, '098304000', 'IMELDA', '09', '0983', '098304'),
(1145, '098305000', 'IPIL (Capital)', '09', '0983', '098305'),
(1146, '098306000', 'KABASALAN', '09', '0983', '098306'),
(1147, '098307000', 'MABUHAY', '09', '0983', '098307'),
(1148, '098308000', 'MALANGAS', '09', '0983', '098308'),
(1149, '098309000', 'NAGA R9', '09', '0983', '098309'),
(1150, '098310000', 'OLUTANGA', '09', '0983', '098310'),
(1151, '098311000', 'PAYAO', '09', '0983', '098311'),
(1152, '098312000', 'ROSELLER LIM', '09', '0983', '098312'),
(1153, '098313000', 'SIAY', '09', '0983', '098313'),
(1154, '098314000', 'TALUSAN', '09', '0983', '098314'),
(1155, '098315000', 'TITAY', '09', '0983', '098315'),
(1156, '098316000', 'TUNGAWAN', '09', '0983', '098316'),
(1157, '099701000', 'CITY OF ISABELA', '09', '0997', '099701'),
(1158, '101301000', 'BAUNGON', '10', '1013', '101301'),
(1159, '101302000', 'DAMULOG', '10', '1013', '101302'),
(1160, '101303000', 'DANGCAGAN', '10', '1013', '101303'),
(1161, '101304000', 'DON CARLOS', '10', '1013', '101304'),
(1162, '101305000', 'IMPASUG-ONG', '10', '1013', '101305'),
(1163, '101306000', 'KADINGILAN', '10', '1013', '101306'),
(1164, '101307000', 'KALILANGAN', '10', '1013', '101307'),
(1165, '101308000', 'KIBAWE', '10', '1013', '101308'),
(1166, '101309000', 'KITAOTAO', '10', '1013', '101309'),
(1167, '101310000', 'LANTAPAN', '10', '1013', '101310'),
(1168, '101311000', 'LIBONA', '10', '1013', '101311'),
(1169, '101312000', 'CITY OF MALAYBALAY (Capital)', '10', '1013', '101312'),
(1170, '101313000', 'MALITBOG R10', '10', '1013', '101313'),
(1171, '101314000', 'MANOLO FORTICH', '10', '1013', '101314'),
(1172, '101315000', 'MARAMAG', '10', '1013', '101315'),
(1173, '101316000', 'PANGANTUCAN', '10', '1013', '101316'),
(1174, '101317000', 'QUEZON', '10', '1013', '101317'),
(1175, '101318000', 'SAN FERNANDO', '10', '1013', '101318'),
(1176, '101319000', 'SUMILAO', '10', '1013', '101319'),
(1177, '101320000', 'TALAKAG', '10', '1013', '101320'),
(1178, '101321000', 'CITY OF VALENCIA', '10', '1013', '101321'),
(1179, '101322000', 'CABANGLASAN', '10', '1013', '101322'),
(1180, '101801000', 'CATARMAN R10', '10', '1018', '101801'),
(1181, '101802000', 'GUINSILIBAN', '10', '1018', '101802'),
(1182, '101803000', 'MAHINOG', '10', '1018', '101803'),
(1183, '101804000', 'MAMBAJAO (Capital)', '10', '1018', '101804'),
(1184, '101805000', 'SAGAY', '10', '1018', '101805'),
(1185, '103501000', 'BACOLOD R10', '10', '1035', '103501'),
(1186, '103502000', 'BALOI', '10', '1035', '103502'),
(1187, '103503000', 'BAROY', '10', '1035', '103503'),
(1188, '103504000', 'ILIGAN CITY', '10', '1035', '103504'),
(1189, '103505000', 'KAPATAGAN R10', '10', '1035', '103505'),
(1190, '103506000', 'SULTAN NAGA DIMAPORO (KAROMATAN)', '10', '1035', '103506'),
(1191, '103507000', 'KAUSWAGAN', '10', '1035', '103507'),
(1192, '103508000', 'KOLAMBUGAN', '10', '1035', '103508'),
(1193, '103509000', 'LALA', '10', '1035', '103509'),
(1194, '103510000', 'LINAMON', '10', '1035', '103510'),
(1195, '103511000', 'MAGSAYSAY R10', '10', '1035', '103511'),
(1196, '103512000', 'MAIGO', '10', '1035', '103512'),
(1197, '103513000', 'MATUNGAO', '10', '1035', '103513'),
(1198, '103514000', 'MUNAI', '10', '1035', '103514'),
(1199, '103515000', 'NUNUNGAN', '10', '1035', '103515'),
(1200, '103516000', 'PANTAO RAGAT', '10', '1035', '103516'),
(1201, '103517000', 'POONA PIAGAPO', '10', '1035', '103517'),
(1202, '103518000', 'SALVADOR', '10', '1035', '103518'),
(1203, '103519000', 'SAPAD', '10', '1035', '103519'),
(1204, '103520000', 'TAGOLOAN', '10', '1035', '103520'),
(1205, '103521000', 'TANGCAL', '10', '1035', '103521'),
(1206, '103522000', 'TUBOD (Capital)', '10', '1035', '103522'),
(1207, '103523000', 'PANTAR', '10', '1035', '103523'),
(1208, '104201000', 'ALORAN', '10', '1042', '104201'),
(1209, '104202000', 'BALIANGAO', '10', '1042', '104202'),
(1210, '104203000', 'BONIFACIO', '10', '1042', '104203'),
(1211, '104204000', 'CALAMBA', '10', '1042', '104204'),
(1212, '104205000', 'CLARIN R10', '10', '1042', '104205'),
(1213, '104206000', 'CONCEPCION R10', '10', '1042', '104206'),
(1214, '104207000', 'JIMENEZ', '10', '1042', '104207'),
(1215, '104208000', 'LOPEZ JAENA', '10', '1042', '104208'),
(1216, '104209000', 'OROQUIETA CITY (Capital)', '10', '1042', '104209'),
(1217, '104210000', 'OZAMIS CITY', '10', '1042', '104210'),
(1218, '104211000', 'PANAON', '10', '1042', '104211'),
(1219, '104212000', 'PLARIDEL', '10', '1042', '104212'),
(1220, '104213000', 'SAPANG DALAGA', '10', '1042', '104213'),
(1221, '104214000', 'SINACABAN', '10', '1042', '104214'),
(1222, '104215000', 'TANGUB CITY', '10', '1042', '104215'),
(1223, '104216000', 'TUDELA', '10', '1042', '104216'),
(1224, '104217000', 'DON VICTORIANO CHIONGBIAN (DON MARIANO MARCOS)', '10', '1042', '104217'),
(1225, '104301000', 'ALUBIJID', '10', '1043', '104301'),
(1226, '104302000', 'BALINGASAG', '10', '1043', '104302'),
(1227, '104303000', 'BALINGOAN', '10', '1043', '104303'),
(1228, '104304000', 'BINUANGAN', '10', '1043', '104304'),
(1229, '104305000', 'CAGAYAN DE ORO CITY (Capital)', '10', '1043', '104305'),
(1230, '104306000', 'CLAVERIA R10', '10', '1043', '104306'),
(1231, '104307000', 'CITY OF EL SALVADOR', '10', '1043', '104307'),
(1232, '104308000', 'GINGOOG CITY', '10', '1043', '104308'),
(1233, '104309000', 'GITAGUM', '10', '1043', '104309'),
(1234, '104310000', 'INITAO', '10', '1043', '104310'),
(1235, '104311000', 'JASAAN', '10', '1043', '104311'),
(1236, '104312000', 'KINOGUITAN', '10', '1043', '104312'),
(1237, '104313000', 'LAGONGLONG', '10', '1043', '104313'),
(1238, '104314000', 'LAGUINDINGAN', '10', '1043', '104314'),
(1239, '104315000', 'LIBERTAD R10', '10', '1043', '104315'),
(1240, '104316000', 'LUGAIT', '10', '1043', '104316'),
(1241, '104317000', 'MAGSAYSAY (LINUGOS) R10', '10', '1043', '104317'),
(1242, '104318000', 'MANTICAO', '10', '1043', '104318'),
(1243, '104319000', 'MEDINA', '10', '1043', '104319'),
(1244, '104320000', 'NAAWAN', '10', '1043', '104320'),
(1245, '104321000', 'OPOL', '10', '1043', '104321'),
(1246, '104322000', 'SALAY', '10', '1043', '104322'),
(1247, '104323000', 'SUGBONGCOGON', '10', '1043', '104323'),
(1248, '104324000', 'TAGOLOAN', '10', '1043', '104324'),
(1249, '104325000', 'TALISAYAN', '10', '1043', '104325'),
(1250, '104326000', 'VILLANUEVA', '10', '1043', '104326'),
(1251, '112301000', 'ASUNCION (SAUG)', '11', '1123', '112301'),
(1252, '112303000', 'CARMEN R11', '11', '1123', '112303'),
(1253, '112305000', 'KAPALONG', '11', '1123', '112305'),
(1254, '112314000', 'NEW CORELLA', '11', '1123', '112314'),
(1255, '112315000', 'CITY OF PANABO', '11', '1123', '112315'),
(1256, '112317000', 'ISLAND GARDEN CITY OF SAMAL', '11', '1123', '112317'),
(1257, '112318000', 'SANTO TOMAS', '11', '1123', '112318'),
(1258, '112319000', 'CITY OF TAGUM (Capital)', '11', '1123', '112319'),
(1259, '112322000', 'TALAINGOD', '11', '1123', '112322'),
(1260, '112323000', 'BRAULIO E. DUJALI', '11', '1123', '112323'),
(1261, '112324000', 'SAN ISIDRO', '11', '1123', '112324'),
(1262, '112401000', 'BANSALAN', '11', '1124', '112401'),
(1263, '112402000', 'DAVAO CITY', '11', '1124', '112402'),
(1264, '112403000', 'CITY OF DIGOS (Capital)', '11', '1124', '112403'),
(1265, '112404000', 'HAGONOY R11', '11', '1124', '112404'),
(1266, '112406000', 'KIBLAWAN', '11', '1124', '112406'),
(1267, '112407000', 'MAGSAYSAY R11', '11', '1124', '112407'),
(1268, '112408000', 'MALALAG', '11', '1124', '112408'),
(1269, '112410000', 'MATANAO', '11', '1124', '112410'),
(1270, '112411000', 'PADADA', '11', '1124', '112411'),
(1271, '112412000', 'SANTA CRUZ', '11', '1124', '112412'),
(1272, '112414000', 'SULOP', '11', '1124', '112414'),
(1273, '112501000', 'BAGANGA', '11', '1125', '112501'),
(1274, '112502000', 'BANAYBANAY', '11', '1125', '112502'),
(1275, '112503000', 'BOSTON', '11', '1125', '112503'),
(1276, '112504000', 'CARAGA', '11', '1125', '112504'),
(1277, '112505000', 'CATEEL', '11', '1125', '112505'),
(1278, '112506000', 'GOVERNOR GENEROSO', '11', '1125', '112506'),
(1279, '112507000', 'LUPON', '11', '1125', '112507'),
(1280, '112508000', 'MANAY', '11', '1125', '112508'),
(1281, '112509000', 'CITY OF MATI (Capital)', '11', '1125', '112509'),
(1282, '112510000', 'SAN ISIDRO', '11', '1125', '112510'),
(1283, '112511000', 'TARRAGONA', '11', '1125', '112511'),
(1284, '118201000', 'COMPOSTELA R11', '11', '1182', '118201'),
(1285, '118202000', 'LAAK (SAN VICENTE)', '11', '1182', '118202'),
(1286, '118203000', 'MABINI (DOÃ‘A ALICIA) R11', '11', '1182', '118203'),
(1287, '118204000', 'MACO', '11', '1182', '118204'),
(1288, '118205000', 'MARAGUSAN (SAN MARIANO)', '11', '1182', '118205'),
(1289, '118206000', 'MAWAB', '11', '1182', '118206'),
(1290, '118207000', 'MONKAYO', '11', '1182', '118207'),
(1291, '118208000', 'MONTEVISTA', '11', '1182', '118208'),
(1292, '118209000', 'NABUNTURAN (Capital)', '11', '1182', '118209'),
(1293, '118210000', 'NEW BATAAN', '11', '1182', '118210'),
(1294, '118211000', 'PANTUKAN', '11', '1182', '118211'),
(1295, '118601000', 'DON MARCELINO', '11', '1186', '118601'),
(1296, '118602000', 'JOSE ABAD SANTOS (TRINIDAD)', '11', '1186', '118602'),
(1297, '118603000', 'MALITA', '11', '1186', '118603'),
(1298, '118604000', 'SANTA MARIA', '11', '1186', '118604'),
(1299, '118605000', 'SARANGANI', '11', '1186', '118605'),
(1300, '124701000', 'ALAMADA', '12', '1247', '124701'),
(1301, '124702000', 'CARMEN R12', '12', '1247', '124702'),
(1302, '124703000', 'KABACAN', '12', '1247', '124703'),
(1303, '124704000', 'CITY OF KIDAPAWAN (Capital)', '12', '1247', '124704'),
(1304, '124705000', 'LIBUNGAN', '12', '1247', '124705'),
(1305, '124706000', 'MAGPET', '12', '1247', '124706'),
(1306, '124707000', 'MAKILALA', '12', '1247', '124707'),
(1307, '124708000', 'MATALAM', '12', '1247', '124708'),
(1308, '124709000', 'MIDSAYAP', '12', '1247', '124709'),
(1309, '124710000', 'M\'LANG', '12', '1247', '124710'),
(1310, '124711000', 'PIGKAWAYAN', '12', '1247', '124711'),
(1311, '124712000', 'PIKIT', '12', '1247', '124712'),
(1312, '124713000', 'PRESIDENT ROXAS', '12', '1247', '124713'),
(1313, '124714000', 'TULUNAN', '12', '1247', '124714'),
(1314, '124715000', 'ANTIPAS', '12', '1247', '124715'),
(1315, '124716000', 'BANISILAN', '12', '1247', '124716'),
(1316, '124717000', 'ALEOSAN', '12', '1247', '124717'),
(1317, '124718000', 'ARAKAN', '12', '1247', '124718'),
(1318, '126302000', 'BANGA R12', '12', '1263', '126302'),
(1319, '126303000', 'GENERAL SANTOS CITY (DADIANGAS)', '12', '1263', '126303'),
(1320, '126306000', 'CITY OF KORONADAL (Capital)', '12', '1263', '126306'),
(1321, '126311000', 'NORALA', '12', '1263', '126311'),
(1322, '126312000', 'POLOMOLOK', '12', '1263', '126312'),
(1323, '126313000', 'SURALLAH', '12', '1263', '126313'),
(1324, '126314000', 'TAMPAKAN', '12', '1263', '126314'),
(1325, '126315000', 'TANTANGAN', '12', '1263', '126315'),
(1326, '126316000', 'T\'BOLI', '12', '1263', '126316'),
(1327, '126317000', 'TUPI', '12', '1263', '126317'),
(1328, '126318000', 'SANTO NIÃ‘O', '12', '1263', '126318'),
(1329, '126319000', 'LAKE SEBU', '12', '1263', '126319'),
(1330, '126501000', 'BAGUMBAYAN', '12', '1265', '126501'),
(1331, '126502000', 'COLUMBIO', '12', '1265', '126502'),
(1332, '126503000', 'ESPERANZA R12', '12', '1265', '126503'),
(1333, '126504000', 'ISULAN (Capital)', '12', '1265', '126504'),
(1334, '126505000', 'KALAMANSIG', '12', '1265', '126505'),
(1335, '126506000', 'LEBAK', '12', '1265', '126506'),
(1336, '126507000', 'LUTAYAN', '12', '1265', '126507'),
(1337, '126508000', 'LAMBAYONG (MARIANO MARCOS)', '12', '1265', '126508'),
(1338, '126509000', 'PALIMBANG', '12', '1265', '126509'),
(1339, '126510000', 'PRESIDENT QUIRINO', '12', '1265', '126510'),
(1340, '126511000', 'CITY OF TACURONG', '12', '1265', '126511'),
(1341, '126512000', 'SEN. NINOY AQUINO', '12', '1265', '126512'),
(1342, '128001000', 'ALABEL (Capital)', '12', '1280', '128001'),
(1343, '128002000', 'GLAN', '12', '1280', '128002'),
(1344, '128003000', 'KIAMBA', '12', '1280', '128003'),
(1345, '128004000', 'MAASIM R12', '12', '1280', '128004'),
(1346, '128005000', 'MAITUM', '12', '1280', '128005'),
(1347, '128006000', 'MALAPATAN', '12', '1280', '128006'),
(1348, '128007000', 'MALUNGON', '12', '1280', '128007'),
(1349, '129804000', 'COTABATO CITY', '12', '1298', '129804'),
(1350, '133901000', 'TONDO I / II', '13', '1339', '133901'),
(1351, '133902000', 'BINONDO', '13', '1339', '133902'),
(1352, '133903000', 'QUIAPO', '13', '1339', '133903'),
(1353, '133904000', 'SAN NICOLAS', '13', '1339', '133904'),
(1354, '133905000', 'SANTA CRUZ', '13', '1339', '133905'),
(1355, '133906000', 'SAMPALOC', '13', '1339', '133906'),
(1356, '133907000', 'SAN MIGUEL', '13', '1339', '133907'),
(1357, '133908000', 'ERMITA', '13', '1339', '133908'),
(1358, '133909000', 'INTRAMUROS', '13', '1339', '133909'),
(1359, '133910000', 'MALATE', '13', '1339', '133910'),
(1360, '133911000', 'PACO', '13', '1339', '133911'),
(1361, '133912000', 'PANDACAN', '13', '1339', '133912'),
(1362, '133913000', 'PORT AREA', '13', '1339', '133913'),
(1363, '133914000', 'SANTA ANA', '13', '1339', '133914'),
(1364, '137401000', 'CITY OF MANDALUYONG', '13', '1374', '137401'),
(1365, '137402000', 'CITY OF MARIKINA', '13', '1374', '137402'),
(1366, '137403000', 'CITY OF PASIG', '13', '1374', '137403'),
(1367, '137404000', 'QUEZON CITY', '13', '1374', '137404'),
(1368, '137405000', 'CITY OF SAN JUAN', '13', '1374', '137405'),
(1369, '137501000', 'CALOOCAN CITY', '13', '1375', '137501'),
(1370, '137502000', 'CITY OF MALABON', '13', '1375', '137502'),
(1371, '137503000', 'CITY OF NAVOTAS', '13', '1375', '137503'),
(1372, '137504000', 'CITY OF VALENZUELA', '13', '1375', '137504'),
(1373, '137601000', 'CITY OF LAS PIÃ‘AS', '13', '1376', '137601'),
(1374, '137602000', 'CITY OF MAKATI', '13', '1376', '137602'),
(1375, '137603000', 'CITY OF MUNTINLUPA', '13', '1376', '137603'),
(1376, '137604000', 'CITY OF PARAÃ‘AQUE', '13', '1376', '137604'),
(1377, '137605000', 'PASAY CITY', '13', '1376', '137605'),
(1378, '137606000', 'PATEROS', '13', '1376', '137606'),
(1379, '137607000', 'TAGUIG CITY', '13', '1376', '137607'),
(1380, '140101000', 'BANGUED (Capital)', '14', '1401', '140101'),
(1381, '140102000', 'BOLINEY', '14', '1401', '140102'),
(1382, '140103000', 'BUCAY', '14', '1401', '140103'),
(1383, '140104000', 'BUCLOC', '14', '1401', '140104'),
(1384, '140105000', 'DAGUIOMAN', '14', '1401', '140105'),
(1385, '140106000', 'DANGLAS', '14', '1401', '140106'),
(1386, '140107000', 'DOLORES CAR', '14', '1401', '140107'),
(1387, '140108000', 'LA PAZ CAR', '14', '1401', '140108'),
(1388, '140109000', 'LACUB', '14', '1401', '140109'),
(1389, '140110000', 'LAGANGILANG', '14', '1401', '140110'),
(1390, '140111000', 'LAGAYAN', '14', '1401', '140111'),
(1391, '140112000', 'LANGIDEN', '14', '1401', '140112'),
(1392, '140113000', 'LICUAN-BAAY (LICUAN)', '14', '1401', '140113'),
(1393, '140114000', 'LUBA', '14', '1401', '140114'),
(1394, '140115000', 'MALIBCONG', '14', '1401', '140115'),
(1395, '140116000', 'MANABO', '14', '1401', '140116'),
(1396, '140117000', 'PEÃ‘ARRUBIA', '14', '1401', '140117'),
(1397, '140118000', 'PIDIGAN', '14', '1401', '140118'),
(1398, '140119000', 'PILAR', '14', '1401', '140119'),
(1399, '140120000', 'SALLAPADAN', '14', '1401', '140120'),
(1400, '140121000', 'SAN ISIDRO', '14', '1401', '140121'),
(1401, '140122000', 'SAN JUAN', '14', '1401', '140122'),
(1402, '140123000', 'SAN QUINTIN', '14', '1401', '140123'),
(1403, '140124000', 'TAYUM', '14', '1401', '140124'),
(1404, '140125000', 'TINEG', '14', '1401', '140125'),
(1405, '140126000', 'TUBO', '14', '1401', '140126'),
(1406, '140127000', 'VILLAVICIOSA', '14', '1401', '140127'),
(1407, '141101000', 'ATOK', '14', '1411', '141101'),
(1408, '141102000', 'BAGUIO CITY', '14', '1411', '141102'),
(1409, '141103000', 'BAKUN', '14', '1411', '141103'),
(1410, '141104000', 'BOKOD', '14', '1411', '141104'),
(1411, '141105000', 'BUGUIAS', '14', '1411', '141105'),
(1412, '141106000', 'ITOGON', '14', '1411', '141106'),
(1413, '141107000', 'KABAYAN', '14', '1411', '141107'),
(1414, '141108000', 'KAPANGAN', '14', '1411', '141108'),
(1415, '141109000', 'KIBUNGAN', '14', '1411', '141109'),
(1416, '141110000', 'LA TRINIDAD (Capital)', '14', '1411', '141110'),
(1417, '141111000', 'MANKAYAN', '14', '1411', '141111'),
(1418, '141112000', 'SABLAN', '14', '1411', '141112'),
(1419, '141113000', 'TUBA', '14', '1411', '141113'),
(1420, '141114000', 'TUBLAY', '14', '1411', '141114'),
(1421, '142701000', 'BANAUE', '14', '1427', '142701'),
(1422, '142702000', 'HUNGDUAN', '14', '1427', '142702'),
(1423, '142703000', 'KIANGAN', '14', '1427', '142703'),
(1424, '142704000', 'LAGAWE (Capital)', '14', '1427', '142704'),
(1425, '142705000', 'LAMUT', '14', '1427', '142705'),
(1426, '142706000', 'MAYOYAO', '14', '1427', '142706'),
(1427, '142707000', 'ALFONSO LISTA (POTIA)', '14', '1427', '142707'),
(1428, '142708000', 'AGUINALDO', '14', '1427', '142708'),
(1429, '142709000', 'HINGYON', '14', '1427', '142709'),
(1430, '142710000', 'TINOC', '14', '1427', '142710'),
(1431, '142711000', 'ASIPULO', '14', '1427', '142711'),
(1432, '143201000', 'BALBALAN', '14', '1432', '143201'),
(1433, '143206000', 'LUBUAGAN', '14', '1432', '143206'),
(1434, '143208000', 'PASIL', '14', '1432', '143208'),
(1435, '143209000', 'PINUKPUK', '14', '1432', '143209'),
(1436, '143211000', 'RIZAL (LIWAN)', '14', '1432', '143211'),
(1437, '143213000', 'CITY OF TABUK (Capital)', '14', '1432', '143213'),
(1438, '143214000', 'TANUDAN', '14', '1432', '143214'),
(1439, '143215000', 'TINGLAYAN', '14', '1432', '143215'),
(1440, '144401000', 'BARLIG', '14', '1444', '144401'),
(1441, '144402000', 'BAUKO', '14', '1444', '144402'),
(1442, '144403000', 'BESAO', '14', '1444', '144403'),
(1443, '144404000', 'BONTOC (Capital) CAR', '14', '1444', '144404'),
(1444, '144405000', 'NATONIN', '14', '1444', '144405'),
(1445, '144406000', 'PARACELIS', '14', '1444', '144406'),
(1446, '144407000', 'SABANGAN', '14', '1444', '144407'),
(1447, '144408000', 'SADANGA', '14', '1444', '144408'),
(1448, '144409000', 'SAGADA', '14', '1444', '144409'),
(1449, '144410000', 'TADIAN', '14', '1444', '144410'),
(1450, '148101000', 'CALANASAN (BAYAG)', '14', '1481', '148101'),
(1451, '148102000', 'CONNER', '14', '1481', '148102'),
(1452, '148103000', 'FLORA', '14', '1481', '148103'),
(1453, '148104000', 'KABUGAO (Capital)', '14', '1481', '148104'),
(1454, '148105000', 'LUNA CAR', '14', '1481', '148105'),
(1455, '148106000', 'PUDTOL', '14', '1481', '148106'),
(1456, '148107000', 'SANTA MARCELA', '14', '1481', '148107'),
(1457, '150702000', 'CITY OF LAMITAN', '15', '1507', '150702'),
(1458, '150703000', 'LANTAWAN', '15', '1507', '150703'),
(1459, '150704000', 'MALUSO', '15', '1507', '150704'),
(1460, '150705000', 'SUMISIP', '15', '1507', '150705'),
(1461, '150706000', 'TIPO-TIPO', '15', '1507', '150706'),
(1462, '150707000', 'TUBURAN', '15', '1507', '150707'),
(1463, '150708000', 'AKBAR', '15', '1507', '150708'),
(1464, '150709000', 'AL-BARKA', '15', '1507', '150709'),
(1465, '150710000', 'HADJI MOHAMMAD AJUL', '15', '1507', '150710'),
(1466, '150711000', 'UNGKAYA PUKAN', '15', '1507', '150711'),
(1467, '150712000', 'HADJI MUHTAMAD', '15', '1507', '150712'),
(1468, '150713000', 'TABUAN-LASA', '15', '1507', '150713'),
(1469, '153601000', 'BACOLOD-KALAWI (BACOLOD GRANDE)ARMM', '15', '1536', '153601'),
(1470, '153602000', 'BALABAGAN', '15', '1536', '153602'),
(1471, '153603000', 'BALINDONG (WATU)', '15', '1536', '153603'),
(1472, '153604000', 'BAYANG', '15', '1536', '153604'),
(1473, '153605000', 'BINIDAYAN', '15', '1536', '153605'),
(1474, '153606000', 'BUBONG', '15', '1536', '153606'),
(1475, '153607000', 'BUTIG', '15', '1536', '153607'),
(1476, '153609000', 'GANASSI', '15', '1536', '153609'),
(1477, '153610000', 'KAPAI', '15', '1536', '153610'),
(1478, '153611000', 'LUMBA-BAYABAO (MAGUING)', '15', '1536', '153611'),
(1479, '153612000', 'LUMBATAN', '15', '1536', '153612'),
(1480, '153613000', 'MADALUM', '15', '1536', '153613'),
(1481, '153614000', 'MADAMBA', '15', '1536', '153614'),
(1482, '153615000', 'MALABANG', '15', '1536', '153615'),
(1483, '153616000', 'MARANTAO', '15', '1536', '153616'),
(1484, '153617000', 'MARAWI CITY (Capital)', '15', '1536', '153617'),
(1485, '153618000', 'MASIU', '15', '1536', '153618'),
(1486, '153619000', 'MULONDO', '15', '1536', '153619'),
(1487, '153620000', 'PAGAYAWAN (TATARIKAN)', '15', '1536', '153620'),
(1488, '153621000', 'PIAGAPO', '15', '1536', '153621'),
(1489, '153622000', 'POONA BAYABAO (GATA)', '15', '1536', '153622'),
(1490, '153623000', 'PUALAS', '15', '1536', '153623'),
(1491, '153624000', 'DITSAAN-RAMAIN', '15', '1536', '153624'),
(1492, '153625000', 'SAGUIARAN', '15', '1536', '153625'),
(1493, '153626000', 'TAMPARAN', '15', '1536', '153626'),
(1494, '153627000', 'TARAKA', '15', '1536', '153627'),
(1495, '153628000', 'TUBARAN', '15', '1536', '153628'),
(1496, '153629000', 'TUGAYA', '15', '1536', '153629'),
(1497, '153630000', 'WAO', '15', '1536', '153630'),
(1498, '153631000', 'MAROGONG', '15', '1536', '153631'),
(1499, '153632000', 'CALANOGAS', '15', '1536', '153632'),
(1500, '153633000', 'BUADIPOSO-BUNTONG', '15', '1536', '153633'),
(1501, '153634000', 'MAGUING', '15', '1536', '153634'),
(1502, '153635000', 'PICONG (SULTAN GUMANDER)', '15', '1536', '153635'),
(1503, '153636000', 'LUMBAYANAGUE', '15', '1536', '153636'),
(1504, '153637000', 'BUMBARAN', '15', '1536', '153637'),
(1505, '153638000', 'TAGOLOAN II', '15', '1536', '153638'),
(1506, '153639000', 'KAPATAGAN ARMM', '15', '1536', '153639'),
(1507, '153640000', 'SULTAN DUMALONDONG', '15', '1536', '153640'),
(1508, '153641000', 'LUMBACA-UNAYAN', '15', '1536', '153641'),
(1509, '153801000', 'AMPATUAN', '15', '1538', '153801'),
(1510, '153802000', 'BULDON', '15', '1538', '153802'),
(1511, '153803000', 'BULUAN', '15', '1538', '153803'),
(1512, '153805000', 'DATU PAGLAS', '15', '1538', '153805'),
(1513, '153806000', 'DATU PIANG', '15', '1538', '153806'),
(1514, '153807000', 'DATU ODIN SINSUAT (DINAIG)', '15', '1538', '153807'),
(1515, '153808000', 'SHARIFF AGUAK (MAGANOY) (Capital)', '15', '1538', '153808'),
(1516, '153809000', 'MATANOG', '15', '1538', '153809'),
(1517, '153810000', 'PAGALUNGAN', '15', '1538', '153810'),
(1518, '153811000', 'PARANG', '15', '1538', '153811'),
(1519, '153812000', 'SULTAN KUDARAT (NULING)', '15', '1538', '153812'),
(1520, '153813000', 'SULTAN SA BARONGIS (LAMBAYONG)', '15', '1538', '153813'),
(1521, '153814000', 'KABUNTALAN (TUMBAO)', '15', '1538', '153814'),
(1522, '153815000', 'UPI', '15', '1538', '153815'),
(1523, '153816000', 'TALAYAN', '15', '1538', '153816'),
(1524, '153817000', 'SOUTH UPI', '15', '1538', '153817'),
(1525, '153818000', 'BARIRA', '15', '1538', '153818'),
(1526, '153819000', 'GEN. S. K. PENDATUN', '15', '1538', '153819'),
(1527, '153820000', 'MAMASAPANO', '15', '1538', '153820'),
(1528, '153821000', 'TALITAY', '15', '1538', '153821'),
(1529, '153822000', 'PAGAGAWAN', '15', '1538', '153822'),
(1530, '153823000', 'PAGLAT', '15', '1538', '153823'),
(1531, '153824000', 'SULTAN MASTURA', '15', '1538', '153824'),
(1532, '153825000', 'GUINDULUNGAN', '15', '1538', '153825'),
(1533, '153826000', 'DATU SAUDI-AMPATUAN', '15', '1538', '153826'),
(1534, '153827000', 'DATU UNSAY', '15', '1538', '153827'),
(1535, '153828000', 'DATU ABDULLAH SANGKI', '15', '1538', '153828'),
(1536, '153829000', 'RAJAH BUAYAN', '15', '1538', '153829'),
(1537, '153830000', 'DATU BLAH T. SINSUAT', '15', '1538', '153830'),
(1538, '153831000', 'DATU ANGGAL MIDTIMBANG', '15', '1538', '153831'),
(1539, '153832000', 'MANGUDADATU', '15', '1538', '153832'),
(1540, '153833000', 'PANDAG', '15', '1538', '153833'),
(1541, '153834000', 'NORTHERN KABUNTALAN', '15', '1538', '153834'),
(1542, '153835000', 'DATU HOFFER AMPATUAN', '15', '1538', '153835'),
(1543, '153836000', 'DATU SALIBO', '15', '1538', '153836'),
(1544, '153837000', 'SHARIFF SAYDONA MUSTAPHA', '15', '1538', '153837'),
(1545, '156601000', 'INDANAN', '15', '1566', '156601'),
(1546, '156602000', 'JOLO (Capital)', '15', '1566', '156602'),
(1547, '156603000', 'KALINGALAN CALUANG', '15', '1566', '156603'),
(1548, '156604000', 'LUUK', '15', '1566', '156604'),
(1549, '156605000', 'MAIMBUNG', '15', '1566', '156605'),
(1550, '156606000', 'HADJI PANGLIMA TAHIL (MARUNGGAS)', '15', '1566', '156606'),
(1551, '156607000', 'OLD PANAMAO', '15', '1566', '156607'),
(1552, '156608000', 'PANGUTARAN', '15', '1566', '156608'),
(1553, '156609000', 'PARANG', '15', '1566', '156609'),
(1554, '156610000', 'PATA', '15', '1566', '156610'),
(1555, '156611000', 'PATIKUL', '15', '1566', '156611'),
(1556, '156612000', 'SIASI', '15', '1566', '156612'),
(1557, '156613000', 'TALIPAO', '15', '1566', '156613'),
(1558, '156614000', 'TAPUL', '15', '1566', '156614'),
(1559, '156615000', 'TONGKIL', '15', '1566', '156615'),
(1560, '156616000', 'PANGLIMA ESTINO (NEW PANAMAO)', '15', '1566', '156616'),
(1561, '156617000', 'LUGUS', '15', '1566', '156617'),
(1562, '156618000', 'PANDAMI', '15', '1566', '156618'),
(1563, '156619000', 'OMAR', '15', '1566', '156619'),
(1564, '157001000', 'PANGLIMA SUGALA (BALIMBING)', '15', '1570', '157001'),
(1565, '157002000', 'BONGAO (Capital)', '15', '1570', '157002'),
(1566, '157003000', 'MAPUN (CAGAYAN DE TAWI-TAWI)', '15', '1570', '157003'),
(1567, '157004000', 'SIMUNUL', '15', '1570', '157004'),
(1568, '157005000', 'SITANGKAI', '15', '1570', '157005'),
(1569, '157006000', 'SOUTH UBIAN', '15', '1570', '157006'),
(1570, '157007000', 'TANDUBAS', '15', '1570', '157007'),
(1571, '157008000', 'TURTLE ISLANDS', '15', '1570', '157008'),
(1572, '157009000', 'LANGUYAN', '15', '1570', '157009'),
(1573, '157010000', 'SAPA-SAPA', '15', '1570', '157010'),
(1574, '157011000', 'SIBUTU', '15', '1570', '157011'),
(1575, '160201000', 'BUENAVISTA R13', '16', '1602', '160201'),
(1576, '160202000', 'BUTUAN CITY (Capital)', '16', '1602', '160202'),
(1577, '160203000', 'CITY OF CABADBARAN', '16', '1602', '160203'),
(1578, '160204000', 'CARMEN R13', '16', '1602', '160204'),
(1579, '160205000', 'JABONGA', '16', '1602', '160205'),
(1580, '160206000', 'KITCHARAO', '16', '1602', '160206'),
(1581, '160207000', 'LAS NIEVES', '16', '1602', '160207'),
(1582, '160208000', 'MAGALLANES R13', '16', '1602', '160208'),
(1583, '160209000', 'NASIPIT', '16', '1602', '160209'),
(1584, '160210000', 'SANTIAGO', '16', '1602', '160210'),
(1585, '160211000', 'TUBAY', '16', '1602', '160211'),
(1586, '160212000', 'REMEDIOS T. ROMUALDEZ', '16', '1602', '160212'),
(1587, '160301000', 'CITY OF BAYUGAN', '16', '1603', '160301'),
(1588, '160302000', 'BUNAWAN', '16', '1603', '160302'),
(1589, '160303000', 'ESPERANZA R13', '16', '1603', '160303'),
(1590, '160304000', 'LA PAZ R13', '16', '1603', '160304'),
(1591, '160305000', 'LORETO', '16', '1603', '160305'),
(1592, '160306000', 'PROSPERIDAD (Capital)', '16', '1603', '160306'),
(1593, '160307000', 'ROSARIO', '16', '1603', '160307'),
(1594, '160308000', 'SAN FRANCISCO', '16', '1603', '160308'),
(1595, '160309000', 'SAN LUIS', '16', '1603', '160309'),
(1596, '160310000', 'SANTA JOSEFA', '16', '1603', '160310'),
(1597, '160311000', 'TALACOGON', '16', '1603', '160311'),
(1598, '160312000', 'TRENTO', '16', '1603', '160312'),
(1599, '160313000', 'VERUELA', '16', '1603', '160313'),
(1600, '160314000', 'SIBAGAT', '16', '1603', '160314'),
(1601, '166701000', 'ALEGRIA R13', '16', '1667', '166701'),
(1602, '166702000', 'BACUAG', '16', '1667', '166702'),
(1603, '166704000', 'BURGOS R13', '16', '1667', '166704'),
(1604, '166706000', 'CLAVER', '16', '1667', '166706'),
(1605, '166707000', 'DAPA', '16', '1667', '166707'),
(1606, '166708000', 'DEL CARMEN', '16', '1667', '166708'),
(1607, '166710000', 'GENERAL LUNA R13', '16', '1667', '166710'),
(1608, '166711000', 'GIGAQUIT', '16', '1667', '166711'),
(1609, '166714000', 'MAINIT', '16', '1667', '166714'),
(1610, '166715000', 'MALIMONO', '16', '1667', '166715'),
(1611, '166716000', 'PILAR', '16', '1667', '166716'),
(1612, '166717000', 'PLACER', '16', '1667', '166717'),
(1613, '166718000', 'SAN BENITO', '16', '1667', '166718'),
(1614, '166719000', 'SAN FRANCISCO (ANAO-AON)', '16', '1667', '166719'),
(1615, '166720000', 'SAN ISIDRO', '16', '1667', '166720'),
(1616, '166721000', 'SANTA MONICA (SAPAO)', '16', '1667', '166721'),
(1617, '166722000', 'SISON', '16', '1667', '166722'),
(1618, '166723000', 'SOCORRO', '16', '1667', '166723'),
(1619, '166724000', 'SURIGAO CITY (Capital)', '16', '1667', '166724'),
(1620, '166725000', 'TAGANA-AN', '16', '1667', '166725'),
(1621, '166727000', 'TUBOD', '16', '1667', '166727'),
(1622, '166801000', 'BAROBO', '16', '1668', '166801'),
(1623, '166802000', 'BAYABAS', '16', '1668', '166802'),
(1624, '166803000', 'CITY OF BISLIG', '16', '1668', '166803'),
(1625, '166804000', 'CAGWAIT', '16', '1668', '166804'),
(1626, '166805000', 'CANTILAN', '16', '1668', '166805'),
(1628, '166807000', 'CARRASCAL', '16', '1668', '166807'),
(1629, '166808000', 'CORTES R13', '16', '1668', '166808'),
(1630, '166809000', 'HINATUAN', '16', '1668', '166809'),
(1631, '166810000', 'LANUZA', '16', '1668', '166810'),
(1632, '166811000', 'LIANGA', '16', '1668', '166811'),
(1633, '166812000', 'LINGIG', '16', '1668', '166812'),
(1634, '166813000', 'MADRID', '16', '1668', '166813'),
(1635, '166814000', 'MARIHATAG', '16', '1668', '166814'),
(1636, '166815000', 'SAN AGUSTIN', '16', '1668', '166815'),
(1637, '166816000', 'SAN MIGUEL', '16', '1668', '166816'),
(1638, '166817000', 'TAGBINA', '16', '1668', '166817'),
(1639, '166818000', 'TAGO', '16', '1668', '166818'),
(1640, '166819000', 'CITY OF TANDAG (Capital)', '16', '1668', '166819'),
(1641, '168501000', 'BASILISA (RIZAL)', '16', '1685', '168501'),
(1642, '168502000', 'CAGDIANAO', '16', '1685', '168502'),
(1643, '168503000', 'DINAGAT', '16', '1685', '168503'),
(1644, '168504000', 'LIBJO (ALBOR)', '16', '1685', '168504'),
(1646, '168506000', 'SAN JOSE (Capital)', '16', '1685', '168506'),
(1647, '168507000', 'TUBAJON', '16', '1685', '168507'),
(1648, '180000000', 'N/A', '18', '1800', '180000'),
(1649, '133915000', 'SANTA MESA', '13', '1339', '133915'),
(1650, '133916000', 'SAN ANDRES BUKID', '13', '1339', '133916'),
(1651, '133917000', 'MANILA CITY', '13', '1339', '133917');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `description`, `is_deleted`) VALUES
(1, 'Class 1', 0),
(2, 'N/A', 0),
(3, 'Model Class A', 0),
(4, 'Model Class B', 0),
(5, 'Edi shengssss', 1),
(6, 'dasdadas', 1),
(7, 'Edi sheng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_company`
--

CREATE TABLE `client_company` (
  `id` bigint(20) NOT NULL,
  `division` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_company`
--

INSERT INTO `client_company` (`id`, `division`, `company_name`, `area`, `region`, `branch`, `address`, `is_deleted`) VALUES
(1, 'BD1', 'Unilever Philippines Inc.', 'Metro Manila', 'National Capital Region', 'All SM Branch', '7th Floor Bonifacio Stopover Corporate Center 31st Street Corner 2nd Avenue, Bonifacio Global City Fort Bonifacio, Taguig City', 0),
(2, 'BD1', 'Unilever RFM Selecta Ice Cream Inc.', 'Nationwide', 'Nationwide', 'NCR', 'Manggahan Light Industrial Park, Pasig City', 0),
(3, 'BD2', 'Concentrix CVG Philippines Inc.', 'NCR', 'NCR', 'NCR', '4th floor Glorietta 5 Bldg. East St., Btgy. San Lorenzo corner Ayala Avenue, Makati City', 0),
(4, 'BD2', 'GlaxoSmithkline', 'NCR', 'NCR', 'NCR', '2266 Chino Roces Avenue, Makati City / 31st floor One World Place 32nd St., Bonifacio Global City', 0),
(5, 'BD2', 'Huawei', 'Nationwide', 'Nationwide', 'Nationwide', '53rd Floor PBCom Tower, Ayala Avenue Corner VA Rufino St. Makati City, Philippines', 0),
(6, 'BD2', 'Pernod Ricard', 'NCR', 'NCR', 'NCR', 'Units 509-P And 510-P Five E-com Center Bldg. Pacific Drive Extension, Block 18, Mall Of Asia Complex, Pasay City', 0),
(7, 'BD2', 'Philusa Corporation', 'Nationwide', 'Nationwide', 'NCR', '16 Corner Shaw Boulevard, Pasig, 1603 Metro Manila', 0),
(8, 'BD2', 'Shell', 'Nationwide', 'Nationwide', 'NCR', '41st floor The Finance Center BGC, Taguig', 0),
(9, 'BD2', 'Unilever Food Solutions', 'NCR', 'NCR', 'NCR', '7th Floor Bonifacio Stopover Corporate Center 31st Street Corner 2nd Avenue, Bonifacio Global City Fort Bonifacio, Taguig City', 0),
(10, 'BD3', 'Circular Paradigm Fashion Inc', 'Nationwide', 'Nationwide', 'Nationwide', '168 Bldg. 6 San Vicente Road Brgy. San Vicente, San Pedro City, Laguna', 0),
(11, 'BD3', 'Gruppo Innovare Corporation', 'Ncr', 'Ncr', 'Ncr', '123 J. M. Basa St. Calumpang, Marikina City', 0),
(12, 'BD3', 'Gruppo Potenza Corp.', 'Nationwide', 'Nationwide', 'NCR', '123 J. M. Basa St. Calumpang, Marikina City', 0),
(13, 'BD3', 'JT INTERNATIONAL INC. (Phils.)', 'NCR', 'National Capital Region', 'NCR', 'PentHouse W Office Bldg., 28th St. Cor. 11th Ave., Bonifacio Global City, Taguig City', 0),
(14, 'HR', 'PCN Promopro Inc.', 'N/A', 'N/A', 'N/A', '27 Cresta St. Brgy. Malamig, Mandaluyong City', 0),
(15, 'FINANCE', 'PCN Promopro Inc.', 'N/A', 'N/A', 'N/A', '27 Cresta St. Brgy. Malamig, Mandaluyong City', 0),
(16, 'STRAT', 'PCN Promopro Inc.', 'N/A', 'N/A', 'N/A', '27 Cresta St. Brgy. Malamig, Mandaluyong City', 0),
(17, 'BSG', 'PCN Promopro Inc.', 'N/A', 'N/A', 'N/A', '27 Cresta St. Brgy. Malamig, Mandaluyong City', 0),
(18, 'PPI', 'PCN Promopro Inc.', 'N/A', 'N/A', 'N/A', '27 Cresta St. Brgy. Malamig, Mandaluyong City', 0),
(19, '', 'James Philip Corp.', 'Payatas Quezon City', 'Metropolitan Manila', 'Bear Branchsssssssssssssss', '#27 BANSALANGIN ST PAYATAS Bs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_project`
--

CREATE TABLE `client_project` (
  `id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `client_company_name` varchar(255) NOT NULL,
  `ewb_count` tinyint(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=active, 1=inactive',
  `is_deleted` int(11) DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_project`
--

INSERT INTO `client_project` (`id`, `project_title`, `client_company_name`, `ewb_count`, `start_date`, `end_date`, `status`, `is_deleted`, `date_created`) VALUES
(1, 'IT Support', 'Selecta', 123, '2023-11-14', '2023-11-16', '1', 0, '2023-11-06 06:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `fms` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `typenya` varchar(255) NOT NULL,
  `approve` varchar(255) NOT NULL,
  `idnum` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `lastname`, `firstname`, `mi`, `contactno`, `emailadd`, `fms`, `uname`, `pname`, `typenya`, `approve`, `idnum`) VALUES
(9, 'VILL', 'DEO', 'DE', '090', 'email', 'BSG', 'recruitment', 'r', 'RECRUITMENT', '1', '40'),
(12, 'Labasan', 'Noel', '', '09478093814', 'email', 'FINANCE', 'deployment', 'd', 'DEPLOYMENT', '1', '9999'),
(13, 'FUENTES', 'PATTY', 'DE', '090', 'email', 'BSG', 'ewb', 'e', 'EWB', '1', '40'),
(14, 'VILL', 'DEO', 'DE', '090', 'email', 'PPI', 'rodeovill', 'ppi', 'DISER', '1', '40'),
(15, 'VILL', 'DEO', 'DE', '090', 'email', 'BD1-BU3_BEST_CENTER', 'rodeovill', 'bd1', 'DISER', '1', '40'),
(16, 'VILL', 'DEO', 'DE', '090', 'email', 'FINANCE', 'rodeovill', 'fin', 'DISER', '1', '40'),
(17, 'VILL', 'DEO', 'DE', '090', 'email', 'HR', 'rodeovill', 'hr', 'DISER', '1', '40'),
(18, 'VILL', 'DEO', 'DE', '090', 'email', 'BD2_BU1', 'rodeovill', 'bd2', 'DISER', '1', '40'),
(19, 'VILL', 'DEO', 'DE', '090', 'email', 'BD3', 'rodeovill', 'bd3', 'DISER', '1', '40'),
(20, 'VILL', 'DEO', 'DE', '090', 'email', 'BSG', 'proc', 'proc', 'PROC', '1', '40'),
(21, 'Gomera', 'James Philip', 'A', '09101465183', 'jphigomera0619@gmail.com', 'fms', 'mrf', 'm', 'MRF', '1', '41'),
(22, 'admin', 'admin', 'admin', '09123456789', 'admin@gmail.com', 'ADMIN', 'admin', 'admin', 'ADMIN', '1', '41');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `division` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `description`, `division`) VALUES
(1, 'Core', 'BD1'),
(8, 'Selecta', 'BD1'),
(9, 'Best Center', 'BD1'),
(10, 'Special_Activation', 'BD1'),
(11, 'BU1', 'BD2'),
(12, 'BU2', 'BD2'),
(13, 'BU3', 'BD2'),
(14, 'BD3', 'BD3'),
(15, 'MIS', 'STRAT'),
(16, 'WAREHOUSE', 'BSG'),
(17, 'PROCUREMENT', 'BSG'),
(18, 'FOG', 'BSG'),
(19, 'HRD', 'HR'),
(20, 'FINANCE', 'FINANCE'),
(21, 'PPI', 'PPI');

-- --------------------------------------------------------

--
-- Table structure for table `deployment`
--

CREATE TABLE `deployment` (
  `id` int(11) NOT NULL,
  `shortlist_title` varchar(255) NOT NULL,
  `appno` int(11) NOT NULL,
  `date_shortlisted` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sss` int(11) NOT NULL,
  `philhealth` int(11) NOT NULL,
  `pagibig` int(11) NOT NULL,
  `tin` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `loa_status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `loa_start_date` varchar(255) NOT NULL,
  `loa_end_date` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `locator` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `place_assigned` varchar(255) NOT NULL,
  `address_assigned` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `employment_status` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `loa_template` varchar(255) NOT NULL,
  `201_remarks` varchar(255) NOT NULL DEFAULT 'NOT RETURN',
  `basic_salary` varchar(255) NOT NULL,
  `ecola` varchar(255) NOT NULL,
  `communication_allowance` varchar(255) NOT NULL,
  `transportation_allowance` varchar(255) NOT NULL,
  `internet_allowance` varchar(255) NOT NULL,
  `meal_allowance` varchar(255) NOT NULL,
  `outbase_meal` varchar(255) NOT NULL,
  `special_allowance` varchar(255) NOT NULL,
  `position_allowance` varchar(255) NOT NULL,
  `deployment_remarks` varchar(255) NOT NULL,
  `no_of_days` varchar(255) NOT NULL,
  `outlet` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `field_supervisor` varchar(255) NOT NULL,
  `field_designation` varchar(255) NOT NULL,
  `deployment_personnel` varchar(255) NOT NULL,
  `deployment_designation` varchar(255) NOT NULL,
  `project_supervisor` varchar(255) NOT NULL,
  `projectSupervisor_deployment` varchar(255) NOT NULL,
  `head` varchar(255) NOT NULL,
  `head_designation` varchar(255) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `id_remarks` varchar(255) NOT NULL,
  `clearance` varchar(255) NOT NULL,
  `signed_loa` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_return` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deployment_history`
--

CREATE TABLE `deployment_history` (
  `id` int(11) NOT NULL,
  `shortlist_title` varchar(255) DEFAULT NULL,
  `appno` int(11) DEFAULT NULL,
  `employee_name` varchar(255) NOT NULL,
  `date_shortlisted` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `sss` varchar(255) DEFAULT NULL,
  `philhealth` varchar(255) DEFAULT NULL,
  `pagibig` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `address` text,
  `contact_number` int(15) DEFAULT NULL,
  `loa_status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `loa_start_date` varchar(255) DEFAULT NULL,
  `loa_end_date` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `locator` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `place_assigned` varchar(255) DEFAULT NULL,
  `address_assigned` text,
  `channel` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `loa_template` varchar(255) DEFAULT NULL,
  `201_remarks` text,
  `basic_salary` decimal(10,2) DEFAULT NULL,
  `ecola` decimal(10,2) DEFAULT NULL,
  `communication_allowance` decimal(10,2) DEFAULT '0.00',
  `transportation_allowance` decimal(10,2) DEFAULT '0.00',
  `internet_allowance` decimal(10,2) DEFAULT '0.00',
  `meal_allowance` decimal(10,2) DEFAULT '0.00',
  `outbase_meal` decimal(10,2) DEFAULT '0.00',
  `special_allowance` decimal(10,2) DEFAULT '0.00',
  `position_allowance` decimal(10,2) DEFAULT '0.00',
  `deployment_remarks` text,
  `no_of_days` int(11) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `supervisor` varchar(255) DEFAULT NULL,
  `field_supervisor` varchar(255) DEFAULT NULL,
  `field_designation` varchar(255) DEFAULT NULL,
  `deployment_personnel` varchar(255) DEFAULT NULL,
  `deployment_designation` varchar(255) DEFAULT NULL,
  `project_supervisor` varchar(255) DEFAULT NULL,
  `projectSupervisor_deployment` varchar(255) DEFAULT NULL,
  `head` varchar(255) DEFAULT NULL,
  `head_designation` varchar(255) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `id_remarks` text,
  `clearance` varchar(255) DEFAULT NULL,
  `signed_loa` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` varchar(255) NOT NULL,
  `date_return` date DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deploy_status`
--

CREATE TABLE `deploy_status` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deploy_status`
--

INSERT INTO `deploy_status` (`id`, `description`, `is_deleted`) VALUES
(2, 'Deployed', 0),
(3, 'Deployed without requirements', 0);

-- --------------------------------------------------------

--
-- Table structure for table `distinguishing_qualification_marks`
--

CREATE TABLE `distinguishing_qualification_marks` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distinguishing_qualification_marks`
--

INSERT INTO `distinguishing_qualification_marks` (`id`, `description`, `is_deleted`) VALUES
(1, 'Mark 1', 1),
(2, 'N/A', 0),
(3, 'With Tattoo', 0),
(4, 'With Eye Glasses', 0),
(5, 'With Braces', 0),
(6, 'Straight Hair', 0),
(7, 'Curly Hair', 0),
(8, 'Short Hair', 0),
(9, 'Skin Head/Bald', 0),
(10, 'With Regional Accent', 0),
(11, 'Problem with Letter S', 0),
(12, 'Pimple Marks', 0),
(13, 'Chubby', 0),
(14, 'Problem with Letter E', 0),
(15, 'Problem with Letter I', 0),
(16, 'Moreno/Morena', 0),
(17, 'With Facial Hair', 0),
(18, 'Tall', 0),
(19, 'Incomplete Set of Teeth', 0),
(20, 'Abnormal tooth growth/sungki', 0),
(21, 'May balat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `description`, `is_deleted`) VALUES
(1, 'BD1', 0),
(2, 'BD2', 0),
(3, 'BD3', 0),
(4, 'BSG', 0),
(5, 'HR', 0),
(6, 'FINANCE', 0),
(7, 'PPI', 0),
(8, 'STRAT', 0),
(9, 'BABY23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empcounter`
--

CREATE TABLE `empcounter` (
  `id` int(11) NOT NULL,
  `appno` varchar(255) NOT NULL,
  `counter` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empcounter`
--

INSERT INTO `empcounter` (`id`, `appno`, `counter`) VALUES
(1, '166', '7');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `tracking` varchar(255) NOT NULL,
  `photopath` varchar(255) NOT NULL,
  `dapplied` varchar(255) NOT NULL,
  `app_id` int(11) NOT NULL,
  `appno` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `lastnameko` varchar(255) NOT NULL,
  `firstnameko` varchar(255) NOT NULL,
  `mnko` varchar(255) NOT NULL,
  `extnname` varchar(255) NOT NULL,
  `maiden_name` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `cityn` varchar(255) NOT NULL,
  `regionn` varchar(255) NOT NULL,
  `peraddress` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gendern` varchar(255) NOT NULL,
  `civiln` varchar(255) NOT NULL,
  `cpnum` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `despo` varchar(255) NOT NULL,
  `classn` varchar(255) NOT NULL,
  `idenn` varchar(255) NOT NULL,
  `sssnum` varchar(255) NOT NULL,
  `pagibignum` varchar(255) NOT NULL,
  `phnum` varchar(255) NOT NULL,
  `tinnum` varchar(255) NOT NULL,
  `policed` varchar(255) NOT NULL,
  `brgyd` varchar(255) NOT NULL,
  `nbid` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `actionpoint` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `reasonofaction` varchar(255) NOT NULL,
  `dateofaction` varchar(255) NOT NULL,
  `ewbdeploy` varchar(255) NOT NULL,
  `ewbdate` varchar(255) NOT NULL,
  `ewb_status` varchar(255) NOT NULL,
  `ewb_reason` varchar(3000) NOT NULL,
  `recruitment_reason` varchar(3000) NOT NULL,
  `ewb_date_declined` varchar(255) NOT NULL,
  `e_person` varchar(255) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `e_number` varchar(255) NOT NULL,
  `ter_date` varchar(255) NOT NULL,
  `ter_person` varchar(255) NOT NULL,
  `res_date` text NOT NULL,
  `res_person` varchar(255) NOT NULL,
  `end_con` varchar(255) NOT NULL,
  `ter_reason` varchar(255) NOT NULL,
  `unter_reason` varchar(255) NOT NULL,
  `res_reason` varchar(255) NOT NULL,
  `retrench_date` varchar(255) NOT NULL,
  `retrench_reason` varchar(255) NOT NULL,
  `retrench_personel` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `ewb_verified_by` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `tracking`, `photopath`, `dapplied`, `app_id`, `appno`, `source`, `lastnameko`, `firstnameko`, `mnko`, `extnname`, `maiden_name`, `paddress`, `cityn`, `regionn`, `peraddress`, `birthday`, `age`, `gendern`, `civiln`, `cpnum`, `landline`, `emailadd`, `despo`, `classn`, `idenn`, `sssnum`, `pagibignum`, `phnum`, `tinnum`, `policed`, `brgyd`, `nbid`, `psa`, `remarks`, `actionpoint`, `reasonofaction`, `dateofaction`, `ewbdeploy`, `ewbdate`, `ewb_status`, `ewb_reason`, `recruitment_reason`, `ewb_date_declined`, `e_person`, `e_address`, `e_number`, `ter_date`, `ter_person`, `res_date`, `res_person`, `end_con`, `ter_reason`, `unter_reason`, `res_reason`, `retrench_date`, `retrench_reason`, `retrench_personel`, `created_by`, `ewb_verified_by`, `is_deleted`) VALUES
(11, '12', '../../upload/default.png', '2023-11-18 11:33:45', 0, '12', 'REFERRAL', 'SMITH', 'JOHN', 'DOE', '', '', '#27 BANSALANGIN ST PAYATAS B', 'QUEZON CITY', '13', '', '11/11/1994', '29', 'MALE', 'SINGLE', '2147483647', '', 'JOHNDOE123@TEST.COM', 'IT SUPPORT', '', '', '', '', '', '', '', '', '', '', '', 'ACTIVE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(12, '13', '../../upload/default.png', '2023-11-18 13:37:10', 0, '13', 'NON REFERRAL', 'MALANDUTAY', 'LEVI', 'MABANGIS', '', '', 'BANSALANGIN ST. PAYATAS B', 'AGUINALDO', '14', '', '11/08/2023', '0', 'FEMALE', 'SINGLE', '2147483647', '', 'LEVIMABANGIS@GMAIL.COM', 'BUSINESS MANAGER', '', '', '', '', '', '', '', '', '', '', '', 'ACTIVE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(10, '11', '../../upload/default.png', '2023-11-18 11:33:41', 0, '11', 'REFERRAL', 'GOMERA', 'JAMES PHILIP', 'AMANTE', '', '', 'BANSALANGIN ST. PAYATAS B', 'QUEZON CITY', '13', '', '2001-06-19', '22', 'MALE', 'SINGLE', '2147483647', '', 'JPGOMERA19@GMAIL.COM', 'BUSINESS MANAGER', '', '', '', '', '', '', '', '', '', '', '', 'ACTIVE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(13, '14', '../../upload/default.png', '2023-11-18 13:44:59', 0, '14', 'NON REFERRAL', 'MALANDUTAY', 'JERRYBOY', 'MALATEK', '', '', 'BANSALANGIN ST. PAYATAS B', 'QUEZON CITY', '13', '', '05/18/2000', '23', 'MALE', 'SINGLE', '2147483647', '', 'JERRYBOY123@GMAIL.COM', 'IT SUPPORT', '', '', '', '', '', '', '', '', '', '', '', 'ACTIVE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(14, '15', '../../upload/default.png', '2023-11-18 16:11:24', 19, '15', 'REFERRAL', 'GOMERA', 'JAMES PHILIP', 'AMANTE', 'ASDASD', '', '#27 BANSALANGIN ST PAYATAS B', 'QUEZON CITY', '13', '', '11/24/1994', '0', 'MALE', 'SINGLE', '2147483647', '', 'JPGOMERA19@GMAIL.COM', 'IT SUPPORT', 'Model Class B', 'With Eye Glasses', '1111111111', '', '', '', '', '', '', 'With', 'remarks', 'ACTIVE', '', '', '', '', '', '', '', '', 'JAMES PHILIP AMANTE GOMERA', '#27 BANSALANGIN ST PAYATAS B', '#27 BANSALANGIN ST PAYATAS B', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_update_history`
--

CREATE TABLE `employee_update_history` (
  `id` int(11) NOT NULL,
  `tracking_no` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_applied` varchar(255) NOT NULL,
  `app_number` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `landline` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `desired_position` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `indentification` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `police` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `nbi` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `e_person` varchar(255) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `e_number` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0=active, 1=deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employment_status`
--

CREATE TABLE `employment_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employment_status`
--

INSERT INTO `employment_status` (`id`, `name`, `description`, `is_deleted`, `is_status`) VALUES
(1, 'Regular', 'R', 0, 0),
(2, 'Probationary', 'P', 0, 0),
(3, 'Project Based', 'A', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ewb_choices`
--

CREATE TABLE `ewb_choices` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ewb_choices`
--

INSERT INTO `ewb_choices` (`id`, `description`, `is_deleted`) VALUES
(1, 'FOR DEPLOYMENT', 0),
(2, 'FOR DEPLOYMENT WITH FEW REQUIREMENTS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ewb_declined_history`
--

CREATE TABLE `ewb_declined_history` (
  `id` int(11) NOT NULL,
  `tracking` varchar(255) NOT NULL,
  `photopath` varchar(255) NOT NULL,
  `dapplied` varchar(255) NOT NULL,
  `appno` int(10) NOT NULL,
  `source` varchar(255) NOT NULL,
  `lastnameko` varchar(255) NOT NULL,
  `firstnameko` varchar(255) NOT NULL,
  `mnko` varchar(255) NOT NULL,
  `extnname` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `cityn` varchar(255) NOT NULL,
  `regionn` varchar(255) NOT NULL,
  `peraddress` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(5) NOT NULL,
  `gendern` varchar(255) NOT NULL,
  `civiln` varchar(255) NOT NULL,
  `cpnum` int(20) NOT NULL,
  `landline` int(20) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `despo` varchar(255) NOT NULL,
  `classn` varchar(255) NOT NULL,
  `idenn` varchar(255) NOT NULL,
  `sssnum` int(20) NOT NULL,
  `pagibignum` int(20) NOT NULL,
  `phnum` int(20) NOT NULL,
  `tinnum` int(20) NOT NULL,
  `policed` varchar(255) NOT NULL,
  `brgyd` varchar(255) NOT NULL,
  `nbid` varchar(255) NOT NULL,
  `psa` int(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `ewb_reason` varchar(3000) NOT NULL,
  `ewb_declined_by` varchar(255) NOT NULL,
  `ewb_date_declined` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ewb_verification_history`
--

CREATE TABLE `ewb_verification_history` (
  `id` int(11) NOT NULL,
  `date_verified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `app_num` int(11) NOT NULL,
  `sss` int(11) NOT NULL,
  `philhealth` int(11) NOT NULL,
  `pagibig` int(11) NOT NULL,
  `tin` int(11) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `verified_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `excuse_letter`
--

CREATE TABLE `excuse_letter` (
  `id` int(11) NOT NULL,
  `app_number` int(11) NOT NULL,
  `excuse_remarks` varchar(3000) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `excuse_letter_history`
--

CREATE TABLE `excuse_letter_history` (
  `id` int(11) NOT NULL,
  `app_number` int(11) NOT NULL,
  `excuse_remarks` varchar(3000) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'MALE'),
(2, 'FEMALE'),
(3, 'LESBIAN'),
(4, 'BISEXUAL'),
(5, 'GAY'),
(6, 'TRANSGENDER');

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE `job_title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_title`
--

INSERT INTO `job_title` (`id`, `code`, `description`, `is_deleted`) VALUES
(1, 'SE', 'Software Engineer', 0),
(2, 'ASE', 'Assistant Software Engineer', 0),
(4, 'QAE', 'QA Engineer', 0),
(5, 'PRM', 'Product Manager', 0),
(6, 'AQAE', 'Assistant QA Engineer ', 0),
(7, 'TPM', 'Technical Project Manager', 0),
(8, 'PRS', 'Pre-Sales Executive', 0),
(9, 'ME', 'Marketing Executive', 0),
(10, 'DH', 'Department Head', 0),
(11, 'CEO', 'Chief Executive Officer', 0),
(12, 'DBE', 'Database Engineer', 0),
(13, 'SA', 'Server Admin', 0),
(14, 'CFO', 'Chief Finance Officer', 0),
(15, 'MD', 'Managing Director', 0),
(16, 'HRO', 'Human Resource Officer', 0),
(17, 'CSO', 'Customer Service Officer', 0),
(18, 'LO', 'Logistics Officer', 0),
(19, 'SO', 'Security Officer', 0),
(20, 'ASO', 'Account Sales Officer', 0),
(21, 'PM', 'Plant Manager', 0),
(22, 'MIE', 'Maintenance Integration Engineer', 0),
(23, 'BA', 'Business Analyst', 0),
(24, 'Software Division Head', 'Software Division Head', 0),
(25, 'Admin Officer', 'Admin Officer', 0),
(26, 'Human Resources Manager', 'Human Resources Manager', 0),
(27, 'Human Resources Director', 'Human Resources Director', 0),
(28, 'Finance Specialist', 'Finance Specialist', 0),
(29, 'Marketing Head', 'Marketing Head', 0),
(30, 'Multimedia Specialist', 'Multimedia Specialist', 0),
(31, 'Deputy Plant Manager', 'Deputy Plant Manager', 0),
(32, 'Security Head', 'Security Head', 0),
(33, 'Logical Security Manager', 'Logical Security Manager', 0),
(34, 'Customer Service Manager', 'Customer Service Manager', 0),
(35, 'Plant Manager', 'Plant Manager', 0),
(36, 'Chief Admin Officer', 'Chief Admin Officer', 0),
(37, 'Chief Operating Officer', 'Chief Operating Officer', 0),
(38, 'Project Manager', 'Project Manager', 0),
(39, 'Account Sales Manager', 'Account Sales Manager', 0),
(41, 'Control all functions of Accounting and Treasury', 'Finance Supervisor', 0),
(45, 'Merchandiser', 'Merchandiser', 0),
(46, 'Any', 'Any', 0),
(47, 'Push Girl', 'Push Girl', 0),
(48, 'Convergys', 'Convergys', 0),
(49, 'Selecta Blitz', 'Selecta Blitz', 0),
(50, 'Convergys Head Hunter', 'Convergys Head Hunter', 0),
(51, 'Field Merchandising Supervisor', 'Field Merchandising Supervisor', 0),
(52, 'FMS CVS', 'FMS CVS', 0),
(54, 'Promodiser', 'Promodiser', 0),
(55, 'IT', 'IT', 0),
(56, 'Driver', 'Driver', 0),
(57, 'Account Executive', 'Account Executive', 0),
(59, 'Selecta', 'Selecta', 0),
(60, 'Wow Magic Sing Promoter', 'Wow Magic Sing Promoter', 0),
(61, 'New Account Officer', 'New Account Officer', 0),
(62, 'Promoter', 'Promoter', 0),
(63, 'Rider', 'Rider', 0),
(64, 'Blitz', 'Blitz', 0),
(65, 'Encoder', 'Encoder', 0),
(66, 'Bundler', 'Bundler', 0),
(67, 'Beauty Advisor', 'Beauty Advisor', 0),
(68, 'Head Hunter', 'Head Hunter', 0),
(69, 'Flyer Distributor', 'Flyer Distributor', 0),
(70, 'Brand Ambassador', 'Brand Ambassador', 0),
(71, 'Helper', 'Helper', 0),
(72, 'Tactical Merchandiser', 'Tactical Merchandiser', 0),
(73, 'Sales Promoter', 'Sales Promoter', 0),
(74, 'Selecta Telemarketer', 'Selecta Telemarketer', 0),
(75, 'Week Ender', 'Week Ender', 0),
(76, 'Warehouse Assistant', 'Warehouse Assistant', 0),
(77, 'Warehouse Inventory Clerk', 'Warehouse Inventory Clerk', 0),
(78, 'Validator', 'Validator', 0),
(79, 'Usherette', 'Usherette', 0),
(80, 'Unilever', 'Unilever', 0),
(81, 'ULP On Call Helper', 'ULP On Call Helper', 0),
(82, 'ULP Merchandiser Land Mark Trinoma', 'ULP Merchandiser Land Mark Trinoma', 0),
(83, 'ULP Merchandiser', 'ULP Merchandiser', 0),
(84, 'ULP Aninamation Push GIrl', 'ULP Aninamation Push GIrl', 0),
(85, 'Training Specialist', 'Training Specialist', 0),
(86, 'trainee', 'trainee', 0),
(87, 'Trade Sales Coordinator', 'Trade Sales Coordinator', 0),
(88, 'Trade Devt Specialist', 'Trade Devt Specialist', 0),
(89, 'Trade Development Representative', 'Trade Development Representative', 0),
(90, 'TNAP', 'TNAP', 0),
(91, 'TL Cum Merchandiser', 'TL Cum Merchandiser', 0),
(92, 'TL / Seller', 'TL / Seller', 0),
(93, 'Technical Asst. BD1', 'Technical Asst. BD1', 0),
(94, 'Technical Assistant', 'Technical Assistant', 0),
(95, 'Team Leader Cum Merchandiser', 'Team Leader Cum Merchandiser', 0),
(96, 'Team Leader', 'Team Leader', 0),
(97, 'TDR (Trade Development Representative)', 'TDR (Trade Development Representative)', 0),
(98, 'Tatical', 'Tatical', 0),
(99, 'Taggers', 'Taggers', 0),
(101, 'Tactical Selecta', 'Tactical Selecta', 0),
(102, 'Tactical Coordinator', 'Tactical Coordinator', 0),
(103, 'Tactical Auditor', 'Tactical Auditor', 0),
(104, 'Tactical', 'Tactical', 0),
(105, 'Synergy/Merchandiser', 'Synergy/Merchandiser', 0),
(106, 'Surveyor/Tagger', 'Surveyor/Tagger', 0),
(107, 'Surveyor', 'Surveyor', 0),
(108, 'Sorter/Helper', 'Sorter/Helper', 0),
(109, 'Sorter', 'Sorter', 0),
(110, 'Snowball', 'Snowball', 0),
(111, 'Servive Specialist', 'Servive Specialist', 0),
(112, 'Service Technician/Specialist', 'Service Technician/Specialist', 0),
(113, 'Service Technician', 'Service Technician', 0),
(114, 'Service Specialist', 'Service Specialist', 0),
(115, 'Seller', 'Seller', 0),
(116, 'Selecta Telemarketer', 'Selecta Telemarketer', 0),
(117, 'Selecta Stockman', 'Selecta Stockman', 0),
(118, 'Selecta Officebased', 'Selecta Officebased', 0),
(119, 'Selecta New Account Officer', 'Selecta New Account Officer', 0),
(120, 'Selecta Merchandiser', 'Selecta Merchandiser', 0),
(122, 'Selecta Agent', 'Selecta Agent', 0),
(123, 'Selecta Push Girl', 'Selecta Push Girl', 0),
(124, 'Selecta Tactical', 'Selecta Tactical', 0),
(125, 'Scooper', 'Scooper', 0),
(126, 'Sampling', 'Sampling', 0),
(127, 'Sampler/PG', 'Sampler/PG', 0),
(128, 'Sampler', 'Sampler', 0),
(129, 'Salesman', 'Salesman', 0),
(130, 'Sales Specialist', 'Sales Specialist', 0),
(131, 'Sales Representative', 'Sales Representative', 0),
(132, 'Sales Man/ Brand Repacker', 'Sales Man/ Brand Repacker', 0),
(133, 'Sales Man/ Brand Repacker', 'Sales Man/ Brand Repacker', 0),
(134, 'Sales Man', 'Sales Man', 0),
(135, 'Sales Coordinator', 'Sales Coordinator', 0),
(136, 'Sales Coor or Area Sup..', 'Sales Coor or Area Sup..', 0),
(137, 'Sales Associate', 'Sales Associate', 0),
(138, 'Sales Assistant', 'Sales Assistant', 0),
(139, 'Sales Agent', 'Sales Agent', 0),
(141, 'Sale Representative', 'Sale Representative', 0),
(142, 'Roving Merchandiser', 'Roving Merchandiser', 0),
(143, 'Rochar', 'Rochar', 0),
(144, 'Retailer Supervisor', 'Retailer Supervisor', 0),
(145, 'Retail', 'Retail', 0),
(146, 'Reliever Merchandiser', 'Reliever Merchandiser', 0),
(147, 'Reliever', 'Reliever', 0),
(148, 'Refiller ULP Sseasonal', 'Refiller ULP Sseasonal', 0),
(149, 'Redemption Girl', 'Redemption Girl', 0),
(150, 'PWES', 'PWES', 0),
(151, 'Push Seller', 'Push Seller', 0),
(166, 'Promoter Brandy Pharma', 'Promoter Brandy Pharma', 0),
(170, 'Promo Girl', 'Promo Girl', 0),
(171, 'Project Supervisor', 'Project Supervisor', 0),
(172, 'Project Lead', 'Project Lead', 0),
(173, 'Project Genesis', 'Project Genesis', 0),
(175, 'Production Staff', 'Production Staff', 0),
(176, 'Procurement Assistant', 'Procurement Assistant', 0),
(177, 'Pre It Partnership', 'Pre It Partnership', 0),
(178, 'Ponds Beauty Advisor', 'Ponds Beauty Advisor', 0),
(179, 'Ponds / Fairview', 'Ponds / Fairview', 0),
(180, 'POG Assistant', 'POG Assistant', 0),
(181, 'PMT', 'PMT', 0),
(182, 'PLDT seller', 'PLDT seller', 0),
(183, 'PLDT Electrician', 'PLDT Electrician', 0),
(184, 'PLDT DATA ENCODER', 'PLDT DATA ENCODER', 0),
(185, 'PLDT Channel Sales', 'PLDT Channel Sales', 0),
(186, 'PLDT', 'PLDT', 0),
(187, 'PILI BEAUTY', 'PILI BEAUTY', 0),
(188, 'Phone Screener', 'Phone Screener', 0),
(189, 'Pharmacy Specialsit', 'Pharmacy Specialsit', 0),
(190, 'Pharmacy Merchandiser', 'Pharmacy Merchandiser', 0),
(191, 'Pharmacy Assistant', 'Pharmacy Assistant', 0),
(192, 'Pharmacist Specialist', 'Pharmacist Specialist', 0),
(193, 'Pharmacist Diser', 'Pharmacist Diser', 0),
(194, 'Pharmacist (PMT)', 'Pharmacist (PMT)', 0),
(195, 'Pharma Specalist GSK', 'Pharma Specalist GSK', 0),
(196, 'PERNOD RICARD', 'PERNOD RICARD', 0),
(197, 'Perfect Store Assistant', 'Perfect Store Assistant', 0),
(198, 'Partnership', 'Partnership', 0),
(199, 'Pahinante/Helper', 'Pahinante/Helper', 0),
(200, 'On Premise Executive', 'On Premise Executive', 0),
(201, 'On Call Helper', 'On Call Helper', 0),
(202, 'On Call Driver', 'On Call Driver', 0),
(204, 'OLX Real Estate', 'OLX Real Estate', 0),
(205, 'OLX Car Sales Representative', 'OLX Car Sales Representative', 0),
(206, 'OLX', 'OLX', 0),
(207, 'Office Staff / I.T', 'Office Staff / I.T', 0),
(208, 'Office Base', 'Office Base', 0),
(209, 'Negotiator', 'Negotiator', 0),
(210, 'NAO Selecta', 'NAO Selecta', 0),
(211, 'Mystery Shopper', 'Mystery Shopper', 0),
(212, 'Mystery Buyer PSIP', 'Mystery Buyer PSIP', 0),
(213, 'Mystery Buyer', 'Mystery Buyer', 0),
(214, 'MT Assistant', 'MT Assistant', 0),
(215, 'MT', 'MT', 0),
(216, 'Mothers Day Special', 'Mothers Day Special', 0),
(217, 'Model', 'Model', 0),
(218, 'Mngt. Trainee', 'Mngt. Trainee', 0),
(219, 'Mindanao Foods Area Coor', 'Mindanao Foods Area Coor', 0),
(220, 'Mindanao Foods', 'Mindanao Foods', 0),
(221, 'Mindanao Food INC', 'Mindanao Food INC', 0),
(222, 'MFI', 'MFI', 0),
(224, 'Massage Therapist', 'Massage Therapist', 0),
(225, 'Manager', 'Manager', 0),
(226, 'Management Trainee', 'Management Trainee', 0),
(227, 'KSAT Lead Trainor', 'KSAT Lead Trainor', 0),
(228, 'KSAT', 'KSAT', 0),
(229, 'Key Account Representative', 'Key Account Representative', 0),
(230, 'Kambal Pandesal', 'Kambal Pandesal', 0),
(231, 'Junior Manager', 'Junior Manager', 0),
(232, 'IT Support', 'IT Support', 0),
(233, 'IT Assistant', 'IT Assistant', 0),
(234, 'IT - Encoder', 'IT - Encoder', 0),
(235, 'intro', 'intro', 0),
(236, 'Interviewer', 'Interviewer', 0),
(237, 'Installer', 'Installer', 0),
(238, 'Huawei Promoter', 'Huawei Promoter', 0),
(239, 'HRI Telesales', 'HRI Telesales', 0),
(241, 'HRD Data Encoder', 'HRD Data Encoder', 0),
(242, 'HR-Admin', 'HR-Admin', 0),
(243, 'HR Legal', 'HR Legal', 0),
(244, 'HR Generalist', 'HR Generalist', 0),
(245, 'HR Field Recruiter', 'HR Field Recruiter', 0),
(246, 'HR Assistant', 'HR Assistant', 0),
(247, 'HR / Best Center', 'HR / Best Center', 0),
(248, 'Hisamitsu', 'Hisamitsu', 0),
(249, 'Head Hunter', 'Head Hunter', 0),
(250, 'H2H Seller', 'H2H Seller', 0),
(251, 'GSK', 'GSK', 0),
(252, 'Graphic Artist', 'Graphic Artist', 0),
(254, 'Good Day', 'Good Day', 0),
(255, 'Game Master', 'Game Master', 0),
(256, 'Frontliner', 'Frontliner', 0),
(257, 'Fonterra Merchandiser', 'Fonterra Merchandiser', 0),
(258, 'FOG Assistant', 'FOG Assistant', 0),
(259, 'Finance Staff', 'Finance Staff', 0),
(260, 'Finance Coordinator', 'Finance Coordinator', 0),
(261, 'Field Supervisor', 'Field Supervisor', 0),
(262, 'Field Recruiter', 'Field Recruiter', 0),
(263, 'Field Promodiser', 'Field Promodiser', 0),
(264, 'Field Merchandiser', 'Field Merchandiser', 0),
(265, 'Field Interviewer', 'Field Interviewer', 0),
(266, 'Field Coordinator', 'Field Coordinator', 0),
(267, 'Field Auditor', 'Field Auditor', 0),
(268, 'Exhibitor', 'Exhibitor', 0),
(269, 'Executive Assistant', 'Executive Assistant', 0),
(270, 'Event Host', 'Event Host', 0),
(271, 'Elite Force', 'Elite Force', 0),
(272, 'Electrician', 'Electrician', 0),
(273, 'Diser', 'Diser', 0),
(274, 'Desktop Support Staff', 'Desktop Support Staff', 0),
(275, 'Dermo Consultant Physiogel', 'Dermo Consultant Physiogel', 0),
(276, 'Demo Consultant', 'Demo Consultant', 0),
(277, 'Data Encoder / Data Analyst', 'Data Encoder / Data Analyst', 0),
(278, 'Dancer Cum Push Girl', 'Dancer Cum Push Girl', 0),
(279, 'Dancer', 'Dancer', 0),
(280, 'CVG Sm Megamall', 'CVG Sm Megamall', 0),
(281, 'Creamsilk Pop up Salon', 'Creamsilk Pop up Salon', 0),
(282, 'Coordinator', 'Coordinator', 0),
(283, 'Convergys Merchandiser', 'Convergys Merchandiser', 0),
(284, 'Consultant', 'Consultant', 0),
(285, 'Commando Refiller', 'Commando Refiller', 0),
(286, 'Commando / ULP', 'Commando / ULP', 0),
(287, 'Commando', 'Commando', 0),
(288, 'Collector', 'Collector', 0),
(289, 'Cebuana Flyerer', 'Cebuana Flyerer', 0),
(290, 'Cashier', 'Cashier', 0),
(291, 'Car sales Representative', 'Car sales Representative', 0),
(292, 'CAA Unilever', 'CAA Unilever', 0),
(294, 'Bundler On-Call', 'Bundler On-Call', 0),
(295, 'Push Girl/Buffer', 'Push Girl/Buffer', 0),
(296, 'Budler On Call', 'Budler On Call', 0),
(297, 'Brand Repacker', 'Brand Repacker', 0),
(299, 'Brand Promoter for PRPI', 'Brand Promoter for PRPI', 0),
(300, 'Brand Promoter', 'Brand Promoter', 0),
(301, 'Brand Hostess', 'Brand Hostess', 0),
(302, 'Bran Repacard', 'Bran Repacard', 0),
(303, 'Brady Pharma Promoter', 'Brady Pharma Promoter', 0),
(304, 'Billing Assistant', 'Billing Assistant', 0),
(305, 'Billin Asst./ Finance', 'Billin Asst./ Finance', 0),
(306, 'Beauty Consultant', 'Beauty Consultant', 0),
(307, 'Beauty Advisor/PG', 'Beauty Advisor/PG', 0),
(308, 'BD2', 'BD2', 0),
(309, 'Batangas Admin Assistant', 'Batangas Admin Assistant', 0),
(310, 'Barker', 'Barker', 0),
(311, 'BA/PG', 'BA/PG', 0),
(312, 'BA Ponds', 'BA Ponds', 0),
(313, 'BA / OLX', 'BA / OLX', 0),
(314, 'BA', 'BA', 0),
(315, 'Automation BGC Unilever Office Based', 'Automation BGC Unilever Office Based', 0),
(316, 'Automation Assistant', 'Automation Assistant', 0),
(317, 'auditor cum encoder', 'auditor cum encoder', 0),
(319, 'Auditor', 'Auditor', 0),
(320, 'Assistant Recruiter', 'Assistant Recruiter', 0),
(321, 'Assistant', 'Assistant', 0),
(322, 'Area Lead', 'Area Lead', 0),
(323, 'Area Coordinator', 'Area Coordinator', 0),
(324, 'Animation', 'Animation', 0),
(325, 'Admin Tactical', 'Admin Tactical', 0),
(326, 'Admin Staff', 'Admin Staff', 0),
(327, 'Admin Logistics', 'Admin Logistics', 0),
(328, 'Admin Logistic - Collins', 'Admin Logistic - Collins', 0),
(329, 'Admin Coordinator', 'Admin Coordinator', 0),
(330, 'Admin Assistant', 'Admin Assistant', 0),
(331, 'Admin @ Hr Assistant', 'Admin @ Hr Assistant', 0),
(332, 'Activation Project Manager', 'Activation Project Manager', 0),
(333, 'Activation Coordinator', 'Activation Coordinator', 0),
(334, 'Accounting Clerk', 'Accounting Clerk', 0),
(335, 'Accountant', 'Accountant', 0),
(336, 'Accounts Manager', 'Accounts Manager', 0),
(337, 'Account Officer', 'Account Officer', 0),
(338, 'Account Manager', 'Account Manager', 0),
(339, 'Account Activation Manager', 'Account Activation Manager', 0),
(340, '7/11 AR Assistant', '7/11 AR Assistant', 0),
(341, 'FMS', 'FMS', 0),
(342, 'PWE', 'PWE', 0),
(343, 'PWEST', 'PWEST', 0),
(344, 'N/A', 'N/A', 0),
(345, 'Push Girl/Shell Event', 'Push Girl/Shell Event', 0),
(347, 'Merchnadiser Magnolia ULP', 'Merchnadiser Magnolia ULP', 0),
(348, 'Phone Screener Convergys', 'Phone Screener Convergys', 0),
(350, 'Push Area', 'Push Area', 0),
(351, 'Data Encoder', '  Data Encoder', 0),
(353, 'Stockman', 'Stockman', 0),
(354, 'Merchandiser/Commando', 'Merchandiser/Commando', 0),
(356, 'Trainer', 'Trainer', 0),
(358, 'General Accounting', 'General Accounting', 0),
(359, 'Smart Trade Merchandising', 'Smart Trade Merchandising', 0),
(360, 'MC /Merchandising Coor', 'MC /Merchandising Coor', 0),
(361, 'Account Project Manager', 'Account Project Manager', 0),
(362, 'Unit Manager', 'Unit Manager', 0),
(363, 'Account Supervisor', 'Account Supervisor', 0),
(364, 'Merchandising Supervisor', 'Merchandising Supervisor', 0),
(365, 'Project Coordinator', 'Project Coordinator', 0),
(366, 'Push Boy', 'Push Boy', 0),
(367, 'Merchandising Blitz', 'Merchandising Blitz', 0),
(368, 'Pure it PWEST', 'Pure it PWEST', 0),
(369, 'Pure it PWE', 'Pure it PWE', 0),
(370, 'Pure it LSP', 'Pure it LSP', 0),
(371, 'Pure it SS', 'Pure it SS', 0),
(372, 'Pure it ST', 'Pure it ST', 0),
(373, 'Pure it SST', 'Pure it SST', 0),
(374, 'Pure it Support', 'Pure it Support', 0),
(375, 'BA Supervisor', 'BA Supervisor', 0),
(376, 'BA Trainor', 'BA Trainor', 0),
(377, 'Hair Stylist', 'Hair Stylist', 0),
(379, 'Hair Dresser', 'Hair Dresser', 0),
(380, 'Data Analytics Manager', 'Data Analytics Manager', 0),
(381, 'LSP Admin Logistics', 'LSP Admin Logistics', 0),
(382, 'Service Supervisor and Trainer (SST)', 'Service Supervisor and Trainer (SST)', 0),
(383, 'Superstore Assistant 1', 'Superstore Assistant 1', 0),
(384, 'Superstore Assistant 2', 'Superstore Assistant 2', 0),
(385, 'Promo Merchandiser', 'Promo Merchandiser', 0),
(386, 'Stock Keeper', 'Stock Keeper', 0),
(387, 'Tactical Off Premise Coordinator', 'Tactical Off Premise Coordinator', 0),
(388, 'Business Development Coordinator', 'Business Development Coordinator', 0),
(389, 'HRI NAO', 'HRI NAO', 0),
(390, 'GT Nao', 'GT Nao', 0),
(391, 'GT Tactical Coordinator', 'GT Tactical Coordinator', 0),
(392, 'Talent Acquisition', 'Talent Acquisition', 0),
(393, 'Talent Sourcing Supervisor', 'Talent Sourcing Supervisor', 0),
(394, 'Talent Sourcing Coordinator', 'Talent Sourcing Coordinator', 0),
(395, 'ERP Coordinator', 'ERP Coordinator', 0),
(396, 'Recruitment Assistant Encoder', 'Recruitment Assistant Encoder', 0),
(397, 'Babyflo Babycare Consultant', 'Babyflo Babycare Consultant', 0),
(398, 'HR Manager', 'HR Manager', 0),
(399, 'Invoice Filer', 'Invoice Filer', 0),
(400, 'Rubber Stamper', 'Rubber Stamper', 0),
(401, 'EWB Assistant', 'EWB Assistant', 0),
(402, 'Trade Service Staff', 'Trade Service Staff', 0),
(403, 'Adwalker', 'Adwalker', 0),
(404, 'Mascot', 'Mascot', 0),
(405, 'Personal Care Beauty Specialist', 'Personal Care Beauty Specialist', 0),
(406, 'Redemption Personnel', 'Redemption Personnel', 0),
(407, 'Growth Coach', 'Growth Coach', 0),
(408, 'Coach', 'Coach', 0),
(409, 'NFR Growth Coach', 'NFR Growth Coach', 0),
(410, 'Team Lead Area Coordinator', 'Team Lead Area Coordinator', 0),
(411, 'Premium Laundry Expert', 'Premium Laundry Expert', 0),
(412, 'Key Customer Executive', 'Key Customer Executive', 0),
(413, 'Team Leader cum Seller', 'Team Leader cum Seller', 0),
(414, 'Operations/Activations Lead', 'Operations/Activations Lead', 0),
(415, 'Activation Senior Project Manager', 'Activation Senior Project Manager', 0),
(416, 'Activation Supervisor', 'Activation Supervisor', 0),
(417, 'AR Assistant', 'AR Assistant', 0),
(418, 'Accelerator Executive', 'Accelerator Executive', 0),
(419, 'Digital Specialist', 'Digital Specialist', 0),
(420, 'Talent Acquisition', 'Talent Acquisition', 0),
(421, 'Talent Connect', 'Talent Connect', 0),
(422, 'Background Investigation Specialist', 'Background Investigation Specialist', 0),
(423, 'On-Call Sampler', 'On Call Sampler', 0),
(424, 'Data Supervisor', 'Data Supervisor', 0),
(425, 'Online Coordinator', 'Selecta Online Coordinator', 0),
(426, 'Food Delivery Assistant', 'Food Delivery Assistant', 0),
(427, 'Hapi Dealer Trainer', 'Hapi Dealer Trainer', 0),
(428, 'Maintenance Technician', 'Maintenance Technician', 0),
(429, 'Sr. Account Manager', 'Sr. Account Manager', 0),
(430, 'Procurement Manager', 'Procurement Manager', 0),
(431, 'Procurement Coordinator', 'Procurement Coordinator', 0),
(432, 'Provincial Area Coordinator', 'Provincial Area Coordinator', 0),
(433, 'Company Driver', 'Company Driver', 0),
(434, 'Asst. Cashier / Billing Assistant', 'Asst. Cashier / Billing Assistant', 0),
(435, 'Operations Manager', 'Operations Manager', 0),
(436, 'Utility Helper', 'Utility Helper', 0),
(437, 'ISR Supervisor', 'ISR Supervisor', 0),
(438, 'Warehouse Checker', 'Warehouse Checker', 0),
(439, 'Audit / CCCO Manager', 'Audit / CCCO Manager', 0),
(440, 'Cost Analyst', 'Cost Analyst', 0),
(441, 'HR Technical Assistant', 'HR Technical Assistant', 0),
(442, 'Finance Cash Management Coordinator', 'Finance Cash Management Coordinator', 0),
(443, 'Senior Billing Coordinator', 'Senior Billing Coordinator', 0),
(444, 'Billing Coordinator', 'Billing Coordinator', 0),
(445, 'Payroll Assistant', 'Payroll Assistant', 0),
(446, 'Accounting & Payroll Manager', 'Accounting & Payroll Manager', 0),
(447, 'HR / Admin Reg Coordinator', 'HR / Admin Reg Coordinator', 0),
(448, 'Payroll / Billing Coordinator', 'Payroll / Billing Coordinator', 0),
(449, 'Finance Billing Manager', 'Finance Billing Manager', 0),
(450, 'Sr. IT Manager and Reports Generation Champion', 'Sr. IT Manager and Reports Generation Champion', 0),
(451, 'Sr. Merchandising Manager', 'Sr. Merchandising Manager', 0),
(452, 'Messenger', 'Messenger', 0),
(453, 'IT Supervisor', 'IT Supervisor', 0),
(454, 'Support Group 2 Head', 'Support Group 2 Head', 0),
(455, 'Warehouse / Traffic Coordinator (Warehouse Champion for BD1)', 'Warehouse / Traffic Coordinator (Warehouse Champion for BD1)', 0),
(456, 'Business Unit Manager', 'Business Unit Manager', 0),
(457, 'Company Driver / Technical Assistant to the President', 'Company Driver / Technical Assistant to the President', 0),
(458, 'Junior Graphic Artist', 'Junior Graphic Artist', 0),
(459, 'AVP', 'AVP', 0),
(460, 'Warehouse Supervisor', 'Warehouse Supervisor', 0),
(461, 'Operations & Finance Coordinator', 'Operations & Finance Coordinator', 0),
(462, 'Area Manager', 'Area Manager', 0),
(463, 'Logistics Coordinator', 'Logistics Coordinator', 0),
(464, 'Sr. Account Manager OIC', 'Sr. Account Manager OIC', 0),
(465, 'Foreman/Printing Supervisor', 'Foreman/Printing Supervisor', 0),
(466, 'EWB Coordinator', 'EWB Coordinator', 0),
(467, 'Cash Management Supervisor', 'Cash Management Supervisor', 0),
(468, 'HR, Admin and TA', 'HR, Admin and TA', 0),
(469, 'Senior Artist/Graphic Designer', 'Senior Artist/Graphic Designer', 0),
(470, 'Merchandising Manager', 'Merchandising Manager', 0),
(471, 'HR Supervisor', 'HR Supervisor', 0),
(472, 'HR  Assistant / Medical Officer', 'HR  Assistant / Medical Officer', 0),
(473, 'Vice-President', 'Vice-President', 0),
(474, 'HR Recruitment Coordinator', 'HR Recruitment Coordinator', 0),
(475, 'Picker Packer', 'Picker Packer', 0),
(476, 'Online Community Promoter', 'Online Community Promoter', 0),
(477, 'Helper Cum Validator', 'Helper Cum Validator', 0),
(478, 'Beauty Refiller', 'Beauty Refiller', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loa`
--

CREATE TABLE `loa` (
  `id` int(11) NOT NULL,
  `applicantname` varchar(255) NOT NULL,
  `appaddress` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loa`
--

INSERT INTO `loa` (`id`, `applicantname`, `appaddress`, `project_title`) VALUES
(1, 'rodeo Villavicencio', 'Taal, Batangas', 'Test Project');

-- --------------------------------------------------------

--
-- Table structure for table `loa_files`
--

CREATE TABLE `loa_files` (
  `id` int(11) NOT NULL,
  `loa_main_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL DEFAULT '',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loa_files`
--

INSERT INTO `loa_files` (`id`, `loa_main_id`, `file_name`, `file_location`, `date_modified`, `status`) VALUES
(1, 15, 'BD1-ULP-Bundler-weekly-for-ULP-Q3-PCN-OG-SMKT-A1113-SURF-FABCON-69ML-6-1-Q3-Only.docx', '../loa_template_directory/', '2023-11-09 08:17:46', 1),
(2, 16, 'Medical-certificate-fitness-for-duty_Consultants-1.docx', '../loa_template_directory/', '2023-11-10 04:04:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loa_maintenance_word`
--

CREATE TABLE `loa_maintenance_word` (
  `id` int(11) NOT NULL,
  `loa_name` varchar(255) DEFAULT NULL,
  `division` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_default` tinyint(2) DEFAULT '0',
  `is_deleted` tinyint(2) DEFAULT '0',
  `applicant_name` varchar(255) DEFAULT NULL,
  `applicant_address` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `place_assigned` varchar(255) DEFAULT NULL,
  `address_assigned` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `basic_pay` varchar(255) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `no_work_days` varchar(255) DEFAULT NULL,
  `issued_day` varchar(255) DEFAULT NULL,
  `issued_month` varchar(255) DEFAULT NULL,
  `issued_year` varchar(255) DEFAULT NULL,
  `pb_deployment_personel` varchar(255) DEFAULT NULL,
  `pb_dpdesignation` varchar(255) DEFAULT NULL,
  `pb_supervisor` varchar(255) DEFAULT NULL,
  `pb_sdesignation` varchar(255) DEFAULT NULL,
  `eb_project_supervisor` varchar(255) DEFAULT NULL,
  `eb_psdesignation` varchar(255) DEFAULT NULL,
  `ab_head` varchar(255) DEFAULT NULL,
  `ab_hdesignation` varchar(255) DEFAULT NULL,
  `ab_project_supervisor` varchar(255) DEFAULT NULL,
  `ab_psdesignation` varchar(255) DEFAULT NULL,
  `sss_no` varchar(255) DEFAULT NULL,
  `philhealth_no` varchar(255) DEFAULT NULL,
  `pagibig_no` varchar(255) DEFAULT NULL,
  `tin_no` varchar(255) DEFAULT NULL,
  `applicant_id` varchar(255) DEFAULT NULL,
  `applicant_contact` varchar(255) DEFAULT NULL,
  `communication_allowance` varchar(255) DEFAULT NULL,
  `transpo_meal_allowance` varchar(255) DEFAULT NULL,
  `ecola` varchar(255) DEFAULT NULL,
  `internet_allowance` varchar(255) DEFAULT NULL,
  `meal_allowance` varchar(255) DEFAULT NULL,
  `outbase_meal` varchar(255) DEFAULT NULL,
  `special_allowance` varchar(255) NOT NULL,
  `position_allowance` varchar(255) NOT NULL,
  `trans` varchar(255) DEFAULT NULL,
  `total_sum` varchar(255) DEFAULT NULL,
  `shortlist_id` varchar(255) DEFAULT NULL,
  `loa_tracker` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loa_maintenance_word`
--

INSERT INTO `loa_maintenance_word` (`id`, `loa_name`, `division`, `date_created`, `date_updated`, `is_default`, `is_deleted`, `applicant_name`, `applicant_address`, `client_name`, `place_assigned`, `address_assigned`, `job_title`, `employment_status`, `start_date`, `end_date`, `basic_pay`, `outlet`, `no_work_days`, `issued_day`, `issued_month`, `issued_year`, `pb_deployment_personel`, `pb_dpdesignation`, `pb_supervisor`, `pb_sdesignation`, `eb_project_supervisor`, `eb_psdesignation`, `ab_head`, `ab_hdesignation`, `ab_project_supervisor`, `ab_psdesignation`, `sss_no`, `philhealth_no`, `pagibig_no`, `tin_no`, `applicant_id`, `applicant_contact`, `communication_allowance`, `transpo_meal_allowance`, `ecola`, `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, `position_allowance`, `trans`, `total_sum`, `shortlist_id`, `loa_tracker`) VALUES
(15, 'New Template', 'BD1', '2023-11-09 08:17:46', '2023-11-09 08:17:46', 0, 0, 'Value1', 'Value2', 'Value3', 'Value4', 'Value5', 'Value6', 'Value7', 'Value8', 'Deo9', 'Value10', 'Value11a', 'Value12', 'Value13', 'Value14', 'Value15', 'Value16', 'Value17', 'Value18', 'Value19', 'Value20', 'Value21', 'Value22', 'Value23', 'Value24', 'Value25', 'Value26', 'Value27', 'Value28', 'Value29', 'Value30', 'Value31', 'Value10a', 'Value10b', 'Value10c', 'Value10d', 'Value10e', 'Value10f', 'Value10g', 'Value10h', NULL, 'TotalValue', 'Value32', 'Value33'),
(16, 'IBANG TEMPLATE', 'BD1', '2023-11-10 04:04:52', '2023-11-10 04:04:52', 0, 0, 'Value1', 'Value2', 'Value3', 'Value4', 'Value5', 'Value6', 'Value7', 'Value8', 'Deo9', 'Value10', 'Value11a', 'Value12', 'Value13', 'Value14', 'Value15', 'Value16', 'Value17', 'Value18', 'Value19', 'Value20', 'Value21', 'Value22', 'Value23', 'Value24', 'Value25', 'Value26', 'Value27', 'Value28', 'Value29', 'Value30', 'Value31', 'Value10a', 'Value10b', 'Value10c', 'Value10d', 'Value10e', 'Value10f', 'Value10g', 'Value10h', NULL, 'TotalValue', 'Value32', 'Value33');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Datelog` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `activitynya` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `Username`, `Datelog`, `time`, `activitynya`) VALUES
(1, 'mrf', '11/17/2023', '2023-11-17 11:43:25', 'MRF login Accepted'),
(2, 'recruitment', '11/17/2023', '2023-11-17 11:47:40', 'RECRUITMENT login Accepted'),
(3, 'recruitment', '11/17/2023', '2023-11-17 14:42:06', 'RECRUITMENT login Accepted'),
(4, 'recruitment', '11/17/2023', '2023-11-17 14:51:50', 'RECRUITMENT login Accepted'),
(5, 'mrf', '11/18/2023', '2023-11-18 10:29:18', 'MRF login Accepted'),
(6, 'recruitment', '11/18/2023', '2023-11-18 10:43:24', 'RECRUITMENT login Accepted'),
(7, 'mrf', '11/18/2023', '2023-11-18 10:44:33', 'MRF login Accepted'),
(8, 'recruitment', '11/18/2023', '2023-11-18 11:05:32', 'RECRUITMENT login Accepted'),
(9, 'mrf', '11/18/2023', '2023-11-18 11:06:06', 'MRF login Accepted'),
(10, 'recruitment', '11/18/2023', '2023-11-18 11:15:16', 'RECRUITMENT login Accepted'),
(11, 'mrf', '11/18/2023', '2023-11-18 11:15:53', 'MRF login Accepted'),
(12, 'recruitment', '11/18/2023', '2023-11-18 11:28:54', 'RECRUITMENT login Accepted'),
(13, 'mrf', '11/18/2023', '2023-11-18 11:29:55', 'MRF login Accepted'),
(14, 'recruitment', '11/18/2023', '2023-11-18 13:35:04', 'RECRUITMENT login Accepted'),
(15, 'mrf', '11/18/2023', '2023-11-18 13:35:27', 'MRF login Accepted'),
(16, 'recruitment', '11/18/2023', '2023-11-18 13:44:13', 'RECRUITMENT login Accepted'),
(17, 'mrf', '11/18/2023', '2023-11-18 13:44:45', 'MRF login Accepted'),
(18, 'recruitment', '11/18/2023', '2023-11-18 14:52:05', 'RECRUITMENT login Accepted'),
(19, 'mrf', '11/18/2023', '2023-11-18 16:07:20', 'MRF login Accepted'),
(20, 'recruitment', '11/18/2023', '2023-11-18 16:07:41', 'RECRUITMENT login Accepted'),
(21, 'mrf', '11/18/2023', '2023-11-18 16:11:02', 'MRF login Accepted'),
(22, 'recruitment', '11/18/2023', '2023-11-18 16:21:10', 'RECRUITMENT login Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `mrf`
--

CREATE TABLE `mrf` (
  `id` int(11) NOT NULL,
  `tracking` varchar(255) NOT NULL,
  `mrf_category` varchar(255) NOT NULL,
  `mrf_category_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_detail` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `class_detail` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `ce_number` varchar(255) NOT NULL,
  `po_number` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `position_detail` varchar(255) NOT NULL,
  `np_male` varchar(20) NOT NULL,
  `np_female` varchar(20) NOT NULL,
  `height_r` varchar(255) NOT NULL,
  `height_female` varchar(255) NOT NULL,
  `edu` varchar(255) NOT NULL,
  `others_edu` varchar(255) NOT NULL,
  `pleasing_personality` varchar(255) NOT NULL,
  `moral` varchar(255) NOT NULL,
  `work_experience` varchar(255) NOT NULL,
  `comm_skills` varchar(255) NOT NULL,
  `physically` varchar(255) NOT NULL,
  `articulate` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `transpo` varchar(255) NOT NULL,
  `meal` varchar(255) NOT NULL,
  `comm` varchar(255) NOT NULL,
  `other_allow` varchar(255) NOT NULL,
  `other_allow_detail` varchar(255) NOT NULL,
  `employment_stat` varchar(255) NOT NULL,
  `emplo_other_details` varchar(255) NOT NULL,
  `salary_sched` varchar(255) NOT NULL,
  `work_duration_start` varchar(255) NOT NULL,
  `work_duration_end` varchar(255) NOT NULL,
  `work_days` varchar(255) NOT NULL,
  `time_sched` varchar(255) NOT NULL,
  `day_off` varchar(255) NOT NULL,
  `outlet` longtext NOT NULL,
  `date_needed` varchar(255) NOT NULL,
  `drt` varchar(255) NOT NULL,
  `rp` varchar(255) NOT NULL,
  `dt_now` varchar(255) NOT NULL,
  `hatian` varchar(255) NOT NULL,
  `s_male` varchar(255) NOT NULL,
  `s_female` varchar(255) NOT NULL,
  `pooling` varchar(255) NOT NULL,
  `hr_personnel` varchar(255) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `prepared_by` varchar(255) NOT NULL,
  `short_list_id` varchar(255) NOT NULL,
  `special_requirements_others` varchar(3000) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0 = true, 1 = false meaning deleted',
  `is_approve` int(11) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mrf`
--

INSERT INTO `mrf` (`id`, `tracking`, `mrf_category`, `mrf_category_name`, `type`, `location`, `location_detail`, `class`, `class_detail`, `division`, `department`, `client`, `client_address`, `project_title`, `ce_number`, `po_number`, `position`, `position_detail`, `np_male`, `np_female`, `height_r`, `height_female`, `edu`, `others_edu`, `pleasing_personality`, `moral`, `work_experience`, `comm_skills`, `physically`, `articulate`, `others`, `basic_salary`, `transpo`, `meal`, `comm`, `other_allow`, `other_allow_detail`, `employment_stat`, `emplo_other_details`, `salary_sched`, `work_duration_start`, `work_duration_end`, `work_days`, `time_sched`, `day_off`, `outlet`, `date_needed`, `drt`, `rp`, `dt_now`, `hatian`, `s_male`, `s_female`, `pooling`, `hr_personnel`, `uid`, `prepared_by`, `short_list_id`, `special_requirements_others`, `is_deleted`, `is_approve`, `date_added`, `date_updated`) VALUES
(1017, '2', 'NEW', '', 'INHOUSE', 'NCR', '', '', '', 'BD1', 'SELECTA', 'UNILEVER RFM SELECTA ICE CREAM INC.', 'MANGGAHAN LIGHT INDUSTRIAL PARK, PASIG CITY', 'BUSINESS MANAGER', '98765432112', '1231313123', 'BUSS. MANAGER', '', '5', '5', '0', '0', 'COLLEGE GRADUATE', '', 'PLEASING PERSONALITY', '', '', 'GOOD COMMUNICATION SKILLS', 'PHYSICALLY FIT / GOOD BUILT', 'ARTICULATE', '', '22000', '0', '0', '0', '', '', 'PROJECT BASED', '', '10-25', '2023-11-25', '2023-12-09', '6 DAYS', '8 TO 5', 'SUNDAY', '{\"ops\":[{\"insert\":\"Philippine Arena\\n\"}]}', '2023-11-16', 'SALTA, JULIE ANN MANTALA', 'ACTIVATION COORDINATOR', '11/17/2023', '', '', '', '', 'YES', '21', 'GOMERA, JAMES PHILIP', '', 'HAHAHAHA', 0, 1, '2023-11-17 03:45:59', '2023-11-17 03:47:49'),
(1016, '1', 'NEW', '', 'INHOUSE', 'NCR', '', '', '', 'BD1', 'CORE', 'UNILEVER PHILIPPINES INC.', '7TH FLOOR BONIFACIO STOPOVER CORPORATE CENTER 31ST STREET CORNER 2ND AVENUE, BONIFACIO GLOBAL CITY FORT BONIFACIO, TAGUIG CITY', 'IT SUPPORT', '987654321', '123456', 'ACCOUNT EXECUTIVE', '', '3', '5', '0', '0', 'COLLEGE GRADUATE', '', 'PLEASING PERSONALITY', 'GOOD MORAL', 'WITH WORK EXPERIENCE', 'GOOD COMMUNICATION SKILLS', 'PHYSICALLY FIT / GOOD BUILT', 'ARTICULATE', '', '22000', '0', '0', '0', '', '', 'PROJECT BASED', '', '10-25', '2023-11-18', '2023-11-30', '6 DAYS', '8 TO 5', 'SUNDAY', '{\"ops\":[{\"insert\":\"Cubao\\nKamuning\\n\"}]}', '2023-11-16', 'MARALIT, DIANNE MARICRIS GARCIA', 'ACCOUNT SUPERVISOR', '11/17/2023', '', '', '', '', 'YES', '21', 'GOMERA, JAMES PHILIP', '', 'HAHAHAHA', 0, 1, '2023-11-17 03:44:44', '2023-11-17 03:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `mrf_access`
--

CREATE TABLE `mrf_access` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `access_code` varchar(255) NOT NULL,
  `dateto` varchar(255) NOT NULL,
  `emp_no` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mrf_access`
--

INSERT INTO `mrf_access` (`id`, `name`, `access_code`, `dateto`, `emp_no`) VALUES
(1, 'ABELLO, JULIETO', 'MRF-1', '2022-02-04', ''),
(2, '3566', 'MRF-1', '2022-02-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `pcn_emp`
--

CREATE TABLE `pcn_emp` (
  `id` int(11) NOT NULL,
  `user_id_number` varchar(15) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department_unit` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `employment_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pcn_emp`
--

INSERT INTO `pcn_emp` (`id`, `user_id_number`, `fullname`, `division`, `position`, `department_unit`, `area`, `employment_status`) VALUES
(1, 'PCN150', 'ABELLO, JULIETO TORRES', 'BSG', 'BUILDING TECHNICIAN', 'ADMIN', 'MANILA', 'REGULAR'),
(2, 'PCN240', 'ABUAN, DONN RHOEDERICK CASTILLO', 'BD2', 'MERCHANDISING MANAGER', 'BU3', 'MANILA', 'REGULAR'),
(3, 'PCN373', 'ADANO, GERALD RAMOS', 'FINANCE', 'BILLING COORDINATOR', 'SUPPORT', 'MANILA', 'REGULAR'),
(4, 'PCN303', 'ADIAO, CHRISTOPHER OFEMIA', 'BD3', 'ACTIVATION SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(5, 'PCN402', 'ADIAO, PAULA LYN OFEMIA', 'BD1', 'HR ADMIN - SUPPORT', 'BU1', 'MANILA', 'PROBATIONARY'),
(6, 'PCN379', 'ASEBIAS, LIZA GATON', 'BD1', 'ACTIVATION COORDINATOR', 'BU1', 'MANILA', 'REGULAR'),
(7, 'PCN318', 'AGUILAR, DITAS LUZ', 'HR', 'HR OPERATIONS SUPERVISOR', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(8, 'PCN185', 'ALMANZOR, JOSEPH MUÃ‘EZ JR.', 'BD3', 'ACTIVATION SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(9, 'PCN195', 'ALVAREZ, DAISY LAPORE', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(10, 'PCN86', 'AMORES, ALMA SABERON', 'BD3', 'PROVINCIAL AREA COORDINATOR - CEBU', 'BD3', 'PROVINCIAL', 'REGULAR'),
(11, 'PCN181', 'ANTIPALA, DIXIE GUERRERO', 'BD2', 'ACCOUNT MANAGER', 'BU3', 'MANILA', 'REGULAR'),
(12, 'PCN387', 'AQUINO, RACHELLE AGBUNAG', 'FINANCE', 'BILLING ASSISTANT', 'SUPPORT', 'MANILA', 'REGULAR'),
(13, 'PCN291', 'ARELLANO, AIZA AVILA', 'HR', 'HR OPERATIONS MANAGER', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(14, 'PCN268', 'AVILA, HERBILYN CJUAN', 'BD1', 'ACCOUNT SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(15, 'PCN285', 'ASAGRA, CLARIZA GERNATE', 'FINANCE', 'BILLING COORDINATOR', '', 'MANILA', 'REGULAR'),
(16, 'PCN274', 'BALARAO, RUBILYN ROMANO', 'BD1', 'DEVELOPMENT EXECUTIVE', 'BU1', 'MANILA', 'REGULAR'),
(17, 'PCN366', 'BARRIOS, ROBERT ESPINA', 'BD1', 'MERCHADISING MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(18, 'PCN149', 'CABACIS, CHRISTOPHER DESTURA', 'BD1', 'SR. MERCHANDISING MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(19, 'PCN16', 'BAESA, HERMONIDES CUSTODIO', 'PPI', 'OPERATIONS MANAGER - PPI', 'PPI', 'MANILA', 'REGULAR'),
(20, 'PCN63', 'BALADJAY, MA. LEONORA CALISIN', 'BSG', 'UTILITY MAINTENANCE 1', 'ADMIN', 'MANILA', 'REGULAR'),
(21, 'PCN358', 'CABRERA, JEFFREY SEJAS', 'BD1', 'ACTIVATION SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(22, 'PCN220', 'BARDE, ELIZABETH GONZAGA', 'BSG', 'UTILITY MAINTENANCE 1', 'ADMIN', 'MANILA', 'REGULAR'),
(23, 'PCN7', 'BARRAMEDA, JONATHAN MANSANADEZ', 'BSG', 'ADMIN MANAGER', 'ADMIN', 'MANILA', 'REGULAR'),
(24, 'PCN137', 'BARRAZONA, RUBY ROSE STREBEL', 'BD3', 'ACCOUNT EXECUTIVE', 'BD3', 'MANILA', 'REGULAR'),
(25, 'PCN395', 'CARALDE, MARIAH JANNELLE PALATINO', 'BD1', 'ADMIN COORDINATOR', 'BU1', 'MANILA', 'REGULAR'),
(26, 'PCN376', 'BARTOLOME, CLOVEN VERGARA JR.', 'FINANCE', 'DATA ANALYST', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(27, 'PCN374', 'BATACLAN, EARL DENNIS ARANETA', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(28, 'PCN401', 'BEDIS, MATT HARRIS', 'STRAT', '', '', 'MANILA', 'PROBATIONARY'),
(29, 'PCN107', 'BELDAD, MA. CHRISTINA MILLANTE', 'FINANCE', 'BILLING STAFF', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(30, 'PCN236', 'BELTRAN, JAY-AR ARAMBULO', 'FINANCE', 'BILLING SUPERVISOR', '', 'MANILA', 'REGULAR'),
(31, 'PCN205', 'BERNAS, JHON REY BALANDANG', 'FINANCE', 'PAYROLL COORDINATOR', '', 'MANILA', 'REGULAR'),
(32, 'PCN1', 'BINUYA, REY FERDINAND SINGSON', 'EXECOM', 'PRESIDENT', 'EXECOM', 'MANILA', 'REGULAR'),
(33, 'PCN64', 'BONGAY, JESSICA CABACUNGAN', 'FINANCE', 'ACCOUNTING & PAYROLL MANAGER', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(34, 'PCN315', 'BONIFACIO, CONRADO MACABASAG JR.', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU3', 'MANILA', 'REGULAR'),
(35, 'PCN100', 'BUISER, SIMONET CASTILLO', 'FINANCE', 'FINANCE MANAGER', 'FO', 'MANILA', 'REGULAR'),
(36, 'PCN45', 'BURCE, MICHAEL MOLAS', 'STRAT', 'SR. MIS-IT MANAGER', 'MIS', 'MANILA', 'REGULAR'),
(37, 'PCN273', 'CARLOS, JELLIE ANNE MEDINA', 'BD1', 'ACTIVATION PROJECT SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(38, 'PCN398', 'CABANGIS, RICHARD NOMBRA', 'HR', 'HR GENERALIST', 'HR - OPERATIONS', 'MANILA', 'PROBATIONARY'),
(39, 'PCN43', 'COÃ‘ADO, MIE MARTINEZ', 'BD1', 'OPERATIONS/BUSINESS UNIT MANAGER(CORE)', 'BU1', 'MANILA', 'REGULAR'),
(40, 'PCN254', 'CAINGAT, JOANLYN CALIMLIM', 'BD2', 'IT SUPERVISOR - DATA ANALYST', 'BU3', 'MANILA', 'REGULAR'),
(41, 'PCN403', 'CAMET, SHIELA MARIE JURILLA', 'BD2', 'OPERATIONS SUPERVISOR- SOUTH LUZON', 'BU2', 'PROVINCIAL', 'PROBATIONARY'),
(42, 'PCN127', 'DELA PASION, MARY GRACE INTAL', 'BD1', 'ACCOUNT MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(43, 'PCN70', 'CARIÃ‘O, EDUARDO VILLACORTE JR.', 'BSG', 'LIAISON COORDINATOR', 'ADMIN', 'MANILA', 'REGULAR'),
(44, 'PCN266', 'FORCADILLA, RUBY GACIS', 'BD1', 'ACCOUNT SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(45, 'PCN23', 'CARITATIVO, RODERICK MANUEL', 'BD2', 'BUSINESS UNIT MANAGER', 'BU4', 'MANILA', 'REGULAR'),
(46, 'PCN194', 'GALANG, DENISE ARIANNE ABULENCIA', 'BD1', 'ACCOUNT MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(47, 'PCN284', 'CASTILLO, BRYAN GARCIA', 'STRAT', 'OPERATIONS SUPERVISOR - ONBOARDING', 'TRAINING', 'MANILA', 'REGULAR'),
(48, 'PCN384', 'CASTILLO, LUMIN TORIO', 'BD2', 'OPERATIONS SUPERVISOR-NCL', 'BU3', 'PROVINCIAL', 'REGULAR'),
(49, 'PCN66', 'CATUNGAL, REYMOND PALMA', 'BSG', 'ADMIN OFFICER', '', 'MANILA', 'REGULAR'),
(50, 'PCN290', 'CEDULA, EDWIN QUIZON', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(51, 'PCN198', 'CENDAÃ‘A, RICHVON DE GUZMAN', 'BD2', 'ADMIN SUPERVISOR', 'BU3', 'MANILA', 'REGULAR'),
(52, 'PCN406', 'CENTENO, YESO CHRISTIE JOY', 'BD2', 'OPERATIONS SUPERVISOR - MINDANAO', 'BU2', 'PROVINCIAL', 'PROBATIONARY'),
(53, 'PCN309', 'CHAVEZ, RUBENA KRISNA TUSI', 'FINANCE', 'CASH MANAGEMENT COORDINATOR', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(54, 'PCN312', 'CO, ARIEL BAYOT', 'MANCOM', 'AVP-HR', 'HR', 'MANILA', 'REGULAR'),
(55, 'PCN407', 'GERILLA, KHRISNA DINGDING', 'BD1', 'MERCHANDISING SUPERVISOR', 'BU1', 'MANILA', 'PROBATIONARY'),
(56, 'PCN296', 'COROZA, HERENZO MENDOZA', 'STRAT', 'JUNIOR GRAPHIC ARTIST', 'CREATIVE', 'MANILA', 'REGULAR'),
(57, 'PCN292', 'CORREA, MARK ANTHONY HERNANDO', 'FINANCE', 'ACCOUNTING CLERK', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(58, 'PCN46', 'CORTEZ, MICHAEL LABINE', 'BD2', 'BUSINESS UNIT MANAGER', 'BU2', 'MANILA', 'REGULAR'),
(59, 'PCN72', 'DAYO, JOEL ANDRES', 'BSG', 'COMPANY DRIVER', 'LOGISTICS', 'MANILA', 'REGULAR'),
(60, 'PCN393', 'DAYRIT, CHRISTINE JANE FRANCISCO', 'HR', 'HR GENERALIST', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(61, 'PCN4', 'DE CASTRO, VERONICA PALMERO', 'MANCOM', 'VICE PRESIDENT', 'BSG', 'MANILA', 'REGULAR'),
(62, 'PCN389', 'DE GUIA, JOAN OLBES', 'FINANCE', 'PAYROLL/BILLING ASSISTANT', '', 'MANILA', 'REGULAR'),
(63, 'PCN73', 'DE LEON, EDWARD PEDRGOZA', 'BSG', 'COMPANY DRIVER', 'LOGISTICS', 'MANILA', 'REGULAR'),
(64, 'PCN14', 'DEL MUNDO, RODANTE REVILLA', 'BSG', 'WAREHOUSE MANAGER', 'WAREHOUSE', 'MANILA', 'REGULAR'),
(65, 'PCN368', 'INCOY, ALEXANDER ORAYE', 'BD1', 'MERCHANDISING MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(66, 'PCN74', 'DEL ROSARIO, RODOLFO CANLAS', 'BSG', 'COMPANY DRIVER', 'LOGISTICS', 'MANILA', 'REGULAR'),
(67, 'PCN307', 'DELA CRUZ, DARWIN CAPPAROS', 'FINANCE', 'BILLING STAFF', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(68, 'PCN177', 'DELA CRUZ, ROSALYN SARMIENTO', 'BD3', 'ACTIVATION SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(69, 'PCN257', 'MARALIT, DIANNE MARICRIS GARCIA', 'BD1', 'ACCOUNT SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(70, 'PCN261', 'DELA ROSA, CHRISTIAN MALUTO', 'BD3', 'ACTIVATION SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(71, 'PCN265', 'DELUSO, RICAREDO BENID JR.', 'FINANCE', 'PAYROLL BILLING COORDINATOR', 'SUPPORT', 'MANILA', 'REGULAR'),
(72, 'PCN281', 'ORMACIDO, ANGELICA INGCO', 'BD1', 'MERCHANDISING MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(73, 'PCN388', 'DORADO, ROMMEL GREGORY', 'FINANCE', 'PAYROLL/BILLING ASSISTANT', '', 'MANILA', 'REGULAR'),
(74, 'PCN168', 'DORADO, RONALD GREGORY', 'BSG', 'WAREHOUSE SUPERVISOR', 'WAREHOUSE', 'MANILA', 'REGULAR'),
(75, 'PCN206', 'DUMALUAN, MARIE', 'FINANCE', 'FINANCE SUPERVISOR', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(76, 'PCN259', 'DUNGARAN, MARIVIC ABAD', 'BSG', 'PROCUREMENT SPECIALIST', 'PROCUREMENT', 'MANILA', 'REGULAR'),
(77, 'PCN131', 'ESGUERRA, ALICIA ALVENDIA', 'BD3', 'PROVINCIAL COORDINATOR - PANGASINAN', 'BD3', 'PROVINCIAL', 'REGULAR'),
(78, 'PCN361', 'ESMALDE, ROCHE LARA', 'HR', 'EWB ASSOCIATE', 'HR - EWB', 'MANILA', 'REGULAR'),
(79, 'PCN164', 'ESTROBO, RAYMOND NECESITO', 'BSG', 'WAREHOUSE COORDINATOR', 'WAREHOUSE', 'MANILA', 'REGULAR'),
(80, 'PCN101', 'FERRER, ROMEL BELANDRES', 'BSG', 'PROCUREMENT OFFICER', 'PROCUREMENT', 'MANILA', 'REGULAR'),
(81, 'PCN97', 'FONTANILLA, ALBERTO GUBA', 'PPI', 'FOREMAN/PRINTING SUPR - PPI', 'PPI', 'MANILA', 'REGULAR'),
(82, 'PCN400', 'PASCUA, PAMELA LYN DIAZ', 'BD1', 'ACCOUNT SUPERVISOR', 'BU1', 'MANILA', 'PROBATIONARY'),
(83, 'PCN334', 'FORMARAN, JOSHUA CRUZ', 'HR', 'EWB SPECIALIST', 'HR - EWB', 'MANILA', 'REGULAR'),
(84, 'PCN179', 'FUENTES, PATRICIA MAE VILLAMENTE', 'HR', 'EWB SUPERVISOR', 'HR - EWB', 'MANILA', 'REGULAR'),
(85, 'PCN207', 'FUGABAN, JEILA MARIE GUZMAN', 'FINANCE', 'FINANCE SUPERVISOR', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(86, 'PCN370', 'SALTA, JULIE ANN MANTALA', 'BD1', 'ACTIVATION COORDINATOR', 'BU1', 'MANILA', 'REGULAR'),
(87, 'PCN208', 'GARCIA, CHERRY ANN BARCOMA', 'FINANCE', 'CASH MANAGEMENT SUPERVISOR', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(88, 'PCN297', 'GARCIA, REYCHELYN BALARAO', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU4', 'MANILA', 'REGULAR'),
(89, 'PCN998', 'GENOVA, SHELAH MEL DE VERA', 'PPI', 'HR, ADMIN AND TA - PPI', 'PPI', 'MANILA', 'REGULAR'),
(90, 'PCN193', 'VARGAS, KAREN SERA', 'BD1', 'ACTIVATION SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(91, 'PCN112', 'GOMEZ, WILLIAM PATRICK GEROSANO', 'BSG', 'PROCUREMENT OFFICER', 'PROCUREMENT', 'MANILA', 'REGULAR'),
(92, 'PCN362', 'GONZALES, LESLIE ANN OLBES', 'HR', 'HR GENERALIST', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(93, 'PCN382', 'GUADIZ, APRIL QUILANG', 'FINANCE', 'ACCOUNTING CLERK', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(94, 'PCN75', 'ILAGAN, JOSEPHINE SARAZA', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU1', 'MANILA', 'REGULAR'),
(95, 'PCN354', 'AGABIN, ZHA-ZHA ZARATE', 'BD1', 'ACCOUNT SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(96, 'PCN138', 'ARELLANO, JENNY AVILA', 'BD1', 'SR. ACCOUNT MANAGER OIC', 'BU2', 'MANILA', 'REGULAR'),
(97, 'PCN306', 'JIMENA, MARY ROSE BORBE', 'HR', 'COMPENSATION AND BENEFIT SUPERVISOR', 'HR - COMBEN', 'MANILA', 'REGULAR'),
(98, 'PCN111', 'JOMOCAN, MARY MANALIT ABQUILAN', 'BD3', 'ACTIVATION AND FINANCE SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(99, 'PCN365', 'JOVES, SHARMAINE ACEJO', 'HR', 'HR OPERATIONS SPECIALIST', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(100, 'PCN304', 'LABASAN, NOEL OCHOA', 'HR', 'HRIS SPECIALIST', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(101, 'PCN77', 'LAGROSA, JOAN BALILI', 'BSG', 'UTILITY MAINTENANCE 2', 'ADMIN', 'MANILA', 'REGULAR'),
(102, 'PCN2', 'LICSI, MANUEL GUEVARA', 'EXECOM', 'EXECUTIVE VICE PRESIDENT', 'EXECOM', 'MANILA', 'REGULAR'),
(103, 'PCN211', 'LIPAT, FLORDELIZA DUMA', 'FINANCE', 'FINANCE SUPERVISOR', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(104, 'PCN24', 'LOPEZ, IRMINA SANTOS', 'BD2', 'OPERATIONS SUPERVISOR - ONBOARDING', 'BU3', 'MANILA', 'REGULAR'),
(105, 'PCN180', 'LOPEZ, PAUL RINGO MIRANDA', 'HR', 'HR OPERATIONS SPECIALIST', 'HR - OPERATIONS', 'MANILA', 'REGULAR'),
(106, 'PCN390', 'LUCENA, LEA ANNE REODAVA', 'FINANCE', 'BILLING STAFF', 'PAYROLL AND BILLING', 'MANILA', 'REGULAR'),
(107, 'PCN396', 'LUCENA, RACIELLE ANNE REODAVA', 'BD2', '', 'BU2', 'MANILA', 'REGULAR'),
(108, 'PCN386', 'LUCENA, REINA ROSE', 'HR', 'EWB ASSOCIATE', 'HR - EWB', 'MANIlA', 'REGULAR'),
(109, 'PCN356', 'AYOP, MANELYN MACARAYAN', 'BD1', 'HR, ADMIN AND SAFETY COORDINATOR', 'BU2', 'MANILA', 'REGULAR'),
(110, 'PCN93', 'MAGNO, RICHARD REYES', 'BD2', 'MERCHANDISING SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(111, 'PCN258', 'DIMAILIG, RHODORA FLORES', 'BD1', 'ACCOUNT MANAGER', 'BU2', 'MANILA', 'REGULAR'),
(112, 'PCN3', 'MARCA, NANCY FONTANILLA', 'MANCOM', 'VICE PRESIDENT', 'BD3', 'MANILA', 'REGULAR'),
(113, 'PCN244', 'MASCARINA, VERA ELLEN FLORES', 'HR', 'DISCIPLINE SPECIALIST', '', 'MANILA', 'REGULAR'),
(114, 'PCN202', 'MENDOZA, JERICK JUAREZ', 'BD2', 'OPERATIONS SUPERVISOR - PAYABLES', 'BU3', 'MANILA', 'REGULAR'),
(115, 'PCN264', 'MENDOZA, MOLLY ABUTOG', 'BD2', 'OPERATIONS SUPERVISOR - ONBOARDING', 'BU3', 'MANILA', 'REGULAR'),
(116, 'PCN187', 'MIRANDA, JHOANNA PAEZ', 'BSG', 'PROCUREMENT MANAGER', 'PROCUREMENT', 'MANILA', 'REGULAR'),
(117, 'PCN118', 'MONTERO, ANNA SHIELA PUREZA', 'FINANCE', 'CASHIER SUPERVISOR', 'FINANCE - CORE', 'MANILA', 'REGULAR'),
(118, 'PCN85', 'MOTEL, PALOMA LARIZA SALAZAR', 'BD2', 'BUSINESS UNIT MANAGER', 'BU3', 'MANILA', 'REGULAR'),
(119, 'PCN277', 'ODTUHAN, JEFFREY MORALITA', 'BSG', 'UTILITY MAINTENANCE 1', 'ADMIN', 'MANILA', 'REGULAR'),
(120, 'PCN55', 'OLIVA, AILEEN DE LEON', 'STRAT', 'ASSISTANT ACCOUNT MANAGER', 'STRAT', 'MANILA', 'REGULAR'),
(121, 'PCN283', 'INOCENCIO, CHARMAINE REBENITO', 'BD1', 'ACCOUNT SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(122, 'PCN173', 'PAMILARAN, ZENAIDA MELLEVO', 'HR', 'HR OPERATIONS SUPERVISOR', 'SUPPORT', 'MANILA', 'REGULAR'),
(123, 'PCN1007', 'PANG, ALEXANDER', 'STRAT', '', 'STRAT', '', 'CONSULTANT'),
(124, 'PCN405', 'MADRIAGA, JAYSON PALMA', 'BD1', 'MERCHANDISING MANAGER', 'BU2', 'MANILA', 'REGULAR'),
(125, 'PCN12', 'PASIA, RONNEL DELA PAZ', 'MANCOM', 'VICE PRESIDENT', 'FINANCE', 'MANILA', 'REGULAR'),
(126, 'PCN13', 'PASIA, SHERYL PAYNOR', 'MANCOM', 'VICE PRESIDENT', 'BD1', 'MANILA', 'REGULAR'),
(127, 'PCN350', 'PAULINO, MARIA PAULA LUZ MASANGQUE', 'BD3', 'ASSISTANT ACCOUNT MANAGER', 'BD3', 'MANILA', 'REGULAR'),
(128, 'PCN17', 'PEREDA, MARLUDETH VILLEGAS', 'FINANCE', 'FINANCE MANAGER', '', 'MANILA', 'REGULAR'),
(129, 'PCN27', 'PESIGAN, AILEEN DIMAILIG', 'BD1', 'BUSINESS UNIT MANAGER(URIC & SPACT)', 'BU2', 'MANILA', 'REGULAR'),
(130, 'PCN408', 'POLICARPIO, ABIGAEL MANANSALA', 'HR', 'SAFETY/TRADE RELATION OFFICER', 'HR - COMBEN', 'MANILA', 'PROBATIONARY'),
(131, 'PCN349', 'QUIMNO, CHRISTIAN CEASAR MANOBA', 'BSG', 'LOGISTICS SUPERVISOR', 'LOGISTICS', 'MANILA', 'REGULAR'),
(132, 'PCN176', 'RAMOS, FERNANDO SANTOS', 'STRAT', 'CREATIVE DIRECTOR', 'CREATIVE', 'MANILA', 'REGULAR'),
(133, 'PCN42', 'RAMOS, FREDERICK CANDAZA', 'MANCOM', 'VICE PRESIDENT', 'BD2', 'MANILA', 'REGULAR'),
(134, 'PCN167', 'SALAZAR, ANDREW OLAYVAR', 'BD3', 'ACTIVATION SUPERVISOR', 'BD3', 'MANILA', 'REGULAR'),
(135, 'PCN282', 'SOLIMAN, MA. CRISTINA', 'BD1', 'ACTIVATION SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(136, 'PCN353', 'SIBAY, ROXAN SINADJAN', 'BD2', 'OPERATIONS HEAD/MANAGER', 'BU3', 'PROVINCIAL', 'REGULAR'),
(137, 'PCN174', 'TORRE, JOYCE MARICK RAMOS', 'BD1', 'ACCOUNT SUPERVISOR', 'BU2', 'MANILA', 'REGULAR'),
(138, 'PCN35', 'SORIANO, RONALD PAYUMO', 'BD2', 'MERCHANDISING MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(139, 'PCN385', 'TABUENA, JERALDINE DEQUITO', 'BD3', 'ACTIVATION COORDINATOR', 'BD3', 'MANILA', 'REGULAR'),
(140, 'PCN122', 'TEVAR, FERISH COSTALES', 'BD2', 'BUSINESS UNIT MANAGER', 'BU1', 'MANILA', 'REGULAR'),
(141, 'PCN409', 'TOMENIO, MA. REYNA DOMASIG', 'HR', 'HR GENERALIST', '', 'MANILA', 'PROBATIONARY'),
(142, 'PCN184', 'CARIÃ‘O, GEORGE MICHAEL REVILLA', 'BD1', 'WAREHOUSE / TRAFFIC COORDINATOR', 'SSG', 'MANILA', 'REGULAR'),
(143, 'PCN286', 'DEL ROSARIO, JOAN BALADJAY', 'BD1', 'BILLING SUPERVISOR', 'SSG', 'MANILA', 'REGULAR'),
(144, 'PCN82', 'VELASCO, ADRIAN EVANGELISTA', 'BSG', 'WAREHOUSE COORDINATOR', 'WAREHOUSE', 'MANILA', 'REGULAR'),
(145, 'PCN11', 'VELASCO, EDUARDO EVANGELISTA', 'BSG', 'LIAISON OFFICER', 'ADMIN', 'MANILA', 'REGULAR'),
(146, 'PCN216', 'VERDE, MA. FE DELIZO', 'HR', 'FINANCE SPECIALIST', 'HR - COMBEN', 'MANILA', 'REGULAR'),
(147, 'PCN83', 'VILLANUEVA, FERNANDO ISLA', 'BSG', 'MOTORPOOL TECHNICIAN', 'LOGISTICS', 'MANILA', 'REGULAR'),
(148, 'PCN160', 'VILLASOR, CEFERINA CAAGBAY', 'BD3', 'PROVINCIAL AREA COORDINATOR - CDO', 'BD3', 'PROVINCIAL', 'REGULAR'),
(149, 'PCN121', 'VILLAVICENCIO, JUNALIE MIRARAN', 'FINANCE', 'FINANCE MANAGER', 'SUPPORT', 'MANILA', 'REGULAR'),
(150, 'PCN40', 'VILLAVICENCIO, RODEO DE GUZMAN', 'STRAT', 'MIS SUPERVISOR', 'MIS', 'MANILA', 'REGULAR'),
(151, 'PCN134', 'VILLOSA, BENJAMIN CARANDANG', 'BD3', 'PROVINCIAL AREA COORDINATOR - LAGUNA', 'BD3', 'PROVINCIAL', 'REGULAR'),
(152, 'PCN29', 'ZAFRA, FERDINAND ROSAL', 'BD3', 'ACTIVATION MANAGER', 'BD3', 'MANILA', 'REGULAR'),
(153, 'PCN1008', 'BAGABAY, CESAR', 'BSG', '', 'LOGISTICS', 'MANILA', 'HYBRID'),
(154, 'PCN1010', 'PELAYO, ANAMIE', 'STRAT', 'TECHNICAL ASSISTANT', 'STRAT', 'MANILA', 'PROBATIONARY'),
(155, 'PCN191881', 'GOMERA, JAMES PHILIP AMANTE', 'STRAT', 'IT SUPPORT', 'MIS-IT', 'MANILA', 'PROJECT BASE'),
(156, 'PCN191886', 'JONES, SHANAIAH ISABELLE ALDE', 'STRAT', '', '', 'MANILA', 'REGULAR'),
(157, 'PCNTEMP01', 'TOMENIO, MARIA REYNA', 'BD1', 'HR GENERALIST', '', 'MANILA', 'PROJECT BASE'),
(158, 'PCNTEMP02', 'EVANGELISTA, EVA', 'BD1', '', '', '', 'PROJECT BASE'),
(159, 'PCN45208-0', 'DOMINGO, ALLONDRA', 'STRAT', 'DATA ANALYST', '', '', 'PROJECT BASE');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `mrf_id` int(11) NOT NULL,
  `mrf_tracking` int(11) NOT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `client_company_id` varchar(255) DEFAULT NULL,
  `ewb_count` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT '1=active; 0=inactive',
  `is_deleted` varchar(255) DEFAULT '0',
  `approved_by` varchar(255) NOT NULL,
  `date_approved` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `mrf_id`, `mrf_tracking`, `project_title`, `client_company_id`, `ewb_count`, `start_date`, `end_date`, `status`, `is_deleted`, `approved_by`, `date_approved`) VALUES
(1, 1016, 1, 'IT SUPPORT', 'UNILEVER PHILIPPINES INC.', '8', '2023-11-18', '2023-11-30', '1', '0', '', '2023-11-17 11:47:46'),
(2, 1017, 2, 'BUSINESS MANAGER', 'UNILEVER RFM SELECTA ICE CREAM INC.', '10', '2023-11-25', '2023-12-09', '1', '0', '', '2023-11-17 11:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `interviewer` varchar(255) NOT NULL,
  `position_applied` varchar(255) NOT NULL,
  `date_interviewed` varchar(255) NOT NULL,
  `relevant_educ_background` int(11) NOT NULL,
  `related_work_exp` int(11) NOT NULL,
  `related_computer_skills` int(11) NOT NULL,
  `verbal_comm_skills` int(11) NOT NULL,
  `cooperation` int(11) NOT NULL,
  `personality` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `diction` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `IQ` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `result` varchar(255) NOT NULL COMMENT 'pass or failed',
  `interview_details` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `project_approved_by` varchar(255) NOT NULL,
  `date_project_status` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `resume_id`, `applicant_name`, `interviewer`, `position_applied`, `date_interviewed`, `relevant_educ_background`, `related_work_exp`, `related_computer_skills`, `verbal_comm_skills`, `cooperation`, `personality`, `intelligence`, `diction`, `others`, `IQ`, `english`, `math`, `result`, `interview_details`, `project_status`, `project_approved_by`, `date_project_status`, `is_deleted`, `date_added`) VALUES
(7, 28, 'James Philip Gomera', 'DEO VILL', 'IT SUPPORT', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', '', '', '', 0, '2023-11-18 11:29:28'),
(8, 40, 'John Smith', 'DEO VILL', 'IT SUPPORT', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', 'FOR DEPLOYMENT', 'James Philip Gomera', '2023-11-18 11:33:45', 0, '2023-11-18 11:29:31'),
(5, 27, 'James Philip Gomera', 'DEO VILL', 'BUSINESS MANAGER', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', 'FOR DEPLOYMENT', 'James Philip Gomera', '2023-11-18 11:33:41', 0, '2023-11-18 11:29:01'),
(6, 39, 'John Smith', 'DEO VILL', 'BUSINESS MANAGER', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', '', '', '', 0, '2023-11-18 11:29:03'),
(9, 41, 'Levi Malandutay', 'DEO VILL', 'BUSINESS MANAGER', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', 'FOR DEPLOYMENT', 'James Philip Gomera', '2023-11-18 13:37:10', 0, '2023-11-18 13:35:20'),
(10, 42, 'Jerryboy Malandutay', 'DEO VILL', 'IT SUPPORT', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', 'FOR DEPLOYMENT', 'James Philip Gomera', '2023-11-18 13:44:59', 0, '2023-11-18 13:44:32'),
(11, 44, 'JAMES PHILIP GOMERA', 'DEO VILL', 'IT SUPPORT', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', 'FOR DEPLOYMENT', 'James Philip Gomera', '2023-11-18 16:11:24', 0, '2023-11-18 16:10:46'),
(12, 43, 'JAMES PHILIP GOMERA', 'DEO VILL', 'BUSINESS MANAGER', 'November 18, 2023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'QUALIFIED', '', '', '', '', 0, '2023-11-18 16:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_approve_history`
--

CREATE TABLE `recruitment_approve_history` (
  `id` int(11) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `app_num` int(11) NOT NULL,
  `sss` int(11) NOT NULL,
  `philhealth` int(11) NOT NULL,
  `pagibig` int(11) NOT NULL,
  `tin` int(11) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remarks` varchar(3000) NOT NULL,
  `approved_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `psgcCode` varchar(255) DEFAULT NULL,
  `regDesc` text,
  `regCode` varchar(255) DEFAULT NULL,
  `tr` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `psgcCode`, `regDesc`, `regCode`, `tr`) VALUES
(1, '010000000', 'REGION I (ILOCOS REGION)', '01', '1'),
(2, '020000000', 'REGION II (CAGAYAN VALLEY)', '02', '2'),
(3, '030000000', 'REGION III (CENTRAL LUZON)', '03', '3'),
(4, '040000000', 'REGION IV-A (CALABARZON)', '04', '4A'),
(5, '170000000', 'REGION IV-B (MIMAROPA)', '17a', '4B'),
(6, '050000000', 'REGION V (BICOL REGION)', '05', '5'),
(7, '060000000', 'REGION VI (WESTERN VISAYAS)', '06', '6'),
(8, '070000000', 'REGION VII (CENTRAL VISAYAS)', '07', '7'),
(9, '080000000', 'REGION VIII (EASTERN VISAYAS)', '08', '8'),
(10, '090000000', 'REGION IX (ZAMBOANGA PENINSULA)', '09', '9'),
(11, '100000000', 'REGION X (NORTHERN MINDANAO)', '10', '10'),
(12, '110000000', 'REGION XI (DAVAO REGION)', '11', '11'),
(13, '120000000', 'REGION XII (SOCCSKSARGEN)', '12', '12'),
(14, '160000000', 'REGION XIII (Caraga)', '16', '13'),
(16, '140000000', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', '14', 'CAR'),
(17, '150000000', 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)', '15', 'ARMM'),
(15, '130000000', 'NATIONAL CAPITAL REGION (NCR)', '13', 'NCR'),
(18, '180000000', 'N/A', '18', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_applicants_history`
--

CREATE TABLE `rejected_applicants_history` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_applied` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `present_address` text,
  `applicant_status` varchar(20) DEFAULT NULL,
  `resume_attachment` varchar(255) DEFAULT NULL,
  `number_of_months` int(11) NOT NULL DEFAULT '3',
  `date_applied` datetime NOT NULL,
  `date_rejected` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shortlist_details`
--

CREATE TABLE `shortlist_details` (
  `id` int(11) NOT NULL,
  `shortlistname` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `mrf_tracking` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shortlist_details`
--

INSERT INTO `shortlist_details` (`id`, `shortlistname`, `project`, `mrf_tracking`, `client`, `datecreated`, `activity`, `project_id`) VALUES
(8, 'IT SUPPORT', 'IT SUPPORT', 1, 'UNILEVER PHILIPPINES INC.', '11/18/2023', 'ACTIVE', 1),
(7, 'BUSINESS MANAGER', 'BUSINESS MANAGER', 2, 'UNILEVER RFM SELECTA ICE CREAM INC.', '11/18/2023', 'ACTIVE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shortlist_master`
--

CREATE TABLE `shortlist_master` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `shortlistnameto` varchar(255) NOT NULL,
  `appnumto` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `dateto` varchar(255) NOT NULL,
  `ewb` varchar(255) NOT NULL,
  `ewbdate` varchar(255) NOT NULL,
  `projectnya` varchar(255) NOT NULL,
  `deployment_status` varchar(255) NOT NULL DEFAULT 'FOR DEPLOYMENT'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shortlist_master`
--

INSERT INTO `shortlist_master` (`id`, `employee_id`, `project_name`, `shortlistnameto`, `appnumto`, `is_deleted`, `dateto`, `ewb`, `ewbdate`, `projectnya`, `deployment_status`) VALUES
(11, 11, '', 'IT SUPPORT', '12', 0, '11/18/2023', '', '', '', 'FOR DEPLOYMENT'),
(12, 12, '', 'BUSINESS MANAGER', '13', 0, '11/18/2023', '', '', '', 'FOR DEPLOYMENT'),
(10, 10, '', 'BUSINESS MANAGER', '11', 0, '11/18/2023', '', '', '', 'FOR DEPLOYMENT'),
(13, 13, '', 'IT SUPPORT', '14', 0, '11/18/2023', '', '', '', 'FOR DEPLOYMENT'),
(14, 14, '', 'IT SUPPORT', '15', 0, '11/18/2023', '', '', '', 'FOR DEPLOYMENT');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `description`, `is_deleted`) VALUES
(0, 'Bagong Sources', 1),
(1, 'Walk-in', 0),
(2, 'Facebook', 0),
(3, 'Flyers', 0),
(4, 'Re-Apply', 0),
(5, 'Referral', 0),
(6, 'Job Fair', 0),
(7, 'Jobstreet', 0),
(8, 'Poster/Billboard', 0),
(9, 'Referral (From Office Based)', 0),
(10, 'Referral (From Field Force)', 0),
(11, 'Transferred from other agency', 0);

-- --------------------------------------------------------

--
-- Table structure for table `synch`
--

CREATE TABLE `synch` (
  `id` int(11) NOT NULL,
  `katsing` varchar(255) NOT NULL,
  `datenow1` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `synch`
--

INSERT INTO `synch` (`id`, `katsing`, `datenow1`) VALUES
(1, '1', '2023-11-15'),
(2, 'Shortlist', '11/18/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tax_status`
--

CREATE TABLE `tax_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` varchar(1) NOT NULL DEFAULT '0',
  `civil_status_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax_status`
--

INSERT INTO `tax_status` (`id`, `code`, `description`, `is_deleted`, `civil_status_id`) VALUES
(1, 'S', 'Single', '0', 1),
(2, 'SD', 'Single with Dependents', '0', 1),
(3, 'S1', 'Single with one dependent', '0', 1),
(4, 'S2', 'Single with two dependents', '0', 1),
(5, 'S3', 'Single with three dependents', '0', 1),
(6, 'S4', 'Single with four dependents', '0', 1),
(7, 'M', 'Married', '0', 2),
(8, 'ME1', 'Married with one dependent', '0', 2),
(9, 'ME2', 'Married with two dependents', '0', 2),
(10, 'ME3', 'Married with three dependents', '0', 2),
(11, 'ME4', 'Married with four dependents', '0', 2),
(12, 'ME5', 'Married with five dependents', '0', 2),
(13, 'SE', 'SEPARATED', '0', 3),
(14, 'WI', 'WIDOWED', '0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `appno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `appno`) VALUES
(1, '15'),
(2, '25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `approve` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pname`, `approve`) VALUES
(1, 'deo', 'deop', ''),
(2, 'deo1', 'deo1p', ''),
(3, 'deo2', 'deo2p', ''),
(4, 'deo3', 'deo3p', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `201files`
--
ALTER TABLE `201files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_notifications`
--
ALTER TABLE `applicant_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_resume`
--
ALTER TABLE `applicant_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `attrition`
--
ALTER TABLE `attrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blacklist_history`
--
ALTER TABLE `blacklist_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_company`
--
ALTER TABLE `client_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_project`
--
ALTER TABLE `client_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deployment`
--
ALTER TABLE `deployment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deployment_history`
--
ALTER TABLE `deployment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deploy_status`
--
ALTER TABLE `deploy_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distinguishing_qualification_marks`
--
ALTER TABLE `distinguishing_qualification_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empcounter`
--
ALTER TABLE `empcounter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_update_history`
--
ALTER TABLE `employee_update_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_status`
--
ALTER TABLE `employment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewb_choices`
--
ALTER TABLE `ewb_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewb_declined_history`
--
ALTER TABLE `ewb_declined_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewb_verification_history`
--
ALTER TABLE `ewb_verification_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excuse_letter`
--
ALTER TABLE `excuse_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excuse_letter_history`
--
ALTER TABLE `excuse_letter_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loa`
--
ALTER TABLE `loa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loa_files`
--
ALTER TABLE `loa_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loa_main_id` (`loa_main_id`);

--
-- Indexes for table `loa_maintenance_word`
--
ALTER TABLE `loa_maintenance_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrf`
--
ALTER TABLE `mrf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrf_access`
--
ALTER TABLE `mrf_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcn_emp`
--
ALTER TABLE `pcn_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `recruitment_approve_history`
--
ALTER TABLE `recruitment_approve_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_applicants_history`
--
ALTER TABLE `rejected_applicants_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlist_details`
--
ALTER TABLE `shortlist_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_project` (`project_id`);

--
-- Indexes for table `shortlist_master`
--
ALTER TABLE `shortlist_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `sources` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `synch`
--
ALTER TABLE `synch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_status`
--
ALTER TABLE `tax_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `201files`
--
ALTER TABLE `201files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `applicant_notifications`
--
ALTER TABLE `applicant_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `applicant_resume`
--
ALTER TABLE `applicant_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `attrition`
--
ALTER TABLE `attrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklist_history`
--
ALTER TABLE `blacklist_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1652;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_company`
--
ALTER TABLE `client_company`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `client_project`
--
ALTER TABLE `client_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `deployment`
--
ALTER TABLE `deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deployment_history`
--
ALTER TABLE `deployment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distinguishing_qualification_marks`
--
ALTER TABLE `distinguishing_qualification_marks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `empcounter`
--
ALTER TABLE `empcounter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_update_history`
--
ALTER TABLE `employee_update_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ewb_choices`
--
ALTER TABLE `ewb_choices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ewb_declined_history`
--
ALTER TABLE `ewb_declined_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ewb_verification_history`
--
ALTER TABLE `ewb_verification_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excuse_letter`
--
ALTER TABLE `excuse_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excuse_letter_history`
--
ALTER TABLE `excuse_letter_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loa`
--
ALTER TABLE `loa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loa_files`
--
ALTER TABLE `loa_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loa_maintenance_word`
--
ALTER TABLE `loa_maintenance_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mrf`
--
ALTER TABLE `mrf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `mrf_access`
--
ALTER TABLE `mrf_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pcn_emp`
--
ALTER TABLE `pcn_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recruitment_approve_history`
--
ALTER TABLE `recruitment_approve_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejected_applicants_history`
--
ALTER TABLE `rejected_applicants_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortlist_details`
--
ALTER TABLE `shortlist_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shortlist_master`
--
ALTER TABLE `shortlist_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `synch`
--
ALTER TABLE `synch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax_status`
--
ALTER TABLE `tax_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
