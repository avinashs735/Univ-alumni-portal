-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 01:27 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumnidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `aluId` int(11) NOT NULL AUTO_INCREMENT,
  `aluColId` int(11) NOT NULL,
  `aluDepId` int(11) NOT NULL,
  `aluCouId` int(11) NOT NULL,
  `aluName` varchar(50) NOT NULL,
  `aluFName` varchar(50) NOT NULL,
  `aluBatch` varchar(50) NOT NULL,
  `aluEmail` varchar(100) NOT NULL,
  `aluPhone` varchar(15) NOT NULL,
  `aluPwd` varchar(50) NOT NULL,
  `aluResume` varchar(100) NOT NULL,
  `aluDate_Time` datetime NOT NULL,
  `aluStatus` varchar(10) NOT NULL,
  `aluImg` varchar(200) NOT NULL,
  PRIMARY KEY (`aluId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`aluId`, `aluColId`, `aluDepId`, `aluCouId`, `aluName`, `aluFName`, `aluBatch`, `aluEmail`, `aluPhone`, `aluPwd`, `aluResume`, `aluDate_Time`, `aluStatus`, `aluImg`) VALUES
(1, 0, 1, 2, 'Avinash Kesari', 'Awadh Kishor Kesari', '2016-2018', 'kesari.avinash91@gmail.com', '8545012376', '123', 'images/resume/OFE-final project report.docx', '2017-12-29 00:41:33', 'YES', 'images/profile/IMG_20150822_102711.jpg'),
(2, 0, 1, 2, 'Rahul Dubey', 'Ashok Kumar Dubey', '2016-2018', 'rahul@gmail.com', '9999999999', '123', '', '2017-12-30 18:10:28', 'YES', 'images/profile/DSCN9630.JPG'),
(10, 0, 1, 2, 'Avinash Sharma', 'Krishnakant Sharma', '2016-2018', 'avi.victory93@yahoo.com', '8576810694', 'avi123', '', '2018-01-22 12:26:28', 'YES', 'images/profile/IMG-20171102-WA0009-001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE IF NOT EXISTS `apply_job` (
  `appId` int(11) NOT NULL AUTO_INCREMENT,
  `appJobId` int(11) NOT NULL,
  `appAluId` int(11) NOT NULL,
  `appResume` varchar(200) NOT NULL,
  `appDate_Time` datetime NOT NULL,
  PRIMARY KEY (`appId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `colId` int(11) NOT NULL AUTO_INCREMENT,
  `colName` varchar(50) NOT NULL,
  `colEmail` varchar(100) NOT NULL,
  `colPhone` varchar(15) NOT NULL,
  `colContactPerson` varchar(50) NOT NULL,
  `colPwd` varchar(50) NOT NULL,
  PRIMARY KEY (`colId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comId` int(11) NOT NULL AUTO_INCREMENT,
  `comMemId` int(11) NOT NULL,
  `comAluId` int(11) NOT NULL,
  `comComment` varchar(500) NOT NULL,
  `comDate_Time` datetime NOT NULL,
  PRIMARY KEY (`comId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `couId` int(11) NOT NULL AUTO_INCREMENT,
  `couDepId` int(11) NOT NULL,
  `couColId` int(11) NOT NULL,
  `couName` varchar(50) NOT NULL,
  PRIMARY KEY (`couId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`couId`, `couDepId`, `couColId`, `couName`) VALUES
(1, 1, 0, 'BCA'),
(2, 1, 0, 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `depId` int(11) NOT NULL AUTO_INCREMENT,
  `depColId` int(11) NOT NULL,
  `depName` varchar(50) NOT NULL,
  PRIMARY KEY (`depId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`depId`, `depColId`, `depName`) VALUES
(1, 0, 'Center of Computer Education'),
(2, 0, 'Center of Media Studies');

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE IF NOT EXISTS `education_details` (
  `eduId` int(11) NOT NULL AUTO_INCREMENT,
  `eduAluId` int(11) NOT NULL,
  `eduCourse` varchar(50) NOT NULL,
  `eduSession` varchar(50) NOT NULL,
  `eduCollege` varchar(100) NOT NULL,
  `eduPer` varchar(10) NOT NULL,
  `eduStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`eduId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eveId` int(11) NOT NULL AUTO_INCREMENT,
  `colEveId` int(11) NOT NULL,
  `eveTitle` varchar(200) NOT NULL,
  `eveDesc` varchar(2000) NOT NULL,
  `eveAttach` varchar(100) NOT NULL,
  `eveDate_Time` datetime NOT NULL,
  PRIMARY KEY (`eveId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eveId`, `colEveId`, `eveTitle`, `eveDesc`, `eveAttach`, `eveDate_Time`) VALUES
(4, 0, 'SET Conference', 'Set Conference 2018 is here.Student are requested to submit their research paper for plagiarism checking asap.Thank you.', '', '2018-01-25 18:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `jobAluId` int(11) NOT NULL,
  `jobTitle` varchar(200) NOT NULL,
  `jobDesc` varchar(1000) NOT NULL,
  `jobAttachment` varchar(200) NOT NULL,
  `jobDate_Time` datetime NOT NULL,
  `jobStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `jobAluId`, `jobTitle`, `jobDesc`, `jobAttachment`, `jobDate_Time`, `jobStatus`) VALUES
(1, 3, 'Software Developer 3+ years Exp. ', 'Software Developer 3+ years Exp. Job Location Noida. Send your resume at my email id &quot;anupmamishra123@gmail.com&quot;. Thank you', '', '2015-12-20 20:19:39', ''),
(2, 1, 'PHP Developer 2+ years Exp. Mumbai', 'PHP Developer 2+ years Exp. Job Location Mumabi Central, Mumbai. Send your resume at my email id &quot;kesari.avinash91@gmail.com&quot;. Package 6 Lacs. ', '', '2015-12-20 20:25:23', ''),
(3, 4, 'Web Developer Location Allahabad', 'Vacancy for Web Developer Location Allahabad. Freshers also can apply.   ', '', '2015-12-20 22:55:25', ''),
(4, 1, 'Java Programmer Needed location Chennai', 'Must have knowledge of advanced java,must know at least 3 frameworks. ', '', '2017-12-05 00:18:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `likId` int(11) NOT NULL AUTO_INCREMENT,
  `likMemId` int(11) NOT NULL,
  `likAluId` int(11) NOT NULL,
  `likLike` int(11) NOT NULL,
  `likDate_Time` datetime NOT NULL,
  PRIMARY KEY (`likId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `pwd`) VALUES
('avi', 'avi');

-- --------------------------------------------------------

--
-- Table structure for table `memory_lane`
--

CREATE TABLE IF NOT EXISTS `memory_lane` (
  `memId` int(11) NOT NULL AUTO_INCREMENT,
  `memAluId` int(11) NOT NULL,
  `memDesc` varchar(1000) NOT NULL,
  `memImg` varchar(200) NOT NULL,
  `memDate_Time` datetime NOT NULL,
  `memStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`memId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `memory_lane`
--

INSERT INTO `memory_lane` (`memId`, `memAluId`, `memDesc`, `memImg`, `memDate_Time`, `memStatus`) VALUES
(13, 1, ' Its been a long day......\r\nNeed refreshment and nothing can be better than ace combat.........', 'images/lane/ac1.png', '2018-01-21 23:26:20', ''),
(14, 2, ' Dap dap.......................... Farewell done.', 'images/lane/IMG-20171102-WA0031.jpg', '2018-01-21 23:34:24', ''),
(15, 2, ' Trip with buddies ........nothing can be more entertaining than that.', 'images/lane/IMG_4342.JPG', '2018-01-22 00:43:13', ''),
(16, 2, ' Art beauty....', 'images/lane/IMG_20161030_123150.jpg', '2018-01-22 00:44:37', ''),
(17, 2, ' ', 'images/lane/IMG-20171103-WA0009.jpg', '2018-01-22 00:51:40', ''),
(18, 10, ' Party well spent.....................!!', 'images/lane/IMG_20171101_162726.jpg', '2018-01-25 18:53:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newId` int(11) NOT NULL AUTO_INCREMENT,
  `colId` int(11) NOT NULL,
  `newTitle` varchar(200) NOT NULL,
  `newDesc` varchar(2000) NOT NULL,
  `newDate_Time` datetime NOT NULL,
  PRIMARY KEY (`newId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newId`, `colId`, `newTitle`, `newDesc`, `newDate_Time`) VALUES
(3, 0, 'Pongal Fest', 'Pongal Festival in VIT.......Come and live life this way', '2018-01-25 18:42:28'),
(4, 0, 'Reviera 2018', 'Reviera 2018 is up.Get your pro shows ticket as early as possible we have limited stock. ', '2018-01-25 18:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `professional_details`
--

CREATE TABLE IF NOT EXISTS `professional_details` (
  `proId` int(11) NOT NULL AUTO_INCREMENT,
  `proAluId` int(11) NOT NULL,
  `proCompanyName` varchar(50) NOT NULL,
  `proJoinDate` date NOT NULL,
  `proEndDate` date NOT NULL,
  `proJobTitle` varchar(100) NOT NULL,
  `proJobDesc` varchar(1000) NOT NULL,
  `proStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reunion`
--

CREATE TABLE IF NOT EXISTS `reunion` (
  `reuId` int(11) NOT NULL AUTO_INCREMENT,
  `reuAluId` int(11) NOT NULL,
  `reuLocation` varchar(50) NOT NULL,
  `reuTitle` varchar(200) NOT NULL,
  `reuDesc` varchar(1000) NOT NULL,
  `reuDate` date NOT NULL,
  `reuDate_Time` datetime NOT NULL,
  PRIMARY KEY (`reuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reunion`
--

INSERT INTO `reunion` (`reuId`, `reuAluId`, `reuLocation`, `reuTitle`, `reuDesc`, `reuDate`, `reuDate_Time`) VALUES
(1, 2, 'Vellore institute of technology', 'Reunion in January 2016 Batch MCA 2013-2016', ' Reunion in January 2016 Batch MCA 2013-2016', '0000-00-00', '2017-12-20 20:09:39'),
(3, 2, 'manali', 'night out trip', ' Hope to see you all there...... ', '0000-00-00', '2018-01-22 01:25:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
