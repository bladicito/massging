SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_guess_book_settings`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_guess_book_settings` (

  `id`        INT NOT NULL AUTO_INCREMENT,
  `section_id`INT NOT NULL,
  `name`      VARCHAR(45) NULL,
  `lastname`  VARCHAR(45) NULL,
  `email`     VARCHAR(45) NULL,
  `datetime`  DATETIME    NULL,
  `message`   LONGTEXT    NULL,
  `title`     VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
){TABLE_ENGINE=MyISAM};
