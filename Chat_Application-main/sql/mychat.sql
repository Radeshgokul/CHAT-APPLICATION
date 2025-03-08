-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 07:31 PM
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
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_status_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_status_id`, `comment`, `date`) VALUES
(107, 17, '', '0000-00-00 00:00:00'),
(108, 17, '', '0000-00-00 00:00:00'),
(109, 17, '', '0000-00-00 00:00:00'),
(110, 17, '', '0000-00-00 00:00:00'),
(111, 17, '', '0000-00-00 00:00:00'),
(112, 17, '', '0000-00-00 00:00:00'),
(113, 17, '', '0000-00-00 00:00:00'),
(114, 17, '', '0000-00-00 00:00:00'),
(115, 17, '', '0000-00-00 00:00:00'),
(116, 17, '', '0000-00-00 00:00:00'),
(117, 21, '', '0000-00-00 00:00:00'),
(118, 17, '', '0000-00-00 00:00:00'),
(119, 17, '', '0000-00-00 00:00:00'),
(120, 17, '', '0000-00-00 00:00:00'),
(121, 17, '', '0000-00-00 00:00:00'),
(122, 17, '', '0000-00-00 00:00:00'),
(123, 14, '', '0000-00-00 00:00:00'),
(124, 14, '', '0000-00-00 00:00:00'),
(125, 14, '', '0000-00-00 00:00:00'),
(126, 14, '', '0000-00-00 00:00:00'),
(127, 23, '', '0000-00-00 00:00:00'),
(128, 17, '', '0000-00-00 00:00:00'),
(129, 17, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `imgs` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` datetime(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `user_status_id`, `imgs`, `text`, `time`) VALUES
(1, 0, '99009-bcg-0-.jpg', 'nvjfnjk', '0000-00-00 00:00:00.0000'),
(2, 0, '54253-bcg-5-.jpg', '', '0000-00-00 00:00:00.0000'),
(3, 0, '68163-bcg-8-.jpg', '', '0000-00-00 00:00:00.0000'),
(4, 0, '75769-bcg-7.jpg', '', '0000-00-00 00:00:00.0000'),
(31, 14, '34821-img-20181021-wa0000.jpg', '', '2020-01-03 21:03:19.0000'),
(32, 14, '49869-img-20181204-wa0007.jpg', '', '2020-01-03 21:03:19.0000'),
(33, 14, '56381-img-20181205-wa0001.jpg', '', '2020-01-03 21:03:19.0000'),
(34, 14, '47232-img-20181201-wa0000.jpg', '', '2020-01-03 21:03:19.0000'),
(35, 14, '51266-204405-copy.jpg', '', '2020-01-03 21:03:19.0000'),
(36, 14, '73340-img-20181123-wa0014.jpg', '', '2020-01-03 21:03:19.0000'),
(38, 14, '12629-bcg-7.jpg', '', '2020-01-03 21:03:19.0000'),
(41, 13, '33133-bcg-5-.jpg', '', '2020-01-04 06:45:37.0000'),
(43, 13, '47514-204405-copy.jpg', '', '2020-01-04 06:45:37.0000'),
(44, 13, '37906-bcg-8-.jpg', '', '2020-01-04 06:45:37.0000'),
(45, 13, '31918-bcg-0-.jpg', '', '2020-01-04 06:45:37.0000'),
(54, 12, '15196-bcg-5-.jpg', '', '2020-01-06 09:49:29.0000'),
(55, 12, '50034-img-20181021-wa0000.jpg', '', '2020-01-06 09:49:29.0000'),
(61, 17, '5246-bcg-5-.jpg', '', '2020-02-01 21:05:50.0000'),
(63, 17, '99685-img-20181021-wa0000.jpg', '', '2020-02-01 21:05:50.0000'),
(65, 17, '46019-5546b0ad-61b9-44cb-8f45-a971185757ec.jfif', '', '2020-02-01 21:05:50.0000'),
(67, 17, '74072-aa8d5ec2cad9295703de3692c37c0845.jpg', '', '2020-02-01 21:05:50.0000'),
(68, 17, '76448-aa8d5ec2cad9295703de3692c37c0845.jpg', '', '2020-02-01 21:05:50.0000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_location` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_location`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(14, 'pasindu', 'pasindupass', 'pasindu@gmail.com', 'images/IMG-20181021-WA0000.jpg.34', '', '', '', 'offline'),
(17, 'prasanna', 'sampath1234', 'sampath@gmail.com', 'images/download.jpg', 'ampara', 'male', 'isuru', 'offline'),
(18, 'dbfhff', 'dbfmfnsbdhfh', 'nfbmff@gmail.com', 'images/download.jpg', 'ampara', 'male', '', ''),
(20, ' nwfbkh', 'fwkhbfherfbhkr', 'jwkfn@gmail.com', 'images/download.png', 'nuwara eliya', 'female', '', ''),
(21, 'Kavindu', '123454321', 'kavi@gmail.com', 'images/download.png', 'colombo', 'male', '', 'offline'),
(22, 'isuru', 'isurupass', 'isuru@gmail.com', 'images/download.png', 'mullaitivu', 'female', '', 'offline'),
(23, '', '', '', '', '', '', 'isuru', ''),
(24, 'djkhjd', 'jjkerfbkrje', 'njkj@gmail.com', 'images/download.png', 'mannayama', 'female', '', ''),
(25, 'jbhhsj', 'nskvjkfbvjfbvkjh', 'dsjvbhj@gmail.com', 'images/download.jpg', 'kurunagala', 'female', '', ''),
(26, 'hewjbjwh', 'hbewjbfefghwfgkyg', 'hewkh@gmail.com', 'images/download.png', 'mullaitivu', 'female', '', ''),
(27, '', '12345678', 'damith@gmail.com', 'images/download.png', 'ampara', 'male', '', ''),
(28, 'qqq', '22222222', 'qqq@gmail.com', 'images/download.jpg', 'kilinotchi', 'female', '', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `users_chats`
--

CREATE TABLE `users_chats` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` int(11) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chats`
--

INSERT INTO `users_chats` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(91, 'Kavindu', 'pasindu', 'bye', 0, '2020-01-08 05:53:10'),
(92, 'Kavindu', 'pasindu', 'bye', 0, '2020-01-08 05:53:22'),
(93, 'Kavindu', 'pasindu', 'bye', 0, '2020-01-08 05:53:45'),
(94, 'prasanna', 'pasindu', 'njerwk', 0, '2020-01-14 06:40:29'),
(95, 'prasanna', 'pasindu', 'njerwk', 0, '2020-01-14 06:40:33'),
(100, 'prasanna', 'isuru', 'njkfrnkrjfnkjrwef', 0, '2020-01-23 22:02:55'),
(101, 'prasanna', 'isuru', 'njkfrnkrjfnkjrwef', 0, '2020-01-23 22:03:00'),
(102, 'prasanna', 'isuru', 'bhjwbfhj', 0, '2020-01-23 22:03:06'),
(103, 'isuru', 'prasanna', 'jnfdkjlnvjjf', 0, '2020-01-23 22:06:59'),
(104, 'isuru', 'prasanna', 'jnfdkjlnvjjf', 0, '2020-01-23 22:07:09'),
(105, 'isuru', 'prasanna', 'hbbwh', 0, '2020-01-23 22:07:17'),
(106, 'isuru', 'prasanna', 'hbbwh', 0, '2020-01-23 22:07:19'),
(107, 'prasanna', 'prasanna', 'hgsgdh', 0, '2020-01-24 07:05:25'),
(108, 'prasanna', 'prasanna', 'hgsgdh', 0, '2020-01-24 07:05:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chats`
--
ALTER TABLE `users_chats`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users_chats`
--
ALTER TABLE `users_chats`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
