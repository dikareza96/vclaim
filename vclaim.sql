/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 10.4.22-MariaDB : Database - vlcaim
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vlcaim` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vlcaim`;

/*Table structure for table `bpjs_ref_poli` */

DROP TABLE IF EXISTS `bpjs_ref_poli`;

CREATE TABLE `bpjs_ref_poli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdpoli` varchar(11) DEFAULT NULL,
  `nm_poli` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bpjs_ref_poli` */

insert  into `bpjs_ref_poli`(`id`,`kdpoli`,`nm_poli`) values (1,'MAT','MATA'),(2,'JIW','JIWA'),(3,'JAN','JANTUNG DAN PEMBULUH'),(4,'KDK','KEDOKTERAN KELAUTAN');

/*Table structure for table `bpjs_rencana_kontrol` */

DROP TABLE IF EXISTS `bpjs_rencana_kontrol`;

CREATE TABLE `bpjs_rencana_kontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat_kontrol` varchar(255) NOT NULL,
  `tgl_rencana_kontrol` date DEFAULT NULL,
  `no_sep` varchar(255) DEFAULT NULL,
  `no_kartu` varchar(255) DEFAULT NULL,
  `nm_pasien` varchar(255) DEFAULT NULL,
  `kd_poli` varchar(11) DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bpjs_rencana_kontrol` */

insert  into `bpjs_rencana_kontrol`(`id`,`no_surat_kontrol`,`tgl_rencana_kontrol`,`no_sep`,`no_kartu`,`nm_pasien`,`kd_poli`,`diagnosa`) values (1,'137771203940192','2022-03-09','1377781239v00','001703600199','LINA NUR KHOLIFAH','MAT','-');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
