-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 03:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseid` int(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `course`, `module`) VALUES
(1, 'CertHE in Skills', 'CertHE in Skills'),
(2, 'CertHE in Skills', 'CertHE in Skills'),
(98, 'Health and Social Care', 'CPR'),
(99, 'Health and Social Care', 'Salam'),
(102, 'Health and Social Care', 'Risk Assessment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(30) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `course` varchar(30) NOT NULL,
  `id` int(40) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `FirstName`, `LastName`, `Password`, `course`, `id`, `user_type`) VALUES
('stelianclaudiu92@yahoo.ro', 'Claudiu', 'Stelian', 'Leepiciu1', 'CertHE in Skills', 390, 'admin'),
('stelianclaudiu92@yahoo.com', 'Claudiu', 'Stelian', 'Leepiciu1', 'Health and Social Care', 392, 'student'),
('stelianclaudiu92@yahoo.roo', 'Claudiu', 'Stelian', 'Leepiciu1', 'Health and Social Care', 393, ''),
('stelianclaudiu92@yahoo.rom', 'Claudiu', 'Stelian', 'Leepiciu1', 'CertHE in Skills', 394, ''),
('truscastefy@gmail.com', 'Georgiana', 'Trusca', 'Leepiciu1', 'CertHE in Skills', 396, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseid`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
