-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 12:59 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `letterno` varchar(100) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `recievedate` date NOT NULL,
  `sredpm` int(11) NOT NULL,
  `asm` int(11) NOT NULL,
  `afa` int(11) NOT NULL,
  `stuff` int(11) NOT NULL,
  `actions` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `date`, `letterno`, `subject`, `recievedate`, `sredpm`, `asm`, `afa`, `stuff`, `actions`) VALUES
(24, '2019-07-01', 'edc/letter/mng/partiv/654', 'Problem in Ticket Booking', '2019-07-02', 0, 0, 0, 0, ''),
(25, '2019-07-02', 'edc/letter/mng/partiv/698', 'Refund Status', '2019-07-03', 0, 0, 0, 0, ''),
(26, '2019-07-03', 'edc/letter/mng/partiv/669', 'complaint against failed transaction', '2019-07-04', 0, 0, 0, 0, ''),
(27, '2019-07-04', 'edpm/letter/mng/partiv/670', 'Delayed in Asansol junction', '2019-07-05', 0, 0, 0, 0, ''),
(28, '2019-07-05', 'edc/letter/mng/partiv/677', 'Problem in Door locking system', '2019-07-06', 0, 0, 0, 0, ''),
(29, '2019-07-06', 'edc/letter/mng/partiv/878', 'Problem of AC in IT Section', '2019-07-07', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `user_name`, `pass`, `email`, `gender`) VALUES
(1, '', 'admin', 'admin', '', ''),
(2, 'Sr.Edpm', 'sredpm', 'abcdef', 'aredpm@abc.in', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
