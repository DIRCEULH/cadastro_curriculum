-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jun-2018 às 20:52
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curriculum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_curriculum`
--

CREATE TABLE `dados_curriculum` (
  `id` int(10) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `sexo` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_nasc` varchar(15) DEFAULT NULL,
  `contato` varchar(15) DEFAULT NULL,
  `nivel` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `situacao` varchar(100) DEFAULT NULL,
  `instituicao` varchar(100) DEFAULT NULL,
  `ano_conclu` varchar(15) NOT NULL,
  `empresa_ultima` varchar(100) NOT NULL,
  `cargo_ultima` varchar(100) NOT NULL,
  `local_ultima` varchar(100) NOT NULL,
  `data_entrada_ultima` varchar(15) NOT NULL,
  `data_saida_ultima` varchar(15) NOT NULL,
  `atividades_ultima` varchar(500) NOT NULL,
  `empresa_anterior` varchar(200) NOT NULL,
  `cargo_anterior` varchar(100) NOT NULL,
  `local_anterior` varchar(25) NOT NULL,
  `data_entrada_anterior` varchar(15) NOT NULL,
  `data_saida_anterior` varchar(15) NOT NULL,
  `atividades_anterior` varchar(500) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `civil` varchar(20) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` int(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `arquivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_curriculum`
--
ALTER TABLE `dados_curriculum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_curriculum`
--
ALTER TABLE `dados_curriculum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
