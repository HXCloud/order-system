-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 03:40 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `number` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pubtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `menuid`, `name`, `price`, `number`, `img`, `pubtime`) VALUES
(43, 2, 5, '番茄培根意面 ', '30.00', 1, 'img/pasta.jpg', '2017-11-30 14:54:30'),
(46, 1, 5, '番茄培根意面 ', '30.00', 3, 'img/pasta.jpg', '2017-12-22 23:51:17'),
(47, 1, 4, '芝士蛋糕 ', '25.00', 1, 'img/cheese.jpg', '2017-12-22 23:52:00'),
(48, 1, 1, '芒果星冰乐 ', '30.00', 2, 'img/mango.jpg', '2017-12-22 23:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `introduce` varchar(255) NOT NULL,
  `typeid` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pubtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `introduce`, `typeid`, `hot`, `img`, `pubtime`) VALUES
(1, '芒果星冰乐', 30, '香甜芒果与奶油的结合', 2, 0, 'img/mango.jpg', '2017-05-19 00:00:00'),
(2, '三文治', 25, '芝士火腿鸡蛋', 1, 0, 'img/sandwich.jpg', '2017-05-17 00:00:00'),
(3, '初恋', 35, '覆盆子果酱', 2, 1, 'img/love.jpg', '2017-05-19 00:00:00'),
(4, '芝士蛋糕', 25, '浓郁芝士味，松软口感', 3, 1, 'img/cheese.jpg', '2017-05-21 00:00:00'),
(5, '番茄培根意面', 30, '浪漫的赶脚～', 1, 1, 'img/pasta.jpg', '2017-06-12 00:00:00'),
(6, '菲力牛排', 65, '八分熟牛排淋上黑椒汁', 1, 1, 'img/beef.jpg', '2017-12-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderid`, `menuid`, `price`, `quantity`, `subtotal`, `img`) VALUES
(1, 1, 3, '35.00', 1, '35.00', 'img/love.jpg'),
(2, 1, 4, '25.00', 2, '50.00', 'img/cheese.jpg'),
(3, 2, 3, '35.00', 1, '35.00', 'img/love.jpg'),
(4, 2, 1, '30.00', 1, '30.00', 'img/mango.jpg'),
(5, 3, 4, '25.00', 1, '25.00', 'img/cheese.jpg'),
(6, 3, 1, '30.00', 1, '30.00', 'img/mango.jpg'),
(7, 4, 2, '25.00', 2, '50.00', 'img/sandwich.jpg'),
(8, 4, 3, '35.00', 2, '70.00', 'img/love.jpg'),
(9, 4, 1, '30.00', 1, '30.00', 'img/mango.jpg'),
(10, 4, 4, '25.00', 2, '50.00', 'img/cheese.jpg'),
(27, 13, 1, '30.00', 2, '60.00', 'img/mango.jpg'),
(28, 13, 5, '30.00', 2, '60.00', 'img/pasta.jpg'),
(29, 14, 1, '30.00', 1, '30.00', 'img/mango.jpg'),
(30, 14, 4, '25.00', 1, '25.00', 'img/cheese.jpg'),
(31, 14, 5, '30.00', 1, '30.00', 'img/pasta.jpg'),
(32, 15, 3, '35.00', 1, '35.00', 'img/love.jpg'),
(33, 16, 5, '30.00', 2, '60.00', 'img/pasta.jpg'),
(34, 17, 4, '25.00', 1, '25.00', 'img/cheese.jpg'),
(35, 18, 4, '25.00', 1, '25.00', 'img/cheese.jpg'),
(36, 19, 1, '30.00', 2, '60.00', 'img/mango.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pubtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `total`, `pubtime`) VALUES
(1, 1, '85.00', '2017-06-08 22:44:53'),
(2, 1, '65.00', '2017-06-10 23:05:55'),
(3, 1, '55.00', '2017-06-11 00:55:45'),
(4, 1, '200.00', '2017-06-11 11:23:17'),
(13, 1, '120.00', '2017-11-29 13:59:59'),
(14, 2, '85.00', '2017-11-30 14:40:00'),
(15, 2, '35.00', '2017-11-21 14:42:01'),
(16, 2, '60.00', '2017-11-30 14:50:30'),
(17, 2, '25.00', '2017-11-30 14:51:27'),
(18, 2, '25.00', '2017-11-30 14:53:20'),
(19, 1, '60.00', '2017-12-22 22:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, '主食'),
(2, '饮品'),
(3, '甜点');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(11) NOT NULL,
  `passwd` varchar(11) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `account`, `passwd`, `phone`) VALUES
(1, 'abc', '111111', 'aa'),
(2, 'ccc', '222222', 'cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
