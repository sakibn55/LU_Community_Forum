-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 06:46 PM
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
(11, 'C-tutorial', 'Here we learn basics of c.'),
(12, 'Java Tutorial', 'Here we learn about java.'),
(13, 'Python Tutorial', 'Here we learn python'),
(14, 'Php Tutorial', 'Here we learn php.'),
(15, 'laravel', 'this is laravel'),
(16, 'Laravel 5.5', 'latest'),
(17, 'Java a', 'Java new'),
(18, 'sx', 'sax'),
(19, 'csc', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` varchar(2500) NOT NULL,
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
(11, 'C is a powerful system programming language, and C++ is an excellent general purpose programming language with modern bells and whistles.', '2017-10-08 22:21:34', 15, 2, '', '2017-10-08 16:21:34', 0, 0),
(12, 'Java is at the heart of our digital lifestyle. ', '2017-10-08 22:33:32', 19, 1, '', '2017-10-08 16:33:32', 0, 0),
(13, 'Python is a programming language.', '2017-10-09 12:15:15', 20, 1, '', '2017-10-09 06:15:15', 0, 0),
(14, 'Php is a programming language.', '2017-10-09 12:18:23', 21, 4, '', '2017-10-09 06:18:23', 0, 0),
(15, 'jiikh', '2017-11-18 03:46:01', 22, 5, '', '2017-11-17 21:46:01', 0, 0);

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
(42, 'Thank You :D', '2017-10-08 16:22:42', '1', '', 11),
(43, 'Thanks a lot', '2017-10-08 16:25:21', '1', '', 11),
(44, 'Thank you.', '2017-10-09 06:15:37', '1', '', 13),
(45, 'hah a\r\n', '2017-11-17 17:01:03', '5', '', 11),
(46, 'lol', '2017-11-17 17:20:07', '5', '', 13),
(47, 'lol', '2017-11-17 17:20:17', '5', '', 14),
(48, 'dhur', '2017-11-17 17:20:38', '5', '', 12),
(49, 'damn', '2017-11-17 17:21:02', '5', '', 11),
(50, 'hurreey', '2017-11-17 17:26:18', '6', '', 11),
(51, 'haha', '2017-11-17 17:34:02', '6', '', 11),
(52, 'what is this', '2017-11-17 17:34:14', '6', '', 12);

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
(15, 'Learn C and C++', '2017-10-08 22:21:34', 11, 2),
(19, 'What is java', '2017-10-08 22:33:32', 12, 1),
(20, 'What is python', '2017-10-09 12:15:15', 13, 1),
(21, 'learn php', '2017-10-09 12:18:23', 14, 4),
(22, 'hummm', '2017-11-18 03:46:01', 18, 5);

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
(1, 'sakib', '239168cef134f3b11aab0cf6374616d7', 'sakib@gmail.com', '2017-10-03 17:50:28', 0),
(2, 'nazmus', '21232f297a57a5a743894a0e4a801fc3', '', '2017-10-04 02:36:38', 0),
(3, 'Tipu', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'tipu@gmail.com', '2017-10-09 12:14:10', 0),
(4, 'shadip', 'ff18bfe78c0b46dca6dac4e6a5f4e2b00a0fd18f', 'shadip@gmail.com', '2017-10-09 12:17:04', 0),
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '2017-11-17 22:59:38', 0),
(6, 'admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin2@gmail.com', '2017-11-17 23:26:02', 0);

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
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
