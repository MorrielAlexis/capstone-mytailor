-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 09:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbcapstone-mytailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_14_043126_create_employeerole_table', 1),
('2016_02_14_043250_tblEmployee', 1),
('2016_04_21_171608_create_cust_company_table', 1),
('2016_04_21_172332_create_cust_individual_table', 1),
('2016_04_21_172855_create_customer_table', 1),
('2016_04_21_173053_create_fabrictype_table', 1),
('2016_04_21_173814_create_thread_table', 1),
('2016_04_21_174143_create_needle_table', 1),
('2016_04_21_174816_create_button_table', 1),
('2016_04_21_181957_create_zipper_table', 1),
('2016_04_21_182138_create_hookeye_table', 1),
('2016_04_21_185420_create_garmentcategory_table', 1),
('2016_04_21_190003_create_segment_table', 1),
('2016_04_22_024528_create_catalogue_table', 1),
('2016_05_19_051619_create_tblalteration', 1),
('2016_05_19_085840_create_fabric_thread_count_table', 1),
('2016_06_07_092119_create_packages_table', 1),
('2016_07_14_190416_create_segmentstylecategory_table', 1),
('2016_07_14_192326_create_segment_pattern_table', 1),
('2016_07_15_152025_create_fabric_pattern_table', 1),
('2016_07_15_164749_create_fabric_color_table', 1),
('2016_07_15_175846_create_fabric_table', 1),
('2016_07_17_142801_create_body_parts_category_table', 1),
('2016_07_17_152015_create_body_parts_form_table', 1),
('2016_07_17_163932_create_measurement_category_table', 1),
('2016_07_17_174524_create_standard_size_category_table', 1),
('2016_07_17_190441_create_measurement_detail_table', 1),
('2016_07_17_212236_create_measurement_standard_size_detail_table', 1),
('2016_07_18_053130_create_jo_addcharge', 1),
('2016_07_18_055027_create_job_order', 1),
('2016_07_18_100333_create_jo_measurement_profile', 1),
('2016_07_20_205625_create_non_shop_alteration_table', 1),
('2016_07_21_082421_create_jo_specific', 1),
('2016_07_21_195759_create_jo_note_for_modify_table', 1),
('2016_07_21_201313_create_jo_measure_specific_table', 1),
('2016_07_21_202040_create_job_order_progress', 1),
('2016_07_21_203938_create_jo_specific_material', 1),
('2016_07_21_204430_create_jo_specific_accessory', 1),
('2016_07_21_205626_create_jo_payment', 1),
('2016_07_22_061619_create_jo_specific_segment_pattern', 1),
('2016_07_22_065309_create_non_shop_alter_specific', 1),
('2016_07_22_065433_create_jo_alteration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblalteration`
--

CREATE TABLE IF NOT EXISTS `tblalteration` (
  `strAlterationID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAlterationName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAlterationSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intAlterationMinDays` int(11) NOT NULL,
  `txtAlterationDesc` text COLLATE utf8_unicode_ci,
  `dblAlterationPrice` double NOT NULL,
  `strAlterationInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strAlterationID`),
  KEY `tblalteration_stralterationsegmentfk_index` (`strAlterationSegmentFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblalteration`
--

INSERT INTO `tblalteration` (`strAlterationID`, `strAlterationName`, `strAlterationSegmentFK`, `intAlterationMinDays`, `txtAlterationDesc`, `dblAlterationPrice`, `strAlterationInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('ALTE0001', 'Pants Hem', 'SEGM001', 3, 'Use for modifying pants cuff size of pants.', 100, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0002', 'Shorten Sleeves', 'SEGM004', 2, 'Use in almost all classes of shirt for resizing.', 200, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0003', 'Slim Sleeves', 'SEGM004', 2, 'Use in almost all classes of shirt for resizing.', 100, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0004', 'Adjust Shoulder', 'SEGM004', 2, 'Use in almost all classes of shirt for resizing.', 100, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0005', 'Slim', 'SEGM004', 5, 'Use in almost all classes of shirt for resizing.', 250, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0006', 'Slim Leg', 'SEGM006', 2, 'Use in almost all classes of shirt for resizing.', 150, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0007', 'Adjust Waist', 'SEGM006', 2, 'Use in almost all classes of shirt for resizing.', 200, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ALTE0008', 'Baston Cutting', 'SEGM006', 2, 'Use in almost all classes of shirt for resizing.', 200, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbodypartcategory`
--

CREATE TABLE IF NOT EXISTS `tblbodypartcategory` (
  `strBodyPartCategoryID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBodyPartCatName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `textBodyPartCatDesc` text COLLATE utf8_unicode_ci,
  `strBodyPartCategoryInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strBodyPartCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblbodypartcategory`
--

INSERT INTO `tblbodypartcategory` (`strBodyPartCategoryID`, `strBodyPartCatName`, `textBodyPartCatDesc`, `strBodyPartCategoryInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('BDYCAT001', 'Shoulders', 'Measurement from end to end of the shoulder for the width of the shirt.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYCAT002', 'Back', 'Measurement from end to end of the back for the length of the shirt.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYCAT003', 'Stomach', 'Can be large, hefty, flat, etc.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYCAT004', 'Body Built', 'Can be athletic, regular, hefty.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbodypartform`
--

CREATE TABLE IF NOT EXISTS `tblbodypartform` (
  `strBodyFormID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBodyPartFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBodyFormName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strBodyFormImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txtBodyFormDesc` text COLLATE utf8_unicode_ci,
  `strBodyFormInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strBodyFormID`),
  KEY `tblbodypartform_strbodypartfk_foreign` (`strBodyPartFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblbodypartform`
--

INSERT INTO `tblbodypartform` (`strBodyFormID`, `strBodyPartFK`, `strBodyFormName`, `strBodyFormImage`, `txtBodyFormDesc`, `strBodyFormInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('BDYFORM001', 'BDYCAT003', 'Flat Stomach', 'imgBodyForms/flat-stomach.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM002', 'BDYCAT003', 'Slight Stomach', 'imgBodyForms/slight-tummy.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM003', 'BDYCAT003', 'Medium Stomach', 'imgBodyForms/medium-stomach.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM004', 'BDYCAT003', 'Large Stomach', 'imgBodyForms/large-stomach.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM005', 'BDYCAT003', 'Hefty', 'imgBodyForms/hefty-stomach.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM006', 'BDYCAT002', 'Bent Back', 'imgBodyForms/bodymeasurementback1.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM007', 'BDYCAT002', 'Average Back', 'imgBodyForms/bodymeasurementback2.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM008', 'BDYCAT002', 'Straight Back', 'imgBodyForms/bodymeasurementback3.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM009', 'BDYCAT001', 'Sloping', 'imgBodyForms/bodymeasurementshoulder1.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM010', 'BDYCAT001', 'Average', 'imgBodyForms/bodymeasurementshoulder2.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM011', 'BDYCAT001', 'Straight', 'imgBodyForms/bodymeasurementshoulder3.gif', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM012', 'BDYCAT004', 'Slim', 'imgBodyForms/slim.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM013', 'BDYCAT004', 'Well Built', 'imgBodyForms/well_built.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM014', 'BDYCAT004', 'Athletic', 'imgBodyForms/athletic.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM015', 'BDYCAT004', 'Regular', 'imgBodyForms/regular.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('BDYFORM016', 'BDYCAT004', 'Hefty Body', 'imgBodyForms/hefty.jpg', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbutton`
--

CREATE TABLE IF NOT EXISTS `tblbutton` (
  `intButtonID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strButtonBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strButtonSize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strButtonColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strButtonDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strButtonImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strButtonInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intButtonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblbutton`
--

INSERT INTO `tblbutton` (`intButtonID`, `strButtonBrand`, `strButtonSize`, `strButtonColor`, `strButtonDesc`, `strButtonImage`, `strButtonInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
(1, 'Double Header', 'Small', 'Gray', 'Two wholes with extra lining', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cyclic Button', 'Medium', 'White', '2 holes wholes with extra circular lining', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcatalogue`
--

CREATE TABLE IF NOT EXISTS `tblcatalogue` (
  `strCatalogueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCatalogueCategoryFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCatalogueName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCatalogueDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCatalogueImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `strCatalogueInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strCatalogueID`),
  KEY `tblcatalogue_strcataloguecategoryfk_index` (`strCatalogueCategoryFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcatalogue`
--

INSERT INTO `tblcatalogue` (`strCatalogueID`, `strCatalogueCategoryFK`, `strCatalogueName`, `strCatalogueDesc`, `strCatalogueImage`, `boolIsActive`, `strCatalogueInactiveReason`, `created_at`, `updated_at`) VALUES
('CAT001', 'GARM003', 'Casual Polo 1', 'Clothing for meeting and special events.', 'imgCatalogue/shirt-showcase1.gif', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT002', 'GARM003', ' Casual Polo 2', ' Polo used by men for semi-formal events.', 'imgCatalogue/shirt-showcase3.gif', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT003', 'GARM003', ' Casual Polo 3', ' Polo used by men for semi-formal events.', 'imgCatalogue/shirt-showcase7.gif', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT004', 'GARM005', ' Casual Blouse 1', ' Blouse used by women for semi-formal events.', 'imgCatalogue/women-polo-design-2.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT005', 'GARM005', ' Casual Blouse 2', ' Blouse used by women for semi-formal events.', 'imgCatalogue/women-polo-design-3.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT006', 'GARM005', ' Casual Blouse 3', ' Blouse used by women for semi-formal events.', 'imgCatalogue/female-uniform-plain.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT007', 'GARM004', 'Mens Slacks', 'Daily use for business attire. ', 'imgCatalogue/male-uniform-pants-plain.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT008', 'GARM002', 'Double Breasted 1', 'Daily use for business attire. ', 'imgCatalogue/suit5.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT009', 'GARM002', 'Shawl Lapel Suit', 'Daily use for gala attire. ', 'imgCatalogue/s3366_main.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CAT010', 'GARM002', 'Notch Lapel Suit', 'Daily use for job attire. ', 'imgCatalogue/suit3.jpg', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustcompany`
--

CREATE TABLE IF NOT EXISTS `tblcustcompany` (
  `strCompanyID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyBuildingNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyStreet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyBarangay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCompanyCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyProvince` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyZipCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strContactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyEmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyTelNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCompanyCPNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCompanyCPNumberAlt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCompanyFaxNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCompanyInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strCompanyID`),
  UNIQUE KEY `tblcustcompany_strcompanyemailaddress_unique` (`strCompanyEmailAddress`),
  KEY `tblcustcompany_userid_index` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcustcompany`
--

INSERT INTO `tblcustcompany` (`strCompanyID`, `strCompanyName`, `strCompanyBuildingNo`, `strCompanyStreet`, `strCompanyBarangay`, `strCompanyCity`, `strCompanyProvince`, `strCompanyZipCode`, `strContactPerson`, `strCompanyEmailAddress`, `strCompanyTelNumber`, `strCompanyCPNumber`, `strCompanyCPNumberAlt`, `strCompanyFaxNumber`, `strCompanyInactiveReason`, `userId`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('CUSTC001', 'Pfizer Phils', '771', 'Aseana', 'San Miguel', 'Pasig', 'NCR', '099', 'Lala Roque', 'melodyreyes@pfizer.com', '2227777', '09178901234', '09171234567', '4440102', NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CUSTC002', 'Nestle PH', '056', 'Roxas', 'Regexing', 'Majayjay', 'Laguna', '1028', 'Zobel Ayala', 'welness@nestle.com', '0345678', '09222349876', '0922345-6987', '0031234', NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustindividual`
--

CREATE TABLE IF NOT EXISTS `tblcustindividual` (
  `strIndivID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivFName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivLName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivMName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivSex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivHouseNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivStreet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivBarangay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivProvince` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivZipCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivLandlineNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivCPNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivCPNumberAlt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIndivEmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strIndivInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strIndivID`),
  UNIQUE KEY `tblcustindividual_strindivemailaddress_unique` (`strIndivEmailAddress`),
  KEY `tblcustindividual_userid_index` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblcustindividual`
--

INSERT INTO `tblcustindividual` (`strIndivID`, `strIndivFName`, `strIndivLName`, `strIndivMName`, `strIndivSex`, `strIndivHouseNo`, `strIndivStreet`, `strIndivBarangay`, `strIndivCity`, `strIndivProvince`, `strIndivZipCode`, `strIndivLandlineNumber`, `strIndivCPNumber`, `strIndivCPNumberAlt`, `strIndivEmailAddress`, `strIndivInactiveReason`, `userId`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('CUSTP001', 'Melody', 'Legaspi', 'Reyes', 'F', '44', 'Ipil St.', 'St. Anthony', 'Cainta', 'Rizal', '1007', '0467892', '09156789678', '09122345678', 'melodyreyes@gmail.com', NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CUSTP002', 'Rachel', 'Nayre', 'Atian', 'F', '41', 'Narra St.', 'Kwek-kwek', 'Angono', 'Rizal', '1003', '0723456', '09198761290', '09121236789', 'reychnayre@yahoo.com', NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `strCustomerID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCustomer_IndFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCustomer_CompanyFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCustomerAccountIDFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `strCustInactiveReason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strCustomer_IndFK`),
  KEY `tblcustomer_strcustomer_indfk_index` (`strCustomer_IndFK`),
  KEY `tblcustomer_strcustomer_companyfk_index` (`strCustomer_CompanyFK`),
  KEY `tblcustomer_strcustomeraccountidfk_index` (`strCustomerAccountIDFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE IF NOT EXISTS `tblemployee` (
  `strEmployeeID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpFName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpMName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmpLName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dtEmpBday` date NOT NULL,
  `strSex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpHouseNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpStreet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpBarangay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmpCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpProvince` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpZipCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strRole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCellNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCellNoAlt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strPhoneNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmailAdd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmpInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strEmployeeID`),
  KEY `tblemployee_strrole_index` (`strRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`strEmployeeID`, `strEmpFName`, `strEmpMName`, `strEmpLName`, `dtEmpBday`, `strSex`, `strEmpHouseNo`, `strEmpStreet`, `strEmpBarangay`, `strEmpCity`, `strEmpProvince`, `strEmpZipCode`, `strRole`, `strCellNo`, `strCellNoAlt`, `strPhoneNo`, `strEmailAdd`, `strEmpInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('EMPL001', 'Earvin', 'Aquino', 'Tolentino', '1996-07-02', 'M', '44', 'Rizal St.', 'Bagbag', 'Bauang', 'La Union', '2501', 'ROLE001', '09162451291', '09155432875', '02345890', 'earvintol@gmail.com', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('EMPL002', 'Amber', 'Aquino', 'Lastima', '2000-08-04', 'F', '41', 'Bonficatio St.', 'Sangandaan', 'Caloocan School', 'La Union', '2501', 'ROLE002', '09197864523', '0923098567', '02341276', 'amberaq@gmail.com', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployeerole`
--

CREATE TABLE IF NOT EXISTS `tblemployeerole` (
  `strEmpRoleID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpRoleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strEmpRoleDesc` text COLLATE utf8_unicode_ci,
  `strRoleInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `boolIsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`strEmpRoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblemployeerole`
--

INSERT INTO `tblemployeerole` (`strEmpRoleID`, `strEmpRoleName`, `strEmpRoleDesc`, `strRoleInactiveReason`, `created_at`, `updated_at`, `boolIsActive`) VALUES
('ROLE001', 'Production Manager', 'In charge in overall production of transaction.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('ROLE002', 'Sewer', 'In charge the manufacturing of garments.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('ROLE003', 'Cutter', 'In charge in the pattern making of garments.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric`
--

CREATE TABLE IF NOT EXISTS `tblfabric` (
  `strFabricID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricTypeFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricPatternFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricColorFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricThreadCountFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dblFabricPrice` double NOT NULL,
  `strFabricCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txtFabricDesc` text COLLATE utf8_unicode_ci,
  `strFabricInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strFabricID`),
  KEY `tblfabric_strfabrictypefk_index` (`strFabricTypeFK`),
  KEY `tblfabric_strfabricpatternfk_index` (`strFabricPatternFK`),
  KEY `tblfabric_strfabriccolorfk_index` (`strFabricColorFK`),
  KEY `tblfabric_strfabricthreadcountfk_index` (`strFabricThreadCountFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabric`
--

INSERT INTO `tblfabric` (`strFabricID`, `strFabricTypeFK`, `strFabricPatternFK`, `strFabricColorFK`, `strFabricThreadCountFK`, `strFabricName`, `dblFabricPrice`, `strFabricCode`, `strFabricImage`, `txtFabricDesc`, `strFabricInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('FAB001', 'FABTYPE001', 'FBRCPAT003', 'FABCLR001', 'THRDC002', 'Calvary Pink Plain', 150, 'FC01', 'imgFabrics/s-697-8-1323753168826.jpg', 'Use for school uniforms and costumes.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FAB002', 'FABTYPE002', 'FBRCPAT002', 'FABCLR002', 'THRDC001', 'Blue Striped Soft', 200, 'FC02', 'imgFabrics/h2.jpg', 'Use for customize shirts and polos.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FAB003', 'FABTYPE003', 'FBRCPAT003', 'FABCLR003', 'THRDC002', 'Plain Yellow', 200, 'FC03', 'imgFabrics/o37-b-1260944373495.jpg', 'Use for customize gowns and costumes.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabriccolor`
--

CREATE TABLE IF NOT EXISTS `tblfabriccolor` (
  `strFabricColorID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricColorName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtFabricColorDesc` text COLLATE utf8_unicode_ci,
  `strFabricColorInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strFabricColorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabriccolor`
--

INSERT INTO `tblfabriccolor` (`strFabricColorID`, `strFabricColorName`, `txtFabricColorDesc`, `strFabricColorInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('FABCLR001', 'Blue', 'Perfect color for summer.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR002', 'Teal', 'Perfect pallette for autumn.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR003', 'Yellow', 'Perfect pallette for spring.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR004', 'Rainbow', 'Perfect pallette for summer.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR005', 'Red', 'Perfect pallette for love season.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR006', 'Black', 'Perfect color for formal events.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABCLR007', 'Gray', 'Perfect pallette for business attires.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabricpattern`
--

CREATE TABLE IF NOT EXISTS `tblfabricpattern` (
  `strFabricPatternID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricPatternName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtFabricPatternDesc` text COLLATE utf8_unicode_ci,
  `strFabricPatternInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strFabricPatternID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabricpattern`
--

INSERT INTO `tblfabricpattern` (`strFabricPatternID`, `strFabricPatternName`, `txtFabricPatternDesc`, `strFabricPatternInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('FBRCPAT001', 'Dots', 'Usually use for polos.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FBRCPAT002', 'Striped', 'Usually use for shirts and pants.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FBRCPAT003', 'Plain', 'Widely use for different types of garments.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FBRCPAT004', 'Checkered', 'Widely use for different types of polos and shorts.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabricthreadcount`
--

CREATE TABLE IF NOT EXISTS `tblfabricthreadcount` (
  `strFabricThreadCountID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricThreadCountName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtFabricThreadCountDesc` text COLLATE utf8_unicode_ci,
  `strFabricThreadCountInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strFabricThreadCountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabricthreadcount`
--

INSERT INTO `tblfabricthreadcount` (`strFabricThreadCountID`, `strFabricThreadCountName`, `txtFabricThreadCountDesc`, `strFabricThreadCountInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('THRDC001', '80s', 'Use for bed sheets.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('THRDC002', '60s', 'Usually use for shirts and pants.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabrictype`
--

CREATE TABLE IF NOT EXISTS `tblfabrictype` (
  `strFabricTypeID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strFabricTypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtFabricTypeDesc` text COLLATE utf8_unicode_ci,
  `strFabricTypeInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strFabricTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfabrictype`
--

INSERT INTO `tblfabrictype` (`strFabricTypeID`, `strFabricTypeName`, `txtFabricTypeDesc`, `strFabricTypeInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('FABTYPE001', 'Linen', 'Use for making lapels in tuxedo.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABTYPE002', 'Cotton', 'Use in almost all classes of shirt.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('FABTYPE003', 'Silk', 'Use in almost all classes of shirt.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblgarmentcategory`
--

CREATE TABLE IF NOT EXISTS `tblgarmentcategory` (
  `strGarmentCategoryID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `strGarmentCategoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `textGarmentCategoryDesc` text COLLATE utf8_unicode_ci,
  `strGarmentCategoryInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`strGarmentCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblgarmentcategory`
--

INSERT INTO `tblgarmentcategory` (`strGarmentCategoryID`, `created_at`, `updated_at`, `strGarmentCategoryName`, `textGarmentCategoryDesc`, `strGarmentCategoryInactiveReason`, `boolIsActive`) VALUES
('GARM001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Uniforms', 'Custom made uniforms for male and female.', NULL, 1),
('GARM002', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Suits', 'Formal wear essential for men.', NULL, 1),
('GARM003', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Men Shirt', 'Combination of casual and formal shirts.', NULL, 1),
('GARM004', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pants', 'Customize and perfect fit pants.', NULL, 1),
('GARM005', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Women Shirt', 'Combination of casual and formal shirts for women.', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblhookeye`
--

CREATE TABLE IF NOT EXISTS `tblhookeye` (
  `intHookID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strHookBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strHookSize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strHookColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strHookImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `textHookDesc` text COLLATE utf8_unicode_ci,
  `strHookInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intHookID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblhookeye`
--

INSERT INTO `tblhookeye` (`intHookID`, `strHookBrand`, `strHookSize`, `strHookColor`, `strHookImage`, `textHookDesc`, `strHookInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
(1, 'Skirt Hook', 'Small', 'Black', '', 'Use for skirt and dress', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pants Hook', 'Medium', 'Silver', '', 'Use for pants', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljoaddcharge`
--

CREATE TABLE IF NOT EXISTS `tbljoaddcharge` (
  `strAdditionalChargeID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAdditionalChargeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dblAdditionalChargeAmount` double NOT NULL,
  `txtNote` text COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strAdditionalChargeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljoalteration`
--

CREATE TABLE IF NOT EXISTS `tbljoalteration` (
  `strJOAlterationID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAlterationType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAlterationFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtAlterationNotes` text COLLATE utf8_unicode_ci NOT NULL,
  `strSegmentMeasSpecFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strSegmentNonShopSpecFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJOAlterationID`),
  KEY `tbljoalteration_stralterationfk_index` (`strAlterationFK`),
  KEY `tbljoalteration_strsegmentmeasspecfk_index` (`strSegmentMeasSpecFK`),
  KEY `tbljoalteration_strsegmentnonshopspecfk_index` (`strSegmentNonShopSpecFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborder`
--

CREATE TABLE IF NOT EXISTS `tbljoborder` (
  `strJobOrderID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJO_CustomerFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strJO_CustomerCompanyFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTermsOfPayment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strModeOfPayment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intJO_OrderQuantity` int(11) NOT NULL,
  `dblOrderTotalPrice` double NOT NULL,
  `boolIsOrderAccepted` tinyint(1) NOT NULL,
  `dtOrderDate` date DEFAULT NULL,
  `dtOrderApproved` date DEFAULT NULL,
  `dtOrderExpectedToBeDone` date DEFAULT NULL,
  `dtExpectedDeliveryDate` date DEFAULT NULL,
  `dtFinished` date DEFAULT NULL,
  `dtDelivered` date DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJobOrderID`),
  KEY `tbljoborder_strjo_customerfk_index` (`strJO_CustomerFK`),
  KEY `tbljoborder_strjo_customercompanyfk_index` (`strJO_CustomerCompanyFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljoborder`
--

INSERT INTO `tbljoborder` (`strJobOrderID`, `strJO_CustomerFK`, `strJO_CustomerCompanyFK`, `strTermsOfPayment`, `strModeOfPayment`, `intJO_OrderQuantity`, `dblOrderTotalPrice`, `boolIsOrderAccepted`, `dtOrderDate`, `dtOrderApproved`, `dtOrderExpectedToBeDone`, `dtExpectedDeliveryDate`, `dtFinished`, `dtDelivered`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('JO001', 'CUSTP001', NULL, 'COD', 'Cash', 10, 500, 1, '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JO002', 'CUSTP002', NULL, 'COD', 'Cash', 5, 500, 1, '2016-07-24', '2016-07-24', '2016-07-24', '2016-07-24', '2016-07-24', '2016-07-24', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JO003', NULL, 'CUSTC001', 'COD', 'Cash', 20, 500, 1, '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljoborderprogress`
--

CREATE TABLE IF NOT EXISTS `tbljoborderprogress` (
  `strJobOrderProgressID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJobOrderSpecificFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intProgressAmount` int(11) NOT NULL,
  `dtProgressDate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJobOrderProgressID`),
  KEY `tbljoborderprogress_strjoborderspecificfk_index` (`strJobOrderSpecificFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljoborderprogress`
--

INSERT INTO `tbljoborderprogress` (`strJobOrderProgressID`, `strJobOrderSpecificFK`, `intProgressAmount`, `dtProgressDate`, `created_at`, `updated_at`) VALUES
('JOP001', 'JOS001', 3, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP002', 'JOS002', 4, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP003', 'JOS003', 4, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP004', 'JOS004', 4, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP005', 'JOS005', 2, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP006', 'JOS006', 15, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOP007', 'JOS007', 5, '2016-07-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljomeasurespecific`
--

CREATE TABLE IF NOT EXISTS `tbljomeasurespecific` (
  `strJOMeasureSpecificID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJobOrderSpecificFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasureProfileFk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasureDetailFk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strStandardSizeFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblMeasureValue` double NOT NULL,
  `strBodyPartFormFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strUnitofMeasurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJOMeasureSpecificID`),
  KEY `tbljomeasurespecific_strjoborderspecificfk_index` (`strJobOrderSpecificFK`),
  KEY `tbljomeasurespecific_strmeasureprofilefk_index` (`strMeasureProfileFk`),
  KEY `tbljomeasurespecific_strmeasuredetailfk_index` (`strMeasureDetailFk`),
  KEY `tbljomeasurespecific_strstandardsizefk_index` (`strStandardSizeFK`),
  KEY `tbljomeasurespecific_strbodypartformfk_index` (`strBodyPartFormFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljonoteformodify`
--

CREATE TABLE IF NOT EXISTS `tbljonoteformodify` (
  `strJobOrderIDFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtUpdateNote` text COLLATE utf8_unicode_ci NOT NULL,
  `dtOrderModified` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `tbljonoteformodify_strjoborderidfk_index` (`strJobOrderIDFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljopayment`
--

CREATE TABLE IF NOT EXISTS `tbljopayment` (
  `strPaymentID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strTransactionFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTransacAlterFk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblAmountTendered` double NOT NULL,
  `dblAmountToPay` double NOT NULL,
  `dblOutstandingBal` double NOT NULL,
  `strReceivedByEmployeeNameFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dtPaymentDate` date NOT NULL,
  `dtPaymentDueDate` date NOT NULL,
  `strPaymentStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strAdditionalChargeFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strPaymentID`),
  KEY `tbljopayment_strtransactionfk_index` (`strTransactionFK`),
  KEY `tbljopayment_strtransacalterfk_index` (`strTransacAlterFk`),
  KEY `tbljopayment_strreceivedbyemployeenamefk_index` (`strReceivedByEmployeeNameFK`),
  KEY `tbljopayment_stradditionalchargefk_index` (`strAdditionalChargeFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljospecific`
--

CREATE TABLE IF NOT EXISTS `tbljospecific` (
  `strJOSpecificID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJobOrderFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJOSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strJOFabricFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intQuantity` int(11) NOT NULL,
  `dblUnitPrice` double NOT NULL,
  `intEstimatedDaystoFinish` int(11) NOT NULL,
  `strEmployeeNameFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dtDateModified` date DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJOSpecificID`),
  KEY `tbljospecific_strjoborderfk_index` (`strJobOrderFK`),
  KEY `tbljospecific_strjosegmentfk_index` (`strJOSegmentFK`),
  KEY `tbljospecific_strjofabricfk_index` (`strJOFabricFK`),
  KEY `tbljospecific_stremployeenamefk_index` (`strEmployeeNameFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljospecific`
--

INSERT INTO `tbljospecific` (`strJOSpecificID`, `strJobOrderFK`, `strJOSegmentFK`, `strJOFabricFK`, `intQuantity`, `dblUnitPrice`, `intEstimatedDaystoFinish`, `strEmployeeNameFK`, `dtDateModified`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('JOS001', 'JO001', 'SEGM001', 'FAB001', 10, 500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS002', 'JO001', 'SEGM002', 'FAB001', 5, 300, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS003', 'JO002', 'SEGM004', 'FAB001', 5, 500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS004', 'JO002', 'SEGM005', 'FAB002', 7, 500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS005', 'JO002', 'SEGM003', 'FAB002', 5, 5500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS006', 'JO003', 'SEGM003', 'FAB002', 25, 5500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('JOS007', 'JO003', 'SEGM004', 'FAB002', 15, 5500, 10, 'EMPL001', '2016-07-23', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljospecificaccessory`
--

CREATE TABLE IF NOT EXISTS `tbljospecificaccessory` (
  `strJobOrderSpecificFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `tbljospecificaccessory_strjoborderspecificfk_index` (`strJobOrderSpecificFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljospecificmaterial`
--

CREATE TABLE IF NOT EXISTS `tbljospecificmaterial` (
  `strJOSpecificFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `tbljospecificmaterial_strjospecificfk_index` (`strJOSpecificFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbljospecificsegmentpattern`
--

CREATE TABLE IF NOT EXISTS `tbljospecificsegmentpattern` (
  `intJOSpecSegmentPatternID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strJobOrderSpecificFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegmentPatternFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intJOSpecSegmentPatternID`),
  KEY `tbljospecificsegmentpattern_strjoborderspecificfk_index` (`strJobOrderSpecificFK`),
  KEY `tbljospecificsegmentpattern_strsegmentpatternfk_index` (`strSegmentPatternFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbljo_measureprofile`
--

CREATE TABLE IF NOT EXISTS `tbljo_measureprofile` (
  `strJOMeasureProfileID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasProfCustIndivFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strMeasProfCustCompanyFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strProfileName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strJOMeasureProfileID`),
  KEY `tbljo_measureprofile_strmeasprofcustindivfk_index` (`strMeasProfCustIndivFK`),
  KEY `tbljo_measureprofile_strmeasprofcustcompanyfk_index` (`strMeasProfCustCompanyFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmeasurementcategory`
--

CREATE TABLE IF NOT EXISTS `tblmeasurementcategory` (
  `strMeasurementCategoryID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasurementCategoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtMeasurementCategoryDesc` text COLLATE utf8_unicode_ci,
  `strMeasCatInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strMeasurementCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmeasurementcategory`
--

INSERT INTO `tblmeasurementcategory` (`strMeasurementCategoryID`, `strMeasurementCategoryName`, `txtMeasurementCategoryDesc`, `strMeasCatInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('MEASCAT001', 'Standard Measurement', 'Measurement base from standard sizes, categorize into small,medium, large.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASCAT002', 'Body Measurement', 'Actual measurement of the customer. Can be taken by the customer himself/herself.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASCAT003', 'Clothing Measurement', ' Measurements from clothing which already fits the customer well.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblmeasurementdetail`
--

CREATE TABLE IF NOT EXISTS `tblmeasurementdetail` (
  `strMeasurementDetailID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasDetSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasCategoryFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strMeasDetailName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtMeasDetailDesc` text COLLATE utf8_unicode_ci,
  `dblMeasDetailMinCm` double DEFAULT NULL,
  `dblMeasDetailMinInch` double DEFAULT NULL,
  `strMeasDetInactiveReason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strMeasurementDetailID`),
  KEY `tblmeasurementdetail_strmeasdetsegmentfk_index` (`strMeasDetSegmentFK`),
  KEY `tblmeasurementdetail_strmeascategoryfk_index` (`strMeasCategoryFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblmeasurementdetail`
--

INSERT INTO `tblmeasurementdetail` (`strMeasurementDetailID`, `strMeasDetSegmentFK`, `strMeasCategoryFK`, `strMeasDetailName`, `txtMeasDetailDesc`, `dblMeasDetailMinCm`, `dblMeasDetailMinInch`, `strMeasDetInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('MEASDET001', 'SEGM004', 'MEASCAT002', 'Chest', '', 14.5, 5.51, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET002', 'SEGM004', 'MEASCAT002', 'Hips', '', 37, 28, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET003', 'SEGM004', 'MEASCAT002', 'Back Length', '', 28, 19, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET004', 'SEGM004', 'MEASCAT002', 'Shoulder', '', 16, 7, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET005', 'SEGM004', 'MEASCAT002', 'Neck', '', 14.5, 5.51, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET006', 'SEGM004', 'MEASCAT002', 'Bicep', '', 11, 2, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET007', 'SEGM006', 'MEASCAT003', 'Half Waist', '', 23, 14, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET008', 'SEGM006', 'MEASCAT003', 'Outseam', '', 21, 12, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET009', 'SEGM006', 'MEASCAT003', 'Half Knee', '', 15, 7, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET010', 'SEGM006', 'MEASCAT003', 'Half Thigh', '', 20, 11, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET011', 'SEGM006', 'MEASCAT003', 'Back Rise', '', 15, 8, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET012', 'SEGM006', 'MEASCAT003', 'Front Rise', '', 16, 7, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET013', 'SEGM006', 'MEASCAT002', 'Crotch', '', 26, 17, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET014', 'SEGM006', 'MEASCAT002', 'Jack Length', '', 20, 11, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MEASDET015', 'SEGM006', 'MEASCAT002', 'Wrist', '', 10, 1, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblneedle`
--

CREATE TABLE IF NOT EXISTS `tblneedle` (
  `intNeedleID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strNeedleBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strNeedleSize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strNeedleDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strNeedleImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strNeedleInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intNeedleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblneedle`
--

INSERT INTO `tblneedle` (`intNeedleID`, `strNeedleBrand`, `strNeedleSize`, `strNeedleDesc`, `strNeedleImage`, `strNeedleInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
(1, 'Classic Big', 'Big', 'For large comforters', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Sharp Classic', 'Small', 'For mass production', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblnonshopalteration`
--

CREATE TABLE IF NOT EXISTS `tblnonshopalteration` (
  `strNonShopAlterID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strCustIndFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCustCompFK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblOrderTotalPrice` double NOT NULL,
  `dtAlteration` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strNonShopAlterID`),
  KEY `tblnonshopalteration_strcustindfk_index` (`strCustIndFK`),
  KEY `tblnonshopalteration_strcustcompfk_index` (`strCustCompFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblnonshopalterspecific`
--

CREATE TABLE IF NOT EXISTS `tblnonshopalterspecific` (
  `strNonAlterSpecificID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strNonShopAlterFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strGarmentSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strNonAlterSpecificID`),
  KEY `tblnonshopalterspecific_strnonshopalterfk_index` (`strNonShopAlterFK`),
  KEY `tblnonshopalterspecific_strgarmentsegmentfk_index` (`strGarmentSegmentFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpackages`
--

CREATE TABLE IF NOT EXISTS `tblpackages` (
  `strPackageID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageSex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageSeg1FK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageSeg2FK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageSeg3FK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strPackageSeg4FK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strPackageSeg5FK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblPackagePrice` double NOT NULL,
  `strPackageImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intPackageMinDays` int(11) NOT NULL,
  `strPackageDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `strPackageInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strPackageID`),
  KEY `tblpackages_strpackageseg1fk_index` (`strPackageSeg1FK`),
  KEY `tblpackages_strpackageseg2fk_index` (`strPackageSeg2FK`),
  KEY `tblpackages_strpackageseg3fk_index` (`strPackageSeg3FK`),
  KEY `tblpackages_strpackageseg4fk_index` (`strPackageSeg4FK`),
  KEY `tblpackages_strpackageseg5fk_index` (`strPackageSeg5FK`),
  KEY `tblpackages_strpackageimage_index` (`strPackageImage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblpackages`
--

INSERT INTO `tblpackages` (`strPackageID`, `strPackageName`, `strPackageSex`, `strPackageSeg1FK`, `strPackageSeg2FK`, `strPackageSeg3FK`, `strPackageSeg4FK`, `strPackageSeg5FK`, `dblPackagePrice`, `strPackageImage`, `intPackageMinDays`, `strPackageDesc`, `boolIsActive`, `strPackageInactiveReason`, `created_at`, `updated_at`) VALUES
('PACK0001', 'Generic FA', 'F', 'SEGM003', 'SEGM003', 'SEGM003', 'SEGM005', 'SEGM005', 2500, 'imgPackages/Fset 1.1.png', 60, '3 pairs of blouse and ladies slacks. ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('PACK0002', 'Generic FB', 'F', 'SEGM003', 'SEGM003', 'SEGM005', 'SEGM005', 'SEGM007', 3500, 'imgPackages/Fset 2.1.png', 60, '2 pairs of slacks and blouse plus a dress.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('PACK0003', 'Generic FC', 'F', 'SEGM007', 'SEGM007', 'SEGM007', 'SEGM005', 'SEGM003', 3500, 'imgPackages/Fset 3.1.png', 60, '3 pieces of dress and a ladies slacks and blouse.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsegment`
--

CREATE TABLE IF NOT EXISTS `tblsegment` (
  `strSegmentID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegCategoryFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegmentName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dblSegmentPrice` double NOT NULL,
  `strSegmentSex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intMinDays` int(11) NOT NULL,
  `strSegmentImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `textSegmentDesc` text COLLATE utf8_unicode_ci,
  `strSegInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strSegmentID`),
  KEY `tblsegment_strsegcategoryfk_foreign` (`strSegCategoryFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsegment`
--

INSERT INTO `tblsegment` (`strSegmentID`, `strSegCategoryFK`, `strSegmentName`, `dblSegmentPrice`, `strSegmentSex`, `intMinDays`, `strSegmentImage`, `textSegmentDesc`, `strSegInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('SEGM001', 'GARM001', 'Skirt', 500, 'F', 7, 'imgSegments/female-uniform-skirt.jpg', 'Pangibabang kasuotan sa babae.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM002', 'GARM002', 'Coat', 750, 'M', 7, 'imgSegments/blazer.jpg', 'Upper part wear for men.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM003', 'GARM001', 'Ladies Slacks', 400, 'F', 4, 'imgSegments/female-uniform-pants.jpg', 'For ladies who prefered to wear pants instead of skirt.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM004', 'GARM001', 'Polo Shirt', 500, 'M', 5, 'imgSegments/polo-1-col.jpg', 'Upper part wear for mens uniform.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM005', 'GARM001', 'Blouse', 550, 'F', 4, 'imgSegments/dress1.jpg', 'Upper part wear for womens`s uniform.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM006', 'GARM001', 'Pants', 700, 'M', 3, 'imgSegments/ia2375-1.jpg', 'Lower part wear.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGM007', 'GARM001', 'Dress', 600, 'F', 3, 'imgSegments/dressfinal.jpg', 'Formal for womens uniform.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsegmentpattern`
--

CREATE TABLE IF NOT EXISTS `tblsegmentpattern` (
  `strSegPatternID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegPStyleCategoryFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegPName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegPImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblPatternPrice` double NOT NULL,
  `txtSegPDesc` text COLLATE utf8_unicode_ci,
  `boolIsActive` tinyint(1) NOT NULL,
  `strSegPInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strSegPatternID`),
  KEY `tblsegmentpattern_strsegpstylecategoryfk_index` (`strSegPStyleCategoryFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsegmentpattern`
--

INSERT INTO `tblsegmentpattern` (`strSegPatternID`, `strSegPStyleCategoryFK`, `strSegPName`, `strSegPImage`, `dblPatternPrice`, `txtSegPDesc`, `boolIsActive`, `strSegPInactiveReason`, `created_at`, `updated_at`) VALUES
('SPAT001', 'SEGSTY001', 'Shawl Type', 'imgDesignPatterns/shawllapel.jpg', 50, 'Type of lapel, usually use in gala nights and formal events.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT002', 'SEGSTY001', 'Notch Type', 'imgDesignPatterns/notchedlapel.jpg', 70, 'Lapel speacial used for every-day business suit, interview suit.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT003', 'SEGSTY001', 'Peak Type', 'imgDesignPatterns/peakedlapel.jpg', 80, 'Weddings, formal dinners, black tie events or simply whenever you want to dress up a bit while turning some heads.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT004', 'SEGSTY003', 'Button Down', 'imgDesignPatterns/button-down.jpg', 70, 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT005', 'SEGSTY003', 'Riley Collar', 'imgDesignPatterns/1ButtonRileyCollar.jpg', 70, 'Usually use as a collar for tuxedos.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT006', 'SEGSTY003', ' Band Collar', 'imgDesignPatterns/band.jpg', 70, 'Usually use as a collar for chinese formal wears.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT007', 'SEGSTY003', ' Italian Collar', 'imgDesignPatterns/italiancollar.jpg', 70, 'Usually use as a collar for dress shirts.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT008', 'SEGSTY004', ' Angle Cut ', 'imgDesignPatterns/pocket_angle_cut.jpg', 50, 'Usually use as a collar for dress shirts.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT009', 'SEGSTY004', ' Round Cut ', 'imgDesignPatterns/pocket_round_cut.jpg', 50, 'A pocket on a shirt that has round cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT010', 'SEGSTY004', ' Square Cut ', 'imgDesignPatterns/pocket_square_cut.jpg', 50, 'A pocket on a shirt that has square cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT011', 'SEGSTY004', ' V-Shaped Cut ', 'imgDesignPatterns/pocket_vshaped.jpg', 50, 'A pocket on a shirt that has v-shaped cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT012', 'SEGSTY002', ' French Cut ', 'imgDesignPatterns/french-cut.jpg', 50, 'A cuff that is a french cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT013', 'SEGSTY002', ' French Round ', 'imgDesignPatterns/french-round.jpg', 50, 'A cuff that is a french round.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT014', 'SEGSTY002', ' French Cut ', 'imgDesignPatterns/french-square.jpg', 50, 'A cuff that is a french square.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT015', 'SEGSTY002', ' Portofino ', 'imgDesignPatterns/portofino.jpg', 50, 'A cuff that is a portofino.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT016', 'SEGSTY002', ' Round Cut ', 'imgDesignPatterns/round-cut-1-button.jpg', 50, 'A cuff that is a round cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT017', 'SEGSTY002', ' Round Cut Portofino', 'imgDesignPatterns/roundcutportofino.jpg', 50, 'A cuff that is a round cut portofino.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT018', 'SEGSTY002', ' Square Cut ', 'imgDesignPatterns/square-1-button.jpg', 50, 'A cuff that is a square cut.', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT019', 'SEGSTY006', ' 1 Pleat ', 'imgDesignPatterns/1pleat.jpg', 50, 'Pants with 1 pleat', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT020', 'SEGSTY006', ' 2 Pleats ', 'imgDesignPatterns/2pleats.jpg', 50, 'Pants with 2 pleats', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT021', 'SEGSTY007', ' Vertical Pockets ', 'imgDesignPatterns/verticalpantspockets.jpg', 50, 'Pants pockets vertically cut', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT022', 'SEGSTY007', ' Sliced Pockets ', 'imgDesignPatterns/slicedpantspockets.jpg', 50, 'Pants pockets sliced cut', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT023', 'SEGSTY012', ' 1 Back Pocket ', 'imgDesignPatterns/1backpocket.jpg', 50, 'Pants with 1 backpocket', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SPAT024', 'SEGSTY012', ' 2 Back Pocket ', 'imgDesignPatterns/2backpockets.jpg', 50, 'Pants with 2 backpocket', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsegmentstylecategory`
--

CREATE TABLE IF NOT EXISTS `tblsegmentstylecategory` (
  `strSegStyleCatID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strSegStyleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtSegStyleCatDesc` text COLLATE utf8_unicode_ci,
  `strSegStyleCatInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strSegStyleCatID`),
  KEY `tblsegmentstylecategory_strsegmentfk_index` (`strSegmentFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsegmentstylecategory`
--

INSERT INTO `tblsegmentstylecategory` (`strSegStyleCatID`, `strSegmentFK`, `strSegStyleName`, `txtSegStyleCatDesc`, `strSegStyleCatInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('SEGSTY001', 'SEGM002', 'Lapel', 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY002', 'SEGM002', 'Cuff', 'A fold or band serving as a trimming or finish for the bottom of a sleeve', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY003', 'SEGM004', 'Collar', 'The part of a garment that encircles the neck, especially when raised or folded.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY004', 'SEGM004', 'Shirt Pocket', 'Perfect pairing for casual pants', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY005', 'SEGM006', 'Fit', 'Either normal, slim or loose fit.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY006', 'SEGM006', 'Pants Pleat', 'Stylish detail for pants/trousers', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY007', 'SEGM006', 'Pants Pockets', 'Either be vertical or sliced pockets.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY008', 'SEGM002', 'Single Breasted', 'Widely use for business and formal events. ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY009', 'SEGM002', 'Double Breasted', 'Widely use for business and formal events. ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY010', 'SEGM002', 'Vents', 'Stylish accent on the back side of the jacket.  ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY011', 'SEGM002', 'Chest pocket', 'Stylish accent on the chest side of the jacket.  ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY012', 'SEGM006', 'Backpockets', 'Either 1 or 2 backpockets.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('SEGSTY013', 'SEGM006', 'Pants Bottom', 'Either with or without cuffs.', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstandardsizecategory`
--

CREATE TABLE IF NOT EXISTS `tblstandardsizecategory` (
  `strStandardSizeCategoryID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStandardSizeCategoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtStandardSizeCategoryDesc` text COLLATE utf8_unicode_ci,
  `strStandardSizeCategoryInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strStandardSizeCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblstandardsizecategory`
--

INSERT INTO `tblstandardsizecategory` (`strStandardSizeCategoryID`, `strStandardSizeCategoryName`, `txtStandardSizeCategoryDesc`, `strStandardSizeCategoryInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('STDRSZE001', 'Extra Small', 'For extra petite body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRSZE002', 'Small', 'For petite body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRSZE003', 'Medium', 'For regular body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRSZE004', 'Large', 'For slight hefty body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRSZE005', 'Extra Large', 'For hefty hefty body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRSZE006', 'XX Large', 'For super hefty body type.', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstandardsizedetail`
--

CREATE TABLE IF NOT EXISTS `tblstandardsizedetail` (
  `strStandardSizeDetID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStanSizeSegmentFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStanSizeMeasCatFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStanSizeCategoryFK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStanSizeDetailName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strStanSizeFitType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dblStanSizeInch` double NOT NULL,
  `txtStanSizeDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`strStandardSizeDetID`),
  KEY `tblstandardsizedetail_strstansizesegmentfk_index` (`strStanSizeSegmentFK`),
  KEY `tblstandardsizedetail_strstansizemeascatfk_index` (`strStanSizeMeasCatFK`),
  KEY `tblstandardsizedetail_strstansizecategoryfk_index` (`strStanSizeCategoryFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblstandardsizedetail`
--

INSERT INTO `tblstandardsizedetail` (`strStandardSizeDetID`, `strStanSizeSegmentFK`, `strStanSizeMeasCatFK`, `strStanSizeCategoryFK`, `strStanSizeDetailName`, `strStanSizeFitType`, `dblStanSizeInch`, `txtStanSizeDesc`, `boolIsActive`, `created_at`, `updated_at`) VALUES
('STDRDSZDET001', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Collar', 'Slim Fit', 27, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET002', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Collar', 'Normal Fit', 27, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET003', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Collar', 'Loose Fit', 29, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET004', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Collar', 'Normal Fit', 15, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET005', 'SEGM004', 'MEASCAT001', 'STDRSZE005', 'Collar', 'Loose Fit', 17.75, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET006', 'SEGM004', 'MEASCAT001', 'STDRSZE004', 'Collar', 'Loose Fit', 16.5, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET007', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Collar', 'Slim Fit', 15, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET008', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Shirt Length', 'Slim Fit', 28, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET009', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Shirt Length', 'Slim Fit', 29, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET010', 'SEGM004', 'MEASCAT001', 'STDRSZE003', 'Shirt Length', 'Slim Fit', 31, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET011', 'SEGM004', 'MEASCAT001', 'STDRSZE004', 'Shirt Length', 'Slim Fit', 31.5, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET012', 'SEGM004', 'MEASCAT001', 'STDRSZE005', 'Shirt Length', 'Slim Fit', 32, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET013', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Shoulder Width', 'Slim Fit', 16, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET014', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Shoulder Width', 'Slim Fit', 17, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET015', 'SEGM004', 'MEASCAT001', 'STDRSZE003', 'Shoulder Width', 'Slim Fit', 18, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET016', 'SEGM004', 'MEASCAT001', 'STDRSZE004', 'Shoulder Width', 'Slim Fit', 19.5, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET017', 'SEGM004', 'MEASCAT001', 'STDRSZE005', 'Shoulder Width', 'Slim Fit', 20.5, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET018', 'SEGM004', 'MEASCAT001', 'STDRSZE006', 'Shoulder Width', 'Slim Fit', 22, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET019', 'SEGM004', 'MEASCAT001', 'STDRSZE006', 'Shoulder Width', 'Slim Fit', 22, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET020', 'SEGM004', 'MEASCAT001', 'STDRSZE006', 'Shoulder Width', 'Slim Fit', 22, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET021', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Sleeve Length', 'Slim Fit', 25, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET022', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Sleeve Length', 'Slim Fit', 26, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET023', 'SEGM004', 'MEASCAT001', 'STDRSZE003', 'Sleeve Length', 'Slim Fit', 25, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET024', 'SEGM004', 'MEASCAT001', 'STDRSZE004', 'Sleeve Length', 'Slim Fit', 26, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET025', 'SEGM004', 'MEASCAT001', 'STDRSZE005', 'Sleeve Length', 'Slim Fit', 27, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET026', 'SEGM004', 'MEASCAT001', 'STDRSZE006', 'Sleeve Length', 'Slim Fit', 27, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET027', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Chest', 'Slim Fit', 37, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET028', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Chest', 'Normal Fit', 44, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET029', 'SEGM004', 'MEASCAT001', 'STDRSZE001', 'Chest', 'Loose Fit', 45, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('STDRDSZDET030', 'SEGM004', 'MEASCAT001', 'STDRSZE002', 'Chest', 'Loose Fit', 46, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblthread`
--

CREATE TABLE IF NOT EXISTS `tblthread` (
  `intThreadID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strThreadBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strThreadColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strThreadDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strThreadImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strThreadInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intThreadID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblthread`
--

INSERT INTO `tblthread` (`intThreadID`, `strThreadBrand`, `strThreadColor`, `strThreadDesc`, `strThreadImage`, `strThreadInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
(1, 'Coats Metallic', 'Silver', 'Used for theatrical costumes and other events.', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Rayon', 'Red', 'For normal clothes', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblzipper`
--

CREATE TABLE IF NOT EXISTS `tblzipper` (
  `intZipperID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strZipperBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strZipperColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txtZipperDesc` text COLLATE utf8_unicode_ci,
  `strZipperImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strZipperInactiveReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boolIsActive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intZipperID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblzipper`
--

INSERT INTO `tblzipper` (`intZipperID`, `strZipperBrand`, `strZipperColor`, `txtZipperDesc`, `strZipperImage`, `strZipperInactiveReason`, `boolIsActive`, `created_at`, `updated_at`) VALUES
(1, 'Zigzag', 'Gray', 'For Pants', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Straight', 'Blue', 'Zipper for pockets', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `password`, `confirmation_code`, `confirmed`, `user_image`, `remember_token`, `created_at`, `updated_at`) VALUES
('USER001', 'Morriel Aquino', 'employee', 'morrielaquino@yahoo.com', '$2y$10$ygSbJi7pCAeXUWod.ZfP.u0JW/UgI3V0LlKSTakkUrtoSL.VVjqai', NULL, 1, 'imgUsers/Morriel IBITS Background.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('USER002', 'Honey Mae Buenavides', 'customer', 'haniganda@gmail.com', '$2y$10$0/.2ELqg6/UMekMSpserwOs3fuxYhZ8bq1O3g.q4rWTz3ey52Flbm', NULL, 1, 'imgUsers/honeybabe.jpg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('USER003', 'Pfizer Phils', 'customer', 'pfizer@gmail.com', '$2y$10$YwLzoS4jAXxl0jnL/TqKouRpOSZFUVaqrNBWeV9RnOF/335Pf8S.y', NULL, 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblalteration`
--
ALTER TABLE `tblalteration`
  ADD CONSTRAINT `tblalteration_stralterationsegmentfk_foreign` FOREIGN KEY (`strAlterationSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`);

--
-- Constraints for table `tblbodypartform`
--
ALTER TABLE `tblbodypartform`
  ADD CONSTRAINT `tblbodypartform_strbodypartfk_foreign` FOREIGN KEY (`strBodyPartFK`) REFERENCES `tblbodypartcategory` (`strBodyPartCategoryID`);

--
-- Constraints for table `tblcatalogue`
--
ALTER TABLE `tblcatalogue`
  ADD CONSTRAINT `tblcatalogue_strcataloguecategoryfk_foreign` FOREIGN KEY (`strCatalogueCategoryFK`) REFERENCES `tblgarmentcategory` (`strGarmentCategoryID`);

--
-- Constraints for table `tblcustcompany`
--
ALTER TABLE `tblcustcompany`
  ADD CONSTRAINT `tblcustcompany_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `tblcustindividual`
--
ALTER TABLE `tblcustindividual`
  ADD CONSTRAINT `tblcustindividual_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD CONSTRAINT `tblcustomer_strcustomeraccountidfk_foreign` FOREIGN KEY (`strCustomerAccountIDFK`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tblcustomer_strcustomer_companyfk_foreign` FOREIGN KEY (`strCustomer_CompanyFK`) REFERENCES `tblcustcompany` (`strCompanyID`),
  ADD CONSTRAINT `tblcustomer_strcustomer_indfk_foreign` FOREIGN KEY (`strCustomer_IndFK`) REFERENCES `tblcustindividual` (`strIndivID`);

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `tblemployee_strrole_foreign` FOREIGN KEY (`strRole`) REFERENCES `tblemployeerole` (`strEmpRoleID`);

--
-- Constraints for table `tblfabric`
--
ALTER TABLE `tblfabric`
  ADD CONSTRAINT `tblfabric_strfabriccolorfk_foreign` FOREIGN KEY (`strFabricColorFK`) REFERENCES `tblfabriccolor` (`strFabricColorID`),
  ADD CONSTRAINT `tblfabric_strfabricpatternfk_foreign` FOREIGN KEY (`strFabricPatternFK`) REFERENCES `tblfabricpattern` (`strFabricPatternID`),
  ADD CONSTRAINT `tblfabric_strfabricthreadcountfk_foreign` FOREIGN KEY (`strFabricThreadCountFK`) REFERENCES `tblfabricthreadcount` (`strFabricThreadCountID`),
  ADD CONSTRAINT `tblfabric_strfabrictypefk_foreign` FOREIGN KEY (`strFabricTypeFK`) REFERENCES `tblfabrictype` (`strFabricTypeID`);

--
-- Constraints for table `tbljoalteration`
--
ALTER TABLE `tbljoalteration`
  ADD CONSTRAINT `tbljoalteration_stralterationfk_foreign` FOREIGN KEY (`strAlterationFK`) REFERENCES `tblalteration` (`strAlterationID`),
  ADD CONSTRAINT `tbljoalteration_strsegmentmeasspecfk_foreign` FOREIGN KEY (`strSegmentMeasSpecFK`) REFERENCES `tbljomeasurespecific` (`strJOMeasureSpecificID`),
  ADD CONSTRAINT `tbljoalteration_strsegmentnonshopspecfk_foreign` FOREIGN KEY (`strSegmentNonShopSpecFK`) REFERENCES `tblnonshopalterspecific` (`strNonAlterSpecificID`);

--
-- Constraints for table `tbljoborder`
--
ALTER TABLE `tbljoborder`
  ADD CONSTRAINT `tbljoborder_strjo_customercompanyfk_foreign` FOREIGN KEY (`strJO_CustomerCompanyFK`) REFERENCES `tblcustcompany` (`strCompanyID`),
  ADD CONSTRAINT `tbljoborder_strjo_customerfk_foreign` FOREIGN KEY (`strJO_CustomerFK`) REFERENCES `tblcustindividual` (`strIndivID`);

--
-- Constraints for table `tbljoborderprogress`
--
ALTER TABLE `tbljoborderprogress`
  ADD CONSTRAINT `tbljoborderprogress_strjoborderspecificfk_foreign` FOREIGN KEY (`strJobOrderSpecificFK`) REFERENCES `tbljospecific` (`strJOSpecificID`);

--
-- Constraints for table `tbljomeasurespecific`
--
ALTER TABLE `tbljomeasurespecific`
  ADD CONSTRAINT `tbljomeasurespecific_strbodypartformfk_foreign` FOREIGN KEY (`strBodyPartFormFK`) REFERENCES `tblbodypartform` (`strBodyFormID`),
  ADD CONSTRAINT `tbljomeasurespecific_strjoborderspecificfk_foreign` FOREIGN KEY (`strJobOrderSpecificFK`) REFERENCES `tbljospecific` (`strJOSpecificID`),
  ADD CONSTRAINT `tbljomeasurespecific_strmeasuredetailfk_foreign` FOREIGN KEY (`strMeasureDetailFk`) REFERENCES `tblmeasurementdetail` (`strMeasurementDetailID`),
  ADD CONSTRAINT `tbljomeasurespecific_strmeasureprofilefk_foreign` FOREIGN KEY (`strMeasureProfileFk`) REFERENCES `tbljo_measureprofile` (`strJOMeasureProfileID`),
  ADD CONSTRAINT `tbljomeasurespecific_strstandardsizefk_foreign` FOREIGN KEY (`strStandardSizeFK`) REFERENCES `tblstandardsizedetail` (`strStandardSizeDetID`);

--
-- Constraints for table `tbljonoteformodify`
--
ALTER TABLE `tbljonoteformodify`
  ADD CONSTRAINT `tbljonoteformodify_strjoborderidfk_foreign` FOREIGN KEY (`strJobOrderIDFK`) REFERENCES `tbljoborder` (`strJobOrderID`);

--
-- Constraints for table `tbljopayment`
--
ALTER TABLE `tbljopayment`
  ADD CONSTRAINT `tbljopayment_stradditionalchargefk_foreign` FOREIGN KEY (`strAdditionalChargeFK`) REFERENCES `tbljoaddcharge` (`strAdditionalChargeID`),
  ADD CONSTRAINT `tbljopayment_strreceivedbyemployeenamefk_foreign` FOREIGN KEY (`strReceivedByEmployeeNameFK`) REFERENCES `tblemployee` (`strEmployeeID`),
  ADD CONSTRAINT `tbljopayment_strtransacalterfk_foreign` FOREIGN KEY (`strTransacAlterFk`) REFERENCES `tblnonshopalteration` (`strNonShopAlterID`),
  ADD CONSTRAINT `tbljopayment_strtransactionfk_foreign` FOREIGN KEY (`strTransactionFK`) REFERENCES `tbljoborder` (`strJobOrderID`);

--
-- Constraints for table `tbljospecific`
--
ALTER TABLE `tbljospecific`
  ADD CONSTRAINT `tbljospecific_stremployeenamefk_foreign` FOREIGN KEY (`strEmployeeNameFK`) REFERENCES `tblemployee` (`strEmployeeID`),
  ADD CONSTRAINT `tbljospecific_strjoborderfk_foreign` FOREIGN KEY (`strJobOrderFK`) REFERENCES `tbljoborder` (`strJobOrderID`),
  ADD CONSTRAINT `tbljospecific_strjofabricfk_foreign` FOREIGN KEY (`strJOFabricFK`) REFERENCES `tblfabric` (`strFabricID`),
  ADD CONSTRAINT `tbljospecific_strjosegmentfk_foreign` FOREIGN KEY (`strJOSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`);

--
-- Constraints for table `tbljospecificaccessory`
--
ALTER TABLE `tbljospecificaccessory`
  ADD CONSTRAINT `tbljospecificaccessory_strjoborderspecificfk_foreign` FOREIGN KEY (`strJobOrderSpecificFK`) REFERENCES `tbljospecific` (`strJOSpecificID`);

--
-- Constraints for table `tbljospecificmaterial`
--
ALTER TABLE `tbljospecificmaterial`
  ADD CONSTRAINT `tbljospecificmaterial_strjospecificfk_foreign` FOREIGN KEY (`strJOSpecificFK`) REFERENCES `tbljospecific` (`strJOSpecificID`);

--
-- Constraints for table `tbljospecificsegmentpattern`
--
ALTER TABLE `tbljospecificsegmentpattern`
  ADD CONSTRAINT `tbljospecificsegmentpattern_strsegmentpatternfk_foreign` FOREIGN KEY (`strSegmentPatternFK`) REFERENCES `tblsegmentpattern` (`strSegPatternID`),
  ADD CONSTRAINT `tbljospecificsegmentpattern_strjoborderspecificfk_foreign` FOREIGN KEY (`strJobOrderSpecificFK`) REFERENCES `tbljospecific` (`strJOSpecificID`);

--
-- Constraints for table `tbljo_measureprofile`
--
ALTER TABLE `tbljo_measureprofile`
  ADD CONSTRAINT `tbljo_measureprofile_strmeasprofcustcompanyfk_foreign` FOREIGN KEY (`strMeasProfCustCompanyFK`) REFERENCES `tblcustcompany` (`strCompanyID`),
  ADD CONSTRAINT `tbljo_measureprofile_strmeasprofcustindivfk_foreign` FOREIGN KEY (`strMeasProfCustIndivFK`) REFERENCES `tblcustindividual` (`strIndivID`);

--
-- Constraints for table `tblmeasurementdetail`
--
ALTER TABLE `tblmeasurementdetail`
  ADD CONSTRAINT `tblmeasurementdetail_strmeascategoryfk_foreign` FOREIGN KEY (`strMeasCategoryFK`) REFERENCES `tblmeasurementcategory` (`strMeasurementCategoryID`),
  ADD CONSTRAINT `tblmeasurementdetail_strmeasdetsegmentfk_foreign` FOREIGN KEY (`strMeasDetSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`);

--
-- Constraints for table `tblnonshopalteration`
--
ALTER TABLE `tblnonshopalteration`
  ADD CONSTRAINT `tblnonshopalteration_strcustcompfk_foreign` FOREIGN KEY (`strCustCompFK`) REFERENCES `tblcustcompany` (`strCompanyID`),
  ADD CONSTRAINT `tblnonshopalteration_strcustindfk_foreign` FOREIGN KEY (`strCustIndFK`) REFERENCES `tblcustindividual` (`strIndivID`);

--
-- Constraints for table `tblnonshopalterspecific`
--
ALTER TABLE `tblnonshopalterspecific`
  ADD CONSTRAINT `tblnonshopalterspecific_strgarmentsegmentfk_foreign` FOREIGN KEY (`strGarmentSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`),
  ADD CONSTRAINT `tblnonshopalterspecific_strnonshopalterfk_foreign` FOREIGN KEY (`strNonShopAlterFK`) REFERENCES `tblnonshopalteration` (`strNonShopAlterID`);

--
-- Constraints for table `tblpackages`
--
ALTER TABLE `tblpackages`
  ADD CONSTRAINT `tblpackages_strpackageseg1fk_foreign` FOREIGN KEY (`strPackageSeg1FK`) REFERENCES `tblsegment` (`strSegmentID`),
  ADD CONSTRAINT `tblpackages_strpackageseg2fk_foreign` FOREIGN KEY (`strPackageSeg2FK`) REFERENCES `tblsegment` (`strSegmentID`),
  ADD CONSTRAINT `tblpackages_strpackageseg3fk_foreign` FOREIGN KEY (`strPackageSeg3FK`) REFERENCES `tblsegment` (`strSegmentID`),
  ADD CONSTRAINT `tblpackages_strpackageseg4fk_foreign` FOREIGN KEY (`strPackageSeg4FK`) REFERENCES `tblsegment` (`strSegmentID`),
  ADD CONSTRAINT `tblpackages_strpackageseg5fk_foreign` FOREIGN KEY (`strPackageSeg5FK`) REFERENCES `tblsegment` (`strSegmentID`);

--
-- Constraints for table `tblsegment`
--
ALTER TABLE `tblsegment`
  ADD CONSTRAINT `tblsegment_strsegcategoryfk_foreign` FOREIGN KEY (`strSegCategoryFK`) REFERENCES `tblgarmentcategory` (`strGarmentCategoryID`);

--
-- Constraints for table `tblsegmentpattern`
--
ALTER TABLE `tblsegmentpattern`
  ADD CONSTRAINT `tblsegmentpattern_strsegpstylecategoryfk_foreign` FOREIGN KEY (`strSegPStyleCategoryFK`) REFERENCES `tblsegmentstylecategory` (`strSegStyleCatID`);

--
-- Constraints for table `tblsegmentstylecategory`
--
ALTER TABLE `tblsegmentstylecategory`
  ADD CONSTRAINT `tblsegmentstylecategory_strsegmentfk_foreign` FOREIGN KEY (`strSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`);

--
-- Constraints for table `tblstandardsizedetail`
--
ALTER TABLE `tblstandardsizedetail`
  ADD CONSTRAINT `tblstandardsizedetail_strstansizecategoryfk_foreign` FOREIGN KEY (`strStanSizeCategoryFK`) REFERENCES `tblstandardsizecategory` (`strStandardSizeCategoryID`),
  ADD CONSTRAINT `tblstandardsizedetail_strstansizemeascatfk_foreign` FOREIGN KEY (`strStanSizeMeasCatFK`) REFERENCES `tblmeasurementcategory` (`strMeasurementCategoryID`),
  ADD CONSTRAINT `tblstandardsizedetail_strstansizesegmentfk_foreign` FOREIGN KEY (`strStanSizeSegmentFK`) REFERENCES `tblsegment` (`strSegmentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
