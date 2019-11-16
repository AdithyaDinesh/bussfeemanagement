-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 05:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment`
--

CREATE TABLE `fee_payment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  `distance` float NOT NULL,
  `bus_no` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `place`, `distance`, `bus_no`, `price`) VALUES
(1, 'Mangalore', 33, 1, 3000),
(2, 'Karkala', 22.3, 2, 2650),
(3, 'locaction', 55, 3, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `destination` int(11) NOT NULL,
  `yoj` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `fill_fee` AFTER INSERT ON `students` FOR EACH ROW INSERT INTO `fee_payment` ( `id`, `student_id`, `month`, `year`, `status`) VALUES ( NULL,NEW.id, '1' ,  NEW.yoj , '0'),(NULL, NEW.id , '2', NEW.yoj , '0'),(NULL, NEW.id , '3', NEW.yoj , '0'),(NULL, NEW.id , '4', NEW.yoj ,  '0'),(NULL, NEW.id , '5', NEW.yoj ,  '0'),(NULL, NEW.id , '6', NEW.yoj ,  '0'),(NULL, NEW.id , '7', NEW.yoj ,  '0'),(NULL, NEW.id , '8', NEW.yoj ,  '0'),(NULL, NEW.id , '9', NEW.yoj ,  '0'),(NULL, NEW.id , '10', NEW.yoj ,  '0'),(NULL, NEW.id , '11', NEW.yoj ,  '0'),(NULL, NEW.id , '12', NEW.yoj ,  '0'),(NULL, NEW.id , '1', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '2', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '3', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '4', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '5', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '6', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '7', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '8', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '9', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '10', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '11', NEW.yoj+1 ,  '0'),(NULL, NEW.id , '12', NEW.yoj+1 ,  '0'),(NULL, NEW.id ,'1' ,  NEW.yoj+2 ,  '0'),(NULL, NEW.id , '2', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '3', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '4', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '5', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '6', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '7', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '8', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '9', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '10', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '11', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '12', NEW.yoj+2 ,  '0'),(NULL, NEW.id , '1' , NEW.yoj+3 ,  '0'),(NULL, NEW.id , '2', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '3', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '4', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '5', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '6', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '7', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '8', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '9', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '10', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '11', NEW.yoj+3 ,  '0'),(NULL, NEW.id , '12', NEW.yoj+3 ,  '0')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_payment`
--
ALTER TABLE `fee_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination` (`destination`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fee_payment`
--
ALTER TABLE `fee_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_payment`
--
ALTER TABLE `fee_payment`
  ADD CONSTRAINT `fee_payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`destination`) REFERENCES `location` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
