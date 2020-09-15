/* SQL Manager Lite for MySQL                              5.6.3.49012 */
/* ------------------------------------------------------------------- */
/* Host     : robb0508.publiccloud.com.br                              */
/* Port     : 3306                                                     */
/* Database : alanw27_athenas                                          */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8' */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `alanw27_athenas`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `alanw27_athenas`;

/* Structure for the `tb_categorias` table : */

CREATE TABLE `tb_categorias` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `token` VARCHAR(128) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE KEY `id` USING BTREE (`id`),
  UNIQUE KEY `token` USING BTREE (`token`)
) ENGINE=InnoDB
AUTO_INCREMENT=13 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `tb_pessoas` table : */

CREATE TABLE `tb_pessoas` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) COLLATE utf8_general_ci NOT NULL,
  `email` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `fk_categoria` INTEGER(11) NOT NULL,
  `token` VARCHAR(128) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`),
  UNIQUE KEY `id` USING BTREE (`id`),
  UNIQUE KEY `token` USING BTREE (`token`),
  KEY `fk_categoria` USING BTREE (`fk_categoria`),
  CONSTRAINT `tb_pessoas_fk1` FOREIGN KEY (`fk_categoria`) REFERENCES `tb_categorias` (`id`)
) ENGINE=InnoDB
AUTO_INCREMENT=2 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Data for the `tb_categorias` table  (LIMIT 0,500) */

INSERT INTO `tb_categorias` (`id`, `descricao`, `token`) VALUES
  (1,'ADMIN','e5965a8940781e2251a66976471e0a636897139c02aa8d545fc5a963ce836de57b58287dd324cd8bf5d7eafe62a56d9104801142428e8e0fc431babdb7c663eb'),
  (2,'GERENTE','acc380954a62ad0367fe79a103e62b20b0800dcf9f0bd2b0917958eb0e83a7ca161bff3138e8c64bcc2242821235490ad3fe71beba421803fb13f3145967ab10'),
  (3,'NORMAL','91c04a0dc493885ebbe0e1b1339e5d7a62666e207beccc3c2d0aecbc9b3750deaf62bd2669d7422cfc6a79eedc5907df4de7ddcf27723b3164f11cbb4e09c899');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;