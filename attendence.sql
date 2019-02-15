-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 12:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_emp`
--

CREATE TABLE `add_emp` (
  `id` int(255) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `FatherName` varchar(100) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_emp`
--

INSERT INTO `add_emp` (`id`, `Name`, `FatherName`, `Designation`, `Email`) VALUES
(1, 'Aman Gupta', 'Sankar Gupta', 'Manager', 'dpkgpta65@gmail.com'),
(2, 'Mansi Jha', 'Suresh Jha', 'Admin', 'manshi78@gmail.com'),
(3, 'Ronit kumar', 'xxxxxxxx', 'admin', 'ronitkumar565@gmail.com'),
(39, 'Deepak', 'ashmit', 'Admin', 'deepk@gmail.com'),
(41, 'Ronit kumar', 'Ronit kumar', 'manager', 'ronitkumar565@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `user_id`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `atten`
--

CREATE TABLE `atten` (
  `id` int(255) NOT NULL,
  `emp_id` int(255) DEFAULT NULL,
  `date` varchar(22) NOT NULL,
  `time` varchar(8) NOT NULL,
  `staus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atten`
--

INSERT INTO `atten` (`id`, `emp_id`, `date`, `time`, `staus`) VALUES
(1, 3, '30-01-19', '11:00:39', 'P'),
(2, 1, '31-01-19', '12:22:44', 'A'),
(3, 1, '01-02-19', '12:23:05', 'P'),
(4, 1, '02-02-19', '01:04:10', 'P'),
(5, 2, '01-02-19', '01:05:21', 'A'),
(6, 3, '01-02-19', '01:11:23', 'P'),
(7, 1, '06-02-19', '02:15:55', 'A'),
(8, 0, '06-02-19', '04:43:27', 'H'),
(9, 2, '06-02-19', '04:44:20', 'H'),
(10, 40, '06-02-19', '04:58:18', 'S'),
(11, 1, '06-02-19', '05:08:41', 'P'),
(12, 1, '08-02-19', '04:13:16', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_emp`
--
ALTER TABLE `add_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atten`
--
ALTER TABLE `atten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_emp`
--
ALTER TABLE `add_emp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atten`
--
ALTER TABLE `atten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
