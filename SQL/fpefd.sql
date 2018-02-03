-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 20:32
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
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bd_login`
--

INSERT INTO `bd_login` (`id_login`, `login`, `password`, `email`) VALUES
(1, 'erere', '2bbf803161deb1186defbefb8b4b0903', 'danielluis2@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bd_perfil`
--

CREATE TABLE `bd_perfil` (
  `id` int(255) NOT NULL,
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
  `foto` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bd_perfil`
--

INSERT INTO `bd_perfil` (`id`, `nome`, `apelido_gamer`, `dt_nasc`, `telefone_zap`, `telefone_resid`, `sexo`, `psn_live`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `CPF`, `responsavel`, `foto`) VALUES
(1, 'Daniel Luis Batista', 'aa', '2018-02-10', '(34) 34343-4343', '(34) 34343-4343', 'Masculino', '34', '64685000', 'eferrerr', 'erer', 'Marcolândia', 'PI', '343.434.343-4', 're', 'rerer');

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
