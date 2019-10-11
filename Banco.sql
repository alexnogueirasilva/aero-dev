-- MySQL Script generated by MySQL Workbench
-- Fri Feb 23 09:53:18 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema devmedia
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `devmedia` ;

-- -----------------------------------------------------
-- Schema devmedia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `devmedia` DEFAULT CHARACTER SET utf8 ;
USE `devmedia` ;

-- -----------------------------------------------------
-- Table `devmedia`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `devmedia`.`empresa` ;

CREATE TABLE IF NOT EXISTS `devmedia`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT,
  `razaosocial` VARCHAR(80) NOT NULL,
  `nomefantasia` VARCHAR(80) NULL,
  `CNPJ` VARCHAR(18) NULL,
  PRIMARY KEY (`idempresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `devmedia`.`vaga`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `devmedia`.`vaga` ;

CREATE TABLE IF NOT EXISTS `devmedia`.`vaga` (
  `idvaga` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` TEXT NULL,
  `FK_idempresa` INT NOT NULL,
  PRIMARY KEY (`idvaga`),
  INDEX `fk_vaga_empresa1_idx` (`FK_idempresa` ASC),
  CONSTRAINT `fk_vaga_empresa1`
    FOREIGN KEY (`FK_idempresa`)
    REFERENCES `devmedia`.`empresa` (`idempresa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `devmedia`.`tecnologia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `devmedia`.`tecnologia` ;

CREATE TABLE IF NOT EXISTS `devmedia`.`tecnologia` (
  `idtecnologia` INT NOT NULL AUTO_INCREMENT,
  `tecnologia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtecnologia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `devmedia`.`tecnologiasporvaga`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `devmedia`.`tecnologiasporvaga` ;

CREATE TABLE IF NOT EXISTS `devmedia`.`tecnologiasporvaga` (
  `FK_idtecnologia` INT NOT NULL,
  `FK_idvaga` INT NOT NULL,
  PRIMARY KEY (`FK_idtecnologia`, `FK_idvaga`),
  INDEX `fk_tecnologia_has_vaga_vaga1_idx` (`FK_idvaga` ASC),
  INDEX `fk_tecnologia_has_vaga_tecnologia1_idx` (`FK_idtecnologia` ASC),
  CONSTRAINT `fk_tecnologia_has_vaga_tecnologia1`
    FOREIGN KEY (`FK_idtecnologia`)
    REFERENCES `devmedia`.`tecnologia` (`idtecnologia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecnologia_has_vaga_vaga1`
    FOREIGN KEY (`FK_idvaga`)
    REFERENCES `devmedia`.`vaga` (`idvaga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
