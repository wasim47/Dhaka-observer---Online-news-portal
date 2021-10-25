-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 07:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `winuxgro_artnsign`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_code` int(20) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `#client_code` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`client_code`),
  UNIQUE KEY `client_name` (`client_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_code`, `client_name`, `#client_code`, `address`, `client_phone`, `client_email`, `active`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(1, 'Banglalink', 0, 'Tiger''s Den, SW (H), Polt  # 04, Gulshan-1,Dhaka-1212', '', '', 1, '2013-04-10', '', 'store.dhaka@artsignbd.com', ''),
(2, 'Airtel', 0, 'Plot-15, Road-103, Block- cen (c), Pink city, 5th Floor, Gulshan, Dhaka-1212', '88 02 8836990-7', 'Partner.service@in.airtel.com', 1, '2013-04-10', '2013-04-10', 'store.dhaka@artsignbd.com', 'store.dhaka@artsignb'),
(3, 'BSRM', 0, 'Ali Mansion, 1207/1099, Sadarghat road, chittagong', '88 03 2854901-10', 'mail@bsrm.com', 1, '2013-04-10', '', 'store.dhaka@artsignbd.com', ''),
(4, 'BEOL', 0, 'Land view Commercial center , 10th floor, 28 gulshan North C/A Dhaka-1212', '88 02 8815319', '', 1, '2013-04-10', '', 'store.dhaka@artsignbd.com', ''),
(5, 'Grameen Phone Ltd.', 0, 'GP House, Bashundhara Baridhara Dhaka', '', '', 1, '2013-04-15', '2013-04-15', 'store.dhaka@artsignbd.com', 'store.dhaka@artsignb'),
(6, 'Robi Axita Ltd.', 0, '53 Gulshan South Ave Gulshan-1 Dhaka', '', '', 1, '2013-04-15', '', 'store.dhaka@artsignbd.com', ''),
(8, 'The City Bank Ltd.', 0, 'Gulshan Ave', '', '', 1, '2013-04-15', '', 'store.dhaka@artsignbd.com', ''),
(9, 'wasim', 0, 'mirpur', '8828123', 'wasim.winux@gmail.com', 1, '2013-04-16', '', 'sazedul.winux@gmail.com', ''),
(10, 'Ibrahim', 0, 'MIrpur', '88 02 8836990-7', 'wasim.html@gmail.com', 1, '2013-04-16', '', 'sazedul.winux@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_contact_list`
--

CREATE TABLE IF NOT EXISTS `client_contact_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `client_code` int(10) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `contact_person_phone` varchar(255) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_person_email` (`contact_person_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_contact_list`
--

INSERT INTO `client_contact_list` (`id`, `client_name`, `client_code`, `contact_person_name`, `contact_person_email`, `contact_person_phone`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(1, 'Ibrahim', 10, 'wasim', 'Test wasim', '458959', '2013-04-16', '', 'sazedul.winux@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_names`
--

CREATE TABLE IF NOT EXISTS `company_names` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(100) NOT NULL,
  `thumb_path` varchar(100) NOT NULL,
  `person_id` int(10) NOT NULL,
  `default` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `io_material_list`
--

CREATE TABLE IF NOT EXISTS `io_material_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `io_number` int(20) NOT NULL,
  `iwo_number` int(20) NOT NULL,
  `local` tinyint(1) NOT NULL DEFAULT '0',
  `return` tinyint(1) NOT NULL DEFAULT '0',
  `material_name` varchar(100) NOT NULL,
  `material_code` int(30) NOT NULL,
  `material_group` varchar(100) NOT NULL,
  `measurement_unit` varchar(20) NOT NULL,
  `sub_group` varchar(100) NOT NULL,
  `material_qty` float(20,1) NOT NULL,
  `unit_price_avg` float(20,2) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_price` float(20,2) NOT NULL,
  `io_date` varchar(20) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `issue_order`
--

CREATE TABLE IF NOT EXISTS `issue_order` (
  `io_number` int(20) NOT NULL AUTO_INCREMENT,
  `iwo_number` int(255) NOT NULL,
  `local` tinyint(1) NOT NULL DEFAULT '0',
  `gtotal` int(255) NOT NULL,
  `io_date` varchar(20) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `comment` varchar(300) NOT NULL,
  PRIMARY KEY (`io_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 COMMENT='issue_order' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `iwo`
--

CREATE TABLE IF NOT EXISTS `iwo` (
  `iwo_number` int(20) NOT NULL AUTO_INCREMENT,
  `#iwo_number` int(20) DEFAULT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_code` int(10) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `po_number` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_phone` varchar(255) NOT NULL,
  `printing_po_number` varchar(255) NOT NULL,
  `factory_name` varchar(255) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `deliveryDate` varchar(255) NOT NULL,
  `issued_by` varchar(255) NOT NULL,
  `issued_to` varchar(255) NOT NULL,
  `iwoDate` varchar(255) NOT NULL,
  `gtotal_quantity` float(20,2) NOT NULL,
  PRIMARY KEY (`iwo_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `iwo_product_list`
--

CREATE TABLE IF NOT EXISTS `iwo_product_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `iwo_number` int(20) DEFAULT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_code` int(10) NOT NULL,
  `contact_person_name` varchar(100) NOT NULL,
  `contact_person_phone` int(30) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `measurement_size` varchar(100) NOT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `total_quantity` varchar(255) NOT NULL,
  `issued_by` varchar(20) NOT NULL,
  `issued_to` varchar(20) NOT NULL,
  `iwoDate` varchar(20) NOT NULL,
  `deliveryDate` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `languages` varchar(40) NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languages`, `person_id`) VALUES
(48, 'English', 12),
(47, 'Arabic', 12),
(45, 'English', 13),
(46, 'Korean', 13);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `location` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `company_name` int(10) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `address`, `company_name`, `active`) VALUES
(12, 'Hyattsville', '7515 Annapolis Road, Suite 212,\r\nHyattsville, MD 20784', 1, '1'),
(11, 'College Park', '6201 Greenbelt Road, Suite M-16\r\nCollege Park, MD 20740', 1, '1'),
(14, 'winux', 'Road#36,Gulshan-2', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `material_group` varchar(40) NOT NULL,
  `group_code` int(10) NOT NULL,
  `sub_group` varchar(20) NOT NULL,
  `sub_group_code` varchar(30) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_code` int(20) NOT NULL,
  `measurement_unit` varchar(10) NOT NULL,
  `opening_balance` int(100) NOT NULL,
  `opening_qty` int(100) NOT NULL,
  `publish` varchar(20) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` varchar(20) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_code` (`material_code`),
  UNIQUE KEY `material_code_2` (`material_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=420 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material_group`, `group_code`, `sub_group`, `sub_group_code`, `material_name`, `material_code`, `measurement_unit`, `opening_balance`, `opening_qty`, `publish`, `active`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(283, 'Media', 20, 'Honey Comb Media', '2005', 'Reflective PVC Honey Comb-520GSM,126(inch)', 1200501, 'sft', 250000, 5000, '1', 0, '12/12/2013', '2013-04-01', '', 'zakir@artsignbd.com'),
(282, 'Media', 20, 'Lamination Media', '2004', 'Lamination Matte-200GSM5''', 1200406, 'sft', 10, 10, '1', 0, '12/11/2013', '', '', ''),
(281, 'Media', 20, 'Lamination Media', '2004', 'Lamination Matte-200GSM, 4''', 1200405, 'sft', 10, 10, '1', 0, '12/10/2013', '', '', ''),
(279, 'Media', 20, 'Lamination Media', '2004', 'Lamination Glossy-200GSM, 5''', 1200403, 'sft', 10, 10, '1', 0, '12/8/2013', '', '', ''),
(280, 'Media', 20, 'Lamination Media', '2004', 'Lamination Matte-200GSM, 3''', 1200404, 'sft', 10, 10, '1', 0, '12/9/2013', '', '', ''),
(278, 'Media', 20, 'Lamination Media', '2004', 'Lamination Glossy-200GSM, 4''', 1200402, 'sft', 10, 10, '1', 0, '12/7/2013', '', '', ''),
(277, 'Media', 20, 'Lamination Media', '2004', 'Lamination Glossy-200GSM, 3''', 1200401, 'sft', 10, 10, '1', 0, '12/6/2013', '', '', ''),
(276, 'Media', 20, 'Vinyl Media', '2003', 'Self Adhesive Vinyle-120GSM, 5''', 1200303, 'sft', 10, 10, '1', 0, '12/5/2013', '', '', ''),
(275, 'Media', 20, 'Vinyl Media', '2003', 'Self Adhesive Vinyle-120GSM, 4''', 1200302, 'sft', 10, 10, '1', 0, '12/4/2013', '', '', ''),
(274, 'Media', 20, 'Vinyl Media', '2003', 'Self Adhesive Vinyle-120GSM, 3''', 1200301, 'sft', 10, 10, '1', 0, '12/3/2013', '', '', ''),
(273, 'Media', 20, 'Fex Media', '2002', 'Backlit Flex -580GSM, 3''', 1200205, 'sft', 10, 10, '1', 0, '12/2/2013', '', '', ''),
(272, 'Media', 20, 'Fex Media', '2002', 'Backlit Flex-580GSM, 4.5''', 1200204, 'sft', 10, 10, '1', 0, '12/1/2013', '', '', ''),
(271, 'Media', 20, 'Fex Media', '2002', 'BackLIt Flex-580GSM, 10.5''', 1200203, 'sft', 10, 10, '1', 0, '11/30/2013', '', '', ''),
(270, 'Media', 20, 'Fex Media', '2002', 'Backlit Flex- 580GSM, 8.5''', 1200202, 'sft', 10, 10, '1', 0, '11/29/2013', '', '', ''),
(269, 'Media', 20, 'Fex Media', '2002', 'Backlit Flex- 580GSM, 6.5''', 1200201, 'sft', 10, 10, '1', 0, '11/28/2013', '', '', ''),
(268, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-340GSM, 78(inch)', 1200118, 'sft', 10, 10, '1', 0, '11/27/2013', '', '', ''),
(267, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-380GSM, 90(inch)', 1200117, 'sft', 10, 10, '1', 0, '11/26/2013', '', '', ''),
(266, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-360GSM, 109(inch)', 1200116, 'sft', 10, 10, '1', 0, '11/25/2013', '', '', ''),
(265, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-340GSM, 102(inch)', 1200115, 'sft', 10, 10, '1', 0, '11/24/2013', '', '', ''),
(264, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-340GSM, 117(inch)', 1200114, 'sft', 10, 10, '1', 0, '11/23/2013', '', '', ''),
(263, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-380GSM, 109(inch)', 1200113, 'sft', 10, 10, '1', 0, '11/22/2013', '', '', ''),
(262, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-340GSM, 109(inch)', 1200112, 'sft', 10, 10, '1', 0, '11/21/2013', '', '', ''),
(261, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-340GSM, 117(inch)', 1200111, 'sft', 10, 10, '1', 0, '11/20/2013', '', '', ''),
(260, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-340GSM, 102(inch)', 1200110, 'sft', 10, 10, '1', 0, '11/19/2013', '', '', ''),
(26, 'Elecric Goods', 11, 'Switch', '1105', 'Switch-MK 8 mpr', 1110504, 'Pcs', 10, 10, '1', 0, '3/30/2013', '', '', ''),
(25, 'Elecric Goods', 11, 'Switch', '1105', 'Switch-MK 20 mpr', 1110503, 'Pcs', 10, 10, '1', 0, '3/29/2013', '', '', ''),
(24, 'Elecric Goods', 11, 'Switch', '1105', 'Switch-Ceramic 8 mpr', 1110502, 'Pcs', 10, 10, '1', 0, '3/28/2013', '', '', ''),
(23, 'Elecric Goods', 11, 'Switch', '1105', 'Switch-Ceramic 20 mpr', 1110501, 'Pcs', 10, 10, '1', 0, '3/27/2013', '', '', ''),
(22, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable-White', 1110406, 'Coil', 10, 10, '1', 0, '3/26/2013', '', '', ''),
(21, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable-7/22', 1110405, 'Coil', 10, 10, '1', 0, '3/25/2013', '', '', ''),
(20, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable-40/76', 1110404, 'Coil', 10, 10, '1', 0, '3/24/2013', '', '', ''),
(19, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable-23/76', 1110403, 'Coil', 10, 10, '1', 0, '3/23/2013', '', '', ''),
(18, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable 3/29', 1110402, 'Coil', 10, 10, '1', 0, '3/22/2013', '', '', ''),
(17, 'Elecric Goods', 11, 'Electric Cable', '1104', 'Electric Cable-3/22', 1110401, 'Coil', 10, 10, '1', 0, '3/21/2013', '', '', ''),
(16, 'Elecric Goods', 11, 'starter', '1103', 'Starter', 1110301, 'Pcs', 10, 10, '1', 0, '3/20/2013', '', '', ''),
(419, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht', 110207, 'Pcs', 1780, 10, '0', 0, '2013-04-03', '', 'store.dhaka@artsignb', ''),
(14, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-20w (Atco)', 1110206, 'Pcs', 10, 10, '1', 0, '3/18/2013', '', '', ''),
(13, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-20w (Eastern)', 1110205, 'Pcs', 10, 10, '1', 0, '3/17/2013', '', '', ''),
(12, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-20w (Racer)', 1110204, 'Pcs', 10, 10, '1', 0, '3/16/2013', '', '', ''),
(11, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-40w (Atco)', 1110203, 'Pcs', 10, 10, '1', 0, '3/15/2013', '', '', ''),
(10, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-40w (Eastern)', 1110202, 'Pcs', 10, 10, '1', 0, '3/14/2013', '', '', ''),
(9, 'Elecric Goods', 11, 'Balasht', '1102', 'Balasht-40w (Racer)', 1110201, 'Pcs', 10, 10, '1', 0, '3/13/2013', '', '', ''),
(8, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light (Slim)-4''', 1110108, 'Pcs', 10, 10, '1', 0, '3/12/2013', '', '', ''),
(7, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-4''(Transtec)', 1110107, 'Pcs', 10, 10, '1', 0, '3/11/2013', '', '', ''),
(6, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-4''(Philips)', 1110106, 'Pcs', 10, 10, '1', 0, '3/10/2013', '', '', ''),
(5, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light (Slim)-2''', 1110105, 'Pcs', 10, 10, '1', 0, '3/9/2013', '', '', ''),
(4, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-2''(Transtec)', 1110104, 'Pcs', 10, 10, '1', 0, '3/8/2013', '', '', ''),
(3, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-2''(Philips)', 1110103, 'Pcs', 10, 10, '1', 0, '3/7/2013', '', '', ''),
(1, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-1''(Philips)', 1110101, 'Pcs', 10, 10, '1', 0, '3/5/2013', '0', '0', '0'),
(2, 'Elecric Goods', 11, 'Tube Light', '1101', 'Tube Light-1''(Transtec)', 1110102, 'Pcs', 10, 10, '1', 0, '3/6/2013', '', '', ''),
(259, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-340GSM,122(inch)', 1200109, 'sft', 10, 10, '1', 0, '11/18/2013', '', '', ''),
(258, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-270GSM,126(inch)', 1200108, 'sft', 10, 10, '1', 0, '11/17/2013', '', '', ''),
(257, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-320GSM,126(inch)', 1200107, 'sft', 10, 10, '1', 0, '11/16/2013', '', '', ''),
(256, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-300GSM,126(inch)', 1200106, 'sft', 10, 10, '1', 0, '11/15/2013', '', '', ''),
(255, 'Media', 20, 'PVC Media', '2001', 'PVC Black Back-340GSM,126(inch)', 1200105, 'sft', 10, 10, '1', 0, '11/14/2013', '', '', ''),
(254, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-270GSM,126(inch)', 1200104, 'sft', 10, 10, '1', 0, '11/13/2013', '', '', ''),
(253, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-300GSM,126(inch)', 1200103, 'sft', 10, 10, '1', 0, '11/12/2013', '', '', ''),
(252, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-320GSM,126(inch)', 1200102, 'sft', 10, 10, '1', 0, '11/11/2013', '', '', ''),
(251, 'Media', 20, 'PVC Media', '2001', 'PVC White Back-340GSM,126(inch)', 1200101, 'sft', 10, 10, '1', 0, '11/10/2013', '', '', ''),
(250, 'Iron & Metal', 19, 'SS Pipe', '1906', 'SS Pipe- 1.5x1(inch)', 1190602, 'rft', 10, 10, '1', 0, '11/9/2013', '', '', ''),
(249, 'Iron & Metal', 19, 'SS Pipe', '1906', 'SS Pipe-1/2(inch)', 1190601, 'rft', 10, 10, '1', 0, '11/8/2013', '', '', ''),
(248, 'Iron & Metal', 19, 'Flat Bar', '1905', 'Flat Bar-3/4(inch)', 1190504, 'Kg', 10, 10, '1', 0, '11/7/2013', '', '', ''),
(247, 'Iron & Metal', 19, 'Flat Bar', '1905', 'Flat Bar-1(inch)', 1190503, 'Kg', 10, 10, '1', 0, '11/6/2013', '', '', ''),
(246, 'Iron & Metal', 19, 'Flat Bar', '1905', 'Flat Bar-1.5(inch)', 1190502, 'Kg', 10, 10, '1', 0, '11/5/2013', '', '', ''),
(245, 'Iron & Metal', 19, 'Flat Bar', '1905', 'Flat Bar-2(inch)', 1190501, 'Kg', 10, 10, '1', 0, '11/4/2013', '', '', ''),
(244, 'Iron & Metal', 19, 'Angle', '1904', 'T Patti', 1190407, 'Kg', 10, 10, '1', 0, '11/3/2013', '', '', ''),
(243, 'Iron & Metal', 19, 'Angle', '1904', 'Clam-1x1(inch)', 1190406, 'Kg', 10, 10, '1', 0, '11/2/2013', '', '', ''),
(242, 'Iron & Metal', 19, 'Angle', '1904', 'Angle-1/2(inch)', 1190405, 'Kg', 10, 10, '1', 0, '11/1/2013', '', '', ''),
(241, 'Iron & Metal', 19, 'Angle', '1904', 'Angle-3/4(inch)', 1190404, 'Kg', 10, 10, '1', 0, '10/31/2013', '', '', ''),
(240, 'Iron & Metal', 19, 'Angle', '1904', 'Angle-1(inch)', 1190403, 'Kg', 10, 10, '1', 0, '10/30/2013', '', '', ''),
(239, 'Iron & Metal', 19, 'Angle', '1904', 'Angle-1.5(inch)', 1190402, 'Kg', 10, 10, '1', 0, '10/29/2013', '', '', ''),
(238, 'Iron & Metal', 19, 'Angle', '1904', 'Angle-2(inch)', 1190401, 'Kg', 10, 10, '1', 0, '10/28/2013', '', '', ''),
(237, 'Iron & Metal', 19, 'Back Sheet', '1903', 'Back Sheet-28/32Gez', 1190302, 'Kg', 10, 10, '1', 0, '10/27/2013', '', '', ''),
(236, 'Iron & Metal', 19, 'Back Sheet', '1903', 'Back Sheet-20/24 Gez', 1190301, 'Kg', 10, 10, '1', 0, '10/26/2013', '', '', ''),
(235, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-3.5(inch)', 1190207, 'rft', 10, 10, '1', 0, '10/25/2013', '', '', ''),
(234, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-2(inch)', 1190206, 'rft', 10, 10, '1', 0, '10/24/2013', '', '', ''),
(233, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-1.5(inch)', 1190205, 'rft', 10, 10, '1', 0, '10/23/2013', '', '', ''),
(232, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-1.25(inch)', 1190204, 'rft', 10, 10, '1', 0, '10/22/2013', '', '', ''),
(231, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-1/2(inch)', 1190203, 'rft', 10, 10, '1', 0, '10/21/2013', '', '', ''),
(230, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-3/4(inch)', 1190202, 'rft', 10, 10, '1', 0, '10/20/2013', '', '', ''),
(229, 'Iron & Metal', 19, 'Round Pipe', '1902', 'MS Round Pipe-1(inch)', 1190201, 'rft', 10, 10, '1', 0, '10/19/2013', '', '', ''),
(228, 'Iron & Metal', 19, 'Box pipe', '1901', 'Box Pipe-1/2(inch)', 1190104, 'rft', 10, 10, '1', 0, '10/18/2013', '', '', ''),
(227, 'Iron & Metal', 19, 'Box pipe', '1901', 'Box Pipe-2(inch)', 1190103, 'rft', 10, 10, '1', 0, '10/17/2013', '', '', ''),
(226, 'Iron & Metal', 19, 'Box pipe', '1901', 'Box Pipe-3/4(inch)', 1190102, 'rft', 10, 10, '1', 0, '10/16/2013', '', '', ''),
(225, 'Iron & Metal', 19, 'Box pipe', '1901', 'Box Pipe-1(inch)', 1190101, 'rft', 10, 10, '1', 0, '10/15/2013', '', '', ''),
(224, 'Aluminium', 18, 'Profile', '1802', 'Alcobond', 1180206, 'Pcs', 10, 10, '1', 0, '10/14/2013', '', '', ''),
(223, 'Aluminium', 18, 'Profile', '1802', 'Profile-Corner', 1180205, 'Pcs', 10, 10, '1', 0, '10/13/2013', '', '', ''),
(222, 'Aluminium', 18, 'Profile', '1802', 'Profile-Channel', 1180204, 'Pcs', 10, 10, '1', 0, '10/12/2013', '', '', ''),
(221, 'Aluminium', 18, 'Profile', '1802', 'Profile-Back Part', 1180203, 'Pcs', 10, 10, '1', 0, '10/11/2013', '', '', ''),
(220, 'Aluminium', 18, 'Profile', '1802', 'Profile-Front Part', 1180202, 'Pcs', 10, 10, '1', 0, '10/10/2013', '', '', ''),
(219, 'Aluminium', 18, 'Profile', '1802', 'Profile', 1180201, 'set', 10, 10, '1', 0, '10/9/2013', '', '', ''),
(218, 'Aluminium', 18, 'Channel', '1801', 'Others Channel', 1180104, 'Pcs', 10, 10, '1', 0, '10/8/2013', '', '', ''),
(217, 'Aluminium', 18, 'Channel', '1801', 'Channel-1/2(inch)', 1180103, 'Pcs', 10, 10, '1', 0, '10/7/2013', '', '', ''),
(216, 'Aluminium', 18, 'Channel', '1801', 'Channel-3/4(inch)', 1180102, 'Pcs', 10, 10, '1', 0, '10/6/2013', '', '', ''),
(215, 'Aluminium', 18, 'Channel', '1801', 'Channel-1(inch)', 1180101, 'Pcs', 10, 10, '1', 0, '10/5/2013', '', '', ''),
(214, 'Ink Item', 17, 'Repair & main. Mach.', '1705', 'Cloth-Machine Room', 1170502, 'pkt', 10, 10, '1', 0, '10/4/2013', '', '', ''),
(213, 'Ink Item', 17, 'Repair & main. Mach.', '1705', 'Tissue Paper', 1170501, 'pkt', 10, 10, '1', 0, '10/3/2013', '', '', ''),
(212, 'Ink Item', 17, 'Inkjet Cartridge', '1704', 'Inkjet Cartridge-Black', 1170404, 'ltr', 10, 10, '1', 0, '10/2/2013', '', '', ''),
(211, 'Ink Item', 17, 'Inkjet Cartridge', '1704', 'Inkjet Cartridge-Yellow', 1170403, 'ltr', 10, 10, '1', 0, '10/1/2013', '', '', ''),
(210, 'Ink Item', 17, 'Inkjet Cartridge', '1704', 'Inkjet Cartridge-Magenda', 1170402, 'ltr', 10, 10, '1', 0, '9/30/2013', '', '', ''),
(209, 'Ink Item', 17, 'Inkjet Cartridge', '1704', 'Inkjet Cartridge-CYAN', 1170401, 'ltr', 10, 10, '1', 0, '9/29/2013', '', '', ''),
(208, 'Ink Item', 17, 'Inject', '1703', 'Inkjet INK-Black', 1170304, 'ltr', 10, 10, '1', 0, '9/28/2013', '', '', ''),
(207, 'Ink Item', 17, 'Inject', '1703', 'Inkjet INK-Yellow', 1170303, 'ltr', 10, 10, '1', 0, '9/27/2013', '', '', ''),
(206, 'Ink Item', 17, 'Inject', '1703', 'Inkjet INK-Magenda', 1170302, 'ltr', 10, 10, '1', 0, '9/26/2013', '', '', ''),
(205, 'Ink Item', 17, 'Inject', '1703', 'Inkjet INK-CYAN', 1170301, 'ltr', 10, 10, '1', 0, '9/25/2013', '', '', ''),
(204, 'Ink Item', 17, 'China', '1702', 'Solvent/Jet Wash-China', 1170205, 'ltr', 10, 10, '1', 0, '9/24/2013', '', '', ''),
(203, 'Ink Item', 17, 'China', '1702', 'Solvent INK(China)-Black', 1170204, 'ltr', 10, 10, '1', 0, '9/23/2013', '', '', ''),
(202, 'Ink Item', 17, 'China', '1702', 'Solvent INK(China)-Yellow', 1170203, 'ltr', 10, 10, '1', 0, '9/22/2013', '', '', ''),
(201, 'Ink Item', 17, 'China', '1702', 'Solvent INK(China)-Magenda', 1170202, 'ltr', 10, 10, '1', 0, '9/21/2013', '', '', ''),
(200, 'Ink Item', 17, 'China', '1702', 'Solvent INK(China)-CYAN', 1170201, 'ltr', 10, 10, '1', 0, '9/20/2013', '', '', ''),
(199, 'Ink Item', 17, 'Jeti', '1701', 'Solvent/Jet Wash-Jeti', 1170107, 'ltr', 10, 10, '1', 0, '9/19/2013', '', '', ''),
(198, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-Black', 1170106, 'ltr', 10, 10, '1', 0, '9/18/2013', '', '', ''),
(197, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-Yellow', 1170105, 'ltr', 10, 10, '1', 0, '9/17/2013', '', '', ''),
(196, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-Light Magenda', 1170104, 'ltr', 10, 10, '1', 0, '9/16/2013', '', '', ''),
(195, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-Magenda', 1170103, 'ltr', 10, 10, '1', 0, '9/15/2013', '', '', ''),
(194, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-Light CYAN', 1170102, 'ltr', 10, 10, '1', 0, '9/14/2013', '', '', ''),
(193, 'Ink Item', 17, 'Jeti', '1701', 'Solvent INK(Jeti)-CYAN', 1170101, 'ltr', 10, 10, '1', 0, '9/13/2013', '', '', ''),
(192, 'Paints/Colour', 16, 'others paints items', '1604', 'Tuli', 1160407, 'Pcs', 10, 10, '1', 0, '9/12/2013', '', '', ''),
(191, 'Paints/Colour', 16, 'others paints items', '1604', 'Rolar Brash-4(inch)', 1160406, 'Pcs', 10, 10, '1', 0, '9/11/2013', '', '', ''),
(190, 'Paints/Colour', 16, 'others paints items', '1604', 'Rolar Brash-2(inch)', 1160405, 'Pcs', 10, 10, '1', 0, '9/10/2013', '', '', ''),
(189, 'Paints/Colour', 16, 'others paints items', '1604', 'Brash2(inch)', 1160404, 'Pcs', 10, 10, '1', 0, '9/9/2013', '', '', ''),
(188, 'Paints/Colour', 16, 'others paints items', '1604', 'Brash-4(inch)', 1160403, 'Pcs', 10, 10, '1', 0, '9/8/2013', '', '', ''),
(187, 'Paints/Colour', 16, 'others paints items', '1604', 'Brash-3(inch)', 1160402, 'Pcs', 10, 10, '1', 0, '9/7/2013', '', '', ''),
(186, 'Paints/Colour', 16, 'others paints items', '1604', 'Chalk Powder', 1160401, 'Kg', 10, 10, '1', 0, '9/6/2013', '', '', ''),
(185, 'Paints/Colour', 16, 'Thinner', '1603', 'Thinner', 1160302, 'gl', 10, 10, '1', 0, '9/5/2013', '', '', ''),
(184, 'Paints/Colour', 16, 'Thinner', '1603', 'Tarpin', 1160301, 'gl', 10, 10, '1', 0, '9/4/2013', '', '', ''),
(183, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-BL Colorbank', 1160206, 'gl', 10, 10, '1', 0, '9/3/2013', '', '', ''),
(182, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-Orange', 1160205, 'gl', 10, 10, '1', 0, '9/2/2013', '', '', ''),
(181, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-Gray', 1160204, 'gl', 10, 10, '1', 0, '9/1/2013', '', '', ''),
(180, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-Off White', 1160203, 'gl', 10, 10, '1', 0, '8/31/2013', '', '', ''),
(179, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-White', 1160202, 'gl', 10, 10, '1', 0, '8/30/2013', '', '', ''),
(178, 'Paints/Colour', 16, 'Plastic Paints', '1602', 'Plastic Paint-Green', 1160201, 'gl', 10, 10, '1', 0, '8/29/2013', '', '', ''),
(177, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Black', 1160112, 'gl', 10, 10, '1', 0, '8/28/2013', '', '', ''),
(176, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Yellow', 1160111, 'gl', 10, 10, '1', 0, '8/27/2013', '', '', ''),
(175, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Chocolate', 1160110, 'gl', 10, 10, '1', 0, '8/26/2013', '', '', ''),
(174, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Silver Colour', 1160109, 'gl', 10, 10, '1', 0, '8/25/2013', '', '', ''),
(173, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Light Gray', 1160108, 'gl', 10, 10, '1', 0, '8/24/2013', '', '', ''),
(172, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Royal Blue', 1160107, 'gl', 10, 10, '1', 0, '8/23/2013', '', '', ''),
(171, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Red', 1160106, 'gl', 10, 10, '1', 0, '8/22/2013', '', '', ''),
(170, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Tengarine', 1160105, 'gl', 10, 10, '1', 0, '8/21/2013', '', '', ''),
(169, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Feroza', 1160104, 'gl', 10, 10, '1', 0, '8/20/2013', '', '', ''),
(168, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Orange', 1160103, 'gl', 10, 10, '1', 0, '8/19/2013', '', '', ''),
(167, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-Off White', 1160102, 'gl', 10, 10, '1', 0, '8/18/2013', '', '', ''),
(166, 'Paints/Colour', 16, 'Enamel Paints', '1601', 'Enamel Paint-White', 1160101, 'gl', 10, 10, '1', 0, '8/17/2013', '', '', ''),
(165, 'Plastic Item', 15, 'Super Glue', '1503', 'Super Glue-Gems Bond', 1150302, 'Pcs', 10, 10, '1', 0, '8/16/2013', '', '', ''),
(164, 'Plastic Item', 15, 'Super Glue', '1503', 'Super Glue-Fast', 1150301, 'Pcs', 10, 10, '1', 0, '8/15/2013', '', '', ''),
(163, 'Plastic Item', 15, 'Gulti', '1502', 'Gulti-1/2(inch)', 1150202, 'Pcs', 10, 10, '1', 0, '8/14/2013', '', '', ''),
(162, 'Plastic Item', 15, 'Gulti', '1502', 'Gulti-3/4(inch)', 1150201, 'Pcs', 10, 10, '1', 0, '8/13/2013', '', '', ''),
(161, 'Plastic Item', 15, 'Plastic pipe', '1501', 'Plastic Pipe-1/2(inch)', 1150103, 'rft', 10, 10, '1', 0, '8/12/2013', '', '', ''),
(160, 'Plastic Item', 15, 'Plastic pipe', '1501', 'Plastic Pipe-3/4(inch)', 1150102, 'rft', 10, 10, '1', 0, '8/11/2013', '', '', ''),
(159, 'Plastic Item', 15, 'Plastic pipe', '1501', 'Plastic Pipe-1(inch)', 1150101, 'rft', 10, 10, '1', 0, '8/10/2013', '', '', ''),
(158, 'Board Item', 14, 'Wood ', '1407', 'Gorzon Wood ', 1140701, 'Pcs', 10, 10, '1', 0, '8/9/2013', '', '', ''),
(157, 'Board Item', 14, 'Woodtex Board', '1406', 'Wood tex Board-18mm', 1140603, 'Pcs', 10, 10, '1', 0, '8/8/2013', '', '', ''),
(156, 'Board Item', 14, 'Woodtex Board', '1406', 'Wood tex Board-16mm', 1140602, 'Pcs', 10, 10, '1', 0, '8/7/2013', '', '', ''),
(155, 'Board Item', 14, 'Woodtex Board', '1406', 'Wood tex Board-12mm', 1140601, 'Pcs', 10, 10, '1', 0, '8/6/2013', '', '', ''),
(154, 'Board Item', 14, 'Acrylic Board', '1405', 'Acrylic Plastic Board-5mm', 1140503, 'Pcs', 10, 10, '1', 0, '8/5/2013', '', '', ''),
(153, 'Board Item', 14, 'Acrylic Board', '1405', 'Acrylic Plastic Board-3mm', 1140502, 'Pcs', 10, 10, '1', 0, '8/4/2013', '', '', ''),
(152, 'Board Item', 14, 'Acrylic Board', '1405', 'Acrylic Plastic Board-2mm', 1140501, 'Pcs', 10, 10, '1', 0, '8/3/2013', '', '', ''),
(151, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-18 mm', 1140406, 'Pcs', 10, 10, '1', 0, '8/2/2013', '', '', ''),
(150, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-12mm', 1140405, 'Pcs', 10, 10, '1', 0, '8/1/2013', '', '', ''),
(149, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-10mm', 1140404, 'Pcs', 10, 10, '1', 0, '7/31/2013', '', '', ''),
(148, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-6mm', 1140403, 'Pcs', 10, 10, '1', 0, '7/30/2013', '', '', ''),
(147, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-5mm', 1140402, 'Pcs', 10, 10, '1', 0, '7/29/2013', '', '', ''),
(146, 'Board Item', 14, 'Gorzon Ply Board', '1404', 'Plywood(Gorzon)-3mm', 1140401, 'Pcs', 10, 10, '1', 0, '7/28/2013', '', '', ''),
(145, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board (Other color)-18mm', 1140313, 'Pcs', 10, 10, '1', 0, '7/27/2013', '', '', ''),
(144, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Other color)-12mm', 1140312, 'Pcs', 10, 10, '1', 0, '7/26/2013', '', '', ''),
(143, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Red)-18mm', 1140311, 'Pcs', 10, 10, '1', 0, '7/25/2013', '', '', ''),
(142, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Red)-12mm', 1140310, 'Pcs', 10, 10, '1', 0, '7/24/2013', '', '', ''),
(141, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Yellow)-18mm', 1140309, 'Pcs', 10, 10, '1', 0, '7/23/2013', '', '', ''),
(140, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Yellow)-12mm', 1140308, 'Pcs', 10, 10, '1', 0, '7/22/2013', '', '', ''),
(139, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Orange)-18mm', 1140307, 'Pcs', 10, 10, '1', 0, '7/21/2013', '', '', ''),
(138, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Orange)-12mm', 1140306, 'Pcs', 10, 10, '1', 0, '7/20/2013', '', '', ''),
(137, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Black)-18mm', 1140305, 'Pcs', 10, 10, '1', 0, '7/19/2013', '', '', ''),
(136, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Black)-12mm', 1140304, 'Pcs', 10, 10, '1', 0, '7/18/2013', '', '', ''),
(135, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Anatur)-18mm', 1140303, 'Pcs', 10, 10, '1', 0, '7/17/2013', '', '', ''),
(134, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Anatur)-16mm', 1140302, 'Pcs', 10, 10, '1', 0, '7/16/2013', '', '', ''),
(133, 'Board Item', 14, 'Malmine Board', '1403', 'Malamine Board(Anatur)-12mm', 1140301, 'Pcs', 10, 10, '1', 0, '7/15/2013', '', '', ''),
(132, 'Board Item', 14, 'MDF Board', '1402', 'MDF Board-18 mm', 1140204, 'Pcs', 10, 10, '1', 0, '7/14/2013', '', '', ''),
(131, 'Board Item', 14, 'MDF Board', '1402', 'MDF Board-12 mm', 1140203, 'Pcs', 10, 10, '1', 0, '7/13/2013', '', '', ''),
(130, 'Board Item', 14, 'MDF Board', '1402', 'MDF Board-6 mm', 1140202, 'Pcs', 10, 10, '1', 0, '7/12/2013', '', '', ''),
(129, 'Board Item', 14, 'MDF Board', '1402', 'MDF Board-3 mm', 1140201, 'Pcs', 10, 10, '1', 0, '7/11/2013', '', '', ''),
(128, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-18mm', 1140108, 'Pcs', 10, 10, '1', 0, '7/10/2013', '', '', ''),
(127, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-12 mm', 1140107, 'Pcs', 10, 10, '1', 0, '7/9/2013', '', '', ''),
(126, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-10 mm', 1140106, 'Pcs', 10, 10, '1', 0, '7/8/2013', '', '', ''),
(125, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-9 mm', 1140105, 'Pcs', 10, 10, '1', 0, '7/7/2013', '', '', ''),
(124, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-8 mm', 1140104, 'Pcs', 10, 10, '1', 0, '7/6/2013', '', '', ''),
(123, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-5 mm', 1140103, 'Pcs', 10, 10, '1', 0, '7/5/2013', '', '', ''),
(122, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-3 mm', 1140102, 'Pcs', 10, 10, '1', 0, '7/4/2013', '', '', ''),
(121, 'Board Item', 14, 'PVC Board', '1401', 'PVC Board-2 mm', 1140101, 'Pcs', 10, 10, '1', 0, '7/3/2013', '', '', ''),
(120, 'Welding Item', 13, 'Welding Cable', '1305', 'Welding Cable', 1130507, 'Coil', 10, 10, '1', 0, '7/2/2013', '', '', ''),
(119, 'Welding Item', 13, 'SS Welding Rod', '1304', 'SS Welding Rod', 1130401, 'Pcs', 10, 10, '1', 0, '7/1/2013', '', '', ''),
(118, 'Welding Item', 13, 'Welding Rod', '1303', 'Welding Rod-2.5', 1130302, 'pkt', 10, 10, '1', 0, '6/30/2013', '', '', ''),
(117, 'Welding Item', 13, 'Welding Rod', '1303', 'Welding Rod-3.2', 1130301, 'pkt', 10, 10, '1', 0, '6/29/2013', '', '', ''),
(116, 'Welding Item', 13, 'Granding Stone 4inch', '1302', 'Granding Stone-4(inch)', 1130201, 'Pcs', 10, 10, '1', 0, '6/28/2013', '', '', ''),
(115, 'Welding Item', 13, 'Cutting Stone', '1301', 'Cutting Stone-4(inch)', 1130102, 'Pcs', 10, 10, '1', 0, '6/27/2013', '', '', ''),
(114, 'Welding Item', 13, 'Cutting Stone', '1301', 'Cutting Stone-14(inch)', 1130101, 'Pcs', 10, 10, '1', 0, '6/26/2013', '', '', ''),
(113, 'Hardware', 12, 'Others Hardware', '1213', 'Clear Tape', 1121312, 'Pcs', 10, 10, '1', 0, '6/25/2013', '', '', ''),
(112, 'Hardware', 12, 'Others Hardware', '1213', 'Cartoon Tape', 1121311, 'Pcs', 10, 10, '1', 0, '6/24/2013', '', '', ''),
(111, 'Hardware', 12, 'Others Hardware', '1213', 'Chain', 1121310, 'Ft', 10, 10, '1', 0, '6/23/2013', '', '', ''),
(110, 'Hardware', 12, 'Others Hardware', '1213', 'PVC Tape', 1121309, 'Pcs', 10, 10, '1', 0, '6/22/2013', '', '', ''),
(109, 'Hardware', 12, 'Others Hardware', '1213', 'Eyelid', 1121308, 'Pcs', 10, 10, '1', 0, '6/21/2013', '', '', ''),
(108, 'Hardware', 12, 'Others Hardware', '1213', 'Ribon (For Festoon)', 1121307, 'Pcs', 10, 10, '1', 0, '6/20/2013', '', '', ''),
(107, 'Hardware', 12, 'Others Hardware', '1213', 'Festoone Rope', 1121306, 'Kg', 10, 10, '1', 0, '6/19/2013', '', '', ''),
(106, 'Hardware', 12, 'Others Hardware', '1213', 'Markin Cloth', 1121305, 'yds', 10, 10, '1', 0, '6/18/2013', '', '', ''),
(105, 'Hardware', 12, 'Others Hardware', '1213', 'Jhoot Cloth', 1121304, 'Kg', 10, 10, '1', 0, '6/17/2013', '', '', ''),
(104, 'Hardware', 12, 'Others Hardware', '1213', 'Hesco Blade', 1121303, 'Pcs', 10, 10, '1', 0, '6/16/2013', '', '', ''),
(103, 'Hardware', 12, 'Others Hardware', '1213', 'Washer', 1121302, 'Kg', 10, 10, '1', 0, '6/15/2013', '', '', ''),
(102, 'Hardware', 12, 'Others Hardware', '1213', 'Revets-450', 1121301, 'Box', 10, 10, '1', 0, '6/14/2013', '', '', ''),
(101, 'Hardware', 12, 'Wall Beat', '1212', 'Wall Beat-', 1121203, 'Pcs', 10, 10, '1', 0, '6/13/2013', '', '', ''),
(100, 'Hardware', 12, 'Wall Beat', '1212', 'Wall Beat-', 1121202, 'Pcs', 10, 10, '1', 0, '6/12/2013', '', '', ''),
(99, 'Hardware', 12, 'Wall Beat', '1212', 'Wall Beat-10no.', 1121201, 'Pcs', 10, 10, '1', 0, '6/11/2013', '', '', ''),
(98, 'Hardware', 12, 'Anticutter Blade-Big', '1211', 'Anticutter Blade-Small', 1121102, 'Pcs', 10, 10, '1', 0, '6/10/2013', '', '', ''),
(97, 'Hardware', 12, 'Anticutter Blade-Big', '1211', 'Anticutter Blade-Big', 1121101, 'Pcs', 10, 10, '1', 0, '6/9/2013', '', '', ''),
(96, 'Hardware', 12, 'Boma  Kata', '1210', 'Boma Kata-3/4(inch)', 1121003, 'Kg', 10, 10, '1', 0, '6/8/2013', '', '', ''),
(95, 'Hardware', 12, 'Boma  Kata', '1210', 'Boma  Kata-1/2(inch)', 1121002, 'Kg', 10, 10, '1', 0, '6/7/2013', '', '', ''),
(94, 'Hardware', 12, 'Boma  Kata', '1210', 'Boma  Kata-1(inch)', 1121001, 'Kg', 10, 10, '1', 0, '6/6/2013', '', '', ''),
(93, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-1/2(inch)', 1120906, 'Kg', 10, 10, '1', 0, '6/5/2013', '', '', ''),
(92, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-3/4(inch)', 1120905, 'Kg', 10, 10, '1', 0, '6/4/2013', '', '', ''),
(91, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-1(inch)', 1120904, 'Kg', 10, 10, '1', 0, '6/3/2013', '', '', ''),
(90, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-1.25(inch)', 1120903, 'Kg', 10, 10, '1', 0, '6/2/2013', '', '', ''),
(89, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-1.5(inch)', 1120902, 'Kg', 10, 10, '1', 0, '6/1/2013', '', '', ''),
(88, 'Hardware', 12, 'Tarkata', '1209', 'Tarkata-2(inch)', 1120901, 'Kg', 10, 10, '1', 0, '5/31/2013', '', '', ''),
(87, 'Hardware', 12, 'Steel Tarkata', '1208', 'Steel Tarkata-1/2(inch)', 1120805, 'Kg', 10, 10, '1', 0, '5/30/2013', '', '', ''),
(86, 'Hardware', 12, 'Steel Tarkata', '1208', 'Steel Tarkata-3/4(inch)', 1120804, 'Kg', 10, 10, '1', 0, '5/29/2013', '', '', ''),
(85, 'Hardware', 12, 'Steel Tarkata', '1208', 'Steel Tarkata-1(inch)', 1120803, 'Kg', 10, 10, '1', 0, '5/28/2013', '', '', ''),
(84, 'Hardware', 12, 'Steel Tarkata', '1208', 'Steel Tarkata-1.5(inch)', 1120802, 'Kg', 10, 10, '1', 0, '5/27/2013', '', '', ''),
(83, 'Hardware', 12, 'Steel Tarkata', '1208', 'Steel Tarkata-2(inch)', 1120801, 'Kg', 10, 10, '1', 0, '5/26/2013', '', '', ''),
(82, 'Hardware', 12, 'Scrue', '1207', 'Scrue-5/8(inch)', 1120707, 'Pcs', 10, 10, '1', 0, '5/25/2013', '', '', ''),
(81, 'Hardware', 12, 'Scrue', '1207', 'Scrue-1.25(inch)', 1120706, 'Pcs', 10, 10, '1', 0, '5/24/2013', '', '', ''),
(80, 'Hardware', 12, 'Scrue', '1207', 'Scrue-1/2(inch)', 1120705, 'Pcs', 10, 10, '1', 0, '5/23/2013', '', '', ''),
(79, 'Hardware', 12, 'Scrue', '1207', 'Scrue-3/4(inch)', 1120704, 'Pcs', 10, 10, '1', 0, '5/22/2013', '', '', ''),
(78, 'Hardware', 12, 'Scrue', '1207', 'Scrue-1(inch)', 1120703, 'Pcs', 10, 10, '1', 0, '5/21/2013', '', '', ''),
(77, 'Hardware', 12, 'Scrue', '1207', 'Scrue-1.5(inch)', 1120702, 'Pcs', 10, 10, '1', 0, '5/20/2013', '', '', ''),
(76, 'Hardware', 12, 'Scrue', '1207', 'Scrue-2(inch)', 1120701, 'Pcs', 10, 10, '1', 0, '5/19/2013', '', '', ''),
(75, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-Other Size', 1120607, 'Pcs', 10, 10, '1', 0, '5/18/2013', '', '', ''),
(74, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-1.25(inch)', 1120606, 'Pcs', 10, 10, '1', 0, '5/17/2013', '', '', ''),
(73, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-1/2(inch)', 1120605, 'Pcs', 10, 10, '1', 0, '5/16/2013', '', '', ''),
(72, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-3/4(inch)', 1120604, 'Pcs', 10, 10, '1', 0, '5/15/2013', '', '', ''),
(71, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-1(inch)', 1120603, 'Pcs', 10, 10, '1', 0, '5/14/2013', '', '', ''),
(70, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-1.5(inch)', 1120602, 'Pcs', 10, 10, '1', 0, '5/13/2013', '', '', ''),
(69, 'Hardware', 12, 'Star Scrue', '1206', 'Star Scrue-2(inch)', 1120601, 'Pcs', 10, 10, '1', 0, '5/12/2013', '', '', ''),
(68, 'Hardware', 12, 'Hand Gloves-Rubber', '1205', 'Hand Gloves-Cloth', 1120502, 'Pair', 10, 10, '1', 0, '5/11/2013', '', '', ''),
(67, 'Hardware', 12, 'Hand Gloves-Rubber', '1205', 'Hand Gloves-Rubber', 1120501, 'Pair', 10, 10, '1', 0, '5/10/2013', '', '', ''),
(66, 'Hardware', 12, 'Kobza', '1204', 'Kobza-Other Size', 1120406, 'Pcs', 10, 10, '1', 0, '5/9/2013', '', '', ''),
(65, 'Hardware', 12, 'Kobza', '1204', 'Kobza-2(inch)', 1120405, 'Pcs', 10, 10, '1', 0, '5/8/2013', '', '', ''),
(64, 'Hardware', 12, 'Kobza', '1204', 'Kobza-2.5(inch)', 1120404, 'Pcs', 10, 10, '1', 0, '5/7/2013', '', '', ''),
(63, 'Hardware', 12, 'Kobza', '1204', 'Kobza-3(inch) (UCBL)', 1120403, 'Pcs', 10, 10, '1', 0, '5/6/2013', '', '', ''),
(62, 'Hardware', 12, 'Kobza', '1204', 'Kobza-3(inch)', 1120402, 'Pcs', 10, 10, '1', 0, '5/5/2013', '', '', ''),
(61, 'Hardware', 12, 'Kobza', '1204', 'Kobza-4(inch)', 1120401, 'Pcs', 10, 10, '1', 0, '5/4/2013', '', '', ''),
(60, 'Hardware', 12, 'Royal Bolt', '1203', 'Royal Bolt-10 no.', 1120302, 'Pcs', 10, 10, '1', 0, '5/3/2013', '', '', ''),
(59, 'Hardware', 12, 'Royal Bolt', '1203', 'Royal Bolt-8 no.', 1120301, 'Pcs', 10, 10, '1', 0, '5/2/2013', '', '', ''),
(58, 'Hardware', 12, 'Beat', '1202', 'Beat-9/64', 1120201, 'Pcs', 10, 10, '1', 0, '5/1/2013', '', '', ''),
(57, 'Hardware', 12, 'GI Tar', '1201', 'GI Tar-24', 1120103, 'Kg', 10, 10, '1', 0, '4/30/2013', '', '', ''),
(56, 'Hardware', 12, 'GI Tar', '1201', 'GI Tar-18', 1120102, 'Kg', 10, 10, '1', 0, '4/29/2013', '', '', ''),
(55, 'Hardware', 12, 'GI Tar', '1201', 'GI Tar-16', 1120101, 'Kg', 10, 10, '1', 0, '4/28/2013', '', '', ''),
(54, 'Elecric Goods', 11, 'Others Electric Good', '1113', 'Cable Clip', 1111306, 'Pcs', 10, 10, '1', 0, '4/27/2013', '', '', ''),
(53, 'Elecric Goods', 11, 'Others Electric Good', '1113', '2 Pin Socket', 1111305, 'Pcs', 10, 10, '1', 0, '4/26/2013', '', '', ''),
(52, 'Elecric Goods', 11, 'Others Electric Good', '1113', 'Wall Fan', 1111304, 'Pcs', 10, 10, '1', 0, '4/25/2013', '', '', ''),
(51, 'Elecric Goods', 11, 'Others Electric Good', '1113', 'Digital Clock', 1111303, 'Pcs', 10, 10, '1', 0, '4/24/2013', '', '', ''),
(50, 'Elecric Goods', 11, 'Others Electric Good', '1113', 'Change Over', 1111302, 'Pcs', 10, 10, '1', 0, '4/23/2013', '', '', ''),
(49, 'Elecric Goods', 11, 'Others Electric Good', '1113', '2 pin plug', 1111301, 'Pcs', 10, 10, '1', 0, '4/22/2013', '', '', ''),
(48, 'Elecric Goods', 11, 'Circuit Breaker', '1112', 'Circuit Breaker-Double', 1111202, 'Pcs', 10, 10, '1', 0, '4/21/2013', '', '', ''),
(47, 'Elecric Goods', 11, 'Circuit Breaker', '1112', 'Circuit Breaker-Single', 1111201, 'Pcs', 10, 10, '1', 0, '4/20/2013', '', '', ''),
(46, 'Elecric Goods', 11, 'Energey Light', '1111', 'Energey Light Casing-26w', 1111104, 'Pcs', 10, 10, '1', 0, '4/19/2013', '', '', ''),
(45, 'Elecric Goods', 11, 'Energey Light', '1111', 'Energey Light -26 W', 1111103, 'Pcs', 10, 10, '1', 0, '4/18/2013', '', '', ''),
(44, 'Elecric Goods', 11, 'Energey Light', '1111', 'Energey Light Casing-28w', 1111102, 'Pcs', 10, 10, '1', 0, '4/17/2013', '', '', ''),
(43, 'Elecric Goods', 11, 'Energey Light', '1111', 'Energey Light -28 W', 1111101, 'Pcs', 10, 10, '1', 0, '4/16/2013', '', '', ''),
(42, 'Elecric Goods', 11, 'Spot Light', '1110', 'Spot Light Casing-2.5(inch)', 1111004, 'Pcs', 10, 10, '1', 0, '4/15/2013', '', '', ''),
(41, 'Elecric Goods', 11, 'Spot Light', '1110', 'Spot Light-2.5(inch)', 1111003, 'Pcs', 10, 10, '1', 0, '4/14/2013', '', '', ''),
(40, 'Elecric Goods', 11, 'Spot Light', '1110', 'Spot Light Casing-1.5(inch)', 1111002, 'Pcs', 10, 10, '1', 0, '4/13/2013', '', '', ''),
(39, 'Elecric Goods', 11, 'Spot Light', '1110', 'Spot Light-1.5(inch)', 1111001, 'Pcs', 10, 10, '1', 0, '4/12/2013', '', '', ''),
(38, 'Elecric Goods', 11, '5  Pin Soket', '1109', '3  Pin Soket-1.5x2.5(inch)', 1110902, 'Pcs', 10, 10, '1', 0, '4/11/2013', '', '', ''),
(37, 'Elecric Goods', 11, '4  Pin Soket', '1109', '3  Pin Soket-1x2(inch)', 1110901, 'Pcs', 10, 10, '1', 0, '4/10/2013', '', '', ''),
(36, 'Elecric Goods', 11, 'Royal Plug ', '1108', 'Royal Plug no. 12', 1110803, 'pkt', 10, 10, '1', 0, '4/9/2013', '', '', ''),
(35, 'Elecric Goods', 11, 'Royal Plug ', '1108', 'Royal Plug no. 10', 1110802, 'pkt', 10, 10, '1', 0, '4/8/2013', '', '', ''),
(34, 'Elecric Goods', 11, 'Royal Plug ', '1108', 'Royal Plug no. 08', 1110801, 'pkt', 10, 10, '1', 0, '4/7/2013', '', '', ''),
(33, 'Elecric Goods', 11, 'Switch Board', '1107', 'Switch Board (Plastic)-Gan', 1110705, 'Pcs', 10, 10, '1', 0, '4/6/2013', '', '', ''),
(32, 'Elecric Goods', 11, 'Switch Board', '1107', 'Switch Board (Plastic)-Small', 1110704, 'Pcs', 10, 10, '1', 0, '4/5/2013', '', '', ''),
(31, 'Elecric Goods', 11, 'Switch Board', '1107', 'Switch Board (Plastic)-Big', 1110703, 'Pcs', 10, 10, '1', 0, '4/4/2013', '', '', ''),
(30, 'Elecric Goods', 11, 'Switch Board', '1107', 'Switch Board (Wooden)-Small', 1110702, 'Pcs', 10, 10, '1', 0, '4/3/2013', '', '', ''),
(29, 'Elecric Goods', 11, 'Switch Board', '1107', 'Switch Board (Wooden)-Big', 1110701, 'Pcs', 10, 10, '1', 0, '4/2/2013', '', '', ''),
(28, 'Elecric Goods', 11, 'Cutout', '1106', 'Cutout-8/10(inch)', 1110602, 'Pcs', 10, 10, '1', 0, '4/1/2013', '', '', ''),
(27, 'Elecric Goods', 11, 'Cutout', '1106', 'Cutout-6/8(inch)', 1110601, 'Pcs', 10, 10, '1', 0, '3/31/2013', '', '', ''),
(286, 'Media', 20, 'Honey Comb Media', '2005', 'Reflective Honey Comb Stiker- 126(inch)', 1200504, 'sft', 10, 10, '1', 0, '12/15/2013', '', '', ''),
(285, 'Media', 20, 'Honey Comb Media', '2005', 'Reflective Honey Comb Stiker- 4.5''', 1200503, 'sft', 10, 10, '1', 0, '12/14/2013', '', '', ''),
(284, 'Media', 20, 'Honey Comb Media', '2005', 'Reflective PVC Honey Comb-520GSM,4.25''', 1200502, 'sft', 10, 10, '1', 0, '12/13/2013', '', '', ''),
(289, 'Media', 20, 'Orajet Media', '2007', 'Orajet glossy-4''', 11200702, 'sft', 10, 10, '1', 0, '12/18/2013', '', '', ''),
(288, 'Media', 20, 'Orajet Media', '2007', 'Orajet glossy-5''', 11200701, 'sft', 10, 10, '1', 0, '12/17/2013', '', '', ''),
(287, 'Media', 20, 'One way Vision Media', '2006', 'One Way Vision 4''', 1200601, 'sft', 10, 10, '1', 0, '12/16/2013', '', '', ''),
(290, 'Media', 20, 'Inject Media', '2008', 'Inkjet/Penambo Roll-3''', 1200801, 'sft', 10, 10, '1', 0, '12/19/2013', '', '', ''),
(291, 'Media', 20, 'Inject Media', '2008', 'Inkjet/Penambo Roll-4''', 1200802, 'sft', 10, 10, '1', 0, '12/20/2013', '', '', ''),
(292, 'Media', 20, 'Inject Media', '2008', 'Inkjet/Penambo Roll-5''', 1200803, 'sft', 10, 10, '1', 0, '12/21/2013', '', '', ''),
(293, 'Leather & Rexene', 21, 'Leather & Rexene', '2101', 'Rexene', 1210101, 'yd', 10, 10, '1', 0, '12/22/2013', '', '', ''),
(294, 'Leather & Rexene', 21, 'Leather & Rexene', '2101', 'Foam', 1210102, 'Pcs', 10, 10, '1', 0, '12/23/2013', '', '', ''),
(295, 'Leather & Rexene', 21, 'Leather & Rexene', '2101', 'Celuloid Glass Paper', 1210103, 'sft', 10, 10, '1', 0, '12/24/2013', '', '', ''),
(296, 'Glass & Celling', 22, 'Glass & Celling', '2201', 'Glass', 1220101, 'Pcs', 10, 10, '1', 0, '12/25/2013', '', '', ''),
(297, 'Glass & Celling', 22, 'Glass & Celling', '2201', 'Gipsum Board', 1220102, 'Pcs', 10, 10, '1', 0, '12/26/2013', '', '', ''),
(298, 'Glass & Celling', 22, 'Glass & Celling', '2201', 'Menti Channel', 1220103, 'Pcs', 10, 10, '1', 0, '12/27/2013', '', '', ''),
(299, 'Glass & Celling', 22, 'Glass & Celling', '2201', 'Coshti Channel', 1220104, 'Pcs', 10, 10, '1', 0, '12/28/2013', '', '', ''),
(300, 'Glass & Celling', 22, 'Glass & Celling', '2201', 'Angle Channel', 1220105, 'Pcs', 10, 10, '1', 0, '12/29/2013', '', '', ''),
(301, 'POP Material', 23, 'Concel Kobza', '2301', 'Concel Kobza-Single', 1230101, 'Pcs', 10, 10, '1', 0, '12/30/2013', '', '', ''),
(302, 'POP Material', 23, 'Concel Kobza', '2301', 'Concel Kobza-Double', 1230102, 'Pcs', 10, 10, '1', 0, '12/31/2013', '', '', ''),
(303, 'POP Material', 23, 'Formica', '2302', 'Formica-Yellow', 1230201, 'Pcs', 10, 10, '1', 0, '1/1/2014', '', '', ''),
(304, 'POP Material', 23, 'Formica', '2302', 'Formica-Red', 1230202, 'Pcs', 10, 10, '1', 0, '1/2/2014', '', '', ''),
(305, 'POP Material', 23, 'Drawer Channel', '2303', 'Drawer Channel-12(inch)', 1230301, 'Pcs', 10, 10, '1', 0, '1/3/2014', '', '', ''),
(306, 'POP Material', 23, 'Drawer Channel', '2303', 'Drawer Channel-14(inch)', 1230302, 'Pcs', 10, 10, '1', 0, '1/4/2014', '', '', ''),
(307, 'POP Material', 23, 'Drawer Channel', '2303', 'Drawer Channel-16(inch)', 1230303, 'Pcs', 10, 10, '1', 0, '1/5/2014', '', '', ''),
(308, 'POP Material', 23, 'Lock', '2304', 'Glass Lock-Single', 1230401, 'Pcs', 10, 10, '1', 0, '1/6/2014', '', '', ''),
(309, 'POP Material', 23, 'Lock', '2304', 'Glass Lock-Double', 1230402, 'Pcs', 10, 10, '1', 0, '1/7/2014', '', '', ''),
(310, 'POP Material', 23, 'Lock', '2304', 'Al-Lock', 1230403, 'Pcs', 10, 10, '1', 0, '1/8/2014', '', '', ''),
(311, 'POP Material', 23, 'Lock', '2304', 'Drawer Lock', 1230404, 'Pcs', 10, 10, '1', 0, '1/9/2014', '', '', ''),
(312, 'POP Material', 23, 'Lock', '2304', 'Centre Lock', 1230405, 'Pcs', 10, 10, '1', 0, '1/10/2014', '', '', ''),
(313, 'POP Material', 23, 'Lock', '2304', 'Lock (Normal)', 1230406, 'Pcs', 10, 10, '1', 0, '1/11/2014', '', '', ''),
(314, 'POP Material', 23, 'SS Knob', '2305', 'SS Knob-1x1.5(inch)', 1230501, 'Pcs', 10, 10, '1', 0, '1/12/2014', '', '', ''),
(315, 'POP Material', 23, 'SS Knob', '2305', 'SS Knob-3/4(inch)', 1230502, 'Pcs', 10, 10, '1', 0, '1/13/2014', '', '', ''),
(316, 'POP Material', 23, 'SS Knob', '2305', 'SS Knob-1.2(inch)', 1230503, 'Pcs', 10, 10, '1', 0, '1/14/2014', '', '', ''),
(317, 'POP Material', 23, 'SS Knob', '2305', 'SS Knob-2x1(inch)', 1230504, 'Pcs', 10, 10, '1', 0, '1/15/2014', '', '', ''),
(318, 'POP Material', 23, 'Push Magnet', '2306', 'Push Magnet(Single)', 1230601, 'Pcs', 10, 10, '1', 0, '1/16/2014', '', '', ''),
(319, 'POP Material', 23, 'Push Magnet', '2306', 'Push Magnet(Double)', 1230602, 'Pcs', 10, 10, '1', 0, '1/17/2014', '', '', ''),
(320, 'POP Material', 23, 'Hasing', '2307', 'Color Hasing', 1230701, 'coil', 10, 10, '1', 0, '1/18/2014', '', '', ''),
(321, 'POP Material', 23, 'Hasing', '2307', 'SS Hasing', 1230702, 'coil', 10, 10, '1', 0, '1/19/2014', '', '', ''),
(322, 'POP Material', 23, 'Hasing', '2307', 'Hasing Orange Colour-3/4(inch)', 1230703, 'coil', 10, 10, '1', 0, '1/20/2014', '', '', ''),
(323, 'POP Material', 23, 'Solution', '2308', 'Solution Ica', 1230801, 'ltr', 10, 10, '1', 0, '1/21/2014', '', '', ''),
(324, 'POP Material', 23, 'Solution', '2308', 'Silicon Gum', 1230802, 'Pcs', 10, 10, '1', 0, '1/22/2014', '', '', ''),
(325, 'POP Material', 23, 'Solution', '2308', 'White Gum', 1230803, 'ltr', 10, 10, '1', 0, '1/23/2014', '', '', ''),
(326, 'POP Material', 23, 'Others POP Material', '2309', 'Self Clip', 1230901, 'Pcs', 10, 10, '1', 0, '1/24/2014', '', '', ''),
(327, 'POP Material', 23, 'Others POP Material', '2309', '120 Shiris Paper', 1230902, 'Pcs', 10, 10, '1', 0, '1/25/2014', '', '', ''),
(328, 'POP Material', 23, 'Others POP Material', '2309', 'Chair', 1230903, 'Pcs', 10, 10, '1', 0, '1/26/2014', '', '', ''),
(329, 'POP Material', 23, 'Others POP Material', '2309', 'Rubber', 1230904, 'Pcs', 10, 10, '1', 0, '1/27/2014', '', '', ''),
(330, 'POP Material', 23, 'Others POP Material', '2309', 'Wheel', 1230905, 'Pcs', 10, 10, '1', 0, '1/28/2014', '', '', ''),
(331, 'POP Material', 23, 'Others POP Material', '2309', 'SS Paya', 1230906, 'Pcs', 10, 10, '1', 0, '1/29/2014', '', '', ''),
(332, 'POP Material', 23, 'Others POP Material', '2309', 'Chockolate Paya', 1230907, 'Pcs', 10, 10, '1', 0, '1/30/2014', '', '', ''),
(333, 'POP Material', 23, 'Others POP Material', '2309', 'Babil', 1230908, 'Pcs', 10, 10, '1', 0, '1/31/2014', '', '', ''),
(334, 'POP Material', 23, 'Others POP Material', '2309', 'Hole Charge', 1230909, 'Pcs', 10, 10, '1', 0, '2/1/2014', '', '', ''),
(335, 'POP Material', 23, 'Others POP Material', '2309', 'S Hook', 1230910, 'Pcs', 10, 10, '1', 0, '2/2/2014', '', '', ''),
(336, 'POP Material', 23, 'Others POP Material', '2309', 'Hage Bolt', 1230911, 'Pcs', 10, 10, '1', 0, '2/3/2014', '', '', ''),
(337, 'POP Material', 23, 'Others POP Material', '2309', 'Chain Kobza', 1230912, 'Pcs', 10, 10, '1', 0, '2/4/2014', '', '', ''),
(338, 'POP Material', 23, 'Others POP Material', '2309', 'Floor Mate', 1230913, 'yd', 10, 10, '1', 0, '2/5/2014', '', '', ''),
(339, 'POP Material', 23, 'Others POP Material', '2309', 'Foam', 1230914, '', 10, 10, '1', 0, '2/6/2014', '', '', ''),
(340, 'POP Material', 23, 'Others POP Material', '2309', 'Drawer Handle', 1230915, 'Pcs', 10, 10, '1', 0, '2/7/2014', '', '', ''),
(341, 'POP Material', 23, 'Others POP Material', '2309', 'SS Handle', 1230916, 'Pcs', 10, 10, '1', 0, '2/8/2014', '', '', ''),
(342, 'POP Material', 23, 'Others POP Material', '2309', 'Chain-Big', 1230917, '', 10, 10, '1', 0, '2/9/2014', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_group`
--

CREATE TABLE IF NOT EXISTS `material_group` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `material_group` varchar(40) NOT NULL,
  `code` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` int(10) NOT NULL,
  `update_by` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `material_group`
--

INSERT INTO `material_group` (`id`, `material_group`, `code`, `active`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(8, 'Aluminium', 18, 1, '2013-03-02', '', 0, 0),
(3, 'Welding Item', 13, 1, '2013-01-23', '', 0, 0),
(2, 'Hardware', 12, 1, '2013-01-21', '2013-02-12', 0, 0),
(1, 'Elecric Goods', 11, 1, '2013-01-23', '2013-03-02', 0, 0),
(4, 'Board Item', 14, 1, '2013-01-23', '', 0, 0),
(5, 'Plastic Item', 15, 1, '2013-01-23', '', 0, 0),
(6, 'Paints/Colour', 16, 1, '2013-01-23', '2013-02-12', 0, 0),
(7, 'Ink Item', 17, 1, '2013-03-02', '', 0, 0),
(9, 'Iron & Metal', 19, 1, '2013-03-02', '', 0, 0),
(10, 'Media', 20, 1, '2013-03-02', '', 0, 0),
(11, 'Leather & Rexene', 21, 1, '2013-03-02', '', 0, 0),
(12, 'Glass & Celling', 22, 1, '2013-03-02', '', 0, 0),
(13, 'POP Material', 23, 1, '2013-03-02', '', 0, 0),
(14, 'Tools', 24, 1, '2013-04-03', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE IF NOT EXISTS `material_stock` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pi_number` int(20) DEFAULT NULL,
  `io_number` int(255) NOT NULL,
  `iwo_number` int(20) NOT NULL,
  `local` tinyint(1) NOT NULL DEFAULT '0',
  `return` tinyint(1) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_code` int(10) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_code` int(30) NOT NULL,
  `material_group` varchar(100) NOT NULL,
  `sub_group` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `#invoice_date` varchar(20) NOT NULL,
  `#io_date` varchar(255) NOT NULL,
  `measurement_unit` varchar(20) NOT NULL,
  `material_qty` float(20,1) NOT NULL,
  `unit_price` float(20,2) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `net_price` float(20,2) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `comment` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `material_stock`
--

INSERT INTO `material_stock` (`id`, `pi_number`, `io_number`, `iwo_number`, `local`, `return`, `supplier_name`, `supplier_code`, `material_name`, `material_code`, `material_group`, `sub_group`, `date`, `#invoice_date`, `#io_date`, `measurement_unit`, `material_qty`, `unit_price`, `discount`, `vat`, `net_price`, `insert_by`, `update_by`, `comment`) VALUES
(1, 913390, 0, 0, 0, 0, 'Wahab Trading', 22, 'Angle-1.5(inch)', 1190402, 'Iron & Metal', 'Angle', '2013-04-15', '', '', 'Kg				', 10.0, 20.00, '10', '10', 198.00, 'sazedul.winux@gmail.com', '', ''),
(2, NULL, 0, 0, 0, 2, '', 0, 'Angle-1.5(inch)', 1190402, '', '', '2013-04-15', '', '', '', 2.0, 20.00, '', '', 158.40, '', 'sazedul.winux@gmail.com', 'waste return=2'),
(3, 882812, 0, 0, 0, 0, 'Wahab Trading', 22, 'Angle-3/4(inch)', 1190404, 'Iron & Metal', 'Angle', '2013-04-15', '', '', 'Kg				', 10.0, 20.00, '10', '10', 198.00, 'sazedul.winux@gmail.com', '', ''),
(4, 913411, 0, 0, 0, 0, 'Sadhinata Lighting Agency', 43, 'Angle-1.5(inch)', 1190402, 'Iron & Metal', 'Angle', '2013-04-15', '', '', 'Kg				', 10.0, 90.00, '10', '10', 810.00, 'sazedul.winux@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_sub_group`
--

CREATE TABLE IF NOT EXISTS `material_sub_group` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_group` varchar(40) NOT NULL,
  `sub_group_code` int(10) NOT NULL,
  `material_group` varchar(40) NOT NULL,
  `group_code` int(10) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` int(10) NOT NULL,
  `update_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `material_sub_group`
--

INSERT INTO `material_sub_group` (`id`, `sub_group`, `sub_group_code`, `material_group`, `group_code`, `active`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(24, 'Anticutter Blade-Big', 1211, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(23, 'Boma  Kata', 1210, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(22, 'Tarkata', 1209, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(21, 'Steel Tarkata', 1208, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(20, 'Scrue', 1207, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(19, 'Star Scrue', 1206, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(78, 'Kobza', 1204, 'Hardware', 12, 1, '2013-04-03', '', 0, 0),
(18, 'Hand Gloves-Rubber', 1205, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(16, 'Royal Bolt', 1203, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(14, 'GI Tar', 1201, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(15, 'Beat', 1202, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(13, 'Others Electric Goods', 1113, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(12, 'Circuit Breaker', 1112, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(11, 'Energey Light', 1111, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(10, 'Spot Light', 1110, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(9, '3  Pin Soket', 1109, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(8, 'Royal Plug ', 1108, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(7, 'Switch Board', 1107, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(6, 'Cutout', 1106, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(5, 'Switch', 1105, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(4, 'Electric Cable', 1104, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(3, 'starter', 1103, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(2, 'Balasht', 1102, 'Elecric Goods', 11, 1, '2013-03-05', '', 0, 0),
(1, 'Tube Light', 1101, 'Elecric Goods', 11, 1, '2013-03-05', '0', 0, 0),
(25, 'Wall Beat', 1212, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(26, 'Others Hardware', 1213, 'Hardware', 12, 1, '2013-03-05', '', 0, 0),
(27, 'Cutting Stone', 1301, 'Welding Item', 13, 1, '2013-03-05', '', 0, 0),
(28, 'Granding Stone 4(inch)', 1302, 'Welding Item', 13, 1, '2013-03-05', '', 0, 0),
(29, 'Welding Rod', 1303, 'Welding Item', 13, 1, '2013-03-05', '', 0, 0),
(30, 'SS Welding Rod', 1304, 'Welding Item', 13, 1, '2013-03-05', '', 0, 0),
(31, 'Welding Cable', 1305, 'Welding Item', 13, 1, '2013-03-05', '', 0, 0),
(32, 'PVC Board', 1401, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(33, 'MDF Board', 1402, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(34, 'Malmine Board', 1403, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(35, 'Gorzon Ply Board', 1404, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(36, 'Acrylic Board', 1405, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(37, 'Woodtex Board', 1406, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(38, 'Wood ', 1407, 'Board Item', 14, 1, '2013-03-05', '', 0, 0),
(39, 'Plastic pipe', 1501, 'Plastic Item', 15, 1, '2013-03-05', '', 0, 0),
(40, 'Gulti', 1502, 'Plastic Item', 15, 1, '2013-03-05', '', 0, 0),
(41, 'Super Glue', 1503, 'Plastic Item', 15, 1, '2013-03-05', '', 0, 0),
(42, 'Enamel Paints', 1601, 'Paints/Colour', 16, 1, '2013-03-05', '', 0, 0),
(43, 'Plastic Paints', 1602, 'Paints/Colour', 16, 1, '2013-03-05', '', 0, 0),
(44, 'Thinner', 1603, 'Paints/Colour', 16, 1, '2013-03-05', '', 0, 0),
(45, 'others paints items', 1604, 'Paints/Colour', 16, 1, '2013-03-05', '', 0, 0),
(46, 'Jeti', 1701, 'Ink Item', 17, 1, '2013-03-05', '', 0, 0),
(47, 'China', 1702, 'Ink Item', 17, 1, '2013-03-05', '', 0, 0),
(48, 'Inject', 1703, 'Ink Item', 17, 1, '2013-03-05', '', 0, 0),
(49, 'Inkjet Cartridge', 1704, 'Ink Item', 17, 1, '2013-03-05', '', 0, 0),
(50, 'Repair & main. Mach.', 1705, 'Ink Item', 17, 1, '2013-03-05', '', 0, 0),
(51, 'Channel', 1801, 'Aluminium', 18, 1, '2013-03-05', '', 0, 0),
(52, 'Profile', 1802, 'Aluminium', 18, 1, '2013-03-05', '', 0, 0),
(53, 'Box pipe', 1901, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(54, 'Round Pipe', 1902, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(55, 'Back Sheet', 1903, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(56, 'Angle', 1904, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(57, 'Flat Bar', 1905, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(58, 'SS Pipe', 1906, 'Iron & Metal', 19, 1, '2013-03-05', '', 0, 0),
(59, 'PVC Media', 2001, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(60, 'Fex Media', 2002, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(61, 'Vinyl Media', 2003, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(62, 'Lamination Media', 2004, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(63, 'Honey Comb Media', 2005, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(64, 'One way Vision Media', 2006, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(65, 'Orajet Media', 2007, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(66, 'Inject Media', 2008, 'Media', 20, 1, '2013-03-05', '', 0, 0),
(67, 'Leather & Rexene', 2101, 'Leather & Rexene', 21, 1, '2013-03-05', '', 0, 0),
(68, 'Glass & Celling', 2201, 'Glass & Celling', 22, 1, '2013-03-05', '', 0, 0),
(69, 'Concel Kobza', 2301, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(70, 'Formica', 2302, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(71, 'Drawer Channel', 2303, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(72, 'Lock', 2304, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(73, 'SS Knob', 2305, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(74, 'Push Magnet', 2306, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(75, 'Hasing', 2307, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(76, 'Solution', 2308, 'POP Material', 23, 1, '2013-03-05', '', 0, 0),
(77, 'Others POP Material', 2309, 'POP Material', 23, 1, '2013-03-05', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pi_material_list`
--

CREATE TABLE IF NOT EXISTS `pi_material_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pi_number` int(20) DEFAULT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_code` int(10) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_code` int(30) NOT NULL,
  `material_group` varchar(100) NOT NULL,
  `sub_group` varchar(100) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `measurement_unit` varchar(20) NOT NULL,
  `material_qty` float(20,1) NOT NULL,
  `unit_price` float(20,2) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `net_price` float(20,2) NOT NULL,
  `return` tinyint(1) NOT NULL DEFAULT '0',
  `insert_by` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pi_number` int(20) DEFAULT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_code` int(10) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `total_price` float(20,2) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pi_number` (`pi_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE IF NOT EXISTS `requisition` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `requisitors_name` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `r_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_material_list`
--

CREATE TABLE IF NOT EXISTS `requisition_material_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `requisition_number` int(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_code` int(30) NOT NULL,
  `iwo_number` int(100) NOT NULL,
  `material_group` varchar(100) NOT NULL,
  `measurement_unit` varchar(20) NOT NULL,
  `size` varchar(100) NOT NULL,
  `material_qty` float(20,1) NOT NULL,
  `r_date` varchar(20) NOT NULL,
  `requisitors_name` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_update`
--

CREATE TABLE IF NOT EXISTS `stock_update` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(100) NOT NULL,
  `material_code` int(30) NOT NULL,
  `material_group` varchar(100) NOT NULL,
  `sub_group` varchar(100) NOT NULL,
  `measurement_unit` varchar(20) NOT NULL,
  `material_qty` float(20,1) NOT NULL,
  `unit_price` float(20,2) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `net_price` float(20,2) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_name` (`material_name`,`material_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_update`
--

INSERT INTO `stock_update` (`id`, `material_name`, `material_code`, `material_group`, `sub_group`, `measurement_unit`, `material_qty`, `unit_price`, `discount`, `vat`, `net_price`, `insert_by`, `update_by`, `update_date`) VALUES
(1, 'Angle-1.5(inch)', 1190402, 'Iron & Metal', 'Angle', 'Kg				', 18.0, 53.80, '10', '10', 968.40, 'sazedul.winux@gmail.com', 'sazedul.winux@gmail.com', '2013-04-15'),
(2, 'Angle-3/4(inch)', 1190404, 'Iron & Metal', 'Angle', 'Kg				', 10.0, 20.00, '10', '10', 198.00, 'sazedul.winux@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_code` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_date` varchar(20) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `update_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_code`, `address`, `phone`, `email`, `active`, `create_date`, `update_date`, `insert_by`, `update_by`) VALUES
(1, 'M/S Bengal Hardware and Paint', 1, 'Progoti Sharani,Shajadpur', '01721552380', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(2, 'M/S faud and Brothers', 2, 'Naya Bazar', '01711528501', '', 1, '2013-04-09', '2013-04-09', 'store.dhaka@artsignbd.com', 'store.dhaka@artsignb'),
(3, 'Noorjahan Electric and Hardware', 3, 'Satarkul Road, Uttarbadda', '01711174984', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(4, 'Maa Enterprise', 4, 'Kanijplaza,Khilbaritek, Shahjadpur', '01716172227', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(5, 'Jhimik Electric', 5, 'Alrahman Market, Nawabpur Road', '01712283975', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(6, 'Decent Paper House', 6, 'D.I.T Nawab Yousuf Market, Nayabazar', '01914757128', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(7, 'M/S Noor Enterprise', 7, 'Progoti Sharani , Shahjadpur', '01711115469', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(8, 'Shimu Enterprise', 8, 'Nawabpur Road', '01724412936', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(9, 'S K Hardware', 9, 'Nawabpur Road', '01711349538', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(10, 'M/S Jahim Traders', 10, 'Shahjadpur', '01716516163', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(11, 'Rahila Enterprise', 11, 'Alirmore ,Uttarbadda', '01918153880', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(12, 'M/S M.H Plywood centre', 12, 'Badda', '01712915090', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(13, 'Friendscom International', 13, '32, purana Paltan,Sultan Ahmed Plaza', '01714021244', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(14, 'Powergorph', 14, '31/1, purana Paltan', '9550259', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(15, 'SF Enterprise', 15, 'Nawabpur Road', '9511539', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(16, 'New Redhay Steel House', 16, 'Naya Bazar', '9560720', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(17, 'M/S Jamiruddin and sons', 17, 'Kapptan Bazar, Nawabpur', '7119951', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(18, 'Jade Media Enterprise', 18, 'Taltala Sylhet', '01713328874', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(19, 'Tec Sign Jon', 19, 'NIlkhet', '01772130933', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(20, 'Tanvir Hardware', 20, 'Nawabpur Road', '9511245', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(21, 'BN Traders', 21, 'Shahjadpur', '01676203005', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(22, 'Wahab Trading', 22, 'Rowshan Tower, panthapath', '9137772', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(23, 'Mousumi Steel', 23, 'Naya Bazar', '7394991', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(24, 'M/S Amanat Trading', 24, 'Alirmore (Dada Bazar ),Satarkul Road', '01727294056', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(25, 'M/S Israt PVC pipe', 25, 'Meradia Borobari,Khilgoan', '01713392842', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(26, 'Fahim Steel', 26, 'Jatribari, Kolapotti', '01198223647', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(27, 'Sign World', 27, 'Amanat Monjil,48 purana Paltan', '9565648', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(28, 'Graphic Sign Media', 28, '60/c, Purana Paltan (Ground Floor)', '9573459', '', 1, '2013-04-09', '2013-04-09', 'store.dhaka@artsignbd.com', 'zakir@artsignbd.com'),
(29, 'Shah Digital Sign', 29, '211, Shahid Syed Nazrul Islam Sharani, Bijoy Nagar', '01971281361', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(30, 'Creative Sign Media', 30, '10/4, Shantibug, Malibug', '01715075434', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(31, 'Shanghai Machinary', 31, '169, Nabpur Road', '01720320020', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(32, 'Bismilla Electric Hardware', 32, '37,Purana ,Paltan', '01740630107', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(33, 'Partex Pvc Industries Ltd', 33, '68,Tejgon  Industeial Area ', '9130678', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(34, 'Signtronix', 34, '167, Shahid  Syed Nazrul Islam Sharani', '9562814', '', 1, '2013-04-09', '2013-04-09', 'store.dhaka@artsignbd.com', 'store.dhaka@artsignb'),
(35, 'Muslim Mill Stoee', 35, '121/3, Nawabpur Road', '01711267331', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(36, 'Hasfa Enterprise', 36, '122,Nawabpur Road', '01715106178', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(37, 'Naseem pc Centre', 37, 'Bitus Sameer Market North South Road', '01678095304', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(38, 'Lina Enterprise', 38, '41/1Najira Bazar Lane .North South Road', '01711521767', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(39, 'Sign Jet', 39, '104,green Road Farmgate', '01712272120', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(40, 'Ayon Enterprise', 40, '142, Nawabpur Road', '9560688', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(41, 'Aristo Media', 41, '51/A Purana Paltan', '01713066400', '', 1, '2013-04-09', '', 'store.dhaka@artsignbd.com', ''),
(42, 'M/S Mamun Electric', 42, '104/1, North Badda, Progoti Sharani', '01713486910', '', 1, '2013-04-10', '', 'store.dhaka@artsignbd.com', ''),
(43, 'Sadhinata Lighting Agency', 43, 'Sadhinata Electric Market, Shop-1,41/42,  Kaptan Bazar', '01920433569', '', 1, '2013-04-11', '2013-04-11', 'store.dhaka@artsignbd.com', 'store.dhaka@artsignb'),
(44, 'Haji Abul Khair varities', 44, '3 no. Municiple Super Market, Kaptan Bazar', '01190464653', '', 1, '2013-04-15', '', 'store.dhaka@artsignbd.com', ''),
(45, 'M/S Shazada Steel', 45, '10/4 no. Basabari lane, Nayabazar', '01817106043', '', 1, '2013-04-15', '', 'store.dhaka@artsignbd.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('default','admin','owner','family') NOT NULL DEFAULT 'default',
  `sm` enum('0','1') NOT NULL,
  `wo` enum('0','1') NOT NULL,
  `report` enum('0','1') NOT NULL,
  `sa` enum('0','1') NOT NULL,
  `pi` enum('0','1') NOT NULL,
  `io` enum('0','1') NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` varchar(20) NOT NULL,
  `last_login` varchar(20) NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `role`, `sm`, `wo`, `report`, `sa`, `pi`, `io`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(19, 'gÌt', 'info@winuxsoftltd.com', '17b15867058397d9647341b5f389a36fb497fa36', 'default', '0', '0', '0', '1', '0', '0', NULL, 'info@winuxsoftltd.com', NULL, NULL, NULL, NULL, '2013/03/31', '1364716948', 1, 'winux', 'soft ltd.', NULL, NULL),
(10, '\0\0', 'sazedul haque', '6182289aea3a9aea8606c168affb2f5d8344fa99', 'default', '1', '0', '0', '1', '1', '0', NULL, 'sazedul.winux@gmail.com', NULL, NULL, NULL, NULL, '1350105181', '1366084725', 1, 'sazedul', 'haque', NULL, NULL),
(17, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'amirali@gmail.com', '2b200dee7061e3c788353fc7a8bc3e1aa173581e', 'default', '0', '0', '0', '1', '0', '0', NULL, 'amirali@gmail.com', NULL, NULL, NULL, NULL, '2013/01/28', '1359347728', 1, 'Amir', 'Ali', NULL, NULL),
(18, 'zcai', 'zakir@artsignbd.com', '4502c8d370d9bdf0dbc7223540b77f179c70f939', 'default', '0', '0', '0', '1', '0', '0', NULL, 'zakir@artsignbd.com', NULL, NULL, NULL, NULL, '2013/03/24', '1365496971', 1, 'Md. Zakir', 'Hossain', NULL, NULL),
(21, 'ß¥.', 'store.dhaka@artsignbd.com', 'e84c1ef47d392aa1cc1d7cf7a1fe761c377b64f2', 'default', '0', '0', '0', '1', '0', '0', NULL, 'store.dhaka@artsignbd.com', NULL, NULL, NULL, NULL, '2013/04/03', '1366005856', 1, 'paritosh', 'mondal', NULL, NULL),
(22, '\0\0', 'info@artnsign.com', '49ef4704c31af1d6313cf449963706524437f71c', 'default', '1', '1', '1', '1', '1', '1', NULL, 'info@artnsign.com', NULL, NULL, NULL, NULL, '2013/04/04', '1365056140', 1, 'Art', 'sign', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(2, 3, 1),
(9, 8, 1),
(10, 9, 1),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
