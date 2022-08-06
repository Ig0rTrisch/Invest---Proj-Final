-- MySQL Script generated by MySQL Workbench
-- Wed Aug  3 21:57:21 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `InvestMais` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `InvestMais` DEFAULT CHARACTER SET utf8 ;
USE `InvestMais` ;

-- -----------------------------------------------------
-- Table `mydb`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`Employee` (
  `idEmployee` INT NOT NULL AUTO_INCREMENT,
  `registration_employee` INT NOT NULL,
  `password` VARCHAR(50) NULL,
  `name` VARCHAR(80) NULL,
  `cpf` BIGINT NULL,
  `birthDate` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`idEmployee`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(100) NOT NULL,
  `password` VARCHAR(50) NULL,
  `birthDate` VARCHAR(45) NULL,
  `name` VARCHAR(80) NULL,
  `email` VARCHAR(100) NULL,
  `cpf` BIGINT NULL,
  PRIMARY KEY (`idClient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`Address` (
  `idAddress` INT NOT NULL AUTO_INCREMENT,
  `public_place` VARCHAR(30) NULL,
  `streetName` VARCHAR(100) NULL,
  `neighborhood` VARCHAR(50) NULL,
  `complement` VARCHAR(50) NULL,
  `numberOfStreet` INT NULL,
  `zipCode` BIGINT NULL,
  `city` VARCHAR(50) NULL,
  `Employee_idEmployee` INT NOT NULL,
  `Client_idClient` INT NOT NULL,
  PRIMARY KEY (`idAddress`, `Employee_idEmployee`, `Client_idClient`),
  CONSTRAINT `fk_Address_Employee1`
    FOREIGN KEY (`Employee_idEmployee`)
    REFERENCES `mydb`.`Employee` (`idEmployee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Address_Client1`
    FOREIGN KEY (`Client_idClient`)
    REFERENCES `mydb`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Count`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`Count` (
  `idCount` INT NOT NULL AUTO_INCREMENT,
  `balance` FLOAT NULL,
  `financing` BINARY NULL,
  ` debitPerMonth` FLOAT NULL,
  PRIMARY KEY (`idCount`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Sector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`Sector` (
  `idSector` INT NOT NULL AUTO_INCREMENT,
  `function` VARCHAR(50) NULL,
  `salary` FLOAT NULL,
  PRIMARY KEY (`idSector`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EmployeeXSector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`EmployeeXSector` (
  `Employee_idEmployee` INT NOT NULL,
  `Employee_Person_idPerson` INT NOT NULL,
  `Sector_idSector` INT NOT NULL,
  PRIMARY KEY (`Employee_idEmployee`, `Employee_Person_idPerson`, `Sector_idSector`),
  CONSTRAINT `fk_Employee_has_Sector_Employee1`
    FOREIGN KEY (`Employee_idEmployee`)
    REFERENCES `InvestMais`.`Employee` (`idEmployee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Employee_has_Sector_Sector1`
    FOREIGN KEY (`Sector_idSector`)
    REFERENCES `InvestMais`.`Sector` (`idSector`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ClientXCount`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `InvestMais`.`ClientXCount` (
  `idClient` INT NOT NULL,
  `idCount` INT NOT NULL,
  PRIMARY KEY (`idClient`, `idCount`),
  CONSTRAINT `fk_Client_has_Count_Client1`
    FOREIGN KEY (`idClient`)
    REFERENCES `InvestMais`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Client_has_Count_Count1`
    FOREIGN KEY (`idCount`)
    REFERENCES `InvestMais`.`Count` (`idCount`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;