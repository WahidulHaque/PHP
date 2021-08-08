-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 06:38 AM
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
(1, 'Hero Hunk 150cc', 'hero-hunk-150cc', 'Hero Hunk 150cc Motor Bike (Single Disc)', 'ENGINE\r\nType: Air Cooled, 4 - stroke single cylinder OHC\r\nDisplacement: 149.2 cc\r\nMax. Power: 14.4 PS @ 8500 rpm\r\nMax. Torque: 12.8 Nm @ 6500 rpm\r\nMax. Speed: 107 Kmph\r\nBore x Stroke: 57.3 x 57.8 mm\r\nCarburettor: CV Type with Carburettor Controlled Variable Ignition\r\nCompression Ratio0: 9.1:1\r\nStarting: Self Start/ Kick start\r\nIgnition: AMI - Advanced Microprocessor Ignition System\r\nOil Grade: SAE 10 W 30 SJ Grade\r\nAir Filtration: Wire mesh & centrifugal filter\r\nFuel System: Carburetor\r\nFuel Metering: Carburetion\r\n\r\nTRANSMISSION & CHASSIS\r\nClutch: Multiplate wet\r\nGear box: 5 Speed constant mesh\r\nChassis Type: Tubular, Diamond type\r\n\r\nSUSPENSION\r\nFront: Telescopic Hydraulic Shock Absorbers\r\nRear: Swing Arm with Nitrox GRS (Gas Reservoir Suspension)\r\n\r\nBRAKES\r\nFront Brake: Disc Dia 240 mm\r\nRear Brake: Disc Dia 220 mm (Optional)\r\nRear Brake: Drum 130 mm Internal expanding shoe type\r\n\r\nWHEELS & TYRES\r\nTyre Size Front: 80/100 x 18-47 P Tubeless tyres\r\nTyre Size Rear: 100 / 90 X 18 -56 P, Tubeless tyres\r\n\r\nELECTRICALS\r\nBattery: 12 V - 4 Ah, MF battery\r\nHead Lamp: 12 V - 35 W / 35W - Halogen bulb Trapeziodal MFR\r\nTail/Stop Lamp: 12 V - 0.5 W / 4.1W (LED lamps)\r\nTurn Signal Lamp: 12 V - 10 W (Amber bulb) x 4 nos. (Multi - reflector clear lens)\r\nPilot Lamp: 12 V - 3W\r\n\r\nDIMENSIONS\r\nLength: 2080 mm\r\nWidth: 765 mm\r\nHeight: 1095 mm\r\nSaddle Height: 795 mm\r\nWheelbase: 1325 mm\r\nGround Clearance: 163 mm\r\nFuel Tank Capacity: 12.4 litre (min)\r\nReserve: 2.2 Ltrs (Usable reserve)\r\nKerb Weight: 145 kg\r\nMax Payload: 130 Kg\r\n', 50, 221592, 121592, 'HERO-0X6A25A', 1, 'hero honda hunk 150cc', 1, 1, 4, '1628120474.png'),
(2, 'Floral Printed Shirt', 'floral-printed-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras semper auctor neque vitae tempus. Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.\r\n\r\nMagna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 50, 450, 300, 'TS-147', 1, 't-shirt', 1, 1, 10, '776531947.jpg'),
(3, 'Floral Printed T-Shirt', 'floral-printed-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras semper auctor neque vitae tempus.', 'Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.\r\n\r\nMagna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 50, 400, 320, 'TS-148', 1, 'women, clothing', 0, 1, 10, '719962151.jpg'),
(4, 'Blue Shirt', 'blue-shirt', 'Nulla facilisi cras fermentum odio eu feugiat pretium. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Sollicitudin nibh sit amet commodo nulla facilisi. Sit amet nisl purus in mollis nunc. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Nisl rhoncus mattis rhoncus urna neque. Pellentesque diam volutpat commodo sed egestas egestas. Tincidunt lobortis feugiat vivamus at augue. Malesuada fames ac turpis egestas.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 40, 1900, 1100, 'TS-289', 1, 'men, clothing', 1, 1, 9, '2115612578.jpg'),
(5, 'Navy Blue Bag', 'navy-blue-bag', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 99, 2500, 2400, 'BG-1687', 1, 'bag, men', 0, 1, 9, '227699149.jpg'),
(6, 'Watch', 'watch', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 99, 7800, 6500, 'WT-887', 1, 'watch', 1, 1, 12, '2036409425.jpg'),
(7, 'Red Men\'s Shoe', 'red-mens-shoe', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 'Magna etiam tempor orci eu lobortis elementum nibh tellus. Nullam non nisi est sit amet. Proin sagittis nisl rhoncus mattis rhoncus. Maecenas pharetra convallis posuere morbi leo urna molestie at elementum. Netus et malesuada fames ac. Massa sed elementum tempus egestas sed sed risus. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Donec ultrices tincidunt arcu non sodales neque sodales. Pharetra vel turpis nunc eget.', 90, 2200, 1700, 'MS-16887', 1, 'shoe, men', 0, 1, 9, '401105902.jpg');

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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM For Super Admin, USR For users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `user_type`) VALUES
(6, 'Wahid', 'neon@gmail.com', '12@#$345', NULL, NULL, NULL, 'ADM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
