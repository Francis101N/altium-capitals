-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2026 at 04:51 PM
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
-- Database: `altuimholdings`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `email`, `date_created`) VALUES
(1, 'Mapleaf Capital', '123456', 'Mapleaf Capitalcapitals@gmail.com', '2025-11-06 21:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `wallet_address` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `account_id` varchar(100) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `passport` varchar(200) NOT NULL,
  `bitcoin_address` varchar(500) DEFAULT NULL,
  `usdt_address` varchar(500) DEFAULT NULL,
  `eth_address` varchar(500) DEFAULT NULL,
  `usdcErc20_address` varchar(200) DEFAULT NULL,
  `usdtErc20_address` varchar(500) DEFAULT NULL,
  `tron_address` varchar(500) DEFAULT NULL,
  `account_balance` varchar(500) DEFAULT NULL,
  `ref` varchar(500) DEFAULT NULL,
  `total_referral_bonus` varchar(50) DEFAULT NULL,
  `last_login` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `account_id`, `surname`, `firstname`, `middlename`, `sex`, `dob`, `address`, `email`, `phone`, `username`, `password`, `passport`, `bitcoin_address`, `usdt_address`, `eth_address`, `usdcErc20_address`, `usdtErc20_address`, `tron_address`, `account_balance`, `ref`, `total_referral_bonus`, `last_login`, `date_created`) VALUES
(60, 'BUS-8330-2026', 'bustdown', 'Ebube', '...', 'Male', '2026-10-30', 'No50 ifite awka', 'francisnwankwo1972@gmail.com', '080698152400', 'ebube', '123456', 'uploads/6c8686eaf7eb6b522f2076be3f741987.jpg', 'btc', 'usdt', 'eth', 'usdc', 'erc20', 'trx', '200', NULL, NULL, '23rd Oct, 2026 10:50am', '2026-10-21 13:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `account_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `show_module` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `operating_system` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state/region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `token` varchar(500) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `wallet_type` varchar(50) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1945;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
