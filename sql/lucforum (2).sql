-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 02:59 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(2, 'C', 'C tutorial'),
(3, 'nazmus', 'creatror'),
(4, 'test', 'this is a testing cat'),
(9, 'new test catagry', 'this text cata desc'),
(10, 'This cat 6', 'This is test cat 6');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  `post_reply` varchar(2500) NOT NULL,
  `post_reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_reply_by` int(200) NOT NULL,
  `reply_topic` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`, `post_reply`, `post_reply_date`, `post_reply_by`, `reply_topic`) VALUES
(1, 'dc', '2017-10-04 00:35:18', 7, 1, '', '2017-10-04 20:15:25', 0, 0),
(3, 'dcsfdfbfnmtjdt', '2017-10-04 01:39:15', 9, 1, '', '2017-10-04 20:15:25', 0, 0),
(4, 'xcfsdv c', '2017-10-04 02:00:43', 10, 1, '', '2017-10-04 20:15:25', 0, 0),
(5, 'Hey there this is test message', '2017-10-04 02:29:48', 11, 1, '', '2017-10-04 20:15:25', 0, 0),
(8, 'Hah ha', '2017-10-05 01:31:45', 12, 1, '', '2017-10-04 20:15:25', 0, 0),
(9, 'This is cat 6 despc', '2017-10-08 03:03:23', 13, 2, '', '2017-10-07 21:03:23', 0, 0),
(10, 'Topic number four desc', '2017-10-08 04:54:47', 14, 2, '', '2017-10-07 22:54:47', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(20) NOT NULL,
  `reply_post` varchar(2500) NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply_by` varchar(200) NOT NULL,
  `reply_topic` varchar(200) NOT NULL,
  `reply_topic_num` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `reply_post`, `reply_date`, `reply_by`, `reply_topic`, `reply_topic_num`) VALUES
(19, 'test', '2017-10-08 00:20:25', '2', '', 1),
(20, 'test reply', '2017-10-08 00:21:41', '2', '', 4),
(21, 'hlw', '2017-10-08 00:22:24', '2', '', 3),
(22, 'test reply', '2017-10-08 00:23:32', '2', '', 3),
(23, 'test', '2017-10-08 00:25:17', '2', '', 1),
(24, 'test', '2017-10-08 00:29:23', '2', '', 1),
(25, 'test', '2017-10-08 00:30:49', '2', '', 3),
(26, 'test', '2017-10-08 00:33:09', '2', '', 8),
(27, 'test', '2017-10-08 00:33:51', '2', '', 8),
(28, 'test', '2017-10-08 00:36:20', '2', '', 8),
(29, 'test', '2017-10-08 00:36:42', '2', '', 9),
(30, 'het', '2017-10-08 00:38:50', '2', '', 5),
(31, 'het2', '2017-10-08 00:41:49', '2', '', 5),
(32, 'het2', '2017-10-08 00:42:15', '2', '', 5),
(33, 'test', '2017-10-08 00:45:37', '2', '', 1),
(34, 'etest', '2017-10-08 00:47:01', '2', '', 10),
(35, 'test', '2017-10-08 00:48:50', '2', '', 4),
(36, 'test sql', '2017-10-08 00:51:59', '2', '', 4),
(37, 'test sql', '2017-10-08 00:54:12', '2', '', 4),
(38, 'test number 50', '2017-10-08 00:54:51', '2', '', 9),
(39, 'heh he test number 51', '2017-10-08 00:55:51', '2', '', 9),
(40, 'test number 52', '2017-10-08 00:58:12', '2', '', 3),
(41, 'test number 53', '2017-10-08 00:58:39', '2', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(7, 'pyramid', '2017-10-04 00:35:17', 2, 1),
(9, 'hlw', '2017-10-04 01:39:15', 2, 1),
(10, 'vsc', '2017-10-04 02:00:43', 3, 1),
(11, 'this text topic', '2017-10-04 02:29:48', 4, 1),
(12, 'new topic test', '2017-10-05 01:31:45', 9, 1),
(13, 'Test topic under cat 6', '2017-10-08 03:03:23', 10, 2),
(14, 'Topic number 4', '2017-10-08 04:54:47', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'sakib', '0ce8446045495d97fee36a5d178a3c8ce68e758d', 'sakib@gmail.com', '2017-10-03 17:50:28', 0),
(2, 'nazmus', '0ce8446045495d97fee36a5d178a3c8ce68e758d', '', '2017-10-04 02:36:38', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_topic_num` (`reply_topic_num`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`reply_topic_num`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
