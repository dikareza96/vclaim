/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 10.4.22-MariaDB : Database - vlcaim2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vlcaim2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vlcaim2`;

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
  `tgl_input` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bpjs_rencana_kontrol` */

insert  into `bpjs_rencana_kontrol`(`id`,`no_surat_kontrol`,`tgl_rencana_kontrol`,`no_sep`,`no_kartu`,`nm_pasien`,`kd_poli`,`diagnosa`,`tgl_input`) values (1,'137R0030222K001666','2022-03-09','1317R0030222V004021','0001703600199','LINA NUR KHOLIFAH','MAT','-','2022-02-16'),(2,'1317R0030122K00067','2022-01-27','1317R0030122V004805','0002484837764','SAUDAH','JIW','Z09.8 - Follow-up examination after other treatment for othe','2022-01-27'),(3,'1317R0030122K000679','2022-01-27','1317R0031221V004914','0001101791913','SUMANTO','JIW','-','2022-01-27'),(4,'1317R0030222K001266','2022-02-15','1317R0030122V003126','0000673205602','MOH. MEYREZAL BAIHAKI','JIW','-','2022-02-15'),(5,'317R0030222K001274','2022-02-15','1317R0030122V002993','0001845917008','SUYONO','JIW','-','2022-02-15'),(6,'1317R0030222K001267','2022-02-15','1317R0030122V002606','0002685305485','EVAN YOEONO PUTRA','MAT','-','2022-02-15'),(7,'1317R0030222K001268','2022-02-15','1317R0030222V002027','0000108284354','HADI WINARYO','MAT','-','2022-02-15'),(8,'1317R0030222K001270','2022-02-15','1317R0030122V000508','	\r\n0000677007887','	\r\nFIFIN TRI KURNIAWATI','JIW','-','2022-02-15'),(9,'1317R0030222K001271','2022-02-15','1317R0030222V002142','0001628462373','DHESINTA ADELIA NA-ZHIIRA KUS','MAT','-','2022-02-15'),(10,'1317R0030222K001272','2022-02-15','1317R0030122V003004','0002622678344','NUR ACHMAD DODIK','JIW','-','2022-02-15'),(13,'1317R0030222K002751','2022-03-09','1317R0030122V005020','0001312669361','SUYANTO','MAT','-','2022-02-21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
