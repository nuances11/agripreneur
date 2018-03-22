-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 08:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
(1, 'Category 1', 'category_1', 1, '2018-03-04 01:35:04', '0000-00-00 00:00:00'),
(2, 'Category 2', 'category_2', 1, '2018-03-04 01:35:21', '0000-00-00 00:00:00');

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
  `unit` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `harvest_date` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `user_id`, `image`, `name`, `quantity`, `unit`, `price`, `harvest_date`, `availability`, `description`, `timestamp_created`, `timestamp_updated`, `status`) VALUES
(1, 2, '27906904_1814083415269147_921002000_o.jpg', 'Sample Product With Image', 89, '2', 99, '2018-03-17', '2018-03-24', 'sadasdasd', '2018-03-10 11:46:05', '2018-03-19 17:01:54', 1),
(2, 2, '22730105_836361053212042_6590377470823667888_n.jpg', 'asdasdasdasd', 999, '1', 121, '2018-03-20', '2018-03-31', 'dasdadasdsa', '2018-03-19 17:17:32', '0000-00-00 00:00:00', 0);

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
(1, 1, 1, 1, '2018-03-10 12:02:55', '0000-00-00 00:00:00');

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
(1, 3, 1, 99, 'Sample Product With Image', 396, 4, '2018-03-14 00:56:24', '0000-00-00 00:00:00'),
(2, 4, 1, 99, 'Sample Product With Image', 396, 4, '2018-03-14 00:56:28', '0000-00-00 00:00:00'),
(3, 5, 1, 99, 'Sample Product With Image', 396, 4, '2018-03-14 00:57:20', '0000-00-00 00:00:00'),
(4, 6, 1, 99, 'Sample Product With Image', 396, 4, '2018-03-14 00:57:45', '0000-00-00 00:00:00'),
(5, 7, 1, 99, 'Sample Product With Image', 198, 2, '2018-03-14 00:59:12', '0000-00-00 00:00:00');

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
(1, 1, 'Subcategory 1', 'subcategory_1', 1, '2018-03-04 01:35:39', '0000-00-00 00:00:00'),
(2, 1, 'Subcategory 2', 'subcategory_2', 1, '2018-03-04 01:36:03', '0000-00-00 00:00:00'),
(3, 2, 'Subcategory 3', 'subcategory_3', 1, '2018-03-04 01:36:26', '0000-00-00 00:00:00'),
(4, 2, 'Subcategory 4', 'subcategory_4', 1, '2018-03-04 01:36:46', '0000-00-00 00:00:00');

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
  `total_amount` double NOT NULL,
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `transaction_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_number`, `total_amount`, `timestamp_created`, `timestamp_updated`, `transaction_status`) VALUES
(1, 'First', 'last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:41:55', '0000-00-00 00:00:00', 0),
(2, 'First', 'last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:41:59', '0000-00-00 00:00:00', 0),
(3, 'First', 'Last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:56:23', '0000-00-00 00:00:00', 0),
(4, 'First', 'Last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:56:28', '0000-00-00 00:00:00', 0),
(5, 'First', 'Last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:57:20', '0000-00-00 00:00:00', 0),
(6, 'First', 'Last', 'sample@sample.com', '09982912553', 396, '2018-03-14 00:57:44', '0000-00-00 00:00:00', 0),
(7, 'sample', 'name', 'sample@sample.com', '09171576436', 198, '2018-03-14 00:59:12', '2018-03-19 17:01:53', 1);

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
(1, 'Kilograms', 'kg', 1, '2018-03-04 01:37:20', '0000-00-00 00:00:00'),
(2, 'Bags', 'bag', 1, '2018-03-04 01:37:31', '0000-00-00 00:00:00'),
(3, 'Piece', 'pc', 1, '2018-03-04 01:37:49', '0000-00-00 00:00:00');

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
  `image` varchar(255) NOT NULL DEFAULT 'NULL',
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `type`, `email`, `password`, `title`, `fname`, `lname`, `gender`, `birthday`, `address`, `longitude`, `latitude`, `mobile`, `status`, `image`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 'Admin', 'admin@agripreneur.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'Mr.', 'Admin', 'Agripreneur', 'Male', '11-October-1992', '', '', '', '09982912334', 1, 'NULL', '2018-03-04 01:16:21', '2018-03-04 01:23:51'),
(2, 'User', 'sample@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'Sample1', 'Producer1', '', '10-October-1992', 'San Marcelino, Zambales, Philippines', '120.27434840000001', '15.026051', '09982912552', 0, '20526217_10212300458538496_7207155890266143190_n.jpg', '2018-03-04 01:44:36', '2018-03-19 12:47:42'),
(3, 'User', 'case@gmail.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'From', 'Castillejos', 'Male', '10-October-1992', 'Castillejos, Zambales, Philippines', '120.19356629999993', '14.9438211', '09982817227', 0, 'NULL', '2018-03-04 08:03:09', '0000-00-00 00:00:00'),
(4, 'User', 'olongapo@gmail.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'taga', 'Olongapo', 'Female', '7-July-1933', 'Olongapo City Public Market, Rizal Ave, Olongapo, Zambales, Philippines', '120.286877', '14.840598', '191919191911', 0, 'NULL', '2018-03-04 08:03:45', '0000-00-00 00:00:00'),
(5, 'User', 'sample6@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'taga', 'Malayo', 'Male', '10-October-1919', 'Mindanao, Philippines', '123.30340619999993', '8.496129999999999', '121212121', 0, 'NULL', '2018-03-04 08:04:31', '0000-00-00 00:00:00');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product_per_transaction`
--
ALTER TABLE `tbl_product_per_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
