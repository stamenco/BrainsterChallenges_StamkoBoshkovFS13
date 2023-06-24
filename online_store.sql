-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 01:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `address` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confectionery`
--

CREATE TABLE `confectionery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cosmetics`
--

CREATE TABLE `cosmetics` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `alcoholic` tinyint(1) DEFAULT NULL,
  `carbonated` tinyint(1) DEFAULT NULL,
  `alc_lvl` decimal(3,1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `household_items`
--

CREATE TABLE `household_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `cleaning_agent` tinyint(1) DEFAULT NULL,
  `kitchen_utensil` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milk_and_dairy`
--

CREATE TABLE `milk_and_dairy` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modify_add_delete`
--

CREATE TABLE `modify_add_delete` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_approved_time` datetime DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `delivered` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_completed`
--

CREATE TABLE `orders_completed` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_rating` tinyint(4) DEFAULT NULL,
  `supplier_comment` varchar(512) DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED DEFAULT NULL,
  `buyer_rating` tinyint(4) DEFAULT NULL,
  `buyer_comment` varchar(512) DEFAULT NULL,
  `time_of_arrival` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `date_of_manifacture` date DEFAULT NULL,
  `shelf_life` int(10) UNSIGNED DEFAULT NULL,
  `composition` varchar(32) DEFAULT NULL,
  `storage_temp` smallint(6) DEFAULT NULL,
  `place_of_origin` varchar(32) DEFAULT NULL,
  `manufacturer` varchar(32) DEFAULT NULL,
  `importer` varchar(32) DEFAULT NULL,
  `product_type` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `suppliers_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tobacco`
--

CREATE TABLE `tobacco` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `cigarete_per_piece` tinyint(1) DEFAULT NULL,
  `box` tinyint(1) DEFAULT NULL,
  `dry_tobacco` tinyint(1) DEFAULT NULL,
  `nicotine` decimal(2,1) DEFAULT NULL,
  `tar` tinyint(4) DEFAULT NULL,
  `carbon_monoxide` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confectionery`
--
ALTER TABLE `confectionery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `household_items`
--
ALTER TABLE `household_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `milk_and_dairy`
--
ALTER TABLE `milk_and_dairy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `modify_add_delete`
--
ALTER TABLE `modify_add_delete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `orders_completed`
--
ALTER TABLE `orders_completed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type` (`product_type`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tobacco`
--
ALTER TABLE `tobacco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confectionery`
--
ALTER TABLE `confectionery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cosmetics`
--
ALTER TABLE `cosmetics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `household_items`
--
ALTER TABLE `household_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milk_and_dairy`
--
ALTER TABLE `milk_and_dairy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modify_add_delete`
--
ALTER TABLE `modify_add_delete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_completed`
--
ALTER TABLE `orders_completed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tobacco`
--
ALTER TABLE `tobacco`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confectionery`
--
ALTER TABLE `confectionery`
  ADD CONSTRAINT `confectionery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD CONSTRAINT `cosmetics_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `drinks_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `household_items`
--
ALTER TABLE `household_items`
  ADD CONSTRAINT `household_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `milk_and_dairy`
--
ALTER TABLE `milk_and_dairy`
  ADD CONSTRAINT `milk_and_dairy_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `modify_add_delete`
--
ALTER TABLE `modify_add_delete`
  ADD CONSTRAINT `modify_add_delete_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `modify_add_delete_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `orders_completed`
--
ALTER TABLE `orders_completed`
  ADD CONSTRAINT `orders_completed_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_completed_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `orders_completed_ibfk_3` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type`) REFERENCES `product_type` (`id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`),
  ADD CONSTRAINT `shopping_cart_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `tobacco`
--
ALTER TABLE `tobacco`
  ADD CONSTRAINT `tobacco_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
