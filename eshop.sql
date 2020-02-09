-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 10:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `discountprice` float NOT NULL,
  `img` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `quantity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `id`, `uid`, `name`, `category`, `price`, `discountprice`, `img`, `size`, `shipping`, `quantity`) VALUES
(106, 3, 18, '2018 Brasil Home Shirt', 'Football Shirt', 99.95, 99.95, 'img/prod3.png', '', '', 0),
(107, 2, 18, '2017-2018 FC Barcelona Home Shirt', 'Football Shirt', 48.95, 48.95, 'img/prod2.png', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `orders` int(50) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `discountprice` float NOT NULL,
  `feedback` int(20) NOT NULL DEFAULT '0',
  `sale` int(3) NOT NULL DEFAULT '0',
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `orders`, `price`, `discountprice`, `feedback`, `sale`, `img`) VALUES
(1, '2018 FFF Home Shirt', 'Football Shirt', 0, 99.95, 99.95, 0, 0, 'img/prod1.png'),
(2, '2017-2018 FC Barcelona Home Shirt', 'Football Shirt', 2, 48.95, 48.95, 0, 0, 'img/prod2.png'),
(3, '2018 Brasil Home Shirt', 'Football Shirt', 1, 99.95, 99.95, 0, 0, 'img/prod3.png'),
(4, '2017-2018 Lakers Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod4.webp'),
(5, '2017-2018 Cavaliers Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod5.webp'),
(6, '2017-2018 Magics Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod6.webp'),
(7, 'Adidas Predator 18.1', 'Football Boots', 0, 215.95, 215.95, 0, 0, 'img/prod7.jpg'),
(8, 'Nike Mercurial Superfly', 'Football Boots', 1, 254.95, 254.95, 0, 0, 'img/prod8.png'),
(9, 'Air Jordan XXXII', 'Basketball Boots', 0, 75.95, 75.95, 0, 0, 'img/prod9.webp'),
(10, '2017-2018 AS Roma Home Shirt', 'Football Shirt', 0, 65.55, 65.55, 0, 0, 'img/prod31.png'),
(11, '2017-2018 Galatasaray Home Shirt', 'Football Shirt', 0, 125.95, 125.95, 0, 0, 'img/prod32.webp'),
(12, '2017-2018 Galatasaray Away Shirt', 'Football Shirt', 0, 125.95, 125.95, 0, 0, 'img/prod33.webp'),
(13, 'Lebron James All Star Edition', 'Basketball Shirt', 0, 295.95, 295.95, 0, 0, 'img/prod40.webp'),
(14, 'Michael Jordan All Star Edition', 'Basketball Shirt', 0, 350.95, 350.95, 0, 0, 'img/prod41.webp'),
(15, 'Kyrie Irving All Star Edition', 'Basketball Shirt', 0, 295.95, 295.95, 0, 0, 'img/prod42.webp'),
(16, 'Nike Tiempo Legend', 'Football Boots', 0, 125.25, 125.25, 0, 0, 'img/prod48.webp'),
(17, 'Crazy BYW Shoes', 'Basketball Boots', 0, 150.15, 150.15, 0, 0, 'img/prod50.webp'),
(18, 'Nike Premier II', 'Football Boots', 0, 195.95, 195.95, 0, 0, 'img/prod49.webp'),
(19, '2017-2018 Atletico Madrid Third Shirt', 'Football Shirt', 0, 85.95, 79.95, 0, 0, 'img/prod37.png'),
(20, '2018 Spain Home Shirt', 'Football Shirt', 0, 99.95, 90.95, 0, 0, 'img/prod38.webp'),
(21, '2017-2018 RB Liepzig Home Shirt', 'Football Shirt', 0, 80.25, 75.95, 0, 0, 'img/prod39.webp'),
(22, '2017-2018 Bucks Shirt', 'Basketball Shirt', 0, 125.15, 115.95, 0, 0, 'img/prod43.webp'),
(23, 'Stephen Curry Alll Star Edition', 'Basketball Shirt', 0, 285.85, 275.95, 0, 0, 'img/prod44.webp'),
(24, '2017-2018 Nets Shirt', 'Basketball Shirt', 0, 115.15, 99.95, 0, 0, 'img/prod45.webp'),
(25, 'Nike Mercurial Superfly', 'Football Boots', 0, 155.95, 149.95, 0, 0, 'img/prod46.webp'),
(26, 'Mad Bounce Shoes', 'Basketball Boots', 0, 95.95, 85.95, 0, 0, 'img/prod51.webp'),
(27, 'Nike Mercurial Victory', 'Football Boots', 0, 200.15, 197.95, 0, 0, 'img/prod47.png'),
(28, '2017-2018 Real Madrid Home Shirt', 'Football Shirt', 0, 115.95, 115.95, 0, 0, 'img/prod10.webp'),
(29, '2017-2018 AC Milan Away Shirt', 'Football Shirt', 0, 99.95, 99.95, 0, 0, 'img/prod11.webp'),
(30, '2018 Germany Home Shirt', 'Football Shirt', 0, 215.15, 215.15, 0, 0, 'img/prod12.jpg'),
(31, 'Nike Mercurial Superfly', 'Football Boots', 0, 254.95, 254.95, 0, 0, 'img/prod19.png'),
(32, 'Nike Mercurial Vapor', 'Football Boots', 0, 210.95, 210.95, 0, 0, 'img/prod20.webp'),
(33, 'Nike Hypervenom III', 'Football Boots', 0, 210.95, 210.95, 0, 0, 'img/prod21.webp'),
(34, 'Adidas X 17.1', 'Football Boots', 0, 200, 200, 0, 0, 'img/prod22.webp'),
(35, 'Adidas Predator 18.3', 'Football Boots', 0, 68, 68, 0, 0, 'img/prod23.webp'),
(36, 'Adidas Copa 18.1', 'Football Boots', 0, 170, 170, 0, 0, 'img/prod24.webp'),
(37, '2018 Hawks Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod13.webp'),
(38, '2018 Celtic Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod14.webp'),
(39, '2018 Bulls Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod15.webp'),
(40, '2018 Hornets Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod16.webp'),
(41, '2018 Spurs Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod17.webp'),
(42, '2018 Pistons Shirt', 'Basketball Shirt', 0, 175.95, 175.95, 0, 0, 'img/prod18.webp'),
(43, 'Nike Kyrie 4', 'Basketball Boots', 0, 254.95, 254.95, 0, 0, 'img/prod25.webp'),
(44, 'Nike PG 2', 'Basketball Boots', 0, 210.95, 210.95, 0, 0, 'img/prod26.webp'),
(45, 'Nike Mamba', 'Basketball Boots', 0, 295.95, 295.95, 0, 0, 'img/prod27.webp'),
(46, 'Adidas Crazy Light', 'Basketball Boots', 0, 120, 120, 0, 0, 'img/prod28.webp'),
(47, 'Adidas Crazy Explosive', 'Basketball Boots', 0, 150, 150, 0, 0, 'img/prod29.webp'),
(48, 'Adidas Harden Vol.2', 'Basketball Boots', 0, 300, 300, 0, 0, 'img/prod30.webp');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postalcode` int(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `method` varchar(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `uid`, `name`, `surname`, `address`, `postalcode`, `phone`, `method`, `price`) VALUES
(4, 18, '123', '123', '123', 123, '123', 'VISA', 99.94999694824219),
(5, 18, '123', '123', '123', 123, '123', 'VISA', 99.94999694824219),
(6, 18, '123', '123', '123', 123, '123', 'MAESTRO', 99.94999694824219),
(7, 18, '1', '1', '1', 1, '1', 'VISA', 215.9499969482422),
(8, 18, '2', '2', '2', 2, '2', 'MASTERCARD', 48.95000076293945),
(9, 18, '2', '2', '2', 2, '2', 'MAESTRO', 175.9499969482422);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `extra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `country`, `price`, `extra`) VALUES
(1, 'bulgaria', 2.75, 1.25),
(2, 'macedonia', 2.5, 1),
(3, 'albania', 2.75, 1.15),
(4, 'kosova', 2.75, 1.15),
(5, 'grecce', 2.95, 1.25),
(6, 'serbia', 3.15, 1.5),
(7, 'croatia', 3.75, 2.15),
(8, 'montenegro', 3.15, 1.95);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `password` varchar(42) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `gender`, `password`, `status`) VALUES
(18, 'brtnbu', 'brtnbu', 'M', '8643aca6c1e79b3363765ee3f2b7988aca06b6dc', b'1'),
(19, 'jetronsaiti', 'jetron.ss@hotmail.com', 'M', 'b13f175593050e24c52fdefc89c10d359c472894', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
