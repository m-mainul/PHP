/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 10.1.24-MariaDB : Database - alquran
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alquran` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `alquran`;

/*Table structure for table `notes_comments_serial_no` */

DROP TABLE IF EXISTS `notes_comments_serial_no`;

CREATE TABLE `notes_comments_serial_no` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sura_a` int(11) DEFAULT NULL,
  `ayat_a` int(11) DEFAULT NULL,
  `sura_b` int(11) DEFAULT NULL,
  `ayat_b` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `notes_comments_serial_no` */

insert  into `notes_comments_serial_no`(`id`,`sura_a`,`ayat_a`,`sura_b`,`ayat_b`,`serial_no`,`notes`,`comments`,`created_at`,`updated_at`) values (1,1,1,1,2,121512,'a\r\n','hello b\r\n','2018-01-18 07:52:50','0000-00-00 00:00:00'),(2,1,3,9,11,54854,'klsnvlsnl\r\n','fnfrnrng\r\n','2018-01-18 07:53:26','0000-00-00 00:00:00'),(3,13,5,6,6,48787,'c\r\n','d\r\n','2018-01-18 07:54:00','0000-00-00 00:00:00'),(4,1,1,1,4,78798,'jekk','ioiuy','2018-01-18 08:38:47','0000-00-00 00:00:00');

/*Table structure for table `sura_aya_no` */

DROP TABLE IF EXISTS `sura_aya_no`;

CREATE TABLE `sura_aya_no` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sura_no` int(11) DEFAULT NULL,
  `aya_no` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `sura_aya_no` */

insert  into `sura_aya_no`(`id`,`sura_no`,`aya_no`,`created_at`,`updated_at`) values (1,1,7,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(2,2,286,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(3,3,200,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(4,4,176,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(5,5,120,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(6,6,165,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(7,7,206,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(8,8,75,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(9,9,129,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(10,10,109,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(11,11,100,'2018-01-18 07:50:58','2018-01-18 07:50:58'),(12,12,150,'2018-01-18 07:51:26','0000-00-00 00:00:00');

/*Table structure for table `text_ayat` */

DROP TABLE IF EXISTS `text_ayat`;

CREATE TABLE `text_ayat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sura_no` int(11) DEFAULT NULL,
  `ayat_no` int(11) DEFAULT NULL,
  `text` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `text_ayat` */

insert  into `text_ayat`(`id`,`sura_no`,`ayat_no`,`text`,`created_at`,`updated_at`) values (1,1,1,'بِسْمِ اللّهِ الرَّحْمـَنِ الرَّحِيمِ\r\n',NULL,NULL),(2,1,2,'الْحَمْدُ للّهِ رَبِّ الْعَالَمِينَ\r\n',NULL,NULL),(3,1,3,'الرَّحْمـنِ الرَّحِيمِ\r\n',NULL,NULL),(4,2,1,'الم\r\n',NULL,NULL),(5,2,2,'ذَلِكَ الْكِتَابُ لاَ رَيْبَ فِيهِ هُدًى لِّلْمُتَّقِينَ\r\n',NULL,NULL),(6,6,1,'وَكَذَلِكَ جَعَلْنَا فِي كُلِّ قَرْيَةٍ أَكَابِرَ مُجَرِمِيهَا لِيَمْكُرُواْ فِيهَا وَمَا يَمْكُرُونَ إِلاَّ بِأَنفُسِهِمْ وَمَا يَشْعُرُونَ \r\n',NULL,NULL),(7,1,4,'مَـالِكِ يَوْمِ الدِّينِ\r\n',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
