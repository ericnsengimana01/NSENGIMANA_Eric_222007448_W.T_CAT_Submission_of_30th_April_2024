-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 12:48 PM
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
-- Database: `product_delivery_app_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteproduct_order` (IN `orID` INT(68))   BEGIN delete from product_order where orID=product_orderID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletevendor` (IN `vID` INT(11))   BEGIN delete from vendor where vID=vendorID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getadminByID` (IN `admid` INT(5))   BEGIN select * from admid where customerid=admid;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getcustomerByID` (IN `cid` INT(5))   BEGIN select * from customer where vendorID=cID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getpayimentByID` (IN `payid` INT(5))   BEGIN select * from payment where paymentID=payID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getpaymentByID` (IN `payid` INT(5))   BEGIN select * from payment where paymentID=payID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getproductByID` (IN `pid` INT(5))   BEGIN select * from    product where productID=pID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getproduct_orderByID` (IN `orid` INT(5))   BEGIN select * from product_order where product_orderID=orID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getsellByID` (IN `sid` INT(5))   BEGIN select * from sell where sellID=sID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getvendorByID` (IN `vid` INT(5))   BEGIN select * from vondor where vendorID=vID;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertcustomer` (IN `cid` INT(5), `fname` VARCHAR(15), `lname` VARCHAR(15), `phone` BIGINT(12), `email` VARCHAR(15), `district` VARCHAR(15), `sector` VARCHAR(15), `cell` VARCHAR(15), `village` VARCHAR(15))   BEGIN insert into customer values (cid,fname,lname,phone,email,district,sector,cell,village ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertpayment` (IN `payid` INT(5), `paydate` DATE, `pamount` FLOAT(5), `pmethod` VARCHAR(15), `orid` INT(5), `paystatus` VARCHAR(15))   BEGIN insert into customer values (payid,paydate,pamount,pmethod,orid,paystatus ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertproduct` (IN `pid` INT(5), `pname` VARCHAR(15), `pgrade` VARCHAR(5), `price_per_unit` VARCHAR(8), `mfg_date` DATE, `expdate` DATE, `pimage` BLOB)   BEGIN insert into customer values (pid,pname,pgrade,price_per_unit,mfg_date,expdate,pimage ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertproduct_order` (IN `orid` INT(5), `ordate` DATE, `pid` INT(5), `pquantity` INT(5), `orprice` FLOAT(5), `cid` INT(5), `order_status` VARCHAR(15))   BEGIN insert into customer values (orid,ordate,pid,pquantity,orprice,cid,order_status ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertsell` (IN `sid` INT(5), `sdate` DATE, `vid` INT(5), `orid` INT(5))   BEGIN insert into customer values (sid,sdate,vid,orid ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertvendor` (IN `vid` INT(5), `vfname` VARCHAR(15), `vlname` VARCHAR(15), `phone` BIGINT(15), `email` VARCHAR(15), `district` VARCHAR(15), `sector` VARCHAR(15), `cell` VARCHAR(15), `village` VARCHAR(15))   BEGIN insert into customer values (vid,vfname,vlname,phone,email,district,sector,cell,village ); END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecustomer` (IN `Cid` INT(5))   BEGIN update customer set nsengimana=nsengimana where CID=CID; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatepayment` (IN `payid` INT(5))   BEGIN update payment set account=account where payid=payid; END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(5) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `cemail` varchar(35) NOT NULL,
  `district` varchar(15) NOT NULL,
  `sector` varchar(15) NOT NULL,
  `cell` varchar(225) NOT NULL,
  `village` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `fname`, `lname`, `phone`, `cemail`, `district`, `sector`, `cell`, `village`) VALUES
(3, '', '', 0, '', '', '', '', ''),
(34, 'MANIRAKIZA', 'SIFA', 783443926, 'MANIRAKIZASIFA@GMAIL.COM', 'HUYE', 'MUMENA', '', 'HUYE'),
(35, 'MANIRAKIZA', 'SIFA', 783443926, 'MANIRAKIZASIFA@GMAIL.COM', 'HUYE', 'MUMENA', '', 'HUYE'),
(37, 'ngabonziza', 'faustin', 793450123, 'ngabonzizafaustin@gmail.com', 'gicumbi', 'muhanga', 'gahanga', 'gahogo'),
(38, 'ndayishimiye', 'maurice', 794567333, 'ndayishimiyemaurice', 'gicumbi', 'muhanga', 'gahanga', 'gahogo'),
(39, 'ndayishimiye', 'maurice', 794567333, 'ndayishimiyemaurice', 'gicumbi', 'muhanga', 'gahanga', 'gahogo'),
(40, 'uwase', 'diane', 793450123, 'ngabonzizafaustin@gmail.com', 'gicumbi', 'ruhango', 'tuze', 'gahogo'),
(44, 'gahima', 'bugiri', 9876599876, 'gahimabugiri@gmail.com', 'ruhengeri', 'mutobo', 'gituza', 'barizo'),
(45, 'nsengimana', 'lick', 9876543987, 'nsengimanalick@gmail.com', 'kicukiro', 'rebero', 'kigarama', 'ituze'),
(48, 'ndayishimiye ', 'jean dodier', 876543234567, 'ndayishimiyejeandedier', 'ruhango', 'ruhango', 'gahanga', 'mukoko'),
(49, 'eric', 'nsengimana', 737317171, 'MANIRAKIZASIFA@GMAIL.COM', 'gicumbi', 'rukomo', 'gituza', 'rukomo'),
(50, 'eric', 'nsengimana', 783456782, 'MANIRAKIZASIFA@GMAIL.COM', 'ruhango', 'rukomo', 'gituza', 'rukomo'),
(51, 'eric', 'nsengimana', 783456782, 'MANIRAKIZASIFA@GMAIL.COM', 'ruhango', 'rukomo', 'gituza', 'rukomo'),
(52, 'eric', 'nsengimana', 789993456, 'kayihurapio002@gmail.com', 'ruhango', 'gakoma', 'gituza', 'muhura'),
(53, 'eric', 'nsengimana', 789993456, 'kayihurapio002@gmail.com', 'ruhango', 'gakoma', 'gituza', 'muhura'),
(54, 'eric', 'nsengimana', 789993456, 'niyitegekaalphonse01@gmail.com', 'rukomo', 'gisiza', 'rukomo', 'muhura'),
(55, 'eric', 'nsengimana', 789993456, 'niyitegekaalphonse01@gmail.com', 'rukomo', 'gisiza', 'rukomo', 'muhura');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(5) NOT NULL,
  `paydate` date NOT NULL,
  `pamount` float NOT NULL,
  `pmethod` varchar(15) NOT NULL,
  `orid` int(5) NOT NULL,
  `pay_status` varchar(10) NOT NULL DEFAULT 'Received',
  `cid` int(5) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `paydate`, `pamount`, `pmethod`, `orid`, `pay_status`, `cid`, `phone`) VALUES
(78, '2024-03-04', 3040, 'mtn', 63, 'paid', 34, '0783443926'),
(79, '2024-03-12', 12000, 'mtn', 64, 'receved', 35, '07893456670'),
(85, '2027-05-27', 100000, 'bank', 68, 'pending', 40, '788888345'),
(86, '2027-05-27', 100000, 'bank', 68, 'pending', 40, '788888345'),
(87, '2027-05-27', 100000, 'bank', 68, 'pending', 40, '788888345'),
(88, '2024-04-27', 5900, 'bank', 63, ' paid', 3, '784567893'),
(89, '2024-04-28', 20000, ' mtn', 63, ' paid', 35, '789993456'),
(90, '2024-04-28', 50000, ' mtn', 63, ' paid', 3, '784567897');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(5) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `pgrade` varchar(7) NOT NULL,
  `price_per_unit` varchar(15) NOT NULL,
  `mfd_date` varchar(15) NOT NULL,
  `exp_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pgrade`, `price_per_unit`, `mfd_date`, `exp_date`) VALUES
(2, 'maize', '3', '1234', '2024-02-07', '2024-02-14'),
(4, 'beans', '2', '60000', '2024-04-27', '2024-04-27'),
(127, 'suger', '1', '1200', '2024-02-22', '2024-02-28'),
(128, 'shoes', '1', '15000', '2024-02-27', '2024-02-11'),
(129, 'underwear', '2', '5300', '2024-04-27', '2024-04-27'),
(130, 'beans', '2', '50000', '2024-04-27', '2024-04-27'),
(133, 'beans', '2', '25000', '2024-04-27', '2024-04-27'),
(134, 'underwear', '2', '5300', '2024-04-27', '2027-05-27'),
(135, 'notebooks', '1', '12000', '2024-05-18', '2027-05-18'),
(136, 'bags', '1', '123000', '2024-05-18', '2027-05-18'),
(137, 'flowers', '1', '25000', '2024-04-27', '2024'),
(138, 'tshirt', '2', '35000', '2024-04-28', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `orid` int(7) NOT NULL,
  `ordate` varchar(15) NOT NULL,
  `pid` int(20) NOT NULL,
  `pquantity` varchar(15) NOT NULL,
  `orprice` varchar(15) NOT NULL,
  `cid` int(10) NOT NULL,
  `order_status` varchar(10) NOT NULL DEFAULT 'Received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`orid`, `ordate`, `pid`, `pquantity`, `orprice`, `cid`, `order_status`) VALUES
(63, '2024-04-27', 2, '0', '45000', 3, 'requested'),
(64, '2024-04-27', 2, '6', '4500', 3, 'requested'),
(68, '2024-01-27', 2, '6', '4500', 3, 'requested'),
(72, '2024-04-18', 133, '90', '75', 35, 'requested'),
(74, '2024-04-27', 4, '2000', '7500', 35, 'requested'),
(75, '2024-04-27', 4, '2000', '7500', 35, 'requested'),
(76, '2024-04-27', 4, '2000', '7500', 35, 'requested'),
(77, '2024-04-27', 4, '2000', '7500', 35, 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sid` int(5) NOT NULL,
  `sdate` varchar(20) NOT NULL,
  `vid` int(5) NOT NULL,
  `orid` int(5) NOT NULL,
  `product_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sid`, `sdate`, `vid`, `orid`, `product_name`) VALUES
(34, '2024-02-16', 15, 68, 'suger'),
(35, '2024-02-02', 6, 64, 'gas'),
(37, '2024-05-22', 2, 72, 'pantalo'),
(38, '2024-05-22', 2, 72, 'dresses'),
(39, '2024-05-22', 2, 72, 'underwear'),
(41, '2024-04-22', 2, 72, 'underwear'),
(42, '2024-04-27', 26, 74, 'bags'),
(43, '2024-04-27', 26, 74, 'bags'),
(44, '2024-04-27', 26, 74, 'bags'),
(45, '2024-04-27', 26, 74, 'bags'),
(47, '2024-04-28', 2, 63, 'seeds'),
(48, '2024-04-28', 2, 63, 'irishpotet'),
(50, '2024-04-28', 2, 63, 'shoe'),
(51, '2024-04-28', 2, 63, 'pantalo'),
(52, '2024-04-28', 2, 63, 'seeds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) NOT NULL,
  `is_activated` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'mbarushimana', 'fred', 'fred', 'female', 'mbarushimanafred@gmail.com', '07888123455', '$2y$10$S4cnpaO5XKOdRnXpZIrR9OVDPezOX4lj/1E0yHjmgWHJMmYC3bjsi', '2024-04-10 08:37:23', '2', ''),
(2, 'Ishimwe', 'jean hugues', 'Ishimwe', 'male', 'ishimwejeanhugues1@gmil.com', '07888123455', '$2y$10$ZlAe8CVxhoiPuUMzTcOjoeikyjpdknwRokb1fMu5gwrmgZf5/gPya', '2024-04-10 08:38:56', '1', ''),
(3, 'Nsengimana', 'eric', 'Eric1', 'male', 'ericnsengimana01@gmail.com', '0783443926', '$2y$10$3PEvian5M14m0b0dIasefu3xiSuV1DSxLkGXGSdH2xB21Bv/DNqS.', '2024-04-10 09:04:52', '3', ''),
(4, 'kanyemera', 'james', 'james1', 'male', 'kanyemerajames01@gmail.com', '0784563823', '$2y$10$Mcb4gv9neCvpzQu.6Jvgv.eFu44oz9jC61Grd.my8aJKfhhNsxwQq', '2024-04-10 09:14:36', '4', ''),
(5, 'uwajesus', 'umu', 'one', 'female', '.uwajesus@gmail.com', 'o780987554', '$2y$10$Dm3yfse8BxoaW7hsIFc.yukIBFnkdZHwN4UuYqIkoRKua5Fe8aYzi', '2024-04-10 09:16:33', '8', ''),
(6, 'mukahagenimana', 'heppy', 'eee', 'female', 'mukahagenimanaheppy@gmail.com', '0783767889', '$2y$10$z4JG0JkCM7S06Hw0pUU2pOP/NTl6biV6IqgAxp8LO2/ZaoouIwxa2', '2024-04-10 09:26:33', '9', ''),
(7, 'hakizimana', 'ildephonse', 'ildephonse', 'male', 'hakizimanaildephonse02@gmail.com', '0788833311', '$2y$10$1jjWlSE0Sb.Xb8U8ijZDQua3gF9g1MhE.yiYf3GuWW.zxRZaMiSQy', '2024-04-10 09:28:59', '5', ''),
(8, 'uwumugisha', 'solange', 'danny1', 'female', 'uwumugishasolange@gmail.com', '0794563721', '$2y$10$w2VDyAF.LF9jJgVbK9SyIeEYrwVMXaYhy6ZUkfdzqbZ3KHEXSW8l.', '2024-04-10 09:42:10', '8', ''),
(9, 'Iradukunda', 'jack', 'mmmm', 'male', 'iradukundajack@gmail.com', '0794563729', '$2y$10$hmcEXypss5FPwWfDsPZ0ke6JmcFBACt.s9M6uxW.1XU/ySzkpUhgW', '2024-04-23 07:53:59', '', ''),
(10, 'habiyaremye', 'daniel', 'daniel1', 'male', 'habiyaremyedaniel01@gmail.com', '0794513720', '$2y$10$ojuveU.pz2SCSMUFC7To6udsnk0U8RiXLUJTmDU8jLU7mhUGbC8zC', '2024-04-26 12:11:01', '', '0'),
(11, 'kwizera', 'jean', 'jean1', 'male', 'kwizerajean@gmail.com', '0794563750', '$2y$10$Okf6nqldlJoyWPW0PEBrx.YoNPuzqvr/3jb94le9YYpyeNp4nh8bi', '2024-04-26 12:45:48', '', '0'),
(12, 'uwihirwe', 'julia', 'uwihirwe1', 'female', 'uwihirwejulia@gmail.com', '0794576328', '$2y$10$W9j4e93mvRahp6d1yv.7keLPaQ75HOojID5yN2HSUj2RK434xyz2K', '2024-04-27 13:50:18', '', '0'),
(13, 'eric', 'nsengimana', 'kkkk', 'female', 'uytrewqrtyuiopo@gmail.coom', '0794563721', '$2y$10$ei9vszM5pLlHrgeeoyDOHuzp.gKyRo3b3qZlYAZYloc.WK7oZQQiS', '2024-04-28 18:57:48', '', '0'),
(14, 'eric', 'nsengimana', 'alphonse01@', 'male', 'mbarushimanafred@gmail.com', '67889', '$2y$10$wIowY.mNpIQEU.olgK7WC.vWVppHV9MJ2J/5mjeGSIW2vIx/m7nXK', '2024-04-28 19:01:39', '', '0'),
(15, 'daniel', 'nsengimana', 'daniel', 'male', 'daniel@gmail.com', '0725050277', '$2y$10$paKFykRakTn.Csae2MksiuEuSaB00NJK2e.Eyf.TNhX.y.UPP9foK', '2024-04-29 09:04:33', '', '0'),
(16, 'eric', 'nsengimana', 'eric', 'male', 'ericnsengimana01@gmail.com', '0794563720', '1234', '2024-04-29 09:07:39', '', '0'),
(17, 'daniel', 'habiyaremye', 'daniel', 'female', 'habiyaremyedaniel01@gmail.com', '0725050277', '12345', '2024-04-29 09:10:40', '', '0'),
(18, 'edouard', 'nsengiyumva', 'edouard', 'male', 'ed@gmail.com', '0725050277', '12345', '2024-04-29 09:42:49', '', '0'),
(19, 'ishimwe', 'hugues', 'ishimwehugues', 'male', 'ishimwehugues@gmail.com', '0794555673', '9999', '2024-04-29 09:51:43', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vid` int(5) NOT NULL,
  `vfname` varchar(20) NOT NULL,
  `vlname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `vemail` varchar(35) NOT NULL,
  `district` varchar(15) NOT NULL,
  `sector` varchar(20) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `village` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vid`, `vfname`, `vlname`, `phone`, `vemail`, `district`, `sector`, `cell`, `village`) VALUES
(2, '', '', '', '', '', '', '', ''),
(5, 'ishimwe ', 'aloys', '0793456218', 'ishimwe aloys077gmail.com', 'rulindo', 'mukura', 'rubona', 'rubona'),
(6, 'manirakiza', 'sifa', '0788811103', 'manirakizasifa@gmail.com', 'rusizi', 'ruliba', 'miyove', 'umutekano'),
(7, 'uuunfbfeh', 'eeerr', '534405483833', '2343224vcfghjl', 'rebero', 'rukomo', 'kiunyami', 'dimba'),
(8, 'NSABIMANA', 'DANIEL', '0783245673', 'HABIYAREMYEDANIEL@GMAIL.COM', 'GICUMBI', 'BUSHOKE', 'MUKOTO', 'MAREBA'),
(15, 'mukahagena', 'karori', '0788834562', 'mukeshagena', 'ruhango', 'ruvune', 'nyacyong', 'rutwe'),
(16, '', '', '', '', '', '', '', ''),
(17, 'uwihirwe', 'julia', '0794576328', 'uwihirwejulia@gmail.com', 'gicumbi', 'rukomo', 'ituze', 'rukomo'),
(18, 'ngabonziza', 'faustin', '0794576322', 'ngabonzizafaustin@gmail.com', 'gicumbi', 'rukomo', 'ituze', 'rukomo'),
(19, 'mbarushimana', 'fred', 'drftgyui', 'mbarushimanafred@gmail.com', 'drty', '5678', 'dfghjk', '4567'),
(20, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(21, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(22, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(23, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(24, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(25, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(26, 'hagenimana', 'dufatanye', '0784567990', 'hagenimanadufatanye@gmail.com', 'rtyu', 'sdfghj', 'dfghjkl', '0'),
(27, '', '', '', '', '', '', '', ''),
(28, 'habumugisha ', 'danny', '+8765434509', 'habumugishadaniel@gmail.com', 'gisagara', 'mukeke', 'mubanji', '0'),
(29, 'eric', 'nsengimana', '0783456786', 'ishimwejeanhugues', 'gicumbi', 'gisiza', 'rukomo', '0'),
(30, 'eric', 'nsengimana', '0737317171', 'ishimwejeanhugues', 'gicumbi', 'rukomo', 'mukono', '0'),
(31, 'eric', 'nsengimana', '0737317171', 'ishimwejeanhugues', 'gicumbi', 'rukomo', 'mukono', '0'),
(32, 'eric', 'nsengimana', '0737317171', 'ishimwejeanhugues', 'huye', 'gisiza', 'mukono', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `orid` (`orid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`orid`),
  ADD KEY `pid` (`pid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `vid` (`vid`,`orid`),
  ADD KEY `orid` (`orid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `orid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`orid`) REFERENCES `product_order` (`orid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`orid`) REFERENCES `product_order` (`orid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
