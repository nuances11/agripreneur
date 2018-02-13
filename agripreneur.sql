-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2018 at 08:51 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmtota_db`
--

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
  `timestamp_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `user_id`, `image`, `name`, `quantity`, `unit`, `price`, `harvest_date`, `availability`, `description`, `timestamp_created`, `timestamp_updated`) VALUES
(4, 5, '', 'Sample Product 1', 100, 'kg', 100, '2018-02-13', '2018-02-28', 'Sample Description', '2018-02-12 17:10:33', '0000-00-00 00:00:00'),
(5, 5, '', 'Sample Product 2', 100, 'kg', 100, '2018-02-14', '2018-02-28', 'Sample Description', '2018-02-12 17:11:00', '0000-00-00 00:00:00'),
(6, 5, '', 'Sample Product 3', 100, 'bag', 99, '2018-02-13', '2018-02-24', 'Sample Description', '2018-02-12 17:11:36', '0000-00-00 00:00:00'),
(7, 5, '', 'Sample Product 4', 100, 'bag', 100, '2018-02-16', '2018-02-28', 'Sample Description', '2018-02-12 17:12:08', '0000-00-00 00:00:00'),
(8, 5, '', 'Sample Product 5', 100, 'kg', 99, '2018-02-13', '2018-02-28', 'Sample Description', '2018-02-12 17:12:31', '0000-00-00 00:00:00'),
(9, 5, '', 'Sample Product 6', 99, 'kg', 99, '2018-02-24', '2018-02-28', 'Sample Description', '2018-02-12 17:13:02', '0000-00-00 00:00:00'),
(10, 5, '', 'Sample Product 7', 99, 'kg', 99, '2018-02-13', '2018-02-28', 'Sample Description', '2018-02-12 17:13:29', '0000-00-00 00:00:00'),
(11, 5, '', 'Sample Product 7', 99, 'kg', 99, '2018-02-13', '2018-02-28', 'Sample Description', '2018-02-12 17:14:03', '0000-00-00 00:00:00'),
(12, 5, '', 'Sample Product 8', 99, 'kg', 99, '2018-02-13', '2018-02-28', 'Sample Description', '2018-02-12 17:14:30', '0000-00-00 00:00:00'),
(13, 6, '', 'Patatas', 23, 'kg', 26, '2018-02-16', '2018-02-24', 'Fresh', '2018-02-12 19:56:48', '0000-00-00 00:00:00'),
(14, 6, '', 'Patatas', 23, 'kg', 26, '2018-02-16', '2018-02-24', 'Fresh', '2018-02-12 19:56:58', '0000-00-00 00:00:00');

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
(4, 'User', 'sample@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'Sample', 'Name', 'Male', '1-January-1919', 'Olongapo City Public Market, Rizal Ave, Olongapo, Zambales, Philippines', '', '', '', 0, '2018-02-12 17:02:33', '0000-00-00 00:00:00'),
(5, 'User', 'sample2@sample.com', '64a8d0534943275efeaf05a6510daf2e478cc24a', 'Mr.', 'First Name', 'Last Name', 'Male', '1-January-1932', 'Asian Highway 26, Sultan Naga Dimaporo, Lanao del Norte, Philippines', '123.70978760000003', '7.799087200000002', '09898988889', 0, '2018-02-12 17:08:32', '0000-00-00 00:00:00'),
(6, 'User', 'Orpilladesiree@gmail.com', '1bbd5aa5591b94e04d67935bba25010bb4c863d7', 'Mrs.', 'Desiree', 'Ordonio', 'Female', '4-May-1924', 'Balanga City, Bataan, Philippines', '120.51129070000002', '14.6741293', '09217476774', 0, '2018-02-12 19:54:12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
