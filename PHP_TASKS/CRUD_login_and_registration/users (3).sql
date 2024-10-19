-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 02:35 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `pdf_file_path` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image_path`, `pdf_file_path`, `position`) VALUES
(2, 'Mayar', 'mayar@gmail.com', '$2y$10$jgPX56sGeYFx6gePX3kH1.ao/ytys8h9.g/jbBpdfPsXT0qw5haQS', 'uploads/mayarphoto.png', 'uploads/Mayar cv.pdf', 'admin'),
(5, 'bashar', 'bashar@gmail.com', '$2y$10$Gdhlfivyv7esYyOI33zUZOFj0OKbbTSBrjWBDx2oCvCuLeh9uOYOK', 'uploads/bashar.jpg', 'uploads/bashar cv.pdf', 'user'),
(6, 'ibrahim', 'ibrahim@gmail.com', '$2y$10$QMV.CAQrj5tJHKGjZfyWQeyUsEaF7z/jr/U2tyAvSmwA6TzdiKLRO', 'uploads/ibrahim.jpg', 'uploads/ibrahim cv.pdf', 'user'),


--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
