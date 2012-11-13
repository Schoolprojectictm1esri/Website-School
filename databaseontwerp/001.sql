-- SQL FILE BY JELLE SMEETS --
-- Global tables and database. --

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `pedicure` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `pedicure` ;

-- -----------------------------------------------------
-- Table `mydb`.`beheerder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`beheerder` (
  `beheerder_id` INT NOT NULL ,
  `gebruikersnaam` VARCHAR(45) NULL ,
  `wachtwoord` VARCHAR(45) NULL ,
  `e-mail` VARCHAR(45) NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`beheerder_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`klantgegevens`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`klantgegevens` (
  `klant_id` VARCHAR(45) NOT NULL ,
  `klant_nummer` INT NULL ,
  `beroep` VARCHAR(45) NULL ,
  `geboortedatum` VARCHAR(45) NULL ,
  `gewicht` DOUBLE NULL ,
  `diabetis_mellitus` TINYINT(1) NULL ,
  `hart_vaat` TINYINT(1) NULL ,
  `anti_stol` TINYINT(1) NULL ,
  `phema` TINYINT(1) NULL ,
  `allergie` TINYINT(1) NULL ,
  `Hiv` TINYINT(1) NULL ,
  `hepatitis` TINYINT(1) NULL ,
  `hemofilie` TINYINT(1) NULL ,
  `steunkousen` TINYINT(1) NULL ,
  `voettype` VARCHAR(45) NULL ,
  `orthopedische_afwijking` VARCHAR(45) NULL ,
  `steunzolen` TINYINT(1) NULL ,
  `aangepaste_schoenen` TINYINT(1) NULL ,
  `huidconditie` VARCHAR(45) NULL ,
  `huidaandoening` VARCHAR(45) NULL ,
  `nagelconditie` VARCHAR(45) NULL ,
  `nagelaandoening` VARCHAR(45) NULL ,
  PRIMARY KEY (`klant_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`klanten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`klanten` (
  `klant_id` INT NULL ,
  `e-mail` VARCHAR(45) NULL ,
  `wachtwoord` VARCHAR(255) NULL ,
  `registratiedatum` DATE NULL ,
  `voornaam` VARCHAR(45) NULL ,
  `achternaam` VARCHAR(45) NULL ,
  `adres` VARCHAR(45) NULL ,
  `woonplaats` VARCHAR(45) NULL ,
  `postcode` VARCHAR(45) NULL ,
  `telefoonnr` VARCHAR(45) NULL ,
  PRIMARY KEY (`klant_id`) ,
  CONSTRAINT `fk_klanten_therklantgegevens`
    FOREIGN KEY (`klant_id` )
    REFERENCES `mydb`.`klantgegevens` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`voet`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`voet` (
  `klant_id` INT NOT NULL ,
  `dorsale_rechts` VARCHAR(45) NULL ,
  `dorsale_links` VARCHAR(45) NULL ,
  `plantaire_rechts` VARCHAR(45) NULL ,
  `plantaire_links` VARCHAR(45) NULL ,
  PRIMARY KEY (`klant_id`) ,
  CONSTRAINT `fk_voet_klanten1`
    FOREIGN KEY (`klant_id` )
    REFERENCES `mydb`.`klanten` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`behandelingen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`behandelingen` (
  `id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  `lengte` DOUBLE NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`afspraken`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`afspraken` (
  `id` INT NOT NULL ,
  `datum` DATETIME NOT NULL ,
  `klant_id` INT NULL ,
  `betaald` TINYINT(1) NULL ,
  PRIMARY KEY (`id`, `datum`) ,
  INDEX `fk_afspraken_klanten1_idx` (`klant_id` ASC) ,
  CONSTRAINT `fk_afspraken_klanten1`
    FOREIGN KEY (`klant_id` )
    REFERENCES `mydb`.`klanten` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bestelling`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`bestelling` (
  `id` INT NOT NULL ,
  `klant_id` INT NULL ,
  `datum` DATE NULL ,
  `afgerond` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_bestelling_klanten1_idx` (`klant_id` ASC) ,
  CONSTRAINT `fk_bestelling_klanten1`
    FOREIGN KEY (`klant_id` )
    REFERENCES `mydb`.`klanten` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bestelling_producten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`bestelling_producten` (
  `bestelling_id` INT NOT NULL ,
  `product_id` INT NULL ,
  `aantal` INT NOT NULL ,
  PRIMARY KEY (`bestelling_id`, `product_id`) ,
  INDEX `fk_bestelling_producten_bestelling1_idx` (`bestelling_id` ASC) ,
  CONSTRAINT `fk_bestelling_producten_bestelling1`
    FOREIGN KEY (`bestelling_id` )
    REFERENCES `mydb`.`bestelling` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`producten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`producten` (
  `id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  `prijs` DOUBLE NULL ,
  `omschrijving` TEXT NULL ,
  `actief` ENUM('ja','nee','winkel','web') NULL ,
  `foto` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_producten_bestelling_producten1`
    FOREIGN KEY (`id` )
    REFERENCES `mydb`.`bestelling_producten` (`product_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`afspraakbehandelingen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pedicure`.`afspraakbehandelingen` (
  `afspraak_id` INT NOT NULL ,
  `behandeling_id` INT NOT NULL ,
  PRIMARY KEY (`afspraak_id`, `behandeling_id`) ,
  INDEX `fk_afspraakbehandelingen_behandelingen1_idx` (`behandeling_id` ASC) ,
  INDEX `fk_afspraakbehandelingen_afspraken1_idx` (`afspraak_id` ASC) ,
  CONSTRAINT `fk_afspraakbehandelingen_behandelingen1`
    FOREIGN KEY (`behandeling_id` )
    REFERENCES `mydb`.`behandelingen` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_afspraakbehandelingen_afspraken1`
    FOREIGN KEY (`afspraak_id` )
    REFERENCES `mydb`.`afspraken` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
