-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 23, 2025 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `psw`) VALUES
(0, 'admin', 'admin'),
(2, 'Sidheshwar', 'Sidhesh@2003');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`cid`, `name`, `price`, `descr`) VALUES
(2, 'italian', '156892', 'famous italian food in the intalian'),
(4, 'Punjabi Food', '125550', 'Pajii Da Dabha');

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `did` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`did`, `name`, `price`, `descr`) VALUES
(2, 'dressing', '150800', 'Manish Malothra Disign Famous Yo'),
(6, 'Luxe wedding decor', '158000', 'With simple elegance, rustic warmth & modern elements, use our decor');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `rating`, `comments`, `created_at`) VALUES
(1, 'ssssss', 'ssssss@gmail.com', 5, 'efefwfff', '2024-09-24 10:34:02'),
(2, 'ssssss', 'ssssss@gmail.com', 5, 'ssssssss', '2024-09-24 10:34:51'),
(3, 'ssssss', 'ssssss@gmail.com', 5, 'dcddcdcdc', '2024-09-24 10:35:50'),
(8, 'rani', 'rani@gmail.com', 5, 'dcscscscscsc', '2024-09-24 10:56:42'),
(9, 'rrrrr', 'rrrr@gmail.com', 5, 'dfdfdfff', '2024-09-24 11:05:13'),
(10, 'rrrrr', 'rrrr@gmail.com', 5, 'sdsdsdsdsd', '2024-09-24 11:07:08'),
(11, 'rrrrr', 'rrrr@gmail.com', 5, 'dsdsdsdsd', '2024-09-24 11:08:15'),
(12, 'mmmm', 'mmm@gmail.com', 5, 'dcddcdc', '2024-09-24 11:11:14'),
(13, 'mmmm', 'mmm@gmail.com', 5, 'dcddcdc', '2024-09-24 11:11:49'),
(14, 'mmmmm', 'mmmm@gmail.com', 5, 'ddcdcdcdc', '2024-09-24 11:12:51'),
(15, 'mmmmm', 'mmmm@gmail.com', 5, 'ddcdcdcdc', '2024-09-24 11:15:39'),
(16, 'kkkkk', 'kkk@gmail.com', 5, 'sanckabbkfbk ', '2024-09-24 11:16:33'),
(17, 'kk', 'k@gmail.com', 5, 'scmsbcjvcj', '2024-09-24 11:17:29'),
(18, 'll', 'll@gmail.com', 5, 'c skbbvkv vkvjkjbyusd', '2024-09-24 11:18:57'),
(19, 'i am don', 'Don@gmail.com', 5, 'very nice wedding', '2024-09-27 14:16:20'),
(20, 'i am don', 'Don@gmail.com', 5, 'very nice wedding', '2024-09-27 14:17:45'),
(21, 'me', 'me@gmail.com', 4, 'scssc', '2024-09-27 14:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`mid`, `name`, `price`, `descr`) VALUES
(2, 'DJJJ Songs', '450000', 'This is AJJ songs'),
(6, 'dj Rujhan', '400000', 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `photoshop`
--

CREATE TABLE `photoshop` (
  `pid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoshop`
--

INSERT INTO `photoshop` (`pid`, `name`, `price`, `descr`) VALUES
(1, 'Dslr new', '60000', 'Nice Dslr Camera'),
(2, 'shubham', '50000', 'nothing'),
(5, 'Parth Daithankar', '56000', 'The parthe  Daithankar is a world best photography');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dlname` varchar(30) NOT NULL,
  `wdate` varchar(30) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `pHno` varchar(10) NOT NULL,
  `vid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `dname`, `dlname`, `wdate`, `pno`, `pHno`, `vid`, `mid`, `cid`, `did`, `tid`, `pid`) VALUES
(59, 'Amol Dongare', 'Amol', 'XYZ', '2024-08-16', '5600', '9022200460', 4, 2, 2, 2, 1, 0),
(60, 'Ajay Garje', 'Ajay', 'Karbharian', '2024-08-16', '10000', '7865467890', 0, 0, 0, 0, 0, 1),
(68, 'Raj Garje', 'Raj', 'Rupali', '2024-08-21', '15000', '7865467890', 0, 2, 1, 0, 0, 1),
(71, 'Vijay nagargoje', 'Vijay', 'Neha', '2024-08-23', '7000', '9635896545', 4, 2, 2, 2, 1, 1),
(95, 'Jivan Shekade', 'Jivan', 'Juliya', '2024-09-04', '6900', '9658956858', 16, 0, 0, 0, 1, 1),
(96, 'Pavan Shekade', 'Pavan', 'PPP', '2024-09-02', '5800', '896985965', 0, 0, 0, 0, 0, 1),
(99, 'Amit', 'Amit', 'Abc', '2024-09-08', '6000', '5689235478', 4, 0, 0, 0, 0, 0),
(104, 'Ram', 'Ram', 'Sita', '2024-09-09', '9000', '9685741535', 0, 0, 0, 0, 1, 0),
(110, 'Ashish Vishwakarma', 'Ashish Vishwakarma', 'ashish chi bayko', '2024-09-17', '2000', '9022283225', 3, 6, 2, 2, 2, 2),
(112, 'Chirag Book', 'Chirag', 'College Book', '2024-11-16', '5000', '9685742562', 0, 0, 0, 0, 0, 0),
(113, 'Rohit Sandip Randhawane', 'Rohit', 'I', '2028-02-11', '2000', '9022283227', 17, 2, 4, 6, 2, 1),
(114, 'Vedant Ambiwade', 'Vedant', 'N', '2024-11-26', '780', '9022283227', 3, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `tid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`tid`, `name`, `price`, `descr`) VALUES
(1, 'Western thme', '70999', ' This is looking very good '),
(2, 'Holding', '120002', 'Holding is the best wedding th'),
(3, 'simple', '12500', 'this is a simple them');

-- --------------------------------------------------------

--
-- Table structure for table `u_info`
--

CREATE TABLE `u_info` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pno` varchar(10) NOT NULL,
  `adds` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_info`
--

INSERT INTO `u_info` (`uid`, `name`, `uname`, `email`, `pno`, `adds`, `psw`) VALUES
(31, 'Amol Dongare ', 'Amol', 'Amol@gmail.com', '9022200460', 'Pune,Hadpsar', 'Amol@123'),
(32, 'Ajay Garje', 'Ajay', 'Ajay@gmail.com', '3698578965', 'Dolewadi , jamkhed', 'Ajay@123'),
(33, 'Raj Garje', 'Raj', 'Raj@gmail.com', '7865467890', 'Dolewadi, jamkhed ', 'Raj@123'),
(37, 'Vijay Nagargoje', 'Vijay', 'Vijay@gmail.com', '9635896545', 'Bhutwada,jamkhed', 'Vijay@123'),
(42, 'Jivan Shekade', 'Jivan', 'Jivan@gmail.com', '9658956858', 'near,Jamkhed', 'Jivan@123'),
(43, 'Pavan Shekade', 'Pavan', 'Pavan@gmail.com', '896985965', 'Pune Hadpsar', 'Pavan@123'),
(45, 'Amit', 'Amit', 'Amit@gmail.com', '5689235478', 'Bhatodi', 'Amit@123'),
(56, 'Ram ', 'Ram', 'sidheshwarshekade@gmail.com', '9685489535', 'pune', 'Ram@123'),
(59, 'Rohit Sandip Randhawane', 'Rohit', 'sidheshwarshekade@gmail.com', '9022283227', 'Morya-park-2, bholegaon, Ahmed', 'Rohit@123'),
(60, 'Ashish Vishwakarma', 'Ashish', 'randhawanerohit@gmail.com', '9022283225', 'Shivaji nagar, nepti,  Ahmedna', 'ashish@123'),
(61, 'Sham Ram', 'Sham', 'sidheshwarshekade@gmail.com', '9685741535', 'Mumbai', 'Sham@123'),
(62, 'Chirag Book', 'Chirag', 'sidhesharshekade@gmail.com', '1234567890', 'Ahilyamagar', 'Chirag@123'),
(63, 'Vedant Ambiwade', 'Vedant', 'randhawanerohit@gmail.com', '9022283227', 'Ahemadnagar', 'Vedant@123');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `vid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `descr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vid`, `name`, `price`, `descr`) VALUES
(3, 'Taj Hotel', '140900', 'This Plcae Is So Expensive'),
(4, 'Rameshwar Dara', '152698', 'This place is so buetifull'),
(16, 'Hotel Dixit', '158908', 'This is Very Nice Hotel '),
(17, 'Raj Palace', '122228', 'This palace is so look like be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `photoshop`
--
ALTER TABLE `photoshop`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `u_info`
--
ALTER TABLE `u_info`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photoshop`
--
ALTER TABLE `photoshop`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `u_info`
--
ALTER TABLE `u_info`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
