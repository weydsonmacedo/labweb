-- -----------------------------------------------------
-- Schema cautela
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cautela` ;

-- -----------------------------------------------------
-- Schema cautela
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cautela` DEFAULT CHARACTER SET utf8 ;
USE `cautela` ;

-- -----------------------------------------------------
-- Table `cautela`.`cabo_armeiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`cabo_armeiro` ;

CREATE TABLE IF NOT EXISTS `cautela`.`cabo_armeiro` (
  `idusuario` INT NOT NULL,
  `nome_completo` VARCHAR(50) NOT NULL,
  `login` VARCHAR(45) NOT NULL COMMENT '	',
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`material` ;

CREATE TABLE IF NOT EXISTS `cautela`.`material` (
  `id_material` INT NOT NULL,
  `descricao_modelo` VARCHAR(50) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_material`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`armamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`armamento` ;

CREATE TABLE IF NOT EXISTS `cautela`.`armamento` (
  `numero_serie` INT NOT NULL,
  `fabricante` VARCHAR(50) NOT NULL,
  `id_material` INT NULL,
  PRIMARY KEY (`numero_serie`, `fabricante`),
  INDEX `FK_material_armamento_idx` (`id_material` ASC),
  CONSTRAINT `FK_material_armamento`
    FOREIGN KEY (`id_material`)
    REFERENCES `cautela`.`material` (`id_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`reserva` ;

CREATE TABLE IF NOT EXISTS `cautela`.`reserva` (
  `id_reserva` INT NOT NULL,
  `sigla` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_reserva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`municao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`municao` ;

CREATE TABLE IF NOT EXISTS `cautela`.`municao` (
  `id_material` INT NULL,
  `calibre` VARCHAR(50) NULL,
  INDEX `FK_material_municao_idx` (`id_material` ASC),
  CONSTRAINT `FK_material_municao`
    FOREIGN KEY (`id_material`)
    REFERENCES `cautela`.`material` (`id_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`acessorio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`acessorio` ;

CREATE TABLE IF NOT EXISTS `cautela`.`acessorio` (
  `id_acessorio` INT NOT NULL,
  `id_material` INT NULL,
  PRIMARY KEY (`id_acessorio`)),
  INDEX `FK_material_acessorio_idx` (`id_material` ASC),
  CONSTRAINT `FK_material_acessorio`
    FOREIGN KEY (`id_material`)
    REFERENCES `cautela`.`material` (`id_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`militar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`militar` ;

CREATE TABLE IF NOT EXISTS `cautela`.`militar` (
  `id_militar` INT NOT NULL,
  `posto_graduacao` VARCHAR(50) NULL,
  `nome_guerra` VARCHAR(50) NULL,
  PRIMARY KEY (`id_militar`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`reserva_material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`reserva_material` ;

CREATE TABLE IF NOT EXISTS `cautela`.`reserva_material` (
  `id_reserva` INT NOT NULL,
  `id_material` INT NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`id_reserva`, `id_material`),
  INDEX `FK_reserva_material_idx` (`id_material` ASC),
  CONSTRAINT `FK_reserva_material`
    FOREIGN KEY (`id_material`)
    REFERENCES `cautela`.`material` (`id_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_material_reserva`
    FOREIGN KEY (`id_reserva`)
    REFERENCES `cautela`.`reserva` (`id_reserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cautela`.`cautela`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cautela`.`cautela` ;

CREATE TABLE IF NOT EXISTS `cautela`.`cautela` (
  `id_cautela` INT NOT NULL,
  `id_reserva` INT NULL,
  `id_cabo_armeiro` INT NULL,
  `id_militar` INT NULL,
  `id_material` INT NULL,
  `quantidade` INT NULL,
  PRIMARY KEY (`id_cautela`),
  INDEX `FK_cautela_militar_idx` (`id_militar` ASC),
  INDEX `FK_cautela_reserva_idx` (`id_reserva` ASC),
  INDEX `FK_responsavel_reserva_idx` (`id_cabo_armeiro` ASC),
  CONSTRAINT `FK_cautela_militar`
    FOREIGN KEY (`id_militar`)
    REFERENCES `cautela`.`militar` (`id_militar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_cautela_reserva`
    FOREIGN KEY (`id_reserva`)
    REFERENCES `cautela`.`reserva` (`id_reserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_responsavel_reserva`
    FOREIGN KEY (`id_cabo_armeiro`)
    REFERENCES `cautela`.`cabo_armeiro` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;