-- -----------------------------------------------------
-- Table `cautela`.`reserva_material`
-- -----------------------------------------------------
USE `cautela` ;

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