-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 07:02 PM
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
  `contact` int(25) DEFAULT NULL,
  `date_created` varchar(255) NOT NULL,
  `bday` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `fname`, `mname`, `lname`, `gender`, `address`, `contact`, `date_created`, `bday`, `username`, `password`) VALUES
(1, 'sample', 'sample', 'sample', 'male', 'makati city', 2147483647, '2018-12-05', '1991-06-05', 'sample2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `transaction_code`, `purchase_date`, `status_id`, `payment_mode_id`, `shipping_address`) VALUES
(1, 1, 'ILnXvrsaQA0GUR97xu13122018', '13/12/2018', 1, 1, 'awdad'),
(14, 1, 'cCukZuF0VWqsQU3yxK13122018', '13/12/2018', 1, 1, 'awdaw'),
(15, 1, 'VnatIEvbZC1eYxqxfy13122018', '13/12/2018', 1, 1, 'awdaw'),
(16, 1, 'ecGuUyWdslpq9xSRNg13122018', '13/12/2018', 1, 1, 'awdaw'),
(17, 1, 'E2wgvQRoKjz1cOU5Ta13122018', '13/12/2018', 1, 1, 'awdaw'),
(18, 1, 'd8Rt4mg3rBYPKxi2GZ13122018', '13/12/2018', 1, 2, 'awdawd'),
(21, 1, '081uRmnqQabxJ6hgXE13122018', '13/12/2018', 1, 2, 'AWDAWD'),
(22, 1, '5yFfZIqJhovxDNGRPH13122018', '13/12/2018', 1, 2, 'AWDAWD'),
(23, 1, 'Uz4Dalfvn1Qtwe70j913122018', '13/12/2018', 1, 1, 'AWDAW'),
(24, 1, 'bqKzHAt0Ymu3SGjMOR13122018', '13/12/2018', 1, 1, 'AWDAW'),
(26, 1, 'PkcsnQ8EBJO4WpLwuX13122018', '13/12/2018', 1, 2, 'awdawd'),
(27, 1, 'jXqyRwueiI76tsFa9T13122018', '13/12/2018', 1, 1, 'awdawd'),
(37, 1, '5TmqAHYueZ3ainhUN213122018', '13/12/2018', 1, 2, 'awd'),
(38, 1, '0gZQbrFVaGKLI6J4eu13122018', '13/12/2018', 1, 2, 'awd'),
(52, 1, 'EY7Z9qcB5PVuuhM0zk13122018', '13/12/2018', 1, 1, 'awdaw'),
(53, 1, 'yCjNYfBUrc2RGOibLA13122018', '13/12/2018', 1, 1, 'awdaw'),
(55, 1, '4pDsciICVrmun1M9wy13122018', '13/12/2018', 1, 1, 'awdawd'),
(65, 1, '4lx93Vh6TyKaXsPRFv13122018', '13/12/2018', 1, 1, 'awdaw'),
(66, 1, 'CYuJFx06kOlivRxmzc13122018', '13/12/2018', 1, 1, 'awdaw'),
(68, 1, '0BW27emPA8wcErUDyf13122018', '13/12/2018', 1, 1, 'awdawd'),
(71, 1, 'pMvqrHdbtPZzkWUxXF13122018', '13/12/2018', 1, 1, 'awd'),
(72, 1, 'yg7PDMtSoChudubHsT13122018', '13/12/2018', 1, 1, 'awd'),
(74, 1, 'z0IBRJMaxkWhrTePy513122018', '13/12/2018', 1, 1, 'awda'),
(76, 1, 'YJbEXnUyCGaOzBuDvZ13122018', '13/12/2018', 1, 1, 'awdaw'),
(77, 1, 'GBakWXdCTuU8IQgJZo13122018', '13/12/2018', 1, 1, 'awdaw'),
(79, 1, '8wGtWCOvuK01cl6mTS13122018', '13/12/2018', 1, 1, 'awdawd'),
(80, 1, 'RXPuJ3TxDHc8gUqMNC13122018', '13/12/2018', 1, 1, 'awdawd'),
(82, 1, 'eaS4dmPpKWkE1AhMuy13122018', '13/12/2018', 1, 1, 'awdawd'),
(83, 1, '3DHKxIyuV92o14rTcQ13122018', '13/12/2018', 1, 2, 'awdawd'),
(85, 1, 'acpG140dh7ZUQ8kXuo13122018', '13/12/2018', 1, 2, 'adwawd'),
(86, 1, 'FNLzx7uhHyTxaUgZlV13122018', '13/12/2018', 1, 2, 'adwawd'),
(88, 1, 'M5X0AZ6kvbOP9EWrD713122018', '13/12/2018', 1, 2, 'awd'),
(89, 1, 'U83M51n7ApPdSLXDCq13122018', '13/12/2018', 1, 2, 'awd'),
(91, 1, 'jL7FhVqbDvButrmGeI13122018', '13/12/2018', 1, 1, 'awdaw'),
(92, 1, 'QoY1gh2ajNunrxA06p13122018', '13/12/2018', 1, 1, 'awdaw'),
(94, 1, 'AgdzEMRteaPnQ6Zk9r13122018', '13/12/2018', 1, 2, 'awdaw'),
(95, 1, 'jXysqHMugV3mcduJ2K13122018', '13/12/2018', 1, 2, 'awdaw'),
(97, 1, 'ZGLcps2nVQlxezI8oy13122018', '13/12/2018', 1, 2, 'awdawd'),
(98, 1, 'xsYMWpyKgh4wVrLfUm13122018', '13/12/2018', 1, 2, 'awdawd'),
(100, 1, 'b8RlacFJM4TAjEoBsu13122018', '13/12/2018', 1, 1, '54'),
(101, 1, '5MoK1krhi9wELYyv7e13122018', '13/12/2018', 1, 1, '54'),
(102, 1, 'FjeD4XbUSE5vHxPCpt13122018', '13/12/2018', 1, 1, '54'),
(104, 1, 'lSucUQa5e2FufzxqpX13122018', '13/12/2018', 1, 1, 'awd'),
(106, 1, 'WOiCpx94mPrUql63jf13122018', '13/12/2018', 1, 1, 'awda'),
(107, 1, '1uWeQ47zEwqYJrnULs13122018', '13/12/2018', 1, 1, 'awda'),
(108, 1, 'QayxMdSHxYCDPA8v5u13122018', '13/12/2018', 1, 1, 'awdaw'),
(109, 1, 'nMHR02zkx4aKguV7c613122018', '13/12/2018', 1, 1, 'awdaw'),
(111, 1, '4NtMSj3w97lqZopGzB13122018', '13/12/2018', 1, 1, 'awdaw'),
(113, 1, 'WFHvwXrJfVdtY7Zsq413122018', '13/12/2018', 1, 1, 'awd'),
(115, 1, 'psqZkLvhNGurXTCFf713122018', '13/12/2018', 1, 1, 'awdaw'),
(116, 1, 'KDl41s03bHiRYkV5CN13122018', '13/12/2018', 1, 1, 'awdaw'),
(117, 1, 'XI9SxU8uoV1R7CclnB13122018', '13/12/2018', 1, 1, 'awdaw'),
(119, 1, 'E51fkHQ8OSUcWw6DNg13122018', '13/12/2018', 1, 1, 'awdaw'),
(120, 1, 'GFNJOH1dMC05osmPaw13122018', '13/12/2018', 1, 1, 'awdaw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `orders_id`, `products_id`, `quantity`, `price`) VALUES
(1, 76, 2, 1, '3500'),
(2, 76, 3, 1, '3000'),
(3, 79, 1, 1, '3800'),
(4, 79, 2, 1, '3500'),
(5, 82, 2, 1, '3500'),
(6, 82, 3, 1, '3000'),
(7, 85, 2, 1, '3500'),
(8, 85, 3, 1, '3000'),
(9, 88, 2, 1, '3500'),
(10, 91, 2, 1, '3500'),
(11, 91, 3, 1, '3000'),
(12, 94, 2, 1, '3500'),
(13, 97, 2, 1, '3500'),
(14, 98, 2, 1, '3500'),
(15, 100, 2, 1, '3500'),
(16, 100, 3, 1, '3000'),
(17, 101, 2, 1, '3500'),
(18, 101, 3, 1, '3000'),
(21, 106, 2, 1, '3500'),
(22, 106, 3, 3, '3000'),
(23, 107, 2, 1, '3500'),
(24, 107, 3, 3, '3000'),
(25, 108, 2, 1, '3500'),
(26, 108, 3, 1, '3000'),
(27, 113, 2, 1, '3500'),
(28, 115, 2, 1, '3500'),
(29, 115, 3, 1, '3000'),
(30, 119, 2, 1, '3500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_mode`
--

CREATE TABLE `tbl_payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_mode`
--

INSERT INTO `tbl_payment_mode` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `price` double(255,2) NOT NULL,
  `produc_description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `types_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `brandname`, `price`, `produc_description`, `image_path`, `types_id`) VALUES
(1, 'Vendetta Race', 'KYT', 3800.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 3),
(2, 'terminator d fox', 'NHK', 3500.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 4),
(3, 'Jet Black', 'SEC', 3000.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 2),
(4, 'rookie', 'LS2', 2600.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 5),
(5, 'falcon', 'KYT', 4000.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'https://via.placeholder.com/350x250', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`) VALUES
(1, 'pending');

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
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_id` (`types_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_mode` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `tbl_orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_items_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `tbl_products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`types_id`) REFERENCES `tbl_types` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
