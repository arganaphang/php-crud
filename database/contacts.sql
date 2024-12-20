CREATE DATABASE IF NOT EXISTS `contacts`;
USE `contacts`;
CREATE TABLE `contacts`.`contacts` (
	`id` int not null auto_increment,
	`full_name` varchar(255) not null,
	`email` varchar(255) not null unique,
	`address` text,
	`created_at` timestamp not null default current_timestamp,
	primary key (id)
);