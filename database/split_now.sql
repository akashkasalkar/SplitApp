-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 10:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `split_now`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_phone` varchar(13) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `created_by`, `cust_name`, `cust_email`, `cust_phone`, `updated_date`, `created_date`) VALUES
(1, 1, 'rohan', 'rohan@gmail.com', '6363566356', '2023-04-30 09:23:05', '2023-04-30 09:23:05'),
(2, 1, 'Shrikant', 'shri@gmail.com', '9945961125', '2023-04-30 10:04:12', '2023-04-30 10:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_expence`
--

CREATE TABLE `customer_expence` (
  `cust_exp_id` int(11) NOT NULL,
  `fk_cust_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `expence_type` varchar(25) NOT NULL,
  `expence_amount` varchar(150) NOT NULL,
  `expence_date` date NOT NULL,
  `expence_title` varchar(250) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_expence`
--

INSERT INTO `customer_expence` (`cust_exp_id`, `fk_cust_id`, `fk_user_id`, `expence_type`, `expence_amount`, `expence_date`, `expence_title`, `updated_date`, `created_date`) VALUES
(1, 1, 1, 'Gave', '200', '2023-04-29', 'Petrol', '2023-04-30 11:24:59', '2023-04-30 11:24:59'),
(2, 1, 1, 'Got', '200', '2023-04-30', 'Return petrol', '2023-04-30 11:51:15', '2023-04-30 11:51:15'),
(4, 1, 1, 'Gave', '550', '2023-04-30', 'Lunch', '2023-04-30 12:13:50', '2023-04-30 12:13:50'),
(5, 1, 1, 'Gave', '300', '2023-04-30', 'Dinner', '2023-04-30 12:19:16', '2023-04-30 12:19:16'),
(6, 1, 1, 'Got', '1000', '2023-04-12', 'return all', '2023-04-30 12:50:22', '2023-04-30 12:50:22'),
(7, 1, 1, 'Gave', '150', '2023-04-29', 'recharge', '2023-04-30 12:52:31', '2023-04-30 12:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `expence_category`
--

CREATE TABLE `expence_category` (
  `cat_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_status` varchar(10) NOT NULL DEFAULT 'Active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expence_category`
--

INSERT INTO `expence_category` (`cat_id`, `c_name`, `c_status`, `created_date`, `updated_date`) VALUES
(1, 'Trip', 'Active', '2023-04-29 21:15:37', '2023-04-29 21:15:37'),
(2, 'Party', 'Active', '2023-04-29 21:15:37', '2023-04-29 21:15:37'),
(3, 'Shared Home', 'Active', '2023-04-29 21:16:09', '2023-04-29 21:16:09'),
(4, 'Couple', 'Active', '2023-04-29 21:16:09', '2023-04-29 21:16:09'),
(5, 'Other', 'Active', '2023-04-29 21:16:21', '2023-04-29 21:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `manage_group`
--

CREATE TABLE `manage_group` (
  `gd_id` int(11) NOT NULL,
  `fk_group_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_group`
--

INSERT INTO `manage_group` (`gd_id`, `fk_group_id`, `fk_user_id`, `created_date`, `updated_date`) VALUES
(1, 3, 1, '2023-04-29 21:55:55', '2023-04-29 21:55:55'),
(2, 3, 2, '2023-04-29 22:23:44', '2023-04-29 22:23:44'),
(3, 4, 2, '2023-04-30 02:25:02', '2023-04-30 02:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `manage_group_expences`
--

CREATE TABLE `manage_group_expences` (
  `mge_id` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `fk_group_id` int(11) NOT NULL,
  `expence_type` varchar(100) DEFAULT NULL,
  `expence_title` varchar(250) NOT NULL,
  `expence_amount` varchar(50) NOT NULL,
  `paid_date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_group_expences`
--

INSERT INTO `manage_group_expences` (`mge_id`, `paid_by`, `fk_group_id`, `expence_type`, `expence_title`, `expence_amount`, `paid_date`, `updated_date`, `created_date`) VALUES
(1, 1, 3, 'Expence', 'Ticket', '3000', '2023-04-18', '2023-04-30 01:08:17', '2023-04-30 01:08:17'),
(2, 2, 3, 'Expence', 'Lunch', '1000', '2023-04-25', '2023-04-30 02:08:21', '2023-04-30 02:08:21'),
(3, 1, 3, 'Expence', 'Petrol', '1000', '2023-04-25', '2023-04-30 06:57:31', '2023-04-30 06:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `s_group`
--

CREATE TABLE `s_group` (
  `g_id` int(11) NOT NULL,
  `fk_cat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `g_name` varchar(150) NOT NULL,
  `g_userid` varchar(10) NOT NULL,
  `g_password` varchar(10) NOT NULL,
  `g_status` varchar(10) NOT NULL DEFAULT 'Active',
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_group`
--

INSERT INTO `s_group` (`g_id`, `fk_cat_id`, `created_by`, `g_name`, `g_userid`, `g_password`, `g_status`, `updated_date`, `created_date`) VALUES
(3, 1, 1, 'Goa Trip', '37655', '12345', 'Active', '2023-04-29 21:55:55', '2023-04-29 21:55:55'),
(4, 3, 2, 'Banglore Home', '73046', '12345', 'Active', '2023-04-30 02:25:02', '2023-04-30 02:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_email` varchar(250) NOT NULL,
  `u_phone` varchar(13) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `u_password` varchar(300) NOT NULL,
  `u_photo` varchar(300) DEFAULT NULL,
  `u_status` varchar(10) NOT NULL DEFAULT 'Active',
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_phone`, `user_type`, `u_password`, `u_photo`, `u_status`, `updated_date`, `created_date`) VALUES
(1, 'Akash', 'kasalkar16@gmail.com', '8073807591', 'customer', '12345', NULL, 'Active', '2023-04-29 18:42:33', '2023-04-29 18:42:33'),
(2, 'Omkar', 'om@gmail.com', '9945961124', 'customer', '1234', NULL, 'Active', '2023-04-29 22:01:30', '2023-04-29 22:01:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `fk_created_by2` (`created_by`);

--
-- Indexes for table `customer_expence`
--
ALTER TABLE `customer_expence`
  ADD PRIMARY KEY (`cust_exp_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`),
  ADD KEY `fk_ussr_id` (`fk_user_id`);

--
-- Indexes for table `expence_category`
--
ALTER TABLE `expence_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `manage_group`
--
ALTER TABLE `manage_group`
  ADD PRIMARY KEY (`gd_id`),
  ADD KEY `fk_g_id` (`fk_group_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `manage_group_expences`
--
ALTER TABLE `manage_group_expences`
  ADD PRIMARY KEY (`mge_id`),
  ADD KEY `fk_user_id2` (`paid_by`),
  ADD KEY `fk_group__id` (`fk_group_id`);

--
-- Indexes for table `s_group`
--
ALTER TABLE `s_group`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_userid` (`g_userid`),
  ADD KEY `fk_cat_id` (`fk_cat_id`),
  ADD KEY `fk_created_by` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_expence`
--
ALTER TABLE `customer_expence`
  MODIFY `cust_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expence_category`
--
ALTER TABLE `expence_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_group`
--
ALTER TABLE `manage_group`
  MODIFY `gd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_group_expences`
--
ALTER TABLE `manage_group_expences`
  MODIFY `mge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_group`
--
ALTER TABLE `s_group`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_created_by2` FOREIGN KEY (`created_by`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `customer_expence`
--
ALTER TABLE `customer_expence`
  ADD CONSTRAINT `fk_cust_id` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `fk_ussr_id` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `manage_group`
--
ALTER TABLE `manage_group`
  ADD CONSTRAINT `fk_g_id` FOREIGN KEY (`fk_group_id`) REFERENCES `s_group` (`g_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `manage_group_expences`
--
ALTER TABLE `manage_group_expences`
  ADD CONSTRAINT `fk_group__id` FOREIGN KEY (`fk_group_id`) REFERENCES `s_group` (`g_id`),
  ADD CONSTRAINT `fk_user_id2` FOREIGN KEY (`paid_by`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `s_group`
--
ALTER TABLE `s_group`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`fk_cat_id`) REFERENCES `expence_category` (`cat_id`),
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
