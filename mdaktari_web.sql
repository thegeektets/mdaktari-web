-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 07:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdaktari_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_calendar`
--

CREATE TABLE `bookings_calendar` (
  `appointment_id` int(11) NOT NULL,
  `appointment_reason` varchar(500) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings_calendar`
--

INSERT INTO `bookings_calendar` (`appointment_id`, `appointment_reason`, `appointment_date`, `appointment_time`, `patient_id`, `patient_name`, `patient_email`, `patient_phone`, `doctor_id`, `appointment_status`) VALUES
(1, 'mdaktari test', '2017-03-02', '13:00:00', NULL, 'Griffin Muteti', 'griffin@tunaweza.com', '0702990800', 11, 'CONFIRMED'),
(2, 'test with bae', '2017-03-02', '15:00:00', NULL, 'Griffin Muteti', 'griffin@tunaweza.com', '0702990800', 11, 'CONFIRMED'),
(3, 'meet bae at work            ', '2017-02-09', '09:00:00', 1, 'Griffin Muteti', 'griffin@tunaweza.com', '702990800', 1, 'PENDING'),
(4, 'meet bae at work            ', '2017-02-09', '09:00:00', 1, 'Griffin Muteti', 'griffin@tunaweza.com', '702990800', 1, 'PENDING'),
(5, 'meet bae at work', '2017-02-02', '08:00:00', 1, 'Griffin Muteti', 'griffin@tunaweza.com', '702990800', 11, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_settings`
--

CREATE TABLE `calendar_settings` (
  `cal_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `work_day` varchar(1100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `off_day` tinyint(1) DEFAULT '0',
  `sess_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_settings`
--

INSERT INTO `calendar_settings` (`cal_id`, `doctor_id`, `work_day`, `start_time`, `end_time`, `off_day`, `sess_duration`) VALUES
(50, 0, '0', '08:00:00', '18:00:00', 0, 1),
(51, 0, '1', '08:00:00', '18:00:00', NULL, 1),
(52, 0, '2', '08:00:00', '18:00:00', NULL, 1),
(53, 0, '3', '08:00:00', '18:00:00', NULL, 1),
(54, 0, '4', '08:00:00', '18:00:00', NULL, 1),
(55, 0, '5', '00:00:00', '00:00:00', NULL, 0),
(56, 0, '6', '00:00:00', '00:00:00', NULL, 0),
(64, 11, 'Monday', '08:00:00', '18:00:00', 0, 1),
(65, 11, 'Tuesday', '08:00:00', '18:00:00', 0, 1),
(66, 11, 'Wednesday', '08:00:00', '18:00:00', 0, 1),
(67, 11, 'Thursday', '08:00:00', '18:00:00', 0, 1),
(68, 11, 'Friday', '08:00:00', '18:00:00', 0, 1),
(69, 11, 'Saturday', '00:00:00', '00:00:00', 1, 0),
(70, 11, 'Sunday', '00:00:00', '00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reviews`
--

CREATE TABLE `doctor_reviews` (
  `review_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `review_title` varchar(200) NOT NULL,
  `review_desc` varchar(500) NOT NULL,
  `review_number` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `doctor_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `speciality` varchar(200) NOT NULL,
  `personal_statement` varchar(1600) DEFAULT NULL,
  `resume_url` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `town` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_address` varchar(200) NOT NULL,
  `office_address` varchar(1000) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`doctor_id`, `fullname`, `dob`, `gender`, `qualification`, `experience`, `speciality`, `personal_statement`, `resume_url`, `phone`, `town`, `country`, `postal_address`, `office_address`, `user_id`, `id_number`) VALUES
(1, 'Dr Betty Gakii', NULL, '', '', '', 'Cardiologist', NULL, '', 703175256, '0', '0', '1009-90200                  ', NULL, 9, 0),
(2, 'Dr Betty Gakii', '2017-02-22', 'Female', 'PHD', '3', 'Cardiologist', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              Lorem ipsum dolor sit amet, quis nusquam no his, novum ceteros eum at. Probo partem sea id, et delenit eligendi conclusionemque usu, qui facilis splendide intellegam ei. Quo in habeo laoreet. Sea omnes verterem constituam in                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ', '', 703175256, 'Nairobi', 'Kenya', '1009-90200                 ', '171 Nandi Road , Karen', 11, 0),
(3, 'Griffin', NULL, '', '', '', 'Pshycatrist', NULL, '', 702990800, '0', '0', '1009-90200', NULL, 12, 0),
(4, 'Griffin', NULL, '', '', '', 'Pshycatrist', NULL, '', 702990800, '0', '0', '1009-90200', NULL, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `patient_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `postal_address` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`patient_id`, `fullname`, `dob`, `sex`, `town`, `country`, `postal_address`, `occupation`, `phone`, `user_id`) VALUES
(1, 'Griffin Muteti', '0000-00-00', '', 'Nairobi', 'Kenya', '1009-90200', '', 702990800, 1),
(2, 'Griffin Muteti', '0000-00-00', '', 'Nairobi', 'Kenya', '1009-90200', '', 702990800, 7),
(3, 'Griffin', '0000-00-00', '', 'Nairobi', 'Kenya', '1009-90200', '', 702990800, 18),
(4, 'Griffin', '0000-00-00', '', 'Nairobi', 'Kenya', '1009-90200', '', 702990800, 20);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_calendar`
--

CREATE TABLE `schedule_calendar` (
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_calendar`
--

INSERT INTO `schedule_calendar` (`doctor_id`, `date`, `start_time`, `end_time`, `schedule_id`) VALUES
(11, '2017-02-28', '08:00:00', '18:00:00', 15),
(11, '2017-03-02', '08:00:00', '12:00:00', 16),
(11, '2017-03-03', '10:00:00', '12:00:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_date` datetime NOT NULL,
  `user_avatar` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `user_type`, `signup_date`, `login_date`, `user_avatar`) VALUES
(1, 'griffin@tunaweza.com', 'd5df6f9e5bc8cf58c8218b8dfe1429b9', 'patient', '2017-02-07 10:29:23', '0000-00-00 00:00:00', NULL),
(7, 'griffinmuteti31@gmail.com', '76879ad68b6a13c5f612eaceb50c9de7', 'patient', '2017-02-09 09:36:25', '0000-00-00 00:00:00', NULL),
(11, 'betty@gmail.com', 'cba8255b567cc5fb890a4d8c9be8cc28', 'doctor', '2017-02-21 14:28:32', '0000-00-00 00:00:00', 'http://localhost/mdaktari-web/assets/uploads/2429897358_2bda04e801_b.jpg'),
(12, 'griffin@gmail.com', 'd5df6f9e5bc8cf58c8218b8dfe1429b9', 'doctor', '2017-02-10 08:44:40', '0000-00-00 00:00:00', NULL),
(16, 'griffin@gmil.com', 'd5df6f9e5bc8cf58c8218b8dfe1429b9', 'doctor', '2017-02-10 08:48:07', '0000-00-00 00:00:00', NULL),
(18, 'griffin@gmiil.com', 'd5df6f9e5bc8cf58c8218b8dfe1429b9', 'patient', '2017-02-10 08:54:35', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_calendar`
--
ALTER TABLE `bookings_calendar`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `calendar_settings`
--
ALTER TABLE `calendar_settings`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indexes for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `schedule_calendar`
--
ALTER TABLE `schedule_calendar`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_calendar`
--
ALTER TABLE `bookings_calendar`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `calendar_settings`
--
ALTER TABLE `calendar_settings`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `doctor_reviews`
--
ALTER TABLE `doctor_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_table`
--
ALTER TABLE `doctor_table`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedule_calendar`
--
ALTER TABLE `schedule_calendar`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
