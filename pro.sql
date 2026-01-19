-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 12:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `product_name`, `price`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(13, 'Chair', 15000.00, 'Wooden Chair', 'uploads/p.jpg', '2023-11-15 17:10:43', '2023-11-15 17:10:43'),
(14, 'Chair', 150.00, 'wooden', 'uploads/p.jpg', '2023-11-15 17:11:06', '2023-11-15 17:11:06'),
(15, 'Chair', 150.00, 'wooden chair', 'uploads/p.jpg', '2023-11-15 17:11:27', '2023-11-15 17:11:27'),
(16, 'Chair', 150.00, 'wooden', 'uploads/p.jpg', '2023-11-15 17:11:46', '2023-11-15 17:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `phone`) VALUES
(1, 'sham', 'sham@gmail.com', '$2y$10$M8eWSfU1yivX68xBcz0oJelMWs17UOWttXdxMCRGUkQljQik5Uewu', 'shiroli', '9325025671'),
(2, 'sham', 'sham@gmail.com', '$2y$10$sNdq6iBvujwwHXVhK749VetOVqGv7MHTSCNExMzoejrXsPvrWK4H.', 'shiroli', '9325025671'),
(3, 'sham', 'sham@gmail.com', '$2y$10$9wOgA.GO6jVxRvh0acNJOO/CSBN2BsPZ9R3DoGQ2Mvq0Rd06zu4Rm', 'shiroli', '9325025671'),
(4, 'pushkar', 'pushkar@gmail.com', '$2y$10$OqFC6s0b0Im/EPuR7JBDjucVHq6YCk7Rln2NDeDc5LNc3lOUxdDme', 'taksande', '092347298');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
