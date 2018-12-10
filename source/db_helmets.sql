-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 06:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helmets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `contact` int(25) DEFAULT NULL,
  `date_created` varchar(255) NOT NULL,
  `bday` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `fname`, `mname`, `lname`, `gender`, `address`, `delivery_address`, `contact`, `date_created`, `bday`, `username`, `password`) VALUES
(1, 'sample', 'sample', 'sample', 'male', 'makati city', 'makati city', 2147483647, '2018-12-05', '1991-06-05', 'sample2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `price` double(255,2) NOT NULL,
  `produc_description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `types_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `brandname`, `price`, `produc_description`, `image_path`, `types_id`) VALUES
(1, 'Vendetta Race', 'KYT', 3800.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 3),
(2, 'terminator d fox', 'NHK', 3500.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 4),
(3, 'Jet Black', 'SEC', 3000.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 2),
(4, 'rookie', 'LS2', 2600.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 5),
(5, 'falcon', 'KYT', 4000.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types`
--

CREATE TABLE `tbl_types` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_types`
--

INSERT INTO `tbl_types` (`id`, `color`, `size`) VALUES
(2, 'black', 'small'),
(3, 'blue', 'small'),
(4, 'red', 'small'),
(5, 'yellow', 'small'),
(6, 'black', 'medium'),
(7, 'blue', 'medium'),
(8, 'red', 'medium'),
(9, 'yellow', 'medium'),
(10, 'black', 'large'),
(11, 'blue', 'large'),
(12, 'red', 'large'),
(13, 'yellow', 'large');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_id` (`types_id`);

--
-- Indexes for table `tbl_types`
--
ALTER TABLE `tbl_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`types_id`) REFERENCES `tbl_types` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
