-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2019 at 02:18 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yubi`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `levels_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `levels_id`, `section`, `school_year`, `status`, `date`) VALUES
(1, 8, 14, 3, '2019-2020', '1', '2019-02-02'),
(2, 1, 2, 2, '2019-2020', '1', '2019-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `address`, `civil_status`, `citizenship`, `gender`, `email`, `contact`, `role`, `profile`) VALUES
(1, 'Al Jared', 'Cuarteros', 'Laniba', '2003-01-31', 'Pagina, Jagna, Bohol', 'Single', 'Filipino', 'Male', 'jaredlaniba@gmail.com', '09106447828', 'Teacher', NULL),
(2, 'Maria Andrea', 'Laniba', 'Salamanes', '1996-07-21', 'Pagina, Jagna, Bohol', 'Married', 'Filipino', 'Female', 'andrealaniba@gmail.com', '09101651601', 'Teacher', NULL),
(3, 'Hanna Mae', 'Mijares', 'Cuaresma', '1999-11-12', 'Napo', 'Single', 'Filipino', 'Female', 'nam@mail.com', '123456', 'Teacher', NULL),
(4, 'Hatake', 'Rou', 'Kakashi', '1992-05-12', 'Konoha Japan', 'Single', 'Japanese', 'Male', 'hatake.kakashi@mail.com', '1231202913012', 'Teacher', NULL),
(5, 'Saitama', 'Suze', 'Sensei', '1992-01-03', 'Loon Bohol', 'Single', 'Japanese', 'Male', 'saitama@mail.com', '100-2132', 'Teacher', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'student', 'student default'),
(4, 'cashier', 'Cashier Role'),
(5, 'teacher', 'Teacher Group'),
(6, 'librarian', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `father` varchar(100) NOT NULL,
  `father_occupation` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `mother_occupation` varchar(100) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `guardian_contact` varchar(100) NOT NULL,
  `g_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`id`, `student_id`, `father`, `father_occupation`, `mother`, `mother_occupation`, `guardian`, `guardian_contact`, `g_address`) VALUES
(1, 1, 'Peter Pan', 'Programmer', 'Sheila Bread', 'Programmer', 'Nobody There', '123123', 'Loon Bohol'),
(2, 2, 'asdasasd', 'asdasdasd', 'asdasd', 'asdasd', 'assdasd', '123123', 'asdasdasd'),
(3, 4, 'Toshi Himada', 'Web Developer', 'Mai Himada', 'Nurse', 'Toshi Himada', '09191234567', 'Loon Bohol'),
(4, 7, 'Test Data', 'Doctor', 'Name of mother', 'Nurse', 'Chi Chi', '123002312', 'Loon Bohol'),
(5, 8, 'Doe Peter', 'Mechanic', 'Jane Peter', 'Doctor', 'Doe Peter', '123412312', 'Loon Bohol'),
(6, 9, 'Johnny Smith', 'Programmer', 'Jane Smith', 'Nurse', 'Jane Smith', '09191234567', 'California USA');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `levels_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`levels_id`, `name`, `description`) VALUES
(1, 'Pre-School', 'Preschool Level'),
(2, 'Kindergarten', 'Kinder Garten Level Baby'),
(3, 'Grade 1', ''),
(4, 'Grade 2', ''),
(5, 'Grade 3', ''),
(6, 'Grade 4', ''),
(7, 'Grade 5', ''),
(8, 'Grade 6', ''),
(9, 'Grade 7', ''),
(10, 'Grade 8', ''),
(11, 'Grade 9', ''),
(12, 'Grade 10', ''),
(13, 'Grade 11', ''),
(14, 'Grade 12 - STEM', 'STEM'),
(15, 'Grade 12 - ABM', 'ABM'),
(16, 'Grade 12 - HUMMS', 'HUMMS');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `incharge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `incharge`) VALUES
(1, 'St. Joseph', 0),
(2, 'St. Patrick', 2),
(3, 'St. Fatima', 1),
(4, 'St. Veronica', 0),
(5, 'St. Gregory', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `day` varchar(200) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `schoolyear` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `teacher`, `subject`, `room`, `level`, `section`, `day`, `time`, `schoolyear`) VALUES
(1, 4, 1, 1, 1, 1, 'Monday,Wednesday,Friday', '7:00-8:00', '2019-2020'),
(2, 4, 2, 2, 1, 1, 'Tuesday', '8:00-9:00', '2019-2020'),
(3, 4, 8, 3, 16, 3, 'Tuesday,Wednesday', '10:00-11:00', '2019-2020'),
(4, 4, 7, 2, 15, 3, 'Monday,Tuesday', '4:00-5:00', '2019-2020'),
(5, 4, 9, 3, 16, 3, 'Monday,Wednesday,Friday', '12:00-1:00', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `adviser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `level`, `adviser`) VALUES
(1, 'PSchool A', 1, 1),
(2, 'Kinder A', 2, 1),
(3, 'G12 - STEM A', 14, 2),
(4, 'G3 - Gumamela', 5, 3),
(5, 'G3 - Ilang-Ilang', 5, 4),
(6, 'G3-Santan', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `birthdate`, `birthplace`, `citizenship`, `religion`, `contact`, `email`, `password`, `address`, `profile`) VALUES
(1, 'Queen', 'Off', 'Harts', 'Male', '2018-08-02', 'Loon Bohol', 'Filipino', 'Christian', '123123213', 'qwe@asd.com', '$2y$10$WMhlqo9lRm.CHNV8Ze.pbu9YFv2HgViS51RFYDQNKxMTWVHauEpxK', 'Napo Loon Bohol', ''),
(2, 'Hanna Mae', 'Mijares', 'Cuaresma', 'Female', '2018-09-06', 'asdasdlasjd', 'asdasd', 'asdasd', '123123', 'h@gmail.com', '$2y$10$2kWCUuvpRaaMHNImfjhL9eCUYV26SDCvNcEIXW.CH9AVS68Q03uPW', 'asldjalsdjk', ''),
(3, 'Hero', 'Yuki', 'Himada', 'Male', '1998-05-13', 'Japan', 'Japanese', 'Catholic', '123191', 'hirohimada@mail.com', '', 'Loon Bohol', ''),
(4, 'Johnny', 'Doe', 'Smith', 'Male', '2001-01-03', 'Loon Bohol', 'Filipino', 'Catholic', '123456', 'hosico@amail.club', '123123', 'Loon Bohol', ''),
(5, 'Ant', 'Man', 'Do', 'Male', '2001-01-21', 'Loon Bohol', 'Filipino', 'Islam', '12345670-123', 'testmailer@mail.com', 'password', 'Loon Bohol', ''),
(7, 'Killer', 'Man', 'Do', 'Male', '2001-01-21', 'Loon Bohol', 'Filipino', 'Islam', '12345670-123', 'testmailer@mail.com', 'password', 'Loon Bohol', ''),
(8, 'Peter', 'Doe', 'Wills', 'Male', '1992-01-31', 'Loon Bohol', 'American', 'Christian', '1234401221', 'peterdoe@mail.com', '12345678', 'Tagbilaran Bohol', ''),
(9, 'Mark', 'Fish', 'Zuckerberg', 'Male', '1985-05-14', 'Palo Alto California', 'American', 'Christian', '0019213112321', 'mark@fb.com', '123123', 'Palo Alto California', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `description`) VALUES
(1, '123456', 'Math 1', 'Mental Abuse To Humans'),
(2, '1323', 'English 1', 'English for Dummies'),
(3, '4232', 'Science 1', 'Science for Grade School'),
(4, '771281', 'MAPEH', 'Music Art PE Health'),
(5, '3942893', 'Values Education', 'Subject about values in life'),
(6, '23321901', 'Araling Panlipunan', 'AP for highschool'),
(7, '3819821', 'Biology Science', 'biology science'),
(8, '3819891', 'TLE', 'Technology Livelihood Education'),
(9, '0219110', 'Geometry', 'Geometry Senior High');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1548925265, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'johnd@mail.com', '$2y$08$jwKsKHRPwfO6Fu0SGLTFg.dmpyrfyxF/nF8WW2VKUOJYsaLKH2mfC', NULL, 'johnd@mail.com', NULL, NULL, NULL, NULL, 1548813846, NULL, 1, 'John', 'Doe', '', '09382830876'),
(3, '::1', 'jmister@mail.com', '$2y$08$tA/yPaiXSXTKbvVJnGvP0eJPH1S5YXYkhQW6pZZ3YAK8OZ6PHpIBC', NULL, 'jmister@mail.com', NULL, NULL, NULL, NULL, 1548823460, NULL, 1, 'John', 'Mister', 'SCHOOL', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(3, 2, 2),
(7, 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student` (`student_id`,`levels_id`),
  ADD KEY `level` (`levels_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levels_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incharge` (`incharge`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor` (`teacher`,`subject`,`room`,`level`,`section`),
  ADD KEY `subject` (`subject`),
  ADD KEY `room` (`room`),
  ADD KEY `section` (`section`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`,`adviser`),
  ADD KEY `adviser` (`adviser`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `levels_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
