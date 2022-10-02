-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2020 at 02:56 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_icons` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `name_icons`) VALUES
(1, 'Dashboard', 'ti-dashboard'),
(2, 'Menu', 'ti-menu'),
(3, 'User', 'ti-user'),
(4, 'User-tie', 'ti-arrow-left'),
(11, 'tag', 'ti-tag'),
(12, 'Rule', 'ti-ruler'),
(13, 'Announcement', 'ti-announcement'),
(14, 'Bolt alt', 'ti-bolt-alt'),
(15, 'bolt', 'ti-bolt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `images` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `images`, `role_id`, `is_active`) VALUES
(1, 'rifal nurchya', 'rifalnurchya@gmail.com', '$2y$10$ySYvctU2D27L2joH2ZVBTObbOF.IP2aC8iErzzvlJ5HoAi.O3X9t6', 'circle-cropped.png', 1, 1),
(2, 'anisa sholihat', 'anisa@gmail.com', '$2y$10$xM0ONfGWYjq1nW/NeaKhMOvJtlKLZQUcCGxreZnfPgYViLw8nMgve', 'default.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_sid` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`, `menu_sid`) VALUES
(1, 1, 1, '1'),
(3, 2, 2, '1'),
(7, 1, 2, NULL),
(9, 1, 3, NULL),
(10, 1, 4, NULL),
(11, 1, 5, NULL),
(12, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icons` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icons`) VALUES
(1, 'Admin', 'ti-dashboard'),
(2, 'User', 'ti-user'),
(3, 'Menu', 'ti-menu'),
(5, 'Film', 'ti-menu'),
(6, 'Deskrip', 'ti-menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_single`
--

CREATE TABLE `user_menu_single` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icons_sg` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu_single`
--

INSERT INTO `user_menu_single` (`id`, `name`, `url`, `icons_sg`, `is_active`) VALUES
(1, 'Logout', 'auth/logout', 'ti-arrow-left', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `name`, `url`, `menu_id`, `is_active`) VALUES
(1, 'Dashboard', 'admin', 1, 1),
(2, 'My profile', 'user', 2, 1),
(3, 'Create menu', 'menu', 3, 1),
(5, 'Create submenu', 'menu/submenu', 3, 1),
(6, 'Role', 'admin/role', 1, 1),
(7, 'test-submenu', 'test/sm', 4, 1),
(8, 'Manage film', 'film/index', 5, 1),
(9, 'TMDB', 'Deskrip', 6, 1),
(10, 'TVDB', 'Deskrip/index_tvdb', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_single`
--
ALTER TABLE `user_menu_single`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_menu_single`
--
ALTER TABLE `user_menu_single`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
