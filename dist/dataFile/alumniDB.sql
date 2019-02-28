-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 12:44 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(6) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone_type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `password` varchar(25) NOT NULL,
  `password_repeat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `user_image`, `first_name`, `last_name`, `phone`, `phone_type`, `email`, `address1`, `address2`, `city`, `state`, `zipcode`, `password`, `password_repeat`) VALUES
(1, '', 'John', 'Doe', '123-456-7895', 'cell', 'johndoe@gmail.com', '123 Main St.', 'null', 'Saint Paul', 'Minnesota', 55100, 'abc123', 'abc123'),
(3, 'g8.jpg', 'Harry', 'Potter', '432-589-3753', 'work', 'harry@potter.com', '9332 Pike St.', '7944 Mike St.', 'Duluth', 'Minnesota', 65325, 'wizard123', 'wizard123'),
(4, '', 'Thomas', 'Jefferson', '256-971-3278', 'home', 'thomas.jefferson@hotmail.com', '3291 New Creek Road', '', 'Huntsville', 'Alabama', 35806, 'thomas123', 'thomas123'),
(5, 'c6.jpg', 'Abraham', 'Lincoln', '708-451-9752', 'cell', 'abraham@lincoln.gov', '3677 Hog Camp Road', 'White House', 'Hog Camp Road', 'Illinois', 60062, '', ''),
(6, '', 'Goerge', 'Washington', '315-566-5723', 'cell', 'goerge.washington@metrostate.edu', '46 Gandy Street', '', 'Potsdam', 'New York', 13676, 'goerge123', 'goerge123'),
(7, '', 'Peter', 'Parker', '816-227-8660', 'home', 'peter@parker.come', '4204 Nutter Street', '', 'Edgerton', 'Missouri', 64444, 'peter123', 'peter123'),
(8, '', 'John', 'Jones', '313-938-5836', 'cell', 'john.jone@hotmail.com', '1140 Wildrose Lane', '', 'Detroit', 'Michigan', 48219, 'john123', 'john123'),
(9, '', 'Michael', 'Jordan', '802-618-9736', 'home', 'michael.jordan@yahoo.com', '3062 Selah Way', '', 'Brattleboro', 'Vermont', 5301, 'michael123', 'michael123'),
(10, '', 'Cindy', 'Firman', '516-461-3134', 'home', 'cidy@firman.com', '3301 Stanley Ave', '', 'Garden City', 'New York', 11530, 'cindy123', 'cindy123'),
(11, '', 'Morgan', 'Vance', '443-942-1846', 'home', 'morgan.vance@gmail.com', '940 Hickory Heights Drive', '', 'Columbia', 'Maryland', 21045, 'morgan123', 'morgan123'),
(12, '', 'Hue', 'Chow', '713-644-1812', 'home', 'hue.chow@gmail.com', '', '', 'Houston', 'Texas', 77087, 'hue123', 'hue123'),
(13, '', 'Jackie', 'Chan', '318-206-5929', 'cell', 'jackie.chan@yahoo.com', '3924 August Lane', '', 'Alexandria', 'Louisiana', 71301, 'jackie123', 'jackie123'),
(14, '', 'Sean', 'Simon', '308-236-7378', 'home', 'sean.simon@yahoo.com', '2624 Romrog Way', '', 'Kearney', 'Nebraska', 68847, 'sean123', 'sean123'),
(15, '', 'Rona', 'Burns', '682-626-1448', 'home', 'rona.burns@hotmail.com', '2834 Sycamore Circle', '', 'Dallas', 'Texas', 75207, 'rona123', 'rona123'),
(17, '', 'Cody', 'Humes', '5647834573', 'home', 'cody.humes@yahoo.com', '134 Mendallas', '', 'Storm Lake', 'Iowa', 56374, 'cody123', 'cody123'),
(18, '', 'Hilary', 'Clintin', '8972318283', 'home', 'hilary.clintin@gmail.com', '128 German Ave N', '', 'Fresno', 'California', 89231, 'hilary123', 'hilary123'),
(19, '', 'James', 'King', '8322813847', 'home', 'james.king@yahoo.com', '235 Mendota Ave E', '', 'St. Paul', 'Minnesota', 83523, 'james123', 'james123'),
(20, '', 'Sonya', 'Cage', '2358923182', 'home', 'sonya.cage@gmail.com', '375 Blain Ave S', '', 'Blain', 'Minnesota', 32715, 'sonya123', 'sonya123'),
(21, '', 'Hamline', 'Joice', '8381234832', 'home', 'hamline.joice@gmail.com', '343 Jones Ave W', '', 'Brooklyn Center', 'Minnesota', 74732, 'hamline123', 'hamline123'),
(22, '', 'Hamline', 'Joice', '8381234832', 'home', 'hamline.joice@gmail.com', '343 Jones Ave W', '', 'Brooklyn Center', 'Minnesota', 74732, 'hamline123', 'hamline123'),
(23, '', 'Jake', 'Spain', '8342231122', 'cell', 'jake.spain@hotmail.com', '232 Kilo Ave N', '', 'North Dale', 'Minnesota', 5321, 'jake123', 'jake123'),
(24, '', 'Yuko', 'Lawrance', '8351238342', 'cell', 'yuko.lawrance@gmail.com', '754 Norway Ave E', '', 'Fresno', 'California', 47322, 'yuko123', 'yuko123'),
(27, '', 'Mary', 'Lane', '2333482931', 'cell', 'mary.lane@gmail.com', '573 Maryland Ave E', '', 'St. Paul', 'Minnesota', 12873, 'mary123', 'mary123'),
(28, '', 'Larry', 'Johnson', '7862348273', 'home', 'larry.johnson@gmail.com', '735 Normandale Ave W', '', 'Washington D.C', 'California', 83461, 'larry123', 'larry123'),
(31, '', 'Katie', 'Khan', '7562938291', 'home', 'katie.khan@yahoo.com', '643 Utah', '', 'Highlander', 'Mexico', 63471, 'katie123', 'katie123'),
(32, '', 'Tak', 'Vahn', '7532341283', 'cell', 'tak.vahn@hotmail.com', '748 Model Ave E', '', 'Gregs', 'California', 83426, 'tak123', 'tak123'),
(33, 'c2.jpg', 'Billy', 'Jefferson', '8763258293', 'home', 'billy.jefferson@metrostate.edu', '382 Hollywood Ave N', '', 'Norway', 'St. Paul', 72838, 'billy123', 'billy123'),
(34, '', 'Joe', 'Liban', '7484831832', 'home', 'joe.liban@gmail.com', '834 Hyoet Ave E', '', 'San Diego', 'California', 78236, 'joe123', 'joe123'),
(35, '', 'Greg', 'Vain', '7538929283', 'home', 'greg.vain@yahoo.com', '8392 Marvelous', '', 'Green Bay', 'Wisconsin', 83924, 'greg123', 'greg123'),
(47, 'feature-img3.jpg', 'Blane', 'King', '7433438572', 'home', 'blane.king@hotmail.com', '343 Ion Ave E', '', 'Bostin', 'Carolina', 83427, '$2y$10$ZnF1c6WKi8xgVPmiE5', '$2y$10$V9.FyZN/opGXLr.x4N'),
(53, 'a2.jpg', 'Jangos', 'Jung', '7832834382', 'cell', 'jango.jung@gmail.com', '892 Mount Ave E', '', 'Sanfrancisco', 'California', 78329, '', ''),
(54, '', 'Hicks', 'Clam', '7823482934', 'home', 'hicks.clam@gmail.com', '675 View', '', 'Chico', 'California', 748394, '$2y$10$AG2Cvm87qSLo3AanvJ', '$2y$10$5ruFriYBkCFrAhH3uv'),
(74, 'blog-home-banner.jpg', 'ut', 'Dihn', '8932832389', 'home', 'ut.dihn@gmail.com', '893 Hazelwood', '', 'St. Paul', 'Minnesota', 55106, '$2y$10$BirPY8q2K6N0FdjMz0', '$2y$10$zNlAgOhd/Ym3B3oPqK');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `alumni_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `alumni_id`) VALUES
(2, 'b3.jpg', '2018-11-29 19:49:22', '1', 1),
(4, 'g3.jpg', '2018-11-29 19:49:22', '1', 1),
(12, 'b1.jpg', '2018-11-29 20:42:24', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(12) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `type`) VALUES
(1, 'Site', 'Admin', 'Admin@ams.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', '357a6fdf7642bf815a88822c447d9dc4', 1, 'Admin'),
(2, 'Jango', 'Jung', 'jango.jung@gmail.com', '$2y$10$Tz2Keya5IQM4I/iUjOYBcOuuXtEHXhCKi6/CQb.3Bn8OTiotHt0JG', 'a2557a7b2e94197ff767970b67041697', 0, 'Customer'),
(3, 'Hicks', 'Clam', 'hicks.clam@gmail.com', '$2y$10$AG2Cvm87qSLo3AanvJ1myeqjBd576Bo3FHacmNqwq0x4GVLjXGlfS', '846c260d715e5b854ffad5f70a516c88', 0, 'Customer'),
(23, 'ut', 'Dihn', 'ut.dihn@gmail.com', '$2y$10$BirPY8q2K6N0FdjMz0Dg7eU1DpFRPyATW8m0bbvppZeQUI5VVEkOW', '2ca65f58e35d9ad45bf7f3ae5cfd08f1', 0, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
