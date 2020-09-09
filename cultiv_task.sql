-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 12:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultiv_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_by`, `created_at`, `updated_by`) VALUES
(1, '99999999994444444444999999999999999', '22222222222222', 2, '2019-12-20 19:46:27', 2),
(3, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(4, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(5, 'How To Create A Fashion Blog Online', 'After enjoying much success online, Style.com ventured into print media in 2012. Like many magazines in the print publishing world, however, the endeavor was difficult to sustain.', 1, '2019-12-20 19:48:56', 0),
(6, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(7, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(8, '888', '22222222222222', 1, '2019-12-20 19:48:56', 1),
(9, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(10, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(12, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(13, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(14, 'How To Create A Fashion Blog Online', 'After enjoying much success online, Style.com ventured into print media in 2012. Like many magazines in the print publishing world, however, the endeavor was difficult to sustain.', 1, '2019-12-20 19:48:56', 0),
(15, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(16, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(17, 'How To Create A Fashion Blog Online', 'After enjoying much success online, Style.com ventured into print media in 2012. Like many magazines in the print publishing world, however, the endeavor was difficult to sustain.', 1, '2019-12-20 19:48:56', 0),
(18, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(19, 'Battle of Website Builders: Wix vs. SiteBuilder', 'Launching a new website is now easier than ever thanks to do-it-yourself website builders', 1, '2019-12-20 19:49:39', 0),
(20, 'How To Create A Fashion Blog Online', 'After enjoying much success online, Style.com ventured into print media in 2012. Like many magazines in the print publishing world, however, the endeavor was difficult to sustain.', 1, '2019-12-20 19:48:56', 0),
(21, '10 Ways to Promote Your Website', 'How do you get more exposure for your website and make it bear fruit for your business? Let’s take a look at 10 steps you can take to help increase traffic and engagement.', 1, '2019-12-20 19:46:27', 0),
(22, '55555555rrrrrrr5555555555', '22222222222222', 2, '2020-09-09 20:37:06', 1),
(23, 'titlebbbbbbbbbbbbbbbb', 'description4444444', 1, '2020-09-09 22:48:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL COMMENT '0 user  1 admin',
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `f_name`, `l_name`, `phone`, `email`, `password`, `created_at`) VALUES
(1, 0, 'Eman', 'Etman', '01007132399', 'eman@gmail.com', '$2y$10$W2aSxGHdO4oKYSTnmDSFPenfKk8mZdPWkCiz2ArwQL349kN1Xd0dS', '2020-09-09 21:59:31'),
(2, 1, 'admin', 'admin', '01007132399', 'admin@gmail.com', '$2y$10$1YoaDftIzTlk3T54i8qIqe1PPXSlCjyRhI3ubRLlfYu2JUHwC99Ue', '2020-09-09 21:59:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
