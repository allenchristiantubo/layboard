-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 05:06 PM
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
  `category_description` text NOT NULL,
  `category_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(1, 'Design and Creatives', 'Design and Creatives category focuses on the originality, imaginative, inventive, inspired development of something with artistic elements.', 1),
(2, 'IT and Networking', '', 1),
(3, 'Data Science', '', 1),
(4, 'Software Development', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'tolosacarlo@gmail.com', '66eb5c23445ebf9f5d9cba93f8bf8f09', 'qio2tj3t9e6zef16vbfu', 'lg2704dt', '2020-12-10'),
(3, 'richardgalvez@gmail.com', 'c6a885ab86343f79af59d7770db1313e', 'q3bdiy6uih1hla4jsftl', 'pxxmdzgo', '2020-12-10');

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
(1, 1, '1581419559.png', 'c3cz9ulirbpzgn5p76yp4zbb', 1),
(2, 2, 'default.png', '2nvg4xh29b00et96adxxw45d', 1),
(3, 3, 'default.png', 'n7bjyr5gpf1mntlpiqniwey1', 1);

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
(1, 1, 'Allen Christian', 'Tubo', '', ''),
(2, 2, 'Joseph Carlo', 'Sacapaño', '', ''),
(3, 3, 'Richard', 'Galvez', '', '');

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
(1, 1, 0, 1, 0, 1, 0),
(2, 2, 0, 1, 0, 0, 0),
(3, 3, 0, 1, 0, 0, 0);

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
(1, 'allentubo09@gmail.com', 'b296ea317be4df34fdee0ef91b903f77', '29lcuhfr4pbtowi8km1e', 'bhx1wdqq', '2020-02-08'),
(2, 'aevinearlm@gmail.com', 'ddc58e55e4ee672b73d9c1107cd927cc', 'duu01une1u96j9sopx1v', 'h6re71zn', '2020-12-10'),
(4, 'markparro@gmail.com', '3007b76bf01dc6c5c6980853d37e378e', 'a5i7yw6e5iy4w1yqnapd', 'gv14zz5b', '2020-12-10'),
(5, 'johnlawrence@gmail.com', 'db7a5225840e6ff707ce40391f43059a', 'f8wusz860qtjhtvg6kco', 'wlqr7zyo', '2020-12-10'),
(6, 'asd', '7815696ecbf1c96e6894b779456d330e', 'wc0grro0v77fbantvt1o', 'fu522wme', '2020-12-10'),
(7, 'vicjudan@gmail.com', '628582b820bc42545f31e51fa260670d', '0f18k2mcih937jot06du', '0m3fw9d8', '2020-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_address`
--

CREATE TABLE `freelancers_address` (
  `freelancer_address_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, '1581419559.png', 'c3cz9ulirbpzgn5p76yp4zbb', 1),
(2, 2, 'default.png', 'hku9m9i2q4q5oamw73u5w4ex', 1),
(3, 4, 'default.png', 'vbwkusswm5ybnxjmy0e44en9', 1),
(4, 5, 'default.png', '2uetb7yrk83qbkbyny10bfno', 1),
(5, 6, 'default.png', 'c6etmrhmpv5ia9vc4jgr0hxe', 1),
(6, 7, 'default.png', '2awru3s276z24y5z9o102ebm', 1);

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
(1, 1, 'Allen Christian', 'Tubo', '', ''),
(2, 2, 'Aevin Earl', 'Molina', '', ''),
(3, 4, 'Mark Christan', 'Parro', '', ''),
(4, 5, 'John Lawrence', 'Maines', '', ''),
(5, 6, 'asd', 'asd', '', ''),
(6, 7, 'Victor', 'Judan', '', '');

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

--
-- Dumping data for table `freelancers_skills`
--

INSERT INTO `freelancers_skills` (`freelancer_skill_id`, `freelancer_id`, `skill_id`, `freelancer_skill_status`) VALUES
(1, 1, 4, 1),
(2, 1, 3, 1),
(3, 1, 7, 1),
(4, 1, 6, 1),
(5, 1, 5, 1),
(6, 1, 8, 1),
(7, 1, 2, 1),
(8, 7, 1, 1),
(9, 7, 7, 1),
(10, 7, 6, 1),
(11, 7, 5, 1),
(12, 7, 4, 0),
(13, 7, 3, 0);

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
(1, 1, 0, 1, 0, 0, 0),
(2, 2, 0, 1, 0, 0, 0),
(3, 4, 0, 1, 0, 0, 0),
(4, 5, 0, 1, 0, 0, 0),
(5, 6, 0, 1, 0, 0, 0),
(6, 7, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `specialty_id` bigint(20) NOT NULL,
  `job_slug` varchar(20) NOT NULL,
  `job_code` varchar(8) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `employer_id`, `category_id`, `specialty_id`, `job_slug`, `job_code`, `date_created`) VALUES
(1, 1, 4, 2, '6xhietrcxilmzzae513b', 'zi8t12oe', '2020-12-16 04:30:00'),
(2, 1, 1, 1, 'dyizgy2bmrftt9d0gsho', 'i2xenurm', '2020-12-16 14:43:59'),
(3, 1, 1, 1, 'odhpmewbjrymb2xgscst', 'bvrrs5vf', '2020-12-17 04:51:55'),
(4, 1, 4, 2, 'iacrq691gud2teraccvi', 'ffzin9mg', '2020-12-17 04:53:26'),
(5, 1, 4, 2, 'j6r8l6j4mq81gzsfvqbn', 'cdtpn6ha', '2020-12-17 14:23:46'),
(6, 1, 4, 2, 'tzhkndqytht63204of56', '18zsmc6c', '2020-12-18 23:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_application`
--

CREATE TABLE `jobs_application` (
  `job_application_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `job_application-status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_info`
--

CREATE TABLE `jobs_info` (
  `jobs_info_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_info`
--

INSERT INTO `jobs_info` (`jobs_info_id`, `job_id`, `job_title`, `job_description`, `job_price`) VALUES
(1, 1, 'Web Design for Static Pages', '', 0),
(2, 2, 'aaa', '', 0),
(3, 3, 'try', '', 0),
(4, 4, 'try1', '', 0),
(5, 5, 'try2', '', 0),
(6, 6, 'a', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_status`
--

CREATE TABLE `jobs_status` (
  `job_status_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `freelancer_id` bigint(20) NOT NULL,
  `job_status` int(1) NOT NULL,
  `activation_status` int(1) NOT NULL,
  `payment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_status`
--

INSERT INTO `jobs_status` (`job_status_id`, `job_id`, `employer_id`, `freelancer_id`, `job_status`, `activation_status`, `payment_status`) VALUES
(1, 1, 1, 0, 2, 0, 0),
(2, 2, 1, 0, 2, 0, 0),
(3, 3, 1, 0, 2, 0, 0),
(4, 4, 1, 0, 2, 0, 0),
(5, 5, 1, 0, 2, 0, 0),
(6, 6, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL,
  `province_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `province_name`, `province_status`) VALUES
(1, 'Abra', 1),
(2, 'Agusan del Norte', 1),
(3, 'Agusan del Sur', 1),
(4, 'Aklan', 1),
(5, 'Albay', 1),
(6, 'Antique', 1),
(7, 'Apayao', 1),
(8, 'Aurora', 1),
(9, 'Balisan', 1),
(10, 'Bataan', 1),
(11, 'Batanes', 1),
(12, 'Batangas', 1),
(13, 'Benguet', 1),
(14, 'Biliran', 1),
(15, 'Bohol', 1),
(16, 'Bukidnon', 1),
(17, 'Bulacan', 1),
(18, 'Cagayan', 1),
(19, 'Camarines Norte', 1),
(20, 'Camarines Sur', 1),
(21, 'Camiguin', 1),
(22, 'Capiz', 1),
(23, 'Catanduanes', 1),
(24, 'Cavite', 1),
(25, 'Cebu', 1),
(26, 'Cotobato', 1),
(27, 'Davao de Oro', 1),
(28, 'Davao del Norte', 1),
(29, 'Davao del Sur', 1),
(30, 'Davao Occidental', 1),
(31, 'Davao Oriental', 1),
(32, 'Dinagat Islands', 1),
(33, 'Eastern Samar', 1),
(34, 'Guimaras', 1),
(35, 'Ifugao', 1),
(36, 'Ilocos Norte', 1),
(37, 'Ilocos Sur', 1),
(38, 'Iloilo', 1),
(39, 'Isabela', 1),
(40, 'Kalinga', 1),
(41, 'La Union', 1),
(42, 'Laguna', 1),
(43, 'Lanao del Norte', 1),
(44, 'Lanao del Sur', 1),
(45, 'Leyte', 1),
(46, 'Maguindanao', 1),
(47, 'Marinduque', 1),
(48, 'Masbate', 1),
(49, 'Misamis Occidental', 1),
(50, 'Misamis Oriental', 1),
(51, 'Mountain Province', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` bigint(20) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `skill_status`) VALUES
(1, 'Java', 1),
(2, 'Kotlin', 1),
(3, 'JavaScript', 1),
(4, 'PHP', 1),
(5, 'C#', 1),
(6, 'C++', 1),
(7, 'jQuery', 1),
(8, 'ASP.Net', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `specialty_name` varchar(255) NOT NULL,
  `specialty_description` text NOT NULL,
  `specialty_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `category_id`, `specialty_name`, `specialty_description`, `specialty_status`) VALUES
(1, 1, 'Photography', 'Photography is the art, application, and practice of creating durable images by recording light, either electronically by means of an image sensor, or chemically by means of a light-sensitive material such as photographic film.', 1),
(2, 4, 'Web Design', 'Designing of websites that are displayed on the internet. It usually refers to the user experience aspects of website development rather than software development.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

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
-- Indexes for table `freelancers_address`
--
ALTER TABLE `freelancers_address`
  ADD PRIMARY KEY (`freelancer_address_id`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `jobs_application`
--
ALTER TABLE `jobs_application`
  ADD PRIMARY KEY (`job_application_id`);

--
-- Indexes for table `jobs_info`
--
ALTER TABLE `jobs_info`
  ADD PRIMARY KEY (`jobs_info_id`);

--
-- Indexes for table `jobs_status`
--
ALTER TABLE `jobs_status`
  ADD PRIMARY KEY (`job_status_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers_images`
--
ALTER TABLE `employers_images`
  MODIFY `employer_image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers_info`
--
ALTER TABLE `employers_info`
  MODIFY `employers_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers_status`
--
ALTER TABLE `employers_status`
  MODIFY `employer_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `freelancer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `freelancers_address`
--
ALTER TABLE `freelancers_address`
  MODIFY `freelancer_address_id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `freelancer_image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freelancers_info`
--
ALTER TABLE `freelancers_info`
  MODIFY `freelancers_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freelancers_rating`
--
ALTER TABLE `freelancers_rating`
  MODIFY `freelancer_rating_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelancers_skills`
--
ALTER TABLE `freelancers_skills`
  MODIFY `freelancer_skill_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `freelancers_status`
--
ALTER TABLE `freelancers_status`
  MODIFY `freelancer_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs_application`
--
ALTER TABLE `jobs_application`
  MODIFY `job_application_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs_info`
--
ALTER TABLE `jobs_info`
  MODIFY `jobs_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs_status`
--
ALTER TABLE `jobs_status`
  MODIFY `job_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
