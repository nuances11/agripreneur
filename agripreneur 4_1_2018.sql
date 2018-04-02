-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2018 at 09:22 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agripreneur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_identifier` varchar(255) NOT NULL,
  `category_status` int(11) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_identifier`, `category_status`, `timestamp_created`, `timestamp_update`) VALUES
(1, 'Sample Category', 'sample_category', 1, '2018-03-30 09:01:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `threshold` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `harvest_date` varchar(255) NOT NULL,
  `availability_start` timestamp NULL DEFAULT NULL,
  `availability_end` timestamp NULL DEFAULT NULL,
  `description` text NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `user_id`, `image`, `name`, `quantity`, `threshold`, `unit`, `price`, `harvest_date`, `availability_start`, `availability_end`, `description`, `timestamp_created`, `timestamp_updated`, `status`) VALUES
(1, 2, 'carrots-vegetables.jpg', 'Sample Product', 98, 10, '1', 99, '2018-04-18', '2018-03-30 03:57:00', '2018-04-14 03:59:00', '  sgfasfas', '2018-03-30 09:09:42', '2018-03-30 15:57:46', 1),
(2, 2, 'carrots-vegetables.jpg', 'Tample Product', 98, 10, '1', 88, '2018-04-18', '2018-03-30 03:57:00', '2018-04-14 03:59:00', '  sgfasfas', '2018-03-31 09:09:42', '2018-03-30 18:06:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id`, `category_id`, `subcategory_id`, `product_id`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 1, 1, 1, '2018-03-30 13:59:36', '0000-00-00 00:00:00'),
(2, 1, 1, 2, '2018-03-30 13:59:36', '2018-03-29 19:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_per_transaction`
--

CREATE TABLE `tbl_product_per_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_total_price` double NOT NULL,
  `product_total_qty` int(11) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_per_transaction`
--

INSERT INTO `tbl_product_per_transaction` (`id`, `transaction_id`, `product_id`, `product_price`, `product_name`, `product_total_price`, `product_total_qty`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 1, 1, 99, 'Sample Product', 99, 1, '2018-03-30 14:49:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_form`
--

CREATE TABLE `tbl_registration_form` (
  `form_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `file` varchar(100) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_identifier` varchar(255) NOT NULL,
  `subcategory_status` int(11) NOT NULL,
  `timestamp_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestampe_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`subcategory_id`, `category_id`, `subcategory_name`, `subcategory_identifier`, `subcategory_status`, `timestamp_create`, `timestampe_update`) VALUES
(1, 1, 'Sample Sub Category', 'sample_sub_category', 1, '2018-03-30 09:02:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(11) NOT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_number` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` double NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `transaction_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_number`, `user_id`, `total_amount`, `timestamp_created`, `timestamp_updated`, `transaction_status`) VALUES
(1, 'Sir Noel', 'Hernandez', 'sample@sample.com', '09171576436', 2, 99, '2018-03-30 14:49:47', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_identifier` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`, `unit_identifier`, `status`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 'Kilogram', 'kg', 1, '2018-03-29 16:51:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birthday` varchar(99) NOT NULL,
  `address` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `type`, `email`, `password`, `title`, `fname`, `lname`, `gender`, `birthday`, `address`, `longitude`, `latitude`, `mobile`, `status`, `image`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 'Admin', 'admin@agripreneur.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'Mr.', 'Admin', 'Agripreneur', 'Male', '11-October-1992', '', '', '', '09982912334', 1, '', '2018-03-04 01:16:21', '2018-03-29 16:42:12'),
(2, 'User', 'sample@sample.com', 'd0b15acdfd0298317ec97fcb301d1eb36697879d', 'Mr.', 'Sir Noel', 'Hernandez', '', '10-October-1992', 'San Marcelino, Zambales, Philippines', '120.27434840000001', '15.026051', '09171576436', 1, 'broccoli.png', '2018-03-29 16:37:47', '2018-03-30 16:49:41'),
(3, 'User', 'sample1@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'Test', 'User', '', '11-October-1992', 'San Marcelino Baptist Church, Masinloc, Zambales, Philippines', '119.96978079999997', '15.5081766', '09171576436', 1, '', '2018-03-30 16:27:45', '2018-03-30 16:35:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_per_transaction`
--
ALTER TABLE `tbl_product_per_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration_form`
--
ALTER TABLE `tbl_registration_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product_per_transaction`
--
ALTER TABLE `tbl_product_per_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_registration_form`
--
ALTER TABLE `tbl_registration_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
