-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 01:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `user` text NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `firstname`, `lastname`, `contact`, `email`, `password`, `image`, `user`, `skill`) VALUES
(2, 'Michael', 'Gikunda', '0707667909', 'michael@gmail.com', '17b9e1c64588c7fa6419b4d29dc1f4426279ba01', 'pexels-creation-hill-1681010.jpg', 'employer', 'Basketball'),
(3, 'Autumn', 'Falls', '0707667905', 'autumn@gmail.com', '91fb64276c08bb21aded26660f7d81ba92ceea7c', 'pexels-mart-production-9558712.jpg', 'jobseaker', 'Cosmetics'),
(4, 'Ski', 'Bri', '0707667905', 'ski@gmail.com', '03c970b1aded3b0db15f235beaa10ff96753e22b', 'pexels-mart-production-9558603.jpg', 'jobseaker', 'Manicure'),
(8, 'Joe ', 'Biden', '0707667905', 'jonny@gmail.com', '505168e2a88049f340ba715e7f51053c5aa8eb50', 'pexels-shvets-production-7533347.jpg', 'jobseaker', 'Crafts');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date : time` text NOT NULL DEFAULT current_timestamp(),
  `email` text NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `date : time`, `email`, `message`) VALUES
(1, '2023-07-14 14:02:27', 'autumn@gmail.com', 'Love The Site Keep it Up 🤟');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `email` text NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `category` text NOT NULL,
  `video` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `date`, `email`, `title`, `description`, `category`, `video`, `image`) VALUES
(1, '2023-06-30', 'autumn@gmail.com', 'Potery', 'I have been making pots for as long as i can remember am so good at what i do why not give me a chance.', 'Lifestyle', '328,702 Skills Stock Videos and Royalty-Free Footage - iStock.mp4', 'pexels-mart-production-9558712.jpg'),
(3, '2023-06-30', 'ski@gmail.com', 'Dance', 'I am the greatest dancer you will ever meet with. Think of a popular dance i know it. Why not give me a chance to impress you', 'Lifestyle', 'Diverse Group Of Three Professional Dancers Performing A Hip Hop Dance Routine In Front Of A Big Led Wall Screen With Vfx Animation During A Virtual Production In Studio Environment 105 Bpm Song Stock Video - Do.mp4', 'pexels-mart-production-9558603.jpg'),
(5, '2023-06-30', 'autumn@gmail.com', 'Technitian', 'I love making computers its my greatest passion. I have been fixing motherboards from 2016, its a hobby that am good at.', 'Tech', 'istockphoto-1022313298-640_adpp_is.mp4', 'pexels-mart-production-9558712.jpg'),
(6, '2023-06-30', 'jonny@gmail.com', 'Crafter', 'Any thing to do with wood i can do. I have a decade woth of experience in wood work, i once mad an ifel tower scolpture. I will most definiately bring your vission to life.', 'Mechanics', 'Slo Mo Wooden Particles Flying Around As A Piece Of Wood Is Being Chiseled Stock Video - Download Video Clip Now - iStock.mp4', 'pexels-shvets-production-7533347.jpg'),
(7, '2023-07-14', 'autumn@gmail.com', 'Cheff', 'We all love food but not just any food, but sweet food. I am jeff the chef and i will make you the tastiest meal you have ever eaten.', 'Lifestyle', 'chef.mp4', 'pexels-mart-production-9558712.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
