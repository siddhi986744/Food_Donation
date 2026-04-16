-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 02:20 PM
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
-- Database: `food_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_donations`
--

CREATE TABLE `food_donations` (
  `donation_id` int(11) NOT NULL,
  `food_name` varchar(100) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `expiry_time` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_donations`
--

INSERT INTO `food_donations` (`donation_id`, `food_name`, `quantity`, `expiry_time`, `location`, `donor_id`, `status`) VALUES
(1, 'Rice', '10kg', '2026-04-14 00:00:44', 'Mumbai', NULL, 'accepted'),
(2, 'Bread', '20 packets', '2026-04-14 00:00:44', 'Delhi', NULL, 'accepted'),
(3, 'Milk', '15 liters', '2026-04-14 00:00:44', 'Pune', NULL, 'accepted'),
(4, 'Rice', '10kg', '2026-04-14 00:01:07', 'Mumbai', NULL, 'pending'),
(5, 'Bread', '20 packets', '2026-04-14 00:01:07', 'Delhi', NULL, 'pending'),
(6, 'Milk', '15 liters', '2026-04-14 00:01:07', 'Pune', NULL, 'pending'),
(7, 'Rice', '10kg', '2026-04-14 00:01:15', 'Mumbai', NULL, 'pending'),
(8, 'Bread', '20 packets', '2026-04-14 00:01:15', 'Delhi', NULL, 'pending'),
(9, 'Milk', '15 liters', '2026-04-14 00:01:15', 'Pune', NULL, 'pending'),
(10, 'Rice', '10kg', '2026-04-14 00:01:22', 'Mumbai', NULL, 'pending'),
(11, 'Bread', '20 packets', '2026-04-14 00:01:22', 'Delhi', NULL, 'pending'),
(12, 'Milk', '15 liters', '2026-04-14 00:01:22', 'Pune', NULL, 'accepted'),
(13, 'Rice', '10kg', '2026-04-14 00:01:31', 'Mumbai', NULL, 'pending'),
(14, 'Bread', '20 packets', '2026-04-14 00:01:31', 'Delhi', NULL, 'pending'),
(15, 'Milk', '15 liters', '2026-04-14 00:01:31', 'Pune', NULL, 'pending'),
(16, 'chips', '5 packets', '2026-04-29 16:33:00', 'andheri west ', 13, 'pending'),
(17, 'soyabeans', '1kg', '2026-04-30 17:07:00', 'mumbai', 13, 'pending'),
(18, 'chips', '5 packets', '2026-04-08 17:10:00', 'malad', 13, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--
-- Error reading structure for table food_donation.requests: #1932 - Table &#039;food_donation.requests&#039; doesn&#039;t exist in engine
-- Error reading data for table food_donation.requests: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `food_donation`.`requests`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Org2', 'org2@gmail.com', ' 123', 'organization'),
(2, 'Org3', 'org3@gmail.com', ' 123456', 'organization'),
(3, 'Org4', 'org4@gmail.com', ' 123456789', 'organization'),
(4, 'Org5', 'org5@gmail.com', ' 123456789000', 'organization'),
(5, 'Org6', 'org6@gmail.com', ' 9000', 'organization'),
(6, 'Org7', 'org7@gmail.com', ' 8000', 'organization'),
(7, 'Org8', 'org8@gmail.com', ' 77000', 'organization'),
(8, 'Org9', 'org9@gmail.com', ' 99000', 'organization'),
(9, 'Org10', 'org10@gmail.com', ' 777000', 'organization'),
(10, 'Hasmukhpatel', 'hasmukhpatel77@gmail.com', 'Hhhhhhhhh5', 'donor'),
(11, 'Admin', 'admin@gmail.com', '1234', 'admin'),
(12, 'omkar patil', 'omkarpatil33@gmail.com', 'Omkarpatil67', 'donor'),
(13, 'arunashah', 'arunashah33@gmail.com', 'Aruna123', 'donor'),
(14, 'diya oza', 'diyaoza6615@gmail.com', 'Diyaoza6615', 'organization'),
(15, 'happysmiles', 'happysmiles6615@gmail.com', 'Happy12345', 'organization');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_donations`
--
ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_donations`
--
ALTER TABLE `food_donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
