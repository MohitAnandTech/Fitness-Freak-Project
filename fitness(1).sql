-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 12:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fitness`
--
CREATE DATABASE IF NOT EXISTS `fitness` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fitness`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`adminID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `email`, `username`, `password`) VALUES
(1, 'ad@gmail.com', 'admin', 'abcd1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
`cartID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customerID`, `productID`, `quantity`, `status`, `cartID`) VALUES
(1, 1, 1, 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customerID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `phoneNumber`, `address`, `password`) VALUES
(1, 'Martin', 'King', 'asd@mail.com', '719594410', '10593-00100', 'lYJrg5SqqoIuILLibaSIkH/Wz7GBsGtcGV13wyf0o5Y='),
(2, 'mart', 'gg', 'evoclub21@gmail.com', 'asd@mail.com', 'edde', '8FtP8+J7pqpqz66EhNDPDqzIqsrManQ+6Kxl2hk1k48='),
(3, 'Joe', 'Budden', 'j@mail.com', '+34 3443 34', 'winterfell', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE IF NOT EXISTS `enquiries` (
`enqID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(500) NOT NULL,
  `dateSent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`enqID`, `email`, `message`, `dateSent`) VALUES
(1, 'king@email.co', 'hi..just saying hi', '2018-09-22 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`productID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `price`, `quantity`, `status`, `category`, `brand`, `image`, `addedBy`) VALUES
(1, 'Cybex Situps Bench', '250', 5, 'normal', 'weights', 'cybex', 'image1.jpg', 1),
(2, 'Cybex Pushups Bench', '279', 5, 'normal', 'weights', 'cybex', 'image3.jpg', 1),
(3, 'Precor Pushups Bench', '300', 5, 'clearance', 'cardio', 'cybex', 'image2.jpg', 1),
(4, 'Star Trac Pushups Bench', '230', 5, 'coming', 'strength', 'star-trac', 'image4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`saleID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `saleDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `customerID`, `saleDate`) VALUES
(1, 1, '2018-09-19 00:26:55'),
(2, 1, '2018-09-19 00:27:53'),
(3, 1, '2018-09-19 00:28:21'),
(4, 1, '2018-09-19 00:29:23'),
(5, 1, '2018-09-19 00:33:56'),
(6, 1, '2018-09-19 00:34:14'),
(7, 1, '2018-09-19 00:39:22'),
(8, 1, '2018-09-19 00:39:25'),
(9, 1, '2018-09-19 00:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE IF NOT EXISTS `sales_products` (
  `saleID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`saleID`, `productID`, `quantity`) VALUES
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`email`) VALUES
('one@one.one');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`adminID`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cartID`), ADD KEY `customerID` (`customerID`), ADD KEY `productID` (`productID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
 ADD PRIMARY KEY (`enqID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`productID`), ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`saleID`), ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
 ADD PRIMARY KEY (`saleID`,`productID`), ADD KEY `productID` (`productID`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
 ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
MODIFY `enqID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON UPDATE CASCADE,
ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `admin` (`adminID`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON UPDATE CASCADE;

--
-- Constraints for table `sales_products`
--
ALTER TABLE `sales_products`
ADD CONSTRAINT `sales_products_ibfk_1` FOREIGN KEY (`saleID`) REFERENCES `sales` (`saleID`) ON UPDATE CASCADE,
ADD CONSTRAINT `sales_products_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
