-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 03:38 PM
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
(3, 'Maligro', 'Alden', 'Aljhon', 'male', '93-J Champaca St Western Bicutan Taguig City', 5482656, '2018-01-03', '1991-02-05', 'maligroaljhon@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_username`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'efacc4001e857f7eba4ae781c2932dedf843865e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'AGV'),
(2, 'HJC'),
(3, 'KYT'),
(5, 'SPYDER');

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
  `payment` varchar(255) NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `transaction_code`, `purchase_date`, `status_id`, `payment_mode_id`, `payment`, `shipping_address`) VALUES
(35, 3, 'i3GyD8e1bhxnYgI5cR4012019', '2018-11-04', 1, 1, 'cash', '93-J Champaca St Western Bicutan Taguig City'),
(36, 3, 'frRzH7a4C8mglVtLI16012019', '2019-01-06', 1, 1, 'cash', '93-J Champaca St Western Bicutan Taguig City');

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
(30, 35, 8, 1, '32000'),
(31, 36, 7, 1, '32000');

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
(1, 'Cash On Delivery'),
(2, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(255,2) NOT NULL,
  `produc_description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `price`, `produc_description`, `image_path`, `categories_id`) VALUES
(6, 'AGV CORSA R E2205', 2240.00, 'AGV CORSA R E2205 motorcycle helmet. Designed for uncompromising performance on the track, it offers most of the Pista GP Rs features, but with a carbon-fiberglass shell and adjustable vents.', '../assets/images/product/5c321177861815.64341614.png', 1),
(7, 'PISTA GP R E2205 MONO', 32000.00, 'AGV PISTA GP R E2205 motorcycle helmet. The evolution of the groundbreaking Pista GP, the Moto GP helmet, itâ€™s the most protective helmet ever developed. Its new â€œBiplanoâ€ spoiler and its included hydration system bring AGVâ€™s safety and performanc', '../assets/images/product/5c24635bc3cf01.37400317.jpg', 1),
(8, 'PISTA GP R E2205', 32000.00, 'AGV PISTA GP R E2205 motorcycle helmet. The evolution of the groundbreaking Pista GP, the Moto GP helmet, itâ€™s the most protective helmet ever developed. Its new â€œBiplanoâ€ spoiler and its included hydration system bring AGVâ€™s safety and performanc', '../assets/images/product/5c2463d5a1a428.74084366.png', 1),
(9, 'VELOCE S TOP E2205', 32000.00, 'AGV VELOCE S E2205 motorcycle helmet. Thanks to this premium sport model from AGV, high-performance features typically found in a racing helmet are now available in a street-friendly package.', '../assets/images/product/5c24644b6dcbc3.37771095.png', 1),
(10, 'HJC-CLY-Solid-Black', 32000.00, 'True Youth Size Polycarbonate Shell: Lightweight, superior fit and comfort using advanced CAD technology.', '../assets/images/product/5c24655be94af4.24088776.jpg', 2),
(11, 'HJC-CS-R3-Solid-Silver', 32000.00, 'Advanced Polycarbonate Composite Shell: Lightweight, superior fit and comfort using advanced CAD technology.', '../assets/images/product/5c246602c43055.27088772.jpg', 2),
(12, 'i70-solid-semi-blk', 320000.00, 'New 3D design provides 95% UV protection, anti-scratch coating and is prepared for the ultimate anti-fog system. For ultimate Anti-Fog system add an optional PinlockÂ® insert. (sold separately)', '../assets/images/product/5c246704d958d7.11312871.jpg', 2),
(13, 'RPHA70-solid-sfblack', 320000.00, 'Designed to bridge the gap between sport riding and touring, the HJC RPHA 70 Helmet meets the needs of riders who want both the lightweight performance, airflow and protection of a race helmet and the comfort, quiet and convenience of a touring helmet.', '../assets/images/product/5c24676f8ba297.80359297.jpg', 2),
(14, 'all-stars-blue-red', 32000.00, 'IXS Falcon is a cool helmet with a shell of advanced thermoplastic. The interior is of high quality and is of course removable and washable, making it easy to keep fresh. The unique thing about this helmet is that the cushions can be enlarged by air. This', '../assets/images/product/5c2467fb53cb44.03689235.png', 3),
(16, 'falcon plain black matt', 32000.00, 'SHELL\r\nOuter shell made of Injection of Advance Thermoplastic resin\r\nVISOR\r\nVisor in Polycarbonate resin with UV 380 filter anti scratch treated\r\nSolar shied integrated in the shell\r\nThe visor can adopt the PINLOCK anti fog shied\r\nQuick Visor Change (QVC)', '../assets/images/product/5c246898b0c982.50857593.jpg', 3),
(17, 'Sim Black Gun Metal', 32000.00, 'The visor is made of scratch resistant polycarbonate with a good UV protection. As a small bonus, there are also sun visors integrated in the helmet. Tip top, thumbs up!', '../assets/images/product/5c2468d8eaa142.55636998.png', 3),
(23, 'Falcon Plain Yellow Fluo', 32000.00, 'FALCON, helmet KYT high range studied in detail at the level of interior comfort, construction technology and safety of the end user. \r\nFALCON is designed and tested to optimize the flows outside and inside the helmet. \r\nFALCON uses technical solutions su', '../assets/images/product/5c247427741200.01460892.jpg', 3),
(24, 'Phoenix 2 G series 5', 32000.00, 'Spyders wide collection of helmets, eyewear and apparel, all designed and manufactured with pioneering technology, keeps you ahead of the pack and at the top of your game.', '../assets/images/product/5c246f2d4afe07.56390754.jpg', 5),
(25, 'Rev GD Series 3', 32000.00, 'Spyders wide collection of helmets, eyewear and apparel, all designed and manufactured with pioneering technology, keeps you ahead of the pack and at the top of your game.', '../assets/images/product/5c246f4440ae60.37629593.jpg', 5),
(26, 'Vector GD Series 2', 32000.00, 'Spyders wide collection of helmets, eyewear and apparel, all designed and manufactured with pioneering technology, keeps you ahead of the pack and at the top of your game.', '../assets/images/product/5c246f6a367393.11764179.jpg', 5),
(27, 'Phoenix 2 G series 4', 32000.00, 'Spyders wide collection of helmets, eyewear and apparel, all designed and manufactured with pioneering technology, keeps you ahead of the pack and at the top of your game.', '../assets/images/product/5c246ecf9512f3.34073189.jpg', 5);

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
(1, 'pending'),
(2, 'confirmed');

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
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
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
  ADD KEY `categories_id` (`categories_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `tbl_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
