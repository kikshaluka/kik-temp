-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 01:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kik`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakers`
--

CREATE TABLE `breakers` (
  `id` int(11) NOT NULL,
  `mnf` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `pwrloss` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `busbars`
--

CREATE TABLE `busbars` (
  `uid` int(11) NOT NULL COMMENT 'unique_id',
  `rated_current` int(11) NOT NULL COMMENT 'rated current',
  `busbar_size` varchar(200) NOT NULL COMMENT 'busbar size',
  `30k3p` double(19,4) NOT NULL COMMENT '30k / 3p',
  `30k3p+n` double(11,4) NOT NULL COMMENT '30k / 3p+n',
  `70k3p` double(11,4) NOT NULL COMMENT '70k / 3p',
  `70k3p+n` double(11,4) NOT NULL COMMENT '70k / 3p+n',
  `cu` double(11,4) NOT NULL COMMENT 'Cu Weight',
  `100030k3p` double(11,4) NOT NULL,
  `100030k3p+n` double(11,4) NOT NULL,
  `100070k3p` double(11,4) NOT NULL,
  `100070k3p+n` double(11,4) NOT NULL,
  `1000cu` double(11,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busbars`
--

INSERT INTO `busbars` (`uid`, `rated_current`, `busbar_size`, `30k3p`, `30k3p+n`, `70k3p`, `70k3p+n`, `cu`, `100030k3p`, `100030k3p+n`, `100070k3p`, `100070k3p+n`, `1000cu`) VALUES
(1, 250, '1-5x15\r\n', 10.1500, 11.8400, 11.5100, 13.4300, 0.4000, 50.7500, 59.2000, 57.5500, 67.1500, 0.0000),
(2, 250, '1-10x10\r\n', 7.6100, 8.8800, 8.6300, 10.0700, 0.5300, 38.0500, 44.4000, 43.1500, 50.3500, 0.0000),
(3, 250, '2-10x5\r\n', 6.8500, 7.9900, 7.7700, 9.0600, 0.5300, 34.2500, 39.9500, 38.8500, 45.3000, 0.0000),
(4, 400, '2-10x10\r\n', 8.7700, 10.2300, 9.9400, 11.6000, 1.0700, 43.8500, 51.1500, 49.7000, 58.0000, 0.0000),
(5, 630, '2-10x15\r\n', 14.5900, 17.0200, 16.5000, 19.2400, 1.6000, 72.9500, 85.1000, 82.5000, 96.2000, 0.0000),
(6, 800, '2-10x20\r\n', 17.7300, 20.6900, 20.0500, 23.3900, 2.1400, 88.6500, 103.4500, 100.2500, 116.9500, 0.0000),
(7, 1000, '2-10x30\r\n', 18.7300, 21.8500, 21.1500, 24.6800, 3.2100, 93.6500, 109.2500, 105.7500, 123.4000, 0.0000),
(8, 1250, '2-10x40\r\n', 22.3500, 26.0800, 25.1500, 29.3400, 4.2800, 111.7500, 130.4000, 125.7500, 146.7000, 0.0000),
(9, 1600, '2-10x50\r\n', 29.7700, 34.7400, 33.4800, 39.0600, 5.3500, 148.8500, 173.7000, 167.4000, 195.3000, 0.0000),
(10, 1600, '2-10x60\r\n', 25.4200, 29.6600, 27.9000, 32.5500, 6.4200, 127.1000, 148.3000, 139.5000, 162.7500, 0.0000),
(11, 2000, '2-10x60\r\n', 39.7200, 46.3400, 44.4200, 51.8200, 6.4200, 198.6000, 231.7000, 222.1000, 259.1000, 0.0000),
(12, 2000, '2-10x80\r\n', 30.8300, 35.9700, 33.3100, 38.8700, 8.5500, 154.1500, 179.8500, 166.5500, 194.3500, 0.0000),
(13, 2500, '2-10x100\r\n', 39.7700, 46.4000, 43.9000, 51.2100, 10.6900, 198.8500, 232.0000, 219.5000, 256.0500, 0.0000),
(14, 3200, '2-10x150\r\n', 46.1300, 53.8200, 51.3400, 59.9000, 16.0400, 230.6500, 269.1000, 256.7000, 299.5000, 0.0000),
(15, 4000, '4-10x100\r\n', 45.1700, 52.7000, 50.4300, 58.8300, 21.3800, 201.3000, 234.8500, 223.7500, 261.0500, 0.0000),
(16, 5000, '4-10x120\r\n', 60.6500, 70.7500, 67.3300, 78.5500, 25.6600, 225.8500, 263.5000, 252.1500, 294.1500, 0.0000),
(17, 5000, '4-10x150\r\n', 50.3000, 58.6900, 55.7100, 46.9900, 32.0800, 303.2500, 353.7500, 336.6500, 392.7500, 0.0000),
(18, 5000, '6-10x80\r\n', 59.2800, 69.1600, 66.1400, 77.1600, 25.6600, 251.5000, 293.4500, 278.5500, 234.9500, 0.0000),
(19, 6300, '4-10x200\r\n', 59.8500, 69.8200, 66.6600, 77.7700, 42.7700, 296.4000, 345.8000, 330.7000, 385.8000, 0.0000),
(20, 6300, '6-10x100\r\n', 80.5200, 93.9400, 89.5000, 104.4200, 32.0800, 299.2500, 349.1000, 333.3000, 388.8500, 0.0000),
(21, 7100, '4-10x200\r\n', 76.0100, 88.6800, 84.6600, 98.7800, 42.7700, 402.6000, 469.7000, 447.5000, 522.1000, 0.0000),
(22, 3200, '3-10x100\r\n', 40.2600, 46.9700, 44.7500, 52.2100, 16.0400, 380.0500, 443.4000, 423.3000, 493.9000, 0.0000),
(23, 0, '---select value--', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000);

-- --------------------------------------------------------

--
-- Table structure for table `cables`
--

CREATE TABLE `cables` (
  `c_id` int(10) NOT NULL,
  `brand_name` varchar(30) NOT NULL COMMENT 'cable brand name',
  `cable_type` varchar(30) NOT NULL COMMENT 'cable type (PVC)',
  `mat` varchar(20) NOT NULL COMMENT 'cable material (Cu/Al)',
  `resistance` decimal(11,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cables`
--

INSERT INTO `cables` (`c_id`, `brand_name`, `cable_type`, `mat`, `resistance`) VALUES
(1, 'main', 'PVC', 'Al', '35.8000'),
(2, 'main', 'PVC', 'Cu', '22.5000');

-- --------------------------------------------------------

--
-- Table structure for table `cus_users`
--

CREATE TABLE `cus_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_pin` int(6) NOT NULL COMMENT 'pin sent to email address',
  `pin_statues` int(1) NOT NULL COMMENT 'verified = 1 & non verified=0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_users`
--

INSERT INTO `cus_users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_type`, `user_pin`, `pin_statues`) VALUES
(1, 'shaluka', '$2y$12$WVabkq2F1LSDv6Uk4p1LWuqbduPC8Z1HmXcn5iwSGDBZXvVASncf2', 'shaluka@kik.lk', 'u', 123456, 0),
(2, 'client1', '$2y$12$RcsKJCbaVuzhQ5t4r6qhQOOjqGGNg5Fve7pbpULRpqqguWvyGatR6', 'client1@email.lk', 'u', 123456, 0),
(3, 'client2', '$2y$12$76hi7zZJRE6JzFB2RIb2kec2NkJciJOqhWfy3YGam1vSD.BCWpMQS', 'client2@kik.lk', 'u', 123456, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gears`
--

CREATE TABLE `gears` (
  `g_id` int(11) NOT NULL,
  `g_mnf` varchar(30) NOT NULL,
  `g_type` varchar(30) NOT NULL,
  `g_range` varchar(30) NOT NULL,
  `g_model` varchar(120) NOT NULL,
  `g_ratedi` varchar(30) NOT NULL,
  `g_powerloss` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gears`
--

INSERT INTO `gears` (`g_id`, `g_mnf`, `g_type`, `g_range`, `g_model`, `g_ratedi`, `g_powerloss`) VALUES
(1, 'ABB', 'MCCB', 'XT1', 'XT1B 160 TMD 16-450 3p F F\r\n', '16', '4.5'),
(2, 'ABB', 'MCCB', 'XT1', 'XT1C 160 TMD 63-630 3p F F\r\n', '63', '12.9'),
(3, 'ABB', 'MCCB', 'XT2', 'XT2L 160 TMA 125-1250 4p F F\r\n', '125', '39.9'),
(4, 'ABB', 'MCCB', 'XT2', 'XT2L 160 TMA 160-1600 3p F F\r\n', '160', '48.45'),
(5, 'ABB', 'ACB', 'E1.2', 'E1.2N 800 Ekip Dip LI 3p F F\r\n', '800', '50'),
(6, 'ABB ', 'ACB', 'E1.2', 'E1.2N 1000 Ekip Dip LI 3p F F\r\n', '1000', '78'),
(7, 'ABB ', 'ACB', 'E2.2', 'E2.2N 1600 Ekip Dip LI 3p WMP\r\n', '1600', '288'),
(8, 'ABB ', 'ACB', 'E2.2', 'E2.2N 2000 Ekip Dip LI 3p F HR\r\n', '2000', '212'),
(9, 'ABB ', 'ACB', 'E4.2', 'E4.2N 3200 Ekip Dip LI 3p WMP\r\n', '3200', '743'),
(10, 'ABB ', 'VSD', 'ACS', 'ACS550-x1-07A5-2\r\n', '7.5', '81'),
(11, 'ABB ', 'VSD', 'ACS', 'ACS550-x1-046A-2\r\n', '46', '420');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(30) NOT NULL,
  `top` double(11,4) NOT NULL,
  `front` double(11,4) NOT NULL,
  `back` double(11,4) NOT NULL,
  `side1` double(11,4) NOT NULL,
  `side2` double(11,4) NOT NULL,
  `curve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `pos_name`, `top`, `front`, `back`, `side1`, `side2`, `curve`) VALUES
(1, 'Seperated', 1.4000, 0.9000, 0.9000, 0.9000, 0.9000, 1),
(2, 'Wall Attached', 1.4000, 0.9000, 0.5000, 0.9000, 0.9000, 3),
(3, 'First / Last Separated', 1.4000, 0.9000, 0.9000, 0.5000, 0.9000, 2),
(4, 'First / Last Wall Attached', 1.4000, 0.9000, 0.5000, 0.5000, 0.9000, 4),
(5, 'Central Seperated', 1.4000, 0.9000, 0.9000, 0.5000, 0.5000, 3),
(6, 'Central Wall Attached', 1.4000, 0.9000, 0.5000, 0.5000, 0.5000, 5),
(7, 'Surface Mounted', 1.4000, 0.9000, 0.5000, 0.9000, 0.9000, 3),
(8, 'Flush Mounted', 0.7000, 0.9000, 0.5000, 0.5000, 0.5000, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakers`
--
ALTER TABLE `breakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busbars`
--
ALTER TABLE `busbars`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cables`
--
ALTER TABLE `cables`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cus_users`
--
ALTER TABLE `cus_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `gears`
--
ALTER TABLE `gears`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakers`
--
ALTER TABLE `breakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `busbars`
--
ALTER TABLE `busbars`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique_id', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cables`
--
ALTER TABLE `cables`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cus_users`
--
ALTER TABLE `cus_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gears`
--
ALTER TABLE `gears`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
