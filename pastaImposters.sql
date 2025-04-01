-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2025 at 05:04 PM
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
-- Database: `pastaImposters`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'George', 'geroge@gmail.com', '$2y$10$9g4SJd2Q8Xq28c7zT2fvGe.YUt3bwILhLdDe6wlh8cLQVIWfDP3fe', '2025-03-18 16:26:32', '2025-03-18 16:26:32'),
(7, 'Scott', 'scott@dctc.edu', '$2y$10$zeWsq3OGr506JtdFJBIPEe7GZ.IyCHbeEUkQzLH317p1le3MvwTDi', '2025-03-25 16:25:11', '2025-03-25 16:25:11'),
(8, 'root', 'root@test.edu', '$2y$10$5/WNMy6SnQhKuongGaMxzOOqIvGVj01C.CgTtTvzaEvIEBjjKtCPO', '2025-03-25 16:26:47', '2025-03-25 16:26:47'),
(9, 'Elon Musk', 'musk@tesla.edu', '$2y$10$oDKSq8amw4mpiOZn7110Buk9tm3MfGy3NCJGKiPYN9hR63OzPdFPW', '2025-03-28 10:20:18', '2025-03-28 10:20:18'),
(10, 'Test ', 'cole@target.com', '$2y$10$e7wjZ886jIinjOmFqPbkL.TZHVSZrNjNi6h2/gztoOaA.AlLSEwWO', '2025-03-30 23:22:03', '2025-03-30 23:22:03'),
(11, 'root', 'root@gmail.com', '$2y$10$.UY8tnxKq0pO1ui3XnQ7yelJ/IYUFbMh.CL8UvhhZPPyTnb5.jPCW', '2025-03-31 22:43:05', '2025-03-31 22:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
