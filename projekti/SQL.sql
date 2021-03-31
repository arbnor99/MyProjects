-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtick`
--

-- --------------------------------------------------------

--
-- Table structure for table `anetaret`
--

CREATE TABLE `anetaret` (
  `anetariID` int(30) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `datlindja` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `roli` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anetaret`
--

INSERT INTO `anetaret` (`anetariID`, `emri`, `mbiemri`, `datlindja`, `email`, `password`, `telefoni`, `roli`) VALUES
(1, 'Elon', 'Musk', '1980-08-27', 'elon@yahoo.com', '12345', '044159854', b'1'),
(3, 'Bleona', 'Meha', '1990-06-14', 'bleona@yahoo.com', '12345', '049148569', b'1'),
(4, 'Arianit', 'Mazreku', '1995-07-24', 'arianit@gmail.com', '12345', '044159854', b'0'),
(5, 'Fatmir', 'Berisha', '1980-06-17', 'fatmir@hotmail.com', '12345', '045398756', b'0'),
(6, 'Blerim', 'Beku', '1999-08-04', 'blerim@yahoo.com', '12345', '045889988', b'1'),
(7, 'Egzona', 'Sadiku', '0000-00-00', 'egzona@yahoo.com', '12345', '049872558', b'0'),
(8, 'Shaban', 'Gashi', '1998-06-30', 'shaban@yahoo.com', '12345', '044812214', b'0'),
(9, 'Gjergj', 'Bardhi', '1991-02-15', 'gjergj@yahoo.com', '12345', '04527333', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `artikujt`
--

CREATE TABLE `artikujt` (
  `artikulliID` int(20) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `pelqimet` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikujt`
--

INSERT INTO `artikujt` (`artikulliID`, `emri`, `pelqimet`) VALUES
(1, 'Softueret', 0),
(2, 'Programimi', 0),
(3, 'Teknologjia', 0),
(4, 'Cybersecurity', 0),
(5, 'JAVA', 0),
(6, 'C++', 0),
(7, 'HTML', 0),
(8, 'Smart TV', 0),
(9, 'Rrjetat kompjuterike', 0),
(10, 'Smart phones', 0),
(11, 'Inetrneti', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komentet`
--

CREATE TABLE `komentet` (
  `komentiID` int(20) NOT NULL,
  `anetariID` int(20) NOT NULL,
  `artikulliID` int(20) NOT NULL,
  `komenti` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentet`
--

INSERT INTO `komentet` (`komentiID`, `anetariID`, `artikulliID`, `komenti`) VALUES
(2, 3, 6, 'Shume i qelluar'),
(4, 9, 2, 'Ka mundur te shkruhet me mire'),
(7, 1, 1, ''),
(8, 1, 1, 'cnjecnkencnj'),
(9, 1, 1, 'cnjecnkencnj'),
(10, 1, 1, 'cnjecnkencnj'),
(11, 1, 7, ''),
(12, 1, 7, ''),
(13, 1, 7, ''),
(14, 1, 7, ''),
(15, 1, 7, ''),
(16, 1, 7, ''),
(17, 1, 9, ''),
(18, 1, 9, 'cnjecnkencnj'),
(21, 1, 4, ''),
(25, 1, 9, ''),
(26, 1, 9, ''),
(28, 1, 7, ''),
(30, 1, 3, ''),
(32, 1, 7, ''),
(34, 1, 6, ''),
(35, 1, 6, ''),
(36, 1, 6, ''),
(37, 1, 6, ''),
(41, 1, 3, ''),
(42, 1, 7, ''),
(43, 1, 7, ''),
(44, 1, 7, ''),
(45, 1, 7, ''),
(47, 1, 7, ''),
(48, 1, 7, ''),
(49, 1, 7, ''),
(50, 1, 7, ''),
(52, 1, 7, ''),
(53, 1, 7, ''),
(54, 1, 7, ''),
(55, 1, 7, ''),
(56, 1, 7, ''),
(57, 1, 7, ''),
(58, 1, 7, ''),
(59, 1, 7, ''),
(60, 1, 7, ''),
(61, 1, 7, ''),
(62, 1, 7, ''),
(63, 1, 7, ''),
(64, 1, 7, ''),
(65, 1, 7, ''),
(66, 1, 7, ''),
(67, 1, 7, ''),
(68, 1, 7, ''),
(71, 1, 6, ''),
(73, 1, 10, ''),
(74, 1, 10, 'cnjecnkencnj'),
(76, 1, 11, ''),
(77, 1, 11, ''),
(80, 1, 4, ''),
(86, 5, 7, 'cnjecnkencnj'),
(87, 5, 7, 'Artikull i qelluar');

-- --------------------------------------------------------

--
-- Table structure for table `punet`
--

CREATE TABLE `punet` (
  `punaID` int(20) NOT NULL,
  `anetariID` int(30) NOT NULL,
  `artikulliID` int(11) NOT NULL,
  `pershkrimi` varchar(50) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punet`
--

INSERT INTO `punet` (`punaID`, `anetariID`, `artikulliID`, `pershkrimi`, `data`) VALUES
(3, 6, 4, 'Artikull rreth sigurise se te dhenave', '2018-03-05'),
(4, 1, 5, 'Artikull per gjuhen programuese JAVA', '2018-09-07'),
(5, 3, 3, 'Artikull per zhvillimet teknologjike', '2018-03-05'),
(6, 7, 8, 'Artikull rreth Smart TV', '2019-11-18'),
(7, 4, 6, 'Artikull per gjuhen progarmuese C++', '2020-08-25'),
(9, 5, 11, 'Artikull per historine e internetit', '2019-08-19'),
(10, 8, 10, 'Artikull per telefonat e menqur', '2018-09-25'),
(14, 1, 9, 'Artikull per rrjetat ', '2020-08-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anetaret`
--
ALTER TABLE `anetaret`
  ADD PRIMARY KEY (`anetariID`);

--
-- Indexes for table `artikujt`
--
ALTER TABLE `artikujt`
  ADD PRIMARY KEY (`artikulliID`);

--
-- Indexes for table `komentet`
--
ALTER TABLE `komentet`
  ADD PRIMARY KEY (`komentiID`),
  ADD KEY `anetariID` (`anetariID`),
  ADD KEY `artikulliID` (`artikulliID`);

--
-- Indexes for table `punet`
--
ALTER TABLE `punet`
  ADD PRIMARY KEY (`punaID`),
  ADD KEY `artikulliID` (`artikulliID`),
  ADD KEY `anetariID` (`anetariID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anetaret`
--
ALTER TABLE `anetaret`
  MODIFY `anetariID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artikujt`
--
ALTER TABLE `artikujt`
  MODIFY `artikulliID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentet`
--
ALTER TABLE `komentet`
  MODIFY `komentiID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `punet`
--
ALTER TABLE `punet`
  MODIFY `punaID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentet`
--
ALTER TABLE `komentet`
  ADD CONSTRAINT `komentet_ibfk_1` FOREIGN KEY (`anetariID`) REFERENCES `anetaret` (`anetariID`),
  ADD CONSTRAINT `komentet_ibfk_2` FOREIGN KEY (`artikulliID`) REFERENCES `artikujt` (`artikulliID`),
  ADD CONSTRAINT `komentet_ibfk_3` FOREIGN KEY (`anetariID`) REFERENCES `anetaret` (`anetariID`);

--
-- Constraints for table `punet`
--
ALTER TABLE `punet`
  ADD CONSTRAINT `punet_ibfk_1` FOREIGN KEY (`anetariID`) REFERENCES `anetaret` (`anetariID`),
  ADD CONSTRAINT `punet_ibfk_2` FOREIGN KEY (`artikulliID`) REFERENCES `artikujt` (`artikulliID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
