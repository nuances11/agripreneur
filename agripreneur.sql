-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:11 PM
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
(1, 3, '', 'dasdasdasd', 312, 'kg', 3123123, '2018-02-14', '2018-02-15', 'asdsdasdasdasds', '2018-02-11 12:58:01', '2018-02-11 13:49:36'),
(2, 3, '', 'dasdasd', 312312, 'kg', 3123123, '2018-02-08', '2018-02-13', 'dasdasdasdas', '2018-02-11 13:00:46', '2018-02-11 13:49:40'),
(3, 3, '', 'dasdasd', 312312, 'kg', 3123123, '2018-02-08', '2018-02-13', 'dasdasdasdas', '2018-02-11 13:14:54', '2018-02-11 13:49:43');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
