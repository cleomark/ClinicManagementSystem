-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone1`
--

-- --------------------------------------------------------

---
--- TEMPORARY TABLES
---

CREATE TABLE `statuscollege` (
  `statuses1030_1`  varchar(200) NOT NULL,
  `statuses1130_2`  varchar(200) NOT NULL,
  `statuses230_3`  varchar(200) NOT NULL,
  `statuses330_4` varchar(200) NOT NULL,
  `statuses430_5`  varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `status` (
  `statuses1030_1`  varchar(200) NOT NULL,
  `statuses1130_2`  varchar(200) NOT NULL,
  `statuses230_3`  varchar(200) NOT NULL,
  `statuses330_4` varchar(200) NOT NULL,
  `statuses430_5`  varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `medicalappadmin` (
  `medicalapp_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `medical` (
  `med_id` varchar(50)  DEFAULT NULL,
  `name1` varchar(50)  DEFAULT NULL,
  `gradecourseyear1` varchar(50)  DEFAULT NULL,
  `idnumber2` varchar(50) DEFAULT NULL,
  `name2` varchar(50)  DEFAULT NULL,
  `gradecourseyear2` varchar(50) DEFAULT NULL,
  `idnumber3` varchar(50)  DEFAULT NULL,
  `sched_time` varchar(50)  DEFAULT NULL,
  `name3` varchar(50)  DEFAULT NULL,
  `gradecourseyear3` varchar(50)  DEFAULT NULL,
  `idnumber4` varchar(50)  DEFAULT NULL,
  `name4` varchar(50) DEFAULT NULL,
  `gradecourseyear4` varchar(50)  DEFAULT NULL,
  `idnumber5` varchar(50) DEFAULT NULL,
  `name5` varchar(50)  DEFAULT NULL,
  `gradecourseyear5`varchar(50)  DEFAULT NULL,
  `c_enrolled` varchar(50)  DEFAULT NULL,
  `c_employee` varchar(50)  DEFAULT NULL,
  `onoff` varchar(50)  DEFAULT NULL,
  `message` varchar(50)  DEFAULT NULL,
  `date_created` varchar(50)  DEFAULT NULL,
  `is_read` varchar(50)  DEFAULT NULL,
  `is_deleted_on_website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `role`, `password`) VALUES
(9, 'Nurse GSJHS', 'gsjhs@dwc-legazpi.edu', 1, '$2y$10$GifhpjE5vxy1N8BggO6EFuEIzoPHR8QXKBUkXO8G2HKdfzjcuBAlq'),
(10, 'Nurse SHS', 'shs@dwc-legazpi.edu', 2, '$2y$10$P2sGF1KR.EILlLMSBA.eYu7kXEPcmMxyXKI8n2Sgqd7.sesXYcVSu'),
(11, 'Nurse College', 'college@dwc-legazpi.edu', 3, '$2y$10$vgjsovnMxuz4nNvShLSKeuNSVpfsOswZ56y6yQFsO.MwH4f8BZrVC'),
(12, 'Physician GSJHSSHS', 'physiciangsjhsshs@dwc-legazpi.edu', 6, '$2y$10$/NDUtH.edNX.CfqGUzBl9.c.ares5.WtEot/xRwK8b4AOMRNt05uO'),
(13, 'Physician College', 'physiciancollege@dwc-legazpi.edu', 7, '$2y$10$.FIjfm6oWCXbv5uhGqxcy.N/vtM5UwM8./o50pf0RvH6s7fByJ8q6'),
(14, 'Dentist GSJHSSHS', 'dentistgsjhsshs@dwc-legazpi.edu', 4, '$2y$10$OOdBHtUQF38eWUVr9ZjccOlNO8g6ZmtWxkEZu3jLQyEBAipia.p3i'),
(15, 'Dentist College', 'dentistcollege@dwc-legazpi.edu', 5, '$2y$10$8xuw4mycJZ4f1sQeGiyoeOpV0aDXolN1YjXS3dv.4lqIChbF0Vm7O'),
(17, 'Nurse GSJHStwo', 'nursegsjhssecond@dwc-legazpi.edu', 1, '$2y$10$6FxYlq6rdYYc64i1Q5Ha4e9ux6jfjKahHHN5iE607s10A.wmpnG3e'),
(19, 'Nurse SHStwo', 'nurseshssecond@dwc-legazpi.edu', 2, '$2y$10$qt6WTVphhX7nfHon6O1PueliEiJVCeD9eVg3UpcAU2TCh7RGKoYs6'),
(20, 'Nurse Collegetwo', 'nursecollegesecond@dwc-legazpi.edu', 3, '$2y$10$o2c4lxPj1VbW3XNOIquS5e0kj81581y5bttDHu.rNT5Hrsjk6KXZm'),
(21, 'Dentist GSJHSSHStwo', 'dentistgsjhshssecond@dwc-legazpi.edu', 4, '$2y$10$eKa129BjyoBappoyorleb.dqyoDozFIrTwWN8ZQjwUVcYDJfTv1Gy'),
(22, 'Dentist Collegetwo', 'dentistcollegesecond@dwc-legazpi.edu', 5, '$2y$10$dMYBnpTBO.BPRspZhfkr9.Erm6dEFpWGF.Wd5chHc4ZbnXkw6zvea'),
(23, 'Physician GSJHSSHStwo', 'physiciangsjshsshssecond@dwc-legazpi.edu', 6, '$2y$10$j91tQSUnrTImksezyXTijuTdX8vCYoD/fQKOQsCIGW6taJPeA6t4K'),
(24, 'Physician Collegetwo', 'physiciancollegesecond@dwc-legazpi.edu', 7, '$2y$10$lFyYL1OGHGO9TVeyxZEUnefNM0WTcFhOPngpzcSjW2G1TfkbgvBRW');

-- --------------------------------------------------------

--
-- Table structure for table `consultationformrecord`
--

CREATE TABLE `consultationformrecord` (
  `consultform_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `date` date NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(20) NOT NULL,
  `chiefcomplaint` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultationformrecord`
--

INSERT INTO `consultationformrecord` (`consultform_id`, `admin_id`, `idnumber`, `date`, `fullname`, `gradesection`, `chiefcomplaint`, `status`) VALUES
(8, 19, 6802182, '2023-09-13', 'Joanna Mae D. Atento', 'Grade 12 Punto', 'Headache', 'rest');

-- --------------------------------------------------------

--
-- Table structure for table `consultationformrecordcollege`
--

CREATE TABLE `consultationformrecordcollege` (
  `consultform_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `date` date NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(20) NOT NULL,
  `chiefcomplaint` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultationformrecordcollege`
--

INSERT INTO `consultationformrecordcollege` (`consultform_id`, `admin_id`, `idnumber`, `date`, `fullname`, `gradesection`, `chiefcomplaint`, `status`) VALUES
(10, 11, 3, '2023-09-07', 'User College', 'BSIT - 4', 'Headache', 'sent to home'),
(11, 20, 3, '2023-09-08', 'User College', 'BSIT - 4', 'Headache', 'sent to home');

-- --------------------------------------------------------

--
-- Table structure for table `dentalapp`
--

CREATE TABLE `dentalapp` (
  `dentalapp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `service` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `sched_time` varchar(50) NOT NULL,
  `gradecourseyear` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalapp`
--

INSERT INTO `dentalapp` (`dentalapp_id`, `user_id`, `idnumber`, `fullname`, `service`, `phoneno`, `date_time`, `sched_time`, `gradecourseyear`, `role`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(65, 99, 6802182, 'Joanna Mae D. Atento', 'Tooth Extraction', '+639156005165', '2023-09-06 12:00 AM', '10:00 AM', 'Grade 9', 'Student in GS/JHS', '2023-09-03 20:59:23', 1, 1, 'Unavailable'),
(66, 99, 6802182, 'Joanna Mae D. Atento', 'Cleaning', '+639156005189', '2023-09-05 12:00 AM', '10:30 AM', 'Grade 9', 'Student in GS/JHS', '2023-09-03 21:54:51', 0, 1, 'Unavailable'),
(68, 102, 6802182, 'Joanna Mae D. Atento', 'Cleaning', '+639156005165', '2023-09-07', '11:00 A.M', 'Grade 12', 'Student in SHS', '2023-09-04 22:03:04', 0, 1, 'Unavailable'),
(69, 103, 1, 'User GSJHS', 'Cleaning', '+639244586467', '2023-09-15', '10:00 A.M', 'Grade 9', 'Student in GS/JHS', '2023-09-04 22:32:25', 0, 1, 'Unavailable'),
(70, 103, 1, 'User GSJHS', 'Cleaning', '+639234576953', '2023-09-22', '11:00 A.M', '', 'Employee in GS/JHS', '2023-09-04 22:41:49', 1, 1, 'Unavailable'),
(71, 104, 2, 'User SHS', 'Cleaning', '+639683456785', '2023-10-13', '11:00 A.M', 'Grade 12', 'Student in SHS', '2023-09-04 22:56:54', 0, 1, 'Unavailable'),
(72, 104, 2, 'User SHS', 'Cleaning', '+639637077358', '2023-09-08', '11:00 A.M', 'Grade 12', 'Student in SHS', '2023-09-07 16:15:05', 0, 1, 'Unavailable'),
(73, 104, 2, 'User SHS', 'Cleaning', '+639345678765', '2023-09-28', '10:00 A.M', 'Grade 12', 'Student in SHS', '2023-09-08 19:03:51', 0, 1, 'Unavailable'),
(74, 104, 2, 'User SHS', 'Cleaning', '+639156005165', '2023-09-29', '10:00 A.M', 'Employee', 'Employee in SHS', '2023-09-11 18:48:28', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `dentalappcollege`
--

CREATE TABLE `dentalappcollege` (
  `dentalapp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `service` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `sched_time` varchar(50) NOT NULL,
  `gradecourseyear` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentalappcollege`
--

INSERT INTO `dentalappcollege` (`dentalapp_id`, `user_id`, `idnumber`, `fullname`, `service`, `phoneno`, `date_time`, `sched_time`, `gradecourseyear`, `role`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(75, 105, 3, 'User College', 'Tooth Extraction', '+639345657687', '2023-09-06 12:00 AM', '08:00 AM', 'BSIT - 2', 'Student in College', '2023-09-05 23:07:56', 1, 1, 'Unavailable'),
(76, 105, 3, 'User College', 'Cleaning', '+639234546578', '2023-09-05', '11:00 A.M', 'BSIT - 3', 'Employee in College', '2023-09-05 23:09:25', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformcollege`
--

CREATE TABLE `healthrecordformcollege` (
  `healthcollege_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pcontact` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `fguardian` varchar(100) NOT NULL,
  `occupation1` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `occupation2` varchar(100) NOT NULL,
  `contactemer` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `contactno2` varchar(100) NOT NULL,
  `physiciannumcall` varchar(100) NOT NULL,
  `addresshospital` varchar(100) NOT NULL,
  `td` varchar(100) NOT NULL,
  `mmr` varchar(100) NOT NULL,
  `hepab` varchar(100) NOT NULL,
  `varicella` varchar(100) NOT NULL,
  `yesasthma` varchar(100) NOT NULL,
  `noasthma` varchar(100) NOT NULL,
  `relationasthma` text NOT NULL,
  `yesbleeding` varchar(100) NOT NULL,
  `nobleeding` varchar(100) NOT NULL,
  `relationbleeding` varchar(100) NOT NULL,
  `yescancer` varchar(100) NOT NULL,
  `nocancer` varchar(100) NOT NULL,
  `relationcancer` varchar(100) NOT NULL,
  `yesdiabetes` varchar(100) NOT NULL,
  `nodiabetes` varchar(100) NOT NULL,
  `relationdiabetes` varchar(100) NOT NULL,
  `yesheartdis` varchar(100) NOT NULL,
  `noheartdis` varchar(100) NOT NULL,
  `relationheartdis` varchar(100) NOT NULL,
  `yesbp` varchar(100) NOT NULL,
  `nobp` varchar(100) NOT NULL,
  `relationbp` varchar(100) NOT NULL,
  `yeskidney` varchar(100) NOT NULL,
  `nokidney` varchar(100) NOT NULL,
  `relationkidney` varchar(100) NOT NULL,
  `yesmental` varchar(100) NOT NULL,
  `nomental` varchar(100) NOT NULL,
  `relationmental` varchar(100) NOT NULL,
  `yesobese` varchar(100) NOT NULL,
  `noobese` varchar(100) NOT NULL,
  `relationobese` varchar(100) NOT NULL,
  `yesseizure` varchar(100) NOT NULL,
  `noseizure` varchar(100) NOT NULL,
  `relationseizure` varchar(100) NOT NULL,
  `yesstroke` varchar(100) NOT NULL,
  `nostroke` varchar(100) NOT NULL,
  `relationstroke` varchar(100) NOT NULL,
  `yestb` varchar(100) NOT NULL,
  `notb` varchar(100) NOT NULL,
  `relationtb` varchar(100) NOT NULL,
  `allergy` varchar(100) NOT NULL,
  `anemia` varchar(100) NOT NULL,
  `asthma` varchar(100) NOT NULL,
  `behavioral` varchar(100) NOT NULL,
  `bleedingprob` varchar(100) NOT NULL,
  `blood` varchar(100) NOT NULL,
  `chickenpox` varchar(100) NOT NULL,
  `convulsion` varchar(100) NOT NULL,
  `dengue` varchar(100) NOT NULL,
  `diabetess` varchar(100) NOT NULL,
  `earproblem` varchar(100) NOT NULL,
  `eating_disorder` varchar(100) NOT NULL,
  `epilepsy` varchar(100) NOT NULL,
  `eyeproblemm` varchar(100) NOT NULL,
  `fracture` varchar(100) NOT NULL,
  `hearing_problem` varchar(100) NOT NULL,
  `heart_disorder` varchar(100) NOT NULL,
  `hyperacidity` varchar(100) NOT NULL,
  `indigestion` varchar(100) NOT NULL,
  `insomia` varchar(100) NOT NULL,
  `kidney_problem` varchar(100) NOT NULL,
  `liver_problem` varchar(100) NOT NULL,
  `measless` varchar(100) NOT NULL,
  `mumpss` varchar(100) NOT NULL,
  `parasitism` varchar(100) NOT NULL,
  `pneumonia` varchar(100) NOT NULL,
  `primary_complex` varchar(100) NOT NULL,
  `scoliosis` varchar(100) NOT NULL,
  `skin_problem` varchar(100) NOT NULL,
  `tonsillitis` varchar(100) NOT NULL,
  `typhoid_fever` varchar(100) NOT NULL,
  `vision_defect` varchar(100) NOT NULL,
  `yeshospitalization` varchar(100) NOT NULL,
  `nohospitalization` varchar(100) NOT NULL,
  `yessurgical` varchar(100) NOT NULL,
  `nosurgical` varchar(100) NOT NULL,
  `specialmed` varchar(100) NOT NULL,
  `allergicdrugs` varchar(100) NOT NULL,
  `otherrelevant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformcollege`
--

INSERT INTO `healthrecordformcollege` (`healthcollege_id`, `user_id`, `image`, `idnumber`, `fullname`, `gender`, `address`, `pcontact`, `nationality`, `birthday`, `religion`, `fguardian`, `occupation1`, `mother`, `occupation2`, `contactemer`, `contactno`, `relation`, `referral`, `contactno2`, `physiciannumcall`, `addresshospital`, `td`, `mmr`, `hepab`, `varicella`, `yesasthma`, `noasthma`, `relationasthma`, `yesbleeding`, `nobleeding`, `relationbleeding`, `yescancer`, `nocancer`, `relationcancer`, `yesdiabetes`, `nodiabetes`, `relationdiabetes`, `yesheartdis`, `noheartdis`, `relationheartdis`, `yesbp`, `nobp`, `relationbp`, `yeskidney`, `nokidney`, `relationkidney`, `yesmental`, `nomental`, `relationmental`, `yesobese`, `noobese`, `relationobese`, `yesseizure`, `noseizure`, `relationseizure`, `yesstroke`, `nostroke`, `relationstroke`, `yestb`, `notb`, `relationtb`, `allergy`, `anemia`, `asthma`, `behavioral`, `bleedingprob`, `blood`, `chickenpox`, `convulsion`, `dengue`, `diabetess`, `earproblem`, `eating_disorder`, `epilepsy`, `eyeproblemm`, `fracture`, `hearing_problem`, `heart_disorder`, `hyperacidity`, `indigestion`, `insomia`, `kidney_problem`, `liver_problem`, `measless`, `mumpss`, `parasitism`, `pneumonia`, `primary_complex`, `scoliosis`, `skin_problem`, `tonsillitis`, `typhoid_fever`, `vision_defect`, `yeshospitalization`, `nohospitalization`, `yessurgical`, `nosurgical`, `specialmed`, `allergicdrugs`, `otherrelevant`) VALUES
(11, 105, 'lll.jpg', 3, 'User College', 'Female', 'Guinobatan Albay', '+639156005165', 'Filipino', '2001-12-15', 'Roman Catholic', 'hfgfhjk', 'dfghj', 'sthy', 'sdfghj', 'dgfhgjhkj', '+639235467653', 'ghjhskjdfgh', 'sdfghj', '+639124565787', 'dsfgthjyk', 'dfghjede', 'dfghj', 'cfgfhg', 'dfgfh', 'dsfgh', '', 'noasthma', '', '', 'nobleeding', '', '', 'nocancer', '', '', 'nodiabetes', '', '', 'noheartdis', '', '', 'nobp', '', '', 'nokidney', '', '', 'nomental', '', '', 'noobese', '', '', 'noseizure', '', '', 'nostroke', '', '', 'notb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nohospitalization', '', 'nosurgical', 'dfghjk', 'dcfgh', 'dfghj');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformgsjhs`
--

CREATE TABLE `healthrecordformgsjhs` (
  `healthnogsjhs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `birthday` varchar(200) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `cfather` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `cmother` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `bothparents` varchar(255) NOT NULL,
  `livesfather` varchar(255) NOT NULL,
  `livesmother` varchar(255) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `guardianname` varchar(255) NOT NULL,
  `guardianrelation` varchar(255) NOT NULL,
  `cguardian` varchar(255) NOT NULL,
  `bcg` varchar(50) NOT NULL,
  `dpt` varchar(50) NOT NULL,
  `opv` varchar(50) NOT NULL,
  `hepa` varchar(50) NOT NULL,
  `measles` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `firstdose` varchar(50) NOT NULL,
  `seconddose` varchar(50) NOT NULL,
  `boosterdose` varchar(50) NOT NULL,
  `no` varchar(50) NOT NULL,
  `imagevac` varchar(200) NOT NULL,
  `asthma` varchar(50) NOT NULL,
  `faintingspells` varchar(50) NOT NULL,
  `allergicrhinitis` varchar(50) NOT NULL,
  `freqheadache` varchar(50) NOT NULL,
  `anxietydis` varchar(50) NOT NULL,
  `g6pd` varchar(50) NOT NULL,
  `bleedingclotting` varchar(50) NOT NULL,
  `hearingprob` varchar(50) NOT NULL,
  `hypergas` varchar(50) NOT NULL,
  `derma` varchar(50) NOT NULL,
  `hypertension` varchar(50) NOT NULL,
  `diabetes` varchar(50) NOT NULL,
  `hyperventilation` varchar(50) NOT NULL,
  `mens` varchar(50) NOT NULL,
  `othersmedical` varchar(50) NOT NULL,
  `yesheartcon` varchar(200) NOT NULL,
  `noheartcon` varchar(200) NOT NULL,
  `heartcon` text NOT NULL,
  `yeseyeprob` varchar(200) NOT NULL,
  `noeyeprob` varchar(200) NOT NULL,
  `eyeprob` text NOT NULL,
  `yesseriousillnes` varchar(200) NOT NULL,
  `noseriousillnes` varchar(200) NOT NULL,
  `seriousillnes` text NOT NULL,
  `yessurgeries` varchar(200) NOT NULL,
  `nosurgeries` varchar(200) NOT NULL,
  `surgeries` text NOT NULL,
  `yesreceive` varchar(200) NOT NULL,
  `noreceive` varchar(200) NOT NULL,
  `receive` text NOT NULL,
  `yesallergiesmed` varchar(200) NOT NULL,
  `noallergiesmed` varchar(200) NOT NULL,
  `allergiesmed` text NOT NULL,
  `yesallergiesfood` varchar(200) NOT NULL,
  `noallergiesfood` varchar(200) NOT NULL,
  `allergiesfood` text NOT NULL,
  `yesfirstaid` varchar(200) NOT NULL,
  `nofirstaid` varchar(200) NOT NULL,
  `yesconcerns` varchar(200) NOT NULL,
  `noconcerns` varchar(200) NOT NULL,
  `concerns` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformgsjhs`
--

INSERT INTO `healthrecordformgsjhs` (`healthnogsjhs_id`, `user_id`, `image`, `fullname`, `idnumber`, `cp`, `birthday`, `gender`, `address`, `paddress`, `father`, `cfather`, `mother`, `cmother`, `religion`, `nationality`, `language`, `bothparents`, `livesfather`, `livesmother`, `guardian`, `guardianname`, `guardianrelation`, `cguardian`, `bcg`, `dpt`, `opv`, `hepa`, `measles`, `others`, `firstdose`, `seconddose`, `boosterdose`, `no`, `imagevac`, `asthma`, `faintingspells`, `allergicrhinitis`, `freqheadache`, `anxietydis`, `g6pd`, `bleedingclotting`, `hearingprob`, `hypergas`, `derma`, `hypertension`, `diabetes`, `hyperventilation`, `mens`, `othersmedical`, `yesheartcon`, `noheartcon`, `heartcon`, `yeseyeprob`, `noeyeprob`, `eyeprob`, `yesseriousillnes`, `noseriousillnes`, `seriousillnes`, `yessurgeries`, `nosurgeries`, `surgeries`, `yesreceive`, `noreceive`, `receive`, `yesallergiesmed`, `noallergiesmed`, `allergiesmed`, `yesallergiesfood`, `noallergiesfood`, `allergiesfood`, `yesfirstaid`, `nofirstaid`, `yesconcerns`, `noconcerns`, `concerns`) VALUES
(41, 103, '2435550 (1).webp', 'User GSJHS', 1, '+639156003446', '2002-12-13', 'Female', 'Legazpi City', 'Legazpi City', 'fhghk', '+639147564579', 'cdvdgfh', '+639156780764', 'Roman Catholic', 'Filipino', 'Bicol, Tagalog, English', '', '', '', 'guardian', 'DFGJH', 'FGHFGHF', '+639156005165', '', '', '', '', 'measles', 'DFGHJG', '', 'seconddose', '', '', '2435550.webp', 'asthma', '', '', '', 'anxietydis', '', '', 'hearingprob', '', '', '', '', '', '', 'HFJGH', '', 'noheartcon', '', '', 'noeyeprob', '', '', 'noseriousillnes', '', '', 'nosurgeries', '', '', 'noreceive', '', '', 'noallergiesmed', '', '', 'noallergiesfood', '', '', 'nofirstaid', '', 'noconcerns', '');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordformshs`
--

CREATE TABLE `healthrecordformshs` (
  `healthshs_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `birthday` varchar(200) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `cfather` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `cmother` varchar(255) NOT NULL,
  `polio` varchar(100) NOT NULL,
  `tetanus` varchar(100) NOT NULL,
  `chickenpox` varchar(100) NOT NULL,
  `measles` varchar(100) NOT NULL,
  `mumps` varchar(100) NOT NULL,
  `tb` varchar(100) NOT NULL,
  `asthma` varchar(100) NOT NULL,
  `hepatitis` varchar(100) NOT NULL,
  `faintingspells` varchar(255) NOT NULL,
  `seizure` varchar(255) NOT NULL,
  `bleeding` varchar(255) NOT NULL,
  `eyedis` varchar(255) NOT NULL,
  `heartailment` varchar(255) NOT NULL,
  `otherillness` varchar(255) NOT NULL,
  `yesfood` varchar(50) NOT NULL,
  `nofood` varchar(50) NOT NULL,
  `food` text NOT NULL,
  `yesmed` varchar(50) NOT NULL,
  `nomed` varchar(255) NOT NULL,
  `med` text NOT NULL,
  `allow` varchar(255) NOT NULL,
  `notallow` varchar(255) NOT NULL,
  `yesmedication` varchar(50) NOT NULL,
  `nomedication` varchar(50) NOT NULL,
  `medication` varchar(200) NOT NULL,
  `notified` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordformshs`
--

INSERT INTO `healthrecordformshs` (`healthshs_id`, `user_id`, `image`, `fullname`, `idnumber`, `birthday`, `phoneno`, `gender`, `address`, `paddress`, `father`, `cfather`, `mother`, `cmother`, `polio`, `tetanus`, `chickenpox`, `measles`, `mumps`, `tb`, `asthma`, `hepatitis`, `faintingspells`, `seizure`, `bleeding`, `eyedis`, `heartailment`, `otherillness`, `yesfood`, `nofood`, `food`, `yesmed`, `nomed`, `med`, `allow`, `notallow`, `yesmedication`, `nomedication`, `medication`, `notified`, `contact`, `relationship`) VALUES
(11, 102, 'me.jpg', 'Joanna Mae D. Atento', 6802182, '2001-12-15', '+639156005165', 'Female', 'Calzada Guinobatan Albay', 'Calzada Guinobatan Albay', 'Jojo Atento', '+639156005165', 'Rowena Atento', '+639156005165', '', '', '', '', '', '', '', '', '', '', '', 'eyedis', 'None', 'None', '', 'nofood', '', '', 'nomed', '', 'allow', '', '', 'nomedication', '', 'Edita Dela Cruz', '+639156005164', 'Grandmother'),
(12, 104, '283741276_5166965043394480_8080625479499483191_n.png', 'User SHS', 2, '2001-12-15', '+639456787978', 'Female', 'Legazpi City', 'Legazpi City', 'fghjkjyhtre', '+639345678756', 'Rowena Atento', '+639235467898', '', 'tetanus', '', '', '', '', '', '', 'faintingspells', '', '', 'eyedis', 'fghjuyyt', 'fghjuyyt', '', 'nofood', '', '', 'nomed', '', '', 'notallow', '', 'nomedication', '', 'fghjk', '+639345678975', 'TYUIYUYTTERE');

-- --------------------------------------------------------

--
-- Table structure for table `medicalapp`
--

CREATE TABLE `medicalapp` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Dumping data for table `medicalapp`
--

INSERT INTO `medicalapp` (`medicalapp_id`, `user_id`, `idnumber`, `name1`, `gradecourseyear1`, `phoneno`, `date_time`, `sched_time`, `role`, `onoff`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(177, 103, 1, 'User GSJHS', 'Grade 9', '+639567899756', '2023-09-26 12:00 AM', '03:00 PM', 'Employee in GS/JHS', 'Off-campus Activity', '2023-09-04 22:42:34', 1, 1, 'Unavailable'),
(178, 103, 1, 'User GSJHS', 'Grade 7', '+639155786774', '2023-09-29', '10:00 A.M', 'Student in GS/JHS', 'On-campus Activity', '2023-09-05 12:30:04', 0, 1, 'Unavailable'),
(179, 99, 6802182, 'Joanna Mae D. Atento', 'Grade 1', '+639156005169', '2023-09-27', '04:00 P.M', 'Student in GS/JHS', 'On-campus Activity', '2023-09-05 12:35:41', 1, 1, 'Unavailable'),
(180, 103, 1, 'User GSJHS', 'Grade 10', '+639234567586', '2023-09-01', '10:00 A.M', 'Student in GS/JHS', 'On-campus Activity', '2023-09-05 12:53:35', 1, 1, 'Unavailable'),
(181, 99, 6802182, 'Joanna Mae D. Atento', 'Grade 7', '+639234567568', '2023-09-15', '11:00 A.M', 'Student in GS/JHS', 'On-campus Activity', '2023-09-05 12:54:34', 1, 1, 'Unavailable'),
(182, 103, 1, 'User GSJHS', 'Grade 9', '+639637077358', '2023-09-13 12:00 AM', '08:00 AM', 'Student in GS/JHS', 'On-campus Activity', '2023-09-07 16:18:10', 0, 1, 'Unavailable'),
(183, 103, 1, 'User GSJHS', 'Grade 7', '+639156005165', '2023-09-11', '10:00 A.M', 'Student in GS/JHS', 'Off-campus Activity', '2023-09-09 10:55:57', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `medicalappcollege`
--

CREATE TABLE `medicalappcollege` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalappcollege`
--

INSERT INTO `medicalappcollege` (`medicalapp_id`, `user_id`, `idnumber`, `name1`, `gradecourseyear1`, `phoneno`, `date_time`, `sched_time`, `role`, `onoff`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(3, 105, 3, 'User College', 'BSIT - 3', '+639156005165', '2023-09-14', '10:00 A.M', 'Student in College', 'On-campus Activity', '2023-09-05 11:01:29', 0, 1, 'Unavailable'),
(4, 105, 3, 'User College', 'Employee', '+639156005169', '2023-09-06', '09:00 A.M', 'Employee in College', 'Off-campus Activity', '2023-09-05 11:03:05', 1, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `medicalappshs`
--

CREATE TABLE `medicalappshs` (
  `medicalapp_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `gradecourseyear1` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `onoff` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalappshs`
--

INSERT INTO `medicalappshs` (`medicalapp_id`, `user_id`, `idnumber`, `name1`, `gradecourseyear1`, `phoneno`, `date_time`, `sched_time`, `role`, `onoff`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(1, 102, 6802182, 'Joanna Mae D. Atento', 'Grade 12', '+639156005165', '2023-09-12 12:00 AM', '09:00 AM', 'Student in SHS', 'On-campus Activity', '2023-09-04 17:04:37', 1, 1, 'Unavailable'),
(2, 104, 2, 'User SHS', 'Grade 11', '+639345678976', '2023-09-29', '04:00 P.M', 'Student in SHS', 'On-campus Activity', '2023-09-04 22:57:44', 0, 1, 'Unavailable'),
(3, 104, 2, 'User SHS', 'Grade 12', '+639637077358', '2023-09-08 12:00 AM', '02:00 PM', 'Student in SHS', 'On-campus Activity', '2023-09-07 16:16:29', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `role` int(50) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `role`, `medicine_name`, `quantity`, `date_created`) VALUES
(35, 3, 'Paracetamol', '4', '2023-09-05'),
(36, 3, 'Bioflu', '6', '2023-09-05'),
(37, 1, 'Advil', '4', '2023-09-05'),
(38, 1, 'Buscopan', '6', '2023-09-05'),
(39, 2, 'Amoxicilin', '4', '2023-09-05'),
(40, 3, 'Bioflu', '10', '2023-09-07'),
(41, 2, 'Bioflu', '2', '2023-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `nursenotesshs`
--

CREATE TABLE `nursenotesshs` (
  `nurse_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `vitalsigns` varchar(200) NOT NULL,
  `nursenotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nursenotesshs`
--

INSERT INTO `nursenotesshs` (`nurse_id`, `admin_id`, `idnumber`, `fullname`, `gradesection`, `datetime`, `vitalsigns`, `nursenotes`) VALUES
(8, 10, 2, 'User SHS', 'Grade 12 Punto', '2023-09-08 10:30 AM', '70/100', 'rest');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

CREATE TABLE `patientrecord` (
  `p_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `vitalsigns` varchar(200) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientrecord`
--

INSERT INTO `patientrecord` (`p_id`, `admin_id`, `idnumber`, `fullname`, `gradesection`, `vitalsigns`, `diagnosis`, `status`, `date_time`) VALUES
(28, 9, 6802182, 'Joanna Mae Atento', 'Grade 8', '70/100', 'Cramps', 'Rest at home', '2023-09-08 07:24 PM'),
(29, 9, 1, 'User GSJHS', 'Grade 7 Saint', '90/100', 'Cold', 'rest at clinic', '2023-09-08 07:25 PM'),
(30, 17, 6802182, 'Joanna Mae D. Atento', 'Grade 8', '70/100', 'Cramps', 'rest', '2023-09-11 01:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `physicalexaminationgsjhs`
--

CREATE TABLE `physicalexaminationgsjhs` (
  `pe_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `levelsection` varchar(200) NOT NULL,
  `pastsurgeries` varchar(200) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `familyhistory` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `pr` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `bmi` varchar(200) NOT NULL,
  `heent` varchar(200) NOT NULL,
  `cvs` varchar(200) NOT NULL,
  `gis` varchar(200) NOT NULL,
  `gus` varchar(200) NOT NULL,
  `extremities` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `medicalexaminer` varchar(200) NOT NULL,
  `dateexamined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicalexaminationgsjhs`
--

INSERT INTO `physicalexaminationgsjhs` (`pe_id`, `admin_id`, `idnumber`, `fullname`, `age`, `sex`, `levelsection`, `pastsurgeries`, `allergies`, `familyhistory`, `bp`, `pr`, `height`, `weight`, `bmi`, `heent`, `cvs`, `gis`, `gus`, `extremities`, `remarks`, `medicalexaminer`, `dateexamined`) VALUES
(1, 12, 6802182, 'Atento, Joanna Mae D', '16', 'Female', 'Grade 7 - St. Martha', 'None', 'None', 'Diabetes', '70/90', '70', '150', '42', 'Normal', 'idk', 'idk', 'idk', 'idk', 'idk', 'good', 'Andrew Robles', '2023-07-13'),
(2, 12, 99090, 'Rica Chan', '10', 'Female', 'Grade 7 - St. Martha', 'None', 'None', 'None', '80/90', '80', '155', '44', 'Normal', 'IDK', 'IDK', 'IDK', 'IDK', 'IDK', 'good', 'Andrew Robles', '2023-07-19'),
(3, 12, 6802182, 'Joanna Mae Atento', '16', 'Female', 'Grade 7 - St. Martha', 'None', 'None', 'None', '70/90', '30', '150', '50', 'Normal', 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', 'good', 'Andrew Robles', '2023-07-27'),
(4, 23, 1, 'User GSJHS', '14', 'Female', 'Grade 7 - St. Martha', 'None', 'None', 'None', '70/100', '70', '150', '45', 'Normal', 'DHFBGNJHMJ', 'ASDFGHJK', 'DFGHJ', 'ASGTHYJT', 'FGHJH', 'FGHJ', 'FRGTYU', '2023-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `physicalexaminationshs`
--

CREATE TABLE `physicalexaminationshs` (
  `peshs_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `pastsurgeries` varchar(200) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `familyhistory` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `pr` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `heent` varchar(200) NOT NULL,
  `cvs` varchar(200) NOT NULL,
  `gis` varchar(200) NOT NULL,
  `gus` varchar(200) NOT NULL,
  `skin` varchar(200) NOT NULL,
  `musculoskeletal` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `medicalexaminer` varchar(200) NOT NULL,
  `dateexamined` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicalexaminationshs`
--

INSERT INTO `physicalexaminationshs` (`peshs_id`, `admin_id`, `idnumber`, `fullname`, `age`, `gradesection`, `sex`, `pastsurgeries`, `allergies`, `familyhistory`, `bp`, `pr`, `height`, `weight`, `heent`, `cvs`, `gis`, `gus`, `skin`, `musculoskeletal`, `remarks`, `medicalexaminer`, `dateexamined`) VALUES
(1, 12, 68021821, 'Atento, Joanna Mae D. ', '18', 'Grade 12 Punto', 'Female', 'None', 'None', 'None', '70/90', '70', '153', '46', 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', 'good', 'Andrew Robles', '2023-07-30'),
(2, 12, 6802182, 'Atento, Joanna Mae D.', '18', 'Grade 12 Punto', 'Female', 'None', 'None', 'None', '80/100', '40', '150', '45', 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', 'Okay', 'good', 'Andrew Robles', '2023-07-31'),
(3, 23, 2, 'User SHS', '18', 'Grade 12 Punto', 'Female', 'None', 'None', 'None', '90/100', '70', '150', '45', 'sdfghjk', 'dfghjk', 'asdfhyju', 'dfghj', 'dfghj', 'dfghj', 'dfghj', 'sdfghj', '2023-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `physicianapp`
--

CREATE TABLE `physicianapp` (
  `phy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianapp`
--

INSERT INTO `physicianapp` (`phy_id`, `user_id`, `idnumber`, `name`, `gradesection`, `phoneno`, `date_time`, `sched_time`, `role`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(24, 99, 6802182, 'Joanna Mae D. Atento', 'Grade 7 Saint', '+639156005165', '2023-09-06', '10:00 A.M', 'Student in GS/JHS', '2023-09-03 22:57:25', 1, 1, 'Unavailable'),
(25, 99, 6802182, 'Joanna Mae D. Atento', 'Grade 7 Saint', '+639156005165', '2023-09-06', '09:00 A.M', 'Student in GS/JHS', '2023-09-03 22:58:32', 1, 1, 'Unavailable'),
(26, 99, 6802182, 'Joanna Mae D. Atento', 'Grade 7 Saint', '+639156005100', '2023-09-06', '11:00 A.M', 'Student in GS/JHS', '2023-09-03 23:09:20', 1, 1, 'Unavailable'),
(28, 102, 6802182, 'Joanna Mae D. Atento', 'Grade 12 Punto', '+639156005165', '2023-09-20', '10:00 A.M', 'Student in SHS', '2023-09-04 22:25:54', 1, 1, 'Unavailable'),
(29, 103, 1, 'User GSJHS', 'Grade 9', '+639124654893', '2023-09-27 12:00 AM', '10:00 AM', 'Student in GS/JHS', '2023-09-04 22:36:25', 0, 1, 'Unavailable'),
(30, 103, 1, 'User GSJHS', 'Employee', '+639156005165', '2023-10-18', '10:00 A.M', 'Employee in GS/JHS', '2023-09-04 22:46:25', 0, 1, 'Unavailable'),
(33, 104, 2, 'User SHS', 'Grade 12 Punto', '+639923546769', '2023-10-25', '10:00 A.M', 'Student in SHS', '2023-09-07 11:08:20', 0, 1, 'Unavailable'),
(34, 104, 2, 'User SHS', 'Grade 12 Punto', '+639637077358', '2023-09-20', '09:00 A.M', 'Student in SHS', '2023-09-07 16:13:05', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `physicianappcollege`
--

CREATE TABLE `physicianappcollege` (
  `phy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `sched_time` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_deleted_on_website` tinyint(1) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianappcollege`
--

INSERT INTO `physicianappcollege` (`phy_id`, `user_id`, `idnumber`, `name`, `gradesection`, `phoneno`, `date_time`, `sched_time`, `role`, `created_at`, `is_deleted_on_website`, `availability`, `status`) VALUES
(36, 105, 3, 'User College', 'BSIT - 4', '+639234354657', '2023-09-20', '12:00 P.M', 'Student in College', '2023-09-06 22:25:55', 0, 1, 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `physicianorderprogressgsjhs`
--

CREATE TABLE `physicianorderprogressgsjhs` (
  `pop_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `progressnotes` text NOT NULL,
  `doctorsorder` text NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `levelsection` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianorderprogressgsjhs`
--

INSERT INTO `physicianorderprogressgsjhs` (`pop_id`, `admin_id`, `datetime`, `progressnotes`, `doctorsorder`, `idnumber`, `fullname`, `age`, `levelsection`) VALUES
(5, 12, '2023-08-03 06:22 PM', 'good', 'good', 1888, 'Jonna Marie Atento', '19', 'Grade 7 - St. Martha'),
(6, 12, '2023-09-05 10:30 AM', 'dhfgjhjk', 'dfghj', 1, 'User GSJHS', '15', 'Grade 7 - St. Martha');

-- --------------------------------------------------------

--
-- Table structure for table `physicianorderprogressshs`
--

CREATE TABLE `physicianorderprogressshs` (
  `popshs_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `progressnotes` text NOT NULL,
  `doctorsorder` text NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianorderprogressshs`
--

INSERT INTO `physicianorderprogressshs` (`popshs_id`, `admin_id`, `datetime`, `progressnotes`, `doctorsorder`, `idnumber`, `fullname`, `age`, `grade`) VALUES
(1, 12, '2023-08-01 05:56 PM', 'Not Stable', 'Rest ', 1888, 'Jonna Marie Atento', '19', 'Grade 12'),
(2, 23, '2023-09-06 01:00 PM', 'dfghjk', 'dfghj', 2, 'User SHS', '18', 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `schoolhealthasses`
--

CREATE TABLE `schoolhealthasses` (
  `schoolasses_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `birthday` text NOT NULL,
  `gender` varchar(200) NOT NULL,
  `date` text NOT NULL,
  `weight` text NOT NULL,
  `height` varchar(20) NOT NULL,
  `bmi` text NOT NULL,
  `bp` text NOT NULL,
  `pr` text NOT NULL,
  `scalp` text NOT NULL,
  `skin_nails` text NOT NULL,
  `eyes` text NOT NULL,
  `visual_acuity` text NOT NULL,
  `ears` text NOT NULL,
  `hearing_test` text NOT NULL,
  `nose` text NOT NULL,
  `throat` text NOT NULL,
  `mouth_tongue` text NOT NULL,
  `teeth_gums` text NOT NULL,
  `chest_breasts` text NOT NULL,
  `heart` text NOT NULL,
  `lungs` text NOT NULL,
  `abdomen` text NOT NULL,
  `genitalia` text NOT NULL,
  `spine_extremities` text NOT NULL,
  `sexual` text NOT NULL,
  `screening` text NOT NULL,
  `otherfindings` text NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolhealthasses`
--

INSERT INTO `schoolhealthasses` (`schoolasses_id`, `admin_id`, `idnumber`, `fullname`, `birthday`, `gender`, `date`, `weight`, `height`, `bmi`, `bp`, `pr`, `scalp`, `skin_nails`, `eyes`, `visual_acuity`, `ears`, `hearing_test`, `nose`, `throat`, `mouth_tongue`, `teeth_gums`, `chest_breasts`, `heart`, `lungs`, `abdomen`, `genitalia`, `spine_extremities`, `sexual`, `screening`, `otherfindings`, `remarks`) VALUES
(7, 9, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-19', '42', '150', 'Normal', '60/70', '20', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'overall is good, passed'),
(8, 9, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-05', '45', '151', 'Normal', '100/70', '30', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'passed'),
(9, 9, 1234567, 'Camila Salvador', '2004-04-29', 'Female', '2023-07-14', '47', '153', 'Normal', '80/70', '20', 'Good', 'Good', 'Not Normal', 'Not Normal', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'good'),
(10, 10, 1234567, 'Camila Salvador', '2023-07-01', 'Female', '2023-07-26', '41', '161', 'Normal', '80/70', '21', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'PASSED'),
(11, 11, 6802182, 'Joanna Mae Atento', '2001-12-15', 'Female', '2023-07-26', '45', '150', 'Normal', '90/70', '30', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'PASSED'),
(12, 9, 123123, 'Mae Atento', '2001-12-15', 'Female', '2023-07-20', '42', '152', 'Normal', '60/70', '20', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'None', 'good'),
(13, 17, 1, 'User GSJHS', '2001-12-15', 'Male', '2023-09-05', '45', '150', 'Normal', '90/70', '70', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good'),
(14, 19, 2, 'User SHS', '2023-09-12', 'Male', '2023-09-12', '45', '150', 'Normal', '90/100', '70', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good'),
(15, 20, 3, 'User College', '2001-09-15', 'Female', '2023-09-14', '45', '150', 'Normal', '70/90', '70', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `sms_message`
--

CREATE TABLE `sms_message` (
  `message_id` int(11) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_created` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms_message`
--

INSERT INTO `sms_message` (`message_id`, `phone`, `message`, `date_created`) VALUES
(1, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 11:00 A.M', ''),
(2, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(3, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(4, '639156005165', 'Good Day! Your request for amo po is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(5, '639156005165', 'Good Day!. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(6, '639156005165', 'Good Day! Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(7, '639156005165', 'Your request for dental cleaning is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(8, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(9, '639156005165', 'hello', ''),
(10, '639156005165', 'hellohi', '2023-08-03 04:22 PM'),
(11, '639156005165', 'We summon you', '2023-08-03 04:23 PM'),
(12, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-08 06:30 PM'),
(13, '639156005165', 'Your daugther', '2023-08-08 06:36 PM'),
(14, '639156005165', 'Daughter', '2023-08-08 06:39 PM'),
(15, '639156005165', 'Hi', '2023-08-08 06:43 PM'),
(16, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(17, '639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(18, '639156005165', 'hahahahaha', ''),
(19, '639156005165', 'Good Day! Your request for physician consulatation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(20, '639156005165', 'heyow', ''),
(21, '639156005165', 'Hi', ''),
(22, '+639156005165', 'Your choose', '2023-08-26 09:47 AM'),
(23, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(24, '+639156005165', 'We regret to inform you that your request for medical appointment has been rejected. Please choose another schedule.', ''),
(25, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(26, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(27, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(28, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', ''),
(29, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 04:54 PM'),
(30, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 07:55 PM'),
(31, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-26 10:24 PM'),
(32, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-27 12:29 PM'),
(33, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-08-27 04:42 PM'),
(34, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on August 28, 2023 at 10:30 A.M', '2023-08-27 07:23 PM'),
(35, '+639156005165', 'We summon you', '2023-08-28 12:35 AM'),
(36, '+639156005165', 'hi', '2023-08-29 05:18 PM'),
(37, '+639262345194', 'hello', '2023-08-31 11:26 AM'),
(38, '+639922863038', 'hello', '2023-08-31 11:27 AM'),
(39, '+639295127752', 'hello', '2023-08-31 11:27 AM'),
(40, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:26 PM'),
(41, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:27 PM'),
(42, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-02 10:29 PM'),
(43, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-05 12:59 PM'),
(44, '+639156005165', 'Good Day! Your request for physician consultation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-06 09:32 PM'),
(45, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:19 PM'),
(46, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:20 PM'),
(47, '+639637077358', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-07 04:20 PM'),
(48, '+639156005165', 'We summon you', '2023-09-09 10:45 AM'),
(49, '+639156005165', 'hi', '2023-09-09 10:49 AM'),
(50, '+639637077358', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:54 AM'),
(51, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:56 AM'),
(52, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-09 10:58 AM'),
(53, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 05:57 PM'),
(54, '+639156005165', 'HI', '2023-09-11 06:00 PM'),
(55, '+639156005165', 'G?', '2023-09-11 06:02 PM'),
(56, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 06:22 PM'),
(57, '+639156005165', 'Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 06:23 PM'),
(58, '+639156005165', 'Good Day! Your request for dental appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 07:18 PM'),
(59, '+639156005165', 'Good Day! Your request for physician consultation appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M', '2023-09-11 07:20 PM');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalcollegefriday`
--

CREATE TABLE `statusdentalcollegefriday` (
  `status_id` int(11) NOT NULL,
  `statusden8_am` varchar(50) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL,
  `statusden12_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalcollegefriday`
--

INSERT INTO `statusdentalcollegefriday` (`status_id`, `statusden8_am`, `statusden9_am`, `statusden10_am`, `statusden11_am`, `statusden12_pm`) VALUES
(1, '08:00 A.M', '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalcollegemonday`
--

CREATE TABLE `statusdentalcollegemonday` (
  `status_id` int(11) NOT NULL,
  `statusden8_am` varchar(50) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL,
  `statusden12_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalcollegemonday`
--

INSERT INTO `statusdentalcollegemonday` (`status_id`, `statusden8_am`, `statusden9_am`, `statusden10_am`, `statusden11_am`, `statusden12_pm`) VALUES
(1, '08:00 A.M', '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalcollegethursday`
--

CREATE TABLE `statusdentalcollegethursday` (
  `status_id` int(11) NOT NULL,
  `statusden8_am` varchar(50) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL,
  `statusden12_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalcollegethursday`
--

INSERT INTO `statusdentalcollegethursday` (`status_id`, `statusden8_am`, `statusden9_am`, `statusden10_am`, `statusden11_am`, `statusden12_pm`) VALUES
(1, '08:00 A.M', '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalcollegetuesday`
--

CREATE TABLE `statusdentalcollegetuesday` (
  `status_id` int(11) NOT NULL,
  `statusden8_am` varchar(50) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL,
  `statusden12_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalcollegetuesday`
--

INSERT INTO `statusdentalcollegetuesday` (`status_id`, `statusden8_am`, `statusden9_am`, `statusden10_am`, `statusden11_am`, `statusden12_pm`) VALUES
(1, '08:00 A.M', '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalcollegewednesday`
--

CREATE TABLE `statusdentalcollegewednesday` (
  `status_id` int(11) NOT NULL,
  `statusden8_am` varchar(50) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL,
  `statusden12_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalcollegewednesday`
--

INSERT INTO `statusdentalcollegewednesday` (`status_id`, `statusden8_am`, `statusden9_am`, `statusden10_am`, `statusden11_am`, `statusden12_pm`) VALUES
(1, '08:00 A.M', '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalgsjhsshsfriday`
--

CREATE TABLE `statusdentalgsjhsshsfriday` (
  `status_id` int(11) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalgsjhsshsfriday`
--

INSERT INTO `statusdentalgsjhsshsfriday` (`status_id`, `statusden9_am`, `statusden10_am`, `statusden11_am`) VALUES
(8, '09:00 A.M', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalgsjhsshsmonday`
--

CREATE TABLE `statusdentalgsjhsshsmonday` (
  `status_id` int(11) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalgsjhsshsmonday`
--

INSERT INTO `statusdentalgsjhsshsmonday` (`status_id`, `statusden9_am`, `statusden10_am`, `statusden11_am`) VALUES
(8, '09:00 A.M', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalgsjhsshsthursday`
--

CREATE TABLE `statusdentalgsjhsshsthursday` (
  `status_id` int(11) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalgsjhsshsthursday`
--

INSERT INTO `statusdentalgsjhsshsthursday` (`status_id`, `statusden9_am`, `statusden10_am`, `statusden11_am`) VALUES
(8, '09:00 A.M', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalgsjhsshstuesday`
--

CREATE TABLE `statusdentalgsjhsshstuesday` (
  `status_id` int(11) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalgsjhsshstuesday`
--

INSERT INTO `statusdentalgsjhsshstuesday` (`status_id`, `statusden9_am`, `statusden10_am`, `statusden11_am`) VALUES
(8, '09:00 A.M ', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusdentalgsjhsshswednesday`
--

CREATE TABLE `statusdentalgsjhsshswednesday` (
  `status_id` int(11) NOT NULL,
  `statusden9_am` varchar(50) NOT NULL,
  `statusden10_am` varchar(50) NOT NULL,
  `statusden11_am` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusdentalgsjhsshswednesday`
--

INSERT INTO `statusdentalgsjhsshswednesday` (`status_id`, `statusden9_am`, `statusden10_am`, `statusden11_am`) VALUES
(8, '09:00 A.M', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollege`
--

CREATE TABLE `statusmedicalcollege` (
  `medical_id` int(11) NOT NULL,
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollege`
--

INSERT INTO `statusmedicalcollege` (`medical_id`, `statusmedmonam_1`, `statusmedtueam_2`, `statusmedwedam_3`, `statusmedthuam_4`, `statusmedfriam_5`, `statusmedmonpm_6`, `statusmedtuepm_7`, `statusmedwedpm_8`, `statusmedthupm_9`, `statusmedfripm_10`) VALUES
(1, 'Available', 'Available', 'Unavailable', 'Available', 'Available', 'Unavailable', 'Available', 'Available', 'Unavailable', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollegefriday`
--

CREATE TABLE `statusmedicalcollegefriday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollegefriday`
--

INSERT INTO `statusmedicalcollegefriday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollegemonday`
--

CREATE TABLE `statusmedicalcollegemonday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollegemonday`
--

INSERT INTO `statusmedicalcollegemonday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollegethursday`
--

CREATE TABLE `statusmedicalcollegethursday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollegethursday`
--

INSERT INTO `statusmedicalcollegethursday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollegetuesday`
--

CREATE TABLE `statusmedicalcollegetuesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollegetuesday`
--

INSERT INTO `statusmedicalcollegetuesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalcollegewednesday`
--

CREATE TABLE `statusmedicalcollegewednesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalcollegewednesday`
--

INSERT INTO `statusmedicalcollegewednesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhsfriday`
--

CREATE TABLE `statusmedicalgsjhsfriday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhsfriday`
--

INSERT INTO `statusmedicalgsjhsfriday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhsmonday`
--

CREATE TABLE `statusmedicalgsjhsmonday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhsmonday`
--

INSERT INTO `statusmedicalgsjhsmonday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhsthursday`
--

CREATE TABLE `statusmedicalgsjhsthursday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhsthursday`
--

INSERT INTO `statusmedicalgsjhsthursday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhstuesday`
--

CREATE TABLE `statusmedicalgsjhstuesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhstuesday`
--

INSERT INTO `statusmedicalgsjhstuesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalgsjhswednesday`
--

CREATE TABLE `statusmedicalgsjhswednesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalgsjhswednesday`
--

INSERT INTO `statusmedicalgsjhswednesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshs`
--

CREATE TABLE `statusmedicalshs` (
  `medical_id` int(11) NOT NULL,
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshs`
--

INSERT INTO `statusmedicalshs` (`medical_id`, `statusmedmonam_1`, `statusmedtueam_2`, `statusmedwedam_3`, `statusmedthuam_4`, `statusmedfriam_5`, `statusmedmonpm_6`, `statusmedtuepm_7`, `statusmedwedpm_8`, `statusmedthupm_9`, `statusmedfripm_10`) VALUES
(1, 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Unavailable', 'Unavailable', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshsfriday`
--

CREATE TABLE `statusmedicalshsfriday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshsfriday`
--

INSERT INTO `statusmedicalshsfriday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshsmonday`
--

CREATE TABLE `statusmedicalshsmonday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshsmonday`
--

INSERT INTO `statusmedicalshsmonday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshsthursday`
--

CREATE TABLE `statusmedicalshsthursday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshsthursday`
--

INSERT INTO `statusmedicalshsthursday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshstuesday`
--

CREATE TABLE `statusmedicalshstuesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshstuesday`
--

INSERT INTO `statusmedicalshstuesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusmedicalshswednesday`
--

CREATE TABLE `statusmedicalshswednesday` (
  `medical_id` int(11) NOT NULL,
  `statusmed8_am` varchar(50) NOT NULL,
  `statusmed9_am` varchar(50) NOT NULL,
  `statusmed10_am` varchar(50) NOT NULL,
  `statusmed11_am` varchar(50) NOT NULL,
  `statusmed1_pm` varchar(50) NOT NULL,
  `statusmed2_pm` varchar(50) NOT NULL,
  `statusmed3_pm` varchar(50) NOT NULL,
  `statusmed4_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmedicalshswednesday`
--

INSERT INTO `statusmedicalshswednesday` (`medical_id`, `statusmed8_am`, `statusmed9_am`, `statusmed10_am`, `statusmed11_am`, `statusmed1_pm`, `statusmed2_pm`, `statusmed3_pm`, `statusmed4_pm`) VALUES
(2, '08:00 A.M ', '09:00 A.M', '10:00 A.M', '11:00 A.M', '01:00 P.M', '02:00 P.M', '03:00 P.M.', '04:00 P.M');

-- --------------------------------------------------------

CREATE TABLE `statusmedicalgsjhs` (
  `statusmedmonam_1` varchar(50) NOT NULL,
  `statusmedtueam_2` varchar(50) NOT NULL,
  `statusmedwedam_3` varchar(50) NOT NULL,
  `statusmedthuam_4` varchar(50) NOT NULL,
  `statusmedfriam_5` varchar(50) NOT NULL,
  `statusmedmonpm_6` varchar(50) NOT NULL,
  `statusmedtuepm_7` varchar(50) NOT NULL,
  `statusmedwedpm_8` varchar(50) NOT NULL,
  `statusmedthupm_9` varchar(50) NOT NULL,
  `statusmedfripm_10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `statusphysiciancollege`
--

CREATE TABLE `statusphysiciancollege` (
  `statphysician_id` int(11) NOT NULL,
  `statusphysician9_am` varchar(200) NOT NULL,
  `statusphysician10_am` varchar(200) NOT NULL,
  `statusphysician11_am` varchar(200) NOT NULL,
  `statusphysician12_pm` varchar(50) NOT NULL,
  `status812` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusphysiciancollege`
--

INSERT INTO `statusphysiciancollege` (`statphysician_id`, `statusphysician9_am`, `statusphysician10_am`, `statusphysician11_am`, `statusphysician12_pm`) VALUES
(1, '09:00 A.M', '10:00 A.M', '11:00 A.M', '12:00 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `statusphysiciangsjhsshs`
--

CREATE TABLE `statusphysiciangsjhsshs` (
  `statphysician_id` int(11) NOT NULL,
  `statusphysician9_am` varchar(200) NOT NULL,
  `statusphysician10_am` varchar(200) NOT NULL,
  `statusphysician11_am` varchar(200) NOT NULL,
  `status811` varchar (200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusphysiciangsjhsshs`
--

INSERT INTO `statusphysiciangsjhsshs` (`statphysician_id`, `statusphysician9_am`, `statusphysician10_am`, `statusphysician11_am`) VALUES
(1, '09:00 A.M', '10:00 A.M', '11:00 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `leveleduc` int(5) NOT NULL,
  `role` varchar(200) NOT NULL,
  `gradelevel` varchar(200) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `leveleduc`, `role`, `gradelevel`, `idnumber`, `email`, `password`) VALUES
(99, 'Joanna Mae D. Atento', 1, 'Student', 'Grade 4', 6802182, '06802182@dwc-legazpi.edu', '$2y$10$IbOIIa5cIkQpFedajO7EgOB9yrkLZ4pJGdQt7IZVMmLl/XWZ2ihS2'),
(100, 'Maria Hermosa', 1, 'Student', 'Grade 9', 1919191, '1919191@dwc-legazpi.edu', '$2y$10$XHd8CCof.SAOOKbVo0SdpeTd3/CMk2VqDaXzwqQmMS5hnLnnJmDHi'),
(101, 'Baekhyun Byun', 1, 'Student', 'Grade 10', 11111, '11111@dwc-legazpi.edu', '$2y$10$IYdg3sp9zVTZk8MU6rueSeUpzwtJrNmBwoBFesqNbzI7khNWvZFpK'),
(102, 'Joanna Mae D. Atento', 2, 'Student', 'Grade 11', 6802182, '06802182@dwc-legazpi.edu', '$2y$10$W2xAYb4Ucoz3izPOxHoTweViHfw6ASfLhCP2gHBx3rQJQM.kdAQey'),
(103, 'User GSJHS', 1, 'Student', 'Grade 10', 1, '000001@dwc-legazpi.edu', '$2y$10$NNpRALaM48DK6fApnN.iFesW2cHFruQR62VH1GQcipjvuplOYNvli'),
(104, 'User SHS', 2, 'Student', 'Grade 11', 2, '000002@dwc-legazpi.edu', '$2y$10$Az8EJoDDpddtnMR4gFHWXeWY8DxFKKLEyVKJmAUnBYgSRbwtwfIma'),
(105, 'User College', 3, 'Student', 'BSIT - 1', 3, '000003@dwc-legazpi.edu', '$2y$10$XO3vTouQKz6M8muY4RcXMe4h6fd3AzFkMvK6.WnRkrazGL.1.6Ole'),
(106, 'Joanna Mae Atento', 3, 'Student', 'BSIT - 1', 6802122, '06802122@dwc-legazpi.edu', '$2y$10$cb6DYgkdX4aT35coafkrK.HC4HJV4arcMtvig.lxOssP0RNiPuaxe'),
(107, 'Joanna Mae D. Atento', 1, 'Student', 'Grade 3', 123, '000123@dwc-legazpi.edu', '$2y$10$VOfyNy3lBZrEfFWJqo.LrOvYzIaK5Mj5tErXGEGZuU4dM8oPDfLHO'),
(108, 'Amy Joy', 1, 'Student', 'Grade 1', 23, '00023@dwc-legazpi.edu', '$2y$10$MYgaGtYlZr296HdZOu0hdu1dpd3sZmORKy4Mb7vvjE8j7zaytAm9a'),
(110, 'Raimon Karl Atento', 1, 'Student', 'Grade 8', 94574, '94574@dwc-legazpi.edu', '$2y$10$jaKyqQ1Hju0ijl3QeyVgPOVDJ1XNzZ.Q/GrbisTbKl3nsEnkJ.z7K');

-- --------------------------------------------------------

--
-- Table structure for table `vitalsigns`
--

CREATE TABLE `vitalsigns` (
  `vital_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `t` varchar(200) NOT NULL,
  `p` varchar(200) NOT NULL,
  `r` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitalsigns`
--

INSERT INTO `vitalsigns` (`vital_id`, `admin_id`, `idnumber`, `fullname`, `age`, `date`, `time`, `bp`, `t`, `p`, `r`) VALUES
(1, 10, 6802182, 'Joanna Mae Atento', '19', '2023-07-28', '10:30', '90/70', 'T-38', '70', '80'),
(2, 10, 6802182, 'Joanna Mae Atento', '19', '2023-07-29', '10:40', '70/90', 'T-38', '70', '30'),
(3, 19, 2, 'User SHS', '18', '2023-09-05', '10:30', '60', '78', '67', '56');

-- --------------------------------------------------------

--
-- Table structure for table `weightmonitor`
--

CREATE TABLE `weightmonitor` (
  `weight_id` int(11) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `idnumber` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gradesection` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `weight` varchar(200) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weightmonitor`
--

INSERT INTO `weightmonitor` (`weight_id`, `admin_id`, `idnumber`, `fullname`, `age`, `gradesection`, `date_time`, `weight`, `remarks`) VALUES
(1, 10, 6802182, 'Joanna Mae Atento', '19', 'Grade 12 Grabsch', '2023-10-15 10:30:00', '45 kg', 'BMI: Normal'),
(2, 10, 6802182, 'Joanna Mae Atento', '19', 'Grade 12 Grabsch', '2023-07-29 21:31:00', '50 kg', 'BMI: Normal'),
(3, 10, 6802182, 'Joanna Mae Atento', '18', 'Grade 12 Grabsch', '2023-07-28 09:41:00', '45 kg', 'BMI: Normal'),
(4, 19, 2, 'User SHS', '19', 'Grade 12 Grabsch', '2023-09-04 11:17:00', '45', 'FGTHYUTYTREE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `consultationformrecord`
--
ALTER TABLE `consultationformrecord`
  ADD PRIMARY KEY (`consultform_id`);

--
-- Indexes for table `consultationformrecordcollege`
--
ALTER TABLE `consultationformrecordcollege`
  ADD PRIMARY KEY (`consultform_id`);

--
-- Indexes for table `dentalapp`
--
ALTER TABLE `dentalapp`
  ADD PRIMARY KEY (`dentalapp_id`);

--
-- Indexes for table `dentalappcollege`
--
ALTER TABLE `dentalappcollege`
  ADD PRIMARY KEY (`dentalapp_id`);

--
-- Indexes for table `healthrecordformcollege`
--
ALTER TABLE `healthrecordformcollege`
  ADD PRIMARY KEY (`healthcollege_id`);

--
-- Indexes for table `healthrecordformgsjhs`
--
ALTER TABLE `healthrecordformgsjhs`
  ADD PRIMARY KEY (`healthnogsjhs_id`);

--
-- Indexes for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  ADD PRIMARY KEY (`healthshs_id`);

--
-- Indexes for table `medicalapp`
--
ALTER TABLE `medicalapp`
  ADD PRIMARY KEY (`medicalapp_id`),
  ADD UNIQUE KEY `unique_slot` (`date_time`,`sched_time`);

--
-- Indexes for table `medicalappcollege`
--
ALTER TABLE `medicalappcollege`
  ADD PRIMARY KEY (`medicalapp_id`);

--
-- Indexes for table `medicalappshs`
--
ALTER TABLE `medicalappshs`
  ADD PRIMARY KEY (`medicalapp_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `nursenotesshs`
--
ALTER TABLE `nursenotesshs`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `physicalexaminationgsjhs`
--
ALTER TABLE `physicalexaminationgsjhs`
  ADD PRIMARY KEY (`pe_id`);

--
-- Indexes for table `physicalexaminationshs`
--
ALTER TABLE `physicalexaminationshs`
  ADD PRIMARY KEY (`peshs_id`);

--
-- Indexes for table `physicianapp`
--
ALTER TABLE `physicianapp`
  ADD PRIMARY KEY (`phy_id`);

--
-- Indexes for table `physicianappcollege`
--
ALTER TABLE `physicianappcollege`
  ADD PRIMARY KEY (`phy_id`);

--
-- Indexes for table `physicianorderprogressgsjhs`
--
ALTER TABLE `physicianorderprogressgsjhs`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `physicianorderprogressshs`
--
ALTER TABLE `physicianorderprogressshs`
  ADD PRIMARY KEY (`popshs_id`);

--
-- Indexes for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  ADD PRIMARY KEY (`schoolasses_id`);

--
-- Indexes for table `sms_message`
--
ALTER TABLE `sms_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `statusdentalcollegefriday`
--
ALTER TABLE `statusdentalcollegefriday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalcollegemonday`
--
ALTER TABLE `statusdentalcollegemonday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalcollegethursday`
--
ALTER TABLE `statusdentalcollegethursday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalcollegetuesday`
--
ALTER TABLE `statusdentalcollegetuesday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalcollegewednesday`
--
ALTER TABLE `statusdentalcollegewednesday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalgsjhsshsfriday`
--
ALTER TABLE `statusdentalgsjhsshsfriday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalgsjhsshsmonday`
--
ALTER TABLE `statusdentalgsjhsshsmonday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalgsjhsshsthursday`
--
ALTER TABLE `statusdentalgsjhsshsthursday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalgsjhsshstuesday`
--
ALTER TABLE `statusdentalgsjhsshstuesday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusdentalgsjhsshswednesday`
--
ALTER TABLE `statusdentalgsjhsshswednesday`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `statusmedicalcollege`
--
ALTER TABLE `statusmedicalcollege`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalcollegefriday`
--
ALTER TABLE `statusmedicalcollegefriday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalcollegemonday`
--
ALTER TABLE `statusmedicalcollegemonday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalcollegethursday`
--
ALTER TABLE `statusmedicalcollegethursday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalcollegetuesday`
--
ALTER TABLE `statusmedicalcollegetuesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalcollegewednesday`
--
ALTER TABLE `statusmedicalcollegewednesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalgsjhsmonday`
--
ALTER TABLE `statusmedicalgsjhsmonday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalgsjhsthursday`
--
ALTER TABLE `statusmedicalgsjhsthursday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalgsjhstuesday`
--
ALTER TABLE `statusmedicalgsjhstuesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalgsjhswednesday`
--
ALTER TABLE `statusmedicalgsjhswednesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalshsfriday`
--
ALTER TABLE `statusmedicalshsfriday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalshsmonday`
--
ALTER TABLE `statusmedicalshsmonday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalshsthursday`
--
ALTER TABLE `statusmedicalshsthursday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalshstuesday`
--
ALTER TABLE `statusmedicalshstuesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusmedicalshswednesday`
--
ALTER TABLE `statusmedicalshswednesday`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `statusphysiciancollege`
--
ALTER TABLE `statusphysiciancollege`
  ADD PRIMARY KEY (`statphysician_id`);

--
-- Indexes for table `statusphysiciangsjhsshs`
--
ALTER TABLE `statusphysiciangsjhsshs`
  ADD PRIMARY KEY (`statphysician_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  ADD PRIMARY KEY (`vital_id`);

--
-- Indexes for table `weightmonitor`
--
ALTER TABLE `weightmonitor`
  ADD PRIMARY KEY (`weight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `consultationformrecord`
--
ALTER TABLE `consultationformrecord`
  MODIFY `consultform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consultationformrecordcollege`
--
ALTER TABLE `consultationformrecordcollege`
  MODIFY `consultform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dentalapp`
--
ALTER TABLE `dentalapp`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `dentalappcollege`
--
ALTER TABLE `dentalappcollege`
  MODIFY `dentalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `healthrecordformcollege`
--
ALTER TABLE `healthrecordformcollege`
  MODIFY `healthcollege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `healthrecordformgsjhs`
--
ALTER TABLE `healthrecordformgsjhs`
  MODIFY `healthnogsjhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `healthrecordformshs`
--
ALTER TABLE `healthrecordformshs`
  MODIFY `healthshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicalapp`
--
ALTER TABLE `medicalapp`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `medicalappcollege`
--
ALTER TABLE `medicalappcollege`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicalappshs`
--
ALTER TABLE `medicalappshs`
  MODIFY `medicalapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `nursenotesshs`
--
ALTER TABLE `nursenotesshs`
  MODIFY `nurse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `physicalexaminationgsjhs`
--
ALTER TABLE `physicalexaminationgsjhs`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `physicalexaminationshs`
--
ALTER TABLE `physicalexaminationshs`
  MODIFY `peshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `physicianapp`
--
ALTER TABLE `physicianapp`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `physicianappcollege`
--
ALTER TABLE `physicianappcollege`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `physicianorderprogressgsjhs`
--
ALTER TABLE `physicianorderprogressgsjhs`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `physicianorderprogressshs`
--
ALTER TABLE `physicianorderprogressshs`
  MODIFY `popshs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolhealthasses`
--
ALTER TABLE `schoolhealthasses`
  MODIFY `schoolasses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sms_message`
--
ALTER TABLE `sms_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `statusdentalcollegefriday`
--
ALTER TABLE `statusdentalcollegefriday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusdentalcollegemonday`
--
ALTER TABLE `statusdentalcollegemonday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusdentalcollegethursday`
--
ALTER TABLE `statusdentalcollegethursday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusdentalcollegetuesday`
--
ALTER TABLE `statusdentalcollegetuesday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusdentalcollegewednesday`
--
ALTER TABLE `statusdentalcollegewednesday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusdentalgsjhsshsfriday`
--
ALTER TABLE `statusdentalgsjhsshsfriday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusdentalgsjhsshsmonday`
--
ALTER TABLE `statusdentalgsjhsshsmonday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusdentalgsjhsshsthursday`
--
ALTER TABLE `statusdentalgsjhsshsthursday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusdentalgsjhsshstuesday`
--
ALTER TABLE `statusdentalgsjhsshstuesday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusdentalgsjhsshswednesday`
--
ALTER TABLE `statusdentalgsjhsshswednesday`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusmedicalcollege`
--
ALTER TABLE `statusmedicalcollege`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusmedicalcollegefriday`
--
ALTER TABLE `statusmedicalcollegefriday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalcollegemonday`
--
ALTER TABLE `statusmedicalcollegemonday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalcollegethursday`
--
ALTER TABLE `statusmedicalcollegethursday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalcollegetuesday`
--
ALTER TABLE `statusmedicalcollegetuesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalcollegewednesday`
--
ALTER TABLE `statusmedicalcollegewednesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalgsjhsmonday`
--
ALTER TABLE `statusmedicalgsjhsmonday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalgsjhsthursday`
--
ALTER TABLE `statusmedicalgsjhsthursday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalgsjhstuesday`
--
ALTER TABLE `statusmedicalgsjhstuesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalgsjhswednesday`
--
ALTER TABLE `statusmedicalgsjhswednesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalshsfriday`
--
ALTER TABLE `statusmedicalshsfriday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalshsmonday`
--
ALTER TABLE `statusmedicalshsmonday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalshsthursday`
--
ALTER TABLE `statusmedicalshsthursday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalshstuesday`
--
ALTER TABLE `statusmedicalshstuesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusmedicalshswednesday`
--
ALTER TABLE `statusmedicalshswednesday`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusphysiciancollege`
--
ALTER TABLE `statusphysiciancollege`
  MODIFY `statphysician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusphysiciangsjhsshs`
--
ALTER TABLE `statusphysiciangsjhsshs`
  MODIFY `statphysician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weightmonitor`
--
ALTER TABLE `weightmonitor`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
