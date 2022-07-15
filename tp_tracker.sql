-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2022 at 01:07 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_task`
--

CREATE TABLE `list_task` (
  `id_task` int(15) NOT NULL,
  `item_task` varchar(36) NOT NULL,
  `desc_task` varchar(50) NOT NULL,
  `id_proj` int(15) NOT NULL,
  `created` int(36) NOT NULL,
  `modified` int(36) NOT NULL,
  `due_date` int(36) NOT NULL,
  `status` varchar(10) NOT NULL,
  `priority` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_time`
--

CREATE TABLE `log_time` (
  `id_log` int(15) NOT NULL,
  `id_task` int(15) NOT NULL,
  `total_count` int(36) NOT NULL,
  `date` int(36) NOT NULL,
  `id_user` int(15) NOT NULL,
  `status_log` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_proj` int(15) NOT NULL,
  `name_proj` varchar(36) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  `start_date` int(36) NOT NULL,
  `end_date` int(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id_time` int(15) NOT NULL,
  `id_proj` int(15) NOT NULL,
  `alocation_time` int(15) NOT NULL,
  `work_time` varchar(8) NOT NULL,
  `day` int(2) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `total_time`
--

CREATE TABLE `total_time` (
  `id_time` int(15) NOT NULL,
  `id_proj` int(15) NOT NULL,
  `total_time` int(36) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_task`
--
ALTER TABLE `list_task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `log_time`
--
ALTER TABLE `log_time`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_proj`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `total_time`
--
ALTER TABLE `total_time`
  ADD PRIMARY KEY (`id_time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
