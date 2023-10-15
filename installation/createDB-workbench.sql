-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema film
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema film
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `film` DEFAULT CHARACTER SET utf8 ;
USE `film` ;

-- -----------------------------------------------------
-- Table `film`.`genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `film`.`genre` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `film`.`film`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `film`.`film` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(300) NOT NULL,
  `anneeProduction` SMALLINT NOT NULL,
  `synopsis` VARCHAR(500) NOT NULL,
  `duree` SMALLINT NOT NULL,
  `genre_id` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_film_genre1_idx` (`genre_id` ASC),
  CONSTRAINT `fk_film_genre1`
    FOREIGN KEY (`genre_id`)
    REFERENCES `film`.`genre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `film`.`acteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `film`.`acteur` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `film`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `film`.`role` (
  `film_id` INT(11) NOT NULL,
  `acteur_id` INT(11) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`film_id`, `acteur_id`),
  INDEX `fk_film_has_Acteur_Acteur1_idx` (`acteur_id` ASC),
  INDEX `fk_film_has_Acteur_film_idx` (`film_id` ASC),
  CONSTRAINT `fk_film_has_Acteur_film`
    FOREIGN KEY (`film_id`)
    REFERENCES `film`.`film` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_film_has_Acteur_Acteur1`
    FOREIGN KEY (`acteur_id`)
    REFERENCES `film`.`acteur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Insertion des données --- 

INSERT INTO `acteur` (`id`, `nom`, `prenom`) VALUES
(NULL, 'Cruise', 'Tom'),
(NULL, 'Foster', 'Jodie'),
(NULL, 'Irvine', 'Jeremy');

INSERT INTO `genre` (`id`, `nom`) VALUES
(NULL, 'Science-fiction'),
(NULL, 'Aventure'),
(NULL, 'Policier');

INSERT INTO `film` (`id`, `titre`, `anneeProduction`, `synopsis`, `duree`, `genre_id`) VALUES
(NULL, 'The BFG', 1998, 'The BFG is no ordinary bone-crunching giant. He is far too nice and jumbly. It’s lucky for Sophie that he is. Had she been carried off in the middle of the night by the Bloodbottler, or any of the other giants—rather than the BFG—she would have soon become breakfast. When Sophie hears that the giants are flush-bunking off to England to swollomp a few nice little chiddlers, she decides she must stop them once and for all. And the BFG is going to help her!', 117, 1),
(NULL, 'War Horse', 2010, 'Follows a young man named Albert and his horse, Joey, and how their bond is broken when Joey is sold to the cavalry and sent to the trenches of World War One. Despite being too young to enlist, Albert heads to France to save his friend.', 146, 1),
(NULL, 'A.I. Artificial Intelligence', 1995, 'David, a robotic boy—the first of his kind programmed to love—is adopted as a test case by a Cybertronics employee and his wife. Though he gradually becomes their child, a series of unexpected circumstances make this life impossible for David. Without final acceptance by humans or machines, David embarks on a journey to discover where he truly belongs, uncovering a world in which the line between robot and machine is both vast and profoundly thin.', 132, 1),
(NULL, 'Contact', 1994, 'Contact is a science fiction film about an encounter with alien intelligence. Based on the novel by Carl Sagan the film starred Jodie Foster as the one chosen scientist who must make some difficult decisions between her beliefs, the truth, and reality.', 150, 1),
(NULL, 'Modern Times', 1936, 'The Tramp struggles to live in modern industrial society with the help of a young homeless woman.', 87, 2);

INSERT INTO `role` (`film_id`, `acteur_id`, `nom`, `prenom`) VALUES
(1, 1, 'Bottler', 'Blood'),
(2, 1, 'Narracot', 'Albert'),
(3, 2, 'Swington', 'Monica');