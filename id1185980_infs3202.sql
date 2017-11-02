-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 02:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1185980_infs3202`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `orderDate` date NOT NULL,
  `cakeName` varchar(30) NOT NULL,
  `quantity` int(3) NOT NULL,
  `collectionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `orderDate`, `cakeName`, `quantity`, `collectionDate`) VALUES
(1, 'weiqing', '2017-05-08', 'banana', 2, '2017-05-13'),
(2, 'weiqing', '2017-05-08', 'apple', 10, '2017-05-12'),
(3, 'eethung', '2017-05-06', 'grape', 7, '2017-05-11'),
(4, 'yenting', '2017-05-08', 'blueberry pie', 10, '2017-05-12'),
(5, 'yenting', '2017-05-08', 'strawberry chocolate fudge', 17, '2017-05-12'),
(6, 'yenting', '2017-05-06', 'apple tart', 21, '2017-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `orderss`
--

CREATE TABLE `orderss` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `orderDate` date NOT NULL,
  `cakeName` varchar(30) NOT NULL,
  `quantity` int(2) NOT NULL,
  `collectionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `PortImageName` varchar(20) NOT NULL,
  `PortImageSource` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`PortImageName`, `PortImageSource`) VALUES
('Eclair', 'http://placehold.it/300x320.png');

-- --------------------------------------------------------

--
-- Table structure for table `recoveryemails_enc`
--

CREATE TABLE `recoveryemails_enc` (
  `ID` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `ukey` varchar(32) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recoveryemails_enc`
--

INSERT INTO `recoveryemails_enc` (`ID`, `uid`, `ukey`, `expDate`) VALUES
(9, 1241, '0a9d3f71c920b29303cfabc7a0c243b5', '2017-05-16 18:27:37'),
(10, 1251, '8eb0e06f5b8cb3ebc764eb7138eaf895', '2017-05-19 09:43:17'),
(11, 1251, '4caa13059af1b9f37b7900ceef5d0555', '2017-05-19 09:43:27'),
(12, 1251, 'e0e49119e2ca9597c3c29ed48ada3af9', '2017-05-19 09:43:37'),
(13, 1251, 'aa2fb1602afca5998c2793c2e5037415', '2017-05-19 09:43:47'),
(15, 1241, '93410b637e8977030afbe25e77937bb6', '2017-05-19 14:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `prodid` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `material` varchar(300) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `customize` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`prodid`, `name`, `code`, `image`, `price`, `material`, `category`, `customize`) VALUES
(1, 'Starwberry Cake', 'sberry01', 'http://placehold.it/300x320.png', 29.90, 'Super-fine cake flour, Caster Sugar, Thickeners, Fresh Starberries, Premium Buttermilk, Edible decoration & lots of love', 'Cake', NULL),
(2, 'Chocolate Cake', 'chococake01', 'http://i44.tinypic.com/9a74sg.jpg', 39.90, 'Super-fine cake flour, Caster Sugar, Thickeners, Extravirgin chocolate, Fresh Whole Milk, Edible decoration & lots of love', 'Cake', NULL),
(3, 'Yam Cake', 'yamcake01', 'http://placehold.it/300x320.png', 29.90, 'Super-fine cake flour, Caster Sugar, Thickeners, Fresh Yam, Premium Buttermilk,\r\nFree-range eggs, Edible decoration & lots of love', 'Cake', NULL),
(4, 'Blueberry Cake', 'bbcake01', 'http://placehold.it/300x320.png', 49.90, 'Super-fine cake flour, Brown Caster Sugar, Thickeners, Fresh Blueberries, Premium Buttermilk,  Edible decoration & lots of love', 'Cake', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `mobile`) VALUES
(1, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(2, 'test2', 'test2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(3, 'test3', 'test3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(4, 'wangwang', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(5, 'jojo', 'jojo@gmail.com', '93279e3308bdbbeed946fc965017f67a', NULL),
(6, 'jojo2', 'jojo2@gmail.com', '93279e3308bdbbeed946fc965017f67a', '04-02882838');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `phoneNo`) VALUES
(1235, '1234', '1234', '1234@gmail.com', ''),
(1237, 'qqqqqq', '$2a$10$.5lhv1uCwisigWoEc78ZqOnctAUUdVAcxKSYEfaupWxrYfNNjy6Ja', 'qqqqqq@gmail.com', ''),
(1238, 'qwqwqw', '$2a$10$qChZJ0ikZtsTSjCjjKLgFuU.vw59AmpLksr/lWfeIrpeYkMu6XQw.', 'qwqwqw@gmail.com', ''),
(1239, '', '', '', ''),
(1240, 'qqqq', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'qqqq@gmail.com', '12-12121212'),
(1241, 'weiqing', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'weiqing.chin@gmail.com', '12-12121215'),
(1242, 'eethung', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'loh_eethung@hotmail.com', '12-12121212'),
(1243, 'jjjj', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'j@j.com', '12-12121212'),
(1245, 'yolo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'yolo@gmail.com', '12-12121212'),
(1246, 'yolo2', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'yolo2@gmail.com', '12-12121212'),
(1247, 'testing', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', 'qdevtestingemail@gmail.com', '12-12121212'),
(1248, 'asdfasdf', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'asdf@gmail.com', '12-12121212'),
(1251, 'yenting', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'pyting21@gmail.com', '04-02772737');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderss`
--
ALTER TABLE `orderss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`prodid`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orderss`
--
ALTER TABLE `orderss`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `prodid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1252;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
