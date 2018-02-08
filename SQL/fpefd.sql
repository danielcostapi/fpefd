-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Fev-2018 às 12:17
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpefd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bd_login`
--

CREATE TABLE `bd_login` (
  `id_login` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bd_login`
--

INSERT INTO `bd_login` (`id_login`, `login`, `password`, `email`, `is_admin`) VALUES
(1, 'sadddsad22', 'f075d149f56ca7a7414bb4f94e0a25be', 'danielluis2@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bd_perfil`
--

CREATE TABLE `bd_perfil` (
  `id` int(255) NOT NULL,
  `login` varchar(100) NOT NULL,
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
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bd_perfil`
--

INSERT INTO `bd_perfil` (`id`, `login`, `nome`, `apelido_gamer`, `dt_nasc`, `telefone_zap`, `telefone_resid`, `sexo`, `psn_live`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `CPF`, `responsavel`, `foto`) VALUES
(1, 'sadddsad22', 'Daniel Masculino Luis', 'sdsadsdsad', '2018-02-08', '(89) 99448-5110', '', '0', 'sadsadsadsad', '', '', '', '', '', '', '', '85003c4d2b63f8c576cb74e7689b4f26.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd_login`
--
ALTER TABLE `bd_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `bd_perfil`
--
ALTER TABLE `bd_perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bd_login`
--
ALTER TABLE `bd_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bd_perfil`
--
ALTER TABLE `bd_perfil`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
