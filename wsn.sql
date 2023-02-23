-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsn`
--

-- --------------------------------------------------------

--
-- Table structure for table `cfm-sensors-configuration-01`
--

CREATE TABLE `cfm-sensors-configuration-01` (
  `id` int(11) DEFAULT NULL,
  `device_type` varchar(144) DEFAULT NULL,
  `mac_address` varchar(144) DEFAULT NULL,
  `reg_time` varchar(144) DEFAULT NULL,
  `name` varchar(144) DEFAULT NULL,
  `location` varchar(144) DEFAULT NULL,
  `config_time` varchar(144) DEFAULT NULL,
  `update_time` varchar(144) DEFAULT NULL,
  `repeater_id` varchar(144) DEFAULT NULL,
  `d_c_id` varchar(144) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfm-sensors-configuration-01`
--

INSERT INTO `cfm-sensors-configuration-01` (`id`, `device_type`, `mac_address`, `reg_time`, `name`, `location`, `config_time`, `update_time`, `repeater_id`, `d_c_id`) VALUES
(2, 'sensor-node', '5C:CF:7F:57:26:FE', '2023-02-01 00:40:37', 'Small Room Floor Near Shelf', 'Cognifront Lab', '2023-02-01 22:29:16', '2023-02-01 01:42:58', '4', '0'),
(3, 'coordinator-node', 'A4:CF:12:C7:96:B7', '2023-02-01 01:20:56', 'Coordinator', '', '2023-02-01 01:20:56', '2023-02-01 01:20:56', '-1', '0'),
(4, 'repeater-node', 'C4:5B:BE:70:D0:A2', '2023-02-01 01:42:06', 'R01', 'Cognifront Lab', '2023-02-01 21:36:29', '2023-02-01 21:36:46', '5', '0'),
(5, 'repeater-node', '84:CC:A8:88:7A:78', '2023-02-01 21:35:45', 'R02', 'Red Stool', '2023-02-01 21:36:23', '2023-02-01 21:36:36', '3', '0'),
(6, 'sensor-node', '30:83:98:80:04:84', '2023-02-01 22:27:51', 'Master Room Near Cupboard DHT11', 'Cognifront Lab', '2023-02-01 22:30:52', '2023-02-01 22:29:58', '4', '0'),
(7, 'coordinator-node', 'E8:68:E7:CE:30:DD', '2023-02-01 22:43:49', 'Coordinator', '', '2023-02-01 22:43:49', '2023-02-01 22:43:49', '-1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cfm-sensors-configuration-01 (1)`
--

CREATE TABLE `cfm-sensors-configuration-01 (1)` (
  `id` int(11) DEFAULT NULL,
  `device_type` varchar(144) DEFAULT NULL,
  `mac_address` varchar(144) DEFAULT NULL,
  `reg_time` varchar(144) DEFAULT NULL,
  `name` varchar(144) DEFAULT NULL,
  `location` varchar(144) DEFAULT NULL,
  `config_time` varchar(144) DEFAULT NULL,
  `update_time` varchar(144) DEFAULT NULL,
  `repeater_id` varchar(144) DEFAULT NULL,
  `d_c_id` varchar(144) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfm-sensors-configuration-01 (1)`
--

INSERT INTO `cfm-sensors-configuration-01 (1)` (`id`, `device_type`, `mac_address`, `reg_time`, `name`, `location`, `config_time`, `update_time`, `repeater_id`, `d_c_id`) VALUES
(2, 'sensor-node', '5C:CF:7F:57:26:FE', '2023-02-01 00:40:37', 'Small Room Floor Near Shelf', 'Cognifront Lab', '2023-02-01 22:29:16', '2023-02-01 01:42:58', '4', '0'),
(3, 'coordinator-node', 'A4:CF:12:C7:96:B7', '2023-02-01 01:20:56', 'Coordinator', '', '2023-02-01 01:20:56', '2023-02-01 01:20:56', '-1', '0'),
(4, 'repeater-node', 'C4:5B:BE:70:D0:A2', '2023-02-01 01:42:06', 'R01', 'Cognifront Lab', '2023-02-01 21:36:29', '2023-02-01 21:36:46', '5', '0'),
(5, 'repeater-node', '84:CC:A8:88:7A:78', '2023-02-01 21:35:45', 'R02', 'Red Stool', '2023-02-01 21:36:23', '2023-02-01 21:36:36', '3', '0'),
(6, 'sensor-node', '30:83:98:80:04:84', '2023-02-01 22:27:51', 'Master Room Near Cupboard DHT11', 'Cognifront Lab', '2023-02-01 22:30:52', '2023-02-01 22:29:58', '4', '0'),
(7, 'coordinator-node', 'E8:68:E7:CE:30:DD', '2023-02-01 22:43:49', 'Coordinator', '', '2023-02-01 22:43:49', '2023-02-01 22:43:49', '-1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cfm-sensors-configuration-01 (2)`
--

CREATE TABLE `cfm-sensors-configuration-01 (2)` (
  `id` int(11) DEFAULT NULL,
  `device_type` varchar(144) DEFAULT NULL,
  `mac_address` varchar(144) DEFAULT NULL,
  `reg_time` varchar(144) DEFAULT NULL,
  `name` varchar(144) DEFAULT NULL,
  `location` varchar(144) DEFAULT NULL,
  `config_time` varchar(144) DEFAULT NULL,
  `update_time` varchar(144) DEFAULT NULL,
  `repeater_id` varchar(144) DEFAULT NULL,
  `d_c_id` varchar(144) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfm-sensors-configuration-01 (2)`
--

INSERT INTO `cfm-sensors-configuration-01 (2)` (`id`, `device_type`, `mac_address`, `reg_time`, `name`, `location`, `config_time`, `update_time`, `repeater_id`, `d_c_id`) VALUES
(2, 'sensor-node', '5C:CF:7F:57:26:FE', '2023-02-01 00:40:37', 'Small Room Floor Near Shelf', 'Cognifront Lab', '2023-02-01 22:29:16', '2023-02-01 01:42:58', '4', '0'),
(3, 'coordinator-node', 'A4:CF:12:C7:96:B7', '2023-02-01 01:20:56', 'Coordinator', '', '2023-02-01 01:20:56', '2023-02-01 01:20:56', '-1', '0'),
(4, 'repeater-node', 'C4:5B:BE:70:D0:A2', '2023-02-01 01:42:06', 'R01', 'Cognifront Lab', '2023-02-01 21:36:29', '2023-02-01 21:36:46', '5', '0'),
(5, 'repeater-node', '84:CC:A8:88:7A:78', '2023-02-01 21:35:45', 'R02', 'Red Stool', '2023-02-01 21:36:23', '2023-02-01 21:36:36', '3', '0'),
(6, 'sensor-node', '30:83:98:80:04:84', '2023-02-01 22:27:51', 'Master Room Near Cupboard DHT11', 'Cognifront Lab', '2023-02-01 22:30:52', '2023-02-01 22:29:58', '4', '0'),
(7, 'coordinator-node', 'E8:68:E7:CE:30:DD', '2023-02-01 22:43:49', 'Coordinator', '', '2023-02-01 22:43:49', '2023-02-01 22:43:49', '-1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cfm-sensors-configuration-05`
--

CREATE TABLE `cfm-sensors-configuration-05` (
  `id` int(11) DEFAULT NULL,
  `device_type` varchar(144) DEFAULT NULL,
  `mac_address` varchar(144) DEFAULT NULL,
  `reg_time` varchar(144) DEFAULT NULL,
  `name` varchar(144) DEFAULT NULL,
  `location` varchar(144) DEFAULT NULL,
  `config_time` varchar(144) DEFAULT NULL,
  `update_time` varchar(144) DEFAULT NULL,
  `repeater_id` varchar(144) DEFAULT NULL,
  `d_c_id` varchar(144) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfm-sensors-configuration-05`
--

INSERT INTO `cfm-sensors-configuration-05` (`id`, `device_type`, `mac_address`, `reg_time`, `name`, `location`, `config_time`, `update_time`, `repeater_id`, `d_c_id`) VALUES
(96, 'coordinator-node', 'A4:CF:12:C7:96:B7', '2023-02-09 11:00:35', 'Coordinator', '', '2023-02-09 11:00:35', '2023-02-09 11:00:35', '-1', '0'),
(97, 'coordinator-node', 'A4:CF:12:C7:92:85', '2023-02-09 11:01:24', 'Coordinator', '', '2023-02-09 11:01:24', '2023-02-09 11:01:24', '-1', '0'),
(98, 'repeater-node', '84:CC:A8:88:7A:78', '2023-02-09 11:03:57', 'R1', 'Cognifront Lab', '2023-02-09 11:07:49', '2023-02-09 11:53:36', '100', '0'),
(99, 'sensor-node', '5C:CF:7F:57:26:FE', '2023-02-09 11:05:47', 'S1', 'Cognifront Lab', '2023-02-09 11:06:02', '2023-02-09 11:56:47', '98', '0'),
(100, 'repeater-node', 'A4:CF:12:C7:88:B7', '2023-02-09 11:07:34', 'R2', 'Cognifront Lab', '2023-02-09 11:09:21', '2023-02-09 11:09:42', '101', '0'),
(101, 'repeater-node', 'A4:CF:12:C7:EF:50', '2023-02-09 11:08:56', 'R3', 'Cognifront Lab', '2023-02-09 11:10:44', '2023-02-09 11:10:52', '102', '0'),
(102, 'repeater-node', 'A4:CF:12:C7:DD:C4', '2023-02-09 11:10:23', 'R4', 'Cognifront Lab', '2023-02-09 11:22:55', '2023-02-09 12:03:21', '96', '0'),
(103, 'repeater-node', 'A4:CF:12:C7:DF:5F', '2023-02-09 11:16:50', 'R5', 'Cognifront Lab', '2023-02-09 11:17:56', '2023-02-09 11:18:16', '-1', '0'),
(104, 'repeater-node', 'C4:5B:BE:70:D0:A2', '2023-02-09 11:23:18', 'R6', 'Cognifront Lab', '2023-02-09 11:24:19', '2023-02-09 11:23:18', '-1', '0'),
(105, 'repeater-node', 'A4:CF:12:C7:E6:D9', '2023-02-09 11:24:15', 'R7', 'Cognifront Lab', '2023-02-09 11:24:27', '2023-02-09 11:24:15', '-1', '0'),
(106, 'sensor-node', '30:83:98:80:04:84', '2023-02-09 11:25:11', 'S2', 'Cognifront Lab', '2023-02-09 11:25:28', '2023-02-09 11:25:37', '98', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
