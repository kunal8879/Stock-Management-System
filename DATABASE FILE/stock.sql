-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 02:38 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `fid` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstname`, `middlename`, `lastname`, `username`, `fid`, `role`) VALUES
('Kuki', 'sd', 'Saini', 'Kuki sir', '123456', 0),
('Atharva', 'Sumedh', 'Sarfare', 'Atharva sir', '20102135', 1);

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
  `lab_id` int(11) NOT NULL DEFAULT 1,
  `supplied_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cat`, `item_detail`, `bill_no`, `supplier_id`, `lab_id`, `supplied_at`) VALUES
(23, 'HP PAVILION au111tx', 'Laptop', 'Core i5 7th Gen, 8 GB RAM, 1 TB ROM, Windows 10, 2 GB NVIDIA GeForce 940MX Graphic Card.', '9842815', 2, 4, '2021-09-18'),
(24, 'Zebronics Zeb-Transformer-L', 'Mouse', 'Optical USB Gaming Mouse with 7 Colors LED Effect, DPI- 1000/1600/ 2400/ 3200 DPI.', '6548945', 2, 3, '2022-09-18'),
(26, 'HP LAPTOP', 'Laptop', 'Core i5 7th Gen, 8 GB RAM, 1 TB ROM, Windows 10, 2 GB NVIDIA GeForce 940MX Graphic Card.', '53412', 3, 2, '2022-09-18'),
(29, 'Zebronics Zeb-Ultimate Star', 'Web camera', '5P Lens 1920x1080 Full HD Resolution with Built-in mic, auto White Balance, 16 LED Ring Lights with Brightness Control and 1.58m Cable', '544615', 2, 3, '2022-09-21'),
(30, 'HP K500F', 'Wired Gaming Keyboard', 'Mixed Color Lighting, Metal Panel with Logo Lighting, 26 Anti-Ghosting Keys, and Windows Lock Key / 3 Years Warranty', '7ZZ97AA', 2, 1, '2022-09-21'),
(31, 'Lenovo ThinkCentre', 'CPU', 'Intel Core i7 2600/ 16 GB RAM/ 1 TB HDD + 256 GB SSD/ Windows 10 Pro/ MS Office/ Intel HD Graphics/ USB/ Ethernet/WiFi', '316546', 3, 1, '2022-09-21'),
(32, 'Acer XZ306CX', 'Monitor', '29.5 Inch Ultrawide 21:9 1500R Curve 2560 X 1080 Monitor 1 MS VRB 200 Hz Refresh Rate HDR 400 DCI-P3 93% AMD Free Sync 2XHDMI 1XDP Stereo Speakers Eye Care Features, White', '1341233', 1, 1, '2022-09-21'),
(33, 'FURNICOM CHAIRS', 'Computer Chair', 'Armo Mid Back Office Chair Computer & Study Chair Ergonomic Design Fabric Metal Base (Black)', '124122', 1, 1, '2022-09-21'),
(35, '22 sept', 'fa', 'as', '71263', 3, 1, '2022-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `lab_no` int(11) NOT NULL,
  `lab_detail` varchar(255) NOT NULL,
  `lab_admin` varchar(50) NOT NULL,
  `pcquantity` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_no`, `lab_detail`, `lab_admin`, `pcquantity`, `role`, `added_on`) VALUES
(1, 100, 'Stock Administrator', 'xyz', 0, 1, '0000-00-00'),
(2, 314, '3rd floor, cloud virtual lab', 'Suchitra mam', 25, 0, '2022-09-17'),
(3, 315, '3rd floor, data warehousing, and mining lab', 'Tanvi mam', 22, 0, '2022-09-17'),
(7, 316, '3rd floor, computer network lab', 'Pravin Sir', 29, 0, '2022-09-22'),
(8, 401, '4th floor, electronics lab', 'Rahul sir', 27, 0, '2022-09-20'),
(9, 402, '4th floor, software engineering lab', 'Rahul sir', 29, 0, '2022-09-22'),
(30, 312, '3rd floor, IP Lab', 'Ashwini Mam', 23, 0, '2022-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `pc_details`
--

CREATE TABLE `pc_details` (
  `lab_no` varchar(255) NOT NULL,
  `pc_id` varchar(255) NOT NULL,
  `pc_name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `pc_condition` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc_details`
--

INSERT INTO `pc_details` (`lab_no`, `pc_id`, `pc_name`, `details`, `pc_condition`) VALUES
('314', '1', 'pcno1lab314', 'asdasdasdasd', 1),
('315', '1', 'pcno1lab315', 'asdasdasdasd', 0),
('401', '1', 'pcno1lab401', 'asdasdasdasd', 0),
('401', '25', 'pcno25lab401', 'asdasdasdasd', 0),
('401', '26', 'pcno26lab401', 'asdasdasdasd', 0),
('401', '27', 'pcno27lab401', 'asdasdasdasd', 0),
('314', '2', 'pcno2lab314', 'asdasdasdasd', 1),
('315', '2', 'pcno2lab315', 'asdasdasdasd', 0),
('401', '2', 'pcno2lab401', 'asdasdasdasd', 0),
('315', '3', 'pcno3lab315', 'asdasdasdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc_lab312`
--

CREATE TABLE `pc_lab312` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(255) NOT NULL,
  `pc_details` varchar(500) NOT NULL,
  `pc_softwares` varchar(300) NOT NULL,
  `lab_no` int(11) NOT NULL,
  `pc_query` varchar(500) NOT NULL,
  `pc_condition` varchar(100) NOT NULL DEFAULT 'Working'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc_lab312`
--

INSERT INTO `pc_lab312` (`pc_id`, `pc_name`, `pc_details`, `pc_softwares`, `lab_no`, `pc_query`, `pc_condition`) VALUES
(1, 'APSIT/LAB312/PC1', 'ram rom ssd graphic card mouse keyboard etc etc', 'Weka Wireshark', 312, 'THIS AND THAT ISSUES ARE HAPPENING', 'Not Working'),
(2, 'APSIT/LAB312/PC2', '', '', 312, '', 'Working'),
(3, 'APSIT/LAB312/PC3', '', '', 312, '', 'Working'),
(4, 'APSIT/LAB312/PC4', '', '', 312, '', 'Working'),
(5, 'APSIT/LAB312/PC5', '', '', 312, '', 'Working'),
(6, 'APSIT/LAB312/PC6', '', '', 312, '', 'Working'),
(7, 'APSIT/LAB312/PC7', '', '', 312, '', 'Working'),
(8, 'APSIT/LAB312/PC8', '', '', 312, '', 'Working'),
(9, 'APSIT/LAB312/PC9', '', '', 312, '', 'Working'),
(10, 'APSIT/LAB312/PC10', '', '', 312, '', 'Working'),
(11, 'APSIT/LAB312/PC11', '', '', 312, '', 'Working'),
(12, 'APSIT/LAB312/PC12', '', '', 312, '', 'Working'),
(13, 'APSIT/LAB312/PC13', '', '', 312, '', 'Working'),
(14, 'APSIT/LAB312/PC14', '', '', 312, '', 'Working'),
(15, 'APSIT/LAB312/PC15', '', '', 312, '', 'Working'),
(16, 'APSIT/LAB312/PC16', '', '', 312, '', 'Working'),
(17, 'APSIT/LAB312/PC17', '', '', 312, '', 'Working'),
(18, 'APSIT/LAB312/PC18', '', '', 312, '', 'Working'),
(19, 'APSIT/LAB312/PC19', '', '', 312, '', 'Working'),
(20, 'APSIT/LAB312/PC20', '', '', 312, '', 'Working'),
(21, 'APSIT/LAB312/PC21', '', '', 312, '', 'Working'),
(22, 'APSIT/LAB312/PC22', '', '', 312, '', 'Working'),
(23, 'APSIT/LAB312/PC23', '', '', 312, '', 'Working');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_add` varchar(200) NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_add`, `supplier_phone`, `added_on`) VALUES
(1, 'supplier', 'abc thane west 111111', 1234567890, '0000-00-00 00:00:00'),
(2, 'rookie', 'abc thane east 222222', 1234567890, '0000-00-00 00:00:00'),
(3, 'Atharva', 'abc thane west 000000', 1234567890, '0000-00-00 00:00:00'),
(5, 'Koi toh hai', 'pata nahi kidr rehta hai', 84713985, '2002-05-06 12:12:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`,`lab_id`),
  ADD KEY `item_cat` (`item_cat`),
  ADD KEY `item_cat_2` (`item_cat`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`),
  ADD UNIQUE KEY `lab_no_3` (`lab_no`),
  ADD UNIQUE KEY `lab_no_4` (`lab_no`),
  ADD KEY `lab_no` (`lab_no`),
  ADD KEY `lab_no_2` (`lab_no`);

--
-- Indexes for table `pc_details`
--
ALTER TABLE `pc_details`
  ADD PRIMARY KEY (`pc_name`);

--
-- Indexes for table `pc_lab312`
--
ALTER TABLE `pc_lab312`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `supplier_name` (`supplier_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pc_lab312`
--
ALTER TABLE `pc_lab312`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
