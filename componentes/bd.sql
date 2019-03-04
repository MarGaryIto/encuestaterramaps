-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bdencuesta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdencuesta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdencuesta` DEFAULT CHARACTER SET utf8 ;
USE `bdencuesta` ;

-- -----------------------------------------------------
-- Table `bdencuesta`.`lider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`lider` (
  `id_lider` INT NOT NULL AUTO_INCREMENT,
  `experiencia` VARCHAR(45) NOT NULL,
  `nombrelider` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_lider`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`presupuesto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`presupuesto` (
  `id_presupuesto` INT NOT NULL AUTO_INCREMENT,
  `foda` VARCHAR(45) NOT NULL,
  `empleados` INT NOT NULL,
  `utilidad` VARCHAR(45) NOT NULL,
  `valor` INT NOT NULL,
  `monto` INT NOT NULL,
  PRIMARY KEY (`id_presupuesto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`proyecto` (
  `id_proyecto` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `id_lider` INT NOT NULL,
  `id_presupuesto` INT NOT NULL,
  `proyectopara` VARCHAR(45) NOT NULL,
  `claseproyecto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_proyecto`),
  INDEX `lider_idx` (`id_lider` ASC),
  INDEX `presupuesto_idx` (`id_presupuesto` ASC),
  CONSTRAINT `lider`
    FOREIGN KEY (`id_lider`)
    REFERENCES `bdencuesta`.`lider` (`id_lider`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `presupuesto`
    FOREIGN KEY (`id_presupuesto`)
    REFERENCES `bdencuesta`.`presupuesto` (`id_presupuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`direccion` (
  `id_direccion` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  `municipio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_direccion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`persona` (
  `id_persona` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `edad` VARCHAR(45) NULL,
  `sexo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_persona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`aplicador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`aplicador` (
  `id_aplicador` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `persona` INT NOT NULL,
  PRIMARY KEY (`id_aplicador`),
  INDEX `persona_idx` (`persona` ASC),
  CONSTRAINT `persona`
    FOREIGN KEY (`persona`)
    REFERENCES `bdencuesta`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`informacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`informacion` (
  `id_informacion` INT NOT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(15) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `tipo_persona` INT NOT NULL,
  `alta_shcp` VARCHAR(45) NOT NULL,
  `observasiones_fiscales` VARCHAR(4) NOT NULL,
  `factura` VARCHAR(45) NOT NULL,
  `estudios` VARCHAR(45) NOT NULL,
  `id_persona` INT NOT NULL,
  `id_aplicador` INT NOT NULL,
  PRIMARY KEY (`id_informacion`),
  INDEX `infoper_idx` (`id_persona` ASC),
  INDEX `idap_idx` (`id_aplicador` ASC),
  CONSTRAINT `infoper`
    FOREIGN KEY (`id_persona`)
    REFERENCES `bdencuesta`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idap`
    FOREIGN KEY (`id_aplicador`)
    REFERENCES `bdencuesta`.`aplicador` (`id_aplicador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`empresa` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT,
  `id_proyecto` INT NOT NULL,
  `razon_social` VARCHAR(200) NOT NULL,
  `giro` VARCHAR(200) NOT NULL,
  `sector` VARCHAR(45) NOT NULL,
  `estratificacion` VARCHAR(45) NOT NULL,
  `empleados` INT NOT NULL,
  `id_direccion` INT NOT NULL,
  `id_informacion` INT NOT NULL,
  INDEX `proyecto_idx` (`id_proyecto` ASC),
  INDEX `empdireccion_idx` (`id_direccion` ASC),
  INDEX `info_idx` (`id_informacion` ASC),
  PRIMARY KEY (`id_empresa`),
  CONSTRAINT `proyecto`
    FOREIGN KEY (`id_proyecto`)
    REFERENCES `bdencuesta`.`proyecto` (`id_proyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `empdireccion`
    FOREIGN KEY (`id_direccion`)
    REFERENCES `bdencuesta`.`direccion` (`id_direccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `info`
    FOREIGN KEY (`id_informacion`)
    REFERENCES `bdencuesta`.`informacion` (`id_informacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdencuesta`.`llamada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdencuesta`.`llamada` (
  `id_llamada` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(100) NULL,
  `comentario` TEXT(300) NOT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id_llamada`),
  INDEX `personid_idx` (`id_persona` ASC),
  CONSTRAINT `personid`
    FOREIGN KEY (`id_persona`)
    REFERENCES `bdencuesta`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
