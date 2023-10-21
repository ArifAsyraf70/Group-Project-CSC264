-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 09:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `razertry`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `courtid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `bookingstart` time NOT NULL,
  `bookingend` time NOT NULL,
  `bookingprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `courtid` int(11) NOT NULL,
  `courtname` varchar(25) NOT NULL,
  `courtpicture` text CHARACTER SET latin1 NOT NULL,
  `courtdescription` varchar(1000) NOT NULL,
  `courtprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`courtid`, `courtname`, `courtpicture`, `courtdescription`, `courtprice`) VALUES
(2, 'GRASSY COURT', 'IMG-62bbf10911a355.14861819.jpg', 'Synthetic turf is the best surface for futsal fields, as it guarantees shock absorption, reducing abrasion from falls to a minimum; natural feeling, great aesthetic effect and optimal slide. All of that with minimum maintenance and availability all year round, with any climate condition.', 60),
(3, 'CAGE COURT', 'IMG-62bbf12f48f845.01525940.jpg', 'Surrounding by high tenacity polyethylene (PE) netting with 40mm mesh, thickness 2.0mm, twisted knot. UV protect and long-lasting abrasion. With stainless steel turnbuckle, steel cable and net clip to fix around the net to make sure very high corrosion resistance. Double layer from below high 1 meter. Colour in dark green, heavy duty uses and high tension', 100),
(4, 'GOLDY COURT', 'IMG-62bbf15cdf8465.00563102.jpg', 'Goldy court is one of the most best court as it provide an old -school design futsal court. If the player like a nostalgic vibe, then this is the best choice as not only it gives an aesthetic vibe but also a functional court. As the name stated, goldy means gold as the time is gold and precious.', 65),
(5, 'OUTDOOR COURT', 'IMG-62bbf19cc9b4f3.47134831.jpg', 'Gripper is used to create both outdoor and indoor playing fields. The surface can be used for the tournament because it guarantees a perfect slipping of the ball and a high shock- absorption, higher than a harder surface like a concrete-made one. Gripper is versatile, customizable and guarantees the creation of a two-coloured playing fields.', 70);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookingid` int(11) NOT NULL,
  `courtid` int(11) NOT NULL,
  `paymentname` varchar(50) NOT NULL,
  `paymentamount` float NOT NULL,
  `paymenthour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `userfullname` varchar(50) NOT NULL,
  `useremail` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userpassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `userfullname`, `useremail`, `username`, `userpassword`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'arif', 'arifasyraf70@gmail.com', 'arif', 'arif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `courtid` (`courtid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`courtid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bookingid` (`bookingid`),
  ADD KEY `courtid` (`courtid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `courtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`courtid`) REFERENCES `court` (`courtid`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`courtid`) REFERENCES `court` (`courtid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
