-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_cat` varchar(30) NOT NULL,
  `item_detail` varchar(200) NOT NULL,
  `bill_no` varchar(50) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `supplied_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cat`, `item_detail`, `bill_no`, `supplier_id`, `lab_id`, `supplied_at`) VALUES
(1, 'DELL CPU', 'CPU', '6 Cores / 6 Threads\r\n2.80 GHz up to 4.00 GHz Max Turbo Frequency / 9 MB Cache\r\nCompatible only with Motherboards based on Intel 300 Series Chipsets\r\nIntel Optane Memory Supported\r\nIntel UHD Graphics 6', '1232d1', 1, 1, '2022-09-10'),
(2, 'DELL CPU2', 'CPU', '6 Cores / 6 Threads\r\n2.80 GHz up to 4.00 GHz Max Turbo Frequency / 9 MB Cache\r\nCompatible only with Motherboards based on Intel 300 Series Chipsets\r\nIntel Optane Memory Supported\r\nIntel UHD Graphics 6', '1232d11', 2, 2, '2022-09-10'),
(3, 'HP LAPTOP', ' Laptop', 'HP Pavilion 15-au111tx is a Windows 10 Home laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM. The HP Pavilio', '1821983', 1, 0, '2022-09-10'),
(4, 'HP LAPTOP', ' Laptop', 'HP Pavilion 15-au111tx is a Windows 10 Home laptop with a 15.60-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM. The HP Pavilio', '21y7921', 1, 0, '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `lab_no` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `lab_details` varchar(200) NOT NULL,
  `lab_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_no`, `password`, `role`, `lab_details`, `lab_admin`) VALUES
(1, 301, '12345', 0, '3rd floor cloud virtual lab', 'Suchitra ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_add` varchar(200) NOT NULL,
  `supplier_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_add`, `supplier_phone`) VALUES
(1, 'supplier', 'abc thane west 111111', 1234567890),
(2, 'rookie', 'abc thane east 222222', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
