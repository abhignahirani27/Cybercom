-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 08:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(4, 'Abhigna', '123', '1', '2021-03-16 04:29:26', '2021-03-22 19:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `entityTypeId` enum('category','product') NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(30) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `name`, `entityTypeId`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'color', 'product', 'color', 'varchar', 'textbox', 1, ''),
(3, 'brand', 'product', 'brand', 'varchar', 'textbox', 2, ''),
(5, 'weight', 'product', 'weight', 'varchar', 'textbox', 4, ''),
(7, 'model', 'product', 'model', 'varchar', 'textbox', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(2, 'black', 1, 2),
(4, 'Titan', 3, 1),
(5, 'Fastrack', 3, 2),
(6, '5kg', 5, 6),
(7, 'pink', 1, 3),
(14, 'Y51', 7, 9),
(15, 'A51', 7, 10),
(16, 'White', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `name`, `image`, `sortOrder`, `status`, `createdDate`) VALUES
(2, 'a', '', 1, '1', '2021-03-23 14:33:28'),
(6, 'c', '', 1, '1', '2021-03-23 18:21:37'),
(12, 'ab', '', 0, '0', '2021-03-24 07:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(30) NOT NULL,
  `customerId` int(30) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paymentId` int(30) NOT NULL,
  `shippingId` int(30) NOT NULL,
  `shippingAmount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sessionId`, `customerId`, `total`, `discount`, `paymentId`, `shippingId`, `shippingAmount`, `createdDate`) VALUES
(1, '', 0, 0, 0, 0, 0, 0, '2021-04-03 11:53:54'),
(2, '', 26, 0, 0, 0, 0, 0, '2021-04-03 11:54:14'),
(3, '', 30, 0, 0, 0, 0, 0, '2021-04-03 11:54:50'),
(4, '', 36, 0, 0, 0, 0, 0, '2021-04-03 12:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `addressId` varchar(40) DEFAULT NULL,
  `addressType` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `sameAsBilling` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipcode`, `sameAsBilling`) VALUES
(5, 2, NULL, 'billing', 'X-147 Sainath Society', 'Ankleshwar', 'Gujarat', 'India', 393002, 0),
(6, 2, NULL, 'shipping', 'X-147 Sainath Society', 'Ankleshwar', 'Gujarat', 'India', 393002, 0),
(7, 4, NULL, 'billing', 'a', 'b', 'c', 'India', 123, 0),
(8, 4, NULL, 'shipping', 'a', 'b', 'c', 'India', 123, 0),
(9, 3, NULL, 'billing', 'X-147 Anand Vihar Society', 'Rajkot', 'Gujarat', 'India', 393002, 0),
(10, 3, NULL, 'shipping', 'X-147 Anand Vihar Society', 'Rajkot', 'Gujarat', 'India', 393002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` float NOT NULL,
  `price` float NOT NULL,
  `discount` double NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartItemId`, `cartId`, `productId`, `quantity`, `basePrice`, `price`, `discount`, `createdDate`) VALUES
(1, 1, 51, 2, 0, 7000, 50, '2021-04-03 11:54:06'),
(2, 2, 51, 2, 0, 7000, 50, '2021-04-03 11:54:26'),
(3, 2, 58, 1, 0, 70000, 20, '2021-04-03 11:54:36'),
(4, 4, 51, 2, 0, 7000, 50, '2021-04-03 23:29:57'),
(5, 3, 51, 1, 0, 7000, 50, '2021-04-04 23:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pathId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `parentId`, `status`, `description`, `pathId`) VALUES
(1, 'Bedroom', 0, '1', 'Nice ', '1'),
(2, 'Beds', 1, '1', 'Sleep tight', '1=2'),
(3, 'Panel Bed', 2, '1', 'Maja aa gaya', '1=2=3'),
(4, 'Dressers', 1, '1', 'Ready here', '1=4'),
(5, 'Nightstands', 1, '1', 'Nice', '1=5'),
(6, 'Living Room', 0, '1', 'Sit here', '6'),
(7, 'Sofas', 6, '1', 'Comfortable', '6=7'),
(8, 'Loveseats', 6, '1', 'Awsome', '6=8'),
(9, 'Tables', 6, '1', 'Good', '6=9'),
(10, 'Dinning Room', 0, '1', 'Eat here', '10'),
(11, 'Table', 10, '1', 'Niceee', '10=11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(8, 'CSS', '2', '', '1', '2021-03-16 04:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstname`, `lastname`, `email`, `password`, `status`, `createdDate`, `updatedDate`, `groupId`) VALUES
(26, 'Abhigna', 'Hirani', 'abc@gmail.com', 'abhi', '1', '2021-03-07 12:57:43', '2021-03-20 06:05:29', 1),
(30, 'Jigna', 'Hirani', 'c@gmail.com', 'jigna', '1', '2021-03-08 18:37:32', '0000-00-00 00:00:00', 2),
(36, 'Abhi', '', '', '', '0', '2021-04-03 08:45:47', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `addressType` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(10, 26, 'X-147 Sainath Society', 'Ankleshwar', 'Gujarat', '393002', 'India', 'billing'),
(11, 26, 'X-147 Sainath Society', 'Ankleshwar', 'Gujarat', '393002', 'India', 'shipping'),
(12, 30, 'X-147 Anand Vihar Society', 'Ankleshwar', 'Gujarat', '393002', 'India', 'billing'),
(13, 30, 'X-147 Anand Vihar Society', 'Ankleshwar', 'Gujarat', '393002', 'India', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'Wolesale', '1', '2021-03-07 15:32:49'),
(2, 'Retail', '1', '2021-03-07 16:57:04'),
(6, 'Abc', '1', '2021-03-14 17:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `name`, `code`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(6, 'Abhigna Hirani', '123erty', 'Payment Done', '1', '2021-03-16 04:26:47', '0000-00-00 00:00:00'),
(7, 'Jery', 'ffmgdgkg234', 'Done!!!!', '1', '2021-03-16 04:27:09', '0000-00-00 00:00:00'),
(9, 'Jery', 'ffmgdgkg234', 'Done!!!!done....', '1', '0000-00-00 00:00:00', '2021-04-01 07:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(255) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `discount` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(51, 'a12sv345', 'iphone', '7000', 50, 2, 'nice', '1', '2021-02-22 05:31:05', '2021-03-30 07:06:44'),
(58, 'agho12345', 'iphone', '70000', 20, 1, 'Good ', '1', '2021-02-23 16:35:02', '2021-03-26 07:24:41'),
(62, '123dffh', 'telephone', '1000', 10, 1, '', '1', '2021-02-23 16:59:36', '2021-03-26 07:26:08'),
(66, 'agho123', 'tv', '2000', 20, 1, 'nice', '1', '0000-00-00 00:00:00', '2021-03-26 07:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(15) NOT NULL,
  `productId` int(15) NOT NULL,
  `customerGroupId` int(15) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 51, 1, '6000'),
(2, 51, 2, '8000'),
(3, 51, 3, '0'),
(4, 65, 1, '100'),
(5, 65, 2, '1'),
(6, 65, 3, '0'),
(7, 51, 6, '8000'),
(8, 58, 1, '6000'),
(9, 58, 2, '8000'),
(10, 58, 6, '0'),
(11, 65, 6, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `mediaId` int(255) NOT NULL,
  `productId` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(4) NOT NULL DEFAULT 0,
  `thumb` tinyint(4) NOT NULL DEFAULT 0,
  `base` tinyint(4) NOT NULL DEFAULT 0,
  `gallery` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`mediaId`, `productId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`) VALUES
(3, 51, 'skin/admin/upload/phone.jpg', 'phone.jpg', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(19, 'Watch', 'Asdfgbvfcds', '500', 'Nice one', '1', '2021-03-16 06:20:29', '2021-03-18 15:04:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `mediaId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customer_group` (`groupId`);

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `product_media_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
