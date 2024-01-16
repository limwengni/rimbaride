-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 07:30 AM
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
(47, 'Johor', 'Penang', 10, '2022-12-27', '10:00', 'ABC1234', 8, 1),
(48, 'Johor', 'Kedah', 3, '2022-12-30', '08:00', 'DEF345', 28, 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
