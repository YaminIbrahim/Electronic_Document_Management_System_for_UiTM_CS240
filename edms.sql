-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 08:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(10) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminOuriginalEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminPhoneNum` varchar(50) DEFAULT NULL,
  `adminRoomNum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminOuriginalEmail`, `adminPassword`, `adminPhoneNum`, `adminRoomNum`) VALUES
('123456', 'Robizah binti Haji Sudin', 'robizah@uitm.edu.my', 'robizah.UiTM@analysis.ouriginal.com', '123', '+60 19-986 6870', 'D-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` varchar(100) NOT NULL,
  `className` varchar(100) NOT NULL,
  `classYear` varchar(10) NOT NULL,
  `classSession` varchar(10) NOT NULL,
  `adminID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `className`, `classYear`, `classSession`, `adminID`) VALUES
('D1CS2405A20232', 'D1CS2405A', '2023', '2', '123456'),
('D1CS2406A20232', 'D1CS2406A', '2023', '2', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `doctype`
--

CREATE TABLE `doctype` (
  `docCode` varchar(10) NOT NULL,
  `docName` varchar(50) NOT NULL,
  `docFileName` varchar(100) NOT NULL,
  `docExtension` varchar(100) NOT NULL,
  `docSize` varchar(100) NOT NULL,
  `docMark` varchar(50) NOT NULL,
  `docDecs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctype`
--

INSERT INTO `doctype` (`docCode`, `docName`, `docFileName`, `docExtension`, `docSize`, `docMark`, `docDecs`) VALUES
('F1', 'MUTUAL ACCEPTANCE FORM', '50208-f1_mutual_acceptance_form.pdf', 'application/pdf', '382.4111328125', '', 'No mark required'),
('F10', 'FINAL PROJECT PRESENTATION FORM', '53279-f10---final-project-presentation-form.pdf', 'application/pdf', '541.1201171875', '', 'Supervisor and examiner marks required'),
('F11', 'PROJECT REPORT EVALUATION FORM', '89886-f11---project-report-evaluation-form.pdf', 'application/pdf', '1211.6162109375', '', 'Supervisor and examiner marks required'),
('F12', 'CONFIRMATION OF REPORT CORRECTION FORM', '63295-f12---confirmation-of-report-correction-form.pdf', 'application/pdf', '122.66015625', '', 'No mark required'),
('F13', 'LEAN CANVAS MODEL EVALUATION FORM', '65287-f13---lean-canvas-model-evaluation-form.pdf', 'application/pdf', '955.1142578125', '', 'Lecturer mark required'),
('F14', 'SPECIAL EVALUATION QUALIFICATION FORM', '9899-f14---special-evaluation-qualification-form.pdf', 'application/pdf', '138.9521484375', '', 'No mark required'),
('F15', 'SPECIAL EVALUATION PRESENTATION FORM', '5931-f15---special-evaluation-presentation-form.pdf', 'application/pdf', '547.900390625', '', 'Supervisor and examiner marks required'),
('F16', 'SPECIAL EVALUATION REPORT EVALUATION FORM', '22619-f16---special-evaluation-report-evaluation-form.pdf', 'application/pdf', '1216.935546875', '', 'Supervisor and examiner marks required'),
('F2', 'PROJECT MOTIVATION EVALUATION FORM', '91227-f2---project-motivation-evaluation-form.pdf', 'application/pdf', '175.2421875', '', 'Lecturer mark required'),
('F3', 'LITERATURE REVIEW EVALUATION FORM', '54402-f3---literature-review-evaluation-form.pdf', 'application/pdf', '177.236328125', '', 'Lecturer mark required'),
('F4', 'METHODOLOGY EVALUATION FORM', '38912-f4----methodology-evaluation-form.pdf', 'application/pdf', '298.3232421875', '', 'Lecturer mark required'),
('F5', 'PROPOSAL/PROJECT IN PROGRESS FORM', '79846-f5---project-in-progress-form.pdf', 'application/pdf', '92.1904296875', '', 'No mark required'),
('F6(a)', 'PROJECT FORMULATION REPORT SUBMISSION FORM', '55286-f6(a)---project-formulation-report-submission-form.pdf', 'application/pdf', '146.2666015625', '', 'No mark required'),
('F6(b)', 'PROJECT REPORT SUBMISSION FORM', '57335-f6(b)---project-report-submission-form.pdf', 'application/pdf', '189.9970703125', '', 'No mark required'),
('F7', 'PROJECT FORMULATION PRESENTATION FORM', '43796-f7---project-formulation-presentation-form.pdf', 'application/pdf', '165.6787109375', '', 'All marks required'),
('F8', 'PROJECT FORMULATION REPORT EVALUATION FORM', '33356-f8---project-formulation-report-evaluation-form.pdf', 'application/pdf', '395.166015625', '', 'Supervisor and examiner marks required'),
('F9', 'PROGRESS PROJECT PRESENTATION FORM', '73081-f9---progress-project-presentation-form.pdf', 'application/pdf', '560.6494140625', '', 'Lecturer mark required');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `docID` int(10) NOT NULL,
  `docName` varchar(100) DEFAULT NULL,
  `docExtension` varchar(100) DEFAULT NULL,
  `docSize` int(3) DEFAULT NULL,
  `docMark` int(3) DEFAULT NULL,
  `uploadBy` varchar(10) NOT NULL,
  `docCode` varchar(10) DEFAULT NULL,
  `studID` varchar(10) DEFAULT NULL,
  `adminID` varchar(10) DEFAULT NULL,
  `lectID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lectID` varchar(10) NOT NULL,
  `lectName` varchar(50) NOT NULL,
  `lectEmail` varchar(50) NOT NULL,
  `lectOuriginalEmail` varchar(100) NOT NULL,
  `lectPassword` varchar(50) NOT NULL,
  `lectPhoneNum` varchar(50) DEFAULT NULL,
  `lectRoomNum` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lectID`, `lectName`, `lectEmail`, `lectOuriginalEmail`, `lectPassword`, `lectPhoneNum`, `lectRoomNum`) VALUES
('111111', 'Marina binti Ahmad', 'marina170@uitm.edu.my', 'marina170.UiTM@analysis.ouriginal.com', 'Ma111111', '011-21060402', 'B-02-09'),
('111118', 'Wan Saiful \'Azzam bin Wan Ismail', 'saifulazzam@uitm.edu.my', 'saifulazzam.UiTM@analysis.ouriginal.com', '123', '011-1112326', 'D-02-08'),
('2020479614', 'DR. ZURIANI BINTI AHMAD ZUKARNAIN	', 'wfariza@uitm.edu.my	', 'wfariza.UiTM@analysis.ouriginal.com', 'dr2020479614	', '011-21090603', 'B-02-01'),
('2020482932', 'DR. WAN FARIZA BINTI WAN ABDUL RAHMAN	', 'amri@uitm.edu.my	', 'amri.UiTM@analysis.ouriginal.com', 'dr2020482932	', '011-21090603', 'B-02-01'),
('2020489284', 'CIK KU HAROSWATI BINTI CHE KU YAHAYA	', 'ainulazila@uitm.edu.my	', 'ainulazila.UiTM@analysis.ouriginal.com', 'ci2020489284', '011-21090603', 'B-02-01'),
('2020618198', 'MARHAINIS BT JAMALUDIN	', 'zurianiaz@uitm.edu.my	', 'zuraini.UiTM@analysis.ouriginal.com', 'ma2020618198', '011-21090603', 'B-02-01'),
('2020844226', 'CIK KU HAROSWATI BINTI CHE KU YAHAYA	', 'haroswati@uitm.edu.my	', 'haroswati.UiTM@analysis.ouriginal.com', 'ci2020844226', '011-21090603', 'B-02-01'),
('2020847258', 'DR. MUHAMMAD FIRDAUS BIN MUSTAPHA	', 'mdfirdaus@uitm.edu.my	', 'firdaus.UiTM@analysis.ouriginal.com', 'dr2020847258	', '011-21090603', 'B-02-01'),
('2021125459', 'DR. ROSLIM BIN MOHAMAD	', 'rosli027@uitm.edu.my	', 'rosli027.UiTM@analysis.ouriginal.com', 'dr2021125459	', '011-21090603', 'B-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` varchar(10) NOT NULL,
  `studName` varchar(50) NOT NULL,
  `studEmail` varchar(50) NOT NULL,
  `studPassword` varchar(50) NOT NULL,
  `studPhoneNum` varchar(15) DEFAULT NULL,
  `studFYPTitle` varchar(100) NOT NULL,
  `studSV` varchar(10) DEFAULT NULL,
  `studExam` varchar(10) DEFAULT NULL,
  `classID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studName`, `studEmail`, `studPassword`, `studPhoneNum`, `studFYPTitle`, `studSV`, `studExam`, `classID`) VALUES
('2020459282', 'Muhammad Yamin bin Ibrahim', '2020459282@student.uitm.edu.my', '123', '011-21060402', 'Electronic Document Management System (EDMS) for UiTM CS240 Forms and Evaluation Rubrics', '111118', '123456', 'D1CS2406A20232'),
('2020470564', 'NOR ADZIEMAH BINTI ZULKEFLI	', '2020470564@student.uitm.edu.my', 'no2020470564	', '011-21090603', '1111181', '2020844226', NULL, 'D1CS2406A20232'),
('2020479614', 'MUHAMMAD FAIQ BIN MAHD NOR	', '2020479614@student.uitm.edu.my', 'mu2020479614	', '011-21090603', '', '2020489284', NULL, 'D1CS2406A20232'),
('2020482932', 'MOHAMAD ASYRAF BIN AZMI	', '2020482932@student.uitm.edu.my', 'mo2020482932	', '011-21090603', '', '2020482932', NULL, 'D1CS2406A20232'),
('2020489284', 'BURHANUDDIN BIN ZAKARIA	', '2020489284@student.uitm.edu.my', 'bu2020489284', '011-21090603', '', '2020844226', NULL, 'D1CS2406A20232'),
('2020601748', 'NUR BATRISYIA HASBI BINTI HASMADI	', '2020601748@student.uitm.edu.my', 'nu2020601748	', '011-21090603', '', '2020489284', NULL, 'D1CS2406A20232'),
('2020605358', 'NORFATIN NATASHA BINTI NORAZMAN	', '2020605358@student.uitm.edu.my', 'no2020605358	', '011-21090603', '', '2020482932', NULL, 'D1CS2406A20232'),
('2020618198', 'MUHAMMAD ZULHELMI BIN MUHAMMAD OTHMAN	', '2020618198@student.uitm.edu.my', 'mu2020618198', '011-21090603', '', '2020847258', NULL, 'D1CS2406A20232'),
('2020822268', 'NUR AQILAH BINTI KAMALUDIN	', '2020822268@student.uitm.edu.my', 'nu2020822268	', '011-21090603', '', '2021125459', NULL, 'D1CS2406A20232'),
('2020834486', 'NUR ARINAH IZZATI BINTI MOHD AFAZI	', '2020834486@student.uitm.edu.my', 'nu2020834486	', '011-21090603', '', '2020847258', NULL, 'D1CS2406A20232'),
('2020844226', 'AHMAD ASLAM BIN YAMANI', '2020844226@student.uitm.edu.my', 'ah2020844226', '011-21090603', '', '2021125459', NULL, 'D1CS2406A20232'),
('2020847258', 'MOHAMAD ILHAM BIN BAWI	', '2020847258@student.uitm.edu.my', 'mo2020847258	', '011-21090603', '', '2020479614', NULL, 'D1CS2406A20232'),
('2020866316', 'NIK ZURAZNITA BINTI ABDUL GHANI	', '2020866316@student.uitm.edu.my', 'ni2020866316	', '011-21090603', '', '2020618198', NULL, 'D1CS2406A20232'),
('2020897382', 'NOR AZLIN BINTI MOHAMAD	', '2020897382@student.uitm.edu.my', 'no2020897382	', '011-21090603', '', '2020479614', NULL, 'D1CS2406A20232'),
('2021125459', 'MUHAMMAD AMIR BIN ZAINUDIN	', '2021125459@student.uitm.edu.my', 'mu2021125459	', '011-21090603', '', '', NULL, 'D1CS2406A20232'),
('2023111222', 'Abu in Bakar', '2023111222@student.uitm.edu.my', 'Ab2023111222', '012-12345678', '', '1111181', NULL, 'D1CS2405A20232');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `adminClassFK` (`adminID`);

--
-- Indexes for table `doctype`
--
ALTER TABLE `doctype`
  ADD PRIMARY KEY (`docCode`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `docType` (`docCode`),
  ADD KEY `studID` (`studID`),
  ADD KEY `lectID` (`lectID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lectID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `class` (`classID`),
  ADD KEY `supervisor` (`studSV`),
  ADD KEY `examiner` (`studExam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `docID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `adminClassFK` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `adminID` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `docType` FOREIGN KEY (`docCode`) REFERENCES `doctype` (`docCode`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `lectID` FOREIGN KEY (`lectID`) REFERENCES `lecturer` (`lectID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `studID` FOREIGN KEY (`studID`) REFERENCES `student` (`studID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `class` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
