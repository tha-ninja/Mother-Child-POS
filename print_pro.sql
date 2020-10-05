-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 11:09 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(11) NOT NULL,
  `cat` varchar(67) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat`) VALUES
(6, 'Toners');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `address` varchar(233) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `points` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `points`) VALUES
(1, '', NULL, '', '35'),
(2, 'john', NULL, '0717407062', '0'),
(3, 'john', NULL, '0717407062', '40'),
(4, 'allan', NULL, '0717407062', '20'),
(5, NULL, NULL, '0717407062', '33'),
(6, 'john', NULL, '0712345678', '0'),
(7, '', NULL, '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` int(111) NOT NULL,
  `brand` varchar(233) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `stock_level` int(245) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  `type` varchar(233) NOT NULL DEFAULT 'product'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `brand`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `stock_level`, `expiry_date`, `date_arrival`, `type`) VALUES
(1, 1, '', 'dx2330', 'Master Rolls', '', '', '800', '', '', 0, 1172, 0, 500, '', '', 'product'),
(2, 2, '', 'Z37 A3', 'Master Rolls', '', '', '2500', '', '', 0, 97, 0, 50, '', '', 'product'),
(3, 3, '', 'CPMT 21', 'Master Rolls', '', '', '800', '', '', 0, 56, 0, 500, '', '', 'product'),
(4, 4, '', 'DRC 11', 'Master Rolls', '', '', '1800', '', '', 0, 230, 0, 80, '', '', 'product'),
(5, 5, '', 'Rongda B4', 'Master Rolls', '', '', '2000', '', '', 0, 104, 0, 80, '', '', 'product'),
(6, 6, '', 'JP12 B4', 'Master Rolls', '', '', '1800', '', '', 0, 46, 0, 80, '', '', 'product'),
(7, 7, '', 'KS Masters', 'Master Rolls', '', '', '800', '', '', 0, 357, 0, 100, '', '', 'product'),
(8, 8, '', 'DRC 12', 'Master Rolls', '', '', '1800', '', '', 0, 5, 0, 50, '', '', 'product'),
(9, 9, '', 'Z30', 'Master Rolls', '', '', '1800', '', '', 0, 1, 0, 100, '', '', 'product'),
(10, 10, '', 'Z33', 'Master Rolls', '', '', '2000', '', '', 0, 37, 0, 50, '', '', 'product'),
(11, 11, '', 'CPMT 9', 'Master Rolls', '', '', '2000', '', '', 0, 44, 0, 20, '', '', 'product'),
(12, 12, '', 'Rongda (A3)', 'Master Rolls', '', '', '3000', '', '', 0, 30, 0, 20, '', '', 'product'),
(13, 13, '', 'JP 12 (A4)', 'Master Rolls', '', '', '1800', '', '', 0, 2, 0, 80, '', '', 'product'),
(14, 14, '', 'DR43', 'Master Rolls', '', '', '2500', '', '', 0, 21, 0, 20, '', '', 'product'),
(15, 15, '', 'DR 630', 'Master Rolls', '', '', '1800', '', '', 0, 1, 0, 50, '', '', 'product'),
(16, 16, '', 'JP 50', 'Master Rolls', '', '', '2500', '', '', 0, 29, 0, 20, '', '', 'product'),
(17, 17, '', 'HQ 40LC', 'Master Rolls', '', '', '3000', '', '', 0, 41, 0, 10, '', '', 'product'),
(18, 18, '', 'DR 650', 'Master Rolls', '', '', '3000', '', '', 0, 8, 0, 10, '', '', 'product'),
(19, 19, '', 'DR 670', 'Master Rolls', '', '', '2000', '', '', 0, 3, 0, 50, '', '', 'product'),
(20, 20, '', 'Riso Z30', 'Master Rolls', '', '', '4500', '', '', 0, 11, 0, 100, '', '', 'product'),
(21, 21, '', 'Hp 35A/85A/36A/78A/83A (Drums)', 'Drums', '', '', '250', '', '', 0, 2000, 0, 10, '', '', 'product'),
(22, 22, '', 'TK1120', 'Toners', '', '', '2000', '', '', 0, 38, 0, 50, '', '', 'product'),
(23, 23, '', 'MPC 3500/4500 (BLACK)', 'Toners', '', '', '5500', '', '', 0, 22, 0, 10, '', '', 'product'),
(24, 24, '', 'HP 12A', 'Drums', '', '', '250', '', '', 0, 200, 0, 10, '', '', 'product'),
(25, 25, '', 'HP 05A', 'Drums', '', '', '250', '', '', 0, 500, 0, 10, '', '', 'product'),
(26, 26, '', 'HP 80A', 'Drums', '', '', '250', '', '', 0, 500, 0, 10, '', '', 'product'),
(27, 27, '', 'HP 53A', 'Drums', '', '', '250', '', '', 0, 200, 0, 10, '', '', 'product'),
(28, 28, '', 'HP 49', 'Drums', '', '', '250', '', '', 0, 200, 0, 10, '', '', 'product'),
(29, 29, '', 'CEX V33', 'Toners', '', '', '4000', '', '', 0, 9, 0, 50, '', '', 'product'),
(30, 30, '', 'FX 10', 'Toners', '', '', '2500', '', '', 0, 36, 0, 20, '', '', 'product'),
(31, 31, '', 'DA14', 'INK(s)', '', '', '500', '', '', 0, 2494, 0, 300, '', '', 'product'),
(32, 32, '', 'Duplo 514', 'INK(s)', '', '', '500', '', '', 0, 417, 0, 200, '', '', 'product'),
(33, 33, '', 'DU 04', 'INK(s)', '', '', '1500', '', '', 0, 388, 0, 200, '', '', 'product'),
(34, 34, '', 'CPI 10 ink', 'INK(s)', '', '', '400', '', '', 0, 3210, 0, 1000, '', '', 'product'),
(35, 35, '', 'DX 2430 ink', 'INK(s)', '', '', '450', '', '', 0, 1483, 0, 2000, '', '', 'product'),
(36, 36, '', 'CPI2', 'INK(s)', '', '', '500', '', '', 0, 593, 0, 200, '', '', 'product'),
(37, 37, '', 'CPI6', 'INK(s)', '', '', '500', '', '', 0, 140, 0, 100, '', '', 'product'),
(38, 38, '', 'JP12', 'INK(s)', '', '', '500', '', '', 0, 161, 0, 200, '', '', 'product'),
(39, 39, '', 'CP17', 'INK(s)', '', '', '500', '', '', 0, 368, 0, 100, '', '', 'product'),
(40, 40, '', 'CPI11', 'INK(s)', '', '', '500', '', '', 0, 255, 0, 100, '', '', 'product'),
(41, 41, '', 'CR', 'INK(s)', '', '', '1300', '', '', 0, 102, 0, 50, '', '', 'product'),
(42, 42, '', 'KS', 'INK(s)', '', '', '1300', '', '', 0, 26, 0, 50, '', '', 'product'),
(43, 43, '', 'Z type / RZ', 'INK(s)', '', '', '1800', '', '', 0, 312, 0, 200, '', '', 'product'),
(44, 44, '', 'EZ type', 'INK(s)', '', '', '1800', '', '', 0, 31, 0, 100, '', '', 'product'),
(45, 45, '', 'JP 10', 'INK(s)', '', '', '1800', '', '', 0, 152, 0, 30, '', '', 'product'),
(46, 46, '', 'RD', 'INK(s)', '', '', '6000', '', '', 0, 62, 0, 30, '', '', 'product'),
(47, 47, '', 'JP 7', 'INK(s)', '', '', '500', '', '', 0, 7, 0, 100, '', '', 'product'),
(48, 48, '', 'RICOH 3442', 'INK(s)', '', '', '600', '', '', 0, 74, 0, 50, '', '', 'product'),
(49, 49, '', 'JP 6', 'INK(s)', '', '', '600', '', '', 0, 40, 0, 10, '', '', 'product'),
(50, 50, '', '103', 'Toners', '', '', '4000', '', '', 0, 34, 0, 10, '', '', 'product'),
(51, 51, '', '104', 'Toners', '', '', '4000', '', '', 0, 78, 0, 50, '', '', 'product'),
(52, 52, '', '101', 'Toners', '', '', '4000', '', '', 0, 54, 0, 10, '', '', 'product'),
(53, 53, '', '105', 'Toners', '', '', '4000', '', '', 0, 43, 0, 10, '', '', 'product'),
(54, 54, '', '108', 'Toners', '', '', '4000', '', '', 0, 45, 0, 10, '', '', 'product'),
(55, 55, '', '109', 'Toners', '', '', '4000', '', '', 0, 5, 0, 10, '', '', 'product'),
(56, 56, '', 'TN 216/319', 'Toners', '', '', '5500', '', '', 0, 30, 0, 10, '', '', 'product'),
(57, 57, '', 'Konica Black', 'Toners', '', '', '5500', '', '', 0, 41, 0, 10, '', '', 'product'),
(58, 58, '', 'Konica Yellow', 'Toners', '', '', '6000', '', '', 0, 4, 0, 10, '', '', 'product'),
(59, 59, '', 'Konica Magenta', 'Toners', '', '', '6000', '', '', 0, 7, 0, 10, '', '', 'product'),
(60, 60, '', 'Konica Cyan', 'Toners', '', '', '6000', '', '', 0, 7, 0, 10, '', '', 'product'),
(61, 61, '', 'TN 217', 'Toners', '', '', '5500', '', '', 0, 17, 0, 10, '', '', 'product'),
(62, 62, '', 'MX 312', 'Toners', '', '', '6000', '', '', 0, 46, 0, 10, '', '', 'product'),
(63, 63, '', 'MX 310', 'Toners', '', '', '7000', '', '', 0, 19, 0, 10, '', '', 'product'),
(64, 64, '', 'MX 235', 'Toners', '', '', '4500', '', '', 0, 13, 0, 20, '', '', 'product'),
(65, 65, '', 'MX 236', 'Toners', '', '', '4500', '', '', 0, 5, 0, 10, '', '', 'product'),
(66, 66, '', 'E250', 'Toners', '', '', '4500', '', '', 0, 23, 0, 10, '', '', 'product'),
(67, 67, '', 'TK 410', 'Toners', '', '', '3000', '', '', 0, 37, 0, 100, '', '', 'product'),
(68, 68, '', 'TK 7105', 'Toners', '', '', '7000', '', '', 0, 77, 0, 30, '', '', 'product'),
(69, 69, '', 'TK 675', 'Toners', '', '', '6000', '', '', 0, 21, 0, 30, '', '', 'product'),
(70, 70, '', 'TK 170', 'Toners', '', '', '2500', '', '', 0, 93, 0, 40, '', '', 'product'),
(71, 71, '', 'TK 4105', 'Toners', '', '', '4000', '', '', 0, 91, 0, 100, '', '', 'product'),
(72, 72, '', 'TK 685', 'Toners', '', '', '6000', '', '', 0, 93, 0, 30, '', '', 'product'),
(73, 73, '', 'TK 435 (Brown Box)', 'Toners', '', '', '3500', '', '', 0, 60, 0, 10, '', '', 'product'),
(74, 74, '', 'TK 475 ', 'Toners', '', '', '4000', '', '', 0, 12, 0, 50, '', '', 'product'),
(75, 75, '', 'TK 435 (Blue Box)', 'Toners', '', '', '4000', '', '', 0, 59, 0, 50, '', '', 'product'),
(76, 76, '', 'TK 725', 'Toners', '', '', '7000', '', '', 0, 20, 0, 10, '', '', 'product'),
(77, 77, '', 'TK 130', 'Toners', '', '', '2500', '', '', 0, 45, 0, 40, '', '', 'product'),
(78, 78, '', 'TK 3130', 'Toners', '', '', '3500', '', '', 0, 6, 0, 20, '', '', 'product'),
(79, 79, '', 'TK 1140', 'Toners', '', '', '2500', '', '', 0, 4, 0, 50, '', '', 'product'),
(80, 80, '', 'MP 2220D', 'Toners', '', '', '2000', '', '', 0, 78, 0, 20, '', '', 'product'),
(81, 81, '', 'MP 1220D', 'Toners', '', '', '1200', '', '', 0, 85, 0, 20, '', '', 'product'),
(82, 82, '', 'TK 1270D', 'Toners', '', '', '0', '', '', 0, 116, 0, 40, '', '', 'product'),
(83, 83, '', 'MP 1230D', 'Toners', '', '', '1200', '', '', 0, 39, 0, 50, '', '', 'product'),
(84, 84, '', 'MP 2500', 'Toners', '', '', '1300', '', '', 0, 1, 0, 30, '', '', 'product'),
(85, 85, '', 'MP 4500', 'Toners', '', '', '2500', '', '', 0, 3, 0, 30, '', '', 'product'),
(86, 86, '', 'DSM 415', 'Toners', '', '', '1200', '', '', 0, 56, 0, 40, '', '', 'product'),
(87, 87, '', '35A', 'Toners', '', '', '3500', '', '', 0, 968, 0, 200, '', '', 'product'),
(88, 88, '', 'O5A', 'Toners', '', '', '3500', '', '', 0, 863, 0, 200, '', '', 'product'),
(89, 89, '', '26A', 'Toners', '', '', '6000', '', '', 0, 63, 0, 50, '', '', 'product'),
(90, 90, '', '80A', 'Toners', '', '', '3500', '', '', 0, 848, 0, 200, '', '', 'product'),
(91, 91, '', 'MPC 3500/4500 (YELLOW)', 'Toners', '', '', '6000', '', '', 0, 1, 0, 10, '', '', 'product'),
(92, 92, '', 'MPC 3500/4500 (CYAN)', 'Toners', '', '', '6000', '', '', 0, 6, 0, 10, '', '', 'product'),
(93, 93, '', 'MPC 3500/4500 (MAGENTA)', 'Toners', '', '', '6000', '', '', 0, 8, 0, 10, '', '', 'product'),
(94, 94, '', 'MPC 2000/2500/3000 (BLACK', 'Toners', '', '', '5500', '', '', 0, 21, 0, 10, '', '', 'product'),
(95, 95, '', 'MPC 2000/2500/3000 (YELLOW)', 'Toners', '', '', '6000', '', '', 0, 9, 0, 10, '', '', 'product'),
(96, 96, '', 'MPC 2000/2500/3000 (MAGENTA)', 'Toners', '', '', '6000', '', '', 0, 7, 0, 10, '', '', 'product'),
(97, 97, '', 'MPC 2000/2500/3000 (CYAN)', 'Toners', '', '', '6000', '', '', 0, 5, 0, 10, '', '', 'product'),
(98, 98, '', 'MPC 4000/5000 (YELLOW)', 'Toners', '', '', '6000', '', '', 0, 1, 0, 10, '', '', 'product'),
(99, 99, '', 'MPC 4000/5000 (BLACK)', 'Toners', '', '', '5500', '', '', 0, 3, 0, 10, '', '', 'product'),
(100, 100, '', 'MPC 4000/5000 (CYAN)', 'Toners', '', '', '6000', '', '', 0, 2, 0, 10, '', '', 'product'),
(101, 101, '', 'MPC 3300/2800 (YELLOW)', 'Toners', '', '', '6000', '', '', 0, 7, 0, 10, '', '', 'product'),
(102, 102, '', 'MPC 3300/2800 (CYAN)', 'Toners', '', '', '6000', '', '', 0, 9, 0, 10, '', '', 'product'),
(103, 103, '', 'MPC 3300/2800 (BLACK)', 'Toners', '', '', '5500', '', '', 0, 24, 0, 10, '', '', 'product'),
(104, 104, '', 'MPC 3300/2800 (MAGENTA)', 'Toners', '', '', '6000', '', '', 0, 6, 0, 10, '', '', 'product'),
(105, 105, '', 'toner', 'Toners', '', '', '3500', '', '', 0, 700, 0, 200, '', '', 'product'),
(106, 106, '', 'hp toner 05A', 'Toners', '', '', '3500', '', '', 0, 700, 0, 200, '', '', 'product'),
(107, 107, 'HP', 'HP 83A', 'Toners', '', '', '3500', '', 'Print Pro', 0, 400, 0, 100, '', '', 'product'),
(108, 108, '', 'Test Z33', 'Master Rolls', '', '', '2000', '', '', 0, 24, 0, 50, '', '', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(99) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `ttype` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `number`, `balance`, `ref`, `discount`, `ttype`) VALUES
(1, 'RS-4632320', 'Jimmy Thuku', '10/04/17', 'cash', '3500', '<br /><b>Notice</b>:  Undefined variable: asd in <b>H:\\xampp\\htdocs\\print\\main\\sales.php</b> on line', '5500', '', '', '', '', '500', 'cash'),
(3, 'RS-7000005', 'Jimmy Thuku', '10/04/17', 'cash', '4000', '<br /><b>Notice</b>:  Undefined variable: asd in <b>H:\\xampp\\htdocs\\print\\main\\sales.php</b> on line', '5000', '0717407062', 'john', '', '', '', 'cash'),
(4, 'RS-3324282', 'Jimmy Thuku', '10/04/17', 'cash', '2000', '<br /><b>Notice</b>:  Undefined variable: asd in <b>H:\\xampp\\htdocs\\print\\main\\sales.php</b> on line', '2000', '0717407062', 'allan', '', '', '', 'cash'),
(5, 'RS-203392', 'Jimmy Thuku', '10/04/17', 'cash', '2000', '<br /><b>Notice</b>:  Undefined variable: asd in <b>H:\\xampp\\htdocs\\print\\main\\sales.php</b> on line', '0', '0712345678', 'john', '', '', '', 'cash'),
(6, 'RS-04023303', 'Jimmy Thuku', '10/04/17', 'cash', '2000', '<br /><b>Notice</b>:  Undefined variable: asd in <b>H:\\xampp\\htdocs\\print\\main\\sales.php</b> on line', '3000', '', '', '', '', '', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `balance` varchar(11) NOT NULL,
  `number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`, `balance`, `number`) VALUES
(1, 'RS-4632320', '107', '1', '3500', '0', '', 'HP 83A', 'Toners', '3500', '500', '10/04/17', '0', ''),
(3, 'RS-7000005', '108', '2', '4000', '0', '', 'Test Z33', 'Master Rolls', '2000', '', '10/04/17', '0', '0717407062'),
(4, 'RS-3324282', '108', '1', '2000', '0', '', 'Test Z33', 'Master Rolls', '2000', '', '10/04/17', '0', '0717407062'),
(6, 'RS-203392', '108', '1', '2000', '0', '', 'Test Z33', 'Master Rolls', '2000', '', '10/04/17', '2000', '0712345678'),
(7, 'RS-04023303', '108', '1', '2000', '0', '108', 'Test Z33', 'Master Rolls', '2000', '', '10/04/17', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(990) NOT NULL,
  `name` varchar(99) NOT NULL,
  `location` varchar(99) NOT NULL,
  `contacts` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `name`, `location`, `contacts`) VALUES
(2, 'IMG-20160626-WA0085.jpg', 'Print Pro', 'nairobi', '');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(1, 'Print Pro', '4343', '0722424232', 'Joshua', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`, `contact`) VALUES
(8, 'nancy', 'am12@%hm', 'Nancy', 'admin', '0724455511'),
(9, 'jimmy', 'jimmy', 'Jimmy Thuku', 'admin', '0721879663'),
(10, 'sammy', 'sammy', 'Samuel', 'cashier', '0725673691'),
(11, 'studio', 'pa$$word', 'demo', 'admin', '0724455511');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
