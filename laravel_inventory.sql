-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 10:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `cell` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `roleid` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `cell`, `email`, `address`, `roleid`) VALUES
(2, 'Jessica Alba Saira', '01921577008', 'jessica72@gmail.com', 'Gulshan, Dhaka, Bangladesh', '4'),
(3, 'John Doe', '01921577589', 'john@gmail.com', 'Dhaka, Bangladesh', '4'),
(4, 'Jakir Hossain', '01288135188', 'jakir@gmail.com', 'Banani, Dhaka', '3'),
(5, 'Hadi Jaman', '01746686868', 'hadi@gmail.com', 'Mirpur-10, folputti', '1'),
(7, 'Mahmudul Hassan', '01921577009', 'mahmudul89277@gmail.com', 'Notun Bazar, Dhaka, Bangladesh', '5');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `code` varchar(300) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `code`, `status`) VALUES
(2, 'Editor', '002', 0),
(4, 'Contributor', '004', 0),
(5, 'Admin', '001', 0),
(6, 'Author', '005', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `sellingType` varchar(300) NOT NULL,
  `sellingCost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `sellingType`, `sellingCost`, `created_at`) VALUES
(1, 'Full Coil', 200, '2019-08-07 14:56:15'),
(2, 'Full Coil - Machine Cutting', 700, '2019-08-07 14:56:15'),
(3, 'Full Hand Cutting', 0, '2019-08-07 14:56:15'),
(4, 'Partial Machine Cutting', 700, '2019-08-07 14:56:15'),
(5, 'Partial Hand Cutting', 0, '2019-08-07 14:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `id` int(11) NOT NULL,
  `supid` int(11) NOT NULL,
  `lotname` varchar(300) NOT NULL,
  `coil` int(11) NOT NULL,
  `note` text NOT NULL,
  `tweight` double NOT NULL,
  `rent` double NOT NULL,
  `totalrent` double NOT NULL,
  `truck` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`id`, `supid`, `lotname`, `coil`, `note`, `tweight`, `rent`, `totalrent`, `truck`, `created_at`, `updated_at`) VALUES
(4, 5, 'mortin', 3, 'Good Quality', 4, 400, 1400, 1, '2019-07-24 07:11:44', '2019-08-02 12:13:37'),
(5, 4, 'Power', 10, 'Good', 15.9, 400, 6360, 3, '2019-07-24 07:25:50', '2019-08-02 12:13:37'),
(6, 3, 'Aci', 5, 'Lorem', 5, 400, 2000, 1, '2019-07-24 07:26:27', '2019-08-02 12:13:37'),
(7, 2, 'mortin', 5, 'lorem', 10.5, 400, 4200, 2, '2019-07-24 07:28:13', '2019-08-02 12:13:37'),
(8, 1, 'Aci', 16, 'abcd', 25, 400.263, 10006.574999999999, 3, '2019-07-24 07:31:33', '2019-08-02 12:13:37'),
(10, 4, 'Power', 55, 'abcd', 2, 400, 800, 2, '2019-07-24 14:39:48', '2019-08-02 12:13:37'),
(11, 4, 'mortin', 22, 'abcd', 2, 400, 800, 2, '2019-07-24 15:59:00', '2019-08-02 12:13:37'),
(12, 3, 'Aci', 15, 'abcd', 3, 400, 1200, 3, '2019-07-24 16:00:29', '2019-08-02 12:13:37'),
(13, 3, 'Aci', 15, 'abcd', 3, 400, 1200, 3, '2019-07-24 16:07:24', '2019-08-02 12:13:37'),
(15, 2, 'Power', 15, 'abcd', 5.222, 400, 2088.8, 2, '2019-07-24 16:50:59', '2019-08-02 12:13:37'),
(16, 3, 'demolot', 5, 'abcd', 3, 400, 1200, 1, '2019-07-27 16:06:22', '2019-08-02 12:13:37'),
(17, 1, 'abc', 5, 'lorem ipsum', 5, 400, 2000, 1, '2019-07-31 09:00:02', '2019-08-02 12:13:37'),
(18, 1, 'abc', 5, 'lorem ipsum', 5, 400, 2000, 1, '2019-07-31 09:15:28', '2019-08-02 12:13:37'),
(19, 1, 'abc', 5, 'lorem ipsum', 5, 400, 2000, 1, '2019-07-31 09:15:44', '2019-08-02 12:13:37'),
(20, 1, 'abc', 5, 'abc', 6, 400, 2400, 2, '2019-07-31 09:23:58', '2019-08-02 12:13:37'),
(21, 1, 'abc', 5, 'abc', 6, 400, 2400, 2, '2019-07-31 09:26:06', '2019-08-02 12:13:37'),
(22, 5, 'UVa', 3, 'Lorem ipsum', 6, 400, 2400, 1, '2019-07-31 09:30:02', '2019-08-02 12:13:37'),
(23, 2, 'abc', 23, 'abvcdd', 25, 400, 10000, 3, '2019-07-31 10:10:18', '2019-08-02 12:13:37'),
(24, 2, 'abc', 23, 'abvcdd', 25, 400, 10000, 3, '2019-07-31 10:15:30', '2019-08-02 12:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `id` int(11) NOT NULL,
  `supid` int(11) NOT NULL,
  `lotid` int(11) NOT NULL,
  `lotnumber` int(11) NOT NULL,
  `selltype` varchar(300) NOT NULL,
  `typecost` double NOT NULL,
  `tweight` double NOT NULL,
  `totalcost` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`id`, `supid`, `lotid`, `lotnumber`, `selltype`, `typecost`, `tweight`, `totalcost`, `created_at`, `updated_at`) VALUES
(4, 5, 22, 326, '3', 0, 20, 0, '2019-08-07 19:07:38', '2019-08-07 19:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mahmudul Hassan', 'mahmudul89277@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
