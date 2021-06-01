-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 06:08 PM
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
  `first_num` int(3) DEFAULT NULL,
  `second_num` int(3) DEFAULT NULL,
  `compatability` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `numerology`
--

INSERT INTO `numerology` (`first_num`, `second_num`, `compatability`) VALUES
(1, 1, 'A good pair'),
(1, 5, 'A good pair'),
(1, 7, 'A good pair'),
(2, 2, 'A good pair'),
(2, 4, 'A good pair'),
(2, 8, 'A good pair'),
(3, 3, 'A good pair'),
(3, 6, 'A good pair'),
(3, 9, 'A good pair'),
(4, 4, 'A good pair'),
(4, 2, 'A good pair'),
(4, 8, 'A good pair'),
(5, 1, 'A good pair'),
(5, 5, 'A good pair'),
(5, 7, 'A good pair'),
(6, 3, 'A good pair'),
(6, 6, 'A good pair'),
(6, 9, 'A good pair'),
(7, 1, 'A good pair'),
(7, 5, 'A good pair'),
(7, 7, 'A good pair'),
(8, 2, 'A good pair'),
(8, 4, 'A good pair'),
(8, 8, 'A good pair'),
(9, 3, 'A good pair'),
(9, 6, 'A good pair'),
(9, 9, 'A good pair');

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
  `info` text DEFAULT NULL,
  `numerology` int(100) DEFAULT NULL,
  `birth` date NOT NULL DEFAULT current_timestamp(),
  `year_sign` varchar(100) DEFAULT NULL,
  `zodiac` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `username`, `password`, `name`, `surname`, `info`, `numerology`, `birth`, `year_sign`, `zodiac`) VALUES
(2, 'r', 'r', 'r', 'r', 'r', 9, '2021-05-19', 'ox', 'bull'),
(3, 'rr', '$2y$10$cr7MqLix2vEpDHDcOc', 'u', 's', 'r', 3, '2021-05-19', 'ox', 'bull'),
(4, 'i', '$2y$10$4FVDIAESxb2v1M0UEH', 'i', 'i', 'i', 9, '2021-05-19', 'ox', 'bull'),
(5, '1', '1111111', '1', '1', '1', 0, '2021-05-19', 'ox', 'bull'),
(6, 'f', 'ffffff', 'f', 'f', 'f', 6, '2021-05-19', 'ox', 'bull'),
(7, '123', '123123', '123', '123', '123', 0, '2021-05-23', '', 'twins');

-- --------------------------------------------------------

--
-- Table structure for table `year_sign`
--

CREATE TABLE `year_sign` (
  `first_sign` varchar(10) NOT NULL,
  `second_sigh` varchar(10) NOT NULL,
  `compatability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year_sign`
--

INSERT INTO `year_sign` (`first_sign`, `second_sigh`, `compatability`) VALUES
('rat', 'ox', 'Perfect match'),
('rat', 'dragon', 'Perfect match'),
('rat', 'monkey', 'Perfect match'),
('ox', 'rat', 'Perfect match'),
('ox', 'snake', 'Perfect match'),
('ox', 'rooster', 'Perfect match'),
('tiger', 'dragon', 'Perfect match'),
('tiger', 'horse', 'Perfect match'),
('tiger', 'pig', 'Perfect match'),
('rabbit', 'pig', 'Perfect match'),
('rabbit', 'dog', 'Perfect match'),
('rabbit', 'monkey', 'Perfect match'),
('rabbit', 'sheep', 'Perfect match'),
('rabbit', 'rooster', 'Perfect match'),
('rabbit', 'rat', 'Perfect match'),
('dragon', 'monkey', 'Perfect match'),
('dragon', 'rat', 'Perfect match'),
('dragon', 'rooster', 'Perfect match'),
('snake', 'dragon', 'Perfect match'),
('snake', 'rooster', 'Perfect match'),
('horse', 'tiger', 'Perfect match'),
('horse', 'sheep', 'Perfect match'),
('horse', 'rabbit', 'Perfect match'),
('sheep', 'rabbit', 'Perfect match'),
('sheep', 'horse', 'Perfect match'),
('sheep', 'pig', 'Perfect match'),
('monkey', 'ox', 'Perfect match'),
('monkey', 'rabbit', 'Perfect match'),
('dog', 'rabbit', 'Perfect match'),
('pig', 'rabbit', 'Perfect match'),
('pig', 'tiger', 'Perfect match'),
('pig', 'sheep', 'Perfect match'),
('rooster', 'ox', 'Perfect match'),
('rooster', 'snake', 'Perfect match');

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
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
