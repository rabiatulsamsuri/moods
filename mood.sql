-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2026 at 05:42 PM
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
-- Database: `mood`
--

-- --------------------------------------------------------

--
-- Table structure for table `focus_sessions`
--

CREATE TABLE `focus_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `category` enum('Deep Work','Study','Meeting') NOT NULL,
  `duration_minutes` int(20) NOT NULL,
  `session_date` date NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `focus_sessions`
--

INSERT INTO `focus_sessions` (`id`, `user_id`, `activity_name`, `category`, `duration_minutes`, `session_date`, `created`) VALUES
(1, 4, 'IMS566 CODING', 'Deep Work', 15, '2026-05-30', '2026-05-18 04:19:44'),
(2, 2, 'IMS565-INTERVIEW', 'Meeting', 45, '2026-05-14', '2026-05-18 04:24:05'),
(4, 4, 'IMS564', 'Study', 15, '2026-05-19', '2026-05-18 16:36:37'),
(5, 2, 'IMS564', 'Meeting', 25, '2026-05-27', '2026-05-19 00:44:53'),
(6, 4, 'TMC', 'Study', 15, '2026-05-02', '2026-05-19 02:52:28'),
(7, 4, 'TMC', 'Meeting', 5, '2026-05-17', '2026-05-19 02:54:30'),
(9, 4, 'IMS565-INTERVIEW', 'Meeting', 25, '2026-05-18', '2026-05-19 04:38:24'),
(10, 2, 'TMC', 'Study', 5, '2026-05-30', '2026-05-19 19:14:59'),
(12, 8, 'COLSULTATION', 'Deep Work', 45, '2026-06-06', '2026-05-22 05:17:44'),
(13, 4, 'CODINGS', 'Deep Work', 60, '2026-05-22', '2026-05-22 22:05:46'),
(14, 5, 'IMS566', 'Deep Work', 60, '2026-05-22', '2026-05-22 23:48:04'),
(15, 5, 'IMS565-INTERVIEW', 'Study', 25, '2026-05-24', '2026-05-22 23:48:19'),
(16, 5, 'COLSULTATION', 'Meeting', 5, '2026-05-26', '2026-05-22 23:48:33'),
(18, 8, 'IMS566 CODING', 'Study', 25, '2026-05-23', '2026-05-23 20:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `mood_entries`
--

CREATE TABLE `mood_entries` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `mood_level` tinyint(4) NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood_entries`
--

INSERT INTO `mood_entries` (`id`, `user_id`, `mood_level`, `entry_date`) VALUES
(14, 4, 5, '2026-05-22 21:26:49'),
(15, 4, 1, '2026-05-22 21:31:22'),
(16, 4, 5, '2026-05-22 21:31:34'),
(17, 4, 4, '2026-05-22 21:35:47'),
(18, 4, 5, '2026-05-22 22:03:20'),
(19, 4, 5, '2026-05-22 22:03:24'),
(20, 4, 3, '2026-05-22 23:42:05'),
(21, 5, 5, '2026-05-22 23:44:15'),
(22, 5, 1, '2026-05-22 23:47:40'),
(23, 5, 4, '2026-05-22 23:49:52'),
(24, 4, 3, '2026-05-23 01:46:14'),
(25, 4, 4, '2026-05-23 01:46:31'),
(26, 4, 3, '2026-05-23 01:46:40'),
(27, 8, 1, '2026-05-23 02:24:29'),
(28, 8, 4, '2026-05-23 02:25:43'),
(29, 8, 3, '2026-05-23 19:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `category` enum('Deep Work','Study','Meeting','Assignment') NOT NULL,
  `status` enum('Pending','In Progress','Completed') NOT NULL,
  `due_date` date NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `category`, `status`, `due_date`, `created`) VALUES
(1, 1, 'ASSIGMENT', 'Study', 'Pending', '2026-05-27', '2026-05-16 02:38:57'),
(2, 1, 'KEMPEN', '', 'Pending', '2026-05-29', '2026-05-16 02:45:29'),
(3, 1, 'IMS566', '', 'In Progress', '2026-05-24', '2026-05-16 03:51:00'),
(6, 2, 'IMS560', 'Deep Work', 'In Progress', '2026-05-19', '2026-05-19 00:56:46'),
(7, 2, 'IMS565', 'Study', 'Pending', '2026-05-20', '2026-05-19 00:57:26'),
(9, 2, 'CTU', 'Assignment', 'Completed', '2026-05-17', '2026-05-19 14:00:30'),
(10, 3, 'MEMO', 'Deep Work', 'Pending', '2026-05-20', '2026-05-19 17:13:44'),
(13, 2, 'CTU', 'Assignment', 'In Progress', '2026-05-30', '2026-05-19 19:14:00'),
(14, 4, 'ENTI', 'Deep Work', 'Pending', '2026-07-10', '2026-05-20 00:16:09'),
(15, 4, 'IMD561', 'Study', 'Pending', '2026-04-27', '2026-05-20 00:24:04'),
(16, 4, 'KOOP', 'Assignment', 'In Progress', '2026-06-06', '2026-05-20 00:25:24'),
(17, 4, 'JEJAK PRO', 'Deep Work', 'Completed', '2026-06-27', '2026-05-20 01:30:21'),
(18, 4, 'IML513', 'Assignment', 'In Progress', '2026-07-11', '2026-05-21 16:18:02'),
(19, 4, 'CTU552', 'Study', 'Completed', '2026-05-22', '2026-05-22 02:07:10'),
(21, 8, 'IML513', 'Deep Work', 'Completed', '2026-05-31', '2026-05-22 05:15:26'),
(23, 5, 'CTU 552', 'Deep Work', 'Pending', '2026-05-22', '2026-05-22 23:44:49'),
(24, 5, 'IML513', 'Study', 'In Progress', '2026-05-23', '2026-05-22 23:45:05'),
(25, 5, 'LCC554', 'Assignment', 'Completed', '2026-05-24', '2026-05-22 23:45:24'),
(27, 5, 'IMS565', 'Study', 'Completed', '2026-05-06', '2026-05-22 23:47:19'),
(28, 8, 'TMC', 'Study', 'In Progress', '2026-06-06', '2026-05-23 20:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'Ali', '2025616108@student.uitm.edu.my', '87654321'),
(3, 'Atikah', 'atikah@gmail.com', '23456789'),
(4, 'Nisaa', 'nisa@gmail.com', '98765432'),
(5, 'Rabiatul', 'rabiatul@gmail.com', '32165498'),
(6, 'AHMAD', '2025215808@student.uitm.edu.my', '32165498'),
(7, 'cici', 'cici@gmail.com', '36985214'),
(8, 'PokoLoko', 'pokolo@gmail.com', '87654219');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `focus_sessions`
--
ALTER TABLE `focus_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mood_entries`
--
ALTER TABLE `mood_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `focus_sessions`
--
ALTER TABLE `focus_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mood_entries`
--
ALTER TABLE `mood_entries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
