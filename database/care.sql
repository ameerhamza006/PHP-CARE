-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 01:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `Appointment_date` varchar(50) NOT NULL,
  `Appointment_time` varchar(50) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `Appointment_date`, `Appointment_time`, `doctor_id`, `user_id`, `date`) VALUES
(2, 'Nabeel', 'khan', 'azeeshamalik@gmail.com', '0391234567', 'mandiya', 'Islamabad', 'AL', '2345', '02/07/2021', '4:38 PM', '8', '12', '2021-02-07 08:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `user_id`, `date`) VALUES
(1, '04:00 - 17:08', '02:08 - 17:08', '02:08 - 17:08', '02:08 - 17:08', '02:08 - 17:08', '02:08 - 17:08', '02:08 - 17:08', '8', '2021-02-03 11:04:01'),
(3, ' - ', ' - ', '10:48 - 12:50', ' - ', ' - ', ' - ', ' - ', '9', '2021-02-03 15:46:19'),
(4, '13:40 - 17:45', ' - ', ' - ', ' - ', ' - ', ' - ', ' - ', '10', '2021-02-05 19:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `bio`, `image`, `user_id`, `date`) VALUES
(1, 'Birthday Bash', 'As you do so, imagine that when you choose to make that decision that deep inside your mind you are switching off the alternative path, you are switching off the opportunity to drift back to that place. Then step out and take your future path. Absorb yourself in the sensations, the feelings, the sights, the sounds and of course continue to engage in your future the way I have discussed in previous articles on this blog.\r\n\r\nWhat is the exact sequence of events that will take you to where you want to be? Have a think consciously of what you need to do. Every outcome begins with the first step. When you decide you want to have a romantic meal for two, there are many steps that you need to perform in order for that to happen.', 'banner1.jpg', '8', '2021-02-03 18:30:29'),
(3, 'A Professional website design is the need of the modern world.', 'As you do so, imagine that when you choose to make that decision that deep inside your mind you are switching off the alternative path, you are switching off the opportunity to drift back to that place. Then step out and take your future path. Absorb yourself in the sensations, the feelings, the sights, the sounds and of course continue to engage in your future the way I have discussed in previous articles on this blog. What is the exact sequence of events that will take you to where you want to be? Have a think consciously of what you need to do. Every outcome begins with the first step. When you decide you want to have a romantic meal for two, there are many steps that you need to perform in order for that to happen.', 'blog1-2.jpg', '8', '2021-02-07 20:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(4, 'Islamabad'),
(6, 'Alipur'),
(7, 'Ali Khan Abad'),
(10, 'Abbottabad');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_feedback`
--

CREATE TABLE `doctor_feedback` (
  `id` int(11) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_feedback`
--

INSERT INTO `doctor_feedback` (`id`, `feedback`, `doctor_id`, `user_id`, `date`) VALUES
(1, 'this doctor is really good ', '10', '27', '2021-02-09 11:15:57'),
(2, 'sdfghjk', '10', '27', '2021-02-09 11:35:45'),
(3, 'very good doctor', '10', '15', '2021-02-10 12:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`, `company`, `user_id`) VALUES
(2, 'gull.zahid', 'gull.zahid123', 'gull_zahid321', 'gull_zahid432', 'www.goodle.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `specialitie_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `specialitie_name`) VALUES
(2, 'Heart'),
(3, 'Dentist'),
(5, 'Hair Transplant'),
(6, 'Eye'),
(7, 'General Surgeon');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `specialistname` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `bio` longtext NOT NULL,
  `password` varchar(500) NOT NULL,
  `roller` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `image`, `cityname`, `state`, `zip`, `specialistname`, `experience`, `bio`, `password`, `roller`, `date`, `modify_date`) VALUES
(8, 'zahid ahmad', 'khan', 'zahid123@gmail.com', '3142056597', 'Bin Qasim Town', 'personnel4.jpg', 'Karachi', 'Punjab', '24700', 'Heart', '										8 Years', 'heloooooooooooooo', 'zahid123', 'Doctor', '2021-02-02 16:58:01', '2021-02-05 18:26:42'),
(9, 'Nabeel', 'Ahmad', 'nabeel123@gmail.com', '3142056597', 'Bin Qasim Town', 'album2.jpg', 'Karachi', 'Punjab', '24700', 'Eye', '									5 Years', 'wertyuiopoiuytrewwe', 'nabeel123', 'Doctor', '2021-02-02 16:55:29', '2021-02-05 18:27:02'),
(10, 'Azeesha', 'Malik', 'azeeshamalik@gmail.com', '0391234567', 'mandiya', 'member-4.jpg', 'Abbottabad', 'KPK', '2345', 'Heart', '	2 Years', 'There is really no magic to it and it’s not reserved only for a select few people. As such, success really has nothing to do with luck, coincidence or fate. It really comes down to understanding the steps in the process and then executing on those steps.', 'azeesha123', 'Doctor', '2021-02-05 11:14:29', '2021-02-06 00:38:05'),
(11, 'Danish', 'Raja', 'danishraja@gmail.com', '03456765432', 'Abdullah goth bin qasim town', 'avatar-4.jpg', 'Alipur', 'malir', '66790', 'Dentist', '	1 Years', 'There is really no magic to it and it’s not reserved only for a select few people. As such, success really has nothing to do with luck, coincidence or fate. It really comes down to understanding the steps in the process and then executing on those steps. There is really no magic to it and it’s not reserved only for a select few people. As such, success really has nothing to do with luck, coincidence or fate. It really comes down to understanding the steps in the process and then executing on those steps.', 'danish123', 'Doctor', '2021-02-05 11:17:24', '2021-02-05 18:24:27'),
(12, 'moiz', 'khan', 'moiz@gmail.com', '03234567898', 'Johar more', '', 'Karachi', 'malir', '1234', '', '', '', 'moiz123', 'User', '2021-02-06 11:49:48', NULL),
(15, 'jahangir', 'khan', 'jahan@gmail.com', '03912345567', 'Sadar', 'Null', 'Islamabad', 'AL', '2345', 'Null', 'Null', 'Null', 'jan123', 'User', '2021-02-07 10:39:12', NULL),
(27, 'Irfan', 'Ahmad', 'irfan@gmail.com', '10391234567', 'Abdullah goth bin qasim town', 'Null', 'Karachi', 'AR', '2365', 'Null', 'Null', 'Null', 'irfan123', 'User', '2021-02-07 13:06:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
