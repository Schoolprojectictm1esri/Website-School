SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `deb41761_pedicure` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `deb41761_pedicure` ;

-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`beheerder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`beheerder` (
  `beheerder_id` INT NOT NULL AUTO_INCREMENT ,
  `gebruikersnaam` VARCHAR(45) NULL ,
  `wachtwoord` VARCHAR(45) NULL ,
  `email` VARCHAR(255) NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`beheerder_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`hash`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`hash` (
  `hash` VARCHAR(255) NOT NULL ,
  `klant_id` INT NULL ,
  `geldig` DATETIME NULL ,
  `soort` ENUM('wachtwoord', 'activeren') NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`hash`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`klanten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`klanten` (
  `klant_id` INT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NULL ,
  `wachtwoord` VARCHAR(255) NULL ,
  `registratiedatum` DATE NULL ,
  `voorletters` VARCHAR(45) NULL ,
  `achternaam` VARCHAR(45) NULL ,
  `adres` VARCHAR(45) NULL ,
  `woonplaats` VARCHAR(45) NULL ,
  `postcode` VARCHAR(45) NULL ,
  `telefoonnr` VARCHAR(45) NULL ,
  `klant_nummer` INT NULL ,
  `beroep` VARCHAR(45) NULL ,
  `geboortedatum` DATE NULL ,
  `gewicht` DOUBLE NULL ,
  `diabetis_melitus` TINYINT(1) NULL ,
  `hart_vaat` TINYINT(1) NULL ,
  `anti_stol` TINYINT(1) NULL ,
  `phema` TINYINT(1) NULL ,
  `allergie` TINYINT(1) NULL ,
  `hiv` TINYINT(1) NULL ,
  `hepatitis` TINYINT(1) NULL ,
  `hemofilie` TINYINT(1) NULL ,
  `steunkousen` TINYINT(1) NULL ,
  `voettype` VARCHAR(45) NULL ,
  `orthopedische_afwijking` VARCHAR(255) NULL ,
  `steunzolen` TINYINT(1) NULL ,
  `huidconditie` VARCHAR(255) NULL ,
  `huidaandoening` VARCHAR(255) NULL ,
  `nagelconditie` VARCHAR(255) NULL ,
  `nagelaandoening` VARCHAR(255) NULL ,
  `plantaire_rechts` VARCHAR(255) NULL ,
  `plantaire_links` VARCHAR(255) NULL ,
  `dorsale_rechts` VARCHAR(255) NULL ,
  `dorsale_links` VARCHAR(255) NULL ,
  `tussenvoegsel` VARCHAR(55) NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`klant_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`behandelingen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`behandelingen` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `naam` VARCHAR(45) NULL ,
  `lengte` DOUBLE NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`afspraken`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`afspraken` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `datum` DATETIME NOT NULL ,
  `klant_id` INT NULL ,
  `betaald` TINYINT(1) NULL ,
  `bevestigd` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_afspraken_klanten1_idx` (`klant_id` ASC) ,
  UNIQUE INDEX `datum_UNIQUE` (`datum` ASC) ,
  CONSTRAINT `fk_afspraken_klanten1`
    FOREIGN KEY (`klant_id` )
    REFERENCES `deb41761_pedicure`.`klanten` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`categorieen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`categorieen` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `naam` VARCHAR(255) NULL ,
  `actief` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`producten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`producten` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `naam` VARCHAR(45) NULL ,
  `prijs` DOUBLE NULL ,
  `omschrijving` TEXT NULL ,
  `actief` ENUM('ja','nee','winkel','web') NULL ,
  `foto` VARCHAR(255) NULL ,
  `categorieid` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_producten_categorieen1_idx` (`categorieid` ASC) ,
  CONSTRAINT `fk_producten_categorieen1`
    FOREIGN KEY (`categorieid` )
    REFERENCES `deb41761_pedicure`.`categorieen` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`bestelling`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`bestelling` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `klant_id` INT NOT NULL ,
  `datum` DATE NULL ,
  `afgerond` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_bestelling_klanten1_idx` (`klant_id` ASC) ,
  CONSTRAINT `fk_bestelling_klanten1`
    FOREIGN KEY (`klant_id` )
    REFERENCES `deb41761_pedicure`.`klanten` (`klant_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`bestelling_producten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`bestelling_producten` (
  `bestelling_id` INT NOT NULL ,
  `product_id` INT NOT NULL ,
  `aantal` INT NOT NULL ,
  PRIMARY KEY (`bestelling_id`, `product_id`) ,
  INDEX `fk_bestelling_producten_bestelling1_idx` (`bestelling_id` ASC) ,
  INDEX `fk_bestelling_producten_producten1_idx` (`product_id` ASC) ,
  CONSTRAINT `fk_bestelling_producten_bestelling1`
    FOREIGN KEY (`bestelling_id` )
    REFERENCES `deb41761_pedicure`.`bestelling` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bestelling_producten_producten1`
    FOREIGN KEY (`product_id` )
    REFERENCES `deb41761_pedicure`.`producten` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`afspraakbehandelingen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`afspraakbehandelingen` (
  `afspraak_id` INT NOT NULL ,
  `behandeling_id` INT NOT NULL ,
  PRIMARY KEY (`afspraak_id`, `behandeling_id`) ,
  INDEX `fk_afspraakbehandelingen_behandelingen1_idx` (`behandeling_id` ASC) ,
  INDEX `fk_afspraakbehandelingen_afspraken1_idx` (`afspraak_id` ASC) ,
  CONSTRAINT `fk_afspraakbehandelingen_behandelingen1`
    FOREIGN KEY (`behandeling_id` )
    REFERENCES `deb41761_pedicure`.`behandelingen` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_afspraakbehandelingen_afspraken1`
    FOREIGN KEY (`afspraak_id` )
    REFERENCES `deb41761_pedicure`.`afspraken` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deb41761_pedicure`.`vakantie`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `deb41761_pedicure`.`vakantie` (
  `start` DATE NOT NULL ,
  `end` DATE NOT NULL ,
  `comment` VARCHAR(255) NULL ,
  PRIMARY KEY (`start`, `end`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
