


CREATE TABLE `as_expense_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exp_code` char(40) DEFAULT NULL,
  `exp_name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `as_expense_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expense_id` int DEFAULT NULL,
  `description` text,
  `qty` int DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);



CREATE TABLE `as_expenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exp_code` char(40) DEFAULT NULL,
  `exp_category_id` int DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
);




DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191)  NOT NULL,
  `guard_name` varchar(191)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 

(1,'Admin','web','2022-07-22 12:55:22','2023-10-14 04:48:54');


DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191)  NOT NULL,
  `guard_name` varchar(191)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 

(1,'role-list','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),

(2,'role-create','web','2023-10-14 05:24:39','2023-10-18 12:00:10'),

(3,'role-edit','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),

(4,'role-delete','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),

(15,'create-permission','web','2022-06-30 10:23:56','2022-06-30 10:23:56'),

(16,'delete-permission','web','2022-06-30 10:32:56','2022-06-30 10:32:56'),

(17,'view-permission','web','2022-06-30 10:33:07','2022-06-30 10:33:07'),

(27,'edit-permission','web','2023-10-14 04:25:43','2023-10-14 04:25:43'),

(44,'expense-category-list','web','2023-10-23 20:13:39','2023-10-28 20:20:45'),

(45,'expense-category-create','web','2023-10-23 20:13:48','2023-10-28 20:13:46'),

(46,'expense-category-edit','web','2023-10-23 20:13:55','2023-10-28 20:20:10'),

(47,'expense-category-delete','web','2023-10-23 20:14:03','2023-10-28 20:19:48'),

(64,'create-user','web','2024-10-10 18:56:13','2024-10-10 18:56:13'),

(65,'Edit-user','web','2024-10-10 18:56:20','2024-10-10 18:56:20'),

(66,'delete-user','web','2024-10-10 18:56:31','2024-10-10 18:56:31'),

(67,'view-user','web','2024-10-10 18:56:35','2024-10-10 18:56:35'),

(68,'list-user','web','2024-10-10 18:56:42','2024-10-10 18:56:42'),

(69,'expense-list','web','2024-10-10 18:56:57','2024-10-10 19:00:19'),

(70,'expense-create','web','2024-10-10 18:57:02','2024-10-10 18:59:19'),

(71,'expense-edit','web','2024-10-10 18:57:06','2024-10-10 18:59:39'),

(72,'expense-delete','web','2024-10-10 18:57:09','2024-10-10 18:59:57'),

(73,'expense-view','web','2024-10-10 18:57:19','2024-10-10 19:11:44');







/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191)  NOT NULL,
  `token` varchar(191)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
);

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

/*Data for the table `permissions` */



/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191)  NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
);



DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191)  NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`)
  );

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191)  NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`)
 );

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 

(1,'App\\Models\\User',1),

(1,'App\\Models\\User',8),

(1,'App\\Models\\User',9),

(1,'App\\Models\\User',10),

(1,'App\\Models\\User',11),

(14,'App\\Models\\User',27),

(11,'App\\Models\\User',28),

(13,'App\\Models\\User',29),

(15,'App\\Models\\User',30),

(14,'App\\Models\\User',31),

(1,'App\\Models\\User',1871);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`)
 ) ;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 

(1,1),

(2,1),

(3,1),

(4,1),

(15,1),

(16,1),

(17,1),

(27,1),

(44,1),

(45,1),

(46,1),

(47,1),

(64,1),

(65,1),

(66,1),

(67,1),

(68,1),

(69,1),

(70,1),

(71,1),

(72,1),

(73,1),

(1,11),

(15,11),

(16,11),

(17,11),

(17,12),

(17,13),

(17,14),

(1,15),

(15,15),

(16,15),

(17,15),

(33,15),

(35,15),

(44,15),

(48,15),

(52,15),

(56,15),

(60,15),

(62,15),

(63,15);

/*Table structure for table `roles` */









/*Table structure for table `sequence` */

DROP TABLE IF EXISTS `sequence`;

CREATE TABLE `sequence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `executed_record` int NOT NULL,
  `tbl_year` varchar(200) DEFAULT NULL,
  KEY `id` (`id`)
);

/*Data for the table `sequence` */

insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values 

(3,'as_projects',1,NULL),

(5,'as_unit_categories',3,NULL),

(6,'as_units',2,NULL),

(1,'as_blocks',2,NULL),

(2,'as_receipt_types',3,NULL),

(9,'as_expense_categories',1,NULL),

(10,'as_expenses',1,'24');

/*Table structure for table `society` */

DROP TABLE IF EXISTS `society`;

CREATE TABLE `society` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Society_code` varchar(240) DEFAULT NULL,
  `society_title` varchar(240) DEFAULT NULL,
  `society_image` varchar(240) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*Data for the table `society` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `soceity_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `block_id` int DEFAULT NULL,
  `name` varchar(191)  NOT NULL,
  `email` varchar(191)  DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(45)  DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191)  DEFAULT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_terminal_user` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);

/*Data for the table `users` */

insert  into `users`(`id`,`soceity_id`,`project_id`,`block_id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values 

(1,NULL,NULL,NULL,'Admin','admin@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm','jLQGtcP4T5nl0X11H8ioXsBDEMtj2Gh7O9tL6ciF3qmn0AKF8wEuIoGZGCQE','2022-08-12 07:44:24','2022-06-27 13:22:24','2022-06-27 13:22:24',NULL,NULL),

(6,NULL,NULL,NULL,'Research','research@gmail.com',NULL,NULL,NULL,'$2y$10$vD4LQPjDAbuvHdp8HUQDo.np.DRnlD0NJrkqjCI5E7ZI1JSsJLPB2','lT0daugFKTsWWFOl4HWRL0mBFV4qXVfWBYB97zMHV8WdjkFGNER9NeZD3S52','2022-08-11 12:17:25','2022-06-30 10:37:40','2023-10-14 04:26:38','2023-10-14 04:26:38',NULL),

(7,NULL,NULL,NULL,'Research User','researchuser@gmail.com',NULL,NULL,NULL,'$2y$10$idbaGTcORfJ42QBb1NqGfePOPQ385sZf8fonf1v2aP7GN1xRifyx2',NULL,NULL,'2022-07-07 17:05:01','2023-10-14 04:26:41','2023-10-14 04:26:41',NULL),

(8,NULL,NULL,NULL,'V1151',NULL,NULL,NULL,NULL,NULL,NULL,'2023-01-12 07:37:15',NULL,'2023-10-14 04:26:43','2023-10-14 04:26:43',1),

(9,NULL,NULL,NULL,'Ghulam Rasool','imgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-28 12:41:53',NULL,'2023-10-14 04:26:45','2023-10-14 04:26:45',0),

(13,NULL,NULL,NULL,'atlantic','atlantic@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-10-12 06:49:06',NULL,'2023-01-17 13:54:55','2023-01-17 13:54:55',0),

(14,NULL,NULL,NULL,'Ghulam Rasool','aimgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-26 11:30:12',NULL,'2023-10-14 04:26:57','2023-10-14 04:26:57',0),

(15,NULL,NULL,NULL,'pacific','pacific@gmail.com',NULL,'1234456677',NULL,NULL,NULL,'2022-09-06 06:48:17',NULL,'2023-01-17 13:54:57','2023-01-17 13:54:57',0),

(16,NULL,NULL,NULL,'sdsdsd','sds@gmail.com',NULL,'2323232323',NULL,NULL,NULL,'2022-09-06 06:51:44',NULL,'2023-01-17 13:55:05','2023-01-17 13:55:05',0),

(17,NULL,NULL,NULL,'hell0','hello@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:01:08',NULL,'2023-01-17 13:55:12','2023-01-17 13:55:12',0),

(18,NULL,NULL,NULL,'wewe','sdsds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:06:26',NULL,'2023-01-17 13:55:20','2023-01-17 13:55:20',0),

(19,NULL,NULL,NULL,'1212','resds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:07:12',NULL,'2023-01-17 13:55:16','2023-01-17 13:55:16',0),

(20,NULL,NULL,NULL,'sdsd','wewew@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:44:31',NULL,'2023-01-17 13:55:28','2023-01-17 13:55:28',0),

(21,NULL,NULL,NULL,'erer','fggf@test.cp',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:46:12',NULL,'2023-01-17 13:55:23','2023-01-17 13:55:23',0),

(22,NULL,NULL,NULL,'sdsds','sasa@test.co',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:47:20',NULL,'2023-01-17 13:54:49','2023-01-17 13:54:49',0),

(23,NULL,NULL,NULL,'ocean','ocean@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:56:03',NULL,'2023-10-14 04:26:53','2023-10-14 04:26:53',0),

(24,NULL,NULL,NULL,'Toheed','toheed@test.com',NULL,'3325272675',NULL,NULL,NULL,'2022-09-30 05:50:55',NULL,'2023-10-14 04:26:48','2023-10-14 04:26:48',0),

(25,NULL,NULL,NULL,'HOD','hod@gmail.com',NULL,NULL,NULL,'$2y$10$a5yEROSrZgp9NoG3EvkkyeqsAcVnKYXEg349/Lg.llF/oOhoiFNTi',NULL,NULL,'2023-01-17 12:17:24','2023-10-14 04:26:50','2023-10-14 04:26:50',NULL),

(26,NULL,NULL,NULL,'DBA','dba@gmail.com',NULL,NULL,NULL,'$2y$10$p05Hlyg6SKz1IEQ.T/TD9ujSZK3f7au.eO8FXHj5JsP5MmwoV43nq',NULL,NULL,'2023-01-17 12:17:37','2023-10-14 04:26:55','2023-10-14 04:26:55',NULL),

(27,NULL,NULL,NULL,'Muhammad Azeem','azeembhai@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm',NULL,NULL,'2023-05-30 19:31:18','2023-05-30 19:31:18',NULL,NULL),

(28,NULL,NULL,NULL,'Shahrukh','shahrukh@gmail.com',NULL,NULL,NULL,'$2y$10$q2nnhaFoq3ESxmage9AlsevAzD5OEhXrYoG0JFi8AyqR38hbXof0i',NULL,NULL,'2023-10-14 04:27:41','2023-10-14 04:27:41',NULL,NULL),

(29,NULL,NULL,NULL,'dsdsd','admiwn@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm',NULL,NULL,'2023-10-17 18:13:26','2023-10-18 05:45:02',NULL,NULL),

(30,NULL,NULL,NULL,'Muhammad yasir','yasirshahpk8@gmail.com',NULL,NULL,NULL,'$2y$10$iXOd.pcDIYuvVxBG8R0VvuHsLVLgaJOIaPhxBgaYoVtJLLYWpD11K',NULL,NULL,'2023-10-22 14:00:36','2023-10-22 14:00:36',NULL,NULL),

(31,NULL,NULL,NULL,'Azeem','az@gmail.com',NULL,NULL,NULL,'$2y$10$0x0PNyjGrp3YQ2IHTHec0OzMCfS4ZtjHHCXK/g.aQI/ElRPFRzD3u',NULL,NULL,'2023-10-24 17:21:13','2023-10-24 17:21:13',NULL,NULL);


DELIMITER $$

CREATE TRIGGER `as_expenses` 
BEFORE INSERT ON `as_expenses` 
FOR EACH ROW 
BEGIN
    DECLARE tempVariable INT;

    -- Update the executed_record for the given year
    UPDATE `sequence` 
    SET `executed_record` = executed_record + 1 
    WHERE TABLE_NAME = 'as_expenses' 
      AND tbl_year = NEW.year;

    -- Check if the update affected any rows
    IF (ROW_COUNT() < 1) THEN 
        INSERT INTO `sequence` (TABLE_NAME, tbl_year, executed_record) 
        VALUES ('as_expenses', NEW.year, 1);
        SET tempVariable = 1;  -- Initialize tempVariable to 1
    ELSE
        SET tempVariable = (SELECT executed_record FROM `sequence` 
                            WHERE TABLE_NAME = 'as_expenses' 
                              AND tbl_year = NEW.year);
    END IF;

    -- Set the new exp_code based on tempVariable
    SET NEW.exp_code = CONCAT(NEW.year, '/EX-', LPAD(tempVariable, 4, '0'));
END $$

DELIMITER ;


