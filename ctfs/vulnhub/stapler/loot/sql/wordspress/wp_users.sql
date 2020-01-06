-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2020 at 09:58 PM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'John', '$P$B7889EMq/erHIuZapMB8GEizebcIy9.', 'john', 'john@red.localhost', 'http://localhost', '2016-06-03 23:18:47', '', 0, 'John Smith'),
(2, 'Elly', '$P$BlumbJRRBit7y50Y17.UPJ/xEgv4my0', 'elly', 'Elly@red.localhost', '', '2016-06-05 16:11:33', '', 0, 'Elly Jones'),
(3, 'Peter', '$P$BTzoYuAFiBA5ixX2njL0XcLzu67sGD0', 'peter', 'peter@red.localhost', '', '2016-06-05 16:13:16', '', 0, 'Peter Parker'),
(4, 'barry', '$P$BIp1ND3G70AnRAkRY41vpVypsTfZhk0', 'barry', 'barry@red.localhost', '', '2016-06-05 16:14:26', '', 0, 'Barry Atkins'),
(5, 'heather', '$P$Bwd0VpK8hX4aN.rZ14WDdhEIGeJgf10', 'heather', 'heather@red.localhost', '', '2016-06-05 16:18:04', '', 0, 'Heather Neville'),
(6, 'garry', '$P$BzjfKAHd6N4cHKiugLX.4aLes8PxnZ1', 'garry', 'garry@red.localhost', '', '2016-06-05 16:18:23', '', 0, 'garry'),
(7, 'harry', '$P$BqV.SQ6OtKhVV7k7h1wqESkMh41buR0', 'harry', 'harry@red.localhost', '', '2016-06-05 16:18:41', '', 0, 'harry'),
(8, 'scott', '$P$BFmSPiDX1fChKRsytp1yp8Jo7RdHeI1', 'scott', 'scott@red.localhost', '', '2016-06-05 16:18:59', '', 0, 'scott'),
(9, 'kathy', '$P$BZlxAMnC6ON.PYaurLGrhfBi6TjtcA0', 'kathy', 'kathy@red.localhost', '', '2016-06-05 16:19:14', '', 0, 'kathy'),
(10, 'tim', '$P$BXDR7dLIJczwfuExJdpQqRsNf.9ueN0', 'tim', 'tim@red.localhost', '', '2016-06-05 16:19:29', '', 0, 'tim'),
(11, 'ZOE', '$P$B.gMMKRP11QOdT5m1s9mstAUEDjagu1', 'zoe', 'zoe@red.localhost', '', '2016-06-05 16:19:50', '', 0, 'ZOE'),
(12, 'Dave', '$P$Bl7/V9Lqvu37jJT.6t4KWmY.v907Hy.', 'dave', 'dave@red.localhost', '', '2016-06-05 16:20:09', '', 0, 'Dave'),
(13, 'Simon', '$P$BLxdiNNRP008kOQ.jE44CjSK/7tEcz0', 'simon', 'simon@red.localhost', '', '2016-06-05 16:20:35', '', 0, 'Simon'),
(14, 'Abby', '$P$ByZg5mTBpKiLZ5KxhhRe/uqR.48ofs.', 'abby', 'abby@red.localhost', '', '2016-06-05 16:20:53', '', 0, 'Abby'),
(15, 'Vicki', '$P$B85lqQ1Wwl2SqcPOuKDvxaSwodTY131', 'vicki', 'vicki@red.localhost', '', '2016-06-05 16:21:14', '', 0, 'Vicki'),
(16, 'Pam', '$P$BuLagypsIJdEuzMkf20XyS5bRm00dQ0', 'pam', 'pam@red.localhost', '', '2016-06-05 16:42:23', '', 0, 'Pam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
