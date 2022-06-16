-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 10:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_details`
--

CREATE TABLE `school_details` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `school_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `school_details`
--

INSERT INTO `school_details` (`id`, `name`, `location`, `school_created_at`) VALUES
(5, 'karthika', 'Ghatkopar', '2022-06-15 22:34:31'),
(6, 'Eden High School', 'Sion', '2022-06-15 22:34:43'),
(7, 'NES International School', 'CST', '2022-06-15 23:12:39'),
(8, 'Podar International School', 'sion', '2022-06-15 23:13:12'),
(9, 'Utpal Shanghvi Global School', 'Juhu', '2022-06-15 23:14:01'),
(10, 'DY PATIL SCHOOL', 'Bandra', '2022-06-16 18:46:36'),
(11, 'S.N.D.T School', 'Ghatkopar', '2022-06-16 18:47:32'),
(12, 'Fatima High School', 'Ghatkopar', '2022-06-16 18:48:10'),
(13, 'Aditya Birla Public School', 'VileParle', '2022-06-16 19:34:37'),
(14, 'SIWS HIGH SCHOOL', 'Wadala', '2022-06-16 19:35:02'),
(15, 'Army Public School', 'Pune', '2022-06-16 19:36:42'),
(16, 'Blossom Public School', 'Wakad', '2022-06-16 19:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_created_at`) VALUES
(1, 'amit', 'amitnahak@gmail.com', '$2y$10$3ZaZ3OQqByiJGu/z/YZil..wWetS/nIqNw5PEc0x2xNlh/ZZ0AIf2', '2022-06-16 20:20:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_details`
--
ALTER TABLE `school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_details`
--
ALTER TABLE `school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
