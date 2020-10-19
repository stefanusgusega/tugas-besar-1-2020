-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2020 at 02:33 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amountSold` int(8) NOT NULL,
  `price` int(8) NOT NULL,
  `amountRemaining` int(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `amountSold`, `price`, `amountRemaining`, `description`, `path`) VALUES
(1, 'Dark chocolate', 10, 20000, 20, 'Cokelat yang low calories', ''),
(2, 'JJ8', 0, 99, 88, 'jj', '../../../assets/images/Screenshot from 2020-10-17 19-46-01.png'),
(3, 'choco', 0, 11, 11, 'cjoco', '3.png'),
(4, 'Susanti Gojali', 0, 228, 288, 'felfei', '4.png'),
(5, 'coco', 0, 123, 22, 'enak', '5.png'),
(6, 'fefe', 0, 11, 2, 'fef', '6.png'),
(7, 'dwdw', 0, 22, 22, 'dwdw', '7.png'),
(8, 'okok', 0, 99, 99, 'o', '8.png'),
(9, 'jj`0', 0, 99, 99, 'jj', '9.png'),
(10, 'Susanti Gojali', 0, 12, 12, 'dd', '10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `productID` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`productID`, `username`, `amount`, `total`, `timestamp`, `address`) VALUES
(1, 'willywangkong', 2, 40000, '2020-10-16 13:38:25', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superuser` tinyint(1) NOT NULL DEFAULT '0',
  `cookie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `superuser`, `cookie`) VALUES
('eeE', 'ee@gmail.com', 'EE', 0, NULL),
('felicia123', 'aa@gmail.com', 'aa', 0, NULL),
('feliciagojali', 'abc123@gmail.com', '123456', 1, 'mrl9,]&vo#'),
('pepe', 'pepe@email.com', '1234', 0, NULL),
('saya', 'saya', 'saya', 0, NULL),
('ss', 'ss', 'ss', 0, '-qmkv\"%bau'),
('ssaa', 'ueue@uu.com', 'jjj', 0, NULL),
('willywangkong', 'ass@gmail.com', '123455', 0, NULL),
('zzz', 'zzz', 'zzz', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `name` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cookie` (`cookie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `productID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
