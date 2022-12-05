-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 03:25 PM
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
-- Database: `student_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `adminid` int(30) NOT NULL,
  `email` varchar(30) NOT NULL COMMENT 'email id',
  `pass` varchar(30) NOT NULL COMMENT 'password'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`adminid`, `email`, `pass`) VALUES
(1, 'yogeshzala1511@gmail.com', '1511');

-- --------------------------------------------------------

--
-- Table structure for table `college_info`
--

CREATE TABLE `college_info` (
  `collegeid` int(30) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'email id',
  `pass` varchar(30) NOT NULL COMMENT 'password',
  `collegename` varchar(100) NOT NULL COMMENT 'collegename',
  `collegetype` varchar(20) NOT NULL COMMENT 'collegetype',
  `img` text NOT NULL COMMENT 'image',
  `mobno` bigint(10) NOT NULL COMMENT 'mobile no',
  `city` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL COMMENT 'address',
  `approved` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college_info`
--

INSERT INTO `college_info` (`collegeid`, `email`, `pass`, `collegename`, `collegetype`, `img`, `mobno`, `city`, `address`, `approved`) VALUES
(1, 'cusp@gmail.com', 'cusp', 'C. U. Shah Polytechnic', 'Government', 'college_profile/c-u-shah-polytechnic.jpg', 2752243494, 'Surendranagar', 'Nr. Boda Talav, GIDC Area, Wadhawan City, Surendranagar, Gujarat 363035', 1),
(8, 'mpshahas@gmail.com', 'mpshahas', 'Shree M.P. Shah Arts & Science College', 'Government', 'college_profile/m-p-shah-arts-science.jpg', 9658423575, 'Surendranagar', 'Bus Stand Road, Opposite Bank of Maharashtra, Surendranagar, Gujarat 363002', 1),
(9, 'spnvtc@gmail.com', 'spnvtc', 'Shree Pandit Nathulalji Vyas Technical Campus (SPN)', 'Private', 'college_profile/spnvtc.jpg', 9978983768, 'Surendranagar', 'Shree Pandit Nathulalji Vyas Technical Campus Workshop Road, Gujarat 363030', 1),
(10, 'mpshahc@gmail.com', 'mpshahc', 'Shri M. P. Shah Commerce College', 'Government', 'college_profile/m-p-shah-commerce.jpg', 9095486251, 'Surendranagar', 'Bus Stand Road, Near S.T. Stand, Ram Nagar, Wadhwan, Surendranagar, Gujarat 363002', 1),
(11, 'spi@gmail.com', 'spi', 'Sarvodaya Polytechnic Institute (SPI)', 'Government', 'college_profile/spi.png', 705862464, 'Surendranagar', 'SH 20 Limbadi to Dhandhuka Road, Gujarat 363421', 1),
(12, 'sspjain@gmail.com', 'sspjain', 'S. S. P. Jain Arts And Commerce College', 'Government', 'college_profile/s-s-p-jain.png', 282310, 'Surendranagar', 'S. S. P. Jain Commerce College, Narshipara Dhrangadhra - 363310, Gujarat', 1),
(13, 'bkmody@gmail.com', 'bkmody', 'B. K. Mody Government Pharmacy College', 'Government', 'college_profile/b-k-mody.png', 912812387156, 'Rajkot', 'Polytechnic Campus, Nr. Ajidam Bhavangar Road, Rajkot', 1),
(14, 'christ@gmail.com', 'christ', 'Christ College', 'Private', 'college_profile/christ.jpg', 9427164732, 'Rajkot', 'Vidya Niketan, P. B. No : 5, Rajkot - 360 005, Gujarat', 1),
(15, 'gecrajkot@gmail.com', 'gecrajkot', 'Government Engineering College, Rajkot', 'Government', 'college_profile/g-e-c-rajkot.png', 2812924062, 'Rajkot', 'Government Engineering College, Mavadi-Kankot Road, Near Krishna Nagar, Rajkot-360005, Gujarat\r\n', 1),
(17, 'ld@gmail.com', 'ld', 'L. D. College Of Engineering', 'Government', 'college_profile/ld.png', 7926302887, 'Ahmedabad', '120, Circular Road, University Area, Ahmedabad, Gujarat 380015', 1),
(18, 'lj@gmail.com', 'lj', ' L. J. College Of Commerce', 'Private', 'college_profile/lj.jpg', 7621942760, 'Ahmedabad', 'LJ Campus, New LJ Commerce College Premises, Opp. Divya Bhaskar Press, Near Andaz Party Plot, S. G. Highway, Ahmedabad, Gujarat 382210', 0),
(20, 'stxaviers@gmail.com', 'stxaviers', 'St. Xavier\'S College', 'Private', 'college_profile/st-xaviers.jpg', 1234554321, 'Ahmedabad', 'St. Xavier\'s College, P. B. 4168, Navrangpura, Ahmedabad, Gujarat', 0),
(22, 'vpmp@gmail.com', 'vpmp', 'V. P. M. P. Polytechnic College', 'Government', 'college_profile/vpmp.jpg', 7923244430, 'Ahmedabad', 'LDRP-ITR Campus, Nr. ITI, Kh – 5 Circle,\r\nSector – 15, Gandhinagar – 382015', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_review`
--

CREATE TABLE `college_review` (
  `clgrevid` int(30) NOT NULL,
  `studentid` int(30) NOT NULL,
  `collegeid` int(30) NOT NULL,
  `review` text NOT NULL COMMENT 'reviews',
  `rate` int(5) NOT NULL COMMENT 'rating',
  `date` date NOT NULL COMMENT 'date'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college_review`
--

INSERT INTO `college_review` (`clgrevid`, `studentid`, `collegeid`, `review`, `rate`, `date`) VALUES
(1, 21, 1, 'In our college very good opportunity for placements and jobs. Our college every year more of the events and many type of activities and program organize. In our college has good facility of workshop.\r\n', 4, '2020-06-18'),
(2, 7, 1, 'C u shah polytechnic college is government college all the faculty of college is high educated and high experience.\r\n', 5, '2020-06-18'),
(3, 23, 1, 'As per education system its over all best but about the structure of college is so poor as compared to other engineering colleges. Yes i know our college is government but need some improvement over old buildings and hostels building.\r\n', 3, '2020-06-18'),
(10, 29, 8, 'Not any bad remark for my college but even it is granted college staff of college were good.', 4, '2020-03-12'),
(11, 30, 17, 'Very nice educational system and good curricular activities in my college. Good professor always helpful for students get good direction for future, also get state level and national level competition technical and non-technical events.', 5, '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `courseid` int(30) NOT NULL,
  `collegeid` int(30) NOT NULL,
  `course` varchar(150) NOT NULL COMMENT 'course name',
  `year` int(4) NOT NULL COMMENT 'year',
  `fees` int(10) NOT NULL COMMENT 'fees'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`courseid`, `collegeid`, `course`, `year`, `fees`) VALUES
(1, 1, 'Diploma Computer Engineering (DCE)', 3, 3000),
(3, 1, 'Diploma Civil Engineering (DCE)', 3, 3000),
(4, 1, 'Diploma in Electrical Engineering (DEE)', 3, 3000),
(5, 1, 'Diploma Automobile Engineering (DAE)', 3, 3000),
(16, 8, 'Bachelor of Arts (BA)\r\n', 3, 1500),
(17, 8, 'Bachelor of Sciences (B.SC)', 3, 1500),
(52, 9, 'B.Tech. (Bachelor of Technology)', 3, 30000),
(19, 9, 'M.Tech. (Master of Technology)', 2, 27000),
(20, 9, 'Diploma in Civil Engineering', 3, 25020),
(21, 9, 'Diploma in Mechanical Engineering', 3, 25020),
(22, 9, 'Diploma in Electrical Engineering', 3, 25020),
(23, 9, 'B.E. in Civil Engineering', 4, 85400),
(24, 9, 'B.E. in Computer Science and Engineering', 4, 85400),
(89, 9, 'M.E. in Computer Engineering', 3, 14000),
(26, 10, 'Bachelor of Commerce (BCom)', 3, 3000),
(27, 10, 'Bachelor of Business Administration (BBA)', 3, 3000),
(28, 10, 'Master of Commerce (MCom)', 2, 5000),
(29, 11, 'Diploma in Electronics & Communication Engineering', 3, 3000),
(30, 11, 'Diploma Civil Engineering (DCE)\r\n', 3, 3000),
(31, 11, 'Diploma Mechanical Engineering (DME)\r\n', 3, 3000),
(32, 11, 'Diploma Computer Engineering (DCE)\r\n', 3, 3000),
(33, 11, 'Diploma in Electrical Engineering (DEE)\r\n', 3, 3000),
(34, 12, 'Bachelor of Arts (BA Economics)\r\n', 3, 15000),
(35, 12, 'Bachelor of Arts in English (BA English)\r\n', 3, 15000),
(36, 12, 'Bachelor of Arts (BA Gujarati)\r\n', 3, 15000),
(37, 12, 'Bachelor of Arts (BA Hindi)\r\n', 3, 15000),
(38, 12, 'Bachelor of Commerce (BCom)', 3, 15000),
(53, 13, 'BACHELOR OF PHARMACY (B.PHARM)', 4, 12450),
(54, 13, 'MASTER OF PHARMACY (M.PHARM)', 2, 6350),
(56, 13, 'DIPLOMA IN PHARMACY (D.PHARMA)', 2, 2150),
(59, 14, 'BACHELOR OF COMMERCE (B.COM)', 3, 19500),
(58, 14, 'BACHELOR OF SCIENCE (B.SC)', 3, 19500),
(60, 14, 'BACHELOR OF COMPUTER APPLICATIONS (BCA)', 3, 19500),
(61, 14, 'BACHELOR OF BUSINESS ADMINISTRATION (BBA) (MARKETING)', 3, 19500),
(62, 14, 'BACHELOR OF ARTS (BA) (FUNCTIONAL ENGLISH)', 3, 15000),
(63, 14, 'MASTER OF SCIENCE (M.SC) (MICROBIOLOGY)', 2, 25000),
(64, 15, 'Bachelor of Engineering (BE Civil Engineering)', 4, 6000),
(65, 15, 'Bachelor of Engineering (BE Mechanical Engineering)', 4, 6000),
(66, 15, 'BACHELOR OF TECHNOLOGY (B.TECH)', 4, 6000),
(67, 15, 'Bachelor of Engineering (BE Automobile Engineering)', 4, 6000),
(68, 15, 'Bachelor of Engineering (BE Computer Science & Engineering)', 4, 6000),
(69, 15, 'Bachelor of Engineering (BE Electronics & Communication Engineering)', 4, 6000),
(70, 15, 'Bachelor of Engineering (BE Instrumentation and Control Engineering)', 4, 6000),
(71, 1, 'Diploma Mechanical Engineering (DME)', 3, 3000),
(72, 17, 'Bachelor of Engineering (BE Computer Science & Engineering)', 4, 6000),
(73, 17, 'Bachelor of Engineering (BE Automobile Engineering)', 4, 6000),
(74, 17, 'Bachelor of Engineering (BE Civil Engineering)', 4, 6000),
(75, 17, 'Bachelor of Engineering (BE Biomedical Engineering)', 4, 6000),
(76, 17, 'Bachelor of Engineering (BE Electrical Engineering)', 4, 6000),
(77, 17, 'Bachelor of Engineering (BE Mechanical Engineering)', 4, 6000),
(78, 17, 'Master of Engineering (ME Computer Science and Engineering)', 2, 6000),
(79, 17, 'Master of Engineering (ME Electrical & Electronics)', 2, 6000),
(80, 17, 'Master of Engineering (ME Mechanical Engineering)', 2, 6000),
(81, 17, 'Master of Computer Applications (MCA)', 3, 10500),
(82, 17, 'MASTER OF TECHNOLOGY [M.TECH]', 2, 6000),
(83, 18, 'Bachelor of Commerce (BCom Advance Accounting And Auditing)', 3, 20000),
(84, 18, 'Bachelor of Commerce (BCom Statistics)', 3, 20000),
(85, 22, 'Bachelor of Engineering (BE Computer Engineering) ', 4, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `studentid` int(30) NOT NULL,
  `collegeid` int(30) NOT NULL,
  `courseid` int(30) NOT NULL,
  `email` varchar(30) NOT NULL COMMENT 'email',
  `pass` varchar(30) NOT NULL COMMENT 'password',
  `enno` bigint(12) NOT NULL COMMENT 'enrollment no',
  `sem` int(1) NOT NULL COMMENT 'semester',
  `fname` varchar(20) NOT NULL COMMENT 'first name',
  `lname` varchar(20) NOT NULL COMMENT 'last name',
  `mobno` bigint(10) NOT NULL COMMENT 'mobile no',
  `gender` varchar(20) NOT NULL COMMENT 'gender',
  `img` text NOT NULL,
  `address` varchar(100) NOT NULL COMMENT 'address',
  `approved` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`studentid`, `collegeid`, `courseid`, `email`, `pass`, `enno`, `sem`, `fname`, `lname`, `mobno`, `gender`, `img`, `address`, `approved`) VALUES
(7, 1, 1, 'yogeshzala1511@gmail.com', '1511', 176090307544, 5, 'Yogesh', 'Zala', 9409765922, 'male', 'student_profile/y.jpg', 'Near Ghat Gate, Opposite P. W. D. Dela, Shakti Krupa, dhrangadhra 363310', 1),
(21, 1, 1, 'hiren7534@gmail.com', '7534', 176090307534, 5, 'Hiren', 'Prajapati', 1234567890, 'male', 'student_profile/h.jpg', 'Dhrangadhra - 363310', 1),
(31, 1, 5, 'nick292002@gmail.com', 'nick', 176090307033, 6, 'Nikunj', 'Patel', 9484812301, 'male', 'img/profile.png', 'Ummiya Park Society, Limbdi - 363421', 1),
(23, 1, 1, 'abrar@gmail.com', 'abrar', 176090307517, 5, 'Abrar', 'Malek', 1234567892, 'male', 'student_profile/a.jpg', 'Surendranagar', 0),
(27, 1, 1, 'brij@gmail.com', 'brij', 176090307525, 5, 'Brij', 'Parmar', 1234567123, 'male', 'img/profile.png', 'Surendranagar', 0),
(33, 1, 4, 'vishal@gmail.com', 'vishal', 176090309069, 6, 'Vishal', 'Zala', 3213213215, 'male', 'img/profile.png', 'Dhrangadhra', 1),
(29, 8, 17, 'harshranpariya@gmail.com', 'harsh', 166090306517, 6, 'Harsh', 'Ranpariya', 6582456245, 'male', 'img/profile.png', 'Surendranagar', 0),
(30, 17, 72, 'nikunjgadra@gmail.com', 'nikunj', 156090307131, 7, 'Nikunj', ' Gadara', 6532489562, 'male', 'img/profile.png', 'Ahmedabad', 0),
(32, 22, 85, 'ompatel@gmail.com', 'om', 176090307530, 6, 'Om', 'Patel', 1234554321, 'male', 'img/profile.png', 'Ahmedabad', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `college_info`
--
ALTER TABLE `college_info`
  ADD PRIMARY KEY (`collegeid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `collegename` (`collegename`),
  ADD UNIQUE KEY `mobno` (`mobno`);

--
-- Indexes for table `college_review`
--
ALTER TABLE `college_review`
  ADD PRIMARY KEY (`clgrevid`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`studentid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `enno` (`enno`),
  ADD UNIQUE KEY `mobno` (`mobno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `adminid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `college_info`
--
ALTER TABLE `college_info`
  MODIFY `collegeid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `college_review`
--
ALTER TABLE `college_review`
  MODIFY `clgrevid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `courseid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `studentid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
