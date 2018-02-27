-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 06:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'Sample Category1', 'sample_category', 1, '2018-02-18 15:47:27', '2018-02-18 16:29:05'),
(2, 'Sample Category', 'sample_category1', 1, '2018-02-18 15:55:43', '2018-02-25 07:12:56');

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
(1, 3, '', 'dasdasdasd', 312, 'kg', 100, '2018-02-14', '2018-02-15', 'asdsdasdasdasds', '2018-02-11 12:58:01', '2018-02-25 18:06:05', 1),
(2, 3, '', 'dasdasd', 100, 'kg', 100, '2018-02-08', '2018-02-13', 'dasdasdasdas', '2018-02-11 13:00:46', '2018-02-25 18:06:08', 1),
(3, 3, '', 'dasdasd', 100, 'kg', 100, '2018-02-08', '2018-02-13', 'dasdasdasdas', '2018-02-11 13:14:54', '2018-02-21 15:54:28', 0);

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
(1, 1, 1, 1, '2018-02-20 17:05:55', '0000-00-00 00:00:00'),
(2, 1, 1, 2, '2018-02-20 17:10:08', '0000-00-00 00:00:00');

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
(1, 1, 'Sample Subcategory1', 'sample_subcategory', 1, '2018-02-18 16:58:24', '2018-02-18 17:37:12'),
(2, 1, 'Another Sub Category', 'another_sub', 1, '2018-02-25 08:08:36', '0000-00-00 00:00:00');

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
(1, 'Sample Unit', 'Bundle', 1, '2018-02-21 15:15:54', '0000-00-00 00:00:00');

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
  `timestamp_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `type`, `email`, `password`, `title`, `fname`, `lname`, `gender`, `birthday`, `address`, `longitude`, `latitude`, `mobile`, `status`, `timestamp_created`, `timestamp_updated`) VALUES
(1, 'Admin', 'admin@agripreneur.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'Mr.', 'Agripreneur', 'Admin', 'Male', '', '', '', '', '', 1, '2018-02-11 02:38:09', '2018-02-11 06:32:26'),
(2, 'User', 'sample6@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'sadasdasd', 'asdasdas', 'Male', '6-January-1932', 'sdasdasd', '', '', '31312312', 0, '2018-02-11 06:29:31', '2018-02-11 06:32:33'),
(3, 'User', 'sample@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'dsadasd', 'asdasdsa', 'Male', '1-January-1990', 'San Marcelino', '', '', '101010101', 0, '2018-02-11 06:36:13', '0000-00-00 00:00:00');

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
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`subcategory_id`);

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
