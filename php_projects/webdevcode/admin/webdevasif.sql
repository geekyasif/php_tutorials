-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 07:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdevasif`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `no_of_post` int(255) NOT NULL,
  `category_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `no_of_post`, `category_datetime`) VALUES
(15, 'JAVASCRIPT', 0, '2020-08-27 23:39:38'),
(16, 'PHP', 1, '2020-08-27 23:39:43'),
(19, 'CSS', 1, '2020-08-28 00:43:05'),
(20, 'HTML', 0, '2020-08-28 09:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_description` text NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `post_category`, `post_image`, `post_author`, `post_datetime`) VALUES
(55, 'irshad', '  {\r\n            cmd.CommandText = \"select Id, Name from tblFiles\";\r\n            cmd.Connection = con;\r\n            con.Open();\r\n            GridView1.D', 'CSS', 'download.jpg', 'Mohammad Asif', '2020-08-29 00:01:19'),
(57, 'server side language', 'sfasf fasas as assf asfsaf', 'PHP', '69693244-hackers-wallpapers.jpg', 'Shabaj Ansari', '2020-08-29 08:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_datettime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_role`, `user_datettime`) VALUES
(7, 'Mohammad Asif', 'mohammadasif', '$2y$10$j.yK4AxKi0Xo32aYAHCWKuiVBNGN4/t9ry.hbpTDx4Tt233jy6rR6', 'Admin', '2020-08-27 22:44:50'),
(10, 'Irshad Akram', 'irshad', '$2y$10$zCfMmYXBAVnTznMxMf102ebzZyPoDV7dbVhFHjioZ35XEAivLETim', 'Admin', '2020-08-27 22:55:00'),
(12, 'Shabaj Ansari', 'shabaj', '$2y$10$vlkvzwxm4bGT.59qNxxjZuFoo/7.UO/zTbe.qwuwwei0Wc.dY1dBS', 'Normal User', '2020-08-29 08:45:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
