SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `adminregdata` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aName` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `defaultvalues` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jobsPostLimit` int(22) NOT NULL,
  `createNewEmpLimit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `empusers` (
  `id` int(4) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userPass` varchar(250) NOT NULL,
  `empEmail` varchar(250) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `php_interview_questions` (
  `id` int(6) UNSIGNED NOT NULL,
  `question` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `row_order` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `projecthistory` (
  `id` int(5) NOT NULL,
  `email` varchar(500) NOT NULL,
  `projectTitle` varchar(250) NOT NULL,
  `client` varchar(250) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `projectDetails` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address1` varchar(20) NOT NULL,
  `address2` varchar(20) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


ALTER TABLE `adminregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `candidateregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `defaultvalues`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `emphistory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `employerregdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `empusers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `jobspost`
  ADD PRIMARY KEY (`jobID`);

ALTER TABLE `php_interview_questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `projecthistory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `adminregdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `candidateregdata`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
ALTER TABLE `defaultvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
ALTER TABLE `emphistory`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
ALTER TABLE `employerregdata`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
ALTER TABLE `empusers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
ALTER TABLE `jobspost`
  MODIFY `jobID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
ALTER TABLE `php_interview_questions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `projecthistory`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
