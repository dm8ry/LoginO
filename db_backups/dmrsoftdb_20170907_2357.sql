-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql.dmrsoft.com
-- Generation Time: Sep 07, 2017 at 01:56 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmrsoftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `logino_app_config`
--

CREATE TABLE `logino_app_config` (
  `id` int(11) NOT NULL,
  `the_parameter` varchar(200) NOT NULL,
  `the_value` varchar(200) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(100) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_blacklisted_ip`
--

CREATE TABLE `logino_blacklisted_ip` (
  `id` int(11) NOT NULL,
  `ip_addr` varchar(200) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_businesslog`
--

CREATE TABLE `logino_businesslog` (
  `id` int(11) NOT NULL,
  `alert_id` int(11) NOT NULL,
  `event_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_business_alert`
--

CREATE TABLE `logino_business_alert` (
  `id` int(11) NOT NULL,
  `the_name` varchar(200) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_language`
--

CREATE TABLE `logino_language` (
  `id` int(11) NOT NULL,
  `the_name` varchar(100) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(100) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_translation`
--

CREATE TABLE `logino_translation` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `the_key` varchar(200) NOT NULL,
  `the_value` varchar(2000) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logino_user`
--

CREATE TABLE `logino_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `passw` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `salt_value` varchar(200) NOT NULL,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logino_user`
--

INSERT INTO `logino_user` (`id`, `username`, `email`, `passw`, `phone`, `first_name`, `last_name`, `country`, `city`, `create_dt`, `modify_dt`, `is_active`, `is_confirmed`, `salt_value`, `changed_by`) VALUES
(1, 'jjjjjj', 'jjj@jjj.com', 'e10adc3949ba59abbe56e057f20f883e', 'xxx', 'xx', 'xx', 'xx', 'xxx', '2017-09-07 20:37:10', '2017-09-07 20:37:10', 1, 1, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logino_app_config`
--
ALTER TABLE `logino_app_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logino_app_config_idx1` (`the_parameter`);

--
-- Indexes for table `logino_blacklisted_ip`
--
ALTER TABLE `logino_blacklisted_ip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logino_blacklisted_ip_idx1` (`ip_addr`);

--
-- Indexes for table `logino_businesslog`
--
ALTER TABLE `logino_businesslog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logino_businesslog` (`alert_id`);

--
-- Indexes for table `logino_business_alert`
--
ALTER TABLE `logino_business_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logino_language`
--
ALTER TABLE `logino_language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logino_language_idx1` (`the_name`) USING BTREE;

--
-- Indexes for table `logino_translation`
--
ALTER TABLE `logino_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logino_translation_idx1` (`lang_id`,`the_key`) USING BTREE;

--
-- Indexes for table `logino_user`
--
ALTER TABLE `logino_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logino_user_idx1` (`username`),
  ADD UNIQUE KEY `logino_user_idx2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logino_app_config`
--
ALTER TABLE `logino_app_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_blacklisted_ip`
--
ALTER TABLE `logino_blacklisted_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_businesslog`
--
ALTER TABLE `logino_businesslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_business_alert`
--
ALTER TABLE `logino_business_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_language`
--
ALTER TABLE `logino_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_translation`
--
ALTER TABLE `logino_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logino_user`
--
ALTER TABLE `logino_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `logino_businesslog`
--
ALTER TABLE `logino_businesslog`
  ADD CONSTRAINT `logino_businesslog_fk` FOREIGN KEY (`alert_id`) REFERENCES `logino_business_alert` (`id`);

--
-- Constraints for table `logino_translation`
--
ALTER TABLE `logino_translation`
  ADD CONSTRAINT `logino_translation_fk` FOREIGN KEY (`lang_id`) REFERENCES `logino_language` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
