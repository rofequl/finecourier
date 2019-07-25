-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 06:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finecourier`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isoCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numericCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geonamesCode` int(11) DEFAULT NULL,
  `fipsCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonePrefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileFormat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlineFormat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trunkPrefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `continent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `code3`, `isoCode`, `numericCode`, `geonamesCode`, `fipsCode`, `area`, `currency`, `phonePrefix`, `mobileFormat`, `landlineFormat`, `trunkPrefix`, `population`, `continent`, `language`, `name`) VALUES
(250, 'AF', 'AFG', 'AF', '004', 1149361, 'AF', 647500, 'AFN', '93', NULL, NULL, NULL, 29121286, 'AS', 'fa', 'Afghanistan'),
(251, 'AX', 'ALA', 'AX', '248', 661882, '0', 1580, 'EUR', '35818', NULL, NULL, NULL, 26711, 'EU', 'sv', 'Åland Islands'),
(252, 'AL', 'ALB', 'AL', '008', 783754, 'AL', 28748, 'ALL', '355', NULL, NULL, NULL, 2986952, 'EU', 'sq', 'Albania'),
(253, 'DZ', 'DZA', 'DZ', '012', 2589581, 'AG', 2381740, 'DZD', '213', NULL, NULL, NULL, 34586184, 'AF', 'ar', 'Algeria'),
(254, 'AS', 'ASM', 'AS', '016', 5880801, 'AQ', 199, 'USD', '1684', NULL, NULL, NULL, 57881, 'OC', 'en', 'American Samoa'),
(255, 'AD', 'AND', 'AD', '020', 3041565, 'AN', 468, 'EUR', '376', NULL, NULL, NULL, 84000, 'EU', 'ca', 'Andorra'),
(256, 'AO', 'AGO', 'AO', '024', 3351879, 'AO', 1246700, 'AOA', '244', NULL, NULL, NULL, 13068161, 'AF', 'pt', 'Angola'),
(257, 'AI', 'AIA', 'AI', '660', 3573511, 'AV', 102, 'XCD', '1264', NULL, NULL, NULL, 13254, 'NA', 'en', 'Anguilla'),
(258, 'AQ', 'ATA', 'AQ', '010', 6697173, 'AY', 14000000, NULL, NULL, NULL, NULL, NULL, NULL, 'AN', '', 'Antarctica'),
(259, 'AG', 'ATG', 'AG', '028', 3576396, 'AC', 443, 'XCD', '1268', NULL, NULL, NULL, 86754, 'NA', 'en', 'Antigua and Barbuda'),
(260, 'AR', 'ARG', 'AR', '032', 3865483, 'AR', 2766890, 'ARS', '54', NULL, NULL, NULL, 41343201, 'SA', 'es', 'Argentina'),
(261, 'AM', 'ARM', 'AM', '051', 174982, 'AM', 29800, 'AMD', '374', NULL, NULL, NULL, 2968000, 'AS', 'hy', 'Armenia'),
(262, 'AW', 'ABW', 'AW', '533', 3577279, 'AA', 193, 'AWG', '297', NULL, NULL, NULL, 71566, 'NA', 'nl', 'Aruba'),
(263, 'AU', 'AUS', 'AU', '036', 2077456, 'AS', 7686850, 'AUD', '61', '4\\d{8}', NULL, '0', 21515754, 'OC', 'en', 'Australia'),
(264, 'AT', 'AUT', 'AT', '040', 2782113, 'AU', 83858, 'EUR', '43', NULL, NULL, NULL, 8205000, 'EU', 'de', 'Austria'),
(265, 'AZ', 'AZE', 'AZ', '031', 587116, 'AJ', 86600, 'AZN', '994', NULL, NULL, NULL, 8303512, 'AS', 'az', 'Azerbaijan'),
(266, 'BS', 'BHS', 'BS', '044', 3572887, 'BF', 13940, 'BSD', '1242', NULL, NULL, NULL, 301790, 'NA', 'en', 'Bahamas'),
(267, 'BH', 'BHR', 'BH', '048', 290291, 'BA', 665, 'BHD', '973', NULL, NULL, NULL, 738004, 'AS', 'ar', 'Bahrain'),
(268, 'BD', 'BGD', 'BD', '050', 1210997, '', 144000, 'BDT', '880', NULL, NULL, NULL, 156118464, 'AS', 'bn', 'Bangladesh'),
(269, 'BB', 'BRB', 'BB', '052', 3374084, 'BG', 431, 'BBD', '1246', NULL, NULL, NULL, 285653, 'NA', 'en', 'Barbados'),
(270, 'BY', 'BLR', 'BY', '112', 630336, 'BO', 207600, 'BYR', '375', NULL, NULL, NULL, 9685000, 'EU', 'be', 'Belarus'),
(271, 'BE', 'BEL', 'BE', '056', 2802361, 'BE', 30510, 'EUR', '32', NULL, NULL, NULL, 10403000, 'EU', 'nl', 'Belgium'),
(272, 'BZ', 'BLZ', 'BZ', '084', 3582678, 'BH', 22966, 'BZD', '501', NULL, NULL, NULL, 314522, 'NA', 'en', 'Belize'),
(273, 'BJ', 'BEN', 'BJ', '204', 2395170, 'BN', 112620, 'XOF', '229', NULL, NULL, NULL, 9056010, 'AF', 'fr', 'Benin'),
(274, 'BM', 'BMU', 'BM', '060', 3573345, 'BD', 53, 'BMD', '1441', NULL, NULL, NULL, 65365, 'NA', 'en', 'Bermuda'),
(275, 'BT', 'BTN', 'BT', '064', 1252634, 'BT', 47000, 'BTN', '975', NULL, NULL, NULL, 699847, 'AS', 'dz', 'Bhutan'),
(276, 'BO', 'BOL', 'BO', '068', 3923057, 'BL', 1098580, 'BOB', '591', NULL, NULL, NULL, 9947418, 'SA', 'es', 'Bolivia'),
(277, 'BQ', 'BES', 'BQ', '535', 7626844, '0', 328, 'USD', '599', NULL, NULL, NULL, 18012, 'NA', 'nl', 'Bonaire, Sint Eustatius and Saba'),
(278, 'BA', 'BIH', 'BA', '070', 3277605, 'BK', 51129, 'BAM', '387', NULL, NULL, NULL, 4590000, 'EU', 'bs', 'Bosnia and Herzegovina'),
(279, 'BW', 'BWA', 'BW', '072', 933860, 'BC', 600370, 'BWP', '267', NULL, NULL, NULL, 2029307, 'AF', 'en', 'Botswana'),
(280, 'BV', 'BVT', 'BV', '074', 3371123, 'BV', 49, 'NOK', NULL, NULL, NULL, NULL, NULL, 'AN', '', 'Bouvet Island'),
(281, 'BR', 'BRA', 'BR', '076', 3469034, 'BR', 8511965, 'BRL', '55', NULL, NULL, NULL, 201103330, 'SA', 'pt', 'Brazil'),
(282, 'IO', 'IOT', 'IO', '086', 1282588, 'IO', 60, 'USD', '246', NULL, NULL, NULL, 4000, 'AS', 'en', 'British Indian Ocean Territory'),
(283, 'BN', 'BRN', 'BN', '096', 1820814, 'BX', 5770, 'BND', '673', NULL, NULL, NULL, 395027, 'AS', 'ms', 'Brunei'),
(284, 'BG', 'BGR', 'BG', '100', 732800, 'BU', 110910, 'BGN', '359', NULL, NULL, NULL, 7148785, 'EU', 'bg', 'Bulgaria'),
(285, 'BF', 'BFA', 'BF', '854', 2361809, 'UV', 274200, 'XOF', '226', NULL, NULL, NULL, 16241811, 'AF', 'fr', 'Burkina Faso'),
(286, 'BI', 'BDI', 'BI', '108', 433561, 'BY', 27830, 'BIF', '257', NULL, NULL, NULL, 9863117, 'AF', 'fr', 'Burundi'),
(287, 'CV', 'CPV', 'CV', '132', 3374766, 'CV', 4033, 'CVE', '238', NULL, NULL, NULL, 508659, 'AF', 'pt', 'Cabo Verde'),
(288, 'KH', 'KHM', 'KH', '116', 1831722, 'CB', 181040, 'KHR', '855', NULL, NULL, NULL, 14453680, 'AS', 'km', 'Cambodia'),
(289, 'CM', 'CMR', 'CM', '120', 2233387, 'CM', 475440, 'XAF', '237', NULL, NULL, NULL, 19294149, 'AF', 'en', 'Cameroon'),
(290, 'CA', 'CAN', 'CA', '124', 6251999, 'CA', 9984670, 'CAD', '1', NULL, NULL, NULL, 33679000, 'NA', 'en', 'Canada'),
(291, 'KY', 'CYM', 'KY', '136', 3580718, 'CJ', 262, 'KYD', '1345', NULL, NULL, NULL, 44270, 'NA', 'en', 'Cayman Islands'),
(292, 'CF', 'CAF', 'CF', '140', 239880, 'CT', 622984, 'XAF', '236', NULL, NULL, NULL, 4844927, 'AF', 'fr', 'Central African Republic'),
(293, 'TD', 'TCD', 'TD', '148', 2434508, 'CD', 1284000, 'XAF', '235', NULL, NULL, NULL, 10543464, 'AF', 'fr', 'Chad'),
(294, 'CL', 'CHL', 'CL', '152', 3895114, 'CI', 756950, 'CLP', '56', NULL, NULL, NULL, 16746491, 'SA', 'es', 'Chile'),
(295, 'CN', 'CHN', 'CN', '156', 1814991, 'CH', 9596960, 'CNY', '86', NULL, NULL, NULL, 1330044000, 'AS', 'zh', 'China'),
(296, 'CX', 'CXR', 'CX', '162', 2078138, 'KT', 135, 'AUD', '61', NULL, NULL, NULL, 1500, 'AS', 'en', 'Christmas Island'),
(297, 'CC', 'CCK', 'CC', '166', 1547376, 'CK', 14, 'AUD', '61', NULL, NULL, NULL, 628, 'AS', 'ms', 'Cocos (Keeling) Islands'),
(298, 'CO', 'COL', 'CO', '170', 3686110, 'CO', 1138910, 'COP', '57', NULL, NULL, NULL, 47790000, 'SA', 'es', 'Colombia'),
(299, 'KM', 'COM', 'KM', '174', 921929, 'CN', 2170, 'KMF', '269', NULL, NULL, NULL, 773407, 'AF', 'ar', 'Comoros'),
(300, 'CG', 'COG', 'CG', '178', 2260494, 'CF', 342000, 'XAF', '242', NULL, NULL, NULL, 3039126, 'AF', 'fr', 'Congo-Brazzaville'),
(301, 'CD', 'COD', 'CD', '180', 203312, 'CG', 2345410, 'CDF', '243', NULL, NULL, NULL, 70916439, 'AF', 'fr', 'Congo'),
(302, 'CK', 'COK', 'CK', '184', 1899402, 'CW', 240, 'NZD', '682', NULL, NULL, NULL, 21388, 'OC', 'en', 'Cook Islands'),
(303, 'CR', 'CRI', 'CR', '188', 3624060, 'CS', 51100, 'CRC', '506', NULL, NULL, NULL, 4516220, 'NA', 'es', 'Costa Rica'),
(304, 'CI', 'CIV', 'CI', '384', 2287781, 'IV', 322460, 'XOF', '225', NULL, NULL, NULL, 21058798, 'AF', 'fr', 'Côte d\'Ivoire'),
(305, 'HR', 'HRV', 'HR', '191', 3202326, 'HR', 56542, 'HRK', '385', NULL, NULL, NULL, 4491000, 'EU', 'hr', 'Croatia'),
(306, 'CU', 'CUB', 'CU', '192', 3562981, 'CU', 110860, 'CUP', '53', NULL, NULL, NULL, 11423000, 'NA', 'es', 'Cuba'),
(307, 'CW', 'CUW', 'CW', '531', 7626836, '0', 444, 'ANG', '599', NULL, NULL, NULL, 141766, 'NA', 'nl', 'Curaçao'),
(308, 'CY', 'CYP', 'CY', '196', 146669, 'CY', 9250, 'EUR', '357', NULL, NULL, NULL, 1102677, 'EU', 'el', 'Cyprus'),
(309, 'CZ', 'CZE', 'CZ', '203', 3077311, 'EZ', 78866, 'CZK', '420', NULL, NULL, NULL, 10476000, 'EU', 'cs', 'Czechia'),
(310, 'DK', 'DNK', 'DK', '208', 2623032, 'DA', 43094, 'DKK', '45', NULL, NULL, NULL, 5484000, 'EU', 'da', 'Denmark'),
(311, 'DJ', 'DJI', 'DJ', '262', 223816, 'DJ', 23000, 'DJF', '253', NULL, NULL, NULL, 740528, 'AF', 'fr', 'Djibouti'),
(312, 'DM', 'DMA', 'DM', '212', 3575830, 'DO', 754, 'XCD', '1767', NULL, NULL, NULL, 72813, 'NA', 'en', 'Dominica'),
(313, 'DO', 'DOM', 'DO', '214', 3508796, 'DR', 48730, 'DOP', '1809 and 1829', NULL, NULL, NULL, 9823821, 'NA', 'es', 'Dominican Republic'),
(314, 'EC', 'ECU', 'EC', '218', 3658394, 'EC', 283560, 'USD', '593', NULL, NULL, NULL, 14790608, 'SA', 'es', 'Ecuador'),
(315, 'EG', 'EGY', 'EG', '818', 357994, 'EG', 1001450, 'EGP', '20', NULL, NULL, NULL, 80471869, 'AF', 'ar', 'Egypt'),
(316, 'SV', 'SLV', 'SV', '222', 3585968, 'ES', 21040, 'USD', '503', NULL, NULL, NULL, 6052064, 'NA', 'es', 'El Salvador'),
(317, 'GQ', 'GNQ', 'GQ', '226', 2309096, 'EK', 28051, 'XAF', '240', NULL, NULL, NULL, 1014999, 'AF', 'es', 'Equatorial Guinea'),
(318, 'ER', 'ERI', 'ER', '232', 338010, 'ER', 121320, 'ERN', '291', NULL, NULL, NULL, 5792984, 'AF', 'aa', 'Eritrea'),
(319, 'EE', 'EST', 'EE', '233', 453733, 'EN', 45226, 'EUR', '372', NULL, NULL, NULL, 1291170, 'EU', 'et', 'Estonia'),
(320, 'ET', 'ETH', 'ET', '231', 337996, 'ET', 1127127, 'ETB', '251', NULL, NULL, NULL, 88013491, 'AF', 'am', 'Ethiopia'),
(321, 'FK', 'FLK', 'FK', '238', 3474414, 'FK', 12173, 'FKP', '500', NULL, NULL, NULL, 2638, 'SA', 'en', 'Falkland Islands'),
(322, 'FO', 'FRO', 'FO', '234', 2622320, 'FO', 1399, 'DKK', '298', NULL, NULL, NULL, 48228, 'EU', 'fo', 'Faroe Islands'),
(323, 'FJ', 'FJI', 'FJ', '242', 2205218, 'FJ', 18270, 'FJD', '679', NULL, NULL, NULL, 875983, 'OC', 'en', 'Fiji'),
(324, 'FI', 'FIN', 'FI', '246', 660013, 'FI', 337030, 'EUR', '358', NULL, NULL, NULL, 5244000, 'EU', 'fi', 'Finland'),
(325, 'FR', 'FRA', 'FR', '250', 3017382, 'FR', 547030, 'EUR', '33', NULL, NULL, NULL, 64768389, 'EU', 'fr', 'France'),
(326, 'GF', 'GUF', 'GF', '254', 3381670, 'FG', 91000, 'EUR', '594', NULL, NULL, NULL, 195506, 'SA', 'fr', 'French Guiana'),
(327, 'PF', 'PYF', 'PF', '258', 4030656, 'FP', 4167, 'XPF', '689', NULL, NULL, NULL, 270485, 'OC', 'fr', 'French Polynesia'),
(328, 'TF', 'ATF', 'TF', '260', 1546748, 'FS', 7829, 'EUR', NULL, NULL, NULL, NULL, 140, 'AN', 'fr', 'French Southern Territories'),
(329, 'GA', 'GAB', 'GA', '266', 2400553, 'GB', 267667, 'XAF', '241', NULL, NULL, NULL, 1545255, 'AF', 'fr', 'Gabon'),
(330, 'GM', 'GMB', 'GM', '270', 2413451, 'GA', 11300, 'GMD', '220', NULL, NULL, NULL, 1593256, 'AF', 'en', 'Gambia'),
(331, 'GE', 'GEO', 'GE', '268', 614540, 'GG', 69700, 'GEL', '995', NULL, NULL, NULL, 4630000, 'AS', 'ka', 'Georgia'),
(332, 'DE', 'DEU', 'DE', '276', 2921044, 'GM', 357021, 'EUR', '49', NULL, NULL, NULL, 81802257, 'EU', 'de', 'Germany'),
(333, 'GH', 'GHA', 'GH', '288', 2300660, 'GH', 239460, 'GHS', '233', NULL, NULL, NULL, 24339838, 'AF', 'en', 'Ghana'),
(334, 'GI', 'GIB', 'GI', '292', 2411586, 'GI', 6, 'GIP', '350', NULL, NULL, NULL, 27884, 'EU', 'en', 'Gibraltar'),
(335, 'GR', 'GRC', 'GR', '300', 390903, 'GR', 131940, 'EUR', '30', NULL, NULL, NULL, 11000000, 'EU', 'el', 'Greece'),
(336, 'GL', 'GRL', 'GL', '304', 3425505, 'GL', 2166086, 'DKK', '299', NULL, NULL, NULL, 56375, 'NA', 'kl', 'Greenland'),
(337, 'GD', 'GRD', 'GD', '308', 3580239, 'GJ', 344, 'XCD', '1473', NULL, NULL, NULL, 107818, 'NA', 'en', 'Grenada'),
(338, 'GP', 'GLP', 'GP', '312', 3579143, 'GP', 1780, 'EUR', '590', NULL, NULL, NULL, 443000, 'NA', 'fr', 'Guadeloupe'),
(339, 'GU', 'GUM', 'GU', '316', 4043988, 'GQ', 549, 'USD', '1671', NULL, NULL, NULL, 159358, 'OC', 'en', 'Guam'),
(340, 'GT', 'GTM', 'GT', '320', 3595528, 'GT', 108890, 'GTQ', '502', NULL, NULL, NULL, 13550440, 'NA', 'es', 'Guatemala'),
(341, 'GG', 'GGY', 'GG', '831', 3042362, 'GK', 78, 'GBP', '441481', NULL, NULL, NULL, 65228, 'EU', 'en', 'Guernsey'),
(342, 'GN', 'GIN', 'GN', '324', 2420477, 'GV', 245857, 'GNF', '224', NULL, NULL, NULL, 10324025, 'AF', 'fr', 'Guinea'),
(343, 'GW', 'GNB', 'GW', '624', 2372248, 'PU', 36120, 'XOF', '245', NULL, NULL, NULL, 1565126, 'AF', 'pt', 'Guinea-Bissau'),
(344, 'GY', 'GUY', 'GY', '328', 3378535, 'GY', 214970, 'GYD', '592', NULL, NULL, NULL, 748486, 'SA', 'en', 'Guyana'),
(345, 'HT', 'HTI', 'HT', '332', 3723988, 'HA', 27750, 'HTG', '509', NULL, NULL, NULL, 9648924, 'NA', 'ht', 'Haiti'),
(346, 'HM', 'HMD', 'HM', '334', 1547314, 'HM', 412, 'AUD', ' ', NULL, NULL, NULL, NULL, 'AN', '', 'Heard Island and McDonald Islands'),
(347, 'VA', 'VAT', 'VA', '336', 3164670, 'VT', 0, 'EUR', '379', NULL, NULL, NULL, 921, 'EU', 'la', 'Vatican'),
(348, 'HN', 'HND', 'HN', '340', 3608932, 'HO', 112090, 'HNL', '504', NULL, NULL, NULL, 7989415, 'NA', 'es', 'Honduras'),
(349, 'HK', 'HKG', 'HK', '344', 1819730, 'HK', 1092, 'HKD', '852', NULL, NULL, NULL, 6898686, 'AS', 'zh', 'Hong Kong'),
(350, 'HU', 'HUN', 'HU', '348', 719819, 'HU', 93030, 'HUF', '36', NULL, NULL, NULL, 9982000, 'EU', 'hu', 'Hungary'),
(351, 'IS', 'ISL', 'IS', '352', 2629691, 'IC', 103000, 'ISK', '354', NULL, NULL, NULL, 308910, 'EU', 'is', 'Iceland'),
(352, 'IN', 'IND', 'IN', '356', 1269750, 'IN', 3287590, 'INR', '91', NULL, NULL, NULL, 1173108018, 'AS', 'en', 'India'),
(353, 'ID', 'IDN', 'ID', '360', 1643084, 'ID', 1919440, 'IDR', '62', NULL, NULL, NULL, 242968342, 'AS', 'id', 'Indonesia'),
(354, 'IR', 'IRN', 'IR', '364', 130758, 'IR', 1648000, 'IRR', '98', NULL, NULL, NULL, 76923300, 'AS', 'fa', 'Islamic Republic of Iran'),
(355, 'IQ', 'IRQ', 'IQ', '368', 99237, 'IZ', 437072, 'IQD', '964', NULL, NULL, NULL, 29671605, 'AS', 'ar', 'Iraq'),
(356, 'IE', 'IRL', 'IE', '372', 2963597, 'EI', 70280, 'EUR', '353', NULL, NULL, NULL, 4622917, 'EU', 'en', 'Ireland'),
(357, 'IM', 'IMN', 'IM', '833', 3042225, '0', 572, 'GBP', '441624', NULL, NULL, NULL, 75049, 'EU', 'en', 'Isle of Man'),
(358, 'IL', 'ISR', 'IL', '376', 294640, 'IS', 20770, 'ILS', '972', NULL, NULL, NULL, 7353985, 'AS', 'he', 'Israel'),
(359, 'IT', 'ITA', 'IT', '380', 3175395, 'IT', 301230, 'EUR', '39', NULL, NULL, NULL, 60340328, 'EU', 'it', 'Italy'),
(360, 'JM', 'JAM', 'JM', '388', 3489940, 'JM', 10991, 'JMD', '1876', NULL, NULL, NULL, 2847232, 'NA', 'en', 'Jamaica'),
(361, 'JP', 'JPN', 'JP', '392', 1861060, 'JA', 377835, 'JPY', '81', NULL, NULL, NULL, 127288000, 'AS', 'ja', 'Japan'),
(362, 'JE', 'JEY', 'JE', '832', 3042142, 'JE', 116, 'GBP', '441534', NULL, NULL, NULL, 90812, 'EU', 'en', 'Jersey'),
(363, 'JO', 'JOR', 'JO', '400', 248816, 'JO', 92300, 'JOD', '962', NULL, NULL, NULL, 6407085, 'AS', 'ar', 'Jordan'),
(364, 'KZ', 'KAZ', 'KZ', '398', 1522867, 'KZ', 2717300, 'KZT', '7', NULL, NULL, NULL, 15340000, 'AS', 'kk', 'Kazakhstan'),
(365, 'KE', 'KEN', 'KE', '404', 192950, 'KE', 582650, 'KES', '254', NULL, NULL, NULL, 40046566, 'AF', 'en', 'Kenya'),
(366, 'KI', 'KIR', 'KI', '296', 4030945, 'KR', 811, 'AUD', '686', NULL, NULL, NULL, 92533, 'OC', 'en', 'Kiribati'),
(367, 'KP', 'PRK', 'KP', '408', 1873107, 'KN', 120540, 'KPW', '850', NULL, NULL, NULL, 22912177, 'AS', 'ko', 'Democratic People\'s Republic of Korea'),
(368, 'KR', 'KOR', 'KR', '410', 1835841, 'KS', 98480, 'KRW', '82', NULL, NULL, NULL, 48422644, 'AS', 'ko', 'Republic of Korea'),
(369, 'KW', 'KWT', 'KW', '414', 285570, 'KU', 17820, 'KWD', '965', NULL, NULL, NULL, 2789132, 'AS', 'ar', 'Kuwait'),
(370, 'KG', 'KGZ', 'KG', '417', 1527747, 'KG', 198500, 'KGS', '996', NULL, NULL, NULL, 5776500, 'AS', 'ky', 'Kyrgyzstan'),
(371, 'LA', 'LAO', 'LA', '418', 1655842, 'LA', 236800, 'LAK', '856', NULL, NULL, NULL, 6368162, 'AS', 'lo', 'Lao People\'s Democratic Republic'),
(372, 'LV', 'LVA', 'LV', '428', 458258, 'LG', 64589, 'EUR', '371', NULL, NULL, NULL, 2217969, 'EU', 'lv', 'Latvia'),
(373, 'LB', 'LBN', 'LB', '422', 272103, 'LE', 10400, 'LBP', '961', NULL, NULL, NULL, 4125247, 'AS', 'ar', 'Lebanon'),
(374, 'LS', 'LSO', 'LS', '426', 932692, 'LT', 30355, 'LSL', '266', NULL, NULL, NULL, 1919552, 'AF', 'en', 'Lesotho'),
(375, 'LR', 'LBR', 'LR', '430', 2275384, 'LI', 111370, 'LRD', '231', NULL, NULL, NULL, 3685076, 'AF', 'en', 'Liberia'),
(376, 'LY', 'LBY', 'LY', '434', 2215636, 'LY', 1759540, 'LYD', '218', NULL, NULL, NULL, 6461454, 'AF', 'ar', 'Libya'),
(377, 'LI', 'LIE', 'LI', '438', 3042058, 'LS', 160, 'CHF', '423', NULL, NULL, NULL, 35000, 'EU', 'de', 'Liechtenstein'),
(378, 'LT', 'LTU', 'LT', '440', 597427, 'LH', 65200, 'EUR', '370', NULL, NULL, NULL, 2944459, 'EU', 'lt', 'Lithuania'),
(379, 'LU', 'LUX', 'LU', '442', 2960313, 'LU', 2586, 'EUR', '352', NULL, NULL, NULL, 497538, 'EU', 'lb', 'Luxembourg'),
(380, 'MO', 'MAC', 'MO', '446', 1821275, 'MC', 254, 'MOP', '853', NULL, NULL, NULL, 449198, 'AS', 'zh', 'Macao'),
(381, 'MK', 'MKD', 'MK', '807', 718075, 'MK', 25333, 'MKD', '389', NULL, NULL, NULL, 2062294, 'EU', 'mk', 'Macedonia'),
(382, 'MG', 'MDG', 'MG', '450', 1062947, 'MA', 587040, 'MGA', '261', NULL, NULL, NULL, 21281844, 'AF', 'fr', 'Madagascar'),
(383, 'MW', 'MWI', 'MW', '454', 927384, 'MI', 118480, 'MWK', '265', NULL, NULL, NULL, 15447500, 'AF', 'ny', 'Malawi'),
(384, 'MY', 'MYS', 'MY', '458', 1733045, 'MY', 329750, 'MYR', '60', NULL, NULL, NULL, 28274729, 'AS', 'ms', 'Malaysia'),
(385, 'MV', 'MDV', 'MV', '462', 1282028, 'MV', 300, 'MVR', '960', NULL, NULL, NULL, 395650, 'AS', 'dv', 'Maldives'),
(386, 'ML', 'MLI', 'ML', '466', 2453866, 'ML', 1240000, 'XOF', '223', NULL, NULL, NULL, 13796354, 'AF', 'fr', 'Mali'),
(387, 'MT', 'MLT', 'MT', '470', 2562770, 'MT', 316, 'EUR', '356', NULL, NULL, NULL, 403000, 'EU', 'mt', 'Malta'),
(388, 'MH', 'MHL', 'MH', '584', 2080185, 'RM', 181, 'USD', '692', NULL, NULL, NULL, 65859, 'OC', 'mh', 'Marshall Islands'),
(389, 'MQ', 'MTQ', 'MQ', '474', 3570311, 'MB', 1100, 'EUR', '596', NULL, NULL, NULL, 432900, 'NA', 'fr', 'Martinique'),
(390, 'MR', 'MRT', 'MR', '478', 2378080, 'MR', 1030700, 'MRO', '222', NULL, NULL, NULL, 3205060, 'AF', 'ar', 'Mauritania'),
(391, 'MU', 'MUS', 'MU', '480', 934292, 'MP', 2040, 'MUR', '230', NULL, NULL, NULL, 1294104, 'AF', 'en', 'Mauritius'),
(392, 'YT', 'MYT', 'YT', '175', 1024031, 'MF', 374, 'EUR', '262', NULL, NULL, NULL, 159042, 'AF', 'fr', 'Mayotte'),
(393, 'MX', 'MEX', 'MX', '484', 3996063, 'MX', 1972550, 'MXN', '52', NULL, NULL, NULL, 112468855, 'NA', 'es', 'Mexico'),
(394, 'FM', 'FSM', 'FM', '583', 2081918, 'FM', 702, 'USD', '691', NULL, NULL, NULL, 107708, 'OC', 'en', 'Federated States of Micronesia'),
(395, 'MD', 'MDA', 'MD', '498', 617790, 'MD', 33843, 'MDL', '373', NULL, NULL, NULL, 4324000, 'EU', 'ro', 'Republic of Moldova'),
(396, 'MC', 'MCO', 'MC', '492', 2993457, 'MN', 1, 'EUR', '377', NULL, NULL, NULL, 32965, 'EU', 'fr', 'Monaco'),
(397, 'MN', 'MNG', 'MN', '496', 2029969, 'MG', 1565000, 'MNT', '976', NULL, NULL, NULL, 3086918, 'AS', 'mn', 'Mongolia'),
(398, 'ME', 'MNE', 'ME', '499', 3194884, 'MJ', 14026, 'EUR', '382', NULL, NULL, NULL, 666730, 'EU', 'sr', 'Montenegro'),
(399, 'MS', 'MSR', 'MS', '500', 3578097, 'MH', 102, 'XCD', '1664', NULL, NULL, NULL, 9341, 'NA', 'en', 'Montserrat'),
(400, 'MA', 'MAR', 'MA', '504', 2542007, 'MO', 446550, 'MAD', '212', NULL, NULL, NULL, 31627428, 'AF', 'ar', 'Morocco'),
(401, 'MZ', 'MOZ', 'MZ', '508', 1036973, 'MZ', 801590, 'MZN', '258', NULL, NULL, NULL, 22061451, 'AF', 'pt', 'Mozambique'),
(402, 'MM', 'MMR', 'MM', '104', 1327865, 'BM', 678500, 'MMK', '95', NULL, NULL, NULL, 53414374, 'AS', 'my', 'Myanmar'),
(403, 'NA', 'NAM', 'NA', '516', 3355338, 'WA', 825418, 'NAD', '264', NULL, NULL, NULL, 2128471, 'AF', 'en', 'Namibia'),
(404, 'NR', 'NRU', 'NR', '520', 2110425, 'NR', 21, 'AUD', '674', NULL, NULL, NULL, 10065, 'OC', 'na', 'Nauru'),
(405, 'NP', 'NPL', 'NP', '524', 1282988, 'NP', 140800, 'NPR', '977', NULL, NULL, NULL, 28951852, 'AS', 'ne', 'Nepal'),
(406, 'NL', 'NLD', 'NL', '528', 2750405, 'NL', 41526, 'EUR', '31', NULL, NULL, NULL, 16645000, 'EU', 'nl', 'Netherlands'),
(407, 'NC', 'NCL', 'NC', '540', 2139685, 'NC', 19060, 'XPF', '687', NULL, NULL, NULL, 216494, 'OC', 'fr', 'New Caledonia'),
(408, 'NZ', 'NZL', 'NZ', '554', 2186224, 'NZ', 268680, 'NZD', '64', '2\\d{7,9}', NULL, '0', 4252277, 'OC', 'en', 'New Zealand'),
(409, 'NI', 'NIC', 'NI', '558', 3617476, 'NU', 129494, 'NIO', '505', NULL, NULL, NULL, 5995928, 'NA', 'es', 'Nicaragua'),
(410, 'NE', 'NER', 'NE', '562', 2440476, 'NG', 1267000, 'XOF', '227', NULL, NULL, NULL, 15878271, 'AF', 'fr', 'Niger'),
(411, 'NG', 'NGA', 'NG', '566', 2328926, 'NI', 923768, 'NGN', '234', NULL, NULL, NULL, 154000000, 'AF', 'en', 'Nigeria'),
(412, 'NU', 'NIU', 'NU', '570', 4036232, 'NE', 260, 'NZD', '683', NULL, NULL, NULL, 2166, 'OC', 'ni', 'Niue'),
(413, 'NF', 'NFK', 'NF', '574', 2155115, 'NF', 34, 'AUD', '672', NULL, NULL, NULL, 1828, 'OC', 'en', 'Norfolk Island'),
(414, 'MP', 'MNP', 'MP', '580', 4041468, 'CQ', 477, 'USD', '1670', NULL, NULL, NULL, 53883, 'OC', 'fi', 'Northern Mariana Islands'),
(415, 'NO', 'NOR', 'NO', '578', 3144096, 'NO', 324220, 'NOK', '47', NULL, NULL, NULL, 5009150, 'EU', 'no', 'Norway'),
(416, 'OM', 'OMN', 'OM', '512', 286963, 'MU', 212460, 'OMR', '968', NULL, NULL, NULL, 2967717, 'AS', 'ar', 'Oman'),
(417, 'PK', 'PAK', 'PK', '586', 1168579, 'PK', 803940, 'PKR', '92', NULL, NULL, NULL, 184404791, 'AS', 'ur', 'Pakistan'),
(418, 'PW', 'PLW', 'PW', '585', 1559582, 'PS', 458, 'USD', '680', NULL, NULL, NULL, 19907, 'OC', 'pa', 'Palau'),
(419, 'PS', 'PSE', 'PS', '275', 6254930, '0', 5970, 'ILS', '970', NULL, NULL, NULL, 3800000, 'AS', 'ar', 'State of Palestine'),
(420, 'PA', 'PAN', 'PA', '591', 3703430, 'PM', 78200, 'PAB', '507', NULL, NULL, NULL, 3410676, 'NA', 'es', 'Panama'),
(421, 'PG', 'PNG', 'PG', '598', 2088628, 'PP', 462840, 'PGK', '675', NULL, NULL, NULL, 6064515, 'OC', 'en', 'Papua New Guinea'),
(422, 'PY', 'PRY', 'PY', '600', 3437598, 'PA', 406750, 'PYG', '595', NULL, NULL, NULL, 6375830, 'SA', 'es', 'Paraguay'),
(423, 'PE', 'PER', 'PE', '604', 3932488, 'PE', 1285220, 'PEN', '51', NULL, NULL, NULL, 29907003, 'SA', 'es', 'Peru'),
(424, 'PH', 'PHL', 'PH', '608', 1694008, 'RP', 300000, 'PHP', '63', NULL, NULL, NULL, 99900177, 'AS', 'tl', 'Philippines'),
(425, 'PN', 'PCN', 'PN', '612', 4030699, 'PC', 47, 'NZD', '870', NULL, NULL, NULL, 46, 'OC', 'en', 'Pitcairn'),
(426, 'PL', 'POL', 'PL', '616', 798544, 'PL', 312685, 'PLN', '48', NULL, NULL, NULL, 38500000, 'EU', 'pl', 'Poland'),
(427, 'PT', 'PRT', 'PT', '620', 2264397, 'PO', 92391, 'EUR', '351', NULL, NULL, NULL, 10676000, 'EU', 'pt', 'Portugal'),
(428, 'PR', 'PRI', 'PR', '630', 4566966, 'RQ', 9104, 'USD', '1787 and 1939', NULL, NULL, NULL, 3916632, 'NA', 'en', 'Puerto Rico'),
(429, 'QA', 'QAT', 'QA', '634', 289688, 'QA', 11437, 'QAR', '974', NULL, NULL, NULL, 840926, 'AS', 'ar', 'Qatar'),
(430, 'RE', 'REU', 'RE', '638', 935317, 'RE', 2517, 'EUR', '262', NULL, NULL, NULL, 776948, 'AF', 'fr', 'Reunion'),
(431, 'RO', 'ROU', 'RO', '642', 798549, 'RO', 237500, 'RON', '40', NULL, NULL, NULL, 21959278, 'EU', 'ro', 'Romania'),
(432, 'RU', 'RUS', 'RU', '643', 2017370, 'RS', 17100000, 'RUB', '7', NULL, NULL, NULL, 140702000, 'EU', 'ru', 'Russia'),
(433, 'RW', 'RWA', 'RW', '646', 49518, 'RW', 26338, 'RWF', '250', NULL, NULL, NULL, 11055976, 'AF', 'rw', 'Rwanda'),
(434, 'BL', 'BLM', 'BL', '652', 3578476, 'TB', 21, 'EUR', '590', NULL, NULL, NULL, 8450, 'NA', 'fr', 'Saint Barthelemy'),
(435, 'SH', 'SHN', 'SH', '654', 3370751, 'SH', 410, 'SHP', '290', NULL, NULL, NULL, 7460, 'AF', 'en', 'Saint Helena, Ascension and Tristan da Cunha'),
(436, 'KN', 'KNA', 'KN', '659', 3575174, 'SC', 261, 'XCD', '1869', NULL, NULL, NULL, 51134, 'NA', 'en', 'Saint Kitts and Nevis'),
(437, 'LC', 'LCA', 'LC', '662', 3576468, '', 616, 'XCD', '1758', NULL, NULL, NULL, 160922, 'NA', 'en', 'Saint Lucia'),
(438, 'MF', 'MAF', 'MF', '663', 3578421, 'RN', 53, 'EUR', '590', NULL, NULL, NULL, 35925, 'NA', 'fr', 'Saint Martin'),
(439, 'PM', 'SPM', 'PM', '666', 3424932, 'SB', 242, 'EUR', '508', NULL, NULL, NULL, 7012, 'NA', 'fr', 'Saint Pierre and Miquelon'),
(440, 'VC', 'VCT', 'VC', '670', 3577815, 'VC', 389, 'XCD', '1784', NULL, NULL, NULL, 104217, 'NA', 'en', 'Saint Vincent and the Grenadines'),
(441, 'WS', 'WSM', 'WS', '882', 4034894, 'WS', 2944, 'WST', '685', NULL, NULL, NULL, 192001, 'OC', 'sm', 'Samoa'),
(442, 'SM', 'SMR', 'SM', '674', 3168068, 'SM', 61, 'EUR', '378', NULL, NULL, NULL, 31477, 'EU', 'it', 'San Marino'),
(443, 'ST', 'STP', 'ST', '678', 2410758, 'TP', 1001, 'STD', '239', NULL, NULL, NULL, 175808, 'AF', 'pt', 'Sao Tome and Principe'),
(444, 'SA', 'SAU', 'SA', '682', 102358, 'SA', 1960582, 'SAR', '966', NULL, NULL, NULL, 25731776, 'AS', 'ar', 'Saudi Arabia'),
(445, 'SN', 'SEN', 'SN', '686', 2245662, 'SG', 196190, 'XOF', '221', NULL, NULL, NULL, 12323252, 'AF', 'fr', 'Senegal'),
(446, 'RS', 'SRB', 'RS', '688', 6290252, 'RI', 88361, 'RSD', '381', NULL, NULL, NULL, 7344847, 'EU', 'sr', 'Serbia'),
(447, 'SC', 'SYC', 'SC', '690', 241170, 'SE', 455, 'SCR', '248', NULL, NULL, NULL, 88340, 'AF', 'en', 'Seychelles'),
(448, 'SL', 'SLE', 'SL', '694', 2403846, 'SL', 71740, 'SLL', '232', NULL, NULL, NULL, 5245695, 'AF', 'en', 'Sierra Leone'),
(449, 'SG', 'SGP', 'SG', '702', 1880251, 'SN', 692, 'SGD', '65', NULL, NULL, NULL, 4701069, 'AS', 'cm', 'Singapore'),
(450, 'SX', 'SXM', 'SX', '534', 7609695, '0', 21, 'ANG', '599', NULL, NULL, NULL, 37429, 'NA', 'nl', 'Sint Maarten (Dutch part)'),
(451, 'SK', 'SVK', 'SK', '703', 3057568, 'LO', 48845, 'EUR', '421', NULL, NULL, NULL, 5455000, 'EU', 'sk', 'Slovakia'),
(452, 'SI', 'SVN', 'SI', '705', 3190538, 'SI', 20273, 'EUR', '386', NULL, NULL, NULL, 2007000, 'EU', 'sl', 'Slovenia'),
(453, 'SB', 'SLB', 'SB', '090', 2103350, 'BP', 28450, 'SBD', '677', NULL, NULL, NULL, 559198, 'OC', 'en', 'Solomon Islands'),
(454, 'SO', 'SOM', 'SO', '706', 51537, 'SO', 637657, 'SOS', '252', NULL, NULL, NULL, 10112453, 'AF', 'so', 'Somalia'),
(455, 'ZA', 'ZAF', 'ZA', '710', 953987, 'SF', 1219912, 'ZAR', '27', NULL, NULL, NULL, 49000000, 'AF', 'zu', 'South Africa'),
(456, 'GS', 'SGS', 'GS', '239', 3474415, 'SX', 3903, 'GBP', NULL, NULL, NULL, NULL, 30, 'AN', 'en', 'South Georgia and the South Sandwich Islands'),
(457, 'SS', 'SSD', 'SS', '728', 7909807, '0', 644329, 'SSP', '211', NULL, NULL, NULL, 8260490, 'AF', 'en', 'South Sudan'),
(458, 'ES', 'ESP', 'ES', '724', 2510769, 'SP', 504782, 'EUR', '34', NULL, NULL, NULL, 46505963, 'EU', 'es', 'Spain'),
(459, 'LK', 'LKA', 'LK', '144', 1227603, 'CE', 65610, 'LKR', '94', NULL, NULL, NULL, 21513990, 'AS', 'si', 'Sri Lanka'),
(460, 'SD', 'SDN', 'SD', '736', 366755, 'SU', 1861484, 'SDG', '249', NULL, NULL, NULL, 35000000, 'AF', 'ar', 'Sudan'),
(461, 'SR', 'SUR', 'SR', '740', 3382998, 'NS', 163270, 'SRD', '597', NULL, NULL, NULL, 492829, 'SA', 'nl', 'Suriname'),
(462, 'SJ', 'SJM', 'SJ', '744', 607072, 'SV', 62049, 'NOK', '47', NULL, NULL, NULL, 2550, 'EU', 'no', 'Svalbard and Jan Mayen'),
(463, 'SZ', 'SWZ', 'SZ', '748', 934841, 'WZ', 17363, 'SZL', '268', NULL, NULL, NULL, 1354051, 'AF', 'en', 'Swaziland'),
(464, 'SE', 'SWE', 'SE', '752', 2661886, 'SW', 449964, 'SEK', '46', NULL, NULL, NULL, 9828655, 'EU', 'sv', 'Sweden'),
(465, 'CH', 'CHE', 'CH', '756', 2658434, 'SZ', 41290, 'CHF', '41', NULL, NULL, NULL, 7581000, 'EU', 'de', 'Switzerland'),
(466, 'SY', 'SYR', 'SY', '760', 163843, 'SY', 185180, 'SYP', '963', NULL, NULL, NULL, 22198110, 'AS', 'ar', 'Syria'),
(467, 'TW', 'TWN', 'TW', '158', 1668284, 'TW', 35980, 'TWD', '886', NULL, NULL, NULL, 22894384, 'AS', 'zh', 'Taiwan'),
(468, 'TJ', 'TJK', 'TJ', '762', 1220409, 'TI', 143100, 'TJS', '992', NULL, NULL, NULL, 7487489, 'AS', 'tg', 'Tajikistan'),
(469, 'TZ', 'TZA', 'TZ', '834', 149590, 'TZ', 945087, 'TZS', '255', NULL, NULL, NULL, 41892895, 'AF', 'sw', 'United Republic of Tanzania'),
(470, 'TH', 'THA', 'TH', '764', 1605651, 'TH', 514000, 'THB', '66', NULL, NULL, NULL, 67089500, 'AS', 'th', 'Thailand'),
(471, 'TL', 'TLS', 'TL', '626', 1966436, 'TT', 15007, 'USD', '670', NULL, NULL, NULL, 1154625, 'OC', 'te', 'Timor-Leste'),
(472, 'TG', 'TGO', 'TG', '768', 2363686, 'TO', 56785, 'XOF', '228', NULL, NULL, NULL, 6587239, 'AF', 'fr', 'Togo'),
(473, 'TK', 'TKL', 'TK', '772', 4031074, 'TL', 10, 'NZD', '690', NULL, NULL, NULL, 1466, 'OC', 'tk', 'Tokelau'),
(474, 'TO', 'TON', 'TO', '776', 4032283, 'TN', 748, 'TOP', '676', NULL, NULL, NULL, 122580, 'OC', 'to', 'Tonga'),
(475, 'TT', 'TTO', 'TT', '780', 3573591, 'TD', 5128, 'TTD', '1868', NULL, NULL, NULL, 1228691, 'NA', 'en', 'Trinidad and Tobago'),
(476, 'TN', 'TUN', 'TN', '788', 2464461, 'TS', 163610, 'TND', '216', NULL, NULL, NULL, 10589025, 'AF', 'ar', 'Tunisia'),
(477, 'TR', 'TUR', 'TR', '792', 298795, 'TU', 780580, 'TRY', '90', NULL, NULL, NULL, 77804122, 'AS', 'tr', 'Turkey'),
(478, 'TM', 'TKM', 'TM', '795', 1218197, 'TX', 488100, 'TMT', '993', NULL, NULL, NULL, 4940916, 'AS', 'tk', 'Turkmenistan'),
(479, 'TC', 'TCA', 'TC', '796', 3576916, 'TK', 430, 'USD', '1649', NULL, NULL, NULL, 20556, 'NA', 'en', 'Turks and Caicos Islands'),
(480, 'TV', 'TUV', 'TV', '798', 2110297, 'TV', 26, 'AUD', '688', NULL, NULL, NULL, 10472, 'OC', 'tv', 'Tuvalu'),
(481, 'UG', 'UGA', 'UG', '800', 226074, 'UG', 236040, 'UGX', '256', NULL, NULL, NULL, 33398682, 'AF', 'en', 'Uganda'),
(482, 'UA', 'UKR', 'UA', '804', 690791, 'UP', 603700, 'UAH', '380', NULL, NULL, NULL, 45415596, 'EU', 'uk', 'Ukraine'),
(483, 'AE', 'ARE', 'AE', '784', 290557, 'AE', 82880, 'AED', '971', NULL, NULL, NULL, 4975593, 'AS', 'ar', 'United Arab Emirates'),
(484, 'GB', 'GBR', 'GB', '826', 2635167, 'UK', 244820, 'GBP', '44', '7\\d{9}', NULL, '0', 62348447, 'EU', 'en', 'United Kingdom'),
(485, 'US', 'USA', 'US', '840', 6252001, 'US', 9629091, 'USD', '1', '[2-9]\\d{9}', NULL, '1', 310232863, 'NA', 'en', 'United States'),
(486, 'UM', 'UMI', 'UM', '581', 5854968, '0', NULL, 'USD', '1', NULL, NULL, NULL, NULL, 'OC', 'en', 'United States Minor Outlying Islands'),
(487, 'UY', 'URY', 'UY', '858', 3439705, 'UY', 176220, 'UYU', '598', NULL, NULL, NULL, 3477000, 'SA', 'es', 'Uruguay'),
(488, 'UZ', 'UZB', 'UZ', '860', 1512440, 'UZ', 447400, 'UZS', '998', NULL, NULL, NULL, 27865738, 'AS', 'uz', 'Uzbekistan'),
(489, 'VU', 'VUT', 'VU', '548', 2134431, 'NH', 12200, 'VUV', '678', NULL, NULL, NULL, 221552, 'OC', 'bi', 'Vanuatu'),
(490, 'VE', 'VEN', 'VE', '862', 3625428, 'VE', 912050, 'VEF', '58', NULL, NULL, NULL, 27223228, 'SA', 'es', 'Venezuela'),
(491, 'VN', 'VNM', 'VN', '704', 1562822, 'VM', 329560, 'VND', '84', NULL, NULL, NULL, 89571130, 'AS', 'vi', 'Vietnam'),
(492, 'VG', 'VGB', 'VG', '092', 3577718, 'VI', 153, 'USD', '1284', NULL, NULL, NULL, 21730, 'NA', 'en', 'British Virgin Islands'),
(493, 'VI', 'VIR', 'VI', '850', 4796775, 'VQ', 352, 'USD', '1340', NULL, NULL, NULL, 108708, 'NA', 'en', 'U.S. Virgin Islands'),
(494, 'WF', 'WLF', 'WF', '876', 4034749, 'WF', 274, 'XPF', '681', NULL, NULL, NULL, 16025, 'OC', 'wl', 'Wallis and Futuna'),
(495, 'EH', 'ESH', 'EH', '732', 2461445, 'WI', 266000, 'MAD', '212', NULL, NULL, NULL, 273008, 'AF', 'ar', 'Western Sahara'),
(496, 'YE', 'YEM', 'YE', '887', 69543, 'YM', 527970, 'YER', '967', NULL, NULL, NULL, 23495361, 'AS', 'ar', 'Yemen'),
(497, 'ZM', 'ZMB', 'ZM', '894', 895949, 'ZA', 752614, 'ZMW', '260', NULL, NULL, NULL, 13460305, 'AF', 'en', 'Zambia'),
(498, 'ZW', 'ZWE', 'ZW', '716', 878675, 'ZI', 390580, 'ZWL', '263', NULL, NULL, NULL, 11651858, 'AF', 'en', 'Zimbabwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
