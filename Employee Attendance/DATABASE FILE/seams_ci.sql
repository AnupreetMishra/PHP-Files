-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 09:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seams_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `attdate` varchar(10) NOT NULL,
  `attstatus` varchar(1) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `empid`, `attdate`, `attstatus`, `createdate`) VALUES
(33, 9, '2021-04-01', 'P', '2021-04-18 16:19:23'),
(34, 9, '2021-04-02', 'P', '2021-04-18 16:19:27'),
(35, 10, '2021-04-01', 'P', '2021-04-18 17:44:08'),
(36, 10, '2021-04-02', 'P', '2021-04-18 17:44:11'),
(37, 10, '2021-04-03', 'P', '2021-04-18 17:44:12'),
(38, 10, '2021-04-05', 'P', '2021-04-18 17:44:14'),
(39, 10, '2021-04-06', 'P', '2021-04-18 17:44:17'),
(40, 10, '2021-04-07', 'P', '2021-04-18 17:44:21'),
(41, 10, '2021-04-08', 'P', '2021-04-18 17:44:25'),
(42, 10, '2021-04-09', 'P', '2021-04-18 17:44:28'),
(43, 10, '2021-04-10', 'P', '2021-04-18 17:44:32'),
(44, 10, '2021-04-12', 'P', '2021-04-18 17:44:36'),
(45, 10, '2021-04-04', 'H', '2021-04-18 17:44:51'),
(46, 10, '2021-04-11', 'H', '2021-04-18 17:45:02'),
(47, 10, '2021-04-13', 'P', '2021-04-18 17:45:05'),
(48, 10, '2021-04-14', 'A', '2021-04-18 17:45:08'),
(49, 10, '2021-04-15', 'A', '2021-04-18 17:45:13'),
(50, 16, '2021-04-01', 'P', '2021-04-18 19:12:36'),
(51, 16, '2021-04-02', 'P', '2021-04-18 19:12:38'),
(52, 16, '2021-04-03', 'A', '2021-04-18 19:12:41'),
(53, 16, '2021-04-05', 'A', '2021-04-18 19:12:43'),
(54, 16, '2021-04-06', 'A', '2021-04-18 19:12:46'),
(55, 16, '2021-04-07', 'A', '2021-04-18 19:12:48'),
(56, 16, '2021-04-08', 'P', '2021-04-18 19:12:51'),
(57, 16, '2021-04-09', 'P', '2021-04-18 19:12:54'),
(58, 16, '2021-04-04', 'H', '2021-04-18 19:12:57'),
(59, 16, '2021-04-10', 'P', '2021-04-18 19:13:00'),
(60, 16, '2021-04-11', 'H', '2021-04-18 19:13:03'),
(61, 13, '2021-04-01', 'P', '2021-04-18 19:13:17'),
(62, 13, '2021-04-02', 'P', '2021-04-18 19:13:19'),
(63, 13, '2021-04-03', 'P', '2021-04-18 19:13:20'),
(64, 13, '2021-04-04', 'H', '2021-04-18 19:13:23'),
(65, 13, '2021-04-05', 'P', '2021-04-18 19:13:24'),
(66, 13, '2021-04-06', 'P', '2021-04-18 19:13:26'),
(67, 13, '2021-04-07', 'A', '2021-04-18 19:13:28'),
(68, 13, '2021-04-08', 'A', '2021-04-18 19:13:30'),
(69, 13, '2021-04-09', 'P', '2021-04-18 19:13:32'),
(70, 13, '2021-04-10', 'A', '2021-04-18 19:13:35'),
(71, 13, '2021-04-11', 'H', '2021-04-18 19:13:38'),
(72, 13, '2021-04-12', 'A', '2021-04-18 19:13:42'),
(73, 13, '2021-04-13', 'P', '2021-04-18 19:13:44'),
(74, 19, '2021-04-01', 'P', '2021-04-18 19:16:06'),
(75, 19, '2021-04-02', 'P', '2021-04-18 19:16:08'),
(76, 19, '2021-04-03', 'P', '2021-04-18 19:16:10'),
(77, 19, '2021-04-04', 'H', '2021-04-18 19:16:11'),
(78, 19, '2021-04-05', 'A', '2021-04-18 19:16:14'),
(79, 19, '2021-04-06', 'A', '2021-04-18 19:16:15'),
(80, 19, '2021-04-07', 'A', '2021-04-18 19:16:18'),
(81, 19, '2021-04-08', 'A', '2021-04-18 19:16:20'),
(82, 19, '2021-04-09', 'A', '2021-04-18 19:16:23'),
(83, 19, '2021-04-10', 'A', '2021-04-18 19:16:25'),
(84, 19, '2021-04-11', 'H', '2021-04-18 19:16:27'),
(85, 19, '2021-04-12', 'P', '2021-04-18 19:16:30'),
(86, 18, '2021-04-01', 'P', '2021-04-18 19:16:37'),
(87, 18, '2021-04-02', 'P', '2021-04-18 19:16:39'),
(88, 18, '2021-04-03', 'P', '2021-04-18 19:16:42'),
(89, 18, '2021-04-04', 'H', '2021-04-18 19:16:44'),
(90, 18, '2021-04-05', 'A', '2021-04-18 19:16:45'),
(91, 18, '2021-04-06', 'P', '2021-04-18 19:16:47'),
(92, 18, '2021-04-07', 'P', '2021-04-18 19:16:49'),
(93, 18, '2021-04-08', 'P', '2021-04-18 19:16:51'),
(94, 18, '2021-04-10', 'P', '2021-04-18 19:16:55'),
(95, 18, '2021-04-09', 'P', '2021-04-18 19:16:58'),
(96, 18, '2021-04-11', 'H', '2021-04-18 19:17:01'),
(97, 15, '2021-04-01', 'P', '2021-04-18 19:17:07'),
(98, 15, '2021-04-02', 'P', '2021-04-18 19:17:09'),
(99, 15, '2021-04-03', 'A', '2021-04-18 19:17:17'),
(100, 15, '2021-04-04', 'H', '2021-04-18 19:17:18'),
(101, 15, '2021-04-05', 'P', '2021-04-18 19:17:20'),
(102, 15, '2021-04-06', 'P', '2021-04-18 19:17:21'),
(103, 15, '2021-04-07', 'P', '2021-04-18 19:17:23'),
(104, 15, '2021-04-08', 'P', '2021-04-18 19:17:26'),
(105, 15, '2021-04-09', 'A', '2021-04-18 19:17:28'),
(106, 15, '2021-04-10', 'A', '2021-04-18 19:17:30'),
(107, 15, '2021-04-11', 'H', '2021-04-18 19:17:32'),
(108, 17, '2021-04-04', 'H', '2021-04-18 19:17:37'),
(109, 17, '2021-04-11', 'H', '2021-04-18 19:17:38'),
(110, 17, '2021-04-01', 'P', '2021-04-18 19:17:42'),
(111, 17, '2021-04-02', 'P', '2021-04-18 19:17:44'),
(112, 17, '2021-04-03', 'A', '2021-04-18 19:17:46'),
(113, 17, '2021-04-05', 'P', '2021-04-18 19:17:48'),
(114, 17, '2021-04-06', 'P', '2021-04-18 19:17:49'),
(115, 17, '2021-04-07', 'P', '2021-04-18 19:17:52'),
(116, 17, '2021-04-08', 'P', '2021-04-18 19:17:55'),
(117, 17, '2021-04-09', 'A', '2021-04-18 19:17:58'),
(118, 17, '2021-04-10', 'A', '2021-04-18 19:18:01'),
(119, 11, '2021-04-01', 'P', '2021-04-18 19:18:07'),
(120, 11, '2021-04-02', 'A', '2021-04-18 19:18:09'),
(121, 11, '2021-04-03', 'A', '2021-04-18 19:18:11'),
(122, 11, '2021-04-04', 'H', '2021-04-18 19:18:12'),
(123, 11, '2021-04-05', 'A', '2021-04-18 19:18:14'),
(124, 11, '2021-04-06', 'A', '2021-04-18 19:18:15'),
(125, 11, '2021-04-07', 'A', '2021-04-18 19:18:18'),
(126, 11, '2021-04-08', 'A', '2021-04-18 19:18:21'),
(127, 11, '2021-04-09', 'A', '2021-04-18 19:18:25'),
(128, 11, '2021-04-10', 'A', '2021-04-18 19:18:28'),
(129, 11, '2021-04-11', 'H', '2021-04-18 19:18:29'),
(130, 11, '2021-04-12', 'A', '2021-04-18 19:18:32'),
(131, 11, '2021-04-13', 'P', '2021-04-18 19:18:35'),
(132, 11, '2021-04-14', 'P', '2021-04-18 19:18:41'),
(133, 11, '2021-04-15', 'P', '2021-04-18 19:18:44'),
(134, 11, '2021-04-16', 'P', '2021-04-18 19:18:51'),
(135, 11, '2021-04-17', 'A', '2021-04-18 19:19:09'),
(136, 21, '2021-04-01', 'P', '2021-04-18 19:23:56'),
(137, 21, '2021-04-02', 'P', '2021-04-18 19:24:00'),
(138, 21, '2021-04-03', 'P', '2021-04-18 19:24:02'),
(139, 21, '2021-04-04', 'H', '2021-04-18 19:24:03'),
(140, 21, '2021-04-05', 'A', '2021-04-18 19:24:06'),
(141, 21, '2021-04-06', 'A', '2021-04-18 19:24:09'),
(142, 21, '2021-04-07', 'A', '2021-04-18 19:24:11'),
(143, 21, '2021-04-08', 'P', '2021-04-18 19:24:15'),
(144, 21, '2021-04-09', 'P', '2021-04-18 19:24:19'),
(145, 21, '2021-04-10', 'P', '2021-04-18 19:24:23'),
(146, 21, '2021-04-11', 'H', '2021-04-18 19:24:25'),
(147, 21, '2021-04-12', 'A', '2021-04-18 19:24:28'),
(148, 21, '2021-04-13', 'P', '2021-04-18 19:24:31'),
(149, 21, '2021-04-14', 'P', '2021-04-18 19:24:34'),
(150, 21, '2021-04-15', 'P', '2021-04-18 19:24:40'),
(151, 21, '2021-04-16', 'A', '2021-04-18 19:24:44'),
(152, 21, '2021-04-18', 'H', '2021-04-18 19:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0' COMMENT '1 - Active, 0 - Not Active',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `email`, `mobile`, `dob`, `doj`, `status`, `createdate`) VALUES
(9, 'Christine', 'Kelley Road', 'moorechrist@gmail.com', '3545789650', '1990-12-02', '2020-12-04', '1', '2021-04-18 16:19:07'),
(10, 'Bruno Den', '1363  Conaway Street', 'brunoden@gmail.com', '3245854500', '1995-03-13', '2021-04-01', '1', '2021-04-18 17:42:58'),
(11, 'Melissa Price', '2459  Rivendell Drive', 'melissa@gmail.com', '4789654120', '1989-03-13', '2020-04-01', '1', '2021-04-18 18:52:38'),
(12, 'John Ambrose', '3189  Waterview Lane', 'ambrosejo@gmail.com', '4973124579', '1995-12-12', '2018-02-13', '0', '2021-04-18 18:53:27'),
(13, 'Donald Davis', '3461  Sycamore Street', 'davis696dol@gmail.com', '4236785550', '1985-03-23', '2019-10-11', '1', '2021-04-18 18:54:19'),
(14, 'Steven Jarrell', '2864  Golden Street', 'stevenjarell@gmail.com', '6547896320', '1986-03-12', '2017-12-12', '0', '2021-04-18 18:55:06'),
(15, 'Katherine Mercado', '703  Eagle Street', 'katherinem@gmail.com', '3457854440', '1992-05-25', '2020-04-16', '1', '2021-04-18 18:57:26'),
(16, 'Andrew EBell', '1044  Godfrey Road', 'andre0w@gmail.com', '4785552269', '1989-03-23', '2021-01-03', '1', '2021-04-18 18:58:09'),
(17, 'Lewis Villa', '734  Fire Access Road', 'lewisvill@gmail.com', '8520258523', '1995-06-16', '2021-04-02', '1', '2021-04-18 18:58:53'),
(18, 'John Vargas', '1090  Barnes Street', 'vargasjohn@gmail.com', '6872214580', '1996-09-29', '2021-02-15', '1', '2021-04-18 18:59:32'),
(19, 'John Sosa', '3024  Goff Avenue', 'sosjohn66@gmail.com', '7531598500', '1985-01-01', '2018-12-03', '1', '2021-04-18 19:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` varchar(1) NOT NULL COMMENT '0 - admin, 1 - users',
  `active` varchar(1) NOT NULL COMMENT '1 - active, 0 - inactive',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `active`, `createdate`) VALUES
(2, 'admin', 'D033E22AE348AEB5660FC2140AEC35850C4DA997', '0', '1', '2021-04-18 16:15:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;