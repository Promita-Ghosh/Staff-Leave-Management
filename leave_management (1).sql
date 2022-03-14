-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 05:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `empno` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `emp_type` varchar(11) NOT NULL,
  `phnno` varchar(10) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `qualification` varchar(15) NOT NULL,
  `dateofjoining` varchar(15) NOT NULL,
  `dept` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `empno`, `name`, `emp_type`, `phnno`, `pass`, `gmail`, `address`, `dob`, `qualification`, `dateofjoining`, `dept`) VALUES
(1, '1000', 'Promita Ghosh', 'Admin', '9903118047', '12345', 'admin@gmail.com', 'abc road, howrah-711101', '1999-09-07', 'Mca', '2021-12-25', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `leavedetails`
--

CREATE TABLE `leavedetails` (
  `id` int(11) NOT NULL,
  `empno` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phnno` varchar(10) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `leavetype` varchar(20) NOT NULL,
  `fromdate` varchar(10) NOT NULL,
  `todate` varchar(10) NOT NULL,
  `noofdays` varchar(5) NOT NULL,
  `reason` varchar(35) NOT NULL,
  `action` varchar(15) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavedetails`
--

INSERT INTO `leavedetails` (`id`, `empno`, `name`, `phnno`, `mail`, `leavetype`, `fromdate`, `todate`, `noofdays`, `reason`, `action`, `remarks`) VALUES
(11, '1001', 'Sweta Ghosh', '9903118048', 'sweta@gmail.com', 'Sick Leave (SL)', '2022-02-25', '2022-02-28', '2', 'test', 'Approved', 'Good'),
(12, '1002', 'Ujjwal Gorai', '9903118049', 'ujjwal@gmail.com', 'Casual Leave (CL)', '2022-03-02', '2022-03-05', '4', 'tour', 'Pending', ''),
(13, '1003', 'Arunava Ghosh', '9007638456', 'arunava@gmail.com', 'Privilege Leave (PL)', '2022-03-10', '2022-03-16', '5', 'sick', 'Approved', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE `leave_master` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `emp_type` varchar(50) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `no_of_leave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`id`, `year`, `emp_type`, `leave_type`, `no_of_leave`) VALUES
(1, '2022', 'Staff A', 'Privilege Leave (PL)', '10'),
(2, '2022', 'Staff A', 'Sick Leave (SL)', '5'),
(3, '2022', 'Staff B', 'Casual Leave (CL)', '10'),
(4, '2022', 'Staff B', 'Earned Leave (EL)', '10'),
(5, '2022', 'Staff A', 'Casual Leave (CL)', '10'),
(6, '2022', 'Staff A', 'Earned Leave (EL)', '7'),
(7, '2022', 'Staff C', 'Privilege Leave (PL)', '5'),
(8, '2022', 'Manager', 'Privilege Leave (PL)', '10'),
(9, '2022', 'Staff B', 'Privilege Leave (PL)', '5'),
(10, '2022', 'Staff B', 'Sick Leave (SL)', '5'),
(11, '2022', 'Staff C', 'Sick Leave (SL)', '5'),
(12, '2022', 'Staff C', 'Casual Leave (CL)', '10'),
(13, '2022', 'Staff C', 'Earned Leave (EL)', '2'),
(14, '2022', 'Manager', 'Sick Leave (SL)', '5'),
(15, '2022', 'Manager', 'Casual Leave (CL)', '10'),
(16, '2022', 'Manager', 'Earned Leave (EL)', '5');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `empno` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `emp_type` varchar(11) NOT NULL,
  `phnno` varchar(10) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `qualification` varchar(15) NOT NULL,
  `dateofjoining` varchar(15) NOT NULL,
  `dept` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `empno`, `name`, `emp_type`, `phnno`, `pass`, `gmail`, `address`, `dob`, `qualification`, `dateofjoining`, `dept`) VALUES
(3, '1001', 'Sweta Ghosh', 'Staff A', '9903118048', '12345', 'sweta@gmail.com', 'POST+VILL. DOMJUR NEAR DOMJUR POLICE STATION,HOWRAH', '1999-09-10', 'Mca', '2022-01-09', 'IT'),
(6, '1002', 'Ujjwal Gorai', 'Staff A', '9903118049', '12345', 'ujjwal@gmail.com', 'abcd road , Durgapur - 713213', '1999-07-06', 'M-tech', '2021-12-09', 'Marketing'),
(7, '1003', 'Arunava Ghosh', 'Staff C', '9007638456', '1234', 'arunava@gmail.com', 'Sheroraphuli', '2022-02-02', 'BCA', '2022-03-24', 'IT'),
(8, '1004', 'Moumita Das', 'Staff B', '9903118045', '1234', 'moumita@gmail.com', 'abcd road, howrah-711101', '1998-06-02', 'Mca', '2022-02-01', 'Marketing'),
(9, '1005', 'Sourav Mondal', 'Staff B', '9903123458', '1234', 'sourav@gmail.com', 'abc road,kolkata-711101', '1999-12-08', 'MCA', '2022-02-02', 'Engineering'),
(10, '1006', 'Arkajit Ghosh', 'Manager', '9831564879', '123456', 'arka@gmail.com', 'xyz road, howrah-711408', '1992-12-15', 'M.tech', '2022-01-31', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavedetails`
--
ALTER TABLE `leavedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leavedetails`
--
ALTER TABLE `leavedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leave_master`
--
ALTER TABLE `leave_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
