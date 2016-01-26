SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`user` (
   id SERIAL ,
  `login` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `lastname` VARCHAR(45) NULL DEFAULT NULL,
  `firstname` VARCHAR(45) NULL DEFAULT NULL,
  `birthday` TIMESTAMP NULL DEFAULT NULL,
  `status` VARCHAR(100) NULL DEFAULT NULL,
  `avatar` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `mydb`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`post` ;

CREATE TABLE IF NOT EXISTS `mydb`.`post` (
   id SERIAL ,
  `texte` VARCHAR(2000) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `image` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `mydb`.`private_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`private_message` ;

CREATE TABLE IF NOT EXISTS `mydb`.`private_message` (
   id SERIAL ,
  `sender` INT NULL DEFAULT NULL,
  `recipient` INT NULL DEFAULT NULL,
  `parent` INT NULL DEFAULT NULL,
  `post` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_utilisateur1` (`sender` ASC),
  INDEX `fk_message_utilisateur2` (`recipient` ASC),
  INDEX `fk_message_post1` (`post` ASC),
  CONSTRAINT `fk_message_utilisateur1`
    FOREIGN KEY (`sender`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_utilisateur2`
    FOREIGN KEY (`recipient`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_post1`
    FOREIGN KEY (`post`)
    REFERENCES `mydb`.`post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`global_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`global_message` ;

CREATE TABLE IF NOT EXISTS `mydb`.`global_message` (
   id SERIAL ,
  `post` INT NULL DEFAULT NULL,
  `sender` INT NULL DEFAULT NULL,
  `like` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chat_post1` (`post` ASC),
  INDEX `fk_chat_utilisateur1` (`sender` ASC),
  CONSTRAINT `fk_chat_post1`
    FOREIGN KEY (`post`)
    REFERENCES `mydb`.`post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chat_utilisateur1`
    FOREIGN KEY (`sender`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
