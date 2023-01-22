-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2022 at 05:40 PM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_tbl`
--

CREATE TABLE `enrollment_tbl` (
  `id` int(255) NOT NULL,
  `student_id` int(255) DEFAULT NULL,
  `schoolyear_id` int(255) DEFAULT NULL,
  `section_id` int(255) DEFAULT NULL,
  `dateofenroll` date DEFAULT NULL,
  `dateofexit` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_tbl`
--

INSERT INTO `enrollment_tbl` (`id`, `student_id`, `schoolyear_id`, `section_id`, `dateofenroll`, `dateofexit`, `status`) VALUES
(113, 113, 12, 18, '2022-05-17', NULL, 'renew'),
(114, 114, 12, 16, '2022-05-16', NULL, 'enrolled'),
(115, 115, 12, 13, '2022-05-16', NULL, 'enrolled'),
(116, 116, 12, 13, '2022-05-16', NULL, 'enrolled'),
(117, 117, 12, 13, '2022-05-16', NULL, 'enrolled'),
(118, 118, 12, 13, '2022-05-16', NULL, 'enrolled'),
(119, 119, 12, 13, '2022-05-16', NULL, 'enrolled'),
(120, 120, 12, 13, '2022-05-16', NULL, 'enrolled'),
(121, 121, 12, 13, '2022-05-16', NULL, 'enrolled'),
(122, 122, 12, 13, '2022-05-16', NULL, 'enrolled'),
(123, 123, 12, 13, '2022-05-16', NULL, 'enrolled'),
(124, 124, 12, 13, '2022-05-16', NULL, 'enrolled'),
(125, 125, 12, 13, '2022-05-16', NULL, 'enrolled'),
(126, 126, 12, 13, '2022-05-16', NULL, 'enrolled'),
(127, 127, 12, 13, '2022-05-16', NULL, 'enrolled'),
(128, 128, 12, 13, '2022-05-16', NULL, 'enrolled'),
(129, 129, 12, 14, '2022-05-16', NULL, 'enrolled'),
(130, 130, 12, 13, '2022-05-16', NULL, 'enrolled'),
(131, 131, 12, 13, '2022-05-16', NULL, 'enrolled'),
(132, 132, 12, 13, '2022-05-16', NULL, 'enrolled'),
(133, 133, 12, 13, '2022-05-16', NULL, 'enrolled'),
(134, 134, 12, 13, '2022-05-16', NULL, 'enrolled'),
(135, 135, 12, 13, '2022-05-16', NULL, 'enrolled'),
(136, 136, 12, 13, '2022-05-16', NULL, 'enrolled'),
(137, 137, 12, 13, '2022-05-16', NULL, 'enrolled'),
(138, 138, 12, 13, '2022-05-28', NULL, 'enrolled'),
(139, 139, 15, 16, '2022-06-19', NULL, 'enrolled'),
(140, 140, 12, 16, '2022-06-03', NULL, 'enrolled'),
(141, 141, 12, 13, '2022-06-23', NULL, 'enrolled'),
(142, 142, 12, 14, '2022-05-16', NULL, 'enrolled'),
(143, 143, 12, 14, '2022-05-16', NULL, 'enrolled'),
(144, 144, 12, 14, '2022-05-16', NULL, 'enrolled'),
(145, 145, 12, 14, '2022-05-16', NULL, 'enrolled'),
(146, 146, 12, 14, '2022-05-16', NULL, 'enrolled'),
(147, 147, 12, 14, '2022-05-16', NULL, 'enrolled'),
(148, 148, 12, 14, '2022-05-16', NULL, 'enrolled'),
(149, 149, 12, 14, '2022-05-16', NULL, 'enrolled'),
(150, 150, 12, 14, '2022-05-16', NULL, 'enrolled'),
(151, 151, 12, 14, '2022-05-16', NULL, 'enrolled'),
(152, 152, 12, 14, '2022-05-16', NULL, 'enrolled'),
(153, 153, 12, 14, '2022-05-16', NULL, 'enrolled'),
(154, 154, 12, 14, '2022-05-16', NULL, 'enrolled'),
(155, 155, 12, 14, '2022-05-16', NULL, 'enrolled'),
(156, 156, 12, 14, '2022-05-16', NULL, 'enrolled'),
(157, 157, 12, 14, '2022-05-16', NULL, 'enrolled'),
(158, 158, 12, 14, '2022-05-16', NULL, 'renew'),
(159, 159, 12, 14, '2022-05-16', NULL, 'enrolled'),
(160, 160, 12, 14, '2022-05-16', NULL, 'enrolled'),
(161, 161, 12, 14, '2022-05-16', NULL, 'enrolled'),
(162, 162, 12, 14, '2022-05-16', NULL, 'enrolled'),
(163, 163, 12, 14, '2022-05-16', NULL, 'enrolled'),
(164, 164, 12, 14, '2022-05-16', NULL, 'enrolled'),
(165, 165, 12, 14, '2022-05-16', NULL, 'enrolled'),
(166, 166, 12, 14, '2022-05-16', NULL, 'enrolled'),
(167, 167, 12, 14, '2022-05-16', NULL, 'enrolled'),
(168, 168, 12, 14, '2022-06-23', NULL, 'enrolled'),
(169, 169, 12, 14, '2022-06-23', NULL, 'enrolled'),
(170, 170, 12, 14, '2022-06-23', NULL, 'enrolled'),
(171, 171, 12, 14, '2022-06-23', NULL, 'enrolled'),
(172, 172, 12, 14, '2022-06-23', NULL, 'enrolled'),
(173, 173, 12, 14, '2022-06-23', NULL, 'enrolled'),
(174, 174, 12, 14, '2022-06-23', NULL, 'enrolled'),
(175, 175, 12, 14, '2022-06-23', NULL, 'enrolled'),
(176, 176, 12, NULL, NULL, '2022-06-06', 'Graduated'),
(178, 178, NULL, NULL, NULL, NULL, 'Admission Declined'),
(179, 179, NULL, NULL, NULL, NULL, 'pending'),
(180, 180, NULL, NULL, NULL, NULL, 'pending'),
(181, 158, NULL, NULL, NULL, NULL, 'pending'),
(182, 113, 14, 19, '2022-06-05', NULL, 'enrolled'),
(183, 181, 14, 13, '2022-06-07', NULL, 'renew'),
(184, 181, NULL, NULL, NULL, NULL, 'pending'),
(185, 182, NULL, NULL, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel_tbl`
--

CREATE TABLE `gradelevel_tbl` (
  `id` int(255) NOT NULL,
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradelevel_tbl`
--

INSERT INTO `gradelevel_tbl` (`id`, `grade`) VALUES
(1, 'KINDER'),
(2, 'GRADE 1'),
(3, 'GRADE 2'),
(4, 'GRADE 3'),
(5, 'GRADE 4'),
(6, 'GRADE 5'),
(7, 'GRADE 6');

-- --------------------------------------------------------

--
-- Table structure for table `pupil_account_tbl`
--

CREATE TABLE `pupil_account_tbl` (
  `pupil_id` int(255) NOT NULL,
  `pupil_lrn` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupil_account_tbl`
--

INSERT INTO `pupil_account_tbl` (`pupil_id`, `pupil_lrn`, `password`, `status`) VALUES
(129, '114581150167', 'student@123', 'Active'),
(142, '114581150165', 'student@123', 'Active'),
(143, '109632150442', 'student@123', 'Active'),
(144, '114581150377', 'student@123', 'Active'),
(145, '114581150378', 'student@123', 'Active'),
(146, '114584150004', 'student@123', 'Active'),
(147, '114581150170', 'student@123', 'Active'),
(148, '437007150170', 'student@123', 'Active'),
(149, '114581150132', 'student@123', 'Active'),
(150, '437003150016', 'student@123', 'Active'),
(151, '114581150166', 'student@123', 'Active'),
(152, '114581150257', 'student@123', 'Active'),
(153, '114581150331', 'student@123', 'Active'),
(154, '114581150192', 'student@123', 'Active'),
(155, '114581150150', 'student@123', 'Active'),
(156, '114581150333', 'student@123', 'Active'),
(157, '437006150036', 'student@123', 'Active'),
(158, '114581150337', 'student@123', 'Active'),
(159, '437007150204', 'student@123', 'Active'),
(160, '114581150363', 'student@123', 'Active'),
(161, '437003150097', 'student@123', 'Active'),
(162, '114581150371', 'student@123', 'Active'),
(163, '108187140381', 'student@123', 'Active'),
(164, '114581150402', 'student@123', 'Active'),
(165, '114581150070', 'student@123', 'Active'),
(166, '114581150105', 'student@123', 'Active'),
(167, '403889150068', 'student@123', 'Active'),
(168, '114581150404', 'student@123', 'Active'),
(169, '114581150372', 'student@123', 'Active'),
(170, '114563140345', 'student@123', 'Active'),
(171, '114558150027', 'student@123', 'Active'),
(172, '114581150158', 'student@123', 'Active'),
(173, '114581160005', 'student@123', 'Active'),
(174, '114581160039', 'student@123', 'Active'),
(175, '108482150363', 'student@123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear_tbl`
--

CREATE TABLE `schoolyear_tbl` (
  `id` int(255) NOT NULL,
  `SchoolYear` varchar(255) DEFAULT NULL,
  `SchoolHead` varchar(255) DEFAULT NULL,
  `Active` varchar(255) DEFAULT NULL,
  `EnrollmentStatus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear_tbl`
--

INSERT INTO `schoolyear_tbl` (`id`, `SchoolYear`, `SchoolHead`, `Active`, `EnrollmentStatus`) VALUES
(12, '2021-2022', 'MRS. JENELITA D. JILOT', 'Yes', 'Ongoing'),
(13, '2022-2023', 'MRS. JENELITA HILOT', 'No', 'Ended'),
(14, '2023-2024', 'MRS. JENELITA HILOT', 'No', 'Ended'),
(15, '2024-2025', 'MRS. JENELITA HILOT', 'No', 'Ended');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(255) NOT NULL,
  `gradelevel_id` int(255) DEFAULT NULL,
  `sectionname` varchar(255) DEFAULT NULL,
  `teacher_id` int(255) DEFAULT NULL,
  `is_view_enabled` varchar(255) NOT NULL DEFAULT 'No',
  `view_quarter1` varchar(255) NOT NULL DEFAULT 'No',
  `view_quarter2` varchar(255) NOT NULL DEFAULT 'No',
  `view_quarter3` varchar(255) NOT NULL DEFAULT 'No',
  `view_quarter4` varchar(255) NOT NULL DEFAULT 'No',
  `view_final` varchar(255) NOT NULL DEFAULT 'No',
  `sy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `gradelevel_id`, `sectionname`, `teacher_id`, `is_view_enabled`, `view_quarter1`, `view_quarter2`, `view_quarter3`, `view_quarter4`, `view_final`, `sy`) VALUES
(13, 1, 'BRIGHT', 43, 'No', 'No', 'No', 'No', 'No', 'No', ''),
(14, 7, 'TEMPERANCE', 44, 'No', 'Yes', 'No', 'No', 'No', 'No', '2021-2022'),
(16, 1, 'ROSAS', 45, 'No', 'No', 'No', 'No', 'No', 'No', ''),
(18, 2, 'AGILA', 51, 'No', 'No', 'No', 'No', 'No', 'No', '2024-2025'),
(19, 3, 'VALORANT', 62, 'No', 'No', 'No', 'No', 'No', 'No', ''),
(20, 1, 'TEST SECTION', 47, 'No', 'No', 'No', 'No', 'No', 'No', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_record_tbl`
--

CREATE TABLE `student_subject_record_tbl` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `1st_grade` int(255) NOT NULL DEFAULT '0',
  `1st_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `2nd_grade` int(255) NOT NULL DEFAULT '0',
  `2nd_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `3rd_grade` int(255) NOT NULL DEFAULT '0',
  `3rd_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `4th_grade` int(255) NOT NULL DEFAULT '0',
  `4th_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `final_grade` int(255) NOT NULL DEFAULT '0',
  `final_grade_remark` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject_record_tbl`
--

INSERT INTO `student_subject_record_tbl` (`id`, `student_id`, `section_id`, `subject_id`, `1st_grade`, `1st_grade_remark`, `2nd_grade`, `2nd_grade_remark`, `3rd_grade`, `3rd_grade_remark`, `4th_grade`, `4th_grade_remark`, `final_grade`, `final_grade_remark`) VALUES
(1515, 129, 14, 67, 82, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 82, 'Passed'),
(1516, 142, 14, 67, 89, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 89, 'Passed'),
(1517, 143, 14, 67, 88, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 88, 'Passed'),
(1518, 144, 14, 67, 78, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 78, 'Passed'),
(1519, 145, 14, 67, 89, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 89, 'Passed'),
(1520, 146, 14, 67, 87, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 87, 'Passed'),
(1521, 147, 14, 67, 86, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 86, 'Passed'),
(1522, 148, 14, 67, 98, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 98, 'Passed'),
(1523, 149, 14, 67, 92, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 92, 'Passed'),
(1524, 150, 14, 67, 98, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 98, 'Passed'),
(1525, 151, 14, 67, 67, 'Failed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 67, 'Failed'),
(1526, 152, 14, 67, 67, 'Failed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 67, 'Failed'),
(1527, 153, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1528, 154, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1529, 155, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1530, 156, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1531, 157, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1532, 158, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1533, 159, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1534, 160, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1535, 161, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1536, 162, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1537, 163, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1538, 164, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1539, 165, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1540, 166, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1541, 167, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1542, 168, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1543, 169, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1544, 170, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1545, 171, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1546, 172, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1547, 173, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1548, 174, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1549, 175, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(1550, 183, 14, 67, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `ethnicgroup` varchar(255) NOT NULL,
  `mothertongue` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `modality` varchar(255) NOT NULL,
  `4Ps` varchar(50) DEFAULT NULL,
  `studenttype` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `feducattain` varchar(255) DEFAULT NULL,
  `femploystatus` varchar(255) DEFAULT NULL,
  `fwfh` varchar(255) DEFAULT NULL,
  `fcontactno` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `meducattain` varchar(255) DEFAULT NULL,
  `memploystatus` varchar(255) DEFAULT NULL,
  `mwfh` varchar(255) DEFAULT NULL,
  `mcontactno` varchar(255) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `geducattain` varchar(255) DEFAULT NULL,
  `gemploystatus` varchar(255) DEFAULT NULL,
  `gwfh` varchar(255) DEFAULT NULL,
  `gcontactno` varchar(255) DEFAULT NULL,
  `grelationship` varchar(255) DEFAULT NULL,
  `optionlrn` varchar(255) DEFAULT NULL,
  `returning` varchar(255) DEFAULT NULL,
  `gradetoenroll` varchar(255) DEFAULT NULL,
  `lastgradecompleted` varchar(255) DEFAULT NULL,
  `lastschoolyearcompleted` varchar(255) DEFAULT NULL,
  `lastschoolattended` varchar(255) DEFAULT NULL,
  `schoolid` int(255) DEFAULT NULL,
  `schooladdress` varchar(255) DEFAULT NULL,
  `schooltype` varchar(255) DEFAULT NULL,
  `schooltoenroll` varchar(255) DEFAULT NULL,
  `schoolid2` int(255) DEFAULT NULL,
  `schooladdress2` varchar(255) DEFAULT NULL,
  `spedneeds` varchar(255) DEFAULT NULL,
  `specifyneeds` varchar(255) DEFAULT NULL,
  `specifyneeds2` varbinary(255) DEFAULT NULL,
  `assistivetech` varchar(255) DEFAULT NULL,
  `specifyassistivetech` varchar(255) DEFAULT NULL,
  `D1` varchar(255) DEFAULT NULL,
  `D2` varchar(255) DEFAULT NULL,
  `D3` varchar(255) DEFAULT NULL,
  `D4` varchar(255) DEFAULT NULL,
  `D5` varchar(255) DEFAULT NULL,
  `D6` varchar(255) DEFAULT NULL,
  `D7` varchar(255) DEFAULT NULL,
  `D8` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `psa`, `lrn`, `photo`, `lastname`, `firstname`, `middlename`, `extension`, `birthday`, `age`, `sex`, `ethnicgroup`, `mothertongue`, `religion`, `modality`, `4Ps`, `studenttype`, `street`, `barangay`, `municipality`, `province`, `region`, `fname`, `feducattain`, `femploystatus`, `fwfh`, `fcontactno`, `mname`, `meducattain`, `memploystatus`, `mwfh`, `mcontactno`, `gname`, `geducattain`, `gemploystatus`, `gwfh`, `gcontactno`, `grelationship`, `optionlrn`, `returning`, `gradetoenroll`, `lastgradecompleted`, `lastschoolyearcompleted`, `lastschoolattended`, `schoolid`, `schooladdress`, `schooltype`, `schooltoenroll`, `schoolid2`, `schooladdress2`, `spedneeds`, `specifyneeds`, `specifyneeds2`, `assistivetech`, `specifyassistivetech`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `Remarks`) VALUES
(113, '', '114581210015', 'IMG-629caf3fdb53b5.21770567.jpg', 'BALAORO', 'DRAKE KRUZER DX', 'PERDIGON', '', '2015-11-20', 6, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'Regular', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'DEXTER JERAO BALAORO', '', '', '', '', 'HELEN DETERA PERDIGON', '', '', '', '', 'HELEN DETERA PERDIGON', '', 'Self-Employed (i.e family business)', 'Yes', '09674518754', 'MOTHER', 'With LRN', 'No', '3', 'Grade 1', '2022-2023', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(114, '', '114581210016', 'IMG-6281e07e068612.65471601.jpg', 'BALISBIS', 'MIKKO', 'SATUITO', '', '2016-07-13', 5, 'Male', 'None', 'Bikol', 'Christianity', 'Online Class', 'Yes', '', '', 'MACABOG', 'SORSOGON CITY', 'SORSOGON', 'V', '', '', '', '', '', 'KAREN BALISBIS SATUITO', '', '', '', '', 'KAREN BALISBIS SATUITO', 'College Graduate', 'Self-Employed (i.e family business)', 'No', '09288121014', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(115, '', '114581210017', 'IMG-6281e1da976a84.77837041.jpg', 'BEVERA', 'DESTER', 'DADEA', '', '2015-06-20', 6, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'TALISAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'RENNIE PACO BEVERA', '', '', '', '', 'MARIBEL ESPINO DADEA', '', '', '', '', 'RENNIE PACO BEVERA', 'High School Graduate', 'Self-Employed (i.e family business)', 'Yes', '09916781546', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(116, '', '11458210018', 'IMG-6281e3ec98dfb7.32627429.jpg', 'BUENAOBRA', 'JAYRICK', 'DUHAYLONGSOD', 'JR', '2015-03-12', 7, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SAN ROQUE', 'SORSOGON CITY', 'SORSOGON', 'V', 'JAYRICK DOCTOR BUENAOBRA', '', '', '', '', 'RAQUEL ORIC DUHAYLONGSOD', '', '', '', '', 'RAQUEL ORIC DUHAYLONGSOD', 'College Graduate', 'Full Time', 'No', '09674851548', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(117, '', '115481210019', 'IMG-6281e540d3a0d1.52857637.jpg', 'DE DIOS', 'JOSE ROBERT', 'BALICANO', '', '2016-07-12', 5, 'Male', 'None', 'Tagalog', 'Christianity', 'Modular', 'No', '', '', 'TALISAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'JEROME CUYA DE DIOS', '', '', '', '', 'ROMA CECILLE JALMANZAR DE DIOS', '', '', '', '', 'JEROME CUYA DE DIOS', 'College Graduate', 'Self-Employed (i.e family business)', 'Yes', '09671547845', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(118, '', '114581210258', 'IMG-6281e689259498.52420362.jpg', 'HAMTO', 'ENRIQSON', 'FLORES', '', '2015-12-15', 6, 'Male', 'none', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON CITY', '', 'HAMTO, JONATHAN DESALISA', '', '', '', '', 'FLORES, FLORESA SABASA', '', '', '', '', 'FLORES, FLORESA SABASA', 'High School Graduate', 'Self-Employed (i.e family business)', 'No', '09023487555', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians,Elder siblings,Others(tutor, house helper)', 'basic cellphone,', 'Yes', 'own mobile data', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,existing health condition,difficulty in independent learning,', NULL),
(119, '', '114581210020', 'IMG-6281e6bf28ea75.78603096.jpg', 'DENIEGA', 'WINSLEY', 'VENSOLAN', '', '2016-10-17', 5, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'ARWIN DIONES DENIEGA', '', '', '', '', 'ANNIE AMANTE VENSOLAN', '', '', '', '', 'ANNIE AMANTE VENSOLAN', 'College Graduate', 'Full Time', 'No', '09251457645', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(120, '', '114581210021', 'IMG-6281e7d33941d8.61864783.jpg', 'DEOCAREZA', 'LERO', 'BABIERA', '', '2014-08-06', 7, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'PEDRO BERUEGA DEOCAREZA JR', '', '', '', '', 'RICHELLE ESPETERO DEOCAREZA', '', '', '', '', 'RICHELLE ESPETERO DEOCAREZA', 'College Graduate', 'Full Time', 'No', '09915784625', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', '1,,,,,,,,,,,,,', 'Extended members of the family', 'smartphone,tablet,desktop computer,laptop,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'combination of face to face with other modalities,', 'unstable internet connection,distractions (i.e. social media, noise),', NULL),
(121, '', '114581210028', 'IMG-6281e846b69153.05620403.jpg', 'LANDEZA', 'ADRIAN ACE', 'ASIADO', '', '2016-09-10', 5, 'Male', 'none', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON', '', 'LANDEZA, NOLI LEGASPI', '', '', '', '', 'ASIADO, PERLA LLADONES', '', '', '', '', 'ASIADO, PERLA LLADONES', 'High School Graduate', 'Part Time', 'Yes', '09308602045', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians,Elder siblings', 'basic cellphone,', 'Yes', 'own mobile data', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,difficulty in independent learning,', NULL),
(122, '', '114581210259', 'IMG-6281e97d3ca346.98075261.jpg', 'MACALINO', 'MIKE ARGIE', 'ERGINA', '', '2015-11-17', 6, 'Male', 'none', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON ', 'V', 'MACALINO, ARMIN HERMIDA', '', '', '', '', 'ERGINA, GINA ESCANILLA', '', '', '', '', 'ERGINA, GINA ESCANILLA', 'High School Graduate', 'Part Time', 'No', '09305746324', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians,Elder siblings', 'basic cellphone,', 'Yes', 'own mobile data', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,difficulty in independent learning,', NULL),
(123, '', '114581210029', 'IMG-6281eb29d8d0e1.87873107.jpg', 'BALISBIS', 'PRINCESS LOVELY JANE', 'ESTEVIEL', '', '2015-10-28', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON', 'V', 'BALISBIS, GERRY GUARIN', '', '', '', '', 'ESTEVIEL, ERMA BROÃ±O', '', '', '', '', 'ESTEVIEL, ERMA BROÃ±O', 'College Graduate', 'Full Time', 'No', '09302346084', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians,Elder siblings', 'basic cellphone,', 'Yes', 'own mobile data,computer shop', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,difficulty in independent learning,', NULL),
(124, '', '114581210022', 'IMG-6281eb96eefaf6.06383062.jpg', 'DULANA', 'MARTIN JAN', 'CUEVAS', '', '2016-01-23', 6, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', '', '', 'CABID-AN', 'SORSOGON CITY', 'SORSOGON', 'V', 'MARLON ESCOTE DULANA', '', '', '', '', 'CATHERINE DETERA CUEVAS', '', '', '', '', 'CATHERINE DETERA CUEVAS', 'Elementary Graduate', 'Self-Employed (i.e family business)', 'Yes', '09674587954', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', '1,,1,,,,1,,,,,,,', 'able to do independent learning', 'cable tv,smartphone,radio,', 'Yes', 'own mobile data,other places outside the home with internet connection', 'combination of face to face with other modalities,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,conflict with other activities,distractions (i.e. social media, noise),', NULL),
(125, '', '114581210030', 'IMG-6281ec9846f338.11745272.jpg', 'BANIEL', 'PRINCESS ELIZA', 'ADREATICO', '', '2015-12-02', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON', 'V', 'BANIEL, MICHAEL JOHN BACSARPA', '', '', '', '', 'ADRIATICO, EMILY FLORANO', '', '', '', '', 'BANIEL, MICHAEL JOHN BACSARPA', 'High School Graduate', 'Full Time', 'No', '09304576971', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians,Elder siblings', 'basic cellphone,', 'Yes', 'own mobile data,computer shop', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,difficulty in independent learning,conflict with other activities,distractions (i.e. social media, noise),', NULL),
(126, '', '114581210023', 'IMG-6281ede71b3d24.67789030.jpg', 'EQUIPADO', 'TRISTAN', 'JERAMOS', '', '2016-06-16', 5, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', '', '', 'SIRANGAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'LEONARDO PURA EQUIPADO', '', '', '', '', 'EDNA JANER JERAMOS', '', '', '', '', 'LEONARDO PURA EQUIPADO', 'High Sch>Oo<l Graduate', 'Self-Employed (i.e family business)', 'No', '09281548685', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCH>OO<L', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'able to do independent learning', 'cable tv,smartphone,', 'Yes', 'own mobile data,computer shop,other places outside the home with internet connection', 'combination of face to face with other modalities,', 'distractions (i.e. social media, noise),', NULL),
(127, '', '114581210335', 'IMG-6281ee0e370718.43434945.jpg', 'BARROZO', 'KEZZIAH ALEXIS', 'ROMANO', '', '2016-01-04', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Modular', 'Yes', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON', 'V', 'BARROZO,JOHN MANUEL LAGMA', '', '', '', '', 'ROMANO, KAREN BENITEZ', '', '', '', '', 'BARROZO,JOHN MANUEL LAGMA', 'High School Graduate', 'Part Time', 'Yes', '09305768432', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians,Grandparents', 'basic cellphone,', 'Yes', 'own mobile data', 'modular learning,', 'lack of available gadgets/equipment,unstable internet connection,existing health condition,distractions (i.e. social media, noise),', NULL),
(128, '', '114581210336', 'IMG-6281ef6f9fac05.99617198.jpg', 'BENTING', 'ANICKA', 'ALEXIS', '', '2016-06-17', 5, 'Female', 'none', 'Bikol', 'Christianity', 'Modular', 'Yes', '', '', 'SORSOGON CITY', 'SORSOGON CITY', 'SORSOGON', 'V', 'BENTING, BENJIE SANTILLAN', '', '', '', '', 'LASCANO, PRECIOUS DADEA', '', '', '', '', 'LASCANO, PRECIOUS DADEA', 'High School Graduate', 'Not Working', 'Yes', '09304876569', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,1,,,,2,,,,,,,', 'Parents/Guardians,Grandparents,Extended members of the family', 'basic cellphone,', 'Yes', 'computer shop', 'modular learning,', 'lack of available gadgets/equipment,unstable internet connection,difficulty in independent learning,', NULL),
(129, '', '114581150167', 'IMG-6281efb6b02742.71335755.jpg', 'ANDAYA', 'JOSHUA XIAN', 'DESULO', '', '2010-03-10', 12, 'Male', 'None', 'Bikol', 'Christianity', 'F2F', 'Yes', 'New Enrollee', '', 'PIOT', 'SORSOGON CITY', 'SORSOGON', 'V', 'LEO LAURIO ANDAYA', '', '', '', '', 'IRENE DOLOT DESULO', '', '', '', '', 'LEO LAURIO ANDAYA', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians', 'cable tv,smartphone,', 'Yes', 'other places outside the home with internet connection', 'combination of face to face with other modalities,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,difficulty in independent learning,', NULL),
(130, '', '114581210024', 'IMG-6281f0094f4158.77049533.jpg', 'FELIZARDO', 'HARRON GATES', 'JEBULAN', '', '2016-10-19', 5, 'Male', 'None', 'Tagalog', 'Christianity', 'Modular', 'No', '', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'NORWEL VERA FELIZARDO', '', '', '', '', 'SARAH MAE CREDO JEBULAN', '', '', '', '', 'SARAH MAE CREDO JEBULAN', '', '', '', '09475874556', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,1,1,1,1,,,,,1,,', 'Parents/Guardians,Elder siblings', 'cable tv,smartphone,', 'Yes', 'own mobile data,other places outside the home with internet connection', 'combination of face to face with other modalities,', 'lack of available gadgets/equipment,insufficient load/data allowance,high electrical consumption,distractions (i.e. social media, noise),', NULL),
(131, '', '114581', 'IMG-6281f1412d4947.09106251.jpg', 'FURISCAL', 'ETHAN YOSHUA', 'MIÃ‘AS', '', '2015-03-22', 7, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'TUGOS', 'SORSOGON CITY', 'SORSOGON', 'V', 'LLORANDO JARDIN FURISCAL III', '', '', '', '', 'MARIA CRISTINA MILLARE MIÃ‘AS', '', '', '', '', 'MARIA CRISTINA MILLARE MIÃ‘AS', 'College Graduate', 'Full Time', 'Yes', '09512365478', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Family-owned vehicle', '1,,,,,,,,,,,,,', 'Others(tutor, house helper),able to do independent learning', 'smartphone,tablet,laptop,', 'Yes', 'own broadband (DSL, wireless fiber, satellite)', 'online learning,modular learning,combination of face to face with other modalities,', 'conflict with other activities,distractions (i.e. social media, noise),', NULL),
(132, '', '114581210031', 'IMG-6281f23e7f33a7.57710226.jpg', 'BUENAOBRA', 'MA SOFIA', 'DUHAYLUNGSOD', '', '2016-04-04', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Flexible', 'Yes', '', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'BUENAOBRA, JAYRICK DOCTOR', '', '', '', '', 'DUHAYLUNGSOD,RAQUEL ORIC', '', '', '', '', 'DUHAYLUNGSOD,RAQUEL ORIC', 'High School Graduate', 'Unemployed due to ECQ', 'Yes', '09309152156', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,,1,,1,,1,,1,', 'Parents/Guardians,Elder siblings', 'cable tv,smartphone,', 'Yes', 'own mobile data', 'modular learning,', 'unstable internet connection,difficulty in independent learning,conflict with other activities,distractions (i.e. social media, noise),', NULL),
(133, '', '11458121oo32', 'IMG-6281f405ed0228.44741860.jpg', 'DETERA', 'RIAN JANE', 'BILAY', '', '2016-06-30', 5, 'Female', 'none', 'Bikol', 'Roman Catholic', 'Modular', 'Yes', '', '', 'SIRANGAN', 'SORSOGON CITY', 'SORSOGON', '', 'DETERA, REX CADAG', '', '', '', '', 'BILAY, MARIAN CABELLES', '', '', '', '', 'BILAY, MARIAN CABELLES', 'College Graduate', 'Part Time', 'No', '09305931443', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',1,,,,1,,,1,,,,,2', 'Parents/Guardians,Elder siblings', 'cable tv,basic cellphone,', 'Yes', 'own mobile data,computer shop', 'modular learning,', 'lack of available gadgets/equipment,difficulty in independent learning,conflict with other activities,distractions (i.e. social media, noise),', NULL),
(134, '', '114581210033', 'IMG-6281f5782edd63.75967997.jpg', 'DIAZ', 'VANILLOPE EMPRES', 'GGEPULLE', '', '2016-01-15', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Modular', 'Yes', '', '', 'SALOG', 'SORSOGON CITY', 'SORSOGON', 'V', 'DIAZ, ERICK HABULAN', '', '', '', '', 'GEPULLE CORAZON GUELAN', '', '', '', '', 'GEPULLE CORAZON GUELAN', 'College Graduate', 'Full Time', '', '09391310456', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,1,,,,1,,,1,,,1,', 'Parents/Guardians,Elder siblings', 'non-cable tv,basic cellphone,', 'Yes', 'own mobile data,computer shop', 'modular learning,', 'lack of available gadgets/equipment,insufficient load/data allowance,distractions (i.e. social media, noise),', NULL),
(135, '', '114581210333', 'IMG-6281f6cac3fe98.66590641.jpg', 'GACIS', 'JEAN ADLEN', 'ALMAZAN', '', '2016-07-20', 5, 'Male', 'None', 'Tagalog', 'Christianity', 'Modular', 'No', '', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'NORMEL PRIMO GACIS', '', '', '', '', 'JONIS VITA ALMAZAN', '', '', '', '', 'NORMEL PRIMO GACIS', 'College Graduate', 'Full Time', 'No', '09678457892', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',,,,,1,,,,,,,,', 'Elder siblings', 'smartphone,laptop,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'modular learning,combination of face to face with other modalities,', 'unstable internet connection,distractions (i.e. social media, noise),', NULL),
(136, '', '114581210034', 'IMG-6281f7898e1532.83631586.jpg', 'DIAMTULAC', 'AUDREY ROSE', 'ALTURA', '', '2015-11-18', 6, 'Female', 'none', 'Bikol', 'Christianity', 'Online Class', 'No', '', '', 'PIÃ±AFRANCIA', 'SORSOGON CITY', 'SORSOGON', '', 'DIMATULAC, ALFRED RAY SALANDANAN', '', '', '', '', 'ALTURA, ROSA RIO PEREZ', '', '', '', '', 'ALTURA, ROSA RIO PEREZ', 'College Graduate', 'Full Time', 'No', '09672345231', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,Public Commute (land/water)', ',1,,,,,,,,,,,,', 'Parents/Guardians', 'cable tv,', 'Yes', 'own mobile data', 'television,modular learning,', 'lack of available gadgets/equipment,difficulty in independent learning,distractions (i.e. social media, noise),', NULL),
(137, '', '114581210027', 'IMG-6281f7c7c5d994.63137465.jpg', 'GONZALES', 'RAMON CHRISTOPHER', 'LIM', 'JR', '2016-07-16', 5, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'MACABOG', 'SORSOGON CITY', 'SORSOGON', 'V', 'RAMON CHRISTOPHER OLIVAR GONZALES SR', '', '', '', '', 'LINA ARTA JRA LIM', '', '', '', '', 'RAMON CHRISTOPHER OLIVAR GONZALES SR', 'College Graduate', 'Self-Employed (i.e family business)', 'Yes', '03214865789', 'FATHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', ',,,,,,,,,,,,,', 'Parents/Guardians', 'smartphone,', 'Yes', 'own mobile data,computer shop', 'combination of face to face with other modalities,', 'conflict with other activities,distractions (i.e. social media, noise),', NULL),
(138, '', '114581210026', 'IMG-6281f9b434e0d0.41541307.jpg', 'GUANTERO', 'KEN ELIJAH', 'DICHOSO', '', '2016-08-24', 5, 'Male', 'None', 'Tagalog', 'Christianity', 'Modular', 'Yes', '', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'MARK KENNETH JORDAN GUANTERO', '', '', '', '', 'JONY PRINCESS BALINGIT DICHOSO', '', '', '', '', 'JONY PRINCESS BALINGIT DICHOSO', 'High School Graduate', 'Unemployed due to ECQ', 'No', '09687541845', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', ',,,,,,,,,,,,,', 'able to do independent learning', 'smartphone,', 'Yes', 'own mobile data,computer shop', 'modular learning,combination of face to face with other modalities,', 'lack of available gadgets/equipment,insufficient load/data allowance,unstable internet connection,conflict with other activities,distractions (i.e. social media, noise),', NULL),
(139, '', '114581210035', 'IMG-6281fbab601081.46186948.jpg', 'ENDAYA', 'LORAINE ALEXA BELLATRIX', 'FAJARDO', '', '2015-10-02', 6, 'Female', 'None', 'English', 'Christianity', 'Modular', 'No', '', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'LODERIC TAJON ENDAYA', '', '', '', '', 'LOVELYN GLEECY ERESTAIN FAJARDO', '', '', '', '', 'LOVELYN GLEECY ERESTAIN FAJARDO', 'High School Graduate', 'Self-Employed (i.e family business)', 'Yes', '', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', ',1,,1,,,,1,,,,,,', 'Parents/Guardians,Elder siblings', 'smartphone,laptop,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'modular learning,combination of face to face with other modalities,', 'distractions (i.e. social media, noise),', NULL),
(140, '', '114581210036', 'IMG-6281fc966f8ed8.22138846.jpg', 'HERRERA', 'CHRISTEL JANE', 'HAPIN', '', '2016-09-06', 5, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'SALOG', 'SORSOGON CITY', 'SORSOGON', 'V', 'CHRISTOPHER DOLLISON HERRERA', '', '', '', '', 'JANINE DOGILLO HAPIN', '', '', '', '', 'JANINE DOGILLO HAPIN', 'College Graduate', 'Self-Employed (i.e family business)', 'Yes', '', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', '1,,,,,,,,,,,,,', 'Parents/Guardians,able to do independent learning', 'smartphone,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'modular learning,combination of face to face with other modalities,', 'distractions (i.e. social media, noise),', NULL),
(141, '', '114581210037', 'IMG-6281fd9a7583a7.84642411.jpg', 'LIM', 'ROANNE SABINA', 'GUARDA', '', '2016-01-05', 6, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'ERNESTO EBIO LIM JR', '', '', '', '', 'JENELYN FLORANO', '', '', '', '', 'JENELYN FLORANO', 'College Graduate', 'Unemployed due to ECQ', 'Yes', '09678451265', 'MOTHER', 'With LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', '1,,,,,,,,,,,,,', 'Parents/Guardians', 'smartphone,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'modular learning,combination of face to face with other modalities,', 'distractions (i.e. social media, noise),', NULL),
(142, '', '114581150165', 'IMG-628237b26b9832.99908666.jpg', 'BONETE', 'VICTOR JIM', 'YATAN', '', '2010-07-05', 11, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'PIOT', 'SORSOGON CITY', 'SORSOGON', 'V', 'JULIUS PERALTA BONETE', '', '', '', '', 'CONCEPTION ANCHUMBRE YATAN', '', '', '', '', 'JULIUS PERALTA BONETE', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,none', 'Elder siblings', 'smartphone,', 'Yes', 'own broadband (DSL, wireless fiber, satellite)', 'online learning,', 'lack of available gadgets/equipment,', NULL),
(143, '', '109632150442', 'IMG-628238a6bcd457.30119153.jpg', 'BORJA', 'AMARU SHAKUR ', 'QUION', '', '2010-03-02', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'CABID-AN', 'SORSOGON CITY', 'SORSOGON', 'V', 'ERNESTO BORJA III', '', '', '', '', 'ANNALIZA LEGASPI QUION', '', '', '', '', 'ERNESTO BORJA III', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Parents/Guardians', 'desktop computer,', 'Yes', 'other places outside the home with internet connection', 'online learning,', 'lack of available gadgets/equipment,', NULL),
(144, '', '114581150377', 'IMG-62823945f2f399.77597924.jpg', 'CALMA', 'MARK JUSTIN', 'DESDIR', '', '2010-06-22', 11, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'CHOCO CABRERA CALMA', '', '', '', '', 'EVELYN DETECIO DESDIR JR. ', '', '', '', '', 'CHOCO CABRERA CALMA', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Parents/Guardians', 'tablet,', 'Yes', 'other places outside the home with internet connection', 'online learning,', 'insufficient load/data allowance,', NULL),
(145, '', '114581150378', 'IMG-62823a31220a60.53781489.jpg', 'CAPITO', 'NIEL RYAN', 'RICAFORT', '', '2010-01-31', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'RANILLO BORLASA CAPITO JR.', 'High School Graduate', 'Self-Employed (i.e family business)', 'Yes', '09273464437', 'ANALISA DICHOSO RICAFORT', 'High School Graduate', 'Part Time', 'Yes', '09273464437', 'ANALISA DICHOSO RICAFORT', 'High School Graduate', 'Part Time', 'Yes', '09273464437', 'COUSIN', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Extended members of the family', 'tablet,', 'Yes', 'own mobile data', 'online learning,', 'insufficient load/data allowance,', NULL),
(146, '', '114584150004', 'IMG-62823da567ae95.94692727.jpg', 'DEL ROSARIO', 'AISLE', 'DELADIA', '', '2010-03-27', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', '', 'WILFREDO REYNOSO DEL ROSARIO', '', '', '', '', 'MURIEL DOMETITA DELADIA', '', '', '', '', 'MURIEL DOMETITA DELADIA', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Elder siblings', 'non-cable tv,', 'Yes', 'other places outside the home with internet connection', 'combination of face to face with other modalities,', 'insufficient load/data allowance,', NULL),
(147, '', '114581150170', 'IMG-62823e55557e83.21310440.jpg', 'DESACULA', 'RIEL ALEN', 'MACANDOG', '', '2010-03-30', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'RANDY DULPINA DESACULA', '', '', '', '', 'ARLENE CLARIDAD MACANDOG', '', '', '', '', 'RANDY DULPINA DESACULA', '', '', '', '', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians', 'smartphone,', 'Yes', 'own broadband (DSL, wireless fiber, satellite)', 'online learning,', 'unstable internet connection,', NULL),
(148, '', '437007150170', 'IMG-62823ee32434f5.20071078.jpg', 'GABITO', 'ADRIEL KEITH', 'BALTAZAR', '', '2010-01-06', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'RUEL FUNGO GABITO', '', '', '', '', 'GRACIA LAMBAN BALTAZAR', '', '', '', '', 'GRACIA LAMBAN BALTAZAR', '', '', '', '', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Extended members of the family', 'tablet,', 'Yes', 'own mobile data', 'online learning,', 'lack of available gadgets/equipment,', NULL),
(149, '', '114581150132', 'IMG-62823f8189f0b0.06662608.jpg', 'JANABAN', 'ELMER', 'QUIDOSOY', 'JR.', '2010-01-21', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'ELMER MARIQUIT JANABAN', '', '', '', '', 'VIVIAN MAGDAONG QUIDOSOY', '', '', '', '', 'ELMER MARIQUIT JANABAN', '', '', '', '', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Family-owned vehicle', ',,,,,,,,,,,,,', 'Parents/Guardians', 'smartphone,', 'Yes', 'own mobile data', 'television,', 'unstable internet connection,', NULL),
(150, '', '437003150016', 'IMG-6282401af2ee60.31475627.jpg', 'JAZMIN', 'JHOLLY MATTHEW', 'JARABESE', '', '2009-12-12', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'RENATO ESPADILLA JAZMIN', '', '', '', '', 'ELISA LLANETA JARABESE', '', '', '', '', 'ELISA LLANETA JARABESE', '', '', '', '', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'ELMER MARIQUIT JANABAN', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians', 'non-cable tv,', 'Yes', 'own mobile data', 'television,', 'lack of available gadgets/equipment,', NULL),
(151, '', '114581150166', 'IMG-62824e1a8b0bb6.06433965.jpg', 'JETAJOBE', 'KENJAY', 'LAVADIA', '', '2010-02-14', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'TICOL', 'SORSOGON CITY', 'SORSOGON', 'V', 'JAY LASCANO JETAJOBE', '', '', '', '', 'JOSEPHINE AZUPARDO LAVADIA', '', '', '', '', 'JAY LASCANO JETAJOBE', '', '', '', '', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Elder siblings', 'cable tv,', 'Yes', 'own mobile data', 'online learning,', 'lack of available gadgets/equipment,', NULL),
(152, '', '114581150257', 'IMG-62824f9b4fd556.46760597.jpg', 'LABITAG', 'ETHAN MANUEL', 'LAVADIA', '', '2010-04-09', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'TICOL', 'SORSOGON CITY', 'SORSOGON', 'V', 'MANUEL LABAYANI LABITAG', '', '', '', '', 'JOVY PADERNAL LAVADIA', '', '', '', '', 'MANUEL LABAYANI LABITAG', '', '', '', '', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,none', 'Parents/Guardians', 'basic cellphone,', '', 'own broadband (DSL, wireless fiber, satellite)', 'television,', 'difficulty in independent learning,', NULL),
(153, '', '114581150331', 'IMG-62825058224008.31360960.jpg', 'LEGASPI', 'JON CHRISTIAN', 'BOLIMA', '', '2009-12-25', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BULABOG', 'SORSOGON CITY', 'SORSOGON', 'V', 'JOENEL LAYOSA LEGASPI', '', '', '', '', 'MARIFE BUENO BOLIMA', '', '', '', '', 'MARIFE BUENO BOLIMA', '', '', '', '', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Elder siblings', 'tablet,', 'Yes', 'own mobile data', 'television,', 'insufficient load/data allowance,', NULL),
(154, '', '114581150192', 'IMG-6282517ad3c184.20936983.jpg', 'MENDOZA', 'YOSEF VARON', 'SANCHEZ', '', '2010-03-26', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'JOSE BRIÃ±OLA MENDOZA', '', '', '', '', 'VERONICA DEUNA SANCHEZ', '', '', '', '', 'VERONICA DEUNA SANCHEZ', '', '', '', '', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Elder siblings', 'smartphone,tablet,', 'Yes', 'own mobile data', 'modular learning,', 'lack of available gadgets/equipment,unstable internet connection,', NULL),
(155, '', '114581150150', 'IMG-628251ebd5ec55.78692831.jpg', 'PADO', 'SEAN LAWRENCE', 'GO', '', '2010-06-03', 11, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'EDDIE LLANETA PADO', '', '', '', '', 'GENEVIEVE GARAY GO', '', '', '', '', 'EDDIE LLANETA PADO', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Extended members of the family', 'cable tv,', 'Yes', 'own mobile data', 'modular learning,', 'existing health condition,', NULL),
(156, '', '114581150333', 'IMG-6282531e78bbf1.01174488.jpg', 'PENETRANTE', 'ZHANDER', 'ARSENAL', '', '2010-01-18', 12, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'TUGOS', 'SORSOGON CITY', 'SORSOGON', 'V', 'NOEL RAMOS PENETRANTE', '', '', '', '', 'MARY GRACE JARABEJO ARSENAL', '', '', '', '', 'NOEL RAMOS PENETRANTE', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Grandparents', 'basic cellphone,', 'Yes', 'own mobile data', 'television,', 'insufficient load/data allowance,', NULL),
(157, '', '437006150036', 'IMG-62825404595c52.70015890.jpg', 'ROSAS', 'DEN ALGENE', 'TORRES', '', '2010-10-14', 11, 'Male', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BALOGO (SORSOGON EAST DISTRICT)', 'SORSOGON CITY', 'SORSOGON', 'V', 'DENNIS LASAY ROSAS', '', '', '', '', 'LYGRACE NOPRA TORRES', '', '', '', '', 'DENNIS LASAY ROSAS', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Grandparents', 'basic cellphone,smartphone,', 'Yes', 'own mobile data', 'online learning,', 'insufficient load/data allowance,', NULL),
(158, '', '114581150337', 'IMG-629caeacc1c7c5.67572530.jpg', 'AMOR', 'JAMAICA', 'GARRATE', '', '2009-12-18', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'Regular', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'JONATHAN DIGOL AMOR', '', '', '', '', 'MARIE KRIS FRAGO GARRATE', '', '', '', '', 'MARIE KRIS FRAGO GARRATE', '', '', '', '', '', 'With LRN', 'No', '3', 'Grade 1', '2022-2023', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(159, '', '437007150204', 'IMG-6282580ab401f5.27645470.jpg', 'BALGEMINO', 'PRINCESS HANNAH', 'FRANCISCO', '', '2010-04-03', 12, 'Female', 'None', 'Tagalog', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'EDWIN HABULAN BALGEMINO', '', '', '', '', 'ANTONNETE DINO FRANCISCO', '', '', '', '', 'EDWIN HABULAN BALGEMINO', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,School Service', ',,,,,,,,,,,,,', 'Elder siblings,Extended members of the family', 'basic cellphone,tablet,', 'Yes', 'own mobile data', 'online learning,radio,', 'lack of available gadgets/equipment,high electrical consumption,', NULL),
(160, '', '114581150363', 'IMG-628258b0085a92.60279932.jpg', 'BAYOCA', 'ROCEL ANNE', 'BUSTAMANTE', '', '2009-11-05', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'RODERICO DESTAJO BAYOCA', '', '', '', '', 'CECILIA DIESTA BUSTAMANTE', '', '', '', '', 'RODERICO DESTAJO BAYOCA', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Grandparents', 'tablet,', 'Yes', 'own mobile data', 'online learning,', 'lack of available gadgets/equipment,', NULL),
(161, '', '437003150097', 'IMG-62825afd9a9265.42461768.jpg', 'DIESTA', 'ANGELA NICOLE', 'ROMEO', '', '2010-09-24', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'RONNIE DIESTA DIAZ', '', '', '', '', 'EMMA ALVARADO ROMEO', '', '', '', '', 'RONNIE DIESTA DIAZ', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Family-owned vehicle', ',,,,,,,,,,,,,', 'Parents/Guardians', 'tablet,', 'Yes', 'other places outside the home with internet connection', 'radio,', 'insufficient load/data allowance,', NULL),
(162, '', '114581150371', 'IMG-62825bf6831626.17394468.jpg', 'DISCAYA', 'SOFIA ESTELLA', 'MARIFOSQUE', '', '2010-05-09', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'TUGOS', 'SORSOGON CITY', 'SORSOGON', 'V', 'ALBERTO DUKA DISCAYA', '', '', '', '', 'MARAVI JETAJOBE MARIFOSQUE', '', '', '', '', 'ALBERTO DUKA DISCAYA', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Family-owned vehicle,School Service', ',,,,,,,,,,,,,', 'Grandparents', 'cable tv,', 'Yes', 'own mobile data', 'online learning,', 'lack of available gadgets/equipment,existing health condition,', NULL),
(163, '', '108187140381', 'IMG-62825cf374ab89.51060276.jpg', 'EPIS', 'MARY QUENNCE', 'SEE', '', '2010-01-14', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BITAN-O/DALIPAY', 'SORSOGON CITY', 'SORSOGON', 'V', 'RONALD BALAHAN EPIS', '', '', '', '', 'RUSELA FRANCE SEE', '', '', '', '', 'RUSELA FRANCE SEE', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,1,,,,,,,,,,', 'Extended members of the family', 'basic cellphone,', 'Yes', 'own mobile data', 'television,', 'lack of available gadgets/equipment,', NULL),
(164, '', '114581150402', 'IMG-62825dc8edf632.27216642.jpg', 'FALCOTELO', 'LARA', 'FLORALDE', '', '2010-01-17', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'ARTHUR BARON FALCOTELO', '', '', '', '', 'REA ESTUARUA FLORALDE', '', '', '', '', 'ARTHUR BARON FALCOTELO', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Extended members of the family', 'tablet,', 'Yes', 'own mobile data', 'television,', 'insufficient load/data allowance,unstable internet connection,', NULL),
(165, '', '114581150070', 'IMG-62825ed56301c1.83086734.jpg', 'FERNANDEZ', 'RECHELLE', 'FUENTES', '', '2010-10-15', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'TUGOS', 'SORSOGON CITY', 'SORSOGON', 'V', 'RENN LLONA FERNANDEZ', '', '', '', '', 'MICHELLE RANCHES FUENTES', '', '', '', '', 'MICHELLE RANCHES FUENTES', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),School Service', ',,,,,,,,,,,,,', 'Parents/Guardians,Grandparents', 'non-cable tv,smartphone,', 'Yes', 'own mobile data,other places outside the home with internet connection', 'television,', 'insufficient load/data allowance,conflict with other activities,', NULL),
(166, '', '114581150105', 'IMG-628260b6a54bb0.26370695.jpg', 'FULO', 'FRANZ NICOLE', 'PURA', '', '2010-07-26', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'PIOT', 'SORSOGON CITY', 'SORSOGON', 'V', 'JOHN EVASCO FULO', '', '', '', '', 'FRANZIE LATOSA PURA', '', '', '', '', 'JOHN EVASCO FULO', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Extended members of the family', 'cable tv,', 'Yes', 'own mobile data,computer shop', 'online learning,', 'lack of available gadgets/equipment,unstable internet connection,', NULL),
(167, '', '403889150068', 'IMG-6282615f6a3481.77786994.jpg', 'GIGANTONE', 'ELISHA MAE', 'DEOCAREZA', '', '2010-07-12', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'SAN JUAN (RORO)', 'SORSOGON CITY', 'SORSOGON', 'V', 'EMMANUEL ASTILLERO GIGANTONE', '', '', '', '', 'LANE CHAVEZ ASTILLERO', '', '', '', '', 'EMMANUEL ASTILLERO GIGANTONE', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),School Service', ',,,,,,,,,,,,,', 'Parents/Guardians,Extended members of the family', 'non-cable tv,tablet,', 'Yes', 'own mobile data', 'radio,', 'lack of available gadgets/equipment,difficulty in independent learning,', NULL),
(168, '', '114581150404', 'IMG-6282623e3a1607.17924773.jpg', 'GOLEZ', 'KEILEX JANINE', 'ESTILLER', '', '2010-11-27', 11, 'Female', 'None', 'b', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'RAYMOND JESALVA GOLEZ', '', '', '', '', 'LALAINE CASTILLO ESTILLER', '', '', '', '', 'LALAINE CASTILLO ESTILLER', '', '', '', '', '', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, '114581', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking,School Service', ',,,,,,,,,,,,,', 'Parents/Guardians,Extended members of the family', 'cable tv,laptop,', 'Yes', 'own mobile data', 'online learning,modular learning,', 'lack of available gadgets/equipment,', NULL),
(169, '', '114581150372', 'IMG-628264f16c4ae3.35731774.jpg', 'JAMON', 'LOUISE REDAYNNE', 'GUANTERO', '', '2010-01-03', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'Yes', 'New Enrollee', '', 'PANGPANG', 'SORSOGON CITY', 'SORSOGON', 'V', 'REDEN QUINTERO JAMON', '', '', '', '', 'LESLIE ANN EMPLEO GUANTERO', '', '', '', '', 'REDEN QUINTERO JAMON', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, '114581', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians', 'non-cable tv,', 'Yes', 'own mobile data', 'television,', 'lack of available gadgets/equipment,unstable internet connection,', NULL),
(170, '', '114563140345', 'IMG-628265e1c7b8f2.39456749.jpg', 'JARABEJO', 'TRISHA', 'MILLARE', '', '2009-09-19', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'SALOG', 'SORSOGON CITY', 'SORSOGON', 'V', 'ELMER EBIO JARABEJO JR.', '', '', '', '', 'PAULINE RODOLFO MILLARE', '', '', '', '', 'ELMER EBIO JARABEJO JR.', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Family-owned vehicle,School Service', ',,,,,,,,,,,,,', 'Elder siblings', 'tablet,', 'Yes', 'own mobile data', 'television,', 'lack of available gadgets/equipment,', NULL);
INSERT INTO `student_tbl` (`id`, `psa`, `lrn`, `photo`, `lastname`, `firstname`, `middlename`, `extension`, `birthday`, `age`, `sex`, `ethnicgroup`, `mothertongue`, `religion`, `modality`, `4Ps`, `studenttype`, `street`, `barangay`, `municipality`, `province`, `region`, `fname`, `feducattain`, `femploystatus`, `fwfh`, `fcontactno`, `mname`, `meducattain`, `memploystatus`, `mwfh`, `mcontactno`, `gname`, `geducattain`, `gemploystatus`, `gwfh`, `gcontactno`, `grelationship`, `optionlrn`, `returning`, `gradetoenroll`, `lastgradecompleted`, `lastschoolyearcompleted`, `lastschoolattended`, `schoolid`, `schooladdress`, `schooltype`, `schooltoenroll`, `schoolid2`, `schooladdress2`, `spedneeds`, `specifyneeds`, `specifyneeds2`, `assistivetech`, `specifyassistivetech`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `Remarks`) VALUES
(171, '', '114558150027', 'IMG-628267afca78e0.55939169.jpg', 'LAROSA', 'ALLIONA ANNE', 'ESPINAS', '', '2010-06-27', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'SAMPALOC', 'SORSOGON CITY', 'SORSOGON', 'V', 'MISAEL HEBRES LAROSA', '', '', '', '', 'AUREA GINA JAYCO ESPINAS', '', '', '', '', 'MISAEL HEBRES LAROSA', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Elder siblings', 'smartphone,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'radio,', 'lack of available gadgets/equipment,high electrical consumption,', NULL),
(172, '', '114581150158', 'IMG-628268893c64c4.36768165.jpg', 'LINA ', 'KEYTHE ALLYSON', 'DIESTA', '', '2010-09-02', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'LLOYD FRANCO LINA', '', '', '', '', 'MARYLYNN DIAZ DIESTA', '', '', '', '', 'MARYLYNN DIAZ DIESTA', '', '', '', '09916131247', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, '114581', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'School Service', ',,,,,,,,,,,,,', 'Elder siblings', 'desktop computer,', 'Yes', 'own mobile data', 'modular learning,', 'insufficient load/data allowance,unstable internet connection,', NULL),
(173, '', '114581160005', 'IMG-62826933998119.26603756.jpg', 'NACION', 'HELENA ', 'BONGON', '', '2010-09-12', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'CABID-AN', 'SORSOGON CITY', 'SORSOGON', 'V', 'ANDRES BARIENTOS NACION', '', '', '', '', 'JOVY BAYOCA BONGON', '', '', '', '', 'ANDRES BARIENTOS NACION', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Elder siblings', 'basic cellphone,', 'Yes', 'own mobile data', 'television,', 'insufficient load/data allowance,conflict with other activities,', NULL),
(174, '', '114581160039', 'IMG-628269d4ee5838.71012459.jpg', 'NAKAMURA', 'KEIKO', 'NAGAHAMA', '', '2010-04-07', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'KEISUKE J. NAKAMURA', '', '', '', '', 'TA KAKO NAGAHAMA', '', '', '', '', 'KEISUKE J. NAKAMURA', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water)', ',,,,,,,,,,,,,', 'Parents/Guardians', 'non-cable tv,', 'Yes', 'own mobile data', 'television,', 'conflict with other activities,', NULL),
(175, '', '108482150363', 'IMG-62826aa2bc8840.42404262.jpg', 'ROSALES', 'DASHANTE GABRIELLE', 'ARELLANO', '', '2010-03-12', 12, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', 'DEXTER BERNARDO ROSALES', '', '', '', '', 'MARIE GRACE LABALAN ARELLANO', '', '', '', '', 'DEXTER BERNARDO ROSALES', '', '', '', '09916131247', 'FATHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians', 'basic cellphone,', 'Yes', 'own mobile data', 'online learning,', 'unstable internet connection,existing health condition,', NULL),
(178, '', '', 'IMG-6283a6de5267e2.11061932.jpg', 'DELA CRUZ', 'KYLA', 'GALICIA', '', '2010-08-23', 11, 'Female', 'None', 'Bikol', 'Christianity', 'Modular', 'No', '', '', 'BALOGO (SORSOGON EAST DISTRICT)', 'SORSOGON CITY', 'SORSOGON', 'V', 'ROBERT DELA CRUZ', 'HIGH SCHOOL GRADUATE', 'Full Time', 'No', '09273464437', 'MELISSA DELA CRUZ', 'HIGH SCHOOL GRADUATE', 'Self-Employed (i.e family business)', 'No', '09273464437', 'ROBERT DELA CRUZ', 'HIGH SCHOOL GRADUATE', 'Self-Employed (i.e family business)', 'No', '09273464437', 'FATHER', 'No LRN', 'No', '1', '', '', '', 0, '', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'Yes', 'Visual Impairmentlexia', '', 'No', '', 'Walking,Family-owned vehicle', ',,1,,,,,,,,,,,', 'Elder siblings,Grandparents', 'non-cable tv,smartphone,', 'Yes', 'own mobile data', 'television,', 'lack of available gadgets/equipment,', 'Just a test'),
(179, '', '11458112345', 'IMG-62845cf66861b7.30303229.png', 'HAYAG', 'REN', 'DOCOT', '', '2000-11-30', 21, 'Male', 'None', 'Bikol', 'Roman Catholic', 'Modular', 'No', 'New Enrollee', '', 'SIRANGAN', 'SORSOGON CITY', 'SORSOGON', 'V', '', '', '', '', '', '', '', '', '', '', 'MR. HAYAG', '', '', '', '09673880451', 'FATHER', 'With LRN', 'No', '2', 'Kinder', '2021-2022', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', '', ',,,,,,,,,,,,,', '', '', '', '', '', '', NULL),
(180, '', '114581210115', 'IMG-629b0bd3f0ba30.50897618.png', 'ALICANTE', 'ALLAN GERALD', 'MENDOZA', '', '1999-06-02', 23, 'Male', 'None', 'Tagalog', 'Iglesia Ni Cristo', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', '', 'RAY ALICANTE', 'COLLEGE GRADUATE', 'Full Time', 'No', '09273464437', 'RACHEL ALICANTE', 'HIGH SCHOOL GRADUATE', 'Not Working', 'No', '09273464437', 'RAY ALICANTE', 'COLLEGE GRADUATE', 'Full Time', 'No', '09273464437', 'FATHER', 'With LRN', 'No', '4', 'Grade 2', '2021-2022', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, '114581', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', ',,,,,,,,,,,,1,', 'Parents/Guardians,Extended members of the family', 'basic cellphone,smartphone,desktop computer,laptop,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'combination of face to face with other modalities,', 'conflict with other activities,distractions (i.e. social media, noise),', NULL),
(181, '', '114581210116', 'IMG-629f6162da7ea9.32370437.jpg', 'ALICANTE', 'ALLAN GERALD', 'MENDOZA', '', '1999-06-02', 23, 'Male', 'None', 'Tagalog', 'Iglesia Ni Cristo', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', '', '', '', '', '', '', '', '', '', '', 'TEST 1', '', 'Full Time', 'Yes', '09273464437', '', 'With LRN', 'No', '2', 'Kinder', '2023-2024', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Public Commute (land/water),Family-owned vehicle', ',,,,,,,,,,,,,', 'Parents/Guardians,Extended members of the family', 'smartphone,desktop computer,laptop,', 'Yes', 'own mobile data,own broadband (DSL, wireless fiber, satellite)', 'combination of face to face with other modalities,', 'conflict with other activities,distractions (i.e. social media, noise),', NULL),
(182, '', '778899', 'IMG-62b530570b8791.68453528.jpg', 'ALICANTE', 'ALLAN', 'MENDOZA', '', '1999-06-02', 23, 'Male', 'None', 'Tagalog', 'Iglesia Ni Cristo', 'Modular', 'No', 'New Enrollee', '', 'BIBINCAHAN', 'SORSOGON CITY', 'SORSOGON', 'V', '', '', '', '', '', '', '', '', '', '', 'RACHEL ALICANTE', 'HIGH SCHOOL GRADUATE', 'Not Working', 'No', '09273464437', 'MOTHER', 'With LRN', 'No', '7', 'Grade 5', '2020-2021', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, '114581', 'PUBLIC', 'SORSOGON PILOT ELEMENTARY SCHOOL', 114581, 'DE VERA ST, SORSOGON CITY, 4700 SORSOGON', 'No', '', '', 'No', '', 'Walking', ',,,,,,,,,,,,,', 'Parents/Guardians', 'basic cellphone,', 'Yes', 'own broadband (DSL, wireless fiber, satellite)', 'television,', 'difficulty in independent learning,', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_assigned_section_tbl`
--

CREATE TABLE `subject_assigned_section_tbl` (
  `id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `subject_teacher` int(255) DEFAULT NULL,
  `sy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_assigned_section_tbl`
--

INSERT INTO `subject_assigned_section_tbl` (`id`, `section_id`, `subject_id`, `subject_teacher`, `sy`) VALUES
(222, 14, 67, 44, '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `subject_list_tbl`
--

CREATE TABLE `subject_list_tbl` (
  `id` int(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_list_tbl`
--

INSERT INTO `subject_list_tbl` (`id`, `subject_code`, `subject_name`) VALUES
(1, 'FILIPINO', 'Filipino'),
(2, 'MATH', 'Mathematics'),
(3, 'ENGLISH', 'English'),
(4, 'SCIENCE', 'Science'),
(5, 'AP', 'Araling Panlipunan'),
(6, 'ESP', 'Edukasyon sa Pagpapakatao'),
(7, 'EPP/TLE', 'Edukasyong Pantahanan at Pangkabuhayan / Technology & Livelihood Education'),
(8, 'SSES', 'Special Science Elementary School'),
(9, 'MUSIC', 'Music'),
(10, 'ARTS', 'Arts'),
(11, 'PE', 'Physical Education'),
(12, 'HEALTH', 'Health'),
(13, 'SPJ', 'Special Program for Journalism'),
(16, 'TEST', 'Test Subject');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `id` int(255) NOT NULL,
  `subject_grade_lvl` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`id`, `subject_grade_lvl`, `subject_code`, `subject_name`) VALUES
(1, 2, 'FILIPINO-2', 'Filipino'),
(2, 2, 'MATH-2', 'Mathematics'),
(6, 1, 'MTB-1', 'Mother Tongue Based'),
(7, 1, 'FILIPINO-1', 'Filipino'),
(8, 1, 'ENGLISH-1', 'English'),
(9, 1, 'SSES-1', 'Special Science Elementary School'),
(10, 1, 'AP-1', 'Araling Panlipunan'),
(11, 1, 'MUSIC-1', 'Music'),
(12, 1, 'ARTS-1', 'Arts'),
(13, 1, 'PE-1', 'Physical Education'),
(14, 1, 'HEALTH-1', 'Health'),
(15, 1, 'ESP-1', 'Edukasyon sa Pagpapakatao'),
(16, 1, 'MATH-1', 'Mathematics'),
(17, 1, 'MTB-1', 'Mother Tongue Based'),
(18, 2, 'MTB-2', 'Mother Tongue Based'),
(19, 2, 'ENGLISH-2', 'English'),
(20, 2, 'SSES-2', 'Special Science Elementary School'),
(21, 2, 'AP-2', 'Araling Panlipunan'),
(22, 2, 'MUSIC-2', 'Music'),
(23, 2, 'ARTS-2', 'Arts'),
(24, 2, 'PE-2', 'Physical Education'),
(25, 2, 'HEALTH-2', 'Health'),
(26, 2, 'ESP-2', 'Edukasyon sa Pagpapakatao'),
(27, 3, 'MTB-3', 'Mother Tongue Based'),
(28, 3, 'FILIPINO-3', 'Filipino'),
(29, 3, 'ENGLISH-3', 'English'),
(30, 3, 'SCIENCE-3', 'Science'),
(31, 3, 'AP-3', 'Araling Panlipunan'),
(32, 3, 'MUSIC-3', 'Music'),
(33, 3, 'ARTS-3', 'Arts'),
(34, 3, 'PE-3', 'Physical Education'),
(35, 3, 'HEALTH-3', 'Health'),
(36, 3, 'ESP-3', 'Edukasyon sa Pagpapakatao'),
(37, 3, 'MATH-3', 'Mathematics'),
(38, 4, 'EPP/TLE-4', 'Edukasyong Pantahanan at Pangkabuhayan / Technology & Livelihood Education'),
(39, 4, 'FILIPINO-4', 'Filipino'),
(40, 4, 'ENGLISH-4', 'English'),
(41, 4, 'SCIENCE-4', 'Science'),
(42, 4, 'AP-4', 'Araling Panlipunan'),
(43, 4, 'MUSIC-4', 'Music'),
(44, 4, 'ARTS-4', 'Arts'),
(45, 4, 'PE-4', 'Physical Education'),
(46, 4, 'HEALTH-4', 'Health'),
(47, 4, 'ESP-4', 'Edukasyon sa Pagpapakatao'),
(48, 4, 'MATH-4', 'Mathematics'),
(49, 4, 'SPJ-4', 'Special Program for Journalism'),
(50, 5, 'TLE-5', 'Technology & Livelihood Education'),
(51, 5, 'FILIPINO-5', 'Filipino'),
(52, 5, 'ENGLISH-5', 'English'),
(53, 5, 'SCIENCE-5', 'Science'),
(54, 5, 'AP-5', 'Araling Panlipunan'),
(55, 5, 'MUSIC-5', 'Music'),
(56, 5, 'ARTS-5', 'Arts'),
(57, 5, 'PE-5', 'Physical Education'),
(58, 5, 'HEALTH-5', 'Health'),
(59, 5, 'ESP-5', 'Edukasyon sa Pagpapakatao'),
(60, 5, 'MATH-5', 'Mathematics'),
(61, 5, 'SPJ-5', 'Special Program for Journalism'),
(62, 6, 'EPP/TLE-6', 'Edukasyong Pantahanan at Pangkabuhayan / Technology & Livelihood Education'),
(63, 6, 'FILIPINO-6', 'Filipino'),
(64, 6, 'ENGLISH-6', 'English'),
(65, 6, 'SCIENCE-6', 'Science'),
(66, 6, 'AP-6', 'Araling Panlipunan'),
(67, 6, 'MATH-6', 'Mathematics'),
(68, 6, 'MUSIC-6', 'Music'),
(69, 6, 'ARTS-6', 'Arts'),
(70, 6, 'PE-6', 'Physical Education'),
(71, 6, 'HEALTH-6', 'Health'),
(72, 6, 'ESP-6', 'Edukasyon sa Pagpapakatao'),
(73, 6, 'SPJ-6', 'Special Program for Journalism'),
(80, 1, 'SPJ-1', 'Special Program for Journalism'),
(81, 2, 'SPJ-2', 'Special Program for Journalism');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gradetohandle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `contactno`, `address`, `gradetohandle`) VALUES
(1, 'ALLAN ALICANTE', '09273464437', 'Sitio Baribag, Brgy. Bibincahan, Sorsogon City', NULL),
(25, 'JENELITA D. HILOT', 'n/a', 'sorsogon city', ''),
(26, 'JOVEN AGUILAR', '09916131247', 'CCDI Main campus, Sorsogon City', ''),
(43, 'SHARLENE L. LACHICA', '09219814660', 'Sorsogon City', 'KINDER'),
(44, 'VENER JERESANO', 'N/A', 'Sorsogon City', 'GRADE 6'),
(45, 'ALUDIA L. DEUDA', 'N/A', 'sorsogon city', 'KINDER'),
(46, 'CHARLENE L. JAVIER', 'N/A', 'Sorsogon City', 'KINDER'),
(47, 'CLARISA R. JAMISOLA', 'N/A', 'Sorsogon City', 'KINDER'),
(48, 'CLARISSA MAE JEAN LABALAN', 'N/A', 'sorsogon city', 'KINDER'),
(49, 'MARILOU G. JAMORA', 'n/a', 'sorsogon city', 'KINDER'),
(50, 'AILEEN S. DE JESUS', 'n/a', 'sorsogon city', 'GRADE 1'),
(51, 'ALMA S. DIGO', 'n/a', 'sorsogon city', 'GRADE 1'),
(52, 'CAREN F. JOLLOSO', 'n/a', 'sorsogon city', 'GRADE 1'),
(53, 'EULA LIZA T. FRAYNA', 'n/a', 'sorsogon city', 'GRADE 1'),
(54, 'LIGAYA J. BAUTISTA', 'n/a', 'sorsogon city', 'GRADE 1'),
(55, 'MARIFE D. FERNANDEZ', 'n/a', 'sorsogon city', 'GRADE 1'),
(56, 'MARY ANN L. HERMIDA', 'n/a', 'Sorsogon City', 'GRADE 1'),
(57, 'MARY ANNE D. MENESES', 'n/a', 'Sorsogon City', 'GRADE 1'),
(58, 'MELISSA J. FORTES', 'n/a', 'Sorsogon City', 'GRADE 1'),
(59, 'NENETTE JINKY D. FABILA', 'n/a', 'Sorsogon City', 'GRADE 1'),
(60, 'PERLA L. LACHICA', 'n/a', 'Sorsogon City', 'GRADE 1'),
(61, 'ROSALIE L. JESORO', 'n/a', 'Sorsogon City', 'GRADE 1'),
(62, 'REN ANDY HAYAG', '09916131247', 'Sorsogon City', 'GRADE 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `role`, `status`) VALUES
(1, 'Admin', 'Admin123', 'IMG-628443c5076d98.84937233.png', 'Admin', 'Active'),
(25, 'admin2', 'admin2', 'IMG-62831a8ac87541.43890698.jpg', 'Admin', 'Active'),
(26, 'admin3', 'admin3', 'IMG-620620e4820240.08924772.jpg', 'Admin', 'Active'),
(43, 'sharlenelachica', '12345', 'IMG-62825ba2ad8934.46096088.jpg', 'Teacher', 'Active'),
(44, 'venerjeresano', '12345', 'IMG-62826b405599f4.08900603.jpg', 'Teacher', 'Active'),
(45, 'aludiadeuda', '12345', 'IMG-62825a3804b3d0.79086653.jpg', 'Teacher', 'Active'),
(46, 'charlenejavier', '12345', 'IMG-62825a5435f4b2.06381573.jpg', 'Teacher', 'Active'),
(47, 'clarisajamisola', '12345', 'IMG-62825b47216113.13685952.jpg', 'Teacher', 'Active'),
(48, 'clarissamaejeanlabalan', '12345', 'IMG-62825b6c079191.56395012.jpg', 'Teacher', 'Active'),
(49, 'mariloujamora', '12345', 'IMG-62825b828280e1.77276130.jpg', 'Teacher', 'Active'),
(50, 'aileendejesus', '12345', 'IMG-62826b7e77e628.85449086.jpg', 'Teacher', 'Active'),
(51, 'almadigo', '12345', 'IMG-62826b975878c7.03626811.jpg', 'Teacher', 'Active'),
(52, 'carenjolloso', '12345', 'IMG-62826bb82388b3.28260737.jpg', 'Teacher', 'Active'),
(53, 'eulalizafrayna', '12345', 'IMG-62826bd40ccc23.35266618.jpg', 'Teacher', 'Active'),
(54, 'ligayabautista', '12345', 'IMG-62826bec078fd6.06120378.jpg', 'Teacher', 'Active'),
(55, 'marifefernandez', '12345', 'IMG-62826c00b67378.95552193.jpg', 'Teacher', 'Active'),
(56, 'maryannhermida', '12345', 'IMG-62826c133fdee7.38153046.jpg', 'Teacher', 'Active'),
(57, 'maryannemeneses', '12345', 'IMG-62826c38f3c173.24660256.jpg', 'Teacher', 'Active'),
(58, 'melissafortes', '12345', 'IMG-6281d5816dcb87.78740675.jpg', 'Teacher', 'Active'),
(59, 'nenettejinkyfabila', '12345', 'IMG-62826c61b51da3.95423266.jpg', 'Teacher', 'Active'),
(60, 'perlalachica', '12345', 'IMG-62826cb3b97a98.30153415.jpg', 'Teacher', 'Active'),
(61, 'rosaliejesoro', '12345', 'IMG-62826cf133c8f3.80321905.jpg', 'Teacher', 'Active'),
(62, 'renandyhayag', '12345', 'IMG-629cb0317f06d2.20064294.jpg', 'Teacher', 'Active'),
(63, 'red', 'red', NULL, 'Teacher', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schoolyear_id` (`schoolyear_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `student_id` (`student_id`) USING BTREE;

--
-- Indexes for table `gradelevel_tbl`
--
ALTER TABLE `gradelevel_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pupil_account_tbl`
--
ALTER TABLE `pupil_account_tbl`
  ADD PRIMARY KEY (`pupil_id`),
  ADD KEY `pupil_lrn` (`pupil_lrn`),
  ADD KEY `teacher_id` (`pupil_id`);

--
-- Indexes for table `schoolyear_tbl`
--
ALTER TABLE `schoolyear_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SchoolYear` (`SchoolYear`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `gradelevel_id` (`gradelevel_id`);

--
-- Indexes for table `student_subject_record_tbl`
--
ALTER TABLE `student_subject_record_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_subject_record_tbl_ibfk_2` (`section_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `subject_assigned_section_tbl`
--
ALTER TABLE `subject_assigned_section_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_code` (`subject_id`),
  ADD KEY `subject_teacher` (`subject_teacher`);

--
-- Indexes for table `subject_list_tbl`
--
ALTER TABLE `subject_list_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_grade_lvl` (`subject_grade_lvl`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `gradelevel_tbl`
--
ALTER TABLE `gradelevel_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schoolyear_tbl`
--
ALTER TABLE `schoolyear_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_subject_record_tbl`
--
ALTER TABLE `student_subject_record_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1551;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `subject_assigned_section_tbl`
--
ALTER TABLE `subject_assigned_section_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `subject_list_tbl`
--
ALTER TABLE `subject_list_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD CONSTRAINT `enrollment_tbl_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_tbl_ibfk_3` FOREIGN KEY (`schoolyear_id`) REFERENCES `schoolyear_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pupil_account_tbl`
--
ALTER TABLE `pupil_account_tbl`
  ADD CONSTRAINT `pupil_account_tbl_ibfk_1` FOREIGN KEY (`pupil_id`) REFERENCES `student_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pupil_account_tbl_ibfk_2` FOREIGN KEY (`pupil_lrn`) REFERENCES `student_tbl` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD CONSTRAINT `section_tbl_ibfk_1` FOREIGN KEY (`gradelevel_id`) REFERENCES `gradelevel_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_tbl_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_assigned_section_tbl`
--
ALTER TABLE `subject_assigned_section_tbl`
  ADD CONSTRAINT `subject_assigned_section_tbl_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
