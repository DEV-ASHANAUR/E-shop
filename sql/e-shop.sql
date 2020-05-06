-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 06:12 PM
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
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_icon` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `cat_name`, `cat_icon`, `created`) VALUES
(1, 'Mobile', 'fas fa-mobile-alt', '2019-11-26 09:04:34'),
(2, 'Laptop', 'fas fa-laptop', '2019-11-26 09:05:21'),
(3, 'Headphone', 'fas fa-headphones', '2019-11-26 09:06:05'),
(4, 'Camere', 'fas fa-camera', '2019-11-26 09:06:53'),
(5, 'CCTV', 'fas fa-hand-lizard\"', '2019-11-26 09:09:09'),
(6, 'Drone', 'fas fa-camera', '2019-11-26 09:10:58'),
(7, 'Battery', 'fas fa-camera', '2019-11-27 04:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `cup_id` int(11) NOT NULL,
  `cup_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cup_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cup_discount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cup_expired` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cup_status` int(5) NOT NULL,
  `cup_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`cup_id`, `cup_title`, `cup_code`, `cup_discount`, `cup_expired`, `cup_status`, `cup_created`) VALUES
(1, 'Excludes other promotional offers.', '500FF04', '50', '2020/01/20', 1, '2020-01-08 19:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pass`, `mobile`, `division`, `district`, `address`, `created`) VALUES
(6, 'Nasim', 'nasim009@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01866936562', '3', '14', 'Vhovanipur ,Rajbari', '2019-11-27 13:51:30'),
(7, 'Tanvir', 'tanvir009@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01866936562', '3', '14', 'Vhovanipur ,Rajbari', '2019-11-27 15:27:02'),
(8, 'Satayjit biswas', 'satayjitbiswas1@gmail.com', '3edf87bce4f5dd21020011731a82d7da', '01783100136', '3', '2', 'rajbari', '2019-12-01 10:26:35'),
(9, 'Rasel hossain', 'rashemul009@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01781698289', '3', '8', 'reuiougouof  uoeawfuiofoo fe', '2019-12-01 12:40:31'),
(10, 'Ashanaur rahman', 'ashanour009@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01866936562', '3', '14', 'Vhovanipur ,Rajbari', '2019-12-02 12:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`id`, `order_id`, `user_id`, `product_id`, `product_price`, `product_quantity`, `shipping`, `total`, `status`, `created`) VALUES
(8, 'W1XARB', '10', '28', '1860', '1', '40', '1830', '1', '2020-01-08 20:06:41'),
(9, 'KYM5T8', '10', '30', '18000', '1', '40', '17970', '1', '2020-01-08 20:14:29'),
(10, '7IOANH', '10', '17', '2300', '3', '40', '6870', '1', '2020-01-08 20:15:49'),
(11, 'DBLPOV', '10', '22', '5000', '2', '40', '9970', '1', '2020-01-08 20:16:43'),
(12, 'Y19TL4', '10', '17', '2300', '2', '40', '4640', '1', '2020-01-08 20:17:27'),
(13, 'LG6JY1', '10', '28', '1860', '1', '40', '1900', '0', '2020-01-08 20:20:43'),
(14, 'YZ6OMW', '10', '28', '1860', '1', 'free', '1790', '0', '2020-01-08 20:52:04'),
(15, '3D2GPO', '10', '30', '18000', '2', 'free', '36000', '0', '2020-01-08 20:52:33'),
(16, 'O7RANU', '10', '18', '1372', '2', 'free', '2674', '0', '2020-01-08 20:53:01'),
(17, 'K9VXW6', '10', '18', '1372', '1', 'free', '686', '0', '2020-01-09 18:07:00'),
(18, 'X4CVAM', '10', '11', '38800', '3', 'free', '58200', '0', '2020-01-09 18:10:25'),
(19, 'TB410V', '10', '9', '24250', '1', 'free', '12125', '0', '2020-01-09 18:11:16'),
(20, 'N0ZDQ6', '10', '18', '1372', '1', 'free', '686', '0', '2020-01-09 18:12:09'),
(21, 'B3U0YI', '7', '11', '38800', '2', '40', '38820', '1', '2020-01-09 18:15:16'),
(22, 'QI743W', '7', '11', '38800', '1', '40', '38840', '0', '2020-01-09 18:16:33'),
(23, '672B4C', '10', '24', '60000', '2', 'free', '60000', '0', '2020-01-10 16:35:35'),
(24, 'ICTAHB', '10', '9', '24250', '2', 'free', '24250', '1', '2020-01-16 17:06:31'),
(25, 'WPH1OS', '6', '23', '13500', '1', '40', '6770', '1', '2020-01-16 17:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `dis_name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `dis_name`, `bn_name`, `lat`, `lon`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 23.7115253, 90.4111451, 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 23.6070822, 89.8429406, 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 24.0022858, 90.4264283, 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 23.0050857, 89.8266059, 'www.gopalganj.gov.bd'),
(5, 8, 'Jamalpur', 'জামালপুর', 24.937533, 89.937775, 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 24.444937, 90.776575, 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 23.164102, 90.1896805, 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 0, 0, 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 0, 'www.munshiganj.gov.bd'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 0, 0, 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 23.63366, 90.496482, 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 23.932233, 90.71541, 'www.narsingdi.gov.bd'),
(13, 8, 'Netrokona', 'নেত্রকোণা', 24.870955, 90.727887, 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 23.7574305, 89.6444665, 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 0, 0, 'www.shariatpur.gov.bd'),
(16, 8, 'Sherpur', 'শেরপুর', 25.0204933, 90.0152966, 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 0, 0, 'www.tangail.gov.bd'),
(18, 5, 'Bogura', 'বগুড়া', 24.8465228, 89.377755, 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 0, 0, 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 0, 0, 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 24.420556, 89.000282, 'www.natore.gov.bd'),
(22, 5, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 24.5965034, 88.2775122, 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 23.998524, 89.233645, 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 0, 0, 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 24.4533978, 89.7006815, 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 25.6217061, 88.6354504, 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 25.328751, 89.528088, 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 25.805445, 89.636174, 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 0, 0, 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 25.931794, 88.856006, 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 26.3411, 88.5541606, 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 25.7558096, 89.244462, 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 26.0336945, 88.4616834, 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 0, 0, 'www.barguna.gov.bd'),
(35, 1, 'Barishal', 'বরিশাল', 0, 0, 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 22.685923, 90.648179, 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 0, 0, 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 22.3596316, 90.3298712, 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 0, 0, 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 22.1953275, 92.2183773, 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 23.9570904, 91.1119286, 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 23.2332585, 90.6712912, 'www.chandpur.gov.bd'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', 22.335109, 91.834073, 'www.chittagong.gov.bd'),
(44, 2, 'Cumilla', 'কুমিল্লা', 23.4682747, 91.1788135, 'www.comilla.gov.bd'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', 0, 0, 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 23.023231, 91.3840844, 'www.feni.gov.bd'),
(47, 2, 'Khagrachhari', 'খাগড়াছড়ি', 23.119285, 91.984663, 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 22.942477, 90.841184, 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 22.869563, 91.099398, 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 0, 0, 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 24.374945, 91.41553, 'www.habiganj.gov.bd'),
(52, 7, 'Moulvibazar', 'মৌলভীবাজার', 24.482934, 91.777417, 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 25.0658042, 91.3950115, 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 24.8897956, 91.8697894, 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 22.651568, 89.785938, 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 23.6401961, 88.841841, 'www.chuadanga.gov.bd'),
(57, 4, 'Jashore', 'যশোর', 23.16643, 89.2081126, 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 23.5448176, 89.1539213, 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 22.815774, 89.568679, 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 23.901258, 89.120482, 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 23.487337, 89.419956, 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 23.762213, 88.631821, 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 23.172534, 89.512672, 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 0, 0, 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `div_name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `div_name`, `bn_name`) VALUES
(1, 'Barishal', 'বরিশাল'),
(2, 'Chattogram', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_discount` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL,
  `offer_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_title`, `offer_discount`, `banner`, `status`, `offer_created`) VALUES
(1, 'Mega Sale', '40', '5de50b798a5e73.37621210.png', 1, '2019-12-02 11:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_catagory` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_brand` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stcock` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_section` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_condition` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `product_catagory`, `product_brand`, `product_price`, `product_discount`, `product_stcock`, `product_section`, `product_condition`, `product_details`, `created`) VALUES
(1, 'battery 01', '5dde01b5bd4885.93822964.png', '7', 'STARTECH', '15000', '10', '50', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 04:55:17'),
(2, 'battery 02', '5dde01e95a1a70.75370138.png', '7', 'BOSCH', '20000', '40', '60', 'offer', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 04:56:09'),
(3, 'battery 03', '5dde020fa133a2.12052436.png', '7', 'PLATINUM', '25000', '5', '80', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 04:56:47'),
(4, 'battery 04', '5dde025ceda6d4.72931974.png', '7', 'DIEHARD', '30000', '', '80', 'just_for_you', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 04:58:04'),
(5, 'drone 01', '5dde03213fbf17.35677937.png', '6', 'Altair Aerial.', '100000', '10', '15', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:01:21'),
(6, 'drone 02', '5dde0374c12ec4.31079057.png', '6', 'Cheerson.', '200000', '', '50', 'best_tech', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:02:44'),
(7, 'drone 03', '5dde03aec265c0.59649072.png', '6', 'DJI.', '50000', '50', '12', 'offer', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:03:42'),
(8, 'drone 04', '5dde03f750f762.46065780.png', '6', 'DROCON', '2000', '45', '30', 'offer', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:04:55'),
(9, 'drone 05', '5dde042c89daa0.54767384.png', '6', 'DROCON', '25000', '3', '30', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:05:48'),
(10, 'drone 06', '5dde04617f0493.53508906.png', '6', 'Holy Stone', '33000', '', '15', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:06:41'),
(11, 'Camera01', '5dde04bbb0f502.85921595.png', '4', 'Canon', '40000', '3', '15', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:08:11'),
(12, 'Camera02', '5dde04f4911018.58973653.png', '4', 'Nikon', '50000', '', '100', 'best_tech', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:09:08'),
(13, 'Camera03', '5dde052745feb9.28640019.png', '4', 'Olympus', '70000', '', '16', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:09:59'),
(14, 'Camera 04', '5dde055571db02.22397827.png', '4', 'Nikon', '30000', '', '80', 'just_for_you', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2019-11-27 05:10:45'),
(15, 'Headphone 01', '5dde06687bc303.69345468.png', '3', 'Skullcandy', '12345', '3', '12', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:15:20'),
(16, 'Headphone 02', '5dde06c4347991.18411833.png', '3', 'Sony', '2500', '', '50', 'best_tech', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:16:52'),
(17, 'Headphone 03', '5dde0711933ed7.78868758.png', '3', 'Audio-Technica', '2300', '', '12', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:18:09'),
(18, 'Headphone 04', '5dde074319f808.05980851.png', '3', 'Remax', '1400', '2', '23', 'just_for_you', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:18:59'),
(19, 'CCTV 01', '5dde07d56d49d8.17226074.png', '4', 'Sony', '1500', '5', '20', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:21:25'),
(20, 'CCTV 02', '5dde080598e604.96189397.png', '5', 'Zicom', '3000', '', '50', 'best_tech', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:22:13'),
(21, 'CCTV 03', '5dde082f290340.08117728.png', '5', 'soney', '4000', '', '30', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:22:55'),
(22, 'CCTV 04', '5dde085817d898.95569719.png', '5', 'PLATINUM', '5000', '', '25', 'just_for_you', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:23:36'),
(23, 'Mobile', '5dde08c8c6a6e0.72867190.png', '1', 'SAMSUNG', '15000', '10', '12', 'best_tech', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:25:28'),
(24, 'Mobile 02', '5dde0903c97ef0.60014918.png', '1', 'Iphone', '60000', '', '15', 'looking', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:26:27'),
(25, 'Mobile 03', '5dde0931bf7305.87454468.png', '1', 'SAMSUNG', '30000', '', '10', 'popular', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:27:13'),
(26, 'Mobile 04', '5dde09624c92e0.65915984.png', '1', 'SAMSUNG', '25000', '10', '12', 'just_for_you', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:28:02'),
(27, 'Laptop 01', '5dde09984c4348.93086472.png', '2', 'SAMSUNG', '25000', '5', '15', 'popular', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:28:56'),
(28, 'Laptop 02', '5dde09dac81927.51050604.png', '2', 'Dell', '2000', '7', '18', 'best_tech', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:30:02'),
(29, 'Laptop 03', '5dde0a079cba94.48092781.png', '2', 'Mac', '100000', '10', '12', 'looking', 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:30:47'),
(30, 'Laptop 04', '5dde0a435d2b82.25932219.png', '2', 'Toshiba', '20000', '10', '20', 'popular', 'Old', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2019-11-27 05:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porduct_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `porduct_id`, `comment`) VALUES
(1, '1', '23', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.'),
(2, '1', '23', 'addsa'),
(3, '1', '9', 'Nice Product!'),
(4, '7', '11', 'good'),
(5, '1', '24', 'nice'),
(6, '10', '7', 'oh my god.'),
(7, '10', '8', 'dfgdgdfx'),
(8, '10', '11', 'dtrdfg'),
(9, '10', '9', 'nice product'),
(10, '10', '19', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_user_id` int(5) NOT NULL,
  `wishlist_product_id` int(5) NOT NULL,
  `wishlist_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `wishlist_user_id`, `wishlist_product_id`, `wishlist_created`) VALUES
(4, 10, 9, '2020-01-16 16:34:22'),
(5, 10, 3, '2020-01-16 16:34:37'),
(7, 6, 18, '2020-01-16 16:58:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`cup_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
