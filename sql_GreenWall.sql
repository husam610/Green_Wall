-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mvc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mvc` DEFAULT CHARACTER SET latin1 ;
USE `mvc` ;

-- -----------------------------------------------------
-- Table `mvc`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(50) NOT NULL,
  `user_password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mvc`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc`.`posts` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL DEFAULT NULL,
  `post` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `like` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `id_user_idx` (`id_user` ASC) ,
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `mvc`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 42
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mvc`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc`.`comments` (
  `comm_id` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(255) NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `id_post` INT(11) NOT NULL,
  PRIMARY KEY (`comm_id`),
  INDEX `id_user_idx` (`id_user` ASC) ,
  INDEX `id_post_idx` (`id_post` ASC) ,
  CONSTRAINT `id_post`
    FOREIGN KEY (`id_post`)
    REFERENCES `mvc`.`posts` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_users`
    FOREIGN KEY (`id_user`)
    REFERENCES `mvc`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
