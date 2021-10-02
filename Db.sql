-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Out-2021 às 15:06
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `av1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagiario`
--

DROP TABLE IF EXISTS `estagiario`;
CREATE TABLE IF NOT EXISTS `estagiario` (
  `Cod_Estagiario` int(11) NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `Idade` int(3) NOT NULL,
  `Sexo` char(10) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Cod_Local` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cod_Estagiario`),
  KEY `Cod_Local` (`Cod_Local`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estagiario`
--

INSERT INTO `estagiario` (`Cod_Estagiario`, `Nome`, `Idade`, `Sexo`, `Email`, `Cod_Local`) VALUES
(1, 'Neymar Santos da Silva', 39, 'M', 'neymar@teste.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local_estagio`
--

DROP TABLE IF EXISTS `local_estagio`;
CREATE TABLE IF NOT EXISTS `local_estagio` (
  `Cod_Local` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Local` varchar(150) NOT NULL,
  PRIMARY KEY (`Cod_Local`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local_estagio`
--

INSERT INTO `local_estagio` (`Cod_Local`, `Nome_Local`) VALUES
(1, 'Sul'),
(2, 'Sudeste'),
(3, 'Norte'),
(4, 'Nordeste'),
(5, 'Centro-Oeste');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
