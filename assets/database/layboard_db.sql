-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 06:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(1, 'E-Commerce', 'E-Commerce', 1),
(2, 'Mobile Application', 'Mobile Application', 1),
(3, 'Web Application', 'Web Application', 1),
(4, 'Logo Design', 'Logo Design', 1),
(5, 'Website Design', 'Website Design', 1),
(6, 'Graphic Design', 'Graphic Design', 1),
(7, 'Visual Presentation', 'Visual Presentation', 1),
(8, 'Photography', 'Photography', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` bigint(20) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` bigint(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `employer_pass` varchar(255) NOT NULL,
  `employer_slug` varchar(20) NOT NULL,
  `employer_code` varchar(8) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `email_address`, `employer_pass`, `employer_slug`, `employer_code`, `date_created`) VALUES
(1, 'allentubo09@yahoo.com', 'b296ea317be4df34fdee0ef91b903f77', '4np8gh3hjqkxoyprluy9', 'tcas6cie', '2020-02-09'),
(2, 'aevinearl@gmail.com', 'ddc58e55e4ee672b73d9c1107cd927cc', 'clydhbbovbhl9yvhi2th', '781w89hr', '2020-09-19'),
(3, 'aevinearl@gmail.com', 'ddc58e55e4ee672b73d9c1107cd927cc', '2jh1iuz5e7v12ejnqlq6', 'vvvb6oq4', '2020-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `employers_images`
--

CREATE TABLE `employers_images` (
  `employer_image_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_slug` varchar(24) NOT NULL,
  `image_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers_images`
--

INSERT INTO `employers_images` (`employer_image_id`, `employer_id`, `file_name`, `file_slug`, `image_status`) VALUES
(1, 1, '1581419559.png', 'c3cz9ulirbpzgn5p76yp4zbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employers_info`
--

CREATE TABLE `employers_info` (
  `employers_info_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers_info`
--

INSERT INTO `employers_info` (`employers_info_id`, `employer_id`, `firstname`, `lastname`, `contact_no`, `gender`) VALUES
(1, 1, 'Allen Christian', 'Tubo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employers_status`
--

CREATE TABLE `employers_status` (
  `employer_status_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `verification_status` int(1) NOT NULL,
  `activation_status` int(1) NOT NULL,
  `online_status` int(1) NOT NULL,
  `profile_status` int(1) NOT NULL,
  `payment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers_status`
--

INSERT INTO `employers_status` (`employer_status_id`, `employer_id`, `verification_status`, `activation_status`, `online_status`, `profile_status`, `payment_status`) VALUES
(1, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `freelancer_id` bigint(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `freelancer_pass` varchar(255) NOT NULL,
  `freelancer_slug` varchar(20) NOT NULL,
  `freelancer_code` varchar(8) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`freelancer_id`, `email_address`, `freelancer_pass`, `freelancer_slug`, `freelancer_code`, `date_created`) VALUES
(1, 'allentubo09@gmail.com', 'b296ea317be4df34fdee0ef91b903f77', '29lcuhfr4pbtowi8km1e', 'bhx1wdqq', '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_education`
--

CREATE TABLE `freelancers_education` (
  `freelancer_education_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `area_of_study` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `date_attended_from` date NOT NULL,
  `date_attended_to` date NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_employment`
--

CREATE TABLE `freelancers_employment` (
  `freelancer_employment_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location_city` varchar(255) NOT NULL,
  `location_country` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `period` date NOT NULL,
  `through` date NOT NULL,
  `employment_status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `freelancer_employment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_images`
--

CREATE TABLE `freelancers_images` (
  `freelancer_image_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_slug` varchar(24) NOT NULL,
  `image_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancers_images`
--

INSERT INTO `freelancers_images` (`freelancer_image_id`, `freelancer_id`, `file_name`, `file_slug`, `image_status`) VALUES
(1, 1, '1581419559.png', 'c3cz9ulirbpzgn5p76yp4zbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_info`
--

CREATE TABLE `freelancers_info` (
  `freelancers_info_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancers_info`
--

INSERT INTO `freelancers_info` (`freelancers_info_id`, `freelancer_id`, `firstname`, `lastname`, `contact_no`, `gender`) VALUES
(1, 1, 'Allen Christian', 'Tubo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_rating`
--

CREATE TABLE `freelancers_rating` (
  `freelancer_rating_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `rating_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancers_rating`
--

INSERT INTO `freelancers_rating` (`freelancer_rating_id`, `freelancer_id`, `rating`, `rating_status`) VALUES
(1, 1, 5, 1),
(2, 1, 3, 1),
(3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_skills`
--

CREATE TABLE `freelancers_skills` (
  `freelancer_skill_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `skill_id` bigint(20) NOT NULL,
  `freelancer_skill_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_status`
--

CREATE TABLE `freelancers_status` (
  `freelancer_status_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `verification_status` int(1) NOT NULL,
  `activation_status` int(1) NOT NULL,
  `online_status` int(1) NOT NULL,
  `profile_status` int(1) NOT NULL,
  `payment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancers_status`
--

INSERT INTO `freelancers_status` (`freelancer_status_id`, `freelancer_id`, `verification_status`, `activation_status`, `online_status`, `profile_status`, `payment_status`) VALUES
(1, 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `category_id`, `skill_name`, `skill_status`) VALUES
(1, 2, 'Java', 1),
(2, 2, 'Kotlin', 1),
(3, 3, 'JavaScript', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `employers_images`
--
ALTER TABLE `employers_images`
  ADD PRIMARY KEY (`employer_image_id`);

--
-- Indexes for table `employers_info`
--
ALTER TABLE `employers_info`
  ADD PRIMARY KEY (`employers_info_id`);

--
-- Indexes for table `employers_status`
--
ALTER TABLE `employers_status`
  ADD PRIMARY KEY (`employer_status_id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`freelancer_id`);

--
-- Indexes for table `freelancers_education`
--
ALTER TABLE `freelancers_education`
  ADD PRIMARY KEY (`freelancer_education_id`);

--
-- Indexes for table `freelancers_employment`
--
ALTER TABLE `freelancers_employment`
  ADD PRIMARY KEY (`freelancer_employment_id`);

--
-- Indexes for table `freelancers_images`
--
ALTER TABLE `freelancers_images`
  ADD PRIMARY KEY (`freelancer_image_id`);

--
-- Indexes for table `freelancers_info`
--
ALTER TABLE `freelancers_info`
  ADD PRIMARY KEY (`freelancers_info_id`);

--
-- Indexes for table `freelancers_rating`
--
ALTER TABLE `freelancers_rating`
  ADD PRIMARY KEY (`freelancer_rating_id`);

--
-- Indexes for table `freelancers_skills`
--
ALTER TABLE `freelancers_skills`
  ADD PRIMARY KEY (`freelancer_skill_id`);

--
-- Indexes for table `freelancers_status`
--
ALTER TABLE `freelancers_status`
  ADD PRIMARY KEY (`freelancer_status_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers_images`
--
ALTER TABLE `employers_images`
  MODIFY `employer_image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers_info`
--
ALTER TABLE `employers_info`
  MODIFY `employers_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers_status`
--
ALTER TABLE `employers_status`
  MODIFY `employer_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `freelancer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers_education`
--
ALTER TABLE `freelancers_education`
  MODIFY `freelancer_education_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancers_employment`
--
ALTER TABLE `freelancers_employment`
  MODIFY `freelancer_employment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancers_images`
--
ALTER TABLE `freelancers_images`
  MODIFY `freelancer_image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers_info`
--
ALTER TABLE `freelancers_info`
  MODIFY `freelancers_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers_rating`
--
ALTER TABLE `freelancers_rating`
  MODIFY `freelancer_rating_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelancers_skills`
--
ALTER TABLE `freelancers_skills`
  MODIFY `freelancer_skill_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancers_status`
--
ALTER TABLE `freelancers_status`
  MODIFY `freelancer_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
