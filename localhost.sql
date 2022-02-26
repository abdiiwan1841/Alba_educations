-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2022 at 10:06 PM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alba_educations`
--
CREATE DATABASE IF NOT EXISTS `alba_educations` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alba_educations`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_audit_report`
--

CREATE TABLE `admin_audit_report` (
  `audit_id` int(11) NOT NULL,
  `teacher` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `teacher_reply` varchar(250) NOT NULL,
  `status` int(250) NOT NULL COMMENT '1 admin sent 2 teacher replied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_audit_report`
--

INSERT INTO `admin_audit_report` (`audit_id`, `teacher`, `comment`, `teacher_reply`, `status`) VALUES
(1, '4', 'This month your were good..', 'ok done.', 2),
(2, '4', 'This month your were good...', '', 1),
(3, '1', 'hi', 'gfhgh', 2),
(4, '1', 'Hello', 'hey', 2),
(5, '10', 'Helolo', '', 1),
(6, '9', 'Helolo', 'dff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alba_educations.subjects_teachers`
--

CREATE TABLE `alba_educations.subjects_teachers` (
  `sub_std_id` int(11) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alba_educations.subjects_teachers`
--

INSERT INTO `alba_educations.subjects_teachers` (`sub_std_id`, `subject_id`, `student_id`, `status`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 1),
(3, 10, 4, 1),
(4, 13, 8, 1),
(5, 13, 9, 1),
(6, 17, 11, 1),
(7, 9, 12, 1),
(8, 18, 13, 1),
(9, 19, 13, 1),
(10, 10, 13, 1),
(11, 16, 16, 1),
(12, 18, 3, 1),
(13, 13, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_help`
--

CREATE TABLE `assignment_help` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `assignment_type` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `due_time` time NOT NULL,
  `budget` int(100) NOT NULL,
  `time_zone` varchar(100) NOT NULL,
  `currency_type` varchar(50) NOT NULL,
  `attached_file` varchar(250) NOT NULL,
  `asignment_description` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_help`
--

INSERT INTO `assignment_help` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`, `grade`, `assignment_type`, `due_date`, `due_time`, `budget`, `time_zone`, `currency_type`, `attached_file`, `asignment_description`, `status`) VALUES
(1, 'xbfd', 'sf', 'hema98birthday@gmail.com', 1212345645, 'english', '4', '1', '2021-12-16', '01:40:00', 133, 'IST', '2', 'public/Admin/uploads/assignment_help/1.jpg', 'sequi praesentium reprehenderit consequuntur a atque unde. Quas placeat dol', 1),
(2, 'Jsbdb', 'Nrns', 'hemant19hday@gmail.com', 7878, 'chemestry', '7', '2', '2021-12-16', '02:47:00', 133, 'ET', '1', 'public/Admin/uploads/assignment_help/about-img3.png', ' design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ', 1),
(3, 'ete', 'ew', 'sasf@gmail.com', 787887, 'hindi', '8', '3', '2021-12-16', '01:40:00', 133, 'CT', '3', 'public/Admin/uploads/assignment_help/1.jpg', '                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aliquid necessitatibus, quis labore ipsa perspiciatis earum aut sequi praesentium reprehenderit consequuntur a atque unde. Quas placeat dol', 1),
(4, 'wetw', 'Nrnsfaf', 'hem8birthday@gmail.com', 787887, 'political', '1', '5', '2021-12-16', '13:40:00', 133, 'PT', '4', 'public/Admin/uploads/assignment_help/1.jpg', 'safsa dasf asf. as. a .', 1),
(5, 'Jsbdb', 'Nrns', 'hemant1998birthday@gmail.com', 787887, 'dd', '78', '', '2021-12-16', '13:40:00', 133, 'MT', '2', 'public/Admin/uploads/assignment_help/1.jpg', 'safsa dasf asf. as. a .', 1),
(6, 'dfggd', 'fgsdfgsdf', 'gsdfg@gmail.com', 546454545, '454545', '45454545', '', '0000-00-00', '05:45:00', 0, 'fadsfasdf', '2', 'public/Admin/uploads/assignment_help/module_table_top.png', 'fdsfa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `billing_student`
--

CREATE TABLE `billing_student` (
  `student_billing_id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `amount` int(11) NOT NULL COMMENT 'in USD',
  `status` int(11) NOT NULL COMMENT '1 admin updated 2 students submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_description` longtext NOT NULL,
  `blog_image` varchar(250) NOT NULL,
  `blog_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `allow_comments` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_description`, `blog_image`, `blog_update_date`, `allow_comments`, `status`) VALUES
(1, 'Is education ever going to be the same once the pandemic ends?', 'Nelson Mandela once said, “Education is the most powerful weapon which you can use to change the world.” But what if it is the other way round and the world around us is going through major transitions? Would that change education too? Looking at the world right now I would say … Yes!. This is a thought that never crossed our minds until the pandemic hit us. But as the COVID-19 pandemic unfolded this year, barely any aspect of daily life was left unaffected and thereby necessitating a range of unprecedented social isolation and safety measures. One area which has certainly seen considerable changes in the education sector. According to statistics, 168 million children have been suffering because of the same. When schools and universities around the world were forced to close their doors to prevent its spread, alternative methods and technologies had to be adopted almost overnight. This has also pushed educators to reshape the mechanism of imparting lessons. Online learning became an urgent necessity, rather than an option. \n\nThough online learning isn’t an alien concept, it might sound new to some in contrast to traditional learning. Of course, e-learning had been included in the higher education experience for some time; however, never to the all-encompassing extent witnessed at the height of the pandemic. Teaching staff internationally were forced – often with little warning – to familiarize themselves with a range of online platforms in order to deliver entire courses on a fully remote basis. Pre-pandemic, educational institutions had the option to incorporate digital learning as part of their offer, but it was often seen as a bonus or the exception to the rule – attractive mainly to part-time or foreign students seeking more flexible learning arrangements. COVID-19 undoubtedly represents a critical turning point.', 'public/Admin/uploads/blog/1.jpg', '2021-12-08 10:23:39', 0, 1),
(2, 'Is education ever going to be the same once the pandemic ends? blog-2', 'Nelson Mandela once said, “Education is the most powerful weapon which you can use to change the world.” But what if it is the other way round and the world around us is going through major transitions?', 'public/Admin/uploads/blog/1.jpg', '2021-12-08 10:24:10', 1, 1),
(3, 'Blog 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has', 'public/Admin/uploads/blog/darts-metal-aiming.jpg', '2022-01-03 12:03:28', 2, 1),
(4, 'test', 'testing', 'public/Admin/uploads/blog/blog-thumbnail.jpg', '2022-01-27 10:31:05', 1, 1),
(5, 'What I learnt from my exams', 'It\'s important to reflect after assessments. In this blog, Ralitsa shares what she learnt about the study process after the October examinations. \r\nThe exams in October 2021 were a learning experience and, for many, a period to draw conclusions on how to get the most of our studies at the University of London.\r\n\r\nI would like to share with you some thoughts and revelations on the study process that went into preparing for these exams, and, as we prepare for the new year, invite you to reflect on your strategy for the next assessment season.\r\n\r\nTo begin with, many study tips may be well known, but they are nonetheless true. It just takes a while for your mind to attune to their main idea. So, why not try giving these “oldies but goldies” a try? \r\n\r\n1     Start to outline early\r\nWhatever your field of study, outlining is a time-consuming process and doesn’t combine well with revision activities. The sooner you have your outlines done, the sooner you have core material to study from. The sooner you have that core material available, the more time you will have to prepare and revise. You get the idea – it is all about making sufficient time to study for the exams! In my case, completing my outlining work two months before the exams paid off, and the dividend was that I could study the core concepts at length and with greater focus.', 'public/Admin/uploads/blog/scott-graham-5fNmWej4tAA-unsplash.jpg', '2022-02-08 05:36:54', 1, 1),
(6, 'Gaurav', 'Testing Description', 'public/Admin/uploads/blog/signature.png', '2022-02-08 07:58:01', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_your_demo`
--

CREATE TABLE `book_your_demo` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `timing` time NOT NULL,
  `timezone` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_your_demo`
--

INSERT INTO `book_your_demo` (`booking_id`, `name`, `email`, `phone`, `grade`, `subject`, `topic`, `date`, `timing`, `timezone`, `created_at`) VALUES
(1, 'asf', 'ad@as.com', 'wf', 'wf', 'wf', 'ssf', '2022-01-25', '01:52:00', 'zc', '2022-01-21 20:17:36'),
(2, 'quiz', 'w@gmail.com', '3', 'First Grade', '343434', '5495', '2022-01-05', '05:11:00', '&#039;pihui', '2022-01-24 11:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `certificate_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `student` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `achivement` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`certificate_id`, `grade`, `student`, `subject`, `achivement`, `file`, `created_at`, `status`) VALUES
(4, '4', '5', '14', 'Good work', 'public/Admin/uploads/certifications/Chat Transcript.docx', '2022-02-10 10:52:36', 1),
(6, '1', '18', '16', 'awesome', 'public/Admin/uploads/certifications/anika annswers.png', '2022-02-19 08:10:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_sessions`
--

CREATE TABLE `class_sessions` (
  `session_id` int(11) NOT NULL,
  `for_date` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `teacher` int(100) NOT NULL,
  `student` int(100) NOT NULL,
  `grade` int(100) NOT NULL,
  `subject` int(100) NOT NULL,
  `strt_time` time NOT NULL,
  `timing` int(100) NOT NULL COMMENT 'in minutes',
  `zoom_link` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_status` int(11) NOT NULL,
  `status` int(100) NOT NULL COMMENT '1 is active , 2 is teacher attended  '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_sessions`
--

INSERT INTO `class_sessions` (`session_id`, `for_date`, `title`, `teacher`, `student`, `grade`, `subject`, `strt_time`, `timing`, `zoom_link`, `created_at`, `payment_status`, `status`) VALUES
(1, '2021-12-23', 'Maths class on addition', 1, 4, 4, 5, '04:00:00', 10, 'https://us05web.zoom.us/j/81304895509?pwd=cVczUURtYU5KTzFzalYvUWcveWRXZz09', '2022-01-25 08:29:30', 0, 2),
(2, '2021-12-23', 'Hindi class on Scentences', 1, 4, 4, 8, '11:12:09', 20, 'https://us05web.zoom.us/j/82030572034?pwd=RVpHZDR0NFZhVmhEMkhnbEtEaUtndz09', '2021-12-22 19:55:28', 0, 2),
(3, '2021-12-23', 'Class on Motion', 1, 3, 6, 1, '17:52:00', 30, 'https://us05web.zoom.us/j/88628645810?pwd=VzJycU5lbG1PaW1iNEhoSWxhUWZDQT09', '2021-12-22 19:54:25', 0, 2),
(4, '2021-12-23', 'Essay writing', 1, 3, 4, 4, '21:52:00', 40, 'https://us05web.zoom.us/j/85374852318?pwd=b29hWjUxMVdsL0szazFIYVJLcWdnQT09', '2021-12-24 11:05:19', 0, 2),
(5, '2021-12-23', 'Abc new', 4, 3, 4, 3, '03:54:00', 1, 'https://us05web.zoom.us/j/81604739938?pwd=ajFNeFBRbDN0QjVWK09VUkhoYU8rUT09', '2021-12-22 20:20:29', 0, 2),
(6, '2022-01-09', 'Class 1', 4, 3, 4, 8, '21:00:00', 20, 'https://us05web.zoom.us/j/88641116823?pwd=SmxGZ1hKTmNvcWtrMjYreXpvaEQ5dz09', '2022-01-08 14:28:22', 0, 1),
(7, '2022-01-23', 'ABC', 1, 5, 4, 1, '17:34:00', 20, 'https://us05web.zoom.us/j/84529819493?pwd=NCtlVWdhdUhZVXc5Z0Zabmwwa3Nkdz09', '2022-01-23 11:10:37', 0, 1),
(8, '2022-01-28', 'Demo', 1, 3, 4, 1, '18:15:00', 60, 'https://us05web.zoom.us/j/86591258059?pwd=cmVlZFR6SjdVQWV0bXhKY1JEUjU5QT09', '2022-01-26 18:03:03', 0, 1),
(9, '2022-01-27', 'Demo alba education', 1, 3, 4, 1, '10:15:00', 15, 'https://us05web.zoom.us/j/84045502102?pwd=cnh1czVIekNnQzN3UkNRK3ZTMThhdz09', '2022-01-26 18:03:07', 0, 1),
(10, '2022-02-10', 'Thermo', 4, 3, 4, 8, '09:47:00', 60, 'https://us05web.zoom.us/j/87578326651?pwd=RlE3UkNQU05xNmZNeE12a095N1NwZz09', '2022-02-08 13:17:58', 0, 1),
(11, '2022-02-12', 'Padh le', 13, 15, 4, 1, '15:45:00', 300, 'https://us05web.zoom.us/j/89895002758?pwd=L0Y4Syt0MHdvZTUvcS9yb09XbVIxQT09', '2022-02-11 10:15:05', 0, 1),
(12, '2022-02-26', 'Pdh', 13, 15, 4, 1, '03:46:00', 120, 'https://us05web.zoom.us/j/86323969388?pwd=UUkwazJQVW5yVkxpN0tqbSthR3ZIUT09', '2022-02-11 10:16:18', 0, 1),
(13, '2022-02-12', 'ga', 1, 15, 4, 1, '16:04:00', 33, 'https://us05web.zoom.us/j/87498958681?pwd=YVRNTGFqdlMvdXQ4TXREWGdCOXJBUT09', '2022-02-11 10:34:39', 0, 1),
(14, '2022-02-11', 'dsf', 1, 5, 4, 1, '16:18:00', 4, 'https://us05web.zoom.us/j/81752056702?pwd=bVJnQ2tRRHNhdzBndEMwUGhmZ09NUT09', '2022-02-11 10:47:18', 0, 1),
(15, '2022-02-12', 'ff', 1, 5, 4, 1, '16:24:00', 43, 'https://us05web.zoom.us/j/86442530456?pwd=TFV3cVJvMjF1RUg5MVg1TExSVTVoUT09', '2022-02-11 10:53:03', 0, 1),
(16, '2022-02-12', 'f', 1, 15, 4, 1, '19:23:00', 4, 'https://us05web.zoom.us/j/87806437978?pwd=R3ZWVUg0NE8wa1hkZEdSblo1NEpYQT09', '2022-02-11 10:53:48', 0, 1),
(17, '2022-02-16', 'Chotu Bda', 15, 16, 9, 13, '10:36:00', 2, 'https://us05web.zoom.us/j/89406535048?pwd=aU9CNUY1b0ZKa3liMjNpdk1xSHZQdz09', '2022-02-15 05:04:57', 0, 1),
(18, '2022-02-15', 'chotu1 bda2', 15, 16, 9, 13, '10:38:00', 56, 'https://us05web.zoom.us/j/87169859611?pwd=aFp1R0d1SkhZbGs3MTNUbFF4Ry9ndz09', '2022-02-15 05:07:00', 0, 2),
(19, '2022-02-15', 'Artt', 16, 17, 6, 18, '18:25:00', 23, 'https://us05web.zoom.us/j/85692904918?pwd=UEtxbzV1YTRDZGtCeXFrS04ybmF6UT09', '2022-02-15 12:54:18', 0, 2),
(20, '2022-02-22', 'mini art', 17, 18, 1, 16, '13:53:00', 60, 'https://us05web.zoom.us/j/86080533805?pwd=aUxDZUpRc2xUVTc1d01KNVJJd3UxQT09', '2022-02-22 08:21:20', 0, 1),
(21, '2022-02-22', '', 17, 16, 9, 16, '18:57:00', 33, 'https://us05web.zoom.us/j/82399373682?pwd=MjhCbjJHQ1ltaWZpZEVGdXl0ZXFjQT09', '2022-02-22 13:27:06', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculum_id` int(11) NOT NULL,
  `student` int(100) NOT NULL,
  `grade` int(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculum_id`, `student`, `grade`, `file`, `created_at`, `status`) VALUES
(3, 5, 4, 'public/Admin/uploads/curriculum/alba educations.pdf', '2022-01-26 08:29:17', 1),
(5, 6, 6, 'public/Admin/uploads/curriculum/Alba Educations _ Curriculum (3).pdf', '2022-02-10 11:41:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `place` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(250) NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `heading` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `desc`, `place`, `date`, `image`, `from`, `to`, `heading`, `status`) VALUES
(2, 'event one', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Canada', '2022-02-19', 'public/Admin/uploads/events/ist-event-750x500.png', '16:38:00', '20:36:00', 'heading one', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `img_title` varchar(100) NOT NULL,
  `gallery_img` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `img_title`, `gallery_img`, `updated_at`, `status`) VALUES
(1, 'Image 1', 'public/Admin/uploads/gallery/course-img10-400x400.jpg', '2022-01-24 07:31:55', 1),
(2, 'Image 2', 'public/Admin/uploads/gallery/kindergarten-blog-img1-400x400.jpg', '2022-01-24 07:32:05', 1),
(3, 'Image 3', 'public/Admin/uploads/gallery/1.jpg', '2022-01-24 07:32:01', 1),
(4, 'test', 'public/Admin/uploads/gallery/blog-thumbnail.jpg', '2022-01-27 10:32:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade_name`, `status`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '4', 1),
(5, '5', 1),
(6, '6', 1),
(7, '7', 1),
(8, '8', 1),
(9, '9', 1),
(10, '10', 1),
(11, '11', 1),
(12, '12', 1),
(13, 'UG', 1),
(14, 'PG', 1),
(15, 'Diploma / Certification', 1),
(16, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades_subjects`
--

CREATE TABLE `grades_subjects` (
  `grade_sub_id` int(11) NOT NULL,
  `grade_id` varchar(10) NOT NULL,
  `subject_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades_subjects`
--

INSERT INTO `grades_subjects` (`grade_sub_id`, `grade_id`, `subject_id`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '1', '3'),
(4, '2', '4'),
(5, '16', '5'),
(6, '15', '6'),
(7, '13', '7'),
(8, '12', '8'),
(9, '11', '9'),
(10, '4', '1'),
(11, '5', '2'),
(12, '6', '10'),
(13, '16', '11'),
(14, '2', '12'),
(15, '1', '13'),
(16, '2', '13'),
(17, '3', '13'),
(18, '4', '13'),
(19, '5', '13'),
(20, '6', '13'),
(21, '7', '13'),
(22, '8', '13'),
(23, '9', '13'),
(24, '10', '13'),
(25, '11', '13'),
(26, '12', '13'),
(27, '13', '13'),
(28, '14', '13'),
(29, '15', '13'),
(30, '16', '13'),
(31, '4', '14'),
(32, '5', '15'),
(33, '1', '16'),
(34, '2', '16'),
(35, '3', '16'),
(36, '4', '16'),
(37, '5', '16'),
(38, '6', '16'),
(39, '7', '16'),
(40, '8', '16'),
(41, '9', '16'),
(42, '10', '16'),
(43, '11', '16'),
(44, '12', '16'),
(45, '13', '16'),
(46, '14', '16'),
(47, '15', '16'),
(48, '16', '16'),
(49, '10', '17'),
(50, '6', '18'),
(51, '1', '18'),
(52, '2', '18'),
(53, '3', '18'),
(54, '4', '18'),
(55, '5', '18'),
(56, '7', '18'),
(57, '8', '18'),
(58, '9', '18'),
(59, '10', '18'),
(60, '11', '18'),
(61, '12', '18'),
(62, '13', '18'),
(63, '14', '18'),
(64, '15', '18'),
(65, '16', '18'),
(66, '6', '19'),
(67, '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `grades_teachers`
--

CREATE TABLE `grades_teachers` (
  `id` int(11) NOT NULL,
  `grade` int(100) NOT NULL,
  `teacher` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `homework_id` int(11) NOT NULL,
  `h_title` varchar(250) NOT NULL,
  `grade` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL COMMENT '0 is admin uploaded',
  `subject` int(11) NOT NULL,
  `h_file` varchar(250) NOT NULL,
  `last_date_submission` date NOT NULL,
  `student_submitted_file` varchar(250) NOT NULL,
  `student_submitted_at` date NOT NULL,
  `status` int(50) NOT NULL COMMENT '1 teacher updated 2 admin approved 3 admin declined 4 student submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`homework_id`, `h_title`, `grade`, `student`, `teacher`, `subject`, `h_file`, `last_date_submission`, `student_submitted_file`, `student_submitted_at`, `status`) VALUES
(2, 'Question and assignments', 4, 3, 1, 5, 'public/Teachers/uploads/homeworks/2.pdf', '2021-12-30', 'public/Students/uploads/homeworks/3.pdf', '2021-12-20', 2),
(3, 'eassay on Quantm phy formats', 6, 3, 0, 1, 'public/Teachers/uploads/homeworks/4.pdf', '2021-12-30', 'public/Students/uploads/homeworks/blog-thumbnail (3).jpg', '2022-01-27', 4),
(4, 'hw', 4, 3, 0, 5, 'public/Teachers/uploads/homeworks/3.pdf', '2021-12-22', 'public/Students/uploads/homeworks/5.pdf', '2021-12-21', 4),
(5, 'ABC', 4, 3, 1, 0, 'public/Teachers/uploads/homeworks/blog-thumbnail.jpg', '2022-01-20', '', '0000-00-00', 1),
(6, 'sadf', 4, 3, 1, 8, 'public/Teachers/uploads/homeworks/bird1.png', '2022-02-18', '', '0000-00-00', 1),
(7, 'Gaurav', 4, 5, 1, 1, 'public/Teachers/uploads/homeworks/banner-shape15.png', '2022-02-26', '', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `newsletterSubscription_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `time_of_suscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`newsletterSubscription_id`, `user_email`, `time_of_suscription`, `status`) VALUES
(1, 'admin_user@gmail.com', '2021-12-08 13:22:16', 1),
(2, 'admin@gmail.com', '2021-12-08 13:22:16', 1),
(3, 'hemant1998birthday@gmail.com', '2021-12-08 13:22:46', 1),
(4, 'hemantwebbackdev@gmail.com', '2022-01-03 12:31:16', 1),
(5, 'hemantwwebbackdev@gmail.com', '2022-01-26 08:53:56', 1),
(6, 'w@gmail.com', '2022-01-26 08:54:45', 1),
(7, 'm@gmail.com', '2022-01-26 12:34:09', 1),
(8, 'testing@gmail.com', '2022-01-27 08:12:02', 1),
(9, 'shallybelangigue13@gmail.com', '2022-01-28 05:42:04', 1),
(10, 'ccd7de8677b6@hubmails.us', '2022-02-18 17:09:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `student` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `grade`, `student`, `subject`, `message`, `status`) VALUES
(1, '6', '4', '10', 'hi... how is you status.', 1),
(2, '', '', '', 'Ye hai testing notification', 1),
(3, '', '', '', 'Testing hai ye', 1),
(4, '', '', '', 'lms ll be launched soon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_counselling`
--

CREATE TABLE `parent_counselling` (
  `parent_counselling_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `date_for_counselling` date NOT NULL,
  `time_for_counselling` time NOT NULL,
  `timezone` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_counselling`
--

INSERT INTO `parent_counselling` (`parent_counselling_id`, `name`, `email`, `phone`, `subject`, `date_for_counselling`, `time_for_counselling`, `timezone`, `status`) VALUES
(1, 'hemant', 'hemant1998birthday@gmail.com', '6567678897', 'hindi', '2022-01-03', '12:28:00', 'IST', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `total_marks` varchar(250) NOT NULL,
  `total_questions` int(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_created` varchar(250) NOT NULL,
  `status` int(250) NOT NULL COMMENT '1 quiz created 2  sent to admin 3 live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `title`, `grade`, `subject`, `total_marks`, `total_questions`, `created_at`, `user_created`, `status`) VALUES
(1, 'Teacher quiz ', '4', '2', '100', 3, '2022-02-10 12:29:22', '0', 2),
(2, 'Questions  s', '4', '1', '109', 2, '2022-01-23 21:20:37', '4', 3),
(4, 'Quiz number one ?', '4', '2', '9846149898', 4, '2022-01-25 17:21:59', '0', 3),
(5, 'Thermo', '10', '17', '100', 1, '2022-02-08 09:58:23', '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `quiz_id` varchar(250) NOT NULL,
  `option1` varchar(250) NOT NULL,
  `option2` varchar(250) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `title`, `quiz_id`, `option1`, `option2`, `option3`, `option4`, `answer`, `file`, `status`) VALUES
(1, 'q', '1', 'QS', 'D', 'D', 'D', '1', '', 1),
(2, 'AsdA DJ djAHAs D dD ?', '1', 'QS', 'D', 'D', 'D', '1', '', 1),
(3, 'AsdA DJ djAHD ?', '1', 'QS', 'D', 'D', 'D', '1', '', 1),
(4, 'asf DA AF?ASF ', '2', 'DQD', 'D', 'D', 'QD', '4', '', 1),
(5, 'asf DA AF?SC ', '2', 'DQD', 'D', 'D', 'QD', '4', '', 1),
(6, 'asf DA AF?', '2', 'DQD', 'D', 'D', 'QD', '4', '', 1),
(7, 'adadad da ad one ?', '4', 'dsfasd', 'sadfsad', 'sadf', 'sdfsadf', '2', '', 1),
(8, 'sdfsadfasd', '4', 'sadfsadf', 'sdfsd', 'sadfs', 'sdfsadf', '1', '', 1),
(9, 'sdfsdfsadf', '4', 'sdfsadfsdf', 'fsdfsadf', 'sdfsdfsdf', 'sdfsdfsdf', '3', 'public/quiz/banner-shape19.png', 1),
(10, 'fdgsdfg', '4', 'dsfgdsf', 'gdfgdfg', 'dfgdfg', 'gdfgdfg', '2', '', 1),
(11, 'A', '5', 'A', 'B', 'C', 'D', '1', 'public/quiz/blog-thumbnail.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `score_id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `quiz_id` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL COMMENT 'correct answers',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`score_id`, `student_id`, `quiz_id`, `score`, `created_at`, `status`) VALUES
(1, '', '2', '1', '2022-01-23 21:21:04', 1),
(2, '', '2', '1', '2022-01-23 21:23:03', 1),
(3, '', '2', '3', '2022-01-23 21:23:23', 1),
(4, '', '2', '3', '2022-01-23 21:23:48', 1),
(5, '', '2', '3', '2022-01-23 21:25:08', 1),
(6, '', '2', '0', '2022-01-23 21:25:17', 1),
(7, '', '1', '0', '2022-01-23 21:30:01', 1),
(8, '', '1', '0', '2022-01-23 21:30:26', 1),
(9, '', '2', '0', '2022-01-23 21:30:29', 1),
(10, '', '1', '0', '2022-01-23 21:30:33', 1),
(11, '', '2', '2', '2022-01-23 21:31:19', 1),
(12, '', '1', '0', '2022-01-23 21:31:36', 1),
(13, '', '2', '2', '2022-01-23 21:31:56', 1),
(14, '', '2', '0', '2022-01-25 08:01:09', 1),
(15, '', '1', '0', '2022-01-25 08:01:20', 1),
(16, '', '1', '0', '2022-01-25 08:01:29', 1),
(17, '', '2', '2', '2022-01-25 08:01:38', 1),
(18, '', '2', '0', '2022-01-25 09:03:07', 1),
(19, '', '4', '2', '2022-01-25 17:21:02', 1),
(20, '', '4', '0', '2022-01-25 17:21:13', 1),
(21, '', '4', '1', '2022-01-25 17:21:30', 1),
(22, '', '4', '1', '2022-01-25 17:21:54', 1),
(23, '', '4', '1', '2022-01-25 17:22:05', 1),
(24, '', '2', '0', '2022-01-25 17:22:37', 1),
(25, '', '2', '0', '2022-01-25 17:22:48', 1),
(26, '', '2', '0', '2022-01-25 17:24:11', 1),
(27, '', '2', '0', '2022-01-25 17:24:14', 1),
(28, '', '2', '0', '2022-01-25 17:24:16', 1),
(29, '', '2', '0', '2022-01-25 17:24:29', 1),
(30, '', '4', '0', '2022-01-26 18:11:13', 1),
(31, '', '4', '0', '2022-01-26 18:11:22', 1),
(32, '', '4', '0', '2022-01-27 10:34:02', 1),
(33, '', '4', '0', '2022-01-27 10:34:12', 1),
(34, '', '2', '0', '2022-01-27 10:34:17', 1),
(35, '', '2', '0', '2022-01-27 10:34:22', 1),
(36, '', '4', '1', '2022-01-27 10:36:13', 1),
(37, '', '2', '0', '2022-01-27 10:36:28', 1),
(38, '', '2', '0', '2022-01-27 11:08:10', 1),
(39, '', '2', '0', '2022-01-27 11:08:18', 1),
(40, '', '2', '0', '2022-01-27 12:13:55', 1),
(41, '', '4', '0', '2022-01-27 14:39:56', 1),
(42, '', '5', '0', '2022-02-08 09:58:31', 1),
(43, '', '5', '0', '2022-02-08 13:41:18', 1),
(44, '', '5', '0', '2022-02-08 13:42:02', 1),
(45, '', '5', '0', '2022-02-08 13:43:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regular_plan`
--

CREATE TABLE `regular_plan` (
  `regular_plan_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `parentName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `plan_type` int(250) NOT NULL COMMENT '1 regular 2 weekly 3 monthly',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regular_plan`
--

INSERT INTO `regular_plan` (`regular_plan_id`, `name`, `parentName`, `email`, `phone`, `grade`, `subject`, `topic`, `plan_type`, `created_at`, `status`) VALUES
(1, 'hemant', 'h.s mehra', 'hemant1998birthday@gmail.com', '6776111311', 'PG', 'Mechine learning', 'DSA', 1, '2022-01-21 19:01:30', 1),
(2, 'Jsbdb Nrns', 'h.s mehra', 'hemant1998birthday@gmail.com', '133131313', '78', 'Hindi', 'DSA', 1, '2022-01-21 19:04:21', 1),
(3, 'Jsbdb Nrns', 'h.s mehra', 'hemant1998birthday@gmail.com', '658568568', '13', '13', '242', 1, '2022-01-21 19:05:33', 1),
(4, 'Jsbdb Nrns', 'h.s mehra', 'hemant1998birthday@gmail.com', '1212121', '13', 'w', 'qd', 1, '2022-01-21 19:06:55', 1),
(5, 'Jsbdb Nrns', 'h.s mehra', 'hemant1998birthday@gmail.com', '53535325', '78', 'saf', 'qfd', 1, '2022-01-21 19:09:39', 1),
(6, 'Jsbdb Nrns', 'fdqd', 'hemant1998biray@gmail.com', '2355555555', 'asf', 'wf', 'wf', 1, '2022-01-21 19:14:42', 1),
(7, 'cas', 'wf', 'fwf@qs.com', '241241241', 'sc', 'wf', 'fwf', 1, '2022-01-21 19:17:19', 1),
(8, 'asf', 'assf', 'd@qw.com', '131313', 'qeqe', 'w', 'w1', 1, '2022-01-21 19:19:03', 1),
(9, 'Jsbdb Nrns', 'h.s mehra', 'hemabirthday@gmail.com', '33325325', '13', 'wf', 'wf', 1, '2022-01-21 19:21:45', 1),
(10, 'Jsbdb Nrns', 'h.s mehra', 'hemabirhday@gmail.com', '33325325', '13', 'wf', 'wf', 1, '2022-01-21 19:24:39', 1),
(11, 'Jsbdb Nrns', 'h.s mehra', 'sfsfj@gmail.com', '33325325', '13', 'wf', 'wf', 1, '2022-01-26 08:28:38', 2),
(12, 'Jsbdb Nrns', 'h.s mehra', 'qw', '1212121', '1212', '131', 'e2e', 2, '2022-01-21 19:47:06', 1),
(13, 'Jsbdb Nrns', 'h.s mehra', 'hemant199', '1212121', '1212', '131', 'e2e', 2, '2022-01-21 19:48:13', 1),
(14, 'asfsaf', 'wf', 'wf@ad.com', '2314', '242', 'wr', 'wf', 2, '2022-01-21 19:48:36', 1),
(15, 'Jsbdb Nrns', '24515412', 'hemant1998birthday@gmail.com', '6395465569', 'asf', 'wf', 'wgf', 2, '2022-01-21 19:50:47', 2),
(16, 'Jsbdb Nrns', 'h.s mehra', 'hemant1998birthday@gmail.com', '124124124', 'qwr', 'fef', 'qwf', 3, '2022-01-21 19:59:04', 2),
(17, 'jufuf', '3', 'w@gmail.com', '3', '45454545', '454545', '5495', 1, '2022-01-24 11:15:37', 1),
(18, 'jufuf', '3', 'w@gmail.com', '2', '45454545', '343434', '5495', 2, '2022-01-24 11:16:01', 1),
(19, 'quiz', '3', 'w@gmail.com', '5', '45454545', '343434', '5495', 3, '2022-01-24 11:16:22', 1),
(20, 'sd', 'asd', 'asd@gmail.com', '445645', 'dfrd', 'sdf', 'sdfds', 1, '2022-01-27 10:03:13', 1),
(21, 'test', 'tsest', 'testing@gmail.com', '12345678', '1', 'hinfi', 'sfr', 1, '2022-01-27 10:39:20', 1),
(22, 'shgds', 'adsd', 'bakrolarahul@gmail.com', '2434355', '3535', '3gg', 'dgd', 1, '2022-01-27 10:42:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `remarks_sessions`
--

CREATE TABLE `remarks_sessions` (
  `remark_id` int(11) NOT NULL,
  `sessionID` varchar(250) NOT NULL,
  `sessionStatus` int(20) NOT NULL COMMENT '1 present 2 absent 3 null void',
  `topic_covered` text NOT NULL,
  `next_topic` text NOT NULL,
  `homework_status` int(11) NOT NULL COMMENT '1 done 2 not done',
  `remarks` varchar(250) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '1 admin updated 2 student paid 0 NA',
  `payable_amount` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remarks_sessions`
--

INSERT INTO `remarks_sessions` (`remark_id`, `sessionID`, `sessionStatus`, `topic_covered`, `next_topic`, `homework_status`, `remarks`, `payment_status`, `payable_amount`, `status`) VALUES
(1, '2', 1, 'NA', 'same as of today', 2, 'student was not present.', 0, '', 1),
(2, '4', 1, 'sad', 'qd', 2, 'dq', 1, '679', 1),
(3, '3', 1, 'ad', 'dw', 1, 'q', 1, '679', 1),
(4, '1', 1, 'af', 'dq', 1, 'qd', 0, '', 1),
(5, '5', 1, 'ok', 'okok', 1, 'ok', 1, '679', 1),
(6, '18', 1, 'bda', 'chotu', 1, 'chotu bda', 0, '', 1),
(7, '19', 1, 'Done', 'Done', 1, 'Good', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_card`
--

CREATE TABLE `report_card` (
  `report_card_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `student` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `strength` varchar(250) NOT NULL,
  `weekness` text NOT NULL,
  `suggestions` text NOT NULL,
  `upcoming_events` text NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_card`
--

INSERT INTO `report_card` (`report_card_id`, `grade`, `student`, `subject`, `topic`, `strength`, `weekness`, `suggestions`, `upcoming_events`, `status`) VALUES
(1, '4', '3', '1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, voluptas, nobis ad expedita architecto facere\r\nveniam, vitae at earum adipisci in eos laudantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, voluptas, nobis ad expedita architecto facere\r\nveniam, vitae at earum adipisci in eos laudantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, voluptas, nobis ad expedita architecto facere\r\nveniam, vitae at earum adipisci in eos laudantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, voluptas, nobis ad expedita architecto facere\r\nveniam, vitae at earum adipisci in eos laudantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, voluptas, nobis ad expedita architecto facere\r\nveniam, vitae at earum adipisci in eos laudantium.', 1),
(2, '6', '4', '10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', ' Libero illo dolor, voluptas, nobis ad expedita architecto facere veniam, vitae at earum adipisci in eos laudantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, volupta', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, volupta', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero illo dolor, volupta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reschedule_class`
--

CREATE TABLE `reschedule_class` (
  `reschedule_id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reschedule_class`
--

INSERT INTO `reschedule_class` (`reschedule_id`, `student`, `email`, `phone`, `date`, `time`, `message`, `created_at`, `status`) VALUES
(1, 3, 'asas@adad.com', '131', '2022-02-10', '02:52:00', 'zvsfxzc ', '2022-02-03 22:18:44', 1),
(2, 3, 'asas@adad.com', '131', '2022-02-10', '02:52:00', 'zvsf', '2022-02-03 22:15:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_billing`
--

CREATE TABLE `student_billing` (
  `student_bill_id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `paid_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount_paid` int(250) NOT NULL,
  `status` int(100) NOT NULL COMMENT '1 pending 2 confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `study_materials`
--

CREATE TABLE `study_materials` (
  `study_materials_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `student` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 to admin 2 approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_materials`
--

INSERT INTO `study_materials` (`study_materials_id`, `title`, `grade`, `student`, `subject`, `file`, `status`) VALUES
(1, 'testing one', '4', '9', '13', 'public/Teachers/uploads/study_materials/Alba Educations _ Curriculum (3).pdf', 1),
(2, 'gaurav', '9', '16', '16', 'public/Teachers/uploads/study_materials/naruto-g94c8c008c_1920 (6).png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `status`) VALUES
(1, 'Hindi', 1),
(2, 'English', 1),
(3, 'Maths', 1),
(4, 'History', 1),
(5, 'Music', 1),
(6, 'Graphic designing', 1),
(7, 'Bachelor of computer and  application', 1),
(8, 'Physics', 1),
(9, 'Geography', 1),
(10, 'Science', 1),
(11, 'NDA', 1),
(12, '343434', 1),
(13, 'MATHEMATICS', 1),
(14, 'anika maths ', 1),
(15, 'MATHEMATICS sirihaasa', 1),
(16, 'art', 1),
(17, 'Thermo', 1),
(18, 'MATHS AND ENGLISH', 1),
(19, 'ENGLISH AND MATHS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_students`
--

CREATE TABLE `subjects_students` (
  `sub_std_id` int(11) NOT NULL,
  `subject_id` int(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_students`
--

INSERT INTO `subjects_students` (`sub_std_id`, `subject_id`, `student_id`, `status`) VALUES
(1, 18, 16, 1),
(2, 16, 16, 1),
(3, 13, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_teachers`
--

CREATE TABLE `subjects_teachers` (
  `subjects_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_teachers`
--

INSERT INTO `subjects_teachers` (`subjects_teacher_id`, `teacher_id`, `subject_id`, `status`) VALUES
(1, 16, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_curriculums`
--

CREATE TABLE `teachers_curriculums` (
  `t_curriculum_id` int(11) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `teacher` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_curriculums`
--

INSERT INTO `teachers_curriculums` (`t_curriculum_id`, `grade`, `subject`, `teacher`, `file`, `created_at`, `status`) VALUES
(1, '4', '2', '1', 'public/Admin/uploads/curriculum_teacher/Add_subject.php', '2022-01-27 07:24:23', 1),
(2, '4', '1', '1', 'public/Admin/uploads/curriculum_teacher/Add_subject.php', '2022-01-27 07:24:23', 1),
(3, '10', '17', '10', 'public/Admin/uploads/curriculum_teacher/naruto-g94c8c008c_1920.png', '2022-02-08 08:25:03', 1),
(4, '9', '13', '15', 'public/Admin/uploads/curriculum_teacher/naruto-g94c8c008c_1920 (6).png', '2022-02-22 08:38:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_enquiry`
--

CREATE TABLE `teacher_enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `query_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_enquiry`
--

INSERT INTO `teacher_enquiry` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `country`, `state`, `city`, `pincode`, `skills`, `reason`, `resume`, `query_time`, `status`) VALUES
(1, 'ada', 'qdqd', 'dqd@qs.com', 24, 'wdq ada ad ', 'qrq', 'qw', 'wf', '242', 'qeq dda da a.', 'qaha djad jhad jdfs wrw .', 'public/Admin/uploads/resumesTeachers/circle.png', '2021-12-13 18:18:00', 1),
(2, 'dfggd', '', 'w@gmail.com', 7778889, 'g', 'iu', 'hiuhoihiuh', 'oih', '', 'oiuh', 'oiu', 'public/Admin/uploads/resumesTeachers/module_table_top.png', '2022-01-24 11:44:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedback`
--

CREATE TABLE `teacher_feedback` (
  `teacher_feedback_id` int(11) NOT NULL,
  `student` varchar(250) NOT NULL,
  `teacher` varchar(250) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_feedback`
--

INSERT INTO `teacher_feedback` (`teacher_feedback_id`, `student`, `teacher`, `feedback`, `status`) VALUES
(1, '3', 'Alias name', 'He is ok.. teaches good.', 1),
(2, '16', 'Sam', 'fsadfasdf~~', 1),
(3, '16', 'Sam', 'sfsf sfaxc ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_request_certificate`
--

CREATE TABLE `teacher_request_certificate` (
  `request_certificate_id` int(11) NOT NULL,
  `student` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `achievement` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_request_curriculum`
--

CREATE TABLE `teacher_request_curriculum` (
  `request_cur_id` int(11) NOT NULL,
  `requested_text` varchar(250) NOT NULL,
  `curriculum_id` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_request_curriculum`
--

INSERT INTO `teacher_request_curriculum` (`request_cur_id`, `requested_text`, `curriculum_id`, `status`) VALUES
(1, 'Please change the timing for evening.. ', 1, 1),
(2, 'Please change this time around 10-12pm', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests_results`
--

CREATE TABLE `tests_results` (
  `test_id` int(11) NOT NULL,
  `h_title` varchar(250) NOT NULL,
  `grade` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL COMMENT '0 is admin uploaded',
  `subject` int(11) NOT NULL,
  `h_file` varchar(250) NOT NULL,
  `last_date_submission` date NOT NULL,
  `student_submitted_file` varchar(250) NOT NULL,
  `student_submitted_at` date NOT NULL,
  `status` int(50) NOT NULL COMMENT '1 teacher updated 2 admin approved 3 admin declined 4 student submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests_results`
--

INSERT INTO `tests_results` (`test_id`, `h_title`, `grade`, `student`, `teacher`, `subject`, `h_file`, `last_date_submission`, `student_submitted_file`, `student_submitted_at`, `status`) VALUES
(2, 'Question and assignments', 4, 3, 4, 5, 'public/Teachers/uploads/homeworks/2.pdf', '2021-12-30', 'public/Students/uploads/homeworks/3.pdf', '2021-12-20', 2),
(3, 'eassay on Quantm phy formats', 6, 3, 0, 1, 'public/Teachers/uploads/homeworks/4.pdf', '2021-12-30', 'public/Students/uploads/homeworks/2.pdf', '2021-12-20', 2),
(4, 'hw', 4, 3, 0, 5, 'public/Teachers/uploads/homeworks/3.pdf', '2021-12-22', 'public/Students/uploads/homeworks/5.pdf', '2021-12-21', 4),
(5, 'op', 4, 3, 1, 8, 'public/Teachers/uploads/tests/blog-thumbnail.jpg', '0000-00-00', '', '0000-00-00', 1),
(6, 'gg', 4, 8, 1, 13, 'public/Teachers/uploads/tests/blog-thumbnail.jpg', '0000-00-00', '', '0000-00-00', 1),
(7, 'g', 4, 8, 1, 13, 'public/Teachers/uploads/tests/blog-thumbnail.jpg', '0000-00-00', '', '0000-00-00', 1),
(8, 'Thermo', 10, 11, 1, 16, 'public/Teachers/uploads/tests/naruto-g94c8c008c_1920.png', '0000-00-00', '', '0000-00-00', 2),
(9, 'ga', 10, 11, 15, 16, 'public/Teachers/uploads/tests/blog-thumbnail.jpg', '0000-00-00', '', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `admin_email` varchar(245) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`admin_id`, `username`, `admin_email`, `password`, `status`) VALUES
(1, 'admin', 'admin@admin.com', 'albaadmin#@1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_students`
--

CREATE TABLE `users_students` (
  `user_student_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email_main` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(150) NOT NULL,
  `timeZone` varchar(100) NOT NULL,
  `idProof` varchar(250) NOT NULL,
  `addmissiomDate` date NOT NULL,
  `currentSession` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `feePerSession` varchar(110) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `fatherPhone` int(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `motherPhone` int(100) NOT NULL,
  `idProofParent` varchar(150) NOT NULL,
  `username` varchar(250) NOT NULL,
  `student_email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_students`
--

INSERT INTO `users_students` (`user_student_id`, `name`, `gender`, `email_main`, `address`, `phone`, `dob`, `city`, `state`, `country`, `timeZone`, `idProof`, `addmissiomDate`, `currentSession`, `grade`, `subject`, `feePerSession`, `fatherName`, `fatherPhone`, `motherName`, `motherPhone`, `idProofParent`, `username`, `student_email`, `password`, `status`) VALUES
(3, 'Hemant', '1', 'hemant1998birthday@gmail.com', 'Snns ad DD d Ad AD.', '9867453453', '2021-12-14', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/students/about-img1.png', '2021-12-23', '2', '4', '8', '200', 'qdd', 999, 'dg', 998854, 'public/Admin/uploads/parents/about-img2.png', 'albauser@#1', 'hemant1998birthday@gmail.com', '2c89193fe0e9ad38fac336069971253a', 1),
(4, 'Manish', '1', 'hemaas8birthday@gmail.com', 'Snns S SFS SF FSF.', '7823563423', '2021-12-14', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/students/about-img1.png', '2021-12-23', '2', '6', '1', '300', 'qdd', 999, 'dg', 998854, 'public/Admin/uploads/parents/about-img2.png', 'albauser@#2', 'hemant1998birthday@gmail.com', 'd343a3bea0ef5ab9acb55f8efcaddf10', 1),
(5, 'Hemant123', '1', 'hemant1998birthday@gmail.com', 'Snns ad DD d Ad AD.', '9867453453', '2021-12-14', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/students/about-img1.png', '2021-12-23', '2', '4', '1', '200', 'qdd', 999, 'dg', 998854, 'public/Admin/uploads/parents/about-img2.png', 'albauser@#13', 'hemantbirthday@gmail.com', 'd343a3bea0ef5ab9acb55f8efcaddf10', 1),
(6, 'Manish123', '1', 'hemaas8birthday@gmail.com', 'Snns S SFS SF FSF.', '7823563423', '2021-12-14', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/students/about-img1.png', '2021-12-23', '2', '6', '2', '300', 'qdd', 999, 'dg', 998854, 'public/Admin/uploads/parents/about-img2.png', 'albauser@#4', 'hemantbirthday@gmail.com', 'd343a3bea0ef5ab9acb55f8efcaddf10', 1),
(12, 'Gaurav', '1', 'igaurav@gmail.com', 'Dehradun', '9876543210', '2021-02-12', 'Dehradun', 'Uttrakhand', 'India', 'Ist', 'public/Admin/uploads/students/Screenshot (1).png', '2022-02-10', '1', '11', '13', '100', 'Gaurav', 2147483647, 'Gaur', 2147483647, 'public/Admin/uploads/parents/Screenshot (1).png', 'igaurav', 'igaurav@gmail.com', '910be72d22e04e452347184adfc658cd', 1),
(14, 'Rahul', '1', 'rahul@gmail.com', 'Dehradun', '7894561230', '1998-04-04', 'Dehradun', 'uttrakhand', 'India', 'IST', 'public/Admin/uploads/students/naruto-g94c8c008c_1920 (3).png', '2022-02-12', '1', '12', '8', '600', 'Gaurav', 2147483647, 'Gaurav', 2147483647, 'public/Admin/uploads/parents/naruto-g94c8c008c_1920 (3).png', 'rahul', 'rahul@gmail.com', '7b7f71bff78951c020e9c647a32bb839', 1),
(15, 'Zabaar Khan', '1', 'zabbaar@gmail.com', 'Dehradun', '3', '2009-02-11', 'Dehradun', 'Uttrakhand', 'India', 'IST', 'public/Admin/uploads/students/blog-thumbnail (2).jpg', '2022-02-11', '1', '4', '1', '600', 'Gaurav', 2147483647, 'Gaurav', 987644, 'public/Admin/uploads/parents/blog-thumbnail (2).jpg', 'zabaar', 'zabbaar@gmail.com', '852b6e1760b84a9e630952d2efbe53f9', 1),
(16, 'Chotu', '1', 'chotu@gmail.com', 'Dehradun', '7894561230', '2001-03-15', 'Dehradun', 'uttrakhand', 'India', 'IST', 'public/Admin/uploads/students/naruto-g94c8c008c_1920 (4).png', '2022-02-15', '1', '9', '13', '600', 'Gaurav', 2147483647, 'Gaurav', 2147483647, 'public/Admin/uploads/parents/naruto-g94c8c008c_1920 (6).png', 'chotu', 'chotu@gmail.com', 'aeefda707afc92d95009360f751a7af9', 1),
(18, 'mini', '2', 'mini@gmail.com', 'mmm', '1245', '2022-01-31', 'state', 'state', 'India', 'ist', 'public/Admin/uploads/students/anika annswers.png', '2022-02-19', '2', '1', '16', '600', 'rakesh ', 12345, 'rashmi ', 12345, 'public/Admin/uploads/parents/anika annswers.png', 'mini', 'mini@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_teachers`
--

CREATE TABLE `users_teachers` (
  `user_teacher_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `aliaName` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email_main` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(150) NOT NULL,
  `timeZone` varchar(100) NOT NULL,
  `idProof` varchar(250) NOT NULL,
  `addmissiomDate` date NOT NULL,
  `currentSession` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL COMMENT 'currently used to fetch subjects during regist',
  `subject` varchar(100) NOT NULL,
  `feePerSession` varchar(110) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `fatherPhone` int(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `motherPhone` int(100) NOT NULL,
  `idProofParent` varchar(150) NOT NULL,
  `username` varchar(250) NOT NULL,
  `teacher_email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_teachers`
--

INSERT INTO `users_teachers` (`user_teacher_id`, `name`, `aliaName`, `gender`, `email_main`, `address`, `phone`, `dob`, `city`, `state`, `country`, `timeZone`, `idProof`, `addmissiomDate`, `currentSession`, `grade`, `subject`, `feePerSession`, `fatherName`, `fatherPhone`, `motherName`, `motherPhone`, `idProofParent`, `username`, `teacher_email`, `password`, `status`) VALUES
(1, 'Martin', 'Alias Name1', '2', 'hemant1998birthday@gmail.com', 'Snns', '98545555', '2021-12-23', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/teacher/blog-post-img3-150x150.jpg', '2021-12-30', '2', '10', '1', '100', 'qdd', 98545454, 'dg', 87454545, 'public/Admin/uploads/parentsTeacher/bird1.png', 'teacher', 'asas@adad.com', '2019405ed63b030cf038194e17a7f30b', 1),
(4, 'Jhon', 'Alias Name2', '1', 'hemanbirthday@gmail.com', 'Snns', '98545555', '2021-12-23', 'Nsns', 'Daman and Diu', 'jhj', 'sdg', 'public/Admin/uploads/teacher/blog-post-img3-150x150.jpg', '2021-12-30', '2', '10', '8', '100', 'qdd', 98545454, 'dg', 87454545, 'public/Admin/uploads/parentsTeacher/bird1.png', 'teacher1', 'asas@adad.com', '2019405ed63b030cf038194e17a7f30b', 1),
(11, 'Gaurav', 'igaurav', '1', 'igaurav@gmail.com', 'De', '987654322', '2011-11-10', 'Dehradun', 'Uttrakhand', 'India', 'Ist', 'public/Admin/uploads/teacher/Screenshot (1).png', '2022-02-11', '1', '4', '1', '100', 'Gaurav', 2147483647, 'Gaur', 2147483647, 'public/Admin/uploads/parentsTeacher/Screenshot (1).png', 'teacherGaurav', 'igaurav@gmail.com', '910be72d22e04e452347184adfc658cd', 1),
(13, 'GauravT', 'CaptainAmerica2', '1', 'igaurav22@gmail.com', 'Dehradun', '9876543210', '2009-03-12', 'dehradun', 'uttrakhand', 'India', 'IST', 'public/Admin/uploads/teacher/blog-thumbnail (2).jpg', '2022-02-10', '1', '4', '3', '600', 'Gaurav', 987, 'Gaurav', 87887, 'public/Admin/uploads/parentsTeacher/blog-thumbnail (2).jpg', 'gauravTeacher1', 'igaurav22@gmail.com', '910be72d22e04e452347184adfc658cd', 1),
(15, 'Bda', 'superman', '1', 'bda@gmail.com', 'Dehradun', '7894561230', '1998-10-22', 'Dehradun', 'Uttrakhand', 'India', 'IST', 'public/Admin/uploads/teacher/naruto-g94c8c008c_1920 (4).png', '2022-02-15', '1', '9', '13', '600', 'Gaurav', 12, 'Gaurav', 333333333, 'public/Admin/uploads/parentsTeacher/naruto-g94c8c008c_1920 (4).png', 'bda', 'bda@gmail.com', 'ab38583af1b4c302671cabef98f1b085', 1),
(16, 'Sam', 'CaptainAmerica', '1', 'sam@gmail.com', 'Dehradun', '7894561330', '2002-03-15', 'Dehradun', 'Uttrakhand', 'India', 'IST', 'public/Admin/uploads/teacher/naruto-g94c8c008c_1920 (6).png', '2022-02-15', '1', '6', '18', '600', 'Gaurav', 78945661, 'Gaurav', 2147483647, 'public/Admin/uploads/parentsTeacher/naruto-g94c8c008c_1920 (6).png', 'sam', 'sam@gmail.com', 'ba0e7885b32f0b4b52c51de350069a2f', 1),
(17, 'muzamil', 'muzza', '1', 'muzamil@gmail.com', 'nil', '12345', '2022-02-01', 'nil', 'nil', 'India', 'nil', 'public/Admin/uploads/teacher/anika annswers.png', '2022-02-01', '2', '1', '16', '100', 'nil', 12345, 'nil', 12345, 'public/Admin/uploads/parentsTeacher/anika annswers.png', 'muzamil', 'muzamil@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_audit_report`
--
ALTER TABLE `admin_audit_report`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `alba_educations.subjects_teachers`
--
ALTER TABLE `alba_educations.subjects_teachers`
  ADD PRIMARY KEY (`sub_std_id`);

--
-- Indexes for table `assignment_help`
--
ALTER TABLE `assignment_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_student`
--
ALTER TABLE `billing_student`
  ADD PRIMARY KEY (`student_billing_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `book_your_demo`
--
ALTER TABLE `book_your_demo`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `class_sessions`
--
ALTER TABLE `class_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`curriculum_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `grades_subjects`
--
ALTER TABLE `grades_subjects`
  ADD PRIMARY KEY (`grade_sub_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`homework_id`);

--
-- Indexes for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`newsletterSubscription_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `parent_counselling`
--
ALTER TABLE `parent_counselling`
  ADD PRIMARY KEY (`parent_counselling_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `regular_plan`
--
ALTER TABLE `regular_plan`
  ADD PRIMARY KEY (`regular_plan_id`);

--
-- Indexes for table `remarks_sessions`
--
ALTER TABLE `remarks_sessions`
  ADD PRIMARY KEY (`remark_id`);

--
-- Indexes for table `report_card`
--
ALTER TABLE `report_card`
  ADD PRIMARY KEY (`report_card_id`);

--
-- Indexes for table `student_billing`
--
ALTER TABLE `student_billing`
  ADD PRIMARY KEY (`student_bill_id`);

--
-- Indexes for table `study_materials`
--
ALTER TABLE `study_materials`
  ADD PRIMARY KEY (`study_materials_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subjects_students`
--
ALTER TABLE `subjects_students`
  ADD PRIMARY KEY (`sub_std_id`);

--
-- Indexes for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  ADD PRIMARY KEY (`subjects_teacher_id`);

--
-- Indexes for table `teachers_curriculums`
--
ALTER TABLE `teachers_curriculums`
  ADD PRIMARY KEY (`t_curriculum_id`);

--
-- Indexes for table `teacher_enquiry`
--
ALTER TABLE `teacher_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_feedback`
--
ALTER TABLE `teacher_feedback`
  ADD PRIMARY KEY (`teacher_feedback_id`);

--
-- Indexes for table `teacher_request_certificate`
--
ALTER TABLE `teacher_request_certificate`
  ADD PRIMARY KEY (`request_certificate_id`);

--
-- Indexes for table `teacher_request_curriculum`
--
ALTER TABLE `teacher_request_curriculum`
  ADD PRIMARY KEY (`request_cur_id`);

--
-- Indexes for table `tests_results`
--
ALTER TABLE `tests_results`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users_students`
--
ALTER TABLE `users_students`
  ADD PRIMARY KEY (`user_student_id`);

--
-- Indexes for table `users_teachers`
--
ALTER TABLE `users_teachers`
  ADD PRIMARY KEY (`user_teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_audit_report`
--
ALTER TABLE `admin_audit_report`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `alba_educations.subjects_teachers`
--
ALTER TABLE `alba_educations.subjects_teachers`
  MODIFY `sub_std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assignment_help`
--
ALTER TABLE `assignment_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_student`
--
ALTER TABLE `billing_student`
  MODIFY `student_billing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_your_demo`
--
ALTER TABLE `book_your_demo`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_sessions`
--
ALTER TABLE `class_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `curriculum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grades_subjects`
--
ALTER TABLE `grades_subjects`
  MODIFY `grade_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  MODIFY `newsletterSubscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_counselling`
--
ALTER TABLE `parent_counselling`
  MODIFY `parent_counselling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `regular_plan`
--
ALTER TABLE `regular_plan`
  MODIFY `regular_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `remarks_sessions`
--
ALTER TABLE `remarks_sessions`
  MODIFY `remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report_card`
--
ALTER TABLE `report_card`
  MODIFY `report_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_billing`
--
ALTER TABLE `student_billing`
  MODIFY `student_bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_materials`
--
ALTER TABLE `study_materials`
  MODIFY `study_materials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects_students`
--
ALTER TABLE `subjects_students`
  MODIFY `sub_std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  MODIFY `subjects_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers_curriculums`
--
ALTER TABLE `teachers_curriculums`
  MODIFY `t_curriculum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_enquiry`
--
ALTER TABLE `teacher_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_feedback`
--
ALTER TABLE `teacher_feedback`
  MODIFY `teacher_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_request_certificate`
--
ALTER TABLE `teacher_request_certificate`
  MODIFY `request_certificate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_request_curriculum`
--
ALTER TABLE `teacher_request_curriculum`
  MODIFY `request_cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests_results`
--
ALTER TABLE `tests_results`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_students`
--
ALTER TABLE `users_students`
  MODIFY `user_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_teachers`
--
ALTER TABLE `users_teachers`
  MODIFY `user_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
