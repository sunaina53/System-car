-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 02:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

CREATE TABLE `appoint` (
  `ap_id` int(11) NOT NULL,
  `ap_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `id_mem` int(11) NOT NULL,
  `b_mail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tel_mem` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `car_num` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `car_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `stsv_id` int(11) NOT NULL,
  `year_car` int(3) NOT NULL,
  `mile` int(10) NOT NULL,
  `b_date` date NOT NULL,
  `b_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `b_dateaction` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `id_mem`, `b_mail`, `tel_mem`, `car_num`, `car_id`, `sv_id`, `stsv_id`, `year_car`, `mile`, `b_date`, `b_time`, `b_dateaction`) VALUES
(33, 10, 'aaa@aaa.com', 'ssss', '52422', 1, 4, 4, 2558, 1395202, '2564-05-22', '21:06', '2021-07-14'),
(34, 10, 'kjnbkjb', 'ssss', 'ljjnjln', 2, 2, 1, 18755, 12547455, '2564-02-08', '01:00', '2021-07-21'),
(35, 8, '', 'qqq', '', 2, 3, 2, 2559, 0, '2021-12-08', '05:40', '2021-08-03'),
(36, 11, 'admin@mail.com', '1234567890', '1กม 7118', 2, 4, 1, 2558, 19800, '0000-00-00', '03:09', '2021-08-06'),
(37, 11, 'tatasunainatata@gmail.com', '1234567890', '1กม 7118', 1, 3, 1, 2559, 20000, '3333-03-20', '02:12', '2021-08-06'),
(38, 11, '', '1234567890', '', 1, 1, 1, 0, 0, '0000-00-00', '20:35', '2021-08-16'),
(39, 12, 'alaaa@use.com', '0587457896', '8045', 2, 1, 1, 0, 10548, '2564-12-22', '14:23', '2021-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `ctype_id` int(11) NOT NULL,
  `ctype_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`ctype_id`, `ctype_name`) VALUES
(1, '4 ประตู'),
(2, 'กะบะ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_tel` int(10) NOT NULL,
  `cus_user` varchar(12) NOT NULL,
  `cus_pass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_address`, `cus_tel`, `cus_user`, `cus_pass`) VALUES
(2, 'bbbb', 'BBBB', 222222, 'bbbbbb', 'bbbbb'),
(4, 'qqqq', 'qqqq', 956444, 'qqqq', '3bad6af0fa4b');

-- --------------------------------------------------------

--
-- Table structure for table `datacar`
--

CREATE TABLE `datacar` (
  `car_id` int(11) NOT NULL,
  `ctype_id` int(11) NOT NULL,
  `car_brand` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datacar`
--

INSERT INTO `datacar` (`car_id`, `ctype_id`, `car_brand`, `car_model`) VALUES
(1, 1, 'civic', '2020'),
(2, 2, 'toyota', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `dataspare`
--

CREATE TABLE `dataspare` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(50) NOT NULL,
  `sp_price` int(8) NOT NULL,
  `sp_point` int(3) NOT NULL,
  `sp_unit` varchar(11) NOT NULL,
  `sptype_id` int(11) NOT NULL,
  `sp_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dataspare`
--

INSERT INTO `dataspare` (`sp_id`, `sp_name`, `sp_price`, `sp_point`, `sp_unit`, `sptype_id`, `sp_balance`) VALUES
(1, 'หม้อน้ำ', 8500, 5, 'หม้อน้ำ', 1, -8),
(2, 'แบตเตอรี่', 1500, 2, 'ก้อน', 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `em_id` int(11) NOT NULL,
  `em_name` varchar(35) NOT NULL,
  `em_address` text NOT NULL,
  `em_tel` int(10) NOT NULL,
  `em_position` varchar(20) NOT NULL,
  `em_user` varchar(12) NOT NULL,
  `em_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`em_id`, `em_name`, `em_address`, `em_tel`, `em_position`, `em_user`, `em_pass`) VALUES
(4, 'แอดมิน', 'hhh 3232', 3232323, 'admin', 'hhhh', 'c978693c0994a3455b946a345fb0337b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `id_mem` int(11) NOT NULL,
  `o_mail` varchar(60) NOT NULL,
  `tel_mem` varchar(10) NOT NULL,
  `car_id` int(11) NOT NULL,
  `year_car` int(5) NOT NULL,
  `number_car` varchar(8) NOT NULL COMMENT 'ทะเบียนรถ',
  `mile` varchar(10) NOT NULL COMMENT 'ระยะไมล์',
  `sv_id` int(11) NOT NULL COMMENT 'ประเภทงานบริการ',
  `svst_id` int(11) NOT NULL COMMENT 'สถานะบริการ',
  `o_date` datetime(6) NOT NULL,
  `o_daterq` varchar(30) NOT NULL,
  `o_timerq` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `id_mem`, `o_mail`, `tel_mem`, `car_id`, `year_car`, `number_car`, `mile`, `sv_id`, `svst_id`, `o_date`, `o_daterq`, `o_timerq`) VALUES
(7, 12, 'KK@GMAIL.VOM', '0587457896', 2, 2559, 'aaaa', '4444444', 2, 2, '2021-09-25 15:36:22.000000', '1698-08-14', '22:30'),
(8, 12, 'tatasunainatata@gmail.com', '0587457896', 2, 2558, '44444', '123132', 2, 1, '2021-10-05 13:58:00.000000', '1201-12-02', '06:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `detail_id` int(11) NOT NULL COMMENT 'ไอดี',
  `o_id` int(11) NOT NULL COMMENT 'ไอดีออเดอร์',
  `sp_id` int(11) NOT NULL COMMENT 'ไอดีอะไหล่',
  `qty` int(3) NOT NULL COMMENT 'จำนวน',
  `total` int(10) NOT NULL COMMENT 'ยอดรวมราคา',
  `wage` int(20) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`detail_id`, `o_id`, `sp_id`, `qty`, `total`, `wage`, `comment`) VALUES
(27, 0, 1, 1, 8500, 2000, ''),
(28, 7, 1, 2, 17000, 250, ''),
(29, 7, 2, 1, 1500, 250, ''),
(30, 7, 1, 1, 8500, 450, '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sv_id` int(11) NOT NULL,
  `sv_name` varchar(50) NOT NULL,
  `sv_price` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sv_id`, `sv_name`, `sv_price`) VALUES
(1, 'ระบบแอร์', ''),
(2, 'ระบบหม้อน้ำ', ''),
(3, 'ระบบไฟ', ''),
(4, 'น้ำมันเครื่อง/เช็คระยะ', '');

-- --------------------------------------------------------

--
-- Table structure for table `serv_status`
--

CREATE TABLE `serv_status` (
  `stsv_id` int(11) NOT NULL,
  `stsv_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serv_status`
--

INSERT INTO `serv_status` (`stsv_id`, `stsv_name`) VALUES
(1, 'รอตรวจสอบ'),
(2, 'นัดหมาย'),
(3, 'ยกเลิก'),
(4, 'ไม่มาตามนัด'),
(6, 'ชำระเงินเสร็จสิ้น');

-- --------------------------------------------------------

--
-- Table structure for table `spare_type`
--

CREATE TABLE `spare_type` (
  `sptype_id` int(11) NOT NULL,
  `sptype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spare_type`
--

INSERT INTO `spare_type` (`sptype_id`, `sptype_name`) VALUES
(1, 'หม้อน้ำ'),
(2, 'แบตเตอรี่');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(30) NOT NULL,
  `sup_address` text NOT NULL,
  `sup_tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mem`
--

CREATE TABLE `tb_mem` (
  `id_mem` int(11) NOT NULL,
  `name_mem` varchar(25) NOT NULL,
  `last_mem` varchar(25) NOT NULL,
  `userlevel` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tel_mem` varchar(10) NOT NULL,
  `address_mem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_mem`
--

INSERT INTO `tb_mem` (`id_mem`, `name_mem`, `last_mem`, `userlevel`, `username`, `password`, `tel_mem`, `address_mem`) VALUES
(2, 'sss', 'sss', '', 'sss', '9f6e6800cfae7749eb6c48661', '555', '555'),
(3, 'sss', 'sss', 'สมาชิก', 'sss', '9f6e6800cfae7749eb6c48661', '555', '555'),
(4, 'aaa', 'aaa', 'สมาชิก', 'aaa', '47bce5c74f589f4867dbd57e9', 'aaa', 'aaa'),
(8, 'qqq', 'qqq1', 'สมาชิก', 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', 'qqq', 'qqq'),
(10, 'ssss', 'ssss', 'สมาชิก', 'ssss', '8f60c8102d29fcd525162d02eed4566b', 'ssss', 'ssss'),
(11, 'ad', 'min', 'แอดมิน', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', '123465487'),
(12, 'user', 'user', 'สมาชิก', 'user', '81dc9bdb52d04dc20036dbd8313ed055', '0587457896', '48/32 mootaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`ctype_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `datacar`
--
ALTER TABLE `datacar`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `dataspare`
--
ALTER TABLE `dataspare`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sv_id`);

--
-- Indexes for table `serv_status`
--
ALTER TABLE `serv_status`
  ADD PRIMARY KEY (`stsv_id`);

--
-- Indexes for table `spare_type`
--
ALTER TABLE `spare_type`
  ADD PRIMARY KEY (`sptype_id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `tb_mem`
--
ALTER TABLE `tb_mem`
  ADD PRIMARY KEY (`id_mem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoint`
--
ALTER TABLE `appoint`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `ctype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datacar`
--
ALTER TABLE `datacar`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dataspare`
--
ALTER TABLE `dataspare`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serv_status`
--
ALTER TABLE `serv_status`
  MODIFY `stsv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spare_type`
--
ALTER TABLE `spare_type`
  MODIFY `sptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mem`
--
ALTER TABLE `tb_mem`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
