/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - eprinting
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eprinting` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `eprinting`;

/*Table structure for table `parameter` */

DROP TABLE IF EXISTS `parameter`;

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_cetak` varchar(100) NOT NULL,
  `jenis_kertas` varchar(100) NOT NULL,
  `bw_color` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `parameter` */

insert  into `parameter`(`id_parameter`,`jenis_cetak`,`jenis_kertas`,`bw_color`,`harga`,`creator`,`created`) values 
(1,'dokumen','A4','bw',500,'system','2022-08-02 10:47:35'),
(2,'dokumen','A4','color',1000,'system','2022-08-02 10:47:35'),
(3,'dokumen','letter','bw',600,'system','2022-08-02 10:47:35'),
(4,'dokumen','letter','color',1200,'system','2022-08-02 10:47:35'),
(5,'dokumen','hvs','bw',450,'system','2022-08-02 10:47:35'),
(6,'dokumen','hvs','color',950,'system','2022-08-02 10:47:35'),
(7,'poster','A5','bw',7000,'system','2022-08-02 10:47:35'),
(8,'poster','A5','color',7000,'system','2022-08-02 10:47:35'),
(9,'poster','A4','bw',9000,'system','2022-08-02 10:47:35'),
(10,'poster','A4','color',9000,'system','2022-08-02 10:47:35'),
(11,'poster','A3','bw',11000,'system','2022-08-02 10:47:35'),
(12,'poster','A3','color',11000,'system','2022-08-02 10:47:35'),
(13,'banner','1x1','bw',8000,'system','2022-08-02 10:47:35'),
(14,'banner','1x1','color',8000,'system','2022-08-02 10:47:35');

/*Table structure for table `trx_print` */

DROP TABLE IF EXISTS `trx_print`;

CREATE TABLE `trx_print` (
  `id_trx` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `id_parameter` int(10) NOT NULL,
  `jilid` int(10) DEFAULT NULL,
  `jumlah_halaman` int(10) DEFAULT NULL,
  `panjang` int(10) DEFAULT NULL,
  `lebar` int(10) DEFAULT NULL,
  `jumlah` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `kekurangan_harga` int(10) NOT NULL,
  `date_order` datetime NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `size_file` varchar(50) NOT NULL,
  `lok_file` varchar(100) NOT NULL,
  `nama_file_bb` varchar(200) DEFAULT NULL,
  `size_file_bb` varchar(50) DEFAULT NULL,
  `lok_file_bb` varchar(100) DEFAULT NULL,
  `payment` varchar(50) NOT NULL,
  `stat_payment` varchar(200) NOT NULL,
  `time_payment` datetime NOT NULL,
  `stat_print` int(5) DEFAULT NULL,
  `time_print` datetime DEFAULT NULL,
  `stat_cek` int(5) DEFAULT NULL,
  `time_cek` datetime DEFAULT NULL,
  `stat_done` int(5) DEFAULT NULL,
  `time_done` datetime DEFAULT NULL,
  PRIMARY KEY (`id_trx`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_print` */

insert  into `trx_print`(`id_trx`,`kode`,`id_parameter`,`jilid`,`jumlah_halaman`,`panjang`,`lebar`,`jumlah`,`total_harga`,`kekurangan_harga`,`date_order`,`nama_file`,`size_file`,`lok_file`,`nama_file_bb`,`size_file_bb`,`lok_file_bb`,`payment`,`stat_payment`,`time_payment`,`stat_print`,`time_print`,`stat_cek`,`time_cek`,`stat_done`,`time_done`) values 
(1,'220803001',6,1,2,NULL,NULL,10,68000,0,'2022-08-03 10:12:00','Laporan Rentabilitas Tahun 2022 Semester 2 revisi.pdf','61057','.uploads/220803001-Laporan Rentabilitas Tahun 2022 Semester 2 revisi.pdf','IMG_20220801_095429.jpg','114794','.uploads/220803001bb','ovo','done','2022-08-03 03:27:08',0,'2022-08-05 10:31:45',0,'2022-08-06 06:30:12',1,'2022-08-06 06:30:12'),
(3,'220805001',9,NULL,0,NULL,NULL,2,18000,0,'2022-08-05 13:15:37','WhatsApp Image 2022-04-28 at 05.16.29.jpeg','46671','.uploads/220805001-WhatsApp Image 2022-04-28 at 05.16.29.jpeg','IMG_20220801_095429.jpg','114794','.uploads/220805001bb','ovo','done','2022-08-05 01:19:39',0,'2022-08-05 10:32:02',1,NULL,NULL,NULL),
(4,'220805002',14,NULL,0,10,2,3,480000,0,'2022-08-05 21:32:42','1630501709033.jpg','90339','.uploads/220805002-1630501709033.jpg','Bukti Pembayaran Tahap 1.jpeg','42022','.uploads/220805002bb','ovo','done','2022-08-05 09:36:33',1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `user_pengguna` */

DROP TABLE IF EXISTS `user_pengguna`;

CREATE TABLE `user_pengguna` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_pengguna` */

insert  into `user_pengguna`(`id_user`,`username`,`password`,`level`,`creator`,`created`) values 
(1,'admin','$2y$10$GvWaF4h1BsAPgXf4AhCpP.p4BfSapMhS7NeDlk/Fn6pQxvQd7VOxa','admin','system','2022-08-04 10:17:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
