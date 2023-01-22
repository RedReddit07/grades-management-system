-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 08:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_tbl`
--

INSERT INTO `enrollment_tbl` (`id`, `student_id`, `schoolyear_id`, `section_id`, `dateofenroll`, `status`) VALUES
(1, 1, 1, 1, '2022-03-01', 'regular'),
(2, 2, 1, 1, '2022-03-01', 'regular'),
(3, 3, 1, 1, '2022-03-01', 'regular'),
(4, 4, 1, 1, '2022-03-01', 'regular'),
(5, 5, 1, 1, '2022-03-01', 'regular'),
(6, 6, 1, 1, '2022-03-01', 'regular'),
(7, 7, 1, 1, '2022-03-01', 'regular'),
(8, 8, 1, 1, '2022-03-01', 'regular'),
(9, 9, 1, 1, '2022-03-01', 'regular'),
(10, 10, 1, 1, '2022-03-01', 'regular'),
(11, 11, 1, 2, '2022-03-01', 'regular'),
(12, 12, 1, 2, '2022-03-01', 'enrolled'),
(13, 13, 1, 2, '2022-03-01', 'enrolled'),
(14, 14, 1, 2, '2022-03-01', 'enrolled'),
(15, 15, 1, 2, '2022-03-01', 'enrolled'),
(16, 16, 1, 2, '2022-03-01', 'enrolled'),
(17, 17, 1, 2, '2022-03-01', 'enrolled'),
(18, 18, 1, 2, '2022-03-01', 'enrolled'),
(19, 19, 1, 2, '2022-03-01', 'enrolled'),
(20, 20, 1, 2, '2022-03-01', 'enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel_tbl`
--

CREATE TABLE `gradelevel_tbl` (
  `id` int(255) NOT NULL,
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(255) NOT NULL,
  `pupil_id` int(255) NOT NULL,
  `pupil_lrn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupil_account_tbl`
--

INSERT INTO `pupil_account_tbl` (`id`, `pupil_id`, `pupil_lrn`, `password`, `status`) VALUES
(1, 1, '123456789001', '12345', 'Active'),
(3, 11, '123456789011', '12345', 'Active'),
(4, 0, '123456789001', '123', 'Active'),
(5, 0, '123456789001', '12345', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoolyear_tbl`
--

INSERT INTO `schoolyear_tbl` (`id`, `SchoolYear`, `SchoolHead`, `Active`, `EnrollmentStatus`) VALUES
(1, '2022-2023', 'EDGARDO BALASTA', 'Yes', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(255) NOT NULL,
  `gradelevel_id` int(255) DEFAULT NULL,
  `sectionname` varchar(255) DEFAULT NULL,
  `teacher_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `gradelevel_id`, `sectionname`, `teacher_id`) VALUES
(1, 5, 'TEMPERANCE', 2),
(2, 3, 'Apple', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_record_tbl`
--

CREATE TABLE `student_subject_record_tbl` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `1st_grade` int(255) NOT NULL DEFAULT 0,
  `1st_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `2nd_grade` int(255) NOT NULL DEFAULT 0,
  `2nd_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `3rd_grade` int(255) NOT NULL DEFAULT 0,
  `3rd_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `4th_grade` int(255) NOT NULL DEFAULT 0,
  `4th_grade_remark` varchar(255) NOT NULL DEFAULT 'No remark',
  `final_grade` int(255) NOT NULL DEFAULT 0,
  `final_grade_remark` varchar(255) NOT NULL DEFAULT 'No Final remark'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject_record_tbl`
--

INSERT INTO `student_subject_record_tbl` (`id`, `student_id`, `section_id`, `subject_id`, `1st_grade`, `1st_grade_remark`, `2nd_grade`, `2nd_grade_remark`, `3rd_grade`, `3rd_grade_remark`, `4th_grade`, `4th_grade_remark`, `final_grade`, `final_grade_remark`) VALUES
(217, 11, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(218, 12, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(219, 13, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(220, 14, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(221, 15, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(222, 16, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(223, 17, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(224, 18, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(225, 19, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(226, 20, 2, 18, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(247, 1, 1, 39, 80, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 80, 'Passed'),
(248, 2, 1, 39, 85, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 85, 'Passed'),
(249, 3, 1, 39, 86, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 86, 'Passed'),
(250, 4, 1, 39, 87, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 87, 'Passed'),
(251, 5, 1, 39, 90, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 90, 'Passed'),
(252, 6, 1, 39, 87, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 87, 'Passed'),
(253, 7, 1, 39, 76, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 76, 'Passed'),
(254, 8, 1, 39, 98, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 98, 'Passed'),
(255, 9, 1, 39, 90, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 90, 'Passed'),
(256, 10, 1, 39, 91, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 91, 'Passed'),
(257, 1, 1, 40, 87, 'Passed', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 87, 'Passed'),
(258, 2, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(259, 3, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(260, 4, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(261, 5, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(262, 6, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(263, 7, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(264, 8, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(265, 9, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(266, 10, 1, 40, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(267, 1, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(268, 2, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(269, 3, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(270, 4, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(271, 5, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(272, 6, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(273, 7, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(274, 8, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(275, 9, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(276, 10, 1, 41, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(277, 1, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(278, 2, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(279, 3, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(280, 4, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(281, 5, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(282, 6, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(283, 7, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(284, 8, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(285, 9, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(286, 10, 1, 42, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(287, 1, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(288, 2, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(289, 3, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(290, 4, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(291, 5, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(292, 6, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(293, 7, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(294, 8, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(295, 9, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed'),
(296, 10, 1, 48, 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'No remarks', 0, 'Failed');

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
  `assistivetech` varchar(255) DEFAULT NULL,
  `specifyassistivetech` varchar(255) DEFAULT NULL,
  `D1` varchar(255) DEFAULT NULL,
  `D2` varchar(255) DEFAULT NULL,
  `D3` varchar(255) DEFAULT NULL,
  `D4` varchar(255) DEFAULT NULL,
  `D5` varchar(255) DEFAULT NULL,
  `D6` varchar(255) DEFAULT NULL,
  `D7` varchar(255) DEFAULT NULL,
  `D8` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `psa`, `lrn`, `photo`, `lastname`, `firstname`, `middlename`, `extension`, `birthday`, `age`, `sex`, `ethnicgroup`, `mothertongue`, `religion`, `modality`, `4Ps`, `studenttype`, `street`, `barangay`, `municipality`, `province`, `region`, `fname`, `feducattain`, `femploystatus`, `fwfh`, `fcontactno`, `mname`, `meducattain`, `memploystatus`, `mwfh`, `mcontactno`, `gname`, `geducattain`, `gemploystatus`, `gwfh`, `gcontactno`, `grelationship`, `optionlrn`, `returning`, `gradetoenroll`, `lastgradecompleted`, `lastschoolyearcompleted`, `lastschoolattended`, `schoolid`, `schooladdress`, `schooltype`, `schooltoenroll`, `schoolid2`, `schooladdress2`, `spedneeds`, `specifyneeds`, `assistivetech`, `specifyassistivetech`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`) VALUES
(1, 'None', '123456789001', NULL, 'Agasa', 'Roque James', 'L', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'None', '123456789002', NULL, 'Ayo', 'Alonzo Rafa', 'M', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'None', '123456789003', NULL, 'Caballera', 'Noah', 'T', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'None', '123456789004', NULL, 'Deang', 'Dean Michael', 'D', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'None', '123456789005', NULL, 'Diamante', 'Lester', 'D', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'None', '123456789006', NULL, 'Andes', 'Jayna', 'A', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'None', '123456789007', NULL, 'Arrozal', 'Mary Dominique', 'L', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'None', '123456789008', NULL, 'Boletic', 'Ailen Mae', 'D', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'None', '123456789009', NULL, 'Dato', 'Samantha Shelle', 'L', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'None', '123456789010', NULL, 'Entereso', 'Mary Joy', 'D', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'None', '123456789011', NULL, 'Agasa', 'Roque James', 'L', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'None', '123456789012', NULL, 'Ayo', 'Alonzo Rafa', 'M', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'None', '123456789013', NULL, 'Caballera', 'Noah', 'T', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'None', '123456789014', NULL, 'Deang', 'Dean Michael', 'D', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'None', '123456789015', NULL, 'Diamante', 'Lester', 'D', '', '2000-12-31', 15, 'Male', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'None', '123456789016', NULL, 'Andes', 'Jayna', 'A', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'None', '123456789017', NULL, 'Arrozal', 'Mary Dominique', 'L', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'None', '123456789018', NULL, 'Boletic', 'Ailen Mae', 'D', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'None', '123456789019', NULL, 'Dato', 'Samantha Shelle', 'L', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'None', '123456789020', NULL, 'Entereso', 'Mary Joy', 'D', '', '2000-12-31', 15, 'Female', '', 'Filipino', 'Roman Catholic', '', NULL, 'Regular', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRADE 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_assigned_section_tbl`
--

CREATE TABLE `subject_assigned_section_tbl` (
  `id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `subject_teacher` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_assigned_section_tbl`
--

INSERT INTO `subject_assigned_section_tbl` (`id`, `section_id`, `subject_id`, `subject_teacher`) VALUES
(149, 2, 18, NULL),
(152, 1, 39, 3),
(153, 1, 40, 2),
(154, 1, 41, NULL),
(155, 1, 42, NULL),
(156, 1, 48, NULL);

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
(7, 'EPP', 'Edukasyong Pantahanan at Pangkabuhayan'),
(8, 'TLE', 'Technology & Livelihood Education'),
(9, 'SSES', 'Special Science Elementary School'),
(11, 'MUSIC', 'Music'),
(12, 'ARTS', 'Arts'),
(13, 'PE', 'Physical Education'),
(14, 'HEALTH', 'Health'),
(15, 'SPJ', 'Special Program for Journalism'),
(18, 'test', 'test');

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
(38, 4, 'TLE-4', 'Technology & Livelihood Education'),
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
(62, 6, 'TLE-6', 'Technology & Livelihood Education'),
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
-- Table structure for table `submission_tbl`
--

CREATE TABLE `submission_tbl` (
  `id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `submission_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission_tbl`
--

INSERT INTO `submission_tbl` (`id`, `section_id`, `teacher_id`, `submission_date`, `status`) VALUES
(5, 2, 4, '2017-06-16', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `contactno`, `address`, `gradetohandle`) VALUES
(1, 'Admin', '09273464437', 'Bibincahan, Sorsogon City', NULL),
(2, 'Vener Jeresano', '09989568415', 'Barayong, West District, Sorsogon City', 'GRADE 4'),
(3, 'Junnel Fadrilan', NULL, NULL, 'GRADE 4'),
(4, 'Judy Estoperes', '09123456783', 'Sorsogon City', 'GRADE 2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `role`, `status`) VALUES
(1, 'Admin', 'Admin', NULL, 'Admin', 'Active'),
(2, 'vener.jeresano', 'vener123', NULL, 'Teacher', 'Active'),
(3, 'junnel', 'junnel123', NULL, 'Teacher', 'Active'),
(4, 'judy123', 'judy123', NULL, 'Teacher', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`,`schoolyear_id`,`section_id`),
  ADD KEY `schoolyear_id` (`schoolyear_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `gradelevel_tbl`
--
ALTER TABLE `gradelevel_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pupil_account_tbl`
--
ALTER TABLE `pupil_account_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pupil_lrn` (`pupil_lrn`),
  ADD KEY `teacher_id` (`pupil_id`);

--
-- Indexes for table `schoolyear_tbl`
--
ALTER TABLE `schoolyear_tbl`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `submission_tbl`
--
ALTER TABLE `submission_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `teacher_id` (`teacher_id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gradelevel_tbl`
--
ALTER TABLE `gradelevel_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pupil_account_tbl`
--
ALTER TABLE `pupil_account_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schoolyear_tbl`
--
ALTER TABLE `schoolyear_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_subject_record_tbl`
--
ALTER TABLE `student_subject_record_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subject_assigned_section_tbl`
--
ALTER TABLE `subject_assigned_section_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `subject_list_tbl`
--
ALTER TABLE `subject_list_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `submission_tbl`
--
ALTER TABLE `submission_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD CONSTRAINT `enrollment_tbl_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_tbl_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_tbl_ibfk_3` FOREIGN KEY (`schoolyear_id`) REFERENCES `schoolyear_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD CONSTRAINT `section_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_tbl_ibfk_2` FOREIGN KEY (`gradelevel_id`) REFERENCES `gradelevel_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submission_tbl`
--
ALTER TABLE `submission_tbl`
  ADD CONSTRAINT `submission_tbl_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `submission_tbl_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
