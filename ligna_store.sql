-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ligna_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','processing','shipped','delivered','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`) VALUES
(1, 2, 22000.00, 'pending', '2025-02-03 10:45:23'),
(2, 2, 22000.00, 'pending', '2025-02-03 10:55:42'),
(3, 2, 30000.00, 'pending', '2025-02-03 11:21:14'),
(4, 2, 30000.00, 'pending', '2025-02-03 12:25:04'),
(5, 2, 60000.00, 'pending', '2025-02-03 12:41:20'),
(6, 2, 30000.00, 'pending', '2025-02-03 12:55:39'),
(7, 2, 12000.00, 'pending', '2025-02-03 13:07:40'),
(8, 4, 12000.00, 'pending', '2025-02-03 13:18:52'),
(9, 8, 10000.00, 'pending', '2025-02-03 14:41:58'),
(10, 8, 30000.00, 'pending', '2025-02-03 14:42:25'),
(11, 8, 8000.00, 'pending', '2025-02-03 14:44:03'),
(12, 8, 8000.00, 'pending', '2025-02-03 14:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 10000.00),
(2, 1, 2, 1, 12000.00),
(4, 2, 1, 1, 10000.00),
(5, 2, 2, 1, 12000.00),
(7, 3, 1, 1, 10000.00),
(8, 3, 2, 1, 12000.00),
(9, 3, 3, 1, 8000.00),
(10, 4, 1, 1, 10000.00),
(11, 4, 2, 1, 12000.00),
(12, 4, 3, 1, 8000.00),
(13, 5, 2, 1, 12000.00),
(14, 5, 1, 1, 10000.00),
(15, 5, 2, 1, 12000.00),
(16, 5, 3, 1, 8000.00),
(17, 5, 3, 1, 8000.00),
(18, 5, 1, 1, 10000.00),
(20, 6, 1, 1, 10000.00),
(21, 6, 2, 1, 12000.00),
(22, 6, 3, 1, 8000.00),
(23, 7, 2, 1, 12000.00),
(24, 8, 2, 1, 12000.00),
(25, 9, 1, 1, 10000.00),
(26, 10, 1, 1, 10000.00),
(27, 10, 2, 1, 12000.00),
(28, 10, 3, 1, 8000.00),
(29, 11, 3, 1, 8000.00),
(30, 12, 3, 1, 8000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT 'card',
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock_quantity`, `image_url`, `created_at`) VALUES
(1, 'Bedside Cupboard', 'A stylish and durable wooden bedside cupboard with two spacious drawers for convenient storage.', 10000.00, 20, '/Ligna/adminpannel/Prod/bedsidecupboards.jpg', '2025-02-02 20:17:20'),
(2, 'TV Stands', 'A sleek and modern wooden TV stand with multiple compartments for organizing media devices, books, and decor.', 12000.00, 20, '/Ligna/adminpannel/Prod/tvstands.jpg', '2025-02-02 20:18:51'),
(3, 'Display Stand', 'A contemporary wooden display stand with three open shelves, ideal for showcasing decorative items, books, or lamps.', 8000.00, 20, '/Ligna/adminpannel/Prod/displaystands.jpg', '2025-02-02 20:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'kumu', 'kumu@gmail.com', '$2y$10$o.JH56iku64v3eObPKVNmOWiMC.U0OD3Xzin38AmP184Kv.zMERsa', 'admin', '2025-01-29 17:49:18'),
(2, 'tiran', 'tiran@gmail.com', '$2y$10$ZxO9gdIDNTfNGSAr1Rnv3.RYvFXzI1xfMeEuK1UnHQyG6oXLpiJQW', 'customer', '2025-01-29 17:54:36'),
(3, 'tiran', 'tira@gmail.com', '$2y$10$xC/T4Tso3Z5f4tszVwcx2OfTp6RX/ZRdmVFdcNK0K7eyWonQXF7fy', 'customer', '2025-01-29 17:56:22'),
(4, 'avi', 'avi@gmail.com', '$2y$10$/iFgyjgp.eV5wUKUYCsB4eMvVUPZSThxVnkOs9GyW7sMabM47Rk9.', 'customer', '2025-01-30 06:09:45'),
(6, 'sudara', 'sudara@gmail.com', '$2y$10$sNipgLFSjQpLAx2QqBoQu.wTR9x3RSCwQoVQlrb4hlyTCBMQrgrpW', 'customer', '2025-02-03 13:22:43'),
(8, 'tira1', 'tira1@gmail.com', '$2y$10$axwNEKMZ8J0/M4bb1oVmgO0ybUsVB5RrgFTDXi84KHfx8hIFydgmO', 'customer', '2025-02-03 14:41:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
