-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: root_xxi_2
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB-1

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
-- Table structure for table `tbl_ciri_gaya`
--

DROP TABLE IF EXISTS `tbl_ciri_gaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ciri_gaya` (
  `id_ciri` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ciri`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ciri_gaya`
--

LOCK TABLES `tbl_ciri_gaya` WRITE;
/*!40000 ALTER TABLE `tbl_ciri_gaya` DISABLE KEYS */;
INSERT INTO `tbl_ciri_gaya` VALUES (31,'1. Mengingat'),(32,'2. Menyukai'),(33,'3. Memperhatikan'),(34,'4. Menghafal'),(35,'5. Berbicara'),(36,'6. Tergangu'),(37,'7. Tertarik'),(38,'8. Menganalisa'),(39,'9. Sulit'),(40,'10. Suka');
/*!40000 ALTER TABLE `tbl_ciri_gaya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gaya_belajar`
--

DROP TABLE IF EXISTS `tbl_gaya_belajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gaya_belajar` (
  `id_gaya` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `metode_cocok` text DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `saran` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_gaya`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gaya_belajar`
--

LOCK TABLES `tbl_gaya_belajar` WRITE;
/*!40000 ALTER TABLE `tbl_gaya_belajar` DISABLE KEYS */;
INSERT INTO `tbl_gaya_belajar` VALUES (3,'G03',NULL,'Gaya Belajar Kinestetik','-','Model pembelajar kinestetik adalah pembelajar yang menyerap informasi melalui berbagai gerakan fisik. Ciri-ciri pembelajar kinestetik, di antaranya adalah:\r\n\r\n1. Selalu berorientasi fisik dan banyak bergerak \r\n2. Berbicara dengan perlahan \r\n3. Menanggapi perhatian fisik \r\n4. Suka menggunakan berbagai peralatan dan media \r\n5. Menyentuh orang untuk mendapatkan perhatian mereka \r\n6. Berdiri dekat ketika berbicara dengan orang \r\n7. Mempunyai perkembangan awal otot-otot yang besar \r\n8. Belajar melalui praktek\r\n9. Menghafal dengan cara berjalan dan melihat \r\n10. Menggunakan jari sebagai penunjuk ketika membaca \r\n11. Banyak menggunakan isyarat tubuh \r\n12. Tidak dapat duduk diam untuk waktu lama \r\n13. Menggunakan kata-kata yang menandung akso \r\n14. Menyukai buku-buku yang berorientasi pada cerita \r\n15. Kemungkinan tulisannya jelek \r\n16. Ingin melakukan segala sesuatu \r\n17. Menyukai permainan dan olah raga.'),(4,'G02',NULL,'Gaya Belajar Auditorial','-','Model pembelajar auditory adalah model di mana seseorang lebih cepat menyerap informasi melalui apa yang ia dengarkan. Penjelasan tertulis akan lebih mudah ditangkap oleh para pembelajar auditory ini. Ciri-ciri orang-orang auditorial, di antaranya adalah:\r\n\r\n1. Lebih cepat menyerap dengan mendengarkan \r\n2. Menggerakkan bibir mereka dan mengucapkan tulisan di buku ketika membaca \r\n3. Senang membaca dengan keras dan mendengarkan \r\n4. Dapat mengulangi kembali dan menirukan nada, birama, dan warna suara. \r\n5. Bagus dalam berbicara dan bercerita \r\n6. Berbicara dengan irama yang terpola \r\n7. Belajar dengan mendengarkan dan mengingat apa yang didiskusikan daripada yang dilihat \r\n8. Suka berbicara, suka berdiskusi, dan menjelaskan sesuatu panjang lebar \r\n9. Lebih pandai mengeja dengan keras daripada menuliskannya \r\n10. Suka musik dan bernyanyi \r\n11. Tidak bisa diam dalam waktu lama \r\n12. Suka mengerjakan tugas kelompok'),(5,'G01','ini metode gaya belajar','Gaya Belajar Visual','- ini saran','Modalitas ini menyerap citra terkait dengan visual, warna, gambar, peta, diagram. Model pembelajar visual menyerap informasi dan belajar dari apa yang dilihat oleh mata. Beberapa ciri dari pembelajar visual di antaranya adalah:\r\n\r\n1. Mengingat apa yang dilihat, daripada yang didengar.\r\n2. Suka mencoret-coret sesuatu, yang terkadang tanpa ada artinya saat di dalam kelas \r\n3. Pembaca cepat dan tekun \r\n4. Lebih suka membaca daripada dibacakan \r\n5. Rapi dan teratur \r\n6. Mementingkan penampilan, dalam hal pakaian ataupun penampilan keseluruhan \r\n7. Teliti terhadap detail \r\n8. Pengeja yang baik \r\n9. Lebih memahami gambar dan bagan daripada instruksi tertulis ');
/*!40000 ALTER TABLE `tbl_gaya_belajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hak_akses`
--

DROP TABLE IF EXISTS `tbl_hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hak_akses`
--

LOCK TABLES `tbl_hak_akses` WRITE;
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` VALUES (15,1,1),(19,1,3),(21,2,1),(24,1,9),(28,2,3),(29,2,2),(30,1,2),(31,1,12),(32,2,12),(33,1,10),(34,2,10),(35,2,13),(36,1,13),(37,1,14),(38,2,14),(39,1,15),(41,1,16),(43,2,15);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hasil`
--

DROP TABLE IF EXISTS `tbl_hasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) DEFAULT NULL,
  `id_gaya` text DEFAULT NULL,
  `persent` text DEFAULT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hasil`
--

LOCK TABLES `tbl_hasil` WRITE;
/*!40000 ALTER TABLE `tbl_hasil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_hasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kelas`
--

DROP TABLE IF EXISTS `tbl_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kelas`
--

LOCK TABLES `tbl_kelas` WRITE;
/*!40000 ALTER TABLE `tbl_kelas` DISABLE KEYS */;
INSERT INTO `tbl_kelas` VALUES (1,'KELAS 9');
/*!40000 ALTER TABLE `tbl_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `urut` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` VALUES (1,'Dashboard','admin/','fa fa-dashboard',0,1,'y'),(2,'KELOLA ADMIN','admin/user','fa fa-user-o',0,6,'y'),(3,'LEVEL PENGGUNA','admin/userlevel','fa fa-users',0,8,'y'),(10,'KATEGORI GAYA BELAJAR','admin/gayabelajar','fa fa-book',0,3,'y'),(12,'KELOLA MENU','admin/kelolamenu','fa fa-server',0,7,'y'),(13,'CIRI2 GAYA BELAJAR','admin/cirigaya','fa fa-book',0,3,'y'),(14,'KELAS','admin/kelas','fa fa-suitcase',0,5,'y'),(15,'PESERTA','admin/peserta','fa fa-address-card-o',0,4,'y'),(16,'HASIL TEST','admin/hasil','fa fa-edit',0,2,'y');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_peserta`
--

DROP TABLE IF EXISTS `tbl_peserta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_peserta`
--

LOCK TABLES `tbl_peserta` WRITE;
/*!40000 ALTER TABLE `tbl_peserta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_peserta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_setting`
--

DROP TABLE IF EXISTS `tbl_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_setting`
--

LOCK TABLES `tbl_setting` WRITE;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` VALUES (1,'Tampil Menu','ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_soal_ciri`
--

DROP TABLE IF EXISTS `tbl_soal_ciri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_soal_ciri` (
  `id_ciri_soal` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciri` int(11) DEFAULT NULL,
  `id_gaya` int(11) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `soal` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ciri_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_soal_ciri`
--

LOCK TABLES `tbl_soal_ciri` WRITE;
/*!40000 ALTER TABLE `tbl_soal_ciri` DISABLE KEYS */;
INSERT INTO `tbl_soal_ciri` VALUES (4,1,5,'A1-VISUAL','INI VISUAL',NULL),(5,1,4,'A2-AUD','INI AUDITORIAL',NULL),(6,1,3,'A3-KIN','ini kinestik',NULL),(70,31,5,'C01','Mudah mengingat yang dilihat',NULL),(71,31,4,'C02','Mudah mengingat hal yang dilakukan',NULL),(72,31,3,'C03','Mudah mengingat hal yang didengar',NULL),(73,32,5,'C04','Sangat menyukai lukisan',NULL),(74,32,4,'C05',' Sangat menyukai tarian',NULL),(75,32,3,'C06','Sangat menyukai musik',NULL),(76,33,5,'C07','Cenderung memperhatikan orang pada wajah dan pakaian yang di kenakan',NULL),(77,33,4,'C08','Cenderung memperhatikan orang pada perilaku dan gerak geriknya',NULL),(78,33,3,'C09','Cenderung memperhatikan orang pada pembiacaraan',NULL),(79,34,5,'C10','Senang menghafal sesuatu dengan mengulangi kata-kata dengan suara keras',NULL),(80,34,4,'C11','Senang menghafal sesuatu dengan menulis',NULL),(81,34,3,'C12','Senang menghafal sesuatu dengan berjalan',NULL),(82,35,5,'C13','Dalam berbicara menjelaskan, cenderung menggerakan tangan',NULL),(83,35,4,'C14','Dalam berbicara menjelaskan, cenderung menyampaikan secara lisan',NULL),(84,35,3,'C15','Dalam berbicara menjelaskan, cenderung membuat coretan di kertas',NULL),(85,36,5,'C16','Mudah tergangu dengan benda yang bergerak',NULL),(86,36,4,'C17','Mudah tergangu dengan barang-barang berantakan disekitarnya',NULL),(87,36,3,'C18','Mudah tergangu suara yang berisik',NULL),(88,37,5,'C19','Sangat tertarik pada gerakan tubuh',NULL),(89,37,4,'C20','Sangat tertarik pada suara',NULL),(90,37,3,'C21','Sangat tertarik pada warna',NULL),(91,38,5,'C22','Menganalisa sesuatu dengan membayangkan sesuatu diotak',NULL),(92,38,4,'C23','Menganalisa sesuatu dengan berulang-ulang',NULL),(93,38,3,'C24','Menganalisa sesuatu dengan membuat coretan',NULL),(94,39,5,'C25','Sulit konsentrasi ketika ada keributan',NULL),(95,39,4,'C26','Sulit bisa berlama belajar jika bahan pelajaran penuh tulisan atau tidak rapih',NULL),(96,39,3,'C27','Sulit untuk bisa duduk diam dan tenang',NULL),(97,40,5,'C28','Suka diajari oleh guru dengan cara menggambarkan sesuatu objek di papan tulis',NULL),(98,40,4,'C29','Suka diajari oleh guru dengan cara memperaktikkan dan menyentuh objek yang dibicarakan',NULL),(99,40,3,'C30','Suka di ajari oleh guru dengan cara menjelaskan dengan suara indah',NULL);
/*!40000 ALTER TABLE `tbl_soal_ciri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'Admin','admin@gmail.com','$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq','atomix_user31.png',1,'y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_level`
--

DROP TABLE IF EXISTS `tbl_user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_level`
--

LOCK TABLES `tbl_user_level` WRITE;
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` VALUES (1,'Super Admin'),(2,'Admin');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-13 21:03:07
