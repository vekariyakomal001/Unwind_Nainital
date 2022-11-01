-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 03:45 PM
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
-- Database: `unwind_nainital`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `activity_description` longtext NOT NULL,
  `notes` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `activity_activation` tinyint(1) NOT NULL,
  `time_slots` longtext NOT NULL,
  `ride_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`, `main_image`, `activity_description`, `notes`, `price`, `activity_activation`, `time_slots`, `ride_quantity`) VALUES
(33, 'NewActivity111', 'images/fullscreen-slider-2-100x50.jpg', 'bhhb', 'bmb', 123, 0, '08:00 AM  to  10:00 AM,', 11),
(40, 'hey1', 'images/UXNP2930.JPG', 'cdse', 'cedcs', 4444, 1, '06:00 PM to 08:00 PM,', 18),
(41, 'komal', 'images/IMG_0008.JPG', 'rthdfg', 'vd', 1000, 1, '08:00 AM  to  10:00 AM,06:00 PM to 08:00 PM,', 16);

-- --------------------------------------------------------

--
-- Table structure for table `activity_extra_images`
--

CREATE TABLE `activity_extra_images` (
  `activity_extra_images_id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_extra_images`
--

INSERT INTO `activity_extra_images` (`activity_extra_images_id`, `image_path`, `activity_id`) VALUES
(26, 'images/home_indoor_trainer.jpg', 33),
(27, 'images/home_indoor_trainer.jpg', 33),
(28, 'images/home_indoor_trainer.jpg', 33),
(48, 'images/IMG_0160.JPG', 40),
(49, 'images/IMG_0160.JPG', 40),
(50, 'images/IMG_0160.JPG', 40),
(51, 'images/IMG_0160.JPG', 40),
(52, 'images/IMG_0160.JPG', 40),
(53, 'images/IMG_0096.JPG', 41),
(54, 'images/IMG_0117.JPG', 41),
(55, 'images/IMG_0128.JPG', 41),
(56, 'images/IMG_0137.JPG', 41),
(57, 'images/IMG_0160.JPG', 41);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `maker_id` int(11) NOT NULL,
  `maker_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_email` varchar(50) NOT NULL,
  `password_reset_token1` varchar(50) NOT NULL,
  `password_reset_token2` longtext NOT NULL,
  `password_reset_expires` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`password_reset_id`, `password_reset_email`, `password_reset_token1`, `password_reset_token2`, `password_reset_expires`) VALUES
(30, 'rushimkheni.xm@gmail.com', 'a9dde45a3485e51c', '$2y$10$wDUNYtQpLocomNXhueqzz.5akephoa0/de1pt47HdppbmxS8JE9DS', '1648499909'),
(64, 'nirali@gmail.com', '95b8b5c8e8ce98a0', '$2y$10$j2FUSQW6IWB2OOX8IP9vwOGMEkTTLzvfIGCLK278d6tVi4shN6z9G', '1648778478'),
(65, 'unnatipatel098@gmail.com', 'a0a01457f4365536', '$2y$10$.jC58NWBEHSZzDx48PwZMO5oagCrJVKW9I/8a2R.p9b.UoEv9136u', '1648832305'),
(66, '14mscit092gmaicom', 'a19ea63a3f15f35a', '$2y$10$Jb9f3zz91XxQic0XnAiti.Kug9BAK5OPiBae6mL9IF4CLIFc8Lete', '1648949539'),
(67, '14mscit092@gmaicom', '52f14a0282d05d23', '$2y$10$ZfeGgHyT8UrXLmEED7lLruiihJgfh82BPSQJdpZ22p60z8hCL5Tmq', '1648949554'),
(68, 'jenish@gmai.com', '0fb82e6f84208850', '$2y$10$Rlz34SHi9hoJ0gwERckmD.HvtV9xOI0.4XxOTTjlypfbAOB4PvDJS', '1649302343'),
(72, 'pargol@gmail.com', '3ed70cdc77b21e00', '$2y$10$JjjEQ69wt7/v5XDppa4P7.KxoQxntt/aaoMAddX3tK2m53EUW44kC', '1650463286'),
(83, 'vekariakomal001@gmail.com', '83a4689587455e5f', '$2y$10$5FIVu9oThh2lWAK1voQWp.moAf9i0xMVsc0ek9fiavSMlT7Eyw0Na', '1660844035'),
(84, '14mscit092@gmail.com', '26505def6c988b89', '$2y$10$VphLef98H/sN2GdOPpHLqO4bx568n0/6vWJ/.By3IZ1z68gFwXtWW', '1666210612');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `register_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`register_id`, `fname`, `lname`, `email_id`, `phone`, `gender`, `user_password`, `user_role_id`, `status`) VALUES
(1, 'Komal', 'Vekariya', 'vekariakomal001@gmail.com', '9924739113', 'female', '17komal1997', 1, 1),
(22, 'Jenish', 'Vekariya', 'jenish@gmai.com', '4387254546', 'Male', 'Jenish@123', 2, 1),
(23, 'Khyati', 'Sodvadiya', 'khyati@gmai.co', '9897898767', 'Female', 'Khyati@123', 2, 1),
(24, 'Vandu', 'Vekariya', 'vandu@gma.co', '9999999999', 'Undefined', 'Vandu@123', 2, 1),
(25, 'Rushi', 'Kheni', '14mscit092@gmail.com', '9876876789', 'Female', 'Shivangi@123', 2, 1),
(26, 'Darshan', 'Kotadiya', 'darshan@gmail.com', '4387254546', 'Male', 'Darshan@123', 2, 0),
(27, 'pargol', 'poshtareh', 'pargol@gmail.com', '4387254546', 'Female', 'Pargol123!', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `activity_extra_images`
--
ALTER TABLE `activity_extra_images`
  ADD PRIMARY KEY (`activity_extra_images_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`maker_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`register_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `activity_extra_images`
--
ALTER TABLE `activity_extra_images`
  MODIFY `activity_extra_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `maker_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_extra_images`
--
ALTER TABLE `activity_extra_images`
  ADD CONSTRAINT `activity_id` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`activity_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`user_role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
