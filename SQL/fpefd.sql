/*
MySQL Data Transfer
Source Host: localhost
Source Database: fpefd
Target Host: localhost
Target Database: fpefd
Date: 03/02/2018 22:31:21
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bd_login
-- ----------------------------
CREATE TABLE `bd_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for bd_perfil
-- ----------------------------
CREATE TABLE `bd_perfil` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `apelido_gamer` varchar(60) NOT NULL,
  `dt_nasc` date NOT NULL,
  `telefone_zap` varchar(15) NOT NULL,
  `telefone_resid` varchar(15) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `psn_live` varchar(20) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `responsavel` varchar(60) DEFAULT NULL,
  `foto` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bd_login` VALUES ('1', 'erere', '2bbf803161deb1186defbefb8b4b0903', 'danielluis2@gmail.com', '0');
INSERT INTO `bd_login` VALUES ('2', 'diego', '078c007bd92ddec308ae2f5115c1775d', 'diegobarbosasantos@gmail.com', null);
INSERT INTO `bd_perfil` VALUES ('1', 'erere', 'Daniel Luis Batista', 'aa', '2018-02-10', '(34) 34343-4343', '(34) 34343-4343', 'Masculino', '34', '64685000', 'eferrerr', 'erer', 'Marcolândia', 'PI', '343.434.343-4', 're', 'rerer');
INSERT INTO `bd_perfil` VALUES ('2', 'diego', 'DIEGO BARBOSA DOS SANTOS', 'diego', '1988-07-26', '(81) 98668-0882', '81986680882', 'Masculino', '123456', '50920090', 'Rua Manuel Inácio', 'Jardim São Paulo', 'Recife', 'PE', '999.999.999-99', '', '3x4');
