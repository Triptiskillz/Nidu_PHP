-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 01:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nidu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `role`, `email`, `mobile`, `status`) VALUES
(2, 'admin', 'admin', 0, '', '', 1),
(5, 'Tripti', '0908', 1, 'sharmatripti526@gmail.com', '7619021664', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `btn_txt` int(55) NOT NULL,
  `btn_link` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `heading1`, `heading2`, `btn_txt`, `btn_link`, `image`, `status`, `order_no`) VALUES
(1, 'heading1', 'heading2', 0, 'text.php', '640673501_hero.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(4, 'Electrician', 1),
(5, 'Plumber', 1),
(6, 'Labor', 1),
(7, 'Painter', 1),
(8, 'Carpenter', 1),
(9, 'Cleaning', 1),
(10, 'test1', 0),
(11, 'car4', 0),
(12, 'gardening', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(9, 'Tripti sharma', 'sharmatripti526@gmail.com', '+917619021664', 'hgfds', '2022-04-01 04:04:49'),
(10, 'ved', 'vppandey5660@gmail.com', '8840674026', 'I like your product', '2022-05-31 10:03:13'),
(11, 'Tripti sharma', 'sharmatripti526@gmail.com', '+917619021664', 'nice', '2022-05-31 11:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sevice` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `txnid` varchar(25) NOT NULL,
  `mihpayid` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `sevice`, `phone`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`, `txnid`, `mihpayid`, `status`, `email`, `name`, `date`, `time`) VALUES
(28, 56, '47,Mewa lal bagiya,', 'bulid', '+917619021664', 'COD', 450, 'pending', 2, '2022-05-31 10:09:08', '', '', '', 'sharmatripti526@gmail.com', 'Tripti sharma', '2022-05-10', '13:38:00'),
(29, 55, '47,Mewa lal bagiya,', '', '+917619021664', 'COD', 224, 'pending', 1, '2022-05-31 10:25:57', '', '', '', 'sharmatripti526@gmail.com', 'Tripti sharma', '2022-05-04', '13:56:00'),
(30, 55, '47,Mewa lal bagiya,', '', '+917619021664', 'COD', 112, 'pending', 1, '2022-05-31 10:29:12', '', '', '', 'sharmatripti526@gmail.com', 'Tripti sharma', '0000-00-00', '00:00:00'),
(31, 56, '47,Mewa lal bagiya,', '', '+917619021664', 'COD', 450, 'pending', 1, '2022-05-31 11:55:22', '', '', '', 'sharmatripti526@gmail.com', 'Tripti sharma', '2022-05-05', '15:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(25, 23, 16, 7, 56),
(26, 25, 11, 1, 56),
(27, 26, 16, 4, 56),
(28, 27, 16, 7, 56),
(29, 28, 18, 3, 150),
(30, 29, 7, 4, 56),
(31, 30, 7, 2, 56),
(32, 31, 18, 3, 150);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `aadharcard` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `price`, `phone`, `address`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `status`, `meta_keyword`, `aadharcard`, `email`, `added_by`) VALUES
(7, 4, 'Raju', 56, '1234567890', 'kanpur', '482374547_videoblocks-people-working-in-construction-site-portrait-of-happy-men-at-work-in-new-house-inside-apartment-building-professional-workers-looking-and-smiling-at-camera-as-co-workers-and-friends-slow-motion_rzgiz9ta.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima delectus nulla voluptates nesciunt quidem laudantium, quisquam           voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima           delectus nulla voluptates nesciunt quidem laudantium, quisquam voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!', 'Raju', '', 1, 'provider', '8765431057', 'raju526@gmail.com', 0),
(18, 6, 'Ram', 150, '9450307753', 'Punjab', '654093790_OIP.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima delectus nulla voluptates nesciunt quidem laudantium, quisquam voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima delectus nulla voluptates nesciunt quidem laudantium, quisquam voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!', 'Ram', '', 1, 'Ram', '8765431234567', 'sharmatripti526@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(1, 16, '827190883_129619083_1059422444520538_7423965343892298057_n.jpg'),
(3, 0, '319961489_OIP (1).jpg'),
(4, 18, '943921494_OIP (1).jpg'),
(5, 7, '582225996_OIP (4).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(2000) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES
(3, 15, 55, 'Bad', 'jhxdjksdc', 1, '2022-04-20 08:28:45'),
(4, 16, 55, 'Bad', 'holle', 1, '2022-04-20 08:47:00'),
(5, 16, 55, 'Good', 'I will explain to you', 1, '2022-04-20 09:09:15'),
(6, 15, 55, 'Very Good', 'nice', 1, '2022-05-28 11:56:02'),
(7, 16, 55, 'Very Good', 'nice', 1, '2022-05-28 11:58:36'),
(8, 18, 56, 'Good', 'i like your service', 1, '2022-05-31 10:06:35'),
(9, 7, 55, 'Good', '', 1, '2022-05-31 10:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(400) NOT NULL,
  `token` varchar(255) NOT NULL,
  `aadharcard` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `professional` varchar(2000) NOT NULL,
  `address` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `id`, `email`, `password`, `token`, `aadharcard`, `mobile`, `professional`, `address`) VALUES
('Tripti sharma', 55, 'sharmatripti526@gmail.com', '5aee410122e9d1d76f194496cb2f90de', 'fc0ab33d4755ed73c5cfb5bfed80d0', '8765431234567', '123456789', 'Gamer', '47,Mewa lal bagiya,'),
('vppandey56', 56, 'vppandey5660@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5aa6cd3d2b1257edd4d8f5f0927ecc', '755729991567', '8840674026', 'studest', 'allahabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
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
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
