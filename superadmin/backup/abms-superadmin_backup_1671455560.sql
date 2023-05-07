# ABMS : MySQL database backup
#
# Generated: Monday 19. December 2022
# Hostname: localhost
# Database: abms-superadmin
# --------------------------------------------------------


#
# Delete any existing table `tbl_barangay`
#

DROP TABLE IF EXISTS `tbl_barangay`;


#
# Table structure of table `tbl_barangay`
#



CREATE TABLE `tbl_barangay` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_barangay VALUES("1","catbangen","barangay catbangen");



#
# Delete any existing table `tbl_users`
#

DROP TABLE IF EXISTS `tbl_users`;


#
# Table structure of table `tbl_users`
#



CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `SAusername` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `avatar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_users VALUES("1","agsirb-e","a79bf2dbccbd59eb58c7f9858f9000153b5b046c","administrator","19122022132844catba.png","2022-12-19 20:28:44");
INSERT INTO tbl_users VALUES("0","catbangen_admin","d033e22ae348aeb5660fc2140aec35850c4da997","administrator","1912202213445918092022152403download.jfif","2022-12-19 20:44:59");

