-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 10:54 AM
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
-- Database: `watctime_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `id`) VALUES
('abhijitmukherjee416@gmail.com', '$2y$10$ny7g8xEKACjkqrYIeHDVPe.Rypu8xvBCFTpaxBZ4C.iOwfBmPnmm2', NULL),
('tealola8@gmail.com', '123456789', NULL),
('grovegammer@gmail.com', '36', NULL),
('abhijitmukherjee416@gmail.com', '245', NULL),
('zerowisr@gmail.com', '12145236', NULL),
('abhijitmukherjee416@gmail.com', '44444444', NULL),
('abhijitmukherjee416@gmail.com', '1245', NULL),
('abhijitmukherjee416@gmail.com', '4', NULL),
('abhijitmukherjee416@gmail.com', '4533553', NULL),
('abhijitmukherjee416@gmail.com', '12', NULL),
('abhijitmukherjee416@gmail.com', '12121', NULL),
('abhijitmukherjee416@gmail.com', '1545', NULL),
('abhijitmukherjee416@gmail.com', '1451', NULL),
('abhijitmukherjee416@gmail.com', '1441', NULL),
('abhijitmukherjee416@gmail.com', '1', NULL),
('abhijitmukherjee416@gmail.com', '45', NULL),
('abhijitmukherjee416@gmail.com', '7485', NULL),
('abhijitmukherjee416@gmail.com', '45', NULL),
('abhijitmukherjee416@gmail.com', '4545', NULL),
('abhijitmukherjee416@gmail.com', 'dfe', NULL),
('abhijitmukherjee416@gmail.com', '14', NULL),
('abhijitmukherjee416@gmail.com', '78', NULL),
('abhijitmukherjee416@gmail.com', '123456', NULL),
('abhijitmukherjee416@gmail.com', '546', NULL),
('abhijitmukherjee416@gmail.com', '4465', NULL),
('abhijitmukherjee416@gmail.com', '54', NULL),
('abhijitmukherjee416@gmail.com', '4568', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
