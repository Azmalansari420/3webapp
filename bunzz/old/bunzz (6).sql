-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 07:02 AM
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
-- Database: `bunzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` blob NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `name`, `content`, `mission`, `vision`) VALUES
(1, 'About uS', 0x3c703e57656c636f6d6520746f204e616d6b65656e2043686970732062792042554e5a5a2c20776865726520747261646974696f6e206d6565747320666c61766f7221204f75722070617373696f6e20666f722061757468656e74696320496e6469616e20736e61636b732064726976657320757320746f20637261667420686967682d7175616c69747920747265617473207468617420756e6974652070656f706c652e205573696e67206f6e6c79207468652066696e65737420696e6772656469656e74732c20776520656e7375726520612070657266656374206372756e636820616e64206d656d6f7261626c6520746173746520696e20657665727920626974652e2046726f6d20636c617373696320746f20696e6e6f76617469766520666c61766f72732c206f757220736e61636b732061726520696465616c20666f7220616e79206f63636173696f6e2e20436f6d6d697474656420746f207175616c69747920616e64207375737461696e6162696c6974792c20776520736f7572636520726573706f6e7369626c7920616e6420737570706f7274206c6f63616c20636f6d6d756e69746965732e2042554e5a5a2061696d7320746f2062726964676520757262616e20616e64207469657220322f33206d61726b6574732c206f66666572696e67206865616c746869657220736e61636b7320616e642066616972207472616465206f70706f7274756e69746965732e204a6f696e20757320696e2063656c6562726174696e6720666c61766f7220616e6420636f6d6d756e69747920776974682065766572792064656c6963696f75732062697465213c2f703e0d0a0d0a3c703e3c7374726f6e673e57652061696d20746f3a3c2f7374726f6e673e3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e437265617465206120776f726c64206f6620666c61766f757273207468617420696e7370697265206a6f7920616e642073686172696e673c2f6c693e0d0a093c6c693e557365206f6e6c79207468652066696e6573742c207375737461696e61626c7920736f757263656420696e6772656469656e74733c2f6c693e0d0a093c6c693e44656c69676874206f757220637573746f6d657273207769746820657863657074696f6e616c207175616c69747920616e6420736572766963653c2f6c693e0d0a093c6c693e4d616b65206120706f73697469766520696d70616374206f6e2074686520656e7669726f6e6d656e7420616e6420736f63696574793c2f6c693e0d0a3c2f756c3e0d0a, 'At Rengvo Foods, our mission is to craft Namkeens/Snacks that not only tantalise taste buds but also nourish bodies and minds.', 'To be the leading namkeen brand, celebrated for our delicious, innovative, and sustainable snacks that bring people together and make every moment a delightful experience.');

-- --------------------------------------------------------

--
-- Table structure for table `activity_records`
--

CREATE TABLE `activity_records` (
  `id` int(11) NOT NULL,
  `ip_addreass` text NOT NULL,
  `url` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_records`
--

INSERT INTO `activity_records` (`id`, `ip_addreass`, `url`, `date`, `time`, `admin_id`, `admin_username`, `admin_password`) VALUES
(10, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-07', '13:23:32', 69, 'mis@gmail.com', '123456'),
(11, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-07', '13:23:38', 69, 'mis@gmail.com', '123456'),
(12, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '13:23:52', 69, 'mis@gmail.com', '123456'),
(13, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-07', '13:24:23', 69, 'mis@gmail.com', '123456'),
(14, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-07', '13:25:46', 69, 'mis@gmail.com', '123456'),
(15, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-07', '13:25:50', 69, 'mis@gmail.com', '123456'),
(16, '::1', 'http://localhost/bunzzapp/admin/dashboard', '2025-01-07', '13:27:12', 2, 'admin', 'admin'),
(17, '::1', 'http://localhost/bunzzapp/admin_con/site_setting/edit/1', '2025-01-07', '13:27:29', 2, 'admin', 'admin'),
(18, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-07', '13:31:36', 69, 'mis@gmail.com', '123456'),
(19, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '13:34:19', 69, 'mis@gmail.com', '123456'),
(20, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '14:31:19', 69, 'mis@gmail.com', '123456'),
(21, '::1', 'http://localhost/bunzzapp/app/profile.php', '2025-01-07', '14:36:01', 69, 'mis@gmail.com', '123456'),
(22, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '16:36:49', 69, 'mis@gmail.com', '123456'),
(23, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '16:36:53', 69, 'mis@gmail.com', '123456'),
(24, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:13:43', 69, 'mis@gmail.com', '123456'),
(25, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:14:13', 69, 'mis@gmail.com', '123456'),
(26, '::1', 'http://localhost/bunzzapp/app/asm-list.php', '2025-01-07', '17:14:16', 69, 'mis@gmail.com', '123456'),
(27, '::1', 'http://localhost/bunzzapp/app/rsm-list.php', '2025-01-07', '17:14:22', 69, 'mis@gmail.com', '123456'),
(28, '::1', 'http://localhost/bunzzapp/app/sale-officer.php', '2025-01-07', '17:14:25', 69, 'mis@gmail.com', '123456'),
(29, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:14:29', 69, 'mis@gmail.com', '123456'),
(30, '::1', 'http://localhost/bunzzapp/app/distributer-list.php', '2025-01-07', '17:14:32', 69, 'mis@gmail.com', '123456'),
(31, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:14:34', 69, 'mis@gmail.com', '123456'),
(32, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-07', '17:14:36', 69, 'mis@gmail.com', '123456'),
(33, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:14:37', 69, 'mis@gmail.com', '123456'),
(34, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:14:42', 69, 'mis@gmail.com', '123456'),
(35, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '17:15:17', 69, 'mis@gmail.com', '123456'),
(36, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:15:19', 69, 'mis@gmail.com', '123456'),
(37, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:16:17', 69, 'mis@gmail.com', '123456'),
(38, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:16:52', 69, 'mis@gmail.com', '123456'),
(39, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:17:04', 69, 'mis@gmail.com', '123456'),
(40, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:17:24', 69, 'mis@gmail.com', '123456'),
(41, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:18:49', 69, 'mis@gmail.com', '123456'),
(42, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:19:00', 69, 'mis@gmail.com', '123456'),
(43, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:19:16', 69, 'mis@gmail.com', '123456'),
(44, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-07', '17:19:28', 69, 'mis@gmail.com', '123456'),
(45, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-07', '18:44:52', 69, 'mis@gmail.com', '123456'),
(46, '::1', 'http://localhost/bunzzapp/app/profile.php', '2025-01-07', '18:44:57', 69, 'mis@gmail.com', '123456'),
(47, '::1', 'http://localhost/bunzzapp/app/update-profile.php', '2025-01-07', '18:44:58', 69, 'mis@gmail.com', '123456'),
(48, '::1', 'http://localhost/bunzzapp/app/update-profile.php', '2025-01-08', '10:40:04', 69, 'mis@gmail.com', '123456'),
(49, '::1', 'http://localhost/bunzzapp/app/profile.php', '2025-01-08', '10:43:54', 69, 'mis@gmail.com', '123456'),
(50, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-08', '10:43:56', 69, 'mis@gmail.com', '123456'),
(51, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-08', '11:11:06', 69, 'mis@gmail.com', '123456'),
(52, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-08', '11:11:59', 69, 'mis@gmail.com', '123456'),
(53, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-08', '11:13:56', 69, 'mis@gmail.com', '123456'),
(54, '::1', 'http://localhost/bunzzapp/app/rsm-list.php', '2025-01-08', '17:06:36', 69, 'mis@gmail.com', '123456'),
(55, '::1', 'http://localhost/bunzzapp/app/rsm-list.php', '2025-01-09', '10:38:23', 69, 'mis@gmail.com', '123456'),
(56, '::1', 'http://localhost/bunzzapp/app/rsm-list.php', '2025-01-09', '11:06:30', 69, 'mis@gmail.com', '123456'),
(57, '::1', 'http://localhost/bunzzapp/app/rsm-list.php', '2025-01-09', '11:10:43', 69, 'mis@gmail.com', '123456'),
(58, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:10:48', 69, 'mis@gmail.com', '123456'),
(59, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:11:26', 69, 'mis@gmail.com', '123456'),
(60, '::1', 'http://localhost/bunzzapp/admin/dashboard', '2025-01-09', '11:13:24', 2, 'admin', 'admin'),
(61, '::1', 'http://localhost/bunzzapp/admin_con/finalorder/listing', '2025-01-09', '11:13:27', 2, 'admin', 'admin'),
(62, '::1', 'http://localhost/bunzzapp/app/distributor/home', '2025-01-09', '11:15:11', 59, 'rishabh@gmail.com', '123456'),
(63, '::1', 'http://localhost/bunzzapp/app/order-history.php', '2025-01-09', '11:15:15', 59, 'rishabh@gmail.com', '123456'),
(64, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:17:28', 69, 'mis@gmail.com', '123456'),
(65, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:17:56', 69, 'mis@gmail.com', '123456'),
(66, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:18:17', 69, 'mis@gmail.com', '123456'),
(67, '::1', 'http://localhost/bunzzapp/app/transaction-records.php', '2025-01-09', '11:19:52', 69, 'mis@gmail.com', '123456'),
(68, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '11:20:34', 69, 'mis@gmail.com', '123456'),
(69, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:20:47', 69, 'mis@gmail.com', '123456'),
(70, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:21:20', 69, 'mis@gmail.com', '123456'),
(71, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:21:58', 69, 'mis@gmail.com', '123456'),
(72, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:22:31', 69, 'mis@gmail.com', '123456'),
(73, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:23:43', 69, 'mis@gmail.com', '123456'),
(74, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:24:37', 69, 'mis@gmail.com', '123456'),
(75, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:24:44', 69, 'mis@gmail.com', '123456'),
(76, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:25:00', 69, 'mis@gmail.com', '123456'),
(77, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:25:36', 69, 'mis@gmail.com', '123456'),
(78, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:25:47', 69, 'mis@gmail.com', '123456'),
(79, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:26:47', 69, 'mis@gmail.com', '123456'),
(80, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:35:45', 69, 'mis@gmail.com', '123456'),
(81, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:36:27', 69, 'mis@gmail.com', '123456'),
(82, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:38:39', 69, 'mis@gmail.com', '123456'),
(83, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:39:35', 69, 'mis@gmail.com', '123456'),
(84, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:39:45', 69, 'mis@gmail.com', '123456'),
(85, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:40:28', 69, 'mis@gmail.com', '123456'),
(86, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:41:24', 69, 'mis@gmail.com', '123456'),
(87, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:41:54', 69, 'mis@gmail.com', '123456'),
(88, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:42:08', 69, 'mis@gmail.com', '123456'),
(89, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:42:08', 69, 'mis@gmail.com', '123456'),
(90, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:43:58', 69, 'mis@gmail.com', '123456'),
(91, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:44:13', 69, 'mis@gmail.com', '123456'),
(92, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:44:22', 69, 'mis@gmail.com', '123456'),
(93, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:45:02', 69, 'mis@gmail.com', '123456'),
(94, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:45:23', 69, 'mis@gmail.com', '123456'),
(95, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:45:39', 69, 'mis@gmail.com', '123456'),
(96, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:45:46', 69, 'mis@gmail.com', '123456'),
(97, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:48:01', 69, 'mis@gmail.com', '123456'),
(98, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:48:07', 69, 'mis@gmail.com', '123456'),
(99, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:48:28', 69, 'mis@gmail.com', '123456'),
(100, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:49:09', 69, 'mis@gmail.com', '123456'),
(101, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:49:20', 69, 'mis@gmail.com', '123456'),
(102, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:51:04', 69, 'mis@gmail.com', '123456'),
(103, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:51:34', 69, 'mis@gmail.com', '123456'),
(104, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:53:20', 69, 'mis@gmail.com', '123456'),
(105, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:54:09', 69, 'mis@gmail.com', '123456'),
(106, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:54:22', 69, 'mis@gmail.com', '123456'),
(107, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:56:06', 69, 'mis@gmail.com', '123456'),
(108, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:56:24', 69, 'mis@gmail.com', '123456'),
(109, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:57:22', 69, 'mis@gmail.com', '123456'),
(110, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '11:58:00', 69, 'mis@gmail.com', '123456'),
(111, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '11:58:06', 69, 'mis@gmail.com', '123456'),
(112, '::1', 'http://localhost/bunzzapp/app/distributer-payment.php', '2025-01-09', '12:00:41', 69, 'mis@gmail.com', '123456'),
(113, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:01:25', 69, 'mis@gmail.com', '123456'),
(114, '::1', 'http://localhost/bunzzapp/app/profile.php', '2025-01-09', '12:02:55', 69, 'mis@gmail.com', '123456'),
(115, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-09', '12:26:35', 70, 'acountteam@gmail.com', '123456'),
(116, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-09', '12:27:44', 70, 'acountteam@gmail.com', '123456'),
(117, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-09', '12:27:51', 70, 'acountteam@gmail.com', '123456'),
(118, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-09', '12:27:55', 70, 'acountteam@gmail.com', '123456'),
(119, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-01-09', '12:28:26', 70, 'acountteam@gmail.com', '123456'),
(120, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:28:54', 70, 'acountteam@gmail.com', '123456'),
(121, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:29:15', 70, 'acountteam@gmail.com', '123456'),
(122, '::1', 'http://localhost/bunzzapp/api/rsm/leadgerdata2', '2025-01-09', '12:29:27', 70, 'acountteam@gmail.com', '123456'),
(123, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:32:08', 70, 'acountteam@gmail.com', '123456'),
(124, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:32:10', 70, 'acountteam@gmail.com', '123456'),
(125, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:32:48', 70, 'acountteam@gmail.com', '123456'),
(126, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:33:07', 70, 'acountteam@gmail.com', '123456'),
(127, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:33:55', 70, 'acountteam@gmail.com', '123456'),
(128, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:34:17', 70, 'acountteam@gmail.com', '123456'),
(129, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-01-09', '12:37:09', 70, 'acountteam@gmail.com', '123456'),
(130, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:37:10', 70, 'acountteam@gmail.com', '123456'),
(131, '::1', 'http://localhost/bunzzapp/app/get-invoice.php', '2025-01-09', '12:37:12', 70, 'acountteam@gmail.com', '123456'),
(132, '::1', 'http://localhost/bunzzapp/app/get-invoice.php', '2025-01-09', '12:37:27', 70, 'acountteam@gmail.com', '123456'),
(133, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:37:47', 70, 'acountteam@gmail.com', '123456'),
(134, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:38:19', 70, 'acountteam@gmail.com', '123456'),
(135, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:38:29', 70, 'acountteam@gmail.com', '123456'),
(136, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:38:53', 70, 'acountteam@gmail.com', '123456'),
(137, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:39:32', 70, 'acountteam@gmail.com', '123456'),
(138, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '12:59:41', 70, 'acountteam@gmail.com', '123456'),
(139, '::1', 'http://localhost/bunzzapp/app/get-invoice.php', '2025-01-09', '14:47:46', 70, 'acountteam@gmail.com', '123456'),
(140, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-09', '15:48:09', 70, 'acountteam@gmail.com', '123456'),
(141, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-01-10', '10:40:06', 70, 'acountteam@gmail.com', '123456'),
(142, '::1', 'http://localhost/bunzzapp/api/rsm/leadgerdata2', '2025-01-10', '11:00:43', 70, 'acountteam@gmail.com', '123456'),
(143, '::1', 'http://localhost/bunzzapp/api/rsm/download_ledger_pdf', '2025-01-10', '11:00:56', 70, 'acountteam@gmail.com', '123456'),
(144, '::1', 'http://localhost/bunzzapp/admin/dashboard', '2025-01-10', '15:40:22', 2, 'admin', 'admin'),
(145, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/listing', '2025-01-10', '15:40:29', 2, 'admin', 'admin'),
(146, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/edit/6', '2025-01-10', '15:40:32', 2, 'admin', 'admin'),
(147, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/listing', '2025-01-10', '15:40:34', 2, 'admin', 'admin'),
(148, '::1', 'http://localhost/bunzzapp/admin_con/role/listing', '2025-01-10', '15:40:36', 2, 'admin', 'admin'),
(149, '::1', 'http://localhost/bunzzapp/admin_con/role/edit/1', '2025-01-10', '15:40:40', 2, 'admin', 'admin'),
(150, '::1', 'http://localhost/bunzzapp/admin_con/nsm/listing', '2025-01-10', '15:41:00', 2, 'admin', 'admin'),
(151, '::1', 'http://localhost/bunzzapp/admin_con/nsm/add', '2025-01-10', '15:41:02', 2, 'admin', 'admin'),
(152, '::1', 'http://localhost/bunzzapp/admin_con/nsm/listing', '2025-01-10', '15:41:06', 2, 'admin', 'admin'),
(153, '::1', 'http://localhost/bunzzapp/admin_con/rsm/listing', '2025-01-10', '15:41:08', 2, 'admin', 'admin'),
(154, '::1', 'http://localhost/bunzzapp/admin_con/rsm/add', '2025-01-10', '15:41:09', 2, 'admin', 'admin'),
(155, '::1', 'http://localhost/bunzzapp/admin_con/rsm/add', '2025-01-10', '15:53:59', 2, 'admin', 'admin'),
(156, '::1', 'http://localhost/bunzzapp/admin_con/warning_nsm/listing', '2025-01-10', '16:02:28', 2, 'admin', 'admin'),
(157, '::1', 'http://localhost/bunzzapp/admin_con/warning_nsm/edit/2', '2025-01-10', '16:02:32', 2, 'admin', 'admin'),
(158, '::1', 'http://localhost/bunzzapp/admin_con/role/listing', '2025-01-10', '16:05:46', 2, 'admin', 'admin'),
(159, '::1', 'http://localhost/bunzzapp/admin_con/role/edit/1', '2025-01-10', '16:05:49', 2, 'admin', 'admin'),
(160, '::1', 'http://localhost/bunzzapp/admin_con/employees/listing', '2025-01-10', '16:06:41', 2, 'admin', 'admin'),
(161, '::1', 'http://localhost/bunzzapp/admin_con/employees/add', '2025-01-10', '16:06:44', 2, 'admin', 'admin'),
(162, '::1', 'http://localhost/bunzzapp/admin_con/employees/add', '2025-01-10', '16:06:44', 2, 'admin', 'admin'),
(163, '::1', 'http://localhost/bunzzapp/admin_con/role/listing', '2025-01-10', '16:07:29', 2, 'admin', 'admin'),
(164, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/listing', '2025-01-10', '16:07:34', 2, 'admin', 'admin'),
(165, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/add', '2025-01-10', '16:07:44', 2, 'admin', 'admin'),
(166, '::1', 'http://localhost/bunzzapp/admin_con/tbl_admin/listing', '2025-01-10', '16:08:10', 2, 'admin', 'admin'),
(167, '::1', 'http://localhost/bunzzapp/admin/dashboard', '2025-01-10', '16:08:19', 7, 'hr@gmail.com', '123456'),
(168, '::1', 'http://localhost/bunzzapp/admin/access_denied', '2025-01-10', '16:08:22', 7, 'hr@gmail.com', '123456'),
(169, '::1', 'http://localhost/bunzzapp/admin/dashboard', '2025-01-10', '16:08:23', 7, 'hr@gmail.com', '123456'),
(170, '::1', 'http://localhost/bunzzapp/admin_con/employees/listing', '2025-01-10', '16:08:26', 7, 'hr@gmail.com', '123456'),
(171, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:10:41', 71, 'hr@gmail.com', '123456'),
(172, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:12:56', 71, 'hr@gmail.com', '123456'),
(173, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:13:25', 71, 'hr@gmail.com', '123456'),
(174, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:13:41', 71, 'hr@gmail.com', '123456'),
(175, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:12', 71, 'hr@gmail.com', '123456'),
(176, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:18', 71, 'hr@gmail.com', '123456'),
(177, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:20', 71, 'hr@gmail.com', '123456'),
(178, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:23', 71, 'hr@gmail.com', '123456'),
(179, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:37', 71, 'hr@gmail.com', '123456'),
(180, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:14:46', 71, 'hr@gmail.com', '123456'),
(181, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:15:02', 71, 'hr@gmail.com', '123456'),
(182, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:15:19', 71, 'hr@gmail.com', '123456'),
(183, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:15:27', 71, 'hr@gmail.com', '123456'),
(184, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:15:40', 71, 'hr@gmail.com', '123456'),
(185, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:16:07', 71, 'hr@gmail.com', '123456'),
(186, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:16:32', 71, 'hr@gmail.com', '123456'),
(187, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:17:03', 71, 'hr@gmail.com', '123456'),
(188, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:17:09', 71, 'hr@gmail.com', '123456'),
(189, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:17:16', 71, 'hr@gmail.com', '123456'),
(190, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:17:37', 71, 'hr@gmail.com', '123456'),
(191, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:18:39', 71, 'hr@gmail.com', '123456'),
(192, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:19:28', 71, 'hr@gmail.com', '123456'),
(193, '::1', 'http://localhost/bunzzapp/app/mis/employees-add.php', '2025-01-10', '16:21:31', 71, 'hr@gmail.com', '123456'),
(194, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:21:37', 71, 'hr@gmail.com', '123456'),
(195, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:21:43', 71, 'hr@gmail.com', '123456'),
(196, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:21:46', 71, 'hr@gmail.com', '123456'),
(197, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:22:20', 71, 'hr@gmail.com', '123456'),
(198, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:22:21', 71, 'hr@gmail.com', '123456'),
(199, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:22:23', 71, 'hr@gmail.com', '123456'),
(200, '::1', 'http://localhost/bunzzapp/app/home', '2025-01-10', '16:22:25', 71, 'hr@gmail.com', '123456'),
(201, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:22:28', 71, 'hr@gmail.com', '123456'),
(202, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:22:42', 71, 'hr@gmail.com', '123456'),
(203, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:23:01', 71, 'hr@gmail.com', '123456'),
(204, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:23:10', 71, 'hr@gmail.com', '123456'),
(205, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:23:29', 71, 'hr@gmail.com', '123456'),
(206, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:23:40', 71, 'hr@gmail.com', '123456'),
(207, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:25:03', 71, 'hr@gmail.com', '123456'),
(208, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:29:26', 71, 'hr@gmail.com', '123456'),
(209, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:29:54', 71, 'hr@gmail.com', '123456'),
(210, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:29:55', 71, 'hr@gmail.com', '123456'),
(211, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:30:34', 71, 'hr@gmail.com', '123456'),
(212, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:31:03', 71, 'hr@gmail.com', '123456'),
(213, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:31:13', 71, 'hr@gmail.com', '123456'),
(214, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:31:18', 71, 'hr@gmail.com', '123456'),
(215, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:31:46', 71, 'hr@gmail.com', '123456'),
(216, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:36:07', 71, 'hr@gmail.com', '123456'),
(217, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:36:18', 71, 'hr@gmail.com', '123456'),
(218, '::1', 'http://localhost/bunzzapp/admin_con/employees/listing', '2025-01-10', '16:37:51', 7, 'hr@gmail.com', '123456'),
(219, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:38:08', 71, 'hr@gmail.com', '123456'),
(220, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:39:40', 71, 'hr@gmail.com', '123456'),
(221, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:40:11', 71, 'hr@gmail.com', '123456'),
(222, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:41:04', 71, 'hr@gmail.com', '123456'),
(223, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:41:56', 71, 'hr@gmail.com', '123456'),
(224, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:42:14', 71, 'hr@gmail.com', '123456'),
(225, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:42:32', 71, 'hr@gmail.com', '123456'),
(226, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:42:54', 71, 'hr@gmail.com', '123456'),
(227, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:43:15', 71, 'hr@gmail.com', '123456'),
(228, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:43:18', 71, 'hr@gmail.com', '123456'),
(229, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:43:21', 71, 'hr@gmail.com', '123456'),
(230, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:43:56', 71, 'hr@gmail.com', '123456'),
(231, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:04', 71, 'hr@gmail.com', '123456'),
(232, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:44:08', 71, 'hr@gmail.com', '123456'),
(233, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:44:17', 71, 'hr@gmail.com', '123456'),
(234, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:22', 71, 'hr@gmail.com', '123456'),
(235, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:44:27', 71, 'hr@gmail.com', '123456'),
(236, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:29', 71, 'hr@gmail.com', '123456'),
(237, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:44:31', 71, 'hr@gmail.com', '123456'),
(238, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:35', 71, 'hr@gmail.com', '123456'),
(239, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:50', 71, 'hr@gmail.com', '123456'),
(240, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:44:51', 71, 'hr@gmail.com', '123456'),
(241, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:44:54', 71, 'hr@gmail.com', '123456'),
(242, '::1', 'http://localhost/bunzzapp/app/employees-add.php', '2025-01-10', '16:45:14', 71, 'hr@gmail.com', '123456'),
(243, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:45:16', 71, 'hr@gmail.com', '123456'),
(244, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:45:17', 71, 'hr@gmail.com', '123456'),
(245, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:45:19', 71, 'hr@gmail.com', '123456'),
(246, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:45:22', 71, 'hr@gmail.com', '123456'),
(247, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:45:27', 71, 'hr@gmail.com', '123456'),
(248, '::1', 'http://localhost/bunzzapp/app/hr/employees-update.php', '2025-01-10', '16:45:28', 71, 'hr@gmail.com', '123456'),
(249, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:45:32', 71, 'hr@gmail.com', '123456'),
(250, '::1', 'http://localhost/bunzzapp/app/hr/home.php', '2025-01-10', '16:46:28', 71, 'hr@gmail.com', '123456'),
(251, '::1', 'http://localhost/bunzzapp/admin_con/employees/listing', '2025-01-10', '18:14:57', 7, 'hr@gmail.com', '123456'),
(252, '2401:4900:1f39:15d:5cc2:6fc:7445:fbac', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-10', '18:22:50', 71, 'hr@gmail.com', '123456'),
(253, '2401:4900:1f39:15d:5cc2:6fc:7445:fbac', 'https://digitalnamo.com/bunzzapp/app/employees-add.php', '2025-01-10', '18:23:01', 71, 'hr@gmail.com', '123456'),
(254, '2401:4900:1f39:15d:5cc2:6fc:7445:fbac', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-10', '18:23:03', 71, 'hr@gmail.com', '123456'),
(255, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:35:45', 59, 'rishabh@gmail.com', '123456'),
(256, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/category-product.php', '2025-01-10', '18:35:53', 59, 'rishabh@gmail.com', '123456'),
(257, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:35:57', 59, 'rishabh@gmail.com', '123456'),
(258, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/wallet.php', '2025-01-10', '18:36:03', 59, 'rishabh@gmail.com', '123456'),
(259, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:36:06', 59, 'rishabh@gmail.com', '123456'),
(260, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/product-details.php', '2025-01-10', '18:36:14', 59, 'rishabh@gmail.com', '123456'),
(261, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:36:27', 59, 'rishabh@gmail.com', '123456'),
(262, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/product-details.php', '2025-01-10', '18:36:31', 59, 'rishabh@gmail.com', '123456'),
(263, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/product-details.php', '2025-01-10', '18:37:02', 59, 'rishabh@gmail.com', '123456'),
(264, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/product-details.php', '2025-01-10', '18:37:03', 59, 'rishabh@gmail.com', '123456'),
(265, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:37:05', 59, 'rishabh@gmail.com', '123456'),
(266, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-10', '18:37:06', 59, 'rishabh@gmail.com', '123456'),
(267, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-10', '18:37:08', 59, 'rishabh@gmail.com', '123456'),
(268, '42.105.157.55', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-10', '18:37:08', 59, 'rishabh@gmail.com', '123456'),
(269, '103.237.157.182', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-10', '19:17:16', 36, 'Prajapati@gmail.com', '123456'),
(270, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-11', '08:58:20', 10, 'nsm@gmail.com', '123456'),
(271, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-11', '08:59:21', 70, 'acountteam@gmail.com', '123456'),
(272, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/distributer-ledger.php', '2025-01-11', '08:59:36', 70, 'acountteam@gmail.com', '123456'),
(273, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/api/rsm/leadgerdata2', '2025-01-11', '08:59:46', 70, 'acountteam@gmail.com', '123456'),
(274, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/api/rsm/leadgerdata2', '2025-01-11', '08:59:50', 70, 'acountteam@gmail.com', '123456'),
(275, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/home.php', '2025-01-11', '08:59:52', 70, 'acountteam@gmail.com', '123456'),
(276, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/get-invoice.php', '2025-01-11', '08:59:56', 70, 'acountteam@gmail.com', '123456'),
(277, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/get-invoice.php', '2025-01-11', '09:00:14', 70, 'acountteam@gmail.com', '123456'),
(278, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/home.php', '2025-01-11', '09:00:18', 70, 'acountteam@gmail.com', '123456'),
(279, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/distributer-ledger.php', '2025-01-11', '09:00:20', 70, 'acountteam@gmail.com', '123456'),
(280, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/home.php', '2025-01-11', '09:00:21', 70, 'acountteam@gmail.com', '123456'),
(281, '106.219.163.50', 'https://digitalnamo.com/bunzzapp/app/credit-note.php', '2025-01-11', '09:00:29', 70, 'acountteam@gmail.com', '123456'),
(282, '2402:e280:2234:48:7cb7:1b7b:228a:5cb2', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-13', '11:02:14', 70, 'acountteam@gmail.com', '123456'),
(283, '2401:4900:1f38:7326:2410:f538:e56e:3456', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-15', '11:18:35', 36, 'Prajapati@gmail.com', '123456'),
(284, '2401:4900:1f38:7326:2410:f538:e56e:3456', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-15', '11:19:20', 61, 'Prateek@gmail.com', '123456'),
(285, '2401:4900:1f38:7326:2410:f538:e56e:3456', 'https://digitalnamo.com/bunzzapp/app/cart.php', '2025-01-15', '11:19:30', 61, 'Prateek@gmail.com', '123456'),
(286, '2401:4900:1f38:7326:2410:f538:e56e:3456', 'https://digitalnamo.com/bunzzapp/app/cart.php', '2025-01-15', '11:19:32', 61, 'Prateek@gmail.com', '123456'),
(287, '2401:4900:1f38:7326:2410:f538:e56e:3456', 'https://digitalnamo.com/bunzzapp/app/distributor/home', '2025-01-15', '11:19:37', 61, 'Prateek@gmail.com', '123456'),
(288, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-17', '11:45:07', 68, 'kumartushki123456@gmail.com', '1735628880'),
(289, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/distributor/category-product.php', '2025-01-17', '11:45:15', 68, 'kumartushki123456@gmail.com', '1735628880'),
(290, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-17', '11:45:35', 68, 'kumartushki123456@gmail.com', '1735628880'),
(291, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/distributor/category-product.php', '2025-01-17', '11:45:44', 68, 'kumartushki123456@gmail.com', '1735628880'),
(292, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-17', '11:45:59', 68, 'kumartushki123456@gmail.com', '1735628880'),
(293, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-17', '11:46:10', 68, 'kumartushki123456@gmail.com', '1735628880'),
(294, '2401:4900:1c7b:edca:e22c:5d6a:1d8e:8f5', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-17', '11:46:11', 68, 'kumartushki123456@gmail.com', '1735628880'),
(295, '2402:e280:2234:48:fc5e:2632:9956:a21b', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-21', '13:50:43', 68, 'kumartushki123456@gmail.com', '1735628880'),
(296, '2402:e280:2234:48:fc5e:2632:9956:a21b', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-21', '13:50:46', 68, 'kumartushki123456@gmail.com', '1735628880'),
(297, '117.205.90.144', 'https://digitalnamo.com/bunzzapp/app/home', '2025-01-21', '15:08:54', 36, 'Prajapati@gmail.com', '123456'),
(298, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:04:29', 70, '78945616650', '123456'),
(299, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-02-13', '17:56:00', 70, '78945616650', '123456'),
(300, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:56:03', 70, '78945616650', '123456'),
(301, '::1', 'http://localhost/bunzzapp/app/credit-note.php', '2025-02-13', '17:56:26', 70, '78945616650', '123456'),
(302, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:56:33', 70, '78945616650', '123456'),
(303, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:58:24', 70, '78945616650', '123456'),
(304, '::1', 'http://localhost/bunzzapp/app/distributer-ledger.php', '2025-02-13', '17:59:42', 70, '78945616650', '123456'),
(305, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:59:45', 70, '78945616650', '123456'),
(306, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:59:50', 70, '78945616650', '123456'),
(307, '::1', 'http://localhost/bunzzapp/app/wallet-recharge.php', '2025-02-13', '17:59:53', 70, '78945616650', '123456'),
(308, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '17:59:55', 70, '78945616650', '123456'),
(309, '::1', 'http://localhost/bunzzapp/app/get-invoice.php', '2025-02-13', '17:59:59', 70, '78945616650', '123456'),
(310, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-13', '18:00:30', 70, '78945616650', '123456'),
(311, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:00:33', 70, '78945616650', '123456'),
(312, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:16:49', 70, '78945616650', '123456'),
(313, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:18:46', 70, '78945616650', '123456'),
(314, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:19:10', 70, '78945616650', '123456'),
(315, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:19:28', 70, '78945616650', '123456'),
(316, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:19:33', 70, '78945616650', '123456'),
(317, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:19:46', 70, '78945616650', '123456'),
(318, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:19:52', 70, '78945616650', '123456'),
(319, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:20:03', 70, '78945616650', '123456'),
(320, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:20:22', 70, '78945616650', '123456'),
(321, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:20:50', 70, '78945616650', '123456'),
(322, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-13', '18:20:51', 70, '78945616650', '123456'),
(323, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-13', '18:20:53', 70, '78945616650', '123456'),
(324, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-13', '18:21:12', 70, '78945616650', '123456'),
(325, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-13', '18:21:31', 70, '78945616650', '123456'),
(326, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-13', '18:23:14', 70, '78945616650', '123456'),
(327, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '10:26:34', 70, '78945616650', '123456'),
(328, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:11:22', 70, '78945616650', '123456'),
(329, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:12:47', 70, '78945616650', '123456'),
(330, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:13:05', 70, '78945616650', '123456'),
(331, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:13:23', 70, '78945616650', '123456'),
(332, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:13:39', 70, '78945616650', '123456'),
(333, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:14:07', 70, '78945616650', '123456'),
(334, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:14:33', 70, '78945616650', '123456'),
(335, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:15:40', 70, '78945616650', '123456'),
(336, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:18:21', 70, '78945616650', '123456'),
(337, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '11:19:05', 70, '78945616650', '123456'),
(338, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '12:26:38', 70, '78945616650', '123456'),
(339, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '14:40:37', 70, '78945616650', '123456'),
(340, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:11:55', 70, '78945616650', '123456'),
(341, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:12:06', 70, '78945616650', '123456'),
(342, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:12:24', 70, '78945616650', '123456'),
(343, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:12:36', 70, '78945616650', '123456'),
(344, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:12:52', 70, '78945616650', '123456'),
(345, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:13:43', 70, '78945616650', '123456'),
(346, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:13:53', 70, '78945616650', '123456'),
(347, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:14:54', 70, '78945616650', '123456'),
(348, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:15:17', 70, '78945616650', '123456'),
(349, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:15:31', 70, '78945616650', '123456'),
(350, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:15:37', 70, '78945616650', '123456'),
(351, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:17:32', 70, '78945616650', '123456'),
(352, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:17:54', 70, '78945616650', '123456'),
(353, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:18:36', 70, '78945616650', '123456'),
(354, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:18:55', 70, '78945616650', '123456'),
(355, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:19:09', 70, '78945616650', '123456'),
(356, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:19:49', 70, '78945616650', '123456'),
(357, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:22:07', 70, '78945616650', '123456'),
(358, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:22:08', 70, '78945616650', '123456'),
(359, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:22:17', 70, '78945616650', '123456'),
(360, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:22:30', 70, '78945616650', '123456'),
(361, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:22:54', 70, '78945616650', '123456'),
(362, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:23:03', 70, '78945616650', '123456'),
(363, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:23:55', 70, '78945616650', '123456'),
(364, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:26:44', 70, '78945616650', '123456'),
(365, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:26:50', 70, '78945616650', '123456'),
(366, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:26:52', 70, '78945616650', '123456'),
(367, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:27:02', 70, '78945616650', '123456'),
(368, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:27:36', 70, '78945616650', '123456'),
(369, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:27:37', 70, '78945616650', '123456'),
(370, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:30:07', 70, '78945616650', '123456'),
(371, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:30:21', 70, '78945616650', '123456'),
(372, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:31:01', 70, '78945616650', '123456'),
(373, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:31:05', 70, '78945616650', '123456'),
(374, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:31:22', 70, '78945616650', '123456'),
(375, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:31:30', 70, '78945616650', '123456'),
(376, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:31:42', 70, '78945616650', '123456'),
(377, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '15:32:06', 70, '78945616650', '123456'),
(378, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:32:24', 70, '78945616650', '123456'),
(379, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:33:17', 70, '78945616650', '123456'),
(380, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:35:10', 70, '78945616650', '123456'),
(381, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-15', '15:35:12', 70, '78945616650', '123456'),
(382, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:36:43', 70, '78945616650', '123456'),
(383, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '15:37:10', 70, '78945616650', '123456'),
(384, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-15', '15:37:21', 70, '78945616650', '123456'),
(385, '::1', 'http://localhost/bunzzapp/app/distributer-wallet-list.php', '2025-02-15', '15:37:25', 70, '78945616650', '123456'),
(386, '::1', 'http://localhost/bunzzapp/app/distributer-wallet-list.php', '2025-02-15', '16:00:37', 70, '78945616650', '123456'),
(387, '::1', 'http://localhost/bunzzapp/app/home.php', '2025-02-15', '16:02:49', 70, '78945616650', '123456'),
(388, '::1', 'http://localhost/bunzzapp/app/ledger-creation-list.php', '2025-02-15', '16:02:52', 70, '78945616650', '123456'),
(389, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:02:55', 70, '78945616650', '123456'),
(390, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:02:59', 70, '78945616650', '123456'),
(391, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:05:18', 70, '78945616650', '123456'),
(392, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '16:05:27', 70, '78945616650', '123456'),
(393, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '16:05:58', 70, '78945616650', '123456'),
(394, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:05:59', 70, '78945616650', '123456'),
(395, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '16:06:06', 70, '78945616650', '123456'),
(396, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:06:43', 70, '78945616650', '123456'),
(397, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-15', '16:06:50', 70, '78945616650', '123456'),
(398, '::1', 'http://localhost/bunzzapp/app/ledger-creation-add.php', '2025-02-15', '16:35:19', 70, '78945616650', '123456'),
(399, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-17', '10:26:23', 70, '78945616650', '123456'),
(400, '::1', 'http://localhost/bunzzapp/app/acountteam/ledger-creation-list.php', '2025-02-17', '10:34:57', 70, '78945616650', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_temp_cart`
--

CREATE TABLE `add_to_temp_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_temp_cart`
--

INSERT INTO `add_to_temp_cart` (`id`, `user_id`, `p_id`, `price`, `quantity`, `addeddate`) VALUES
(33, 1, 2, '10', '2', '2024-09-12 18:34:33'),
(108, 61, 4, '5', '4', '2024-12-27 14:40:13'),
(109, 61, 3, '10', '3', '2024-12-27 15:58:50'),
(113, 59, 3, '10', '3', '2024-12-30 18:40:46'),
(114, 68, 3, '10', '80', '2024-12-31 12:47:10'),
(115, 68, 2, '10', '100', '2024-12-31 12:47:19'),
(116, 68, 1, '15', '51', '2024-12-31 12:47:29'),
(117, 59, 2, '10', '3', '2025-01-10 18:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_temp_wishlist`
--

CREATE TABLE `add_to_temp_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `sale_price` text NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_images`
--

CREATE TABLE `all_images` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `stock` text NOT NULL,
  `mrp_price` text NOT NULL,
  `sale_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `all_images`
--

INSERT INTO `all_images` (`id`, `cat_id`, `p_id`, `size_id`, `color_id`, `image`, `stock`, `mrp_price`, `sale_price`) VALUES
(107, 1, 1, 11, 1, '1395108396014.webp', '1', '100', '90'),
(108, 1, 1, 11, 1, '852922561115.webp', '1', '100', '90'),
(109, 1, 1, 11, 1, '2098603417216.webp', '1', '100', '90'),
(110, 1, 1, 21, 1, '1395108396014.webp', '1', '599', '299'),
(111, 1, 1, 21, 1, '852922561115.webp', '1', '599', '299'),
(112, 1, 1, 21, 1, '2098603417216.webp', '1', '599', '299'),
(113, 1, 1, 11, 8, '2053588422019.jpg', '1', '200', '100'),
(114, 1, 1, 11, 8, '1415062350120.jpg', '1', '200', '100'),
(115, 1, 1, 11, 11, '14767719620ayye.jpg', '1', '999', '799'),
(116, 1, 1, 11, 11, '13814745061icon.webp', '1', '999', '799'),
(117, 1, 1, 23, 11, '14767719620ayye.jpg', '1', '100', '80'),
(118, 1, 1, 23, 11, '13814745061icon.webp', '1', '100', '80'),
(119, 1, 1, 11, 15, '980808372016.webp', '1', '100', '89'),
(120, 1, 1, 11, 15, '754005307117.webp', '1', '100', '89'),
(121, 1, 1, 11, 15, '790779204018.webp', '1', '100', '89'),
(122, 3, 2, 11, 3, '8220227950pic1.png', '5', '699', '599'),
(123, 3, 2, 11, 3, '11849082901pic2.png', '5', '699', '599'),
(124, 3, 2, 11, 3, '19185586822pic3.png', '5', '699', '599'),
(125, 3, 2, 11, 3, '15839358213pic4.png', '5', '699', '599'),
(126, 3, 2, 21, 3, '8220227950pic1.png', '6', '599', '499'),
(127, 3, 2, 21, 3, '11849082901pic2.png', '6', '599', '499'),
(128, 3, 2, 21, 3, '19185586822pic3.png', '6', '599', '499'),
(129, 3, 2, 21, 3, '15839358213pic4.png', '6', '599', '499'),
(130, 3, 2, 22, 3, '8220227950pic1.png', '7', '499', '399'),
(131, 3, 2, 22, 3, '11849082901pic2.png', '7', '499', '399'),
(132, 3, 2, 22, 3, '19185586822pic3.png', '7', '499', '399'),
(133, 3, 2, 22, 3, '15839358213pic4.png', '7', '499', '399'),
(134, 3, 2, 26, 3, '8220227950pic1.png', '8', '399', '350'),
(135, 3, 2, 26, 3, '11849082901pic2.png', '8', '399', '350'),
(136, 3, 2, 26, 3, '19185586822pic3.png', '8', '399', '350'),
(137, 3, 2, 26, 3, '15839358213pic4.png', '8', '399', '350');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1735563469.png', 'Chips', 'chips', 1, '2024-07-31 11:11:29', '2024-12-30 18:27:49'),
(2, '1735563407.png', 'Namkeen', 'namkeen', 1, '2024-07-31 11:11:46', '2024-12-30 18:26:47'),
(3, '1735563448.png', 'All Seasons', 'all-seasons', 1, '2024-08-20 12:14:52', '2024-12-30 18:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 32, 'North and Middle Andaman', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 32, 'South Andaman', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 32, 'Nicobar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Adilabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Anantapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Chittoor', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'East Godavari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Guntur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'Hyderabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Kadapa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Karimnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Khammam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Krishna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'Kurnool', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'Mahbubnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'Medak', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'Nalgonda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Nellore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'Nizamabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Prakasam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'Rangareddi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'Srikakulam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'Vishakhapatnam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 'Vizianagaram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'Warangal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 'West Godavari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 'Anjaw', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 3, 'Changlang', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 'East Kameng', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 3, 'Lohit', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 3, 'Lower Subansiri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 3, 'Papum Pare', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 3, 'Tirap', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 3, 'Dibang Valley', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 3, 'Upper Subansiri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 3, 'West Kameng', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 2, 'Barpeta', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 2, 'Bongaigaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 2, 'Cachar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 2, 'Darrang', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 2, 'Dhemaji', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 2, 'Dhubri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 2, 'Dibrugarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 2, 'Goalpara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 2, 'Golaghat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 2, 'Hailakandi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 2, 'Jorhat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 2, 'Karbi Anglong', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 2, 'Karimganj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 2, 'Kokrajhar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 2, 'Lakhimpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 2, 'Marigaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 2, 'Nagaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 2, 'Nalbari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 2, 'North Cachar Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 2, 'Sibsagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 2, 'Sonitpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 2, 'Tinsukia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 4, 'Araria', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 4, 'Aurangabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 4, 'Banka', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 4, 'Begusarai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 4, 'Bhagalpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 4, 'Bhojpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 4, 'Buxar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 4, 'Darbhanga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 4, 'Purba Champaran', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 4, 'Gaya', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 4, 'Gopalganj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 4, 'Jamui', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 4, 'Jehanabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 4, 'Khagaria', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 4, 'Kishanganj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 4, 'Kaimur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 4, 'Katihar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 4, 'Lakhisarai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 4, 'Madhubani', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 4, 'Munger', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 4, 'Madhepura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 4, 'Muzaffarpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 4, 'Nalanda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 4, 'Nawada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 4, 'Patna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 4, 'Purnia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 4, 'Rohtas', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 4, 'Saharsa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 4, 'Samastipur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 4, 'Sheohar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 4, 'Sheikhpura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 4, 'Saran', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 4, 'Sitamarhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 4, 'Supaul', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 4, 'Siwan', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 4, 'Vaishali', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 4, 'Pashchim Champaran', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 36, 'Bastar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 36, 'Bilaspur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 36, 'Dantewada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 36, 'Dhamtari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 36, 'Durg', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 36, 'Jashpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 36, 'Janjgir-Champa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 36, 'Korba', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 36, 'Koriya', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 36, 'Kanker', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 36, 'Kawardha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 36, 'Mahasamund', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 36, 'Raigarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 36, 'Rajnandgaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 36, 'Raipur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 36, 'Surguja', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 29, 'Diu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 29, 'Daman', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 25, 'Central Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 25, 'East Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 25, 'New Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 25, 'North Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 25, 'North East Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 25, 'North West Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 25, 'South Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 25, 'South West Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 25, 'West Delhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 26, 'North Goa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 26, 'South Goa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 5, 'Ahmedabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 5, 'Amreli District', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 5, 'Anand', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 5, 'Banaskantha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 5, 'Bharuch', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 5, 'Bhavnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 5, 'Dahod', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 5, 'The Dangs', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 5, 'Gandhinagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 5, 'Jamnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 5, 'Junagadh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 5, 'Kutch', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 5, 'Kheda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 5, 'Mehsana', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 5, 'Narmada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 5, 'Navsari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 5, 'Patan', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 5, 'Panchmahal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 5, 'Porbandar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 5, 'Rajkot', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 5, 'Sabarkantha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 5, 'Surendranagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 5, 'Surat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 5, 'Vadodara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 5, 'Valsad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 6, 'Ambala', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 6, 'Bhiwani', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 6, 'Faridabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 6, 'Fatehabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 6, 'Gurgaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 6, 'Hissar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 6, 'Jhajjar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 6, 'Jind', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 6, 'Karnal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 6, 'Kaithal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 6, 'Kurukshetra', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 6, 'Mahendragarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 6, 'Mewat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 6, 'Panchkula', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 6, 'Panipat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 6, 'Rewari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 6, 'Rohtak', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 6, 'Sirsa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 6, 'Sonepat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 6, 'Yamuna Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 6, 'Palwal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 7, 'Bilaspur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 7, 'Chamba', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 7, 'Hamirpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 7, 'Kangra', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 7, 'Kinnaur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 7, 'Kulu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 7, 'Lahaul and Spiti', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 7, 'Mandi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 7, 'Shimla', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 7, 'Sirmaur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 7, 'Solan', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 7, 'Una', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 8, 'Anantnag', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 8, 'Badgam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 8, 'Bandipore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 8, 'Baramula', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 8, 'Doda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 8, 'Jammu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 8, 'Kargil', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 8, 'Kathua', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 8, 'Kupwara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 8, 'Leh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 8, 'Poonch', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 8, 'Pulwama', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 8, 'Rajauri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 8, 'Srinagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 8, 'Samba', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 8, 'Udhampur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 34, 'Bokaro', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 34, 'Chatra', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 34, 'Deoghar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 34, 'Dhanbad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 34, 'Dumka', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 34, 'Purba Singhbhum', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 34, 'Garhwa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 34, 'Giridih', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 34, 'Godda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 34, 'Gumla', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 34, 'Hazaribagh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 34, 'Koderma', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 34, 'Lohardaga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 34, 'Pakur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 34, 'Palamu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 34, 'Ranchi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 34, 'Sahibganj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 34, 'Seraikela and Kharsawan', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 34, 'Pashchim Singhbhum', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 34, 'Ramgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 9, 'Bidar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 9, 'Belgaum', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 9, 'Bijapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 9, 'Bagalkot', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 9, 'Bellary', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 9, 'Bangalore Rural District', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 9, 'Bangalore Urban District', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 9, 'Chamarajnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 9, 'Chikmagalur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 9, 'Chitradurga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 9, 'Davanagere', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 9, 'Dharwad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 9, 'Dakshina Kannada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 9, 'Gadag', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 9, 'Gulbarga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 9, 'Hassan', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 9, 'Haveri District', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 9, 'Kodagu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 9, 'Kolar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 9, 'Koppal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 9, 'Mandya', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 9, 'Mysore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 9, 'Raichur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 9, 'Shimoga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 9, 'Tumkur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 9, 'Udupi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 9, 'Uttara Kannada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 9, 'Ramanagara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 9, 'Chikballapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 9, 'Yadagiri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 10, 'Alappuzha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 10, 'Ernakulam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 10, 'Idukki', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 10, 'Kollam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 10, 'Kannur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 10, 'Kasaragod', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 10, 'Kottayam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 10, 'Kozhikode', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 10, 'Malappuram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 10, 'Palakkad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 10, 'Pathanamthitta', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 10, 'Thrissur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 10, 'Thiruvananthapuram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 10, 'Wayanad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 11, 'Alirajpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 11, 'Anuppur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 11, 'Ashok Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 11, 'Balaghat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 11, 'Barwani', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 11, 'Betul', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 11, 'Bhind', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 11, 'Bhopal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 11, 'Burhanpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 11, 'Chhatarpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 11, 'Chhindwara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 11, 'Damoh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 11, 'Datia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 11, 'Dewas', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 11, 'Dhar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 11, 'Dindori', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 11, 'Guna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 11, 'Gwalior', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 11, 'Harda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 11, 'Hoshangabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 11, 'Indore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 11, 'Jabalpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 11, 'Jhabua', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 11, 'Katni', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 11, 'Khandwa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 11, 'Khargone', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 11, 'Mandla', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 11, 'Mandsaur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 11, 'Morena', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 11, 'Narsinghpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 11, 'Neemuch', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 11, 'Panna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 11, 'Rewa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 11, 'Rajgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 11, 'Ratlam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 11, 'Raisen', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 11, 'Sagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 11, 'Satna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 11, 'Sehore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 11, 'Seoni', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 11, 'Shahdol', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 11, 'Shajapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 11, 'Sheopur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 11, 'Shivpuri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 11, 'Sidhi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 11, 'Singrauli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 11, 'Tikamgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 11, 'Ujjain', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 11, 'Umaria', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 11, 'Vidisha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 12, 'Ahmednagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 12, 'Akola', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 12, 'Amrawati', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 12, 'Aurangabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 12, 'Bhandara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 12, 'Beed', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 12, 'Buldhana', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 12, 'Chandrapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 12, 'Dhule', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 12, 'Gadchiroli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 12, 'Gondiya', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 12, 'Hingoli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 12, 'Jalgaon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 12, 'Jalna', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 12, 'Kolhapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 12, 'Latur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 12, 'Mumbai City', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 12, 'Mumbai suburban', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 12, 'Nandurbar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 12, 'Nanded', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 12, 'Nagpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 12, 'Nashik', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 12, 'Osmanabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 12, 'Parbhani', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 12, 'Pune', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 12, 'Raigad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 12, 'Ratnagiri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 12, 'Sindhudurg', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 12, 'Sangli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 12, 'Solapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 12, 'Satara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 12, 'Thane', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 12, 'Wardha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 12, 'Washim', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 12, 'Yavatmal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 13, 'Bishnupur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 13, 'Churachandpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 13, 'Chandel', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 13, 'Imphal East', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 13, 'Senapati', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 13, 'Tamenglong', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 13, 'Thoubal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 13, 'Ukhrul', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 13, 'Imphal West', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 14, 'East Garo Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 14, 'East Khasi Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 14, 'Jaintia Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 14, 'Ri-Bhoi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 14, 'South Garo Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 14, 'West Garo Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 14, 'West Khasi Hills', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 15, 'Aizawl', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 15, 'Champhai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 15, 'Kolasib', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 15, 'Lawngtlai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 15, 'Lunglei', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 15, 'Mamit', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 15, 'Saiha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 15, 'Serchhip', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 16, 'Dimapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 16, 'Kohima', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 16, 'Mokokchung', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 16, 'Mon', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 16, 'Phek', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 16, 'Tuensang', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 16, 'Wokha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 16, 'Zunheboto', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 17, 'Angul', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 17, 'Boudh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 17, 'Bhadrak', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 17, 'Bolangir', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 17, 'Bargarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 17, 'Baleswar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 17, 'Cuttack', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 17, 'Debagarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 17, 'Dhenkanal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 17, 'Ganjam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 17, 'Gajapati', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 17, 'Jharsuguda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 17, 'Jajapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 17, 'Jagatsinghpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 17, 'Khordha', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 17, 'Kendujhar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 17, 'Kalahandi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 17, 'Kandhamal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 17, 'Koraput', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 17, 'Kendrapara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 17, 'Malkangiri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 17, 'Mayurbhanj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 17, 'Nabarangpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 17, 'Nuapada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 17, 'Nayagarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 17, 'Puri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 17, 'Rayagada', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 17, 'Sambalpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 17, 'Subarnapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 17, 'Sundargarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 27, 'Karaikal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 27, 'Mahe', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 27, 'Puducherry', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 27, 'Yanam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 18, 'Amritsar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 18, 'Bathinda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 18, 'Firozpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 18, 'Faridkot', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 18, 'Fatehgarh Sahib', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 18, 'Gurdaspur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 18, 'Hoshiarpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 18, 'Jalandhar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 18, 'Kapurthala', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 18, 'Ludhiana', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 18, 'Mansa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 18, 'Moga', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 18, 'Mukatsar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 18, 'Nawan Shehar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 18, 'Patiala', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 18, 'Rupnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 18, 'Sangrur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 19, 'Ajmer', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 19, 'Alwar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 19, 'Bikaner', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 19, 'Barmer', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 19, 'Banswara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 19, 'Bharatpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 19, 'Baran', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 19, 'Bundi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 19, 'Bhilwara', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 19, 'Churu', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 19, 'Chittorgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 19, 'Dausa', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 19, 'Dholpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 19, 'Dungapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 19, 'Ganganagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 19, 'Hanumangarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 19, 'Juhnjhunun', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 19, 'Jalore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 19, 'Jodhpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 19, 'Jaipur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 19, 'Jaisalmer', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 19, 'Jhalawar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 19, 'Karauli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 19, 'Kota', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 19, 'Nagaur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 19, 'Pali', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 19, 'Pratapgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 19, 'Rajsamand', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 19, 'Sikar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 19, 'Sawai Madhopur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, 19, 'Sirohi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, 19, 'Tonk', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, 19, 'Udaipur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, 20, 'East Sikkim', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, 20, 'North Sikkim', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, 20, 'South Sikkim', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, 20, 'West Sikkim', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, 21, 'Ariyalur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, 21, 'Chennai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, 21, 'Coimbatore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, 21, 'Cuddalore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, 21, 'Dharmapuri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, 21, 'Dindigul', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, 21, 'Erode', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, 21, 'Kanchipuram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, 21, 'Kanyakumari', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, 21, 'Karur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, 21, 'Madurai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, 21, 'Nagapattinam', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, 21, 'The Nilgiris', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, 21, 'Namakkal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, 21, 'Perambalur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, 21, 'Pudukkottai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, 21, 'Ramanathapuram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, 21, 'Salem', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, 21, 'Sivagangai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, 21, 'Tiruppur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, 21, 'Tiruchirappalli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, 21, 'Theni', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, 21, 'Tirunelveli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, 21, 'Thanjavur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(492, 21, 'Thoothukudi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(493, 21, 'Thiruvallur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(494, 21, 'Thiruvarur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(495, 21, 'Tiruvannamalai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(496, 21, 'Vellore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(497, 21, 'Villupuram', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(498, 22, 'Dhalai', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(499, 22, 'North Tripura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(500, 22, 'South Tripura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(501, 22, 'West Tripura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(502, 33, 'Almora', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(503, 33, 'Bageshwar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(504, 33, 'Chamoli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(505, 33, 'Champawat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(506, 33, 'Dehradun', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(507, 33, 'Haridwar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(508, 33, 'Nainital', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(509, 33, 'Pauri Garhwal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(510, 33, 'Pithoragharh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(511, 33, 'Rudraprayag', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(512, 33, 'Tehri Garhwal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(513, 33, 'Udham Singh Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(514, 33, 'Uttarkashi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(515, 23, 'Agra', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(516, 23, 'Allahabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(517, 23, 'Aligarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(518, 23, 'Ambedkar Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(519, 23, 'Auraiya', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(520, 23, 'Azamgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(521, 23, 'Barabanki', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(522, 23, 'Badaun', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(523, 23, 'Bagpat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(524, 23, 'Bahraich', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(525, 23, 'Bijnor', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(526, 23, 'Ballia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(527, 23, 'Banda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(528, 23, 'Balrampur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(529, 23, 'Bareilly', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(530, 23, 'Basti', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(531, 23, 'Bulandshahr', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(532, 23, 'Chandauli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(533, 23, 'Chitrakoot', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(534, 23, 'Deoria', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(535, 23, 'Etah', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(536, 23, 'Kanshiram Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(537, 23, 'Etawah', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(538, 23, 'Firozabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(539, 23, 'Farrukhabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(540, 23, 'Fatehpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(541, 23, 'Faizabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(542, 23, 'Gautam Buddha Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(543, 23, 'Gonda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(544, 23, 'Ghazipur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(545, 23, 'Gorkakhpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(546, 23, 'Ghaziabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(547, 23, 'Hamirpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(548, 23, 'Hardoi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(549, 23, 'Mahamaya Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(550, 23, 'Jhansi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(551, 23, 'Jalaun', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(552, 23, 'Jyotiba Phule Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(553, 23, 'Jaunpur District', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(554, 23, 'Kanpur Dehat', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(555, 23, 'Kannauj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(556, 23, 'Kanpur Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(557, 23, 'Kaushambi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(558, 23, 'Kushinagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(559, 23, 'Lalitpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(560, 23, 'Lakhimpur Kheri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(561, 23, 'Lucknow', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(562, 23, 'Mau', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(563, 23, 'Meerut', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(564, 23, 'Maharajganj', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(565, 23, 'Mahoba', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(566, 23, 'Mirzapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(567, 23, 'Moradabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(568, 23, 'Mainpuri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(569, 23, 'Mathura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(570, 23, 'Muzaffarnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(571, 23, 'Pilibhit', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(572, 23, 'Pratapgarh', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(573, 23, 'Rampur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(574, 23, 'Rae Bareli', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(575, 23, 'Saharanpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(576, 23, 'Sitapur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(577, 23, 'Shahjahanpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(578, 23, 'Sant Kabir Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(579, 23, 'Siddharthnagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(580, 23, 'Sonbhadra', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(581, 23, 'Sant Ravidas Nagar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(582, 23, 'Sultanpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(583, 23, 'Shravasti', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(584, 23, 'Unnao', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(585, 23, 'Varanasi', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(586, 24, 'Birbhum', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(587, 24, 'Bankura', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(588, 24, 'Bardhaman', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(589, 24, 'Darjeeling', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(590, 24, 'Dakshin Dinajpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(591, 24, 'Hooghly', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(592, 24, 'Howrah', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(593, 24, 'Jalpaiguri', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(594, 24, 'Cooch Behar', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(595, 24, 'Kolkata', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(596, 24, 'Malda', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(597, 24, 'Midnapore', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(598, 24, 'Murshidabad', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(599, 24, 'Nadia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(600, 24, 'North 24 Parganas', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(601, 24, 'South 24 Parganas', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(602, 24, 'Purulia', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(603, 24, 'Uttar Dinajpur', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `color_code` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `slug`, `color_code`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'Maroon', '', '#800000', 1, '2023-03-30 12:10:41', '2023-04-11 07:23:25'),
(3, 'Yellow', '', '#ffff00', 1, '2023-04-10 06:24:28', '2023-04-11 07:28:29'),
(4, 'Blue', 'blue', '#0c08fd', 1, '2023-04-10 06:24:47', '2023-11-28 12:59:54'),
(6, 'Orange', '', '#ffa500', 1, '2023-04-11 07:24:38', '0000-00-00 00:00:00'),
(7, 'Pink', '', '#ffc0cb', 1, '2023-04-11 07:25:14', '0000-00-00 00:00:00'),
(8, 'Red', '', '#ff0000', 1, '2023-04-11 07:25:45', '0000-00-00 00:00:00'),
(10, 'white', '', '#ffffff', 1, '2023-04-11 07:27:50', '0000-00-00 00:00:00'),
(11, 'Green', 'green', '#55be7a', 1, '2023-04-14 01:18:04', '2023-11-28 05:20:46'),
(12, 'Brown', 'brown', '#7a4a00', 1, '2023-12-22 01:09:10', '0000-00-00 00:00:00'),
(15, 'Black', 'black', '#000000', 1, '2023-12-22 01:11:37', '0000-00-00 00:00:00'),
(17, 'Gold', 'gold', '#fdc700', 1, '2023-12-22 01:20:56', '0000-00-00 00:00:00'),
(18, 'Yellow ', 'yellow', '#fefb41', 1, '2023-12-22 01:21:11', '2023-12-22 01:21:29'),
(20, 'hot pink', 'hot-pink', '#ff007b', 1, '2024-01-08 03:40:55', '2024-09-11 17:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `mobile`, `subject`, `message`, `addeddate`) VALUES
(31, 10, 'ASM 1', 'asm1@gmail.com', '123456789', 'asm', 'asm test', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupen_code`
--

CREATE TABLE `coupen_code` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` text NOT NULL,
  `amount` varchar(110) NOT NULL,
  `type` int(11) NOT NULL,
  `coupen_type` int(1) NOT NULL COMMENT '1=checkout, 2 =product',
  `p_id` text DEFAULT NULL,
  `expirey_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coupen_code`
--

INSERT INTO `coupen_code` (`id`, `name`, `slug`, `amount`, `type`, `coupen_type`, `p_id`, `expirey_date`, `status`, `addeddate`, `modifieddate`) VALUES
(12, 'azmal', 'azmal', '10', 2, 1, '', '2025-01-29', 1, '2024-09-11 18:25:47', '2024-09-11 18:29:47'),
(13, 'admin', 'admin', '10', 1, 2, '[{\"p_id\":\"2\",\"name\":\"admin\",\"amount\":\"10\",\"type\":\"1\",\"coupen_type\":\"2\",\"expirey_date\":\"2025-01-29\"}]', '2025-01-29', 1, '2024-09-11 18:32:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupen_product_wise`
--

CREATE TABLE `coupen_product_wise` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `amount` text NOT NULL,
  `type` int(11) NOT NULL,
  `coupen_type` int(1) NOT NULL,
  `expirey_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coupen_product_wise`
--

INSERT INTO `coupen_product_wise` (`id`, `coupon_id`, `p_id`, `name`, `amount`, `type`, `coupen_type`, `expirey_date`) VALUES
(172, 13, 2, 'admin', '10', 1, 2, '2025-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `distributer_walletrc`
--

CREATE TABLE `distributer_walletrc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `today_date` date NOT NULL,
  `imps_no` text NOT NULL,
  `amount` text NOT NULL,
  `refrenceno` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `add_by` int(11) NOT NULL,
  `employee_code` text NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `add_by`, `employee_code`, `image`, `name`, `slug`, `email`, `mobile`, `address`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 0, '20240731FE31', '1722410852.jpg', 'Amit', 'amit', 'info@compony.in', '09584712015', '1020, 10th Floor Arizona, USA', 1, '2024-07-31 12:57:32', '2024-07-31 12:58:58'),
(2, 71, '20250110746B', '1736507726.png', 'Logen', 'logen', 'logen@gmail.com', '123654789', '123 Company Address\r\ntest', 1, '2025-01-10 16:31:18', '2025-01-10 16:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `finalorder`
--

CREATE TABLE `finalorder` (
  `id` int(11) NOT NULL,
  `nsm_id` text NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `sales_office_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `order_id` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `order_note` text NOT NULL,
  `discount` text NOT NULL,
  `discount_amount` text NOT NULL,
  `shipping_charge` text NOT NULL,
  `sub_total` text NOT NULL,
  `finalprice` text NOT NULL,
  `after_discount_final_price` text NOT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1=wallet',
  `status` int(11) NOT NULL COMMENT '0=unread,1=read',
  `order_status` int(11) NOT NULL COMMENT '1=confirm,2=warehouse,3=shipped,4=deliverd,5=cancel',
  `reject_msg` text DEFAULT NULL,
  `addeddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `finalorder`
--

INSERT INTO `finalorder` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `user_id`, `order_id`, `name`, `email`, `mobile`, `address`, `state`, `city`, `country`, `order_note`, `discount`, `discount_amount`, `shipping_charge`, `sub_total`, `finalprice`, `after_discount_final_price`, `payment_type`, `status`, `order_status`, `reject_msg`, `addeddate`) VALUES
(1, '10', 33, 34, 36, '59', '20240930731A', 'Rishabh', 'rishabh@gmail.com', 'Rishabh', '', '1', '4', '', '', '0', '0', '0', '4000', '4000', '4000', 1, 0, 0, '', '2024-09-30'),
(2, '10', 33, 34, 36, '59', '20240930A2D6', 'Rishabh', 'rishabh@gmail.com', 'Rishabh', '', '1', '4', '', '', '0', '0', '0', '5250', '5250', '5250', 1, 0, 0, '', '2024-09-30'),
(3, '10', 33, 34, 36, '59', '2024093040C6', 'Rishabh', 'rishabh@gmail.com', 'Rishabh', '', '1', '4', '', '', '0', '0', '0', '14400', '14400', '14400', 1, 0, 0, '', '2024-09-30'),
(4, '10', 33, 34, 36, '55', '202409303E24', 'SHYAM KUMAR', 'shyam@gmail.com', 'SHYAM KUMAR', '', '6', '150', '', '', '0', '0', '0', '5000', '5000', '5000', 1, 0, 0, '', '2024-09-30'),
(5, '10', 33, 34, 36, '55', '20240930E84F', 'SHYAM KUMAR', 'shyam@gmail.com', 'SHYAM KUMAR', '', '6', '150', '', '', '0', '0', '0', '2500', '2500', '2500', 1, 0, 0, '', '2024-09-30'),
(6, '10', 33, 34, 36, '55', '20240930917B', 'SHYAM KUMAR', 'shyam@gmail.com', 'SHYAM KUMAR', '', '6', '150', '', '', '0', '0', '0', '12000', '12000', '12000', 1, 0, 0, '', '2024-09-30'),
(7, '10', 33, 34, 36, '55', '20240930569F', 'SHYAM KUMAR', 'shyam@gmail.com', 'SHYAM KUMAR', '', '6', '150', '', '', '0', '0', '0', '18000', '18000', '18000', 1, 0, 0, '', '2024-09-30'),
(8, '10', 33, 34, 36, '53', '202409301864', 'JAI MAA PURNAGIRI KIRANA STORE', 'jai@gmail.com', 'JAI MAA ', '', '5', '125', '', '', '0', '0', '0', '11000', '11000', '11000', 1, 0, 0, '', '2024-09-30'),
(9, '10', 33, 34, 36, '51', '20240930D048', 'PRADEEP KUMAR AGRAWAL', 'pradeep@gmail.com', 'Pradeep kumar', '', '25', '114', '', '', '0', '0', '0', '24000', '24000', '24000', 1, 0, 0, '', '2024-09-30'),
(10, '10', 33, 34, 37, '49', '202409309FEE', 'RADHA ENTERPRISES', 'radhasingh@gmail.com', 'radha singh', '', '23', '547', '', '', '0', '0', '0', '9600', '9600', '9600', 1, 0, 0, '', '2024-09-30'),
(11, '10', 33, 35, 40, '48', '20240930E635', 'KUMAR AGENCIES', 'satishkumar@gmail.com', 'satish kumar', '', '23', '535', '', '', '0', '0', '0', '6000', '6000', '6000', 1, 0, 0, '', '2024-09-30'),
(12, '10', 33, 35, 40, '48', '20240930C043', 'KUMAR AGENCIES', 'satishkumar@gmail.com', 'satish kumar', '', '23', '535', '', '', '0', '0', '0', '1000', '1000', '1000', 1, 0, 0, '', '2024-09-30'),
(13, '10', 33, 34, 41, '47', '20240930D2BE', 'VARDHMAN AGENCIES', 'VARDHMANAGENCIES@gmail.com', 'Vardha', '', '23', '570', '', '', '0', '0', '0', '3000', '3000', '3000', 1, 0, 0, '', '2024-09-30'),
(14, '10', 33, 34, 41, '47', '202409308CF6', 'VARDHMAN AGENCIES', 'VARDHMANAGENCIES@gmail.com', 'Vardha', '', '23', '570', '', '', '0', '0', '0', '4200', '4200', '4200', 1, 0, 0, '', '2024-09-30'),
(15, '10', 33, 35, 39, '46', '202409306792', 'CHETAN KUMAR KULDEEP KUMAR', 'chetankumar@gmail.com', 'CHETAN KUMAR KU', '', '23', '517', '', '', '0', '0', '0', '1200', '1200', '1200', 1, 0, 0, '', '2024-09-30'),
(16, '10', 33, 35, 39, '46', '20240930081D', 'CHETAN KUMAR KULDEEP KUMAR', 'chetankumar@gmail.com', 'CHETAN KUMAR KU', '', '23', '517', '', '', '0', '0', '0', '7200', '7200', '7200', 1, 0, 0, '', '2024-09-30'),
(17, '10', 33, 35, 38, '45', '20240930D855', 'SHREE BALAJI TRADERS', 'krishna@gmail.com', 'Krishna ', '', '23', '515', '', '', '0', '0', '0', '3400', '3400', '3400', 1, 0, 0, '', '2024-09-30'),
(18, '10', 33, 34, 36, '44', '20240930EB9C', 'SANJAY ENTERPRISES', 'sanjay1@gmail.com', 'SANJAY ', '', '23', '515', '', '', '0', '0', '0', '7600', '7600', '7600', 1, 0, 0, '', '2024-09-30'),
(19, '10', 33, 34, 36, '44', '2024093079DE', 'SANJAY ENTERPRISES', 'sanjay1@gmail.com', 'SANJAY ', '', '23', '515', '', '', '0', '0', '0', '2400', '2400', '2400', 1, 0, 0, '', '2024-09-30'),
(20, '10', 33, 34, 36, '44', '202409305423', 'SANJAY ENTERPRISES', 'sanjay1@gmail.com', 'SANJAY ', '', '23', '515', '', '', '0', '0', '0', '2000', '2000', '2000', 1, 0, 0, '', '2024-09-30'),
(21, '10', 33, 34, 36, '43', '20240930088B', 'RAJESH KUMAR AGARWAL', 'rajeshkumaragarwal@gmail.com', 'RAJESH KUMAR AG', 'hathras', '23', '515', '', '', '0', '0', '0', '3000', '3000', '3000', 1, 0, 0, '', '2024-09-30'),
(22, '10', 33, 34, 36, '43', '202409304763', 'RAJESH KUMAR AGARWAL', 'rajeshkumaragarwal@gmail.com', 'RAJESH KUMAR AG', 'hathras', '23', '515', '', '', '0', '0', '0', '600', '600', '600', 1, 0, 0, '', '2024-09-30'),
(23, '10', 33, 34, 36, '43', '20240930B295', 'RAJESH KUMAR AGARWAL', 'rajeshkumaragarwal@gmail.com', 'RAJESH KUMAR AG', 'hathras', '23', '515', '', '', '0', '0', '0', '6000', '6000', '6000', 1, 0, 0, '', '2024-09-30'),
(24, '10', 33, 34, 60, '61', '202409302E12', 'Prateek ', 'Prateek@gmail.com', 'Prateek ', '', '25', '114', '', '', '0', '0', '0', '2400', '2400', '2400', 1, 0, 5, 'test etes', '2024-09-30'),
(25, '10', 33, 34, 60, '61', '202409303A3E', 'Prateek ', 'Prateek@gmail.com', 'Prateek ', '', '25', '114', '', '', '0', '0', '0', '9600', '9600', '9600', 1, 0, 5, '', '2024-09-30'),
(26, '10', 33, 34, 60, '61', '20241014F66B', 'Prateek ', 'Prateek@gmail.com', 'Prateek ', '', '25', '114', '', '', '0', '0', '0', '1200', '1200', '1200', 1, 0, 1, '', '2024-10-14'),
(27, '10', 33, 34, 36, '43', '202411279477', 'RAJESH KUMAR AGARWAL', 'rajeshkumaragarwal@gmail.com', '78945612300', 'hathras', '23', '515', '', 'Tesy', '0', '0', '0', '120', '120', '120', 1, 0, 5, NULL, '2024-11-27'),
(28, '10', 33, 34, 60, '61', '20241203155D', 'Prateek ', 'Prateek@gmail.com', '1656565', '123 Company Address\r\ntest', '25', '1', '', 'dd', '0', '0', '0', '20', '20', '20', 1, 0, 1, NULL, '2024-12-03'),
(29, '10', 33, 34, 60, '61', '20241203A077', 'Prateek ', 'Prateek@gmail.com', '1656565', 'test', '25', '1', '', 'tewst', '0', '0', '0', '30', '30', '30', 1, 0, 5, NULL, '2024-12-03'),
(30, '10', 33, 34, 60, '61', '202412037DE6', 'Prateek ', 'Prateek@gmail.com', '1656565', 'trear', '25', '1', '', 'wqer', '10', '10', '0', '480', '480', '470', 1, 0, 5, NULL, '2024-12-03'),
(31, '10', 33, 34, 60, '61', '20241205D27C', 'Prateek ', 'Prateek@gmail.com', '1656565', '123 Company Address\r\ntest', '25', '1', '', 'test', '0', '0', '0', '240', '240', '240', 1, 0, 1, NULL, '2024-12-05'),
(32, '10', 33, 34, 36, '59', '202412279999', 'Rishabh', 'rishabh@gmail.com', 'Rishabh', '', '1', '4', '', '', '0', '0', '0', '15', '15', '15', 1, 0, 1, NULL, '2024-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1735563136.jpg', 1, '2024-12-30 15:02:43', '2024-12-30 18:22:16'),
(2, '1735563116.jpg', 1, '2024-12-30 15:02:50', '2024-12-30 18:21:56'),
(3, '1735563088.jpg', 1, '2024-12-30 15:02:56', '2024-12-30 18:21:28'),
(4, '1735563066.jpg', 1, '2024-12-30 15:03:04', '2024-12-30 18:21:06'),
(5, '1735563028.jpg', 1, '2024-12-30 15:06:15', '2024-12-30 18:20:28'),
(6, '1735563591.jpg', 1, '2024-12-30 18:29:51', '0000-00-00 00:00:00'),
(7, '1735563610.jpg', 1, '2024-12-30 18:30:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_records`
--

CREATE TABLE `kyc_records` (
  `id` int(11) NOT NULL,
  `nsm_id` varchar(20) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `sales_office_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firm_name` text NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `pincode` text NOT NULL,
  `gst_no` text NOT NULL,
  `gst_certificate` text NOT NULL,
  `pan_card` text NOT NULL,
  `adharcard` text NOT NULL,
  `electric_bill` text NOT NULL,
  `udhyam_certificate` text NOT NULL,
  `fssai_licence_cert` text NOT NULL,
  `godown_image1` text NOT NULL,
  `godown_image2` text NOT NULL,
  `vechicle_image` text NOT NULL,
  `team_image` text NOT NULL,
  `self_image` text NOT NULL,
  `gps_location_link` text NOT NULL,
  `bank_ac_no` text NOT NULL,
  `bank_name` text NOT NULL,
  `bank_branch` text NOT NULL,
  `bank_ifcscode` text NOT NULL,
  `cancel_chequed` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=new,1=approve,2=under review,3=reject',
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_records`
--

INSERT INTO `kyc_records` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `user_id`, `firm_name`, `name`, `mobile`, `address`, `state`, `city`, `pincode`, `gst_no`, `gst_certificate`, `pan_card`, `adharcard`, `electric_bill`, `udhyam_certificate`, `fssai_licence_cert`, `godown_image1`, `godown_image2`, `vechicle_image`, `team_image`, `self_image`, `gps_location_link`, `bank_ac_no`, `bank_name`, `bank_branch`, `bank_ifcscode`, `cancel_chequed`, `email`, `status`, `addeddate`) VALUES
(15, '10', 33, 34, 36, 44, 'SANJAY ENTERPRISES', 'SANJAY ENTERPRISES', '7845235689', 'Agra', '23', '515', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sanjay1@gmail.com', 1, '2024-09-25 12:45:53'),
(16, '10', 33, 34, 36, 43, 'RAJESH KUMAR AGARWAL', 'RAJESH KUMAR AGARWAL', '9463257896', 'hathras', '23', '515', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'rajeshkumaragarwal@gmail.com', 1, '2024-09-25 13:24:31'),
(17, '10', 33, 35, 38, 45, 'SHREE BALAJI TRADERS', 'SHREE BALAJI TRADERS', '8536497685', '', '23', '515', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'krishna@gmail.com', 1, '2024-09-25 13:26:20'),
(18, '10', 33, 35, 39, 46, 'CHETAN KUMAR KULDEEP KUMAR', 'CHETAN KUMAR KULDEEP KUMAR', '8754683295', 'Up', '23', '517', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'chetankumar@gmail.com', 1, '2024-09-25 13:28:18'),
(19, '10', 33, 34, 41, 47, 'VARDHMAN AGENCIES', 'VARDHMAN AGENCIES', '8563258963', 'Na', '23', '570', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VARDHMANAGENCIES@gmail.com', 1, '2024-09-25 15:02:32'),
(20, '10', 33, 34, 37, 49, 'RADHA ENTERPRISES', 'RADHA ENTERPRISES', '8495623695', '', '23', '547', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'radhasingh@gmail.com', 1, '2024-09-25 15:13:55'),
(21, '10', 33, 35, 40, 48, 'KUMAR AGENCIES', 'KUMAR AGENCIES', '9568326598', 'Na', '23', '535', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'satishkumar@gmail.com', 1, '2024-09-25 15:15:05'),
(22, '10', 33, 34, 36, 55, 'SHYAM KUMAR & SONS', 'SHYAM KUMAR', '8532696853', '', '6', '150', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'shyam@gmail.com', 1, '2024-09-26 16:45:20'),
(23, '10', 33, 34, 36, 54, 'MOHD. FARUQ & SONS', 'MOHD. FARUQ & SONS', '5896325639', '', '2', '37', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mohd@gmail.com', 1, '2024-09-26 16:47:30'),
(24, '10', 33, 34, 36, 53, 'JAI MAA PURNAGIRI KIRANA STORE', 'JAI MAA PURNAGIRI KIRANA STORE', '8569235689', '', '5', '125', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jai@gmail.com', 1, '2024-09-26 16:49:42'),
(25, '10', 33, 34, 36, 52, 'SURAJ FERTILIZOR', 'SURAJ FERTILIZOR', '6598653298', '', '1', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'suraj1@gmail.com', 1, '2024-09-26 16:51:44'),
(26, '10', 33, 34, 36, 59, 'KYC Firms', 'Rishabh', '9865328523', '', '1', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'rishabh@gmail.com', 1, '2024-09-26 18:14:44'),
(27, '10', 33, 10, 60, 61, 'Prateek industries', 'Prateek ', '9865326495', '', '25', '114', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Prateek@gmail.com', 1, '2024-09-30 12:22:25'),
(28, '10', 33, 34, 36, 51, 'PRADEEP KUMAR AGRAWAL', 'PRADEEP KUMAR AGRAWAL', '1234567890', 'addresss', '25', '114', '110058', '06ABCFB2051M2ZM', '', '', '', '', '', '', '', '', '', '', '', 'GIS', '1236547890', 'State Bank Of India', 'Dwarka', 'SBI546564', '', 'pradeep@gmail.com', 1, '2024-09-30 17:03:20'),
(29, '', 33, 34, 58, 67, 'Abc', 'Rakesh', '8524369874', 'Delhi', '25', '114', '', '23gdhbcbtu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'rakesh@gmail.com', 1, '2024-12-31 11:38:50'),
(30, '', 33, 34, 36, 68, 'Mark', 'Beta', '9999821846', '', '23', '515', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kumartushki123456@gmail.com', 1, '2024-12-31 12:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_creation`
--

CREATE TABLE `ledger_creation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `distric_id` text NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `select_date` date DEFAULT NULL,
  `document_type` text DEFAULT NULL,
  `document_no` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `imp_no` text DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_creation`
--

INSERT INTO `ledger_creation` (`id`, `user_id`, `state_id`, `city_id`, `distric_id`, `distributer_id`, `status`, `addeddate`, `select_date`, `document_type`, `document_no`, `quantity`, `amount`, `imp_no`, `message`) VALUES
(1, 70, 2, 38, 'trst', 63, 1, '2025-02-15 15:31:20', NULL, 'Credit Note', '45645', '546', '456456', '', '565'),
(2, 70, 2, 41, '0esr', 59, 1, '2025-02-15 15:32:22', '2025-02-19', 'Invoice', '234213', '22', '2222', '', '22'),
(3, 70, 1, 4, 'tetastr', 61, 1, '2025-02-15 16:06:48', '2025-02-15', NULL, '123456564', '10', '5000', '798', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `device_id` text NOT NULL,
  `ip_address` text NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `logout_date` date DEFAULT NULL,
  `logout_time` time DEFAULT NULL,
  `login_status` int(11) NOT NULL COMMENT '0=login,1=logout,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `device_id`, `ip_address`, `login_date`, `login_time`, `username`, `password`, `logout_date`, `logout_time`, `login_status`) VALUES
(1, '2', '674ef018c5c4b::1', '::1', '2024-12-03', '17:18:40', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(2, '2', '67600922b520d::1', '::1', '2024-12-16', '16:34:02', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(3, '2', '67601006bd3fb::1', '::1', '2024-12-16', '17:03:26', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(4, '2', '676d45f4abf69::1', '::1', '2024-12-26', '17:33:00', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(5, '3', '676e53d71e2562401:4900:1c5b:3fbc:64d4:c1bf:6b40:6aff', '2401:4900:1c5b:3fbc:64d4:c1bf:6b40:6aff', '2024-12-27', '12:44:31', 'azmal', 'azmal', NULL, NULL, 0),
(6, '2', '676e8c999cbe52401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:46:41', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(7, '2', '6772410399abc2401:4900:1c5a:c908:f9f9:6656:2a9d:e2ee', '2401:4900:1c5a:c908:f9f9:6656:2a9d:e2ee', '2024-12-30', '12:13:15', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(8, '2', '67724156776402401:4900:1c5a:c908:8cd7:fe5d:ced1:f0aa', '2401:4900:1c5a:c908:8cd7:fe5d:ced1:f0aa', '2024-12-30', '12:14:38', 'admin', 'admin', '2024-12-30', '12:57:04', 1),
(9, '3', '67724744829462401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2024-12-30', '12:39:56', 'azmal', 'azmal', NULL, NULL, 0),
(10, '3', '677251b6976d52401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2024-12-30', '13:24:30', 'azmal', 'azmal', NULL, NULL, 0),
(11, '3', '677251ff3065442.105.213.168', '42.105.213.168', '2024-12-30', '13:25:43', 'azmal', 'azmal', NULL, NULL, 0),
(12, '3', '677253efee6bf2401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2024-12-30', '13:33:59', 'azmal', 'azmal', NULL, NULL, 0),
(13, '2', '6772615c50cb92401:4900:1c5a:c908:f9f9:6656:2a9d:e2ee', '2401:4900:1c5a:c908:f9f9:6656:2a9d:e2ee', '2024-12-30', '14:31:16', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(14, '2', '67726690ed994::1', '::1', '2024-12-30', '14:53:28', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(15, '3', '6772909b405992401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2401:4900:1c5a:c908:8c7d:19b6:2a08:7976', '2024-12-30', '17:52:51', 'azmal', 'azmal', NULL, NULL, 0),
(16, '2', '67729500841242401:4900:1c5a:c908:8cd7:fe5d:ced1:f0aa', '2401:4900:1c5a:c908:8cd7:fe5d:ced1:f0aa', '2024-12-30', '18:11:36', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(17, '2', '677385815e71f2401:4900:1c5a:c908:c00:a4f5:c730:69e8', '2401:4900:1c5a:c908:c00:a4f5:c730:69e8', '2024-12-31', '11:17:45', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(18, '3', '6773859111c112401:4900:1c5a:c908:853c:8d8a:bd:aa5e', '2401:4900:1c5a:c908:853c:8d8a:bd:aa5e', '2024-12-31', '11:18:01', 'azmal', 'azmal', NULL, NULL, 0),
(19, '2', '6773a000a07272401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:10:48', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(20, '2', '677b895a8f97b::1', '::1', '2025-01-06', '13:12:18', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(21, '2', '677cde58c1d98::1', '::1', '2025-01-07', '13:27:12', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(22, '2', '677f61fbd4fe9::1', '::1', '2025-01-09', '11:13:23', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(23, '2', '6780f20def892::1', '::1', '2025-01-10', '15:40:21', 'admin', 'admin', '2025-01-10', '16:08:12', 1),
(24, '7', '6780f89ae5377::1', '::1', '2025-01-10', '16:08:18', 'hr@gmail.com', '123456', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `role` int(1) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `device_id` text DEFAULT NULL,
  `firebase_token` text DEFAULT NULL,
  `access_token` text NOT NULL,
  `device` text NOT NULL,
  `status` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `testkey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `role`, `ip_address`, `date`, `time`, `device_id`, `firebase_token`, `access_token`, `device`, `status`, `password`, `testkey`) VALUES
(1, '33', 2, '::1', '2024-12-03', '10:30:32', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUVVJ2ZWsxRWIzcE5hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(2, '10', 1, '::1', '2024-12-03', '12:49:56', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUV3B2TUU5VWJ6Rk9hVWx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(3, '60', 4, '::1', '2024-12-03', '17:43:15', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUbnB2TUUxNmIzaE9VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(4, '34', 3, '::1', '2024-12-03', '17:47:39', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUbnB2TUU1NmIzcFBVMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(5, '33', 2, '::1', '2024-12-03', '17:48:48', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUbnB2TUU5RWJ6QlBRMGx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(6, '61', 5, '::1', '2024-12-03', '17:52:17', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkTmVVRjRUbnB2TVUxcWIzaE9lVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(7, '10', 1, '::1', '2024-12-06', '12:00:24', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUV3B2ZDAxRWIzbE9RMGx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(8, '36', 4, '::1', '2024-12-06', '15:46:48', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUbFJ2TUU1cWJ6QlBRMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(9, '33', 2, '::1', '2024-12-06', '15:47:17', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUbFJ2TUU1NmIzaE9lVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(10, '36', 4, '::1', '2024-12-06', '15:55:32', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUbFJ2TVU1VWIzcE5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(11, '33', 2, '::1', '2024-12-06', '17:09:40', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUbnB2ZDA5VWJ6Qk5RMGx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(12, '10', 1, '::1', '2024-12-06', '17:38:38', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhkT2FVRjRUbnB2ZWs5RWIzcFBRMGx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(13, '33', 2, '::1', '2024-12-12', '12:18:32', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoTmFVRjRUV3B2ZUU5RWIzcE5hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(14, '10', 1, '::1', '2024-12-16', '12:10:22', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoT2FVRjRUV3B2ZUUxRWIzbE5hVWx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(15, '33', 2, '::1', '2024-12-16', '16:44:56', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoT2FVRjRUbXB2TUU1RWJ6Rk9hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(16, '35', 3, '::1', '2024-12-16', '17:03:36', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoT2FVRjRUbnB2ZDAxNmIzcE9hVWx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(17, '38', 4, '::1', '2024-12-16', '17:47:22', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2WjJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoT2FVRjRUbnB2TUU1NmIzbE5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(18, '10', 1, '::1', '2024-12-18', '14:54:11', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoUFEwRjRUa1J2TVU1RWIzaE5VMGx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(19, '33', 2, '::1', '2024-12-18', '15:03:12', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoUFEwRjRUbFJ2ZDAxNmIzaE5hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(20, '10', 1, '::1', '2024-12-19', '11:41:27', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoUFUwRjRUVlJ2TUUxVWIzbE9lVWx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(21, '10', 1, '::1', '2024-12-19', '18:20:29', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhoUFUwRjRUMFJ2ZVUxRWIzbFBVMGx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(22, '36', 4, '::1', '2024-12-21', '11:50:51', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsTlUwRjRUVlJ2TVUxRWJ6Rk5VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(23, '33', 2, '::1', '2024-12-26', '14:45:10', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2FVRjRUa1J2TUU1VWIzaE5RMGx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(24, '61', 5, '::1', '2024-12-26', '17:33:25', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2FVRjRUbnB2ZWsxNmIzbE9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(25, '60', 4, '::1', '2024-12-26', '18:06:13', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2FVRjRUMFJ2ZDA1cWIzaE5lVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(26, '34', 3, '::1', '2024-12-27', '10:52:39', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUVVJ2TVUxcWIzcFBVMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(27, '33', 2, '::1', '2024-12-27', '11:05:02', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUVlJ2ZDA1VWIzZE5hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(28, '33', 2, '2401:4900:1c5b:3fbc:5cc2:6fc:7445:fbac', '2024-12-27', '11:29:13', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUVlJ2ZVU5VWIzaE5lVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(29, '61', 5, '2401:4900:1c5b:3fbc:5cc2:6fc:7445:fbac', '2024-12-27', '11:47:59', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUVlJ2TUU1NmJ6RlBVMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(30, '61', 5, '2401:4900:1c5b:3fbc:8ce:d3d6:d636:dde4', '2024-12-27', '12:33:01', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUV3B2ZWsxNmIzZE5VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(31, '61', 5, '2401:4900:1c5b:3fbc:5904:2371:9bd8:2842', '2024-12-27', '13:02:54', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUWHB2ZDAxcWJ6Rk9RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(32, '59', 5, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:17:45', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZUU1NmJ6Qk9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(33, '36', 4, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:19:10', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZUU5VWIzaE5RMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(34, '59', 5, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:21:29', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZVUxVWIzbFBVMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(35, '34', 3, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:22:56', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZVUxcWJ6Rk9hVWx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(36, '59', 5, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:25:50', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZVU1VWJ6Rk5RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(37, '36', 4, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:26:56', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZVU1cWJ6Rk9hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(38, '34', 3, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:29:13', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZVU5VWIzaE5lVWx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(39, '61', 5, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:39:39', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZWs5VWIzcFBVMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(40, '59', 5, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '16:39:55', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2ZWs5VWJ6Rk9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(41, '60', 4, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:47:20', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2TUU1NmIzbE5RMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(42, '61', 5, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:47:58', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2TUU1NmJ6RlBRMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(43, '60', 4, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:50:46', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2TVUxRWJ6Qk9hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(44, '60', 4, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:54:21', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2TVU1RWIzbE5VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(45, '34', 3, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '16:59:00', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbXB2TVU5VWIzZE5RMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(46, '33', 2, '2401:4900:1c5b:3fbc:85da:f2d:4e21:e378', '2024-12-27', '17:05:12', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbnB2ZDA1VWIzaE5hVWx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(47, '36', 4, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '17:27:57', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbnB2ZVU1NmJ6Rk9lVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(48, '59', 5, '2401:4900:1c5b:3fbc:f015:4880:572e:ad7e', '2024-12-27', '17:28:39', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhsT2VVRjRUbnB2ZVU5RWIzcFBVMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(49, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:07:27', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZDA1NmIzbE9lVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(50, '34', 3, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:08:19', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZDA5RWIzaFBVMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(51, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:09:11', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZDA5VWIzaE5VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(52, '60', 4, '122.161.52.54', '2024-12-30', '12:13:38', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZUUxNmIzcFBRMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(53, '60', 4, '2401:4900:1c5a:c908:8cd7:fe5d:ced1:f0aa', '2024-12-30', '12:15:45', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZUU1VWJ6Qk9VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(54, '61', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:16:44', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZUU1cWJ6Qk9RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(55, '61', 5, '122.161.52.54', '2024-12-30', '12:22:35', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZVUxcWIzcE9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(56, '61', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:29:55', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZVU5VWJ6Rk9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(57, '61', 5, '122.161.52.54', '2024-12-30', '12:32:14', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZWsxcWIzaE9RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(58, '61', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:35:54', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZWs1VWJ6Rk9RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(59, '61', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:38:05', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZWs5RWIzZE9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(60, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:39:02', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2ZWs5VWIzZE5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(61, '59', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:41:23', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2TUUxVWIzbE5lVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(62, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:44:05', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2TUU1RWIzZE9VMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(63, '34', 3, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:44:55', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2TUU1RWJ6Rk9VMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(64, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:46:19', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2TUU1cWIzaFBVMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(65, '59', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-30', '12:47:09', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUV3B2TUU1NmIzZFBVMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(66, '59', 5, '42.105.213.168', '2024-12-30', '13:22:40', 'c92dee4d1784547c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUWHB2ZVUxcWJ6Qk5RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybFplbXQ1V2tkV2JFNUhVWGhPZW1jd1RsUlJNMWw1U2prPQ==', '', 0, '123456', ''),
(67, '61', 5, '122.161.52.54', '2024-12-30', '14:31:35', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlEwRjRUa1J2ZWsxVWIzcE9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(68, '10', 1, '2401:4900:5b97:edd5:863d:1ec:5bef:8690', '2024-12-31', '10:15:27', '1492a16c00f79403', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVVJ2ZUU1VWIzbE9lVWx6U1c1S2RtSkhWV2xQYVVsNFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRkUxVFcxRmVFNXRUWGROUjFrelQxUlJkMDE1U2prPQ==', '', 0, '123456', ''),
(69, '36', 4, '2401:4900:4583:64b9:1e1b:18ae:de2d:f57a', '2024-12-31', '10:20:43', '4b2b81a381e51368', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVVJ2ZVUxRWJ6Qk5lVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMGw1V1dwbmVGbFVUVFJOVjFVeFRWUk5NazlEU2prPQ==', '', 0, '123456', ''),
(70, '33', 2, '2401:4900:4583:64b9:61fb:3361:876d:c76a', '2024-12-31', '10:21:40', '38a83a1fb1c4c3d6', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVVJ2ZVUxVWJ6Qk5RMGx6U1c1S2RtSkhWV2xQYVVsNVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5lbWhvVDBST2FFMVhXbWxOVjAwd1dYcE9hMDVwU2prPQ==', '', 1, '123456', ''),
(71, '34', 3, '2402:8100:2045:cc33:cc60:b1f5:fc60:fee9', '2024-12-31', '10:22:49', 'c9b1d13f2f7560c1', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2VVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVVJ2ZVUxcWJ6QlBVMGx6U1c1S2RtSkhWV2xQYVVsNlNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybFplbXhwVFZkUmVFMHlXWGxhYW1NeFRtcENhazFUU2prPQ==', '', 1, '123456', ''),
(72, '61', 5, '2402:3a80:922:2cad:0:68:c89b:e601', '2024-12-31', '10:39:42', 'b7361f231dd8eb0b', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVVJ2ZWs5VWJ6Qk5hVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybFphbU42VG1wR2JVMXFUWGhhUjFFMFdsZEpkMWxwU2prPQ==', '', 0, '123456', ''),
(73, '58', 4, '122.161.52.54', '2024-12-31', '11:20:04', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVWjJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVlJ2ZVUxRWIzZE9RMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(74, '58', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-31', '11:24:32', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVWjJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVlJ2ZVU1RWIzcE5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(75, '67', 5, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-31', '11:36:48', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxWTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRk0wMTZWVEpOYWxGNVQwUlphVXhEU205aU0xWjVZM2xKTms1RVozTkpiVkpvWkVkV1ptUkhiSFJhVTBrMlNXcEpkMDFxVVhSTlZFbDBUWHBGWjAxVVJUWk5lbGsyVGtSbmFVeERTbmxpTW5oc1NXcHZhVTVUU1hOSmJWSnNaRzFzYWxwV09YQmFRMGsyU1cxUmVrMUVXVEJOTWtVeldXcFdhMDVFWkcxTk1rVnBabEU5UFE9PQ==', '', 0, '1735624286', ''),
(76, '58', 4, '122.161.52.54', '2024-12-31', '11:47:26', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVWjJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUVlJ2TUU1NmIzbE9hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(77, '68', 5, '2402:3a80:922:2cad:0:68:c89b:e601', '2024-12-31', '12:39:32', 'b7361f231dd8eb0b', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxWjJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRk0wMTZWVEpOYW1jMFQwUkJhVXhEU205aU0xWjVZM2xKTms1RVozTkpiVkpvWkVkV1ptUkhiSFJhVTBrMlNXcEpkMDFxVVhSTlZFbDBUWHBGWjAxVVNUWk5lbXMyVFhwSmFVeERTbmxpTW5oc1NXcHZhVTVUU1hOSmJWSnNaRzFzYWxwV09YQmFRMGsyU1cxSk0wMTZXWGhhYWtsNlRWZFNhMDlIVm1sTlIwbHBabEU5UFE9PQ==', '', 1, '1735628880', ''),
(78, '36', 4, '122.161.52.54', '2024-12-31', '13:00:57', '4e3bbb4f9d221239', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZDAxRWJ6Rk9lVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMVY2V1cxS2FVNUhXVFZhUkVsNVRWUkplazlUU2prPQ==', '', 0, '123456', ''),
(79, '61', 5, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:09:46', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZDA5VWJ6Qk9hVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(80, '60', 4, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:11:42', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZUUxVWJ6Qk5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(81, '60', 4, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:11:42', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZUUxVWJ6Qk5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(82, '60', 4, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:11:42', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZUUxVWJ6Qk5hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(83, '61', 5, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:13:53', '123456', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZUUxNmJ6Rk5lVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRWw2VGtSVk1rbHVNRDA9', '', 0, '123456', ''),
(84, '60', 4, '2401:4900:1c5a:c908:68a9:895e:b773:e0ee', '2024-12-31', '13:15:46', '5646', '6554', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2ZUU1VWJ6Qk9hVWx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9WRmt3VG1sS09RPT0=', '', 1, '123456', ''),
(85, '36', 4, '2401:4900:1c5a:c908:7111:1611:1230:9c09', '2024-12-31', '13:48:00', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRrTXdlRTFwTUhwTlUwRjRUWHB2TUU5RWIzZE5RMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 0, '123456', ''),
(86, '69', 6, '::1', '2025-01-06', '11:42:36', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkT2FVRjRUVlJ2TUUxcWIzcE9hVWx6U1c1S2RtSkhWV2xQYVVreVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(87, '59', 5, '::1', '2025-01-06', '12:50:13', '654746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkT2FVRjRUV3B2TVUxRWIzaE5lVWx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbFV3VG5wUk1sbHFRVEpOYWtVd1dsUm9iRWx1TUQwPQ==', '', 1, '123456', ''),
(88, '69', 6, '::1', '2025-01-06', '12:54:05', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkT2FVRjRUV3B2TVU1RWIzZE9VMGx6U1c1S2RtSkhWV2xQYVVreVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(89, '69', 6, '::1', '2025-01-07', '13:24:23', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkT2VVRjRUWHB2ZVU1RWIzbE5lVWx6U1c1S2RtSkhWV2xQYVVreVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(90, '69', 6, '::1', '2025-01-08', '11:11:06', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkUFEwRjRUVlJ2ZUUxVWIzZE9hVWx6U1c1S2RtSkhWV2xQYVVreVNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 0, '123456', ''),
(91, '59', 5, '::1', '2025-01-09', '11:15:11', '671146b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkUFUwRjRUVlJ2ZUU1VWIzaE5VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU40VFZSUk1sbHFRVEpOYWtVd1dsUm9iRWx1TUQwPQ==', '', 1, '123456', ''),
(92, '70', 7, '::1', '2025-01-09', '12:26:35', '6746b06214e8e', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTU2UVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhkUFUwRjRUV3B2ZVU1cWIzcE9VMGx6U1c1S2RtSkhWV2xQYVVrelNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU13VG0xSmQwNXFTWGhPUjFVMFdsTktPUT09', '', 1, '123456', ''),
(93, '71', 8, '::1', '2025-01-10', '16:10:40', '6780f926644c6', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTU2UldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhoTlEwRjRUbXB2ZUUxRWJ6Qk5RMGx6U1c1S2RtSkhWV2xQYVVrMFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU0wVFVkWk5VMXFXVEpPUkZKcVRtbEtPUT09', '', 1, '123456', ''),
(94, '71', 8, '2401:4900:1f39:15d:5cc2:6fc:7445:fbac', '2025-01-10', '18:22:50', '678118131226c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTU2UldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhoTlEwRjRUMFJ2ZVUxcWJ6Rk5RMGx6U1c1S2RtSkhWV2xQYVVrMFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9hbU0wVFZSRk5FMVVUWGhOYWtreVdYbEtPUT09', '', 1, '123456', ''),
(95, '59', 5, '42.105.157.55', '2025-01-10', '18:35:45', 'c92dee4d1784547c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVVYTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhoTlEwRjRUMFJ2ZWs1VWJ6Qk9VMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybFplbXQ1V2tkV2JFNUhVWGhPZW1jd1RsUlJNMWw1U2prPQ==', '', 1, '123456', ''),
(96, '70', 7, '106.219.163.50', '2025-01-11', '08:59:21', '1492a16c00f79403', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTU2UVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhoTlUwRjNUMFJ2TVU5VWIzbE5VMGx6U1c1S2RtSkhWV2xQYVVrelNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE5WRkUxVFcxRmVFNXRUWGROUjFrelQxUlJkMDE1U2prPQ==', '', 1, '123456', ''),
(97, '61', 5, '2401:4900:1f38:7326:2410:f538:e56e:3456', '2025-01-15', '11:19:20', 'd30643a7b5d47f3a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTVxUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhoT1UwRjRUVlJ2ZUU5VWIzbE5RMGx6U1c1S2RtSkhWV2xQYVVreFNXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybGFSRTEzVG1wUmVsbFVaR2xPVjFFd1RqSlplbGxUU2prPQ==', '', 1, '123456', ''),
(98, '36', 4, '117.205.90.144', '2025-01-21', '15:08:54', '4b2b81a381e51368', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTE2V1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOHdUME4zYVZwSFJqQmFWamt3WVZjeGJFbHFiMmxOYWtGNVRsTXdkMDFUTUhsTlUwRjRUbFJ2ZDA5RWJ6Rk9RMGx6U1c1S2RtSkhWV2xQYVVrd1NXbDNhVnBIVmpKaFYwNXNXREpzYTBscWIybE9SMGw1V1dwbmVGbFVUVFJOVjFVeFRWUk5NazlEU2prPQ==', '', 1, '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(150) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_auther` varchar(150) DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `is_delete` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_auther`, `meta_keyword`, `meta_description`, `slug`, `add_date_time`, `update_date_time`, `update_history`, `is_delete`, `status`, `type`) VALUES
(9, NULL, NULL, NULL, NULL, NULL, 'category-1', NULL, NULL, NULL, NULL, NULL, 0),
(10, NULL, NULL, NULL, NULL, NULL, 'category-2', NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, NULL, NULL, NULL, NULL, 'product-name', NULL, NULL, NULL, NULL, NULL, 0),
(13, NULL, NULL, NULL, NULL, NULL, 'category-name-2', NULL, NULL, NULL, NULL, NULL, 0),
(14, NULL, NULL, NULL, NULL, NULL, 'category-name-1', NULL, NULL, NULL, NULL, NULL, 0),
(18, NULL, NULL, NULL, NULL, NULL, 'amit', NULL, NULL, NULL, NULL, NULL, 0),
(23, NULL, NULL, NULL, NULL, NULL, 'cold-drinks', NULL, NULL, NULL, NULL, NULL, 0),
(32, NULL, NULL, NULL, NULL, NULL, 'lays-salt-with-pepper-wafer-style-52g', NULL, NULL, NULL, NULL, NULL, 0),
(33, NULL, NULL, NULL, NULL, NULL, 'pringles-desi-masala-tadka-potato-crisps-102-gm-crunchy-and-crispy', NULL, NULL, NULL, NULL, NULL, 0),
(58, NULL, NULL, NULL, NULL, NULL, 'numkeen-aloo-bhujia-32g', NULL, NULL, NULL, NULL, NULL, 0),
(60, NULL, NULL, NULL, NULL, NULL, 'panjabi-tadka-50-gms', NULL, NULL, NULL, NULL, NULL, 0),
(61, NULL, NULL, NULL, NULL, NULL, 'numkeen-salted-peanut-32g', NULL, NULL, NULL, NULL, NULL, 0),
(63, NULL, NULL, NULL, NULL, NULL, 'namkeen', NULL, NULL, NULL, NULL, NULL, 0),
(64, NULL, NULL, NULL, NULL, NULL, 'all-seasons', NULL, NULL, NULL, NULL, NULL, 0),
(65, NULL, NULL, NULL, NULL, NULL, 'chips', NULL, NULL, NULL, NULL, NULL, 0),
(67, NULL, NULL, NULL, NULL, NULL, 'numkeen-aloo-bhujia-25g', NULL, NULL, NULL, NULL, NULL, 0),
(69, NULL, NULL, NULL, NULL, NULL, 'numkeen-salted-peanut-180g', NULL, NULL, NULL, NULL, NULL, 0),
(76, NULL, NULL, NULL, NULL, NULL, 'navratna-mixture-40-gms', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monthlytarget`
--

CREATE TABLE `monthlytarget` (
  `id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `sales_office_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthlytarget`
--

INSERT INTO `monthlytarget` (`id`, `asm_id`, `sales_office_id`, `task`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 10, 14, 'testinf task asign to sales manger', 1, '2024-09-17 13:06:36', '2024-09-17 13:21:02'),
(2, 10, 14, 'tes', 0, '0000-00-00 00:00:00', '2024-09-17 13:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `multipleimage`
--

CREATE TABLE `multipleimage` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `multiple_image_json` text NOT NULL,
  `single_image` text NOT NULL,
  `multiple_images` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` text NOT NULL,
  `modifieddate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_banner`
--

CREATE TABLE `offer_banner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `url` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_banner`
--

INSERT INTO `offer_banner` (`id`, `image`, `slug`, `url`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1716183314.336', '1716183314336', '', 1, '2024-05-20 11:05:14', '0000-00-00 00:00:00'),
(2, '1716183319.338', '1716183319338', '', 1, '2024-05-20 11:05:19', '0000-00-00 00:00:00'),
(3, '1716183324.249', '1716183324249', '', 1, '2024-05-20 11:05:24', '2024-05-20 11:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nsm_id` int(11) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `sales_office_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sku_code` text NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `addeddate` date DEFAULT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `sale_price` varchar(200) NOT NULL,
  `order_id` text NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `after_discount_final_price` text NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `user_id`, `p_id`, `cat_id`, `sku_code`, `state`, `city`, `addeddate`, `image`, `name`, `sale_price`, `order_id`, `quantity`, `after_discount_final_price`, `status`) VALUES
(1, 10, 33, 34, 36, '59', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930731A', '200', '4000', 0),
(2, 10, 33, 34, 36, '59', 1, 2, '898898', 0, 0, '2024-09-30', '1328199959.webp', 'Numkeen Salted Peanut 32g', '15', '20240930A2D6', '350', '5250', 0),
(3, 10, 33, 34, 36, '59', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '2024093040C6', '120', '14400', 0),
(4, 10, 33, 34, 36, '55', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409303E24', '250', '5000', 0),
(5, 10, 33, 34, 36, '55', 2, 2, 'DD65', 0, 0, '2024-09-30', '1487919641.webp', 'Numkeen Aloo Bhujia 32g', '10', '20240930E84F', '250', '2500', 0),
(6, 10, 33, 34, 36, '55', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930917B', '100', '12000', 0),
(7, 10, 33, 34, 36, '55', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930569F', '150', '18000', 0),
(8, 10, 33, 34, 36, '53', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202409301864', '50', '11000', 0),
(9, 10, 33, 34, 36, '53', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409301864', '250', '11000', 0),
(10, 10, 33, 34, 36, '51', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930D048', '150', '24000', 0),
(11, 10, 33, 34, 36, '51', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930D048', '300', '24000', 0),
(12, 10, 33, 34, 37, '49', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202409309FEE', '80', '9600', 0),
(13, 10, 33, 35, 40, '48', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930E635', '50', '6000', 0),
(14, 10, 33, 35, 40, '48', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930C043', '50', '1000', 0),
(15, 10, 33, 34, 41, '47', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930D2BE', '150', '3000', 0),
(16, 10, 33, 34, 41, '47', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202409308CF6', '35', '4200', 0),
(17, 10, 33, 35, 39, '46', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409306792', '60', '1200', 0),
(18, 10, 33, 35, 39, '46', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930081D', '60', '7200', 0),
(19, 10, 33, 35, 38, '45', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930D855', '40', '3400', 0),
(20, 10, 33, 35, 38, '45', 2, 2, 'DD65', 0, 0, '2024-09-30', '1487919641.webp', 'Numkeen Aloo Bhujia 32g', '10', '20240930D855', '20', '3400', 0),
(21, 10, 33, 35, 38, '45', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930D855', '20', '3400', 0),
(22, 10, 33, 34, 36, '44', 1, 2, '898898', 0, 0, '2024-09-30', '1328199959.webp', 'Numkeen Salted Peanut 32g', '15', '20240930EB9C', '40', '7600', 0),
(23, 10, 33, 34, 36, '44', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20240930EB9C', '350', '7600', 0),
(24, 10, 33, 34, 36, '44', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '2024093079DE', '20', '2400', 0),
(25, 10, 33, 34, 36, '44', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409305423', '100', '2000', 0),
(26, 10, 33, 34, 36, '43', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930088B', '20', '3000', 0),
(27, 10, 33, 34, 36, '43', 2, 2, 'DD65', 0, 0, '2024-09-30', '1487919641.webp', 'Numkeen Aloo Bhujia 32g', '10', '20240930088B', '60', '3000', 0),
(28, 10, 33, 34, 36, '43', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409304763', '30', '600', 0),
(29, 10, 33, 34, 36, '43', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20240930B295', '50', '6000', 0),
(30, 10, 33, 10, 60, '61', 4, 1, 'D65', 0, 0, '2024-09-30', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '202409302E12', '120', '2400', 0),
(31, 10, 33, 10, 60, '61', 3, 1, 'DDD', 0, 0, '2024-09-30', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202409303A3E', '80', '9600', 0),
(32, 10, 33, 10, 60, '61', 3, 1, 'DDD', 0, 0, '2024-10-14', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20241014F66B', '10', '1200', 0),
(33, 10, 33, 34, 36, '43', 3, 1, 'DDD', 0, 0, '2024-11-27', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202411279477', '1', '120', 0),
(34, 0, 33, 34, 60, '61', 4, 1, 'D65', 0, 0, '2024-12-03', '1944355776.webp', 'Lays Salt With Pepper Wafer Style 52G', '20', '20241203155D', '1', '20', 0),
(35, 10, 33, 34, 60, '61', 2, 2, 'DD65', 0, 0, '2024-12-03', '1487919641.webp', 'Numkeen Aloo Bhujia 32g', '10', '20241203A077', '3', '30', 0),
(36, 10, 33, 34, 60, '61', 3, 1, 'DDD', 0, 0, '2024-12-03', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '202412037DE6', '4', '470', 0),
(37, 10, 33, 34, 60, '61', 3, 1, 'DDD', 0, 0, '2024-12-05', '1563888896.webp', 'Pringles Desi Masala Tadka Potato Crisps 102 gm, Crunchy And Crispy', '120', '20241205D27C', '2', '240', 0),
(38, 10, 33, 34, 36, '59', 3, 2, 'RFPL00114', 0, 0, '2024-12-27', '796093400.jpg', 'Navratna Mixture 40 gms', '10', '202412279999', '1', '15', 0),
(39, 10, 33, 34, 36, '59', 4, 2, 'RFPL00104', 0, 0, '2024-12-27', '1521709363.jpg', 'Panjabi Tadka 50 gms', '5', '202412279999', '1', '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_coupon`
--

CREATE TABLE `order_coupon` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `type` int(2) NOT NULL,
  `coupen_type` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_coupon`
--

INSERT INTO `order_coupon` (`id`, `user_id`, `coupon_id`, `coupon`, `type`, `coupen_type`, `order_id`, `discount`, `status`) VALUES
(18, '61', 12, 'azmal', 2, 1, '202412037DE6', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pricerange`
--

CREATE TABLE `pricerange` (
  `id` int(11) NOT NULL,
  `start` text NOT NULL,
  `finish` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `slug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricerange`
--

INSERT INTO `pricerange` (`id`, `start`, `finish`, `status`, `addeddate`, `modifieddate`, `slug`) VALUES
(1, '100', '150', 1, '2024-05-17 11:51:53', '0000-00-00 00:00:00', 0),
(2, '150', '200', 1, '2024-05-17 11:52:20', '2024-09-11 18:40:29', 150);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `thumb_img` text NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `mrp_price` varchar(10) NOT NULL,
  `sale_price` varchar(10) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `sku_code` varchar(50) NOT NULL,
  `description` blob NOT NULL,
  `nutritional` blob NOT NULL,
  `ingredients` blob NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `sub_cat_id`, `thumb_img`, `image`, `name`, `slug`, `mrp_price`, `sale_price`, `stock`, `sku_code`, `description`, `nutritional`, `ingredients`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 2, 5, '852678813.webp', '[\"1447230_1.webp\",\"1447230_2.webp\",\"1447230_3.webp\"]', 'Numkeen Salted Peanut 180g', 'numkeen-salted-peanut-180g', '20', '15', '10', '898898', 0x3c703e4e554d4b45454e2053616c746564205065616e7574203332672c205468652066696e6573742026616d703b205461737469657374207361766f726965732c20536e61636b206f6e2074686520676f2e3c2f703e0d0a, 0x3c7461626c652063656c6c73706163696e673d223022207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b20626f726465723a6e6f6e653b2077696474683a3139327074223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c746420636f6c7370616e3d223422207374796c653d226261636b67726f756e642d636f6c6f723a236638636261643b206865696768743a31342e3570743b20746578742d616c69676e3a63656e7465723b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f777261703b2077696474683a3139327074223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7374726f6e673e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4e7574726974696f6e616c20496e666f726d6174696f6e20706572203130302047726d3c2f7370616e3e3c2f7370616e3e3c2f7374726f6e673e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e456e6572677920266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20353730206b63616c3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e50726f7465696e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031312e35673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20436172626f68796472617465266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2034352e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b546f74616c205375676172266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20332e34673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b416464656420537567617273266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20322e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b44696574617279204669626572266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20362e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2033382e30673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b53617475726174656420466174266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031362e36673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b5472616e7320466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266c743b302e3226726471756f3b673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e266e6273703b3c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, 0x3c703e4e554d4b45454e2053616c746564205065616e7574203332672c205468652066696e6573742026616d703b205461737469657374207361766f726965732c20536e61636b206f6e2074686520676f2e3c2f703e0d0a, 1, '2024-07-31 11:30:40', '2024-12-30 18:39:41'),
(2, 2, 3, '1200563746.webp', '[\"1447225_1.webp\",\"1447225_2.webp\",\"1447225_3.webp\"]', 'Numkeen Aloo Bhujia 25g', 'numkeen-aloo-bhujia-25g', '20', '10', '15', 'DD65', 0x3c703e4e554d4b45454e20416c6f6f204268756a6961203332672c204d6164652066726f6d20706f7461746f2c2050657266656374207769746820636861692e3c2f703e0d0a, 0x3c7461626c652063656c6c73706163696e673d223022207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b20626f726465723a6e6f6e653b2077696474683a3139327074223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c746420636f6c7370616e3d223422207374796c653d226261636b67726f756e642d636f6c6f723a236638636261643b206865696768743a31342e3570743b20746578742d616c69676e3a63656e7465723b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f777261703b2077696474683a3139327074223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7374726f6e673e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4e7574726974696f6e616c20496e666f726d6174696f6e20706572203130302047726d3c2f7370616e3e3c2f7370616e3e3c2f7374726f6e673e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e456e6572677920266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20353730206b63616c3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e50726f7465696e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031312e35673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20436172626f68796472617465266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2034352e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b546f74616c205375676172266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20332e34673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b416464656420537567617273266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20322e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b44696574617279204669626572266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20362e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2033382e30673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b53617475726174656420466174266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031362e36673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b5472616e7320466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266c743b302e3226726471756f3b673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e266e6273703b3c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, 0x3c703e4e554d4b45454e20416c6f6f204268756a6961203332672c204d6164652066726f6d20706f7461746f2c2050657266656374207769746820636861692e3c2f703e0d0a, 1, '2024-08-30 11:45:59', '2024-12-30 18:39:03');
INSERT INTO `product` (`id`, `cat_id`, `sub_cat_id`, `thumb_img`, `image`, `name`, `slug`, `mrp_price`, `sale_price`, `stock`, `sku_code`, `description`, `nutritional`, `ingredients`, `status`, `addeddate`, `modifieddate`) VALUES
(3, 2, 4, '1643642173.webp', '[\"nav-ratan-mixer.jpg\",\"nav-ratan-mixer1.jpg\"]', 'Navratna Mixture 40 gms', 'navratna-mixture-40-gms', '15', '10', '100', 'RFPL00114', 0x3c68333e3c7374726f6e673e527320352f2d2050657220506b743c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e3120434152544f4e203d2032343020506b743c2f703e0d0a0d0a3c703e31204c616469203d20313220506b743c2f703e0d0a0d0a3c703e3c7374726f6e673e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e48657265206172652074686520636f6d6d6f6e20496e6772656469656e74733a202d3c2f7370616e3e3c2f7370616e3e3c2f7374726f6e673e3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e506561733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4361756c69666c6f7765723c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e436172726f74733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e506f7461746f65733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4672656e6368206265616e733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e436173686577733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a3c2f756c3e0d0a, 0x3c7461626c652063656c6c73706163696e673d223022207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b20626f726465723a6e6f6e653b2077696474683a31303025223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c746420636f6c7370616e3d223422207374796c653d226261636b67726f756e642d636f6c6f723a236638636261643b206865696768743a31342e3570743b20746578742d616c69676e3a63656e7465723b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f777261703b2077696474683a3139327074223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7374726f6e673e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4e7574726974696f6e616c20496e666f726d6174696f6e20706572203130302047726d3c2f7370616e3e3c2f7370616e3e3c2f7374726f6e673e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e456e6572677920266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20353730206b63616c3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e50726f7465696e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031312e35673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20436172626f68796472617465266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2034352e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b546f74616c205375676172266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20332e34673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b416464656420537567617273266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20322e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b44696574617279204669626572266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20362e37673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e546f74616c20466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2033382e30673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b53617475726174656420466174266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2031362e36673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20746578742d616c69676e3a6c6566743b20766572746963616c2d616c69676e3a6d6964646c653b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b20266e6273703b20266e6273703b20266e6273703b5472616e7320466174266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b202d266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266c743b302e3226726471756f3b673c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22636f6c6f723a626c61636b223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e266e6273703b3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f74643e0d0a0909093c7464207374796c653d226865696768743a31342e3570743b20766572746963616c2d616c69676e3a626f74746f6d3b2077686974652d73706163653a6e6f77726170223e266e6273703b3c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a, 0x3c703e3c7374726f6e673e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e48657265206172652074686520636f6d6d6f6e20496e6772656469656e74733a202d3c2f7370616e3e3c2f7370616e3e3c2f7374726f6e673e3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e506561733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4361756c69666c6f7765723c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e436172726f74733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e506f7461746f65733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e4672656e6368206265616e733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e436173686577733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e52616973696e733c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e50696e656170706c653c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a093c6c693e3c7370616e207374796c653d22666f6e742d73697a653a31317074223e3c7370616e207374796c653d22666f6e742d66616d696c793a43616c696272692c73616e732d7365726966223e506f6d656772616e61746520736565647320286f72206f74686572206672756974732f6e757473293c2f7370616e3e3c2f7370616e3e3c2f6c693e0d0a3c2f756c3e0d0a, 1, '2024-08-30 11:48:02', '2024-12-30 18:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `raise_asm_to_rsm`
--

CREATE TABLE `raise_asm_to_rsm` (
  `id` int(11) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `issue_type` text NOT NULL,
  `message` text NOT NULL,
  `reply_message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raise_asm_to_rsm`
--

INSERT INTO `raise_asm_to_rsm` (`id`, `rsm_id`, `asm_id`, `issue_type`, `message`, `reply_message`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 33, 34, '3', 'ASM to RSM', 'ok issue is resolved', 2, '2024-12-27 11:10:54', '0000-00-00 00:00:00'),
(2, 33, 34, '3', 'ASM to RSM', 'ok issue is resolved', 2, '2024-12-27 11:10:54', '0000-00-00 00:00:00'),
(3, 33, 34, '1', 'trst b rsm', '', 3, '2024-12-27 17:07:03', '0000-00-00 00:00:00'),
(4, 33, 34, '4', 'Ggdghhvcfg', 'Wait for 10 days', 1, '2024-12-31 13:19:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `raise_distributer_to_so`
--

CREATE TABLE `raise_distributer_to_so` (
  `id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `issue_type` text NOT NULL,
  `message` text NOT NULL,
  `reply_message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raise_distributer_to_so`
--

INSERT INTO `raise_distributer_to_so` (`id`, `so_id`, `distributer_id`, `issue_type`, `message`, `reply_message`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 60, 61, '2', 'To so from distributer', 'adfaasd', 1, '2024-12-27 11:48:35', '0000-00-00 00:00:00'),
(2, 60, 61, '3', 'Invoice number incorrect, kindly fix the issue ASAP.', '', 1, '2024-12-27 16:16:04', '0000-00-00 00:00:00'),
(3, 36, 59, '4', 'Received a damaged box, kindly replace it ASAP.', 'Ok escalation.', 3, '2024-12-27 17:28:22', '0000-00-00 00:00:00'),
(4, 60, 61, '4', 'new azmal', 'asdfasdad', 2, '2024-12-27 16:56:01', '0000-00-00 00:00:00'),
(5, 60, 61, '4', 'Received damaged products ', '', 1, '2024-12-30 12:37:36', '0000-00-00 00:00:00'),
(6, 60, 61, '3', 'Wrong total bill amount', '', 1, '2024-12-30 12:38:42', '0000-00-00 00:00:00'),
(7, 36, 59, '3', 'Incorrect bill amount,  kindly resend updated.', 'Check your email box', 3, '2024-12-30 12:46:47', '0000-00-00 00:00:00'),
(8, 60, 61, '2', 'My cn not received till now', 'test', 1, '2024-12-31 13:14:28', '0000-00-00 00:00:00'),
(9, 36, 68, '2', 'I want my clothes at esrliest', 'Resolved.', 3, '2024-12-31 13:05:54', '0000-00-00 00:00:00'),
(10, 36, 68, '3', 'I have not received invoice ', 'As discussed shared on mail', 1, '2024-12-31 13:08:14', '0000-00-00 00:00:00'),
(11, 36, 68, '4', 'Ggdghhvcfg', '', 1, '2024-12-31 13:28:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `raise_issue`
--

CREATE TABLE `raise_issue` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raise_issue`
--

INSERT INTO `raise_issue` (`id`, `name`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'Product Related ', 1, '0000-00-00', '2024-12-26 13:15:15'),
(2, 'CN Related', 1, '0000-00-00', '2024-12-26 13:15:26'),
(3, 'Invoice Issues', 1, '0000-00-00', '2024-12-26 13:15:35'),
(4, 'Damage issues', 1, '0000-00-00', '2024-12-26 13:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `raise_so_to_asm`
--

CREATE TABLE `raise_so_to_asm` (
  `id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `issue_type` text NOT NULL,
  `message` text NOT NULL,
  `reply_message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raise_so_to_asm`
--

INSERT INTO `raise_so_to_asm` (`id`, `asm_id`, `so_id`, `issue_type`, `message`, `reply_message`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 34, 60, '2', 'SADSS  asdas awd ', '', 1, '2024-12-26', '0000-00-00 00:00:00'),
(2, 34, 60, '2', 'to ASM from SO', 'okkk', 2, '2024-12-27', '0000-00-00 00:00:00'),
(3, 34, 36, '1', 'Damaged product', 'dfdsf dsfsdf', 3, '2024-12-27', '0000-00-00 00:00:00'),
(4, 34, 36, '3', 'Incorrect bill amount,  kindly resend updated.', 'Resolved, emailed with correct billing.', 3, '2024-12-30', '0000-00-00 00:00:00'),
(5, 34, 36, '2', 'I want my clothes at esrliest', '', 1, '2024-12-31', '0000-00-00 00:00:00'),
(6, 34, 36, '4', 'Ggdghhvcfg', '', 1, '2024-12-31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_request`
--

CREATE TABLE `recharge_request` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `device_id` text NOT NULL,
  `request_id` bigint(20) NOT NULL,
  `amount` int(50) NOT NULL,
  `type` int(1) NOT NULL,
  `comment` text NOT NULL,
  `status` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `action_date_time` datetime DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recharge_request`
--

INSERT INTO `recharge_request` (`id`, `user_id`, `device_id`, `request_id`, `amount`, `type`, `comment`, `status`, `date`, `time`, `date_time`, `action_date_time`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(7, 18, '', 172552179418, 10, 0, '', 1, '2024-09-05', '13:06:34', '2024-09-05 13:06:34', NULL, '2024-09-05 13:06:34', '2024-09-05 13:06:34', NULL, NULL, 0),
(8, 18, '', 172552270418, 10, 0, '', 1, '2024-09-05', '13:21:44', '2024-09-05 13:21:44', NULL, '2024-09-05 13:21:44', '2024-09-05 13:21:44', NULL, NULL, 0),
(9, 18, '', 172552276418, 10, 0, '', 1, '2024-09-05', '13:22:44', '2024-09-05 13:22:44', NULL, '2024-09-05 13:22:44', '2024-09-05 13:22:44', NULL, NULL, 0),
(10, 18, '', 172552276818, 50, 0, '', 1, '2024-09-05', '13:22:48', '2024-09-05 13:22:48', NULL, '2024-09-05 13:22:48', '2024-09-05 13:22:48', NULL, NULL, 0),
(11, 18, '', 172560421618, 50, 0, '', 1, '2024-09-06', '12:00:16', '2024-09-06 12:00:16', NULL, '2024-09-06 12:00:16', '2024-09-06 12:00:16', NULL, NULL, 0),
(12, 18, '', 172560423618, 100, 0, '', 1, '2024-09-06', '12:00:36', '2024-09-06 12:00:36', NULL, '2024-09-06 12:00:36', '2024-09-06 12:00:36', NULL, NULL, 0),
(13, 18, '', 172560935118, 1000, 0, '', 1, '2024-09-06', '13:25:51', '2024-09-06 13:25:51', NULL, '2024-09-06 13:25:51', '2024-09-06 13:25:51', NULL, NULL, 0),
(14, 18, '', 172587412118, 50, 0, '', 1, '2024-09-09', '14:58:41', '2024-09-09 14:58:41', NULL, '2024-09-09 14:58:41', '2024-09-09 14:58:41', NULL, NULL, 0),
(15, 18, '', 172587423618, 50, 0, '', 1, '2024-09-09', '15:00:36', '2024-09-09 15:00:36', NULL, '2024-09-09 15:00:36', '2024-09-09 15:00:36', NULL, NULL, 0),
(16, 46, '', 172725612646, 200000, 0, '', 1, '2024-09-25', '14:52:06', '2024-09-25 14:52:06', NULL, '2024-09-25 14:52:06', '2024-09-25 14:52:06', NULL, NULL, 0),
(17, 46, '', 172725613746, 2000000, 0, '', 1, '2024-09-25', '14:52:17', '2024-09-25 14:52:17', NULL, '2024-09-25 14:52:17', '2024-09-25 14:52:17', NULL, NULL, 0),
(18, 48, '', 172725756948, 8900000, 0, '', 1, '2024-09-25', '15:16:09', '2024-09-25 15:16:09', NULL, '2024-09-25 15:16:09', '2024-09-25 15:16:09', NULL, NULL, 0),
(19, 48, '', 172725758448, 56748900, 0, '', 1, '2024-09-25', '15:16:24', '2024-09-25 15:16:24', NULL, '2024-09-25 15:16:24', '2024-09-25 15:16:24', NULL, NULL, 0),
(20, 49, '', 172725778249, 90000, 0, '', 1, '2024-09-25', '15:19:42', '2024-09-25 15:19:42', NULL, '2024-09-25 15:19:42', '2024-09-25 15:19:42', NULL, NULL, 0),
(21, 49, '', 172725779149, 678900, 0, '', 1, '2024-09-25', '15:19:51', '2024-09-25 15:19:51', NULL, '2024-09-25 15:19:51', '2024-09-25 15:19:51', NULL, NULL, 0),
(22, 47, '', 172725790047, 987000, 0, '', 1, '2024-09-25', '15:21:40', '2024-09-25 15:21:40', NULL, '2024-09-25 15:21:40', '2024-09-25 15:21:40', NULL, NULL, 0),
(23, 47, '', 172725790747, 65000, 0, '', 1, '2024-09-25', '15:21:47', '2024-09-25 15:21:47', NULL, '2024-09-25 15:21:47', '2024-09-25 15:21:47', NULL, NULL, 0),
(24, 43, '', 172725812743, 98500, 0, '', 1, '2024-09-25', '15:25:27', '2024-09-25 15:25:27', NULL, '2024-09-25 15:25:27', '2024-09-25 15:25:27', NULL, NULL, 0),
(25, 43, '', 172725813343, 1200000, 0, '', 1, '2024-09-25', '15:25:33', '2024-09-25 15:25:33', NULL, '2024-09-25 15:25:33', '2024-09-25 15:25:33', NULL, NULL, 0),
(26, 45, '', 172725841045, 91000, 0, '', 1, '2024-09-25', '15:30:10', '2024-09-25 15:30:10', NULL, '2024-09-25 15:30:10', '2024-09-25 15:30:10', NULL, NULL, 0),
(27, 45, '', 172725841745, 768950, 0, '', 1, '2024-09-25', '15:30:17', '2024-09-25 15:30:17', NULL, '2024-09-25 15:30:17', '2024-09-25 15:30:17', NULL, NULL, 0),
(28, 45, '', 172725842245, 76895000, 0, '', 1, '2024-09-25', '15:30:22', '2024-09-25 15:30:22', NULL, '2024-09-25 15:30:22', '2024-09-25 15:30:22', NULL, NULL, 0),
(29, 55, '', 172734936155, 98000000, 0, '', 1, '2024-09-26', '16:46:01', '2024-09-26 16:46:01', NULL, '2024-09-26 16:46:01', '2024-09-26 16:46:01', NULL, NULL, 0),
(30, 54, '', 172734947654, 9870000, 0, '', 1, '2024-09-26', '16:47:56', '2024-09-26 16:47:56', NULL, '2024-09-26 16:47:56', '2024-09-26 16:47:56', NULL, NULL, 0),
(31, 54, '', 172734952654, 9892000, 0, '', 1, '2024-09-26', '16:48:46', '2024-09-26 16:48:46', NULL, '2024-09-26 16:48:46', '2024-09-26 16:48:46', NULL, NULL, 0),
(32, 53, '', 172734961853, 987688, 0, '', 1, '2024-09-26', '16:50:18', '2024-09-26 16:50:18', NULL, '2024-09-26 16:50:18', '2024-09-26 16:50:18', NULL, NULL, 0),
(33, 53, '', 172734962553, 9899000, 0, '', 1, '2024-09-26', '16:50:25', '2024-09-26 16:50:25', NULL, '2024-09-26 16:50:25', '2024-09-26 16:50:25', NULL, NULL, 0),
(34, 52, '', 172734974152, 98760000, 0, '', 1, '2024-09-26', '16:52:21', '2024-09-26 16:52:21', NULL, '2024-09-26 16:52:21', '2024-09-26 16:52:21', NULL, NULL, 0),
(35, 59, '', 172767779559, 20000, 0, '', 1, '2024-09-30', '11:59:55', '2024-09-30 11:59:55', NULL, '2024-09-30 11:59:55', '2024-09-30 11:59:55', NULL, NULL, 0),
(36, 59, '', 172767780359, 10000, 0, '', 1, '2024-09-30', '12:00:03', '2024-09-30 12:00:03', NULL, '2024-09-30 12:00:03', '2024-09-30 12:00:03', NULL, NULL, 0),
(37, 55, '', 172767794355, 45000, 0, '', 1, '2024-09-30', '12:02:23', '2024-09-30 12:02:23', NULL, '2024-09-30 12:02:23', '2024-09-30 12:02:23', NULL, NULL, 0),
(38, 53, '', 172767807353, 10000, 0, '', 1, '2024-09-30', '12:04:33', '2024-09-30 12:04:33', NULL, '2024-09-30 12:04:33', '2024-09-30 12:04:33', NULL, NULL, 0),
(39, 53, '', 172767807753, 10000, 0, '', 1, '2024-09-30', '12:04:37', '2024-09-30 12:04:37', NULL, '2024-09-30 12:04:37', '2024-09-30 12:04:37', NULL, NULL, 0),
(40, 51, '', 172767816651, 30000, 0, '', 1, '2024-09-30', '12:06:06', '2024-09-30 12:06:06', NULL, '2024-09-30 12:06:06', '2024-09-30 12:06:06', NULL, NULL, 0),
(41, 49, '', 172767830249, 10000, 0, '', 1, '2024-09-30', '12:08:22', '2024-09-30 12:08:22', NULL, '2024-09-30 12:08:22', '2024-09-30 12:08:22', NULL, NULL, 0),
(42, 48, '', 172767834448, 15000, 0, '', 1, '2024-09-30', '12:09:04', '2024-09-30 12:09:04', NULL, '2024-09-30 12:09:04', '2024-09-30 12:09:04', NULL, NULL, 0),
(43, 47, '', 172767842347, 10000, 0, '', 1, '2024-09-30', '12:10:23', '2024-09-30 12:10:23', NULL, '2024-09-30 12:10:23', '2024-09-30 12:10:23', NULL, NULL, 0),
(44, 46, '', 172767850246, 12000, 0, '', 1, '2024-09-30', '12:11:42', '2024-09-30 12:11:42', NULL, '2024-09-30 12:11:42', '2024-09-30 12:11:42', NULL, NULL, 0),
(45, 45, '', 172767857745, 8000, 0, '', 1, '2024-09-30', '12:12:57', '2024-09-30 12:12:57', NULL, '2024-09-30 12:12:57', '2024-09-30 12:12:57', NULL, NULL, 0),
(46, 44, '', 172767866344, 25000, 0, '', 1, '2024-09-30', '12:14:23', '2024-09-30 12:14:23', NULL, '2024-09-30 12:14:23', '2024-09-30 12:14:23', NULL, NULL, 0),
(47, 43, '', 172767877243, 15000, 0, '', 1, '2024-09-30', '12:16:12', '2024-09-30 12:16:12', NULL, '2024-09-30 12:16:12', '2024-09-30 12:16:12', NULL, NULL, 0),
(48, 61, '', 172767918061, 8000, 0, '', 1, '2024-09-30', '12:23:00', '2024-09-30 12:23:00', NULL, '2024-09-30 12:23:00', '2024-09-30 12:23:00', NULL, NULL, 0),
(49, 61, '', 172767918661, 6000, 0, '', 1, '2024-09-30', '12:23:06', '2024-09-30 12:23:06', NULL, '2024-09-30 12:23:06', '2024-09-30 12:23:06', NULL, NULL, 0),
(50, 61, '', 172888613761, 1000, 0, '', 1, '2024-10-14', '11:38:57', '2024-10-14 11:38:57', NULL, '2024-10-14 11:38:57', '2024-10-14 11:38:57', NULL, NULL, 0),
(51, 43, '', 173268544443, 2000, 0, '', 1, '2024-11-27', '11:00:44', '2024-11-27 11:00:44', NULL, '2024-11-27 11:00:44', '2024-11-27 11:00:44', NULL, NULL, 0),
(52, 43, '', 173268544943, 2000, 0, '', 1, '2024-11-27', '11:00:49', '2024-11-27 11:00:49', NULL, '2024-11-27 11:00:49', '2024-11-27 11:00:49', NULL, NULL, 0),
(53, 43, '', 173268545043, 2000, 0, '', 1, '2024-11-27', '11:00:50', '2024-11-27 11:00:50', NULL, '2024-11-27 11:00:50', '2024-11-27 11:00:50', NULL, NULL, 0),
(54, 43, '', 173268545143, 2000, 0, '', 1, '2024-11-27', '11:00:51', '2024-11-27 11:00:51', NULL, '2024-11-27 11:00:51', '2024-11-27 11:00:51', NULL, NULL, 0),
(55, 43, '', 173268545243, 2000, 0, '', 1, '2024-11-27', '11:00:52', '2024-11-27 11:00:52', NULL, '2024-11-27 11:00:52', '2024-11-27 11:00:52', NULL, NULL, 0),
(56, 43, '', 173268545243, 2000, 0, '', 1, '2024-11-27', '11:00:52', '2024-11-27 11:00:52', NULL, '2024-11-27 11:00:52', '2024-11-27 11:00:52', NULL, NULL, 0),
(57, 43, '', 173268545343, 2000, 0, '', 1, '2024-11-27', '11:00:53', '2024-11-27 11:00:53', NULL, '2024-11-27 11:00:53', '2024-11-27 11:00:53', NULL, NULL, 0),
(58, 43, '', 173268545343, 2000, 0, '', 1, '2024-11-27', '11:00:53', '2024-11-27 11:00:53', NULL, '2024-11-27 11:00:53', '2024-11-27 11:00:53', NULL, NULL, 0),
(59, 43, '', 173268545343, 2000, 0, '', 1, '2024-11-27', '11:00:53', '2024-11-27 11:00:53', NULL, '2024-11-27 11:00:53', '2024-11-27 11:00:53', NULL, NULL, 0),
(60, 61, '', 173339469661, 1000, 0, '', 1, '2024-12-05', '16:01:36', '2024-12-05 16:01:36', NULL, '2024-12-05 16:01:36', '2024-12-05 16:01:36', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=hospital,2=physician,3=ambulance,4=pathlogy,5=user',
  `username` text NOT NULL,
  `slug` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` text NOT NULL,
  `country` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `opning_time` text NOT NULL,
  `overview` blob NOT NULL,
  `location` blob NOT NULL,
  `bussiness_hour` blob NOT NULL,
  `logo` text NOT NULL,
  `total_bed` text NOT NULL,
  `avaliable_bed` text NOT NULL,
  `image` text NOT NULL,
  `ambulance_status` float NOT NULL COMMENT '1=active,0=deactive',
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `role`, `username`, `slug`, `mobile`, `email`, `dob`, `city`, `state`, `zipcode`, `country`, `password`, `address`, `opning_time`, `overview`, `location`, `bussiness_hour`, `logo`, `total_bed`, `avaliable_bed`, `image`, `ambulance_status`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 1, 'Azmal Hospital', 'azmal-hospital', '9584712015', 'admin@gmail.com', '', '', '', '', '', 'admin', ' 96 Red Hawk Road Cyrus, MN 56323', 'Opens at 08.00 AM', 0x3c68343e41626f7574204d653c2f68343e0d0a0d0a3c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c2071756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e69736920757420616c697175697020657820656120636f6d6d6f646f20636f6e7365717561742e2044756973206175746520697275726520646f6c6f7220696e20726570726568656e646572697420696e20766f6c7570746174652076656c697420657373652063696c6c756d20646f6c6f726520657520667567696174206e756c6c612070617269617475722e204578636570746575722073696e74206f6363616563617420637570696461746174206e6f6e2070726f6964656e742c2073756e7420696e2063756c706120717569206f666669636961206465736572756e74206d6f6c6c697420616e696d20696420657374206c61626f72756d2e3c2f703e0d0a0d0a3c68343e4177617264733c2f68343e0d0a0d0a3c756c3e0d0a093c6c693e0d0a093c703e4a756c7920323032333c2f703e0d0a0d0a093c68343e48756d616e6974617269616e2041776172643c2f68343e0d0a0d0a093c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e2050726f696e206120697073756d2074656c6c75732e20496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e3c2f703e0d0a093c2f6c693e0d0a093c6c693e0d0a093c703e4d6172636820323031313c2f703e0d0a0d0a093c68343e436572746966696361746520666f7220496e7465726e6174696f6e616c20566f6c756e7465657220536572766963653c2f68343e0d0a0d0a093c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e2050726f696e206120697073756d2074656c6c75732e20496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e3c2f703e0d0a093c2f6c693e0d0a093c6c693e0d0a093c703e4d617920323030383c2f703e0d0a0d0a093c68343e5468652044656e74616c2050726f66657373696f6e616c206f662054686520596561722041776172643c2f68343e0d0a0d0a093c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e2050726f696e206120697073756d2074656c6c75732e20496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e3c2f703e0d0a093c2f6c693e0d0a3c2f756c3e0d0a, 0x4d65646c696665204d65646963616c0d0ac2a0393620526564204861776b20526f61642043797275732c204d4e203536333233, 0x3c7461626c6520626f726465723d2231222063656c6c70616464696e673d2231222063656c6c73706163696e673d223122207374796c653d2277696474683a3530307078223e0d0a093c74626f64793e0d0a09093c74723e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e4d6f6e6461793c2f703e0d0a0909093c2f74643e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e30373a303020414d202d2030393a303020504d3c2f703e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e547565736461793c2f703e0d0a0909093c2f74643e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e30373a303020414d202d2030393a303020504d3c2f703e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a09093c74723e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e5765646e65736461793c2f703e0d0a0909093c2f74643e0d0a0909093c74643e0d0a0909093c70207374796c653d22746578742d616c69676e3a63656e746572223e30373a303020414d202d2030393a303020504d3c2f703e0d0a0909093c2f74643e0d0a09093c2f74723e0d0a093c2f74626f64793e0d0a3c2f7461626c653e0d0a0d0a3c703e266e6273703b3c2f703e0d0a, '1714815968.png', '100', '50', '1714815931.jpg', 0, 1, '2024-05-04 12:20:46', NULL),
(2, 1, 'Medlife Hospital', 'medlife-hospital', ' 320-795-8815', 'medlife@gmail.com', '', '', '', '', '', 'admin', 'Road Cyrus, MN 56323', 'Opens at 08.00 AM', 0x3c68343e41626f7574204d653c2f68343e0d0a0d0a3c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2c2071756973206e6f737472756420657865726369746174696f6e20756c6c616d636f206c61626f726973206e69736920757420616c697175697020657820656120636f6d6d6f646f20636f6e7365717561742e2044756973206175746520697275726520646f6c6f7220696e20726570726568656e646572697420696e20766f6c7570746174652076656c697420657373652063696c6c756d20646f6c6f726520657520667567696174206e756c6c612070617269617475722e204578636570746575722073696e74206f6363616563617420637570696461746174206e6f6e2070726f6964656e742c2073756e7420696e2063756c706120717569206f666669636961206465736572756e74206d6f6c6c697420616e696d20696420657374206c61626f72756d2e3c2f703e0d0a, 0x3c696672616d65207372633d2268747470733a2f2f7777772e676f6f676c652e636f6d2f6d6170732f656d6265643f70623d21316d313821316d313221316d3321316433303736373239352e31313630323331313621326436302e39343630323736383430313737313421336431392e37323232373232363531343437333521326d3321316630213266302133663021336d322131693130323421326937363821346631332e3121336d3321316d32213173307833303633356666303662393262373931253341307864373863346661313835343231336136213273496e6469612135653021336d32213173656e213273696e2134763137313331363731303231373221356d32213173656e213273696e222077696474683d223130302522206865696768743d2234353022207374796c653d22626f726465723a303b2220616c6c6f7766756c6c73637265656e3d2222206c6f6164696e673d226c617a7922207265666572726572706f6c6963793d226e6f2d72656665727265722d7768656e2d646f776e6772616465223e3c2f696672616d653e, '', '1714828912.png', '', '', '1714828920.jpg', 0, 1, '2024-05-04 17:00:30', NULL),
(4, 1, 'Sharukh hospital', 'sharukh-hospital', '789654123', 'sharukh@gmail.com', '', '', '', '', '', '123456', '', '', '', '', '', '1677049590.jpg', '', '', '', 0, 1, '2024-05-28 10:42:04', NULL),
(5, 2, 'Dr. Saumya Rathi Clinic', 'dr-saumya-rathi-clinic', '78945612311', 'physician@gmail.com', '', '', '', '', '', '123456', ' fdsfds dsf sdf', 'sfds fsd', 0x3c703e266e6273703b667366736466736420736420733c2f703e0d0a, 0x736466207366207364662073642073642073, 0x3c703e73666720736773646673643c2f703e0d0a, '1717391958.webp', '10', '20', '1717391958.jpg', 0, 1, '2024-05-31 17:16:17', '2024-06-03 17:13:54'),
(6, 1, 'deen dayal', 'deen-dayal', '7011221026', 'rakhi@gmail.com', '', '', '', '', '', '123456789', '', '', '', '', '', '1677049590.jpg', '100', '3', '', 0, 1, '2024-06-02 17:18:49', NULL),
(8, 3, 'Azmal Ambulance', 'azmal-ambulance', '7896541230', 'ambulance@gmail.com', '', '', '', '', '', '123456', ' Florida, USA', 'Available on Fri, 22 Mar', '', '', '', '1717398844._AC_UF1000,1000_QL80_', '', '', '1717398844._AC_UF1000,1000_QL80_', 1, 1, '2024-06-03 12:20:11', '2024-06-03 17:19:24'),
(9, 1, 'test hos', 'test-hos', '1313212313', 'testhos@gmail.com', '', '', '', '', '', '11231', '', '', '', '', '', '1677049590.jpg', '', '', '1717414492.jpg', 0, 1, '2024-06-03 17:01:32', '2024-06-03 17:04:52'),
(10, 4, 'Wolverine Pathology', 'wolverine-pathology', '7895461230', 'pathology@gmail.com', '', '', '', '', '', '123456', '96 Red Hawk Road Cyrus, MN 56323', 'Opens at 08.00 AM', 0x3c703e746573743c2f703e0d0a, 0x74657374, 0x3c703e746573743c2f703e0d0a, '1717998531.jpg', '', '', '1393525466.jpg', 0, 1, '2024-06-10 11:07:56', NULL),
(11, 5, 'Azmal Ansari', 'azmal-ansari', '07896541230', 'azmal@gmail.com', '26/06/2024', 'noida', 'Delhi', '115522', 'India', '123456', '29181 west river drive', '', '', '', '', '1718024595.png', '', '', '', 0, 1, '2024-06-10 15:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `role_access` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `slug`, `role_access`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'HR TEAM', 'hr-team', '{\"main_access\":[\"5\"],\"inner_access\":[[],[],[],[],[],[\"1\",\"2\",\"3\",\"4\"],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]]}', 1, '2024-07-30 13:20:06', '2025-01-10 16:07:29'),
(2, 'NATIONAL SALE MANAGER', 'national-sale-manager', '{\"main_access\":[\"2\"],\"inner_access\":[[],[],[\"3\",\"4\"]]}', 1, '2024-07-30 13:20:42', '2024-07-30 16:17:25'),
(3, 'MIS ADMIN', 'mis-admin', '{\"main_access\":[\"1\"],\"inner_access\":[[],[\"2\",\"3\"],[]]}', 1, '2024-07-30 13:20:54', '2024-07-30 16:17:21'),
(4, 'ACCOUNTS TEAM', 'accounts-team', '{\"main_access\":[\"0\"],\"inner_access\":[[\"2\",\"4\"],[],[]]}', 1, '2024-07-30 13:21:07', '2024-07-30 16:17:16'),
(5, 'PRODUCTION TEAM', 'production-team', '{\"main_access\":[\"0\",\"1\",\"2\"],\"inner_access\":[[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\",\"4\"]]}', 1, '2024-07-30 13:21:20', '2024-07-30 17:42:01'),
(7, 'test', 'test', '{\"main_access\":[\"0\",\"1\",\"2\",\"7\"],\"inner_access\":[[\"1\",\"3\"],[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\"],[],[],[],[],[\"3\"]]}', 1, '2024-07-30 17:44:07', '2024-08-20 13:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `id` int(11) NOT NULL,
  `nsm_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pdf` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`id`, `nsm_id`, `name`, `pdf`, `status`, `addeddate`, `modifieddate`) VALUES
(2, 10, 'test', '1733480105dummy.pdf', 1, '2024-12-06 15:44:53', '2024-12-06 15:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `singlebanner`
--

CREATE TABLE `singlebanner` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `singlebanner`
--

INSERT INTO `singlebanner` (`id`, `logo`, `link`) VALUES
(1, '1716273740.jpg', 'shop');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `min_deposit` text NOT NULL,
  `logo` text NOT NULL,
  `name` text NOT NULL,
  `content` blob NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `alt_mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alt_email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `min_deposit`, `logo`, `name`, `content`, `mobile`, `alt_mobile`, `email`, `alt_email`, `address`, `facebook`, `twitter`, `instagram`, `youtube`, `map`) VALUES
(1, '10', '1735564352.png', '', '', '9856472360', '9586741023', 'email@gmail.com', 'altemail@gmail.com', 'your address', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30767295.116023116!2d60.946027684017714!3d19.722272265144735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1713167102172!5m2!1sen!2sin\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(2, '', '', 'About Us', 0x3c703e41626f75742055733c2f703e0d0a, '', '', '', '', '', '', '', '', '', ''),
(3, '', '', 'Terms & Conditions', 0x3c68313e5465726d732026616d703b20436f6e646974696f6e733c2f68313e0d0a, '', '', '', '', '', '', '', '', '', ''),
(4, '', '', 'Privacy Policy', 0x3c68313e5072697661637920506f6c6963793c2f68313e0d0a, '', '', '', '', '', '', '', '', '', ''),
(5, '', '', 'Return & Refund policy', 0x3c68313e52657475726e2026616d703b20526566756e6420706f6c6963793c2f68313e0d0a, '', '', '', '', '', '', '', '', '', ''),
(6, '', '', 'Shipping & Delivery', 0x3c68313e5368697070696e672026616d703b2044656c69766572793c2f68313e0d0a, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(11, 'Free', 'free', 1, '2023-03-31 09:43:03', '2024-09-11 17:58:10'),
(21, 'XXL', 'xxl', 1, '2023-03-31 09:45:30', '2024-09-11 17:58:12'),
(22, 'XL', 'xl', 1, '2023-04-14 12:26:38', '2024-09-11 17:58:13'),
(23, 'L', 'l', 1, '2023-04-14 12:26:46', '2024-09-11 17:58:16'),
(24, 'M', 'm', 1, '2023-04-14 12:26:55', '2024-09-11 17:58:17'),
(26, 'S', 's', 1, '2023-12-22 01:12:02', '2024-09-11 17:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `website` int(11) DEFAULT NULL COMMENT '1=web',
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `status`, `website`, `addeddate`, `modifieddate`) VALUES
(3, '1735296083.jpg', 1, 1, '2023-07-13 01:20:23', '2024-12-27 16:11:23'),
(4, '1735296065.jpg', 1, 1, '2024-08-20 12:05:40', '2024-12-27 16:11:05'),
(5, '1735296041.jpg', 1, 1, '2024-08-30 11:32:51', '2024-12-27 16:10:41'),
(6, '1735296032.jpg', 1, 1, '2024-08-30 11:32:55', '2024-12-27 16:10:32'),
(7, '1735296094.jpg', 1, 0, '2024-12-27 16:11:34', '2024-12-30 14:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `page_name` varchar(150) NOT NULL,
  `controller_name` varchar(150) NOT NULL,
  `p_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `slug`, `table_name`, `page_name`, `controller_name`, `p_id`) VALUES
(341, 'panjabi-tadka-50-gms', 'product', 'product-details.php', 'product', 4),
(344, 'namkeen', 'categories', '', 'categories', 2),
(345, 'all-seasons', 'categories', '', 'categories', 3),
(346, 'chips', 'categories', '', 'categories', 1),
(348, 'numkeen-aloo-bhujia-25g', 'product', 'product-details.php', 'product', 2),
(350, 'numkeen-salted-peanut-180g', 'product', 'product-details.php', 'product', 1),
(357, 'navratna-mixture-40-gms', 'product', 'product-details.php', 'product', 3);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `slug`, `country_id`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'ANDHRA PRADESH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ASSAM', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ARUNACHAL PRADESH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'BIHAR', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'GUJRAT', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'HARYANA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'HIMACHAL PRADESH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'JAMMU & KASHMIR', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'KARNATAKA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'KERALA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'MADHYA PRADESH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'MAHARASHTRA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'MANIPUR', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'MEGHALAYA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'MIZORAM', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'NAGALAND', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'ORISSA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'PUNJAB', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'RAJASTHAN', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'SIKKIM', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'TAMIL NADU', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'TRIPURA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'UTTAR PRADESH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'WEST BENGAL', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'DELHI', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'GOA', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'PONDICHERY', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'LAKSHDWEEP', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'DAMAN & DIU', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'DADRA & NAGAR', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'CHANDIGARH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'ANDAMAN & NICOBAR', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'UTTARANCHAL', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'JHARKHAND', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'CHATTISGARH', '', 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `modifieddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(3, 2, '18 Grams - 25 Grams per packet', '18-grams-25-grams-per-packet', 1, '2024-12-30', '2024-12-30'),
(4, 2, '40 Grams - 45 Grams per packet', '40-grams-45-grams-per-packet', 1, '2024-12-30', '2024-12-30'),
(5, 2, '180 Grams - 220 Grams per packet', '180-grams-220-grams-per-packet', 1, '2024-12-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `nsm_id` text DEFAULT NULL,
  `rsm_id` text DEFAULT NULL,
  `asm_id` text DEFAULT NULL,
  `sales_office_id` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `target_type` int(11) DEFAULT NULL,
  `sku_code` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `message_to_rsm` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `title`, `target_type`, `sku_code`, `type`, `amount`, `message_to_rsm`, `status`, `addeddate`, `modifieddate`) VALUES
(2, '10', '33', NULL, NULL, 'Old Test', 1, 2, 'Monthly', '1200', 'Tesat', 1, '2024-12-12', '2024-12-12 12:11:28'),
(3, '10', '33', NULL, NULL, 'New Target ', 2, 1, 'Annually', '25000', 'Every Year u need to sale 25000 for half Yearly', 2, '2024-12-03', '2024-12-03 16:42:35'),
(7, '10', '33', NULL, NULL, 'tests', 1, 1, 'Monthly', '', 'testt', 3, '2024-12-12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `target_rsm_to_asm`
--

CREATE TABLE `target_rsm_to_asm` (
  `id` int(11) NOT NULL,
  `nsm_id` text DEFAULT NULL,
  `rsm_id` text DEFAULT NULL,
  `asm_id` text DEFAULT NULL,
  `sales_office_id` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `target_type` int(11) DEFAULT NULL,
  `sku_code` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `message_to_rsm` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_rsm_to_asm`
--

INSERT INTO `target_rsm_to_asm` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `title`, `target_type`, `sku_code`, `type`, `amount`, `message_to_rsm`, `status`, `addeddate`, `modifieddate`) VALUES
(9, NULL, '33', '34', NULL, 'testret 2', 2, 0, 'Monthly', '5000', 'asd sadsad', 1, '2024-12-12', '0000-00-00 00:00:00'),
(10, NULL, '33', '35', NULL, 'wrqe', 1, 2, 'Quarterly', '', 'sadad', 1, '2024-12-12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=admin,2=sub admin\r\n',
  `role` int(11) NOT NULL,
  `access` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `martial` text NOT NULL,
  `age` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `hash_key` text DEFAULT NULL,
  `hash_expiry` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=active\r\n',
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `type`, `role`, `access`, `first_name`, `last_name`, `username`, `password`, `email`, `mobile`, `address`, `image`, `gender`, `dob`, `martial`, `age`, `country`, `state`, `hash_key`, `hash_expiry`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 1, 0, '0', 'Azmal', 'Ansari', 'azmal123', 'azmal123', 'admin@gmail.com', '46546', 'sfsfsdf sdefdsfs fsdf sdf', 'user2.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'elhi', NULL, NULL, 0, NULL, NULL),
(2, 1, 0, '1', 'Admin', 'Admin', 'admin', 'admin', 'admin1@gmail.com', '95822980123', 'delhi', '1725100321.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL, 0, NULL, NULL),
(3, 1, 0, '0', 'Wolverine', 'logen', 'azmal', 'azmal', 'wolverine@gmail.com', '897989', 'sfsfsdf sdefdsfs fsdf sdf', 'user3.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL, 0, NULL, NULL),
(7, 2, 1, '{\"main_access\":[\"5\"],\"inner_access\":[[],[],[],[],[],[\"1\",\"2\",\"3\",\"4\"],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]]}', 'HR TEAM', '', 'hr@gmail.com', '123456', 'hr@gmail.com', '12345689', '', '', '', '', '', '', '', '', NULL, NULL, 1, '2025-01-10 16:08:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `linkdin` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `image`, `name`, `position`, `linkdin`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1735624410.jpg', 'Prashant Kumar', 'CEO & Managing Director', 'https://www.linkedin.com/', 1, '2024-12-30 15:13:06', '2024-12-31 11:23:30'),
(2, '1735624300.jpg', 'Prashant Kumar ', 'CEO & Managing Director', '', 1, '2024-12-31 11:21:40', '0000-00-00 00:00:00'),
(3, '1735624369.png', 'Preety Singh', 'Co-Founder & CFO', '', 1, '2024-12-31 11:22:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `position`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1735562164.png', 'Ashutosh Tyagi', 'Productivity Engineer (IT)', 'Bunzz offers a wide range of namkeen snacks that are both flavorful and crunchy, making them a go-to choice for snack lovers. The brand is committed to using premium ingredients, ensuring each product delivers consistent quality. ', 1, '2024-12-30 15:20:29', '2024-12-30 18:06:04'),
(2, '1735552254.png', 'Radhika', 'Chartered Accountant', 'Bunzz is a promising namkeen company known for its unique and flavorful snacks. Their products stand out for their quality ingredients and innovative recipes that appeal to a wide range of tastes. ', 1, '2024-12-30 15:20:54', '2024-12-30 17:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `join_id` int(10) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nsm_id` text DEFAULT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) DEFAULT NULL,
  `sales_office_id` int(11) DEFAULT NULL,
  `role` int(10) NOT NULL COMMENT '1=nsm, \r\n2=rsm, 3=asm ,4=sales,5=distrubuter,6=mis team,7=acountteam,8=hr',
  `wallet` float NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` text NOT NULL,
  `firm_name` text NOT NULL,
  `address` text NOT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `gst_no` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` int(10) NOT NULL,
  `kyc_status` int(11) NOT NULL COMMENT '0=new,1=approve,2=under review,3=reject'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `join_id`, `user_id`, `nsm_id`, `rsm_id`, `asm_id`, `sales_office_id`, `role`, `wallet`, `name`, `mobile`, `email`, `password`, `profile_image`, `firm_name`, `address`, `state`, `city`, `gst_no`, `date_time`, `status`, `kyc_status`) VALUES
(10, 2, 94, NULL, 0, NULL, NULL, 1, 0, 'Navjot Singh        ', '123456789', 'nsm@gmail.com', '123456', '', '', 'NSM Address', '15', '1', '', '2024-09-02 12:01:08', 1, 0),
(33, 2, 95, '10', 0, NULL, NULL, 2, 0, 'Rahul jain', '9012121240', 'Rahuljain@gmail.com', '123456', '', '', 'Test', '6', '166', '', '2024-09-25 11:11:01', 1, 0),
(34, 2, 96, '10', 33, NULL, NULL, 3, 0, 'Varun Dubey', '9012121212', 'varundubey@gmail.com', '123456', '', '', '', '5', '1', '', '2024-09-25 11:17:10', 1, 0),
(35, 2, 97, '10', 33, NULL, NULL, 3, 0, 'Yatish Chauhan', '9012121213', 'yatishchauhan@gmail.com', '123456', '', '', '', '7', '171', '', '2024-09-25 11:19:07', 1, 0),
(36, 2, 98, '10', 33, 34, NULL, 4, 0, 'Prajapati', '9012121213', 'Prajapati@gmail.com', '123456', '', '', '', '6', '160', '', '2024-09-25 11:23:16', 1, 0),
(37, 2, 99, '10', 33, 34, NULL, 4, 0, 'Vineet Rajput', '9012121214', 'Vineetrajput@gmail.com', '123456', '', '', '', '1', '4', '', '2024-09-25 11:24:42', 1, 0),
(38, 2, 100, '10', 33, 35, NULL, 4, 0, 'Banty Saini', '9012121215', 'BantySaini@gmail.com', '123456', '', '', '', '18', '414', '', '2024-09-25 11:25:51', 1, 0),
(39, 2, 101, '10', 33, 35, NULL, 4, 0, 'Deepak Kumar', '9012121217', 'Deepakkumar@gmail.com', '123456', '', '', '', '25', '114', '', '2024-09-25 11:28:14', 1, 0),
(40, 2, 102, '10', 33, 35, NULL, 4, 0, 'Rinchan Sahoo', '9012121218', 'RinchanSahoo@gmail.com', '123456', '', '', '', '9', '231', '', '2024-09-25 11:30:23', 1, 0),
(41, 2, 103, '10', 33, 34, NULL, 4, 0, 'Shivam', '9012121221', 'Shivam@gmail.com', '123456', '', '', '', '7', '176', '', '2024-09-25 11:32:06', 1, 0),
(43, 2, 104, '10', 33, 34, 36, 5, 23280, 'RAJESH KUMAR AGARWAL', '78945612300', 'rajeshkumaragarwal@gmail.com', '123456', '', 'abc', 'hathras', '23', '515', '', '2024-09-25 11:52:27', 1, 1),
(44, 2, 105, '10', 33, 34, 36, 5, 13000, 'SANJAY ENTERPRISES', 'SANJAY ', 'sanjay1@gmail.com', '123456', '', 'xyz', '', '23', '515', '', '2024-09-25 11:54:12', 1, 1),
(45, 2, 106, '10', 33, 35, 38, 5, 4600, 'SHREE BALAJI TRADERS', 'Krishna ', 'krishna@gmail.com', '123456', '', 'PQR', '', '23', '515', '', '2024-09-25 12:06:42', 1, 1),
(46, 2, 107, '10', 33, 35, 39, 5, 3600, 'CHETAN KUMAR KULDEEP KUMAR', 'CHETAN KUMAR KU', 'chetankumar@gmail.com', '123456', '', 'LMN', '', '23', '517', '', '2024-09-25 12:08:47', 1, 1),
(48, 2, 109, '10', 33, 35, 40, 5, 8000, 'KUMAR AGENCIES', 'satish kumar', 'satishkumar@gmail.com', '123456', '', 'asd', '', '23', '535', '', '2024-09-25 12:17:25', 1, 1),
(49, 2, 110, '10', 33, 34, 37, 5, 400, 'RADHA ENTERPRISES', 'radha singh', 'radhasingh@gmail.com', '123456', '', 'ghj', '', '23', '547', '', '2024-09-25 12:42:47', 1, 1),
(51, 2, 112, '10', 33, 34, 36, 5, 6000, 'PRADEEP KUMAR AGRAWAL', 'Pradeep kumar', 'pradeep@gmail.com', '123456', '', 'NA', '', '25', '114', '', '2024-09-26 16:20:44', 1, 1),
(52, 2, 113, '10', 33, 34, 36, 5, 0, 'SURAJ FERTILIZOR', 'SURAJ ', 'suraj1@gmail.com', '123456', '', 'SURAJ FERTILIZOR', '', '1', '4', '', '2024-09-26 16:21:52', 1, 1),
(53, 2, 114, '10', 33, 34, 36, 5, 9000, 'JAI MAA PURNAGIRI KIRANA STORE', 'JAI MAA ', 'jai@gmail.com', '123456', '', 'JAI MAA PURNAGIRI KIRANA STORE', '', '5', '125', '', '2024-09-26 16:22:45', 1, 1),
(54, 2, 115, '10', 33, 34, 36, 5, 0, 'MOHD. FARUQ & SONS', 'MOHD.', 'mohd@gmail.com', '123456', '', 'MOHD. FARUQ & SONS', '', '2', '37', '', '2024-09-26 16:36:59', 1, 1),
(55, 2, 116, '10', 33, 34, 36, 5, 7500, 'SHYAM KUMAR', 'SHYAM KUMAR', 'shyam@gmail.com', '123456', '', 'SHYAM KUMAR & SONS', '', '6', '150', '', '2024-09-26 16:42:18', 1, 1),
(56, 2, 117, '10', 33, 34, NULL, 4, 0, 'Rinki', '', 'rinki@gmail.com', '123456', '', '', '', '5', '125', '', '2024-09-26 17:07:04', 1, 0),
(57, 2, 118, '10', 33, 34, NULL, 4, 0, 'vaishali', '', 'vaishali@gmail.com', '123456', '', '', '', '1', '4', '', '2024-09-26 17:07:32', 1, 0),
(58, 2, 119, '10', 33, 34, NULL, 4, 0, 'Radhika', '', 'Radhika@gmail.com', '123456', '', '', '', '6', '150', '', '2024-09-26 17:08:00', 1, 0),
(59, 2, 120, '10', 33, 34, 36, 5, 8557, 'Rishabh', '4565454', 'rishabh@gmail.com', '123456', '', 'KYC Firms', '', '1', '4', '', '2024-09-26 18:13:24', 1, 1),
(60, 2, 121, '10', 33, 34, NULL, 4, 0, 'Rohit Kumar', '645645654', 'rohitkumar@gmail.com', '123456', '', '', '', '6', '150', '', '2024-09-30 12:20:32', 1, 0),
(61, 2, 122, '10', 33, 34, 60, 5, 47040, 'Prateek ', '1656565', 'Prateek@gmail.com', '123456', '', 'Prateek industries', '', '25', '1', '', '2024-09-30 12:21:38', 1, 1),
(62, 2, 123, NULL, 0, NULL, NULL, 1, 0, 'Amrinder Gill', '9874556', 'nsm2@gmail.com', '123456', '', '', 'nsm 2 ', '1', '4', '', '2024-12-02 17:58:27', 1, 0),
(63, 60, 124, '10', 33, 34, 60, 5, 456456, 'test 1', '455645646465', 'testidistr@gmmail.com', '1733228029', '', 'test 222', '1231231321', NULL, NULL, '1221131', '2024-12-03 17:43:49', 1, 0),
(64, 60, 125, '10', 33, 34, 60, 5, 0, 'asdas22', '231e1', 'logen@gmail.com', '1733228148', '', 'asdasd', 'asdasd', NULL, NULL, 'aasdas', '2024-12-03 17:45:48', 1, 0),
(65, 36, 126, '10', 33, 34, 36, 5, 0, 'Alpha', '9999821846', 'kumartushki123@gmail.com', '1735620975', '', 'Charlie', '', NULL, NULL, '', '2024-12-31 10:26:15', 1, 0),
(66, 36, 127, '10', 33, 34, 36, 5, 0, 'Tushar', '9928509680', 'kumartushki12345@gmail.com', '1735621437', '', 'Mark creation ', '', NULL, NULL, '', '2024-12-31 10:33:57', 1, 0),
(67, 58, 128, '10', 33, 34, 58, 5, 0, 'Rakesh', '8524369874', 'rakesh@gmail.com', '1735624286', '', 'Abc', 'Delhi', NULL, NULL, '23gdhbcbtu', '2024-12-31 11:21:26', 1, 1),
(68, 36, 129, '10', 33, 34, 36, 5, 0, 'Beta', '9999821846', 'kumartushki123456@gmail.com', '1735628880', '', 'Mark', '', NULL, NULL, '', '2024-12-31 12:38:00', 1, 1),
(69, 0, 130, NULL, 0, NULL, NULL, 6, 0, 'MIS', '78945616650', 'mis@gmail.com', '123456', '', 'MIS', 'Delhi', '', '1', '', '2025-01-06 07:10:11', 1, 0),
(70, 0, 131, NULL, 0, NULL, NULL, 7, 0, 'Account Team', '78945616650', 'acountteam@gmail.com', '123456', '', 'ACCOUNT TEAM', 'Delhi', '', '1', '', '2025-01-06 07:10:11', 1, 0),
(71, 0, 132, NULL, 0, NULL, NULL, 8, 0, 'HR Team', '78945616650', 'hr@gmail.com', '123456', '', 'HR TEAM', 'Delhi', '', '1', '', '2025-01-06 07:10:11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `request_id` text NOT NULL,
  `join_id` int(10) NOT NULL,
  `type2` int(1) NOT NULL COMMENT '1=add money,2=order',
  `amount` float NOT NULL,
  `balance` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `recharge_type` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `add_date_time` date DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `reject_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id`, `user_id`, `request_id`, `join_id`, `type2`, `amount`, `balance`, `type`, `message`, `recharge_type`, `date_time`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`, `reject_reason`) VALUES
(1, 59, '172767779559', 35, 1, 20000, 20000, 'credit', 'Add Money', 0, '2024-09-30 11:59:55', '2024-09-30', '2024-09-30 11:59:55', NULL, NULL, 0, 1, ''),
(2, 59, '172767780359', 36, 1, 10000, 30000, 'credit', 'Add Money', 0, '2024-09-30 12:00:03', '2024-09-30', '2024-09-30 12:00:03', NULL, NULL, 0, 1, ''),
(3, 59, '20240930731A', 1, 2, 4000, 26000, 'debit', 'Order', 0, '2024-09-30 12:00:24', '2024-09-30', '2024-09-30 12:00:24', NULL, NULL, 0, 1, ''),
(4, 59, '20240930A2D6', 2, 2, 5250, 20750, 'debit', 'Order', 0, '2024-09-30 12:00:57', '2024-09-30', '2024-09-30 12:00:57', NULL, NULL, 0, 1, ''),
(5, 59, '2024093040C6', 3, 2, 14400, 6350, 'debit', 'Order', 0, '2024-09-30 12:01:41', '2024-09-30', '2024-09-30 12:01:41', NULL, NULL, 0, 1, ''),
(6, 55, '172767794355', 37, 1, 45000, 45000, 'credit', 'Add Money', 0, '2024-09-30 12:02:23', '2024-09-30', '2024-09-30 12:02:23', NULL, NULL, 0, 1, ''),
(7, 55, '202409303E24', 4, 2, 5000, 40000, 'debit', 'Order', 0, '2024-09-30 12:02:40', '2024-09-30', '2024-09-30 12:02:40', NULL, NULL, 0, 1, ''),
(8, 55, '20240930E84F', 5, 2, 2500, 37500, 'debit', 'Order', 0, '2024-09-30 12:02:57', '2024-09-30', '2024-09-30 12:02:57', NULL, NULL, 0, 1, ''),
(9, 55, '20240930917B', 6, 2, 12000, 25500, 'debit', 'Order', 0, '2024-09-30 12:03:23', '2024-09-30', '2024-09-30 12:03:23', NULL, NULL, 0, 1, ''),
(10, 55, '20240930569F', 7, 2, 18000, 7500, 'debit', 'Order', 0, '2024-09-30 12:03:44', '2024-09-30', '2024-09-30 12:03:44', NULL, NULL, 0, 1, ''),
(11, 53, '172767807353', 38, 1, 10000, 10000, 'credit', 'Add Money', 0, '2024-09-30 12:04:33', '2024-09-30', '2024-09-30 12:04:33', NULL, NULL, 0, 1, ''),
(12, 53, '172767807753', 39, 1, 10000, 20000, 'credit', 'Add Money', 0, '2024-09-30 12:04:37', '2024-09-30', '2024-09-30 12:04:37', NULL, NULL, 0, 1, ''),
(13, 53, '202409301864', 8, 2, 11000, 9000, 'debit', 'Order', 0, '2024-09-30 12:05:21', '2024-09-30', '2024-09-30 12:05:21', NULL, NULL, 0, 1, ''),
(14, 51, '172767816651', 40, 1, 30000, 30000, 'credit', 'Add Money', 0, '2024-09-30 12:06:06', '2024-09-30', '2024-09-30 12:06:06', NULL, NULL, 0, 1, ''),
(15, 51, '20240930D048', 9, 2, 24000, 6000, 'debit', 'Order', 0, '2024-09-30 12:06:26', '2024-09-30', '2024-09-30 12:06:26', NULL, NULL, 0, 1, ''),
(16, 49, '172767830249', 41, 1, 10000, 10000, 'credit', 'Add Money', 0, '2024-09-30 12:08:22', '2024-09-30', '2024-09-30 12:08:22', NULL, NULL, 0, 1, ''),
(17, 49, '202409309FEE', 10, 2, 9600, 400, 'debit', 'Order', 0, '2024-09-30 12:08:30', '2024-09-30', '2024-09-30 12:08:30', NULL, NULL, 0, 1, ''),
(18, 48, '172767834448', 42, 1, 15000, 15000, 'credit', 'Add Money', 0, '2024-09-30 12:09:04', '2024-09-30', '2024-09-30 12:09:04', NULL, NULL, 0, 1, ''),
(19, 48, '20240930E635', 11, 2, 6000, 9000, 'debit', 'Order', 0, '2024-09-30 12:09:18', '2024-09-30', '2024-09-30 12:09:18', NULL, NULL, 0, 1, ''),
(20, 48, '20240930C043', 12, 2, 1000, 8000, 'debit', 'Order', 0, '2024-09-30 12:09:32', '2024-09-30', '2024-09-30 12:09:32', NULL, NULL, 0, 1, ''),
(21, 47, '172767842347', 43, 1, 10000, 10000, 'credit', 'Add Money', 0, '2024-09-30 12:10:23', '2024-09-30', '2024-09-30 12:10:23', NULL, NULL, 0, 1, ''),
(22, 47, '20240930D2BE', 13, 2, 3000, 7000, 'debit', 'Order', 0, '2024-09-30 12:10:31', '2024-09-30', '2024-09-30 12:10:31', NULL, NULL, 0, 1, ''),
(23, 47, '202409308CF6', 14, 2, 4200, 2800, 'debit', 'Order', 0, '2024-09-30 12:10:47', '2024-09-30', '2024-09-30 12:10:47', NULL, NULL, 0, 1, ''),
(24, 46, '172767850246', 44, 1, 12000, 12000, 'credit', 'Add Money', 0, '2024-09-30 12:11:42', '2024-09-30', '2024-09-30 12:11:42', NULL, NULL, 0, 1, ''),
(25, 46, '202409306792', 15, 2, 1200, 10800, 'debit', 'Order', 0, '2024-09-30 12:11:50', '2024-09-30', '2024-09-30 12:11:50', NULL, NULL, 0, 1, ''),
(26, 46, '20240930081D', 16, 2, 7200, 3600, 'debit', 'Order', 0, '2024-09-30 12:12:09', '2024-09-30', '2024-09-30 12:12:09', NULL, NULL, 0, 1, ''),
(27, 45, '172767857745', 45, 1, 8000, 8000, 'credit', 'Add Money', 0, '2024-09-30 12:12:57', '2024-09-30', '2024-09-30 12:12:57', NULL, NULL, 0, 1, ''),
(28, 45, '20240930D855', 17, 2, 3400, 4600, 'debit', 'Order', 0, '2024-09-30 12:13:42', '2024-09-30', '2024-09-30 12:13:42', NULL, NULL, 0, 1, ''),
(29, 44, '172767866344', 46, 1, 25000, 25000, 'credit', 'Add Money', 0, '2024-09-30 12:14:23', '2024-09-30', '2024-09-30 12:14:23', NULL, NULL, 0, 1, ''),
(30, 44, '20240930EB9C', 18, 2, 7600, 17400, 'debit', 'Order', 0, '2024-09-30 12:15:00', '2024-09-30', '2024-09-30 12:15:00', NULL, NULL, 0, 1, ''),
(31, 44, '2024093079DE', 19, 2, 2400, 15000, 'debit', 'Order', 0, '2024-09-30 12:15:13', '2024-09-30', '2024-09-30 12:15:13', NULL, NULL, 0, 1, ''),
(32, 44, '202409305423', 20, 2, 2000, 13000, 'debit', 'Order', 0, '2024-09-30 12:15:28', '2024-09-30', '2024-09-30 12:15:28', NULL, NULL, 0, 1, ''),
(33, 43, '172767877243', 47, 1, 15000, 15000, 'credit', 'Add Money', 0, '2024-09-30 12:16:12', '2024-09-30', '2024-09-30 12:16:12', NULL, NULL, 0, 1, ''),
(34, 43, '20240930088B', 21, 2, 3000, 12000, 'debit', 'Order', 0, '2024-09-30 12:16:44', '2024-09-30', '2024-09-30 12:16:44', NULL, NULL, 0, 1, ''),
(35, 43, '202409304763', 22, 2, 600, 11400, 'debit', 'Order', 0, '2024-09-30 12:17:02', '2024-09-30', '2024-09-30 12:17:02', NULL, NULL, 0, 1, ''),
(36, 43, '20240930B295', 23, 2, 6000, 5400, 'debit', 'Order', 0, '2024-09-30 12:17:13', '2024-09-30', '2024-09-30 12:17:13', NULL, NULL, 0, 1, ''),
(37, 61, '172767918061', 48, 1, 8000, 8000, 'credit', 'Add Money', 0, '2024-09-30 12:23:00', '2024-09-30', '2024-09-30 12:23:00', NULL, NULL, 0, 1, ''),
(38, 61, '172767918661', 49, 1, 6000, 14000, 'credit', 'Add Money', 0, '2024-09-30 12:23:06', '2024-09-30', '2024-09-30 12:23:06', NULL, NULL, 0, 1, ''),
(39, 61, '202409302E12', 24, 2, 2400, 11600, 'debit', 'Order', 0, '2024-09-30 12:23:33', '2024-09-30', '2024-09-30 12:23:33', NULL, NULL, 0, 1, ''),
(40, 61, '202409303A3E', 25, 2, 9600, 2000, 'debit', 'Order', 0, '2024-09-30 12:23:45', '2024-09-30', '2024-09-30 12:23:45', NULL, NULL, 0, 1, ''),
(41, 61, '172888613761', 50, 1, 1000, 3000, 'credit', 'Add Money', 0, '2024-10-14 11:38:57', '2024-10-14', '2024-10-14 11:38:57', NULL, NULL, 0, 1, ''),
(42, 61, '20241014F66B', 26, 2, 1200, 1800, 'debit', 'Order', 0, '2024-10-14 11:39:39', '2024-10-14', '2024-10-14 11:39:39', NULL, NULL, 0, 1, ''),
(43, 43, '173268544443', 51, 1, 2000, 7400, 'credit', 'Add Money', 0, '2024-11-27 11:00:44', '2024-11-27', '2024-11-27 11:00:44', NULL, NULL, 0, 1, ''),
(44, 43, '173268544943', 52, 1, 2000, 9400, 'credit', 'Add Money', 0, '2024-11-27 11:00:49', '2024-11-27', '2024-11-27 11:00:49', NULL, NULL, 0, 1, ''),
(45, 43, '173268545043', 53, 1, 2000, 11400, 'credit', 'Add Money', 0, '2024-11-27 11:00:50', '2024-11-27', '2024-11-27 11:00:50', NULL, NULL, 0, 1, ''),
(46, 43, '173268545143', 54, 1, 2000, 13400, 'credit', 'Add Money', 0, '2024-11-27 11:00:51', '2024-11-27', '2024-11-27 11:00:51', NULL, NULL, 0, 1, ''),
(47, 43, '173268545243', 55, 1, 2000, 15400, 'credit', 'Add Money', 0, '2024-11-27 11:00:52', '2024-11-27', '2024-11-27 11:00:52', NULL, NULL, 0, 1, ''),
(48, 43, '173268545243', 56, 1, 2000, 17400, 'credit', 'Add Money', 0, '2024-11-27 11:00:52', '2024-11-27', '2024-11-27 11:00:52', NULL, NULL, 0, 1, ''),
(49, 43, '173268545343', 57, 1, 2000, 19400, 'credit', 'Add Money', 0, '2024-11-27 11:00:53', '2024-11-27', '2024-11-27 11:00:53', NULL, NULL, 0, 1, ''),
(50, 43, '173268545343', 58, 1, 2000, 21400, 'credit', 'Add Money', 0, '2024-11-27 11:00:53', '2024-11-27', '2024-11-27 11:00:53', NULL, NULL, 0, 1, ''),
(51, 43, '173268545343', 59, 1, 2000, 23400, 'credit', 'Add Money', 0, '2024-11-27 11:00:53', '2024-11-27', '2024-11-27 11:00:53', NULL, NULL, 0, 1, ''),
(52, 43, '202411279477', 27, 2, 120, 23280, 'debit', 'Order', 0, '2024-11-27 15:38:17', '2024-11-27', '2024-11-27 15:38:17', NULL, NULL, 0, 1, ''),
(53, 61, '20241203155D', 28, 2, 20, 1780, 'debit', 'Order', 0, '2024-12-03 17:52:37', '2024-12-03', '2024-12-03 17:52:37', NULL, NULL, 0, 1, ''),
(54, 61, '20241203A077', 29, 2, 30, 1750, 'debit', 'Order', 0, '2024-12-03 17:54:14', '2024-12-03', '2024-12-03 17:54:14', NULL, NULL, 0, 1, ''),
(55, 61, '202412037DE6', 30, 2, 470, 1280, 'debit', 'Order', 0, '2024-12-03 17:55:39', '2024-12-03', '2024-12-03 17:55:39', NULL, NULL, 0, 1, ''),
(56, 61, '20241205D27C', 31, 2, 240, 1040, 'debit', 'Order', 0, '2024-12-05 16:01:12', '2024-12-05', '2024-12-05 16:01:12', NULL, NULL, 0, 1, ''),
(57, 61, '173339469661', 60, 1, 1000, 2040, 'credit', 'Add Money', 0, '2024-12-05 16:01:36', '2024-12-05', '2024-12-05 16:01:36', NULL, NULL, 0, 1, ''),
(58, 59, '202412279999', 32, 2, 15, 6335, 'debit', 'Order', 0, '2024-12-27 16:42:29', '2024-12-27', '2024-12-27 16:42:29', NULL, NULL, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_temp_register`
--

CREATE TABLE `user_temp_register` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `state` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending\r\n1=ok\r\n2=reject',
  `ip_address` text NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=video,2=influence',
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `image`, `type`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1735552661.mp4', 1, 1, '2024-12-30 15:27:41', '2024-12-30 15:30:36'),
(2, '1735552661.mp4', 1, 1, '2024-12-30 15:27:41', '2024-12-30 15:30:36'),
(3, '1735552661.mp4', 1, 1, '2024-12-30 15:27:41', '2024-12-30 15:30:36'),
(4, '1735552661.mp4', 1, 1, '2024-12-30 15:27:41', '2024-12-30 15:30:36'),
(5, '1735553774.mp4', 2, 1, '2024-12-30 15:46:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `warning_asm`
--

CREATE TABLE `warning_asm` (
  `id` int(11) NOT NULL,
  `nsm_id` int(11) DEFAULT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_asm`
--

INSERT INTO `warning_asm` (`id`, `nsm_id`, `rsm_id`, `asm_id`, `message`, `addeddate`, `modifieddate`) VALUES
(1, 10, 33, 35, 'sadsad sdfca fa f swd sa ', '2024-12-16 12:19:24', '2024-12-18 15:02:01'),
(2, 10, 0, 35, 'asdsdsad  dfdfda', '0000-00-00 00:00:00', '2024-12-18 15:01:51'),
(3, 10, 0, 34, '1 month notice', '0000-00-00 00:00:00', '2024-12-31 10:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `warning_nsm`
--

CREATE TABLE `warning_nsm` (
  `id` int(11) NOT NULL,
  `nsm_id` int(11) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_nsm`
--

INSERT INTO `warning_nsm` (`id`, `nsm_id`, `city`, `state`, `message`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 10, 'sadad', 'asdsad', 'asd xd vsdfd f', 0, '2024-12-16 12:02:00', '2024-12-16 16:42:39'),
(2, 10, '', '', 'daaAS Asda sdf defdf df ', 0, '2024-12-16 16:39:18', '2024-12-16 16:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `warning_rsm`
--

CREATE TABLE `warning_rsm` (
  `id` int(11) NOT NULL,
  `nsm_id` int(11) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_rsm`
--

INSERT INTO `warning_rsm` (`id`, `nsm_id`, `rsm_id`, `message`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 10, 33, 'asdad asdad dfg dfg', 0, '0000-00-00 00:00:00', '2024-12-16 16:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `warning_so`
--

CREATE TABLE `warning_so` (
  `id` int(11) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `so_id` text NOT NULL,
  `message` text NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warning_so`
--

INSERT INTO `warning_so` (`id`, `rsm_id`, `asm_id`, `so_id`, `message`, `addeddate`, `modifieddate`) VALUES
(1, 33, 35, '38', 'sadsad sdfca fa f swd sa   sad sad', '2024-12-16 12:41:16', '2024-12-16 17:18:59'),
(2, 33, 35, '39', 'sadf asdsad', '0000-00-00 00:00:00', '2024-12-16 17:19:08'),
(3, 33, 0, '36', 'asdsad ', '0000-00-00 00:00:00', '2024-12-18 15:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `web_contact`
--

CREATE TABLE `web_contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `state` text NOT NULL,
  `query_type` text NOT NULL,
  `curent_disr` text NOT NULL,
  `message` text NOT NULL,
  `addeddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_contact`
--

INSERT INTO `web_contact` (`id`, `name`, `email`, `mobile`, `state`, `query_type`, `curent_disr`, `message`, `addeddate`) VALUES
(1, 'Logen', 'logen@gmail.com', '123654789', 'DELHI', 'Superstockist', 'North Delhi', 'ddd', '2024-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`id`, `content`, `name`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '<iframe class=\"w-100\" width=\"100%\" height=\"383\" src=\"https://www.youtube.com/embed/MjsyvfVzO_U\"\r\n                title=\"Lays Flaming Hot :15 HD\" frameborder=\"0\"\r\n                allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n                referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'BUNZZ | Chips Cream Onion 14 GM', 1, '2024-12-30 15:39:15', '2024-12-30 15:40:32'),
(2, '<iframe class=\"w-100\" width=\"100%\" height=\"383\" src=\"https://www.youtube.com/embed/MjsyvfVzO_U\"\r\n                title=\"Lays Flaming Hot :15 HD\" frameborder=\"0\"\r\n                allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n                referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'BUNZZ | Chips Cream Onion 14 GM', 1, '2024-12-30 15:39:15', '2024-12-30 15:40:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_records`
--
ALTER TABLE `activity_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_temp_cart`
--
ALTER TABLE `add_to_temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_images`
--
ALTER TABLE `all_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupen_code`
--
ALTER TABLE `coupen_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupen_product_wise`
--
ALTER TABLE `coupen_product_wise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer_walletrc`
--
ALTER TABLE `distributer_walletrc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalorder`
--
ALTER TABLE `finalorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_records`
--
ALTER TABLE `kyc_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_creation`
--
ALTER TABLE `ledger_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlytarget`
--
ALTER TABLE `monthlytarget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_coupon`
--
ALTER TABLE `order_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raise_asm_to_rsm`
--
ALTER TABLE `raise_asm_to_rsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raise_distributer_to_so`
--
ALTER TABLE `raise_distributer_to_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raise_issue`
--
ALTER TABLE `raise_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raise_so_to_asm`
--
ALTER TABLE `raise_so_to_asm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_request`
--
ALTER TABLE `recharge_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_rsm_to_asm`
--
ALTER TABLE `target_rsm_to_asm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_temp_register`
--
ALTER TABLE `user_temp_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_asm`
--
ALTER TABLE `warning_asm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_nsm`
--
ALTER TABLE `warning_nsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_rsm`
--
ALTER TABLE `warning_rsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_so`
--
ALTER TABLE `warning_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_contact`
--
ALTER TABLE `web_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_records`
--
ALTER TABLE `activity_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `add_to_temp_cart`
--
ALTER TABLE `add_to_temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `all_images`
--
ALTER TABLE `all_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `coupen_code`
--
ALTER TABLE `coupen_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupen_product_wise`
--
ALTER TABLE `coupen_product_wise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `distributer_walletrc`
--
ALTER TABLE `distributer_walletrc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finalorder`
--
ALTER TABLE `finalorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kyc_records`
--
ALTER TABLE `kyc_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ledger_creation`
--
ALTER TABLE `ledger_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `monthlytarget`
--
ALTER TABLE `monthlytarget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_coupon`
--
ALTER TABLE `order_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `raise_asm_to_rsm`
--
ALTER TABLE `raise_asm_to_rsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `raise_distributer_to_so`
--
ALTER TABLE `raise_distributer_to_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `raise_issue`
--
ALTER TABLE `raise_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `raise_so_to_asm`
--
ALTER TABLE `raise_so_to_asm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recharge_request`
--
ALTER TABLE `recharge_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `target_rsm_to_asm`
--
ALTER TABLE `target_rsm_to_asm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_temp_register`
--
ALTER TABLE `user_temp_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warning_asm`
--
ALTER TABLE `warning_asm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warning_nsm`
--
ALTER TABLE `warning_nsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warning_rsm`
--
ALTER TABLE `warning_rsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warning_so`
--
ALTER TABLE `warning_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_contact`
--
ALTER TABLE `web_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
