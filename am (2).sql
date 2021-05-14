-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 09:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `href` varchar(40) NOT NULL,
  `des` varchar(40) NOT NULL,
  `previlege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`href`, `des`, `previlege`) VALUES
('addfac.php', 'Add Faculty', 1),
('addprincipal.php', 'Add Principal', 1),
('adduser.php', 'Add Student', 3),
('applyleave.php', 'Apply Leave', 2),
('leaverequests.php', 'Leave Requests', 3),
('showrequests.php', 'Show Applied Leaves', 2),
('viewfac.php', 'View Faculties', 4),
('viewstud.php', 'view students', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `depname` varchar(30) NOT NULL,
  `depid` varchar(20) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `semdays` int(120) NOT NULL DEFAULT '120'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`depname`, `depid`, `cname`, `cid`, `semdays`) VALUES
('computer science', 'cs', 'BCA', 'bca', 120),
('computer science', 'cs', 'MCA', 'mca', 120),
('management', 'management', 'BBA', 'bba', 120);

-- --------------------------------------------------------

--
-- Table structure for table `leaverequests`
--

CREATE TABLE `leaverequests` (
  `sno` int(11) NOT NULL,
  `idto` varchar(30) NOT NULL,
  `idfrom` varchar(30) NOT NULL,
  `dep` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `rdate` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `rstatus` varchar(30) NOT NULL DEFAULT 'request sent'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaverequests`
--

INSERT INTO `leaverequests` (`sno`, `idto`, `idfrom`, `dep`, `description`, `rdate`, `sem`, `rstatus`) VALUES
(13, 'joji_vila', 'abhilbca2015_1', 'cs', '1', '1', 1, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `params`
--

CREATE TABLE `params` (
  `course` varchar(24) DEFAULT NULL,
  `adyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `params`
--

INSERT INTO `params` (`course`, `adyear`) VALUES
('regular', 2015),
('direct', 2016),
('lateral', 2017),
(NULL, 2018),
('', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `rollno` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fusername` varchar(50) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `adyear` int(11) NOT NULL,
  `sem1` int(11) NOT NULL DEFAULT '120',
  `sem2` int(11) NOT NULL DEFAULT '120',
  `sem3` int(11) NOT NULL DEFAULT '120',
  `sem4` int(11) NOT NULL DEFAULT '120',
  `sem5` int(11) NOT NULL DEFAULT '120',
  `sem6` int(11) NOT NULL DEFAULT '120'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`rollno`, `fname`, `lname`, `fusername`, `cid`, `adyear`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`) VALUES
('1', 'karan', 'k', 'karankbca2015_1', 'bca', 2015, 120, 120, 120, 120, 120, 120),
('2', 'kala', 'p', 'kalapbca2015_2', 'bca', 2015, 120, 120, 120, 120, 120, 120),
('1', 'abhi', 'l', 'abhilbca2015_1', 'bca', 2015, 119, 120, 120, 120, 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tlogin`
--

CREATE TABLE `tlogin` (
  `idno` int(11) NOT NULL,
  `fusername` varchar(25) NOT NULL,
  `fpassword` varchar(25) NOT NULL DEFAULT 'kcmt',
  `previlege` int(2) DEFAULT NULL,
  `depid` varchar(30) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlogin`
--

INSERT INTO `tlogin` (`idno`, `fusername`, `fpassword`, `previlege`, `depid`) VALUES
(30, 'admin', 'admin', 1, 'none'),
(33, 'joji_vila', '1234', 3, 'cs'),
(36, 'lalu_k', 'kcmt', 3, 'cs'),
(37, 'abhilbca2015_1', 'kcmt', 2, 'none'),
(38, 'cheriyan_joseph', 'kcmt', 4, 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`href`);

--
-- Indexes for table `leaverequests`
--
ALTER TABLE `leaverequests`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tlogin`
--
ALTER TABLE `tlogin`
  ADD PRIMARY KEY (`idno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaverequests`
--
ALTER TABLE `leaverequests`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tlogin`
--
ALTER TABLE `tlogin`
  MODIFY `idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
