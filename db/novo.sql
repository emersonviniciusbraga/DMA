-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DMA
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DMA
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DMA` DEFAULT CHARACTER SET utf8 ;
USE `DMA` ;

-- -----------------------------------------------------
-- Table `DMA`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DMA`.`usuario` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DMA`.`sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DMA`.`sistema` (
  `codigo` BIGINT NOT NULL AUTO_INCREMENT,
  `nomedispositivo` VARCHAR(250) NOT NULL,
  `nomeaviario` VARCHAR(250) NOT NULL,
  `mac` VARCHAR(250) NOT NULL,
  `latitude` VARCHAR(200) NOT NULL,
  `longitude` VARCHAR(200) NOT NULL,
  `cidade` VARCHAR(250) NOT NULL,
  `usuario_id` BIGINT NOT NULL,
  INDEX `fk_sistema_usuario_idx` (`usuario_id` ASC) ,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `mac_UNIQUE` (`mac` ASC) ,
  CONSTRAINT `fk_sistema_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `DMA`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DMA`.`monitoramento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DMA`.`monitoramento` (
  `id_monitoramento` BIGINT NOT NULL AUTO_INCREMENT,
  `end_mac` VARCHAR(250) NOT NULL,
  `amonia` VARCHAR(10) NOT NULL,
  `temperatura` VARCHAR(10) NOT NULL,
  `humidade` VARCHAR(10) NOT NULL,
  `data_hora` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id_monitoramento`),
  INDEX `fk_monitoramento_sistema2_idx` (`end_mac` ASC) ,
  CONSTRAINT `fk_monitoramento_sistema2`
    FOREIGN KEY (`end_mac`)
    REFERENCES `DMA`.`sistema` (`mac`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
