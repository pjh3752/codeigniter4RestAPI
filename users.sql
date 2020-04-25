/* Create users table */
CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
	`nickname` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`phone` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	`gender` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


/* 
 * Initial administrator registration 
 * email: admin1111@admin.com
 * password: Admin1234!@
*/
INSERT INTO `users` (`name`, `nickname`, `password`, `phone`, `email`, `gender`) 
VALUES ('관리자', 'admin', '$2y$10$M1dEXNN5Se8MJTa5n5pGCOuuGMAdQjPCMeMXpEIBAB2zvnQFnlM0e', '01012345678', 'admin1111@admin.com', 'M');
