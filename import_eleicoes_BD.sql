drop table if EXISTS voto;
drop table if EXISTS eleitor;
drop table if EXISTS partido;

CREATE TABLE if NOT EXISTS `partido` (
    `cod_partido` INT NOT NULL,
    `designacao` VARCHAR(100) NOT NULL UNIQUE,
	`imagem` VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (`cod_partido`));
	
CREATE TABLE if NOT EXISTS `eleitor` (
    `nif` INT NOT NULL,
    `pass` VARCHAR(100) NOT NULL,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`data_nascimento` DATE NOT NULL,
	`estado_voto` TINYINT(1) NOT NULL,
	`data_voto` TIMESTAMP NOT NULL,	
	`data_time_out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`tipo_voto` TINYINT(1) NOT NULL, 
    PRIMARY KEY (`nif`));
	
CREATE TABLE if NOT EXISTS `voto` (
    `cod_voto` INT NOT NULL AUTO_INCREMENT,
	`cod_partido` INT NOT NULL,
	`data_voto` TIMESTAMP NOT NULL,
	`tipo_voto` TINYINT(1) NOT NULL,	
	FOREIGN KEY (`cod_partido`) REFERENCES `partido`(`cod_partido`),	
    PRIMARY KEY (`cod_voto`));	