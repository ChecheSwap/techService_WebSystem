-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema setWeb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `setWeb` ;

-- -----------------------------------------------------
-- Schema setWeb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `setWeb` DEFAULT CHARACTER SET utf8 ;
USE `setWeb` ;

-- -----------------------------------------------------
-- Table `setWeb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARBINARY(2048) NOT NULL,
  `apellido` VARBINARY(2048) NOT NULL,
  `rfc` VARCHAR(13) NULL,
  `curp` VARCHAR(18) NOT NULL,
  `calle` VARBINARY(2048) NOT NULL,
  `colonia` VARBINARY(2048) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `cp` INT NOT NULL,
  `fecha_nacimiento` DATE NULL,
  `ciudad` VARBINARY(2048) NOT NULL,
  `estado` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `tel_cel` VARCHAR(20) NOT NULL,
  `tel_casa` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `curp_UNIQUE` (`curp` ASC),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC),
  UNIQUE INDEX `rfc_UNIQUE` (`rfc` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`privileges`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`privileges` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`credentials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`credentials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `privilege_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `alias` VARCHAR(50) NOT NULL,
  `password` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`id`, `privilege_id`, `user_id`),
  INDEX `fk_credentials_privileges_idx` (`privilege_id` ASC),
  INDEX `fk_credentials_users1_idx` (`user_id` ASC),
  UNIQUE INDEX `alias_UNIQUE` (`alias` ASC),
  CONSTRAINT `fk_credentials_privileges`
    FOREIGN KEY (`privilege_id`)
    REFERENCES `setWeb`.`privileges` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_credentials_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `setWeb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `desc` VARCHAR(250) NOT NULL,
  `code` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`registers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`registers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idevent` INT NOT NULL,
  `idcredential` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `comments` VARCHAR(200) NULL,
  PRIMARY KEY (`id`, `idevent`, `idcredential`),
  INDEX `fk_registers_events1_idx` (`idevent` ASC),
  INDEX `fk_registers_credentials1_idx` (`idcredential` ASC),
  CONSTRAINT `fk_registers_events1`
    FOREIGN KEY (`idevent`)
    REFERENCES `setWeb`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registers_credentials1`
    FOREIGN KEY (`idcredential`)
    REFERENCES `setWeb`.`credentials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(250) NOT NULL,
  `min_sal` DECIMAL NULL,
  `max_sal` DECIMAL NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `job_id` INT NOT NULL,
  `fecha_contratacion` DATE NULL,
  `salario` DECIMAL NULL,
  PRIMARY KEY (`id`, `user_id`, `job_id`),
  INDEX `fk_employees_jobs1_idx` (`job_id` ASC),
  INDEX `fk_employees_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_employees_jobs1`
    FOREIGN KEY (`job_id`)
    REFERENCES `setWeb`.`jobs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `setWeb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_customer_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_customer_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `setWeb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`service_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`service_orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `employee_id` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `fecha_entrega` DATE NOT NULL,
  PRIMARY KEY (`id`, `customer_id`, `user_id`),
  INDEX `fk_service_orders_employees1_idx` (`employee_id` ASC),
  CONSTRAINT `fk_service_orders_customer1`
    FOREIGN KEY (`customer_id` , `user_id`)
    REFERENCES `setWeb`.`customers` (`id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_employees1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `setWeb`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`product_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`product_categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(300) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero_serie` VARCHAR(100) NOT NULL,
  `orders_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  `identificador` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `marca` VARCHAR(100) NULL,
  `modelo` VARCHAR(100) NULL,
  PRIMARY KEY (`id`, `numero_serie`, `orders_id`, `categoria_id`),
  INDEX `fk_product_service_orders1_idx` (`orders_id` ASC),
  INDEX `fk_product_product_categories1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_product_service_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `setWeb`.`service_orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_product_categories1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `setWeb`.`product_categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`failures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`failures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `tiempo_estimado` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `setWeb`.`failures_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setWeb`.`failures_products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `failure_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`id`, `failure_id`),
  INDEX `fk_failures_products_failures1_idx` (`failure_id` ASC),
  INDEX `fk_failures_products_product1_idx` (`product_id` ASC),
  CONSTRAINT `fk_failures_products_failures1`
    FOREIGN KEY (`failure_id`)
    REFERENCES `setWeb`.`failures` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_failures_products_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `setWeb`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
