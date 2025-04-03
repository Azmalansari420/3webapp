-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 10:49 AM
-- Server version: 5.7.31
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aduetechnologies_watershooter`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `mobile`, `subject`, `message`, `addeddate`) VALUES
(6, 9, 'Azmal', 'azmal@gmail.com', '1234567899', 'Enquiry', 'testet', '2024-06-24 06:10:00'),
(7, 11, 'Client Name jj', 'client@gmail.com', '1122334455', 'Enquiry', 'testr', '2024-06-25 04:01:00'),
(8, 13, 'admin@gmail.com', 'info@compony.in', '1234567890', 'Test', 'Test', '0000-00-00 00:00:00'),
(9, 11, 'Client Name jj', 'client@gmail.com', '1122334455', 'test', 'tewsrdy huuuu', '0000-00-00 00:00:00'),
(10, 11, 'test ', 'client@gmail.com', '1122334455', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `from_date` text NOT NULL,
  `to_date` text NOT NULL,
  `message` text NOT NULL,
  `addeddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`id`, `user_id`, `name`, `email`, `mobile`, `from_date`, `to_date`, `message`, `addeddate`) VALUES
(1, '13', 'admin@gmail.com', 'info@compony.in', '1234567890', '2021-02-22', '2024-05-22', 'ddd', '0000-00-00'),
(2, '13', 'admin@gmail.com', 'info@compony.in', '1234567890', '2021-02-22', '2024-05-22', 'ddd', '2024-07-18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `device_id`, `ip_address`, `login_date`, `login_time`, `username`, `password`, `logout_date`, `logout_time`, `login_status`) VALUES
(8, '2', '6679487012098::1', '::1', '2024-06-24', '15:50:32', 'admin', 'admin', '2024-06-25', '17:43:37', 1),
(9, '2', '667a5863396a6::1', '::1', '2024-06-25', '11:10:51', 'admin', 'admin', '2024-06-25', '17:43:37', 1),
(10, '2', '667ab48c2a456::1', '::1', '2024-06-25', '17:44:04', 'admin', 'admin', '2024-06-26', '12:07:12', 1),
(11, '2', '667ab4db6564e::1', '::1', '2024-06-25', '17:45:23', 'admin', 'admin', '2024-06-26', '12:07:12', 1),
(12, '2', '667ab5645aa4a::1', '::1', '2024-06-25', '17:47:40', 'admin', 'admin', '2024-06-26', '12:07:12', 1),
(13, '2', '667bb70d7712045.249.86.158', '45.249.86.158', '2024-06-26', '12:07:01', 'admin', 'admin', '2024-06-26', '12:07:12', 1),
(14, '2', '66827451497b945.249.85.249', '45.249.85.249', '2024-07-01', '14:48:09', 'admin', 'admin', '2024-07-01', '14:48:24', 1),
(15, '3', '669649842f709122.161.49.142', '122.161.49.142', '2024-07-16', '15:50:52', 'azmal', 'azmal', '2024-07-16', '15:55:16', 1),
(16, '3', '6698a78336324122.161.49.142', '122.161.49.142', '2024-07-18', '10:56:27', 'azmal', 'azmal', NULL, NULL, 0),
(17, '3', '6698baf2b6f2a122.161.49.142', '122.161.49.142', '2024-07-18', '12:19:22', 'azmal', 'azmal', NULL, NULL, 0),
(18, '2', '669f9e2f5ac68122.161.51.96', '122.161.51.96', '2024-07-23', '17:42:31', 'admin', 'admin', '2024-07-23', '18:13:18', 1),
(19, '2', '669fa4660572c122.162.145.34', '122.162.145.34', '2024-07-23', '18:09:02', 'admin', 'admin', '2024-07-23', '18:13:18', 1),
(20, '2', '66a09d7a65645122.161.51.96', '122.161.51.96', '2024-07-24', '11:51:46', 'admin', 'admin', '2024-07-24', '12:17:53', 1),
(21, '2', '66b0aace92991122.161.50.18', '122.161.50.18', '2024-08-05', '16:04:54', 'admin', 'admin', NULL, NULL, 0),
(22, '2', '66b0ae9c994d4122.161.49.229', '122.161.49.229', '2024-08-05', '16:21:08', 'admin', 'admin', NULL, NULL, 0),
(23, '2', '66b4b6267a1ac122.161.53.148', '122.161.53.148', '2024-08-08', '17:42:22', 'admin', 'admin', NULL, NULL, 0),
(24, '2', '66b4b80029ea1122.161.53.148', '122.161.53.148', '2024-08-08', '17:50:16', 'admin', 'admin', NULL, NULL, 0),
(25, '2', '66b4b828efeeb122.161.53.148', '122.161.53.148', '2024-08-08', '17:50:56', 'admin', 'admin', NULL, NULL, 0),
(26, '2', '66b4b9c809b32122.176.81.22', '122.176.81.22', '2024-08-08', '17:57:52', 'admin', 'admin', NULL, NULL, 0),
(27, '2', '66b5b2996e145::1', '::1', '2024-08-09', '11:39:29', 'admin', 'admin', NULL, NULL, 0),
(28, '2', '66c074fff3032103.199.225.182', '103.199.225.182', '2024-08-17', '15:31:35', 'admin', 'admin', NULL, NULL, 0),
(29, '2', '673733580aa1945.249.86.156', '45.249.86.156', '2024-11-15', '17:11:12', 'admin', 'admin', NULL, NULL, 0),
(30, '2', '6737409ae9e4045.249.86.156', '45.249.86.156', '2024-11-15', '18:07:46', 'admin', 'admin', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` int(1) NOT NULL,
  `ip_address` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `device_id` text COLLATE utf8mb4_unicode_520_ci,
  `firebase_token` text COLLATE utf8mb4_unicode_520_ci,
  `access_token` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `device` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(10) NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `role`, `ip_address`, `date`, `time`, `device_id`, `firebase_token`, `access_token`, `device`, `status`, `password`) VALUES
(12, '10', 1, '::1', '2024-06-25', '18:21:30', '123456', '123456', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOTRURU5LYTFsWVVteFlNMUp3WWxkVmFVOXBTWGxOUkVrd1RGUkJNa3hVU1RGSlJFVTBUMnBKZUU5cVRYZEphWGRwWTIwNWMxcFRTVFpKYWtWcFRFTkthMXBZV25CWk1sWm1ZVmRSYVU5cFNYaE5hazB3VGxSWmFXWlJQVDA9', '', 1, '123456'),
(13, '10', 1, '::1', '2024-06-25', '18:24:03', '667abdc37d052::1', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUVdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZPYVVselNXMW9kbVJZU25wSmFtOTRURU5LYTFsWVVteFlNMUp3WWxkVmFVOXBTWGxOUkVrd1RGUkJNa3hVU1RGSlJFVTBUMnBKTUU5cVFYcEphWGRwWTIwNWMxcFRTVFpKYWtWcFRFTkthMXBZV25CWk1sWm1ZVmRSYVU5cFNUSk9hbVJvV1cxU2FrMTZaR3ROUkZWNVQycHZlRWx1TUQwPQ==', '', 1, '123456'),
(14, '9', 1, '45.249.85.238', '2024-06-28', '14:42:21', 'f9849d1d572196a2', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUlpkRTFxWjJkTlZGRTJUa1JKTmsxcVJXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtsdFdUVlBSRkUxV2tSR2EwNVVZM2xOVkdzeVdWUkphV1pSUFQwPQ==', '', 1, '123456'),
(15, '9', 1, '45.249.85.238', '2024-06-28', '15:22:26', 'f9849d1d572196a2', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUlpkRTFxWjJkTlZGVTJUV3BKTmsxcVdXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtsdFdUVlBSRkUxV2tSR2EwNVVZM2xOVkdzeVdWUkphV1pSUFQwPQ==', '', 1, '123456'),
(16, '9', 1, '45.249.87.154', '2024-07-03', '11:52:34', 'f9849d1d572196a2', 'eYycHeiASfCcrVSZH-3owV:APA91bGn9jUJUZ7IuvvfcVDCT3h49qog5-LZjyyZmdnO94VZQ2nQcsnVy14wANqsVCVbPgvTndcgk0Qa_9bGGgWXSPe4eWmSF-84pj5eA94YXXvAsTgLUMNSAhCsICO-oSWooZ8wLDyV', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFFVFdkTlZFVTJUbFJKTmsxNlVXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtsdFdUVlBSRkUxV2tSR2EwNVVZM2xOVkdzeVdWUkphV1pSUFQwPQ==', '', 1, '123456'),
(17, '13', 1, '122.161.49.142', '2024-07-16', '15:24:07', '898797', '56464', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVV1dkTlZGVTJUV3BSTmsxRVkybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVp6VlBSR00xVG5sS09RPT0=', '', 1, 'admin'),
(18, '13', 1, '45.249.86.5', '2024-07-16', '15:30:47', '669644c0d46a545.249.86.5', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVV1dkTlZGVTJUWHBCTms1RVkybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWRmt3VGtkTmQxcEVVVEpaVkZVd1RsTTBlVTVFYTNWUFJGbDFUbE5LT1E9PQ==', '', 1, 'admin'),
(19, '13', 1, '45.249.86.5', '2024-07-16', '15:32:06', '669645121d2d945.249.86.5', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVV1dkTlZGVTJUWHBKTmsxRVdXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWRmt3VGxSRmVVMVhVWGxhUkdzd1RsTTBlVTVFYTNWUFJGbDFUbE5LT1E9PQ==', '', 1, 'admin'),
(20, '13', 1, '45.249.86.5', '2024-07-16', '15:48:58', '66964862500b345.249.86.5', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVV1dkTlZGVTJUa1JuTms1VVoybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWRmt3VDBSWmVVNVVRWGRaYWswd1RsTTBlVTVFYTNWUFJGbDFUbE5LT1E9PQ==', '', 1, 'admin'),
(21, '9', 1, '122.161.49.142', '2024-07-18', '10:57:03', '38e300f49000890c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVWjJkTlZFRTJUbFJqTmsxRVRXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVRUUmFWRTEzVFVkWk1FOVVRWGROUkdjMVRVZE5hV1pSUFQwPQ==', '', 1, '123456'),
(22, '9', 1, '122.161.49.142', '2024-07-18', '11:03:04', '898797', '56464', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVWjJkTlZFVTJUVVJOTmsxRVVXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVp6VlBSR00xVG5sS09RPT0=', '', 1, '123456'),
(23, '13', 1, '122.161.49.142', '2024-07-18', '12:21:49', '6698ba2fec23f122.161.49.142', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFVWjJkTlZFazJUV3BGTms1RWEybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWR2hwV1ZSS2JWcFhUWGxOTWxsNFRXcEpkVTFVV1hoTWFsRTFUR3BGTUUxcFNqaz0=', '', 1, 'admin'),
(24, '13', 1, '122.161.51.96', '2024-07-23', '16:38:10', '669f8f121b8be122.161.51.96', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFxVFdkTlZGazJUWHBuTmsxVVFXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWMWswV21wRmVVMVhTVFJaYlZWNFRXcEpkVTFVV1hoTWFsVjRUR3ByTWtsdU1EMD0=', '', 1, 'admin'),
(25, '13', 1, '122.161.51.96', '2024-07-23', '16:39:31', '669f8f57c4183122.161.51.96', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFxVFdkTlZGazJUWHByTmsxNlJXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlBWMWswV21wVk0xbDZVWGhQUkUxNFRXcEpkVTFVV1hoTWFsVjRUR3ByTWtsdU1EMD0=', '', 1, 'admin'),
(26, '16', 1, '122.162.145.34', '2024-07-23', '17:43:50', '3beb7441b3f63a9c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVV1dsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxU2RtUnRWbmxOVkVGNFNXbDNhV0ZIT1RGamJrMXBUMnBGYzBsdFVtaGtSMVptWkVkc2RGcFRTVFpKYWtsM1RXcFJkRTFFWTNSTmFrMW5UVlJqTms1RVRUWk9WRUZwVEVOS2VXSXllR3hKYW05cFRWTkpjMGx0VW14a2JXeHFXbFk1Y0ZwRFNUWkphazVwV2xkSk0wNUVVWGhaYWs1dFRtcE9hRTlYVFdsbVVUMDk=', '', 1, 'dover101'),
(27, '13', 1, '122.161.51.96', '2024-07-24', '10:45:37', '66a08df56caf7122.161.51.96', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFxVVdkTlZFRTJUa1JWTmsxNlkybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlpWRUUwV2tkWk1VNXRUbWhhYW1ONFRXcEpkVTFVV1hoTWFsVjRUR3ByTWtsdU1EMD0=', '', 1, 'admin'),
(28, '13', 1, '122.161.51.96', '2024-07-24', '11:47:30', '66a09c783301b122.161.51.96', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTFxVVdkTlZFVTJUa1JqTmsxNlFXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlpWRUUxV1hwak5FMTZUWGROVjBsNFRXcEpkVTFVV1hoTWFsVjRUR3ByTWtsdU1EMD0=', '', 1, 'admin'),
(29, '13', 1, '122.161.52.104', '2024-07-30', '11:19:46', '66a87eeff23f4122.161.52.104', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUmpkRTE2UVdkTlZFVTJUVlJyTms1RVdXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlpWR2N6V2xkV2JWcHFTWHBhYWxGNFRXcEpkVTFVV1hoTWFsVjVUR3BGZDA1RFNqaz0=', '', 1, 'admin'),
(30, '17', 1, '110.224.163.199', '2024-08-02', '15:31:55', '109fb2714a26ee2a', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVWTJsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTZVVEZSUTBselNXMW9kbVJZU25wSmFtOTRURU5LYTFsWVVteFlNMUp3WWxkVmFVOXBTWGxOUkVrd1RGUkJORXhVUVhsSlJFVXhUMnBOZUU5cVZURkphWGRwWTIwNWMxcFRTVFpKYWtWcFRFTkthMXBZV25CWk1sWm1ZVmRSYVU5cFNYaE5SR3h0V1dwSk0wMVVVbWhOYWxwc1dsUkthRWx1TUQwPQ==', '', 1, '12345@'),
(31, '13', 1, '122.161.53.148', '2024-08-08', '17:49:57', '66b4b7e1437d5122.161.53.148', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUm5kRTFFWjJkTlZHTTJUa1JyTms1VVkybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlphbEpwVGpKVmVFNUVUVE5hUkZWNFRXcEpkVTFVV1hoTWFsVjZUR3BGTUU5RFNqaz0=', '', 1, 'admin'),
(32, '13', 1, '122.161.53.148', '2024-08-08', '17:50:40', '66b4b80dd54a5122.161.53.148', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUm5kRTFFWjJkTlZHTTJUbFJCTms1RVFXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlphbEpwVDBSQ2ExcEVWVEJaVkZWNFRXcEpkVTFVV1hoTWFsVjZUR3BGTUU5RFNqaz0=', '', 1, 'admin'),
(33, '11', 2, '122.161.53.148', '2024-08-08', '17:53:42', '66b4b8c898603122.161.53.148', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVFMFRGUkJORWxFUlROUGFsVjZUMnBSZVVscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1dFNUQlphbWhxVDBSck5FNXFRWHBOVkVsNVRHcEZNazFUTkRGTmVUUjRUa1JuYVdaUlBUMD0=', '', 1, '123'),
(34, '11', 2, '122.161.53.148', '2024-08-08', '18:01:32', '66b4ba900698d122.161.53.148', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVFMFRGUkJORWxFUlRSUGFrRjRUMnBOZVVscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1dFNUQlpiVVUxVFVSQk1rOVVhR3ROVkVsNVRHcEZNazFUTkRGTmVUUjRUa1JuYVdaUlBUMD0=', '', 1, '123'),
(35, '11', 2, '::1', '2024-08-09', '12:08:39', '66b5b9682ed9b::1', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVFMFRGUkJOVWxFUlhsUGFrRTBUMnBOTlVscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1dFNURlphbXN5VDBSS2JGcEViR2xQYW05NFNXNHdQUT09', '', 1, '123'),
(36, '9', 1, '45.249.85.77', '2024-08-09', '12:31:46', '66b5beaee02c445.249.85.77', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUm5kRTFFYTJkTlZFazJUWHBGTms1RVdXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlphbFpwV2xkR2JGcFVRWGxaZWxFd1RsTTBlVTVFYTNWUFJGVjFUbnBqYVdaUlBUMD0=', '', 1, '123456'),
(37, '11', 2, '45.249.85.77', '2024-08-09', '12:35:16', '66b5bfa43516f45.249.85.77', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVFMFRGUkJOVWxFUlhsUGFrMHhUMnBGTWtscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1dFNURlpiVnBvVGtSTk1VMVVXbTFPUkZWMVRXcFJOVXhxWnpGTWFtTXpTVzR3UFE9PQ==', '', 1, '123'),
(38, '11', 2, '122.161.51.229', '2024-08-17', '16:08:40', '38e300f49000890c', 'dfEYnGQ6S3CrbYvvE63p83:APA91bFtvCAZjkBxC6JmoZctdkHHfkQmzEITMgXFGBUi2_n6oKAKq2p1wHwUWyJgGuQ2x5biN0H-3q3CZsgYlLAHhd0yqBAbqofxR6LsXtlKLKr8RmmzF2ehKHy0ttKrEBgUXjNJ4pJ4', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVFMFRGUkZNMGxFUlRKUGFrRTBUMnBSZDBscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKZWs5SFZYcE5SRUp0VGtScmQwMUVRVFJQVkVKcVNXNHdQUT09', '', 1, '123'),
(39, '9', 1, '122.161.51.229', '2024-08-17', '16:09:12', '66c07dc272559122.161.51.229', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTlUU1hOSmJrSm9Zek5PTTJJelNtdEphbTlwVFZSSmVrNUVWVEpKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUm5kRTFVWTJkTlZGazJUVVJyTmsxVVNXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlpla0V6V2tkTmVVNTZTVEZPVkd0NFRXcEpkVTFVV1hoTWFsVjRUR3BKZVU5VFNqaz0=', '', 1, '123456'),
(40, '13', 1, '103.199.225.182', '2024-08-17', '18:23:12', '66c09d2d096ab103.199.225.182', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRVUm5kRTFVWTJkTlZHYzJUV3BOTmsxVVNXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUSlpla0UxV2tSS2EwMUVhekpaVjBsNFRVUk5kVTFVYXpWTWFrbDVUbE0wZUU5RVNXbG1VVDA5', '', 1, 'admin'),
(41, '13', 1, '45.249.86.156', '2024-11-15', '17:10:28', '673733158411d45.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRWUkZkRTFVVldkTlZHTTJUVlJCTmsxcVoybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUTk5lbU42VFhwRk1VOUVVWGhOVjFFd1RsTTBlVTVFYTNWUFJGbDFUVlJWTWtsdU1EMD0=', '', 1, 'admin'),
(42, '11', 2, '45.249.86.156', '2024-11-15', '18:02:14', '67373f469d8a345.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVWNFRGUkZNVWxFUlRSUGFrRjVUMnBGTUVscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1NlRUTk5NbGt3VG1wc2EwOUhSWHBPUkZWMVRXcFJOVXhxWnpKTWFrVXhUbWxLT1E9PQ==', '', 1, '123'),
(43, '13', 1, '45.249.86.156', '2024-11-15', '18:04:02', '67373fb0410b645.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRWUkZkRTFVVldkTlZHYzJUVVJSTmsxRVNXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUTk5lbU42V20xSmQwNUVSWGRaYWxrd1RsTTBlVTVFYTNWUFJGbDFUVlJWTWtsdU1EMD0=', '', 1, 'admin'),
(44, '13', 1, '45.249.86.156', '2024-11-15', '18:05:51', '67373fc66c4d145.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRWUkZkRTFVVldkTlZHYzJUVVJWTms1VVJXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUTk5lbU42V20xTk1rNXRUVEJhUkVVd1RsTTBlVTVFYTNWUFJGbDFUVlJWTWtsdU1EMD0=', '', 1, 'admin'),
(45, '13', 1, '45.249.86.156', '2024-11-15', '18:11:07', '673741610651245.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRWUkZkRTFVVldkTlZHYzJUVlJGTmsxRVkybE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVdUTk5lbU13VFZSWmVFMUVXVEZOVkVrd1RsTTBlVTVFYTNWUFJGbDFUVlJWTWtsdU1EMD0=', '', 1, 'admin'),
(46, '11', 2, '45.249.86.156', '2024-11-15', '18:11:49', '67374169cd17545.249.86.156', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVUldsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1dwRmVVMTVTWE5KYldoMlpGaEtla2xxYjNoTVEwcHJXVmhTYkZnelVuQmlWMVZwVDJsSmVVMUVTVEJNVkVWNFRGUkZNVWxFUlRSUGFrVjRUMnBSTlVscGQybGpiVGx6V2xOSk5rbHFTV2xNUTBwcldsaGFjRmt5Vm1aaFYxRnBUMmxKTWs1NlRUTk9SRVV5VDFkT2EwMVVZekZPUkZWMVRXcFJOVXhxWnpKTWFrVXhUbWxLT1E9PQ==', '', 1, '123'),
(47, '13', 1, '122.161.52.105', '2024-11-16', '10:47:13', '38e300f49000890c', '', 'WlhsS01XTXlWbmxZTW14clNXcHZhVTFVVFdsTVEwcDNXVmhPZW1ReU9YbGFRMGsyU1cxR2EySlhiSFZKYVhkcFlVYzVNV051VFdsUGFrVnpTVzFTYUdSSFZtWmtSMngwV2xOSk5rbHFTWGROYWxGMFRWUkZkRTFVV1dkTlZFRTJUa1JqTmsxVVRXbE1RMHA1WWpKNGJFbHFiMmxOVTBselNXMVNiR1J0YkdwYVZqbHdXa05KTmtscVRUUmFWRTEzVFVkWk1FOVVRWGROUkdjMVRVZE5hV1pSUFQwPQ==', '', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(150) DEFAULT NULL,
  `meta_title` text,
  `meta_auther` varchar(150) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `slug` text,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text,
  `is_delete` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_auther`, `meta_keyword`, `meta_description`, `slug`, `add_date_time`, `update_date_time`, `update_history`, `is_delete`, `status`, `type`) VALUES
(9, NULL, NULL, NULL, NULL, NULL, 'helloo', NULL, NULL, NULL, NULL, NULL, 0),
(10, NULL, NULL, NULL, NULL, NULL, 'welcome', NULL, NULL, NULL, NULL, NULL, 0),
(11, NULL, NULL, NULL, NULL, NULL, 'xyz-compony', NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, NULL, NULL, NULL, NULL, 'client-name', NULL, NULL, NULL, NULL, NULL, 0),
(13, NULL, NULL, NULL, NULL, NULL, 'yesy', NULL, NULL, NULL, NULL, NULL, 0),
(14, NULL, NULL, NULL, NULL, NULL, 'azmal', NULL, NULL, NULL, NULL, NULL, 0),
(15, NULL, NULL, NULL, NULL, NULL, 'admingmailcom', NULL, NULL, NULL, NULL, NULL, 0),
(16, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `slug`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'helloo', 'helloo', 'test ing\r\n\r\n', 1, '2024-06-25 14:59:19', '2024-06-25 14:59:35'),
(2, 'welcome', 'welcome', 'testing', 1, '2024-06-25 15:02:28', '0000-00-00 00:00:00'),
(3, 'test', 'test', 'testx', 1, '2024-08-08 17:52:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=user,2=client',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` int(11) NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adhar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `client_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant_capacity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opratername` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `role`, `image`, `name`, `slug`, `email`, `mobile`, `alt_mobile`, `password`, `qualification`, `adhar`, `dob`, `gender`, `client_name`, `location`, `plant_capacity`, `opratername`, `status`, `addeddate`) VALUES
(9, 1, 'user.png', 'Azmal', 0, 'azmal@gmail.com', '1234567899', '', '123456', 'BA Pass', '123654789147', '25/07/2022', 1, 'tewt', 'tew', 'wetw', '2', 1, '0000-00-00 00:00:00'),
(10, 1, '', 'xyz Compony', 0, 'info@compony.in', '9584712015', '', '123456', 'dasfdf', 'dsfsdf', '32/01/1887', 2, 'Azmal ', 'Delhi', 'Arizona', '2', 1, '2024-06-25 15:29:40'),
(11, 2, '', 'Client Name jj', 0, 'client@gmail.com', '1122334455', '', '123', 'undefined', 'undefined', 'undefined', 0, '', '', '', '', 1, '2024-06-25 15:44:31'),
(12, 1, 'user.png', 'Yesy', 0, 'test@gmail.com', '123456', '', '123456', 'Ba', '637372882828', '2024-06-28', 1, 'test', 'test', 'test', '2', 1, '0000-00-00 00:00:00'),
(13, 1, 'user.png', 'admin@gmail.com', 0, 'info@compony.in', '1234567890', '546456', 'admin', '10th Pass', '78945612313', '1999-03-12', 1, '', '', '', '1', 1, '0000-00-00 00:00:00'),
(14, 1, 'user.png', 'azmal', 0, 'info@compony.in', '234324324', '234324', 'azmal', 'dsfdsf', '78945612313', '19959-02-11', 0, '', '', '', '', 1, '0000-00-00 00:00:00'),
(15, 1, 'user.png', 'Rohit', 0, 'pras@gmail.com', '88889', '67788', 'dover101', 'MTech', '67', '2024-04-10', 0, '', '', '', '', 1, '0000-00-00 00:00:00'),
(16, 1, 'user.png', 'Rahul', 0, 'Ty', '9555901464', '78', 'dover101', 'Hh', '67', '2024-07-15', 1, '', '', '', '', 1, '0000-00-00 00:00:00'),
(17, 1, 'user.png', 'Giyan', 0, 'sourabhkori@gmail.co', '9991234567', '', '12345@', '', '', '', 0, '', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` blob NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `name`, `content`, `logo`, `mobile`, `alt_mobile`, `email`, `alt_email`, `address`, `facebook`, `twitter`, `instagram`, `youtube`, `map`) VALUES
(1, '', '', '1719224441.png', '9856472360', '9586741023', 'email@gmail.com', 'altemail@gmail.com', 'your address', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30767295.116023116!2d60.946027684017714!3d19.722272265144735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1713167102172!5m2!1sen!2sin\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(2, 'Privacy Policy', 0x3c703e5072697661637920506f6c6963793c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e206868683c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a, '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Term & Condition', 0x3c703e5465726d2026616d703b20436f6e646974696f6e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e207465737474743c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f722e3c2f703e0d0a, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1689234613.jpg', 1, '2023-07-13 01:12:44', '2023-07-13 01:20:13'),
(2, '1689234619.jpg', 1, '2023-07-13 01:20:19', '0000-00-00 00:00:00'),
(3, '1689234623.jpg', 1, '2023-07-13 01:20:23', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `slug`, `table_name`, `page_name`, `controller_name`, `p_id`) VALUES
(290, 'helloo', 'notification', '', 'notification', 1),
(291, 'welcome', 'notification', '', 'notification', 2),
(293, 'xyz-compony', 'registration', '', 'registration', 10),
(295, 'client-name', 'registration', '', 'clientregistration', 11),
(296, 'yesy', 'registration', '', 'registration', 12),
(297, 'azmal', 'registration', '', 'registration', 9),
(298, 'admingmailcom', 'registration', '', 'registration', 13),
(299, 'test', 'notification', '', 'notification', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `martial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash_key` text COLLATE utf8mb4_unicode_ci,
  `hash_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `mobile`, `address`, `image`, `gender`, `dob`, `martial`, `age`, `country`, `state`, `hash_key`, `hash_expiry`) VALUES
(1, 'Azmal', 'Ansari', 'azmal123', 'azmal123', 'admin@gmail.com', '46546', 'sfsfsdf sdefdsfs fsdf sdf', 'user2.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'elhi', NULL, NULL),
(2, 'Admin', 'Admin', 'admin', 'admin', 'admin1@gmail.com', '95822980123', 'delhi', '1677049590.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL),
(3, 'Wolverine', 'logen', 'azmal', 'azmal', 'wolverine@gmail.com', '897989', 'sfsfsdf sdefdsfs fsdf sdf', 'user3.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `water_form`
--

CREATE TABLE `water_form` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=STP,2=ETP,3=WTP,4=Other',
  `user_id` int(11) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_meter_inlet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_meter_outlet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intel_para_ph` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intel_para_temprature` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intel_para_tds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_srp_sewage` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=ok,2=not ok',
  `equipment_stp_air` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=ok,2=not ok',
  `equipment_recirculation` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=ok,2=not ok',
  `equipment_filterfeed` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=ok,2=not ok',
  `equipment_ok` text COLLATE utf8mb4_unicode_ci,
  `equipment_notok` text COLLATE utf8mb4_unicode_ci,
  `chemical_sludge_sodium` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemical_sludge_polymer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemical_sludge_other` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemical_sludge_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` date NOT NULL,
  `water_intel_para_softenerplant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_equipmentcon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_transfer_pump` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_filterfeed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_filter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_softener_vessel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_chemical` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_intel_para_salt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_equipment_rofeedpump` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_equipment_rohighpressure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_equipment_mcp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_equipment_dosingpump` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_chemical_sludge_acid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_chemical_sludge_alkali` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_chemical_sludge_hypo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_chemical_sludge_caustic` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_form`
--

INSERT INTO `water_form` (`id`, `type`, `user_id`, `date`, `flow_meter_inlet`, `flow_meter_outlet`, `intel_para_ph`, `intel_para_temprature`, `intel_para_tds`, `equipment_srp_sewage`, `equipment_stp_air`, `equipment_recirculation`, `equipment_filterfeed`, `equipment_ok`, `equipment_notok`, `chemical_sludge_sodium`, `chemical_sludge_polymer`, `chemical_sludge_other`, `chemical_sludge_date`, `status`, `addeddate`, `water_intel_para_softenerplant`, `water_intel_para_equipmentcon`, `water_intel_para_transfer_pump`, `water_intel_para_filterfeed`, `water_intel_para_filter`, `water_intel_para_softener_vessel`, `water_intel_para_chemical`, `water_intel_para_salt`, `water_equipment_rofeedpump`, `water_equipment_rohighpressure`, `water_equipment_mcp`, `water_equipment_dosingpump`, `water_chemical_sludge_acid`, `water_chemical_sludge_alkali`, `water_chemical_sludge_hypo`, `water_chemical_sludge_caustic`) VALUES
(27, 1, 16, '22 July', '123', '126', '6', '34', '', '1', '1', '2', '1', 'false', 'false', '4 kg', '2 kg', 'DAP 2 kg,Urea 3 kg,DAP 2 kg,Urea 3 kg,DAP 2 kg,Urea 3 kg', '2024-08-08', 1, '2024-08-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 3, 13, '2025-05-22', 'qwe', 'qweq', 'we', 'qwe', 'qwe', '1', '1', '1', '1', 'false', 'false', 'qwe', 'qwe', 'qwewqe', '2024-08-09', 1, '2024-08-06', 'wqe', 'qwe', '', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '1', '1', '1', '1', 'qwe', 'qwe', 'qwe', 'qwe'),
(29, 3, 13, '2019-12-05', '23', 'ewr', 'wer', 'werewr', '234', '2', '1', '1', '2', 'false', 'false', 'wer ew', 'we rewr', 'w erwe, werwe,w erwe, werwe', '2024-08-08', 1, '2024-08-07', 'aewdqwe', 'qwe cw', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', ' fs fs', 'ds fdsf', '2', '1', '1', '2', 'we rwe', 'we rwe', 'we r', 'w erw'),
(30, 1, 9, '2024-08-10', '7', '7', '7', '77', '7', '1', '2', '1', '2', 'false', 'false', 'Test', 'Tets', 'Tetd,Jxjd', '2024-08-10', 1, '2024-08-08', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(31, 1, 9, '2024-08-10', '7', '7', '7', '77', '7', '1', '2', '1', '2', 'false', 'false', 'Test', 'Tets', 'Tetd,Jxjd,Tetd,Jxjd', '2024-08-10', 1, '2024-08-09', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(32, 1, 9, '2024-08-10', '7', '7', '7', '77', '7', '1', '2', '1', '2', 'false', 'false', 'Test', 'Tets', 'Tetd,Jxjd,Tetd,Jxjd,Tetd,Jxjd', '2024-08-10', 1, '2024-08-09', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
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
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_form`
--
ALTER TABLE `water_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `water_form`
--
ALTER TABLE `water_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
