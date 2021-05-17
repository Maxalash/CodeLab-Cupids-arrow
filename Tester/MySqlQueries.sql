-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 05:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_advice`
--

CREATE TABLE `daily_advice` (
  `horoscope_id` int(11) NOT NULL,
  `expectation` varchar(255) NOT NULL,
  `warning` varchar(255) NOT NULL,
  `guide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `person_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `conversation` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `horoscope`
--

CREATE TABLE `horoscope` (
  `horoscope_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `zodiac_sign` varchar(24) NOT NULL,
  `horoscope` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `numerology`
--

CREATE TABLE `numerology` (
  `first_num` varchar(24) DEFAULT NULL,
  `second_num` varchar(24) DEFAULT NULL,
  `compatability` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `numerology` int(100) NOT NULL,
  `birth` date NOT NULL DEFAULT current_timestamp(),
  `year_sign` varchar(100) NOT NULL,
  `zodiac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
ALTER TABLE `personal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------

--
-- Table structure for table `year_sign`
--

CREATE TABLE `year_sign` (
  `first_sign` varchar(25) NOT NULL,
  `second_sigh` varchar(25) NOT NULL,
  `compatability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `zodiac`
--

CREATE TABLE `zodiac` (
  `first_sign` varchar(24) NOT NULL,
  `second_sign` varchar(24) NOT NULL,
  `compatability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_advice`
--
ALTER TABLE `daily_advice`
  ADD KEY `fk_horoscope_id` (`horoscope_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `fk_person_id` (`person_id`),
  ADD KEY `fk_friend_id` (`friend_id`);

--
-- Indexes for table `horoscope`
--
ALTER TABLE `horoscope`
  ADD PRIMARY KEY (`horoscope_id`);

--
-- Indexes for table `personal`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_advice`
--
ALTER TABLE `daily_advice`
  ADD CONSTRAINT `fk_horoscope_id` FOREIGN KEY (`horoscope_id`) REFERENCES `horoscope` (`horoscope_id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_friend_id` FOREIGN KEY (`friend_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `fk_person_id` FOREIGN KEY (`person_id`) REFERENCES `personal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
