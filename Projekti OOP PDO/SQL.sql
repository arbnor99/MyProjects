-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 04:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alikes`
--

CREATE TABLE `alikes` (
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alikes`
--

INSERT INTO `alikes` (`aid`, `uid`, `liked`) VALUES
(7, 17, 1),
(4, 17, 1),
(7, 19, 1),
(8, 17, 0),
(6, 19, 0),
(1, 19, 1),
(7, 18, 0),
(6, 22, 1),
(7, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `uid`, `title`, `content`, `image`) VALUES
(1, 22, 'Gjuhet programuese me te kerkuara', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pharetra, purus a varius gravida, nibh augue tempor dolor, quis lobortis enim velit a diam. Ut magna mi, suscipit fringilla molestie sit amet, convallis sit amet magna. Cras nulla quam, faucibus sit amet enim quis, gravida euismod felis. Nullam viverra nunc convallis, laoreet nisi et, mattis neque. Vestibulum a sollicitudin magna. Nunc elementum mauris ut ipsum pulvinar dapibus. In in lobortis lectus. Vestibulum auctor, massa ut comm', 'art1.jpg'),
(4, 18, 'Perfitimet e programimit te femijet', 'Ut vitae tristique libero, vel vehicula urna. Phasellus nec pretium ante. Nullam euismod purus vulputate tincidunt auctor. Etiam ultricies lobortis odio, non consequat lectus eleifend eget. Vivamus viverra viverra leo, et dapibus urna condimentum vitae. Quisque vel mauris tortor. Integer volutpat sem eu felis fermentum vehicula. Phasellus odio nibh, sagittis vel mollis quis, sagittis vitae dolor.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras vest', 'art3.jpg'),
(6, 24, 'Interneti', ' Cras nulla quam, faucibus sit amet enim quis, gravida euismod felis. Nullam viverra nunc convallis, laoreet nisi et, mattis neque. Vestibulum a sollicitudin magna. Nunc elementum mauris ut ipsum pulvinar dapibus. In in lobortis lectus. Vestibulum auctor, massa ut comm.  Cras nulla quam, faucibus sit amet enim quis, gravida euismod felis. Nullam viverra nunc convallis, laoreet nisi et, mattis neque. Vestibulum a sollicitudin magna. Nunc elementum mauris ut ipsum pulvinar dapibus. In in lobortis ', 'art2.jpg'),
(7, 22, 'Rendesia e Web Development', 'Ut vitae tristique libero, vel vehicula urna. Phasellus nec pretium ante. Nullam euismod purus vulputate tincidunt auctor. Etiam ultricies lobortis odio, non consequat lectus eleifend eget. Vivamus viverra viverra leo, et dapibus urna condimentum vitae. Quisque vel mauris tortor. Integer volutpat sem eu felis fermentum vehicula. Phasellus odio nibh, sagittis vel mollis quis, sagittis vitae dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Ut vitae tris', 'html1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `time` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `time`, `image`) VALUES
(1, 'HTML', 'Sed ullamcorper tortor quis porta viverra. In non consequat felis. Fusce mattis nec mauris sed faucibus. Fusce ut volutpat turpis. Donec dolor leo, efficitur vel porttitor quis, tincidunt vel sem. Mauris mollis dapibus nisl, eget venenatis tellus pulvinar a. Aenean sit amet nisl mi. Donec congue viverra est, et pellentesque ligula vulputate ac. Integer malesuada iaculis tincidunt. Proin in elit vitae ante ullamcorper hendrerit', '4 months', 'html1.jpg'),
(3, 'CSS', 'Morbi idd est sem. Ut pharetra erat nec mauris aliquam accumsan. Donec convallis, ligula quis dictum tincidunt, mauris nisl finibus sem, sit amet vestibulum diam ligula vel augue. Fusce dolor arcu, posuere quis mattis non, congue a libero. Nunc pretium ligula ipsum, in pretium arcu rhoncus id. Donec at viverra elit, nec viverra mi.', '3 months', 'css1.jpg'),
(4, 'PHP', 'Mauris et commodo est. Proin tincidunt turpis eget luctus varius. Nam vestibulum tellus vel urna lacinia suscipit. Quisque neque risus, sodales vel sapien lobortis, maximus tincidunt tortor. Etiam laoreet massa ut sapien mollis, eu tincidunt nisl cursus. Fusce gravida nisl ut risus dictum, et facilisis erat ultricies.', '5 months', 'php1.jpg'),
(5, 'Laravel', 'Phasellus faucibus, quam non imperdiet porttitor, est enim tempus ante, vel luctus metus arcu et purus. Duis et mi vitae nibh vestibulum placerat. In dignissim est et nisl bibendum molestie. Proin laoreet mi nisi, interdum facilisis nulla facilisis ac. Proin rhoncus arcu vitae justo porta, nec aliquam elit imperdiet.', '3 months', 'Laravel.jpg'),
(7, 'WordPress', 'Curabitur et erat in diam porttitor sodales. Sed quis felis vestibulum, tempor lacus a, gravida est. Ut vitae felis purus. In semper quam in purus commodo, quis facilisis erat hendrerit. Suspendisse commodo ligula sed purus vulputate commodo. Vestibulum accumsan dolor vitae leo interdum', '2 months', 'Wordpress1.jpg'),
(8, 'Bootstrap', 'Suspendisse euismod suscipit malesuada. Nunc tincidunt lectus est, id hendrerit ipsum laoreet a. Aenean tincidunt, nisi eu convallis bibendum, quam mi tincidunt quam, nec ultricies nisl velit quis libero. Praesent a faucibus tellus. Sed eu cursus felis. Morbi blandit lacinia egestas. ', '4 months', 'bootstrap1.jpg'),
(9, 'ReactJS', 'Mauris et commodo est. Proin tincidunt turpis eget luctus varius. Nam vestibulum tellus vel urna lacinia suscipit. Quisque neque risus, sodales vel sapien lobortis, maximus tincidunt tortor. Etiam laoreet massa ut sapien mollis, eu tincidunt nisl cursus. Fusce gravida nisl ut risus dictum, et facilisis erat ultricies.', '5 months', 'reactjs1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

CREATE TABLE `produktet` (
  `ID` int(40) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `EmriProduktit` varchar(100) NOT NULL,
  `Pershkrimi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cid`, `firstname`, `lastname`, `phone`, `email`, `password`) VALUES
(1, 1, 'Ardita', 'Kuqi', '049315742', 'ardita@gmail.com', '12345'),
(2, 1, 'Artan', 'Mazreku', '048547652', 'artan@yahoo.com', '12345'),
(6, 5, 'Agon', 'Zeka', '0894123198', 'agon@gmail.com', '12345'),
(7, 8, 'Rinesa', 'Gashi', '23321564', 'rinesa@yahoo.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'member',
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `role`, `phone`, `email`, `password`) VALUES
(18, 'Astrit', 'Berisha', 'member', '04713659', 'astrit@yahoo.com', '12345678'),
(22, 'Arbnor', 'Gashi', 'admin', '044539020', 'arbnor.gashi99@gmail.com', '12345678'),
(24, 'Agim', 'Kuqi', 'member', '045493157', 'agim@yahoo.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alikes`
--
ALTER TABLE `alikes`
  ADD KEY `aid` (`aid`,`uid`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
