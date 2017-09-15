-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql.dmrsoft.com
-- Generation Time: Sep 15, 2017 at 12:29 PM
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
CREATE DATABASE IF NOT EXISTS `dmrsoftdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dmrsoftdb`;

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

--
-- Dumping data for table `logino_app_config`
--

INSERT INTO `logino_app_config` (`id`, `the_parameter`, `the_value`, `create_dt`, `modify_dt`, `changed_by`) VALUES
(1, 'base_url', 'http://lab1.dmrsoft.com', '2017-09-08 11:32:59', '2017-09-08 11:32:59', 'system'),
(2, 'admin_email', 'contact@dmrsoft.com', '2017-09-08 11:33:22', '2017-09-08 11:33:22', 'system'),
(3, 'is_to_show_dig_clock', '1', '2017-09-15 10:51:13', '2017-09-15 10:51:13', 'system');

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

--
-- Dumping data for table `logino_blacklisted_ip`
--

INSERT INTO `logino_blacklisted_ip` (`id`, `ip_addr`, `create_dt`, `modify_dt`, `changed_by`) VALUES
(1, '11.116.112.*', '2017-09-15 09:33:03', '2017-09-15 09:33:03', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `logino_businesslog`
--

CREATE TABLE `logino_businesslog` (
  `id` int(11) NOT NULL,
  `alert_id` int(11) NOT NULL,
  `event_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(200) NOT NULL,
  `info` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logino_businesslog`
--

INSERT INTO `logino_businesslog` (`id`, `alert_id`, `event_dt`, `ip_addr`, `info`) VALUES
(1, 3, '2017-09-15 09:22:20', '46.116.112.212', 'username=123213; passw=123213123;'),
(2, 3, '2017-09-15 09:24:30', '46.116.112.212', 'username=Quadro; passw=123456;'),
(3, 7, '2017-09-15 09:46:41', '46.116.112.212', 'ip_addr=46.116.112.212; username=erwtretrewt; passw=ewrtw;'),
(4, 7, '2017-09-15 09:49:30', '46.116.112.212', 'ip_addr=46.116.112.212; username=rewtwertwre; passw=rewtewrtrewt;'),
(5, 7, '2017-09-15 09:52:45', '', 'ip_addr=; username=dsafasdfasdfsdaf; passw=asdfdasfasfasdf;'),
(6, 7, '2017-09-15 09:54:14', '46.116.112.212', 'ip_addr=46.116.112.212; username=asdfasdfdasfsadf; passw=asdfasdfdasfdas;'),
(7, 3, '2017-09-15 09:57:31', '46.116.112.212', 'username=dsfasdfasfas; passw=asdfasdfasdfdasfdas;'),
(8, 2, '2017-09-15 10:03:10', '46.116.112.212', 'username=Dmitry; passw=123456; phone=123-34-456; salt_val=508b4e423ea2a4ffd74e4576879e7375; '),
(9, 2, '2017-09-15 10:07:52', '46.116.112.212', 'username=Dmitry; passw=123456; email=quadro13@yandex.ru; phone=123-34-456; salt_val=508b4e423ea2a4ffd74e4576879e7375; '),
(10, 5, '2017-09-15 10:08:22', '', 'email=quadro13@yandex.ru; username=Dmitry;'),
(11, 1, '2017-09-15 10:09:58', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(12, 8, '2017-09-15 10:21:44', '46.116.112.212', 'username=Dmitry; email=quadro13@yandex.ru; phone=234-345-3445; new_password=;'),
(13, 9, '2017-09-15 10:22:35', '', 'username=Dmitry; email=quadro13@1234.com; phone=123-345562; new_password=;'),
(14, 1, '2017-09-15 11:08:59', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(15, 1, '2017-09-15 11:09:18', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(16, 1, '2017-09-15 11:10:24', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(17, 1, '2017-09-15 11:11:38', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(18, 1, '2017-09-15 11:12:59', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(19, 1, '2017-09-15 11:15:47', '46.116.112.212', 'username=Dmitry; passw=123456;'),
(20, 8, '2017-09-15 11:16:10', '46.116.112.212', 'username=Dmitry; email=quadro13@yandex.ru; phone=123; new_password=;');

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

--
-- Dumping data for table `logino_business_alert`
--

INSERT INTO `logino_business_alert` (`id`, `the_name`, `create_dt`, `modify_dt`, `changed_by`) VALUES
(1, 'ADMIN_LOGIN_SUCCESS', '2017-09-15 09:09:37', '2017-09-15 09:09:37', 'system'),
(2, 'ADMIN_SIGN_UP', '2017-09-15 09:09:52', '2017-09-15 09:09:52', 'system'),
(3, 'ADMIN_LOGIN_FAILURE', '2017-09-15 09:10:36', '2017-09-15 09:10:36', 'system'),
(4, 'ADMIN_RESET_PASSWORD', '2017-09-15 09:11:04', '2017-09-15 09:11:04', 'system'),
(5, 'ADMIN_SIGN_UP_CONFIRMED', '2017-09-15 09:29:48', '2017-09-15 09:29:48', 'system'),
(6, 'ADMIN_NEW_PASSWORD_SAVED', '2017-09-15 09:31:47', '2017-09-15 09:31:47', 'system'),
(7, 'ADMIN_BLACKLISTED_IP', '2017-09-15 09:43:19', '2017-09-15 09:43:19', 'system'),
(8, 'ADMIN_SIGN_UP_DUPLICATE_EMAIL', '2017-09-15 10:14:08', '2017-09-15 10:14:08', 'system'),
(9, 'ADMIN_SIGN_UP_DUPLICATE_USERNAME', '2017-09-15 10:15:35', '2017-09-15 10:15:35', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `logino_language`
--

CREATE TABLE `logino_language` (
  `id` int(11) NOT NULL,
  `the_name` varchar(100) NOT NULL,
  `the_name_3` char(3) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(100) NOT NULL DEFAULT 'system',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logino_language`
--

INSERT INTO `logino_language` (`id`, `the_name`, `the_name_3`, `create_dt`, `modify_dt`, `changed_by`, `status`) VALUES
(1, 'English', 'eng', '2017-09-15 12:44:51', '2017-09-15 12:44:51', 'system', 1),
(2, 'Русский', 'rus', '2017-09-15 12:45:02', '2017-09-15 12:45:02', 'system', 1),
(3, 'Italiano', 'ita', '2017-09-15 12:45:48', '2017-09-15 12:45:48', 'system', 1),
(4, 'Deutsch', 'deu', '2017-09-15 12:46:26', '2017-09-15 12:46:26', 'system', 1),
(5, 'Français', 'fra', '2017-09-15 12:47:00', '2017-09-15 12:47:00', 'system', 1),
(6, 'Español', 'esp', '2017-09-15 12:47:37', '2017-09-15 12:47:37', 'system', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logino_translation`
--

CREATE TABLE `logino_translation` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `the_key` varchar(200) NOT NULL,
  `the_value` varchar(2000) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logino_translation`
--

INSERT INTO `logino_translation` (`id`, `lang_id`, `page_name`, `the_key`, `the_value`, `create_dt`, `modify_dt`, `changed_by`) VALUES
(1, 1, 'admin.index', 'test.1', 'Hello World!', '2017-09-15 16:20:15', '2017-09-15 16:20:15', 'system'),
(2, 2, 'admin.index', 'test.1', 'Здравствуй, Мир!', '2017-09-15 16:20:59', '2017-09-15 16:20:59', 'system'),
(3, 4, 'admin.index', 'test.1', 'Hallo Welt!', '2017-09-15 16:22:02', '2017-09-15 16:22:02', 'system'),
(4, 6, 'admin.index', 'test.1', 'Hola Mundo', '2017-09-15 16:22:37', '2017-09-15 16:22:37', 'system'),
(5, 3, 'admin.index', 'test.1', 'Ciao Мondo!', '2017-09-15 16:23:28', '2017-09-15 16:23:28', 'system'),
(6, 5, 'admin.index', 'test.1', 'Bonjour tout le monde!', '2017-09-15 16:24:21', '2017-09-15 16:24:21', 'system');

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
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `salt_value` varchar(200) NOT NULL,
  `changed_by` varchar(200) NOT NULL DEFAULT 'system',
  `last_login` timestamp NULL DEFAULT NULL,
  `last_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logino_user`
--

INSERT INTO `logino_user` (`id`, `username`, `email`, `passw`, `phone`, `first_name`, `last_name`, `country`, `city`, `create_dt`, `modify_dt`, `is_active`, `is_confirmed`, `salt_value`, `changed_by`, `last_login`, `last_ip`) VALUES
(35, 'Dmitry', 'quadro13@yandex.ru', 'e10adc3949ba59abbe56e057f20f883e', '123-34-456', '', '', '', '', '2017-09-15 10:07:52', '2017-09-15 10:08:22', 1, 1, '508b4e423ea2a4ffd74e4576879e7375', 'system', '2017-09-15 11:15:47', '46.116.112.212');

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
  ADD UNIQUE KEY `logino_language_idx1` (`the_name`) USING BTREE,
  ADD UNIQUE KEY `the_name_3` (`the_name_3`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logino_blacklisted_ip`
--
ALTER TABLE `logino_blacklisted_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logino_businesslog`
--
ALTER TABLE `logino_businesslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `logino_business_alert`
--
ALTER TABLE `logino_business_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logino_language`
--
ALTER TABLE `logino_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logino_translation`
--
ALTER TABLE `logino_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logino_user`
--
ALTER TABLE `logino_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
