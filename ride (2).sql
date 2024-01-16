-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 11:00 AM
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
(8, 'Johor', 'Penang', 10, '2022-12-27', '10:00', 'ABC1234', 0, 'Ready to book'),
(9, 'Pahang', 'Kedah', 10, '2022-12-22', '03:00', 'DEF345', 0, 'Ready to book'),
(10, 'Kuala Lumpur', '1 Utama', 3, '2022-12-21', '20:00', 'AAA112', 3, 'Full'),
(11, 'Kuala Lumpur', '1 Utama', 5, '2022-12-22', '09:00', 'AAAA100', 1, 'Ready to book'),
(12, 'Johor', 'Melaka', 10, '2022-12-25', '10:00', 'DEF345', 0, 'Ready to book'),
(13, 'Kuala Lumpur', 'Melaka', 10, '2022-12-23', '21:00', 'DEF345', 0, 'Ready to book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
