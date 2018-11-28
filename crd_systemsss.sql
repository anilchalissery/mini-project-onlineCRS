-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 03:36 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crd_systemsss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company_reg`
--

CREATE TABLE `company_reg` (
  `cm_id` int(11) NOT NULL,
  `cm_name` varchar(50) NOT NULL,
  `Hr_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` bigint(50) NOT NULL,
  `site_addr` varchar(50) NOT NULL,
  `about_us` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_reg`
--

INSERT INTO `company_reg` (`cm_id`, `cm_name`, `Hr_name`, `email`, `contact_no`, `site_addr`, `about_us`, `username`, `password`) VALUES
(1, 'TCS', 'Shobha Kumar', 'shobhakumar@gmail.com', 9874561230, 'https://www.tcs.com', 'Tata Consultancy Services Limited is an Indian multinational information technology service, consulting company headquartered in Mumbai, Maharashtra. It is part of the Tata Group and operates in 46 countries. TCS is one of the largest Indian companies by market capitalization.', 'tcs@gmail.com', 'tcs123'),
(2, 'WIPRO', 'Karan C', 'karanc@gmail.com', 9852361471, 'https://www.wipro.com', 'Wipro Ltd. Wipro Ltd., the flagship company of the Azim H Premji group was incorporated in the year 1945. The company started off originally as a manufacturer of vegetable ghee/vanaspati, refined edible oils etc. Gradually the company has diversified into various other businesses.Abidali Neemuchwala was appointed as Wipro CEO ', 'wipro@gmail.com', 'wipro1945'),
(3, 'Infosys Ltd', 'Anil', 'anil@gmail.com', 9632587411, 'http://www.infosys.com', 'infofys is a IT firm that provide software products & its solutions.', 'infosys@gmail.com', 'infosys'),
(4, 'SHREDS', 'Sonel', 'sonel@gmail.com', 9876543254, 'http://www.shredskerala.com', 'Sherds kerala is a recruiting agency that provide job oppurtunity.', 'shreds@gmail.com', 'shd'),
(5, 'Cts', 'Riya', 'ria@gmail.com', 9875432211, 'http://www.cts.com', 'provides job', 'cts@gmail.com', 'cts12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `cm_id` int(250) NOT NULL,
  `job_name` varchar(250) NOT NULL,
  `job_desc` varchar(250) NOT NULL,
  `eligibility` varchar(250) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `date_to_apply` varchar(50) NOT NULL,
  `Posted_By` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `cm_id`, `job_name`, `job_desc`, `eligibility`, `location`, `salary`, `date_to_apply`, `Posted_By`) VALUES
(1, 2, 'Trainee Software Developer', '2019 pass out', 'Btech and  MCA  cgpa 6.375', 'Chennai', '2 to 4 lacs per annum', '2018-11-30', 'Karan C'),
(2, 2, 'Trainee Software Engineer', 'Better communication skill,Good knowledge in software development.', '70% Aggregate throughout their academic career.MCA and BTech 2019 pass out', 'Udupi', '3.25 lacs per annum', '2018-12-16', 'Karan C'),
(3, 2, 'Software Tester', 'Write test cases, writing test plans, test scripts. Basic understanding of NoSQL DB like MongoDB and able to write queries.Strong communication and collaboration skills\r\nShould have good exposure to all types of testing such asUnit,Integration,System', 'Btech and MCA 2019 pass out with 70% aggregate.', 'Chennai', ' 2 to 2.4 lac per annum', '2018-11-25', 'Karan C'),
(4, 2, 'Software Tester', 'Write test cases, writing test plans, test scripts. Basic understanding of NoSQL DB like MongoDB and able to write queries.Strong communication and collaboration skills\r\nShould have good exposure to all types of testing such asUnit,Integration,System', 'Btech and MCA 2019 pass out with 70% aggregate.', 'Bangalore', ' 2 to 2.4 lac per annum', '2018-11-25', 'Karan C'),
(5, 4, 'software developer', 'better communicatn skill', ' mca & btech 2019 passout', 'Karnataka', '3 lakh', '2018-11-06', 'Sonel'),
(6, 5, 'Software developer', 'todevelop sw', 'beter communicatn ,programming lang', 'kerala', '3 lakh', '2018-11-07', 'Riya');

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `ap_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `YOP` varchar(5) NOT NULL,
  `Curr_CGPA` varchar(5) NOT NULL,
  `Backlogs` varchar(3) NOT NULL,
  `sslcyop` varchar(5) NOT NULL,
  `sslcperc` varchar(2) NOT NULL,
  `plustwoyop` varchar(5) NOT NULL,
  `plustwoperc` varchar(2) NOT NULL,
  `Dgryop` varchar(5) NOT NULL,
  `graduperc` varchar(3) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_academics`
--

INSERT INTO `student_academics` (`ap_id`, `st_id`, `job_id`, `YOP`, `Curr_CGPA`, `Backlogs`, `sslcyop`, `sslcperc`, `plustwoyop`, `plustwoperc`, `Dgryop`, `graduperc`, `resume`, `photo`) VALUES
(1, 1, 1, '2019', '8', '2', '2012', '62', '2014', '92', '2017', '80', 'wm-graph', 'company registrartion'),
(2, 5, 3, '2019', '8', '4', '2012', '96', '2014', '95', '2017', '82', 'certf5copy.pdf', 'screencapture-localhost-final-mini-proj-grp-13-201');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `st_id` int(50) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `st_address` varchar(250) NOT NULL,
  `st_gender` varchar(50) NOT NULL,
  `st_dob` date NOT NULL,
  `st_mobile` bigint(50) NOT NULL,
  `st_qualification` varchar(50) NOT NULL,
  `st_email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`st_id`, `st_name`, `st_address`, `st_gender`, `st_dob`, `st_mobile`, `st_qualification`, `st_email`, `username`, `password`) VALUES
(1, 'Aiswarya B', 'Vadakkekara House\r\nChiyyaram P O\r\nThrissur					', 'Female', '1995-05-31', 9974512622, 'BTech', 'aisu@gmail.com', 'AISWARYA B', 'aisu07'),
(2, 'Sowparnika', 'Near Vivekodyam School\r\nThrissur					', 'Female', '1996-09-18', 9874521622, 'MCA', 'sowpu@gmail.com', 'SOWPARNIKA', 'sowpu123'),
(3, 'Amal', 'Birds nest\r\nKollam					', 'Male', '1995-11-02', 9874512000, 'MCA', 'amal@gmail.com', 'AMAL', 'amal95'),
(4, 'Binu', 'Nandhanm house\r\nThrissur					', 'Female', '1998-11-21', 7874521631, 'MCA', 'binu@gmail.com', 'BINU ', 'binub'),
(5, 'Binu B', 'vadakkekara house\r\nthrissur', 'Female', '1996-11-04', 9974512682, 'MCA', 'binu10@gmail.com', 'BINU', 'binu'),
(6, 'pooja', 'abcstret,tcr', 'Female', '1995-11-06', 9974512456, 'MCA---', 'pooja@gmail.com', 'POOJA', 'pooja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `company_reg`
--
ALTER TABLE `company_reg`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_reg`
--
ALTER TABLE `company_reg`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `st_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD CONSTRAINT `student_academics_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student_reg` (`st_id`),
  ADD CONSTRAINT `student_academics_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
