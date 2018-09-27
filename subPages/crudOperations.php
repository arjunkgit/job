-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 01:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregdata`
--

CREATE TABLE `adminregdata` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aName` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminregdata`
--

INSERT INTO `adminregdata` (`id`, `email`, `password`, `aName`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidateregdata`
--

CREATE TABLE `candidateregdata` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title` varchar(5) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(12) NOT NULL,
  `dob` text NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(20) NOT NULL,
  `address3` varchar(20) NOT NULL,
  `town` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `phone` int(12) NOT NULL,
  `mobile` int(12) NOT NULL,
  `linked` varchar(30) NOT NULL,
  `ResumeHeading` varchar(180) NOT NULL,
  `CurrentDesignation` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `TotalExp` varchar(10) NOT NULL,
  `CurrentComapany` varchar(20) NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `summary` varchar(500) NOT NULL,
  `empDetails` varchar(1000) NOT NULL,
  `proTitle` varchar(30) NOT NULL,
  `client` varchar(30) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `proDetails` varchar(500) NOT NULL,
  `profilePhoto` varchar(300) NOT NULL,
  `resumeUploadURL` varchar(1000) NOT NULL,
  `resumeUploadName` varchar(500) NOT NULL,
  `activatePro` int(2) NOT NULL,
  `deactivatePro` int(2) NOT NULL,
  `deletePro` int(2) NOT NULL,
  `createdBy` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidateregdata`
--

INSERT INTO `candidateregdata` (`id`, `email`, `password`, `title`, `fname`, `lname`, `dob`, `day`, `month`, `year`, `address1`, `address2`, `address3`, `town`, `country`, `phone`, `mobile`, `linked`, `ResumeHeading`, `CurrentDesignation`, `gender`, `TotalExp`, `CurrentComapany`, `pincode`, `summary`, `empDetails`, `proTitle`, `client`, `duration`, `proDetails`, `profilePhoto`, `resumeUploadURL`, `resumeUploadName`, `activatePro`, `deactivatePro`, `deletePro`, `createdBy`) VALUES
(14, 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'tt', 'fnan', 'lna', 'Wed Apr 19 1995 05:30:00 GMT+0530 (India Standard Time)', 17, '1992-04-13', 0, 'addres1', 'addre2', 'addre3', 'tw', 'cn', 5656234, 345345345, 'http://asdfsdf.cokm', 'heading', 'c', 'male', '2 years', 'inoc', 576565, 'My updated summary My updated summary My updated summary', 'emp deytails', '345345', 'cli', '', '', 'profilePhotos/user1paidJulyHDFC.JPG', 'uploadResume/user1empty2doc.docx', 'user1empty2doc.docx', 1, 0, 0, ''),
(13, 'Emp1@g.com', '86ea3363ba65c10f3f1ef299b126de29', 'asdf', 'Name', '', '2015-03-25', 3, 'February', 1984, 'F1', 'R2', 'G3', 'Town', 'india', 0, 9876765, 'Url', 'Thead', 'Ff', 'M', '4', 'Gpoiu', 65765, 'Sunday', 'Destination', 'Yg', 'Client', '5', 'Yg', 'profilePhotos/Emp118.jpg', '', '', 0, 0, 0, ''),
(16, 'diwakar@vyapakaweb.com', 'b33027e731dfd4614b0cefa27a681a09', 'Mr', 'Diwakar', '', 'Wed Mar 25 2015 05:30:00 GMT+0530 (India Standard Time)', 2, 'January', 1988, '', '', '', 'Town', 'india', 0, 2147483647, '', '5+ Years of Exp', '', '', '', 'Wipro', 0, '', '', '', '', '', '', 'profilePhotos/diwakarIMG_2712.JPG', '', '', 1, 0, 0, ''),
(17, 'manjupc2@gmail.com', '434e5b546fe03179476977234aea8b2e', 'Mr', 'manjula', 'Puttaswamaia', '2015-03-25', 1, 'January', 1985, 'Shankesh No 47N,, Gr', 'Rajajinagar  Bangalo', '', 'BENGALURU', 'india', 0, 2147483647, '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', 0, 0, 0, ''),
(48, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', '', 'user1', '', 'Mon Jul 27 2020 05:30:00 GMT+0530 (India Standard Time)', 0, '', 0, '1800, 3rd cross', 'Main gate', 'No 190, 2nd cross,', 'Nandini Layout', 'India', 0, 0, 'linked', '3 + Years of exp', 'Support Enginer', 'male', '12 Years', 'Wipro', 560031, 'ss', '', '', 'Cisco', '', '', 'profilePhotos/paidYEsJuly.JPG', '', '', 1, 0, 0, 'emp1@gmail.com'),
(44, 'user22@gmail.com', '87dc1e131a1369fdf8f1c824a6a62dff', 'Mr', 'user22', '', 'Tue Sep 04 2018 05:30:00 GMT+0530 (India Standard Time)', 0, 'null', 0, 'asdf', 'asdf', 'asdf', '', 'india', 0, 2147483647, 'asdf', 'asf', 'asdf', 'male', 'asdf', '', 0, '', '', '', '', '', '', 'profilePhotos/user22paidHDFc.JPG', '', '', 1, 0, 0, 'user22@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `defaultvalues`
--

CREATE TABLE `defaultvalues` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jobsPostLimit` int(22) NOT NULL,
  `createNewEmpLimit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defaultvalues`
--

INSERT INTO `defaultvalues` (`id`, `email`, `jobsPostLimit`, `createNewEmpLimit`) VALUES
(5, 'emp1@gmail.com', 10, 3),
(8, 'admin@gmail.com', 10, 0),
(12, 'manjupc2@gmail.com', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emphistory`
--

CREATE TABLE `emphistory` (
  `id` int(4) NOT NULL,
  `email` varchar(350) NOT NULL,
  `empHistory` varchar(2000) NOT NULL,
  `workedCompany` varchar(500) NOT NULL,
  `workedYear` varchar(10) NOT NULL,
  `workedMonth` varchar(20) NOT NULL,
  `workedJoinDate` varchar(100) NOT NULL,
  `workedEndDate` varchar(100) NOT NULL,
  `workedCurrentJob` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emphistory`
--

INSERT INTO `emphistory` (`id`, `email`, `empHistory`, `workedCompany`, `workedYear`, `workedMonth`, `workedJoinDate`, `workedEndDate`, `workedCurrentJob`) VALUES
(96, 'user1@gmail.com', 'asdf', 'asdf', '', '', 'Sat Sep 22 2018 00:00:00 GMT+0530 (India Standard Time)', 'Wed Sep 12 2018 00:00:00 GMT+0530 (India Standard Time)', 'false'),
(100, 'user22@gmail.com', '', 'asdf', '', '', '', '', ''),
(101, 'user1', 'asdf', 'asf', '', '', 'Wed Sep 12 2018 00:00:00 GMT+0530 (India Standard Time)', '', 'true'),
(102, 'user1', 'sadfasdfwerwe', 'asdf', '', '', 'Wed Sep 12 2018 00:00:00 GMT+0530 (India Standard Time)', 'Thu Sep 20 2018 00:00:00 GMT+0530 (India Standard Time)', '');

-- --------------------------------------------------------

--
-- Table structure for table `employerregdata`
--

CREATE TABLE `employerregdata` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyname` varchar(20) NOT NULL,
  `indtype` varchar(20) NOT NULL,
  `companyorconsult` varchar(20) NOT NULL,
  `contactpername` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `officeaddress` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mobile` int(12) NOT NULL,
  `alteremail` varchar(30) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `agree` varchar(10) NOT NULL,
  `getemail` varchar(10) NOT NULL,
  `trn_date` datetime NOT NULL,
  `jobsPostLimit` int(5) NOT NULL,
  `createNewEmpLimit` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employerregdata`
--

INSERT INTO `employerregdata` (`id`, `email`, `password`, `companyname`, `indtype`, `companyorconsult`, `contactpername`, `designation`, `officeaddress`, `country`, `city`, `pincode`, `mobile`, `alteremail`, `gst`, `agree`, `getemail`, `trn_date`, `jobsPostLimit`, `createNewEmpLimit`) VALUES
(44, 'emp2@gmail.com', '41ab3465e911f91509d3fae308f41f76', 'Infosys2', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(45, 'emp3@gmail.com', 'd4de43be683c4a47b9e5b52b2f191cb0', 'accenture', '', '', '', '', '', '', '', 0, 7654, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(46, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Vyapaka', '', '', '', '', '', '', '', 0, 1231231231, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(47, 'emp5@gmail.com', 'ec06b4fc95d91391e662149794b222d3', 'HCL', '', '', '', '', '', '', '', 0, 2147483647, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(48, 'emp6@gmail.com', '09d57428ae91c05a90dd39a1bd87df34', 'MPO', '', '', '', '', '', '', '', 0, 23451231, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(43, 'emp1@gmail.com', '86ea3363ba65c10f3f1ef299b126de29', 'Wipro123', 'Software', 'Company', 'personname', 'desg', 'ofice addressa ofasjdfklasjfkl', '', '', 234234, 2147483647, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(49, 'emp7@g.com', '77780ab2f57504277c55ad44c1b32519', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '0000-00-00 00:00:00', 0, 0),
(50, 'manjupc2@gmail.com', '7ae979e9246f36fff9bb1872e5133b65', 'Voqeoit ', 'Application', 'Company', 'Manjula', 'Sr Manager', 'Shankesh No 47N,, Ground Floor', 'india', 'BENGALURU', 560010, 2147483647, '', 'on', 'agree', '', '2018-08-02 09:14:27', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `empusers`
--

CREATE TABLE `empusers` (
  `id` int(4) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userPass` varchar(250) NOT NULL,
  `empEmail` varchar(250) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobspost`
--

CREATE TABLE `jobspost` (
  `email` varchar(255) NOT NULL,
  `jobID` int(5) NOT NULL,
  `jobName` varchar(80) NOT NULL,
  `jobDesc` varchar(1000) NOT NULL,
  `minSalary` varchar(15) NOT NULL,
  `maxSalary` varchar(15) NOT NULL,
  `jobExp` varchar(10) NOT NULL,
  `qua` varchar(30) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobspost`
--

INSERT INTO `jobspost` (`email`, `jobID`, `jobName`, `jobDesc`, `minSalary`, `maxSalary`, `jobExp`, `qua`, `city`, `state`) VALUES
('admin@gmail.com', 200, 'Content Writer', '', '', '', '', '', '', '0'),
('admin@gmail.com', 201, 'Admin', '', '', '', '', '', '', '0'),
('admin@gmail.com', 202, 'System Admin', '', '', '', '', '', '', '0'),
('admin@gmail.com', 203, 'JobName1', '', '', '', '', '', '', '0'),
('admin@gmail.com', 199, 'System Admin', '', '', '', '', '', '', '0'),
('e7@g', 59, 'JobName5', 'jobDesc7', 'ttt', '', '', '', '', '0'),
('e7@g', 58, 'ushd', 'susu', 'susus', '', '', '', '', '0'),
('emp7@g.com', 132, 'Joasldk', 'Hdjdjdadfasfsdf', 'Hdhdj', '654', 'Exygff', 'Qghh', 'Cit', '0'),
('emp6@g.com', 90, 'fadsfads', '', '', '', '', '', '', '0'),
('emp6@g.com', 93, 'nameeee', 'tfhh', 'ffhh', 'ffg', 'yf', 'hgh', 'hhgrr', '0'),
('emp6@g.com', 99, 'ads', '', '', '', '', '', '', '0'),
('emp6@g.com', 100, 'adsf', '', '', '', '', '', '', '0'),
('emp6@g.com', 101, 'dafa', '', '', '', '', '', '', '0'),
('emp6@g.com', 102, 'fds', '', '', '', '', '', '', '0'),
('emp6@g.com', 103, 'fdsfa', '', '', '', '', '', '', '0'),
('emp6@g.com', 104, 'asfads', '', '', '', '', '', '', '0'),
('emp6@g.com', 105, 'asfadsf', '', '', '', '', '', '', '0'),
('emp6@g.com', 106, 'asfadsfas', '', '', '', '', '', '', '0'),
('emp3@gmail.com', 177, 'asdf', '', '', '', '', '', '', '0'),
('emp6@g.com', 108, 'fafasd', '', '', '', '', '', '', '0'),
('emp6@g.com', 109, 'fwot098t908t', '', '', '', '', '', '', '0'),
('emp6@g.com', 110, 'olhoifhaosf', '', '', '', '', '', '', '0'),
('emp6@g.com', 111, 'lkjaslfdja slkfjadsf', '', '', '', '', '', '', '0'),
('emp6@g.com', 112, 'lkjaslfjaslfjasf', '', '', '', '', '', '', '0'),
('emp6@g.com', 113, 'losdfuiowuro2u09572094', '', '', '', '', '', '', '0'),
('emp6@g.com', 114, 'sdf', '', '', '', '', '', '', '0'),
('emp6@g.com', 116, 'asdf', '', '', '', '', '', '', '0'),
('emp7@g.com', 133, 'job9egasd', 'asdf', 'asdfwe', '', '', '', '', '0'),
('emp6@g.com', 119, 'aas', '', '', '', '', '', '', '0'),
('emp1@gmail.com', 261, 'asdf', 'asdf', 'asdf', 'sdf', 'sdf', 'dsdf', 'ddsfg', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `php_interview_questions`
--

CREATE TABLE `php_interview_questions` (
  `id` int(6) UNSIGNED NOT NULL,
  `question` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `row_order` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php_interview_questions`
--

INSERT INTO `php_interview_questions` (`id`, `question`, `answer`, `row_order`) VALUES
(1, 'asdfk<br>', 'newok', 'o1'),
(2, 'Quuu2j', 'heya2', 'o2');

-- --------------------------------------------------------

--
-- Table structure for table `projecthistory`
--

CREATE TABLE `projecthistory` (
  `id` int(5) NOT NULL,
  `email` varchar(500) NOT NULL,
  `projectTitle` varchar(250) NOT NULL,
  `client` varchar(250) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `projectDetails` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecthistory`
--

INSERT INTO `projecthistory` (`id`, `email`, `projectTitle`, `client`, `duration`, `projectDetails`) VALUES
(36, 'user1', 'ert', 'ert', '3 to 4 Year', 'ertert'),
(35, 'user1', 'p1', 'asd', '6 month to 1 Year', 'asdf'),
(34, 'user1@gmail.com', '343', '', '', ''),
(30, 'user1@gmail.com', 'werwerw', 'wer', '1 to 2 Year', 'werASDF'),
(33, 'user22@gmail.com', 'asdf', 'asdf', '6 month to 1 Year', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(20) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `username`, `password`, `email`, `address1`, `address2`, `trn_date`) VALUES
(4, 'user1', '24c9e15e52af', 'user1@g.com', '', '', '2017-11-25 09:05:12'),
(3, 'user1', '24c9e15e52af', 'user1@g.com', '', '', '2017-11-25 09:05:12'),
(5, '', '', 'a@a.com', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregdata`
--
ALTER TABLE `adminregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidateregdata`
--
ALTER TABLE `candidateregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `defaultvalues`
--
ALTER TABLE `defaultvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emphistory`
--
ALTER TABLE `emphistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employerregdata`
--
ALTER TABLE `employerregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `empusers`
--
ALTER TABLE `empusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobspost`
--
ALTER TABLE `jobspost`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `php_interview_questions`
--
ALTER TABLE `php_interview_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projecthistory`
--
ALTER TABLE `projecthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
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
-- AUTO_INCREMENT for table `adminregdata`
--
ALTER TABLE `adminregdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `candidateregdata`
--
ALTER TABLE `candidateregdata`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `defaultvalues`
--
ALTER TABLE `defaultvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `emphistory`
--
ALTER TABLE `emphistory`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `employerregdata`
--
ALTER TABLE `employerregdata`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `empusers`
--
ALTER TABLE `empusers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobspost`
--
ALTER TABLE `jobspost`
  MODIFY `jobID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `php_interview_questions`
--
ALTER TABLE `php_interview_questions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projecthistory`
--
ALTER TABLE `projecthistory`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
