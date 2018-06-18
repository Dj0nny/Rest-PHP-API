CREATE DATABASE IF NOT EXISTS `RESTtrains`;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `trains` (
    `id_train` INTEGER,
    `type` VARCHAR(255),
    PRIMARY KEY(`id_train`, `type`),
    `departure_city` VARCHAR(255) NOT NULL,
    `arrival_city` VARCHAR(255) NOT NULL
);

SET FOREIGN_KEY_CHECKS = 1;