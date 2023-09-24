-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 04:21 PM
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
-- Database: `challenge_16_php_pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_webs`
--

CREATE TABLE `company_webs` (
  `id` int(10) UNSIGNED NOT NULL,
  `cover_img` varchar(1024) NOT NULL,
  `main_title` varchar(512) NOT NULL,
  `subtitle` varchar(512) NOT NULL,
  `about_you` varchar(1024) NOT NULL,
  `phone` int(20) NOT NULL,
  `offer` varchar(16) NOT NULL,
  `location` varchar(512) NOT NULL,
  `img_url_1` varchar(1024) NOT NULL,
  `description_1` varchar(1024) NOT NULL,
  `img_url_2` varchar(1024) DEFAULT NULL,
  `description_2` varchar(1024) NOT NULL,
  `img_url_3` varchar(1024) NOT NULL,
  `description_3` varchar(1024) NOT NULL,
  `company_description` varchar(1024) NOT NULL,
  `linkedin` varchar(512) NOT NULL,
  `facebook` varchar(512) NOT NULL,
  `twitter` varchar(512) NOT NULL,
  `instagram` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_webs`
--

INSERT INTO `company_webs` (`id`, `cover_img`, `main_title`, `subtitle`, `about_you`, `phone`, `offer`, `location`, `img_url_1`, `description_1`, `img_url_2`, `description_2`, `img_url_3`, `description_3`, `company_description`, `linkedin`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'https://picsum.photos/id/237/200/300', 'Some Company', 'Some Subtitle', 'Something about me', 71330303, 'services', 'Valandovo', 'https://picsum.photos/id/11/2500/1667', 'Description 1', 'https://picsum.photos/id/15/300/300', 'Description 2', 'https://picsum.photos/id/34/300/300', 'Description 3', 'Description about the company', 'www.linkedin.com', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com'),
(2, 'https://picsum.photos/id/23/200/300', 'Some Company 2', 'Some Subtitle 2', 'Bla Bla', 71330303, 'products', 'Valandovo', 'https://picsum.photos/id/19/2500/1667', 'Product 1 about', 'https://picsum.photos/id/25/300/300', 'Product 2 about', 'https://picsum.photos/id/44/300/300', 'Product 3 about', 'bla bla bla bla bla bla', 'www.linkedin.com', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_webs`
--
ALTER TABLE `company_webs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_webs`
--
ALTER TABLE `company_webs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
