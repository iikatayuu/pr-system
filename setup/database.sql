-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2022 at 01:07 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `abbr`) VALUES
(1, 'Office of the Provincial Accountant', 'ACCT'),
(2, 'Office of the Provincial Administrator', 'ADMI'),
(3, 'Office of the Provincial Administrator (ADMP)', 'ADMP'),
(4, 'ABANSE NEGRENSE DISTRICT ANIMAL HEALTH CENTERS', 'AND'),
(5, 'Office of the Provincial Assessor', 'ASSE'),
(6, 'Bids and Awards Committee Secretariat', 'BAC'),
(7, 'BIDS & AWARDS COMMITTEE -CONSOLIDATED', 'BACC'),
(8, 'Cauayan District Hospital', 'CAUH'),
(9, 'Cadiz District Hospital', 'CDH'),
(10, 'Negros Occidental Comprehensive Health Program Division', 'CHPD'),
(11, 'Calatrava District Hospital', 'CMH'),
(12, 'Office of the Provincial Auditor - COA', 'COA'),
(13, 'Provincial Comelec', 'COM'),
(14, 'Communication System', 'COMM'),
(15, 'Civil Service Commission', 'CSC'),
(16, 'Neg. Occ. Scholarship Program - (D.E.S.)', 'DES'),
(17, 'Department of Interior and Local Government', 'DILG'),
(18, 'Disaster Management Program Division', 'DMPD'),
(19, 'Don Salvador Benedicto Memorial Hospital (La Carlota City)', 'DSBH'),
(20, 'Eleuterio T. Decena Memorial Hospital (Hinoba-an)', 'EDMH'),
(21, 'Electronic Data Processing Division', 'EDP'),
(22, 'Economic Enterprises Development Department', 'EEDD'),
(23, 'EEDD-MAMBUKAL RESORT', 'EEDD-MR'),
(24, 'EEDD - Lodging Services', 'EEDL'),
(25, 'EEDD - Food Terminal Market', 'FTM'),
(26, 'EEDD- FOOD TERMINAL MARKET', 'FTM'),
(27, 'Neg. Occ. Scholarship Program - (G.A.D.)', 'GAD'),
(28, 'Gender and Development Programs', 'GADP'),
(29, 'Office of the Governor', 'GOV'),
(30, 'General Services Office', 'GSO'),
(31, 'HOSPITAL OPERATION DEPARTMENT', 'HOD'),
(32, 'Intenal Audit Division', 'IAD'),
(33, 'Ignacio L. Arroyo Sr. Memorial District Hospital', 'IADH'),
(34, 'Information & Communication Technology Division', 'ICTD'),
(35, 'Inapoy Primary Hospital', 'IPRH'),
(36, 'Provincial Jail Management Office', 'JAIL'),
(37, 'Luz Sikatuna Community Primary Hospital', 'LCPH'),
(38, 'Provincial Library Services', 'LIB'),
(39, 'Luz-Sikatuna Community Primary Hospital', 'LUZ'),
(40, 'Lorenzo D. Zayco District Hospital', 'LZDH'),
(41, 'Mambukal Resort', 'MAM'),
(42, 'Merceditas Montilla District Hospital', 'MMDH'),
(43, 'Negros First Blood Center', 'NFBC'),
(44, 'NEGROS FIRST CYBER PARK - EEDD', 'NFCP'),
(45, 'Negros First Cyber Park', 'NFCP'),
(46, 'Negros Occidental Barangay Center', 'NOBC'),
(47, 'Negros Occidental Business Development Center', 'NOBD'),
(48, 'EEDD - NEGROS RESIDENCES', 'NOH'),
(49, 'Negros Occidental Hostel', 'NOH'),
(50, 'Neg. Occ. Investment & Promotion Center', 'NOIP'),
(51, 'Neg. Occ. Language & Information Tech. Center', 'NOLI'),
(52, 'Negros Occidental Language and I.T. Center', 'NOLI'),
(53, 'Negros Occidental Provincial Industrial Estate Office', 'NOPI'),
(54, 'Neg. Occ. Scholarship Program Division', 'NOSP'),
(55, 'Negros Occidental Tourism Center', 'NOTC'),
(56, 'Negros Occidental Tourism Division', 'NOTD'),
(57, 'Neg. Occ. Women & Children Center', 'NOWC'),
(58, 'Office of the Provincial Agriculturist', 'OPA'),
(59, 'Provincial Bantay Dagat Support Program', 'OPA9'),
(60, 'OPA-Provincial Bantay Dagat Support Program', 'OPABD'),
(61, 'OPA-TECHNO GABAY PROGRAM IMPLEMENTATIONS-FITS', 'OPAFITS'),
(62, 'Organic Farming Devt. & Promotions Division', 'ORG'),
(63, 'Office of the Senior Citizens', 'OSC'),
(64, 'Public Affairs Section', 'PAFF'),
(65, 'Park Administration Division', 'PARK'),
(66, 'Provincial Budget Office', 'PBO'),
(67, 'Provincial Cooperative Office', 'PCO'),
(68, 'Provincial Council for the Protection of Children', 'PCPC'),
(69, 'PDC Secretariat', 'PDC'),
(70, 'Provincial Disaster Management Program', 'PDMP'),
(71, 'Provincial Disaster Risk Reduction and Management Council', 'PDRR'),
(72, 'Neg. Occ. Scholarship Program - (P.E.A.C.E.)', 'PEAC'),
(73, 'Technical Support Services Division - PEMO', 'PEMO'),
(74, 'Provincial Environment and Management Office', 'PEMO'),
(75, 'Provincial Mining Regulatory Board', 'PEMOA'),
(76, 'Provincial Nursery and Arboretum', 'PEMOB'),
(77, 'Provincial Environment Week and Other Thematic Events', 'PEMOC'),
(78, 'Provincial Engineer\'s Office', 'PEO'),
(79, 'Construction and Maintenance - PEO', 'PEOB'),
(80, 'PEO - Construction & Maintenance', 'PEOC'),
(81, 'PEO - Motor Pool', 'PEOM'),
(82, 'PEO - Planning Design and Programming', 'PEOP'),
(83, 'PEO - Quality Control', 'PEOQ'),
(84, 'PEO - Rock Crusher', 'PEOR'),
(85, 'PEO - Spring and Water Systems', 'PEOS'),
(86, 'Public Employment Office - Neg. Occ.', 'PESO'),
(87, 'Provincial Health Office', 'PHO'),
(88, 'Prov\'l Human Resource Management Office', 'PHRM'),
(89, 'Provincial Information Office Division', 'PID'),
(90, 'Public Information Office', 'PIO'),
(91, 'Provincial Legal Office', 'PLO'),
(92, 'Provincial Land Use Committee', 'PLUC'),
(93, 'Provincial Nutrition Action Plan', 'PNAP'),
(94, 'Provincial Nutrition Committee', 'PNC'),
(95, 'PNO - NONESCOST SCHOOL OF NURSING', 'PNSN'),
(96, 'Provincial Planning and Development Office', 'PPDO'),
(97, 'Provincial Project Monitoring Committee', 'PPMC'),
(98, 'Provincial Peace and Order Council', 'PPOC'),
(99, 'Panaad Park and Stadium Division', 'PPS'),
(100, 'PRDP - PPMIU', 'PRDP'),
(101, 'Programs on Awards & Incentives for Services Excellence', 'PRI'),
(102, 'Provincial Parole and Probation Office', 'PROB'),
(103, 'Provincial Prosecutor\'s Office', 'PROP'),
(104, 'DECS - Provincial School Board', 'PSB'),
(105, 'Provincial Statistical Coordinating Committee', 'PSCC'),
(106, 'Provincial Social Welfare and Development Office', 'PSWD'),
(107, 'Office of the Provincial Treasurer', 'PTO'),
(108, 'Procurement and Technical Services Division', 'PTSD'),
(109, 'Register of Deeds', 'ROD'),
(110, 'Negros First Rice Processing Center', 'RPC'),
(111, 'Regional Trial Court', 'RTC'),
(112, 'Silay Oxygen Plant', 'SOP'),
(113, 'Office of the Sangguniang Panlalawigan', 'SP'),
(114, 'Special Programs and Concerns Division', 'SPCD'),
(115, 'PPDO-Special Projects Division', 'SPD'),
(116, 'Special Projects Management Office', 'SPD'),
(117, 'Special Projects Management Unit', 'SPMU'),
(118, 'Safety and Security Division', 'SSD'),
(119, 'Sports Development Program Section', 'SYDO'),
(120, 'Task Force Ilahas (20% Development Fund)', 'TASK'),
(121, 'Office of the Governor - Task Force Ilahas', 'TFI'),
(122, 'Teresita L. Jalandoni Provincial Hospital (Silay City)', 'TJPH'),
(123, 'Technology and Livelihood Development Center', 'TLDC'),
(124, 'Valladolid District Hospital', 'VDH'),
(125, 'Office of the Provincial Veterinarian', 'VET'),
(126, 'ABANSE NEGRENSE DISTRICT ANIMAL HEALTH CENTERS - VET', 'VETA'),
(127, 'ABANSE NEGRENSE INTEGRATED LABORATORY - VET', 'VETB'),
(128, 'Provincial Animal Learning Park and Hospital - VET', 'VETC'),
(129, 'Provincial Livestock Breeding Center & Dairy Farm', 'VETD'),
(130, 'OPERATION OF NEGROS FIRST FARM - VET', 'VETE'),
(131, 'V. M. Gatuslao Memorial Hospital (Himamaylan)', 'VGAT'),
(132, 'V.M. Gatuslao Memorial Hospital (Himamaylan) -', 'VGAT'),
(133, 'Office of the Vice-Governor', 'VGOV'),
(134, 'V. Gustilo District Hospital (Escalante)', 'VGUS');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
