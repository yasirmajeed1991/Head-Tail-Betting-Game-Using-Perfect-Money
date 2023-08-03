-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 05:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `headtail`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `active`) VALUES
(1, 'admin', 'admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bhistory`
--

CREATE TABLE `bhistory` (
  `bid` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhistory`
--

INSERT INTO `bhistory` (`bid`, `id`, `username`, `datetime`, `amount`, `status`) VALUES
(372, '27', 'Benish Majeed', '21/03/2018 10:49:23 AM', '4', 'lose'),
(373, '27', 'Benish Majeed', '21/03/2018 10:49:26 AM', '3.88', 'win'),
(374, '27', 'Benish Majeed', '21/03/2018 10:49:30 AM', '4', 'lose'),
(375, '27', 'Benish Majeed', '21/03/2018 10:49:34 AM', '4', 'lose'),
(376, '27', 'Benish Majeed', '21/03/2018 10:50:06 AM', '1', 'lose');

-- --------------------------------------------------------

--
-- Table structure for table `dhistory`
--

CREATE TABLE `dhistory` (
  `did` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pmbatch` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhistory`
--

INSERT INTO `dhistory` (`did`, `id`, `username`, `datetime`, `type`, `amount`, `pmbatch`, `status`) VALUES
(7, '25', '', '21-3-2018', 'Deposit', '1000', '8394849', 'Completed'),
(8, '26', '', '21-3-2018', 'Deposit', '1000', '8394849', 'Completed'),
(9, '27', '', '21-3-2018', 'Deposit', '1000', '8394849', 'Completed'),
(10, '27', 'Benish Majeed', '21/03/2018 10:52:44 AM', 'Deposit', '1', '209022209', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `content`) VALUES
(10, 'New Site Made For Testing...............');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pmaccount` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `date`, `username`, `email`, `password`, `pmaccount`, `balance`) VALUES
(25, '21/03/2018 08:34:19 AM', 'Yasir Majeed', 'bahawalpure@hotmail.com', '909090', 'U1759389', '0.0000'),
(26, '21/03/2018 08:34:38 AM', 'Amir Majeed', 'Cholistanhouse@gmail.com', '909090', 'U898980', '19'),
(27, '21/03/2018 08:34:58 AM', 'Benish Majeed', 'beenish_majeed@yahoo.com', '909090', 'U8947845', '3');

-- --------------------------------------------------------

--
-- Table structure for table `whistory`
--

CREATE TABLE `whistory` (
  `wid` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pmaccount` varchar(255) NOT NULL,
  `pmbatch` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whistory`
--

INSERT INTO `whistory` (`wid`, `id`, `username`, `datetime`, `type`, `amount`, `pmaccount`, `pmbatch`, `status`) VALUES
(2, '25', '', '21-3-2018', 'Withdraw', '900', 'U194950', '094582309', 'Completed'),
(3, '26', '', '21-3-2018', 'Withdraw', '900', 'U194950', '094582309', 'Completed'),
(4, '27', '', '21-3-2018', 'Withdraw', '900', 'U194950', '094582309', 'Completed'),
(5, '27', 'Benish Majeed', '21/03/2018 10:51:29 AM', 'Withdraw', '2', 'U8947845', '1213123', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhistory`
--
ALTER TABLE `bhistory`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `dhistory`
--
ALTER TABLE `dhistory`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whistory`
--
ALTER TABLE `whistory`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bhistory`
--
ALTER TABLE `bhistory`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT for table `dhistory`
--
ALTER TABLE `dhistory`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `whistory`
--
ALTER TABLE `whistory`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
