-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:50 AM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adname` varchar(60) NOT NULL,
  `adpass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adname`, `adpass`) VALUES
('admin', 0),
('admin', 0),
('admin1', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `planid` int(11) NOT NULL,
  `plan_name` varchar(60) NOT NULL,
  `trainer` varchar(60) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `plan_validity` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planid`, `plan_name`, `trainer`, `schedule`, `amount`, `plan_validity`) VALUES
(1, 'Fitness Class', 'William G. Stewart', 'Monday: 10:0am-11:30am & Tuesday: 2:00pm-3:30pm', 599, '1 Month'),
(2, 'Muscle Training', 'Paul D. Newman', 'Friday: 10:0am-11:30am & Thursday: 2:00pm-3:30pm', 549, '1 Month'),
(3, 'Body Building', 'Boyd C. Harris', 'Tuesday: 10:0am-11:30am & Monday: 2:00pm-3:30pm', 699, '1 Month'),
(4, 'Yoga Training Class', 'Hector T. Daigle', 'Wednesday: 10:0am-11:30am & Friday: 2:00pm-3:30pm', 599, '1 Month'),
(5, 'Advanced Training', 'Bret D. Bowers', 'Thursday: 10:0am-11:30am & Wednesday: 2:00pm-3:30pm', 749, '1 Month');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `purchase_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `purchases`
--
DELIMITER $$
CREATE TRIGGER `update_user_plan` AFTER INSERT ON `purchases` FOR EACH ROW BEGIN
  UPDATE users
  SET user_plan_status = 'active'
  WHERE id = NEW.user_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(11) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `planid` int(11) DEFAULT NULL,
  `user_plan_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `phone`, `pass`, `planid`, `user_plan_status`) VALUES
(12, 'Dave', 'dave@gmail.com', 2147483647, '$2y$10$vm/LegvX3KEd1oxNpAy8X.zhZE4piLMt22nGgcumzRdUzXXuYnYkO', 1, ''),
(13, 'Haro', 'haro@gmail.com', 2147483647, '$2y$10$XbRYR8HsPJ0/WaWfW6I4UuWHl8cVdoD9R3PdbWxJuQQxjxNoXBvxK', 4, ''),
(14, 'Base', 'base@gmail.com', 2147483647, '$2y$10$037AV7giZyHdqd4OY4ZTUOeofjpwhwTZbfja0lRLfCRajn2feS79m', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planid`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planid` (`planid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`planid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`planid`) REFERENCES `plans` (`planid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
