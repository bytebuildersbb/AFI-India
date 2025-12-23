/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u512009538_afi_india
-- ------------------------------------------------------
-- Server version	10.11.10-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Kidney Care CME Registration`
--

DROP TABLE IF EXISTS `Kidney Care CME Registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kidney Care CME Registration` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `Email ID` varchar(100) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `System Practiced` varchar(100) NOT NULL,
  `State & City` varchar(100) NOT NULL,
  `Clinic / Institution / Hospital Name` varchar(100) NOT NULL,
  `Years of Clinical Experience` varchar(100) NOT NULL,
  `Are You Treating Kidney Patients?` varchar(100) NOT NULL,
  `Upload Degree Certificate / Registration Proof` varchar(100) NOT NULL,
  `Select Your Registration Type` varchar(100) NOT NULL,
  `Add-on Features` varchar(100) NOT NULL,
  `Postal Address` varchar(100) NOT NULL,
  `Preferred Payment Mode` varchar(100) NOT NULL,
  `Referral Code (if any)` varchar(100) NOT NULL,
  `Total Fees` int(255) NOT NULL DEFAULT 0,
  `Payment Status` varchar(100) NOT NULL DEFAULT 'Not Paid',
  `Payment Id` varchar(100) NOT NULL,
  `New Mobile Number` varchar(15) DEFAULT NULL,
  `New Payment Amount` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kidney Care CME Registration`
--

LOCK TABLES `Kidney Care CME Registration` WRITE;
/*!40000 ALTER TABLE `Kidney Care CME Registration` DISABLE KEYS */;
INSERT INTO `Kidney Care CME Registration` VALUES
(45,'Yogesh io Bansal','2147483647','dryogeshbansal2020@gmail.com','MD','Ayurveda','Punjab ','Komal nursing home','15','Yes','./KidneyCare/uploads/YogeshioBansal_688ee98af132c_inbound1861002573702508338.jpg','Doctor','Yes','127,golf link, opp atam vatika,Hambran road,Ludhiana, 141001,punjab ','Razorpay','',2299,'authorized','pay_R0jcA0F9vcXGec','+919888527176',0),
(46,'Dr Vivek Gupta','2147483647','drvivek927@gmail.com','BAMS','Ayurveda','Nepal ','Ankur Ayurveda ','10','Yes','./KidneyCare/uploads/DrVivekGupta_688eebb84e002_inbound5434793913889857292.jpg','Doctor','No','44100','Razorpay','no any',1299,'Not Paid','','0',0),
(47,'Dr Vijendder singh ','2147483647','vijender1821@gmail.com','BAMS','Ayurveda','Hamirpur himachal pradesh ','Ahwc khaterwar ','12','No','./KidneyCare/uploads/DrVijenddersingh_688eee7b72360_2024_08_192_41PMOfficeLens.jpg','Doctor','Yes','Dr Vijender Singh ahwc khaterwar. P.o.tikkri . manhasan teh . Bhoranj. Distt hamirpur. 176045','Razorpay','',2299,'authorized','pay_R0jz0gSPaC6Mff','+918894079044',0),
(48,'Dr Abhishek Gupta ','2147483647','gupta.abhi311095@gmail.com','MD','Ayurveda','Delhi','Ch Brahm Prakash Ayurveda Charak Sansthan ','9','Yes','./KidneyCare/uploads/DrAbhishekGupta_688eef0a8b696_inbound6034684043357894490.jpg','Doctor','No','C-293 Nehru Enclave Shani Bazar Road,Vivek Store ,Alipur Delhi -110036','Razorpay','Satvik veda',1299,'Not Paid','','0',0),
(49,'Dr Vishal Bhuva ','2147483647','vishal.bhuva1@gmail.com','BAMS','Ayurveda','Gujarat-Surat','Shashwat Ayurved clinic ','10','No','./KidneyCare/uploads/DrVishalBhuva_688ef61a16167_inbound7547048184841715113.jpg','Doctor','Yes','Shashwat Ayurved clinic \r\n127,Aagam Orchid opp Shiv Kartik Enclave Near Nandini-2 Vesu Surat \r\nPin c','Razorpay','',2299,'authorized','pay_R0kXJfqk9hOKsk','+918320699167',0),
(50,'Tarmeem ','2147483647','drtarmeem@gmail.com','BAMS','Ayurveda','Delhi ','CBPACS','0','Yes','./KidneyCare/uploads/Tarmeem_688f09dd600b0_Snapchat-374932789.jpg','Intern','No','110031','Razorpay','',1,'Not Paid','','0',0),
(51,'Kundan kumar','2147483647','kundanroy.roy@gmail.com','BAMS','Ayurveda','Begusarai bihar ','Lnm seva sadan ','9','Yes','./KidneyCare/uploads/Kundankumar_688f253556f95_inbound9012842814279678357.jpg','Doctor','No','Dr.kundan kumar \r\nVillage +post- Naokothi \r\nDist-Begusarai (Bihar)\r\nPin code 851130','Razorpay','',1299,'authorized','pay_R0nx3j8O89sSwC','+919525000403',0),
(52,'Dr Gaurav Malviya ','2147483647','gauravmalviya17@gmail.com','MD','Ayurveda','Betul, Madhya Pradesh ','Shree Mahamrityunjay Multi Speciality Ayurved Clinic & Panchkarma Centre, Betul ','5','Yes','./KidneyCare/uploads/DrGauravMalviya_688f5d483c8a6_IMG_20250803_182728.jpg','Doctor','Yes','Dr Gaurav Malviya, MIG 49, Housing board colony, Taigore Ward, Betul Gunj, Betul MP pin code 460001','Razorpay','',2299,'Not Paid','','0',0),
(53,'Dr Ajit Singh ','2147483647','nadivigyan@gmail.com','BAMS','Ayurveda','Gharonda Haryana ','Sanjivani clinic ','12','No','./KidneyCare/uploads/DrAjitSingh_688f7a020a8d4_IMG_20170609_131136.jpg','Doctor','No','Dr Ajit Singh \r\nH no 4\r\nR k puram \r\nGali no 10\r\nKunj pura road \r\nKarnal 132001 Haryana ','Razorpay','',1299,'Not Paid','','0',0),
(54,'Dr Ajit Singh ','2147483647','nadivigyan@gmail.com','BAMS','Ayurveda','Gharonda Haryana ','Sanjivani clinic ','12','No','./KidneyCare/uploads/DrAjitSingh_688f7a0626392_IMG_20170609_131136.jpg','Doctor','No','Dr Ajit Singh \r\nH no 4\r\nR k puram \r\nGali no 10\r\nKunj pura road \r\nKarnal 132001 Haryana ','Razorpay','',1299,'Not Paid','','0',0),
(55,'Rishi Kumar Tiwari','2147483647','rishi.ayurved@gmail.com','BAMS','Ayurveda','Rajasthan Jaipur ','National Institute of Ayurveda Jaipur ','23','Yes','./KidneyCare/uploads/RishiKumarTiwari_688f87564d7fa_RishiRegistrationCertificate.pdf','Intern','Yes','Department of Dravyaguna,\r\nNational Institute of Ayurveda,\r\nMadhav Vilas, Jorawar Singh Gate, Amer R','Razorpay','',1001,'authorized','pay_R0v5Lc2UfOG5i7','+919414583140',1799),
(56,'Dr Kamil abbasi ','2147483647','kamil.abbasiaye@gmail.com','BAMS','Ayurveda','Baghpat ','Varsi clinic','5','No','./KidneyCare/uploads/DrKamilabbasi_688fbac8e8043_IMG_20250509_105511885_HDR_AE.jpg','Doctor','Yes','Village Barnawa district Baghpat u p pin code 250345','Razorpay','250645',2299,'authorized','pay_R0yqUJp5siEHST','+919761990047',0),
(57,'Dr.SARVESH KUMAR V. ATAL','2147483647','geensk85@gmail.com','Other','Ayurveda','Up','Sun life Hospital ','0','No','./KidneyCare/uploads/Dr.SARVESHKUMARV.ATAL_688fcf258a92f_inbound3034338267785859553.pdf','Intern','No','Maudha Hamirpur UP','Razorpay','',799,'Not Paid','','0',0),
(58,'Dr Rohit daksh','2147483647','ayushkamiya1@gmail.com','BAMS','Ayurveda','Uttar Pradesh ','Ayushkaameeya ayurved chikitsalya ','3','Yes','./KidneyCare/uploads/DrRohitdaksh_68901245deb57_20250804_070458.jpg','Doctor','Yes','Dr Rohit daksh \r\nShri ayushkaameeya ayurved  chikitsalaya\r\npH -no -9258585813\r\n\r\nA-10 ,Rain basera (','Razorpay','',2299,'authorized','pay_R15BZwG8zMuj9e','+919258585813',0),
(59,'Dr.Ashish sen','2147483647','ashishdr1986@gmail.com','MD','Ayurveda','Ujjain Madhya Pradesh ','Dhanwantari ayurveda medical College Hospital Ujjain Madhya Pradesh ','10','Yes','./KidneyCare/uploads/Dr.Ashishsen_68903572cb5de_inbound82683932168743290.pdf','Intern','Yes','14/7, Kesharbagh Colony maksi road pawansa ujjain 456006','Razorpay','',1799,'authorized','pay_R17lP6yLnMN3QQ','+918269424877',0),
(60,'Dr richa agarwal ','2147483647','richag2103@gmail.com','BAMS','Ayurveda','Delhi','Ayuryog ayurvedic clinic and panchkarma centre','15','No','./KidneyCare/uploads/Drrichaagarwal_68905d578f108_17542912410844302486187072194063.jpg','Doctor','Yes','80/60-A, opp. Captain Hitesh Mehta Marg, Shvalik, DDA Flats, Malviya Nagar, New Delhi, Delhi 110017','Razorpay','110017',2299,'authorized','pay_R1AeHpRGEOT7NA','+918586078875',0),
(61,'Dr.Manoj Kumar Chaurasiya ','2147483647','drmk.chaurasia1@gmail.com','BAMS','Ayurveda','M.P','SRS wellness','17','Yes','./KidneyCare/uploads/Dr.ManojKumarChaurasiya_689069ee90545_Screenshot_20250804-123621.png','Doctor','Yes','Dr Manoj Kumar Chaurasiya \r\n302 I block Nilgiri Kalindi Pride devguradiya Indore MP pin 452016','Razorpay','',2299,'Not Paid','','0',0),
(62,'Nitin Kumar Sharma ','2147483647','jaiayurvedic@gmail.com','BAMS','Ayurveda','Bathinda ','Jai ayurvedic clinic ','18','Yes','./KidneyCare/uploads/NitinKumarSharma_6890803e54e93_inbound6596322119632701599.jpg','Doctor','Yes','Jai ayurvedic clinic Bibi wala road Street no 4b near yamaha agency bathinda punjab 151001','Razorpay','',2299,'Not Paid','','0',0),
(63,'Richa Tiwari ','2147483647','richa.ayurved@gmail.com','BAMS','Ayurveda','Rajasthan Jaipur ','National Institute of Ayurveda Jaipur ','21','Yes','./KidneyCare/uploads/RichaTiwari_6890c83f9b879_RishiRegistrationCertificate.pdf','Intern','Yes','114, Agnivesha Arogyashala,\r\nSukhija Vihar Opposite Teolar Unbounded School Maharana Pratap Marg Lal','Razorpay','',1799,'Not Paid','','0',0),
(64,'Roshani Sharma','2147483647','chandroshni007@gmail.com','BAMS','Ayurveda','Anuppur, Madhya Pradesh ','Satmya Ayurveda ','7','Yes','./KidneyCare/uploads/RoshaniSharma_6890e82d64a47_59221.pdf','Doctor','Yes','NC-95, MPPGCL Colony,Chachai, District- Anuppur\r\nNear Pahadi and CE square, 484220, M.P.','Razorpay','',2299,'authorized','pay_R1KjzGBkSRiWAW','+917987371418',0),
(65,'Dr Ajit Kumar Singh','2147483647','sengaraksingh@gmail.com','MD','Ayurveda','Uttar Pradesh Varanasi ','Dr Ajit Kumar Singh ','35','Yes','./KidneyCare/uploads/DrAjitKumarSingh_689193c23bb17_Screenshot_20250805_104355.jpg','Doctor','No','SH-8/3-19B, \r\nRam Janki Dham Colony, Gilat Bazaar,\r\nShivpur By-pass, Varanasi ','Razorpay','',1299,'authorized','pay_R1XCxAjPMRoIAO','+919610888990',0),
(66,'Dr Manish Sharma','2147483647','indiabharat455@gmail.com','BAMS','Ayurveda','Hardoi','Vikrant Poly Clinic And Ksharsutra Research Centre','12','Yes','./KidneyCare/uploads/DrManishSharma_6891ea03666a5_20250805_165332.jpg','Doctor','Yes','Vikrant Poly Clinic, Mohalla Nai Basti Near, Bajariya Chauraha, Bypass, Shahabad, Up. Pin Code: 2411','Razorpay','',2299,'Not Paid','','0',0),
(67,'Rishi Dhandh ','2147483647','ronysharma1167@gmail.com','BAMS','Ayurveda','Rajasthan','SA MEDICAL COLLEGE ','1','No','./KidneyCare/uploads/RishiDhandh_68921eae4200f_20250131_152444583.jpg','Intern','No','Kheri Mohalla Ward No 4 Bagar \r\nPincode - 333023','Razorpay','',799,'authorized','pay_R1hJAZ54MwTX5a','+917690079909',0),
(68,'Sumit Bakshi','2147483647','yogisumitbakshi@gmail.com','BAMS','Ayurveda','Haryana ','Student ','0','No','./KidneyCare/uploads/SumitBakshi_6892efc6e747e_image.jpg','Intern','No','Sumit Bakshi S/O Jai Parkash Bakshi \r\nJain Colony Jagadhri Road Bilaspur \r\nBehind Krishna Hospital \r','Razorpay','',799,'authorized','pay_R1wWq5EIvjZRqT','+917876993300',0),
(69,'Dr Tejvir Singh','2147483647','tejvirdr@gmail.com','BAMS','Ayurveda','Uttar Pradesh & Aligarh','Shri K.K. Ayurvedic Hospital','7','Yes','./KidneyCare/uploads/DrTejvirSingh_689365d459827_AyushMoMathuraNew_6.jpg','Doctor','Yes','Nagla Mahura Post Nagla Birkhu Gonda Aligarh Uttar Pradesh 202123','Razorpay','',2299,'Not Paid','','0',0),
(70,'vaidya rakesh singhal','2147483647','rakesh101166singhal@gmail.com','BAMS','Ayurveda','Uttar Pradesh /Bareilly','Atrey panchkarma and ayurvedic center','20','Yes','./KidneyCare/uploads/vaidyarakeshsinghal_68937bca0e90e_1754495920483558980443641341040.jpg','Doctor','No','568 shahabad deewankhana bareilly\r\nshahabad','Razorpay','',1299,'Not Paid','','0',0),
(71,'vaidya rakesh singhal','2147483647','vinodsaxena621@gmail.com','BAMS','Ayurveda','Uttar Pradesh /Bareilly','Atrey panchkarma and ayurvedic center','20','Yes','./KidneyCare/uploads/vaidyarakeshsinghal_68937c622eaac_1754495920483558980443641341040.jpg','Doctor','No','568 shahabad deewankhana bareilly\r\nshahabad','Razorpay','',1299,'authorized','pay_R26jLaKntft8JT','+919456821263',0),
(72,'DR.R.P.S.CHAWLA','2147483647','rpsc1313@gmail.com','BAMS','Ayurveda','PANJAB NAKODAR ','CHAWLA AYURVEDIC CLINIC ','30','Yes','./KidneyCare/uploads/DR.R.P.S.CHAWLA_68946f663cfd8_17545577241101837237692233771660.jpg','Doctor','Yes','DR.R.P.S.CHAWLA, CHAWLA AYURVEDIC CLINIC, HOSPITAL ROAD NAKODAR 144040,JALANDHAR PANJAB','Razorpay','',2299,'Not Paid','','0',0),
(73,'Dr Vinay Kasaudhan ','2147483647','kingvinay702@gmail.com','BAMS','Ayurveda','Ayodhya','Shree Ayurved chikitsalaya ','1','Yes','./KidneyCare/uploads/DrVinayKasaudhan_6894731ba37d2_Screenshot_20250807_145534_WhatsApp.jpg','Doctor','Yes','Add- Konchha bazar (Main market)\r\n Dist- Ayodhya \r\nPin- 224207\r\nMo-  9415716505','Razorpay','',2299,'Not Paid','','0',0),
(74,'Dr NIKUN KUMAR SAHU ','2147483647','nikunsahu@rocketmail.com','BAMS','Ayurveda','Odisha','Naktideul CHC','11','Yes','./KidneyCare/uploads/DrNIKUNKUMARSAHU_68948a36dafef_IMG_20250807_163908.jpg','Doctor','No','CHC NAKTIDEUL\r\nPO NAKTIDEUL\r\nDIST SAMBALPUR\r\nPIN 768118\r\nODISHA ','Razorpay','',1299,'Not Paid','','0',0),
(75,'vinod mittar','2147483647','vinod.mittar@gmail.com','BAMS','Ayurveda','Gurgaon','Sh Balaji family Clinic','29','Yes','./KidneyCare/uploads/vinodmittar_6894a10841b73_IMG-20250804-WA0022.jpg','Doctor','No','Rosewood 37 (RW) ,Malibu town ,opp Good Earth\r\nH no 37 ,first floor , sec 47 ,Malibu town','Razorpay','',1299,'authorized','pay_R2S0PW2SfXYK73','+917042115382',0),
(76,'Dr NIKUN KUMAR SAHU ','2147483647','nikuns521@gmail.com','BAMS','Ayurveda','ODISHA ','Naktideul CHC','11','No','./KidneyCare/uploads/DrNIKUNKUMARSAHU_6895654f99ab2_IMG_20250807_163908.jpg','Doctor','No','NIKUN KUMAR SAHU\r\nCHC NAKTIDEUL\r\nPO NAKTIDEUL\r\nDIST SAMBALPUR\r\nPIN 768118\r\nODISHA \r\n','Razorpay','',1299,'authorized','pay_R2gGwGW5iYNejx','+917873939300',0),
(77,'Kuldeep','2147483647','kuldeepraj1976@gmail.com','BAMS','Ayurveda','Ghaziabad up','Ayush health centre ','20','Yes','./KidneyCare/uploads/Kuldeep_6895af480527b_inbound3772265187583844276.jpg','Doctor','No','C 179 brij vihar ghaziabad ','Razorpay','',1299,'authorized','pay_R2leiWbUZHMXor','+919761617385',0),
(79,'Dr Lalit Vyas','','pileswala@gmail.com','BAMS','Ayurveda','Bharatpur','Charak chiktshalya','20','Yes','./KidneyCare/uploads/DrLalitVyas_68960fe264c18_inbound4959046889432586116.jpg','Doctor','Yes','Dr Lalit Vyas \r\n508 Krishna Nagar \r\nNear Telephone exchange \r\nBharatpur Rajasthan \r\n321001','Razorpay','',2299,'Not Paid','','9610824340',0),
(80,'Dr.rajesh saxena','','rajeshsaxena215@gmail.com','BAMS','Ayurveda','Khatima','Ayush Neuro Ayurveda hospital ','14','Yes','./KidneyCare/uploads/Dr.rajeshsaxena_6898a2e74a88d_B94B25D5-6725-42A1-88A6-F907176C6241.jpeg','Doctor','No','Ayush Neuro Ayurveda hospital Khatima Uttarakhand 9997066987 262308','Razorpay','000',1299,'authorized','pay_R3eZqL09SSbOic','08937887174',0),
(81,'Dr ANURAG SHARMA ','','Dr.anuragsharma05@gmail.com','BAMS','Ayurveda','Uttar Pradesh Kushinagar ','Janseva Hospital and Kshar Sutra Center ','3','No','./KidneyCare/uploads/DrANURAGSHARMA_689ab298e06e7_IMG-20240830-WA0005.jpg','Doctor','No','Village Barhaj Post horlapur Kushinagar Uttar Pradesh 274303','Razorpay','',1299,'Not Paid','','7800942654',0),
(82,'Shreyansh Ashok Pachore','','vd.shreyansh@gmail.com','BAMS','Ayurveda','Anand','Ayushkamiya Ayurvediya Chikitsa Mandir','12','Yes','./KidneyCare/uploads/ShreyanshAshokPachore_689b5e9f490bc_Dr.Shreyansh-U.G.Degree.pdf','Doctor','Yes','36, Pearl Harmony Society, Opp. J.V.Patel I.T.I., Behind Kanthashil Park - 1,\r\nAnand-Sojitra Road, K','Razorpay','',2299,'authorized','pay_R4TRfXfka8rtzk','8855894943',0);
/*!40000 ALTER TABLE `Kidney Care CME Registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kidney Care CME Transactions`
--

DROP TABLE IF EXISTS `Kidney Care CME Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kidney Care CME Transactions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PaymentId` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `CreatedTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Registration Form ID` int(11) NOT NULL,
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kidney Care CME Transactions`
--

LOCK TABLES `Kidney Care CME Transactions` WRITE;
/*!40000 ALTER TABLE `Kidney Care CME Transactions` DISABLE KEYS */;
INSERT INTO `Kidney Care CME Transactions` VALUES
(61,'+919888527176','dryogeshbansal2020@gmail.com','pay_R0jcA0F9vcXGec','authorized','2299','2025-08-03 04:46:53',45),
(62,'+918894079044','vijender1821@gmail.com','pay_R0jz0gSPaC6Mff','authorized','2299','2025-08-03 05:08:31',47),
(63,'+918320699167','vishal.bhuva1@gmail.com','pay_R0kXJfqk9hOKsk','authorized','2299','2025-08-03 05:40:54',49),
(64,'+919525000403','kundanroy.roy@gmail.com','pay_R0nx3j8O89sSwC','authorized','1299','2025-08-03 09:01:27',51),
(65,'+919414583140','rishi.ayurved@gmail.com','pay_R0v5Lc2UfOG5i7','authorized','1001','2025-08-03 16:00:10',55),
(66,'+919761990047','kamil.abbasiaye@gmail.com','pay_R0yqUJp5siEHST','authorized','2299','2025-08-03 19:40:57',56),
(67,'+919258585813','ayushkamiya1@gmail.com','pay_R15BZwG8zMuj9e','authorized','2299','2025-08-04 01:53:00',58),
(68,'+918269424877','ashishdr1986@gmail.com','pay_R17lP6yLnMN3QQ','authorized','1799','2025-08-04 04:24:39',59),
(69,'+918586078875','richag2103@gmail.com','pay_R1AeHpRGEOT7NA','authorized','2299','2025-08-04 07:13:28',60),
(70,'+917987371418','chandroshni007@gmail.com','pay_R1KjzGBkSRiWAW','authorized','2299','2025-08-04 17:05:53',64),
(71,'+919610888990','sengaraksingh@gmail.com','pay_R1XCxAjPMRoIAO','authorized','1299','2025-08-05 05:18:09',65),
(72,'+917690079909','ronysharma1167@gmail.com','pay_R1hJAZ54MwTX5a','authorized','799','2025-08-05 15:10:23',67),
(73,'+917876993300','yogisumitbakshi@gmail.com','pay_R1wWq5EIvjZRqT','authorized','799','2025-08-06 06:03:42',68),
(74,'+919456821263','vinodsaxena621@gmail.com','pay_R26jLaKntft8JT','authorized','1299','2025-08-06 16:02:51',71),
(75,'+917042115382','vinod.mittar@gmail.com','pay_R2S0PW2SfXYK73','authorized','1299','2025-08-07 12:51:12',75),
(76,'+917873939300','nikuns521@gmail.com','pay_R2gGwGW5iYNejx','authorized','1299','2025-08-08 02:48:50',76),
(77,'+919761617385','kuldeepraj1976@gmail.com','pay_R2leiWbUZHMXor','authorized','1299','2025-08-08 08:05:15',77),
(78,'+918937887174','rajeshsaxena215@gmail.com','pay_R3eZqL09SSbOic','authorized','1299','2025-08-10 13:48:38',80),
(79,'+918855894943','vd.shreyansh@gmail.com','pay_R4TRfXfka8rtzk','authorized','2299','2025-08-12 15:33:48',82);
/*!40000 ALTER TABLE `Kidney Care CME Transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_education`
--

DROP TABLE IF EXISTS `application_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_education` (
  `application_education_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `univercity_collage` varchar(255) NOT NULL,
  `degree_diploma` varchar(255) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `year_of_passing` varchar(64) NOT NULL,
  `grade_parcentage` varchar(64) NOT NULL,
  `application_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`application_education_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_education`
--

LOCK TABLES `application_education` WRITE;
/*!40000 ALTER TABLE `application_education` DISABLE KEYS */;
INSERT INTO `application_education` VALUES
(1,'(1) University/College - 242 ','(1) Diploma/Degree - 234 ','(1) Subject - 234 ','(1) Passing Year - 244 ','(1) Percentage - 24234 ',10001),
(2,'(1) University/College - 24234 ','(1) Diploma/Degree - 234 ','(1) Subject - 234 ','(1) Passing Year - 234 ','(1) Percentage - 24234 ',10002),
(3,'(1) University/College - 43 ','(1) Diploma/Degree - asdf ','(1) Subject - asdf ','(1) Passing Year - asdf ','(1) Percentage - asdfafds ',10003),
(4,'(1) University/College - sdfasf ','(1) Diploma/Degree - asdf ','(1) Subject - asfd ','(1) Passing Year - asdf ','(1) Percentage - asdf ',10004),
(5,'(1) University/College - sdfasf ','(1) Diploma/Degree - asdf ','(1) Subject - asfd ','(1) Passing Year - asdf ','(1) Percentage - asdf ',10005),
(6,'(1) University/College - sdfasf ','(1) Diploma/Degree - asdf ','(1) Subject - asfd ','(1) Passing Year - asdf ','(1) Percentage - asdf ',10006),
(7,'(1) University/College - sdfasf ','(1) Diploma/Degree - asdf ','(1) Subject - asfd ','(1) Passing Year - asdf ','(1) Percentage - asdf ',10007),
(8,'(1) University/College - sadf ','(1) Diploma/Degree - asdf ','(1) Subject - asdf ','(1) Passing Year - asdf ','(1) Percentage - asdf ',10008),
(9,'(1) University/College - sdf ','(1) Diploma/Degree - df ','(1) Subject - asdf ','(1) Passing Year - sdf ','(1) Percentage - asf ',10010),
(10,'(1) University/College - 2323 ','(1) Diploma/Degree - 24 ','(1) Subject - sdf ','(1) Passing Year - sfd ','(1) Percentage - sfd ',10011);
/*!40000 ALTER TABLE `application_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_ambassador_form`
--

DROP TABLE IF EXISTS `health_ambassador_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_ambassador_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `coupon_applied` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `display` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_ambassador_form`
--

LOCK TABLES `health_ambassador_form` WRITE;
/*!40000 ALTER TABLE `health_ambassador_form` DISABLE KEYS */;
INSERT INTO `health_ambassador_form` VALUES
(97,'monika','2024-06-04','4525454545','4525454545','harry@test.com','ihh','4254353','dsa','afi109','2024-06-04 06:32:59',1),
(98,'yykyk','2024-06-04','4525454545','4525454545','admin@1.com','76ytr','123455','graduation','afi109','2024-06-04 08:02:03',0);
/*!40000 ALTER TABLE `health_ambassador_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_ambassador_form_coupon`
--

DROP TABLE IF EXISTS `health_ambassador_form_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_ambassador_form_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_ambassador_form_coupon`
--

LOCK TABLES `health_ambassador_form_coupon` WRITE;
/*!40000 ALTER TABLE `health_ambassador_form_coupon` DISABLE KEYS */;
INSERT INTO `health_ambassador_form_coupon` VALUES
(1,'HA-01','2024-05-23 15:22:01');
/*!40000 ALTER TABLE `health_ambassador_form_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_ambassador_transaction`
--

DROP TABLE IF EXISTS `health_ambassador_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_ambassador_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_ambassador_transaction`
--

LOCK TABLES `health_ambassador_transaction` WRITE;
/*!40000 ALTER TABLE `health_ambassador_transaction` DISABLE KEYS */;
INSERT INTO `health_ambassador_transaction` VALUES
(62,'','','pay_OEbxobOi2axbP2','razorpay','95','2024-05-25 05:29:08'),
(63,'','','pay_OEdHmRFFScDQlK','razorpay','95','2024-05-25 06:46:41');
/*!40000 ALTER TABLE `health_ambassador_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `StateID_PK` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `StateName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES
(1,1,'ANDHRA PRADESH'),
(2,1,'ASSAM'),
(3,1,'ARUNACHAL PRADESH'),
(4,1,'GUJRAT'),
(5,1,'BIHAR'),
(6,1,'HARYANA'),
(7,1,'HIMACHAL PRADESH'),
(8,1,'JAMMU & KASHMIR'),
(9,1,'KARNATAKA'),
(10,1,'KERALA'),
(11,1,'MADHYA PRADESH'),
(12,1,'MAHARASHTRA'),
(13,1,'MANIPUR'),
(14,1,'MEGHALAYA'),
(15,1,'MIZORAM'),
(16,1,'NAGALAND'),
(17,1,'ORISSA'),
(18,1,'PUNJAB'),
(19,1,'RAJASTHAN'),
(20,1,'SIKKIM'),
(21,1,'TAMIL NADU'),
(22,1,'TRIPURA'),
(23,1,'UTTAR PRADESH'),
(24,1,'WEST BENGAL'),
(25,1,'GOA'),
(26,1,'PONDICHERY'),
(27,1,'LAKSHDWEEP'),
(28,1,'DAMAN & DIU'),
(29,1,'DADRA & NAGAR'),
(30,1,'CHANDIGARH'),
(31,1,'ANDAMAN & NICOBAR'),
(32,1,'UTTARANCHAL'),
(33,1,'JHARKHAND'),
(34,1,'CHATTISGARH'),
(35,1,'ASSAM'),
(36,1,'New Delhi'),
(37,1,'Delhi');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_about_us`
--

DROP TABLE IF EXISTS `tbl_about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_about_us` (
  `about_us_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` longtext DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeyword` varchar(255) DEFAULT NULL,
  `about_heading` varchar(64) DEFAULT NULL,
  `about_paragraph` longtext DEFAULT NULL,
  `aboutUs_img` varchar(255) DEFAULT NULL,
  `altImg_1` varchar(64) NOT NULL,
  `aboutUs_Description` longtext DEFAULT NULL,
  `founderImg` varchar(255) DEFAULT NULL,
  `altImg_2` varchar(64) NOT NULL,
  `aboutFounder` longtext DEFAULT NULL,
  `aboutAFI` longtext DEFAULT NULL,
  PRIMARY KEY (`about_us_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_about_us`
--

LOCK TABLES `tbl_about_us` WRITE;
/*!40000 ALTER TABLE `tbl_about_us` DISABLE KEYS */;
INSERT INTO `tbl_about_us` VALUES
(1,'About us','Test,Test','SEO,SMO','About  ','Ayurveda is an ancient old science that continuously proves itself even in the present situation of covid too. In harsh situations, our Ayurveda doctors proved themselves by providing successful treatment to covid sufferers. When the situation was harsh, limited resources were there and minimal government supply and help was there, in that condition too Ayurveda Doctors worked wholeheartedly, honestly, and kept on striving. In reality, if this Ayurveda system gets proper support and resources, then in the whole world it can change the healthcare scenario too.Ayurveda Federation of India has been established to provide a permanent solution to the various problems related to the Ayurveda Eco System and the problems of all the stakeholders related to this system.Through this platform, together with the people working in our Ayurveda system, we will build a better, stronger and more confident system and lay the foundation of a magnificent building for the present and coming generation of Ayurveda. It will be our constant effort to improve the health of the people of the country and the world with the help of Ayurveda with body, mind and wealth.','1724839687_about.php','','<h2>&nbsp;</h2><p>Ayurveda Federation of India (AFI) is a Constitutional Body of “AYURVED VIGYAN FORUM” registered under Section 8, Registration number U8530DL2021NPL383074, Registered with the Ministry of Corporate Affairs, Government of India.</p><p>A leading organization working tirelessly for the welfare of Ayurveda practitioners, students, researchers, and all stakeholders of Ayurveda on global scale.</p><p>We are committed to advancing the practice of Ayurveda and promoting its principles for the betterment of public health.</p>','1734986214_founder.php','','<h3>&nbsp;</h3><p>Ayurveda is an ancient old science that continuously proves itself even in the present situation of covid too. In harsh situations, our Ayurveda doctors proved themselves by providing successful treatment to covid sufferers. When the situation was harsh, limited resources were there and minimal government supply and help was there, in that condition too Ayurveda Doctors worked wholeheartedly, honestly, and kept on striving. In reality, if this Ayurveda system gets proper support and resources, then in the whole world it can change the healthcare scenario too.</p>','  A unit of ');
/*!40000 ALTER TABLE `tbl_about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin_login`
--

DROP TABLE IF EXISTS `tbl_admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin_login` (
  `admin_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `IP` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`admin_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin_login`
--

LOCK TABLES `tbl_admin_login` WRITE;
/*!40000 ALTER TABLE `tbl_admin_login` DISABLE KEYS */;
INSERT INTO `tbl_admin_login` VALUES
(1,'afi_admin','AFI@admin!28AA','2021-08-04 09:38:55','2021-08-04 09:38:55',NULL);
/*!40000 ALTER TABLE `tbl_admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_application_form`
--

DROP TABLE IF EXISTS `tbl_application_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_application_form` (
  `application_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `father_husband_guardian_name` varchar(64) NOT NULL,
  `dob` varchar(64) NOT NULL,
  `address` longtext NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `state` varchar(64) NOT NULL,
  `mobileNo` varchar(11) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `application_for` varchar(50) NOT NULL,
  `member_type` varchar(100) NOT NULL,
  `IDCArd` varchar(255) NOT NULL,
  `course_table_fk` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentStatus` varchar(255) DEFAULT NULL,
  `paymentAmount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`application_id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_application_form`
--

LOCK TABLES `tbl_application_form` WRITE;
/*!40000 ALTER TABLE `tbl_application_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_application_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_articel`
--

DROP TABLE IF EXISTS `tbl_articel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_articel` (
  `articel_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `articelImg` varchar(64) DEFAULT NULL,
  `altImg` varchar(64) DEFAULT NULL,
  `articelTitle` varchar(255) DEFAULT NULL,
  `articelSlug` varchar(255) DEFAULT NULL,
  `articelCategory` varchar(64) DEFAULT NULL,
  `articelContent` longtext DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT NULL,
  `updatedOn` timestamp NULL DEFAULT NULL,
  `autherName` varchar(64) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`articel_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_articel`
--

LOCK TABLES `tbl_articel` WRITE;
/*!40000 ALTER TABLE `tbl_articel` DISABLE KEYS */;
INSERT INTO `tbl_articel` VALUES
(1,'1628744488_blog.png','Officia et tempore ','Quasi non molestiae ','quasi-non-molestiae-','4','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n',NULL,NULL,'Anand Kashyap',0);
/*!40000 ALTER TABLE `tbl_articel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blog`
--

DROP TABLE IF EXISTS `tbl_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_blog` (
  `blog_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `blogImg` varchar(255) DEFAULT NULL,
  `altImg` varchar(64) DEFAULT NULL,
  `blogTitle` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 for blog 2 for news',
  `urlSlug` varchar(255) DEFAULT NULL,
  `blogCategory` int(11) DEFAULT NULL,
  `blogContent` longtext DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `autherName` varchar(64) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `pageName` varchar(255) NOT NULL,
  `pageTitle` varchar(255) NOT NULL,
  `pageMeta` varchar(255) NOT NULL,
  `pageDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`blog_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blog`
--

LOCK TABLES `tbl_blog` WRITE;
/*!40000 ALTER TABLE `tbl_blog` DISABLE KEYS */;
INSERT INTO `tbl_blog` VALUES
(9,'1750926368_blog.jpg','','asd',1,'blog-news-data-337',1,'PHA+UEhBK1lYTmtQQzl3UGcwSzwvcD4NCg==','2025-06-26 08:26:07','2025-06-26 01:56:49',NULL,0,'asd','asd','asd','asd');
/*!40000 ALTER TABLE `tbl_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blog_category`
--

DROP TABLE IF EXISTS `tbl_blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_blog_category` (
  `blog_category_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(64) DEFAULT NULL,
  `isActive` enum('0','1') NOT NULL,
  PRIMARY KEY (`blog_category_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blog_category`
--

LOCK TABLES `tbl_blog_category` WRITE;
/*!40000 ALTER TABLE `tbl_blog_category` DISABLE KEYS */;
INSERT INTO `tbl_blog_category` VALUES
(1,'Breathing','0'),
(2,'Health','0'),
(3,'Mantra','0'),
(4,'Meditation','0');
/*!40000 ALTER TABLE `tbl_blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contact_us`
--

DROP TABLE IF EXISTS `tbl_contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contact_us` (
  `contact_us_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(21) DEFAULT NULL,
  `mobileNo` varchar(15) DEFAULT NULL,
  `emailID` varchar(64) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `registerdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`contact_us_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contact_us`
--

LOCK TABLES `tbl_contact_us` WRITE;
/*!40000 ALTER TABLE `tbl_contact_us` DISABLE KEYS */;
INSERT INTO `tbl_contact_us` VALUES
(1,'Destiny Levine','Velit nostrum e','bohucy@mailinator.com','Amet nihil eligendi','Libero cum mollit co','2021-08-09 08:57:52'),
(2,'Miriam Nolan','Minim eum sit e','tyrug@mailinator.com','Sint quis in duis pa','Aspernatur sunt veli','2021-08-09 08:58:21'),
(3,'Anand Kumarq','9999138810','abcd@gmail.com','HOuse no','Delhi MEtro','2021-08-09 08:59:53');
/*!40000 ALTER TABLE `tbl_contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_core_committee`
--

DROP TABLE IF EXISTS `tbl_core_committee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_core_committee` (
  `core_committee_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `designation` varchar(64) DEFAULT NULL,
  `DesignationName` varchar(64) DEFAULT NULL,
  `artical` longtext DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT '1707291704PDF.jpg',
  `altImg` varchar(64) NOT NULL,
  `registerdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) DEFAULT NULL COMMENT '1 for state 0 for membership',
  `orderr` int(11) DEFAULT NULL,
  PRIMARY KEY (`core_committee_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_core_committee`
--

LOCK TABLES `tbl_core_committee` WRITE;
/*!40000 ALTER TABLE `tbl_core_committee` DISABLE KEYS */;
INSERT INTO `tbl_core_committee` VALUES
(1,'Dr. Shashi Kant Rai','Central Patron Committee','Advisor & Patron ','<p>&nbsp;</p>','1687327514_cProfile.jpg','00','2023-06-20 11:54:13',NULL,3),
(3,'Dr. Arvind kumar srivastava','Central Patron Committee','','<p>Practice last 32yrs\r\nSewa hospital surekapuram Bathua Mirzapur 231001 mob 9415205533 9415259600 7007244233</p>','ArvindShrivastav.jpg','','2021-08-11 11:13:26',NULL,1),
(4,'Dr. Bhoopendra Mani Tripathi','Central Patron Committee','','<p>Ex Associate Professor, QIMS (U.K.)\r\nMedical Officer (UP Government)\r\nDirector, Charak Ayurved Classes \r\nDirector, SRPT Ayurved Clinic And Research Centre, Kaushambi \r\nAwards- Charak Award, Youngest senior scientist award, Ayurved Gaurav, Rishikul Ratna,Bhishak Ratna Award .</p>','BhupendraManiTripathi.jpg','','2021-08-11 11:13:26',NULL,1),
(5,'Dr. Sumit Doraya ','Central Patron Committee',NULL,'<p></p>','1707291704PDF.jpg','','2021-08-11 11:16:46',NULL,7),
(6,'Dr Ved Prakash Dwivedi','Central Patron Committee','','<p>Manager (Research and development, Clinical Research, Regulatory and Telemedicine Head) at Shree Baidyanath Pharmacy</p>','VedPrakash.png','','2021-08-11 11:13:26',NULL,1),
(7,'Dr.Shilpa Yerme Patil ','Central Patron Committee','','<p>Founder Ayurved Welfare Foundation, Solapur\r\nExpertise in Face Mapping,Nadi Pariksha ,prakriti Pariksha \r\nExperience 21 Yrs.\r\nAndroid Applications published on Google Play Store.\r\n9 Books Published.</p>','ShilpaPatil.jpeg','','2021-08-11 11:13:26',NULL,1),
(8,'Dr. Ajay Gupta','Central Patron Committee','','<p></p>','1707291704PDF.jpg','','2021-08-11 11:13:26',NULL,1),
(9,'Dr. Darpan Gangil','Central Patron Committee','','<p></p>','1707291704PDF.jpg','','2021-08-11 11:13:26',NULL,1),
(10,'Dr. Gaurang Joshi','International Core Committee','President - International Core Committee                    ','<p>International Ayurveda Physician,Director-Atharva Multi-Specialty Ayurveda Hospital and Research Center,Rajkot,Gujarat Actively Propagating Ayurved Globally and having collaboration in Europe,Brazil ,USA,Mexico etc for academic and clinical training of Ayurveda \r\n-Associated with many International Ayurveda Organisations </p>','1631252560_cProfile.JPG','','2021-08-11 11:17:56',NULL,1),
(11,'Dr. Sanjay P. Chhajed','International Core Committee','Vice President ','<p>&nbsp;</p>','1713440158_cProfile.jpeg','','2023-06-20 11:46:07',NULL,2),
(12,'Dr. Bhairav Kulkarni','International Core Committee','General Secretary','<p>Professor & HOD, Kayachikitsa Department\r\nDr. Vedprakash Patil Ayurvedic Medical College and Research Institute, Jalna\r\nDirector, Shree Siddhivinayak Ayurved Panchakarma Center,\r\nChhatrapati Sambhajinagar (Aurangabad) - 431005\r\nemail id - dr.bhairavkulkarni@gmail.com\r\nwww.shreesiddhidhiyayurveda.in\r\nMob No. 919967282076\r\n</p>','1633961873_cProfileBhairav B. Kulkarni.png','Bhairav B. Kulkarni','2021-10-11 14:17:53',NULL,3),
(16,'Dr. Ajay Kumar','Academic Committee','Senior Vice Preisdent','<p>&nbsp;</p>','1687259886_cProfile.jpeg','','2021-09-08 06:28:21',NULL,2),
(24,'Dr. Satyadev Arya ','','Founding Team Member','<p>He is an Ayurvedic Consultant and Panchakarma specialist having vast experience in the field of Ayurveda. He holds the qualification of BAMS (UK), MD Panchakarma from SDMCA Udupi, CKPRA (Kerala), and Certificate in Ano-rectal Disease management (Kerala), FAGE.</p>','1631251646_cProfileIMG_0496yky.jpg','','2021-09-10 05:27:26',NULL,6),
(28,'Dr. Sunil Arya','','Founding Member','<p>DrSunil Arya is BAMS, MD(Ay) ,</p><p>Director &amp; Founder of Jeevniya Ayurveda Clinics,&nbsp;</p><p>Gurgaon (Haryana) &nbsp;Having more than 25 years experience in clinical practice of Ayurveda . \'Jeevniya’ is well equipped with Panchkarma and Ksharsutra Therapies and a big Ayurveda Pharmacy.</p>','1631275533_cProfile.jpeg','','2021-09-10 07:09:11',NULL,8),
(32,'Dr. Pushpa Yadav','Women’s Committee','President','<p>Vaidya pushpa yadav is BAMS from mahila ayurvedic college khanpur kalan sonepat 24 yrs experience as an ayurvedic practitioner .She is specialist at infertility and all gynaecologucal prblms, skin problems with beauty concept of Ayurveda with proper prakriti analysis &nbsp;for my social services.</p>','1633963817_cProfilePushpa.png','Pushpa','2021-10-11 14:50:17',NULL,1),
(33,'Vd. Pallav Prajapati','Student Committee','President','<p>Ayurvedic Doctor BAMS (Intern) from SGM PG Ayurvedic Medical College, Ghazipur, UP. &nbsp;Ccyp(BHU) &nbsp;Working in field of &nbsp;Marma Chikitsha, Cupping therapy, Jaloka Avacharan, Ozone Therapy.</p>','1633964313_cProfilePallav Prajapati.png','Pallav Prajapati','2021-10-11 14:58:33',NULL,1),
(36,'Dr. Aneesh. T','Academic Committee','General Secretary','<p>Designation in AFI: - Academic council secretary</p><p>&nbsp;Editorial board member of AFIs journal</p>','1633965939_cProfileAneesh T.png','Dr. Aneesh. T','2021-10-11 15:25:39',NULL,2),
(38,'Dr.Bhairav  Kulkarni','Journal of AFI','General Secretary','<p>Professor & HOD, Kayachikitsa Department\nDr. Vedprakash Patil Ayurvedic Medical College and Research Institute, Jalna\nDirector, Shree Siddhivinayak Ayurved Panchakarma Center,\nChhatrapati Sambhajinagar (Aurangabad) - 431005\nemail id - dr.bhairavkulkarni@gmail.com\nwww.shreesiddhidhiyayurveda.in\nMob No. 919967282076\n</p>','1633966193_cProfileBhairav B. Kulkarni.png','Bhairav Kulkarni','2021-10-11 15:29:53',NULL,2),
(39,'Dr.Pavan Singh Shekhawat','Swasthya Sandesh Patrika','BAMS','<p>Myself Dr.Pavan Singh Shekhawat from Alwar Rajasthan, Ayurveda graduate from Shri Prashurampuria Ayurved Mahavidyalaya Sikar, Rajasthan.</p>','1633966464_cProfileDr.Pavan Singh Shekhawat.png','Dr.Pavan Singh Shekhawat','2021-10-11 15:34:23',NULL,1),
(41,'Dr. Sujit Kumar','Swasthya Sandesh Patrika','Associate Editor','<p>Dr. Sujit Kumar is presently working as Assist. Prof. at Deptt. Of Kriya Sharir (Physiology) Vivek College of Ayurvedic Sciences &amp; Hospital, Bijnor, U.P. His Academic qualification is BSc. Biotechnology from CSJM University Kanpur, BAMS from Bharati Vidyapeeth University Pune, He did Many Clinical workshops Like BLS, CPR Training and Done Certification courses Like CCH, CGO, SVD from Pune and Published Book in Lambert Publishing Academy (LAP) &amp; Press Scholars and Published Articles in Many National &amp; International UGC Approved Journals and Presented Many Scientific Papers in National and International Seminars &amp; Also Presented Poster in the Country. He is an Author, Writer, Clinician, Researcher and His keen interest in Research. He is the member of American College of Cardiology (ACC), Washington, D.C. USA. He is the member of Physiological Society (FMPS) London, UK. He is the Member at Society of Hospital Medicine (SHM), Philadelphia, USA, &amp; also Member at Undersea and Hyperbaric Medical Society (UHMS), Florida, USA. Recently He is nominated as Young Scientist Award in the field of Medicine, ISAP, 2021 by VDGOODS Factory Pvt. Ltd. Pondicherry. &nbsp;</p>','1633966779_cProfileDR. SUJIT KUMAR.png','DR. SUJIT KUMAR','2021-10-11 15:39:38',NULL,2),
(43,'Dr. Naveen Chauhan','Ayurvedic Surgeons Committee','BAMS, CRAV (KSHARSUTRA), Diploma in Pharmacy                    ','<p>Dr. Naveen Chauhan is a B.A.M.S. and has received extensive training in Ayurveda Surgery under Prof. Kulwant Singh from Jammu and received his post-graduate certificate (C.R.A.V.) from the National Academy of Ayurveda, New Delhi in Kshara sutra specialization. &nbsp;He is Founder-Director of SHRI DHANWANTRI CLINIC, GHAZIABAD</p>','1634625696_cProfileUntitled.png','Dr. Naveen Chauhan','2021-10-19 06:41:36',NULL,1),
(47,'Dr. Sanjay Jhakar','Central Core Committee','President','<p>&nbsp;</p>','1638956245_cProfile.png','','2021-10-26 08:02:48',0,2),
(49,'Dr. Aashish Pal','Madhya Pradesh State Convener',NULL,'<p>&nbsp;</p>','1638956772_cProfile.png','','2021-10-26 08:04:21',1,1),
(53,'Dr. Akshay Chauhan','International Core Committee','Secretary','<p>Vaidya Akshay Chauhan is a renowned 2nd generation Vaidya in Ayurveda Field. Running a ayurvedic hospital in Noida, (U.P) &nbsp;Expert Practice of Ayurvedic Surgery like Raktamokshan and Agnikarma.</p>','1635413911_cProfileUntitled.png','Vaidya Akshay Chauhan','2021-10-28 09:38:30',NULL,2),
(54,'Mr. Mohit Sardana','Pharma Committee','President ','<p>A small towner with dreams encompassing the world. Mohit Sardana, born in an industrialist family, he knew his forte right from his graduation days. Entrepreneurship!</p><p>A qualified engineer, a magnetic Speaker with strong scholastic skills, the zeal towards his work was evident from his early days on. The accolades he has harvested need no introduction. His name is a synonym to Direct Selling Industry in India; while Exports, Textiles, Healthcare, Food and Home Lifestyle are his other areas of Business pursuits.</p><p>Gurusharnam Agro Foods Pvt Ltd - a Government recognized Export House in Karnal, listed in the green channel list of FDA, United States of America, marks his profound endeavor in the food sector. A published author, his book “Wagon to Riches “armed the youth with witty tools about Network Marketing business in 2005.</p><p>The Founder member of FDSA (Federation of Direct Selling Association) INDIA, Co-Chairman, Direct Selling Committee, FICCI, President: Pharma Committee ( Ayurvedic Federation of India ), Mohit holds many such important positions in the industry bodies.</p><p>Founder of SWADHARMA - a Direct Selling Company, he envisions to engulf the country in a wave of wellness about health, digital marketing and leading a caravan of budding entrepreneurs; self-reliant and successful who further create work for more.</p><p>His mission is manifold; believing in the authenticity of Ayurveda and to bring awareness towards health and mind, about which he has ventured into manufacturing nutraceuticals and body care essentials; \' ASLI AYURVEDA Wellness Pvt. Ltd`.</p><p>An inborn patriot, learning from the ancient wisdom, Mohit wants to see India as he read in his school textbooks: The Glorious BHARAT’ “. To this end, being an ardent seeker, he delves into the archaic culture and lends all his might in the upsurge of awareness about the country’s rich heritage. Countless Seminars and Public Programs where he has interacted with millions of young minds about the long-forgotten traditions and he calls it \'let’s rebuild Bharat’.</p><p>As he says, “youth is the architect of tomorrow\", he inspires budding businesses by leading examples. A sought-after dialogist and acknowledged by mighty media houses like India Today, Headlines Today, Business Standard, The Economic Times, Mohit Sardana is always gung ho about stretching his limits.</p><p>An adherent of Yoga and laved in the GRACE of his MASTER,” SADHGURU JaggiVasudevji “, Mohit Sardana is a fountain of energy. Spiritual growth being his paramount priority, ‘mindful’, be the adjective to his name.</p>','1638963188_cProfile.jpeg','Mr. Mohit Sardana','2021-12-08 08:52:29',NULL,1),
(55,'Santosh Dhiman','Pharma Committee','Vice President','<p>Mrs. Santosh Dhiman is the Promotor of Aushadhratnam Naturals Private Limited.&nbsp; She has done her M.Sc., M.Phil &nbsp; in Microbiology &amp; Environmental Biotechnology from School of Science, Gujarat University (India). She has a good experience as a microbiologist in Pharma sector. She has also done her B.Ed. from ICFAI University, Hyderabad and has 16+ Yrs. experience in multiple administrative roles Education Sector. She has been also involved in organizing various Community Engagement programs for Health.</p>','1638953128_cProfileSantosh Dhiman.png','Santosh Dhiman','2021-12-08 08:45:27',NULL,2),
(56,'Mr. Adeeb Shah','Pharma Committee','General Secretary','<p>Mr. Adeeb has been very closely associated with Ayurveda, Nutraceuticals, and Herbal Cosmetics for more than six years. He is an experienced ayurvedic and cosmetics expert with a demonstrated history of working with multiple brands and medical practitioners. Has an exceptional understanding of brand and product development and is skilled in manufacturing ayurvedic medicines and formulations.</p><p>He has studied English Literature and has worked with two of the world\'s best companies, Google and Amazon. He has also been the Chief Business Officer with AarogyaVatika (India\'s one of the leading Ayurveda brands), where he handled more than 500 ayurvedic retail outlets PAN India.&nbsp;&nbsp;&nbsp;</p><p>Mr. Adeeb Shah started Araiya Wellness in 2020, which manufactures all types of ayurvedic medicines and herbal cosmetics for multiple brands. He has a deep understanding of the Ayurveda market both inside and outside of India. With export in Nepal, Japan, Singapore, Africa, and Europe, he has been taking Ayurveda and its power to various countries and aims to have a presence in more than 120 countries by the end of 2025.</p>','1638953320_cProfileAdeeb.png','Adeeb','2021-12-08 08:48:39',NULL,3),
(57,'Dr. Shishir Kant Shukla','Chhattisgarh State Convener',NULL,'<p>&nbsp;</p>','1638956639_cProfileDr.Shishir Kant Shukla.png','Dr. Shishir Kant Shukla','2021-12-08 09:43:59',1,3),
(61,'Dr.Harnendra Singh Bhadouria','Students. Committee','Vice President','<p>Vice President</p>','1642757889_cProfile714583640.jpg','','2022-01-21 09:38:09',NULL,2),
(63,'Dr. Vinay Kumar','Students\r\n Committee','Secretary (Nepal)','<p>Secretary (Nepal)</p>','1642758172_cProfile714583640.jpg','','2022-01-21 09:42:52',NULL,5),
(64,'Sambhav Jain','Students Committee','Secretary West (Maharashtra)','<p>Secretary West (Maharashtra)</p>','1642758281_cProfile714583640.jpg','','2022-01-21 09:44:41',NULL,6),
(65,'Dr. Kuldeep Raj','NHM And Gov Employee Committee','President','<p>President</p>','1642758393_cProfile714583640.jpg','','2022-01-21 09:46:32',NULL,1),
(67,'Dr. Sachin Aru','Clinic and Hospital Committee','BAMS MD Post Graduate Diploma in Nano Bio Medicine Technology   ','<p>President</p>','1687259037_cProfile.jpeg','','2022-01-21 10:04:24',NULL,1),
(68,'Shadab Ali siddiqui','Students Committee','General Secretary ','<p>&nbsp;</p>','1687259289_cProfileWhatsApp Image 2023-05-31 at 13.30.47.jpeg','','2023-06-20 11:08:09',NULL,3),
(70,'Dr. Animesh Mohan','Clinic and Hospital Committee','General Secretary','<p>General description - &nbsp;Dr Animesh Mohan, is Director and Panchakarma Specialist at Kayabandhu Multi Specialty Ayurveda Hospital, Bareilly and Assistant Professor and Consultant at Dhanvantari Ayurveda Medical College and Hospital, Bareilly. He is also the founder of Dr Animesh’s Ayurveda Solutions. &nbsp; In his post-graduation he has been awarded Gold medal by Rajeev Gandhi &nbsp;obtained Diploma in Yoga, a Certificate course in Healthcare Management, and a Certificate course in Yogic practices from BHU, Varanasi.</p>','1633965391_cProfileAnimesh Mohan.png','Animesh Mohan','2021-10-11 15:16:30',NULL,2),
(71,'Dr. Anu Bhardwaj','Academic and Event Committee','President','','1707298596_cProfileOMUNMN1 [Converted]-02.jpg','','2024-02-07 09:36:36',NULL,1),
(72,'Dr. Shambhu P. Patel','Academic and Event Committee','BAMS, MD (Ayu.)','<p>Dr. Shambhu P. Patel is presently working as Assist. Professor in the Department of Dravyaguna at Vivek College of Ayurvedic Sciences &amp; Hospital, Bijnor, Uttar Pradesh. His academic qualifications are B.A.M.S from Govt. Ayurvedic Medical &amp; Hospital, Jabalpur Madhya Pradesh. And Post-Graduation from R. D. Memorial Ayurvedic College &amp; Hospital, Bhopal, Madhya Pradesh.&nbsp;</p>','1713440378_cProfile.jpeg','Sambhu P. Patel','2021-10-11 15:23:56',NULL,2),
(73,'Dr. Yash Chaudhary','Academic and Event Committee','Secretary','','1707298674_cProfileOMUNMN1 [Converted]-02.jpg','','2024-02-07 09:37:54',NULL,1),
(74,'Dr. Indrasan Prajapati','Student Committee','Senior Vice President','','1707298789_cProfileOMUNMN1 [Converted]-02.jpg','','2024-02-07 09:39:48',NULL,1),
(75,'Dr. Bhawana Bhatt','Student Committee','BAMS','','1707298825_cProfileOMUNMN1 [Converted]-01.jpg','','2024-02-07 09:40:25',NULL,1),
(76,'Dr. Puneet Mittal','Research Committee','President','','1707304156_cProfilePuneet Mittal.png','','2024-02-07 11:09:16',NULL,1),
(77,'Dr. Shambhu P Patel','Agnivesh International Journal of Ayurveda and Research','BAMS, MD (Ayu.)','<p>Dr. Shambhu P. Patel is presently working as Assist. Professor in the Department of Dravyaguna at Vivek College of Ayurvedic Sciences &amp; Hospital, Bijnor, Uttar Pradesh. His academic qualifications are B.A.M.S from Govt. Ayurvedic Medical &amp; Hospital, Jabalpur Madhya Pradesh. And Post-Graduation from R. D. Memorial Ayurvedic College &amp; Hospital, Bhopal, Madhya Pradesh.&nbsp;</p>','1713440100_cProfile.jpeg','','2024-02-07 11:11:23',NULL,1),
(78,'Dr. Anuj Jain',']','Founding Team Member','<p>He is an ayurved and panchkarm consultant1.</p><p>He is treating cardiac and kidney failure patients,</p><p>He is a director of shree vishwadhyas ayurved and panchkarm chikitsalay,</p><p>He has been treating critical patients through ayurved and is a popular speaker of emergency treatment in ayurved ,he is delivered more than 100 lectures in seminars and workshops across india .&nbsp;</p>','1628680477_cProfile.png','','2021-08-11 11:14:37',NULL,6),
(79,'Dr. Dhanvantri Tyagi','Central Core Committee','Founder','<p><strong>Designation- General Secretary Of AFI</strong></p><p>Bams (m.d university rohtak)</p><p>M.s (general surgery) Ay (kanpur university)</p><p>Managing director- Dhanvantri Ayurveda multispecialty clinic , Hapur, Uttar pradesh</p><p>Executive director- Ayucare ayurveda multispecialty hospital meerut, uttar pradesh</p>','1631249258_cProfile.jpg','','2021-08-11 11:15:38',NULL,7),
(80,'Ayurvedacharya  Dr. Abhishek ',']','Founder','<p><strong>Designation- Founder Of AFI</strong></p><p>He is an ayurved and panchkarm consultant,</p><p>He is treating cardiac and kidney failure patients</p><p>He is a director of shreevishwadhyasayurved and panchkarmchikitsalay,</p><p>He has been treating critical patients through ayurved and is a popular speaker of emergency treatment in ayurved ,he is delivered more than 100 lectures in seminars and workshops across india .</p>','1628680407_cProfile.png','','2021-08-11 11:13:26',NULL,1),
(84,'Dr.Pavan Singh Sekhawat','Media & Oragnaization Secretary',NULL,'<p><strong>Designation</strong>-<strong>Media &amp; Oragnaization Secretary ; Chief Editor Swawthya Sandesh Patrika&nbsp;</strong></p><p>&nbsp;</p><p>&nbsp;Dr.Pavan Singh Shekhawat from Alwar Rajasthan, Ayurveda graduate from Shri Prashurampuria Ayurved Mahavidyalaya Sikar, Rajasthan.,</p>','1631251868_cProfile.jpg','','2021-08-11 11:16:46',NULL,7),
(104,'Dr. Harish Rushi','Central Patron Committee','','<p>Practing since last 23 years at Rushi Hospital (Ayurved and panchakarm centre) Aundha Nagnath, Dist Hingoli.\r\n- Do organic farming.\r\n- Trying to reach more people with the help of Internet through social media and online consulting \r\nWorked as active member of NIMA organization, Ayurved vyaspith, Maharashtra Ayurved sammelan, Secretory of Doctors association Aundha Nagnath since more than 15 years </p>','1707291704PDF.jpg','','2021-08-11 11:13:26',NULL,1),
(105,'Dr. Neha Singh','Student Committee','Secretary','<p>Dr. Neha Singh • Holistic Ayurveda Doctor • Founder -Maanya Ayurvedam • Content Writer at Saatvik Suddhi Ayurlife Pvt. Ltd. &nbsp;• BAMS graduate from Ishan Ayurvedic Medical College And Research Centre, Batch-2018 •Empowering health through ancient wisdomDr. Neha Singh• Holistic Ayurveda Doctor• Founder -Maanya Ayurvedam• Content Writer at Saatvik Suddhi Ayurlife Pvt. Ltd. • BAMS graduate from Ishan Ayurvedic Medical College And Research Centre, Batch-2018•Empowering health through ancient wisdom</p>','1725700475_cProfile.jpg','View More','2024-02-07 09:40:25',NULL,1),
(106,'Dr. Nikhat Sheikh ','Student Committee','Secretary','','1707298825_cProfileOMUNMN1 [Converted]-01.jpg','','2024-02-07 09:40:25',NULL,1),
(107,'Dr. Ankur Tanwar','Research Committee','Gen Sec','','1707291704PDF.jpg','','2024-02-07 11:09:16',NULL,1),
(108,'Dr. B.S. Gujjarbar','Ayurvedic Surgeons Committee','Sr. Vice President','<p></p>','1707291704PDF.jpg','','2021-10-19 06:41:36',NULL,1),
(109,'Dr. Vandana ','Agnivesh International Journal of Ayurveda and Research','','<p>&nbsp;</p>','1707291704PDF.jpg','','2024-02-07 11:11:23',NULL,1),
(110,'Dr. Ankur Tanwar','Agnivesh International Journal of Ayurveda and Research','Gen Sec','<p>&nbsp;</p>','1707291704PDF.jpg','','2024-02-07 11:11:23',NULL,1),
(111,'Dr. Bhawana Mehra ','Agnivesh International Journal of Ayurveda and Research','','<p>&nbsp;</p>','1707291704PDF.jpg','','2024-02-07 11:11:23',NULL,1),
(112,'Dr. Manish Gautam','Central Core Committee','BAMS','<p><strong>. Educational Background</strong></p><ul><li><strong>Degree</strong>: BAMS</li><li><strong>University/College</strong>: SRM Govt Ayurvedic College, Bareilly</li><li><strong>Year of Graduation</strong>: 2023</li><li><strong>Additional Certifications</strong>:&nbsp; &nbsp; 1. <strong>Certification in Ayurveda Guru</strong></li></ul><p>o&nbsp;&nbsp; <strong>2. Certification in Neuro-Panchakarma Therapy</strong></p><p>o&nbsp;&nbsp; <strong>3. Certification in Agni karma &amp; Viddha karma</strong></p><p><strong>4. Professional Experience</strong></p><ul><li><strong>Current Position</strong>: Founder of Ayushsparsh, Ayurvedic Expert at Sabka Vaidya Smart Clinics,</li><li><strong>Years of Experience</strong>: 3 Years</li><li><strong>Specialization</strong>: Dermatology and Venereal Diseases, Sexual problems, Joints and Pain Problems</li><li><strong>Past Positions</strong>:&nbsp;</li></ul><p><strong>5. Professional Memberships</strong></p><ul><li><strong>Associations</strong>: Lifetime Member of&nbsp; Ayurveda Federation of India</li><li><strong>Roles in Organizations</strong>: Secretary General of Ayurveda Federation of India</li></ul><p><strong>6. Awards</strong></p><ul><li><strong>Madhav Award </strong>Honored for outstanding contributions to Ayurvedic practice and innovation.</li><li><strong>Youth Vaidya Icon Award </strong>Recognized as a leading young practitioner for exemplary service and commitment to Ayurveda.</li></ul><p><strong>7. Published Work &amp; Research</strong></p><p><strong>Research Papers</strong>: ·&nbsp;&nbsp;&nbsp;</p><ul><li><strong>The Role of Ayurveda in Managing Chronic Diseases” </strong><i>Agnivesh International Journal of Ayurveda &amp; Research, 2024.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Innovative Approaches in Panchakarma Therapy” </strong><i>International Journal of Ayurveda Research, 2023.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Ayurveda and Modern Healthcare” </strong><i>Agnivesh International Journal of Ayurveda &amp; Research, 2023.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Pathological &amp; Diagnosis in Ayurveda” </strong><i>Journal of Ayurveda Research: AYUSHYA National Journal, 2020.</i></li><li>· &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>“The Concept of Public Health in Ayurveda” </strong><i>National Seminar on Ayurveda (the renaissance – 2019)</i></li></ul><p>&nbsp;</p><ul><li><strong>Books Authored</strong>:&nbsp;</li><li><strong>Lectures &amp; Presentations</strong>:</li></ul><p><strong>8. Areas of Expertise</strong></p><ul><li><strong>Therapies</strong>: Agnikarma, Viddha Karma, Cupping Therapy, Marma Therapy,&nbsp;Panchakarma, chiropractic&nbsp;</li><li><strong>Conditions Treated</strong>: Chronic pain, skin disorders, Joint Disorders, Migrain, Moles, Corns removal, Pain management etc.</li></ul><p><strong>9. Patient Testimonials (if available)</strong></p><ul><li><strong>Feedback from Patients</strong>: <i>Dr. Manish Gautam’s Ayurvedic treatments have transformed my life. After years of struggling with joint pain, his personalized care brought me relief that I hadn’t experienced with any other treatment.\"</i></li><li><i>\"I am so grateful to Dr. Gautam for his expertise and compassion. His holistic approach helped me overcome my chronic digestive issues, and I feel healthier than ever.\"</i></li><li><i>\"Dr. Gautam’s deep knowledge of Ayurveda and his caring nature made all the difference in my recovery. I highly recommend him to anyone seeking a natural and effective path to wellness.\"</i></li><li><i>\"Thanks to Dr. Manish Gautam, my migraines are finally under control. His treatments are truly a gift, and I am forever thankful.\"</i></li></ul><p><strong>10. Additional Information</strong></p><ul><li><strong>Mission Statement</strong>: Dr. Manish Gautam\'s mission is to bring the ancient wisdom of Ayurveda into everyday life, making it accessible and helpful for everyone. He is committed to providing personalized care that treats the root causes of health issues, promoting long-term wellness. Dr. Gautam also strives to educate and empower people to take charge of their health, while guiding the next generation of Ayurvedic practitioners. His goal is to help people live healthier, happier lives through the natural and holistic principles of Ayurveda.</li><li><strong>Availability</strong>: 4 PM - 10 PM ( Monday to Saturday)</li><li><strong>Languages Spoken</strong>: Hindi, English</li></ul>','ManishGautam.png','','2021-08-11 11:15:38',NULL,7),
(113,'Dr. A. Saha','Central Core Committee','National Sec','<p></p>','1707291704PDF.jpg','','2021-08-11 11:15:38',NULL,7),
(114,'Dr. Ram Nivash Sharma','Central Core Committee','National Secretary ','<p>&nbsp;</p>','1638956980_cProfile.png','','2021-10-26 08:04:21',0,5),
(115,'Dr. Naresh Garg','Central Core Committee','National Secretary ','<p>Dr. Naresh Kumar Garg is BAMS , MD He is expert in NADI PARIKSHAN , PANCHKARMA , LEECH THERAPY &amp; SUVARNAPRASHAN &nbsp; He has completed his UG from NIA collage and He did MD in &nbsp; Department of Dravyaguna from &nbsp;Rajasthan Ayurveda University, Udaipur &nbsp;.You can consult him at &nbsp;Yatharth Ayurved &amp; Panchkarma centre, Murlipura Scheme, Jaipur.</p>','1713440141_cProfile.jpeg','','2021-09-10 05:21:57',NULL,5),
(116,'Dr. Neeten Vashishtha','Central Core Committee','National Sec','<p></p>','1707291704PDF.jpg','','2021-08-11 11:15:38',NULL,7),
(117,'Dr. Harendra Bhadoria ','Central Core Committee','National Coordinator','<p></p>','1707291704PDF.jpg','','2021-08-11 11:15:38',NULL,7),
(118,'Dr. Pavan Singh Shekhawat','Central Core Committee','BAMS','<p>&nbsp;</p>','1638955912_cProfile.png','','2021-10-26 08:06:00',0,1),
(119,'Dr. Pawan Shekhawat','Rajasthan State Convener','BAMS','<p>Clinical Experience - 15 years\n\nSenior medical officer \nGovt ayurveda department, alwar rajasthan.\n\nIn the last 10 years, many health awareness camps, medical camps, Ayurvedic workshops have been organized for public awareness and to connect the common people with Ayurveda and also by continuously working in the field of planting of medicinal plants to provide information to the common people about their importance and use.\n</p>','1638955912_cProfile.png','Dr. Pawan Shekhawat','2021-12-08 09:43:59',1,3),
(120,'Dr. Shadab ','Uttarakhand State Convener',NULL,'<p>&nbsp;</p>','1707291704PDF.jpg','Dr. Shadab Ali siddiqui','2021-12-08 09:43:59',1,3),
(121,'Dr. A. Saha','West Bengal State Convener','National Sec','<p>&nbsp;</p>','1707291704PDF.jpg','Dr. A. Saha','2021-12-08 09:43:59',1,3),
(122,'Dr. Rajiv gaur ','Haryana State Convener',NULL,'<p>&nbsp;</p>','1639977385_cProfile.jpeg','Dr. Rajiv gaur','2021-12-08 09:43:59',1,3),
(123,'Dr. Manish Gautam','Central Committee','BAMS','<p><strong>. Educational Background</strong></p><ul><li><strong>Degree</strong>: BAMS</li><li><strong>University/College</strong>: SRM Govt Ayurvedic College, Bareilly</li><li><strong>Year of Graduation</strong>: 2023</li><li><strong>Additional Certifications</strong>:&nbsp; &nbsp; 1. <strong>Certification in Ayurveda Guru</strong></li></ul><p>o&nbsp;&nbsp; <strong>2. Certification in Neuro-Panchakarma Therapy</strong></p><p>o&nbsp;&nbsp; <strong>3. Certification in Agni karma &amp; Viddha karma</strong></p><p><strong>4. Professional Experience</strong></p><ul><li><strong>Current Position</strong>: Founder of Ayushsparsh, Ayurvedic Expert at Sabka Vaidya Smart Clinics,</li><li><strong>Years of Experience</strong>: 3 Years</li><li><strong>Specialization</strong>: Dermatology and Venereal Diseases, Sexual problems, Joints and Pain Problems</li><li><strong>Past Positions</strong>:&nbsp;</li></ul><p><strong>5. Professional Memberships</strong></p><ul><li><strong>Associations</strong>: Lifetime Member of&nbsp; Ayurveda Federation of India</li><li><strong>Roles in Organizations</strong>: Secretary General of Ayurveda Federation of India</li></ul><p><strong>6. Awards</strong></p><ul><li><strong>Madhav Award </strong>Honored for outstanding contributions to Ayurvedic practice and innovation.</li><li><strong>Youth Vaidya Icon Award </strong>Recognized as a leading young practitioner for exemplary service and commitment to Ayurveda.</li></ul><p><strong>7. Published Work &amp; Research</strong></p><p><strong>Research Papers</strong>: ·&nbsp;&nbsp;&nbsp;</p><ul><li><strong>The Role of Ayurveda in Managing Chronic Diseases” </strong><i>Agnivesh International Journal of Ayurveda &amp; Research, 2024.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Innovative Approaches in Panchakarma Therapy” </strong><i>International Journal of Ayurveda Research, 2023.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Ayurveda and Modern Healthcare” </strong><i>Agnivesh International Journal of Ayurveda &amp; Research, 2023.</i></li><li>· &nbsp; &nbsp; &nbsp; <strong>“Pathological &amp; Diagnosis in Ayurveda” </strong><i>Journal of Ayurveda Research: AYUSHYA National Journal, 2020.</i></li><li>· &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>“The Concept of Public Health in Ayurveda” </strong><i>National Seminar on Ayurveda (the renaissance – 2019)</i></li></ul><p>&nbsp;</p><ul><li><strong>Books Authored</strong>:&nbsp;</li><li><strong>Lectures &amp; Presentations</strong>:</li></ul><p><strong>8. Areas of Expertise</strong></p><ul><li><strong>Therapies</strong>: Agnikarma, Viddha Karma, Cupping Therapy, Marma Therapy,&nbsp;Panchakarma, chiropractic&nbsp;</li><li><strong>Conditions Treated</strong>: Chronic pain, skin disorders, Joint Disorders, Migrain, Moles, Corns removal, Pain management etc.</li></ul><p><strong>9. Patient Testimonials (if available)</strong></p><ul><li><strong>Feedback from Patients</strong>: <i>Dr. Manish Gautam’s Ayurvedic treatments have transformed my life. After years of struggling with joint pain, his personalized care brought me relief that I hadn’t experienced with any other treatment.\"</i></li><li><i>\"I am so grateful to Dr. Gautam for his expertise and compassion. His holistic approach helped me overcome my chronic digestive issues, and I feel healthier than ever.\"</i></li><li><i>\"Dr. Gautam’s deep knowledge of Ayurveda and his caring nature made all the difference in my recovery. I highly recommend him to anyone seeking a natural and effective path to wellness.\"</i></li><li><i>\"Thanks to Dr. Manish Gautam, my migraines are finally under control. His treatments are truly a gift, and I am forever thankful.\"</i></li></ul><p><strong>10. Additional Information</strong></p><ul><li><strong>Mission Statement</strong>: Dr. Manish Gautam\'s mission is to bring the ancient wisdom of Ayurveda into everyday life, making it accessible and helpful for everyone. He is committed to providing personalized care that treats the root causes of health issues, promoting long-term wellness. Dr. Gautam also strives to educate and empower people to take charge of their health, while guiding the next generation of Ayurvedic practitioners. His goal is to help people live healthier, happier lives through the natural and holistic principles of Ayurveda.</li><li><strong>Availability</strong>: 4 PM - 10 PM ( Monday to Saturday)</li><li><strong>Languages Spoken</strong>: Hindi, English</li></ul>','ManishGautam.png','','2024-02-07 09:37:54',NULL,1),
(124,'Dr. Bhairav Kulkarni','Maharashtra State Convener','General Secretary','<p>Professor & HOD, Kayachikitsa Department\nDr. Vedprakash Patil Ayurvedic Medical College and Research Institute, Jalna\nDirector, Shree Siddhivinayak Ayurved Panchakarma Center,\nChhatrapati Sambhajinagar (Aurangabad) - 431005\nemail id - dr.bhairavkulkarni@gmail.com\nwww.shreesiddhidhiyayurveda.in\nMob No. 919967282076\n</p>','1633961873_cProfileBhairav B. Kulkarni.png','','2021-12-08 09:43:59',1,3);
/*!40000 ALTER TABLE `tbl_core_committee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course` (
  `course_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) DEFAULT NULL,
  `course_duration` varchar(255) DEFAULT NULL,
  `course_details` longtext DEFAULT NULL,
  `course_fee` varchar(255) DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL,
  `course_type` varchar(11) DEFAULT NULL COMMENT '1 for public 2 for doctor 3 for both',
  `member_cost` varchar(11) DEFAULT NULL,
  `if_enable` int(11) NOT NULL DEFAULT 1 COMMENT '1 cource is enable 0 disable',
  PRIMARY KEY (`course_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course`
--

LOCK TABLES `tbl_course` WRITE;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
INSERT INTO `tbl_course` VALUES
(6,'Online Course in Ayurveda ','21-Mar-2022 To 15-May-2022','<p>यह ऑनलाइन कोर्स सामान्य जनमानस के लिए चलाया जा रहा हैं, इसका प्रमुख लक्ष्य जन-जन को आयुर्वेद के माध्यम से स्वस्थ रहने के सिद्धांत बताना व आयुर्वेद के ऐसे स्वयंसेवक तैयार करना है जो आयुर्वेद के ज्ञान को अन्यों तक पहुँचाकर संपूर्ण विश्व को स्वास्थ्य रक्षा का सन्देश दे सकें! इस कोर्स के अंतर्गत आयुर्वेद का सामान्य परिचय, विशेषताएं, सिद्धांत, चिकित्सा का महत्व, शारीरिक-मानसिक दोष, आहार, ऋतुचर्या, जड़ी-बूटियों की खेती, आयुर्वेद फार्मेसी को आरम्भ करने की जानकारी, आयुर्वेद औषध निर्माण की विभिन्न प्रक्रियाओं आदि की जानकारी प्रदान की जाएगी।&nbsp;</p><p><strong>इस पाठ्यक्रम में स्नातक (ग्रेजुएट) और उससे ऊपर के लोग हिस्सा ले सकते हैं!&nbsp;</strong></p>','4000','1646810650PDF.pdf','1','4000',0),
(8,'Onilne Course in Ayurveda ','12- 14 February 2022 ','<p>Anatomy of Eye</p><p>Physiology of Eye</p><p>Ayurvedic Concept about Eye</p><p>Role of Ophthalmology in Ayurveda Practice</p><p>Common Eye Diseases</p><p><strong>For Any &nbsp;Information/Query Please Contact at 8595336710&nbsp;</strong></p>','1000','1643534612PDF.jpg','2','500',0),
(9,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>&nbsp;</p><p>&nbsp;</p>','8000','1686634628PDF.pdf','2','6000',0),
(10,'','','<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>','','1682410696PDF.jpg','3','',0),
(11,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>The primary objective of the course is to cultivate exceptional speakers and clinical practitioners who understand the new age techniques in the field of Ayurveda nationwide. With the aim of fostering a skilled workforce for the Ayurveda industry, AFI organizes comprehensive online courses in Ayurveda Healthcare. AFI has meticulously crafted a three-month online course under the guidance of various Ayurveda experts to empower and enrich Ayurveda practitioners across the country.</p><p>पाठ्यक्रम का प्राथमिक उद्देश्य देश भर में आयुर्वेद के क्षेत्र में शानदार वक्ताओं और नए दौर की तकनीकों को समझने वाले चिकित्सकों को तैयार करना है। आयुर्वेद जगत के लिए कुशल कार्यबल को बढ़ावा देने के उद्देश्य से ए.एफ.आई. आयुर्वेद हेल्थकेयर में व्यापक ऑनलाइन पाठ्यक्रम आयोजित करता है। ए.एफ.आई. ने देश भर के आयुर्वेद चिकित्सकों को सशक्त और समृद्ध बनाने के लिए आयुर्वेद के विभिन्न विशेषज्ञों के मार्गदर्शन में तीन महीने का ऑनलाइन पाठ्यक्रम तैयार किया है।</p>','8000','1686240096PDF.pdf','2','6000',0),
(12,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>The primary objective of the course is to cultivate exceptional speakers and clinical practitioners who understand the new age techniques in the field of Ayurveda nationwide. With the aim of fostering a skilled workforce for the Ayurveda industry, AFI organizes comprehensive online courses in Ayurveda Healthcare. AFI has meticulously crafted a three-month online course under the guidance of various Ayurveda experts to empower and enrich Ayurveda practitioners across the country.</p><p>पाठ्यक्रम का प्राथमिक उद्देश्य देश भर में आयुर्वेद के क्षेत्र में शानदार वक्ताओं और नए दौर की तकनीकों को समझने वाले चिकित्सकों को तैयार करना है। आयुर्वेद जगत के लिए कुशल कार्यबल को बढ़ावा देने के उद्देश्य से ए.एफ.आई. आयुर्वेद हेल्थकेयर में व्यापक ऑनलाइन पाठ्यक्रम आयोजित करता है। ए.एफ.आई. ने देश भर के आयुर्वेद चिकित्सकों को सशक्त और समृद्ध बनाने के लिए आयुर्वेद के विभिन्न विशेषज्ञों के मार्गदर्शन में तीन महीने का ऑनलाइन पाठ्यक्रम तैयार किया है।</p>','8000','1686240149PDF.pdf','2','6000',0),
(13,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p><strong>Certificate Course in Ayurveda&nbsp;</strong></p><p>(Online Fellowship program in Ayurveda)&nbsp;</p>','8000','1686634862PDF.pdf','2','6000',0),
(14,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p><strong>Certificate Course in Ayurveda&nbsp;</strong></p><p>(Online Fellowship program in Ayurveda)&nbsp;</p>','8000','1686240288PDF.pdf','2','6000',0),
(15,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p><strong>Certificate Course in Ayurveda&nbsp;</strong></p><p>(Online Fellowship program in Ayurveda)&nbsp;</p>','8000','1686240333PDF.pdf','1','4000',0),
(16,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>&nbsp;</p>','6000','1686286428PDF.pdf','2','8000',0),
(17,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>&nbsp;</p>','6000','1686286477PDF.pdf','2','8000',0),
(18,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>&nbsp;</p>','6000','1686286480PDF.pdf','2','8000',0),
(19,'Fellowship program in Ayurveda (Ayurveda Guru)','3 months ','<p>&nbsp;</p>','8000','1686286561PDF.pdf','2','6000',1),
(20,'Health Ambassador Demo Session','2 hours','<p>&nbsp;</p>','1000','1713255137PDF.png','1','500',1),
(21,'Upgrade Your Medical Practices','10 Days','<p>&nbsp;</p>','5100',NULL,'3',NULL,1);
/*!40000 ALTER TABLE `tbl_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_doctor_info`
--

DROP TABLE IF EXISTS `tbl_doctor_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_doctor_info` (
  `doctor_info_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0 For Dr. 1 For Achivment',
  `pdf_file` varchar(255) DEFAULT NULL,
  `pdf_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `upload_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `doctorType` int(11) DEFAULT NULL COMMENT '1 for state 2 for central',
  `state_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doctor_info_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_doctor_info`
--

LOCK TABLES `tbl_doctor_info` WRITE;
/*!40000 ALTER TABLE `tbl_doctor_info` DISABLE KEYS */;
INSERT INTO `tbl_doctor_info` VALUES
(40,1,'1707306592PDF.','1707306592_pdfPre.png','आयुर्वेद फेडरेशन ऑफ़ इंडिया की हरियाणा कमिटी द्वारा हरियाणा में राष्ट्रीय स्वास्थ मिशन (एन . एच. एम) भर्ती में न्याय मिला','<p>आयुर्वेद फेडरेशन ऑफ़ इंडिया की हरियाणा कमिटी द्वारा हरियाणा में राष्ट्रीय स्वास्थ मिशन (एन . एच. एम) भर्ती में न्याय मिला</p>','2022-01-24 12:13:10',1,''),
(41,0,'1643026923PDF.pdf','1643026923_pdfPre.jpg','List of Ayurveda Colleges in Uttarakhand under Uttarakhand Ayurveda University','<p>&nbsp;</p>','2022-01-24 12:22:02',1,'Uttarakhand'),
(42,0,'1643028256PDF.pdf','1643028256_pdfPre.jpg','Ayurveda College in Rajasthan Affiliated with Dr. S.R. University ','<p>&nbsp;</p>','2022-01-24 12:44:16',1,'Rajasthan'),
(47,0,'1644916535PDF.pdf','1644916535_pdfPre.jpg','Ayurveda Doctors Working Under District Medical Officer Sonipat ','<p>&nbsp;</p>','2022-02-15 09:15:35',1,'Haryana'),
(48,0,'1644924985PDF.','1644924985_pdfPre.','Ayurveda Doctors Working Under District Medical Officer Rohtak','<p>&nbsp;</p>','2022-02-15 09:17:18',1,'Haryana'),
(49,0,'1644917522PDF.pdf','1644917522_pdfPre.jpg','Ayurveda Doctors Working With National Health Mission Haryana','<p>&nbsp;</p>','2022-02-15 09:32:02',1,'Haryana'),
(50,0,'1644922687PDF.pdf','1644922687_pdfPre.jpg','AYUSH Doctor Working Under Directorate of AYUSH Odisha ','<p>&nbsp;</p>','2022-02-15 10:58:06',1,'Odisha'),
(51,0,'1644923215PDF.pdf','1644923215_pdfPre.jpg','Ayurveda College in Odisha  ','<p>&nbsp;</p>','2022-02-15 11:06:54',1,'Odisha'),
(52,0,'1644923729PDF.pdf','1644923729_pdfPre.jpg','Ayurveda Doctor Working Under Directorate of AYUSH Delhi','<p>&nbsp;</p>','2022-02-15 11:15:29',1,'Delhi'),
(53,0,'1644924072PDF.pdf','1644924072_pdfPre.jpg','Ayurveda Doctor\'s Working under C.C.R.A.S. Patna ','<p>&nbsp;</p>','2022-02-15 11:21:11',2,''),
(54,0,'1644925289PDF.pdf','1644925289_pdfPre.jpg','District Wise List of Ayurveda Dispensaries ','<p>&nbsp;</p>','2022-02-15 11:41:28',1,'Odisha'),
(55,0,'1644926806PDF.pdf','1644926806_pdfPre.jpg','Hospital and Dispensaries Under Indian Medicine of System in Kerala','<p>&nbsp;</p>','2022-02-15 12:06:46',1,'Kerala'),
(56,0,'1644928219PDF.pdf','1644928219_pdfPre.jpg','List of Ayurveda Doctor, Dispensaries,  Working Under Directorate of AYUSH Delhi','<p>&nbsp;</p>','2022-02-15 12:30:18',1,'Delhi'),
(58,0,'1644997168PDF.pdf','1644997168_pdfPre.jpg','Ayurveda Doctors Working Under National Health Mission Himachal Pradesh ','<p>&nbsp;</p>','2022-02-16 07:27:26',1,'Himachal Pradesh'),
(59,0,'1644997215PDF.pdf','1644997215_pdfPre.jpg','AYUSH Hospital and Dispensaries Under Directorate of  Himachal Pradesh ','<p>&nbsp;</p>','2022-02-16 07:40:14',1,'Himachal Pradesh'),
(60,0,'1644997328PDF.pdf','1644997328_pdfPre.jpg','Ayurveda Doctors Registered with  Board of Ayurvedic and Unani System of Medicine Himachal Pradesh ','<p>&nbsp;</p>','2022-02-16 07:42:08',1,'Himachal Pradesh'),
(61,0,'1644999304PDF.pdf','1644999304_pdfPre.jpg','Ayurveda Doctor Gujrat Board of Ayurvedic & Unani System of Medicine Gujrat ','<p>&nbsp;</p>','2022-02-16 08:15:03',1,'Gujarat'),
(62,0,'1645014110PDF.pdf','1645014110_pdfPre.jpg','Ayurveda Doctor Registered with Board of Ayurvedic And Unani System of Medicine  ','<p>&nbsp;</p>','2022-02-16 12:21:50',1,'Haryana'),
(63,0,'1645014280PDF.pdf','1645014280_pdfPre.jpg','Ayurveda Doctor Registered Madhya Pradesh Ayurveda, Unani & Naturopathy Board','<p>&nbsp;</p>','2022-02-16 12:24:40',1,'Madhya Pradesh'),
(64,0,'1645015945PDF.','1645015945_pdfPre.','Ayurveda Doctors and Dispensaries Working Under National Health Mission Andhra Pradesh ','<p>&nbsp;</p>','2022-02-16 12:38:14',1,'Andhra Pradesh'),
(65,0,'1645771462PDF.pdf','1645771462_pdfPre.jpg','Ayurveda Doctor\'s Working Under National Health Mission, Jammu & Kashmir','<p>&nbsp;</p>','2022-02-25 06:44:21',1,'Jammu and Kashmir'),
(66,0,'1645771883PDF.pdf','1645771883_pdfPre.jpg','Ayurveda Doctors Working Under NHM, NAM, Directorate of Ayush Manipur','<p>Ayurveda Doctors Working Under NHM, NAM, Directorate of Ayush Manipur</p>','2022-02-25 06:51:22',1,'Manipur'),
(67,0,'1645772415PDF.pdf','1645772415_pdfPre.jpg','Ayurveda Doctors Working Under Rajya Swasthy Samiti Bihar','<p>&nbsp;</p>','2022-02-25 07:00:14',1,'Bihar'),
(68,0,'1750926586PDF.','1750926586_pdfPre.jpg','आयुर्वेद फेडरेशन ऑफ़ इंडिया के प्रयासों से मध्य प्रदेश के 2500 से अधिक बी.ए. एम.एस. विद्यार्थियों को मिली राहत!','<p>आयुर्वेद फेडरेशन ऑफ़ इंडिया के प्रयासों से मध्य प्रदेश के 2500 से अधिक बी.ए. एम.एस. विद्यार्थियों को मिली राहत!</p>','2022-04-07 12:33:47',1,'');
/*!40000 ALTER TABLE `tbl_doctor_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_doctors_list`
--

DROP TABLE IF EXISTS `tbl_doctors_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_doctors_list` (
  `dr_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `dr_name` varchar(64) DEFAULT NULL,
  `dr_mobile_no` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`dr_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_doctors_list`
--

LOCK TABLES `tbl_doctors_list` WRITE;
/*!40000 ALTER TABLE `tbl_doctors_list` DISABLE KEYS */;
INSERT INTO `tbl_doctors_list` VALUES
(1,'Dr. Anand Kumar','9999138810');
/*!40000 ALTER TABLE `tbl_doctors_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_description` longtext NOT NULL,
  `event_thumbnail` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` VALUES
(1,'Sankalpam','<p> AFI host a National residential clinical workshop and CME program “Sankalpam” in collaboration with \"Ayushsparsh-Touches the Health\" brought together 500 Vaidyas from different cities across India.</p>','','2023-07-22','2023-07-23','Bareilly, Uttar Pradesh','2023-10-09 07:35:55','2023-10-09 07:35:55'),
(2,'Ayur Nirupan 2.0','<p>This National Seminar specially focusing on “Emergency Management through Ayurveda” held in Chandigarh by AFI in which more than 1500 Vaidyas participated from various cities.</p>','','2023-08-25','2023-08-25','Chandigarh','2023-10-09 09:07:34','2023-10-09 09:07:34'),
(3,'Chikitsha Seva Samman Samaroh','<p>This event was organized by AFI to felicitate Vaidyas for their exceptional work in the field of Ayurveda. AFI felicitated more than 100 Vaidyas by different types of awards.</p>','','2023-08-25','2023-08-25','Meerut, Uttar Pradesh','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(4,'Amrit Samagam','<p>AFI joined forces with \"Ayuransh\" to host a event named \'Amrit Samagam,\' which attracted participation from approximately 1,500 budding Vaidyas representing various cities in India.</p>','','2023-09-16','2023-09-17','Lucknow, Uttar Pradesh','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(5,'Indo Himalayan Expo','<p>AFI joins his hands with “Namo Gange” to host a event “Indo Himalayan Expo”. Approx. 2000+ Vaidyas participated in this from various parts of India.</p>','','2023-10-20','2023-10-22','Haridwar, Uttarakhand','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(6,'Health Checkup Camps','<p>AFI’s office bearers successfully organized 10+ Health checkup camps in different parts of India.\r\nIn 2023, AFI proudly organized significant online events:</p>\r\n<p><b>Ayurveda Guru</b>: A 90 days online program for Ayurveda doctors. We have done the 1st batch of “Ayurveda Guru” of 100 Vaidyas in October 2023.\r\n<br>\r\n<b>Live Weekly Webinars</b>: We have done lots of weekly online<br>\r\nwebinars and till now approx. 2000+ Vaidyas has successfully been a part of this.</p>','','2023-10-20','2023-10-22','Haridwar, Uttarakhand','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(7,'Proposed online events of Ayurveda Federation of India','<p><b>Proposed online events of Ayurveda Federation of India</b>\n\n(December 2023 — December 2024)<br>\n1.AFI are going to organize an online quiz for students called \"Ayurveda Arjuna\" with the aim of reaching 5000 students to create awareness and promote the ancient science of Ayurveda and will make 1st announcement on 26 January 2024.\n<br>\n2.We will organize online webinars on 115 health days for Ayurveda stakeholders and enthusiasts to enhance their knowledge and skills in the field of Ayurveda.\n<br>\n3.We are going to organize certified \'Ayurveda Ambassador\' courses to raise public awareness. The basic course is 7 days online and 1 day offline, and the advanced level course is 25 days online and 5 days offline.\n\n\n</p>','','2023-12-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(8,'30 Days Residential \"Ayurveda Guru\" Course — 50 seats.','<p>30 Days Residential \"Ayurveda Guru\" Course — 50 seats.\n</p>','','2023-12-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(9,'7 Days National Residential Program on Kayachikisa - 100 seats.','<p>7 Days National Residential Program on Kayachikisa - 100 seats.\r\n</p>','','2024-01-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(10,'3/5 Days Residential CME \"Procto-Con\" on Anorectal Disease — 100 seats.','<p>3/5 Days Residential CME \"Procto-Con\" on Anorectal Disease — 100 seats.\r\n</p>','','2024-02-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(11,'30 Days Residential “Ayurveda Guru” Course - 50 seats.\n','<p>30 Days Residential “Ayurveda Guru” Course - 50 seats.\r\n</p>','','2024-03-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(12,'3 Days Residential Seminar for 2000 Ayurveda students and Vaidyas at Bhopal.','<p>3 Days Residential Seminar for 2000 Ayurveda students and Vaidyas at Bhopal.\r\n</p>','','2024-04-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(13,'3/5 Days CME on “Pain Management through Ayurveda”- 100 seats.','<p>3/5 Days CME on “Pain Management through Ayurveda”- 100 seats.\r\n</p>','','2024-05-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(14,'3 Days Seminar for 1500 Ayurveda students and Vaidyas at Rishikesh.','<p>3 Days Seminar for 1500 Ayurveda students and Vaidyas at Rishikesh.\r\n</p>','','2024-06-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(15,'1\" July —3rd\" Foundation Day of Ayurveda Federation of India ','<p>1st\" July —3rd\" Foundation Day of Ayurveda Federation of India and “Chikitsha Seva Samman Samaroh” for 200 Vaidyas.\n</p>','','2024-07-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(16,'International Residential Program for Doctors in Singapore -100 seats.','<p>International Residential Program for Doctors in Singapore -100 seats.\r\n</p>','','2024-08-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(17,'30 Days Residential “Ayurveda Guru” Course - 50 seats.','<p>30 Days Residential “Ayurveda Guru” Course - 50 seats. \r\n</p>','','2024-09-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(18,'3 Days National Residential program in Ayodhya, Uttar Pradesh, for 2000 Ayurveda students and Vaidyas.','<p>3 Days National Residential program in Ayodhya, Uttar Pradesh, for 2000 Ayurveda students and Vaidyas. \r\n</p>','','2024-10-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(19,'Van Aushadhi Sambhasha” — 2 Days on Ground\nResidential Workshop at Himachal Pradesh.','<p>Van Aushadhi Sambhasha” — 2 Days on Ground\r\nResidential Workshop at Himachal Pradesh. \r\n</p>','','2024-11-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(20,'30 Days Residential “Ayurveda Guru” Course - 50 seats.','<p>30 Days Residential “Ayurveda Guru” Course - 50 seats. Apart from above mentioned events we will also conduct various\r\n\r\nonline and offline sessions for Ayurveda stakeholders and Public awareness. \r\n</p>','','2024-12-01','2024-12-04','','2023-09-03 09:07:34','2023-09-03 09:07:34'),
(23,'Hj','<p>Nn</p>','1734985749PDF.pHP','2024-12-24','2024-12-24','Bj','2024-12-23 20:29:09','2024-12-23 20:29:09');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_foundingteam`
--

DROP TABLE IF EXISTS `tbl_foundingteam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_foundingteam` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_title` varchar(255) NOT NULL,
  `t_designation` varchar(255) NOT NULL,
  `t_qual` varchar(255) NOT NULL,
  `t_desc` longtext NOT NULL,
  `t_shortdesc` mediumtext NOT NULL,
  `t_city` varchar(255) NOT NULL,
  `t_thumbnail` varchar(255) NOT NULL DEFAULT '1707291719PDF.jpg',
  `t_pdf` varchar(255) NOT NULL,
  `t_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_foundingteam`
--

LOCK TABLES `tbl_foundingteam` WRITE;
/*!40000 ALTER TABLE `tbl_foundingteam` DISABLE KEYS */;
INSERT INTO `tbl_foundingteam` VALUES
(1,'Ayurvedacharya Dr. Abhishek','Founder','Founder - AFI','PHA+QXl1cnZlZGFjaGFyeWEmbmJzcDtEci4gQWJoaXNoZWsgaGFzIG92ZXIgMTUgeWVhcnMgb2YgZGl2ZXJzZSBleHBlcmllbmNlIGluIHRoZSBBeXVydmVkYSBmaWVsZC4gSGF2aW5nIGV4Y2VwdGlvbmFsIGNvbW11bmljYXRpb24gc2tpbGxzIHRvIGxlYWQgYW5kIGludGVyZmFjZSB3aXRoIGFsbCBsZXZlbHMgb2YgbGVhZGVyc2hpcCwgYW5kIGFsc28gaGFzIGEgY2xlYXIgdW5kZXJzdGFuZGluZyBvZiBBeXVydmVkYSBjb25jZXB0cyBhbmQgcHJvYmxlbXMgcmVsYXRlZCB0byBpdHMgZ3JhZHVhdGVzIGFuZCBmb3IgdGhlIGxhc3QgMTQgeWVhcnMgaGUgaGFzIGxlZCBBeXVydmVkYSByZWxhdGVkIGlzc3VlcyBhbmQgaXRzIGJ1c2luZXNzZXMgaW4gZGlmZmVyZW50IHBhcnRzIG9mIHRoZSBjb3VudHJ5LjwvcD4NCg0KPHA+QXl1cnZlZGFjaGFyeWEmbmJzcDtEci4gQWJoaXNoZWsgaGFzIGRvbmUgQmFjaGVsb3Igb2YgQXl1cnZlZGEgTWVkaWNpbmUgYW5kIFN1cmdlcnkgKEIuQS5NLlMuKSBmcm9tIFJhaml2IEdhbmRoaSBVbml2ZXJzaXR5IC0gQmFuZ2Fsb3JlLCBLYXJuYXRha2EgKEluZGlhKS48L3A+DQoNCjxwPkF5dXJ2ZWRhY2hhcnlhJm5ic3A7IERyLiBBYmhpc2hlayBoYXMgYmVlbiB3aXRoIE5pcm9nU3RyZWV0IGFzIGEgQ28tZm91bmRlciAmYW1wOyBDTU8gZm9yIHRoZSBsYXN0IDQgeWVhcnMuPC9wPg0KDQo8cD5QcmlvciB0byBoaXMgcm9sZSBhdCBOaXJvZ1N0cmVldCwgQXl1cnZlZGFjaGFyeWEmbmJzcDsgQXl1cnZlZGFjaGFyeWEmbmJzcDtEci4gQWJoaXNoZWsgd2FzIHRoZSBEaXJlY3RvciBvZiB0aGUgQnJhaG0gQXl1cnZlZC4gSGUgYWxzbyB3b3JrZWQgd2l0aCBBcG9sbG8gUGhhcm1hY3kgYXMgYW4gJnF1b3Q7QWR2aXNvci1BeXVydmVkYSZxdW90OyBpbiB0aGUgcHJvZHVjdCBkZXZlbG9wbWVudCBkaXZpc2lvbiBhbmQgYWxzbyB3YXMgdGhlIE5hdGlvbmFsIEdlbmVyYWwgU2VjcmV0YXJ5IG9mIEFZVVNIIEFzc29jaWF0aW9uIC0gSW5kaWEuICZuYnNwOzwvcD4NCg0KPHA+QXl1cnZlZGFjaGFyeWEmbmJzcDtEci4gQWJoaXNoZWsgaXMgcGFzc2lvbmF0ZSBhYm91dCB3cml0aW5nICZhbXA7IGVkaXRpbmcgaW4gQXl1cnZlZGljIEJvb2tzLCBNYWdhemluZXMgJmFtcDsgYXJ0aWNsZXMuIE92ZXIgNTAwKyBBeXVydmVkYSBpc3N1ZXMgY2VudHJpYywgZGlzZWFzZS1jZW50cmljIGFydGljbGVzL2Jsb2dzLCBjYXNlIHJlY29yZHMgYW5kIG1hbnkgb3RoZXIgdG9waWNzLXJlbGF0ZWQgYXJ0aWNsZXMgaGF2ZSBiZWVuIHB1Ymxpc2hlZCBpbiB2YXJpb3VzIE5hdGlvbmFsIE5ld3NwYXBlcnMsIEhlYWx0aCBtYWdhemluZXMsIHdlYnNpdGVzIGV0Yy48L3A+DQoNCjxwPkNvLUF1dGhvcmVkIGluIGJvb2tzIG9uICZsZHF1bztDbGluaWNhbCBQcmFjdGljZSBpbiBBeXVydmVkYSZyZHF1bzsgJmFtcDsgJmxkcXVvO1NhbXB1cm5hIFN3YXN0aHlhJnJkcXVvOyBwcmVzZW50bHkgaW4gcHJvZ3Jlc3MuPC9wPg0KDQo8cD5BeXVydmVkYWNoYXJ5YSZuYnNwO0RyLiBBYmhpc2hlayBpcyBhIGZpcm0gYmVsaWV2ZXIgaW4gdGhlIHBvd2VyIG9mIGNvbW1vbiBwZW9wbGUsIGhpcyBtYW50cmEgb2Ygc3VjY2VzcyBpcyB0aGF0IGEgaGFuZGZ1bCBvZiBzaW1wbGUsIGRldGVybWluZWQgcGVvcGxlIGNhbiBjaGFuZ2UgdGhlIGNvdXJzZSBvZiBoaXN0b3J5LiBIZSBhbHNvIGhhcyBhIHNpbXBsZSBkcmVhbSBiZWhpbmQgZXN0YWJsaXNoaW5nIHRoZSBBeXVydmVkYSBGZWRlcmF0aW9uIG9mIEluZGlhLCBmcm9tIHdoaWNoIGhlIHNlZXMgd2l0aCBvcGVuIGV5ZXMgdGhhdCB0aGUgcGVvcGxlIG9mIEF5dXJ2ZWRhIHNob3VsZCBiZSBzZWxmLXJlbGlhbnQsIGNhcGFibGUsIGNvbmZpZGVudCBhbmQgY2FuIG1ha2UgYW4gaW1wcmVzc2l2ZSBjb250cmlidXRpb24gdG8gcHVibGljIGhlYWx0aCB0aHJvdWdoIEF5dXJ2ZWRhLiBUbyBmdWxmaWxsIHRoaXMgZHJlYW0sIGJ5IGdldHRpbmcgYSBwZXJtYW5lbnQgYW5kIHJpZ2h0IHNvbHV0aW9uIHRvIGFsbCB0aGUgcHJvYmxlbXMgYW5kIGxlZ2FsIGh1cmRsZXMgcmVsYXRlZCB0byBBeXVydmVkYSwgZXZlcnkgZGlzdHJpY3Qgb2YgdGhlIGNvdW50cnkgc2hvdWxkIGhhdmUgYXQgbGVhc3QgMTAgbXVsdGlzcGVjaWFsdHkgaG9zcGl0YWxzIG9mIEF5dXJ2ZWRhIGFuZCAxMDAgc3VjaCBoaWdobHkgZXF1aXBwZWQgQXl1cnZlZGEgRGF5IENhcmUgQ2VudGVycyBpbiB0aGUgbmV4dCAxMCB5ZWFycyB3aGVyZSB0aGUgZ2VuZXJhbCBwdWJsaWMgYWJsZSB0byBnZXQgaGlnaC1xdWFsaXR5IHRyZWF0bWVudCBvZiBBeXVydmVkYSE8L3A+DQo=','','','1709212716PDF.png','1709190882PDF.pdf','2023-10-27 05:26:27'),
(2,'Dr. Sunil Arya','Founding Member and Patron Member','Founding Member','Rm91bmRlciBhbmQgQ2hpZWYgUGh5c2ljaWFuCkxpZmVsb25nIEF5dXJ2ZWRhLApQYW5jaGthcm1hIGFuZCBLc2hhcmFzdXRyYSBDZW50ZXIKVmlzaXRpbmcgQ29uc3VsdGFudApNZWRhbnRhIEF5dXJ2ZWRhCkd1cmdhb24KU2VjcmV0YXJ5IEdlbmVyYWwKTmF2a2FscCBGb3VuZGF0aW9uCgo=','','','SunilArya.jpg','','2024-07-02 10:09:55'),
(3,'Dr. Gaurang Joshi','President-International Core Committee ','President - International Core Committee','SW50ZXJuYXRpb25hbCBBeXVydmVkYSBQaHlzaWNpYW4sRGlyZWN0b3ItQXRoYXJ2YSBNdWx0aS1TcGVjaWFsdHkgQXl1cnZlZGEgSG9zcGl0YWwgYW5kIFJlc2VhcmNoIENlbnRlcixSYWprb3QsR3VqYXJhdCAKLSDigaBBY3RpdmVseSBQcm9wYWdhdGluZyBBeXVydmVkIEdsb2JhbGx5IGFuZCBoYXZpbmcgY29sbGFib3JhdGlvbiBpbiBFdXJvcGUsQnJhemlsICxVU0EsTWV4aWNvIGV0YyBmb3IgYWNhZGVtaWMgYW5kIGNsaW5pY2FsIHRyYWluaW5nIG9mIEF5dXJ2ZWRhIAotQXNzb2NpYXRlZCB3aXRoIG1hbnkgSW50ZXJuYXRpb25hbCBBeXVydmVkYSBPcmdhbmlzYXRpb25zIAo=','','','GaurangJoshi.jpg','1709202408PDF.pdf','2024-02-07 07:34:18'),
(4,'Vaidya Sanjay Chhajed ','Vice President, International forum','MD ( Ayurved) Kayachikitsa, PGDMLS','TWVudG9yLCBCRVRJQyBJSVQgQm9tYmF5LCBNdW1iYWkgJiBQcm9mZXNzb3IgRW1lcml0dXMsIFREVSwgQmFuZ2Fsb3JlLiBUcmFpbmVyLCBBdXRob3IsIFJlc2VhcmNoZXIsIElubm92YXRvciBvZiBTYWhhaiBOYWRpIFBhcmlrc2hhICAmIFNBTkFBWSAoIFNhaGFqIE5hZGkgWWFudHJhLiBUcmFpbmVkIDk2MDAwKyBoZWFsZXJzIGluIE5hZGkgUGFyaWtzaGEgZ2xvYmFsbHkuIEF1dGhvcmVkIDIzIHB1YmxpY2F0aW9ucyBvbiBOYWRpIFBhcmlrc2hhLg==','','','Sanjaychajed.jpg','','2024-07-02 10:00:50'),
(5,'Vd Pushpa Yadav','President women committee','BAMS','MjggeXJzIGFzIGFuIGF5dXJ2ZWQgcHJhY3RpdGlvbmVyIGV4cGVydGlzZSBpbiBpbmZlcnRpbGl0eSAsc2tpbiBhbmQgbWV0YWJvbGljIGRpc29yZGVycwpJIG0gYSBzb2NpYWwgd29ya2VyIGFuZCBwYXNzaW9uYXRlIGFidCBhd2FyZW5lc3MgYWJ0IGF5dXJ2ZWQgaW4gc29jaWFsIGdhdGhlcmluZ3MgCg==','','','PushpaYadav.jpg','','2024-07-02 10:01:30'),
(6,'Dr. Kuldeep Raj','Founder','','PHA+UEhBK1VFaEJLMVZGYUVKTE1WWkdZVVZLVEUxV1drZFpWVlpMVkVVeFYxZHJaRnBXVmxwTVZrVlZlRll4WkhKYVJuQlhWbXh3VFZaclZsWmxSbGw0V2toS1lWSnVRbGhXYlhoM1ZGWmFjbFpzV214U2JHdzBWMnRvUzFsV1NuVlJiR2hYWWxob00xWkdXbUZqYkZwVllVVXhUazFGVm5sVmExcEhaR3hDVldReldtcFNSRkpQVVRKak9WQlVkM1pqUkRST1EyYzlQVHd2Y0Q0TkNnPT08L3A+DQo=','','','1707291704PDF.jpg','','2024-02-07 07:41:44'),
(7,'Dr. Shambhu P. Patel','Senior vice President \r\nAcademic Committee, Ayurveda Federation of India\r\nChief Editor- Agnivesh (International Journal of Ayurveda Research & Health)','BAMS, MD (Ayu.) ','RHIuIFNoYW1iaHUgUC4gUGF0ZWwgaXMgcHJlc2VudGx5IHdvcmtpbmcgYXMgQXNzb2NpYXRlIFByb2Zlc3NvciBpbiB0aGUgRGVwYXJ0bWVudCBvZiBEcmF2eWFndW5hIGF0IFZpdmVrIENvbGxlZ2Ugb2YgQXl1cnZlZGljIFNjaWVuY2VzICZhbXA7IEhvc3BpdGFsLCBCaWpub3IsIFV0dGFyIFByYWRlc2guIEhlIGFsc28gcHVibGlzaGVkIG1hbnkgYXJ0aWNsZXMgaW4gSW50ZXJuYXRpb25hbCBhbmQgTmF0aW9uYWwgSm91cm5hbHMuIEhlIHdvcmtlZCBhcyBTY2llbnRpc3QgZ3JvdXAgQyBhdCBQYXRhbmphbGkgUmVzZWFyY2ggSW5zdGl0dXRlLCBmb3IgMTAgeWVhcnMgYW5kIEFsc28gY29udHJpYnV0ZWQgYXMgYSBTY2llbnRpc3QgR3JvdXAgQyBpbiBOZXcgWW9yayBCb3RhbmljYWwgZ2FyZGVuLCBVU0EgdGhyb3VnaCBQUkZIIChQYXRhbmphbGkgUmVzZWFyY2ggRm91bmRhdGlvbiBIZXJiYXJpdW0pLgoK','','','SambhuPatel.JPG','','2024-07-02 09:49:04'),
(8,'Dr. Pavan Singh Shekhawat ','Media secretary ','BAMS','Q2xpbmljYWwgRXhwZXJpZW5jZSAtICAxNSB5ZWFycwoKU2VuaW9yIG1lZGljYWwgb2ZmaWNlciAKR292dCBheXVydmVkYSBkZXBhcnRtZW50LCBhbHdhciByYWphc3RoYW4uCgpJbiB0aGUgbGFzdCAxMCB5ZWFycywgbWFueSBoZWFsdGggYXdhcmVuZXNzIGNhbXBzLCBtZWRpY2FsIGNhbXBzLCBBeXVydmVkYSB3b3Jrc2hvcHMgaGF2ZSBiZWVuIG9yZ2FuaXplZCBmb3IgcHVibGljIGF3YXJlbmVzcyBhbmQgdG8gY29ubmVjdCB0aGUgY29tbW9uIHBlb3BsZSB3aXRoIEF5dXJ2ZWRhIGFuZCBhbHNvIGJ5IGNvbnRpbnVvdXNseSB3b3JraW5nIGluIHRoZSBmaWVsZCBvZiBwbGFudGluZyBvZiBtZWRpY2luYWwgcGxhbnRzIHRvIHByb3ZpZGUgaW5mb3JtYXRpb24gdG8gdGhlIGNvbW1vbiBwZW9wbGUgYWJvdXQgdGhlaXIgaW1wb3J0YW5jZSBhbmQgdXNlLgo=','','','PawanShekhavat.jpg','','2024-07-02 10:02:52'),
(9,'Dr. Naresh Garg','Founder','National Secretary ','PHA+UEhBK1VFaEJLMVZGYUVKTE1WWkdZVVY8L3A+DQo=','test','','1713415512PDF.jpeg','','2024-02-07 07:37:04'),
(10,'Dr. Ram Nivas Sarma','National Secretary  ','B.A.M.S CVD','SSBydW4gbXkgb3duIGNsaW5pYyB3aXRoIGZhY2lsaXRpZXMgIG9mIHBhbmNoa2FybWEuIEFnbmkga2FybWEgbGVlY2ggdGhlcmFweSAgZXRjICBhdCBHd2FsaW9yIG1hZGh5YSAgcHJhZGVzaCA=','','','RamSharma.jpg','','2024-07-02 09:55:29'),
(11,'Dr. Anuj Jain','FOUNDER MEMBER','B.A.M.S. C.A.R.D.','SW0gZGlyZWN0b3Igb2YgdmlzaHdkaHlhcyBheXVydmVkIGFuZCBwYW5jaGthcm0gY2hpa2l0c2FsYXkgLApNeSBtaXNzaW9uIGlzIHRvIGVzdGFibGlzaG1lbnQgb2YgZW1lcmdlbmN5IHRyZWF0bWVudCBpbiBheXVydmVkICwgZm9yIHRoaXMgbWlzc2lvbiBkb2luZyBzZW1pbmFyIGFuZCB3b3Jrc2hvcHMgaW4gYWxsIG92ZXIgSW5kaWE=','','','1707291458PDF.jpg','','2024-02-07 07:37:38'),
(12,'Mr. Mohit Sardana','President of the Pharma Committee ','Engineering in Electronics and Communication from Kurukshetra University ','TW9oaXQgU2FyZGFuYSBpcyBhIHNlcmlhbCBlbnRyZXByZW5ldXIgYW5kIGEgcmVub3duZWQgcHVibGljIHNwZWFrZXIgYWNyb3NzIHRoZSBuYXRpb24sIGhhdmluZyBhZGRyZXNzZWQgbWlsbGlvbnMuIEhpcyBidXNpbmVzcyBpbnRlcmVzdHMgaW5jbHVkZSByaWNlIG1pbGxpbmcgYW5kIGV4cG9ydCwgZm9vZCwgVGVudGluZyAgZmFicmljcywgRnVybml0dXJlIGFuZCBQYXRob2xvZ3kuIEluc3BpcmVkIHRoZSBwcm9mb3VuZCBpbXBhY3Qgb2YgWU9HQSBpbiBoaXMgbGlmZSAsIGhlIGZvdW5kZWQgQVNMSSBBWVVSVkVEQSAoIGEgR292dC4gcmVjb2duaXNlZCBTdGFydCBVcCApb2ZmZXJpbmcgY29udHJhY3QgbWFudWZhY3R1cmluZyBzZXJ2aWNlcyB0byBicmFuZHMgYWNyb3NzIHRoZSBnbG9iZS4gCk1vaGl0IGhhcyBiZWVuIGFja25vd2xlZGdlZCBhbmQgcmV3YXJkZWQgYnkgbWFueSBtZWRpYSBob3VzZXMgc3VjaCBhcyBJbmRpYSBUb2RheSwgRWNvbm9taWMgVGltZXMsIEJ1c2luZXNzIFRvZGF5LCBhbmQgQnVzaW5lc3MgU3RhbmRhcmQgLgpSZWNlbnRseSwgaGUgd2FzIHRpdGxlZCBDaGFtcGlvbiBvZiBBeXVydmVkYSBieSB0aGUgVG91cmlzbSBNaW5pc3RlciBvZiBJbmRpYSBhbmQgcmVjZWl2ZWQgdGhlIFNvY2lhbCBJbXBhY3QgQXdhcmQgYXQgVElFQ09OIDIwMjQsIGFtb25nIG1hbnkgb3RoZXIgYXdhcmRzIGZyb20gZ292ZXJubWVudCBhbmQgbm9uLWdvdmVybm1lbnQgYm9kaWVzLiBIZSBhbHNvIGhvbGRzIG9mZmljZSBhcyBOYXRpb25hbCBDby1jaGFpciBvZiB0aGUgRGlyZWN0IFNlbGxpbmcgQ29tbWl0dGVlIHdpdGggRklDQ0kuCg==','test','','MohitSardana.jpeg','','2024-02-07 07:42:20'),
(13,'Dr. Naveen K. Chauhan ','President Ayurveda Surgeon Committee ','BAMS, CRAV (KSHARSUTRA), Diploma in Pharmacy ','SSBhbSBzZW5pb3IgY29uc3VsdGFudCBQcm9jdG9sb2dpc3QgU3VyZ2VvbiBwcmFjdGljaW5nIGluIEdoYXppYWJhZCwgSW5kaWEgc2luY2UgbGFzdCAxNSsgeWVhcnMuIEZvdW5kZXIgRGlyZWN0b3IgYXl1cnZlZGFwaWxlc2N1cmUuY29tIGFuZCBTaHJpIERoYW53YW50YXJpIEhvc3BpdGFsLCBHaGF6aWFiYWQKCgo=','','','NaveenChauhan.jpg','','2024-07-02 09:50:32'),
(14,'Dr. Dhanvantri Tyagi','','Founder','PHA+UEhBK1VFaEJLMVZGYUVKTE1WWkdZVVZLVEUxV1drZFpWVlpMVkU8L3A+DQo=','test','','1707291475PDF.jpg','','2024-02-07 07:37:54'),
(15,'Dr. Aneesh T','General Secreatry- Academic Committee','','TUQgSW4gUmFjaGFuYSBTaGFyaXIsIHdvcmtpbmcgYXMgYW4gYXNzb2NpYXRlIHByb2Zlc3Nvci4gUHVibGlzaGVkIDYgcGVlciByZXZpZXdlZCBhcnRpY2xlcyBhbmQgcHJlc2VudGVkIDcgc2NpZW50aWZpYyBwYXBlcnMgYXQgdmFyaW91cyBzZW1pbmFycy4gQ29tcGxldGVkIG1hc3RlciBjbGFzcyBhbmQgZmVsbG93c2hpcCBpbiBzZXh1YWwgbWVkaWNpbmUuICBIZSBpcyBhbiBFbnRyZXByZW51cmlhbCBlbnRodXNpYXN0IGFuZCBtb3RpdmF0aW9uYWwgc3BlYWtlci4gCgo=','','','Anees.jpg','','2024-07-02 09:48:11'),
(16,'Dr. Sachin P. Aru','President - Clinics and Hosiptal wing','BAMS MD Post Graduate Diploma in Nano Bio Medicine Technology','R2l2ZW4gbXVsdGlwbGUgdGFsa3Mgb24KMSkgSW1wb3J0YW5jZSBvZiBEb2N1bWVudGF0aW9uIGluIEF5dXJ2ZWRhCjIpIEltcG9ydGFuY2Egb2YgUGhhcm1hY292aWdpbGFuY2UgaW4gQXl1cnZlZGEKMykgSW1wb3J0YW5jZSBvZiBPYmplY3RpdmUgUGFyYW1ldGVycyBpbiBBeXVydmVkYQo0KSBQYWluIE1hbmFnZW1lbnQgaW4gQXl1cnZlZGE=','','','1707291719PDF.jpg','','2024-07-02 10:09:55'),
(17,'Dr. Satyadev Arya','Secretary Central Core Committee','BAMS, MD Panchakarma, FAGE, CKPAR, CB-META,','4oCiCUhPRCAmIEFzc29jaWF0ZSBQcm9mZXNzb3IgaW4gYW4gYXl1cnZlZGljIGNvbGxlZ2UK4oCiCTNyZCBnZW5lcmF0aW9uIG9mIEF5dXJ2ZWRpYyB2YWlkeWEgaGllcmFyY2h5LCBSdW5uaW5nIDIgUGFuY2hha2FybWEgY2xpbmljcyBpbiBOb2lkYSB3aXRoIGV4cGVyaWVuY2Ugb2YgIDE0IHllYXJzIGNsaW5pY2FsIHByYWN0aWNlCgoK','','','SatyadevArya.jpeg','','2024-07-02 09:51:19'),
(18,'Dr. Akshay Chauhan','International secretory AFI','BAMS, PGDIP, Hospital management (AIIA) ','VmFpZHlhIGFrc2hheSBjaGF1aGFuIGlzIGEgU2Vjb25kIEdlbmVyYXRpb24gVmFpZHlhLCBkb2luZyBjbGFzc2ljYWwgQXl1cnZlZGljIHByYWN0aWNlIHNwZWNpYWxpdHkgaW4gVmFzY3VsYXIgZGlzZWFzZSBhbmQgRGlnZXN0aXZlIGRpc29yZGVyLiAKU3R1ZGllcyBpbiBtYW5pcGFsLCBrYXJuYXRha2EuClJ1bm5pbmcgQW4gQXl1cnZlZGljIEhvc3BpdGFsIGluIE5vaWRhLCBVLlAuCgo=','test','','AkshayChauhan.jpg','','2024-02-07 07:38:16'),
(19,'Dr. Pallav Prajapati','President, Student Committee Of AFI','','RHIgUGFsbGF2IGlzIGEgaGlnaGx5IHNraWxsZWQgQXl1cnZlZGljIGRvY3RvciBzcGVjaWFsaXppbmcgaW4gTmV1cm9wYW5jaGthcm1hIGFuZCBNYXJtYSBDaGlraXRzaGEuIFJlbm93bmVkIGZvciBoaXMgaW1wYWN0ZnVsIGNvbnRyaWJ1dGlvbnMsIGhlIGhhcyBvcmdhbml6ZWQgbnVtZXJvdXMgbmF0aW9uYWwgc2VtaW5hcnMgYW5kIHdvcmtzaG9wcywgc2hvd2Nhc2luZyBoaXMgZGVkaWNhdGlvbiB0byBhZHZhbmNpbmcgdGhlIGZpZWxkIG9mIEF5dXJ2ZWRhLiBEci4gUGFsbGF2J3Mgc3VzdGFpbmVkIGNvbW1pdG1lbnQgaXMgcmVmbGVjdGVkIGluIGhpcyByZWNlaXB0IG9mIHByZXN0aWdpb3VzIGF3YXJkcywgaW5jbHVkaW5nIHRoZSBDaGFyYWsgQXdhcmQsIEFjZSBvZiBJbml0aWF0aXZlIEF3YXJkLCBSYXN0cml5YSBBeXVzaCBHYXVyYXYgQXdhcmQsIGFuZCB0aGUgWW91dGggVmFpZHlhIFJpc2luZyBBd2FyZC4gQ29tcGxlbWVudGluZyBoaXMgYWNjb2xhZGVzLCBoZSBhY3RpdmVseSBpbXBhcnRzIGtub3dsZWRnZSB0aHJvdWdoIHRyYWluaW5nIHNlc3Npb25zIGluIE5ldXJvcGFuY2hrYXJtYSwgaGF2aW5nIHN1Y2Nlc3NmdWxseSBtZW50b3JlZCBhIHN1YnN0YW50aWFsIG51bWJlciBvZiBlbWVyZ2luZyB5b3V0aCBBeXVydmVkaWMgZG9jdG9ycy4gRHIuIFBhbGxhdiBQcmFqYXBhdGkgc3RhbmRzIGFzIGEgZGlzdGluZ3Vpc2hlZCBmaWd1cmUsIGNvbWJpbmluZyBleHBlcnRpc2UsIHJlY29nbml0aW9uLCBhbmQgYSBwYXNzaW9uIGZvciBudXJ0dXJpbmcgdGhlIG5leHQgZ2VuZXJhdGlvbiBvZiBBeXVydmVkaWMgcHJhY3RpdGlvbmVycy4=','','','PallavPrajapti.jpg','','2024-07-02 10:02:13'),
(20,'Dr. Manish Gautam','National Coordinator and General Secretary of Academic and Event Committee','BAMS ','RHIuIEdhdXRhbSBpcyBhIGZvdW5kZXIgb2YgYSBsZWFkaW5nIGF5dXJ2ZWRpYyBvcmdhbml6YXRpb24g4oCYQXl1c2hzcGFyc2jigJkuIEhlIGlzIHByYWN0aWNpbmcgaW4gdmFyaW91cyBjaXR5IGFuZCBvbmxpbmUgY29uc3VsdGF0aW9uLiAgIA==','','','ManishGautam.png','','2024-07-02 10:03:43'),
(21,'Dr. Bhawana Bhatta','General Secretary','BAMS','Q3VycmVudGx5IHBvc3RlZCBhcyBhIG1lZGljYWwgb2ZmaWNlciBpbiB1dHRyYWtoYW5kIGdvdmVybm1lbnQuIAo=','','','BhavnaBhatta.jpg','','2024-07-02 09:47:18'),
(22,'Dr Ved Prakash Dwivedi','Patron Member','BAMS','TWFuYWdlciAoUmVzZWFyY2ggYW5kIGRldmVsb3BtZW50LCBDbGluaWNhbCBSZXNlYXJjaCwgUmVndWxhdG9yeSBhbmQgVGVsZW1lZGljaW5lIEhlYWQpIGF0IFNocmVlIEJhaWR5YW5hdGggUGhhcm1hY3k=','','','VedPrakash.png','','2024-07-02 09:36:55'),
(23,'Dr Harish Rushi','Lifetime patron member','B.AM.S. (R.A. Podar govt college, Mumbai, Maharashtra)','UHJhY3Rpbmcgc2luY2UgbGFzdCAyMyB5ZWFycyBhdCBSdXNoaSBIb3NwaXRhbCAoQXl1cnZlZCBhbmQgcGFuY2hha2FybSBjZW50cmUpIEF1bmRoYSBOYWduYXRoLCBEaXN0IEhpbmdvbGkuCi0gRG8gb3JnYW5pYyBmYXJtaW5nLgotIFRyeWluZyB0byByZWFjaCBtb3JlIHBlb3BsZSB3aXRoIHRoZSBoZWxwIG9mIEludGVybmV0IHRocm91Z2ggc29jaWFsIG1lZGlhIGFuZCBvbmxpbmUgY29uc3VsdGluZyAKV29ya2VkIGFzIGFjdGl2ZSBtZW1iZXIgb2YgTklNQSBvcmdhbml6YXRpb24sIEF5dXJ2ZWQgdnlhc3BpdGgsIE1haGFyYXNodHJhIEF5dXJ2ZWQgc2FtbWVsYW4sIFNlY3JldG9yeSBvZiBEb2N0b3JzIGFzc29jaWF0aW9uIEF1bmRoYSBOYWduYXRoIHNpbmNlIG1vcmUgdGhhbiAxNSB5ZWFycyAK','','','HarishRushi.png','','2024-07-02 09:39:08'),
(24,'Dr.Ankur Kumar Tanwar ','Senior vice president ','B.A.M.S,\r\nM.D., Ph.D.\r\n','MTQgeWVhcnPigJkgZXhwZXJpZW5jZSBpbiBBeXVydmVkYSBjbGluaWNhbCBwcmFjdGljZSwgd2l0aCBzcGVjaWFsIGludGVyZXN0IGluIHNraW4gZGlzZWFzZSwgUmVwcm9kdWN0aXZlIGhlYWx0aCBhbmQgc2xlZXAgaGVhbHRoIGFzIHdlbGwgYXMgaW52b2x2ZWQgaW4gc2NpZW50aWZpYyBhbmQgZXZpZGVuY2UgYmFzZWQgcmVzZWFyY2hlcyBhbmQgY2xpbmljYWwgdHJpYWxzIGluIHRoZSBmaWVsZCBvZiBBeXVydmVkYS4=','','','AnkurKumarTanwar.jpg','','2024-07-02 09:40:15'),
(25,'Dr.Shilpa Yerme Patil ','B.A.M.S.M.D. PG DIPLOMA ','S.G.R. Ayurved College ,Solapur ,Maharashtra \r\n       Patron Member ,Life Member \r\n','RnVuZGVyIEF5dXJ2ZWQgV2VsZmFyZSBGb3VuZGF0aW9uLCBTb2xhcHVyCkV4cGVydGlzZSBpbiBGYWNlIE1hcHBpbmcsTmFkaSBQYXJpa3NoYSAscHJha3JpdGkgUGFyaWtzaGEgCkV4cGVyaWVuY2UgMjEgWXJzLgpBbmRyb2lkIEFwcGxpY2F0aW9ucyBwdWJsaXNoZWQgb24gR29vZ2xlIFBsYXkgU3RvcmUuCjkgQm9va3MgUHVibGlzaGVkLiAK','','','ShilpaPatil.jpeg','','2024-07-02 09:41:05'),
(26,'Vaidya S.K. Rai (Shashi Kant Rai)','Founder member Patron\r\n','B.Sc , BAMS (Gold Medalist)\r\nPanchkarma refresher course through CCRAS (Ayush) at Vaidyaratnam Thrissur 2001.\r\n','SW50byBBeXVydmVkYSBQcmFjdGljZSBzaW5jZSAzMHllYXJzLApGb3VuZGVyIERpcmVjdG9yIEpBR0dPVFRBTSBBWVVSVkVEQSAKSE9ELyBDb25zdWx0YW50IEF5dXNoIENhbnRvbm1lbnQgR2VuZXJhbCBIb3NwaXRhbCDDgGxsYWhhYmFkLCBQcmF5YWdyYWouCiBNZW1iZXIgSU1TIChJbmRpYW4gTWVub3BhdXNhbCBTb2NpZXR5KQpQcmVzaWRlbnQgTklNQSBQcmF5YWdyYWogCk1lbWJlciBWQVAKVmliaGFnIFNhbnlvamFrIEFyb2d5YWJoYXJ0aSwgS2FzaGkgUHJhbnQgCkV4IEhPRCAvIFNyIENvbnN1bHRhbnQgYXQgSmVldmFuIEp5b3RpIEhvc3BpdGFsIFByYXlhZ3Jhago=','','','S.K.Rai.jpg','','2024-07-02 09:43:35'),
(27,'Dr Arvind kumar srivastava','','BAMS','UHJhY3RpY2UgbGFzdCAzMnlycwpTZXdhIGhvc3BpdGFsIHN1cmVrYXB1cmFtIEJhdGh1YSBNaXJ6YXB1ciAyMzEwMDEgbW9iIDk0MTUyMDU1MzMgOTQxNTI1OTYwMCA3MDA3MjQ0MjMzCg==','','','ArvindShrivastav.jpg','','2024-07-02 09:44:45'),
(29,'Dr Animesh Mohan ','General Secretary, Clinic and Hospital Committee ','MD-Panchakarma (Gold Medalist)','RHIgQW5pbWVzaCBNb2hhbiwgaXMgRGlyZWN0b3IgYW5kIFBhbmNoYWthcm1hIFNwZWNpYWxpc3QgYXQgUmFtZXNod2FyYW0gQXl1cnZlZGEgYW5kIE5hdHVyZWN1cmUgU3VwZXIgU3BlY2lhbGl0eSBIb3NwaXRhbCwgQmFyZWlsbHkgYW5kIEFzc2lzdGFudCBQcm9mZXNzb3IgYW5kIENvbnN1bHRhbnQgYXQgRGhhbnZhbnRhcmkgQXl1cnZlZGEgTWVkaWNhbCBDb2xsZWdlIGFuZCBIb3NwaXRhbCwgQmFyZWlsbHkuIEhlIGlzIGFsc28gdGhlIGZvdW5kZXIgb2YgRHIgQW5pbWVzaOKAmXMgQXl1cnZlZGEgU29sdXRpb25zLgpIZSBpcyBhIGhpZ2hseSBxdWFsaWZpZWQgQXl1cnZlZGEgY29uc3VsdGFudCBzcGVjaWFsaXN0IGluIFBhbmNoYWthcm1hIHdobyB3YXMgcmFua2VkIGZpcnN0IGluIGhpcyBNRCBleGFtaW5hdGlvbnMgYW5kIHJlY2VpdmVkIEdvbGQgTWVkYWwgYnkgdGhlIEhvbm9yYWJsZSBQcmVzaWRlbnQgb2YgSW5kaWEuIEhlIGlzIGNvbnNpZGVyZWQgdG8gYmUg4oCcT25lIG9mIHRoZSBiZXN0IEF5dXJ2ZWRhIFBoeXNpY2lhbnMgaW4gdGhlIHJlZ2lvbuKAnSwgbm90IGp1c3QgZm9yIGhpcyBleHBlcnRpc2UsIGJ1dCBhbHNvIGJlY2F1c2UKb2YgaGlzIGNhcmluZyBhdHRpdHVkZSBhbmQgdG8tdGhlLXBvaW50IHRyZWF0bWVudC4K','','','Dr Animesh Mohan .jpg','','2024-07-02 09:34:30'),
(31,'Dr. Yash Chaudhary','Founder- Yasharth Veda','','QXdhcmRlZCB3aXRoIC0KWW91dGggdmFpZHlhIGljb24gQXdhcmQgMjAyMwpDb25zdGFudCBjb250cmlidXRvciBvZiBBeXVydmVkYSBBd2FyZCAyMDIzCk1hZGhhdiBBd2FyZCAyMDIzCkRvY3RvcnMgc2FtbWFuIDIwMjIKCgo=','','','YashChaudhary.jpeg','','2024-07-02 09:49:52'),
(34,'Dr Sanjay Jakhar ','National President \r\nAyurveda Federation of India \r\n','BAMS 1987-1992 Batch ','Rm91bmRlci9NZWRpY2FsIERpcmVjdG9yIApKYWtoYXIgSG9zcGl0YWwgQXNodGFuZyBBeXVydmVkIE11bHRpLXNwZWNpYWxpdHkgSG9zcGl0YWwgJiBQYW5jaGFrYXJtYSBDZW50cmUgUm9odGFrLiBIYXJ5YW5hLiAxMjQwMDEKUHJlc2lkZW50IApNU0ogQ2hhcml0YWJsZSBUcnVzdCBSb2h0YWsgSGFyeWFuYSAKU29jaWFsIEFjdGl2aXN0Ckdlbi4gU2VjcmV0YXJ5IApSb2FkIFNhZmV0eSBPcmdhbmlzYXRpb24gClJvaHRhayBQb2xpY2UgCgo=','','','SanjayJakhar.jpg','','2024-07-02 09:52:10'),
(35,'Dr. Arpan Saha','State convener , West Bengal','BAMS(WBUHS), CPCH(KOL) ','SSBhbSBhIERvY3RvciAmIFByb3VkIHRvIGJlIGFuIEluZGlhbi4g','','','ArpanShah.jpg','','2024-07-02 09:52:54'),
(36,'Dr. Bhairav Bhimrao Tawshikar Kulkarni','General Secretary, International Committee, Ayurveda Federation of India','BAMS MD( Kayachikitsa), PhD( Kayachikitsa)','UHJvZmVzc29yICYgSE9ELCBLYXlhY2hpa2l0c2EgRGVwYXJ0bWVudApEci4gVmVkcHJha2FzaCBQYXRpbCBBeXVydmVkaWMgTWVkaWNhbCBDb2xsZWdlIGFuZCBSZXNlYXJjaCBJbnN0aXR1dGUsIEphbG5hCkRpcmVjdG9yLCBTaHJlZSBTaWRkaGl2aW5heWFrIEF5dXJ2ZWRhIFBhbmNoYWthcm1hIENlbnRlciwKQ2hoYXRyYXBhdGkgU2FtYmhhamluYWdhciggQXVyYW5nYWJhZCkgLTQzMTAwNQplbWFpbCBpZCAtIGRyLmJoYWlyYXZrdWxrYXJuaUBnbWFpbC5jb20Kd3d3LnNocmVlc2lkZGhpdmluYXlha2F5YXVydmVkYS5pbgpNb2IgTm8uKzkxOTk2NzI4MjA3Ngo=','','','BhairavKulkarni.jpg','','2024-07-02 09:53:37'),
(37,'Adeeb Shah','General Secretary (Pharma Committee)','Graduation','QW4gYXl1cnZlZGljIHN1cHBsZW1lbnRzIGFuZCBjb3NtZXRpY3MgZXhwZXJ0IHdpdGggYW4gZXhwZXJpZW5jZSBvZiA5IHllYXJzIGFuZCBhIGRlbW9uc3RyYXRlZCBoaXN0b3J5IG9mIHdvcmtpbmcgd2l0aCByZXRhaWwgYW5kIGUtY29tbWVyY2UgYnJhbmRzLiBTa2lsbGVkIGluIGF5dXJ2ZWRpYy9oZXJiYWwgc2tpbmNhcmUsIGhhaXIgY2FyZSwgdGFibGV0cywgY2Fwc3VsZXMgJiBzeXJ1cHMgbWFudWZhY3R1cmluZywgaW5ub3ZhdGl2ZSBwYWNrYWdpbmcgZGV2ZWxvcG1lbnQsIHByb2R1Y3QgVHJhaW5pbmcsIGFuZCBmb3JtaW5nIG1hcmtldGluZyBzdHJhdGVnaWVzIGZvciBuZXcgYW5kIGV4aXN0aW5nIGJyYW5kcy4gSGF2ZSBtYW51ZmFjdHVyZWQgcHJvZHVjdHMgZm9yIG1vcmUgdGhhbiAxMDAgYnJhbmRzIGFuZCBjdXJyZW50bHkgd29ya2luZyB3aXRoIG1vcmUgdGhhbiAyNSBuYXRpb25hbCBhbmQgaW50ZXJuYXRpb25hbCBicmFuZHMgZm9yIHRoZWlyIGZvcm11bGF0aW9uIGFuZCBwYWNrYWdpbmcgZGV2ZWxvcG1lbnQu','','','1707291719PDF.jpg','','2024-07-02 09:54:23'),
(39,'Dr Rajiv gaur ','State president haryana AFI\r\nSenior consultant at jeena sikho life care limited ','BAMS PGDYT ','','','','RajivGaur.jpg','','2024-07-02 09:56:13'),
(40,'Dr. Bhoopendra Mani Tripathi ','Patron Member in AFI','BAMS, MD','RXggQXNzb2NpYXRlIFByb2Zlc3NvciwgUUlNUyAoVS5LLikKTWVkaWNhbCBPZmZpY2VyIChVUCBHb3Zlcm5tZW50KQpEaXJlY3RvciwgQ2hhcmFrIEF5dXJ2ZWQgQ2xhc3NlcyAKRGlyZWN0b3IsIFNSUFQgQXl1cnZlZCBDbGluaWMgQW5kIFJlc2VhcmNoIENlbnRyZSwgS2F1c2hhbWJpIApBd2FyZHMtIENoYXJhayBBd2FyZCwgWW91bmdlc3Qgc2VuaW9yIHNjaWVudGlzdCBhd2FyZCwgQXl1cnZlZCBHYXVyYXYsIFJpc2hpa3VsIFJhdG5hLEJoaXNoYWsgUmF0bmEgQXdhcmQK','','','BhupendraManiTripathi.jpg','','2024-07-02 09:57:24'),
(41,'Vaidya indrasan prajapati ','Vice President of students committee','BAMS, MD (Ayu)','SSBhbSBjb250aW51b3VzbHkgZG9pbmcgdHJlYXRtZW50IGFzIHBlciBjbGFzc2ljYWwgYXl1cnZlZCBpbiBHb3Jha2hwdXIuIFdpdGggdGhlIHRob3VnaHQgb2YgZXZlcnkgaG9tZSBoYXZpbmcgQXl1cnZlZGEsIEkga2VlcCBtYWtpbmcgcGVvcGxlIGF3YXJlIG9mIEF5dXJ2ZWRhIHRocm91Z2ggc21hbGwgcHJvZ3JhbXMu','','','1707291719PDF.jpg','','2024-07-02 09:58:03'),
(47,'DR Neeten Vashisht','National Secretary(AFI).','BAMS (Rguhs, Bangalore).','Tm93IEkgbSBwcmFjdGljaW5nIGFzIGEgcGh5c2ljaWFuIGFuZCBwZWRpYXRyaWNzIGF0IGpoYWpqYXIgaGFyeWFuYS4=','','','NeetenVashishtha.jpg','','2024-07-02 10:04:44'),
(48,'Dr Ajay Kumar','Life Member\r\nSr Vice President\r\nMember Editor\r\n\r\n','M.D.(Kayachikitsa), Ph.D.(Kayachikitsa)\r\nIMS, BHU\r\n','Q2xpbmljYWwgRXhwZXJpZW5jZSAtIDE4IHllYXJzCkFjYWRlbWljIGV4cGVyaWVuY2UgLSAxMyB5ZWFycwpBd2FyZHMtIG1vcmUgdGhhbiAxMApCb29rcy0gbW9yZSB0aGFuIDEwClJlc2VhcmNoIEFydGljbGUtIG1vcmUgdGhhbiAzNQo=','','','AjayKumar.jpg','','2024-07-02 10:06:12'),
(49,'Prof. Dr. Shriniwas Gujjarwar.','Patron Surgeon Committee','B.A.M.S. and M.D.Ayurveda ( ShalyaTantra) ','UHJpbmNpcGFsICYgTWVkaWNhbCBTdXBlcmludGVuZGVudCAsCkJhYmEgS2hldGEgTmF0aCBHb3Z0LiBBeXVydmVkYSBDb2xsZWdlICYgSG9zcGl0YWwsIE5hcm5hdWwsIEhhcnlhbmEuCiBEZXB0LiBPZiBBWVVTSCwgR292dC4gT2YgSGFyeWFuYS4gSW5kaWEuIApQcm9mZXNzb3IgLCAgUEcgZGVwdCBvZiBTaGFseWF0YW50cmEsIApTaHJpIEtyaXNobmEgR292dC4gQXl1cnZlZGljIENvbGxlZ2UgYW5kIEhvc3BpdGFsLCBLdXJ1a3NoZXRyYSwgSGFyeWFuYS4KRGVhbiwgU3R1ZGVudHMgd2VsZmFyZSAmIFBoRCBHdWlkZSwgU2hyaSBLcmlzaG5hIEF5dXNoIFVuaXZlcnNpdHkga3VydWtzaGV0cmEgZnJvbSAyMDE5LTIwMjMuIAoK','','','Prof.Shrinivas.jpg','','2024-07-02 10:07:09'),
(50,'Acharya Manish Ji','Ayurveda & Meditation Guru','','PHA+QWNoYXJ5YSBNYW5pc2ggaXMgYW4gYXl1cnZlZGljIHByYWN0aXRpb25lciB3aG8gZW1waGFzaXNlcyBwcmV2ZW50aW9uIHJhdGhlciB0aGFuIGN1cmUuIEFjaGFyeWEgTWFuaXNoIGVtcGxveXMgYWdlLW9sZCBheXVydmVkaWMgbWVkaWNpbmVzIGFuZCB0aGVyYXBpZXMgdG8gbm91cmlzaCB0aGUgYm9keSBmcm9tIHRoZSBpbnNpZGUgb3V0LiBBY2hhcnlhIE1hbmlzaCBpbnZlbnRlZCBTaHVkZGhpLCBhbmQgZ3VpZGVzIGV2ZXJ5b25lIHRvIGFkb3B0IHRoZSBkaXNjaXBsaW5lZCBsaWZlc3R5bGUuIEFjaGFyeWEgTWFuaXNoIEppIHJhaXNlcyBhd2FyZW5lc3MgYWJvdXQgbGVhZGluZyBhIGRpc2Vhc2UtZnJlZSBsaWZlIGJ5IGZvbGxvd2luZyB0aGUgbWV0aG9kcyBvZiBBeXVydmVkYS48L3A+DQo=','','','1706955491PDF.png','','2024-02-03 10:18:11');
/*!40000 ALTER TABLE `tbl_foundingteam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_foundingteamdownloadpdf`
--

DROP TABLE IF EXISTS `tbl_foundingteamdownloadpdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_foundingteamdownloadpdf` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `ft_id` int(11) NOT NULL,
  `f_name` varchar(60) NOT NULL,
  `f_forstudent` enum('student','practitioner') NOT NULL,
  `f_mobile` varchar(15) NOT NULL,
  `f_email` varchar(150) NOT NULL,
  `f_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_foundingteamdownloadpdf`
--

LOCK TABLES `tbl_foundingteamdownloadpdf` WRITE;
/*!40000 ALTER TABLE `tbl_foundingteamdownloadpdf` DISABLE KEYS */;
INSERT INTO `tbl_foundingteamdownloadpdf` VALUES
(28,8,'Test','practitioner','9513216540','test@test.com','2024-03-02 06:50:09'),
(29,8,'Test','practitioner','9513216540','test@test.com','2024-03-02 06:57:30'),
(31,8,'Pooja Vashist','practitioner','9205537267','pooja.vashist7592@gmail.com','2024-05-03 12:13:10'),
(32,8,'Ritesh','student','7009856876','raxtalk2me@gmail.com','2024-05-08 13:10:17'),
(33,8,'Ritesh','student','7009856876','raxtalk2me@gmail.com','2024-05-08 13:10:47'),
(34,8,'test','student','9728477144','admin@1.com','2024-05-10 04:58:46'),
(35,8,'vishvjeet','student','9728477144','admin@1.com','2024-05-10 07:31:26'),
(36,8,'test','student','9728477144','admin@1.com','2024-05-10 09:51:46'),
(37,8,'test','student','9728477144','admin@1.com','2024-05-13 04:14:46'),
(38,8,'test','student','9728477144','admin@1.com','2024-05-14 03:57:39'),
(39,8,'Amal Baldwin','practitioner','9874561230','ryqocopex@mailinator.com','2024-05-14 07:29:33'),
(40,8,'Kenyon Acevedo','student','7894561230','zyqysik@mailinator.com','2024-05-14 07:31:16'),
(41,8,'Kenyon Acevedo','student','7894561230','zyqysik@mailinator.com','2024-05-14 07:31:26'),
(42,8,'test','student','9728477144','admin@1.com','2024-05-14 07:57:11'),
(43,8,'test','student','9728477144','admin@1.com','2024-05-15 04:34:31'),
(44,8,'Mayank Test','student','9888885642','mayank.naithani@jeenasikho.net','2024-05-15 05:32:54'),
(45,8,'Mayank','student','8427990213','mayank.naithani@jeenasikho.net','2024-05-15 05:34:55'),
(46,8,'Mayank','student','8427990213','mayank.naithani@jeenasikho.net','2024-05-15 05:35:03'),
(47,8,'test','practitioner','9914908641','neha.chauhan@jeenasikho.co.in','2024-05-15 13:06:57'),
(48,8,'test','practitioner','9728477144','admin@gmail.com','2024-05-15 14:08:28'),
(49,8,'asdf asdf','practitioner','9728477144','asdf@sadf.com','2024-05-16 03:37:55'),
(50,8,'asdf asdf','practitioner','9728477144','asdf@sadf.com','2024-05-16 03:41:22'),
(51,8,'Velma Herrera','practitioner','9855366451','wacenynaqy@mailinator.com','2024-05-16 04:08:02'),
(52,8,'test','practitioner','9728477144','admin@1.com','2024-05-16 05:22:11'),
(53,8,'Mayank Test','practitioner','9888885642','mayank.naithani@jeenasikho.net','2024-05-16 06:04:17'),
(54,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 05:25:28'),
(55,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 05:33:43'),
(56,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 05:34:22'),
(57,9,'asdf asdf','practitioner','9728477144','asdf@sadf.com','2024-05-17 05:51:00'),
(58,9,'asdf asdf','practitioner','9728477144','asdf@sadf.com','2024-05-17 05:51:42'),
(59,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 05:53:02'),
(60,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 05:55:27'),
(61,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 08:16:33'),
(62,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 08:17:49'),
(63,9,'aad fadf','practitioner','9728477144','aasdf@asdf.com','2024-05-17 08:19:39'),
(64,9,'Mayank Test','practitioner','9888885642','mayank.naithani@jeenasikho.net','2024-05-17 08:29:44'),
(65,9,'Mayank Test','practitioner','9888885642','mayank.naithani@jeenasikho.net','2024-05-17 08:31:01'),
(66,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-17 11:04:57'),
(67,9,'Debabrata Mondal','practitioner','8017629395','debabrata.mondal639@gmail.com','2024-05-17 13:12:37'),
(68,9,'SUJIT KUMAR','practitioner','8320816067','drsujit58@gmail.com','2024-05-17 16:52:11'),
(69,9,'test','practitioner','9728477144','admin@1.com','2024-05-18 03:42:31'),
(70,9,'Chintan Grover','practitioner','7340322282','chinxgrover@gmail.com','2024-05-18 04:41:40'),
(71,9,'Chintan Grover','practitioner','7340322282','chinxgrover@gmail.com','2024-05-18 04:44:30'),
(72,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-18 05:41:29'),
(73,9,'test','practitioner','9728477144','admin@1.com','2024-05-18 06:39:00'),
(74,9,'Dr Darpan Gangil','practitioner','9229698159','darpan.gangil@gmail.com','2024-05-18 09:42:33'),
(75,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-18 10:02:27'),
(76,9,'Pankaj ','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-18 10:03:08'),
(77,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-18 10:05:34'),
(78,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-18 10:09:10'),
(79,9,'Mayank ','practitioner','9888885642','pankajpaulastya@gmail.com','2024-05-18 10:11:06'),
(80,9,'DR SUMIT DORAYA','practitioner','9828577234','sdoraya@gmail.com','2024-05-18 12:22:41'),
(81,9,'Abhishek ','practitioner','7861020100','rudrabhishek28@gmail.com','2024-05-19 02:24:37'),
(82,9,'Dr Manisha Yadav','practitioner','9711234311','manishayadav059@gmail.com','2024-05-19 02:57:43'),
(83,9,'Rahul sharma ','practitioner','8273413610','srmarahul12@gmail.com','2024-05-19 02:59:53'),
(84,9,'Rishi Kumar Tiwari','practitioner','9414583140','rishi.ayurved@gmail.com','2024-05-19 03:06:05'),
(85,9,'Dr Pallav Prajapati ','practitioner','7007111943','chetanyayurveda@gmail.com','2024-05-19 03:07:11'),
(86,9,'DR MAHESH CHAND SAINI','practitioner','8209563077','dr.maheshsaini01@gmail.com','2024-05-19 03:08:33'),
(87,9,'Ashwani kumar Gupta ','practitioner','8565030929','ashwanigup55@gmail.com','2024-05-19 03:08:49'),
(88,9,'Dr. Ashok Kumar Jaiswal','practitioner','7235073185','oshoayur@gmail.com','2024-05-19 03:26:28'),
(89,9,'Dr Vijendra Kumar Tripathi','practitioner','9519313755','drvijendrakumartripathi1@gmail.com','2024-05-19 03:31:44'),
(90,9,'Nigam','practitioner','8896718157','nigamprakash457@gmail.com','2024-05-19 03:31:49'),
(91,9,'Rahul sharma ','practitioner','8273413610','srmarahul12@gmail.com','2024-05-19 03:32:05'),
(92,9,'Nigam','practitioner','8896718157','nigamprakash457@gmail.com','2024-05-19 03:33:31'),
(93,9,'Shivanshu agrawal','practitioner','7037392996','shivanshuag99170@gmail.com','2024-05-19 03:33:43'),
(94,9,'Mahank','practitioner','8462871574','mayanksharma166@gmail.com','2024-05-19 03:36:39'),
(95,9,'Dr Gajendra singh sengar','practitioner','7566818544','singhsorya54@gmail.com','2024-05-19 03:41:30'),
(96,9,'Bharat Sharma','practitioner','9501797725','bbharatsharma4321@gmail.com','2024-05-19 03:42:11'),
(97,9,'Dr.Arun Kalihari','practitioner','8305349505','arunkalihari12@gmail.com','2024-05-19 03:43:34'),
(98,9,'Bharat Sharma','practitioner','9501797725','bbharatsharma4321@gmail.com','2024-05-19 03:43:38'),
(99,9,'Arvind kumar ','practitioner','6394439365','arvindkumar30685@gmail.com','2024-05-19 03:44:54'),
(100,9,'Arvind kumar ','practitioner','6394439365','arvindkumar30685@gmail.com','2024-05-19 03:45:12'),
(101,9,'Arvind kumar ','practitioner','6394439365','arvindkumar30685@gmail.com','2024-05-19 03:45:14'),
(102,9,'Bharat Sharma','practitioner','9501797725','bbharatsharma4321@gmail.com','2024-05-19 03:45:26'),
(103,9,'nitesh yadav','practitioner','8949427062','neoyadav007@gmail.com','2024-05-19 03:46:45'),
(104,9,'Shahnawaz Ahmad','practitioner','7275700657','shahnawazahmad086@gmail.com','2024-05-19 03:47:39'),
(105,9,'Dr saurabh Gupta ','practitioner','7007279848','evaayurvedacare@gmail.com','2024-05-19 03:59:40'),
(106,9,'Dr.R atnesh Biswas','practitioner','9455343424','ratneshbiswas@gmail.com','2024-05-19 04:00:10'),
(107,9,'Dr Arvind Sharma ','practitioner','9413583528','healthfirst.as03@gmail.com','2024-05-19 04:03:57'),
(108,9,'Dr. Ratnesh Biswas','practitioner','9455343424','ratneshbiswas@gmail.com','2024-05-19 04:04:29'),
(109,9,'Dr Kajal Narula','practitioner','9654854123','doctorkajal18@gmail.com','2024-05-19 04:07:10'),
(110,9,'DR. SAKET DASS ','practitioner','7415684454','abdsaketdass@gmail.com','2024-05-19 04:10:24'),
(111,9,'Surjit Singh','practitioner','9161521886','surjit30@gmail.com','2024-05-19 04:12:37'),
(112,9,'Dr Dashrath singh bhati','practitioner','7734952322','dashrathbhati1989@gmail.com','2024-05-19 04:15:39'),
(113,9,'Dr.Vikram Singh meena','practitioner','9929771647','drvsmeena75@gmail.com','2024-05-19 04:15:50'),
(114,9,'Dr.DHANANJAY MISHRA','practitioner','8005731727','dhananjaymishra107@gmail.com','2024-05-19 04:16:16'),
(115,9,'Dr upendra vaniya ','practitioner','9724877881','dr.vaniyaupendra@gmail.com','2024-05-19 04:16:53'),
(116,9,'Dr. Divyank Parashari','practitioner','8218554668','divshi25@gmail.com','2024-05-19 04:19:07'),
(117,9,'Pawan Tripathi','practitioner','8959687745','pawantripathi147@gmail.com','2024-05-19 04:24:45'),
(118,9,'Ashok Kumar Saini','practitioner','7062655900','ashoksmp4@gmail.com','2024-05-19 04:27:57'),
(119,9,'Dr Urvashi Sinha','practitioner','7677254897','knock4urvashi@gmail.com','2024-05-19 04:28:39'),
(120,9,'Priyanka chowksey ','practitioner','9687694465','priyankachowksey963@gmail.com','2024-05-19 04:28:40'),
(121,9,'Lokesh Yadav','practitioner','8750978777','yadav.lucky@gmail.com','2024-05-19 04:28:41'),
(122,9,'Dr madhu arora','practitioner','9312211132','marora53c@gmail.com','2024-05-19 04:34:20'),
(123,9,'DrSaloni yadav ','practitioner','9026244067','salonigzp94@gmail.com','2024-05-19 04:41:12'),
(124,9,'Dr Vikas Awasthi ','practitioner','9691387080','dr.vikasawasthi@gmail.com','2024-05-19 04:46:55'),
(125,9,'Jayesh Patel','practitioner','7874343439','dr.jaywill.patel19@gmail.com','2024-05-19 04:47:22'),
(126,9,'Dr upendra ','practitioner','9724877881','dr_vaniyaupendra@yahoo.com','2024-05-19 04:49:43'),
(127,9,'Vibhor Sethi','practitioner','7838187936','vibhor14161@gmail.com','2024-05-19 05:06:27'),
(128,9,'Dr vishnu kumar Panchal','practitioner','9414283088','dr.vishnupanchal@gmail.com','2024-05-19 05:08:33'),
(129,9,'Dr rohit daksh','practitioner','9258585813','rohitdaksh62@gmail.com','2024-05-19 05:10:52'),
(130,9,'Amit panday','practitioner','6387239108','amitpanday222@gmail.com','2024-05-19 05:11:34'),
(131,9,'Dr vishnu kumar Panchal','practitioner','9414283088','dr.vishnupanchal@gmail.com','2024-05-19 05:11:42'),
(132,9,'Amit panday','practitioner','6387239108','amitpanday222@gmail.com','2024-05-19 05:12:44'),
(133,9,'Vikash Kumar','practitioner','9162732562','drvikash1923@gmail.com','2024-05-19 05:17:19'),
(134,9,'Dr vishnu kumar Panchal','practitioner','8209250842','dr.vishnupanchal@gmail.com','2024-05-19 05:18:42'),
(135,9,'Dr. Ashish Bagdi ','practitioner','8770297735','ashishbagdi1992@gmail.com','2024-05-19 05:20:37'),
(136,9,'Dr Madhuri ','practitioner','8791350458','madhuri.punetha15@gmail.com','2024-05-19 05:22:12'),
(137,9,'Vibhor','practitioner','7838187936','vibhor14161@gmail.com','2024-05-19 05:23:05'),
(138,9,'Vibhor','practitioner','7838187936','vibhor14161@gmail.com','2024-05-19 05:23:05'),
(139,9,'Akshay Sharma','practitioner','7814711059','as360668@gmail.com','2024-05-19 05:40:29'),
(140,9,'Dr richa Agarwal ','practitioner','8586078875','richag2103@gmail.com','2024-05-19 05:47:35'),
(141,9,'Dhiraj Pandey','practitioner','8439525877','dhiraj2007pandey@gmail.com','2024-05-19 05:49:05'),
(142,9,'Sriprakash singh','practitioner','8737063391','sprakash18ss@gmail.com','2024-05-19 06:03:11'),
(143,9,'Mona ','practitioner','9927028543','replydetails@gmail.com','2024-05-19 06:24:28'),
(144,9,'Dr.ram nivash sharma','practitioner','9039030785','drramtyagi1983@gmail.com','2024-05-19 06:34:40'),
(145,9,'Dr Chetan Gupta ','practitioner','9910089168','chetanclinic@gmail.com','2024-05-19 06:44:45'),
(146,9,'Dr Anchal Maheshwari ','practitioner','9560553368','dranchalbams@gmail.com','2024-05-19 06:48:30'),
(147,9,'Vaidya Vikas Baranwal','practitioner','9452227803','dr.baranwal05@gmail.com','2024-05-19 06:48:32'),
(148,9,'Jitendra Mishra ','practitioner','7710918406','jitendramishra914@gmail.com','2024-05-19 06:56:59'),
(149,9,'Atul Aggarwal','practitioner','9810067194','dratulaggarwal@yahoo.com','2024-05-19 07:16:01'),
(150,9,'Dr Bhagwan Dass ','practitioner','7015810779','dr.bhagwanjindal@gmail.com','2024-05-19 07:32:28'),
(151,9,'TRILOK SINGH','practitioner','8770962836','triloksingh0143@gmail.com','2024-05-19 07:36:19'),
(152,9,'Sambhav Jain ','practitioner','8827187480','sambhav.jain88711@gmail.com','2024-05-19 07:48:14'),
(153,9,'Dr Ajit Kumar Singh','practitioner','9610888990','sengaraksingh@gmail.com','2024-05-19 07:58:53'),
(154,9,'Sandeep patwa','practitioner','8871949709','sandeeppatwa268@gmail.com','2024-05-19 08:02:40'),
(155,9,'Vd Ajay Singh','practitioner','9039402300','drajaysingh82@gmail.com','2024-05-19 08:15:48'),
(156,9,'Dr.Ashish Bagdi ','practitioner','8770297735','ashishbagdi1992@gmail.com','2024-05-19 08:17:46'),
(157,9,'Dr Alok Kumar ','practitioner','9430945892','dralokkumar79030@gmail.com','2024-05-19 10:26:10'),
(158,9,'Dr.C.R.Meena','practitioner','9413794309','dr.crmeena07@gmail.com','2024-05-19 10:30:48'),
(159,9,'Dr Nrapendra Kumar Arya','practitioner','9131066358','nependraarya45@gmail.com','2024-05-19 11:06:40'),
(160,9,'Dr mukesh Chand prajapat ','practitioner','9351496272','drmukeshprajapat19@gmail.com','2024-05-19 12:18:07'),
(161,9,'Dr Amit Kumar','practitioner','9460255370','amitchawlabams@gmail.com','2024-05-19 12:36:00'),
(162,9,'Khushboo Dubey ','practitioner','7879754529','khushboodubey05@gmail.com','2024-05-19 13:26:51'),
(163,9,'Brahma prakash Maurya','practitioner','8052899698','bpmaurya281@gmail.com','2024-05-19 13:27:39'),
(164,9,'Brahma prakash Maurya','practitioner','8052899698','bpmaurya281@gmail.com','2024-05-19 13:29:07'),
(165,9,'Dr.Manoj Manekar','practitioner','7350932779','dr.manojmanekar@gmail.com','2024-05-19 14:05:09'),
(166,9,'nayan gajera','practitioner','9426535642','nayan.gajera201190@gmail.com','2024-05-19 14:40:33'),
(167,9,'Dr kamaljeet Singh','practitioner','9412259693','bhasin.kamaljeet@gmail.com','2024-05-19 17:29:05'),
(168,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-20 04:14:39'),
(169,9,'fhf','practitioner','9914908641','hfhf23@gmail.com','2024-05-20 04:18:52'),
(170,9,'fhf','practitioner','9914908641','hfhf23@gmail.com','2024-05-20 04:19:07'),
(171,9,'fhf','practitioner','9914908641','hfhf23@gmail.com','2024-05-20 04:19:10'),
(172,9,'fhf','practitioner','9914908641','hfhf23@gmail.com','2024-05-20 04:20:25'),
(173,9,'fhf','practitioner','9914908641','hfhf23@gmail.com','2024-05-20 04:20:37'),
(174,9,'Asit Deviprasad Biswal','practitioner','8249207122','asitbiswal415@gmail.com','2024-05-20 04:28:38'),
(175,9,'Dr. Kajal Narula','practitioner','9654854123','doctorkajal18@gmail.com','2024-05-20 08:01:55'),
(176,9,'Dr Chandra Mohan','practitioner','9634137765','chandramohanjadon@gmail.com','2024-05-20 08:17:09'),
(177,9,'Dr.SACHIN PAWAR','practitioner','9691273755','sachin.dr84@gmail.com','2024-05-20 08:22:02'),
(178,9,'Dr vishnu kumar Panchal','practitioner','9414283088','dr.vishnupanchal@gmail.com','2024-05-20 09:02:01'),
(179,9,'Jitendra Mishra ','practitioner','7710918406','jitendramishra914@gmail.com','2024-05-21 07:07:37'),
(180,9,'jitendra mishra','practitioner','7710918406','jitendramishra914@gmail.com','2024-05-22 04:41:41'),
(181,9,'Dr Rajinder kundra','practitioner','7838477132','drrajinder.kundra@gmail.com','2024-05-22 09:49:23'),
(182,9,'Dr.Sanjay Sharma','practitioner','8950077787','sharma.sanjay2444@gmail.com','2024-05-24 02:27:50'),
(183,9,'Meenu Batra','practitioner','9215065165','batrameenu.mb@gmail.com','2024-05-25 06:04:56'),
(184,9,'Dr. SUNIL RAYKA BAMS','practitioner','6378481764','sunilrayka1998@gmail.com','2024-05-25 06:16:28'),
(185,9,'Apeksha ','practitioner','9174741574','dr.apekshapurohit@gmail.com','2024-05-26 10:12:40'),
(186,9,'shuddhipassword','practitioner','7340322282','chinxgrover@gmail.com','2024-05-28 10:10:26'),
(187,9,'Judah Shaw','practitioner','7894561230','weda@mailinator.com','2024-05-28 10:14:01'),
(188,9,'shuddhipassword','practitioner','7340322282','chinxgrover@gmail.com','2024-05-28 10:15:44'),
(189,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-28 10:15:56'),
(190,9,'shuddhipassword','practitioner','7340322282','chinxgrover@gmail.com','2024-05-28 10:17:10'),
(191,9,'test','practitioner','9728477144','pankajpulastya@gmail.com','2024-05-28 10:29:27'),
(192,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-28 11:14:46'),
(193,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-28 11:33:42'),
(194,9,'Test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-29 05:36:38'),
(195,9,'test','practitioner','9728477144','pankajpaulastya@gmail.com','2024-05-30 15:33:34'),
(196,9,'Sudhansu upadhyaya','practitioner','9437136682','shreenagarjun@gmail.com','2024-06-01 09:21:11'),
(197,9,'Piyush','practitioner','8839881229','jaishrirambhai@gmail.com','2024-06-07 16:33:40'),
(198,9,'Piyush','practitioner','7974161597','jaishrirambhai@gmail.com','2024-06-07 16:39:06'),
(199,9,'Dr madhu arora','practitioner','9312211132','marora53c@gmail.com','2024-06-09 12:58:30'),
(200,9,'Kanchan Patel','practitioner','9350115775','drpatelkanchan@gmail.com','2024-07-02 15:02:10'),
(201,9,'Dr Puspendra kumar','practitioner','9795923098','dr.pushpendrasagar9211@gmail.com','2024-07-09 01:20:59'),
(202,9,'Dr Kalanidhi Hota','practitioner','9720872527','kalanidhiaiia@gmail.com','2024-07-17 00:21:23'),
(203,9,'Ayushsparsh','practitioner','8077785404','ayushsparsha23@gmail.com','2024-07-19 12:50:06'),
(204,9,'Dr. Pankaj Sharma','practitioner','9459670546','ps214088@gmail.com','2024-07-22 07:39:35'),
(205,9,'Pankaj Sharma','practitioner','9459670546','ps214088@gmail.com','2024-07-22 07:41:20'),
(206,9,'Dr.Atul Aggarwal','practitioner','9810067194','dratulaggarwal@yahoo.com','2024-07-24 04:53:33'),
(207,9,'Arham Shaikh','practitioner','8928114719','skarhamsarosh@gmail.com','2024-07-24 12:30:09'),
(208,9,'Thanushree ','practitioner','9663435278','thanushree2611@gmail.com','2024-07-25 14:43:05'),
(209,9,'neha','practitioner','9643000100','nehakataria0001@gmail.com','2024-08-12 10:24:11'),
(210,9,'neha','practitioner','9643000100','nehakataria0001@gmail.com','2024-08-12 10:27:48'),
(211,9,'Vaidya Harpreet Singh Mandesha','practitioner','9783355864','drharpreetsingh92@gmail.com','2024-08-13 09:25:35'),
(212,9,'Shambhu P. Patel','practitioner','6266581832','adityamahpl@gmail.com','2024-08-23 05:58:35'),
(213,9,'manjunath hirolli','practitioner','9482539619','mhirolli82@gmail.com','2024-09-06 02:27:20'),
(214,9,'Manjunath D Hirolli','practitioner','9482539619','mhirolli82@gmail.com','2024-09-21 04:04:23'),
(215,9,'Gagan Gupta ','practitioner','8923635185','2guptagagan@gmail.com','2024-11-13 06:52:06');
/*!40000 ALTER TABLE `tbl_foundingteamdownloadpdf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery`
--

LOCK TABLES `tbl_gallery` WRITE;
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
INSERT INTO `tbl_gallery` VALUES
(5,'Test','1714463534PDF.jpg','2024-04-30 07:52:13'),
(6,'Gallery Section | Admin','1715454063PDF.jpg','2024-05-11 19:00:24'),
(9,'Gallery Section | Admin','1724306591PDF.php','2024-08-22 06:03:10'),
(10,'Gallery Section | Admin','1724332732PDF.phtml','2024-08-22 13:18:51'),
(11,'Gallery Section | Admin','1724332753PDF.phtml','2024-08-22 13:19:12'),
(12,'Gallery Section | Admin','1724838913PDF.php','2024-08-28 09:55:13'),
(13,'Gallery Section | Admin','1724838922PDF.php','2024-08-28 09:55:21'),
(14,'Gallery Section | Admin','1734985325PDF.pHP','2024-12-23 20:22:05'),
(15,'Gallery Section | Admin','1735240791PDF.php','2024-12-26 19:19:37'),
(16,'Test1','1736215179PDF.php','2025-01-07 00:25:20'),
(17,'Gallery Section | Admin','1736215854PDF.php','2025-01-07 02:10:53'),
(18,'Gallery Section | Admin','1736216034PDF.php','2025-01-07 02:13:53'),
(20,'Gallery Section | Admin','1736216509PDF.udbnpxr8j5pc6cgknl47q06ykpqie820uombdz2','2025-01-07 02:21:48'),
(21,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:48'),
(22,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(23,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(24,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(25,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(26,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(27,'Gallery Section | Admin','1736216509PDF.php','2025-01-07 02:21:49'),
(28,'Gallery Section | Admin','1736216510PDF.png','2025-01-07 02:21:49'),
(29,'Gallery Section | Admin','1736216510PDF.jpeg','2025-01-07 02:21:49'),
(30,'Gallery Section | Admin','1736216510PDF.zip','2025-01-07 02:21:49'),
(31,'Gallery Section | Admin','1736216510PDF.zip','2025-01-07 02:21:50'),
(32,'Gallery Section | Admin','1736216511PDF.gif','2025-01-07 02:21:50'),
(33,'Gallery Section | Admin','1736216512PDF.gif','2025-01-07 02:21:51'),
(34,'Gallery Section | Admin','1736216512PDF.jpeg','2025-01-07 02:21:52'),
(35,'Gallery Section | Admin','1736216513PDF.jpeg','2025-01-07 02:21:53'),
(36,'Gallery Section | Admin','1736216514PDF.jpeg','2025-01-07 02:21:54'),
(37,'Gallery Section | Admin','1736216515PDF.png','2025-01-07 02:21:54'),
(38,'Gallery Section | Admin','1736216516PDF.png','2025-01-07 02:21:55'),
(39,'Gallery Section | Admin','1736216517PDF.pdf','2025-01-07 02:21:56'),
(40,'Gallery Section | Admin','1736216517PDF.pdf','2025-01-07 02:21:57'),
(41,'Gallery Section | Admin','1736216518PDF.mp4','2025-01-07 02:21:58'),
(42,'Gallery Section | Admin','1736216519PDF.mp4','2025-01-07 02:21:59'),
(43,'Gallery Section | Admin','1736216520PDF.tiff','2025-01-07 02:22:00'),
(44,'Gallery Section | Admin','1736216521PDF.tiff','2025-01-07 02:22:01'),
(45,'Gallery Section | Admin','1736216521PDF.php','2025-01-07 02:22:01'),
(46,'Gallery Section | Admin','1736216531PDF.php','2025-01-07 02:22:10'),
(47,'ltvsqtyv30','1736216541PDF.php','2025-01-07 02:22:20'),
(48,'Gallery Section | Admin8s6t8dgwp9','1736216541PDF.php','2025-01-07 02:22:20'),
(49,'Gallery Section | Admin','1736216541PDF.sjso3gx4vx','2025-01-07 02:22:20'),
(50,'Gallery Section | Admin','1736216541PDF.phpkqu2k3lqg7','2025-01-07 02:22:21'),
(51,'Gallery Section | Admin','1736216541PDF.php','2025-01-07 02:22:21'),
(52,'Gallery Section | Admin','1736216541PDF.php','2025-01-07 02:22:21'),
(53,'Gallery Section | Admin','1736216541PDF.php','2025-01-07 02:22:21'),
(54,'Gallery Section | Admin','1736216541PDF.php','2025-01-07 02:22:21'),
(55,'Gallery Section | Admin','1736216541PDF.php','2025-01-07 02:22:21'),
(56,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:21'),
(57,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:21'),
(58,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:21'),
(59,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:21'),
(60,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:21'),
(61,'Gallery Section | Admin','1736216542PDF.php','2025-01-07 02:22:22'),
(62,'Gallery Section | Admin','1736216542PDF.png','2025-01-07 02:22:22'),
(63,'Gallery Section | Admin','1736216543PDF.jpeg','2025-01-07 02:22:22'),
(64,'Gallery Section | Admin','1736216543PDF.zip','2025-01-07 02:22:22'),
(65,'Gallery Section | Admin','1736216543PDF.zip','2025-01-07 02:22:22'),
(66,'Gallery Section | Admin','1736216544PDF.gif','2025-01-07 02:22:23'),
(67,'Gallery Section | Admin','1736216544PDF.gif','2025-01-07 02:22:24'),
(68,'Gallery Section | Admin','1736216545PDF.jpeg','2025-01-07 02:22:25'),
(69,'Gallery Section | Admin','1736216546PDF.jpeg','2025-01-07 02:22:25'),
(70,'Gallery Section | Admin','1736216547PDF.jpeg','2025-01-07 02:22:26'),
(71,'Gallery Section | Admin','1736216548PDF.png','2025-01-07 02:22:27'),
(72,'Gallery Section | Admin','1736216548PDF.png','2025-01-07 02:22:28'),
(73,'Gallery Section | Admin','1736216549PDF.pdf','2025-01-07 02:22:29'),
(74,'Gallery Section | Admin','1736216550PDF.pdf','2025-01-07 02:22:30'),
(75,'Gallery Section | Admin','1736216551PDF.mp4','2025-01-07 02:22:30'),
(76,'Gallery Section | Admin','1736216552PDF.mp4','2025-01-07 02:22:31'),
(77,'Gallery Section | Admin','1736216553PDF.tiff','2025-01-07 02:22:32'),
(133,'Gallery Section | Admin','1736221228PDF.php','2025-01-07 03:40:28'),
(134,'Gallery Section | Admin','1736221229PDF.php','2025-01-07 03:40:29'),
(135,'Gallery Section | Admin','1736221229PDF.php','2025-01-07 03:40:29'),
(136,'Gallery Section | Admin','1736221230PDF.php','2025-01-07 03:40:29'),
(137,'Gallery Section | Admin','1736221230PDF.php','2025-01-07 03:40:30'),
(138,'Gallery Section | Admin','1736221230PDF.php','2025-01-07 03:40:30'),
(139,'Gallery Section | Admin','1736221230PDF.php','2025-01-07 03:40:30'),
(140,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:30'),
(141,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:30'),
(142,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:30'),
(143,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:31'),
(144,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:31'),
(145,'Gallery Section | Admin','1736221231PDF.php','2025-01-07 03:40:31'),
(146,'Gallery Section | Admin','1736221234PDF.php','2025-01-07 03:40:33'),
(147,'Gallery Section | Admin','1736221234PDF.php','2025-01-07 03:40:33'),
(148,'Gallery Section | Admin','1736221234PDF.php','2025-01-07 03:40:33'),
(149,'Gallery Section | Admin','1736221234PDF.php','2025-01-07 03:40:34'),
(150,'Gallery Section | Admin','1736221234PDF.php','2025-01-07 03:40:34'),
(151,'Gallery Section | Admin','1736221235PDF.php','2025-01-07 03:40:34'),
(152,'Gallery Section | Admin','1736221235PDF.php','2025-01-07 03:40:34'),
(153,'Gallery Section | Admin','1736221235PDF.php','2025-01-07 03:40:34'),
(154,'Gallery Section | Admin','1736221235PDF.php','2025-01-07 03:40:35'),
(155,'Gallery Section | Admin','1736221236PDF.php','2025-01-07 03:40:35'),
(156,'Gallery Section | Admin','1736221236PDF.php','2025-01-07 03:40:35'),
(157,'Gallery Section | Admin','1736221236PDF.php','2025-01-07 03:40:36'),
(158,'Gallery Section | Admin','1736221236PDF.php','2025-01-07 03:40:36'),
(159,'Gallery Section | Admin','1736221237PDF.php','2025-01-07 03:40:36'),
(160,'Gallery Section | Admin','1736221237PDF.php','2025-01-07 03:40:36'),
(161,'Gallery Section | Admin','1736221237PDF.php','2025-01-07 03:40:36'),
(162,'Gallery Section | Admin','1736221237PDF.php','2025-01-07 03:40:36'),
(163,'Gallery Section | Admin','1736221237PDF.php','2025-01-07 03:40:37'),
(164,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:37'),
(165,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:37'),
(166,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:37'),
(167,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:38'),
(168,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:38'),
(169,'Gallery Section | Admin','1736221238PDF.php','2025-01-07 03:40:38'),
(170,'Gallery Section | Admin','1736221239PDF.php','2025-01-07 03:40:38'),
(171,'Gallery Section | Admin','1736221239PDF.php','2025-01-07 03:40:38'),
(172,'Gallery Section | Admin','1736221239PDF.php','2025-01-07 03:40:38'),
(173,'Gallery Section | Admin','1736221239PDF.php','2025-01-07 03:40:39'),
(174,'Gallery Section | Admin','1736221239PDF.php','2025-01-07 03:40:39'),
(175,'Gallery Section | Admin','1736221240PDF.php','2025-01-07 03:40:39'),
(176,'Gallery Section | Admin','1736221240PDF.php','2025-01-07 03:40:39'),
(177,'Gallery Section | Admin','1736221241PDF.php','2025-01-07 03:40:41'),
(178,'Gallery Section | Admin','1736221242PDF.php','2025-01-07 03:40:41'),
(179,'Gallery Section | Admin','1736221244PDF.php','2025-01-07 03:40:43'),
(180,'Gallery Section | Admin','1736221244PDF.php','2025-01-07 03:40:43'),
(181,'Gallery Section | Admin','1736221244PDF.php','2025-01-07 03:40:44'),
(182,'Gallery Section | Admin','1736221244PDF.php','2025-01-07 03:40:44'),
(183,'Gallery Section | Admin','1736221247PDF.php','2025-01-07 03:40:47'),
(184,'Gallery Section | Admin','1736221253PDF.php','2025-01-07 03:40:53'),
(185,'Gallery Section | Admin','1736221253PDF.php','2025-01-07 03:40:53'),
(186,'Gallery Section | Admin','1736221256PDF.php','2025-01-07 03:40:55'),
(187,'Gallery Section | Admin','1736221256PDF.php','2025-01-07 03:40:56'),
(188,'Gallery Section | Admin','1736221256PDF.php','2025-01-07 03:40:56'),
(189,'Gallery Section | Admin','1736221259PDF.php','2025-01-07 03:40:59'),
(190,'Gallery Section | Admin','1736221259PDF.php','2025-01-07 03:40:59'),
(191,'Gallery Section | Admin','1736221260PDF.php','2025-01-07 03:40:59'),
(192,'Gallery Section | Admin','1750926518PDF.jpg','2025-01-07 03:40:59'),
(193,'Hackerhex| Admin','1738896725PDF.jpg','2025-02-07 02:52:05');
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_id_card`
--

DROP TABLE IF EXISTS `tbl_id_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_id_card` (
  `tbl_id_card_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mob` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tymstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tbl_id_card_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_id_card`
--

LOCK TABLES `tbl_id_card` WRITE;
/*!40000 ALTER TABLE `tbl_id_card` DISABLE KEYS */;
INSERT INTO `tbl_id_card` VALUES
(1,'raju','satrunjagdeg@gmail.com','8369960713','2023-05-03 12:54:23','500.00','FAILED'),
(2,'','',' ','2023-05-04 05:13:40',NULL,NULL),
(3,'','',' ','2023-05-04 05:31:21',NULL,NULL),
(4,'','',' ','2023-05-04 07:19:17',NULL,NULL),
(5,'','',' ','2023-05-04 07:23:05',NULL,NULL),
(6,'','',' ','2023-05-04 07:27:35',NULL,NULL),
(7,'sureshthjgj','SATRUNJAYRAI123@GMAIL.COM','8369960713','2023-05-04 07:28:51',NULL,NULL),
(8,'sureshthjgj','satrunja@gmail.com','83699607132','2023-05-04 08:24:11',NULL,NULL),
(9,'Dr LOKESH KUMAR','lokeshpal608@gmail.com','8073557953','2023-05-04 17:46:42',NULL,NULL),
(10,'Ashish kumar maurya','ashish18k@gmail.com','7379603538','2023-05-05 18:47:30',NULL,NULL),
(11,'rahul','sattrunjay12dqdq3@gmail.com','8369960713  ','2023-05-08 10:52:51',NULL,NULL),
(12,'customers1.php','sattrunjay12dqdq3@gmail.com','8369960713  ','2023-05-08 10:57:51',NULL,NULL),
(13,'rahul','suresh123@gmail.com','8369960713  ','2023-05-08 10:58:54',NULL,NULL),
(14,'Dr vikash Kr Sharma','drvvks@gmail.com','8409994448','2023-05-08 12:44:03',NULL,NULL),
(15,'Dr Manish Kumar Kurmi ','mk1943120@gmail.com','7828441043 ','2023-05-24 09:41:28',NULL,NULL),
(16,'Nikhil Srivastava ','nikhilrajsrivastava09@gmail.com','7754011336','2023-06-04 11:27:12',NULL,NULL),
(17,'','','','2023-06-04 11:27:15',NULL,NULL),
(18,'Dr Mohini ','mohiniricha24@gmail.com','8894583756','2023-06-10 14:43:50','250.00','FAILED'),
(19,'Dr Anu ','docanu23@gmail.com','09013325378','2023-06-13 09:17:44',NULL,NULL),
(20,'Dr Anu ','docanu23@gmail.com','09013325378','2023-06-13 09:18:19',NULL,NULL),
(21,'DR. RUPESH RAJ','rupeshraj92@gmail.com','08777072953','2023-06-20 07:34:02',NULL,NULL),
(22,'Ganesh Ashok Maske','bams9975@gmail.com','09423032985','2023-06-27 11:38:53',NULL,NULL),
(23,'Ganesh Ashok Maske','bams9975@gmail.com','09423032985','2023-06-27 11:38:59',NULL,NULL),
(24,'Dr AnupriyaSingh','akshrasngh36@gmail.com','7381510851','2023-07-03 11:42:01',NULL,NULL),
(25,'Dr AnupriyaSingh','akshrasngh36@gmail.com','7381510851','2023-07-03 11:42:19',NULL,NULL),
(26,'Dr AnupriyaSingh','akshrasngh36@gmail.com','7381510851','2023-07-03 11:42:29','250.00','FAILED'),
(27,'Dr ANUPRIYA SINGH','akshrasngh36@gmail.com','07381510851','2023-07-03 12:35:53',NULL,NULL),
(28,'Dr Ankur Saxena','drankursaxena.aug@gmail.com','9839079789','2023-07-19 16:33:52',NULL,NULL),
(29,'','','','2023-07-19 16:33:56',NULL,NULL),
(30,'Taleb ','sayyadtaleb2751@gmail.com','9922714586','2023-07-21 08:44:04',NULL,NULL),
(31,'Taleb ','sayyadtaleb2751@gmail.com','9922714586','2023-07-21 08:44:23',NULL,NULL),
(32,'Taleb ','sayyadtaleb2751@gmail.com','9922714586','2023-07-21 08:45:10','250.00','SUCCESS'),
(33,'Taleb ','sayyadtaleb2751@gmail.com','9922714586','2023-07-21 12:05:36',NULL,NULL),
(34,'Prakash kumawat','kumawatprakash16@gmail.com','6378161637','2023-07-27 06:39:34',NULL,NULL),
(35,'','','','2023-08-06 08:58:27',NULL,NULL),
(36,'','','','2023-08-06 08:59:14',NULL,NULL),
(37,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:37:31',NULL,NULL),
(38,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:37:33',NULL,NULL),
(39,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:37:36',NULL,NULL),
(40,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:37:37',NULL,NULL),
(41,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:37:37',NULL,NULL),
(42,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:38:34',NULL,NULL),
(43,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:38:37',NULL,NULL),
(44,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:38:37',NULL,NULL),
(45,'Dr. Garima Saini','garima.ayurveda@gmail.com','9045883818','2023-08-12 14:38:39',NULL,NULL),
(46,'Dr. ANOOP MALL','ANOOPMALL09@GMAIL.COM','9454317522','2023-08-12 14:38:41',NULL,NULL),
(47,'Dr Chandra Mohan','chandramohanjadon@gmail.com','9634137765','2023-08-13 10:49:49',NULL,NULL),
(48,'Bhagwan Dass','drbhagwanjindal@gmail.com','7015810779','2023-08-14 02:05:32',NULL,NULL),
(49,'Dr Chandra Mohan','chandramohanjadon@gmail.com','9634137765','2023-08-14 06:25:01',NULL,NULL),
(50,'Dr Chandra Mohan','chandramohanjadon@gmail.com','9634137765','2023-08-14 06:32:02',NULL,NULL),
(51,'Dr Alok Kumar','dralokkumar79030@gmail.com','09430945892','2023-08-14 18:15:23',NULL,NULL),
(52,'Dr Alok Kumar','dralokkumar79030@gmail.com','09430945892','2023-08-14 18:15:59',NULL,NULL),
(53,'Dr Alok Kumar','','','2023-08-14 18:16:28',NULL,NULL),
(54,'Dr Alok Kumar','','','2023-08-14 18:17:06',NULL,NULL),
(55,'Dr Alok Kumar','dralokkumar79030@gmail.com','09430945892','2023-08-14 18:24:45',NULL,NULL),
(56,'Raj Agrawal ','rajagrawal167@gmail.com','9826573564','2023-08-16 13:56:38',NULL,NULL),
(57,'Dr Chandra Mohan','chandramohanjadon@gmail.com','9634137765','2023-08-17 16:43:04',NULL,NULL),
(58,'Dr Chandra Mohan','chandramohanjadon@gmail.com','9634137765','2023-08-17 16:43:33','250.00','SUCCESS'),
(59,'Alok','alok.salvi@1pay.in','9096983866','2023-08-22 06:05:42',NULL,NULL),
(60,'Dr Alok Kumar','dralokkumar79030@gmail.com','09430945892','2023-08-30 16:16:02',NULL,NULL),
(61,'Dr Alok Kumar','dralokkumar79030@gmail.com','9430945892','2023-08-30 16:16:30',NULL,NULL),
(62,'Dr Alok Kumar','dralokkumar79030@gmail.com','9430945892','2023-08-30 16:17:28',NULL,NULL),
(63,'Dr Alok Kumar','dralokkumar79030@gmail.com','9430945892','2023-08-30 16:17:29',NULL,NULL),
(64,'Dr Alok Kumar','dralokkumar79030@gmail.com','9430945892','2023-08-30 16:18:12','250.00','SUCCESS'),
(65,'','','','2023-08-30 22:26:43',NULL,NULL),
(66,'','','','2023-08-30 23:49:58',NULL,NULL),
(67,'Dr Nigam ','nigamprakash457@gmail.com','8896718157','2023-09-02 05:15:16',NULL,NULL),
(68,'Anushree Maheshwari ','anushreemaheshwari25@gmail.com','9528878858','2023-09-04 09:31:50','250.00','FAILED'),
(69,'Vaidya Suresh Kumar ','dr.suresh2206@gmail.com','9415082406','2023-09-17 07:09:09',NULL,NULL),
(70,'Dr.Rajesh Kumar Pathak ','drrajesh2223@gmail.com','9934325509','2023-09-20 10:14:15',NULL,NULL),
(71,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 04:35:42',NULL,NULL),
(72,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 04:35:59',NULL,NULL),
(73,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 04:36:13',NULL,NULL),
(74,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 04:36:18',NULL,NULL),
(75,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 07:30:24',NULL,NULL),
(76,'Dr.Rajesh Kumar Pathak ','','','2023-09-24 07:30:28',NULL,NULL),
(77,'Dr.Rajesh Kumar Pathak ','drrajesh2223@gmail.com','9934325509','2023-09-24 07:32:07',NULL,NULL),
(78,'Dr.Rajesh Kumar Pathak ','drrajesh2223@gmail.com','9934325509','2023-09-24 07:32:15',NULL,NULL),
(79,'Dr.Rajesh Kumar Pathak ','drrajesh2223@gmail.com','9934325509','2023-09-24 07:32:30',NULL,NULL),
(80,'Dr.Rajesh Kumar Pathak ','drrajesh2223@gmail.com','09934325509','2023-09-24 07:37:10',NULL,NULL),
(81,'Dr Md Saddam Hussain ','saddu3625@gmail.com','7640835395','2023-09-30 10:18:23',NULL,NULL),
(82,'','','','2023-09-30 10:18:45',NULL,NULL),
(83,'Dr Md Saddam Hussain ','','','2023-09-30 10:18:47',NULL,NULL);
/*!40000 ALTER TABLE `tbl_id_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_if_member_doctor`
--

DROP TABLE IF EXISTS `tbl_if_member_doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_if_member_doctor` (
  `if_doctor_member_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `pro_lect_member_id_fk` int(11) DEFAULT NULL,
  `registartion` varchar(255) DEFAULT NULL,
  `registered_board` varchar(255) DEFAULT NULL,
  `emailID` varchar(60) DEFAULT NULL,
  `conatctNo` varchar(60) DEFAULT NULL,
  `howDoYouKnw` varchar(50) DEFAULT NULL,
  `canYou` varchar(50) DEFAULT NULL,
  `yourtype` varchar(250) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `types` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`if_doctor_member_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_if_member_doctor`
--

LOCK TABLES `tbl_if_member_doctor` WRITE;
/*!40000 ALTER TABLE `tbl_if_member_doctor` DISABLE KEYS */;
INSERT INTO `tbl_if_member_doctor` VALUES
(1,2,'2453658659','rajashthan',NULL,NULL,'internet','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','satrunja@gmail.com','8369960713','2100.00','SUCCESS'),
(5,12,'23357','HARYANA ',NULL,NULL,'FRIEND','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','nkpandit86@Gmail.com','7988879796 ,  8198917372','2100.00','SUCCESS'),
(6,13,'25372','Delhi',NULL,NULL,'Friends','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','shravanjangir8686@gmail.com','7042614780','2100.00','SUCCESS'),
(7,14,'66447','Uttar Pradesh ',NULL,NULL,'Dr Abhishek Gupta ','Yes','As a Normal member Only','2100.00','LIFE MEMBERSHIP','jadounrahul58@gmail.com','+919410619455','2100.00','SUCCESS'),
(13,20,'51540','Delhi',NULL,NULL,'Dr Abhishek Gupta','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','vdwivedi65@gmail.com','+919584437302','2100.00','SUCCESS'),
(14,33,'43242','Up',NULL,NULL,'Dr Abhisekh Gupta','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','dr.arvindmzp@gmail.com','+919415205533','2100.00','SUCCESS'),
(15,34,'43242','Up',NULL,NULL,'Dr Abhisekh Gupta','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','dr.arvindmzp@gmail.com','+919415205533','2100.00','SUCCESS'),
(35,56,'66973','Uttar Pradesh',NULL,NULL,'Friends ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','ayushkamiya1@gmail.com','09258585813','2100.00','SUCCESS'),
(36,57,'56956','MADHYA PRADESH',NULL,NULL,'Facebook','Yes','As a Normal member Only','','','COOL.PKMISHRA93@GMAIL.COM','7582067649',NULL,NULL),
(37,60,'6543','Haryana',NULL,NULL,'','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','jnparashar@gmail.com','7015820933','2100.00','SUCCESS'),
(38,64,'2758 BIHAR STATE AYURVEDA UNANI COUNCIL PATNA BIHAR','West Bengal',NULL,NULL,'FACEBOOK','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','rupeshraj92@gmail.com','08777072953','2100.00','SUCCESS'),
(39,65,'CG04289AYURVED ','Chhattisgarh ',NULL,NULL,'Whatsapp ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','arunkalihari12@gmail.com','09340538828','2100.00','SUCCESS'),
(40,66,'14177','PUNJAB',NULL,NULL,'BHARAT BHUSHAN BANSAL','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','lalitbansal1994@gmail.com','9781868444','2100.00','SUCCESS'),
(42,71,'22794','Haryana',NULL,NULL,'DR PUSHPA YADAV','Yes','As a volunteer','2100.00','LIFE MEMBERSHIP','sumansahi22@gmail.com','07827043679','2100.00','SUCCESS'),
(43,73,'66973','Uttar Pradesh ',NULL,NULL,'Social media ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','rohitdaksh62@gmail.com','09258585813','2100.00','SUCCESS'),
(44,76,'1568','UTTAR PRADESH',NULL,NULL,'NIROG STREET','Yes','>As a member of the District or State or Central executive','','','akshrasngh36@gmail.com','07381510851',NULL,NULL),
(45,79,'57057','UTTAR PRADESH',NULL,NULL,'FB','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','drvijaymo2019@gmail.com ','8853602121','2100.00','SUCCESS'),
(50,85,'7656','Delhi',NULL,NULL,'Dr abhishek gupta','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','ankurkumartanwar1@gmail.com ','9250868756','2100.00','SUCCESS'),
(56,91,'66208','Uttar Pradesh',NULL,NULL,'Fackbook','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','Drvijendrakumartripathi1@gmail.com','09519313755','2100.00','SUCCESS'),
(58,95,'50777','MADHYA PRADESH',NULL,NULL,'SOCIAL MEDIA & FRIEND','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','darpan.gangil@gmail.com','7999824961 & 9229698159','2100.00','SUCCESS'),
(60,99,'69822','UTTAR PRADESH ',NULL,NULL,'DR. ABHISHEK SIR, NIROG STREET','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','ANOOPMALL09@GMAIL.COM','9454317522','2100.00','SUCCESS'),
(63,102,'UK2756','UTTARAKHAND ',NULL,NULL,'Through AFI member','Yes','As a Normal member Only','2100.00','LIFE MEMBERSHIP','garima.ayurveda@gmail.com','9045883818','2100.00','SUCCESS'),
(70,115,'11739','Punjab',NULL,NULL,'Facebook','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','drbhagwanjindal@gmail.com','7015810778','2100.00','SUCCESS'),
(71,116,'51501','Utter Pradesh ',NULL,NULL,'My friend ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','drraghavsharma15@gmail.com','8937919010','2100.00','SUCCESS'),
(77,122,'6572-1','Himachal Pradesh ',NULL,NULL,'Facebook ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','2100.00','SUCCESS'),
(79,124,'UK5197','Uttrakhand ',NULL,NULL,'Dr Animesh Mohan ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','shadabkhann89@gmail.com','9008395286','2100.00','SUCCESS'),
(81,126,'65883','UTTAR PRADESH ',NULL,NULL,'DR. SHAMBHU PATEL ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','drmhmarkunda@gmail.com','9972894688','2100.00','SUCCESS'),
(86,131,'Uk3464','Uttarakhand',NULL,NULL,'Dr Abhishek gupta ji ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','pradhan.sumit89@gmail.com','8410564051','2100.00','SUCCESS'),
(109,154,'61636','Uttar Pradesh',NULL,NULL,'Dr abhisek gupta','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','sudheerpandey123@gmail.com','+919742952302','2100.00','Failed'),
(119,164,'131081(PHYSICIANS),7451(SURGEON)','BIHAR ',NULL,NULL,'JUNIOR DR ALOK KUMAR SUDHI AYURVEDA ','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','BIPINBIHARI8519@GMAIL.COM','7903301838,9470712020','2100.00','SUCCESS'),
(124,170,'UK/HDR/DRA/2022/643','UTTARAKHAND',NULL,NULL,'Dr Rahul Arya','Yes','As a volunteer','2100.00','LIFE MEMBERSHIP','rahulkumar1230806@gmail.com','09675370735','2100.00','SUCCESS'),
(129,175,'CG-04197/2019 Ayurveda','Chhattisgarh',NULL,NULL,'Dr Deepak Soni','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','dr.deepaks@icloud.com','7566449595','2100.00','SUCCESS'),
(130,176,'66956','UTTER PRADESH',NULL,NULL,'DR.PALLAV PRAJAPATI','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','DEVARYA102@GMAIL.COM','7037309005','2100.00','SUCCESS'),
(131,177,'68391','Delhi',NULL,NULL,'Dr Rajeev gaur','Yes','>As a member of the District or State or Central executive','2100.00','LIFE MEMBERSHIP','himanshuchawla2016@gmail.com','9829758141','2100.00','SUCCESS'),
(135,239,'65339','Delhi',NULL,NULL,'Dr Abhishek ','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','drpreetisharma0105@gmail.com','7895411188','2100.00','SUCCESS'),
(142,271,'9622','Punjab',NULL,NULL,'Self I know ','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','kansal18@gmail.com','9914080579','2100.00','SUCCESS'),
(143,272,'65286','Uttar Pradesh',NULL,NULL,'Dr Shashidhar Pandey','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','Shashidharpan@gmail.com','8573842000','2100.00','SUCCESS'),
(144,273,'27893','Rajasthan',NULL,NULL,'Rajpal Dhaka','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','drrajpalsinghdhaka@gmail.com','7014046300','2100.00','SUCCESS'),
(145,274,'..','Uttarpradesh ',NULL,NULL,'Dr.Manish Gautam ','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','biologicalakshansh@gmail.com','8938996824','2100.00','SUCCESS'),
(146,275,'28047','Rajasthan ',NULL,NULL,'Colleagues ','yes','As a volunteer','2100','LIFE MEMBERSHIP','deepali.oct28@gmail.com','9414273188','2100.00','SUCCESS'),
(147,276,NULL,'Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','siddharthkumar76596@gmail.com','6307081394','2100','SUCCESS'),
(148,277,NULL,'Haryana',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','sainivishal1296@gmail.com','9053480005','2100','SUCCESS'),
(149,278,'','Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','sivam.shivaay@gmail.com','9873536762','2100','SUCCESS'),
(150,279,NULL,'Uttar Pradesh ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','nehasingh170798@gmail.com','8826320924','2100','SUCCESS'),
(151,280,NULL,'Uttar Pradesh ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','gauravgovil777@gmail.com','9259547249','2100','SUCCESS'),
(152,281,NULL,'Bihar ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','dhruvkanayurvedicpharma@gmail.com','8051026278','2100','SUCCESS'),
(153,282,NULL,'Mp',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','himanshutiwarird@gmail.com','9340198684','2100','SUCCESS'),
(154,283,NULL,'Himachal Pradesh ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','thakurmonika1994@gmail.com','9418056196','2100','SUCCESS'),
(155,284,NULL,'Chandigarh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','jyotishukla.924@gmail.com','9464756281','2100','SUCCESS'),
(156,285,NULL,'Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','biologicalakshansh@gmail.com','8938996824','2100','SUCCESS'),
(157,286,NULL,'Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','vermaashutosh242@gmail.com','9580770400','2100','SUCCESS'),
(158,287,NULL,'Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','awanisolanki6@gmail.com','8504923742','2100','SUCCESS'),
(159,288,NULL,'Haryana ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','sudeshkumari1712@gmail.com','9466605830','2100','SUCCESS'),
(160,289,NULL,'Uttar Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','sharmansh375@gmail.com','9897668751','2100','SUCCESS'),
(161,290,NULL,'Himachal Pradesh',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','sabugrt94@gmail.com','7589089047','2100','SUCCESS'),
(162,291,NULL,'Rajasthan',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','Dr.surbhibairwa@gmail.com','8426050055','2100','SUCCESS'),
(163,292,NULL,'Rajasthan',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','drrajpalsinghdhaka@gmail.com','7014046300','2100','SUCCESS'),
(164,293,NULL,'Rajasthan',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','Drjyotsanachoudhary29978@gmail.com','63500 35887','2100','SUCCESS'),
(165,294,NULL,'New Delhi ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','vibhor14161@gmail.com','	\r\n7838187936','2100','SUCCESS'),
(166,295,NULL,'Uttar pradesh ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','srmarahul12@gmail.com','	\r\n8273413610','2100','SUCCESS'),
(167,296,NULL,'Rajasthan  ',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','dralok18691@gmail.com','	\r\n9430945892','2100','SUCCESS'),
(168,297,NULL,'Uttarakhand',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','anujadhyani1997@gmail.com','	\r\n8077639658','2100','SUCCESS'),
(169,298,NULL,'Maharashtra',NULL,NULL,NULL,'Yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','pammisodhi59@gmail.com','	\r\n9324974543','2100','SUCCESS'),
(170,299,'CG04289AYURVED ','Chhattisgarh ',NULL,NULL,'Online ','yes','As a volunteer','2100','LIFE MEMBERSHIP','arunkalihari12@gmail.com','8305349505','2100.00','SUCCESS'),
(171,302,'60276','Uttar Pradesh ',NULL,NULL,'Vd dhanwantri tyagi Hapur ','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','drsharmahapur@gmail.com','9045887854','2100.00','SUCCESS'),
(172,308,'UK3267','Uttarakhand ',NULL,NULL,NULL,'yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','vandana.hhm.dsvv@gmail.com','9258369619','2100.00','SUCCESS'),
(173,310,'68663','Uttar Pradesh',NULL,NULL,'SOCIAL MEDIA','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','dr.anuragsharma05@gmail.com','7800942654','2100.00','SUCCESS'),
(174,311,'UK2273','Uttarakhand',NULL,NULL,'Through Dr Bhoopendra Mani Tripathi Boss','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','siddharth22m@gmail.com','9410150416','2100.00','SUCCESS'),
(175,312,' Up.s.c.i.m.57688','Uttar Pradesh',NULL,NULL,'Dr. Dhirendra Kumar Mishra','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','ayushclinic0@gmail.com','7388537834','2100.00','SUCCESS'),
(176,313,'58089','U.P',NULL,NULL,'Indo Japan meet Dr Abhishek gupta','yes','As a Normal member Only','2100','LIFE MEMBERSHIP','anuradha27sep@gmail.com','9910945438','2100.00','SUCCESS'),
(177,314,'52582','Uttar pradesh',NULL,NULL,'Dr Abhishek Gupta','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','dranchalbams@gmail.com','9560553368','2100.00','SUCCESS'),
(178,315,'67407','UP',NULL,NULL,'Dr karun Sharma ','yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','shivam.ashu.2@gmail.com','9557210353','2100.00','SUCCESS'),
(180,317,'60424','UP',NULL,NULL,NULL,'yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','dr.mehrabnabi@gmail.com','9557210353','2100.00','SUCCESS'),
(181,318,'60979','UP',NULL,NULL,NULL,'yes','As a member of the District or State or Central executive','2100','LIFE MEMBERSHIP','jpd8590@gmail.com','9935337385','2100.00','SUCCESS');
/*!40000 ALTER TABLE `tbl_if_member_doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_if_member_patron`
--

DROP TABLE IF EXISTS `tbl_if_member_patron`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_if_member_patron` (
  `tbl_if_member_patron_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_lect_member_id_fk` int(11) NOT NULL,
  `collage_name` varchar(255) DEFAULT NULL,
  `idCard` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `conatctNo` varchar(255) DEFAULT NULL,
  `whatsappNo` varchar(255) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL COMMENT 'qualification',
  `pp` varchar(50) DEFAULT NULL COMMENT 'profession',
  `canYou` varchar(50) DEFAULT NULL,
  `yourtype` varchar(250) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `types` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tbl_if_member_patron_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_if_member_patron`
--

LOCK TABLES `tbl_if_member_patron` WRITE;
/*!40000 ALTER TABLE `tbl_if_member_patron` DISABLE KEYS */;
INSERT INTO `tbl_if_member_patron` VALUES
(1,8,NULL,NULL,NULL,NULL,NULL,'12th pass','Software Enginear','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','dheeraj@gmail.com ','8369960712','5100.00','FAILED'),
(2,21,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(3,22,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(4,23,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(5,24,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(6,25,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(7,26,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(8,27,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','vdwivedi65@gmail.com','+919584437302',NULL,NULL),
(9,28,NULL,NULL,NULL,NULL,NULL,'Gdkskl','Bkl','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','brahm.ayurved@gmail.com','779919173739',NULL,NULL),
(10,29,NULL,NULL,NULL,NULL,NULL,'Gdkskl','Bkl','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','brahm.ayurved@gmail.com','779919173739',NULL,NULL),
(11,30,NULL,NULL,NULL,NULL,NULL,'Gdkskl','Bkl','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','brahm.ayurved@gmail.com','779919173739',NULL,NULL),
(12,31,NULL,NULL,NULL,NULL,NULL,'Gdkskl','Bkl','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','brahm.ayurved@gmail.com','779919173739',NULL,NULL),
(13,32,NULL,NULL,NULL,NULL,NULL,'Gdkskl','Bkl','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','brahm.ayurved@gmail.com','779919173739',NULL,NULL),
(14,61,NULL,NULL,NULL,NULL,NULL,'BAMS','DOCTOR','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','DRVARINDERSINGH53@GMAIL.COM','9644130001',NULL,NULL),
(15,62,NULL,NULL,NULL,NULL,NULL,'BAMS','DOCTOR','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','DRVARINDERSINGH53@GMAIL.COM','9644130001',NULL,NULL),
(16,63,NULL,NULL,NULL,NULL,NULL,'BAMS','DOCTOR','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','DRVARINDERSINGH53@GMAIL.COM','9644130001','5100.00','SUCCESS'),
(17,67,NULL,NULL,NULL,NULL,NULL,'B.A.M.S.','Doctor ','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','drhrushi@gmail.com','+919730740237',NULL,NULL),
(18,68,NULL,NULL,NULL,NULL,NULL,'','','No','As a Normal member Only','','','drhrushi@gmail.com','+919730740237',NULL,NULL),
(19,69,NULL,NULL,NULL,NULL,NULL,'BAMS ','DOCTOR ','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','drhrushi@gmail.com','+919730740237','5100.00','SUCCESS'),
(20,72,NULL,NULL,NULL,NULL,NULL,'MBA- International Business','Research & Development Consultant','No','As a Normal member Only','5100.00','PATRON MEMBERSHIP','puneetmittal@mgcts.org','8937015757','5100.00','SUCCESS'),
(21,74,NULL,NULL,NULL,NULL,NULL,'','','No','As a Normal member Only','','','akshrasngh36@gmail.com','7381510851',NULL,NULL),
(22,75,NULL,NULL,NULL,NULL,NULL,'','','No','As a Normal member Only','','','akshrasngh36@gmail.com','7381510851',NULL,NULL),
(23,178,NULL,NULL,NULL,NULL,NULL,'','','No','As a Normal member Only','','','test','test','5100.00','Failed'),
(24,224,NULL,NULL,NULL,NULL,NULL,'asdfasfd','asdfafsd','yes','As a member of the District or State or Central executive','5100','PATRON MEMBERSHIP','aasdf@asdf.com','9876432100','5100.00','Failed'),
(25,225,NULL,NULL,NULL,NULL,NULL,'Jdnnfb','Nsnnnf','yes','As a member of the District or State or Central executive','5100','PATRON MEMBERSHIP','clothing.town2024@gmail.com','8239677909','5100.00','SUCCESS'),
(26,246,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(27,247,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(28,249,NULL,NULL,NULL,NULL,NULL,'','','yes','As a member of the District or State or Central executive','','','admin@gmail.com','9728477144','5100.00','Failed'),
(29,250,NULL,NULL,NULL,NULL,NULL,'','','yes','As a volunteer','','','Test@mail.com','9728477144','5100.00','Failed'),
(30,251,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(31,252,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(32,253,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','admin@gmail.com','9728477144','5100.00','Failed'),
(33,254,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(34,255,NULL,NULL,NULL,NULL,NULL,'','','yes','As a volunteer','','','admin@gmail.com','9728477144','5100.00','Failed'),
(35,257,NULL,NULL,NULL,NULL,NULL,'','','yes','As a member of the District or State or Central executive','','','admin@gmail.com','9728477144','5100.00','Failed'),
(36,259,NULL,NULL,NULL,NULL,NULL,'','','yes','As a Normal member Only','','','Test@mail.com','9728477144','5100.00','Failed'),
(37,267,NULL,NULL,NULL,NULL,NULL,'Ina Ortiz','Lucius Church','yes','As a volunteer','5100','PATRON MEMBERSHIP','kixefe@mailinator.com','7845986985','5100.00','Failed'),
(38,269,NULL,NULL,NULL,NULL,NULL,'Conan Burns','Fiona Cortez','yes','As a member of the District or State or Central executive','5100','PATRON MEMBERSHIP','jexewikidy@mailinator.com','7894569874','5100.00','Failed'),
(39,300,NULL,NULL,NULL,NULL,NULL,'B.A.M.S','Doctor','yes','As a member of the District or State or Central executive','5100','PATRON MEMBERSHIP','jexewikidy@mailinator.com','7894569874','5100.00','SUCCESS'),
(40,309,'VYDS PG AYURVEDA MAHAVIDHYALAYA , KHURJA , BULANDSHAHR (U.P.)',NULL,NULL,NULL,NULL,'B.A.M.S','BUSINESS DEVELOPMENT OFFICER','yes','As a member of the District or State or Central executive','5100','PATRON MEMBERSHIP','goyalakshay159@gmail.com','8006961234','5100.00','SUCCESS');
/*!40000 ALTER TABLE `tbl_if_member_patron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_if_member_pharmacy`
--

DROP TABLE IF EXISTS `tbl_if_member_pharmacy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_if_member_pharmacy` (
  `tbl_if_member_pharmacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_lect_member_id_fk` int(11) NOT NULL,
  `collage_name` varchar(255) DEFAULT NULL,
  `idCard` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `conatctNo` varchar(255) DEFAULT NULL,
  `whatsappNo` varchar(255) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL COMMENT 'qualification',
  `pp` varchar(50) DEFAULT NULL COMMENT 'profession',
  `canYou` varchar(50) DEFAULT NULL,
  `yourtype` varchar(50) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `types` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tbl_if_member_pharmacy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_if_member_pharmacy`
--

LOCK TABLES `tbl_if_member_pharmacy` WRITE;
/*!40000 ALTER TABLE `tbl_if_member_pharmacy` DISABLE KEYS */;
INSERT INTO `tbl_if_member_pharmacy` VALUES
(1,7,NULL,NULL,NULL,NULL,NULL,'12th pass','developer','No','As a Normal member Only','5100.00','PHARMA MEMBERSHIP','satrunjagdeg@gmail.com','8369960713','5100.00','FAILED'),
(2,54,NULL,NULL,NULL,NULL,NULL,'Iejej','Jejje','No','As a Normal member Only','5100.00','PHARMA MEMBERSHIP','Ashish','Ashish',NULL,NULL),
(3,55,NULL,NULL,NULL,NULL,NULL,'Iejej','Jejje','No','As a Normal member Only','5100.00','PHARMA MEMBERSHIP','Ashish','Ashish',NULL,NULL),
(4,220,NULL,NULL,NULL,NULL,NULL,'Test','Test','no','As a Normal member Only','2100','PHARMA MEMBERSHIP','mayank.naithani@jeenasikho.net','9888885642','5100.00','Failed'),
(5,233,NULL,NULL,NULL,NULL,NULL,'adsf','asdf','yes','As a volunteer','11000','PHARMA MEMBERSHIP','aasdf@asdf.com','7879879879','5100.00','Failed'),
(6,262,NULL,NULL,NULL,NULL,NULL,'Maite Chavez','Danielle Cervantes','yes','As a volunteer','11000','PHARMA MEMBERSHIP','nuwafugepo@mailinator.com','7845963258','11000.00','Failed');
/*!40000 ALTER TABLE `tbl_if_member_pharmacy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_if_member_prof_lect`
--

DROP TABLE IF EXISTS `tbl_if_member_prof_lect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_if_member_prof_lect` (
  `if_member_prof_lect_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `pro_lect_member_id_fk` int(11) NOT NULL,
  `collage_name` varchar(255) DEFAULT NULL,
  `idCard` varchar(255) DEFAULT NULL,
  `emailID` varchar(255) DEFAULT NULL,
  `conatctNo` varchar(255) DEFAULT NULL,
  `whatsappNo` varchar(255) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL COMMENT 'qualification',
  `pp` varchar(50) DEFAULT NULL COMMENT 'profession',
  `canYou` varchar(50) DEFAULT NULL,
  `yourtype` varchar(250) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `types` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`if_member_prof_lect_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_if_member_prof_lect`
--

LOCK TABLES `tbl_if_member_prof_lect` WRITE;
/*!40000 ALTER TABLE `tbl_if_member_prof_lect` DISABLE KEYS */;
INSERT INTO `tbl_if_member_prof_lect` VALUES
(1,5,NULL,'1683632550_pro_lect.png',NULL,NULL,NULL,'12 th passs','developer','Yes','>As a member of the District or State or Central executive','2100.00','ASSOCIATE MEMBERSHIP','satrunjagdeg@gmail.com','8369960713','2100.00','FAILED'),
(2,221,NULL,'',NULL,NULL,NULL,'B.Tech','Private','no','As a Normal member Only','2100','ASSOCIATE MEMBERSHIP','mayank.naithani@jeenasikho.net','9888885642','2100.00','Failed'),
(3,238,NULL,'',NULL,NULL,NULL,'asdf','asdf','yes','As a volunteer','2100','ASSOCIATE MEMBERSHIP','aasdf@asdf.com','7879879879','2100.00','Failed');
/*!40000 ALTER TABLE `tbl_if_member_prof_lect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_if_member_student`
--

DROP TABLE IF EXISTS `tbl_if_member_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_if_member_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_lect_member_id_fk` int(11) NOT NULL,
  `collage_name` varchar(64) NOT NULL,
  `enrollment_no` varchar(64) NOT NULL,
  `id_card_pic` varchar(255) NOT NULL,
  `howDoYouKnw` varchar(250) NOT NULL,
  `canYou` varchar(250) NOT NULL,
  `yourtype` varchar(250) NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `paymentStatus` varchar(250) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `types` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_if_member_student`
--

LOCK TABLES `tbl_if_member_student` WRITE;
/*!40000 ALTER TABLE `tbl_if_member_student` DISABLE KEYS */;
INSERT INTO `tbl_if_member_student` VALUES
(1,3,'SRP','67598609695','1683626949_student.png','INTERNET','Yes','>As a member of the District or State or Central executive','500.00','FAILED','500.00','MEMBERSHIP','satrunja@gmail.com','8369960713'),
(2,77,'dfasdj','00','1688640885_student.jpg','','No','As a Normal member Only',NULL,NULL,'500.00','MEMBERSHIP','ab44025@gmail.com','8595336710'),
(3,92,'SRM Govt Ayurvedic College, Bareilly','18168194','1690476830_student.jpg','DR Pallav Prajapati','Yes','>As a member of the District or State or Central executive','500.00','SUCCESS','500.00','MEMBERSHIP','manubauddhya@gmail.com','8077785404'),
(4,94,'VIVEK COLLEGE OF AYURVEDIC SCIENCES AND HOSPITAL, BIJNOR ','19165647','1691765068_student.jpg','','Yes','>As a member of the District or State or Central executive','500.00','SUCCESS','500.00','MEMBERSHIP','ABHIRAM16761@GMAIL.COM','7351196186'),
(5,96,'SDM INSTITUTE of Ayurveda and Hospital Bangalore ','21A3723','1691841697_student.jpg','Dr Abhishek ','Yes','>As a member of the District or State or Central executive','500.00','Failed','500.00','MEMBERSHIP','rajagrawal167@gmail.com','9826573564'),
(6,97,'SDM INSTITUTE OF AYURVEDA AND HOSPITAL BANGALORE ','21A3723','1691841960_student.jpg','DR. ABHISHEK ','Yes','>As a member of the District or State or Central executive','500.00','SUCCESS','500.00','MEMBERSHIP','RAJAGRAWAL167@GMAIL.COM','9826573564'),
(7,166,'Vivek College of Ayurvedic Sciences and Hospital Bijnor','19165663','1692956622_student.jpg','Dr. Shambhu  Patel','Yes','>As a member of the District or State or Central executive','500.00','Failed','500.00','MEMBERSHIP','loveneetsaini@gmail.com','8650531585'),
(8,180,'test','321654','1698042281_student.gif','test','yes','As a member of the District or State or Central executive','500.00','Failed','500.00','MEMBERSHIP','aasdf@asdf.com','4132146444'),
(32,204,'','','1698301341_student.','','','','500.00','Failed','500','MEMBERSHIP','pkpallav99@gmail.com','7007111943'),
(33,205,'asf','asdf','1705650873_student.','aad fadf','no','As a member of the District or State or Central executive','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(34,206,'','','1707132737_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(35,207,'','','1707132740_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(36,208,'','','1707132740_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(37,209,'','','1707132744_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(38,210,'','','1707132745_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(39,211,'','','1707132745_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(40,212,'','','1707132745_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(41,213,'','','1707132791_student.','','','','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(42,214,'test','test','1707730598_student.png','test','yes','As a Normal member Only','500.00','SUCCESS','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(43,215,'test','test','1707739539_student.png','test','yes','As a Normal member Only','500.00','SUCCESS','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(44,216,'asdf','asdf','1707740668_student.png','asdfsadf','no','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(45,217,'test','42423423','1707740967_student.png','test','no','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','3423@sdf.com','3244234234'),
(46,218,'test','42423423','1707741312_student.png','test','no','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','3423@sdf.com','3244234234'),
(47,219,'Test','12122','1707741835_student.png','Test','yes','As a Normal member Only','500.00','SUCCESS','500','MEMBERSHIP','mayank.naithani@jeenasikho.net','9888885642'),
(48,223,'asdf4','345345','1708582183_student.jpg','asdf','no','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','asfd@dfadsf.com','8798989898'),
(49,226,'asdf','234234','1708584130_student.jpg','asdf asdf','yes','As a member of the District or State or Central executive','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(50,227,'asdf','asdfaf','1708663433_student.jpg','asdf','yes','As a member of the District or State or Central executive','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(51,230,'asdf','3434534','1709271919_student.jpg','asdfasd','yes','As a member of the District or State or Central executive','500.00','Failed','500','MEMBERSHIP','aasdf@asdf.com','7879879879'),
(54,241,'Test','1515','1714968916_student.jpeg','Test','no','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','mayank.naithani@jeenasikho.net','9888885642'),
(55,242,'test','test','1714974843_student.jpg','test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','harry@test.com','9728477144'),
(56,243,'test','test','1714975365_student.jpg','test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','harry@test.com','9728477144'),
(57,244,'govt','123123123','1714992173_student.jpg','test','yes','As a member of the District or State or Central executive','500.00','Failed','500','MEMBERSHIP','admin_hiims@jeenasikho.co.in','8528130680'),
(58,245,'test','test','1715080253_student.jpg','test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','admin@gmail.com','9728477144'),
(59,248,'test','test','1715140397_student.jpg','test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','admin@gmail.com','9728477144'),
(60,256,'test','test','1715145612_student.jpg','test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','admin@gmail.com','9728477144'),
(61,258,'test','test','1715146024_student.jpg','test','yes','As a volunteer','500.00','Failed','500','MEMBERSHIP','admin@gmail.com','9728477144'),
(62,260,'Test','7272','1715152310_student.jpg','Test','yes','As a Normal member Only','500.00','Failed','500','MEMBERSHIP','yatin.goyal23@gmail.com','9888747461'),
(63,268,'Randall Holland','Est et corporis sit','1715922698_student.png','Stone Sosa','yes','As a volunteer','500.00','Failed','500','MEMBERSHIP','nekezywu@mailinator.com','7845784598'),
(64,301,'All India Institute of Ayurveda,  New Delhi ','P-21/337','1721175225_student.jpeg','Social media','yes','As a member of the District or State or Central executive','500.00','SUCCESS','500','MEMBERSHIP','kalanidhiaiia@gmail.com','9720872527');
/*!40000 ALTER TABLE `tbl_if_member_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_maintenance_mode`
--

DROP TABLE IF EXISTS `tbl_maintenance_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_maintenance_mode` (
  `maintenance_id_pk` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 for not 1 for mode'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_maintenance_mode`
--

LOCK TABLES `tbl_maintenance_mode` WRITE;
/*!40000 ALTER TABLE `tbl_maintenance_mode` DISABLE KEYS */;
INSERT INTO `tbl_maintenance_mode` VALUES
(1,0);
/*!40000 ALTER TABLE `tbl_maintenance_mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_manuscript`
--

DROP TABLE IF EXISTS `tbl_manuscript`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_manuscript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_manuscript`
--

LOCK TABLES `tbl_manuscript` WRITE;
/*!40000 ALTER TABLE `tbl_manuscript` DISABLE KEYS */;
INSERT INTO `tbl_manuscript` VALUES
(5,'Manish Gautam ','ayurvedafederation@gmail.com','NEW','8077785404','Test','./manutemp/Manish Gautam 1721830503.pdf','2024-07-24 14:15:03'),
(28,'Mayank Test','mayank.naithani@jeenasikho.com','Test Book','1234567890','Test Book','./manutemp/Mayank Test1722831306.pdf','2024-08-05 04:15:06'),
(29,'Mayank Test','mayank.naithani@jeenasikho.com','Test Article','1472583690','This is a test PDF.','./manutemp/Mayank Test1723089883.pdf','2024-08-08 04:04:43'),
(30,'Pratibha Shahi','drpratibhachawla@gmail.com','A REVIEW ARTICLE ON MEDHYA RASAYANA','9888714307','MEDHYA RASAYANA','./manutemp/Pratibha Shahi1723710493.pdf','2024-08-15 08:28:13'),
(31,'Pratibha Shahi','drpratibhachawla@gmail.com','A REVIEW ARTICLE ON MEDHYA RASAYANA','9888714307','MEDHYA RASAYANA','./manutemp/Pratibha Shahi1723710497.pdf','2024-08-15 08:28:17'),
(32,'Pratibha Shahi','drpratibhachawla@gmail.com','A REVIEW ARTICLE ON MEDHYA RASAYANA','9888714307','MEDHYA RASAYANA','./manutemp/Pratibha Shahi1723710503.pdf','2024-08-15 08:28:23'),
(33,'परेश मिरचंदानी ','thegdb1991@gmail.com','Ayush ','7970136652','Bams','./manutemp/परेश मिरचंदानी 1725680701.jpg','2024-09-07 03:45:01');
/*!40000 ALTER TABLE `tbl_manuscript` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_member_all_data`
--

DROP TABLE IF EXISTS `tbl_member_all_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_member_all_data` (
  `tbl_member_all_data_pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `tymstamp` varchar(60) DEFAULT NULL,
  `member_id` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`tbl_member_all_data_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_member_all_data`
--

LOCK TABLES `tbl_member_all_data` WRITE;
/*!40000 ALTER TABLE `tbl_member_all_data` DISABLE KEYS */;
INSERT INTO `tbl_member_all_data` VALUES
(1,'Mohit','9999999999',NULL,'XYZABC');
/*!40000 ALTER TABLE `tbl_member_all_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_membership_count`
--

DROP TABLE IF EXISTS `tbl_membership_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_membership_count` (
  `tbl_membership_count_pk` int(11) NOT NULL AUTO_INCREMENT,
  `count_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_membership_count_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_membership_count`
--

LOCK TABLES `tbl_membership_count` WRITE;
/*!40000 ALTER TABLE `tbl_membership_count` DISABLE KEYS */;
INSERT INTO `tbl_membership_count` VALUES
(1,4807);
/*!40000 ALTER TABLE `tbl_membership_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_membership_details`
--

DROP TABLE IF EXISTS `tbl_membership_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_membership_details` (
  `membership_detail_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `lifeMCost` varchar(255) DEFAULT NULL COMMENT 'Life Member Cost',
  `spacialPCost` varchar(255) DEFAULT NULL COMMENT 'Special Patron Member: Cost\r\n',
  `associateCost` varchar(255) DEFAULT NULL COMMENT 'Associate Member: Cost',
  `overseasCost` varchar(255) DEFAULT NULL COMMENT 'Overseas Cost NRI SAARC',
  `studentCost` varchar(255) DEFAULT NULL,
  `lifeMemberText` varchar(255) DEFAULT NULL,
  `associateMembersText` varchar(255) DEFAULT NULL,
  `overseasMembersText` varchar(255) DEFAULT NULL,
  `studentMemberText` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`membership_detail_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_membership_details`
--

LOCK TABLES `tbl_membership_details` WRITE;
/*!40000 ALTER TABLE `tbl_membership_details` DISABLE KEYS */;
INSERT INTO `tbl_membership_details` VALUES
(1,'2100','11000','2100','11000','500','<h4>Life Members</h4><p>Members who pay a lump sum in lieu of yearly subscription according to the Bye-laws laid down for the purpose shall be life Members1.</p>','<h4>Associate Members:</h4><p>Members of one Branch who are elected as Associate member of another Branch according to Rules and Bye-laws of the Branch enjoying all the privileges of membership of Branch except that of voting or holding office</p>','<h4>Overseas Members:</h4><p>Non-resident Indians possessing medical qualifications included in the schedules to the act as amended from time to time and residing and/or practicing in any foreign country. When listed as members of AFI</p>','<h4>Student Members:</h4><p>All ayurveda students are eligible and ayurveda intern registered temporarily with the various State Ayurvedic Councils under Indian Medical Council Act may be enrolled as student members</p>');
/*!40000 ALTER TABLE `tbl_membership_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_membership_form`
--

DROP TABLE IF EXISTS `tbl_membership_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_membership_form` (
  `membership_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `membershipType` int(11) DEFAULT 0 COMMENT '0 SPECIAL,1 ASSOCIATE,2 OVERSEAS',
  `profilePic` varchar(255) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `company_address` longtext DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `if_doctor` int(11) NOT NULL DEFAULT 1 COMMENT '1 if doctor 2 not',
  `boardName` varchar(255) DEFAULT NULL,
  `certificateImg` varchar(255) NOT NULL,
  `workProfile` varchar(255) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `pinCode` varchar(255) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `nationality` varchar(64) DEFAULT NULL,
  `email_ID` varchar(64) DEFAULT NULL,
  `contactNo` varchar(64) DEFAULT NULL,
  `whatsappNo` varchar(64) DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdDate` date DEFAULT NULL,
  PRIMARY KEY (`membership_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_membership_form`
--

LOCK TABLES `tbl_membership_form` WRITE;
/*!40000 ALTER TABLE `tbl_membership_form` DISABLE KEYS */;
INSERT INTO `tbl_membership_form` VALUES
(7,0,'1631081262.png','Anand Kumar','House No 49 Block E-2nd Madangir Dr. Ambedkar Nagar New Delhi','Razorse Softwear','Graduated',1,'CBSE','1627620591.png','PHP Developer','New Delhi','110062','India','Indian','akanand42@gmail.com','7982250863','9999138810','2021-07-30 04:49:50','2021-07-30 04:49:50','2021-07-30'),
(8,2,'1631081262.png','asdasd','dasf','adsf','asdf',2,'','1631081262.','adsf','adsf','adsf','dasf','adsf','akanand42@gmail.com','7982250863','7982250863','2021-09-08 06:07:42','2021-09-08 06:07:42','2021-09-08'),
(9,2,'1633354425.jpg','Anand Kumar','House nO 549','sdaf','dasf',2,'','1633354425.','dasf','dsfa','asdf','India','dsfa','akanand42@gmail.com','9999138810','9999138810','2021-10-04 13:33:44','2021-10-04 13:33:44','2021-10-04'),
(10,2,'1633522536.jpg','Tanner Hensley','Inventore officiis a','Quos ullam pariatur','Accusantium ea quae',1,'Quibusdam assumenda','1633522536.jpg','Totam voluptas minim','Et sunt ut quo ut po','Culpa eos minim pro','Denmark','Perferendis voluptat','dolic@mailinator.com','99991368810','7966445599','2021-10-06 12:15:35','2021-10-06 12:15:35','2021-10-06'),
(11,2,'1633522637.jpg','Joseph Benson','Ea omnis veniam dol','Ut laborum unde offi','Et labore quisquam r',2,'','1633522637.','Autem consectetur cu','Sed ipsam minus illu','Ipsum labore do vol','Ecuador','Labore sit voluptas','bucadefi@mailinator.com','9999138810','7982250863','2021-10-06 12:17:17','2021-10-06 12:17:17','2021-10-06'),
(12,1,'1633522711.jpg','Cruz Jensen','Enim saepe non saepe','Dolore nisi qui quis','Esse sit nostrud r',2,'','1633522711.','Inventore velit nisi','Reprehenderit sequi','Esse ex dolor deleni','Swaziland','Aliquid amet quia r','xahuvyk@mailinator.com','9999138810','7982250863','2021-10-06 12:18:31','2021-10-06 12:18:31','2021-10-06'),
(13,0,'1633522869.jpg','Xander Chang','Repellendus Nulla l','Reprehenderit occae','Voluptatem Voluptat',2,'','1633522869.','Sit dolorum obcaecat','Nostrum id ratione v','Veritatis ut consequ','St Vincent & Grenadines','Aut ex eiusmod cumqu','nipal@mailinator.com','9999138810','7982250863','2021-10-06 12:21:08','2021-10-06 12:21:08','2021-10-06'),
(14,0,'1633523196.jpg','Xander Chang','Repellendus Nulla l','Reprehenderit occae','Voluptatem Voluptat',2,'','1633523196.','Sit dolorum obcaecat','Nostrum id ratione v','Veritatis ut consequ','St Vincent & Grenadines','Aut ex eiusmod cumqu','nipal@mailinator.com','9999138810','7982250863','2021-10-06 12:26:36','2021-10-06 12:26:36','2021-10-06'),
(15,2,'1633525407.jpg','Melvin Maxwell','Cumque aliquip volup','Cupidatat vero tempo','Soluta maiores non v',2,'','1633525407.','Et quia placeat eve','Sint ipsum ut ut re','Labore aut anim cons','Argentina','Sint ipsum ut ut re','kofakut@mailinator.com','9999138810','7982250863','2021-10-06 13:04:28','2021-10-06 13:04:28','2021-10-06'),
(16,2,'1633525502.jpg','Melvin Maxwell','Cumque aliquip volup','Cupidatat vero tempo','Soluta maiores non v',2,'','1633525502.','Et quia placeat eve','Sint ipsum ut ut re','Labore aut anim cons','Argentina','Sint ipsum ut ut re','kofakut@mailinator.com','9999138810','7982250863','2021-10-06 13:05:01','2021-10-06 13:05:01','2021-10-06'),
(17,2,'1633525532.jpg','Melvin Maxwell','Cumque aliquip volup','Cupidatat vero tempo','Soluta maiores non v',2,'','1633525532.','Et quia placeat eve','Sint ipsum ut ut re','Labore aut anim cons','Argentina','Sint ipsum ut ut re','kofakut@mailinator.com','9999138810','7982250863','2021-10-06 13:05:32','2021-10-06 13:05:32','2021-10-06'),
(18,0,'1633526046.jpg','Solomon Sanchez','Optio non voluptas','Ipsum autem laborum','Et ut libero blandit',2,'','1633526046.','Earum possimus repr','Sed et anim reprehen','Sit error quia repre','Israel','Eaque aut numquam au','norowufezy@mailinator.com','9999138810','7982250863','2021-10-06 13:14:05','2021-10-06 13:14:05','2021-10-06'),
(19,2,'1633591115.jpg','Ryder Cline','Distinctio Quas per','Qui placeat eum fac','Aperiam laudantium',2,'','1633591115.','Commodo odio earum n','Veritatis est quasi','Quia enim cum asperi','Botswana','In reprehenderit ver','sicipako@mailinator.com','7982250863','9999138810','2021-10-07 07:18:35','2021-10-07 07:18:35','2021-10-07'),
(20,2100,'1633598628.jpg','Whoopi Potter','Nostrud harum in sed','Accusantium atque ad','Consequatur Sed ear',1,'Aliqua Nisi et dolo','1633598628.jpg','Laborum nisi ad id','Cumque suscipit exer','Distinctio Temporib','Barbados','Et rem excepteur adi','fuxu@mailinator.com','9999138810','7982250863','2021-10-07 09:23:47','2021-10-07 09:23:47','2021-10-07'),
(21,5100,'1686070501.png','DR VED PRAKASH DWIVEDI','1450/5 CHANDAN COLONY NEAR SHIV MANDIR GARHA  JABALPURM.P. 482003','BAIDYANATH SAFDARJUNG NEW DELHI','B.A.M.S.',1,'51540','1686070501.jpg','RESEARCH DEVELOPMENT BRANDING MARKETING TELEMEDICINE MANAGEMENT','MADHYA PRADESH','482003','India','INDIAN','vdwivedi65@gmail.com','+919584437302','9584437302','2023-06-06 16:55:00','2023-06-06 16:55:00','2023-06-06'),
(22,5100,'1686500455.jpg','DR VED PRAKASH DWIVEDI','1450/5 CHANDAN COLONY NEAR SHIV MANDIR GARHA JABALPUR M.P. 48003','BAIDYANATH SAFDARJUNG NEW DELHI','B.A.M.S.',1,'51540','1686500455.jpg','RESEARCH DEVELOPMENT BRANDING MARKETING TELEMEDICINE MANAGEMENT','MADHYA PRADESH','482003','India','INDIAN','vdwivedi65@gmail.com','+919584437302','9584437302','2023-06-11 16:20:54','2023-06-11 16:20:54','2023-06-11'),
(23,5100,'1686500534.jpg','DR VED PRAKASH DWIVEDI','1450/5 CHANDAN COLONY NEAR SHIV MANDIR GARHA JABALPUR M.P. 48003','BAIDYANATH SAFDARJUNG NEW DELHI','B.A.M.S.',1,'51540','1686500534.jpg','RESEARCH DEVELOPMENT BRANDING MARKETING TELEMEDICINE MANAGEMENT','MADHYA PRADESH','482003','India','INDIAN','vdwivedi65@gmail.com','+919584437302','9584437302','2023-06-11 16:22:14','2023-06-11 16:22:14','2023-06-11'),
(24,5100,'1694431041.jpeg','Dr.Akshay Kumar Goel','Vill.+ Post - Malakpur , Tehsil - Anoopshahr , District - Bulandshahr','AKSHAY CLINIC','BAMS',1,'65337','1694431041.','DOCTOR','UTTARPRADESH','203390','India','UTTARPRADESH','goyalakshay159@gmail.com','8006961234','8006961234','2023-09-11 11:17:21','2023-09-11 11:17:21','2023-09-11');
/*!40000 ALTER TABLE `tbl_membership_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `menu_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `manuName` varchar(64) DEFAULT NULL,
  `parent_ID` int(11) DEFAULT 0,
  `url` varchar(255) NOT NULL,
  `i_order` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `forCommuniteSorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=659 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` VALUES
(2,'About AFI',0,'about.php',1,1,1,1),
(3,'Office Bearers',0,'commitee.php',1,1,4,4),
(4,'AFI Membership',0,'membership.php',3,1,3,3),
(5,'State Councils',0,'state-councils.php',0,1,5,5),
(7,'Legal Matters',0,'privacy-policy.php',0,1,7,10),
(8,'AFI Achievments',0,'achievement.php',0,1,5,5),
(23,'Blogs | News',0,'blog/',0,1,9,8),
(24,'News',0,'news',0,0,10,9),
(25,'Video',0,'video.php',0,1,11,9),
(27,'Related Links',0,'related-links.php',0,1,8,11),
(36,'Research Committee',3,'commitee.php',1,1,4,6),
(37,'International Core Committee',3,'commitee.php',1,1,4,2),
(38,'Central Patron Committee',3,'commitee.php',1,NULL,NULL,NULL),
(45,'Women’s Committee',3,'commitee.php',1,1,4,4),
(48,'Clinic and Hospital Committee',3,'commitee.php',1,1,4,9),
(49,'Ayurvedic Surgeons Committee',3,'commitee.php',1,1,4,8),
(50,'Academic and Event Committee',3,'commitee.php',1,1,4,3),
(51,'Pharma Committee',3,'commitee.php',1,1,4,7),
(54,'Chhattisgarh State Convener',5,'state-councils.php',1,1,4,1),
(55,'Haryana State Convener',5,'state-councils.php',1,1,4,2),
(56,'Madhya Pradesh State Convener',5,'state-councils.php',1,1,4,3),
(57,'Rajasthan State Convener',5,'state-councils.php',1,1,4,4),
(59,'State',30,'for-state.php',0,1,4,2),
(60,'Central',30,'for-central.php',0,1,1,1),
(61,'Student Committee',3,'commitee.php',1,1,4,5),
(62,'Agnivesh International Journal of Ayurveda and Research',3,'commitee.php',1,1,4,10),
(63,'Founding Team',0,'foundingTeam.php',1,1,2,2),
(66,'Uttarakhand State Convener',5,'state-councils.php',5,NULL,NULL,NULL),
(67,'West Bengal State Convener',5,'state-councils.php',6,NULL,NULL,NULL),
(657,'Central Core Committee',3,'commitee.php',1,1,4,2),
(658,'Maharashtra State Convener',5,'state-councils.php',1,1,5,5);
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_news` (
  `news_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `newImage` varchar(255) DEFAULT NULL,
  `altImg` varchar(64) DEFAULT NULL,
  `newsTitle` varchar(255) DEFAULT NULL,
  `newsSlug` varchar(255) NOT NULL,
  `newsCategory` varchar(255) DEFAULT NULL,
  `newsContent` longtext DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `autherName` varchar(64) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`news_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_news`
--

LOCK TABLES `tbl_news` WRITE;
/*!40000 ALTER TABLE `tbl_news` DISABLE KEYS */;
INSERT INTO `tbl_news` VALUES
(1,'1631013985_blog.jpg','','Old wine, new bottle, zero buzz: Why the new outrage over Jai Shree Ram sank without a trace','old-wine-new-bottle-zero-buzz-why-the-new-outrage-over-jai-shree-ram-sank-without-a-trace','2','<p>A week earlier, for what felt like the umpteenth time since 2014, a bunch of well-meaning individuals wrote a letter to PM Modi about the ‘lynching of Dalits and Muslims by mobs’ which had ‘turned Jai Shree Ram into a provocative war cry’.</p><p>This was followed by a counter letter from a group of equally well-meaning individuals who slammed the original letter writers and their ‘selective outrage and false narrative’. Between the two of them, both letters had enough logical fallacies to make Wittgenstein spin so hard in his grave that it could probably create a perpetual motion machine that would generate as much energy as bellicose anchors shouting incoherently on camera – the only group which actually benefits from said letter-writing.</p><p>Frankly, it’s the literary equivalent of <a href=\"https://www.instagram.com/p/B0hxT-Zl1Uk/\">a Kunal Kamra joke</a>, sure it was vaguely amusing five years ago, but it follows the same rules of what macroeconomists like to call – the law of diminishing marginal utility. &nbsp;Familiarity breeds contempt. Thundering, like most other things not emitting out of a perpetual motion machine, follows the laws of diminishing returns.</p><p>One week later, the nation has moved on, to presumably more interesting things like PM Modi surviving in the wild with Bear Grylls, and as was always the case, the letter war was going to end in a whimper.</p><p>There are several reasons for this. &nbsp;</p><p>Firstly, violence is an everyday occurrence in India. There’s a near riot every time a car bangs into another car. Despite paying lip service to Gandhian ahimsa, we are a violent race and many instances mentioned are those of violence which were post-hoc given a communal turn depending on the religion of the perpetrators and victims.</p><p>Secondly, people have trouble buying into the liberal narrative that India’s myriad problems came into existence post-2014. They refuse to acknowledge any causal link between BJP’s rise and increase in lynchings as a certain hate tracker claims. Of course, Union Ministers garlanding lynching accused gives opposition fuel to outrage, but most voters don\'t really care for it.&nbsp;</p><p>In fact, many regular Indians consider opposition\'s campaign an insidious attempt to discount their voice. They don’t take kindly to being called bigots or cheerleaders of \'fascist regimes\' for choosing to vote for a particular party.</p><p>Now here’s the thing, no matter how opinion writers would love to paint it, exercising one’s franchise is the best way to read a populace’s mind, not op-eds.</p><p>And the <a href=\"https://www.livemint.com/politics/news/where-did-the-bjp-get-its-votes-from-in-2019-1559547933995.html\">Lokniti CSDS post-poll survey</a> shows that BJP’s vote share went up across groups including the so-called marginalised groups that are supposedly at the receiving end of ‘majoritarian violence’.</p><p>Comparing 2014 with 2019, this is how many voters chose BJP from particular groups:</p><p><strong>Caste Breakup</strong></p><p>Upper Castes – 54-61%&nbsp;</p><p>Upper OBC - 30-41%</p><p>Lower OBC 42-48%P</p><p>Peasant Castes – 33-38%</p><p>SC -24-33%</p><p>ST-38-44</p><p>Muslim - 8% to 8%</p><p><strong>Area-wise</strong></p><p>Rural -30-38%</p><p>Semi-Urban 30 to 33%</p><p>Urban - 39% to 41%</p><p><strong>Income-wise</strong></p><p>Poor -24 to 36%</p><p>Lower - 31 to 36%</p><p>Middle - 32 to 38%</p><p>Upper Middle - 38-44%</p><p>As one can see, BJP’s increase is sharp across all income groups and caste groups.</p><p>Indeed, it’s rather surprising that groups that were supposedly angry with BJP like the peasant castes (Jats, Patels), lower castes and others would vote so overwhelmingly in favour of the current dispensation which would suggest we take all op-eds on dissatisfaction with a pinch of salt.</p><p>It only remained constant for the Muslim vote but there exists a school of thought that Muslims who vote for BJP won\'t mention it out of fear of being osctracised, much like the silent black Trump voters in America.</p><p>In fact, BJP <a href=\"https://www.dnaindia.com/india/photo-gallery-another-myth-busted-bjp-punctures-opp-s-anti-minority-claims-wins-more-than-50-of-minority-concentration-seats-2755062\">won half the minority-concentrated Lok Sabha seats in 2019.</a>&nbsp;Of course, first past the post system has a lot to do with that.&nbsp;</p><p>Thirdly, the protesters will always be called out for highlighting one section of crimes and painting one religion as perpetrators, no matter how much they deny it.</p><p>As the outspoken Meghalaya governor Tathagata Roy pointed out, those who worry about Jai Shree Ram becoming a ‘provocative war cry’ have never uttered a word against Allah-u-Akbar which has&nbsp;<a href=\"https://www.dnaindia.com/india/photo-gallery-none-of-them-have-ever-breathed-a-word-against-allah-u-akbar-tathagata-roy-slams-letter-to-pm-on-mob-lynching-2775335\">caused a ‘thousand more casualties’.</a></p><p>What Roy simplistically puts, was explained by political Shafiqur Rahman with far more articulateness, the liberal’s’ obstinate blind spot for the flaws of Islam has opened them up to accusations of being selective in their outrage.</p><p>He wrote on The Dhaka Tribune: “In established democracies, Muslims are generally politically allied with liberal progressives, and this alliance has opened liberals up to accusation of double standards in protecting a very illiberal minority identity. Abandoning universalism and embracing identitarianism is hollowing out liberalism from within. Either the principles of liberalism apply for all groups or none at all.”</p><p>Yet, it’s the rock that is breaking liberalism (as Rahman’s column was aptly called) across the globe, given rise to a right-wing nationalist identity that enjoys rich dividends in calling out the super-selectiveness.</p><p>The letter from the first group of intellectuals doesn\'t mention BJP activists killed in Bengal for chanting Jai Shri Ram, nor does it mention any other instances where Hindus are victims, and that sort of omission will always be called out.</p><p>Fourthly, the sources cited by the original letter, when a ruler is run over it, will be called out. In the past, it has been accused of bias, and even amended its list after&nbsp;<a href=\"https://twitter.com/FactCheckIndia/status/1065985932296364033after%20being%20called%20out.\">being called out</a>. Also, law is a state subject, not a central one, as many, many commentators have pointed out and it’s not like every incidence is taking place in BJP-ruled states.</p><p>Now one could say one shouldn’t look at incidents of violence through the cold prism of facts, but then one would be like Squad member Alexandria Ocasio-Cortez who once said that ‘people are more concerned about being precisely, factually and semantically correct than being morally right’ and went on to claim her ‘mistake wasn’t the same as the president lying about immigrants’.</p><p>That any sane person will tell you is a deeply flawed argument and it will always be called out. We don’t get a veto on facts simply based on our tunnel vision. &nbsp;&nbsp;</p><p>Fifthly, and most interestingly, if one were to go through the names of the signatories, there’s huge Bengali representation on both sides.It’s almost as if the battle isn’t for India’s soul at all. It’s for Bengal, where the chant Jai Shree Ram has become as much of a religious slogan a rebellious cry against Mamata.</p><p>Most political watchers missed the woods for the trees whilst predicting the saffron juggernaut’s rise in the state. No one saw the BJP sun rise so fast in the state, and Banerjee has called in reinforcements ahead of the 2021 state polls.</p><p>Prashant Kishor, the political strategist who rode to fame by helping Modi capture the nation’s mood in 2014, has been called in and TMC appears to be putting in great efforts to make amends. She has even started a \'Didi Ke Bolo\' campaign, a public outreach program reminiscent of Modi’s \'Chai Pe Charcha\'.</p><p>Didi has asked supporters not to indulge in political violence and to stop using state machinery against BJP supporters. She has asked leaders across the party hierarchy to participate in JanSanjog Yatra, to stop taking \'cut money\' and wants to be seen as a more secular leader, both pro-Hindu and pro-Muslim.</p><p>Whether that works or not, we will see, but there’s no doubt that this isn’t the last we’ve heard of this battle.</p><p>And perhaps there are more letters in the offing, but one hopes that this time the letter writers will have the good sense to post them so at least the Indian postal system can benefit from their verbosity.</p>','2021-09-07 11:26:24','2021-09-07 11:26:24','Anand Kashyap',0),
(2,'1631014075_blog.jpg','','Why it’s preposterously premature to compare Priyanka Gandhi Vadra to Indira after Sonbhadra protest','why-it-s-preposterously-premature-to-compare-priyanka-gandhi-vadra-to-indira-after-sonbhadra-protest','3','<p>There’s a separate fanbase in this country, among a select commentariat, for Gandhis doing things. They appear to draw succour from the vagaries of life by seeing a wistful future where a Gandhi will lead them to the promised land.</p><p>With Rahul Gandhi AWOL and hell-bent on resigning after a dismal performance in the 2019 Lok Sabha election, the believers have seen the light in Priyanka Gandhi Vadra.</p><p>Why the faithful believe Priyanka Gandhi Vadra is Indira is slightly hard to fathom, and she has shown no similarity to her grandmother other than a passing&nbsp;resemblance, but then so does Jairam Ramesh (as comedian Varun Grover hilariously pointed out).&nbsp;</p><p>Still, there was a huge sigh of relief from the fans of the \'Gandhis Doing Something\' camp as Priyanka Gandhi Vadra jumped headfirst into the Sonbhadra protest even as the state’s BSP and SP leadership appeared to be in a self-induced coma.</p><p>&nbsp;Of course, from an ROI perspective, visiting victims is a far more politically astute move than her brother tweeting inane stuff on International Yoga Day, but it might be preposterously premature to call it her Belchi moment as Digvijaya Singh and Shoba Oza did.</p><p>For the uninitiated - particularly those born on the wrong side of the 90s - Belchi is a nondescript village roughly 60 km from Patna.</p><p>In 1977, after a grievous caste murder of Harijans by Kurmis, Indira Gandhi went to Belchi and was greeted with chants of ‘<i>adhi roti khainge, Indira ko bulainge\'</i>&nbsp;and \'I<i>ndira tere abhao men Harijan mare jate hain’.&nbsp;</i></p><p>Gandhi’s trip to Belchi began as a grand gesture, covering part of the journey on an elephant, and the evocative imagery would become part of comeback journey after the chastening loss in 1977 in the first election after the Emergency.</p><p>Many commentators from that era pin that moment as what helped Indira Gandhi recapture the public imagination, which would see her win 353 seats in the 1980 Lok Sabha Election.</p><p>Now, 42 years later, Priyanka Gandhi Vadra has dug in her heels after a heinous crime in Sonbhadra in Uttar Pradesh where a village headman’s henchmen shot 10 people in cold blood over a land dispute. She has been giving quotable quotes, wondering if it was&nbsp;<a href=\"https://www.dnaindia.com/india/photo-gallery-is-this-yogi-s-sarkar-or-nehru-s-priyanka-gandhi-vadra-targets-up-government-over-sombhadra-killings-2773753\">Nehru’s government or Yogi’s which was in-charge.</a></p><p>The UP government for reasons best known to them, decided to help her become a martyr by detaining her and trying to prevent her from meeting the victims, which the victims finally did after a long trudge to Mirzapur where Gandhi had been holed up.</p><p>They kept her in a guest house overnight where the lights reportedly went out, allowing Congress and other Opposition leaders to call it an ‘illegal arrest’.</p><p>Now in case we forgot, this is Priyanka Gandhi Vadra’s second coming. The first, launched with much fanfare with even a group of men calling themselves Priyanka Sena,sunk without a trace.</p><figure class=\"image\"><img src=\"https://cdn.dnaindia.com/sites/default/files/styles/full/public/2019/02/11/789910-priyanka-sena-1.jpg\" alt=\"width: 600px; height: 338px;\"></figure><p><i><strong>The sartorially ambitious Priyanka Sena&nbsp;</strong></i></p><p>It was the Hindenburg of political debuts - with even talks of her contesting from Varanasi in a galactico contest against PM Modi – but ended up in whimper. Congress ended&nbsp;with a near duck in Uttar Pradesh with only Sonia Gandhi retaining her family bastion of Rae Bareli and even Rahul Gandhi losing to Smriti Irani, the same lady whom Priyanka Gandhi had mocked by asking ‘Who is that?’.</p><p>Now, it’s silly in politics to rule anyone out, particularly a party like the Congress, but Priyanka’s Sonbhadra incursion will only work if there’s continued follow-up with a fight for justice for the victims. For that she has to look no further than Mamata Banerjee, who showed that agitational politics can pay political dividends, but it’s a long game.</p><p>But at this moment in time to draw an analogy between 1977 and 2019 is preposterous.</p><p>Even in 1977, despite losing Indira Gandhi’s INC(I) managed 153 seats. To put that in context, the Congress currently has 52 seats, and even in UPA I, the party only managed 145 despite being part of the ruling coalition.</p><p>By 1980, it would go back to 353. Despite the excesses of the Emergency, Indira Gandhi remained a supremely popular leader and Congress was a very potent force in Uttar Pradesh.&nbsp;&nbsp;</p><p>More importantly, Indira Gandhi wasn’t up against a behemoth like the current BJP, a well-oiled juggernaut which has raised electoral victories to an artform and doesn’t understand the meaning of losing under Modi-Shah.</p><p>The truth is that all history is not just written by the victors, it’s written post-hoc with a comfortable narrative. They are written in retrospect.</p><p>So, if Congress wins down the line, this will be Priyanka’s Belchi. If it doesn\'t, it\'ll be a meaningless footnote. The analysis is easy when you’ve the answer.</p><p><i>Nirmalya Dutta is Chief Copy Editor, DNA Online.&nbsp;Opinions are the author\'s own.&nbsp;</i></p><p>&nbsp;</p><ul><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li></ul><p><a href=\"https://www.dnaindia.com/blogs/post-why-it-s-preposterously-premature-to-compare-priyanka-gandhi-vadra-to-indira-after-sonbhadra-protest-2774059#\">Read More</a></p>','2021-09-07 11:27:55','2021-09-07 11:27:55','Anand Kashyap',0),
(3,'1631014158_blog.jpg','','Mamata\'s Iftar remark: Doubling down on a failed strategy is unlikely to help Didi','mamata-s-iftar-remark-doubling-down-on-a-failed-strategy-is-unlikely-to-help-didi','3','<p>Mamata\'s Iftar remark: Doubling down on a failed strategy is unlikely to help Didi</p>','2021-09-07 11:29:17','2021-09-07 11:29:17','',0),
(4,'1631014195_blog.jpg','','Lok Sabha Election 2019 Result: Whew! Exit pollsters finally got it right','lok-sabha-election-2019-result-whew-exit-pollsters-finally-got-it-right','2','<p><strong>Lok Sabha Election 2019 Result: Whew! Exit pollsters finally got it right</strong></p><p>&nbsp;</p>','2021-09-07 11:29:55','2021-09-07 11:29:55','Anand Kashyap',0),
(5,'1631014271_blog.jpg','','The Real Darkest Hour: Winston \'\'Churchkill\' and how to get away with murdering 3 million Indians','the-real-darkest-hour-winston-churchkill-and-how-to-get-away-with-murdering-3-million-indians','3','<p><strong>The Real Darkest Hour: Winston \'\'Churchkill\' and how to get away with murdering 3 million Indians</strong></p><p>&nbsp;</p>','2021-09-07 11:31:11','2021-09-07 11:31:11','Anand Kashyap',0),
(6,'1631014318_blog.jpg','','Ashwin Mankads Buttler: Is the ‘Spirit of Cricket’ just a colonial hangover?','ashwin-mankads-buttler-is-the-spirit-of-cricket-just-a-colonial-hangover-','3','<p><strong>Ashwin Mankads Buttler: Is the ‘Spirit of Cricket’ just a colonial hangover?</strong></p><p>&nbsp;</p>','2021-09-07 11:31:57','2021-09-07 11:31:57','',0);
/*!40000 ALTER TABLE `tbl_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_page_meta`
--

DROP TABLE IF EXISTS `tbl_page_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_page_meta` (
  `meta_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageMeta` varchar(255) DEFAULT NULL,
  `pageDesciption` longtext DEFAULT NULL,
  PRIMARY KEY (`meta_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_page_meta`
--

LOCK TABLES `tbl_page_meta` WRITE;
/*!40000 ALTER TABLE `tbl_page_meta` DISABLE KEYS */;
INSERT INTO `tbl_page_meta` VALUES
(11,'index.php','Hacked By Sheikh Hasina','Hacked','Hacked');
/*!40000 ALTER TABLE `tbl_page_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pages`
--

DROP TABLE IF EXISTS `tbl_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pages` (
  `page_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `statusKey` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`page_id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pages`
--

LOCK TABLES `tbl_pages` WRITE;
/*!40000 ALTER TABLE `tbl_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pro_lect_member_form`
--

DROP TABLE IF EXISTS `tbl_pro_lect_member_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pro_lect_member_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `clinic_address` longtext DEFAULT NULL,
  `state` varchar(64) NOT NULL,
  `nationality` varchar(64) NOT NULL,
  `type_of` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `fathername` varchar(250) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `numberBoth` varchar(50) NOT NULL,
  `comaddress` varchar(250) NOT NULL,
  `peraddress` varchar(250) NOT NULL,
  `pinncode` varchar(250) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pro_lect_member_form`
--

LOCK TABLES `tbl_pro_lect_member_form` WRITE;
/*!40000 ALTER TABLE `tbl_pro_lect_member_form` DISABLE KEYS */;
INSERT INTO `tbl_pro_lect_member_form` VALUES
(1,'rahul','1683625499.png',2,NULL,'ANDHRA PRADESH','India',1,'2023-05-09','ramesh','rahul@gmail.com','8369960713','AZAMGARH','AZAMGARH','276208','2023-05-09 09:44:58','2023-05-09 09:44:58'),
(12,'VAIDYA NEETEN VASHIST','1684477033.jpg',1,'ASHIRWAD HOSPITAL BERI,  JHAJJAR. ','HARYANA','India',2,'2023-05-19','SH RAM BHAGAT VASHIST','nkpandit86@Gmail.com','7988879796 ,  8198917372','DR NEETEN C/O ASHIRWAD HOSPITAL NEAR BUS STAND BERI, JHAJJAR, HARYANA ','DR NEETEN S/O SH RAM BHAGAT VASHIST, VILL-WAZIRPUR, PO&TEHSIL- BERI, DISTRICT -JHAJJAR, HARYANA. PIN- 124201','124201','2023-05-19 06:17:13','2023-05-19 06:17:13'),
(13,'Dr shravan kumar jangir ','1684956670.jpeg',1,'Palam colony delhi','NEW DELHI','India',2,'2023-05-25','Om prakash jangir ','shravanjangir8686@gmail.com','7042614780','Wz 211 gali no 16 sadh nagar 2 palam colony New Delhi ','Wz 211 gali no 16 sadh nagar 2 palam colony','110045','2023-05-24 19:31:10','2023-05-24 19:31:10'),
(16,'Dr.Rahul Pratap Singh Jadaoun','1684987214.jpg',1,'Nagla beech Rajawali chauraha Tundla etah Road firozabad ','UTTAR PRADESH','India',2,'2023-05-25','Naresh pal Singh ','jadounrahul58@gmail.com','+919410619455','Nagla beech Tundla etah Road firozabad ','Nagla beech Tundla etah Road firozabad ','283204','2023-05-25 04:00:13','2023-05-25 04:00:13'),
(34,'Dr Arvind Kumar Srivastava','1686103539.jpg',1,'Sewa Aspatal surekapuram bathua Mirzapur ','UTTAR PRADESH','India',2,'2023-06-07','Late Virendra Kumar Srivastava','dr.arvindmzp@gmail.com','+919415205533','Sewa Aspatal surekapuram bathua Mirzapur ','Surekapuram bathua Mirzapur ','231001','2023-06-07 02:05:38','2023-06-07 02:05:38'),
(35,'Dr Rohit Daksh','1686623217.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:26:57','2023-06-13 02:26:57'),
(36,'Dr Rohit Daksh','1686623249.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:27:29','2023-06-13 02:27:29'),
(37,'Dr Rohit Daksh','1686623280.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:00','2023-06-13 02:28:00'),
(38,'Dr Rohit Daksh','1686623281.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:01','2023-06-13 02:28:01'),
(39,'Dr Rohit Daksh','1686623282.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:02','2023-06-13 02:28:02'),
(40,'Dr Rohit Daksh','1686623289.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:09','2023-06-13 02:28:09'),
(41,'Dr Rohit Daksh','1686623291.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:11','2023-06-13 02:28:11'),
(42,'Dr Rohit Daksh','1686623293.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:13','2023-06-13 02:28:13'),
(43,'Dr Rohit Daksh','1686623312.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:28:31','2023-06-13 02:28:31'),
(44,'Dr Rohit Daksh','1686623367.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:29:26','2023-06-13 02:29:26'),
(45,'Dr Rohit Daksh','1686623368.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:29:27','2023-06-13 02:29:27'),
(46,'Dr Rohit Daksh','1686623385.jpg',1,'A-10 rain basera colony','UTTAR PRADESH','India',2,'2023-06-13','Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:29:45','2023-06-13 02:29:45'),
(47,'Dr Rohit Daksh','1686623674.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr Harbeer Singh ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 02:34:34','2023-06-13 02:34:34'),
(48,'Dr ROHIT DAKSH ','1686625709.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:29','2023-06-13 03:08:29'),
(49,'Dr ROHIT DAKSH ','1686625723.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:43','2023-06-13 03:08:43'),
(50,'Dr ROHIT DAKSH ','1686625728.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:47','2023-06-13 03:08:47'),
(51,'Dr ROHIT DAKSH ','1686625729.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:49','2023-06-13 03:08:49'),
(52,'Dr ROHIT DAKSH ','1686625733.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:53','2023-06-13 03:08:53'),
(53,'Dr ROHIT DAKSH ','1686625736.jpg',1,'A-10, rain basera colony, saradhana road, kanker khera, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA46 ','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 03:08:56','2023-06-13 03:08:56'),
(56,'Dr Rohit Daksh','1686670536.jpg',1,'A-10 rain basera colony,karnal highway,nangla Tashi, meerut cantt, uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-13','Mr HARBEER SINGH ','ayushkamiya1@gmail.com','09258585813','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','460,Nangla Tashi, sardhana road, kanker khera, meerut cantt, uttar pradesh.','250001','2023-06-13 15:35:36','2023-06-13 15:35:36'),
(57,'Dr. PRATEEK MISHRA','1686673495.jpg',1,'Atharva Arogya kendra, near SBI Bank, Birsinghpur (Pali)','MADHYA PRADESH','India',2,'2023-06-13','SATYANARAYAN MISHRA','COOL.PKMISHRA93@GMAIL.COM','7582067649','WARD NO. 2, GAUTMAN MOHALLA, SOHAGPUR, DIST-SHAHDOL, , PINCODE--484001','WARD NO.2, GAUTMAN MOHALLA, SOHAGPUR, DIST-SHAHDOL, STATE-MADHYA PRADESH, PINCODE-484001','484001','2023-06-13 16:24:55','2023-06-13 16:24:55'),
(58,'Kartik Rana','1686769280.jpg',1,NULL,'PUNJAB','India',1,'2023-06-15','Chander shekhar','ranakartik794@gmail.com','7508394470','House no. 1799 gali no.2 gokul vihar new jawahar nagar batala road Amritsar ','House no. 1799 gali no. 2 gokul vihar new jawahar nagar batala road Amritsar ','143001','2023-06-14 19:01:20','2023-06-14 19:01:20'),
(59,'KARTIK RANA','1686769692.jpg',1,NULL,'PUNJAB','India',1,'2023-06-15','CHANDER SHEKHAR','RANAKARTIK794@GMAIL.COM','7508394470','HOUSE NO. 1799 GALI NO.2 GOKUL VIHAR NEW JAWHAR NAGAR BATALA ROAD AMRITSAR ','HOUSE NO. 1799 GALI NO.2 GOKUL VIHAR NEW JAWHARA NAGAR BATALA ROAD AMRITSAR ','143001','2023-06-14 19:08:11','2023-06-14 19:08:11'),
(60,'Dr. Jai Narayan','1686807826.jpg',1,'Shree Rudra Ayurveda, Aggarsain Colony, Sirsa','HARYANA','India',2,'2023-06-15','Anand kumar','jnparashar@gmail.com','7015820933','#585, Gali no. 9, Aggarsain Colony, Sirsa ','House No. 251, VPO Baliana, Rohtak - 124401','124401','2023-06-15 05:43:46','2023-06-15 05:43:46'),
(63,'DR. VIRINDER SINGH ','1686831787.jpg',1,'','PUNJAB','India',5,'2023-06-15','WAZIR GIR','DRVARINDERSINGH53@GMAIL.COM','9644130001','SANJIVANI HOSPITAL VILLAGE HALLA, POST FATEHPUR,TEH NABHA,DIST PATIALA','SANJIVANI HOSPITAL VILLAGE HALLA , POST FATEHPUR, TEH NABHA, DIST PATIALA, ','147202','2023-06-15 12:23:06','2023-06-15 12:23:06'),
(64,'DR RUPESH RAJ','1687246153.jpg',1,'25 Nandan Road Bhowanipore Kolkata 700025','BIHAR','India',2,'2023-06-20','GHANSHYAM PANDEY','rupeshraj92@gmail.com','08777072953','S/O- GHANSHYAM PANDEY  VILLAGE TIYAY POST TIYAY PS ANDER DIST SIWAN  BIHAR','S/O -GHANSHYAM PANDEY VILLAGE TIYAY POST TIYAY PS  ANDER DIST SIWAN BIHAR ','841231','2023-06-20 07:29:13','2023-06-20 07:29:13'),
(65,'Dr. ARUN KUMAR KALIHARI','1687775240.png',1,'Bhirawahi, Kanker, Chhattishgarh, 494334','CHATTISGARH','India',2,'2023-06-26','SHRI. ANANT RAM KALIHARI','arunkalihari12@gmail.com','09340538828','Dr.Arun Kumar Kalihari, Vill. Bhirawahi, Kanker, Chhattisgarh ,  (494334)','Dr.Arun Kumar Kalihari, Vill. Bhirawahi, Kanker, Chhattisgarh, (494334)','494334','2023-06-26 10:27:19','2023-06-26 10:27:19'),
(66,'Vaidya Lalit Bansal','1687834046.jpg',1,'','PUNJAB','India',2,'2023-06-27','SH.  Bharat bhushan bansal','lalitbansal1994@gmail.com','9781868444','#146, st no 4/a , new shakti nagar , bathinda','#146 , street no 4/a , new shakti nagar bathinda , punjab 151001','151001','2023-06-27 02:47:26','2023-06-27 02:47:26'),
(69,'DR HARISH RUSHI','1687870364.jpg',1,'','MAHARASHTRA','India',5,'2023-06-27','SAWALARAM ','drhrushi@gmail.com','+919730740237','RUSHI HOSPITAL, NEAR SHRI NAGNATH MANDIR, DIST HINGOLI ','RUSHI HOSPITAL, NEAR SHRI NAGNATH MANDIR, SONAR GALLI, AUNDHA NAGNATH, DIST HINGOLI ','431705','2023-06-27 12:52:44','2023-06-27 12:52:44'),
(70,'Suman Khosla','1687960503.jpg',2,'PATANJALI MEGA STORE UG 12 14 32 AVA COURT MALIBU TOWNE  SEC 47 GURGAON ','HARYANA','India',2,'2023-06-28','SH ASHOK KUMAR SAHI','sumansahi22@gmail.com','07827043679','TOWER 2/8C BELLEVUE CENTRAL PARK 2 SEC 48 SOHNA ROAD GURGAON HARYANA','SAME','122018','2023-06-28 13:55:03','2023-06-28 13:55:03'),
(71,'Suman Khosla','1687960511.jpg',2,'PATANJALI MEGA STORE UG 12 14 32 AVA COURT MALIBU TOWNE  SEC 47 GURGAON ','HARYANA','India',2,'2023-06-28','SH ASHOK KUMAR SAHI','sumansahi22@gmail.com','07827043679','TOWER 2/8C BELLEVUE CENTRAL PARK 2 SEC 48 SOHNA ROAD GURGAON HARYANA','SAME','122018','2023-06-28 13:55:10','2023-06-28 13:55:10'),
(72,'PUNEET MITTAL','1688039834.jpeg',1,'','UTTAR PRADESH','India',5,'2023-06-29','ROHTASH MITTAL','puneetmittal@mgcts.org','8937015757','MGCTS, Mittal Building, 121-B, Mansarovar Industrial Estate, Baghpat Road, Panchli, Meerut-250005','C-10/3, Street 4, Jwala Nagar, T. P. Nagar, Meerut-250002, India','250002','2023-06-29 11:57:13','2023-06-29 11:57:13'),
(73,'Dr Rohit Daksh','1688142512.jpg',1,'A-10 rain basera colony, karnal highway,nangla Tashi kanker khera meerut cantt uttar pradesh ','UTTAR PRADESH','India',2,'2023-06-30','Harbeer singh ','rohitdaksh62@gmail.com','09258585813','460,NANGLA TASHI, SARDHANA Road,kanker khera meerut cantt, uttar pradesh.','460,nangla Tashi sardhana road kanker khera meerut cantt uttar pradesh ','250001','2023-06-30 16:28:32','2023-06-30 16:28:32'),
(76,'Dr AnupriyaSingh','1688387564.jpg',2,'SUNSHINE CLINIC; MIG-A-57, PANI TANKI COLONY, SAKET PURI, FAIZABAD-224001','UTTAR PRADESH','India',2,'2023-07-03','Lalan Kumar Singh','akshrasngh36@gmail.com','07381510851','SUNSHINE CLINIC;MIG-A-57, PANI TANKI COLONY, SAKET PURI, FAIZABAD-224001','FLAT NO- 201; LAKHPATO VILLA, HARI JII KA HATA, BEHIND DR TP SINGH, ARA, BIHAR-802301','224001','2023-07-03 12:32:44','2023-07-03 12:32:44'),
(78,'Dr. ANOOP MALL','1688923184.jpg',1,NULL,'UTTAR PRADESH','India',1,'2023-07-09','SANJEEV PRATAP MALL ','ANOOPMALL09@GMAIL.COM','9454317522','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP ,P.O.- G I ESTATE DEORIA,U.P','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP, P O.- G.I ESTATE DEORIA U.P','274001','2023-07-09 17:19:44','2023-07-09 17:19:44'),
(79,'Vijay Pratap Singh','1689076262.jpg',1,'Ayur Prayagam , ayurveda and panchakarma center','UTTAR PRADESH','India',2,'2023-07-11','Ram Dular singh','drvijaymo2019@gmail.com ','8853602121','122/1A/63A/1C,stanelly road beli colony,prayagraj','Same as above','211002','2023-07-11 11:51:01','2023-07-11 11:51:01'),
(80,'Dr. ANOOP MALL','1689304462.jpg',1,NULL,'UTTAR PRADESH','India',1,'2023-07-14','SANJEEV PRATAP MALL ','ANOOPMALL09@GMAIL.COM','9454317522','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP ,P.O.- G I ESTATE DEORIA,U.P','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP, P O.- G.I ESTATE DEORIA U.P','274001','2023-07-14 03:14:22','2023-07-14 03:14:22'),
(81,'Dr.Ankur Kumar Tanwar ','1690028135.jpg',1,'','DELHI','India',2,'2023-07-22','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','2023-07-22 12:15:35','2023-07-22 12:15:35'),
(82,'Dr.Ankur Kumar Tanwar ','1690028136.jpg',1,'','DELHI','India',2,'2023-07-22','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','Dr.Ankur Kumar Tanwar ','2023-07-22 12:15:35','2023-07-22 12:15:35'),
(83,'Dr.Ankur Kumar Tanwar ','1690028185.jpg',1,'','DELHI','India',2,'2023-07-22','Virender Kumar Tanwar','ankurkumartanwar1@gmail.com ','9250868756','W.Z.356 A NARAINA VILLAGE NEW DELHI 110028','W.Z.356 A Naraina Village New Delhi 110028','Dr.Ankur Kumar Tanwar ','2023-07-22 12:16:25','2023-07-22 12:16:25'),
(84,'Dr.Ankur Kumar Tanwar ','1690028194.jpg',1,'','DELHI','India',2,'2023-07-22','Virender Kumar Tanwar','ankurkumartanwar1@gmail.com ','9250868756','W.Z.356 A NARAINA VILLAGE NEW DELHI 110028','W.Z.356 A Naraina Village New Delhi 110028','Dr.Ankur Kumar Tanwar ','2023-07-22 12:16:34','2023-07-22 12:16:34'),
(85,'Dr.Ankur Kumar Tanwar ','1690028200.jpg',1,'','DELHI','India',2,'2023-07-22','Virender Kumar Tanwar','ankurkumartanwar1@gmail.com ','9250868756','W.Z.356 A NARAINA VILLAGE NEW DELHI 110028','W.Z.356 A Naraina Village New Delhi 110028','Dr.Ankur Kumar Tanwar ','2023-07-22 12:16:40','2023-07-22 12:16:40'),
(86,'Dr VIJENDRA KUMAR TRIPATHI','1690272097.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:01:37','2023-07-25 08:01:37'),
(87,'Dr VIJENDRA KUMAR TRIPATHI','1690272136.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:02:15','2023-07-25 08:02:15'),
(88,'Dr VIJENDRA KUMAR TRIPATHI','1690272158.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:02:37','2023-07-25 08:02:37'),
(89,'Dr VIJENDRA KUMAR TRIPATHI','1690272166.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:02:45','2023-07-25 08:02:45'),
(90,'Dr VIJENDRA KUMAR TRIPATHI','1690272172.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:02:51','2023-07-25 08:02:51'),
(91,'Dr VIJENDRA KUMAR TRIPATHI','1690272183.jpg',1,'Karma sonebhadra up','UTTAR PRADESH','India',2,'2023-07-25','RAVINDRA NATH TIWARI','Drvijendrakumartripathi1@gmail.com','09519313755','Vill MADAINIYA Po KARMA Dis SONEBHADRA ','Same','231216','2023-07-25 08:03:03','2023-07-25 08:03:03'),
(92,'Vd. Manish Gautam','1690476830.jpg',1,NULL,'UTTAR PRADESH','India',1,'2023-07-27','Mr Ravindra Singh','manubauddhya@gmail.com','8077785404','Pali Kiraoli Patsal Fatehpur Sikari Agra UP 283110','Pali Kiraoli Patsal Fatehpur Sikari Agra 283110','283110','2023-07-27 16:53:50','2023-07-27 16:53:50'),
(93,'MALLIKARJUN','1691761514.jpg',1,'Vivek college of Ayurvedic Sciences and Hospital Bijnor Uttar Pradesh ','KARNATAKA','India',2,'2023-08-11','HANMANTAPPA','drmhmarkunda@gmail.com','9972893688','Vivek college of Ayurvedic Sciences and Hospital Bijnor Uttar Pradesh.  ','HANMANTAPPA MARKUNDA MANNAEKHELLI.. TALUKA - CHITGUPPA ,DIST -BIDAR, KARNATAKA. .PIN585227','585227','2023-08-11 13:45:14','2023-08-11 13:45:14'),
(94,'ABHISHEK SHARMA ','1691765068.jpg',1,NULL,'UTTAR PRADESH','India',1,'2023-08-11','Mr.  HERDENDRA SHARMA ','ABHIRAM16761@GMAIL.COM','7351196186','GYAN BIHAR COLONY BIJNOR NEAR ARYA SAMAJ DHAM NEAR CHAKKAR CHORAHE BIJNOR ','ABHISHEK SHARMA ','246701','2023-08-11 14:44:28','2023-08-11 14:44:28'),
(95,'VAIDYA DARPAN GANGIL','1691833749.png',1,'ACHINTYA AYURVEDA, SHOP NO. 21, A-BLOCK, SAGAR PREMIUM TOWERS PHASE-1, J.K. HOSPITAL ROAD, KOLAR ROAD, BHOPAL (M.P.) 462042','MADHYA PRADESH','India',2,'2023-08-12','SHRI RAJESH GANGIL','darpan.gangil@gmail.com','7999824961 & 9229698159','A-202, SAGAR PREMIUM TOWERS PHASE-2, NEAR J.K. HOSPITAL, KOLAR ROAD, BHOPAL (M.P.) 462042','125, GANGIL BHAWAN, JIWAJI GANJ, TANWAR GHARI BLOCK, MORENA (M.P.) 476001','462042','2023-08-12 09:49:08','2023-08-12 09:49:08'),
(97,'RAJ AGRAWAL ','1691841960.jpg',1,NULL,'KARNATAKA','India',1,'2023-08-12','NILESH AGRAWAL ','RAJAGRAWAL167@GMAIL.COM','9826573564','SDM INSTITUTE OF AYURVEDA AND HOSPITAL, ANCHEPALYA, MYSORE ROAD, BANGALORE - 560074','SONY NAGAR, SENDHWA ','560074','2023-08-12 12:06:00','2023-08-12 12:06:00'),
(98,'DR. ANOOP MALL','1691849930.jpg',1,'VILL- PARSA BARWA (PARSIYA MALL) ','UTTAR PRADESH','India',2,'2023-08-12','SANJEEV PRATAP MALL','ANOOPMALL09@GMAIL.COM','9454317522','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP ,P.O.- G I ESTATE DEORIA,U.P','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP, P O.- G.I ESTATE DEORIA U.P','274001','2023-08-12 14:18:50','2023-08-12 14:18:50'),
(99,'Dr. ANOOP MALL','1691850488.jpg',1,'VILL- PARSA BARWA (PARSIYA MALL)','UTTAR PRADESH','India',2,'2023-08-12','SANJEEV PRATAP MALL','ANOOPMALL09@GMAIL.COM','9454317522','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP ,P.O.- G I ESTATE DEORIA,U.P','VILL.- PARSA BARWA (PARSIYA MALL) K.S.K PETROL PUMP, P O.- G.I ESTATE DEORIA U.P','274001','2023-08-12 14:28:07','2023-08-12 14:28:07'),
(100,'DR. GARIMA SAINI','1691851495.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:44:55','2023-08-12 14:44:55'),
(101,'DR. GARIMA SAINI','1691851497.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:44:57','2023-08-12 14:44:57'),
(102,'DR. GARIMA SAINI','1691851500.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:45:00','2023-08-12 14:45:00'),
(103,'DR. GARIMA SAINI','1691851517.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:45:17','2023-08-12 14:45:17'),
(104,'DR. GARIMA SAINI','1691851521.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:45:21','2023-08-12 14:45:21'),
(105,'DR. GARIMA SAINI','1691851540.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:45:40','2023-08-12 14:45:40'),
(106,'DR. GARIMA SAINI','1691851556.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:45:56','2023-08-12 14:45:56'),
(107,'DR. GARIMA SAINI','1691851575.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:46:14','2023-08-12 14:46:14'),
(108,'DR. GARIMA SAINI','1691852355.jpg',2,'DEVBHOOMI MEDICAL COLLEGE OF AYURVEDA AND HOSPITAL,  NAVGAON, DEHRADUN ','UTTARANCHAL','India',2,'2023-08-12','KATAR SINGH SAINI','garima.ayurveda@gmail.com','9045883818','76/119, lane no. 6, canal road , Saket colony , Dehradun','717 lane no. 10 Ramnagar Roorkee Uttarakhand','248001','2023-08-12 14:59:15','2023-08-12 14:59:15'),
(109,'DR CHANDRA MOHAN ','1691913263.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 07:54:22','2023-08-13 07:54:22'),
(110,'DR CHANDRA MOHAN ','1691913403.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 07:56:42','2023-08-13 07:56:42'),
(111,'DR CHANDRA MOHAN ','1691913627.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 08:00:27','2023-08-13 08:00:27'),
(112,'DR CHANDRA MOHAN ','1691917571.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 09:06:11','2023-08-13 09:06:11'),
(113,'DR CHANDRA MOHAN ','1691917739.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 09:08:58','2023-08-13 09:08:58'),
(114,'DR CHANDRA MOHAN ','1691921918.jpg',1,'KESHAR GARDEN KAULKKHA AGRA','UTTAR PRADESH','India',2,'2023-08-13','OM PRAKASH ','CHANDRAMOHANJADON@GMAIL.COM','9634137765','KESHAR VIHAR KAULKKHA UKHARRA ROAD AGRA','KESHAR VIHAR KAULKKHA POST NAGLA KALI AGRA ','282001','2023-08-13 10:18:38','2023-08-13 10:18:38'),
(115,'Dr BHAGWAN DASS','1691979052.jpg',1,'108 W no 12 SARDULGARH','PUNJAB','India',2,'2023-08-14','DARSHAN KUMAR','drbhagwanjindal@gmail.com','7015810778','#108 ward no 12 sardulgarh Mansa Punjab 151507','#108 ward no 12 sardulgarh Mansa Punjab 151507','151507','2023-08-14 02:10:51','2023-08-14 02:10:51'),
(116,'Raghav sharma','1691998233.jpg',1,'A187b ramganga vihar pH 1 moradabad ','UTTAR PRADESH','India',2,'2023-08-14','Raghav sharma','drraghavsharma15@gmail.com','8937919010','8Sai viharenclave ramganga vihar2near mit moradabad ','8shri Sai vihar enclave ramganga vihar 2 near mit moradabad ','244001','2023-08-14 07:30:33','2023-08-14 07:30:33'),
(117,'NAVDEEP SINGH THAKUR ','1692168529.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 06:48:49','2023-08-16 06:48:49'),
(118,'NAVDEEP SINGH THAKUR ','1692171382.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 07:36:22','2023-08-16 07:36:22'),
(119,'NAVDEEP SINGH THAKUR ','1692171577.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 07:39:37','2023-08-16 07:39:37'),
(120,'NAVDEEP SINGH THAKUR ','1692171734.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 07:42:13','2023-08-16 07:42:13'),
(121,'NAVDEEP SINGH THAKUR ','1692173566.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 08:12:46','2023-08-16 08:12:46'),
(122,'DR NAVDEEP SINGH THAKUR ','1692174340.jpg',1,'','PUNJAB','India',2,'2023-08-16','ONKAR CHAND ','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','101 KOHINOOR ENCLAVE NEAR CITY HOMES RAJPURA ROAD PATIALA 147002','VILLAGE ALOH CHAMBYALA VPO GARLI TEHSIL RAKKAR DISTRICT KANGRA HP PIN-177108','147002','2023-08-16 08:25:39','2023-08-16 08:25:39'),
(123,'Dr SHADAB KHAN ','1692255374.jpg',1,'Ayucare Clinic, Indranagar colony, ITBP Seemadwar Road, Dehradun Uttarakhand ','UTTAR PRADESH','India',2,'2023-08-17','NAFEES KHAN ','shadabkhann89@gmail.com','9008395286','Ayucare Clinic, 1031/13 Indranagar colony, ITBP Seemadwar Road, Dehradun, Uttrakhand ','Moh Molviyan Janubi, Nehtaur District Bijnor, UP , Pin 246733','246733','2023-08-17 06:56:14','2023-08-17 06:56:14'),
(124,'Dr SHADAB KHAN ','1692255398.jpg',1,'Ayucare Clinic, Indranagar colony, ITBP Seemadwar Road, Dehradun Uttarakhand ','UTTAR PRADESH','India',2,'2023-08-17','NAFEES KHAN ','shadabkhann89@gmail.com','9008395286','Ayucare Clinic, 1031/13 Indranagar colony, ITBP Seemadwar Road, Dehradun, Uttrakhand ','Moh Molviyan Janubi, Nehtaur District Bijnor, UP , Pin 246733','246733','2023-08-17 06:56:38','2023-08-17 06:56:38'),
(125,'SONU DHAKA','1692269887.jpg',2,'VED HOSPITAL JHAJJAR ROAD BAHADURGARH','DELHI','India',2,'2023-08-17','SONU DHAKA','SONU DHAKA','SONU DHAKA','SONU DHAKA','SONU DHAKA','SONU DHAKA','2023-08-17 10:58:06','2023-08-17 10:58:06'),
(126,'DR. MALLIKARJUN ','1692424404.jpg',1,'VIVEK COLLEGE OF AYURVEDIC SCIENCES AND HOSPITAL BIJNOR UP ','KARNATAKA','India',2,'2023-08-19','HANMANTAPPA ','drmhmarkunda@gmail.com','9972894688','VIVEK COLLEGE OF AYURVEDIC SCIENCES AND HOSPITAL BIJNOR UP 246701','MALLIKARJUN HANMANTAPPA MARKUNDA MANNAEKHELL,I CHITGUPPA , BIDAR, KARNATAKA, 585227','585227','2023-08-19 05:53:23','2023-08-19 05:53:23'),
(127,'DR. MALLIKARJUN ','1692424846.jpg',1,'VIVEK COLLEGE OF AYURVEDIC SCIENCES AND HOSPITAL BIJNOR UP ','KARNATAKA','India',2,'2023-08-19','HANMANTAPPA ','drmhmarkunda@gmail.com','9972894688','VIVEK COLLEGE OF AYURVEDIC SCIENCES AND HOSPITAL BIJNOR UP 246701','MALLIKARJUN HANMANTAPPA MARKUNDA MANNAEKHELL,I CHITGUPPA , BIDAR, KARNATAKA, 585227','585227','2023-08-19 06:00:46','2023-08-19 06:00:46'),
(128,'Dr Sumit Kumar Pradhan ','1692509617.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:33:37','2023-08-20 05:33:37'),
(129,'Dr Sumit Kumar Pradhan ','1692509637.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:33:56','2023-08-20 05:33:56'),
(130,'Dr Sumit Kumar Pradhan ','1692509648.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:34:08','2023-08-20 05:34:08'),
(131,'Dr Sumit Kumar Pradhan ','1692509732.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:35:32','2023-08-20 05:35:32'),
(132,'Dr Sumit Kumar Pradhan ','1692509743.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:35:42','2023-08-20 05:35:42'),
(133,'Dr Sumit Kumar Pradhan ','1692509747.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:35:46','2023-08-20 05:35:46'),
(134,'Dr sumit Pradhan ','1692510585.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:49:45','2023-08-20 05:49:45'),
(135,'Dr sumit Pradhan ','1692510659.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:50:59','2023-08-20 05:50:59'),
(136,'Dr sumit Pradhan ','1692510689.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:51:29','2023-08-20 05:51:29'),
(137,'Dr sumit Pradhan ','1692510772.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:52:51','2023-08-20 05:52:51'),
(138,'Dr sumit Pradhan ','1692510789.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:53:09','2023-08-20 05:53:09'),
(139,'Dr sumit Pradhan ','1692510806.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:53:26','2023-08-20 05:53:26'),
(140,'Dr sumit Pradhan ','1692510839.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:53:58','2023-08-20 05:53:58'),
(141,'Dr sumit Pradhan ','1692510878.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:54:38','2023-08-20 05:54:38'),
(142,'Dr sumit Pradhan ','1692510913.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:55:12','2023-08-20 05:55:12'),
(143,'Dr sumit Pradhan ','1692510918.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:55:18','2023-08-20 05:55:18'),
(144,'Dr sumit Pradhan ','1692510938.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:55:38','2023-08-20 05:55:38'),
(145,'Dr sumit Pradhan ','1692510964.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:56:04','2023-08-20 05:56:04'),
(146,'Dr sumit Pradhan ','1692510989.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:56:29','2023-08-20 05:56:29'),
(147,'Dr sumit Pradhan ','1692511016.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:56:55','2023-08-20 05:56:55'),
(148,'Dr sumit Pradhan ','1692511068.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:57:48','2023-08-20 05:57:48'),
(149,'Dr sumit Pradhan ','1692511094.jpg',1,'Gayatri health care center roorkee ','UTTARANCHAL','India',2,'2023-08-20','Raj Singh ','pradhan.sumit89@gmail.com','8410564051','Village post dabki kalan tehsil laksar district haridwar ','Village post dabki kalan tehsil laksar district haridwar uttarakhand ','247663','2023-08-20 05:58:13','2023-08-20 05:58:13'),
(150,'Dr SUMIT PRADHAN ','1692511442.jpg',1,'GAYATRI HEALTH CARE CENTER GULAB NAGAR ROORKEE ','UTTARANCHAL','India',2,'2023-08-20','RAJ SINGH ','pradhan.sumit89@gmail.com','8410564051','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR UTTARAKHAND ','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR ','247663','2023-08-20 06:04:01','2023-08-20 06:04:01'),
(151,'Dr SUMIT PRADHAN ','1692511492.jpg',1,'GAYATRI HEALTH CARE CENTER GULAB NAGAR ROORKEE ','UTTARANCHAL','India',2,'2023-08-20','RAJ SINGH ','pradhan.sumit89@gmail.com','8410564051','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR UTTARAKHAND ','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR ','247663','2023-08-20 06:04:52','2023-08-20 06:04:52'),
(152,'Dr SUMIT PRADHAN ','1692511526.jpg',1,'GAYATRI HEALTH CARE CENTER GULAB NAGAR ROORKEE ','UTTARANCHAL','India',2,'2023-08-20','RAJ SINGH ','pradhan.sumit89@gmail.com','8410564051','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR UTTARAKHAND ','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR ','247663','2023-08-20 06:05:26','2023-08-20 06:05:26'),
(153,'DR SUMIT PRADHAN ','1692520207.jpg',1,'GAYATRI HEALTH CARE CENTER GULAB NAGAR ROORKEE ','UTTARANCHAL','India',2,'2023-08-20','RAJ SINGH ','pradhan.sumit89@gmail.com','8410564051','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR UTTARAKHAND ','VILLAGE POST DABKI KALAN TEHSIL LAKSAR HARIDWAR ','247663','2023-08-20 08:30:07','2023-08-20 08:30:07'),
(154,'VAIDHYA SUDHEER PANDEY ','1692772127.jpg',1,'NH-25, Kanpur Jhansi Highway, Kanpur Dehat','UTTAR PRADESH','India',2,'2023-08-23','JAI PRAKASH PANDEY','sudheerpandey123@gmail.com','+919742952302','Pandey ayurveda upsidc nabipur jainpur kanpur dehat ','Pandey ayurveda upsidc nabipur jainpur kanpur dehat ','209311','2023-08-23 06:28:46','2023-08-23 06:28:46'),
(164,'DR BIPIN BIHARI ','1692777091.jpg',1,'BIPIN BIHARI CLINIC AZIZPUR SARIYA MUZAFFARPUR ','BIHAR','India',2,'2023-08-23','SRI SHYAMNANDAN SINGH ','BIPINBIHARI8519@GMAIL.COM','7903301838,9470712020','AT PO AZIZPUR, VIA KUDHANI, DIST MUZAFFARPUR PIN 844120','AT PO AZIZPUR, VIA KUDHANI, DIST MUZAFFARPUR PIN 844120','844120','2023-08-23 07:51:31','2023-08-23 07:51:31'),
(165,'Dr Rahul Arya ','1692924367.jpg',1,'Dr Rahul Ayurvedic Clinic and Panchkarma centre Salempur Ravidas mandir Bahadrabaad haridwar 249402','UTTARANCHAL','India',2,'2023-08-25','Sh Rajpal ','rahulkumar1230806@gmail.com','9675370735','SALEMPUR Ravidas mandir Bahadrabaad haridwar ','Salempur Bahadrabaad haridwar 249402 ','249402','2023-08-25 00:46:06','2023-08-25 00:46:06'),
(166,'Loveneet Saini','1692956622.jpg',1,NULL,'UTTAR PRADESH','India',1,'2023-08-25','Dinesh Kumar Chandra Sen','loveneetsaini@gmail.com','8650531585','Saket colony,  Civil Lines -2  Bijnor ','Saket colony, Civil Lines-2  Bijnor ','246701','2023-08-25 09:43:41','2023-08-25 09:43:41'),
(169,'DR NIGAM','1693121035.jpeg',1,'','UTTAR PRADESH','India',2,'2023-08-27','MR NAGENDRA PRASAD GUPTA','NIGAMPRAKASH457@GMAIL.COM','8896718157','C/O NAGENDRA PRASAD,NIGAM TRADERS,BANKATTA,IN FRONT OF BADI MASHJID,BALLIA CITY, DIST-BALLIA,UTTAR PRADESH','BANKATTA,BALLIA CITY,DIST-BALLIA,UTTAR PRADESH','277001','2023-08-27 07:23:54','2023-08-27 07:23:54'),
(170,'DR RAHUL KUMAR ARYA','1693286427.jpg',1,'719 A Salempur mahdood Bahadrabaad Haridwar','UTTARANCHAL','India',2,'2023-08-29','SH RAJPAL ','rahulkumar1230806@gmail.com','09675370735','719 salempur Bahadrabaad near Ravidas mandir salempur main market Bahadrabaad haridwar 249402','Dr Rahul Arya','249402','2023-08-29 05:20:27','2023-08-29 05:20:27'),
(175,'DR DEEPAK KUMAR SONI','1693299395.jpg',1,'Ayur Deep Health Care, Kanya Parisar Road, Gangapur Khurd, Ambikapur, Surguja (C.G.) 497001','CHATTISGARH','India',2,'2023-08-29','SHRI RAJENDRA PRASAD SONI','dr.deepaks@icloud.com','7566449595','AYUR DEEP HEALTH CARE, Kanya Parisar Road, Gangapur Khurd, Ambikapur, Surguja, (C.G.) 497001','SR Villa, Mahatma Gandhi ward, Near Sanjay park, Ambikapur, Surguja, (C.G.) 497001','497001','2023-08-29 08:56:35','2023-08-29 08:56:35'),
(176,'SHREE DEVVRAT JI','1693381858.jpg',1,'V+P-BAMBAWAR, CITY-DADRI GR. NOIDA','UTTAR PRADESH','India',2,'2023-08-30','MAHIPAL SINGH','DEVARYA102@GMAIL.COM','7037309005','V+P-BAMBAWAR, CITY-DADRI DISTT-G. B. NAGAR','V+P-BAMBAWAR, CITY-DADRI DISTT-G. B. NAGAR','203207','2023-08-30 07:50:58','2023-08-30 07:50:58'),
(177,'DR HIMANSHU CHAWLA ','1693759274.jpg',1,'Shuddhi hiims karolbagh ','DELHI','India',2,'2023-09-03','MR SANJAY CHAWLA ','himanshuchawla2016@gmail.com','9829758141','D-7/119-A brijpuri north east delhi ','Himanshu chawla','110094','2023-09-03 16:41:14','2023-09-03 16:41:14'),
(204,'PALLAV KUMAR PRAJAPATI','1698301341.',0,NULL,'UTTAR PRADESH','',1,'2023-10-26','','pkpallav99@gmail.com','7007111943','','','','2023-10-26 06:22:21','2023-10-26 06:22:21'),
(225,'Rishabh Dixit ','1708583698.jpg',1,NULL,'UTTAR PRADESH','India',5,'2024-02-22','Nand Kumar Dixit ','clothing.town2024@gmail.com','8239677909','Shuddhi Gram, Muradnagar - Roorkee Ganga Nehar kanwar Road, Village Kumbha, PO Jani, UP-250501','Shuddhi Gram, Muradnagar - Roorkee Ganga Nehar kanwar Road, Village Kumbha, PO Jani, UP-250501','250501','2024-02-22 06:34:58','2024-02-22 06:34:58'),
(239,'Dr Preeti Sharma ','1714849495.jpg',0,NULL,'UTTAR PRADESH','India',2,'2024-05-05','Prem Nath Sharma ','drpreetisharma0105@gmail.com','7895411188','19-B/2, New Market, New Rohtak Rd, near Liberty Cinema, Block 21 B, Dev Nagar, Karol Bagh, New Delhi, Delhi, 110005','Pili kothi Khurja distt Bulandshahr ','203131','2024-05-04 19:04:54','2024-05-04 19:04:54'),
(240,'Dr Preeti Sharma ','1714881070.jpg',0,NULL,'UTTAR PRADESH','India',2,'2024-05-05','Prem Nath Sharma ','drpreetisharma0105@gmail.com','7895411188','19-B/2, New Market, New Rohtak Rd, near Liberty Cinema, Block 21 B, Dev Nagar, Karol Bagh, New Delhi, Delhi, 110005','Pili kothi Khurja ','203131','2024-05-05 03:51:10','2024-05-05 03:51:10'),
(261,'Abk','1715843109.jpg',1,NULL,'UTTAR PRADESH','India',2,'2024-05-16','S. K. Gupta','brahm.ayurved@gmail.com','9315036038','D50','','120320','2024-05-16 07:05:08','2024-05-16 07:05:08'),
(266,'Kane Morrison','1715922592.png',1,NULL,'ORISSA','Bulgaria',2,'2024-05-17','Mikayla Hodge','sysorabek@mailinator.com','9855366451','Commodo irure qui ea','','Eos sunt molestiae ','2024-05-17 05:09:51','2024-05-17 05:09:51'),
(270,'Galena Fuentes','1716264170.png',1,NULL,'MADHYA PRADESH','Macedonia',2,'2024-05-21','Curran Mays','bihyga@mailinator.com','9874569874','Ad tempor sint maxim','','Aliquam dolor esse u','2024-05-21 04:02:49','2024-05-21 04:02:49'),
(271,'Dr lalit kansal','1716636903.jpg',1,NULL,'PUNJAB','India',2,'2024-05-25','Sat Narain','kansal18@gmail.com','9914080579','Naturaldays wellness  old market near bhole di hatti bhawanigarh Distt Sangrur Punjab ','','148026','2024-05-25 11:35:03','2024-05-25 11:35:03'),
(272,'Dr Shashidhar Pandey','1717832210.JPG',1,NULL,'UTTAR PRADESH','India',2,'2024-06-08','Sachchidanand Pandey ','Shashidharpan@gmail.com','8573842000','Nera Madhuri palace Naka ayodhya','','224001','2024-06-08 07:36:49','2024-06-08 07:36:49'),
(273,'Dr Rajpal Dhaka ','1719138137.jpg',1,NULL,'RAJASTHAN','India',2,'2024-06-23','Ghanshyam Singh Dhaka ','drrajpalsinghdhaka@gmail.com','7014046300','Satya Ayurveda sikar G1 Travani complex near pioneer hospital sikar Rajasthan 332001','','332315','2024-06-23 10:22:17','2024-06-23 10:22:17'),
(274,'Akshansh Gupta ','1719312213.png',1,NULL,'UTTAR PRADESH','India',2,'2024-06-25','Sanjeev Gupta ','biologicalakshansh@gmail.com','8938996824','Vasundhara vihar colony bijnor near sanskar banquet hall ','','246701','2024-06-25 10:43:33','2024-06-25 10:43:33'),
(275,'Dr Deepali Maheshwari ','1719551481.jpg',0,NULL,'RAJASTHAN','India',2,'2024-06-28','Mr . Dharmendra jethlya ','deepali.oct28@gmail.com','9414273188','D-546 gate no. 6 , Rajat grah colony nainwa road Bundi ','','323001','2024-06-28 05:11:21','2024-06-28 05:11:21'),
(276,'Vd Siddharth Kumar','SiddharthKumar.jpg',1,'Bankata station Deoria Uttar Pradesh ','Uttar Pradesh ','Indian',2,'2024-06-25','Anil kumar singh ','siddharthkumar76596@gmail.com','6307081394','Bankata station Deoria Uttar Pradesh ','Bhaishi bankata station Deoria Uttar Pradesh ','274704','2024-06-28 10:41:39','2024-06-28 10:41:39'),
(277,'Vishal Saini','vishalsaini.png',1,'Pg scholar (MS)','Haryana ','Indian',2,'2024-06-25','Sh.Rajbir','sainivishal1296@gmail.com','9053480005','Shri Krishna Ayush University Sector 8 Kurukshetra ','Village Bhukhari District Kurukshetra Haryana 136156','136156','2024-06-28 12:18:40','2024-06-28 12:18:40'),
(278,'Shivam Kumar ','Shivamkumar.jpeg',1,NULL,'Uttar Pradesh','Indian',2,'2024-06-25','Raja Ji','sivam.shivaay@gmail.com','9873536762','Gorakhpur ','Semapur, Katihar, Bihar 854105','273007','2024-07-01 05:56:16','2024-07-01 05:56:16'),
(279,'Dr. Neha Singh ','NehaSingh.jpg',0,NULL,'Uttar Pradesh ','Indian',2,'2024-06-25','Mr. Manjeet Singh ','nehasingh170798@gmail.com','8826320924','G-124,G block, Sector Gamma-2, Greater Noida, Gautam Budh Nagar','G-124,G block, Sector Gamma-2, Greater Noida, Gautam Budh Nagar','201306','2024-07-01 07:07:51','2024-07-01 07:07:51'),
(280,'Gaurav govil','',1,NULL,'Uttar pradesh','Indian',2,'2024-06-25','Mr. Yogesh kumar govil','gauravgovil777@gmail.com','9259547249','\"IVS collage Boys hostel\r\nMathura akabarpur, Uttar Pradesh\"','445A kakrala navalpura-2 khurja Bulandshar- 203131','203131','2024-07-01 07:11:06','2024-07-01 07:11:06'),
(281,'Dr Indrajeet Kumar vaid ','Indrajeetkumar.jpg',1,'Dr D Ram Ayurvedic &Yog chikitsalay ','Bihar','Indian',2,'2024-06-25','Dr D Ram','dhruvkanayurvedicpharma@gmail.com','8051026278','Old kachahari road nawada Bihar ','\"Dr D Ram Ayurvedic & Yog chikitsalay\r\nOld kachahari road nawada Bihar \"','805110','2024-07-01 07:13:28','2024-07-01 07:13:28'),
(282,'Vd Himanshu Tiwari ','HimanshuTiwari.jpg',1,'House- no 71 ward no 3 birsinghpur district -satna mp ','Mp','Indian',2,'2024-06-25','Rajendra Tiwari ','himanshutiwarird@gmail.com','9340198684','House- no 71 ward no 3 birsinghpur district -satna mp ','House- no 71 ward no 3 birsinghpur district -satna mp ','485226','2024-07-01 07:16:07','2024-07-01 07:16:07'),
(283,'Monika thakur ','MONIKATHAKUR.jpg',0,'House- no 71 ward no 3 birsinghpur district -satna mp','Himachal Pradesh ','Indian',2,'2024-06-25','Sh. Surinder thakur','thakurmonika1994@gmail.com','9418056196','Block 4 U.s club Shimla (H.P)','Us club Shimla Himachal Pradesh ','171001','2024-07-01 07:34:18','2024-07-01 07:34:18'),
(284,'Dr Jyoti','jyotishukla.jpeg',0,'GOPAL MEDICOS Manimjara Town Chandigarh','Chandigarh','Indian',2,'2024-06-25','Radhey Shyam Shukla','jyotishukla.924@gmail.com','9464756281','824 NIC Manimajra Sec 13 Chandigarh','824 NIC Manimajra sec 13 Chandigarh','160101','2024-07-01 07:44:28','2024-07-01 07:44:28'),
(285,'Dr. Akshansh Gupta ','',1,'Vasundhara Vihar , Bijnor','Uttar Pradesh','Indian',2,'2024-06-25','Sanjeev Gupta ','biologicalakshansh@gmail.com','8938996824','Vasundhara vihar,Bijnor','Vasundhara vihar,Bijnor','246701','2024-07-01 07:46:17','2024-07-01 07:46:17'),
(286,'Ashutosh Verma  ','AshutoshVerma.jpg',1,'Gorakhpur ','Uttar Pradesh','Indian',2,'2024-06-25','Late Ghanshyam Prasad Verma ','vermaashutosh242@gmail.com','9580770400',' LIG-1st room no. 401 vikas nagar Bargadawa Gorakhpur Uttar Pradesh ','Bada sakhauda in front of ban Sagar colony Mirzapur Uttar Pradesh','231001','2024-07-02 04:59:05','2024-07-02 04:59:05'),
(287,'Awantika Solanki ','AwantikaSolanki.jpg',0,'','Uttar Pradesh ','Indian',2,'2024-06-25','Yaduvir singh','awanisolanki6@gmail.com','8504923742','Amba colony bulandshahr, uttar pradesh ','Awas Vikas colony, etah, uttar pradesh ','203001','2024-07-02 04:59:28','2024-07-02 04:59:28'),
(288,'Sudesh ','SudeshKumari.jpg',0,'Vasundhara Vihar , Bijnor','Haryana ','Indian',2,'2024-06-25','Chitarshal','sudeshkumari1712@gmail.com','9466605830','House no 1032 sector 7 Kurukstera ','\"VILLAGE GOPALWAS\r\nMAIN ROAD NEAR WELL POST OFFICE BADRAI\"','136118','2024-07-02 04:59:52','2024-07-02 04:59:52'),
(289,'Ansh Sharma   ','AnshSharma.jpg',1,'','Uttar Pradesh','Indian',2,'2024-06-25','Mr.Sushil Sharma ','sharmansh375@gmail.com','9897668751',' Khurja UP','B-42 Panchwati Colony Khurja Bulandshahr UP','203131','2024-07-02 05:00:06','2024-07-02 05:00:06'),
(290,'Dr Akshay Vashisht  ','AkshayVashisht.jpg',1,'Dada Siba Road Jourbar District Kangra Himachal Pradesh ','Himachal Pradesh ','Indian',2,'2024-06-25','Hari Dutt Sharma ','sabugrt94@gmail.com','7589089047','Vashisht Ayurveda & Health Wellness Centre Dada Siba Road Jourbar District Kangra H.P.','Vashisht Ayurveda & Health Wellness Centre Dada Siba Road Jourbar District Kangra H.P.	','177112','2024-07-02 05:23:47','2024-07-02 05:23:47'),
(291,'Dr. Surbhi Bairwa','SurbhiBairwa.jpg',0,'','Rajasthan ','Indian',2,'2024-06-25','Mr. Ramesh Chandra Bairwa','Dr.surbhibairwa@gmail.com','8426050055','Quarter no- 4, RTDC Hotel kajri, shastri circle, udaipur ','Plot no.83, shyam nagar (Bosch enclave )village kheda jagannathpura, Jaipur  Rajasthan ','313001','2024-07-02 05:23:58','2024-07-02 05:23:58'),
(292,'Dr.Rajpal Dhaka ','RajpalSinghDhaka.jpg',1,'Jeena sikho lifecare ltd ayurveda panchakarma hospital plot no 1a Palwas Crossing Bikaner Highway sikar Rajasthan near prince School 332001','Rajasthan ','Indian',2,'2024-06-25','Ghanshyam Singh Dhaka ','drrajpalsinghdhaka@gmail.com','7014046300','\"Satya Ayurveda sikar \r\nG1 Travani complex near pioneer hospital sikar Rajasthan 332001\"','VPO Bhadhadar sikar Rajasthan 332001','332001','2024-07-02 05:24:11','2024-07-02 05:24:11'),
(293,'Dr Jyotsna Choudhary   ','JyotsnaChoudhary.jpg',0,'Pg scholar MMM ayurveda college udaipur  ','Rajasthan ','Indian',2,'2024-06-25','Mr suresh kumar ','Drjyotsanachoudhary29978@gmail.com','63500 35887',' 143/ poonia ka bas, bidsar, lakshmangarh, sikar 332316 ','143/ poonia ka bas, bidsar, lakshmangarh, sikar 332316','332316','2024-07-02 05:24:21','2024-07-02 05:24:21'),
(294,'Vibhor Sethi  ','VibhorSethi.jpg',1,'Shop No.5, Main Market, Moti Nagar, New Delhi-110015.','New Delhi ','Indian',2,'2024-06-25','Mr. Rakesh Sethi','vibhor14161@gmail.com','7838187936','Room No.23, Boys Hostel, Shri Krishna Ayush University, Sector-8, Umri Road, Kurukshetra, Haryana- 136118.','B-53, Double Storey, Ramesh Nagar, New Delhi-110015. ','110015','2024-07-02 05:35:10','2024-07-02 05:35:10'),
(295,'Rahul Sharma','Krishnasharma.jpg',1,'Nainana brahaman sewla jatt gwalior road agra','Uttar pradesh','Indian',2,'2024-06-26','Gyanendra kumar sharma ','srmarahul12@gmail.com','8273413610','  Preeti vihar colony ,near anath ashram, Keharai , Shamshabad road agra ',' Preeti vihar colony ,near anath ashram, Keharai , Shamshabad road agra','282001','2024-07-02 05:35:25','2024-07-02 05:35:25'),
(296,'Dr Alok Kumar ','ALOKKUMAR.jpg',1,'Shuddhi Ayurveda Panchkarma Hospital, Jeena sikho lifecare ltd , E19 New Light colony ','Rajasthan ','Indian',2,'2024-06-26','Harihar Singh ','dralok18691@gmail.com','9430945892','\"Jeena sikho lifecare ltd \r\nShuddhi Ayurveda Panchkarma Hospital,\r\nE19 New Light colony Gopalpura Himmat Nagar, Jaipur 302018\" ','B19 Jai Ambey Nagar Kailash puri Tonk road Jaipur Rajasthan 302018','302018','2024-07-02 05:36:21','2024-07-02 05:36:21'),
(297,'Dr Anuja Nainwal   ','AnujaDhyani.jpg',0,'Sector 46, Gurgaon. Haryana ','Uttarakhand','Indian',2,'2024-06-27','Mr Rajnesh Dhyani  ','anujadhyani1997@gmail.com','8077639658',' 2039 sector 46 Huda colony Haryana ','R/o Rakesh Nainwal\r\nShantivihar Majra, Dehradun Uttarakhand ','248171','2024-07-02 05:36:36','2024-07-02 05:36:36'),
(298,'Dr Paramjit Kaur Sodhi    ','PallaviSodhi.jpg',0,'Shop no 1 Ground Floor Arunodaya CHS Subhash Road Vile Parle East Mumbai Maharashtra  ','Maharashtra ','Indian',2,'2024-06-27','Gurbax Singh Sodhi  ','pammisodhi59@gmail.com','9324974543',' 302 ARCO CHS TEJPAL SCHEME ROAD NO 2 VILE PARLE (E) MUMBAI MAHARASHTRA INDIA','302 ARCO CHS TEJPAL SCHEME ROAD NO 2 VILE PARLE (E) MUMBAI MAHARASHTRA INDIA','400057','2024-07-02 05:36:45','2024-07-02 05:36:45'),
(299,'Dr.Arun Kalihari','1720148504.jpg',1,NULL,'CHATTISGARH','India',2,'2024-07-05','Anant ram kalihari ','arunkalihari12@gmail.com','8305349505','Bhirawahi, Kanker, chhattishgarh,  near sheetla mandeer, (494334)','','494334','2024-07-05 03:01:43','2024-07-05 03:01:43'),
(300,'Dr Vandana Yadav','Vandanayadav.jpeg',2,NULL,'Haryana','Indian',5,'2024-05-18','H.O. Yadav','dr.vandanayadav02@gmail.com','8076003944','801/tower -3,ildgreens Sec-37c, near Narayana e-techno school ,Gurugram Haryana 122001','801/tower -3,ildgreens Sec-37c, near Narayana e-techno school ,Gurugram Haryana ','122001','2024-07-15 06:12:05','2024-07-15 06:12:05'),
(301,'Dr Kalanidhi Hota','1721175225.png',1,NULL,'ORISSA','India',1,'2024-07-17','Umatanaya Hota','kalanidhiaiia@gmail.com','9720872527','Department of Shalya Tantra, All India Institute of Ayurveda','','761118','2024-07-17 00:13:45','2024-07-17 00:13:45'),
(302,'Vaidhya Karun Sharma ','1721816157.mp4',1,NULL,'UTTAR PRADESH','India',2,'2024-07-24','Vd. Shree late Dhaniram Sharma ','drsharmahapur@gmail.com','9045887854','104 Nav jyoti colony Hapur ','','245101','2024-07-24 10:15:56','2024-07-24 10:15:56'),
(308,'Dr Vandana Shrivastava','vandanashrivastava.jpeg',2,NULL,'Uttarakhand ','India',2,'2024-07-24','Lt. Kailashwasi Shrivastava ','vandana.hhm.dsvv@gmail.com','9258369619','Dev Sanskrati Vishwavidhyalay , Shantikunj , Haridwar ','Dev Sanskrati Vishwavidhyalay , Shantikunj , Haridwar ','249411','2024-07-24 10:15:56','2024-07-24 10:15:56'),
(309,'Dr Akshay Kumar Goel','AkshayKumarGoel.jpeg',1,NULL,'UTTAR PRADESH','India',5,'2024-07-24','Mr. Vinod Kumar Goel','goyalakshay159@gmail.com','8006961234','Vill.+Post- Malakpur,Tehsil - Anoopshahr,District - Bulandshahr','Vill.+Post- Malakpur,Tehsil - Anoopshahr,District - Bulandshahr','203390','2024-07-24 10:15:56','2024-07-24 10:15:56'),
(310,'ANURAG SHARMA','1723011629.jpg',1,NULL,'UTTAR PRADESH','India',2,'2024-08-07','GAUTAM SHARMA','dr.anuragsharma05@gmail.com','7800942654','VILLAGE BARHAJ POST HORLAPUR DIST KUSHINAGAR 274303 up','VILLAGE BARHAJ POST HORLAPUR DIST KUSHINAGAR 274303 up','274303','2024-08-07 06:20:28','2024-08-07 06:20:28'),
(311,'Dr Siddhrth Shankar Mandal','1725545599.jpg',1,NULL,'UTTARANCHAL','India',2,'2024-09-05','Dev dutt Mandal','siddharth22m@gmail.com','9410150416','Ayush Clinic Gagrigol, Garur, Bageshwar, Uttarakhand, PIN 263641','House No 461, Sanjaynagar ward No 11(Old ward 3), Near Durga Mandir Sanjaynagar, Rudrapur, Udham Singh Nagar, Uttarakhand, PIN 263153','263153','2024-09-05 14:13:18','2024-09-05 14:13:18'),
(312,'Dr. Dhirendra Kumar Mishra','1725547839.jpg',1,NULL,'UTTAR PRADESH','India',2,'2024-09-05','Rajendra Prasad Mishra ','ayushclinic0@gmail.com','7388537834','Ayush hospital ','Ayush hospital Kaundhiyara prayagraj ','212106','2024-09-05 14:50:38','2024-09-05 14:50:38'),
(313,'Anuradha Tomar','1725691334.JPG',0,NULL,'UTTAR PRADESH','India',2,'2024-09-07','Azad singh tomar','anuradha27sep@gmail.com','9910945438','A6/204 CASA GREENS 1 near Sks World school','A6/204 casa greens 1 near sks world school Greater Noida west u.p 201318','201318','2024-09-07 06:42:14','2024-09-07 06:42:14'),
(314,'Dr Anchal Maheshwari ','1725799905.jpg',0,NULL,'UTTAR PRADESH','India',2,'2024-09-08','Santosh Maheshwari ','dranchalbams@gmail.com','9560553368','Flat no 26 tower 2, GH 07, Crossing Republic, GZB ','Flat no 26, tower 2, GH 07 Crossing Republic GZB ','201016','2024-09-08 12:51:44','2024-09-08 12:51:44'),
(315,'Dr. Ashutosh Kumar Singh ','1725956112.jpg',1,NULL,'UTTAR PRADESH','India',2,'2024-09-10','Dr Ashok kumar singh ','shivam.ashu.2@gmail.com','9557210353','149 New Mandi paccabag Hapur ','Muhammadpur, Hasanpur,Mau','245101','2024-09-10 08:15:12','2024-09-10 08:15:12'),
(317,'Dr. Mehrab Navi Usmani','',1,NULL,'UTTAR PRADESH','India',2,'2024-09-10','Dr. Mehrab Navi Usmani ','dr.mehrabnabi@gmail.com','','Behind Muslim Inter College Ward No. 21 New wasti Thakurdwara Moradabad','Behind Muslim Inter College Ward No. 21 New wasti Thakurdwara Moradabad','244601','2024-09-10 08:15:12','2024-09-10 08:15:12'),
(318,'Dr. Jayprakash Dubey','',1,NULL,'UTTAR PRADESH','India',2,'2024-09-10','Dr. Jayprakash Dubey','jpd8590@gmail.com','','Bapu Ayurvedic Medical College Evam Hospital Ladanpur Kopaganj Distt Mau','Bapu Ayurvedic Medical College Evam Hospital Ladanpur Kopaganj Distt Mau','275305','2024-09-10 08:15:12','2024-09-10 08:15:12'),
(319,'Bhupendra Singh','1730557249.png',1,NULL,'UTTAR PRADESH','India',0,'2024-11-02','Ramgopal Singh ','bhupendra531990@gmail.com','6395671502','Village Saidpuri, Post Rajopur, Tehsil Najibabad','','246764','2024-11-02 14:20:48','2024-11-02 14:20:48');
/*!40000 ALTER TABLE `tbl_pro_lect_member_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_publication`
--

DROP TABLE IF EXISTS `tbl_publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_publication` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_title` varchar(255) NOT NULL,
  `pub_desc` longtext NOT NULL,
  `pub_shortdesc` mediumtext NOT NULL,
  `pub_thumbnail` varchar(255) NOT NULL,
  `pub_pdf` varchar(250) NOT NULL,
  `pub_createdFor` enum('0','1') NOT NULL,
  `pub_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_publication`
--

LOCK TABLES `tbl_publication` WRITE;
/*!40000 ALTER TABLE `tbl_publication` DISABLE KEYS */;
INSERT INTO `tbl_publication` VALUES
(9,'Agnivesh Journal - Vol. 1','PHA+QWduaXZlc2g6IEludGVybmF0aW9uYWwgSm91cm5hbCBvZiBBeXVydmVkYSBSZXNlYXJjaCAmYW1wOyBIZWFsdGg8L3A+DQo=','International Journal of Ayurveda Research & Health','1715934521PDF.png','1715933732PDF.pdf','1','2024-05-17 05:23:43');
/*!40000 ALTER TABLE `tbl_publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_publication_logs`
--

DROP TABLE IF EXISTS `tbl_publication_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_publication_logs` (
  `plog_id` int(11) NOT NULL AUTO_INCREMENT,
  `publication_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `who_watched` enum('0','1') NOT NULL,
  `checked_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`plog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_publication_logs`
--

LOCK TABLES `tbl_publication_logs` WRITE;
/*!40000 ALTER TABLE `tbl_publication_logs` DISABLE KEYS */;
INSERT INTO `tbl_publication_logs` VALUES
(1,3,131,'0','2023-10-25 11:48:27'),
(5,8,1234567890,'1','2023-10-28 05:47:01'),
(6,8,787987987,'1','2024-02-23 04:48:01'),
(7,8,1234567890,'1','2024-02-23 09:37:02'),
(8,8,1234567890,'1','2024-02-23 09:39:47'),
(9,8,1234567890,'1','2024-02-23 09:40:05');
/*!40000 ALTER TABLE `tbl_publication_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_related_link`
--

DROP TABLE IF EXISTS `tbl_related_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_related_link` (
  `related_link_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `linkTitle` longtext DEFAULT NULL,
  `linkURL` longtext DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `shortingOrder` int(11) NOT NULL,
  PRIMARY KEY (`related_link_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_related_link`
--

LOCK TABLES `tbl_related_link` WRITE;
/*!40000 ALTER TABLE `tbl_related_link` DISABLE KEYS */;
INSERT INTO `tbl_related_link` VALUES
(1,'Central Council for Reserch in Ayurveda and Siddha (CRRAS)','http://www.ccras.nic.in','2021-10-13 16:27:14',2),
(2,'Central Council of Indian Medicine','http://www.ccimindia.org','2021-10-13 16:27:14',3),
(3,'Central Council for Research in Yoga and Naturopathy(CCRYN)','http://www.ccryn.org','2021-10-13 16:27:14',4),
(4,'Department of AYUSH','http://main.ayush.gov.in/','2021-10-13 16:27:14',1),
(5,'Indian Medicines Pharmaceuticals Coporation Ltd.(IMPCL)','http://www.impclmohan.nic.in','2021-10-13 16:27:14',5),
(6,'International Journal of Ayurveda Research','http://ijaronline.com','2021-10-13 16:27:14',6),
(7,'National Institute of Ayurveda(NIA)','http://www.nia.nic.in','2021-10-13 16:27:14',7),
(8,'National Center of Biotechnology Information','http://wwww.ncbi.nim.nih.gov','2021-10-13 16:27:14',8),
(9,'National Medicinal Plants Board(NMPB)','http://nmpb.nic.in','2021-10-13 16:27:14',9),
(10,'Pharmacopoeia Laboratory of Indian Medicine(PLIM)','http://wwww.nmpb.nic.in','2021-10-13 16:27:14',10),
(11,'Rashtiya Ayuerved Vidhya Peeth(RAV)','http://www.ravdelhi.nic.in','2021-10-13 16:27:14',11),
(12,'World Health Organization','http://www.who.int/en','2021-10-13 16:27:14',12);
/*!40000 ALTER TABLE `tbl_related_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_session`
--

DROP TABLE IF EXISTS `tbl_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_session` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp_number` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_session`
--

LOCK TABLES `tbl_session` WRITE;
/*!40000 ALTER TABLE `tbl_session` DISABLE KEYS */;
INSERT INTO `tbl_session` VALUES
(10001,'test','2342342342','2423422234','24234','2424','','','2024-04-16 08:18:14'),
(10002,'test','4234234234','2342342342','asdfsaf','4234234','','','2024-04-16 08:19:40'),
(10003,'test','4234234234','2423423423','asdf','4234234','','test','2024-04-18 05:16:52'),
(10004,'asdfa','3423423423','2342342334','asf','324234','','','2024-04-18 05:17:21'),
(10008,'sd','7879879879','3242342342','asdf','234234','','','2024-04-18 05:47:04'),
(10010,'asdf','4234232342','2423423423','asdf','42342','95','test','2024-04-18 09:11:17'),
(10011,'asdfasdfasf','3423423242','2342423424','asdf','4234','500','','2024-04-18 09:13:02');
/*!40000 ALTER TABLE `tbl_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_settings` (
  `setting_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `achievemnetsMemories` varchar(64) DEFAULT NULL,
  `altImg` varchar(64) NOT NULL,
  `is_active` int(11) DEFAULT 0,
  PRIMARY KEY (`setting_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_settings`
--

LOCK TABLES `tbl_settings` WRITE;
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` VALUES
(7,'1639981116_memories.png','1',1),
(9,'1639981151_memories.png','3',1);
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slide`
--

DROP TABLE IF EXISTS `tbl_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slide` (
  `slider_img_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_image_mobile` varchar(255) DEFAULT NULL,
  `buttonLink` varchar(255) NOT NULL,
  `altImg` varchar(64) NOT NULL,
  `content` longtext NOT NULL,
  `createdOn` timestamp NULL DEFAULT current_timestamp(),
  `updateOn` timestamp NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 0,
  `orderr` int(11) DEFAULT NULL,
  PRIMARY KEY (`slider_img_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slide`
--

LOCK TABLES `tbl_slide` WRITE;
/*!40000 ALTER TABLE `tbl_slide` DISABLE KEYS */;
INSERT INTO `tbl_slide` VALUES
(24,'1712813349_slider.png','1712813357_slider.jpeg','','3','<p>3</p>','2021-12-20 05:58:22','2021-12-20 05:58:22',0,1),
(25,'1707376800_slider.png','1707388834_slider.jpeg','','2','<p>2</p>','2021-12-20 05:58:39','2021-12-20 05:58:39',0,3),
(26,'1707376813_slider.png','1707388840_slider.jpeg','','1','<p>1</p>','2021-12-20 05:58:55','2021-12-20 05:58:55',1,2);
/*!40000 ALTER TABLE `tbl_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_state_council`
--

DROP TABLE IF EXISTS `tbl_state_council`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_state_council` (
  `state_council_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(64) DEFAULT NULL,
  `stateOrder` int(11) NOT NULL DEFAULT 0,
  `urlSlug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_council_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_state_council`
--

LOCK TABLES `tbl_state_council` WRITE;
/*!40000 ALTER TABLE `tbl_state_council` DISABLE KEYS */;
INSERT INTO `tbl_state_council` VALUES
(1,'Rajasthan',0,'rajasthan'),
(2,'Haryana',0,'haryana'),
(3,'Uttar Pradesh',0,'utter-pradesh'),
(4,'Chhattisgarh',0,'chhattisgarh'),
(5,'Madhya Pradesh',0,'madhya-pradesh'),
(6,'Maharashtra',0,'maharashtra');
/*!40000 ALTER TABLE `tbl_state_council` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subscribe`
--

DROP TABLE IF EXISTS `tbl_subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subscribe` (
  `subscribe_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `emailID` varchar(65) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`subscribe_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subscribe`
--

LOCK TABLES `tbl_subscribe` WRITE;
/*!40000 ALTER TABLE `tbl_subscribe` DISABLE KEYS */;
INSERT INTO `tbl_subscribe` VALUES
(1,'akanand42@gmail.com','2021-08-09 08:22:19'),
(3,'abc@gmail.com','2021-09-09 07:41:39'),
(4,'gb@ayurvedavoyages.com','2021-09-12 14:44:46'),
(5,'sharmashashank0716@gmail.com','2021-09-18 13:02:12'),
(6,'drkrcojha@gmail.com','2021-10-14 05:11:02'),
(7,'drprasanta000@gmail.com','2021-11-11 17:59:20'),
(8,'somesheam@gmail.com','2021-11-25 06:48:39'),
(9,'ashishupadhyaya002@gmail.com','2021-12-29 17:27:16'),
(10,'khandoliad@gmail.com','2022-01-04 12:52:42'),
(11,'Gaurav.singh2119@gmail.com','2022-01-17 12:51:24'),
(12,'mohammadaamir486@gmail.com','2022-01-17 18:57:38'),
(13,'dipakmandal80@gmail.com','2022-01-18 07:28:56'),
(14,'manugupta2390@gmail.com','2022-01-18 10:35:53'),
(15,'Sharma432@gmail.com','2022-01-21 16:17:32'),
(16,'Deepaman.4you@gmail.com','2022-01-22 07:23:09'),
(17,'dr.afzal67@gmail.com','2022-01-22 11:08:15'),
(18,'sharmarinita8077@gmail.com','2022-01-25 14:16:08'),
(19,'gagandeeps949@gmail.com','2022-01-29 18:56:45'),
(20,'mohdittiqaraza@gmail.com','2022-01-31 19:05:12'),
(21,'drvipul2602@gmail.com ','2022-02-01 05:02:19'),
(22,'anhad.preet09@gmail.com','2022-02-04 15:11:10'),
(23,'pravin.mogle@gmail.com','2022-02-08 04:19:13'),
(24,'Neoyadav007@gmail.com','2022-02-09 17:21:18'),
(25,'ubf@kz.org','2022-02-24 22:24:34'),
(26,'Srmarahul12@gmail.com','2022-03-14 12:45:18'),
(27,'sambhav.jain88711@gmail.com ','2022-03-14 13:48:43'),
(28,'sachdevpankaj1979@gmail.com','2022-03-16 10:31:57'),
(29,'rajarshi.rm@hotmail.com','2022-03-21 10:57:33'),
(30,'royaldeep32@gmail.com ','2022-03-21 11:26:23'),
(31,'nidhibibss@gmail.com','2022-03-21 14:41:17'),
(32,'drharpreetsingh92@gmail.com','2022-03-24 09:59:11'),
(33,'drajay.gupta001@gmail.com','2022-03-25 05:28:48'),
(34,'kanishk824118@gmail.com','2022-03-25 10:17:45'),
(35,'ajkmr035@gmail.com','2022-04-03 06:01:06'),
(36,'sunilpratapobc@gmail.com ','2022-04-07 12:40:20'),
(37,'aryaindiaorg@gmail.com ','2022-04-11 11:27:44'),
(38,'bhanudaypatel38@gmail.com ','2022-05-10 13:08:03'),
(39,'dr.bhargava143@gmail.com','2022-05-28 06:04:13'),
(40,'dmshpo787ca0zs9x@hubmail.info','2022-08-23 22:38:07'),
(41,'r5lpl77tx2u8@hubmail.info','2022-08-24 14:29:38'),
(42,'Sandeephooda12@gmail.com ','2022-09-11 10:32:39'),
(43,'dharmendra.imc@gmail.com','2022-09-13 20:03:02'),
(44,'pradeepthundathil1997@gmail.com','2022-11-28 13:51:37'),
(45,'Kunalpalsahab@gmail.com ','2022-12-08 08:41:51'),
(46,'elevenvows@gmail.com','2022-12-10 23:33:31'),
(47,'3o07srfuya1d5qju@mailfroms.info','2023-01-13 05:47:18'),
(48,'050u99bbl1ul4fbqf0@mailfroms.info','2023-01-21 00:42:52'),
(49,'e2es0wgxvnn4ckjrvma@mailfroms.info','2023-02-11 08:09:59'),
(50,'abiddocs91@gmail.com ','2023-04-05 14:56:50'),
(51,'drgeetanjaliarora2009@gmail.com','2023-04-19 12:23:52'),
(52,'dr.pc.insa@gmail.com','2023-04-26 16:10:52'),
(53,'dr.msrcbe@gmail. com','2023-04-30 18:19:59'),
(54,'ghare.mns.akhilesh@gmail.com','2023-05-04 17:29:26'),
(55,'Indusinha.barh@gmail.com','2023-05-05 01:15:30'),
(56,'asho1562@gmail.com','2023-05-05 07:20:01'),
(57,'Ashish18k@gmail.com','2023-05-05 18:45:18'),
(58,'vibhor14161@gmail.com','2023-05-17 19:53:53'),
(59,'drnaveengupta84@gmail.com ','2023-05-27 09:16:03'),
(60,'drrohitsharma1712@gmail.com','2023-06-06 02:48:13'),
(61,'csheilja@gmail.com','2023-06-10 12:17:59'),
(62,'docanu23@gmail.com','2023-06-13 09:16:58'),
(63,'ranakartik794@gmail.com','2023-06-14 18:54:09'),
(64,'imb_great@rediffmail.com ','2023-06-14 23:59:43'),
(65,'agastyaraaj@gmail.com','2023-06-18 04:19:56'),
(66,'Crystalfield177@gmail.com','2023-06-20 06:47:02'),
(67,'SOMIASINGLAML@GMAIL.COM','2023-06-22 11:45:56'),
(68,'drbhoopendra2009@gmail.com','2023-06-26 08:48:25'),
(69,'bams9975@gmail.com ','2023-06-27 11:37:44'),
(70,'akshrasngh36@gmail.com','2023-07-03 11:45:02'),
(71,'Sanjeetrai@yahoo.com','2023-07-09 06:44:57'),
(72,'devang822@gmail.com','2023-07-13 05:49:49'),
(73,'mdasifquamer087@gmail.com','2023-07-15 12:30:49'),
(74,'boghrapravina@gmail.com','2023-07-20 21:03:51'),
(75,'sayyadtaleb2751@gmail.com','2023-07-21 12:03:39'),
(76,'Shukladrrohit4@gmail.com','2023-07-29 05:24:51'),
(77,'Kailashpatel397@gmail.com','2023-08-12 13:21:12'),
(78,'CHANDRAMOHANJADON@GMAIL.COM','2023-08-14 06:43:16'),
(79,'drbhagwanjindal@gmail.com','2023-08-14 09:00:09'),
(80,'Sonusingh09709@gmail.com','2023-08-17 07:58:59'),
(81,'nigamprakash457@gmail.com','2023-08-27 07:04:29'),
(82,'devarya102@gmail.com','2023-08-30 07:42:14'),
(83,'mohitchaudhry34@gmail.com','2023-09-04 16:04:30'),
(84,'anitapolai','2023-09-06 01:28:48'),
(85,'anitapolai.ap@gmail.com','2023-09-06 01:29:05'),
(86,'tiwariveeru296@gmail.com','2023-09-06 18:15:18'),
(87,'enomarkbiotech@gmail.com','2023-09-16 03:43:14'),
(88,'princyc60@gmail.com','2023-09-17 04:24:59'),
(89,'vijayverma9794615@gmail.com','2023-09-17 06:06:04'),
(90,'drrajesh2223@gmail.com','2023-09-24 07:37:42'),
(91,'vaidyam.jayesh@gmail.com','2023-10-02 10:00:56'),
(92,'mauryaharshit@gmail.com','2023-10-02 11:56:00'),
(93,'karishmajumani69@gmail.com','2023-10-02 17:35:40'),
(94,'parteeksharma011@gmail.com','2023-10-03 10:49:44'),
(95,'test@test.com','2024-02-06 06:44:55'),
(96,'','2024-05-19 04:38:23'),
(97,'1','2024-06-19 03:15:02'),
(98,'krcojha72@gmail.com','2024-07-20 10:28:07'),
(99,'drpushpa.yadav800@gmail.com','2024-08-28 15:12:54'),
(100,'drarvindranjan@gmail.com','2024-09-05 13:48:32'),
(101,'ayushclinic0@gmail.com','2024-09-05 14:51:46'),
(102,'dr.mehrabnabi@gmail.com','2024-09-16 08:17:22'),
(103,'dhairyashilp95@gmail.com','2024-12-23 08:33:27');
/*!40000 ALTER TABLE `tbl_subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_testimonial`
--

DROP TABLE IF EXISTS `tbl_testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_testimonial` (
  `testimonial_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext DEFAULT NULL,
  `autherName` varchar(64) DEFAULT NULL,
  `autherOccupation` varchar(64) DEFAULT NULL,
  `autherImage` varchar(255) DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `ipAddress` varchar(64) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`testimonial_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_testimonial`
--

LOCK TABLES `tbl_testimonial` WRITE;
/*!40000 ALTER TABLE `tbl_testimonial` DISABLE KEYS */;
INSERT INTO `tbl_testimonial` VALUES
(1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','Anand Kumar','Softwear Engginer','ats.png','2021-08-06 09:57:40',NULL,0),
(2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','Mohit Shrivastav','MD Apple therapeuties','ats.png','2021-08-06 09:57:40',NULL,0),
(3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','Rahul Kumar','Razorse Softwear Pvt. Ltd.','ats.png','2021-08-06 09:57:40',NULL,0);
/*!40000 ALTER TABLE `tbl_testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaction`
--

DROP TABLE IF EXISTS `tbl_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(50) NOT NULL,
  `cust_email_id` varchar(50) NOT NULL,
  `cust_mobile_no` varchar(50) NOT NULL,
  `merchant_id` varchar(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `txn_amount` varchar(50) NOT NULL,
  `resp_message` varchar(50) NOT NULL,
  `bank_ref_id` varchar(250) NOT NULL,
  `resp_code` varchar(250) NOT NULL,
  `pg_ref_id` varchar(250) NOT NULL,
  `trans_status` varchar(50) NOT NULL,
  `txn_date_time` datetime NOT NULL,
  `table_id_fk` int(11) NOT NULL,
  `formtype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaction`
--

LOCK TABLES `tbl_transaction` WRITE;
/*!40000 ALTER TABLE `tbl_transaction` DISABLE KEYS */;
INSERT INTO `tbl_transaction` VALUES
(1,'HMKBZJ994','satrunjagdeg@gmail.com','8369960713','M00081','UPI','5100.00','Transaction Failed.','312979440796','FFFFF','1012312917400033933','F','2023-05-09 17:40:02',1,'PHARMA MEMBERSHIP'),
(2,'EBZYGP995','dheeraj@gmail.com ','8369960712','M00081','UPI','5100.00','Transaction Failed.','312979708523','FFFFF','1022312919070306395','F','2023-05-09 19:07:30',1,'PATRON MEMBERSHIP'),
(3,'HVLPMR538','nkpandit86@Gmail.com','7988879796 ,  8198917372','M00081','UPI','2100.00','Transaction Successful.','313906368121','00000','1022313911480203380','Ok','2023-05-19 11:48:20',5,'LIFE MEMBERSHIP'),
(4,'SCUYET532','mohiniricha24@gmail.com','8894583756','M00081','UPI','250.00','Transaction Failed.','NA','FFFFF','1022316120140573665','F','2023-06-10 20:14:57',18,'IDCARD'),
(5,'RSVNIB785','DRVARINDERSINGH53@GMAIL.COM','9644130001','M00081','UPI','5100.00','Transaction Successful.','316682340859','00000','1012316617540115954','Ok','2023-06-15 17:54:10',16,'PATRON MEMBERSHIP'),
(6,'INLTGE101','lalitbansal1994@gmail.com','9781868444','M00081','UPI','2100.00','Transaction Successful.','317810120163','00000','1012317808180332705','Ok','2023-06-27 08:18:33',40,'LIFE MEMBERSHIP'),
(7,'INLTGE101','lalitbansal1994@gmail.com','9781868444','M00081','UPI','2100.00','Transaction Successful.','317810120163','00000','1012317808180332705','Ok','2023-06-27 08:18:33',40,'LIFE MEMBERSHIP'),
(8,'WZMQXK372','drhrushi@gmail.com','+919730740237','M00081','UPI','5100.00','Transaction Failed.','NA','FFFFF','1022317818230493552','F','2023-06-27 18:23:49',19,'PATRON MEMBERSHIP'),
(9,'JXQWBN171','sumansahi22@gmail.com','07827043679','M00081','NB','2100.00','Transaction Successful.','926439849','00000','1022317919260179691','Ok','2023-06-28 19:26:17',42,'LIFE MEMBERSHIP'),
(10,'MFAUOR455','puneetmittal@mgcts.org','8937015757','M00081','DC','5100.00','Transaction Successful.','318080020394','00000','1022318017280203315','Ok','2023-06-29 17:28:20',20,'PATRON MEMBERSHIP'),
(11,'QIGSXL272','rohitdaksh62@gmail.com','09258585813','M00081','UPI','2100.00','Transaction Successful.','318119669814','00000','1022318121590360117','Ok','2023-06-30 21:59:36',43,'LIFE MEMBERSHIP'),
(12,'QIGSXL272','rohitdaksh62@gmail.com','09258585813','M00081','UPI','2100.00','Transaction Successful.','318119669814','00000','1022318121590360117','Ok','2023-06-30 21:59:36',43,'LIFE MEMBERSHIP'),
(13,'QIGSXL272','rohitdaksh62@gmail.com','09258585813','M00081','UPI','2100.00','Transaction Successful.','318119669814','00000','1022318121590360117','Ok','2023-06-30 21:59:36',43,'LIFE MEMBERSHIP'),
(14,'VGKSWQ577','akshrasngh36@gmail.com','7381510851','M00081','UPI','250.00','Transaction Failed.','NA','FFFFF','1022318417130343676','F','2023-07-03 17:13:34',26,'IDCARD'),
(15,'UOYJZS303','sayyadtaleb2751@gmail.com','9922714586','M00081','UPI','250.00','Transaction Successful.','320276816955','00000','1012320214160174753','Ok','2023-07-21 14:16:17',32,'IDCARD'),
(16,'XMJGZB954','ankurkumartanwar1@gmail.com ','9250868756','M00081','UPI','2100.00','Transaction Successful.','320379863944','00000','1012320317470436309','Ok','2023-07-22 17:47:43',50,'LIFE MEMBERSHIP'),
(17,'QWZMOD384','manubauddhya@gmail.com','8077785404','M00081','UPI','500.00','Transaction Successful.','320893570935','00000','1012320822240546648','Ok','2023-07-27 22:24:54',3,'MEMBERSHIP'),
(18,'IGXPQK543','ABHIRAM16761@GMAIL.COM','7351196186','M00081','UPI','500.00','Transaction Successful.','322339890093','00000','1012322320170587939','Ok','2023-08-11 20:17:58',4,'MEMBERSHIP'),
(19,'TZBREM107','darpan.gangil@gmail.com','7999824961 & 9229698159','M00081','UPI','2100.00','Transaction Successful.','322441948000','00000','1012322415200112734','Ok','2023-08-12 15:20:11',58,'LIFE MEMBERSHIP'),
(20,'BOTQVE226','RAJAGRAWAL167@GMAIL.COM','9826573564','M00081','UPI','500.00','Transaction Successful.','322442331707','00000','1022322417370077558','Ok','2023-08-12 17:37:07',6,'MEMBERSHIP'),
(21,'XPELWJ180','ANOOPMALL09@GMAIL.COM','9454317522','M00081','UPI','2100.00','Transaction Failed.','322442758340','FFFFF','1012322419490592285','F','2023-08-12 19:49:59',59,'LIFE MEMBERSHIP'),
(22,'HARTBJ412','ANOOPMALL09@GMAIL.COM','9454317522','M00081','UPI','2100.00','Transaction Successful.','322442786636','00000','1012322419590142714','Ok','2023-08-12 19:59:13',60,'LIFE MEMBERSHIP'),
(23,'HARTBJ412','ANOOPMALL09@GMAIL.COM','9454317522','M00081','UPI','2100.00','Transaction Successful.','322442786636','00000','1012322419590142714','Ok','2023-08-12 19:59:13',60,'LIFE MEMBERSHIP'),
(24,'TMNXVZ484','drbhagwanjindal@gmail.com','7015810778','M00081','UPI','2100.00','Transaction Successful.','322646099137','00000','1022322607410576425','Ok','2023-08-14 07:41:57',70,'LIFE MEMBERSHIP'),
(25,'TEADNC765','drraghavsharma15@gmail.com','8937919010','M00081','UPI','2100.00','Transaction Successful.','322646947664','00000','1022322613010382790','Ok','2023-08-14 13:01:38',71,'LIFE MEMBERSHIP'),
(26,'HIDUKE839','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','M00081','DC','2100.00','','322813876118','SBE0300865','1012322813430543828','F','2023-08-16 13:43:54',76,'LIFE MEMBERSHIP'),
(27,'ZWJTOK286','dr.thakur.navdeep@gmail.com ','9855193235  8837710050','M00081','UPI','2100.00','Transaction Successful.','322852313452','00000','1012322813560454355','Ok','2023-08-16 13:56:45',77,'LIFE MEMBERSHIP'),
(28,'TZBREM107','darpan.gangil@gmail.com','7999824961 & 9229698159','M00081','UPI','2100.00','Transaction Successful.','322441948000','00000','1012322415200112734','Ok','2023-08-12 15:20:11',58,'LIFE MEMBERSHIP'),
(29,'RKXPEN421','shadabkhann89@gmail.com','9008395286','M00081','UPI','2100.00','Transaction Successful.','322954789056','00000','1012322912270474214','Ok','2023-08-17 12:27:47',79,'LIFE MEMBERSHIP'),
(30,'FQRBUX419','SONU DHAKA','SONU DHAKA','M00081','UPI','2100.00','Transaction Successful.','322955457800','00000','1012322916290143921','Ok','2023-08-17 16:29:14',80,'LIFE MEMBERSHIP'),
(31,'UONGIP147','chandramohanjadon@gmail.com','9634137765','M00081','UPI','250.00','Transaction Successful.','322956486892','00000','1022322922140388012','Ok','2023-08-17 22:14:38',58,'IDCARD'),
(32,'NEBKLF956','drmhmarkunda@gmail.com','9972894688','M00081','UPI','2100.00','Transaction Successful.','323160036131','00000','1012323111240333371','Ok','2023-08-19 11:24:33',81,'LIFE MEMBERSHIP'),
(33,'JKBRVF911','BIPINBIHARI8519@GMAIL.COM','7903301838,9470712020','M00081','CC','2100.00','Transaction Successful.','323550026569','00000','1022323513220372414','Ok','2023-08-23 13:22:37',119,'LIFE MEMBERSHIP'),
(34,'ZKPBWG903','NIGAMPRAKASH457@GMAIL.COM','8896718157','M00081','UPI','2100.00','Transaction Successful.','323981615676','00000','1022323912540575802','Ok','2023-08-27 12:54:56',123,'LIFE MEMBERSHIP'),
(35,'LOSJAI927','dr.deepaks@icloud.com','7566449595','M00081','UPI','2100.00','Transaction Successful.','324187386122','00000','1022324114270423219','Ok','2023-08-29 14:27:42',129,'LIFE MEMBERSHIP'),
(36,'SUBAQO714','dralokkumar79030@gmail.com','9430945892','M00081','UPI','250.00','Transaction Successful.','324291864441','00000','1012324221490189402','Ok','2023-08-30 21:49:18',64,'IDCARD'),
(37,'MULNRQ528','anushreemaheshwari25@gmail.com','9528878858','M00081','UPI','250.00','Transaction Failed.','NA','FFFFF','1022324715020583003','F','2023-09-04 15:02:58',68,'IDCARD'),
(38,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(39,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(40,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(41,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(42,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(43,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(44,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(45,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(46,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(47,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(48,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(49,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(50,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(51,'','','','','','','','','','','','0000-00-00 00:00:00',0,''),
(52,'','','','','','','','','','','','0000-00-00 00:00:00',0,'');
/*!40000 ALTER TABLE `tbl_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_video`
--

DROP TABLE IF EXISTS `tbl_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_video` (
  `video_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `videoTitle` varchar(255) DEFAULT NULL,
  `videoiframeurl` varchar(255) NOT NULL,
  `createdOn` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`video_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_video`
--

LOCK TABLES `tbl_video` WRITE;
/*!40000 ALTER TABLE `tbl_video` DISABLE KEYS */;
INSERT INTO `tbl_video` VALUES
(5,'Beware of hospital scams looting Indians! भारतीयों को लूटने वाले अस्पतालों के घोटालेबाजों से सावधान!',' https://www.youtube.com/embed/LzeSV_erJdw?si=o8LGG-SW1cX0aWEd','03/20/2024 08:41:10 am'),
(6,'आयुर्वेद इंडस्ट्री में अपना खुद का व्यवसाय शुरू करें!|Start your own business in Ayurveda industry!','https://www.youtube.com/embed/Q39GqunjgD8?si=zOe8mvLvGgBx9scu',NULL),
(7,'भीषण गर्मी में रखें अपने शरीर को ठंडा-ठंडा कूल-कूल! Keep your body cool in the scorching heat!','https://www.youtube.com/embed/TmNjvM6jZ0w?si=00qsiGm2dAQde3OO',NULL),
(8,'पेट से जुड़ी किसी भी समस्या का स्थाई व सटीक उपचार! |Permanent treatment for stomach related problems!','https://www.youtube.com/embed/mFY1zeWoQZU?si=oxRb-WkeT-1Zr6Jt',NULL),
(9,'करें अपना मेंटल डिटॉक्स (मन की सफाई) : Do your mental detox (cleanse your mind)','https://www.youtube.com/embed/4KFkSYNvtc0?si=cjgyo7CaEdcKW4VM',NULL),
(10,'Know The Great Ways By Adopting Which You Can Live A Quality Life For 100 Years','https://www.youtube.com/embed/D6blXjMAGuk?si=ljpwZPP5osz4snHl',NULL),
(11,'मोटापे का सही समाधान! Right ways to manage obesity!','https://www.youtube.com/embed/KBoVZZUDfIg?si=Lum5iR5QfvemGGAq',NULL);
/*!40000 ALTER TABLE `tbl_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_work_experience_profession`
--

DROP TABLE IF EXISTS `tbl_work_experience_profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_work_experience_profession` (
  `tbl_work_experience_profession_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `application_id_fk` int(11) NOT NULL,
  `name_of_orgnization` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  PRIMARY KEY (`tbl_work_experience_profession_id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_work_experience_profession`
--

LOCK TABLES `tbl_work_experience_profession` WRITE;
/*!40000 ALTER TABLE `tbl_work_experience_profession` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_work_experience_profession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upgrade_medical_form`
--

DROP TABLE IF EXISTS `upgrade_medical_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upgrade_medical_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `coupon_applied` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `display` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upgrade_medical_form`
--

LOCK TABLES `upgrade_medical_form` WRITE;
/*!40000 ALTER TABLE `upgrade_medical_form` DISABLE KEYS */;
INSERT INTO `upgrade_medical_form` VALUES
(32,'himanshup.pandey73@gmail.com','1998-08-10','8528827900','8528827900','himanshup.pandey73@gmail.com','Gali no-3,  Pawanpuri Devikhera\r\nTelibagh','226002','BAMS','AFI190','2024-06-01 08:13:23',1),
(35,'Ayushsparsh','0019-12-09','8077785404','8077785404','manubauddhya@gmail.com','kjkn','10001','ba','ANF210','2024-06-01 08:23:51',0),
(36,'Dr.Manoj Chaurasiya','1980-01-09','9993372490','9993372490','drmk.chaurasia1@gmail.com','Dr.Manoj Chaurasiya,38 Avantika dairy tilak path rajwada indore','452001','BAMS, PG YOGA','AFI190','2024-06-01 08:57:04',1),
(38,'Dr Dipendra Prasad Yadav','1996-02-23','8839805525','8839805525','dpyadav3500@gmail.com','Janakpur Nepal','45700','BAMS MPH','AFI190','2024-06-01 09:37:34',1),
(42,'Deepak Mahur','2002-05-08','9084111326','9084111326','deepakmahur2017@gmail.com','Amargarh 202398','202398','BAMS Final Year Student','AKS120','2024-06-01 09:52:11',1),
(43,'Mahesh Sharma','1990-03-10','9728129259','9728129259','dr.maheshsharma06@gmail.com','V.P.O. Rawaldhi, District Charkhi Dadri, Haryana -127306','127306','MS (Ayu)','AFI190','2024-06-01 09:52:41',1),
(48,'Dr pradeep shakyawar','1988-12-13','9074394959','9074394959','kuwar.pradeep20@gmail.com','AB road Binaganj guna MP','473115','BAMS','','2024-06-01 10:27:25',1),
(49,'Ghanshyam Khatri','1990-08-15','7014121367','7014121367','dr.ghanshyamkhatri@rediffmail.com','676,pratap marg gandhi colony,Jaisalmer .Rajasthan','345001','BAMS','AFI190','2024-06-01 10:48:59',1),
(50,'Dr Manish Kumar Kurmi','1992-01-02','7828441043','7828441043','mk1943120@gmail.com','Sp memorial Convent Higher Secondary School Garhakota Dist Sagar M. P','470229','BAMS','AFI190','2024-06-01 10:54:23',1),
(54,'roshan Singh','1997-06-20','8754306112','8754306112','roshan14197@gmail.com','baliyaan bihar','236018','bams','','2024-06-01 11:15:33',1),
(55,'Vaidya kalidas patil bujadi','1999-12-14','6395616857','6395616857','kalidasbujadi@gmail.com','Vodduguda village, Dahegaon mandal,komrambheem asifabad district, Telangana state','504296','Traditional paramparya vaidya','NEH30','2024-06-01 11:51:39',1),
(56,'Subrata sekhar sahu','1998-09-17','9337159469','9337159469','subratassahu3@gmail.com','Balangir Odisha','767001','BAMS','AKS120','2024-06-01 15:04:53',1),
(57,'Dr.Deepak gupta','1992-06-02','9694627522','9694627522','dk24mdgupta@gmail.com','Ramlila ground bhatni','274701','MD ayu','','2024-06-02 02:20:39',0),
(58,'Surjit Singh','1997-11-30','9161521886','9140899263','surjit30@gmail.com','1, BSNL Telephone Exchange, Zafrabad Road, Chhipiya, Pehar, Thana -Rehra, Tehsil - Utraula','271604','BAMS','SUR70','2024-06-02 03:16:02',0),
(59,'Ved Siddhant Verma','1993-08-16','7985845054','7860337633','siddhantverma93@gmail.com','645-A/421-A Jankivihar , Jankipuram Lucknow','226021','BAMS','','2024-06-02 03:28:07',1),
(61,'Dr.Neelam Patil','1974-03-24','9892518107','9892518107','neelampatil74@gmail.com','Dr Patil bungalow, Behind satidevi mandir, Moreshwar Patil road, Eksar village, near Eksar metro station Borivali west','400092','BAMS,FCHC, MA(YOGASHASTRA)','AFI190','2024-06-02 06:54:26',1),
(62,'Anuj chaudhary','1998-05-19','7895247823','7895247823','anujc0050@gmail.com','Aligarh','202131','Pursuing B.A.M.S Final year','SAM110','2024-06-02 12:47:58',1),
(63,'Jayraj yadav','1996-01-01','9258853833','9758853833','jaysapna108@gmail.com','Village nagla bhara post umarsenda bharthana etawah UP.','206242','BAMS','','2024-06-02 13:33:10',1),
(64,'Tejinder Singh','1990-07-15','8054521083','6284252372','tejindersidhu5@gmail.com','V.P.O Mann Teh. Malout Dist.Shri Muktsar Sahib Punjab','152113','B.A.M.S','AFI190','2024-06-02 13:42:22',1),
(65,'Shivam Kumar','2001-07-24','9873536762','9873536762','sivam.shivaay@gmail.com','Gorakhpur','273015','Student','AFI190','2024-06-03 16:48:24',1),
(66,'Priya jayasaval','1998-11-02','9839725883','6394472500','priyajaiswal78910@gmail.com','Muftiganj kerakat jaunpur \r\n222170','222170','Bams','PAL220','2024-06-03 18:15:30',1),
(67,'Tamara Hol','2024-05-29','9878456121','9855366451','','','','','','2024-06-04 04:41:00',0),
(68,'Nikhil','2000-10-30','9855366451','9855366451','dasnikhil30102000@gmail.com','','','','afi190','2024-06-04 07:33:03',0),
(69,'Tamara Hol','2024-05-28','9878456121','9855366451','admin@hiims.com','','','','afi190','2024-06-04 07:36:56',0),
(70,'Dr Abhishek Gupta','1995-10-31','8802230661','8802230661','gupta.abhi311095@gmail.com','H.No.559 VPO Alipur Delhi -110036','110036','BAMS ,MD Scholar','AFI190','2024-06-04 17:07:21',1),
(71,'Susheela','1985-01-15','9871766797','9871766797','SusheelaNaturopathy@gmail.com','E5/12 sector 16 rohini delhi','110089','Graduate','ANF210','2024-06-05 10:27:39',1),
(72,'Jyoti Varshney','1976-05-12','9250046973','9250046973','jyotivarshney1276@gmail.com','225,Pocket- 18\r\nSector -24,Rohini,Delhi-110085','110085','Mphil in yogic science','ANF210','2024-06-05 12:02:54',1),
(73,'Priya singh','2024-12-31','8077785404','9598319061','ayurvedafederation@gmail.com','nkn','202020','njn','AFI190','2024-06-05 17:10:03',0),
(74,'Dr Tripti','2000-03-04','8601157628','8601157628','trippandey123@gmail.com','Sector 43 gurgaon','122001','Bams','PAL220','2024-06-06 04:47:43',1),
(75,'Dr uveash','1993-05-08','9639197786','9639197786','rudrapur.pc@gmail.com','Rampur','244925','BAMS','PAL220','2024-06-06 05:32:35',1),
(76,'Dr.jitendra sharama','2024-01-10','7376861610','7881116326','jeetubams@gmail.com','GRAM-SONADI ,DIST-DEORIA U.P','27400','BAMS','AFI190','2024-06-06 05:57:54',1),
(77,'Dharmendra kumar','1988-09-19','9027762327','9027762327','dr.dharmendra34@gmail.com','village + p. o. -Nojal, p.s.- Thanabhawan, distt-Shamli, Uttar Pradesh','247777','BAMS','AFI190','2024-06-06 07:27:25',1),
(78,'Dr Rajiv Gaur','1990-11-22','9996799157','9996799157','Drgaur39@gmail.com','171/7 hanse enclave gurgaon','122001','Bams','AFI190','2024-06-06 11:58:09',1),
(79,'Ashutosh Verma','2000-01-02','9580770400','9580770400','vermaashutosh242@gmail.com','In front of  ban Sagar colony,Bada sakhauda,Mirzapur Uttar','231001','Bams (3rd year )2nd prof.','AFI190','2024-06-06 12:42:17',1),
(80,'Dr Indrajeet Kumar vaid','1975-04-25','8051026278','9835044272','dhruvkanayurvedicpharma@gmail.com','Dr Indrajeet Kumar vaid\r\nOld kachahari road\r\nNawada Bihar','805110','BNYS., panchakarma (vaidratnam kerala Se))','AFI190','2024-06-06 13:18:59',1),
(81,'Dr Rajesh Kumar Sahu','1980-08-10','9453703911','9453703911','Dr.rajeshsahu99@gmail.com','Family care clinic maveshi bazar Sagar road lalitpur','284403','BSC BAMS CKS CCH','PAL220','2024-06-07 04:45:20',1),
(82,'Dr priya khatana','1991-03-26','9882779899','9882779899','priya26khatana@gmail.com','Vpo barotiwala distt solan teh baddi hp','174103','BAMS','AFI190','2024-06-07 06:09:27',1),
(83,'Awantika solanki','2000-09-06','8504923742','8504923742','awanisolanki6@gmail.com','Amba colony Bulandshahr','203131','BAMS 3year','AKS120','2024-06-07 07:02:28',1),
(84,'Parmendra manjhi','2024-04-05','8882776076','8882776076','focusbrainactivation@gmail.com','48 ground floor pkt 19 Rohini Sector 24','110085','12th pass, diploma in neurotherapy','AFI190','2024-06-07 12:36:14',1),
(85,'Deeksha Sahu','2002-07-01','6397878978','6397878978','deekshabdn2002@gmail.com','','','','','2024-06-07 12:56:00',0),
(86,'Deeksha Sahu','2002-07-01','6397878978','6397878978','deekshabdn2002@gmail.com','Budaun','243601','BAMS 3rd yr student','SAM110','2024-06-07 13:00:59',1),
(87,'Dr Putul','1991-01-15','8178879054','9650969615','putulkumari2012@gmail.com','B-191 New Jankipuri near St Michael School Uttam Nagar New Delhi','110059','BAMS','AFI190','2024-06-07 18:22:45',1),
(88,'Dr Jyoti','1990-09-24','9464756281','9464756281','jyotishukla.924@gmail.com','#824 NIC Manimajra Chandigarh','160101','BAMS','AFI190','2024-06-08 04:38:16',1),
(89,'Dr Rakesh Kumar','1994-07-06','9992562855','9518112417','kingkumar4225@gmail.com','Vpo Nagina thassil firozpur jhirka distric nuh Haryana','122108','BAMS','','2024-06-08 07:34:07',1),
(90,'Rahul sharma','1993-06-01','8273413610','8273413610','srmarahul12@gmail.com','Preeti vihar colony near anath ashram kaharai shamsabad road agra','282001','Bams','AFI190','2024-06-08 12:48:45',1),
(91,'Dr Akshayanand Vashisht','1994-02-24','7589089047','7589089047','sabugrt94@gmail.com','Vpo Gindpur Malon teh Amb Distt Una HP','177110','BAMS','AFI190','2024-06-08 15:47:21',1),
(92,'Aditya kumar','2002-08-06','6205222640','6205222640','kumaradityask06@gmail.com','Gorakhpur','273001','BAMS','','2024-06-08 20:11:15',1),
(93,'Gaurav Govil','2004-02-20','9259547249','9259547249','gauravgovil777@gmail.com','445K, Navalpura 2 kakrala, khurja Bulandhsar','203131','Bams 1st year','ADA100','2024-06-09 05:21:15',1),
(94,'Tarun yadav','2003-08-15','7339868017','7339868017','ty742528@gmail.com','Gaur brahman ayurvedic College','124001','12th','RAJ270','2024-06-09 08:20:06',1),
(95,'Shreya','2000-04-12','8708825012','8708825012','tshreya.1204@gmail.com','Mohalla khojawara Mahendragarh Haryana','123029','Bams','RAJ270','2024-06-09 08:28:04',1),
(96,'Dr. Monika Thakur','1994-06-14','9418056196','8171956196','thakurmonika1994@gmail.com','Block no 4 , set no. 45 , type 3  US CLUB Shimla 171001 ( Himachal Pradesh)','171001','BAMS','AFI190','2024-06-09 13:48:38',1),
(97,'Dr.Himanshu Tiwari','1996-07-10','9340198684','9340198684','himanshutiwarird@gmail.com','House no 71 ward no 3 birsinghpur district -satna mp','485226','BAMS','AFI190','2024-06-09 15:14:31',1),
(98,'Vibhor Sethi','2002-01-24','7838187936','7838187936','vibhor14161@gmail.com','B-53, Double Storey, Ramesh Nagar, New Delhi-110015.','110015','BAMS (pursuing)','AFI190','2024-06-09 16:42:23',0),
(99,'Vibhor Sethi','2002-01-24','7838187936','7838187936','vibhor14161@gmail.com','B-53, Double Storey, Ramesh Nagar, New Delhi-110015.','110015','BAMS (pursuing)','AFI190','2024-06-09 18:01:15',1),
(100,'Priya singh','2024-12-30','8077785404','9598319061','ayurvedafederation@gmail.com','v','283110','BAMS','AFI190','2024-06-10 11:09:46',0),
(101,'Sunanda Sanyal','1976-09-18','8932959599','8932959599','dr.sunansanyal18@gmail.com','Dr.Sunanda Sanyal  W/o-Dr.U.K.Sanyal C/oB.Ram,.Dewlaalay 7/153MIG Jhunsi  prayagraj','211019','M.Sc.BAMS','AFI190','2024-06-10 11:27:53',1),
(102,'Anuja','1997-05-11','8077639658','8077639658','anujadhyani1997@gmail.com','R/O Rakesh Nainwal,\r\nShantivihar Majra Dehradun,\r\nUttrakhand','248007','BAMS','ABH20','2024-06-10 15:06:17',1),
(103,'Ansh Sharma','2001-02-12','9897668751','9897668751','sharmansh375@gmail.com','B-42 Panchwati Colony Khurja','203131','BAMS','AKS120','2024-06-10 16:43:09',0),
(104,'Ansh Sharma','2001-02-12','9897668751','9897668751','sharmansh375@gmail.com','B-42 Panchwati Colony Khurja','203131','BAMS','AKS120','2024-06-10 16:49:59',1),
(105,'Vishal','1996-12-07','9053480005','9053480005','sainivishal1296@gmail.com','Village Bhukhari District Kurukshetra Haryana','136156','Pg scholar (MS)','AFI190','2024-06-11 04:31:31',1),
(106,'Sudesh','1999-02-10','9466605830','9466605830','sudeshkumari1712@gmail.com','House no . 1032 ,sector -7,near district court chowk','136118','M.S. (shalya Tantra)','AFI190','2024-06-11 04:46:21',0),
(107,'Sudesh','1999-02-10','9466605830','9466605830','sudeshkumari1712@gmail.com','House no 1032 ,sector 7\r\nNear district court, kurukshetra','136118','M.S. (shalya Tantra)','AFI190','2024-06-11 04:52:49',0),
(108,'Sudesh','1999-02-02','9466605830','9466605830','sudeshkumari1712@gmail.com','House no 1032 ,sector 7\r\nNear district court, kurukshetra','136118','M.S. (shalya Tantra)','AFI190','2024-06-11 04:58:34',1),
(109,'Priya','1997-06-03','9799015960','9799015960','priyajangra.2230@gmail.com','Narsingh sadan gali,  Gulati road,  Paraw mohalla,  Samalkha Distt. Panipat (Haryana)','132101','B.A.M.S.','','2024-06-11 10:04:09',0),
(110,'Priya','1997-06-03','9799015960','9799015960','priyajangra.2230@gmail.com','Narsingh sadan gali,  Gulati road,  Paraw mohalla,  Samalkha Distt. Panipat (Haryana)','132101','B.A.M.S.','AFI190','2024-06-11 10:06:35',1),
(111,'Amit','1991-06-25','7500373939','7500373939','amitkumarverma380@gmail.com','Village saroorpur post Simbhaoli','245207','Bams','AFI190','2024-06-11 10:36:25',1),
(112,'Amit kumar verma','1991-06-25','7500373939','7500373939','amitkumarverma380@gmail.com','Village saroorpur post Simbhaoli','245207','Bams','AFI190','2024-06-11 10:41:55',1),
(113,'Amit kumar verma','1991-06-25','7500373939','7500373939','amitkumarverma380@gmail.com','Village saroorpur post Simbhaoli','245207','Bams','AFI190','2024-06-11 10:44:22',1),
(114,'Amit','1991-06-25','7500373939','7500373939','amitkumarverma380@gmail.com','Village saroorpur post Simbhaoli','245207','Bams','AFI190','2024-06-11 10:52:15',1),
(115,'Ansh Sharma','2001-02-12','9897668751','9897668751','sharmansh375@gmail.com','B-42 Panchwati Colony Khurja UP','203131','BAMS','AKS120','2024-06-11 14:42:56',0),
(116,'Dr.Alok Kumar','','9430945892','9430945892','dralokkumar79030@gmail.com','E19 New Light colony Gopalpura mod under Bhaskar Flyover Jaipur Rajasthan','302018','Practitioner','AFI 190','2024-06-12 04:41:03',1),
(117,'Dr.Rajpal Dhaka','','7014046300','7014046300','drrajpalsinghdhaka@gmail.com','VPO Bhadhadar sikar Rajasthan','332315','student Practitioner','AFI 190','2024-06-12 04:42:04',1),
(118,'Dr Jyotsana choudhary','','7426990325','63500 35887','drjyotsanachoudhary29978@gmail.com','mmm government Ayurvedic clg, udaipur','313001','student','AFI 190','2024-06-12 04:43:11',1),
(119,'Amit','1991-06-25','7500373939','7500373939','amitkumarverma380@gmail.com','Village saroorpur post Simbhaoli','245207','Bams','AFI190','2024-06-12 05:17:17',1);
/*!40000 ALTER TABLE `upgrade_medical_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upgrade_medical_form_coupon`
--

DROP TABLE IF EXISTS `upgrade_medical_form_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upgrade_medical_form_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upgrade_medical_form_coupon`
--

LOCK TABLES `upgrade_medical_form_coupon` WRITE;
/*!40000 ALTER TABLE `upgrade_medical_form_coupon` DISABLE KEYS */;
INSERT INTO `upgrade_medical_form_coupon` VALUES
(5,'MAN180','2024-05-30 17:04:11'),
(6,'AFI190','2024-05-30 18:03:15'),
(7,'SID10','2024-05-30 18:04:42'),
(8,'ABH20','2024-05-30 18:04:49'),
(9,'NEH30','2024-05-30 18:04:54'),
(10,'ASH40','2024-05-30 18:05:06'),
(11,'RAJ50','2024-05-30 18:05:23'),
(12,'SHI60','2024-05-30 18:05:38'),
(13,'SUR70','2024-05-30 18:05:45'),
(14,'NIK80','2024-05-30 18:05:51'),
(15,'ROH90','2024-05-30 18:05:59'),
(16,'ADA100','2024-05-30 18:06:05'),
(17,'SAM110','2024-05-30 18:06:13'),
(18,'AKS120','2024-05-30 18:06:18'),
(19,'ANJ130','2024-05-30 18:06:38'),
(20,'YAS150','2024-05-30 18:06:50'),
(21,'MAN140','2024-05-30 18:06:58'),
(22,'VAS160','2024-05-30 18:07:10'),
(23,'YAS170','2024-05-30 18:07:21'),
(24,'RAJ200','2024-05-31 14:54:59'),
(25,'ANF210','2024-06-01 07:53:24'),
(26,'PAL220','2024-06-01 08:17:19'),
(27,'ANI230','2024-06-01 08:17:28'),
(28,'UDA240','2024-06-01 08:17:35'),
(29,'SAC250','2024-06-01 08:17:44'),
(30,'VAN260','2024-06-01 09:05:17'),
(31,'RAJ270','2024-06-08 06:03:52');
/*!40000 ALTER TABLE `upgrade_medical_form_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upgrade_medical_practice_transaction`
--

DROP TABLE IF EXISTS `upgrade_medical_practice_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upgrade_medical_practice_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upgrade_medical_practice_transaction`
--

LOCK TABLES `upgrade_medical_practice_transaction` WRITE;
/*!40000 ALTER TABLE `upgrade_medical_practice_transaction` DISABLE KEYS */;
INSERT INTO `upgrade_medical_practice_transaction` VALUES
(3,'6395616857','','pay_OHUEKjr6Bn6nXj','2100','success','2024-06-01 11:52:26'),
(4,'9892518107','','pay_OHniC3cY9F32Yk','2100','success','2024-06-02 06:56:15'),
(5,'6284252372','','pay_OHueeZkzul6KFd','2100','success','2024-06-02 13:43:27'),
(10,'9873536762','','','2100','success','2024-06-05 10:07:21'),
(11,'9250046973','void@razorpay.com','pay_OJ4YpzfgmV7cbg','2100','success','2024-06-05 12:03:50'),
(12,'7881116326','void@razorpay.com','pay_OJMsKU4LC1syLx','2100','success','2024-06-06 05:58:43'),
(13,'9580770400','void@razorpay.com','pay_OJTlXa1XDLJ0UY','2100','success','2024-06-06 12:43:04'),
(15,'9835044272','void@razorpay.com','pay_OJUOcpH5VTHB5J','2100','success','2024-06-06 13:20:21'),
(16,'9882779899','void@razorpay.com','pay_OJlbaRbgdxZvwV','2100','success','2024-06-07 06:10:23'),
(17,'8504923742','void@razorpay.com','pay_OJmWMDLcjdxQdJ','2100','success','2024-06-07 07:07:40'),
(19,'9027762327','9520709637','pay_OJOTS6B4MV1z7c','2100','success','2024-06-06 13:04:30'),
(20,'8882776076','void@razorpay.com','pay_OJsDSfNv2rZ41L','2100','success','2024-06-07 12:38:26'),
(21,'9650969615','void@razorpay.com','pay_OJy9fWNWjaJKaq','2100','success','2024-06-07 18:27:13'),
(22,'9464756281','void@razorpay.com','pay_OK8axNmHbohEab','2100','success','2024-06-08 04:39:38'),
(23,'8273413610','void@razorpay.com','pay_OKGwTJOChtJrhW','2100','success','2024-06-08 12:49:33'),
(24,'9882779899','void@razorpay.com','pay_OKJz2HuSG0WU2o','2100','success','2024-06-08 15:48:12'),
(25,'9259547249','void@razorpay.com','pay_OKXr5gusiae5Cy','2100','success','2024-06-09 05:22:18'),
(26,'8171956196','9418056196','pay_OKgVHL32Lz6ruR','2100','success','2024-06-09 13:49:46'),
(27,'9340198684','void@razorpay.com','pay_OKhxzGUOwUQIOY','2100','success','2024-06-09 15:15:42'),
(28,'7838187936','void@razorpay.com','pay_OKkoGeMouVd5J8','2100','success','2024-06-09 18:05:49'),
(29,'8932959599','void@razorpay.com','pay_OL2diFpoxSMyL2','2100','success','2024-06-10 11:31:47'),
(30,'8077639658','void@razorpay.com','pay_OL6OKG5zBOMYU3','2100','success','2024-06-10 15:09:21'),
(31,'9466605830','void@razorpay.com','pay_OLKWwmu69FPP6v','2100','success','2024-06-11 04:59:08'),
(32,'9799015960','void@razorpay.com','pay_OLPmSVWiblpVg9','2100','success','2024-06-11 10:07:28'),
(33,'9897668751','void@razorpay.com','pay_OLUV0jfwX2IhYC','2100','success','2024-06-11 14:45:03'),
(34,'9053480005','sainivishal@oksbi','CICAgPDmr9HhQQ','2100','success','2024-06-12 05:14:35'),
(35,'7589089047','Sabugrt94@gmail.com','','2100','success','2024-06-12 05:15:36'),
(36,'63500 35887','Drjyotsanachoudhary29978@gmail.com','','2100','success','2024-06-12 05:16:49'),
(37,'7014046300','Drrajpalsinghdhaka@gmail.com','','2100','success','2024-06-12 05:17:14'),
(38,'9430945892','Dralokkumar79030@gmail.com','','2100','success','2024-06-12 05:17:36');
/*!40000 ALTER TABLE `upgrade_medical_practice_transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-12 16:35:27
