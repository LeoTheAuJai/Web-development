-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2024-12-15 17:17:43
-- 伺服器版本: 5.7.17
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sms`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `course_name` varchar(120) DEFAULT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_desc` varchar(255) DEFAULT NULL,
  `course_dept` varchar(50) DEFAULT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `progName` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `teacher_ID` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`c_id`, `course_name`, `course_code`, `course_desc`, `course_dept`, `create_dt`, `modify_dt`, `progName`, `institution`, `teacher_ID`) VALUES
(1, 'Databases and Web-based Info Systems', 'CS412', 'This course require student to develop responsible web development using database and PHP', 'Faculty of Science and Technology', '2024-10-26 18:02:53', '2024-12-16 00:15:55', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '123456789'),
(2, 'Introduction to Academic English (CEF)', 'HD401', 'This course give a basic understanding for student about english and counication', 'ENG', '2024-10-26 18:05:32', '2024-12-13 23:43:35', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '1234567114'),
(3, 'Professional Ethics in Information Technology', 'HD408N', 'This course taught about professional ethics that a employee should have', 'Faculty of Science and Technology', '2024-10-26 18:05:39', '2024-12-16 00:15:46', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '123456789'),
(4, 'English for Communication in Workplace', 'HD405', 'This course enhance students\' communication skill', 'ENG', '2024-10-26 18:05:43', '2024-12-16 00:16:42', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '1234567892'),
(5, 'Game Asset Design', 'GS414', 'This course require student to develop 2D-platformer game using Unity', 'Faculty of Science and Technology', '2024-10-26 18:05:47', '2024-11-16 07:20:21', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '123456789'),
(6, 'Internet and Mobile App Development', 'CS414', 'This course require student to develop mobile app for android using android studio', 'Faculty of Science and Technology', '2024-10-26 18:05:51', '2024-12-16 00:16:46', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '1234567892'),
(7, 'Team Project', 'CS418', 'This course require student to show their teamwork and combine their task into 1 project', 'COMMON', '2024-10-26 18:05:55', '2024-12-15 19:45:48', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '123456789'),
(8, 'User Experience Design', 'CS419', 'This course require student to design layout considering users\' most convinience', 'Faculty of Science and Technology', '2024-10-26 18:05:59', '2024-11-27 21:10:39', 'Higher Diploma in Information Technology (Computing)', 'Hong kong institute of technology(HKIT)', '123147');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `message`, `created_at`) VALUES
(123458, 12345711, 12345706, ' Teacher: teacher1:Hi, I am teacher', '2024-11-27 13:23:13'),
(123459, 12345711, 12345706, ' Teacher: teacher1:You are a student', '2024-11-27 13:23:25'),
(123460, 12345711, 12345707, ' Teacher: teacher1:this is abc turn', '2024-11-27 13:25:03'),
(123461, 12345711, 12345706, ' Teacher: teacher1:www', '2024-11-27 13:26:06'),
(123462, 12345711, 12345707, ' Teacher: teacher1:send to you', '2024-11-27 13:57:30'),
(123463, 12345711, 12345707, ' Teacher: teacher1:testing', '2024-11-27 15:50:25'),
(123464, 12345711, 12345706, '1 more test', '2024-11-27 15:53:28'),
(123471, 12345706, 12345711, 'other sent', '2024-11-27 15:53:28'),
(123470, 12345711, 12345707, 'hi', '2024-11-28 07:03:15'),
(123472, 12345711, 12345706, 'i sent to you', '2024-11-28 07:32:42'),
(123473, 12345706, 12345711, 'i sent to you', '2024-11-28 07:32:42'),
(123475, 12345706, 12345711, 'Wikipedia is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Wikimedia Foundation.', '2024-11-30 11:18:29'),
(123476, 12345706, 12345714, '123456', '2024-12-13 16:01:23'),
(123477, 12345714, 12345706, 'hi', '2024-12-13 16:01:35');

-- --------------------------------------------------------

--
-- 資料表結構 `staff`
--

CREATE TABLE `staff` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `user_email_addr` varchar(20) DEFAULT NULL,
  `user_role` enum('Manager','Admmin') DEFAULT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `dateOfBirth` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `gradelevel` varchar(20) DEFAULT NULL,
  `logo_path` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `intake_year` int(4) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `guardian_info` varchar(50) DEFAULT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `student`
--

INSERT INTO `student` (`user_id`, `student_id`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `gradelevel`, `logo_path`, `programme`, `intake_year`, `address`, `email`, `phoneNumber`, `guardian_info`, `create_dt`, `modify_dt`) VALUES
(12345706, '17478956', 'Wu La', 'Ma', '2024-11-13', 'Male', 'Bachelor', 'student1.png', 'BSc (Hons) Computing', 2024, 'Wong Tai Sin', '123456@gmail.com', '14785236', 'Father: halo', '2024-11-27 16:12:56', '2024-11-27 17:16:58'),
(12345708, '112123', 'ww', 'aa', '2024-11-01', 'Male', 'HD', 'image__1_.png', 'BSc (Hons) Computing', 2024, 'ertret', '32457003@hkit.edu.hk', '1122131', 'ww', '2024-11-11 04:42:31', '2024-11-22 20:01:31'),
(12345704, '112123', 'ww', 'aa', '2024-11-01', 'Male', 'HD', 'image__1_.png', 'BSc (Hons) Computing', 2024, 'ertret', '32457003@hkit.edu.hk', '1122131', 'ww', '2024-11-11 04:42:31', '2024-11-22 20:01:31'),
(12345712, '11111111', 'Da Meh', 'Ya', '1995-03-02', 'Male', 'Diploma of Yi Jin', 'stu.png', 'BSc (Hons) Computing', 2021, 'Cheng Chek Chee Secondary School of Sai Kung and Hang Hau District, N.T.', '123456789@abc.com', '88888888', 'Mather: Merine', '2024-12-02 00:41:28', '2024-12-02 00:41:28');

-- --------------------------------------------------------

--
-- 資料表結構 `studentworks`
--

CREATE TABLE `studentworks` (
  `sw_id` int(11) NOT NULL,
  `logo_name` varchar(50) NOT NULL,
  `logo_type` varchar(10) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_id` varchar(20) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `studentworks`
--

INSERT INTO `studentworks` (`sw_id`, `logo_name`, `logo_type`, `file_name`, `file_type`, `title`, `description`, `create_dt`, `modify_dt`, `student_id`, `course_id`) VALUES
(8, 'case_back__game_assets_.png', 'png', 'msg_20241105_2045_.zip', 'zip', 'Game Development 1', 'This developed game require user to drag a button from a starting point to an end point using a cursor. This game is developed by Unity. Since the file is too large, the downloaded file would be a download link and you can download it if you are interested.', '2024-11-11 04:58:58', '2024-11-22 01:58:45', '12345706', 'GS414'),
(11, 'case_cover__game_assets_.png', 'png', 'msg_20241105_2045_.zip', 'zip', 'Game Development 2', 'This developed game require user to drag a button from a starting point to an end point using a cursor. This game is developed by Unity. Since the file is too large, the downloaded file would be a download link and you can download it if you are interested.', '2024-11-11 04:58:58', '2024-11-22 01:57:55', '12345706', 'GS414'),
(40, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera1', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419'),
(41, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera2', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419'),
(42, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera3', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419'),
(43, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera4', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419'),
(44, 'image.png', 'png', 'msg_20241105_2045_.zip', 'zip', '123', 'www', '2024-12-13 23:55:58', '2024-12-13 23:55:58', '12345706', 'CS412'),
(38, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419'),
(39, 'shot_now__icon.png', 'png', 'test-programs-main.zip', 'zip', 'User experience of Camera', 'This product require us to take photoes from others and provide services to others. As to provide the best user experience to others. Also, base on their feedback, we need to draft a system for the camera man that best fit their requirement.', '2024-12-02 01:17:05', '2024-12-02 01:23:59', '12345711', 'CS419');

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `dateOfBirth` varchar(10) DEFAULT NULL,
  `logo_path` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `exp` varchar(10) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `email_addr` varchar(20) DEFAULT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `teacher`
--

INSERT INTO `teacher` (`user_id`, `teacher_id`, `firstName`, `lastName`, `dateOfBirth`, `logo_path`, `gender`, `qualification`, `exp`, `dept`, `phone_num`, `email_addr`, `create_dt`, `modify_dt`) VALUES
(12345707, '123456789', 'HK', 'Ng', '2024-11-06', 'teacher1.png', 'Male', 'PhD in Management Information System, University of Manchester,1986', '11', 'aaaa', '22222222', 'ddd@ww', '2024-11-11 06:10:50', '2024-11-16 07:08:43'),
(12345711, '123147', 'Wei Hung', 'Wong', '2024-11-06', 'teacher2.png', 'Male', 'First qualification, second qualification, third qualification', '3', 'Halo', '99999999', 'abcde@abc.hk', '2024-11-27 19:31:57', '2024-11-27 21:10:39'),
(12345714, '1234567114', 'bot', 'hi', '1981-06-19', 'stu.png', 'Female', 'First qualification, second qualification, third qualification', '12', 'Department', '123456', 'abcde@abc.hk', '2024-12-13 23:43:35', '2024-12-13 23:43:35'),
(12345720, '1234567892', 'Wey', 'Wa', '2015-10-15', '__________________2023-11-03_220615.png', 'Male', 'First qualification, second qualification, third qualification', '12', 'Department', '123456', 'abcdefg@abc.hk', '2024-12-15 19:45:48', '2024-12-16 00:16:35');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` enum('Staff','Student','Teacher') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`) VALUES
(12345720, 'AAAA', 'Teacher', '$2y$10$V0II5xYanZTlovPVufdKBeE5FpBulxBOW/PiZIUS6IjnK2rBU2nEC'),
(12345717, 'ww', 'Teacher', '$2y$10$Z9LuZCScI5c9jPnDWY6/TeVFklnM3tb7Jur4KJwOxA39NnEY1nhDG'),
(12345714, '123456789', 'Teacher', '$2y$10$gQPyQbsdD9uZ/gYqQmAW9.IGC4QehPNTpwoNDyM.Px6Siish3U7Pq'),
(12345715, '112', 'Student', '$2y$10$BWWFKHj62ZG9e2imq8zLbeAm/PqAcgyirxThqXo13vNDM9xGH3bxK'),
(12345712, 'Student2', 'Student', '$2y$10$aj4NttFILO6NLRZRXmgqRO8kHf54mC4qPu45nR8OzCoQx4v698aDq'),
(12345711, 'teacher1', 'Teacher', '$2y$10$WisIJkCmFNeQMMbp32pa3OBj/oem4fCvLmt78RzGYfhCF/i4k3xhm'),
(12345706, 'student1', 'Student', '$2y$10$bXj0fLnUYl1GkZBbXLQ1ou4fAegl0c0ZfTdKGmRd/Y9wIiYJ5HUvG'),
(12345707, 'ABC', 'Teacher', '$2y$10$ZPpY7Jdhw/cZKy9abjafYOXNJD9A6SJ2uqdBGhz3GJf5yOk3GxrDO');

-- --------------------------------------------------------

--
-- 資料表結構 `waitinglist`
--

CREATE TABLE `waitinglist` (
  `sw_id` int(11) NOT NULL,
  `logo_name` varchar(50) NOT NULL,
  `logo_type` varchar(10) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `create_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_id` varchar(20) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`,`course_code`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- 資料表索引 `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`user_id`,`user_code`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `studentworks`
--
ALTER TABLE `studentworks`
  ADD PRIMARY KEY (`sw_id`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`,`teacher_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD PRIMARY KEY (`sw_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123478;
--
-- 使用資料表 AUTO_INCREMENT `studentworks`
--
ALTER TABLE `studentworks`
  MODIFY `sw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345721;
--
-- 使用資料表 AUTO_INCREMENT `waitinglist`
--
ALTER TABLE `waitinglist`
  MODIFY `sw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
