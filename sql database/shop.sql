-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 11:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `role`) VALUES
(1, 'hkr', 'admin', 'hkr@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'IPHONE'),
(2, 'SAMSUNG'),
(3, 'ACER'),
(4, 'CANON'),
(5, 'gsfs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quentity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quentity`, `image`) VALUES
(41, 'r06l5fnculctl595hj50kfui6r', 8, 'sdfsdfsd', 78.00, 1, '5cd71679077f8.jpg'),
(46, 'lcosl81qeesa5c6k40r9v7e8nd', 8, 'sdfsdfsd', 78.00, 1, '5cd71679077f8.jpg'),
(47, 'lcosl81qeesa5c6k40r9v7e8nd', 10, ' IPHONE', 58.00, 4, '5cd92590ebcda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `name`) VALUES
(2, 'desktop'),
(3, 'mobile'),
(4, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `quentity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `sId`, `userId`, `proId`, `proName`, `quentity`, `price`, `images`, `date`, `status`) VALUES
(24, 'efubg5mkval088qrctaet8qgu4', 3, 7, 'CANON', 1, 78.00, '5cd7166aeceb0.jpg', '2019-05-16 10:57:40', 0),
(25, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 3, 144.00, '5cd7165c03c7e.jpg', '2019-05-16 10:57:40', 0),
(26, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 3, 234.00, '5cd71679077f8.jpg', '2019-05-16 10:58:48', 0),
(27, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 6, 288.00, '5cd7165c03c7e.jpg', '2019-05-16 10:58:48', 0),
(28, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 1, 48.00, '5cd7165c03c7e.jpg', '2019-05-16 11:01:29', 0),
(29, 'efubg5mkval088qrctaet8qgu4', 3, 10, ' IPHONE', 4, 232.00, '5cd92590ebcda.jpg', '2019-05-16 11:01:29', 0),
(30, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 1, 48.00, '5cd7165c03c7e.jpg', '2019-05-16 11:03:54', 0),
(31, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 3, 234.00, '5cd71679077f8.jpg', '2019-05-16 11:03:54', 0),
(32, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 11:25:13', 0),
(33, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 3, 144.00, '5cd7165c03c7e.jpg', '2019-05-16 11:25:13', 0),
(34, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 11:27:24', 0),
(35, 'efubg5mkval088qrctaet8qgu4', 3, 11, 'mehejabin', 1, 79.00, '5cd925ab8299b.jpg', '2019-05-16 11:27:24', 0),
(36, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 1, 48.00, '5cd7165c03c7e.jpg', '2019-05-16 11:28:38', 0),
(37, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 11:40:21', 0),
(38, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 12:05:07', 0),
(39, 'efubg5mkval088qrctaet8qgu4', 3, 10, ' IPHONE', 1, 58.00, '5cd92590ebcda.jpg', '2019-05-16 13:03:45', 0),
(40, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 13:03:45', 0),
(41, 'efubg5mkval088qrctaet8qgu4', 3, 8, 'sdfsdfsd', 1, 78.00, '5cd71679077f8.jpg', '2019-05-16 20:27:53', 0),
(42, 'efubg5mkval088qrctaet8qgu4', 3, 6, 'liton', 1, 48.00, '5cd7165c03c7e.jpg', '2019-05-16 20:27:53', 0),
(43, 'efubg5mkval088qrctaet8qgu4', 3, 7, 'CANON', 1, 78.00, '5cd7166aeceb0.jpg', '2019-05-16 20:27:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `proId` int(11) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `proDetails` varchar(255) NOT NULL,
  `proPrice` float(10,2) NOT NULL,
  `proImage` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`proId`, `proName`, `catId`, `brandId`, `proDetails`, `proPrice`, `proImage`, `type`) VALUES
(6, 'liton', 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing', 48.00, '5cd7165c03c7e.jpg', 1),
(7, 'CANON', 4, 2, '<p>fdsfsdfsd</p>', 78.00, '5cd7166aeceb0.jpg', 2),
(8, 'sdfsdfsd', 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing', 78.00, '5cd71679077f8.jpg', 1),
(9, ' ACER', 2, 2, '<p>fsdfsdf</p>', 98.00, '5cd7168b75e72.jpg', 2),
(10, ' IPHONE', 3, 4, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 58.00, '5cd92590ebcda.jpg', 1),
(11, 'mehejabin', 4, 1, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 79.00, '5cd925ab8299b.jpg', 1),
(12, 'CANON', 2, 2, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 98.00, '5cd9286b7b44d.jpg', 1),
(13, 'CANON', 4, 1, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></p>', 722.00, '5cd9289073df4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regi`
--

CREATE TABLE `tbl_regi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regi`
--

INSERT INTO `tbl_regi` (`id`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `pass`) VALUES
(1, 'hhkr', 'thkrere', '44646', 'dev@gmail.com', 'fdfsd', 'null', 12455, '7888'),
(2, 'gfdgdf', 'gdfgdf', 'gdfgdf', 'gfdgd', 'gdfgdf', 'AF', 0, 'd41d8cd98f00b204e9800998ecf8427e'),
(3, 'liton devdfgdfgdf', 'jamal purgfgsdf', '1500', 'joy@gmail.com', 'jaamal pur khokhone', 'AL', 2147483647, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`proId`);

--
-- Indexes for table `tbl_regi`
--
ALTER TABLE `tbl_regi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_regi`
--
ALTER TABLE `tbl_regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
