-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 12:01 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgetin`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL DEFAULT 'New Transaction',
  `type` varchar(1000) NOT NULL,
  `total_expense` int(255) NOT NULL,
  `total_income` int(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `name`, `type`, `total_expense`, `total_income`, `date_added`, `account_id`) VALUES
(1, 'Electric', 'Bill', 500000, 0, '2020-12-11', 1),
(2, 'Bus Ride', 'Transportation', 15750, 0, '2020-12-11', 1),
(3, 'Top Up ML', 'Other', 5000000, 0, '2020-12-11', 2),
(4, 'Monthly Salary', 'Salary', 0, 20000000, '2020-12-11', 1),
(5, 'Internet Bill', 'Bill', 400000, 0, '2020-12-11', 1),
(6, 'Martabak', 'Food', 15000, 0, '2020-12-11', 4),
(7, 'Train Ride', 'Transportation', 80000, 0, '2020-12-11', 4),
(8, 'Test', 'Food', 0, 0, '2020-12-11', 5),
(10, 'Rent', 'Bill', 800000, 0, '2020-12-11', 2),
(11, 'test2', 'Food', 0, 0, '2020-12-11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account_id` int(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account_id`, `first_name`, `last_name`, `birth_date`, `username`, `email_address`, `password`) VALUES
(1, 'Wahyu', 'Candra', '2000-12-26', 'wahyucandra123', 'wahyucandra@mail.com', 'Pass123'),
(2, 'Yusuf', 'Akbar', '2001-04-21', 'yusufak', 'yusufakbar@mail.com', 'Anu123'),
(3, 'Abyan', 'Jiddan', '2001-01-21', 'abyanyan', 'abyanjiddan@mail.com', 'Iya123'),
(4, 'Rio', 'Yuda', '2001-04-05', 'rioyuda', 'rioyuda@mail.com', 'Rio123'),
(5, 'test', 'test', '2020-12-05', 'test', 'test', 'test'),
(6, 'test2', 'test2', '2020-12-02', 'test2', 'test2', 'test2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `users` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
