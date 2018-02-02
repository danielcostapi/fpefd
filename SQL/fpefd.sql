/*
MySQL Data Transfer
Source Host: localhost
Source Database: fpefd
Target Host: localhost
Target Database: fpefd
Date: 01/02/2018 22:30:07
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL,
  `score` int(5) DEFAULT NULL,
  `is_admin` int(2) NOT NULL,
  `ultimoIP` varchar(20) DEFAULT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `apelido_gamer` varchar(60) NOT NULL,
  `dt_nasc` date NOT NULL,
  `telefone_zap` decimal(15,0) NOT NULL,
  `telefone_resid` decimal(15,0) NOT NULL,
  `sexo` int(2) NOT NULL,
  `psn_live` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `CPF` decimal(11,0) NOT NULL,
  `responsavel` varchar(60) DEFAULT NULL,
  `foto` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for web_configs
-- ----------------------------
CREATE TABLE `web_configs` (
  `visitas` varchar(255) NOT NULL DEFAULT '',
  `manutencao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`visitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for web_noticias
-- ----------------------------
CREATE TABLE `web_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `noticia` text,
  `visualizacoes` varchar(255) DEFAULT '1',
  `titulo_reduzido` text,
  `em_destaque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
