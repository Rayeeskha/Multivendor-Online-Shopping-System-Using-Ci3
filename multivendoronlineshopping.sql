-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 09:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multivendoronlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupan_master`
--

CREATE TABLE `coupan_master` (
  `id` int(11) NOT NULL,
  `coupan_code` varchar(100) NOT NULL,
  `coupan_type` varchar(100) NOT NULL,
  `coupan_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupan_master`
--

INSERT INTO `coupan_master` (`id`, `coupan_code`, `coupan_type`, `coupan_value`, `cart_min_value`, `status`, `create_date`, `expiry_date`) VALUES
(1, 'First20', 'Rupee', 180, 1700, 1, '2020-12-31 04:47:21', '2021-01-10'),
(3, 'First150', 'Percentage', 50, 5000, 0, '2021-01-04 05:24:44', '2021-01-04'),
(4, 'Sum10', 'Rupee', 200, 500, 0, '2021-01-04 05:31:13', '2021-01-07'),
(5, 'First10', 'Rupee', 50, 500, 0, '2021-01-04 05:42:03', '2021-01-29'),
(6, 'special', 'Percentage', 12, 1700, 0, '2021-01-04 06:29:28', '2021-01-31'),
(13, 'Special50', 'Percentage', 50, 1500, 0, '2021-01-29 07:40:43', '2021-01-30'),
(14, 'Firstorder50', 'Percentage', 50, 2500, 0, '2021-01-29 08:47:00', '2021-06-30'),
(15, 'First40', 'Percentage', 40, 1500, 0, '2021-01-30 06:46:13', '2021-06-30'),
(16, 'First60', 'Percentage', 60, 60, 0, '2021-01-30 08:10:23', '2021-06-30'),
(17, 'First30', 'Percentage', 30, 2500, 0, '2021-01-31 05:33:08', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `couponName` varchar(30) NOT NULL,
  `couponCode` varchar(50) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `couponType` varchar(30) NOT NULL,
  `product_id` int(10) NOT NULL,
  `couponStartDate` varchar(30) NOT NULL,
  `couponExpiryDate` varchar(30) NOT NULL,
  `couponAmount` varchar(100) NOT NULL,
  `createdBy` text NOT NULL,
  `couponStatus` varchar(30) NOT NULL,
  `seller_id` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `couponName`, `couponCode`, `discount_type`, `couponType`, `product_id`, `couponStartDate`, `couponExpiryDate`, `couponAmount`, `createdBy`, `couponStatus`, `seller_id`) VALUES
(4, 'Summery Coupan', '8038', '', 'deluxeCoupon', 31, '2020-12-28', '2021-01-20', '75', 'Khan Rayees', '1', 0),
(5, 'Summery Coupan', 'NW29', '', 'deluxeCoupon', 23, '2020-12-28', '2021-01-14', '25', 'Khan Rayees', '0', 0),
(6, 'Summery Coupan', 'ED37', '', 'deluxeCoupon', 29, '2020-12-14', '2020-12-31', '200', '2020-12-28', '0', 0),
(7, 'Summery Coupan', 'OB56', '', 'deluxeCoupon', 28, '2020-12-28', '2020-12-31', '23', 'Khan Rayees', '1', 0),
(9, 'Summery Coupan', 'TV24', '', 'deluxeCoupon', 31, '2020-12-30', '2020-12-31', '250', 'Khan Rayees', '0', 0),
(10, 'Summery', 'MP20', '', 'specialCoupon', 28, '2021-01-04', '2021-01-21', '100', 'Khan Rayees', '0', 0),
(11, 'Summery', 'EM64', '', 'deluxeCoupon', 31, '2021-01-04', '2021-01-23', '100', 'Khan Rayees', '0', 0),
(12, 'Summery', 'QZ55', '', 'specialCoupon', 34, '2021-01-19', '2021-01-29', '2100', '2021-01-04', '0', 0),
(13, 'Summery', 'TL82', '', 'specialCoupon', 22, '2021-01-21', '2021-01-30', '3100', '2021-01-04', '0', 0),
(14, 'Summery', '0J21', '', 'premiumCoupon', 42, '2021-01-04', '2021-01-30', '1200', '2021-01-04', '0', 0),
(15, 'Special Coupon', 'NE60', '', 'luxuryCoupon', 38, '2021-01-13', '2021-01-31', '200', 'Khan Rayees', '0', 0),
(16, 'Special Coupon', 'YN53', '', 'luxuryCoupon', 40, '2021-01-12', '2021-01-31', '200', 'Khan Rayees', '0', 0),
(17, 'Summery Coupan', 'KS66', '', 'luxuryCoupon', 37, '2021-01-04', '2021-01-31', '1200', 'Khan Rayees', '0', 0),
(18, 'Special Coupon', 'IX36', '', 'luxuryCoupon', 26, '2021-01-04', '2021-01-31', '1200', 'Khan Rayees', '0', 0),
(19, 'Angel Footwear', '9F30', 'Rupee', 'deluxeCoupon', 58, '2021-01-08', '2021-01-23', '1000', 'Footwearshop', '0', 1),
(20, 'Summery', 'NV84', 'Percentage', 'premiumCoupon', 57, '2021-01-08', '2021-01-30', '50', 'Footwearshop', '0', 1),
(23, 'Special', 'LC89', 'Rupee', 'specialCoupon', 68, '2021-01-29', '2021-06-29', '10', 'Angel Footwear', '0', 4),
(24, 'Special', 'IG44', 'Rupee', 'deluxeCoupon', 70, '2021-01-30', '2021-06-30', '100', 'Angel Footwear', '0', 5),
(25, 'Special', 'MO07', 'Percentage', 'specialCoupon', 71, '2021-01-30', '2021-06-30', '10', 'Angel Footwear', '0', 6),
(26, 'Testing', 'EO05', 'Rupee', 'specialCoupon', 74, '2021-01-30', '2021-06-30', '100', 'Angel Footwear', '0', 7),
(27, 'testing', 'FB98', 'Rupee', 'deluxeCoupon', 77, '2021-01-31', '2021-06-30', '100', 'Fashion', '0', 9);

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `id` int(11) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_link` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_slider`
--

INSERT INTO `image_slider` (`id`, `slider_image`, `slider_link`, `description`) VALUES
(1, 'e.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(3, 'line.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(4, 'onl.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(5, 'li.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(6, 'onl1.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(7, 'e1.jpg', 'khanrayees.000webhostapp.com						\r\n					', ''),
(9, 'online2.jpg', 'khanrayees.000webhostapp.com			', ''),
(10, 'pngtree-fresh-hand-painted-blue-banner-on-fresh-fruits-and-vegetables-image_177599.jpg', 'khanrayees.000webhostapp.com						\r\n					', '40% Off All Products');

-- --------------------------------------------------------

--
-- Table structure for table `ms_admin`
--

CREATE TABLE `ms_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_admin`
--

INSERT INTO `ms_admin` (`id`, `username`, `password`, `fullname`, `login_date`) VALUES
(1, 'admin', 'admin', 'Khan Rayees', '2020-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `ms_cancel_ord_resion`
--

CREATE TABLE `ms_cancel_ord_resion` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resion_title` varchar(100) NOT NULL,
  `cancel_res_des` varchar(255) NOT NULL,
  `cancel_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_cancel_ord_resion`
--

INSERT INTO `ms_cancel_ord_resion` (`id`, `order_id`, `user_id`, `resion_title`, `cancel_res_des`, `cancel_date`) VALUES
(1, '542731', 1, 'I dont like that item', 'I dont like that item I want to Purchase some different products kindly cancel my orders', '2021-01-03 04:08:25'),
(2, '6395241', 1, 'I dont like that item', 'I dont like that item I want to buy another products this one is not sufficent for me !', '2021-01-03 04:14:00'),
(3, '922683', 1, 'How to fix that issue', 'How to fix that issue and how to refund payment status my money is deducted', '2021-01-04 01:04:42'),
(4, '87833', 1, 'I want buy ohter Products ', 'I want buy ohter Products  that item is not suffecent for me', '2021-01-04 03:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `ms_carts`
--

CREATE TABLE `ms_carts` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `session_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `total_rate` varchar(50) NOT NULL,
  `seller_id` bigint(20) NOT NULL,
  `couponCode` varchar(100) NOT NULL,
  `coupon_value` varchar(50) NOT NULL,
  `discount_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_carts`
--

INSERT INTO `ms_carts` (`id`, `product_id`, `session_id`, `product_name`, `sku_code`, `quantity`, `rate`, `total_rate`, `seller_id`, `couponCode`, `coupon_value`, `discount_type`) VALUES
(2, 2, 270905, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', '222222', 1, 549, '', 0, '', '', ''),
(3, 3, 270905, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', '3333333', 1, 2499, '', 0, '', '', ''),
(4, 4, 270905, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', '44444444', 1, 602, '', 0, '', '', ''),
(5, 11, 389128, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', '12222222', 1, 16500, '', 0, '', '', ''),
(6, 12, 389128, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', '12212121', 2, 16500, '', 0, '', '', ''),
(7, 10, 389128, 'Oppo F15  Ram: 8GB,  Rom: 128GB, Internal storage 128 GB Battery 4500Mh', '000099999', 1, 18000, '', 0, '', '', ''),
(8, 11, 964868, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', '12222222', 1, 16500, '', 0, '', '', ''),
(13, 2, 151435, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', '222222', 1, 549, '', 0, '', '', ''),
(14, 3, 151435, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', '3333333', 1, 2499, '', 0, '', '', ''),
(15, 4, 151435, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', '44444444', 1, 602, '', 0, '', '', ''),
(16, 4, 92243, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', '44444444', 1, 602, '', 0, '', '', ''),
(17, 3, 92243, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', '3333333', 1, 2499, '', 0, '', '', ''),
(20, 3, 567474, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', '3333333', 1, 2499, '', 0, '', '', ''),
(21, 2, 567474, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', '222222', 1, 549, '', 0, '', '', ''),
(22, 1, 567474, ' Mi Power Bank 3i 20000mAh (Sandstone Black) ', '111111', 1, 1498, '', 0, '', '', ''),
(23, 4, 567474, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', '44444444', 1, 602, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_categories`
--

CREATE TABLE `ms_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seller_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  `count_products` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_categories`
--

INSERT INTO `ms_categories` (`id`, `category_name`, `image`, `seller_id`, `status`, `count_products`, `date`) VALUES
(1, 'Mens Footwear', '71D9ImsvEtL__UL1500_1.jpg', 0, 0, 0, '2020-12-27'),
(2, 'Ladies Footwear', '94b6e5f8decc68720d2b168d07b7a577.jpg', 0, 0, 0, '2020-12-27'),
(3, 'Jewellery Fashion', '61psl5feHtL__UL1100_.jpg', 0, 0, 0, '2020-12-27'),
(4, 'fashion accessories for men', 'depositphotos_151125918-stock-photo-clothing-and-accessories-for-mens.jpg', 0, 0, 0, '2020-12-27'),
(5, 'fashion accessories for Ladies', 'asss.jpg', 0, 0, 0, '2020-12-27'),
(6, 'Health & Beauty Suppliments', 'beatu.jpg', 0, 0, 0, '2020-12-27'),
(7, 'Mobile Phones', 'mobil.jpg', 0, 0, 0, '2020-12-27'),
(8, 'Electronics Products', 'el.jpg', 0, 0, 0, '2020-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `ms_contact_us`
--

CREATE TABLE `ms_contact_us` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `message_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_contact_us`
--

INSERT INTO `ms_contact_us` (`id`, `user_id`, `full_name`, `mobile`, `email`, `message`, `message_date`) VALUES
(1, 1, 'Shahid', '0987654321', 'rayeesinfotech@gmail.com', 'Hi', '2021-01-02'),
(2, 1, 'Rayees khan', '9554540271', 'rayeesinfotech@gmail.com', 'My mony is dedected but my order is not success ', '2021-01-02'),
(3, 2, 'Khan Rayees', '08765439876', 'rayeesinfotech@gmail.com', 'My money is deducted but my order status is not confirmed', '2021-01-28'),
(4, 2, 'Rayees khan', '8765432222', 'krayees282@gmail.com', 'my money is deducted but my order is not confirmed', '2021-01-29'),
(5, 2, 'Rayees khan', '8765432222', 'krayees282@gmail.com', 'When my money is came deducted amount', '2021-01-29'),
(6, 2, 'Rayees khan', '8765432222', 'krayees282@gmail.com', 'hey how can find', '2021-01-30'),
(7, 2, 'Rayees khan', '8765432222', 'krayees282@gmail.com', 'Hey how are you', '2021-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `ms_feedback`
--

CREATE TABLE `ms_feedback` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_feedback`
--

INSERT INTO `ms_feedback` (`id`, `product_id`, `user_id`, `feedback`, `rating`, `image`, `status`, `feedback_date`) VALUES
(1, 21, 1, 'Very Good', '5', 'aurb52.jpg', 0, '2020-08-22'),
(2, 23, 1, 'Cipla Company is One of the Best Company !', '4', 'aurb2.jpg', 0, '2020-08-22'),
(3, 17, 1, 'Januvia is Good Products', '3', 'aurb6.jpg', 0, '2020-08-22'),
(4, 38, 1, 'California is a good Products', '2', 'aurb3.jpg', 0, '2020-08-22'),
(5, 29, 2, '', '5', '', 0, '2020-11-07'),
(6, 28, 2, 'Working perfectly good products ', '4', '', 0, '2020-08-22'),
(7, 3, 1, '', '5', '', 0, '2020-12-28'),
(8, 74, 2, 'good products', '5', 'docn.png', 0, '2021-01-31'),
(9, 6, 2, 'GOOD WATCH AND COMFERTABLE', '4', 'doct.png', 0, '2021-01-31'),
(10, 27, 2, 'Good Products', '5', '0b874825d1ec82b3b434590e679cbbb9.jpg', 0, '2021-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `ms_orders`
--

CREATE TABLE `ms_orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `total_quantity` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street_house_no` varchar(50) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `area_code` bigint(20) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `coupan_id` int(11) NOT NULL,
  `final_price` varchar(100) DEFAULT NULL,
  `coupan_value` varchar(100) NOT NULL,
  `coupan_mstercode` varchar(100) NOT NULL,
  `ship_order_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `delivered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_orders`
--

INSERT INTO `ms_orders` (`id`, `user_id`, `order_id`, `username`, `total_quantity`, `total_amount`, `payment_mode`, `order_date`, `shipping_address`, `first_name`, `last_name`, `mobile`, `email`, `street_house_no`, `zip_code`, `state`, `city`, `country`, `area_code`, `order_status`, `coupan_id`, `final_price`, `coupan_value`, `coupan_mstercode`, `ship_order_id`, `shipment_id`, `delivered_date`) VALUES
(1, 3, '707469', 'csddsd dsdsd', '4', '5148', 'COD', '2021-04-15', 'hj', 'csddsd', 'dsdsd', 908765438, 'rayeesinfotech@gmail.com', 'hj', '226026', 'Uttar Pradesh', 'Lucknow', 'India', 5264, 'Pending', 15, '3089', '2059', 'First40', 0, 0, '2021-04-15 08:57:14'),
(2, 3, '488987', 'csddsd dsdsd', '11', '153000', 'COD', '2021-04-15', 'hj', 'csddsd', 'dsdsd', 908765438, 'rayeesinfotech@gmail.com', 'hj', '226026', 'Uttar Pradesh', 'Lucknow', 'India', 5264, 'Pending', 15, '91800', '61200', 'First40', 0, 0, '2021-04-15 10:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `ms_order_products`
--

CREATE TABLE `ms_order_products` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `length` float NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `breadth` bigint(20) NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `total_rate` bigint(20) NOT NULL,
  `couponCode` varchar(50) NOT NULL,
  `coupon_value` varchar(50) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `seller_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_order_products`
--

INSERT INTO `ms_order_products` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `rate`, `length`, `weight`, `height`, `breadth`, `sku_code`, `total_rate`, `couponCode`, `coupon_value`, `discount_type`, `seller_id`) VALUES
(1, 537020, 6, 'Ironman Headset Perfect Ear Fansi Earphone & Comfortable', 1, 1650, 0, 0, 0, 0, '6666666', 0, '', '', '', 0),
(2, 537020, 5, 'Sony WF-Sports Noise Cancellation Extra Bass Bluetooth', 1, 650, 0, 0, 0, 0, '5555555', 0, '', '', '', 0),
(3, 537020, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(4, 345317, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(5, 345317, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(6, 345317, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(7, 193515, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(8, 193515, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(9, 193515, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(10, 23337, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(11, 23337, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(12, 75301, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(13, 75301, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(14, 49318, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(15, 49318, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(16, 56043, 5, 'Sony WF-Sports Noise Cancellation Extra Bass Bluetooth', 1, 650, 0, 0, 0, 0, '5555555', 0, '', '', '', 0),
(17, 56043, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(18, 56043, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(19, 48859, 57, 'Fancy Footwear', 1, 3200, 0, 0, 0, 0, '98327d', 0, '', '', '', 1),
(20, 48859, 26, 'Tommy Jackets', 1, 2500, 0, 0, 0, 0, '161616161', 0, '', '', '', 0),
(21, 66073, 57, 'Fancy Footwear', 1, 1600, 10, 9, 30, 20, '98327d', 3200, 'NV84', '50', 'Percentage', 1),
(22, 66073, 66, 'Fansi Sandels', 3, 750, 10, 9, 30, 20, 'jhgdjh673', 0, '', '', '', 4),
(23, 66073, 67, 'Ladeis Fansi Shoes', 1, 1200, 10, 9, 30, 20, 'JHJSGJghfyt76', 0, '', '', '', 4),
(24, 66073, 68, 'Realme Phones', 1, 10, 10, 9, 30, 20, 'GHDG56332D', 12000, 'LC89', '10', 'Rupee', 4),
(25, 50854, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 3, 602, 10, 9, 30, 20, '44444444', 0, '', '', '', 0),
(26, 50854, 6, 'Ironman Headset Perfect Ear Fansi Earphone & Comfortable', 1, 1650, 10, 9, 30, 20, '6666666', 0, '', '', '', 0),
(27, 50854, 66, 'Fansi Sandels', 1, 750, 10, 9, 30, 20, 'jhgdjh673', 0, '', '', '', 4),
(28, 50854, 69, 'Ladies Fansi Shoes', 1, 780, 10, 9, 30, 20, 'HJHJDG673', 0, '', '', '', 5),
(29, 50854, 26, 'Tommy Jackets', 1, 1200, 10, 9, 30, 20, '161616161', 2500, 'IX36', '1200', '', 0),
(30, 50854, 23, 'Ladies Top', 1, 1250, 10, 9, 30, 20, '13131312', 0, '', '', '', 0),
(31, 50854, 68, 'Realme Phones', 2, 12000, 10, 9, 30, 20, 'GHDG56332D', 0, '', '', '', 4),
(32, 50854, 65, 'Realme', 1, 10000, 10, 9, 30, 20, 'JHJSGJH7653', 0, '', '', '', 3),
(33, 50854, 63, 'Ladies Sandels', 1, 1200, 10, 9, 30, 20, 'JHKJD89LI', 0, '', '', '', 3),
(34, 50854, 64, 'Ladies shoes', 1, 750, 10, 9, 30, 20, 'HKJDHK67363', 0, '', '', '', 3),
(35, 50854, 62, 'OPPO A5 2020 (Dazzling White, 3GB RAM, 64GB Storage)', 3, 10000, 10, 9, 30, 20, 'nkjdhk93lh2', 0, '', '', '', 1),
(36, 47183, 39, 'High Heels', 1, 3500, 10, 8.9, 30, 20, '29292929', 0, '', '', '', 0),
(37, 47183, 71, 'Ladies Fansi Sandels', 2, 78, 10, 8.9, 30, 20, 'kjdshkj87768', 780, 'MO07', '10', 'Percentage', 6),
(38, 47183, 72, 'Ladies Shoes Fansi', 1, 540, 10, 8.9, 30, 20, 'JHJSGJgthvsht73', 0, '', '', '', 6),
(39, 561716, 74, 'Snakers Shoes', 2, 100, 9, 80, 30, 80, 'GHHFF53765', 1200, 'EO05', '100', 'Rupee', 7),
(40, 561716, 70, 'Ladies Sandels', 3, 450, 9, 80, 30, 80, 'jhdgjht67', 0, '', '', '', 5),
(41, 561716, 73, 'Ladies Shoes', 1, 12000, 9, 80, 30, 80, 'DHGFSH7572', 0, '', '', '', 7),
(42, 78394, 72, 'Ladies Shoes Fansi', 1, 540, 9, 8, 30, 80, 'JHJSGJgthvsht73', 0, '', '', '', 6),
(43, 78394, 74, 'Snakers Shoes', 2, 1200, 9, 8, 30, 80, 'GHHFF53765', 0, '', '', '', 7),
(44, 93826, 57, 'Fancy Footwear', 1, 1600, 9, 8, 30, 80, '98327d', 3200, 'NV84', '50', 'Percentage', 1),
(45, 93826, 27, 'Mens Jeans', 2, 1650, 9, 8, 30, 80, '17171771', 0, '', '', '', 0),
(46, 93826, 73, 'Ladies Shoes', 2, 12000, 9, 8, 30, 80, 'DHGFSH7572', 0, '', '', '', 7),
(47, 93826, 75, 'Top', 1, 850, 9, 8, 30, 80, 'djsgjh6487', 0, '', '', '', 8),
(48, 93826, 76, 'Snaker Shoes', 1, 1200, 9, 8, 30, 80, 'hfkdjh764', 0, '', '', '', 8),
(49, 63399, 27, 'Mens Jeans', 3, 1650, 9, 2.9, 12, 9, '17171771', 0, '', '', '', 0),
(50, 63399, 77, 'Snakers Shoes', 1, 100, 9, 2.9, 12, 9, 'HGHDG56563D', 1200, 'FB98', '100', 'Rupee', 9),
(51, 63399, 78, 'Sports Shoes', 1, 2700, 9, 2.9, 12, 9, 'ghffshg6675nmdb3', 0, '', '', '', 9),
(52, 385253, 68, 'Realme Phones', 1, 12000, 0, 0, 0, 0, 'GHDG56332D', 0, '', '', '', 4),
(53, 385253, 62, 'OPPO A5 2020 (Dazzling White, 3GB RAM, 64GB Storage)', 1, 10000, 0, 0, 0, 0, 'nkjdhk93lh2', 0, '', '', '', 1),
(54, 385253, 11, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', 2, 16500, 0, 0, 0, 0, '12222222', 0, '', '', '', 0),
(55, 385253, 12, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', 2, 16500, 0, 0, 0, 0, '12212121', 0, '', '', '', 0),
(56, 811520, 5, 'Sony WF-Sports Noise Cancellation Extra Bass Bluetooth', 1, 650, 20, 50, 50, 30, '5555555', 0, '', '', '', 0),
(57, 811520, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 20, 50, 50, 30, '222222', 0, '', '', '', 0),
(58, 811520, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 20, 50, 50, 30, '3333333', 0, '', '', '', 0),
(59, 461966, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 20, 20, 10, 30, '222222', 0, '', '', '', 0),
(60, 461966, 12, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', 1, 16500, 20, 20, 10, 30, '12212121', 0, '', '', '', 0),
(61, 418134, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(62, 418134, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(63, 85729, 74, 'Snakers Shoes', 1, 1200, 0, 0, 0, 0, 'GHHFF53765', 0, '', '', '', 7),
(64, 85729, 23, 'Ladies Top', 1, 1250, 0, 0, 0, 0, '13131312', 0, '', '', '', 0),
(65, 258519, 16, 'Lakme Pen Eyliner', 8, 150, 0, 0, 0, 0, '101010786', 0, '', '', '', 0),
(66, 587622, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(67, 587622, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(68, 587622, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(69, 587622, 1, ' Mi Power Bank 3i 20000mAh (Sandstone Black) ', 1, 1498, 0, 0, 0, 0, '111111', 0, '', '', '', 0),
(70, 550460, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(71, 550460, 1, ' Mi Power Bank 3i 20000mAh (Sandstone Black) ', 1, 1498, 0, 0, 0, 0, '111111', 0, '', '', '', 0),
(72, 707469, 4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 1, 602, 0, 0, 0, 0, '44444444', 0, '', '', '', 0),
(73, 707469, 3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 1, 2499, 0, 0, 0, 0, '3333333', 0, '', '', '', 0),
(74, 707469, 1, ' Mi Power Bank 3i 20000mAh (Sandstone Black) ', 1, 1498, 0, 0, 0, 0, '111111', 0, '', '', '', 0),
(75, 707469, 2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 1, 549, 0, 0, 0, 0, '222222', 0, '', '', '', 0),
(76, 488987, 9, 'Realme 2pro  4 GB RAM, 64 GB Internal storage and 6000Mh battery', 3, 13500, 0, 0, 0, 0, '9999999', 0, '', '', '', 0),
(77, 488987, 62, 'OPPO A5 2020 (Dazzling White, 3GB RAM, 64GB Storage)', 3, 10000, 0, 0, 0, 0, 'nkjdhk93lh2', 0, '', '', '', 1),
(78, 488987, 8, 'Realme X  4 GB RAM 24GB Internal storage 4400MH Battery', 2, 16500, 0, 0, 0, 0, '88888888', 0, '', '', '', 0),
(79, 488987, 12, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', 2, 16500, 0, 0, 0, 0, '12212121', 0, '', '', '', 0),
(80, 488987, 11, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', 1, 16500, 0, 0, 0, 0, '12222222', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_products`
--

CREATE TABLE `ms_products` (
  `id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sku_code` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL,
  `image_three` varchar(255) NOT NULL,
  `image_four` varchar(255) NOT NULL,
  `count_sales` varchar(255) NOT NULL,
  `seller_id` bigint(20) NOT NULL DEFAULT 0,
  `discouponType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_products`
--

INSERT INTO `ms_products` (`id`, `product_title`, `category_id`, `short_description`, `color`, `price`, `sku_code`, `status`, `upload_date`, `image`, `image_two`, `image_three`, `image_four`, `count_sales`, `seller_id`, `discouponType`) VALUES
(1, ' Mi Power Bank 3i 20000mAh (Sandstone Black) ', 8, '				Triple Output and Dual Input Port | 18W Fast Charging | Power Delivery			', 'Black', '1498', '111111', 0, '2020-12-27', 'pow.jpg', 'pow.jpg', 'pow.jpg', 'pow.jpg', '', 0, ''),
(2, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blue', 8, 'Callmate G 1155 2A 10000 -mAh Li-Ion Power Bank Blu', 'Blue', '549', '222222', 0, '2020-12-27', 'Callmate-G-1155-2A-10000-SDL491049915-1-3b4dd.jpeg', 'Callmate-G-1155-2A-10000-SDL491049915-1-3b4dd.jpeg', 'Callmate-G-1155-2A-10000-SDL491049915-1-3b4dd.jpeg', 'Callmate-G-1155-2A-10000-SDL491049915-1-3b4dd.jpeg', '2', 0, ''),
(3, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 8, 'Ironman Helmet - 6000 mAh Limited Edition Powerbank', 'Red', '2499', '3333333', 0, '2020-12-27', '2.jpg', '2.jpg', '2.jpg', '2.jpg', '1', 0, ''),
(4, 'Leevo Monster 5000mAh Pocket-Size Power Bank,Adoptor', 8, 'Leevo Monster 5000mAh Pocket-Size Power Bank, 2-Way Fast Charge with 2.4 A, Lithium Pol-ymer, Small Size with Great Power, Easy to Carry, Premium Design (Pink)', 'Pink', '602', '44444444', 0, '2020-12-27', '41F3YOMlIxL__SL1000_.jpg', '41F3YOMlIxL__SL1000_.jpg', '41F3YOMlIxL__SL1000_.jpg', '41F3YOMlIxL__SL1000_.jpg', '5', 0, ''),
(5, 'Sony WF-Sports Noise Cancellation Extra Bass Bluetooth', 8, '								Sony WF-SP800N Truly Wireless Sports Noise Cancellation Extra Bass Bluetooth						', 'Blue', '650', '5555555', 0, '2020-12-27', 'blu.jpg', 'blu.jpg', 'blu.jpg', 'blu.jpg', '1', 0, ''),
(6, 'Ironman Headset Perfect Ear Fansi Earphone & Comfortable', 8, '				Sony WF-SP800N Truly Wireless Sports Noise Cancellation Extra Bass Bluetooth			', 'Black', '1650', '6666666', 0, '2020-12-27', 'hed.jpg', 'hed.jpg', 'hed.jpg', 'hed.jpg', '1', 0, ''),
(7, 'Realme C15 with 4 GB RAM, 64 GB Internal storage and 6000 battery', 7, 'Realme C15 in India is 11144 as on today. Phone is loaded with 4 GB RAM, 64 GB Internal storage and 6000 battery', 'Blue', '11500', '77777777', 0, '2020-12-27', 'mob.jpeg', 'mob.jpeg', 'mob.jpeg', 'mob.jpeg', '2', 0, ''),
(8, 'Realme X  4 GB RAM 24GB Internal storage 4400MH Battery', 7, 'Realme X is the company’s first step into the premium segment,Realme X  4 GB RAM 16GB Internal 2400MH Battery', 'Blue', '16500', '88888888', 0, '2020-12-27', 'mob1.jpg', 'mob1.jpg', 'mob1.jpg', 'mob1.jpg', '12', 0, ''),
(9, 'Realme 2pro  4 GB RAM, 64 GB Internal storage and 6000Mh battery', 7, 'Realme 2pro  4 GB RAM, 64 GB Internal storage and 6000Mh battery', 'Red', '13500', '9999999', 0, '2020-12-27', 'mob2.jpg', 'mob2.jpg', 'mob2.jpg', 'mob2.jpg', '8', 0, ''),
(10, 'Oppo F15  Ram: 8GB,  Rom: 128GB, Internal storage 128 GB Battery 4500Mh', 7, 'Oppo F15  Ram: 8GB,  Rom: 128GB, Internal storage 128 GB Battery 4500Mh', 'Blue', '18000', '000099999', 0, '2020-12-27', 'mob3.jpg', 'mob3.jpg', 'mob3.jpg', 'mob3.jpg', '2', 0, ''),
(11, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', 7, 'Vivo S1 4GB RAM 128GB ROM internal storage 4500MH Battery', 'Lineargradient Black', '16500', '12222222', 0, '2020-12-27', 'mob4.png', 'mob4.png', 'mob4.png', 'mob4.png', '', 0, ''),
(12, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', 7, 'Oppo K3 4GB RAM 32GB Internal 128GB ROM 4500MH Battery', 'Blue', '16500', '12212121', 0, '2020-12-27', 'Oppo-A3.jpg', 'de4.jpg', 'dee.jpg', 'de.jpg', '1', 0, ''),
(13, 'SACE LADY Face Makeup', 6, 'SACE LADY Face Makeup', 'grey', '650', '1312131', 0, '2020-12-27', 'mak2.jpg', 'mak3.jpg', 'mak.jpg', 'mak21.jpg', '', 0, ''),
(14, 'Glow Job Cream', 6, 'Glow Job Cream', 'White', '150', '101099', 0, '2020-12-27', 'glo1.jpg', 'glo2.jpg', 'glow3.jpg', 'glo11.jpg', '4', 0, ''),
(15, 'Weddings Favorite Bridal', 6, 'Weddings\r\nFavorite Bridal Beauty Products', 'White', '1650', '1010988', 0, '2020-12-27', 'fl1.jpg', 'fl2.jpg', 'fl3.jpg', 'fl11.jpg', '3', 0, ''),
(16, 'Lakme Pen Eyliner', 6, 'Lakme Pen Eyeliner', 'Black', '150', '101010786', 0, '2020-12-27', 'ey1.jpg', 'ey2.jpg', 'ey3.jpg', 'eye.jpg', '1', 0, ''),
(17, 'Lotus Facewash', 6, ' Beauty Products Lotus Facewash', 'Combine', '150', '101098760', 0, '2020-12-27', 'lo1.jpg', 'lo2.jpg', 'lo3.jpg', 'lo4.jpg', '2', 0, ''),
(18, 'Ladies Mackup Box', 6, 'Mackup Box Products ', 'Combine', '1200', '10108965', 0, '2020-12-27', 'mac1.jpg', 'mac2.jpg', 'mac3.jpg', 'mac4.jpg', '3', 0, ''),
(19, 'Ladies Jeans', 5, 'Ladies Jeans Wear', 'Blue', '850', '098292', 0, '2020-12-27', 'lj1.jpg', 'lj2.jpg', 'lj3.jpg', 'lj4.jpg', '1', 0, ''),
(20, 'Western Party Wear ', 5, '\r\nWestern Party Wear Stylish Black Dress', 'Black', '950', '1019292', 0, '2020-12-27', 'gl1.jpg', 'gl2.jpg', 'gl5.jpg', 'gl21.jpg', '1', 0, ''),
(21, 'Ladies Kurti ', 5, '\r\nWestern Party Wear Stylish Kurti', 'Combine', '1600', '110101', 0, '2020-12-27', 'ku1.jpg', 'ku2.jpeg', 'ku3.jpg', 'ku4.jpg', '8', 0, ''),
(22, 'Fansi Sari', 5, 'Ladies Fansi Sari Collection ', 'Combine', '4500', '121212', 0, '2020-12-27', 'sa1.jpg', 'sa2.jpg', 'sa3.jpeg', 's4.jpg', '9', 0, 'specialCoupon'),
(23, 'Ladies Top', 5, 'Ladies Top Wear Collection', 'Combine', '1250', '13131312', 0, '2020-12-27', 'top3.jpg', 'top2.jpg', 'top1.jpg', 'top31.jpg', '1', 0, 'deluxeCoupon'),
(24, 'Jeans Collection', 5, 'Jeans Collection Branded ', 'Blue', '1250', '14141414', 0, '2020-12-27', 'gn1.jpg', 'jn2.jpg', 'jn3.jpg', 'gn11.jpg', '8', 0, ''),
(25, 'Denim Jeans', 4, 'Denim Jeans Branded Products', 'Black', '1450', '15151515', 0, '2020-12-27', 'mj1.jpg', 'mj2.jpg', 'mj3.jpg', 'mj11.jpg', '', 0, ''),
(26, 'Tommy Jackets', 4, 'Tommy Branded Jackets', 'Blue', '2500', '161616161', 0, '2020-12-27', 'cu1.jpg', 'cu2.jpg', 'cu21.jpg', 'cu11.jpg', '2', 0, 'luxuryCoupon'),
(27, 'Mens Jeans', 4, 'Mens Branded Jeans', 'Blue', '1650', '17171771', 0, '2020-12-27', 'j.jpg', 'j2.jpg', 'j3.jpg', 'j31.jpg', '5', 0, ''),
(28, 'Mens Shurt', 4, 'Men\'s T-shurt Branded', 'Blue', '850', '181818181', 0, '2020-12-27', 't.jpg', 't2.jpg', 't3.jpg', 't1.jpg', '4', 0, 'specialCoupon'),
(29, 'Mens Partywear', 4, 'Mes Partiwear Collection', 'Combine', '12000', '1919191191', 0, '2020-12-27', '3.jpg', 'bl1.jpg', 'bl2.jpg', 'bl4.jpg', '', 0, 'deluxeCoupon'),
(30, 'Mens Formal', 4, 'Mens Formal Dress Collection', 'Black', '4500', '20202022', 0, '2020-12-27', 'b12.jpg', '31.jpg', 'b1.jpg', 'b3.jpg', '', 0, ''),
(31, 'Ladies Ring', 3, 'Ladies Rings Collection', 'Silver', '450', '21212121', 0, '2020-12-27', 'ri1.jpg', 'ri3.jpg', 'ri.jpg', 'ri11.jpg', '', 0, 'deluxeCoupon'),
(32, ' Gold Plated Necklace ', 3, '\r\nFashion Gold Plated Necklace Jewelry', 'Silver', '2250', '2122222', 0, '2020-12-27', 'nk.jpg', 'nk2.jpg', 'nk3.jpg', 'nk1.jpg', '', 0, ''),
(33, 'Gold Rings', 3, 'Best Jwellary Product 100% PureGold ', 'Silver', '22500', '234133', 0, '2020-12-27', 'rg3.png', 'rg.jpg', 'rg2.jpg', 'rg1.jpg', '', 0, ''),
(34, 'Crbon Brain Rings', 3, 'Fashion Gold Plated Brain Rings Jewelry 100% Pure', 'Silver', '25000', '24242442', 0, '2020-12-27', 'br.jpg', 'br2.jpg', 'br3.jpg', 'br1.jpg', '', 0, 'specialCoupon'),
(35, 'Gold Rings', 3, 'Best Jwellary Product 100% PureGold ', 'Silver', '22500', '25252552', 0, '2020-12-27', 'rg3.png', 'rg.jpg', 'rg2.jpg', 'rg1.jpg', '', 0, ''),
(36, 'Crbon Brain Rings', 3, 'Fashion Gold Plated Brain Rings Jewelry 100% Pure', 'Silver', '25000', '26262626', 0, '2020-12-27', 'br.jpg', 'br2.jpg', 'br3.jpg', 'br1.jpg', '', 0, ''),
(37, 'Sandle', 2, 'Ladies Fansi Footwear', 'grey', '2250', '27272772', 0, '2020-12-27', 's1.jpg', 's2.jpg', 's3.jpg', 's41.jpg', '1', 0, 'luxuryCoupon'),
(38, 'Diamond Sandle', 2, 'Diamond Sandle', 'Silver', '2500', '282882828', 0, '2020-12-27', 'f1.jpg', 'f2.jpg', 'f3.jpg', 'f11.jpg', '1', 0, 'luxuryCoupon'),
(39, 'High Heels', 2, 'High Heels Sandle', 'Silver', '3500', '29292929', 0, '2020-12-27', 'h1.jpg', 'h2.jpg', 'h3.jpg', 'h4.jpg', '3', 0, ''),
(40, 'Feet Sandles', 2, 'Feet Sandles', 'grey', '760', '30303033', 0, '2020-12-27', 'l.jpg', 'l2.jpg', 'l1.jpg', 'l21.jpg', '', 0, 'luxuryCoupon'),
(41, 'High Heels Fansi', 2, 'Ladies High Heels ', 'Silver', '4500', '31313131', 0, '2020-12-27', 'hi3.jpg', 'hi2.jpg', 'hi.jpg', 'hi31.jpg', '', 0, ''),
(42, 'High Heels', 2, 'Ladies Footwear Products', 'Silver', '4500', '32323323', 0, '2020-12-27', 'hl.jpg', 'hl2.jpg', 'hl3.jpg', 'hl1.jpg', '', 0, 'premiumCoupon'),
(57, 'Fancy Footwear', 1, 'Good Products', 'Black', '3200', '98327d', 0, '2021-01-07', 'fe998f15440b493a0d88e9a4b20fbfe9.jpg', '0bed25fac88b63e14ae378b236e5f612.jpg', '26ba50c347e65bba50e01995ee1997ce.jpg', '60e2894807e6b07ccae378c5a266f8c6.jpg', '11', 1, 'Percentage'),
(58, 'Snaker Soes', 1, 'Good Products & Comfertable			', 'Blue', '3000', '98347d', 0, '2021-01-07', 'cas3.png', 'e46c4dd95cb1a65797c7d562f8f44493.jpg', 'f9d80b381a3d5bab0589568fe41dc02f.jpg', '16fb7a8fbf7c59d14a10be9fed958519.jpg', '5', 1, 'Rupee'),
(59, 'Casual Shoes', 1, 'Best Caual Vereity & Branded Products', 'White', '1500', 'kjhdkj9e', 0, '2021-01-07', '125a66aba3255c973e13675b71d96fbc.jpg', '141526a7645b33c9b4c56b49f926a23e.jpg', 'ccf9fdcd822266acc4e96473482b195d.png', '010683ac3e38044fe86c7d95bd043ffc.jpg', '', 0, ''),
(60, 'Footwear', 1, 'Good Products', 'White', '740', 'SSSU', 0, '2021-01-28', '5e9af59d929c0e2d4f2941176e502b29.jpg', '5a1ad6d2f48ea5232e20f0d6bd448a92.jpg', 'f8bb3e94d4b32cee2e6b8b5a4d04917d.jpg', 'fee22b89353091cf9e759f26c1d247ce.jpg', '5', 0, ''),
(61, 'Casual Shoes', 1, 'Good Products', 'White', '1200', '544490', 0, '2021-01-28', '207e328a8f5a3385363bc9179cbd68b4.jpg', '3ac70899435af6d6b3cfac0ab0a9bcaf.jpg', 'a9a2cd056ec7f694171ec96f70da7247.jpg', 'b8189e1d87d65074e06c2dd3fb0123b5.jpg', '5', 0, 'Rupee'),
(62, 'OPPO A5 2020 (Dazzling White, 3GB RAM, 64GB Storage)', 7, '12+8+2+2MP rear camera with 119 degree ultra wide, ultra night mode, video EIS anti-shake, portrait | 8MP AI front camera\r\n16.5 centimeters (6.5-inch) with 1600 x 720 pixels resolution and waterdrop screen | Corning Gorilla 3+ screen, sunlight screen, nig', 'Blue', '10000', 'nkjdhk93lh2', 0, '2021-01-29', '86465bc1d6f27dccfd5a7cfb90d152e4.jpg', 'f673c9b18f5b93f2ba54979426f035ed.jpg', '512f1a0a87ceb3c8768ea9b95c19cb51.jpeg', 'a74bbb9988929cef72eb7caa585b8520.png', '1', 1, ''),
(63, 'Ladies Sandels', 2, 'Good Products', 'grey', '1200', 'JHKJD89LI', 0, '2021-01-29', 'ad0127df384f08fa0a72b5d2e1d0d118.jpg', '7ffd9bb93dc714df40e4ac038a6a198d.jpg', 'b9634a038e0793afe8fae60b4812deaf.jpg', '7cbec151b49a0679b64591708ca31e63.jpg', '1', 3, ''),
(64, 'Ladies shoes', 2, 'Good Products', 'pink', '750', 'HKJDHK67363', 0, '2021-01-29', 'a953ff5dcaede14ce56be32a12cb19a0.jpg', 'b5b9edc3fd0b3678547e3280f9840dfb.jpeg', '7e3a1cc6a5d45455ea5285bd034e43e7.jpg', '77110e110f5ea88fb4268cd5a9e461ea.jpg', '1', 3, ''),
(65, 'Realme', 1, 'Good Products', 'Blue', '10000', 'JHJSGJH7653', 0, '2021-01-29', '0132cfddc46d0f7f28a957f11b857c1e.jpg', '763d8e2ddeb7664202b8d25c9f1d5a3d.jpg', '697053f3895f1012e4deab7de5ee4b66.png', 'fa4ddcefdfe29925d6247f0562c3af45.jpg', '1', 3, 'Percentage'),
(66, 'Fansi Sandels', 1, 'Good Products', 'Grey', '750', 'jhgdjh673', 0, '2021-01-29', '0267bbbcd0384e58924be9d4398ea715.jpg', '5b4d5436c840c2ce909a11277b18ad85.jpg', 'bdbfca3a96596b4c46ac4bffef1b5339.jpg', '0da20c7780bcd82d75d2370979d2ae7a.jpg', '5', 4, ''),
(67, 'Ladeis Fansi Shoes', 1, 'Good Products', 'Pink', '1200', 'JHJSGJghfyt76', 0, '2021-01-29', '2a74cccede01a275403fddbff6bdec15.jpg', '8bf5c3eb7673ec2ce336896db24f8cfa.jpeg', 'c53d47fbb00a8f6322a7115a2f9ca32d.jpg', '3826b0ea98062410afbd884b6675f1b4.jpg', '4', 4, ''),
(68, 'Realme Phones', 7, 'Good Products', 'Blue', '12000', 'GHDG56332D', 0, '2021-01-29', '92cd0171c00f99adcaa0a593909d9dab.jpg', '5d9b7071983c9b7978e1c1cde393ea56.jpg', '339a085fd1a355d3202f5e3f420eebfa.png', '7ef4db550cf0c04ce597eb0b9226e166.jpg', '5', 4, 'Rupee'),
(69, 'Ladies Fansi Shoes', 1, 'Good Products', 'Pink', '780', 'HJHJDG673', 0, '2021-01-29', '51a0679c0b52997c7689a4d1541744e5.jpg', 'b7f3c17a582e307a7c6351ea40f740b4.jpeg', '12389f2c72f0c42958d1758dddd502d6.jpg', '9c2713b769a6a196d2781be526965786.jpg', '1', 5, ''),
(70, 'Ladies Sandels', 2, 'Good Products', 'Grey', '450', 'jhdgjht67', 0, '2021-01-29', 'd0558cd995be084a6b210867dd9e06e2.jpg', 'ec4d8be47adbbc35106ca7c22dfdec25.jpg', '9d2e8ed6d3171d4de0f35850fb576f8b.jpg', 'f010a4a5f750d078f06e5570e93d0f16.jpg', '1', 5, 'Rupee'),
(71, 'Ladies Fansi Sandels', 1, 'Good Products', 'Pink', '780', 'kjdshkj87768', 0, '2021-01-29', '02555d30538919bf4827898ae1277360.jpg', '26a455ba9aa425adbc2538bd29c1176c.jpg', '01c4fb09f55184ae788dbb33bde42665.jpg', 'd73f22af5a12423af86297c3109cb3a4.jpg', '1', 6, 'Percentage'),
(72, 'Ladies Shoes Fansi', 1, 'Good Products', 'Pink', '540', 'JHJSGJgthvsht73', 0, '2021-01-29', 'a8e836a52431635493724123867438b8.jpg', 'fbe059b0bf566a216e389a9639e32aa9.jpeg', '9448890ccacdde2074877ff3653f6586.jpg', '397635cd0ddc7e6d71b2200f7bd56201.jpg', '2', 6, ''),
(73, 'Ladies Shoes', 2, 'Good Products', 'Grey', '12000', 'DHGFSH7572', 0, '2021-01-30', '13e55fbe35219a9dabc05c356c8e2ed4.jpg', '9cdc172c6b97f8b80b783c9cc72921fe.jpg', 'b127295a60c278dcb8629805a7c9f771.jpg', 'b5d6c0d9a29d792f247d2fa4e9090c1d.jpg', '4', 7, ''),
(74, 'Snakers Shoes', 1, 'Good Products', 'Blue', '1200', 'GHHFF53765', 0, '2021-01-30', '78660b0d3d7bc15e6de406f96ead74bf.jpg', '161acc477d676d6d10e57c435bad3dd5.jpg', '11a07c16f615fd3cd694edd0c7fcc611.jpg', '752e2b441dc485b5d04d627c4801c48a.jpg', '2', 7, 'Rupee'),
(75, 'Top', 2, 'Good Products', 'Pink', '850', 'djsgjh6487', 0, '2021-01-30', '128fb6a6b0ccb35f90ac420113520e6a.jpg', 'baba4f32ed4f57fa0acc170e415a4e56.jpg', '86640e96cb61d111b5e78ef411b78425.jpg', 'fac227516bf1ee2b09cd707fd10ae69a.jpg', '3', 8, ''),
(76, 'Snaker Shoes', 1, 'Good Prducts', 'Black', '1200', 'hfkdjh764', 0, '2021-01-30', 'd1c2d087b5c2cedc2046381264bcea59.jpg', 'ebc8117b8228727c1d15d19a93c75cb8.jpg', '7d91913b9aa478756cd520f935b57384.jpg', '67a948324b66aade3d35b605874fbf18.jpg', '3', 8, ''),
(77, 'Snakers Shoes', 1, 'Good Products', 'Black', '1200', 'HGHDG56563D', 0, '2021-01-31', 'c1b5d399005aee11806875a93650d1db.jpg', '85f5e5613e01b3aaf875035d013b6503.jpg', 'a5eeba6bace0a11ea7217f9c298b150d.jpg', 'd7d85dbbc5525899a205f5eae7565383.jpg', '1', 9, 'Rupee'),
(78, 'Sports Shoes', 1, 'Good Products', 'White', '2700', 'ghffshg6675nmdb3', 0, '2021-01-31', '0ec038e3a88dbe919d4e4339e0aa5375.jpg', '6df681ae1568657de8c61425e0f0af30.jpg', '36700db1a638552440a3bcd2281fc8bd.jpg', '1d0e053b13330ad367ce25af5c5c6e85.jpg', '1', 9, ''),
(79, 'Testing', 4, 'testing', 'green', '1234', 'dsds233', 0, '2021-04-14', '580ebcea12c26729e7040ea9b865e92b.jpg', '8a2801aecc3540f31a173b2f47c8724c.jpg', '1b55a3e8c6bb7fac8bba973195672ddf.png', '3a771eb7c7fedb64d8d13746cccbc34a.jpg', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_replay_message`
--

CREATE TABLE `ms_replay_message` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `replay_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_replay_message`
--

INSERT INTO `ms_replay_message` (`id`, `user_id`, `replay_message`) VALUES
(1, 1, 'Hello how can help you'),
(2, 2, 'okk I will response comming soon ! '),
(3, 2, 'hey'),
(4, 2, 'hey'),
(5, 2, 'wait some time'),
(6, 2, 'okk wait some time'),
(7, 2, 'okk how to help you'),
(8, 2, 'Okk I will response comming soon');

-- --------------------------------------------------------

--
-- Table structure for table `ms_seller`
--

CREATE TABLE `ms_seller` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `seller_uid` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `panno` varchar(100) NOT NULL,
  `gstno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aadhar_number` varchar(255) NOT NULL,
  `seller_profile` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_seller`
--

INSERT INTO `ms_seller` (`id`, `company_name`, `email`, `seller_uid`, `mobile_number`, `pincode`, `state`, `city`, `panno`, `gstno`, `password`, `aadhar_number`, `seller_profile`, `status`, `created_date`) VALUES
(1, 'Footwear Shop', 'rayees@gmail.com', '564650607', 9554540271, '226026', 'Uttar Pradesh', 'Lucknow', '123FEG97HO', '12345678FDGHKJ2', 'fcea920f7412b5da7be0cf42b8c93759', '213456789021', '1d7f47ba6641169ed8e08553a968f26e.jpg', 'Active', '2021-01-06 06:30:43'),
(5, 'KHAN ', 'seller@gmail.com', '673597024', 8976543298, '226026', 'Uttar Pradesh', 'Lucknow', 'GHDBJH8998', 'JDSHJGJDSDDD212', 'e10adc3949ba59abbe56e057f20f883e', '676565233434', '', 'Active', '2021-01-29 07:42:10'),
(6, 'levis', 'levis@gmail.com', '731502132', 8976543298, '271205', 'Uttar Pradesh', 'Tulsipur', 'GHDBJH8998', 'JDSHJGJDSDDD212', 'e10adc3949ba59abbe56e057f20f883e', '676565233434', '', 'Active', '2021-01-29 08:48:21'),
(7, 'krishna', 'khrs@gmail.com', '729087648', 8976543298, '226026', 'Uttar Pradesh', 'Lucknow', '6787DJBJHK', 'HKJDHKJHDKJ2345', 'e10adc3949ba59abbe56e057f20f883e', '785654464324', '', 'Active', '2021-01-30 06:49:28'),
(8, 'krtes', 'krtes@gmail.com', '673017265', 8765438965, '226026', 'Uttar Pradesh', 'Lucknow', '6787DJBJHK', 'HKJDHKJHDKJ2345', 'fcea920f7412b5da7be0cf42b8c93759', '785654464324', '', 'Active', '2021-01-30 08:13:48'),
(9, 'Fashion', 'krayees282@gmail.com', '731643548', 9867543289, '226026', 'Uttar Pradesh', 'Lucknow', 'GHJKKJJKJK', 'JHGHSDG67837856', 'e10adc3949ba59abbe56e057f20f883e', '566523332232', '', 'Active', '2021-01-31 05:35:17'),
(10, 'deepak', 'divyrai222@gmail.com', '597029784', 897654328, '226022', 'Uttar Pradesh', 'Lucknow', 'GDH8398798', 'BCHJGEHY4788739', 'e10adc3949ba59abbe56e057f20f883e', '567356737376', '', 'Active', '2021-04-10 07:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `ms_sold_products`
--

CREATE TABLE `ms_sold_products` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_sold_products`
--

INSERT INTO `ms_sold_products` (`id`, `product_id`) VALUES
(1, 4),
(2, 8),
(3, 14),
(4, 4),
(5, 8),
(6, 14),
(7, 4),
(8, 8),
(9, 14),
(10, 4),
(11, 8),
(12, 14),
(13, 20),
(14, 21),
(15, 22),
(16, 24),
(17, 22),
(18, 24),
(19, 22),
(20, 24),
(21, 22),
(22, 24),
(23, 22),
(24, 24),
(25, 21),
(26, 21),
(27, 22),
(28, 24),
(29, 21),
(30, 21),
(31, 21),
(32, 22),
(33, 24),
(34, 22),
(35, 24),
(36, 16),
(37, 17),
(38, 18),
(39, 9),
(40, 17),
(41, 9),
(42, 9),
(43, 8),
(44, 9),
(45, 8),
(46, 27),
(47, 26),
(48, 8),
(49, 7),
(50, 8),
(51, 7),
(52, 15),
(53, 21),
(54, 8),
(55, 9),
(56, 10),
(57, 9),
(58, 8),
(59, 9),
(60, 8),
(61, 9),
(62, 8),
(63, 10),
(64, 19),
(65, 21),
(66, 22),
(67, 37),
(68, 38),
(69, 39),
(70, 58),
(71, 39),
(72, 28),
(73, 58),
(74, 57),
(75, 28),
(76, 58),
(77, 57),
(78, 28),
(79, 58),
(80, 57),
(81, 28),
(82, 58),
(83, 57),
(84, 61),
(85, 60),
(86, 61),
(87, 60),
(88, 61),
(89, 60),
(90, 18),
(91, 15),
(92, 18),
(93, 15),
(94, 61),
(95, 60),
(96, 61),
(97, 60),
(98, 68),
(99, 67),
(100, 66),
(101, 57),
(102, 68),
(103, 67),
(104, 66),
(105, 57),
(106, 68),
(107, 67),
(108, 66),
(109, 57),
(110, 68),
(111, 67),
(112, 66),
(113, 57),
(114, 62),
(115, 64),
(116, 63),
(117, 65),
(118, 68),
(119, 23),
(120, 26),
(121, 69),
(122, 66),
(123, 6),
(124, 4),
(125, 72),
(126, 71),
(127, 39),
(128, 73),
(129, 70),
(130, 74),
(131, 74),
(132, 72),
(133, 76),
(134, 75),
(135, 73),
(136, 27),
(137, 57),
(138, 76),
(139, 75),
(140, 73),
(141, 27),
(142, 57),
(143, 76),
(144, 75),
(145, 73),
(146, 27),
(147, 57),
(148, 78),
(149, 77),
(150, 27),
(151, 3),
(152, 2),
(153, 5),
(154, 12),
(155, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_temp_address`
--

CREATE TABLE `ms_temp_address` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street_house_no` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `area_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_temp_address`
--

INSERT INTO `ms_temp_address` (`id`, `user_id`, `address`, `first_name`, `last_name`, `mobile`, `email`, `street_house_no`, `zip_code`, `state`, `city`, `country`, `area_code`) VALUES
(111, 2, 'lucknw', 'csddsd', 'dsdsd', 9087654389, 'rayeesinfotech@gmail.com', 'hj', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264');

-- --------------------------------------------------------

--
-- Table structure for table `ms_users`
--

CREATE TABLE `ms_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` decimal(10,0) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`id`, `fullname`, `email`, `mobile_no`, `password`, `address`, `register_date`) VALUES
(2, 'Rayees khan', 'krayees282@gmail.com', '8765432222', 'e10adc3949ba59abbe56e057f20f883e', '22/78\r\nLucknow', '2021-01-28'),
(3, 'csddsd dsdsd', 'rayeesinfotech@gmail.com', '9087654389', 'e10adc3949ba59abbe56e057f20f883e', 'hj\r\nlucknw', '2021-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `online_order_payment`
--

CREATE TABLE `online_order_payment` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchant_order_id` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `total_quantity` bigint(20) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street_house_no` varchar(50) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `area_code` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_date` date DEFAULT NULL,
  `coupan_id` int(11) NOT NULL,
  `final_price` varchar(100) NOT NULL,
  `coupan_value` varchar(100) NOT NULL,
  `coupan_mstercode` varchar(100) NOT NULL,
  `ship_order_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_order_payment`
--

INSERT INTO `online_order_payment` (`id`, `order_id`, `user_id`, `merchant_order_id`, `payment_id`, `payment_status`, `payment_mode`, `total_amount`, `total_quantity`, `shipping_address`, `first_name`, `last_name`, `mobile`, `email`, `street_house_no`, `zip_code`, `state`, `city`, `country`, `area_code`, `order_status`, `order_date`, `coupan_id`, `final_price`, `coupan_value`, `coupan_mstercode`, `ship_order_id`, `shipment_id`) VALUES
(1, '23337', 2, '', 'pay_GV2GytzMsiSLcb', 'Success', 'Prepaid', '3101', 2, 'Lucknow', 'Aarif', 'khan', 7865434342, 'krayees282@gmail.com', '5625/8902', '271205', 'Uttar Pradesh', 'Tulsipur', 'India', '052', 'Pending', '2021-01-29', 0, '3101', '0', 'Not applied', 0, 0),
(2, '75301', 2, '', 'pay_GV2JWt44R8lK6a', 'Success', 'Prepaid', '3048', 2, 'Lucknow', 'Aarif', 'khan', 7865434376, 'krayees282@gmail.com', '5625/8902', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '052', 'Pending', '2021-01-29', 0, '3048', '0', 'Not applied', 0, 0),
(3, '49318', 2, '', 'pay_GV35eqcShxSTPy', 'Success', 'Prepaid', '3101', 2, 'Lucknow', 'Salman', 'khan', 8976543298, 'krayees282@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Pending', '2021-01-29', 7, '186100', '1240', 'Testig50', 0, 0),
(4, '56043', 2, '', 'pay_GV3DXuHuyM4zAg', 'Success', 'Prepaid', '3751', 3, 'Lucknow', 'Salman', 'khan', 9876986565, 'krayees282@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Pending', '2021-01-29', 7, '225100', '1500', 'Testig50', 0, 0),
(5, '48859', 2, '', 'pay_GV3sKskY9jH2wv', 'Success', 'Prepaid', '5700', 2, 'Lucknow', 'Zaheer', 'khan', 8765439856, 'krayees282@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Pending', '2021-01-29', 7, '3420', '2280', 'Testig50', 0, 0),
(6, '66073', 2, '', 'pay_GVDPB3nJ8E7hGO', 'Success', 'Prepaid', '5060', 6, 'Lucknow', 'Rayees ', 'khan', 7856437854, 'khan@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Shipped', '2021-01-29', 11, '2530', '2530', 'First50', 0, 0),
(7, '50854', 2, '', 'pay_GVEEeSzTCZZdNI', 'Success', 'Prepaid', '73386', 16, 'Lucknow', 'Rayees ', 'khan', 9867543254, 'krayees282@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Delivered', '2021-01-29', 13, '36693', '36693', 'Special50', 86036514, 85658074),
(8, '47183', 2, '', 'pay_GVFNroMsutF7pM', 'Success', 'Prepaid', '4196', 4, 'Lucknow', 'Rayees', 'khan', 7887877887, 'krayees282@gmail.com', 'kh9/9', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Delivered', '2021-01-29', 14, '2098', '2098', 'Firstorder50', 86040106, 85661666),
(9, '78394', 2, '', 'pay_GVbwte46Yi0W4i', 'Success', 'Prepaid', '2940', 3, 'Lucknow', 'Javed', 'khan', 8765438965, 'rayeesinfotech@gmail.com', 'Lucknow', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05262', 'Delivered', '2021-01-30', 14, '1470', '1470', 'Firstorder50', 86255901, 85877335),
(10, '93826', 2, '', 'pay_GVdLbmhh4cYXo6', 'Success', 'Prepaid', '30950', 7, 'Lucknow ', 'Javed', 'khan', 8765438965, 'khan@gmail.com', 'Lucknow', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05262', 'Delivered', '2021-01-30', 16, '12380', '18570', 'First60', 86262315, 85883748),
(11, '63399', 2, '', 'pay_GVz9YOurIHd0Ra', 'Success', 'Prepaid', '7750', 5, 'Lucknow', 'Khan', 'Rayees', 8765342214, 'krayees282@gmail.com', '67/90', '226026', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Delivered', '2021-01-31', 17, '5425', '2325', 'First30', 86396563, 86017846),
(12, '85729', 2, '', 'pay_Gx66O3JZFUn8ro', 'Success', 'Prepaid', '2450', 2, 'Lucknow', 'deepak', 'kumar', 8976543289, 'divyrai222@gmail.com', '22/90', '226022', 'Uttar Pradesh', 'Lucknow', 'India', '05264', 'Pending', '2021-04-10', 15, '1470', '980', 'First40', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `rating_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`rating_id`, `id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(1, 2, 1, 5, '2020-12-28 16:53:53', '2020-12-28 16:53:53', 1),
(2, 39, 1, 5, '2021-01-31 15:29:48', '2021-01-31 15:29:48', 1),
(3, 39, 1, 3, '2021-01-31 15:29:54', '2021-01-31 15:29:54', 1),
(4, 39, 1, 5, '2021-01-31 15:29:57', '2021-01-31 15:29:57', 1),
(5, 25, 1, 5, '2021-01-31 15:33:37', '2021-01-31 15:33:37', 1),
(6, 44, 1, 5, '2021-01-31 15:34:34', '2021-01-31 15:34:34', 1),
(7, 49, 1, 5, '2021-01-31 17:56:26', '2021-01-31 17:56:26', 1),
(8, 56, 1, 5, '2021-04-05 08:14:14', '2021-04-05 08:14:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shiprocket_token`
--

CREATE TABLE `shiprocket_token` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiprocket_token`
--

INSERT INTO `shiprocket_token` (`id`, `token`, `added_on`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExMDEzOTAsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjE3NjAzMTUxLCJleHAiOjE2MTg0NjcxNTEsIm5iZiI6MTYxNzYwMzE1MSwianRpIjoiaUpXc2NpY2hvb2w3NWRyciJ9.TXoS3pKsi76cxizrULg5SYBFvFEgiQJ5CVgVhFKYGxQ', '2021-04-05 02:41:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupan_master`
--
ALTER TABLE `coupan_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_slider`
--
ALTER TABLE `image_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_admin`
--
ALTER TABLE `ms_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_cancel_ord_resion`
--
ALTER TABLE `ms_cancel_ord_resion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_carts`
--
ALTER TABLE `ms_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_categories`
--
ALTER TABLE `ms_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_contact_us`
--
ALTER TABLE `ms_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_feedback`
--
ALTER TABLE `ms_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_orders`
--
ALTER TABLE `ms_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `ms_order_products`
--
ALTER TABLE `ms_order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_products`
--
ALTER TABLE `ms_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_replay_message`
--
ALTER TABLE `ms_replay_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_seller`
--
ALTER TABLE `ms_seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seller_uid` (`seller_uid`);

--
-- Indexes for table `ms_sold_products`
--
ALTER TABLE `ms_sold_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_temp_address`
--
ALTER TABLE `ms_temp_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_order_payment`
--
ALTER TABLE `online_order_payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupan_master`
--
ALTER TABLE `coupan_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `image_slider`
--
ALTER TABLE `image_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ms_admin`
--
ALTER TABLE `ms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_cancel_ord_resion`
--
ALTER TABLE `ms_cancel_ord_resion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_carts`
--
ALTER TABLE `ms_carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ms_categories`
--
ALTER TABLE `ms_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ms_contact_us`
--
ALTER TABLE `ms_contact_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_feedback`
--
ALTER TABLE `ms_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ms_orders`
--
ALTER TABLE `ms_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_order_products`
--
ALTER TABLE `ms_order_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `ms_products`
--
ALTER TABLE `ms_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `ms_replay_message`
--
ALTER TABLE `ms_replay_message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ms_seller`
--
ALTER TABLE `ms_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ms_sold_products`
--
ALTER TABLE `ms_sold_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `ms_temp_address`
--
ALTER TABLE `ms_temp_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `ms_users`
--
ALTER TABLE `ms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `online_order_payment`
--
ALTER TABLE `online_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
