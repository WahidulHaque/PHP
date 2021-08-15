-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 12:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0 COMMENT '0 For Parent;',
  `featured` int(11) NOT NULL COMMENT '0 For Normal; 1 For Featured',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 For Inactive; 1 For Active',
  `cat_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_slug`, `cat_description`, `is_parent`, `featured`, `status`, `cat_image`, `created_at`) VALUES
(1, 'Smartphone', 'smartphone', NULL, 0, 0, 0, '1848236115.png', '2020-12-20 02:14:57'),
(2, 'Electronics', 'electronics', 'This is Electronics Category', 0, 0, 1, '1299145993.png', '2020-12-20 02:21:14'),
(3, 'Vehicles', 'vehicles', NULL, 0, 0, 0, NULL, '2020-12-20 02:21:39'),
(4, 'Bike', 'bike', NULL, 3, 0, 1, '691548353.jpg', '2020-12-20 02:39:41'),
(5, 'Apple', 'apple', NULL, 1, 1, 1, '1333504036.jpg', '2020-12-20 02:40:40'),
(6, 'Car', 'car', NULL, 3, 0, 0, '105517466.jpg', '2020-12-20 02:41:55'),
(7, 'Samsung', 'samsung', NULL, 1, 0, 1, '2130380291.png', '2020-12-20 02:42:15'),
(8, 'Clothing', 'clothing', NULL, 0, 1, 1, '1937923461.png', '2021-01-22 07:30:55'),
(9, 'Men\'s', 'mens', NULL, 8, 0, 1, NULL, '2021-01-22 07:31:22'),
(10, 'Women', 'women', NULL, 8, 0, 1, NULL, '2021-01-22 07:31:36'),
(11, 'Watch', 'watch', NULL, 0, 0, 1, NULL, '2021-01-22 07:35:44'),
(12, 'Men\'s Watch', 'mens-watch', NULL, 11, 1, 1, NULL, '2021-01-22 07:36:06'),
(13, 'Women\'s Watch', 'womens-watch', NULL, 11, 0, 1, NULL, '2021-01-22 07:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 for Festival, 1 for other',
  `purchase_type` int(11) NOT NULL DEFAULT 0 COMMENT '0 for one-time, 1 for multiple times',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 for active, 1 for inactive',
  `usageCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `startDate`, `endDate`, `type`, `purchase_type`, `status`, `usageCount`) VALUES
(1, 'EID3070', 10, '2021-06-16 00:00:00', '2021-06-21 00:00:00', '0', 0, 0, 1),
(2, 'EID3080', 50, '2021-06-17 00:00:00', '2021-06-24 00:00:00', '0', 0, 0, 1),
(3, 'EID11', 35, '2021-08-11 16:18:45', '2021-08-18 16:18:38', '0', 0, 0, 0),
(10, 'EIDVC', 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1 COMMENT '0for premium, 1 for gold, 2 for normal',
  `status` int(1) NOT NULL,
  `order_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `city`, `country`, `zipcode`, `image`, `user_type`, `status`, `order_count`) VALUES
(2, 'John', 'john78@gmail.com', '12345678', '01711223344', 'Dhaka', 'Dhaka', 'Bd', '1212', NULL, 1, 1, 5),
(3, 'Sammy', 'sammy78@gmail.com', '12345678', '01711223344', 'Dhaka', 'Dhaka', 'Bd', '1212', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `status`) VALUES
(1, 'Rajshahi', 2, 1),
(2, 'Natore', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `status`, `priority`) VALUES
(1, 'Dhaka', 1, 1),
(2, 'Rajshahi', 1, 2),
(3, 'Chittagong', 1, 3),
(4, 'Barisal', 1, 8),
(5, 'Khulna', 1, 6),
(6, 'Rangpur', 1, 7),
(7, 'Mymensingh', 1, 5),
(8, 'Sylhet', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log_detail`
--

CREATE TABLE `log_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` text DEFAULT NULL,
  `logout_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_detail`
--

INSERT INTO `log_detail` (`id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 6, '1628940862', NULL),
(2, 6, '1628995087', NULL),
(3, 6, '1629000718', NULL),
(4, 6, '1629000880', NULL),
(5, 6, '1629019257', NULL),
(6, 6, '1629019529', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_finalPrice` int(11) DEFAULT NULL,
  `priceWithCoupon` int(11) DEFAULT 0,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) DEFAULT NULL COMMENT '1 For Bkash, 2 For Rocket, 3 For COD',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `shipping_address`, `division_id`, `district_id`, `zip_code`, `code`, `additional_message`, `product_finalPrice`, `priceWithCoupon`, `is_paid`, `payment_id`, `transaction_id`, `created_at`, `status`) VALUES
(1, 2, 'Abraham', 'Linkon', 'linkon99@gmail.com', '01733112244', 'Dhaka', 1, 2, '1212', NULL, NULL, 2780, 0, 0, 1, 'asdawdawde3wq', '2021-08-14 18:16:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `slug`, `number`, `type`) VALUES
(1, 'Bkash', NULL, 0, 'bkash', '01765649100', '1'),
(2, 'Rocket', NULL, 1, 'rocket', '01765649100', '0'),
(4, 'Cash On Delivery', NULL, 1, 'cash on delivery', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `regular_price` int(11) NOT NULL DEFAULT 0,
  `offer_price` int(11) NOT NULL,
  `sku_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_item` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `s_desc`, `desc`, `quantity`, `regular_price`, `offer_price`, `sku_code`, `product_type`, `tags`, `featured_item`, `status`, `cat_id`, `image`) VALUES
(2, 'Floral Printed Shirt', 'floral-printed-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras semper auctor neque vitae tempus. Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.\r\n\r\nMagna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 50, 450, 300, 'TS-147', 1, 't-shirt', 1, 1, 10, '776531947.jpg'),
(3, 'Floral Printed T-Shirt', 'floral-printed-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras semper auctor neque vitae tempus.', 'Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.\r\n\r\nMagna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 50, 400, 320, 'TS-148', 1, 'women, clothing', 0, 1, 10, '719962151.jpg'),
(4, 'Blue Shirt', 'blue-shirt', 'Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 40, 1900, 1100, 'TS-289', 1, 'men, clothing', 1, 1, 9, '2115612578.jpg'),
(5, 'Navy Blue Bag', 'navy-blue-bag', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 99, 2500, 2400, 'BG-1687', 1, 'bag, men', 0, 1, 9, '227699149.jpg'),
(6, 'Watch', 'watch', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 99, 7800, 6500, 'WT-887', 1, 'watch', 1, 1, 12, '2036409425.jpg'),
(7, 'Red Men\'s Shoe', 'red-mens-shoe', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 90, 2200, 1700, 'MS-16887', 1, 'shoe, men', 0, 1, 9, '401105902.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `review` text NOT NULL,
  `submit_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `submit_time`, `status`) VALUES
(2, 2, 3, 'Nice', '2021-08-15 01:18:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM For Super Admin, USR For users',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `user_type`, `status`) VALUES
(6, 'Wahidul Haque', 'neon2000@gmail.com', '12@#$345', '01755223344', 'New Market, Rajshahi', '1629000287.png', 'ADM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_info`
--

CREATE TABLE `web_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_info`
--

INSERT INTO `web_info` (`id`, `title`, `contact_no`, `address`, `logo`, `favicon`, `image`, `status`) VALUES
(1, 'EOCM', '0122334455', 'DHAKA,1212', 'logo.png', NULL, 'kisspng-computer-icons-user-profile-avatar-female-profile-5ab915f791e2c1.8067312315220792235976.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cat_name_unique` (`cat_name`),
  ADD UNIQUE KEY `categories_cat_slug_unique` (`cat_slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_detail`
--
ALTER TABLE `log_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_info`
--
ALTER TABLE `web_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_detail`
--
ALTER TABLE `log_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `web_info`
--
ALTER TABLE `web_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
