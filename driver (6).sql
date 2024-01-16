-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 07:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driver`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `location` text NOT NULL,
  `destination` text NOT NULL,
  `pax` int(11) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `vehicle_number` text NOT NULL,
  `ride_id` int(11) NOT NULL,
  `currentPax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `location`, `destination`, `pax`, `date`, `time`, `vehicle_number`, `ride_id`, `currentPax`) VALUES
(27, 'Kuala Lumpur', 'Penang', 3, '2022-12-16', '19:00', 'ABC1234', 1, 1),
(28, 'Kuala Lumpur', 'Penang', 3, '2022-12-16', '19:00', 'ABC1234', 1, 2),
(29, 'Kuala Lumpur', 'Penang', 3, '2022-12-16', '19:00', 'ABC1234', 1, 3),
(30, 'Kuala Lumpur', '1 Utama', 3, '2022-12-21', '20:00', 'AAA112', 10, 1),
(31, 'Kuala Lumpur', '1 Utama', 3, '2022-12-21', '20:00', 'AAA112', 10, 2),
(32, 'Kuala Lumpur', '1 Utama', 3, '2022-12-21', '20:00', 'AAA112', 10, 3),
(33, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 11, 1),
(34, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 2, 1),
(35, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 2, 2),
(36, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 2, 3),
(37, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 2, 4),
(38, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 2, 5),
(39, 'Penang', 'Kedah', 3, '2022-12-17', '19:00', 'ABC1234', 7, 1),
(40, 'Penang', 'Kedah', 3, '2022-12-17', '19:00', 'ABC1234', 7, 2),
(41, 'Penang', 'Kedah', 3, '2022-12-17', '19:00', 'ABC1234', 7, 3),
(42, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 11, 2),
(43, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 11, 3),
(44, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 11, 4),
(45, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 11, 5),
(46, 'Johor', 'Penang', 10, '2022-12-27', '10:00', 'ABC1234', 8, 1),
(47, 'Johor', 'Penang', 10, '2022-12-27', '10:00', 'ABC1234', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(255) NOT NULL,
  `driver_name` text NOT NULL,
  `driver_nric` text NOT NULL,
  `driver_mobileNum` text NOT NULL,
  `vehicle_type` text NOT NULL,
  `vehicle_model` text NOT NULL,
  `vehicle_number` text NOT NULL,
  `password` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `driver_nric`, `driver_mobileNum`, `vehicle_type`, `vehicle_model`, `vehicle_number`, `password`) VALUES
(3, 'Lim Weng Ni', '031227090058', '0192091661', 'Car', 'Nissan', 'DEF345,', '02666e91a476db35515b637eec03cf63'),
(4, 'Lim Weng Kee', '070816141222', '0102031661', 'Van', 'Toyota', 'AAA111,', '02666e91a476db35515b637eec03cf63'),
(5, 'Lim Weng Weng', '070816141224', '0112031662', 'Van', 'Toyota', 'BBB222,', '02666e91a476db35515b637eec03cf63'),
(6, 'Lim Ko Pi', '070816141225', '0112031662', 'Van', 'Toyota', 'AAA112,BBB112,', '02666e91a476db35515b637eec03cf63'),
(12, 'Lim Teh', '070816141227', '0112031661', 'Van', 'Toyota', 'AAAA100,AAAA112,', '02666e91a476db35515b637eec03cf63'),
(14, 'Teh Tarik', '031227090057', '0192091662', 'Van', 'Toyota', 'AAAA102,', '02666e91a476db35515b637eec03cf63'),
(17, 'Lim Bodoh', '070816141228', '0112031664', 'Car', 'Toyota', 'AAA1111,', '02666e91a476db35515b637eec03cf63'),
(18, 'Ang Boon Ching', '070816141229', '0192091667', 'Van', 'Honda Aircod', 'WEB0024,', '02666e91a476db35515b637eec03cf63');

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(255) NOT NULL,
  `location` text NOT NULL,
  `destination` text NOT NULL,
  `pax` int(32) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `vehicle_number` text NOT NULL,
  `currentPax` int(11) NOT NULL,
  `book_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `location`, `destination`, `pax`, `date`, `time`, `vehicle_number`, `currentPax`, `book_status`) VALUES
(1, 'Kuala Lumpur', 'Penang', 3, '2022-12-16', '19:00', 'ABC1234', 3, 'Full'),
(2, 'Pahang', 'Penang', 5, '2022-12-18', '08:00', 'ABC1234', 5, 'Full'),
(7, 'Penang', 'Kedah', 3, '2022-12-17', '19:00', 'ABC1234', 3, 'Full'),
(8, 'Johor', 'Penang', 10, '2022-12-27', '10:00', 'ABC1234', 1, 'Ready to book'),
(9, 'Pahang', 'Kedah', 10, '2022-12-22', '03:00', 'DEF345', 0, 'Ready to book'),
(10, 'Kuala Lumpur', '1 Utama', 3, '2022-12-21', '20:00', 'AAA112', 3, 'Full'),
(11, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 5, 'Full'),
(12, 'Johor', 'Melaka', 10, '2022-12-25', '10:00', 'DEF345', 0, 'Ready to book'),
(13, 'Kuala Lumpur', 'Melaka', 10, '2022-12-23', '21:00', 'DEF345', 0, 'Ready to book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `ride_id` (`ride_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `ride` (`ride_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
